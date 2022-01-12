-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2021 at 07:48 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `soisv3`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `announcements_id` bigint(20) UNSIGNED NOT NULL,
  `announcement_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `announcement_content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `signature` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `signer_position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `exp_date` date DEFAULT NULL,
  `exp_time` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`announcements_id`, `announcement_title`, `announcement_content`, `signature`, `signer_position`, `user_id`, `status`, `exp_date`, `exp_time`, `created_at`, `updated_at`) VALUES
(1, 'test 1', 'test 1', 'test 1', 'test 1', 1, 0, '2021-10-19', '01:03:00', '2021-10-25 05:04:08', '2021-10-31 09:51:34'),
(2, 'test updated 2', 'test updated 2', 'test updated s2', 'test updated 2', 1, 0, '2021-10-19', '01:23:00', '2021-10-25 05:23:56', '2021-10-31 09:51:34'),
(4, 'test 3', 'test 3', 'test 3', 'test 3', 1, 0, '2021-10-27', '01:50:00', '2021-10-25 05:35:16', '2021-10-31 09:51:34');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `articles_id` bigint(20) UNSIGNED NOT NULL,
  `article_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `article_subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `article_content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `article_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_featured_in_newspage` tinyint(1) DEFAULT NULL,
  `is_article_featured_landing_page` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_article_featured_organization_page` int(11) DEFAULT NULL,
  `is_article_top_news_organization_page` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`articles_id`, `article_title`, `article_subtitle`, `article_content`, `type`, `image`, `status`, `user_id`, `article_slug`, `is_featured_in_newspage`, `is_article_featured_landing_page`, `created_at`, `updated_at`, `is_article_featured_organization_page`, `is_article_top_news_organization_page`) VALUES
(1, 'test title 1', 'test title 1', 'test title 1', 1, NULL, 1, 1, 'test-title-1', 0, 0, '2021-10-24 08:55:17', '2021-10-25 10:20:57', NULL, NULL),
(3, 'test 3', 'test 34', 'test 34\n', 1, NULL, 1, 1, 'test 3', 0, 1, '2021-10-24 09:37:59', '2021-10-24 10:00:08', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `default_interfaces`
--

CREATE TABLE `default_interfaces` (
  `default_interfaces_id` bigint(20) UNSIGNED NOT NULL,
  `interface_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `interface_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `interface_primary_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `interface_secondary_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `interface_tertiary_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `interface_primary_text_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `interface_secondary_text_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `interface_type` int(11) NOT NULL,
  `interface_type_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organization` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `name_of_activity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `objectives` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `participants` int(11) DEFAULT NULL,
  `sponsor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `venue` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_of_activity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `projected_budget` varchar(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `end_date` date DEFAULT NULL,
  `isEventFeat` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `semester`, `school_year`, `course`, `organization`, `date`, `time`, `name_of_activity`, `objectives`, `participants`, `sponsor`, `venue`, `type_of_activity`, `projected_budget`, `status`, `created_at`, `updated_at`, `deleted_at`, `user_id`, `end_date`, `isEventFeat`) VALUES
(1, 'test 1', 'test 1', 'test 1', '2', '2021-09-28', '22:57:00', 'test 1', NULL, 500, 'test 1', 'test 1', 'test 1', '50000', '1', '2021-10-25 03:57:33', '2021-10-25 03:57:33', NULL, 1, NULL, 1),
(2, 'test 2', 'test 2', 'test 2', '3', '2021-10-06', '23:02:00', 'test 2', NULL, 22, 'test 2', 'test 2', 'test 222', '222', '1', '2021-10-25 03:57:49', '2021-10-25 04:02:40', NULL, 1, NULL, 0);

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
-- Table structure for table `interface_types`
--

