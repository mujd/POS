-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-02-2017 a las 22:53:11
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pos`
--
CREATE DATABASE IF NOT EXISTS `pos` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `pos`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apertura`
--

CREATE TABLE `apertura` (
  `id` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `apertura` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `id` int(11) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `marca_id` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `formato_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `unidad_id` int(11) NOT NULL,
  `articulo` text NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cierrecab`
--

CREATE TABLE `cierrecab` (
  `id` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `apertura` bigint(20) NOT NULL,
  `total` bigint(20) NOT NULL,
  `efectivo` bigint(20) NOT NULL,
  `tarjeta` bigint(20) NOT NULL,
  `contabilizacion` bigint(20) NOT NULL,
  `diferencia` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cierredet`
--

CREATE TABLE `cierredet` (
  `id` int(11) NOT NULL,
  `cierre_id` int(11) NOT NULL,
  `venta_id` int(11) NOT NULL,
  `ventadet_id` int(11) NOT NULL,
  `articulo_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` bigint(20) NOT NULL,
  `descuento` bigint(20) NOT NULL,
  `total` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `rut` varchar(10) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `giro` varchar(200) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `comuna` varchar(200) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `rut`, `nombre`, `giro`, `direccion`, `comuna`, `telefono`, `email`) VALUES
(1, '142133212', 'Rodrigo Mendez', 'restaurant', 'Av. Grecia 1234', 'Ñuñoa', '222135268', 'rodrigo@mail.cl');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientecontacto`
--

CREATE TABLE `clientecontacto` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `rut` varchar(10) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `cargo` varchar(200) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturaclientecab`
--

CREATE TABLE `facturaclientecab` (
  `id` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `cliente_rut` varchar(10) NOT NULL,
  `cliente_nombre` varchar(200) NOT NULL,
  `cliente_giro` varchar(200) NOT NULL,
  `cliente_direccion` varchar(200) NOT NULL,
  `cliente_comuna` varchar(200) NOT NULL,
  `cliente_telefono` varchar(15) NOT NULL,
  `cliente_email` varchar(100) NOT NULL,
  `subTotalNeto` bigint(20) NOT NULL,
  `descuento` bigint(20) NOT NULL,
  `totalNeto` bigint(20) NOT NULL,
  `iva` bigint(20) NOT NULL,
  `total` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturaclientedet`
--

CREATE TABLE `facturaclientedet` (
  `id` int(11) NOT NULL,
  `factura_id` int(11) NOT NULL,
  `articulo_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `subTotalNeto` bigint(20) NOT NULL,
  `descuento` bigint(20) NOT NULL,
  `totalNeto` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturaproveedorcab`
--

CREATE TABLE `facturaproveedorcab` (
  `id` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `proveedor_rut` varchar(10) NOT NULL,
  `proveedor_nombre` varchar(200) NOT NULL,
  `proveedor_direccion` varchar(200) NOT NULL,
  `proveedor_comuna` varchar(200) NOT NULL,
  `proveedor_telefono` varchar(15) NOT NULL,
  `proveedor_email` varchar(100) NOT NULL,
  `neto` bigint(20) NOT NULL,
  `iva` bigint(20) NOT NULL,
  `total` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturaproveedordet`
--

CREATE TABLE `facturaproveedordet` (
  `id` int(11) NOT NULL,
  `factura_id` int(11) NOT NULL,
  `articulo_id` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `neto` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formato`
--

CREATE TABLE `formato` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimiento`
--

CREATE TABLE `movimiento` (
  `id` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `movimientoTipo_id` int(11) NOT NULL,
  `articulo_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientotipo`
--

CREATE TABLE `movimientotipo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `signo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id` int(11) NOT NULL,
  `rut` varchar(10) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `comuna` varchar(200) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id`, `rut`, `nombre`, `direccion`, `comuna`, `telefono`, `email`) VALUES
(1, '122589635', 'Juana Andrea Lopez Donoso', 'Av. Independencia 685', 'Independencia', '225418563', 'juana@mail.cl');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedorvendedor`
--

CREATE TABLE `proveedorvendedor` (
  `id` int(11) NOT NULL,
  `proveedor_id` int(11) NOT NULL,
  `rut` varchar(10) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `articulo_id` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `stock` int(11) NOT NULL,
  `costo` bigint(20) NOT NULL,
  `venta` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad`
--

CREATE TABLE `unidad` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombres` varchar(200) NOT NULL,
  `apellidopaterno` varchar(200) NOT NULL,
  `apellidomaterno` varchar(200) NOT NULL,
  `cargo` varchar(200) NOT NULL,
  `login` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombres`, `apellidopaterno`, `apellidomaterno`, `cargo`, `login`, `pass`) VALUES
(1, 'Maximiliano André', 'Rojas', 'Flores', 'Jefe de local', 'max', 'max');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventacab`
--

CREATE TABLE `ventacab` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `boleta` bigint(20) NOT NULL,
  `fecha` datetime NOT NULL,
  `total` bigint(20) NOT NULL,
  `tarjeta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventadet`
--

CREATE TABLE `ventadet` (
  `id` int(11) NOT NULL,
  `venta_id` int(11) NOT NULL,
  `articulo_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` bigint(20) NOT NULL,
  `descuento` bigint(20) NOT NULL,
  `total` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `apertura`
--
ALTER TABLE `apertura`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ape_usu` (`usuario_id`);

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `art_cat` (`categoria_id`),
  ADD KEY `art_for` (`formato_id`),
  ADD KEY `art_mar` (`marca_id`),
  ADD KEY `art_uni` (`unidad_id`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cierrecab`
--
ALTER TABLE `cierrecab`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cie_usu` (`usuario_id`);

--
-- Indices de la tabla `cierredet`
--
ALTER TABLE `cierredet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cie_cie` (`cierre_id`),
  ADD KEY `cie_ven` (`venta_id`),
  ADD KEY `cie_ven_det` (`ventadet_id`),
  ADD KEY `cie_art` (`articulo_id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientecontacto`
--
ALTER TABLE `clientecontacto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cli_cli` (`cliente_id`);

--
-- Indices de la tabla `facturaclientecab`
--
ALTER TABLE `facturaclientecab`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fact_usua` (`usuario_id`);

--
-- Indices de la tabla `facturaclientedet`
--
ALTER TABLE `facturaclientedet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fact_fact` (`factura_id`),
  ADD KEY `fact_arti` (`articulo_id`);

--
-- Indices de la tabla `facturaproveedorcab`
--
ALTER TABLE `facturaproveedorcab`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fac_usu` (`usuario_id`);

--
-- Indices de la tabla `facturaproveedordet`
--
ALTER TABLE `facturaproveedordet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fac_fac` (`factura_id`),
  ADD KEY `fac_art` (`articulo_id`);

--
-- Indices de la tabla `formato`
--
ALTER TABLE `formato`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `movimiento`
--
ALTER TABLE `movimiento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mov_usu` (`usuario_id`),
  ADD KEY `mov_tip` (`movimientoTipo_id`),
  ADD KEY `mov_art` (`articulo_id`);

--
-- Indices de la tabla `movimientotipo`
--
ALTER TABLE `movimientotipo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proveedorvendedor`
--
ALTER TABLE `proveedorvendedor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pro_pro` (`proveedor_id`);

--
-- Indices de la tabla `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`),
  ADD KEY `st_art` (`articulo_id`);

--
-- Indices de la tabla `unidad`
--
ALTER TABLE `unidad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventacab`
--
ALTER TABLE `ventacab`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventadet`
--
ALTER TABLE `ventadet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ven_art` (`articulo_id`),
  ADD KEY `ven_ven` (`venta_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `apertura`
--
ALTER TABLE `apertura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cierrecab`
--
ALTER TABLE `cierrecab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cierredet`
--
ALTER TABLE `cierredet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `clientecontacto`
--
ALTER TABLE `clientecontacto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `facturaclientecab`
--
ALTER TABLE `facturaclientecab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `facturaclientedet`
--
ALTER TABLE `facturaclientedet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `facturaproveedorcab`
--
ALTER TABLE `facturaproveedorcab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `facturaproveedordet`
--
ALTER TABLE `facturaproveedordet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `formato`
--
ALTER TABLE `formato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `movimiento`
--
ALTER TABLE `movimiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `movimientotipo`
--
ALTER TABLE `movimientotipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `proveedorvendedor`
--
ALTER TABLE `proveedorvendedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `unidad`
--
ALTER TABLE `unidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `ventacab`
--
ALTER TABLE `ventacab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ventadet`
--
ALTER TABLE `ventadet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `apertura`
--
ALTER TABLE `apertura`
  ADD CONSTRAINT `ape_usu` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD CONSTRAINT `art_cat` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`),
  ADD CONSTRAINT `art_for` FOREIGN KEY (`formato_id`) REFERENCES `formato` (`id`),
  ADD CONSTRAINT `art_mar` FOREIGN KEY (`marca_id`) REFERENCES `marca` (`id`),
  ADD CONSTRAINT `art_uni` FOREIGN KEY (`unidad_id`) REFERENCES `unidad` (`id`);

--
-- Filtros para la tabla `cierrecab`
--
ALTER TABLE `cierrecab`
  ADD CONSTRAINT `cie_usu` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `cierredet`
--
ALTER TABLE `cierredet`
  ADD CONSTRAINT `cie_art` FOREIGN KEY (`articulo_id`) REFERENCES `articulo` (`id`),
  ADD CONSTRAINT `cie_cie` FOREIGN KEY (`cierre_id`) REFERENCES `cierrecab` (`id`),
  ADD CONSTRAINT `cie_ven` FOREIGN KEY (`venta_id`) REFERENCES `ventacab` (`id`),
  ADD CONSTRAINT `cie_ven_det` FOREIGN KEY (`ventadet_id`) REFERENCES `ventadet` (`id`);

--
-- Filtros para la tabla `clientecontacto`
--
ALTER TABLE `clientecontacto`
  ADD CONSTRAINT `cli_cli` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`);

--
-- Filtros para la tabla `facturaclientecab`
--
ALTER TABLE `facturaclientecab`
  ADD CONSTRAINT `fact_usua` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `facturaclientedet`
--
ALTER TABLE `facturaclientedet`
  ADD CONSTRAINT `fact_arti` FOREIGN KEY (`articulo_id`) REFERENCES `articulo` (`id`),
  ADD CONSTRAINT `fact_fact` FOREIGN KEY (`factura_id`) REFERENCES `facturaclientecab` (`id`);

--
-- Filtros para la tabla `facturaproveedorcab`
--
ALTER TABLE `facturaproveedorcab`
  ADD CONSTRAINT `fac_usu` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `facturaproveedordet`
--
ALTER TABLE `facturaproveedordet`
  ADD CONSTRAINT `fac_art` FOREIGN KEY (`articulo_id`) REFERENCES `articulo` (`id`),
  ADD CONSTRAINT `fac_fac` FOREIGN KEY (`factura_id`) REFERENCES `facturaproveedorcab` (`id`);

--
-- Filtros para la tabla `movimiento`
--
ALTER TABLE `movimiento`
  ADD CONSTRAINT `mov_art` FOREIGN KEY (`articulo_id`) REFERENCES `articulo` (`id`),
  ADD CONSTRAINT `mov_tip` FOREIGN KEY (`movimientoTipo_id`) REFERENCES `movimientotipo` (`id`),
  ADD CONSTRAINT `mov_usu` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `proveedorvendedor`
--
ALTER TABLE `proveedorvendedor`
  ADD CONSTRAINT `pro_pro` FOREIGN KEY (`proveedor_id`) REFERENCES `proveedor` (`id`);

--
-- Filtros para la tabla `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `st_art` FOREIGN KEY (`articulo_id`) REFERENCES `articulo` (`id`);

--
-- Filtros para la tabla `ventadet`
--
ALTER TABLE `ventadet`
  ADD CONSTRAINT `ven_art` FOREIGN KEY (`articulo_id`) REFERENCES `articulo` (`id`),
  ADD CONSTRAINT `ven_ven` FOREIGN KEY (`venta_id`) REFERENCES `ventacab` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
