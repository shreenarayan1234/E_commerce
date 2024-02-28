-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2024 at 12:16 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `everestwatch`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `total_price` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_12_12_110645_create_products_table', 1),
(6, '2023_12_21_103058_create_cart_table', 1),
(7, '2024_01_14_025438_create_orders_table', 1),
(8, '2024_01_14_163949_create_users_table', 2),
(9, '2024_01_30_093615_add_column_to_cart_table', 3),
(10, '2024_02_28_063819_create_order_items_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `phone_no` varchar(10) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_id`, `user_id`, `phone_no`, `status`, `payment_method`, `payment_status`, `address`, `created_at`, `updated_at`) VALUES
(9, 9, 1, '9865327451', 'pending', 'cash', 'Delivered', 'Udayapur, Chisapani', '2024-02-28 08:58:18', NULL),
(10, 7, 3, '9861619561', 'pending', 'cash', 'Delivered', 'Gaighat', '2024-02-28 10:00:39', NULL),
(11, 9, 3, '9865327451', 'pending', 'cash', 'Rejected', 'Kathmandu, karuna', '2024-02-28 10:03:11', NULL),
(12, 10, 3, '9865327451', 'pending', 'cash', 'Rejected', 'Kathmandu, karuna', '2024-02-28 10:03:11', NULL),
(13, 13, 4, '9861619561', 'pending', 'cash', 'Paid', 'Gaighat, Udayapur', '2024-02-28 10:10:09', NULL),
(14, 9, 4, '9861619561', 'pending', 'cash', 'Paid', 'Gaighat, Udayapur', '2024-02-28 10:10:09', NULL),
(15, 10, 4, '9865327451', 'pending', 'cash', 'Paid', 'Gaighat', '2024-02-28 10:19:45', NULL),
(16, 13, 5, '9819958927', 'pending', 'cash', 'Paid', 'Hello', '2024-02-28 10:25:17', NULL),
(17, 9, 5, '9819958927', 'pending', 'cash', 'Paid', 'Hello', '2024-02-28 10:25:17', NULL),
(18, 7, 5, '9861619561', 'pending', 'cash', 'Paid', 'Udayapur', '2024-02-28 10:26:33', NULL),
(19, 13, 5, '9855224411', 'pending', 'cash', 'Paid', 'Motigada', '2024-02-28 11:08:10', NULL),
(20, 9, 5, '9855224411', 'pending', 'cash', 'Paid', 'Motigada', '2024-02-28 11:08:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `price` double(8,2) NOT NULL DEFAULT 0.00,
  `order_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `user_id`, `product_id`, `quantity`, `price`, `order_id`, `created_at`, `updated_at`) VALUES
(2, 1, 9, 2, 5000.00, 9, '2024-02-28 03:13:18', '2024-02-28 03:13:18'),
(3, 3, 7, 3, 100.00, 10, '2024-02-28 04:15:39', '2024-02-28 04:15:39'),
(4, 3, 9, 3, 5000.00, 11, '2024-02-28 04:18:11', '2024-02-28 04:18:11'),
(5, 3, 10, 2, 20000.00, 11, '2024-02-28 04:18:11', '2024-02-28 04:18:11'),
(6, 3, 9, 3, 5000.00, 12, '2024-02-28 04:18:11', '2024-02-28 04:18:11'),
(7, 3, 10, 2, 20000.00, 12, '2024-02-28 04:18:11', '2024-02-28 04:18:11'),
(8, 4, 13, 3, 900.00, 13, '2024-02-28 04:25:09', '2024-02-28 04:25:09'),
(9, 4, 9, 3, 5000.00, 13, '2024-02-28 04:25:09', '2024-02-28 04:25:09'),
(10, 4, 13, 3, 900.00, 14, '2024-02-28 04:25:09', '2024-02-28 04:25:09'),
(11, 4, 9, 3, 5000.00, 14, '2024-02-28 04:25:09', '2024-02-28 04:25:09'),
(12, 4, 10, 1, 20000.00, 15, '2024-02-28 04:34:45', '2024-02-28 04:34:45'),
(13, 5, 13, 4, 900.00, 16, '2024-02-28 04:40:17', '2024-02-28 04:40:17'),
(14, 5, 9, 2, 5000.00, 16, '2024-02-28 04:40:17', '2024-02-28 04:40:17'),
(15, 5, 13, 4, 900.00, 17, '2024-02-28 04:40:17', '2024-02-28 04:40:17'),
(16, 5, 9, 2, 5000.00, 17, '2024-02-28 04:40:17', '2024-02-28 04:40:17'),
(17, 5, 7, 1, 100.00, 18, '2024-02-28 04:41:33', '2024-02-28 04:41:33'),
(18, 5, 13, 4, 900.00, 19, '2024-02-28 05:23:10', '2024-02-28 05:23:10'),
(19, 5, 9, 3, 5000.00, 19, '2024-02-28 05:23:10', '2024-02-28 05:23:10'),
(20, 5, 13, 4, 900.00, 20, '2024-02-28 05:23:10', '2024-02-28 05:23:10'),
(21, 5, 9, 3, 5000.00, 20, '2024-02-28 05:23:10', '2024-02-28 05:23:10');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `gallery` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `quantity`, `gallery`, `brand`, `description`, `created_at`, `updated_at`) VALUES
(7, 'Buwa', 100.00, 2, 'q.jpg', 'Rado', '111', '2024-01-26 02:51:16', '2024-01-26 02:51:16'),
(9, 'Rado Watch', 5000.00, 2, 'a.jpg', 'Rado', 'This is the best watch. I ever know. Once buy lifetime guarantee.', '2024-02-24 02:37:55', '2024-02-24 02:37:55'),
(10, 'Buwa and Aama', 20000.00, 3, 'aa.jpg', 'baby', NULL, '2024-02-25 11:27:49', '2024-02-27 02:10:05'),
(13, 'Gorkha Watch', 900.00, 2, 'v.jpg', 'Gurkha', 'This is the best Gurkah watch which is made in Nepal. It has 5 years guarantee.', '2024-02-28 04:22:40', '2024-02-28 04:22:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(4, 'Shreenaryan Shrestha', 'shree@gmail.com', '$2y$12$Tbtmlx9fxQtCEyPbn64ek.QHAEQvO5peMJtmy.IMYymW8nRuA1Jbi', '2024-02-28 04:23:37', '2024-02-28 04:23:37'),
(5, 'Nisha Shrestha', 'nisha@gmail.com', '$2y$12$LaGMl5Gi/UfzXropvNWovuVosZBFHDedQDaPXVc7I4UVlOJp/Jyvm', '2024-02-28 04:39:08', '2024-02-28 04:39:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
