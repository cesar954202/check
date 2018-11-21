-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-07-2018 a las 11:37:03
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `check`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_pantallas`
--

CREATE TABLE `estado_pantallas` (
  `id_pantalla` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `hora_cliente` varchar(20) NOT NULL,
  `date_actualizacion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado_pantallas`
--

INSERT INTO `estado_pantallas` (`id_pantalla`, `nombre`, `ip`, `hora_cliente`, `date_actualizacion`) VALUES
(1, 'DESTILADO', '172.17.53.145', '2018-07-19 11:36:56', '2018-07-19 16:36:56'),
(3, 'AGAVE I', '172.17.53.137', '2018-07-19 11:36:12', '2018-07-19 16:36:12'),
(4, 'AGAVE II', '172.17.53.133', '2018-07-19 11:36:59', '2018-07-19 16:36:59'),
(5, 'ARENAL', '172.17.53.151', '2018-07-19 11:36:07', '2018-07-19 16:36:07'),
(6, 'ANALCO', '172.17.53.130', '2018-07-19 11:36:28', '2018-07-19 16:36:28'),
(7, 'ARANDAS', '172.17.53.132', '2018-07-19 11:36:35', '2018-07-19 16:36:35'),
(8, 'DAMAJUANA', '172.17.53.140', '2018-07-19 11:36:26', '2018-07-19 16:36:26'),
(9, 'BARRICA', '172.17.53.135', '2018-07-19 11:37:03', '2018-07-19 16:37:03'),
(10, 'CAVA', '172.17.53.142', '2018-07-19 11:36:56', '2018-07-19 16:36:56'),
(11, 'MEXCALLI', '172.17.53.149', '2018-07-19 11:36:34', '2018-07-19 16:36:34'),
(12, 'MAGUEY', '172.17.53.138', '2018-07-19 11:36:16', '2018-07-19 16:36:16'),
(13, 'MOSTO', '172.17.53.152', '2018-07-19 11:36:27', '2018-07-19 16:36:27'),
(14, 'DIRECTORIO EVENTOS COLUMNAS', '172.17.53.146', '2018-07-19 11:34:38', '2018-07-19 16:34:38'),
(15, 'PANTALLA GRUPOS', '172.17.53.129', '2018-07-19 11:34:55', '2018-07-19 16:34:55'),
(16, 'PANTALLA BAR', '172.17.53.180', '2018-07-19 11:34:48', '2018-07-19 16:34:48'),
(17, 'CANAL 51', '10.156.113.181', '2018-07-19 11:34:17', '2018-07-19 16:34:17'),
(18, 'DIRECTORIO EVENTOS P11', '10.156.113.174', '2018-07-19 11:35:06', '2018-07-19 16:35:06'),
(19, 'TEQ_DER_BLANCO', '10.156.113.117', '2018-07-19 11:35:34', '2018-07-19 16:35:34'),
(20, 'TEQ_IZQ_REPOSADO', '10.156.113.46', '2018-07-19 11:35:20', '2018-07-19 16:35:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros_espacio`
--

