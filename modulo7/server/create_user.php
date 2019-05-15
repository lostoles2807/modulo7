<?php
require("conectar.php");
//print_r($res);
$usuario = 'laura@mail.com';
$password = password_hash(12345, PASSWORD_DEFAULT);
$nombre = "Laura Sofia";
$fec_nac = "2017-10-07";
$sql = "INSERT INTO usuarios VALUES('','$usuario','$password', '$nombre', '$fec_nac')";
$sql1 ="SELECT email FROM usuarios WHERE email = '$usuario'";
$res= $conect->query($sql1);
if(mysqli_num_rows($res) == 1){
	echo "Usuario Regisdtrado";
}else{
	$conect->query($sql);
}
 ?>
