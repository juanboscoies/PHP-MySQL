<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" >
<title>Edita usuario </title>
</head>
<body>
<h3> Edita usuario </h3>
<?php
	include("/var/www/config.inc.php");
	
	//Primero conectamos con la base de datos, Si anteponemos @ no escribe el error por defecto
	$conexion = mysqli_connect($servidor, $usuarioBD, $contrasenyaBD);

	if(!$conexion)
		die("Imposible conectar. Error n&uacute;mero ".mysqli_errno().": ".mysqli_error());
	
	//Abrimos la BBDDD
	mysqli_select_db($conexion, 'foro') or die('Imposible abrir la BBDD: '.mysqli_error());

	//Creamos la query
	$consulta='SELECT * FROM usuarios WHERE cod_usu='.$_GET['id'];

	//Mandamos la query al servidor de BBDD, Si algo ha ido mal, $resultado se interpreta como falso
	$resultado=mysqli_query($conexion, $consulta) or die("Imposible consultar: ".mysqli_error());
	$registros=mysqli_num_rows($resultado);
	//con un if compruebo si existe el usuario ya que $registro devolveria 1 si existe

	if($registros!=1)
		print "\t\t<p>No se encuentra el usuario</p>\n";

	else
	{
		$dato=mysqli_fetch_row($resultado);
		print '
		<form action="actualizar.php" method="GET">
		<p>Nombre:
		<input type="text" name="nombre" value="' . $dato[1] . '" size="18">
		Nick:
		<input type="text" name="nick" value="' . $dato[2] . '" size="8">
		Email:
		<input type="text" name="mail" value="' . $dato[4] . '" size="20">
		<input type="hidden" name="cod" value="' . $dato[0] . '"></p>
		<p><input type="submit" value="Actualizar"></p>
		</form>
		';
	}
	
	//Labores de limpieza:
	mysqli_free_result($resultado);
	mysqli_close($conexion);
?>
<!-- Ponemos un boton para volver a la tabla de usuarios -->
<p><a href="listado_usuarios_con_while.php">Volver a listado</p>
</body>
</html>