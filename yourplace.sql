-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 23, 2022 at 03:01 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yourplace`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'assets/uploads/about/37861647022952.jpg', '2022-09-17 16:22:32', '2022-09-17 16:22:32'),
(2, 'assets/uploads/about/82511647022963.jpg', '2022-09-17 16:22:32', '2022-09-17 16:22:32'),
(3, 'assets/uploads/about/64041647022970.jpg', '2022-09-17 16:22:32', '2022-09-17 16:22:32');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` enum('admin','company') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `role`, `photo`, `email`, `name`, `password`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'a', 'admin@admin.com', 'ahmed yahya', '$2y$10$r4APdO9rlyZV7TnTiATH/uca1gJMmIRkmegvafKL8FfvS51ppwCGq', NULL, NULL, '2022-09-17 16:22:32', NULL),
(2, 'company', 'assets/uploads/brands/41291647620825.png', 'company@company.com', 'Jaddah Company', '$2y$10$r4APdO9rlyZV7TnTiATH/uca1gJMmIRkmegvafKL8FfvS51ppwCGq', 30.323261461774827, 30.098158996281956, '2022-09-22 20:09:56', '2022-10-22 22:31:10'),
(3, 'company', NULL, 'com@company.com', 'Reyad Company', '$2y$10$r4APdO9rlyZV7TnTiATH/uca1gJMmIRkmegvafKL8FfvS51ppwCGq', 32.3987747, 31.1098747, '2022-09-22 20:09:56', '2022-10-09 15:51:08'),
(5, 'company', 'assets/uploads/admins/14701666364353.jpeg', 'test@test.com', 'test', '$2y$10$pM5wvTr6WSD1mpsGf/6Zte1fvZOkJyxW33szzmLUBqu2SOrJOF2qa', NULL, NULL, '2022-10-21 12:59:14', '2022-10-21 12:59:14');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'assets/uploads/brands/41291647620825.png', '2022-09-17 16:22:32', '2022-09-17 16:22:32'),
(2, 'assets/uploads/brands/64231647620900.png', '2022-09-17 16:22:32', '2022-09-17 16:22:32'),
(3, 'assets/uploads/brands/92011647620906.png', '2022-09-17 16:22:32', '2022-09-17 16:22:32'),
(4, 'assets/uploads/brands/73001647620912.png', '2022-09-17 16:22:32', '2022-09-17 16:22:32');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `added_by` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'added by admin or company',
  `image` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double DEFAULT 0,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sub_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `added_by`, `image`, `description`, `price`, `category_id`, `sub_category_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'assets/uploads/cars/30871651327228.jpg', '((The car can be delivered anywhere in Cairo))\nFor monthly rent and a big discount for periods\n((For rent Nissan Sunny 2021, in zero condition))\nLess than 2 months discount discount\n((Two months rent in advance of 17000 EGP)) means the month is 8500 EGP\n((3 months rent 22500 EGP)) means the month is 7500 EGP', 600, 6, 6, '2022-09-17 16:22:32', '2022-09-17 16:22:32'),
(2, 2, 'assets/uploads/cars/13971651327001.jpg', 'Are you thinking of looking forward to Sharm, the coast, Ain Sukhna or Hurghada?\nAnd they are the way\nIn H.A, we deliver from the door of the house to anywhere in Egypt\nTogether H.A you are safe\nExpertise and professionalism in the field of tourism transport', 450, 1, 3, '2022-09-17 16:22:32', '2022-09-17 16:22:32'),
(3, 3, 'assets/uploads/cars/66351662498537.webp', 'Al Fahad Auto Car Company for rent and hire cars\nWe offer the latest models of cars at the best prices\nComplete except external precautionary for sterilization\n# Possibility to deliver or receive the car at the airport\n# We are always the best with your trust and support', 700, 70, 150, '2022-09-17 16:22:32', '2022-09-17 16:22:32'),
(4, 1, 'assets/uploads/cars/30871651327228.jpg', '((The car can be delivered anywhere in Cairo))\r\nFor monthly rent and a big discount for periods\r\n((For rent Nissan Sunny 2021, in zero condition))\r\nLess than 2 months discount discount\r\n((Two months rent in advance of 17000 EGP)) means the month is 8500 EGP\r\n((3 months rent 22500 EGP)) means the month is 7500 EGP', 600, 6, 6, '2022-09-17 16:22:32', '2022-09-17 16:22:32'),
(5, 2, 'assets/uploads/cars/13971651327001.jpg', 'Are you thinking of looking forward to Sharm, the coast, Ain Sukhna or Hurghada?\r\nAnd they are the way\r\nIn H.A, we deliver from the door of the house to anywhere in Egypt\r\nTogether H.A you are safe\r\nExpertise and professionalism in the field of tourism transport', 450, 1, 3, '2022-09-17 16:22:32', '2022-09-17 16:22:32'),
(6, 3, 'assets/uploads/cars/66351662498537.webp', 'Al Fahad Auto Car Company for rent and hire cars\r\nWe offer the latest models of cars at the best prices\r\nComplete except external precautionary for sterilization\r\n# Possibility to deliver or receive the car at the airport\r\n# We are always the best with your trust and support', 700, 70, 150, '2022-09-17 16:22:32', '2022-09-17 16:22:32'),
(7, 1, 'assets/uploads/cars/30871651327228.jpg', '((The car can be delivered anywhere in Cairo))\r\nFor monthly rent and a big discount for periods\r\n((For rent Nissan Sunny 2021, in zero condition))\r\nLess than 2 months discount discount\r\n((Two months rent in advance of 17000 EGP)) means the month is 8500 EGP\r\n((3 months rent 22500 EGP)) means the month is 7500 EGP', 600, 6, 6, '2022-09-17 16:22:32', '2022-09-17 16:22:32'),
(8, 2, 'assets/uploads/cars/13971651327001.jpg', 'Are you thinking of looking forward to Sharm, the coast, Ain Sukhna or Hurghada?\r\nAnd they are the way\r\nIn H.A, we deliver from the door of the house to anywhere in Egypt\r\nTogether H.A you are safe\r\nExpertise and professionalism in the field of tourism transport', 450, 1, 3, '2022-09-17 16:22:32', '2022-09-17 16:22:32'),
(9, 3, 'assets/uploads/cars/66351662498537.webp', 'Al Fahad Auto Car Company for rent and hire cars\r\nWe offer the latest models of cars at the best prices\r\nComplete except external precautionary for sterilization\r\n# Possibility to deliver or receive the car at the airport\r\n# We are always the best with your trust and support', 700, 70, 150, '2022-09-17 16:22:32', '2022-09-17 16:22:32'),
(10, 1, 'assets/uploads/cars/30871651327228.jpg', '((The car can be delivered anywhere in Cairo))\r\nFor monthly rent and a big discount for periods\r\n((For rent Nissan Sunny 2021, in zero condition))\r\nLess than 2 months discount discount\r\n((Two months rent in advance of 17000 EGP)) means the month is 8500 EGP\r\n((3 months rent 22500 EGP)) means the month is 7500 EGP', 600, 6, 6, '2022-09-17 16:22:32', '2022-09-17 16:22:32'),
(11, 2, 'assets/uploads/cars/13971651327001.jpg', 'Are you thinking of looking forward to Sharm, the coast, Ain Sukhna or Hurghada?\r\nAnd they are the way\r\nIn H.A, we deliver from the door of the house to anywhere in Egypt\r\nTogether H.A you are safe\r\nExpertise and professionalism in the field of tourism transport', 450, 1, 3, '2022-09-17 16:22:32', '2022-09-17 16:22:32'),
(12, 3, 'assets/uploads/cars/66351662498537.webp', 'Al Fahad Auto Car Company for rent and hire cars\r\nWe offer the latest models of cars at the best prices\r\nComplete except external precautionary for sterilization\r\n# Possibility to deliver or receive the car at the airport\r\n# We are always the best with your trust and support', 700, 70, 150, '2022-09-17 16:22:32', '2022-09-17 16:22:32');

-- --------------------------------------------------------

--
-- Table structure for table `car_data`
--

CREATE TABLE `car_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `car_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `car_data`
--

INSERT INTO `car_data` (`id`, `key`, `value`, `car_id`, `created_at`, `updated_at`) VALUES
(11, 'سنة الصنع', '2011', 2, '2022-09-17 16:22:32', '2022-09-17 16:22:32'),
(13, 'ناقل الحركة', 'مانيوال', 2, '2022-09-17 13:56:41', '2022-09-17 13:56:41'),
(14, 'الشكل', 'سيدان', 2, '2022-09-17 13:56:41', '2022-09-17 13:56:41'),
(15, 'سنة الصنع', '2022', 1, '2022-09-17 13:56:41', '2022-09-17 13:56:41'),
(17, 'ناقل الحركة', 'أتوماتيك', 1, '2022-09-17 13:56:41', '2022-09-17 13:56:41'),
(18, 'الشكل', 'سيدان', 1, '2022-09-17 13:56:41', '2022-09-17 13:56:41'),
(19, 'المحرك', '1600 cc', 1, '2022-09-17 13:56:41', '2022-09-17 13:56:41'),
(20, 'اللون', 'ازرق', 1, '2022-09-17 13:56:41', '2022-09-17 13:56:41'),
(21, 'سنة الصنع', '2021', 3, '2022-09-06 19:08:57', '2022-09-06 19:08:57'),
(23, 'ناقل الحركة', 'مانيوال', 3, '2022-09-06 19:08:57', '2022-09-06 19:08:57');

-- --------------------------------------------------------

--
-- Table structure for table `car_images`
--

CREATE TABLE `car_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `car_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `car_images`
--

INSERT INTO `car_images` (`id`, `image`, `car_id`, `created_at`, `updated_at`) VALUES
(5, 'assets/uploads/cars/1651327922MTY1MTMyNzkyMjYyNmQ0M2IyYjVjM2Y=.jpeg', 1, '2022-09-17 13:56:41', '2022-09-17 13:56:41'),
(6, 'assets/uploads/cars/1651327922MTY1MTMyNzkyMjYyNmQ0M2IyYjY5MTQ=.jpeg', 1, '2022-09-17 13:56:41', '2022-09-17 13:56:41'),
(7, 'assets/uploads/cars/1651432180MTY1MTQzMjE4MDYyNmVkYWY0ZDc2YmU=.png', 2, '2022-09-17 13:56:41', '2022-09-17 13:56:41'),
(9, 'assets/uploads/cars/1664809352MTY2NDgwOTM1MjYzM2FmOTg4N2FmNTQ=.jpeg', 3, '2022-10-03 13:02:32', '2022-10-03 13:02:32'),
(10, 'assets/uploads/cars/1664809352MTY2NDgwOTM1MjYzM2FmOTg4N2UzZGI=.jpeg', 3, '2022-10-03 13:02:32', '2022-10-03 13:02:32');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title_ar`, `title_en`, `created_at`, `updated_at`) VALUES
(1, 'دايو', NULL, '2022-03-24 21:11:46', '2022-03-24 21:11:46'),
(2, 'فيات', NULL, '2022-03-24 21:12:00', '2022-03-24 21:12:57'),
(3, 'تويوتا', NULL, '2022-03-24 21:13:22', '2022-03-24 21:13:22'),
(4, 'شيفروليه', NULL, '2022-03-24 21:13:54', '2022-03-24 21:13:54'),
(6, 'بي ام دبليو', NULL, '2022-03-25 10:38:38', '2022-03-25 11:50:38'),
(8, 'كيا', NULL, '2022-05-01 20:16:31', '2022-05-01 20:16:31'),
(9, 'هيونداي', NULL, '2022-05-12 21:24:09', '2022-05-12 21:24:09'),
(10, 'نيسان', NULL, '2022-05-12 21:37:41', '2022-05-12 21:37:41'),
(11, 'ميتسوبيشي', NULL, '2022-05-12 21:38:02', '2022-05-12 21:38:02'),
(12, 'جي ام سي', NULL, '2022-05-12 21:38:16', '2022-05-12 21:38:16'),
(13, 'مرسيدس', NULL, '2022-05-12 21:38:36', '2022-05-12 21:38:36'),
(14, 'لكزس', NULL, '2022-05-12 21:38:43', '2022-05-12 21:38:43'),
(15, 'فورد', NULL, '2022-05-12 21:38:55', '2022-05-12 21:38:55'),
(16, 'هوندا', NULL, '2022-05-12 21:39:11', '2022-05-12 21:39:11'),
(17, 'لاند روفر', NULL, '2022-05-12 21:39:29', '2022-05-12 21:39:29'),
(18, 'سوزوكي', NULL, '2022-05-12 21:39:42', '2022-05-12 21:39:42'),
(19, 'فولكس فاجن', NULL, '2022-05-12 21:39:58', '2022-05-12 21:40:12'),
(20, 'جيب', NULL, '2022-05-12 21:40:27', '2022-05-12 21:40:27'),
(21, 'دودج', NULL, '2022-05-12 21:40:33', '2022-05-12 21:40:33'),
(22, 'هونداي', NULL, '2022-05-12 21:40:46', '2022-05-12 21:40:46'),
(23, 'رينو', NULL, '2022-05-12 21:41:04', '2022-05-12 21:41:04'),
(24, 'بورش', NULL, '2022-05-12 21:41:14', '2022-05-12 21:41:14'),
(25, 'كاديلاك', NULL, '2022-05-12 21:41:30', '2022-05-12 21:41:30'),
(26, 'أودي', NULL, '2022-05-12 21:41:52', '2022-05-12 21:41:52'),
(27, 'انفينيتي', NULL, '2022-05-12 21:42:12', '2022-05-12 21:42:12'),
(29, 'ميني', NULL, '2022-05-12 21:43:11', '2022-05-12 21:43:11'),
(30, 'مازدا', NULL, '2022-05-12 21:43:28', '2022-05-12 21:43:28'),
(31, 'شيري', NULL, '2022-05-12 21:43:34', '2022-05-12 21:43:34'),
(32, 'ايسوزو', NULL, '2022-05-12 21:43:49', '2022-05-12 21:43:49'),
(33, 'بيجو', NULL, '2022-05-12 21:44:05', '2022-05-12 21:44:05'),
(34, 'رانج روفر', NULL, '2022-05-12 21:44:16', '2022-05-12 21:44:16'),
(35, 'فولفو', NULL, '2022-05-12 21:44:29', '2022-05-12 21:44:29'),
(36, 'هامر', NULL, '2022-05-12 21:44:36', '2022-05-12 21:44:36'),
(37, 'إم جي', NULL, '2022-05-12 21:44:44', '2022-05-12 21:44:44'),
(38, 'سوبارو', NULL, '2022-05-12 21:45:01', '2022-05-12 21:45:01'),
(39, 'بنتلي', NULL, '2022-05-12 21:45:14', '2022-05-12 21:45:14'),
(40, 'جاك', NULL, '2022-05-12 21:45:41', '2022-05-12 21:45:41'),
(41, 'جاكوار', NULL, '2022-05-12 21:46:05', '2022-05-12 21:46:05'),
(42, 'تيسلا', NULL, '2022-05-12 21:46:15', '2022-05-12 21:46:15'),
(43, 'كريسلر', NULL, '2022-05-12 21:47:32', '2022-05-12 21:47:32'),
(44, 'مزيراتي', NULL, '2022-05-12 21:47:45', '2022-05-12 21:47:45'),
(45, 'سكودا', NULL, '2022-05-12 21:47:58', '2022-05-12 21:47:58'),
(46, 'سيات', NULL, '2022-05-12 21:48:10', '2022-05-12 21:48:10'),
(47, 'دايهاتسو', NULL, '2022-05-12 21:48:17', '2022-05-12 21:48:17'),
(48, 'بروتون', NULL, '2022-05-12 21:48:28', '2022-05-12 21:48:28'),
(49, 'رولس رويز', NULL, '2022-05-12 21:48:38', '2022-05-12 21:49:09'),
(50, 'جريت وول', NULL, '2022-05-12 21:49:26', '2022-05-12 21:49:26'),
(51, 'سانج يونج', NULL, '2022-05-12 21:49:39', '2022-05-12 21:49:39'),
(52, 'تاتا', NULL, '2022-05-12 21:49:50', '2022-05-12 21:49:50'),
(53, 'لينكولن', NULL, '2022-05-12 21:49:57', '2022-05-12 21:49:57'),
(54, 'استون مارتن', NULL, '2022-05-12 21:50:09', '2022-05-12 21:50:09'),
(55, 'فيراري', NULL, '2022-05-12 21:50:20', '2022-05-12 21:50:20'),
(56, 'جينيسيس', NULL, '2022-05-12 21:50:29', '2022-05-12 21:50:29'),
(57, 'لمبرجيني', NULL, '2022-05-12 21:50:41', '2022-05-12 21:50:41'),
(58, 'بايك', NULL, '2022-05-12 21:50:57', '2022-05-12 21:50:57'),
(59, 'بورحوارد', NULL, '2022-05-12 21:51:11', '2022-05-12 21:51:11'),
(60, 'لوتس', NULL, '2022-05-12 21:51:23', '2022-05-12 21:51:23'),
(61, 'بويك', NULL, '2022-05-12 21:51:34', '2022-05-12 21:51:34'),
(62, 'فوتون', NULL, '2022-05-12 21:51:45', '2022-05-12 21:51:45'),
(63, 'ماي باخ', NULL, '2022-05-12 21:51:58', '2022-05-12 21:51:58'),
(64, 'ماكلارين', NULL, '2022-05-12 21:52:10', '2022-05-12 21:52:10'),
(65, 'بونتياك', NULL, '2022-05-12 21:52:21', '2022-05-12 21:52:21'),
(66, 'زد اكس اوتو', NULL, '2022-05-12 21:52:40', '2022-05-12 21:52:40'),
(67, 'كينج لونج', NULL, '2022-05-12 21:52:53', '2022-05-12 21:52:53'),
(68, 'فاندر هول', NULL, '2022-05-12 21:53:08', '2022-05-12 21:53:08'),
(69, 'الفا روميو', NULL, '2022-05-12 21:53:24', '2022-05-12 21:53:24'),
(70, 'اوبل', NULL, '2022-05-12 21:53:37', '2022-05-12 21:53:37'),
(71, 'اشوك', NULL, '2022-05-12 21:53:51', '2022-05-12 21:53:51'),
(72, 'بوجاتي', 'Bugatti', '2022-05-12 21:54:06', '2022-09-03 13:39:50');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'الدوحة', '2022-03-24 19:43:31', '2022-03-24 19:43:31'),
(2, 'الريان', '2022-03-24 19:44:24', '2022-03-24 19:44:24'),
(3, 'الخور', '2022-03-24 19:44:31', '2022-03-24 19:44:31'),
(4, 'الوكرة', '2022-03-24 19:45:09', '2022-03-24 19:45:09'),
(5, 'مدينة الشمال', '2022-03-24 19:45:31', '2022-03-24 19:45:31'),
(6, 'ام صلال', '2022-03-24 19:46:30', '2022-03-24 19:46:30'),
(7, 'الشاعين', '2022-03-24 19:46:45', '2022-03-24 19:46:45'),
(8, 'الرويس', '2022-03-24 19:46:55', '2022-03-24 20:12:48');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `title`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(512, 'Griffith Bates', 'nuhuvukeku@mailinator.com', 'Sequi aut assumenda', '+1 (835) 762-7272', 'In earum laudantium', '2022-10-09 13:30:12', '2022-10-09 13:30:12'),
(513, 'Trevor Brewer', 'myxagase@mailinator.com', 'Eveniet voluptatem', '+1 (258) 588-7441', 'Sed sapiente ipsum', '2022-10-09 13:30:39', '2022-10-09 13:30:39');

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_us` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gmail` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `times` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `logo`, `title`, `about_us`, `email`, `phone`, `facebook`, `twitter`, `youtube`, `gmail`, `times`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Your Place', 'Your Place Cars Company is a company specialized in selling the best cars, using the Gulf and Gulf specifications. If you are thinking of buying a car, we are the best choice. Just choose the car and we will deliver it to you home.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-08 14:49:29');

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
(1, '2022_02_10_210652_create_contact_us_table', 1),
(2, '2022_02_11_160038_create_admins_table', 2),
(3, '2022_03_11_125333_create_general_settings_table', 3),
(4, '2022_03_11_130850_create_sliders_table', 4),
(5, '2022_03_11_164858_create_about_us_table', 5),
(6, '2022_03_18_161349_create_brands_table', 6),
(7, '2022_03_18_224951_create_posts_table', 7),
(9, '2022_03_19_203412_create_teams_table', 8),
(10, '2022_03_24_192550_create_cities_table', 9),
(11, '2022_03_24_223033_create_categories_table', 10),
(12, '2022_03_25_130144_create_sub_categories_table', 11),
(13, '2022_04_22_123436_create_users_table', 12),
(14, '2022_04_24_194955_create_cars_table', 13),
(15, '2022_04_24_195006_create_car_data_table', 13),
(16, '2022_04_24_195022_create_car_images_table', 13),
(17, '2022_10_21_142521_create_companies_table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `photo`, `title`, `desc`, `created_at`, `updated_at`) VALUES
(1, 'assets/uploads/posts/70871647647098.jpg', 'A new set of cars from Toyota', 'We have a Toyota Corolla model 2020, it was used by the Egyptian consulate, we have a Toyota Corolla model 2020, it was used by the Egyptian consulate.', '2022-03-18 21:25:01', '2022-03-18 21:44:58'),
(3, 'assets/uploads/posts/assets/uploads/posts/75411665338136.webp', 'We Hiring', 'Hello We Need Employs To Work With Us Please Send Your CV by using our site and contact us page to make us know about your experience', '2022-10-09 15:55:36', '2022-10-09 15:55:36');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(20) NOT NULL,
  `car_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_or_company_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('new','accepted','refused') NOT NULL DEFAULT 'new',
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `price` double NOT NULL DEFAULT 0,
  `address` text DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `car_id`, `admin_or_company_id`, `user_id`, `status`, `city_id`, `price`, `address`, `from_date`, `to_date`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 14, 'new', 1, 0, NULL, NULL, NULL, '2022-10-22 23:36:09', '2022-10-22 21:27:35'),
(2, 6, 2, 20, 'accepted', NULL, 0, 'الرياض', '2022-10-22', '2022-10-22', '2022-10-22 23:35:56', '2022-10-22 16:07:25'),
(3, 3, 2, 20, 'refused', NULL, 0, 'الرياض', '2022-10-22', '2022-10-22', '2022-10-22 23:35:58', '2022-10-22 21:27:33'),
(4, 1, 1, 20, 'accepted', NULL, 0, 'الرياض', '2022-10-22', '2022-10-22', '2022-10-22 23:27:31', '2022-10-22 21:27:31'),
(5, 1, 1, 20, 'new', NULL, 600, 'الرياض', '2022-10-23', '2022-10-23', '2022-10-22 22:06:19', '2022-10-22 22:06:19');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ar` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_title_ar` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_title_en` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_text_ar` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_text_en` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_link` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `photo`, `title_ar`, `title_en`, `sub_title_ar`, `sub_title_en`, `button_text_ar`, `button_text_en`, `button_link`, `created_at`, `updated_at`) VALUES
(6, 'assets/uploads/sliders/28411662213354.webp', 'يور بليس', 'Your Place For Cars', 'تأجير السيارات', 'Automobile trade and supply, Cars in zero condition and Gulf specifications', 'فيسبوك', 'facebook', 'https://www.facebook.com/', '2022-09-03 11:21:43', '2022-09-06 17:54:35'),
(8, 'assets/uploads/sliders/10531662496976.webp', 'الموقع الرسمي', 'Official Page', 'تأجير السيارات', '                        The first company in the Arab world that allows you to rent cars from offices and acts as a mediator to guarantee the rights of everyone\n', 'فيسبوك', 'facebook', 'https://www.facebook.com/', '2022-09-06 18:42:57', '2022-09-06 18:42:57');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `title_ar`, `title_en`, `category_id`, `created_at`, `updated_at`) VALUES
(3, 'نوبيرا', NULL, 1, '2022-03-25 11:29:29', '2022-03-25 11:29:29'),
(4, 'لانوس', NULL, 1, '2022-03-25 11:29:36', '2022-03-25 11:42:02'),
(6, 'X6', NULL, 6, '2022-03-25 11:43:19', '2022-03-25 11:43:19'),
(7, 'Z3', NULL, 6, '2022-03-25 11:43:31', '2022-03-25 11:43:31'),
(8, 'Z4', NULL, 6, '2022-03-25 11:43:38', '2022-03-25 11:43:43'),
(9, 'كروز', NULL, 4, '2022-03-25 11:44:18', '2022-03-25 11:44:18'),
(10, 'كامارو', NULL, 4, '2022-03-25 11:44:28', '2022-03-25 11:44:28'),
(11, 'اوبترا', NULL, 4, '2022-03-25 11:44:45', '2022-03-25 11:44:45'),
(12, 'هاي اس', NULL, 3, '2022-03-25 11:45:15', '2022-03-25 11:45:15'),
(13, 'كورولا', NULL, 3, '2022-03-25 11:45:28', '2022-03-25 11:45:28'),
(14, 'راش', NULL, 3, '2022-03-25 11:45:38', '2022-03-25 11:45:38'),
(15, '124', NULL, 2, '2022-03-25 11:46:13', '2022-03-25 11:46:13'),
(16, 'ماريا', NULL, 2, '2022-03-25 11:46:17', '2022-03-25 11:46:17'),
(17, 'كوبو', NULL, 2, '2022-03-25 11:46:30', '2022-03-25 11:46:30'),
(18, 'سيراتو', NULL, 8, '2022-05-01 20:23:20', '2022-05-01 20:23:20'),
(19, 'ريو', NULL, 8, '2022-05-01 20:23:26', '2022-05-01 20:23:26'),
(20, 'سبورتاج', NULL, 8, '2022-05-01 20:23:35', '2022-05-01 20:23:35'),
(21, 'سول', NULL, 8, '2022-05-01 20:23:43', '2022-05-01 20:23:43'),
(22, 'سورينتو', NULL, 8, '2022-05-01 20:23:54', '2022-05-01 20:23:54'),
(23, 'كادينزا', NULL, 8, '2022-05-12 20:48:49', '2022-05-12 20:48:49'),
(24, 'كرنفال', NULL, 8, '2022-05-12 20:49:05', '2022-05-12 20:49:05'),
(25, 'كورسا', NULL, 8, '2022-05-12 20:49:17', '2022-05-12 20:49:17'),
(26, 'كوبيه', NULL, 8, '2022-05-12 20:49:34', '2022-05-12 20:49:34'),
(27, 'موهاف', NULL, 8, '2022-05-12 20:49:51', '2022-05-12 20:49:51'),
(28, 'أوبيروس', NULL, 8, '2022-05-12 20:50:08', '2022-05-12 20:50:08'),
(29, 'سايبا', NULL, 8, '2022-05-12 20:50:28', '2022-05-12 20:50:28'),
(30, 'سيلتوس', NULL, 8, '2022-05-12 20:50:47', '2022-05-12 20:50:47'),
(31, 'سبيكترا', NULL, 8, '2022-05-12 20:51:08', '2022-05-12 20:51:08'),
(32, 'كي3', NULL, 8, '2022-05-12 20:52:00', '2022-05-12 20:52:00'),
(33, 'كي 5', NULL, 8, '2022-05-12 20:52:10', '2022-05-12 20:52:10'),
(34, 'شوما', NULL, 8, '2022-05-12 20:52:31', '2022-05-12 20:52:31'),
(35, 'سيدانو', NULL, 8, '2022-05-12 20:52:53', '2022-05-12 20:52:53'),
(36, 'ألفاراد', NULL, 3, '2022-05-12 20:54:46', '2022-05-12 20:54:46'),
(37, 'أوريون', NULL, 3, '2022-05-12 20:54:56', '2022-05-12 20:54:56'),
(38, 'أفالون', NULL, 3, '2022-05-12 20:55:10', '2022-05-12 20:55:10'),
(39, 'أفانزا', NULL, 3, '2022-05-12 20:55:24', '2022-05-12 20:55:24'),
(40, 'أفينسيز', NULL, 3, '2022-05-12 20:55:46', '2022-05-12 20:55:46'),
(41, 'كامري', NULL, 3, '2022-05-12 20:55:58', '2022-05-12 20:55:58'),
(42, 'كارينا', NULL, 3, '2022-05-12 20:56:08', '2022-05-12 20:56:08'),
(43, 'سيليكا', NULL, 3, '2022-05-12 20:56:29', '2022-05-12 20:56:29'),
(44, 'كورونا', NULL, 3, '2022-05-12 20:56:51', '2022-05-12 20:56:51'),
(45, 'كريسيدا', NULL, 3, '2022-05-12 20:57:05', '2022-05-12 20:57:05'),
(46, 'كراون', NULL, 3, '2022-05-12 20:57:16', '2022-05-12 20:57:16'),
(47, 'إيكو', NULL, 3, '2022-05-12 20:57:31', '2022-05-12 20:57:31'),
(48, 'فورتشنز', NULL, 3, '2022-05-12 20:57:53', '2022-05-12 20:57:53'),
(49, 'إف جي كروزر', NULL, 3, '2022-05-12 20:58:12', '2022-05-12 20:58:12'),
(50, 'هاي لاندر', NULL, 3, '2022-05-12 20:58:27', '2022-05-12 20:58:27'),
(51, 'هاي لوكس', NULL, 3, '2022-05-12 20:58:50', '2022-05-12 20:58:50'),
(52, 'أي كيو', NULL, 3, '2022-05-12 20:59:10', '2022-05-12 20:59:10'),
(53, 'إينوفا', NULL, 3, '2022-05-12 20:59:25', '2022-05-12 20:59:25'),
(54, 'لاند كروزر', NULL, 3, '2022-05-12 20:59:45', '2022-05-12 20:59:45'),
(55, 'برادو', NULL, 3, '2022-05-12 20:59:56', '2022-05-12 20:59:56'),
(56, 'بريفيا', NULL, 3, '2022-05-12 21:00:15', '2022-05-12 21:00:15'),
(57, 'بيريوس', NULL, 3, '2022-05-12 21:00:48', '2022-05-12 21:01:05'),
(58, 'راف 4', NULL, 3, '2022-05-12 21:01:29', '2022-05-12 21:01:29'),
(59, 'فور رانر', NULL, 3, '2022-05-12 21:01:57', '2022-05-12 21:01:57'),
(60, 'سيون', NULL, 3, '2022-05-12 21:03:29', '2022-05-12 21:03:29'),
(61, 'سيكويا', NULL, 3, '2022-05-12 21:03:42', '2022-05-12 21:03:42'),
(62, 'ستارليت', NULL, 3, '2022-05-12 21:04:01', '2022-05-12 21:04:01'),
(63, 'سوبرا', NULL, 3, '2022-05-12 21:04:14', '2022-05-12 21:04:14'),
(64, 'تاكوما', NULL, 3, '2022-05-12 21:04:26', '2022-05-12 21:04:26'),
(65, 'ترسل', NULL, 3, '2022-05-12 21:04:35', '2022-05-12 21:04:35'),
(66, 'توندرا', NULL, 3, '2022-05-12 21:05:37', '2022-05-12 21:05:37'),
(67, 'إكس ايه', NULL, 3, '2022-05-12 21:05:56', '2022-05-12 21:05:56'),
(68, 'ياريس', NULL, 3, '2022-05-12 21:06:07', '2022-05-12 21:06:07'),
(69, 'زيلاس', NULL, 3, '2022-05-12 21:06:34', '2022-05-12 21:06:34'),
(70, 'كوستر', NULL, 3, '2022-05-12 21:06:53', '2022-05-12 21:06:53'),
(71, 'جي اكس ار', NULL, 3, '2022-05-12 21:07:10', '2022-05-12 21:07:10'),
(72, 'تيبو', NULL, 2, '2022-05-12 21:07:56', '2022-05-12 21:07:56'),
(73, '128', NULL, 2, '2022-05-12 21:08:07', '2022-05-12 21:08:07'),
(74, 'استرو', NULL, 4, '2022-05-12 21:11:22', '2022-05-12 21:11:22'),
(75, 'افلانش', NULL, 4, '2022-05-12 21:11:34', '2022-05-12 21:11:34'),
(76, 'أفيو', NULL, 4, '2022-05-12 21:11:46', '2022-05-12 21:11:46'),
(77, 'بلازر', NULL, 4, '2022-05-12 21:12:01', '2022-05-12 21:12:01'),
(78, 'كابتيفا', NULL, 4, '2022-05-12 21:12:29', '2022-05-12 21:12:29'),
(79, 'كابرس', NULL, 4, '2022-05-12 21:12:39', '2022-05-12 21:12:39'),
(80, 'كابرس كلاسيك', NULL, 4, '2022-05-12 21:13:01', '2022-05-12 21:13:01'),
(81, 'كافالير', NULL, 4, '2022-05-12 21:13:16', '2022-05-12 21:13:16'),
(82, 'كولورادو', NULL, 4, '2022-05-12 21:13:32', '2022-05-12 21:13:32'),
(83, 'كورفيت', NULL, 4, '2022-05-12 21:13:44', '2022-05-12 21:13:44'),
(84, 'كروز', NULL, 4, '2022-05-12 21:14:02', '2022-05-12 21:14:02'),
(85, 'ايبيكا', NULL, 4, '2022-05-12 21:14:17', '2022-05-12 21:14:17'),
(86, 'اكسبلورار', NULL, 4, '2022-05-12 21:14:33', '2022-05-12 21:14:33'),
(87, 'اكسبرس', NULL, 4, '2022-05-12 21:14:45', '2022-05-12 21:14:45'),
(88, 'فرونتيرا', NULL, 4, '2022-05-12 21:15:00', '2022-05-12 21:15:00'),
(89, 'امبالا', NULL, 4, '2022-05-12 21:15:21', '2022-05-12 21:15:21'),
(90, 'لانوس', NULL, 4, '2022-05-12 21:15:32', '2022-05-12 21:15:32'),
(91, 'لومينا', NULL, 4, '2022-05-12 21:15:42', '2022-05-12 21:15:42'),
(92, 'ماليبو', NULL, 4, '2022-05-12 21:15:53', '2022-05-12 21:15:53'),
(93, 'إن 200', NULL, 4, '2022-05-12 21:16:09', '2022-05-12 21:16:09'),
(94, 'بيك أب', NULL, 4, '2022-05-12 21:16:28', '2022-05-12 21:16:28'),
(95, 'سلفرادو', NULL, 4, '2022-05-12 21:16:49', '2022-05-12 21:16:49'),
(96, 'سونيك', NULL, 4, '2022-05-12 21:17:00', '2022-05-12 21:17:00'),
(97, 'سبارك', NULL, 4, '2022-05-12 21:17:14', '2022-05-12 21:17:14'),
(98, 'سبرينت', NULL, 4, '2022-05-12 21:17:32', '2022-05-12 21:17:32'),
(99, 'اس اس ار', NULL, 4, '2022-05-12 21:17:50', '2022-05-12 21:18:06'),
(100, 'سوبر بان', NULL, 4, '2022-05-12 21:18:22', '2022-05-12 21:18:22'),
(101, 'تاهو', NULL, 4, '2022-05-12 21:18:35', '2022-05-12 21:18:35'),
(102, 'تريلبليزر', NULL, 4, '2022-05-12 21:18:49', '2022-05-12 21:18:49'),
(103, 'ترافرس', NULL, 4, '2022-05-12 21:19:07', '2022-05-12 21:19:07'),
(104, 'تراكس', NULL, 4, '2022-05-12 21:19:24', '2022-05-12 21:19:24'),
(105, 'ابلاندر', NULL, 4, '2022-05-12 21:19:42', '2022-05-12 21:19:42'),
(106, 'اكسنت', NULL, 9, '2022-05-12 21:24:57', '2022-05-12 21:24:57'),
(107, 'أتوس', NULL, 9, '2022-05-12 21:25:11', '2022-05-12 21:25:11'),
(108, 'أفانتي', NULL, 9, '2022-05-12 21:25:25', '2022-05-12 21:25:25'),
(109, 'أزيرا', NULL, 9, '2022-05-12 21:25:42', '2022-05-12 21:25:42'),
(110, 'سنتنيال', NULL, 9, '2022-05-12 21:25:57', '2022-05-12 21:25:57'),
(111, 'كوبيه', NULL, 9, '2022-05-12 21:26:17', '2022-05-12 21:26:17'),
(112, 'كريتا', NULL, 9, '2022-05-12 21:26:26', '2022-05-12 21:26:26'),
(113, 'إلينترا', NULL, 9, '2022-05-12 21:26:39', '2022-05-12 21:26:39'),
(114, 'الينترا', NULL, 9, '2022-05-12 21:26:59', '2022-05-12 21:26:59'),
(115, 'أنتوراج', NULL, 9, '2022-05-12 21:27:14', '2022-05-12 21:27:14'),
(116, 'إكسيل', NULL, 9, '2022-05-12 21:27:34', '2022-05-12 21:27:34'),
(117, 'جالوبر', NULL, 9, '2022-05-12 21:27:50', '2022-05-12 21:27:50'),
(118, 'جينيسيز', NULL, 9, '2022-05-12 21:28:13', '2022-05-12 21:28:13'),
(119, 'جراند يور', NULL, 9, '2022-05-12 21:28:26', '2022-05-12 21:28:26'),
(120, 'إتش 1', NULL, 9, '2022-05-12 21:28:41', '2022-05-12 21:28:41'),
(121, 'إتش 100', NULL, 9, '2022-05-12 21:28:52', '2022-05-12 21:28:52'),
(122, 'أي 10', NULL, 9, '2022-05-12 21:29:07', '2022-05-12 21:29:07'),
(123, 'أي 20', NULL, 9, '2022-05-12 21:29:16', '2022-05-12 21:29:16'),
(124, 'أي 30', NULL, 9, '2022-05-12 21:29:25', '2022-05-12 21:29:25'),
(125, 'ايونيك', NULL, 9, '2022-05-12 21:30:12', '2022-05-12 21:30:12'),
(126, 'كونا', NULL, 9, '2022-05-12 21:30:24', '2022-05-12 21:30:24'),
(127, 'ماتركس', NULL, 9, '2022-05-12 21:30:36', '2022-05-12 21:30:36'),
(128, 'بوني', NULL, 9, '2022-05-12 21:30:42', '2022-05-12 21:30:42'),
(129, 'سانتافي', NULL, 9, '2022-05-12 21:30:50', '2022-05-12 21:30:50'),
(130, 'سانتامو', NULL, 9, '2022-05-12 21:31:10', '2022-05-12 21:31:10'),
(131, 'سوناتا', NULL, 9, '2022-05-12 21:31:24', '2022-05-12 21:31:24'),
(132, 'تيراكان', NULL, 9, '2022-05-12 21:31:41', '2022-05-12 21:31:41'),
(133, 'تيبرون', NULL, 9, '2022-05-12 21:31:57', '2022-05-12 21:31:57'),
(134, 'تراجيت', NULL, 9, '2022-05-12 21:32:22', '2022-05-12 21:32:22'),
(135, 'توسان', NULL, 9, '2022-05-12 21:32:30', '2022-05-12 21:32:30'),
(136, 'اتش وان فان', NULL, 9, '2022-05-12 21:32:46', '2022-05-12 21:32:46'),
(137, 'فوليستر', NULL, 9, '2022-05-12 21:32:59', '2022-05-12 21:32:59'),
(138, 'فيراكروز', NULL, 9, '2022-05-12 21:33:12', '2022-05-12 21:33:12'),
(139, 'فيرنا', NULL, 9, '2022-05-12 21:33:23', '2022-05-12 21:33:23'),
(140, 'فيفا', NULL, 9, '2022-05-12 21:33:31', '2022-05-12 21:33:31'),
(141, 'جبتز', NULL, 9, '2022-05-12 21:33:47', '2022-05-12 21:33:47'),
(142, 'بوجاتي', NULL, 72, '2022-05-12 23:03:40', '2022-05-12 23:03:40'),
(143, 'شيرون', NULL, 72, '2022-05-12 23:03:52', '2022-05-12 23:03:52'),
(144, 'كلاسيك', NULL, 72, '2022-05-12 23:03:58', '2022-05-12 23:03:58'),
(145, 'ديفو', NULL, 72, '2022-05-12 23:04:07', '2022-05-12 23:04:07'),
(146, 'فيرون', 'Veron', 72, '2022-05-12 23:04:16', '2022-09-03 13:45:28'),
(147, 'ليلاند', NULL, 71, '2022-05-14 20:21:22', '2022-05-14 20:21:22'),
(148, 'أسترا', NULL, 70, '2022-05-14 20:22:10', '2022-05-14 20:22:10'),
(149, 'كاليبرا', NULL, 70, '2022-05-14 20:22:24', '2022-05-14 20:22:24'),
(150, 'كورسا', NULL, 70, '2022-05-14 20:22:32', '2022-05-14 20:22:32'),
(151, 'كاديت', NULL, 70, '2022-05-14 20:22:46', '2022-05-14 20:22:46'),
(152, 'أوميجا', NULL, 70, '2022-05-14 20:23:02', '2022-05-14 20:23:02'),
(153, 'سيجنوم', NULL, 70, '2022-05-14 20:23:18', '2022-05-14 20:23:18'),
(154, 'فيكترا', NULL, 70, '2022-05-14 20:23:29', '2022-05-14 20:23:29'),
(155, 'فيتا', NULL, 70, '2022-05-14 20:23:37', '2022-05-14 20:23:37'),
(156, '145', NULL, 69, '2022-05-14 20:27:15', '2022-05-14 20:27:15'),
(157, '146', NULL, 69, '2022-05-14 20:27:20', '2022-05-14 20:27:20'),
(158, '147', NULL, 69, '2022-05-14 20:27:28', '2022-05-14 20:27:28'),
(159, '156', NULL, 69, '2022-05-14 20:27:33', '2022-05-14 20:27:33'),
(160, '159', NULL, 69, '2022-05-14 20:27:40', '2022-05-14 20:27:56'),
(161, '166', NULL, 69, '2022-05-14 20:28:06', '2022-05-14 20:28:06'),
(162, 'بريرا', NULL, 69, '2022-05-14 20:28:21', '2022-05-14 20:28:21'),
(163, 'جي تي في', NULL, 69, '2022-05-14 20:28:36', '2022-05-14 20:28:36'),
(164, 'جي تي', NULL, 69, '2022-05-14 20:28:48', '2022-05-14 20:28:48'),
(165, 'ميتو', NULL, 69, '2022-05-14 20:28:57', '2022-05-14 20:28:57'),
(166, 'سبايدر', NULL, 69, '2022-05-14 20:29:05', '2022-05-14 20:29:05'),
(167, 'بلاك جاك', NULL, 68, '2022-05-14 20:29:38', '2022-05-14 20:29:38'),
(168, 'لاجونا', NULL, 68, '2022-05-14 20:29:49', '2022-05-14 20:29:49'),
(169, 'سبيدستر', NULL, 68, '2022-05-14 20:30:01', '2022-05-14 20:30:01'),
(170, 'فينس', NULL, 68, '2022-05-14 20:30:12', '2022-05-14 20:30:12'),
(171, 'كنج لونج', NULL, 67, '2022-05-14 20:30:51', '2022-05-14 20:30:51'),
(172, 'ادميرال', NULL, 66, '2022-05-14 20:31:22', '2022-05-14 20:31:22'),
(173, 'جراند تايجر', NULL, 66, '2022-05-14 20:31:31', '2022-05-14 20:31:31'),
(174, 'بونتياك', NULL, 65, '2022-05-14 20:32:06', '2022-05-14 20:32:06'),
(175, 'فاير بيرد', NULL, 65, '2022-05-14 20:32:13', '2022-05-14 20:32:13'),
(176, 'ترانز ام', NULL, 65, '2022-05-14 20:32:28', '2022-05-14 20:32:28');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gmail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `photo`, `name`, `job`, `facebook`, `twitter`, `gmail`, `created_at`, `updated_at`) VALUES
(1, 'assets/uploads/teams/35081662499615.webp', 'Member4', 'information systems', 'https://www.facebook.com/EngSahar100', NULL, 'mohamedSahar@gmail.com', '2022-03-19 19:13:02', '2022-09-06 19:28:45'),
(2, 'assets/uploads/teams/87921662499547.webp', 'Member3', 'Marketing Consultant', 'https://www.facebook.com/Ali120', 'https://www.twitter.com/ali', 'ali@gmail.com', '2022-03-19 20:09:23', '2022-09-06 19:28:37'),
(3, 'assets/uploads/teams/64461662499503.webp', 'Member2', 'mechanical engineer', 'https://www.facebook.com/Esraakhaled', NULL, 'esraa@gmail.com', '2022-03-19 20:16:32', '2022-09-06 19:28:30'),
(4, 'assets/uploads/teams/22271662499397.webp', 'Member1', 'examination specialist', 'https://www.facebook.com/Abaas22', NULL, NULL, '2022-03-19 20:17:10', '2022-09-06 19:28:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `photo`, `phone`, `latitude`, `longitude`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ahmed Yahya', 'ahmed@gmail.com', '$2y$10$r4APdO9rlyZV7TnTiATH/uca1gJMmIRkmegvafKL8FfvS51ppwCGq', 'site/img/avatar/avatar-6.jpg', '01098380656', NULL, NULL, '40eu2SgarNeMAs46n2oBbkw9sCDuhJpPlN1mFCTtvAGu23tfZqSwbTCqjlUc', '2022-09-17 14:00:19', '2022-09-17 14:00:19'),
(14, 'Ivory Garza', 'noru@mailinator.com', '$2y$10$Ag37My9M3UjhQjrezHl/y.lrnVKj6nI2ecgRigPLMz3fz9M1AQEkG', 'site/img/avatar/avatar-3.jpg', '0101548989', NULL, NULL, NULL, '2022-09-17 14:00:19', '2022-09-17 14:00:19'),
(15, 'Melanie Estrada', 'pebajuzem@mailinator.com', '$2y$10$3V3SyjXU08nMU0M3BBBWIe5/TxGd79h8.JKYIn/PG0qkjpTN/c8Rm', 'site/img/avatar/avatar-4.jpg', '010157987884', NULL, NULL, 'FpNWkCdZ97WqgQsPWtu4Wr6p0Hiha1ywh8LsqWysiylPPQqMdoONUIefe0Ie', '2022-09-17 14:00:19', '2022-09-17 14:00:19'),
(16, 'Ahmed yahya', 'ahmedtarekya100@gmail.com', '$2y$10$r4APdO9rlyZV7TnTiATH/uca1gJMmIRkmegvafKL8FfvS51ppwCGq', 'assets/uploads/users/55671664894795.jpg', '01098380656', 30.609314512873645, 30.987847443359648, NULL, '2022-09-17 14:00:19', '2022-10-08 22:48:41'),
(17, 'Mohamed Fawzy', 'mohamedfawz2010@gmail.com', '$2y$10$HMANE345oBwOY8JsBtUoHuHrxrmS3JH7Ry0tPnCzEzD6ArIxmKjU2', 'site/img/avatar/avatar-2.jpg', '010114454888', NULL, NULL, NULL, '2022-09-17 14:00:19', '2022-09-17 14:00:19'),
(18, 'Zeph Nolan', 'zihaboj@mailinator.com', '$2y$10$B8zLM0LPIM9PnimpbG0HXOCz0yDcDByXBTCs9TjGIe/bC9caXsKeG', 'site/img/avatar/avatar-1.jpg', '01098654785', NULL, NULL, NULL, '2022-09-22 15:28:46', '2022-09-22 15:28:46'),
(19, 'Ahmed Moh', 'ahmedtarek@gmail.com', '$2y$10$H3g8gl2cBtePe0GzIzFE2.h4AAs1zyidnf/5W174eT68QMWP6KUQO', NULL, '0101144788', NULL, NULL, NULL, '2022-09-22 21:12:10', '2022-09-22 21:12:10'),
(20, 'test', 'test@test.com', '$2y$10$ZTS9cJkFXHqhiQzdq738wOYj2itNhM6vHh8GWz2yvM/Nqduebp2CW', NULL, '01011827324', 30.60036227001104, 30.989434544457993, NULL, '2022-10-21 13:11:28', '2022-10-22 22:11:01');

-- --------------------------------------------------------

--
-- Table structure for table `user_addresses`
--

CREATE TABLE `user_addresses` (
  `id` int(20) NOT NULL,
  `address` text DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_addresses`
--

INSERT INTO `user_addresses` (`id`, `address`, `user_id`) VALUES
(19, 'Cario Nozha Street', 16),
(20, 'Cairo Ahmed Mohamed Street', 16),
(21, 'address test', 16),
(22, 'الرياض', 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cars_category_id_foreign` (`category_id`),
  ADD KEY `cars_sub_category_id_foreign` (`sub_category_id`),
  ADD KEY `cars_admins_fk` (`added_by`);

--
-- Indexes for table `car_data`
--
ALTER TABLE `car_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `car_data_car_id_foreign` (`car_id`);

--
-- Indexes for table `car_images`
--
ALTER TABLE `car_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `car_images_car_id_foreign` (`car_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `companies_email_unique` (`email`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_car_id_relation` (`car_id`),
  ADD KEY `fk_admin_or_compnay` (`admin_or_company_id`),
  ADD KEY `fk_city_id` (`city_id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id_relation` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `car_data`
--
ALTER TABLE `car_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `car_images`
--
ALTER TABLE `car_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=514;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_addresses`
--
ALTER TABLE `user_addresses`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_admins_fk` FOREIGN KEY (`added_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cars_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cars_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `car_data`
--
ALTER TABLE `car_data`
  ADD CONSTRAINT `car_data_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `car_images`
--
ALTER TABLE `car_images`
  ADD CONSTRAINT `car_images_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `fk_admin_or_compnay` FOREIGN KEY (`admin_or_company_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_car_id_relation` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_city_id` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD CONSTRAINT `fk_user_id_relation` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
