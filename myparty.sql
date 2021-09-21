-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-09-2021 a las 03:45:01
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `myparty`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcategorias`
--

CREATE TABLE `tblcategorias` (
  `IdCategoria` int(11) NOT NULL,
  `Descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblcategorias`
--

INSERT INTO `tblcategorias` (`IdCategoria`, `Descripcion`) VALUES
(1, 'Dj'),
(2, 'Banda'),
(3, 'Orquesta'),
(4, 'Mariachi'),
(5, 'Grupo Versátil'),
(6, 'Banda de Rock'),
(7, 'Norteño'),
(8, 'Solista'),
(9, 'Chef'),
(10, 'Comida Mexicana'),
(11, 'Snacks'),
(12, 'Cortes'),
(13, 'Mesa de Postres'),
(14, 'Pasteleria'),
(15, 'Proveedora de Dulces'),
(16, 'Jardin'),
(17, 'Salón de fiestas familiar'),
(18, 'Hacienda'),
(19, 'Terraza'),
(20, 'Salón con Jardín'),
(21, 'Bar'),
(22, 'Antro'),
(23, 'Bartender'),
(24, 'Coctelería'),
(25, 'Barras Libres'),
(26, 'Proveedor de Bebidas Alcohólicas'),
(27, 'Meseros'),
(28, 'Capitán de Meseros'),
(29, 'Proveedor de bebidas'),
(30, 'Proveedor de mobiliario'),
(31, 'Globoflexia'),
(32, 'Papiroflexia'),
(33, 'Proveedor de souvenirs'),
(34, 'Fotografo'),
(35, 'Estudio de Fotos'),
(36, 'Camarógrafo'),
(37, 'Fotografía y video'),
(38, 'Payaso'),
(39, 'Comediante'),
(40, 'Mago'),
(41, 'Inflables'),
(42, 'Juegos Mecanicos'),
(43, 'Video Juegos'),
(44, 'Planta de Luz'),
(45, 'Albercas'),
(46, 'Albercas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblestatusnegocio`
--

