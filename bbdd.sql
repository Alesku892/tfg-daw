-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-05-2024 a las 11:08:42
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
(7, 'Sin asignar');

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
  `CodPT` decimal(2,0) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`CodInv`, `Falta`, `Fbaja`, `NumeroSerie`, `CodTip`, `CodMod`, `CodPT`, `activo`) VALUES
(1, '2024-01-10', NULL, '1234', 1, 1, 1, 1),
(2, '2024-01-10', NULL, '4567', 2, 3, 1, 1),
(3, '2024-01-10', NULL, '1235', 1, 2, 2, 1),
(4, '2024-01-10', NULL, '4568', 2, 4, 2, 1),
(5, '2024-01-10', NULL, '1236', 1, 2, 3, 1),
(6, '2024-01-10', NULL, '4569', 2, 3, 3, 1),
(7, '2024-01-10', NULL, '1237', 1, 1, 4, 1),
(8, '2024-01-10', NULL, '5670', 2, 3, 4, 1),
(9, '2024-01-10', NULL, '1238', 1, 2, 5, 1),
(10, '2024-01-10', NULL, '5671', 2, 3, 5, 1),
(11, '2024-01-10', NULL, '1239', 1, 1, 6, 1),
(12, '2024-01-10', NULL, '5672', 2, 4, 6, 1),
(13, '2024-01-10', NULL, '1240', 1, 2, 7, 1),
(14, '2024-01-10', NULL, '5673', 2, 3, 7, 1),
(15, '2024-01-10', NULL, '1241', 1, 2, 8, 1),
(16, '2024-01-10', NULL, '5674', 2, 4, 8, 1),
(17, '2024-01-10', NULL, '1242', 1, 1, 9, 1),
(18, '2024-01-10', NULL, '5675', 2, 3, 9, 1),
(19, '2024-01-10', NULL, '1243', 1, 1, 10, 1),
(20, '2024-01-10', NULL, '5676', 2, 4, 10, 1),
(21, '2024-01-10', NULL, '1244', 1, 1, 11, 1),
(22, '2024-01-10', NULL, '5677', 2, 3, 11, 1),
(23, '2024-01-10', NULL, '1245', 1, 1, 12, 1),
(24, '2024-01-10', NULL, '5678', 2, 4, 12, 1),
(25, '2024-01-10', NULL, '1246', 1, 2, 13, 1),
(26, '2024-01-10', NULL, '5679', 2, 3, 13, 1),
(27, '2024-01-10', NULL, '1247', 1, 2, 14, 1),
(28, '2024-01-10', NULL, '5680', 2, 4, 14, 1),
(29, '2024-01-10', NULL, '1248', 1, 2, 15, 1),
(30, '2024-01-10', NULL, '5681', 2, 3, 15, 1),
(31, '2024-01-10', NULL, '1249', 1, 2, 16, 1),
(32, '2024-01-10', NULL, '5682', 2, 4, 16, 1),
(33, '2024-01-10', NULL, '9876', 2, 4, 17, 1),
(34, '2024-01-10', NULL, '8765', 1, 1, 17, 1),
(35, '2024-01-10', NULL, '7654', 2, 3, 18, 1),
(36, '2024-01-10', NULL, '6543', 1, 1, 18, 1);

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
(4, 11),
(5, 15),
(6, 4),
(7, 5),
(8, 12),
(9, 16),
(10, 6),
(11, 7),
(12, 13),
(13, 17),
(14, 8),
(15, 9),
(16, 14),
(17, 18),
(18, 10);

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
  `CodDep` decimal(1,0) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `modalidad` varchar(1) NOT NULL,
  `contrato` varchar(1) NOT NULL,
  `falta` date DEFAULT NULL,
  `fbaja` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`CodUsu`, `DNI`, `Nombre`, `Ap1`, `Ap2`, `Correo`, `Password`, `Extension`, `CodPer`, `CodDep`, `activo`, `modalidad`, `contrato`, `falta`, `fbaja`) VALUES
