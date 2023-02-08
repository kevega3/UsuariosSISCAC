-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-02-2023 a las 21:46:19
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `users_siscac`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `IdArchivo` int(11) NOT NULL,
  `Nombre` varchar(200) NOT NULL,
  `TipoDoc` varchar(15) NOT NULL,
  `Ruta` varchar(100) NOT NULL,
  `FechaSubida` datetime NOT NULL,
  `IdSolicitud` int(11) NOT NULL,
  `Estado` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `archivos`
--

INSERT INTO `archivos` (`IdArchivo`, `Nombre`, `TipoDoc`, `Ruta`, `FechaSubida`, `IdSolicitud`, `Estado`) VALUES
(391, '4.pdf', '4', '../files/2022/09/1015324.pdf', '2022-09-29 10:15:32', 115, ' '),
(392, '1.pdf', '1', '../', '2022-09-29 10:15:32', 115, ''),
(393, '3.pdf', '3', '../files/2022/09/1015323.pdf', '2022-09-29 10:15:32', 115, ' No Cumple'),
(394, '2.pdf', '2', '../files/2022/09/1015322.pdf', '2022-09-29 10:15:32', 115, ' No Cumple'),
(395, '1.pdf', '4', '../files/2022/09/1040401.pdf', '2022-09-29 10:40:40', 116, ' '),
(396, '4.pdf', '1', '../files/2022/09/1040404.pdf', '2022-09-29 10:40:40', 116, ' '),
(397, '2.pdf', '3', '../files/2022/09/1040402.pdf', '2022-09-29 10:40:40', 116, ' '),
(398, '3.pdf', '2', '../files/2022/09/1040403.pdf', '2022-09-29 10:40:40', 116, ' '),
(399, '1.pdf', '4', '../files/2022/09/0536441.pdf', '2022-09-30 05:36:44', 117, ' '),
(400, '4.pdf', '1', '../files/2022/09/0536444.pdf', '2022-09-30 05:36:44', 117, ' '),
(401, '3.pdf', '3', '../files/2022/09/0532263.pdf', '2022-09-30 05:32:26', 117, NULL),
(402, '2.pdf', '2', '../files/2022/09/0536442.pdf', '2022-09-30 05:36:44', 117, ' '),
(403, '1.pdf', '4', '../files/2022/09/0548391.pdf', '2022-09-30 05:48:39', 118, ' '),
(404, '09490320220525_ConTRR_SinTRR (1).xlsx', '1', '../files/2022/10/04120509490320220525_ConTRR_SinTRR (1).xlsx', '2022-10-11 04:12:05', 118, ' '),
(405, '10642955972720220902053.pdf', '3', '../files/2022/10/04120510642955972720220902053.pdf', '2022-10-11 04:12:05', 118, ' '),
(406, '3d391816-fec1-43a7-a59d-25e02e6c178f.pdf', '2', '../files/2022/10/0412053d391816-fec1-43a7-a59d-25e02e6c178f.pdf', '2022-10-11 04:12:05', 118, ' '),
(407, '20220525_ConTRR_SinTRR.xlsx', '1', '../files/2022/10/09490320220525_ConTRR_SinTRR.xlsx', '2022-10-10 09:49:03', 119, ''),
(408, '09490320220525_ConTRR_SinTRR.xlsx', '1', '../files/2022/10/03021409490320220525_ConTRR_SinTRR.xlsx', '2022-10-11 03:02:14', 119, ' '),
(409, '1001299911.pdf', '3', '../files/2022/10/0302141001299911.pdf', '2022-10-11 03:02:14', 119, ' '),
(410, 'ReporteCreados (3).xlsx', '1', '../files/2022/10/063337ReporteCreados (3).xlsx', '2022-10-13 11:33:37', 120, NULL),
(411, '1001299911 (2).pdf', '3', '../files/2022/10/1133371001299911 (2).pdf', '2022-10-13 11:33:37', 120, NULL),
(412, '1001299911.pdf', '2', '../files/2022/10/1133371001299911.pdf', '2022-10-13 11:33:37', 120, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `IdComentario` int(11) NOT NULL,
  `IdSolicitud` int(11) NOT NULL,
  `FechaCreacion` date NOT NULL,
  `Comentario` varchar(10000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`IdComentario`, `IdSolicitud`, `FechaCreacion`, `Comentario`) VALUES
(83, 98, '2022-09-21', '<p>we<strong>wqeqweqw</strong></p><p><strong>qweqweqw</strong></p>'),
(82, 97, '2022-09-21', '<p>Hola </p>'),
(81, 97, '2022-09-21', ''),
(80, 98, '2022-09-15', '<p>asda<strong>sdsa</strong></p><p><br></p><p><strong>asdsadsa</strong></p>'),
(79, 94, '2022-06-08', '<p>qweqwe</p>'),
(78, 95, '2022-06-08', '<p>osoossososos</p>'),
(66, 89, '2022-06-02', '<p>sdasdas</p>'),
(67, 91, '2022-06-02', '<p>sE EASDSAD</p><p>213123</p>'),
(68, 91, '2022-06-02', '<p>wewrew</p>'),
(69, 91, '2022-06-02', '<p>dewqeqweqw</p>'),
(70, 91, '2022-06-02', '<p>sadsadsad</p>'),
(71, 91, '2022-06-02', '<p>wewqewqe</p>'),
(72, 89, '2022-06-02', '<p>wqeqeqwewq</p>'),
(73, 92, '2022-06-02', '<p><span style=\"color: rgb(61, 20, 102);\">WQeqweqweqweqw</span></p><p>qweqweqwe</p>'),
(74, 92, '2022-06-02', '<p>sadasdsa</p>'),
(75, 92, '2022-06-02', '<p>21312321321</p>'),
(76, 92, '2022-06-02', '<p>wqeqwewq</p>'),
(77, 96, '2022-06-08', '<p>El archivo de asignacion de usuarios no corresponde con lo solicitado, porfavor volver a cargarlo.</p>'),
(65, 89, '2022-06-02', '<p>wqeqweqwe</p>'),
(57, 84, '2022-05-31', '<p>qweqwwqewq</p>'),
(58, 84, '2022-05-31', '<p>qweqwwqewq</p>'),
(59, 84, '2022-05-31', '<p>asdsdsad</p>'),
(60, 84, '2022-05-31', '<p>sadsad</p>'),
(61, 84, '2022-05-31', '<p><br></p>'),
(62, 84, '2022-05-31', '<p>asds</p>'),
(52, 85, '2022-05-26', '<p><strong>213213w</strong><strong style=\"background-color: rgb(230, 0, 0);\">qewqewqewq</strong></p>'),
(64, 88, '2022-06-02', '<p>sdasdsa</p>'),
(63, 87, '2022-06-02', '<p>sdadsadasdasdasd</p><p><br></p><blockquote>231231232131232131</blockquote><blockquote><br></blockquote><blockquote><br></blockquote>'),
(53, 86, '2022-05-27', '<p>qweqwewq</p>'),
(54, 86, '2022-05-31', '<p>Prueba #32</p>'),
(55, 86, '2022-05-31', '<p>SAaS</p>'),
(56, 86, '2022-05-31', '<p>SAaS</p>'),
(84, 98, '2022-09-27', '<p>asdasdasdas</p>'),
(85, 100, '2022-09-27', '<p>sss</p>'),
(86, 100, '2022-09-27', '<p>sss</p>'),
(87, 101, '2022-09-27', '<p>asdsadasd</p>'),
(88, 101, '2022-09-27', '<p>AsaS</p>'),
(89, 101, '2022-09-27', '<p>AsaS</p>'),
(90, 101, '2022-09-27', '<p>AsaS</p>'),
(91, 101, '2022-09-27', '<p>AsaS</p>'),
(92, 101, '2022-09-27', '<p>AsaS</p>'),
(93, 101, '2022-09-27', '<p>AsaS</p>'),
(94, 101, '2022-09-27', '<p>AsaS</p>'),
(95, 101, '2022-09-27', '<p>AsaS</p>'),
(96, 101, '2022-09-27', '<p>AsaS</p>'),
(97, 101, '2022-09-27', '<p>AsaS</p>'),
(98, 101, '2022-09-27', '<p>AsaS</p>'),
(99, 101, '2022-09-27', '<p>AsaS</p>'),
(100, 101, '2022-09-27', '<p>AsaS</p>'),
(101, 101, '2022-09-27', '<p>AsaS</p>'),
(102, 101, '2022-09-27', '<p>AsaS</p>'),
(103, 101, '2022-09-27', '<p>AsaS</p>'),
(104, 101, '2022-09-27', '<p>AsaS</p>'),
(105, 101, '2022-09-27', '<p>AsaS</p>'),
(106, 101, '2022-09-27', '<p>AsaS</p>'),
(107, 101, '2022-09-27', '<p>AsaS</p>'),
(108, 101, '2022-09-27', '<p>AsaS</p>'),
(109, 101, '2022-09-27', '<p>AsaS</p>'),
(110, 101, '2022-09-27', '<p>dsfdsfdsfds</p>'),
(111, 101, '2022-09-27', '<p>AsaS</p>'),
(112, 101, '2022-09-27', '<p>lsdldslslsl</p>'),
(113, 101, '2022-09-27', '<p>lsdldslslsl</p>'),
(114, 101, '2022-09-27', '<p>AsaS</p>'),
(115, 101, '2022-09-27', '<p>lsdldslslsl</p>'),
(116, 101, '2022-09-27', '<p>AsaS</p>'),
(117, 101, '2022-09-27', '<p>asdasdas</p>'),
(118, 101, '2022-09-27', '<p>lsdldslslsl</p>'),
(119, 101, '2022-09-27', '<p>asdasdas</p>'),
(120, 101, '2022-09-27', '<p>asdasdas</p>'),
(121, 101, '2022-09-27', '<p>lsdldslslsl</p>'),
(122, 101, '2022-09-27', '<p>asdasdas</p>'),
(123, 101, '2022-09-27', '<p>lsdldslslsl</p>'),
(124, 101, '2022-09-27', '<p>asdasdas</p>'),
(125, 101, '2022-09-27', '<p>lsdldslslsl</p>'),
(126, 101, '2022-09-27', '<p>sad</p>'),
(127, 101, '2022-09-27', '<p>lsdldslslsl</p>'),
(128, 101, '2022-09-27', '<p>sad</p>'),
(129, 101, '2022-09-27', '<p>lsdldslslsl</p>'),
(130, 101, '2022-09-27', '<p>sad</p>'),
(131, 101, '2022-09-27', '<p>lsdldslslsl</p>'),
(132, 101, '2022-09-27', '<p>sad</p>'),
(133, 101, '2022-09-27', '<p>lsdldslslsl</p>'),
(134, 101, '2022-09-27', '<p>sad</p>'),
(135, 101, '2022-09-27', '<p>lsdldslslsl</p>'),
(136, 101, '2022-09-27', '<p>sad</p>'),
(137, 101, '2022-09-27', '<p>lsdldslslsl</p>'),
(138, 101, '2022-09-27', '<p>sad</p>'),
(139, 101, '2022-09-27', '<p>lsdldslslsl</p>'),
(140, 101, '2022-09-27', '<p>sad</p>'),
(141, 101, '2022-09-27', '<p>lsdldslslsl</p>'),
(142, 101, '2022-09-27', '<p>sad</p>'),
(143, 101, '2022-09-27', '<p>lsdldslslsl</p>'),
(144, 101, '2022-09-27', '<p>sad</p>'),
(145, 102, '2022-09-28', '<p>wewewew</p>'),
(146, 112, '2022-09-29', '<p>??d?dd?d?d?</p>'),
(147, 112, '2022-09-29', '<p>123123</p>'),
(148, 113, '2022-09-29', '<p>2321312</p>'),
(149, 112, '2022-09-29', '<p>231312312</p>'),
(150, 112, '2022-09-29', '<p>213213</p>'),
(151, 112, '2022-09-29', '<p>213123</p>'),
(152, 112, '2022-09-29', '<p>h?lhlhl</p>'),
(153, 112, '2022-09-29', '<p><strong>sjdjasjdasjdj</strong></p><p><br></p><p><strong>wqewqewq</strong></p>'),
(154, 115, '2022-09-29', '<p>qweqwewq</p>'),
(155, 115, '2022-09-29', '<p>12321321</p>'),
(156, 116, '2022-09-29', '<p>kas<strong>dsajdsajda</strong></p><p><strong>21312321</strong></p><p><br></p>'),
(157, 117, '2022-09-30', '<p>sajdasjdasjjasjdasj</p>'),
(158, 118, '2022-09-30', '<p>321321qweqw</p>'),
(159, 119, '2022-10-10', '<p>sdasdasdasdas</p>'),
(160, 115, '2022-10-13', '<p>adsdasdas</p>');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `IdEstado` int(11) NOT NULL,
  `Descripcion` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`IdEstado`, `Descripcion`) VALUES
