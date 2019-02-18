-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2017 at 03:20 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `se_addmission`
--

-- --------------------------------------------------------

--
-- Table structure for table `board`
--

CREATE TABLE `board` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `board`
--

INSERT INTO `board` (`id`, `name`, `modified_by`, `modified_at`) VALUES
(36, 'Dhaka', 15, '2017-10-11 14:32:37'),
(38, 'Jessore', 15, '2017-10-11 14:32:48');

-- --------------------------------------------------------

--
-- Table structure for table `cost`
--

CREATE TABLE `cost` (
  `id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `transaction_name` varchar(256) NOT NULL,
  `amount` decimal(7,2) NOT NULL,
  `is_income` tinyint(1) NOT NULL,
  `is_special` tinyint(1) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cost`
--

INSERT INTO `cost` (`id`, `form_id`, `transaction_name`, `amount`, `is_income`, `is_special`, `modified_by`, `modified_at`) VALUES
(8, 20, 'Form purchased', '750.00', 1, 0, 15, '2017-11-01 20:47:57'),
(9, 20, 'download', '10.00', 0, 0, 15, '2017-11-01 20:48:39');

-- --------------------------------------------------------

--
-- Table structure for table `form_sell`
--

CREATE TABLE `form_sell` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `serial_number` int(11) UNSIGNED ZEROFILL NOT NULL,
  `is_approve` tinyint(1) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_sell`
--

INSERT INTO `form_sell` (`id`, `student_id`, `unit_id`, `serial_number`, `is_approve`, `modified_by`, `modified_at`) VALUES
(20, 4, 5, 00000000001, 1, 16, '2017-11-01 14:47:23');

-- --------------------------------------------------------

--
-- Table structure for table `procedure_list`
--

CREATE TABLE `procedure_list` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `procedure_list`
--

INSERT INTO `procedure_list` (`id`, `name`, `modified_by`, `modified_at`) VALUES
(1, 'download', 15, '2017-10-12 00:45:32'),
(2, 'Tx number', 15, '2017-10-19 10:39:19');

-- --------------------------------------------------------

--
-- Table structure for table `profile_picture`
--

CREATE TABLE `profile_picture` (
  `id` int(11) NOT NULL,
  `pic_url` varchar(256) NOT NULL,
  `height` int(11) NOT NULL,
  `width` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quota`
--

CREATE TABLE `quota` (
  `id` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quota`
--

INSERT INTO `quota` (`id`, `type`, `modified_by`, `modified_at`) VALUES
(2, 'FFQ', 15, '2017-10-12 01:55:16'),
(3, 'FF', 15, '2017-10-12 01:55:30');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` int(11) NOT NULL,
  `session` varchar(10) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `session`, `modified_by`, `modified_at`) VALUES
(5, '2014-15', 15, '2017-10-11 23:46:26'),
(6, '2015-16', 15, '2017-10-12 00:34:01');

-- --------------------------------------------------------

--
-- Table structure for table `signature`
--

CREATE TABLE `signature` (
  `id` int(11) NOT NULL,
  `sigature_url` varchar(256) NOT NULL,
  `height` int(11) NOT NULL,
  `width` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ssc_hsc_result`
--

CREATE TABLE `ssc_hsc_result` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `marks` int(3) NOT NULL,
  `grade` varchar(2) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ssc_hsc_result`
--

INSERT INTO `ssc_hsc_result` (`id`, `student_id`, `subject_id`, `marks`, `grade`, `modified_by`, `modified_at`) VALUES
(9, 4, 2, 100, 'A+', 16, '2017-10-18 12:47:23'),
(10, 4, 4, 100, 'A+', 16, '2017-10-18 12:47:50');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `father_name` varchar(40) NOT NULL,
  `mother_name` varchar(40) NOT NULL,
  `present_street_village` varchar(256) NOT NULL,
  `present_post_code` int(4) NOT NULL,
  `present_Upozilla_thana` varchar(20) NOT NULL,
  `present_district` varchar(20) NOT NULL,
  `present_division` varchar(20) NOT NULL,
  `permanent_street_village` varchar(256) NOT NULL,
  `permanent_post_code` int(4) NOT NULL,
  `permanent_Upozilla_thana` varchar(20) NOT NULL,
  `permanent_district` varchar(20) NOT NULL,
  `permanent_division` varchar(20) NOT NULL,
  `gender` int(1) NOT NULL,
  `mobile` int(11) NOT NULL,
  `alternative_mobile` int(11) NOT NULL,
  `father_mobile` int(11) NOT NULL,
  `ssc_board_id` int(11) NOT NULL,
  `ssc_year` int(4) NOT NULL,
  `ssc_registration_number` int(11) NOT NULL,
  `ssc_roll_number` int(11) NOT NULL,
  `ssc_gpa` varchar(5) NOT NULL,
  `hsc_board_id` int(11) NOT NULL,
  `hsc_year` int(4) NOT NULL,
  `hsc_registration_number` int(11) NOT NULL,
  `hsc_roll_number` int(11) NOT NULL,
  `hsc_gpa` varchar(5) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `user_id`, `father_name`, `mother_name`, `present_street_village`, `present_post_code`, `present_Upozilla_thana`, `present_district`, `present_division`, `permanent_street_village`, `permanent_post_code`, `permanent_Upozilla_thana`, `permanent_district`, `permanent_division`, `gender`, `mobile`, `alternative_mobile`, `father_mobile`, `ssc_board_id`, `ssc_year`, `ssc_registration_number`, `ssc_roll_number`, `ssc_gpa`, `hsc_board_id`, `hsc_year`, `hsc_registration_number`, `hsc_roll_number`, `hsc_gpa`, `modified_by`, `modified_at`) VALUES
(4, 16, 'asdasd', 'asdas', 'asdas', 2314, 'asd', 'asd', 'asd', 'asd', 1234, 'asd', 'asd', 'asd', 1, 1914307542, 1914307542, 1914307542, 38, 1234, 21234, 21234, '3', 36, 21234, 23134, 234234, '4', 16, '2017-10-18 13:19:43'),
(10, 23, 'Md. Delwar Hossain', 'Mst. Aleya Khatun', 'Moheshpur Upjella Mashjid', 7340, 'Moheshpur', 'Jhenaidah', 'Khulna', 'Mohila Collage Road', 7300, 'Jhinadah Sodor', 'Jhinaidah', 'Khulna', 1, 1914307542, 1914307542, 1914307542, 38, 2012, 1234, 1234, '5.00', 38, 2014, 1234, 1234, '5.00', 23, '2017-10-19 01:43:20');

-- --------------------------------------------------------

--
-- Table structure for table `student_quota`
--

CREATE TABLE `student_quota` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `quata_id` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `code` varchar(256) DEFAULT NULL,
  `name` varchar(20) NOT NULL,
  `exam_type` enum('SSC','Dakhil','O Level','HSC','Alim','A Level') NOT NULL,
  `modified_id` int(11) NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `code`, `name`, `exam_type`, `modified_id`, `modified_at`) VALUES