CREATE TABLE `interface_types` (
  `interface_types_id` bigint(20) UNSIGNED NOT NULL,
  `interface_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2020_05_21_100000_create_teams_table', 1),
(7, '2020_05_21_200000_create_team_user_table', 1),
(8, '2020_05_21_300000_create_team_invitations_table', 1),
(9, '2021_10_24_084905_create_sessions_table', 1),
(10, '2021_10_24_091628_create_pages_table', 2),
(11, '2021_10_24_143637_add_status_to_users_table', 3),
(12, '2021_10_24_144803_add_columns_to_pages_table', 4),
(13, '2021_10_24_150938_create_trix_rich_texts_table', 5),
(14, '2021_10_24_162526_create_articles_table', 6),
(15, '2021_10_24_180706_create_organizations_table', 7),
(16, '2021_10_24_182805_add_status_to_organizations_table', 8),
(17, '2021_10_25_091423_create_roles_table', 9),
(18, '2021_10_25_101809_create_events_table', 10),
(19, '2021_10_25_105900_add_enddate_to_events_table', 11),
(20, '2021_10_25_120501_create_announcements_table', 12),
(21, '2021_10_25_134321_create_tags_table', 13),
(22, '2021_10_25_185912_add_tags_type_to_tags_table', 14),
(23, '2021_10_25_134322_create_tags_table', 15),
(24, '2021_10_25_194655_add_status_to_tags_table', 16),
(25, '2021_10_25_0914231_create_roles_table', 17),
(26, '2021_10_26_083326_create_permissions_table', 18),
(27, '2021_10_26_100733_create_navigation_menus_table', 19),
(28, '2021_10_26_100731_create_navigation_menus_table', 20),
(29, '2021_10_26_121910_create_roles_users_table', 21),
(30, '2021_10_27_082131_create_organizations_users_table', 22),
(31, '2021_10_27_082130_create_organizations_users_table', 23),
(32, '2021_10_27_083814_create_officers_table', 24),
(33, '2021_10_28_102607_add_organization_type_to_organization_table', 24),
(34, '2021_10_28_121317_add_is_featured_orgpage_to_articles_table', 24),
(35, '2021_10_28_173440_add_is_article_top_news_organization_to_articles_table', 25),
(36, '2021_10_28_182422_create_officer_positions_table', 25),
(37, '2021_10_28_183959_add_position_type_to_officers_table', 25),
(38, '2021_10_29_082654_create_interface_types_table', 25),
(39, '2021_10_29_082656_create_default_interfaces_table', 25),
(40, '2021_10_31_104138_create_page_types_table', 25),
(41, '2021_10_31_104899_create_system_assets_table', 25);

-- --------------------------------------------------------

--
-- Table structure for table `navigation_menus`
--

CREATE TABLE `navigation_menus` (
  `navigation_menus_id` bigint(20) UNSIGNED NOT NULL,
  `sequence` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `navigation_menus`
--

INSERT INTO `navigation_menus` (`navigation_menus_id`, `sequence`, `type`, `label`, `slug`, `created_at`, `updated_at`) VALUES
(8, 1, 1, 'Homepage', 'homepage', '2021-10-28 03:44:39', '2021-10-28 03:44:39'),
(9, 2, 1, 'About', 'about', '2021-10-28 03:44:45', '2021-10-29 23:30:12');

-- --------------------------------------------------------

--
-- Table structure for table `officers`
--

CREATE TABLE `officers` (
  `officers_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suffix` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organization_id` bigint(20) UNSIGNED NOT NULL,
  `school_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exp_date` date NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `position_category` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `officer_positions`
--

CREATE TABLE `officer_positions` (
  `officer_positions_id` bigint(20) UNSIGNED NOT NULL,
  `position_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `organizations_id` bigint(20) UNSIGNED NOT NULL,
  `organization_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organization_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organization_details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organization_primary_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organization_secondary_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organization_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'organizations',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `organization_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`organizations_id`, `organization_name`, `organization_logo`, `organization_details`, `organization_primary_color`, `organization_secondary_color`, `organization_slug`, `page_type`, `created_at`, `updated_at`, `status`, `organization_type`) VALUES
(1, 'test 1', NULL, 'test 1', '#1bbede', '#005157', 'test-1', 'organizations', '2021-10-24 11:23:09', '2021-10-29 21:28:00', 0, 0),
(2, 'test 2', NULL, 'test 2', '#ed0707', '#640202', 'test-2', 'organizations', '2021-10-24 11:24:26', '2021-10-29 21:28:01', 0, 0),
(3, 'test update3', NULL, 'test update3', '#ff4000', '#6b3400', 'test update3', 'organizations', '2021-10-25 00:25:17', '2021-10-25 00:31:27', 0, 0),
(4, 'CS', '1635663882.png', '..', '#828282', '#7f7f7f', 'cs', 'organizations', '2021-10-30 01:36:27', '2021-10-31 00:19:21', 1, 1),
(5, 'JMA', '1635588210.png', '...', '#0000ff', '#ff8040', 'jma', 'organizations', '2021-10-30 02:03:30', '2021-10-31 00:20:56', 1, 1),
(6, 'PASOA', '1635664237.png', '...', '#747474', '#858585', 'pasoa', 'organizations', '2021-10-30 02:20:37', '2021-10-31 01:43:33', 1, 1),
(7, 'JPIA', '1635664257.png', '...', '#6b6b6b', '#5c5c5c', 'jpia', 'organizations', '2021-10-30 02:22:57', '2021-10-31 22:43:52', 1, 1),
(8, 'JPSME', '1635664270.png', '...', '#6f6f6f', '#8f8f8f', 'jpsme', 'organizations', '2021-10-30 02:31:58', '2021-10-31 22:43:48', 1, 1),
(9, 'AECES', '1635664279.png', '...', '#6c6c6c', '#737373', 'aeces', 'organizations', '2021-10-30 22:48:05', '2021-10-31 22:43:38', 1, 1),
(10, 'MENTORS', '1635749204.png', '...', '#373737', '#676767', 'mentors', 'organizations', '2021-10-30 23:16:18', '2021-10-31 22:46:44', 1, 1),
(11, 'CSC', '1635749215.png', '...', '#423157', '#5d5d5d', 'csc', 'organizations', '2021-10-30 23:17:47', '2021-10-31 22:46:55', 1, 1),
(12, 'JPMAP', '1635749228.png', '...', '#484848', '#4d4d4d', 'jpmap', 'organizations', '2021-10-30 23:21:19', '2021-10-31 22:47:08', 1, 1),
(13, 'PUPUKAW', '1635749239.png', '...', '#575757', '#595959', 'pupukaw', 'organizations', '2021-10-30 23:34:47', '2021-10-31 22:47:19', 1, 2),
(14, 'ERG', '1635749252.png', '...', '#5b5b5b', '#555555', 'erg', 'organizations', '2021-10-31 22:45:58', '2021-10-31 22:47:32', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `organizations_users`
--

CREATE TABLE `organizations_users` (
  `organizations_users_id` bigint(20) UNSIGNED NOT NULL,
  `organization_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `pages_id` bigint(20) UNSIGNED NOT NULL,
  `is_default_home` tinyint(1) DEFAULT NULL,
  `is_default_not_found` tinyint(1) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `primary_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secondary_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tertiary_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quarternary_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`pages_id`, `is_default_home`, `is_default_not_found`, `title`, `slug`, `content`, `created_at`, `updated_at`, `primary_color`, `secondary_color`, `tertiary_color`, `quarternary_color`, `status`) VALUES
(1, 1, NULL, 'Homepage', 'homepage', '<div>homepage</div>', '2021-10-24 07:20:44', '2021-10-27 23:26:04', NULL, NULL, NULL, NULL, 1),
(2, 0, 1, 'Error 404 page', 'error-404-page', '<div>error 404 page</div>', '2021-10-24 07:20:59', '2021-10-30 06:13:22', NULL, NULL, NULL, NULL, 2),
(3, NULL, NULL, 'About', 'about', '<div>this is the about page</div>', '2021-10-24 07:21:11', '2021-10-27 23:26:31', NULL, NULL, NULL, NULL, 1),
(10, NULL, NULL, 'Test', 'test', '<p>aaa</p>', '2021-10-30 06:33:19', '2021-10-30 06:33:19', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `page_types`
--

CREATE TABLE `page_types` (
  `page_types_id` bigint(20) UNSIGNED NOT NULL,
  `page_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `permissions_id` bigint(20) UNSIGNED NOT NULL,
  `permission_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`permissions_id`, `permission_name`, `guard_name`, `permission_description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'asdasdasd-list', 'web', 'list permission enables the | asdasdasd | permission to list data', 1, NULL, NULL),
(2, 'asdasdasd-create', 'web', 'create permission enables the | asdasdasd | permission to create data', 1, NULL, NULL),
(3, 'asdasdasd-edit', 'web', 'edit permission enables the | asdasdasd | permission to edit data', 1, NULL, NULL),
(4, 'asdasdasd-delete', 'web', 'delete permission enables the | asdasdasd | permission to delete data', 1, NULL, NULL),
(5, 'test-list', 'web', 'list permission enables the | test | permission to list data', 1, '2021-10-26 09:21:17', '2021-10-26 09:21:17'),
(6, 'test-create', 'web', 'create permission enables the | test | permission to create data', 1, '2021-10-26 09:21:17', '2021-10-26 09:21:17'),
(7, 'test-edit', 'web', 'edit permission enables the | test | permission to edit data', 1, '2021-10-26 09:21:17', '2021-10-26 09:21:17'),
(8, 'test-delete', 'web', 'delete permission enables the | test | permission to delete data', 1, '2021-10-26 09:21:17', '2021-10-26 09:21:17');

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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `roles_id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`roles_id`, `role_name`, `guard_name`, `role_description`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'web', 'test description', '2021-10-26 00:30:34', '2021-10-26 00:30:34'),
(2, 'Organization Admin', 'web', 'test 2 role', '2021-10-26 01:24:58', '2021-10-26 01:24:58');

-- --------------------------------------------------------

--
-- Table structure for table `roles_users`
--

CREATE TABLE `roles_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles_users`
--

INSERT INTO `roles_users` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 3, 2, NULL, NULL),
(2, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('CXmiP0qml0EbKnOhCIAwwiu4IkiZ9z1LZBjBR4yR', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoicGJra2toZDlsank1YnV4M1FCSG0xaXJ1R0haT2Z5cjFvTDdPN2c5ViI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1635743696),
('S1jVfkpYu58NSdlVG08TIcRtIImGP6RSxI1ixQMU', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiUEhDbnNaQmhUSkMwcFQzTzljd015ekdlNnVjYnNzdlBxckFkRDZWMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wYWdlcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCR2Z2VDRU9Rai5hcXg5Rjl4TDMyVGIuTWJ3aW1oVTl0RmlzT2VlRHNuem9peTM3ck4udDY0aSI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkdmdlQ0VPUWouYXF4OUY5eEwzMlRiLk1id2ltaFU5dEZpc09lZURzbnpvaXkzN3JOLnQ2NGkiO30=', 1635749280);

-- --------------------------------------------------------

--
-- Table structure for table `system_assets`
--

CREATE TABLE `system_assets` (
  `system_assets_id` bigint(20) UNSIGNED NOT NULL,
  `asset_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asset_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_latest_logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_latest_banner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `page_type_id` bigint(20) UNSIGNED NOT NULL,
  `organization_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `tags_id` bigint(20) UNSIGNED NOT NULL,
  `tags_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags_type` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`tags_id`, `tags_name`, `tags_description`, `tags_type`, `user_id`, `created_at`, `updated_at`, `status`) VALUES
(1, 'test 1', 'test 1', 1, 1, '2021-10-25 11:45:11', '2021-10-25 11:45:11', 1),
(2, 'test 2', 'test 22', 2, 1, '2021-10-25 12:03:01', '2021-10-26 00:12:59', 0),
(3, 'test 3', 'test 3updated', 1, 1, '2021-10-25 12:03:11', '2021-10-25 12:27:05', 0);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_team` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team_invitations`
--

CREATE TABLE `team_invitations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team_user`
--

CREATE TABLE `team_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trix_attachments`
--

CREATE TABLE `trix_attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachable_id` int(10) UNSIGNED DEFAULT NULL,
  `attachable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_pending` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trix_rich_texts`
--

CREATE TABLE `trix_rich_texts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `student_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `status`, `student_number`) VALUES
(1, 'Super Admin', 'admin@gmail.com', NULL, '$2y$10$vgeCEOQj.aqx9F9xL32Tb.MbwimhU9tFisOeeDsnzoiy37rN.t64i', NULL, NULL, NULL, NULL, NULL, '2021-10-24 01:12:30', '2021-10-28 01:37:18', 1, NULL),
(2, 'PASOA', 'pasoa@gmail.com', NULL, '$2y$10$IXO6esrjG/7rZXyW0p8y.O4KyydOgLbWiF9Fy1NHrzO0riEYZVtW2', NULL, NULL, NULL, NULL, NULL, '2021-10-24 06:44:36', '2021-10-31 22:36:20', 1, '...'),
(3, 'CS', 'cs@gmail.com', NULL, '$2y$10$mIAi7RUFa.kg9CZpIdyCk.OOSCBRjvWmVh0/KVCVX.7/SFTExzSfi', NULL, NULL, NULL, NULL, NULL, '2021-10-24 06:44:50', '2021-10-31 22:36:56', 1, '...'),
(4, 'AECES', 'aeces@gmail.com', NULL, '$2y$10$cSLg286Y5ozuBLO2rkG4Iuq/I1D.ey2lfGDAuh6bHHWFw3LGXCZPK', NULL, NULL, NULL, NULL, NULL, '2021-10-25 00:51:45', '2021-10-31 22:37:18', 1, '...'),
(5, 'test', 'test@gmail.com', NULL, '$2y$10$EEY9gkh3m4i5Sdvt.Xzbh.p2dXb9x.OEW5cgtfsQUA84.O3oYpi6G', NULL, NULL, NULL, NULL, NULL, '2021-10-25 01:04:07', '2021-10-25 01:11:54', 0, 'test'),
(6, 'JPSME', 'jpsme@gmail.com', NULL, '$2y$10$uecwFO6h88h3SWDOEPgNJ.FS1hlptxNYgPGrvs7L3T5hZQgtipDZK', NULL, NULL, NULL, NULL, NULL, '2021-10-31 22:37:42', '2021-10-31 22:37:42', 1, '...'),
(7, 'JPIA', 'jpia@gmail.com', NULL, '$2y$10$jEYL7yEHm0tSsGhaNvB7R.rPD0c9u14M1OuDEYxbyTlFVV8kDz7cK', NULL, NULL, NULL, NULL, NULL, '2021-10-31 22:38:04', '2021-10-31 22:38:04', 1, '...'),
(8, 'MENTORS', 'mentors@gmail.com', NULL, '$2y$10$b8bMYy8BaHeU9e4Wu0.D/uoxmgY9UszATot05VUY7C.dji3SEz/YO', NULL, NULL, NULL, NULL, NULL, '2021-10-31 22:38:21', '2021-10-31 22:38:21', 1, '...'),
(9, 'JMA', 'jma@gmail.com', NULL, '$2y$10$zY4hDYZVC5YPquAtWOcHxeZZ0Pqb8FZzo7Qom4vMCNh00tKuoqx.6', NULL, NULL, NULL, NULL, NULL, '2021-10-31 22:38:44', '2021-10-31 22:38:44', 1, '...'),
(10, 'JPMAP', 'jpmap@gmail.com', NULL, '$2y$10$lMxSwznAy3bfKYW6p9GKeedhFhx9JuNDF9MLP.qDdSenu7PSiX856', NULL, NULL, NULL, NULL, NULL, '2021-10-31 22:39:20', '2021-10-31 22:39:20', 1, '...'),
(11, 'CSC', 'csc@gmail.com', NULL, '$2y$10$MbRlWK89unxBG5X4qf09reXtCi5moJOpt0N/AXXD0uN53TgJ67bAe', NULL, NULL, NULL, NULL, NULL, '2021-10-31 22:39:42', '2021-10-31 22:39:42', 1, '...'),
(12, 'PUPUKAW', 'pupukaw@gmail.com', NULL, '$2y$10$K6EO2FZyufxj9t.gk1ZkgOOlyStUOM1lccIagiGB07hbJsV3PPQ0K', NULL, NULL, NULL, NULL, NULL, '2021-10-31 22:40:26', '2021-10-31 22:40:26', 1, '...'),
(13, 'ERG', 'erg@gmail.com', NULL, '$2y$10$EWtf74Kf75NJqGeGTeB8Neutw5GY1XZ.O6kf0IS2sIxcqUX03tNDW', NULL, NULL, NULL, NULL, NULL, '2021-10-31 22:41:20', '2021-10-31 22:41:20', 1, '...');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`announcements_id`),
  ADD UNIQUE KEY `announcements_announcement_title_unique` (`announcement_title`),
  ADD KEY `announcements_user_id_foreign` (`user_id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`articles_id`),
  ADD KEY `articles_user_id_foreign` (`user_id`);

--
-- Indexes for table `default_interfaces`
--
ALTER TABLE `default_interfaces`
  ADD PRIMARY KEY (`default_interfaces_id`),
  ADD KEY `default_interfaces_interface_type_id_foreign` (`interface_type_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `events_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `interface_types`
--
ALTER TABLE `interface_types`
  ADD PRIMARY KEY (`interface_types_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `navigation_menus`
--
ALTER TABLE `navigation_menus`
  ADD PRIMARY KEY (`navigation_menus_id`);

--
-- Indexes for table `officers`
--
ALTER TABLE `officers`
  ADD PRIMARY KEY (`officers_id`),
  ADD KEY `officers_organization_id_foreign` (`organization_id`),
  ADD KEY `officers_position_category_foreign` (`position_category`);

--
-- Indexes for table `officer_positions`
--
ALTER TABLE `officer_positions`
  ADD PRIMARY KEY (`officer_positions_id`);

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`organizations_id`);

