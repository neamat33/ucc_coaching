-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2023 at 04:12 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `easternfaundation`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `image` text DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `phone_number`, `email`, `image`, `dob`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Neamat Ullah', '01756296633', 'admin@gmail.com', '/20230321110343hMzhV9.webp', NULL, NULL, '$2y$10$LfPrcRFHaix3cNAOo2pGyu8Zu5GgyWa5LtlkeyFqRoG9o1CwHkS4m', NULL, '2023-01-29 07:48:39', '2023-03-21 05:45:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` smallint(5) NOT NULL,
  `name` varchar(64) NOT NULL,
  `status_id` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `name`, `status_id`) VALUES
(1, 'Secretary', 1),
(2, 'Secretary General', 1),
(3, 'Join Secretary', 1),
(4, 'Member', 1);

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(2) NOT NULL,
  `division_id` int(1) NOT NULL,
  `name` varchar(25) NOT NULL,
  `bn_name` varchar(25) NOT NULL,
  `lat` varchar(15) DEFAULT NULL,
  `lon` varchar(15) DEFAULT NULL,
  `url` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `division_id`, `name`, `bn_name`, `lat`, `lon`, `url`) VALUES
(30, 4, 'Jhalakathi', 'ঝালকাঠি', '22.6422689', '90.2003932', 'www.jhalakathi.gov.bd'),
(31, 4, 'Patuakhali', 'পটুয়াখালী', '22.3596316', '90.3298712', 'www.patuakhali.gov.bd'),
(32, 4, 'Pirojpur', 'পিরোজপুর', '22.5781398', '89.9983909', 'www.pirojpur.gov.bd'),
(33, 4, 'Barisal', 'বরিশাল', '22.7004179', '90.3731568', 'www.barisal.gov.bd'),
(34, 4, 'Bhola', 'ভোলা', '22.685923', '90.648179', 'www.bhola.gov.bd'),
(35, 4, 'Barguna', 'বরগুনা', '22.159182', '90.125581', 'www.barguna.gov.bd');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL DEFAULT 0,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `amount` float(11,2) NOT NULL,
  `reference_no` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `date` date NOT NULL,
  `log_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `category_id`, `title`, `amount`, `reference_no`, `note`, `date`, `log_id`, `created_at`, `updated_at`) VALUES
(0, 3, 'Month of March', 10000.00, '100', 'Test', '2023-04-08', 5, '2023-04-10 12:01:45', '2023-04-10 12:01:45');

-- --------------------------------------------------------

--
-- Table structure for table `expense_categories`
--

CREATE TABLE `expense_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `expense_categories`
--

INSERT INTO `expense_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, 'Office rant', '2023-04-06 11:48:20', '2023-04-06 11:48:20'),
(4, 'Enter trident', '2023-04-06 11:48:40', '2023-04-06 11:48:40'),
(5, 'Monthly Office Staff Salary', '2023-04-06 11:48:51', '2023-04-06 11:48:51'),
(6, 'Office Denying(Lunch)', '2023-04-06 11:49:03', '2023-04-06 11:49:03'),
(7, 'Forwarder payment', '2023-04-06 11:49:11', '2023-04-06 11:49:11'),
(8, 'Currier Payment( In-coming / Out-going Parcel)', '2023-04-06 11:49:21', '2023-04-06 11:49:21'),
(9, 'Director’s rumination', '2023-04-06 11:49:36', '2023-04-06 11:49:36'),
(10, 'Business Trip / Travel cost (Visa/Ticketing/Hotel/ Food/ Transport).', '2023-04-06 11:49:47', '2023-04-06 11:49:47'),
(11, 'Transport (Taxi/  Truck )', '2023-04-06 11:49:58', '2023-04-06 11:49:58'),
(12, 'Stationary', '2023-04-06 11:50:12', '2023-04-06 11:50:12'),
(13, 'Utility Bill( Power, Gas, Internet, Telephone, Mobile bill, Security bill)', '2023-04-06 11:50:27', '2023-04-06 11:50:27'),
(14, 'Purchases', '2023-04-06 11:50:38', '2023-04-06 11:50:38'),
(15, 'Others', '2023-04-06 11:50:46', '2023-04-06 11:50:46');

-- --------------------------------------------------------

--
-- Table structure for table `incomes`
--

