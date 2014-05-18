-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-05-2014 a las 22:14:00
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
(1, 1, 1, 'Departamento Informatica Repisa 1', 'Nuevo Ejemplar'),
(1, 18, 0, 'Departamento Informatica Repisa 2', 'Nuevo Ejemplar'),
(2, 1, 1, 'Departamento Informatica Repisa 1', 'Ejemplar Nuevo'),
(2, 18, 0, 'Departamento Informatica Repisa 2', 'Ejemplar Nuevo'),
(3, 1, 1, 'Departamento Informatica Repisa 1', 'Ejemplar Nuevo');

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
  UNIQUE KEY `ISBN` (`ISBN`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`idLibro`, `tituloLibro`, `ISBN`, `autor`, `editorial`, `edicion`, `comentarios`) VALUES
(1, 'IAW', 7777777, 'IAW', 'IAW', 'IAW', 'IAW'),
(18, 'ASO', 9999999, 'ASO', 'ASO', '9999', 'ASO'),
(20, 'GBD', 7777, 'Editor', 'Editor', 'Editor', 'Nuevo'),
(21, 'SAD', 777777, 'SAD', 'SAD', 'SAD', 'SAD');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE IF NOT EXISTS `prestamos` (
  `idPrestamo` int(11) NOT NULL AUTO_INCREMENT,
  `idLibro` int(11) NOT NULL,
  `idEjemplar` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `fechaInicio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaFin` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comentarios` text,
  PRIMARY KEY (`idPrestamo`,`idLibro`,`idEjemplar`),
  KEY `idLibro` (`idLibro`),
  KEY `idEjemplar` (`idEjemplar`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `prestamos`
--

INSERT INTO `prestamos` (`idPrestamo`, `idLibro`, `idEjemplar`, `idUsuario`, `fechaInicio`, `fechaFin`, `comentarios`) VALUES
(9, 1, 1, 21, '2014-05-18 18:45:13', '0000-00-00 00:00:00', 'Sin comentarios'),
(10, 1, 3, 25, '2014-05-18 19:39:39', '0000-00-00 00:00:00', 'Sin comentarios'),
(11, 1, 2, 25, '2014-05-18 19:40:49', '0000-00-00 00:00:00', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombre`, `clave`, `tipoCuenta`) VALUES
(21, 'admin', '$2y$10$deAZDNb2DlvMt54G5vi5OOV1p4TFB43ttRlCVhY.W4R/E8zW4L46i', 'A'),
(24, 'prueba', '$2y$10$zGvkm0rFEatPsP1gv0RffOzozSdOHMmS8spPJPo7jQIGo5IDJOfZi', 'P'),
(25, 'pepe', '$2y$10$8kEhyFn3zAXCSelgsabEDuQBYLDPTU.dti.0xj9I.Upi8Yp6B7iE2', 'P');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ejemplares`
--
ALTER TABLE `ejemplares`
  ADD CONSTRAINT `ejemplares_ibfk_1` FOREIGN KEY (`idLibro`) REFERENCES `libros` (`idLibro`);

--
-- Filtros para la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD CONSTRAINT `prestamos_ibfk_1` FOREIGN KEY (`idLibro`) REFERENCES `ejemplares` (`idLibro`),
  ADD CONSTRAINT `prestamos_ibfk_2` FOREIGN KEY (`idEjemplar`) REFERENCES `ejemplares` (`idEjemplar`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
