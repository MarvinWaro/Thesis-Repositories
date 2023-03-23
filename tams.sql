-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2023 at 09:45 PM
-- Server version: 10.4.21-MariaDB
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
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `group_number` int(11) NOT NULL,
  `curriculum` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `group_number`, `curriculum`) VALUES
(21, 1, 'BSCS'),
(22, 1, 'BSIT'),
(23, 2, 'BSCS'),
(24, 2, 'BSIT');

-- --------------------------------------------------------

--
-- Table structure for table `group_files`
--

CREATE TABLE `group_files` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `group_num` int(11) NOT NULL,
  `title1` varchar(255) DEFAULT NULL,
  `title1_file` varchar(255) DEFAULT NULL,
  `title1_comment` varchar(255) DEFAULT NULL,
  `title2` varchar(255) DEFAULT NULL,
  `title2_file` varchar(255) DEFAULT NULL,
  `title2_comment` varchar(255) DEFAULT NULL,
  `title3` varchar(255) DEFAULT NULL,
  `title3_file` varchar(255) DEFAULT NULL,
  `title3_comment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `group_files`
--

INSERT INTO `group_files` (`id`, `group_id`, `group_num`, `title1`, `title1_file`, `title1_comment`, `title2`, `title2_file`, `title2_comment`, `title3`, `title3_file`, `title3_comment`) VALUES
(15, 21, 1, 'GameDev', 'FinalExcuse (1).docx', 'Game Dev too Overrated!', NULL, NULL, NULL, NULL, NULL, NULL),
(16, 22, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 23, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 24, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
(89, 'John', 'D', 'Doe', 'johndoe123', 'john.doe@wmsu.edu.ph', '1234', 'student', 'BSCS', '4-A', 'Second Semester', '2022-2023', 'Jaydee Ballaho', 1, '2023-03-20 12:28:17', '2023-03-21 19:49:29'),
(90, 'Jane', '', 'Doe', 'janedoe123', 'jane.doe@wmsu.edu.ph', '1234', 'student', 'BSCS', '4-A', 'First Semester', '2022-2023', 'Jaydee Ballaho', 1, '2023-03-21 20:36:15', '2023-03-21 20:36:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_files`
--

CREATE TABLE `tbl_files` (
  `id` int(255) NOT NULL,
  `name_file` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL,
  `date_uploaded` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_files`
--

INSERT INTO `tbl_files` (`id`, `name_file`, `document`, `date_uploaded`) VALUES
(10, 'Yan File', 'Waro_Laboratory_Midterm_Project.pdf', 'March-16-2023'),
(11, 'Waro', 'Waro_Activity 1.docx', 'March-16-2023'),
(12, 'Marvinty', 'Waro_Activity 2.5.docx', 'March-16-2023'),
(13, 'we', 'Waro_Activity 3.3.pdf', 'March-16-2023'),
(14, 'we', 'Waro_Activity 3.3.pdf', 'March-16-2023'),
(15, 'po', 'Waro_Activity 1.pdf', 'March-16-2023'),
(16, 'png', 'Waro_Activity 3.pdf', 'March-16-2023'),
(17, 'ty', 'Waro_Activity 2.3.pdf', 'March-16-2023'),
(18, 'yuo', 'Module 7 - Lists in Python.pdf', 'March-16-2023'),
(19, 'Another File', 'LECTURE-IN-P.E.-4-RECREATIONAL-ACTIVITIES.pdf', 'March-16-2023');

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
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_number` (`group_number`);

--
-- Indexes for table `group_files`
--
ALTER TABLE `group_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `groups` (`group_id`),
  ADD KEY `groupnum` (`group_num`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stud_group` (`your_group`);

--
-- Indexes for table `tbl_files`
--
ALTER TABLE `tbl_files`
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
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `group_files`
--
ALTER TABLE `group_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `tbl_files`
--
ALTER TABLE `tbl_files`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `useraccounts`
--
ALTER TABLE `useraccounts`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `group_files`
--
ALTER TABLE `group_files`
  ADD CONSTRAINT `groupnum` FOREIGN KEY (`group_num`) REFERENCES `groups` (`group_number`),
  ADD CONSTRAINT `groups` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `stud_group` FOREIGN KEY (`your_group`) REFERENCES `groups` (`group_number`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
