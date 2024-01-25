-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 19, 2024 lúc 08:32 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dkkhoahoc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baihoc`
--

CREATE TABLE `baihoc` (
  `id` int(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sotuvung` varchar(255) NOT NULL,
  `trinhdo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `baihoc`
--

INSERT INTO `baihoc` (`id`, `image`, `name`, `sotuvung`, `trinhdo`) VALUES
(3, 'gd.jpg', '[A1.1 Bài 5] Gia đình', '16 từ vựng', 'A1'),
(4, 'dovatvanphong.jpg', '[A1.1 Bài 11] Đồ vật văn phòng ', '10 từ vựng', 'A1'),
(5, 'food.jpg', '[A1.1 Bài 17] Thực phẩm', '12 từ vựng', 'A1'),
(6, 'lehoi.jpg', '[A2.1 Bài 1 ] Lễ hội', '16 từ vựng', 'A2'),
(7, 'noithat.jpg', '[A2.2 Bài 2] Nội thất', '13 từ vựng', 'A2'),
(8, 'problem.jpg', '[B1.1 Bài 1] Các Promblem', '10 từ vựng', 'B1'),
(9, 'thoitiet.jpg', '[C. Bài 1] Thời tiết', '15 từ vựng', 'C');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baithi`
--

CREATE TABLE `baithi` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `trinhdo` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog`
--

CREATE TABLE `blog` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `img_title` varchar(255) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `author` varchar(255) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `blog`
--

INSERT INTO `blog` (`id`, `name`, `img`, `img_title`, `content`, `author`, `type`) VALUES
(5, 'Tiếng Đức không khó, lời khuyên danh cho người mới bắt đầu', 'blog1.jpg', 'Tiếng Đức không khó', 'Đưa chúng ta tới một ngôn ngữ mới - Tiếng Đức.', 'David', 'TECH'),
(6, '4 phương thức nghe tiếng Đức hiệu quả cho người mới bắt đầu', 'blog2.jpg', '4 phương thức nghe tiếng Đức hiệu quả ', 'Những phương thức dễ học, dễ hiểu, dễ tiếp cận tới mọi người học.', 'Michael', 'LEARN'),
(7, 'Hướng dẫn học tiếng Đức online hiệu quả cho người mới bắt đầu', 'blog3.jpg', 'Hướng dẫn học tiếng Đức online hiệu quả', 'Khóa học Online hấp dẫn cùng nhiều ưu đãi khi đăng ký khóa học.', 'Holly Richardson', 'LEARN'),
(8, 'Du học Đức cần phải chuẩn bị những gì', 'blog4.jpg', 'Du học Đức', 'Những điều cần chuẩn bị trước khi đi du học Đức.', 'Seanne Mcvarish', 'NEWS'),
(9, 'Du học Đức 2022: Tất tần tật điều kiện cần có để du học Đức', 'blog5.jpg', 'Tất tần tật điều kiện cần có để du học Đức', 'Những điều kiện cơ bản cần có khi chúng ta muốn sin visa du học Đức.', 'Nina Neborowsky', 'TECH'),
(10, 'Cơ hội bay ngay đến Đức cho học viên có B1 đủ và B1 thiếu kỹ năng', 'blog6.png', 'Cơ hội bay ngay đến Đức', 'Cơ hội bay ngay đến Đức cho học viên có B1 đủ và B1 thiếu kỹ năng.', 'Chirag Patel', 'NEWS');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `name`, `price`, `image`, `quantity`) VALUES
(22, 'KHÓA LUYỆN THI B1', '2200000', 'klt.png', 1),
(23, 'Khóa học thanh thiếu niên', '700000', 'khttn.png', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` int(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `gmail` varchar(255) NOT NULL,
  `method` varchar(100) NOT NULL,
  `diachi` varchar(100) NOT NULL,
  `total_products` varchar(255) NOT NULL,
  `total_price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`id`, `name`, `number`, `gmail`, `method`, `diachi`, `total_products`, `total_price`) VALUES
(2, 'hongphuongg', '098376588', 'phuong20211663@gmail.com', 'cash on delivery', 'haiphong', 'KHÓA LUYỆN THI B1 (1 )', '2200000'),
(3, 'bang', '094864589', 'bang2003@gmail.com', 'credit cart', 'hanoi', 'KHÓA LUYỆN THI B1 (1 ), Khóa học thanh thiếu niên (1 )', '2900000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `nd` varchar(255) NOT NULL,
  `ndct_title` varchar(255) NOT NULL,
  `ndct_text` varchar(255) NOT NULL,
  `trinhdo` varchar(255) NOT NULL,
  `khaigiang` varchar(255) NOT NULL,
  `thoigian` varchar(255) NOT NULL,
  `sotiethoc` varchar(255) NOT NULL,
  `hocvien` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `title1` varchar(255) NOT NULL,
  `title2` varchar(255) NOT NULL,
  `title3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `nd`, `ndct_title`, `ndct_text`, `trinhdo`, `khaigiang`, `thoigian`, `sotiethoc`, `hocvien`, `price`, `title1`, `title2`, `title3`) VALUES