(1, 12341234, 'Alejandro', 'Escudero', 'Gallardo', 'asd', 'asd', '1001', 1, 1, 1, 'P', 'T', '2024-01-10', NULL),
(2, 12341235, 'María José', 'Salazar', NULL, 'asdasd', 'asd', '1002', 2, 2, 1, 'P', 'T', '2024-01-10', NULL),
(3, 12341236, 'María', 'Márquez', NULL, 'mmarquez@gmail.com', NULL, '1003', 3, 2, 1, 'P', 'T', '2024-01-10', NULL),
(4, 12341237, 'Rocío', 'Jiménez', NULL, 'rjimenez@gmail.com', 'asd', '1004', 2, 3, 1, 'P', 'T', '2024-01-10', NULL),
(5, 12341238, 'Marta', 'García', NULL, 'mgarcia@gmail.com', NULL, '1005', 3, 3, 1, 'P', 'T', '2024-01-10', NULL),
(6, 12341294, 'Caridad', 'López', NULL, 'clopez@gmail.com', 'asd', '1006', 2, 4, 1, 'P', 'T', '2024-01-10', NULL),
(7, 12341239, 'Isabel', 'Onate', NULL, 'ionate@gmail.com', NULL, '1007', 3, 4, 1, 'P', 'T', '2024-01-10', NULL),
(8, 12341240, 'Ignacio', 'Cobos', NULL, 'icobos@gmail.com', 'asd', '1008', 2, 5, 1, 'P', 'T', '2024-01-10', NULL),
(9, 12341241, 'Elena', 'Montes', NULL, 'emontes@gmail.com', NULL, '1009', 3, 5, 1, 'P', 'T', '2024-01-10', NULL),
(10, 12341242, 'David', 'Maraver', 'Ceballos', 'dmaraver@gmail.com', 'asd', '1010', 1, 6, 1, 'P', 'T', '2024-01-10', NULL),
(11, 12341243, 'Inmaculada', 'Guerrero', NULL, 'iguerrero@gmail.com', NULL, '1011', 3, 2, 1, 'P', 'T', '2024-01-10', NULL),
(12, 12341244, 'Cayetana', 'Olavarría', NULL, 'colavarria@gmail.com', NULL, '1012', 3, 3, 1, 'P', 'T', '2024-01-10', NULL),
(13, 12341245, 'Beatriz', 'Sánchez', NULL, 'bsanchez@gmail.com', NULL, '1013', 3, 4, 1, 'P', 'T', '2024-01-10', NULL),
(14, 12341246, 'Jairo', 'Villegas', NULL, 'jvillegas@gmail.com', NULL, '1014', 3, 5, 1, 'P', 'T', '2024-01-10', NULL),
(15, 12341247, 'Doriana', 'Hoxha', NULL, 'dhoxha@gmail.com', NULL, '1015', 3, 2, 1, 'P', 'T', '2024-01-10', NULL),
(16, 12341248, 'Pilar', 'Fernández', NULL, 'pfernandez@gmail.com', NULL, '1016', 3, 3, 1, 'P', 'T', '2024-01-10', NULL),
(17, 12341249, 'Dolores', 'Picamill', NULL, 'dpicamill@gmail.com', NULL, '1017', 3, 4, 1, 'P', 'T', '2024-01-10', NULL),
(18, 12341250, 'Rafael', 'Moreno', NULL, 'rmoreno@gmail.com', NULL, '1018', 3, 5, 1, 'P', 'T', '2024-01-10', NULL),
(19, NULL, 'Vacante', '', NULL, '', NULL, NULL, 3, 7, 1, 'P', 'T', '2024-01-10', NULL);

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
  ADD PRIMARY KEY (`CodPT`);

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
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_UsuDep` FOREIGN KEY (`CodDep`) REFERENCES `departamento` (`CodDep`),
  ADD CONSTRAINT `fk_UsuPer` FOREIGN KEY (`CodPer`) REFERENCES `perfil` (`CodPer`);
--
-- Base de datos: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) NOT NULL,
  `col_name` varchar(64) NOT NULL,
  `col_type` varchar(64) NOT NULL,
  `col_length` text DEFAULT NULL,
  `col_collation` varchar(64) NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) DEFAULT '',
  `col_default` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `column_name` varchar(64) NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) NOT NULL DEFAULT '',
  `transformation_options` varchar(255) NOT NULL DEFAULT '',
  `input_transformation` varchar(255) NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) NOT NULL,
  `settings_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `export_type` varchar(10) NOT NULL,
  `template_name` varchar(64) NOT NULL,
  `template_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

--
-- Volcado de datos para la tabla `pma__export_templates`
--

INSERT INTO `pma__export_templates` (`id`, `username`, `export_type`, `template_name`, `template_data`) VALUES
(1, 'root', 'server', 'bbdd', '{\"quick_or_custom\":\"quick\",\"what\":\"sql\",\"db_select[]\":[\"bbdd\",\"phpmyadmin\",\"servidor\",\"test\"],\"aliases_new\":\"\",\"output_format\":\"sendit\",\"filename_template\":\"@SERVER@\",\"remember_template\":\"on\",\"charset\":\"utf-8\",\"compression\":\"none\",\"maxsize\":\"\",\"codegen_structure_or_data\":\"data\",\"codegen_format\":\"0\",\"csv_separator\":\",\",\"csv_enclosed\":\"\\\"\",\"csv_escaped\":\"\\\"\",\"csv_terminated\":\"AUTO\",\"csv_null\":\"NULL\",\"csv_columns\":\"something\",\"csv_structure_or_data\":\"data\",\"excel_null\":\"NULL\",\"excel_columns\":\"something\",\"excel_edition\":\"win\",\"excel_structure_or_data\":\"data\",\"json_structure_or_data\":\"data\",\"json_unicode\":\"something\",\"latex_caption\":\"something\",\"latex_structure_or_data\":\"structure_and_data\",\"latex_structure_caption\":\"Estructura de la tabla @TABLE@\",\"latex_structure_continued_caption\":\"Estructura de la tabla @TABLE@ (continúa)\",\"latex_structure_label\":\"tab:@TABLE@-structure\",\"latex_relation\":\"something\",\"latex_comments\":\"something\",\"latex_mime\":\"something\",\"latex_columns\":\"something\",\"latex_data_caption\":\"Contenido de la tabla @TABLE@\",\"latex_data_continued_caption\":\"Contenido de la tabla @TABLE@ (continúa)\",\"latex_data_label\":\"tab:@TABLE@-data\",\"latex_null\":\"\\\\textit{NULL}\",\"mediawiki_structure_or_data\":\"data\",\"mediawiki_caption\":\"something\",\"mediawiki_headers\":\"something\",\"htmlword_structure_or_data\":\"structure_and_data\",\"htmlword_null\":\"NULL\",\"ods_null\":\"NULL\",\"ods_structure_or_data\":\"data\",\"odt_structure_or_data\":\"structure_and_data\",\"odt_relation\":\"something\",\"odt_comments\":\"something\",\"odt_mime\":\"something\",\"odt_columns\":\"something\",\"odt_null\":\"NULL\",\"pdf_report_title\":\"\",\"pdf_structure_or_data\":\"data\",\"phparray_structure_or_data\":\"data\",\"sql_include_comments\":\"something\",\"sql_header_comment\":\"\",\"sql_use_transaction\":\"something\",\"sql_compatibility\":\"NONE\",\"sql_structure_or_data\":\"structure_and_data\",\"sql_create_table\":\"something\",\"sql_auto_increment\":\"something\",\"sql_create_view\":\"something\",\"sql_create_trigger\":\"something\",\"sql_backquotes\":\"something\",\"sql_type\":\"INSERT\",\"sql_insert_syntax\":\"both\",\"sql_max_query_size\":\"50000\",\"sql_hex_for_binary\":\"something\",\"sql_utc_time\":\"something\",\"texytext_structure_or_data\":\"structure_and_data\",\"texytext_null\":\"NULL\",\"yaml_structure_or_data\":\"data\",\"\":null,\"as_separate_files\":null,\"csv_removeCRLF\":null,\"excel_removeCRLF\":null,\"json_pretty_print\":null,\"htmlword_columns\":null,\"ods_columns\":null,\"sql_dates\":null,\"sql_relation\":null,\"sql_mime\":null,\"sql_disable_fk\":null,\"sql_views_as_tables\":null,\"sql_metadata\":null,\"sql_drop_database\":null,\"sql_drop_table\":null,\"sql_if_not_exists\":null,\"sql_simple_view_export\":null,\"sql_view_current_user\":null,\"sql_or_replace_view\":null,\"sql_procedure_function\":null,\"sql_truncate\":null,\"sql_delayed\":null,\"sql_ignore\":null,\"texytext_columns\":null}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db` varchar(64) NOT NULL DEFAULT '',
  `table` varchar(64) NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_type` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Volcado de datos para la tabla `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"bbdd\",\"table\":\"usuario\"},{\"db\":\"bbdd\",\"table\":\"inventario\"},{\"db\":\"bbdd\",\"table\":\"departamento\"},{\"db\":\"bbdd\",\"table\":\"puestotrabajo\"},{\"db\":\"information_schema\",\"table\":\"table_constraints\"}]');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) NOT NULL DEFAULT '',
  `master_table` varchar(64) NOT NULL DEFAULT '',
  `master_field` varchar(64) NOT NULL DEFAULT '',
  `foreign_db` varchar(64) NOT NULL DEFAULT '',
  `foreign_table` varchar(64) NOT NULL DEFAULT '',
  `foreign_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `search_name` varchar(64) NOT NULL DEFAULT '',
  `search_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `display_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `prefs` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text NOT NULL,
  `schema_sql` text DEFAULT NULL,
  `data_sql` longtext DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Volcado de datos para la tabla `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2024-05-03 06:15:42', '{\"Console\\/Mode\":\"collapse\",\"lang\":\"es\"}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) NOT NULL,
  `tab` varchar(64) NOT NULL,
  `allowed` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) NOT NULL,
  `usergroup` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indices de la tabla `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indices de la tabla `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indices de la tabla `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indices de la tabla `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indices de la tabla `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indices de la tabla `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indices de la tabla `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indices de la tabla `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indices de la tabla `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indices de la tabla `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indices de la tabla `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indices de la tabla `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indices de la tabla `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Base de datos: `servidor`
--
CREATE DATABASE IF NOT EXISTS `servidor` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `servidor`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adopcion`
--

