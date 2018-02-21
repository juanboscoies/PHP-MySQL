<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" >
<title>Listado de usuarios </title>
</head>
<body>
<h3> Listado de usuarios </h3>
<?php
	include("/var/www/config.inc.php");
	
	//Primero conectamos con la base de datos, Si anteponemos @ no escribe el error por defecto
	@ $conexion = mysqli_connect($servidor, $usuarioBD, $contrasenyaBD);

	if(!$conexion)
		die("Imposible conectar. Error n&uacute;mero ".mysqli_errno().": ".mysqli_error());

	//Abrimos la BBDDD
	mysqli_select_db($conexion, 'foro') or die('Imposible abrir la BBDD: '.mysqli_error());

	//Creamos la query
	$consulta='SELECT * FROM usuarios';

	//Mandamos la query al servidor de BBDD Si algo ha ido mal, $resultado se interpreta como falso
	$resultado=mysqli_query($conexion, $consulta) or die("Imposible consultar: ".mysqli_error());

	//En este caso, que la consulta es una select, devuelve un objeto de tipo recurso que permite acceder al resultado de la consulta.
	$num_filas=mysqli_num_rows($resultado);

	//usando for
	//Creamos una Tabla para mostrar el contenido de la consulta en formato tabla
	echo "\t\t<table border=\"2\">\n";

	//genero la cabecera
	echo "\t\t\t<tr>
	<th>Nombre usuario</th>
	<th>Borrar</th>
	<th>Editar</th>
	</tr>\n";
	
	//con un for recorro las filas de la tabla
	for($i=0;$i<$num_filas;$i++)
	{
		$dato=mysqli_fetch_row($resultado);
		//imprimo en la tabla
		echo "\t\t\t\t<tr>\n";
		//con $dato[] imprimo el contenido de cada columna y lo referencio
		echo "\t\t\t\t<td><a href=\"mostrar_ficha.php?id=$dato[0]\">$dato[1]</a></td>\n";
		echo "\t\t\t\t<td><a href=\"borrar_ficha.php?id=$dato[0]\">Borrar</td>\n";
		echo "\t\t\t\t<td><a href=\"editar_ficha.php?id=$dato[0]\">Editar</td>\n";
		echo "\t\t\t\t</tr>\n";
	}
	echo "\t\t</table>\n";
	
	//Labores de limpieza:
	mysqli_free_result($resultado);
	mysqli_close($conexion);
?>

<p> &nbsp; </p>
<form action="insertar_ficha.html" method="GET">
<p><input type="submit" value="Insertar nuevo Usuario"></p>
	<p><a href="resetear_tabla_usuarios.php">Resetear tabla de usuarios</a></p>
</form>
</body>
</html>