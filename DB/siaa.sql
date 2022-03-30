-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-03-2022 a las 02:58:42
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
  `abono_1` int(11) DEFAULT NULL,
  `abono_2` int(11) DEFAULT NULL,
  `abono_3` int(11) DEFAULT NULL,
  `abono_4` int(11) DEFAULT NULL,
  `abono_5` int(11) DEFAULT NULL,
  `abono_6` int(11) DEFAULT NULL,
  `abono_7` int(11) DEFAULT NULL,
  `abono_8` int(11) DEFAULT NULL,
  `abono_9` int(11) DEFAULT NULL,
  `abono_10` int(11) DEFAULT NULL,
  `abono_11` int(11) DEFAULT NULL,
  `abono_12` int(11) DEFAULT NULL,
  `abono_13` int(11) DEFAULT NULL,
  `abono_14` int(11) DEFAULT NULL,
  `abono_15` int(11) DEFAULT NULL,
  `abono_16` int(11) DEFAULT NULL,
  `abono_17` int(11) DEFAULT NULL,
  `abono_18` int(11) DEFAULT NULL,
  `abono_19` int(11) DEFAULT NULL,
  `abono_20` int(11) DEFAULT NULL,
  `abono_21` int(11) DEFAULT NULL,
  `abono_22` int(11) DEFAULT NULL,
  `abono_23` int(11) DEFAULT NULL,
  `abono_24` int(11) DEFAULT NULL,
  `abono_25` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `abonos`
--

INSERT INTO `abonos` (`ID`, `id_cliente`, `abono_1`, `abono_2`, `abono_3`, `abono_4`, `abono_5`, `abono_6`, `abono_7`, `abono_8`, `abono_9`, `abono_10`, `abono_11`, `abono_12`, `abono_13`, `abono_14`, `abono_15`, `abono_16`, `abono_17`, `abono_18`, `abono_19`, `abono_20`, `abono_21`, `abono_22`, `abono_23`, `abono_24`, `abono_25`) VALUES
(1, 1, 200, 350, 700, 750, 2500, 2490, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 10, 4400, 4400, 4400, 4400, 4400, 600, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `abonos`
--
ALTER TABLE `abonos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `abonos`
--
ALTER TABLE `abonos`
  ADD CONSTRAINT `abonos_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
