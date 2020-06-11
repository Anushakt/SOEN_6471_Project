-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2020 at 10:24 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `icare`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

CREATE TABLE IF NOT EXISTS `admin_tbl` (
  `sn` int(11) NOT NULL AUTO_INCREMENT,
  `lname` varchar(50) NOT NULL,
  `oname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`sn`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`sn`, `lname`, `oname`, `email`, `password`) VALUES
(1, 'Jackson', 'Jackson', 'jackson@yahoo.com', 'jackson');

-- --------------------------------------------------------

--
-- Table structure for table `appointment_tbl`
--

CREATE TABLE IF NOT EXISTS `appointment_tbl` (
  `sn` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `oname` varchar(50) NOT NULL,
  `patient_email` varchar(50) NOT NULL,
  `dates` varchar(20) NOT NULL,
  `time` varchar(12) NOT NULL,
  `approval` varchar(12) DEFAULT NULL,
  `book_date` datetime NOT NULL,
  PRIMARY KEY (`sn`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `appointment_tbl`
--

INSERT INTO `appointment_tbl` (`sn`, `book_id`, `lname`, `oname`, `patient_email`, `dates`, `time`, `approval`, `book_date`) VALUES
(3, 1, 'Kolawole', 'Moshood Abiola', 'abiolamoshood7@gmail.com', '2020-06-10', '10:00', 'Confirmed', '2020-06-06 14:51:15'),
(4, 2, 'Kolawole', 'Moshood Abiola', 'abiolamoshood7@gmail.com', '2020-06-08', '11:00', 'Confirmed', '2020-06-06 15:07:51'),
(5, 3, 'Niral', 'Kumar', 'abiolamoshood7@gmail.com', '2020-06-15', '02:00', NULL, '2020-06-09 21:20:05'),
(6, 4, 'Niral', 'Kumar', 'niralkumar@gmail.com', '2020-06-22', '13:00', 'Confirmed', '2020-06-09 21:22:19');

-- --------------------------------------------------------

--
-- Table structure for table `patient_tbl`
--

CREATE TABLE IF NOT EXISTS `patient_tbl` (
  `sn` int(11) NOT NULL AUTO_INCREMENT,
  `lname` varchar(50) NOT NULL,
  `oname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `sex` varchar(12) NOT NULL,
  `day` int(2) NOT NULL,
  `month` int(2) NOT NULL,
  `year` int(4) NOT NULL,
  `height` double(10,0) NOT NULL,
  `weight` double(10,0) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `zip` varchar(12) NOT NULL,
  PRIMARY KEY (`sn`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `patient_tbl`
--

INSERT INTO `patient_tbl` (`sn`, `lname`, `oname`, `email`, `password`, `sex`, `day`, `month`, `year`, `height`, `weight`, `address`, `city`, `state`, `zip`) VALUES
(1, 'Kolawole', 'Moshood', 'abiolamoshood7@gmail.com', 'olawale', 'male', 14, 5, 2000, 70, 75, '7493 Terressa Bourdeau', 'Lasalle', 'Quebec', 'H8N2J6'),
(2, 'Niral', 'Kumal', 'niralkumar@gmail.com', 'niral', 'male', 14, 5, 2001, 70, 65, '8234 Ste Catherine ', 'Montreal', 'quebec', '');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_tbl`
--

CREATE TABLE IF NOT EXISTS `schedule_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lname` varchar(50) NOT NULL,
  `oname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dates` varchar(12) NOT NULL,
  `time` varchar(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `schedule_tbl`
--

INSERT INTO `schedule_tbl` (`id`, `lname`, `oname`, `email`, `dates`, `time`) VALUES
(1, 'Kolawole', 'Moshood Abiola', 'abiolamoshood7@gmail.com', '2020-06-10', '10:00'),
(2, 'Kolawole', 'Moshood Abiola', 'abiolamoshood7@gmail.com', '2020-06-08', '11:00'),
(3, 'Niral', 'Kumar', 'niralkumar@gmail.com', '2020-06-15', '02:00'),
(4, 'Niral', 'Kumar', 'niralkumar@gmail.com', '2020-06-22', '13:00');

-- --------------------------------------------------------

--
-- Table structure for table `staff_tbl`
--

CREATE TABLE IF NOT EXISTS `staff_tbl` (
  `sn` int(11) NOT NULL AUTO_INCREMENT,
  `lname` varchar(50) NOT NULL,
  `oname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `sex` varchar(12) NOT NULL,
  `day` int(2) NOT NULL,
  `month` int(2) NOT NULL,
  `year` int(4) NOT NULL,
  `specialty` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `zip` varchar(10) NOT NULL,
  PRIMARY KEY (`sn`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `staff_tbl`
--

INSERT INTO `staff_tbl` (`sn`, `lname`, `oname`, `email`, `password`, `sex`, `day`, `month`, `year`, `specialty`, `department`, `address`, `city`, `state`, `zip`) VALUES
(1, 'Kolawole', 'Moshood Abiola', 'abiolamoshood7@gmail.com', 'olawale', 'male', 14, 5, 1993, 'Surgeon', 'Medical and Surgery', '7493 Teressa Bourdeau', 'Lasalle', 'quebec', 'H8N2J6'),
(2, 'Niral', 'Kumar', 'niralkumar@gmail.com', 'niral', 'male', 10, 3, 2002, 'Dentist', 'Dental ', '8234 Ste Catherine', 'Montreal', 'quebec', '');

-- --------------------------------------------------------

--
-- Table structure for table `temp_tbl`
--

CREATE TABLE IF NOT EXISTS `temp_tbl` (
  `sn` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `oname` varchar(50) NOT NULL,
  `patient_email` varchar(50) NOT NULL,
  `dates` varchar(12) NOT NULL,
  `time` varchar(12) NOT NULL,
  PRIMARY KEY (`sn`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
