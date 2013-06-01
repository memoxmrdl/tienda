-- phpMyAdmin SQL Dump
-- version 4.0.0
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 01, 2013 at 05:52 PM
-- Server version: 5.5.31-0ubuntu0.12.04.1
-- PHP Version: 5.3.10-1ubuntu3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `crowd-interactive`
--

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `producto_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tipo_cantidades_id` bigint(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` double NOT NULL,
  `url` text NOT NULL,
  `almacen` double NOT NULL,
  PRIMARY KEY (`producto_id`),
  UNIQUE KEY `nombre` (`nombre`),
  KEY `tipo_cantidades_id` (`tipo_cantidades_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`producto_id`, `tipo_cantidades_id`, `nombre`, `descripcion`, `precio`, `url`, `almacen`) VALUES
(33, 1, 'Queso me agarres', 'Queso me agarres', 120, 'http://3.bp.blogspot.com/-wjILSbaPWrA/TpQOnZJ7M3I/AAAAAAAABzg/V13MYjkb3AU/s1600/crema+pura+de+vaca+acidificada+lala.jpg', 10);

-- --------------------------------------------------------

--
-- Table structure for table `productos_tipos_cantidades`
--

CREATE TABLE IF NOT EXISTS `productos_tipos_cantidades` (
  `tipo_cantidades_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`tipo_cantidades_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `productos_tipos_cantidades`
--

INSERT INTO `productos_tipos_cantidades` (`tipo_cantidades_id`, `nombre`) VALUES
(1, 'Piezas'),
(2, 'Kilos'),
(3, 'Paquetes');

-- --------------------------------------------------------

--
-- Table structure for table `proveedores`
--

CREATE TABLE IF NOT EXISTS `proveedores` (
  `proveedor_id` bigint(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `domicilio` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`proveedor_id`),
  KEY `proveedor_id` (`proveedor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `usuario_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(32) NOT NULL,
  `password` varchar(16) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `privilegio` varchar(1) NOT NULL,
  UNIQUE KEY `usuario` (`usuario`),
  KEY `usuario_id` (`usuario_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `usuario`, `password`, `nombre`, `apellidos`, `email`, `privilegio`) VALUES
(2, 'admin', 'admin', 'Administrador', '', 'admin@example.com', 'A'),
(5, 'mario', 'mario', 'Mario', 'Moreno Dolores', 'mario@gmail.com', 'U'),
(3, 'memox', 'gemito', 'Jose Guillermo', 'Moreno Dolores', 'jmemox@gmail.com', 'U');

-- --------------------------------------------------------

--
-- Table structure for table `ventas`
--

CREATE TABLE IF NOT EXISTS `ventas` (
  `venta_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `usuario_id` bigint(20) NOT NULL,
  PRIMARY KEY (`venta_id`),
  KEY `usuario_id` (`usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ventas_productos`
--

CREATE TABLE IF NOT EXISTS `ventas_productos` (
  `venta_productos_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `venta_id` bigint(20) NOT NULL,
  `producto_id` bigint(20) NOT NULL,
  PRIMARY KEY (`venta_productos_id`),
  KEY `venta_id` (`venta_id`),
  KEY `producto_id` (`producto_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`tipo_cantidades_id`) REFERENCES `productos_tipos_cantidades` (`tipo_cantidades_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`usuario_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ventas_productos`
--
ALTER TABLE `ventas_productos`
  ADD CONSTRAINT `ventas_productos_ibfk_1` FOREIGN KEY (`venta_id`) REFERENCES `ventas` (`venta_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ventas_productos_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`producto_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
