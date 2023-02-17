-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2023 at 08:50 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerse`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `product_title` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `product_id` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Shirt', '2022-12-26 05:27:26', '2022-12-26 05:27:26'),
(5, 'Electronics', '2022-12-26 06:00:22', '2022-12-26 06:00:22'),
(6, 'Gold', '2022-12-26 13:52:07', '2022-12-26 13:52:07'),
(15, 'Garments', '2023-01-01 02:31:26', '2023-01-01 02:31:26');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `comment`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Asif', 'this is my first comment using laravel', '3', '2022-12-29 03:02:50', '2022-12-29 03:02:50'),
(2, 'Asif', 'This is my second comment', '3', '2022-12-29 03:11:20', '2022-12-29 03:11:20'),
(3, 'Asif', 'third comment', '3', '2022-12-29 11:52:00', '2022-12-29 11:52:00'),
(4, 'Angeela', 'fourth commetn hee', '2', '2022-12-29 12:54:43', '2022-12-29 12:54:43');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_12_25_190943_create_sessions_table', 1),
(7, '2022_12_26_101649_create_categories_table', 2),
(8, '2022_12_26_153848_create_products_table', 3),
(9, '2022_12_27_080647_create_carts_table', 4),
(10, '2022_12_27_173829_create_orders_table', 5),
(11, '2022_12_28_162343_create_notifications_table', 6),
(12, '2022_12_29_074623_create_comments_table', 7),
(13, '2022_12_29_074708_create_replies_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `product_title` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `product_id` varchar(255) DEFAULT NULL,
  `payment_status` varchar(255) DEFAULT NULL,
  `delivery_status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `address`, `user_id`, `product_title`, `price`, `quantity`, `image`, `category`, `product_id`, `payment_status`, `delivery_status`, `created_at`, `updated_at`) VALUES
