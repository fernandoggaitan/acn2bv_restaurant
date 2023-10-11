-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-10-2023 a las 04:12:20
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `restaurant`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` float(8,2) NOT NULL,
  `descuento` float(8,2) DEFAULT NULL,
  `categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `descuento`, `categoria`) VALUES
(1, 'Pizza con jamón y huevo', '...', 2000.00, 0.00, 'Pizzas'),
(2, 'Pizza napolitana', '...', 2500.00, 0.00, 'Pizzas'),
(3, 'Pizza caprese', '...', 2700.00, 500.00, 'Pizzas'),
(4, 'Ensalada caesar', '...', 800.00, 0.00, 'Ensaladas'),
(5, 'Ensalada rusa', '...', 500.00, 0.00, 'Ensaladas'),
(6, 'Hamburguesa simple', '...', 900.00, 0.00, 'Hamburguesas'),
(7, 'Hamburguesa completa', '...', 1700.00, 400.00, 'Hamburguesas'),
(8, 'Coca cola', '...', 300.00, 0.00, 'Bebidas'),
(9, 'Fanta', '...', 300.00, 20.00, 'Bebidas'),
(10, 'Agua mineral', '...', 150.00, 0.00, 'Bebidas'),
(11, 'Helado', '...', 550.00, 50.00, 'Postres'),
(12, 'Flan casero', '...', 400.00, 0.00, 'Postres'),
(13, 'Manaos', 'Gaseosa', 1000.00, 0.00, 'Bebidas');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
