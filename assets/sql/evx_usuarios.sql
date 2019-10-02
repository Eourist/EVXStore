-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-10-2019 a las 21:17:07
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `evx_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evx_usuarios`
--

CREATE TABLE `evx_usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `creditos` int(11) NOT NULL,
  `correo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `evx_usuarios`
--

INSERT INTO `evx_usuarios` (`id`, `nombre`, `clave`, `creditos`, `correo`) VALUES
(1, 'Eourist', '12345', '130', 'diegoeouristspartano@gmail.com'),
(2, 'Rodolfo', 'aa', '49', 'rodolf@ejemplo.com'),
(3, 'Nahuel', '12345', '12', 'hola@ejemplo.com'),
(4, 'abcd', '123', '4', 'aaaa');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `evx_usuarios`
--
ALTER TABLE `evx_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `evx_usuarios`
--
ALTER TABLE `evx_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
