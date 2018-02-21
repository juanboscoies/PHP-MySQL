<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" >
<title>Datos usuario </title>
</head>
<body>
<h3> Datos usuario </h3>
<?php
	include("/var/www/config.inc.php");
	
	//Primero conectamos con la base de datos, Si anteponemos @ no escribe el error por defecto
	@ $conexion = mysqli_connect($servidor, $usuarioBD, $contrasenyaBD);
	
	if(!$conexion)
		die("Imposible conectar. Error n&uacute;mero ".mysqli_errno().": ".mysqli_error());
	
	//Abrimos la BBDDD
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
		//muestro la informacion del usuario
		$dato=mysqli_fetch_row($resultado);
		
		//con $dato[] imprimo el contenido de cada columna de la seleccion realizada
		echo "\t\t\t <p>Nombre: $dato[1]</p>\n";
		echo "\t\t\t <p>Nick: $dato[2]</p>\n";
		echo "\t\t\t <p>Email: $dato[4]</p>\n";
		echo "\t\t\t <p>&nbsp;</p>\n";
	}
	//Labores de limpieza:
	mysqli_free_result($resultado);
	mysqli_close($conexion);
?>

<p><a href="listado_usuarios_con_while.php">Volver al Listado de usuarios</a></p>
</body>
</html>