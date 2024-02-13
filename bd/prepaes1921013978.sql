-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-02-2023 a las 22:30:47
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prepaes1921013978`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion`
--

CREATE TABLE `inscripcion` (
  `id` int(11) NOT NULL,
  `matricula` varchar(4) NOT NULL,
  `asignatura` varchar(30) NOT NULL,
  `grupo` varchar(15) NOT NULL,
  `profesor` varchar(90) NOT NULL,
  `turno` varchar(10) NOT NULL,
  `semestre` tinyint(4) NOT NULL,
  `estatus` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `inscripcion`
--

INSERT INTO `inscripcion` (`id`, `matricula`, `asignatura`, `grupo`, `profesor`, `turno`, `semestre`, `estatus`) VALUES
(1, '9999', 'Computación II', '201', 'Pedro López', 'Matutino', 2, 'Preinscrita'),
(2, '9999', 'Historia I', '321', 'Ana Ruíz', 'Vespertino', 3, 'Cancelada'),
(4, '9999', 'Matemáticas II', '201', 'José Pérez', 'Matutino', 2, 'Inscrita'),
(5, '0001', 'Historia I', '323', 'Juan Gutiérrez', 'Matutino', 3, 'Preinscrita'),
(6, '9999', 'Física II', '203', 'Rosa González', 'Matutino', 2, 'Inscrita'),
(7, '0001', 'Inglés I', '305', 'José Pérez', 'Vespertino', 1, 'Inscrita'),
(10, '0001', 'Educación Física I', '0', 'Por asignar', 'Matutino', 4, 'Preinscrita'),
(13, '0001', 'Ciencias I', '0', 'Por asignar', 'Matutino', 3, 'Preinscrita'),
(14, '0002', 'TIC I', '300', 'Miguel Hernández', 'Vespertino', 2, 'Inscrita'),
(15, '9999', 'Física I', '0', 'Por asignar', 'Vespertino', 4, 'Preinscrita');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `matricula` varchar(4) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellidopaterno` varchar(30) NOT NULL,
  `apellidomaterno` varchar(30) NOT NULL,
  `turno` varchar(10) NOT NULL,
  `tipousuario` varchar(2) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`matricula`, `nombre`, `apellidopaterno`, `apellidomaterno`, `turno`, `tipousuario`, `password`) VALUES
('0000', 'Usuario', 'Servicios', 'Escolares', 'Mixto', 'SE', 'Progweb2#'),
('0001', 'Virginia', 'López', 'Macías', 'Matutino', 'AL', 'Vlm1234$'),
('0002', 'a', 'b', 'c', 'Vespertino', 'AL', 'Abc12345@'),
('0003', 'José Manuel', 'Gómez', 'Pérez', 'Vespertino', 'AL', 'Jose003$'),
('0004', 'Mariano', 'Rojas', 'Quezada', 'Mixto', 'AL', 'MrQ0004%'),
('0005', 'Ari Santiago', 'Nabor', 'Torres', 'Vespertino', 'AL', 'Asnt0005!'),
('9999', 'Angel Isaac', 'Nabor', 'Torres', 'Matutino', 'AL', 'Progweb2#');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`matricula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
