-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-10-2019 a las 18:31:36
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
-- Estructura de tabla para la tabla `evx_compras`
--

CREATE TABLE `evx_compras` (
  `id` int(11) NOT NULL,
  `usuario_id` varchar(255) NOT NULL,
  `juego_id` int(11) NOT NULL,
  `puntaje_maximo` int(255) NOT NULL DEFAULT '0',
  `fecha_compra` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `evx_compras`
--

INSERT INTO `evx_compras` (`id`, `usuario_id`, `juego_id`, `puntaje_maximo`, `fecha_compra`) VALUES
(14, '1', 2, 0, '0000-00-00'),
(15, '1', 1, 0, '0000-00-00'),
(16, '1', 3, 0, '0000-00-00'),
(17, '1', 5, 0, '0000-00-00'),
(18, '1', 4, 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evx_juegos`
--

CREATE TABLE `evx_juegos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `precio` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `img_tienda` varchar(255) NOT NULL,
  `img_perfil` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `evx_juegos`
--

INSERT INTO `evx_juegos` (`id`, `nombre`, `precio`, `descripcion`, `imagen`) VALUES
(1, 'Operation Reconquest', 1500, '', '', ''),
(2, 'Rhan\'s Journey', 2000, '', '', ''),
(3, 'Defense of Twedjen Tower', 1500, '', '', ''),
(4, 'Endless Asteroids', 1000, '', '', ''),
(5, 'Battle of Dungeon: Defender', 1500, '', '', ''),
(6, 'Tomb Quest', 0, '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evx_usuarios`
--

CREATE TABLE `evx_usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `creditos` int(11) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `premium` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `evx_usuarios`
--

INSERT INTO `evx_usuarios` (`id`, `nombre`, `clave`, `creditos`, `correo`, `premium`) VALUES
(1, 'Eourist', '12345', 1300, 'diegoeouristspartano@gmail.com', 1),
(2, 'Rodolfo', '12345', 100, 'rodolf@ejemplo.com', 0),
(3, 'Afolfo', '12345', 0, 'hola@ejemplo.com', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `evx_compras`
--
ALTER TABLE `evx_compras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `evx_juegos`
--
ALTER TABLE `evx_juegos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `evx_usuarios`
--
ALTER TABLE `evx_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `evx_compras`
--
ALTER TABLE `evx_compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `evx_juegos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `evx_usuarios`
--
ALTER TABLE `evx_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

CREATE TABLE `evx_puntajes` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `juego_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `puntaje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
ALTER TABLE `evx_puntajes`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `evx_compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;