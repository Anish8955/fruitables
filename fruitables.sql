-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2024 at 07:34 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fruitables`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `rate` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`id`, `user_id`, `quantity`, `rate`, `created_at`, `updated_at`, `product_id`) VALUES
(23, 6, 1, '100.00', '2024-01-10 01:42:22', '2024-01-10 01:42:22', 16),
(35, 2, 1, '150.00', '2024-01-11 03:54:20', '2024-01-11 03:54:20', 22),
(36, 2, 1, '200.00', '2024-01-11 03:54:29', '2024-01-11 03:54:29', 23),
(37, 2, 1, '150.00', '2024-01-11 03:54:37', '2024-01-11 03:54:37', 24);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `created_at`, `updated_at`) VALUES
(1, 'anish khan', 'anishkhanpro2@gmail.com', 'sammi khan', '2024-01-07 04:51:44', '2024-01-07 04:51:44'),
(2, 'anish khan', 'anishkhanpro2@gmail.com', 'anishkhan', '2024-01-07 04:59:26', '2024-01-07 04:59:26'),
(3, 'anish khan', 'anishkhanpro2@gmail.com', 'anishkhan', '2024-01-07 05:01:15', '2024-01-07 05:01:15'),
(4, 'anish khan', 'anishkhanpro2@gmail.com', 'anishkhan', '2024-01-07 05:03:53', '2024-01-07 05:03:53'),
(5, 'anish khan', 'anishkhanpro2@gmail.com', 'jiuniuni', '2024-01-07 05:11:22', '2024-01-07 05:11:22'),
(6, 'anish khan', 'anishkhanpro2@gmail.com', 'jiuniuni', '2024-01-07 05:18:24', '2024-01-07 05:18:24'),
(7, 'anish khan', 'anishkhanpro2@gmail.com', 'hello my name is anish and i am a professional web developer', '2024-01-07 05:19:09', '2024-01-07 05:19:09'),
(8, 'anish khan', 'anishkhanpro2@gmail.com', 'hello mister', '2024-01-07 05:23:38', '2024-01-07 05:23:38'),
(9, 'tanveer khan', 'tanveerkhanpro2@gmail.com', 'caicolaw', '2024-01-07 08:00:54', '2024-01-07 08:00:54');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login_registers`
--

