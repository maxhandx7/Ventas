-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-05-2023 a las 08:36:19
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `laravel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `businesses`
--

CREATE TABLE `businesses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `businesses`
--

INSERT INTO `businesses` (`id`, `name`, `description`, `logo`, `mail`, `address`, `nit`, `created_at`, `updated_at`) VALUES
(1, 'AF', 'software design and development', '1684390006_LOGO2017.png', 'Af@gmail.com', 'cra 26c#109-14, Cali, Colombia', '15247895632', '2023-05-18 09:19:21', '2023-05-18 11:06:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Panes', 'panes', '2023-05-18 09:21:41', '2023-05-18 09:21:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rut` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `clients`
--

INSERT INTO `clients` (`id`, `name`, `cc`, `rut`, `address`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Alan Paz', '1143982071', NULL, 'Cll. 11#27-29', NULL, NULL, '2023-05-18 11:29:50', '2023-05-18 11:29:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Categoria_id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(81, '2014_10_12_000000_create_users_table', 2),
(82, '2014_10_12_100000_create_password_resets_table', 2),
(83, '2015_01_20_084450_create_roles_table', 2),
(84, '2015_01_20_084525_create_role_user_table', 2),
(85, '2015_01_24_080208_create_permissions_table', 2),
(86, '2015_01_24_080433_create_permission_role_table', 2),
(87, '2015_12_04_003040_add_special_role_column', 2),
(88, '2017_10_17_170735_create_permission_user_table', 2),
(89, '2019_08_19_000000_create_failed_jobs_table', 2),
(90, '2022_01_26_005423_create_categories_table', 2),
(91, '2022_01_26_020957_create_providers_table', 2),
(92, '2022_01_28_021910_create_products_table', 2),
(93, '2022_01_29_000358_create_clients_table', 2),
(94, '2022_01_29_012746_create_purchases_table', 2),
(95, '2022_01_29_013017_create_purchase_details_table', 2),
(96, '2022_02_02_035842_create_sales_table', 2),
(97, '2022_02_02_040317_create_sale_details_table', 2),
(98, '2022_02_26_033017_create_businesses_table', 2),
(99, '2022_02_26_033109_create_printers_table', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Navegar usuarios', 'users.index', 'Lista y navega todos los usuarios del sistema', '2023-05-18 09:19:20', '2023-05-18 09:19:20'),
(2, 'Creación de usuarios', 'users.create', 'Podría crear nuevos usuarios en el sistema', '2023-05-18 09:19:20', '2023-05-18 09:19:20'),
(3, 'Ver detalle de usuario', 'users.show', 'Ve en detalle cada usuario del sistema', '2023-05-18 09:19:20', '2023-05-18 09:19:20'),
(4, 'Edición de usuarios', 'users.edit', 'Podría editar cualquier dato de un usuario del sistema', '2023-05-18 09:19:20', '2023-05-18 09:19:20'),
(5, 'Eliminar usuario', 'users.destroy', 'Podría eliminar cualquier usuario del sistema', '2023-05-18 09:19:20', '2023-05-18 09:19:20'),
(6, 'Navegar roles', 'roles.index', 'Lista y navega todos los roles del sistema', '2023-05-18 09:19:20', '2023-05-18 09:19:20'),
(7, 'Ver detalle de un rol', 'roles.show', 'Ve en detalle cada rol del sistema', '2023-05-18 09:19:20', '2023-05-18 09:19:20'),
(8, 'Creación de roles', 'roles.create', 'Podría crear nuevos roles en el sistema', '2023-05-18 09:19:20', '2023-05-18 09:19:20'),
(9, 'Edición de roles', 'roles.edit', 'Podría editar cualquier dato de un rol del sistema', '2023-05-18 09:19:20', '2023-05-18 09:19:20'),
(10, 'Eliminar roles', 'roles.destroy', 'Podría eliminar cualquier rol del sistema', '2023-05-18 09:19:20', '2023-05-18 09:19:20'),
(11, 'Navegar categorías', 'categories.index', 'Lista y navega por todos los categorías del sistema.', '2023-05-18 09:19:20', '2023-05-18 09:19:20'),
(12, 'Ver detalle de categoría', 'categories.show', 'Ver en detalle cada categoría del sistema.', '2023-05-18 09:19:20', '2023-05-18 09:19:20'),
(13, 'Edición de categorías', 'categories.edit', 'Editar cualquier dato de un categoría del sistema.', '2023-05-18 09:19:20', '2023-05-18 09:19:20'),
(14, 'Creación de categorías', 'categories.create', 'Crea cualquier dato de una categoría del sistema.', '2023-05-18 09:19:20', '2023-05-18 09:19:20'),
(15, 'Eliminar categorías', 'categories.destroy', 'Eliminar cualquier dato de una categoría del sistema.', '2023-05-18 09:19:20', '2023-05-18 09:19:20'),
(16, 'Navegar por clientes', 'clients.index', 'Lista y navega por todos los clientes del sistema.', '2023-05-18 09:19:20', '2023-05-18 09:19:20'),
(17, 'Ver detalle de cliente', 'clients.show', 'Ver en detalle cada cliente del sistema.', '2023-05-18 09:19:20', '2023-05-18 09:19:20'),
(18, 'Edición de clientes', 'clients.edit', 'Editar cualquier dato de un cliente del sistema.', '2023-05-18 09:19:20', '2023-05-18 09:19:20'),
(19, 'Creación de clientes', 'clients.create', 'Crea cualquier dato de un cliente del sistema.', '2023-05-18 09:19:20', '2023-05-18 09:19:20'),
(20, 'Eliminar clientes', 'clients.destroy', 'Eliminar cualquier dato de un cliente del sistema.', '2023-05-18 09:19:20', '2023-05-18 09:19:20'),
(21, 'Navegar por productos', 'products.index', 'Lista y navega por todos los productos del sistema.', '2023-05-18 09:19:20', '2023-05-18 09:19:20'),
(22, 'Ver detalle de producto', 'products.show', 'Ver en detalle cada producto del sistema.', '2023-05-18 09:19:20', '2023-05-18 09:19:20'),
(23, 'Edición de productos', 'products.edit', 'Editar cualquier dato de un producto del sistema.', '2023-05-18 09:19:20', '2023-05-18 09:19:20'),
(24, 'Creación de productos', 'products.create', 'Crea cualquier dato de un producto del sistema.', '2023-05-18 09:19:20', '2023-05-18 09:19:20'),
(25, 'Eliminar productos', 'products.destroy', 'Eliminar cualquier dato de un producto del sistema.', '2023-05-18 09:19:20', '2023-05-18 09:19:20'),
(26, 'Navegar por proveedores', 'providers.index', 'Lista y navega por todos los proveedores del sistema.', '2023-05-18 09:19:20', '2023-05-18 09:19:20'),
(27, 'Ver detalle de proveedor', 'providers.show', 'Ver en detalle cada proveedor del sistema.', '2023-05-18 09:19:20', '2023-05-18 09:19:20'),
(28, 'Edición de proveedores', 'providers.edit', 'Editar cualquier dato de un proveedor del sistema.', '2023-05-18 09:19:20', '2023-05-18 09:19:20'),
(29, 'Creación de proveedores', 'providers.create', 'Crea cualquier dato de un proveedor del sistema.', '2023-05-18 09:19:20', '2023-05-18 09:19:20'),
(30, 'Eliminar proveedores', 'providers.destroy', 'Eliminar cualquier dato de un proveedor del sistema.', '2023-05-18 09:19:20', '2023-05-18 09:19:20'),
(31, 'Navegar por compras', 'purchases.index', 'Lista y navega por todos los compras del sistema.', '2023-05-18 09:19:20', '2023-05-18 09:19:20'),
(32, 'Ver detalle de compra', 'purchases.show', 'Ver en detalle cada compra del sistema.', '2023-05-18 09:19:20', '2023-05-18 09:19:20'),
(33, 'Creación de compras', 'purchases.create', 'Crea cualquier dato de un compra del sistema.', '2023-05-18 09:19:20', '2023-05-18 09:19:20'),
(34, 'Navegar por ventas', 'sales.index', 'Lista y navega por todos los ventas del sistema.', '2023-05-18 09:19:20', '2023-05-18 09:19:20'),
(35, 'Ver detalle de venta', 'sales.show', 'Ver en detalle cada venta del sistema.', '2023-05-18 09:19:20', '2023-05-18 09:19:20'),
(36, 'Creación de ventas', 'sales.create', 'Crea cualquier dato de un venta del sistema.', '2023-05-18 09:19:20', '2023-05-18 09:19:20'),
(37, 'Descargar PDF reporte de compras', 'purchases.pdf', 'Puede descargar todos los reportes de las compras en PDF.', '2023-05-18 09:19:20', '2023-05-18 09:19:20'),
(38, 'Descargar PDF reporte de ventas', 'sales.pdf', 'Puede descargar todos los reportes de las ventas en PDF.', '2023-05-18 09:19:20', '2023-05-18 09:19:20'),
(39, 'Imprimir boleta de venta', 'sales.print', 'Puede imprimir boletas de todas las ventas.', '2023-05-18 09:19:20', '2023-05-18 09:19:20'),
(40, 'Ver datos de la empresa', 'business.index', 'Navega por los datos de la empresa.', '2023-05-18 09:19:21', '2023-05-18 09:19:21'),
(41, 'Edición de empresa', 'business.edit', 'Editar cualquier dato de la empresa.', '2023-05-18 09:19:21', '2023-05-18 09:19:21'),
(42, 'er datos de la impresora', 'printers.index', 'Navega por los datos de la impresora.', '2023-05-18 09:19:21', '2023-05-18 09:19:21'),
(43, 'Edición de impresora', 'printers.edit', 'Editar cualquier dato de la impresora.', '2023-05-18 09:19:21', '2023-05-18 09:19:21'),
(44, 'Subir archivo de compra', 'upload.purchases', 'Puede subir comprobantes de una compra.', '2023-05-18 09:19:21', '2023-05-18 09:19:21'),
(45, 'Cambiar estado de producto', 'change.status.products', 'Permite cambiar el estado de un producto.', '2023-05-18 09:19:21', '2023-05-18 09:19:21'),
(46, 'Cambiar estado de compra', 'change.status.purchases', 'Permite cambiar el estado de un compra.', '2023-05-18 09:19:21', '2023-05-18 09:19:21'),
(47, 'Cambiar estado de venta', 'change.status.sales', 'Permite cambiar el estado de un venta.', '2023-05-18 09:19:21', '2023-05-18 09:19:21'),
(48, 'Reporte por día', 'reports.day', 'Permite ver los reportes de ventas por día.', '2023-05-18 09:19:21', '2023-05-18 09:19:21'),
(49, 'Reporte por fechas', 'reports.date', 'Permite ver los reportes por un rango de fechas de las ventas.', '2023-05-18 09:19:21', '2023-05-18 09:19:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permission_role`
--

CREATE TABLE `permission_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permission_user`
--

CREATE TABLE `permission_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `printers`
--

CREATE TABLE `printers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `printers`
--

INSERT INTO `printers` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'AURES ODP-333', '2023-05-18 09:19:21', '2023-05-18 09:19:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sell_price` decimal(12,2) NOT NULL,
  `status` enum('ACTIVE','DESACTIVATED') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ACTIVE',
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `provider_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `code`, `name`, `stock`, `image`, `sell_price`, `status`, `category_id`, `provider_id`, `created_at`, `updated_at`) VALUES
(1, '1', 'Pan de 500', 2950, '1684383825_panes-guia-compra.jpg', '500.00', 'ACTIVE', 1, 1, '2023-05-18 09:23:45', '2023-05-18 09:23:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `providers`
--

CREATE TABLE `providers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nit_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `providers`
--

INSERT INTO `providers` (`id`, `name`, `email`, `nit_number`, `address`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Max hand', 'AlanCarabali@gmail.com', '12345678910', 'Cll. 11#22-30', '+573165206818', '2023-05-18 09:22:38', '2023-05-18 09:22:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `provider_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `purchase_date` datetime NOT NULL,
  `tax` decimal(8,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `status` enum('VALID','CANCELED') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'VALID',
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `purchases`
--

INSERT INTO `purchases` (`id`, `provider_id`, `user_id`, `created_at`, `updated_at`, `purchase_date`, `tax`, `total`, `status`, `picture`) VALUES
(1, 1, 1, '2023-05-18 09:24:42', '2023-05-18 09:36:29', '2023-05-17 23:24:42', '19.00', '119000.00', 'VALID', NULL),
(2, 1, 1, '2023-05-18 09:34:33', '2023-05-18 10:42:48', '2023-05-17 23:34:33', '19.00', '178500.00', 'VALID', NULL),
(3, 1, 1, '2023-05-18 11:27:44', '2023-05-18 11:27:44', '2023-05-18 01:27:44', '19.00', '178500.00', 'VALID', NULL);

--
-- Disparadores `purchases`
--
DELIMITER $$
CREATE TRIGGER `tr_updStockAnular` AFTER UPDATE ON `purchases` FOR EACH ROW BEGIN
UPDATE products p 
JOIN purchase_details di
ON di.product_id = p.id
AND di.purchase_id = new.id
set p.stock = p.stock - di.quantity;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `purchase_details`
--

CREATE TABLE `purchase_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `purchase_details`
--

INSERT INTO `purchase_details` (`id`, `purchase_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 500, '300.00', '2023-05-18 09:34:34', '2023-05-18 09:34:34'),
(2, 3, 1, 500, '300.00', '2023-05-18 11:27:44', '2023-05-18 11:27:44');

--
-- Disparadores `purchase_details`
--
DELIMITER $$
CREATE TRIGGER `tr_updStockCompra` AFTER INSERT ON `purchase_details` FOR EACH ROW BEGIN
UPDATE products SET stock = stock - NEW.quantity;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `special` enum('all-access','no-access') COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`, `special`) VALUES
(1, 'Admin', 'admin', NULL, '2023-05-18 09:19:21', '2023-05-18 09:19:21', 'all-access');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-05-18 09:19:21', '2023-05-18 09:19:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `sale_date` datetime NOT NULL,
  `tax` decimal(8,2) NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `status` enum('VALID','CANCELED') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'VALID',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sales`
--

INSERT INTO `sales` (`id`, `client_id`, `user_id`, `sale_date`, `tax`, `total`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-05-18 01:30:30', '0.00', '25000.00', 'VALID', '2023-05-18 11:30:30', '2023-05-18 11:30:30');

--
-- Disparadores `sales`
--
DELIMITER $$
CREATE TRIGGER `tr_updStockVentaAnular` AFTER UPDATE ON `sales` FOR EACH ROW BEGIN
UPDATE products p 
JOIN sale_details dv
ON dv.product_id = p.id
AND dv.sale_id = new.id
set p.stock = p.stock - dv.quantity;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sale_details`
--

CREATE TABLE `sale_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sale_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `discount` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sale_details`
--

INSERT INTO `sale_details` (`id`, `sale_id`, `product_id`, `quantity`, `price`, `discount`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 50, '500.00', '0.00', '2023-05-18 11:30:30', '2023-05-18 11:30:30');

--
-- Disparadores `sale_details`
--
DELIMITER $$
CREATE TRIGGER `tr_updStockVenta` AFTER INSERT ON `sale_details` FOR EACH ROW BEGIN
UPDATE products SET stock = stock - NEW.quantity
WHERE products.id = NEW.product_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Alan', 'Alancarabali@gmail.com', NULL, '$2y$10$liZl2fBn4wBbJEAzsUobLuArOrEgurYORgMMPIw8J2yUU/BVSs/4y', NULL, '2023-05-18 09:19:21', '2023-05-18 09:19:21');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `businesses`
--
ALTER TABLE `businesses`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indices de la tabla `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_cc_unique` (`cc`),
  ADD UNIQUE KEY `clients_rut_unique` (`rut`),
  ADD UNIQUE KEY `clients_phone_unique` (`phone`),
  ADD UNIQUE KEY `clients_email_unique` (`email`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_slug_unique` (`slug`);

--
-- Indices de la tabla `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_role_permission_id_index` (`permission_id`),
  ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Indices de la tabla `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_user_permission_id_index` (`permission_id`),
  ADD KEY `permission_user_user_id_index` (`user_id`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `printers`
--
ALTER TABLE `printers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_name_unique` (`name`),
  ADD UNIQUE KEY `products_code_unique` (`code`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_provider_id_foreign` (`provider_id`);

--
-- Indices de la tabla `providers`
--
ALTER TABLE `providers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `providers_name_unique` (`name`);

--
-- Indices de la tabla `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchases_provider_id_foreign` (`provider_id`),
  ADD KEY `purchases_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `purchase_details`
--
ALTER TABLE `purchase_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_details_purchase_id_foreign` (`purchase_id`),
  ADD KEY `purchase_details_product_id_foreign` (`product_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indices de la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_role_id_index` (`role_id`),
  ADD KEY `role_user_user_id_index` (`user_id`);

--
-- Indices de la tabla `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_client_id_foreign` (`client_id`),
  ADD KEY `sales_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `sale_details`
--
ALTER TABLE `sale_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sale_details_sale_id_foreign` (`sale_id`),
  ADD KEY `sale_details_product_id_foreign` (`product_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `businesses`
--
ALTER TABLE `businesses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permission_user`
--
ALTER TABLE `permission_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `printers`
--
ALTER TABLE `printers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `providers`
--
ALTER TABLE `providers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `purchase_details`
--
ALTER TABLE `purchase_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `sale_details`
--
ALTER TABLE `sale_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_provider_id_foreign` FOREIGN KEY (`provider_id`) REFERENCES `providers` (`id`);

--
-- Filtros para la tabla `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_provider_id_foreign` FOREIGN KEY (`provider_id`) REFERENCES `providers` (`id`),
  ADD CONSTRAINT `purchases_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `purchase_details`
--
ALTER TABLE `purchase_details`
  ADD CONSTRAINT `purchase_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `purchase_details_purchase_id_foreign` FOREIGN KEY (`purchase_id`) REFERENCES `purchases` (`id`);

--
-- Filtros para la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `sales_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `sale_details`
--
ALTER TABLE `sale_details`
  ADD CONSTRAINT `sale_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `sale_details_sale_id_foreign` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
