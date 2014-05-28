-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-05-2014 a las 06:40:47
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejemplares`
--

CREATE TABLE IF NOT EXISTS `ejemplares` (
  `idEjemplar` int(11) NOT NULL AUTO_INCREMENT,
  `idLibro` int(11) NOT NULL,
  `estaPrestado` tinyint(1) NOT NULL,
  `localizacion` varchar(255) DEFAULT NULL,
  `comentariosEjemplares` text,
  PRIMARY KEY (`idEjemplar`,`idLibro`),
  KEY `idLibro` (`idLibro`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `ejemplares`
--

INSERT INTO `ejemplares` (`idEjemplar`, `idLibro`, `estaPrestado`, `localizacion`, `comentariosEjemplares`) VALUES
(1, 1, 0, 'Departamento Informatica', 'Ejemplar nuevo.'),
(1, 2, 0, 'Departamento Informatica', 'Nuevo ejemplar'),
(1, 3, 1, 'Departamento Informatica', 'Nuevo ejemplar'),
(2, 1, 0, 'Departamento Informatica', 'Nuevo ejemplar'),
(2, 3, 0, 'Departamento Informatica', 'Nuevo ejemplar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historialprestamos`
--

CREATE TABLE IF NOT EXISTS `historialprestamos` (
  `idHistorial` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `tituloLibro` varchar(255) NOT NULL,
  `idLibro` int(11) NOT NULL,
  `idEjemplar` int(11) NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL,
  `comentariosHistorial` text,
  PRIMARY KEY (`idHistorial`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `historialprestamos`
--

INSERT INTO `historialprestamos` (`idHistorial`, `nombre`, `idUsuario`, `tituloLibro`, `idLibro`, `idEjemplar`, `fechaInicio`, `fechaFin`, `comentariosHistorial`) VALUES
(1, 'pepe', 7, 'ASO', 2, 1, '2014-05-27', '2014-01-01', 'Sin comentarios'),
(4, 'admin', 1, 'IAW', 1, 1, '2014-05-27', '2014-01-03', 'Sin comentarios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE IF NOT EXISTS `libros` (
  `idLibro` int(11) NOT NULL AUTO_INCREMENT,
  `tituloLibro` varchar(255) NOT NULL,
  `ISBN` varchar(13) NOT NULL,
  `autor` varchar(255) DEFAULT NULL,
  `editorial` varchar(255) DEFAULT NULL,
  `edicion` varchar(255) DEFAULT NULL,
  `anioPublicacion` varchar(255) DEFAULT NULL,
  `comentariosLibros` text,
  `fotoLibro` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idLibro`),
  UNIQUE KEY `tituloLibro` (`tituloLibro`),
  UNIQUE KEY `ISBN` (`ISBN`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`idLibro`, `tituloLibro`, `ISBN`, `autor`, `editorial`, `edicion`, `anioPublicacion`, `comentariosLibros`, `fotoLibro`) VALUES
(1, 'IAW', '1', 'IAW', 'IAW', 'Primera', '2000', 'IAW', NULL),
(2, 'ASO', '2', 'ASO', 'ASO', 'Primera', '2005', 'ASO', NULL),
(3, 'ISO', '0000000000003', 'ISO', 'ISO', 'Primera', '2010', 'ISO', NULL);

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
  `fechaFin` date DEFAULT NULL,
  `estaActivo` tinyint(1) NOT NULL,
  `comentariosPrestamos` text,
  PRIMARY KEY (`idPrestamo`,`idLibro`,`idEjemplar`),
  KEY `idLibro` (`idLibro`,`idEjemplar`),
  KEY `idUsuario` (`idUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `prestamos`
--

INSERT INTO `prestamos` (`idPrestamo`, `idLibro`, `idEjemplar`, `idUsuario`, `fechaInicio`, `fechaFin`, `estaActivo`, `comentariosPrestamos`) VALUES
(5, 3, 1, 8, '2014-05-27', NULL, 1, 'Sin comentarios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipocuenta`
--

CREATE TABLE IF NOT EXISTS `tipocuenta` (
  `idCuenta` int(11) NOT NULL AUTO_INCREMENT,
  `descripcionCuenta` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idCuenta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tipocuenta`
--

INSERT INTO `tipocuenta` (`idCuenta`, `descripcionCuenta`) VALUES
(1, 'Administrador'),
(2, 'Profesor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `dni` char(9) NOT NULL,
  `contrasenia` varchar(255) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `telefono` int(11) DEFAULT NULL,
  `movil` int(11) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `idTipoCuenta` int(11) NOT NULL,
  `anio` year(4) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`),
  UNIQUE KEY `dni` (`dni`),
  KEY `idTipoCuenta` (`idTipoCuenta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `dni`, `contrasenia`, `nombre`, `telefono`, `movil`, `email`, `idTipoCuenta`, `anio`) VALUES
(1, '00000000A', '$2y$10$deAZDNb2DlvMt54G5vi5OOV1p4TFB43ttRlCVhY.W4R/E8zW4L46i', 'admin', NULL, NULL, NULL, 1, NULL),
(7, '00000000B', '$2y$10$lqHfE1T27XdZCYhBCC.Gg.PAPE1kCvjd6pbqtrGmUt4QzMQr0SaG2', 'pepe', NULL, NULL, NULL, 2, NULL),
(8, '00000000C', '$2y$10$UCD/rvBT7N5KdF8HL94kKuBXdoXJTgWrCR6p4qrcIhgymwPtmY0F.', 'lucas', NULL, NULL, NULL, 2, NULL);

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
  ADD CONSTRAINT `prestamos_ibfk_1` FOREIGN KEY (`idLibro`, `idEjemplar`) REFERENCES `ejemplares` (`idLibro`, `idEjemplar`),
  ADD CONSTRAINT `prestamos_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`idTipoCuenta`) REFERENCES `tipocuenta` (`idCuenta`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
