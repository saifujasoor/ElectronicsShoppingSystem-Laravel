-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 01, 2020 at 05:38 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

DROP TABLE IF EXISTS `areas`;
CREATE TABLE IF NOT EXISTS `areas` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` int(11) NOT NULL,
  `city_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `areas_city_id_foreign` (`city_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `name`, `pincode`, `city_id`, `created_at`, `updated_at`) VALUES
(1, 'Krishnanagar', 382345, 1, '2020-09-26 06:40:05', '2020-09-26 06:40:05'),
(4, 'Idar', 383430, 2, '2020-10-02 14:15:41', '2020-10-02 14:15:41'),
(5, 'chandrapur', 422901, 3, '2020-10-23 13:35:24', '2020-10-23 13:35:24');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
CREATE TABLE IF NOT EXISTS `carts` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `attribute_id` int(10) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `carts_attribute_id_foreign` (`attribute_id`),
  KEY `carts_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `url`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 0, 'Mobile', 'mobiles', 1, NULL, '2020-08-13 08:32:13', '2020-09-26 07:14:28'),
(2, 1, 'MI', 'mi', 1, NULL, '2020-08-13 08:32:53', '2020-08-13 08:33:14'),
(3, 1, 'Realme', 'realme', 1, NULL, '2020-08-13 08:33:57', '2020-08-13 08:33:57'),
(4, 1, 'Apple', 'apple', 1, NULL, '2020-08-13 08:34:19', '2020-08-13 08:34:19'),
(5, 1, 'OPPO', 'oppo', 1, NULL, '2020-08-13 08:36:50', '2020-08-13 08:36:50'),
(6, 1, 'Samsung', 'samsung', 1, NULL, '2020-08-13 08:37:18', '2020-08-13 08:37:18'),
(7, 0, 'Tablet', 'tablet', 1, NULL, '2020-08-13 08:41:44', '2020-10-05 07:27:38'),
(10, 0, 'iPads', 'iPads', 1, NULL, '2020-09-26 07:13:25', '2020-10-25 09:08:57'),
(11, 10, 'Apple', 'AppleIpads', 1, NULL, '2020-10-25 09:10:21', '2020-10-27 06:38:49'),
(12, 7, 'Lenovo', 'Lenovo', 1, NULL, '2020-10-26 12:28:21', '2020-10-26 12:28:21'),
(13, 1, 'VIVO', 'vivo', 1, NULL, '2020-10-29 14:35:33', '2020-10-29 14:43:01');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cities_state_id_foreign` (`state_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `state_id`, `created_at`, `updated_at`) VALUES
(1, 'Ahmedabad', 1, '2020-09-26 06:39:36', '2020-09-26 06:39:36'),
(2, 'Vadodara', 1, '2020-09-26 06:39:47', '2020-09-26 06:39:47'),
(3, 'Maharashtra', 4, '2020-10-23 13:33:36', '2020-10-23 13:33:36');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
CREATE TABLE IF NOT EXISTS `companies` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `address`, `mobile`, `email`, `created_at`, `updated_at`) VALUES
(2, 'A to Z Electronics', 'A-24,Super market,Opp.Jain Temple,Krishnanagar,Ahmedabad', '9429004848', 'chintakd999@gmail.com', '2020-11-30 12:56:24', '2020-11-30 12:56:24');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_addresses`
--

DROP TABLE IF EXISTS `delivery_addresses`;
CREATE TABLE IF NOT EXISTS `delivery_addresses` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `landmark` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag` tinyint(1) NOT NULL DEFAULT '0',
  `area_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `delivery_addresses_area_id_foreign` (`area_id`),
  KEY `delivery_addresses_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_addresses`
--

INSERT INTO `delivery_addresses` (`id`, `customer_name`, `address`, `landmark`, `email`, `contact_no`, `flag`, `area_id`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 'Chintak', 'A-24,Mehul Appartment', 'Opp. Jain Temple', 'chintakd999@gmail.com', '9429004848', 0, 1, 29, '2020-10-06 14:58:54', '2020-11-28 03:55:25'),
(4, 'chintak', 'A-24,Mehul Appartment,', 'Opp.Jain Temple', 'chintakd999@gmail.com', '9429004848', 1, 4, 32, '2020-10-09 12:58:19', '2020-10-09 12:58:19'),
(5, 'Darshan', 'House No. 12/145,Opp hanuman Temple', 'Bapunagar Chokadi', 'darshan11@gmail.com', '9054616420', 0, 4, 29, '2020-10-19 07:33:02', '2020-10-19 07:33:02'),
(6, 'yash', 'House no 42/832, Arvalli society', 'Javanpura Road', 'yashparmar111@gmail.com', '9256314752', 1, 5, 29, '2020-10-23 13:37:07', '2020-11-28 03:55:25'),
(7, 'yash', 'lalakakahall ,shahpur', 'ahmedabad', 'yashparamar988@gmail.com', '7048640464', 1, 1, 33, '2020-10-25 08:49:16', '2020-10-25 08:49:16'),
(8, 'path gandhi', 'House No 32, Sanidhya Bunglows', 'Opp.Jain temple', 'pathgandhi00@gmail.com', '9578461245', 1, 4, 36, '2020-10-29 03:37:35', '2020-10-29 03:37:55');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3, '2020_07_17_123801_create_category_table', 2),
(11, '2014_10_12_000000_create_users_table', 3),
(12, '2014_10_12_100000_create_password_resets_table', 3),
(13, '2020_07_18_175342_create_categories_table', 3),
(14, '2020_07_30_152448_create_products_table', 4),
(15, '2020_07_30_153027_create_products_attributes_table', 5),
(16, '2020_07_30_155042_create_products_table', 6),
(17, '2020_07_30_155206_create_products_attributes_table', 7),
(18, '2020_08_03_100146_create_products_images_table', 8),
(19, '2020_08_06_184338_create_cart_table', 9),
(20, '2020_08_10_191947_create_company_table', 10),
(21, '2020_08_11_094549_create_companies_table', 11),
(22, '2020_08_11_095013_create_companies_table', 12),
(23, '2020_08_12_191937_create_states_table', 13),
(24, '2020_08_13_114701_create_cities_table', 14),
(25, '2020_08_13_115225_create_areas_table', 15),
(26, '2020_08_13_144157_create_cities_table', 16),
(27, '2020_08_13_185910_create_areas_table', 17),
(28, '2020_09_26_112926_create_delivery_addresses_table', 18),
(29, '2020_10_01_191253_create_ratings_table', 18),
(30, '2020_10_01_191953_create_feedbacks_table', 19),
(31, '2020_10_01_193032_create_orders_table', 20),
(32, '2020_10_01_193938_create_sales_table', 21),
(33, '2020_10_01_194145_create_sales_returns_table', 22),
(34, '2020_10_09_110314_create_carts_table', 23),
(35, '2020_10_12_123635_create_orders_table', 24),
(36, '2020_10_12_124752_create_sales_table', 24),
(37, '2020_10_12_124904_create_sales_returns__table', 24);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `landmark` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `flag` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `order_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cancel_flag` int(11) NOT NULL,
  `area_id` int(10) UNSIGNED NOT NULL,
  `pro_attribute_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `delivery_address_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_area_id_foreign` (`area_id`),
  KEY `orders_pro_attribute_id_foreign` (`pro_attribute_id`),
  KEY `orders_user_id_foreign` (`user_id`),
  KEY `orders_delivery_address_id_foreign` (`delivery_address_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_name`, `address`, `landmark`, `email`, `contact_no`, `amount`, `flag`, `qty`, `order_status`, `cancel_flag`, `area_id`, `pro_attribute_id`, `user_id`, `delivery_address_id`, `created_at`, `updated_at`) VALUES
