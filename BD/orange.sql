-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-02-2022 a las 00:20:31
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `orange2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abonos`
--

CREATE TABLE `abonos` (
  `id_abono` int(10) NOT NULL,
  `fkID_ingreso` int(10) NOT NULL,
  `fecha_abono` date NOT NULL,
  `valor_abono` double NOT NULL,
  `obs_abono` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` int(1) DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `id_cargo` int(11) NOT NULL,
  `nombre_cargo` varchar(45) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id_cargo`, `nombre_cargo`, `estado`) VALUES
(1, 'GERENTE', 1),
(2, 'ASISTENTE', 1),
(5, 'SECRETARIA', 1),
(7, 'ASEO', 1),
(9, 'PRUEBA', 2),
(10, 'CONTADORA', 1),
(11, 'ASESOR', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(3) NOT NULL,
  `nombre_categoria` varchar(100) NOT NULL,
  `estado` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre_categoria`, `estado`) VALUES
(2, 'MANTENIMIENTO DE COMPUTADORES', 1),
(3, 'DESARROLLO DE SOFTWARE', 1),
(4, 'APLICACIONES MOVILES', 1),
(5, 'PAGINAS WEB', 1),
(6, 'TIENDAS VIRTUALES', 1),
(7, 'SEO Y SEM', 1),
(8, 'E-LEARNING', 1),
(9, 'IMAGEN CORPORATIVA', 1),
(10, 'TIENDA ONLINE', 1),
(11, 'prueba', 2),
(12, 'pruebas', 2),
(13, '', 2),
(14, 'PRUEBA', 2),
(15, 'PRUEBAS', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(4) NOT NULL,
  `nombres_cliente` varchar(100) NOT NULL,
  `apellidos_cliente` varchar(100) NOT NULL,
  `documento_cliente` varchar(100) NOT NULL,
  `rsocial_cliente` varchar(100) NOT NULL,
  `direccion_cliente` varchar(200) NOT NULL,
  `telefono_cliente` varchar(20) NOT NULL,
  `email_cliente` varchar(300) NOT NULL,
  `celular_cliente` varchar(100) NOT NULL,
  `web_cliente` varchar(200) NOT NULL,
  `estado` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombres_cliente`, `apellidos_cliente`, `documento_cliente`, `rsocial_cliente`, `direccion_cliente`, `telefono_cliente`, `email_cliente`, `celular_cliente`, `web_cliente`, `estado`) VALUES
