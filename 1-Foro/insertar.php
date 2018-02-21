<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" >
<title>Insercion usuario </title>
</head>
<body>
<h3> Insercion usuario </h3>
<?php
	include("/var/www/config.inc.php");

	//Primero conectamos con la base de datos, Si anteponemos @ no escribe el error por defecto
	@ $conexion = mysqli_connect($servidor, $usuarioBD, $contrasenyaBD);
	
	if(!$conexion)
		die("Imposible conectar. Error n&uacute;mero ".mysqli_errno().": ".mysqli_error());
	
	//Abrimos la BBDDD
	mysqli_select_db($conexion, 'foro') or die('Imposible abrir la BBDD: '.mysqli_error());
	
	//Creamos la query
	$consulta="SELECT * FROM usuarios WHERE nick='".$_GET['nick']."'";
	
	//Mandamos la query al servidor de BBDD, Si algo ha ido mal, $resultado se interpreta como falso
	$resultado=mysqli_query($conexion, $consulta) or die("Imposible consultar: ".mysqli_error());
	$registros=mysqli_num_rows($resultado);
	
	//print "<pre>".print_r($registros)."<pre>" ;
	//con un if compruebo si existe el usuario ya que $registro devolveria 1 si existe
	if($registros==0)
	{
		//$passwd=MD5($_GET['clave']);
		//inserto el usuario indicado
		$inserto="INSERT INTO `foro`.`usuarios`
		(
		`nombre`, `nick`, `clave`, `email`
		)
		VALUES
		(
		'".$_GET['nombre']."', '".$_GET['nick']."', '".MD5($_GET['clave'])."', '".$_GET['mail']."'
		);";
		
		mysqli_query($conexion, $inserto) or die("Imposible insertar usuario");
		
		/*El codigo de error se puede poner tambien de esta manera:
		if(!mysql_query($sql))
		print "Imposible insertar: ".mysql_error();
		*/
		print "\t <p>Usuario insertado</p>\n";
		
		//Labores de limpieza:
		//mysql_free_result($resultado);
		mysqli_close($conexion);
	}
	else
	{
		print "\t <p>El nick que has puesto ya existe, cambialo</p>\n";
		print "\t\t<p><a href=\"insertar_ficha.html\">Volver al formulario</p>\n";
	}
?>
<p><a href="listado_usuarios_con_for.php">Volver al listado de usuarios</a></p>
</body>
</html>