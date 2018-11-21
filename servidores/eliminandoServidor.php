
<?php
$id_servidor = $_POST['servidor'];

include('../conexion.php');

$sqlquery = "DELETE FROM servidores WHERE id_servidor = '$id_servidor'";



if($result = $mysqli->query($sqlquery)){
	echo "<script type='text/javascript'> alert('Se elimino correctamente'); javascript:history.go(-2); </script>";

	include('escrituraBat.php');
	
}else{
	echo "<script type='text/javascript'> alert('Un errror impidio editar el nuevo servidor '); javascript:history.go(-1); </script>";
}
?>
