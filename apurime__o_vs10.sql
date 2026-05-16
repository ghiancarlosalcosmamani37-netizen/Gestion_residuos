-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-12-2023 a las 00:24:53
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `apurimeño`
--
CREATE DATABASE IF NOT EXISTS `apurimeño` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `apurimeño`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chofer`
--

CREATE TABLE `chofer` (
  `ID` int(11) NOT NULL,
  `Nombre` char(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `DNI` int(8) NOT NULL,
  `Numero de Licencia` varchar(50) NOT NULL,
  `Telefono` int(9) NOT NULL,
  `NumeroCuentabancaria` text NOT NULL,
  `Estado` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `chofer`
--

INSERT INTO `chofer` (`ID`, `Nombre`, `Apellido`, `DNI`, `Numero de Licencia`, `Telefono`, `NumeroCuentabancaria`, `Estado`) VALUES
(10, 'Jesus Luis', 'MARINO LARA', 72103771, 'MPA72103772', 987674321, '20501065064008', 1),
(11, 'Miguel Angel', 'LEGUIA GUZMAN', 12345679, 'MPA82103772', 987654322, '21501065064008', 1),
(13, 'Johan', 'AYALA FERRERAS', 74153782, 'MPA74103772', 928968888, '25501065064008', 1),
(14, 'Jordi', 'RAYA GAVILAN', 73133672, 'MPA12103772', 918968888, '24501065064008', 1),
(15, 'Aleu', 'ALEU ICART', 85103862, 'MPA22103772', 938968888, '28501065064008', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos`
--

