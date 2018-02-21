<?php
include "/var/www/config.inc.php";

@ $conexion = mysqli_connect($servidor, $usuarioBD, $contrasenyaBD);

if( $conexion!=true )
	echo "Fallo al conectar con el servidor de la BD. Error número " . mysqli_connect_errno() . ": " . mysqli_connect_error() . "<br><br>";

else
	echo "Conexión satisfactoria con el servidor de la BD<br><br>";


if ( !mysqli_select_db($conexion, 'apuntesBD1') )
	echo "Fallo al seleccionar la BD $BD<br><br>";
else
	echo "Conexión satisfactoria con la BD $BD<br><br>";

mysqli_close($conexion);
?>
