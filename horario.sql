-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-05-2023 a las 21:09:08
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `horario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ambiente`
--

CREATE TABLE `ambiente` (
  `id` int(20) NOT NULL,
  `nombre_ambiente` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ambiente`
--

INSERT INTO `ambiente` (`id`, `nombre_ambiente`) VALUES
(1, 'TIC'),
(2, 'toc');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centros`
--

CREATE TABLE `centros` (
  `id` int(20) NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `centros`
--

INSERT INTO `centros` (`id`, `nombre`) VALUES
(1, 'casona'),
(2, 'samaria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ficha`
--

CREATE TABLE `ficha` (
  `id` int(20) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_final` time NOT NULL,
  `id_centro` varchar(20) NOT NULL,
  `documento` int(20) NOT NULL,
  `lider_ficha` varchar(20) NOT NULL,
  `id_trimestre` int(20) DEFAULT NULL,
  `id_municipio` int(20) NOT NULL,
  `id_ambiente` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ficha`
--

INSERT INTO `ficha` (`id`, `nombre`, `hora_inicio`, `hora_final`, `id_centro`, `documento`, `lider_ficha`, `id_trimestre`, `id_municipio`, `id_ambiente`) VALUES
(456456, 'CAJA PRINCIPAL JAMUN', '08:31:00', '00:00:00', 'casona', 54645645, 'jhon', 3, 1, 1),
(1, 'CAJA PRINCIPAL JAMUN', '08:59:00', '00:00:00', 'samaria', 54645645, 'holaa', 1, 1, 1),
(58, 'CAJA PRINCIPAL JAMUN', '23:11:00', '00:00:00', 'samaria', 54645645, 'jhon', 1, 1, 1),
(58, 'CAJA PRINCIPAL JAMUN', '23:11:00', '00:00:00', 'samaria', 54645645, 'jhon', 1, 1, 1),
(2, 'samaria', '16:40:01', '16:22:01', 'casona', 10010266, 'oscar', 4, 1, 1),
(23221503, 'dsfdfsfsd', '17:43:00', '11:26:00', 'samaria', 54645645, 'hola', 2, 1, 2),
(23221503, 'dsfdfsfsd', '17:43:00', '11:26:00', 'samaria', 54645645, 'hola', 2, 1, 2),
(456456, 'CAJA PRINCIPAL JAMUN', '14:07:00', '15:04:00', 'samaria', 54645645, 'jhon', 4, 1, 1),
(456456, 'PUNTO SEDE PPAL JAMU', '14:32:00', '16:27:00', 'samaria', 54645645, 'holaa', 4, 1, 1),
(4, 'd', '12:42:00', '12:42:00', 'casona', 54645645, 'jhon', 4, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `id_ficha` int(20) NOT NULL,
  `lunes` varchar(20) DEFAULT NULL,
  `martes` varchar(20) DEFAULT NULL,
  `miercoles` varchar(20) DEFAULT NULL,
  `jueves` varchar(20) DEFAULT NULL,
  `viernes` varchar(20) DEFAULT NULL,
  `sabado` varchar(20) DEFAULT NULL,
  `domingo` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`id_ficha`, `lunes`, `martes`, `miercoles`, `jueves`, `viernes`, `sabado`, `domingo`) VALUES
(1, 'luis', 'juan', 'juan', 'juan', 'juan', ' ', ''),
(1, 'luis', 'juan', 'juan', 'juan', 'juan', ' ', ''),
(456456, 'luis', 'juan', 'juan', 'juan', 'juan', ' ', ''),
(23221503, 'luis', 'juan', 'juan', 'juan', 'juan', ' ', ''),
(23221503, 'luis', 'juan', 'juan', 'juan', 'juan', ' ', ''),
(23221503, 'luis', 'luis', 'juan', 'camilo', 'juan', ' juan', 'juan'),
(23221503, 'juan', 'juan', 'juan', 'juan', 'juan', ' juan', 'juan'),
(23221503, 'juan', '', '', '', '', '', ''),
(23221503, 'juan', '', '', '', '', '', ''),
(23221503, 'juan', '', '', '', '', '', ''),
(23221503, 'juan', '', '', '', '', '', ''),
(23221503, 'luis', '', '', '', '', '', ''),
(23221503, 'luis', '', '', '', '', '', ''),
(23221503, 'luis', '', '', '', '', '', ''),
(23221503, '', 'juan', '', '', '', '', ''),
(23221503, 'juan', '', '', '', '', '', ''),
(2, 'juan', '', '', '', '', ' ', ''),
(4, 'juan', '', '', 'camilo', '', ' ', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE `municipio` (
  `id` int(20) NOT NULL,
  `nombre_municipio` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`id`, `nombre_municipio`) VALUES
(1, 'santander');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `id` int(20) NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trimestres`
--

CREATE TABLE `trimestres` (
  `id_ficha` int(20) NOT NULL,
  `trimestre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `trimestres`
--

INSERT INTO `trimestres` (`id_ficha`, `trimestre`) VALUES
(1, 'trimestre1'),
(2, 'trimestre2'),
(3, 'trimestre3'),
(4, 'trimestre4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario` varchar(20) NOT NULL,
  `contraseña` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario`, `contraseña`) VALUES
('cebastian', 123465),
('123', 123);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ambiente`
--
ALTER TABLE `ambiente`
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `centros`
--
ALTER TABLE `centros`
  ADD KEY `nombre` (`nombre`);

--
-- Indices de la tabla `ficha`
--
ALTER TABLE `ficha`
  ADD KEY `id_centro` (`id_centro`),
  ADD KEY `id` (`id`),
  ADD KEY `id_trimestre` (`id_trimestre`),
  ADD KEY `id_municipio` (`id_municipio`,`id_ambiente`),
  ADD KEY `id_ambiente` (`id_ambiente`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD KEY `id` (`id_ficha`);

--
-- Indices de la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `trimestres`
--
ALTER TABLE `trimestres`
  ADD KEY `fk_id_ficha` (`id_ficha`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ficha`
--
ALTER TABLE `ficha`
  ADD CONSTRAINT `ficha_ibfk_1` FOREIGN KEY (`id_centro`) REFERENCES `centros` (`nombre`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_ambiente` FOREIGN KEY (`id_ambiente`) REFERENCES `ambiente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_municipio` FOREIGN KEY (`id_municipio`) REFERENCES `municipio` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_trimestre` FOREIGN KEY (`id_trimestre`) REFERENCES `trimestres` (`id_ficha`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `id` FOREIGN KEY (`id_ficha`) REFERENCES `ficha` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
