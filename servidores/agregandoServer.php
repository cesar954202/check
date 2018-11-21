<?php
$nombre=$_POST['nombre'];
$ip=$_POST['ip'];
$usuarioServer=$_POST['usuarioServer'];
$pass=$_POST['pass'];

include('../conexion.php');

$nombre = addslashes($nombre);
$ip = addslashes($ip);
$usuarioServer = addslashes($usuarioServer);
$pass = addslashes($pass);

$sqlquery = "INSERT INTO servidores( nombre, ip , usuario , pass ) VALUES ('$nombre', '$ip', '$usuarioServer', '$pass')";

if($result = $mysqli->query($sqlquery)){
	echo "<script type='text/javascript'> alert('Se agrego correctamente'); javascript:history.go(-1); </script>";
	include('escrituraBat.php');
	
}else{
	echo "<script type='text/javascript'> alert('Un errror impidio agregar el nuevo servidor '); javascript:history.go(-1); </script>";
}
//echo $sqlquery;
//echo $result;
?>