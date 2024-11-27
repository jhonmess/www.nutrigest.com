-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-11-2024 a las 10:50:13
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `nutrigest`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacen`
--

CREATE TABLE `almacen` (
  `id_producto` int(11) NOT NULL,
  `codigo` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `stock_minimo` int(11) DEFAULT NULL,
  `stock_maximo` int(11) DEFAULT NULL,
  `precio_compra` varchar(255) NOT NULL,
  `precio_venta` varchar(255) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `imagen` text DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `almacen`
--

INSERT INTO `almacen` (`id_producto`, `codigo`, `nombre`, `descripcion`, `stock`, `stock_minimo`, `stock_maximo`, `precio_compra`, `precio_venta`, `fecha_ingreso`, `imagen`, `id_usuario`, `id_categoria`, `created_at`, `update_at`) VALUES
(1, 'P-00001', 'Gelatina Boom', '25 Kg', -6, 20, 40, '2000', '2300', '2024-11-23', '2024-11-23-09-35-45__1123116.jpg', 1, 4, '2024-11-24 21:27:13', '0000-00-00 00:00:00'),
(3, 'P-00003', 'Goma Xhantana', '1 Kg.', 110, 10, 500, '84', '89', '2024-11-24', '2024-11-24-12-50-47__GOMA-XANTHAN-0.250KG-scaled-1.jpg', 1, 9, '2024-11-24 00:50:47', '0000-00-00 00:00:00'),
(4, 'P-00004', 'Esencia Durazno', '50 GR', 69, 10, 100, '16', '18', '2024-11-24', '2024-11-24-09-28-46__es.durazno.jpeg', 1, 1, '2024-11-24 21:28:46', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre_categoria`, `created_at`, `updated_at`) VALUES
(1, 'GELIFICANTES', '2024-11-23 05:49:03', '2024-11-23 05:49:03'),
(2, 'DETERGENTES VARIOS', '2024-11-23 08:43:55', '2024-11-24 21:52:13'),
(3, 'ACIDULANTES', '2024-11-23 08:44:56', '0000-00-00 00:00:00'),
(4, 'CONSERVANTES', '2024-11-23 08:47:10', '0000-00-00 00:00:00'),
(5, 'COLORANTES', '2024-11-23 08:50:56', '2024-11-24 21:26:04'),
(6, 'COLORANTES', '2024-11-23 08:52:28', '0000-00-00 00:00:00'),
(7, 'SABORIZANTES', '2024-11-23 11:49:41', '0000-00-00 00:00:00'),
(8, 'EDULCORANTES', '2024-11-24 00:11:19', '0000-00-00 00:00:00'),
(9, 'ESPESANTES', '2024-11-24 00:49:58', '0000-00-00 00:00:00'),
(10, 'ESENCIAS', '2024-11-24 21:26:14', '0000-00-00 00:00:00'),
(11, 'LACTEOS', '2024-11-24 21:45:34', '0000-00-00 00:00:00'),
(12, 'ACIDULANTES', '2024-11-24 21:51:43', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_clientes` int(11) NOT NULL,
  `nombre_cliente` varchar(255) NOT NULL,
  `nit_ci_cliente` varchar(255) NOT NULL,
  `celular` varchar(50) NOT NULL,
  `email_cliente` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_clientes`, `nombre_cliente`, `nit_ci_cliente`, `celular`, `email_cliente`, `created_at`, `update_at`) VALUES
