<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" >
<title>borrado usuarios </title>
</head>
<body>
<h3> Borrado usuario </h3>
<?php
	include("/var/www/config.inc.php");
	
	//Primero conectamos con la base de datos, Si anteponemos @ no escribe el error por defecto
	@ $conexion = mysqli_connect($servidor, $usuarioBD, $contrasenyaBD);

	if(!$conexion)
	{
		die("Imposible conectar. Error n&uacute;mero ".mysqli_errno().": ".mysqli_error());
	}

	//Abrimos la BBDD
	mysqli_select_db($conexion, 'foro') or die('Imposible abrir la BBDD: '.mysqli_error());

	//Creamos la query
	$consulta='SELECT * FROM usuarios WHERE cod_usu='.$_GET['id'];
	
	//Mandamos la query al servidor de BBDD, Si algo ha ido mal, $resultado se interpreta como falso
	$resultado=mysqli_query($conexion, $consulta) or die("Imposible consultar: ".mysqli_error());
	$num_registros=mysqli_num_rows($resultado);

	//con un if compruebo si existe el usuario ya que $registro devolveria 1 si existe
	if($num_registros!=1)
		echo "\t\t<p>No se encuentra el usuario</p>\n";
	
	else
	{
		$dato=mysqli_fetch_row($resultado);
		
		//con $dato[] imprimo el contenido de cada columna de la seleccion realizada
		echo "<p>Se borrará al usuario: </p>\n";
		echo "<p>Nombre: $dato[1]</p>\n";
		echo "<p>Nick: $dato[2]</p>\n";
		echo "<p>Email: $dato[4]</p>\n";
		
		//borro el usuario indicado
		$borrado='DELETE FROM foro.usuarios WHERE usuarios.cod_usu='.$_GET['id'];
		echo "\t\t\t\t <p>&nbsp;</p>\n";
		echo "\t\t\t\t <p>Usuario borrado</p>\n";
		mysqli_query($conexion, $borrado) or die("Imposible borrar");
	}
	
	//Labores de limpieza:
	mysqli_free_result($resultado);
	mysqli_close($conexion);
?>
<p><a href="listado_usuarios_con_while.php">Volver al listado de usuarios</a></p>
</body>
</html>