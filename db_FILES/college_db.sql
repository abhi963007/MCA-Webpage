-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2025 at 05:20 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `college_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`, `created_at`) VALUES
(1, 'admin', 'admin123', 'admin@example.com', '2024-12-18 15:38:18');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `duration` varchar(50) NOT NULL,
  `fees` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `semester` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `description`, `duration`, `fees`, `created_at`, `updated_at`, `semester`) VALUES
(4, 'Computer Organization and Architecture', 'Study of computer hardware and architecture', '6 months', '10000', '2025-01-07 18:19:27', '2025-01-07 18:19:27', 1),
(5, 'Programming in C', 'Introduction to C programming', '6 months', '10000', '2025-01-07 18:19:27', '2025-01-07 18:19:27', 1),
(6, 'Database Management Systems', 'Database concepts and SQL', '6 months', '10000', '2025-01-07 18:19:27', '2025-01-07 18:19:27', 1),
(7, 'Operating Systems', 'OS concepts and management', '6 months', '10000', '2025-01-07 18:19:27', '2025-01-07 18:19:27', 1),
(8, 'Object-Oriented Programming in Java', 'Java programming concepts', '6 months', '12000', '2025-01-07 18:19:27', '2025-01-07 18:19:27', 2),
(9, 'Data Structures', 'Advanced data structures implementation', '6 months', '12000', '2025-01-07 18:19:27', '2025-01-07 18:19:27', 2),
(10, 'Computer Networks', 'Network protocols and architecture', '6 months', '12000', '2025-01-07 18:19:27', '2025-01-07 18:19:27', 2),
(11, 'Software Engineering', 'Software development lifecycle', '6 months', '12000', '2025-01-07 18:19:27', '2025-01-07 18:19:27', 2),
(12, 'Web Programming', 'Web development technologies', '6 months', '12000', '2025-01-07 18:19:27', '2025-01-07 18:19:27', 2),
(13, 'Data Science & Machine Learning', 'Introduction to data science', '6 months', '15000', '2025-01-07 18:19:27', '2025-01-07 18:19:27', 3),
(14, 'Design & Analysis of Algorithms', 'Algorithm design techniques', '6 months', '15000', '2025-01-07 18:19:27', '2025-01-07 18:19:27', 3),
(15, 'Operations Research', 'Mathematical optimization', '6 months', '15000', '2025-01-07 18:19:27', '2025-01-07 18:19:27', 3),
(16, 'Cyber Security & Cryptography', 'Security concepts and implementation', '6 months', '15000', '2025-01-07 18:19:27', '2025-01-07 18:19:27', 3),
(17, 'Cloud Computing', 'Cloud services and deployment', '6 months', '15000', '2025-01-07 18:19:27', '2025-01-07 18:19:27', 3),
(18, 'Seminar', 'Research presentation', '2 months', '8000', '2025-01-07 18:19:27', '2025-01-07 18:19:27', 4),
(19, 'Main Project', 'Capstone project', '4 months', '20000', '2025-01-07 18:19:27', '2025-01-07 18:19:27', 4),
(20, 'Course Viva', 'Final examination', '1 month', '5000', '2025-01-07 18:19:27', '2025-01-07 18:19:27', 4);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `venue` varchar(255) NOT NULL,
  `event_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `image_path`, `venue`, `event_date`, `created_at`, `updated_at`) VALUES
(2, 'AI and Machine Learning Workshop', 'Hands-on workshop on AI and ML fundamentals', 'img/events/AI and Machine.webp', 'Computer Lab 1', '2024-01-15', '2024-12-18 18:31:30', '2024-12-18 18:42:24'),
(3, 'Cloud Computing Seminar', 'Expert talk on cloud technologies and their applications', 'img/events/cloud.jpg', 'Seminar Hall', '2024-01-20', '2024-12-18 18:31:30', '2024-12-18 18:42:45'),
(4, 'Cybersecurity Bootcamp', 'Intensive training on cybersecurity fundamentals', 'img/events/cyber.jpg', 'Computer Lab 2', '2024-01-25', '2024-12-18 18:31:30', '2024-12-18 18:42:33'),
(5, 'Web Development Hackathon', '24-hour coding challenge for web developers', 'img/events/frontend_webdeveloper.jpg', 'Main Hall', '2024-02-01', '2024-12-18 18:31:30', '2024-12-18 18:42:39'),
(6, 'Networking for Future Tech', 'Workshop on advanced networking concepts', 'img/events/network.jpg', 'Computer Lab 3', '2024-02-05', '2024-12-18 18:31:30', '2024-12-18 18:42:52');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `name`, `designation`, `department`, `email`, `image_path`, `created_at`, `updated_at`) VALUES
(5, 'Prof. Divya S.B', 'Head of Department', 'MCA', 'divya.sb@mangalam.edu.in', 'img/divya.jpg', '2024-12-18 18:07:40', '2024-12-18 18:07:40'),
(6, 'Prof. Eldhose Paul', 'Assistant Professor', 'MCA', 'eldhose.paul@mangalam.edu.in', 'img/eldho.jpg', '2024-12-18 18:07:40', '2024-12-18 18:07:40'),
(7, 'Prof. Ashwani Vijayachandran', 'Professor', 'MCA', 'ashwani.v@mangalam.edu.in', 'img/ashwani.jpg', '2024-12-18 18:07:40', '2024-12-18 18:07:40'),
(8, 'Prof. Banu Sumayya', 'Assistant Professor', 'MCA', 'banu.sumayya@mangalam.edu.in', 'img/banu.jpg', '2024-12-18 18:07:40', '2024-12-18 18:07:40'),
(9, 'Prof. Greeshmamol', 'Assistant Professor', 'MCA', 'greeshmamol@mangalam.edu.in', 'img/greeshma.jpg', '2024-12-18 18:07:40', '2024-12-18 18:07:40'),
(10, 'Prof. Kukkumol Thomas', 'Assistant Professor', 'MCA', 'kukkumol.thomas@mangalam.edu.in', 'img/kukku.jpg', '2024-12-18 18:07:40', '2024-12-18 18:07:40'),
(11, 'Prof. Nikhil T Das', 'Assistant Professor', 'MCA', 'nikhil.das@mangalam.edu.in', 'img/nikhil.jpg', '2024-12-18 18:07:40', '2024-12-18 18:07:40');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
