-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2023 at 08:11 PM
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
-- Database: `darksensation_bot`
--

-- --------------------------------------------------------

--
-- Table structure for table `chapters`
--

CREATE TABLE `chapters` (
  `chapter_id` bigint(20) UNSIGNED NOT NULL,
  `chapter_no` int(11) NOT NULL,
  `chapter_name` varchar(100) NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chapters`
--

INSERT INTO `chapters` (`chapter_id`, `chapter_no`, `chapter_name`, `course_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'Introduction to Raspberry Pi (RPi)/ Linux Operating System', 1, '2023-04-15 06:08:27', '2023-04-15 06:08:27'),
(2, 2, 'Introduction to Raspberry Pi (RPi) /Linux Operating\r\nSystem (Command Line Tour)', 1, '2023-04-15 06:09:07', '2023-04-15 06:09:07'),
(3, 3, 'Fun With Cat Sprite-Bouncing Cat', 1, '2023-04-15 06:09:55', '2023-04-15 06:09:55'),
(4, 4, 'Fun With Cat Sprite-Controlling The Cat', 1, '2023-04-15 06:17:45', '2023-04-15 06:17:45'),
(5, 5, 'Fun with Cat Sprite-Chasing the Mouse', 1, '2023-04-15 06:18:31', '2023-04-15 06:18:31'),
(6, 6, 'Fun with Cat Sprite - Cat Animation', 1, '2023-04-15 06:19:10', '2023-04-15 06:19:10'),
(7, 7, 'Fun with Cat Sprite - Sound', 1, '2023-04-15 06:19:43', '2023-04-15 06:19:43'),
(8, 8, 'Worksheet and Excercise', 1, '2023-04-15 06:20:18', '2023-04-15 06:20:18'),
(9, 9, 'Shapes/Drawing - Square', 1, '2023-04-15 06:20:42', '2023-04-15 06:20:42'),
(10, 10, 'Shapes/Drawing - Square Based Pattern', 1, '2023-04-15 06:21:27', '2023-04-15 06:21:27'),
(11, 1, 'Introduction to Vim Editor', 2, '2023-04-15 06:41:45', '2023-04-15 06:41:45'),
(12, 2, 'Drawing Shapes using ImageMagick', 2, '2023-04-15 06:42:15', '2023-04-15 06:42:15'),
(13, 3, 'Creating Functions in Bash and Taking Parameters using ImageMagick', 2, '2023-04-15 06:42:45', '2023-04-15 06:42:45'),
(14, 4, 'Linux Bash Scripting for Playing Cards Generation & Animation using ImageMagick', 2, '2023-04-15 06:43:16', '2023-04-15 06:43:16'),
(15, 5, 'Building an Analog Clock', 2, '2023-04-15 06:43:51', '2023-04-15 06:43:51'),
(16, 6, 'Describe The Glass Using Machine Learning', 2, '2023-04-15 06:44:28', '2023-04-15 06:44:28'),
(17, 7, 'Smart Classroom Using Machine Learning', 2, '2023-04-15 06:44:59', '2023-04-15 06:44:59'),
(18, 8, 'Make Me Happy Using Machine Learning', 2, '2023-04-15 06:45:38', '2023-09-18 00:41:05'),
(19, 9, 'Mailman Max\r\nUsing Machine Learning', 2, '2023-04-15 06:46:05', '2023-04-15 06:46:05'),
(20, 10, 'Car or Cup Using Machine Learning', 2, '2023-04-15 06:46:35', '2023-04-15 06:46:35'),
(21, 0, 'ABC', 3, '2023-04-16 06:12:31', '2023-04-16 06:12:31'),
(36, 0, 'PQR', 3, '2023-04-16 23:46:46', '2023-04-16 23:46:46'),
(37, 0, 'XYZ', 3, '2023-04-16 23:46:52', '2023-04-16 23:46:52'),
(40, 11, 'Chameleon', 2, '2023-09-18 00:41:44', '2023-09-18 00:41:44'),
(41, 12, 'Rock, Paper, Scissor', 2, '2023-09-18 00:42:04', '2023-09-18 00:42:04'),
(42, 13, 'Shy Panda', 2, '2023-09-18 00:42:30', '2023-09-18 00:42:30'),
(43, 14, 'Alien Language', 2, '2023-09-18 00:42:42', '2023-09-18 00:42:42'),
(44, 15, 'Face Finder', 2, '2023-09-18 00:42:54', '2023-09-18 00:42:54'),
(45, 16, 'Pac-Man', 2, '2023-09-18 00:43:05', '2023-09-18 00:43:05'),
(46, 17, 'Chatbot', 2, '2023-09-18 00:43:22', '2023-09-18 00:43:22'),
(47, 18, 'Tourist Info', 2, '2023-09-18 00:43:31', '2023-09-18 00:43:31'),
(48, 19, 'Emotions Expressions Using Face Detection', 2, '2023-09-18 00:43:42', '2023-09-18 00:43:42'),
(49, 20, 'Playing Music Based on emotions using artificial intelligence', 2, '2023-09-18 00:43:50', '2023-09-18 00:43:50'),
(50, 22, 'Recognize personalities from images using artificial intelligence', 2, '2023-09-18 00:44:04', '2023-09-18 00:44:04'),
(51, 23, 'Translator using Translate Extension', 2, '2023-09-18 00:44:15', '2023-09-18 00:44:15'),
(52, 26, 'Count of fingers shown using Human Body Detection', 2, '2023-09-18 00:44:48', '2023-09-18 00:44:48'),
(53, 25, 'Open and close the door using face detection', 2, '2023-09-18 00:44:57', '2023-09-18 00:44:57'),
(54, 24, 'Learn & Greet Using Face Detection', 2, '2023-09-18 00:45:06', '2023-09-18 00:45:06'),
(55, 27, 'QR Code Scanner Using Object Detection', 2, '2023-09-18 00:45:14', '2023-09-18 00:45:14'),
(56, 28, 'Virtual Xylophone Using Finger Detection', 2, '2023-09-18 00:45:23', '2023-09-18 00:45:23'),
(57, 30, 'Virtual National Anthem using Teachables (Pose) from Machine Learning Extension', 2, '2023-09-18 00:45:32', '2023-09-18 00:45:32'),
(58, 31, 'Regulating Fan Speed using fingers from the Human Body Detection', 2, '2023-09-18 00:45:49', '2023-09-18 00:45:49'),
(59, 32, 'Rock Paper Scissor Game Using Machine Learning and Text to Speech', 2, '2023-09-18 00:46:00', '2023-09-18 00:46:00');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `class` enum('VI','VII','VIII') NOT NULL,
  `curriculum` enum('REGULAR','ELECTIVE') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `class`, `curriculum`, `created_at`, `updated_at`) VALUES
