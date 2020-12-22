-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2020 at 03:26 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_inventory_managment_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `advance_salaries`
--

CREATE TABLE `advance_salaries` (
  `id` int(10) UNSIGNED NOT NULL,
  `emp_id` int(11) NOT NULL,
  `month` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `advanced_salary` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advance_salaries`
--

INSERT INTO `advance_salaries` (`id`, `emp_id`, `month`, `year`, `status`, `advanced_salary`, `created_at`, `updated_at`) VALUES
(1, 1, 'July', '2020', '0', '8000', '2020-08-16 07:38:01', '2020-08-16 07:38:01'),
(3, 1, 'June', '2020', '0', '8000', '2020-08-17 18:20:30', '2020-08-17 18:20:30'),
(4, 4, 'July', '2020', '0', '4000', '2020-08-17 18:30:50', '2020-08-17 18:30:50'),
(5, 3, 'June', '2020', '0', '4000', '2020-08-17 19:12:37', '2020-08-17 19:12:37'),
(6, 3, 'September', '2020', '0', '2000', '2020-08-17 20:26:43', '2020-08-17 20:26:43');

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `att_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `att_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attendance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edit_date` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `user_id`, `att_date`, `att_year`, `attendance`, `month`, `edit_date`, `created_at`, `updated_at`) VALUES
(5, 1, '28/08/20', '2020', 'Present', NULL, '28_08_20', NULL, '2020-08-28 09:21:49'),
(6, 3, '28/08/20', '2020', 'Absent', NULL, '28_08_20', NULL, '2020-08-28 10:10:33'),
(7, 4, '28/08/20', '2020', 'Present', NULL, '28_08_20', NULL, '2020-08-28 09:21:49'),
(8, 5, '28/08/20', '2020', 'Present', NULL, '28_08_20', NULL, '2020-08-28 09:21:49'),
(9, 1, '30/08/20', '2020', 'Present', 'August', '30_08_20', NULL, NULL),
(10, 3, '30/08/20', '2020', 'Present', 'August', '30_08_20', NULL, NULL),
(11, 4, '30/08/20', '2020', 'Present', 'August', '30_08_20', NULL, NULL),
(12, 5, '30/08/20', '2020', 'Present', 'August', '30_08_20', NULL, NULL),
(13, 1, '13/09/20', '2020', 'Present', 'September', '13_09_20', NULL, NULL),
(14, 3, '13/09/20', '2020', 'Absent', 'September', '13_09_20', NULL, NULL),
(15, 4, '13/09/20', '2020', 'Present', 'September', '13_09_20', NULL, NULL),
(16, 5, '13/09/20', '2020', 'Present', 'September', '13_09_20', NULL, NULL),
(17, 1, '21/12/20', '2020', 'Present', 'December', '21_12_20', NULL, NULL),
(18, 3, '21/12/20', '2020', 'Absent', 'December', '21_12_20', NULL, NULL),
(19, 4, '21/12/20', '2020', 'Present', 'December', '21_12_20', NULL, NULL),
(20, 5, '21/12/20', '2020', 'Present', 'December', '21_12_20', NULL, NULL),
(21, 6, '21/12/20', '2020', 'Present', 'December', '21_12_20', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `cat_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`, `created_at`, `updated_at`) VALUES
(1, 'Electronic Device', '2020-08-18 17:06:42', '2020-08-18 17:06:42'),
(2, 'Health & Beauty', '2020-08-18 17:07:15', '2020-08-18 17:07:15'),
(3, 'Men\'s Fashion', '2020-08-18 17:07:36', '2020-08-18 17:07:36'),
(4, 'Home & Lifestyle', '2020-08-18 17:07:46', '2020-08-18 17:07:46'),
(7, 'TV & Home Appliances', '2020-08-18 18:38:13', '2020-08-18 18:38:13'),
(8, 'Women\'s Fashion', '2020-12-21 03:40:04', '2020-12-21 03:40:04'),
(9, 'Sports & Outdoor', '2020-12-21 03:40:54', '2020-12-21 03:40:54'),
(10, 'Watches', '2020-12-21 03:50:08', '2020-12-21 03:50:08'),
(11, 'Babies & Toys', '2020-12-21 03:50:39', '2020-12-21 03:50:39');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shopname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_holder` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_branch` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `address`, `shopname`, `photo`, `account_holder`, `account_number`, `bank_name`, `bank_branch`, `city`, `created_at`, `updated_at`) VALUES
(2, 'Rahim Rahman', 'rahim@gmail.com', '01345678334', 'Dhaka', 'Mottor House', 'public/customers/1674718858207605.jpg', 'Shimul', '1234', 'Islami', 'Dhaka', 'Dhaka', '2020-08-10 10:03:57', '2020-08-10 10:03:57'),
(8, 'Shimul Islam', 'khan@gmail.com', '01226789123', 'sylhet', 'new', 'public/customers/1686659548074627.png', 'Shimul', '1234577', 'Islami', 'Sylhet', 'Dhaka', '2020-08-11 08:37:14', '2020-08-11 08:37:14'),
(9, 'Souvik', 'ahmed@gmail.com', '0156789123', 'sylhet', 'Mitaly', 'public/customers/1686659612612333.png', 'Shimul', '1234', 'Islami', 'Dhaka', 'sylhet', '2020-09-01 15:52:05', '2020-09-01 15:52:05'),
(10, 'Naeem Khan', 'sohidulislam@gmail.com', '01567891235', 'Chittagong', 'Mottor House', 'public/customers/1686659590468719.png', 'Shimul', '12345746', 'Islami', 'Sylhet', 'Commila', '2020-09-01 19:15:01', '2020-09-01 19:15:01'),
(11, 'Mark Bucher', 'baucher@gmail.com', '01567891234', 'Chittagong', 'Mottor House', 'public/customers/1686659525726162.png', 'Shimul', '123445', 'Islami', 'Sylhet', 'Commila', '2020-09-01 19:25:18', '2020-09-01 19:25:18');

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
  `experience` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vacation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `phone`, `address`, `experience`, `photo`, `nid`, `salary`, `vacation`, `city`, `created_at`, `updated_at`) VALUES