--
-- Indexes for table `organizations_users`
--
ALTER TABLE `organizations_users`
  ADD PRIMARY KEY (`organizations_users_id`),
  ADD KEY `organizations_users_organization_id_foreign` (`organization_id`),
  ADD KEY `organizations_users_user_id_foreign` (`user_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`pages_id`),
  ADD KEY `title` (`title`);

--
-- Indexes for table `page_types`
--
ALTER TABLE `page_types`
  ADD PRIMARY KEY (`page_types_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`permissions_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roles_id`);

--
-- Indexes for table `roles_users`
--
ALTER TABLE `roles_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roles_users_user_id_foreign` (`user_id`),
  ADD KEY `roles_users_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `system_assets`
--
ALTER TABLE `system_assets`
  ADD PRIMARY KEY (`system_assets_id`),
  ADD KEY `system_assets_user_id_foreign` (`user_id`),
  ADD KEY `system_assets_page_type_id_foreign` (`page_type_id`),
  ADD KEY `system_assets_organization_id_foreign` (`organization_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tags_id`),
  ADD KEY `tags_user_id_foreign` (`user_id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_user_id_index` (`user_id`);

--
-- Indexes for table `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_invitations_team_id_email_unique` (`team_id`,`email`);

--
-- Indexes for table `team_user`
--
ALTER TABLE `team_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`);

--
-- Indexes for table `trix_attachments`
--
ALTER TABLE `trix_attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trix_rich_texts`
--
ALTER TABLE `trix_rich_texts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trix_rich_texts_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `announcements_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `articles_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `default_interfaces`
--
ALTER TABLE `default_interfaces`
  MODIFY `default_interfaces_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `interface_types`
--
ALTER TABLE `interface_types`
  MODIFY `interface_types_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `navigation_menus`
