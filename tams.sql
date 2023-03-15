-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2023 at 04:41 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tams`
--

-- --------------------------------------------------------

--
-- Table structure for table `archive`
--

CREATE TABLE `archive` (
  `id` int(11) NOT NULL,
  `titles` varchar(150) NOT NULL,
  `department` varchar(100) NOT NULL,
  `section` varchar(10) NOT NULL,
  `date_of_upload` date NOT NULL,
  `sem` varchar(100) NOT NULL,
  `grade` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `archive`
--

INSERT INTO `archive` (`id`, `titles`, `department`, `section`, `date_of_upload`, `sem`, `grade`, `created_at`, `updated_at`) VALUES
(1, 'Turtle and the Mokey', 'BSCS', 'A', '2023-02-23', 'First Semester', '89%', '2023-02-25 07:13:01', '2023-02-25 07:13:01');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `firstname`, `middle_name`, `lastname`, `email`, `username`, `password`, `department`, `type`, `created_at`, `updated_at`) VALUES
(25, 'Jaydee', '', 'Ballaho', 'jaydee@wmsu.edu.ph', 'jaydee', 'jaydee', 'Computer Science', 'faculty', '2023-03-10 16:55:53', '2023-03-10 16:55:53'),
(26, 'Lucy Felix', '', 'Sadiwa', 'lucy@wmsu.edu.ph', 'lucy', 'lucy', 'Computer Science', 'faculty', '2023-03-11 07:36:13', '2023-03-11 07:36:13'),
(30, 'Edwin', '', 'Arip', 'edwin@wmsu.edu.ph', 'Edwin09', 'edwin', 'Information Technolgy', 'faculty', '2023-03-14 04:49:48', '2023-03-14 04:50:23'),
(33, 'Mara Marie', '', 'Liao', 'xt202002177@wmsu.edu.ph', 'Mara09', 'mara', 'Computer Science', 'faculty', '2023-03-15 00:02:21', '2023-03-15 00:02:21');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(100) NOT NULL,
  `course` varchar(100) NOT NULL,
  `year_and_section` varchar(20) NOT NULL,
  `sem` varchar(100) NOT NULL,
  `school_year` varchar(50) NOT NULL,
  `your_adviser` varchar(100) NOT NULL,
  `your_group` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `firstname`, `middle_name`, `lastname`, `username`, `email`, `password`, `type`, `course`, `year_and_section`, `sem`, `school_year`, `your_adviser`, `your_group`, `created_at`, `updated_at`) VALUES
(54, 'Roselyn', '', 'Tarroza', 'rose', 'rose@wmsu.edu.ph', 'rose', 'student', 'BSCS', '4-B', 'Second Semester', '2022-2023', 'Marjorie Rojas', 1, '2023-03-11 07:49:45', '2023-03-14 07:16:22'),
(58, 'Marvs', 'B.', 'Warop', 'marvin', 'marvin@wmsu.edu.ph', 'wewewe', 'student', 'None', 'None', 'None', '2022-2023', 'None', 0, '2023-03-11 16:00:13', '2023-03-14 07:01:26'),
(60, 'bernard', '', 'samson', 'nard', 'nard@wmsu.edu.ph', 'nard', 'student', 'BSIT', '3-C', 'Second Semester', '2022-2023', 'Marjorie Rojas', 1, '2023-03-11 21:14:40', '2023-03-14 05:59:02'),
(61, 'Rudy', 'G.', 'Samson', 'nard', 'nard@wmsu.edu.ph', 'lowey', 'student', 'BSIT', '3-A', 'First Semester', '2022-2023', 'Marjorie Rojas', 1, '2023-03-11 21:21:51', '2023-03-11 21:23:59'),
(62, 'Marvin', 'Bercero', 'Waro', 'marvin', 'marvin@wmsu.edu.ph', 'marvin', 'student', 'BSIT', '3-B', 'First Semester', '2022-2023', 'Jaydee Ballaho', 1, '2023-03-11 21:25:37', '2023-03-11 21:25:37'),
(65, 'Al-sibar', '', 'Ahmad', 'sibar', 'sibar@wmsu.edu.ph', 'sibar', 'student', 'BSIT', '4-A', 'First_sem', '2022-2023', 'Marjorie Rojas', 1, '2023-03-11 21:36:09', '2023-03-11 21:36:09'),
(66, 'Bernarda', '', 'Samson', 'bern', 'bern@wmsu.edu.ph', 'bern', 'student', 'BSIT', '3-B', 'Second Semester', '2022-2023', 'Jaydee Ballaho', 1, '2023-03-11 21:47:03', '2023-03-11 21:47:03'),
(72, 'Ralph', 'Espina', 'Clemente', 'Ralph', 'ralph@wmsu.edu.ph', 'ralph', 'student', 'BSCS', '3-B', 'Second Semester', '2022-2023', 'Marjorie Rojas', 1, '2023-03-14 07:17:22', '2023-03-14 07:17:22'),
(73, 'Mary', 'B', 'Mendeja', 'Mary', 'Mary@wmsu.edu.ph', 'wewe', 'student', 'BSIT', '3-A', 'First Semester', '2022-2023', 'Jaydee Ballaho', 1, '2023-03-14 07:19:50', '2023-03-14 07:19:50'),
(74, 'Hannah', 'Mae', 'Waro', 'hannah', 'hannah@wmsu.edu.ph', 'hannah', 'student', 'BSIT', '3-A', 'First Semester', '2022-2023', 'Jaydee Ballaho', 1, '2023-03-14 07:22:10', '2023-03-14 07:22:10'),
(75, 'Bin-Baz', '', 'Akilan', 'bin', 'bin@wmsu.edu.ph', 'bin', 'student', 'BSCS', '3-A', 'First Semester', '2022-2023', 'Marjorie Rojas', 1, '2023-03-14 07:25:05', '2023-03-14 08:07:36'),
(76, 'Jean', 'Silorio', 'Ragdi', 'jean123', 'jean@wmsu.edu.ph', 'jean', 'student', 'BSCS', '3-A', 'First Semester', '2022-2023', 'Marjorie Rojas', 1, '2023-03-14 08:13:55', '2023-03-14 08:14:33'),
(78, 'Kent', '', 'Sultan', 'kent123', 'xt202002177@wmsu.edu.ph', 'kent', 'student', 'BSIT', '4-A', 'Second Semester', '2022-2023', 'Jaydee Ballaho', 1, '2023-03-14 10:33:45', '2023-03-14 10:33:45'),
(79, 'Rudy', 'oliver', 'Ibgos', 'admin', 'rudy@wmsu.edu.ph', 'we', 'student', 'BSCS', '3-B', 'Second Semester', '2022-2023', 'Jaydee Ballaho', 1, '2023-03-14 10:50:32', '2023-03-14 10:50:32'),
(80, 'Roselyn', 'Babe', 'Kenneth', 'Jenny', 'edwin@wmsu.edu.ph', 'erererer', 'student', 'BSIT', '4-A', 'Second Semester', '2022-2023', 'Marjorie Rojas', 1, '2023-03-14 10:55:26', '2023-03-14 10:55:26');

-- --------------------------------------------------------

--
-- Table structure for table `useraccounts`
--

CREATE TABLE `useraccounts` (
  `id` int(15) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(155) NOT NULL,
  `password` varchar(155) NOT NULL,
  `type` varchar(155) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `useraccounts`
--

INSERT INTO `useraccounts` (`id`, `firstname`, `lastname`, `username`, `password`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin', 'admin', 'admin', 'admin', '2023-02-08 11:01:59', '2023-02-09 16:57:23'),
(3, 'faculty', 'faculty', 'faculty', 'faculty', 'faculty', '2023-02-12 15:48:45', '2023-02-12 15:48:45'),
(4, 'student', 'ako', 'student', 'student', 'student', '2023-02-12 15:49:15', '2023-02-12 15:49:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `archive`
--
ALTER TABLE `archive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `useraccounts`
--
ALTER TABLE `useraccounts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `archive`
--
ALTER TABLE `archive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `useraccounts`
--
ALTER TABLE `useraccounts`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
