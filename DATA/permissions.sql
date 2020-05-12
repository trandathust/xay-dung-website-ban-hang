-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 07, 2020 lúc 07:38 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_shopping`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'user', 'Nhóm Người Dùng', 0, NULL, NULL),
(2, 'product', 'Nhóm Sản Phẩm', 0, NULL, NULL),
(3, 'category', 'Nhóm Danh Mục Sản Phẩm', 0, NULL, NULL),
(4, 'order', 'Nhóm Đơn Hàng', 0, NULL, NULL),
(5, 'supplier', 'Nhóm Nhà Cung Cấp', 0, NULL, NULL),
(6, 'brand', 'Nhóm Thương Hiệu', 0, NULL, NULL),
(7, 'slider', 'Nhóm Slider', 0, NULL, NULL),
(8, 'setting', 'Nhóm Cài Đặt', 0, NULL, NULL),
(9, 'blog', 'Nhóm Bài Viết', 0, NULL, NULL),
(10, 'role', 'Nhóm Vai Trò', 0, NULL, NULL),
(11, 'add-user', 'Thêm Người Dùng', 1, NULL, NULL),
(12, 'edit-user', 'Sửa Người Dùng', 1, NULL, NULL),
(13, 'list-user', 'Xem Người Dùng', 1, NULL, NULL),
(14, 'delete-user', 'Xóa Người Dùng', 1, NULL, NULL),
(15, 'add-product', 'Thêm Sản Phẩm', 2, NULL, NULL),
(16, 'edit-product', 'Sửa Sản Phẩm', 2, NULL, NULL),
(17, 'list-product', 'Xem Sản Phẩm', 2, NULL, NULL),
(18, 'delete-product', 'Xóa Sản Phẩm', 2, NULL, NULL),
(19, 'add-category', 'Thêm Danh Mục', 3, NULL, NULL),
(20, 'edit-category', 'Sửa Danh Mục', 3, NULL, NULL),
(21, 'delete-category', 'Xóa Danh Mục', 3, NULL, NULL),
(22, 'list-order', 'Xem Đơn Hàng', 4, NULL, NULL),
(23, 'update-order', 'Cập Nhật Đơn Hàng', 4, NULL, NULL),
(24, 'delete-order', 'Xóa Đơn Hàng', 4, NULL, NULL),
(25, 'add-supplier', 'Thêm Nhà Cung Cấp', 5, NULL, NULL),
(26, 'edit-supplier', 'Sửa Nhà Cung Cấp', 5, NULL, NULL),
(27, 'delete-supplier', 'Xóa Nhà Cung Cấp', 5, NULL, NULL),
(28, 'add-brand', 'Thêm Thương Hiệu', 6, NULL, NULL),
(29, 'edit-brand', 'Sửa Thương Hiệu', 6, NULL, NULL),
(30, 'delete-brand', 'Xóa Thương hiệu', 6, NULL, NULL),
(31, 'add-slider', 'Thêm Slider', 7, NULL, NULL),
(32, 'list-slider', 'Xem Slider', 7, NULL, NULL),
(33, 'edit-slider', 'Sửa Slider', 7, NULL, NULL),
(34, 'delete-slider', 'Xóa Slider', 7, NULL, NULL),
(35, 'add-setting', 'Thêm Cài Đặt', 8, NULL, NULL),
(36, 'edit-setting', 'Sửa Cài Đặt', 8, NULL, NULL),
(37, 'delete-setting', 'Xóa Cài Đặt', 8, NULL, NULL),
(38, 'add-blog', 'Thêm Bài Viết', 9, NULL, NULL),
(39, 'list-blog', 'Xem Bài Viết', 9, NULL, NULL),
(40, 'edit-blog', 'Sửa Bài Viết', 9, NULL, NULL),
(41, 'delete-blog', 'Xóa Bài Viết', 9, NULL, NULL),
(42, 'add-role', 'Thêm Vai Trò', 10, NULL, NULL),
(43, 'edit-role', 'Sửa Vai Trò', 10, NULL, NULL),
(44, 'delete-role', 'Xóa Vai Trò', 10, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
