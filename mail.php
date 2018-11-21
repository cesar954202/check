
<meta http-equiv="refresh" content="10">
<?php

if(isset($_GET["enviado"]))
{
	$enviado = $_GET["enviado"];
}
else
{
	$enviado = "False";
}

$ip = "10.156.113.12";
$output = shell_exec("ping $ip");
//echo $output;
 
if (strpos($output, "Host") || strpos($output, "Tiempo de espera")) {

    if($enviado == "ok")
    {
    	echo "Se notifico";
    }
    else
    {
    	header('Location: https://cesarsanchez.000webhostapp.com/mail.php?servidor= '.$ip );
    }
} else {
    echo 'Conectado Ip: ' . $ip;
}


?>