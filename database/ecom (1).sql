-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2022 at 09:20 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@ecommerce.com', '$2y$10$kzuIL4ZifGOVnTyK59p7OeEh6DBuhN5OcqjeGzvyFox4JDoFK6PWm', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brandname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brandname`, `picture`, `created_at`, `updated_at`) VALUES
(2, 'Apple', '202209120934Apple-Logo.png', NULL, NULL),
(3, 'belkin', '202209120935Belkin-4459.png', NULL, NULL),
(4, 'kieslect', '202209120936kieslect-9551.jpg', NULL, NULL),
(5, 'CCA', '202209120936CCA-4439.jpg', NULL, NULL),
(6, 'QKZ', '202209120937Qkz-4701.png', NULL, NULL),
(7, 'REMAX', '202209120937Remax-3550.png', NULL, NULL),
(8, 'UiiSii', '202209120938UiiSii-1090.png', NULL, NULL),
(10, 'USAMS', '202209121001USAMS-7408.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `catagories`
--

CREATE TABLE `catagories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `catagoryname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `catagories`
--

INSERT INTO `catagories` (`id`, `catagoryname`, `picture`, `created_at`, `updated_at`) VALUES
(2, 'Power & Accessories', '20220911112501_Kategorie.png', NULL, NULL),
(4, 'Sound Equipment', '2022091204557vDbvnHRxjUQwLNhGXNWvh-1200-80.jpeg', NULL, NULL),
(5, 'Fitness & Wearable', '202209120456fit-tech-1-930x600.jpg', NULL, NULL),
(7, 'Cover & Glass', '202209150447istockphoto-1310474222-170667a.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `checkcoupons`
--

CREATE TABLE `checkcoupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `couponcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `checkcoupons`
--

INSERT INTO `checkcoupons` (`id`, `couponcode`, `userid`, `created_at`, `updated_at`) VALUES
(24, 'SDF456', '11', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `couponname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `couponcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_type`, `couponname`, `couponcode`, `Amount`, `created_at`, `updated_at`) VALUES
(1, 'Percentage', 'Supersummer', 'SMSUM34', '20', NULL, '2022-10-26 02:52:36'),
(3, 'fixed', 'SuperOffer', 'SDF456', '100', NULL, NULL);

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
-- Table structure for table `footers`
--

CREATE TABLE `footers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footers`
--

INSERT INTO `footers` (`id`, `phone`, `email`, `address`, `facebook`, `twitter`, `linkedin`, `logo`, `created_at`, `updated_at`) VALUES
(1, '01712532864', 'admin@palcreativeltd.com', '26/2 Juginagar len wari,Dhaka-1203', 'https://www.facebook.com/palcreativeltd', 'https://twitter.com/login', 'https://www.linkedin.com/in/amit-paul-334609255/', 'pal.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `headers`
--

CREATE TABLE `headers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `heading` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `headers`
--

INSERT INTO `headers` (`id`, `title`, `heading`, `phone`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'Pal Creative Ecommerce', 'Welcome to Pal Creative Ecommerce.', '01712532864', 'pal.png', NULL, '2022-11-14 22:21:06');

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
(4, '2022_09_11_093829_create_admins_table', 2),
(5, '2022_09_11_104429_create_catagories_table', 3),
(6, '2022_09_12_051407_create_subcatagories_table', 4),
(7, '2022_09_12_071952_create_brands_table', 5),
(8, '2022_09_12_103136_create_products_table', 6),
(9, '2022_09_13_105022_create_products_table', 7),
(10, '2022_09_21_055641_create_coupons_table', 8),
(11, '2022_09_21_101043_create_checkcoupons_table', 9),
(12, '2022_09_26_074201_create_orders_table', 10),
(13, '2022_09_26_074223_create_ordersdetails_table', 10),
(14, '2022_09_26_074241_create_shippings_table', 10),
(15, '2022_11_03_090219_create_whishlists_table', 11),
(16, '2022_11_13_092238_create_sliders_table', 12),
(17, '2022_11_14_100516_create_headers_table', 13),
(18, '2022_11_14_100535_create_footers_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtotal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bln_trt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `return_order` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `day`, `month`, `year`, `userid`, `Payment_method`, `subtotal`, `order_id`, `invoice`, `number`, `bln_trt`, `status`, `return_order`, `created_at`, `updated_at`) VALUES
(19, '01', '10', '2022', '11', 'Stripe', '550', '5650', '9955', NULL, 'txn_3LnyYcDUaTzTHHe50HzrwhtD', '3', '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ordersdetails`
--

CREATE TABLE `ordersdetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Single_Price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Totla_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ordersdetails`
--

INSERT INTO `ordersdetails` (`id`, `order_id`, `invoice`, `product_id`, `product_Name`, `Qty`, `Single_Price`, `Totla_price`, `created_at`, `updated_at`) VALUES
(19, '5650', '9955', '26', 'WiWU Aqua Waterproof Bag', '1', '550', '550', NULL, NULL);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `catagoryid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcatagoryid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brandid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `productname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productsize` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_colour` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discountprice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `productimage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shortd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bestseller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hot_deal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sales` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lproduct` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bweek` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `popular` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `catagoryid`, `subcatagoryid`, `brandid`, `productname`, `product_code`, `productsize`, `product_colour`, `qty`, `price`, `discountprice`, `productimage`, `image2`, `image3`, `shortd`, `longd`, `bestseller`, `hot_deal`, `sales`, `lproduct`, `bweek`, `popular`, `created_at`, `updated_at`) VALUES
(1, '2', '2', '3', 'Belkin Boostup Charge USB-A 12W EU Wall Charger', '4119065', '75gm', 'White', '10', '1600', '1450', '2022091310582748-66239.jpg', '2022091310582748-47273.jpg', '2022091310582748-88360.jpg', NULL, NULL, '1', '1', NULL, NULL, NULL, NULL, NULL, '2022-09-14 02:49:36'),
(2, '2', '1', '2', 'Apple 61W USB-C Power Adapter With USB-C Charge Cable - 2m', '6451983', '75gm', 'White', '06', '4000', '3500', '2022091409303379-17972.jpg', '2022091409303379-69386.jpg', '2022091409303379-18031.jpg', NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL),
(3, '2', '1', '4', 'kieslect Super Si Quick Charger 1C CN 25 Watt', '3948650', '25gm', 'Black', '10', '1100', NULL, '2022091409364183-85748.jpg', '2022091409364183-22603.jpg', '2022091409364183-92870.jpg', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL),
(5, '2', '2', '3', 'belkin Elf Digital Display Fast Charge Power Bank 10000mAh 22.5W', '8686646', '225 gm', 'Purple', '10', '2200', NULL, '202209140954Baseus-Elf-Digital-Display-Fast-Charge-Power-Bank-10000mAh-22.5W-c-5775.jpg', '202209140954Baseus-Elf-Digital-Display-Fast-Charge-Power-Bank-10000mAh-22.5W-a-5512.jpg', '202209140954Baseus-Elf-Digital-Display-Fast-Charge-Power-Bank-10000mAh-22.5W-d-9357.jpg', NULL, NULL, NULL, '1', NULL, NULL, '1', NULL, NULL, NULL),
(6, '2', '2', '5', 'Anker PowerCore Select 10000mAh', '3184128', '150 gm', 'Black', '10', '2400', NULL, '2022091409582126-63931.jpg', '2022091409582126-82106.jpg', '2022091409582126-17158.jpg', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL),
(7, '2', '3', '5', 'WiWU Power Air 4 in 1 Wireless Charger M8 15W', '2173141', '125 gm', 'Black', '06', '2850', NULL, '2022091409594003-12036.jpg', '2022091409594003-42699.jpg', '2022091409594003-89601.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
(8, '2', '3', '6', 'MF500 3 in 1 18W Fast Charging Stand Wireless Charger', '5039921', '125 gm', 'Sliver', '10', '4300', '4100', '2022091410204326-30257.jpg', '2022091410204326-57041.jpg', '2022091410204326-65001.jpg', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, '2', '3', '7', 'Momax Q.Pad 5 15W Fast Wireless Charger UD13', '952732', '75gm', 'Black', '10', '2900', NULL, '2022091410223608-56840.jpg', '2022091410223608-90144.jpg', '2022091410223608-80253.jpg', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL),
(10, '4', '5', '3', 'Hoco W100 Touring Gaming Headphones', '5810631', NULL, 'Black', '10', '2000', NULL, '2022091410595374-28832.jpg', '2022091410595374-75328.jpg', '2022091410595374-24414.jpg', NULL, NULL, '1', '1', NULL, NULL, NULL, NULL, NULL, NULL),
(11, '4', '5', '5', 'Skullcandy Cassette Wireless On-Ear Headphones', '7056264', '125 gm', 'Grey', '5', '3200', '3100', '202209141105Chill_Grey_b-4465.jpg', '202209141105Black_b-3156.jpg', NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL),
(12, '4', '5', '10', 'Usams YX05 Wireless headphone E-Join Series', '5427923', '225 gm', 'Black', '10', '2500', NULL, '2022091411063359-35890.jpg', '2022091411063359-44694.jpg', '2022091411063359-53456.jpg', NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL),
(13, '4', '6', '8', 'UiiSii Wired Earphones HM13', '9748993', NULL, 'Black', '10', '550', NULL, '2022091411101802-29473.jpg', '2022091411101802-55154.jpg', '2022091411101802-62357.jpg', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL),
(14, '4', '6', '2', 'Apple EarPods with 3.5mm Headphone Plug', '7172878', '25gm', 'White', '10', '1300', NULL, '2022091411171510-21919.jpg', '2022091411171510-74948.jpg', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL),
(15, '4', '6', '3', 'Belkin RockStar In-Ear Headphones with USB Type-C Connector', '4595470', '25gm', 'Black', '10', '3500', NULL, '2022091411182430-39467.jpg', '2022091411181802-55154.jpg', '2022091411181802-29473.jpg', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL),
(16, '4', '7', '5', 'Hoco HC9 True Wireless Speaker', '7854919', '125 gm', 'Black', '10', '1800', NULL, '2022091411205194-88379.jpg', '2022091411205194-23413.jpg', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, '4', '7', '6', 'oraimo SoundPro-2C 10W Portable Wireless Bluetooth Speaker', '3367721', '125 gm', 'Black', '10', '1650', NULL, '2022091411233439-22974.jpg', '2022091411233439-27618.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL),
(18, '4', '7', '8', 'Awei Y280 Portable Outdoor Wireless Speakers', '736277', '25gm', 'Black', '10', '2800', NULL, '2022091411265029-61042.jpg', '2022091411263439-27618.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, NULL),
(19, '5', '8', '5', 'Honor Band 5', '3207318', '225 gm', 'Black', '10', '2450', NULL, '2022091504521646-10854.jpg', '2022091504521646-25825.jpg', '2022091504521646-40017.jpg', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, '5', '8', '3', 'belkin Band', '6684167', NULL, 'Black', '06', '1700', NULL, '2022091504543078-36874.jpg', '2022091504543078-80707.jpg', '2022091504543078-87100.jpg', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL),
(21, '5', '8', '4', 'Fitbit Versa 2 Smart Watch', '8082035', NULL, 'Black', '10', '5500', NULL, '2022091504562645-51688.jpg', '2022091504562645-51688.jpg', '2022091504562645-26639.jpg', NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL),
(22, '5', '9', '4', 'Zeblaze Smart Watch Neo 3', '7235170', NULL, 'Black', '5', '2350', NULL, '2022091504581628-77244.jpg', '2022091504581628-25010.jpg', '2022091504581628-25003.jpg', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL),
(23, '5', '9', '6', 'Wavefun Aidig S Smart Watch', '9951674', NULL, 'Black', '10', '1850', NULL, '202209150500Wavefun-Aidig-S-Smart-Watch-a-5571.jpg', '202209150500Wavefun-Aidig-S-Smart-Watch-b-2904.jpg', '202209150500Wavefun-Aidig-S-Smart-Watch-c-8066.jpg', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL),
(24, '5', '9', '6', 'Galaxy Watch Active2 Stainless Steel', '4745008', NULL, 'Black', '06', '3400', '3100', '2022091505025300-81776.jpg', '2022091505025300-10196.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL),
(25, '5', '10', '3', 'Dr. Bei Pasteur Toothbrush Bamboo Clean Edition 4 Sticks', '1164358', NULL, 'White', '30', '100', NULL, '202209150503Dr.-Bei-Pasteur-Toothbrush-Bamboo-Clean-Edition-4-Sticks-a-7499.jpg', '202209150503Dr.-Bei-Pasteur-Toothbrush-Bamboo-Clean-Edition-4-Sticks-b-7697.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
(26, '7', '14', '10', 'WiWU Aqua Waterproof Bag', '6618664', NULL, NULL, '10', '850', '550', '2022091505095410-20749.jpg', '2022091505095410-80418.jpg', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `orederid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `county` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `town` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `orederid`, `fname`, `lname`, `county`, `address`, `address2`, `town`, `state`, `zip`, `phone`, `email`, `payment`, `created_at`, `updated_at`) VALUES
(7, '4384', 'Anik', 'Saha', 'Mirpur', '32 Mirpur Sdk len', 'aa', 'Mirpur', 'Dhaka', '1123', '0286733833', 'anik.saha@gmail.com', 'bkash', NULL, NULL),
(8, '5109', 'Amit', 'Paul', 'Bogura', 'adfdd', 'aa', 'Bogura', 'Dhaka', '5840', '0286733833', 'chondro.pal@gmail.com', 'rocket', NULL, NULL),
(9, '8602', 'Amit', 'Paul', 'us', 'adfdd', 'aa', 'Bogura', 'Dhaka', '5840', '0286733833', 'admin@ums.com', 'cod', NULL, NULL),
(10, '5650', 'Amit', 'Paul', 'Bogura', '32 Mirpur Sdk len', 'aa', 'Bogura', 'Dhaka', '5840', '0286733833', 'chondro.pal@gmail.com', 'Stripe', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `smallheading` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `heading`, `smallheading`, `image`, `link`, `created_at`, `updated_at`) VALUES
(2, 'New Collection Fitness & Wearable', 'Start With Affordable Price', '2022111405381.jpg', '5', NULL, '2022-11-14 02:29:25'),
(3, 'Huge Collection of Power & Accessories', 'Start With Affordable Price in Dhaka', '2022111408291-floating.png', '2', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subcatagories`
--

CREATE TABLE `subcatagories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cata_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcatagory` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcatagories`
--

INSERT INTO `subcatagories` (`id`, `cata_id`, `subcatagory`, `created_at`, `updated_at`) VALUES
(1, '2', 'Power Adapter', NULL, NULL),
(2, '2', 'Power Bank', NULL, NULL),
(3, '2', 'Wireless Charger', NULL, NULL),
(5, '4', 'Overhead Headphones', NULL, NULL),
(6, '4', 'Wired Headphone', NULL, NULL),
(7, '4', 'Speakers', NULL, NULL),
(8, '5', 'Fitness Tracker', NULL, NULL),
(9, '5', 'Smart Watch', NULL, NULL),
(10, '5', 'Health & Lifestyle', NULL, NULL),
(11, '6', 'Health & Lifestyle', NULL, NULL),
(12, '6', 'Phone Screen Protector', NULL, NULL),
(13, '6', 'Airpods Case', NULL, NULL),
(14, '7', 'Cover', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `provider`, `provider_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(8, 'Sabuj Basak', 'sabuj.islam@beximco.com', '2022-09-19 22:01:43', '$2y$10$mTfi4Ddt0EFYLZOWIE8ikO2LNKnLr1xYx90x6UANJnn7slAShNK8.', '', '', NULL, '2022-09-19 22:01:25', '2022-09-19 22:01:43'),
(10, 'Sagar Paul', 'sagar.paul9@gmail.com', '2022-09-20 22:00:06', '$2y$10$jjjyIN/Fg4.BDymA0DRNS.Rlayd.R3T.d1MYjlc/5gSFkCWtyKKPa', NULL, NULL, NULL, '2022-09-20 21:59:32', '2022-09-20 22:00:06'),
(11, 'chondro pal', 'chondro.pal@gmail.com', '2022-09-20 23:14:12', 'eyJpdiI6IktkZ2JIVjFpQXc0b1l4enk4dUFzOWc9PSIsInZhbHVlIjoieHNjbGRGYWlwc2tETEFBRDU3R3Q5enFpcG9SZldVb3drOVdWOHQ3eTFzST0iLCJtYWMiOiJhNjZkODBhOWI1YWM2ZmJmYTdiZjM0YmJjMzM2NDE2MGJhMjQ4NmZiOTNlM2Y5MTA4YTY0NWEwNTlmMmU3Mjc2IiwidGFnIjoiIn0=', 'google', '103662732995752090518', NULL, '2022-09-20 22:59:40', '2022-09-20 23:14:12'),
(12, 'Amit Paul', 'chondrosssss.pal@gmail.com', '2022-09-20 23:39:19', '$2y$10$GZIEkKlPVbDTtQ0qYZeXBO2g7Bj8o.ECksOVZlIF9nfgL7b5n3fi6', NULL, NULL, NULL, '2022-09-20 23:38:28', '2022-09-20 23:39:19'),
(13, 'bap', 'bap4@gmail.com', NULL, '$2y$10$G0rbqNBsqcrdOd6tiqTfsOg4WDgo0kOaZca1HRLmWuYp78UB4N07i', NULL, NULL, NULL, '2022-11-05 11:54:06', '2022-11-05 11:54:06');

-- --------------------------------------------------------

--
-- Table structure for table `whishlists`
--

CREATE TABLE `whishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `whishlists`
--

INSERT INTO `whishlists` (`id`, `userid`, `productid`, `created_at`, `updated_at`) VALUES
(8, '11', '16', NULL, NULL),
(10, '11', '26', NULL, NULL);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `catagories`
--
ALTER TABLE `catagories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkcoupons`
--
ALTER TABLE `checkcoupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `footers`
--
ALTER TABLE `footers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `headers`
--
ALTER TABLE `headers`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `ordersdetails`
--
ALTER TABLE `ordersdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcatagories`
--
ALTER TABLE `subcatagories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `whishlists`
--
ALTER TABLE `whishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `catagories`
--
ALTER TABLE `catagories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `checkcoupons`
--
ALTER TABLE `checkcoupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `footers`
--
ALTER TABLE `footers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `headers`
--
ALTER TABLE `headers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `ordersdetails`
--
ALTER TABLE `ordersdetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subcatagories`
--
ALTER TABLE `subcatagories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `whishlists`
--
ALTER TABLE `whishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