(1, 'Angeela', 'angeelabab@user.com', '03313369304', 'Hyderabad,Pakistan', '2', 'T-Shirt', '1500', '4', '1672072384.jpg', 'Shirt', '2', 'Paid', 'Shipped', '2022-12-27 13:10:20', '2022-12-28 03:34:21'),
(2, 'Angeela', 'angeelabab@user.com', '03313369304', 'Hyderabad,Pakistan', '2', 'Necklace', '10000', '4', '1672080777.jpg', 'Gold', '6', 'Paid', 'Shipped', '2022-12-27 13:10:20', '2022-12-28 03:43:42'),
(3, 'Angeela', 'angeelabab@user.com', '03313369304', 'Hyderabad,Pakistan', '2', 'Necklace', '10000', '5', '1672080777.jpg', 'Gold', '6', 'Paid', 'Shipped', '2022-12-27 13:10:20', '2022-12-28 03:51:56'),
(4, 'Angeela', 'angeelabab@user.com', '03313369304', 'Hyderabad,Pakistan', '2', 'Necklace', '10000', '5', '1672080777.jpg', 'Gold', '6', 'Paid', 'Shipped', '2022-12-27 13:10:20', '2022-12-31 10:59:17'),
(5, 'Angeela', 'angeelabab@user.com', '03313369304', 'Hyderabad,Pakistan', '2', 'Necklace', '10000', '7', '1672080777.jpg', 'Gold', '6', 'Paid', 'Shipped', '2022-12-27 13:10:20', '2022-12-31 10:58:23'),
(6, 'Angeela', 'angeelabab@user.com', '03313369304', 'Hyderabad,Pakistan', '2', 'T-Shirt', '1500', '1', '1672072384.jpg', 'Shirt', '2', 'Paid', 'Shipped', '2022-12-27 13:10:20', '2022-12-31 10:59:43'),
(7, 'Angeela', 'angeelabab@user.com', '03313369304', 'Hyderabad,Pakistan', '2', 'Necklace', '40000', '5', '1672080777.jpg', 'Gold', '6', 'N/A', 'Cancelled', '2022-12-27 13:10:20', '2022-12-29 13:02:19'),
(8, 'Angeela', 'angeelabab@user.com', '03313369304', 'Hyderabad,Pakistan', '2', 'T-Shirt', '1500', '4', '1672072384.jpg', 'Shirt', '2', 'Paid', 'Shipped', '2022-12-27 13:15:52', '2022-12-28 03:53:49'),
(9, 'Angeela', 'angeelabab@user.com', '03313369304', 'Hyderabad,Pakistan', '2', 'Necklace', '10000', '4', '1672080777.jpg', 'Gold', '6', 'Cash on Delivery', 'Pending', '2022-12-27 13:15:52', '2022-12-27 13:15:52'),
(10, 'Angeela', 'angeelabab@user.com', '03313369304', 'Hyderabad,Pakistan', '2', 'Necklace', '10000', '5', '1672080777.jpg', 'Gold', '6', 'Cash on Delivery', 'Pending', '2022-12-27 13:15:52', '2022-12-27 13:15:52'),
(11, 'Angeela', 'angeelabab@user.com', '03313369304', 'Hyderabad,Pakistan', '2', 'Necklace', '10000', '5', '1672080777.jpg', 'Gold', '6', 'Cash on Delivery', 'Pending', '2022-12-27 13:15:52', '2022-12-27 13:15:52'),
(12, 'Angeela', 'angeelabab@user.com', '03313369304', 'Hyderabad,Pakistan', '2', 'Necklace', '10000', '7', '1672080777.jpg', 'Gold', '6', 'Cash on Delivery', 'Pending', '2022-12-27 13:15:52', '2022-12-27 13:15:52'),
(13, 'Angeela', 'angeelabab@user.com', '03313369304', 'Hyderabad,Pakistan', '2', 'T-Shirt', '1500', '1', '1672072384.jpg', 'Shirt', '2', 'N/A', 'Cancelled', '2022-12-27 13:15:52', '2022-12-29 13:02:27'),
(14, 'Angeela', 'angeelabab@user.com', '03313369304', 'Hyderabad,Pakistan', '2', 'Necklace', '40000', '5', '1672080777.jpg', 'Gold', '6', 'Paid', 'Shipped', '2022-12-27 13:15:52', '2022-12-28 14:44:34'),
(15, 'Angeela', 'angeelabab@user.com', '03313369304', 'Hyderabad,Pakistan', '2', 'Necklace', '8000', '1', '1672080777.jpg', 'Gold', '6', 'N/A', 'Cancelled', '2022-12-27 13:28:59', '2022-12-29 13:02:24'),
(16, 'Angeela', 'angeelabab@user.com', '03313369304', 'Hyderabad,Pakistan', '2', 'Necklace', '8000', '1', '1672080777.jpg', 'Gold', '6', 'N/A', 'Cancelled', '2022-12-28 02:34:44', '2022-12-29 13:01:20'),
(17, 'Angeela', 'angeelabab@user.com', '03313369304', 'Hyderabad,Pakistan', '2', 'T-Shirt', '2598', '2', '1672072384.jpg', 'Shirt', '2', 'Paid', 'Shipped', '2022-12-28 02:34:45', '2022-12-28 03:35:17'),
(18, 'Angeela', 'angeelabab@user.com', '03313369304', 'Hyderabad,Pakistan', '2', 'T-Shirt', '2598', '2', '1672072384.jpg', 'Shirt', '2', 'Paid', 'Pending', '2022-12-28 02:36:20', '2022-12-28 02:36:20'),
(19, 'Faisal Awan', 'faisalawan1921@gmail.com', '03313369304', 'Hyderabad,Pakistan', '5', 'Necklace', '8000', '1', '1672080777.jpg', 'Gold', '6', 'Paid', 'Shipped', '2022-12-28 10:37:06', '2022-12-28 10:38:00'),
(22, 'Asif', 'asif@gmail.com', '03313369304', 'Lahore, Pakistan', '3', 'Necklace', '8000', '1', '1672080777.jpg', 'Gold', '6', 'Paid', 'Shipped', '2022-12-28 15:18:18', '2022-12-28 15:20:10'),
(23, 'Asif', 'asif@gmail.com', '03313369304', 'Lahore, Pakistan', '3', 'T-Shirt', '1299', '1', '1672072384.jpg', 'Shirt', '2', 'N/A', 'Cancelled', '2022-12-28 15:29:08', '2022-12-28 15:29:55'),
(24, 'Asif', 'asif@gmail.com', '03313369304', 'Lahore, Pakistan', '3', 'Necklace', '8000', '1', '1672080777.jpg', 'Gold', '6', 'Cash on Delivery', 'Pending', '2022-12-28 15:36:01', '2022-12-28 15:36:01'),
(25, 'Angeela', 'angeelabab@user.com', '03313369304', 'Hyderabad,Pakistan', '2', 'Necklace', '24000', '3', '1672080777.jpg', 'Gold', '6', 'Paid', 'Shipped', '2022-12-29 11:57:28', '2022-12-29 11:59:12'),
(26, 'Angeela', 'angeelabab@user.com', '03313369304', 'Hyderabad,Pakistan', '2', 'T-Shirt', '1299', '1', '1672072384.jpg', 'Shirt', '2', 'Cash on Delivery', 'Pending', '2022-12-29 13:01:11', '2022-12-29 13:01:11'),
(27, 'Angeela', 'angeelabab@user.com', '03313369304', 'Hyderabad,Pakistan', '2', 'T-Shirt', '1299', '1', '1672072384.jpg', 'Shirt', '2', 'Cash on Delivery', 'Pending', '2022-12-29 13:01:11', '2022-12-29 13:01:11'),
(28, 'Angeela', 'angeelabab@user.com', '03313369304', 'Hyderabad,Pakistan', '2', 'T-Shirt', '2598', '2', '1672072384.jpg', 'Shirt', '2', 'Paid', 'Shipped', '2022-12-31 01:40:48', '2023-01-01 23:54:45'),
(29, 'Angeela', 'angeelabab@user.com', '03313369304', 'Hyderabad,Pakistan', '2', 'Necklace', '8000', '1', '1672080777.jpg', 'Gold', '6', 'Paid', 'Shipped', '2023-01-04 03:08:35', '2023-01-04 03:10:27'),
(30, 'Angeela', 'angeelabab@user.com', '03313369304', 'Hyderabad,Pakistan', '2', 'T-Shirt', '5196', '4', '1672072384.jpg', 'Shirt', '2', 'N/A', 'Cancelled', '2023-01-04 03:08:35', '2023-01-04 03:08:55');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `discount_price` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `image`, `category`, `quantity`, `price`, `discount_price`, `created_at`, `updated_at`) VALUES
(2, 'T-Shirt', 'This is a F-Brand T-Shirt', '1672072384.jpg', 'Shirt', '25', '1500', '1299', '2022-12-26 11:33:04', '2022-12-26 11:33:04'),
(3, 'Laptops', 'This is HP laptop with 128 gb SSD, 500 gb HDD and 8 gb RAM.', '1672072788.jpg', 'Electronics', '11', '45000', NULL, '2022-12-26 11:39:48', '2022-12-26 13:53:46'),
(6, 'Necklace', 'Gold Beutiful Necklace', '1672080777.jpg', 'Gold', '44', '10000', '8000', '2022-12-26 13:52:57', '2022-12-26 13:52:57'),
(7, 'Laptops', 'Dell Laptops', '1672082956.jpg', 'Electronics', '33', '18000', '15000', '2022-12-26 14:29:16', '2022-12-26 14:29:16'),
(8, 'Mobile', 'Apple Mobile', '1672384152.jpg', 'Mobile', '33', '50000', '45000', '2022-12-30 02:09:12', '2022-12-30 02:09:12'),
(9, 'Apple', 'Apple Brand Phone', '1672501482.jpg', 'Stationary', '34', '150000', '135000', '2022-12-31 10:44:42', '2022-12-31 10:56:04');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `comment_id` varchar(255) DEFAULT NULL,
  `reply` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `name`, `comment_id`, `reply`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Asif', '1', 'thank you for this', '3', '2022-12-29 11:17:59', '2022-12-29 11:17:59'),
