-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2023 at 10:22 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grading`
--

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `grade_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_grade` int(11) NOT NULL,
  `innovation` int(11) NOT NULL,
  `integration` int(11) NOT NULL,
  `functionality` int(11) NOT NULL,
  `data_handling` int(11) NOT NULL,
  `sustainability` int(11) NOT NULL,
  `user_experience` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `grades1`
--

CREATE TABLE `grades1` (
  `grade_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_grade` int(11) NOT NULL,
  `innovation` int(11) NOT NULL,
  `performance` int(11) NOT NULL,
  `robustness` int(11) NOT NULL,
  `scalability` int(11) NOT NULL,
  `user_experience` int(11) NOT NULL,
  `cost_effectiveness` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `grades2`
--

CREATE TABLE `grades2` (
  `grade_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_grade` int(11) NOT NULL,
  `user_interface` int(11) NOT NULL,
  `functionality` int(11) NOT NULL,
  `performance` int(11) NOT NULL,
  `usability` int(11) NOT NULL,
  `innovation` int(11) NOT NULL,
  `compatibility` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `grades3`
--

CREATE TABLE `grades3` (
  `grade_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_grade` int(11) NOT NULL,
  `user_interface` int(11) NOT NULL,
  `functionality` int(11) NOT NULL,
  `performance` int(11) NOT NULL,
  `usability` int(11) NOT NULL,
  `innovation` int(11) NOT NULL,
  `compatibility` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `grades4`
--

CREATE TABLE `grades4` (
  `grade_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_grade` int(11) NOT NULL,
  `percent` int(11) NOT NULL,
  `visual_design` int(11) NOT NULL,
  `user_experience` int(11) NOT NULL,
  `functionality` int(11) NOT NULL,
  `accessibility` int(11) NOT NULL,
  `documentation` int(11) NOT NULL,
  `overall_quality` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `grades5`
--

CREATE TABLE `grades5` (
  `grade_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_grade` int(11) NOT NULL,
  `percent` int(11) NOT NULL,
  `visual_appeal` int(11) NOT NULL,
  `layout` int(11) NOT NULL,
  `interactivity` int(11) NOT NULL,
  `technology` int(11) NOT NULL,
  `information` int(11) NOT NULL,
  `overall` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `grades6`
--

CREATE TABLE `grades6` (
  `grade_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_grade` int(11) NOT NULL,
  `percent` int(11) NOT NULL,
  `clarity` int(11) NOT NULL,
  `audience` int(11) NOT NULL,
  `value1` int(11) NOT NULL,
  `technical` int(11) NOT NULL,
  `competitive` int(11) NOT NULL,
  `overall` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `group_id` int(11) NOT NULL,
  `group_name` varchar(20) NOT NULL,
  `section` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_id`, `group_name`, `section`) VALUES
(4, 'TITO FERDS', 'IT201'),
(5, 'W3KIDZ', 'IT201'),
(6, 'CABASISI FAM - Class', 'IT201'),
(7, 'GOT IT', 'IT201'),
(8, 'INNOVATECH', 'IT201'),
(9, 'SUPREMO', 'IT201'),
(10, '3PEAT', 'IT201'),
(11, 'GROUP VALM', 'IT201'),
(12, 'TEAM BDJ', 'IT201'),
(13, 'JORAKE', 'IT201'),
(14, 'DCRJ', 'IT201'),
(15, 'POSITIVITY', 'IT201'),
(16, 'TRI-FORCE', 'IT201'),
(17, 'COLON OPEN BRACKET', 'IT201'),
(18, 'BRAZILIAN TEAM', 'IT201'),
(19, 'CBA CO', 'IT201'),
(20, 'SPUTNIK', 'IT201'),
(21, '3-BIT', 'IT201'),
(22, 'TEAM SECRET', 'IT201'),
(23, 'SIDE SCHOOL', 'IT201'),
(24, 'TECHGNOSIS', 'IT201');

-- --------------------------------------------------------

--
-- Table structure for table `groups1`
--

