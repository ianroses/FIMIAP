-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-05-2017 a las 07:28:53
-- Versión del servidor: 5.5.50-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `FIMQRO`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `AccesoIT`
--

CREATE TABLE IF NOT EXISTS `AccesoIT` (
  `ID_Alumno` int(5) NOT NULL,
  `ID_Acceso` int(5) NOT NULL AUTO_INCREMENT,
  `Acceso` varchar(20) DEFAULT NULL,
  `Herramientas` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_Alumno`,`ID_Acceso`),
  UNIQUE KEY `ID_Acceso` (`ID_Acceso`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `AccesoIT`
--

INSERT INTO `AccesoIT` (`ID_Alumno`, `ID_Acceso`, `Acceso`, `Herramientas`) VALUES
(1115, 18, '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Alumnos`
--

CREATE TABLE IF NOT EXISTS `Alumnos` (
  `ID_Alumno` int(5) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) DEFAULT NULL,
  `Apellidos` varchar(100) DEFAULT NULL,
  `Calle_numero` varchar(100) DEFAULT NULL,
  `Colonia` varchar(50) DEFAULT NULL,
  `ZIP` decimal(5,0) DEFAULT NULL,
  `Municipio` varchar(50) DEFAULT NULL,
  `Ocupacion` varchar(50) DEFAULT NULL,
  `Estado_Civil` varchar(50) DEFAULT NULL,
  `Fecha_de_nacimiento` date DEFAULT NULL,
  `Genero` varchar(1) DEFAULT NULL,
  `Tcasa` decimal(10,0) DEFAULT NULL,
  `Tcel` decimal(10,0) DEFAULT NULL,
  `Estatus` varchar(50) DEFAULT NULL,
  `Contacto_Nombre` varchar(100) DEFAULT NULL,
  `Contacto_telefono` decimal(10,0) DEFAULT NULL,
  `medio_se_entero_FIM` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID_Alumno`),
  UNIQUE KEY `ID_Alumno` (`ID_Alumno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1116 ;

--
-- Volcado de datos para la tabla `Alumnos`
--

INSERT INTO `Alumnos` (`ID_Alumno`, `Nombre`, `Apellidos`, `Calle_numero`, `Colonia`, `ZIP`, `Municipio`, `Ocupacion`, `Estado_Civil`, `Fecha_de_nacimiento`, `Genero`, `Tcasa`, `Tcel`, `Estatus`, `Contacto_Nombre`, `Contacto_telefono`, `medio_se_entero_FIM`) VALUES
(1115, 'Fatima', 'de la O', 'calle 2', 'colonia e', 80090, 'El MarquÃ©s', 'ama de casa', 'Casada', '1991-03-21', 'M', 444444444, 333333333, 'Dada de alta', 'nombre de prueba', 111111111, 'Facebook');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Donaciones`
--

CREATE TABLE IF NOT EXISTS `Donaciones` (
  `RFC_donadores` varchar(13) NOT NULL,
  `ID_donacion` int(5) NOT NULL,
  `monto` decimal(10,2) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`RFC_donadores`,`ID_donacion`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Donaciones`
--

INSERT INTO `Donaciones` (`RFC_donadores`, `ID_donacion`, `monto`, `fecha`) VALUES
('CEOM580813D49', 1, 450.00, '2006-01-15 00:00:00'),
('CEOM580813D50', 2, 342.00, '2007-11-17 00:00:00'),
('CEOM580813D51', 3, 54.00, '2008-02-14 00:00:00'),
('CEOM580813D52', 4, 230.00, '2009-01-16 00:00:00'),
('CEOM580813D53', 5, 567.00, '2021-01-15 00:00:00'),
('CEOM580813D54', 6, 342.00, '2021-04-13 00:00:00'),
('CEOM580813D55', 7, 122.00, '2008-07-13 00:00:00'),
('CEOM580813D56', 8, 100.00, '2013-01-15 00:00:00'),
('CEOM580813D57', 9, 100.00, '2014-01-15 00:00:00'),
('CEOM580813D58', 10, 100.00, '2025-04-17 00:00:00'),
('CEOM580813D59', 11, 154.00, '2016-01-15 00:00:00'),
('CEOM580813D60', 12, 334.00, '2017-01-15 00:00:00'),
('CEOM580813D61', 13, 250.00, '2018-01-15 00:00:00'),
('CEOM580813D62', 14, 250.00, '2010-09-16 00:00:00'),
('CEOM580813D63', 15, 200.00, '2020-01-15 00:00:00'),
('CEOM580813D64', 16, 200.00, '2012-03-14 00:00:00'),
('CEOM580813D65', 17, 120.00, '2022-01-15 00:00:00'),
('CEOM580813D66', 18, 234.00, '2023-01-15 00:00:00'),
('CEOM580813D67', 19, 235.00, '2016-03-13 00:00:00'),
('CEOM580813D68', 20, 120.00, '2025-01-15 00:00:00'),
('CEOM580813D69', 1, 450.00, '2006-01-15 00:00:00'),
('CEOM580813D70', 2, 342.00, '2007-11-17 00:00:00'),
('CEOM580813D71', 3, 54.00, '2008-02-14 00:00:00'),
('CEOM580813D72', 4, 230.00, '2009-01-16 00:00:00'),
('CEOM580813D73', 5, 567.00, '2021-01-15 00:00:00'),
('CEOM580813D74', 6, 342.00, '2021-04-13 00:00:00'),
('CEOM580813D75', 7, 122.00, '2008-07-13 00:00:00'),
('CEOM580813D76', 8, 100.00, '2013-01-15 00:00:00'),
('CEOM580813D77', 9, 100.00, '2014-01-15 00:00:00'),
('CEOM580813D78', 10, 100.00, '2025-04-17 00:00:00'),
('CEOM580813D79', 11, 154.00, '2016-01-15 00:00:00'),
('CEOM580813D80', 12, 334.00, '2017-01-15 00:00:00'),
('CEOM580813D81', 13, 250.00, '2018-01-15 00:00:00'),
('CEOM580813D82', 14, 250.00, '2010-09-16 00:00:00'),
('CEOM580813D83', 15, 200.00, '2020-01-15 00:00:00'),
('CEOM580813D84', 16, 200.00, '2012-03-14 00:00:00'),
('CEOM580813D85', 17, 120.00, '2022-01-15 00:00:00'),
('CEOM580813D86', 18, 234.00, '2023-01-15 00:00:00'),
('CEOM580813D87', 19, 235.00, '2016-03-13 00:00:00'),
('CEOM580813D88', 20, 120.00, '2025-01-15 00:00:00'),
('CEOM580813D89', 1, 450.00, '2006-01-15 00:00:00'),
('CEOM580813D90', 2, 342.00, '2007-11-17 00:00:00'),
('CEOM580813D91', 3, 54.00, '2008-02-14 00:00:00'),
('CEOM580813D92', 4, 230.00, '2009-01-16 00:00:00'),
('CEOM580813D93', 5, 567.00, '2021-01-15 00:00:00'),
('CEOM580813D94', 6, 342.00, '2021-04-13 00:00:00'),
('CEOM580813D95', 7, 122.00, '2008-07-13 00:00:00'),
('CEOM580813D96', 8, 100.00, '2013-01-15 00:00:00'),
('CEOM580813D97', 9, 100.00, '2014-01-15 00:00:00'),
('CEOM580813D98', 10, 100.00, '2025-04-17 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Donadores`
--

CREATE TABLE IF NOT EXISTS `Donadores` (
  `RFC_Donadores` varchar(13) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `teléfono` decimal(10,0) DEFAULT NULL,
  `Calle_numero` varchar(100) DEFAULT NULL,
  `Colonia` varchar(50) DEFAULT NULL,
  `zip_code` decimal(5,0) DEFAULT NULL,
  `Municipio` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`RFC_Donadores`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Donadores`
--

INSERT INTO `Donadores` (`RFC_Donadores`, `nombre`, `teléfono`, `Calle_numero`, `Colonia`, `zip_code`, `Municipio`) VALUES
('CEOM580813D40', 'JUAN HERNANDEZ', 4426389952, 'CHAPULINES 43', 'LOS ARCOS', 76800, 'QUERETARO'),
('CEOM580813D41', 'FRANCISCO HERRERA', 4426389940, 'LOS ARCOS 89', 'LAS AMERICAS', 76500, 'COLON'),
('CEOM580813D42', 'DAVID CARRIZO', 4426389941, 'LA LLAVE 97', 'Arboledas', 76025, 'QUERETARO'),
('CEOM580813D43', 'PEDRO PEREZ', 4426389942, 'ABISMOS 66', 'Arboledas del Parque', 76423, 'COLON'),
('CEOM580813D44', 'RICARDO CORTES', 4426389943, 'JUAREZ 33', 'Arboledas del Río', 76535, 'COLON'),
('CEOM580813D45', 'ELENA SILCA', 4426389944, 'LOS PUENTES 323', 'Arquitos', 76800, 'SAN JUAN DEL RIO'),
('CEOM580813D46', 'JAIME HERNANDEZ', 4426389945, 'LAS HADAS 22', 'Arte Mexicano', 76500, 'QUERETARO'),
('CEOM580813D47', 'PERLA TOVAR', 4426389946, 'MAR MEDITERRANEO 01', 'Asalias', 76025, 'QUERETARO'),
('CEOM580813D48', 'NATALIA HERNANDEZ', 4426389947, 'LA SILLA 43', 'Club Campestre', 76423, 'SAN JUAN DEL RIO'),
('CEOM580813D49', 'PATRICIA TAMAYO', 4426389948, 'HERMES 22', 'Colibri', 76535, 'QUERETARO'),
('CEOM580813D50', 'FRIDA ELENA', 4426389949, 'CARRANZA 323', 'Colinas del Cimatario', 76800, 'EL MARQUES'),
('CEOM580813D51', 'JIMENO PELAEZ', 4426389950, 'LA LUNA 324', 'Colinas del Parque', 76500, 'EL MARQUES'),
('CEOM580813D52', 'ROBERTO GARCIA', 4426389951, 'SOR JUANA 34', 'Colinas del Poniente', 76025, 'EL MARQUES'),
('CEOM580813D53', 'ALEJANDRO BLANCO', 4426389952, 'LA NORTEADA 98', 'Colinas del Sur', 76423, 'EL MARQUES'),
('CEOM580813D54', 'RAMON FERNANDEZ', 4426389953, 'SANTORAL 76', 'El Arco', 76535, 'QUERETARO'),
('CEOM580813D55', 'JAMES RODRIGUEZ', 4426389954, 'TECNOLOGIA 56', 'El Bosque', 76800, 'QUERETARO'),
('CEOM580813D56', 'ANTONIO GRIS', 4426389955, 'GLOBO 23', 'El Campanario', 76500, 'SAN JUAN DEL RIO'),
('CEOM580813D57', 'MOCTEZUMA BLANCO', 4426389956, 'EL MARQUEZ 98', 'El Carrizal', 76025, 'QUERETARO'),
('CEOM580813D58', 'RAFAEL MARQUEZ', 4426389957, 'JURADO 71', 'El Cerrito', 76423, 'QUERETARO'),
('CEOM580813D59', 'SANTIAGO PUENTE', 4426389958, 'HERCULES 22', 'El Chamizal', 76535, 'QUERETARO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Empleado`
--

CREATE TABLE IF NOT EXISTS `Empleado` (
  `ID_Empleado` decimal(5,0) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `apellidos` varchar(30) DEFAULT NULL,
  `telefono_casa` varchar(10) DEFAULT NULL,
  `fecha_nacimiento` datetime DEFAULT NULL,
  `telefono_celular` varchar(10) DEFAULT NULL,
  `calle_numero` varchar(40) DEFAULT NULL,
  `colonia` varchar(25) DEFAULT NULL,
  `zip_code` decimal(5,0) DEFAULT NULL,
  `municipio` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`ID_Empleado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `FotosGaleria`
--

CREATE TABLE IF NOT EXISTS `FotosGaleria` (
  `ubicacion` varchar(300) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `ID_FotoGaleria` int(5) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID_FotoGaleria`),
  KEY `fecha` (`fecha`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Volcado de datos para la tabla `FotosGaleria`
--

INSERT INTO `FotosGaleria` (`ubicacion`, `fecha`, `titulo`, `ID_FotoGaleria`) VALUES
('galery/2017583398IMG_0872.jpg', '2017-05-08 03:39:08', 'Educar a una mujer es educar a una familia.', 23),
('galery/20175834032IMG_0845.JPG', '2017-05-08 03:40:32', 'Dona oxÃ­geno a nuestra sociedad.', 24),
('galery/2017583414IMG_0844.JPG', '2017-05-08 03:41:04', 'Educando para un mejor porvenir.', 25),
('galery/2017583579IMG_0846.JPG', '2017-05-08 03:57:09', 'La sociedad necesita de tÃ­.', 27);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Gastos`
--

CREATE TABLE IF NOT EXISTS `Gastos` (
  `ID_Gastos` int(5) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) DEFAULT NULL,
  `monto` decimal(10,2) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_Gastos`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1320 ;

--
-- Volcado de datos para la tabla `Gastos`
--

INSERT INTO `Gastos` (`ID_Gastos`, `descripcion`, `monto`, `fecha`) VALUES
(1316, 'GASTO DE PRUEBA', 100.00, '2017-05-01 00:00:00'),
(1317, 'prueba', 200.00, '2017-04-04 00:00:00'),
(1318, 'Gasto de prueba', 150.00, '2017-05-02 00:00:00'),
(1319, 'PapelerÃ­a', 23.00, '2017-05-01 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Gozan`
--

CREATE TABLE IF NOT EXISTS `Gozan` (
  `ID_Rol` int(5) NOT NULL,
  `ID_Privilegios` int(5) NOT NULL,
  PRIMARY KEY (`ID_Rol`,`ID_Privilegios`),
  KEY `ID_Privilegios` (`ID_Privilegios`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Gozan`
--

INSERT INTO `Gozan` (`ID_Rol`, `ID_Privilegios`) VALUES
(2, 24),
(3, 24),
(2, 25),
(3, 25),
(2, 26),
(3, 26),
(2, 27),
(3, 27),
(3, 28),
(2, 29),
(3, 29),
(3, 30),
(3, 31),
(3, 32);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `HistorialAcademico`
--

CREATE TABLE IF NOT EXISTS `HistorialAcademico` (
  `ID_Alumno` int(5) NOT NULL,
  `ID_HA` int(5) NOT NULL AUTO_INCREMENT,
  `Grado_estudios` varchar(50) DEFAULT NULL,
  `Status` varchar(30) DEFAULT NULL,
  `anios_suspension` int(4) DEFAULT NULL,
  `motivo_suspension_estudios` varchar(200) DEFAULT NULL,
  `otros_estudios` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ID_Alumno`,`ID_HA`),
  UNIQUE KEY `ID_HA` (`ID_HA`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Volcado de datos para la tabla `HistorialAcademico`
--

INSERT INTO `HistorialAcademico` (`ID_Alumno`, `ID_HA`, `Grado_estudios`, `Status`, `anios_suspension`, `motivo_suspension_estudios`, `otros_estudios`) VALUES
(1115, 28, '', '', 0, '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Imagen`
--

CREATE TABLE IF NOT EXISTS `Imagen` (
  `ubicacion` varchar(300) NOT NULL,
  `ID_Noticia` int(5) NOT NULL,
  `descripcion` varchar(400) DEFAULT NULL,
  PRIMARY KEY (`ubicacion`,`ID_Noticia`),
  KEY `ID_Noticia` (`ID_Noticia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Imagen`
--

INSERT INTO `Imagen` (`ubicacion`, `ID_Noticia`, `descripcion`) VALUES
('imagenesNoticias/201759233120Cuidadoras MKTG.jpg', 1133, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Impartidos`
--

CREATE TABLE IF NOT EXISTS `Impartidos` (
  `ID_Taller` int(5) NOT NULL,
  `ID_Usuario` int(5) NOT NULL,
  PRIMARY KEY (`ID_Taller`,`ID_Usuario`),
  KEY `ID_Empleado` (`ID_Usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Impartidos`
--

INSERT INTO `Impartidos` (`ID_Taller`, `ID_Usuario`) VALUES
(1, 101),
(2, 102),
(3, 103),
(4, 104),
(5, 105),
(6, 106),
(7, 107),
(8, 108),
(9, 109),
(10, 110),
(11, 111),
(12, 112),
(13, 113),
(14, 114),
(15, 115),
(16, 116),
(17, 117),
(18, 118),
(19, 119),
(20, 120);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `infoFIM`
--

CREATE TABLE IF NOT EXISTS `infoFIM` (
  `ID_info` int(5) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`ID_info`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `infoFIM`
--

INSERT INTO `infoFIM` (`ID_info`, `nombre`, `descripcion`) VALUES
(1, 'Misi&oacute;n', '<p>Somos una instituci&oacute;n social independiente preocupada por cada persona, que se dedica a dar soluciones de reales inserci&oacute;n laboral normalizada para revertir el proceso de exclusi&oacute;n social y para que puedan ser protagonistas de sus vidas.</p>'),
(2, 'Visi&oacute;n', '<p>Lograr una contribuci&oacute;n significativa contra el regazo educativo que sufre la poblaci&oacute;n femenina de nuestro estado.</p>'),
(3, 'Objetivos', '<p>Ofrecer un sistema abierto para que cualquier mujer pueda estudiar en los horarios que se le acomoden. Ofrecer horarios flexibles, cuotas accesibles, experiencia, calidad y certificaciones de INEA y SEP.</p>'),
(0, '&iquest;Qui&eacute;nes somos?', '<p>Somos una organizaci&oacute;n mexicana sin fines de lucro, ofreciendo una formaci&oacute;n integral a mujeres, apoy&aacute;ndolas en su superaci&oacute;n acad&eacute;mica, en el uso de tecnolog&iacute;a, para el emprendimiento, la econom&iacute;a familiar y valores; sabedores que ello las apoyar&aacute; a transitar desde una situaci&oacute;n de&nbsp;&#39;marginalidad y subordinaci&oacute;n, hasta situaciones de autonom&iacute;a y posibilidad de intervenci&oacute;n&#39;, en sus familias y comunidades.</p><p>&nbsp;</p>');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `InfoLaboral`
--

CREATE TABLE IF NOT EXISTS `InfoLaboral` (
  `ID_Alumno` int(5) NOT NULL,
  `ID_Lab` int(5) NOT NULL AUTO_INCREMENT,
  `Empresa` varchar(100) DEFAULT NULL,
  `Puesto` varchar(50) DEFAULT NULL,
  `Antiguedad` int(4) DEFAULT NULL,
  PRIMARY KEY (`ID_Alumno`,`ID_Lab`),
  UNIQUE KEY `ID_Lab` (`ID_Lab`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Volcado de datos para la tabla `InfoLaboral`
--

INSERT INTO `InfoLaboral` (`ID_Alumno`, `ID_Lab`, `Empresa`, `Puesto`, `Antiguedad`) VALUES
(1115, 23, '', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Inscriben`
--

CREATE TABLE IF NOT EXISTS `Inscriben` (
  `monto` decimal(10,2) NOT NULL,
  `fecha` date NOT NULL,
  `ID_Alumno` int(5) NOT NULL,
  `ID_Taller` int(5) NOT NULL,
  PRIMARY KEY (`monto`,`fecha`,`ID_Alumno`,`ID_Taller`),
  KEY `ID_Alumno` (`ID_Alumno`),
  KEY `ID_Taller` (`ID_Taller`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Noticia`
--

CREATE TABLE IF NOT EXISTS `Noticia` (
  `ID_Noticia` int(5) NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(30) NOT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `descripcion` varchar(10000) DEFAULT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`ID_Noticia`,`nombre_usuario`),
  KEY `nombreUsuario` (`nombre_usuario`),
  KEY `ID_Noticia` (`ID_Noticia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1134 ;

--
-- Volcado de datos para la tabla `Noticia`
--

INSERT INTO `Noticia` (`ID_Noticia`, `nombre_usuario`, `titulo`, `descripcion`, `fecha`) VALUES
(1133, 'admin1@fimiap.org', 'AutoemplÃ©ate.', '<p>Al terminar el curso el alumno contar&aacute; con los conocimiento te&oacute;ricos/pr&aacute;citcos para poder antender a personas &quot;adultas mayores&quot; con y sin discapacidad que le permitan ofrecer una mejor atenci&oacute;n con un efoque humanista, siendo prioridad la recuperaci&oacute;n funcional y psicol&oacute;gica de &eacute;ste, otorg&aacute;ndole al adulto, mayor calidad de vida.</p>', '2017-05-09 23:31:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Privilegios`
--

CREATE TABLE IF NOT EXISTS `Privilegios` (
  `ID_Privilegios` int(5) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`ID_Privilegios`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Volcado de datos para la tabla `Privilegios`
--

INSERT INTO `Privilegios` (`ID_Privilegios`, `descripcion`) VALUES
(24, 'Alumnos'),
(25, 'Inscribir Taller'),
(26, 'Talleres'),
(27, 'Noticia'),
(28, 'Galer&iacute;a de Im&aacute;genes'),
(29, 'Gastos'),
(30, 'Usuarios'),
(31, 'Donaciones'),
(32, 'Informaci&oacute;n Institucional');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Rol`
--

CREATE TABLE IF NOT EXISTS `Rol` (
  `ID_ROL` int(5) NOT NULL AUTO_INCREMENT,
  `nombreRol` varchar(20) NOT NULL,
  PRIMARY KEY (`ID_ROL`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `Rol`
--

INSERT INTO `Rol` (`ID_ROL`, `nombreRol`) VALUES
(1, 'ADMINISTRADOR'),
(2, 'ADMINISTRATIVO'),
(3, 'ADMINISTRADOR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Situacion`
--

CREATE TABLE IF NOT EXISTS `Situacion` (
  `ID_Alumno` int(5) NOT NULL,
  `ID_Situacion` int(5) NOT NULL AUTO_INCREMENT,
  `vivienda_compartida` varchar(50) DEFAULT NULL,
  `responsable_pago` varchar(50) DEFAULT NULL,
  `parentesco` varchar(20) DEFAULT NULL,
  `situacion_vivienda` varchar(50) DEFAULT NULL,
  `fuente_ingresos` varchar(30) DEFAULT NULL,
  `monto_ingresos` decimal(10,2) DEFAULT NULL,
  `servicios` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ID_Alumno`,`ID_Situacion`),
  UNIQUE KEY `ID_Situacion` (`ID_Situacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `Situacion`
--

INSERT INTO `Situacion` (`ID_Alumno`, `ID_Situacion`, `vivienda_compartida`, `responsable_pago`, `parentesco`, `situacion_vivienda`, `fuente_ingresos`, `monto_ingresos`, `servicios`) VALUES
(1115, 17, 'CÃ³nyugue', '', '', '', '', 0.00, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Taller`
--

CREATE TABLE IF NOT EXISTS `Taller` (
  `ID_Taller` int(5) NOT NULL AUTO_INCREMENT,
  `nombre_taller` varchar(50) DEFAULT NULL,
  `horarios` varchar(200) DEFAULT NULL,
  `costo` decimal(10,0) NOT NULL,
  `descripcion` varchar(700) NOT NULL,
  PRIMARY KEY (`ID_Taller`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=117 ;

--
-- Volcado de datos para la tabla `Taller`
--

INSERT INTO `Taller` (`ID_Taller`, `nombre_taller`, `horarios`, `costo`, `descripcion`) VALUES
(116, 'ComputaciÃ³n', 'SÃ¡bado de 8:30 a 13:00', 0, 'Si ya cuentas con los conocimientos bÃ¡sico, inscrÃ­bete a este taller para continuar con tu capacit');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuarios`
--

CREATE TABLE IF NOT EXISTS `Usuarios` (
  `ID_Usuario` int(5) NOT NULL AUTO_INCREMENT,
  `ID_ROL` int(5) NOT NULL,
  `nombre_usuario` varchar(30) NOT NULL DEFAULT '',
  `contrasena` varchar(15) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `apellidos` varchar(30) DEFAULT NULL,
  `telefono_casa` varchar(10) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `telefono_celular` varchar(10) DEFAULT NULL,
  `calle_numero` varchar(40) DEFAULT NULL,
  `colonia` varchar(25) DEFAULT NULL,
  `zip_code` int(5) DEFAULT NULL,
  `municipio` varchar(15) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`nombre_usuario`,`ID_Usuario`,`ID_ROL`),
  UNIQUE KEY `ID_Usuario` (`ID_Usuario`),
  UNIQUE KEY `nombre_usuario` (`nombre_usuario`),
  KEY `ID_ROL` (`ID_ROL`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Volcado de datos para la tabla `Usuarios`
--

INSERT INTO `Usuarios` (`ID_Usuario`, `ID_ROL`, `nombre_usuario`, `contrasena`, `nombre`, `apellidos`, `telefono_casa`, `fecha_nacimiento`, `telefono_celular`, `calle_numero`, `colonia`, `zip_code`, `municipio`, `email`) VALUES
(27, 3, 'admin1@fimiap.org', '123456abc', 'Daniel', 'Amezcua', '8711788877', '0000-00-00', '8711788877', 'Camino Real 114', 'Girasoles', 67000, NULL, 'admin1@fimiap.org'),
(2, 3, 'salmon@fimiap.org', '1234567890', 'AlejandrÃ³', 'SalmÃ³n FÃ©lix DÃ­az', '4423596210', '1992-10-30', '4423596', 'Av. Campanario 98', 'Campanario', 76125, 'QuerÃ©taro', 'salmon@fimiap.org');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `AccesoIT`
--
ALTER TABLE `AccesoIT`
  ADD CONSTRAINT `AccesoIT_ibfk_1` FOREIGN KEY (`ID_Alumno`) REFERENCES `Alumnos` (`ID_Alumno`) ON DELETE CASCADE;

--
-- Filtros para la tabla `Gozan`
--
ALTER TABLE `Gozan`
  ADD CONSTRAINT `FK1_Gozan` FOREIGN KEY (`ID_Rol`) REFERENCES `Rol` (`ID_ROL`),
  ADD CONSTRAINT `FK2_Gozan` FOREIGN KEY (`ID_Privilegios`) REFERENCES `Privilegios` (`ID_Privilegios`);

--
-- Filtros para la tabla `HistorialAcademico`
--
ALTER TABLE `HistorialAcademico`
  ADD CONSTRAINT `HistorialAcademico_ibfk_1` FOREIGN KEY (`ID_Alumno`) REFERENCES `Alumnos` (`ID_Alumno`) ON DELETE CASCADE;

--
-- Filtros para la tabla `Imagen`
--
ALTER TABLE `Imagen`
  ADD CONSTRAINT `Imagen_ibfk_1` FOREIGN KEY (`ID_Noticia`) REFERENCES `Noticia` (`ID_Noticia`) ON DELETE CASCADE;

--
-- Filtros para la tabla `InfoLaboral`
--
ALTER TABLE `InfoLaboral`
  ADD CONSTRAINT `InfoLaboral_ibfk_1` FOREIGN KEY (`ID_Alumno`) REFERENCES `Alumnos` (`ID_Alumno`) ON DELETE CASCADE;

--
-- Filtros para la tabla `Inscriben`
--
ALTER TABLE `Inscriben`
  ADD CONSTRAINT `FK2Inscriben` FOREIGN KEY (`ID_Taller`) REFERENCES `Taller` (`ID_Taller`),
  ADD CONSTRAINT `FKInscriben` FOREIGN KEY (`ID_Alumno`) REFERENCES `Alumnos` (`ID_Alumno`);

--
-- Filtros para la tabla `Situacion`
--
ALTER TABLE `Situacion`
  ADD CONSTRAINT `Situacion_ibfk_1` FOREIGN KEY (`ID_Alumno`) REFERENCES `Alumnos` (`ID_Alumno`) ON DELETE CASCADE;

--
-- Filtros para la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD CONSTRAINT `FK_Usuarios` FOREIGN KEY (`ID_ROL`) REFERENCES `Rol` (`ID_ROL`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
