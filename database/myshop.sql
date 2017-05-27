-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2017 at 09:14 AM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `name`, `email`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'System Administrator', 'sysadmin@gmail.com', '$2y$10$FOLo2SNrmxPC92ReJSG5uOREOGdG7E0d/LJhr7u51fik/hP/MweZ.', '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` text COLLATE utf8_unicode_ci NOT NULL,
  `url_banner` text COLLATE utf8_unicode_ci NOT NULL,
  `pos` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_img`
--

CREATE TABLE `detail_img` (
  `id` int(10) UNSIGNED NOT NULL,
  `images_url` text COLLATE utf8_unicode_ci NOT NULL,
  `pro_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_11_13_131139_create_admin_users_table', 1),
('2016_11_24_011241_create_category_table', 1),
('2016_11_24_014742_create_banners_table', 1),
('2017_04_30_121252_create_product_series_table', 1),
('2017_04_30_121300_create_product_brand_table', 1),
('2017_04_30_121306_create_product_movement_table', 1),
('2017_04_30_121309_create_product_case_table', 1),
('2017_04_30_121312_create_product_dial_table', 1),
('2017_04_30_121332_create_product_band_table', 1),
('2017_04_30_123009_create_product_style_table', 1),
('2017_04_30_124929_create_products_table', 1),
('2017_04_30_130121_create_detail_img_table', 1),
('2017_04_30_130653_create_orders_table', 1),
('2017_04_30_130656_create_orders_detail_table', 1),
('2017_04_30_132745_create_website_metadata_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `c_id` int(10) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(13,2) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders_detail`
--

CREATE TABLE `orders_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `pro_id` int(10) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `o_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `detail` text COLLATE utf8_unicode_ci,
  `images` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `discount` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantity` int(10) UNSIGNED DEFAULT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `series_id` int(10) UNSIGNED NOT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `gender_id` int(10) UNSIGNED NOT NULL,
  `movement_id` int(10) UNSIGNED NOT NULL,
  `case_id` int(10) UNSIGNED NOT NULL,
  `case_size` int(11) DEFAULT NULL,
  `case_shape` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dial_id` int(10) UNSIGNED NOT NULL,
  `dial_color` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `band_id` int(10) UNSIGNED NOT NULL,
  `band_length` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `band_width` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `band_clasp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `feature_water_resstance` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `feature` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `functions` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `style_id` int(10) UNSIGNED NOT NULL,
  `item_variation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `upc_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_band`
--

CREATE TABLE `product_band` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_band`
--

INSERT INTO `product_band` (`id`, `name`, `desc`, `created_at`, `updated_at`) VALUES
(1, '--', '', NULL, NULL),
(2, 'Da', '', NULL, NULL),
(3, 'Nhựa', '', NULL, NULL),
(4, 'Thép không gỉ', '', NULL, NULL),
(5, 'Vải', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_brand`
--

CREATE TABLE `product_brand` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_brand`
--

INSERT INTO `product_brand` (`id`, `name`, `desc`, `created_at`, `updated_at`) VALUES
(1, '--', '', NULL, NULL),
(2, 'Hamilton', '', NULL, NULL),
(3, 'Longines', '', NULL, NULL),
(4, 'Rado', '', NULL, NULL),
(5, 'Bulova', '', NULL, NULL),
(6, 'Citizen', '', NULL, NULL),
(7, 'Movado', '', NULL, NULL),
(8, 'Mido', '', NULL, NULL),
(9, 'Raymond Weil', '', NULL, NULL),
(10, 'Victorinox', '', NULL, NULL),
(11, 'Baume & Mercier', '', NULL, NULL),
(12, 'Tissot', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_case`
--

CREATE TABLE `product_case` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_case`
--

INSERT INTO `product_case` (`id`, `name`, `desc`, `created_at`, `updated_at`) VALUES
(1, '--', '', NULL, NULL),
(2, 'Thép không gỉ', '', NULL, NULL),
(3, 'Nhựa dẻo', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_dial`
--

CREATE TABLE `product_dial` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_dial`
--

INSERT INTO `product_dial` (`id`, `name`, `desc`, `created_at`, `updated_at`) VALUES
(1, '--', '', NULL, NULL),
(2, 'Kính cứng', '', NULL, NULL),
(3, 'Kính Sapphire', '', NULL, NULL),
(4, 'Kính đặc biệt', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_movement`
--

CREATE TABLE `product_movement` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_movement`
--

INSERT INTO `product_movement` (`id`, `name`, `desc`, `created_at`, `updated_at`) VALUES
(1, '--', '', NULL, NULL),
(2, 'Cơ', '', NULL, NULL),
(3, 'Tinh thể thạch anh (quartz)', '', NULL, NULL),
(4, 'Năng lượng mặt trời', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_series`
--

CREATE TABLE `product_series` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_series`
--

INSERT INTO `product_series` (`id`, `name`, `desc`, `created_at`, `updated_at`) VALUES
(1, '--', '', NULL, NULL),
(2, 'Originals', '', NULL, NULL),
(3, 'Hydroconquest', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_style`
--

CREATE TABLE `product_style` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_style`
--

INSERT INTO `product_style` (`id`, `name`, `desc`, `created_at`, `updated_at`) VALUES
(1, '--', '', NULL, NULL),
(2, 'Tự động', '', NULL, NULL),
(3, 'Sang trọng', '', NULL, NULL),
(4, 'Thanh lịch (dress)', '', NULL, NULL),
(5, 'Thể thao', '', NULL, NULL),
(6, 'Đơn giản', '', NULL, NULL),
(7, 'Lặn', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `website_metadata`
--

CREATE TABLE `website_metadata` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_users_email_unique` (`email`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `banners_user_id_foreign` (`user_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_img`
--
ALTER TABLE `detail_img`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_img_pro_id_foreign` (`pro_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_c_id_foreign` (`c_id`);

--
-- Indexes for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_detail_pro_id_foreign` (`pro_id`),
  ADD KEY `orders_detail_o_id_foreign` (`o_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_series_id_foreign` (`series_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`),
  ADD KEY `products_movement_id_foreign` (`movement_id`),
  ADD KEY `products_case_id_foreign` (`case_id`),
  ADD KEY `products_dial_id_foreign` (`dial_id`),
  ADD KEY `products_band_id_foreign` (`band_id`),
  ADD KEY `products_style_id_foreign` (`style_id`);

--
-- Indexes for table `product_band`
--
ALTER TABLE `product_band`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_brand`
--
ALTER TABLE `product_brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_case`
--
ALTER TABLE `product_case`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_dial`
--
ALTER TABLE `product_dial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_movement`
--
ALTER TABLE `product_movement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_series`
--
ALTER TABLE `product_series`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_style`
--
ALTER TABLE `product_style`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `website_metadata`
--
ALTER TABLE `website_metadata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `detail_img`
--
ALTER TABLE `detail_img`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product_band`
--
ALTER TABLE `product_band`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `product_brand`
--
ALTER TABLE `product_brand`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `product_case`
--
ALTER TABLE `product_case`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `product_dial`
--
ALTER TABLE `product_dial`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `product_movement`
--
ALTER TABLE `product_movement`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `product_series`
--
ALTER TABLE `product_series`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `product_style`
--
ALTER TABLE `product_style`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `website_metadata`
--
ALTER TABLE `website_metadata`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `banners`
--
ALTER TABLE `banners`
  ADD CONSTRAINT `banners_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `detail_img`
--
ALTER TABLE `detail_img`
  ADD CONSTRAINT `detail_img_pro_id_foreign` FOREIGN KEY (`pro_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_c_id_foreign` FOREIGN KEY (`c_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD CONSTRAINT `orders_detail_o_id_foreign` FOREIGN KEY (`o_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_detail_pro_id_foreign` FOREIGN KEY (`pro_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_band_id_foreign` FOREIGN KEY (`band_id`) REFERENCES `product_band` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `product_brand` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_case_id_foreign` FOREIGN KEY (`case_id`) REFERENCES `product_case` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_dial_id_foreign` FOREIGN KEY (`dial_id`) REFERENCES `product_dial` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_movement_id_foreign` FOREIGN KEY (`movement_id`) REFERENCES `product_movement` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_series_id_foreign` FOREIGN KEY (`series_id`) REFERENCES `product_series` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_style_id_foreign` FOREIGN KEY (`style_id`) REFERENCES `product_style` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
