-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2023 at 10:14 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `get_married`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_title` varchar(255) NOT NULL DEFAULT 'About Us',
  `image` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `statistics_section_title` varchar(255) NOT NULL DEFAULT 'Institutional Statistics',
  `total_students` double NOT NULL DEFAULT 0,
  `total_teachers` double NOT NULL DEFAULT 0,
  `total_employees` double NOT NULL DEFAULT 0,
  `total_rooms` double NOT NULL DEFAULT 0,
  `total_buildings` double NOT NULL DEFAULT 0,
  `total_students_label` varchar(255) DEFAULT NULL,
  `total_teachers_label` varchar(255) DEFAULT NULL,
  `total_employees_label` varchar(255) DEFAULT NULL,
  `total_rooms_label` varchar(255) DEFAULT NULL,
  `total_buildings_label` varchar(255) DEFAULT NULL,
  `mission_title` varchar(255) NOT NULL DEFAULT 'Mission',
  `mission_image` varchar(255) DEFAULT NULL,
  `mission_description` longtext DEFAULT NULL,
  `vision_title` varchar(255) NOT NULL DEFAULT 'Vision',
  `vision_image` varchar(255) DEFAULT NULL,
  `vision_description` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `page_title`, `image`, `title`, `description`, `statistics_section_title`, `total_students`, `total_teachers`, `total_employees`, `total_rooms`, `total_buildings`, `total_students_label`, `total_teachers_label`, `total_employees_label`, `total_rooms_label`, `total_buildings_label`, `mission_title`, `mission_image`, `mission_description`, `vision_title`, `vision_image`, `vision_description`, `created_at`, `updated_at`) VALUES
(1, 'প্রতিষ্ঠান পরিচিতি 1', '/storage/files/1/AboutUs/about-img-2.png', 'প্রতিষ্ঠান সম্পর্কে 2', '<p>এক্সওয়াইজেধ স্কুল এবং কলেজ এর অতীত গৌরবোজ্জ্বল বর্তমান প্রশংসনীয়। ২০২৩ ইংরেজীর ২০ শে জানুয়ারী এক্সওয়াইজেধ স্কুল এবং কলেজ এর স্থানীয় ম্যাজিষ্ট্রেট অফিসের তৎকালীন প্রধান কারণিক মি: এক্সওয়াইজেধ কর্তৃক প্রতিষ্ঠিত। তখন এটা এক্সওয়াইজেধ গভর্ণমেন্ট স্কুল নামে পরিচিত ছিল। ৯ জন বাংলাদেশী, ১ জন হিন্দু ও ৮ জন মুসলমান বিদ্যোৎসাহী ব্যক্তির একটি কমিটির উপর এর পরিচালনার দায়িত্ব ন্যাস্ত ছিল। এদেশের অধিবাসীদের বাংলায় শিক্ষায় শিক্ষিত করার জন্য এ বিদ্যালয় চালু করা হয়। ২০২৩ ইংরেজির ১ ই মে মি: এক্সওয়াইজেধ বিদ্যালয়ের প্রধান শিক্ষক নিযুক্ত হন।</p>\r\n\r\n<p>এক্সওয়াইজেধ স্কুল এবং কলেজ তার উচ্চমানের শিক্ষা, দক্ষ শিক্ষক এবং আধুনিক সুযোগ-সুবিধার জন্য পরিচিত। স্কুলটিতে একটি শক্তিশালী পাঠ্যক্রম রয়েছে যা শিক্ষার্থীদেরকে তাদের সম্পূর্ণ সম্ভাবনায় পৌঁছাতে সাহায্য করে। কলেজটিতে একটি বিস্তৃত কোর্স অফার রয়েছে যা শিক্ষার্থীদেরকে তাদের ভবিষ্যতের ক্যারিয়ারের জন্য প্রস্তুত করে। এক্সওয়াইজেধ স্কুল এবং কলেজ বাংলাদেশের একটি অন্যতম সেরা শিক্ষা প্রতিষ্ঠান। এটি শিক্ষার্থীদেরকে একটি উচ্চমানের শিক্ষা প্রদান করে যা তাদেরকে তাদের সম্পূর্ণ সম্ভাবনায় পৌঁছাতে সাহায্য করে। 123</p>', 'প্রতিষ্ঠানের পরিসংখান 5', 520, 20, 4, 15, 2, 'সর্বোমোট শিক্ষার্থী', 'শিক্ষক/শিক্ষিকা', 'অফিশ কর্মচারী', 'সর্বোমোট কক্ষ', 'বিদ্যালয় ভবন', 'প্রতিষ্ঠানের মিশন 3', '/storage/files/1/AboutUs/about-mission-img.png', '<p>এক্সওয়াইজেধ স্কুল এবং কলেজের মিশন হল শিক্ষার্থীদেরকে একটি উচ্চমানের শিক্ষা প্রদান করা যা তাদেরকে তাদের সম্পূর্ণ সম্ভাবনায় পৌঁছাতে সাহায্য করে। স্কুলটি বিশ্বাস করে যে প্রতিটি শিক্ষার্থীরই সম্ভাবনা রয়েছে এবং তাদেরকে সেই সম্ভাবনাকে অর্জনের জন্য প্রস্তুত করতে চায়।</p>\r\n\r\n<p><strong>স্কুলের মিশনকে বাস্তবায়নের জন্য, স্কুলটি নিম্নলিখিত মূল্যবোধগুলিকে অনুসরণ করে:</strong></p>\r\n\r\n<ul>\r\n	<li>উচ্চমানের শিক্ষা: স্কুলটি একটি শক্তিশালী পাঠ্যক্রম প্রদান করে যা শিক্ষার্থীদেরকে তাদের সম্পূর্ণ সম্ভাবনায় পৌঁছাতে সাহায্য করে। স্কুলটিতে একটি দক্ষ শিক্ষক মন্ডলী রয়েছে যারা শিক্ষার্থীদেরকে তাদের শেখার ক্ষেত্রে সর্বোত্তম সাপোর্ট প্রদান করে।</li>\r\n	<li>ব্যক্তিত্ব বিকাশ: স্কুলটি শিক্ষার্থীদেরকে তাদের ব্যক্তিত্ব বিকাশে সহায়তা করে। স্কুলটি বিভিন্ন সহ-পাঠ্যক্রমিক কার্যক্রমের ব্যবস্থা করে যা শিক্ষার্থীদেরকে তাদের দক্ষতা এবং আগ্রহ বিকাশে সাহায্য করে।</li>\r\n	<li>সামাজিক দায়বদ্ধতা: স্কুলটি শিক্ষার্থীদেরকে সামাজিক দায়বদ্ধতা সম্পর্কে সচেতন করে। স্কুলটি বিভিন্ন সামাজিক কার্যক্রমের আয়োজন করে যা শিক্ষার্থীদেরকে সমাজের জন্য কিছু করার জন্য অনুপ্রাণিত করে। এক্সওয়াইজেধ স্কুল এবং কলেজ বিশ্বাস করে যে এই মূল্যবোধগুলি শিক্ষার্থীদেরকে তাদের সম্পূর্ণ সম্ভাবনায় পৌঁছাতে সাহায্য করবে।</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>এক্সওয়াইজেধ স্কুল এবং কলেজ বিশ্বাস করে যে এই মূল্যবোধগুলি শিক্ষার্থীদেরকে তাদের সম্পূর্ণ সম্ভাবনায় পৌঁছাতে সাহায্য করবে।</p>', 'প্রতিষ্ঠানের ভিশন 7', '/storage/files/1/AboutUs/about-mission-img.png', '<p>এক্সওয়াইজেধ স্কুল এবং কলেজের ভিশন হল একটি বিশ্বমানের শিক্ষা প্রতিষ্ঠান হিসাবে গড়ে তোলা যা শিক্ষার্থীদেরকে তাদের সম্পূর্ণ সম্ভাবনায় পৌঁছাতে সাহায্য করে। স্কুলটি বিশ্বাস করে যে শিক্ষার মাধ্যমে শিক্ষার্থীরা একটি উন্নত ভবিষ্যৎ গড়ে তুলতে পারে এবং একটি উন্নত সমাজ গড়তে অবদান রাখতে পারে।</p>\r\n\r\n<p><strong>স্কুলের ভিশনকে বাস্তবায়নের জন্য, স্কুলটি নিম্নলিখিত লক্ষ্যগুলি অর্জনে প্রতিশ্রুতিবদ্ধ:</strong></p>\r\n\r\n<ul>\r\n	<li>উচ্চমানের শিক্ষা প্রদান: স্কুলটি একটি শক্তিশালী পাঠ্যক্রম এবং দক্ষ শিক্ষক মন্ডলীর মাধ্যমে শিক্ষার্থীদেরকে উচ্চমানের শিক্ষা প্রদান করতে চায়।</li>\r\n	<li>ব্যক্তিত্ব বিকাশ: স্কুলটি শিক্ষার্থীদেরকে তাদের ব্যক্তিত্ব বিকাশে সহায়তা করতে চায়। স্কুলটি বিভিন্ন সহ-পাঠ্যক্রমিক কার্যক্রমের ব্যবস্থা করে যা শিক্ষার্থীদেরকে তাদের দক্ষতা এবং আগ্রহ বিকাশে সাহায্য করে।</li>\r\n	<li>সামাজিক দায়বদ্ধতা: স্কুলটি শিক্ষার্থীদেরকে সামাজিক দায়বদ্ধতা সম্পর্কে সচেতন করতে চায়। স্কুলটি বিভিন্ন সামাজিক কার্যক্রমের আয়োজন করে যা শিক্ষার্থীদেরকে সমাজের জন্য কিছু করার জন্য অনুপ্রাণিত করে।</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>এক্সওয়াইজেধ স্কুল এবং কলেজের ভিশন হল একটি উচ্চাভিলাষী লক্ষ্য, তবে এটি একটি লক্ষ্য যা স্কুলটি অর্জনে প্রতিশ্রুতিবদ্ধ। স্কুলটি বিশ্বাস করে যে শিক্ষার মাধ্যমে শিক্ষার্থীরা একটি উন্নত ভবিষ্যৎ গড়ে তুলতে পারে এবং একটি উন্নত সমাজ গড়তে অবদান রাখতে পারে।</p>', '2023-10-08 08:13:56', '2023-10-25 10:08:36');

-- --------------------------------------------------------

--
-- Table structure for table `contact_configs`
--

CREATE TABLE `contact_configs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_title` varchar(255) DEFAULT NULL,
  `map_iframe_src` longtext DEFAULT NULL,
  `map_direction_button_text` varchar(255) DEFAULT NULL,
  `map_direction` varchar(255) DEFAULT NULL,
  `contact_section_title` varchar(255) DEFAULT NULL,
  `address_label` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact_label` varchar(255) DEFAULT NULL,
  `primary_contact` varchar(255) DEFAULT NULL,
  `secondary_contact` varchar(255) DEFAULT NULL,
  `email_label` varchar(255) DEFAULT NULL,
  `primary_email` varchar(255) DEFAULT NULL,
  `secondary_email` varchar(255) DEFAULT NULL,
  `contact_form_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_configs`