--
ALTER TABLE `navigation_menus`
  MODIFY `navigation_menus_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `officers`
--
ALTER TABLE `officers`
  MODIFY `officers_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `officer_positions`
--
ALTER TABLE `officer_positions`
  MODIFY `officer_positions_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `organizations_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `organizations_users`
--
ALTER TABLE `organizations_users`
  MODIFY `organizations_users_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `pages_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `page_types`
--
ALTER TABLE `page_types`
  MODIFY `page_types_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `permissions_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `roles_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles_users`
--
ALTER TABLE `roles_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `system_assets`
--
ALTER TABLE `system_assets`
  MODIFY `system_assets_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tags_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team_invitations`
--
ALTER TABLE `team_invitations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team_user`
--
ALTER TABLE `team_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trix_attachments`
--
ALTER TABLE `trix_attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trix_rich_texts`
--
ALTER TABLE `trix_rich_texts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcements`
--
ALTER TABLE `announcements`
  ADD CONSTRAINT `announcements_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`users_id`);

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`users_id`);

--
-- Constraints for table `default_interfaces`
--
ALTER TABLE `default_interfaces`
  ADD CONSTRAINT `default_interfaces_interface_type_id_foreign` FOREIGN KEY (`interface_type_id`) REFERENCES `interface_types` (`interface_types_id`);

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`users_id`);

