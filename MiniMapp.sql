-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 26-05-2018 a las 23:42:29
-- Versión del servidor: 5.7.20-log
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `minimapp`
--
CREATE DATABASE IF NOT EXISTS `minimapp` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `minimapp`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `beneficios`
--

CREATE TABLE `beneficios` (
  `id_beneficio` int(11) NOT NULL,
  `nombre` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `codigo` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `beneficios`
--

INSERT INTO `beneficios` (`id_beneficio`, `nombre`, `codigo`, `descripcion`, `activo`, `created_at`, `updated_at`) VALUES
(0, 'Multi flag', '1', 'Permite tener mas de un flag', 1, '2017-10-09 05:09:13', '2017-10-09 05:09:13'),
(1, 'Premiun', '2', 'Usuario Premiun', 1, '2017-10-09 05:10:54', '2017-10-09 05:10:54'),
(2, 'Skins gratis', '123', 'Todas las skin gratis', 0, '2017-12-19 21:24:10', '2017-12-19 21:24:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `flags`
--

CREATE TABLE `flags` (
  `id_flags` int(11) NOT NULL,
  `flag` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activo` tinyint(1) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `flags`
--

INSERT INTO `flags` (`id_flags`, `flag`, `descripcion`, `activo`, `created_at`, `updated_at`) VALUES
(0, 'Warcraft', 'World of warcraft', 1, '2017-10-09 05:28:25', '2017-12-19 21:12:48'),
(1, 'LoL', 'Lol', 1, '2017-10-09 05:28:25', '2017-10-09 05:28:25'),
(2, 'WoW', 'World Of Warcraft', 1, '2017-10-09 23:35:03', '2017-12-19 21:13:22'),
(3, 'UVM', 'la uvm', 0, '2017-11-02 22:23:39', '2017-11-29 00:51:40'),
(4, 'Pubg', 'player unknown battlegrounds', 1, '2017-11-29 00:53:37', '2017-11-29 00:53:37'),
(5, 'Test Funcional', 'Test', 0, '2017-11-29 17:20:13', '2017-12-19 21:22:43'),
(6, 'Consultoria Online', 'Test', 1, '2017-12-19 21:22:35', '2017-12-19 21:22:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localizacion`
--

CREATE TABLE `localizacion` (
  `id_localizacion` int(11) NOT NULL,
  `latitud` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `longitud` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `id_usuarios` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `localizacion`
--

INSERT INTO `localizacion` (`id_localizacion`, `latitud`, `longitud`, `id_usuarios`, `created_at`, `updated_at`) VALUES
(0, '-33.046674', '-71.621726', 1, '2017-10-10 07:48:39', '2018-05-16 15:28:56'),
(1, '-33.123919', '-71.568990', 0, '2017-10-10 07:48:39', '2017-12-19 23:36:51'),
(2, '-33.130615', '-71.563939', 6, '2017-10-10 12:49:57', '2017-12-19 20:51:43'),
(3, '-33.123929', '-71.568985', 7, '2017-10-10 12:52:54', '2017-12-19 23:25:07'),
(4, '-33.131978', '-71.563844', 4, '2017-10-10 13:20:42', '2017-12-19 20:49:06'),
(5, '-33.132580', '-71.563389', 5, '2017-10-10 13:31:45', '2017-12-19 20:45:15'),
(6, '-70', '-30', 8, '2017-10-10 23:01:42', '2017-10-10 23:02:08'),
(7, '-33.060635', '-71.557744', 9, '2017-11-02 10:28:57', '2017-11-08 21:20:59'),
(8, '-33.127972', '-71.565532', 10, '2017-11-02 13:03:32', '2017-12-19 20:52:30'),
(9, '-33.131914', '-71.563580', 11, '2017-11-02 22:27:59', '2017-12-19 20:47:19'),
(10, '-33.423554', '-70.613410', 12, '2017-11-26 03:56:12', '2017-11-26 03:57:56'),
(11, '-33.060635', '-71.557744', 15, '2017-11-29 17:28:09', '2017-11-29 17:28:09'),
(12, '-33.123928', '-71.568988', 17, '2017-12-20 03:04:10', '2017-12-20 03:05:15'),
(13, '-33.042245', '-71.604501', 18, '2018-01-22 12:54:49', '2018-01-22 12:55:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roll`
--

CREATE TABLE `roll` (
  `id_roll` int(11) NOT NULL,
  `nombre` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla con los roles de los usuarios';

--
-- Volcado de datos para la tabla `roll`
--

INSERT INTO `roll` (`id_roll`, `nombre`, `descripcion`) VALUES
(1, 'Administrador', 'Administrador general del sistema'),
(2, 'Usuario', 'Usuario cliente de la API');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuarios` int(11) NOT NULL,
  `nombre` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(140) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activo` tinyint(1) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_roll` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla de usuarios';

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuarios`, `nombre`, `correo`, `password`, `login`, `remember_token`, `activo`, `created_at`, `updated_at`, `id_roll`) VALUES
(0, 'Pepito Grillo', 'pepito@peito.cl', '$2y$10$qgxXIGLW8xvQOdfwgGtL7.ebLQmHjEvPXMYF4dAuLWWmhaq4f8OKG', 'Pepito', '', 1, '2017-10-09 04:40:31', '2017-10-09 04:40:31', 2),
(1, 'Christian Melcherts', 'sainxtrich@gmail.com', '$2y$10$vDbeLigWMBXnXfhPh73lS.6b8.RPlVZAT4/e.xDZrtemKQBEJgOKO', 'Administrador', 'rNJMDwoVIx0SUSGmW6sNLGgaobhOtMrkOc3BVwprlC8CaVfrrkd6UtUWc1ML', 1, '2017-10-09 03:49:48', '2017-10-09 03:49:48', 1),
(4, 'Karen Boza', 'karen@uvm.cl', '$2y$10$TZAAT3BPPBMHEALZ5yJ2VueLvvQsMs.EJb.VfCAljGDQSpDgCohWq', 'Karen', NULL, 1, '2017-10-10 11:17:33', '2017-12-19 19:03:25', 2),
(5, 'Solange Huertas', 'shuertas@uvm.cl', '$2y$10$LZjPVoPw8C9FIgfNEuBuH.dlcAfwVyp.YVsCdbGZIhhypl9eeJJ86', 'Soli', NULL, 1, '2017-10-10 11:18:19', '2017-12-19 19:03:16', 2),
(6, 'Rodrigo Alicera', 'ralicer@uvm.cl', '$2y$10$kxKdzI6DM6FNR6tcNO7pZOvEIPtttUbroHYZh.XTzS5Zo9DQAQ/r.', 'Rodrigo', NULL, 1, '2017-10-10 11:19:02', '2017-12-19 19:02:36', 2),
(7, 'Christian Melcherts', 'christian.mel@outlook.com', '$2y$10$Oxv3xJHdRSTS//Yx4/naBuzt2pUaupw7Q4sVDUtu5ZO1qlhmGe5wS', 'Christian', NULL, 1, '2017-10-10 11:20:21', '2017-10-10 11:20:21', 1),
(8, 'Felipe Dabalos', 'felipe@uvm.cl', '$2y$10$kuofMaTX7/nLGpgYhI//wOlapysBN3CnVQnf4x7m0nVfSXsO8CpZC', 'Felipe', NULL, 1, '2017-10-10 23:01:05', '2017-10-10 23:01:05', 2),
(9, 'App', 'app@app.cl', '$2y$10$uI402eFSd1AvT8nBIAoNd.i3omCL9K9dRP7NM0Cb1u91dbDMDzeg.', 'App', NULL, 1, '2017-11-01 20:05:30', '2017-11-02 20:30:06', 2),
(10, 'Erica Fuentes', 'erica@erica.cl', '$2y$10$yLPX05m8ztoRM0LxpSJvXOo1goE3mk094KSWIw7ruAgXIBiUxoaZ6', 'Erica', NULL, 1, '2017-11-02 13:03:05', '2017-11-02 13:03:05', 2),
(11, 'Eduardo Jones', 'ejones@uvm.cl', '$2y$10$T.DwllPMwCCP2wE97CFRr.L3WMrjV.VIXWuWEEBBsfi9ShuBTEsX2', 'Eduardo', NULL, 1, '2017-11-02 22:25:22', '2017-11-02 22:25:22', 2),
(12, 'Williams', 'willi@willi.cl', '$2y$10$ixK1pbNylX3aL9fsQ0tDyO2CRh0knUMU57hnyHDFPeGCjPESZ2xAK', 'Willi', NULL, 1, '2017-11-26 03:54:24', '2017-11-26 03:54:24', 2),
(13, 'David Larrondo', 'dlarrondo@live.cl', '$2y$10$tW8A8l7SztVpjPvs.58AW.oMETsWYpIdaUxuwhSdM1Xpk2Nhnaa1.', 'Dlarrondo', NULL, 1, '2017-11-29 01:06:31', '2017-11-29 01:06:31', 1),
(14, 'Carolina', 'carolina@uvm.cl', '$2y$10$IdjvwdE/T0oQPjNHPFqsDOgXrBbJ7tPGQP1b0o0n4ohoSlP0fwKeS', 'Carolina', NULL, 1, '2017-11-29 17:22:53', '2017-11-29 17:22:53', 2),
(15, 'david', 'larrondo@live.cl', '$2y$10$2QbU.iQxJlkSKBW42VOqJuaxCKb/SE2yuX0wFc5lHK945ANELZs5O', 'David', NULL, 1, '2017-11-29 17:27:52', '2017-11-29 17:27:52', 2),
(16, 'jason', 'jason@ette.com', '$2y$10$BzpxC7CBZ2UmRJWm1y25W.2voDhQ1Xc1RoXwDVR9h7TFjXFNJq/si', 'jason', NULL, 1, '2017-12-04 19:41:56', '2017-12-04 19:41:56', 2),
(17, 'Cosme Fulanito', 'fulanito@gmail.com', '$2y$10$zKnh3.DLemme4Z7gaHh15O9IzbeoT5lDNGLJA4W.9oYbZheWHd68O', 'Fulanito', NULL, 1, '2017-12-20 03:03:56', '2017-12-20 03:03:56', 2),
(18, 'Ignacio', 'imoncada@imgonline.cl', '$2y$10$PCC45vjUqA6mOnSFn1B8W.e72ReAbAltN6kfrni/dDm6hp.70qLdO', 'imoncada', NULL, 1, '2018-01-22 12:54:34', '2018-01-22 12:54:34', 2),
(19, 'Alejandro', 'alejandro@jumpitt.com', '$2y$10$QHIpn.NxRohXusnP4bbro.ahJ.h3iDp/5qab9WQwVA.yViI8KJcwm', 'Alejandro', 'rg0KeoIcZzMVZ2CAcStZRuJDJwcTAg4IxkqqEOMB8M1bDWnitjxyxHHt1Mt1', 1, '2018-05-26 22:52:52', '2018-05-26 22:52:52', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_beneficios`
--

CREATE TABLE `usuarios_beneficios` (
  `id_usuarios_beneficio` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `id_usuarios` int(11) NOT NULL,
  `id_beneficio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios_beneficios`
--

INSERT INTO `usuarios_beneficios` (`id_usuarios_beneficio`, `activo`, `created_at`, `updated_at`, `id_usuarios`, `id_beneficio`) VALUES
(0, 1, '2017-10-09 05:39:50', '0000-00-00 00:00:00', 0, 0),
(1, 1, '2017-10-09 05:40:04', '0000-00-00 00:00:00', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_flags`
--

CREATE TABLE `usuarios_flags` (
  `id_usuarios_flag` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_usuarios` int(11) NOT NULL,
  `id_flags` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios_flags`
--

INSERT INTO `usuarios_flags` (`id_usuarios_flag`, `activo`, `created_at`, `updated_at`, `id_usuarios`, `id_flags`) VALUES
(0, 1, '2017-10-09 05:31:21', '2017-10-09 05:31:21', 0, 0),
(1, 1, '2017-10-09 05:31:36', '2017-10-09 05:31:36', 0, 1),
(2, 0, '2017-11-27 00:04:13', '2018-02-07 15:04:26', 1, 1),
(3, 1, '2017-11-27 00:04:13', '2017-11-27 00:04:13', 10, 2),
(5, 1, '2017-11-27 00:06:52', '2017-11-27 00:06:52', 10, 0),
(6, 1, '2017-11-28 21:34:36', '2017-11-28 21:34:36', 1, 3),
(7, 1, '2017-11-28 21:35:38', '2018-01-04 15:46:00', 1, 2),
(8, 0, '2017-11-29 04:45:19', '2018-02-07 15:04:27', 1, 0),
(9, 0, '2017-11-29 04:45:20', '2018-02-07 15:04:29', 1, 4),
(10, 0, '2017-11-29 17:29:43', '2017-11-29 17:30:15', 15, 0),
(11, 1, '2017-11-29 17:29:59', '2017-11-29 17:29:59', 15, 5),
(12, 1, '2017-12-04 19:52:27', '2017-12-04 19:53:55', 10, 1),
(13, 0, '2017-12-04 19:53:57', '2017-12-04 19:54:00', 10, 4),
(14, 1, '2017-12-04 19:53:57', '2017-12-04 19:53:57', 10, 5),
(15, 1, '2017-12-19 20:45:04', '2017-12-19 20:45:04', 5, 1),
(16, 1, '2017-12-19 20:45:07', '2017-12-19 20:45:07', 5, 4),
(17, 1, '2017-12-19 20:45:08', '2017-12-19 20:45:08', 5, 0),
(18, 0, '2017-12-19 20:45:10', '2017-12-19 20:45:12', 5, 5),
(19, 1, '2017-12-19 20:47:06', '2017-12-19 20:47:06', 11, 1),
(20, 1, '2017-12-19 20:49:02', '2017-12-19 20:49:02', 4, 1),
(21, 1, '2017-12-19 20:49:04', '2017-12-19 20:49:04', 4, 4),
(22, 1, '2017-12-19 20:49:04', '2017-12-19 20:49:04', 4, 5),
(23, 1, '2017-12-19 20:51:27', '2017-12-19 20:51:27', 6, 1),
(24, 1, '2017-12-19 20:51:28', '2017-12-19 20:51:28', 6, 5),
(25, 1, '2017-12-19 20:51:40', '2017-12-19 20:51:40', 6, 0),
(29, 0, '2017-12-20 02:58:41', '2018-02-07 15:04:27', 1, 6),
(30, 1, '2017-12-20 03:04:46', '2017-12-20 03:05:13', 17, 6),
(31, 1, '2017-12-20 03:04:48', '2017-12-20 03:04:48', 17, 4),
(32, 1, '2017-12-20 03:05:08', '2017-12-20 03:05:08', 17, 1),
(33, 1, '2017-12-20 03:05:12', '2017-12-20 03:05:12', 17, 2),
(34, 1, '2018-01-22 12:55:04', '2018-01-22 12:55:04', 18, 0),
(35, 1, '2018-01-22 12:55:06', '2018-01-22 12:55:06', 18, 1),
(36, 1, '2018-01-22 12:55:07', '2018-01-22 12:55:07', 18, 2),
(37, 1, '2018-01-22 12:55:08', '2018-01-22 12:55:08', 18, 4),
(38, 1, '2018-01-22 12:55:10', '2018-01-22 12:55:10', 18, 6);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `beneficios`
--
ALTER TABLE `beneficios`
  ADD PRIMARY KEY (`id_beneficio`),
  ADD UNIQUE KEY `nombre` (`nombre`),
  ADD UNIQUE KEY `codigo` (`codigo`);

--
-- Indices de la tabla `flags`
--
ALTER TABLE `flags`
  ADD PRIMARY KEY (`id_flags`);

--
-- Indices de la tabla `localizacion`
--
ALTER TABLE `localizacion`
  ADD PRIMARY KEY (`id_localizacion`),
  ADD UNIQUE KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `roll`
--
ALTER TABLE `roll`
  ADD PRIMARY KEY (`id_roll`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuarios`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD UNIQUE KEY `login` (`login`),
  ADD KEY `id_roll` (`id_roll`);

--
-- Indices de la tabla `usuarios_beneficios`
--
ALTER TABLE `usuarios_beneficios`
  ADD PRIMARY KEY (`id_usuarios_beneficio`),
  ADD UNIQUE KEY `id_usuarios` (`id_usuarios`,`id_beneficio`),
  ADD KEY `id_beneficio` (`id_beneficio`);

--
-- Indices de la tabla `usuarios_flags`
--
ALTER TABLE `usuarios_flags`
  ADD PRIMARY KEY (`id_usuarios_flag`),
  ADD UNIQUE KEY `id_usuarios` (`id_usuarios`,`id_flags`),
  ADD KEY `id_flags` (`id_flags`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `localizacion`
--
ALTER TABLE `localizacion`
  ADD CONSTRAINT `localizacion_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id_usuarios`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_roll`) REFERENCES `roll` (`id_roll`);

--
-- Filtros para la tabla `usuarios_beneficios`
--
ALTER TABLE `usuarios_beneficios`
  ADD CONSTRAINT `usuarios_beneficios_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id_usuarios`),
  ADD CONSTRAINT `usuarios_beneficios_ibfk_2` FOREIGN KEY (`id_beneficio`) REFERENCES `beneficios` (`id_beneficio`);

--
-- Filtros para la tabla `usuarios_flags`
--
ALTER TABLE `usuarios_flags`
  ADD CONSTRAINT `usuarios_flags_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id_usuarios`),
  ADD CONSTRAINT `usuarios_flags_ibfk_2` FOREIGN KEY (`id_flags`) REFERENCES `flags` (`id_flags`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