(1, 'Jose Julian', '88888888', '22222222', 'julian@gmail.com', '2024-11-24 19:24:39', '2024-11-24 19:24:39'),
(2, 'Iliana Mamani', '33333333', '44444444', 'iliana@gmail.com', '2024-11-24 19:24:39', '2024-11-24 19:24:39'),
(3, 'ivan', '33333333', '44444444', 'ivan@gmail.com', '2024-11-25 09:19:21', '0000-00-00 00:00:00'),
(4, 'jose', '44444444', '99999999', 'jose@gmail.com', '2024-11-25 09:21:48', '0000-00-00 00:00:00'),
(5, 'daniela', '55555555', '55555555', 'daniela@gmail.com', '2024-11-25 09:23:10', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id_compra` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `nro_compra` int(11) NOT NULL,
  `fecha_compra` date NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `comprobante` varchar(255) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `precio_compra` varchar(50) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id_compra`, `id_producto`, `nro_compra`, `fecha_compra`, `id_proveedor`, `comprobante`, `id_usuario`, `precio_compra`, `cantidad`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2024-11-24', 1, 'FACTURA', 1, '200', 50, '2024-11-24 04:26:00', '2024-11-24 04:26:00'),
(2, 3, 2, '2024-11-24', 1, 'PROFORMA', 1, '2350', 20, '2024-11-24 00:46:10', '2024-11-24 03:49:05'),
(3, 3, 3, '2024-11-24', 1, 'FACTURA', 1, '2500', 50, '2024-11-24 00:51:50', '0000-00-00 00:00:00'),
(7, 1, 6, '2024-11-24', 3, 'FACTURA', 1, '18000', 9, '2024-11-24 04:19:53', '0000-00-00 00:00:00'),
(8, 4, 6, '2024-11-24', 1, 'FACTURA', 1, '250', 50, '2024-11-24 21:30:35', '0000-00-00 00:00:00'),
(9, 1, 7, '2024-11-24', 5, 'NOTA DE VENTA', 1, '2500', 10, '2024-11-24 21:54:53', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preventa`
--

CREATE TABLE `preventa` (
  `id_preventa` int(11) NOT NULL,
  `nro_venta` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `preventa`
--

INSERT INTO `preventa` (`id_preventa`, `nro_venta`, `id_producto`, `cantidad`, `created_at`, `updated_at`) VALUES
(8, 1, 3, 3, '2024-11-25 09:47:11', '0000-00-00 00:00:00'),
(9, 2, 4, 5, '2024-11-25 10:28:38', '0000-00-00 00:00:00'),
(10, 3, 3, 10, '2024-11-25 10:34:30', '0000-00-00 00:00:00'),
(12, 3, 4, 1, '2024-11-25 11:26:15', '0000-00-00 00:00:00'),
(13, 4, 4, 5, '2024-11-25 13:26:57', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_proveedor` int(11) NOT NULL,
  `nombre_proveedor` varchar(255) NOT NULL,
  `celular` varchar(50) NOT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `empresa` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedor`, `nombre_proveedor`, `celular`, `telefono`, `empresa`, `email`, `direccion`, `created_at`, `updated_at`) VALUES
(1, 'Erlan Junior Peñaloza', '12345678', '123', 'NATUREX', 'naturex@gmail.com', 'zona alto lima #538', '2024-11-24 02:28:12', '2024-11-24 21:32:11'),
(3, 'Luis Mario', '11111111', '22222222', 'INALIM', 'inalim@gmail.com', '11011', '2024-11-23 22:55:41', '0000-00-00 00:00:00'),
(5, 'JHON mess', '1331321', '123123', 'NATURAL', 'natural@gmail.com', 'stc.', '2024-11-24 21:53:24', '2024-11-24 21:53:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `rol` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `rol`, `created_at`, `updated_at`) VALUES
(1, 'ADMINISTRADOR', '2024-11-22 16:01:18', '2024-11-22 16:01:18'),
(7, 'VENDEDOR', '2024-11-22 12:12:56', '2024-11-22 12:48:02'),
(9, 'ENCARGADO DE COMPRAS', '2024-11-22 13:22:25', '2024-11-24 21:25:25'),
(10, 'ENCARGADO ALMACEN', '2024-11-22 22:59:06', '2024-11-24 21:51:04'),
(11, 'CONTADOR', '2024-11-24 21:25:37', '0000-00-00 00:00:00'),
(12, 'GERENTE', '2024-11-24 21:50:51', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombres` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password_user` text NOT NULL,
  `token` varchar(100) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombres`, `email`, `password_user`, `token`, `id_rol`, `created_at`, `update_at`) VALUES
(1, 'Juan Gabriel', 'gabriel55mh@gmail.com', '$2y$10$2ytWwUOBGz9YFOrY5INMCuE3AJN1VjEapfGn3sKufZKEDzoHosO1O', '', 1, '2024-11-23 05:28:45', '2024-11-23 05:28:45'),
(2, 'David', 'david@gmail.com', '$2y$10$zs5OJev.iYrHfyC1Sp8zPuwiM5sk8/5nA8/xooY4cM5ckwmsjtU.G', '', 10, '2024-11-24 21:24:35', '2024-11-24 21:24:47'),
(3, 'Carlos', 'carlos@gmail.com', '$2y$10$.er7PipwbgB6KtQihQ6qUOoHInXFquyBixD81Fg4v5quNewK.biAa', '', 7, '2024-11-24 21:45:06', '2024-11-24 21:45:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL,
  `nro_venta` int(11) NOT NULL,
  `id_clientes` int(11) NOT NULL,
  `total_pagado` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_venta`, `nro_venta`, `id_clientes`, `total_pagado`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 267, '2024-11-25 10:17:06', '0000-00-00 00:00:00'),
(2, 2, 1, 90, '2024-11-25 10:28:45', '0000-00-00 00:00:00'),
(3, 3, 1, 908, '2024-11-25 12:25:16', '0000-00-00 00:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `almacen`
--
ALTER TABLE `almacen`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_clientes`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_proveedor` (`id_proveedor`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `preventa`
--
ALTER TABLE `preventa`
  ADD PRIMARY KEY (`id_preventa`),
  ADD KEY `id_venta` (`nro_venta`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_rol` (`id_rol`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `id_cliente` (`id_clientes`),
  ADD KEY `nro_venta` (`nro_venta`),
  ADD KEY `id_clientes` (`id_clientes`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `almacen`
--
ALTER TABLE `almacen`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_clientes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `preventa`
--
ALTER TABLE `preventa`
  MODIFY `id_preventa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `almacen`
--
ALTER TABLE `almacen`
  ADD CONSTRAINT `almacen_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`) ON UPDATE CASCADE,
  ADD CONSTRAINT `almacen_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id_proveedor`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `compras_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `almacen` (`id_producto`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `compras_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `preventa`
--
ALTER TABLE `preventa`
  ADD CONSTRAINT `preventa_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `almacen` (`id_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`id_clientes`) REFERENCES `clientes` (`id_clientes`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`nro_venta`) REFERENCES `preventa` (`nro_venta`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
