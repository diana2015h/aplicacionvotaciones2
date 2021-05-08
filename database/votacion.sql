-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-05-2021 a las 03:56:36
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `votacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id_alumnos` int(11) NOT NULL,
  `cedula_alumno` int(15) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `carrera` varchar(50) NOT NULL,
  `cod_candidato` int(25) NOT NULL,
  `cod_candidatoC` int(25) NOT NULL,
  `voto` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id_alumnos`, `cedula_alumno`, `nombre`, `carrera`, `cod_candidato`, `cod_candidatoC`, `voto`) VALUES
(1, 1085327038, 'Diana Marcela Hidalgo', 'tercero', 0, 0, 0),
(2, 1085316209, 'Samuel Alejandro Guerrero', 'transición ', 5, 2, 1),
(3, 0, '1085327038', 'quinto', 0, 0, 0),
(4, 1085312, 'Jeison Hidalgo', 'once', 3, 2, 1),
(5, 1085327038, 'Jeison Hidalgo', '3', 0, 0, 0),
(6, 1085327038, 'Jeison Hidalgo', '7', 0, 0, 0),
(7, 1085327038, 'Diana Hidalgo', '6', 0, 0, 0),
(8, 123456, 'Samuel Guerreo', '7', 0, 0, 0),
(9, 108, 'Samuel Guerreo', '4', 0, 0, 0),
(10, 3456, 'carlos', 'decimo', 0, 0, 0),
(11, 10853270, 'Diana Hidalgo', '', 0, 0, 0),
(12, 1085327038, 'Diana Hidalgo fsf', 'once', 0, 0, 0),
(13, 1085327038, 'Diana Hidalgo fsf', 'once', 0, 0, 0),
(14, 2147483647, 'Diana Hidalgo pabon', '4', 0, 0, 0),
(15, 10, 'calor ingnacio', '3', 0, 0, 0),
(16, 34, 'carlos enrrique', '6', 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `candidatos`
--

CREATE TABLE `candidatos` (
  `id_candidatos` int(11) NOT NULL,
  `cedula_candidato` int(15) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `cod_candidato` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `candidatos`
--

INSERT INTO `candidatos` (`id_candidatos`, `cedula_candidato`, `nombre`, `cod_candidato`) VALUES
(1, 1085327884, 'Sonia Carolina Erazo', 1),
(2, 1085327886, 'María Fernanda', 2),
(6, 1085327, 'Jeison Hidalgo', 3),
(7, 10853, 'carlos', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `candidatosc`
--

CREATE TABLE `candidatosc` (
  `id_candidatoC` int(11) NOT NULL,
  `cedula_candidatoC` int(15) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `cod_candidatoC` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `candidatosc`
--

INSERT INTO `candidatosc` (`id_candidatoC`, `cedula_candidatoC`, `nombre`, `cod_candidatoC`) VALUES
(1, 108634, 'Maria Alejandra Riascos', 1),
(2, 123456, 'Damian Alexander Guerrero', 2),
(3, 0, 'Voto en Blanco', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `id_carreras` int(50) NOT NULL,
  `carreras` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `clave` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `usuario`, `clave`) VALUES
(2010, 'Diana Marcela', 'admin', '12345');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id_alumnos`);

--
-- Indices de la tabla `candidatos`
--
ALTER TABLE `candidatos`
  ADD PRIMARY KEY (`id_candidatos`);

--
-- Indices de la tabla `candidatosc`
--
ALTER TABLE `candidatosc`
  ADD PRIMARY KEY (`id_candidatoC`);

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`id_carreras`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id_alumnos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `candidatos`
--
ALTER TABLE `candidatos`
  MODIFY `id_candidatos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `candidatosc`
--
ALTER TABLE `candidatosc`
  MODIFY `id_candidatoC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `id_carreras` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2011;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
