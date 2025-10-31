-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Nov 01, 2024 at 08:07 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webantoan`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id_post` bigint(20) NOT NULL,
  `postName` varchar(255) NOT NULL,
  `postImage` varchar(255) NOT NULL,
  `postDescription` varchar(255) NOT NULL,
  `postDate` datetime NOT NULL DEFAULT current_timestamp(),
  `postContent` varchar(10000) NOT NULL,
  `isAccepted` tinyint(4) NOT NULL DEFAULT 1,
  `note` varchar(255) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `category_id` bigint(20) DEFAULT 4
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id_post`, `postName`, `postImage`, `postDescription`, `postDate`, `postContent`, `isAccepted`, `note`, `user_id`, `category_id`) VALUES
(2, 'Đây là bài viết số 2 Da sua', 'https://picsum.photos/1000/1000', 'Đây là mô tả bài viết số 2', '2024-10-31 20:27:46', 'Đây là nội dung bài viết số 2', 2, '', 3, 1),
(3, 'Đây là bài viết số 2 đã thay đổi', 'https://picsum.photos/1000/1000', 'Đây là mô tả bài viết số 2', '2024-10-31 22:26:16', 'Đây là nội dung bài viết số 2', 0, '', 3, 3),
(4, 'Day la bai viet dau tien cua toi', 'https://duonglaodienhong.vn/wp-content/uploads/2020/04/anh-bai-viet-ong-ba.jpg', 'Bai viet rat hay', '2024-11-01 02:40:28', 'Day la noi dung bai viet', 0, 'ok', 4, 3),
(5, 'Bai viet moi', 'https://yt3.googleusercontent.com/dSgCrECA1r7miuDGqO4vLqPwugiVEQMZSvFzekB0_zl_nKGwf0kPLbt0IQzk4O1F7PvqO81nXg=s900-c-k-c0x00ffffff-no-rj', 'Mo ta bai viet moi', '2024-11-01 13:29:22', 'Noi dung bai viet moi', 0, '', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `post_categories`
--

CREATE TABLE `post_categories` (
  `id_post_category` bigint(20) NOT NULL,
  `nameCategory` varchar(255) NOT NULL,
  `delCategory` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_categories`
--

INSERT INTO `post_categories` (`id_post_category`, `nameCategory`, `delCategory`) VALUES
(1, 'Thời sự', 0),
(2, 'Kinh tế', 0),
(3, 'Chính trị', 0),
(4, 'Chưa định danh', 0),
(5, 'Thể thao', 0);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id_role` bigint(20) NOT NULL,
  `nameRole` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id_role`, `nameRole`) VALUES
(1, 'Quản trị viên'),
(2, 'Biên tập viên'),
(3, 'Tác giả');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` bigint(20) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `role_id` bigint(11) NOT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `userName`, `password`, `fullName`, `role_id`, `isActive`) VALUES
(1, 'admin', '123', 'admin', 1, 0),
(2, 'Namzee', '123', 'Nguyễn Vũ Đại Nam', 2, 0),
(3, 'xuanbach123', '123', 'Xuân Bách', 3, 0),
(4, 'namzee2002', '123', 'Nguyễn Vũ Đại Nam', 3, 0),
(5, 'btv01', '123', 'Nguyễn Vũ Đại Nam', 2, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `fk_user_post` (`user_id`),
  ADD KEY `fk_category_post` (`category_id`);

--
-- Indexes for table `post_categories`
--
ALTER TABLE `post_categories`
  ADD PRIMARY KEY (`id_post_category`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_role_user` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id_post` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `post_categories`
--
ALTER TABLE `post_categories`
  MODIFY `id_post_category` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_category_post` FOREIGN KEY (`category_id`) REFERENCES `post_categories` (`id_post_category`),
  ADD CONSTRAINT `fk_user_post` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_role_user` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
