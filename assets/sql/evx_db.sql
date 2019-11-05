-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-11-2019 a las 00:33:30
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
  `file_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `evx_juegos`
--

INSERT INTO `evx_juegos` (`id`, `nombre`, `precio`, `descripcion`, `img_tienda`, `img_perfil`, `file_name`) VALUES
(1, 'Operation Reconquest', 1500, '1', '1', '1', 'Operation_Reconquest'),
(2, 'Rhan\'s Journey', 2000, '4', '4', '4', 'Rhan\'s_Journey'),
(3, 'Defense of Twedjen Tower', 1500, '2', '3', '3', 'Defense_of_Twedjen_Tower'),
(4, 'Endless Asteroids', 1000, '3', '2', '2', 'Endless_Asteroids'),
(5, 'Battle of Dungeon: Defender', 1500, '5', '6', 'J6', 'Battle_of_Dungeon'),
(6, 'Tomb Quest', 0, '6', '5', '5', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evx_puntajes`
--

CREATE TABLE `evx_puntajes` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `juego_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `puntaje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indices de la tabla `evx_puntajes`
--
ALTER TABLE `evx_puntajes`
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

--
-- AUTO_INCREMENT de la tabla `evx_juegos`
--
ALTER TABLE `evx_juegos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `evx_puntajes`
--
ALTER TABLE `evx_puntajes`
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