--
-- Constraints for table `officers`
--
ALTER TABLE `officers`
  ADD CONSTRAINT `officers_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`organizations_id`),
  ADD CONSTRAINT `officers_position_category_foreign` FOREIGN KEY (`position_category`) REFERENCES `officer_positions` (`officer_positions_id`);

--
-- Constraints for table `organizations_users`
--
ALTER TABLE `organizations_users`
  ADD CONSTRAINT `organizations_users_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`organizations_id`),
  ADD CONSTRAINT `organizations_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`users_id`);

--
-- Constraints for table `roles_users`
--
ALTER TABLE `roles_users`
  ADD CONSTRAINT `roles_users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`roles_id`),
  ADD CONSTRAINT `roles_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`users_id`);

--
-- Constraints for table `system_assets`
--
ALTER TABLE `system_assets`
  ADD CONSTRAINT `system_assets_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`organizations_id`),
  ADD CONSTRAINT `system_assets_page_type_id_foreign` FOREIGN KEY (`page_type_id`) REFERENCES `page_types` (`page_types_id`),
  ADD CONSTRAINT `system_assets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`users_id`);

--
-- Constraints for table `tags`
--
ALTER TABLE `tags`
  ADD CONSTRAINT `tags_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`users_id`);

--
-- Constraints for table `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD CONSTRAINT `team_invitations_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