(2, '2124', 'asdasd', 'HSC', 15, '2017-10-12 03:12:52'),
(4, '878146', 'pppppp', 'Dakhil', 15, '2017-10-12 03:24:23'),
(6, '564', 'test 3', 'HSC', 15, '2017-10-18 11:15:11'),
(7, '123', 'jani na', 'SSC', 15, '2017-10-18 15:36:47');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id` int(11) NOT NULL,
  `university_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `unit_name` varchar(256) NOT NULL,
  `start_date_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `end_date_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `selection_date_time` timestamp NULL DEFAULT NULL,
  `exam_date_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `form_price` decimal(7,2) NOT NULL,
  `service_charge` decimal(7,2) NOT NULL,
  `detail` text NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id`, `university_id`, `session_id`, `unit_name`, `start_date_time`, `end_date_time`, `selection_date_time`, `exam_date_time`, `form_price`, `service_charge`, `detail`, `modified_by`, `modified_at`) VALUES
(4, 4, 6, 'Set School', '2017-11-30 18:00:00', '2016-12-31 19:00:00', '2016-12-31 20:00:00', '2016-12-31 19:00:00', '700.00', '50.00', 'asd ka \r\n', 15, '2017-10-13 18:56:20'),
(5, 2, 5, 'KH', '2016-12-31 19:00:00', '2016-12-31 19:00:00', '2016-12-31 19:00:00', '2016-12-31 19:00:00', '700.00', '50.00', 'asdasd', 15, '2017-10-14 07:50:12');

