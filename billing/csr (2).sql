-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 24, 2021 at 03:17 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csr`
--

-- --------------------------------------------------------

--
-- Table structure for table `assessment`
--

DROP TABLE IF EXISTS `assessment`;
CREATE TABLE IF NOT EXISTS `assessment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `objid` int(11) NOT NULL,
  `stud_id` varchar(100) NOT NULL,
  `tuition` int(11) NOT NULL,
  `misc` int(11) NOT NULL,
  `others` int(11) NOT NULL,
  `comp` int(11) NOT NULL,
  `speech` int(11) NOT NULL,
  `nstp` int(11) NOT NULL,
  `others2` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `course` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `semester` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assessment`
--

INSERT INTO `assessment` (`id`, `objid`, `stud_id`, `tuition`, `misc`, `others`, `comp`, `speech`, `nstp`, `others2`, `total`, `course`, `year`, `semester`) VALUES
(18, 2, '2', 12300, 100, 100, 100, 100, 100, 100, 12300, 'BSIT', 'I', '1st'),
(19, 2, '2', 11700, 100, 100, 100, 100, 100, 100, 12300, 'BSIT', 'I', '1st');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `objid` int(11) NOT NULL,
  `stud_id` int(11) NOT NULL,
  `course` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `orno` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `det` varchar(100) NOT NULL,
  `semester` varchar(100) NOT NULL,
  `quarter` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `objid`, `stud_id`, `course`, `year`, `orno`, `amount`, `det`, `semester`, `quarter`) VALUES
(5, 2, 2, 'BSIT', 'I', 2311, 3500, '2021-04-22', '1st', 'Prelim');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_courses`
--

