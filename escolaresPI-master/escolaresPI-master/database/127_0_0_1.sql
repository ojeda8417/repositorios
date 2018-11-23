-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-11-2015 a las 09:36:19
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `escolarespi_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE IF NOT EXISTS `alumnos` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `turno` int(4) NOT NULL,
  `hora_inicio` datetime NOT NULL,
  `hora_fin` datetime NOT NULL,
  `tiempo_estimado` int(2) NOT NULL,
  `estado` int(12) NOT NULL,
  `carrera` int(12) NOT NULL,
  `ficha_inscripcion` int(10) NOT NULL,
  `indice` varchar(12) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `carreraFk` (`carrera`) COMMENT 'Carrera de inscripción'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `nombre`, `turno`, `hora_inicio`, `hora_fin`, `tiempo_estimado`, `estado`, `carrera`, `ficha_inscripcion`, `indice`) VALUES
(53, 'ivan gastelum', 1, '2015-11-03 13:11:16', '2015-11-03 13:27:22', 11, 2, 6, 1, '2015-11-03'),
(54, 'David Guillens', 2, '2015-11-03 13:11:38', '2015-11-03 13:52:11', 11, 2, 3, 2, '2015-11-03'),
(58, 'ivan romero', 3, '2015-11-03 13:11:02', '2015-11-03 13:25:48', 15, 2, 3, 5, '2015-11-03'),
(60, 'ivan gasdsets', 4, '2015-11-03 13:11:04', '2015-11-03 13:25:59', 29, 2, 6, 6, '2015-11-03'),
(61, 'juan juanca', 5, '2015-11-03 13:11:24', '2015-11-03 13:27:26', 25, 2, 2, 56, '2015-11-03'),
(62, 'Manuel Solano', 6, '2015-11-03 18:11:16', '2015-11-03 18:16:02', 20, 2, 6, 12345, '2015-11-03'),
(63, 'David Guillen', 1, '2015-11-04 22:11:26', '0000-00-00 00:00:00', 11, 1, 3, 123, '2015-11-04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE IF NOT EXISTS `carreras` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`id`, `nombre`) VALUES
(1, 'Ing. Electrónica'),
(2, 'Ing. Electrómecanica'),
(3, 'Ing. Gestión Empresarial'),
(4, 'Ing. Industrial'),
(5, 'Ing. Mecatrónica'),
(6, 'Ing. Sistemas Computacionales'),
(7, 'Lic. Administación');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `usuario` varchar(60) NOT NULL,
  `password` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`id`, `nombre`, `usuario`, `password`) VALUES
(1, 'david', 'david', '12345');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `carreraFk` FOREIGN KEY (`carrera`) REFERENCES `carreras` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
