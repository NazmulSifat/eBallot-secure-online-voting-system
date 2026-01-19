-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2026 at 03:44 PM
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
-- Database: `voting_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` int(11) NOT NULL,
  `candidate_name` varchar(100) DEFAULT NULL,
  `ballot_number` varchar(20) DEFAULT NULL,
  `party_name` varchar(100) DEFAULT NULL,
  `symbol` varchar(255) DEFAULT NULL,
  `zilla` varchar(50) DEFAULT NULL,
  `upazila` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `candidate_name`, `ballot_number`, `party_name`, `symbol`, `zilla`, `upazila`) VALUES
(6, 'Kaosar Alam', NULL, 'Bangladesh Awami League ', NULL, NULL, NULL),
(8, 'Ibnat Rahman', NULL, 'Jamaat E Islam Bangladesh', NULL, NULL, NULL),
(9, 'Adhora Islam', NULL, 'Bangladesh Islamic Andolon', NULL, NULL, NULL),
(12, 'Md Nazmul Islam Sifat', NULL, 'BNP', NULL, NULL, NULL),
(16, 'Ibnat Rahman', NULL, 'National Citizen Party', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `result_settings`
--

CREATE TABLE `result_settings` (
  `id` int(11) NOT NULL,
  `published` enum('YES','NO') DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `result_settings`
--

INSERT INTO `result_settings` (`id`, `published`) VALUES
(1, 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE `voters` (
  `id` int(11) NOT NULL,
  `voter_id` varchar(30) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `nid` varchar(17) NOT NULL,
  `zilla` varchar(50) NOT NULL,
  `upazila` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `has_voted` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`id`, `voter_id`, `name`, `phone`, `nid`, `zilla`, `upazila`, `created_at`, `has_voted`) VALUES
(18, '000001', 'Rahim Uddin', '01711111111', '1234567890', 'dhaka', 'dhanmondi', '2026-01-13 18:13:11', 0),
(19, '000002', 'Karim Ali', '01822222222', '1234567891', 'dhaka', 'mirpur', '2026-01-13 18:13:11', 0),
(20, '000003', 'Salma Akter', '01933333333', '1234567892', 'chittagong', 'pahartali', '2026-01-13 18:13:11', 0),
(21, '153967', 'MINHAJUL ISLAM', '01982074956', '69120371472', 'dhaka', 'dhanmondi', '2026-01-13 18:34:31', 1),
(22, '705861', 'Myesha mahzabin', '01640521788', '10252426151', 'dhaka', 'mirpur', '2026-01-13 18:36:32', 0),
(23, '713001', 'IMAD UDDIN ', '01523242456', '852111852111', 'dhaka', 'mirpur', '2026-01-15 19:16:41', 0),
(24, '965588', 'kamrul islam ', '01325454578', '987987987987', 'dhaka', 'mirpur', '2026-01-16 16:17:18', 0),
(25, '991990', 'hasina', '01640521788', '454565654565', 'dhaka', 'gulshan', '2026-01-17 09:00:04', 0),
(26, '696065', 'MINHAJUL ISLAM', '01982074956', '654568584564', 'dhaka', 'dhanmondi', '2026-01-17 09:56:38', 0),
(27, '270981', 'Sifat ', '01982074956', '523435606543', 'dhaka', 'dhanmondi', '2026-01-17 10:00:27', 0),
(28, '296262', 'Sifat ', '01982074956', '3456786234567', 'dhaka', 'dhanmondi', '2026-01-17 10:06:42', 0),
(29, '037563', 'Sifat ', '01640521788', '5246462841233', 'chittagong', 'hathazari', '2026-01-17 10:12:55', 0),
(30, '870835', '8775 Nazmul Islam Sifat', '01982074956', '4263426426', 'chittagong', 'pahartali', '2026-01-17 11:27:17', 1),
(31, '448978', 'imad', '01719909053', '5252525252', 'dhaka', 'dhanmondi', '2026-01-17 13:03:05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` int(11) NOT NULL,
  `voter_id` varchar(50) DEFAULT NULL,
  `candidate_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`id`, `voter_id`, `candidate_id`, `created_at`) VALUES
(2, '30', 5, '2026-01-17 11:34:46'),
(3, '21', 8, '2026-01-17 12:06:29'),
(4, '31', 13, '2026-01-17 13:04:01');

-- --------------------------------------------------------

--
-- Table structure for table `voting_settings`
--

CREATE TABLE `voting_settings` (
  `id` int(11) NOT NULL,
  `status` enum('on','off') DEFAULT 'off',
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `voting_settings`
--

INSERT INTO `voting_settings` (`id`, `status`, `start_time`, `end_time`) VALUES
(1, 'on', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result_settings`
--
ALTER TABLE `result_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voters`
--
ALTER TABLE `voters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `voter_id` (`voter_id`),
  ADD UNIQUE KEY `nid` (`nid`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `voter_id` (`voter_id`),
  ADD UNIQUE KEY `voter_id_2` (`voter_id`),
  ADD UNIQUE KEY `voter_id_3` (`voter_id`);

--
-- Indexes for table `voting_settings`
--
ALTER TABLE `voting_settings`
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
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `voters`
--
ALTER TABLE `voters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