(1, 'Md. Naeem Uddin', 'naeem@gmail.com', '1234567890', 'sylhet', '12 years', 'public/employee/1686658724682244.png', '1234', '12000', '10', 'Dhaka', '2020-08-09 11:34:59', '2020-08-09 11:34:59'),
(3, 'Shimul Ahmed', 'khan@gmail.com', '0173345567', 'Dhaka', '10 years', 'public/employee/1674628048316390.jpg', '1234', '12000', '10', 'Dhaka', '2020-08-09 21:06:07', '2020-08-09 21:06:07'),
(4, 'Saifur Rahman Rasel', 'rasel@gmail.com', '01226789123', 'Dhaka', '10 years', 'public/employee/1686658603234084.png', '123', '15000', '10', 'Dhaka', '2020-08-10 08:54:59', '2020-08-10 08:54:59'),
(5, 'Souvik Halder', 'sohidulislam@gmail.com', '1234567890', 'sylhet', '10 years', 'public/employee/1686658816177800.jpg', '12347', '10000', '15', 'sylhet', '2020-08-17 19:45:26', '2020-08-17 19:45:26'),
(6, 'Tamim Iqbal', 'tamim@gmail.com', '0123456789', 'Kulaura', '13 Years', 'public/employee/1686659035269929.jpg', '2162', '12000', '12', 'Sylhet', '2020-12-21 04:03:22', '2020-12-21 04:03:22');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(10) UNSIGNED NOT NULL,
  `details` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `details`, `amount`, `month`, `date`, `year`, `created_at`, `updated_at`) VALUES
