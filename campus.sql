-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-04-2023 a las 12:03:40
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
-- Base de datos: `campus`
--
DROP DATABASE IF EXISTS `campus`;
CREATE DATABASE `campus`;
USE `campus`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `id_doc` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `size` int(10) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `archivo` varchar(255) NOT NULL,
  `asignaturaID_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `archivos`
--

INSERT INTO `archivos` (`id_doc`, `nombre`, `size`, `tipo`, `archivo`, `asignaturaID_FK`) VALUES
(10, 'prueba', 31694, 'application/pdf', 'PruebaPDF .pdf', 1013);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaturas`
--

CREATE TABLE `asignaturas` (
  `asignaturaID` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `curso` varchar(50) NOT NULL,
  `semestre` varchar(50) NOT NULL,
  `moduloID_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asignaturas`
--

INSERT INTO `asignaturas` (`asignaturaID`, `nombre`, `curso`, `semestre`, `moduloID_FK`) VALUES
(1013, 'Programación', '1C', 'Anual', 1),
(1014, 'Bases de Datos', '1C', 'Anual', 1),
(1015, 'Entornos de Desarrollo II', '1C', '2S', 1),
(1020, 'Programación', '2C', '1S', 3),
(1021, 'Entorno Cliente', '2C', '2S', 1),
(1022, 'Sistemas Informáticos', '1C', '1S', 1),
(1024, 'Entorno Servidor', '2C', '1S', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enlaces`
--

CREATE TABLE `enlaces` (
  `id_enlace` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `asignaturaID_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `enlaces`
--

INSERT INTO `enlaces` (`id_enlace`, `titulo`, `url`, `asignaturaID_FK`) VALUES
(4, 'Video de Youtube', 'https://www.youtube.com/watch?v=6EBNIgkrU74&list=PLU8oAlHdN5BmpIQGDSHo5e1r4ZYWQ8m4B', 1013);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `eventoID` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `fInicio` date NOT NULL,
  `fFin` date NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `autor` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`eventoID`, `titulo`, `fInicio`, `fFin`, `descripcion`, `autor`) VALUES
(90, 'Proyecto!!', '2023-05-02', '2023-05-02', 'Es el último día para entregar el proyecto!!', '000000000'),
(91, 'Evento de prueba', '2023-04-29', '2023-04-30', 'Probando eventos', '000000000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id` int(10) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `mensaje` text DEFAULT NULL,
  `remitente` varchar(9) DEFAULT NULL,
  `destinatario` varchar(9) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `leido` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id`, `titulo`, `mensaje`, `remitente`, `destinatario`, `fecha`, `leido`) VALUES
(1, 'El pan sube', 'El pan sube de precio', '000000000', '11111111W', '2023-03-25 12:10:19', 1),
(10, 'Prueba Admin', 'Este es un mensaje para el administrador', '000000000', '000000000', '2023-04-27 10:38:23', 0),
(11, 'Prueba Alumno', 'Hola, este es un mensaje para el Alumno', '000000000', '11111111W', '2023-04-27 10:38:46', 0),
(12, 'Prueba Profesor', 'Hola, este es un mensaje para el Profesor', '000000000', '33333333K', '2023-04-27 10:39:10', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE `modulos` (
  `moduloID` int(11) NOT NULL,
  `nombre` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `modulos`
--

INSERT INTO `modulos` (`moduloID`, `nombre`) VALUES
(1, 'FPS Desarrollo Aplicaciones Web'),
(3, 'FPM Sistemas Microinformáticos y Redes ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `id` int(11) NOT NULL,
  `alumnoID_FK` varchar(9) NOT NULL,
  `asignaturaID_FK` int(11) NOT NULL,
  `nota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`id`, `alumnoID_FK`, `asignaturaID_FK`, `nota`) VALUES
(8, '11111111W', 1013, 7),
(9, '11111111W', 1014, 7),
(11, '11111111W', 1021, 5),
(14, '11111111W', 1015, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `userID` varchar(9) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `tipoUsuario` varchar(8) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `token` varchar(255) DEFAULT NULL,
  `moduloID_FK` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`userID`, `contrasena`, `nombre`, `apellidos`, `correo`, `tipoUsuario`, `estado`, `token`, `moduloID_FK`) VALUES
('000000000', '$2y$10$fXuIvaZeFe8kwOQFvorVPe2KvtJWVPt817KGvedhOj40njDHDyaoG', 'admin', 'admin', 'admin@admin.com', 'Admin', 1, NULL, NULL),
('11111111W', '$2y$10$fXuIvaZeFe8kwOQFvorVPe2KvtJWVPt817KGvedhOj40njDHDyaoG', 'alumno', 'alumno', 'alumno@alumno.com', 'Alumno', 1, NULL, 1),
('33333333K', '$2y$10$QSVT82DNVxPLQYRzNxDMuOnaVtYxVvg6i1.qC.UH1bVkLdPbPtUoa', 'Profesor', 'Profesor', 'profe@profe.com', 'Profesor', 1, NULL, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`id_doc`),
  ADD KEY `asignaturaID_FK` (`asignaturaID_FK`);

--
-- Indices de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  ADD PRIMARY KEY (`asignaturaID`),
  ADD KEY `asignaturas_ibfk_1` (`moduloID_FK`);

--
-- Indices de la tabla `enlaces`
--
ALTER TABLE `enlaces`
  ADD PRIMARY KEY (`id_enlace`),
  ADD KEY `asignaturaID_FK` (`asignaturaID_FK`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`eventoID`),
  ADD KEY `eventos_ibfk_1` (`autor`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mensajes_ibfk_1` (`remitente`),
  ADD KEY `mensajes_ibfk_2` (`destinatario`);

--
-- Indices de la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`moduloID`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alumnoID_FK` (`alumnoID_FK`),
  ADD KEY `asignaturaID_FK` (`asignaturaID_FK`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD KEY `usuario_ibfk_1` (`moduloID_FK`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivos`
--
ALTER TABLE `archivos`
  MODIFY `id_doc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  MODIFY `asignaturaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1025;

--
-- AUTO_INCREMENT de la tabla `enlaces`
--
ALTER TABLE `enlaces`
  MODIFY `id_enlace` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `eventoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `moduloID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD CONSTRAINT `archivos_ibfk_1` FOREIGN KEY (`asignaturaID_FK`) REFERENCES `asignaturas` (`asignaturaID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  ADD CONSTRAINT `asignaturas_ibfk_1` FOREIGN KEY (`moduloID_FK`) REFERENCES `modulos` (`moduloID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `enlaces`
--
ALTER TABLE `enlaces`
  ADD CONSTRAINT `enlaces_ibfk_1` FOREIGN KEY (`asignaturaID_FK`) REFERENCES `asignaturas` (`asignaturaID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`autor`) REFERENCES `usuario` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD CONSTRAINT `mensajes_ibfk_1` FOREIGN KEY (`remitente`) REFERENCES `usuario` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mensajes_ibfk_2` FOREIGN KEY (`destinatario`) REFERENCES `usuario` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `notas_ibfk_1` FOREIGN KEY (`alumnoID_FK`) REFERENCES `usuario` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notas_ibfk_2` FOREIGN KEY (`asignaturaID_FK`) REFERENCES `asignaturas` (`asignaturaID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`moduloID_FK`) REFERENCES `modulos` (`moduloID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
