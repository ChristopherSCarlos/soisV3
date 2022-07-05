-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 23, 2022 at 05:15 PM
-- Server version: 10.5.12-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u877275727_sois`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_applications`
--

CREATE TABLE `academic_applications` (
  `application_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `membership_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `organization_id` bigint(20) UNSIGNED NOT NULL,
  `student_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suffix` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_and_section` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `application_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `academic_members`
--

CREATE TABLE `academic_members` (
  `academic_member_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `membership_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `organization_id` bigint(20) UNSIGNED NOT NULL,
  `control_number` int(11) NOT NULL,
  `student_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suffix` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_and_section` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `membership_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'paid',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `academic_membership`
--

CREATE TABLE `academic_membership` (
  `academic_membership_id` bigint(20) UNSIGNED NOT NULL,
  `organization_id` bigint(20) UNSIGNED NOT NULL,
  `membership_fee` int(11) NOT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `membership_start_date` date NOT NULL,
  `membership_end_date` date NOT NULL,
  `registration_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registration_start_date` date NOT NULL,
  `registration_end_date` date NOT NULL,
  `am_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `accomplished_events`
--

CREATE TABLE `accomplished_events` (
  `accomplished_event_id` bigint(20) UNSIGNED NOT NULL,
  `organization_id` bigint(20) UNSIGNED NOT NULL,
  `event_category_id` bigint(20) UNSIGNED NOT NULL,
  `event_role_id` bigint(20) UNSIGNED NOT NULL,
  `event_nature_id` bigint(20) UNSIGNED NOT NULL,
  `event_classification_id` bigint(20) UNSIGNED NOT NULL,
  `level_id` bigint(20) UNSIGNED NOT NULL,
  `fund_source_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `objective` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `venue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activity_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `beneficiaries` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_beneficiary` int(10) UNSIGNED NOT NULL,
  `sponsors` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `budget` int(10) UNSIGNED DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `accomplishment_reports`
--

CREATE TABLE `accomplishment_reports` (
  `accomplishment_report_id` bigint(20) UNSIGNED NOT NULL,
  `accomplishment_report_type_id` bigint(20) UNSIGNED NOT NULL,
  `accomplishment_report_uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organization_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `range_title` tinyint(3) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `reviewed_by` bigint(20) UNSIGNED DEFAULT NULL,
  `reviewed_at` timestamp NULL DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `accomplishment_report_types`
--

CREATE TABLE `accomplishment_report_types` (
  `accomplishment_report_type_id` bigint(20) UNSIGNED NOT NULL,
  `accomplishment_report_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accomplishment_report_types`
--

INSERT INTO `accomplishment_report_types` (`accomplishment_report_type_id`, `accomplishment_report_type`) VALUES
(1, 'Tabular'),
(2, 'Design');

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
  `organization_id` bigint(20) UNSIGNED DEFAULT NULL,
  `isAnnouncementInHomepage` tinyint(1) DEFAULT NULL,
  `announcement_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isAnnouncementInOrgpage` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `is_article_featured_organization_page` int(11) DEFAULT NULL,
  `is_article_top_news_organization_page` tinyint(1) DEFAULT NULL,
  `is_article_featured_home_page` tinyint(1) DEFAULT NULL,
  `organization_id` bigint(20) UNSIGNED DEFAULT NULL,
  `is_carousel_homepage` tinyint(1) DEFAULT NULL,
  `is_carousel_org_page` tinyint(1) DEFAULT NULL,
  `article_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `articles_tags`
--

CREATE TABLE `articles_tags` (
  `articles_tags_id` bigint(20) UNSIGNED NOT NULL,
  `article_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `article_types`
--

CREATE TABLE `article_types` (
  `article_types_id` bigint(20) UNSIGNED NOT NULL,
  `article_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `article_types`
--

INSERT INTO `article_types` (`article_types_id`, `article_type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'School News', 1, '2022-02-22 19:32:11', '2022-02-22 19:32:11'),
(2, 'Event News', 1, '2022-02-22 19:32:11', '2022-02-22 19:32:11');

-- --------------------------------------------------------

--
-- Table structure for table `ar_data_logs`
--

CREATE TABLE `ar_data_logs` (
  `data_log_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `details` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ar_notifications`
--

CREATE TABLE `ar_notifications` (
  `ar_notification_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` tinyint(3) UNSIGNED NOT NULL,
  `link` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `asset_types`
--

CREATE TABLE `asset_types` (
  `asset_type_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asset_type_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `asset_types`
--

INSERT INTO `asset_types` (`asset_type_id`, `type`, `asset_type_description`, `created_at`, `updated_at`) VALUES
(1, 'Logo', 'This asset type is used for the logo of the page', '2022-02-22 19:32:11', '2022-02-22 19:32:11'),
(2, 'Banner', 'This asset type is used for the logo of the page', '2022-02-22 19:32:11', '2022-02-22 19:32:11'),
(3, 'Carousel', 'This asset type is used for the logo of the page', '2022-02-22 19:32:11', '2022-02-22 19:32:11'),
(4, 'Featured News Image', 'This asset type is used for the logo of the page', '2022-02-22 19:32:11', '2022-02-22 19:32:11');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `organization_id` bigint(20) UNSIGNED NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_acronym` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `organization_id`, `course_name`, `course_acronym`) VALUES
(1, 4, 'Bachelor of Science in Accountancy', 'BSA'),
(2, 1, 'Bachelor of Science in Electronics and Communication Engineering', 'BSECE'),
(3, 6, 'Bachelor of Science Mechanical Engineering', 'BSME'),
(4, 5, 'Bachelor of Science in Business Administration Major in Human Resource Development Management', 'BSBA-HRDM'),
(5, 3, 'Bachelor of Science in Business Administration Major in Marketing Management', 'BSBA-MM'),
(6, 8, 'Bachelor of Science in Office Administration Major in Legal Transcription', 'BSOA-LT'),
(7, 7, 'Bachelor of Secondary Education Major in English', 'BSED-English'),
(8, 7, 'Bachelor of Secondary Education Major in Mathematics', 'BSED-Mathematics'),
(9, 2, 'Bachelor of Science in Information Technology', 'BSIT'),
(10, 8, 'Diploma in Office Management Technology with Specialization in Legal Office Management', 'DOMT-LOM'),
(11, 2, 'Diploma in Information Communication Technology', 'DICT');

-- --------------------------------------------------------

--
-- Table structure for table `declined_aapplications`
--

CREATE TABLE `declined_aapplications` (
  `declined_aapp_id` bigint(20) UNSIGNED NOT NULL,
  `application_id` bigint(20) UNSIGNED NOT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `declined_naapplications`
--

CREATE TABLE `declined_naapplications` (
  `declined_naapp_id` bigint(20) UNSIGNED NOT NULL,
  `application_id` bigint(20) UNSIGNED NOT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `disapproved_events`
--

CREATE TABLE `disapproved_events` (
  `disapproved_event_id` bigint(20) UNSIGNED NOT NULL,
  `upcoming_event_id` bigint(20) UNSIGNED NOT NULL,
  `disapproved_by` bigint(20) UNSIGNED NOT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_categories`
--

CREATE TABLE `event_categories` (
  `event_category_id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `helper` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `background_color` char(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#1976D2',
  `text_color` char(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#FFF',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_categories`
--

INSERT INTO `event_categories` (`event_category_id`, `category`, `helper`, `background_color`, `text_color`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Academic', 'Events that relates to competitive Academic Activities and Academic Awards. (Ex. Quiz Bees, Debates, Recognitions)', '#0376FF', '#FFFFFF', '2022-02-22 19:32:22', '2022-02-22 19:32:22', NULL),
(2, 'Non-academic', 'Events that relates to Social, Civic, or Spiritual Improvement and Obligations. (Ex. Monthly Mass, Flag Raising Ceremony, Elections)', '#D43A42', '#FFFFFF', '2022-02-22 19:32:22', '2022-02-22 19:32:22', NULL),
(3, 'Cultural', 'Events that relates to Cultural and Social Improvement. (Ex. Cultural Dances, Speech Choirs, Poster Making)', '#FFBB1B', '#000000', '2022-02-22 19:32:22', '2022-02-22 19:32:22', NULL),
(4, 'Sports', 'Events that relates to competitive Physical or Mental Activities. (Ex. Basketball, Chess, Badminton)', '#168854', '#FFFFFF', '2022-02-22 19:32:22', '2022-02-22 19:32:22', NULL),
(5, 'Seminars/Workshops', 'Events that relates Education and Academic Improvements. (Ex. Seminars, Workshops, Webinars, Tutorials)', '#3FB1BB', '#FFFFFF', '2022-02-22 19:32:22', '2022-02-22 19:32:22', NULL),
(6, 'Community Outreach', 'Events that relate to helping and educating communities outside the University. (Ex. Cleanup Drives, Relief Operations, Public Lectures)', '#3FB1BB', '#FFFFFF', '2022-02-22 19:32:22', '2022-02-22 19:32:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `event_classifications`
--

CREATE TABLE `event_classifications` (
  `event_classification_id` bigint(20) UNSIGNED NOT NULL,
  `classification` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `helper` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_classifications`
--

INSERT INTO `event_classifications` (`event_classification_id`, `classification`, `helper`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Intellectual', 'Events that relate to student development academically. (Ex. Quiz Bee, Seminars/Webinars, Tutorials)', '2022-02-22 19:32:23', '2022-02-22 19:32:23', NULL),
(2, 'Physical', 'Events that relate to  physical or mental competitive activities. (Ex. Basketball, Chess, Badminton)', '2022-02-22 19:32:23', '2022-02-22 19:32:23', NULL),
(3, 'Cultural', 'Events that relate to cultural and other art activities. (Ex. Dance, Speech Choir, Poster Making)', '2022-02-22 19:32:23', '2022-02-22 19:32:23', NULL),
(4, 'Spiritual', 'Events that relate to spiritual activities. (Ex. Monthly Mass)', '2022-02-22 19:32:23', '2022-02-22 19:32:23', NULL),
(5, 'Social', 'Events that relate to gatherings and social activities. (Ex. General Assembly, Team Building, Year-End Party)', '2022-02-22 19:32:23', '2022-02-22 19:32:23', NULL),
(6, 'Civic', 'Events that relate to community and service activities. (Ex. Flag Raising, Cleanup Drives, Outreach Programs)', '2022-02-22 19:32:23', '2022-02-22 19:32:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `event_documents`
--

CREATE TABLE `event_documents` (
  `event_document_id` bigint(20) UNSIGNED NOT NULL,
  `accomplished_event_id` bigint(20) UNSIGNED NOT NULL,
  `event_document_type_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_document_types`
--

CREATE TABLE `event_document_types` (
  `event_document_type_id` bigint(20) UNSIGNED NOT NULL,
  `document_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `helper` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_document_types`
--

INSERT INTO `event_document_types` (`event_document_type_id`, `document_type`, `helper`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Notice of the Meeting', 'A document containing the Announcement of the Meeting for the Event.', NULL, NULL, NULL),
(2, 'Minutes of the Meeting', 'A document containing the notes and plans discussed in the Meeting for the Planning of an Event.', NULL, NULL, NULL),
(3, 'Program Flow', 'A document containing the Invitation Program of the Event.', NULL, NULL, NULL),
(4, 'Narrative Report', 'A document containing the Narration of the actual Event.', NULL, NULL, NULL),
(5, 'Event Attendance Sheet', 'A document containing the list of people who attended the Event.', NULL, NULL, NULL),
(6, 'Event Evaluation', 'A document containing the Evaluation Result of the Event.', NULL, NULL, NULL),
(7, 'MOA', 'Memorandum of Agreement', NULL, NULL, NULL),
(8, 'MOU', 'MOU', NULL, NULL, NULL),
(9, 'Certificate of Recognition', 'Certificate of Recognition', NULL, NULL, NULL),
(10, 'Certificate of Appreciation', 'Certificate of Appreciation', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `event_images`
--

CREATE TABLE `event_images` (
  `event_image_id` bigint(20) UNSIGNED NOT NULL,
  `accomplished_event_id` bigint(20) UNSIGNED NOT NULL,
  `image_type` tinyint(3) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_natures`
--

CREATE TABLE `event_natures` (
  `event_nature_id` bigint(20) UNSIGNED NOT NULL,
  `nature` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `helper` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_natures`
--

INSERT INTO `event_natures` (`event_nature_id`, `nature`, `helper`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Skills/Technical', 'The event focuses on improving the skills and knowledge of the student', '2022-02-22 19:32:22', '2022-02-22 19:32:22', NULL),
(2, 'Inclusivity/Diversity', 'The event focuses on creating an environment for the students to feel an essential part of it', '2022-02-22 19:32:22', '2022-02-22 19:32:22', NULL),
(3, 'Professional', 'The event focuses on professional growth and development of the student', '2022-02-22 19:32:22', '2022-02-22 19:32:22', NULL),
(4, 'GAD Related', 'The event focuses on gender and development', '2022-02-22 19:32:22', '2022-02-22 19:32:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `event_partnerships`
--

CREATE TABLE `event_partnerships` (
  `event_partnership_id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `partnership_to` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_roles`
--

CREATE TABLE `event_roles` (
  `event_role_id` bigint(20) UNSIGNED NOT NULL,
  `event_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `helper` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `background_color` char(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#1976D2',
  `text_color` char(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#FFFFFF',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_roles`
--

INSERT INTO `event_roles` (`event_role_id`, `event_role`, `helper`, `background_color`, `text_color`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Organizer', 'The Event was organized by this Organization from planning to actual execution.', '#0376FF', '#FFFFFF', '2022-02-22 19:32:22', '2022-02-22 19:32:22', NULL),
(2, 'Sponsor', 'The Event was sponsored by this Organization by means of Financial Assistance or Manpower.', '#168854', '#FFFFFF', '2022-02-22 19:32:22', '2022-02-22 19:32:22', NULL),
(3, 'Participant', 'The Event was participated by the members of this Organization', '#6F737E', '#000000', '2022-02-22 19:32:22', '2022-02-22 19:32:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `event_signatures`
--

CREATE TABLE `event_signatures` (
  `signature_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `organization_id` bigint(20) UNSIGNED DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `signature_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_signatures`
--

INSERT INTO `event_signatures` (`signature_id`, `user_id`, `organization_id`, `role_id`, `signature_path`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 1, NULL, NULL, NULL),
(2, 10, 2, 9, NULL, NULL, NULL),
(3, 6, 2, 6, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `expected_applicants`
--

CREATE TABLE `expected_applicants` (
  `expected_applicant_id` bigint(20) UNSIGNED NOT NULL,
  `organization_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suffix` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `fund_sources`
--

CREATE TABLE `fund_sources` (
  `fund_source_id` bigint(20) UNSIGNED NOT NULL,
  `fund_source` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `helper` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fund_sources`
--

INSERT INTO `fund_sources` (`fund_source_id`, `fund_source`, `helper`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'University Funded', 'The Event was funded by the university.', '2022-02-22 19:32:21', '2022-02-22 19:32:21', NULL),
(2, 'Self Funded', 'The Event was funded by the organizer.', '2022-02-22 19:32:21', '2022-02-22 19:32:21', NULL),
(3, 'Externally Funded', 'The Event was funded by other sponsors.', '2022-02-22 19:32:21', '2022-02-22 19:32:21', NULL),
(4, 'No Funding Required', 'The Event did not require any funding.', '2022-02-22 19:32:21', '2022-02-22 19:32:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `genders`
--

CREATE TABLE `genders` (
  `gender_id` bigint(20) UNSIGNED NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genders`
--

INSERT INTO `genders` (`gender_id`, `gender`, `created_at`, `updated_at`) VALUES
(1, 'Male', '2022-02-22 19:32:12', '2022-02-22 19:32:12'),
(2, 'Female', '2022-02-22 19:32:12', '2022-02-22 19:32:12');

-- --------------------------------------------------------

--
-- Table structure for table `gpoa_notifications`
--

CREATE TABLE `gpoa_notifications` (
  `notification_id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `to` bigint(20) UNSIGNED NOT NULL,
  `from` bigint(20) UNSIGNED NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `level_id` bigint(20) UNSIGNED NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `helper` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`level_id`, `level`, `helper`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Institutional', 'The Beneficiaries/Participants of the event were from PUP-Taguig only.', '2022-02-22 19:32:21', '2022-02-22 19:32:21', NULL),
(2, 'Local', 'The Beneficiaries/Participants of the event were from not only PUP-Taguig but within Taguig City and other nearby Municipality.', '2022-02-22 19:32:21', '2022-02-22 19:32:21', NULL),
(3, 'Regional', 'The Beneficiaries/Participants of the Event were from different parts of the NCR Region.', '2022-02-22 19:32:21', '2022-02-22 19:32:21', NULL),
(4, 'National', 'The Beneficiaries/Participants of the event were from all over the Philippines.', '2022-02-22 19:32:21', '2022-02-22 19:32:21', NULL),
(5, 'International', 'The Beneficiaries/Participants of the event were from all over the world.', '2022-02-22 19:32:21', '2022-02-22 19:32:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `membership_messages`
--

CREATE TABLE `membership_messages` (
  `message_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `organization_id` bigint(20) UNSIGNED NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unread',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `membership_replies`
--

CREATE TABLE `membership_replies` (
  `reply_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `message_id` bigint(20) UNSIGNED NOT NULL,
  `organization_id` bigint(20) UNSIGNED NOT NULL,
  `reply` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unread',
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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2021_08_01_000000_create_failed_jobs_table', 1),
(3, '2021_08_01_000000_create_jobs_table', 1),
(4, '2021_08_01_000000_create_temporary_files_table', 1),
(5, '2021_08_01_000001_create_SA_document_types_table', 1),
(6, '2021_08_01_000001_create_accomplishment_report_types_table', 1),
(7, '2021_08_01_000001_create_asset_types_table', 1),
(8, '2021_08_01_000001_create_event_categories_table', 1),
(9, '2021_08_01_000001_create_event_classifications_table', 1),
(10, '2021_08_01_000001_create_event_document_types_table', 1),
(11, '2021_08_01_000001_create_event_natures_table', 1),
(12, '2021_08_01_000001_create_event_roles_table', 1),
(13, '2021_08_01_000001_create_fund_sources_table', 1),
(14, '2021_08_01_000001_create_genders_table', 1),
(15, '2021_08_01_000001_create_levels_table', 1),
(16, '2021_08_01_000001_create_organization_types_table', 1),
(17, '2021_08_01_000001_create_permissions_table', 1),
(18, '2021_08_01_000001_create_roles_table', 1),
(19, '2021_08_01_000001_create_school_years_table', 1),
(20, '2021_08_01_000001_create_tabular_tables_table', 1),
(21, '2021_08_01_000010_create_pages_table', 1),
(22, '2021_08_01_000013_create_trix_rich_texts_table', 1),
(23, '2021_08_01_000020_create_organizations_table', 1),
(24, '2021_08_01_000020_create_tabular_columns_table', 1),
(25, '2021_08_01_000024_create_navigation_menus_table', 1),
(26, '2021_08_01_000030_create_officer_positions_table', 1),
(27, '2021_08_01_000032_create_interface_types_table', 1),
(28, '2021_08_01_000033_create_default_interfaces_table', 1),
(29, '2021_08_01_000034_create_page_types_table', 1),
(30, '2021_08_01_000040_create_navigation_menu_types_table', 1),
(31, '2021_08_01_000041_create_navigation_menus_navigation_types_table', 1),
(32, '2021_08_01_000042_create_sois_links_table', 1),
(33, '2021_08_01_000053_create_article_types_table', 1),
(34, '2021_08_01_000055_create_social_media_table', 1),
(35, '2021_08_01_000300_create_courses_table', 1),
(36, '2021_08_01_004000_create_organization_document_types_table', 1),
(37, '2021_08_01_004000_create_users_table', 1),
(38, '2021_08_01_004001_create_articles_table', 1),
(39, '2021_08_01_040020_create_announcements_table', 1),
(40, '2021_08_01_040021_create_organization_assets_table', 1),
(41, '2021_08_01_040021_create_tags_table', 1),
(42, '2021_08_01_040044_create_articles_tags_table', 1),
(43, '2021_08_01_040056_create_org_socials_table', 1),
(44, '2021_08_01_050000_create_ar_notifications_table', 1),
(45, '2021_08_01_050000_create_permission_role_table', 1),
(46, '2021_08_01_050000_create_permission_user_table', 1),
(47, '2021_08_01_050000_create_role_user_table', 1),
(48, '2021_08_01_080000_create_academic_membership_table', 1),
(49, '2021_08_01_080001_create_academic__members_table', 1),
(50, '2021_08_01_080001_create_academic_applications_table', 1),
(51, '2021_08_01_080001_create_non_academic_membership_table', 1),
(52, '2021_08_01_080002_create_non__academic__members_table', 1),
(53, '2021_08_01_080002_create_non_academic_applications_table', 1),
(54, '2021_08_01_080003_create_declined__aapplications_table', 1),
(55, '2021_08_01_080003_create_declined__nonacadapplications_table', 1),
(56, '2021_08_01_080010_create_membership__messages_table', 1),
(57, '2021_08_01_080020_create_membership_replies_table', 1),
(58, '2021_08_01_090000_create_expected_applicants_table', 1),
(59, '2021_08_01_600000_create_position_categories_table', 1),
(60, '2021_08_01_600001_create_position_titles_table', 1),
(61, '2021_08_01_600002_create_officers_table', 1),
(62, '2021_08_01_700000_create_accomplished_events_table', 1),
(63, '2021_08_01_700000_create_accomplishment_reports_table', 1),
(64, '2021_08_01_700000_create_organization_documents_table', 1),
(65, '2021_08_01_700000_create_upcoming_events_table', 1),
(66, '2021_08_01_700001_create_event_documents_table', 1),
(67, '2021_08_01_700001_create_event_images_table', 1),
(68, '2021_08_01_700001_create_event_signatures_table', 1),
(69, '2021_08_01_700002_create_event__partnerships_table', 1),
(70, '2021_08_01_700002_create_partnerships__requests_table', 1),
(71, '2021_08_01_700002_create_student_accomplishments_table', 1),
(72, '2021_08_01_700003_create_student_accomplishment_files_table', 1),
(73, '2021_08_01_700004_create_ar_data_logs_table', 1),
(74, '2021_08_01_700005_create_gpoa_notifications_table', 1),
(75, '2021_08_01_700010_create_disapproved_events_table', 1),
(76, '2021_10_24_700005_create_sessions_table', 1),
(77, '2022_02_02_700004_create_sois_gates_table', 1);

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
  `is_topnav` tinyint(1) DEFAULT NULL,
  `is_footer` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `navigation_menus_navigation_types`
--

CREATE TABLE `navigation_menus_navigation_types` (
  `navigation_menus_navigation_types_id` bigint(20) UNSIGNED NOT NULL,
  `navigation_menu_id` bigint(20) UNSIGNED NOT NULL,
  `navigation_type_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `navigation_menu_types`
--

CREATE TABLE `navigation_menu_types` (
  `navigation_menu_types_id` bigint(20) UNSIGNED NOT NULL,
  `navigation_menu_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `navigation_menu_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `non_academic_applications`
--

CREATE TABLE `non_academic_applications` (
  `application_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `membership_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `organization_id` bigint(20) UNSIGNED NOT NULL,
  `student_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suffix` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_and_section` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `application_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `non_academic_members`
--

CREATE TABLE `non_academic_members` (
  `non_academic_member_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `membership_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `organization_id` bigint(20) UNSIGNED NOT NULL,
  `control_number` int(11) NOT NULL,
  `student_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suffix` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_and_section` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `membership_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'paid',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `non_academic_membership`
--

CREATE TABLE `non_academic_membership` (
  `non_academic_membership_id` bigint(20) UNSIGNED NOT NULL,
  `organization_id` bigint(20) UNSIGNED NOT NULL,
  `membership_fee` int(11) NOT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `membership_start_date` date NOT NULL,
  `membership_end_date` date NOT NULL,
  `registration_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registration_start_date` date NOT NULL,
  `registration_end_date` date NOT NULL,
  `nam_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `officers`
--

CREATE TABLE `officers` (
  `officer_id` bigint(20) UNSIGNED NOT NULL,
  `position_title_id` bigint(20) UNSIGNED NOT NULL,
  `term_start` date NOT NULL,
  `term_end` date NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suffix` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `signature` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `organization_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `officers`
--

INSERT INTO `officers` (`officer_id`, `position_title_id`, `term_start`, `term_end`, `first_name`, `middle_name`, `last_name`, `suffix`, `signature`, `status`, `created_at`, `updated_at`, `organization_id`) VALUES
(1, 1, '2021-10-01', '2022-09-30', 'Juan Carlos', NULL, 'Amaguin', NULL, '/organization_assets/signature/sample_signature1/sample_signature1.png', 1, '2022-02-22 19:32:21', '2022-02-22 19:32:21', NULL),
(2, 2, '2021-10-01', '2022-09-30', 'Sebastian Carlo', 'Olarte', 'Cabiades', NULL, NULL, 1, '2022-02-22 19:32:21', '2022-02-22 19:32:21', NULL),
(3, 3, '2021-10-01', '2022-09-30', 'Jojemar', 'Peña', 'Exala', NULL, NULL, 1, '2022-02-22 19:32:21', '2022-02-22 19:32:21', NULL),
(4, 4, '2021-10-01', '2022-09-30', 'Jannielyn', 'Gisulga', 'Etin', NULL, NULL, 1, '2022-02-22 19:32:21', '2022-02-22 19:32:21', NULL),
(5, 5, '2021-10-01', '2022-09-30', 'Daisylene Suzy', 'Sabando', 'Ross', NULL, NULL, 1, '2022-02-22 19:32:21', '2022-02-22 19:32:21', NULL),
(6, 6, '2021-10-01', '2022-09-30', 'Victoria Angela Marie', 'Aquino', 'Dolor', NULL, '/organization_assets/signature/sample_signature2/sample_signature2.png', 1, '2022-02-22 19:32:21', '2022-02-22 19:32:21', NULL),
(7, 7, '2021-10-01', '2022-09-30', 'Bryant Paul', 'Sana', 'Babac', NULL, '/organization_assets/signature/sample_signature3/sample_signature3.png', 1, '2022-02-22 19:32:21', '2022-02-22 19:32:21', NULL),
(8, 8, '2021-10-01', '2022-09-30', 'Ian Angelo', 'Parco', 'Nierva', NULL, NULL, 1, '2022-02-22 19:32:21', '2022-02-22 19:32:21', NULL),
(9, 9, '2021-10-01', '2022-09-30', 'Michelle Via', 'Arcangel', 'Rediga', NULL, NULL, 1, '2022-02-22 19:32:21', '2022-02-22 19:32:21', NULL),
(10, 10, '2021-10-01', '2022-09-30', 'Rysha Laine', NULL, 'Taganas', NULL, NULL, 1, '2022-02-22 19:32:21', '2022-02-22 19:32:21', NULL),
(11, 11, '2021-10-01', '2022-09-30', 'Joymee', 'Galido', 'Dionisio', NULL, NULL, 1, '2022-02-22 19:32:21', '2022-02-22 19:32:21', NULL),
(12, 12, '2021-10-01', '2022-09-30', 'Ray', 'Candare', 'Paduano', 'Jr.', NULL, 1, '2022-02-22 19:32:21', '2022-02-22 19:32:21', NULL),
(13, 13, '2021-10-01', '2022-09-30', 'Arvine Justine', 'Hernandez', 'Dimaano', NULL, NULL, 1, '2022-02-22 19:32:21', '2022-02-22 19:32:21', NULL),
(14, 14, '2021-10-01', '2022-09-30', 'John Reign', 'Moral', 'Encina', NULL, NULL, 1, '2022-02-22 19:32:21', '2022-02-22 19:32:21', NULL),
(15, 15, '2021-10-01', '2022-09-30', 'Crissa Mae', 'Boridor', 'Galopo', NULL, NULL, 1, '2022-02-22 19:32:21', '2022-02-22 19:32:21', NULL),
(16, 16, '2021-10-01', '2022-09-30', 'Janise Hop', 'Del Valle', 'Sandigan', NULL, NULL, 1, '2022-02-22 19:32:21', '2022-02-22 19:32:21', NULL),
(17, 17, '2021-10-01', '2022-09-30', 'Frances Anne', 'Tinio', 'Cruz', NULL, NULL, 1, '2022-02-22 19:32:21', '2022-02-22 19:32:21', NULL),
(18, 18, '2021-10-01', '2022-09-30', 'Jonathan', 'Amorado', 'Amoranto', NULL, NULL, 1, '2022-02-22 19:32:21', '2022-02-22 19:32:21', NULL),
(19, 19, '2021-10-01', '2022-09-30', 'Mike Vincent', 'Lidasan', 'Ramos', NULL, NULL, 1, '2022-02-22 19:32:21', '2022-02-22 19:32:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `officer_positions`
--

CREATE TABLE `officer_positions` (
  `officer_positions_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `position_category` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `organization_id` bigint(20) UNSIGNED NOT NULL,
  `organization_type_id` bigint(20) UNSIGNED NOT NULL,
  `organization_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organization_acronym` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organization_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `organization_primary_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organization_secondary_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organization_tertiary_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organization_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`organization_id`, `organization_type_id`, `organization_name`, `organization_acronym`, `organization_details`, `organization_primary_color`, `organization_secondary_color`, `organization_tertiary_color`, `organization_slug`, `created_at`, `updated_at`, `status`) VALUES
(1, 1, 'Association of Electronics Engineering Students', 'AECES', 'Organization Details', '#0376FF', '#FFFFFF', '#1bbede', 'aeces', '2022-02-22 19:32:13', '2022-02-22 19:32:13', 1),
(2, 1, 'Computer Society', 'CS', 'Organization Details', '#0376FF', '#FFFFFF', '#1bbede', 'cs', '2022-02-22 19:32:13', '2022-02-22 19:32:13', 1),
(3, 1, 'Junior Marketing Association', 'JMA', 'Organization Details', '#0376FF', '#FFFFFF', '#1bbede', 'jma', '2022-02-22 19:32:13', '2022-02-22 19:32:13', 1),
(4, 1, 'Junior Philippine Institutes of Accountants', 'JPIA', 'Organization Details', '#0376FF', '#FFFFFF', '#1bbede', 'jpia', '2022-02-22 19:32:13', '2022-02-22 19:32:13', 1),
(5, 1, 'Junior People Management Association of the Philippines', 'JPMAP', 'Organization Details', '#0376FF', '#FFFFFF', '#1bbede', 'jpmap', '2022-02-22 19:32:13', '2022-02-22 19:32:13', 1),
(6, 1, 'Junior Philippine Society of Mechanical Engineering', 'JPSME', 'Organization Details', '#0376FF', '#FFFFFF', '#1bbede', 'jpsme', '2022-02-22 19:32:13', '2022-02-22 19:32:13', 1),
(7, 1, 'Mentor\'s Society', 'MS', 'Organization Details', '#0376FF', '#FFFFFF', '#1bbede', 'ms', '2022-02-22 19:32:13', '2022-02-22 19:32:13', 1),
(8, 1, 'Philippine Association of Students in Office Administration', 'PASOA', 'Organization Details', '#0376FF', '#FFFFFF', '#1bbede', 'pasoa', '2022-02-22 19:32:13', '2022-02-22 19:32:13', 1),
(9, 2, 'Central Student Council', 'CSC', 'Organization Details', '#0376FF', '#FFFFFF', '#1bbede', 'CSC', '2022-02-22 19:32:13', '2022-02-22 19:32:13', 1),
(10, 2, 'Radio Engineering Circle', 'REC', 'Organization Details', '#0376FF', '#FFFFFF', '#1bbede', 'REC', '2022-02-22 19:32:13', '2022-02-22 19:32:13', 1),
(11, 2, 'Emergency Response Group', 'ERG', 'Organization Details', '#0376FF', '#FFFFFF', '#1bbede', 'ERG', '2022-02-22 19:32:13', '2022-02-22 19:32:13', 1),
(12, 2, 'iRock Campus', 'IC', 'Organization Details', '#0376FF', '#FFFFFF', '#1bbede', 'irock-campus', '2022-02-22 19:32:13', '2022-02-22 19:32:13', 1),
(13, 2, 'Pupukaw', 'Pupukaw', 'Organization Details', '#0376FF', '#FFFFFF', '#1bbede', 'pupukaw', '2022-02-22 19:32:13', '2022-02-22 19:32:13', 1),
(14, 2, 'The Chronicler', 'The Chronicler', '...', '#1bbede', '#1bbede', '#1bbede', 'the-chronicler', '2022-02-22 19:32:13', '2022-02-22 19:32:13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `organization_assets`
--

CREATE TABLE `organization_assets` (
  `organization_asset_id` bigint(20) UNSIGNED NOT NULL,
  `organization_id` bigint(20) UNSIGNED NOT NULL,
  `asset_type_id` bigint(20) UNSIGNED NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_latest_logo` int(11) DEFAULT NULL,
  `is_latest_banner` int(11) DEFAULT NULL,
  `is_latest_image` tinyint(1) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `page_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `announcement_id` bigint(20) UNSIGNED DEFAULT NULL,
  `articles_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `organization_assets`
--

INSERT INTO `organization_assets` (`organization_asset_id`, `organization_id`, `asset_type_id`, `file`, `created_at`, `updated_at`, `is_latest_logo`, `is_latest_banner`, `is_latest_image`, `user_id`, `page_type_id`, `status`, `announcement_id`, `articles_id`) VALUES
(1, 1, 1, 'organization_assets/logo/aeces_logo.png', '2022-02-22 19:32:19', '2022-02-22 19:32:19', 1, 0, NULL, 1, 4, 1, NULL, NULL),
(2, 2, 1, 'organization_assets/logo/cs_logo.png', '2022-02-22 19:32:19', '2022-02-22 19:32:19', 1, 0, NULL, 1, 4, 1, NULL, NULL),
(3, 3, 1, 'organization_assets/logo/jma_logo.png', '2022-02-22 19:32:19', '2022-02-22 19:32:19', 1, 0, NULL, 1, 4, 1, NULL, NULL),
(4, 4, 1, 'organization_assets/logo/jpia_logo.png', '2022-02-22 19:32:19', '2022-02-22 19:32:19', 1, 0, NULL, 1, 4, 1, NULL, NULL),
(5, 5, 1, 'organization_assets/logo/jpmap_logo.png', '2022-02-22 19:32:19', '2022-02-22 19:32:19', 1, 0, NULL, 1, 4, 1, NULL, NULL),
(6, 6, 1, 'organization_assets/logo/jpsme_logo.png', '2022-02-22 19:32:19', '2022-02-22 19:32:19', 1, 0, NULL, 1, 4, 1, NULL, NULL),
(7, 7, 1, 'organization_assets/logo/mentors_logo.png', '2022-02-22 19:32:19', '2022-02-22 19:32:19', 1, 0, NULL, 1, 4, 1, NULL, NULL),
(8, 8, 1, 'organization_assets/logo/pasoa_logo.png', '2022-02-22 19:32:19', '2022-02-22 19:32:19', 1, 0, NULL, 1, 4, 1, NULL, NULL),
(9, 9, 1, 'organization_assets/logo/csc.png', '2022-02-22 19:32:19', '2022-02-22 19:32:19', 1, 0, NULL, 1, 4, 1, NULL, NULL),
(10, 10, 1, 'organization_assets/logo/rec_logo.png', '2022-02-22 19:32:19', '2022-02-22 19:32:19', 1, 0, NULL, 1, 4, 1, NULL, NULL),
(11, 11, 1, 'organization_assets/logo/erg_logo.png', '2022-02-22 19:32:19', '2022-02-22 19:32:19', 1, 0, NULL, 1, 4, 1, NULL, NULL),
(12, 12, 1, 'organization_assets/logo/irock_logo.png', '2022-02-22 19:32:19', '2022-02-22 19:32:19', 1, 0, NULL, 1, 4, 1, NULL, NULL),
(13, 13, 1, 'organization_assets/logo/pupukaw_logo.png', '2022-02-22 19:32:19', '2022-02-22 19:32:19', 1, 0, NULL, 1, 4, 1, NULL, NULL),
(14, 14, 1, 'organization_assets/logo/chronicler_logo.png', '2022-02-22 19:32:19', '2022-02-22 19:32:19', 1, 0, NULL, 1, 4, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `organization_documents`
--

CREATE TABLE `organization_documents` (
  `organization_document_id` bigint(20) UNSIGNED NOT NULL,
  `organization_document_type_id` bigint(20) UNSIGNED NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `effective_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `organization_document_types`
--

CREATE TABLE `organization_document_types` (
  `organization_document_type_id` bigint(20) UNSIGNED NOT NULL,
  `organization_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `organization_document_types`
--

INSERT INTO `organization_document_types` (`organization_document_type_id`, `organization_id`, `type`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'Constitution', 'constitutions', NULL, NULL, NULL),
(2, 2, 'Resolution', 'resolutions', NULL, NULL, NULL),
(3, 2, 'Memorandum Order', 'memorandum_orders', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `organization_types`
--

CREATE TABLE `organization_types` (
  `organization_type_id` bigint(20) UNSIGNED NOT NULL,
  `organization_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `organization_types`
--

INSERT INTO `organization_types` (`organization_type_id`, `organization_type`) VALUES
(1, 'Academic'),
(2, 'Non-academic');

-- --------------------------------------------------------

--
-- Table structure for table `org_socials`
--

CREATE TABLE `org_socials` (
  `org_socials_id` bigint(20) UNSIGNED NOT NULL,
  `organization_id` bigint(20) UNSIGNED DEFAULT NULL,
  `social_id` bigint(20) UNSIGNED DEFAULT NULL,
  `org_social_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `embed_data` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `org_socials`
--

INSERT INTO `org_socials` (`org_socials_id`, `organization_id`, `social_id`, `org_social_link`, `status`, `embed_data`, `social_name`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'https://www.facebook.com/PUPTOFFICIAL', 1, '<div class=\"fb-post\" data-href=\"https://www.facebook.com/PUPTOFFICIAL\" data-width=\"500\" data-show-text=\"true\"></div>', 'Facebook', '2022-02-22 19:32:15', '2022-02-22 19:32:15'),
(2, 1, 1, 'https://www.facebook.com/PUPTOFFICIAL', 1, '<a class=\"twitter-timeline\" data-width=\"500\" data-theme=\"dark\" href=\"https://twitter.com/ThePUPOfficial?ref_src=twsrc%5Etfw\">Tweets by ThePUPOfficial</a> <script async src=\"https://platform.twitter.com/widgets.js\" charset=\"utf-8\"></script>', 'Facebook', '2022-02-22 19:32:15', '2022-02-22 19:32:15');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `pages_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_default_home` tinyint(1) DEFAULT NULL,
  `is_default_not_found` tinyint(1) DEFAULT NULL,
  `primary_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secondary_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tertiary_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quarternary_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT NULL,
  `is_announcements_activated` tinyint(1) DEFAULT NULL,
  `is_events_activated` tinyint(1) DEFAULT NULL,
  `is_articles_activated` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`pages_id`, `title`, `slug`, `content`, `created_at`, `updated_at`, `is_default_home`, `is_default_not_found`, `primary_color`, `secondary_color`, `tertiary_color`, `quarternary_color`, `status`, `is_announcements_activated`, `is_events_activated`, `is_articles_activated`) VALUES
(1, 'Homepage', 'homepage', NULL, '2021-10-23 15:20:44', '2021-11-08 05:47:08', 1, NULL, '...', '...', '...', '...', 1, 1, 1, 1),
(2, 'error-404-page', 'error-404-page', NULL, '2021-10-23 15:20:44', '2021-11-08 05:47:08', 1, NULL, '...', '...', '...', '...', 2, 1, NULL, NULL),
(3, 'About', 'about', NULL, '2021-10-23 15:20:44', '2021-11-08 05:47:08', 1, NULL, '...', '...', '...', '...', 1, 1, NULL, NULL);

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

--
-- Dumping data for table `page_types`
--

INSERT INTO `page_types` (`page_types_id`, `page_type`, `page_description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'system page', 'This page type is used for the system pages the syttem is using', 1, '2022-02-22 19:32:13', '2022-02-22 19:32:13'),
(2, 'news', 'This page type is used for the news page', 1, '2022-02-22 19:32:13', '2022-02-22 19:32:13'),
(3, 'announcements', 'This page type is used for the announcements page', 1, '2022-02-22 19:32:13', '2022-02-22 19:32:13'),
(4, 'organizations', 'This page type is used for the organizations page', 1, '2022-02-22 19:32:13', '2022-02-22 19:32:13'),
(5, 'default interfaces', 'This page type is used for the default interfaces page', 1, '2022-02-22 19:32:13', '2022-02-22 19:32:13');

-- --------------------------------------------------------

--
-- Table structure for table `partnership_requests`
--

CREATE TABLE `partnership_requests` (
  `request_id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `request_by` bigint(20) UNSIGNED NOT NULL,
  `request_to` bigint(20) UNSIGNED NOT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `request_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
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
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`permission_id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'AR-Create_Event', NULL, '2022-02-22 19:32:12', '2022-02-22 19:32:12'),
(2, 'AR-Edit_Event', NULL, '2022-02-22 19:32:12', '2022-02-22 19:32:12'),
(3, 'AR-Delete_Event', NULL, '2022-02-22 19:32:12', '2022-02-22 19:32:12'),
(4, 'AR-View_Event', NULL, '2022-02-22 19:32:12', '2022-02-22 19:32:12'),
(5, 'AR-Create_Event_Image', NULL, '2022-02-22 19:32:12', '2022-02-22 19:32:12'),
(6, 'AR-Edit_Event_Image', NULL, '2022-02-22 19:32:12', '2022-02-22 19:32:12'),
(7, 'AR-Delete_Event_Image', NULL, '2022-02-22 19:32:12', '2022-02-22 19:32:12'),
(8, 'AR-View_Event_Image', NULL, '2022-02-22 19:32:12', '2022-02-22 19:32:12'),
(9, 'AR-Create_Event_Document', NULL, '2022-02-22 19:32:12', '2022-02-22 19:32:12'),
(10, 'AR-Download_Event_Document', NULL, '2022-02-22 19:32:12', '2022-02-22 19:32:12'),
(11, 'AR-Edit_Event_Document', NULL, '2022-02-22 19:32:12', '2022-02-22 19:32:12'),
(12, 'AR-Delete_Event_Document', NULL, '2022-02-22 19:32:12', '2022-02-22 19:32:12'),
(13, 'AR-View_Event_Document', NULL, '2022-02-22 19:32:12', '2022-02-22 19:32:12'),
(14, 'AR-Create_Accomplishment_Report', NULL, '2022-02-22 19:32:12', '2022-02-22 19:32:12'),
(15, 'AR-Review_Accomplishment_Report', NULL, '2022-02-22 19:32:12', '2022-02-22 19:32:12'),
(16, 'AR-Download_Accomplishment_Report', NULL, '2022-02-22 19:32:12', '2022-02-22 19:32:12'),
(17, 'AR-View_Accomplishment_Report', NULL, '2022-02-22 19:32:12', '2022-02-22 19:32:12'),
(18, 'AR-View_Notification', NULL, '2022-02-22 19:32:12', '2022-02-22 19:32:12'),
(19, 'AR-Read_Notification', NULL, '2022-02-22 19:32:12', '2022-02-22 19:32:12'),
(20, 'AR-Create_Organization_Document', NULL, '2022-02-22 19:32:12', '2022-02-22 19:32:12'),
(21, 'AR-Edit_Organization_Document', NULL, '2022-02-22 19:32:12', '2022-02-22 19:32:12'),
(22, 'AR-Delete_Organization_Document', NULL, '2022-02-22 19:32:12', '2022-02-22 19:32:12'),
(23, 'AR-View_Organization_Document', NULL, '2022-02-22 19:32:12', '2022-02-22 19:32:12'),
(24, 'AR-Create_Organization_Document_Type', NULL, '2022-02-22 19:32:12', '2022-02-22 19:32:12'),
(25, 'AR-Edit_Organization_Document_Type', NULL, '2022-02-22 19:32:12', '2022-02-22 19:32:12'),
(26, 'AR-Delete_Organization_Document_Type', NULL, '2022-02-22 19:32:12', '2022-02-22 19:32:12'),
(27, 'AR-View_Organization_Document_Type', NULL, '2022-02-22 19:32:12', '2022-02-22 19:32:12'),
(28, 'AR-Create_Student_Accomplishment', NULL, '2022-02-22 19:32:12', '2022-02-22 19:32:12'),
(29, 'AR-Review_Student_Accomplishment', NULL, '2022-02-22 19:32:12', '2022-02-22 19:32:12'),
(30, 'AR-View_Student_Accomplishment', NULL, '2022-02-22 19:32:12', '2022-02-22 19:32:12'),
(31, 'AR-View_Home', NULL, '2022-02-22 19:32:12', '2022-02-22 19:32:12'),
(32, 'AR-Super-Admin-View_Admin_Home', NULL, '2022-02-22 19:32:12', '2022-02-22 19:32:12'),
(33, 'AR-Super-Admin-Manage_Accomplishment_Report', NULL, '2022-02-22 19:32:12', '2022-02-22 19:32:12'),
(34, 'AR-Super-Admin-Manage_Event', NULL, '2022-02-22 19:32:12', '2022-02-22 19:32:12'),
(35, 'AR-Super-Admin-Manage_Organization', NULL, '2022-02-22 19:32:12', '2022-02-22 19:32:12'),
(36, 'AR-Super-Admin-Manage_Notification', NULL, '2022-02-22 19:32:12', '2022-02-22 19:32:12'),
(37, 'AR-Super-Admin-Manage_Roles_and_Permissions', NULL, '2022-02-22 19:32:12', '2022-02-22 19:32:12'),
(38, 'AR-Manage_Officer_Signatures', NULL, '2022-02-22 19:32:12', '2022-02-22 19:32:12');

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
(1, 3),
(2, 3),
(3, 3),
(4, 3),
(5, 3),
(6, 3),
(7, 3),
(8, 3),
(9, 3),
(10, 3),
(11, 3),
(12, 3),
(13, 3),
(14, 3),
(16, 3),
(17, 3),
(18, 3),
(19, 3),
(20, 3),
(21, 3),
(22, 3),
(23, 3),
(24, 3),
(25, 3),
(26, 3),
(27, 3),
(29, 3),
(38, 3),
(15, 4),
(16, 4),
(17, 4),
(18, 4),
(19, 4),
(31, 8),
(28, 8),
(30, 8),
(31, 8),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1);

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_user`
--

INSERT INTO `permission_user` (`permission_id`, `user_id`) VALUES
(1, 3),
(2, 3),
(3, 3),
(4, 3),
(5, 3),
(6, 3),
(7, 3),
(8, 3),
(9, 3),
(10, 3),
(11, 3),
(12, 3),
(13, 3),
(14, 3),
(16, 3),
(17, 3),
(18, 3),
(19, 3),
(20, 3),
(21, 3),
(22, 3),
(23, 3),
(24, 3),
(25, 3),
(26, 3),
(27, 3),
(29, 3),
(28, 3),
(30, 3),
(31, 3),
(38, 3),
(15, 4),
(16, 4),
(17, 4),
(18, 4),
(19, 4),
(31, 4),
(28, 8),
(30, 8),
(31, 8),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(1, 9),
(2, 9),
(3, 9),
(4, 9),
(5, 9),
(6, 9),
(7, 9),
(8, 9),
(9, 9),
(10, 9),
(11, 9),
(12, 9),
(13, 9),
(14, 9),
(16, 9),
(17, 9),
(18, 9),
(19, 9),
(20, 9),
(21, 9),
(22, 9),
(23, 9),
(24, 9),
(25, 9),
(26, 9),
(27, 9),
(29, 9),
(28, 9),
(30, 9),
(31, 9),
(38, 3);

-- --------------------------------------------------------

--
-- Table structure for table `position_categories`
--

CREATE TABLE `position_categories` (
  `position_category_id` bigint(20) UNSIGNED NOT NULL,
  `position_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `position_categories`
--

INSERT INTO `position_categories` (`position_category_id`, `position_category`) VALUES
(1, 'President'),
(2, 'Affairs'),
(3, 'Records'),
(4, 'Documentation'),
(5, 'Finance'),
(6, 'Audit'),
(7, 'Communications'),
(8, 'Academics'),
(9, 'Arts'),
(10, 'Sports'),
(11, 'Representative');

-- --------------------------------------------------------

--
-- Table structure for table `position_titles`
--

CREATE TABLE `position_titles` (
  `position_title_id` bigint(20) UNSIGNED NOT NULL,
  `organization_id` bigint(20) UNSIGNED NOT NULL,
  `position_category_id` bigint(20) UNSIGNED NOT NULL,
  `position_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `position_titles`
--

INSERT INTO `position_titles` (`position_title_id`, `organization_id`, `position_category_id`, `position_title`) VALUES
(1, 2, 1, 'President'),
(2, 2, 2, 'Vice President for Internal Affairs'),
(3, 2, 2, 'Vice President for External Affairs'),
(4, 2, 3, 'Vice President for Records'),
(5, 2, 3, 'Assistant Vice President for Records'),
(6, 2, 4, 'Vice President for Research and Documentation'),
(7, 2, 4, 'Assistant Vice President for Research and Documentation '),
(8, 2, 5, 'Vice President for Finance'),
(9, 2, 5, 'Assitant Vice President for Finance'),
(10, 2, 6, 'Vice President for Audit'),
(11, 2, 7, 'Vice President for Communications'),
(12, 2, 7, 'Assistant Vice President for Communications'),
(13, 2, 8, 'Vice President for Academics'),
(14, 2, 8, 'Assistant Vice President for Academics'),
(15, 2, 9, 'Vice President for Arts'),
(16, 2, 9, 'Assistant Vice President for Arts'),
(17, 2, 10, 'Vice Presient for Sports'),
(18, 2, 10, 'Assistant Vice Presient for Sports'),
(19, 2, 11, 'Computer Society Representative');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'Super Admin - Bernadeth Canlas, Student Affairs.', NULL, NULL),
(2, 'Home Page Admin', 'Home Page Admin - PIO assigned to manage Home Page Maintenance of each organization.', NULL, NULL),
(3, 'AR Officer Admin', 'AR Admin - Documentation Officer assigned for managing Accomplishment Reports for each organization.', NULL, NULL),
(4, 'AR President Admin', 'AR Admin - Organization President Assigned for reviewing Accomplishment Reports.', NULL, NULL),
(5, 'Membership Admin', 'Membership Admin - Finance Officer assigned to manage Membership Applications of each organization.', NULL, NULL),
(6, 'GPOA Admin', 'GPOA Admin - Documentation Officer assigned for managing GPOA for each organization.', NULL, NULL),
(7, 'Finance Admin', 'Finance Officer assigned to manage Financial Statements of each organization.', NULL, NULL),
(8, 'User', 'Members of the Organizations in PUP Taguig', NULL, NULL),
(9, 'Adviser', 'Adviser of an Organization in PUP Taguig', NULL, NULL),
(10, 'Director', 'Director of the PUP Taguig', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `organization_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `organization_id`) VALUES
(1, 1, NULL),
(2, 2, 2),
(3, 3, 2),
(8, 3, 2),
(4, 4, 2),
(5, 5, 2),
(8, 5, 2),
(6, 6, 2),
(7, 7, 2),
(8, 8, 2),
(3, 9, 2),
(8, 9, 2),
(9, 10, 2),
(5, 11, 4),
(6, 12, 4),
(5, 13, 11),
(5, 14, 13),
(10, 15, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sa_document_types`
--

CREATE TABLE `sa_document_types` (
  `SA_document_type_id` bigint(20) UNSIGNED NOT NULL,
  `document_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `helper` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sa_document_types`
--

INSERT INTO `sa_document_types` (`SA_document_type_id`, `document_type`, `helper`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Certificate of Participation', 'A document that certifies that the student attended the event.', '2022-02-22 19:32:23', '2022-02-22 19:32:23', NULL),
(2, 'Screenshot', 'Screenshot of the event.', '2022-02-22 19:32:23', '2022-02-22 19:32:23', NULL),
(3, 'Photograph', 'Photograph of the event.', '2022-02-22 19:32:23', '2022-02-22 19:32:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `school_years`
--

CREATE TABLE `school_years` (
  `school_year_id` bigint(20) UNSIGNED NOT NULL,
  `year_start` year(4) NOT NULL,
  `year_end` year(4) NOT NULL,
  `annual_start` date DEFAULT NULL,
  `annual_end` date DEFAULT NULL,
  `first_semester_start` date DEFAULT NULL,
  `first_semester_end` date DEFAULT NULL,
  `second_semester_start` date DEFAULT NULL,
  `second_semester_end` date DEFAULT NULL,
  `summer_term_start` date DEFAULT NULL,
  `summer_term_end` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `school_years`
--

INSERT INTO `school_years` (`school_year_id`, `year_start`, `year_end`, `annual_start`, `annual_end`, `first_semester_start`, `first_semester_end`, `second_semester_start`, `second_semester_end`, `summer_term_start`, `summer_term_end`, `created_at`, `updated_at`) VALUES
(1, 2020, 2021, '2020-10-01', '2021-09-30', '2020-10-01', '2021-02-28', '2021-03-01', '2021-07-31', '2021-08-01', '2021-09-30', NULL, NULL);

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

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `social_media_id` bigint(20) UNSIGNED NOT NULL,
  `social_media_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `embed_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`social_media_id`, `social_media_name`, `status`, `embed_logo`, `created_at`, `updated_at`) VALUES
(1, 'Facebook', 1, '...', '2022-02-22 19:32:14', '2022-02-22 19:32:14'),
(2, 'Twitter', 1, '...', '2022-02-22 19:32:14', '2022-02-22 19:32:14'),
(3, 'Instagram', 1, '...', '2022-02-22 19:32:14', '2022-02-22 19:32:14');

-- --------------------------------------------------------

--
-- Table structure for table `sois_gates`
--

CREATE TABLE `sois_gates` (
  `sois_gates_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `is_logged_in` tinyint(1) DEFAULT NULL,
  `gate_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sois_gates`
--

INSERT INTO `sois_gates` (`sois_gates_id`, `user_id`, `is_logged_in`, `gate_key`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 'KfOzrWLQmNFLGN4IbJ4ZRSjz0SaIlPQgIt90wb6E', '2022-02-22 19:32:20', '2022-02-22 19:32:20');

-- --------------------------------------------------------

--
-- Table structure for table `sois_links`
--

CREATE TABLE `sois_links` (
  `sois_links_id` bigint(20) UNSIGNED NOT NULL,
  `link_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `external_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sois_links`
--

INSERT INTO `sois_links` (`sois_links_id`, `link_name`, `link_description`, `external_link`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Accomplishment Report', 'This link is to access Accomplishment Reports website', 'https://sois-ar.puptaguigcs.net/', 1, '2022-02-22 19:32:14', '2022-02-22 19:32:14'),
(2, 'GPOA', 'This link is to access GPOA website', 'http://sois-gpoa.puptaguigcs.net/', 1, '2022-02-22 19:32:14', '2022-02-22 19:32:14'),
(3, 'Membership', 'This link is to access Membership website', 'https://sois-membership.puptaguigcs.net/', 1, '2022-02-22 19:32:14', '2022-02-22 19:32:14');

-- --------------------------------------------------------

--
-- Table structure for table `student_accomplishments`
--

CREATE TABLE `student_accomplishments` (
  `student_accomplishment_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `organization_id` bigint(20) UNSIGNED NOT NULL,
  `level_id` bigint(20) UNSIGNED DEFAULT NULL,
  `fund_source_id` bigint(20) UNSIGNED DEFAULT NULL,
  `accomplished_event_id` bigint(20) UNSIGNED DEFAULT NULL,
  `event_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `accomplishment_uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `objective` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `venue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organizer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activity_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `beneficiaries` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `budget` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `reviewed_by` bigint(20) UNSIGNED DEFAULT NULL,
  `reviewed_at` timestamp NULL DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_accomplishment_files`
--

CREATE TABLE `student_accomplishment_files` (
  `student_accomplishment_file_id` bigint(20) UNSIGNED NOT NULL,
  `student_accomplishment_id` bigint(20) UNSIGNED NOT NULL,
  `SA_document_type_id` bigint(20) UNSIGNED NOT NULL,
  `type` tinyint(3) UNSIGNED NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tabular_columns`
--

CREATE TABLE `tabular_columns` (
  `tabular_column_id` bigint(20) UNSIGNED NOT NULL,
  `tabular_table_id` bigint(20) UNSIGNED NOT NULL,
  `tabular_column_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tabular_columns`
--

INSERT INTO `tabular_columns` (`tabular_column_id`, `tabular_table_id`, `tabular_column_name`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '#', NULL, '2022-02-22 19:32:24', '2022-02-22 19:32:24', NULL),
(2, 1, 'Name of Award', NULL, '2022-02-22 19:32:24', '2022-02-22 19:32:24', NULL),
(3, 1, 'Certifying Body', NULL, '2022-02-22 19:32:24', '2022-02-22 19:32:24', NULL),
(4, 1, 'Place', NULL, '2022-02-22 19:32:24', '2022-02-22 19:32:24', NULL),
(5, 1, 'Date(mm/dd/yyyy)', NULL, '2022-02-22 19:32:24', '2022-02-22 19:32:24', NULL),
(6, 1, 'Level', NULL, '2022-02-22 19:32:24', '2022-02-22 19:32:24', NULL),
(7, 1, 'Description of Supporting Documents Submitted', NULL, '2022-02-22 19:32:24', '2022-02-22 19:32:24', NULL),
(8, 2, '#', NULL, '2022-02-22 19:32:24', '2022-02-22 19:32:24', NULL),
(9, 2, 'Title of the Program', NULL, '2022-02-22 19:32:24', '2022-02-22 19:32:24', NULL),
(10, 2, 'Place', NULL, '2022-02-22 19:32:24', '2022-02-22 19:32:24', NULL),
(11, 2, 'Date(mm/dd/yyyy)', NULL, '2022-02-22 19:32:24', '2022-02-22 19:32:24', NULL),
(12, 2, 'Level', NULL, '2022-02-22 19:32:24', '2022-02-22 19:32:24', NULL),
(13, 2, 'Number of Beneficiaries', NULL, '2022-02-22 19:32:24', '2022-02-22 19:32:24', NULL),
(14, 2, 'Description of Supporting Documents Submitted', NULL, '2022-02-22 19:32:24', '2022-02-22 19:32:24', NULL),
(15, 3, '#', NULL, '2022-02-22 19:32:24', '2022-02-22 19:32:24', NULL),
(16, 3, 'Department', NULL, '2022-02-22 19:32:24', '2022-02-22 19:32:24', NULL),
(17, 3, 'Name of Student (Surname, First Name, Middle Initial)', NULL, '2022-02-22 19:32:24', '2022-02-22 19:32:24', NULL),
(18, 3, 'Title', NULL, '2022-02-22 19:32:24', '2022-02-22 19:32:24', NULL),
(19, 3, 'Classification', NULL, '2022-02-22 19:32:24', '2022-02-22 19:32:24', NULL),
(20, 3, 'Nature', NULL, '2022-02-22 19:32:24', '2022-02-22 19:32:24', NULL),
(21, 3, 'Budget (in PhP)', NULL, '2022-02-22 19:32:24', '2022-02-22 19:32:24', NULL),
(22, 3, 'Source of Fund', NULL, '2022-02-22 19:32:24', '2022-02-22 19:32:24', NULL),
(23, 3, 'Organizer', NULL, '2022-02-22 19:32:24', '2022-02-22 19:32:24', NULL),
(24, 3, 'Level', NULL, '2022-02-22 19:32:24', '2022-02-22 19:32:24', NULL),
(25, 3, 'Venue', NULL, '2022-02-22 19:32:24', '2022-02-22 19:32:24', NULL),
(26, 3, 'From (mm/dd/yy)', NULL, '2022-02-22 19:32:24', '2022-02-22 19:32:24', NULL),
(27, 3, 'To (mm/dd/yy)', NULL, '2022-02-22 19:32:24', '2022-02-22 19:32:24', NULL),
(28, 3, 'Total No. of Hours', NULL, '2022-02-22 19:32:24', '2022-02-22 19:32:24', NULL),
(29, 3, 'Description of Supporting Documents Submitted (MOA/MOU, Certificate of Recognitions/Appreciations)', NULL, '2022-02-22 19:32:24', '2022-02-22 19:32:24', NULL),
(30, 4, '#', NULL, '2022-02-22 19:32:24', '2022-02-22 19:32:24', NULL),
(31, 4, 'Department', NULL, '2022-02-22 19:32:24', '2022-02-22 19:32:24', NULL),
(32, 4, 'Name of Student (Surname, First Name, Middle Initial)', NULL, '2022-02-22 19:32:24', '2022-02-22 19:32:24', NULL),
(33, 4, 'Title', NULL, '2022-02-22 19:32:24', '2022-02-22 19:32:24', NULL),
(34, 4, 'Classification', NULL, '2022-02-22 19:32:24', '2022-02-22 19:32:24', NULL),
(35, 4, 'Nature', NULL, '2022-02-22 19:32:24', '2022-02-22 19:32:24', NULL),
(36, 4, 'Budget (in PhP)', NULL, '2022-02-22 19:32:24', '2022-02-22 19:32:24', NULL),
(37, 4, 'Source of Fund', NULL, '2022-02-22 19:32:24', '2022-02-22 19:32:24', NULL),
(38, 4, 'Organizer', NULL, '2022-02-22 19:32:24', '2022-02-22 19:32:24', NULL),
(39, 4, 'Level', NULL, '2022-02-22 19:32:24', '2022-02-22 19:32:24', NULL),
(40, 4, 'Venue', NULL, '2022-02-22 19:32:24', '2022-02-22 19:32:24', NULL),
(41, 4, 'From (mm/dd/yy)', NULL, '2022-02-22 19:32:24', '2022-02-22 19:32:24', NULL),
(42, 4, 'To (mm/dd/yy)', NULL, '2022-02-22 19:32:24', '2022-02-22 19:32:24', NULL),
(43, 4, 'Total No. of Hours', NULL, '2022-02-22 19:32:24', '2022-02-22 19:32:24', NULL),
(44, 4, 'Description of Supporting Documents Submitted (MOA/MOU, Certificate of Recognitions/Appreciations)', NULL, '2022-02-22 19:32:24', '2022-02-22 19:32:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tabular_tables`
--

CREATE TABLE `tabular_tables` (
  `tabular_table_id` bigint(20) UNSIGNED NOT NULL,
  `tabular_table_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference_table_number` int(10) UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tabular_tables`
--

INSERT INTO `tabular_tables` (`tabular_table_id`, `tabular_table_name`, `reference_table_number`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'VII. Students Awards/Recognitions from  Reputable Organizations', 7, NULL, '2022-02-22 19:32:24', '2022-02-22 19:32:24', NULL),
(2, 'VIII. Community Relation and Outreach Program', 8, NULL, '2022-02-22 19:32:24', '2022-02-22 19:32:24', NULL),
(3, 'IX. STUDENTS TRAININGS AND SEMINARS', 9, NULL, '2022-02-22 19:32:24', '2022-02-22 19:32:24', NULL),
(4, 'X. OTHER STUDENT ACTIVITIES', 10, NULL, '2022-02-22 19:32:24', '2022-02-22 19:32:24', NULL);

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `temporary_files`
--

CREATE TABLE `temporary_files` (
  `temporary_file_id` bigint(20) UNSIGNED NOT NULL,
  `folder` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `upcoming_events`
--

CREATE TABLE `upcoming_events` (
  `upcoming_event_id` bigint(20) UNSIGNED NOT NULL,
  `organization_id` bigint(20) UNSIGNED NOT NULL,
  `accomplished_event_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date` date NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `objectives` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `head_organization` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `participants` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `partnerships` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `venue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` time NOT NULL,
  `projected_budget` int(11) DEFAULT NULL,
  `sponsor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fund_source` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activity_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `advisers_approval` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `studAffairs_approval` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `directors_approval` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `completion_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'upcoming',
  `partnership_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `gender_id` bigint(20) UNSIGNED DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suffix` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` tinytext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date NOT NULL,
  `mobile_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_and_section` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_code` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `course_id`, `gender_id`, `email`, `password`, `student_number`, `first_name`, `middle_name`, `last_name`, `suffix`, `title`, `date_of_birth`, `mobile_number`, `address`, `year_and_section`, `email_verified_at`, `created_at`, `updated_at`, `status`, `two_factor_secret`, `two_factor_recovery_code`, `remember_token`) VALUES
(1, NULL, NULL, 'super-admin@email.com', '$2y$10$LKeoEAGuMqMiK2Xh2rUtxu/4Vw9hFfUh6bR4dj5Oo/6uh.hTGgI.G', NULL, 'Super Admin', 'I', 'Am', NULL, NULL, '2000-01-01', '+639123456124', 'Taguig', NULL, NULL, '2022-02-22 19:32:16', '2022-02-22 19:32:16', 1, NULL, NULL, NULL),
(2, 9, 1, 'bsit-homepage@email.com', '$2y$10$BUxbVbk.CarX1uBTtyFx5uxOz9qh3J9TnmxpIzuM/aSVj/QQifiam', '2018-12346-TG-0', 'John', 'Faraday', 'Doe', NULL, NULL, '2000-01-01', '+639123456700', 'Taguig', '4-1', NULL, '2022-02-22 19:32:16', '2022-02-22 19:32:16', 1, NULL, NULL, NULL),
(3, 11, 2, 'lullabyangela@gmail.com', '$2y$10$uoCfW6iXjmMaqByZo.gP2uNw2BjRnyFgJCUxKhvSONTO179eaZS8W', '2019-00404-TG-0', 'Victoria Angela Marie', 'Aquino', 'Dolor', NULL, NULL, '2000-11-04', '+639164546149', '144 A. Reyes St., New Lower Bicutan, Taguig City', '3-1', NULL, '2022-02-22 19:32:16', '2022-02-22 19:32:16', 1, NULL, NULL, NULL),
(4, 9, 1, 'jaceamaguin@gmail.com', '$2y$10$z0rnkeWzvjWd1LpkMtY0FO1QPab4xYz1Hqe1zp0KhVElpcJ.GAJHy', '2018-00167-TG-0', 'Juan Carlos', NULL, 'Amaguin', NULL, NULL, '1998-11-08', '+639175391998', '20 Kirishima St. BF Thai Las Piñas City', '4-1', NULL, '2022-02-22 19:32:16', '2022-02-22 19:32:16', 1, NULL, NULL, NULL),
(5, 9, 1, 'bsit-membership@email.com', '$2y$10$Ih/bXZIjhss7fjB0wfnSu.2ClBicDluqWxycVXr3d6DeVvqMXv3Ly', '2018-12345-TG-0', 'John', 'Faraday', 'Doe', NULL, NULL, '2000-01-01', '+639123456700', 'Taguig', '4-1', NULL, '2022-02-22 19:32:16', '2022-02-22 19:32:16', 1, NULL, NULL, NULL),
(6, 9, 1, 'bsit-gpoa@email.com', '$2y$10$QPJEEb7Z55SNNfKlnoHTQuipdUMeCDvKV0ezzKfhks/8w8u2de1h2', '2018-12348-TG-0', 'John', 'Faraday', 'Doe', NULL, NULL, '2000-01-01', '+639123456700', 'Taguig', '4-1', NULL, '2022-02-22 19:32:16', '2022-02-22 19:32:16', 1, NULL, NULL, NULL),
(7, 9, 1, 'bsit-finance@email.com', '$2y$10$yfd/T67fYPdzMl3.WOetsufGMlmikqxxNa8LX.FOZgGoGsrPXrQnK', '2018-12347-TG-0', 'Ian Angelo', NULL, 'Nierva', NULL, NULL, '2000-01-01', '+639123456700', 'Taguig', '4-1', NULL, '2022-02-22 19:32:16', '2022-02-22 19:32:16', 1, NULL, NULL, NULL),
(8, 9, 1, 'bsit-member@email.com', '$2y$10$37ozZHMKxlHv5dh8TTVJBux2teARPyMvcw/6ojUuWYfoIjbYWaJYO', '2018-00012-TG-0', 'Jon Jeremiah', 'Espina', 'Bartolome', NULL, NULL, '2000-01-01', '+639123456710', 'Taguig', '4-1', NULL, '2022-02-22 19:32:16', '2022-02-22 19:32:16', 1, NULL, NULL, NULL),
(9, 11, 1, 'bryantpaulbabac07302001@gmail.com', '$2y$10$HYRDgXlKXLFZry.jEYkJiuNu/0GSRh6hYUZI8FT636JjC37K7uWdW', '2020-00197-TG-0', 'Bryant Paul', 'Sana', 'Babac', NULL, NULL, '2001-07-30', '+639667344635', 'Imus City, Cavite', '3-1', NULL, '2022-02-22 19:32:16', '2022-02-22 19:32:16', 1, NULL, NULL, NULL),
(10, NULL, NULL, 'adviser@email.com', '$2y$10$q9bVIgR4VIE3Bhl.7Ua0KOuBt2IFZq/BDEBOw..NzPq8qlCkNbGte', NULL, 'Adviser', 'I', 'Am', NULL, NULL, '2001-01-01', '+639667344637', 'Taguig', NULL, NULL, '2022-02-22 19:32:16', '2022-02-22 19:32:16', 1, NULL, NULL, NULL),
(11, 1, 1, 'bsa-membership2@email.com', '$2y$10$eX3LOBsUgGkNn9Ghh0BRluQrEIQOsiZzQlvSvYs8JqnWcTvlRMOQG', '2018-66666-TG-0', 'JohnMBS2', 'Faraday2', 'Doe2', NULL, NULL, '2000-01-01', '+639123456666', 'Taguig', '4-1', NULL, '2022-02-22 19:32:16', '2022-02-22 19:32:16', 1, NULL, NULL, NULL),
(12, 1, 1, 'bsa-gpoa2@email.com', '$2y$10$3Jh3h8FYSrJIYb3pQhJKN.fAmsxIVOg7Sn4R2R7ChL9PIJTWbrMGW', '2018-77777-TG-0', 'JohnGPOA2', 'Faraday2', 'Doe2', NULL, NULL, '2000-01-01', '+639123457777', 'Taguig', '4-1', NULL, '2022-02-22 19:32:16', '2022-02-22 19:32:16', 1, NULL, NULL, NULL),
(13, NULL, 1, 'erg-membership@email.com', '$2y$10$XDnESn3NMIezd.x8bP2GVelItW6h4m7L73fWmiyahPn2PqVe9HeEO', NULL, 'I', 'Am', 'Erg', NULL, NULL, '2000-01-01', '+639123457777', 'Taguig', NULL, NULL, '2022-02-22 19:32:16', '2022-02-22 19:32:16', 1, NULL, NULL, NULL),
(14, NULL, 1, 'pupukaw-membership@email.com', '$2y$10$Ghi3ZtdWnt7KLJWBpwAXzeGnktxj3Sc5KX1NgVe5n0BxCoeqcvk9e', NULL, 'I', 'Am', 'Pupukaw', NULL, NULL, '2000-01-01', '+639123457777', 'Taguig', NULL, NULL, '2022-02-22 19:32:16', '2022-02-22 19:32:16', 1, NULL, NULL, NULL),
(15, NULL, 1, 'director@email.com', '$2y$10$icc1gHtfAE80xG6O7oaCouw5aj2Wee0uVMWCmvbJB5JcoxRdVV/Pm', NULL, 'I', 'Am', 'Director', NULL, NULL, '2000-01-01', '+639123457777', 'Taguig', NULL, NULL, '2022-02-22 19:32:16', '2022-02-22 19:32:16', 1, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_applications`
--
ALTER TABLE `academic_applications`
  ADD PRIMARY KEY (`application_id`),
  ADD KEY `academic_applications_user_id_foreign` (`user_id`),
  ADD KEY `academic_applications_membership_id_foreign` (`membership_id`),
  ADD KEY `academic_applications_course_id_foreign` (`course_id`),
  ADD KEY `academic_applications_organization_id_foreign` (`organization_id`);

--
-- Indexes for table `academic_members`
--
ALTER TABLE `academic_members`
  ADD PRIMARY KEY (`academic_member_id`),
  ADD KEY `academic_members_user_id_foreign` (`user_id`),
  ADD KEY `academic_members_membership_id_foreign` (`membership_id`),
  ADD KEY `academic_members_organization_id_foreign` (`organization_id`),
  ADD KEY `academic_members_course_id_foreign` (`course_id`);

--
-- Indexes for table `academic_membership`
--
ALTER TABLE `academic_membership`
  ADD PRIMARY KEY (`academic_membership_id`),
  ADD KEY `academic_membership_organization_id_foreign` (`organization_id`);

--
-- Indexes for table `accomplished_events`
--
ALTER TABLE `accomplished_events`
  ADD PRIMARY KEY (`accomplished_event_id`),
  ADD UNIQUE KEY `accomplished_events_slug_unique` (`slug`),
  ADD KEY `accomplished_events_organization_id_foreign` (`organization_id`),
  ADD KEY `accomplished_events_event_category_id_foreign` (`event_category_id`),
  ADD KEY `accomplished_events_event_nature_id_foreign` (`event_nature_id`),
  ADD KEY `accomplished_events_event_classification_id_foreign` (`event_classification_id`),
  ADD KEY `accomplished_events_event_role_id_foreign` (`event_role_id`),
  ADD KEY `accomplished_events_level_id_foreign` (`level_id`),
  ADD KEY `accomplished_events_fund_source_id_foreign` (`fund_source_id`);

--
-- Indexes for table `accomplishment_reports`
--
ALTER TABLE `accomplishment_reports`
  ADD PRIMARY KEY (`accomplishment_report_id`),
  ADD UNIQUE KEY `accomplishment_reports_accomplishment_report_uuid_unique` (`accomplishment_report_uuid`),
  ADD KEY `accomplishment_reports_accomplishment_report_type_id_foreign` (`accomplishment_report_type_id`),
  ADD KEY `accomplishment_reports_organization_id_foreign` (`organization_id`),
  ADD KEY `accomplishment_reports_created_by_foreign` (`created_by`),
  ADD KEY `accomplishment_reports_reviewed_by_foreign` (`reviewed_by`);

--
-- Indexes for table `accomplishment_report_types`
--
ALTER TABLE `accomplishment_report_types`
  ADD PRIMARY KEY (`accomplishment_report_type_id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`announcements_id`),
  ADD UNIQUE KEY `announcements_announcement_title_unique` (`announcement_title`),
  ADD KEY `announcements_user_id_foreign` (`user_id`),
  ADD KEY `announcements_organization_id_foreign` (`organization_id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`articles_id`),
  ADD KEY `articles_user_id_foreign` (`user_id`),
  ADD KEY `articles_organization_id_foreign` (`organization_id`),
  ADD KEY `articles_article_type_id_foreign` (`article_type_id`);

--
-- Indexes for table `articles_tags`
--
ALTER TABLE `articles_tags`
  ADD PRIMARY KEY (`articles_tags_id`),
  ADD KEY `articles_tags_article_id_foreign` (`article_id`),
  ADD KEY `articles_tags_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `article_types`
--
ALTER TABLE `article_types`
  ADD PRIMARY KEY (`article_types_id`);

--
-- Indexes for table `ar_data_logs`
--
ALTER TABLE `ar_data_logs`
  ADD PRIMARY KEY (`data_log_id`),
  ADD KEY `ar_data_logs_user_id_foreign` (`user_id`);

--
-- Indexes for table `ar_notifications`
--
ALTER TABLE `ar_notifications`
  ADD PRIMARY KEY (`ar_notification_id`),
  ADD KEY `ar_notifications_user_id_foreign` (`user_id`);

--
-- Indexes for table `asset_types`
--
ALTER TABLE `asset_types`
  ADD PRIMARY KEY (`asset_type_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `courses_organization_id_foreign` (`organization_id`);

--
-- Indexes for table `declined_aapplications`
--
ALTER TABLE `declined_aapplications`
  ADD PRIMARY KEY (`declined_aapp_id`),
  ADD KEY `declined_aapplications_application_id_foreign` (`application_id`);

--
-- Indexes for table `declined_naapplications`
--
ALTER TABLE `declined_naapplications`
  ADD PRIMARY KEY (`declined_naapp_id`),
  ADD KEY `declined_naapplications_application_id_foreign` (`application_id`);

--
-- Indexes for table `default_interfaces`
--
ALTER TABLE `default_interfaces`
  ADD PRIMARY KEY (`default_interfaces_id`),
  ADD KEY `default_interfaces_interface_type_id_foreign` (`interface_type_id`);

--
-- Indexes for table `disapproved_events`
--
ALTER TABLE `disapproved_events`
  ADD PRIMARY KEY (`disapproved_event_id`),
  ADD KEY `disapproved_events_disapproved_by_foreign` (`disapproved_by`),
  ADD KEY `disapproved_events_upcoming_event_id_foreign` (`upcoming_event_id`);

--
-- Indexes for table `event_categories`
--
ALTER TABLE `event_categories`
  ADD PRIMARY KEY (`event_category_id`);

--
-- Indexes for table `event_classifications`
--
ALTER TABLE `event_classifications`
  ADD PRIMARY KEY (`event_classification_id`);

--
-- Indexes for table `event_documents`
--
ALTER TABLE `event_documents`
  ADD PRIMARY KEY (`event_document_id`),
  ADD KEY `event_documents_accomplished_event_id_foreign` (`accomplished_event_id`),
  ADD KEY `event_documents_event_document_type_id_foreign` (`event_document_type_id`);

--
-- Indexes for table `event_document_types`
--
ALTER TABLE `event_document_types`
  ADD PRIMARY KEY (`event_document_type_id`);

--
-- Indexes for table `event_images`
--
ALTER TABLE `event_images`
  ADD PRIMARY KEY (`event_image_id`),
  ADD UNIQUE KEY `event_images_slug_unique` (`slug`),
  ADD KEY `event_images_accomplished_event_id_foreign` (`accomplished_event_id`);

--
-- Indexes for table `event_natures`
--
ALTER TABLE `event_natures`
  ADD PRIMARY KEY (`event_nature_id`);

--
-- Indexes for table `event_partnerships`
--
ALTER TABLE `event_partnerships`
  ADD PRIMARY KEY (`event_partnership_id`),
  ADD KEY `event_partnerships_event_id_foreign` (`event_id`),
  ADD KEY `event_partnerships_partnership_to_foreign` (`partnership_to`);

--
-- Indexes for table `event_roles`
--
ALTER TABLE `event_roles`
  ADD PRIMARY KEY (`event_role_id`);

--
-- Indexes for table `event_signatures`
--
ALTER TABLE `event_signatures`
  ADD PRIMARY KEY (`signature_id`),
  ADD KEY `event_signatures_user_id_foreign` (`user_id`),
  ADD KEY `event_signatures_organization_id_foreign` (`organization_id`),
  ADD KEY `event_signatures_role_id_foreign` (`role_id`);

--
-- Indexes for table `expected_applicants`
--
ALTER TABLE `expected_applicants`
  ADD PRIMARY KEY (`expected_applicant_id`),
  ADD UNIQUE KEY `expected_applicants_student_number_unique` (`student_number`),
  ADD KEY `expected_applicants_organization_id_foreign` (`organization_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fund_sources`
--
ALTER TABLE `fund_sources`
  ADD PRIMARY KEY (`fund_source_id`);

--
-- Indexes for table `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`gender_id`);

--
-- Indexes for table `gpoa_notifications`
--
ALTER TABLE `gpoa_notifications`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `gpoa_notifications_event_id_foreign` (`event_id`),
  ADD KEY `gpoa_notifications_to_foreign` (`to`),
  ADD KEY `gpoa_notifications_from_foreign` (`from`);

--
-- Indexes for table `interface_types`
--
ALTER TABLE `interface_types`
  ADD PRIMARY KEY (`interface_types_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `membership_messages`
--
ALTER TABLE `membership_messages`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `membership_messages_user_id_foreign` (`user_id`),
  ADD KEY `membership_messages_organization_id_foreign` (`organization_id`);

--
-- Indexes for table `membership_replies`
--
ALTER TABLE `membership_replies`
  ADD PRIMARY KEY (`reply_id`),
  ADD KEY `membership_replies_user_id_foreign` (`user_id`),
  ADD KEY `membership_replies_message_id_foreign` (`message_id`),
  ADD KEY `membership_replies_organization_id_foreign` (`organization_id`);

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
-- Indexes for table `navigation_menus_navigation_types`
--
ALTER TABLE `navigation_menus_navigation_types`
  ADD PRIMARY KEY (`navigation_menus_navigation_types_id`),
  ADD KEY `navigation_menus_navigation_types_navigation_menu_id_foreign` (`navigation_menu_id`),
  ADD KEY `navigation_menus_navigation_types_navigation_type_id_foreign` (`navigation_type_id`);

--
-- Indexes for table `navigation_menu_types`
--
ALTER TABLE `navigation_menu_types`
  ADD PRIMARY KEY (`navigation_menu_types_id`);

--
-- Indexes for table `non_academic_applications`
--
ALTER TABLE `non_academic_applications`
  ADD PRIMARY KEY (`application_id`),
  ADD KEY `non_academic_applications_user_id_foreign` (`user_id`),
  ADD KEY `non_academic_applications_membership_id_foreign` (`membership_id`),
  ADD KEY `non_academic_applications_course_id_foreign` (`course_id`),
  ADD KEY `non_academic_applications_organization_id_foreign` (`organization_id`);

--
-- Indexes for table `non_academic_members`
--
ALTER TABLE `non_academic_members`
  ADD PRIMARY KEY (`non_academic_member_id`),
  ADD KEY `non_academic_members_user_id_foreign` (`user_id`),
  ADD KEY `non_academic_members_membership_id_foreign` (`membership_id`),
  ADD KEY `non_academic_members_organization_id_foreign` (`organization_id`),
  ADD KEY `non_academic_members_course_id_foreign` (`course_id`);

--
-- Indexes for table `non_academic_membership`
--
ALTER TABLE `non_academic_membership`
  ADD PRIMARY KEY (`non_academic_membership_id`),
  ADD KEY `non_academic_membership_organization_id_foreign` (`organization_id`);

--
-- Indexes for table `officers`
--
ALTER TABLE `officers`
  ADD PRIMARY KEY (`officer_id`),
  ADD KEY `officers_position_title_id_foreign` (`position_title_id`),
  ADD KEY `officers_organization_id_foreign` (`organization_id`);

--
-- Indexes for table `officer_positions`
--
ALTER TABLE `officer_positions`
  ADD PRIMARY KEY (`officer_positions_id`),
  ADD KEY `officer_positions_position_category_foreign` (`position_category`);

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`organization_id`),
  ADD UNIQUE KEY `organizations_organization_slug_unique` (`organization_slug`),
  ADD KEY `organizations_organization_type_id_foreign` (`organization_type_id`);

--
-- Indexes for table `organization_assets`
--
ALTER TABLE `organization_assets`
  ADD PRIMARY KEY (`organization_asset_id`),
  ADD KEY `organization_assets_user_id_foreign` (`user_id`),
  ADD KEY `organization_assets_page_type_id_foreign` (`page_type_id`),
  ADD KEY `organization_assets_organization_id_foreign` (`organization_id`),
  ADD KEY `organization_assets_asset_type_id_foreign` (`asset_type_id`),
  ADD KEY `organization_assets_announcement_id_foreign` (`announcement_id`),
  ADD KEY `organization_assets_articles_id_foreign` (`articles_id`);

--
-- Indexes for table `organization_documents`
--
ALTER TABLE `organization_documents`
  ADD PRIMARY KEY (`organization_document_id`),
  ADD KEY `organization_documents_organization_document_type_id_foreign` (`organization_document_type_id`);

--
-- Indexes for table `organization_document_types`
--
ALTER TABLE `organization_document_types`
  ADD PRIMARY KEY (`organization_document_type_id`),
  ADD UNIQUE KEY `organization_document_types_slug_unique` (`slug`),
  ADD KEY `organization_document_types_organization_id_foreign` (`organization_id`);

--
-- Indexes for table `organization_types`
--
ALTER TABLE `organization_types`
  ADD PRIMARY KEY (`organization_type_id`);

--
-- Indexes for table `org_socials`
--
ALTER TABLE `org_socials`
  ADD PRIMARY KEY (`org_socials_id`),
  ADD KEY `org_socials_organization_id_foreign` (`organization_id`),
  ADD KEY `org_socials_social_id_foreign` (`social_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`pages_id`);

--
-- Indexes for table `page_types`
--
ALTER TABLE `page_types`
  ADD PRIMARY KEY (`page_types_id`);

--
-- Indexes for table `partnership_requests`
--
ALTER TABLE `partnership_requests`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `partnership_requests_event_id_foreign` (`event_id`),
  ADD KEY `partnership_requests_request_by_foreign` (`request_by`),
  ADD KEY `partnership_requests_request_to_foreign` (`request_to`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`permission_id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD KEY `permission_role_permission_id_foreign` (`permission_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`),
  ADD KEY `permission_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `position_categories`
--
ALTER TABLE `position_categories`
  ADD PRIMARY KEY (`position_category_id`);

--
-- Indexes for table `position_titles`
--
ALTER TABLE `position_titles`
  ADD PRIMARY KEY (`position_title_id`),
  ADD KEY `position_titles_organization_id_foreign` (`organization_id`),
  ADD KEY `position_titles_position_category_id_foreign` (`position_category_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD KEY `role_user_role_id_foreign` (`role_id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`),
  ADD KEY `role_user_organization_id_foreign` (`organization_id`);

--
-- Indexes for table `sa_document_types`
--
ALTER TABLE `sa_document_types`
  ADD PRIMARY KEY (`SA_document_type_id`);

--
-- Indexes for table `school_years`
--
ALTER TABLE `school_years`
  ADD PRIMARY KEY (`school_year_id`),
  ADD UNIQUE KEY `school_years_year_start_unique` (`year_start`),
  ADD UNIQUE KEY `school_years_year_end_unique` (`year_end`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`social_media_id`);

--
-- Indexes for table `sois_gates`
--
ALTER TABLE `sois_gates`
  ADD PRIMARY KEY (`sois_gates_id`),
  ADD KEY `sois_gates_user_id_foreign` (`user_id`);

--
-- Indexes for table `sois_links`
--
ALTER TABLE `sois_links`
  ADD PRIMARY KEY (`sois_links_id`);

--
-- Indexes for table `student_accomplishments`
--
ALTER TABLE `student_accomplishments`
  ADD PRIMARY KEY (`student_accomplishment_id`),
  ADD UNIQUE KEY `student_accomplishments_accomplishment_uuid_unique` (`accomplishment_uuid`),
  ADD KEY `student_accomplishments_user_id_foreign` (`user_id`),
  ADD KEY `student_accomplishments_organization_id_foreign` (`organization_id`),
  ADD KEY `student_accomplishments_level_id_foreign` (`level_id`),
  ADD KEY `student_accomplishments_fund_source_id_foreign` (`fund_source_id`),
  ADD KEY `student_accomplishments_accomplished_event_id_foreign` (`accomplished_event_id`),
  ADD KEY `student_accomplishments_event_category_id_foreign` (`event_category_id`),
  ADD KEY `student_accomplishments_reviewed_by_foreign` (`reviewed_by`);

--
-- Indexes for table `student_accomplishment_files`
--
ALTER TABLE `student_accomplishment_files`
  ADD PRIMARY KEY (`student_accomplishment_file_id`),
  ADD KEY `student_accomplishment_files_student_accomplishment_id_foreign` (`student_accomplishment_id`),
  ADD KEY `student_accomplishment_files_sa_document_type_id_foreign` (`SA_document_type_id`);

--
-- Indexes for table `tabular_columns`
--
ALTER TABLE `tabular_columns`
  ADD PRIMARY KEY (`tabular_column_id`),
  ADD KEY `tabular_columns_tabular_table_id_foreign` (`tabular_table_id`);

--
-- Indexes for table `tabular_tables`
--
ALTER TABLE `tabular_tables`
  ADD PRIMARY KEY (`tabular_table_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tags_id`),
  ADD KEY `tags_user_id_foreign` (`user_id`);

--
-- Indexes for table `temporary_files`
--
ALTER TABLE `temporary_files`
  ADD PRIMARY KEY (`temporary_file_id`);

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
-- Indexes for table `upcoming_events`
--
ALTER TABLE `upcoming_events`
  ADD PRIMARY KEY (`upcoming_event_id`),
  ADD KEY `upcoming_events_organization_id_foreign` (`organization_id`),
  ADD KEY `upcoming_events_accomplished_event_id_foreign` (`accomplished_event_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_student_number_unique` (`student_number`),
  ADD KEY `users_gender_id_foreign` (`gender_id`),
  ADD KEY `users_course_id_foreign` (`course_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_applications`
--
ALTER TABLE `academic_applications`
  MODIFY `application_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `academic_members`
--
ALTER TABLE `academic_members`
  MODIFY `academic_member_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `academic_membership`
--
ALTER TABLE `academic_membership`
  MODIFY `academic_membership_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `accomplished_events`
--
ALTER TABLE `accomplished_events`
  MODIFY `accomplished_event_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `accomplishment_reports`
--
ALTER TABLE `accomplishment_reports`
  MODIFY `accomplishment_report_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `accomplishment_report_types`
--
ALTER TABLE `accomplishment_report_types`
  MODIFY `accomplishment_report_type_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `announcements_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `articles_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `articles_tags`
--
ALTER TABLE `articles_tags`
  MODIFY `articles_tags_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `article_types`
--
ALTER TABLE `article_types`
  MODIFY `article_types_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ar_data_logs`
--
ALTER TABLE `ar_data_logs`
  MODIFY `data_log_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ar_notifications`
--
ALTER TABLE `ar_notifications`
  MODIFY `ar_notification_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `asset_types`
--
ALTER TABLE `asset_types`
  MODIFY `asset_type_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `declined_aapplications`
--
ALTER TABLE `declined_aapplications`
  MODIFY `declined_aapp_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `declined_naapplications`
--
ALTER TABLE `declined_naapplications`
  MODIFY `declined_naapp_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `default_interfaces`
--
ALTER TABLE `default_interfaces`
  MODIFY `default_interfaces_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `disapproved_events`
--
ALTER TABLE `disapproved_events`
  MODIFY `disapproved_event_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_categories`
--
ALTER TABLE `event_categories`
  MODIFY `event_category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `event_classifications`
--
ALTER TABLE `event_classifications`
  MODIFY `event_classification_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `event_documents`
--
ALTER TABLE `event_documents`
  MODIFY `event_document_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_document_types`
--
ALTER TABLE `event_document_types`
  MODIFY `event_document_type_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `event_images`
--
ALTER TABLE `event_images`
  MODIFY `event_image_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_natures`
--
ALTER TABLE `event_natures`
  MODIFY `event_nature_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `event_partnerships`
--
ALTER TABLE `event_partnerships`
  MODIFY `event_partnership_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_roles`
--
ALTER TABLE `event_roles`
  MODIFY `event_role_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `event_signatures`
--
ALTER TABLE `event_signatures`
  MODIFY `signature_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `expected_applicants`
--
ALTER TABLE `expected_applicants`
  MODIFY `expected_applicant_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fund_sources`
--
ALTER TABLE `fund_sources`
  MODIFY `fund_source_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `genders`
--
ALTER TABLE `genders`
  MODIFY `gender_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gpoa_notifications`
--
ALTER TABLE `gpoa_notifications`
  MODIFY `notification_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `interface_types`
--
ALTER TABLE `interface_types`
  MODIFY `interface_types_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `level_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `membership_messages`
--
ALTER TABLE `membership_messages`
  MODIFY `message_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `membership_replies`
--
ALTER TABLE `membership_replies`
  MODIFY `reply_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `navigation_menus`
--
ALTER TABLE `navigation_menus`
  MODIFY `navigation_menus_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `navigation_menus_navigation_types`
--
ALTER TABLE `navigation_menus_navigation_types`
  MODIFY `navigation_menus_navigation_types_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `navigation_menu_types`
--
ALTER TABLE `navigation_menu_types`
  MODIFY `navigation_menu_types_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `non_academic_applications`
--
ALTER TABLE `non_academic_applications`
  MODIFY `application_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `non_academic_members`
--
ALTER TABLE `non_academic_members`
  MODIFY `non_academic_member_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `non_academic_membership`
--
ALTER TABLE `non_academic_membership`
  MODIFY `non_academic_membership_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `officers`
--
ALTER TABLE `officers`
  MODIFY `officer_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `officer_positions`
--
ALTER TABLE `officer_positions`
  MODIFY `officer_positions_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `organization_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `organization_assets`
--
ALTER TABLE `organization_assets`
  MODIFY `organization_asset_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `organization_documents`
--
ALTER TABLE `organization_documents`
  MODIFY `organization_document_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `organization_document_types`
--
ALTER TABLE `organization_document_types`
  MODIFY `organization_document_type_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `organization_types`
--
ALTER TABLE `organization_types`
  MODIFY `organization_type_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `org_socials`
--
ALTER TABLE `org_socials`
  MODIFY `org_socials_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `pages_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `page_types`
--
ALTER TABLE `page_types`
  MODIFY `page_types_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `partnership_requests`
--
ALTER TABLE `partnership_requests`
  MODIFY `request_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `permission_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `position_categories`
--
ALTER TABLE `position_categories`
  MODIFY `position_category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `position_titles`
--
ALTER TABLE `position_titles`
  MODIFY `position_title_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sa_document_types`
--
ALTER TABLE `sa_document_types`
  MODIFY `SA_document_type_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `school_years`
--
ALTER TABLE `school_years`
  MODIFY `school_year_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `social_media_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sois_gates`
--
ALTER TABLE `sois_gates`
  MODIFY `sois_gates_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sois_links`
--
ALTER TABLE `sois_links`
  MODIFY `sois_links_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_accomplishments`
--
ALTER TABLE `student_accomplishments`
  MODIFY `student_accomplishment_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_accomplishment_files`
--
ALTER TABLE `student_accomplishment_files`
  MODIFY `student_accomplishment_file_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tabular_columns`
--
ALTER TABLE `tabular_columns`
  MODIFY `tabular_column_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tabular_tables`
--
ALTER TABLE `tabular_tables`
  MODIFY `tabular_table_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tags_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `temporary_files`
--
ALTER TABLE `temporary_files`
  MODIFY `temporary_file_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `upcoming_events`
--
ALTER TABLE `upcoming_events`
  MODIFY `upcoming_event_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `academic_applications`
--
ALTER TABLE `academic_applications`
  ADD CONSTRAINT `academic_applications_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`),
  ADD CONSTRAINT `academic_applications_membership_id_foreign` FOREIGN KEY (`membership_id`) REFERENCES `academic_membership` (`academic_membership_id`),
  ADD CONSTRAINT `academic_applications_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`organization_id`),
  ADD CONSTRAINT `academic_applications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `academic_members`
--
ALTER TABLE `academic_members`
  ADD CONSTRAINT `academic_members_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`),
  ADD CONSTRAINT `academic_members_membership_id_foreign` FOREIGN KEY (`membership_id`) REFERENCES `academic_membership` (`academic_membership_id`),
  ADD CONSTRAINT `academic_members_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`organization_id`),
  ADD CONSTRAINT `academic_members_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `academic_membership`
--
ALTER TABLE `academic_membership`
  ADD CONSTRAINT `academic_membership_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`organization_id`) ON DELETE CASCADE;

--
-- Constraints for table `accomplished_events`
--
ALTER TABLE `accomplished_events`
  ADD CONSTRAINT `accomplished_events_event_category_id_foreign` FOREIGN KEY (`event_category_id`) REFERENCES `event_categories` (`event_category_id`),
  ADD CONSTRAINT `accomplished_events_event_classification_id_foreign` FOREIGN KEY (`event_classification_id`) REFERENCES `event_classifications` (`event_classification_id`),
  ADD CONSTRAINT `accomplished_events_event_nature_id_foreign` FOREIGN KEY (`event_nature_id`) REFERENCES `event_natures` (`event_nature_id`),
  ADD CONSTRAINT `accomplished_events_event_role_id_foreign` FOREIGN KEY (`event_role_id`) REFERENCES `event_roles` (`event_role_id`),
  ADD CONSTRAINT `accomplished_events_fund_source_id_foreign` FOREIGN KEY (`fund_source_id`) REFERENCES `fund_sources` (`fund_source_id`),
  ADD CONSTRAINT `accomplished_events_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`level_id`),
  ADD CONSTRAINT `accomplished_events_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`organization_id`);

--
-- Constraints for table `accomplishment_reports`
--
ALTER TABLE `accomplishment_reports`
  ADD CONSTRAINT `accomplishment_reports_accomplishment_report_type_id_foreign` FOREIGN KEY (`accomplishment_report_type_id`) REFERENCES `accomplishment_report_types` (`accomplishment_report_type_id`),
  ADD CONSTRAINT `accomplishment_reports_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `accomplishment_reports_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`organization_id`),
  ADD CONSTRAINT `accomplishment_reports_reviewed_by_foreign` FOREIGN KEY (`reviewed_by`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `announcements`
--
ALTER TABLE `announcements`
  ADD CONSTRAINT `announcements_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`organization_id`),
  ADD CONSTRAINT `announcements_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_article_type_id_foreign` FOREIGN KEY (`article_type_id`) REFERENCES `article_types` (`article_types_id`),
  ADD CONSTRAINT `articles_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`organization_id`),
  ADD CONSTRAINT `articles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `articles_tags`
--
ALTER TABLE `articles_tags`
  ADD CONSTRAINT `articles_tags_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`articles_id`),
  ADD CONSTRAINT `articles_tags_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`tags_id`);

--
-- Constraints for table `ar_data_logs`
--
ALTER TABLE `ar_data_logs`
  ADD CONSTRAINT `ar_data_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `ar_notifications`
--
ALTER TABLE `ar_notifications`
  ADD CONSTRAINT `ar_notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`organization_id`);

--
-- Constraints for table `declined_aapplications`
--
ALTER TABLE `declined_aapplications`
  ADD CONSTRAINT `declined_aapplications_application_id_foreign` FOREIGN KEY (`application_id`) REFERENCES `academic_applications` (`application_id`);

--
-- Constraints for table `declined_naapplications`
--
ALTER TABLE `declined_naapplications`
  ADD CONSTRAINT `declined_naapplications_application_id_foreign` FOREIGN KEY (`application_id`) REFERENCES `non_academic_applications` (`application_id`);

--
-- Constraints for table `default_interfaces`
--
ALTER TABLE `default_interfaces`
  ADD CONSTRAINT `default_interfaces_interface_type_id_foreign` FOREIGN KEY (`interface_type_id`) REFERENCES `interface_types` (`interface_types_id`);

--
-- Constraints for table `disapproved_events`
--
ALTER TABLE `disapproved_events`
  ADD CONSTRAINT `disapproved_events_disapproved_by_foreign` FOREIGN KEY (`disapproved_by`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `disapproved_events_upcoming_event_id_foreign` FOREIGN KEY (`upcoming_event_id`) REFERENCES `upcoming_events` (`upcoming_event_id`);

--
-- Constraints for table `event_documents`
--
ALTER TABLE `event_documents`
  ADD CONSTRAINT `event_documents_accomplished_event_id_foreign` FOREIGN KEY (`accomplished_event_id`) REFERENCES `accomplished_events` (`accomplished_event_id`),
  ADD CONSTRAINT `event_documents_event_document_type_id_foreign` FOREIGN KEY (`event_document_type_id`) REFERENCES `event_document_types` (`event_document_type_id`);

--
-- Constraints for table `event_images`
--
ALTER TABLE `event_images`
  ADD CONSTRAINT `event_images_accomplished_event_id_foreign` FOREIGN KEY (`accomplished_event_id`) REFERENCES `accomplished_events` (`accomplished_event_id`);

--
-- Constraints for table `event_partnerships`
--
ALTER TABLE `event_partnerships`
  ADD CONSTRAINT `event_partnerships_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `upcoming_events` (`upcoming_event_id`),
  ADD CONSTRAINT `event_partnerships_partnership_to_foreign` FOREIGN KEY (`partnership_to`) REFERENCES `organizations` (`organization_id`);

--
-- Constraints for table `event_signatures`
--
ALTER TABLE `event_signatures`
  ADD CONSTRAINT `event_signatures_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`organization_id`),
  ADD CONSTRAINT `event_signatures_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`),
  ADD CONSTRAINT `event_signatures_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `expected_applicants`
--
ALTER TABLE `expected_applicants`
  ADD CONSTRAINT `expected_applicants_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`organization_id`);

--
-- Constraints for table `gpoa_notifications`
--
ALTER TABLE `gpoa_notifications`
  ADD CONSTRAINT `gpoa_notifications_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `upcoming_events` (`upcoming_event_id`),
  ADD CONSTRAINT `gpoa_notifications_from_foreign` FOREIGN KEY (`from`) REFERENCES `organizations` (`organization_id`),
  ADD CONSTRAINT `gpoa_notifications_to_foreign` FOREIGN KEY (`to`) REFERENCES `organizations` (`organization_id`);

--
-- Constraints for table `membership_messages`
--
ALTER TABLE `membership_messages`
  ADD CONSTRAINT `membership_messages_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`organization_id`),
  ADD CONSTRAINT `membership_messages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `membership_replies`
--
ALTER TABLE `membership_replies`
  ADD CONSTRAINT `membership_replies_message_id_foreign` FOREIGN KEY (`message_id`) REFERENCES `membership_messages` (`message_id`),
  ADD CONSTRAINT `membership_replies_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`organization_id`),
  ADD CONSTRAINT `membership_replies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `navigation_menus_navigation_types`
--
ALTER TABLE `navigation_menus_navigation_types`
  ADD CONSTRAINT `navigation_menus_navigation_types_navigation_menu_id_foreign` FOREIGN KEY (`navigation_menu_id`) REFERENCES `navigation_menus` (`navigation_menus_id`),
  ADD CONSTRAINT `navigation_menus_navigation_types_navigation_type_id_foreign` FOREIGN KEY (`navigation_type_id`) REFERENCES `navigation_menu_types` (`navigation_menu_types_id`);

--
-- Constraints for table `non_academic_applications`
--
ALTER TABLE `non_academic_applications`
  ADD CONSTRAINT `non_academic_applications_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`),
  ADD CONSTRAINT `non_academic_applications_membership_id_foreign` FOREIGN KEY (`membership_id`) REFERENCES `non_academic_membership` (`non_academic_membership_id`),
  ADD CONSTRAINT `non_academic_applications_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`organization_id`),
  ADD CONSTRAINT `non_academic_applications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `non_academic_members`
--
ALTER TABLE `non_academic_members`
  ADD CONSTRAINT `non_academic_members_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`),
  ADD CONSTRAINT `non_academic_members_membership_id_foreign` FOREIGN KEY (`membership_id`) REFERENCES `non_academic_membership` (`non_academic_membership_id`),
  ADD CONSTRAINT `non_academic_members_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`organization_id`),
  ADD CONSTRAINT `non_academic_members_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `non_academic_membership`
--
ALTER TABLE `non_academic_membership`
  ADD CONSTRAINT `non_academic_membership_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`organization_id`) ON DELETE CASCADE;

--
-- Constraints for table `officers`
--
ALTER TABLE `officers`
  ADD CONSTRAINT `officers_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`organization_id`),
  ADD CONSTRAINT `officers_position_title_id_foreign` FOREIGN KEY (`position_title_id`) REFERENCES `position_titles` (`position_title_id`);

--
-- Constraints for table `officer_positions`
--
ALTER TABLE `officer_positions`
  ADD CONSTRAINT `officer_positions_position_category_foreign` FOREIGN KEY (`position_category`) REFERENCES `officer_positions` (`officer_positions_id`);

--
-- Constraints for table `organizations`
--
ALTER TABLE `organizations`
  ADD CONSTRAINT `organizations_organization_type_id_foreign` FOREIGN KEY (`organization_type_id`) REFERENCES `organization_types` (`organization_type_id`);

--
-- Constraints for table `organization_assets`
--
ALTER TABLE `organization_assets`
  ADD CONSTRAINT `organization_assets_announcement_id_foreign` FOREIGN KEY (`announcement_id`) REFERENCES `announcements` (`announcements_id`),
  ADD CONSTRAINT `organization_assets_articles_id_foreign` FOREIGN KEY (`articles_id`) REFERENCES `articles` (`articles_id`),
  ADD CONSTRAINT `organization_assets_asset_type_id_foreign` FOREIGN KEY (`asset_type_id`) REFERENCES `asset_types` (`asset_type_id`),
  ADD CONSTRAINT `organization_assets_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`organization_id`),
  ADD CONSTRAINT `organization_assets_page_type_id_foreign` FOREIGN KEY (`page_type_id`) REFERENCES `page_types` (`page_types_id`),
  ADD CONSTRAINT `organization_assets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `organization_documents`
--
ALTER TABLE `organization_documents`
  ADD CONSTRAINT `organization_documents_organization_document_type_id_foreign` FOREIGN KEY (`organization_document_type_id`) REFERENCES `organization_document_types` (`organization_document_type_id`);

--
-- Constraints for table `organization_document_types`
--
ALTER TABLE `organization_document_types`
  ADD CONSTRAINT `organization_document_types_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`organization_id`);

--
-- Constraints for table `org_socials`
--
ALTER TABLE `org_socials`
  ADD CONSTRAINT `org_socials_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`organization_id`),
  ADD CONSTRAINT `org_socials_social_id_foreign` FOREIGN KEY (`social_id`) REFERENCES `social_media` (`social_media_id`);

--
-- Constraints for table `partnership_requests`
--
ALTER TABLE `partnership_requests`
  ADD CONSTRAINT `partnership_requests_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `upcoming_events` (`upcoming_event_id`),
  ADD CONSTRAINT `partnership_requests_request_by_foreign` FOREIGN KEY (`request_by`) REFERENCES `organizations` (`organization_id`),
  ADD CONSTRAINT `partnership_requests_request_to_foreign` FOREIGN KEY (`request_to`) REFERENCES `organizations` (`organization_id`);

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`permission_id`),
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`permission_id`),
  ADD CONSTRAINT `permission_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `position_titles`
--
ALTER TABLE `position_titles`
  ADD CONSTRAINT `position_titles_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`organization_id`),
  ADD CONSTRAINT `position_titles_position_category_id_foreign` FOREIGN KEY (`position_category_id`) REFERENCES `position_categories` (`position_category_id`);

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`organization_id`),
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`),
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `sois_gates`
--
ALTER TABLE `sois_gates`
  ADD CONSTRAINT `sois_gates_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `student_accomplishments`
--
ALTER TABLE `student_accomplishments`
  ADD CONSTRAINT `student_accomplishments_accomplished_event_id_foreign` FOREIGN KEY (`accomplished_event_id`) REFERENCES `accomplished_events` (`accomplished_event_id`),
  ADD CONSTRAINT `student_accomplishments_event_category_id_foreign` FOREIGN KEY (`event_category_id`) REFERENCES `event_categories` (`event_category_id`),
  ADD CONSTRAINT `student_accomplishments_fund_source_id_foreign` FOREIGN KEY (`fund_source_id`) REFERENCES `fund_sources` (`fund_source_id`),
  ADD CONSTRAINT `student_accomplishments_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`level_id`),
  ADD CONSTRAINT `student_accomplishments_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`organization_id`),
  ADD CONSTRAINT `student_accomplishments_reviewed_by_foreign` FOREIGN KEY (`reviewed_by`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `student_accomplishments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `student_accomplishment_files`
--
ALTER TABLE `student_accomplishment_files`
  ADD CONSTRAINT `student_accomplishment_files_sa_document_type_id_foreign` FOREIGN KEY (`SA_document_type_id`) REFERENCES `sa_document_types` (`SA_document_type_id`),
  ADD CONSTRAINT `student_accomplishment_files_student_accomplishment_id_foreign` FOREIGN KEY (`student_accomplishment_id`) REFERENCES `student_accomplishments` (`student_accomplishment_id`) ON DELETE CASCADE;

--
-- Constraints for table `tabular_columns`
--
ALTER TABLE `tabular_columns`
  ADD CONSTRAINT `tabular_columns_tabular_table_id_foreign` FOREIGN KEY (`tabular_table_id`) REFERENCES `tabular_tables` (`tabular_table_id`);

--
-- Constraints for table `tags`
--
ALTER TABLE `tags`
  ADD CONSTRAINT `tags_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `upcoming_events`
--
ALTER TABLE `upcoming_events`
  ADD CONSTRAINT `upcoming_events_accomplished_event_id_foreign` FOREIGN KEY (`accomplished_event_id`) REFERENCES `accomplished_events` (`accomplished_event_id`),
  ADD CONSTRAINT `upcoming_events_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`organization_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`),
  ADD CONSTRAINT `users_gender_id_foreign` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`gender_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
