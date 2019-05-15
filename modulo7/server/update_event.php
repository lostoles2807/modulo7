<?php
 session_start();
if($_SESSION["username"]){
	require("conectar.php");
	$usuario = $_SESSION["username"];
	$ident = $_POST["id"];
	$inicio = $_POST["start_date"];
	$final = $_POST["end_date"];
	$hinicio = $_POST["start_hour"];
	$hfinal = $_POST["end_hour"];
	
	$sql = "UPDATE eventos SET start='$inicio', start_hour='$hinicio', end='$final', end_hour='$hfinal' WHERE id='$ident'";
	$actual= $conect->query($sql);
	$response3["msg"]="OK";
	
}else{
	$response3["msg"]="No ha iniciado Sesion";
}
echo json_encode($response3);


 ?>
