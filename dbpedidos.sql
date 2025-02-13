-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-04-2024 a las 02:12:39
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
-- Base de datos: `dbpedidos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `codCar` int(11) NOT NULL,
  `codProd` int(11) NOT NULL,
  `cantCar` int(11) NOT NULL,
  `codCli` int(11) NOT NULL,
  `regCar` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `codCateg` int(11) NOT NULL,
  `nomCateg` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`codCateg`, `nomCateg`) VALUES
(1, 'Desayuno'),
(2, 'Almuerzo'),
(3, 'Cena');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `codCli` int(11) NOT NULL,
  `dni` char(9) DEFAULT NULL,
  `nomCli` varchar(100) DEFAULT NULL,
  `appCli` varchar(100) DEFAULT NULL,
  `apmCli` varchar(100) DEFAULT NULL,
  `emaCli` varchar(100) DEFAULT NULL,
  `celCli` int(9) DEFAULT NULL,
  `sexCli` char(1) NOT NULL COMMENT 'M maculino; F femenino',
  `dirCli` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pasCli` varchar(100) DEFAULT NULL,
  `estCli` tinyint(1) NOT NULL COMMENT '1 activo; 2 desactivo',
  `imgCli` varchar(255) NOT NULL,
  `regCli` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`codCli`, `dni`, `nomCli`, `appCli`, `apmCli`, `emaCli`, `celCli`, `sexCli`, `dirCli`, `pasCli`, `estCli`, `imgCli`, `regCli`) VALUES
