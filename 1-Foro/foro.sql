SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `foro` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `foro`;

CREATE TABLE `usuarios` (
  `cod_usu` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `nick` varchar(20) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `usuarios` (`cod_usu`, `nombre`, `nick`, `clave`, `email`) VALUES
(1, 'Juan Navarro', 'juan', '827ccb0eea8a706c4c34a16891f84e7b', 'juan@micorreo.com'),
(2, 'Javi Valencia', 'javi', '827ccb0eea8a706c4c34a16891f84e7b', 'javi@micorreo.com'),
(3, 'Maialen Ferola', 'maialen', '827ccb0eea8a706c4c34a16891f84e7b', 'maialen@micorreo.com'),
(4, 'Unai Niño', 'unai', '827ccb0eea8a706c4c34a16891f84e7b', 'unai@micorreo.com'),
(5, 'Natxo Txarrabi', 'natxo', '827ccb0eea8a706c4c34a16891f84e7b', 'natxo@micorreo.com');


ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cod_usu`);


ALTER TABLE `usuarios`
  MODIFY `cod_usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;USE `phpmyadmin`;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
