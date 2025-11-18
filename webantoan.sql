-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Nov 01, 2025 at 08:07 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12
SET
  SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET
  time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;

/*!40101 SET NAMES utf8mb4 */
;

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
  `note` varchar(255) NULL,
  `user_id` bigint(20) NOT NULL,
  `category_id` bigint(20) DEFAULT 4
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--
INSERT INTO
  `posts` (
    `id_post`,
    `postName`,
    `postImage`,
    `postDescription`,
    `postDate`,
    `postContent`,
    `isAccepted`,
    `note`,
    `user_id`,
    `category_id`
  )
VALUES
  (
    2,
    '10 tác phẩm văn học tiêu biểu của TP HCM 50 năm qua',
    'https://picsum.photos/1000/1000',
    '"Mắt biếc" (Nguyễn Nhật Ánh),"Bàn thờ tổ của một cô đào" (Nguyễn Quang Sáng) được đề cử tác phẩm văn học,nghệ thuật tiêu biểu của TP HCM.',
    '2025-10-31 20:27:46',
    'Mắt biếc xuất bản năm 1990,
là một trong những sách bán chạy nhất của Nguyễn Nhật Ánh,
từng được dịch sang nhiều ngôn ngữ.Nhân vật chính trong tác phẩm là Ngạn - chàng trai hiền lành ở làng Đo Đo (Quảng Nam),
có tình cảm với cô bạn tên Hà Lan.Tuy nhiên,
khi ra thành phố,
Hà Lan đem lòng yêu Dũng - một thanh niên con nhà giàu,
dẫn đến những mâu thuẫn trong lòng Ngạn.Năm 2019,
Victor Vũ đưa truyện lên điện màn ảnh rộng.Tác phẩm đạt 180 tỷ đồng,
là phim có doanh thu cao nhất của anh từ trước đến nay.',
    2,
    '',
    3,
    1
  ),
  (
    3,
    'Toàn cảnh Nha Trang chìm trong biển nước sau hai ngày mưa',
    'https://picsum.photos/1000/1000',
    'TPO - Sau 2 ngày mưa lớn, khu vực Nha Trang, tỉnh Khánh Hòa chìm trong biển nước khiến cuộc sống của người dân bị xáo trộn.Lực lượng chức năng phải dùng phao và các thiết bị chuyên dụng để đưa người dân ra khỏi những điểm ngập nặng.',
    '2025-10-31 22:26:16',
    'Chiều 17 / 11,nhiều tuyến đường trên địa bàn tỉnh Khánh Hòa như: Nguyễn Khuyến,2 tháng 4, Thoại Ngọc Hầu,Phạm Văn Đồng,23 tháng 10 … ngập sâu,
làm cuộc sống người dân đảo lộn.',
    0,
    '',
    3,
    3
  ),
  (
    4,
    'Chợ đầu mối Bình Điền: Đảm bảo an ninh,an toàn vận hành xây dựng mô hình chợ văn minh - hiện đại',
    'https://picsum.photos/1000/1000',
    'Khu thương mại Bình Điền nằm ở cửa ngõ Tây Nam TP.HCM do Tổng Công ty Thương mại Sài Gòn – TNHH Một Thành viên (SATRA) quản lý.Sở hữu vị trí rộng hơn 65 ha,
kết nối vựa nông sản khổng lồ của Đồng bằng sông Cửu Long (ĐBSCL) với TP.HCM - thị trường tiêu thụ lớn nhất cả nước,
mỗi ngày tại chợ Bình Điền ghi nhận lượng hàng hoá trung chuyển lên tới trên 2.500 tấn / đêm,
giá trị giao dịch bình quân khoảng 130 tỷ đồng / ngày và tạo cơ hội công ăn,
việc làm cho khoảng 20.000 lao động',
    '2025-11-01 02:40:28',
    '“ Công tác đảm bảo an ninh trật tự,
an to àn cháy nổ và vệ sinh an to àn thực phẩm là một trong các tiêu chí hàng đầu tại chợ Bình Điền nhằm đảm bảo các hoạt động tại chợ luôn an to àn,
hiệu quả,
đáp ứng yêu cầu cung ứng nguồn lương thực,
thực phẩm xanh,
sạch,
an to àn vệ sinh thực phẩm cho Thành phố Hồ Chí Minh và các địa phương Đông,
Tây Nam Bộ,
đặc biệt trong mùa cao điểm cuối năm cận kề ”,
ông Phan Anh Nguyên,
Phó Giám đốc Công ty Quản lý và Kinh doanh Chợ Bình Điền cho biết.',
    0,
    'ok',
    4,
    3
  ),
  (
    5,
    'Ngân hàng Shinhan hợp tác với Visa triển khai nền tảng thanh to án giao dịch to àn cầu GTPP',
    'https://picsum.photos/1000/1000',
    'Ngày 17 / 11 / 2025, tại TPHCM, Ngân hàng TNHH MTV Shinhan Việt Nam (“ Ngân hàng Shinhan ”) hợp tác cùng Visa triển khai Global Trade Payment Platform (GTPP) – nền tảng thanh to án giao dịch to àn cầu,giúp doanh nghiệp thanh to án xuyên biên giới bằng thẻ Shinhan một cách nhanh chóng,an to àn và hiệu quả.',
    '2025-11-01 13:29:22',
    'Đây là lần đầu tiên nền tảng GTPP được Visa ra mắt tại thị trường Việt Nam và Ngân hàng Shinhan cũng là ngân hàng nước ngoài đầu tiên tại Việt Nam hỗ trợ nền tảng GTPP.Nền tảng Thanh to án Giao dịch To àn cầu GTPP giúp các doanh nghiệp Việt Nam,
    đặc biệt là nhóm ngành nhập khẩu vừa và nhỏ,
    tối ưu vốn lưu động,
    tăng tính bảo mật và mở rộng cơ hội thương mại quốc tế.Trong bối cảnh Việt Nam là thị trường xuất khẩu lớn thứ ba của Hàn Quốc,
    GTPP được xem như bước tiến quan trọng để chuyển đổi từ giao dịch truyền thống sang thanh to án thẻ.Theo đó,
    doanh nghiệp có thể thực hiện thanh to án trực tiếp cho đối tác Hàn Quốc bằng thẻ doanh nghiệp Visa Shinhan thông qua nền tảng GTPP,
    giúp các giao dịch quốc tế trở nên thuận tiện,
    nhanh chóng và an to àn hơn.',
    0,
    '',
    3,
    2
  );

