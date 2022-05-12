-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 12, 2022 at 04:56 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uuizard_bdjobwar`
--

-- --------------------------------------------------------

--
-- Table structure for table `categoriables`
--

CREATE TABLE `categoriables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `categoriable_id` bigint(20) UNSIGNED NOT NULL,
  `categoriable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categoriables`
--

INSERT INTO `categoriables` (`id`, `category_id`, `categoriable_id`, `categoriable_type`, `created_at`, `updated_at`) VALUES
(1, 7, 1, 'App\\Models\\Exam', NULL, NULL),
(2, 8, 1, 'App\\Models\\Exam', NULL, NULL),
(3, 9, 1, 'App\\Models\\Exam', NULL, NULL),
(4, 10, 1, 'App\\Models\\Exam', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `order`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(7, NULL, 1, 'asd', 'asd', '2022-05-10 06:58:39', '2022-05-10 06:58:39'),
(8, NULL, 1, 'High School', 'high-school', '2022-05-10 23:38:10', '2022-05-10 23:38:10'),
(9, 8, 1, 'SSC', 'ssc', '2022-05-10 23:38:22', '2022-05-10 23:38:22'),
(10, 9, 1, 'Model Test', 'model-test', '2022-05-10 23:38:43', '2022-05-10 23:38:43');

-- --------------------------------------------------------

--
-- Table structure for table `choices`
--

CREATE TABLE `choices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `index` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `choice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('text','image') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `choices`
--

INSERT INTO `choices` (`id`, `question_id`, `index`, `choice`, `type`, `created_at`, `updated_at`) VALUES
(13, 16, '252', 'Dhaka', 'text', '2022-05-12 06:00:15', '2022-05-12 06:00:15'),
(14, 16, '253', 'Barishal', 'text', '2022-05-12 06:00:15', '2022-05-12 06:00:15'),
(15, 16, '254', 'Rajsahi', 'text', '2022-05-12 06:00:15', '2022-05-12 06:00:15'),
(16, 16, '255', 'Chitagong', 'text', '2022-05-12 06:00:15', '2022-05-12 06:00:15');

-- --------------------------------------------------------

--
-- Table structure for table `data_rows`
--

CREATE TABLE `data_rows` (
  `id` int(10) UNSIGNED NOT NULL,
  `data_type_id` int(10) UNSIGNED NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `browse` tinyint(1) NOT NULL DEFAULT '1',
  `read` tinyint(1) NOT NULL DEFAULT '1',
  `edit` tinyint(1) NOT NULL DEFAULT '1',
  `add` tinyint(1) NOT NULL DEFAULT '1',
  `delete` tinyint(1) NOT NULL DEFAULT '1',
  `details` text COLLATE utf8mb4_unicode_ci,
  `order` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_rows`
--

INSERT INTO `data_rows` (`id`, `data_type_id`, `field`, `type`, `display_name`, `required`, `browse`, `read`, `edit`, `add`, `delete`, `details`, `order`) VALUES
(1, 1, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, '{}', 1),
(2, 1, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{\"validation\":{\"rule\":\"required|string\"}}', 3),
(3, 1, 'email', 'text', 'Email', 1, 0, 0, 1, 1, 1, '{\"validation\":{\"rule\":\"required|email\"}}', 4),
(4, 1, 'password', 'password', 'Password', 1, 0, 0, 1, 1, 0, '{\"validation\":{\"rule\":\"required|min:4\"}}', 7),
(5, 1, 'remember_token', 'text', 'Remember Token', 0, 0, 0, 0, 0, 0, '{}', 8),
(6, 1, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 9),
(7, 1, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 11),
(8, 1, 'avatar', 'image', 'Avatar', 0, 1, 1, 1, 1, 1, '{\"resize\":{\"width\":\"500\",\"height\":\"500\"},\"quality\":\"70%\",\"upsize\":true,\"validation\":{\"rule\":\"required|mimes:jpeg,jpg,png|max:1000\"}}', 2),
(9, 1, 'user_belongsto_role_relationship', 'relationship', 'Role', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":\"0\",\"taggable\":\"0\"}', 13),
(10, 1, 'user_belongstomany_role_relationship', 'relationship', 'voyager::seeders.data_rows.roles', 0, 0, 0, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}', 14),
(11, 1, 'settings', 'hidden', 'Settings', 0, 0, 0, 0, 0, 0, '{}', 15),
(12, 2, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(13, 2, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(14, 2, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(15, 2, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(16, 3, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(17, 3, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(18, 3, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(19, 3, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(20, 3, 'display_name', 'text', 'Display Name', 1, 1, 1, 1, 1, 1, NULL, 5),
(21, 1, 'role_id', 'text', 'Role', 0, 1, 1, 1, 1, 1, '{}', 12),
(22, 4, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(23, 4, 'parent_id', 'select_dropdown', 'Parent', 0, 0, 1, 1, 1, 1, '{\"default\":\"\",\"null\":\"\",\"options\":{\"\":\"-- None --\"},\"relationship\":{\"key\":\"id\",\"label\":\"name\"}}', 2),
(24, 4, 'order', 'text', 'Order', 1, 1, 1, 1, 1, 1, '{\"default\":1}', 3),
(25, 4, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 4),
(26, 4, 'slug', 'text', 'Slug', 1, 1, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"name\"}}', 5),
(27, 4, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 0, 0, 0, NULL, 6),
(28, 4, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 7),
(29, 5, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(30, 5, 'author_id', 'text', 'Author', 1, 0, 1, 1, 0, 1, NULL, 2),
(31, 5, 'category_id', 'text', 'Category', 1, 0, 1, 1, 1, 0, NULL, 3),
(32, 5, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, NULL, 4),
(33, 5, 'excerpt', 'text_area', 'Excerpt', 1, 0, 1, 1, 1, 1, NULL, 5),
(34, 5, 'body', 'rich_text_box', 'Body', 1, 0, 1, 1, 1, 1, NULL, 6),
(35, 5, 'image', 'image', 'Post Image', 0, 1, 1, 1, 1, 1, '{\"resize\":{\"width\":\"1000\",\"height\":\"null\"},\"quality\":\"70%\",\"upsize\":true,\"thumbnails\":[{\"name\":\"medium\",\"scale\":\"50%\"},{\"name\":\"small\",\"scale\":\"25%\"},{\"name\":\"cropped\",\"crop\":{\"width\":\"300\",\"height\":\"250\"}}]}', 7),
(36, 5, 'slug', 'text', 'Slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\",\"forceUpdate\":true},\"validation\":{\"rule\":\"unique:posts,slug\"}}', 8),
(37, 5, 'meta_description', 'text_area', 'Meta Description', 1, 0, 1, 1, 1, 1, NULL, 9),
(38, 5, 'meta_keywords', 'text_area', 'Meta Keywords', 1, 0, 1, 1, 1, 1, NULL, 10),
(39, 5, 'status', 'select_dropdown', 'Status', 1, 1, 1, 1, 1, 1, '{\"default\":\"DRAFT\",\"options\":{\"PUBLISHED\":\"published\",\"DRAFT\":\"draft\",\"PENDING\":\"pending\"}}', 11),
(40, 5, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, NULL, 12),
(41, 5, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 13),
(42, 5, 'seo_title', 'text', 'SEO Title', 0, 1, 1, 1, 1, 1, NULL, 14),
(43, 5, 'featured', 'checkbox', 'Featured', 1, 1, 1, 1, 1, 1, NULL, 15),
(44, 6, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(45, 6, 'author_id', 'text', 'Author', 1, 0, 0, 0, 0, 0, NULL, 2),
(46, 6, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, NULL, 3),
(47, 6, 'excerpt', 'text_area', 'Excerpt', 1, 0, 1, 1, 1, 1, NULL, 4),
(48, 6, 'body', 'rich_text_box', 'Body', 1, 0, 1, 1, 1, 1, NULL, 5),
(49, 6, 'slug', 'text', 'Slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\"},\"validation\":{\"rule\":\"unique:pages,slug\"}}', 6),
(50, 6, 'meta_description', 'text', 'Meta Description', 1, 0, 1, 1, 1, 1, NULL, 7),
(51, 6, 'meta_keywords', 'text', 'Meta Keywords', 1, 0, 1, 1, 1, 1, NULL, 8),
(52, 6, 'status', 'select_dropdown', 'Status', 1, 1, 1, 1, 1, 1, '{\"default\":\"INACTIVE\",\"options\":{\"INACTIVE\":\"INACTIVE\",\"ACTIVE\":\"ACTIVE\"}}', 9),
(53, 6, 'created_at', 'timestamp', 'Created At', 1, 1, 1, 0, 0, 0, NULL, 10),
(54, 6, 'updated_at', 'timestamp', 'Updated At', 1, 0, 0, 0, 0, 0, NULL, 11),
(55, 6, 'image', 'image', 'Page Image', 0, 1, 1, 1, 1, 1, NULL, 12),
(56, 7, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(57, 7, 'uuid', 'text', 'Uuid', 1, 1, 1, 1, 1, 1, '{\"validation\":{\"rule\":\"required|string\"},\"display\":{\"width\":12,\"id\":\"id\"}}', 2),
(58, 7, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, '{\"validation\":{\"rule\":\"required|string\"},\"display\":{\"width\":12}}', 3),
(59, 7, 'sub_title', 'text', 'Sub Title', 0, 0, 0, 1, 1, 1, '{\"validation\":{\"rule\":\"required|string\"},\"display\":{\"width\":12}}', 4),
(60, 7, 'is_paid', 'checkbox', 'Is Paid', 1, 1, 1, 1, 1, 1, '{\"display\":{\"width\":4},\"on\":\"Paid\",\"off\":\"Free\",\"checked\":true}', 7),
(61, 7, 'price', 'number', 'Price', 1, 1, 1, 1, 1, 1, '{\"validation\":{\"rule\":\"nullable|integer|gt:0\"},\"display\":{\"width\":8}}', 8),
(62, 7, 'from', 'date', 'From', 0, 0, 0, 1, 1, 1, '{\"validation\":{\"rule\":\"nullable|date|before:to\"},\"display\":{\"width\":6}}', 5),
(63, 7, 'to', 'date', 'To', 0, 0, 0, 1, 1, 1, '{\"validation\":{\"rule\":\"nullable|date|after:form\"},\"display\":{\"width\":6}}', 6),
(64, 7, 'duration', 'number', 'Duration (min)', 1, 0, 0, 1, 1, 1, '{\"validation\":{\"rule\":\"required|integer\"},\"display\":{\"width\":6}}', 9),
(65, 7, 'point', 'number', 'Point', 1, 0, 0, 1, 1, 1, '{\"validation\":{\"rule\":\"required|integer\"},\"display\":{\"width\":6},\"default\":1}', 10),
(66, 7, 'minimum_to_pass', 'number', 'Minimum To Pass (%)', 1, 0, 0, 1, 1, 1, '{\"validation\":{\"rule\":\"required|integer\"},\"display\":{\"width\":12},\"default\":33}', 11),
(67, 7, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 1, 0, 1, '{}', 12),
(68, 7, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 13),
(69, 9, 'id', 'text', 'Unique ID', 1, 1, 1, 1, 1, 1, '{\"validation\":{\"rule\":\"required\"},\"display\":{\"id\":\"id\",\"width\":12}}', 1),
(70, 9, 'user_id', 'text', 'User Id', 1, 1, 1, 1, 1, 1, '{}', 2),
(71, 9, 'package_id', 'text', 'Package Id', 1, 1, 1, 1, 1, 1, '{}', 5),
(72, 9, 'is_paid', 'checkbox', 'Paid', 1, 1, 1, 1, 1, 1, '{\"display\":{\"id\":\"price_toggle\",\"width\":6},\"on\":\"Paid\",\"off\":\"Free\",\"checked\":false}', 6),
(73, 9, 'expired_at', 'text', 'Expired At', 0, 1, 1, 1, 1, 1, '{\"display\":{\"id\":\"expired_date_field\",\"width\":12}}', 8),
(74, 9, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 9),
(75, 9, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 10),
(76, 9, 'infinite_duration', 'checkbox', 'Duration', 1, 1, 1, 1, 1, 1, '{\"display\":{\"id\":\"duration_toggle\",\"width\":6},\"on\":\"Infinite\",\"off\":\"Finite\",\"checked\":true}', 7),
(77, 9, 'user_meta_belongsto_user_relationship', 'relationship', 'User', 0, 1, 1, 1, 1, 1, '{\"default\":\"\",\"null\":\"\",\"options\":{\"\":\"-- None --\"},\"display\":{\"width\":6},\"scope\":\"customer\",\"model\":\"App\\\\Models\\\\User\",\"table\":\"users\",\"type\":\"belongsTo\",\"column\":\"user_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"categoriables\",\"pivot\":\"0\",\"taggable\":\"0\"}', 3),
(78, 9, 'user_meta_belongsto_package_relationship', 'relationship', 'Package', 1, 1, 1, 1, 1, 1, '{\"default\":\"\",\"null\":\"\",\"options\":{\"\":\"-- None --\"},\"display\":{\"id\":\"package_select\",\"width\":6},\"model\":\"App\\\\Models\\\\Package\",\"table\":\"packages\",\"type\":\"belongsTo\",\"column\":\"package_id\",\"key\":\"id\",\"label\":\"title\",\"pivot_table\":\"categoriables\",\"pivot\":\"0\",\"taggable\":\"0\"}', 4),
(79, 10, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(80, 10, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, '{\"validation\":{\"rule\":\"required|string\"},\"display\":{\"width\":12}}', 2),
(81, 10, 'price', 'number', 'Price', 0, 1, 1, 1, 1, 1, '{\"min\":0,\"default\":0,\"validation\":{\"rule\":\"nullable|integer|gt:0\"},\"display\":{\"width\":6,\"id\":\"price_field\"}}', 5),
(82, 10, 'duration', 'number', 'Duration', 0, 1, 1, 1, 1, 1, '{\"min\":0,\"default\":0,\"validation\":{\"rule\":\"nullable|integer|gt:0\"},\"display\":{\"width\":6,\"id\":\"duration_field\"}}', 6),
(83, 10, 'paid', 'checkbox', 'Paid', 1, 1, 1, 1, 1, 1, '{\"display\":{\"id\":\"price_toggle\",\"width\":6},\"on\":\"Paid\",\"off\":\"Free\",\"checked\":false}', 3),
(84, 10, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 7),
(85, 10, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 8),
(86, 10, 'infinite_duration', 'checkbox', 'Infinite Duration', 1, 1, 1, 1, 1, 1, '{\"display\":{\"id\":\"duration_toggle\",\"width\":6},\"on\":\"Infinite\",\"off\":\"Finite\",\"checked\":true}', 4),
(87, 1, 'phone', 'text', 'Phone', 1, 1, 1, 1, 1, 1, '{\"validation\":{\"rule\":\"required|string|unique:users,phone\"}}', 5),
(88, 1, 'email_verified_at', 'timestamp', 'Email Verified At', 0, 0, 0, 0, 0, 0, '{}', 10),
(89, 12, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(90, 12, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{\"validation\":{\"rule\":\"required|string\"},\"display\":{\"width\":6}}', 2),
(91, 12, 'slug', 'text', 'Slug', 1, 1, 1, 1, 1, 1, '{\"validation\":{\"rule\":\"required|string|unique:subjects,slug\"},\"display\":{\"width\":6},\"slugify\":{\"origin\":\"name\",\"forceUpdate\":true}}', 3),
(92, 12, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 4),
(93, 12, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 5),
(94, 13, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 2),
(95, 13, 'level', 'select_dropdown', 'Level', 1, 1, 1, 1, 1, 1, '{\"validation\":{\"rule\":\"required|in:easy,normal,hard\"},\"display\":{\"width\":4},\"default\":\"easy\",\"options\":{\"easy\":\"Easy *\",\"normal\":\"Medium **\",\"hard\":\"Hard ***\"}}', 4),
(96, 13, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, '{\"validation\":{\"rule\":\"required|string\"},\"display\":{\"width\":8}}', 3),
(97, 13, 'answer', 'text', 'Answer', 1, 1, 1, 0, 0, 1, '{\"validation\":{\"rule\":\"required|string\"},\"display\":{\"width\":2}}', 5),
(98, 13, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 6),
(99, 13, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 7),
(100, 13, 'question_belongstomany_exam_relationship', 'relationship', 'Exams', 1, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Exam\",\"table\":\"exams\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"uuid\",\"pivot_table\":\"exam_question\",\"pivot\":\"1\",\"taggable\":\"0\"}', 1),
(101, 1, 'active', 'text', 'Active', 0, 1, 1, 1, 1, 1, '{\"default\":\"0\",\"options\":{\"0\":\"Deactive\",\"1\":\"Active\"}}', 6);

-- --------------------------------------------------------

--
-- Table structure for table `data_types`
--

CREATE TABLE `data_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT '0',
  `server_side` tinyint(4) NOT NULL DEFAULT '0',
  `details` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_types`
--

INSERT INTO `data_types` (`id`, `name`, `slug`, `display_name_singular`, `display_name_plural`, `icon`, `model_name`, `policy_name`, `controller`, `description`, `generate_permissions`, `server_side`, `details`, `created_at`, `updated_at`) VALUES
(1, 'users', 'users', 'User', 'Users', 'voyager-person', 'TCG\\Voyager\\Models\\User', 'TCG\\Voyager\\Policies\\UserPolicy', 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController', NULL, 1, 1, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":null}', '2022-05-08 09:16:01', '2022-05-12 00:51:11'),
(2, 'menus', 'menus', 'Menu', 'Menus', 'voyager-list', 'TCG\\Voyager\\Models\\Menu', NULL, '', '', 1, 0, NULL, '2022-05-08 09:16:01', '2022-05-08 09:16:01'),
(3, 'roles', 'roles', 'Role', 'Roles', 'voyager-lock', 'TCG\\Voyager\\Models\\Role', NULL, 'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController', '', 1, 0, NULL, '2022-05-08 09:16:01', '2022-05-08 09:16:01'),
(4, 'categories', 'categories', 'Category', 'Categories', 'voyager-categories', 'TCG\\Voyager\\Models\\Category', NULL, '', '', 1, 0, NULL, '2022-05-08 09:17:37', '2022-05-08 09:17:37'),
(5, 'posts', 'posts', 'Post', 'Posts', 'voyager-news', 'TCG\\Voyager\\Models\\Post', 'TCG\\Voyager\\Policies\\PostPolicy', '', '', 1, 0, NULL, '2022-05-08 09:17:37', '2022-05-08 09:17:37'),
(6, 'pages', 'pages', 'Page', 'Pages', 'voyager-file-text', 'TCG\\Voyager\\Models\\Page', NULL, '', '', 1, 0, NULL, '2022-05-08 09:17:37', '2022-05-08 09:17:37'),
(7, 'exams', 'exams', 'Exam', 'Exams', 'voyager-certificate', 'App\\Models\\Exam', NULL, '\\App\\Http\\Controllers\\ExamVoyagerController', NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-05-08 09:20:57', '2022-05-10 06:32:48'),
(9, 'user_metas', 'user-metas', 'Customer Information', 'Customer Informations', NULL, 'App\\Models\\UserMeta', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-05-10 04:14:04', '2022-05-12 01:48:15'),
(10, 'packages', 'packages', 'Package', 'Packages', 'voyager-treasure-open', 'App\\Models\\Package', NULL, NULL, NULL, 1, 1, '{\"order_column\":\"id\",\"order_display_column\":\"title\",\"order_direction\":\"desc\",\"default_search_key\":\"title\",\"scope\":null}', '2022-05-10 04:34:54', '2022-05-10 04:52:44'),
(12, 'subjects', 'subjects', 'Subject', 'Subjects', 'voyager-book', 'App\\Models\\Subject', NULL, NULL, NULL, 1, 1, '{\"order_column\":\"id\",\"order_display_column\":\"name\",\"order_direction\":\"desc\",\"default_search_key\":\"name\",\"scope\":null}', '2022-05-10 05:27:37', '2022-05-10 05:30:54'),
(13, 'questions', 'questions', 'Question', 'Questions', 'voyager-question', 'App\\Models\\Question', NULL, '\\App\\Http\\Controllers\\QuestionsVoyagerController', NULL, 1, 1, '{\"order_column\":\"id\",\"order_display_column\":\"title\",\"order_direction\":\"desc\",\"default_search_key\":\"title\",\"scope\":null}', '2022-05-11 13:25:02', '2022-05-12 04:25:58');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_paid` tinyint(1) NOT NULL DEFAULT '0',
  `price` bigint(20) NOT NULL,
  `from` datetime DEFAULT NULL,
  `to` datetime DEFAULT NULL,
  `duration` int(11) NOT NULL,
  `point` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `minimum_to_pass` int(10) UNSIGNED NOT NULL DEFAULT '33',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `uuid`, `title`, `sub_title`, `is_paid`, `price`, `from`, `to`, `duration`, `point`, `minimum_to_pass`, `created_at`, `updated_at`) VALUES
(1, 'EXM202299998', 'Minim ratione nihil', 'Dolore beatae in qua', 1, 769, '1976-01-28 00:00:00', '1980-06-03 00:00:00', 29, 18, 18, '2022-05-12 00:38:50', '2022-05-12 00:38:50');

-- --------------------------------------------------------

--
-- Table structure for table `exam_question`
--

CREATE TABLE `exam_question` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exam_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_question`
--

INSERT INTO `exam_question` (`id`, `exam_id`, `question_id`, `created_at`, `updated_at`) VALUES
(15, '1', 16, NULL, NULL);

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2022-05-08 09:16:01', '2022-05-08 09:16:01');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_id`, `title`, `url`, `target`, `icon_class`, `color`, `parent_id`, `order`, `created_at`, `updated_at`, `route`, `parameters`) VALUES
(1, 1, 'Dashboard', '', '_self', 'voyager-boat', NULL, NULL, 1, '2022-05-08 09:16:01', '2022-05-08 09:16:01', 'voyager.dashboard', NULL),
(2, 1, 'Media', '', '_self', 'voyager-images', NULL, 5, 1, '2022-05-08 09:16:01', '2022-05-10 05:35:55', 'voyager.media.index', NULL),
(3, 1, 'Customer', '', '_self', 'voyager-person', '#000000', 17, 2, '2022-05-08 09:16:01', '2022-05-12 01:48:47', 'voyager.users.index', '{\"key\":\"role_id\",\"filter\":\"contains\",\"s\":\"Normal User\"}'),
(4, 1, 'Roles', '', '_self', 'voyager-lock', NULL, 17, 4, '2022-05-08 09:16:01', '2022-05-10 05:05:16', 'voyager.roles.index', NULL),
(5, 1, 'Tools', '', '_self', 'voyager-tools', NULL, NULL, 8, '2022-05-08 09:16:01', '2022-05-10 05:37:17', NULL, NULL),
(6, 1, 'Menu Builder', '', '_self', 'voyager-list', NULL, 5, 2, '2022-05-08 09:16:01', '2022-05-10 05:35:55', 'voyager.menus.index', NULL),
(7, 1, 'Database', '', '_self', 'voyager-data', NULL, 5, 3, '2022-05-08 09:16:01', '2022-05-10 05:35:55', 'voyager.database.index', NULL),
(8, 1, 'Compass', '', '_self', 'voyager-compass', NULL, 5, 4, '2022-05-08 09:16:01', '2022-05-10 05:35:55', 'voyager.compass.index', NULL),
(9, 1, 'BREAD', '', '_self', 'voyager-bread', NULL, 5, 5, '2022-05-08 09:16:01', '2022-05-10 05:35:55', 'voyager.bread.index', NULL),
(10, 1, 'Settings', '', '_self', 'voyager-settings', NULL, NULL, 9, '2022-05-08 09:16:01', '2022-05-10 05:37:17', 'voyager.settings.index', NULL),
(11, 1, 'Categories', '', '_self', 'voyager-categories', NULL, NULL, 5, '2022-05-08 09:17:37', '2022-05-10 05:37:24', 'voyager.categories.index', NULL),
(12, 1, 'Posts', '', '_self', 'voyager-news', NULL, 21, 2, '2022-05-08 09:17:37', '2022-05-10 05:37:17', 'voyager.posts.index', NULL),
(13, 1, 'Pages', '', '_self', 'voyager-file-text', NULL, 21, 1, '2022-05-08 09:17:37', '2022-05-10 05:37:11', 'voyager.pages.index', NULL),
(14, 1, 'Exams', '', '_self', 'voyager-certificate', NULL, NULL, 6, '2022-05-08 09:20:57', '2022-05-10 05:37:17', 'voyager.exams.index', NULL),
(15, 1, 'Customer Informations', '', '_self', 'voyager-info-circled', '#000000', 17, 3, '2022-05-10 04:14:04', '2022-05-12 01:48:59', 'voyager.user-metas.index', 'null'),
(16, 1, 'Packages', '', '_self', 'voyager-treasure-open', NULL, NULL, 3, '2022-05-10 04:34:54', '2022-05-10 05:37:24', 'voyager.packages.index', NULL),
(17, 1, 'User Controls', '#', '_self', 'voyager-group', '#000000', NULL, 2, '2022-05-10 04:57:50', '2022-05-10 04:57:58', NULL, ''),
(18, 1, 'Admins', '', '_self', 'voyager-person', '#000000', 17, 1, '2022-05-10 05:05:05', '2022-05-10 05:05:16', 'voyager.users.index', '{\"key\":\"role_id\",\"filter\":\"contains\",\"s\":\"Administrator\"}'),
(19, 1, 'Subjects', '', '_self', 'voyager-book', NULL, NULL, 4, '2022-05-10 05:27:37', '2022-05-10 05:37:24', 'voyager.subjects.index', NULL),
(21, 1, 'Publish', '#', '_self', 'voyager-news', '#000000', NULL, 7, '2022-05-10 05:36:54', '2022-05-10 05:37:17', NULL, ''),
(22, 1, 'Questions', '', '_self', 'voyager-question', NULL, NULL, 10, '2022-05-11 13:25:02', '2022-05-11 13:25:02', 'voyager.questions.index', NULL);

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
(41, '2014_10_12_000000_create_users_table', 1),
(42, '2014_10_12_100000_create_password_resets_table', 1),
(43, '2016_01_01_000000_add_voyager_user_fields', 1),
(44, '2016_01_01_000000_create_data_types_table', 1),
(45, '2016_01_01_000000_create_pages_table', 1),
(46, '2016_01_01_000000_create_posts_table', 1),
(47, '2016_02_15_204651_create_categories_table', 1),
(48, '2016_05_19_173453_create_menu_table', 1),
(49, '2016_10_21_190000_create_roles_table', 1),
(50, '2016_10_21_190000_create_settings_table', 1),
(51, '2016_11_30_135954_create_permission_table', 1),
(52, '2016_11_30_141208_create_permission_role_table', 1),
(53, '2016_12_26_201236_data_types__add__server_side', 1),
(54, '2017_01_13_000000_add_route_to_menu_items_table', 1),
(55, '2017_01_14_005015_create_translations_table', 1),
(56, '2017_01_15_000000_make_table_name_nullable_in_permissions_table', 1),
(57, '2017_03_06_000000_add_controller_to_data_types_table', 1),
(58, '2017_04_11_000000_alter_post_nullable_fields_table', 1),
(59, '2017_04_21_000000_add_order_to_data_rows_table', 1),
(60, '2017_07_05_210000_add_policyname_to_data_types_table', 1),
(61, '2017_08_05_000000_add_group_to_settings_table', 1),
(62, '2017_11_26_013050_add_user_role_relationship', 1),
(63, '2017_11_26_015000_create_user_roles_table', 1),
(64, '2018_03_11_000000_add_user_settings', 1),
(65, '2018_03_14_000000_add_details_to_data_types_table', 1),
(66, '2018_03_16_000000_make_settings_value_nullable', 1),
(67, '2019_08_19_000000_create_failed_jobs_table', 1),
(68, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(69, '2022_04_24_021745_create_subjects_table', 1),
(70, '2022_04_24_051427_create_packages_table', 1),
(71, '2022_05_06_070027_create_user_metas_table', 1),
(72, '2022_05_06_084452_create_exams_table', 1),
(73, '2022_05_06_085816_create_questions_table', 1),
(74, '2022_05_06_085919_create_exam_question_table', 1),
(75, '2022_05_06_090350_create_choices_table', 1),
(76, '2022_05_06_104157_create_categoriables_table', 1),
(77, '2022_05_07_055359_create_subjectables_table', 1),
(78, '2022_05_07_085738_add_infinite_to_packages_table', 1),
(79, '2022_05_07_110936_add_infinite_to_user_metas_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` bigint(20) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `paid` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `infinite_duration` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `title`, `price`, `duration`, `paid`, `created_at`, `updated_at`, `infinite_duration`) VALUES
(4, '3 Month', 150, 30, 1, '2022-05-10 04:52:58', '2022-05-10 04:53:39', 0),
(5, 'Free', NULL, NULL, 0, '2022-05-10 23:35:19', '2022-05-12 01:46:42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'INACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `author_id`, `title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 'Hello World', 'Hang the jib grog grog blossom grapple dance the hempen jig gangway pressgang bilge rat to go on account lugger. Nelsons folly gabion line draught scallywag fire ship gaff fluke fathom case shot. Sea Legs bilge rat sloop matey gabion long clothes run a shot across the bow Gold Road cog league.', '<p>Hello World. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\r\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', 'pages/page1.jpg', 'hello-world', 'Yar Meta Description', 'Keyword1, Keyword2', 'ACTIVE', '2022-05-08 09:17:37', '2022-05-08 09:17:37');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `key`, `table_name`, `created_at`, `updated_at`) VALUES
(1, 'browse_admin', NULL, '2022-05-08 09:16:01', '2022-05-08 09:16:01'),
(2, 'browse_bread', NULL, '2022-05-08 09:16:01', '2022-05-08 09:16:01'),
(3, 'browse_database', NULL, '2022-05-08 09:16:01', '2022-05-08 09:16:01'),
(4, 'browse_media', NULL, '2022-05-08 09:16:01', '2022-05-08 09:16:01'),
(5, 'browse_compass', NULL, '2022-05-08 09:16:01', '2022-05-08 09:16:01'),
(6, 'browse_menus', 'menus', '2022-05-08 09:16:01', '2022-05-08 09:16:01'),
(7, 'read_menus', 'menus', '2022-05-08 09:16:01', '2022-05-08 09:16:01'),
(8, 'edit_menus', 'menus', '2022-05-08 09:16:01', '2022-05-08 09:16:01'),
(9, 'add_menus', 'menus', '2022-05-08 09:16:01', '2022-05-08 09:16:01'),
(10, 'delete_menus', 'menus', '2022-05-08 09:16:01', '2022-05-08 09:16:01'),
(11, 'browse_roles', 'roles', '2022-05-08 09:16:01', '2022-05-08 09:16:01'),
(12, 'read_roles', 'roles', '2022-05-08 09:16:01', '2022-05-08 09:16:01'),
(13, 'edit_roles', 'roles', '2022-05-08 09:16:01', '2022-05-08 09:16:01'),
(14, 'add_roles', 'roles', '2022-05-08 09:16:01', '2022-05-08 09:16:01'),
(15, 'delete_roles', 'roles', '2022-05-08 09:16:01', '2022-05-08 09:16:01'),
(16, 'browse_users', 'users', '2022-05-08 09:16:01', '2022-05-08 09:16:01'),
(17, 'read_users', 'users', '2022-05-08 09:16:01', '2022-05-08 09:16:01'),
(18, 'edit_users', 'users', '2022-05-08 09:16:01', '2022-05-08 09:16:01'),
(19, 'add_users', 'users', '2022-05-08 09:16:01', '2022-05-08 09:16:01'),
(20, 'delete_users', 'users', '2022-05-08 09:16:01', '2022-05-08 09:16:01'),
(21, 'browse_settings', 'settings', '2022-05-08 09:16:01', '2022-05-08 09:16:01'),
(22, 'read_settings', 'settings', '2022-05-08 09:16:01', '2022-05-08 09:16:01'),
(23, 'edit_settings', 'settings', '2022-05-08 09:16:01', '2022-05-08 09:16:01'),
(24, 'add_settings', 'settings', '2022-05-08 09:16:01', '2022-05-08 09:16:01'),
(25, 'delete_settings', 'settings', '2022-05-08 09:16:01', '2022-05-08 09:16:01'),
(26, 'browse_categories', 'categories', '2022-05-08 09:17:37', '2022-05-08 09:17:37'),
(27, 'read_categories', 'categories', '2022-05-08 09:17:37', '2022-05-08 09:17:37'),
(28, 'edit_categories', 'categories', '2022-05-08 09:17:37', '2022-05-08 09:17:37'),
(29, 'add_categories', 'categories', '2022-05-08 09:17:37', '2022-05-08 09:17:37'),
(30, 'delete_categories', 'categories', '2022-05-08 09:17:37', '2022-05-08 09:17:37'),
(31, 'browse_posts', 'posts', '2022-05-08 09:17:37', '2022-05-08 09:17:37'),
(32, 'read_posts', 'posts', '2022-05-08 09:17:37', '2022-05-08 09:17:37'),
(33, 'edit_posts', 'posts', '2022-05-08 09:17:37', '2022-05-08 09:17:37'),
(34, 'add_posts', 'posts', '2022-05-08 09:17:37', '2022-05-08 09:17:37'),
(35, 'delete_posts', 'posts', '2022-05-08 09:17:37', '2022-05-08 09:17:37'),
(36, 'browse_pages', 'pages', '2022-05-08 09:17:37', '2022-05-08 09:17:37'),
(37, 'read_pages', 'pages', '2022-05-08 09:17:37', '2022-05-08 09:17:37'),
(38, 'edit_pages', 'pages', '2022-05-08 09:17:37', '2022-05-08 09:17:37'),
(39, 'add_pages', 'pages', '2022-05-08 09:17:37', '2022-05-08 09:17:37'),
(40, 'delete_pages', 'pages', '2022-05-08 09:17:37', '2022-05-08 09:17:37'),
(41, 'browse_exams', 'exams', '2022-05-08 09:20:57', '2022-05-08 09:20:57'),
(42, 'read_exams', 'exams', '2022-05-08 09:20:57', '2022-05-08 09:20:57'),
(43, 'edit_exams', 'exams', '2022-05-08 09:20:57', '2022-05-08 09:20:57'),
(44, 'add_exams', 'exams', '2022-05-08 09:20:57', '2022-05-08 09:20:57'),
(45, 'delete_exams', 'exams', '2022-05-08 09:20:57', '2022-05-08 09:20:57'),
(46, 'browse_user_metas', 'user_metas', '2022-05-10 04:14:04', '2022-05-10 04:14:04'),
(47, 'read_user_metas', 'user_metas', '2022-05-10 04:14:04', '2022-05-10 04:14:04'),
(48, 'edit_user_metas', 'user_metas', '2022-05-10 04:14:04', '2022-05-10 04:14:04'),
(49, 'add_user_metas', 'user_metas', '2022-05-10 04:14:04', '2022-05-10 04:14:04'),
(50, 'delete_user_metas', 'user_metas', '2022-05-10 04:14:04', '2022-05-10 04:14:04'),
(51, 'browse_packages', 'packages', '2022-05-10 04:34:54', '2022-05-10 04:34:54'),
(52, 'read_packages', 'packages', '2022-05-10 04:34:54', '2022-05-10 04:34:54'),
(53, 'edit_packages', 'packages', '2022-05-10 04:34:54', '2022-05-10 04:34:54'),
(54, 'add_packages', 'packages', '2022-05-10 04:34:54', '2022-05-10 04:34:54'),
(55, 'delete_packages', 'packages', '2022-05-10 04:34:54', '2022-05-10 04:34:54'),
(56, 'browse_subjects', 'subjects', '2022-05-10 05:27:37', '2022-05-10 05:27:37'),
(57, 'read_subjects', 'subjects', '2022-05-10 05:27:37', '2022-05-10 05:27:37'),
(58, 'edit_subjects', 'subjects', '2022-05-10 05:27:37', '2022-05-10 05:27:37'),
(59, 'add_subjects', 'subjects', '2022-05-10 05:27:37', '2022-05-10 05:27:37'),
(60, 'delete_subjects', 'subjects', '2022-05-10 05:27:37', '2022-05-10 05:27:37'),
(61, 'browse_questions', 'questions', '2022-05-11 13:25:02', '2022-05-11 13:25:02'),
(62, 'read_questions', 'questions', '2022-05-11 13:25:02', '2022-05-11 13:25:02'),
(63, 'edit_questions', 'questions', '2022-05-11 13:25:02', '2022-05-11 13:25:02'),
(64, 'add_questions', 'questions', '2022-05-11 13:25:02', '2022-05-11 13:25:02'),
(65, 'delete_questions', 'questions', '2022-05-11 13:25:02', '2022-05-11 13:25:02');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1);

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
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `status` enum('PUBLISHED','DRAFT','PENDING') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'DRAFT',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `author_id`, `category_id`, `title`, `seo_title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `featured`, `created_at`, `updated_at`) VALUES
(1, 0, NULL, 'Lorem Ipsum Post', NULL, 'This is the excerpt for the Lorem Ipsum Post', '<p>This is the body of the lorem ipsum post</p>', 'posts/post1.jpg', 'lorem-ipsum-post', 'This is the meta description', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2022-05-08 09:17:37', '2022-05-08 09:17:37'),
(2, 0, NULL, 'My Sample Post', NULL, 'This is the excerpt for the sample Post', '<p>This is the body for the sample post, which includes the body.</p>\r\n                <h2>We can use all kinds of format!</h2>\r\n                <p>And include a bunch of other stuff.</p>', 'posts/post2.jpg', 'my-sample-post', 'Meta Description for sample post', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2022-05-08 09:17:37', '2022-05-08 09:17:37'),
(3, 0, NULL, 'Latest Post', NULL, 'This is the excerpt for the latest post', '<p>This is the body for the latest post</p>', 'posts/post3.jpg', 'latest-post', 'This is the meta description', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2022-05-08 09:17:37', '2022-05-08 09:17:37'),
(4, 0, NULL, 'Yarr Post', NULL, 'Reef sails nipperkin bring a spring upon her cable coffer jury mast spike marooned Pieces of Eight poop deck pillage. Clipper driver coxswain galleon hempen halter come about pressgang gangplank boatswain swing the lead. Nipperkin yard skysail swab lanyard Blimey bilge water ho quarter Buccaneer.', '<p>Swab deadlights Buccaneer fire ship square-rigged dance the hempen jig weigh anchor cackle fruit grog furl. Crack Jennys tea cup chase guns pressgang hearties spirits hogshead Gold Road six pounders fathom measured fer yer chains. Main sheet provost come about trysail barkadeer crimp scuttle mizzenmast brig plunder.</p>\r\n<p>Mizzen league keelhaul galleon tender cog chase Barbary Coast doubloon crack Jennys tea cup. Blow the man down lugsail fire ship pinnace cackle fruit line warp Admiral of the Black strike colors doubloon. Tackle Jack Ketch come about crimp rum draft scuppers run a shot across the bow haul wind maroon.</p>\r\n<p>Interloper heave down list driver pressgang holystone scuppers tackle scallywag bilged on her anchor. Jack Tar interloper draught grapple mizzenmast hulk knave cable transom hogshead. Gaff pillage to go on account grog aft chase guns piracy yardarm knave clap of thunder.</p>', 'posts/post4.jpg', 'yarr-post', 'this be a meta descript', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2022-05-08 09:17:37', '2022-05-08 09:17:37');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `level` enum('easy','normal','hard') COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `level`, `title`, `answer`, `created_at`, `updated_at`) VALUES
(16, 'easy', 'Capital of Banglades', '252', '2022-05-12 06:00:15', '2022-05-12 06:00:15');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', '2022-05-08 09:16:01', '2022-05-08 09:16:01'),
(2, 'user', 'Normal User', '2022-05-08 09:16:01', '2022-05-08 09:16:01');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `details` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `display_name`, `value`, `details`, `type`, `order`, `group`) VALUES
(1, 'site.title', 'Site Title', 'Site Title', '', 'text', 1, 'Site'),
(2, 'site.description', 'Site Description', 'Site Description', '', 'text', 2, 'Site'),
(3, 'site.logo', 'Site Logo', '', '', 'image', 3, 'Site'),
(4, 'site.google_analytics_tracking_id', 'Google Analytics Tracking ID', NULL, '', 'text', 4, 'Site'),
(5, 'admin.bg_image', 'Admin Background Image', 'settings\\May2022\\fIpT6a6V9JuweUiXzmGC.jpg', '', 'image', 5, 'Admin'),
(6, 'admin.title', 'Admin Title', 'Control Panel', '', 'text', 1, 'Admin'),
(7, 'admin.description', 'Admin Description', 'Bd job war dashboard', '', 'text', 2, 'Admin'),
(8, 'admin.loader', 'Admin Loader', 'settings\\May2022\\i437uvokW1uPaJmDc9la.png', '', 'image', 3, 'Admin'),
(9, 'admin.icon_image', 'Admin Icon Image', 'settings\\May2022\\pWrjWFGnIIBN6r2jSAh2.png', '', 'image', 4, 'Admin'),
(10, 'admin.google_analytics_client_id', 'Google Analytics Client ID (used for admin dashboard)', NULL, '', 'text', 1, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `subjectables`
--

CREATE TABLE `subjectables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `subjectable_id` bigint(20) UNSIGNED NOT NULL,
  `subjectable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjectables`
--

INSERT INTO `subjectables` (`id`, `subject_id`, `subjectable_id`, `subjectable_type`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'App\\Models\\Exam', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(2, 'Advanced Mathmetics', 'advanced-mathmetics', '2022-05-10 05:28:07', '2022-05-10 05:28:07');

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

CREATE TABLE `translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `translations`
--

INSERT INTO `translations` (`id`, `table_name`, `column_name`, `foreign_key`, `locale`, `value`, `created_at`, `updated_at`) VALUES
(1, 'data_types', 'display_name_singular', 5, 'pt', 'Post', '2022-05-08 09:17:37', '2022-05-08 09:17:37'),
(2, 'data_types', 'display_name_singular', 6, 'pt', 'Página', '2022-05-08 09:17:37', '2022-05-08 09:17:37'),
(3, 'data_types', 'display_name_singular', 1, 'pt', 'Utilizador', '2022-05-08 09:17:37', '2022-05-08 09:17:37'),
(4, 'data_types', 'display_name_singular', 4, 'pt', 'Categoria', '2022-05-08 09:17:37', '2022-05-08 09:17:37'),
(5, 'data_types', 'display_name_singular', 2, 'pt', 'Menu', '2022-05-08 09:17:37', '2022-05-08 09:17:37'),
(6, 'data_types', 'display_name_singular', 3, 'pt', 'Função', '2022-05-08 09:17:37', '2022-05-08 09:17:37'),
(7, 'data_types', 'display_name_plural', 5, 'pt', 'Posts', '2022-05-08 09:17:37', '2022-05-08 09:17:37'),
(8, 'data_types', 'display_name_plural', 6, 'pt', 'Páginas', '2022-05-08 09:17:37', '2022-05-08 09:17:37'),
(9, 'data_types', 'display_name_plural', 1, 'pt', 'Utilizadores', '2022-05-08 09:17:37', '2022-05-08 09:17:37'),
(10, 'data_types', 'display_name_plural', 4, 'pt', 'Categorias', '2022-05-08 09:17:37', '2022-05-08 09:17:37'),
(11, 'data_types', 'display_name_plural', 2, 'pt', 'Menus', '2022-05-08 09:17:37', '2022-05-08 09:17:37'),
(12, 'data_types', 'display_name_plural', 3, 'pt', 'Funções', '2022-05-08 09:17:37', '2022-05-08 09:17:37'),
(13, 'categories', 'slug', 1, 'pt', 'categoria-1', '2022-05-08 09:17:37', '2022-05-08 09:17:37'),
(14, 'categories', 'name', 1, 'pt', 'Categoria 1', '2022-05-08 09:17:37', '2022-05-08 09:17:37'),
(15, 'categories', 'slug', 2, 'pt', 'categoria-2', '2022-05-08 09:17:37', '2022-05-08 09:17:37'),
(16, 'categories', 'name', 2, 'pt', 'Categoria 2', '2022-05-08 09:17:37', '2022-05-08 09:17:37'),
(17, 'pages', 'title', 1, 'pt', 'Olá Mundo', '2022-05-08 09:17:37', '2022-05-08 09:17:37'),
(18, 'pages', 'slug', 1, 'pt', 'ola-mundo', '2022-05-08 09:17:37', '2022-05-08 09:17:37'),
(19, 'pages', 'body', 1, 'pt', '<p>Olá Mundo. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\r\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', '2022-05-08 09:17:37', '2022-05-08 09:17:37'),
(20, 'menu_items', 'title', 1, 'pt', 'Painel de Controle', '2022-05-08 09:17:37', '2022-05-08 09:17:37'),
(21, 'menu_items', 'title', 2, 'pt', 'Media', '2022-05-08 09:17:37', '2022-05-08 09:17:37'),
(22, 'menu_items', 'title', 12, 'pt', 'Publicações', '2022-05-08 09:17:37', '2022-05-08 09:17:37'),
(23, 'menu_items', 'title', 3, 'pt', 'Utilizadores', '2022-05-08 09:17:37', '2022-05-08 09:17:37'),
(24, 'menu_items', 'title', 11, 'pt', 'Categorias', '2022-05-08 09:17:37', '2022-05-08 09:17:37'),
(25, 'menu_items', 'title', 13, 'pt', 'Páginas', '2022-05-08 09:17:37', '2022-05-08 09:17:37'),
(26, 'menu_items', 'title', 4, 'pt', 'Funções', '2022-05-08 09:17:37', '2022-05-08 09:17:37'),
(27, 'menu_items', 'title', 5, 'pt', 'Ferramentas', '2022-05-08 09:17:37', '2022-05-08 09:17:37'),
(28, 'menu_items', 'title', 6, 'pt', 'Menus', '2022-05-08 09:17:37', '2022-05-08 09:17:37'),
(29, 'menu_items', 'title', 7, 'pt', 'Base de dados', '2022-05-08 09:17:37', '2022-05-08 09:17:37'),
(30, 'menu_items', 'title', 10, 'pt', 'Configurações', '2022-05-08 09:17:37', '2022-05-08 09:17:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active` tinyint(3) UNSIGNED DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `phone`, `email`, `avatar`, `email_verified_at`, `password`, `remember_token`, `settings`, `created_at`, `updated_at`, `active`) VALUES
(1, 1, 'Admin', '01795560431', 'admin@admin.com', 'users/default.png', NULL, '$2y$10$07rStnMYGMpxvUvyVeLzTey/NVYz69rLBkEgrmNLUk3tdvt.63GMu', 'WJSgDMITeuSi15AOlkPJDjCZQ6hpWvMPpVQagEj09z0IpYmcnYQbGZBjseuI', NULL, '2022-05-08 09:17:37', '2022-05-08 09:17:37', 1),
(2, 2, 'Raya Hartman', '+1 (691) 446-5918', 'tyhu@mailinator.com', 'users/default.png', NULL, '$2y$10$ePaTA52qxXSo1unjrn0AzeAWbLwjCM7N.e3y62UgtpzPlTh1zA6aq', NULL, '{\"locale\":\"en\"}', '2022-05-10 04:59:49', '2022-05-10 04:59:49', 1),
(3, 2, 'Justine Alexander', '+1 (835) 358-7771', 'mojy@mailinator.com', 'users\\May2022\\I7dHp5RHjqLZcgcW2Khf.png', NULL, '$2y$10$UAvPqNQWMnOiun5mz5f1guxgowZM9Ssvyo3IhwnUFRwCMMmyWNk6i', NULL, '{\"locale\":\"en\"}', '2022-05-10 23:34:29', '2022-05-10 23:34:29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_metas`
--

CREATE TABLE `user_metas` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `package_id` bigint(20) UNSIGNED NOT NULL,
  `is_paid` tinyint(1) NOT NULL DEFAULT '0',
  `expired_at` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `infinite_duration` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_metas`
--

INSERT INTO `user_metas` (`id`, `user_id`, `package_id`, `is_paid`, `expired_at`, `created_at`, `updated_at`, `infinite_duration`) VALUES
('2022449998', 2, 5, 0, NULL, '2022-05-12 01:47:12', '2022-05-12 01:47:12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`user_id`, `role_id`) VALUES
(2, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoriables`
--
ALTER TABLE `categoriables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoriables_category_id_foreign` (`category_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `choices`
--
ALTER TABLE `choices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `question_id` (`index`),
  ADD KEY `choices_question_id_foreign` (`question_id`);

--
-- Indexes for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_rows_data_type_id_foreign` (`data_type_id`);

--
-- Indexes for table `data_types`
--
ALTER TABLE `data_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data_types_name_unique` (`name`),
  ADD UNIQUE KEY `data_types_slug_unique` (`slug`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_question`
--
ALTER TABLE `exam_question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_question_question_id_foreign` (`question_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_name_unique` (`name`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_key_index` (`key`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_permission_id_index` (`permission_id`),
  ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `subjectables`
--
ALTER TABLE `subjectables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subjectables_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `user_metas`
--
ALTER TABLE `user_metas`
  ADD KEY `user_metas_user_id_foreign` (`user_id`),
  ADD KEY `user_metas_package_id_foreign` (`package_id`),
  ADD KEY `user_metas_id_index` (`id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `user_roles_user_id_index` (`user_id`),
  ADD KEY `user_roles_role_id_index` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoriables`
--
ALTER TABLE `categoriables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `choices`
--
ALTER TABLE `choices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `data_rows`
--
ALTER TABLE `data_rows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `data_types`
--
ALTER TABLE `data_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `exam_question`
--
ALTER TABLE `exam_question`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `subjectables`
--
ALTER TABLE `subjectables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categoriables`
--
ALTER TABLE `categoriables`
  ADD CONSTRAINT `categoriables_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `choices`
--
ALTER TABLE `choices`
  ADD CONSTRAINT `choices_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `exam_question`
--
ALTER TABLE `exam_question`
  ADD CONSTRAINT `exam_question_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subjectables`
--
ALTER TABLE `subjectables`
  ADD CONSTRAINT `subjectables_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `user_metas`
--
ALTER TABLE `user_metas`
  ADD CONSTRAINT `user_metas_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_metas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
