-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-09-2022 a las 00:37:31
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mydb`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `prc_ListarProductosMasVendidos` ()   BEGIN
SELECT p.barcode,
		p.name,
        SUM(sd.quantity) as cantidad,
        SUM(Round(sd.price_sale,2)) as total_venta
FROM sale_details sd INNER JOIN products p ON sd.id = p.id
GROUP BY p.barcode,
		p.name
ORDER BY SUM(Round(sd.price_sale,2)) DESC
LIMIT 10;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `prc_ListarProductosPocoStock` ()   BEGIN

SELECT p.barcode, p.name, p.stock, p.alert FROM products p WHERE p.stock <= p.alert ORDER BY p.stock ASC;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `prc_ObtenerDatosDashboard` ()  NO SQL BEGIN
DECLARE totalproductos int;
DECLARE totalventas float;
DECLARE totalganancias float;
DECLARE ventasdeldia float;

SET totalproductos = (SELECT count(*) FROM products p);
SET totalventas = (SELECT SUM(s.total) FROM sales s);
SET totalganancias = (SELECT SUM(sd.price_sale) - SUM(p.costl*sd.quantity) FROM sale_details sd INNER JOIN products p ON sd.product_id= p.id);
SET ventasdeldia = (SELECT SUM(s.total) FROM sales s);

SELECT IFNULL(totalproductos,0) AS totalProductos,
	   IFNULL(ROUND(totalventas,2),0) AS totalventas,
       IFNULL(ROUND(totalganancias,2),0) AS totalganancias,
       IFNULL(ROUND(ventasdeldia,2),0) as ventasdeldia;
        
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `image` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `nombre`, `image`) VALUES
(1, 'Electricidad', NULL),
(2, 'Herramientas', NULL),
(3, 'Pinturas', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `nit` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clients`
--

INSERT INTO `clients` (`id`, `name`, `phone`, `nit`) VALUES
(1, 'marta del carmen', '32326130', '7898456');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `barcode` varchar(45) DEFAULT NULL,
  `costl` decimal(10,0) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `stock` int(11) NOT NULL,
  `alert` int(11) NOT NULL,
  `image` varchar(55) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `providers_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `barcode`, `costl`, `price`, `stock`, `alert`, `image`, `category_id`, `providers_id`) VALUES
(1, 'Bombilla Led 10W', '08-09-01', '15', '25', 10, 20, NULL, 1, 1),
(2, 'Apagador Simple Bticino', '01/04/03', '18', '28', 24, 24, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `providers`
--

CREATE TABLE `providers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(500) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `nit` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `providers`
--

INSERT INTO `providers` (`id`, `name`, `address`, `phone`, `nit`) VALUES
(1, 'Antillon S.A.', 'Antillon S.A', '78451265', '56486212');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `total` varchar(45) NOT NULL,
  `items` int(11) NOT NULL,
  `cash` decimal(10,0) NOT NULL,
  `date_sale` date DEFAULT NULL,
  `status` enum('PAID','PENDING','CANCELED') DEFAULT 'PAID',
  `user_id` int(11) NOT NULL,
  `Clients_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sales`
--

INSERT INTO `sales` (`id`, `total`, `items`, `cash`, `date_sale`, `status`, `user_id`, `Clients_id`) VALUES
(1, '12500', 5, '0', NULL, 'PAID', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sale_details`
--

CREATE TABLE `sale_details` (
  `id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `cost` decimal(10,0) NOT NULL,
  `price_sale` decimal(10,0) NOT NULL,
  `sale_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sale_details`
--

INSERT INTO `sale_details` (`id`, `quantity`, `cost`, `price_sale`, `sale_id`, `product_id`) VALUES
(1, 2, '15', '50', 1, 1),
(2, 4, '18', '100', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `status` enum('ACTIVE','LOCKET') NOT NULL DEFAULT 'ACTIVE',
  `password` varchar(45) NOT NULL,
  `image` varchar(55) DEFAULT NULL,
  `roles_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `status`, `password`, `image`, `roles_id`) VALUES
(1, 'camilo', '47869523', 'cami@cami.com', 'ACTIVE', '123456', NULL, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_products_categories_idx` (`category_id`),
  ADD KEY `fk_products_providers1_idx` (`providers_id`);

--
-- Indices de la tabla `providers`
--
ALTER TABLE `providers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sales_user1_idx` (`user_id`),
  ADD KEY `fk_sales_Clients1_idx` (`Clients_id`);

--
-- Indices de la tabla `sale_details`
--
ALTER TABLE `sale_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sale_details_sales1_idx` (`sale_id`),
  ADD KEY `fk_sale_details_products1_idx` (`product_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_roles1_idx` (`roles_id`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_products_providers1` FOREIGN KEY (`providers_id`) REFERENCES `providers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `fk_sales_Clients1` FOREIGN KEY (`Clients_id`) REFERENCES `clients` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sales_user1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sale_details`
--
ALTER TABLE `sale_details`
  ADD CONSTRAINT `fk_sale_details_products1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sale_details_sales1` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_roles1` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
