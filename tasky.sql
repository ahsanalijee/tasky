-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2018 at 01:19 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tasky`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(30) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`) VALUES
(1, 'Alijee', 'ahsanali250@hotmail.com', '7878255655');

-- --------------------------------------------------------

--
-- Table structure for table `meetings`
--

CREATE TABLE `meetings` (
  `meeting_id` int(11) NOT NULL,
  `meeting_date` varchar(30) NOT NULL,
  `team_id` int(11) DEFAULT NULL,
  `meeting_title` varchar(100) NOT NULL,
  `meeting_discription` text NOT NULL,
  `is_team` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meetings`
--

INSERT INTO `meetings` (`meeting_id`, `meeting_date`, `team_id`, `meeting_title`, `meeting_discription`, `is_team`) VALUES
(4, '2018-08-26 16:59', 2, 'by admin', 'jklkjlkjlkjk', 0),
(5, '2018-08-06 17:01', 2, 'facebook', 'bbb', 1);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `member_id` int(11) NOT NULL,
  `member_name` varchar(50) NOT NULL,
  `member_image` text,
  `team_id` int(11) DEFAULT NULL,
  `designation` varchar(50) DEFAULT NULL,
  `discription` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `is_leader` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `member_name`, `member_image`, `team_id`, `designation`, `discription`, `email`, `password`, `is_leader`) VALUES
(2, 'hamid', 'uploads/Best-Friends-Img-Src_Image_-FreeDigitalPhotos_net7.jpg', 2, 'engineer', '', 'hamidali@gmail.com', '7878255655', 0),
(3, 'azeem', NULL, 2, 'dev', '', 'azeem@gmail.com', '7878255655', 1),
(4, 'ahsan ali', NULL, 2, 'dev', '', 'ahsanali250@hotmail.com', '7878255655', 0),
(5, 'usman', NULL, 3, 'dev', '', 'usman@gmail.com', '7878255655', 0),
(6, 'ioslead', NULL, 3, 'dev', '', 'iosdev@gmail.com', '7878255655', 1),
(7, 'anddev', NULL, 4, 'dev', '', 'anddev@mail.com', '7878255655', 1),
(8, 'andmem', NULL, 4, 'dev', '', 'andmem@mail.com', '7878255655', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `report_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `report_title` varchar(200) NOT NULL,
  `report_discription` text NOT NULL,
  `report_type` varchar(20) NOT NULL,
  `report_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`report_id`, `member_id`, `report_title`, `report_discription`, `report_type`, `report_date`) VALUES
(1, 2, 'first report', 'discription', 'daily', '2018-08-03 10:48:42'),
(2, 3, 'azeem report', 'i am dev', 'daily', '2018-08-03 11:58:12'),
(3, 4, 'today report', 'completing project', 'daily', '2018-08-08 03:08:33'),
(4, 2, 'jhjkhk', 'lkhkjhkj', 'daily', '2018-08-11 06:08:33'),
(5, 2, 'weekly rpt', 'this is necessary', 'weakely', '2018-08-11 06:08:26'),
(6, 3, 'PTI', 'rpt', 'Special', '2018-08-11 06:08:27');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `task_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `task_title` varchar(150) NOT NULL,
  `task_discription` text NOT NULL,
  `assign_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `by_leader` int(11) NOT NULL DEFAULT '0',
  `completed_date` timestamp NULL DEFAULT NULL,
  `task_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`task_id`, `team_id`, `member_id`, `task_title`, `task_discription`, `assign_date`, `by_leader`, `completed_date`, `task_status`) VALUES
(2, 2, 2, 'assigned by azeem', 'kitna ho gya?', '2018-08-03 09:08:41', 1, '2018-08-03 09:08:59', 1),
(4, 2, 4, 'your task', 'lkjn knhnjskjh bnhkjhn', '2018-08-06 03:08:12', 1, NULL, 1),
(6, 2, 2, 'hamid task', 'do it properly', '2018-08-06 03:08:06', 1, NULL, 1),
(7, 2, 2, 'by admin for hamid', 'jkl kjk lkjkl klj lkjlkjlk j', '2018-08-06 03:08:43', 0, '2018-08-06 06:08:16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `team_id` int(11) NOT NULL,
  `team_name` varchar(50) NOT NULL,
  `discription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`team_id`, `team_name`, `discription`) VALUES
(2, 'Web', 'jhjkhkjh'),
(3, 'ios', 'kjhkkjh'),
(4, 'android', 'jhkjhjkhjhjk'),
(5, 'php', 'kjhkkj');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `meetings`
--
ALTER TABLE `meetings`
  ADD PRIMARY KEY (`meeting_id`),
  ADD KEY `team_id` (`team_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_id`),
  ADD KEY `team_id` (`team_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`),
  ADD KEY `team_id` (`team_id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`team_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `meetings`
--
ALTER TABLE `meetings`
  MODIFY `meeting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `team_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `meetings`
--
ALTER TABLE `meetings`
  ADD CONSTRAINT `meetings_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `team` (`team_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `team` (`team_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
