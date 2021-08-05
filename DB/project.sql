-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2020 at 09:06 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `advance_salaries`
--

CREATE TABLE `advance_salaries` (
  `id` int(10) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `month` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `advance_salary` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advance_salaries`
--

INSERT INTO `advance_salaries` (`id`, `employee_id`, `month`, `year`, `advance_salary`, `created_at`, `updated_at`) VALUES
(1, 15, 'June', '2020', '3000', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` int(10) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `att_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `att_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attendance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edit_date` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `employee_id`, `att_date`, `att_year`, `attendance`, `edit_date`, `month`, `created_at`, `updated_at`) VALUES
(26, 13, '05/06/20', '2020', 'Absent', '05_06_20', 'June', '2020-06-05 04:59:04', '2020-06-04 23:01:51'),
(27, 14, '05/06/20', '2020', 'Absent', '05_06_20', 'June', '2020-06-05 04:59:04', NULL),
(28, 13, '11/06/20', '2020', 'Present', '11_06_20', 'June', '2020-06-11 14:17:58', NULL),
(29, 14, '11/06/20', '2020', 'Present', '11_06_20', 'June', '2020-06-11 14:17:58', NULL),
(30, 15, '11/06/20', '2020', 'Present', '11_06_20', 'June', '2020-06-11 14:17:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categoris`
--

CREATE TABLE `categoris` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categoris`
--

INSERT INTO `categoris` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(2, 't-shirt', NULL, NULL),
(3, 'Hellp', NULL, NULL),
(4, 'Hello', NULL, NULL),
(7, 'MotorBike', '2020-06-07 14:03:32', NULL),
(8, 'Biscutes', '2020-08-05 14:32:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_account_holder` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_account_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_branch` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `nid_no`, `email`, `phone`, `address`, `photo`, `shop_name`, `bank_account_holder`, `bank_account_number`, `bank_name`, `bank_branch`, `city`, `created_at`, `updated_at`) VALUES
(2, 'Kishor Laskar', '1113553444', 'demo@gmail.com', '01302455402', 'Harinarayanpur,Kushtia', 'public/customer/d7rRwVu3RXOc0lav9TPZ.jpg', 'Kishor Garments', 'Asim Laskar', '541254566456', 'Sonali Bank', 'Sonali Bank,Harinarayanpur, Kushtia', 'Kushtia', '2020-05-15 18:10:55', NULL),
(3, 'Mr. Alex Hales', '675140212121', 'alexhales@gmail.com', '9522552222', 'Uttra', 'public/customer/BoOrOXRfUr6OCsJarwFC.png', 'Hales Mechanics', 'Alex Hales', 'alex-01254895', 'Markentail Bank', 'Motijheel Mian Branch', 'Dhaka', '2020-05-15 18:13:23', NULL),
(5, 'Jafor Ullah Sharafat', '26985214700', 'jaf@gmail.com', '01967591875', 'Shibpur,Kushtia', 'public/customer/42nArWY5r6ruulKuCcxn.jpg', 'Jafor Garments', 'Jafor Ullah', 'jaf-9998740jaf', 'Sonali Bank', 'kushtia', 'Kushtia', '2020-06-09 01:51:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vacation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `phone`, `address`, `nid_no`, `experience`, `photo`, `salary`, `city`, `vacation`, `created_at`, `updated_at`) VALUES
(13, 'Jeff Bezos', 'jeff@gmail.com', '03202465321', 'California,Amazaon -park', 'USA-01753520', '10 years', 'public/employee/QUBA6B0mr2vcSYCIBzTd.jpg', '1000000', 'California,USA', '20', NULL, NULL),
(14, 'Sundar Pechai', 'sundar.ceo@gmail.com', '0952052085', 'Google park,USA', 'usa-9887520', '11 years', 'public/employee/SuaoRDebImUiJKreNZHn.jpg', '500000', 'USA', '23 days', NULL, NULL),
(15, 'Shuly', 'shuly@gmail.com', '01967598871', 'Collage Gate , Kushtia', '3336699885544771100', '5 year', 'public/employee/93c9ue6Dc4JmQxgWS5KI.jpg', '200000', 'Kushtia', '10 days', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(10) UNSIGNED NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `details`, `amount`, `month`, `date`, `year`, `created_at`, `updated_at`) VALUES
(11, 'mobile:2000, hard-disc-cover:10', '2010', 'May', '21-05-20', '2020', '2020-05-21 07:36:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_05_10_150742_create_posts_table', 2),
(4, '2020_05_10_154227_create_posts_table', 3),
(5, '2020_05_14_143608_create_employees_table', 3),
(6, '2020_05_14_181328_create_employees_table', 4),
(7, '2020_05_15_160921_create_customers_table', 5),
(8, '2020_05_15_162230_create_customers_table', 6),
(9, '2020_05_15_184732_create_suppliers_table', 7),
(10, '2020_05_16_112300_create_salaries_table', 8),
(11, '2020_05_18_111802_create_categoris_table', 9),
(12, '2020_05_18_114016_create_advance_salaries_table', 9),
(13, '2020_05_18_114600_create_salaries_table', 10),
(14, '2020_05_19_220422_create_products_table', 11),
(15, '2020_05_20_094215_create_expenses_table', 12),
(16, '2020_05_26_103610_create_attendances_table', 13),
(17, '2020_06_06_043129_create_settings_table', 14),
(18, '2020_06_10_152416_create_orderdetails_table', 15),
(19, '2020_06_10_152717_create_order_table', 16),
(20, '2020_06_11_045032_create_orders_table', 17),
(21, '2020_06_17_111032_create_admins_table', 18);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unitcost` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`id`, `order_id`, `product_id`, `quantity`, `unitcost`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2', '20000', '48400', NULL, NULL),
(2, 2, 1, '1', '20000', '24200', NULL, NULL),
(3, 3, 5, '4', '105', '508.2', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_products` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pay` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `due` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `order_date`, `order_status`, `total_products`, `sub_total`, `vat`, `total`, `payment_status`, `pay`, `due`, `created_at`, `updated_at`) VALUES
(1, 2, '11/06/20', 'pending', '8', '44,200.00', '53,482.00', '53,482.00', 'Handcash', '45000', '8482', NULL, NULL),
(2, 2, '11/06/20', 'approved', '2', '20,700.00', '25,047.00', '25,047.00', 'Handcash', '20000', '5047', NULL, NULL),
(3, 5, '05/08/20', 'pending', '4', '420.00', '508.20', '508.20', 'Handcash', '508', '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('rkdiu95@gmail.com', '$2y$10$Ti5QGwVs4CnSMP8EA2pNw.b4/UIsUEHRep.i6u0BkRduTVugcro4e', '2020-06-17 04:34:10'),
('basicinventory2020@gmail.com', '$2y$10$H3g7SmHtZC7PuWhT/SnxQ.N.MWZHmDJFallAHeEJVTOjFoawJAtB.', '2020-06-17 05:08:07');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_skew` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_garage` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_route` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `production_date` date NOT NULL,
  `expire_date` date NOT NULL,
  `buying_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selling_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `supplier_id`, `product_code`, `product_name`, `product_image`, `product_skew`, `product_garage`, `product_route`, `production_date`, `expire_date`, `buying_price`, `selling_price`, `created_at`, `updated_at`) VALUES
(1, 3, 3, 'pro-1256', 'Samsung Galaxy A50', 'public/product/0QWuQ12cwQ8C68spgx4I.png', '10', 'GA', 'R1', '2020-05-20', '2020-05-06', '10500', '20000', '2020-05-20 06:22:15', NULL),
(3, 7, 4, 'pro-123', 'Piston', 'public/product/Umrm5Y4OWCZ30d4inT86.jpg', '10', 'C', '1', '2020-06-16', '2021-04-23', '500', '700', '2020-06-07 14:54:46', NULL),
(4, 7, 4, 'pro-123', 'Hemlok', 'public/product/Umrm5Y4OWCZ30d4inT86.jpg', '10', 'C', '1', '2020-06-16', '2021-04-23', '500', '700', '2020-06-07 08:59:59', '2020-06-07 08:59:59'),
(5, 8, 4, 'pro-001', 'Lexsus Biscutes', 'public/product/ZP2xHUg6pat7uLi7QQ99.jpg', '10', 'G-1', 'R-1', '2020-07-08', '2020-11-07', '100', '105', '2020-08-05 15:03:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `id` int(10) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `salary_month` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid_ammount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_license` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_zipcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `company_name`, `company_license`, `company_phone`, `company_email`, `company_address`, `company_logo`, `company_zipcode`, `company_city`, `company_country`, `created_at`, `updated_at`) VALUES
(1, 'Sotota Electronics', 'SOT-6854750581555', '0174985204', 'sototaelectronics@gmail.com', 'Mirpur-12,Dhaka', 'public/company/bKa4j8l4aWceHHJpPgvz.jpg', 'DHA-SOT-9875010', 'DHAKA', 'Bangladseh', '2020-06-07 03:44:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_account_holder` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_account_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_branch` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `email`, `phone`, `address`, `photo`, `type`, `shop_name`, `bank_account_holder`, `bank_account_number`, `bank_name`, `bank_branch`, `city`, `created_at`, `updated_at`) VALUES
(3, 'Leonel Messi', 'leo@gmail.com', '112563481212', '6D/A - Al pachio Barcelona', 'public/supplier/H8YPhZsbadEhXKQilgij.jpg', 'Distributor', 'Leo Club and Sports', 'Leo Messi', 'leo-101010', 'Spanish Baca Bank', 'sbb-main branch', 'Barcelona', NULL, NULL),
(4, 'Mr.Kishor Laskar', 'rkdiu95@gmail.com', '01768685475', '2/7 D-Block, Mirpur-1', 'public/supplier/zDZQuiYLlyOlmi6W9o53.jpg', 'Whole_Saler', 'Kishor Garments', 'Asim Laskar', '541254566456', 'Sonali Bank', 'Sonali Bank,Harinarayanpur, Kushtia', 'Dhaka', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Kishor Laskar', 'rkdiu95@gmail.com', '2ea3f1592ec2d6a4d5fffb7499bffc48', NULL, '2020-06-14 11:51:08', '2020-06-16 11:52:41'),
(2, 'Asim Laskar', 'asim2551@gmail.com', '$2y$10$m09Pqu48e/ugRSpHijvDj.S2XwCyC9ixjKubDf8Fzdt8XdvIHiKz6', 'mFr0XRlHEYLuoGjjh5PGSlLTQXGmKaFJfI7bdq9XlpY2OU6hZzW9DBqHG6UX', '2020-06-16 06:01:38', '2020-06-16 06:01:38'),
(3, 'Sonia', 'sania@yahoo.com', '$2y$10$DB4yAhZAYe8iJ8vlXlvSleQXWWHWWiHwxWd/I1iKWay6bYmdnvVfi', NULL, '2020-06-16 06:04:08', '2020-06-16 06:04:08'),
(4, 'Alex', 'engalex@gmail.com', '$2y$10$bCCyavOspiD7ZrCy0intBuIA98iPznHtMdiyy/s1z1RA2C5sD/sIi', 'oFgqeCy1UiQFocpcyqV35jryyol5enxj9az39DEe20mTvv5WLhHn1ZHJy5oU', '2020-06-16 08:10:59', '2020-06-16 08:10:59'),
(5, 'demo', 'demo123@gmail.com', '$2y$10$.AjIjhNLNKWPPJ2EaUM/o.OYJ16HQqlz8fA4Sm6XTWjw9vKbQPd/m', 'NZp1b1rsrbzs1dHzz8SLPp6zbTuHtbsTsSa9uJJ3ze5JUA0vQDxxvh1blfh0', '2020-06-17 03:46:27', '2020-06-17 03:46:27'),
(6, 'Basic Inventory', 'basicinventory2020@gmail.com', '$2y$10$4Bt5eZmoTZHuV/Xz5pyj7u//Jwe3NXHwqhA380VBI2XkyejX.3TOK', 'qbIJx6GohVcAmkdNd0oQU46liPeWBmMsDUMBFEMA9hSPRjArq3C81GrKzqRc', '2020-06-17 05:07:32', '2020-06-17 05:07:32'),
(7, 'Mr.demo', 'demo@gmail.com', '$2y$10$RbLLtsIBvuBCbaJcPkvGfOMVodSJE1zoAFzBzaWIFHGn0w6Gem7He', NULL, '2020-08-05 08:20:11', '2020-08-05 08:20:11'),
(8, 'demo', 'demo@yahoo.com', '$2y$10$vPvLol9tyx2zRmFC2j4.CuJteD6VlGnjyh.NoSuexPhp0ClGRgUtO', NULL, '2020-09-05 00:48:56', '2020-09-05 00:48:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advance_salaries`
--
ALTER TABLE `advance_salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categoris`
--
ALTER TABLE `categoris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_email_unique` (`email`),
  ADD UNIQUE KEY `employees_nid_no_unique` (`nid_no`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `suppliers_email_unique` (`email`),
  ADD UNIQUE KEY `suppliers_phone_unique` (`phone`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `advance_salaries`
--
ALTER TABLE `advance_salaries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `categoris`
--
ALTER TABLE `categoris`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
