-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2024 at 04:23 AM
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
-- Database: `uas_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_amount` varchar(255) NOT NULL,
  `buyer_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `image`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'storage/images/JkcJ4Tnq1g4HyOGZyyYbF4hQeBptKEr1Vj3jItji.png', 'Makanan', '2024-06-08 19:12:40', '2024-06-09 19:55:38'),
(2, 'storage/images/lqembQJ6hqK8Ai2f20o6HXDpT5krSU8CC8sfGBEJ.png', 'Minuman', '2024-06-08 19:12:40', '2024-06-09 19:55:50'),
(3, 'storage/images/Cd0aYYYIeZxatW8pZbmLPglCbgk3JaERuRUBS0wx.png', 'Skin care', '2024-06-08 19:12:40', '2024-06-09 19:55:59'),
(4, 'storage/images/5VqN4GlVLJVLyyNh2CF6FIZh6H7Q1TVtmAoG3HWo.png', 'Pakaian', '2024-06-08 19:12:40', '2024-06-09 19:56:08');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment` text NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `product_id`, `user_id`, `created_at`, `updated_at`) VALUES
(4, 'test', 6, 3, '2024-06-11 17:29:00', '2024-06-11 17:29:00'),
(5, 'mantap saya suka sekali', 7, 3, '2024-06-11 18:06:22', '2024-06-11 18:06:22');

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
(5, '2024_05_23_031044_create_products_table', 1),
(6, '2024_05_23_040518_create_categories_table', 1),
(7, '2024_05_23_125022_add_category_id_column_to_products_table', 1),
(8, '2024_05_23_131559_create_carts_table', 1),
(9, '2024_05_24_023703_create_orders_table', 1),
(10, '2024_05_24_125333_create_comments_table', 1),
(11, '2024_05_25_034330_create_spending_histories_table', 1),
(12, '2024_05_27_080532_create_order_histories_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment` varchar(255) NOT NULL,
  `order_amount` varchar(255) NOT NULL,
  `status` enum('sedang proses','dalam perjalanan','diterima') NOT NULL DEFAULT 'sedang proses',
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `buyer_id` bigint(20) UNSIGNED NOT NULL,
  `seller_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_histories`
--

CREATE TABLE `order_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment` varchar(255) NOT NULL,
  `order_amount` varchar(255) NOT NULL,
  `status` enum('sedang proses','dalam perjalanan','diterima') NOT NULL DEFAULT 'sedang proses',
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `buyer_id` bigint(20) UNSIGNED NOT NULL,
  `seller_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_histories`
--

INSERT INTO `order_histories` (`id`, `payment`, `order_amount`, `status`, `product_id`, `buyer_id`, `seller_id`, `created_at`, `updated_at`) VALUES
(4, 'Cash on delivery', '3', 'diterima', 6, 3, 2, '2024-06-11 17:29:00', '2024-06-11 17:29:00'),
(5, 'Cash on delivery', '10', 'diterima', 7, 3, 2, '2024-06-11 18:06:22', '2024-06-11 18:06:22');

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
  `product_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `stock` varchar(255) NOT NULL,
  `sold` varchar(255) DEFAULT '0',
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `description`, `stock`, `sold`, `price`, `image`, `user_id`, `category_id`, `created_at`, `updated_at`) VALUES
(3, 'Makanan 3', 'makanan enak cocok untuk yang suka pedas', '10', '0', '50000', 'storage/images/9CdJn7EewZRraCVgqFhQXNDefOGsv6LZeHz5kNmE.jpg', 2, 1, '2024-06-08 19:12:40', '2024-06-08 19:15:02'),
(4, 'Makanan 4', 'makanan enak cocok untuk yang suka pedas', '10', '0', '50000', 'storage/images/Qnf6wPuC19N48DvqOYJsi8yuYhVC7P8GuAD8o43R.jpg', 2, 1, '2024-06-08 19:12:40', '2024-06-08 19:15:14'),
(5, 'Makanan 5', 'makanan enak cocok untuk yang suka pedas', '10', '0', '50000', 'storage/images/jTr6NsTTinKV0aWSZSW63MQbInsG7t7ghAgbWEy8.jpg', 2, 1, '2024-06-08 19:12:40', '2024-06-08 19:15:29'),
(6, 'Pakaian 1', 'baju bekas kondisi mulus', '7', '3', '85000', 'storage/images/KPygFyyHUCmp4t7z3wG9OFT7DVJGVyXjS8C9Q6Y5.jpg', 2, 4, '2024-06-08 19:12:40', '2024-06-11 17:28:34'),
(7, 'Pakaian 2', 'baju bekas kondisi mulus', '0', '10', '85000', 'storage/images/hxWJetC2593uVmxvTFVzz3YzPS5C8aayyLbAtSMB.jpg', 2, 4, '2024-06-08 19:12:40', '2024-06-11 18:05:48'),
(8, 'Pakaian 3', 'baju bekas kondisi mulus', '10', '0', '85000', 'storage/images/WjIVH4Q1ixRrvWqR2qdeG0oYCI5FsdryvcDFzDIw.jpg', 2, 4, '2024-06-08 19:12:40', '2024-06-08 19:16:28'),
(11, 'Makanan 1', 'makanan enak gaskeun', '0', '10', '25999', 'storage/images/vTxJyUpwpvVOYpBhdVR4gYhUQ8jzArpn6pZwVmtM.jpg', 2, 1, '2024-06-09 01:50:46', '2024-06-09 01:58:04');

-- --------------------------------------------------------

--
-- Table structure for table `spending_histories`
--

CREATE TABLE `spending_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) NOT NULL,
  `cost` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spending_histories`
--

INSERT INTO `spending_histories` (`id`, `date`, `cost`, `user_id`, `created_at`, `updated_at`) VALUES
(4, '06', '150000', 3, '2024-06-10 03:01:29', '2024-06-10 03:01:29'),
(5, '07', '80000', 3, '2024-06-10 03:01:29', '2024-06-10 03:01:29'),
(6, '08', '250000', 3, '2024-06-10 03:02:42', '2024-06-10 03:02:42'),
(7, '09', '20000', 3, '2024-06-10 03:03:32', '2024-06-10 03:03:32'),
(8, '10', '150000', 3, '2024-06-09 20:05:39', '2024-06-09 20:05:39'),
(10, '12', '850000', 3, '2024-06-11 18:05:48', '2024-06-11 18:05:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `first_name`, `last_name`, `phone`, `image`, `address`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$zeTwO6E8dR4Q/uEj/5M48.5WoaCgGL55FHMqpNwlQlSlXTeagB.OW', 'saya', 'admin', '085123123', 'storage/images/E94oYmPqY1xeTbU82ZqykGdSoEaBc4TB0WFcAz0O.png', NULL, 1, NULL, '2024-06-08 19:12:40', '2024-06-11 17:33:43'),
(2, 'penjual', 'penjual@gmail.com', '$2y$10$lUnM3oZFKhVqJBhBY0x4u.cs5Ds2UHvFuoXAEg93/WetJbjD4rgNO', 'penjual', 'Pertama', '085123123', 'storage/images/JAhXAplpJTSPL2z3nVniRmXZINVb0kXfr4yCUbvQ.png', NULL, 0, NULL, '2024-06-08 19:12:40', '2024-06-11 17:33:20'),
(3, 'aditya', 'aditya@gmail.com', '$2y$10$W7qdgr.Ptfszb8W06ydHhuGDHw2pm2eQJdH4jSDVZTcBJgCYBhjH6', 'Aditya', 'Restu', '085123123', 'storage/images/denTgBz8SYzW7DBPg3Z5wG7I2Da8NJF3fM55RErE.jpg', 'jatihurip', 0, NULL, '2024-06-08 19:12:40', '2024-06-09 20:04:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_buyer_id_foreign` (`buyer_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_product_id_foreign` (`product_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

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
  ADD KEY `orders_product_id_foreign` (`product_id`),
  ADD KEY `orders_buyer_id_foreign` (`buyer_id`),
  ADD KEY `orders_seller_id_foreign` (`seller_id`);

--
-- Indexes for table `order_histories`
--
ALTER TABLE `order_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_histories_product_id_foreign` (`product_id`),
  ADD KEY `order_histories_buyer_id_foreign` (`buyer_id`),
  ADD KEY `order_histories_seller_id_foreign` (`seller_id`);

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
  ADD KEY `products_user_id_foreign` (`user_id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `spending_histories`
--
ALTER TABLE `spending_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `spending_histories_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_histories`
--
ALTER TABLE `order_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `spending_histories`
--
ALTER TABLE `spending_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_buyer_id_foreign` FOREIGN KEY (`buyer_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_buyer_id_foreign` FOREIGN KEY (`buyer_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `products` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `order_histories`
--
ALTER TABLE `order_histories`
  ADD CONSTRAINT `order_histories_buyer_id_foreign` FOREIGN KEY (`buyer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_histories_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_histories_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `products` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `spending_histories`
--
ALTER TABLE `spending_histories`
  ADD CONSTRAINT `spending_histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
