<?php 
session_start();
if($_SESSION["username"]){
	require("conectar.php");
	$usuario = $_SESSION["username"];
	//print_r($_POST);
	$sql="SELECT id FROM usuarios WHERE email = '$usuario' ";
	$rescon = $conect->query($sql);
	while($resultado = mysqli_fetch_assoc($rescon)){
		$id = $resultado["id"];
	}
	$titulo = $_POST["titulo"];
	$fec_ini= $_POST["start_date"];
	$tododia= $_POST["allDay"];
	$fec_fin= $_POST["end_date"];
	$hor_fin= $_POST["end_hour"];
	$hor_ini= $_POST["start_hour"];
	
	if(empty($titulo) || empty(fec_ini)){
		$response1["msg"]="Ingrese El Titulo y la fecha de inicio";	
	}else{
		if(empty($fec_fin) && empty($hor_fin)&& empty($hor_ini)){
				$tododia = 1;
				$sql1= "INSERT INTO eventos VALUES('', '$titulo', '$fec_ini', '$hor_ini', '$fec_fin', '$hor_fin', '$tododia', '$id')";
				$reg = $conect->query($sql1);
				$response1["msg"]="OK";
			}else{
				$tododia = 0;
				$sql1= "INSERT INTO eventos VALUES('', '$titulo', '$fec_ini', '$hor_ini', '$fec_fin', '$hor_fin', '$tododia', '$id')";
				$reg = $conect->query($sql1);
				$response1["msg"]="OK";
			}
		}
	
}else{
	$response1["msg"]="No ha iniciado Sesion";
}
return print_r(json_encode($response1));
?>