(1, 'Chintak', 'A-24,Mehul Appartment', 'Opp. Jain Temple', 'chintakd999@gmail.com', '9429004848', 8999, 7896153, 1, 'Order Delivered', 0, 1, 2, 29, 3, '2020-10-25 03:30:58', '2020-10-25 03:44:41'),
(2, 'Darshan', 'House No. 12/145,Opp hanuman Temple', 'Bapunagar Chokadi', 'darshan11@gmail.com', '9054616420', 25998, 8915804, 1, 'Order Delivered', 0, 4, 1, 29, 5, '2020-10-25 04:07:39', '2020-10-25 04:09:16'),
(3, 'Darshan', 'House No. 12/145,Opp hanuman Temple', 'Bapunagar Chokadi', 'darshan11@gmail.com', '9054616420', 25998, 8915804, 1, 'Order Delivered', 0, 4, 3, 29, 5, '2020-10-25 04:07:40', '2020-10-25 04:09:17'),
(4, 'Chintak', 'A-24,Mehul Appartment', 'Opp. Jain Temple', 'chintakd999@gmail.com', '9429004848', 18999, 6910360, 1, 'Order Placed', 1, 1, 8, 29, 3, '2020-10-25 04:23:42', '2020-10-25 04:24:07'),
(5, 'yash', 'lalakakahall ,shahpur', 'ahmedabad', 'yashparamar988@gmail.com', '7048640464', 29998, 7196269, 2, 'Order Shipped', 1, 1, 10, 33, 7, '2020-10-25 08:49:49', '2020-10-25 09:01:36'),
(6, 'yash', 'lalakakahall ,shahpur', 'ahmedabad', 'yashparamar988@gmail.com', '7048640464', 30997, 5263081, 2, 'Order Delivered', 0, 1, 2, 33, 7, '2020-10-25 08:54:01', '2020-10-25 08:55:53'),
(7, 'yash', 'lalakakahall ,shahpur', 'ahmedabad', 'yashparamar988@gmail.com', '7048640464', 30997, 5263081, 1, 'Order Delivered', 0, 1, 1, 33, 7, '2020-10-25 08:54:01', '2020-10-25 08:55:53'),
(8, 'Darshan', 'House No. 12/145,Opp hanuman Temple', 'Bapunagar Chokadi', 'darshan11@gmail.com', '9054616420', 141698, 9148819, 2, 'Order Placed', 1, 4, 16, 29, 5, '2020-10-27 11:18:27', '2020-10-28 23:55:27'),
(9, 'Darshan', 'House No. 12/145,Opp hanuman Temple', 'Bapunagar Chokadi', 'darshan11@gmail.com', '9054616420', 141698, 9148819, 1, 'Order Placed', 1, 4, 33, 29, 5, '2020-10-27 11:18:28', '2020-10-28 23:55:27'),
(10, 'Chintak', 'A-24,Mehul Appartment', 'Opp. Jain Temple', 'chintakd999@gmail.com', '9429004848', 44999, 5543063, 1, 'Order Placed', 0, 1, 21, 29, 3, '2020-10-29 00:38:01', '2020-10-29 00:38:01'),
(11, 'path gandhi', 'House No 32, Sanidhya Bunglows', 'Opp.Jain temple', 'pathgandhi00@gmail.com', '9578461245', 11999, 4438491, 1, 'Order Placed', 1, 4, 11, 36, 8, '2020-10-29 03:38:54', '2020-10-29 03:39:23'),
(12, 'path gandhi', 'House No 32, Sanidhya Bunglows', 'Opp.Jain temple', 'pathgandhi00@gmail.com', '9578461245', 11999, 2442563, 1, 'Order Delivered', 0, 4, 11, 36, 8, '2020-10-29 03:39:45', '2020-10-29 03:43:27'),
(13, 'yash', 'House no 42/832, Arvalli society', 'Javanpura Road', 'yashparmar111@gmail.com', '9256314752', 29998, 4190597, 2, 'Order Delivered', 0, 5, 5, 29, 6, '2020-10-30 04:04:33', '2020-10-30 04:16:28'),
(14, 'Chintak', 'A-24,Mehul Appartment', 'Opp. Jain Temple', 'chintakd999@gmail.com', '9429004848', 12999, 9443851, 1, 'Order Delivered', 0, 1, 1, 29, 3, '2020-10-30 07:39:06', '2020-10-30 07:49:52'),
(15, 'Chintak', 'A-24,Mehul Appartment', 'Opp. Jain Temple', 'chintakd999@gmail.com', '9429004848', 22999, 6311824, 1, 'Order Delivered', 0, 1, 38, 29, 3, '2020-11-11 07:52:25', '2020-11-11 08:01:45'),
(16, 'chintak', 'A-24,Mehul Appartment,', 'Opp.Jain temple', 'chintakdoshi1999@gmail.com', '9429004848', 21000, 3149679, 1, 'Order Placed', 0, 4, 4, 29, 5, '2020-11-17 14:46:37', '2020-11-17 14:46:37'),
(17, 'Chintak', 'A-24,Mehul Appartment', 'Opp. Jain Temple', 'chintakd999@gmail.com', '9429004848', 12999, 5265641, 1, 'Order Delivered', 0, 1, 1, 29, 3, '2020-11-18 09:47:26', '2020-11-18 10:01:21'),
(18, 'Chintak', 'A-24,Mehul Appartment', 'Opp. Jain Temple', 'chintakd999@gmail.com', '9429004848', 12999, 5236213, 1, 'Order Placed', 0, 1, 3, 29, 3, '2020-11-28 03:56:08', '2020-11-28 03:56:08'),
(19, 'yash', 'House no 42/832, Arvalli society', 'Javanpura Road', 'yashparmar111@gmail.com', '9256314752', 44497, 3996898, 2, 'Order Placed', 0, 5, 6, 29, 6, '2020-12-01 03:17:37', '2020-12-01 03:17:37'),
(20, 'yash', 'House no 42/832, Arvalli society', 'Javanpura Road', 'yashparmar111@gmail.com', '9256314752', 44497, 3996898, 1, 'Order Placed', 0, 5, 15, 29, 6, '2020-12-01 03:17:37', '2020-12-01 03:17:37');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'noimage.jpg',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `browse_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sim_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hybrid_sim_slot` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `touch_screen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `otg_compatible` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resolution` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resolution_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `other_display_features` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `operating_system` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `processor_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `processor_core` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `primary_clock_speed` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secondary_clock_speed` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operating_frequency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supported_memory_card_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `memory_card_slot_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `primary_camera_available` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `primary_camera` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `primary_camera_features` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `secondary_camera_available` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secondary_camera` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secondary_camera_features` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `flash` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dual_camera_lens` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `network_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supported_networks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `internet_connectivity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gprs` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pre_installed_browser` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `micro_usb_port` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blutooth_support` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blutooth_version` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wifi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wifi_version` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usb_connectivity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `audio_jack` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `touchscreen_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sim_size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sensors` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `other_features` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gps_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fm_radio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `audio_format` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_format` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `battery_capacity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `width` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `height` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `depth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warranty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `product_name`, `image`, `description`, `model_name`, `model_number`, `browse_type`, `sim_type`, `hybrid_sim_slot`, `touch_screen`, `otg_compatible`, `display_size`, `resolution`, `resolution_type`, `other_display_features`, `operating_system`, `processor_type`, `processor_core`, `primary_clock_speed`, `secondary_clock_speed`, `operating_frequency`, `supported_memory_card_type`, `memory_card_slot_type`, `primary_camera_available`, `primary_camera`, `primary_camera_features`, `secondary_camera_available`, `secondary_camera`, `secondary_camera_features`, `flash`, `dual_camera_lens`, `network_type`, `supported_networks`, `internet_connectivity`, `gprs`, `pre_installed_browser`, `micro_usb_port`, `blutooth_support`, `blutooth_version`, `wifi`, `wifi_version`, `usb_connectivity`, `audio_jack`, `touchscreen_type`, `sim_size`, `sensors`, `other_features`, `gps_type`, `fm_radio`, `audio_format`, `video_format`, `battery_capacity`, `width`, `height`, `depth`, `weight`, `warranty`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'Redmi Note 9 Pro', '8910.jpg', 'If you are a travel blogger, gamer, entertainment seeker, or a person who loves a high-end personal device, then the Redmi 8 has been created to meet your needs. This smartphone features a 15.8-cm (6.22) Dot Notch Display, a 12 MP + 2 MP AI Dual Camera, and a 5000 mAh High-capacity Battery to offer detailed views of the stunning photos that you can click all day long without running out of battery life.', 'Redme Note 9 Pro', 'MZB9074IN', 'Smartphones', 'Dual sim', '0', '1', '1', '15.8 cm', '1520 x 720 Pixels', 'HD+', 'Screen Protection: Gorilla Glass 5 (Front Glass), Screen Mirror/Cast', 'Android Pie 9', 'Qualcomm Snapdragon 439', 'Octa Core', '1.95 GHz', '1.45 GHz', 'GSM: B2, B3, B5, B8, WCDMA: B1, B2, B5, B8, LTE TDD: B40, B41, LTE FDD: B1, B3, B5, B8', 'microSD', 'Dedicated Slot', '1', '48MP+8MP+2MP+2MP', '12MP 1.4micrometer Large Pixel Size with f/1.8, 6P Lens and Dual PD, Portrait, Bokeh, Panaroma, AI Dual Camera', '1', '48MP Front Camera', 'AI Selfie Camera, f/2.0, Portrait, Beauty Mode', 'Rear and Front Screen Flash', 'Primary Camera', '4G VOLTE, 3G, 2G', '4G VoLTE, 4G LTE, WCDMA, GSM', '4G, 3G, Wi-Fi', '1', 'yes', '1.2m', '1', 'v4.2', '1', '802.11 b/g/n', '1', '3.5mm', 'Digitizer', 'Nano SIM + Nano SIM', 'Rear Fingerprint Scanner', 'AI Face Unlock, Dual App Support, Quick Charging Version: QC 3.0, Charger Details: 5V/2A (Phone Support 18W), USB Type: Type C 2.0, Processor Type: 4 x 1.95 GHz, 4 x 1.45 GHz, A53 + A53, Aura Mirror Design, Splash-proof by P2i, Wireless FM Radio, IR Blaster', '2 band-GPS/A-GPS, GLONASS, BeiDou', '1', 'M4A', 'MKv', '5000 mAh', '75.41 mm', '156.48 mm', '9.4 mm', '188 g', 'Brand Warranty of 1 Year Available for Mobile and 6 Months for Accessories', 1, '2020-08-13 09:54:41', '2020-10-27 04:39:03'),
(3, 2, 'Redmi K20 Pro', '88226.jpg', 'The K20 Pro opens up new possibilities. The blazing-fast processor Qualcomm Snapdragon 855 gives you peak performance, while a 48 MP Triple camera setup lets you see things from a different perspective altogether. Be it gaming or everyday tasks this device handles it flawlessly. The beautiful 16.23-cm (6.39) Horizon AMOLED display is a delight when it comes to viewing content on the go. The Aura Prime design gives the device a unique look while the Corning Gorilla Glass 5 on the front and back enhances the overall user experience.', 'Redmi K20 Pro', 'MZB8135IN', 'Smartphones', 'Dual Sim', '1', '1', '1', '16.23 cm (6.39 inch)', '2340 x 1080 pixels', 'Full HD+', 'Contrast Ratio - 60000:1, NTSC Ratio - 103.8%', 'Android Pie 9.0', 'Qualcomm Snapdragon 855', 'Octa Core', '2.84 GHz', '2.42 GHz', 'GSM - B2, B3, B5, B8, WCDMA - B1, B2, B5, B8, LTE TDD - B38, B40, B41 (120MHz), LTE FDD - B1, B3, B5, B7, B8', '403 PPI', 'dual/dual', '1', '48MP + 13MP + 8MP', '48MP - IMX586,1/2.0inch, 1.6micrometer, 6P, F1.75, FOV79, AF, OL, 13MP - S5K3L6 1/3inch, 1.12micrometer, 5P, F2.4, FOV124.8, FF, 8MP - OV8856 1/4inch, 1.12micrometer, 5P, F2.4, FOV44.5, AF, OL, Laser Focus + PDAF, Slow Motion Support - 960 fps', '1', '20MP Front Camera', '20MP Popup Camera with R/B LED - Aperture - F2.2, Front Camera Pixel Size - 0.8micrometer', 'rear', 'Primary Camera', '3G, 4G VOLTE, 2G', 'GSM, WCDMA, 4G VoLTE, 4G LTE', '4G, 3G, Wi-Fi', '1', 'delta', 'micro', '1', 'v4.4', '1', '802.11 b/g/n', '1', '3.5mm', 'brongt', 'dual/dual', 'Fingerprint on Display, Ambient Light Sensor, Proximity Sensor, E-compass, Accelerometer, Gyroscope', 'Internal Memory - UFS2.1, USB Type C, QC 4.0, Processor Cores - 1 x Prime 2.84GHz + 3 x Gold 2.42GHz + 4 x Silver1.8GHz', '2 band-GPS/A-GPS, GLONASS, BeiDou', '1', 'mp4', 'mvc', '4000 mAh', '74.3 mm', '175 mm', '8.8 mm', '191 g', 'Brand Warranty of 1 Year Available for Mobile and 6 Months for Accessories', 1, '2020-08-13 12:02:19', '2020-10-27 05:06:41'),
(4, 2, 'Redmi Note 8', '22333.jpg', 'The Redmi Note 8 cellphone display is designed with elegant rounded corners with the four corners located inside a standard rectangle. Measured according to the standard rectangle, the diagonal length of the screen is 6.3 inches (the actual visible area is smaller). The term \"Full Screen Display\" indicates that the phone has a high screen to body ratio in comparison to traditional Redmi phones.', 'Redmi Note 8', 'M1908C3JI', 'Smartphones', 'Dual Sim', '1', '1', '1', '16.0 cm (6.3 inch)', '2280 x 1080$$Pixels', 'Full HD+', 'Resolution 2340 x 1080 FHD + 19.5:9 Contrast Ratio: 1500:1 (typ) NTSC: 84% (typ) Sunlight display | Night mode | Eye protection mode | Color temperature adjustment Low blue light TÜV Rheinland-certified display Corning®️Gorilla®️Glass 5', 'Android Pie 9', 'Octa Core', 'Octa Core', '2 GHz', '13MP Front Camera', 'Android Pie 9', '403 PPI', 'dual/dual', '1', '48MP + 8MP', '48MP HD | Smart ultra-wide angle mode | Rear camera Beautify Steady handheld night photography | Portrait mode background blurring | Panorama mode Pro mode | Photo timer | Leveling | Burst mode | Face recognition | HDR | Ultra wide-angle edge distortion correction | Custom watermark Portrait mode background blur adjustment | Full screen frame Rear camera AI scene detection (27 recognizable tags) | Macro camera', '1', '13MP Front Camera', 'Front camera Beautify | Front camera display brightness correction | AI seperation | Face recognition | Front camera filters Selfie timer | Selfie mirror | Hand gesture selfie | Panorama selfie | Portrait mode | Blur adjustment | Full screen camera frame', 'BACK', 'Primary Camera', '4G VOLTE', '4G LTE', '3g/4g', '1', 'delta', 'dual', '1', 'v4.2.5', '1', '802.11 b/g/n', '1', '3.9mm', 'margenta', 'Dual Sim', 'Proximity sensor | Ambient light sensor | Acceleration sensor | Gyroscope | Digital Compass | Fingerprint Sensor', 'Smart ultra-wide angle mode | Rear camera Beautify Steady handheld night photography | Portrait mode background blurring', 'Adreno 610', '1', 'mp4', 'mvc', '5000 mAh', '8.3 mm', '158.3 mm', '75.3 mm', '190 g', '1 year manufacturer warranty for device and 6 months manufacturer warranty for in-box accessories including batteries from the date of purchase', 1, '2020-08-13 12:38:37', '2020-10-27 05:10:19'),
(5, 2, 'Redmi Note 6 Pro', '16307.jpg', 'Say hello to Redmi Note 6 Pro - Xiaomi\'s first smartphone that boasts an AI-powered quad-camera. Now enjoy a smart camera experience with the AI Scene Detection feature. It helps your camera understand what it is looking at and enhances the picture automatically. Take beautiful, sharp images, thanks to the Dual Pixel Autofocus technology. Its 1.4 micrometer pixel size and wider f/1.9 aperture offer you an enhanced low-light photography experience. Powered by a Qualcomm Snapdragon 636 octa-core processor and a 4000 mAh high-capacity battery, this smartphone delivers a seamless performance and up to two days of battery life.', 'Redmi Note 6 Pro', 'M1806E7TI', 'Smartphones', 'Dual Sim', '1', '1', '1', '15.9 cm (6.26 inch)', '2280 x 1080 pixels', 'Full HD+', 'Notch Display, Corning Gorilla Glass', 'Android Oreo 8.1', 'Qualcomm Snapdragon 636', 'Octa Core', '1.8 GHz', '20MP + 2MP Dual Front Camera', 'dual type', '400 PPI', 'dual/dual', '1', '12MP + 5MP', '12MP - f/1.9, 1.4micrometer, Dual PD, 5MP - f/1.9 Aperture, Dual Pixel Auto Focus', '1', '20MP + 2MP Dual Front Camera', 'f2.0', 'Rear Flash', 'Primary & Secondary Camera', '3G, 4G VOLTE, 4G, 2G', 'GSM, WCDMA, 4G VoLTE, 4G LTE, UMTS', '4G, 3G, Wi-Fi', '1', 'mvc', 'dual', '1', '5', '1', '802.11a/b/g/n/ac', '1', '3.5mm', 'hybrid', 'dual', 'Rear Fingerprint Scanner, Ambient Light Sensor, Proximity Sensor, E-compass, Accelerometer, Gyroscope', 'Body - Metal Back, IR Blaster, Charger - 5V/2A, Quick Charge 3.0', 'rawtian', '1', 'mp4', 'mvc', '6000 mAh', '76.4 mm', '157.9 mm', '8.26 mm', '181 g', 'Brand Warranty of 1 Year Available for Mobile and 6 Months for Accessories', 1, '2020-08-13 12:56:58', '2020-10-27 05:15:18'),
(6, 4, 'Apple iPhone 8', '80704.jpg', 'iPhone SE is the most powerful 11.94-cm (4.7) iPhone ever. It features the incredibly-fast A13 Bionic for incredible performance in apps, games, and photography, Portrait mode for studio-quality portraits and six lighting effects, Next-generation Smart HDR for incredible detail across highlights and shadows, Cinematic-quality 4K video, and all the advanced features of iOS. With long battery life and water resistance, it’s so much of the iPhone you love, in a not-so-big size.', 'iPhone 8', 'MX9T2HN/A', 'Smartphones', 'Dual Sim', '0', '1', '1', '11.94 cm (4.7 inch)', '1334 x 750 Pixels', 'Retina HD Display', 'Widescreen HD LCD Retina Multi-touch IPS Display (1400:1 Contrast Ratio (Typical), True Tone Display, Wide Color Display (P3), Haptic Touch, 625 nits Max Brightness (Typical), Fingerprint-resistant Oleophobic Coating, Display Zoom, Reachability)', 'iOS 13', 'A13 Bionic Chip with 3rd Gen Neural Engine', 'cora', 'A13 Bionic Chip', '5.6', '3.44', '403 PPI', 'dual/dual', '0', '12MP Rear Camera', '12MP Wide Camera, F/1.8 Aperture, Portrait Mode with Advanced Bokeh and Depth Control, Portrait Lighting with Six Effects (Natural, Studio, Contour, Stage, Stage Mono, High-Key Mono), Optical Image Stabilisation, Six‑element Lens, Panorama (Upto 63 MP), Sapphire Crystal Lens Cover, Autofocus with Focus Pixels, Wide Color Capture for Photos and Live Photos, Next-generation Smart HDR for Photos, Advanced Red-eye Correction, Auto Image Stabilisation, Burst Mode, Photo Geotagging, Image Formats Captured: HEIF and JPEG | Video: 4K Video Recording Upto 60 fps, 1080p HD Video Recording Upto 60fps, 720p HD Video Recording at 30 fps, Extended Dynamic Range for Video Upto 30 fps, Optical Image Stabilisation for Video, QuickTake Video, Slow-motion Video Support for 1080p Upto 240 fps, Time-lapse Video with Stabilisation, Cinematic Video Stabilisation (4K,1080p and 720p), Continuous Autofocus Video, Take 8 MP Still Photos while Recording 4K Video, Playback Zoom, Video Formats Recorded: HEVC and H.264, Stereo Recording', '1', '7MP Front Camera', '7 MP Camera, F/2.2 Aperture, Portrait Mode with Advanced Bokeh and Depth Control, Portrait Lighting with Six Effects (Natural, Studio, Contour, Stage, Stage Mono, High-Key Mono), 1080p HD Video Recording at 30 fps, QuickTake Video, Wide Color Capture for Photos and Live Photos, Auto HDR for Photos, Auto Image Stabilisation, Burst Mode, Cinematic Video Stabilisation (1080p and 720p)', 'Rear: LED True Tone Flash with Slow Sync | Front: Retina Flash', 'dual/dual', '4G VOLTE, 4G, 3G, 2G', '2g/3g/4g', '3g/4g', '1', 'mvc', 'dual', '0', 'v4.2', '0', '802.11 b/g/n', '0', '6.5mm', 'hybrid', 'Nano + eSIM', 'iPhone SE', 'Splash, Water and Dust Resistant (IP67 Rated (Maximum Depth of 1 metre Upto 30 mins) Under IEC Standard 60529), Fingerprint Sensor Built into the Home Hutton, Digital Compass, iBeacon Micro-location, Video Calling (FaceTime Video Calling Over Wi-Fi or Mobile Data), Audio Calling (FaceTime Audio Calling Over Wi-Fi or Mobile Data, Voice over LTE (VoLTE), Wi-Fi Calling), Fast Charge Capable (Upto 50% Charge in 30 mins with 18 W Adapter or Higher), Wireless Charging (Works with Qi Chargers), Accessibility: Voice Control, VoiceOver, Zoom, Magnifier, RTT and TTY Support, Siri and Dictation, Type to Siri, Switch Control, Closed Captions, AssistiveTouch, Speak Screen, Rating for Hearing Aids: M3, T4', 'A-GPS, GLONASS', '1', 'AAC-LC, HE-AAC, HE-AAC v2, Protected AAC, MP3, Linear PCM, Apple Lossless, FLAC, Dolby Digital (AC-3), Dolby Digital Plus (E-AC-3) and Audible (Formats 2, 3, 4, Audible Enhanced Audio, AAX and AAX+)', 'HEVC, H.264, MPEG-4 Part 2 and Motion JPEG', '6000 mAh', '67.3 mm', '138.4 mm', '7.3 mm', '148 g', 'Brand Warranty for 1 Year', 1, '2020-08-13 13:31:27', '2020-10-27 05:26:59'),
(7, 3, 'Realme Nazro 20 Pro', '60153.jpg', '48MP rear camera with ultra-wide, super macro, portrait, night mode, 960fps slowmotion, AI scene recognition, pro color, HDR, pro mode | 13MP facing camera 16.9418 centimeters (6.67-inch) FHD+ full screen dot display LCD multi-touch capacitive touchscreen with 2400 x 1080 pixels resolution, 400 ppi pixel density and 20:9 aspect ratio | 2.5D curved glass Android v10 operating system with 2.3GHz Qualcomm Snapdragon 720G with 8nm octa core processor Memory, Storage & SIM: 4GB RAM | 64GB internal memory expandable up to 512GB with dedicated SD card slot | Dual SIM (nano+nano) dual-standby (4G+4G)', 'Real me Nazro 20 Pro', 'M2003J6A1I', 'smartphones', 'dual sim', '1', '1', '1', '16.0cm', '2160 x 1620 Pixels', 'Full HD+', 'Ultra nightscape mode | AI scene detection | Smart ultra-wide angle mode | Ultra wide-angle edge distortion correction | AI Beautify | Burst mode | Tilt-shift | Level display |', 'Android 10', 'Qualcomm Snapdragon 660', 'Octa Core', '2.0GHz', '1.9 GHz', 'amitgio', 'microsd', 'dual/dual', '1', '48MP + 8MP + 5MP + 2MP', 'Tilt-shift | Level display | Custom watermark | Pro mode | Portrait mode background blur adjustment | Studio Lighting | Panorama mode | AI high resolution photos', '1', '20MP', 'Panorama selfie | Palm shutter | AI silhouette detection | wide-angle distortion correction | Front camera HDR | Front camera display brightness correction | Selfie timer | Face recognition', 'Rear and Front Screen Flash', 'dual/dual', '3G, 4G, 2G', 'GSM, WCDMA, 4G LTE', '4G, 3G, Wi-Fi', '1', 'google chrome', 'dual', '1', 'v4.2', '1', '801.11 b/g/n', '1', '3.5mm', 'Fingerprint', 'Nano Sim', 'amtigi', 'super light', 'A-GPS', '1', 'mp4', 'H.264, H.263, MPEG-4', '6000 mAh', '75.4 mm', '158.3 mm', '75.3 mm', '207g', '1 year warranty', 1, '2020-10-26 11:09:10', '2020-10-27 05:38:38'),
(8, 3, 'Realme 7 Pro', '7462.jpg', 'he K20 opens up new possibilities. The 48 MP AI Triple camera setup lets you see things from a different perspective altogether. Be it ultra-wides or telephoto shots, the K20 produces flawless images. Powered by the Qualcomm Snapdragon 730 and a 4000 mAh battery, this device finds a perfect balance between performance and power efficiency. The Aura Prime design gives the device a unique look while the Corning Gorilla Glass 5 on the front and back enhances the overall user experience.', 'Realme 7', 'MZB7757IN', 'smartphones', 'dual sim', '1', '1', '1', '15.0cm', '1080*2240 Pixels', 'Full HD+', 'super light', 'Android 10', 'Qualcomm Snapdragon 660', 'Octa Core', '2.0GHz', '1.9 GHz', 'GSM - B2, B3, B5, B8, WCDMA - B1, B2, B5, B8, LTE TDD - B38, B40, B41 (120MHz), LTE FDD - B1, B3, B5, B7, B8', 'microsd', 'dual/dual', '1', '48MP', '48MP - IMX582, 1/2.0inch, 1.6micormeter, 6P, F1.75, FOV79, AF, OL, 13MP - S5K3L6 1/3inch, 1.12micrometer, 5P, F2.4, FOV124.8, FF, 8MP - OV8856 1/4inch, 1.12micrometer, 5P, F2.4, FOV44.5, AF, OL, PDAF, Slow Motion Support - 960 fps', '1', '20MP', '20MP Popup Camera with R/B LED - Aperture - F2.2, Front Camera Pixel Size - 0.8micrometer', 'Rear and Front Screen Flash', 'dual/dual', '3G, 4G, 2G', 'GSM, WCDMA, 4G LTE', '4G, 3G, Wi-Fi', '1', 'google chrome', 'dual', '1', 'v4.7', '1', '802.11 b/g/n', '1', '3.5mm', 'Fingerprint', 'Nano Sim', '7th Gen In-display Fingerprint Sensor, Ambient Light Sensor, Proximity Sensor, E-compass, Accelerometer, Gyroscope', 'Internal Memory - UFS2.1, USB Type C, QC 3.0, Processor Cores - 2 x Gold 2.2GHz + 6 x Silver 1.8 GHz, Game Turbo 2.0, 8-layer Graphite Stack Cooling System', 'rawtian', '1', 'mp4', 'H.264, H.263, MPEG-4', '6000 mAh', '79mm', '163.4mm', '75.3 mm', '181 g', '1 year warranty', 1, '2020-10-26 11:22:27', '2020-10-27 05:45:10'),
(9, 4, 'Apple iPhone 11', '98558.jpg', 'NA', 'iPhone 11', 'MRYD2HN/A', 'smartphones', 'dual sim', '1', '1', '1', '15.0cm', '1080*2240 Pixels', 'Full HD+', '1400:1 Contrast Ratio (Typical), True Tone Display (Six-channel Light Sensor), Wide Colour Display (P3), 625 nits Maximum Brightness (Typical), Fingerprint-resistant Oleophobic Coating, Support for Display of Multiple Languages and Characters Simultaneously, Liquid Retina HD Display, Tap to Wake, Wide Colour Gamut,', 'Android Pie 9.0', 'Qualcomm Snapdragon 660', 'Octa Core', '2.0GHz', '1.9 GHz', 'super', 'microsd', 'dual/dual', '1', '48MP', 'Wide-angle Camera, f/1.8 Aperture, Portrait Mode with Advanced Bokeh and Depth Control, Portrait Lighting with Three Effects (Natural, Studio, Contour), Optical Image Stabilisation, Six-element Lens, Panorama (Upto 63MP), Sapphire Crystal Lens Cover, Backside Illumination Sensor, Hybrid IR Filter, Autofocus with Focus Pixels, Tap to Focus with Focus Pixels, Smart HDR for Photos,', '1', '20MP', 'Features\r\nTrueDepth Camera - f/2.2 Aperture, Portrait Mode with Advanced Bokeh and Depth Control, Portrait Lighting with Five Effects', 'Rear and Front Screen Flash', 'Primary Camera', '3G, 4G, 2G', 'GSM, WCDMA, 4G LTE', '4G, 3G, Wi-Fi', '1', 'google chrome', 'dual', '1', 'v4.7', '1', '802.11 b/g/n', '1', '3.5mm', 'Fingerprint', 'Nano Sim', '7th Gen In-display Fingerprint Sensor, Ambient Light Sensor, Proximity Sensor, E-compass, Accelerometer, Gyroscope', '1400:1 Contrast Ratio (Typical), True Tone Display (Six-channel Light Sensor), Wide Colour Display (P3), 625 nits Maximum Brightness (Typical), Fingerprint-resistant Oleophobic Coating, Support for Display of Multiple Languages and Characters Simultaneously, Liquid Retina HD Display, Tap to Wake, Wide Colour Gamut,', 'rawtian', '1', 'mp4', 'H.264, H.263, MPEG-4', '8000 mAh', '9 mm', '150.9 mm', '92 mm', '207g', '1 year warranty', 1, '2020-10-26 11:38:01', '2020-10-27 05:53:06'),
(10, 5, 'OPPO A52', '88446.jpg', 'The OPPO A52 smartphone will make your life a seamless one. It comes with the 1080p Neo Display and dual stereo speakers that will ensure you get to watch everything clearly and loudly. Oh, and do you spend a long time using your phone? Then, the Eye Care mode and the Dark mode will ensure that your eyes are not strained much. When it comes to pictures, this phone’s AI Quad Camera will let you capture everything really well.', 'A52', 'CPH2061', 'smartphones', 'dual sim', '1', '1', '1', '16.0cm', '1080*2240 Pixels', 'Full HD+', '480 nit Brightness (typ), 82% NTSC Color Saturation (typ), 1500:1 Screen Contrast (typ), 90.50% Screen Ratio, 1.73 mm Narrow Frame', 'Android Pie 9.0', 'Qualcomm Snapdragon 660', 'Octa Core', '2.0GHz', '1.9 GHz', 'amitgio', 'microsd', 'dual/dual', '1', '48MP', 'Primary Camera: 12 MP + 8 MP + 2 MP + 2 MP, Sensor Sizes/Pixel Data: 1/2.8 inch/1.25 um + 1/4 inch/1.12 um + 1/5 inch/1.75 um + 1/5/1.75 um, Sensor Type: OV12A10 + OV8856 + GC02M0 + GC02M0, Upto 10x Digital Zoom Support, Aperture: Primary - F1.8, Secondary - F2.2, Focal Length: 4.05 mm + 1.64 mm + 1.77 mm + 1.77 mm, Lens Number: Main Shooting 5P, Secondary 5P', '1', '16MP Front Camera', '16 MP Selfie Camera, Sensor Sizes/Pixel Data: 1/3.1 inch/1 um, CMOS Sensor, Sensor Model/Manufacturers: S5K3P9SP/Samsung, Focusing Method: Fixed Focus, Aperture: F2.0, Flashlight: Front Screen Fill Light, Lens Number: 5P', 'Rear and Front Screen Flash', 'dual/dual', '3G, 4G, 2G', 'GSM, WCDMA, 4G LTE', '4G, 3G, Wi-Fi', '1', 'google chrome', 'dual', '1', 'v4.7', '1', '802.11 b/g/n', '1', '4.5mm', 'Fingerprint', 'Nano Sim', '7th Gen In-display Fingerprint Sensor, Ambient Light Sensor, Proximity Sensor, E-compass, Accelerometer, Gyroscope', '18 W Fast Charging, Side Mounted Fingerprint Sensor, Fingerprint Access Time: 409.46 ms, File Encryption, Program Frozen, UFS 2.1 ROM Technology', 'rawtian', '1', 'mp4', 'H.264, H.263, MPEG-4', '6000 mAh', '75.4 mm', '173.4mm', '9.1', '207g', '1 year warranty', 1, '2020-10-26 11:52:36', '2020-10-27 05:55:39'),
(11, 6, 'Samsung Galaxy A51', '5180.jpg', '18 W Fast Charging, Side Mounted Fingerprint Sensor, Fingerprint Access Time: 409.46 ms, File Encryption, Program Frozen, UFS 2.1 ROM Technology', 'Galaxy A51', 'SM-F415FZBGINS', 'smartphones', 'dual sim', '1', '1', '0', '16.0cm', '1080*2240 Pixels', 'Full HD+', 'FingerPrint Sensor', 'GSM: 850, 900, 1800 |', 'Qualcomm Snapdragon 660', 'Octa Core', '2.0GHz', '1.9 GHz', 'dual node', 'microsd', 'dual/dual', '1', '48MP', '64MP (Main) + 5MP (Depth) + 8MP (Ultra Wide) Rear Camera Setup', '1', '32MP Selfie Camera', '32MP Selfie Camera Setup', 'Rear and Front Screen Flash', 'dual/dual', '3G, 4G, 2G', 'GSM, WCDMA, 4G LTE', '4G, 3G, Wi-Fi', '1', 'google chrome', 'dual', '1', 'v4.7', '1', '802.11 b/g/n', '1', '3.5mm', 'Fingerprint', 'Nano Sim', '7th Gen In-display Fingerprint Sensor, Ambient Light Sensor, Proximity Sensor, E-compass, Accelerometer, Gyroscope', 'super light amitigo', 'rawtian', '1', 'mp4', 'H.264, H.263, MPEG-4', '6000 mAh', '76.4 mm', '150.9 mm', '8.69mm', '181 g', '1 year warranty', 1, '2020-10-26 12:05:17', '2020-10-27 06:07:42'),
(12, 12, 'Lenovo Tab M10', '24515.jpg', 'Be ready to experience a powerful computing experience by bringing home the sleek and stylish Lenovo Smart Tab M10 Tablet. It has a thickness of 8.1 mm, making it easy for you to use and take it along wherever you go. The 26.16 cm (10.3) FHD display and dual speakers of this tablet offer an immersive audio-visual experience. Also, this tablet from Lenovo supports Google Assistant, so you can get your queries answered, control smart home devices, and more, by just using your voice.', 'Smart Tab M10 FHD Plus (2nd Gen) with Google Assistant', 'ZA6S0003IN', 'smartphones', 'dual sim', '1', '1', '1', '26.0cm', '2160 x 1620 Pixels', 'Full HD+', 'Upto 93% Full Metal Back Cover, Upto 87% Panel-to-body Ratio, Bumpy Environment Alert, Posture Alert, Dual Side Speakers Tuned by Dolby Atmos, Google Assistant Ambient Mode (Ask to Listen to Music, Ask to Control Your Home), Face Unlock, Dual Microphones (with Dedicated DSP), FM Radio, Eye Protection, Included Applications: Kid’s Mode, Tips, Netflix, Google, Gmail, Google Chrome, Google Photos, Google Play Store', 'Android Pie 9.0', 'Qualcomm Snapdragon 660', 'Octa Core', '2.0GHz', '1.9 GHz', 'Bands Supported: GSM - B2/B3/B5/B8, WCDMA - B1/B2/B3/B5 (B6/B19)/B8, FDD LTE - B1/B2/B3/B4/B5 (B19)/B7/B8/B20, TDD LTE - B38/B40', 'microsd', 'dual/dual', '1', '48MP + 5MP + 8MP', 'super sensor light', '1', '20MP', 'rear light', 'Rear and Front Screen Flash', 'dual/dual', '3G, 4G, 2G', 'GSM, WCDMA, 4G LTE', '4G, 3G, Wi-Fi', '1', 'google chrome', 'dual', '1', 'v4.7', '1', '802.11 b/g/n', '1', '4.5mm', 'Fingerprint', 'Nano Sim', '7th Gen In-display Fingerprint Sensor, Ambient Light Sensor, Proximity Sensor, E-compass, Accelerometer, Gyroscope', 'super light amitgio', 'rawtian', '1', 'mp4', 'H.264, H.263, MPEG-4', '6000 mAh', '75.4 mm', '158.3 mm', '75.3 mm', '181 g', '1 year warranty', 1, '2020-10-26 12:33:14', '2020-10-27 06:16:38'),
(13, 11, 'New Apple iPad Pro (2nd Generation)', '61246.jpg', 'The 7th generation iPad comes with a Retina display and combines the power and capability of a computer. Powered by the advanced A10 Fusion chip, this lightweight and robust iPad comes with a versatile camera set-up. The built-in FaceTime HD camera helps you have video calls in a seamless manner, while the 8 MP rear shooter helps you take amazing pictures and record HD videos. This iPad also comes with a full-sized Smart Keyboard and Apple Pen support. If you have been looking for a perfect balance between work and play, the iPad is here to provide you with exactly that.', '7.2', 'M2003J6A1I', 'smartphones', 'dual sim', '1', '1', '1', '16.0cm', '1080*2240 Pixels', 'Full HD+', 'Built-in Stereo Speakers, Video and Audio Calling (iPad to Any FaceTime Enabled Device Over Wi-Fi or Cellular), Digital Compass, Built-in Apps: FaceTime, Mail, Siri, iTunes Store, Podcasts, iMovie, Keynote, Clips', 'Apple Pie 9.0', 'Qualcomm Snapdragon 660', 'Octa Core', '2.0GHz', '1.9 GHz', 'redix blueton', 'microsd', 'dual/dual', '1', '48MP', 'Rear Camera: F/2.4 Aperture, Five Element Lens, Hybrid IR Flter, Backside Illumination, Live Photos, Autofocus, Panorama (Upto 43 MP), HDR for Photos, Exposure Control, Burst Mode,', '1', '5MP Front Camera', 'Rear light', 'Rear and Front Screen Flash', 'dual/dual', '3G, 4G, 2G', 'GSM, WCDMA, 4G LTE', '4G, 3G, Wi-Fi', '1', 'google chrome', 'dual', '1', 'v4.7', '1', '802.11 b/g/n', '1', '3.5mm', 'Fingerprint', 'Nano Sim', '7th Gen In-display Fingerprint Sensor, Ambient Light Sensor, Proximity Sensor, E-compass, Accelerometer, Gyroscope', 'Super light', 'rawtian', '1', 'mp4', 'H.264, H.263, MPEG-4', '6000 mAh', '75.4 mm', '163.4mm', '9.1', '181 g', '1 year warranty', 1, '2020-10-26 12:48:55', '2020-10-27 06:43:52'),
(14, 2, 'Redmi 5A', 'noimage.jpg', 'The OPPO A52 smartphone will make your life a seamless one. It comes with the 1080p Neo Display and dual stereo speakers that will ensure you get to watch everything clearly and loudly. Oh, and do you spend a long time using your phone? Then, the Eye Care mode and the Dark mode will ensure that your eyes are not strained much. When it comes to pictures, this phone’s AI Quad Camera will let you capture everything really well.', '5A', 'CPH2061', 'smartphones', 'dual sim', '1', '1', '1', '16.0cm', '1080*2240 Pixels', 'Full HD+', '480 nit Brightness (typ), 82% NTSC Color Saturation (typ), 1500:1 Screen Contrast (typ), 90.50% Screen Ratio, 1.73 mm Narrow Frame', 'Android Pie 9.0', 'Qualcomm Snapdragon 660', 'Octa Core', '2.0GHz', '1.9 GHz', 'amitgio', 'microsd', 'dual/dual', '1', '48MP', 'Primary Camera: 12 MP + 8 MP + 2 MP + 2 MP, Sensor Sizes/Pixel Data: 1/2.8 inch/1.25 um + 1/4 inch/1.12 um + 1/5 inch/1.75 um + 1/5/1.75 um, Sensor Type: OV12A10 + OV8856 + GC02M0 + GC02M0, Upto 10x Digital Zoom Support, Aperture: Primary - F1.8, Secondary - F2.2, Focal Length: 4.05 mm + 1.64 mm + 1.77 mm + 1.77 mm, Lens Number: Main Shooting 5P, Secondary 5P', '1', '16MP Front Camera', '16 MP Selfie Camera, Sensor Sizes/Pixel Data: 1/3.1 inch/1 um, CMOS Sensor, Sensor Model/Manufacturers: S5K3P9SP/Samsung, Focusing Method: Fixed Focus, Aperture: F2.0, Flashlight: Front Screen Fill Light, Lens Number: 5P', 'Rear and Front Screen Flash', 'dual/dual', '3G, 4G, 2G', 'GSM, WCDMA, 4G LTE', '4G, 3G, Wi-Fi', '1', 'google chrome', 'dual', '1', 'v4.7', '1', '802.11 b/g/n', '1', '4.5mm', 'Fingerprint', 'Nano Sim', '7th Gen In-display Fingerprint Sensor, Ambient Light Sensor, Proximity Sensor, E-compass, Accelerometer, Gyroscope', '18 W Fast Charging, Side Mounted Fingerprint Sensor, Fingerprint Access Time: 409.46 ms, File Encryption, Program Frozen, UFS 2.1 ROM Technology', 'rawtian', '1', 'mp4', 'H.264, H.263, MPEG-4', '6000 mAh', '75.4 mm', '173.4mm', '9.1', '207g', '1 year warranty', 1, '2020-12-01 00:57:51', '2020-12-01 00:57:51'),
(15, 2, 'Redmi 5A', 'noimage.jpg', 'The OPPO A52 smartphone will make your life a seamless one. It comes with the 1080p Neo Display and dual stereo speakers that will ensure you get to watch everything clearly and loudly. Oh, and do you spend a long time using your phone? Then, the Eye Care mode and the Dark mode will ensure that your eyes are not strained much. When it comes to pictures, this phone’s AI Quad Camera will let you capture everything really well.', '5A', 'CPH2061', 'smartphones', 'dual sim', '1', '1', '1', '16.0cm', '1080*2240 Pixels', 'Full HD+', '480 nit Brightness (typ), 82% NTSC Color Saturation (typ), 1500:1 Screen Contrast (typ), 90.50% Screen Ratio, 1.73 mm Narrow Frame', 'Android Pie 9.0', 'Qualcomm Snapdragon 660', 'Octa Core', '2.0GHz', '1.9 GHz', 'amitgio', 'microsd', 'dual/dual', '1', '48MP', 'Primary Camera: 12 MP + 8 MP + 2 MP + 2 MP, Sensor Sizes/Pixel Data: 1/2.8 inch/1.25 um + 1/4 inch/1.12 um + 1/5 inch/1.75 um + 1/5/1.75 um, Sensor Type: OV12A10 + OV8856 + GC02M0 + GC02M0, Upto 10x Digital Zoom Support, Aperture: Primary - F1.8, Secondary - F2.2, Focal Length: 4.05 mm + 1.64 mm + 1.77 mm + 1.77 mm, Lens Number: Main Shooting 5P, Secondary 5P', '1', '16MP Front Camera', '16 MP Selfie Camera, Sensor Sizes/Pixel Data: 1/3.1 inch/1 um, CMOS Sensor, Sensor Model/Manufacturers: S5K3P9SP/Samsung, Focusing Method: Fixed Focus, Aperture: F2.0, Flashlight: Front Screen Fill Light, Lens Number: 5P', 'Rear and Front Screen Flash', 'dual/dual', '3G, 4G, 2G', 'GSM, WCDMA, 4G LTE', '4G, 3G, Wi-Fi', '1', 'google chrome', 'dual', '1', 'v4.7', '1', '802.11 b/g/n', '1', '4.5mm', 'Fingerprint', 'Nano Sim', '7th Gen In-display Fingerprint Sensor, Ambient Light Sensor, Proximity Sensor, E-compass, Accelerometer, Gyroscope', '18 W Fast Charging, Side Mounted Fingerprint Sensor, Fingerprint Access Time: 409.46 ms, File Encryption, Program Frozen, UFS 2.1 ROM Technology', 'rawtian', '1', 'mp4', 'H.264, H.263, MPEG-4', '6000 mAh', '75.4 mm', '173.4mm', '9.1', '207g', '1 year warranty', 1, '2020-12-01 03:20:56', '2020-12-01 03:20:56');