(2, NULL, 'Santiago', 'Limas', 'Ramirez', 'cliente2@gmail.com', 902290568, 'M', 'Av.cusco', 'pKehlaKY ', 1, 'assets/uploads/2023/08/2_foto.jpg', '2023-08-15 00:31:21'),
(3, NULL, 'Flor', 'Ramirez', 'Limas', 'cliente3@gmail.com', 902290561, 'F', 'Av.cusco', 'pKehlaKY', 1, 'assets/uploads/2023/08/3_foto.jpg', '2023-08-16 00:40:20'),
(6, NULL, 'Daniel', 'Limas', 'Ramirez', 'cliente6@gmail.com', 902290554, 'M', 'Abacay-Apurimac', 'pKehlaKY', 1, 'assets/uploads/2023/09/6_foto.jpg', '2023-08-16 00:48:05'),
(7, NULL, 'Florcita', 'Ramirez', 'Limas', 'cliente7@gmail.com', 987654321, 'M', 'Cusco-peru', 'pKehlaKY', 1, 'assets/uploads/2023/08/7_foto.jpg', '2023-08-16 00:51:54'),
(9, NULL, 'Anthony', 'Ramirez', 'Limas', 'cliente9@gmail.com', 902290566, 'F', 'Abacay-Apurimac', 'pKehlaKY', 1, 'assets/uploads/2023/05/perfil.png', '2023-08-17 23:32:42'),
(12, NULL, 'Dany', 'Ramirez', 'Limas', 'dany@gmail.com', 987654322, 'M', 'Av.peru', 'pKehlaKY', 1, 'assets/uploads/2023/05/perfil.png', '2023-11-02 17:31:56'),
(18, '32610560', 'CARLOS ANTONIO', 'LIÑAN', 'CARDENAS', 'usuario6@gmail.com', 902290560, 'M', 'Av.cusco', 'rKWgk6aSlpVi', 1, 'assets/img/noimagen.jpg', '2024-03-28 16:45:44'),
(19, '71104924', 'DANY SANTIAGO', 'RAMIREZ', 'LIMAS', '201067@unamba.edu.pe', 902290569, 'M', 'Av.cusco', 'pKehlaKY', 1, 'assets/uploads/2023/05/perfil.png', '2024-04-08 18:52:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedido`
--

CREATE TABLE `detalle_pedido` (
  `codDetPedi` int(11) NOT NULL,
  `codPedi` int(11) NOT NULL,
  `codProd` int(11) NOT NULL,
  `precioProd` double NOT NULL,
  `cantProd` int(11) NOT NULL,
  `totalProd` double NOT NULL,
  `item` int(11) NOT NULL,
  `regDetPedi` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `detalle_pedido`
--

INSERT INTO `detalle_pedido` (`codDetPedi`, `codPedi`, `codProd`, `precioProd`, `cantProd`, `totalProd`, `item`, `regDetPedi`) VALUES
(95, 95, 37, 5, 4, 20, 0, '2023-11-14 22:46:57'),
(96, 96, 35, 10, 1, 10, 0, '2023-11-15 16:20:41'),
(97, 96, 39, 12, 3, 36, 0, '2023-11-15 16:20:41'),
(102, 99, 1, 11, 3, 33, 0, '2024-03-06 19:24:19'),
(104, 101, 1, 11, 1, 11, 0, '2024-03-27 19:14:24'),
(105, 101, 34, 6, 2, 12, 0, '2024-03-27 19:14:24'),
(106, 101, 38, 15, 1, 15, 0, '2024-03-27 19:14:24'),
(107, 105, 1, 11, 2, 22, 0, '2024-04-08 18:54:02'),
(108, 105, 35, 10, 1, 10, 0, '2024-04-08 18:54:02'),
(109, 105, 38, 15, 1, 15, 0, '2024-04-08 18:54:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `codPedi` int(11) NOT NULL,
  `codCli` int(11) DEFAULT NULL,
  `codUsu` int(11) DEFAULT NULL,
  `totalPrecio` decimal(10,2) DEFAULT NULL,
  `envio` int(11) NOT NULL,
  `estado` char(10) DEFAULT NULL COMMENT '1 en sin confirmar; 2 en proceso; 3 entregado',
  `latitud` double DEFAULT NULL,
  `longitud` double DEFAULT NULL,
  `regPedi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`codPedi`, `codCli`, `codUsu`, `totalPrecio`, `envio`, `estado`, `latitud`, `longitud`, `regPedi`) VALUES
(95, 7, 52, 30.00, 10, '2', -13.619533, -72.8683757, '2023-11-14 22:46:57'),
(96, 6, 49, 56.00, 10, '2', -13.6195307, -72.8683637, '2023-11-15 16:20:41'),
(99, 2, 50, 43.00, 10, '1', -13.6177114, -72.8674954, '2024-03-06 19:24:19'),
(101, 3, 10, 48.00, 10, '1', 0, 0, '2024-03-27 19:14:24'),
(105, 19, 52, 57.00, 10, '2', -13.617547159577, -72.867885464855, '2024-04-08 18:54:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idProd` int(11) NOT NULL,
  `codCateg` int(11) DEFAULT NULL,
  `nomProd` varchar(100) DEFAULT NULL,
  `descripcion` varchar(300) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `stok` int(100) DEFAULT NULL,
  `stok_min` char(100) DEFAULT NULL,
  `imagen1` varchar(255) DEFAULT NULL,
  `imagen2` varchar(255) DEFAULT NULL,
  `imagen3` varchar(255) DEFAULT NULL,
  `estProd` tinyint(1) DEFAULT NULL COMMENT '1 agotado; 2 disponible',
  `envio` double DEFAULT NULL,
  `regProd` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProd`, `codCateg`, `nomProd`, `descripcion`, `precio`, `stok`, `stok_min`, `imagen1`, `imagen2`, `imagen3`, `estProd`, `envio`, `regProd`) VALUES
(1, 3, 'Arroz con pollo', 'Es  un menú clásico', 11.00, 2, '2', 'assets/uploads/2024/03/1_imagen1.png', 'assets/uploads/2024/03/1_imagen2.jpg', 'assets/uploads/2024/03/1_imagen3.jpg', 1, NULL, '2023-08-09'),
(15, 2, 'Estofado de pollo', 'Muy agradable', 8.00, 5, '1', 'assets/uploads/2023/09/15_imagen1.jpg', 'assets/uploads/2023/08/15_imagen2.png', NULL, 1, NULL, '2023-08-09'),
(34, 2, 'Arroz Cubano', 'El arroz a la cubana es un plato de la cocina española y muy típico en el restaurant Latino, de origen español en los tiempos de la Capitanía General de Cuba', 6.00, 12, '1', 'assets/uploads/2024/03/34_imagen1.jpg', 'assets/uploads/2024/03/34_imagen2.jpg', 'assets/uploads/2024/03/34_imagen3.jpg', 1, NULL, '2023-08-10'),
(35, 3, 'Trucha Frita', 'Este plato es típico de la sierra del Perú, es muy rico y nutritivo. ', 10.00, 2, '1', 'assets/uploads/2024/03/35_imagen1.jpg', 'assets/uploads/2024/03/35_imagen2.jpg', 'assets/uploads/2024/03/35_imagen3.jpg', 1, NULL, '2023-08-10'),
(37, 1, 'Desayuno', 'Maca con leche', 5.00, 12, '2', 'assets/uploads/2024/03/37_imagen1.jpg', 'assets/uploads/2023/08/37_imagen2.png', 'assets/uploads/2023/08/37_imagen3.jpg', 1, NULL, '2023-08-11'),
(38, 2, 'Ceviche', 'Ceviche de concha', 15.00, 10, '2', 'assets/uploads/2023/08/38_imagen1.jpg', 'assets/uploads/2023/08/38_imagen2.png', 'assets/uploads/2023/08/38_imagen3.jpg', 1, NULL, '2023-08-11'),
(39, 1, 'Caldo de Gallina', 'Cuando el invierno empieza a sentirse el delicioso Caldo de Gallina es lo mejor para calentarnos y enfrentarlo. Este caldo es muy popular en todo el Perú, preparado a base de carne de gallina y verduras, es muy consumido,  porque nos ayuda a aliviar', 12.00, 10, '5', 'assets/uploads/2023/10/39_imagen1.jpeg', 'assets/uploads/2023/10/39_imagen2.jpg', 'assets/uploads/2023/10/39_imagen3.jpg', 1, NULL, '2023-10-13'),
(40, 2, 'Ulluquito', 'El olluco es un producto típico de la sierra de Perú', 8.00, 20, '2', 'assets/uploads/2024/03/40_imagen1.jpg', NULL, NULL, 1, NULL, '2024-03-20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `codUsu` int(11) NOT NULL,
  `nomUsu` varchar(100) DEFAULT NULL,
  `appUsu` varchar(100) DEFAULT NULL,
  `apmUsu` varchar(100) DEFAULT NULL,
  `docUsu` char(15) DEFAULT NULL,
  `emaUsu` varchar(100) DEFAULT NULL,
  `celUsu` char(9) DEFAULT NULL,
  `sexUsu` char(1) DEFAULT NULL COMMENT 'Femenino F; Masculino M',
  `pasUsu` varchar(50) DEFAULT NULL,
  `priUsu` tinyint(2) DEFAULT NULL COMMENT '1 master: 2 Normal',
  `estUsu` tinyint(1) DEFAULT NULL COMMENT '0 inactivo; 1 Activo',
  `superusuario` tinyint(1) DEFAULT NULL,
  `imgUsu` varchar(150) DEFAULT NULL,
  `regUsu` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`codUsu`, `nomUsu`, `appUsu`, `apmUsu`, `docUsu`, `emaUsu`, `celUsu`, `sexUsu`, `pasUsu`, `priUsu`, `estUsu`, `superusuario`, `imgUsu`, `regUsu`) VALUES
(1, 'Santiago', 'Ramirez', 'Limas', '48682316', 'santiago@gmail.com', '902290569', 'M', 'pKehlaKY', 1, 1, 1, 'assets/uploads/2023/10/1_foto.jpg', NULL),
(2, 'Dany', 'Ramirez', 'Limas', '71234565', 'ramirez@gmail.com', '902290564', 'M', 'pKehlaKY', 1, 1, 0, 'assets/uploads/2023/07/2_foto.png', NULL),
(10, 'Dany', 'Ramirez', 'Limas', '12345671', 'usuario1@gmail.com', '902290560', 'M', 'rKWgk6aSlpVr', 2, 1, 1, 'assets/uploads/2023/08/10_foto.png', '2023-07-07 02:12:04'),
(49, 'Pablo', 'Ramirez', 'Limas', '71104924', 'usuario2@gmail.com', '902290562', 'M', 'pKehlaKY', 2, 1, 1, 'assets/uploads/2023/08/49_foto.png', '2023-07-08 23:19:00'),
(50, 'Dany', 'Ramirez', 'Limas', '71104925', 'usuario13@gmail.com', '902290575', 'M', 'pKehlaKY', 2, 1, 1, '../assets/uploads/noimagen', '2023-07-09 00:13:11'),
(52, 'CARLOS ANTONIO', 'LIÑAN', 'CARDENAS', '32610560', 'empleado@gmail.com', '902290561', 'F', 'pqekkp2Xl48=', 2, 1, 1, 'assets/uploads/noimagen', '2024-03-28 22:19:44'),
(53, 'ELEAZAR', 'VASQUEZ', 'PANIAGUA', '31610460', 'usuario3@gmail.com', '902290563', 'M', 'pqakkp2Wl48=', 1, 1, 1, 'assets/uploads/noimagen', '2024-03-28 22:42:49'),
(54, 'Anthony', 'Ramirez', 'Limas', '12345678', 'usuario6@gmail.com', '902290565', 'M', 'pKehlaKYmJc=', 1, 1, NULL, 'assets/uploads/2024/03/54_foto.png', '2024-03-29 00:09:02'),
(55, 'ANGHIE JEMIMA', 'ABAD', 'GUERRERO', '71102423', 'usuario7@gmail.com', '987654321', 'F', 'qqafkZ+Wk5I=', 1, 1, 1, 'assets/uploads/noimagen', '2024-03-29 00:19:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_login`
--

CREATE TABLE `usuario_login` (
  `codUL` int(11) NOT NULL,
  `codUsu` int(11) NOT NULL,
  `regUL` datetime DEFAULT NULL,
  `claUL` varchar(15) NOT NULL,
  `estUL` tinyint(2) DEFAULT NULL COMMENT '1 activo; 0: finalizado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuario_login`
--

INSERT INTO `usuario_login` (`codUL`, `codUsu`, `regUL`, `claUL`, `estUL`) VALUES
(1, 1, '2023-05-25 00:40:44', '', 0),
(2, 1, '2023-05-25 00:47:54', '', 0),
(3, 1, '2023-05-26 14:48:14', '', 0),
(4, 1, '2023-05-26 14:48:16', '', 0),
(5, 1, '2023-05-26 14:48:17', '', 0),
(6, 1, '2023-05-26 14:48:18', '', 0),
(7, 1, '2023-05-26 14:48:18', '', 0),
(8, 1, '2023-05-26 14:48:18', '', 0),
(9, 1, '2023-05-26 14:48:18', '', 0),
(10, 1, '2023-05-26 14:48:19', '', 0),
(11, 1, '2023-05-26 14:48:19', '', 0),
(12, 1, '2023-05-26 14:48:54', '', 0),
(13, 1, '2023-05-26 14:48:55', '', 0),
(14, 1, '2023-05-26 14:49:01', '', 0),
(15, 1, '2023-05-26 14:49:03', '', 0),
(16, 1, '2023-05-26 14:49:27', '', 0),
(17, 1, '2023-05-26 14:49:59', '', 0),
(18, 1, '2023-05-26 14:50:00', '', 0),
(19, 1, '2023-05-26 14:50:00', '', 0),
(20, 1, '2023-05-26 14:50:10', '', 0),
(21, 1, '2023-05-26 14:51:02', '', 0),
(22, 1, '2023-05-26 14:51:03', '', 0),
(23, 1, '2023-05-26 14:51:03', '', 0),
(24, 1, '2023-05-26 14:51:03', '', 0),
(25, 1, '2023-05-26 14:51:03', '', 0),
(26, 1, '2023-05-26 14:51:03', '', 0),
(27, 1, '2023-05-26 14:51:04', '', 0),
(28, 1, '2023-05-26 14:51:04', '', 0),
(29, 1, '2023-05-26 14:51:28', '', 0),
(30, 1, '2023-05-26 14:51:28', '', 0),
(31, 1, '2023-05-26 14:51:28', '', 0),
(32, 1, '2023-05-26 14:51:28', '', 0),
(33, 1, '2023-05-26 14:53:00', '', 0),
(34, 1, '2023-05-26 14:53:52', '', 0),
(35, 1, '2023-05-26 14:54:17', '', 0),
(36, 1, '2023-05-26 14:54:18', '', 0),
(37, 1, '2023-05-26 14:54:19', '', 0),
(38, 1, '2023-05-26 14:54:19', '', 0),
(39, 1, '2023-05-26 14:54:19', '', 0),
(40, 1, '2023-05-26 14:54:19', '', 0),
(41, 1, '2023-05-26 14:54:20', '', 0),
(42, 1, '2023-05-26 14:54:20', '', 0),
(43, 1, '2023-05-26 14:54:20', '', 0),
(44, 1, '2023-05-26 14:56:38', '', 0),
(45, 1, '2023-05-26 14:56:40', '', 0),
(46, 1, '2023-05-26 14:56:45', '', 0),
(47, 1, '2023-05-26 14:56:59', '', 0),
(48, 1, '2023-05-26 14:57:02', '', 0),
(49, 1, '2023-05-26 15:02:32', '', 0),
(50, 1, '2023-05-26 15:02:33', '', 0),
(51, 1, '2023-05-26 15:03:23', '', 0),
(52, 1, '2023-05-26 15:05:24', '', 0),
(53, 1, '2023-05-26 15:06:43', '', 0),
(54, 1, '2023-05-26 15:12:59', '', 0),
(55, 1, '2023-05-26 15:21:18', '', 0),
(56, 1, '2023-05-26 15:25:00', '', 0),
(57, 1, '2023-05-31 16:18:29', '', 0),
(58, 1, '2023-05-31 17:43:47', '', 0),
(59, 1, '2023-06-07 17:23:41', '', 0),
(60, 1, '2023-06-07 17:47:13', '475uaju2kgb', 1),
(61, 2, '2023-07-02 22:10:25', '1n59h8060kf', 1),
(62, 2, '2023-07-05 23:45:27', '7df90krikdu', 1),
(63, 2, '2023-07-06 22:49:53', 'nb1a4d23g6j', 1),
(64, 10, '2023-07-07 02:13:17', 'midc1glsib@', 1),
(65, 2, '2023-07-07 02:14:39', 'b5ikh76wnh7', 1),
(66, 2, '2023-07-07 02:16:13', 'gn2wi81gj0u', 1),
(67, 10, '2023-07-07 02:16:47', 'nidu228j@3c', 1),
(68, 49, '2023-07-08 23:19:46', 'f8gi5dbntb6', 1),
(69, 2, '2023-07-09 11:06:33', '54ikr448lrl', 1),
(70, 2, '2023-08-08 23:51:58', '39ziv5l8i38', 1),
(71, 49, '2023-08-08 23:56:13', 'uaclz88neej', 1),
(72, 50, '2023-08-09 00:09:04', 'mgrncd3mcmn', 1),
(73, 49, '2023-08-09 00:19:06', 'z5f087f19j@', 1),
(74, 2, '2023-08-09 00:20:53', 'uae@vune75n', 1),
(75, 49, '2023-08-09 11:42:48', 'bctv6s5rd93', 1),
(76, 49, '2023-08-09 11:56:24', 'm1jt6fw0uis', 1),
(77, 2, '2023-08-09 11:59:03', '@3vrcztel24', 1),
(78, 2, '2023-08-10 11:04:13', 'wj6rlhjibzn', 1),
(79, 2, '2023-08-10 17:15:26', '36@hlshn3ur', 1),
(80, 2, '2023-08-11 16:22:10', '33h3@cef4hw', 1),
(81, 2, '2023-08-17 00:37:45', 'uc2cbl5cg8t', 1),
(82, 2, '2023-08-17 22:17:31', '6a16@na0gfc', 1),
(83, 2, '2023-08-17 22:44:47', 'tce4tg7ima9', 1),
(84, 2, '2023-08-18 16:57:33', 'mb@15zkrw5u', 1),
(85, 2, '2023-08-19 23:40:40', '96u4nba9g4d', 1),
(86, 2, '2023-08-19 23:44:17', 'j6dd98fjl5s', 1),
(87, 2, '2023-08-20 21:36:43', 'at8rfk8aj@c', 1),
(88, 2, '2023-08-25 21:58:59', 'sn5fdgc0etl', 1),
(89, 10, '2023-08-26 23:09:52', '6@974a738r0', 1),
(90, 1, '2023-08-28 17:52:51', 'lan04mz8uji', 1),
(91, 2, '2023-08-28 18:25:15', '@kr5k40rbhl', 1),
(92, 1, '2023-08-28 22:42:21', 'l6@06ui6r1b', 1),
(93, 2, '2023-08-28 22:59:46', '7i2kbcn0dv5', 1),
(94, 2, '2023-08-29 18:08:48', 'il0aicm@0bb', 1),
(95, 1, '2023-08-29 18:09:11', '@alf5jfzsd4', 1),
(96, 2, '2023-08-31 18:01:43', '6kmdz386vzb', 1),
(97, 1, '2023-08-31 22:30:30', 'f8b@2la6jhi', 1),
(98, 2, '2023-09-02 12:14:23', 'sw69cfrefns', 1),
(99, 1, '2023-09-02 16:44:51', '3irfzf2cdk3', 1),
(100, 2, '2023-09-02 16:45:19', 'iciwdemlgfj', 1),
(101, 2, '2023-09-02 22:37:07', 'ut3ve12vt9a', 1),
(102, 2, '2023-09-02 22:44:28', '@2kwstz4t6n', 1),
(103, 2, '2023-09-02 23:33:47', '5jjjfm56ed9', 1),
(104, 2, '2023-09-03 20:49:33', 'bv4viwzif@v', 1),
(105, 2, '2023-09-03 22:20:03', 'jm6@cst4m2u', 1),
(106, 2, '2023-09-04 10:47:52', 'jaws8dvkrbv', 1),
(107, 2, '2023-09-04 22:02:07', 'inmgr5giiru', 1),
(108, 2, '2023-09-05 21:14:01', '6dtvubszlki', 1),
(109, 10, '2023-09-05 21:19:32', 'w801z@t7vh7', 1),
(110, 50, '2023-09-05 21:22:51', '4j1@g9shdfs', 1),
(111, 50, '2023-09-05 21:27:11', '5fk5jul3gre', 1),
(112, 2, '2023-09-05 21:27:25', '3sjeh7bjj82', 1),
(113, 10, '2023-09-05 21:29:28', 'k4619@wgkn@', 1),
(114, 10, '2023-09-05 21:30:48', '4z4s45h5n5z', 1),
(115, 2, '2023-09-05 21:31:07', 'dhecac39cr@', 1),
(116, 2, '2023-09-05 21:32:04', 'ejraw712bid', 1),
(117, 49, '2023-09-05 21:32:53', '4dmbk1fj994', 1),
(118, 49, '2023-09-05 21:34:08', 'v1uhwkj1bhd', 1),
(119, 49, '2023-09-05 21:34:32', 'tlaeiw3tcak', 1),
(120, 2, '2023-09-05 21:38:46', '8d3mnm5bic6', 1),
(121, 49, '2023-09-05 21:39:46', 'vs4t3agt146', 1),
(122, 1, '2023-09-05 21:50:57', '@7r5r@ilkhu', 1),
(123, 10, '2023-09-05 22:12:47', '2d336z@dw4c', 1),
(124, 2, '2023-09-05 22:19:41', '@14c0vm@zs9', 1),
(125, 49, '2023-09-05 22:24:47', '0cadc0tmien', 1),
(126, 2, '2023-09-07 21:33:02', 'wbhncg7scef', 1),
(127, 2, '2023-09-11 17:13:57', 'l8@@wrdg8ga', 1),
(128, 2, '2023-09-11 17:19:29', 'n9r346l7wjl', 1),
(129, 2, '2023-09-11 17:19:42', 'th8v3251fc8', 1),
(130, 2, '2023-09-11 17:20:01', 'ii9ndzm8h@l', 1),
(131, 2, '2023-09-11 17:20:14', '1d8k622gc73', 1),
(132, 2, '2023-09-16 17:32:07', '22b03wzb16l', 1),
(133, 2, '2023-09-27 18:47:20', 'a1c6igs42wi', 1),
(134, 2, '2023-09-29 21:57:42', '236lb87z88m', 1),
(135, 2, '2023-09-30 21:41:09', 'sekn2s24eh3', 1),
(136, 2, '2023-10-06 21:20:32', '63g@1cmz3g3', 1),
(137, 2, '2023-10-07 21:10:54', '53v4rk7e84s', 1),
(138, 2, '2023-10-07 22:24:21', '8ssn3tjv35t', 1),
(139, 2, '2023-10-09 17:03:01', 'kij5r9h5hsn', 1),
(140, 2, '2023-10-09 22:42:40', 'nae3855lt6w', 1),
(141, 2, '2023-10-09 22:49:18', 'zrhggk1wvzh', 1),
(142, 1, '2023-10-09 22:56:55', 'i7@c9ecj4dd', 1),
(143, 2, '2023-10-10 21:16:30', 'kt5136544br', 1),
(144, 2, '2023-10-10 22:43:43', 'l4ch1j8eg79', 1),
(145, 2, '2023-10-11 16:24:53', '92dk97zn6am', 1),
(146, 49, '2023-10-12 00:05:43', 'nfgd154hkkn', 1),
(147, 49, '2023-10-13 17:18:57', 'cc59amngri5', 1),
(148, 1, '2023-10-13 21:36:59', '35r8mimmg44', 1),
(149, 1, '2023-10-14 21:39:28', 'w7rdmrwv4wc', 1),
(150, 2, '2023-10-18 22:19:45', '4ihw23m1fgw', 1),
(151, 1, '2023-10-23 17:44:16', 'tam1vhh26d9', 1),
(152, 1, '2023-10-26 22:27:25', 'ir6h56tg79i', 1),
(153, 1, '2023-10-26 22:51:19', 'afun4@0w88i', 1),
(154, 1, '2023-10-27 00:06:16', 'wz7i519rz8g', 1),
(155, 1, '2023-10-27 11:41:27', 'ivbrhu29e0g', 1),
(156, 1, '2023-10-27 18:37:31', 'ni573fltkb5', 1),
(157, 2, '2023-10-27 21:23:49', 'chgru4tmi2d', 1),
(158, 1, '2023-10-27 22:36:15', '958cu2d6amu', 1),
(159, 1, '2023-10-27 22:44:40', '@anizv4b3mv', 1),
(160, 49, '2023-10-27 22:57:17', 'tejcj1jclha', 1),
(161, 2, '2023-10-27 23:09:12', '8i6t4m3rec8', 1),
(162, 49, '2023-10-27 23:09:29', '9z0kkgmv119', 1),
(163, 1, '2023-10-28 22:32:22', 'hfbv1u1b3g5', 1),
(164, 1, '2023-10-28 22:34:20', '6dhsv@8zs8f', 1),
(165, 49, '2023-10-28 22:40:46', 'w17htv091et', 1),
(166, 1, '2023-10-28 22:41:17', '990kjcvn6ei', 1),
(167, 1, '2023-10-30 22:08:39', 'w92eum74nwt', 1),
(168, 2, '2023-11-01 21:47:22', 'twwrwtua4@a', 1),
(169, 2, '2023-11-02 17:06:03', '19iim5sw@wh', 1),
(170, 49, '2023-11-02 17:11:42', 's5hk6f0j94w', 1),
(171, 2, '2023-11-02 17:35:14', '3rjfd7aenr2', 1),
(172, 49, '2023-11-02 17:38:43', 'ugtreik@0rr', 1),
(173, 2, '2023-11-08 17:47:04', 'twfsn8ds8gm', 1),
(174, 1, '2023-11-11 23:18:05', '2a21ldgsrj1', 1),
(175, 1, '2023-11-11 23:18:06', 'dj15tuge0le', 1),
(176, 1, '2023-11-11 23:23:11', 'f6nvkg60@jr', 1),
(177, 1, '2023-11-11 23:23:42', 'hsfsali14be', 1),
(178, 2, '2023-11-13 18:41:03', 'a2f12gtnk04', 1),
(179, 2, '2023-11-14 16:43:14', 'lshel7uzedg', 1),
(180, 49, '2023-11-14 21:49:43', '@s5nz8ttjcn', 1),
(181, 2, '2023-11-14 22:07:49', 'iauut8m3dzb', 1),
(182, 49, '2023-11-14 22:08:25', '@lzc656zk3i', 1),
(183, 49, '2023-11-14 22:14:25', 'c0lvf1banlv', 1),
(184, 49, '2023-11-14 22:16:37', 'b6h5w40ic66', 1),
(185, 2, '2023-11-14 22:24:30', 'vj44htcb01v', 1),
(186, 2, '2023-11-14 22:31:14', '44j08bbb5k7', 1),
(187, 2, '2023-11-15 16:20:56', 'tb8w0btmhhs', 1),
(188, 10, '2023-11-15 21:59:07', 'dc7a@d40ggw', 1),
(189, 2, '2023-11-15 21:59:46', '@jmgrw5hnls', 1),
(190, 2, '2023-11-20 17:14:32', '6s1rc2nzein', 1),
(191, 2, '2023-11-20 17:21:07', 'll3m5u0ts87', 1),
(192, 2, '2023-11-20 17:21:22', 'b5429s@ed2b', 1),
(193, 2, '2023-11-21 19:44:00', 'egkz6vid0fh', 1),
(194, 2, '2024-01-18 18:55:01', 'i2awlcl157l', 1),
(195, 2, '2024-01-28 15:44:10', 'trbhme1@746', 1),
(196, 49, '2024-01-28 15:47:56', '1b8@1s6li7i', 1),
(197, 2, '2024-01-28 16:19:11', 'unkbh796h87', 1),
(198, 2, '2024-03-04 09:44:31', 'fmzibnkbcar', 1),
(199, 2, '2024-03-06 19:24:38', '0ewl1@@hedc', 1),
(201, 2, '2024-03-08 22:34:42', '1hvg7hjhb20', 1),
(202, 49, '2024-03-08 22:39:46', 're3hrf5jzr6', 1),
(203, 2, '2024-03-08 22:44:46', 'zzzumidkg1w', 1),
(204, 49, '2024-03-10 18:42:03', 'uaj3m4i5j0@', 1),
(205, 2, '2024-03-18 17:46:02', 'rsa3mrlr8wc', 1),
(206, 2, '2024-03-18 17:46:02', 'tbecuhs8fsf', 1),
(207, 2, '2024-03-20 21:27:11', 'tn@a2u3mb49', 1),
(208, 10, '2024-03-20 21:30:51', 'h4udurbtcuz', 1),
(209, 2, '2024-03-20 22:53:58', 'ltsus9u1bs7', 1),
(210, 10, '2024-03-21 10:15:15', 'mh20lwdvgfj', 1),
(211, 10, '2024-03-21 10:15:51', 'esd7iu6uljj', 1),
(212, 10, '2024-03-21 11:08:32', 'z@bl@whtuab', 1),
(213, 2, '2024-03-21 22:59:03', '@119dj2a998', 1),
(214, 2, '2024-03-27 18:17:05', 'b2n3ksfebij', 1),
(215, 2, '2024-03-27 19:15:30', 'c7jtgt06@39', 1),
(216, 2, '2024-03-28 15:05:25', 'mance2jkm4b', 1),
(217, 54, '2024-03-29 00:10:02', '97il6ad7tek', 1),
(218, 54, '2024-03-29 11:40:15', 'vk8dufl6sv9', 1),
(219, 2, '2024-03-29 22:45:29', 'kb0jlfe09t9', 1),
(220, 2, '2024-03-30 00:02:41', 'slj2kj37@0@', 1),
(221, 2, '2024-03-30 16:55:16', 'rnc4bvrabd8', 1),
(222, 2, '2024-03-31 11:05:45', 'ec3gbdzfu4l', 1),
(223, 54, '2024-04-01 19:51:06', 'hn2j0kb2lhz', 1),
(224, 2, '2024-04-04 21:54:58', '@373iet17@5', 1),
(225, 2, '2024-04-04 21:56:43', 'mg2@j@j5bw4', 1),
(226, 2, '2024-04-08 18:44:26', 'm4iitb7n5tz', 1),
(227, 2, '2024-04-08 18:54:23', 'a5j62t90am3', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`codCar`),
  ADD KEY `fk_carrito_producto` (`codProd`),
  ADD KEY `fk_carrito_cliente` (`codCli`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`codCateg`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`codCli`);

--
-- Indices de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD PRIMARY KEY (`codDetPedi`),
  ADD KEY `fk_detallePedido_pedido` (`codPedi`),
  ADD KEY `fk_detallePedido_producto` (`codProd`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`codPedi`),
  ADD KEY `fk_pedido_cliente` (`codCli`),
  ADD KEY `fk_pedido_usuario` (`codUsu`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idProd`),
  ADD KEY `categoria_codCateg_producto` (`codCateg`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`codUsu`) USING BTREE;

--
-- Indices de la tabla `usuario_login`
--
ALTER TABLE `usuario_login`
  ADD PRIMARY KEY (`codUL`),
  ADD KEY `codUsu` (`codUsu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `codCar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `codCli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  MODIFY `codDetPedi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `codPedi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idProd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `codUsu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `usuario_login`
--
ALTER TABLE `usuario_login`
  MODIFY `codUL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `fk_carrito_cliente` FOREIGN KEY (`codCli`) REFERENCES `cliente` (`codCli`),
  ADD CONSTRAINT `fk_carrito_producto` FOREIGN KEY (`codProd`) REFERENCES `producto` (`idProd`);

--
-- Filtros para la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD CONSTRAINT `fk_detallePedido_pedido` FOREIGN KEY (`codPedi`) REFERENCES `pedido` (`codPedi`),
  ADD CONSTRAINT `fk_detallePedido_producto` FOREIGN KEY (`codProd`) REFERENCES `producto` (`idProd`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_pedido_cliente` FOREIGN KEY (`codCli`) REFERENCES `cliente` (`codCli`),
  ADD CONSTRAINT `fk_pedido_usuario` FOREIGN KEY (`codUsu`) REFERENCES `usuario` (`codUsu`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `categoria_codCateg_producto` FOREIGN KEY (`codCateg`) REFERENCES `categoria` (`codCateg`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario_login`
--
ALTER TABLE `usuario_login`
  ADD CONSTRAINT `usuario_login_ibfk_1` FOREIGN KEY (`codUsu`) REFERENCES `usuario` (`codUsu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
