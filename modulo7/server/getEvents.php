<?php 
session_start();
if(isset($_SESSION["username"])){
	require("conectar.php");
	$email= $_SESSION["username"];
	$sql="SELECT b.id, b.title, b.start, b.start_hour, b.end, b.end_hour, b.allday FROM usuarios AS a, eventos AS b WHERE a.email='$email' AND a.id = b.id_usu";
	
	$consulta = $conect->query($sql);
	$filas = mysqli_num_rows($consulta);
	//print_r($consulta);
		if($filas > 0){
			$response1["msg"]="OK";
			while( $evento = mysqli_fetch_assoc($consulta)){
				$response1["eventos"][]= $evento;
			}
		}else{
				$response1["msg"]="OK";
		}
	}else{
			$response1["msg"]="No ha iniciado Sesion";
		 }
echo json_encode($response1); 
?>