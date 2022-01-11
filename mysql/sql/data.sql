-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 11, 2022 lúc 10:05 AM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dbagm`
--
CREATE DATABASE IF NOT EXISTS `dbagm` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `dbagm`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
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
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`username`, `fullname`, `hash_password`, `possition`, `department`, `avatar`, `id`) VALUES
('12321', '3123', '$2y$10$8ZFR703RTKAXTOaAXC0dZ.3hXeBbA5G3oMJGqrEBOddf4dJf4WJnO', 'leader', NULL, '', ''),
('admin', 'Phan Van An', '$2a$12$lr8oMIsU4nghqgAyv6BB0uAGi.noUlMB64P530.gAgdVnIqoq3Ecu', 'admin', '', '', 'admin'),
('admin1', 'hggaga', '$2y$10$9UQ2RBxmSh8cCuoEvr1vq.XARTDBlv7IzANa12IexjUsajeJoLnre', 'admin', 'Phòng hành chính', NULL, ''),
('hungnguyen', 'Nguyen Phuoc Hung', '$2y$10$REAanlDYTJGZBgPHQ7PYluCHXlpvYPx89tjlwdkGecgp9TMsNThV6', 'employee', '115', '', ''),
('vanA', 'Nguyen Van A', '$2a$12$lr8oMIsU4nghqgAyv6BB0uAGi.noUlMB64P530.gAgdVnIqoq3Ecu', 'leader', '123', '', ''),
('vanB', 'Nguyen Van B', '$2a$12$EPloFHUnsX3G0lhjFJO11OFSzTfJqTOembcWAKUwFih', 'employee', '12345', '', ''),
('vanC', 'Nguyen Van C', '$2a$12$EPloFHUnsX3G0lhjFJO11OFSzTfJqTOembcWAKUwFih', 'account', 'employee', 'chuaco', ''),
('vanD', 'Nguyen Van D', '$2a$12$EPloFHUnsX3G0lhjFJO11OFSzTfJqTOembcWAKUwFih', 'account', 'employee', 'chuaco', ''),
('vanE', 'Nguyen Van D', '$2a$12$EPloFHUnsX3G0lhjFJO11OFSzTfJqTOembcWAKUwFih', 'account', 'employee', 'chuaco', ''),
('vanF', 'Nguyen Van D', '$2a$12$EPloFHUnsX3G0lhjFJO11OFSzTfJqTOembcWAKUwFih', 'account', 'employee', 'chuaco', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `day_off`
--

CREATE TABLE `day_off` (
  `id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `employeeId` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `day_start` date NOT NULL,
  `day_end` date NOT NULL,
  `reason` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `result` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `reason_result` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `department_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `day_off`
--

INSERT INTO `day_off` (`id`, `employeeId`, `day_start`, `day_end`, `reason`, `result`, `reason_result`, `department_id`) VALUES
('[value-1]', '[value-2]', '0000-00-00', '0000-00-00', '[value-5]', '[value-6]', '[value-7]', '123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `department`
--

CREATE TABLE `department` (
  `id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `room` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `detail` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `department`
--

INSERT INTO `department` (`id`, `name`, `room`, `detail`) VALUES
('115', 'Phòng hành chính', 'A005', 'Technology'),
('117', 'Phòng nhân sự', 'A007', 'lllllll');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `file`
--

CREATE TABLE `file` (
  `file_tag` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `detail` varchar(5000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `task`
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
  `department_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `task`
--

INSERT INTO `task` (`id`, `title`, `detail`, `start_day`, `deadline`, `account_id`, `status`, `tag_file`, `department_id`) VALUES
('61dd337c67c5d', 'Assignment Web', 'Phải thực hiện nghiêm túc', '2022-01-11 14:36:00', '2022-01-12 14:35:00', 'vanA', 'Waiting', '', '123');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`username`);

--
-- Chỉ mục cho bảng `day_off`
--
ALTER TABLE `day_off`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
