-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-09-2023 a las 08:41:12
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
-- Base de datos: `phpcrud`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `id` int(11) NOT NULL,
  `apaterno` varchar(200) NOT NULL,
  `amaterno` varchar(200) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `caja` varchar(100) NOT NULL,
  `cajaclave` varchar(100) NOT NULL,
  `uescritorioclave` varchar(200) NOT NULL,
  `uservo` varchar(200) NOT NULL,
  `uservoclave` varchar(200) NOT NULL,
  `fechaini` date DEFAULT NULL,
  `perfil` varchar(200) NOT NULL,
  `servidor` varchar(100) NOT NULL,
  `campus` varchar(100) NOT NULL,
  `uescritorio` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `contactos`
--

INSERT INTO `contactos` (`id`, `apaterno`, `amaterno`, `nombre`, `email`, `caja`, `cajaclave`, `uescritorioclave`, `uservo`, `uservoclave`, `fechaini`, `perfil`, `servidor`, `campus`, `uescritorio`) VALUES
(81, 'MACIAS', 'GARIBAY', 'EDUARDO', 'control_equipos@uva.edu.mx', '01', '29WBDRSDSDS', '29WBDR', 'MEDUARDOY', '29WBDR', '0000-00-00', 'BECASSDS', '172.16.0.114', 'LÃZARO CÃRDENAS', 'MEDUARDOY'),
(82, 'PEREZ', 'LOPEZ', 'PEDRO', 'CONTROL_EQUIPOS@uva.edu.mx', '04', 'XR96gP', 'XR96gP', 'PPEDROZ', 'XR96gP', '2023-09-23', 'SISTEMAS', '172.16.0.118', 'MANZANILLO', 'PPEDROZ'),
(83, 'MARTE', 'JUPITERQ', 'SATURNO', '@uva.edu.mx', '02', 'ftNMBZ', 'ftNMBZ', 'MSATURNOQ', 'ftNMBZ', '0000-00-00', 'CAJERO', '172.16.0.118SDS', 'MEXICALI', 'MSATURNOQ'),
(84, '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', ''),
(85, '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', ''),
(87, '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
