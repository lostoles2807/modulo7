<?php 
require("conectar.php"); 
//print_r($_POST)
$usu = $_POST["username"];
$pass = $_POST["password"];

$sql = "SELECT email, password FROM usuarios WHERE email='$usu'";
$res = $conect->query($sql);
$response=[];
$resu= mysqli_num_rows($res);

if($resu == 1){
	while($resultado = mysqli_fetch_assoc($res)){
		if(password_verify($pass, $resultado["password"])){
			$response["msg"]="OK";
			session_start();
			$_SESSION["username"]= $resultado["email"];
		}else{
			$response["msg"]="Usuario o Password Incorrecto";
		}
		return print_r(json_encode($response));
	}
}

//print_r($resu);
?>