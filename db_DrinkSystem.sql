-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2019-08-31 15:44:34
-- 伺服器版本： 10.3.16-MariaDB
-- PHP 版本： 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `db_DrinkSystem`
--
CREATE DATABASE IF NOT EXISTS `db_DrinkSystem` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db_DrinkSystem`;

-- --------------------------------------------------------

--
-- 資料表結構 `product_list`
--

CREATE TABLE `product_list` (
  `drink_date` varchar(20) NOT NULL DEFAULT '',
  `drink_name` varchar(30) NOT NULL DEFAULT '',
  `price` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `product_list`
--

INSERT INTO `product_list` (`drink_date`, `drink_name`, `price`) VALUES
('108/01/01', '布丁鮮豆奶', 60),
('108/02/28', '大甲芋頭鮮奶', 85),
('108/03/11', '養樂多綠', 50),
('108/04/04', '青檸香茶', 50),
('108/05/20', '金桔檸檬', 50),
('108/05/27', '柳丁綠茶', 55),
('108/06/30', '手炒黑糖鮮奶', 80),
('108/07/09', '決明大麥', 25),
('108/07/15', '茉香綠茶', 30),
('108/08/03', '珍珠紅茶拿鐵', 65);
;

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `account` varchar(10) NOT NULL DEFAULT '',
  `password` varchar(10) NOT NULL DEFAULT '',
  `name` varchar(10) NOT NULL DEFAULT '',
  `lineid` varchar(20) NOT NULL DEFAULT '',
  `cellphone` varchar(20) NOT NULL DEFAULT '',
  `comment` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `users`
--

INSERT INTO `users` (`id`, `account`, `password`, `name`, `lineid`, `cellphone`, `comment`) VALUES
(1, 'a001', '001', '蔡一一', '36985214', '(0963) 427-857', '這是蔡一一'),
(3, 'a003', '003', '劉三三', '63332222', '(0963) 555-887', ''),
(2, 'a002', '002', '陳二二', '23685978', '(0968) 568-854', '這是陳二二'),
(4, 'a004', '004', '王四四', '55887744', '(02)3353-8852', ''),
(5, 'a005', '005', '賴五', '55555422', '(04)2227-5569', ''),
(6, 'a006', '006', '陶六', '44556633', '(07)3696-8521', ''),
(7, 'a007', '007', '蕭七', '77556985', '(04)9558-4255', ''),
(8, 'a008', '008', '余八', '44556255', '(09)0665-47222', ''),
(9, 'a009', '009', '陳九', '44365822', '(01)1478-5236', ''),
(10, 'a010', '010', '施十', '75632589', '(06)5221-5577', '');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `product_list`
--
ALTER TABLE `product_list`
  ADD PRIMARY KEY (`drink_date`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
