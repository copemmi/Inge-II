-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-03-2017 a las 18:21:41
-- Versión del servidor: 5.7.14
-- Versión de PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `copemmi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `ID` varchar(11) NOT NULL,
  `NOMBRE` varchar(50) NOT NULL,
  `PRIMER_APELLIDO` varchar(50) NOT NULL,
  `SEGUNDO_APELLIDO` varchar(50) NOT NULL,
  `DIRECCION` varchar(100) NOT NULL,
  `TELEFONO` varchar(11) NOT NULL,
  `CORREO` varchar(50) NOT NULL,
  `NOMBRE_EMPRESA` varchar(50) NOT NULL,
  `CEDULA_JURIDICA` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`ID`, `NOMBRE`, `PRIMER_APELLIDO`, `SEGUNDO_APELLIDO`, `DIRECCION`, `TELEFONO`, `CORREO`, `NOMBRE_EMPRESA`, `CEDULA_JURIDICA`) VALUES
('1-1111-1111', 'Also ', 'too', 'w', 'Alajuela', '8888-8888', 'alsotoo@alsotoo.com', 'Troller', '3-101-11111'),
('2-0742-0632', 'J', 'L', 'A', 'G', '3312-45-64', 'j@hotmail.com', 'as', 'asd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_modelos_maquinas`
--