-- --------------------------------------------------------

--
-- Table structure for table `products_attributes`
--

DROP TABLE IF EXISTS `products_attributes`;
CREATE TABLE IF NOT EXISTS `products_attributes` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `ram` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `storage` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_attributes`
--

INSERT INTO `products_attributes` (`id`, `product_id`, `ram`, `storage`, `color`, `price`, `stock`, `created_at`, `updated_at`) VALUES
(1, 1, '4GB', '32GB', 'Blue', 12999.00, 8, '2020-08-13 11:07:31', '2020-11-18 10:07:46'),
(2, 2, '3GB', '16GB', 'White', 8999.00, 20, '2020-08-13 11:36:55', '2020-10-25 08:56:42'),
(3, 3, '4GB', '64GB', 'black', 12999.00, 8, '2020-08-13 12:08:54', '2020-11-28 03:56:08'),
(4, 4, '4gb', '64gb', 'space black', 21000.00, 21, '2020-08-13 12:42:24', '2020-11-17 14:46:37'),
(5, 5, '4GB', '64GB', 'Rose Gold', 14999.00, 15, '2020-08-13 12:58:38', '2020-11-11 07:57:35'),
(6, 1, '6GB', '128GB', 'Light Grey', 15999.00, 2, '2020-09-25 11:07:59', '2020-12-01 03:17:37'),
(8, 6, '4GB', '64GB', 'Light Red', 18999.00, 5, '2020-10-23 14:42:43', '2020-10-29 15:24:24'),
(10, 3, '6GB', '128GB', 'Light Blue', 14999.00, 27, '2020-10-23 14:43:59', '2020-10-25 09:02:02'),
(11, 2, '4GB', '64GB', 'Grey', 11999.00, 17, '2020-10-23 14:55:33', '2020-10-29 03:44:21'),
(12, 7, '4GB', '64GB', 'rose silver', 14499.00, 10, '2020-10-26 11:12:06', '2020-10-26 11:12:06'),
(13, 7, '4GB', '64GB', 'white', 17999.00, 44, '2020-10-26 11:12:56', '2020-10-26 11:12:56'),
(14, 7, '8GB', '128GB', 'blue', 24799.00, 12, '2020-10-26 11:13:32', '2020-10-26 11:13:32'),
(15, 8, '4GB', '64GB', 'carbon', 12499.00, 11, '2020-10-26 11:23:08', '2020-12-01 03:17:37'),
(16, 8, '4GB', '64GB', 'white', 12399.00, 45, '2020-10-26 11:23:27', '2020-10-28 23:55:27'),
(17, 8, '8GB', '64GB', 'blue', 16999.00, 44, '2020-10-26 11:23:54', '2020-10-26 11:23:54'),
(18, 8, '8GB', '128GB', 'rose gold', 22999.00, 33, '2020-10-26 11:24:27', '2020-10-26 11:24:27'),
(19, 9, '4GB', '64GB', 'black', 34600.00, 55, '2020-10-26 11:38:36', '2020-10-26 11:38:36'),
(20, 9, '4GB', '64GB', 'white', 34600.00, 56, '2020-10-26 11:39:01', '2020-10-26 11:39:01'),
(21, 9, '8GB', '128GB', 'white', 44999.00, 33, '2020-10-26 11:39:20', '2020-10-29 00:38:01'),
(22, 10, '4GB', '64GB', 'white', 18999.00, 34, '2020-10-26 11:53:11', '2020-10-26 11:53:11'),
(23, 10, '4GB', '64GB', 'space black', 21999.00, 12, '2020-10-26 11:53:33', '2020-10-26 11:53:33'),
(24, 10, '8GB', '128GB', 'white', 34599.00, 23, '2020-10-26 11:54:10', '2020-10-26 11:54:10'),
(25, 11, '4GB', '64GB', 'white', 23999.00, 12, '2020-10-26 12:05:49', '2020-10-26 12:06:43'),
(26, 11, '4GB', '64GB', 'black', 22699.00, 6, '2020-10-26 12:06:10', '2020-10-26 12:06:43'),
(27, 11, '4GB', '64GB', 'blue', 22999.00, 45, '2020-10-26 12:06:29', '2020-10-26 12:06:43'),
(28, 11, '8GB', '128GB', 'carbon', 33999.00, 34, '2020-10-26 12:07:04', '2020-10-26 12:07:04'),
(29, 12, '4GB', '32GB', 'blue', 22500.00, 23, '2020-10-26 12:34:03', '2020-10-26 12:34:03'),
(30, 12, '4GB', '32GB', 'carbon', 24500.00, 46, '2020-10-26 12:34:28', '2020-10-26 12:34:28'),
(31, 12, '8GB', '128GB', 'white', 45000.00, 34, '2020-10-26 12:34:46', '2020-10-26 12:34:46'),
(32, 12, '8GB', '64GB', 'blue', 42000.00, 33, '2020-10-26 12:35:13', '2020-10-26 12:35:13'),
(33, 13, 'Wi-Fi', '1TB', 'Silver', 116900.00, 23, '2020-10-26 12:49:27', '2020-10-28 23:55:27'),
(34, 13, 'Wi-Fi + Cel', '1TB', 'Silver', 130900.00, 66, '2020-10-26 12:49:59', '2020-10-27 06:49:29'),
(35, 13, 'Wi-Fi + Cel', '512GB', 'Silver', 112900.00, 41, '2020-10-26 12:50:21', '2020-10-27 06:49:29'),
(36, 6, '3GB', '32GB', 'Light Blue', 16999.00, 7, '2020-10-29 15:12:29', '2020-10-29 15:24:24'),
(38, 6, '6GB', '64GB', 'Light Blue', 22999.00, 12, '2020-10-29 15:19:06', '2020-11-28 03:58:51'),
(39, 5, '6GB', '128GB', 'Light Grey', 16999.00, 11, '2020-10-30 04:02:29', '2020-10-30 04:02:29');

-- --------------------------------------------------------

--
-- Table structure for table `products_images`
--

DROP TABLE IF EXISTS `products_images`;
CREATE TABLE IF NOT EXISTS `products_images` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_images`
--