CREATE TABLE `adopcion` (
  `CodAdo` decimal(6,0) NOT NULL,
  `Seq_Usuario` decimal(5,0) NOT NULL,
  `CodAni` decimal(5,0) NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `adopcion`
--

INSERT INTO `adopcion` (`CodAdo`, `Seq_Usuario`, `CodAni`, `Fecha`) VALUES
(1, 2, 5, '0000-00-00'),
(2, 2, 7, '0000-00-00'),
(3, 3, 8, '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `animal`
--

CREATE TABLE `animal` (
  `CodAni` decimal(5,0) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `CodRaz` decimal(3,0) NOT NULL,
  `CodAso` decimal(5,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `animal`
--

INSERT INTO `animal` (`CodAni`, `Nombre`, `CodRaz`, `CodAso`) VALUES
(1, 'Leo', 1, 2),
(2, 'Blacky', 3, 2),
(3, 'Rengar', 2, 2),
(4, 'Jara', 6, 1),
(5, 'Salvi', 5, 1),
(6, 'Mojito', 4, 2),
(7, 'Thor', 4, 2),
(8, 'Cocacola', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asociacion`
--

CREATE TABLE `asociacion` (
  `CodAso` decimal(5,0) NOT NULL,
  `Descripcion` varchar(30) NOT NULL,
  `CIF` varchar(9) DEFAULT NULL,
  `Seq_Dom` decimal(5,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `asociacion`
--

INSERT INTO `asociacion` (`CodAso`, `Descripcion`, `CIF`, `Seq_Dom`) VALUES
(1, 'Perretes sin fronteras', 'A1234567B', 2),
(2, 'Gatetes sin fronteras', 'C2345678B', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domicilio`
--

CREATE TABLE `domicilio` (
  `Seq_Dom` decimal(5,0) NOT NULL,
  `CodTV` decimal(2,0) NOT NULL,
  `NombreVia` varchar(30) NOT NULL,
  `Numero` decimal(3,0) NOT NULL,
  `Piso` decimal(2,0) DEFAULT NULL,
  `Letra` varchar(1) DEFAULT NULL,
  `CodProv` decimal(2,0) NOT NULL,
  `CodLoc` decimal(3,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `domicilio`
--

INSERT INTO `domicilio` (`Seq_Dom`, `CodTV`, `NombreVia`, `Numero`, `Piso`, `Letra`, `CodProv`, `CodLoc`) VALUES
(1, 1, 'Arroyo', 1, 3, 'B', 41, 3),
(2, 1, 'Tramontana', 14, NULL, NULL, 41, 927),
(3, 1, 'Reyes Catolicos', 10, NULL, NULL, 41, 500),
(4, 1, 'Villegas y Marmolejo', 14, 6, 'B', 41, 3),
(5, 1, 'Esperanza de Triana', 8, 2, 'C', 41, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donacion`
--

CREATE TABLE `donacion` (
  `CodDon` decimal(6,0) NOT NULL,
  `Seq_Usuario` decimal(5,0) NOT NULL,
  `CodAso` decimal(5,0) NOT NULL,
  `Importe` decimal(6,2) NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `donacion`
--

INSERT INTO `donacion` (`CodDon`, `Seq_Usuario`, `CodAso`, `Importe`, `Fecha`) VALUES
(1, 2, 2, 50.00, '0000-00-00'),
(2, 3, 2, 10.00, '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidad`
--

CREATE TABLE `localidad` (
  `CodProv` decimal(2,0) NOT NULL,
  `CodLoc` decimal(3,0) NOT NULL,
  `Descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `localidad`
--

INSERT INTO `localidad` (`CodProv`, `CodLoc`, `Descripcion`) VALUES
(41, 3, 'Sevilla'),
(41, 500, 'Alcala de Guadaira'),
(41, 927, 'Mairena');

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
(1, 'Trabajador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE `provincia` (
  `CodProv` decimal(2,0) NOT NULL,
  `Descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`CodProv`, `Descripcion`) VALUES
(41, 'Sevilla');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `raza`
--

CREATE TABLE `raza` (
  `CodRaz` decimal(3,0) NOT NULL,
  `Descripcion` varchar(30) NOT NULL,
  `CodTA` decimal(1,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `raza`
--

INSERT INTO `raza` (`CodRaz`, `Descripcion`, `CodTA`) VALUES
(1, 'Siamés', 1),
(2, 'Persa', 1),
(3, 'Sin raza', 1),
(4, 'Salchicha', 2),
(5, 'Bulldog', 2),
(6, 'Sin raza', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoanimal`
--

CREATE TABLE `tipoanimal` (
  `CodTA` decimal(1,0) NOT NULL,
  `Descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipoanimal`
--

INSERT INTO `tipoanimal` (`CodTA`, `Descripcion`) VALUES
(1, 'Gato'),
(2, 'Perro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipovia`
--

CREATE TABLE `tipovia` (
  `CodTV` decimal(2,0) NOT NULL,
  `Descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipovia`
--

INSERT INTO `tipovia` (`CodTV`, `Descripcion`) VALUES
(1, 'Calle'),
(2, 'Avenida');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Seq_Usuario` decimal(5,0) NOT NULL,
  `DNI` decimal(8,0) DEFAULT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Ap1` varchar(30) NOT NULL,
  `Ap2` varchar(30) DEFAULT NULL,
  `Telefono` decimal(9,0) NOT NULL,
  `Correo` varchar(324) NOT NULL,
  `Password` varchar(130) NOT NULL,
  `CuentaBanco` varchar(20) DEFAULT NULL,
  `CodPer` decimal(1,0) NOT NULL,
  `Seq_Dom` decimal(5,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Seq_Usuario`, `DNI`, `Nombre`, `Ap1`, `Ap2`, `Telefono`, `Correo`, `Password`, `CuentaBanco`, `CodPer`, `Seq_Dom`) VALUES
(1, 12345678, 'Alejandro', 'Escudero', 'Gallardo', 612345678, 'aescudero@gmail.com', '123', NULL, 2, 1),
(2, 23456789, 'David', 'Maraver', 'Ceballos', 623456789, 'maraversillo@hotmail.com', '123', '23452345234523452345', 2, 4),
(3, 34567890, 'Juan', 'Reyes', NULL, 634567890, 'juanreyes@hotmail.com', '123', '12341234123412341234', 2, 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `adopcion`
--
ALTER TABLE `adopcion`
  ADD PRIMARY KEY (`CodAdo`),
  ADD KEY `fk_AdoUsu` (`Seq_Usuario`),
  ADD KEY `fk_AdoAni` (`CodAni`);

--
-- Indices de la tabla `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`CodAni`),
  ADD KEY `fk_AniAso` (`CodAso`),
  ADD KEY `fk_AniRaz` (`CodRaz`);

--
-- Indices de la tabla `asociacion`
--
ALTER TABLE `asociacion`
  ADD PRIMARY KEY (`CodAso`),
  ADD UNIQUE KEY `CIF` (`CIF`),
  ADD KEY `fk_AsoDom` (`Seq_Dom`);

--
-- Indices de la tabla `domicilio`
--
ALTER TABLE `domicilio`
  ADD PRIMARY KEY (`Seq_Dom`),
  ADD KEY `fk_DomLoc` (`CodProv`,`CodLoc`),
  ADD KEY `fk_DomTV` (`CodTV`);

--
-- Indices de la tabla `donacion`
--
ALTER TABLE `donacion`
  ADD PRIMARY KEY (`CodDon`),
  ADD KEY `fk_DonUsu` (`Seq_Usuario`),
  ADD KEY `fk_DonAso` (`CodAso`);

--
-- Indices de la tabla `localidad`
--
ALTER TABLE `localidad`
  ADD PRIMARY KEY (`CodProv`,`CodLoc`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`CodPer`);

--
-- Indices de la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD PRIMARY KEY (`CodProv`);

--
-- Indices de la tabla `raza`
--
ALTER TABLE `raza`
  ADD PRIMARY KEY (`CodRaz`),
  ADD KEY `fk_RazTA` (`CodTA`);

--
-- Indices de la tabla `tipoanimal`
--
ALTER TABLE `tipoanimal`
  ADD PRIMARY KEY (`CodTA`);

--
-- Indices de la tabla `tipovia`
--
ALTER TABLE `tipovia`
  ADD PRIMARY KEY (`CodTV`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Seq_Usuario`),
  ADD UNIQUE KEY `DNI` (`DNI`),
  ADD KEY `fk_UsuPer` (`CodPer`),
  ADD KEY `fk_UsuDom` (`Seq_Dom`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `adopcion`
--
ALTER TABLE `adopcion`
  ADD CONSTRAINT `fk_AdoAni` FOREIGN KEY (`CodAni`) REFERENCES `animal` (`CodAni`),
  ADD CONSTRAINT `fk_AdoUsu` FOREIGN KEY (`Seq_Usuario`) REFERENCES `usuario` (`Seq_Usuario`);

--
-- Filtros para la tabla `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `fk_AniAso` FOREIGN KEY (`CodAso`) REFERENCES `asociacion` (`CodAso`),
  ADD CONSTRAINT `fk_AniRaz` FOREIGN KEY (`CodRaz`) REFERENCES `raza` (`CodRaz`);

--
-- Filtros para la tabla `asociacion`
--
ALTER TABLE `asociacion`
  ADD CONSTRAINT `fk_AsoDom` FOREIGN KEY (`Seq_Dom`) REFERENCES `domicilio` (`Seq_Dom`);

--
-- Filtros para la tabla `domicilio`
--
ALTER TABLE `domicilio`
  ADD CONSTRAINT `fk_DomLoc` FOREIGN KEY (`CodProv`,`CodLoc`) REFERENCES `localidad` (`CodProv`, `CodLoc`),
  ADD CONSTRAINT `fk_DomTV` FOREIGN KEY (`CodTV`) REFERENCES `tipovia` (`CodTV`);

--
-- Filtros para la tabla `donacion`
--
ALTER TABLE `donacion`
  ADD CONSTRAINT `fk_DonAso` FOREIGN KEY (`CodAso`) REFERENCES `asociacion` (`CodAso`),
  ADD CONSTRAINT `fk_DonUsu` FOREIGN KEY (`Seq_Usuario`) REFERENCES `usuario` (`Seq_Usuario`);

--
-- Filtros para la tabla `localidad`
--
ALTER TABLE `localidad`
  ADD CONSTRAINT `fk_LocProv` FOREIGN KEY (`CodProv`) REFERENCES `provincia` (`CodProv`);

--
-- Filtros para la tabla `raza`
--
ALTER TABLE `raza`
  ADD CONSTRAINT `fk_RazTA` FOREIGN KEY (`CodTA`) REFERENCES `tipoanimal` (`CodTA`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_UsuDom` FOREIGN KEY (`Seq_Dom`) REFERENCES `domicilio` (`Seq_Dom`),
  ADD CONSTRAINT `fk_UsuPer` FOREIGN KEY (`CodPer`) REFERENCES `perfil` (`CodPer`);
--
-- Base de datos: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
