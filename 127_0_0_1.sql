-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-04-2024 a las 12:47:50
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bbdd`
--
CREATE DATABASE IF NOT EXISTS `bbdd` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bbdd`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `CodDep` decimal(1,0) NOT NULL,
  `Descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`CodDep`, `Descripcion`) VALUES
(1, 'Informática'),
(2, 'Administración'),
(3, 'Presentación de demandas'),
(4, 'Control de escritos'),
(5, 'Notificaciones'),
(6, 'Dirección'),
(7, 'Vacante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `CodInv` decimal(5,0) NOT NULL,
  `Falta` date NOT NULL,
  `Fbaja` date DEFAULT NULL,
  `NumeroSerie` varchar(30) NOT NULL,
  `CodTip` decimal(1,0) NOT NULL,
  `CodMod` decimal(3,0) NOT NULL,
  `CodPT` decimal(2,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`CodInv`, `Falta`, `Fbaja`, `NumeroSerie`, `CodTip`, `CodMod`, `CodPT`) VALUES
(1, '2024-01-10', NULL, '1234', 1, 1, 1),
(2, '2024-01-10', NULL, '4567', 2, 3, 1),
(3, '2024-01-10', NULL, '1235', 1, 2, 2),
(4, '2024-01-10', NULL, '4568', 2, 4, 2),
(5, '2024-01-10', NULL, '1236', 1, 2, 3),
(6, '2024-01-10', NULL, '4569', 2, 3, 3),
(7, '2024-01-10', NULL, '1237', 1, 1, 4),
(8, '2024-01-10', NULL, '5670', 2, 3, 4),
(9, '2024-01-10', NULL, '1238', 1, 2, 5),
(10, '2024-01-10', NULL, '5671', 2, 3, 5),
(11, '2024-01-10', NULL, '1239', 1, 1, 6),
(12, '2024-01-10', NULL, '5672', 2, 4, 6),
(13, '2024-01-10', NULL, '1240', 1, 2, 7),
(14, '2024-01-10', NULL, '5673', 2, 3, 7),
(15, '2024-01-10', NULL, '1241', 1, 2, 8),
(16, '2024-01-10', NULL, '5674', 2, 4, 8),
(17, '2024-01-10', NULL, '1242', 1, 1, 9),
(18, '2024-01-10', NULL, '5675', 2, 3, 9),
(19, '2024-01-10', NULL, '1243', 1, 1, 10),
(20, '2024-01-10', NULL, '5676', 2, 4, 10),
(21, '2024-01-10', NULL, '1244', 1, 1, 11),
(22, '2024-01-10', NULL, '5677', 2, 3, 11),
(23, '2024-01-10', NULL, '1245', 1, 1, 12),
(24, '2024-01-10', NULL, '5678', 2, 4, 12),
(25, '2024-01-10', NULL, '1246', 1, 2, 13),
(26, '2024-01-10', NULL, '5679', 2, 3, 13),
(27, '2024-01-10', NULL, '1247', 1, 2, 14),
(28, '2024-01-10', NULL, '5680', 2, 4, 14),
(29, '2024-01-10', NULL, '1248', 1, 2, 15),
(30, '2024-01-10', NULL, '5681', 2, 3, 15),
(31, '2024-01-10', NULL, '1249', 1, 2, 16),
(32, '2024-01-10', NULL, '5682', 2, 4, 16),
(33, '0000-00-00', NULL, '9876', 2, 4, 17),
(34, '0000-00-00', NULL, '8765', 1, 1, 17),
(35, '0000-00-00', NULL, '7654', 2, 3, 18),
(36, '0000-00-00', NULL, '6543', 1, 1, 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `CodMar` decimal(2,0) NOT NULL,
  `Descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`CodMar`, `Descripcion`) VALUES
(1, 'HP'),
(2, 'Acer');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelo`
--

CREATE TABLE `modelo` (
  `CodMod` decimal(3,0) NOT NULL,
  `CodMar` decimal(2,0) NOT NULL,
  `Descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `modelo`
--

