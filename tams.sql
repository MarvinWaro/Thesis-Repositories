-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2023 at 03:35 AM
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
(14, 'Jaydee', '', 'Ballaho', 'jaydee@css.com', 'jaydee', 'jaydee', 'BSIT', 'faculty', '2023-02-07 14:42:59', '2023-02-07 14:42:59'),
(16, 'Lucy Felix', '', 'Sadiwa', 'lucy@wmsu.ccs', 'Lucy', 'lucy', 'BSIT', 'faculty', '2023-02-09 06:40:27', '2023-02-09 06:40:27'),
(17, 'Marjorie', '', 'Rojas', 'marjorie@wmsu.css', 'marjorie', 'marjorie', 'BSCS', 'faculty', '2023-02-09 06:47:28', '2023-02-09 06:47:28'),
(20, 'Edwin', '', 'Arip', 'edwin@wmsu.ccs', 'edwin', 'edwin', 'BSIT', 'faculty', '2023-02-15 23:10:37', '2023-02-15 23:10:37');

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
  `year_level` varchar(100) NOT NULL,
  `section` varchar(10) NOT NULL,
  `sem` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `firstname`, `middle_name`, `lastname`, `username`, `email`, `password`, `type`, `course`, `year_level`, `section`, `sem`, `created_at`, `updated_at`) VALUES
(20, 'Christian', '', 'Fernandez', 'chris', 'christian@wmsu.ccs', 'chris', 'student', 'BSIT', '3rd Year', 'B', 'First Semester', '2023-02-07 23:58:39', '2023-02-07 23:58:39'),
(21, 'Marvin', '', 'Waro', 'marvin', 'marvin@wmsu.ccs', 'marvin', 'student', 'BSIT', '3rd Year', 'B', 'First Semester', '2023-02-07 23:59:19', '2023-02-07 23:59:19'),
(22, 'Faye', '', 'Lacsi', 'faye', 'faye@wmsu.ccs', 'faye', 'student', 'BSCS', '3rd Year', 'A', 'Second Semester', '2023-02-07 23:59:55', '2023-02-07 23:59:55'),
(24, 'Robin', '', 'Almorfi', 'robin', 'robin@wmsu.ccs', 'robin', 'student', 'BSCS', '4th Year', 'A', 'First Semester', '2023-02-08 00:01:34', '2023-02-08 00:01:34'),
(25, 'Xela', '', 'Silorio', 'xela', 'xela@wmsu.ccs', 'xela', 'student', 'BSIT', 'none', 'B', 'Second Semester', '2023-02-09 06:49:48', '2023-02-09 06:49:48'),
(27, 'Bin-Baz', '', 'Akilan', 'binbaz', 'bin@ccs.com', 'binbaz', 'student', 'BSCS', '3rd Year', 'B', 'Second Semester', '2023-02-11 23:11:22', '2023-02-11 23:11:22'),
(30, 'Avon', 'Bongato', 'Alcontin', 'avon', 'avon@wmsu.ccs', 'avon', 'student', 'BSIT', '4th Year', 'A', 'Second Semester', '2023-02-12 08:42:24', '2023-02-12 08:42:24'),
(31, 'Bernard', '', 'Sanson', 'bern', 'bern@wmsu.ccs', 'bern', 'student', 'BSIT', '3rd Year', 'A', 'Second Semester', '2023-02-12 09:00:28', '2023-02-12 09:00:28'),
(32, 'Mark', '', 'Bryan', 'mark', 'mark@wmsu.ccs', 'mark', 'student', 'BSIT', '3rd Year', 'B', 'First Semester', '2023-02-15 21:47:11', '2023-02-15 22:16:52'),
(33, 'John Connor', 'Jalmaani', 'Mesa', 'connor', 'connor@wmsu.css', 'connor', 'student', 'BSIT', '4th_year', 'C', 'none', '2023-02-15 23:37:46', '2023-02-15 23:37:46'),
(34, 'Dave', 'Lacastesantos', 'Dinglasa', 'dave', 'dave@wmsu.ccs', 'dave', 'student', 'BSCS', '3rd Year', 'A', 'First Semester', '2023-02-15 23:38:46', '2023-02-15 23:38:46');

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
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `useraccounts`
--
ALTER TABLE `useraccounts`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
