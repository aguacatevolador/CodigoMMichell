-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-03-2022 a las 21:32:22
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `siaa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abonos`
--

CREATE TABLE `abonos` (
  `ID` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `abono1` int(11) DEFAULT NULL,
  `abono2` int(11) DEFAULT NULL,
  `abono3` int(11) DEFAULT NULL,
  `abono4` int(11) DEFAULT NULL,
  `abono5` int(11) DEFAULT NULL,
  `abono6` int(11) DEFAULT NULL,
  `abono7` int(11) DEFAULT NULL,
  `abono8` int(11) DEFAULT NULL,
  `abono9` int(11) DEFAULT NULL,
  `abono10` int(11) DEFAULT NULL,
  `abono11` int(11) DEFAULT NULL,
  `abono12` int(11) DEFAULT NULL,
  `abono13` int(11) DEFAULT NULL,
  `abono14` int(11) DEFAULT NULL,
  `abono15` int(11) DEFAULT NULL,
  `abono16` int(11) DEFAULT NULL,
  `abono17` int(11) DEFAULT NULL,
  `abono18` int(11) DEFAULT NULL,
  `abono19` int(11) DEFAULT NULL,
  `abono20` int(11) DEFAULT NULL,
  `abono21` int(11) DEFAULT NULL,
  `abono22` int(11) DEFAULT NULL,
  `abono23` int(11) DEFAULT NULL,
  `abono24` int(11) DEFAULT NULL,
  `abono25` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `abonos`
--

INSERT INTO `abonos` (`ID`, `id_cliente`, `abono1`, `abono2`, `abono3`, `abono4`, `abono5`, `abono6`, `abono7`, `abono8`, `abono9`, `abono10`, `abono11`, `abono12`, `abono13`, `abono14`, `abono15`, `abono16`, `abono17`, `abono18`, `abono19`, `abono20`, `abono21`, `abono22`, `abono23`, `abono24`, `abono25`) VALUES
(1, 1, 200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `codigo_articulo` int(8) NOT NULL,
  `nombre` text NOT NULL,
  `precio` int(6) NOT NULL,
  `descripcion` text NOT NULL,
  `stok` int(2) NOT NULL DEFAULT 0,
  `estatus` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`codigo_articulo`, `nombre`, `precio`, `descripcion`, `stok`, `estatus`) VALUES
(10000001, 'Base para cama individual de color', 800, 'Base para cama individual fabricada en madera reciclada con recubrimiento de laca de color', 9, 1),
(10000002, 'Silla de Madera', 350, 'Silla de madera, estática sin chojín de apoyo ', 10, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `ID` int(6) NOT NULL,
  `nombre` text NOT NULL,
  `apellidos` text NOT NULL,
  `direccion` text NOT NULL,
  `no` text NOT NULL,
  `colonia` text NOT NULL,
  `telefono` int(11) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`ID`, `nombre`, `apellidos`, `direccion`, `no`, `colonia`, `telefono`, `estatus`) VALUES
(1, 'Martin Alberto', 'Perez Hernandez', 'segunda de lomas ', '85', 'Zacatecas', 2147483647, 1),
(8, 'Jose Alejandro', 'trejo reyes', 'bugambilias', '99', 'lazaro cardenas', 2147483647, 1),
(9, 'Martin Alberto', 'Perez Hernandez', 'segunda de lomas ', '26', 'Zacatecas', 564789321, 1),
(10, 'Publico en general', 'NA', 'Conocido', '1', 'Conocida', 555123456, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas`
--

CREATE TABLE `cuentas` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_abonos` int(11) NOT NULL,
  `saldo` int(11) NOT NULL,
  `plazos` int(11) NOT NULL,
  `id_artuculo_1` int(11) NOT NULL,
  `id_articulo_2` int(11) DEFAULT NULL,
  `id_articulo_3` int(11) DEFAULT NULL,
  `id_articulo_4` int(11) DEFAULT NULL,
  `id_articulo_5` int(11) DEFAULT NULL,
  `id_articulo_6` int(11) DEFAULT NULL,
  `id_articulo_7` int(11) DEFAULT NULL,
  `id_articulo_8` int(11) DEFAULT NULL,
  `id_articulo_9` int(11) DEFAULT NULL,
  `id_articulo_10` int(11) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cuentas`
--

INSERT INTO `cuentas` (`id`, `id_cliente`, `id_abonos`, `saldo`, `plazos`, `id_artuculo_1`, `id_articulo_2`, `id_articulo_3`, `id_articulo_4`, `id_articulo_5`, `id_articulo_6`, `id_articulo_7`, `id_articulo_8`, `id_articulo_9`, `id_articulo_10`, `estado`) VALUES
(1, 1, 1, 5000, 6, 1, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL,
  `USUARIO` text NOT NULL,
  `PASS` text NOT NULL,
  `NOMBRE` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `USUARIO`, `PASS`, `NOMBRE`) VALUES
(1, 'Admin', 'e714f5e09b26f37bb36f63f24789a3b5', 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `ID` int(11) NOT NULL,
  `cliente` int(11) NOT NULL,
  `cuenta` int(11) NOT NULL,
  `id_articulo_1` int(11) NOT NULL,
  `id_articulo_2` int(11) DEFAULT NULL,
  `id_articulo_3` int(11) DEFAULT NULL,
  `id_articulo_4` int(11) DEFAULT NULL,
  `id_articulo_5` int(11) DEFAULT NULL,
  `id_articulo_6` int(11) DEFAULT NULL,
  `id_articulo_7` int(11) DEFAULT NULL,
  `id_articulo_8` int(11) DEFAULT NULL,
  `id_articulo_9` int(11) DEFAULT NULL,
  `id_articulo_10` int(11) DEFAULT NULL,
  `total` int(11) NOT NULL,
  `tipo` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `abonos`
--
ALTER TABLE `abonos`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `ID` (`ID`);

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`codigo_articulo`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `cuentas`
--
ALTER TABLE `cuentas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_abonos` (`id_abonos`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `abonos`
--
ALTER TABLE `abonos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `codigo_articulo` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100000003;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `cuentas`
--
ALTER TABLE `cuentas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `abonos`
--
ALTER TABLE `abonos`
  ADD CONSTRAINT `abonos_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cuentas`
--
ALTER TABLE `cuentas`
  ADD CONSTRAINT `cuentas_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cuentas_ibfk_2` FOREIGN KEY (`id_abonos`) REFERENCES `abonos` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
