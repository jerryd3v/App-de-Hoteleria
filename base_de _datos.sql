-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1: 3306
-- Tiempo de generación: 05-12-2021 a las 11:06:19
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hospedate`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `id_actividad` varchar(15) NOT NULL,
  `frecuencia` varchar(25) NOT NULL,
  `tipo` enum('Acuatica','Terrestre','Aerea','Acustica','Culinaria') NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `dificultad` enum('Baja','Media','Alta','Muy Alta') NOT NULL,
  `gasto_extra` int(11) NOT NULL,
  `alojamiento` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alojamiento`
--

CREATE TABLE `alojamiento` (
  `nombre` varchar(20) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `telefono` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alojamiento`
--

INSERT INTO `alojamiento` (`nombre`, `direccion`, `telefono`) VALUES
('AB Beach Hotel', 'Higuerote', '0212-1234567'),
('Playita', 'Los Canales', '0412-1234567');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asesor`
--

CREATE TABLE `asesor` (
  `id_cedula` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(25) NOT NULL,
  `direccion` varchar(45) CHARACTER SET armscii8 NOT NULL,
  `alojamiento` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitacion`
--

CREATE TABLE `habitacion` (
  `id_habitacion` varchar(8) NOT NULL,
  `precio` int(11) NOT NULL,
  `tipo` enum('Individual',' Doble','Triple','Quad','Queen','King','Suite','Suite Ejecutiva','Suite Presidencial','Apartamento','Cabaña','Piso Ejecutivo') NOT NULL,
  `cuartos` int(11) NOT NULL,
  `baños` int(11) NOT NULL,
  `alojamiento` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `habitacion`
--

INSERT INTO `habitacion` (`id_habitacion`, `precio`, `tipo`, `cuartos`, `baños`, `alojamiento`) VALUES
('A1', 12, 'Individual', 2, 2, 'AB Beach Hotel');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `realiza_actividad`
--

CREATE TABLE `realiza_actividad` (
  `nombre_apellido_visitante` varchar(45) NOT NULL,
  `fecha` date NOT NULL,
  `id_actividad` varchar(15) NOT NULL,
  `alojamiento` varchar(30) NOT NULL,
  `id_visitante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitante`
--

CREATE TABLE `visitante` (
  `id_visitante` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(25) NOT NULL,
  `cedula` int(11) NOT NULL,
  `sexo` enum('Femenino','Masculino') NOT NULL,
  `direccion` varchar(250) NOT NULL,
  `estado` enum('Miranda','Zulia','Distrito Federal','Anzoátegui','Amazonas','Bolívar','Táchira','Mérida','Delta Amacuro','Yaracuy','Guarico','Aragua','Apure','Carabobo','Barinas','Vargas','Tachira','Nueva Esparta','Trujillo','Cojedes','Lara','Monagas','Portuguesa','Falcón') NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `alojamiento` varchar(30) NOT NULL,
  `habitacion` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`id_actividad`),
  ADD KEY `alojamiento` (`alojamiento`);

--
-- Indices de la tabla `alojamiento`
--
ALTER TABLE `alojamiento`
  ADD PRIMARY KEY (`nombre`);

--
-- Indices de la tabla `asesor`
--
ALTER TABLE `asesor`
  ADD PRIMARY KEY (`id_cedula`),
  ADD KEY `alojamiento` (`alojamiento`);

--
-- Indices de la tabla `habitacion`
--
ALTER TABLE `habitacion`
  ADD PRIMARY KEY (`id_habitacion`),
  ADD KEY `alojamiento` (`alojamiento`);

--
-- Indices de la tabla `realiza_actividad`
--
ALTER TABLE `realiza_actividad`
  ADD KEY `id_actividad` (`id_actividad`,`alojamiento`,`nombre_apellido_visitante`),
  ADD KEY `alojamiento` (`alojamiento`),
  ADD KEY `id_visitante` (`id_visitante`);

--
-- Indices de la tabla `visitante`
--
ALTER TABLE `visitante`
  ADD PRIMARY KEY (`id_visitante`),
  ADD KEY `alojamiento` (`alojamiento`,`habitacion`),
  ADD KEY `habitacion` (`habitacion`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD CONSTRAINT `actividades_ibfk_1` FOREIGN KEY (`alojamiento`) REFERENCES `alojamiento` (`nombre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `asesor`
--
ALTER TABLE `asesor`
  ADD CONSTRAINT `asesor_ibfk_1` FOREIGN KEY (`alojamiento`) REFERENCES `alojamiento` (`nombre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `habitacion`
--
ALTER TABLE `habitacion`
  ADD CONSTRAINT `habitacion_ibfk_1` FOREIGN KEY (`alojamiento`) REFERENCES `alojamiento` (`nombre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `realiza_actividad`
--
ALTER TABLE `realiza_actividad`
  ADD CONSTRAINT `realiza_actividad_ibfk_1` FOREIGN KEY (`id_actividad`) REFERENCES `actividades` (`id_actividad`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `realiza_actividad_ibfk_2` FOREIGN KEY (`alojamiento`) REFERENCES `alojamiento` (`nombre`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `realiza_actividad_ibfk_3` FOREIGN KEY (`id_visitante`) REFERENCES `visitante` (`id_visitante`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `visitante`
--
ALTER TABLE `visitante`
  ADD CONSTRAINT `visitante_ibfk_1` FOREIGN KEY (`alojamiento`) REFERENCES `alojamiento` (`nombre`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `visitante_ibfk_2` FOREIGN KEY (`habitacion`) REFERENCES `habitacion` (`id_habitacion`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
