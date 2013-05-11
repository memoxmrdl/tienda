-- phpMyAdmin SQL Dump
-- version 3.5.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 06-02-2013 a las 18:26:44
-- Versión del servidor: 5.0.51b-community-nt-log
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `chatworld`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cw_chat`
--

CREATE TABLE IF NOT EXISTS `cw_chat` (
  `chat_id` int(11) NOT NULL auto_increment,
  `contacto_id` bigint(20) NOT NULL,
  `message` text collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`chat_id`),
  UNIQUE KEY `usuario_id_from_2` (`contacto_id`),
  KEY `usuario_id_to` (`contacto_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `cw_chat`
--

INSERT INTO `cw_chat` (`chat_id`, `contacto_id`, `message`) VALUES
(1, 11, '[memoxmrodlr]: Que haces?[memoxmrodlr]: Donde andas?'),
(2, 12, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cw_contactos`
--

CREATE TABLE IF NOT EXISTS `cw_contactos` (
  `contacto_id` bigint(20) NOT NULL auto_increment,
  `usuario_id` bigint(20) NOT NULL,
  `usuario_id_to` bigint(20) NOT NULL,
  PRIMARY KEY  (`contacto_id`),
  UNIQUE KEY `usuario_id_to` (`usuario_id_to`),
  KEY `usuario_id_2` (`usuario_id`),
  KEY `usuario_id_to_2` (`usuario_id_to`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `cw_contactos`
--

INSERT INTO `cw_contactos` (`contacto_id`, `usuario_id`, `usuario_id_to`) VALUES
(11, 1, 9),
(12, 1, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cw_grupos`
--

CREATE TABLE IF NOT EXISTS `cw_grupos` (
  `grupo_id` bigint(20) NOT NULL auto_increment,
  `usuario_id` bigint(20) NOT NULL,
  `nombre` int(100) NOT NULL,
  PRIMARY KEY  (`grupo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cw_usuarios`
--

CREATE TABLE IF NOT EXISTS `cw_usuarios` (
  `usuario_id` bigint(20) NOT NULL auto_increment,
  `usuario` varchar(20) collate utf8_spanish_ci NOT NULL,
  `correo` varchar(200) collate utf8_spanish_ci NOT NULL,
  `password` varchar(32) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`usuario_id`),
  UNIQUE KEY `usuario` (`usuario`),
  UNIQUE KEY `correo` (`correo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `cw_usuarios`
--

INSERT INTO `cw_usuarios` (`usuario_id`, `usuario`, `correo`, `password`) VALUES
(1, 'memoxmrodlr', 'jmemox@gmail.com', '123'),
(8, 'mariomd', 'mario@gmail.com', '123'),
(9, 'osiris', 'osiris@prueba.com', '123');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cw_chat`
--
ALTER TABLE `cw_chat`
  ADD CONSTRAINT `cw_chat_ibfk_1` FOREIGN KEY (`contacto_id`) REFERENCES `cw_contactos` (`contacto_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cw_contactos`
--
ALTER TABLE `cw_contactos`
  ADD CONSTRAINT `cw_contactos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `cw_usuarios` (`usuario_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `cw_contactos_ibfk_2` FOREIGN KEY (`usuario_id_to`) REFERENCES `cw_usuarios` (`usuario_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
