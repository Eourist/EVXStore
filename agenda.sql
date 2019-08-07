-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2019 at 02:17 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agenda`
--

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE `agenda` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `apellido` varchar(255) DEFAULT NULL,
  `edad` int(3) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`id`, `nombre`, `apellido`, `edad`, `correo`, `telefono`) VALUES
(9, 'w', 'w', 12, 'ejemplo@gmail.com', 212345),
(10, 'sda', 'sad', 213, '1312@12', 34234);

-- --------------------------------------------------------

--
-- Table structure for table `reclamos`
--

CREATE TABLE `reclamos` (
  `id_reclamo` int(11) NOT NULL,
  `id_contacto` varchar(255) DEFAULT NULL,
  `tipo_reclamo` varchar(255) DEFAULT NULL,
  `estado_reclamo` varchar(255) DEFAULT NULL,
  `titulo_reclamo` varchar(255) DEFAULT NULL,
  `descripcion_reclamo` mediumtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reclamos`
--

INSERT INTO `reclamos` (`id_reclamo`, `id_contacto`, `tipo_reclamo`, `estado_reclamo`, `titulo_reclamo`, `descripcion_reclamo`) VALUES
(6, '10', '4', 'pendiente', 'Necesito Ayuda', 'Mi gatito desaparecio por favor ayuda lo quiero mucho por favor no se que hacer'),
(7, '10', '2', 'pendiente', 'Mi gatito no come', 'POr favor ayuda mi gato ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reclamos`
--
ALTER TABLE `reclamos`
  ADD PRIMARY KEY (`id_reclamo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `reclamos`
--
ALTER TABLE `reclamos`
  MODIFY `id_reclamo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
