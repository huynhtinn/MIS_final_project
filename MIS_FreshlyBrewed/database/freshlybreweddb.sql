-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 29, 2024 lúc 05:17 AM
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
-- Cơ sở dữ liệu: `freshlybreweddb`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedbacks`
--

CREATE TABLE `feedbacks` (
  `FeedbackID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Phone` varchar(15) DEFAULT NULL,
  `Message` text NOT NULL,
  `Category` varchar(50) NOT NULL,
  `Rating` int(11) NOT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `feedbacks`
--

INSERT INTO `feedbacks` (`FeedbackID`, `Name`, `Email`, `Phone`, `Message`, `Category`, `Rating`, `CreatedAt`) VALUES
(10, 'Phạm Huỳnh Tín', '522h0150@student.tdtu.edu.vn', '0329775220', 'good', 'Drinks', 5, '2024-11-29 04:09:56'),
(11, 'Phạm Huỳnh Tín', '522h0150@student.tdtu.edu.vn', '0329775220', 'Need more waiter', 'Staff', 3, '2024-11-29 04:10:07'),
(12, 'Phạm Huỳnh Tín', '522h0150@student.tdtu.edu.vn', '0329775220', 'not have parking ', 'Other', 2, '2024-11-29 04:10:50'),
(13, 'Phạm Huỳnh Tín', '522h0150@student.tdtu.edu.vn', '0329775220', 'too noisy', 'Other', 2, '2024-11-29 04:11:06'),
(14, 'Phạm Huỳnh Tín', '522h0150@student.tdtu.edu.vn', '0329775220', 'decor too basic, can not take a good selfie', 'Other', 1, '2024-11-29 04:11:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetails`
--

CREATE TABLE `orderdetails` (
  `OrderDetailID` int(11) NOT NULL,
  `OrderID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `UnitPrice` decimal(10,2) NOT NULL,
  `ProductName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orderdetails`
--

INSERT INTO `orderdetails` (`OrderDetailID`, `OrderID`, `ProductID`, `Quantity`, `UnitPrice`, `ProductName`) VALUES
(69, 66, 17, 1, 19.00, 'Iced Coffee Bliss'),
(70, 66, 18, 1, 15.00, 'Tropical Sunrise Smoothie'),
(71, 67, 17, 1, 19.00, 'Iced Coffee Bliss'),
(72, 68, 17, 4, 19.00, 'Iced Coffee Bliss'),
(73, 71, 17, 2, 19.00, 'Iced Coffee Bliss');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `OrderDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `TotalAmount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`OrderID`, `UserID`, `OrderDate`, `TotalAmount`) VALUES
(1, 1, '2024-11-27 16:08:20', 65.55),
(2, 1, '2024-11-27 16:08:25', 65.55),
(3, 1, '2024-11-27 16:08:53', 65.55),
(4, 1, '2024-11-27 16:10:31', 43.70),
(5, 1, '2024-11-27 16:10:40', 43.70),
(6, 1, '2024-11-27 16:32:06', 131.10),
(7, 1, '2024-11-27 16:40:21', 131.10),
(8, 1, '2024-11-27 16:41:04', 131.10),
(9, 1, '2024-11-27 16:41:05', 131.10),
(10, 1, '2024-11-27 16:56:20', 114.00),
(11, 1, '2024-11-27 16:56:28', 114.00),
(12, 1, '2024-11-27 16:59:27', 114.00),
(13, 1, '2024-11-27 17:03:01', 114.00),
(14, 1, '2024-11-27 17:04:53', 131.10),
(15, 1, '2024-11-27 17:05:01', 131.10),
(16, 1, '2024-11-27 17:07:26', 114.00),
(17, 1, '2024-11-27 17:08:43', 114.00),
(18, 1, '2024-11-27 17:08:43', 114.00),
(19, 1, '2024-11-27 17:12:15', 114.00),
(21, 1, '2024-11-28 09:31:53', 38.00),
(22, 1, '2024-11-28 09:33:31', 38.00),
(23, 1, '2024-11-28 09:35:43', 38.00),
(24, 1, '2024-11-28 09:35:45', 38.00),
(25, 1, '2024-11-28 09:49:51', 19.00),
(26, 1, '2024-11-28 10:07:13', 19.00),
(27, 1, '2024-11-28 10:07:26', 19.00),
(28, 1, '2024-11-28 10:17:07', 19.00),
(29, 1, '2024-11-28 10:17:12', 19.00),
(30, 1, '2024-11-28 10:17:12', 19.00),
(31, 1, '2024-11-28 10:17:14', 19.00),
(32, 1, '2024-11-28 10:17:14', 19.00),
(33, 1, '2024-11-28 10:17:14', 19.00),
(34, 1, '2024-11-28 10:17:14', 19.00),
(35, 1, '2024-11-28 10:19:31', 19.00),
(36, 1, '2024-11-28 10:19:41', 19.00),
(37, 1, '2024-11-28 10:19:41', 19.00),
(38, 1, '2024-11-28 10:19:42', 19.00),
(39, 1, '2024-11-28 10:19:42', 19.00),
(40, 1, '2024-11-28 10:19:44', 19.00),
(41, 1, '2024-11-28 10:19:44', 19.00),
(42, 1, '2024-11-28 10:19:44', 19.00),
(43, 1, '2024-11-28 10:19:44', 19.00),
(44, 1, '2024-11-28 10:19:44', 19.00),
(45, 1, '2024-11-28 10:19:44', 19.00),
(46, 1, '2024-11-28 10:19:47', 19.00),
(47, 1, '2024-11-28 10:19:47', 19.00),
(48, 1, '2024-11-28 10:19:47', 19.00),
(49, 1, '2024-11-28 10:19:47', 19.00),
(50, 1, '2024-11-28 10:19:48', 19.00),
(51, 1, '2024-11-28 10:19:48', 19.00),
(52, 1, '2024-11-28 10:19:48', 19.00),
(53, 1, '2024-11-28 10:19:48', 19.00),
(54, 1, '2024-11-28 10:22:54', 19.00),
(55, 1, '2024-11-28 10:35:09', 19.00),
(56, 1, '2024-11-28 10:36:02', 19.00),
(57, 1, '2024-11-28 10:36:32', 114.00),
(58, 1, '2024-11-28 10:38:24', 114.00),
(59, 1, '2024-11-28 10:41:06', 95.00),
(60, 1, '2024-11-28 11:25:22', 114.00),
(61, 1, '2024-11-28 11:49:20', 114.00),
(62, 1, '2024-11-28 14:06:54', 19.00),
(63, 1, '2024-11-28 14:14:52', 38.00),
(64, 1, '2024-11-28 14:55:19', 91.00),
(65, 1, '2024-11-28 15:17:05', 57.00),
(66, 1, '2024-11-29 02:38:49', 34.00),
(67, 1, '2024-11-29 02:52:01', 19.00),
(68, 1, '2024-11-29 02:53:25', 76.00),
(71, 1, '2024-11-29 04:12:18', 38.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `ProductID` int(11) NOT NULL,
  `ProductName` varchar(100) NOT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Price` decimal(10,2) NOT NULL,
  `ImageUrl` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`ProductID`, `ProductName`, `Description`, `Price`, `ImageUrl`) VALUES
