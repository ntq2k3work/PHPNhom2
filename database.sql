-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th12 05, 2023 lúc 04:57 PM
-- Phiên bản máy phục vụ: 8.0.30
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `clockweb`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `email` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `level` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`, `level`) VALUES
(1, 'admin', '123', 'ntq@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `time_buy` date NOT NULL,
  `note` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand`
--

CREATE TABLE `brand` (
  `id` int NOT NULL,
  `name_brand` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `address` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `brand`
--

INSERT INTO `brand` (`id`, `name_brand`, `address`) VALUES
(1, 'Rolex', 'Thuỵ sĩ'),
(2, 'Louis Erard', 'Thuỵ sĩ'),
(3, 'Mathey Tissot', 'Thuỵ sĩ'),
(6, 'Dây Da ZRC', 'Pháp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id_categories` int NOT NULL,
  `name_categories` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id_categories`, `name_categories`) VALUES
(1, 'Đồng hồ nam'),
(2, 'Đồng hồ nữ'),
(3, 'Đồng hồ đôi'),
(4, 'Phụ kiện');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int NOT NULL,
  `name_account` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `first_name` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `last_name` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `birthday` date NOT NULL,
  `address` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `email` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `token` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `discount`
--

CREATE TABLE `discount` (
  `id` int NOT NULL,
  `id_product` int NOT NULL,
  `percent` int NOT NULL,
  `time_start` date DEFAULT NULL,
  `time_finish` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `discount`
--

INSERT INTO `discount` (`id`, `id_product`, `percent`, `time_start`, `time_finish`) VALUES
(1, 1, 10, '2022-12-03', '2023-12-01'),
(2, 2, 20, '2023-12-01', '2022-12-03'),
(3, 10, 50, '2023-12-01', '2023-12-31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `material`
--

CREATE TABLE `material` (
  `id` int NOT NULL,
  `wire_material` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `glass_material` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `material`
--

INSERT INTO `material` (`id`, `wire_material`, `glass_material`) VALUES
(1, 'Dây Vải', 'Kính Sapphire'),
(2, 'Dây Da', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetail`
--

CREATE TABLE `orderdetail` (
  `id` int NOT NULL,
  `id_bill` int NOT NULL,
  `id_products` int NOT NULL,
  `quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `id_product` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `name_product` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `released` date NOT NULL,
  `price` int NOT NULL,
  `quantity` int NOT NULL,
  `image` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `battery` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `color` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `shape` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `size` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `water_resistance` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `status` bit(1) NOT NULL DEFAULT b'1',
  `id_categories` int NOT NULL,
  `id_brand` int NOT NULL,
  `id_material` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `id_product`, `name_product`, `released`, `price`, `quantity`, `image`, `battery`, `color`, `shape`, `size`, `water_resistance`, `description`, `status`, `id_categories`, `id_brand`, `id_material`) VALUES
(1, 'AU1080-20A', 'ĐỒNG HỒ LOUIS ERARD 13900AA05.BDC102 NAM PIN DÂY DA', '2021-10-26', 20217000, 5, 'vv', 'Pin (Quartz)', 'Đỏ', 'Tròn', '40 – 43 mm', '	Đi Mưa Nhỏ (3 ATM)', 'Đây là dòng sản phẩm tuyệt vời cho những người đang tìm kiếm chiếc đồng hồ được thiết kế riêng mang đầy đủ sự “chất” Vintage cho đến hiện nay, đó là “chất cổ điển” và chỉ là “cổ điển” tinh khiết.', b'1', 1, 2, 1),
(2, 'AU1081-20A', 'ĐỒNG HỒ TISSOT T41.1.183.34 NỮ TỰ ĐỘNG DÂY INOX', '2023-01-18', 17640000, 200, 'c.jpg', 'Pin (Quartz)', 'Xanh', 'Tròn', '>44 mm', '	Đi Mưa Nhỏ (3 ATM)', 'Mẫu Tissot T41.1.183.34 vẻ ngoài giản dị của chiếc đồng hồ 3 kim nhưng lại khoác lên sự trang nhã với nền mặt số được phối tông màu trắng trước bề mặt kính Sapphire kết hợp cùng tổng thể chiếc đồng hồ kim loại màu bạc đầy sang trọng.', b'0', 2, 3, 1),
(3, 'AU1082-20A', 'ĐỒNG HỒ LOUIS ERARD 13900AA05.BDC102 NAM PIN DÂY DA', '2021-10-26', 20217000, 5, 'vv', 'Pin (Quartz)', 'Tím', 'Tròn', '>44 mm', '	Đi Mưa Nhỏ (3 ATM)', 'Đây là dòng sản phẩm tuyệt vời cho những người đang tìm kiếm chiếc đồng hồ được thiết kế riêng mang đầy đủ sự “chất” Vintage cho đến hiện nay, đó là “chất cổ điển” và chỉ là “cổ điển” tinh khiết.', b'1', 1, 2, 2),
(4, 'AU1083-20A', 'ĐỒNG HỒ LOUIS ERARD 13900AA05.BDC102 NAM PIN DÂY DA', '2021-10-26', 20217000, 5, 'vv', 'Pin (Quartz)', 'Xanh', 'Tròn', '40 – 43 mm', '	Đi Mưa Nhỏ (3 ATM)', 'Đây là dòng sản phẩm tuyệt vời cho những người đang tìm kiếm chiếc đồng hồ được thiết kế riêng mang đầy đủ sự “chất” Vintage cho đến hiện nay, đó là “chất cổ điển” và chỉ là “cổ điển” tinh khiết.', b'1', 1, 2, 1),
(5, 'AU1084-20A', 'ĐỒNG HỒ LOUIS ERARD 13900AA05.BDC102 NAM PIN DÂY DA', '2021-10-26', 20217000, 5, 'vv', 'Pin (Quartz)', 'Xanh', 'Tròn', '>44 mm', '	Đi Mưa Nhỏ (3 ATM)', 'Đây là dòng sản phẩm tuyệt vời cho những người đang tìm kiếm chiếc đồng hồ được thiết kế riêng mang đầy đủ sự “chất” Vintage cho đến hiện nay, đó là “chất cổ điển” và chỉ là “cổ điển” tinh khiết.', b'1', 1, 2, 1),
(6, 'AU1085-20A', 'ĐỒNG HỒ TISSOT T41.1.183.34 NỮ TỰ ĐỘNG DÂY INOX', '2023-01-18', 17640000, 200, 'c.jpg', 'Pin (Quartz)', 'Xanh', 'Tròn', '40 – 43 mm', '	Đi Mưa Nhỏ (3 ATM)', 'Mẫu Tissot T41.1.183.34 vẻ ngoài giản dị của chiếc đồng hồ 3 kim nhưng lại khoác lên sự trang nhã với nền mặt số được phối tông màu trắng trước bề mặt kính Sapphire kết hợp cùng tổng thể chiếc đồng hồ kim loại màu bạc đầy sang trọng.', b'0', 2, 3, 1),
(7, 'AU1086-20A', 'ĐỒNG HỒ ĐÔI LOUIS ERARD 13900AA05.BDC102 NAM PIN DÂY DA', '2021-10-26', 20217000, 5, 'vv', 'Pin (Quartz)', 'Xanh', 'Tròn', '40 – 43 mm', '	Đi Mưa Nhỏ (3 ATM)', 'vvv', b'1', 3, 1, 1),
(8, 'AU1087-20A', 'ĐỒNG HỒ ĐÔI LOUIS ERARD 13900AA05.BDC102 NAM PIN DÂY DA', '2021-10-26', 20217000, 5, 'vv', 'Pin (Quartz)', 'Xanh', 'Tròn', '40 – 43 mm', '	Đi Mưa Nhỏ (3 ATM)', 'vvv', b'1', 3, 1, 1),
(9, 'AU1088-20A', 'ĐỒNG HỒ ĐÔI LOUIS ERARD 13900AA05.BDC102 NAM PIN DÂY DA', '2021-10-26', 20217000, 5, 'vv', 'Pin (Quartz)', 'Xanh', 'Tròn', '40 – 43 mm', '	Đi Mưa Nhỏ (3 ATM)', 'vvv', b'1', 3, 1, 1),
(10, 'AU1089-20A', 'ĐỒNG HỒ ĐÔI LOUIS ERARD 13900AA05.BDC102 NAM PIN DÂY DA', '2021-10-26', 20217000, 5, 'vv', 'Pin (Quartz)', 'Xanh', 'Tròn', '40 – 43 mm', '	Đi Mưa Nhỏ (3 ATM)', 'vvv', b'1', 3, 1, 1),
(11, 'AU1090-20A', 'ĐỒNG HỒ ĐÔI LOUIS ERARD 13900AA05.BDC102 NAM PIN DÂY DA', '2021-10-26', 20217000, 5, 'vv', 'Pin (Quartz)', 'Tím', 'Tròn', '40 – 43 mm', '	Đi Mưa Nhỏ (3 ATM)', 'vvv', b'1', 3, 1, 1),
(12, 'AU1091-20A', 'ĐỒNG HỒ ĐÔI LOUIS ERARD 13900AA05.BDC102 NAM PIN DÂY DA', '2021-10-26', 20217000, 5, 'vv', 'Pin (Quartz)', 'Đỏ', 'Tròn', '40 – 43 mm', '	Đi Mưa Nhỏ (3 ATM)', 'vvv', b'1', 3, 1, 1),
(13, '654 TASMAN', 'DÂY DA ZRC 654 TASMAN', '2023-12-03', 710000, 20, 'vv', NULL, NULL, NULL, NULL, NULL, 'Dây da 654 là sản phẩm sử dụng da bê mờ, lớp đệm dày, công nghệ sản xuất “French Rembordé”.', b'1', 4, 6, 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_bill_user` (`id_user`);

--
-- Chỉ mục cho bảng `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_categories`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_account` (`name_account`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Chỉ mục cho bảng `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_discount_product` (`id_product`);

--
-- Chỉ mục cho bảng `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_bill` (`id_bill`),
  ADD KEY `fk_products` (`id_products`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id_product` (`id_product`),
  ADD KEY `FK_products_categories` (`id_categories`),
  ADD KEY `fk_product_brand` (`id_brand`),
  ADD KEY `fk_product_material` (`id_material`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id_categories` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `discount`
--
ALTER TABLE `discount`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `material`
--
ALTER TABLE `material`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `fk_bill_user` FOREIGN KEY (`id_user`) REFERENCES `customer` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `discount`
--
ALTER TABLE `discount`
  ADD CONSTRAINT `fk_discount_product` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `fk_bill` FOREIGN KEY (`id_bill`) REFERENCES `bill` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_products` FOREIGN KEY (`id_products`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_product_brand` FOREIGN KEY (`id_brand`) REFERENCES `brand` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_product_material` FOREIGN KEY (`id_material`) REFERENCES `material` (`id`),
  ADD CONSTRAINT `FK_products_categories` FOREIGN KEY (`id_categories`) REFERENCES `categories` (`id_categories`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
