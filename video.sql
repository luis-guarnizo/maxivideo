-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-12-2022 a las 11:33:54
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
-- Base de datos: `video`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actores`
--

CREATE TABLE `actores` (
  `id_actor` int(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `nacionalidad` varchar(50) NOT NULL,
  `sexo` varchar(50) NOT NULL,
  `tipo_actor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `actores`
--

INSERT INTO `actores` (`id_actor`, `nombre`, `nacionalidad`, `sexo`, `tipo_actor`) VALUES
(2, 'Will Smith', 'Estados Unidos', 'Masculino', 'Principal'),
(3, 'Jaden Smith', 'Estados Unidos', 'Masculino', 'Extra'),
(4, 'Leonardo DiCaprio', 'Estados Unidos', 'Masculino', 'Principal'),
(5, 'Margot Robbie', 'Australia', 'Femenino', 'Principal'),
(6, 'Brad Pitt', 'Estados Unidos', 'Masculino', 'Principal'),
(7, 'Diane Kruger', 'Alemania', 'Femenino', 'Principal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alquiler`
--

CREATE TABLE `alquiler` (
  `id_alquiler` int(50) NOT NULL,
  `ident_cliente` int(50) NOT NULL,
  `numero_ejemplar` int(50) NOT NULL,
  `fecha_alquiler` varchar(50) NOT NULL,
  `fecha_devolucion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `ident_cliente` int(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `directores`
--

CREATE TABLE `directores` (
  `id_director` int(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `nacionalidad` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `directores`
--

INSERT INTO `directores` (`id_director`, `nombre`, `nacionalidad`) VALUES
(1, 'Dir. Will Smith', 'Estados Unidos'),
(2, 'Martin Scorsese', 'Estados Unidos'),
(3, 'Wolfgang Petersen', 'Alemania');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejemplares`
--

CREATE TABLE `ejemplares` (
  `numero_ejemplar` int(50) NOT NULL,
  `id_pelicula` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `id_pelicula` int(50) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `nacionalidad` varchar(50) NOT NULL,
  `productora` varchar(50) NOT NULL,
  `fecha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`id_pelicula`, `titulo`, `nacionalidad`, `productora`, `fecha`) VALUES
(2, 'en busca de la felicidad', 'estados unidos', 'will smith', '2006-12-01'),
(3, 'El lobo de Wall Street', 'Estados Unidos', 'Riza Aziz', '2003-12-01'),
(4, 'Troya', 'Reino Unido', 'Colin Wilson', '2004-12-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula_actor`
--

CREATE TABLE `pelicula_actor` (
  `id` int(50) NOT NULL,
  `id_pelicula` int(50) NOT NULL,
  `id_actor` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pelicula_actor`
--

INSERT INTO `pelicula_actor` (`id`, `id_pelicula`, `id_actor`) VALUES
(2, 2, 2),
(3, 2, 3),
(4, 3, 5),
(5, 3, 4),
(6, 4, 7),
(7, 4, 6),
(8, 4, 7),
(9, 4, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula_director`
--

CREATE TABLE `pelicula_director` (
  `id` int(50) NOT NULL,
  `id_pelicula` int(50) NOT NULL,
  `id_director` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pelicula_director`
--

INSERT INTO `pelicula_director` (`id`, `id_pelicula`, `id_director`) VALUES
(5, 2, 1),
(6, 3, 2),
(7, 4, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actores`
--
ALTER TABLE `actores`
  ADD PRIMARY KEY (`id_actor`);

--
-- Indices de la tabla `alquiler`
--
ALTER TABLE `alquiler`
  ADD PRIMARY KEY (`id_alquiler`),
  ADD KEY `FK_numero_ejemplar` (`numero_ejemplar`),
  ADD KEY `FK_ident_cliente` (`ident_cliente`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`ident_cliente`);

--
-- Indices de la tabla `directores`
--
ALTER TABLE `directores`
  ADD PRIMARY KEY (`id_director`);

--
-- Indices de la tabla `ejemplares`
--
ALTER TABLE `ejemplares`
  ADD PRIMARY KEY (`numero_ejemplar`),
  ADD KEY `FK3_id_pelicula` (`id_pelicula`);

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`id_pelicula`);

--
-- Indices de la tabla `pelicula_actor`
--
ALTER TABLE `pelicula_actor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK1_id_pelicula` (`id_pelicula`),
  ADD KEY `FK_id_actor` (`id_actor`);

--
-- Indices de la tabla `pelicula_director`
--
ALTER TABLE `pelicula_director`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK2_id_pelicula` (`id_pelicula`),
  ADD KEY `FK_id_director` (`id_director`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actores`
--
ALTER TABLE `actores`
  MODIFY `id_actor` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `alquiler`
--
ALTER TABLE `alquiler`
  MODIFY `id_alquiler` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `directores`
--
ALTER TABLE `directores`
  MODIFY `id_director` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `id_pelicula` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pelicula_actor`
--
ALTER TABLE `pelicula_actor`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `pelicula_director`
--
ALTER TABLE `pelicula_director`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alquiler`
--
ALTER TABLE `alquiler`
  ADD CONSTRAINT `FK_ident_cliente` FOREIGN KEY (`ident_cliente`) REFERENCES `clientes` (`ident_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_numero_ejemplar` FOREIGN KEY (`numero_ejemplar`) REFERENCES `ejemplares` (`numero_ejemplar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ejemplares`
--
ALTER TABLE `ejemplares`
  ADD CONSTRAINT `FK3_id_pelicula` FOREIGN KEY (`id_pelicula`) REFERENCES `peliculas` (`id_pelicula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pelicula_actor`
--
ALTER TABLE `pelicula_actor`
  ADD CONSTRAINT `FK1_id_pelicula` FOREIGN KEY (`id_pelicula`) REFERENCES `peliculas` (`id_pelicula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_id_actor` FOREIGN KEY (`id_actor`) REFERENCES `actores` (`id_actor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pelicula_director`
--
ALTER TABLE `pelicula_director`
  ADD CONSTRAINT `FK2_id_pelicula` FOREIGN KEY (`id_pelicula`) REFERENCES `peliculas` (`id_pelicula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_id_director` FOREIGN KEY (`id_director`) REFERENCES `directores` (`id_director`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
