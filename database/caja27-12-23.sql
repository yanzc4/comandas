-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-12-2023 a las 03:27:38
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `caja`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `estado`) VALUES
(1, 'Desayunos', 1),
(2, 'Almuerzos', 1),
(3, 'Sandwiches', 1),
(4, 'Jugos', 1),
(5, 'Bebidas', 1),
(6, 'Extras', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comandas`
--

CREATE TABLE `comandas` (
  `id` int(11) NOT NULL,
  `empleado` varchar(6) NOT NULL,
  `fecha` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comandas`
--

INSERT INTO `comandas` (`id`, `empleado`, `fecha`) VALUES
(4, 'AGC001', '2023-12-27'),
(5, 'AGC001', '27/12/2023'),
(6, 'AGC001', '27/12/2023'),
(7, 'AGC001', '27/12/2023'),
(8, 'AGC001', '27/12/2023'),
(9, 'AGC001', '27/12/2023'),
(10, 'AGC001', '27/12/2023'),
(11, 'AGC001', '27/12/2023'),
(12, 'AGC001', '27/12/2023'),
(13, 'AGC001', '27/12/2023'),
(14, 'AGC001', '27/12/2023'),
(15, 'AGC001', '27/12/2023'),
(16, 'AGC001', '27/12/2023'),
(17, 'AGC001', '27/12/2023');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallecomanda`
--

CREATE TABLE `detallecomanda` (
  `idcomanda` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detallecomanda`
--

INSERT INTO `detallecomanda` (`idcomanda`, `idproducto`, `cantidad`, `precio`) VALUES
(4, 1, 1, 20.00),
(5, 2, 1, 30.00),
(5, 6, 1, 10.00),
(5, 1, 2, 20.00),
(6, 2, 1, 30.00),
(6, 4, 1, 20.00),
(6, 1, 1, 20.00),
(7, 2, 1, 30.00),
(7, 1, 1, 20.00),
(8, 1, 1, 20.00),
(9, 1, 1, 20.00),
(10, 2, 1, 30.00),
(11, 1, 1, 20.00),
(11, 6, 1, 10.00),
(12, 1, 1, 20.00),
(12, 5, 1, 8.00),
(13, 2, 1, 30.00),
(13, 5, 1, 8.00),
(14, 1, 1, 20.00),
(14, 3, 1, 20.00),
(14, 5, 1, 8.00),
(15, 1, 1, 20.00),
(15, 6, 1, 10.00),
(15, 3, 1, 20.00),
(16, 3, 1, 20.00),
(17, 2, 2, 30.00),
(17, 1, 1, 20.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `estado` int(1) NOT NULL,
  `categoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `precio`, `estado`, `categoria`) VALUES
(1, 'Desayuno Americano', 20.00, 1, 1),
(2, 'Desayuno Hawaiano', 30.00, 1, 1),
(3, 'Jugo de papaya', 20.00, 1, 4),
(4, 'Jugo de Fresas', 20.00, 1, 4),
(5, 'Gaseosa', 8.00, 1, 5),
(6, 'Cafe', 10.00, 1, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `cod` varchar(6) NOT NULL,
  `clave` varchar(20) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `rol` int(1) NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`cod`, `clave`, `nombre`, `rol`, `estado`) VALUES
('AGC001', '1234', 'Administrador', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comandas`
--
ALTER TABLE `comandas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idusuario` (`empleado`);

--
-- Indices de la tabla `detallecomanda`
--
ALTER TABLE `detallecomanda`
  ADD KEY `fk_idcomanda` (`idcomanda`),
  ADD KEY `fk_idproduct` (`idproducto`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_categoria` (`categoria`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cod`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `comandas`
--
ALTER TABLE `comandas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comandas`
--
ALTER TABLE `comandas`
  ADD CONSTRAINT `fk_idusuario` FOREIGN KEY (`empleado`) REFERENCES `usuarios` (`cod`);

--
-- Filtros para la tabla `detallecomanda`
--
ALTER TABLE `detallecomanda`
  ADD CONSTRAINT `fk_idcomanda` FOREIGN KEY (`idcomanda`) REFERENCES `comandas` (`id`),
  ADD CONSTRAINT `fk_idproduct` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_categoria` FOREIGN KEY (`categoria`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