(1, 'VI', 'REGULAR', '2023-04-01 15:50:54', '2023-04-16 21:32:12'),
(2, 'VI', 'ELECTIVE', '2023-04-01 15:50:54', '2023-04-01 15:51:07'),
(3, 'VII', 'REGULAR', '2023-04-01 15:52:03', '2023-04-01 15:52:03'),
(4, 'VII', 'ELECTIVE', '2023-04-01 15:52:20', '2023-04-01 15:52:20'),
(5, 'VIII', 'REGULAR', '2023-04-01 15:53:06', '2023-04-01 15:53:06'),
(6, 'VIII', 'ELECTIVE', '2023-04-01 15:53:21', '2023-04-01 15:53:21');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_04_01_150427_create_course_table', 2),
(6, '2023_04_01_152811_create_teachers_data_table', 3),
(7, '2023_04_06_094228_create_chapters_table', 4),
(8, '2023_04_17_090351_create_subtopics_table', 5),
(9, '2023_04_17_090438_create_questions_table', 5);

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
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `question_order` varchar(11) NOT NULL,
  `question_type` enum('mcq2','mcq4','chk2','chk4','shortAns','longAns','fillBlank') NOT NULL,
  `difficulty_level` enum('Easy','Intermediate','Difficult') DEFAULT NULL,
  `question` varchar(255) NOT NULL,
  `image_link` varchar(255) DEFAULT NULL,
  `video_link` varchar(255) DEFAULT NULL,
  `option_1` varchar(100) NOT NULL,
  `option_2` varchar(100) NOT NULL,
  `option_3` varchar(100) NOT NULL,
  `option_4` varchar(100) NOT NULL,
  `correct_option` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `subtopic_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `question_order`, `question_type`, `difficulty_level`, `question`, `image_link`, `video_link`, `option_1`, `option_2`, `option_3`, `option_4`, `correct_option`, `answer`, `subtopic_id`, `created_at`, `updated_at`) VALUES
(1, '', 'mcq4', 'Easy', 'a', NULL, NULL, 'q', 'f', 'e', 'h', '4', '', 100, '2023-11-02 22:12:05', '2023-11-02 22:12:05'),
(2, '', 'mcq4', 'Easy', 'Which extension are we using in our program?', NULL, NULL, 'Pen Extension', 'Human Body Detection', 'Face Detection', 'Machine Learning', '1', '', 1, '2023-11-02 22:15:49', '2023-11-02 22:15:49'),
(3, '', 'mcq4', 'Easy', 'Which extension are we using in our program?', NULL, NULL, 'Pen Extension', 'Human Body Detection', 'Face Detection', 'Machine Learning', '3', '', 54, '2023-11-06 22:06:35', '2023-11-06 22:06:35'),
(4, '', 'mcq4', 'Easy', '_________ format is used to save the program.', NULL, NULL, '.sh', '.block', '.sb3', '.sb4', '3', '', 54, '2023-11-06 22:08:39', '2023-11-06 22:08:39'),
(5, '', 'mcq4', 'Easy', 'Which coding environment are we using in our program?', NULL, NULL, 'Shell scripting', 'Python', 'Bash', 'block Coding', '4', '', 55, '2023-11-06 22:10:27', '2023-11-06 22:10:27'),
(6, '', 'mcq4', 'Easy', 'Which block is use to run the script continuously?', NULL, NULL, 'Make a block', 'create clone of ()', 'Wait until()', 'Set x to ()', '1', '', 55, '2023-11-06 22:11:53', '2023-11-06 22:11:53'),
(7, '', 'mcq4', 'Easy', 'A collection of blocks that are all interlocated with one another is called?', NULL, NULL, 'Script', 'Stage', 'Sprite', 'Scratch', '1', '', 56, '2023-11-06 22:14:03', '2023-11-06 22:14:03'),
(8, '', 'mcq4', 'Easy', 'How do we run the script to check the output ?', NULL, NULL, 'click on stage button', 'click on add extension', 'click on save', 'click on green flag', '4', '', 56, '2023-11-06 22:15:52', '2023-11-06 22:15:52'),
(22, '', 'mcq4', 'Intermediate', 'cccf', NULL, NULL, 'aa', '2', 'q', '4', '2', '', 101, '2023-11-17 04:40:19', '2023-11-17 04:40:19'),
(23, '', 'chk2', 'Easy', 'aaaaaggggggggggg', NULL, NULL, 'bbbbb', 'mmmmmm', '', '', '1,2', '', 101, '2023-11-17 09:03:29', '2023-11-17 09:03:29'),
(24, '', 'chk2', 'Easy', 'aaaaagggggggg', NULL, NULL, 'bbb', 'mmm', '', '', '2', '', 101, '2023-11-17 09:04:35', '2023-11-17 09:04:35'),
(25, '3', 'fillBlank', 'Intermediate', 'eeeeeeeeee', NULL, NULL, '', '', '', '', '', 'jjjj', 101, '2023-11-17 09:23:24', '2023-11-17 22:22:40'),
(26, '3', 'mcq4', 'Intermediate', 'hhhhhhhhhhh', NULL, NULL, 'ee', 'tt', 'i', 'p', '4', '', 101, '2023-11-17 11:57:53', '2023-11-18 03:40:58'),
(27, '3', 'mcq4', 'Intermediate', 'dddddddddddddddd', NULL, NULL, 'ffff', 'gggggggggggg', ',,,', 'rrrrr', '3', '', 101, '2023-11-17 12:19:21', '2023-11-17 12:19:21'),
(29, '3', 'mcq2', 'Intermediate', 'eeeeeeeeee', NULL, NULL, 'eee', 'dd', '', '', '2', '', 101, '2023-11-18 12:46:17', '2023-11-18 12:46:17'),
(30, '2', 'chk4', 'Intermediate', 'ssssssss', 'ssssss', NULL, 'sssss', 'ss', 'ssss', 'ssss', '4', '', 101, '2023-11-18 12:46:55', '2023-11-18 12:46:55'),
(31, '3', 'shortAns', 'Difficult', 'fffffffffff', NULL, NULL, '', '', '', '', '', 'fffffffffff', 101, '2023-11-18 12:47:28', '2023-11-18 12:47:28'),
(32, '4', 'longAns', 'Difficult', 'yyyyyy', NULL, NULL, '', '', '', '', '', 'eeeeeeeeeeeeeee', 101, '2023-11-18 12:47:57', '2023-11-18 12:47:57');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` bigint(20) NOT NULL,
  `uid` int(255) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `school_name` varchar(200) NOT NULL,
  `class` varchar(200) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `uid`, `name`, `email`, `school_name`, `class`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 123, 'siddhi', 'siddhi@gmail.com', 'Govt. High School, Benaulim', 'VI', 'siddhi', 'siddhi123', '2023-10-30 05:47:23', '2023-10-30 05:47:23');