--

INSERT INTO `contact_configs` (`id`, `page_title`, `map_iframe_src`, `map_direction_button_text`, `map_direction`, `contact_section_title`, `address_label`, `address`, `contact_label`, `primary_contact`, `secondary_contact`, `email_label`, `primary_email`, `secondary_email`, `contact_form_image`, `created_at`, `updated_at`) VALUES
(1, 'দ্রুত যোগাযোগ 1', 'https://maps.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.0104336321297!2d90.41270911479724!3d23.782642793461232!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b165a1921a09%3A0xb58f02520cb0cb41!2sSoftifyBD%20Ltd.!5e0!3m2!1sen!2sbd!4v1669619081345!5m2!1sen!2sbd', 'দিকনির্দেশ পান', 'https://maps.app.goo.gl/yvoniqhrU7vBL6pZ8', 'যোগাযোগের মাধ্যমসমূহ', 'স্কুল এবং কলেজের ঠিকানা', 'XYZ School & College, Main Road, Khilgaon, Dhaka', 'মোবাইল/টেলিফোন নাম্বার', '+8801000000000', '+8801000000002', 'ইমেইল ঠিকানা', 'sample@gmail.com', 'sample2@gmail.com', '/storage/files/1/AboutUs/about-img-2.png', '2023-10-19 08:08:44', '2023-11-01 03:28:45');