CREATE TABLE `tblestatusnegocio` (
  `IdEstatus` int(11) NOT NULL,
  `Descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblestatusnegocio`
--

INSERT INTO `tblestatusnegocio` (`IdEstatus`, `Descripcion`) VALUES
(1, 'Aceptado'),
(2, 'En proceso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblimagennegocio`
--

CREATE TABLE `tblimagennegocio` (
  `IdImagenNegocio` int(11) NOT NULL,
  `IdNegocio` int(11) NOT NULL,
  `Ruta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblimagennegocio`
--

INSERT INTO `tblimagennegocio` (`IdImagenNegocio`, `IdNegocio`, `Ruta`) VALUES
(15, 8, 'how-machine-learning-is-changing-seo-how-to-adapt-5f60c25878dfc-1520x800.png'),
(16, 8, '96841abf366b4bbb75c5e8f3ba14defc-trazo-de-letra-z-punteado-3d-by-vexels.png'),
(17, 8, 'caballo-blanco-7.png'),
(18, 8, 'facebook.png'),
(19, 8, 'home.jpg'),
(20, 8, 'home2.jpg'),
(21, 8, 'how-machine-learning-is-changing-seo-how-to-adapt-5f60c25878dfc-1520x800.png'),
(22, 9, 'inicio.jpg'),
(23, 9, 'Inteligencia-Artificial-Machine-Learning-y-Deep-Learning.jpg'),
(24, 9, 'logo.png'),
(25, 9, 'logo2.png'),
(26, 9, 'logo2sinfondo.png'),
(27, 9, 'logo3.png'),
(28, 9, 'logo3sinfondo.png'),
(36, 11, 'machine-learning-consulting-company.png'),
(37, 11, 'mitos-1080x675.jpg'),
(38, 11, 'tarjeta.png'),
(39, 11, 'tarjeta1.jpg'),
(40, 11, 'tarjeta2.jpg'),
(41, 11, 'tarjeta3.jpg'),
(42, 11, 'unnamed.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblimagenservicio`
--

CREATE TABLE `tblimagenservicio` (
  `IdImagenServicio` int(11) NOT NULL,
  `IdServicio` int(11) NOT NULL,
  `Ruta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblimagenservicio`
--

INSERT INTO `tblimagenservicio` (`IdImagenServicio`, `IdServicio`, `Ruta`) VALUES
(1, 1, 'musica.jpg'),
(2, 2, 'comida.jpg'),
(3, 3, 'dulce.jpg'),
(4, 4, 'salones.jpg'),
(5, 5, 'bebidas.jpg'),
(6, 6, 'decoracion.jpg'),
(7, 7, 'meseros.jpg'),
(8, 8, 'fotos.jpg'),
(9, 9, 'entretenimiento.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblnegocios`
--

CREATE TABLE `tblnegocios` (
  `IdNegocio` int(11) NOT NULL,
  `IdCategoria` int(11) NOT NULL,
  `IdServicio` int(11) NOT NULL,
  `IdEstatus` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Descripcion` varchar(255) NOT NULL,
  `Direccion` varchar(255) NOT NULL,
  `Telefono` bigint(20) NOT NULL,
  `Whatsapp` bigint(20) NOT NULL,
  `Facebook` varchar(255) NOT NULL,
  `Instagram` varchar(255) NOT NULL,
  `Correo` varchar(255) NOT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblnegocios`
--

INSERT INTO `tblnegocios` (`IdNegocio`, `IdCategoria`, `IdServicio`, `IdEstatus`, `Nombre`, `Descripcion`, `Direccion`, `Telefono`, `Whatsapp`, `Facebook`, `Instagram`, `Correo`, `fecha`) VALUES
(8, 1, 1, 1, 'LIMA DEEJAY', 'Somos una empresa con mas de 10 años en el mercado, listos para llevar lo mejor a tu evento', 'Calle del Rocio S/N', 7225490020, 7225490020, 'https://www.facebook.com/', 'https://www.instagram.com/', 'gmalexlima@outlook.com', '2021-01-01'),
(9, 44, 10, 1, 'Plantas Toluca', 'Rentamos plantas de luz al mejor precio y en cualquier zona de toluca y sus alrededores', 'Toluca Centro', 7225490020, 7225490020, 'https://www.facebook.com/', 'https://www.instagram.com/', 'alejandro.limama@anahuac.mx', '2021-09-06'),
(11, 46, 9, 1, 'Albercas Toluca', 'Somos una empresa dedicada a llevar las mejores albercas a tu fiesta para que la pases de lo mejor', 'Lago Mextitlan #103 Colonia el Seminario', 7225490020, 7225490020, 'https://www.facebook.com/', 'https://www.instagram.com/', 'contacto@zeetech.com.mx', '2021-06-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblserviciocategoria`
--

CREATE TABLE `tblserviciocategoria` (
  `IdServicioCategoria` int(11) NOT NULL,
  `IdServicio` int(11) NOT NULL,
  `IdCategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblserviciocategoria`
--

INSERT INTO `tblserviciocategoria` (`IdServicioCategoria`, `IdServicio`, `IdCategoria`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 2, 9),
(10, 2, 10),
(11, 2, 11),
(12, 2, 12),
(13, 3, 13),
(14, 3, 14),
(15, 3, 15),
(16, 4, 16),
(17, 4, 17),
(18, 4, 18),
(19, 4, 19),
(20, 4, 20),
(21, 4, 21),
(22, 4, 22),
(23, 5, 23),
(24, 5, 24),
(25, 5, 25),
(26, 5, 26),
(27, 7, 27),
(28, 7, 28),
(29, 5, 29),
(30, 4, 30),
(31, 6, 31),
(32, 6, 32),
(33, 6, 33),
(34, 8, 34),
(35, 8, 35),
(36, 8, 36),
(37, 8, 37),
(38, 9, 38),
(39, 9, 39),
(40, 9, 40),
(41, 9, 41),
(42, 9, 42),
(43, 9, 43),
(44, 10, 44),
(46, 9, 46);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblservicios`
--

CREATE TABLE `tblservicios` (
  `IdServicio` int(11) NOT NULL,
  `Descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblservicios`
--

INSERT INTO `tblservicios` (`IdServicio`, `Descripcion`) VALUES
(1, 'Música'),
(2, 'Comida'),
(3, 'Dulces'),
(4, 'Salones'),
(5, 'Bebidas'),
(6, 'Decoración'),
(7, 'Meseros'),
(8, 'Fotografía y Video'),
(9, 'Entretenimiento'),
(10, 'Electricidad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblusuario`
--

CREATE TABLE `tblusuario` (
  `IdUsuario` int(11) NOT NULL,
  `Correo` varchar(255) NOT NULL,
  `Contrasenia` varchar(255) NOT NULL,
  `IdNegocio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblusuario`
--

INSERT INTO `tblusuario` (`IdUsuario`, `Correo`, `Contrasenia`, `IdNegocio`) VALUES
(1, 'gmalexlima@outlook.com', 'admin123', 0),
(2, 'limadeejay@outlook.com', 'lima123', 8);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tblcategorias`
--
ALTER TABLE `tblcategorias`
  ADD PRIMARY KEY (`IdCategoria`);

--
-- Indices de la tabla `tblestatusnegocio`
--
ALTER TABLE `tblestatusnegocio`
  ADD PRIMARY KEY (`IdEstatus`);

--
-- Indices de la tabla `tblimagennegocio`
--
ALTER TABLE `tblimagennegocio`
  ADD PRIMARY KEY (`IdImagenNegocio`),
  ADD KEY `IdNegocio` (`IdNegocio`);

--
-- Indices de la tabla `tblimagenservicio`
--
ALTER TABLE `tblimagenservicio`
  ADD PRIMARY KEY (`IdImagenServicio`),
  ADD KEY `IdServicio` (`IdServicio`);

--
-- Indices de la tabla `tblnegocios`
--
ALTER TABLE `tblnegocios`
  ADD PRIMARY KEY (`IdNegocio`),
  ADD KEY `IdCategoria` (`IdCategoria`),
  ADD KEY `IdServicio` (`IdServicio`),
  ADD KEY `IdEstatus` (`IdEstatus`);

--
-- Indices de la tabla `tblserviciocategoria`
--
ALTER TABLE `tblserviciocategoria`
  ADD PRIMARY KEY (`IdServicioCategoria`),
  ADD KEY `IdServicio` (`IdServicio`),
  ADD KEY `IdCategoria` (`IdCategoria`);

--
-- Indices de la tabla `tblservicios`
--
ALTER TABLE `tblservicios`
  ADD PRIMARY KEY (`IdServicio`);

--
-- Indices de la tabla `tblusuario`
--
ALTER TABLE `tblusuario`
  ADD PRIMARY KEY (`IdUsuario`),
  ADD KEY `IdNegocio` (`IdNegocio`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tblcategorias`
--
ALTER TABLE `tblcategorias`
  MODIFY `IdCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `tblestatusnegocio`
--
ALTER TABLE `tblestatusnegocio`
  MODIFY `IdEstatus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tblimagennegocio`
--
ALTER TABLE `tblimagennegocio`
  MODIFY `IdImagenNegocio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `tblimagenservicio`
--
ALTER TABLE `tblimagenservicio`
  MODIFY `IdImagenServicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tblnegocios`
--
ALTER TABLE `tblnegocios`
  MODIFY `IdNegocio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tblserviciocategoria`
--
ALTER TABLE `tblserviciocategoria`
  MODIFY `IdServicioCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `tblservicios`
--
ALTER TABLE `tblservicios`
  MODIFY `IdServicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tblusuario`
--
ALTER TABLE `tblusuario`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tblimagennegocio`
--
ALTER TABLE `tblimagennegocio`
  ADD CONSTRAINT `tblimagennegocio_ibfk_1` FOREIGN KEY (`IdNegocio`) REFERENCES `tblnegocios` (`IdNegocio`);

--
-- Filtros para la tabla `tblimagenservicio`
--
ALTER TABLE `tblimagenservicio`
  ADD CONSTRAINT `tblimagenservicio_ibfk_1` FOREIGN KEY (`IdServicio`) REFERENCES `tblservicios` (`IdServicio`);

--
-- Filtros para la tabla `tblnegocios`
--
ALTER TABLE `tblnegocios`
  ADD CONSTRAINT `tblnegocios_ibfk_1` FOREIGN KEY (`IdEstatus`) REFERENCES `tblestatusnegocio` (`IdEstatus`),
  ADD CONSTRAINT `tblnegocios_ibfk_2` FOREIGN KEY (`IdServicio`) REFERENCES `tblservicios` (`IdServicio`),
  ADD CONSTRAINT `tblnegocios_ibfk_3` FOREIGN KEY (`IdCategoria`) REFERENCES `tblcategorias` (`IdCategoria`);

--
-- Filtros para la tabla `tblserviciocategoria`
--
ALTER TABLE `tblserviciocategoria`
  ADD CONSTRAINT `tblserviciocategoria_ibfk_1` FOREIGN KEY (`IdServicio`) REFERENCES `tblservicios` (`IdServicio`),
  ADD CONSTRAINT `tblserviciocategoria_ibfk_2` FOREIGN KEY (`IdCategoria`) REFERENCES `tblcategorias` (`IdCategoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
