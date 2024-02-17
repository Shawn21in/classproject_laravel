-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2024-02-17 16:50:11
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
  `content` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

-- --------------------------------------------------------

--
-- 資料表結構 `product_spec`
--

DROP TABLE IF EXISTS `product_spec`;
CREATE TABLE `product_spec` (
  `id` int(11) NOT NULL,
  `title` varchar(10) DEFAULT NULL,
  `content` varchar(100) DEFAULT NULL COMMENT '規格'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `shop`
--

DROP TABLE IF EXISTS `shop`;
CREATE TABLE `shop` (
  `id` int(11) NOT NULL,
  `shopName` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '茶葉'),
(2, '罐頭');

--
-- 已傾印資料表的索引
--

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
-- 使用資料表自動遞增(AUTO_INCREMENT) `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product_photo`
--
ALTER TABLE `product_photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product_shop`
--
ALTER TABLE `product_shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product_spec`
--
ALTER TABLE `product_spec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `type_layer1`
--
ALTER TABLE `type_layer1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