(2, 'Asif', '1', 'second reply', '3', '2022-12-29 11:31:08', '2022-12-29 11:31:08'),
(3, 'Asif', '2', 'for the second comment reply', '3', '2022-12-29 11:47:57', '2022-12-29 11:47:57'),
(4, 'Asif', '3', 'reply to third comment', '3', '2022-12-29 11:52:12', '2022-12-29 11:52:12'),
(5, 'Angeela', '1', 'yeah', '2', '2022-12-29 12:42:36', '2022-12-29 12:42:36'),
(6, 'Angeela', '4', 'love you', '2', '2023-01-01 22:33:59', '2023-01-01 22:33:59');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` text NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('7wYK4AdnGomJuHfhA44i1cbIzqUBWUp2RyWlpFM0', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidmlWMFR5T29lazBMeFpjNUZtaVI2MWNJa0ZxaWowQUgySldDY3FpNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zZWFyY2g/X3Rva2VuPXZpVjBUeU9vZWswTHhaYzVGbWlSNjFjSWtGcWlqMEFIMkpXQ2NxaTUmc2VhcmNoPTgwMDAiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1674901411),
('EAIZfn4RbzUqSBwDhadz6yTYEYv5jEXJqbi7bXOi', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiMEN2MGxkQU15QzJvNUs4Mk9jMUJoTUZEcmtXSFpuaHdtV3hqNFVEMCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9vcmRlcmRhdGEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO3M6NToiYWxlcnQiO2E6MDp7fX0=', 1672819736),
('gfOCorPmiVlyxUdliNnUUfcD8rNen6tPHlhxVkVZ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMzV3QWx3VFRRS1lHTXFhTDlnSzQxR2JNWGlDZUxTRUxQZXRxb2VDTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1674901369),
('XyABdO65fR1zL8TLK9jKHBN6sp7K1M5Cb3pHXMAJ', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiY01XYmdZSHJ5TmxhZFVrZW5zVHoyVkdOS3Q4WHBJNGZiRnNWeERZRSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9leHBvcnRfb3JkZXIiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6NToiYWxlcnQiO2E6MDp7fX0=', 1672819905);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL DEFAULT '0',
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `usertype`, `phone`, `address`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'faisalawan@admin.com', '1', '03313369304', 'Hyderabad, Pakistan', '2022-12-20 15:33:09', '$2y$10$7ERDuSSYH8jwDANjxPorluVpvX.EUjONF/1pp74r7cS5wbWuGb4Z6', NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-25 14:29:48', '2022-12-25 14:29:48'),
(2, 'Angeela', 'angeelabab@user.com', '0', '03313369304', 'Hyderabad,Pakistan', '2022-12-22 15:33:23', '$2y$10$K8Sq6WV7xIBOkRSuxvqIE.iAvuMiixteezst6LdbfSVdLVkXYOd4a', NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-25 14:30:37', '2022-12-25 14:30:37'),
(3, 'Asif', 'asif@gmail.com', '0', '03313369304', 'Lahore, Pakistan', '2022-12-29 19:55:35', '$2y$10$iVRXt9TIqWH8ift3igHLteBpB9EPOM9ocq0InDeqz7wOyaAYupm2O', NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-27 05:43:03', '2022-12-27 05:43:03'),
(4, 'Faisal Khan', 'fkhej1236252@gmail.com', '0', '03313369304', 'Hyderabad,Pakistan', '2022-12-28 10:31:01', '$2y$10$mk.B8g0smpO3yBm9219w0eIXEPJA6JP6cHzEJbC7DpKx/PA50nmzK', NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-28 10:30:31', '2022-12-28 10:31:01'),
(5, 'Faisal Awan', 'faisalawan1921@gmail.com', '0', '03313369304', 'Hyderabad,Pakistan', '2022-12-28 10:32:42', '$2y$10$QoG/0QYfVDm31IED/6KP4O1pEXlcTgKxNfdXKTDTutHvDnWU.ezRC', NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-28 10:31:57', '2022-12-28 10:32:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
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
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
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
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
