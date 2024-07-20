-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 20, 2024 at 04:20 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php3-asm`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` bigint UNSIGNED NOT NULL,
  `cart_id` bigint UNSIGNED NOT NULL,
  `product_variant_id` bigint UNSIGNED NOT NULL,
  `quatity` int UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `catalogues`
--

CREATE TABLE `catalogues` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `catalogues`
--

INSERT INTO `catalogues` (`id`, `name`, `cover`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Ghế sofa', 'catalogues/5uB9kgmuZ6pSNN67VU5JIKwZBFWyGYHXRUn0Mxqe.jpg', 1, '2024-07-19 03:06:02', '2024-07-19 03:06:02'),
(2, 'Ghế thư giãn', 'catalogues/ew582SLdC19QwefliOe3917uUHPQ8tyHu2ZRpgoe.jpg', 1, '2024-07-19 03:10:14', '2024-07-19 03:10:14'),
(3, 'Bàn nước', 'catalogues/ILc82NlH8DFzF3iusBvLlTMMjDA4ar4DdcXGnu4i.jpg', 1, '2024-07-19 03:13:05', '2024-07-19 03:13:05'),
(4, 'Bàn bên', 'catalogues/mXv9G1YfWnbPdbGW4XkpQOGSm8s8OGP6x2vLtxP3.jpg', 1, '2024-07-19 03:14:15', '2024-07-19 03:14:15'),
(5, 'Tủ tivi', 'catalogues/l7CrgQLkEgEptHCfpzZMOLh8ZPSdRbzUOMlIfd9I.jpg', 1, '2024-07-19 03:15:18', '2024-07-19 03:15:18');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_07_19_071521_create_catalogues_table', 1),
(6, '2024_07_19_080937_create_products_table', 1),
(7, '2024_07_19_081332_create_product_galleries_table', 1),
(8, '2024_07_19_081402_create_product_sizes_table', 1),
(9, '2024_07_19_081420_create_product_colors_table', 1),
(10, '2024_07_19_081459_create_product_variants_table', 1),
(11, '2024_07_19_095115_create_tags_table', 2),
(12, '2024_07_19_095421_create_product_tag_table', 2),
(13, '2024_07_20_073425_create_carts_table', 3),
(14, '2024_07_20_073455_create_cart_items_table', 3),
(15, '2024_07_20_073512_create_orders_table', 3),
(16, '2024_07_20_073522_create_order_items_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_ship_user_same_user` tinyint(1) NOT NULL DEFAULT '1',
  `ship_user_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_user_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_user_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_user_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_user_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_order` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `status_payment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unpaid',
  `total_price` double(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `product_variant_id` bigint UNSIGNED NOT NULL,
  `quatity` int UNSIGNED NOT NULL DEFAULT '0',
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_img_thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_price_regular` double NOT NULL,
  `product_price_sale` double DEFAULT NULL,
  `variant_size_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `variant_color_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `catalogue_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_regular` double NOT NULL,
  `price_sale` double DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `material` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Chất liệu',
  `user_manual` text COLLATE utf8mb4_unicode_ci COMMENT 'Hướng dẫn sử dụng',
  `views` bigint UNSIGNED NOT NULL DEFAULT '0' COMMENT 'luot xem',
  `wish` bigint UNSIGNED NOT NULL DEFAULT '0' COMMENT 'luot yeu thich',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_hot_deal` tinyint(1) NOT NULL DEFAULT '0',
  `is_good_deal` tinyint(1) NOT NULL DEFAULT '0',
  `is_new` tinyint(1) NOT NULL DEFAULT '0',
  `is_show_home` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `catalogue_id`, `name`, `slug`, `sku`, `img_thumbnail`, `price_regular`, `price_sale`, `description`, `content`, `material`, `user_manual`, `views`, `wish`, `is_active`, `is_hot_deal`, `is_good_deal`, `is_new`, `is_show_home`, `created_at`, `updated_at`) VALUES
(1, 2, 'Modi et dolor quo nesciunt. Molestiae aut dolor ab recusandae enim dicta pariatur.', 'modi-et-dolor-quo-nesciunt-molestiae-aut-dolor-ab-recusandae-enim-dicta-pariatur-O2owQuGA', 'uBQvjRUm0', 'https://noithatlacgia.vn/wp-content/uploads/2022/03/slide-noithatlacgia-7.jpg', 600000, 499000, NULL, NULL, NULL, NULL, 0, 0, 1, 0, 0, 0, 0, '2024-07-19 04:02:41', '2024-07-19 04:02:41'),
(2, 5, 'Hic facere consequatur ipsa alias est mollitia non quidem. Nesciunt dolore sed sit praesentium.', 'hic-facere-consequatur-ipsa-alias-est-mollitia-non-quidem-nesciunt-dolore-sed-sit-praesentium-xB7Lrsc3', 'nB2EINlz1', 'https://noithatlacgia.vn/wp-content/uploads/2022/03/slide-noithatlacgia-7.jpg', 600000, 499000, NULL, NULL, NULL, NULL, 0, 0, 1, 0, 0, 0, 0, '2024-07-19 04:02:41', '2024-07-19 04:02:41'),
(3, 3, 'Cum est et est rem. Consectetur aliquid omnis odio.', 'cum-est-et-est-rem-consectetur-aliquid-omnis-odio-KZfrS71v', 'uJPe83To2', 'https://noithatlacgia.vn/wp-content/uploads/2022/03/slide-noithatlacgia-7.jpg', 600000, 499000, NULL, NULL, NULL, NULL, 0, 0, 1, 0, 0, 0, 0, '2024-07-19 04:02:41', '2024-07-19 04:02:41'),
(4, 5, 'Aut in molestiae officia accusamus. Nihil est ipsa aut. Quis doloribus ullam quidem quo.', 'aut-in-molestiae-officia-accusamus-nihil-est-ipsa-aut-quis-doloribus-ullam-quidem-quo-mDiEcpQY', 'U3bmKSQ13', 'https://noithatlacgia.vn/wp-content/uploads/2022/03/slide-noithatlacgia-7.jpg', 600000, 499000, NULL, NULL, NULL, NULL, 0, 0, 1, 0, 0, 0, 0, '2024-07-19 04:02:41', '2024-07-19 04:02:41'),
(5, 3, 'Et eos dolorem mollitia mollitia. Est tenetur voluptatem aperiam libero. In maiores enim in est.', 'et-eos-dolorem-mollitia-mollitia-est-tenetur-voluptatem-aperiam-libero-in-maiores-enim-in-est-iK64unSX', 'magrmGOo4', 'https://noithatlacgia.vn/wp-content/uploads/2022/03/slide-noithatlacgia-7.jpg', 600000, 499000, NULL, NULL, NULL, NULL, 0, 0, 1, 0, 0, 0, 0, '2024-07-19 04:02:41', '2024-07-19 04:02:41'),
(6, 5, 'Unde cumque neque facere sint. Non id maiores officia. Sit repellendus illum veniam at.', 'unde-cumque-neque-facere-sint-non-id-maiores-officia-sit-repellendus-illum-veniam-at-FgVMcVoy', 'LKQ3Tn465', 'https://noithatlacgia.vn/wp-content/uploads/2022/03/slide-noithatlacgia-7.jpg', 600000, 499000, NULL, NULL, NULL, NULL, 0, 0, 1, 0, 0, 0, 0, '2024-07-19 04:02:41', '2024-07-19 04:02:41'),
(7, 5, 'Et at ullam officia qui enim. Ipsum est placeat minus nam sit. Repudiandae dolor vel ut.', 'et-at-ullam-officia-qui-enim-ipsum-est-placeat-minus-nam-sit-repudiandae-dolor-vel-ut-8sJEjV1z', 'OWPYV7hu6', 'https://noithatlacgia.vn/wp-content/uploads/2022/03/slide-noithatlacgia-7.jpg', 600000, 499000, NULL, NULL, NULL, NULL, 0, 0, 1, 0, 0, 0, 0, '2024-07-19 04:02:41', '2024-07-19 04:02:41'),
(8, 4, 'Sit cumque delectus debitis. Quasi qui dolorem aliquid. Pariatur inventore voluptatem quod magni.', 'sit-cumque-delectus-debitis-quasi-qui-dolorem-aliquid-pariatur-inventore-voluptatem-quod-magni-P7P49Ytc', 'PrUMyRNO7', 'https://noithatlacgia.vn/wp-content/uploads/2022/03/slide-noithatlacgia-7.jpg', 600000, 499000, NULL, NULL, NULL, NULL, 0, 0, 1, 0, 0, 0, 0, '2024-07-19 04:02:41', '2024-07-19 04:02:41'),
(9, 3, 'Et dolor odio ut corporis autem. Odio alias qui doloremque et aut numquam est.', 'et-dolor-odio-ut-corporis-autem-odio-alias-qui-doloremque-et-aut-numquam-est-I3Z0DsvS', 'wGNIrQ9U8', 'https://noithatlacgia.vn/wp-content/uploads/2022/03/slide-noithatlacgia-7.jpg', 600000, 499000, NULL, NULL, NULL, NULL, 0, 0, 1, 0, 0, 0, 0, '2024-07-19 04:02:41', '2024-07-19 04:02:41'),
(10, 4, 'Voluptas cupiditate eveniet aut inventore. Molestiae cumque harum quam repudiandae quasi rerum.', 'voluptas-cupiditate-eveniet-aut-inventore-molestiae-cumque-harum-quam-repudiandae-quasi-rerum-ptUj1AgS', 'aoILw8bw9', 'https://noithatlacgia.vn/wp-content/uploads/2022/03/slide-noithatlacgia-7.jpg', 600000, 499000, NULL, NULL, NULL, NULL, 0, 0, 1, 0, 0, 0, 0, '2024-07-19 04:02:41', '2024-07-19 04:02:41'),
(11, 1, 'sofa ngan', 'sofa-ngan-1YRRURXJ', '1YRRURXJ', 'products/dP5JLYp0qYoFNrEfILKS0c4nFCwNKbFtLk4fcBRt.jpg', 2000000, 1500000, 'sofa', '<p>ahihi</p>', 'da', NULL, 0, 0, 1, 1, 0, 0, 0, '2024-07-20 01:13:25', '2024-07-20 01:13:25'),
(12, 1, 'Chair Pillow', 'chair-pillow-N4FS6IQE', 'N4FS6IQE', 'products/tXGXBjGUmsQYybwiz0kvaFtikTO41t5H2fk7IICt.png', 500000, 0, NULL, '<p><em><strong>ahihii</strong></em></p>', NULL, NULL, 0, 0, 1, 1, 0, 0, 0, '2024-07-20 03:52:51', '2024-07-20 03:52:51'),
(13, 1, 'Stylish Grey Chair', 'stylish-grey-chair-G4DTEWWT', 'G4DTEWWT', 'products/O7RTv4CdsMsktPg4bZ9kyBYfwOjxcK6OJwHn7R9r.png', 400000, 0, NULL, '<p>ahihi</p>', NULL, NULL, 0, 0, 1, 0, 0, 0, 0, '2024-07-20 03:53:52', '2024-07-20 03:53:52'),
(14, 1, 'Seater Gray Sofa', 'seater-gray-sofa-PF0LL0UB', 'PF0LL0UB', 'products/tARDQtPzzJPRP0FL6YN0FAHg7UcBLCGQQF7Mj0lh.png', 300000, 0, NULL, '<p>ahiihihi</p>', NULL, NULL, 0, 0, 1, 0, 0, 0, 0, '2024-07-20 03:54:59', '2024-07-20 03:54:59'),
(15, 1, 'Wooden Chair', 'wooden-chair-FOI0WNTG', 'FOI0WNTG', 'products/S9JEgekf42VvZC6Bbj6AhHLazzGNjTXrwoZqCZM7.png', 0, 0, NULL, '<p>ahiihihi</p>', NULL, NULL, 0, 0, 1, 0, 0, 0, 0, '2024-07-20 03:55:38', '2024-07-20 03:55:38');

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

CREATE TABLE `product_colors` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_colors`
--

INSERT INTO `product_colors` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '#000000', '2024-07-19 04:02:41', '2024-07-19 04:02:41'),
(2, '#FFFFFF', '2024-07-19 04:02:41', '2024-07-19 04:02:41'),
(3, '#FF0000', '2024-07-19 04:02:41', '2024-07-19 04:02:41'),
(4, '#00FFFF', '2024-07-19 04:02:41', '2024-07-19 04:02:41');

-- --------------------------------------------------------

--
-- Table structure for table `product_galleries`
--

CREATE TABLE `product_galleries` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_galleries`
--

INSERT INTO `product_galleries` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'https://noithatlacgia.vn/wp-content/uploads/2022/03/slide-noithatlacgia-7.jpg', NULL, NULL),
(2, 1, 'https://noithatlacgia.vn/wp-content/uploads/2022/03/slide-noithatlacgia-7.jpg', NULL, NULL),
(3, 2, 'https://noithatlacgia.vn/wp-content/uploads/2022/03/slide-noithatlacgia-7.jpg', NULL, NULL),
(4, 2, 'https://noithatlacgia.vn/wp-content/uploads/2022/03/slide-noithatlacgia-7.jpg', NULL, NULL),
(5, 3, 'https://noithatlacgia.vn/wp-content/uploads/2022/03/slide-noithatlacgia-7.jpg', NULL, NULL),
(6, 3, 'https://noithatlacgia.vn/wp-content/uploads/2022/03/slide-noithatlacgia-7.jpg', NULL, NULL),
(7, 4, 'https://noithatlacgia.vn/wp-content/uploads/2022/03/slide-noithatlacgia-7.jpg', NULL, NULL),
(8, 4, 'https://noithatlacgia.vn/wp-content/uploads/2022/03/slide-noithatlacgia-7.jpg', NULL, NULL),
(9, 5, 'https://noithatlacgia.vn/wp-content/uploads/2022/03/slide-noithatlacgia-7.jpg', NULL, NULL),
(10, 5, 'https://noithatlacgia.vn/wp-content/uploads/2022/03/slide-noithatlacgia-7.jpg', NULL, NULL),
(11, 6, 'https://noithatlacgia.vn/wp-content/uploads/2022/03/slide-noithatlacgia-7.jpg', NULL, NULL),
(12, 6, 'https://noithatlacgia.vn/wp-content/uploads/2022/03/slide-noithatlacgia-7.jpg', NULL, NULL),
(13, 7, 'https://noithatlacgia.vn/wp-content/uploads/2022/03/slide-noithatlacgia-7.jpg', NULL, NULL),
(14, 7, 'https://noithatlacgia.vn/wp-content/uploads/2022/03/slide-noithatlacgia-7.jpg', NULL, NULL),
(15, 8, 'https://noithatlacgia.vn/wp-content/uploads/2022/03/slide-noithatlacgia-7.jpg', NULL, NULL),
(16, 8, 'https://noithatlacgia.vn/wp-content/uploads/2022/03/slide-noithatlacgia-7.jpg', NULL, NULL),
(17, 9, 'https://noithatlacgia.vn/wp-content/uploads/2022/03/slide-noithatlacgia-7.jpg', NULL, NULL),
(18, 9, 'https://noithatlacgia.vn/wp-content/uploads/2022/03/slide-noithatlacgia-7.jpg', NULL, NULL),
(19, 10, 'https://noithatlacgia.vn/wp-content/uploads/2022/03/slide-noithatlacgia-7.jpg', NULL, NULL),
(20, 10, 'https://noithatlacgia.vn/wp-content/uploads/2022/03/slide-noithatlacgia-7.jpg', NULL, NULL),
(21, 11, 'product_galleries/6b3wHdqK3vQTYnWZYcnRurWKcmZ44eJrCZlyWF9Z.jpg', '2024-07-20 01:13:25', '2024-07-20 01:13:25'),
(22, 11, 'product_galleries/Bx1RnjX1IvXoupz1tQz1ABisua9GKWojqT7YBh5A.jpg', '2024-07-20 01:13:25', '2024-07-20 01:13:25'),
(23, 12, 'product_galleries/2KtcMp35hieX9ZjIoFwg0Ed7BAvq1crFRWQ35rq3.jpg', '2024-07-20 03:52:51', '2024-07-20 03:52:51'),
(24, 13, 'product_galleries/hrZ5QsJKWEvqKQ8hOqdhvTHFTLTVAi40RaDw2DFK.jpg', '2024-07-20 03:53:52', '2024-07-20 03:53:52'),
(25, 14, 'product_galleries/dPnPcb5P3Q9H3AYKkswPlW8x2X7hq0xpmdL89Xzt.jpg', '2024-07-20 03:54:59', '2024-07-20 03:54:59'),
(26, 15, 'product_galleries/gYw66v1xTcGCZfqGsVDb3RC7itAMMySpIeRfrMBL.jpg', '2024-07-20 03:55:38', '2024-07-20 03:55:38');

-- --------------------------------------------------------

--
-- Table structure for table `product_sizes`
--

CREATE TABLE `product_sizes` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sizes`
--

INSERT INTO `product_sizes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'S', '2024-07-19 04:02:41', '2024-07-19 04:02:41'),
(2, 'M', '2024-07-19 04:02:41', '2024-07-19 04:02:41'),
(3, 'L', '2024-07-19 04:02:41', '2024-07-19 04:02:41');

-- --------------------------------------------------------

--
-- Table structure for table `product_tag`
--

CREATE TABLE `product_tag` (
  `product_id` bigint UNSIGNED NOT NULL,
  `tag_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_tag`
--

INSERT INTO `product_tag` (`product_id`, `tag_id`) VALUES
(10, 1),
(13, 2),
(15, 2),
(7, 3),
(9, 3),
(1, 4),
(2, 4),
(11, 4),
(4, 5),
(6, 5),
(8, 6),
(5, 7),
(13, 7),
(14, 7),
(3, 8),
(12, 8),
(6, 9),
(1, 11),
(8, 11),
(11, 11),
(3, 12),
(9, 12),
(10, 12),
(5, 13),
(11, 13),
(4, 14),
(7, 14),
(2, 15);

-- --------------------------------------------------------

--
-- Table structure for table `product_variants`
--

CREATE TABLE `product_variants` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `product_size_id` bigint UNSIGNED NOT NULL,
  `product_color_id` bigint UNSIGNED NOT NULL,
  `quatity` int UNSIGNED NOT NULL DEFAULT '0',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_variants`
--

INSERT INTO `product_variants` (`id`, `product_id`, `product_size_id`, `product_color_id`, `quatity`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(2, 1, 1, 2, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(3, 1, 1, 3, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(4, 1, 1, 4, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(5, 1, 2, 1, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(6, 1, 2, 2, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(7, 1, 2, 3, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(8, 1, 2, 4, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(9, 1, 3, 1, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(10, 1, 3, 2, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(11, 1, 3, 3, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(12, 1, 3, 4, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(13, 2, 1, 1, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(14, 2, 1, 2, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(15, 2, 1, 3, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(16, 2, 1, 4, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(17, 2, 2, 1, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(18, 2, 2, 2, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(19, 2, 2, 3, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(20, 2, 2, 4, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(21, 2, 3, 1, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(22, 2, 3, 2, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(23, 2, 3, 3, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(24, 2, 3, 4, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(25, 3, 1, 1, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(26, 3, 1, 2, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(27, 3, 1, 3, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(28, 3, 1, 4, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(29, 3, 2, 1, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(30, 3, 2, 2, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(31, 3, 2, 3, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(32, 3, 2, 4, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(33, 3, 3, 1, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(34, 3, 3, 2, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(35, 3, 3, 3, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(36, 3, 3, 4, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(37, 4, 1, 1, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(38, 4, 1, 2, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(39, 4, 1, 3, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(40, 4, 1, 4, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(41, 4, 2, 1, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(42, 4, 2, 2, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(43, 4, 2, 3, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(44, 4, 2, 4, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(45, 4, 3, 1, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(46, 4, 3, 2, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(47, 4, 3, 3, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(48, 4, 3, 4, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(49, 5, 1, 1, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(50, 5, 1, 2, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(51, 5, 1, 3, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(52, 5, 1, 4, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(53, 5, 2, 1, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(54, 5, 2, 2, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(55, 5, 2, 3, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(56, 5, 2, 4, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(57, 5, 3, 1, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(58, 5, 3, 2, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(59, 5, 3, 3, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(60, 5, 3, 4, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(61, 6, 1, 1, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(62, 6, 1, 2, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(63, 6, 1, 3, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(64, 6, 1, 4, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(65, 6, 2, 1, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(66, 6, 2, 2, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(67, 6, 2, 3, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(68, 6, 2, 4, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(69, 6, 3, 1, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(70, 6, 3, 2, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(71, 6, 3, 3, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(72, 6, 3, 4, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(73, 7, 1, 1, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(74, 7, 1, 2, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(75, 7, 1, 3, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(76, 7, 1, 4, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(77, 7, 2, 1, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(78, 7, 2, 2, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(79, 7, 2, 3, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(80, 7, 2, 4, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(81, 7, 3, 1, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(82, 7, 3, 2, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(83, 7, 3, 3, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(84, 7, 3, 4, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(85, 8, 1, 1, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(86, 8, 1, 2, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(87, 8, 1, 3, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(88, 8, 1, 4, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(89, 8, 2, 1, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(90, 8, 2, 2, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(91, 8, 2, 3, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(92, 8, 2, 4, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(93, 8, 3, 1, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(94, 8, 3, 2, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(95, 8, 3, 3, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(96, 8, 3, 4, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(97, 9, 1, 1, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(98, 9, 1, 2, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(99, 9, 1, 3, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(100, 9, 1, 4, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(101, 9, 2, 1, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(102, 9, 2, 2, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(103, 9, 2, 3, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(104, 9, 2, 4, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(105, 9, 3, 1, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(106, 9, 3, 2, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(107, 9, 3, 3, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(108, 9, 3, 4, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(109, 10, 1, 1, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(110, 10, 1, 2, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(111, 10, 1, 3, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(112, 10, 1, 4, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(113, 10, 2, 1, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(114, 10, 2, 2, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(115, 10, 2, 3, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(116, 10, 2, 4, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(117, 10, 3, 1, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(118, 10, 3, 2, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(119, 10, 3, 3, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(120, 10, 3, 4, 100, 'https://canifa.com/img/1000/1500/resize/6/o/6ot24s002-sb001-l-1-u.webp', NULL, NULL),
(121, 11, 1, 1, 0, NULL, '2024-07-20 01:13:25', '2024-07-20 01:13:25'),
(122, 11, 1, 2, 0, NULL, '2024-07-20 01:13:25', '2024-07-20 01:13:25'),
(123, 11, 1, 3, 10, 'product_variants/HzwO8x6LqD7kg03DXwGxLQiqRK5JEMNzZmrK53II.png', '2024-07-20 01:13:25', '2024-07-20 01:13:25'),
(124, 11, 1, 4, 10, 'product_variants/yLKIpGJtOgyot6MJhw37pyjTquBoyWHqmyLL1Mcx.jpg', '2024-07-20 01:13:25', '2024-07-20 01:13:25'),
(125, 11, 2, 1, 0, NULL, '2024-07-20 01:13:25', '2024-07-20 01:13:25'),
(126, 11, 2, 2, 0, NULL, '2024-07-20 01:13:25', '2024-07-20 01:13:25'),
(127, 11, 2, 3, 10, 'product_variants/ovfntLXTo80fBcqi2aQwCRpIHYwO6aqSAuyiYEJG.jpg', '2024-07-20 01:13:25', '2024-07-20 01:13:25'),
(128, 11, 2, 4, 10, 'product_variants/uUFfNtW5Egjxmb6SSx32unDkVZwwymaRNHIYyWZF.jpg', '2024-07-20 01:13:25', '2024-07-20 01:13:25'),
(129, 11, 3, 1, 0, NULL, '2024-07-20 01:13:25', '2024-07-20 01:13:25'),
(130, 11, 3, 2, 0, NULL, '2024-07-20 01:13:25', '2024-07-20 01:13:25'),
(131, 11, 3, 3, 0, NULL, '2024-07-20 01:13:25', '2024-07-20 01:13:25'),
(132, 11, 3, 4, 0, NULL, '2024-07-20 01:13:25', '2024-07-20 01:13:25'),
(133, 12, 1, 1, 0, NULL, '2024-07-20 03:52:51', '2024-07-20 03:52:51'),
(134, 12, 1, 2, 0, NULL, '2024-07-20 03:52:51', '2024-07-20 03:52:51'),
(135, 12, 1, 3, 0, NULL, '2024-07-20 03:52:51', '2024-07-20 03:52:51'),
(136, 12, 1, 4, 0, NULL, '2024-07-20 03:52:51', '2024-07-20 03:52:51'),
(137, 12, 2, 1, 0, NULL, '2024-07-20 03:52:51', '2024-07-20 03:52:51'),
(138, 12, 2, 2, 0, NULL, '2024-07-20 03:52:51', '2024-07-20 03:52:51'),
(139, 12, 2, 3, 0, NULL, '2024-07-20 03:52:51', '2024-07-20 03:52:51'),
(140, 12, 2, 4, 0, NULL, '2024-07-20 03:52:51', '2024-07-20 03:52:51'),
(141, 12, 3, 1, 0, NULL, '2024-07-20 03:52:51', '2024-07-20 03:52:51'),
(142, 12, 3, 2, 0, NULL, '2024-07-20 03:52:51', '2024-07-20 03:52:51'),
(143, 12, 3, 3, 0, NULL, '2024-07-20 03:52:51', '2024-07-20 03:52:51'),
(144, 12, 3, 4, 0, NULL, '2024-07-20 03:52:51', '2024-07-20 03:52:51'),
(145, 13, 1, 1, 0, NULL, '2024-07-20 03:53:52', '2024-07-20 03:53:52'),
(146, 13, 1, 2, 0, NULL, '2024-07-20 03:53:52', '2024-07-20 03:53:52'),
(147, 13, 1, 3, 0, NULL, '2024-07-20 03:53:52', '2024-07-20 03:53:52'),
(148, 13, 1, 4, 0, NULL, '2024-07-20 03:53:52', '2024-07-20 03:53:52'),
(149, 13, 2, 1, 0, NULL, '2024-07-20 03:53:52', '2024-07-20 03:53:52'),
(150, 13, 2, 2, 0, NULL, '2024-07-20 03:53:52', '2024-07-20 03:53:52'),
(151, 13, 2, 3, 0, NULL, '2024-07-20 03:53:52', '2024-07-20 03:53:52'),
(152, 13, 2, 4, 0, NULL, '2024-07-20 03:53:52', '2024-07-20 03:53:52'),
(153, 13, 3, 1, 0, NULL, '2024-07-20 03:53:52', '2024-07-20 03:53:52'),
(154, 13, 3, 2, 0, NULL, '2024-07-20 03:53:52', '2024-07-20 03:53:52'),
(155, 13, 3, 3, 0, NULL, '2024-07-20 03:53:52', '2024-07-20 03:53:52'),
(156, 13, 3, 4, 0, NULL, '2024-07-20 03:53:52', '2024-07-20 03:53:52'),
(157, 14, 1, 1, 0, NULL, '2024-07-20 03:54:59', '2024-07-20 03:54:59'),
(158, 14, 1, 2, 0, NULL, '2024-07-20 03:54:59', '2024-07-20 03:54:59'),
(159, 14, 1, 3, 0, NULL, '2024-07-20 03:54:59', '2024-07-20 03:54:59'),
(160, 14, 1, 4, 0, NULL, '2024-07-20 03:54:59', '2024-07-20 03:54:59'),
(161, 14, 2, 1, 0, NULL, '2024-07-20 03:54:59', '2024-07-20 03:54:59'),
(162, 14, 2, 2, 0, NULL, '2024-07-20 03:54:59', '2024-07-20 03:54:59'),
(163, 14, 2, 3, 0, NULL, '2024-07-20 03:54:59', '2024-07-20 03:54:59'),
(164, 14, 2, 4, 0, NULL, '2024-07-20 03:54:59', '2024-07-20 03:54:59'),
(165, 14, 3, 1, 0, NULL, '2024-07-20 03:54:59', '2024-07-20 03:54:59'),
(166, 14, 3, 2, 0, NULL, '2024-07-20 03:54:59', '2024-07-20 03:54:59'),
(167, 14, 3, 3, 0, NULL, '2024-07-20 03:54:59', '2024-07-20 03:54:59'),
(168, 14, 3, 4, 0, NULL, '2024-07-20 03:54:59', '2024-07-20 03:54:59'),
(169, 15, 1, 1, 0, NULL, '2024-07-20 03:55:38', '2024-07-20 03:55:38'),
(170, 15, 1, 2, 0, NULL, '2024-07-20 03:55:38', '2024-07-20 03:55:38'),
(171, 15, 1, 3, 0, NULL, '2024-07-20 03:55:38', '2024-07-20 03:55:38'),
(172, 15, 1, 4, 0, NULL, '2024-07-20 03:55:38', '2024-07-20 03:55:38'),
(173, 15, 2, 1, 0, NULL, '2024-07-20 03:55:38', '2024-07-20 03:55:38'),
(174, 15, 2, 2, 0, NULL, '2024-07-20 03:55:38', '2024-07-20 03:55:38'),
(175, 15, 2, 3, 0, NULL, '2024-07-20 03:55:38', '2024-07-20 03:55:38'),
(176, 15, 2, 4, 0, NULL, '2024-07-20 03:55:38', '2024-07-20 03:55:38'),
(177, 15, 3, 1, 0, NULL, '2024-07-20 03:55:38', '2024-07-20 03:55:38'),
(178, 15, 3, 2, 0, NULL, '2024-07-20 03:55:38', '2024-07-20 03:55:38'),
(179, 15, 3, 3, 0, NULL, '2024-07-20 03:55:38', '2024-07-20 03:55:38'),
(180, 15, 3, 4, 0, NULL, '2024-07-20 03:55:38', '2024-07-20 03:55:38');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Exercitationem.', '2024-07-19 04:02:41', '2024-07-19 04:02:41'),
(2, 'Aut maiores.', '2024-07-19 04:02:41', '2024-07-19 04:02:41'),
(3, 'Minus ipsum.', '2024-07-19 04:02:41', '2024-07-19 04:02:41'),
(4, 'Unde et iure.', '2024-07-19 04:02:41', '2024-07-19 04:02:41'),
(5, 'Itaque.', '2024-07-19 04:02:41', '2024-07-19 04:02:41'),
(6, 'Eligendi iste.', '2024-07-19 04:02:41', '2024-07-19 04:02:41'),
(7, 'Cumque non.', '2024-07-19 04:02:41', '2024-07-19 04:02:41'),
(8, 'Atque corporis.', '2024-07-19 04:02:41', '2024-07-19 04:02:41'),
(9, 'Ullam.', '2024-07-19 04:02:41', '2024-07-19 04:02:41'),
(10, 'Quia sunt.', '2024-07-19 04:02:41', '2024-07-19 04:02:41'),
(11, 'Vero nam rerum.', '2024-07-19 04:02:41', '2024-07-19 04:02:41'),
(12, 'Dolorem.', '2024-07-19 04:02:41', '2024-07-19 04:02:41'),
(13, 'Vel illum non.', '2024-07-19 04:02:41', '2024-07-19 04:02:41'),
(14, 'Deserunt iusto.', '2024-07-19 04:02:41', '2024-07-19 04:02:41'),
(15, 'Porro labore.', '2024-07-19 04:02:41', '2024-07-19 04:02:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_items_cart_id_foreign` (`cart_id`),
  ADD KEY `cart_items_product_variant_id_foreign` (`product_variant_id`);

--
-- Indexes for table `catalogues`
--
ALTER TABLE `catalogues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_variant_id_foreign` (`product_variant_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD UNIQUE KEY `products_sku_unique` (`sku`),
  ADD KEY `products_catalogue_id_foreign` (`catalogue_id`);

--
-- Indexes for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_galleries`
--
ALTER TABLE `product_galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_galleries_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_tag`
--
ALTER TABLE `product_tag`
  ADD PRIMARY KEY (`product_id`,`tag_id`),
  ADD KEY `product_tag_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_variants_unique` (`product_id`,`product_size_id`,`product_color_id`),
  ADD KEY `product_variants_product_size_id_foreign` (`product_size_id`),
  ADD KEY `product_variants_product_color_id_foreign` (`product_color_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_name_unique` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `catalogues`
--
ALTER TABLE `catalogues`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_galleries`
--
ALTER TABLE `product_galleries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `product_sizes`
--
ALTER TABLE `product_sizes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`),
  ADD CONSTRAINT `cart_items_product_variant_id_foreign` FOREIGN KEY (`product_variant_id`) REFERENCES `product_variants` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_product_variant_id_foreign` FOREIGN KEY (`product_variant_id`) REFERENCES `product_variants` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_catalogue_id_foreign` FOREIGN KEY (`catalogue_id`) REFERENCES `catalogues` (`id`);

--
-- Constraints for table `product_galleries`
--
ALTER TABLE `product_galleries`
  ADD CONSTRAINT `product_galleries_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `product_tag`
--
ALTER TABLE `product_tag`
  ADD CONSTRAINT `product_tag_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `product_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);

--
-- Constraints for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD CONSTRAINT `product_variants_product_color_id_foreign` FOREIGN KEY (`product_color_id`) REFERENCES `product_colors` (`id`),
  ADD CONSTRAINT `product_variants_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `product_variants_product_size_id_foreign` FOREIGN KEY (`product_size_id`) REFERENCES `product_sizes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
