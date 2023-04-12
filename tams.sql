-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2023 at 05:19 AM
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
(25, 'Jaydee', '', 'Ballaho', 'jaydee@wmsu.edu.ph', 'jaydee', 'jaydee', 'Computer Science', 'faculty', '2023-03-10 16:55:53', '2023-04-08 23:39:28'),
(34, 'Jason', '', 'Catadman', 'ndksndksn@wmsu.edu.ph', 'jason', 'jason', 'Information Technology', 'faculty', '2023-03-25 03:53:59', '2023-04-04 01:41:40'),
(35, 'Lucy', 'Felix', 'Sadiwa', 'Lucy@wmsu.edu.ph', 'lucy', 'lucy', 'Computer Science', 'faculty', '2023-04-09 06:58:43', '2023-04-09 06:58:43'),
(37, 'Edwin', '', 'Arip', 'edwin@wmsu.edu.ph', 'edwin', 'edwin', 'Computer Science', 'faculty', '2023-04-09 14:25:30', '2023-04-09 14:25:30'),
(38, 'Pauleen', '', 'Gregana', 'pauleen@wmsu.edu.ph', 'Pauleen', 'pauleen', 'Information Technolgy', 'faculty', '2023-04-09 14:27:33', '2023-04-09 14:27:33');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `group_number` int(11) NOT NULL,
  `curriculum` varchar(255) NOT NULL,
  `adviser_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `group_number`, `curriculum`, `adviser_id`) VALUES
(37, 1, 'BSCS', 25),
(38, 2, 'BSCS', 35),
(39, 3, 'BSCS', 37),
(41, 2, 'BSIT', 38),
(42, 3, 'BSIT', 38),
(43, 1, 'BSIT', 34),
(44, 4, 'BSCS', 25),
(45, 4, 'BSIT', 34);

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
  `title1_adviser_file` varchar(255) DEFAULT NULL,
  `lock1` tinyint(1) DEFAULT NULL,
  `title2` varchar(255) DEFAULT NULL,
  `title2_file` varchar(255) DEFAULT NULL,
  `title2_comment` varchar(255) DEFAULT NULL,
  `title2_adviser_file` varchar(255) DEFAULT NULL,
  `lock2` tinyint(1) DEFAULT NULL,
  `title3` varchar(255) DEFAULT NULL,
  `title3_file` varchar(255) DEFAULT NULL,
  `title3_comment` varchar(255) DEFAULT NULL,
  `title3_adviser_file` varchar(255) NOT NULL,
  `lock3` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `group_files`
--

INSERT INTO `group_files` (`id`, `group_id`, `group_num`, `title1`, `title1_file`, `title1_comment`, `title1_adviser_file`, `lock1`, `title2`, `title2_file`, `title2_comment`, `title2_adviser_file`, `lock2`, `title3`, `title3_file`, `title3_comment`, `title3_adviser_file`, `lock3`) VALUES
(30, 37, 1, 'title1', 'Doc1.docx', 'please do this format', 'Name.docx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0),
(31, 38, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0),
(32, 39, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0),
(34, 41, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0),
(35, 42, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0),
(36, 43, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0),
(37, 44, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0),
(38, 45, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0);

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
(115, 'Christian', '', 'Fernandez', 'yan', 'yan@wmsu.edu.ph', 'yan', 'student', 'BSCS', '3-A', 'First Semester', '2022-2023', 'Jaydee Ballaho', 1, '2023-04-11 16:28:57', '2023-04-11 16:28:57'),
(116, 'Bernard', '', 'Sanson', 'nard ', 'nard@wmsu.edu.ph', 'nard', 'student', 'BSCS', '3-C', 'First Semester', '2022-2023', 'Jaydee Ballaho', 1, '2023-04-11 16:33:31', '2023-04-11 16:36:08'),
(118, 'Joshua', '', 'Bada', 'josh', 'josh@wmsu.edu.ph', 'josh', 'student', 'BSCS', '3-A', 'First Semester', '2022-2023', 'Jaydee Ballaho', 1, '2023-04-11 16:34:52', '2023-04-11 16:34:52'),
(119, 'Lowey', 'G', 'Ecat', 'lowey', 'lowey@wmsu.edu.ph', 'lowey', 'student', 'BSIT', '3-A', 'First Semester', '2022-2023', 'Jason Catadman', 1, '2023-04-11 16:35:40', '2023-04-11 16:35:59'),
(120, 'Marvin', 'Bercero', 'Waro', 'Marvin', 'marvin@wmsu.edu.ph', 'marvin', 'student', 'BSIT', '3-B', 'First Semester', '2022-2023', 'Jason Catadman', 1, '2023-04-11 16:45:22', '2023-04-11 16:45:22'),
(121, 'John', 'Connor', 'Mesa', 'john', 'john@wmsu.edu.ph', 'john', 'student', 'BSIT', '3-C', 'First Semester', '2022-2023', 'Jason Catadman', 1, '2023-04-11 16:46:42', '2023-04-11 16:46:42'),
(122, 'Faye', '', 'Lacsi', 'faye', 'faye@wmsu.edu.ph', 'faye', 'student', 'BSCS', '4-A', 'First Semester', '2022-2023', 'Lucy Sadiwa', 2, '2023-04-11 16:48:47', '2023-04-11 16:48:47'),
(123, 'Jenny Babe', '', 'Samson', 'Jenny', 'jenny@wmsu.edu.ph', 'jenny', 'student', 'BSCS', '3-B', 'First Semester', '2022-2023', 'Lucy Sadiwa', 2, '2023-04-11 16:49:48', '2023-04-11 16:49:48'),
(124, 'Avon', '', 'Alcontin', 'avon', 'avon@wmsu.edu.ph', 'avon', 'student', 'BSCS', '3-A', 'First Semester', '2022-2023', 'Lucy Sadiwa', 2, '2023-04-11 16:50:57', '2023-04-11 16:50:57'),
(125, 'Xela', '', 'Silorio', 'xela', 'Xela@wmsu.edu.ph', 'xela', 'student', 'BSIT', '3-A', 'First Semester', '2022-2023', 'Pauleen Gregana', 2, '2023-04-11 16:51:52', '2023-04-11 17:09:36'),
(126, 'Chriz', '', 'Mamugos', 'chriz', 'chriz@wmsu.edu.ph', 'chriz', 'student', 'BSIT', '4-B', 'First Semester', '2022-2023', 'Pauleen Gregana', 2, '2023-04-11 16:55:02', '2023-04-11 16:55:02'),
(127, 'Kenneth', '', 'Tan', 'ken', 'ken@wmsu.edu.ph', 'ken', 'student', 'BSIT', '3-A', 'First Semester', '2022-2023', 'Pauleen Gregana', 2, '2023-04-11 17:11:17', '2023-04-11 17:11:17'),
(128, 'Hannah', '', 'Mae', 'hannah', 'hannah@wmsu.edu.ph', 'hannah', 'student', 'BSIT', '3-C', 'First Semester', '2022-2023', 'Pauleen Gregana', 3, '2023-04-11 23:57:19', '2023-04-12 00:19:42'),
(129, 'Dana', '', 'Anastacio', 'Dana', 'dana@wmsu.edu.ph', 'dana', 'student', 'BSIT', '4-A', 'First Semester', '2022-2023', 'Pauleen Gregana', 3, '2023-04-12 00:17:41', '2023-04-12 00:17:41'),
(130, 'Reniel', '', 'Alfaro', 'ren', 'ren@wmsu.edu.ph', 'ren', 'student', 'BSIT', '3-B', 'First Semester', '2022-2023', 'Pauleen Gregana', 3, '2023-04-12 00:18:15', '2023-04-12 00:18:15'),
(131, 'Erven', '', 'Idjad', 'erven', 'erven@wmsu.edu.ph', 'erven', 'student', 'BSCS', '3-B', 'First Semester', '2022-2023', 'Edwin Arip', 3, '2023-04-12 00:28:48', '2023-04-12 00:28:48'),
(132, 'Alsibar', '', 'Ahmad', 'sibar', 'sibar@wmsu.edu.ph', 'sibar', 'student', 'BSCS', '4-A', 'First Semester', '2022-2023', 'Edwin Arip', 3, '2023-04-12 00:29:37', '2023-04-12 00:29:37'),
(133, 'Athram', '', 'Igasan', 'athram', 'athram@wmsu.edu.ph', 'athram', 'student', 'BSCS', '3-C', 'First Semester', '2022-2023', 'Edwin Arip', 3, '2023-04-12 00:31:02', '2023-04-12 00:31:02');

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
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_number` (`group_number`),
  ADD KEY `adviser` (`adviser_id`);

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
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `group_files`
--
ALTER TABLE `group_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

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
-- Constraints for table `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `adviser` FOREIGN KEY (`adviser_id`) REFERENCES `faculty` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `group_files`
--
ALTER TABLE `group_files`
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
