-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 29-10-2020 a las 19:10:55
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_gestion_de_datos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `email_admin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `passwd_admin` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `email_admin`, `passwd_admin`) VALUES
(1, 'admin@admin.com', '1fa3356b1eb65f144a367ff8560cb406');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_alumno`
--

CREATE TABLE `tbl_alumno` (
  `id_alumno` int(9) NOT NULL,
  `nombre_alumno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellido1_alumno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellido2_alumno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `grupo_alumno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_alumno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `passwd_alumno` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_alumno`
--

INSERT INTO `tbl_alumno` (`id_alumno`, `nombre_alumno`, `apellido1_alumno`, `apellido2_alumno`, `grupo_alumno`, `email_alumno`, `passwd_alumno`) VALUES
(1, 'Carlos', 'Mirabal', 'Salazar', 'DAW2', 'cmirabal@random.com', '1fa3356b1eb65f144a367ff8560cb406'),
(2, 'Xabo', 'Barrios', 'Rodriguez', 'DAW2', 'xbarrios@random.com', '1fa3356b1eb65f144a367ff8560cb406'),
(3, 'Alex', 'Rodriguez', 'Padilla', 'DAW2', 'arodriguez@random.com', '1fa3356b1eb65f144a367ff8560cb406'),
(5, 'Albert', 'Buendia', 'Monjil', 'DAW2', 'abuendia@random.com', '1fa3356b1eb65f144a367ff8560cb406'),
(6, 'Xavier', 'Jaramillo', 'Vives', 'DAW2', 'xjaramillo@random.com', '1fa3356b1eb65f144a367ff8560cb406');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_nota`
--

CREATE TABLE `tbl_nota` (
  `id_nota` int(9) NOT NULL,
  `nombre_materia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_alumno` int(9) NOT NULL,
  `nota` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_nota`
--

INSERT INTO `tbl_nota` (`id_nota`, `nombre_materia`, `id_alumno`, `nota`) VALUES
(1, 'Fisica', 1, 3),
(4, 'Mates', 1, 6),
(5, 'Programacion', 1, 8);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indices de la tabla `tbl_alumno`
--
ALTER TABLE `tbl_alumno`
  ADD PRIMARY KEY (`id_alumno`);

--
-- Indices de la tabla `tbl_nota`
--
ALTER TABLE `tbl_nota`
  ADD PRIMARY KEY (`id_nota`),
  ADD KEY `id_alumno` (`id_alumno`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbl_alumno`
--
ALTER TABLE `tbl_alumno`
  MODIFY `id_alumno` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tbl_nota`
--
ALTER TABLE `tbl_nota`
  MODIFY `id_nota` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_nota`
--
ALTER TABLE `tbl_nota`
  ADD CONSTRAINT `tbl_nota_ibfk_1` FOREIGN KEY (`id_alumno`) REFERENCES `tbl_alumno` (`id_alumno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