(14, 'Khóa học thanh thiếu niên', 'khttn.png', 'Trải nghiệm và thực hành ngôn ngữ một cách tích cực thông qua các trò chơi đóng vai, các bài phỏng vấn hoặc các dự án', 'HỌC TIẾNG ĐỨC THẬT VUI', 'Trong các tiết học định hướng giao tiếp và đa phương tiện của chúng tôi các bạn thanh thiếu niên sẽ nhanh chóng thông thạo các nguyên tắc cơ bản của tiếng Đức. Bên cạnh các bài tập ngữ pháp và từ vựng chúng tôi đặc biệt chú trọng tới các bài tập mang tính', 'A2', '3 tháng / lần', '12 tuần', '2 buổi x 150 phút/buổi', 'Max. 15', '700000', 'Dành cho lứa tuổi 12 đến 15', 'Chủ đề học phù hợp với lứa tuổi', 'Hình thức học tương tác qua trò chơi'),
(15, 'KHÓA LUYỆN THI B1', 'klt.png', 'Ôn tập cụ thể cho các nội dung trong kỳ thi B1', 'HÃY CHUẨN BỊ SẴN SÀNG CHO THÀNH CÔNG CỦA BẠN', 'Trong khóa học này, chúng tôi chuẩn bị cho bạn đạt mục tiêu chứng chỉ B1 được quốc tế công nhận của viện Goethe. Bạn sẽ làm quen với các phần khác nhau của phần thi nói và thi viết dựa trên các bài thi mô phỏng và được luyện cho quen với các kĩ thuật thi ', 'B1', 'Hàng tháng', 'Học trực tuyến | 3 tuần', 'Học trực tuyến | 3 x 120 phút', 'Max. 16', '2200000', 'Học trực tuyến', 'Bài tập hữu ích', 'Chuẩn bị tối ưu cho kỳ thi'),
(16, 'KHÓA HỌC ĐẶC BIỆT', 'khdb.png', 'Practice specific skills', 'HỌC TIẾNG ĐỨC THẬT VUI', 'Trang bị hành trang cho cuộc sống tại Đức', 'C', 'Hàng tuần', '6 tuần', '2 buổi x 150 phút/buổi', 'Max. 10', '1200000', 'Khóa học nhập cư C', 'Trang bị hành trang cho cuộc sống tại Đức', 'Luyện nói');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tk`
--

CREATE TABLE `tk` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gmail` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tk`
--

INSERT INTO `tk` (`id`, `username`, `password`, `phone`, `gmail`, `role`) VALUES
(1, 'Phuong', 'phuong129', '0769600156', 'phuong129@gmail.com', 'admin'),
(2, 'Bang', 'bang2003', '0934294033', 'bang2003@gmail.com', NULL),
(3, 'Ha nguyen', 'ha2003', '097643462', 'ha20033@gmail.com', NULL),
(6, 'nhi', 'nhi35', '0973665', 'nhi@gmail.com', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `baihoc`
--
ALTER TABLE `baihoc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `baithi`
--
ALTER TABLE `baithi`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tk`
--
ALTER TABLE `tk`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `baihoc`
--
ALTER TABLE `baihoc`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `baithi`
--
ALTER TABLE `baithi`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `tk`
--
ALTER TABLE `tk`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
