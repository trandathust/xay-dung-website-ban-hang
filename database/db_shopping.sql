-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 03, 2020 lúc 06:27 AM
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
-- Cấu trúc bảng cho bảng `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_image_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `title_image_path`, `title_image_name`, `content`, `user_id`, `status`, `slug`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Hóa ra mốt áo giấu quần lại là công thức hot nhất 2018', '/storage/blog/1/ZJgKzavhuzjYCGtf1B52.jpg', 'thoi-trang-giau-quan-1.jpg', '<p>L&agrave; một c&ocirc; g&aacute;i,ai cũng muốn thử đủ loại phong c&aacute;ch kh&aacute;c nhau.Từ &aacute;o croptop,v&aacute;y d&agrave;i,v&aacute;y ngắn,&hellip;v&agrave; kh&ocirc;ng thể kh&ocirc;ng nhắc đ&ecirc;n l&agrave; &aacute;o giấu quần.D&ugrave; đ&atilde; bao năm tr&ocirc;i qua,&aacute;o giấu quần vẫn l&agrave; c&ocirc;ng thức được c&aacute;c c&ocirc; n&agrave;ng y&ecirc;u qu&yacute; v&agrave; trong 2018 n&agrave;y,&nbsp;<strong>thời trang</strong>&nbsp;<strong>giấu quần</strong>&nbsp;lại một lần nữa l&agrave;m &ldquo;mưa l&agrave;m gi&oacute;&rdquo;.H&atilde;y diện ngay style &aacute;o giấu quần th&ocirc;i c&aacute;c n&agrave;ng ơi !</p>\r\n<p><img src=\"http://localhost:8000/storage/photos/1/thoi-trang-giau-quan.jpg\" alt=\"\" width=\"960\" height=\"891\" /></p>\r\n<p>&Aacute;o thun trắng lu&ocirc;n l&agrave; item basic được c&aacute;c c&ocirc; n&agrave;ng y&ecirc;u qu&yacute; hơn.<strong>Mốt &aacute;o giấu quần</strong>&nbsp;mặc với &aacute;o thun trắng th&igrave; lại cực xinh.Đảm bảo c&aacute;c n&agrave;ng sẽ c&oacute; một&nbsp;<a href=\"https://www.talkbeauty.vn/street-style\">set đồ street style</a>&nbsp;cực hay ho đ&oacute;!</p>\r\n<p><img src=\"http://localhost:8000/storage/photos/1/thoi-trang-giau-quan-1.jpg\" alt=\"\" width=\"969\" height=\"606\" /></p>\r\n<p><a href=\"https://www.talkbeauty.vn/mix-match/mixmatch-phoi-ao-thun-tron-17-idea-thoi-da-xai-hoai-khong-het-chang-lo-nham-chan-nua-roi-4264.html\">&Aacute;o thun basic&nbsp;</a>dấu quần đ&atilde; đẹp rồi,những chiếc &aacute;o cải m&agrave;u như hồng-xanh,đen -trắng lại c&agrave;ng đẹp hơn.Nhất l&agrave; khi c&aacute;c n&agrave;ng nhấn nh&aacute; c&ugrave;ng một&nbsp;<a href=\"https://www.talkbeauty.vn/xu-huong/xu-huong-diem-mat-6-kieu-kinh-dep-duoc-tin-do-thoi-trang-me-tit-dua-nhau-sam-cho-bang-duoc-4232.html\">chiếc k&iacute;nh trendy&nbsp;</a>lại c&agrave;ng cool hơn rất nhiều đ&oacute;!</p>\r\n<p>Đừng tưởng thời trang &aacute;o giấu quần chỉ d&agrave;nh cho c&aacute;c c&ocirc; n&agrave;ng c&aacute; t&iacute;nh,c&ocirc;ng thức n&agrave;y c&ograve;n rất ph&ugrave; hợp với những c&ocirc; n&agrave;ng &ldquo;b&aacute;nh b&egrave;o&rdquo; khi mặc&nbsp;<a href=\"https://www.talkbeauty.vn/mix-match/mixmatch-phoi-do-voi-ao-tre-vai-cong-thuc-don-gian-ma-cuc-xinh-4374.html\">&aacute;o trễ vai&nbsp;</a>theo style giấu quần.C&ocirc;ng thức n&agrave;y tuy đơn giản nhưng lại cực thoải m&aacute;i m&agrave; cực xinh khi diện đi dạo phố hay c&agrave; ph&ecirc; tr&agrave; chiều c&ugrave;ng bạn b&egrave; đ&oacute;!</p>', 1, 1, 'hoa-ra-mot-ao-giau-quan-lai-la-cong-thuc-hot-nhat-2018', NULL, '2020-06-01 19:32:41', '2020-06-01 19:32:41'),
(2, 'Gợi ý phối đồ diện đồ \'party\' đa dạng phong cách cho các nàng', '/storage/blog/1/B0TDZ2VZfHWtpZxZPN25.webp', 'dam-da-hoi-dai-xe-ta-2-day-quyen-ru-3-mau-do-den-vang-huyen-thoai-70144j.webp', '<p>Những bữa tiệc c&ugrave;ng c&ocirc;ng ty, lịch đi chơi với bạn b&egrave;... l&agrave; dịp để bạn ăn diện cầu k&igrave; hơn. Vậy n&ecirc;n, đừng bỏ lỡ gợi &yacute; phối đồ dưới đ&acirc;y để tr&aacute;nh bị &ldquo;ch&igrave;m nghỉm&rdquo; nh&eacute;. Let&rsquo;s go!</p>\r\n<p><strong>Đầm quyến rũ</strong></p>\r\n<div class=\"ads-share-group\" data-interval=\"5000000\">\r\n<div class=\"ads-banner ads-share-item\">\r\n<div class=\"HTMLAds\" data-id=\"71\" data-type=\"HTML\" data-position=\"ADS_IN_CONTENT\">Những chiếc v&aacute;y chất liệu nhung sang chảnh hoặc chất liệu voan bay bổng chắc chắn sẽ rất hợp với c&aacute;c n&agrave;ng. Ngo&agrave;i ra, đừng qu&ecirc;n những phụ kiện như khuy&ecirc;n tai, v&ograve;ng tay, hay thậm ch&iacute; l&agrave; găng tay,... sẽ rất ph&ugrave; hợp khi diện chiếc v&aacute;y n&agrave;y.</div>\r\n<div class=\"HTMLAds\" data-id=\"71\" data-type=\"HTML\" data-position=\"ADS_IN_CONTENT\"><img src=\"http://localhost:8000/storage/photos/1/1000-1_72000af82d494ca8be011a01dead2b73_master.jpg\" alt=\"\" /></div>\r\n<div class=\"HTMLAds\" data-id=\"71\" data-type=\"HTML\" data-position=\"ADS_IN_CONTENT\">Ngo&agrave;i ra, việc chọn \"quẩy\" kiểu đầm c&uacute;p ngực ngọt ng&agrave;o, nữ t&iacute;nh cũng l&agrave; \"nước cờ\" th&ocirc;ng minh để bản th&acirc;n d&ugrave; kh&ocirc;ng lồng lộn, cầu k&igrave; vẫn nổi bật v&agrave; g&acirc;y ch&uacute; &yacute;.</div>\r\n<div class=\"HTMLAds\" data-id=\"71\" data-type=\"HTML\" data-position=\"ADS_IN_CONTENT\">\r\n<p>Nếu muốn sang chảnh v&agrave; sexy th&igrave; c&oacute; ngay đ&acirc;y, kiểu đầm hở lưng n&agrave;y sẽ l&agrave; \"vũ kh&iacute;\" gi&uacute;p bạn khoe d&aacute;ng đẹp nức nở trong đ&ecirc;m tiệc chứ kh&ocirc;ng đ&ugrave;a.</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p><strong>Combo &aacute;o xuy&ecirc;n thấu ch&acirc;n v&aacute;y da tuyệt đỉnh</strong></p>\r\n<p>&Aacute;o xuy&ecirc;n thấu v&agrave; đầm da được xem l&agrave; \"combo\" ho&agrave;n hảo gi&uacute;p bạn toả s&aacute;ng v&agrave; chất ngầu \"một c&acirc;y\" trong tiệc tối. V&igrave; vậy, nếu muốn người kh&aacute;c trầm trồ hết cỡ, bạn tốt nhất đừng bỏ s&oacute;t outfit n&agrave;y.</p>\r\n<p><img src=\"http://localhost:8000/storage/photos/1/skv6326-15520365882322028881484.jpg\" alt=\"\" /></p>\r\n</div>\r\n</div>\r\n</div>', 1, 1, 'goi-y-phoi-do-dien-do-party-da-dang-phong-cach-cho-cac-nang', NULL, '2020-06-01 19:34:55', '2020-06-01 19:34:55'),
(3, 'Hàng loạt show diễn từ các thương hiệu lớn bị hủy bỏ, đại dịch COVID-19 đã càn quét làng thời trang như thế này đây!', '/storage/blog/1/7vtYvuLoVYU9eiM1h3ct.jpg', 'fashion-show-1.jpg', '<p>Th&aacute;ng của những Fashion Show đ&atilde; đi qua. Khi đ&oacute;, những t&aacute;c động của đại dịch Covid-19 chưa r&otilde; rệt. Cho đến nay, t&igrave;nh thế đ&atilde; xoay chuyển 180 độ. Covid-19 vẫn đang tiếp tục l&acirc;y lan, rất nhiều thương hiệu thời trang lớn khuy&ecirc;n nh&acirc;n vi&ecirc;n của họ n&ecirc;n l&agrave;m việc ở nh&agrave;. C&aacute;c Fashion Show v&agrave;&nbsp;<a href=\"https://www.talkbeauty.vn/tag/review-tuan-le-thoi-trang\" target=\"_blank\" rel=\"noopener\">Tuần lễ Thời trang</a>&nbsp;bị ảnh hưởng nặng nề, thậm ch&iacute; l&agrave; hủy bỏ.</p>\r\n<p>&nbsp;</p>\r\n<p><img src=\"http://localhost:8000/storage/photos/1/fashion-show-2.jpg\" alt=\"\" /></p>\r\n<p>&nbsp;</p>\r\n<p><strong><span style=\"color: #9c0000;\">Chanel</span></strong></p>\r\n<p>Chanel th&ocirc;ng b&aacute;o rằng họ sẽ ho&atilde;n show diễn M&eacute;tiers d\'Art - dự kiến tổ chức ở Bắc Kinh v&agrave;o th&aacute;ng 5 tới v&agrave; show diễn London Haute Couture - dự kiến diễn ra v&agrave;o th&aacute;ng 6. Tuy nhi&ecirc;n, Chanel vẫn chưa n&oacute;i th&ecirc;m về show diễn tổ chức v&agrave;o ng&agrave;y 7/5 ở Capri, &Yacute; c&oacute; bị ho&atilde;n hay kh&ocirc;ng.</p>', 1, 1, 'hang-loat-show-dien-tu-cac-thuong-hieu-lon-bi-huy-bo-dai-dich-covid-19-da-can-quet-lang-thoi-trang-nhu-the-nay-day', NULL, '2020-06-01 19:36:11', '2020-06-01 19:47:33'),
(4, '[Tin Tức] Tom Ford vừa trình làng bộ sưu tập son mới đã lọt ngay vào danh sách son hot năm 2020: 16 màu chấp hết mọi phong cách!', '/storage/blog/1/w7ySUq1y9IDooa7HIb4m.jpeg', 'son-tom-ford.jpeg', '<p>Mỗi khi son&nbsp;<a href=\"https://www.talkbeauty.vn/tag/review-tom-ford\">Tom Ford</a>&nbsp;được ra mắt lu&ocirc;n l&agrave; đề t&agrave;i tranh luận &ldquo;b&ugrave;ng nổ&rdquo; tr&ecirc;n c&aacute;c diễn đ&agrave;n l&agrave;m đẹp; với thiết thiết kết v&ocirc; c&ugrave;ng &ldquo;chanh xả&rdquo; khiến n&oacute; kh&ocirc;ng chỉ l&agrave; son m&ocirc;i m&agrave; c&ograve;n l&agrave; m&oacute;n đồ thời trang. Bộ sưu tập Most Wanted n&agrave;y c&oacute; mức gi&aacute; khoảng 1.500.000 VNĐ/ thỏi v&agrave; sẽ được ra mắt v&agrave;o th&aacute;ng 5 n&agrave;y trước sự ng&oacute;ng chờ của c&aacute;c t&iacute;n đồ.<img src=\"http://localhost:8000/storage/photos/1/son-tom-ford.jpeg\" alt=\"\" width=\"1003\" height=\"752\" /></p>\r\n<div><strong><span style=\"color: #ff0000;\">16 m&agrave;u ho&agrave;n to&agrave;n mới&nbsp;</span></strong></div>\r\n<div>Tom Ford tin rằng \"Son b&oacute;ng giống như một phụ kiện thời trang trong cuộc sống, thể hiện những đặc điểm v&agrave; n&eacute;t quyến rũ độc đ&aacute;o nhất của mọi người\". C&ugrave;ng với niềm tin đ&oacute;, h&atilde;ng&nbsp;<a href=\"https://www.talkbeauty.vn/tag/review-son-high-end\">son high end&nbsp;</a>cho ra mắt 16 m&agrave;u mới trong bộ sưu tập sắp ra mắt. Đ&aacute;ng ch&uacute; &yacute;, trong&nbsp;<em>bảng m&agrave;u son tom ford&nbsp;</em>lần n&agrave;y c&oacute; 7 m&agrave;u ch&iacute;nh được chia th&agrave;nh hai nh&oacute;m gồm m&agrave;u tr&agrave; sữa nhẹ nh&agrave;ng ph&ugrave; hợp v&agrave;o ban ng&agrave;y v&agrave; nh&oacute;m m&agrave;u gợi cảm d&agrave;nh cho ban đ&ecirc;m. Miễn bạn đặt cả hai thỏi v&agrave;o trong t&uacute;i, ho&agrave;n to&agrave;n dễ d&agrave;ng &ldquo;ứng ph&oacute;&rdquo; với những dịp kh&aacute;c nhau trong c&ugrave;ng một ng&agrave;y</div>\r\n<div><img src=\"http://localhost:8000/storage/photos/1/son-tom-ford-1.jpeg\" alt=\"\" width=\"981\" height=\"513\" /></div>', 1, 0, 'tin-tuc-tom-ford-vua-trinh-lang-bo-suu-tap-son-moi-da-lot-ngay-vao-danh-sach-son-hot-nam-2020-16-mau-chap-het-moi-phong-cach', NULL, '2020-06-01 19:38:53', '2020-06-01 19:38:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Louis Vuitton', 'louis-vuitton', 'Louis Vuitton', NULL, '2020-06-01 20:35:47', '2020-06-01 20:35:47'),
(2, 'Hermès', 'hermes', 'Hermès', NULL, '2020-06-01 20:36:20', '2020-06-01 20:36:20'),
(3, 'Prada', 'prada', 'Prada', NULL, '2020-06-01 20:36:27', '2020-06-01 20:36:27'),
(4, 'Chanel', 'chanel', 'Chanel', NULL, '2020-06-01 20:36:32', '2020-06-01 20:36:32'),
(5, 'Gucci', 'gucci', 'Gucci', NULL, '2020-06-01 20:36:38', '2020-06-01 20:36:38'),
(6, 'Burberry', 'burberry', 'Burberry', NULL, '2020-06-01 20:36:47', '2020-06-01 20:36:47'),
(7, 'Dolce và Gabbana “D & G”', 'dolce-va-gabbana-d-g', 'Dolce và Gabbana “D & G”', NULL, '2020-06-01 20:36:57', '2020-06-01 20:36:57'),
(8, 'Armani', 'armani', 'Armani', NULL, '2020-06-01 20:37:04', '2020-06-01 20:37:04'),
(9, 'Canifa', 'canifa', 'Canifa', NULL, '2020-06-01 20:37:15', '2020-06-01 20:37:15'),
(10, 'Elise', 'elise', 'Elise', NULL, '2020-06-01 20:37:28', '2020-06-01 20:37:28'),
(11, 'NEM Fashion', 'nem-fashion', 'NEM Fashion', NULL, '2020-06-01 20:37:34', '2020-06-01 20:37:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Quần Áo Nam', 0, 'quan-ao-nam', '2020-06-01 20:18:52', '2020-06-01 20:32:48', NULL),
(2, 'Quần Áo Nam', 1, 'quan-ao-nam', '2020-06-01 20:20:46', '2020-06-01 20:32:38', '2020-06-01 20:32:38'),
(3, 'Quần Áo Nữ', 1, 'quan-ao-nu', '2020-06-01 20:22:34', '2020-06-01 20:32:41', '2020-06-01 20:32:41'),
(4, 'Giày Dép', 0, 'giay-dep', '2020-06-01 20:25:18', '2020-06-01 20:25:18', NULL),
(5, 'Đồng Hồ', 0, 'dong-ho', '2020-06-01 20:25:27', '2020-06-01 20:25:27', NULL),
(6, 'Túi Xách', 0, 'tui-xach', '2020-06-01 20:28:04', '2020-06-01 20:28:04', NULL),
(7, 'Quần Áo Nữ', 0, 'quan-ao-nu', '2020-06-01 20:33:02', '2020-06-01 20:33:02', NULL),
(8, 'Quần Áo Trẻ Em', 0, 'quan-ao-tre-em', '2020-06-01 20:33:10', '2020-06-01 20:33:10', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menus`
--

