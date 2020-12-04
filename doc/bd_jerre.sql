-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:33065
-- Tiempo de generación: 04-12-2020 a las 21:37:52
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_jerre`
--
CREATE DATABASE IF NOT EXISTS `bd_jerre` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bd_jerre`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `revisores`
--

DROP TABLE IF EXISTS `revisores`;
CREATE TABLE `revisores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `revisores`
--

INSERT INTO `revisores` (`id`, `nombre`, `apellido`) VALUES
(1, 'Nombre', 'Revisor 1'),
(2, 'Nombre', 'Revisor 2'),
(3, 'Nombre', 'Revisor 3'),
(4, 'Nombre', 'Revisor 4'),
(5, 'Nombre', 'Revisor 5'),
(6, 'Nombre', 'Revisor 6'),
(7, 'Nombre', 'Revisor 7'),
(8, 'Nombre', 'Revisor 8');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id_carga` int(11) NOT NULL COMMENT 'Id. de Carga del Archivo',
  `email` varchar(65) NOT NULL COMMENT 'Correo electr├│nico del usuario',
  `nombre` varchar(25) DEFAULT NULL COMMENT 'Nombre del Usuario',
  `apellido` varchar(25) DEFAULT NULL COMMENT 'Apellido del Usuario',
  `codigo` int(1) NOT NULL COMMENT 'C├│digo de estado del Usuario - (1:Activos, 2:Inactivos, 3:En espera)',
  `id_revisor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_carga`, `email`, `nombre`, `apellido`, `codigo`, `id_revisor`) VALUES
(1, 'juan234@loquesea.com', 'Juan', '', 1, 1),
(1, 'juan234@loquesea.com', 'Juan', 'Perez', 1, 3),
(1, 'juan234@loquesea.com', 'Rodrigo', 'Perez', 1, 5),
(1, 'juan324@loquesea.com', 'Juan', 'Perz', 1, 6),
(1, 'juan15@loquesea.com', 'Juan', 'Perez', 2, 7),
(1, 'juan11@loquesea.com', 'Juan', 'Perez', 2, 3),
(1, 'juan12@loquesea.com', 'Juan', '', 2, 7),
(1, 'juan0@loquesea.com', 'Juan', 'Perez', 3, 8),
(1, 'juan9@loquesea.com', 'JuliÃ¡n', 'Perez', 3, 3),
(1, 'juan9@loquesea.com', 'Roberto', 'Perez', 3, 6),
(1, 'juan8@loquesea.com', 'Juan', 'Perez', 3, 2),
(1, 'juan7@loquesea.com', 'Juan', '', 1, 4),
(1, 'juan6@loquesea.com', 'Juan', 'Perez', 3, 5),
(1, 'juan5@loquesea.com', 'Pedro', 'Perez', 1, 3),
(1, 'juan3@loquesea.com', 'Juan', '', 1, 4),
(1, 'juan2@loquesea.com', 'Juan', 'Perez', 3, 6);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `revisores`
--
ALTER TABLE `revisores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD KEY `fk_usuarios_revisores_idx` (`id_revisor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `revisores`
--
ALTER TABLE `revisores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_revisores` FOREIGN KEY (`id_revisor`) REFERENCES `revisores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
