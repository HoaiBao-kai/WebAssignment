-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2022 at 05:36 PM
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
('51900620', 'Hoài Bảo', '$2y$10$kmEyWOb2VMhLJfbGxpiYJepElXtDu1lfDN956wa.KcjZ8fgiHyoWW', 'employee', '117', '', ''),
('admin', 'Phan Van An', '$2a$12$lr8oMIsU4nghqgAyv6BB0uAGi.noUlMB64P530.gAgdVnIqoq3Ecu', 'admin', '', '', 'admin'),
('hungnguyen', 'Nguyen Phuoc Hung', '$2a$12$lr8oMIsU4nghqgAyv6BB0uAGi.noUlMB64P530.gAgdVnIqoq3Ecu', 'employee', '115', '', ''),
('vanA', 'Nguyen Van A', '$2a$12$lr8oMIsU4nghqgAyv6BB0uAGi.noUlMB64P530.gAgdVnIqoq3Ecu', 'leader', '115', '', ''),
('vanB', 'Nguyen Van B', '$2a$12$lr8oMIsU4nghqgAyv6BB0uAGi.noUlMB64P530.gAgdVnIqoq3Ecu', 'employee', '115', '', ''),
('vongoctram', 'Vo Ngoc Tram', '$2y$10$cU2KqJIb5YX.MlH3f1nNNOgGhJTus4mfmfPHpNeZvGIN057E.1bFG', 'leader', '117', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `day_off`
--

CREATE TABLE `day_off` (
  `id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `employeeId` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `day_start` date NOT NULL,
  `reason` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `result` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `reason_result` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `department_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `num_day_off` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `day_off_request` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tag_file` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `day_off_response` date DEFAULT NULL,
  `date_request` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `day_off`
--

INSERT INTO `day_off` (`id`, `employeeId`, `day_start`, `reason`, `result`, `reason_result`, `department_id`, `num_day_off`, `day_off_request`, `tag_file`, `day_off_response`, `date_request`) VALUES
('61ded6c82e060', 'vanB', '2022-01-13', '3123123', 'Accept', NULL, '115', '3', '3', '', '2022-01-12', '2022-01-12'),
('61e044b8999ba', 'hungnguyen', '2022-01-15', 'Lười quá nên xin nghỉ', 'Accept', NULL, '115', '4', '4', '../file/phieu_tu_danh_gia_hk1_2122.docx', '2022-01-13', '2022-01-13'),
('61e053129030b', 'vanA', '2022-01-14', 'Có việc gấp', 'Waiting', NULL, '115', '', '5', ' ', NULL, '2022-01-13');

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
('115', 'Phòng hành chính', 'A005', 'Technology'),
('117', 'Phòng nhân sự', 'A007', 'lllllll');

-- --------------------------------------------------------

--
-- Table structure for table `submit`
--

CREATE TABLE `submit` (
  `submit_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `task_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `submit_date` datetime NOT NULL,
  `tag_file` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `deatail` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `detail_response` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `tag_file_response` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `submit`
--

INSERT INTO `submit` (`submit_id`, `task_id`, `submit_date`, `tag_file`, `deatail`, `status`, `detail_response`, `tag_file_response`) VALUES
('61e02b1c9283d', '61e02af03d189', '2022-01-13 20:37:00', '../file/google_api_key.txt', 'Hoàn thành 50%', 'Rejected', '', ' '),
('61e0305a4f1a4', '61e02af03d189', '2022-01-13 20:59:00', '../file/Huong dan.txt', 'Hoàn thành 50%', 'Rejected', '', ' '),
('61e0312a540c4', '61e02af03d189', '2022-01-13 21:03:00', '../file/phieu_tu_danh_gia_hk1_2122.docx', 'Hoàn thành 50%', 'Rejected', 'Test', ' '),
('61e03aae5a38c', '61e02af03d189', '2022-01-13 21:43:00', '../file/Huong dan.txt', 'Hoàn thành 50%', 'Rejected', 'Test', ' '),
('61e03bca1031f', '61e02af03d189', '2022-01-13 21:48:00', '../file/phieu_tu_danh_gia_hk1_2122.docx', 'Hoàn thành 50%', 'Rejected', 'Test', ' '),
('61e03d3db3eb6', '61e02af03d189', '2022-01-13 21:54:00', '../file/Huong dan.txt', 'Hoàn thành 50%', 'Rejected', 'Test', ' '),
('61e03e6865759', '61e02af03d189', '2022-01-13 21:59:00', '../file/phieu_tu_danh_gia_hk1_2122.docx', 'Hoàn thành 50%', 'Completed', '', ''),
('61e04738a0679', '61e046fad5a0b', '2022-01-13 22:37:00', '../file/Huong dan.txt', 'Hoàn thành ', 'Rejected', 'Cần thêm nhìu yếu tố hơn', '../file/google_api_key.txt'),
('61e047af7552f', '61e046fad5a0b', '2022-01-13 22:39:00', '../file/phieu_tu_danh_gia_hk1_2122.docx', 'Hoàn thiện hơn', 'Completed', '', ''),
('61e04a00595d7', '61e049d41bd15', '2022-01-13 22:49:00', '../file/phieu_tu_danh_gia_hk1_2122.docx', 'Đã xong', 'Rejected', 'Testing', ' '),
('61e04e6683fb1', '61e049d41bd15', '2022-01-13 23:08:00', '../file/Huong dan.txt', 'Đã hoàn thiện hơn', 'Rejected', 'Hoàn thiện hơn đi', ' '),
('61e0503302394', '61e049d41bd15', '2022-01-13 23:15:00', '../file/phieu_tu_danh_gia_hk1_2122.docx', 'Làm j làm quài zay', 'Rejected', 'Lần test cuối', ' '),
('61e051df7d428', '61e049d41bd15', '2022-01-13 23:22:00', '../file/phieu_tu_danh_gia_hk1_2122.docx', 'Làm j làm quài zay', 'Completed', '', '');

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
  `tag_file` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `department_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `review` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `process` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `title`, `detail`, `start_day`, `deadline`, `account_id`, `status`, `tag_file`, `department_id`, `review`, `process`) VALUES
('61e02af03d189', 'Testing', 'Testing', '2022-01-13 20:36:00', '2022-01-21 21:55:00', 'vanB', 'Completed', ' ', '115', 'OK', 'Hoàn thành đúng hạn'),
('61e046fad5a0b', 'Tính toán sổ sách', 'Tính toán sổ sổ sách', '2022-01-13 22:36:00', '2022-01-21 22:38:00', 'hungnguyen', 'Completed', '../file/google_api_key.txt', '115', 'GOOD', 'Hoàn thành đúng hạn'),
('61e049d41bd15', 'Kiểm tra', 'Kiểm tra', '2022-01-13 22:48:00', '2022-01-26 23:22:00', 'hungnguyen', 'Completed', ' ', '115', 'OK', 'Hoàn thành đúng hạn');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `day_off`
--
ALTER TABLE `day_off`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submit`
--
ALTER TABLE `submit`
  ADD PRIMARY KEY (`submit_id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