INSERT INTO `menus` (`id`, `name`, `parent_id`, `slug`, `url`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'Menu Đầu Trang', 0, 'menu-header', '', NULL, NULL, NULL),
(4, 'Trang Chủ', 3, 'trang-chu', 'http://127.0.0.1:8000', '2020-06-01 20:56:59', '2020-06-01 20:56:59', NULL),
(5, 'Sản Phẩm', 3, 'san-pham', 'http://127.0.0.1:8000/shopping', '2020-06-01 20:58:19', '2020-06-01 20:58:19', NULL),
(6, 'Khuyến Mại', 5, 'khuyen-mai', 'http://127.0.0.1:8000/shopping/sale', '2020-06-01 20:59:06', '2020-06-01 20:59:06', NULL),
(7, 'Mới Nhất', 5, 'moi-nhat', 'http://127.0.0.1:8000/shopping/new', '2020-06-01 20:59:26', '2020-06-01 20:59:26', NULL),
(8, 'Bài Viết', 3, 'bai-viet', 'http://127.0.0.1:8000/blog', '2020-06-01 21:00:17', '2020-06-01 21:00:17', NULL),
(9, 'Liên Hệ', 3, 'lien-he', 'http://127.0.0.1:8000/', '2020-06-01 21:00:59', '2020-06-01 21:00:59', NULL),
(10, 'Menu Xem Nhanh', 0, 'menu-xem-nhanh', '', NULL, NULL, NULL),
(11, 'Sản Phẩm Khuyến Mại', 14, 'san-pham-khuyen-mai', 'http://127.0.0.1:8000/shopping/sale', '2020-06-01 21:02:35', '2020-06-01 21:05:06', NULL),
(12, 'Sản Phẩm Mới', 14, 'san-pham-moi', 'http://127.0.0.1:8000/shopping/new', '2020-06-01 21:03:08', '2020-06-01 21:05:20', NULL),
(13, 'Giỏ Hàng', 14, 'gio-hang', 'http://127.0.0.1:8000/cart', '2020-06-01 21:03:41', '2020-06-01 21:04:48', NULL),
(14, 'Menu Thông Tin', 0, 'menu-thong-tin', '', NULL, NULL, NULL),
(15, 'Bài Viết Mới', 14, 'bai-viet-moi', 'http://127.0.0.1:8000/blog', '2020-06-01 21:05:47', '2020-06-01 21:05:47', NULL),
(16, 'Quần Áo Nam', 10, 'quan-ao-nam', 'http://127.0.0.1:8000/category/1/quan-ao-nam', '2020-06-01 21:06:19', '2020-06-01 21:06:19', NULL),
(17, 'Quần Áo Nữ', 10, 'quan-ao-nu', 'http://127.0.0.1:8000/category/7/quan-ao-nu', '2020-06-01 21:06:36', '2020-06-01 21:06:36', NULL),
(18, 'Túi Xách', 10, 'tui-xach', 'http://127.0.0.1:8000/category/6/tui-xach', '2020-06-01 21:06:50', '2020-06-01 21:06:50', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_04_20_142316_create_categories_table', 1),
(4, '2020_04_20_143416_create_products_table', 1),
(5, '2020_04_20_165952_create_tags_table', 1),
(6, '2020_04_20_170531_create_product_tags_table', 1),
(7, '2020_04_20_185809_create_product_images_table', 1),
(8, '2020_04_21_073034_add_columm_deleted_ad_to_product', 1),
(9, '2020_04_21_103102_add_columm_deleted_ad_to_users', 1),
(10, '2020_04_21_135641_create_sliders_table', 1),
(11, '2020_04_21_164054_create_settings_table', 1),
(12, '2020_04_22_003928_add_column_name_to_setting', 1),
(13, '2020_04_22_022333_add_avatar_collumn_to_users', 1),
(14, '2020_04_22_115953_create_customers_table', 1),
(15, '2020_04_23_161428_add_column_quanty_to_table_product', 1),
(16, '2020_04_23_163119_create_brands_table', 1),
(17, '2020_04_27_064838_create_orders_table', 1),
(18, '2020_04_27_065010_create_product_orders_table', 1),
(19, '2020_04_27_075101_add_column_message_to_table_orders', 1),
(20, '2020_04_29_010806_create_statuses_table', 1),
(21, '2020_04_29_011148_add_column_to_table_product', 1),
(22, '2020_04_29_012252_create_suppliers_table', 1),
(23, '2020_05_05_020515_create_column_status_to_table_product', 1),
(24, '2020_05_05_060951_create_column_status_to_table_slider', 1),
(25, '2020_05_05_124418_create_product_comments_table', 1),
(26, '2020_05_05_142749_create_blogs_table', 1),
(27, '2020_05_06_055535_create_blog_comments_table', 1),
(28, '2020_05_07_073135_create_column_price_to_table_product_order', 1),
(29, '2020_05_07_123390_create_roles_table', 1),
(30, '2020_05_08_065136_create_column_url_to_table_sliders', 1),
(31, '2020_05_08_142335_create_menus_table', 1),
(32, '2020_05_08_154256_create_column_total_money_to_table_orders', 1),
(33, '2020_05_7_123330_create_permissions_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `status_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_money` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `customer_id`, `status_id`, `deleted_at`, `created_at`, `updated_at`, `message`, `total_money`) VALUES
(3, 1, NULL, '1', NULL, '2020-06-01 23:08:22', '2020-06-01 23:51:22', NULL, 424000),
(4, 1, NULL, '3', NULL, '2020-06-01 23:43:53', '2020-06-01 23:52:26', NULL, 1930000),
(5, 1, NULL, '1', NULL, '2020-06-02 07:27:17', '2020-06-02 07:27:17', NULL, 2380000),
(6, 3, NULL, '1', NULL, '2020-06-02 08:38:01', '2020-06-02 08:38:01', NULL, 1819000),
(7, 3, NULL, '1', NULL, '2020-06-02 08:38:57', '2020-06-02 08:38:57', NULL, 3145000),
(8, 3, NULL, '1', NULL, '2020-06-02 08:39:12', '2020-06-02 08:39:12', NULL, 1030000);

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
(5, 'menu', 'Nhóm Menu', 0, NULL, NULL),
(6, 'supplier', 'Nhóm Nhà Cung Cấp', 0, NULL, NULL),
(7, 'brand', 'Nhóm Thương Hiệu', 0, NULL, NULL),
(8, 'slider', 'Nhóm Slider', 0, NULL, NULL),
(9, 'setting', 'Nhóm Cài Đặt', 0, NULL, NULL),
(10, 'blog', 'Nhóm Bài Viết', 0, NULL, NULL),
(11, 'role', 'Nhóm Vai Trò', 0, NULL, NULL),
(12, 'add-user', 'Thêm Người Dùng', 1, NULL, NULL),
(13, 'edit-user', 'Sửa Người Dùng', 1, NULL, NULL),
(14, 'list-user', 'Xem Người Dùng', 1, NULL, NULL),
(15, 'delete-user', 'Xóa Người Dùng', 1, NULL, NULL),
(16, 'add-product', 'Thêm Sản Phẩm', 2, NULL, NULL),
(17, 'edit-product', 'Sửa Sản Phẩm', 2, NULL, NULL),
(18, 'list-product', 'Xem Sản Phẩm', 2, NULL, NULL),
(19, 'delete-product', 'Xóa Sản Phẩm', 2, NULL, NULL),
(20, 'add-category', 'Thêm Danh Mục', 3, NULL, NULL),
(21, 'edit-category', 'Sửa Danh Mục', 3, NULL, NULL),
(22, 'delete-category', 'Xóa Danh Mục', 3, NULL, NULL),
(23, 'list-order', 'Xem Đơn Hàng', 4, NULL, NULL),
(24, 'update-order', 'Cập Nhật Đơn Hàng', 4, NULL, NULL),
(25, 'delete-order', 'Xóa Đơn Hàng', 4, NULL, NULL),
(26, 'add-menu', 'Thêm Menu', 5, NULL, NULL),
(27, 'edit-menu', 'Sửa Menu', 5, NULL, NULL),
(28, 'delete-menu', 'Xóa Menu', 5, NULL, NULL),
(29, 'add-supplier', 'Thêm Nhà Cung Cấp', 6, NULL, NULL),
(30, 'edit-supplier', 'Sửa Nhà Cung Cấp', 6, NULL, NULL),
(31, 'delete-supplier', 'Xóa Nhà Cung Cấp', 6, NULL, NULL),
(32, 'add-brand', 'Thêm Thương Hiệu', 7, NULL, NULL),
(33, 'edit-brand', 'Sửa Thương Hiệu', 7, NULL, NULL),
(34, 'delete-brand', 'Xóa Thương hiệu', 7, NULL, NULL),
(35, 'add-slider', 'Thêm Slider', 8, NULL, NULL),
(36, 'list-slider', 'Xem Slider', 8, NULL, NULL),
(37, 'edit-slider', 'Sửa Slider', 8, NULL, NULL),
(38, 'delete-slider', 'Xóa Slider', 8, NULL, NULL),
(39, 'add-setting', 'Thêm Cài Đặt', 9, NULL, NULL),
(40, 'edit-setting', 'Sửa Cài Đặt', 9, NULL, NULL),
(41, 'delete-setting', 'Xóa Cài Đặt', 9, NULL, NULL),
(42, 'add-blog', 'Thêm Bài Viết', 10, NULL, NULL),
(43, 'list-blog', 'Xem Bài Viết', 10, NULL, NULL),
(44, 'edit-blog', 'Sửa Bài Viết', 10, NULL, NULL),
(45, 'delete-blog', 'Xóa Bài Viết', 10, NULL, NULL),
(46, 'add-role', 'Thêm Vai Trò', 11, NULL, NULL),
(47, 'edit-role', 'Sửa Vai Trò', 11, NULL, NULL),
(48, 'delete-role', 'Xóa Vai Trò', 11, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permission_role`
--

CREATE TABLE `permission_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permission_role`
--

INSERT INTO `permission_role` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(173, 1, 12, NULL, NULL),
(174, 1, 13, NULL, NULL),
(175, 1, 14, NULL, NULL),
(176, 1, 15, NULL, NULL),
(177, 1, 16, NULL, NULL),
(178, 1, 17, NULL, NULL),
(179, 1, 18, NULL, NULL),
(180, 1, 19, NULL, NULL),
(181, 1, 20, NULL, NULL),
(182, 1, 21, NULL, NULL),
(183, 1, 22, NULL, NULL),
(184, 1, 23, NULL, NULL),
(185, 1, 24, NULL, NULL),
(186, 1, 25, NULL, NULL),
(187, 1, 26, NULL, NULL),
(188, 1, 27, NULL, NULL),
(189, 1, 28, NULL, NULL),
(190, 1, 29, NULL, NULL),
(191, 1, 30, NULL, NULL),
(192, 1, 31, NULL, NULL),
(193, 1, 32, NULL, NULL),
(194, 1, 33, NULL, NULL),
(195, 1, 34, NULL, NULL),
(196, 1, 35, NULL, NULL),
(197, 1, 36, NULL, NULL),
(198, 1, 37, NULL, NULL),
(199, 1, 38, NULL, NULL),
(200, 1, 39, NULL, NULL),
(201, 1, 40, NULL, NULL),
(202, 1, 41, NULL, NULL),
(203, 1, 42, NULL, NULL),
(204, 1, 43, NULL, NULL),
(205, 1, 44, NULL, NULL),
(206, 1, 45, NULL, NULL),
(207, 1, 46, NULL, NULL),
(208, 1, 47, NULL, NULL),
(209, 1, 48, NULL, NULL),
(210, 4, 16, NULL, NULL),
(211, 4, 17, NULL, NULL),
(212, 4, 18, NULL, NULL),
(213, 4, 19, NULL, NULL),
(214, 4, 23, NULL, NULL),
(215, 4, 24, NULL, NULL),
(216, 4, 25, NULL, NULL),
(217, 2, 12, NULL, NULL),
(218, 2, 13, NULL, NULL),
(219, 2, 14, NULL, NULL),
(220, 2, 15, NULL, NULL),
(221, 2, 16, NULL, NULL),
(222, 2, 17, NULL, NULL),
(223, 2, 18, NULL, NULL),
(224, 2, 19, NULL, NULL),
(225, 2, 20, NULL, NULL),
(226, 2, 21, NULL, NULL),
(227, 2, 22, NULL, NULL),
(228, 2, 23, NULL, NULL),
(229, 2, 24, NULL, NULL),
(230, 2, 25, NULL, NULL),
(231, 2, 29, NULL, NULL),
(232, 2, 30, NULL, NULL),
(233, 2, 31, NULL, NULL),
(234, 2, 32, NULL, NULL),
(235, 2, 33, NULL, NULL),
(236, 2, 34, NULL, NULL),
(237, 3, 42, NULL, NULL),
(238, 3, 43, NULL, NULL),
(239, 3, 44, NULL, NULL),
(240, 3, 45, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `feature_image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `brand_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_sale` int(11) DEFAULT NULL,
  `start_sale` datetime DEFAULT NULL,
  `end_sale` datetime DEFAULT NULL,
  `supplier_id` int(11) NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` double(8,2) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `feature_image_path`, `feature_image_name`, `content`, `category_id`, `user_id`, `created_at`, `updated_at`, `deleted_at`, `quantity`, `brand_id`, `price_sale`, `start_sale`, `end_sale`, `supplier_id`, `size`, `weight`, `status`) VALUES
(1, 'T-Shirt', 150000, '/storage/product/1/aujTP8feqa2cTRBOynTX.jpg', 'gallery2.jpg', '<div class=\"kP-bM3\">Bộ quần &aacute;o nam m&ugrave;a h&egrave;, vải loại 1 co d&atilde;n, tho&aacute;ng m&aacute;t, phối viền in Logo ngực tr&aacute;i 1. GIỚI THIỆU: - Quần &aacute;o thể thao M&ugrave;a h&egrave; c&oacute; &yacute; nghĩa rất quan trọng trong việc mang lại cảm hứng hăng say tập luyện cũng như tạo n&ecirc;n c&aacute; t&iacute;nh cho bạn. - Với nhu cầu ng&agrave;y nay, sự ra đời của d&ograve;ng sản phẩm quần &aacute;o thể thao mang đến cho giới y&ecirc;u thể thao những bộ quần &aacute;o thể thao mới lạ v&agrave; độc đ&aacute;o. - Chất liệu vải Thun tho&aacute;ng nhẹ được chọn lọc từ c&aacute;c th&agrave;nh phần hỗ trợ đặc biệt cho c&aacute;c hoạt động thể thao như: 100% polyester, spandex, cotton&hellip; - Ngo&agrave;i ra, với c&ocirc;ng nghệ in ti&ecirc;n tiến nhất cho ph&eacute;p mực in &eacute;p chặt v&agrave;o từng sợi vải, gi&uacute;p sản phẩm quần &aacute;o thể thao lu&ocirc;n bền m&agrave;u m&agrave; vẫn giữ được sự tho&aacute;ng m&aacute;t cần c&oacute;. 2. KIỂU D&Aacute;NG: - Được thiết kế kiểu cơ bản - Với d&aacute;ng &ocirc;m vừa phải, cổ tr&ograve;n, tay ngắn - Quần d&agrave;i tới đầu gối gi&uacute;p dễ vận động - H&igrave;nh in b&ecirc;n ngực tr&aacute;i bền, đẹp ko bong khi giặt 3. TH&Ocirc;NG TIN SẢN PHẨM: - Chất vải: Thun lạnh, mặc tho&aacute;ng m&aacute;t, co d&atilde;n 4 chiều. - Bảng Size \"Bộ quần &aacute;o thể thao\": + Size M : Từ 46 &ndash; 55 Kg + Size L : Từ 56 &ndash; 65 Kg + Size XL : Từ 66 &ndash; 80 Kg *Lưu &Yacute;: Dựa theo c&acirc;n nặng của đa số KH đ&atilde; mua \"Bộ quần &aacute;o thể thao Nam\" của Shop, bạn n&agrave;o b&eacute;o, cao, c&oacute; bụng, th&iacute;ch mặc form rộng hoặc &ocirc;m sẽ t&ugrave;y thuộc v&agrave;o chiều cao. CHAT với Shop để được tư vấn cụ thể nh&eacute;. 4. CH&Iacute;NH S&Aacute;CH ĐỔI TRẢ: - Được đổi-trả nếu c&oacute; lỗi của NSX. - Được đổi-trả nếu kh&ocirc;ng đ&uacute;ng với Ảnh-Video. - Shop hỗ trợ đổi nếu size kh&ocirc;ng vừa.</div>', 1, 1, '2020-06-01 22:30:45', '2020-06-01 22:30:45', NULL, 100, '1', NULL, NULL, NULL, 1, 'XL', 0.20, 1),
(2, 'Bộ quần áo nam mùa hè', 150000, '/storage/product/1/ftuoflwIJaZmc6NjXSGn.jpg', 'áo phông nam 2.jpg', '<p>Bộ quần &aacute;o nam m&ugrave;a h&egrave;, vải loại 1 co d&atilde;n, tho&aacute;ng m&aacute;t, phối viền in Logo ngực tr&aacute;i 1. GIỚI THIỆU: - Quần &aacute;o thể thao M&ugrave;a h&egrave; c&oacute; &yacute; nghĩa rất quan trọng trong việc mang lại cảm hứng hăng say tập luyện cũng như tạo n&ecirc;n c&aacute; t&iacute;nh cho bạn. - Với nhu cầu ng&agrave;y nay, sự ra đời của d&ograve;ng sản phẩm quần &aacute;o thể thao mang đến cho giới y&ecirc;u thể thao những bộ quần &aacute;o thể thao mới lạ v&agrave; độc đ&aacute;o. - Chất liệu vải Thun tho&aacute;ng nhẹ được chọn lọc từ c&aacute;c th&agrave;nh phần hỗ trợ đặc biệt cho c&aacute;c hoạt động thể thao như: 100% polyester, spandex, cotton&hellip; - Ngo&agrave;i ra, với c&ocirc;ng nghệ in ti&ecirc;n tiến nhất cho ph&eacute;p mực in &eacute;p chặt v&agrave;o từng sợi vải, gi&uacute;p sản phẩm quần &aacute;o thể thao lu&ocirc;n bền m&agrave;u m&agrave; vẫn giữ được sự tho&aacute;ng m&aacute;t cần c&oacute;. 2. KIỂU D&Aacute;NG: - Được thiết kế kiểu cơ bản - Với d&aacute;ng &ocirc;m vừa phải, cổ tr&ograve;n, tay ngắn - Quần d&agrave;i tới đầu gối gi&uacute;p dễ vận động - H&igrave;nh in b&ecirc;n ngực tr&aacute;i bền, đẹp ko bong khi giặt 3. TH&Ocirc;NG TIN SẢN PHẨM: - Chất vải: Thun lạnh, mặc tho&aacute;ng m&aacute;t, co d&atilde;n 4 chiều. - Bảng Size \"Bộ quần &aacute;o thể thao\": + Size M : Từ 46 &ndash; 55 Kg + Size L : Từ 56 &ndash; 65 Kg + Size XL : Từ 66 &ndash; 80 Kg *Lưu &Yacute;: Dựa theo c&acirc;n nặng của đa số KH đ&atilde; mua \"Bộ quần &aacute;o thể thao Nam\" của Shop, bạn n&agrave;o b&eacute;o, cao, c&oacute; bụng, th&iacute;ch mặc form rộng hoặc &ocirc;m sẽ t&ugrave;y thuộc v&agrave;o chiều cao. CHAT với Shop để được tư vấn cụ thể nh&eacute;. 4. CH&Iacute;NH S&Aacute;CH ĐỔI TRẢ: - Được đổi-trả nếu c&oacute; lỗi của NSX. - Được đổi-trả nếu kh&ocirc;ng đ&uacute;ng với Ảnh-Video. - Shop hỗ trợ đổi nếu size kh&ocirc;ng vừa.</p>', 1, 1, '2020-06-01 22:38:07', '2020-06-01 22:38:07', NULL, 500, '5', 100000, '2020-06-01 00:00:00', '2020-07-31 00:00:00', 4, 'XL', 0.20, 1),
(3, 'Quần áo sơ mi nam công sở', 370000, '/storage/product/1/rzcBITtihZf3bo0jqdg3.jpg', 'áo sơ mi nam.jpg', '<p>Shop ch&agrave;o Anh/chị! Khi mua h&agrave;ng tại shop Anh/chị ho&agrave;n to&agrave;n y&ecirc;n t&acirc;m v&igrave; được kiểm tra h&agrave;ng trước khi thanh to&aacute;n v&agrave; được đổi trả với mọi l&yacute; do nha Anh/Chị. &Aacute;O SƠ MI NAM VẢI LỤA CHẤT ĐẸP KH&Ocirc;NG NHĂN KH&Ocirc;NG X&Ugrave; --H&agrave;ng c&oacute; sẵn, đủ size: Từ M, L, XL, XXL, XXXL Size M: Nặng khoảng 54kg trở xuống, vai :40cm ; ngực: 90cm; bụng: 82 ; chiều d&agrave;i &aacute;o: 67 cm ; chiều d&agrave;i tay &aacute;o: 60cm. Size L: Nặng khoảng 55kg đến 60kg.vai :41cm ; ngực: 92cm; bụng: 84 ; chiều d&agrave;i &aacute;o: 70 cm ; chiều d&agrave;i tay &aacute;o: 61cm. Size XL: Nặng khoảng 60kg đến 67kg. vai :42cm ; ngực: 96cm; bụng: 86 ; chiều d&agrave;i &aacute;o: 73 cm ; chiều d&agrave;i tay &aacute;o: 62cm. Size XXL: Nặng khoảng 67kg đến 73kg. vai :44cm ; ngực: 100cm; bụng: 90 ; chiều d&agrave;i &aacute;o: 76 cm ; chiều d&agrave;i tay &aacute;o: 63cm Size 3XL: Nặng khoảng 73kg đến 83kg. vai :46cm ; ngực: 105cm; bụng: 94; chiều d&agrave;i &aacute;o: 79cm ; chiều d&agrave;i tay &aacute;o: 64cm Ch&uacute;ng t&ocirc;i hiện nay cung cấp &aacute;o sơ mi nam với gi&aacute; b&aacute;n lẻ tốt tr&ecirc;n thị trường. -Gi&aacute; cạnh tranh do ch&iacute;nh nh&agrave; m&aacute;y sản xuất với số lượng lớn. -Ch&uacute;ng t&ocirc;i kh&ocirc;ng n&oacute;i sản phẩm của m&igrave;nh c&oacute; chất lượng cao nhưng phải khẳng định chất lượng sản phẩm vượt trội so với gi&aacute; tiền. -Uy t&iacute;n b&aacute;n h&agrave;ng được đặt l&ecirc;n h&agrave;ng đầu, kh&ocirc;ng kinh doanh chộp giật. - -V&igrave; sản phẩm được sản xuất với số lượng lớn để c&oacute; gi&aacute; cạnh tranh n&ecirc;n kh&ocirc;ng thể tr&aacute;nh được sai s&oacute;t. Nếu qu&yacute; kh&aacute;ch h&agrave;ng kh&ocirc;ng h&agrave;i l&ograve;ng ch&uacute;ng t&ocirc;i sẵn s&agrave;ng hỗ trợ đổi trả. - -Rất mong nhận được &yacute; kiến đ&oacute;ng g&oacute;p của Qu&yacute; kh&aacute;ch h&agrave;ng để ch&uacute;ng t&ocirc;i cải thiện chất lượng dịch vụ tốt hơn.</p>', 1, 1, '2020-06-01 22:41:36', '2020-06-01 22:41:36', NULL, 100, '2', NULL, NULL, NULL, 2, 'XL', 0.20, 1),
(4, 'Sơ mi nam ghi chất đũi cực mát mitmia', 1000000, '/storage/product/1/dw1QxitB5XoLvIsABmAv.jpg', 'áo sơ mi nam.jpg', '<p>BẠN NHỚ LIKE SẢN PHẨM V&Agrave; THEO D&Otilde;I SHOP ĐỂ LU&Ocirc;N CẬP NHẬT M&Atilde; GIẢM GI&Aacute;, CHƯƠNG TR&Igrave;NH DEAL SỐC , KHUYẾN M&Atilde;I KHỦNG TRONG TH&Ocirc;NG B&Aacute;O CỦA BẠN NHA, C&Aacute;M ƠN BẠN!!! TH&Ocirc;NG TIN SẢN PHẨM sơ mi nam cổ t&agrave;u: -&gt; Chất lụa trơn, mềm mịn mỏng kh&ocirc;ng nhăn, kh&ocirc;ng x&ugrave;, kh&ocirc;ng bai, kh&ocirc;ng phai m&agrave;u. Mếch cổ v&agrave; tay l&agrave;m bằng chất liệu cao cấp, kh&ocirc;ng sợ bong tr&oacute;c. -&gt; Form body H&agrave;n Quốc &ocirc;m trọn bờ vai mặc cực trẻ trung v&agrave; phong c&aacute;ch, ph&ugrave; hợp mọi ho&agrave;n cảnh kể cả đi chơi v&agrave; đi l&agrave;m. -&gt; Xuất Xứ : Việt Nam - -&gt; Sản phẩm c&oacute; c&aacute;c size như sau: 👉SIZE M: C&acirc;n nặng 48-55kg, Cao 1m50 - 1m62, \" &Aacute;o D&agrave;i giữa cổ sau đến lai bầu 68cm, Vai 38cm, V&ograve;ng ngực 88cm, Chiết eo 76cm, D&agrave;i tay 54cm\" 👉SIZE L: Can nặng 55- 60kg, Cao 1m60 - 1m68, \" &Aacute;o D&agrave;i giữa cổ sau đến lai bầu 70cm, Vai 40cm, V&ograve;ng Ngực 92cm, Chiết eo 80cm, D&agrave;i tay 56cm\" 👉SIZE XL: c&acirc;n nặng 60 - 68kg, Cao 1m65 - 1m72, \" &Aacute;o D&agrave;i giữa cổ sau xuống lai bầu 72cm, Vai 42cm, V&ograve;ng ngực 96cm, Chiết eo 84cm, D&agrave;i tay 58cm\" 👉SIZE XXL: C&acirc;n nặng 65 -74kg Cao 1m7. - 1m80, &Aacute;o D&agrave;i giữa cổ sau xuống lai bầu 74cm, Vai 46cm, V&ograve;ng Ngực 100cm, Chiết eo 90cm, D&agrave;i tay 60cm\" -&gt;H&agrave;ng c&oacute; sẵn, đủ size: M, L, XL, XXL, 3XL =&gt;CH&Uacute;NG T&Ocirc;I CAM KẾT 👉 Cam kết chất lượng v&agrave; mẫu m&atilde; sản phẩm giống với h&igrave;nh ảnh. 👉 Ho&agrave;n tiền nếu sản phẩm kh&ocirc;ng giống với m&ocirc; tả. 👉 Được kiểm tra h&agrave;ng trước khi thanh to&aacute;n. 👉 Cam kết được đổi trả h&agrave;ng trong v&ograve;ng 7 ng&agrave;y. H&atilde;y ch&aacute;t ngay với shop để được tư vấn size ph&ugrave; hợp</p>', 1, 1, '2020-06-01 22:45:11', '2020-06-01 22:45:11', NULL, 25, '9', 900000, '2020-06-01 00:00:00', '2020-08-08 00:00:00', 4, 'XL', 0.20, 1),
(5, 'Bộ lụa pijama cao cấp', 500000, '/storage/product/1/15DdjOXCwHHMox5n9fdo.jpg', 'quần áo nữ jp2g.jpg', '<p>Bộ chất gấm lụa sang trọng, cao cấp C&oacute; 4 m&agrave;u xanh, đỏ, hồng, n&acirc;u</p>\r\n<p>Size từ 45-65 kg</p>\r\n<p>H&agrave;ng cao cấp 230k giảm gi&aacute; chỉ c&ograve;n 140k xả h&agrave;ng</p>', 7, 1, '2020-06-01 22:49:17', '2020-06-02 08:38:57', NULL, 98, '4', 350000, '2020-06-01 00:00:00', '2020-08-07 00:00:00', 3, 'L', 0.20, 1),
(6, 'Bộ lụa mặc nhà Pijama họa tiết xích bướm', 450000, '/storage/product/1/4sSfCFb1UJX0HJb4sQQi.jpg', 'quần áo nữ.jpg', '<p>🍒 🍒PIJAMA LỤA MẶC NH&Agrave; - XUỐNG PHỐ XINH SANG 🍒🍒 &mdash;&mdash; Đắt Xắt Ra Miếng &mdash;&mdash; 🌻</p>\r\n<p>Thương hiệu: Quảng Ch&acirc;u</p>\r\n<p>🌻Chất liệu : Lụa QC, 3M \"mềm.mịn.m&aacute;t\"</p>\r\n<p>🌻 Phong c&aacute;ch : Homewear - Street style</p>\r\n<p>➡️ Gi&aacute; ni&ecirc;m yết : 450k ➡ Một m&agrave;u như ảnh</p>\r\n<p>❌🆓 size : 45 - 60kg 🆓 ship nội th&agrave;nh HCM từ 2 sản phẩm🆓</p>\r\n<p>🍃 Với h&agrave;ng nhập Quảng Ch&acirc;u th&igrave; &rdquo; tiền n&agrave;o l&agrave; của nấy&rdquo; 🍃 Xin gửi tới c&aacute;c EVA những mẫu bộ măc nh&agrave; tinh tế từng đường chỉ, xinh sang ➖➖➖➖➖➖➖➖➖➖➖</p>\r\n<p>✅H&agrave;ng c&oacute; sẵn tại shop ✅Tư vấn nhanh 0976916847</p>', 7, 1, '2020-06-01 22:52:51', '2020-06-02 07:27:17', NULL, 44, '2', NULL, NULL, NULL, 2, 'Z', 0.20, 1),
(7, 'Áo Sơ Mi Sọc Ngắn Tay Cho Bé Trai', 150000, '/storage/product/1/XSDOfPBNbWQuZ0PY3Qjh.jpg', 'ao-so-mi-soc-ngan-tay-cho-be-trai-size-dai-co-10-14-tuoi_(6).jpg', '<h2>&Aacute;o sơ mi tay ngắn cho b&eacute; trai mặc đi chơi, đi tiệc phong c&aacute;ch</h2>\r\n<p>Dễ d&agrave;ng kết hợp chiếc &aacute;o sơ mi với c&aacute;c kiểu quần để b&eacute; đi chơi, đi tiệc.&nbsp;<strong><a href=\"https://babi.vn/t/ao-so-mi-ke-soc-cho-be-trai/\">&Aacute;o sơ mi sọc</a></strong>&nbsp;tay ngắn cho b&eacute; trai b&ecirc;n dưới l&agrave; lựa chon th&iacute;ch hợp cho c&aacute;c b&eacute; trai 10 tuổi đến 14 tuổi mặc trong h&egrave; năm nay. Với phong c&aacute;ch lịch l&atilde;m, c&aacute; t&iacute;nh v&agrave; năng động, chiếc &aacute;o sơ mi kh&ocirc;ng thể thiếu trong tủ quần &aacute;o của con. Mẹ mua ngay cho b&eacute; mặc thời trang n&egrave; mẹ ơi.</p>\r\n<p><strong>TH&Ocirc;NG TIN SẢN PHẨM</strong></p>\r\n<table dir=\"ltr\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\"><colgroup><col width=\"125\" /><col width=\"391\" /></colgroup>\r\n<tbody>\r\n<tr>\r\n<td><span style=\"color: #333333; font-family: sans-serif, Arial, Verdana, Trebuchet MS;\">T&ecirc;n sản phẩm</span></td>\r\n<td>&Aacute;o Sơ Mi Sọc Ngắn Tay Cho B&eacute; Trai Size Đại Cồ (10 - 14 tuổi)</td>\r\n</tr>\r\n<tr>\r\n<td><span style=\"color: #333333; font-family: sans-serif, Arial, Verdana, Trebuchet MS;\">M&atilde; sản phẩm</span></td>\r\n<td><span style=\"color: #333333; font-family: sans-serif, Arial, Verdana, Trebuchet MS;\">21297</span></td>\r\n</tr>\r\n<tr>\r\n<td><span style=\"color: #333333; font-family: sans-serif, Arial, Verdana, Trebuchet MS;\">M&agrave;u sắc</span></td>\r\n<td>\r\n<p><span style=\"color: #333333; font-family: sans-serif, Arial, Verdana, Trebuchet MS;\">1 - Sọc đỏ<br />2 - Sọc xanh da<br />3 - Sọc xanh ngọc</span></p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td><span style=\"color: #333333; font-family: sans-serif, Arial, Verdana, Trebuchet MS;\">M&ocirc; tả</span></td>\r\n<td>\r\n<p><span style=\"color: #333333; font-family: sans-serif, Arial, Verdana, Trebuchet MS;\">Tay ngắn, họa tiết sọc caro, mix logo nhỏ s&agrave;nh điệu, chi tiết sản phẩm như h&igrave;nh chụp</span></p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td><span style=\"color: #333333; font-family: sans-serif, Arial, Verdana, Trebuchet MS;\">Chất liệu</span></td>\r\n<td><span style=\"color: #333333; font-family: sans-serif, Arial, Verdana, Trebuchet MS;\">Vải kate</span></td>\r\n</tr>\r\n<tr>\r\n<td><span style=\"color: #333333; font-family: sans-serif, Arial, Verdana, Trebuchet MS;\">Size quần &aacute;o</span></td>\r\n<td><span style=\"color: #333333; font-family: sans-serif, Arial, Verdana, Trebuchet MS;\">20, 21, 22, 23, 24</span></td>\r\n</tr>\r\n<tr>\r\n<td><span style=\"color: #333333; font-family: sans-serif, Arial, Verdana, Trebuchet MS;\">Size Babi</span></td>\r\n<td><span style=\"color: #333333; font-family: sans-serif, Arial, Verdana, Trebuchet MS;\">10, 11, 12, 13, 14</span></td>\r\n</tr>\r\n<tr>\r\n<td><span style=\"color: #333333; font-family: sans-serif, Arial, Verdana, Trebuchet MS;\">Tuổi</span></td>\r\n<td><span style=\"color: #333333; font-family: sans-serif, Arial, Verdana, Trebuchet MS;\">Từ 10 tuổi - 14 tuổi</span></td>\r\n</tr>\r\n<tr>\r\n<td><span style=\"color: #333333; font-family: sans-serif, Arial, Verdana, Trebuchet MS;\">C&acirc;n nặng</span></td>\r\n<td><span style=\"color: #333333; font-family: sans-serif, Arial, Verdana, Trebuchet MS;\">Từ 35kg - 52kg</span></td>\r\n</tr>\r\n<tr>\r\n<td><span style=\"color: #333333; font-family: sans-serif, Arial, Verdana, Trebuchet MS;\">Xuất xứ</span></td>\r\n<td><span style=\"color: #333333; font-family: sans-serif, Arial, Verdana, Trebuchet MS;\">Việt Nam</span></td>\r\n</tr>\r\n</tbody>\r\n</table>', 8, 1, '2020-06-01 22:55:59', '2020-06-02 08:38:57', NULL, 98, '4', 135000, '2020-06-01 00:00:00', '2020-08-07 00:00:00', 3, 'L', 0.20, 1),
(8, 'Áo Thun Ba Lỗ Cho Bé Trai Nhiều Màu', 100000, '/storage/product/1/gLYWQbgztL3NGGezAByR.jpg', 'ao-thun-ba-lo-cho-be-trai-nhieu-mau-gia-re-6-thang-3-tuoi_(3).jpg', '<h2>&Aacute;o thun ba lỗ cho b&eacute; trai mặc m&aacute;t mẻ m&ugrave;a h&egrave;</h2>\r\n<p>M&ugrave;a h&egrave; đến, những chiếc &aacute;o ba lỗ rất cần thiết để b&eacute; mặc m&aacute;t, lu&ocirc;n cảm thấy dễ chịu để b&eacute; thoải m&aacute;i vui đ&ugrave;a, chay nhảy khi ở nh&agrave;. Babi về &aacute;o thun ba lỗ&nbsp;m&agrave;u trơn, nhiều m&agrave;u sắc ngẫu nhi&ecirc;n ph&ugrave; hợp với b&eacute; trai.&nbsp;Thun cotton 4 chiều dễ thấm h&uacute;t mồ h&ocirc;i, b&eacute; mặc th&iacute;ch. Gi&aacute; rẻ 39.000đ mẹ mua v&agrave;i c&aacute;i cho b&eacute; mặc nh&agrave; nh&eacute; mẹ ơi.</p>\r\n<div class=\"img_desc_top\"><img src=\"https://babi.vn/images/companies/1/Up%20hinh%20san%20pham/22584/ao-thun-ba-lo-cho-be-trai-nhieu-mau-gia-re-6-thang-3-tuoi%20(1).JPG?1582191936426\" alt=\"\" /></div>\r\n<div class=\"img_desc_top\"><img src=\"https://babi.vn/images/companies/1/Up%20hinh%20san%20pham/22584/ao-thun-ba-lo-cho-be-trai-nhieu-mau-gia-re-6-thang-3-tuoi%20(2).JPG?1582191943898\" alt=\"\" /></div>\r\n<div class=\"img_desc_top\"><img src=\"https://babi.vn/images/companies/1/Up%20hinh%20san%20pham/22584/ao-thun-ba-lo-cho-be-trai-nhieu-mau-gia-re-6-thang-3-tuoi%20(3).JPG?1582191948992\" alt=\"\" /></div>\r\n<p><strong>TH&Ocirc;NG TIN SẢN PHẨM</strong>&nbsp;</p>\r\n<div class=\"img_desc_top\">\r\n<table dir=\"ltr\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\"><colgroup><col width=\"125\" /><col width=\"391\" /></colgroup>\r\n<tbody>\r\n<tr>\r\n<td><span style=\"font-family: sans-serif, Arial, Verdana, Trebuchet MS;\">T&ecirc;n sản phẩm&nbsp;</span></td>\r\n<td>\r\n<p>&Aacute;o Thun Ba Lỗ Cho B&eacute; Trai Nhiều M&agrave;u Gi&aacute; Rẻ (6 th&aacute;ng - 3 tuổi)</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td><span style=\"color: #333333; font-family: sans-serif, Arial, Verdana, Trebuchet MS;\">M&atilde; sản phẩm</span></td>\r\n<td>22584</td>\r\n</tr>\r\n<tr>\r\n<td><span style=\"font-family: sans-serif, Arial, Verdana, Trebuchet MS;\">M&agrave;u sắc</span></td>\r\n<td>\r\n<p><span style=\"font-family: sans-serif, Arial, Verdana, Trebuchet MS;\">1 - M&agrave;u ngẫu nhi&ecirc;n</span></p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td><span style=\"color: #333333; font-family: sans-serif, Arial, Verdana, Trebuchet MS;\">Họa tiết</span></td>\r\n<td>&Aacute;o ba lỗ, m&agrave;u trơn, nhiều m&agrave;u sắc ngẫu nhi&ecirc;n ph&ugrave; hợp với b&eacute; trai</td>\r\n</tr>\r\n<tr>\r\n<td><span style=\"color: #333333; font-family: sans-serif, Arial, Verdana, Trebuchet MS;\">Chất liệu&nbsp;</span></td>\r\n<td>Thun cotton 4 chiều</td>\r\n</tr>\r\n<tr>\r\n<td><span style=\"color: #333333; font-family: sans-serif, Arial, Verdana, Trebuchet MS;\">Size Quần &aacute;o</span></td>\r\n<td><span style=\"font-family: sans-serif, Arial, Verdana, Trebuchet MS;\">2, 3, 4, 5, 6, 7</span></td>\r\n</tr>\r\n<tr>\r\n<td><span style=\"font-family: sans-serif, Arial, Verdana, Trebuchet MS;\">Size Babi</span></td>\r\n<td>69, 99, 01(4,5), 02, 03</td>\r\n</tr>\r\n<tr>\r\n<td><span style=\"color: #333333; font-family: sans-serif, Arial, Verdana, Trebuchet MS;\">Tuổi</span></td>\r\n<td>Từ 6 th&aacute;ng - 3 tuổi</td>\r\n</tr>\r\n<tr>\r\n<td><span style=\"font-family: sans-serif, Arial, Verdana, Trebuchet MS;\">C&acirc;n nặng</span></td>\r\n<td>Từ 7.5kg - 15kg</td>\r\n</tr>\r\n<tr>\r\n<td><span style=\"color: #333333; font-family: sans-serif, Arial, Verdana, Trebuchet MS;\">Xuất xứ</span></td>\r\n<td><span style=\"color: #333333; font-family: sans-serif, Arial, Verdana, Trebuchet MS;\">Việt Nam</span></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>', 8, 1, '2020-06-01 22:58:53', '2020-06-02 08:38:57', NULL, 98, '1', 80000, '2020-06-01 00:00:00', '2020-08-04 00:00:00', 1, 'Z', 0.20, 1),
(9, 'Áo Đầm Trẻ Em Cao Cấp Vải Voan', 259000, '/storage/product/1/FSOpKaUTyeBBKWuxAhw3.jpg', 'ao-dam-tre-em-cao-cap-vai-voan-dinh-kim-sa-sang-chanh-2-8-tuoi-vi_(3).jpg', '<h2>&Aacute;o đầm trẻ em cao cấp, t&ugrave;ng x&ograve;e, b&eacute; mặc dễ thương.</h2>\r\n<p>Kiểu&nbsp;<strong><a href=\"https://babi.vn/thoi-trang-be-gai-184/vay-dam-cong-chua.html\">đầm c&ocirc;ng ch&uacute;a cho b&eacute; g&aacute;i</a></strong>, họa tiết h&igrave;nh sao đ&iacute;nh kim sa sang trọng.&nbsp;&Aacute;o 3 lớp: b&ecirc;n ngo&agrave;i voan ren, lớp giữa l&agrave; phi, l&oacute;t kate b&ecirc;n trong.&nbsp;T&ugrave;ng 4 lớp: 2 lớp lưới, 1 lớp phi, 1 lớp kate,&nbsp;s&aacute;t n&aacute;ch, d&acirc;y k&eacute;o ph&iacute;a sau, ph&iacute;a sau c&oacute; cột d&acirc;y nơ, b&eacute; mặc x&uacute;ng x&iacute;nh dễ thương. M&agrave;u đỏ, trắng v&agrave; hồng nữ t&iacute;nh rất th&iacute;ch hợp cho b&eacute; mặc đ&oacute;n Noel v&agrave; dịp tết. Mẹ nhanh mua cho b&eacute; kẻo hết h&agrave;ng, dự l&agrave; hot lắm ạ.</p>\r\n<div class=\"img_desc_top\"><img src=\"https://babi.vn/images/companies/1/Up%20hinh%20san%20pham/311856/untitled%20folder/ao-dam-tre-em-cao-cap-vai-voan-dinh-kim-sa-sang-chanh-2-8-tuoi-vi%20(2).JPG?1578482543994\" alt=\"\" /></div>\r\n<div class=\"img_desc_top\"><img src=\"https://babi.vn/images/companies/1/Up%20hinh%20san%20pham/311856/untitled%20folder/ao-dam-tre-em-cao-cap-vai-voan-dinh-kim-sa-sang-chanh-2-8-tuoi-vi%20(3).JPG?1578482560979\" alt=\"\" /></div>\r\n<div class=\"img_desc_top\"><img src=\"https://babi.vn/images/companies/1/Up%20hinh%20san%20pham/311856/untitled%20folder/ao-dam-tre-em-cao-cap-vai-voan-dinh-kim-sa-sang-chanh-2-8-tuoi-vi%20(4).JPG?1578482577945\" alt=\"\" /></div>\r\n<div class=\"img_desc_top\"><img src=\"https://babi.vn/images/companies/1/Up%20hinh%20san%20pham/311856/untitled%20folder/ao-dam-tre-em-cao-cap-vai-voan-dinh-kim-sa-sang-chanh-2-8-tuoi-vi%20(5).JPG?1578482595703\" alt=\"\" /></div>\r\n<div class=\"img_desc_top\"><img src=\"https://babi.vn/images/companies/1/Up%20hinh%20san%20pham/311856/untitled%20folder/ao-dam-tre-em-cao-cap-vai-voan-dinh-kim-sa-sang-chanh-2-8-tuoi-vi%20(6).JPG?1578482612605\" alt=\"\" /></div>\r\n<div class=\"img_desc_top\"><img src=\"https://babi.vn/images/companies/1/Up%20hinh%20san%20pham/311856/untitled%20folder/ao-dam-tre-em-cao-cap-vai-voan-dinh-kim-sa-sang-chanh-2-8-tuoi-vi%20(1).JPG?1578482630681\" alt=\"\" /></div>\r\n<p><strong>TH&Ocirc;NG TIN SẢN PHẨM</strong>&nbsp;</p>\r\n<div class=\"img_desc_top\">\r\n<table dir=\"ltr\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\"><colgroup><col width=\"125\" /><col width=\"391\" /></colgroup>\r\n<tbody>\r\n<tr>\r\n<td><span style=\"font-family: sans-serif, Arial, Verdana, Trebuchet MS;\">T&ecirc;n sản phẩm&nbsp;</span></td>\r\n<td><strong>&Aacute;o Đầm Trẻ Em Cao Cấp Vải Voan Đ&iacute;nh Kim Sa Sang Chảnh&nbsp; (2 - 8 tuổi)</strong></td>\r\n</tr>\r\n<tr>\r\n<td><span style=\"font-family: sans-serif, Arial, Verdana, Trebuchet MS;\">M&atilde; sản phẩm</span></td>\r\n<td>311856</td>\r\n</tr>\r\n<tr>\r\n<td><span style=\"font-family: sans-serif, Arial, Verdana, Trebuchet MS;\">M&agrave;u sắc</span></td>\r\n<td>\r\n<p><span style=\"font-family: sans-serif, Arial, Verdana, Trebuchet MS;\">1 - M&agrave;u đỏ<br />2 - M&agrave;u hồng<br />3 - M&agrave;u trắng</span></p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td><span style=\"font-family: sans-serif, Arial, Verdana, Trebuchet MS;\">Họa tiết</span></td>\r\n<td><span style=\"color: #000000;\">&Aacute;o s&aacute;t n&aacute;ch, d&acirc;y k&eacute;o ph&iacute;a sau, ph&iacute;a sau c&oacute; cột d&acirc;y nơ.<br />&Aacute;o 3 lớp, t&ugrave;ng v&aacute;y 4 lớp.</span></td>\r\n</tr>\r\n<tr>\r\n<td><span style=\"font-family: sans-serif, Arial, Verdana, Trebuchet MS;\">Chất liệu&nbsp;</span></td>\r\n<td>&Aacute;o 3 lớp: b&ecirc;n ngo&agrave;i voan ren, lớp giữa l&agrave; phi, l&oacute;t kate b&ecirc;n trong.<br />T&ugrave;ng 4 lớp: 2 lớp lưới, 1 lớp phi, 1 lớp kate</td>\r\n</tr>\r\n<tr>\r\n<td><span style=\"font-family: sans-serif, Arial, Verdana, Trebuchet MS;\">Size Quần &aacute;o</span></td>\r\n<td>3, 4, 5, 6, 7, 8, 9, 10</td>\r\n</tr>\r\n<tr>\r\n<td><span style=\"font-family: sans-serif, Arial, Verdana, Trebuchet MS;\">Size Babi</span></td>\r\n<td><span style=\"color: #000000;\">02(3,4), 03, 04, 05, 06, 07, 08</span></td>\r\n</tr>\r\n<tr>\r\n<td><span style=\"font-family: sans-serif, Arial, Verdana, Trebuchet MS;\">Tuổi</span></td>\r\n<td>Từ 2 tuổi - 8 tuổi</td>\r\n</tr>\r\n<tr>\r\n<td><span style=\"font-family: sans-serif, Arial, Verdana, Trebuchet MS;\">C&acirc;n nặng</span></td>\r\n<td>Từ 11kg - 30kg</td>\r\n</tr>\r\n<tr>\r\n<td><span style=\"font-family: sans-serif, Arial, Verdana, Trebuchet MS;\">Xuất xứ</span></td>\r\n<td><span style=\"font-family: sans-serif, Arial, Verdana, Trebuchet MS;\">Việt Nam</span></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>', 8, 1, '2020-06-01 23:01:40', '2020-06-02 08:38:01', NULL, 98, '4', NULL, NULL, NULL, 3, 'XL', 0.20, 1),
(10, 'Boot Cao Cho Nữ', 600000, '/storage/product/1/JQIhaPbzJykQOlEvWP3t.jpg', '27d80b194a6fb231eb7e.jpg', '<p class=\"attr-list-hd tm-clear\"><em>Th&ocirc;ng số sản phẩm:</em></p>\r\n<ul id=\"J_AttrUL\">\r\n<li id=\"J_attrBrandName\" title=\"&nbsp;Fille PATRE / Người chăn cừu\">Thương hiệu: Fille PATRE / Người chăn cừu</li>\r\n<li title=\"&nbsp;Đặt ch&acirc;n\">C&aacute;ch k&iacute;n: bộ ch&acirc;n</li>\r\n<li title=\"&nbsp;34 35 36 37 38 39 40\">K&iacute;ch thước: 34 35 36 37 38 39 40</li>\r\n<li title=\"&nbsp;M&agrave;u đặc\">Hoa văn: m&agrave;u đặc</li>\r\n<li title=\"&nbsp;Ch&acirc;u &acirc;u v&agrave; mỹ\">Phong c&aacute;ch: Ch&acirc;u &Acirc;u v&agrave; Mỹ</li>\r\n<li title=\"&nbsp;Chỉ\">Kiểu ng&oacute;n ch&acirc;n: nhọn</li>\r\n<li title=\"&nbsp;Trang tr&iacute; kim loại rhinestone miệng\">C&aacute;c yếu tố phổ biến: trang tr&iacute; kim loại rhinestone miệng n&ocirc;ng</li>\r\n<li title=\"&nbsp;G&oacute;t ch&acirc;n (3-5cm)\">Chiều cao g&oacute;t: g&oacute;t ch&acirc;n giữa (3-5cm)</li>\r\n<li title=\"&nbsp;Haze xanh 6,5cm Haze xanh 8,5cm Haze xanh 10cm\">Ph&acirc;n loại m&agrave;u sắc: kh&oacute;i xanh lam 6,5cm sương m&ugrave; xanh lam 8,5cm sương m&ugrave; xanh 10cm</li>\r\n</ul>', 4, 1, '2020-06-01 23:05:17', '2020-06-02 08:38:57', NULL, 22, '5', 550000, '2020-06-01 00:00:00', '2020-08-09 00:00:00', 4, 'XL', 0.20, 1),
(11, 'Giày Nữ Cao Gót Mũi Nhọn', 1000000, '/storage/product/1/aTpcE94hY4wJLKaPa1Ni.jpg', 'LZG3833-6-510x684.jpg', '<p class=\"attr-list-hd tm-clear\"><em>Th&ocirc;ng số sản phẩm:</em></p>\r\n<ul id=\"J_AttrUL\">\r\n<li id=\"J_attrBrandName\" title=\"&nbsp;Fille PATRE / Người chăn cừu\">Thương hiệu: Fille PATRE / Người chăn cừu</li>\r\n<li title=\"&nbsp;Đặt ch&acirc;n\">C&aacute;ch k&iacute;n: bộ ch&acirc;n</li>\r\n<li title=\"&nbsp;34 35 36 37 38 39 40\">K&iacute;ch thước: 34 35 36 37 38 39 40</li>\r\n<li title=\"&nbsp;M&agrave;u đặc\">Hoa văn: m&agrave;u đặc</li>\r\n<li title=\"&nbsp;Ch&acirc;u &acirc;u v&agrave; mỹ\">Phong c&aacute;ch: Ch&acirc;u &Acirc;u v&agrave; Mỹ</li>\r\n<li title=\"&nbsp;Chỉ\">Kiểu ng&oacute;n ch&acirc;n: nhọn</li>\r\n<li title=\"&nbsp;Trang tr&iacute; kim loại rhinestone miệng\">C&aacute;c yếu tố phổ biến: trang tr&iacute; kim loại rhinestone miệng n&ocirc;ng</li>\r\n<li title=\"&nbsp;G&oacute;t ch&acirc;n (3-5cm)\">Chiều cao g&oacute;t: g&oacute;t ch&acirc;n giữa (3-5cm)</li>\r\n<li title=\"&nbsp;Haze xanh 6,5cm Haze xanh 8,5cm Haze xanh 10cm\">Ph&acirc;n loại m&agrave;u sắc: kh&oacute;i xanh lam 6,5cm sương m&ugrave; xanh lam 8,5cm sương m&ugrave; xanh 10cm</li>\r\n<li title=\"&nbsp;Chỉ\">Kiểu ng&oacute;n ch&acirc;n: nhọn</li>\r\n<li title=\"&nbsp;Trang phục ch&iacute;nh thức\">Cảnh &aacute;p dụng: trang trọng</li>\r\n<li title=\"&nbsp;G&oacute;t ch&acirc;n tốt\">Phong c&aacute;ch g&oacute;t ch&acirc;n: gi&agrave;y cao g&oacute;t</li>\r\n</ul>', 4, 1, '2020-06-01 23:41:06', '2020-06-02 08:39:12', NULL, 31, '1', NULL, NULL, NULL, 1, 'L', NULL, 1),
(12, 'Boot Nhọn Mũi Cho Nữ', 900000, '/storage/product/1/jd0Hve8Z22KS1UVzuDeg.jpg', '8e79ce6d891b7145280a.jpg', '<p class=\"attr-list-hd tm-clear\"><em>Th&ocirc;ng số sản phẩm:</em></p>\r\n<ul id=\"J_AttrUL\">\r\n<li id=\"J_attrBrandName\" title=\"&nbsp;Fille PATRE / Người chăn cừu\">Thương hiệu: Fille PATRE / Người chăn cừu</li>\r\n<li title=\"&nbsp;Đặt ch&acirc;n\">C&aacute;ch k&iacute;n: bộ ch&acirc;n</li>\r\n<li title=\"&nbsp;34 35 36 37 38 39 40\">K&iacute;ch thước: 34 35 36 37 38 39 40</li>\r\n<li title=\"&nbsp;M&agrave;u đặc\">Hoa văn: m&agrave;u đặc</li>\r\n<li title=\"&nbsp;Ch&acirc;u &acirc;u v&agrave; mỹ\">Phong c&aacute;ch: Ch&acirc;u &Acirc;u v&agrave; Mỹ</li>\r\n<li title=\"&nbsp;Chỉ\">Kiểu ng&oacute;n ch&acirc;n: nhọn</li>\r\n<li title=\"&nbsp;Trang tr&iacute; kim loại rhinestone miệng\">C&aacute;c yếu tố phổ biến: trang tr&iacute; kim loại rhinestone miệng n&ocirc;ng</li>\r\n<li title=\"&nbsp;G&oacute;t ch&acirc;n (3-5cm)\">Chiều cao g&oacute;t: g&oacute;t ch&acirc;n giữa (3-5cm)</li>\r\n<li title=\"&nbsp;Haze xanh 6,5cm Haze xanh 8,5cm Haze xanh 10cm\">Ph&acirc;n loại m&agrave;u sắc: kh&oacute;i xanh lam 6,5cm sương m&ugrave; xanh lam 8,5cm sương m&ugrave; xanh 10cm</li>\r\n<li title=\"&nbsp;Chỉ\">Kiểu ng&oacute;n ch&acirc;n: nhọn</li>\r\n<li title=\"&nbsp;Trang phục ch&iacute;nh thức\">Cảnh &aacute;p dụng: trang trọng</li>\r\n<li title=\"&nbsp;G&oacute;t ch&acirc;n tốt\">Phong c&aacute;ch g&oacute;t ch&acirc;n: gi&agrave;y cao g&oacute;t</li>\r\n</ul>', 4, 1, '2020-06-01 23:43:02', '2020-06-02 08:38:01', NULL, 23, '4', NULL, NULL, NULL, 3, 'Z', 0.20, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_comments`
--

CREATE TABLE `product_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_images`
--

INSERT INTO `product_images` (`id`, `image_name`, `image_path`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 'gallery2.jpg', '/storage/product/1/N0lqJE0kFRDeFJgYpacj.jpg', 1, '2020-06-01 22:30:45', '2020-06-01 22:30:45'),
(2, 'áo phông nam 2.jpg', '/storage/product/1/hmcFlIHuYiN76OWgBCnl.jpg', 2, '2020-06-01 22:38:07', '2020-06-01 22:38:07'),
(3, 'áo phông nam 3.jpg', '/storage/product/1/O13gLaFOHFr7O4WszD22.jpg', 2, '2020-06-01 22:38:07', '2020-06-01 22:38:07'),
(4, 'áo phông nam.jpg', '/storage/product/1/7Sw0DqKj19gOgvFGH0RQ.jpg', 2, '2020-06-01 22:38:07', '2020-06-01 22:38:07'),
(5, 'áo sơ mi nam 2.jpg', '/storage/product/1/QCXvKgNQXGm2GYWa2zK1.jpg', 3, '2020-06-01 22:41:36', '2020-06-01 22:41:36'),
(6, 'áo sơ mi nam.jpg', '/storage/product/1/eDXMELF1ULEDahUhaU10.jpg', 3, '2020-06-01 22:41:36', '2020-06-01 22:41:36'),
(7, 'áo sơ mi nam 1.jpg', '/storage/product/1/3qmYRVGsKhfUrtYnfmGb.jpg', 4, '2020-06-01 22:45:11', '2020-06-01 22:45:11'),
(8, 'áo sơ mi nam 2.jpg', '/storage/product/1/RmJItDibnRuT2qUUUJdC.jpg', 4, '2020-06-01 22:45:11', '2020-06-01 22:45:11'),
(9, 'áo sơ mi nam 3.jpg', '/storage/product/1/qyaH3hTKSBoHbr72FF2s.jpg', 4, '2020-06-01 22:45:11', '2020-06-01 22:45:11'),
(10, 'áo sơ mi nam.jpg', '/storage/product/1/OXFHY3LNeSl8Ju3o1ogf.jpg', 4, '2020-06-01 22:45:11', '2020-06-01 22:45:11'),
(11, 'quần áo nữ 2pg.jpg', '/storage/product/1/nSwzWvqQKwnMZQV6VLkt.jpg', 5, '2020-06-01 22:49:17', '2020-06-01 22:49:17'),
(12, 'quần áo nữ j2g.jpg', '/storage/product/1/KMdGlS0Mh9pjZdONFrL4.jpg', 5, '2020-06-01 22:49:17', '2020-06-01 22:49:17'),
(13, 'quần áo nữ jp2g.jpg', '/storage/product/1/OT0OBa5gsnbcwEQmknnS.jpg', 5, '2020-06-01 22:49:17', '2020-06-01 22:49:17'),
(14, 'quần áo nữ jpg.jpg', '/storage/product/1/rA5LKVoe3iW8XctZis1x.jpg', 5, '2020-06-01 22:49:17', '2020-06-01 22:49:17'),
(15, 'quần áo nữ 2.jpg', '/storage/product/1/XiC1gn3DfjzXEjxqtqZO.jpg', 6, '2020-06-01 22:52:51', '2020-06-01 22:52:51'),
(16, 'quần áo nữ 3.jpg', '/storage/product/1/r9K8tMItPreSUducoVOb.jpg', 6, '2020-06-01 22:52:51', '2020-06-01 22:52:51'),
(17, 'quần áo nữ 32.jpg', '/storage/product/1/Gh0bIceYfHE6okq3pDag.jpg', 6, '2020-06-01 22:52:51', '2020-06-01 22:52:51'),
(18, 'quần áo nữ.jpg', '/storage/product/1/JrnHR1HKaqEcMbJvoO9d.jpg', 6, '2020-06-01 22:52:51', '2020-06-01 22:52:51'),
(19, 'ao-so-mi-soc-ngan-tay-cho-be-trai-size-dai-co-10-14-tuoi_(4).jpg', '/storage/product/1/s4gXmn1rWZFl940yru9V.jpg', 7, '2020-06-01 22:55:59', '2020-06-01 22:55:59'),
(20, 'ao-so-mi-soc-ngan-tay-cho-be-trai-size-dai-co-10-14-tuoi_(5).jpg', '/storage/product/1/ryYWD9XCwzlXoEms3nvY.jpg', 7, '2020-06-01 22:55:59', '2020-06-01 22:55:59'),
(21, 'ao-so-mi-soc-ngan-tay-cho-be-trai-size-dai-co-10-14-tuoi_(6).jpg', '/storage/product/1/wEkWET2HFfJE5px6HJKF.jpg', 7, '2020-06-01 22:55:59', '2020-06-01 22:55:59'),
(22, 'ao-thun-ba-lo-cho-be-trai-nhieu-mau-gia-re-6-thang-3-tuoi (1).jpg', '/storage/product/1/XwzxmCAPXKCYYLk0kfwW.jpg', 8, '2020-06-01 22:58:53', '2020-06-01 22:58:53'),
(23, 'ao-thun-ba-lo-cho-be-trai-nhieu-mau-gia-re-6-thang-3-tuoi (2).jpg', '/storage/product/1/HOASUizLHMMlhWye5LFu.jpg', 8, '2020-06-01 22:58:53', '2020-06-01 22:58:53'),
(24, 'ao-thun-ba-lo-cho-be-trai-nhieu-mau-gia-re-6-thang-3-tuoi (3).jpg', '/storage/product/1/8qHCVC44XN6symAflYcY.jpg', 8, '2020-06-01 22:58:53', '2020-06-01 22:58:53'),
(25, 'ao-thun-ba-lo-cho-be-trai-nhieu-mau-gia-re-6-thang-3-tuoi_(3).jpg', '/storage/product/1/mCUbp99n9s1k5HfMVv40.jpg', 8, '2020-06-01 22:58:53', '2020-06-01 22:58:53'),
(26, 'ao-dam-tre-em-cao-cap-vai-voan-dinh-kim-sa-sang-chanh-2-8-tuoi-vi_(2).jpg', '/storage/product/1/KnoPu2KRuJTLrIO8LVrQ.jpg', 9, '2020-06-01 23:01:40', '2020-06-01 23:01:40'),
(27, 'ao-dam-tre-em-cao-cap-vai-voan-dinh-kim-sa-sang-chanh-2-8-tuoi-vi_(3).jpg', '/storage/product/1/2LhEIdSjdq9Y3bd2vQ21.jpg', 9, '2020-06-01 23:01:40', '2020-06-01 23:01:40'),
(28, 'ao-dam-tre-em-cao-cap-vai-voan-dinh-kim-sa-sang-chanh-2-8-tuoi-vi_(4).jpg', '/storage/product/1/lMg5MjfnyTl5q9rVBwm6.jpg', 9, '2020-06-01 23:01:40', '2020-06-01 23:01:40'),
(29, '82ae4c6f0d19f547ac08.jpg', '/storage/product/1/XGRZfsPnnY8v5WutG2W8.jpg', 10, '2020-06-01 23:05:17', '2020-06-01 23:05:17'),
(30, '585d099c48eab0b4e9fb.jpg', '/storage/product/1/7jzo9qqLiGJHjEsVdM9T.jpg', 10, '2020-06-01 23:05:17', '2020-06-01 23:05:17'),
(31, '7545038b42fdbaa3e3ec.jpg', '/storage/product/1/NFtWWOgGRDF2RnqirH62.jpg', 10, '2020-06-01 23:05:17', '2020-06-01 23:05:17'),
(32, 'e3d0371176678e39d776.jpg', '/storage/product/1/aId6PR4EgdmLIMDkqcda.jpg', 10, '2020-06-01 23:05:17', '2020-06-01 23:05:17'),
(33, 'LZG3833-3-510x684.jpg', '/storage/product/1/8qpMbWiUOA1EczCTeDUb.jpg', 11, '2020-06-01 23:41:06', '2020-06-01 23:41:06'),
(34, 'LZG3833-4-510x686.jpg', '/storage/product/1/B8Wiv0NK9WEcIaFQSNEJ.jpg', 11, '2020-06-01 23:41:06', '2020-06-01 23:41:06'),
(35, 'LZG3833-5-510x681.jpg', '/storage/product/1/WjW1MdQsJw2Ep7bu7HsM.jpg', 11, '2020-06-01 23:41:06', '2020-06-01 23:41:06'),
(36, 'LZG3833-6-510x684.jpg', '/storage/product/1/G4QNizqhM0sS4FERozyk.jpg', 11, '2020-06-01 23:41:06', '2020-06-01 23:41:06'),
(37, '5d224d370a41f21fab50.jpg', '/storage/product/1/F3kXRFYpfxl2u8Sh4Pnj.jpg', 12, '2020-06-01 23:43:02', '2020-06-01 23:43:02'),
(38, '8e79ce6d891b7145280a.jpg', '/storage/product/1/eKwaHvUggcLhfg8pi0Dv.jpg', 12, '2020-06-01 23:43:02', '2020-06-01 23:43:02'),
(39, 'b16bc07f87097f572618.jpg', '/storage/product/1/rZdi5VsRHLt8FiRl6D91.jpg', 12, '2020-06-01 23:43:02', '2020-06-01 23:43:02'),
(40, 'd817d50292746a2a3365.jpg', '/storage/product/1/Xr1SYhVKvCYUTcIOn4K8.jpg', 12, '2020-06-01 23:43:02', '2020-06-01 23:43:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_orders`
--

CREATE TABLE `product_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `price` int(11) NOT NULL,
  `price_sale` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_orders`
--

INSERT INTO `product_orders` (`id`, `order_id`, `product_id`, `quantity`, `deleted_at`, `created_at`, `updated_at`, `price`, `price_sale`) VALUES
(3, 3, 7, 1, NULL, '2020-06-01 23:08:22', '2020-06-01 23:08:22', 150000, 135000),
(4, 3, 9, 1, NULL, '2020-06-01 23:08:22', '2020-06-01 23:08:22', 259000, NULL),
(5, 4, 12, 1, NULL, '2020-06-01 23:43:53', '2020-06-01 23:43:53', 900000, NULL),
(6, 4, 11, 1, NULL, '2020-06-01 23:43:53', '2020-06-01 23:43:53', 1000000, NULL),
(7, 5, 10, 1, NULL, '2020-06-02 07:27:17', '2020-06-02 07:27:17', 600000, 550000),
(8, 5, 11, 1, NULL, '2020-06-02 07:27:17', '2020-06-02 07:27:17', 1000000, NULL),
(9, 5, 5, 1, NULL, '2020-06-02 07:27:17', '2020-06-02 07:27:17', 500000, 350000),
(10, 5, 6, 1, NULL, '2020-06-02 07:27:17', '2020-06-02 07:27:17', 450000, NULL),
(11, 6, 12, 1, NULL, '2020-06-02 08:38:01', '2020-06-02 08:38:01', 900000, NULL),
(12, 6, 10, 1, NULL, '2020-06-02 08:38:01', '2020-06-02 08:38:01', 600000, 550000),
(13, 6, 9, 1, NULL, '2020-06-02 08:38:01', '2020-06-02 08:38:01', 259000, NULL),
(14, 6, 8, 1, NULL, '2020-06-02 08:38:01', '2020-06-02 08:38:01', 100000, 80000),
(15, 7, 5, 1, NULL, '2020-06-02 08:38:57', '2020-06-02 08:38:57', 500000, 350000),
(16, 7, 10, 1, NULL, '2020-06-02 08:38:57', '2020-06-02 08:38:57', 600000, 550000),
(17, 7, 11, 2, NULL, '2020-06-02 08:38:57', '2020-06-02 08:38:57', 1000000, NULL),
(18, 7, 7, 1, NULL, '2020-06-02 08:38:57', '2020-06-02 08:38:57', 150000, 135000),
(19, 7, 8, 1, NULL, '2020-06-02 08:38:57', '2020-06-02 08:38:57', 100000, 80000),
(20, 8, 11, 1, NULL, '2020-06-02 08:39:12', '2020-06-02 08:39:12', 1000000, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_tags`
--

CREATE TABLE `product_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_tags`
--

INSERT INTO `product_tags` (`id`, `product_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2020-06-01 22:30:45', '2020-06-01 22:30:45'),
(2, 1, 2, '2020-06-01 22:30:45', '2020-06-01 22:30:45'),
(3, 1, 3, '2020-06-01 22:30:45', '2020-06-01 22:30:45'),
(4, 2, 3, '2020-06-01 22:38:07', '2020-06-01 22:38:07'),
(5, 2, 4, '2020-06-01 22:38:07', '2020-06-01 22:38:07'),
(6, 3, 5, '2020-06-01 22:41:36', '2020-06-01 22:41:36'),
(7, 3, 6, '2020-06-01 22:41:36', '2020-06-01 22:41:36'),
(8, 4, 7, '2020-06-01 22:45:11', '2020-06-01 22:45:11'),
(9, 4, 5, '2020-06-01 22:45:11', '2020-06-01 22:45:11'),
(10, 4, 3, '2020-06-01 22:45:11', '2020-06-01 22:45:11'),
(11, 5, 8, '2020-06-01 22:49:17', '2020-06-01 22:49:17'),
(12, 5, 9, '2020-06-01 22:49:17', '2020-06-01 22:49:17'),
(13, 5, 10, '2020-06-01 22:49:17', '2020-06-01 22:49:17'),
(14, 6, 8, '2020-06-01 22:52:51', '2020-06-01 22:52:51'),
(15, 6, 11, '2020-06-01 22:52:51', '2020-06-01 22:52:51'),
(16, 7, 12, '2020-06-01 22:55:59', '2020-06-01 22:55:59'),
(17, 7, 7, '2020-06-01 22:55:59', '2020-06-01 22:55:59'),
(18, 7, 13, '2020-06-01 22:55:59', '2020-06-01 22:55:59'),
(19, 8, 12, '2020-06-01 22:58:53', '2020-06-01 22:58:53'),
(20, 8, 14, '2020-06-01 22:58:53', '2020-06-01 22:58:53'),
(21, 8, 15, '2020-06-01 22:58:53', '2020-06-01 22:58:53'),
(22, 9, 12, '2020-06-01 23:01:40', '2020-06-01 23:01:40'),
(23, 9, 10, '2020-06-01 23:01:40', '2020-06-01 23:01:40'),
(24, 9, 16, '2020-06-01 23:01:40', '2020-06-01 23:01:40'),
(25, 10, 17, '2020-06-01 23:05:17', '2020-06-01 23:05:17'),
(26, 10, 4, '2020-06-01 23:05:17', '2020-06-01 23:05:17'),
(27, 10, 18, '2020-06-01 23:05:17', '2020-06-01 23:05:17'),
(28, 11, 19, '2020-06-01 23:41:06', '2020-06-01 23:41:06'),
(29, 11, 20, '2020-06-01 23:41:06', '2020-06-01 23:41:06'),
(30, 12, 18, '2020-06-01 23:43:02', '2020-06-01 23:43:02'),
(31, 12, 17, '2020-06-01 23:43:02', '2020-06-01 23:43:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'quan-tri-he-thong', 'Quản Trị Hệ Thống', NULL, '2020-06-01 06:11:25', '2020-06-01 09:55:40'),
(2, 'ke-toan', 'Kế Toán', NULL, '2020-06-01 06:11:40', '2020-06-02 07:29:57'),
(3, 'ho-tro-khach-hang', 'Hỗ Trợ Khách Hàng', NULL, '2020-06-01 06:12:05', '2020-06-02 07:30:09'),
(4, 'nhan-vien-kho', 'Nhân Viên Kho', NULL, '2020-06-01 06:12:23', '2020-06-02 07:29:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role_user`
--

INSERT INTO `role_user` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 2, NULL, NULL),
(3, 5, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `config_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `config_value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `settings`
--

INSERT INTO `settings` (`id`, `config_key`, `config_value`, `deleted_at`, `created_at`, `updated_at`, `name`) VALUES
(1, 'logo', '/storage/logo/1/QkkuBnU7Y5owncBPQpF7.png', NULL, NULL, '2020-06-01 20:09:13', 'Logo'),
(2, 'feeship', '30000', NULL, NULL, '2020-06-01 20:12:16', 'Phí Ship'),
(3, 'nameshop', 'Real Shop', NULL, NULL, '2020-06-01 20:12:16', 'Tên Shop'),
(4, 'google_map', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.696324622277!2d105.84315191422489!3d21.00480668601139!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac76ccab6dd7%3A0x55e92a5b07a97d03!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBCw6FjaCBraG9hIEjDoCBO4buZaQ!5e0!3m2!1svi!2s!4v1591067410547!5m2!1svi!2s\" width=\"400\" height=\"300\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>', NULL, NULL, '2020-06-01 20:12:16', 'Google Map'),
(5, 'address', 'Số 23, ngách 77, ngõ 211 Khương Trung', NULL, NULL, '2020-06-01 20:12:16', 'Địa Chỉ Shop'),
(6, 'footer', 'Copyright © 2020 REALSHOP Inc. All rights reserved.', NULL, NULL, '2020-06-01 20:12:16', 'Chân Trang'),
(7, 'email', 'realshop@gmail.com', NULL, NULL, '2020-06-01 20:12:16', 'Email Shop'),
(8, 'phone_number', '0352888056', NULL, NULL, '2020-06-01 20:12:16', 'Số Điện Thoại'),
(9, 'fa fa-facebook', 'https://www.facebook.com/', NULL, '2020-06-01 20:16:07', '2020-06-01 20:16:07', 'Facebook'),
(10, 'fa fa-twitter', 'https://twitter.com', NULL, '2020-06-01 20:16:45', '2020-06-01 20:16:45', 'Twitter'),
(11, 'fa fa-linkedin', 'https://www.facebook.com/', NULL, '2020-06-01 20:17:00', '2020-06-01 20:17:00', 'Linkedin'),
(12, 'fa fa-dribbble', 'https://dribbble.com', NULL, '2020-06-01 20:17:11', '2020-06-01 20:17:11', 'Dribbble');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `url` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sliders`
--

INSERT INTO `sliders` (`id`, `name`, `description`, `image_path`, `image_name`, `deleted_at`, `created_at`, `updated_at`, `status`, `url`) VALUES
(1, 'Khuyến Mại Quốc Tế Thiếu Nhi 1-6 Hấp Dẫn', 'Nhân ngày quốc tế thiếu nhi 1-6-2020, Real Shop gửi tới quý khách hàng chương trình khuyến mại vô cùng hấp dẫn', '/storage/slider/1/7VmA2sCcmjSlAdejQbSd.jpg', 'girl2.jpg', NULL, '2020-06-02 00:59:21', '2020-06-02 00:59:21', 1, 'http://127.0.0.1:8000/shopping/sale'),
(2, 'Sản Phẩm Mới Chào Hè 2020', 'Hè 2020 đã tới, cùng ghé qua kho sản phẩm mới nhất của shop bạn nhé!', '/storage/slider/1/T4P3WPvoHNm93KfxEMFa.jpg', 'girl3.jpg', NULL, '2020-06-02 01:01:22', '2020-06-02 01:01:22', 1, 'http://127.0.0.1:8000/shopping/new');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `statuses`
--

INSERT INTO `statuses` (`id`, `name`, `display_name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'waiting', 'Chờ Soạn Hàng', NULL, NULL, NULL),
(2, 'delivery', 'Đang Giao', NULL, NULL, NULL),
(3, 'received', 'Đã Nhận', NULL, NULL, NULL),
(4, 'cancelled', 'Đã Hủy', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `email`, `phone_number`, `address`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Louis Vuitton', 'LouisVuitton@gmail.com', '035288805', 'Số 23, ngách 77, ngõ 211 Khương Trung', NULL, '2020-06-01 22:23:12', '2020-06-01 22:23:12'),
(2, 'Hermès', 'Hermes@gmail.com', '035888056', 'Số 23, ngách 77, ngõ 211 Khương Trung', NULL, '2020-06-01 22:23:35', '2020-06-01 22:23:35'),
(3, 'Chanel', 'Chanel@gmail.com', '052888056', 'Số 23, ngách 77, ngõ 211 Khương Trung', NULL, '2020-06-01 22:23:51', '2020-06-01 22:23:51'),
(4, 'Gucci', 'Gucci@gmail.com', '035288856', 'Số 23, ngách 77, ngõ 211 Khương Trung', NULL, '2020-06-01 22:24:07', '2020-06-01 22:24:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'louis vuitton', '2020-06-01 22:30:45', '2020-06-01 22:30:45'),
(2, 't-shirt', '2020-06-01 22:30:45', '2020-06-01 22:30:45'),
(3, 'quần áo nam', '2020-06-01 22:30:45', '2020-06-01 22:30:45'),
(4, 'gucci', '2020-06-01 22:38:07', '2020-06-01 22:38:07'),
(5, 'áo sơ mi nam', '2020-06-01 22:41:36', '2020-06-01 22:41:36'),
(6, 'quần áo công sở', '2020-06-01 22:41:36', '2020-06-01 22:41:36'),
(7, 'áo sơ mi', '2020-06-01 22:45:11', '2020-06-01 22:45:11'),
(8, 'quần áo nữ', '2020-06-01 22:49:17', '2020-06-01 22:49:17'),
(9, 'quần áo ngủ', '2020-06-01 22:49:17', '2020-06-01 22:49:17'),
(10, 'chanel', '2020-06-01 22:49:17', '2020-06-01 22:49:17'),
(11, 'hermes', '2020-06-01 22:52:51', '2020-06-01 22:52:51'),
(12, 'quần áo trẻ em', '2020-06-01 22:55:59', '2020-06-01 22:55:59'),
(13, 'áo sơ mi trẻ em', '2020-06-01 22:55:59', '2020-06-01 22:55:59'),
(14, 'khuyến mại', '2020-06-01 22:58:53', '2020-06-01 22:58:53'),
(15, 'áo thun', '2020-06-01 22:58:53', '2020-06-01 22:58:53'),
(16, 'váy cho bé gái', '2020-06-01 23:01:40', '2020-06-01 23:01:40'),
(17, 'giày dép nữ', '2020-06-01 23:05:17', '2020-06-01 23:05:17'),
(18, 'boot nữ', '2020-06-01 23:05:17', '2020-06-01 23:05:17'),
(19, 'giày nữ', '2020-06-01 23:41:06', '2020-06-01 23:41:06'),
(20, 'giày cao gót', '2020-06-01 23:41:06', '2020-06-01 23:41:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `avatar_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `birthday`, `phone_number`, `password`, `sex`, `address`, `created_at`, `updated_at`, `deleted_at`, `avatar_path`, `avatar_name`) VALUES
(1, 'admin@gmail.com', 'Quản Trị Viên', '1997-09-22', '0352888056', '$2y$10$.QDvcF6TRg51D3gcAPv.nuH/iguMnpt7RQypSN1CjheQR7Yo18iMy', 'Nam', 'Số 23, ngách 77, ngõ 211 Khương Trung', NULL, '2020-06-02 07:27:59', NULL, NULL, NULL),
(2, 'ketoan@gmail.com', 'Trần Văn Đạt', '2020-06-25', '0352888056', '$2y$10$6qLm9yASuGM1KbVSNpfhpOQC2A.UeVbTxVfwrD.CjBlyFrs9Ur5Fq', 'Nam', 'Số 23, ngách 77, ngõ 211 Khương Trung', '2020-06-01 07:30:54', '2020-06-01 10:30:35', NULL, '/storage/avatar/1/3E5Fvik23ZIaEul11Wng.jpg', 'cộng cafe.jpg'),
(3, 'khachhang@gmail.com', 'Khách Hàng A', '2020-06-11', '0352888056', '$2y$10$vI0MJ7z.qU.9k8yj0mRt../Ao4fBsJJGCtsQApxVoBtpgpVcoPkCS', 'Nam', 'Số 23, ngách 77, ngõ 211 Khương Trung', '2020-06-01 07:32:31', '2020-06-01 07:32:31', NULL, NULL, NULL),
(4, 'khachA@gmail.com', 'Khách A', NULL, '035288056', '$2y$10$b81F.yrKO.6xLZJyINXJIuUg/8Th6O/CFel92RsawTzey8/kps9rK', NULL, 'Số 23, ngách 77, ngõ 211 Khương Trung', '2020-06-01 09:26:17', '2020-06-01 09:26:17', NULL, NULL, NULL),
(5, 'nguoivietbai@gmail.com', 'Người Viết bài', '2020-06-03', '0352888056', '$2y$10$75eGTqbGrSelOwFJuh9YBufxnGJUmpdOEPeALK.Mp0FMqYAop/5cm', 'Nữ', 'Số 23, ngách 77, ngõ 211 Khương Trung', '2020-06-02 07:31:43', '2020-06-02 07:31:43', NULL, '/storage/avatar/2/j04L8IK5vY2z0hELzjPJ.png', 'iframe3.png');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_name_unique` (`name`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Chỉ mục cho bảng `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_comments`
--
ALTER TABLE `product_comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_orders`
--
ALTER TABLE `product_orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_tags`
--
ALTER TABLE `product_tags`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT cho bảng `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `product_comments`
--
ALTER TABLE `product_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `product_orders`
--
ALTER TABLE `product_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `product_tags`
--
ALTER TABLE `product_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
