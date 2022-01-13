-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 13, 2022 lúc 09:08 AM
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
('51900620', 'Hoài Bảo', '$2y$10$kmEyWOb2VMhLJfbGxpiYJepElXtDu1lfDN956wa.KcjZ8fgiHyoWW', 'employee', '117', '', ''),
('admin', 'Phan Van An', '$2a$12$lr8oMIsU4nghqgAyv6BB0uAGi.noUlMB64P530.gAgdVnIqoq3Ecu', 'admin', '', '', 'admin'),
('hungnguyen', 'Nguyen Phuoc Hung', '$2y$10$REAanlDYTJGZBgPHQ7PYluCHXlpvYPx89tjlwdkGecgp9TMsNThV6', 'employee', '115', '', ''),
('vanA', 'Nguyen Van A', '$2a$12$lr8oMIsU4nghqgAyv6BB0uAGi.noUlMB64P530.gAgdVnIqoq3Ecu', 'leader', '115', '', ''),
('vanB', 'Nguyen Van B', '$2a$12$lr8oMIsU4nghqgAyv6BB0uAGi.noUlMB64P530.gAgdVnIqoq3Ecu', 'employee', '115', '', ''),
('vongoctram', 'Vo Ngoc Tram', '$2y$10$cU2KqJIb5YX.MlH3f1nNNOgGhJTus4mfmfPHpNeZvGIN057E.1bFG', 'leader', '117', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `day_off`
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
-- Đang đổ dữ liệu cho bảng `day_off`
--

INSERT INTO `day_off` (`id`, `employeeId`, `day_start`, `reason`, `result`, `reason_result`, `department_id`, `num_day_off`, `day_off_request`, `tag_file`, `day_off_response`, `date_request`) VALUES
('61ded6c82e060', 'vanB', '2022-01-13', '3123123', 'Accept', NULL, '115', '3', '3', '', '2022-01-12', '2022-01-12');

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
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `task_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `submit`
--

CREATE TABLE `submit` (
  `submit_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `task_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `submit_date` datetime NOT NULL,
  `tag_file` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `deatail` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tag_file_response` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `detail_response` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `submit`
--

INSERT INTO `submit` (`submit_id`, `task_id`, `submit_date`, `tag_file`, `deatail`, `status`, `tag_file_response`, `detail_response`) VALUES
('61def88b57e53', '61def6b08ba21', '2022-01-12 22:49:00', '../file/google_api_key.txt', 'Trâm Võ', 'Completed', '', '0'),
('61dfa18b63846', '61def6b08ba21', '2022-01-13 10:50:00', '../file/Huong dan.txt', 'Kiểm tra', 'Reject', '', '0'),
('61dfa1e24a470', '61df9363a132a', '2022-01-13 10:52:00', '../file/Huong dan.txt', 'Tính toán', 'Completed', '', '0'),
('61dfbb4976d9c', '61df9363a132a', '2022-01-13 12:40:00', '../file/data.sql', '423234324324234', 'Waiting', '', '0'),
('61dfbb76c0767', '61df9363a132a', '2022-01-13 12:41:00', '../file/data.sql', '12313', 'Waiting', '', '0'),
('61dfbb8259177', '61df9363a132a', '2022-01-13 12:41:00', '../file/data.sql', '312312', 'Waiting', '', '0'),
('61dfbbcc64cf1', '61df9e356b7d9', '2022-01-13 12:42:00', '../file/data.sql', '12321', 'Completed', '', '0'),
('61dfbdc1a3ec6', '61df9363a132a', '2022-01-13 12:50:00', '../file/data.sql', '231312', 'Waiting', '', '0'),
('61dfbdcec0f1e', '61df9363a132a', '2022-01-13 12:51:00', '../file/data.sql', '321312312312321313', 'Waiting', '', '0');

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
  `department_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `review` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `process` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `task`
--

INSERT INTO `task` (`id`, `title`, `detail`, `start_day`, `deadline`, `account_id`, `status`, `tag_file`, `department_id`, `review`, `process`) VALUES
('61def6b08ba21', 'Bảo Bảo', 'Trâm Võ', '2022-01-12 22:41:00', '2022-01-15 00:45:00', 'vanB', 'Waiting', '../file/Huong dan.txt', '115', 'ok', 'Hoàn thành đúng hạn'),
('61df9363a132a', 'Tính toán sổ sách', 'Tính toán sổ sách', '2022-01-13 09:50:00', '2022-01-15 09:49:00', 'vanB', 'Canceled', '../file/Huong dan.txt', '115', 'GOOD', 'Hoàn thành đúng hạn'),
('61df9e356b7d9', 'Kiểm tra', 'Kiểm tra', '2022-01-13 10:36:00', '2022-01-13 10:36:00', 'vanB', 'Completed', ' ', '115', 'OK', 'Hoàn thành trễ hạn');

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
-- Chỉ mục cho bảng `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `submit`
--
ALTER TABLE `submit`
  ADD PRIMARY KEY (`submit_id`);

--
-- Chỉ mục cho bảng `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