INSERT INTO `modelo` (`CodMod`, `CodMar`, `Descripcion`) VALUES
(1, 1, 'EliteBook 840 G7'),
(2, 1, 'EliteBook 830 G5'),
(3, 2, 'CB242Y'),
(4, 2, 'B246HYL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `CodPer` decimal(1,0) NOT NULL,
  `Descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`CodPer`, `Descripcion`) VALUES
(1, 'Admin'),
(2, 'Responsable'),
(3, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puestotrabajo`
--

CREATE TABLE `puestotrabajo` (
  `CodPT` decimal(2,0) NOT NULL,
  `CodUsu` decimal(4,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `puestotrabajo`
--

INSERT INTO `puestotrabajo` (`CodPT`, `CodUsu`) VALUES
(1, 1),
(2, 2),
(3, 3),
(6, 4),
(7, 5),
(10, 6),
(11, 7),
(14, 8),
(15, 9),
(18, 10),
(4, 11),
(8, 12),
(12, 13),
(16, 14),
(5, 15),
(9, 16),
(13, 17),
(17, 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `CodTip` decimal(1,0) NOT NULL,
  `Descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`CodTip`, `Descripcion`) VALUES
(1, 'Equipo'),
(2, 'Monitor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `CodUsu` decimal(4,0) NOT NULL,
  `DNI` decimal(8,0) DEFAULT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Ap1` varchar(30) NOT NULL,
  `Ap2` varchar(30) DEFAULT NULL,
  `Correo` varchar(324) NOT NULL,
  `Password` varchar(130) DEFAULT NULL,
  `Extension` varchar(4) DEFAULT NULL,
  `CodPer` decimal(1,0) NOT NULL,
  `CodDep` decimal(1,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`CodUsu`, `DNI`, `Nombre`, `Ap1`, `Ap2`, `Correo`, `Password`, `Extension`, `CodPer`, `CodDep`) VALUES
(1, 12341234, 'Alejandro', 'Escudero', 'Gallardo', 'asd', 'asd', '1001', 1, 1),
(2, 12341235, 'María José', 'Salazar', NULL, 'asdasd', 'asd', '1002', 2, 2),
(3, 12341236, 'María', 'Márquez', NULL, 'mmarquez@gmail.com', 'asd', '1003', 3, 2),
(4, 12341237, 'Rocío', 'Jiménez', NULL, 'rjimenez@gmail.com', 'asd', '1004', 2, 3),
(5, 12341238, 'Marta', 'García', NULL, 'mgarcia@gmail.com', 'asd', '1005', 3, 3),
(6, 12341294, 'Caridad', 'López', NULL, 'clopez@gmail.com', 'asd', '1006', 2, 4),
(7, 12341239, 'Isabel', 'Onate', NULL, 'ionate@gmail.com', 'asd', '1007', 3, 4),
(8, 12341240, 'Ignacio', 'Cobos', NULL, 'icobos@gmail.com', 'asd', '1008', 2, 5),
(9, 12341241, 'Elena', 'Montes', NULL, 'emontes@gmail.com', 'asd', '1009', 3, 5),
(10, 12341242, 'David', 'Maraver', 'Ceballos', 'dmaraver@gmail.com', 'asd', '1010', 1, 6),
(11, 12341243, 'Inmaculada', 'Guerrero', NULL, 'iguerrero@gmail.com', 'asd', '1011', 3, 2),
(12, 12341244, 'Cayetana', 'Olavarría', NULL, 'colavarria@gmail.com', 'asd', '1012', 3, 3),
(13, 12341245, 'Beatriz', 'Sánchez', NULL, 'bsanchez@gmail.com', 'asd', '1013', 3, 4),
(14, 12341246, 'Jairo', 'Villegas', NULL, 'jvillegas@gmail.com', 'asd', '1014', 3, 5),
(15, 12341247, 'Doriana', 'Hoxha', NULL, 'dhohxa@gmail.com', 'asd', '1015', 3, 2),
(16, 12341248, 'Pilar', 'Fernández', NULL, 'pfernandez@gmail.com', 'asd', '1016', 3, 3),
(17, 12341249, 'Dolores', 'Picamill', NULL, 'dpicamill@gmail.com', 'asd', '1017', 3, 4),
(18, 12341250, 'Rafael', 'Moreno', NULL, 'rmoreno@gmail.com', 'asd', '1018', 3, 5);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_inventario`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `v_inventario` (
`nombre` varchar(92)
,`departamento` varchar(30)
,`correo` varchar(324)
,`extension` varchar(4)
,`PT` decimal(2,0)
,`CodDep` decimal(1,0)
,`equipo` varchar(61)
,`monitor` varchar(61)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `v_inventario`
--
DROP TABLE IF EXISTS `v_inventario`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_inventario`  AS SELECT concat(`usuario`.`Nombre`,' ',`usuario`.`Ap1`,' ',coalesce(`usuario`.`Ap2`,'')) AS `nombre`, `departamento`.`Descripcion` AS `departamento`, `usuario`.`Correo` AS `correo`, `usuario`.`Extension` AS `extension`, `puestotrabajo`.`CodPT` AS `PT`, `departamento`.`CodDep` AS `CodDep`, max(case when `inventario`.`CodTip` = 1 then concat(`marca`.`Descripcion`,' ',`modelo`.`Descripcion`) end) AS `equipo`, max(case when `inventario`.`CodTip` = 2 then concat(`marca`.`Descripcion`,' ',`modelo`.`Descripcion`) end) AS `monitor` FROM (((((`usuario` join `departamento` on(`usuario`.`CodDep` = `departamento`.`CodDep`)) join `puestotrabajo` on(`usuario`.`CodUsu` = `puestotrabajo`.`CodUsu`)) join `inventario` on(`puestotrabajo`.`CodPT` = `inventario`.`CodPT`)) join `modelo` on(`inventario`.`CodMod` = `modelo`.`CodMod`)) join `marca` on(`marca`.`CodMar` = `modelo`.`CodMar`)) GROUP BY `puestotrabajo`.`CodPT` ORDER BY `puestotrabajo`.`CodPT` ASC ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`CodDep`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`CodInv`),
  ADD KEY `fk_InvTip` (`CodTip`),
  ADD KEY `fk_InvMod` (`CodMod`),
  ADD KEY `fk_InvPT` (`CodPT`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`CodMar`);

--
-- Indices de la tabla `modelo`
--
ALTER TABLE `modelo`
  ADD PRIMARY KEY (`CodMod`),
  ADD KEY `fk_ModMar` (`CodMar`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`CodPer`);

--
-- Indices de la tabla `puestotrabajo`
--
ALTER TABLE `puestotrabajo`
  ADD PRIMARY KEY (`CodPT`),
  ADD KEY `fk_PTUsu` (`CodUsu`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`CodTip`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`CodUsu`),
  ADD UNIQUE KEY `DNI` (`DNI`),
  ADD KEY `fk_UsuPer` (`CodPer`),
  ADD KEY `fk_UsuDep` (`CodDep`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `fk_InvMod` FOREIGN KEY (`CodMod`) REFERENCES `modelo` (`CodMod`),
  ADD CONSTRAINT `fk_InvPT` FOREIGN KEY (`CodPT`) REFERENCES `puestotrabajo` (`CodPT`),
  ADD CONSTRAINT `fk_InvTip` FOREIGN KEY (`CodTip`) REFERENCES `tipo` (`CodTip`);

--
-- Filtros para la tabla `modelo`
--
ALTER TABLE `modelo`
  ADD CONSTRAINT `fk_ModMar` FOREIGN KEY (`CodMar`) REFERENCES `marca` (`CodMar`);

--
-- Filtros para la tabla `puestotrabajo`
--
ALTER TABLE `puestotrabajo`
  ADD CONSTRAINT `fk_PTUsu` FOREIGN KEY (`CodUsu`) REFERENCES `usuario` (`CodUsu`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_UsuDep` FOREIGN KEY (`CodDep`) REFERENCES `departamento` (`CodDep`),
  ADD CONSTRAINT `fk_UsuPer` FOREIGN KEY (`CodPer`) REFERENCES `perfil` (`CodPer`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
