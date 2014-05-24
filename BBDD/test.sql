-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-05-2014 a las 16:38:20
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `test`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejemplares`
--

CREATE TABLE IF NOT EXISTS `ejemplares` (
  `idEjemplar` int(11) NOT NULL AUTO_INCREMENT,
  `idLibro` int(11) NOT NULL,
  `libroPrestado` tinyint(1) NOT NULL,
  `localizacion` varchar(255) DEFAULT NULL,
  `comentarios` text,
  PRIMARY KEY (`idEjemplar`,`idLibro`),
  KEY `idLibro` (`idLibro`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `ejemplares`
--

INSERT INTO `ejemplares` (`idEjemplar`, `idLibro`, `libroPrestado`, `localizacion`, `comentarios`) VALUES
(1, 1, 0, 'Departamento Informatica', 'Sin comentarios'),
(1, 24, 0, 'Departamento Informatica', 'Sin comentarios'),
(2, 1, 0, 'Departamento Informatica', 'Sin comentarios'),
(2, 24, 0, 'Departamento Informatica', 'Sin comentarios'),
(3, 24, 0, 'Departamento Informatica', 'Sin comentarios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE IF NOT EXISTS `libros` (
  `idLibro` int(11) NOT NULL AUTO_INCREMENT,
  `tituloLibro` varchar(255) NOT NULL,
  `ISBN` int(11) NOT NULL,
  `autor` varchar(20) NOT NULL,
  `editorial` varchar(255) NOT NULL,
  `edicion` varchar(255) NOT NULL,
  `comentarios` text NOT NULL,
  PRIMARY KEY (`idLibro`),
  UNIQUE KEY `ISBN` (`ISBN`),
  UNIQUE KEY `tituloLibro` (`tituloLibro`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`idLibro`, `tituloLibro`, `ISBN`, `autor`, `editorial`, `edicion`, `comentarios`) VALUES
(1, 'ASO', 11111, 'IAW', 'IAW', 'IAW', 'IAW'),
(24, 'ISO', 8888, 'ISO', 'ISO', 'ISO', 'ISO'),
(27, 'SAD', 22222, 'SAD', 'SAD', 'SAD', 'SAD'),
(31, 'SRI', 12345, 'SRI', 'SRI', 'SRI', 'SRI'),
(32, 'LM', 59595, 'LM', 'LM', 'LM', 'LM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE IF NOT EXISTS `prestamos` (
  `idPrestamo` int(11) NOT NULL AUTO_INCREMENT,
  `idLibro` int(11) NOT NULL,
  `idEjemplar` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL DEFAULT '0000-00-00',
  `estaActivo` tinyint(1) NOT NULL,
  `comentarios` text,
  PRIMARY KEY (`idPrestamo`,`idLibro`,`idEjemplar`),
  KEY `idEjemplar` (`idEjemplar`),
  KEY `prestamos_ibfk_1` (`idLibro`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Volcado de datos para la tabla `prestamos`
--

INSERT INTO `prestamos` (`idPrestamo`, `idLibro`, `idEjemplar`, `idUsuario`, `fechaInicio`, `fechaFin`, `estaActivo`, `comentarios`) VALUES
(49, 24, 3, 21, '2014-05-24', '2014-01-01', 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipocuenta`
--

CREATE TABLE IF NOT EXISTS `tipocuenta` (
  `idTipoCuenta` int(11) NOT NULL AUTO_INCREMENT,
  `nombreTipoCuenta` varchar(255) NOT NULL,
  `descripcionTipoCuenta` varchar(255) NOT NULL,
  PRIMARY KEY (`idTipoCuenta`),
  UNIQUE KEY `nombreTipoCuenta` (`nombreTipoCuenta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tipocuenta`
--

INSERT INTO `tipocuenta` (`idTipoCuenta`, `nombreTipoCuenta`, `descripcionTipoCuenta`) VALUES
(1, 'A', 'Administrador'),
(2, 'P', 'Profesor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `tipoCuenta` char(1) NOT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombre`, `clave`, `tipoCuenta`) VALUES
(21, 'admin', '$2y$10$deAZDNb2DlvMt54G5vi5OOV1p4TFB43ttRlCVhY.W4R/E8zW4L46i', 'A'),
(30, 'prueba', '$2y$10$X9zDL5JmDD/IsSW10mGAuuIvYOfbhjulaGONOSKdkTQ.uN1ctgy1i', 'P'),
(32, 'jose', '$2y$10$mTRS/CEhmwCubiEE/WrFROUzjEneEJWvlu.ZBm6lR.JQuh/fVz.HK', 'P');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ejemplares`
--
ALTER TABLE `ejemplares`
  ADD CONSTRAINT `ejemplares_ibfk_1` FOREIGN KEY (`idLibro`) REFERENCES `libros` (`idLibro`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