CREATE TABLE `det_modelos_maquinas` (
  `COD_DETALLE_MODELO` int(6) NOT NULL,
  `COD_MODELO` varchar(10) DEFAULT NULL,
  `COD_MATERIAL` varchar(10) DEFAULT NULL,
  `CANTIDAD` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `det_modelos_maquinas`
--

INSERT INTO `det_modelos_maquinas` (`COD_DETALLE_MODELO`, `COD_MODELO`, `COD_MATERIAL`, `CANTIDAD`) VALUES
(23, 'Maq', '1', 450);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_ordenes_pedidos`
--

CREATE TABLE `det_ordenes_pedidos` (
  `COD_DETALLE__PEDIDO` int(6) NOT NULL,
  `COD_ORDEN_PEDIDO` int(10) DEFAULT NULL,
  `COD_MATERIAL` varchar(10) DEFAULT NULL,
  `CANTIDAD` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados_ordenes`
--

CREATE TABLE `estados_ordenes` (
  `COD_ESTADO` varchar(10) NOT NULL DEFAULT '',
  `NOMBRE` varchar(50) NOT NULL
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

CREATE TABLE `historiales_ordenes_fabriciones` (
  `COD_HISTORIAL` int(10) NOT NULL,
  `COD_ORDEN_FABRICACION` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_modelos`
--

CREATE TABLE `imagenes_modelos` (
  `COD_IMAGEN` varchar(10) NOT NULL DEFAULT '',
  `IMAGEN` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `imagenes_modelos`
--

INSERT INTO `imagenes_modelos` (`COD_IMAGEN`, `IMAGEN`) VALUES
('MAq', '17-1445853.jpg'),
('Pizza', 'horno-pizza.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiales`
--

CREATE TABLE `materiales` (
  `COD_MATERIAL` varchar(10) NOT NULL DEFAULT '',
  `COD_TIPO_MATERIAL` varchar(10) DEFAULT NULL,
  `NOMBRE` varchar(50) NOT NULL,
  `CARACTERISTICAS` varchar(255) NOT NULL,
  `CANTIDAD` int(6) NOT NULL,
  `FECHA_INGRESO` date NOT NULL,
  `CANTIDADMINIMA` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `materiales`
--

INSERT INTO `materiales` (`COD_MATERIAL`, `COD_TIPO_MATERIAL`, `NOMBRE`, `CARACTERISTICAS`, `CANTIDAD`, `FECHA_INGRESO`, `CANTIDADMINIMA`) VALUES
('1', 'CLAV', '1', '1', -874, '2017-03-30', 17),
('2', 'LAM', '2', '2', 100, '2017-03-30', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_03_31_121009_update_table_users', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelos_maquinas`
--

CREATE TABLE `modelos_maquinas` (
  `COD_MODELO` varchar(10) NOT NULL DEFAULT '',
  `COD_IMAGEN` varchar(10) DEFAULT NULL,
  `COD_TIPO_MODELO` varchar(10) DEFAULT NULL,
  `NOMBRE` varchar(50) NOT NULL,
  `CARACTERISTICAS` varchar(255) NOT NULL,
  `PRECIO` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `modelos_maquinas`
--

INSERT INTO `modelos_maquinas` (`COD_MODELO`, `COD_IMAGEN`, `COD_TIPO_MODELO`, `NOMBRE`, `CARACTERISTICAS`, `PRECIO`) VALUES
('Maq', 'MAq', 'HORN', 'maquina', 'Lol', 450000),
('Pizza', 'Pizza', 'HORN', 'Pizaa', 'pizza', 450000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes_fabricaciones`
--

CREATE TABLE `ordenes_fabricaciones` (
  `COD_ORDEN_FABRICACION` int(10) NOT NULL,
  `COD_ESTADO` varchar(10) DEFAULT NULL,
  `COD_MODELO` varchar(10) DEFAULT NULL,
  `COD_USUARIO` varchar(10) DEFAULT NULL,
  `ID` varchar(11) DEFAULT NULL,
  `FECHA_LLEGADA` date NOT NULL,
  `FECHA_ENTREGA` date NOT NULL,
  `FECHA_TERMINADA` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ordenes_fabricaciones`
--

INSERT INTO `ordenes_fabricaciones` (`COD_ORDEN_FABRICACION`, `COD_ESTADO`, `COD_MODELO`, `COD_USUARIO`, `ID`, `FECHA_LLEGADA`, `FECHA_ENTREGA`, `FECHA_TERMINADA`) VALUES
(3, 'INAC', 'Maq', 'LEI78', '2-0742-0632', '2017-03-30', '2017-05-02', '2017-05-02'),
(4, 'TER', 'Pizza', 'EDG78', '2-0742-0632', '2017-03-30', '2017-03-30', '2017-03-30'),
(5, 'INAC', 'Maq', 'EDG78', '2-0742-0632', '2017-03-30', '2017-07-02', '2017-07-02'),
(6, 'PROD', 'Pizza', 'LEI78', '1-1111-1111', '2017-03-30', '2017-03-30', '2017-03-30');

--
-- Disparadores `ordenes_fabricaciones`
--
DELIMITER $$
CREATE TRIGGER `FECHATERMINADA` BEFORE UPDATE ON `ordenes_fabricaciones` FOR EACH ROW BEGIN
         set new.FECHA_TERMINADA= NOW();
     END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes_pedidos`
--

CREATE TABLE `ordenes_pedidos` (
  `COD_ORDEN_PEDIDO` int(10) NOT NULL,
  `FECHA_PEDIDO` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `COD_ROL` varchar(10) NOT NULL DEFAULT '',
  `NOMBRE` varchar(50) NOT NULL
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

CREATE TABLE `tipos_materiales` (
  `COD_TIPO_MATERIAL` varchar(10) NOT NULL DEFAULT '',
  `NOMBRE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipos_materiales`
--

INSERT INTO `tipos_materiales` (`COD_TIPO_MATERIAL`, `NOMBRE`) VALUES
('CLAV', 'CLAVOS'),
('LAM', 'LÁMINA'),
('TORN', 'TORNILLOS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_modelos`
--

CREATE TABLE `tipos_modelos` (
  `COD_TIPO_MODELO` varchar(10) NOT NULL DEFAULT '',
  `NOMBRE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipos_modelos`
--

INSERT INTO `tipos_modelos` (`COD_TIPO_MODELO`, `NOMBRE`) VALUES
('HORN', 'HORNOS PARA PIZZA'),
('HORNPAN', 'HORNOS PARA PAN'),
('Motor', 'Motor Industrial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `privilegio` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `privilegio`) VALUES
(2, 'Luis Carlos', 'luisktkd@hotmail.com', '$2y$10$sd4WD7fn0U0LVYAOSreB1.2r5R./SKYI.dKxtboKpMLnmMBf3Ukaa', NULL, '2017-03-30 17:32:39', '2017-03-30 17:32:39', 0),
(3, 'Melvin', 'mora831995@hotmail.com', '$2y$10$X4y8UK2bym4cWCXp0o.Apu19KRUI8NJWHHj5/Dt1IDKKmRzknZ6Je', '8zE2C3S8yKgyljETbTf0E63dsih7gZLFBmzQqX0P0leOP3DkWUeX9SCS9gHt', '2017-03-30 20:28:34', '2017-03-31 18:21:18', 1),
(4, 'alsotoo', 'alsotoo@alsotoo.com', '$2y$10$aAkSOymn3JpV1U8dGyZFxuvYydCBQUug1uJRJDFf3p5Btz/ZfiMhi', 'm0foBI9tCfJ376Vx3a6IkFi01S5g84wI8fZDWt8Obt2zf4SBiM1tzyPLLQWs', '2017-03-31 07:41:31', '2017-03-31 18:19:38', 0),
(5, 'prueba', 'prueba@prueba.com', '$2y$10$YAS1YMeOTq93Go8JDj2UBeXyrG4eJY3hjPZFv3sE90l5lZw87Hd4S', 'kijt9yXSWDGVpKhLsIx75OAZr2Rc4tt8rSMFWhAssnuBmhtoLtHDkyD81MTO', '2017-03-31 18:20:01', '2017-03-31 18:20:12', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `COD_USUARIO` varchar(10) NOT NULL DEFAULT '',
  `COD_ROL` varchar(10) DEFAULT NULL,
  `NOMBRE` varchar(50) NOT NULL,
  `APELLIDO` varchar(50) NOT NULL,
  `NICKNAME` varchar(25) NOT NULL,
  `CLAVE` varchar(50) NOT NULL,
  `CLAVEX` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`COD_USUARIO`, `COD_ROL`, `NOMBRE`, `APELLIDO`, `NICKNAME`, `CLAVE`, `CLAVEX`) VALUES
('EDG78', 'PROD', 'EDGAR', 'SÁNCHEZ', 'EDGS1800', 'EDG12345', 'EDG12345'),
('LEI78', 'GER', 'LEIMAN', 'SÁNCHEZ', 'LEIS1800', 'LEI12345', 'LEI12345');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `CORREO` (`CORREO`);

--
-- Indices de la tabla `det_modelos_maquinas`
--
ALTER TABLE `det_modelos_maquinas`
  ADD PRIMARY KEY (`COD_DETALLE_MODELO`),
  ADD KEY `COD_MODELO` (`COD_MODELO`),
  ADD KEY `COD_MATERIAL` (`COD_MATERIAL`);

--
-- Indices de la tabla `det_ordenes_pedidos`
--
ALTER TABLE `det_ordenes_pedidos`
  ADD PRIMARY KEY (`COD_DETALLE__PEDIDO`),
  ADD KEY `COD_ORDEN_PEDIDO` (`COD_ORDEN_PEDIDO`),
  ADD KEY `COD_MATERIAL` (`COD_MATERIAL`);

--
-- Indices de la tabla `estados_ordenes`
--
ALTER TABLE `estados_ordenes`
  ADD PRIMARY KEY (`COD_ESTADO`);

--
-- Indices de la tabla `historiales_ordenes_fabriciones`
--
ALTER TABLE `historiales_ordenes_fabriciones`
  ADD PRIMARY KEY (`COD_HISTORIAL`),
  ADD KEY `COD_ORDEN_FABRICACION` (`COD_ORDEN_FABRICACION`);

--
-- Indices de la tabla `imagenes_modelos`
--
ALTER TABLE `imagenes_modelos`
  ADD PRIMARY KEY (`COD_IMAGEN`);

--
-- Indices de la tabla `materiales`
--
ALTER TABLE `materiales`
  ADD PRIMARY KEY (`COD_MATERIAL`),
  ADD KEY `COD_TIPO_MATERIAL` (`COD_TIPO_MATERIAL`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `modelos_maquinas`
--
ALTER TABLE `modelos_maquinas`
  ADD PRIMARY KEY (`COD_MODELO`),
  ADD KEY `COD_IMAGEN` (`COD_IMAGEN`),
  ADD KEY `COD_TIPO_MODELO` (`COD_TIPO_MODELO`);

--
-- Indices de la tabla `ordenes_fabricaciones`
--
ALTER TABLE `ordenes_fabricaciones`
  ADD PRIMARY KEY (`COD_ORDEN_FABRICACION`),
  ADD KEY `COD_ESTADO` (`COD_ESTADO`),
  ADD KEY `COD_MODELO` (`COD_MODELO`),
  ADD KEY `COD_USUARIO` (`COD_USUARIO`),
  ADD KEY `ID` (`ID`);

--
-- Indices de la tabla `ordenes_pedidos`
--
ALTER TABLE `ordenes_pedidos`
  ADD PRIMARY KEY (`COD_ORDEN_PEDIDO`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`COD_ROL`);

--
-- Indices de la tabla `tipos_materiales`
--
ALTER TABLE `tipos_materiales`
  ADD PRIMARY KEY (`COD_TIPO_MATERIAL`);

--
-- Indices de la tabla `tipos_modelos`
--
ALTER TABLE `tipos_modelos`
  ADD PRIMARY KEY (`COD_TIPO_MODELO`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`COD_USUARIO`),
  ADD KEY `COD_ROL` (`COD_ROL`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `det_modelos_maquinas`
--
ALTER TABLE `det_modelos_maquinas`
  MODIFY `COD_DETALLE_MODELO` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT de la tabla `det_ordenes_pedidos`
--
ALTER TABLE `det_ordenes_pedidos`
  MODIFY `COD_DETALLE__PEDIDO` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `historiales_ordenes_fabriciones`
--
ALTER TABLE `historiales_ordenes_fabriciones`
  MODIFY `COD_HISTORIAL` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `ordenes_fabricaciones`
--
ALTER TABLE `ordenes_fabricaciones`
  MODIFY `COD_ORDEN_FABRICACION` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `ordenes_pedidos`
--
ALTER TABLE `ordenes_pedidos`
  MODIFY `COD_ORDEN_PEDIDO` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
