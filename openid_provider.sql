-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 17, 2020 lúc 07:35 PM
-- Phiên bản máy phục vụ: 10.3.16-MariaDB
-- Phiên bản PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `openid_provider`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `client`
--

CREATE TABLE `client` (
  `client_id` varchar(30) NOT NULL,
  `client_secrect` varchar(30) NOT NULL,
  `name_client` varchar(30) NOT NULL,
  `url_redirect` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `client`
--

INSERT INTO `client` (`client_id`, `client_secrect`, `name_client`, `url_redirect`, `state`, `created_at`, `updated_at`) VALUES
('595974', '210583', 'TestDemo', 'http://localhost:888/rp.com/cb', '472797', '2020-06-17 10:49:02', '2020-06-17 10:49:02'),
('750931', '424775', 'Test1', 'http://localhost:88/rp.com/cb', '267669', '2020-06-08 18:12:26', '2020-06-08 18:12:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `code`
--

CREATE TABLE `code` (
  `id` int(30) NOT NULL,
  `code` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `client_id` varchar(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `updated_at` datetime(6) NOT NULL,
  `created_at` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `code`
--

INSERT INTO `code` (`id`, `code`, `state`, `client_id`, `user_id`, `name`, `updated_at`, `created_at`) VALUES
(174, 'uO6sYSPAPo', '472797', '595974', 34, 'admin admin test', '2020-06-17 16:55:26.000000', '2020-06-17 16:55:26.000000'),
(175, '5HnE1SBLIY', '472797', '595974', 34, 'admin admin test', '2020-06-17 17:12:54.000000', '2020-06-17 17:12:54.000000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `token`
--

CREATE TABLE `token` (
  `id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `id_token` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `token_type` varchar(30) NOT NULL,
  `client_id` varchar(30) NOT NULL,
  `expires_in` int(30) NOT NULL,
  `updated_at` datetime(6) NOT NULL,
  `created_at` datetime(6) NOT NULL,
  `access_token` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `firstname` varchar(30) DEFAULT NULL,
  `lastname` varchar(30) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `user_info`
--

INSERT INTO `user_info` (`user_id`, `name`, `username`, `password`, `email`, `phone`, `firstname`, `lastname`, `address`, `updated_at`, `created_at`) VALUES
(34, 'admin admin test', 'admin', '123456', 'abc@abc', '090390909', 'admin', 'test', 'vietnam', '2020-06-09 06:59:20', '2020-06-09 06:59:20'),
(35, 'test demo', 'test', '123456', 'test@gmail.com', '1234567', 'test', 'demo', 'abc test', '2020-06-17 10:52:38', '2020-06-17 10:52:38');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);

--
-- Chỉ mục cho bảng `code`
--
ALTER TABLE `code`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `code`
--
ALTER TABLE `code`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT cho bảng `token`
--
ALTER TABLE `token`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;

--
-- AUTO_INCREMENT cho bảng `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
