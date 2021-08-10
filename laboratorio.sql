-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 10-08-2021 a las 05:36:11
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `laboratorio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examenes`
--

CREATE TABLE `examenes` (
  `Id` int(11) NOT NULL,
  `Nombreexa` varchar(30) NOT NULL,
  `Tiposexa` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `examenes`
--

INSERT INTO `examenes` (`Id`, `Nombreexa`, `Tiposexa`) VALUES
(1, 'Hemoglobina', 'Sangre'),
(2, 'Fecal', 'Heces');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `Cedula` varchar(10) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Edad` int(11) NOT NULL,
  `Correo` varchar(25) NOT NULL,
  `Telefono` varchar(12) NOT NULL,
  `Direccion` varchar(45) NOT NULL,
  `Genero` varchar(13) NOT NULL,
  `Sangre` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`Cedula`, `Nombre`, `Edad`, `Correo`, `Telefono`, `Direccion`, `Genero`, `Sangre`) VALUES
('V-27886931', 'Deyver Reyes', 20, 'dey.pasuo@gmail.com', '0412-1277822', 'Urb San Jacinto', 'Masculino', 'O+');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultados`
--

CREATE TABLE `resultados` (
  `Idres` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Idexa` int(11) NOT NULL,
  `Cedulapac` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `examenes`
--
ALTER TABLE `examenes`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`Cedula`);

--
-- Indices de la tabla `resultados`
--
ALTER TABLE `resultados`
  ADD PRIMARY KEY (`Idres`),
  ADD KEY `Cedulapac` (`Cedulapac`),
  ADD KEY `Idexa` (`Idexa`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `resultados`
--
ALTER TABLE `resultados`
  ADD CONSTRAINT `resultados_ibfk_1` FOREIGN KEY (`Cedulapac`) REFERENCES `pacientes` (`Cedula`),
  ADD CONSTRAINT `resultados_ibfk_2` FOREIGN KEY (`Idexa`) REFERENCES `examenes` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