-- --------------------------------------------------------

--
-- Table structure for table `subtopics`
--

CREATE TABLE `subtopics` (
  `subtopic_id` bigint(20) UNSIGNED NOT NULL,
  `subtopic_name` varchar(100) NOT NULL,
  `video_link` varchar(100) NOT NULL,
  `chapter_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subtopics`
--

INSERT INTO `subtopics` (`subtopic_id`, `subtopic_name`, `video_link`, `chapter_id`, `created_at`, `updated_at`) VALUES
(1, 'Introduction', 'https://www.youtube.com/embed/L_nJ2AFcYXM?si=H1UvCgxUL0EMQ4Ln', 11, '2023-09-18 03:46:57', '2023-09-18 03:46:57'),
(2, 'How to open Vim', 'https://www.youtube.com/embed/H-gWLi0vp7Y?si=PuWlYz8zKC5-Re8U', 11, '2023-09-21 00:49:07', '2023-09-21 00:49:07'),
(3, 'Modes in Vim', 'https://www.youtube.com/embed/SymkieEeGTs?si=ymXGVIkRuxN1xYFF', 11, '2023-09-21 00:50:52', '2023-09-21 00:50:52'),
(4, 'Vim grammar', 'https://www.youtube.com/embed/rKJIRJ8d7GY?si=lc2b1onO02qVvbhR', 11, '2023-09-21 00:51:56', '2023-09-21 00:51:56'),
(5, 'Vim nouns', 'https://www.youtube.com/embed/xnLXAtsrF5Y?si=xOS68zAbxQsk7ta_', 11, '2023-09-21 00:53:45', '2023-09-21 00:53:45'),
(6, 'Saving file in Vim', 'https://www.youtube.com/embed/HpCU8KRtZ1Y?si=VLFF-I2WFGsbolLL', 11, '2023-09-21 00:55:36', '2023-09-21 00:55:36'),
(7, 'Deleting content in Vim', 'https://www.youtube.com/embed/U6cFgk-jleU?si=uKxjakgE89S-cPwx', 11, '2023-10-02 22:17:58', '2023-10-02 22:17:58'),
(8, 'Set line numbers in Vim', 'https://www.youtube.com/embed/SuOZi5UMOLE?si=PU5tTypk_X3DPnWw', 11, '2023-10-02 22:18:34', '2023-10-02 22:18:34'),
(9, 'Checking spellings in Vim', 'https://www.youtube.com/embed/_MPIslGFtD0?si=sjo8-iIg4iRU41KR', 11, '2023-10-02 22:19:11', '2023-10-02 22:19:11'),
(10, 'Adding full stop in Vim', 'https://www.youtube.com/embed/-ozu8nrFG5I?si=OMZHEUNzEeEbRKsw', 11, '2023-10-02 22:19:46', '2023-10-02 22:19:46'),
(11, 'Vim outro', 'https://www.youtube.com/embed/uf5prIXk_9M?si=u4k6RFSGATDBPKUS', 11, '2023-10-02 22:21:50', '2023-10-02 22:21:50'),
(12, 'Card Animation Intro', 'https://www.youtube.com/embed/g0bg0HAaktM?si=Otk-OFN0D1B34sSA', 14, '2023-10-02 22:24:51', '2023-10-02 22:24:51'),
(13, 'Card Animation Code', 'https://www.youtube.com/embed/7CqvNUMVXcQ?si=DCE2xzEqR2izu560', 14, '2023-10-02 22:25:43', '2023-10-02 22:25:43'),
(14, 'Card Animation Output', 'https://www.youtube.com/embed/bnAjpXe9CMI?si=avi1IC28jxvDhcxO', 14, '2023-10-02 22:26:43', '2023-10-02 22:26:43'),
(15, 'Building an analog clock Intro', 'https://www.youtube.com/embed/urPHNfdZg7E?si=Q3T0kK8XuCnjrAIh', 15, '2023-10-02 22:28:00', '2023-10-02 22:28:00'),
(16, 'Building an analog clock Code', 'https://www.youtube.com/embed/M23aHNjKUYc?si=gd4mF_in7i60_OVC', 15, '2023-10-02 22:28:59', '2023-10-02 22:28:59'),
(17, 'Building an analog clock Output', 'https://www.youtube.com/embed/UVoBNoIY1bc?si=Khy20vLutVQgxbPq', 15, '2023-10-02 22:29:41', '2023-10-02 22:29:41'),
(18, 'Smart Classroom intro', 'https://www.youtube.com/embed/xOMU5PLpHEI?si=G3tDIS_el3EkVGfD', 17, '2023-10-02 22:33:12', '2023-10-02 22:33:12'),
(19, 'Smart Classroom training', 'https://www.youtube.com/embed/TUGg81k0FQs?si=Yqrahp39fiT_BdDn', 17, '2023-10-02 22:34:02', '2023-10-02 22:34:02'),
(20, 'Smart Classroom code', 'https://www.youtube.com/embed/e5Ajugb3auE?si=DpUcFJNfmV4RE6-m', 17, '2023-10-02 22:34:51', '2023-10-02 22:34:51'),
(21, 'Smart Classroom output', 'https://www.youtube.com/embed/YWThw_lx4v4?si=uBIRyu7NnWDdElzl', 17, '2023-10-02 22:36:29', '2023-10-02 22:36:29'),
(22, 'Smart Classroom outro', 'https://www.youtube.com/embed/jPsd4bm5oSM?si=tHtUlgP74B9Ls5vM', 17, '2023-10-02 22:37:15', '2023-10-02 22:37:15'),
(23, 'Make me happy intro', 'https://www.youtube.com/embed/p1Sjqpio5Uw?si=VC2w4K4ZE4s_PJvc', 18, '2023-10-02 22:38:39', '2023-10-02 22:38:39'),
(24, 'Make me happy training', 'https://www.youtube.com/embed/B0gRQ_8vFvI?si=-5KwYJWdS6O0O1wE', 18, '2023-10-02 22:39:24', '2023-10-02 22:39:24'),
(25, 'Make me happy code', 'https://www.youtube.com/embed/EA0-WDHOZWY?si=8Mv_hB9vn8LE6JcB', 18, '2023-10-03 00:44:18', '2023-10-03 00:44:18'),
(26, 'Make me happy output', 'https://www.youtube.com/embed/vfymvv8zReI?si=xmimZllsv5tOiLX7', 18, '2023-10-03 00:44:55', '2023-10-03 00:44:55'),
(27, 'Make me happy outro', 'https://www.youtube.com/embed/uRCAiDsNTHA?si=2SFA4gtTAgKIqdm-', 18, '2023-10-03 00:45:38', '2023-10-03 00:45:38'),
(28, 'Car or Cup intro', 'https://www.youtube.com/embed/J3mIe-HvgXY?si=PxHUGEBEvr8muJPs', 20, '2023-10-03 00:49:03', '2023-10-03 00:49:03'),
(29, 'Car or Cup training', 'https://www.youtube.com/embed/VOpmzODQj5o?si=xy2qsTSaZNSZfvEj', 20, '2023-10-03 00:49:50', '2023-10-03 00:49:50'),
(30, 'Car or Cup code', 'https://www.youtube.com/embed/3__Hq-FilMs?si=AC7d3MmxfEDinZ9x', 20, '2023-10-03 00:50:42', '2023-10-03 00:50:42'),
(31, 'Car or Cup output', 'https://www.youtube.com/embed/OGm2HmdDLW0?si=evJ60PNnDlEdEExM', 20, '2023-10-03 00:51:26', '2023-10-03 00:51:26'),
(32, 'Car or Cup outro', 'https://www.youtube.com/embed/kfpPraxxMG0?si=bRy3B-6ytjhB_Zo9', 20, '2023-10-03 00:52:13', '2023-10-03 00:52:13'),
(33, 'Mailman max intro', 'https://www.youtube.com/embed/u87SwgHS2NI?si=ymrtqa0_XrHEQjlI', 19, '2023-10-03 00:53:29', '2023-10-03 00:53:29'),
(34, 'Mailman max setup and training', 'https://www.youtube.com/embed/hUSP-4ps_J0?si=wrX-HvRe0G3go7YM', 19, '2023-10-03 00:54:13', '2023-10-03 00:54:13'),
(35, 'Mailman max code', 'https://www.youtube.com/embed/Fla5NhgRBOc?si=uPfmhhiEcqbDqFOS', 19, '2023-10-03 00:54:59', '2023-10-03 00:54:59'),
(36, 'Mailman max output', 'https://www.youtube.com/embed/EEnUoZkC9QU?si=Fxm8L7x9rFV2W4Zz', 19, '2023-10-03 00:56:00', '2023-10-03 00:56:00'),
(37, 'Mailman max outro', 'https://www.youtube.com/embed/9_Vcw4Melig?si=H7euKaKH50b-X6W1', 19, '2023-10-03 00:57:00', '2023-10-03 00:57:00'),
(38, 'Face Finder introduction', 'https://www.youtube.com/embed/HwQleHzWLOM?si=x0UjJlEQ_zzW87Dm', 44, '2023-10-03 01:00:05', '2023-10-03 01:00:05'),
(39, 'Face Finder code', 'https://www.youtube.com/embed/E6RFDrXCXfo?si=PfUqEkbxIz395Z72', 44, '2023-10-03 01:00:44', '2023-10-03 01:00:44'),
(40, 'Face Finder output', 'https://www.youtube.com/embed/EAh22SU6rOQ?si=V2LSgxA8oApH0qU_', 44, '2023-10-03 01:01:37', '2023-10-03 01:01:37'),
(41, 'Face Finder outro', 'https://www.youtube.com/embed/Vd_sYhwz3kE?si=wb8g1ojbpN-SnxPk', 44, '2023-10-03 01:02:23', '2023-10-03 01:02:23'),
(42, 'Pacman intro', 'https://www.youtube.com/embed/rhuYXmiKUWo?si=GYxr3Dlkf969YTmx', 45, '2023-10-03 01:03:55', '2023-10-03 01:03:55'),
(43, 'Pacman training', 'https://www.youtube.com/embed/oBhd5lAf5Xk?si=H5ziAwmIE1ficMgH', 45, '2023-10-03 01:05:26', '2023-10-03 01:05:26'),
(44, 'Pacman testing', 'https://www.youtube.com/embed/mNLwpIrq7zA?si=HW38sg1pLFkWUlY7', 45, '2023-10-03 01:06:10', '2023-10-03 01:06:10'),
(45, 'Pacman outro', 'https://www.youtube.com/embed/B7EQDnllQ-0?si=7R0uW8DFSyk5lHOy', 45, '2023-10-03 01:07:12', '2023-10-03 01:07:12'),
(46, 'Chatbot intro', 'https://www.youtube.com/embed/XQIHJbmAQ14?si=D8sP9bdI-pcEHnLX', 46, '2023-10-03 01:08:28', '2023-10-03 01:08:28'),
(47, 'Chatbot Training', 'https://www.youtube.com/embed/WPvLteWgMko?si=wjoYRE-0L1RTjti3', 46, '2023-10-03 01:09:21', '2023-10-03 01:09:21'),
(48, 'Chatbot testing', 'https://www.youtube.com/embed/FSjB8ubXxkA?si=EphJLWlEVf2M0zYR', 46, '2023-10-03 01:10:12', '2023-10-03 01:10:12'),
(49, 'Chatbot outro', 'https://www.youtube.com/embed/PzXHG-Pr4-o?si=rN9bTcF-4T7ZX5H_', 46, '2023-10-03 01:10:51', '2023-10-03 01:10:51'),
(50, 'Tourist info intro', 'https://www.youtube.com/embed/XSif0F2KCqA?si=bwMx5187qaOAXAcj', 47, '2023-10-03 01:12:00', '2023-10-03 01:14:48'),
(51, 'Tourist Info training', 'https://www.youtube.com/embed/sg9eeaYFaDc?si=zO5VDDoxhM9ARTqf', 47, '2023-10-03 01:12:50', '2023-10-03 01:12:50'),
(52, 'Tourist info testing', 'https://www.youtube.com/embed/Yarua0_ci5I?si=UwmbmwssNM9pXggD', 47, '2023-10-03 01:13:41', '2023-10-03 01:13:41'),
(53, 'Tourist info outro', 'https://www.youtube.com/embed/aG3vejZecRg?si=E_1QFogRJYf3pMDG', 47, '2023-10-03 01:14:23', '2023-10-03 01:14:23'),
(54, 'Emotion Expression using Face Detection intro', 'https://www.youtube.com/embed/u6CVp9gWVFE?si=mCHTCAI1CiwhIi_g', 48, '2023-10-03 01:18:12', '2023-10-03 01:18:12'),
(55, 'Emotion Expression using Face Detection Code', 'https://www.youtube.com/embed/WRH0NxiqJu8?si=N2dGrUuVFyL5m2UC', 48, '2023-10-03 01:18:57', '2023-10-03 01:18:57'),
(56, 'Emotion Expression using Face Detection output', 'https://www.youtube.com/embed/vr0S8pBJ7EY?si=QKdJObuaHjJGKPES', 48, '2023-10-04 22:27:36', '2023-10-04 22:27:36'),
(57, 'Playing music Based on Emotions Using Artificial Intelligence intro', 'https://www.youtube.com/embed/x9yjaZmAzsQ?si=HkDHo57VyFnVQ8Gz', 49, '2023-10-04 22:29:20', '2023-10-04 22:29:20'),
(58, 'Playing music Based on Emotions Using Artificial Intelligence code', 'https://www.youtube.com/embed/iycz5AuZw9Q?si=UTDpxQhI_R9C7zKy', 49, '2023-10-04 22:30:11', '2023-10-04 22:30:11'),
(59, 'Playing music Based on Emotions Using Artificial Intelligence Outro', 'https://www.youtube.com/embed/X_Y0qgaXk1I?si=-q1lsoEItF7T9bkc', 49, '2023-10-04 22:30:57', '2023-10-04 22:30:57'),
(60, 'Recognize personalities from Images using AI Intro', 'https://www.youtube.com/embed/3Pd89Ai7U4I?si=3RhEWZyEUOVHX6K0', 50, '2023-10-04 22:32:28', '2023-10-04 22:32:28'),
(61, 'Recognize Personalities from Images using AI Code', 'https://www.youtube.com/embed/WFUQ-aPxU9I?si=tg02zeLXkO4pgrnU', 50, '2023-10-04 22:33:43', '2023-10-04 22:33:43'),
(62, 'Recognize personalities from images using AI Output', 'https://www.youtube.com/embed/ZyxBOBkFaw0?si=vGJFnIG2dnFfJNbw', 50, '2023-10-04 22:34:23', '2023-10-04 22:34:23'),
(63, 'Translator Using Translate Extension Intro', 'https://www.youtube.com/embed/ni_ErAABQ08?si=2jHLgsFKIzgPU-Nb', 51, '2023-10-04 22:35:35', '2023-10-04 22:35:35'),
(64, 'Translator Using Translate Extension Code', 'https://www.youtube.com/embed/d0TTb5Y3Q8o?si=-1NpelBbEQ94mpyP', 51, '2023-10-04 22:36:23', '2023-10-04 22:36:23'),
(65, 'Translator Using Translate Extension Output', 'https://www.youtube.com/embed/jy_cwNRSB-w?si=xY-4YN97J_bFiY-x', 51, '2023-10-04 22:37:25', '2023-10-04 22:37:25'),
(66, 'Counting of Fingers Intro', 'https://www.youtube.com/embed/AjXegJTTYhQ?si=07zNKn1HYmgixxa_', 52, '2023-10-04 22:38:40', '2023-10-04 22:38:40'),
(67, 'Count of Fingers Code part 1', 'https://www.youtube.com/embed/OOZv1q3IJic?si=vVtxIkqOnw6hLtWe', 52, '2023-10-04 22:39:25', '2023-10-04 22:39:25'),
(68, 'Count of fingers Code part 2', 'https://www.youtube.com/embed/INCHZunMObA?si=Ucd9eZxHAkESngUI', 52, '2023-10-04 22:40:03', '2023-10-04 22:40:03'),
(69, 'Count of Fingers Output', 'https://www.youtube.com/embed/L0RDg1-ojgw?si=1cLXuqqh-ufyoL9Z', 52, '2023-10-04 22:40:40', '2023-10-04 22:40:40'),
(70, 'Automatic Door Unlocking Intro', 'https://www.youtube.com/embed/fQdwt41-oxc?si=1mjTvSDoJqAKXcAK', 53, '2023-10-04 22:42:41', '2023-10-04 22:42:41'),
(71, 'Automatic door unlock setup', 'https://www.youtube.com/embed/S_v8uzgtt8c?si=LzNglhlDdKWOjRZy', 53, '2023-10-04 22:43:22', '2023-10-04 22:43:22'),
(72, 'Automatic door unlock training', 'https://www.youtube.com/embed/k09ahzRs4_I?si=WV9PSuWf2B9EoMWA', 53, '2023-10-04 22:44:01', '2023-10-04 22:44:01'),
(73, 'Automatic door unlock testing', 'https://www.youtube.com/embed/_97EOFrs25E?si=KDhkmWDL0XH3__d2', 53, '2023-10-04 22:44:45', '2023-10-04 22:44:45'),
(74, 'Automatic door unlock output', 'https://www.youtube.com/embed/sRu1KRIeIFM?si=FllM3jtS5lQe-gfU', 53, '2023-10-04 22:45:20', '2023-10-04 22:45:20'),
(75, 'Learn and greet Intro', 'https://www.youtube.com/embed/ZDcLNzHWUcg?si=ku23boYJXLBMpa_-', 54, '2023-10-04 22:46:44', '2023-10-04 22:46:44'),
(76, 'Learn and Greet Code Part1', 'https://www.youtube.com/embed/iPz5pr0ob1I?si=1YzZ1GWM63E-w9Nr', 54, '2023-10-04 22:47:33', '2023-10-04 22:47:33'),
(77, 'Learn and Greet Code Part 2', 'https://www.youtube.com/embed/Kenadcr-tRI?si=7dlpJz2AX3gHd30H', 54, '2023-10-04 22:48:20', '2023-10-04 22:48:20'),
(78, 'Learn and Greet Output', 'https://www.youtube.com/embed/jE0z6s7-FVE?si=tHbnH50oam5UdrHs', 54, '2023-10-04 22:49:13', '2023-10-04 22:49:13'),
(79, 'QR Code Scanner Using Object Detection Introduction', 'https://www.youtube.com/embed/i9qkpHy6kIM?si=sy1kK3CS-Tb_aFEY', 55, '2023-10-04 22:55:11', '2023-10-04 22:55:11'),
(80, 'Generation of QR Code', 'https://www.youtube.com/embed/rUZsCqcMRgk?si=-nBDykHyusgkksWW', 55, '2023-10-04 22:55:47', '2023-10-04 22:55:47'),
(81, 'QR Code Scanner Using Object Detection Code', 'https://www.youtube.com/embed/XqYlOblg5LY?si=j9EC5e8I1nk_lAqR', 55, '2023-10-04 22:56:21', '2023-10-04 22:56:21'),
(82, 'QR Code Scanner Using Object Detection Output', 'https://www.youtube.com/embed/Wl0OOeiB_yY?si=k7CJvy5DcO3doz__', 55, '2023-10-04 22:56:56', '2023-10-04 22:56:56'),
(83, 'Virtual Xylophone Using Finger Detection Introduction', 'https://www.youtube.com/embed/VpFvB7NO86E?si=3Umf3jitVdjO4Qim', 56, '2023-10-04 22:57:57', '2023-10-04 22:57:57'),
(84, 'Virtual Xylophone Using Finger Detection Setup', 'https://www.youtube.com/embed/c_wDPA6h73Y?si=TxDF-Ia8b61BeP3y', 56, '2023-10-04 22:58:39', '2023-10-04 22:58:39'),
(86, 'Virtual Xylophone Using Finger Detection Code', 'https://www.youtube.com/embed/vYj1gS78YoM?si=ImMNazrjrZfukY9y', 56, '2023-10-04 23:04:32', '2023-10-04 23:04:32'),
(87, 'Virtual Xylophone Using Finger Detection Outro', 'https://www.youtube.com/embed/c5SArbU0AE8?si=ecEuOEJSeOvi3BkS', 56, '2023-10-04 23:05:22', '2023-10-04 23:05:22'),
(88, 'Virtual National Anthem Introduction', 'https://www.youtube.com/embed/vUlBv4ckrmE?si=Zr2NXGrV4HCpXBMi', 57, '2023-10-04 23:08:42', '2023-10-04 23:08:42'),
(89, 'Virtual National Anthem setup and training', 'https://www.youtube.com/embed/6XZ0q_4VTLY?si=C3t-QPRwZIw8jaxO', 57, '2023-10-04 23:09:37', '2023-10-04 23:09:37'),
(90, 'Virtual National Anthem code', 'https://www.youtube.com/embed/31sym2kPR0s?si=8FlPlfqgaEV6UDWa', 57, '2023-10-04 23:10:46', '2023-10-04 23:10:46'),
(91, 'Virtual National Anthem output', 'https://www.youtube.com/embed/1MyuOkRZkbY?si=Kphok5BYB6u_ZmWG', 57, '2023-10-04 23:12:15', '2023-10-04 23:12:15'),
(92, 'Virtual National Anthem outro', 'https://www.youtube.com/embed/Ic8HkIzvoNM?si=UrhkhW4LoQhOQV-c', 57, '2023-10-04 23:13:03', '2023-10-04 23:13:03'),
(93, 'Regulating Fan Speed using fingers from the Human Body Detection Introduction', 'https://www.youtube.com/embed/jKztJ752AXQ?si=4XvBSuVJFLGMc8Zj', 58, '2023-10-04 23:17:04', '2023-10-04 23:17:04'),
(94, 'Regulating Fan Speed using fingers from the Human Body Detection Code', 'https://www.youtube.com/embed/512qZtVA-ho?si=o1xRnxt871W_KgSI', 58, '2023-10-04 23:18:03', '2023-10-04 23:18:03'),
(95, 'Regulating Fan Speed using fingers from the Human Body Detection Output', 'https://www.youtube.com/embed/DAGJJLCuMDY?si=Z_dePs80SAoIh1m2', 58, '2023-10-04 23:19:00', '2023-10-04 23:19:00'),
(96, 'Rock Paper Scissor Game Using Machine Learning and Text to Speech Introduction', 'https://www.youtube.com/embed/wboyu7V-TvQ?si=Hfr5PwjL_bzKdjNK', 59, '2023-10-04 23:30:06', '2023-10-04 23:30:06'),
(97, 'Rock Paper Scissor Game Using Machine Learning and Text to Speech Code', 'https://www.youtube.com/embed/5DvoNhrGJjI?si=-jiL_xgob8vZkfYE', 59, '2023-10-04 23:31:09', '2023-10-04 23:31:09'),
(98, 'Rock Paper Scissor Game Using Machine Learning and Text to Speech Output', 'https://www.youtube.com/embed/aZsUMlqgqG0?si=x3D6nOpcla35JSbT', 59, '2023-10-04 23:31:54', '2023-10-04 23:31:54'),
(99, 'Rock Paper Scissor Game Using Machine Learning and Text to Speech Outro', 'https://www.youtube.com/embed/H8aahlbgeRA?si=M70SxSeAi4Ro-DQ-', 59, '2023-10-04 23:32:39', '2023-10-04 23:32:39'),
(100, 'Chameleon Introduction', 'https://www.youtube.com/embed/RvxnCkQEMzM?si=knIg0226nbLE532s', 40, '2023-10-04 23:46:55', '2023-10-04 23:46:55'),
(101, 'Chameleon Training', 'https://www.youtube.com/embed/hSUr_El_898?si=1nmTbuB69wGHlvw8', 40, '2023-10-04 23:47:37', '2023-10-04 23:47:37'),
(102, 'Chameleon Code', 'https://www.youtube.com/embed/8X1x-nx7Lt0?si=09NL0zyxV4iF9HSk', 40, '2023-10-04 23:48:19', '2023-10-04 23:50:30'),
(103, 'Chameleon output', 'https://www.youtube.com/embed/cfTZvl-r9OI?si=mJa4OD6CfBNkYhlD', 40, '2023-10-04 23:51:47', '2023-10-04 23:51:47'),
(104, 'Chameleon outro', 'https://www.youtube.com/embed/LCu5xqa8a6Q?si=7nvWDC3IWig2KWjN', 40, '2023-10-04 23:52:36', '2023-10-04 23:52:36'),
(105, 'Rock Paper Scissors introduction', 'https://www.youtube.com/embed/9OP_1hkNae4?si=973Rv6AybQhosyw6', 41, '2023-10-04 23:55:16', '2023-10-04 23:55:16'),
(106, 'Rock Paper Scissors Training', 'https://www.youtube.com/embed/sFF4yOiJtpA?si=SceQ0dSQJTUu_dtw', 41, '2023-10-04 23:56:19', '2023-10-04 23:56:19'),
(107, 'Rock Paper Scissors code', 'https://www.youtube.com/embed/_7KcQPUot3M?si=pj1zG1DzD-Aiw-Jz', 41, '2023-10-04 23:57:27', '2023-10-04 23:57:27'),
(108, 'Rock Paper Scissors output', 'https://www.youtube.com/embed/-d5UdQtXijU?si=rBWtKLWnU9lou844', 41, '2023-10-04 23:58:42', '2023-10-04 23:58:42'),
(109, 'Shy Panda Introduction', 'https://www.youtube.com/embed/QuGIv5UdU0o?si=fxgce2voLVsqB5bN', 42, '2023-10-05 00:01:37', '2023-10-05 00:01:37'),
(110, 'Shy Panda Training', 'https://www.youtube.com/embed/8Zc91gWZpOM?si=GtCIKt09gaVY3eD3', 42, '2023-10-05 00:02:29', '2023-10-05 00:02:29'),
(111, 'Shy panda code', 'https://www.youtube.com/embed/N6YCrZyoInA?si=VYF5hG6CYvH7-arU', 42, '2023-10-05 00:03:43', '2023-10-05 00:03:43'),
(112, 'Shy Panda output', 'https://www.youtube.com/embed/gTroSkPcH0E?si=EmPzb95yPUTkuXDX', 42, '2023-10-05 00:04:51', '2023-10-05 00:04:51'),
(113, 'Alien Language introduction', 'https://www.youtube.com/embed/9AAwgaROOPg?si=KlWasGLj2Nqpdoky', 43, '2023-10-05 00:12:46', '2023-10-05 00:12:46'),
(114, 'Alien Language Training', 'https://www.youtube.com/embed/v0ZJc0xAs-?si=CGFqGEhJ285NM5ej', 43, '2023-10-05 00:13:38', '2023-10-05 00:13:38'),
(115, 'Alien Language code', 'https://www.youtube.com/embed/B5x4lIvHevU?si=RiBk_Aij3504NXjv', 43, '2023-10-05 00:14:23', '2023-10-05 00:14:23'),
(116, 'Alien Language Outro', 'https://www.youtube.com/embed/KPTsY0HklrA?si=uKCRsK-Dq1bkWM_q', 43, '2023-10-05 00:15:09', '2023-10-05 00:15:09'),
(117, 'Drawing shapes using image magic intro', 'https://www.youtube.com/embed/oik1Ez71liU?si=efpc49v_loaUtSVu', 12, '2023-10-05 00:17:11', '2023-10-05 00:17:11'),
(118, 'Drawing shapes using imagemagick task1', 'https://www.youtube.com/embed/cs0arW7EDe4?si=4_C6MHuWWNqfwvXw', 12, '2023-10-05 00:18:27', '2023-10-05 00:18:27'),
(119, 'Drawing shapes using imagemagick task2', 'https://www.youtube.com/embed/4zLrqqqPaFE?si=S9ChgA-GVq4x_mRO', 12, '2023-10-05 00:19:21', '2023-10-05 00:19:21'),
(120, 'Drawing shapes using imagemagick task3', 'https://www.youtube.com/embed/rISebYs5g6s?si=SqoBQWYkgCw2I79v', 12, '2023-10-05 00:20:50', '2023-10-05 00:20:50'),
(121, 'Drawing shapes using imagemagick task4', 'https://www.youtube.com/embed/18Zvd_Xu1q0?si=XG6-1lnZN6U0Y38Y', 12, '2023-10-05 00:22:04', '2023-10-05 00:22:04'),
(122, 'Drawing shapes using imagemagick task5', 'https://www.youtube.com/embed/Tz70ZBKQZYg?si=yUStHJXBeh0SQd62', 12, '2023-10-05 00:23:27', '2023-10-05 00:23:27'),
(123, 'Drawing shapes using imagemagick outro', 'https://www.youtube.com/embed/RyaqSkRPwZs?si=zX3YE0uMK3aOk8iY', 12, '2023-10-05 00:24:37', '2023-10-05 00:24:37'),
(124, 'Describe The Glass Intro', 'https://www.youtube.com/embed/OaYzT1ebjeU?si=JAClACccHw5KPKsD', 16, '2023-10-05 00:42:49', '2023-10-05 00:42:49'),
(125, 'Describe The Glass code', 'https://www.youtube.com/embed/c21pwdR69MM?si=LwLlOX7EZd0NXwiP', 16, '2023-10-05 00:44:28', '2023-10-05 00:44:28'),
(126, 'Describe The Glass Training And Code', 'https://www.youtube.com/embed/hnA4hnBCewI?si=bii3oAhYYq8Aw7fV', 16, '2023-10-05 00:46:01', '2023-10-05 00:46:01'),
(127, 'Describe The Glass Outro', 'https://www.youtube.com/embed/FpJbtaZlPTA?si=pg6EAI7iO2eKkPob', 16, '2023-10-05 00:47:06', '2023-10-05 00:47:06'),
(128, 'Creating functions in bash and taking parameter using image magick intro', 'https://www.youtube.com/embed/MShtyT9J7vU?si=OoQVzfvpla8gKzQB', 13, '2023-10-10 23:44:01', '2023-10-10 23:44:01'),
(129, 'Creating functions in bash task 1', 'https://www.youtube.com/embed/iB7c4fe45k8?si=SjmNDVPf0Y-WNcsT', 13, '2023-10-10 23:45:29', '2023-10-10 23:45:29'),
(130, 'Creating functions in bash task 2', 'https://www.youtube.com/embed/bMlz_hFfCj0?si=9duKS0gTr1A7XtFw', 13, '2023-10-10 23:46:23', '2023-10-10 23:46:23'),
(131, 'Creating functions in bash task 3', 'https://www.youtube.com/embed/EKsnH5zreKg?si=riJzwz6Nk083HVVG', 13, '2023-10-10 23:47:17', '2023-10-10 23:47:17'),
(132, 'Creating functions in bash task 4', 'https://www.youtube.com/embed/h2X880BzyO4?si=era5XMye4E-pqjpS', 13, '2023-10-10 23:48:06', '2023-10-10 23:48:06'),
(133, 'Creating functions in bash task 5', 'https://www.youtube.com/embed/Q7ut8PgZsvM?si=UbsDeBn9bVOqG0J1', 13, '2023-10-10 23:49:10', '2023-10-10 23:49:10'),
(134, 'Creating functions in bash task 6', 'https://www.youtube.com/embed/DyVHVM0ka78?si=LCWMV1qyWTOnpJYC', 13, '2023-10-10 23:50:26', '2023-10-10 23:50:26');

-- --------------------------------------------------------

--
-- Table structure for table `teachers_data`
--

CREATE TABLE `teachers_data` (
  `teachers_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `school_name` varchar(200) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers_data`
--

INSERT INTO `teachers_data` (`teachers_id`, `name`, `email`, `school_name`, `username`, `password`, `created_at`, `updated_at`) VALUES
(2, 'Siddhi', 'parodkarsiddhi018@gmail.com', 'GHS, Siridao', 'parodkarsiddhi', '$2y$10$Z5tSbzAKQ4Nv95fcMAv/K.rjXzOWyxzXfmvslCSqe3KLjr.bq.4OG', '2023-04-04 00:18:13', '2023-04-04 00:18:13'),
(3, 'Vishakha', 'vishakha@gmail.com', 'Auxilium HS', 'vishakha', '$2y$10$ZVs737BsaMMc7DgVRyGRkOYDDIyXJb9yBqpvZW.Gi9hgsDprgEJF2', '2023-04-04 00:20:26', '2023-04-04 00:20:26'),
(4, 'Tanvi', 'tanvi@gmail.com', 'GHS, Sal', 'tanvi', '$2y$10$r3EQTZIqS0LGYERUZfu69ebSA0dLaP6sfc9qqzK20E9PBnRXE6kZa', '2023-04-04 04:13:01', '2023-04-04 04:13:01'),
(5, 'tanvi', 'tanvisawant04@gmail.com', 'GHS, Siridao', 'tanvi04', '$2y$10$1b9Cj09nNN0IC8gU05TW0.79AnxnRj7G/Q57A0PsOShCRPC4jLE.a', '2023-04-04 04:59:14', '2023-04-04 04:59:14'),
(6, 'Rinky Pednekar', 'rinky@cares.goa', 'pmu', 'pednekarrinky', '$2y$10$8Nv4DwPr3a9KCE6ZEpGUvOag.u9qG2EvJhKm37d01mQDSZ6fffTYy', '2023-09-18 00:33:18', '2023-09-18 00:33:18'),
(7, 'Vibha', 'vibha@gmail.com', 'PMU', 'vibha', '$2y$10$JSrA7lI.Q.dySDJikI9jYe05Dl8pWcU5sLaQs58t3rYTHhYd8rwZ6', '2023-10-29 21:25:48', '2023-10-29 21:25:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) NOT NULL,
  `uid` varchar(60) NOT NULL,
  `class` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `uid`, `class`, `name`, `email`, `created_at`, `updated_at`) VALUES
(1, '123', 'VI', 'siddhi', 'siddhi@gmail.com', '2023-10-30 06:04:49', '2023-10-30 06:04:49'),
(2, '2023', 'VI', 'diksha', 'dikshanaik18@gmail.com', '2023-10-30 06:21:05', '2023-10-30 06:21:05'),
(3, '2022', 'VI', 'Canyton', 'pmu@cares.com', '2023-11-08 01:19:57', '2023-11-08 01:19:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`chapter_id`),
  ADD KEY `chapters_course_id_foreign` (`course_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

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
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `questions_subtopic_id_foreign` (`subtopic_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `subtopics`
--
ALTER TABLE `subtopics`
  ADD PRIMARY KEY (`subtopic_id`),
  ADD KEY `subtopics_chapter_id_foreign` (`chapter_id`);

--
-- Indexes for table `teachers_data`
--
ALTER TABLE `teachers_data`
  ADD PRIMARY KEY (`teachers_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chapters`
--
ALTER TABLE `chapters`
  MODIFY `chapter_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subtopics`
--
ALTER TABLE `subtopics`
  MODIFY `subtopic_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `teachers_data`
--
ALTER TABLE `teachers_data`
  MODIFY `teachers_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chapters`
--
ALTER TABLE `chapters`
  ADD CONSTRAINT `chapters_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_subtopic_id_foreign` FOREIGN KEY (`subtopic_id`) REFERENCES `subtopics` (`subtopic_id`) ON DELETE CASCADE;

--
-- Constraints for table `subtopics`
--
ALTER TABLE `subtopics`
  ADD CONSTRAINT `subtopics_chapter_id_foreign` FOREIGN KEY (`chapter_id`) REFERENCES `chapters` (`chapter_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
