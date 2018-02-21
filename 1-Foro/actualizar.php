<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" >
<title> Edicion usuario </title>
</head>
<body>
	<h3> Edicion usuario </h3>
	<?php
	include("/var/www/config.inc.php");
	
	//Primero conectamos con la base de datos, Si anteponemos @ no escribe el error por defecto
	@ $conexion = mysqli_connect($servidor, $usuarioBD, $contrasenyaBD);

	if(!$conexion)
		die("Imposible conectar. Error n&uacute;mero ". mysqli_errno().": ". mysqli_error());

	//Abrimos la BBDD
	mysqli_select_db($conexion, 'foro') or die('Imposible abrir la BBDD: '.mysqli_error());

	//Creamos la query
	$consulta='SELECT * FROM usuarios WHERE cod_usu='.$_GET['cod'];

	//Mandamos la query al servidor de BBDD, Si algo ha ido mal, $resultado se interpreta como falso
	$resultado=mysqli_query($conexion, $consulta) or die("Imposible consultar: " . mysqli_error());
	$registros=mysqli_num_rows($resultado);

	//Con un if compruebo si existe el usuario ya que $registro devolvería 1 si existe
	if($registros!=1)
		echo "\t\t<p>No se encuentra el usuario</p>\n";
	
	else
	{
		//Edito el usuario indicado
		$edito="UPDATE `foro`.`usuarios` SET `nombre` = '".$_GET['nombre']."', `nick` = '". $_GET['nick'].
		"', `email` = '".$_GET['mail']."' WHERE `usuarios`.`cod_usu` = ".$_GET['cod'].";";
		
		mysqli_query($conexion, $edito) or die("Imposible actualizar");

		/*El codigo de error se puede poner tambien de esta manera:
		if(!mysql_query($edito))
			print "Imposible actualizar: ".mysql_error();
		*/
	}
	echo "\t <p>&nbsp;</p>\n";
	echo "\t <p>Usuario actualizado</p>\n";
	//Labores de limpieza:
	mysqli_free_result($resultado);
	mysqli_close($conexion);
?>
<!-- Enlace para volver a la tabla de usuarios -->
<p><a href="listado_usuarios_con_while.php">Volver al listado de usuarios</a></p>
</body>
</html>