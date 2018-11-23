-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-03-2017 a las 02:10:18
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inventario_curso`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `cod_cliente` int(11) NOT NULL,
  `ced_cliente` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `nom_cliente` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `ape_cliente` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `tlf_cliente` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `direc_cliente` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`cod_cliente`, `ced_cliente`, `nom_cliente`, `ape_cliente`, `tlf_cliente`, `direc_cliente`, `fecha`) VALUES
(2, '12345', 'Franco', 'Gonzalez', '12255455855', 'Calle Argentina, Buenos Aires', '2017-03-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE `configuracion` (
  `codigo` int(11) NOT NULL,
  `rif_empresa` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `nom_empresa` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `direc_empresa` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `tlf_empresa` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `ced_gerente` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `nom_gerente` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `ape_gerente` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `correo_gerente` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `tlf_gerente` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `iva` float(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`codigo`, `rif_empresa`, `nom_empresa`, `direc_empresa`, `tlf_empresa`, `ced_gerente`, `nom_gerente`, `ape_gerente`, `correo_gerente`, `tlf_gerente`, `iva`) VALUES
(2, '789456', 'GOOGLE', 'ESTADOS UNIDOS', '145857455665', '45556584555', 'Luis', 'Lopez', 'lopez@gmail.com', '5555458554', 30.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_compras`
--

CREATE TABLE `orden_compras` (
  `id_orden_compras` int(11) NOT NULL,
  `cod_material` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `material` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `precio_orden` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `cantidad` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `rif_proveedor` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_ingreso` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `orden_compras`
--

INSERT INTO `orden_compras` (`id_orden_compras`, `cod_material`, `material`, `precio_orden`, `cantidad`, `rif_proveedor`, `fecha_ingreso`) VALUES
(2, '004', 'block de dibujo', '100', '250', '12555', '2017-03-20'),
(3, '005', 'creyones', '50', '300', '12555', '2017-03-20'),
(4, '006', 'borradores', '50', '150', '12555', '2017-03-20'),
(6, '007', 'lapiceros de colores', '25', '230', '12555', '2017-03-20'),
(7, '008', 'cuaderno', '15', '500', '12555', '2017-03-20'),
(8, '009', 'libreta de dos materias ', '25', '250', '12555', '2017-03-20'),
(9, '002', 'resma de hojas tipo carta', '25', '350', '1234', '2017-03-20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `cod_pedido` int(11) NOT NULL,
  `cod_material` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `material_pedido` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `cantidad_pedido` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_pedido` date NOT NULL,
  `rif_proveedor` varchar(200) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`cod_pedido`, `cod_material`, `material_pedido`, `cantidad_pedido`, `fecha_pedido`, `rif_proveedor`) VALUES
(1, '001', 'libreta de 5 materias', '500', '2017-03-17', '1234'),
(2, '003', 'cartulinas', '200', '2017-03-20', '12555');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `cod_proveedor` int(11) NOT NULL,
  `rif_proveedor` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre_proveedor` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `tlf_proveedor` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `direc_proveedor` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `email_proveedor` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `nom_contacto` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`cod_proveedor`, `rif_proveedor`, `nombre_proveedor`, `tlf_proveedor`, `direc_proveedor`, `email_proveedor`, `nom_contacto`, `fecha`) VALUES
(1, '1234', 'carlos', '45', 'buenos aires12', 'b@gmail.com12', '44', '2017-03-29'),
(2, '12555', 'pedro', '12555', 'san carlos costa rica', 'd@gmail.com', 'peter', '2017-03-16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `cedula` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `cargo` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `usuario` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `password2` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `pregunta` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `respuesta` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `nivel` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_ingreso` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `cedula`, `cargo`, `usuario`, `password`, `password2`, `pregunta`, `respuesta`, `nivel`, `fecha_ingreso`) VALUES
(1, 'carlos', '123', 'admin', 'carlos', '123', '123', 'nombre mascota', 'perro', 'administrador', '2017-03-13');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`cod_cliente`);

--
-- Indices de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `orden_compras`
--
ALTER TABLE `orden_compras`
  ADD PRIMARY KEY (`id_orden_compras`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`cod_pedido`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`cod_proveedor`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `cod_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `orden_compras`
--
ALTER TABLE `orden_compras`
  MODIFY `id_orden_compras` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `cod_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `cod_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
