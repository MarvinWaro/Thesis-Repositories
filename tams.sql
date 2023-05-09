-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2023 at 03:53 AM
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
(35, 'Lucy', 'Felix', 'Sadiwa', 'Lucy@wmsu.edu.ph', 'lucy', 'lucy', 'Computer Science', 'faculty', '2023-04-09 06:58:43', '2023-05-08 18:52:41'),
(37, 'Edwin', '', 'Arip', 'edwin@wmsu.edu.ph', 'edwin', 'edwin', 'Computer Science', 'faculty', '2023-04-09 14:25:30', '2023-04-09 14:25:30'),
(38, 'Pauleen', '', 'Gregana', 'pauleen@wmsu.edu.ph', 'Pauleen', 'pauleen', 'Information Technolgy', 'faculty', '2023-04-09 14:27:33', '2023-04-09 14:27:33'),
(39, 'Gadmar', '', 'Belamide', 'edwin@wmsu.edu.ph', 'gadmar', 'gadmar', 'Computer Science', 'admin', '2023-04-09 14:25:30', '2023-04-09 14:25:30'),
(40, 'Marvic', '', 'Lines', 'marviclines@wmsu.edu.ph', 'marvic', 'marvic', 'Computer Science', 'faculty', '2023-05-04 15:09:54', '2023-05-04 15:09:54');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `group_number` int(11) NOT NULL,
  `curriculum` varchar(255) NOT NULL,
  `adviser_id` int(11) NOT NULL,
  `school_year` varchar(255) NOT NULL DEFAULT '2022-2023'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `group_number`, `curriculum`, `adviser_id`, `school_year`) VALUES
(48, 1, 'BSCS', 25, '2022-2023'),
(49, 1, 'BSIT', 34, '2022-2023'),
(50, 2, 'BSCS', 39, '2022-2023'),
(51, 1, 'BSIT', 38, '2023-2024');

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

-- --------------------------------------------------------

--
-- Table structure for table `group_panelists`
--

CREATE TABLE `group_panelists` (
  `id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `group_panelists`
--

INSERT INTO `group_panelists` (`id`, `faculty_id`, `group_id`) VALUES
(4, 25, 48),
(5, 35, 48),
(6, 40, 48),
(7, 34, 51),
(8, 35, 51),
(9, 37, 51);

-- --------------------------------------------------------

--
-- Table structure for table `group_titles`
--

CREATE TABLE `group_titles` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `group_number` int(11) NOT NULL,
  `title_number` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `file_upload_date` date DEFAULT NULL,
  `adviser_file` varchar(255) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `panel_comment` varchar(255) DEFAULT NULL,
  `is_locked` tinyint(1) NOT NULL DEFAULT 0,
  `status` varchar(255) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `group_titles`
--

INSERT INTO `group_titles` (`id`, `group_id`, `group_number`, `title_number`, `title`, `file`, `file_upload_date`, `adviser_file`, `comment`, `panel_comment`, `is_locked`, `status`) VALUES
(2, 48, 1, 1, 'GameDev', 'Test SE File.docx', '2023-04-28', '', 'Test', 'A', 1, 'Archived'),
(3, 48, 1, 2, 'WebDev', 'Test SE File.docx', '2023-04-28', '', 'Test2', 'B', 0, 'Rejected'),
(4, 48, 1, 3, 'DataScience', NULL, NULL, '', NULL, 'C', 0, 'Rejected'),
(5, 49, 1, 1, NULL, NULL, NULL, '', NULL, '', 0, 'Pending'),
(6, 49, 1, 2, NULL, NULL, NULL, '', NULL, '', 0, 'Pending'),
(7, 49, 1, 3, NULL, NULL, NULL, '', NULL, '', 0, 'Pending'),
(8, 50, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Pending'),
(9, 50, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Pending'),
(10, 50, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Pending'),
(11, 51, 1, 1, 'Predicting Student Fail Rate using Machine Learning', 'Transaction.docx', '2023-05-09', NULL, NULL, NULL, 1, 'Archived'),
(12, 51, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Rejected'),
(13, 51, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `proposed_titles`
--

CREATE TABLE `proposed_titles` (
  `id` int(11) NOT NULL,
  `group_titles_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `abstract` mediumtext DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `file_upload_date` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) NOT NULL DEFAULT 'Proposed',
  `views` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proposed_titles`
--

INSERT INTO `proposed_titles` (`id`, `group_titles_id`, `title`, `abstract`, `file`, `file_upload_date`, `status`, `views`) VALUES
(1, 2, 'GameDev', 'Game Development is the art of creating games and describes the design, development and release of a game. It may involve concept generation, design, build, test and release. While you create a game, it is important to think about the game mechanics, rewards, player engagement and level design.', 'Test SE File.docx', '2023-05-09', 'Archived', 0),
(4, 11, 'Predicting Student Fail Rate using Machine Learning', 'Abranch of artificial intelligence (AI) and computer science which focuses on the use of data and algorithms to imitate the way that humans learn, gradually improving its accuracy.', 'Transaction.docx', '2023-05-09', 'Archived', 0);

-- --------------------------------------------------------

--
-- Table structure for table `school_year`
--

CREATE TABLE `school_year` (
  `id` int(11) NOT NULL,
  `school_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `school_year`
