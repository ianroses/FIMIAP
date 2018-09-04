-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-03-2017 a las 23:54:26
-- Versión del servidor: 5.5.50-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `Examen`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Registros`
--

CREATE TABLE IF NOT EXISTS `Registros` (
  `HoraAcceso` datetime NOT NULL,
  `Info` varchar(30) NOT NULL,
  `Numeros` varchar(50) NOT NULL,
  `gapMin` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Registros`
--

INSERT INTO `Registros` (`HoraAcceso`, `Info`, `Numeros`, `gapMin`) VALUES
('2017-03-24 21:45:18', 'SYSTEM FAILURE', 'ddd', 0),
('2017-03-24 21:46:58', 'SYSTEM FAILURE', 'ddd', 0),
('2017-03-24 21:55:58', 'SYSTEM FAILURE', '4 8 15 16 23 42', 0),
('2017-03-24 21:58:38', 'SYSTEM FAILURE', 'j', 0),
('2017-03-24 21:59:50', 'SYSTEM FAILURE', 'gyfy', 0),
('2017-03-24 22:00:28', 'SYSTEM FAILURE', 'gyfy', 0),
('2017-03-24 22:03:36', 'SYSTEM FAILURE', 'm', 0),
('2017-03-24 22:05:14', 'SYSTEM FAILURE', 'ftcvt', 0),
('2017-03-24 22:10:21', 'SYSTEM FAILURE', 'ftcvt', 0),
('2017-03-24 22:10:31', 'SYSTEM FAILURE', 'f', 0),
('2017-03-24 22:11:20', 'SYSTEM FAILURE', 'f', 0),
('2017-03-24 22:11:36', 'SYSTEM FAILURE', 'dew', 0),
('2017-03-24 22:11:41', 'SYSTEM FAILURE', 'dew', 0),
('2017-03-24 22:12:01', 'SYSTEM FAILURE', 'ddd', 0),
('2017-03-24 22:12:10', 'SYSTEM FAILURE', 'ddd', 0),
('2017-03-24 22:18:52', 'SYSTEM FAILURE', 'ddd', 0),
('2017-03-24 22:19:45', 'SYSTEM FAILURE', 'ddd', 1),
('2017-03-24 22:31:02', 'SUCCESS', '4 8 15 16 23 42', 0),
('2017-03-24 22:51:44', 'SUCCESS', '4 8 15 16 23 42', 0),
('2017-03-24 22:55:41', 'SYSTEM FAILURE', 'dd', 1),
('2017-03-24 23:11:13', 'SYSTEM FAILURE', 'ddddsdasd', 14),
('2017-03-24 23:15:09', 'SYSTEM FAILURE', 's', 18),
('2017-03-24 23:18:54', 'SYSTEM FAILURE', 'w', 21),
('2017-03-24 23:24:24', 'SYSTEM FAILURE', 'ddas', -24839903),
('2017-03-24 23:29:05', 'SYSTEM FAILURE', 'c', -24839903);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
