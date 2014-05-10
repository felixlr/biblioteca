-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-05-2014 a las 20:50:49
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `v1_biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores`
--

CREATE TABLE IF NOT EXISTS `autores` (
  `idAutor` int(11) NOT NULL,
  `nombreAutor` varchar(255) NOT NULL,
  PRIMARY KEY (`idAutor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autoreslibro`
--

CREATE TABLE IF NOT EXISTS `autoreslibro` (
  `idLibro` int(11) NOT NULL,
  `idAutor` int(11) NOT NULL,
  PRIMARY KEY (`idLibro`,`idAutor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editoriales`
--

CREATE TABLE IF NOT EXISTS `editoriales` (
  `idEditorial` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `personaContacto` varchar(255) NOT NULL,
  `telefono` int(11) NOT NULL,
  `correo` varchar(255) NOT NULL,
  PRIMARY KEY (`idEditorial`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejemplares`
--

CREATE TABLE IF NOT EXISTS `ejemplares` (
  `idLibro` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `localizacion` varchar(255) NOT NULL,
  `comentario` text NOT NULL,
  PRIMARY KEY (`idLibro`,`num`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE IF NOT EXISTS `libros` (
  `idLibro` int(11) NOT NULL AUTO_INCREMENT,
  `tituloLibro` varchar(255) NOT NULL,
  `isbn` int(11) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `editorial` varchar(255) NOT NULL,
  `edicion` varchar(255) NOT NULL,
  `comentarios` text NOT NULL,
  `fotoLibro` varchar(255) NOT NULL,
  PRIMARY KEY (`idLibro`),
  UNIQUE KEY `isbn` (`isbn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materialibro`
--

CREATE TABLE IF NOT EXISTS `materialibro` (
  `idLibro` int(11) NOT NULL,
  `idMateria` int(11) NOT NULL,
  PRIMARY KEY (`idLibro`,`idMateria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE IF NOT EXISTS `materias` (
  `idMateria` int(11) NOT NULL AUTO_INCREMENT,
  `nombreMateria` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  PRIMARY KEY (`idMateria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipocuenta`
--

CREATE TABLE IF NOT EXISTS `tipocuenta` (
  `idTipoAcceso` int(11) NOT NULL AUTO_INCREMENT,
  `nombreTipoAcceso` varchar(255) NOT NULL,
  PRIMARY KEY (`idTipoAcceso`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tipocuenta`
--

INSERT INTO `tipocuenta` (`idTipoAcceso`, `nombreTipoAcceso`) VALUES
(1, 'Administrador'),
(2, 'Profesor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `dni` char(9) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `movil` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `idTipoCuenta` int(11) NOT NULL,
  `anio` year(4) NOT NULL,
  PRIMARY KEY (`idUsuario`),
  UNIQUE KEY `dni` (`dni`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
