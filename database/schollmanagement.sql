-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 23, 2023 at 10:36 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schollmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, 'International Web Developer', 500, 1, '2023-08-22 16:41:27', '2023-08-23 05:46:41'),
(2, 'CCNA', 600, 1, '2023-08-22 16:41:27', '2023-08-22 16:43:53'),
(3, 'Big Data', 1000, 1, '2023-08-23 05:43:27', '0000-00-00 00:00:00'),
(4, 'Data Science', 700, 1, '2023-08-23 05:46:59', '0000-00-00 00:00:00'),
(5, 'Cloud Computing', 400, 1, '2023-08-23 05:47:23', '0000-00-00 00:00:00'),
(6, 'Artificial Intelligence and Machine Learning', 1200, 1, '2023-08-23 08:40:07', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `floors`
--

DROP TABLE IF EXISTS `floors`;
CREATE TABLE IF NOT EXISTS `floors` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `floors`
--

INSERT INTO `floors` (`id`, `name`) VALUES
(1, 'Ground Floor'),
(2, 'First Floor'),
(3, 'Second Floor'),
(4, 'Third Floor');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `student_id` int NOT NULL,
  `class_id` int DEFAULT NULL,
  `course_id` int NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `student_id`, `class_id`, `course_id`, `status`, `created_at`) VALUES
(1, 1, 1, 1, 1, '0000-00-00 00:00:00'),
(2, 2, NULL, 2, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `id` int NOT NULL AUTO_INCREMENT,
  `teacher_id` int DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `floor_id` int NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `teacher_id`, `name`, `floor_id`, `status`) VALUES
(1, 1, 'Angkor Wat', 1, 1),
(2, 2, 'Preah Khan', 1, 1),
(3, 3, 'Prasat Preah Vihear', 1, 1),
(4, 4, 'Bayon', 1, 1),
(5, 5, 'Banteay Srei', 2, 1),
(6, 6, 'Banteay Samre', 2, 1),
(7, 0, 'Baksei ChamKrong', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `gender` int NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `course_id` int NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `last_name`, `gender`, `phone_number`, `course_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Sean', 'Chanpisey', 1, '09845678640', 1, 1, '2023-08-23 07:38:19', '2023-08-23 08:51:58'),
(2, 'Seng', 'Toma', 1, '0976352454', 2, 1, '2023-08-23 09:42:49', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

DROP TABLE IF EXISTS `teachers`;
CREATE TABLE IF NOT EXISTS `teachers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `gender` int NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `gmail` varchar(100) NOT NULL,
  `course_id` int NOT NULL,
  `status` int DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `first_name`, `last_name`, `gender`, `phone_number`, `gmail`, `course_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Chin', 'Kosal', 1, '0887632564', 'kosal@gmail.com', 3, 1, '2023-08-19 04:16:27', '2023-08-23 07:58:03'),
(2, 'Proung', 'Manet', 2, '0974527464', 'manet@gmail.com', 2, 1, '2023-08-19 04:17:00', '2023-08-23 07:58:37'),
(3, 'Layla', 'Channa', 2, '0886253725', 'channa@gmail.com', 1, 1, '2023-08-22 16:09:10', '2023-08-23 07:58:56'),
(4, 'Hong', 'Taiker', 1, '0973452323', 'taiker@gmail.com', 4, 1, '2023-08-23 07:48:41', '2023-08-23 07:59:16'),
(5, 'Hala', 'Marahtah', 1, '01245678637', 'marahtah@gmail.com', 6, 1, '2023-08-23 08:39:55', '2023-08-23 08:40:23'),
(6, 'Hy', 'Chanra', 1, '0972356636', 'chanra@gmail.com', 5, 1, '2023-08-23 08:41:10', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `gmail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int NOT NULL DEFAULT '0',
  `status` int NOT NULL DEFAULT '1',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `gmail`, `password`, `role`, `status`, `create_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@gmail.com', '$2y$10$oSTn1TX8VSk.ZOcUI2u.7.ceGJZ/8/bNerHAqPdfaQL/D/mCbrZm2', 1, 1, '2023-08-17 16:32:13', '2023-08-17 16:42:16'),
(2, 'user', 'user@gmail.com', '$2y$10$DdinmIcT.Xi2pME2AK3HguyQ32hB2F7NEYz8BooKdgT1LsYFAyWya', 0, 0, '2023-08-19 11:22:32', '2023-08-19 11:25:38');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
