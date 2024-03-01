-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2024-03-01 16:55:44
-- 伺服器版本： 10.4.32-MariaDB
-- PHP 版本： 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `class_project`
--
CREATE DATABASE IF NOT EXISTS `class_project` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `class_project`;

-- --------------------------------------------------------

--
-- 資料表結構 `ap`
--

DROP TABLE IF EXISTS `ap`;
CREATE TABLE `ap` (
  `id` int(11) NOT NULL,
  `ap_name` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `ap`
--

INSERT INTO `ap` (`id`, `ap_name`) VALUES
(1, '產品'),
(2, '關於');

-- --------------------------------------------------------

--
-- 資料表結構 `banner`
--

DROP TABLE IF EXISTS `banner`;
CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `apid` int(11) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `banner`
--

INSERT INTO `banner` (`id`, `apid`, `photo`) VALUES
(1, 1, '2024_03_01_16_45_07_226.jpg'),
(2, 2, '2024_03_01_16_45_42_155.jpg');

-- --------------------------------------------------------

--
-- 資料表結構 `manager`
--

DROP TABLE IF EXISTS `manager`;
CREATE TABLE `manager` (
  `manager_Id` varchar(15) NOT NULL,
  `manager_pwd` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `manager`
--

INSERT INTO `manager` (`manager_Id`, `manager_pwd`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- 資料表結構 `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `type_layer1` int(11) DEFAULT NULL COMMENT '商品類別',
  `title` varchar(50) DEFAULT NULL COMMENT '大標題',
  `sub_title` varchar(300) DEFAULT NULL COMMENT '小標題',
  `content` varchar(500) DEFAULT NULL,
  `home` char(10) DEFAULT NULL COMMENT '判別用,是否在首頁\r\n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `product`
--

INSERT INTO `product` (`id`, `type_layer1`, `title`, `sub_title`, `content`, `home`) VALUES
(5, 14, '四季春碳培烏龍茶', '四季春清香濃烈帶點甜味的滋味，非常容易辨別對剛踏入茶葉領域的人來說是非常好入門的茶款。', '四季春清香濃烈帶點甜味的滋味，非常容易辨別對剛踏入茶葉領域的人來說是非常好入門的茶款。', 'Y'),
(9, 14, '四季春碳培烏龍茶', '四季春清香濃烈帶點甜味的滋味，非常容易辨別對剛踏入茶葉領域的人來說是非常好入門的茶款。', '四季春清香濃烈帶點甜味的滋味，非常容易辨別對剛踏入茶葉領域的人來說是非常好入門的茶款。', 'Y'),
(10, 14, '四季春碳培烏龍茶', '四季春清香濃烈帶點甜味的滋味，非常容易辨別對剛踏入茶葉領域的人來說是非常好入門的茶款。', '四季春清香濃烈帶點甜味的滋味，非常容易辨別對剛踏入茶葉領域的人來說是非常好入門的茶款。', 'Y'),
(13, 14, '四季春碳培烏龍茶', '四季春清香濃烈帶點甜味的滋味，非常容易辨別對剛踏入茶葉領域的人來說是非常好入門的茶款。', '四季春清香濃烈帶點甜味的滋味，非常容易辨別對剛踏入茶葉領域的人來說是非常好入門的茶款。', 'Y'),
(14, 14, 'qwdqd', 'qwdwd', 'qwdqw', NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `product_content`
--

DROP TABLE IF EXISTS `product_content`;
CREATE TABLE `product_content` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `product_content`
--

INSERT INTO `product_content` (`id`, `product_id`, `content`) VALUES
(1, 10, '<p>wqdwd</p>'),
(2, 13, '<p>wqdwd</p>'),
(3, 14, '<p>wqdwd</p>');

-- --------------------------------------------------------

--
-- 資料表結構 `product_photo`
--

DROP TABLE IF EXISTS `product_photo`;
CREATE TABLE `product_photo` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL COMMENT '產品ID',
  `photo` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `product_photo`
--

INSERT INTO `product_photo` (`id`, `product_id`, `photo`) VALUES
(22, 9, '2024_03_01_09_37_23_919.jpg'),
(23, 9, '2024_03_01_09_37_24_054.jpg'),
(24, 9, '2024_03_01_09_37_24_184.jpg'),
(25, 5, '2024_03_01_09_50_14_074.jpg'),
(26, 5, '2024_03_01_09_50_23_813.jpg'),
(27, 5, '2024_03_01_09_50_32_283.jpg'),
(28, 10, '2024_03_01_11_32_49_393.jpg'),
(29, 10, '2024_03_01_11_32_49_476.jpg'),
(32, 13, '2024_03_01_11_53_13_710.jpg'),
(33, 14, '2024_03_01_11_54_29_390.jpg');

-- --------------------------------------------------------

--
-- 資料表結構 `product_shop`
--

DROP TABLE IF EXISTS `product_shop`;
CREATE TABLE `product_shop` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL COMMENT '產品id',
  `shop_id` int(11) DEFAULT NULL COMMENT '商店id',
  `url` varchar(200) DEFAULT NULL COMMENT '商品銷售網址'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `product_shop`
--

INSERT INTO `product_shop` (`id`, `product_id`, `shop_id`, `url`) VALUES
(18, 5, 1, 'https://www.youtube.com/'),
(19, 5, 2, 'https://www.showtimes.com.tw/programs'),
(20, 5, 3, 'www.test3.com'),
(21, 9, 1, 'adwd'),
(22, 10, 1, 'sad'),
(23, 10, 2, 'sadas'),
(26, 13, 1, 'cascsc'),
(27, 14, 1, 'qwdwd');

-- --------------------------------------------------------

--
-- 資料表結構 `product_spec`
--

DROP TABLE IF EXISTS `product_spec`;
CREATE TABLE `product_spec` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `title` varchar(10) DEFAULT NULL,
  `content` varchar(100) DEFAULT NULL COMMENT '規格'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `product_spec`
--

INSERT INTO `product_spec` (`id`, `product_id`, `title`, `content`) VALUES
(17, 5, '品種', '烏龍茶'),
(18, 5, '茶乾外型', '圓形球狀'),
(19, 5, '產區', '南投'),
(20, 5, '海拔', '100-600m'),
(21, 5, '採收方式', '機採'),
(22, 5, '採收季節', '春、冬'),
(23, 5, 'EAN', '12345678910'),
(24, 5, '發酵度', '中發酵'),
(25, 5, '培火度', '無培火'),
(26, 9, '品種', '烏龍茶'),
(27, 10, '品種', '烏龍茶'),
(30, 13, '品種', '烏龍茶'),
(31, 14, '品種', '烏龍茶');

-- --------------------------------------------------------

--
-- 資料表結構 `shop`
--

DROP TABLE IF EXISTS `shop`;
CREATE TABLE `shop` (
  `id` int(11) NOT NULL,
  `shopName` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `shop`
--

INSERT INTO `shop` (`id`, `shopName`) VALUES
(1, '台中中港1'),
(2, '台中中港2'),
(3, '台中清水1'),
(4, '台北大安1'),
(11, '台中中港2'),
(12, '台中中港3'),
(13, '台中中港4');

-- --------------------------------------------------------

--
-- 資料表結構 `type_layer1`
--

DROP TABLE IF EXISTS `type_layer1`;
CREATE TABLE `type_layer1` (
  `id` int(11) NOT NULL,
  `type_layer1_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `type_layer1`
--

INSERT INTO `type_layer1` (`id`, `type_layer1_name`) VALUES
(14, '四角茶包'),
(15, '原葉茶包'),
(16, '嚴選茶包'),
(17, '頂級茶葉');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `ap`
--
ALTER TABLE `ap`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`manager_Id`);

--
-- 資料表索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `product_content`
--
ALTER TABLE `product_content`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `product_photo`
--
ALTER TABLE `product_photo`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `product_shop`
--
ALTER TABLE `product_shop`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `product_spec`
--
ALTER TABLE `product_spec`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `type_layer1`
--
ALTER TABLE `type_layer1`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `ap`
--
ALTER TABLE `ap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product_content`
--
ALTER TABLE `product_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product_photo`
--
ALTER TABLE `product_photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product_shop`
--
ALTER TABLE `product_shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product_spec`
--
ALTER TABLE `product_spec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `type_layer1`
--
ALTER TABLE `type_layer1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