(1, 'employee salary', '19000', 'August', '23/08/20', '2020', '2020-08-23 19:18:38', '2020-08-23 19:18:38'),
(4, 'mouse buy', '30', 'August', '23/08/20', '2020', '2020-08-23 19:21:03', '2020-08-23 19:21:03'),
(7, 'eating', '180', 'August', '23/08/20', '2019', '2020-08-23 19:21:36', '2020-08-23 19:21:36'),
(8, 'Guest', '200', 'August', '23/08/20', '2020', '2020-08-23 19:34:04', '2020-08-23 19:34:04'),
(9, 'rant fees', '2000', 'August', '24/08/20', '2020', '2020-08-24 07:19:55', '2020-08-24 07:19:55'),
(10, 'transport bill Electiciey', '950', 'December', '25/08/20', '2020', '2020-08-25 07:43:43', '2020-08-25 07:43:43'),
(11, 'Working', '500', 'August', '25/08/20', '2020', '2020-08-25 17:24:09', '2020-08-25 17:24:09'),
(12, 'transport bill', '20,000', 'September', '13/09/20', '2020', '2020-09-13 08:45:02', '2020-09-13 08:45:02'),
(13, 'transport bill', '500', 'October', '02/10/20', '2020', '2020-10-02 16:04:25', '2020-10-02 16:04:25'),
(14, 'Tea', '120TK', 'December', '21/12/20', '2020', '2020-12-21 05:13:37', '2020-12-21 05:13:37');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_07_28_194610_create_posts_table', 2),
(5, '2020_08_08_194751_create_employees_table', 3),
(6, '2020_08_10_085857_create_customers_table', 4),
(7, '2020_08_11_090254_create_suppliers_table', 5),
(8, '2020_08_16_060042_create_salaries_table', 6),
(9, '2020_08_17_191200_create_salaryes_table', 7),
(10, '2020_08_18_162936_create_categories_table', 8),
(11, '2020_08_18_190112_create_products_table', 9),
(12, '2020_08_23_185036_create_expenses_table', 10),
(13, '2020_08_26_151323_create_attendances_table', 11),
(14, '2020_08_28_163734_create_settings_table', 12),
(15, '2020_10_01_081923_create_orders_table', 13),
(16, '2020_10_01_082116_create_ordersdetails_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
(1, 2, '01/10/20', 'success', '4', '7,600.00', '1,596.00', '9,196.00', 'HandKash', '9196.00', '0.00', NULL, NULL),
(2, 2, '02/10/20', 'success', '2', '3,000.00', '630.00', '3,630.00', 'Cheque', '3600.00', '30.00', NULL, NULL),
(3, 8, '02/10/20', 'success', '2', '4,200.00', '882.00', '5,082.00', 'HandKash', '4000.00', '1082.00', NULL, NULL),
(4, 9, '11/12/20', 'success', '1', '2,500.00', '525.00', '3,025.00', 'Cheque', '3025', '12-12-1222', NULL, NULL),
(5, 8, '21/12/20', 'success', '2', '3,800.00', '798.00', '4,598.00', 'Cheque', '4598', '0', NULL, NULL),
(6, 9, '21/12/20', 'success', '2', '5,000.00', '1,050.00', '6,050.00', 'HandKash', '3025', '0', NULL, NULL),
(7, 9, '21/12/20', 'pending', '1', '2,500.00', '525.00', '3,025.00', 'Cheque', '3025', '0', NULL, NULL),
(8, 10, '21/12/20', 'success', '2', '2,800.00', '588.00', '3,388.00', 'HandKash', '3025', '0', NULL, NULL),
(9, 2, '21/12/20', 'pending', '3', '6,300.00', '1,323.00', '7,623.00', 'HandKash', '3025', '0', NULL, NULL),
(10, 2, '21/12/20', 'pending', '3', '6,300.00', '1,323.00', '7,623.00', 'Cheque', '3025', '0', NULL, NULL),
(11, 2, '21/12/20', 'pending', '5', '8,500.00', '1,785.00', '10,285.00', 'Cheque', '3025', '0', NULL, NULL),
(12, 2, '21/12/20', 'pending', '4', '9,000.00', '1,890.00', '10,890.00', 'Cheque', NULL, NULL, NULL, NULL),
(13, 2, '21/12/20', 'pending', '2', '3,800.00', '798.00', '4,598.00', 'Cheque', '4598.00', '0.00', NULL, NULL),
(14, 11, '21/12/20', 'pending', '1', '1,300.00', '273.00', '1,573.00', 'Cheque', '3025', '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ordersdetails`
--

CREATE TABLE `ordersdetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unicost` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ordersdetails`
--

INSERT INTO `ordersdetails` (`id`, `order_id`, `product_id`, `quantity`, `unicost`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 21, '2', '1300', '3146.00', NULL, NULL),
(2, 1, 7, '2', '2500', '6050.00', NULL, NULL),
(3, 2, 21, '1', '1300', '1573.00', NULL, NULL),
(4, 2, 22, '1', '1700', '2057.00', NULL, NULL),
(5, 3, 22, '1', '1700', '2057.00', NULL, NULL),
(6, 3, 23, '1', '2500', '3025.00', NULL, NULL),
(7, 4, 7, '1', '2500', '3025.00', NULL, NULL),
(8, 5, 21, '1', '1300', '1573.00', NULL, NULL),
(9, 5, 25, '1', '2500', '3025.00', NULL, NULL),
(10, 6, 7, '2', '2500', '6050.00', NULL, NULL),
(11, 7, 7, '1', '2500', '3025.00', NULL, NULL),
(12, 8, 21, '1', '1300', '1573.00', NULL, NULL),
(13, 8, 24, '1', '1500', '1815.00', NULL, NULL),
(14, 9, 7, '2', '2500', '6050.00', NULL, NULL),
(15, 9, 21, '1', '1300', '1573.00', NULL, NULL),
(16, 10, 7, '2', '2500', '6050.00', NULL, NULL),
(17, 10, 21, '1', '1300', '1573.00', NULL, NULL),
(18, 11, 24, '2', '1500', '3630.00', NULL, NULL),
(19, 11, 22, '1', '1700', '2057.00', NULL, NULL),
(20, 11, 7, '1', '2500', '3025.00', NULL, NULL),
(21, 11, 21, '1', '1300', '1573.00', NULL, NULL),
(22, 12, 7, '1', '2500', '3025.00', NULL, NULL),
(23, 12, 24, '1', '1500', '1815.00', NULL, NULL),
(24, 12, 23, '1', '2500', '3025.00', NULL, NULL),
(25, 12, 25, '1', '2500', '3025.00', NULL, NULL),
(26, 13, 7, '1', '2500', '3025.00', NULL, NULL),
(27, 13, 21, '1', '1300', '1573.00', NULL, NULL),
(28, 14, 21, '1', '1300', '1573.00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `author`, `details`, `created_at`, `updated_at`) VALUES
(5, 'Campus', 'Karim', 'how can we insert or add data into Mysql table by using Ajax in Laravel ... file we have write html code for add new data button and bootstrap modal. ... event like when we have click on add button and submit form data event.', '2020-07-29 03:38:51', '2020-07-29 15:56:47'),
(7, 'Vice Chancellor', 'Rasel', 'how can we insert or add data into Mysql table by using Ajax in Laravel ... file we have write html code for add new data button and bootstrap modal', '2020-07-29 03:59:43', '2020-07-29 03:59:43'),
(8, 'City Campus', 'javascript', 'how can we insert or add data into Mysql table by using Ajax in Laravel ... file we have write html code for add new data button and bootstrap modal', '2020-07-29 04:01:15', '2020-07-29 04:01:15'),
(20, 'City Campus', 'ahmed', 'laravel bangla full course inventory project', '2020-07-29 16:07:34', '2020-07-29 16:07:34');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sup_id` int(11) NOT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_garage` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_route` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buy_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expire_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buying_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selling_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `cat_id`, `sup_id`, `product_code`, `product_garage`, `product_route`, `product_image`, `buy_date`, `expire_date`, `buying_price`, `selling_price`, `created_at`, `updated_at`) VALUES
(7, 'Man\'s  Watch', 3, 3, 'W-22', '42K', 'Dhaka', 'public/product/1679452943902181.jpg', '2020-08-31', '2020-09-02', '2300', '2500', '2020-08-31 07:32:34', '2020-08-31 07:32:34'),
(21, 'Woman\'s Bag', 8, 4, 'W-2222', '42D', 'Dhaka', 'public/product/1679453011950136.jpg', '2020-08-21', '2020-08-29', '1200', '1300', '2020-08-31 02:07:50', '2020-08-31 02:07:50'),
(22, 'Woman\'s Shoes', 8, 4, 'W-20', '42C', 'Dhaka', 'public/product/1679452992502585.jpg', '2020-08-22', '2020-08-29', '1200', '1700', '2020-08-31 02:07:50', '2020-08-31 02:07:50'),
(23, 'Woman\'s  Watch', 8, 4, 'W-222', '42K', 'Dhaka', 'public/product/1676661066481518.jpg', '2020-09-01', '2020-09-23', '2300', '2500', '2020-09-01 19:29:56', '2020-09-01 19:29:56'),
(24, 'Children Toys', 11, 3, 'w-2120', '42D', 'Sylhet', 'public/product/1686660828461035.jfif', '2020-10-02', '2020-10-30', '1200', '1500', '2020-10-02 15:04:43', '2020-10-02 15:04:43'),
(25, 'Man Shoes', 3, 4, 'W-20', '42K', 'Dhaka', 'public/product/1679453130642791.jpg', '2020-10-01', '2020-10-16', '2300', '2500', '2020-10-02 15:08:36', '2020-10-02 15:08:36'),
(26, 'Mobile', 8, 3, '12345', 'Block D', 'Indoor', 'public/product/1686656846172074.jpg', '2020-12-19', '2020-12-24', '1200', '1400', '2020-12-21 03:26:34', '2020-12-21 03:26:34'),
(27, 'Cricket Bat', 9, 3, '12345', 'Block D', 'Sylhet', 'public/product/1686661007459616.jfif', '2020-12-24', '2020-12-26', '1200', '1250', '2020-12-21 04:34:43', '2020-12-21 04:34:43'),
(28, 'Hair Oils', 2, 5, '123456', 'Block C', 'Sylhet', 'public/product/1686661258010943.jfif', '2020-12-12', '2020-12-26', '1090', '1250', '2020-12-21 04:37:29', '2020-12-21 04:37:29'),
(29, 'Generator', 1, 6, 'c-1234', 'Block C', 'Sylhet', 'public/product/1686661411946495.jfif', '2020-12-15', '2020-12-31', '30000', '32360', '2020-12-21 04:41:09', '2020-12-21 04:41:09'),
(30, 'TV', 7, 6, '13-cvt', 'Block A', 'Indoor', 'public/product/1686661900624127.png', '2020-12-11', '2030-12-11', '30000', '32360', '2020-12-21 04:48:55', '2020-12-21 04:48:55'),
(31, 'TV', 7, 3, '1101-AF', 'Block A', 'Sylhet', 'public/product/1686661991791378.png', '2020-12-11', '2028-11-12', '28000', '32000', '2020-12-21 04:50:22', '2020-12-21 04:50:22'),
(32, 'TV', 7, 3, '1f14E', 'Block-G', 'Indoor', 'public/product/1686662113683098.png', '2020-11-11', '2025-11-11', '22000', '26000', '2020-12-21 04:52:18', '2020-12-21 04:52:18'),
(33, 'Girl_dress', 8, 6, '11H35', 'Block-G', 'Sylhet', 'public/product/1686662592645805.png', '2020-11-12', '2023-11-10', '1200', '2550', '2020-12-21 04:59:55', '2020-12-21 04:59:55'),
(34, 'Girl_dress', 8, 6, '1SDA23', 'Block A', 'Sylhet', 'public/product/1686662673407850.png', '2020-11-12', '2024-11-12', '1800', '2700', '2020-12-21 05:01:12', '2020-12-21 05:01:12'),
(35, 'Girl_dress', 8, 3, '1qwop6', 'Block C', 'Sylhet', 'public/product/1686662762068977.png', '2020-11-12', '2025-11-02', '1230', '2050', '2020-12-21 05:02:36', '2020-12-21 05:02:36'),
(36, 'Girl_dress', 8, 3, '1101-AF', 'Block D', 'Sylhet', 'public/product/1686662875986027.png', '2020-11-12', '2020-11-09', '1800', '26000', '2020-12-21 05:04:25', '2020-12-21 05:04:25'),
(37, 'boy\'s dress', 3, 3, 'c-1234', 'Block-G', 'Sylhet', 'public/product/1686663090493195.png', '2020-11-12', '2023-04-07', '1090', '1400', '2020-12-21 05:07:49', '2020-12-21 05:07:49'),
(38, 'boy\'s dress', 3, 3, '13-cvt', 'Block D', 'Indoor', 'public/product/1686663156354202.png', '2020-11-12', '2024-11-12', '1090', '1500', '2020-12-21 05:08:52', '2020-12-21 05:08:52');

-- --------------------------------------------------------

--
-- Table structure for table `salaryes`
--

CREATE TABLE `salaryes` (
  `id` int(10) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `salary_month` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid_amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `company_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_zipcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `company_name`, `company_address`, `company_email`, `company_phone`, `company_logo`, `company_mobile`, `company_city`, `company_country`, `company_zipcode`, `created_at`, `updated_at`) VALUES
(1, 'Mitaly', 'sylhet', 'mitaly@gmail.com', '0156789123', 'public/company/1676297073317932.png', '1232212234', 'Dhaka', 'Bangladesh', '12345', '2020-08-25 18:00:00', NULL);

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
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_holder` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `email`, `phone`, `address`, `type`, `photo`, `shop`, `account_holder`, `account_number`, `bank_name`, `branch_name`, `city`, `created_at`, `updated_at`) VALUES
(3, 'Rasel', 'ahmed@gmail.com', '1234567890', 'sylhet', 'Whoole Seller', 'public/supplier/1674850698326738.jpg', 'Mitali', 'Shimul', '12345', 'Islami', 'syl', 'sylhet', '2020-08-12 19:54:54', '2020-08-12 19:54:54'),
(4, 'Sourav', 'khan@gmail.com', '0156789123', 'Dhaka', 'Distributor', 'public/supplier/1686659765289855.png', 'Mitali', 'Shimul', '1234', 'Islami', 'syl', 'Dhaka', '2020-08-12 19:57:01', '2020-08-12 19:57:01'),
(5, 'Naeem Uddin', 'info@metrouni.edu.bd', '01226789123', 'sylhet', 'Brochure', 'public/supplier/1686659730534884.jpg', 'Mitali', 'Shimul', '1234577', 'Islami', 'syl', 'sylhet', '2020-08-12 20:41:53', '2020-08-12 20:41:53'),
(6, 'Tony Cross', 'tony@gmail.com', '0123456789', 'Kulaura', 'Whoole Seller', 'public/supplier/1686659888464158.png', 'Mitali', 'naeem', '02314', 'Islami', 'Kulaura', 'Sylhet', '2020-12-21 04:16:56', '2020-12-21 04:16:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'Naeem', 'ahmed@gmail.com', NULL, '$2y$10$IoyZew/gPTOSxWoBBpYZhuvOALQpORrhciGeKnukEDJrpPwSsHHa2', '984YnpOxHIsScniCVi8jqF6iINjSz1lO5rbwdSL9p994K4rTyWD9UureSqjC', '2020-08-08 13:13:59', '2020-08-08 13:13:59');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `categories`
--
ALTER TABLE `categories`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
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
-- Indexes for table `salaryes`
--
ALTER TABLE `salaryes`
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
-- AUTO_INCREMENT for table `advance_salaries`
--
ALTER TABLE `advance_salaries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ordersdetails`
--
ALTER TABLE `ordersdetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `salaryes`
--
ALTER TABLE `salaryes`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