-- --------------------------------------------------------

--
-- Table structure for table `contact_requests`
--

CREATE TABLE `contact_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `subject` longtext DEFAULT NULL,
  `message` longtext DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=>Pending; 1=>Approved; 2=>Cancel',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_requests`
--

INSERT INTO `contact_requests` (`id`, `name`, `email`, `phone`, `subject`, `message`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Quincy Golden', 'togukafuki@mailinator.com', '+1 (618) 759-5091', 'Adipisci sed nesciun', 'Minima accusamus off', '1698833106ywvZq', 0, '2023-11-01 10:05:06', NULL),
(4, 'Hakeem Owens', 'coru@mailinator.com', '+1 (617) 816-8964', 'Anim impedit veniam', 'Obcaecati sunt duis', '1698833313N3owD', 0, '2023-11-01 10:08:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `custom_css_js`
--

CREATE TABLE `custom_css_js` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `custom_css` longtext DEFAULT NULL,
  `custom_js` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `custom_css_js`
--

INSERT INTO `custom_css_js` (`id`, `custom_css`, `custom_js`, `created_at`, `updated_at`) VALUES
(1, NULL, 'console.log(\"Working\");', NULL, '2023-10-25 08:13:21');

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
-- Table structure for table `google_recaptchas`
--

CREATE TABLE `google_recaptchas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `recaptcha_key` varchar(255) DEFAULT NULL,
  `recaptcha_secret` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=>Active; 0=>Not Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `google_recaptchas`
--

INSERT INTO `google_recaptchas` (`id`, `recaptcha_key`, `recaptcha_secret`, `status`, `created_at`, `updated_at`) VALUES
(1, '6LcAaecoAAAAAGCr2ixy1wg4TMRNuMb_Sk3oxkHP', '6LcAaecoAAAAAC1icwC8YCH1yUoPBKwZqdSmgNcT', 1, NULL, '2023-11-01 10:08:41');

-- --------------------------------------------------------

--
-- Table structure for table `logo_favicons`
--

CREATE TABLE `logo_favicons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `tab_title` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logo_favicons`
--

INSERT INTO `logo_favicons` (`id`, `logo`, `favicon`, `tab_title`, `created_at`, `updated_at`) VALUES
(1, '/storage/files/1/logo.svg', '/storage/files/1/logo.svg', 'XYZ School', '2023-10-08 03:35:45', '2023-10-25 07:45:43');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_07_17_212431_create_permission_routes_table', 1),
(7, '2023_07_17_222638_create_user_roles_table', 1),
(8, '2023_07_18_010659_create_role_permissions_table', 1),
(9, '2023_07_18_014657_create_user_role_permissions_table', 1),
(11, '2023_07_27_081453_create_general_configs_table', 2),
(12, '2023_07_27_050411_create_contact_requests_table', 3),
(21, '2023_10_01_103552_create_school_classes_table', 4),
(22, '2023_10_02_061423_create_sections_table', 5),
(23, '2023_10_02_072224_create_shifts_table', 6),
(24, '2023_10_02_072454_create_subject_groups_table', 7),
(25, '2023_10_02_104032_create_school_exams_table', 8),
(26, '2023_10_02_111547_create_public_exams_table', 9),
(30, '2023_10_03_050350_create_religions_table', 10),
(31, '2023_10_03_051820_create_genders_table', 11),
(32, '2023_10_05_050440_create_wesbite_theme_colors_table', 12),
(33, '2023_10_05_092151_create_social_media_links_table', 13),
(34, '2023_10_08_030613_create_logo_favicons_table', 14),
(35, '2023_10_08_034026_create_custom_css_js_table', 15),
(36, '2023_10_08_040137_create_seos_table', 16),
(37, '2023_10_08_055716_create_sliders_table', 17),
(38, '2023_10_08_075141_create_about_us_table', 18),
(39, '2023_10_08_094824_create_school_infos_table', 19),
(40, '2023_10_09_034323_create_principal_message_configs_table', 20),
(41, '2023_10_09_042308_create_personnels_table', 21),
(43, '2023_10_09_053715_create_personnel_speeches_table', 22),
(47, '2023_10_09_084329_create_external_links_table', 25),
(48, '2023_10_09_114407_create_public_exam_results_table', 26),
(52, '2023_10_10_065830_create_public_exam_result_configs_table', 29),
(53, '2023_10_10_072105_create_school_exam_results_table', 30),
(54, '2023_10_10_074833_create_school_exam_result_configs_table', 31),
(65, '2023_10_19_115129_create_contact_configs_table', 42),
(67, '2023_11_01_151126_create_google_recaptchas_table', 43);

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
-- Table structure for table `permission_routes`
--

CREATE TABLE `permission_routes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `route` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `method` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_routes`
--

INSERT INTO `permission_routes` (`id`, `route`, `name`, `method`, `created_at`, `updated_at`) VALUES
(1, 'filemanager', 'unisharp.lfm.show', 'GET', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(2, 'filemanager/errors', 'unisharp.lfm.getErrors', 'GET', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(3, 'filemanager/upload', 'unisharp.lfm.upload', 'GET', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(4, 'filemanager/jsonitems', 'unisharp.lfm.getItems', 'GET', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(5, 'filemanager/move', 'unisharp.lfm.move', 'GET', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(6, 'filemanager/domove', 'unisharp.lfm.domove', 'GET', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(7, 'filemanager/newfolder', 'unisharp.lfm.getAddfolder', 'GET', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(8, 'filemanager/folders', 'unisharp.lfm.getFolders', 'GET', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(9, 'filemanager/crop', 'unisharp.lfm.getCrop', 'GET', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(10, 'filemanager/cropimage', 'unisharp.lfm.getCropimage', 'GET', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(11, 'filemanager/cropnewimage', 'unisharp.lfm.getCropnewimage', 'GET', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(12, 'filemanager/rename', 'unisharp.lfm.getRename', 'GET', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(13, 'filemanager/resize', 'unisharp.lfm.getResize', 'GET', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(14, 'filemanager/doresize', 'unisharp.lfm.performResize', 'GET', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(15, 'filemanager/download', 'unisharp.lfm.getDownload', 'GET', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(16, 'filemanager/delete', 'unisharp.lfm.getDelete', 'GET', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(17, 'filemanager/demo', 'unisharp.lfm.', 'GET', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(18, 'login', NULL, 'POST', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(19, 'logout', 'logout', 'POST', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(20, 'password/confirm', NULL, 'POST', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(21, 'home', 'home', 'GET', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(22, 'change/password/page', 'ChangePasswordPage', 'GET', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(23, 'change/password', 'ChangePassword', 'POST', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(24, 'contact/requests', 'ContactRequests', 'GET', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(25, 'approve/contact/request/{slug}', 'ApproveContactRequest', 'GET', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(26, 'deny/contact/request/{slug}', 'DenyContactRequest', 'GET', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(27, 'delete/contact/request/{slug}', 'DeleteRequest', 'GET', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(28, 'website/theme/page', 'WebsiteThemePage', 'GET', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(29, 'update/website/theme/color', 'UpdateWebsiteThemeColor', 'POST', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(30, 'social/media/page', 'SocialMediaPage', 'GET', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(31, 'update/social/media/link', 'UpdateSocialMediaLinks', 'POST', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(32, 'logo/favicon', 'LogoFaviconPage', 'GET', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(33, 'update/logo/favicon', 'UpdateLogoFavicon', 'POST', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(34, 'custom/css/js', 'CustomCssJsPage', 'GET', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(35, 'update/custom/css/js', 'UpdateCustomCssJs', 'POST', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(36, 'add/new/slider', 'AddNewSlider', 'GET', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(37, 'save/new/slider', 'SaveNewSlider', 'POST', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(38, 'view/all/sliders', 'ViewAllSliders', 'GET', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(39, 'delete/slider/{slug}', 'DeleteSlider', 'GET', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(40, 'rearrange/sliders', 'rearrangeSliders', 'GET', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(41, 'save/rearranged/sliders', 'SaveRearrangedSliders', 'POST', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(42, 'edit/slider/{slug}', 'EditSlider', 'GET', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(43, 'update/slider', 'UpdateSlider', 'POST', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(44, 'about/us/page', 'AboutUsPage', 'GET', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(45, 'update/about/us', 'UpdateAboutUsPage', 'POST', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(46, 'school/info/page', 'SchoolInfoPage', 'GET', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(47, 'update/school/info', 'UpdateSchoolInfo', 'POST', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(48, 'personnel/message/page/title', 'pageTitle', 'GET', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(49, 'update/message/page/title', 'UpdatePageTitle', 'POST', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(50, 'add/new/personnel', 'AddNewPersonnel', 'GET', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(51, 'save/personnel', 'SavePersonnel', 'POST', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(52, 'view/all/personnels', 'ViewAllPersonnels', 'GET', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(53, 'delete/personnel/{slug}', 'DeletePersonnel', 'GET', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(54, 'edit/personnel/{slug}', 'EditPersonnel', 'GET', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(55, 'update/personnel', 'UpdatePersonnel', 'POST', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(56, 'rearrange/personnels', 'RearrangePersonnel', 'GET', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(57, 'save/rearranged/personnels', 'saveRearrangedPersonnels', 'POST', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(58, 'add/personnel/speech', 'AddPersonnelSpeech', 'GET', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(59, 'save/personnel/speech', 'savePersonnelSpeech', 'POST', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(60, 'view/personnel/speech', 'viewPersonnelSpeech', 'GET', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(61, 'delete/personnel/speech/{slug}', 'DeletePersonnelSpeech', 'GET', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(62, 'edit/personnel/speech/{slug}', 'EditPersonnelSpeech', 'GET', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(63, 'update/personnel/speech', 'UpdatePersonnelSpeech', 'POST', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(64, 'view/notice/types', 'ViewNoticeTypes', 'GET', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(65, 'save/notice/type', 'AddNoticeType', 'POST', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(66, 'delete/notice/type/{slug}', 'DeleteNoticeType', 'GET', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(67, 'get/notice/type/{slug}', 'GetNoticeType', 'GET', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(68, 'update/notice/type', 'UpdateNoticeType', 'POST', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(69, 'rearrange/notice/types', 'RearrangeNoticeType', 'GET', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(70, 'save/rearranged/notice/types', 'SaveRearrangedNoticeType', 'POST', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(71, 'add/new/notice', 'AddNewNotice', 'GET', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(72, 'save/notice', 'SaveNotice', 'POST', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(73, 'view/all/notices', 'ViewAllNotices', 'GET', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(74, 'delete/notice/{slug}', 'DeleteNotice', 'GET', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(75, 'edit/notice/{slug}', 'EditNotice', 'GET', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(76, 'update/notice', 'UpdateNotice', 'POST', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(77, 'public/exam/results', 'PublicExamResults', 'GET', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(78, 'save/public/exam/result', 'SavePublicExamResult', 'POST', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(79, 'get/public/exam/result/{slug}', 'GetPublicExamResult', 'GET', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(80, 'update/public/exam/result', 'UpdatePublicExamResult', 'POST', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(81, 'delete/public/exam/result/{slug}', 'DeletePublicExamResult', 'GET', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(82, 'rearrange/public/exam/results', 'RearrangePublicExamResult', 'GET', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(83, 'save/rearranged/public/results', 'SaveRearrangedPublicResults', 'POST', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(84, 'update/public/result/page/title', 'UpdatePublicResultPageTitle', 'POST', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(85, 'school/exam/results', 'SchoolExamResults', 'GET', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(86, 'update/school/result/page/title', 'UpdateSchoolResultPageTitle', 'POST', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(87, 'save/school/exam/result', 'SaveSchoolExamResult', 'POST', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(88, 'delete/school/exam/result/{slug}', 'DeleteSchoolExamResult', 'GET', '2023-10-10 03:43:49', '2023-10-19 05:45:36'),
(89, 'get/school/exam/result/{slug}', 'GetSchoolExamResult', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:36'),
(90, 'update/school/exam/result', 'UpdateSchoolExamResult', 'POST', '2023-10-10 03:43:50', '2023-10-19 05:45:36'),
(91, 'rearrange/school/exam/results', 'RearrangeSchoolExamResult', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:36'),
(92, 'save/rearranged/school/results', 'SaveRearrangedSchoolResults', 'POST', '2023-10-10 03:43:50', '2023-10-19 05:45:36'),
(93, 'seo/homepage', 'SeoHomePage', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:36'),
(94, 'update/seo/homepage', 'UpdateSeoHomePage', 'POST', '2023-10-10 03:43:50', '2023-10-19 05:45:36'),
(95, 'view/important/links', 'ViewAllLink', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:36'),
(96, 'add/new/links', 'AddNewLink', 'POST', '2023-10-10 03:43:50', '2023-10-19 05:45:36'),
(97, 'delete/links/{slug}', 'DeleteLink', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:36'),
(98, 'get/links/info/{slug}', 'LinkInfo', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:36'),
(99, 'update/links/info', 'UpdateLinkInfo', 'POST', '2023-10-10 03:43:50', '2023-10-19 05:45:36'),
(100, 'rearrange/important/links', 'RearrangeImportantLink', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:36'),
(101, 'save/rearranged/important/links', 'SaveRearrangeLink', 'POST', '2023-10-10 03:43:50', '2023-10-19 05:45:36'),
(102, 'view/other/links', 'ViewAllOtherLink', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:36'),
(103, 'rearrange/other/links', 'RearrangeOtherLinks', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:36'),
(104, 'save/rearranged/other/links', 'SaveRearrangedOtherLinks', 'POST', '2023-10-10 03:43:50', '2023-10-19 05:45:36'),
(105, 'blog/page/title', 'PageTitle', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:36'),
(106, 'update/blog/page/title', 'UpdatePageTitle', 'POST', '2023-10-10 03:43:50', '2023-10-19 05:45:36'),
(107, 'add/new/blog', 'AddNewBlog', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:36'),
(108, 'save/blog', 'SaveBlog', 'POST', '2023-10-10 03:43:50', '2023-10-19 05:45:36'),
(109, 'view/all/blogs', 'ViewAllBlogs', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:36'),
(110, 'delete/blog/{slug}', 'DeleteBlog', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:36'),
(111, 'edit/blog/{slug}', 'EditBlog', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:36'),
(112, 'update/blog', 'UpdateBlog', 'POST', '2023-10-10 03:43:50', '2023-10-19 05:45:36'),
(113, 'rearrange/blogs', 'RearrangeBlog', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:36'),
(114, 'save/rearranged/blogs', 'saveRearrangedBlogs', 'POST', '2023-10-10 03:43:50', '2023-10-19 05:45:36'),
(115, 'file-manager', NULL, 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(116, 'laravel-filemanager', 'unisharp.lfm.show', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(117, 'laravel-filemanager/errors', 'unisharp.lfm.getErrors', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(118, 'laravel-filemanager/upload', 'unisharp.lfm.upload', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(119, 'laravel-filemanager/jsonitems', 'unisharp.lfm.getItems', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(120, 'laravel-filemanager/move', 'unisharp.lfm.move', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(121, 'laravel-filemanager/domove', 'unisharp.lfm.domove', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(122, 'laravel-filemanager/newfolder', 'unisharp.lfm.getAddfolder', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(123, 'laravel-filemanager/folders', 'unisharp.lfm.getFolders', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(124, 'laravel-filemanager/crop', 'unisharp.lfm.getCrop', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(125, 'laravel-filemanager/cropimage', 'unisharp.lfm.getCropimage', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(126, 'laravel-filemanager/cropnewimage', 'unisharp.lfm.getCropnewimage', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(127, 'laravel-filemanager/rename', 'unisharp.lfm.getRename', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(128, 'laravel-filemanager/resize', 'unisharp.lfm.getResize', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(129, 'laravel-filemanager/doresize', 'unisharp.lfm.performResize', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(130, 'laravel-filemanager/download', 'unisharp.lfm.getDownload', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(131, 'laravel-filemanager/delete', 'unisharp.lfm.getDelete', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(132, 'laravel-filemanager/demo', 'unisharp.lfm.', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(133, 'ckeditor', NULL, 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(134, 'ckeditor/upload', 'ckeditor.upload', 'POST', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(135, 'view/all/class', 'ViewAllClass', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(136, 'add/new/class', 'AddNewClass', 'POST', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(137, 'delete/class/{slug}', 'DeleteClass', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(138, 'get/class/info/{slug}', 'ClassInfo', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(139, 'update/class/info', 'UpdateClassInfo', 'POST', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(140, 'rearrange/class', 'RearrangeClass', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(141, 'save/rearranged/class', 'SaveRearrangeClass', 'POST', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(142, 'view/all/sections', 'ViewAllSections', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(143, 'add/new/section', 'AddNewSection', 'POST', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(144, 'delete/section/{slug}', 'DeleteSection', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(145, 'get/section/info/{slug}', 'SectionInfo', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(146, 'update/section/info', 'UpdateSectionInfo', 'POST', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(147, 'view/all/shifts', 'ViewAllShifts', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(148, 'add/new/shift', 'AddNewShift', 'POST', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(149, 'delete/shift/{slug}', 'DeleteShift', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(150, 'get/shift/info/{slug}', 'ShiftInfo', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(151, 'update/shift/info', 'UpdateShiftInfo', 'POST', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(152, 'rearrange/shift', 'RearrangeShift', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(153, 'save/rearranged/shift', 'SaveRearrangeShift', 'POST', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(154, 'view/all/groups', 'ViewAllGroups', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(155, 'add/new/group', 'AddNewGroup', 'POST', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(156, 'delete/group/{slug}', 'DeleteGroup', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(157, 'get/group/info/{slug}', 'GroupInfo', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(158, 'update/group/info', 'UpdateGroupInfo', 'POST', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(159, 'rearrange/group', 'RearrangeGroup', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(160, 'save/rearranged/group', 'SaveRearrangeGroup', 'POST', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(161, 'view/all/school/exams', 'ViewAllSchoolExams', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(162, 'add/new/school/exam', 'AddNewSchoolExam', 'POST', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(163, 'delete/school/exam/{slug}', 'DeleteSchoolExam', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(164, 'get/school/exam/info/{slug}', 'SchoolExamInfo', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(165, 'update/school/exam/info', 'UpdateSchoolExamInfo', 'POST', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(166, 'rearrange/school/exam', 'RearrangeSchoolExam', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(167, 'save/rearranged/school/exam', 'SaveRearrangeSchoolExam', 'POST', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(168, 'view/public/exams', 'ViewAllPublicExams', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(169, 'add/new/public/exam', 'AddNewPublicExam', 'POST', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(170, 'delete/public/exam/{slug}', 'DeletePublicExam', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(171, 'get/public/exam/info/{slug}', 'PublicExamInfo', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(172, 'update/public/exam/info', 'UpdatePublicExamInfo', 'POST', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(173, 'rearrange/public/exam', 'RearrangePublicExam', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(174, 'save/rearranged/public/exam', 'SaveRearrangePublicExam', 'POST', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(175, 'view/all/religions', 'ViewAllReligion', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(176, 'add/new/religion', 'AddNewReligion', 'POST', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(177, 'delete/religion/{slug}', 'DeleteReligion', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(178, 'get/religion/info/{slug}', 'ReligionInfo', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(179, 'update/religion/info', 'UpdateReligionInfo', 'POST', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(180, 'rearrange/religion', 'RearrangeReligion', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(181, 'save/rearranged/religion', 'SaveRearrangeReligion', 'POST', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(182, 'view/all/genders', 'ViewAllGender', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(183, 'add/new/gender', 'AddNewGender', 'POST', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(184, 'delete/gender/{slug}', 'DeleteGender', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(185, 'get/gender/info/{slug}', 'GenderInfo', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(186, 'update/gender/info', 'UpdateGenderInfo', 'POST', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(187, 'rearrange/gender', 'RearrangeGender', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(188, 'save/rearranged/gender', 'SaveRearrangeGender', 'POST', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(189, 'view/system/users', 'ViewAllSystemUsers', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(190, 'add/new/system/user', 'AddNewSystemUsers', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(191, 'create/system/user', 'CreateSystemUsers', 'POST', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(192, 'edit/system/user/{id}', 'EditSystemUser', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(193, 'delete/system/user/{id}', 'DeleteSystemUser', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(194, 'update/system/user', 'UpdateSystemUser', 'POST', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(195, 'make/user/superadmin/{id}', 'MakeSuperAdmin', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(196, 'revoke/user/superadmin/{id}', 'RevokeSuperAdmin', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(197, 'change/user/status/{id}', 'ChangeUserStatus', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(198, 'view/permission/routes', 'ViewAllPermissionRoutes', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(199, 'regenerate/permission/routes', 'RegeneratePermissionRoutes', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(200, 'view/user/roles', 'ViewAllUserRoles', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(201, 'new/user/role', 'NewUserRole', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(202, 'save/user/role', 'SaveUserRole', 'POST', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(203, 'delete/user/role/{id}', 'DeleteUserRole', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(204, 'edit/user/role/{id}', 'EditUserRole', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(205, 'update/user/role', 'UpdateUserRole', 'POST', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(206, 'view/user/role/permission', 'ViewUserRolePermission', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(207, 'assign/role/permission/{id}', 'AssignRolePermission', 'GET', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(208, 'save/assigned/role/permission', 'SaveAssignedRolePermission', 'POST', '2023-10-10 03:43:50', '2023-10-19 05:45:37'),
(209, 'makesulg', NULL, 'POST', '2023-10-19 05:45:36', '2023-10-19 05:45:36'),
(210, 'gallery/page/title', 'PageTitle', 'GET', '2023-10-19 05:45:36', NULL),
(211, 'update/gallery/page/title', 'UpdateGalleryPageTitle', 'POST', '2023-10-19 05:45:36', NULL),
(212, 'add/new/content', 'AddNewContent', 'GET', '2023-10-19 05:45:36', NULL),
(213, 'save/content', 'SaveContent', 'POST', '2023-10-19 05:45:36', NULL),
(214, 'view/all/contents', 'ViewAllContents', 'GET', '2023-10-19 05:45:36', NULL),
(215, 'delete/content/{slug}', 'DeleteContent', 'GET', '2023-10-19 05:45:36', NULL),
(216, 'edit/content/{slug}', 'EditContent', 'GET', '2023-10-19 05:45:36', NULL),
(217, 'update/content', 'UpdateContent', 'POST', '2023-10-19 05:45:36', NULL),
(218, 'rearrange/contents', 'RearrangeContent', 'GET', '2023-10-19 05:45:36', NULL),
(219, 'save/rearranged/contents', 'saveRearrangedContents', 'POST', '2023-10-19 05:45:36', NULL),
(220, 'school/committe/page/title', 'CommittePageTitle', 'GET', '2023-10-19 05:45:36', NULL),
(221, 'update/school/committe/page/title', 'UpdateCommittePageTitle', 'POST', '2023-10-19 05:45:36', NULL),
(222, 'add/new/member', 'AddNewMember', 'GET', '2023-10-19 05:45:36', NULL),
(223, 'save/member', 'SaveMember', 'POST', '2023-10-19 05:45:36', NULL),
(224, 'view/all/members', 'ViewAllMembers', 'GET', '2023-10-19 05:45:36', NULL),
(225, 'delete/member/{slug}', 'DeleteMember', 'GET', '2023-10-19 05:45:36', NULL),
(226, 'edit/member/{slug}', 'EditMember', 'GET', '2023-10-19 05:45:36', NULL),
(227, 'update/member', 'UpdateMember', 'POST', '2023-10-19 05:45:36', NULL),
(228, 'rearrange/members', 'RearrangeMember', 'GET', '2023-10-19 05:45:36', NULL),
(229, 'save/rearranged/members', 'saveRearrangedMembers', 'POST', '2023-10-19 05:45:36', NULL),
(230, 'teacher/page/title', 'TeacherPageTitle', 'GET', '2023-10-19 05:45:36', NULL),
(231, 'update/teacher/page/title', 'UpdateTeacherPageTitle', 'POST', '2023-10-19 05:45:36', NULL),
(232, 'add/new/teacher', 'AddNewTeacher', 'GET', '2023-10-19 05:45:36', NULL),
(233, 'save/teacher', 'SaveTeacher', 'POST', '2023-10-19 05:45:36', NULL),
(234, 'view/all/teachers', 'ViewAllTeachers', 'GET', '2023-10-19 05:45:36', NULL),
(235, 'delete/teacher/{slug}', 'DeleteTeacher', 'GET', '2023-10-19 05:45:36', NULL),
(236, 'edit/teacher/{slug}', 'EditTeacher', 'GET', '2023-10-19 05:45:36', NULL),
(237, 'update/teacher', 'UpdateTeacher', 'POST', '2023-10-19 05:45:37', NULL),
(238, 'rearrange/teachers', 'RearrangeTeacher', 'GET', '2023-10-19 05:45:37', NULL),
(239, 'save/rearranged/teachers', 'saveRearrangedTeachers', 'POST', '2023-10-19 05:45:37', NULL),
(240, 'students/statistics', 'StudentStatistics', 'GET', '2023-10-19 05:45:37', NULL),
(241, 'update/student/statistics/page/title', 'UpdateStudentStatisticsPageTitle', 'POST', '2023-10-19 05:45:37', NULL),
(242, 'get/section/of/class/{class_id}', 'GetSectionOfClass', 'GET', '2023-10-19 05:45:37', NULL),
(243, 'save/student/statistics', 'SaveStudentStatistics', 'POST', '2023-10-19 05:45:37', NULL),
(244, 'delete/student/statistics/{slug}', 'DeleteStudentStatistics', 'GET', '2023-10-19 05:45:37', NULL),
(245, 'get/student/statistics/{slug}', 'GetStudentStatistics', 'GET', '2023-10-19 05:45:37', NULL),
(246, 'update/student/statistics', 'UpdateStudentStatistics', 'POST', '2023-10-19 05:45:37', NULL),
(247, 'rearrange/student/statistics', 'RearrangeStudentStatistics', 'GET', '2023-10-19 05:45:37', NULL),
(248, 'save/rearranged/student/statistics', 'SaveRearrangedStudentStatistics', 'POST', '2023-10-19 05:45:37', NULL);

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
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(255) DEFAULT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `route` varchar(255) NOT NULL,
  `route_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`id`, `role_id`, `role_name`, `permission_id`, `route`, `route_name`, `created_at`, `updated_at`) VALUES
(3, 1, 'SEO Specialist', 94, 'update/seo/homepage', 'UpdateSeoHomePage', '2023-10-10 11:03:54', NULL),
(4, 1, 'SEO Specialist', 93, 'seo/homepage', 'SeoHomePage', '2023-10-10 11:03:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `seos`
--

CREATE TABLE `seos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `meta_description` longtext DEFAULT NULL,
  `sitemap_generate_time` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seos`
--

INSERT INTO `seos` (`id`, `meta_title`, `meta_keywords`, `meta_description`, `sitemap_generate_time`, `created_at`, `updated_at`) VALUES
(1, 'XYZ School', 'xyz,school', 'এক্সওয়াইজেধ স্কুল এবং কলেজ এর অতীত গৌরবোজ্জ্বল বর্তমান প্রশংসনীয়।', '2023-10-23 17:39:44', NULL, '2023-10-25 08:41:57');

-- --------------------------------------------------------

--
-- Table structure for table `social_media_links`
--

CREATE TABLE `social_media_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `messenger` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `telegram` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_media_links`
--

INSERT INTO `social_media_links` (`id`, `facebook`, `instagram`, `twitter`, `linkedin`, `youtube`, `messenger`, `whatsapp`, `telegram`, `created_at`, `updated_at`) VALUES
(1, '#', NULL, NULL, '#', '#', NULL, '#', NULL, NULL, '2023-10-25 08:08:12');

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
  `user_type` tinyint(4) NOT NULL DEFAULT 2 COMMENT '1=>Admin; 2=>User/Shop;',
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=>Active; 0=>Inactive',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `user_type`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '2023-09-17 10:49:43', '$2y$10$BZkFOPk5dRSLS1fYq8qqLe1sYVgj0753L8eEsJXRvqlfmV7lpZkMi', 1, 1, NULL, '2023-09-17 10:49:44', NULL),
(2, 'Chelsea Velasquez', 'ditukuji@mailinator.com', NULL, '$2y$10$hYN3SKa2L94s0dHOmBwPXumT3mXNLz3XJe41NV42.lOrXe/4WMSDK', 2, 1, NULL, '2023-09-18 22:27:03', '2023-10-10 12:04:29');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'SEO Specialist', 'This role will work the SEO of our Wesbite', '2023-10-10 05:01:06', '2023-10-10 11:03:54');

-- --------------------------------------------------------

--
-- Table structure for table `user_role_permissions`
--

CREATE TABLE `user_role_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `role_name` varchar(255) DEFAULT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `route` varchar(255) NOT NULL,
  `route_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_role_permissions`
--

INSERT INTO `user_role_permissions` (`id`, `user_id`, `role_id`, `role_name`, `permission_id`, `route`, `route_name`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'SEO Specialist', 94, 'update/seo/homepage', 'UpdateSeoHomePage', '2023-10-10 12:14:46', NULL),
(2, 2, 1, 'SEO Specialist', 93, 'seo/homepage', 'SeoHomePage', '2023-10-10 12:14:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wesbite_theme_colors`
--

CREATE TABLE `wesbite_theme_colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `primary_color` varchar(255) DEFAULT NULL,
  `secondary_color` varchar(255) DEFAULT NULL,
  `tertiary_color` varchar(255) DEFAULT NULL,
  `white_color_1` varchar(255) DEFAULT NULL,
  `white_color_2` varchar(255) DEFAULT NULL,
  `white_color_3` varchar(255) DEFAULT NULL,
  `title_color` varchar(255) DEFAULT NULL,
  `paragraph_color` varchar(255) DEFAULT NULL,
  `hints_color` varchar(255) DEFAULT NULL,
  `border_color` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wesbite_theme_colors`
--

INSERT INTO `wesbite_theme_colors` (`id`, `primary_color`, `secondary_color`, `tertiary_color`, `white_color_1`, `white_color_2`, `white_color_3`, `title_color`, `paragraph_color`, `hints_color`, `border_color`, `created_at`, `updated_at`) VALUES
(1, '#019267', '#3ccf4e', '#f45050', '#ffffff', '#f8f8f8', '#e6f4f0', '#20262e', '#2c3333', '#767a7a', '#e9e9ea', NULL, '2023-10-31 10:35:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_configs`
--
ALTER TABLE `contact_configs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_requests`
--
ALTER TABLE `contact_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_css_js`
--
ALTER TABLE `custom_css_js`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `google_recaptchas`
--
ALTER TABLE `google_recaptchas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logo_favicons`
--
ALTER TABLE `logo_favicons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permission_routes`
--
ALTER TABLE `permission_routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seos`
--
ALTER TABLE `seos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_media_links`
--
ALTER TABLE `social_media_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role_permissions`
--
ALTER TABLE `user_role_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wesbite_theme_colors`
--
ALTER TABLE `wesbite_theme_colors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_configs`
--
ALTER TABLE `contact_configs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_requests`
--
ALTER TABLE `contact_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `custom_css_js`
--
ALTER TABLE `custom_css_js`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `google_recaptchas`
--
ALTER TABLE `google_recaptchas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `logo_favicons`
--
ALTER TABLE `logo_favicons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `permission_routes`
--
ALTER TABLE `permission_routes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=249;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `seos`
--
ALTER TABLE `seos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `social_media_links`
--
ALTER TABLE `social_media_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_role_permissions`
--
ALTER TABLE `user_role_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wesbite_theme_colors`
--
ALTER TABLE `wesbite_theme_colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
