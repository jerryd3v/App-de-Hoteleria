-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1: 3306
-- Tiempo de generación: 06-12-2021 a las 23:36:53
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

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`id_actividad`, `frecuencia`, `tipo`, `descripcion`, `dificultad`, `gasto_extra`, `alojamiento`) VALUES
('Buceo', 'Semanal', 'Acuatica', 'Busear con equipo de buseo, para respirar bajo del agua', 'Media', 5, 'AB Beach Hotel'),
('Navegar', 'semanal', 'Acuatica', 'navegar con bote en el mar', 'Media', 12, 'AB Beach Hotel');

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
('Los Cocos', 'Boca de Uchire', '0212-3332211'),
('Olas Resort', 'Rio chico - Municipio Paez - Estado Miranda', '0212-7652571'),
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

--
-- Volcado de datos para la tabla `asesor`
--

INSERT INTO `asesor` (`id_cedula`, `nombre`, `apellido`, `direccion`, `alojamiento`) VALUES
(12345678, 'carlos', 'coello', 'rio chico', 'AB Beach Hotel');

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
('A1', 5, 'Individual', 1, 1, 'AB Beach Hotel'),
('C23', 12, 'Suite Ejecutiva', 4, 2, 'Los Cocos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `realiza_actividad`
--

CREATE TABLE `realiza_actividad` (
  `referencia` int(11) NOT NULL,
  `nombre_apellido_visitante` varchar(90) NOT NULL,
  `fecha` date NOT NULL,
  `id_visitante` int(11) NOT NULL,
  `alojamiento` varchar(30) NOT NULL,
  `id_actividad` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `realiza_actividad`
--

INSERT INTO `realiza_actividad` (`referencia`, `nombre_apellido_visitante`, `fecha`, `id_visitante`, `alojamiento`, `id_actividad`) VALUES
(12342, 'Jerry Rodriguez', '2021-12-16', 123, 'AB Beach Hotel', 'Buceo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitante`
--

CREATE TABLE `visitante` (
  `id_visitante` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(25) NOT NULL,
  `cedula` varchar(20) NOT NULL,
  `sexo` enum('Femenino','Masculino') NOT NULL,
  `direccion` varchar(250) NOT NULL,
  `estado` enum('Miranda','Zulia','Distrito Federal','Anzoátegui','Amazonas','Bolívar','Táchira','Mérida','Delta Amacuro','Yaracuy','Guarico','Aragua','Apure','Carabobo','Barinas','Vargas','Tachira','Nueva Esparta','Trujillo','Cojedes','Lara','Monagas','Portuguesa','Falcón') NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `alojamiento` varchar(30) NOT NULL,
  `habitacion` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `visitante`
--

INSERT INTO `visitante` (`id_visitante`, `nombre`, `apellido`, `cedula`, `sexo`, `direccion`, `estado`, `telefono`, `fecha_nacimiento`, `alojamiento`, `habitacion`) VALUES
(123, 'Jerry', 'Rodriguez', '25360607', 'Masculino', 'Rio chico - Municipio Paez', 'Miranda', '0414-2676198', '2021-12-09', 'AB Beach Hotel', 'A1'),
(232, 'Carlos', 'Guillen', '1234567', 'Masculino', 'Rio chico - Municipio Paez - Estado Miranda', 'Anzoátegui', '0212-7652571', '2015-01-28', 'AB Beach Hotel', 'A1'),
(444, 'Luisa', 'Barcelo', '20181991-Menor-01', 'Femenino', 'Caracas', 'Distrito Federal', '04161232123', '2021-12-08', 'Olas Resort', 'A1'),
(1234, 'Melanie', 'Herrera', '28345612', 'Femenino', 'Rio chico - Municipio Paez', 'Amazonas', '0412-1234567', '2021-12-30', 'AB Beach Hotel', 'A1'),
(12134, 'Raul', 'Oñate', '20181991', 'Masculino', 'Clarines', 'Anzoátegui', '04161232123', '1993-02-03', 'Los Cocos', 'C23');

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
  ADD PRIMARY KEY (`referencia`),
  ADD KEY `id_visitante` (`id_visitante`,`alojamiento`,`id_actividad`),
  ADD KEY `alojamiento` (`alojamiento`),
  ADD KEY `id_actividad` (`id_actividad`);

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
  ADD CONSTRAINT `realiza_actividad_ibfk_1` FOREIGN KEY (`id_visitante`) REFERENCES `visitante` (`id_visitante`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `realiza_actividad_ibfk_2` FOREIGN KEY (`alojamiento`) REFERENCES `alojamiento` (`nombre`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `realiza_actividad_ibfk_3` FOREIGN KEY (`id_actividad`) REFERENCES `actividades` (`id_actividad`) ON DELETE CASCADE ON UPDATE CASCADE;

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
