-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2016 at 04:16 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `username` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DateCreate` datetime DEFAULT NULL,
  `DateUpdate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `username`, `fullname`, `password`, `DateCreate`, `DateUpdate`) VALUES
(1, 'admin', 'Bọ Chét', 'c3284d0f94606de1fd2af172aba15bf3', NULL, NULL),
(2, 'admincp', 'Vũ Quý', 'c3284d0f94606de1fd2af172aba15bf3', '2016-11-05 15:17:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_cms`
--

CREATE TABLE `admin_cms` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_hash` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `zoneid` int(11) NOT NULL DEFAULT '0',
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_cms`
--

INSERT INTO `admin_cms` (`id`, `username`, `fullname`, `password_hash`, `password_reset_token`, `email`, `status`, `zoneid`, `auth_key`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Bọ Chét', '1ac15495cd18e19dbb035affa92f6c47', '', '', 1, 1, 'HPyro3x22WD3QI8IEapJM2OZrYggYzv-', 1463992289, 1471922406);

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `ID` int(11) NOT NULL,
  `Title` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Images` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `UserCreate` int(11) DEFAULT NULL,
  `UserUpdate` int(11) DEFAULT NULL,
  `DateCreate` datetime DEFAULT NULL,
  `DateUpdate` datetime DEFAULT NULL,
  `Status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `ID` int(11) NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `parentid` int(11) NOT NULL,
  `orderindex` int(11) NOT NULL DEFAULT '1',
  `Status` int(11) NOT NULL,
  `DataCreate` datetime DEFAULT NULL,
  `DataUpdate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`ID`, `title`, `alias`, `description`, `parentid`, `orderindex`, `Status`, `DataCreate`, `DataUpdate`) VALUES
(1, 'iPhone (Apple)', 'iphone-apple', 'iPhone (Apple)', 0, 1, 1, NULL, NULL),
(2, 'Samsung', 'samsung', 'Samsung', 0, 1, 1, NULL, NULL),
(3, 'OPPO', 'oppo', 'OPPO', 0, 1, 1, NULL, NULL),
(4, 'Asus (Zendphone)', 'asus-zendphone', 'Asus (Zendphone)', 0, 1, 1, NULL, NULL),
(5, 'Sony', 'sony', 'Sony', 0, 1, 1, NULL, NULL),
(6, 'HTC', 'htc', 'HTC', 0, 1, 1, NULL, NULL),
(7, 'Huawie', 'huawie', 'Huawie', 0, 1, 1, NULL, NULL),
(8, 'LG', 'lg', 'LG', 0, 1, 1, NULL, NULL),
(9, 'ZTE', 'zte', 'ZTE', 0, 1, 1, NULL, NULL),
(10, 'Xaiomi', 'xaiomi', 'Xaiomi', 0, 1, 1, NULL, NULL),
(11, 'Mobiistar', 'mobiistar', 'Mobiistar', 0, 1, 1, NULL, NULL),
(12, 'iPhone 5s', 'iphone-5s', 'iPhone 5s', 1, 1, 1, NULL, NULL),
(13, 'iPhone 5', 'iphone-5', 'iPhone 5', 1, 1, 1, NULL, NULL),
(14, 'iPhone 6', 'iphone-6', 'iPhone 6', 1, 1, 1, NULL, NULL),
(15, 'iPhone 6 Plus', 'iphone-6-plus', 'iPhone 6 Plus', 1, 1, 1, NULL, NULL),
(16, 'Samsung S6', 'samsung-s6', 'Samsung S6', 2, 1, 1, NULL, NULL),
(17, 'Phụ kiện di động', 'phu-kien-di-dong', 'Phụ kiện di động', 0, 1, 1, '2016-11-05 15:28:28', NULL),
(18, 'Tin tức', 'tin-túc', 'Tin tức mới trong ngày', 0, 1, 1, '2016-11-05 23:37:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `ID` int(11) NOT NULL,
  `Title` text COLLATE utf8_unicode_ci,
  `Email` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Phone` int(11) DEFAULT NULL,
  `Status` int(1) DEFAULT '0',
  `UserCreate` int(11) DEFAULT NULL,
  `UserUpdate` int(11) DEFAULT NULL,
  `DateCreate` datetime DEFAULT NULL,
  `DateUpdate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `ID` int(11) NOT NULL,
  `Title` text COLLATE utf8_unicode_ci,
  `Description` text COLLATE utf8_unicode_ci,
  `UserCreate` int(11) DEFAULT NULL,
  `UserUpdate` int(11) DEFAULT NULL,
  `DateCreate` datetime DEFAULT NULL,
  `DateUpdate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

CREATE TABLE `detail` (
  `ID` int(11) NOT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `UserCreate` int(11) DEFAULT NULL,
  `Phone` int(11) DEFAULT NULL,
  `Title` text COLLATE utf8_unicode_ci,
  `Fullname` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `message` text COLLATE utf8_unicode_ci,
  `pay` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DateCreate` datetime DEFAULT NULL,
  `Total` int(11) DEFAULT NULL,
  `Day_Order` datetime DEFAULT NULL,
  `Security` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `ID` int(11) NOT NULL,
  `Title` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CategoriesID` int(11) DEFAULT NULL,
  `Alias` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `UserCreate` int(11) DEFAULT NULL,
  `UserUpdate` int(11) DEFAULT NULL,
  `DateCreate` datetime DEFAULT NULL,
  `DateUpdate` datetime DEFAULT NULL,
  `View` int(11) DEFAULT NULL,
  `ShowHome` int(11) DEFAULT '0',
  `Status` int(11) DEFAULT '1',
  `Thumbnail` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Thumbail_hd` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Images_Url` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Pin_Silder` int(11) DEFAULT '0',
  `Keyword` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`ID`, `Title`, `CategoriesID`, `Alias`, `Description`, `UserCreate`, `UserUpdate`, `DateCreate`, `DateUpdate`, `View`, `ShowHome`, `Status`, `Thumbnail`, `Thumbail_hd`, `Images_Url`, `Pin_Silder`, `Keyword`) VALUES
(1, 'tiêu đề mới trong doanh nhân thành đạt', 18, 'tieu-de-moi-trong-doanh-nhan-thanh-dat', 'tiêu đề mới trong doanh nhân thành đạt', 1, NULL, '2016-11-06 01:35:47', NULL, NULL, 1, 1, NULL, NULL, '', 0, 'từ khoá'),
(2, 'Kỹ thuật test lỗi CMS', 18, 'ky-thuat-test-loi-cms', 'Kỹ thuật test lỗi CMSKỹ thuật test lỗi CMSKỹ thuật test lỗi CMS sda', 1, NULL, '2016-11-07 01:52:36', NULL, NULL, 1, 1, NULL, NULL, '10399758_1672843006299033_2132257092379456840_n.jpg', 0, 'từ khoá');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `ID` int(11) NOT NULL,
  `Title` text COLLATE utf8_unicode_ci,
  `CategoriesID` int(11) DEFAULT NULL,
  `UserCreate` int(11) DEFAULT NULL,
  `DateCreate` datetime DEFAULT NULL,
  `Status` int(1) DEFAULT '0',
  `Total` int(11) DEFAULT NULL,
  `DetailID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ID` int(11) NOT NULL,
  `Title` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Alais` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Price` int(11) DEFAULT NULL,
  `Sale` int(11) DEFAULT NULL,
  `CategoriesID` int(11) DEFAULT NULL,
  `DateCreate` datetime DEFAULT NULL,
  `DateUpdate` datetime DEFAULT NULL,
  `UserCreate` int(11) DEFAULT NULL,
  `UserUpdate` int(11) DEFAULT NULL,
  `Status` int(11) NOT NULL DEFAULT '0',
  `is_delete` int(11) DEFAULT '1',
  `Description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Images` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gitf` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `warranty` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Keywords` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Pin` int(1) DEFAULT '0',
  `Thumbnail` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Video_Url` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ID`, `Title`, `Alais`, `Price`, `Sale`, `CategoriesID`, `DateCreate`, `DateUpdate`, `UserCreate`, `UserUpdate`, `Status`, `is_delete`, `Description`, `Images`, `gitf`, `warranty`, `Keywords`, `Pin`, `Thumbnail`, `Video_Url`) VALUES
(1, 'Tai nghe small', NULL, 1000000, 10, 8, '2016-10-27 11:03:05', NULL, 1, NULL, 1, 1, 'Tai nghe small', NULL, 'không có quà tặng', NULL, 'tai nghe small', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `ID` int(11) NOT NULL,
  `Fullname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `skype` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Facebook` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Phone` int(11) DEFAULT NULL,
  `Status` int(11) DEFAULT '0',
  `DateCreate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fullname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Status` int(11) DEFAULT '0',
  `DateCreate` datetime DEFAULT NULL,
  `DateUpdate` datetime DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Avatar` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `username`, `password`, `fullname`, `Status`, `DateCreate`, `DateUpdate`, `email`, `phone`, `address`, `Avatar`, `gender`) VALUES
(1, 'hoabingbong94', '123456', 'Vũ Văn Hoà', 1, '2016-10-03 00:00:00', '2016-11-07 10:14:57', 'hoabingbong94@gmail.com', '987548356', 'Nghĩa Lạc- Nghĩa Hưng - Nam Định', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `ID` int(11) NOT NULL,
  `Title` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Url_Video` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Alias` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DateCreate` datetime DEFAULT NULL,
  `View` int(11) DEFAULT '0',
  `Description` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Status` int(1) DEFAULT '0',
  `Link` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD KEY `ID` (`ID`);

--
-- Indexes for table `admin_cms`
--
ALTER TABLE `admin_cms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `admin_cms`
--
ALTER TABLE `admin_cms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `detail`
--
ALTER TABLE `detail`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
