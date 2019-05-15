<?php
session_start();
if($_SESSION["username"]){
	require("conectar.php");
	$usuario = $_SESSION["username"];
	$iden = $_POST["id"];
	$sql="DELETE FROM eventos WHERE id = '$iden'";
	$borar = $conect->query($sql);
	$response2["msg"]="OK";
}else{
	$response2["msg"]="No ha iniciado Sesion";
}
echo json_encode($response2);
 ?>
