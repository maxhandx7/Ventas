-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.24-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Volcando estructura para tabla laravel.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla laravel.categories: ~3 rows (aproximadamente)
INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'bolsos', 'bolsos tipo morral', '2023-06-05 01:18:55', '2023-06-05 01:18:55'),
	(2, 'carteras', 'carteras señorial', '2023-06-05 01:19:24', '2023-06-05 01:19:24'),
	(3, 'bolsos cruzados', 'bolsos tipo cartera', '2023-06-05 01:20:02', '2023-06-05 01:20:02');

-- Volcando estructura para tabla laravel.clients
CREATE TABLE IF NOT EXISTS `clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cc` int(11) DEFAULT NULL,
  `rut` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `clients_cc_unique` (`cc`),
  UNIQUE KEY `clients_rut_unique` (`rut`),
  UNIQUE KEY `clients_phone_unique` (`phone`),
  UNIQUE KEY `clients_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla laravel.clients: ~19 rows (aproximadamente)
INSERT INTO `clients` (`id`, `name`, `cc`, `rut`, `address`, `phone`, `email`, `created_at`, `updated_at`) VALUES
	(1, 'leyla paz', 27260807, NULL, 'puertas del sol', NULL, NULL, '2023-06-05 01:38:56', '2023-06-05 01:38:56'),
	(2, 'heidy', NULL, NULL, 'puertas del sol', NULL, NULL, '2023-06-05 01:39:25', '2023-06-05 01:39:25'),
	(3, 'anderson', NULL, NULL, 'puertas del sol', NULL, NULL, '2023-06-05 01:40:11', '2023-06-05 01:40:11'),
	(4, 'samanta', NULL, NULL, 'puertas del sol', NULL, NULL, '2023-06-05 01:40:29', '2023-06-05 01:40:29'),
	(5, 'tania peluqueria', NULL, NULL, NULL, NULL, NULL, '2023-06-05 01:41:05', '2023-06-05 01:41:05'),
	(6, 'mona', NULL, NULL, NULL, NULL, NULL, '2023-06-05 01:41:14', '2023-06-05 01:41:14'),
	(7, 'kate', NULL, NULL, NULL, NULL, NULL, '2023-06-05 01:41:28', '2023-06-05 01:41:28'),
	(8, 'inquilina fredy', NULL, NULL, NULL, NULL, NULL, '2023-06-05 01:41:45', '2023-06-05 01:41:45'),
	(9, 'ninfa paz', NULL, NULL, NULL, NULL, NULL, '2023-06-05 01:42:00', '2023-06-05 01:42:00'),
	(10, 'mujer de jhoan', NULL, NULL, NULL, NULL, NULL, '2023-06-05 01:42:13', '2023-06-05 01:42:13'),
	(11, 'hellen', NULL, NULL, NULL, NULL, NULL, '2023-06-05 01:42:24', '2023-06-05 01:42:24'),
	(12, 'tamy peluqueria', NULL, NULL, NULL, NULL, NULL, '2023-06-05 01:43:02', '2023-06-05 01:43:02'),
	(13, 'paula castro', NULL, NULL, NULL, NULL, NULL, '2023-06-05 01:43:16', '2023-06-05 01:43:16'),
	(14, 'anice', NULL, NULL, NULL, NULL, NULL, '2023-06-05 01:43:28', '2023-06-05 01:43:28'),
	(15, 'diana paz', NULL, NULL, NULL, NULL, NULL, '2023-06-05 01:43:41', '2023-06-05 01:43:41'),
	(16, 'diana barinas', NULL, NULL, NULL, NULL, NULL, '2023-06-05 01:43:53', '2023-06-05 01:43:53'),
	(17, 'karol', NULL, NULL, NULL, NULL, NULL, '2023-06-05 01:44:05', '2023-06-05 01:44:05'),
	(18, 'Alan', NULL, NULL, NULL, NULL, NULL, '2023-06-05 02:02:22', '2023-06-05 02:02:22'),
	(20, 'usuario', NULL, NULL, NULL, NULL, NULL, '2023-06-08 01:46:11', '2023-06-08 01:46:11');

-- Volcando estructura para tabla laravel.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sell_price` decimal(12,2) NOT NULL,
  `status` enum('ACTIVE','DESACTIVATED') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ACTIVE',
  `category_id` bigint(20) unsigned NOT NULL,
  `provider_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_name_unique` (`name`),
  UNIQUE KEY `products_code_unique` (`code`),
  KEY `products_category_id_foreign` (`category_id`),
  KEY `products_provider_id_foreign` (`provider_id`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `products_provider_id_foreign` FOREIGN KEY (`provider_id`) REFERENCES `providers` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla laravel.products: ~7 rows (aproximadamente)
INSERT INTO `products` (`id`, `code`, `name`, `stock`, `image`, `sell_price`, `status`, `category_id`, `provider_id`, `created_at`, `updated_at`) VALUES
	(1, '1', 'bolsos estampados', 0, '1685910508_bolso lv.jpeg', 48000.00, 'ACTIVE', 1, 1, '2023-06-05 01:28:28', '2023-06-05 01:28:28'),
	(2, '2', 'bolso unicolor', 3, '1685910697_bolso unicolor.jpeg', 48000.00, 'ACTIVE', 1, 1, '2023-06-05 01:31:37', '2023-06-05 01:31:37'),
	(3, '3', 'bolsos pequeños', 1, '1685910862_bolso peq.jpeg', 38000.00, 'ACTIVE', 1, 2, '2023-06-05 01:34:22', '2023-06-08 02:24:54'),
	(4, '4', 'bolso cruzado', 5, '1685911055_bolso blanco.jpeg', 48000.00, 'ACTIVE', 3, 1, '2023-06-05 01:37:35', '2023-06-05 01:37:35'),
	(5, '5', 'carteras', 2, '1685942469_cartera.jpeg', 45000.00, 'ACTIVE', 2, 2, '2023-06-05 10:21:09', '2023-06-05 10:21:09'),
	(8, '8', 'rf12', 0, '1685943513_LOGO.svg', 35000.00, 'ACTIVE', 3, 2, '2023-06-05 10:38:33', '2023-06-05 10:38:33'),
	(10, '10', 'bolso de niña', 0, '1686111767_footprint.png', 30000.00, 'ACTIVE', 1, 2, '2023-06-07 09:22:47', '2023-06-07 09:22:47');

-- Volcando estructura para tabla laravel.providers
CREATE TABLE IF NOT EXISTS `providers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nit_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `providers_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla laravel.providers: ~3 rows (aproximadamente)
INSERT INTO `providers` (`id`, `name`, `email`, `nit_number`, `address`, `phone`, `created_at`, `updated_at`) VALUES
	(1, 'chinos', NULL, NULL, 'centro de cali', NULL, '2023-06-05 01:22:14', '2023-06-05 01:22:14'),
	(2, 'bolsos 20mil', NULL, NULL, 'barranquilla', NULL, '2023-06-05 01:22:36', '2023-06-05 01:22:36'),
	(3, 'shein', NULL, NULL, 'china', NULL, '2023-06-05 01:22:48', '2023-06-05 01:22:48');

-- Volcando estructura para tabla laravel.purchases
CREATE TABLE IF NOT EXISTS `purchases` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `provider_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `purchase_date` datetime NOT NULL,
  `tax` decimal(8,2) NOT NULL,
  `total` decimal(11,2) NOT NULL,
  `status` enum('VALID','CANCELED') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'VALID',
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `purchases_provider_id_foreign` (`provider_id`),
  KEY `purchases_user_id_foreign` (`user_id`),
  CONSTRAINT `purchases_provider_id_foreign` FOREIGN KEY (`provider_id`) REFERENCES `providers` (`id`),
  CONSTRAINT `purchases_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla laravel.purchases: ~9 rows (aproximadamente)
INSERT INTO `purchases` (`id`, `provider_id`, `user_id`, `created_at`, `updated_at`, `purchase_date`, `tax`, `total`, `status`, `picture`) VALUES
	(1, 2, 2, '2023-06-05 01:47:44', '2023-06-05 01:50:06', '2023-06-04 15:47:44', 0.00, 28000.00, 'VALID', NULL),
	(3, 1, 2, '2023-06-05 02:00:31', '2023-06-05 02:00:31', '2023-06-04 16:00:31', 0.00, 72000.00, 'VALID', NULL),
	(5, 1, 2, '2023-06-05 10:11:11', '2023-06-05 10:43:08', '2023-06-05 00:11:11', 0.00, 36000.00, 'CANCELED', NULL),
	(6, 1, 2, '2023-06-05 10:19:57', '2023-06-05 10:19:57', '2023-06-05 00:19:57', 0.00, 30000.00, 'VALID', NULL),
	(7, 1, 2, '2023-06-05 10:21:56', '2023-06-05 10:21:56', '2023-06-05 00:21:56', 0.00, 40000.00, 'VALID', NULL),
	(8, 2, 2, '2023-06-05 10:22:33', '2023-06-05 10:22:33', '2023-06-05 00:22:33', 0.00, 50000.00, 'VALID', NULL),
	(9, 2, 2, '2023-06-05 10:22:50', '2023-06-05 10:22:50', '2023-06-05 00:22:50', 0.00, 30000.00, 'VALID', NULL),
	(10, 2, 2, '2023-06-05 10:23:22', '2023-06-05 10:23:22', '2023-06-05 00:23:22', 0.00, 30000.00, 'VALID', NULL),
	(13, 2, 2, '2023-06-05 10:39:15', '2023-06-05 10:39:15', '2023-06-05 00:39:15', 0.00, 25000.00, 'VALID', NULL);

-- Volcando estructura para tabla laravel.purchase_details
CREATE TABLE IF NOT EXISTS `purchase_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `purchase_id` bigint(20) unsigned NOT NULL,
  `product_id` bigint(20) unsigned NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `purchase_details_purchase_id_foreign` (`purchase_id`),
  KEY `purchase_details_product_id_foreign` (`product_id`),
  CONSTRAINT `purchase_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `purchase_details_purchase_id_foreign` FOREIGN KEY (`purchase_id`) REFERENCES `purchases` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla laravel.purchase_details: ~9 rows (aproximadamente)
INSERT INTO `purchase_details` (`id`, `purchase_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
	(1, 1, 3, 1, 28000.00, '2023-06-05 01:47:45', '2023-06-05 01:47:45'),
	(3, 3, 2, 2, 36000.00, '2023-06-05 02:00:31', '2023-06-05 02:00:31'),
	(5, 5, 4, 1, 36000.00, '2023-06-05 10:11:11', '2023-06-05 10:11:11'),
	(6, 6, 4, 1, 30000.00, '2023-06-05 10:19:57', '2023-06-05 10:19:57'),
	(7, 7, 4, 1, 40000.00, '2023-06-05 10:21:56', '2023-06-05 10:21:56'),
	(8, 8, 4, 2, 25000.00, '2023-06-05 10:22:33', '2023-06-05 10:22:33'),
	(9, 9, 5, 1, 30000.00, '2023-06-05 10:22:51', '2023-06-05 10:22:51'),
	(10, 10, 4, 1, 30000.00, '2023-06-05 10:23:22', '2023-06-05 10:23:22'),
	(13, 13, 8, 1, 25000.00, '2023-06-05 10:39:16', '2023-06-05 10:39:16');

-- Volcando estructura para tabla laravel.sales
CREATE TABLE IF NOT EXISTS `sales` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `sale_date` datetime NOT NULL,
  `tax` decimal(8,2) NOT NULL,
  `total` decimal(11,2) NOT NULL,
  `status` enum('VALID','CANCELED') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'VALID',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sales_client_id_foreign` (`client_id`),
  KEY `sales_user_id_foreign` (`user_id`),
  CONSTRAINT `sales_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  CONSTRAINT `sales_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla laravel.sales: ~3 rows (aproximadamente)
INSERT INTO `sales` (`id`, `client_id`, `user_id`, `sale_date`, `tax`, `total`, `status`, `created_at`, `updated_at`) VALUES
	(3, 2, 2, '2023-06-05 00:39:36', 0.00, 35000.00, 'VALID', '2023-06-05 10:39:36', '2023-06-05 10:39:36'),
	(4, 8, 2, '2023-06-05 00:40:26', 0.00, 48000.00, 'VALID', '2023-06-05 10:40:26', '2023-06-05 10:40:26'),
	(5, 9, 2, '2023-06-05 00:40:44', 0.00, 48000.00, 'CANCELED', '2023-06-05 10:40:44', '2023-06-05 10:42:30');

-- Volcando estructura para tabla laravel.sale_details
CREATE TABLE IF NOT EXISTS `sale_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `sale_id` bigint(20) unsigned NOT NULL,
  `product_id` bigint(20) unsigned NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `discount` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sale_details_sale_id_foreign` (`sale_id`),
  KEY `sale_details_product_id_foreign` (`product_id`),
  CONSTRAINT `sale_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `sale_details_sale_id_foreign` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla laravel.sale_details: ~3 rows (aproximadamente)
INSERT INTO `sale_details` (`id`, `sale_id`, `product_id`, `quantity`, `price`, `discount`, `created_at`, `updated_at`) VALUES
	(3, 3, 8, 1, 35000.00, 0.00, '2023-06-05 10:39:36', '2023-06-05 10:39:36'),
	(4, 4, 2, 1, 48000.00, 0.00, '2023-06-05 10:40:26', '2023-06-05 10:40:26'),
	(5, 5, 4, 1, 48000.00, 0.00, '2023-06-05 10:40:45', '2023-06-05 10:40:45');

-- Volcando estructura para tabla laravel.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla laravel.users: ~2 rows (aproximadamente)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Alan', 'Alancarabali@gmail.com', NULL, '$2y$10$liZl2fBn4wBbJEAzsUobLuArOrEgurYORgMMPIw8J2yUU/BVSs/4y', NULL, '2023-06-05 00:48:15', '2023-06-05 00:48:15'),
	(2, 'Diana', 'dianaamaamiranda@gmail.com', NULL, '$2y$10$ibEo1nNFmnsU3hctJ0LLHuTJO8Jf/pwk056kYlVqKaIbDCO9p0ltK', NULL, '2023-06-05 00:51:22', '2023-06-05 00:51:22');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