CREATE TABLE `datos` (
  `IDDatos` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `titulo` char(50) NOT NULL,
  `Contenido` text NOT NULL,
  `fecha` datetime NOT NULL,
  `foto` longblob NOT NULL,
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `datos`
--

INSERT INTO `datos` (`IDDatos`, `username`, `titulo`, `Contenido`, `fecha`, `foto`, `Estado`) VALUES
(3, 'prueba', 'Ghian', 'aaaaa', '2023-05-28 14:57:03', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encomiendas`
--

CREATE TABLE `encomiendas` (
  `id` int(6) UNSIGNED NOT NULL,
  `numero_boleto` varchar(10) DEFAULT NULL,
  `dni` int(8) DEFAULT NULL,
  `lugar` varchar(50) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora_recepcion` time DEFAULT NULL,
  `hora_viaje` time DEFAULT NULL,
  `remitente` varchar(50) DEFAULT NULL,
  `consignado` varchar(50) DEFAULT NULL,
  `dni2` int(8) DEFAULT NULL,
  `telefono` char(9) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `destino` varchar(50) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `kilos` decimal(10,2) DEFAULT NULL,
  `total` decimal(8,2) DEFAULT NULL,
  `estado` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `encomiendas`
--

INSERT INTO `encomiendas` (`id`, `numero_boleto`, `dni`, `lugar`, `fecha`, `hora_recepcion`, `hora_viaje`, `remitente`, `consignado`, `dni2`, `telefono`, `direccion`, `destino`, `descripcion`, `kilos`, `total`, `estado`) VALUES
(0, 'Nº. 587584', 72905099, 'Andahuaylas', '2023-12-30', '14:40:00', '17:41:00', 'KEVIN LUIS CHOQUE SOLANO', 'LUCIANA FERNANDA VALDIVIA LUJAN', 72905098, '', 'Av. malinas', 'Ayacucho', 'Prueba DNI2', 12.00, 60.00, 0),
(0, 'Nº. 017923', 72905099, 'Andahuaylas', '2023-12-30', '14:42:00', '17:43:00', 'KEVIN LUIS CHOQUE SOLANO', 'LUCIANA FERNANDA VALDIVIA LUJAN', 72905098, '954701973', 'Preuba 2', 'Ayacucho', 'importe ', 13.00, 65.00, 0),
(0, 'Nº. 353215', 72103772, 'Andahuaylas', '2023-12-30', '14:53:00', '16:54:00', 'GHIAN CARLOS ALCOS MAMANI', 'MARILY DALILA DELGADO CASTRO', 72103775, '954701973', 'prueba 3', 'Ayacucho', 'srdgadfgadfg', 15.00, 75.00, 0),
(0, 'Nº. 800880', 72905099, 'Andahuaylas', '2023-12-30', '14:58:00', '14:59:00', 'KEVIN LUIS CHOQUE SOLANO', 'JUAN MIGUEL ALONZO VILLACORTA MONROY', 72905092, '954701973', 'sdFasfd', 'Ayacucho', 'adsfgdsfg', 15.00, 75.00, 1),
(0, 'Nº. 243005', 72905099, 'Andahuaylas', '2023-12-30', '14:59:00', '15:00:00', 'KEVIN LUIS CHOQUE SOLANO', 'CHRISTIAN RICHARD SORIANO ROSAS', 70468642, '954701973', 'fdgsdfg', 'Ayacucho', 'sdfgsdfgsfdg', 15.00, 75.00, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutas`
--

CREATE TABLE `rutas` (
  `ID` int(11) NOT NULL,
  `Lugar` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rutas`
--

INSERT INTO `rutas` (`ID`, `Lugar`) VALUES
(5, 'Andahuaylas'),
(12, 'Ayacucho'),
(13, 'Abancay');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutas2`
--

CREATE TABLE `rutas2` (
  `ID` int(11) NOT NULL,
  `Lugar1` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rutas2`
--

INSERT INTO `rutas2` (`ID`, `Lugar1`) VALUES
(5, 'Andahuaylas'),
(12, 'Ayacucho'),
(13, 'Abancay');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `username` varchar(50) NOT NULL,
  `Correo` varchar(100) NOT NULL,
  `password` char(250) NOT NULL,
  `fotoU` longblob DEFAULT NULL,
  `TipoUS` int(11) NOT NULL,
  `Lugar` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`username`, `Correo`, `password`, `fotoU`, `TipoUS`, `Lugar`) VALUES
('Alcos', 'Alocs Mamani', '$2y$10$uBNY3TqvMp/Vi3XNzQpmxe7jZL0AwKip0HvGH.g6LkliGYVwUsg7C', '', 3, ''),
('francis', 'Cardenas', '$2y$10$ffQnKtIslPWaB1avFCdq0uQqjIfRwUzQXuXSX.SIGKFECnPt4FcnK', NULL, 2, 'Andahuaylas'),
('kevin', 'Kevin Choque', '$2y$10$rbi5HyHmEPnzp9svMkvScOp7AMJpPa/JI9Ra.Pw3xq7Bv3dJN1RhS', NULL, 1, 'Andahuaylas'),
('Prueba2', 'prueba2', '$2y$10$lOO5AHahdvcXjWGyNbr5xuKwQrGOUOYjD4VVRdtpvuSuma.7LSsQ2', NULL, 2, 'Ayacucho');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `van`
--

CREATE TABLE `van` (
  `IDV` int(11) NOT NULL,
  `Marca` varchar(30) NOT NULL,
  `Modelo` varchar(30) NOT NULL,
  `Placa` varchar(10) NOT NULL,
  `Año` year(4) NOT NULL,
  `Estado` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `van`
--

INSERT INTO `van` (`IDV`, `Marca`, `Modelo`, `Placa`, `Año`, `Estado`) VALUES
(14, 'Toyota', 'Hice', 'gh8-358', '2027', 1),
(15, 'Renault', 'c95X', '566-hgf', '2018', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta_boleto`
--

CREATE TABLE `venta_boleto` (
  `id_boleto` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `origen` varchar(100) NOT NULL,
  `destino` varchar(100) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `n_asiento` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `username` varchar(50) NOT NULL,
  `dni` varchar(20) NOT NULL,
  `IDVIAJE` int(11) DEFAULT NULL,
  `asiento_disponible` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `venta_boleto`
--

INSERT INTO `venta_boleto` (`id_boleto`, `nombre`, `apellido`, `origen`, `destino`, `precio`, `n_asiento`, `fecha`, `username`, `dni`, `IDVIAJE`, `asiento_disponible`) VALUES
(6, 'DABOR JOAQUIN', 'VILLAVICENCIO CORZO', 'Ayacucho', 'Abancay', 16.00, 3, '2023-12-30 17:09:00', 'kevin', '72905080', 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viajessalida`
--

CREATE TABLE `viajessalida` (
  `IDVIAJE` int(10) NOT NULL,
  `IDChofer` int(10) NOT NULL,
  `IDVan` int(10) NOT NULL,
  `Partida` int(50) NOT NULL,
  `Destino` int(50) NOT NULL,
  `Salida` date NOT NULL,
  `LLegada` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `viajessalida`
--

INSERT INTO `viajessalida` (`IDVIAJE`, `IDChofer`, `IDVan`, `Partida`, `Destino`, `Salida`, `LLegada`) VALUES
(1, 13, 14, 5, 13, '2023-08-03', '07:00:00'),
(2, 11, 14, 12, 5, '2023-08-03', '10:00:00'),
(3, 13, 15, 13, 5, '2023-08-03', '17:00:00'),
(4, 10, 14, 12, 13, '2024-01-10', '00:46:00'),
(5, 15, 15, 5, 13, '2023-12-30', '18:36:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `chofer`
--
ALTER TABLE `chofer`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `datos`
--
ALTER TABLE `datos`
  ADD PRIMARY KEY (`IDDatos`);

--
-- Indices de la tabla `rutas`
--
ALTER TABLE `rutas`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `rutas2`
--
ALTER TABLE `rutas2`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `van`
--
ALTER TABLE `van`
  ADD PRIMARY KEY (`IDV`);

--
-- Indices de la tabla `venta_boleto`
--
ALTER TABLE `venta_boleto`
  ADD PRIMARY KEY (`id_boleto`);

--
-- Indices de la tabla `viajessalida`
--
ALTER TABLE `viajessalida`
  ADD PRIMARY KEY (`IDVIAJE`),
  ADD KEY `IDChofer` (`IDChofer`),
  ADD KEY `IDVan` (`IDVan`),
  ADD KEY `Partida` (`Partida`),
  ADD KEY `Destino` (`Destino`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `chofer`
--
ALTER TABLE `chofer`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `datos`
--
ALTER TABLE `datos`
  MODIFY `IDDatos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `rutas`
--
ALTER TABLE `rutas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `rutas2`
--
ALTER TABLE `rutas2`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `van`
--
ALTER TABLE `van`
  MODIFY `IDV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `venta_boleto`
--
ALTER TABLE `venta_boleto`
  MODIFY `id_boleto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `viajessalida`
--
ALTER TABLE `viajessalida`
  MODIFY `IDVIAJE` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `viajessalida`
--
ALTER TABLE `viajessalida`
  ADD CONSTRAINT `viajessalida_ibfk_1` FOREIGN KEY (`IDChofer`) REFERENCES `chofer` (`ID`),
  ADD CONSTRAINT `viajessalida_ibfk_2` FOREIGN KEY (`IDVan`) REFERENCES `van` (`IDV`),
  ADD CONSTRAINT `viajessalida_ibfk_3` FOREIGN KEY (`Partida`) REFERENCES `rutas` (`ID`),
  ADD CONSTRAINT `viajessalida_ibfk_4` FOREIGN KEY (`Destino`) REFERENCES `rutas` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