-- --------------------------------------------------------

--
-- Table structure for table `unit_procedure_list`
--

CREATE TABLE `unit_procedure_list` (
  `id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `procedure_list_id` int(11) NOT NULL,
  `procedure_serial` int(3) NOT NULL,
  `is_text` tinyint(1) NOT NULL,
  `cost` decimal(7,2) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit_procedure_list`
--

INSERT INTO `unit_procedure_list` (`id`, `unit_id`, `procedure_list_id`, `procedure_serial`, `is_text`, `cost`, `modified_by`, `modified_at`) VALUES
(3, 4, 1, 1, 0, '123.00', 15, '2017-10-19 11:20:01'),
(4, 4, 1, 2, 0, '12.00', 15, '2017-10-19 11:20:14'),
(5, 4, 2, 3, 1, '123.00', 15, '2017-10-19 10:40:06'),
(6, 5, 1, 1, 1, '10.00', 15, '2017-10-19 13:23:36'),
(7, 5, 2, 2, 0, '100.00', 15, '2017-10-19 13:23:51');

-- --------------------------------------------------------

--
-- Table structure for table `unit_procedure_status`
--

CREATE TABLE `unit_procedure_status` (
  `id` int(11) NOT NULL,
  `form_sell_id` int(11) NOT NULL,
  `unit_procedure_list_id` int(11) NOT NULL,
  `value` varchar(256) DEFAULT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit_procedure_status`
--

INSERT INTO `unit_procedure_status` (`id`, `form_sell_id`, `unit_procedure_list_id`, `value`, `modified_by`, `modified_at`) VALUES
(25, 20, 6, 'dsdfsf', 15, '2017-11-01 14:48:38'),
(26, 20, 7, NULL, 15, '2017-11-01 14:47:22');

-- --------------------------------------------------------

--
-- Table structure for table `university`
--

CREATE TABLE `university` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `university`
--

INSERT INTO `university` (`id`, `name`, `modified_by`, `modified_at`) VALUES
(2, 'Dhaka University', 15, '2017-10-12 00:34:42'),
(4, 'Khulna University', 15, '2017-10-12 00:35:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(256) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `password` varchar(256) NOT NULL,
  `user_role` enum('admin','manager','data_entry','student') NOT NULL,
  `account_status` tinyint(1) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `user_name`, `password`, `user_role`, `account_status`, `modified_by`, `modified_at`) VALUES
(15, 'Ashfiqur Rahman', 'admin', '202cb962ac59075b964b07152d234b70', 'admin', 1, 15, '2017-10-18 01:16:13'),
(16, 'asd', 'asd', '202cb962ac59075b964b07152d234b70', 'student', 1, 15, '2017-11-02 01:01:13'),
(23, 'J. M. Ashfiqur Rahman', 'anik', '202cb962ac59075b964b07152d234b70', 'student', 1, 15, '2017-11-02 01:14:15'),
(24, 'anik rahman', 'manager', '202cb962ac59075b964b07152d234b70', 'manager', 1, 15, '2017-10-31 13:51:30'),
(25, 'Akib Rahman', 'data', '202cb962ac59075b964b07152d234b70', 'data_entry', 1, 15, '2017-10-31 13:52:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cost`
--
ALTER TABLE `cost`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_id` (`form_id`);

--
-- Indexes for table `form_sell`
--
ALTER TABLE `form_sell`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `procedure_list`
--
ALTER TABLE `procedure_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_picture`
--
ALTER TABLE `profile_picture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `quota`
--
ALTER TABLE `quota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signature`
--
ALTER TABLE `signature`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `ssc_hsc_result`
--
ALTER TABLE `ssc_hsc_result`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `ssc_board_id` (`ssc_board_id`),
  ADD KEY `hsc_board_id` (`hsc_board_id`);

--
-- Indexes for table `student_quota`
--
ALTER TABLE `student_quota`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `quata_id` (`quata_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_type_id` (`exam_type`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_id` (`university_id`),
  ADD KEY `session_id` (`session_id`);

--
-- Indexes for table `unit_procedure_list`
--
ALTER TABLE `unit_procedure_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unit_id` (`unit_id`),
  ADD KEY `procedure_list_id` (`procedure_list_id`);

--
-- Indexes for table `unit_procedure_status`
--
ALTER TABLE `unit_procedure_status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_sell_id` (`form_sell_id`),
  ADD KEY `unit_procedure_list_id` (`unit_procedure_list_id`);

--
-- Indexes for table `university`
--
ALTER TABLE `university`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `board`
--
ALTER TABLE `board`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `cost`
--
ALTER TABLE `cost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `form_sell`
--
ALTER TABLE `form_sell`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `procedure_list`
--
ALTER TABLE `procedure_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `profile_picture`
--
ALTER TABLE `profile_picture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `quota`
--
ALTER TABLE `quota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `signature`
--
ALTER TABLE `signature`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ssc_hsc_result`
--
ALTER TABLE `ssc_hsc_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `student_quota`
--
ALTER TABLE `student_quota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `unit_procedure_list`
--
ALTER TABLE `unit_procedure_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `unit_procedure_status`
--
ALTER TABLE `unit_procedure_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `university`
--
ALTER TABLE `university`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cost`
--
ALTER TABLE `cost`
  ADD CONSTRAINT `cost_ibfk_1` FOREIGN KEY (`form_id`) REFERENCES `form_sell` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `form_sell`
--
ALTER TABLE `form_sell`
  ADD CONSTRAINT `form_sell_ibfk_1` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `form_sell_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `profile_picture`
--
ALTER TABLE `profile_picture`
  ADD CONSTRAINT `profile_picture_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `signature`
--
ALTER TABLE `signature`
  ADD CONSTRAINT `signature_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ssc_hsc_result`
--
ALTER TABLE `ssc_hsc_result`
  ADD CONSTRAINT `ssc_hsc_result_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ssc_hsc_result_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`ssc_board_id`) REFERENCES `board` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_ibfk_3` FOREIGN KEY (`hsc_board_id`) REFERENCES `board` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_quota`
--
ALTER TABLE `student_quota`
  ADD CONSTRAINT `student_quota_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_quota_ibfk_2` FOREIGN KEY (`quata_id`) REFERENCES `quota` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `unit`
--
ALTER TABLE `unit`
  ADD CONSTRAINT `unit_ibfk_1` FOREIGN KEY (`university_id`) REFERENCES `university` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `unit_ibfk_2` FOREIGN KEY (`session_id`) REFERENCES `session` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `unit_procedure_list`
--
ALTER TABLE `unit_procedure_list`
  ADD CONSTRAINT `unit_procedure_list_ibfk_1` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `unit_procedure_list_ibfk_2` FOREIGN KEY (`procedure_list_id`) REFERENCES `procedure_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `unit_procedure_status`
--
ALTER TABLE `unit_procedure_status`
  ADD CONSTRAINT `unit_procedure_status_ibfk_1` FOREIGN KEY (`form_sell_id`) REFERENCES `form_sell` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `unit_procedure_status_ibfk_2` FOREIGN KEY (`unit_procedure_list_id`) REFERENCES `unit_procedure_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
