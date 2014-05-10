-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-05-2014 a las 20:31:09
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`idLibro`, `tituloLibro`, `ISBN`, `autor`, `editorial`, `edicion`, `comentarios`) VALUES
(1, 'Poemas', 0, 'Pepe', 'pipa', 'Pepeeee', 'Libro de Poemas de Pepeee'),
(4, 'ASO', 2147483647, 'aso', 'aso', 'aso', 'asoLibro'),
(6, 'IAW', 1233333333, 'IAW', 'IAW', 'IAW', 'Libro de IAW');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `clave` int(11) NOT NULL,
  `tipoCuenta` char(1) NOT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombre`, `clave`, `tipoCuenta`) VALUES
(8, 'admin', 12345, 'A'),
(10, 'prueba', 111178, 'P'),
(21, 'pepe', 77, 'P');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
