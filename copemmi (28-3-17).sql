-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 28-03-2017 a las 04:01:53
-- Versión del servidor: 5.5.53-0ubuntu0.14.04.1
-- Versión de PHP: 5.6.29-1+deb.sury.org~trusty+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `copemmi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `ID` varchar(11) NOT NULL,
  `NOMBRE` varchar(50) NOT NULL,
  `PRIMER_APELLIDO` varchar(50) NOT NULL,
  `SEGUNDO_APELLIDO` varchar(50) NOT NULL,
  `DIRECCION` varchar(100) NOT NULL,
  `TELEFONO` varchar(11) NOT NULL,
  `CORREO` varchar(50) NOT NULL,
  `NOMBRE_EMPRESA` varchar(50) NOT NULL,
  `CEDULA_JURIDICA` varchar(15) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `CORREO` (`CORREO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`ID`, `NOMBRE`, `PRIMER_APELLIDO`, `SEGUNDO_APELLIDO`, `DIRECCION`, `TELEFONO`, `CORREO`, `NOMBRE_EMPRESA`, `CEDULA_JURIDICA`) VALUES
('2-0742-0632', 'J', 'L', 'A', 'G', '3312-45-64', 'j@hotmail.com', 'as', 'asd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_modelos_maquinas`
--

CREATE TABLE IF NOT EXISTS `det_modelos_maquinas` (
  `COD_DETALLE_MODELO` int(6) NOT NULL AUTO_INCREMENT,
  `COD_MODELO` varchar(10) DEFAULT NULL,
  `COD_MATERIAL` varchar(10) DEFAULT NULL,
  `CANTIDAD` int(10) DEFAULT NULL,
  PRIMARY KEY (`COD_DETALLE_MODELO`),
  KEY `COD_MODELO` (`COD_MODELO`),
  KEY `COD_MATERIAL` (`COD_MATERIAL`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Volcado de datos para la tabla `det_modelos_maquinas`
--

INSERT INTO `det_modelos_maquinas` (`COD_DETALLE_MODELO`, `COD_MODELO`, `COD_MATERIAL`, `CANTIDAD`) VALUES
(14, 'HORPIZZA', 'LAM-2m', 10),
(15, 'HORPIZZA', 'TR5', 20),
(16, 'HORPIZZA', 'LamAlum', 45),
(20, 'Prueba', 'LamAlum', 2),
(21, 'Prueba', 'LAM-2m', 5),
(22, 'z', 'LAM-2m', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_ordenes_pedidos`
--

CREATE TABLE IF NOT EXISTS `det_ordenes_pedidos` (
  `COD_DETALLE__PEDIDO` int(6) NOT NULL AUTO_INCREMENT,
  `COD_ORDEN_PEDIDO` int(10) DEFAULT NULL,
  `COD_MATERIAL` varchar(10) DEFAULT NULL,
  `CANTIDAD` int(10) NOT NULL,
  PRIMARY KEY (`COD_DETALLE__PEDIDO`),
  KEY `COD_ORDEN_PEDIDO` (`COD_ORDEN_PEDIDO`),
  KEY `COD_MATERIAL` (`COD_MATERIAL`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados_ordenes`
--

CREATE TABLE IF NOT EXISTS `estados_ordenes` (
  `COD_ESTADO` varchar(10) NOT NULL DEFAULT '',
  `NOMBRE` varchar(50) NOT NULL,
  PRIMARY KEY (`COD_ESTADO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estados_ordenes`
--

INSERT INTO `estados_ordenes` (`COD_ESTADO`, `NOMBRE`) VALUES
('INAC', 'INACTIVA'),
('PROD', 'EN PRODUCCION'),
('TER', 'TERMINADA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historiales_ordenes_fabriciones`
--

CREATE TABLE IF NOT EXISTS `historiales_ordenes_fabriciones` (
  `COD_HISTORIAL` int(10) NOT NULL AUTO_INCREMENT,
  `COD_ORDEN_FABRICACION` int(10) DEFAULT NULL,
  PRIMARY KEY (`COD_HISTORIAL`),
  KEY `COD_ORDEN_FABRICACION` (`COD_ORDEN_FABRICACION`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_modelos`
--

CREATE TABLE IF NOT EXISTS `imagenes_modelos` (
  `COD_IMAGEN` varchar(10) NOT NULL DEFAULT '',
  `IMAGEN` varchar(50) NOT NULL,
  PRIMARY KEY (`COD_IMAGEN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `imagenes_modelos`
--

INSERT INTO `imagenes_modelos` (`COD_IMAGEN`, `IMAGEN`) VALUES
('Horn-Pizza', 'horno-pizza.jpg'),
('prueba', 'frenos-de-disco_07_pastillas_de_freno.gif'),
('z', '14639652_1323483554340009_443958962751353760_n.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiales`
--

CREATE TABLE IF NOT EXISTS `materiales` (
  `COD_MATERIAL` varchar(10) NOT NULL DEFAULT '',
  `COD_TIPO_MATERIAL` varchar(10) DEFAULT NULL,
  `NOMBRE` varchar(50) NOT NULL,
  `CARACTERISTICAS` varchar(255) NOT NULL,
  `CANTIDAD` int(6) NOT NULL,
  `FECHA_INGRESO` date NOT NULL,
  PRIMARY KEY (`COD_MATERIAL`),
  KEY `COD_TIPO_MATERIAL` (`COD_TIPO_MATERIAL`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `materiales`
--

INSERT INTO `materiales` (`COD_MATERIAL`, `COD_TIPO_MATERIAL`, `NOMBRE`, `CARACTERISTICAS`, `CANTIDAD`, `FECHA_INGRESO`) VALUES
('HIERRO', 'LAM', 'HIERRO', 'EDED', 250, '2017-03-28'),
('LAM-2m', 'LAM', 'Lamina de 2 metros', 'Lamina de acero de 2 metros de largo', 123, '2016-10-11'),
('LamAlum', 'LAM', 'Lamina de Aluminio', 'Lamina de Aluminio necesaria para los hornos de pizza', 1000, '2016-10-12'),
('mart', 'herra', 'Martillo', 'ededed', 351, '2017-03-28'),
('TR5', 'CLAV', 'TORNILLO 5cm', 'Tornillo punta fina de 5cm', 92, '2016-10-13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelos_maquinas`
--

CREATE TABLE IF NOT EXISTS `modelos_maquinas` (
  `COD_MODELO` varchar(10) NOT NULL DEFAULT '',
  `COD_IMAGEN` varchar(10) DEFAULT NULL,
  `COD_TIPO_MODELO` varchar(10) DEFAULT NULL,
  `NOMBRE` varchar(50) NOT NULL,
  `CARACTERISTICAS` varchar(255) NOT NULL,
  `PRECIO` float NOT NULL,
  PRIMARY KEY (`COD_MODELO`),
  KEY `COD_IMAGEN` (`COD_IMAGEN`),
  KEY `COD_TIPO_MODELO` (`COD_TIPO_MODELO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `modelos_maquinas`
--

INSERT INTO `modelos_maquinas` (`COD_MODELO`, `COD_IMAGEN`, `COD_TIPO_MODELO`, `NOMBRE`, `CARACTERISTICAS`, `PRECIO`) VALUES
('HORPIZZA', 'Horn-Pizza', 'HORN', 'Horno para Pizza simple', 'solo tiene un compartimiento para pizzas', 40000),
('Prueba', 'prueba', 'HORN', 'Horno', 'prueba asbc', 95000),
('z', 'z', 'HORN', 'z', 'z', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes_fabricaciones`
--

CREATE TABLE IF NOT EXISTS `ordenes_fabricaciones` (
  `COD_ORDEN_FABRICACION` int(10) NOT NULL AUTO_INCREMENT,
  `COD_ESTADO` varchar(10) DEFAULT NULL,
  `COD_MODELO` varchar(10) DEFAULT NULL,
  `COD_USUARIO` varchar(10) DEFAULT NULL,
  `ID` varchar(11) DEFAULT NULL,
  `FECHA_LLEGADA` date NOT NULL,
  `FECHA_ENTREGA` date NOT NULL,
  `FECHA_TERMINADA` date NOT NULL,
  PRIMARY KEY (`COD_ORDEN_FABRICACION`),
  KEY `COD_ESTADO` (`COD_ESTADO`),
  KEY `COD_MODELO` (`COD_MODELO`),
  KEY `COD_USUARIO` (`COD_USUARIO`),
  KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=154 ;

--
-- Volcado de datos para la tabla `ordenes_fabricaciones`
--

INSERT INTO `ordenes_fabricaciones` (`COD_ORDEN_FABRICACION`, `COD_ESTADO`, `COD_MODELO`, `COD_USUARIO`, `ID`, `FECHA_LLEGADA`, `FECHA_ENTREGA`, `FECHA_TERMINADA`) VALUES
(1, 'TER', 'HORPIZZA', 'EDG78', '2-0742-0632', '2017-03-01', '2017-03-01', '2017-03-23'),
(2, 'TER', 'Prueba', 'EDG78', '2-0742-0632', '2017-03-07', '2017-03-07', '2017-03-23'),
(116, 'INAC', 'HORPIZZA', 'EDG78', '2-0742-0632', '2017-03-27', '2017-03-27', '2017-03-27'),
(117, 'INAC', 'HORPIZZA', 'EDG78', '2-0742-0632', '2017-03-27', '2017-03-27', '2017-03-27'),
(118, 'INAC', 'HORPIZZA', 'EDG78', '2-0742-0632', '2017-03-27', '2017-03-27', '2017-03-27'),
(119, 'PROD', 'HORPIZZA', 'EDG78', '2-0742-0632', '2017-03-27', '2017-03-27', '2017-03-27'),
(120, 'PROD', 'HORPIZZA', 'EDG78', '2-0742-0632', '2017-03-27', '2017-03-27', '2017-03-27'),
(121, 'PROD', 'HORPIZZA', 'EDG78', '2-0742-0632', '2017-03-27', '2017-03-27', '2017-03-27'),
(122, 'PROD', 'HORPIZZA', 'EDG78', '2-0742-0632', '2017-03-27', '2017-03-27', '2017-03-27'),
(123, 'PROD', 'HORPIZZA', 'EDG78', '2-0742-0632', '2017-03-27', '2017-03-27', '2017-03-27'),
(124, 'INAC', 'HORPIZZA', 'EDG78', '2-0742-0632', '2017-03-27', '2017-04-27', '2017-04-27'),
(125, 'TER', 'z', 'LEI78', '2-0742-0632', '2017-03-27', '2017-04-27', '2017-03-27'),
(126, 'TER', 'HORPIZZA', 'EDG78', '2-0742-0632', '2017-03-27', '2017-05-27', '2017-03-27'),
(127, 'TER', 'HORPIZZA', 'EDG78', '2-0742-0632', '2017-03-27', '2017-05-27', '2017-03-27'),
(128, 'INAC', 'HORPIZZA', 'EDG78', '2-0742-0632', '2017-03-27', '2017-05-31', '2017-05-31'),
(129, 'INAC', 'HORPIZZA', 'EDG78', '2-0742-0632', '2017-03-27', '2017-06-27', '2017-06-27'),
(130, 'INAC', 'HORPIZZA', 'EDG78', '2-0742-0632', '2017-03-27', '2017-06-29', '2017-06-29'),
(131, 'TER', 'HORPIZZA', 'EDG78', '2-0742-0632', '2017-03-27', '2017-07-27', '2017-03-27'),
(132, 'INAC', 'HORPIZZA', 'EDG78', '2-0742-0632', '2017-03-27', '2017-07-27', '2017-07-27'),
(133, 'INAC', 'HORPIZZA', 'EDG78', '2-0742-0632', '2017-03-27', '2017-07-27', '2017-07-27'),
(134, 'INAC', 'HORPIZZA', 'EDG78', '2-0742-0632', '2017-03-27', '2017-07-30', '2017-07-30'),
(135, 'TER', 'HORPIZZA', 'EDG78', '2-0742-0632', '2017-03-27', '2017-08-27', '2017-03-27'),
(136, 'INAC', 'HORPIZZA', 'EDG78', '2-0742-0632', '2017-03-27', '2017-08-27', '2017-08-27'),
(137, 'TER', 'HORPIZZA', 'EDG78', '2-0742-0632', '2017-03-27', '2017-09-27', '2017-09-27'),
(138, 'TER', 'HORPIZZA', 'EDG78', '2-0742-0632', '2017-03-27', '2017-09-27', '2017-03-27'),
(139, 'TER', 'HORPIZZA', 'EDG78', '2-0742-0632', '2017-03-27', '2017-09-27', '2017-09-27'),
(140, 'TER', 'HORPIZZA', 'EDG78', '2-0742-0632', '2017-03-27', '2017-09-30', '2017-03-27'),
(141, 'TER', 'HORPIZZA', 'EDG78', '2-0742-0632', '2017-03-27', '2017-10-27', '2017-03-27'),
(142, 'INAC', 'HORPIZZA', 'EDG78', '2-0742-0632', '2017-03-27', '2017-10-27', '2017-10-27'),
(143, 'TER', 'HORPIZZA', 'EDG78', '2-0742-0632', '2017-03-27', '2017-10-27', '2017-09-27'),
(144, 'INAC', 'HORPIZZA', 'EDG78', '2-0742-0632', '2017-03-27', '2017-10-27', '2017-10-27'),
(145, 'INAC', 'HORPIZZA', 'EDG78', '2-0742-0632', '2017-03-27', '2017-10-27', '2017-10-27'),
(146, 'TER', 'HORPIZZA', 'EDG78', '2-0742-0632', '2017-03-27', '2017-11-27', '2017-03-27'),
(147, 'INAC', 'HORPIZZA', 'EDG78', '2-0742-0632', '2017-03-27', '2017-11-27', '2017-11-27'),
(148, 'TER', 'HORPIZZA', 'EDG78', '2-0742-0632', '2017-03-27', '2017-12-27', '2017-03-27'),
(149, 'INAC', 'HORPIZZA', 'EDG78', '2-0742-0632', '2017-03-27', '2017-12-27', '2017-12-27'),
(150, 'INAC', 'HORPIZZA', 'EDG78', '2-0742-0632', '2017-03-27', '2017-12-27', '2017-12-27'),
(151, 'INAC', 'HORPIZZA', 'EDG78', '2-0742-0632', '2017-03-27', '2017-12-29', '2017-12-29'),
(152, 'TER', 'HORPIZZA', 'EDG78', '2-0742-0632', '2017-03-27', '2017-12-27', '2017-03-27'),
(153, 'INAC', 'HORPIZZA', 'EDG78', '2-0742-0632', '2017-03-27', '2017-12-27', '2017-12-27');

--
-- Disparadores `ordenes_fabricaciones`
--
DROP TRIGGER IF EXISTS `FECHATERMINADA`;
DELIMITER //
CREATE TRIGGER `FECHATERMINADA` BEFORE UPDATE ON `ordenes_fabricaciones`
 FOR EACH ROW BEGIN
         set new.FECHA_TERMINADA= NOW();
     END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes_pedidos`
--

CREATE TABLE IF NOT EXISTS `ordenes_pedidos` (
  `COD_ORDEN_PEDIDO` int(10) NOT NULL AUTO_INCREMENT,
  `FECHA_PEDIDO` date NOT NULL,
  PRIMARY KEY (`COD_ORDEN_PEDIDO`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `ordenes_pedidos`
--

INSERT INTO `ordenes_pedidos` (`COD_ORDEN_PEDIDO`, `FECHA_PEDIDO`) VALUES
(1, '2016-03-12'),
(2, '2016-11-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `COD_ROL` varchar(10) NOT NULL DEFAULT '',
  `NOMBRE` varchar(50) NOT NULL,
  PRIMARY KEY (`COD_ROL`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`COD_ROL`, `NOMBRE`) VALUES
('GER', 'GERENTE'),
('PROD', 'ENCARGADO DE PRODUCCION');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_materiales`
--

CREATE TABLE IF NOT EXISTS `tipos_materiales` (
  `COD_TIPO_MATERIAL` varchar(10) NOT NULL DEFAULT '',
  `NOMBRE` varchar(50) NOT NULL,
  PRIMARY KEY (`COD_TIPO_MATERIAL`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipos_materiales`
--

INSERT INTO `tipos_materiales` (`COD_TIPO_MATERIAL`, `NOMBRE`) VALUES
('CLAV', 'CLAVOS'),
('herra', 'herramientaBasica'),
('LAM', 'LÁMINA'),
('TORN', 'TORNILLOS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_modelos`
--

CREATE TABLE IF NOT EXISTS `tipos_modelos` (
  `COD_TIPO_MODELO` varchar(10) NOT NULL DEFAULT '',
  `NOMBRE` varchar(50) NOT NULL,
  PRIMARY KEY (`COD_TIPO_MODELO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipos_modelos`
--

INSERT INTO `tipos_modelos` (`COD_TIPO_MODELO`, `NOMBRE`) VALUES
('HORN', 'HORNOS PARA PIZZA'),
('HORNPAN', 'HORNOS PARA PAN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `COD_USUARIO` varchar(10) NOT NULL DEFAULT '',
  `COD_ROL` varchar(10) DEFAULT NULL,
  `NOMBRE` varchar(50) NOT NULL,
  `APELLIDO` varchar(50) NOT NULL,
  `NICKNAME` varchar(25) NOT NULL,
  `CLAVE` varchar(50) NOT NULL,
  `CLAVEX` longtext NOT NULL,
  PRIMARY KEY (`COD_USUARIO`),
  KEY `COD_ROL` (`COD_ROL`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`COD_USUARIO`, `COD_ROL`, `NOMBRE`, `APELLIDO`, `NICKNAME`, `CLAVE`, `CLAVEX`) VALUES
('EDG78', 'PROD', 'EDGAR', 'SÁNCHEZ', 'EDGS1800', 'EDG12345', 'EDG12345'),
('LEI78', 'GER', 'LEIMAN', 'SÁNCHEZ', 'LEIS1800', 'LEI12345', 'LEI12345');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `det_modelos_maquinas`
--
ALTER TABLE `det_modelos_maquinas`
  ADD CONSTRAINT `FK_MATERIALES_DETMODMAQ` FOREIGN KEY (`COD_MATERIAL`) REFERENCES `materiales` (`COD_MATERIAL`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_MODMAQ_DETMODMAQ` FOREIGN KEY (`COD_MODELO`) REFERENCES `modelos_maquinas` (`COD_MODELO`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `det_ordenes_pedidos`
--
ALTER TABLE `det_ordenes_pedidos`
  ADD CONSTRAINT `FK_MATERIALES_DETORDPED` FOREIGN KEY (`COD_MATERIAL`) REFERENCES `materiales` (`COD_MATERIAL`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ORDPED_DETORDPED` FOREIGN KEY (`COD_ORDEN_PEDIDO`) REFERENCES `ordenes_pedidos` (`COD_ORDEN_PEDIDO`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `historiales_ordenes_fabriciones`
--
ALTER TABLE `historiales_ordenes_fabriciones`
  ADD CONSTRAINT `FK_ORDFAB_HISORDFAB` FOREIGN KEY (`COD_ORDEN_FABRICACION`) REFERENCES `ordenes_fabricaciones` (`COD_ORDEN_FABRICACION`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `materiales`
--
ALTER TABLE `materiales`
  ADD CONSTRAINT `FK_TIPMAT_MATERIALES` FOREIGN KEY (`COD_TIPO_MATERIAL`) REFERENCES `tipos_materiales` (`COD_TIPO_MATERIAL`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `modelos_maquinas`
--
ALTER TABLE `modelos_maquinas`
  ADD CONSTRAINT `FK_IMAMOD_MODMAQ` FOREIGN KEY (`COD_IMAGEN`) REFERENCES `imagenes_modelos` (`COD_IMAGEN`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_TIPMOD_MODMAQ` FOREIGN KEY (`COD_TIPO_MODELO`) REFERENCES `tipos_modelos` (`COD_TIPO_MODELO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `ordenes_fabricaciones`
--
ALTER TABLE `ordenes_fabricaciones`
  ADD CONSTRAINT `FK_ESTORD_ORDFAB` FOREIGN KEY (`COD_ESTADO`) REFERENCES `estados_ordenes` (`COD_ESTADO`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_MODMAQ_ORDFAB` FOREIGN KEY (`COD_MODELO`) REFERENCES `modelos_maquinas` (`COD_MODELO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_USUARIOS_ORDFAB` FOREIGN KEY (`COD_USUARIO`) REFERENCES `usuarios` (`COD_USUARIO`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ordenes_fabricaciones_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `clientes` (`ID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `FK_ROLES_USUARIOS` FOREIGN KEY (`COD_ROL`) REFERENCES `roles` (`COD_ROL`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