CREATE TABLE `registros_espacio` (
  `id_Respacio` int(11) NOT NULL,
  `id_unidad` int(11) NOT NULL,
  `espacioLibre` bigint(100) NOT NULL,
  `observacion` varchar(70) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `registros_espacio`
--

INSERT INTO `registros_espacio` (`id_Respacio`, `id_unidad`, `espacioLibre`, `observacion`, `date`) VALUES
(1, 1, 30750146560, 'OK', '2018-07-19 16:33:52'),
(2, 2, 454283022336, 'OK', '2018-07-19 16:33:52'),
(3, 3, 1353994551296, 'OK', '2018-07-19 16:33:52'),
(4, 4, 233020571648, 'OK', '2018-07-19 16:33:52'),
(5, 5, 83908775936, 'OK', '2018-07-19 16:33:52'),
(6, 6, 289881403392, 'OK', '2018-07-19 16:33:52'),
(7, 7, 178914279424, 'OK', '2018-07-19 16:33:52'),
(8, 8, 227681259520, 'OK', '2018-07-19 16:33:52'),
(9, 9, 221840527360, 'OK', '2018-07-19 16:33:52'),
(10, 10, 114179649536, 'OK', '2018-07-19 16:33:52'),
(11, 11, 207383334912, 'OK', '2018-07-19 16:33:52'),
(12, 12, 241081298944, 'OK', '2018-07-19 16:33:52'),
(13, 13, 428298977280, 'OK', '2018-07-19 16:33:52'),
(14, 14, 971120640, 'OK', '2018-07-19 16:33:52'),
(15, 15, 427471159296, 'OK', '2018-07-19 16:33:52'),
(16, 16, 1310543872, 'OK', '2018-07-19 16:33:52'),
(17, 17, 45171712, 'OK', '2018-07-19 16:33:52'),
(18, 18, 129187573760, 'OK', '2018-07-19 16:33:52'),
(19, 19, 8811806720, 'OK', '2018-07-19 16:33:52'),
(20, 20, 223243509760, 'OK', '2018-07-19 16:33:52'),
(21, 21, 1289048064, 'OK', '2018-07-19 16:33:52'),
(22, 22, 67275776, 'OK', '2018-07-19 16:33:52'),
(23, 23, 61883576320, 'OK', '2018-07-19 16:33:52'),
(24, 0, 0, 'No existe el archivo resultado', '2018-07-19 16:33:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros_reinicios`
--

CREATE TABLE `registros_reinicios` (
  `id_Rdias` int(11) NOT NULL,
  `id_servidor` int(11) NOT NULL,
  `ultimo_reinicio` varchar(70) NOT NULL,
  `dias` int(11) NOT NULL,
  `observacion` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `registros_reinicios`
--

INSERT INTO `registros_reinicios` (`id_Rdias`, `id_servidor`, `ultimo_reinicio`, `dias`, `observacion`, `date`) VALUES
(1, 7, 'Tiempo de arranque del sistema:            25/05/2018, 12:04:29 p.m.\r\n', 55, 'OK', '2018-07-19 16:33:52'),
(2, 8, 'Tiempo de arranque del sistema:            25/05/2018, 12:08:41 p.m.\r\n', 55, 'OK', '2018-07-19 16:33:52'),
(3, 10, 'Tiempo de arranque del sistema:            17/07/2018, 05:41:38 p.m.\r\n', 2, 'OK', '2018-07-19 16:33:52'),
(4, 11, 'Tiempo de arranque del sistema:            31/03/2018, 11:10:08 a.m.\r\n', 110, 'OK', '2018-07-19 16:33:52'),
(5, 12, 'Tiempo de arranque del sistema:            14/07/2018, 09:49:32 a.m.\r\n', 5, 'OK', '2018-07-19 16:33:52'),
(6, 13, 'Tiempo de arranque del sistema:            28/02/2018, 05:15:23 a.m.\r\n', 141, 'OK', '2018-07-19 16:33:52'),
(7, 15, 'Tiempo de arranque del sistema:            18/07/2018, 07:23:51 a.m.\r\n', 1, 'OK', '2018-07-19 16:33:52'),
(8, 16, 'Tiempo de arranque del sistema:            17/07/2018, 05:26:06 p.m.\r\n', 2, 'OK', '2018-07-19 16:33:52'),
(9, 17, 'Tiempo de arranque del sistema:            19/07/2018, 09:01:38 a.m.\r\n', 0, 'OK', '2018-07-19 16:33:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servidores`
--

CREATE TABLE `servidores` (
  `id_servidor` int(30) UNSIGNED NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `ip` varchar(30) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `estatus_ping` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `servidores`
--

INSERT INTO `servidores` (`id_servidor`, `nombre`, `ip`, `usuario`, `pass`, `estatus_ping`) VALUES
(7, 'SRVGDLPMS01', '10.156.113.12', '.\\dg', 'pr3s1d3nt3', 0),
(8, 'SRVGDLDG01', '10.156.113.11', '.\\dg', 'pr3s1d3nt3', 0),
(10, 'SRVGDLPOS01', '10.156.113.52', '.\\administrator', 'Micros97oo', 0),
(11, 'GDL_INTERFACES', '10.156.113.161', 'mexhadmn\\gdlha_interface', 'pr3s1d3nt3', 0),
(12, 'SRVGDLTAR', '10.156.113.47', 'mexhadmn\\gdlha_tarificador', 'Reservaciones18', 0),
(13, 'SRVGDLVINGCARD', '10.156.113.45', '.\\administrador', 'pr3s1d3nt3', 0),
(15, 'SRVGDLSVT01', '10.156.113.162', '.\\administrador', 'pr3s1d3nt3', 0),
(16, 'SRVGDLWSUS', '10.156.113.112', '.\\administrador', 'pr3s1d3nt3', 0),
(17, 'GDLHA_OPERADORA', '10.156.113.192', '.\\administrador', 'pr3s1d3nt3', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidades`
--

CREATE TABLE `unidades` (
  `id_unidad` int(11) NOT NULL,
  `id_servidor` int(11) NOT NULL,
  `letra` varchar(11) NOT NULL,
  `capacidad` bigint(100) NOT NULL,
  `porcentajeMAX` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `unidades`
--

INSERT INTO `unidades` (`id_unidad`, `id_servidor`, `letra`, `capacidad`, `porcentajeMAX`) VALUES
(1, 7, 'C', 107374178304, 20),
(2, 7, 'D', 858993455104, 20),
(3, 7, 'G', 2000396742656, 20),
(4, 7, 'Z', 233388896256, 20),
(5, 8, 'C', 107373129728, 20),
(6, 8, 'D', 590557999104, 20),
(7, 8, 'Z', 201859264512, 20),
(8, 10, 'C', 298988892160, 20),
(9, 10, 'D', 298997116928, 20),
(10, 10, 'F', 500104687616, 20),
(11, 11, 'C', 256472453120, 20),
(12, 11, 'D', 242557890560, 20),
(13, 12, 'C', 491050233856, 20),
(14, 12, 'D', 8841588736, 9),
(15, 13, 'C', 487076405248, 20),
(16, 13, 'D', 11852627968, 10),
(17, 13, 'E', 88985600, 20),
(18, 15, 'C', 149280571392, 20),
(19, 15, 'D', 10742214656, 20),
(20, 16, 'C', 254367440896, 20),
(21, 16, 'D', 11834802176, 9),
(22, 16, 'E', 100663296, 20),
(23, 16, 'G', 232717807616, 20);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estado_pantallas`
--
ALTER TABLE `estado_pantallas`
  ADD PRIMARY KEY (`id_pantalla`);

--
-- Indices de la tabla `registros_espacio`
--
ALTER TABLE `registros_espacio`
  ADD PRIMARY KEY (`id_Respacio`);

--
-- Indices de la tabla `registros_reinicios`
--
ALTER TABLE `registros_reinicios`
  ADD PRIMARY KEY (`id_Rdias`);

--
-- Indices de la tabla `servidores`
--
ALTER TABLE `servidores`
  ADD PRIMARY KEY (`id_servidor`);

--
-- Indices de la tabla `unidades`
--
ALTER TABLE `unidades`
  ADD PRIMARY KEY (`id_unidad`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estado_pantallas`
--
ALTER TABLE `estado_pantallas`
  MODIFY `id_pantalla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `registros_espacio`
--
ALTER TABLE `registros_espacio`
  MODIFY `id_Respacio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `registros_reinicios`
--
ALTER TABLE `registros_reinicios`
  MODIFY `id_Rdias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `servidores`
--
ALTER TABLE `servidores`
  MODIFY `id_servidor` int(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `unidades`
--
ALTER TABLE `unidades`
  MODIFY `id_unidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