(16, 'Purple Passion Juice', 'A vibrant purple drink served in a mason jar, with a refreshing blend of mixed berries and a hint of mint. Perfect for a hot day to rejuvenate your senses.', 19.00, 'img/store-product-7.jpg'),
(17, 'Iced Coffee Bliss', 'An invigorating iced coffee topped with frothy bubbles, served in a glass with a straw. This refreshing beverage is perfect for those who need a caffeine boost.', 19.00, 'img/store-product-8.jpg'),
(18, 'Tropical Sunrise Smoothie', 'A delightful smoothie made with tropical fruits like mango, pineapple, and banana, blended to perfection. Served in a tall glass with a slice of pineapple on the rim.', 15.00, 'img/store-product-9.jpg'),
(19, 'Matcha Mint Cooler', 'A refreshing green drink made with matcha and mint, served in a mason jar with a straw. This unique blend offers a revitalizing and healthful experience.', 19.00, 'img/store-product-10.jpg'),
(20, 'Mango Sunrise', 'An enticing orange drink infused with the sweetness of ripe mango pieces, served in a glass. This tropical delight is a perfect way to brighten your day.', 19.00, 'img/store-product-11.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `FullName` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `PasswordHash` varchar(255) NOT NULL,
  `Phone` varchar(15) DEFAULT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`UserID`, `FullName`, `Email`, `PasswordHash`, `Phone`, `CreatedAt`) VALUES
(1, 'user', 'user@gmail.com', '$2y$10$dKeowK8Qpyb/efPlhKjod.HU3LQ9yWrCSwWu9CTB0sQVr6ECAoEaa', '0987654321', '2024-11-26 15:45:00'),
(3, 'user', 'user123@gmail.com', '$2y$10$aCcCT2rvck7P1vHWa431kOAMy.tZGaaGQ6qSGhZsNgHy2CPMSNu4G', '0987654321', '2024-11-27 16:07:14'),
(4, 'Tin Pham', 'tin@gmail.com', '$2y$10$YmuCRey0nQA3WO8w6HVcDeuNgjhr3wwmN6lXx1lG.KnLlrEjwkwmu', '0987654321', '2024-11-29 03:05:19'),
(6, 'tin  ', 'tin123@gmail.com', '$2y$10$Qvaw4o12BwgsFwpmzyYXiO8NP1631n5NFsx6VWVc5hILZsmHmONTK', '0987654321', '2024-11-29 03:06:01');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`FeedbackID`);

--
-- Chỉ mục cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`OrderDetailID`),
  ADD KEY `OrderID` (`OrderID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `UserID` (`UserID`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `FeedbackID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `OrderDetailID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`OrderID`),
  ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