DROP TABLE IF EXISTS `tbl_courses`;
CREATE TABLE IF NOT EXISTS `tbl_courses` (
  `courses_id` varchar(100) DEFAULT NULL,
  `courses` varchar(100) DEFAULT NULL,
  `number_of_enrollees` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_courses`
--

INSERT INTO `tbl_courses` (`courses_id`, `courses`, `number_of_enrollees`) VALUES
('BSIT', 'Bachelor of Science in Information Technology', 130),
('BSTM', 'Bachelor of Science in Tourism Management', 100),
('BSBA (MM)', 'Bachelor of Science in Bussiness Administration (Marketing Management)', 55),
('BSBA (FM)', 'Bachelor of Science in Bussiness Administration (Financial Management)', 60),
('Midwifery', 'Midwifery', 30),
('BSC', 'Bachelor of Science in Caregiving', 50),
('BEED', 'Bachelor of Science in Elementary Education', 145),
('BSED (Math)', 'Bachelor of Science in Secondary Education (Major in Mathematics)', 15),
('BSED (Fil.)', 'Bachelor of Science in Secondary Education (Major in Filipino)', 20),
('BSED (Eng.)', 'Bachelor of Science in Secondary Education (Major in English)', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_enrollment`
--

DROP TABLE IF EXISTS `tbl_enrollment`;
CREATE TABLE IF NOT EXISTS `tbl_enrollment` (
  `objid` int(50) NOT NULL AUTO_INCREMENT,
  `students_id` varchar(20) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `year_level` varchar(10) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `major` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`objid`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_enrollment`
--

INSERT INTO `tbl_enrollment` (`objid`, `students_id`, `course_code`, `year_level`, `semester`, `major`, `status`) VALUES
(2, '2', 'BSIT', 'I', '1st', 'N/A', 'ENROLLED'),
(8, '143', 'BSIT', 'I', '1st', 'N/A', 'ACTIVE'),
(9, '111', 'BSBA', '1', '1ST', 'N/A', 'ACTIVE'),
(52, '91991', 'BSIT', 'I', '1st', 'N/A', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_enrollment_item`
--

DROP TABLE IF EXISTS `tbl_enrollment_item`;
CREATE TABLE IF NOT EXISTS `tbl_enrollment_item` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `objid` int(11) NOT NULL,
  `students_id` varchar(20) NOT NULL,
  `subject_code` varchar(20) NOT NULL,
  `descriptive_title` varchar(100) NOT NULL,
  `units` varchar(5) NOT NULL,
  `days` varchar(200) NOT NULL,
  `time` varchar(20) NOT NULL,
  `room` varchar(20) NOT NULL,
  `year` varchar(100) NOT NULL,
  `semester` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_enrollment_item`
--

INSERT INTO `tbl_enrollment_item` (`id`, `objid`, `students_id`, `subject_code`, `descriptive_title`, `units`, `days`, `time`, `room`, `year`, `semester`) VALUES
(11, 2, '2', 'ITC112', 'Computer Programming 1', '3', 'Monday , Wednesday , Thursday', '08:00:00-09:00:00', 'CompLabuzz', 'I', '1ST'),
(12, 2, '2', 'ITC111', 'Introduction to Computing', '3', 'Monday , Tuesday , Wednesday , Thursday , Friday', '10:00:00-11:00:00', 'CompLabu', 'I', '1ST'),
(13, 2, '2', 'Filipino1', 'Komunikasyon sa Akademikong Filipino', '3', 'Monday , Tuesday , Wednesday , Thursday , Friday , Saturday', '11:00:00-12:00:00', 'CompLabu', 'I', '1ST'),
(14, 2, '2', 'PE2', 'Fund. of Rhythmic Activities', '2', 'Tuesday , Thursday', '09:00:00-10:00:00', 'CompLabu', 'I', '1ST'),
(15, 2, '2', 'ITC112', 'Computer Programming 1', '3', 'Monday , Wednesday , Thursday', '08:00:00-09:00:00', 'CompLabuzz', 'I', '1ST'),
(16, 2, '2', 'ITC111', 'Introduction to Computing', '3', 'Monday , Tuesday , Wednesday , Thursday , Friday', '10:00:00-11:00:00', 'CompLabu', 'I', '1ST'),
(17, 2, '2', 'Filipino1', 'Komunikasyon sa Akademikong Filipino', '3', 'Monday , Tuesday , Wednesday , Thursday , Friday , Saturday', '11:00:00-12:00:00', 'CompLabu', 'I', '1ST'),
(18, 2, '2', 'ITC112', 'Computer Programming 1', '3', 'Monday , Wednesday , Thursday', '08:00:00-09:00:00', 'CompLabuzz', 'I', '1ST'),
(19, 2, '2', 'Filipino1', 'Komunikasyon sa Akademikong Filipino', '3', 'Monday , Tuesday , Wednesday , Thursday , Friday , Saturday', '11:00:00-12:00:00', 'CompLabu', 'I', '1ST'),
(20, 2, '2', 'ITC111', 'Introduction to Computing', '3', 'Monday , Tuesday , Wednesday , Thursday , Friday', '10:00:00-11:00:00', 'CompLabu', 'I', '2nd'),
(21, 0, '91991', 'ITC112', 'Computer Programming 1', '3', 'Monday , Wednesday , Thursday', '08:00:00-09:00:00', 'CompLabuzz', '', ''),
(22, 0, '91991', 'ITC111', 'Introduction to Computing', '3', 'Monday , Tuesday , Wednesday , Thursday , Friday', '10:00:00-11:00:00', 'CompLabu', '', ''),
(23, 0, '91991', 'Filipino1', 'Komunikasyon sa Akademikong Filipino', '3', 'Monday , Tuesday , Wednesday , Thursday , Friday , Saturday', '11:00:00-12:00:00', 'CompLabu', '', ''),
(24, 2, '2', 'ITC111', 'Introduction to Computing', '3', 'Monday , Tuesday , Wednesday , Thursday , Friday', '10:00:00-11:00:00', 'CompLabu', 'I', '2nd'),
(25, 2, '2', 'ITC112', 'Computer Programming 1', '3', 'Monday , Wednesday , Thursday', '08:00:00-09:00:00', 'CompLabuzz', '', ''),
(26, 2, '2', 'Filipino1', 'Komunikasyon sa Akademikong Filipino', '3', 'Monday , Tuesday , Wednesday , Thursday , Friday , Saturday', '11:00:00-12:00:00', 'CompLabu', 'I', '2nd'),
(27, 2, '2', 'Filipino1', 'Komunikasyon sa Akademikong Filipino', '3', 'Monday , Tuesday , Wednesday , Thursday , Friday , Saturday', '11:00:00-12:00:00', 'CompLabu', 'I', '2nd'),
(28, 2, '2', 'ITC112', 'Computer Programming 1', '3', 'Monday , Wednesday , Thursday', '08:00:00-09:00:00', 'CompLabuzz', 'I', '2nd'),
(29, 2, '2', 'ITC111', 'Introduction to Computing', '3', 'Monday , Tuesday , Wednesday , Thursday , Friday', '10:00:00-11:00:00', 'CompLabu', 'I', '2nd'),
(30, 2, '2', 'ITC112', 'Computer Programming 1', '3', 'Monday , Wednesday , Thursday', '08:00:00-09:00:00', 'CompLabuzz', 'I', '2nd'),
(31, 0, '2', 'ITC111', 'Introduction to Computing', '3', 'Monday , Tuesday , Wednesday , Thursday , Friday', '10:00:00-11:00:00', 'CompLabu', '', ''),
(32, 0, '2', 'Filipino1', 'Komunikasyon sa Akademikong Filipino', '3', 'Monday , Tuesday , Wednesday , Thursday , Friday , Saturday', '11:00:00-12:00:00', 'CompLabu', '', ''),
(33, 0, '2', 'ITC112', 'Computer Programming 1', '3', 'Monday , Wednesday , Thursday', '08:00:00-09:00:00', 'CompLabuzz', '', ''),
(34, 0, '2', 'ITC111', 'Introduction to Computing', '3', 'Monday , Tuesday , Wednesday , Thursday , Friday', '10:00:00-11:00:00', 'CompLabu', '', ''),
(35, 0, '2', 'Filipino1', 'Komunikasyon sa Akademikong Filipino', '3', 'Monday , Tuesday , Wednesday , Thursday , Friday , Saturday', '11:00:00-12:00:00', 'CompLabu', '', ''),
(36, 0, '2', 'ITC112', 'Computer Programming 1', '3', 'Monday , Wednesday , Thursday', '08:00:00-09:00:00', 'CompLabuzz', '', ''),
(37, 0, '2', 'ITC111', 'Introduction to Computing', '3', 'Monday , Tuesday , Wednesday , Thursday , Friday', '10:00:00-11:00:00', 'CompLabu', '', ''),
(38, 0, '2', 'Filipino1', 'Komunikasyon sa Akademikong Filipino', '3', 'Monday , Tuesday , Wednesday , Thursday , Friday , Saturday', '11:00:00-12:00:00', 'CompLabu', '', ''),
(39, 0, '102094', 'ITC112', 'Computer Programming 1', '3', 'Monday , Wednesday , Thursday', '08:00:00-09:00:00', 'CompLabuzz', '', ''),
(40, 0, '102094', 'ITC111', 'Introduction to Computing', '3', 'Monday , Tuesday , Wednesday , Thursday , Friday', '10:00:00-11:00:00', 'CompLabu', '', ''),
(41, 0, '102094', 'Filipino1', 'Komunikasyon sa Akademikong Filipino', '3', 'Monday , Tuesday , Wednesday , Thursday , Friday , Saturday', '11:00:00-12:00:00', 'CompLabu', '', ''),
(42, 0, '2', 'ITC112', 'Computer Programming 1', '3', 'Monday , Wednesday , Thursday', '08:00:00-09:00:00', 'CompLabuzz', '', ''),
(43, 0, '2', 'ITC111', 'Introduction to Computing', '3', 'Monday , Tuesday , Wednesday , Thursday , Friday', '10:00:00-11:00:00', 'CompLabu', '', ''),
(44, 0, '2', 'Filipino1', 'Komunikasyon sa Akademikong Filipino', '3', 'Monday , Tuesday , Wednesday , Thursday , Friday , Saturday', '11:00:00-12:00:00', 'CompLabu', '', ''),
(45, 0, '33097', 'ITC112', 'Computer Programming 1', '3', 'Monday , Wednesday , Thursday', '08:00:00-09:00:00', 'CompLabuzz', '', ''),
(46, 0, '33097', 'ITC111', 'Introduction to Computing', '3', 'Monday , Tuesday , Wednesday , Thursday , Friday', '10:00:00-11:00:00', 'CompLabu', '', ''),
(47, 0, '33097', 'Filipino1', 'Komunikasyon sa Akademikong Filipino', '3', 'Monday , Tuesday , Wednesday , Thursday , Friday , Saturday', '11:00:00-12:00:00', 'CompLabu', '', ''),
(48, 0, '143', 'ITC112', 'Computer Programming 1', '3', 'Monday , Wednesday , Thursday', '08:00:00-09:00:00', 'CompLabuzz', '', ''),
(49, 0, '143', 'ITC111', 'Introduction to Computing', '3', 'Monday , Tuesday , Wednesday , Thursday , Friday', '10:00:00-11:00:00', 'CompLabu', '', ''),
(50, 0, '143', 'Filipino1', 'Komunikasyon sa Akademikong Filipino', '3', 'Monday , Tuesday , Wednesday , Thursday , Friday , Saturday', '11:00:00-12:00:00', 'CompLabu', '', ''),
(51, 0, '2', 'ITC111', 'Introduction to Computing', '3', 'Monday , Tuesday , Wednesday , Thursday , Friday', '10:00:00-11:00:00', 'CompLabu', '', ''),
(52, 0, '2', 'ITC112', 'Computer Programming 1', '3', 'Monday , Wednesday , Thursday', '08:00:00-09:00:00', 'CompLabuzz', '', ''),
(53, 0, '2', 'Filipino1', 'Komunikasyon sa Akademikong Filipino', '3', 'Monday , Tuesday , Wednesday , Thursday , Friday , Saturday', '11:00:00-12:00:00', 'CompLabu', '', ''),
(54, 0, '143', 'ITC112', 'Computer Programming 1', '3', 'Monday , Wednesday , Thursday', '08:00:00-09:00:00', 'CompLabuzz', '', ''),
(55, 0, '143', 'ITC111', 'Introduction to Computing', '3', 'Monday , Tuesday , Wednesday , Thursday , Friday', '10:00:00-11:00:00', 'CompLabu', '', ''),
(56, 0, '143', 'Filipino1', 'Komunikasyon sa Akademikong Filipino', '3', 'Monday , Tuesday , Wednesday , Thursday , Friday , Saturday', '11:00:00-12:00:00', 'CompLabu', '', ''),
(57, 0, '2', 'ITC112', 'Computer Programming 1', '3', 'Monday , Wednesday , Thursday', '08:00:00-09:00:00', 'CompLabuzz', '', ''),
(58, 0, '2', 'ITC111', 'Introduction to Computing', '3', 'Monday , Tuesday , Wednesday , Thursday , Friday', '10:00:00-11:00:00', 'CompLabu', '', ''),
(59, 0, '2', 'Filipino1', 'Komunikasyon sa Akademikong Filipino', '3', 'Monday , Tuesday , Wednesday , Thursday , Friday , Saturday', '11:00:00-12:00:00', 'CompLabu', '', ''),
(60, 0, '143', 'ITC112', 'Computer Programming 1', '3', 'Monday , Wednesday , Thursday', '08:00:00-09:00:00', 'CompLabuzz', '', ''),
(61, 0, '143', 'ITC111', 'Introduction to Computing', '3', 'Monday , Tuesday , Wednesday , Thursday , Friday', '10:00:00-11:00:00', 'CompLabu', '', ''),
(62, 0, '143', 'Filipino1', 'Komunikasyon sa Akademikong Filipino', '3', 'Monday , Tuesday , Wednesday , Thursday , Friday , Saturday', '11:00:00-12:00:00', 'CompLabu', '', ''),
(63, 0, '143', 'ITC112', 'Computer Programming 1', '3', 'Monday , Wednesday , Thursday', '08:00:00-09:00:00', 'CompLabuzz', '', ''),
(64, 0, '143', 'ITC111', 'Introduction to Computing', '3', 'Monday , Tuesday , Wednesday , Thursday , Friday', '10:00:00-11:00:00', 'CompLabu', '', ''),
(65, 0, '143', 'Filipino1', 'Komunikasyon sa Akademikong Filipino', '3', 'Monday , Tuesday , Wednesday , Thursday , Friday , Saturday', '11:00:00-12:00:00', 'CompLabu', '', ''),
(66, 0, '143', 'ITC112', 'Computer Programming 1', '3', 'Monday , Wednesday , Thursday', '08:00:00-09:00:00', 'CompLabuzz', '', ''),
(67, 0, '143', 'ITC111', 'Introduction to Computing', '3', 'Monday , Tuesday , Wednesday , Thursday , Friday', '10:00:00-11:00:00', 'CompLabu', '', ''),
(68, 0, '143', 'Filipino1', 'Komunikasyon sa Akademikong Filipino', '3', 'Monday , Tuesday , Wednesday , Thursday , Friday , Saturday', '11:00:00-12:00:00', 'CompLabu', '', ''),
(69, 0, '143', 'ITC112', 'Computer Programming 1', '3', 'Monday , Wednesday , Thursday', '08:00:00-09:00:00', 'CompLabuzz', '', ''),
(70, 0, '143', 'ITC111', 'Introduction to Computing', '3', 'Monday , Tuesday , Wednesday , Thursday , Friday', '10:00:00-11:00:00', 'CompLabu', '', ''),
(71, 0, '143', 'Filipino1', 'Komunikasyon sa Akademikong Filipino', '3', 'Monday , Tuesday , Wednesday , Thursday , Friday , Saturday', '11:00:00-12:00:00', 'CompLabu', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faculty`
--

DROP TABLE IF EXISTS `tbl_faculty`;
CREATE TABLE IF NOT EXISTS `tbl_faculty` (
  `teachers_id` int(11) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `middle_name` varchar(20) NOT NULL,
  `work_status` varchar(10) NOT NULL,
  `faculty_dept` varchar(30) NOT NULL,
  `contact_number` int(11) NOT NULL,
  `email_address` varchar(30) NOT NULL,
  PRIMARY KEY (`teachers_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_faculty`
--

INSERT INTO `tbl_faculty` (`teachers_id`, `surname`, `first_name`, `middle_name`, `work_status`, `faculty_dept`, `contact_number`, `email_address`) VALUES
(1, 'culzmo', 'jane', 'geulinm', 'full-time', 'nonel', 2147483647, 'khristelculi@gmail.com'),
(1213, 'culi', 'khristel ', 'sates', 'ssdsd', 'bsit', 2147483647, 'khristelculi@gmail.com'),
(100123, 'feb', 'glory', 'marites', 'full-time', 'bsbaa', 2147483647, 'glofymarites@gmail.com'),
(123456, 'bridgertonz', 'suzy', 'bae', 'part-timer', 'canteen', 2147483647, 'hellotesting@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_grades`
--

DROP TABLE IF EXISTS `tbl_grades`;
CREATE TABLE IF NOT EXISTS `tbl_grades` (
  `objid` int(11) DEFAULT NULL,
  `subjects_id` varchar(10) DEFAULT NULL,
  `descriptive_title` varchar(30) DEFAULT NULL,
  `prelim` int(11) DEFAULT NULL,
  `midterm` int(11) DEFAULT NULL,
  `finals` int(11) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_grades`
--

INSERT INTO `tbl_grades` (`objid`, `subjects_id`, `descriptive_title`, `prelim`, `midterm`, `finals`, `remarks`) VALUES
(12345, 'chemistry', 'chemical laboratory', 85, 88, 92, 'passed'),
(1290, 'biology101', 'biology', 81, 82, 89, 'passed');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rooms`
--

DROP TABLE IF EXISTS `tbl_rooms`;
CREATE TABLE IF NOT EXISTS `tbl_rooms` (
  `room_no` int(11) NOT NULL AUTO_INCREMENT,
  `room_description` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`room_no`)
) ENGINE=InnoDB AUTO_INCREMENT=151 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_rooms`
--

INSERT INTO `tbl_rooms` (`room_no`, `room_description`) VALUES
(2, 'CompLabuzz'),
(3, 'fdfab'),
(5, 'science room miss boulevarder'),
(7, 'gogo'),
(20, 'CompLabu'),
(100, 'testing'),
(150, 'testing after back up');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schedules`
--

DROP TABLE IF EXISTS `tbl_schedules`;
CREATE TABLE IF NOT EXISTS `tbl_schedules` (
  `objid` int(11) NOT NULL AUTO_INCREMENT,
  `subject_code` varchar(20) NOT NULL,
  `days` longtext NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `room_code` varchar(20) NOT NULL,
  `teacher_code` varchar(20) NOT NULL,
  PRIMARY KEY (`objid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_schedules`
--

INSERT INTO `tbl_schedules` (`objid`, `subject_code`, `days`, `start_time`, `end_time`, `room_code`, `teacher_code`) VALUES
(1, '08:00:00.000000', '', '00:00:00', '00:00:00', '', ''),
(2, 'BIO SCI 1', 'Monday', '00:00:01', '00:00:01', '3', '1213'),
(3, 'ICT', 'Monday , Wednesday , Friday', '00:00:01', '00:00:01', '2', '100123'),
(4, 'ITC121', '', '00:00:00', '00:00:00', '', ''),
(5, 'ITC112', 'Monday , Wednesday , Thursday', '08:00:00', '09:00:00', '2', '1'),
(6, 'PE2', 'Tuesday , Thursday', '09:00:00', '10:00:00', '20', '1213'),
(7, 'ITC111', 'Monday , Tuesday , Wednesday , Thursday , Friday', '10:00:00', '11:00:00', '20', '1'),
(8, 'Filipino1', 'Monday , Tuesday , Wednesday , Thursday , Friday , Saturday', '11:00:00', '12:00:00', '20', '1213');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_semester`
--

DROP TABLE IF EXISTS `tbl_semester`;
CREATE TABLE IF NOT EXISTS `tbl_semester` (
  `code` varchar(5) NOT NULL,
  `semester` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_semester`
--

INSERT INTO `tbl_semester` (`code`, `semester`) VALUES
('1st', 'First Semester'),
('2nd', 'Second Semester'),
('Summe', 'Summer');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

DROP TABLE IF EXISTS `tbl_status`;
CREATE TABLE IF NOT EXISTS `tbl_status` (
  `teacher_id` int(11) NOT NULL,
  `status` varchar(30) DEFAULT NULL,
  `department` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`teacher_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`teacher_id`, `status`, `department`) VALUES
(1, 'Full -Time', 'BSIT');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_students`
--

DROP TABLE IF EXISTS `tbl_students`;
CREATE TABLE IF NOT EXISTS `tbl_students` (
  `students_id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `middle_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `place_of_birth` varchar(100) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `home_address` varchar(100) DEFAULT NULL,
  `provincial_address` varchar(100) DEFAULT NULL,
  `contact_number` int(11) DEFAULT NULL,
  `facebook_account` varchar(30) DEFAULT NULL,
  `religion` varchar(20) DEFAULT NULL,
  `baptized` tinyint(1) DEFAULT NULL,
  `confirmed` tinyint(1) DEFAULT NULL,
  `elementary_school` varchar(100) DEFAULT NULL,
  `high_school` varchar(100) DEFAULT NULL,
  `last_attended_college` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_students`
--

INSERT INTO `tbl_students` (`students_id`, `first_name`, `middle_name`, `last_name`, `date_of_birth`, `place_of_birth`, `nationality`, `gender`, `status`, `home_address`, `provincial_address`, `contact_number`, `facebook_account`, `religion`, `baptized`, `confirmed`, `elementary_school`, `high_school`, `last_attended_college`) VALUES
(102094, 'khristel', 'sates', 'culi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33097, 'ella', 'lara', 'salazar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'khristel jane', 's', 'culi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(91991, 'Irish', 'Romano', 'Calunsag', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(143, 'ella mae', 'lara', 'salazar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(111, 'John', 'Doe', 'Smith', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subjects`
--

DROP TABLE IF EXISTS `tbl_subjects`;
CREATE TABLE IF NOT EXISTS `tbl_subjects` (
  `subjects_id` varchar(20) NOT NULL,
  `subjects_description` varchar(150) NOT NULL,
  `units` varchar(20) NOT NULL,
  `course_id` varchar(10) DEFAULT NULL,
  `year_level` varchar(10) DEFAULT NULL,
  `semester` varchar(10) DEFAULT NULL,
  `pre_requisites` varchar(50) NOT NULL,
  PRIMARY KEY (`subjects_description`,`units`,`pre_requisites`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_subjects`
--

INSERT INTO `tbl_subjects` (`subjects_id`, `subjects_description`, `units`, `course_id`, `year_level`, `semester`, `pre_requisites`) VALUES
('ITC311', 'Applications Development Systems & Emerging Technologies', '3', 'BSIT', 'III', '1st', 'ITM221'),
('TPC9', 'Applied Business Tools and Technologies in Tourism', '3', 'BSTM', 'IV', '1st', 'NONE'),
('REED 1', 'ARSE w/ Congregational Study', '1', 'BSTM', 'III', '1st', 'NONE'),
('GE6', 'Art Appreciation', '3', 'BSIT', 'I', '2nd', 'NONE'),
('ITM411', 'Capstone1', '3', 'BSIT', 'IV', '1st', 'ITM322/ITE323'),
('ITM421', 'Capstone2', '3', 'BSIT', 'IV', '2nd', 'ITM411'),
('CP 102 A', 'Clinical Practicum M102(306 HRS)', '6', 'MIDWIFERY', 'II', '2nd', 'NONE'),
('CP 102 B', 'Clinical Practicum M102(357 HRS)', '7', 'MIDWIFERY', 'II', '2nd', 'NONE'),
('CP PHC 2', 'Clinical Practicum PHC2(102 HRS)', '2', 'MIDWIFERY', 'II', '2nd', 'NONE'),
('CP 100 ', 'Clinical Practicum(153 HRS)', '3', 'MIDWIFERY', 'I', '1st', 'NONE'),
('CP 101-B', 'Clinical Practicum(51 HRS)', '3', 'MIDWIFERY', 'I', 'Summer', 'NONE'),
('ITC112', 'Computer Programming 1', '3', 'BSIT', 'I', '1st', 'none'),
('ITC121', 'Computer Programming 2', '3', 'BSIT', 'I', '2nd', 'ITC112'),
('GE3', 'Contemporary World', '3', 'BSIT', 'I', '2nd', 'NONE'),
('TME4', 'Cruise Tourism', '3', 'BSTM', 'IV', '1st', 'NONE'),
('ITC221', 'Data Structures and Algorithms', '3', 'BSIT', 'II', '2nd', 'ITC111'),
('ITM223', 'Discrete Mathematics', '3', 'BSIT', 'II', '2nd', 'ITC112'),
('TME21', 'Ecotourism Management', '3', 'BSTM', 'II', '2nd', 'NONE'),
('THC10', 'Entrepreneurship in Tourism and Hospitality', '3', 'BSTM', 'III', '2nd', 'NONE'),
('GE8', 'Ethics', '3', 'BSIT', 'I', '2nd', 'NONE'),
('REED 2', 'Evangelization', '1', 'BSTM', 'III', '2nd', 'NONE'),
('TPC6', 'Foreign Language', '3', 'BSTM', 'III', '1st', 'NONE'),
('TPC7', 'Foreign Language 2', '3', 'BSTM', 'III', '2nd', 'NONE'),
('MID 100', 'Foundation of Midwifery Practice', '3', 'MIDWIFERY', 'I', '1st', 'NONE'),
('PE2', 'Fund. of Rhythmic Activities', '2', 'BSIT', 'I', '2nd', 'NONE'),
('ACCT', 'Fundamentals', '1', 'BSIT', 'III', '1st', 'NONE'),
('ITM311', 'Fundamentals of Database Systems', '3', 'BSIT', 'III', '1st', 'ITM221'),
('GE6', 'Gender and Society', '3', 'BSTM', 'II', '1st', 'NONE'),
('GEN.Z00', 'General Zoology', '3', 'MIDWIFERY', 'II', '1st', 'NONE'),
('TPC1', 'Global Culture and Tourism Geography', '3', 'BSTM', 'III', '1st', 'NONE'),
('H.ECON', 'Health Economics w/ TAR', '3', 'MIDWIFERY', 'II', '2nd', 'NONE'),
('TME12', 'Heritage Tourism', '3', 'BSTM', 'II', '1st', 'NONE'),
('BIO SCI 1', 'Human Anatomy and Physiology', '5', 'MIDWIFERY', 'I', '1st', 'NONE'),
('PE3', 'Individual/Dual Games', '2', 'BSIT', 'II', '1st', 'NONE'),
('ITM321', 'Information Assurance and Security 1', '3', 'BSIT', 'III', '2nd', 'ITC211'),
('ITM412', 'Information Assurance and Security 2', '3', 'BSIT', 'IV', '1st', 'ITM321'),
('ITC211', 'Information Management', '3', 'BSIT', 'II', '2nd', 'ITM121'),
('ICT', 'Information Technology', '3', 'MIDWIFERY', 'II', '2nd', 'NONE'),
('ITM221', 'Integrative Programming and Technologies', '3', 'BSIT', 'II', '2nd', 'NONE'),
('ITC111', 'Introduction to Computing', '3', 'BSIT', 'I', '1st', 'none'),
('ITM121', 'Introduction to Human-Computer Interaction', '3', 'BSIT', 'I', '2nd', 'ITC111'),
('TPC10', 'Introduction to Meetings, Incentives, Conferences & Events Management', '3', 'BSTM', 'IV', '1st', 'NONE'),
('ITE3S1', 'ITElective1', '3', 'BSIT', 'I', 'Summer', 'NONE'),
('ITE411', 'ITElective2(Cert. Review)', '3', 'BSIT', 'IV', '1st', 'NONE'),
('ITE412', 'ITElective3', '3', 'BSIT', 'IV', '1st', 'NONE'),
('ITE424', 'ITElective4', '3', 'BSIT', 'IV', '2nd', 'NONE'),
('Filipino1', 'Komunikasyon sa Akademikong Filipino', '3', 'BSIT', 'I', '1st', 'NONE'),
('THC8', 'Legal Aspects in Tourism and Hospitality', '3', 'BSTM', 'III', '1st', 'NONE'),
('RIZAL', 'Life, Works and Writing of Rizal', '3', 'MIDWIFERY', 'I', 'Summer', 'NONE'),
('GE10', 'Living in the Era', '3', 'BSIT', 'II', '1st', 'NONE'),
('THC5', 'Macro Perspective of Tourism and Hospitality', '3', 'BSTM', 'II', '2nd', 'NONE'),
('REED 3', 'Marriage and Family', '1', 'BSTM', 'IV', '1st', 'NONE'),
('GE4', 'Math in the Modern World', '3', 'BSIT', 'I', '1st', 'NONE'),
('THC1', 'Micro Perspective of Tourism and Hospitality', '3', 'BSTM', 'II', '1st', 'NONE'),
('BIO SCI 2', 'Microbiology and Parasitology', '4', 'MIDWIFERY', 'II', '1st', 'NONE'),
('THC9', 'Multicultural Diversity in Workplace for the Tourism Professionals', '3', 'BSTM', 'III', '2nd', 'NONE'),
('ITE221', 'Multimedia', '3', 'BSIT', 'II', '1st', 'ITM121'),
('NSTP1', 'Nat\'l Service Training Program', '3', 'BSIT', 'I', '1st', 'NONE'),
('NSTP2', 'Nat\'l Service Training Program', '3', 'BSIT', 'I', '2nd', 'NSTP1'),
('ITM222', 'Networking 1', '3', 'BSIT', 'II', '2nd', 'ITC211'),
('ITM313 ', 'Networking 2', '3', 'BSIT', 'III', '1st', 'ITM222'),
('MID 101', 'Normal OB', '3', 'MIDWIFERY', 'I', '2nd', 'NONE'),
('N & D', 'Nutrition & Dietetics', '3', 'MIDWIFERY', 'I', '2nd', 'NONE'),
('ITE212', 'Object-Oriented Programming', '3', 'BSIT', 'II', '1st', 'ITC121'),
('BME1', 'Operation MO Operation Ko', '3', 'BSTM', 'III', '2nd', 'NONE'),
('GE4', 'Pagbasa at Pagsulat sa Iba\'t ibang Disiplina', '3', 'MIDWIFERY', 'I', '2nd', 'NONE'),
('Filipino2', 'Pagbasa at Pagsulat tungo sa Pananaliksik', '3', 'BSIT', 'I', '2nd', 'Filipino1'),
('MID 102', 'Pathologic OB, Care of Infants and Feeding', '3', 'MIDWIFERY', 'II', '1st', 'NONE'),
('THC4', 'Philippine Culture and Tourism Geography', '3', 'BSTM', 'I', '1st', 'NONE'),
('THC11', 'Philippine Popular Culture', '3', 'BSTM', 'I', '1st', 'NONE'),
('PHILO 110', 'Philosophy of Human Person', '3', 'MIDWIFERY', 'I', '2nd', 'NONE'),
('PE1', 'Physical Fitness', '2', 'BSIT', 'I', '1st', 'NONE'),
('ITE211', 'Platform Technologies', '3', 'BSIT', 'II', '1st', 'ITM121'),
('POLGOV', 'Political Government w/ Phil. Constitution', '3', 'MIDWIFERY', 'I', 'Summer', 'NONE'),
('ITM3S1', 'Practicum', '6', 'BSIT', 'III', 'Summer', 'none'),
('PRACTICUM', 'Practicum Tourism', '6', 'BSTM', 'IV', '2nd', 'NONE'),
('PHC', 'Primary Health Care 2', '3', 'MIDWIFERY', 'II', '2nd', 'NONE'),
('PHC 1', 'Primary Health Care 2', '4', 'MIDWIFERY', 'II', '1st', 'NONE'),
('HEALTH EDUC', 'Principles, Methods and Strategies of Teaching in Health', '3', 'MIDWIFERY', 'I', '2nd', 'NONE'),
('MID 103', 'Prof. Growth and Development and Ethics ', '3', 'MIDWIFERY', 'II', '2nd', 'NONE'),
('THC6', 'Professional Development and Applied Ethics', '3', 'BSTM', 'II', '2nd', 'NONE'),
('GE5', 'Purposive Communication', '3', 'BSIT', 'I', '1st', 'NONE'),
('THC3', 'Quality Service Management in Tourism and Hospitality', '3', 'BSTM', 'III', '1st', 'NONE'),
('ITM322', 'Quantative Methods', '3', 'BSIT', 'III', '2nd', 'NONE'),
('GE11', 'Reading Visual Art', '3', 'BSIT', 'II', '1st', 'NONE'),
('GE2', 'Readings in Philippine History', '3', 'BSIT', 'I', '1st', 'NONE'),
('TPC8', 'Research in Tourism', '3', 'BSTM', 'IV', '1st', 'NONE'),
('THC2', 'Risk Management as Applies to Safety, Securtiy and Sanitation', '3', 'BSTM', 'I', '2nd', 'NONE'),
('GE9', 'Rizal\'s Life and Works', '3', 'BSIT', 'III', '2nd', 'NONE'),
('GE13', 'Rizal\'s Life,Works and Writing', '3', 'BSTM', 'III', '1st', 'NONE'),
('Theo2', 'Sacraments of the Church', '3', 'BSIT', 'I', '2nd', 'NONE'),
('Theo4', 'Sacred Liturgy', '3', 'BSIT', 'II', '2nd', 'NONE'),
('SAMPLE', 'SAMPLE', '3', 'bbn', 'I', '1st', 'BIO SCI 1'),
('SAMPLE', 'SAMPLE', '3', 'BEED', 'I', '1st', 'BIO SCI 1 , BIO SCI 2'),
('GE7', 'Science, Technology and Society', '3', 'BSIT', 'I', '2nd', 'NONE'),
('ITM423', 'Social and Professional Issues', '3', 'BSIT', 'IV', '2nd', 'NONE'),
('SSCI', 'Sociology and Anthropology', '3', 'MIDWIFERY', 'II', '2nd', 'NONE'),
('BME2', 'Strategic Management & Total Quality Management', '3', 'BSTM', 'IV', '1st', 'NONE'),
('TPC2', 'Sustainable Tourism', '3', 'BSTM', 'III', '1st', 'NONE'),
('TME20', 'Sustainable Tourism Destination Marketing', '3', 'BSTM', 'IV', '1st', 'NONE'),
('ITM422', 'System Administration and Maintenance', '3', 'BSIT', 'IV', '2nd', 'ITM321'),
('ITM312', 'System Integration and Architecture', '3', 'BSIT', 'III', '1st', 'ITM221/ITM222'),
('ITE323', 'Systems Analysis and Design', '3', 'BSIT', 'III', '2nd', 'ITM311'),
('PE4', 'Team Sports', '2', 'BSIT', 'II', '2nd', 'NONE'),
('ITE322', 'Technopreneurship', '3', 'BSIT', 'III', '2nd', 'ACCT'),
('Theo3', 'The Commandments/Morality', '3', 'BSIT', 'II', '1st', 'NONE'),
('GE7', 'The Contemporary World', '3', 'BSTM', 'II', '2nd', 'NONE'),
('Theo1', 'The Creed/Salvation History', '3', 'BSIT', 'I', '1st', 'NONE'),
('TPC3', 'Tour and Travel Management', '3', 'BSTM', 'III', '2nd', 'NONE'),
('TME5', 'Tour Guiding', '3', 'BSTM', 'II', '2nd', 'NONE'),
('THC7', 'Tourism and Hospitality Marketing', '3', 'BSTM', 'II', '1st', 'NONE'),
('TPC5', 'Tourism Policy Planning and Development', '3', 'BSTM', 'III', '2nd', 'NONE'),
('TPC 7', 'Transportation Management', '3', 'BSTM', 'I', '1st', 'NONE'),
('GE1', 'Understanding Self', '3', 'BSIT', 'I', '1st', 'NONE'),
('ITE321', 'Web Systems and Technologies', '3', 'BSIT', 'III', '2nd', 'ITM313');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_units`
--

DROP TABLE IF EXISTS `tbl_units`;
CREATE TABLE IF NOT EXISTS `tbl_units` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_units`
--

INSERT INTO `tbl_units` (`id`, `price`) VALUES
(1, 450);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `user_id` varchar(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `contact_no` varchar(11) NOT NULL,
  `position` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `userpass` varchar(100) NOT NULL,
  `account_type` tinyint(1) DEFAULT NULL,
  `department` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `first_name`, `middle_name`, `last_name`, `contact_no`, `position`, `email`, `username`, `userpass`, `account_type`, `department`) VALUES
('0', 'To', 'All', 'Users', '-', '-', '-', 'admin', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0),
('1', '1', '1', '1', '09999918570', 'RMO III', 'yokimashu@gmail.com', '1', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 2, 0),
('10', 'Haydee', 'Suarez', 'Apayla', '-', '-', '-', 'haydee', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0),
('100', 'January', 'A', 'Dolocanog', '-', '-', '-', 'jaja', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0),
('101', 'Thomas Edison', 'C.', 'Blanco', '-', '-', '-', 'thomas', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0),
('102', 'Maria Molilona', 'D.', 'Delubio', '-', '-', '-', 'molly', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0),
('103', 'Ceasar Ian', 'S.', 'Barrientos', '09082955031', 'Please select...', 'keilthaz73@gmail.com', 'ian', '$2y$10$8QuSwRooFOLIqW89VCU8EeIWKmYijQvjINnHbF2sQ57sU7wwYTUuW', 1, 0),
('11', 'John Dave', '-', 'Marabillo', '-', '-', '-', 'dave', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0),
('12', 'Mary Rose ', 'Lorimas', 'Jain', '-', '-', '-', 'mrose', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0),
('13', 'Ma. Elena', 'Sabellano', 'Po', '09998315104', 'Please select...', 'cemosancarloscity@gmail.com', 'elena', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0),
('14', 'John Bernard', 'F.', 'Lobaton', '09273489435', 'Please select...', 'kushgamer011@gmail.com', 'john011', '$2y$10$OKOwhgjfJ35DJYAE9ucapuN28VhgZU3kQc8cegCv5OudORNnu1HgS', 1, 0),
('15', 'Jennifer', 'L.', 'Lobaton', '-', '-', '-', 'jen', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0),
('16', 'Mark Vernon', 'C.', 'Broce', '-', '-', '-', 'mark', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0),
('17', 'Joan', 'Bucar', 'Mascada', '-', '-', '-', 'joan', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0),
('18', 'Johaynna', 'R.', 'Laguda', '-', '-', '-', 'johaynna', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0),
('19', 'Edwin', '-', 'Sechico', '-', '-', '-', 'edwin', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0),
('20', 'Mildred', 'R.', 'Galasan', '-', '-', '-', 'psyche', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0),
('200', 'fritz', 'A', 'Mondero', '-', '-', '-', 'mondero', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0),
('202', 'Exar', 'Argabio', 'Sumbal', '09269725782', 'RMO III', 'exarsumbal@gmail.com', 'eboy', '$2y$10$zmEdxztpV1W2zL5taFBW..NUUSpdodDuZtZVUHZYzsNkZ7UAaZ0qe', 2, 0),
('205', 'Gemrhay', 'Carrillo', 'Bison', '09566409376', 'JO', 'gemrhaybison@gmail.com', 'gemrhayb', '$2y$10$Y9y3Kp.igBx8.TuvVbu3F.ae8egIkqheHzuOED/3tAFeBv3ypyole', 2, 0),
('206', 'Gemrhay', 'Carrillo', 'Bison', '09566409376', 'JO', 'gemrhaybison@gmail.com', 'gemrhayb', '$2y$10$9kanUTiyik5azixH.Eh5aegtli2t7Z0XH5tnVnjeoM4UzHiM9Zq3m', 2, 0),
('207', 'khristel jane', 's', 'culi', '09953697626', '', 'khristelculi@gmail.com', '1', '$2y$10$jUV8gsCl1uscXCyw7pxIsO9/.06Za92ABxp0VUhHJT.8s3HbErUyG', 2, NULL),
('21', 'Kathleen', '-', 'Requieron', '-', '-', '-', 'kat', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0),
('22', 'Maxilinda', 'S. ', 'Unabia', '-', '-', '-', 'maxi', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0),
('23', 'Mary Jane', '-', 'Elona', '-', '-', '-', 'em', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0),
('24', 'Eda Erica', '-', 'Belarmino', '-', '-', '-', 'eda', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0),
('25', 'Julie Joy', '-', 'Verana', '-', '-', '-', 'joy', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0),
('26', 'Michelle', '-', 'Suan', '-', '-', '-', 'michelle', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0),
('27', 'Mary Grace', 'P.', 'Burgos', '-', '-', '-', 'grace', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0),
('28', 'Richard', 'Detoya', 'Diaz', '034-3156152', 'Please select...', 'diaz.richard62@yahoo.com', 'rich', '$2y$10$khcePPg16FcutSTyCxOJ0e4RJ/20U6fdOyooXmocY/fag7t0SYhCu', 1, 0),
('29', 'Bill Christian', 'M.', 'Subrado', '-', '-', '-', 'christian', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0),
('3', 'Felix Michael', 'Formaran', 'Oberes', '09999918570', 'ISAI', 'f.m.oberes@gmail.com', 'yokimashu', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0),
('30', 'Gladys', 'A.', 'Mirande', '09985511067', 'Please select...', 'v_eronica21@yahoo.com', 'Gladu', '$2y$10$vHuKPNSvrXRgYrZeFurbteDwYLkC4V9ZzoxO5vVxOpkHNpmdHxPgm', 1, 0),
('31', 'Lionel Rian', 'A.', 'Jumanguin', '09301365878', 'Please select...', 'jumanguinrian3@gmail.com', 'yan-yan', '$2y$10$GiiTUT28ljnbkLT13OX.Qe9Y7vfiQHT64nhOGgcupGZmY1XkKjY1W', 1, 0),
('32', 'Sheila Lyn', 'Teo', 'Pelotenia', '09392762297', 'Please select...', 'spelotenia25@yahoo.com', 'sltp', '$2y$10$KiFC.ftpU2Nm/uniaA4AC.Y04AMROBWzQetpSc/G5NFmVenZ9XLPS', 1, 0),
('33', 'Devina', '-', 'Ambag', '-', '-', '-', 'devine', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0),
('34', 'Jonard', 'Amistad', 'Mondero', '09162425575', 'Please select...', 'jonardmondero@gmail.com', 'jonard', '$2y$10$qbyONQbOVpre/fJ/H4vDWOVGR5.jTZ5f1S6MAjUJV7.By88sY/JBO', 1, 0),
('35', 'Ariel', 'L.', 'Empanado', '-', '-', '-', 'aying', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0),
('36', 'Alie', 'D.', 'Mondero', '-', '-', '-', 'alie', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0),
('37', 'Karen Dohn', 'R.', 'Pomar', '-', '-', '-', 'karen', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0),
('38', 'Jonalyn', 'T.', 'Flores', '-', '-', '-', 'jona', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0),
('39', 'Rosselyn', 'R.', 'Carmona', '-', '-', '-', 'rose', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0),
('4', 'Charity', 'Peque', 'Madrid', '09175598230', 'Comp. Operator I', 'madridcharity@gmail.com', 'charity', '$2y$10$df3Xgz/9ysbqoHT00J8i/O0fObWpQQl6JpA6mMNia0hciFsr7x/zq', 2, NULL),
('40', 'Myra', 'V.', 'Carmona', '-', '-', '-', 'myra', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0),
('41', 'Judith', 'F.', 'Lazaga', '-', '-', '-', 'judith', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0),
('42', 'Liezl', 'A.', 'Alibango', '09305115094', 'Please select...', 'alibango_liezl@yahoo.com', 'liezl', '$2y$10$u2mmawReMrwCbCiBXsgRHu/dB5n4mZjloHNY94bxzQW72tQ2J8/4i', 1, 0),
('43', 'Lisa', '-', '-', '-', '-', '-', 'lisa', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0),
('44', 'Shirley', '-', 'Rigor', '-', '-', '-', 'shirley', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0),
('45', 'Daisy', 'Escala', 'Mendoza', '09321893665', 'Please select...', 'daisymen@yahoo.com', 'desay', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0),
('46', 'Sheena', 'Senador', 'Daniel', '-', '-', '-', 'sheena', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0),
('47', 'ARNOLD', 'KYAMKO', 'CRUZ', '09274210351', 'Please select...', 'rara_kyamko@yahoo.com', 'rara', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0),
('48', 'arnold', 'kyamko', 'cruz', '09274210351', 'Please select...', 'rara_kyamko@yahoo.com', 'Dlonra', '$2y$10$NowYANWV8rrCliMDhapxJOpSp6gmURogzZnVY3pgnbLaTEifIzeD6', 1, 0),
('49', 'Market', '-', '-', '-', '-', '-', 'market', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0),
('5', 'Marivic', 'Paran', 'Tecson', '09077708713', 'Please select...', 'civiramparan@gmail.com', 'marivic', '$2y$10$Zr/ufq1a9G2SVD8.fmVXSuwKLcncp7VCHk3N61aP9Feda2SmFU.O6', 1, 0),
('50', 'Market1', '-', '-', '-', '-', '-', 'market1', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0),
('51', 'Negosyo ', '-', 'Center', '-', '-', '-', 'negosyo', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0),
('52', 'BPLO', '-', '-', '-', '-', '-', 'bplo', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0),
('53', 'Henry Philip', '-', 'Parana', '-', '-', '-', 'philip', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0),
('54', 'Marites', 'B.', 'Gerbolingo', '-', '-', '-', 'marites', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0),
('55', 'Chuckie', '-', 'Fernandez', '-', '-', '-', 'chuckie', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0),
('56', 'Grace', '-', 'Agraviador', '-', '-', '-', 'gingging', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0),
('57', 'BPLO', '-', 'BPLO', '-', '-', '-', 'bplo', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0),
('58', 'DILG', '-', 'DILG', '-', '-', '-', 'dilg', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0),
('59', 'Elisa', 'M.', 'Andrade', '-', '-', '-', 'elisa', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0),
('6', 'Maria Lourdes', 'ArdeÃ±a', 'Nochefranca', '09120555008', 'Please select...', 'm.nochefranca@yahoo.com', 'daisy', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0),
('60', 'Kathleen', '-', 'Mendrez', '', '', '', 'kath', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0),
('61', 'Maria Ruby', 'G.', 'Tormis', '-', '-', '-', 'lovely', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0),
('62', 'Melita', '-', 'Singson', '-', '-', '-', 'milet', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0),
('63', 'Winnie', '-', 'Chavez', '-', '-', '-', 'winnie ', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0),
('64', 'SCCADAC', '-', '', '', '', '', 'sccadac', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0),
('65', 'Arnold', '-', 'Libodlibod', '-', '-', '-', 'arnold', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0),
('66', 'Jeka', 'K.', 'Calinawagan', '-', '-', '-', 'jeka', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0),
('68', 'Johaynna', 'D.', 'Racaza', '-', '-', '-', 'johaynna', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0),
('69', 'Jinelyn', 'S.', 'Lucob', '-', '-', '-', 'jhe', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0),
('7', 'Maribel', 'T.', 'Soronio', '-', '-', '-', 'maribel', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0),
('70', 'Ma. Natasya', 'Riconalla', 'Arnaiz', '-', '-', '-', 'natnat', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0),
('71', 'Charon Ann', '-', 'Umadhay', '-', '-', '-', 'charon', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0),
('72', 'Mary Jane', 'C.', 'Broce', '-', '-', '-', 'mj', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0),
('73', 'Janice', '-', 'Aspiras', '-', '-', '-', 'janice', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0),
('74', 'Nelson', 'B.', 'Villaflor', '-', '-', '-', 'nelson', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0),
('75', 'Neal Roberto', 'S.', 'Belangel', '-', '-', '-', 'neal', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0),
('8', 'Rodney', '-', 'Ignacio', '-', '-', '-', 'rodney', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0),
('9', 'Mira', '-', '', '-', '-', '-', 'mira', '$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_year`
--

DROP TABLE IF EXISTS `tbl_year`;
CREATE TABLE IF NOT EXISTS `tbl_year` (
  `code` varchar(5) NOT NULL,
  `year_level` varchar(20) NOT NULL,
  PRIMARY KEY (`code`),
  KEY `objid` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_year`
--

INSERT INTO `tbl_year` (`code`, `year_level`) VALUES
('I', 'First Year'),
('II', 'Second Year'),
('III', 'Third Year'),
('IV', 'Fourth Year');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