CREATE TABLE `login_registers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `main_controllers`
--

CREATE TABLE `main_controllers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_12_21_074928_create_my_models_table', 1),
(6, '2023_12_21_075141_create_main_controllers_table', 1),
(7, '2023_12_22_070459_create_login_registers_table', 2),
(8, '2024_01_01_153648_create_cart_items_table', 2),
(9, '2024_01_01_161410_create_product_table', 3),
(10, '2024_01_04_101827_add_user_type_to_users', 4),
(11, '2024_01_06_063257_create_products_table', 5),
(12, '2024_01_07_093808_create_contacts_table', 6),
(13, '2024_01_07_153935_add_photo_to_products_table', 7),
(14, '2024_01_08_062310_add_description_to_products_table', 8),
(15, '2024_01_09_095223_update_cart_items_table', 9),
(17, '2024_01_10_082406_add_name_and_photo_to_cart_items_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `my_models`
--

CREATE TABLE `my_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('vegetable','fruit') COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight_type` enum('1 kg','0.5 kg') COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` tinyint(3) UNSIGNED DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `type`, `weight_type`, `rating`, `price`, `created_at`, `updated_at`, `photo`, `description`) VALUES
(16, 'Orange', 'fruit', '1 kg', 4, '100.00', '2024-01-08 10:39:35', '2024-01-08 10:39:35', '1704730175_best-product-1.jpg', 'Our Orange Is Taste Like a Heaven'),
(17, 'Banana', 'fruit', '1 kg', 5, '40.00', '2024-01-08 11:10:47', '2024-01-08 11:10:47', '1704732047_best-product-3.jpg', 'Our Banana Is Long, Strong,Soft'),
(18, 'Apple', 'fruit', '1 kg', 5, '100.00', '2024-01-08 11:12:44', '2024-01-08 11:12:44', '1704732164_best-product-6.jpg', 'Or Apple Is Direct From Gulmarg Kashmir'),
(19, 'Tomato', 'vegetable', '1 kg', 4, '30.00', '2024-01-08 12:20:03', '2024-01-08 12:20:03', '1704736203_vegetable-item-1.jpg', 'Red tomato from jaipur.'),
(20, 'Grapes', 'fruit', '1 kg', 4, '60.00', '2024-01-08 12:30:22', '2024-01-08 12:30:22', '1704736822_best-product-5.jpg', 'Green grapes with very tasty spirt'),
(21, 'Potato', 'vegetable', '1 kg', 5, '20.00', '2024-01-08 12:52:28', '2024-01-08 12:52:28', '1704738148_vegetable-item-5.jpg', 'Our Potato Is Directly From America And It is Fresh .'),
(22, 'Strawberry', 'fruit', '1 kg', 2, '150.00', '2024-01-09 00:22:24', '2024-01-09 00:22:24', '1704779544_featur-2.jpg', 'Strawberry is orange and straight from karnataka.'),
(23, 'Barcolli', 'vegetable', '1 kg', 4, '200.00', '2024-01-09 00:58:33', '2024-01-09 00:58:33', '1704781713_vegetable-item-2.jpg', 'Our Barcolli Is Very Healthy and for fitness freek.'),
(24, 'Apricots', 'fruit', '1 kg', 5, '150.00', '2024-01-09 01:23:54', '2024-01-09 01:23:54', '1704783234_best-product-4.jpg', 'Our Apricots Is Very Tasty And Orange With A Deilghtfully Taste Directly From America.'),
(25, 'Podhina', 'vegetable', '1 kg', 4, '50.00', '2024-01-09 01:26:39', '2024-01-09 01:26:39', '1704783399_vegetable-item-6.jpg', 'Our Podhina Is Directly From Farm Of Villeger');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_type` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Admin,1=User'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `user_type`) VALUES
(1, 'anish khan', 'anishkhanpro2@gmail.com', '$2y$10$iMNPnmTCYI65Afve6fJPwupSWMQv759dG2IXKND76zQLUHJz1MTGC', NULL, '2023-12-31 10:20:50', '2023-12-31 10:20:50', 0),
(2, 'sammi', 'sammikhanpro2@gmail.com', '$2y$10$KTnrqnxH1nYbVHJ/g.ArZujd48aDxyVcA7cWCu3Zjh1B6ictAeFj.', NULL, '2023-12-31 23:16:18', '2023-12-31 23:16:18', 1),
(3, 'tanveer', 'tanveer9294@gmail.com', '$2y$10$znDXr/bApE83g..18UDq1eDrdgqTEXbBm83OQOLeYuB2pnqT1UI2C', NULL, '2023-12-31 23:37:52', '2023-12-31 23:37:52', 1),
(4, 'amir', 'amir@gmail.com', '$2y$10$YGW1vbZpbnJ214oT9P8/gumGefcFwmeimDH97.F83.V7fbAMYgbsu', NULL, '2024-01-05 09:32:00', '2024-01-05 09:32:00', 1),
(5, 'najira', 'najira@gmail.com', '$2y$10$XCCOexi7ZSf7eXcSoOQiC.J0PjTRpzrJPUFH.Ys9bAbsR6w4vEUOG', NULL, '2024-01-06 23:35:11', '2024-01-06 23:35:11', 1),
(6, 'tosib', 'tosib@gmail.com', '$2y$10$.UrjpCmDodIDoymMLaErSOYrMcbVvo.iaqG7GZDBe1kFhhHXfVNuG', NULL, '2024-01-10 01:41:58', '2024-01-10 01:41:58', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_items_user_id_foreign` (`user_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `login_registers`
--
ALTER TABLE `login_registers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_controllers`
--
ALTER TABLE `main_controllers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `my_models`
--
ALTER TABLE `my_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login_registers`
--
ALTER TABLE `login_registers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `main_controllers`
--
ALTER TABLE `main_controllers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `my_models`
--
ALTER TABLE `my_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