CREATE TABLE `groups1` (
  `group1_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groups1`
--

INSERT INTO `groups1` (`group1_id`, `group_id`) VALUES
(16, 4),
(14, 6),
(5, 7),
(9, 8),
(15, 11),
(11, 12),
(6, 13),
(4, 15),
(13, 17),
(12, 18),
(17, 20),
(7, 21),
(10, 22),
(8, 23),
(18, 24);

-- --------------------------------------------------------

--
-- Table structure for table `groups2`
--

CREATE TABLE `groups2` (
  `group2_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groups2`
--

INSERT INTO `groups2` (`group2_id`, `group_id`) VALUES
(4, 7),
(7, 8),
(3, 10),
(9, 12),
(5, 14),
(2, 15),
(10, 17),
(11, 19),
(12, 20),
(6, 21),
(8, 22),
(13, 24);

-- --------------------------------------------------------

--
-- Table structure for table `groups3`
--

CREATE TABLE `groups3` (
  `group3_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groups3`
--

INSERT INTO `groups3` (`group3_id`, `group_id`) VALUES
(10, 4),
(3, 5),
(8, 6),
(2, 9),
(9, 11),
(5, 13),
(4, 16),
(7, 18),
(6, 23);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `password` varchar(11) NOT NULL,
  `type` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `firstname`, `lastname`, `password`, `type`) VALUES
(1, 'admin', 'System', 'Admin', 'admin', 'Admin'),
(5, 'czarina', 'Cuarez', 'Czarina', 'hi', 'Panelist');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`grade_id`),
  ADD KEY `user_FK_1` (`user_id`),
  ADD KEY `groups` (`group_id`);

--
-- Indexes for table `grades1`
--
ALTER TABLE `grades1`
  ADD PRIMARY KEY (`grade_id`),
  ADD KEY `grades1_FK_1` (`user_id`),
  ADD KEY `groups1` (`group_id`);

--
-- Indexes for table `grades2`
--
ALTER TABLE `grades2`
  ADD PRIMARY KEY (`grade_id`),
  ADD KEY `grades2_FK_1` (`user_id`),
  ADD KEY `groups2` (`group_id`);

--
-- Indexes for table `grades3`
--
ALTER TABLE `grades3`
  ADD PRIMARY KEY (`grade_id`),
  ADD KEY `grades3_FK_1` (`user_id`),
  ADD KEY `groups3` (`group_id`);

--
-- Indexes for table `grades4`
--
ALTER TABLE `grades4`
  ADD PRIMARY KEY (`grade_id`),
  ADD KEY `grades4group` (`group_id`),
  ADD KEY `grades4user` (`user_id`);

--
-- Indexes for table `grades5`
--
ALTER TABLE `grades5`
  ADD PRIMARY KEY (`grade_id`),
  ADD KEY `grades5group` (`group_id`),
  ADD KEY `grades5user` (`user_id`);

--
-- Indexes for table `grades6`
--
ALTER TABLE `grades6`
  ADD PRIMARY KEY (`grade_id`),
  ADD KEY `grades6group` (`group_id`),
  ADD KEY `grades6user` (`user_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `groups1`
--
ALTER TABLE `groups1`
  ADD PRIMARY KEY (`group1_id`),
  ADD KEY `group1_FK_1` (`group_id`);

--
-- Indexes for table `groups2`
--
ALTER TABLE `groups2`
  ADD PRIMARY KEY (`group2_id`),
  ADD KEY `group2_FK_1` (`group_id`);

--
-- Indexes for table `groups3`
--
ALTER TABLE `groups3`
  ADD PRIMARY KEY (`group3_id`),
  ADD KEY `group3_FK_1` (`group_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `grade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `grades1`
--
ALTER TABLE `grades1`
  MODIFY `grade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `grades2`
--
ALTER TABLE `grades2`
  MODIFY `grade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `grades3`
--
ALTER TABLE `grades3`
  MODIFY `grade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `grades4`
--
ALTER TABLE `grades4`
  MODIFY `grade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `grades5`
--
ALTER TABLE `grades5`
  MODIFY `grade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `grades6`
--
ALTER TABLE `grades6`
  MODIFY `grade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `groups1`
--
ALTER TABLE `groups1`
  MODIFY `group1_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `groups2`
--
ALTER TABLE `groups2`
  MODIFY `group2_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `groups3`
--
ALTER TABLE `groups3`
  MODIFY `group3_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `groups` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_FK_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `grades1`
--
ALTER TABLE `grades1`
  ADD CONSTRAINT `grades1_FK_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `groups1` FOREIGN KEY (`group_id`) REFERENCES `groups1` (`group1_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `grades2`
--
ALTER TABLE `grades2`
  ADD CONSTRAINT `grades2_FK_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `groups2` FOREIGN KEY (`group_id`) REFERENCES `groups2` (`group2_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `grades3`
--
ALTER TABLE `grades3`
  ADD CONSTRAINT `grades3_FK_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `groups3` FOREIGN KEY (`group_id`) REFERENCES `groups3` (`group3_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `grades4`
--
ALTER TABLE `grades4`
  ADD CONSTRAINT `grades4group` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `grades4user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `grades5`
--
ALTER TABLE `grades5`
  ADD CONSTRAINT `grades5group` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `grades5user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `grades6`
--
ALTER TABLE `grades6`
  ADD CONSTRAINT `grades6group` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `grades6user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `groups1`
--
ALTER TABLE `groups1`
  ADD CONSTRAINT `group1_FK_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `groups2`
--
ALTER TABLE `groups2`
  ADD CONSTRAINT `group2_FK_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `groups3`
--
ALTER TABLE `groups3`
  ADD CONSTRAINT `group3_FK_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