INSERT INTO `products_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(46, 1, '1178.jpg', '2020-10-27 04:35:59', '2020-10-27 04:35:59'),
(47, 1, '80399.jpg', '2020-10-27 04:36:00', '2020-10-27 04:36:00'),
(48, 1, '99647.jpg', '2020-10-27 04:36:01', '2020-10-27 04:36:01'),
(49, 1, '59480.jpg', '2020-10-27 04:36:01', '2020-10-27 04:36:01'),
(50, 1, '30658.jpg', '2020-10-27 04:36:02', '2020-10-27 04:36:02'),
(51, 2, '90425.jpg', '2020-10-27 04:49:32', '2020-10-27 04:49:32'),
(52, 2, '36151.jpg', '2020-10-27 04:49:33', '2020-10-27 04:49:33'),
(53, 2, '65108.jpg', '2020-10-27 04:49:33', '2020-10-27 04:49:33'),
(54, 2, '89629.jpg', '2020-10-27 04:49:33', '2020-10-27 04:49:33'),
(61, 3, '68164.jpg', '2020-10-27 05:06:10', '2020-10-27 05:06:10'),
(62, 3, '55413.jpg', '2020-10-27 05:06:11', '2020-10-27 05:06:11'),
(63, 3, '69740.jpg', '2020-10-27 05:06:11', '2020-10-27 05:06:11'),
(64, 3, '99145.jpg', '2020-10-27 05:06:11', '2020-10-27 05:06:11'),
(65, 3, '50567.jpeg', '2020-10-27 05:06:12', '2020-10-27 05:06:12'),
(66, 4, '61153.jpg', '2020-10-27 05:10:57', '2020-10-27 05:10:57'),
(67, 4, '19686.jpg', '2020-10-27 05:10:57', '2020-10-27 05:10:57'),
(68, 4, '88285.jpg', '2020-10-27 05:10:57', '2020-10-27 05:10:57'),
(69, 4, '12801.jpg', '2020-10-27 05:10:58', '2020-10-27 05:10:58'),
(70, 5, '34931.jpg', '2020-10-27 05:16:02', '2020-10-27 05:16:02'),
(71, 5, '17626.jpg', '2020-10-27 05:16:02', '2020-10-27 05:16:02'),
(72, 5, '13629.jpg', '2020-10-27 05:16:03', '2020-10-27 05:16:03'),
(73, 5, '92039.jpg', '2020-10-27 05:16:03', '2020-10-27 05:16:03'),
(74, 6, '28648.jpg', '2020-10-27 05:25:08', '2020-10-27 05:25:08'),
(75, 6, '4279.jpg', '2020-10-27 05:25:11', '2020-10-27 05:25:11'),
(76, 6, '85543.jpg', '2020-10-27 05:25:12', '2020-10-27 05:25:12'),
(77, 7, '29126.jpg', '2020-10-27 05:39:32', '2020-10-27 05:39:32'),
(78, 7, '96819.jpg', '2020-10-27 05:39:33', '2020-10-27 05:39:33'),
(79, 7, '72288.jpg', '2020-10-27 05:39:33', '2020-10-27 05:39:33'),
(80, 7, '28419.jpg', '2020-10-27 05:39:34', '2020-10-27 05:39:34'),
(81, 7, '54202.jpg', '2020-10-27 05:39:34', '2020-10-27 05:39:34'),
(82, 8, '45960.jpg', '2020-10-27 05:45:53', '2020-10-27 05:45:53'),
(83, 8, '82924.jpeg', '2020-10-27 05:45:54', '2020-10-27 05:45:54'),
(84, 8, '97595.jpg', '2020-10-27 05:45:54', '2020-10-27 05:45:54'),
(85, 8, '33632.jpg', '2020-10-27 05:45:55', '2020-10-27 05:45:55'),
(86, 9, '75360.jpg', '2020-10-27 05:53:52', '2020-10-27 05:53:52'),
(87, 9, '33288.jpg', '2020-10-27 05:53:53', '2020-10-27 05:53:53'),
(88, 9, '34626.jpg', '2020-10-27 05:53:53', '2020-10-27 05:53:53'),
(89, 9, '29097.jpg', '2020-10-27 05:53:54', '2020-10-27 05:53:54'),
(90, 9, '47924.jpg', '2020-10-27 05:53:54', '2020-10-27 05:53:54'),
(91, 9, '60809.jpg', '2020-10-27 05:53:54', '2020-10-27 05:53:54'),
(92, 10, '34503.jpg', '2020-10-27 05:56:32', '2020-10-27 05:56:32'),
(93, 10, '74911.jpg', '2020-10-27 05:56:33', '2020-10-27 05:56:33'),
(94, 10, '45896.jpg', '2020-10-27 05:56:33', '2020-10-27 05:56:33'),
(95, 10, '26005.jpg', '2020-10-27 05:56:34', '2020-10-27 05:56:34'),
(96, 10, '89214.jpg', '2020-10-27 05:56:35', '2020-10-27 05:56:35'),
(97, 11, '74518.jpg', '2020-10-27 06:08:17', '2020-10-27 06:08:17'),
(98, 11, '32360.jpg', '2020-10-27 06:08:17', '2020-10-27 06:08:17'),
(99, 11, '32592.jpg', '2020-10-27 06:08:17', '2020-10-27 06:08:17'),
(100, 11, '76641.jpeg', '2020-10-27 06:08:18', '2020-10-27 06:08:18'),
(101, 11, '74617.jpg', '2020-10-27 06:08:18', '2020-10-27 06:08:18'),
(102, 12, '61015.jpg', '2020-10-27 06:17:07', '2020-10-27 06:17:07'),
(103, 12, '94974.jpg', '2020-10-27 06:17:07', '2020-10-27 06:17:07'),
(104, 12, '62071.jpg', '2020-10-27 06:17:08', '2020-10-27 06:17:08'),
(105, 12, '844.jpg', '2020-10-27 06:17:08', '2020-10-27 06:17:08'),
(106, 12, '32715.jpg', '2020-10-27 06:17:09', '2020-10-27 06:17:09'),
(107, 12, '72311.jpg', '2020-10-27 06:17:09', '2020-10-27 06:17:09'),
(108, 12, '87775.jpg', '2020-10-27 06:17:10', '2020-10-27 06:17:10'),
(109, 12, '98579.jpg', '2020-10-27 06:17:10', '2020-10-27 06:17:10'),
(110, 13, '52196.jpg', '2020-10-27 06:44:34', '2020-10-27 06:44:34'),
(111, 13, '48114.jpg', '2020-10-27 06:44:35', '2020-10-27 06:44:35'),
(112, 13, '9000.jpg', '2020-10-27 06:44:35', '2020-10-27 06:44:35'),
(113, 13, '56370.jpg', '2020-10-27 06:44:36', '2020-10-27 06:44:36');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
CREATE TABLE IF NOT EXISTS `sales` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sales_order_id_foreign` (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `order_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-10-25 03:44:41', '2020-10-25 03:44:41'),
(2, 2, '2020-10-25 04:09:16', '2020-10-25 04:09:16'),
(3, 3, '2020-10-25 04:09:17', '2020-10-25 04:09:17'),
(4, 6, '2020-10-25 08:55:53', '2020-10-25 08:55:53'),
(5, 7, '2020-10-25 08:55:53', '2020-10-25 08:55:53'),
(6, 12, '2020-10-29 03:43:27', '2020-10-29 03:43:27'),
(7, 13, '2020-10-30 04:16:28', '2020-10-30 04:16:28'),
(8, 14, '2020-10-30 07:49:52', '2020-10-30 07:49:52'),
(9, 15, '2020-11-11 08:01:45', '2020-11-11 08:01:45'),
(10, 17, '2020-11-18 10:01:22', '2020-11-18 10:01:22');

-- --------------------------------------------------------

--
-- Table structure for table `sales_returns`
--

DROP TABLE IF EXISTS `sales_returns`;
CREATE TABLE IF NOT EXISTS `sales_returns` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `reason` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_attribute_id` int(10) UNSIGNED NOT NULL,
  `sales_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sales_returns_pro_attribute_id_foreign` (`pro_attribute_id`) USING BTREE,
  KEY `sales_returns_user_id_foreign` (`user_id`) USING BTREE,
  KEY `sales_returns_sales_id_foreign` (`sales_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_returns`
--

INSERT INTO `sales_returns` (`id`, `reason`, `pro_attribute_id`, `sales_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'not good', 2, 1, 29, '2020-10-25 03:45:42', '2020-10-25 03:45:42'),
(2, 'Damage Product', 1, 2, 29, '2020-10-25 04:21:20', '2020-10-25 04:21:20'),
(3, 'very cheap product', 2, 4, 33, '2020-10-25 08:56:41', '2020-10-25 08:56:41'),
(4, 'Damage Product', 3, 3, 29, '2020-10-28 23:56:06', '2020-10-28 23:56:06'),
(5, 'Wrong Product Received', 11, 6, 36, '2020-10-29 03:44:21', '2020-10-29 03:44:21'),
(6, 'Damage Product Received', 1, 8, 29, '2020-10-30 07:50:48', '2020-10-30 07:50:48'),
(7, 'Damage Product Received', 5, 7, 29, '2020-11-11 07:57:35', '2020-11-11 07:57:35'),
(8, 'Damage Product Received', 1, 10, 29, '2020-11-18 10:07:46', '2020-11-18 10:07:46'),
(9, 'Damage Product', 38, 9, 29, '2020-11-28 03:58:51', '2020-11-28 03:58:51');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
CREATE TABLE IF NOT EXISTS `states` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Gujarat', '2020-08-12 14:35:54', '2020-08-13 05:52:40'),
(2, 'Rajasthan', '2020-08-12 14:36:32', '2020-08-12 14:36:32'),
(3, 'Haryana', '2020-08-12 14:36:41', '2020-10-23 13:33:21'),
(4, 'Mumbai', '2020-10-23 13:29:38', '2020-10-23 13:29:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `mobile`, `email`, `password`, `admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'chintak', '0', 'chintakd999@gmail.com', '$2y$10$AiXozHfwQdvWMNEAXLiByO5y6UZeZEw6ylyaCtohvqNUoQw.T6Q6y', 1, 'gU7dhHkZtgzUKxMzOWyQmAaE3A1ONyB1eRXGHq5kv0NqzxNCSG58iin5wOup', '2020-07-30 09:21:51', '2020-07-30 14:03:58'),
(29, 'chintak doshi', '9429004848', 'chintakdoshi1999@gmail.com', '$2y$10$5mGmyVBuaQ87uuo3lQx.X.PfMMLkiSpwM3fBgAm.gBU2l7/42ey0G', 0, 'rNizpbq6KxcgZUyi9JMChWhkyV3hH3JAYEH6n1l7gbpsxMethfEE06TYC6IN', '2020-08-12 03:25:53', '2020-12-01 03:15:55'),
(32, 'chintak', '9054616420', 'chintakdoshi123@gmail.com', '$2y$10$YvmSwumAQ2KfoTmj8.xtT.6svqPH3WKmAGEN3.wUEZ4331sr1e7cG', 0, NULL, '2020-10-09 11:09:47', '2020-10-09 12:58:45'),
(33, 'yash', '7048640464', 'yashparamar988@gmail.com', '$2y$10$/go.b5sHrYn0IyiYKPvKEuIgxH.tjFkOLRoeUACCPVlslZIE.OzVS', 0, 'CZmff2yHmHqyJGcm527ag396pwzRx9XlOhmnZRAadlHIyESYnSjAh7wB65RQ', '2020-10-25 08:45:32', '2020-10-25 09:22:53'),
(35, 'yash', '9429004847', 'yashparamar124@gmail.com', '$2y$10$YM2TiNHxnv6Bcxhizh/zVeFgRzmHTZFg3OpqaOh6zVhh3N1z0SZVK', 0, 'NG3XfSq9sPRcA9YJFHzn5nwNQqIN0EcApmZiphF931lOIG4m4NnX1JmvvhzE', '2020-10-28 23:45:29', '2020-10-28 23:46:24'),
(36, 'Path Gandhi', '9564758562', 'pathgandhi00@gmail.com', '$2y$10$dpk1krB6I1IGhMqRjZ4lzup0y/I.Z1iBlAt82ZlO7ZrQMEhqueOpa', 0, NULL, '2020-10-29 03:33:19', '2020-10-29 03:33:19');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `areas`
--
ALTER TABLE `areas`
  ADD CONSTRAINT `areas_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `products_attributes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `delivery_addresses`
--
ALTER TABLE `delivery_addresses`
  ADD CONSTRAINT `delivery_addresses_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `delivery_addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