(1, 'REVISAR'),
(2, 'ACEPTADO'),
(3, 'NEGADO'),
(4, 'CREADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `IdSolicitud` int(11) NOT NULL,
  `IdTipoEntidad` int(11) NOT NULL,
  `NIT` varchar(15) NOT NULL,
  `NumVNIT` varchar(2) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `RepresentanteLegal` varchar(100) NOT NULL,
  `Cargo` varchar(100) DEFAULT NULL,
  `Correo` varchar(100) NOT NULL,
  `Telefono` varchar(15) NOT NULL,
  `FechaCreacion` datetime NOT NULL,
  `IdAsignadoA` int(11) NOT NULL,
  `IdEstado` int(11) NOT NULL,
  `CodigoRem` varchar(100) DEFAULT NULL,
  `FechaJuridica` varchar(100) NOT NULL,
  `FechaSISCAC` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `solicitudes`
--

INSERT INTO `solicitudes` (`IdSolicitud`, `IdTipoEntidad`, `NIT`, `NumVNIT`, `Nombre`, `RepresentanteLegal`, `Cargo`, `Correo`, `Telefono`, `FechaCreacion`, `IdAsignadoA`, `IdEstado`, `CodigoRem`, `FechaJuridica`, `FechaSISCAC`) VALUES
(115, 2, '123123', '21', '312321', '3123213', 'N/A', 'kvega@cuentadealtocosto.org', '21321321', '2022-09-29 09:28:12', 1, 3, 'zb6oi', '', ''),
(120, 1, '13123213', '21', '123123', 'Junitoperez', 'N/A', 'kvega@cuentadealtocosto.org', '3114444064', '2022-10-13 06:33:32', 1, 1, NULL, '', ''),
(117, 1, '123123123', '21', '1231232', '213123123', 'N/A', 'kvega@cuentadealtocosto.org', '21312321312', '2022-09-30 05:32:23', 1, 4, '', '2022-10-12 02:57:59', '2022-10-12 03:00:55'),
(118, 1, '232131231', '21', '21312312312', '12321321312', 'N/A', 'kvega@cuentadealtocosto.org', '21312321312', '2022-09-30 05:43:07', 1, 2, '', '2022-10-12 07:22:18', ''),
(119, 1, '312321', '12', '213123', 'kevinsvega', 'N/A', 'kvega@cuentadealtocosto.org', '21312312312', '2022-10-10 09:48:59', 1, 2, '', '2022-09-30 05:32:23', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoentidad`
--

CREATE TABLE `tipoentidad` (
  `IdTipoEntidad` int(11) NOT NULL,
  `DescripcionEntidad` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipoentidad`
--

INSERT INTO `tipoentidad` (`IdTipoEntidad`, `DescripcionEntidad`) VALUES
(1, 'IPS'),
(2, 'EAPB');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `token_au`
--

CREATE TABLE `token_au` (
  `IdToken` int(11) NOT NULL,
  `Token` varchar(100) NOT NULL,
  `NombreEntidad` varchar(100) NOT NULL,
  `CorreoNotificador` varchar(100) NOT NULL,
  `NombreNotifiador` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `token_au`
--

INSERT INTO `token_au` (`IdToken`, `Token`, `NombreEntidad`, `CorreoNotificador`, `NombreNotifiador`) VALUES
(30, 'ÑLÑLSWS_[}', 'Prueba1', 'kvega@cuentadealtocosto.org', 'Prueba'),
(31, 'ÑLÑLSWS_[}', 'Comensar221312', 'kvega@cuentadealtocosto.org', 'SICAC'),
(32, 'asdsad', 'SISCAC', 'kvega@cuentadealtocosto.org', 'SICAC'),
(33, 'ÑLÑLSWS_[}', 'Comensar2', 'kvega@cuentadealtocosto.org', 'nombre'),
(34, 'ÑLÑLSWS_[}', 'Prueba1', 'kvega@cuentadealtocosto.org', 'Prueba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `IdUsuario` int(11) NOT NULL,
  `CC` varchar(50) DEFAULT NULL,
  `NombreCompleto` varchar(150) NOT NULL,
  `Clave` varchar(250) NOT NULL,
  `TipoUser` varchar(50) DEFAULT NULL,
  `Correo` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`IdUsuario`, `CC`, `NombreCompleto`, `Clave`, `TipoUser`, `Correo`) VALUES
(6, '1026587992', 'Maria Camila Becerra', '159bf3bb0232c77664cdc718b089c1eb', 'Juridica', 'kvega@cuentadealtocosto.org'),
(21, '123123123', 'Maria Helena Barrera', '159bf3bb0232c77664cdc718b089c1eb', 'CAC', 'kvega@cuentadealtocosto.org\r\n'),
(22, '1111111', 'Lucia Torres', 'miClave', 'Admin', 'kvega@cuentadealtocosto.org');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`IdArchivo`),
  ADD KEY `IdSolicitud` (`IdSolicitud`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`IdComentario`),
  ADD KEY `IdSolicitud` (`IdSolicitud`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`IdEstado`);

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD PRIMARY KEY (`IdSolicitud`),
  ADD KEY `IdTipoEntidad` (`IdTipoEntidad`),
  ADD KEY `IdAsignadoA` (`IdAsignadoA`),
  ADD KEY `IdEstado` (`IdEstado`);

--
-- Indices de la tabla `tipoentidad`
--
ALTER TABLE `tipoentidad`
  ADD PRIMARY KEY (`IdTipoEntidad`);

--
-- Indices de la tabla `token_au`
--
ALTER TABLE `token_au`
  ADD PRIMARY KEY (`IdToken`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IdUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivos`
--
ALTER TABLE `archivos`
  MODIFY `IdArchivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=413;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `IdComentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `IdEstado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  MODIFY `IdSolicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT de la tabla `tipoentidad`
--
ALTER TABLE `tipoentidad`
  MODIFY `IdTipoEntidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `token_au`
--
ALTER TABLE `token_au`
  MODIFY `IdToken` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