--

INSERT INTO `school_year` (`id`, `school_year`) VALUES
(1, '2022-2023'),
(2, '2023-2024'),
(3, '2024-2025');

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
(135, 'Christian', '', 'Fernandez', 'yanyan', 'yanyan@wmsu.edu.ph', 'yanyan', 'student', 'BSCS', '3-A', 'First Semester', '2022-2023', 'Jaydee Ballaho', 48, '2023-04-27 15:40:13', '2023-05-06 02:00:29'),
(136, 'Joshua', '', 'Bada', 'joshuabada123', 'joshua@wmsu.edu.ph', 'joshua', 'student', 'BSCS', '3-A', 'First Semester', '2022-2023', 'Jaydee Ballaho', 48, '2023-04-28 00:32:12', '2023-04-28 00:32:12'),
(137, 'Joshua', '', 'Blancaflor', 'joshuapogi123', 'joshuablancaflor@wmsu.edu.ph', 'password', 'student', 'BSCS', '3-A', 'First Semester', '2022-2023', 'Jaydee Ballaho', 48, '2023-05-04 14:39:35', '2023-05-04 14:39:35'),
(138, 'Jake', '', 'Doe', 'jake123', 'jakedoe@wmsu.edu.ph', 'password', 'student', 'BSIT', '3-A', 'First Semester', '2023-2024', 'Pauleen Gregana', 51, '2023-05-06 01:24:21', '2023-05-06 01:24:21');

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
-- Indexes for table `group_panelists`
--
ALTER TABLE `group_panelists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faculty_id` (`faculty_id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `group_titles`
--
ALTER TABLE `group_titles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grpid` (`group_id`);

--
-- Indexes for table `proposed_titles`
--
ALTER TABLE `proposed_titles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gt_id` (`group_titles_id`);

--
-- Indexes for table `school_year`
--
ALTER TABLE `school_year`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `group_files`
--
ALTER TABLE `group_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `group_panelists`
--
ALTER TABLE `group_panelists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `group_titles`
--
ALTER TABLE `group_titles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `proposed_titles`
--
ALTER TABLE `proposed_titles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `school_year`
--
ALTER TABLE `school_year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

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
-- Constraints for table `group_panelists`
--
ALTER TABLE `group_panelists`
  ADD CONSTRAINT `faculty_id` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `group_id` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `group_titles`
--
ALTER TABLE `group_titles`
  ADD CONSTRAINT `grpid` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `proposed_titles`
--
ALTER TABLE `proposed_titles`
  ADD CONSTRAINT `gt_id` FOREIGN KEY (`group_titles_id`) REFERENCES `group_titles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `stud_group` FOREIGN KEY (`your_group`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