(1, 'Ivone Natalia ', 'Garrido Zafra', '900431381-5', 'Soluciones tecnológicas  comerciales y de servicios S.A.S', 'calle 28 n 22- 39 local 01 Edificio Montagrande ', '6999066', 'ivonnegarrido@hotmail.com gerencia@solucionestcs.com', '3175738020    3175738025', 'www.solucionestcs.com', 1),
(2, 'Alejando ', 'Burgos ', '', '', '', '', 'virtualdesign.eyp@gmail.com', '3134785277', '', 1),
(3, 'Cherry', '', '', 'Centro Comercial Mazuren', ' Carrera 46 # 152-46', '274 46640 - 2742387', 'info@mazuren.com', '3182684866', 'http://www.mazurencentrocomercial.com/', 1),
(4, 'Carolina ', 'Endara Gomez', '830137836- 0', 'Carolina Endara S.A.S ', ' CARRERA 58 127 59 LOCAL 208', '7020837', 'carolinaendara2012@yahoo.com.co  carolinaendaraoficial@gmail.com', '3108711097 - 319 3105345', 'https://www.instagram.com/carolina.endara/ caroloniaendaraoficial. ', 1),
(5, 'Angeles', '', '', '', '', '', '', '3185121113', '', 1),
(6, 'Jorge', 'Monsalvo', '900295609-5', 'ANTS GROUP LTDA', 'CALLE 161 12 B 30', '', 'jorge.monsalvo@antsg.com contabilidad@antsg.com', '3124269567', '', 1),
(7, 'Pilar ', 'Uricoechea Williamson', '900.345.953-1', 'Ortopédicos WYW SAS', 'Carrera 13 A N', '', 'contabilidadwyw@gmail.com  ventaswyw@gmail.com', '3203456416       316 645 3088', 'www.ortopedicoswyw.com/', 1),
(8, 'Raul', 'Ballesteros ', '', 'Novaevents', '', '', 'raulballesteros@novaevents.com.co', '3143538277', '', 1),
(9, 'Monica', 'Lopez ', '900544688-6 ', 'NEURONA BEBE S.A.S', 'Calle 73 # 20C -53  ', '3838490', 'monica.lopez@neuronabebe.com administracion@neuronabebe.com', '3214884189', 'www.neuronabebe.com', 1),
(10, 'Claudia ', '', '901254371-6', 'Hidrosystems S&D SAS', 'CRA 46 # 167 -21 OF 402', '', 'hidrosystems.sd@gmail.com', '3504222620', '9:00 a.', 1),
(11, 'Roberto ', 'Rios ', '', '', '', '', '', '3102386810', '', 1),
(12, 'Humberto ', '', '', 'San Nicolas ', '', '', '', '322 2481136', '', 1),
(13, 'Nestor ', '', 'calle 34 ', 'Cencafe', '', '', '', '3103016572', '', 1),
(14, 'Yeraldine ', 'Prieto Roa', '', 'Variedades y accesorios Praga ', '', '', 'yeraldinprieto@gmail.com variedadespraga2020@gmail.com ', '3507404400', 'https://www.instagram.com/variedadespraga2020/?hl=es-la', 1),
(15, 'Andrea', 'Amiga Niyi', '', '', '', '', '', '3134577698', '', 1),
(16, 'Ricardo', 'Tuta', '', '', '', '', 'uno7publicidad@gmail.com', '3212034884', '', 1),
(17, 'Arturo', 'Leguizamon', '4164169-4', 'Drogueria  Punto Once ', 'CLLA 11 A 73 A - 41 ', '2921812', 'arturo06leguizamo@gmail.com ', '3214073866', '', 1),
(18, 'Hector', 'Oscar', '1012358542-0', 'Instant Mail ', 'CRA 20# 16-10', '', 'instantmailcorreo@gmail.com', '3107700611   3125137846', 'www.instantmailmensajeria.com', 1),
(19, 'Jackeline', 'Amiga Niyi', '', '', '', '', '', '313 4199885', '', 1),
(20, 'William Alexander', 'Marin Huertas', '', '', '', '', 'willis_alex@hotmail.com', '3213211871', '', 1),
(21, 'William', 'Franco', '900629634-5', 'ATLANTIC CORP S.A.S ', 'CALLE 121 n 50 - 76', '', 'Wfranco@meridian.com.co  info@atlanticcorp.co', '3138174046  301242422', 'www.atlanticcorp.co', 1),
(22, 'Ruben', 'Sarmiento', '900163263-4', 'Effort Colombia', 'CARRERA 24 63 A 56', '7040789', 'ruben.sarmiento@effortcolombia.com', '3013983899', 'https://effortcolombia.com/', 1),
(23, 'David', '', '', 'Influencia Astral', '', '', '', '3115335956', '', 1),
(24, 'Alexander', 'VARGAS', '80436081-1', 'DISEÑO Y ALUMINIO AV', 'Cra 14i#136sur 90 usme pueblo', '9416727', '  Carpinteríaenaluminioyvidrio@gmail.com    aluminioav@gmail.com', '3108139707', 'www.carpinteriaenaluminioyvidrio.com ', 1),
(25, 'Nora', 'Moreno Moreno ', '900341689-1', 'Well Services SAS', 'calle 67 n 7 - 94 oficina 2004', '8104261', ' nmoreno@wellservices.co wfranco@meridian.com.co ', '3138174046/ 3134844336', '', 1),
(26, 'Wilmer', '', '', '', '', '', '', '312 8227408', '', 1),
(27, 'Alejandra', '', '', '', '', '', '', '3214306569', '', 1),
(28, 'Angie', 'Oliveros', '', '', '', '', '', '321 9241767', '', 1),
(29, 'Wilmer', '', '', '', '', '', '', '', '', 2),
(30, 'Wilmer', '', '', '', '', '', '', '', '', 2),
(31, 'Fernanda', '', '', '', '', '', '', '311 5884687', '', 1),
(32, 'Jhonatan ', 'Salcedo', '900741012-2', 'Construlok S.A.S', 'CARRERA 98 C 55 32 SUR', '5753197', 'comercial@construlok.com.   gerencia@construlok.com', '3014839275', 'www.construlok.com', 1),
(33, 'Andres', 'Rodriguez  Dallos', '', '', 'cra 50 N152-20 ', '', 'dallosdg@gamil.com', '3138533814', '', 1),
(34, 'Supermercado', '', '', '', '', '', '', '', '', 1),
(35, 'Adrian', 'Manrique', '901236688-9 ', 'Yelroy S.A.S', 'cra 86 d n 51 b 84 sur', '7421511', 'yelroyrop@gmail.com', '3003959568', 'www.yelroy.com', 1),
(38, 'Daniela ', 'Gonzales ', '900692338-7 ', 'IPv6 Technology sas', 'Calle 20 n 82-52 Ofina 402', '8051435', 'gestion@ipv6technology.co', '3016960584', '', 1),
(39, 'prueba', 'prueba', '123', 'prueba', 'prueba', 'prueba', 'prueba', 'prueba', 'prueba', 2),
(40, 'Prueba ', '', '', '', '', '', '', '123', '', 2),
(41, 'Rafael Eduardo ', 'Opina Diaz', '900362022-1', 'MENNTUN SAS', 'Calle104 No. 14A - 45 - Oficina 205', '6230948', 'adminitrativa@menntun.com.co', '3006723203', 'http://menntun.co/', 1),
(42, 'Paola', '', '', '', '', '', '', '314 3140858', '', 1),
(43, 'Diana', '', '', '', '', '', '', '311 8246818', '', 1),
(44, 'Julio ', 'Buitrago', '', '', '', '', 'JBUITRAGOCH@HOTMAIL.COM', '3108738132', '', 1),
(45, 'William', 'Franco', '', 'AGREGADOS GEODA', '', '', '', '313 8174046', '', 1),
(46, 'William', 'Franco', '', '', '', '', 'AGREGADOS GEODA', '313 8174046', '', 2),
(47, 'Nelson Camilo', '', '', '', '', '', '', '3108538678', '', 1),
(48, 'Lizardo ', 'CASTRO PUENTES', '', '', '', '', '', '3007610678', '', 1),
(49, 'EDUIN Camilo ', 'Restrepo', '', '', '', '', '', '318 2512341', '', 1),
(50, 'Brayan ', '', '', '', '', '', '', '313 4161572', '', 1),
(51, 'Diego ', 'Rodriguez', '', '', '', '', '', '301 7954497', '', 1),
(52, 'Natalia', 'Lucumi', '', '', '', '', '', '9512324772', '', 1),
(53, 'Johan', '', '', '', '', '', '', '3229441132', '', 1),
(54, 'Maria Alejandra', 'Pardo', '', '', '', '', '', '3504606877', '', 1),
(55, ' Andrés Javier ', 'COMBITA GONZÁLEZ', '1030588655', '', '', '', '', '311 8110330', '', 1),
(56, 'Javier', 'Chaves Castro', '79963507', '', '', '', '', '3012477422', '', 1),
(57, 'Alexander', 'Aldana ', '1019028225', '', '', '', '', '3115373735', '', 1),
(58, 'Jhon Edisson', 'Chavarro', '1032440629', '', '', '', '', '3165184827', '', 1),
(59, 'Angel Andres', 'Ponton Henao', '1022382579', '', '', '', '', '3102230392', '', 1),
(60, 'Cristian Humberto', 'Avila Pineda', '1056029664', '', '', '', '', '3057456652', '', 1),
(61, 'Camila', 'Villamil', '1016033630', '', '', '', '', '3183761991', '', 1),
(62, 'Neison Camilo', 'Chavarro Fique', '1032429150', '', '', '', '', '3108538678', '', 1),
(63, 'BRAYAN', 'Cuesta', '1033805097', '', '', '', '', '010101010101', '', 1),
(64, 'Yair', 'virguez', '', '', '', '', '', '3202306166', '', 1),
(65, 'prueba', 'usuario', '123', '', '', '', 'correo@gmail.com', '1234567890', '', 2),
(66, 'prueba', '', '123', '', '', '', 'correo@gmail.com', '3108139707', '', 2),
(67, 'prueba', '', '123', '', '', '', 'Carpinteria', '3108139707', '', 2),
(68, 'prueba', '', '123', '', '', '', 'Carpinteria@gmail.com', '3108139707', '', 2),
(69, 'prueba', '', '1234', '', '', '', 'Carpinteria@gmail.com', '3108139707', '', 2),
(70, 'prueba', '', '123', '', '', '', 'Carpinteria@gmail.com', '1234567890', '', 2),
(71, 'prueba', '', '123', '', '', '', 'Carpinteria@gmail.com', '3108139707', '', 2),
(72, 'prueba', '', '123', '', '', '', 'Carpinteria@gmail.com', '3108139707', '', 2),
(73, 'prueba', '', '123', '', '', '', 'Carpinteria@gmail.com', '3108139707', '', 2),
(74, 'prueba', '', '123', '', '', '', 'Carpinteria@gmail.com', '3108139707', '', 2),
(75, 'prueba', '', '', '', '', '', '', '1234567890', '', 2),
(76, 'prueba', 'dadlLLL', '123', 'dDS', '', '', 'Carpinteria@gmail.com', '1234567890', '', 2),
(77, 'prueba', 'VARGAS VARGAS', '123', '', '', '', 'Carpinter', '3108139707', '', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `concepto`
--

CREATE TABLE `concepto` (
  `id_concepto` int(3) NOT NULL,
  `nombre_concepto` varchar(100) NOT NULL,
  `estado` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `concepto`
--

INSERT INTO `concepto` (`id_concepto`, `nombre_concepto`, `estado`) VALUES
(2, 'MANTENIMIENTO DE COMPUTADORES', 1),
(3, 'DESARROLLO DE SOFTWARE', 1),
(4, 'APLICACIONES MOVILES', 1),
(5, 'PAGINAS WEB', 1),
(6, 'TIENDAS VIRTUALES', 1),
(7, 'SEO Y SEM', 1),
(8, 'E-LEARNING', 1),
(9, 'IMAGEN CORPORATIVA', 1),
(11, 'CONTABILIDAD', 1),
(12, 'ADMINISTRATIVO', 1),
(13, 'LEGAL', 1),
(14, 'SERVICIO STREAMING', 1),
(15, 'CELULAR', 1),
(16, 'TRANSPORTE', 1),
(17, 'TIENDA ONLINE', 1),
(18, 'PAPELERIA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id_contacto` int(4) NOT NULL,
  `nombres_contacto` varchar(100) NOT NULL,
  `apellidos_contacto` varchar(100) NOT NULL,
  `fkID_cargo` int(4) NOT NULL,
  `fkID_cliente` int(4) NOT NULL,
  `email_contacto` varchar(200) NOT NULL,
  `celular_contacto` varchar(100) NOT NULL,
  `estado` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id_contacto`, `nombres_contacto`, `apellidos_contacto`, `fkID_cargo`, `fkID_cliente`, `email_contacto`, `celular_contacto`, `estado`) VALUES
(5, 'DIEGO', 'MARINS', 2, 1, 'CORREO@GMAIL.COM.CO', '300240', 2),
(6, 'DANIEL', '?', 1, 7, '', '12341234123', 2),
(7, 'NORA', 'Moreno ', 1, 25, ' nmoreno@wellservices.co', '3134844336', 1),
(8, 'Daniel', 'SALCEDO ', 2, 7, 'ventaswyw@gmail.com', '320 8187611', 1),
(9, 'Heissis ', 'WILLIAMS ', 2, 4, 'carolinaendaraoficial@gmail.com', '321 7247976', 1),
(10, 'Maria Camila', '', 2, 9, 'monica.lopez@neuronabebe.com administracion@neuronabebe.com', '3057132462', 1),
(11, 'esposa hector', '', 1, 18, 'instantmailcorreo@gmail.com', '3203563040', 1),
(12, 'Esposa CONSTRULOK', '', 1, 32, 'comercial@construlok.com.   gerencia@construlok.com', '3142568434', 1),
(13, 'Ricardo ', 'Tuta', 2, 22, 'ricardotuta@hotmail.com', '321 2034884', 1),
(14, 'Diana ', 'GUERREIRO ', 5, 41, 'administrativa@menntun.com.co', '3224132781', 1),
(15, 'Alexander', '', 2, 41, '', '3008676420', 1),
(16, 'VALENTINA', 'Venegas Padilla', 2, 41, 'valentina.venegas@menntun.com.co', '3164616342', 1),
(17, 'Luz ', 'San Juaquin', 5, 12, '', '313 4892440', 1),
(18, 'Paola', '', 2, 12, '', '312 3539267', 1),
(19, 'fonseca', '', 2, 38, '', '3166251566', 1),
(20, 'Monica', '', 2, 38, '', '3022518813', 1),
(21, 'prueba', '', 7, 55, '', '1234567890', 2),
(22, 'prueba', '', 10, 75, '', '1234567890', 2),
(23, 'prueba', '', 7, 63, '', '1234567890', 2),
(24, 'prueba', '', 7, 4, '', '1234567890', 2),
(25, 'prueba', '', 7, 63, '', '1234567890', 2),
(26, 'prueba', '', 7, 55, 'correo@gmail.com', '1234567890', 2),
(27, 'prueba', '', 7, 61, '', '1234567890', 2),
(28, 'prueba', '', 11, 61, '', '1234567890', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas_cobro`
--

CREATE TABLE `cuentas_cobro` (
  `id` int(11) NOT NULL,
  `ciudad` varchar(100) NOT NULL,
  `fecha` varchar(250) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `cedula` varchar(20) NOT NULL,
  `valor` varchar(100) NOT NULL,
  `concepto` varchar(250) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `formas_pago` varchar(250) NOT NULL,
  `estado` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cuentas_cobro`
--

INSERT INTO `cuentas_cobro` (`id`, `ciudad`, `fecha`, `nombre`, `cedula`, `valor`, `concepto`, `celular`, `formas_pago`, `estado`) VALUES
(1, 'fusagasuga', '2022-02-19', 'camilo ballesteros', '12345', '90000', 'desarrollo web', '12345', 'nequi', 2),
(2, 'fghfghg', '2022-02-10', 'gfhgfh', '12345', '90000', 'fbcb', '12345', 'cvbcvb', 2),
(3, 'fusagasuga', '2022-02-07', 'camilo ballesteros villalba', '12345', '90000', 'desarrollo web', '12345', 'nequi', 2),
(4, 'fusagasuga', '2022-02-07', 'camilo ballesteros villalba', '12345', '90000', 'desarrollo web', '12345', 'nequi', 2),
(5, 'fusagasuga', '2022-02-07', 'camilo ballesteros villalba', '12345', '90000', 'desarrollo web', '12345', 'nequi', 2),
(6, 'Abejorral - Antioquia', '2022-02-11', 'camilo ballesteros', '12345', '90000', 'dfgdf', '12345', 'nequi', 2),
(7, 'Fusagasugá - Cundinamarca', '2022-02-24', 'dfgdfgfd123', 'ghjhgj', '90000', 'dgfdfg', '12345', 'nequi', 2),
(8, 'Aguachica', '2022-02-23', 'camilo ballesteros', '12345', '90000', 'ghgfhgfh', '12345', 'nequi', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `egresos`
--

CREATE TABLE `egresos` (
  `id_egreso` int(5) NOT NULL,
  `fecha_egreso` date NOT NULL,
  `fkID_proveedor` int(5) NOT NULL,
  `fkID_concepto` int(4) NOT NULL,
  `descripcion_egreso` varchar(200) NOT NULL,
  `valor_egreso` double NOT NULL,
  `abono_egreso` double NOT NULL,
  `saldo_egreso` double NOT NULL,
  `estado` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `egresos`
--

INSERT INTO `egresos` (`id_egreso`, `fecha_egreso`, `fkID_proveedor`, `fkID_concepto`, `descripcion_egreso`, `valor_egreso`, `abono_egreso`, `saldo_egreso`, `estado`) VALUES
(1, '2020-09-25', 1, 2, 'TARJETAS', 40, 20, 20, 2),
(2, '2018-12-01', 2, 9, 'Diseños documentacion Kronos', 30000, 30000, 0, 1),
(3, '2018-12-04', 2, 9, 'Video Soluciones TCS', 30000, 30000, 0, 1),
(4, '2019-05-28', 2, 9, 'Diseños documentacion Kronos', 90000, 90000, 0, 1),
(5, '2019-05-28', 3, 5, 'Registro dominio 8sport.com.co', 20000, 20000, 0, 1),
(6, '2019-06-06', 1, 9, 'Tarjetas de presentacion', 60000, 60000, 0, 1),
(7, '2019-09-03', 2, 9, 'Diseños documentacion Kronos', 100000, 100000, 0, 1),
(8, '2019-09-27', 4, 9, 'Recepcion dinero Hector Oscar', 5000, 5000, 0, 1),
(9, '2020-01-29', 5, 5, 'Hosting web - Atlantic', 80000, 80000, 0, 1),
(10, '2020-01-02', 6, 9, 'SIM CARD', 3000, 3000, 0, 1),
(11, '2020-02-17', 3, 5, 'Hosting web - Dominio (Kronos)', 65000, 65000, 0, 1),
(12, '2020-02-17', 3, 5, 'Hosting web - Dominio (Carpinteria)', 65000, 65000, 0, 1),
(13, '2020-08-03', 7, 4, 'Google play', 103000, 103000, 0, 1),
(14, '2020-08-04', 5, 5, 'Hosting web - Construlok', 80000, 80000, 0, 1),
(15, '2020-08-24', 8, 2, 'Disco duro extraible', 220000, 220000, 0, 1),
(16, '2020-09-20', 15, 9, 'Logo', 25000, 25000, 0, 1),
(17, '2020-08-25', 8, 2, 'Estuche disco duro', 20000, 20000, 0, 1),
(18, '2020-09-30', 9, 11, 'Servicios contables', 200000, 200000, 0, 1),
(19, '2020-08-27', 8, 11, 'Libros contables', 85000, 85000, 0, 1),
(20, '2020-08-29', 10, 11, 'Software contable', 180000, 180000, 0, 1),
(21, '2020-09-07', 13, 12, 'Asistencia administrativa', 22000, 22000, 0, 1),
(22, '2020-09-07', 13, 12, 'Asistencia administrativa', 60000, 60000, 0, 1),
(23, '2020-09-07', 13, 12, 'Asistencia administrativa', 40000, 40000, 0, 1),
(24, '2020-09-20', 13, 12, 'Asistencia administrativa', 33000, 33000, 0, 1),
(25, '2020-09-21', 13, 12, 'Asistencia administrativa', 40000, 40000, 0, 1),
(26, '2020-09-05', 11, 13, 'AutenticaciÓN', 15000, 15000, 0, 1),
(27, '2020-09-05', 12, 13, 'Escaneo documentos', 12000, 12000, 0, 1),
(28, '2020-09-21', 14, 13, 'Pago camara de comercio', 248100, 248100, 0, 1),
(29, '2020-09-22', 14, 13, 'Certificado de camara y comercio', 6100, 6100, 0, 1),
(30, '2020-09-05', 12, 13, 'Impresión documentos', 6000, 6000, 0, 1),
(31, '2020-09-28', 3, 5, 'Hosting web - Dominio (instantmailmensajeria)', 60000, 60000, 0, 1),
(32, '2020-09-25', 16, 14, 'Plan mensual en win ', 30000, 30000, 0, 1),
(33, '2020-09-21', 13, 12, 'Asistencia administrativa', 100000, 100000, 0, 1),
(34, '2020-09-29', 17, 5, 'Galerias Construlok', 40000, 40000, 0, 1),
(35, '2020-10-04', 13, 12, 'Asistencia administrativa', 100000, 100000, 0, 1),
(36, '2020-10-05', 19, 12, 'Celular ', 399900, 399900, 0, 1),
(37, '2020-10-05', 13, 12, 'Asistencia administrativa', 10000, 10000, 0, 2),
(38, '2020-10-06', 14, 13, 'Libros contables', 30000, 30000, 0, 1),
(39, '2020-10-06', 20, 16, 'Taxi y Beat', 23000, 23000, 0, 1),
(40, '2020-10-08', 17, 5, 'Tienda IPV6 y video construlok', 15000, 15000, 0, 1),
(41, '2020-10-09', 21, 17, 'Venta de PARTIDO WIN ', 5000, 5000, 0, 2),
(42, '2020-10-09', 21, 17, 'Venta de PARTIDO WIN ', 5000, 5000, 0, 2),
(43, '2020-10-10', 13, 12, 'Asistencia administrativa', 70000, 70000, 0, 1),
(44, '2020-10-13', 3, 5, 'Ampliación servicio Hosting', 15750, 15750, 0, 1),
(45, '2020-10-15', 22, 18, 'Mouse y palm mouse', 46000, 46000, 0, 1),
(46, '2020-10-17', 13, 12, 'Asistencia administrativa', 50000, 50000, 0, 1),
(47, '2020-10-23', 14, 13, 'Certificado de camara y comercio', 6100, 6100, 0, 1),
(48, '2020-10-23', 9, 11, 'Servicios contables', 200000, 200000, 0, 1),
(49, '2020-10-24', 13, 12, 'Asistencia administrativa', 100000, 100000, 0, 1),
(50, '2020-10-27', 16, 14, 'Plan mensual en win ', 29900, 29900, 0, 1),
(51, '2020-10-28', 17, 5, 'Creacion de sitio web Agregados geoda', 50000, 50000, 0, 1),
(52, '2020-10-30', 13, 12, 'Asistencia administrativa', 100000, 100000, 0, 1),
(53, '2020-11-06', 13, 12, 'Asistencia administrativa', 60000, 60000, 0, 1),
(54, '2020-11-06', 16, 14, 'Plan mensual en win ', 29900, 29900, 0, 1),
(55, '2020-11-07', 17, 5, 'Productos tienda IPV6', 28600, 28600, 0, 1),
(56, '2020-11-13', 13, 12, 'Asistencia administrativa', 100000, 100000, 0, 1),
(57, '2020-11-17', 3, 5, 'Ampliacion servicio Hosting', 26540, 26540, 0, 1),
(58, '2020-11-20', 9, 11, 'Servicios contables', 100000, 100000, 0, 1),
(59, '2020-11-20', 13, 12, 'Asistencia administrativa', 70000, 70000, 0, 1),
(60, '2020-11-28', 16, 14, 'Plan mensual en win ', 29900, 29900, 0, 2),
(61, '2020-12-02', 13, 12, 'ASISTENCIA ADMINISTRATIVA', 40000, 40000, 0, 1),
(62, '2020-12-04', 13, 12, 'ASISTENCIA ADMINISTRATIVA', 60000, 60000, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresos`
--

CREATE TABLE `ingresos` (
  `id_ingreso` int(5) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `fkID_cliente` int(5) NOT NULL,
  `fkID_categoria` int(4) NOT NULL,
  `descripcion_ingreso` varchar(200) NOT NULL,
  `valor_ingreso` double NOT NULL,
  `abono_ingreso` double NOT NULL,
  `saldo_ingreso` double NOT NULL,
  `estado` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ingresos`
--

INSERT INTO `ingresos` (`id_ingreso`, `fecha_ingreso`, `fkID_cliente`, `fkID_categoria`, `descripcion_ingreso`, `valor_ingreso`, `abono_ingreso`, `saldo_ingreso`, `estado`) VALUES
(1, '2018-12-03', 1, 9, 'Video corporativo', 100000, 100000, 0, 1),
(2, '2018-12-14', 2, 5, 'Responsive sitio web', 250000, 250000, 0, 1),
(3, '2018-12-27', 3, 2, 'Instalacion Corel Draw y Adobe Photoshop', 40000, 40000, 0, 1),
(4, '2018-12-27', 1, 6, 'Tienda virtual', 700000, 700000, 0, 1),
(5, '2019-01-16', 4, 3, 'Reporte excel de terceros', 20000, 20000, 0, 1),
(6, '2019-01-23', 5, 9, 'Escudo club', 10000, 10000, 0, 1),
(7, '2019-03-12', 6, 3, 'Desarrollo software .NET', 1080000, 1080000, 0, 1),
(8, '2019-03-18', 7, 3, 'Liberacion de equipos contratos liquidados', 20000, 20000, 0, 1),
(9, '2019-03-21', 8, 2, 'Configuracion correos corporativos', 20000, 20000, 0, 1),
(10, '2019-03-26', 9, 5, 'Subir estados financieros e imágenes marca', 30000, 30000, 0, 1),
(11, '2019-04-01', 9, 5, 'Ingreso de testimonios y fotos', 60000, 60000, 0, 1),
(12, '2019-03-25', 42, 2, 'Revision computador', 5000, 5000, 0, 1),
(13, '2019-04-10', 6, 3, 'Desarrollo software PHP', 495000, 495000, 0, 1),
(14, '2019-05-16', 9, 5, 'Ingreso de testimonios y fotos', 60000, 60000, 0, 1),
(15, '2019-05-17', 7, 3, 'Creacion de nueva categoria', 30000, 30000, 0, 1),
(16, '2019-05-25', 10, 5, 'Creacion de sitio web', 500000, 500000, 0, 1),
(17, '2019-06-05', 4, 3, 'Reporte excel de terceros', 20000, 20000, 0, 1),
(18, '2019-06-13', 4, 3, 'Requerimientos software', 50000, 50000, 0, 1),
(19, '2019-07-17', 11, 3, 'Instalacion software supermercado', 74000, 74000, 0, 1),
(20, '2019-07-27', 12, 3, 'Ajustes software supermercado', 80000, 80000, 0, 1),
(21, '2019-08-15', 9, 5, 'Ajustes para certificado SSL', 30000, 30000, 0, 1),
(22, '2019-08-17', 4, 3, 'Instalacion software', 50000, 50000, 0, 1),
(23, '2019-08-24', 13, 2, 'Mantenimiento equipo', 30000, 30000, 0, 1),
(24, '2019-09-03', 14, 7, 'Redes sociales - marketing', 200000, 200000, 0, 1),
(25, '2019-09-20', 2, 5, 'Modificacion wordpress', 100000, 100000, 0, 1),
(26, '2019-10-27', 15, 2, 'Instalacion oficce', 20000, 20000, 0, 1),
(27, '2019-10-29', 12, 3, 'Lista de precios backup', 20000, 20000, 0, 1),
(28, '2019-10-20', 16, 6, 'Creacion de sitio web', 600000, 600000, 0, 1),
(29, '2019-10-31', 17, 3, 'Correccion facturacion', 20000, 20000, 0, 1),
(30, '2019-11-06', 9, 5, 'Ajustes sitio web', 20000, 20000, 0, 1),
(31, '2019-11-18', 43, 5, 'Creacion de sitio web', 80000, 40000, 40000, 1),
(32, '2019-12-02', 4, 3, 'Reporte excel de terceros', 20000, 20000, 0, 1),
(33, '2019-12-27', 18, 3, 'Ajustes informe de guias', 50000, 50000, 0, 1),
(34, '2020-01-13', 19, 2, 'Instalacion de impresora', 20000, 20000, 0, 1),
(35, '2020-01-18', 20, 2, 'formateo', 20000, 20000, 0, 1),
(36, '2020-01-21', 21, 5, 'Hosting web y ajustes sitio web', 200000, 200000, 0, 1),
(37, '2020-01-29', 17, 3, 'Ajustes factura', 20000, 20000, 0, 1),
(38, '2020-02-05', 7, 3, 'Liberacion de equipos contratos liquidados', 20000, 20000, 0, 1),
(39, '2020-02-11', 7, 3, 'Ajustes software ortopedicos', 100000, 100000, 0, 1),
(40, '2020-02-13', 22, 6, 'Ajustes hosting', 200000, 200000, 0, 1),
(41, '2020-02-15', 23, 5, 'Creacion de sitios web, campañas SEO', 700000, 500000, 200000, 1),
(42, '2020-02-20', 24, 5, 'Creacion de sitio web', 400000, 400000, 0, 1),
(43, '2020-02-27', 24, 7, 'Campaña SEO', 200000, 200000, 0, 1),
(44, '2020-06-19', 4, 3, 'Ajustes dia sin iva', 60000, 60000, 0, 1),
(45, '2020-06-30', 18, 9, 'logo', 40000, 40000, 0, 1),
(46, '2020-07-23', 26, 7, 'Google Ads', 300000, 300000, 0, 1),
(47, '2020-07-24', 27, 2, 'Mantenimiento equipo', 20000, 20000, 0, 1),
(48, '2020-07-25', 28, 2, 'Mantenimiento equipo', 40000, 40000, 0, 1),
(49, '2020-07-29', 26, 7, 'Google Ads', 200000, 200000, 0, 1),
(50, '2020-07-30', 26, 7, 'Google Ads', 250000, 250000, 0, 1),
(51, '2020-08-01', 31, 2, 'Mantenimiento equipo', 50000, 50000, 0, 1),
(52, '2020-08-03', 32, 5, 'Creacion de sitio web', 450000, 450000, 0, 1),
(53, '2020-08-04', 33, 5, 'Migracion de sitio web', 100000, 100000, 0, 1),
(54, '2020-08-06', 32, 2, 'Mantenimiento equipo', 40000, 40000, 0, 1),
(55, '2020-08-07', 32, 2, 'Mantenimiento equipo', 40000, 40000, 0, 1),
(56, '2020-08-07', 12, 3, 'Instalacion software', 100000, 100000, 0, 1),
(57, '2020-08-09', 20, 2, 'Mantenimiento equipo', 30000, 30000, 0, 1),
(58, '2020-08-18', 9, 5, 'Testimonio nuevo, cambios pestañas, publicaciones', 150000, 150000, 0, 1),
(59, '2020-08-24', 35, 6, 'Tienda virtual', 700000, 700000, 0, 1),
(60, '2020-08-25', 25, 9, 'logo', 70000, 70000, 0, 1),
(61, '2020-08-31', 32, 2, 'Revision computador', 10000, 10000, 0, 1),
(62, '2020-09-04', 7, 3, 'Instalacion de software', 300000, 300000, 0, 1),
(63, '2020-09-08', 32, 2, 'Revision computador', 10000, 10000, 0, 1),
(64, '2020-09-16', 38, 4, 'Cambio de tiempo en el slide', 30000, 30000, 0, 1),
(65, '2020-09-16', 38, 4, 'Cambio en el slide con click', 70000, 70000, 0, 1),
(66, '2020-09-16', 38, 4, 'Cambio de color en las fuentes', 65000, 65000, 0, 1),
(67, '2020-09-19', 15, 2, 'Mantenimiento equipo', 40000, 40000, 0, 1),
(68, '2020-09-23', 12, 3, 'Ajuste de software (Firefox)', 20000, 20000, 0, 1),
(69, '2020-09-23', 41, 5, 'Modificaciones para el proceso de memorias', 360000, 360000, 0, 1),
(70, '2020-09-23', 41, 5, 'modificación para le proceso de memorias ', 360000, 0, 360000, 2),
(71, '2020-09-23', 41, 5, 'modificación para le proceso de memorias ', 360000, 0, 360000, 2),
(72, '2020-09-26', 18, 5, 'Pagina web', 400000, 200000, 200000, 1),
(73, '2020-09-27', 44, 10, 'Venta de partido win ', 5000, 5000, 0, 1),
(74, '2020-09-30', 45, 9, 'Creacion logo AGREGADOS GEODA', 70000, 70000, 0, 1),
(75, '2020-09-30', 47, 10, 'Venta de partido win ', 5000, 5000, 0, 1),
(76, '2020-10-02', 48, 10, 'partido win  ', 10000, 10000, 0, 1),
(77, '2020-10-02', 48, 10, 'partido win  ', 5000, 5000, 0, 2),
(78, '2020-10-05', 24, 7, 'Campaña de google ads', 150000, 150000, 0, 1),
(79, '2020-10-09', 49, 10, 'Venta de partido win ', 5000, 5000, 0, 1),
(80, '2020-10-12', 44, 10, 'Venta de partido win ', 5000, 5000, 0, 1),
(81, '2020-10-14', 45, 5, 'Creacion de sitio web', 400000, 371000, 29000, 1),
(82, '2020-10-17', 48, 5, 'Venta de partido win ', 5000, 5000, 0, 1),
(83, '2020-10-18', 38, 10, 'Creación de tienda online', 109000, 109000, 0, 1),
(84, '2020-10-18', 51, 3, 'Chatbot con dialogflow', 50000, 50000, 0, 1),
(85, '2020-10-18', 50, 3, 'Base de datos software inventario tecnologia', 100000, 100000, 0, 1),
(86, '2020-10-19', 44, 10, 'Venta de partido win ', 5000, 5000, 0, 1),
(87, '2020-10-21', 52, 10, 'Venta de partido win ', 5000, 5000, 0, 1),
(88, '2020-10-21', 38, 4, 'Cambios en Upplication', 163000, 163000, 0, 1),
(89, '2020-10-23', 9, 5, 'Creacion de testimonio nuevo', 47000, 47000, 0, 1),
(90, '2020-10-24', 53, 10, 'Venta de partido win ', 5000, 5000, 0, 1),
(91, '2020-10-25', 44, 6, 'Venta de partido win ', 5000, 5000, 0, 1),
(92, '2020-11-09', 41, 3, 'Creacion de memorias y cargue de bases', 200000, 200000, 0, 1),
(93, '2020-10-28', 54, 2, 'Instalacion de Office', 20000, 20000, 0, 1),
(94, '2020-11-06', 55, 10, 'Venta de partido win ', 5000, 5000, 0, 1),
(95, '2020-10-31', 44, 10, 'Venta de partido win ', 5000, 5000, 0, 1),
(96, '2020-11-01', 56, 10, 'Venta de partido win ', 5000, 5000, 0, 1),
(97, '2020-11-06', 44, 10, 'Venta de partido win ', 5000, 5000, 0, 1),
(98, '2020-11-07', 57, 10, 'Venta de partido win ', 5000, 5000, 0, 1),
(99, '2020-11-08', 58, 10, 'Venta de partido win ', 4000, 4000, 0, 1),
(100, '2020-11-08', 59, 10, 'Venta de partido win ', 5000, 5000, 0, 1),
(101, '2020-11-09', 60, 3, 'Chatbot con dialogflow', 50000, 50000, 0, 1),
(102, '2020-11-10', 44, 10, 'Venta de partido win ', 5000, 5000, 0, 1),
(103, '2020-11-10', 57, 10, 'Venta de partido win ', 5000, 5000, 0, 1),
(104, '2020-11-08', 61, 9, 'Venta de partido win ', 5000, 5000, 0, 1),
(105, '2020-11-09', 38, 10, 'Creacion de productos tienda online', 100000, 100000, 0, 1),
(106, '2020-11-11', 62, 10, 'Venta de partido win ', 5000, 5000, 0, 1),
(107, '2020-11-15', 57, 10, 'Venta de partido win ', 10000, 10000, 0, 1),
(108, '2020-11-14', 44, 10, 'Venta de partido win ', 5000, 5000, 0, 1),
(109, '2020-11-17', 63, 3, 'Software de inventario', 100000, 100000, 0, 1),
(110, '2020-11-18', 38, 10, 'Vinculación con plataforma Payu ', 285000, 285000, 0, 1),
(111, '2020-11-20', 18, 5, 'Creación pagina web', 200000, 0, 200000, 2),
(112, '2020-11-21', 61, 10, 'Venta de partido win ', 5000, 5000, 0, 1),
(113, '2020-11-21', 64, 10, 'venta de partido win ', 5000, 5000, 0, 1),
(114, '2020-11-28', 59, 10, 'venta de partido win ', 5000, 5000, 0, 1),
(115, '2020-12-04', 61, 10, 'venta de partido win ', 5000, 5000, 0, 1),
(116, '2020-12-04', 8, 5, 'Configuración correo electrónico', 20000, 20000, 0, 1),
(117, '2020-12-07', 44, 10, 'venta de partido win ', 5000, 5000, 0, 1),
(118, '2020-12-09', 57, 10, 'venta de partido win ', 5000, 5000, 0, 1),
(119, '2020-12-11', 55, 4, 'prueba', 2, 1, 1, 2),
(120, '2020-12-11', 55, 4, 'prueba', 1, 0, 1, 2),
(121, '2020-12-11', 55, 4, 'prueba', 1, 1, 0, 2),
(122, '2020-12-11', 55, 4, 'prueba', 1, 1, 0, 2),
(123, '2020-12-11', 55, 4, 'prueba', 1, 1, 0, 2),
(124, '2020-12-11', 55, 4, 'prueba', 1, 1, 0, 2),
(125, '2020-12-11', 55, 4, 'prueba', 1, 1, 0, 2),
(126, '2020-12-11', 55, 4, 'prueba', 1, 1, 0, 2),
(127, '2020-12-11', 55, 3, 'prueba', 1, 1, 0, 2),
(128, '2020-12-11', 55, 4, 'prueba', 1, 1, 0, 2),
(129, '2020-12-11', 55, 4, 'prueba', 2, 2, 0, 2),
(130, '2020-12-11', 55, 4, 'prueba', 3, 3, 0, 2),
(131, '2020-12-11', 55, 4, 'prueba', 4, 4, 0, 2),
(132, '2020-12-11', 55, 4, 'prueba', 5, 5, 0, 2),
(133, '2020-12-11', 55, 4, 'prueba', 1, 1, 0, 2),
(134, '2020-12-11', 55, 4, 'prueba', 2, 2, 0, 2),
(135, '2020-12-11', 55, 4, 'prueba', 2, 1, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

CREATE TABLE `modulo` (
  `id_modulo` int(11) NOT NULL,
  `nombre_modulo` varchar(45) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `modulo`
--

INSERT INTO `modulo` (`id_modulo`, `nombre_modulo`, `estado`) VALUES
(1, 'usuarios', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id_permisos` int(11) NOT NULL,
  `fkID_usuario` int(11) NOT NULL,
  `fkID_modulo` int(11) NOT NULL,
  `crear` int(11) DEFAULT NULL,
  `editar` int(11) DEFAULT NULL,
  `consultar` int(11) DEFAULT NULL,
  `eliminar` int(11) DEFAULT NULL,
  `ver` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id_permisos`, `fkID_usuario`, `fkID_modulo`, `crear`, `editar`, `consultar`, `eliminar`, `ver`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1),
(2, 1, 2, 1, 1, 1, 1, 1),
(3, 1, 3, 1, 1, 1, 1, 1),
(4, 1, 4, 1, 1, 1, 1, 1),
(5, 1, 5, 1, 1, 1, 1, 1),
(6, 1, 6, 1, 1, 1, 1, 1),
(7, 1, 7, 1, 1, 1, 1, 1),
(8, 1, 8, 1, 1, 1, 1, 1),
(9, 1, 9, 1, 1, 1, 1, 1),
(10, 1, 10, 1, 1, 1, 1, 1),
(11, 1, 11, 1, 1, 1, 1, 1),
(12, 1, 12, 1, 1, 1, 1, 1),
(13, 1, 13, 1, 1, 1, 1, 1),
(14, 1, 14, 1, 1, 1, 1, 1),
(58, 2, 1, 1, 1, 1, 1, 1),
(59, 2, 2, 1, 1, 1, 1, 1),
(60, 2, 3, 1, 1, 1, 1, 1),
(61, 2, 4, 1, 1, 1, 1, 1),
(62, 2, 5, 1, 1, 1, 1, 1),
(63, 2, 6, 1, 1, 1, 1, 1),
(64, 2, 7, 1, 1, 1, 1, 1),
(65, 2, 8, 1, 1, 1, 1, 1),
(66, 2, 9, 1, 1, 1, 1, 1),
(67, 2, 10, 1, 1, 1, 1, 1),
(68, 2, 11, 1, 1, 1, 1, 1),
(69, 2, 12, 1, 1, 1, 1, 1),
(70, 2, 13, 1, 1, 1, 1, 1),
(71, 2, 14, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_proveedor` int(4) NOT NULL,
  `nombres_proveedor` varchar(100) NOT NULL,
  `apellidos_proveedor` varchar(100) NOT NULL,
  `documento_proveedor` varchar(100) NOT NULL,
  `rsocial_proveedor` varchar(100) NOT NULL,
  `direccion_proveedor` varchar(200) NOT NULL,
  `telefono_proveedor` varchar(20) NOT NULL,
  `email_proveedor` varchar(300) NOT NULL,
  `celular_proveedor` varchar(100) NOT NULL,
  `web_proveedor` varchar(200) NOT NULL,
  `estado` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_proveedor`, `nombres_proveedor`, `apellidos_proveedor`, `documento_proveedor`, `rsocial_proveedor`, `direccion_proveedor`, `telefono_proveedor`, `email_proveedor`, `celular_proveedor`, `web_proveedor`, `estado`) VALUES
(1, '', '', '', 'TAURO GRAFIC', '', '', '', '', '', 1),
(2, 'Santiago', 'Andrade', '', '', '', '', '', '', '', 1),
(3, '', '', '', 'Mi.com.co', '', '', '', '', '', 1),
(4, 'Angelica\r\n', 'Guzman', '', '', '', '', '', '', '', 1),
(5, '', '', '', 'Planeta Hosting', '', '', '', '', '', 1),
(6, 'Tienda\r\n', '', '', '', '', '', '', '', '', 1),
(7, '', '', '', 'Google', '', '', '', '', '', 1),
(8, '', '', '', 'Mercado libre', '', '', '', '', '', 1),
(9, 'Anguie', 'Liley', 'Prieto', '', '', '', '', '', '', 1),
(10, '', '', '', 'SIIGO\r\n', '', '', '', '', '', 1),
(11, '', '', '', 'Registraduria\r\n', '', '', '', '', '', 1),
(12, 'Papeleria\r\n', '', '', '', '', '', '', '', '', 1),
(13, 'Natalia', 'Buitrago Castro', '', '', '', '', '', '', '', 1),
(14, '', '', '', 'Camara de comercio\r\n', '', '', '', '', '', 1),
(15, 'Jesus', 'Effort', '', '', '', '', '', '', '', 1),
(16, 'WIN ', '', '', '', '', '', '', '7956464', '', 1),
(17, 'EDWARD', 'BARAHONA', '', '', '', '', '', '315 6457590', '', 1),
(18, 'NOMBREsss', 'APELLIDOss', '12333333333', 'R SOCIALsss', 'CALLE 100', '123333333333', 'CORREO@GMAIL.COMssss', '32111111', 'www.sitio.comss', 2),
(19, 'Alkosto Hiperahorro', '', '', 'ALKOSTO HIPERAHORRO', '', '', '', ' 364 9734', '', 1),
(20, 'Transporte ', '', '', '', '', '', '', '3022894663', '', 1),
(21, 'Eduin camilo', 'restrepo', '', '', '', '', '', '318 2512341', '', 1),
(22, 'oka', '', '', '', '', '', '', '323456753', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(45) DEFAULT NULL,
  `pass_usuario` varchar(45) DEFAULT NULL,
  `email_usuario` varchar(200) NOT NULL,
  `token_password` varchar(200) NOT NULL,
  `password_request` int(11) NOT NULL DEFAULT 0,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `pass_usuario`, `email_usuario`, `token_password`, `password_request`, `estado`) VALUES
(1, 'administrador', 'f80eab00c0000bdfdc5aaa6a2ca36768550fab9b', 'kronossolucionestic@gmail.com', '', 0, 1),
(2, 'nata', 'af8a39e387c416b1692be194034b943c6c2dbf6f', '', '', 0, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `abonos`
--
ALTER TABLE `abonos`
  ADD PRIMARY KEY (`id_abono`);

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id_cargo`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `concepto`
--
ALTER TABLE `concepto`
  ADD PRIMARY KEY (`id_concepto`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id_contacto`);

--
-- Indices de la tabla `cuentas_cobro`
--
ALTER TABLE `cuentas_cobro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `egresos`
--
ALTER TABLE `egresos`
  ADD PRIMARY KEY (`id_egreso`);

--
-- Indices de la tabla `ingresos`
--
ALTER TABLE `ingresos`
  ADD PRIMARY KEY (`id_ingreso`);

--
-- Indices de la tabla `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`id_modulo`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id_permisos`),
  ADD KEY `fkID_rol_idx` (`fkID_usuario`),
  ADD KEY `fkID_modulo_idx` (`fkID_modulo`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `abonos`
--
ALTER TABLE `abonos`
  MODIFY `id_abono` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id_cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT de la tabla `concepto`
--
ALTER TABLE `concepto`
  MODIFY `id_concepto` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id_contacto` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `cuentas_cobro`
--
ALTER TABLE `cuentas_cobro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `egresos`
--
ALTER TABLE `egresos`
  MODIFY `id_egreso` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de la tabla `ingresos`
--
ALTER TABLE `ingresos`
  MODIFY `id_ingreso` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT de la tabla `modulo`
--
ALTER TABLE `modulo`
  MODIFY `id_modulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id_permisos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_proveedor` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
