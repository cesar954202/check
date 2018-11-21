<?php
$id_servidor = $_POST['id_servidor'];
$nombre=$_POST['nombre'];
$ip=$_POST['ip'];
$usuarioServer=$_POST['usuarioServer'];
$pass=$_POST['pass'];

include('../conexion.php');

$nombre = addslashes($nombre);
$ip = addslashes($ip);
$usuarioServer = addslashes($usuarioServer);
$pass = addslashes($pass);

$sqlquery = "UPDATE servidores SET nombre = '$nombre', ip = '$ip', usuario = '$usuarioServer', pass = '$pass' WHERE id_servidor = '$id_servidor'";

if($result = $mysqli->query($sqlquery)){
	echo "<script type='text/javascript'> alert('Se edito correctamente'); window.location.href='EditarServidor.php'; </script>";

	include('escrituraBat.php');
	
}else{
	echo "<script type='text/javascript'> alert('Un errror impidio editar el nuevo servidor '); javascript:history.go(-1); </script>";
}
//echo $sqlquery;
//echo $result;
?>