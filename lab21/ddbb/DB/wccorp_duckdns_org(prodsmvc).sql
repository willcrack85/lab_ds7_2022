-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: wccorp.duckdns.org
-- Tiempo de generación: 24-11-2022 a las 18:55:59
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
-- Base de datos: `prodsmvc`
--
DROP DATABASE IF EXISTS `prodsmvc`;
CREATE DATABASE IF NOT EXISTS `prodsmvc` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `prodsmvc`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--
-- Creación: 24-11-2022 a las 17:22:32
-- Última actualización: 24-11-2022 a las 17:25:35
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `cod` int(11) UNSIGNED NOT NULL COMMENT 'Para registro de codigos en productos.',
  `short_name` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL COMMENT 'Para almacenar el nombre del producto.',
  `pvp` decimal(5,2) NOT NULL COMMENT 'Para almacenar el valor del producto.',
  `nombre` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL COMMENT 'Para almacenar la descripcion del producto.',
  `fecha_reg` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Uso exclusivo para auditoria interna.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- RELACIONES PARA LA TABLA `products`:
--

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`cod`, `short_name`, `pvp`, `nombre`, `fecha_reg`) VALUES
(1, 'Monitor', '400.00', 'Dell 21 full HD', '2022-11-24 17:25:35'),
(2, 'Teclado', '9.99', 'Teclado inalámbrico Logitech', '2022-11-24 17:25:35'),
(3, 'iPad Pro', '900.00', 'Apple iPad Pro 9', '2022-11-24 17:25:35');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
