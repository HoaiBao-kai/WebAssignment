-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2022 at 08:04 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbagm`
--
CREATE DATABASE IF NOT EXISTS `dbagm` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `dbagm`;

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `hash_password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `possition` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `department` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`username`, `fullname`, `hash_password`, `possition`, `department`, `avatar`, `id`) VALUES
('admin', 'Phan Van An', '$2a$12$lr8oMIsU4nghqgAyv6BB0uAGi.noUlMB64P530.gAgdVnIqoq3Ecu', 'admin', '', '', 'admin'),
('vanA', 'Nguyen Van A', '$2a$12$lr8oMIsU4nghqgAyv6BB0uAGi.noUlMB64P530.gAgdVnIqoq3Ecu', 'employee', '12345', '', ''),
('vanB', 'Nguyen Van B', '$2a$12$EPloFHUnsX3G0lhjFJO11OFSzTfJqTOembcWAKUwFih', 'employee', '12345', '', ''),
('vanC', 'Nguyen Van C', '$2a$12$EPloFHUnsX3G0lhjFJO11OFSzTfJqTOembcWAKUwFih', 'account', 'employee', 'chuaco', ''),
('vanD', 'Nguyen Van D', '$2a$12$EPloFHUnsX3G0lhjFJO11OFSzTfJqTOembcWAKUwFih', 'account', 'employee', 'chuaco', ''),
('vanE', 'Nguyen Van D', '$2a$12$EPloFHUnsX3G0lhjFJO11OFSzTfJqTOembcWAKUwFih', 'account', 'employee', 'chuaco', ''),
('vanF', 'Nguyen Van D', '$2a$12$EPloFHUnsX3G0lhjFJO11OFSzTfJqTOembcWAKUwFih', 'account', 'employee', 'chuaco', '');

-- --------------------------------------------------------

--
-- Table structure for table `day_off`
--

CREATE TABLE `day_off` (
  `id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `employeeId` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `day_start` date NOT NULL,
  `day_end` date NOT NULL,
  `reason` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `result` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `reason_result` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `room` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `detail` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `room`, `detail`) VALUES
('115', 'ITPE', 'A005', 'Technology'),
('117', 'ITTT', 'A007', 'lllllll');

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `file_tag` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `detail` varchar(5000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `detail` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `start_day` datetime NOT NULL,
  `deadline` datetime NOT NULL,
  `account_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tag_file` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