CREATE TABLE `incomes` (
  `id` int(11) NOT NULL DEFAULT 0,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `amount` float(11,2) NOT NULL,
  `reference_no` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `date` date NOT NULL,
  `log_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `incomes`
--

INSERT INTO `incomes` (`id`, `category_id`, `title`, `amount`, `reference_no`, `note`, `date`, `log_id`, `created_at`, `updated_at`) VALUES
(0, 3, 'Quidem blanditiis ni', 700.00, 'Vel exercitationem c', 'At eum saepe incidid', '1983-08-02', 1, '2023-04-06 15:09:03', '2023-04-06 15:23:38'),
(0, 3, 'encash', 11593.00, '12', 'Buying house commission', '2023-04-07', 4, '2023-04-07 15:57:02', '2023-04-07 15:57:02');

-- --------------------------------------------------------

--
-- Table structure for table `income_categories`
--

CREATE TABLE `income_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `income_categories`
--

INSERT INTO `income_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Buying House Commission', '2023-04-06 12:02:09', '2023-04-06 12:14:08'),
(2, 'Local Sale', '2023-04-06 12:02:24', '2023-04-06 12:02:24'),
(3, 'Export', '2023-04-06 12:02:34', '2023-04-06 12:02:34'),
(4, 'Others', '2023-04-06 12:02:44', '2023-04-06 12:02:44');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `father_name` varchar(45) DEFAULT NULL,
  `mother_name` varchar(45) DEFAULT NULL,
  `husband_wife_name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `blood_group` varchar(32) DEFAULT NULL,
  `occupation_id` smallint(5) NOT NULL,
  `designation_id` smallint(5) DEFAULT NULL,
  `organization` varchar(45) DEFAULT NULL,
  `join_date` date DEFAULT NULL,
  `thana_id` smallint(5) NOT NULL,
  `union_id` smallint(5) NOT NULL,
  `address` text NOT NULL,
  `date_of_membership` datetime NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `occupations`
--

CREATE TABLE `occupations` (
  `id` smallint(5) NOT NULL,
  `name` varchar(64) NOT NULL,
  `status_id` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `occupations`
--

INSERT INTO `occupations` (`id`, `name`, `status_id`) VALUES
(1, 'Doctor', 1),
(2, 'Engineer', 1),
(3, 'Teacher', 1);

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `facebook_link` varchar(255) DEFAULT NULL,
  `twitter_link` varchar(255) DEFAULT NULL,
  `youtube_link` varchar(255) DEFAULT NULL,
  `instagram_link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `phone`, `email`, `address`, `facebook_link`, `twitter_link`, `youtube_link`, `instagram_link`, `created_at`, `updated_at`) VALUES
(1, '+880131-5091233', 'anandapark175@gmail.com', 'Taltoli, Sinaboho Bazar, Shafipur, Gazipur', 'https://www.facebook.com/', 'https://www.facebook.com/', 'https://www.facebook.com/', 'https://www.facebook.com/', NULL, '2023-02-07 07:02:07');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_log`
--

CREATE TABLE `transaction_log` (
  `id` int(11) NOT NULL,
  `transaction_type` varchar(45) NOT NULL,
  `amount` float(11,2) NOT NULL,
  `date` date DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `transaction_log`
--

INSERT INTO `transaction_log` (`id`, `transaction_type`, `amount`, `date`, `created_at`, `updated_at`) VALUES
(1, 'income', 700.00, '2023-04-06', '2023-04-06 15:09:03', '2023-04-06 15:23:37'),
(2, 'expense', 1000.00, '2023-04-06', '2023-04-06 15:24:27', '2023-04-06 15:25:00'),
(3, 'income', 1200.00, '2023-04-06', '2023-04-06 16:06:52', '2023-04-06 16:06:52'),
(4, 'income', 11593.00, '2023-04-07', '2023-04-07 15:57:02', '2023-04-07 15:57:02'),
(5, 'expense', 10000.00, '2023-04-10', '2023-04-10 12:01:45', '2023-04-10 12:01:45');

-- --------------------------------------------------------

--
-- Table structure for table `unions`
--

CREATE TABLE `unions` (
  `id` int(4) NOT NULL,
  `upazila_id` int(3) NOT NULL,
  `name` varchar(25) NOT NULL,
  `bn_name` varchar(25) NOT NULL,
  `url` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `unions`
--

INSERT INTO `unions` (`id`, `upazila_id`, `name`, `bn_name`, `url`) VALUES
(2087, 230, 'Basanda', 'বাসন্ডা', 'basandaup.jhalakathi.gov.bd'),
(2088, 230, 'Binoykati', 'বিনয়কাঠী', 'binoykatiup.jhalakathi.gov.bd'),
(2089, 230, 'Gabharamchandrapur', 'গাভারামচন্দ্রপুর', 'gabharamchandrapurup.jhalakathi.gov.bd'),
(2090, 230, 'Keora', 'কেওড়া', 'keoraup.jhalakathi.gov.bd'),
(2091, 230, 'Kirtipasha', 'কীর্তিপাশা', 'kirtipashaup.jhalakathi.gov.bd'),
(2092, 230, 'Nabagram', 'নবগ্রাম', 'nabagramup.jhalakathi.gov.bd'),
(2093, 230, 'Nathullabad', 'নথুলল্লাবাদ', 'nathullabadup.jhalakathi.gov.bd'),
(2094, 230, 'Ponabalia', 'পোনাবালিয়া', 'ponabaliaup.jhalakathi.gov.bd'),
(2095, 230, 'Sekherhat', 'শেখেরহাট', 'sekherhatup.jhalakathi.gov.bd'),
(2096, 230, 'Gabkhandhansiri', 'গাবখান ধানসিঁড়ি', 'gabkhandhansiriup.jhalakathi.gov.bd'),
(2097, 231, 'Amua', 'আমুয়া', 'amuaup.jhalakathi.gov.bd'),
(2098, 231, 'Awrabunia', 'আওরাবুনিয়া', 'awrabuniaup.jhalakathi.gov.bd'),
(2099, 231, 'Chenchrirampur', 'চেঁচরীরামপুর', 'chenchrirampurup.jhalakathi.gov.bd'),
(2100, 231, 'Kanthalia', 'কাঠালিয়া', 'kanthaliaup.jhalakathi.gov.bd'),
(2101, 231, 'Patikhalghata', 'পাটিখালঘাটা', 'patikhalghataup.jhalakathi.gov.bd'),
(2102, 231, 'Shaulajalia', 'শৌলজালিয়া', 'shaulajaliaup.jhalakathi.gov.bd'),
(2103, 232, 'Subidpur', 'সুবিদপুর', 'subidpurup.jhalakathi.gov.bd'),
(2104, 232, 'Siddhakati', 'সিদ্ধকাঠী', 'siddhakatiup.jhalakathi.gov.bd'),
(2105, 232, 'Ranapasha', 'রানাপাশা', 'ranapashaup.jhalakathi.gov.bd'),
(2106, 232, 'Nachanmohal', 'নাচনমহল', 'nachanmohalup.jhalakathi.gov.bd'),
(2107, 232, 'Mollahat', 'মোল্লারহাট', 'mollahatup.jhalakathi.gov.bd'),
(2108, 232, 'Magar', 'মগর', 'magarup.jhalakathi.gov.bd'),
(2109, 232, 'Kusanghal', 'কুশঙ্গল', 'kusanghalup.jhalakathi.gov.bd'),
(2110, 232, 'Kulkathi', 'কুলকাঠী', 'kulkathiup.jhalakathi.gov.bd'),
(2111, 232, 'Dapdapia', 'দপদপিয়া', 'dapdapiaup.jhalakathi.gov.bd'),
(2112, 232, 'Bharabpasha', 'ভৈরবপাশা', 'bharabpashaup.jhalakathi.gov.bd'),
(2113, 233, 'Suktagarh', 'শুক্তাগড়', 'suktagarhup.jhalakathi.gov.bd'),
(2114, 233, 'Saturia', 'সাতুরিয়া', 'saturiaup.jhalakathi.gov.bd'),
(2115, 233, 'Mathbari', 'মঠবাড়ী', 'mathbariup.jhalakathi.gov.bd'),
(2116, 233, 'Galua', 'গালুয়া', 'galuaup.jhalakathi.gov.bd'),
(2117, 233, 'Baraia', 'বড়ইয়া', 'baraiaup.jhalakathi.gov.bd'),
(2118, 233, 'Rajapur', 'রাজাপুর', 'rajapurup.jhalakathi.gov.bd'),
(2119, 234, 'Adabaria', 'আদাবারিয়া', 'adabariaup.gazipur.gov.bd'),
(2120, 234, 'Bauphal', 'বাউফল', 'bauphalup.patuakhali.gov.bd'),
(2121, 234, 'Daspara', 'দাস পাড়া', 'dasparaup.gazipur.gov.bd'),
(2122, 234, 'Kalaiya', 'কালাইয়া', 'kalaiyaup.gazipur.gov.bd'),
(2123, 234, 'Nawmala', 'নওমালা', 'nawmalaup.patuakhali.gov.bd'),
(2124, 234, 'Najirpur', 'নাজিরপুর', 'najirpurup.patuakhali.gov.bd'),
(2125, 234, 'Madanpura', 'মদনপুরা', 'madanpuraup.patuakhali.gov.bd'),
(2126, 234, 'Boga', 'বগা', 'bogaup.patuakhali.gov.bd'),
(2127, 234, 'Kanakdia', 'কনকদিয়া', 'kanakdiaup.patuakhali.gov.bd'),
(2128, 234, 'Shurjamoni', 'সূর্য্যমনি', 'shurjamoniup.patuakhali.gov.bd'),
(2129, 234, 'Keshabpur', 'কেশবপুর', 'keshabpurup.patuakhali.gov.bd'),
(2130, 234, 'Dhulia', 'ধুলিয়া', 'dhuliaup.patuakhali.gov.bd'),
(2131, 234, 'Kalisuri', 'কালিশুরী', 'kalisuriup.patuakhali.gov.bd'),
(2132, 234, 'Kachipara', 'কাছিপাড়া', 'kachiparaup.patuakhali.gov.bd'),
(2133, 235, 'Laukathi', 'লাউকাঠী', 'laukathiup.patuakhali.gov.bd'),
(2134, 235, 'Lohalia', 'লোহালিয়া', 'lohaliaup.patuakhali.gov.bd'),
(2135, 235, 'Kamalapur', 'কমলাপুর', 'kamalapurup.patuakhali.gov.bd'),
(2136, 235, 'Jainkathi', 'জৈনকাঠী', 'jainkathiup.patuakhali.gov.bd'),
(2137, 235, 'Kalikapur', 'কালিকাপুর', 'kalikapurup.patuakhali.gov.bd'),
(2138, 235, 'Badarpur', 'বদরপুর', 'badarpurup.patuakhali.gov.bd '),
(2139, 235, 'Itbaria', 'ইটবাড়ীয়া', 'itbariaup.patuakhali.gov.bd '),
(2140, 235, 'Marichbunia', 'মরিচবুনিয়া', 'marichbuniaup.patuakhali.gov.bd '),
(2141, 235, 'Auliapur', 'আউলিয়াপুর', 'auliapurup.patuakhali.gov.bd'),
(2142, 235, 'Chotobighai', 'ছোট বিঘাই', 'chotobighaiup.patuakhali.gov.bd'),
(2143, 235, 'Borobighai', 'বড় বিঘাই', 'borobighaiup.patuakhali.gov.bd'),
(2144, 235, 'Madarbunia', 'মাদারবুনিয়া', 'madarbuniaup.patuakhali.gov.bd'),
(2145, 236, 'Pangasia', 'পাংগাশিয়া', 'pangasiaup.patuakhali.gov.bd'),
(2146, 236, 'Muradia', 'মুরাদিয়া', 'muradiaup.patuakhali.gov.bd'),
(2147, 236, 'Labukhali', 'লেবুখালী', 'labukhaliup.patuakhali.gov.bd'),
(2148, 236, 'Angaria', 'আংগারিয়া', 'angariaup.patuakhali.gov.bd'),
(2149, 236, 'Sreerampur', 'শ্রীরামপুর', 'sreerampurup.patuakhali.gov.bd'),
(2150, 237, 'Bashbaria', 'বাঁশবাড়ীয়া', 'bashbariaup.patuakhali.gov.bd'),
(2151, 237, 'Rangopaldi', 'রণগোপালদী', 'rangopaldiup.patuakhali.gov.bd'),
(2152, 237, 'Alipur', 'আলীপুর', 'alipurup.patuakhali.gov.bd'),
(2153, 237, 'Betagi Shankipur', 'বেতাগী সানকিপুর', 'betagishankipurup.patuakhali.gov.bd'),
(2154, 237, 'Dashmina', 'দশমিনা', 'dashminaup.patuakhali.gov.bd'),
(2155, 237, 'Baharampur', 'বহরমপুর', 'baharampurup.patuakhali.gov.bd'),
(2156, 238, 'Chakamaia', 'চাকামইয়া', 'chakamaiaup.patuakhali.gov.bd'),
(2157, 238, 'Tiakhali', 'টিয়াখালী', 'tiakhaliup.patuakhali.gov.bd'),
(2158, 238, 'Lalua', 'লালুয়া', 'laluaup.patuakhali.gov.bd'),
(2159, 238, 'Dhankhali', 'ধানখালী', 'dhankhaliup.patuakhali.gov.bd'),
(2160, 238, 'Mithagonj', 'মিঠাগঞ্জ', 'mithagonjup.patuakhali.gov.bd'),
(2161, 238, 'Nilgonj', 'নীলগঞ্জ', 'nilgonjup.patuakhali.gov.bd'),
(2162, 238, 'Dulaser', 'ধুলাসার', 'dulaserup.patuakhali.gov.bd'),
(2163, 238, 'Latachapli', 'লতাচাপলী', 'latachapliup.patuakhali.gov.bd'),
(2164, 238, 'Mahipur', 'মহিপুর', 'mahipurup.patuakhali.gov.bd'),
(2165, 238, 'Dalbugonj', 'ডালবুগঞ্জ', 'dalbugonjup.patuakhali.gov.bd'),
(2166, 238, 'Baliatali', 'বালিয়াতলী', 'baliataliup.patuakhali.gov.bd'),
(2167, 238, 'Champapur', 'চম্পাপুর', 'champapurup.patuakhali.gov.bd'),
(2168, 239, 'Madhabkhali', 'মাধবখালী', 'madhabkhaliup.patuakhali.gov.bd'),
(2169, 239, 'Mirzaganj', 'মির্জাগঞ্জ', 'mirzaganjup.patuakhali.gov.bd'),
(2170, 239, 'Amragachia', 'আমড়াগাছিয়া', 'amragachiaup.patuakhali.gov.bd'),
(2171, 239, 'Deuli Subidkhali', 'দেউলী সুবিদখালী', 'deulisubidkhaliup.patuakhali.gov.bd'),
(2172, 239, 'Kakrabunia', 'কাকড়াবুনিয়া', 'kakrabuniaup.patuakhali.gov.bd'),
(2173, 239, 'Majidbaria', 'মজিদবাড়িয়া', 'majidbariaup.patuakhali.gov.bd'),
(2174, 240, 'Amkhola', 'আমখোলা', 'amkholaup.patuakhali.gov.bd'),
(2175, 240, 'Golkhali', 'গোলখালী', 'golkhaliup.patuakhali.gov.bd'),
(2176, 240, 'Galachipa', 'গলাচিপা', 'galachipaup.patuakhali.gov.bd'),
(2177, 240, 'Panpatty', 'পানপট্টি', 'panpattyup.patuakhali.gov.bd'),
(2178, 240, 'Ratandi Taltali', 'রতনদী তালতলী', 'ratanditaltaliup.patuakhali.gov.bd'),
(2179, 240, 'Dakua', 'ডাকুয়া', 'dakuaup.patuakhali.gov.bd'),
(2180, 240, 'Chiknikandi', 'চিকনিকান্দী', 'chiknikandiup.patuakhali.gov.bd'),
(2181, 240, 'Gazalia', 'গজালিয়া', 'gazaliaup.patuakhali.gov.bd'),
(2182, 240, 'Charkajol', 'চরকাজল', 'charkajolup.patuakhali.gov.bd'),
(2183, 240, 'Charbiswas', 'চরবিশ্বাস', 'charbiswasup.patuakhali.gov.bd'),
(2184, 240, 'Bakulbaria', 'বকুলবাড়ীয়া', 'bakulbariaup.patuakhali.gov.bd'),
(2185, 240, 'Kalagachhia', 'কলাগাছিয়া', 'kalagachhiaup.patuakhali.gov.bd'),
(2186, 241, 'Rangabali', 'রাঙ্গাবালী', 'rangabaliup.patuakhali.gov.bd'),
(2187, 241, 'Barobaisdia', 'বড়বাইশদিয়া', 'barobaisdiaup.patuakhali.gov.bd'),
(2188, 241, 'Chattobaisdia', 'ছোটবাইশদিয়া', 'chattobaisdiaup.patuakhali.gov.bd'),
(2189, 241, 'Charmontaz', 'চরমোন্তাজ', 'charmontaz.patuakhali.gov.bd'),
(2190, 241, 'Chalitabunia', 'চালিতাবুনিয়া', 'chalitabuniaup.patuakhali.gov.bd'),
(2191, 242, 'Shikder Mallik', 'শিকদার মল্লিক', 'shikdermallikup.pirojpur.gov.bd'),
(2192, 242, 'Kodomtala', 'কদমতলা', 'kodomtalaup.pirojpur.gov.bd'),
(2193, 242, 'Durgapur', 'দূর্গাপুর', 'durgapurup.pirojpur.gov.bd'),
(2194, 242, 'Kolakhali', 'কলাখালী', 'kolakhaliup.pirojpur.gov.bd'),
(2195, 242, 'Tona', 'টোনা', 'tonaup.pirojpur.gov.bd'),
(2196, 242, 'Shariktola', 'শরিকতলা', 'shariktolaup.pirojpur.gov.bd'),
(2197, 242, 'Shankorpasa', 'শংকরপাশা', 'shankorpasaup.pirojpur.gov.bd'),
(2198, 243, 'Mativangga', 'মাটিভাংগা', 'mativanggaup.pirojpur.gov.bd'),
(2199, 243, 'Malikhali', 'মালিখালী', 'malikhaliup.pirojpur.gov.bd'),
(2200, 243, 'Daulbari Dobra', 'দেউলবাড়ী দোবড়া', 'daulbaridobraup.pirojpur.gov.bd'),
(2201, 243, 'Dirgha', 'দীর্ঘা', 'dirghaup.pirojpur.gov.bd'),
(2202, 243, 'Kolardoania', 'কলারদোয়ানিয়া', 'kolardoaniaup.pirojpur.gov.bd'),
(2203, 243, 'Sriramkathi', 'শ্রীরামকাঠী', 'sriramkathiup.pirojpur.gov.bd'),
(2204, 243, 'Shakhmatia', 'সেখমাটিয়া', 'shakhmatiaup.pirojpur.gov.bd'),
(2205, 243, 'Nazirpur Sadar', 'নাজিরপুর সদর', 'nazirpursadarup.pirojpur.gov.bd'),
(2206, 243, 'Shakharikathi', 'শাখারীকাঠী', 'shakharikathiup.pirojpur.gov.bd'),
(2207, 244, 'Sayna Rogunathpur', 'সয়না রঘুনাথপুর', 'saynarogunathpurup.pirojpur.gov.bd'),
(2208, 244, 'Amrazuri', 'আমড়াজুড়ি', 'amrazuriup.pirojpur.gov.bd'),
(2209, 244, 'Kawkhali Sadar', 'কাউখালি সদর', 'kawkhalisadarup.pirojpur.gov.bd'),
(2210, 244, 'Chirapara', 'চিরাপাড়া', 'chiraparaup.pirojpur.gov.bd'),
(2211, 244, 'Shialkhathi', 'শিয়ালকাঠী', 'shialkhathiup.pirojpur.gov.bd'),
(2212, 245, 'Balipara', 'বালিপাড়া', 'baliparaup.pirojpur.gov.bd'),
(2213, 245, 'Pattashi', 'পত্তাশি', 'pattashiup.pirojpur.gov.bd'),
(2214, 245, 'Parerhat', 'পাড়েরহাট', 'parerhatup.pirojpur.gov.bd'),
(2215, 246, 'Vitabaria', 'ভিটাবাড়িয়া', 'vitabariaup.pirojpur.gov.bd'),
(2216, 246, 'Nodmulla', 'নদমূলা শিয়ালকাঠী', 'nodmullaup.pirojpur.gov.bd'),
(2217, 246, 'Telikhali', 'তেলিখালী', 'telikhaliup.pirojpur.gov.bd'),
(2218, 246, 'Ekree', 'ইকড়ী', 'ekreeup.pirojpur.gov.bd'),
(2219, 246, 'Dhaoa', 'ধাওয়া', 'dhaoaup.pirojpur.gov.bd'),
(2220, 246, 'Vandaria Sadar', 'ভান্ডারিয়া সদর', 'vandariasadarup.pirojpur.gov.bd'),
(2221, 246, 'Gouripur', 'গৌরীপুর', 'gouripurup.pirojpur.gov.bd'),
(2222, 247, 'Tuskhali', 'তুষখালী', 'tuskhaliup.pirojpur.gov.bd'),
(2223, 247, 'Dhanisafa', 'ধানীসাফা', 'dhanisafaup.pirojpur.gov.bd'),
(2224, 247, 'Mirukhali', 'মিরুখালী', 'mirukhaliup.pirojpur.gov.bd'),
(2225, 247, 'Tikikata', 'টিকিকাটা', 'tikikataup.pirojpur.gov.bd'),
(2226, 247, 'Betmor Rajpara', 'বেতমোর রাজপাড়া', 'betmorrajparaup.pirojpur.gov.bd'),
(2227, 247, 'Amragachia', 'আমড়াগাছিয়া', 'amragachiaup.pirojpur.gov.bd'),
(2228, 247, 'Shapleza', 'শাপলেজা', 'shaplezaup.pirojpur.gov.bd'),
(2229, 247, 'Daudkhali', 'দাউদখালী', 'daudkhaliup.pirojpur.gov.bd'),
(2230, 247, 'Mathbaria', 'মঠবাড়িয়া', 'mathbariaup.pirojpur.gov.bd'),
(2231, 247, 'Baramasua', 'বড়মাছুয়া', 'baramasuaup.pirojpur.gov.bd'),
(2232, 247, 'Haltagulishakhali', 'হলতাগুলিশাখালী', 'haltagulishakhaliup.pirojpur.gov.bd'),
(2233, 248, 'Boldia', 'বলদিয়া', 'boldiaup.pirojpur.gov.bd'),
(2234, 248, 'Sohagdal', 'সোহাগদল', 'sohagdalup.pirojpur.gov.bd'),
(2235, 248, 'Atghorkuriana', 'আটঘর কুড়িয়ানা', 'atghorkurianaup.pirojpur.gov.bd'),
(2236, 248, 'Jolabari', 'জলাবাড়ী', 'jolabariup.pirojpur.gov.bd'),
(2237, 248, 'Doyhary', 'দৈহারী', 'doyharyup.pirojpur.gov.bd'),
(2238, 248, 'Guarekha', 'গুয়ারেখা', 'guarekhaup.pirojpur.gov.bd'),
(2239, 248, 'Somudoykathi', 'সমুদয়কাঠী', 'somudoykathiup.pirojpur.gov.bd'),
(2240, 248, 'Sutiakathi', 'সুটিয়াকাঠী', 'sutiakathiup.pirojpur.gov.bd'),
(2241, 248, 'Sarengkathi', 'সারেংকাঠী', 'sarengkathiup.pirojpur.gov.bd'),
(2242, 248, 'Shorupkathi', 'স্বরুপকাঠী', 'shorupkathiup.pirojpur.gov.bd'),
(2243, 249, 'Raipasha Karapur', 'রায়পাশা কড়াপুর', 'raipashakarapurup.barisal.gov.bd'),
(2244, 249, 'Kashipur', 'কাশীপুর', 'kashipurup.barisal.gov.bd'),
(2245, 249, 'Charbaria', 'চরবাড়িয়া', 'charbariaup.barisal.gov.bd'),
(2246, 249, 'Shyastabad', 'সায়েস্তাবাদ', 'shyastabadup.barisal.gov.bd'),
(2247, 249, 'Charmonai', 'চরমোনাই', 'charmonaiup.barisal.gov.bd'),
(2248, 249, 'Zagua', 'জাগুয়া', 'zaguaup.barisal.gov.bd'),
(2249, 249, 'Charcowa', 'চরকাউয়া', 'charcowaup.barisal.gov.bd'),
(2250, 249, 'Chandpura', 'চাঁদপুরা', 'chandpuraup.barisal.gov.bd'),
(2251, 249, 'Tungibaria', 'টুঙ্গীবাড়িয়া', 'tungibariaup.barisal.gov.bd'),
(2252, 249, 'Chandramohan', 'চন্দ্রমোহন', 'chandramohanup.barisal.gov.bd'),
(2253, 250, 'Charamaddi', 'চরামদ্দি', 'charamaddiup.barisal.gov.bd'),
(2254, 250, 'Charade', 'চরাদি', 'charadeup.barisal.gov.bd'),
(2255, 250, 'Darial', 'দাড়িয়াল', 'darialup.barisal.gov.bd'),
(2256, 250, 'Dudhal', 'দুধল', 'dudhalup.barisal.gov.bd'),
(2257, 250, 'Durgapasha', 'দুর্গাপাশা', 'durgapashaup.barisal.gov.bd'),
(2258, 250, 'Faridpur', 'ফরিদপুর', 'faridpurup.barisal.gov.bd'),
(2259, 250, 'Kabai', 'কবাই', 'kabaiup.barisal.gov.bd'),
(2260, 250, 'Nalua', 'নলুয়া', 'naluaup.barisal.gov.bd'),
(2261, 250, 'Kalashkathi', 'কলসকাঠী', 'kalashkathiup.barisal.gov.bd'),
(2262, 250, 'Garuria', 'গারুরিয়া', 'garuriaup.barisal.gov.bd'),
(2263, 250, 'Bharpasha', 'ভরপাশা', 'bharpashaup.barisal.gov.bd'),
(2264, 250, 'Rangasree', 'রঙ্গশ্রী', 'rangasreeup.barisal.gov.bd'),
(2265, 250, 'Padreeshibpur', 'পাদ্রিশিবপুর', 'padreeshibpurup.barisal.gov.bd'),
(2266, 250, 'Niamoti', 'নিয়ামতি', 'niamotiup.barisal.gov.bd'),
(2267, 251, 'Jahangir Nagar', 'জাহাঙ্গীর নগর', 'jahangirnagorup.barisal.gov.bd'),
(2268, 251, 'Kaderpur', 'কেদারপুর', 'kaderpurup.barisal.gov.bd'),
(2269, 251, 'Deherhoti', 'দেহেরগতি', 'deherhotiup.barisal.gov.bd'),
(2270, 251, 'Chandpasha', 'চাঁদপাশা', 'chandpashaup.barisal.gov.bd'),
(2271, 251, 'Rahamtpur', 'রহমতপুর', 'rahamtpurup.barisal.gov.bd'),
(2272, 251, 'Madhbpasha', 'মাধবপাশা', 'madhbpashaup.barisal.gov.bd'),
(2273, 252, 'Shatla', 'সাতলা', 'shatlaup.barisal.gov.bd'),
(2274, 252, 'Harta', 'হারতা', 'hartaup.barisal.gov.bd'),
(2275, 252, 'Jalla', 'জল্লা', 'jallaup.barisal.gov.bd'),
(2276, 252, 'Otra', 'ওটরা', 'otraup.barisal.gov.bd'),
(2277, 252, 'Sholok', 'শোলক', 'sholokup.barisal.gov.bd'),
(2278, 252, 'Barakhota', 'বরাকোঠা', 'barakhotaup.barisal.gov.bd'),
(2279, 252, 'Bamrail', 'বামরাইল', 'bamrailup.barisal.gov.bd'),
(2280, 252, 'Shikerpur Wazirpur', 'শিকারপুর উজিরপুর', 'shikerpurwazirpurup.barisal.gov.bd'),
(2281, 252, 'Gouthia', 'গুঠিয়া', 'gouthiaup.barisal.gov.bd'),
(2282, 253, 'Bisharkandi', 'বিশারকান্দি', 'bisharkandiup.barisal.gov.bd'),
(2283, 253, 'Illuhar', 'ইলুহার', 'illuharup.barisal.gov.bd'),
(2284, 253, 'Sayedkathi', 'সৈয়দকাঠী', 'sayedkathiup.barisal.gov.bd'),
(2285, 253, 'Chakhar', 'চাখার', 'chakharup.barisal.gov.bd'),
(2286, 253, 'Saliabakpur', 'সলিয়াবাকপুর', 'saliabakpurup.barisal.gov.bd'),
(2287, 253, 'Baishari', 'বাইশারী', 'baishariup.barisal.gov.bd'),
(2288, 253, 'Banaripara', 'বানারিপাড়া', 'banariparaup.barisal.gov.bd'),
(2289, 253, 'Udykhati', 'উদয়কাঠী', 'udykhatiup.barisal.gov.bd'),
(2290, 254, 'Khanjapur', 'খাঞ্জাপুর', 'khanjapurup.barisal.gov.bd'),
(2291, 254, 'Barthi', 'বার্থী', 'barthiup.barisal.gov.bd'),
(2292, 254, 'Chandshi', 'চাঁদশী', 'chandshiup.barisal.gov.bd'),
(2293, 254, 'Mahilara', 'মাহিলারা', 'mahilaraup.barisal.gov.bd'),
(2294, 254, 'Nalchira', 'নলচিড়া', 'nalchiraup.barisal.gov.bd'),
(2295, 254, 'Batajore', 'বাটাজোর', 'batajoreup.barisal.gov.bd'),
(2296, 254, 'Sarikal', 'সরিকল', 'sarikalup.barisal.gov.bd'),
(2297, 255, 'Rajihar', 'রাজিহার', 'rajiharup.barisal.gov.bd'),
(2298, 255, 'Bakal', 'বাকাল', 'bakalup.barisal.gov.bd'),
(2299, 255, 'Bagdha', 'বাগধা', 'bagdhaup.barisal.gov.bd'),
(2300, 255, 'Goila', 'গৈলা', 'goilaup.barisal.gov.bd'),
(2301, 255, 'Ratnapur', 'রত্নপুর', 'ratnapurup.barisal.gov.bd'),
(2302, 256, 'Andarmanik', 'আন্দারমানিক', 'andarmanikup.barisal.gov.bd'),
(2303, 256, 'Lata', 'লতা', 'lataup.barisal.gov.bd'),
(2304, 256, 'Charakkorea', 'চরএককরিয়া', 'charakkoreaup.barisal.gov.bd'),
(2305, 256, 'Ulania', 'উলানিয়া', 'ulaniaup.barisal.gov.bd'),
(2306, 256, 'Mehendigong', 'মেহেন্দিগঞ্জ', 'mehendigongup.barisal.gov.bd'),
(2307, 256, 'Biddanandapur', 'বিদ্যানন্দনপুর', 'biddanandapurup.barisal.gov.bd'),
(2308, 256, 'Bhashanchar', 'ভাষানচর', 'bhashancharup.barisal.gov.bd'),
(2309, 256, 'Jangalia', 'জাঙ্গালিয়া', 'jangaliaup.barisal.gov.bd'),
(2310, 256, 'Alimabad', 'আলিমাবাদ', 'alimabadup.barisal.gov.bd'),
(2311, 256, 'Chandpur', 'চানপুর', 'chandpurup.barisal.gov.bd'),
(2312, 256, 'Darirchar Khajuria', 'দড়িরচর খাজুরিয়া', 'darircharkhajuriaup.barisal.gov.bd'),
(2313, 256, 'Gobindapur', 'গোবিন্দপুর', 'gobindapurup.barisal.gov.bd'),
(2314, 256, 'Chargopalpur', 'চরগোপালপুর', 'chargopalpurup.barisal.gov.bd'),
(2315, 257, 'Batamara', 'বাটামারা', 'batamaraup.barisal.gov.bd'),
(2316, 257, 'Nazirpur', 'নাজিরপুর', 'nazirpurup.barisal.gov.bd'),
(2317, 257, 'Safipur', 'সফিপুর', 'safipurup.barisal.gov.bd'),
(2318, 257, 'Gaschua', 'গাছুয়া', 'gaschuaup.barisal.gov.bd'),
(2319, 257, 'Charkalekha', 'চরকালেখা', 'charkalekhaup.barisal.gov.bd'),
(2320, 257, 'Muladi', 'মুলাদী', 'muladiup.barisal.gov.bd'),
(2321, 257, 'Kazirchar', 'কাজিরচর', 'kazircharup.barisal.gov.bd'),
(2322, 258, 'Harinathpur', 'হরিনাথপুর', 'harinathpurup.barisal.gov.bd'),
(2323, 258, 'Memania', 'মেমানিয়া', 'memaniaup.barisal.gov.bd'),
(2324, 258, 'Guabaria', 'গুয়াবাড়িয়া', 'guabariaup.barisal.gov.bd'),
(2325, 258, 'Barjalia', 'বড়জালিয়া', 'barjaliaup.barisal.gov.bd'),
(2326, 258, 'Hizla Gourabdi', 'হিজলা গৌরাব্দি', 'hizlagourabdiup.barisal.gov.bd'),
(2327, 258, 'Dhulkhola', 'ধুলখোলা', 'dhulkholaup.barisal.gov.bd'),
(2328, 259, 'Razapur', 'রাজাপুর', 'razapurup.bhola.gov.bd'),
(2329, 259, 'Ilisha', 'ইলিশা', 'ilishaup.bhola.gov.bd'),
(2330, 259, 'Westilisa', 'পশ্চিম ইলিশা', 'westilisaup.bhola.gov.bd'),
(2331, 259, 'Kachia', 'কাচিয়া', 'kachiaup.bhola.gov.bd'),
(2332, 259, 'Bapta', 'বাপ্তা', 'baptaup.bhola.gov.bd'),
(2333, 259, 'Dhania', 'ধনিয়া', 'dhaniaup.bhola.gov.bd'),
(2334, 259, 'Shibpur', 'শিবপুর', 'shibpurup.bhola.gov.bd'),
(2335, 259, 'Alinagor', 'আলীনগর', 'alinagorup.bhola.gov.bd'),
(2336, 259, 'Charshamya', 'চরসামাইয়া', 'charshamyaup.bhola.gov.bd'),
(2337, 259, 'Vhelumia', ' ভেলুমিয়া', 'vhelumiaup.bhola.gov.bd'),
(2338, 259, 'Vheduria', 'ভেদুরিয়া', 'vheduriaup.bhola.gov.bd'),
(2339, 259, 'North Digholdi', 'উত্তর দিঘলদী', 'northdigholdiup.bhola.gov.bd'),
(2340, 259, 'South Digholdi', 'দক্ষিণ দিঘলদী', 'southdigholdiup.bhola.gov.bd'),
(2341, 260, 'Boromanika', 'বড় মানিকা', 'boromanikaup.bhola.gov.bd'),
(2342, 260, 'Deula', 'দেউলা', 'deulaup.bhola.gov.bd'),
(2343, 260, 'Kutuba', 'কুতুবা', 'kutubaup.bhola.gov.bd'),
(2344, 260, 'Pakshia', 'পক্ষিয়া', 'pakshiaup.bhola.gov.bd'),
(2345, 260, 'Kachia', 'কাচিয়া', 'kachiaup4.bhola.gov.bd'),
(2346, 261, 'Osmangonj', 'ওসমানগঞ্জ', 'osmangonjup.bhola.gov.bd'),
(2347, 261, 'Aslampur', 'আছলামপুর', 'aslampurup.bhola.gov.bd'),
(2348, 261, 'Zinnagor', 'জিন্নাগড়', 'zinnagorup.bhola.gov.bd'),
(2349, 261, 'Aminabad', 'আমিনাবাদ', 'aminabadup.bhola.gov.bd'),
(2350, 261, 'Nilkomol', 'নীলকমল', 'nilkomolup.bhola.gov.bd'),
(2351, 261, 'Charmadraj', 'চরমাদ্রাজ', 'charmadrajup.bhola.gov.bd'),
(2352, 261, 'Awajpur', 'আওয়াজপুর', 'awajpurup.bhola.gov.bd'),
(2353, 261, 'Awajpur', 'আওয়াজপুর', 'awajpurup.bhola.gov.bd'),
(2354, 261, 'Charkolmi', 'চরকলমী', 'charkolmiup.bhola.gov.bd'),
(2355, 261, 'Charmanika', 'চরমানিকা', 'charmanikaup.bhola.gov.bd'),
(2356, 261, 'Hazarigonj', 'হাজারীগঞ্জ', 'hazarigonjup.bhola.gov.bd'),
(2357, 261, 'Jahanpur', 'জাহানপুর', 'jahanpurup.bhola.gov.bd'),
(2358, 261, 'Nurabad', 'নুরাবাদ', 'nurabadup.bhola.gov.bd'),
(2359, 261, 'Rasulpur', 'রসুলপুর', 'rasulpurup.bhola.gov.bd'),
(2360, 261, 'Kukrimukri', 'কুকরীমূকরী', 'kukrimukriup.bhola.gov.bd'),
(2361, 261, 'Abubakarpur', 'আবুবকরপুর', 'abubakarpurup.bhola.gov.bd'),
(2362, 261, 'Abdullahpur', 'আবদুল্লাহ', 'abdullahpurup.bhola.gov.bd'),
(2363, 261, 'Nazrulnagar', 'নজরুল নগর', 'nazrulnagarup.bhola.gov.bd'),
(2364, 261, 'Mujibnagar', 'মুজিব নগর', 'mujibnagarup.bhola.gov.bd'),
(2365, 261, 'Dalchar', 'ঢালচর', 'dalcharup.bhola.gov.bd'),
(2366, 262, 'Madanpur', 'মদনপুর', 'madanpurup.bhola.gov.bd'),
(2367, 262, 'Madua', 'মেদুয়া', 'maduaup.bhola.gov.bd'),
(2368, 262, 'Charpata', 'চরপাতা', 'charpataup.bhola.gov.bd'),
(2369, 262, 'North Joy Nagar', 'উত্তর জয়নগর', 'northjoynagarup.bhola.gov.bd'),
(2370, 262, 'South Joy Nagar', 'দক্ষিন জয়নগর', 'southjoynagarup.bhola.gov.bd'),
(2371, 262, 'Char Khalipa', 'চর খলিফা', 'charkhalipaup.bhola.gov.bd'),
(2372, 262, 'Sayedpur', 'সৈয়দপুর', 'sayedpurup.bhola.gov.bd'),
(2373, 262, 'Hazipur', 'হাজীপুর', 'hazipurup.bhola.gov.bd'),
(2374, 262, 'Vhovanipur', 'ভবানীপুর', 'vhovanipurup.bhola.gov.bd'),
(2375, 263, 'Hazirhat', 'হাজীর হাট', 'hazirhatup.bhola.gov.bd'),
(2376, 263, 'Monpura', 'মনপুরা', 'monpuraup.bhola.gov.bd'),
(2377, 263, 'North Sakuchia', 'উত্তর সাকুচিয়া', 'sakuchianorthup.bhola.gov.bd'),
(2378, 263, 'South Sakuchia', 'দক্ষিন সাকুচিয়া', 'sakuchiasouthup.bhola.gov.bd'),
(2379, 264, 'Chanchra', 'চাচঁড়া', 'chanchraup.bhola.gov.bd'),
(2380, 264, 'Shambupur', 'শম্ভুপুর', 'shambupurup.bhola.gov.bd'),
(2381, 264, 'Sonapur', 'সোনাপুর', 'sonapurup.bhola.gov.bd'),
(2382, 264, 'Chadpur', 'চাঁদপুর', 'chadpurup.bhola.gov.bd'),
(2383, 264, 'Baro Molongchora', 'বড় মলংচড়া', 'baromolongchoraup.bhola.gov.bd'),
(2384, 265, 'Badarpur', 'বদরপুর', 'badarpurup.bhola.gov.bd'),
(2385, 265, 'Charbhuta', 'চরভূতা', 'charbhutaup.bhola.gov.bd'),
(2386, 265, 'Kalma', ' কালমা', 'kalmaup.bhola.gov.bd'),
(2387, 265, 'Dholigour Nagar', 'ধলীগৌর নগর', 'dholigournagarup.bhola.gov.bd'),
(2388, 265, 'Lalmohan', 'লালমোহন', 'lalmohanup.bhola.gov.bd'),
(2389, 265, 'Lord Hardinge', 'লর্ড হার্ডিঞ্জ', 'lordhardingeup.bhola.gov.bd'),
(2390, 265, 'Ramagonj', 'রমাগঞ্জ', 'ramagonjup.bhola.gov.bd'),
(2391, 265, 'Paschim Char Umed', 'পশ্চিম চর উমেদ', 'paschimcharumedup.bhola.gov.bd'),
(2392, 265, 'Farajgonj', 'ফরাজগঞ্জ', 'farajgonjup.bhola.gov.bd'),
(2393, 266, 'Amtali', 'আমতলী', 'amtaliup.barguna.gov.bd'),
(2394, 266, 'Gulishakhali', 'গুলিশাখালী', 'gulishakhaliup.barguna.gov.bd'),
(2395, 266, 'Athrogasia', 'আঠারগাছিয়া', 'athrogasiaup.barguna.gov.bd'),
(2396, 266, 'Kukua', 'কুকুয়া', 'kukuaup.barguna.gov.bd'),
(2397, 266, 'Haldia', 'হলদিয়া', 'haldiaup.barguna.gov.bd'),
(2398, 266, 'Chotobogi', 'ছোটবগী', 'chotobogiup.barguna.gov.bd'),
(2399, 266, 'Arpangasia', 'আড়পাঙ্গাশিয়া', 'arpangasiaup.barguna.gov.bd'),
(2400, 266, 'Chowra', 'চাওড়া', 'chowraup.barguna.gov.bd'),
(2401, 267, 'M. Baliatali', 'এম. বালিয়াতলী', 'm.baliataliup.barguna.gov.bd'),
(2402, 267, 'Noltona', 'নলটোনা', 'noltonaup.barguna.gov.bd'),
(2403, 267, 'Bodorkhali', 'বদরখালী', 'bodorkhaliup.barguna.gov.bd'),
(2404, 267, 'Gowrichanna', 'গৌরিচন্না', 'gowrichannaup.barguna.gov.bd'),
(2405, 267, 'Fuljhuri', 'ফুলঝুড়ি', 'fuljhuriup.barguna.gov.bd'),
(2406, 267, 'Keorabunia', 'কেওড়াবুনিয়া', 'keorabuniaup.barguna.gov.bd'),
(2407, 267, 'Ayla Patakata', 'আয়লা পাতাকাটা', 'aylaPatakataup.barguna.gov.bd'),
(2408, 267, 'Burirchor', 'বুড়িরচর', 'burirchorup.barguna.gov.bd'),
(2409, 267, 'Dhalua', 'ঢলুয়া', 'dhaluaup.barguna.gov.bd'),
(2410, 267, 'Barguna', 'বরগুনা', 'bargunaup.barguna.gov.bd'),
(2411, 268, 'Bibichini', 'বিবিচিন', 'bibichiniup.barguna.gov.bd'),
(2412, 268, 'Betagi', 'বেতাগী', 'betagiup.barguna.gov.bd'),
(2413, 268, 'Hosnabad', 'হোসনাবাদ', 'hosnabadup.barguna.gov.bd'),
(2414, 268, 'Mokamia', 'মোকামিয়া', 'mokamiaup.barguna.gov.bd'),
(2415, 268, 'Buramajumder', 'বুড়ামজুমদার', 'buramajumderup.barguna.gov.bd'),
(2416, 268, 'Kazirabad', 'কাজীরাবাদ', 'kazirabadup.barguna.gov.bd'),
(2417, 268, 'Sarisamuri', 'সরিষামুড়ী', 'sarisamuriup.barguna.gov.bd'),
(2418, 269, 'Bukabunia', 'বুকাবুনিয়া', 'bukabuniaup.barguna.gov.bd'),
(2419, 269, 'Bamna', 'বামনা', 'bamnaup.barguna.gov.bd'),
(2420, 269, 'Ramna', 'রামনা', 'ramnaup.barguna.gov.bd'),
(2421, 269, 'Doutola', 'ডৌয়াতলা', 'doutolaup.barguna.gov.bd'),
(2422, 270, 'Raihanpur', 'রায়হানপুর', 'raihanpurup.barguna.gov.bd'),
(2423, 270, 'Nachnapara', 'নাচনাপাড়া', 'nachnaparaup.barguna.gov.bd'),
(2424, 270, 'Charduany', 'চরদুয়ানী', 'charduanyup.barguna.gov.bd'),
(2425, 270, 'Patharghata', 'পাথরঘাটা', 'patharghataup.barguna.gov.bd'),
(2426, 270, 'Kalmegha', 'কালমেঘা', 'kalmeghaup.barguna.gov.bd'),
(2427, 270, 'Kakchira', 'কাকচিঢ়া', 'kakchiraup.barguna.gov.bd'),
(2428, 270, 'Kathaltali', 'কাঠালতলী', 'kathaltaliup.barguna.gov.bd'),
(2429, 271, 'Karibaria', 'কড়ইবাড়ীয়া', 'karibariaup.barguna.gov.bd'),
(2430, 271, 'Panchakoralia', 'পচাকোড়ালিয়া', 'panchakoraliaup.barguna.gov.bd'),
(2431, 271, 'Barabagi', 'বড়বগি', 'barabagiup.barguna.gov.bd'),
(2432, 271, 'Chhotabagi', 'ছোটবগি', 'chhotabagiup.barguna.gov.bd'),
(2433, 271, 'Nishanbaria', 'নিশানবাড়ীয়া', 'nishanbariaup.barguna.gov.bd'),
(2434, 271, 'Sarikkhali', 'শারিকখালি', 'sarikkhaliup.barguna.gov.bd'),
(2435, 271, 'Sonakata', 'সোনাকাটা', 'sonakataup.barguna.gov.bd');

-- --------------------------------------------------------

--
-- Table structure for table `upazilas`
--

CREATE TABLE `upazilas` (
  `id` int(3) NOT NULL,
  `name` varchar(25) NOT NULL,
  `bn_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `upazilas`
--

INSERT INTO `upazilas` (`id`, `name`, `bn_name`) VALUES
(249, 'Barisal Sadar', 'বরিশাল সদর'),
(250, 'Bakerganj', 'বাকেরগঞ্জ'),
(251, 'Babuganj', 'বাবুগঞ্জ'),
(252, 'Wazirpur', 'উজিরপুর'),
(253, 'Banaripara', 'বানারীপাড়া'),
(254, 'Gournadi', 'গৌরনদী'),
(255, 'Agailjhara', 'আগৈলঝাড়া'),
(256, 'Mehendiganj', 'মেহেন্দিগঞ্জ'),
(257, 'Muladi', 'মুলাদী'),
(258, 'Hizla', 'হিজলা');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_phone_number_unique` (`phone_number`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `division_id` (`division_id`);

--
-- Indexes for table `expense_categories`
--
ALTER TABLE `expense_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income_categories`
--
ALTER TABLE `income_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `occupations`
--
ALTER TABLE `occupations`
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
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_log`
--
ALTER TABLE `transaction_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unions`
--
ALTER TABLE `unions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `upazilla_id` (`upazila_id`);

--
-- Indexes for table `upazilas`
--
ALTER TABLE `upazilas`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `expense_categories`
--
ALTER TABLE `expense_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `income_categories`
--
ALTER TABLE `income_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `occupations`
--
ALTER TABLE `occupations`
  MODIFY `id` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaction_log`
--
ALTER TABLE `transaction_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `unions`
--
ALTER TABLE `unions`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2436;

--
-- AUTO_INCREMENT for table `upazilas`
--
ALTER TABLE `upazilas`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=272;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
