<?php
	include("/var/www/config.inc.php");

	$conexion = mysqli_connect($servidor, $usuarioBD, $contrasenyaBD);
	
	if(!$conexion)
		die("Imposible conectar. Error n&uacute;mero ".mysqli_errno().": ".mysqli_error());
	
	mysqli_select_db($conexion, 'foro') or die('Imposible abrir la BBDD: '.mysqli_error());

	$consulta="DROP TABLE usuarios;";
	
	mysqli_query($conexion, $consulta) or die("Imposible consultar1: ".mysqli_error());	
	
	$consulta="CREATE TABLE `usuarios` (
				  `cod_usu` int(11) NOT NULL,
				  `nombre` varchar(30) NOT NULL,
				  `nick` varchar(20) NOT NULL,
				  `clave` varchar(50) NOT NULL,
				  `email` varchar(50) NOT NULL
				) ENGINE=InnoDB DEFAULT CHARSET=latin1; 
			  ";
	
	mysqli_query($conexion, $consulta) or die("Imposible consultar2: ".mysqli_error());	
				
	$consulta = "ALTER TABLE `usuarios` ADD PRIMARY KEY (`cod_usu`);";
				  
	mysqli_query($conexion, $consulta) or die("Imposible consultar3: ".mysqli_error());		

	$consulta = "ALTER TABLE `usuarios` MODIFY `cod_usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;";
	
	mysqli_query($conexion, $consulta) or die("Imposible consultar4: ".mysqli_error());	
			
	mysqli_select_db($conexion, 'foro') or die('Imposible abrir la BBDD: '.mysqli_error());
	
	$consulta = "INSERT INTO `usuarios` (`cod_usu`, `nombre`, `nick`, `clave`, `email`) VALUES
					(1, 'Juan Navarro', 'juan', '827ccb0eea8a706c4c34a16891f84e7b', 'juan@micorreo.com'),
					(2, 'Javi Valencia', 'javi', '827ccb0eea8a706c4c34a16891f84e7b', 'javi@micorreo.com'),
					(3, 'Maialen Ferola', 'maialen', '827ccb0eea8a706c4c34a16891f84e7b', 'maialen@micorreo.com'),
					(4, 'Unai NiÃ±o', 'unai', '827ccb0eea8a706c4c34a16891f84e7b', 'unai@micorreo.com'),
					(5, 'Natxo Txarrabi', 'natxo', '827ccb0eea8a706c4c34a16891f84e7b', 'natxo@micorreo.com');
				";
		
	mysqli_query($conexion, $consulta) or die("Imposible consultar5: ".mysqli_error());	
	
	echo "\t <p>Carga masiva realizada</p>\n";
		
	mysqli_close($conexion);
?>
<p><a href="listado_usuarios_con_for.php">Volver al listado de usuarios</a></p>
</body>
</html>