-- --------------------------------------------------------
--
-- Table structure for table `post_categories`
--
CREATE TABLE `post_categories` (
  `id_post_category` bigint(20) NOT NULL,
  `nameCategory` varchar(255) NOT NULL,
  `delCategory` tinyint(4) NOT NULL DEFAULT 0
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--
-- Dumping data for table `post_categories`
--
INSERT INTO
  `post_categories` (
    `id_post_category`,
    `nameCategory`,
    `delCategory`
  )
VALUES
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
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--
INSERT INTO
  `roles` (`id_role`, `nameRole`)
VALUES
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
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--
-- Dumping data for table `users`
--
INSERT INTO
  `users` (
    `id_user`,
    `userName`,
    `password`,
    `fullName`,
    `role_id`,
    `isActive`
  )
VALUES
  (1, 'admin', '123456', 'admin', 1, 0),
  (
    2,
    'btv',
    '123456',
    'Biên tập viên Hạnh Phúc',
    2,
    0
  ),
  (3, 'tacgia', '123456', 'Nguyễn Nhật Ánh', 3, 0),
  (
    4,
    'tacgia2',
    '123456',
    'Ngọc Trinh',
    3,
    0
  ),
  (5, 'btv1', '123456', 'Anh Da Đen', 2, 0);

--
-- Indexes for dumped tables
--
--
-- Indexes for table `posts`
--
ALTER TABLE
  `posts`
ADD
  PRIMARY KEY (`id_post`),
ADD
  KEY `fk_user_post` (`user_id`),
ADD
  KEY `fk_category_post` (`category_id`);

--
-- Indexes for table `post_categories`
--
ALTER TABLE
  `post_categories`
ADD
  PRIMARY KEY (`id_post_category`);

--
-- Indexes for table `roles`
--
ALTER TABLE
  `roles`
ADD
  PRIMARY KEY (`id_role`);

--
-- Indexes for table `users`
--
ALTER TABLE
  `users`
ADD
  PRIMARY KEY (`id_user`),
ADD
  KEY `fk_role_user` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE
  `posts`
MODIFY
  `id_post` bigint(20) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 6;

--
-- AUTO_INCREMENT for table `post_categories`
--
ALTER TABLE
  `post_categories`
MODIFY
  `id_post_category` bigint(20) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE
  `roles`
MODIFY
  `id_role` bigint(20) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE
  `users`
MODIFY
  `id_user` bigint(20) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 6;

--
-- Constraints for dumped tables
--
--
-- Constraints for table `posts`
--
ALTER TABLE
  `posts`
ADD
  CONSTRAINT `fk_category_post` FOREIGN KEY (`category_id`) REFERENCES `post_categories` (`id_post_category`),
ADD
  CONSTRAINT `fk_user_post` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `users`
--
ALTER TABLE
  `users`
ADD
  CONSTRAINT `fk_role_user` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id_role`);

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;
