-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-02-2022 a las 16:35:53
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
-- Estructura de tabla para la tabla `consecutivo`
--

CREATE TABLE `consecutivo` (
  `id_consecutivo` int(100) NOT NULL,
  `fkCEDULA` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `consecutivo`
--

INSERT INTO `consecutivo` (`id_consecutivo`, `fkCEDULA`) VALUES
(1, '12345'),
(2, '12345'),
(3, '12345'),
(4, '12345'),
(5, '12345'),
(6, '12345');

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
  `valor` int(100) NOT NULL,
  `concepto` varchar(250) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `formas_pago` varchar(250) NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cuentas_cobro`
--

INSERT INTO `cuentas_cobro` (`id`, `ciudad`, `fecha`, `nombre`, `cedula`, `valor`, `concepto`, `celular`, `formas_pago`, `estado`) VALUES
(1, 'Achí', '2022-02-14', 'camilo ballesteros', '12345', 90000, 'dsfsdf', '12345', 'nequi', 1),
(2, 'Abejorral', '2022-02-11', 'dfgdfgfd123', '12345', 90000, 'ertert', '12345', 'nequi', 1),
(3, 'Abejorral', '2022-02-11', 'camilo ballesteros', '12345', 90000, 'sdfdsf', '12345', 'nequi', 2),
(4, 'Fusagasugá', '2022-02-14', 'camilo ballesteros', '12345', 90000, 'qwewqeqe', '12345', 'nequi', 1),
(5, 'Abejorral', '2022-02-11', 'dfgdfgfd123', '12345', 90000, 'ertret', '12345', 'rtertert', 2),
(6, 'Abejorral', '2022-02-11', 'dfgdfgfd123', '12345', 90000, 'sadada', '12345', 'nequi', 1);

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
-- Estructura de tabla para la tabla `municipios`
--

CREATE TABLE `municipios` (
  `id_municipio` int(6) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL DEFAULT '',
  `estado` int(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `municipios`
--

INSERT INTO `municipios` (`id_municipio`, `nombre`, `estado`) VALUES
(1, 'Abriaquí', 1),
(2, 'Acacías', 1),
(3, 'Acandí', 1),
(4, 'Acevedo', 1),
(5, 'Achí', 1),
(6, 'Agrado', 1),
(7, 'Agua de Dios', 1),
(8, 'Aguachica', 1),
(9, 'Aguada', 1),
(10, 'Aguadas', 1),
(11, 'Aguazul', 1),
(12, 'Agustín Codazzi', 1),
(13, 'Aipe', 1),
(16, 'Albania', 1),
(17, 'Albán', 1),
(18, 'Albán (San José)', 1),
(19, 'Alcalá', 1),
(20, 'Alejandria', 1),
(21, 'Algarrobo', 1),
(22, 'Algeciras', 1),
(23, 'Almaguer', 1),
(24, 'Almeida', 1),
(25, 'Alpujarra', 1),
(26, 'Altamira', 1),
(27, 'Alto Baudó (Pie de Pato)', 1),
(28, 'Altos del Rosario', 1),
(29, 'Alvarado', 1),
(30, 'Amagá', 1),
(31, 'Amalfi', 1),
(32, 'Ambalema', 1),
(33, 'Anapoima', 1),
(34, 'Ancuya', 1),
(35, 'Andalucía', 1),
(36, 'Andes', 1),
(37, 'Angelópolis', 1),
(38, 'Angostura', 1),
(39, 'Anolaima', 1),
(40, 'Anorí', 1),
(41, 'Anserma', 1),
(42, 'Ansermanuevo', 1),
(43, 'Anzoátegui', 1),
(44, 'Anzá', 1),
(45, 'Apartadó', 1),
(46, 'Apulo', 1),
(47, 'Apía', 1),
(48, 'Aquitania', 1),
(49, 'Aracataca', 1),
(50, 'Aranzazu', 1),
(51, 'Aratoca', 1),
(52, 'Arauca', 1),
(53, 'Arauquita', 1),
(54, 'Arbeláez', 1),
(55, 'Arboleda (Berruecos)', 1),
(56, 'Arboledas', 1),
(57, 'Arboletes', 1),
(58, 'Arcabuco', 1),
(59, 'Arenal', 1),
(62, 'Argelia', 1),
(63, 'Ariguaní (El Difícil)', 1),
(64, 'Arjona', 1),
(66, 'Armenia', 1),
(67, 'Armero (Guayabal)', 1),
(68, 'Arroyohondo', 1),
(69, 'Astrea', 1),
(70, 'Ataco', 1),
(71, 'Atrato (Yuto)', 1),
(72, 'Ayapel', 1),
(73, 'Bagadó', 1),
(74, 'Bahía Solano (Mútis)', 1),
(75, 'Bajo Baudó (Pizarro)', 1),
(77, 'Balboa', 1),
(78, 'Baranoa', 1),
(79, 'Baraya', 1),
(80, 'Barbacoas', 1),
(82, 'Barbosa', 1),
(83, 'Barichara', 1),
(84, 'Barranca de Upía', 1),
(85, 'Barrancabermeja', 1),
(86, 'Barrancas', 1),
(87, 'Barranco de Loba', 1),
(88, 'Barranquilla', 1),
(89, 'Becerríl', 1),
(90, 'Belalcázar', 1),
(91, 'Bello', 1),
(92, 'Belmira', 1),
(93, 'Beltrán', 1),
(95, 'Belén', 1),
(96, 'Belén de Bajirá', 1),
(97, 'Belén de Umbría', 1),
(98, 'Belén de los Andaquíes', 1),
(99, 'Berbeo', 1),
(100, 'Betania', 1),
(101, 'Beteitiva', 1),
(103, 'Betulia', 1),
(104, 'Bituima', 1),
(105, 'Boavita', 1),
(106, 'Bochalema', 1),
(107, 'Bogotá D.C.', 1),
(108, 'Bojacá', 1),
(109, 'Bojayá (Bellavista)', 1),
(113, 'Bolívar', 1),
(114, 'Bosconia', 1),
(115, 'Boyacá', 1),
(116, 'Briceño', 1),
(117, 'Briceño', 1),
(118, 'Bucaramanga', 1),
(119, 'Bucarasica', 1),
(120, 'Buenaventura', 1),
(123, 'Buenavista', 1),
(124, 'Buenavista', 1),
(125, 'Buenos Aires', 1),
(126, 'Buesaco', 1),
(127, 'Buga', 1),
(128, 'Bugalagrande', 1),
(129, 'Burítica', 1),
(130, 'Busbanza', 1),
(132, 'Cabrera', 1),
(133, 'Cabuyaro', 1),
(134, 'Cachipay', 1),
(135, 'Caicedo', 1),
(136, 'Caicedonia', 1),
(137, 'Caimito', 1),
(138, 'Cajamarca', 1),
(139, 'Cajibío', 1),
(140, 'Cajicá', 1),
(142, 'Calamar', 1),
(143, 'Calarcá', 1),
(145, 'Caldas', 1),
(146, 'Caldono', 1),
(147, 'California', 1),
(148, 'Calima (Darién)', 1),
(149, 'Caloto', 1),
(150, 'Calí', 1),
(151, 'Campamento', 1),
(152, 'Campo de la Cruz', 1),
(153, 'Campoalegre', 1),
(154, 'Campohermoso', 1),
(155, 'Canalete', 1),
(157, 'Candelaria', 1),
(158, 'Cantagallo', 1),
(159, 'Cantón de San Pablo', 1),
(160, 'Caparrapí', 1),
(161, 'Capitanejo', 1),
(162, 'Caracolí', 1),
(163, 'Caramanta', 1),
(164, 'Carcasí', 1),
(165, 'Carepa', 1),
(166, 'Carmen de Apicalá', 1),
(167, 'Carmen de Carupa', 1),
(168, 'Carmen de Viboral', 1),
(169, 'Carmen del Darién (CURBARADÓ)', 1),
(170, 'Carolina', 1),
(171, 'Cartagena', 1),
(172, 'Cartagena del Chairá', 1),
(173, 'Cartago', 1),
(174, 'Carurú', 1),
(175, 'Casabianca', 1),
(176, 'Castilla la Nueva', 1),
(177, 'Caucasia', 1),
(178, 'Cañasgordas', 1),
(179, 'Cepita', 1),
(180, 'Cereté', 1),
(181, 'Cerinza', 1),
(182, 'Cerrito', 1),
(183, 'Cerro San Antonio', 1),
(184, 'Chachaguí', 1),
(185, 'Chaguaní', 1),
(186, 'Chalán', 1),
(187, 'Chaparral', 1),
(188, 'Charalá', 1),
(189, 'Charta', 1),
(190, 'Chigorodó', 1),
(191, 'Chima', 1),
(192, 'Chimichagua', 1),
(193, 'Chimá', 1),
(194, 'Chinavita', 1),
(195, 'Chinchiná', 1),
(196, 'Chinácota', 1),
(197, 'Chinú', 1),
(198, 'Chipaque', 1),
(199, 'Chipatá', 1),
(200, 'Chiquinquirá', 1),
(201, 'Chiriguaná', 1),
(202, 'Chiscas', 1),
(203, 'Chita', 1),
(204, 'Chitagá', 1),
(205, 'Chitaraque', 1),
(206, 'Chivatá', 1),
(207, 'Chivolo', 1),
(208, 'Choachí', 1),
(209, 'Chocontá', 1),
(210, 'Chámeza', 1),
(211, 'Chía', 1),
(212, 'Chíquiza', 1),
(213, 'Chívor', 1),
(214, 'Cicuco', 1),
(215, 'Cimitarra', 1),
(216, 'Circasia', 1),
(217, 'Cisneros', 1),
(219, 'Ciénaga', 1),
(220, 'Ciénaga de Oro', 1),
(221, 'Clemencia', 1),
(222, 'Cocorná', 1),
(223, 'Coello', 1),
(224, 'Cogua', 1),
(225, 'Colombia', 1),
(226, 'Colosó (Ricaurte)', 1),
(227, 'Colón', 1),
(228, 'Colón (Génova)', 1),
(229, 'Concepción', 1),
(230, 'Concepción', 1),
(232, 'Concordia', 1),
(233, 'Condoto', 1),
(234, 'Confines', 1),
(235, 'Consaca', 1),
(236, 'Contadero', 1),
(237, 'Contratación', 1),
(238, 'Convención', 1),
(239, 'Copacabana', 1),
(240, 'Coper', 1),
(241, 'Cordobá', 1),
(242, 'Corinto', 1),
(243, 'Coromoro', 1),
(244, 'Corozal', 1),
(245, 'Corrales', 1),
(246, 'Cota', 1),
(247, 'Cotorra', 1),
(248, 'Covarachía', 1),
(249, 'Coveñas', 1),
(250, 'Coyaima', 1),
(251, 'Cravo Norte', 1),
(252, 'Cuaspud (Carlosama)', 1),
(253, 'Cubarral', 1),
(254, 'Cubará', 1),
(255, 'Cucaita', 1),
(256, 'Cucunubá', 1),
(257, 'Cucutilla', 1),
(258, 'Cuitiva', 1),
(259, 'Cumaral', 1),
(260, 'Cumaribo', 1),
(261, 'Cumbal', 1),
(262, 'Cumbitara', 1),
(263, 'Cunday', 1),
(264, 'Curillo', 1),
(265, 'Curití', 1),
(266, 'Curumaní', 1),
(267, 'Cáceres', 1),
(268, 'Cáchira', 1),
(269, 'Cácota', 1),
(270, 'Cáqueza', 1),
(271, 'Cértegui', 1),
(272, 'Cómbita', 1),
(274, 'Córdoba', 1),
(275, 'Cúcuta', 1),
(276, 'Dabeiba', 1),
(277, 'Dagua', 1),
(278, 'Dibulla', 1),
(279, 'Distracción', 1),
(280, 'Dolores', 1),
(281, 'Don Matías', 1),
(282, 'Dos Quebradas', 1),
(283, 'Duitama', 1),
(284, 'Durania', 1),
(285, 'Ebéjico', 1),
(286, 'El Bagre', 1),
(287, 'El Banco', 1),
(288, 'El Cairo', 1),
(289, 'El Calvario', 1),
(291, 'El Carmen', 1),
(292, 'El Carmen de Atrato', 1),
(293, 'El Carmen de Bolívar', 1),
(294, 'El Castillo', 1),
(295, 'El Cerrito', 1),
(296, 'El Charco', 1),
(297, 'El Cocuy', 1),
(298, 'El Colegio', 1),
(299, 'El Copey', 1),
(300, 'El Doncello', 1),
(301, 'El Dorado', 1),
(302, 'El Dovio', 1),
(303, 'El Espino', 1),
(304, 'El Guacamayo', 1),
(305, 'El Guamo', 1),
(306, 'El Molino', 1),
(307, 'El Paso', 1),
(308, 'El Paujil', 1),
(312, 'El Peñón', 1),
(313, 'El Piñon', 1),
(314, 'El Playón', 1),
(315, 'El Retorno', 1),
(316, 'El Retén', 1),
(317, 'El Roble', 1),
(318, 'El Rosal', 1),
(319, 'El Rosario', 1),
(320, 'El Tablón de Gómez', 1),
(321, 'El Tambo', 1),
(322, 'El Tambo', 1),
(323, 'El Tarra', 1),
(324, 'El Zulia', 1),
(325, 'El Águila', 1),
(326, 'Elías', 1),
(327, 'Encino', 1),
(328, 'Enciso', 1),
(329, 'Entrerríos', 1),
(330, 'Envigado', 1),
(331, 'Espinal', 1),
(332, 'Facatativá', 1),
(333, 'Falan', 1),
(334, 'Filadelfia', 1),
(335, 'Filandia', 1),
(336, 'Firavitoba', 1),
(337, 'Flandes', 1),
(339, 'Florencia', 1),
(340, 'Floresta', 1),
(341, 'Florida', 1),
(342, 'Floridablanca', 1),
(343, 'Florián', 1),
(344, 'Fonseca', 1),
(345, 'Fortúl', 1),
(346, 'Fosca', 1),
(347, 'Francisco Pizarro', 1),
(348, 'Fredonia', 1),
(349, 'Fresno', 1),
(350, 'Frontino', 1),
(351, 'Fuente de Oro', 1),
(352, 'Fundación', 1),
(353, 'Funes', 1),
(354, 'Funza', 1),
(355, 'Fusagasugá', 1),
(356, 'Fómeque', 1),
(357, 'Fúquene', 1),
(358, 'Gachalá', 1),
(359, 'Gachancipá', 1),
(360, 'Gachantivá', 1),
(361, 'Gachetá', 1),
(362, 'Galapa', 1),
(363, 'Galeras (Nueva Granada)', 1),
(364, 'Galán', 1),
(365, 'Gama', 1),
(366, 'Gamarra', 1),
(367, 'Garagoa', 1),
(368, 'Garzón', 1),
(369, 'Gigante', 1),
(370, 'Ginebra', 1),
(371, 'Giraldo', 1),
(372, 'Girardot', 1),
(373, 'Girardota', 1),
(374, 'Girón', 1),
(375, 'Gonzalez', 1),
(376, 'Gramalote', 1),
(377, 'Granada', 1),
(378, 'Granada', 1),
(379, 'Granada', 1),
(380, 'Guaca', 1),
(381, 'Guacamayas', 1),
(382, 'Guacarí', 1),
(383, 'Guachavés', 1),
(384, 'Guachené', 1),
(385, 'Guachetá', 1),
(386, 'Guachucal', 1),
(387, 'Guadalupe', 1),
(388, 'Guadalupe', 1),
(389, 'Guadalupe', 1),
(390, 'Guaduas', 1),
(391, 'Guaitarilla', 1),
(392, 'Gualmatán', 1),
(394, 'Guamal', 1),
(395, 'Guamo', 1),
(396, 'Guapota', 1),
(397, 'Guapí', 1),
(398, 'Guaranda', 1),
(399, 'Guarne', 1),
(400, 'Guasca', 1),
(401, 'Guatapé', 1),
(402, 'Guataquí', 1),
(403, 'Guatavita', 1),
(404, 'Guateque', 1),
(405, 'Guavatá', 1),
(406, 'Guayabal de Siquima', 1),
(407, 'Guayabetal', 1),
(408, 'Guayatá', 1),
(409, 'Guepsa', 1),
(410, 'Guicán', 1),
(411, 'Gutiérrez', 1),
(412, 'Guática', 1),
(413, 'Gámbita', 1),
(414, 'Gámeza', 1),
(415, 'Génova', 1),
(416, 'Gómez Plata', 1),
(417, 'Hacarí', 1),
(418, 'Hatillo de Loba', 1),
(419, 'Hato', 1),
(420, 'Hato Corozal', 1),
(421, 'Hatonuevo', 1),
(422, 'Heliconia', 1),
(423, 'Herrán', 1),
(424, 'Herveo', 1),
(425, 'Hispania', 1),
(426, 'Hobo', 1),
(427, 'Honda', 1),
(428, 'Ibagué', 1),
(429, 'Icononzo', 1),
(430, 'Iles', 1),
(431, 'Imúes', 1),
(432, 'Inzá', 1),
(433, 'Inírida', 1),
(434, 'Ipiales', 1),
(435, 'Isnos', 1),
(436, 'Istmina', 1),
(437, 'Itagüí', 1),
(438, 'Ituango', 1),
(439, 'Izá', 1),
(440, 'Jambaló', 1),
(441, 'Jamundí', 1),
(442, 'Jardín', 1),
(443, 'Jenesano', 1),
(444, 'Jericó', 1),
(445, 'Jericó', 1),
(446, 'Jerusalén', 1),
(447, 'Jesús María', 1),
(448, 'Jordán', 1),
(449, 'Juan de Acosta', 1),
(450, 'Junín', 1),
(451, 'Juradó', 1),
(452, 'La Apartada y La Frontera', 1),
(453, 'La Argentina', 1),
(454, 'La Belleza', 1),
(455, 'La Calera', 1),
(456, 'La Capilla', 1),
(457, 'La Ceja', 1),
(458, 'La Celia', 1),
(459, 'La Cruz', 1),
(460, 'La Cumbre', 1),
(461, 'La Dorada', 1),
(462, 'La Esperanza', 1),
(463, 'La Estrella', 1),
(464, 'La Florida', 1),
(465, 'La Gloria', 1),
(466, 'La Jagua de Ibirico', 1),
(467, 'La Jagua del Pilar', 1),
(468, 'La Llanada', 1),
(469, 'La Macarena', 1),
(470, 'La Merced', 1),
(471, 'La Mesa', 1),
(472, 'La Montañita', 1),
(473, 'La Palma', 1),
(474, 'La Paz', 1),
(475, 'La Paz (Robles)', 1),
(476, 'La Peña', 1),
(477, 'La Pintada', 1),
(478, 'La Plata', 1),
(479, 'La Playa', 1),
(480, 'La Primavera', 1),
(481, 'La Salina', 1),
(482, 'La Sierra', 1),
(483, 'La Tebaida', 1),
(484, 'La Tola', 1),
(488, 'La Unión', 1),
(489, 'La Uvita', 1),
(491, 'La Vega', 1),
(494, 'La Victoria', 1),
(495, 'La Virginia', 1),
(496, 'Labateca', 1),
(497, 'Labranzagrande', 1),
(498, 'Landázuri', 1),
(499, 'Lebrija', 1),
(500, 'Leiva', 1),
(501, 'Lejanías', 1),
(502, 'Lenguazaque', 1),
(503, 'Leticia', 1),
(504, 'Liborina', 1),
(505, 'Linares', 1),
(506, 'Lloró', 1),
(507, 'Lorica', 1),
(508, 'Los Córdobas', 1),
(509, 'Los Palmitos', 1),
(510, 'Los Patios', 1),
(511, 'Los Santos', 1),
(512, 'Lourdes', 1),
(513, 'Luruaco', 1),
(514, 'Lérida', 1),
(515, 'Líbano', 1),
(516, 'López (Micay)', 1),
(517, 'Macanal', 1),
(518, 'Macaravita', 1),
(519, 'Maceo', 1),
(520, 'Machetá', 1),
(521, 'Madrid', 1),
(522, 'Magangué', 1),
(523, 'Magüi (Payán)', 1),
(524, 'Mahates', 1),
(525, 'Maicao', 1),
(526, 'Majagual', 1),
(527, 'Malambo', 1),
(528, 'Mallama (Piedrancha)', 1),
(529, 'Manatí', 1),
(530, 'Manaure', 1),
(531, 'Manaure Balcón del Cesar', 1),
(532, 'Manizales', 1),
(533, 'Manta', 1),
(534, 'Manzanares', 1),
(535, 'Maní', 1),
(536, 'Mapiripan', 1),
(537, 'Margarita', 1),
(538, 'Marinilla', 1),
(539, 'Maripí', 1),
(540, 'Mariquita', 1),
(541, 'Marmato', 1),
(542, 'Marquetalia', 1),
(543, 'Marsella', 1),
(544, 'Marulanda', 1),
(545, 'María la Baja', 1),
(546, 'Matanza', 1),
(547, 'Medellín', 1),
(548, 'Medina', 1),
(549, 'Medio Atrato', 1),
(550, 'Medio Baudó', 1),
(551, 'Medio San Juan (ANDAGOYA)', 1),
(552, 'Melgar', 1),
(553, 'Mercaderes', 1),
(554, 'Mesetas', 1),
(555, 'Milán', 1),
(556, 'Miraflores', 1),
(558, 'Miranda', 1),
(559, 'Mistrató', 1),
(560, 'Mitú', 1),
(561, 'Mocoa', 1),
(562, 'Mogotes', 1),
(563, 'Molagavita', 1),
(564, 'Momil', 1),
(565, 'Mompós', 1),
(566, 'Mongua', 1),
(567, 'Monguí', 1),
(568, 'Moniquirá', 1),
(569, 'Montebello', 1),
(570, 'Montecristo', 1),
(571, 'Montelíbano', 1),
(572, 'Montenegro', 1),
(573, 'Monteria', 1),
(574, 'Monterrey', 1),
(576, 'Morales', 1),
(577, 'Morelia', 1),
(578, 'Morroa', 1),
(580, 'Mosquera', 1),
(581, 'Motavita', 1),
(582, 'Moñitos', 1),
(583, 'Murillo', 1),
(584, 'Murindó', 1),
(585, 'Mutatá', 1),
(586, 'Mutiscua', 1),
(587, 'Muzo', 1),
(588, 'Málaga', 1),
(589, 'Nariño', 1),
(591, 'Nariño', 1),
(592, 'Natagaima', 1),
(593, 'Nechí', 1),
(594, 'Necoclí', 1),
(595, 'Neira', 1),
(596, 'Neiva', 1),
(597, 'Nemocón', 1),
(598, 'Nilo', 1),
(599, 'Nimaima', 1),
(600, 'Nobsa', 1),
(601, 'Nocaima', 1),
(602, 'Norcasia', 1),
(603, 'Norosí', 1),
(604, 'Novita', 1),
(605, 'Nueva Granada', 1),
(606, 'Nuevo Colón', 1),
(607, 'Nunchía', 1),
(608, 'Nuquí', 1),
(609, 'Nátaga', 1),
(610, 'Obando', 1),
(611, 'Ocamonte', 1),
(612, 'Ocaña', 1),
(613, 'Oiba', 1),
(614, 'Oicatá', 1),
(615, 'Olaya', 1),
(616, 'Olaya Herrera', 1),
(617, 'Onzaga', 1),
(618, 'Oporapa', 1),
(619, 'Orito', 1),
(620, 'Orocué', 1),
(621, 'Ortega', 1),
(622, 'Ospina', 1),
(623, 'Otanche', 1),
(624, 'Ovejas', 1),
(625, 'Pachavita', 1),
(626, 'Pacho', 1),
(627, 'Padilla', 1),
(628, 'Paicol', 1),
(629, 'Pailitas', 1),
(630, 'Paime', 1),
(631, 'Paipa', 1),
(632, 'Pajarito', 1),
(633, 'Palermo', 1),
(634, 'Palestina', 1),
(635, 'Palestina', 1),
(636, 'Palmar', 1),
(637, 'Palmar de Varela', 1),
(638, 'Palmas del Socorro', 1),
(639, 'Palmira', 1),
(640, 'Palmito', 1),
(641, 'Palocabildo', 1),
(642, 'Pamplona', 1),
(643, 'Pamplonita', 1),
(644, 'Pandi', 1),
(645, 'Panqueba', 1),
(646, 'Paratebueno', 1),
(647, 'Pasca', 1),
(648, 'Patía (El Bordo)', 1),
(649, 'Pauna', 1),
(650, 'Paya', 1),
(651, 'Paz de Ariporo', 1),
(652, 'Paz de Río', 1),
(653, 'Pedraza', 1),
(654, 'Pelaya', 1),
(655, 'Pensilvania', 1),
(656, 'Peque', 1),
(657, 'Pereira', 1),
(658, 'Pesca', 1),
(659, 'Peñol', 1),
(660, 'Piamonte', 1),
(661, 'Pie de Cuesta', 1),
(662, 'Piedras', 1),
(663, 'Piendamó', 1),
(664, 'Pijao', 1),
(665, 'Pijiño', 1),
(666, 'Pinchote', 1),
(667, 'Pinillos', 1),
(668, 'Piojo', 1),
(669, 'Pisva', 1),
(670, 'Pital', 1),
(671, 'Pitalito', 1),
(672, 'Pivijay', 1),
(673, 'Planadas', 1),
(674, 'Planeta Rica', 1),
(675, 'Plato', 1),
(676, 'Policarpa', 1),
(677, 'Polonuevo', 1),
(678, 'Ponedera', 1),
(679, 'Popayán', 1),
(680, 'Pore', 1),
(681, 'Potosí', 1),
(682, 'Pradera', 1),
(683, 'Prado', 1),
(684, 'Providencia', 1),
(685, 'Providencia', 1),
(686, 'Pueblo Bello', 1),
(687, 'Pueblo Nuevo', 1),
(688, 'Pueblo Rico', 1),
(689, 'Pueblorrico', 1),
(690, 'Puebloviejo', 1),
(691, 'Puente Nacional', 1),
(692, 'Puerres', 1),
(693, 'Puerto Asís', 1),
(694, 'Puerto Berrío', 1),
(695, 'Puerto Boyacá', 1),
(696, 'Puerto Caicedo', 1),
(697, 'Puerto Carreño', 1),
(698, 'Puerto Colombia', 1),
(699, 'Puerto Concordia', 1),
(700, 'Puerto Escondido', 1),
(701, 'Puerto Gaitán', 1),
(702, 'Puerto Guzmán', 1),
(703, 'Puerto Leguízamo', 1),
(704, 'Puerto Libertador', 1),
(705, 'Puerto Lleras', 1),
(706, 'Puerto López', 1),
(707, 'Puerto Nare', 1),
(708, 'Puerto Nariño', 1),
(709, 'Puerto Parra', 1),
(711, 'Puerto Rico', 1),
(712, 'Puerto Rondón', 1),
(713, 'Puerto Salgar', 1),
(714, 'Puerto Santander', 1),
(715, 'Puerto Tejada', 1),
(716, 'Puerto Triunfo', 1),
(717, 'Puerto Wilches', 1),
(718, 'Pulí', 1),
(719, 'Pupiales', 1),
(720, 'Puracé (Coconuco)', 1),
(721, 'Purificación', 1),
(722, 'Purísima', 1),
(723, 'Pácora', 1),
(724, 'Páez', 1),
(725, 'Páez (Belalcazar)', 1),
(726, 'Páramo', 1),
(727, 'Quebradanegra', 1),
(728, 'Quetame', 1),
(729, 'Quibdó', 1),
(730, 'Quimbaya', 1),
(731, 'Quinchía', 1),
(732, 'Quipama', 1),
(733, 'Quipile', 1),
(734, 'Ragonvalia', 1),
(735, 'Ramiriquí', 1),
(736, 'Recetor', 1),
(737, 'Regidor', 1),
(738, 'Remedios', 1),
(739, 'Remolino', 1),
(740, 'Repelón', 1),
(742, 'Restrepo', 1),
(743, 'Retiro', 1),
(744, 'Ricaurte', 1),
(745, 'Ricaurte', 1),
(746, 'Rio Negro', 1),
(747, 'Rioblanco', 1),
(748, 'Riofrío', 1),
(749, 'Riohacha', 1),
(750, 'Risaralda', 1),
(751, 'Rivera', 1),
(752, 'Roberto Payán (San José)', 1),
(753, 'Roldanillo', 1),
(754, 'Roncesvalles', 1),
(755, 'Rondón', 1),
(756, 'Rosas', 1),
(757, 'Rovira', 1),
(758, 'Ráquira', 1),
(759, 'Río Iró', 1),
(760, 'Río Quito', 1),
(761, 'Río Sucio', 1),
(762, 'Río Viejo', 1),
(763, 'Río de oro', 1),
(764, 'Ríonegro', 1),
(765, 'Ríosucio', 1),
(766, 'Sabana de Torres', 1),
(767, 'Sabanagrande', 1),
(770, 'Sabanalarga', 1),
(771, 'Sabanas de San Angel (SAN ANGEL)', 1),
(772, 'Sabaneta', 1),
(773, 'Saboyá', 1),
(774, 'Sahagún', 1),
(775, 'Saladoblanco', 1),
(777, 'Salamina', 1),
(778, 'Salazar', 1),
(779, 'Saldaña', 1),
(780, 'Salento', 1),
(781, 'Salgar', 1),
(782, 'Samacá', 1),
(783, 'Samaniego', 1),
(784, 'Samaná', 1),
(785, 'Sampués', 1),
(786, 'San Agustín', 1),
(787, 'San Alberto', 1),
(788, 'San Andrés', 1),
(789, 'San Andrés Sotavento', 1),
(790, 'San Andrés de Cuerquía', 1),
(791, 'San Antero', 1),
(792, 'San Antonio', 1),
(793, 'San Antonio de Tequendama', 1),
(794, 'San Benito', 1),
(795, 'San Benito Abad', 1),
(797, 'San Bernardo', 1),
(798, 'San Bernardo del Viento', 1),
(799, 'San Calixto', 1),
(801, 'San Carlos', 1),
(802, 'San Carlos de Guaroa', 1),
(804, 'San Cayetano', 1),
(805, 'San Cristobal', 1),
(806, 'San Diego', 1),
(807, 'San Eduardo', 1),
(808, 'San Estanislao', 1),
(809, 'San Fernando', 1),
(812, 'San Francisco', 1),
(813, 'San Gíl', 1),
(814, 'San Jacinto', 1),
(815, 'San Jacinto del Cauca', 1),
(816, 'San Jerónimo', 1),
(817, 'San Joaquín', 1),
(818, 'San José', 1),
(819, 'San José de Miranda', 1),
(820, 'San José de Montaña', 1),
(821, 'San José de Pare', 1),
(822, 'San José de Uré', 1),
(823, 'San José del Fragua', 1),
(824, 'San José del Guaviare', 1),
(825, 'San José del Palmar', 1),
(826, 'San Juan de Arama', 1),
(827, 'San Juan de Betulia', 1),
(828, 'San Juan de Nepomuceno', 1),
(829, 'San Juan de Pasto', 1),
(830, 'San Juan de Río Seco', 1),
(831, 'San Juan de Urabá', 1),
(832, 'San Juan del Cesar', 1),
(833, 'San Juanito', 1),
(834, 'San Lorenzo', 1),
(836, 'San Luís', 1),
(837, 'San Luís de Gaceno', 1),
(838, 'San Luís de Palenque', 1),
(839, 'San Marcos', 1),
(841, 'San Martín', 1),
(842, 'San Martín de Loba', 1),
(843, 'San Mateo', 1),
(845, 'San Miguel', 1),
(846, 'San Miguel de Sema', 1),
(847, 'San Onofre', 1),
(849, 'San Pablo', 1),
(850, 'San Pablo de Borbur', 1),
(853, 'San Pedro', 1),
(854, 'San Pedro de Cartago', 1),
(855, 'San Pedro de Urabá', 1),
(856, 'San Pelayo', 1),
(857, 'San Rafael', 1),
(858, 'San Roque', 1),
(859, 'San Sebastián', 1),
(860, 'San Sebastián de Buenavista', 1),
(861, 'San Vicente', 1),
(862, 'San Vicente del Caguán', 1),
(863, 'San Vicente del Chucurí', 1),
(864, 'San Zenón', 1),
(865, 'Sandoná', 1),
(866, 'Santa Ana', 1),
(867, 'Santa Bárbara', 1),
(868, 'Santa Bárbara', 1),
(869, 'Santa Bárbara (Iscuandé)', 1),
(870, 'Santa Bárbara de Pinto', 1),
(871, 'Santa Catalina', 1),
(872, 'Santa Fé de Antioquia', 1),
(873, 'Santa Genoveva de Docorodó', 1),
(874, 'Santa Helena del Opón', 1),
(875, 'Santa Isabel', 1),
(876, 'Santa Lucía', 1),
(877, 'Santa Marta', 1),
(879, 'Santa María', 1),
(881, 'Santa Rosa', 1),
(882, 'Santa Rosa de Cabal', 1),
(883, 'Santa Rosa de Osos', 1),
(884, 'Santa Rosa de Viterbo', 1),
(885, 'Santa Rosa del Sur', 1),
(886, 'Santa Rosalía', 1),
(887, 'Santa Sofía', 1),
(888, 'Santana', 1),
(889, 'Santander de Quilichao', 1),
(891, 'Santiago', 1),
(892, 'Santo Domingo', 1),
(893, 'Santo Tomás', 1),
(894, 'Santuario', 1),
(895, 'Santuario', 1),
(896, 'Sapuyes', 1),
(897, 'Saravena', 1),
(898, 'Sardinata', 1),
(899, 'Sasaima', 1),
(900, 'Sativanorte', 1),
(901, 'Sativasur', 1),
(902, 'Segovia', 1),
(903, 'Sesquilé', 1),
(904, 'Sevilla', 1),
(905, 'Siachoque', 1),
(906, 'Sibaté', 1),
(907, 'Sibundoy', 1),
(908, 'Silos', 1),
(909, 'Silvania', 1),
(910, 'Silvia', 1),
(911, 'Simacota', 1),
(912, 'Simijaca', 1),
(913, 'Simití', 1),
(914, 'Sincelejo', 1),
(915, 'Sincé', 1),
(916, 'Sipí', 1),
(917, 'Sitionuevo', 1),
(918, 'Soacha', 1),
(919, 'Soatá', 1),
(920, 'Socha', 1),
(921, 'Socorro', 1),
(922, 'Socotá', 1),
(923, 'Sogamoso', 1),
(924, 'Solano', 1),
(925, 'Soledad', 1),
(926, 'Solita', 1),
(927, 'Somondoco', 1),
(928, 'Sonsón', 1),
(929, 'Sopetrán', 1),
(930, 'Soplaviento', 1),
(931, 'Sopó', 1),
(932, 'Sora', 1),
(933, 'Soracá', 1),
(934, 'Sotaquirá', 1),
(935, 'Sotara (Paispamba)', 1),
(936, 'Sotomayor (Los Andes)', 1),
(937, 'Suaita', 1),
(938, 'Suan', 1),
(939, 'Suaza', 1),
(940, 'Subachoque', 1),
(943, 'Sucre', 1),
(944, 'Suesca', 1),
(945, 'Supatá', 1),
(946, 'Supía', 1),
(947, 'Suratá', 1),
(948, 'Susa', 1),
(949, 'Susacón', 1),
(950, 'Sutamarchán', 1),
(951, 'Sutatausa', 1),
(952, 'Sutatenza', 1),
(954, 'Suárez', 1),
(955, 'Sácama', 1),
(956, 'Sáchica', 1),
(957, 'Tabio', 1),
(958, 'Tadó', 1),
(959, 'Talaigua Nuevo', 1),
(960, 'Tamalameque', 1),
(961, 'Tame', 1),
(962, 'Taminango', 1),
(963, 'Tangua', 1),
(964, 'Taraira', 1),
(965, 'Tarazá', 1),
(966, 'Tarqui', 1),
(967, 'Tarso', 1),
(968, 'Tasco', 1),
(969, 'Tauramena', 1),
(970, 'Tausa', 1),
(971, 'Tello', 1),
(972, 'Tena', 1),
(973, 'Tenerife', 1),
(974, 'Tenjo', 1),
(975, 'Tenza', 1),
(976, 'Teorama', 1),
(977, 'Teruel', 1),
(978, 'Tesalia', 1),
(979, 'Tibacuy', 1),
(980, 'Tibaná', 1),
(981, 'Tibasosa', 1),
(982, 'Tibirita', 1),
(983, 'Tibú', 1),
(984, 'Tierralta', 1),
(985, 'Timaná', 1),
(986, 'Timbiquí', 1),
(987, 'Timbío', 1),
(988, 'Tinjacá', 1),
(989, 'Tipacoque', 1),
(990, 'Tiquisio (Puerto Rico)', 1),
(991, 'Titiribí', 1),
(992, 'Toca', 1),
(993, 'Tocaima', 1),
(994, 'Tocancipá', 1),
(995, 'Toguí', 1),
(996, 'Toledo', 1),
(997, 'Toledo', 1),
(998, 'Tolú', 1),
(999, 'Tolú Viejo', 1),
(1000, 'Tona', 1),
(1001, 'Topagá', 1),
(1002, 'Topaipí', 1),
(1003, 'Toribío', 1),
(1004, 'Toro', 1),
(1005, 'Tota', 1),
(1006, 'Totoró', 1),
(1007, 'Trinidad', 1),
(1008, 'Trujillo', 1),
(1009, 'Tubará', 1),
(1010, 'Tuchín', 1),
(1011, 'Tulúa', 1),
(1012, 'Tumaco', 1),
(1013, 'Tunja', 1),
(1014, 'Tunungua', 1),
(1015, 'Turbaco', 1),
(1016, 'Turbaná', 1),
(1017, 'Turbo', 1),
(1018, 'Turmequé', 1),
(1019, 'Tuta', 1),
(1020, 'Tutasá', 1),
(1021, 'Támara', 1),
(1022, 'Támesis', 1),
(1023, 'Túquerres', 1),
(1024, 'Ubalá', 1),
(1025, 'Ubaque', 1),
(1026, 'Ubaté', 1),
(1027, 'Ulloa', 1),
(1028, 'Une', 1),
(1029, 'Unguía', 1),
(1030, 'Unión Panamericana (ÁNIMAS)', 1),
(1031, 'Uramita', 1),
(1032, 'Uribe', 1),
(1033, 'Uribia', 1),
(1034, 'Urrao', 1),
(1035, 'Urumita', 1),
(1036, 'Usiacuri', 1),
(1037, 'Valdivia', 1),
(1038, 'Valencia', 1),
(1039, 'Valle de San José', 1),
(1040, 'Valle de San Juan', 1),
(1041, 'Valle del Guamuez', 1),
(1042, 'Valledupar', 1),
(1043, 'Valparaiso', 1),
(1044, 'Valparaiso', 1),
(1045, 'Vegachí', 1),
(1046, 'Venadillo', 1),
(1047, 'Venecia', 1),
(1048, 'Venecia (Ospina Pérez)', 1),
(1049, 'Ventaquemada', 1),
(1050, 'Vergara', 1),
(1051, 'Versalles', 1),
(1052, 'Vetas', 1),
(1053, 'Viani', 1),
(1054, 'Vigía del Fuerte', 1),
(1055, 'Vijes', 1),
(1056, 'Villa Caro', 1),
(1057, 'Villa Rica', 1),
(1058, 'Villa de Leiva', 1),
(1059, 'Villa del Rosario', 1),
(1060, 'Villagarzón', 1),
(1061, 'Villagómez', 1),
(1062, 'Villahermosa', 1),
(1063, 'Villamaría', 1),
(1067, 'Villanueva', 1),
(1068, 'Villapinzón', 1),
(1069, 'Villarrica', 1),
(1070, 'Villavicencio', 1),
(1071, 'Villavieja', 1),
(1072, 'Villeta', 1),
(1073, 'Viotá', 1),
(1074, 'Viracachá', 1),
(1075, 'Vista Hermosa', 1),
(1076, 'Viterbo', 1),
(1077, 'Vélez', 1),
(1078, 'Yacopí', 1),
(1079, 'Yacuanquer', 1),
(1080, 'Yaguará', 1),
(1081, 'Yalí', 1),
(1082, 'Yarumal', 1),
(1083, 'Yolombó', 1),
(1084, 'Yondó (Casabe)', 1),
(1085, 'Yopal', 1),
(1086, 'Yotoco', 1),
(1087, 'Yumbo', 1),
(1088, 'Zambrano', 1),
(1089, 'Zapatoca', 1),
(1090, 'Zapayán (PUNTA DE PIEDRAS)', 1),
(1091, 'Zaragoza', 1),
(1092, 'Zarzal', 1),
(1093, 'Zetaquirá', 1),
(1094, 'Zipacón', 1),
(1095, 'Zipaquirá', 1),
(1096, 'Zona Bananera (PRADO - SEVILLA)', 1),
(1097, 'Ábrego', 1),
(1098, 'Íquira', 1),
(1099, 'Úmbita', 1),
(1100, 'Útica', 1);

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
-- Indices de la tabla `consecutivo`
--
ALTER TABLE `consecutivo`
  ADD PRIMARY KEY (`id_consecutivo`);

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
-- Indices de la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD PRIMARY KEY (`id_municipio`);

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
-- AUTO_INCREMENT de la tabla `consecutivo`
--
ALTER TABLE `consecutivo`
  MODIFY `id_consecutivo` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id_contacto` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `cuentas_cobro`
--
ALTER TABLE `cuentas_cobro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
-- AUTO_INCREMENT de la tabla `municipios`
--
ALTER TABLE `municipios`
  MODIFY `id_municipio` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1102;

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
