-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 11, 2017 lúc 09:50 SA
-- Phiên bản máy phục vụ: 10.1.21-MariaDB
-- Phiên bản PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `thegioicongnghegiare`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(11) NOT NULL,
  `keywords` text COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_unicode_ci,
  `orders` int(11) NOT NULL DEFAULT '0',
  `is_menu` tinyint(1) NOT NULL DEFAULT '1',
  `is_tab` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `sort_order`, `icon`, `parent_id`, `keywords`, `description`, `orders`, `is_menu`, `is_tab`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Linh kiện máy tính', 'linh-kien-may-tinh', 0, '', 0, '', '', 0, 1, 1, 1, '2017-04-09 01:36:51', '2017-04-09 01:36:51'),
(2, 'Linh kiện laptop', 'linh-kien-laptop', 0, '', 0, '', '', 0, 1, 1, 1, '2017-04-10 07:17:19', '2017-04-10 07:17:19'),
(3, 'CPU - BỘ VI XỬ LÝ', 'cpu-bo-vi-xu-ly', 0, '/upload/images/cate/14676_0_pentium_dual_core_g2030%20(1)(1).jpg', 1, '', '', 0, 1, 0, 1, '2017-04-10 07:19:21', '2017-04-10 07:22:16'),
(4, 'Main - Bo mạch chủ', 'main-bo-mach-chu', 0, '/upload/images/cate/main.jpg', 1, '', '', 0, 1, 0, 1, '2017-04-10 07:19:46', '2017-04-10 07:22:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_posts`
--

CREATE TABLE `category_posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT '0',
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(11) NOT NULL,
  `keywords` text COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_unicode_ci,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `is_menu` tinyint(1) NOT NULL DEFAULT '1',
  `is_tab` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category_posts`
--

INSERT INTO `category_posts` (`id`, `name`, `slug`, `order`, `icon`, `parent_id`, `keywords`, `description`, `sort_order`, `is_menu`, `is_tab`, `status`, `created_at`, `updated_at`) VALUES
(1, 'footer 1', 'footer-1', 0, '', 0, '', '', 0, 1, 0, 1, '2017-04-09 02:00:35', '2017-04-09 02:00:35'),
(2, '212121', '212121', 0, '', 1, '', '', 0, 1, 0, 1, '2017-04-09 02:04:41', '2017-04-09 02:04:41'),
(3, '321321', '321321', 0, '', 0, '', '', 0, 0, 0, 1, '2017-04-10 05:32:48', '2017-04-10 05:32:48'),
(4, '3213211', '3213211', 0, '', 0, '', '', 0, 0, 0, 1, '2017-04-10 05:35:18', '2017-04-10 05:35:18'),
(5, '321321312', '321321312', 0, '', 0, '', '', 0, 1, 0, 1, '2017-04-10 05:40:22', '2017-04-10 05:40:22'),
(6, '321321312312', '321321312312', 0, '', 0, '', '', 0, 1, 0, 1, '2017-04-10 05:41:47', '2017-04-10 05:41:47'),
(7, '3213213123121', '3213213123121', 0, '', 0, '', '', 0, 1, 0, 1, '2017-04-10 05:43:33', '2017-04-10 05:43:33'),
(8, '321312312', '321312312', 0, '', 0, '', '', 0, 0, 0, 1, '2017-04-10 05:43:42', '2017-04-10 05:43:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `content`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '3213213', '321231@213321231', 321321, '31231', NULL, '2017-04-07 23:50:20', '2017-04-07 23:50:20'),
(2, 'Nguyễn Anh Tuấn', 'skull.red.199x@gmail.com', 321321312, '321321', NULL, '2017-04-10 01:16:53', '2017-04-10 01:16:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `image_advs`
--

CREATE TABLE `image_advs` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `position` int(11) NOT NULL DEFAULT '1',
  `content` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `width` int(11) NOT NULL DEFAULT '0',
  `height` int(11) NOT NULL DEFAULT '0',
  `orders` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `image_advs`
--

INSERT INTO `image_advs` (`id`, `name`, `image`, `slug`, `position`, `content`, `width`, `height`, `orders`, `status`, `created_at`, `updated_at`) VALUES
(1, '2121', '/upload/images/adv/images%20(1).jpg', '#', 1, '', 940, 357, 0, 1, '2017-04-10 05:45:38', '2017-04-10 05:45:38'),
(2, '321312', '/upload/images/adv/images.jpg', '', 1, '', 940, 357, 0, 1, '2017-04-10 05:47:11', '2017-04-10 05:47:11'),
(3, '2121', '/upload/images/adv/images.jpg', '', 2, '', 300, 300, 0, 1, '2017-04-10 05:47:56', '2017-04-10 05:47:56'),
(4, '321312', '/upload/images/posts/6baebd0c221c0af47420ecf1d2cbbe0d.jpg', '#', 3, '', 940, 357, 0, 1, '2017-04-10 05:52:47', '2017-04-10 05:52:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `image_types`
--

CREATE TABLE `image_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `parent_id` int(11) NOT NULL,
  `position` tinyint(1) NOT NULL DEFAULT '1',
  `cate_id` tinyint(1) NOT NULL DEFAULT '1',
  `type_page` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menus`
--

INSERT INTO `menus` (`id`, `name`, `slug`, `content`, `icon`, `sort_order`, `parent_id`, `position`, `cate_id`, `type_page`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Trang chủ', '/trang-chu.html', NULL, '/upload/images/icon/icon-home-header.png', 0, 0, 1, 1, 1, 1, '2017-04-10 03:52:31', '2017-04-10 06:42:06'),
(2, 'Tin tức', '/tin-tuc.html', NULL, '/upload/images/icon/icon-tin-tuc-header.png', 0, 0, 1, 1, 4, 1, '2017-04-10 03:55:53', '2017-04-10 06:41:46'),
(3, 'Liên hệ', '/lien-he.html', NULL, '/upload/images/icon/icon-lien-he-header.png', 0, 0, 1, 1, 9, 1, '2017-04-10 03:59:08', '2017-04-10 06:41:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(142, '2014_10_12_000000_create_users_table', 1),
(143, '2014_10_12_100000_create_password_resets_table', 1),
(144, '2017_03_04_020732_create_options_table', 1),
(145, '2017_03_04_052231_create_menus_table', 1),
(146, '2017_03_06_043647_create_categories_table', 1),
(147, '2017_03_06_101019_create_image_types_table', 1),
(148, '2017_03_06_101100_create_image_advs_table', 1),
(149, '2017_03_06_122952_create_products_table', 1),
(150, '2017_03_07_121942_create_one_pages_table', 1),
(151, '2017_03_08_073503_create_category_posts_table', 1),
(152, '2017_03_08_074741_create_posts_table', 1),
(153, '2017_03_14_144459_create_orders_table', 1),
(154, '2017_03_14_145521_create_order_products_table', 1),
(155, '2017_03_20_033816_create_user_admins_table', 1),
(156, '2017_04_08_062751_create_contacts_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `one_pages`
--

CREATE TABLE `one_pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci,
  `keywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `options`
--

CREATE TABLE `options` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `options`
--

INSERT INTO `options` (`id`, `name`, `value`) VALUES
(1, 'logo', ''),
(2, 'favicon', ''),
(3, 'phone', '0912119088'),
(4, 'hotline', '0912119088'),
(5, 'address', 'SN 2729 - Đại lộ Hùng Vương - Nông Trang - Việt Trì - Phú Thọ'),
(6, 'link_facebook', 'https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FMoingay4tuvungtienganh&tabs=timeline&width=300&height=0&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId'),
(7, 'link_youtube', NULL),
(8, 'link_google', NULL),
(9, 'posts_per_page', ''),
(10, 'products_per_page', ''),
(11, 'footer_left', '<p>SN 2729 - Đại lộ H&ugrave;ng Vương - N&ocirc;ng Trang - Việt Tr&igrave; - Ph&uacute; Thọ</p>\r\n'),
(12, 'footer_right', ''),
(13, 'title', 'Thế giới công nghệ số giá rẻ'),
(14, 'keywords', ''),
(15, 'description', ''),
(16, 'h1', ''),
(17, 'contact', '<p>Thế giới c&ocirc;ng nghệ số gi&aacute; rẻ</p>\r\n');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `phone` int(11) NOT NULL DEFAULT '0',
  `id_user` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `address`, `city`, `comment`, `phone`, `id_user`, `status`, `created_at`, `updated_at`) VALUES
(1, '3213213', 'skull.red.199x@gmail.com', '321312312', NULL, NULL, 321321321, 0, 1, '2017-04-09 09:31:19', '2017-04-10 03:29:53'),
(2, 'Nguyễn Anh Tuấn', 'skull.red.199x@gmail.com', '321312', NULL, NULL, 32132132, 0, 0, '2017-04-09 09:34:34', '2017-04-09 09:34:34'),
(3, 'Nguyễn Anh Tuấn', 'skull.red.199x@gmail.com', '321312', NULL, NULL, 32121, 0, 0, '2017-04-09 09:34:52', '2017-04-09 09:34:52'),
(4, 'Nguyễn Anh Tuấn', 'skull.red.199x@gmail.com', '321312', NULL, NULL, 123456798, 0, 0, '2017-04-10 03:27:52', '2017-04-10 03:27:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_products`
--

CREATE TABLE `order_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_order` int(11) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT '0',
  `price` int(11) NOT NULL DEFAULT '1',
  `id_product` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_products`
--

INSERT INTO `order_products` (`id`, `id_order`, `qty`, `price`, `id_product`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 200000, 1, '2017-04-09 09:31:19', '2017-04-09 09:31:19'),
(2, 2, 1, 200000, 1, '2017-04-09 09:34:34', '2017-04-09 09:34:34'),
(3, 3, 1, 200000, 1, '2017-04-09 09:34:52', '2017-04-09 09:34:52'),
(4, 4, 1, 200000, 1, '2017-04-10 03:27:52', '2017-04-10 03:27:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `intro` text COLLATE utf8_unicode_ci,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `post_id` int(11) NOT NULL DEFAULT '0',
  `orders` int(11) NOT NULL DEFAULT '0',
  `keywords` text COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `name`, `slug`, `image`, `intro`, `content`, `post_id`, `orders`, `keywords`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, '321321321312', '321321321312', '/upload/images/product/33333.jpg', '<p>321312213321</p>\r\n', '<p>31221132312</p>\r\n', 1, 0, '', '', 1, '2017-04-09 02:13:23', '2017-04-09 02:13:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price_new` int(11) NOT NULL DEFAULT '0',
  `price_old` int(11) NOT NULL DEFAULT '0',
  `intro` text COLLATE utf8_unicode_ci,
  `content` longtext COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cate_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `keywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `orders` int(11) NOT NULL DEFAULT '0',
  `status_sale` int(11) NOT NULL DEFAULT '0',
  `is_selling` tinyint(1) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `code`, `price_new`, `price_old`, `intro`, `content`, `image`, `cate_id`, `keywords`, `description`, `orders`, `status_sale`, `is_selling`, `status`, `created_at`, `updated_at`) VALUES
(1, '2321321', '2321321', '321312321', 200000, 0, '', '', '/upload/images/product/4.png', 1, '', '', 0, 0, 0, 1, '2017-04-09 01:37:35', '2017-04-09 01:52:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_admins`
--

CREATE TABLE `user_admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_admins`
--

INSERT INTO `user_admins` (`id`, `name`, `email`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.vn', '$2y$10$QaHAgzUPJt0W4ZDkHl5XcegvwDdoG2jPYHQuvj/3dXofbnaj.SLdG', 9, NULL, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Chỉ mục cho bảng `category_posts`
--
ALTER TABLE `category_posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_posts_name_unique` (`name`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `image_advs`
--
ALTER TABLE `image_advs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `image_types`
--
ALTER TABLE `image_types`
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
-- Chỉ mục cho bảng `one_pages`
--
ALTER TABLE `one_pages`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_cate_id_foreign` (`cate_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `user_admins`
--
ALTER TABLE `user_admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_admins_name_unique` (`name`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `category_posts`
--
ALTER TABLE `category_posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `image_advs`
--
ALTER TABLE `image_advs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `image_types`
--
ALTER TABLE `image_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;
--
-- AUTO_INCREMENT cho bảng `one_pages`
--
ALTER TABLE `one_pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `options`
--
ALTER TABLE `options`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `user_admins`
--
ALTER TABLE `user_admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_cate_id_foreign` FOREIGN KEY (`cate_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
