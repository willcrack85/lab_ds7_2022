-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: wccorp.duckdns.org
-- Tiempo de generación: 17-11-2022 a las 09:10:35
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
-- Base de datos: `labsdb`
--
DROP DATABASE IF EXISTS `labsdb`;
CREATE DATABASE IF NOT EXISTS `labsdb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci;
USE `labsdb`;

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `sp_actualizar_votos`$$
CREATE DEFINER=`willcrackcorp`@`localhost` PROCEDURE `sp_actualizar_votos` (IN `param_votos1` VARCHAR(255), IN `param_votos2` VARCHAR(255))   BEGIN
	SET @s = CONCAT("UPDATE votos SET votos1=",param_votos1,", votos2=",param_votos2);
    PREPARE stmt FROM @s;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;
END$$

DROP PROCEDURE IF EXISTS `sp_grabar_calculos`$$
CREATE DEFINER=`willcrackcorp`@`localhost` PROCEDURE `sp_grabar_calculos` (IN `valor1` VARCHAR(255), IN `valor2` VARCHAR(255), IN `valor3` VARCHAR(255))   BEGIN
    SET @s = CONCAT("INSERT INTO parcial2 (n, factorial, sumatoria) VALUES ('",valor1,"','",valor2,"','",valor3,"')");
    PREPARE stmt FROM @s;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;
END$$

DROP PROCEDURE IF EXISTS `sp_listar_calculos`$$
CREATE DEFINER=`willcrackcorp`@`localhost` PROCEDURE `sp_listar_calculos` ()   BEGIN
    SET @s = CONCAT("SELECT * FROM parcial2 ORDER BY id");
    PREPARE stmt FROM @s;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;
END$$

DROP PROCEDURE IF EXISTS `sp_listar_noticias`$$
CREATE DEFINER=`willcrackcorp`@`localhost` PROCEDURE `sp_listar_noticias` ()   BEGIN
SELECT id, titulo, texto, categoria, fecha, imagen FROM noticias;
END$$

DROP PROCEDURE IF EXISTS `sp_listar_noticias_filtro`$$
CREATE DEFINER=`willcrackcorp`@`localhost` PROCEDURE `sp_listar_noticias_filtro` (IN `param_campo` VARCHAR(255), IN `param_valor` VARCHAR(255))   BEGIN
	SET @s = CONCAT("SELECT id, titulo, texto, categoria, fecha, imagen FROM noticias WHERE ",param_campo," LIKE CONCAT('%",param_valor,"%')");
    PREPARE stmt FROM @s;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;
END$$

DROP PROCEDURE IF EXISTS `sp_listar_votos`$$
CREATE DEFINER=`willcrackcorp`@`localhost` PROCEDURE `sp_listar_votos` ()   BEGIN
	SELECT votos1, votos2 FROM votos;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--
-- Creación: 09-11-2022 a las 07:04:31
--

DROP TABLE IF EXISTS `noticias`;
CREATE TABLE IF NOT EXISTS `noticias` (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT '',
  `texto` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `categoria` enum('promociones','ofertas','costas') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'promociones',
  `fecha` date NOT NULL,
  `imagen` varchar(100) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- RELACIONES PARA LA TABLA `noticias`:
--

--
-- Truncar tablas antes de insertar `noticias`
--

TRUNCATE TABLE `noticias`;
--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `texto`, `categoria`, `fecha`, `imagen`) VALUES
(1, 'Nueva promocion en Ciudad Cristal', '145 viviendas \r\nde lujo en urbanizacion ajardinada situadas en un entorno privilegiado', 'promociones', '2019-02-04', NULL),
(2, 'Ultimas viviendas junto al rio', 'Apartamentos de 1 \r\ny 2 dormitorios, con fantasticas vistas. Excelentes condiciones de financiacion.', 'ofertas', '2019-02-05', NULL),
(3, 'Apartamentos en el Puerto de San Martin', 'En la \r\nPlaya del Sol, en primera linea de playa. Pisos reformados y completamente \r\namueblados.', 'costas', '2019-02-06', 'apartamento8.jpg'),
(4, 'Casa reformada en el barrio de la Palmera', 'Dos \r\nplantas y atico, 5 habitaciones, patio interior, amplio garaje. Situada en una calle \r\ntranquila y a un paso del centro historico.', 'promociones', '2019-02-07', NULL),
(5, 'Promocion en Costa Mar', 'Con vistas al campo de \r\ngolf, magnificas calidades, entorno ajardinado con piscina y servicio de \r\nvigilancia.', 'costas', '2019-02-09', 'apartamento9.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parcial2`
--
-- Creación: 17-11-2022 a las 05:04:10
-- Última actualización: 17-11-2022 a las 07:59:35
--

