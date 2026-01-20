-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2026 at 10:49 PM
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
(19, 'Ibnat Rahman', NULL, 'Bangladesh Awami League ', NULL, NULL, NULL),
(20, 'Md Nazmul Islam Sifat', NULL, 'National Citizen Party', NULL, NULL, NULL),
(21, 'Kaosar Alam', NULL, 'Jamaat E Islam Bangladesh', NULL, NULL, NULL),
(29, 'Adhora Islam', NULL, 'Bangladesh Islamic Andolon', NULL, NULL, NULL);

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
(32, '802286', 'Nazmul Islam Sifat', '01640521788', '12345678910', 'dhaka', 'dhanmondi', '2026-01-19 15:10:30', 1),
(33, '910001', 'Dummy Voter 1', '01710000001', '198765432101', 'dhaka', 'mirpur', '2026-01-19 15:33:49', 0),
(34, '910002', 'Dummy Voter 2', '01710000002', '198765432102', 'dhaka', 'uttara', '2026-01-19 15:33:49', 0),
(35, '910003', 'Dummy Voter 3', '01710000003', '198765432103', 'dhaka', 'dhanmondi', '2026-01-19 15:33:49', 0),
(36, '910004', 'Dummy Voter 4', '01710000004', '198765432104', 'chattogram', 'kotwali', '2026-01-19 15:33:49', 1),
(37, '910005', 'Dummy Voter 5', '01710000005', '198765432105', 'chattogram', 'pahartali', '2026-01-19 15:33:49', 0),
(38, '910006', 'Dummy Voter 6', '01710000006', '198765432106', 'rajshahi', 'boalia', '2026-01-19 15:33:49', 0),
(39, '910007', 'Dummy Voter 7', '01710000007', '198765432107', 'khulna', 'sonadanga', '2026-01-19 15:33:49', 1),
(40, '910008', 'Dummy Voter 8', '01710000008', '198765432108', 'sylhet', 'beanibazar', '2026-01-19 15:33:49', 1),
(41, '910009', 'Dummy Voter 9', '01710000009', '198765432109', 'barishal', 'bakerganj', '2026-01-19 15:33:49', 0),
(42, '910010', 'Dummy Voter 10', '01710000010', '198765432110', 'rangpur', 'gangachara', '2026-01-19 15:33:49', 1),
(43, '879603', 'তাওহীদুর রহমান', '01982074956', '2121212121', 'dhaka', 'dhanmondi', '2026-01-20 18:08:48', 1),
(44, '295521', 'Anamika ', '01982074956', '2323232323', 'dhaka', 'gulshan', '2026-01-20 18:34:41', 1),
(45, '427143', 'Anamika ', '01982074956', '4545454545', 'chittagong', 'pahartali', '2026-01-20 18:37:53', 1);

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
(5, '32', 19, '2026-01-19 15:18:05'),
(6, '38', 19, '2026-01-19 17:54:46'),
(9, '42', 20, '2026-01-19 18:59:00'),
(10, '40', 21, '2026-01-19 18:59:59'),
(11, '39', 19, '2026-01-19 19:00:23'),
(18, '36', 20, '2026-01-19 19:06:18'),
(22, '43', 19, '2026-01-20 18:22:44'),
(23, '44', 20, '2026-01-20 18:36:59'),
(24, '45', 20, '2026-01-20 18:38:17');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `voters`
--
ALTER TABLE `voters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
