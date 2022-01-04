-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 04, 2022 lúc 09:52 AM
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
  `avatar` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`username`, `fullname`, `hash_password`, `possition`, `department`, `avatar`) VALUES
('admin', 'Phan Van An', '$2a$12$EPloFHUnsX3G0lhjFJO11OFSzTfJqTOembcWAKUwFih', 'admin', '', ''),
('hung', 'Nguyen Van D', '$2y$10$sVKsTIR9V7Rx0vwjmwL.HOc/LU7xsXqRfq1Thgnks1hQ0RQL1.9m2', 'employee', 'account', 'chuaco'),
('hunghung', 'Nguyen Van D', '$2y$10$w9sagb6cmeM9Ab/qi5dQU.rKDgpKdVsMz..VcLYEpG0zwx5OiqQRG', 'employee', 'account', 'chuaco'),
('vaA', 'Nguyen Van D', '$2y$10$opaSGZbpqwg0DzNbOzzqYO5R6is8KFOwS3xnOVdEase', 'account', 'employee', 'chuaco'),
('vaaA', 'Nguyen Van D', '$2y$10$HHx6qq9zBnZQN53QL4TrnOvjY3ULh8T6b1o.A9bvofC', 'account', 'employee', 'chuaco'),
('vaADaA', 'Nguyen Van D', '$2y$10$jWGQu931PB/ELKVBu98SPekE6FHn91Xr8RdGMn6P3TN', 'employee', 'account', 'chuaco'),
('vanA', 'Nguyen Van A', '$2a$12$lr8oMIsU4nghqgAyv6BB0uAGi.noUlMB64P530.gAgdVnIqoq3Ecu', 'employee', '12345', ''),
('vanB', 'Nguyen Van B', '$2a$12$EPloFHUnsX3G0lhjFJO11OFSzTfJqTOembcWAKUwFih', 'employee', '12345', ''),
('vanC', 'Nguyen Van C', '$2a$12$EPloFHUnsX3G0lhjFJO11OFSzTfJqTOembcWAKUwFih', 'account', 'employee', 'chuaco'),
('vanD', 'Nguyen Van D', '$2a$12$EPloFHUnsX3G0lhjFJO11OFSzTfJqTOembcWAKUwFih', 'account', 'employee', 'chuaco'),
('vanE', 'Nguyen Van D', '$2a$12$EPloFHUnsX3G0lhjFJO11OFSzTfJqTOembcWAKUwFih', 'account', 'employee', 'chuaco'),
('vanF', 'Nguyen Van D', '$2a$12$EPloFHUnsX3G0lhjFJO11OFSzTfJqTOembcWAKUwFih', 'account', 'employee', 'chuaco');

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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `file`
--

CREATE TABLE `file` (
  `file_tag` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `detail` varchar(5000) COLLATE utf8_unicode_ci DEFAULT NULL
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
  `tag_file` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`username`);

--
-- Chỉ mục cho bảng `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