DROP TABLE IF EXISTS `parcial2`;
CREATE TABLE IF NOT EXISTS `parcial2` (
  `id` tinyint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Para incrementar el numero de registros.',
  `n` float(10,2) DEFAULT NULL COMMENT 'Para almacenar el valor de N.',
  `factorial` float(10,2) DEFAULT NULL COMMENT 'Para almacenar el valor de Factorial.',
  `sumatoria` float(10,2) DEFAULT NULL COMMENT 'Para almacenar el valor de Sumatoria.',
  `fecha_reg` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Uso exclusivo para auditoria interna.',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- RELACIONES PARA LA TABLA `parcial2`:
--

--
-- Truncar tablas antes de insertar `parcial2`
--

TRUNCATE TABLE `parcial2`;
--
-- Volcado de datos para la tabla `parcial2`
--

INSERT INTO `parcial2` (`id`, `n`, `factorial`, `sumatoria`, `fecha_reg`) VALUES
(45, 20.00, 1.00, 0.50, '2022-11-17 07:59:34'),
(46, 20.00, 2.00, 1.17, '2022-11-17 07:59:34'),
(47, 20.00, 6.00, 2.03, '2022-11-17 07:59:34'),
(48, 20.00, 24.00, 2.99, '2022-11-17 07:59:34'),
(49, 20.00, 120.00, 3.98, '2022-11-17 07:59:34'),
(50, 20.00, 720.00, 4.98, '2022-11-17 07:59:34'),
(51, 20.00, 5040.00, 5.98, '2022-11-17 07:59:34'),
(52, 20.00, 40320.00, 6.98, '2022-11-17 07:59:34'),
(53, 20.00, 362880.00, 7.98, '2022-11-17 07:59:34'),
(54, 20.00, 3628800.00, 8.98, '2022-11-17 07:59:35'),
(55, 20.00, 39916800.00, 9.98, '2022-11-17 07:59:35'),
(56, 20.00, 100000000.00, 10.98, '2022-11-17 07:59:35'),
(57, 20.00, 100000000.00, 11.98, '2022-11-17 07:59:35'),
(58, 20.00, 100000000.00, 12.98, '2022-11-17 07:59:35'),
(59, 20.00, 100000000.00, 13.98, '2022-11-17 07:59:35'),
(60, 20.00, 100000000.00, 14.98, '2022-11-17 07:59:35'),
(61, 20.00, 100000000.00, 15.98, '2022-11-17 07:59:35'),
(62, 20.00, 100000000.00, 16.98, '2022-11-17 07:59:35'),
(63, 20.00, 100000000.00, 17.98, '2022-11-17 07:59:35'),
(64, 20.00, 100000000.00, 18.98, '2022-11-17 07:59:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `votos`
--
-- Creación: 11-11-2022 a las 01:18:05
-- Última actualización: 11-11-2022 a las 08:49:41
--

DROP TABLE IF EXISTS `votos`;
CREATE TABLE IF NOT EXISTS `votos` (
  `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `votos1` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `votos2` int(10) UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- RELACIONES PARA LA TABLA `votos`:
--

--
-- Truncar tablas antes de insertar `votos`
--

TRUNCATE TABLE `votos`;
--
-- Volcado de datos para la tabla `votos`
--

INSERT INTO `votos` (`id`, `votos1`, `votos2`) VALUES
(1, 50, 16);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
