-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2016 at 10:00 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mvcmanager`
--

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `CVKey` varchar(255) NOT NULL,
  `CVSubKey` varchar(255) NOT NULL,
  `CVValue` longtext,
  `CVDesc` longtext,
  `CVPlus` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `ApplicationId` char(36) DEFAULT NULL,
  `GUID` char(36) NOT NULL,
  `LVLangCode` varchar(64) DEFAULT NULL,
  `GVType` text,
  `GIParentID` char(36) DEFAULT NULL,
  `GILevel` int(11) DEFAULT NULL,
  `GIParentSID` longtext,
  `GVTitle` text,
  `GVDesc` text,
  `GVContent` longtext,
  `GVImages` text,
  `GIOrder` int(11) DEFAULT NULL,
  `GVTotalItem` int(11) DEFAULT NULL,
  `GDCDate` datetime DEFAULT NULL,
  `GDUDate` datetime DEFAULT NULL,
  `GDEDate` datetime DEFAULT NULL,
  `GIFlag` int(11) DEFAULT NULL,
  `GVPlus` longtext,
  `SeoLinkSearch` text,
  `SeoKeyword` text,
  `SeoDesc` longtext,
  `SeoTitle` text,
  `SeoLink` text,
  `SeoPlus` text,
  `SeoLang` text,
  `SeoParams` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`ApplicationId`, `GUID`, `LVLangCode`, `GVType`, `GIParentID`, `GILevel`, `GIParentSID`, `GVTitle`, `GVDesc`, `GVContent`, `GVImages`, `GIOrder`, `GVTotalItem`, `GDCDate`, `GDUDate`, `GDEDate`, `GIFlag`, `GVPlus`, `SeoLinkSearch`, `SeoKeyword`, `SeoDesc`, `SeoTitle`, `SeoLink`, `SeoPlus`, `SeoLang`, `SeoParams`) VALUES
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '071A4B2EC4423323', 'vi-vn', 'billsType', 'b6f70c7e-034e-7bc4-1086-04b43633a0c5', 2, '1', 'tuanmjnh', '<p>ghghghdgd</p>\n<p style="text-align: left;">dfgdgdg</p>\n<p style="text-align: left;"><em>ghfgh</em></p>\n<p style="text-align: left;"><strong><em>dgdgdfg</em></strong></p>', NULL, NULL, NULL, 1, '2015-12-19 19:05:57', NULL, NULL, 1, NULL, 'tuanmjnh', '11111111', 'vvvvvv', '10', '90', '90', '0', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '18d2969d-5386-cef1-1890-38a5c3ba600b', NULL, 'ProductType', NULL, 0, ',', 'Sản phẩm Nam', '', '', NULL, 0, NULL, '2015-11-09 13:25:06', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '1CC0DD42D23F6B84', 'vi-vn', 'billsType', 'b6f70c7e-034e-7bc4-1086-04b43633a0c5', 2, '1', 'bbbbb', '', NULL, NULL, NULL, 1, '2015-12-19 18:51:52', NULL, NULL, 1, NULL, 'tuanmjnh', '11111111', 'vvvvvv', '10', '3211', '3211', '0', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '2a181a92-e88a-2410-e7ad-3972ce7d0af5', NULL, 'ProductType', '310b6016-9200-4e15-d176-08c9c827123e', 1, ',310b6016-9200-4e15-d176-08c9c827123e,', 'Giầy nữ', '', '', NULL, 0, NULL, '2015-11-09 13:32:11', '2015-11-09 13:32:25', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '2d402873-832d-00fe-80e0-38a2c26bd819', NULL, 'membersType', NULL, NULL, NULL, 'Thân thiện', 'Loại khách hàng thân thiện', 'fa fa-star', NULL, 1, NULL, '2015-11-07 16:04:29', '2015-11-24 22:08:53', NULL, 1, '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '310b6016-9200-4e15-d176-08c9c827123e', NULL, 'ProductType', NULL, 0, ',', 'Sản phẩm nữ', '', '', NULL, 1, NULL, '2015-11-09 13:25:15', '2015-11-09 13:25:30', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '375f5c30-3916-96b5-e649-abfc4700bc15', NULL, 'membersType', NULL, NULL, NULL, 'VIP', 'Loại khách hàng VIP', 'fa fa-heart', NULL, 2, NULL, '2015-11-07 16:05:05', '2015-11-24 22:08:58', NULL, 1, '20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '471a9e71-88bb-688c-00c4-cabb5775cae1', NULL, 'membersType', NULL, NULL, NULL, 'ghgfjgj', 'gjfgjgj', NULL, NULL, 0, NULL, '2015-11-08 13:57:20', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '507066b5-9a9a-d264-1c8e-cb24a42ca261', NULL, 'ProductType', NULL, 0, ',', '65656', '456', '56546', NULL, 0, NULL, '2015-11-14 16:21:09', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '58EF5D83114E9D19', 'vi-vn', 'billsType', 'b6f70c7e-034e-7bc4-1086-04b43633a0c5', 2, '2', 'bbbbbbbbbb', '', NULL, NULL, NULL, 2, '2015-12-18 18:00:08', NULL, NULL, 1, NULL, 'tuanmjnh', '11111111', 'vvvvvv', '10', '1554', '1554', '0', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '5e15e562-d699-9858-83fe-e921c9aead76', NULL, 'ProductType', NULL, 0, ',', '5656', '565', '6565', NULL, 0, NULL, '2015-11-14 16:20:58', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '6E60D9AFA18B0E80', 'vi-vn', 'billsType', 'b6f70c7e-034e-7bc4-1086-04b43633a0c5', 2, '2', 'tuanmjnh', '', NULL, NULL, NULL, 1, '2015-12-19 18:53:46', NULL, NULL, 1, NULL, 'tuanmjnh', '11111111', 'vvvvvv', '10', '180', '180', '0', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '78B0F0437B0912F5', 'vi-vn', 'billsType', 'b6f70c7e-034e-7bc4-1086-04b43633a0c5', 2, '18', 'Nguyễn Thị B', '<p>ghdhdh</p>', NULL, NULL, NULL, 1, '2015-12-21 13:41:36', NULL, NULL, 1, NULL, 'tuanmjnh', '11111111', 'vvvvvv', '10', '13986', '13986', '0', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '801777AD41E4CC42', 'vi-vn', 'billsType', '2ff00a98-ca68-2bae-cb43-cd94cb2912f6', 1, '12221', 'nnnnnnn', 'nnnnnnn', NULL, NULL, NULL, 2, '2015-11-24 23:49:39', NULL, NULL, 1, NULL, 'ffff', '11111111111', '', '20', '27669455', '2766965', '24902490', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '82ae8987-5188-5392-0e07-c854f3437c0a', NULL, 'membersType', NULL, NULL, NULL, 'Thường', 'Loại khách hàng thông thường', 'fa fa-child', NULL, 0, NULL, '2015-11-07 15:56:31', '2015-11-24 22:08:41', NULL, 1, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '8BCC9F9F4130B3F4', 'vi-vn', 'billsType', '2ff00a98-ca68-2bae-cb43-cd94cb2912f6', 2, '6', 'Nguyễn Văn A', '', NULL, NULL, NULL, 1, '2015-12-21 13:29:20', NULL, NULL, 1, NULL, 'ffff', '11111111111', 'ghdhh', '20', '17124', '17124', '0', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '9c19ddd7-3667-2a2d-b095-6ae7162e80a9', NULL, 'ProductType', NULL, 0, ',', '654', '656', '5656', NULL, 0, NULL, '2015-11-14 16:21:03', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'AB528A0E4A102DC6', 'vi-vn', 'billsType', 'b6f70c7e-034e-7bc4-1086-04b43633a0c5', 2, '1', 'Nguyễn Văn A', '<p>đfh</p>', NULL, NULL, NULL, 1, '2015-12-21 13:31:47', NULL, NULL, 1, NULL, 'tuanmjnh', '11111111', 'vvvvvv', '10', '3211', '3211', '0', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'ae9af65b-853c-3aa6-b9ad-7dddb1843de6', NULL, 'ProductType', '310b6016-9200-4e15-d176-08c9c827123e', 1, ',310b6016-9200-4e15-d176-08c9c827123e,', 'Dép nữ', '', '', NULL, 1, NULL, '2015-11-09 13:32:50', '2015-11-09 13:33:03', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'afb4a352-f85e-f935-6ff5-88bb582209ef', NULL, 'ProductType', 'bb35f490-7c71-5bf2-7e63-d2c14225e177', 2, ',18d2969d-5386-cef1-1890-38a5c3ba600b,bb35f490-7c71-5bf2-7e63-d2c14225e177,', 'Minh tuấn pro cccccccccccccccccc', 'fgj', '', NULL, 0, NULL, '2015-11-09 13:46:49', '2015-11-09 13:54:04', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'B5DF5347196196B7', 'vi-vn', 'billsType', 'b6f70c7e-034e-7bc4-1086-04b43633a0c5', 2, '5', 'vvvvvvvv', '', NULL, NULL, NULL, 1, '2015-12-18 18:18:29', NULL, NULL, 1, NULL, 'tuanmjnh', '11111111', 'vvvvvv', '10', '3885', '3885', '0', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'bb35f490-7c71-5bf2-7e63-d2c14225e177', NULL, 'ProductType', '18d2969d-5386-cef1-1890-38a5c3ba600b', 1, ',18d2969d-5386-cef1-1890-38a5c3ba600b,', 'Giầy', '', '', NULL, 0, NULL, '2015-11-09 13:25:40', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'C5187760C52A64E1', 'vi-vn', 'billsType', '2ff00a98-ca68-2bae-cb43-cd94cb2912f6', 2, '1', 'Nguyễn Văn C', '', NULL, NULL, NULL, 1, '2015-12-21 15:40:27', NULL, NULL, 1, NULL, 'ffff', '11111111111', 'ghdhh', '20', '2854', '2854', '0', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'c545226d-9cfc-cf01-fa26-df9764af070c', NULL, 'ProductType', 'afb4a352-f85e-f935-6ff5-88bb582209ef', 3, ',18d2969d-5386-cef1-1890-38a5c3ba600b,bb35f490-7c71-5bf2-7e63-d2c14225e177,afb4a352-f85e-f935-6ff5-88bb582209ef,', 'Tuấn in', '', '', NULL, 0, NULL, '2015-11-09 13:52:38', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'd06586ba-e1e7-42fa-53c1-6fc63d61108a', NULL, 'ProductType', NULL, 0, ',', '656', '565', '565656', NULL, 0, NULL, '2015-11-14 16:21:06', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'D0E3AF30931038B1', 'vi-vn', 'billsType', '2ff00a98-ca68-2bae-cb43-cd94cb2912f6', 2, '13', 'Nguyễn Thị B', '', NULL, NULL, NULL, 2, '2015-12-21 13:17:17', NULL, NULL, 1, NULL, 'ffff', '11111111111', 'ghdhh', '20', '3951', '3951', '0', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'd9ae030b-9f7e-ab4f-e2c6-5d154852df93', NULL, 'ProductType', '18d2969d-5386-cef1-1890-38a5c3ba600b', 1, ',18d2969d-5386-cef1-1890-38a5c3ba600b,', 'Dép', '', '', NULL, 1, NULL, '2015-11-09 13:25:51', '2015-11-09 13:26:18', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'E48D409B7BD35D67', 'vi-vn', 'billsType', 'b6f70c7e-034e-7bc4-1086-04b43633a0c5', 2, '22', 'nnnnnnnnn', 'nnnnnnn', NULL, NULL, NULL, 5, '2015-12-03 15:47:18', NULL, NULL, 1, NULL, 'tuanmjnh', '11111111', 'vvvvvv', '10', '31373', '31373', '0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `groups_groups`
--

CREATE TABLE IF NOT EXISTS `groups_groups` (
  `ApplicationId` char(36) DEFAULT NULL,
  `GUFID` char(36) NOT NULL,
  `GULID` char(36) NOT NULL,
  `GGILevel` int(11) DEFAULT NULL,
  `GGIParentSID` longtext,
  `GGPlus` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `groups_items`
--

CREATE TABLE IF NOT EXISTS `groups_items` (
  `ApplicationId` char(36) DEFAULT NULL,
  `GUID` char(36) NOT NULL,
  `IUID` char(36) NOT NULL,
  `GIVType` text,
  `GIVDesc` text,
  `GIDCDate` datetime DEFAULT NULL,
  `GIDUDate` datetime DEFAULT NULL,
  `GIDEDate` datetime DEFAULT NULL,
  `GIIOrder` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups_items`
--

INSERT INTO `groups_items` (`ApplicationId`, `GUID`, `IUID`, `GIVType`, `GIVDesc`, `GIDCDate`, `GIDUDate`, `GIDEDate`, `GIIOrder`) VALUES
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '18d2969d-5386-cef1-1890-38a5c3ba600b', '96e32d0a-8444-29ba-8881-f3b1a382bcea', 'ProductType', NULL, '2015-11-13 15:35:57', '2015-12-21 14:46:11', NULL, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '18d2969d-5386-cef1-1890-38a5c3ba600b', 'a5f00994-ae16-0199-1ab6-9acf5e0f27aa', 'ProductType', NULL, '2015-11-13 15:35:38', '2015-12-21 14:46:15', NULL, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '18d2969d-5386-cef1-1890-38a5c3ba600b', 'bc7fe251-ccb4-715a-56db-0ac9c34aac57', 'ProductType', NULL, '2015-11-13 15:47:16', '2015-12-21 14:45:54', NULL, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '18d2969d-5386-cef1-1890-38a5c3ba600b', 'dc3ee7d5-75ce-a2b9-b90d-08de92e3ed3f', 'ProductType', NULL, '2015-11-13 15:47:56', '2015-12-21 14:45:45', NULL, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'c545226d-9cfc-cf01-fa26-df9764af070c', '99bc68b5-97f0-17dd-3893-3c9012632f76', 'ProductType', NULL, '2015-11-24 13:54:01', '2015-12-21 15:05:44', NULL, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'd9ae030b-9f7e-ab4f-e2c6-5d154852df93', '84107214-ea7d-e21c-fa8c-50e046b579e1', 'ProductType', NULL, '2015-11-13 15:46:40', '2015-12-21 14:46:03', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE IF NOT EXISTS `information` (
  `ApplicationId` char(36) DEFAULT NULL,
  `LVLangCode` varchar(64) NOT NULL,
  `INFVAppKey` varchar(255) NOT NULL,
  `INFVKey` varchar(255) NOT NULL,
  `INFVValue` longtext,
  `INFVSubValue` longtext,
  `INFIOrder` int(11) NOT NULL DEFAULT '0',
  `INFVDesc` text,
  `INFIFlag` int(11) DEFAULT NULL,
  `INFVPlus` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`ApplicationId`, `LVLangCode`, `INFVAppKey`, `INFVKey`, `INFVValue`, `INFVSubValue`, `INFIOrder`, `INFVDesc`, `INFIFlag`, `INFVPlus`) VALUES
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'vi-vn', 'InfSite', 'Address', 'Chợ Đức Xuân Bắc Kạn .TP Bắc Kạn', NULL, 0, NULL, 1, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'vi-vn', 'InfSite', 'BillsBuyByList', 'Nguyễn Văn A,Nguyễn Thị B,Nguyễn Văn C', NULL, 0, NULL, 1, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'vi-vn', 'InfSite', 'BillsNote', '<p><em><strong>Quý khách lưu ý:</strong></em></p>\n<ul>\n<li>Kiểm tra kĩ hàng trước khi ra khỏi cửa hàng.</li>\n<li>Sản phẩm đã mua xin miễn trả lại.( trả lại sản phẩm quý khách chịu mất 15% giá trị sản phẩm ).</li>\n<li>Cho đổi lại sản phẩm trong 7 ngày.( sản phẩm đã đi xin miễn đổi ).</li>\n</ul>\n<p style="text-align: center;"><span style="font-size: 10pt;"><strong>Minh Triều xin chân thành cảm ơn quý khách.</strong></span></p>', NULL, 0, NULL, 1, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'vi-vn', 'InfSite', 'BillsTopLeft', '<div><span style="font-size: 12pt;"><strong>Minh Triều</strong></span></div>\n<div><span style="font-size: 10pt;"><strong>Giây dép Nam - Nữ</strong></span></div>\n<div><span style="font-size: 10pt;"><strong>Ví da - Dây lưng</strong></span></div>', NULL, 0, NULL, 1, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'vi-vn', 'InfSite', 'BillsTopRight', '<div><span style="font-size: 10pt;"><strong>Thời Trang - Cao Cấp – Hàng Hiệu</strong></span></div>\n<div><span style="font-size: 10pt;"><strong>Chuyên : Bán buôn – Bán lẻ</strong></span></div>\n<div><span style="font-size: 8pt;"><strong>CS1: Chợ Đức Xuân Bắc Kạn .TP Bắc Kạn</strong></span></div>\n<div><span style="font-size: 8pt;"><strong>CS2: Chợ Bắc Kạn .TP Bắc Kạn</strong></span></div>\n<div><span style="font-size: 8pt;"><strong>ĐT : <span style="color: #ff0000;">0168 833 2368</span></strong></span></div>', NULL, 0, NULL, 1, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'vi-vn', 'InfSite', 'ClassIcon', 'minhtrieu', NULL, 0, NULL, 1, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'vi-vn', 'InfSite', 'CompanyName', 'Minh Triều', NULL, 0, NULL, 1, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'vi-vn', 'InfSite', 'ContentContacts', '<div><span style="font-size: 12pt;"><strong>Minh Triều</strong></span></div>\n<div><span style="font-size: 10pt;"><strong>Giây dép Nam - Nữ</strong></span></div>\n<div><span style="font-size: 10pt;"><strong>Ví da - Dây lưng</strong></span></div>', NULL, 0, NULL, 1, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'vi-vn', 'InfSite', 'Description', '', NULL, 0, NULL, 1, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'vi-vn', 'InfSite', 'Email', 'minhtrieu@gmail.com', NULL, 0, NULL, 1, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'vi-vn', 'InfSite', 'Facebook', 'groups/minhtrieu', NULL, 0, NULL, 1, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'vi-vn', 'InfSite', 'FooterProDetails', '', NULL, 0, NULL, 1, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'vi-vn', 'InfSite', 'GooglePlus', 'minhtrieu', NULL, 0, NULL, 1, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'vi-vn', 'InfSite', 'HeadProDetails', '', NULL, 0, NULL, 1, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'vi-vn', 'InfSite', 'Hotline', '0168 833 2368', NULL, 0, NULL, 1, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'vi-vn', 'InfSite', 'InfOrder', 'Hãy gọi điện. Đồ Gỗ Nội Thất HOANGTAMCN sẽ giúp bạn \r\nHà Nội: 0975.380.396', NULL, 0, NULL, 1, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'vi-vn', 'InfSite', 'Logo', 'Uploads/Images/MySite/729c2526-5f5a-40c9-95cd-a4a420342aa3_20150319035528771.jpg', NULL, 0, NULL, 1, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'vi-vn', 'InfSite', 'Mobile', '0168.833.2368', NULL, 0, NULL, 1, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'vi-vn', 'InfSite', 'Phone', '', NULL, 0, NULL, 1, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'vi-vn', 'InfSite', 'Skype', 'live:minhtrieu', NULL, 0, NULL, 1, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'vi-vn', 'InfSite', 'Slogan', 'Giây dép - túi xách - nam nữ', NULL, 0, NULL, 1, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'vi-vn', 'InfSite', 'Twitter', 'minhtrieu', NULL, 0, NULL, 1, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'vi-vn', 'InfSite', 'Website', 'dogohoangtam.com', NULL, 0, NULL, 1, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'vi-vn', 'InfSite', 'Yahoo', 'minhtrieu', NULL, 0, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `ApplicationId` char(36) DEFAULT NULL,
  `IUID` char(36) NOT NULL,
  `LVLangCode` varchar(64) DEFAULT NULL,
  `IVType` text,
  `IVKey` text,
  `IVTitle` text,
  `IVDesc` text,
  `IVContent` longtext,
  `IVImages` text,
  `IVUrl` text,
  `IVAuthor` text,
  `IFFPrice` double DEFAULT NULL,
  `IFLPrice` double DEFAULT NULL,
  `IITotalSubItems` int(11) DEFAULT NULL,
  `IITotalView` int(11) DEFAULT NULL,
  `IIOrder` int(11) DEFAULT NULL,
  `IDLastView` datetime DEFAULT NULL,
  `IDCDate` datetime DEFAULT NULL,
  `IDUDate` datetime DEFAULT NULL,
  `IDEDate` datetime DEFAULT NULL,
  `IIFlag` int(11) DEFAULT NULL,
  `IVPlus` longtext,
  `SeoLinkSearch` text,
  `SeoKeyword` text,
  `SeoDesc` longtext,
  `SeoTitle` text,
  `SeoLink` text,
  `SeoPlus` text,
  `SeoLang` text,
  `SeoParams` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`ApplicationId`, `IUID`, `LVLangCode`, `IVType`, `IVKey`, `IVTitle`, `IVDesc`, `IVContent`, `IVImages`, `IVUrl`, `IVAuthor`, `IFFPrice`, `IFLPrice`, `IITotalSubItems`, `IITotalView`, `IIOrder`, `IDLastView`, `IDCDate`, `IDUDate`, `IDEDate`, `IIFlag`, `IVPlus`, `SeoLinkSearch`, `SeoKeyword`, `SeoDesc`, `SeoTitle`, `SeoLink`, `SeoPlus`, `SeoLang`, `SeoParams`) VALUES
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '01b7b2fc-4232-5558-efbe-58584ee0908f', 'vi-vn', 'billsType', '8888888888888', NULL, '96e32d0a-8444-29ba-8881-f3b1a382bcea', '88888888', '8', '20', '1', 77, 62, NULL, NULL, NULL, NULL, '2015-12-21 13:17:17', NULL, NULL, NULL, 'D0E3AF30931038B1', '888888888888', '8888888', '496', NULL, NULL, NULL, NULL, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '25ae237a-6026-f63a-c5fa-4627f3c59073', 'vi-vn', 'billsType', 'yyy', NULL, '84107214-ea7d-e21c-fa8c-50e046b579e1', 'yyyy', '5', '10', '1', 863, 777, NULL, NULL, NULL, NULL, '2015-12-18 18:18:29', NULL, NULL, NULL, 'B5DF5347196196B7', 'hfgh', 'fghfgh', '3885', NULL, NULL, NULL, NULL, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '28ca32e9-6ad5-570d-9851-bf4e974a4c0d', 'vi-vn', 'billsType', 'sdfghj', NULL, '99bc68b5-97f0-17dd-3893-3c9012632f76', 'xvcdbgfhjkl;o', '6', '20', '1', 3567, 2854, NULL, NULL, NULL, NULL, '2015-12-21 13:29:20', NULL, NULL, NULL, '8BCC9F9F4130B3F4', '', '', '17124', NULL, NULL, NULL, NULL, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '4a84871f-b19a-9b6b-c245-5b1c9a7e0475', 'vi-vn', 'billsType', 'jjjjjjjjjjjjj', NULL, 'bc7fe251-ccb4-715a-56db-0ac9c34aac57', 'jjjjjjjj', '1', '10', '1', 99, 90, NULL, NULL, NULL, NULL, '2015-12-19 19:05:57', NULL, NULL, NULL, '071A4B2EC4423323', '', '', '90', NULL, NULL, NULL, NULL, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '5876c5cd-02a4-d4bc-c1e6-420bc9807ff8', 'vi-vn', 'billsType', '8888888888888', NULL, '96e32d0a-8444-29ba-8881-f3b1a382bcea', '88888888', '3', '10', '1', 77, 70, NULL, NULL, NULL, NULL, '2015-12-03 15:47:18', NULL, NULL, NULL, 'E48D409B7BD35D67', '888888888888', '8888888', '210', NULL, NULL, NULL, NULL, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '5b3329b9-a314-4c2a-f3e0-32673a47c88a', 'vi-vn', 'billsType', 'sdfghj', NULL, '99bc68b5-97f0-17dd-3893-3c9012632f76', 'xvcdbgfhjkl;o', '1', '10', '1', 3567, 3211, NULL, NULL, NULL, NULL, '2015-12-19 18:51:52', NULL, NULL, NULL, '1CC0DD42D23F6B84', '', '', '3211', NULL, NULL, NULL, NULL, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '5b9be204-47e9-50e0-7bee-668e665cdabd', 'vi-vn', 'billsType', 'jjjjjjjjjjjjj', NULL, 'bc7fe251-ccb4-715a-56db-0ac9c34aac57', 'jjjjjjjj', '4', '93', '1', 99, 6, NULL, NULL, NULL, NULL, '2015-11-24 08:54:09', NULL, NULL, NULL, '0DD7FD80DD74DC68', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '5c853511-f306-0eea-adfa-bfe207b839d8', 'vi-vn', 'billsType', 'yyy', NULL, '84107214-ea7d-e21c-fa8c-50e046b579e1', 'yyyy', '1', '20', '1', 863, 691, NULL, NULL, NULL, NULL, '2015-11-24 23:47:51', NULL, NULL, NULL, '3EE7BBDC666C54F7', 'hfgh', 'fghfgh', '691', NULL, NULL, NULL, NULL, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '62c3821a-0f77-6621-1ed2-a58167f5e0a5', 'vi-vn', 'billsType', 'kkkkkkkkkkkkkk', NULL, 'dc3ee7d5-75ce-a2b9-b90d-08de92e3ed3f', 'kkkkkkkk', '6', '50', '1', 800, 400, NULL, NULL, NULL, NULL, '2015-11-24 08:54:09', NULL, NULL, NULL, '0DD7FD80DD74DC68', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '65abeece-c24c-e641-ec05-7aec872c6ff9', 'vi-vn', 'billsType', 'jjjjjjjjjjjjj', NULL, 'bc7fe251-ccb4-715a-56db-0ac9c34aac57', 'jjjjjjjj', '2', '10', '1', 99, 90, NULL, NULL, NULL, NULL, '2015-12-19 18:53:46', NULL, NULL, NULL, '6E60D9AFA18B0E80', '', '', '180', NULL, NULL, NULL, NULL, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '7537b745-d8f8-1c81-cfa7-6a94c1fb6324', 'vi-vn', 'billsType', 'yyy', NULL, '84107214-ea7d-e21c-fa8c-50e046b579e1', 'yyyy', '1', '98', '1', 863, 9, NULL, NULL, NULL, NULL, '2015-11-24 10:08:26', NULL, NULL, NULL, '18F66511E129CFB8', 'hfgh', 'fghfgh', NULL, NULL, NULL, NULL, NULL, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '84107214-ea7d-e21c-fa8c-50e046b579e1', 'vi-vn', 'ProductType', 'yyy', 'yyyy', 'nn', 'nnnnnnnnn', NULL, NULL, 'admin', 863, 9, 3, 894, 9, NULL, '2015-11-13 15:46:40', '2015-12-21 14:46:03', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '8d7dbae9-27d1-4ecf-9039-e2a8e501ab1e', 'vi-vn', 'billsType', 'yyy', NULL, '84107214-ea7d-e21c-fa8c-50e046b579e1', 'yyyy', '3333', '20', '1', 863, 691, NULL, NULL, NULL, NULL, '2015-11-24 23:49:39', NULL, NULL, NULL, '801777AD41E4CC42', 'hfgh', 'fghfgh', '2303103', NULL, NULL, NULL, NULL, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '91cc0cce-84e5-f14b-5593-dccc17e97fe7', 'vi-vn', 'billsType', 'sdfghj', NULL, '99bc68b5-97f0-17dd-3893-3c9012632f76', 'xvcdbgfhjkl;o', '8888', '20', '1', 3567, 2854, NULL, NULL, NULL, NULL, '2015-11-24 23:49:39', NULL, NULL, NULL, '801777AD41E4CC42', '', '', '25366352', NULL, NULL, NULL, NULL, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '925ba57d-2126-af06-34d5-a46794e8d769', 'vi-vn', 'billsType', 'yyy', NULL, '84107214-ea7d-e21c-fa8c-50e046b579e1', 'yyyy', '9', '98', '1', 863, 9, NULL, NULL, NULL, NULL, '2015-11-24 08:54:26', NULL, NULL, NULL, '7142B09FAAA21B78', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '96e32d0a-8444-29ba-8881-f3b1a382bcea', 'vi-vn', 'ProductType', '8888888888888', '88888888', '', '', NULL, NULL, 'admin', 77, 33, 1, 88, 0, NULL, '2015-11-13 15:35:57', '2015-12-21 14:46:11', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '99bc68b5-97f0-17dd-3893-3c9012632f76', 'vi-vn', 'ProductType', 'sdfghj', 'xvcdbgfhjkl;o', 'sdgfhjk', 'adsfghjkl', NULL, NULL, 'admin', 3567, 666, 1, 999, 0, NULL, '2015-11-24 13:54:01', '2015-12-21 15:05:44', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'a1d7fa54-8ab0-a014-916e-ec3c95f38010', 'vi-vn', 'billsType', 'jjjjjjjjjjjjj', NULL, 'bc7fe251-ccb4-715a-56db-0ac9c34aac57', 'jjjjjjjj', '1', '10', '1', 99, 90, NULL, NULL, NULL, NULL, '2015-11-24 23:35:30', NULL, NULL, NULL, '7CA1C88F2EAA111F', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'a238c579-7f5a-8d83-22a0-670ed87a3ba5', 'vi-vn', 'billsType', 'yyy', NULL, '84107214-ea7d-e21c-fa8c-50e046b579e1', 'yyyy', '5', '10', '1', 863, 777, NULL, NULL, NULL, NULL, '2015-12-03 15:47:18', NULL, NULL, NULL, 'E48D409B7BD35D67', 'nn', 'nnnn', '3885', NULL, NULL, NULL, NULL, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'a2d1b8ee-11ba-6c3a-62a6-cd66a8364c4f', 'vi-vn', 'billsType', 'yyy', NULL, '84107214-ea7d-e21c-fa8c-50e046b579e1', 'yyyy', '8', '98', '1', 863, 9, NULL, NULL, NULL, NULL, '2015-11-24 08:54:09', NULL, NULL, NULL, '0DD7FD80DD74DC68', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'a5f00994-ae16-0199-1ab6-9acf5e0f27aa', 'vi-vn', 'ProductType', '7777777777', '677777777', '', '', NULL, NULL, 'admin', 10, 8, 1, 87867, 0, NULL, '2015-11-13 15:35:38', '2015-12-21 14:46:15', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'a8405fe7-da4b-ad15-ae1a-9a9cf80555ba', 'vi-vn', 'billsType', 'yyy', NULL, '84107214-ea7d-e21c-fa8c-50e046b579e1', 'yyyy', '2', '10', '1', 863, 777, NULL, NULL, NULL, NULL, '2015-12-03 15:47:18', NULL, NULL, NULL, 'E48D409B7BD35D67', 'zzzz', 'zzz', '1554', NULL, NULL, NULL, NULL, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'a8854027-8b96-105f-8ae0-6241b07c543a', 'vi-vn', 'billsType', 'yyy', NULL, '84107214-ea7d-e21c-fa8c-50e046b579e1', 'yyyy', '5', '20', '1', 863, 691, NULL, NULL, NULL, NULL, '2015-12-21 13:17:17', NULL, NULL, NULL, 'D0E3AF30931038B1', 'zzzz', 'zzz', '3455', NULL, NULL, NULL, NULL, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'b9d61896-4fe5-3c61-66b9-dfdc381518e6', 'vi-vn', 'billsType', 'kkkkkkkkkkkkkk', NULL, 'dc3ee7d5-75ce-a2b9-b90d-08de92e3ed3f', 'kkkkkkkk', '1', '50', '1', 800, 400, NULL, NULL, NULL, NULL, '2015-11-24 10:08:26', NULL, NULL, NULL, '18F66511E129CFB8', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'bc5ffd25-0848-a167-17e9-75ee7b10d6be', 'vi-vn', 'billsType', 'yyy', NULL, '84107214-ea7d-e21c-fa8c-50e046b579e1', 'yyyy', '1', '10', '1', 863, 777, NULL, NULL, NULL, NULL, '2015-12-18 18:00:08', NULL, NULL, NULL, '58EF5D83114E9D19', 'nn', 'nnnn', '777', NULL, NULL, NULL, NULL, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'bc7fe251-ccb4-715a-56db-0ac9c34aac57', 'vi-vn', 'ProductType', 'jjjjjjjjjjjjj', 'jjjjjjjj', '', '', NULL, NULL, 'admin', 99, 6, 1, 5555, 0, NULL, '2015-11-13 15:47:16', '2015-12-21 14:45:54', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'c19d54d6-b58c-3d5a-4d52-5e0f09efe665', 'vi-vn', 'billsType', '7777777777', NULL, 'a5f00994-ae16-0199-1ab6-9acf5e0f27aa', '677777777', '4', '10', '1', 10, 9, NULL, NULL, NULL, NULL, '2015-12-03 15:47:18', NULL, NULL, NULL, 'E48D409B7BD35D67', '', '', '36', NULL, NULL, NULL, NULL, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'cc831353-8e3e-80b3-06e7-a8a099d48d2c', 'vi-vn', 'billsType', 'sdfghj', NULL, '99bc68b5-97f0-17dd-3893-3c9012632f76', 'xvcdbgfhjkl;o', '8', '10', '1', 3567, 3211, NULL, NULL, NULL, NULL, '2015-12-03 15:47:18', NULL, NULL, NULL, 'E48D409B7BD35D67', '', '', '25688', NULL, NULL, NULL, NULL, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'dc3ee7d5-75ce-a2b9-b90d-08de92e3ed3f', 'vi-vn', 'ProductType', 'kkkkkkkkkkkkkk', 'kkkkkkkk', '', '', NULL, NULL, 'admin', 800, 400, 1, 868, 0, NULL, '2015-11-13 15:47:56', '2015-12-21 14:45:45', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'e3e201fd-45da-83b4-253e-29e990ba0d76', 'vi-vn', 'billsType', 'yyy', NULL, '84107214-ea7d-e21c-fa8c-50e046b579e1', 'yyyy', '18', '10', '1', 863, 777, NULL, NULL, NULL, NULL, '2015-12-21 13:41:36', NULL, NULL, NULL, '78B0F0437B0912F5', 'hfgh', 'fghfgh', '13986', NULL, NULL, NULL, NULL, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'ee4565a1-e603-d07f-3927-9f3ab58a9ef9', 'vi-vn', 'billsType', 'jjjjjjjjjjjjj', NULL, 'bc7fe251-ccb4-715a-56db-0ac9c34aac57', 'jjjjjjjj', '9', '93', '1', 99, 6, NULL, NULL, NULL, NULL, '2015-11-24 08:54:26', NULL, NULL, NULL, '7142B09FAAA21B78', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'f5439ce0-1dba-c57d-d5f8-5291ee7edb92', 'vi-vn', 'billsType', 'sdfghj', NULL, '99bc68b5-97f0-17dd-3893-3c9012632f76', 'xvcdbgfhjkl;o', '1', '20', '1', 3567, 2854, NULL, NULL, NULL, NULL, '2015-12-21 15:40:27', NULL, NULL, NULL, 'C5187760C52A64E1', 'bn', 'gngn', '2854', NULL, NULL, NULL, NULL, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'fa661471-2850-216a-0f82-3ddb8d9057cb', 'vi-vn', 'billsType', 'sdfghj', NULL, '99bc68b5-97f0-17dd-3893-3c9012632f76', 'xvcdbgfhjkl;o', '1', '10', '1', 3567, 3211, NULL, NULL, NULL, NULL, '2015-12-21 13:31:47', NULL, NULL, NULL, 'AB528A0E4A102DC6', '', '', '3211', NULL, NULL, NULL, NULL, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'fc0464f8-b8cc-1c38-37a0-81e54b492859', 'vi-vn', 'billsType', 'yyy', NULL, '84107214-ea7d-e21c-fa8c-50e046b579e1', 'yyyy', '1', '20', '1', 863, 691, NULL, NULL, NULL, NULL, '2015-11-24 23:47:51', NULL, NULL, NULL, '3EE7BBDC666C54F7', 'zzzz', 'zzz', '691', NULL, NULL, NULL, NULL, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'fde8a3f4-4e53-cbc5-7af8-a14135200461', 'vi-vn', 'billsType', 'yyy', NULL, '84107214-ea7d-e21c-fa8c-50e046b579e1', 'yyyy', '1', '10', '1', 863, 777, NULL, NULL, NULL, NULL, '2015-12-18 18:00:08', NULL, NULL, NULL, '58EF5D83114E9D19', 'zzzz', 'zzz', '777', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `items_sub`
--

CREATE TABLE IF NOT EXISTS `items_sub` (
  `ApplicationId` char(36) DEFAULT NULL,
  `SIUID` char(36) NOT NULL,
  `IUID` char(36) DEFAULT NULL,
  `LVLangCode` varchar(64) DEFAULT NULL,
  `SIVKey` text,
  `SIVTitle` text,
  `SIVDesc` text,
  `SIVContent` longtext,
  `SIVImages` text,
  `SIVEmail` text,
  `SIVAuthor` text,
  `SIVUrl` text,
  `SIDCDate` datetime DEFAULT NULL,
  `SIDUDate` datetime DEFAULT NULL,
  `SIDEDate` datetime DEFAULT NULL,
  `SIIFlag` int(11) DEFAULT NULL,
  `SIVPlus` longtext,
  `SeoTitle` text,
  `SeoLink` text,
  `SeoLinkSearch` text,
  `SeoKeyword` text,
  `SeoDesc` longtext,
  `SeoPlus` text,
  `SeoLang` text,
  `SeoParams` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items_sub`
--

INSERT INTO `items_sub` (`ApplicationId`, `SIUID`, `IUID`, `LVLangCode`, `SIVKey`, `SIVTitle`, `SIVDesc`, `SIVContent`, `SIVImages`, `SIVEmail`, `SIVAuthor`, `SIVUrl`, `SIDCDate`, `SIDUDate`, `SIDEDate`, `SIIFlag`, `SIVPlus`, `SeoTitle`, `SeoLink`, `SeoLinkSearch`, `SeoKeyword`, `SeoDesc`, `SeoPlus`, `SeoLang`, `SeoParams`) VALUES
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '025e1d7d-2b30-4377-905c-f5e9216e0f1d', '84107214-ea7d-e21c-fa8c-50e046b579e1', 'vi-vn', NULL, '3', 'nnn', NULL, ',Uploads/Product/Images/b86e419c88c0935de5a50818df1dafaf.jpg,', 'nn', 'nnnn', NULL, '2015-11-14 13:18:19', '2015-12-21 14:46:03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '3e7d0204-d757-1017-6a68-82cc418bbd3f', 'bc7fe251-ccb4-715a-56db-0ac9c34aac57', 'vi-vn', NULL, '5555', '5555555555', NULL, ',', '55555555555555', '555555555', NULL, '2015-12-21 14:10:36', '2015-12-21 14:45:54', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '7815ef4e-aab3-4c57-8d72-8f1949ea5f2b', '99bc68b5-97f0-17dd-3893-3c9012632f76', 'vi-vn', NULL, '899', '5656', NULL, ',Uploads/Product/Images/e9ae52c820622ee7e33b36c1560f90f9.jpg,', 'bn', 'gngn', NULL, '2015-12-21 14:11:46', '2015-12-21 15:05:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '9e552941-d5b0-a008-73e7-b77480bd13d2', '84107214-ea7d-e21c-fa8c-50e046b579e1', 'vi-vn', NULL, '888', 'zzz', NULL, ',Uploads/Product/Images/c43be7ed2da86f88c3ef77ec9c905a30.jpg,Uploads/Product/Images/b9b62405dc92dbd8e739d948d23be504.jpg,Uploads/Product/Images/bac77066e21b5a49fb2367ac83f90233.jpg,', 'zzzz', 'zzz', NULL, '2015-11-14 13:13:06', '2015-12-21 14:46:03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'af32a872-bce8-0ac9-2e35-bc510b95339e', '96e32d0a-8444-29ba-8881-f3b1a382bcea', 'vi-vn', NULL, '88', '88888888888', NULL, ',Uploads/Product/Images/339e88c025b5fc88b24b0904bf9f3357.jpg,', '888888888888', '8888888', NULL, NULL, '2015-12-21 14:46:11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'b2af23a3-b180-cdf5-e6ea-c2b1bf58017c', 'dc3ee7d5-75ce-a2b9-b90d-08de92e3ed3f', 'vi-vn', NULL, '868', 'dhdh', NULL, ',', 'dhfdh', 'dhdh', NULL, '2015-12-21 14:10:52', '2015-12-21 14:45:45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'bff27ac7-ecac-763b-211d-776b2d8d0646', '84107214-ea7d-e21c-fa8c-50e046b579e1', 'vi-vn', NULL, '3', 'fghfg', NULL, ',', 'hfgh', 'fghfgh', NULL, '2015-11-20 00:30:21', '2015-12-21 14:46:03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'f3fbb7e2-3ceb-2b80-20b9-a2f27ed7e446', 'a5f00994-ae16-0199-1ab6-9acf5e0f27aa', 'vi-vn', NULL, '87867', 'vbm', NULL, ',Uploads/Product/Images/a2ab1fe31b1a46e86b089468358a51ee.jpg,', 'vjnvbn', 'vbmvbm', NULL, '2015-12-21 14:11:15', '2015-12-21 14:46:15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE IF NOT EXISTS `language` (
  `ApplicationId` char(36) DEFAULT NULL,
  `LIID` char(36) NOT NULL,
  `LVTitle` text,
  `LVLangCode` varchar(64) DEFAULT NULL,
  `LVISOCode` varchar(64) DEFAULT NULL,
  `LVCountryCode` text,
  `LVImages` varchar(128) DEFAULT NULL,
  `LVDesc` text,
  `LIOrder` int(11) DEFAULT '0',
  `LIFlag` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`ApplicationId`, `LIID`, `LVTitle`, `LVLangCode`, `LVISOCode`, `LVCountryCode`, `LVImages`, `LVDesc`, `LIOrder`, `LIFlag`) VALUES
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '18cf5ee5-4f91-b8bc-0884-222e48c54265', '日本語', 'jp-ja', 'JP/JPN', '81', 'Uploads/Language/Images/bdcd405f989a6d9570b1a86a80400285.png', 'Tiếng nhật bản', 2, 1),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '47411687-cb0d-bb67-9761-ed9addea06e3', '中国语文', 'cn-zh', 'CN/CHN', '86', 'Uploads/Language/Images/ea784460001f550796c083fc7d944e38.png', 'Tiếng trung quốc - Chinese (PRC)', 4, 1),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', 'English', 'en-us', 'US/USA', '1', 'Uploads/Language/Images/73bcb3f7b6d5eb317cd81adb3767f9ef.png', 'Tiếng anh', 1, 1),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'Tiếng Việt', 'vi-vn', 'VN/VNM', '84', 'Uploads/Language/Images/a7cda628c649da2d8235a87435028f42.png', 'Tiếng việt', 0, 1),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'cee9d057-f09d-1fdd-83c0-f7f2ef62538a', '한국어', 'kr-ko', 'KR/KOR', '82', 'Uploads/Language/Images/e68c1f8105c91ed3b372bdf2b93b783d.png', 'Tiếng hàn', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `language_items`
--

CREATE TABLE IF NOT EXISTS `language_items` (
  `ApplicationId` char(36) DEFAULT NULL,
  `LIID` char(36) NOT NULL,
  `LKIID` char(36) NOT NULL,
  `LIVTitle` longtext,
  `LIVDesc` longtext,
  `LIPluss` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `language_items`
--

INSERT INTO `language_items` (`ApplicationId`, `LIID`, `LKIID`, `LIVTitle`, `LIVDesc`, `LIPluss`) VALUES
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '004aac42-c21f-d31c-c4f9-d707c22a204f', 'Language Create', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '0066e566-78fd-7607-0a8b-065aacf745d2', 'Roles name', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '012aa6f4-7c20-6a34-c83d-49cb6cdbbad7', 'Language List', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '05455c0b-de49-d535-a196-6e300338a799', 'Unlocked', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '07a8cf5e-0e6f-e873-3398-461d3c114a36', 'Manager Language', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '07af3929-1822-928c-218e-a352c7d40802', 'Options', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '0949a920-3754-d7cf-125c-2558054619fe', 'ISO Code', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '0bf9458e-f83e-aa1b-ed31-d7ad4a42793e', 'Manager Account Of Users', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '0ca9fed5-c94b-e577-ac87-4c97f1233bc9', 'Change password', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '0f6fd505-87d4-aca9-5a7d-b3a0ed546bf4', 'Back', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '1293a071-a3d0-2973-b980-fdb80dd9841e', 'Next', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '1627b25e-b65f-5220-14a5-ea784554f2d2', 'Wrong email format (Example: <b>youremail@gmail.com</b>)', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '178e8284-0a02-7188-7595-e5e8b8fde992', 'Delete', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '18ce1d69-9bbc-6d4f-37b8-14e151e0f979', 'New password of account <b>%s</b>: <b>%s</b>', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '1d7d7aa4-6c5a-526a-6835-78d6dbe72355', 'Value', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '208d5c92-8424-d93e-f147-5db65ee280bb', 'Language Deails', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '22823405-0358-da6a-1f85-6edb0838767c', 'Previous', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '25dcb470-12fa-12b7-1ca9-db0890728030', 'Account Update', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '26b14210-4cc0-e24b-98e6-7be2254e5e52', 'Locked by', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '26f9f936-121c-66df-9261-72dfd781d546', 'Delete Succeeded', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '28974a7a-b52f-4498-a105-1c6fcd259d76', 'Error 404', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '2a9ba4c4-d4f5-8b3e-28a6-9ee513203f04', 'Create date', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '2b75f845-7de3-4928-47f3-e2959c36994c', 'Module Name', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '313e7252-04a6-20c5-89c2-a1c2ffb2657c', 'Wrong file format', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '3182de83-1580-6123-dda1-9f918d84ca22', 'Wrong fields of the information', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '327f43ce-285e-c395-7ff2-9adc84a97c9b', 'Locked', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '33f5130b-1d40-509a-a9f2-c43d202f37c2', 'Recover', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '35192366-55c9-67a8-54c0-d14419305d4d', '<i>Data updating</i>', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '35391663-3c37-9d01-a9dd-b32e3417d7b5', 'Create Succeeded', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '38064047-cf51-4253-8353-823d9a83021f', 'Lock status', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '38af0d4f-ff54-fb52-cd4a-15048312f0ff', 'Roles type', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '41297818-89b7-ded1-33df-38686e0cb2c1', '<b>%s</b> max length is <b>%s</b> characters', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '43540a2a-4572-004b-ed82-48c87a816a5a', 'Manager Language Keyword', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '436ab4fe-5e5e-fd44-1989-d22b6c53cb4c', 'Module Details', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '43b58842-7115-e41c-703c-63551c0dacca', 'Remember', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '46e68969-4269-1033-83f6-0c61df0daa1c', 'Images', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '48a7c0cf-1af5-97f0-6508-cc57ee227b25', 'Description', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '4ac1c163-cfed-3b6e-3f21-ae283062c4dc', '<b>%s</b> must is <b>Alpha</b>, <b>Numberic</b> and <b>no space</b>', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '4d69f426-b9df-3d03-464d-ae3350d8b0a9', 'Update', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '4ebd8f55-40f1-05ae-4346-1331848825fe', 'Account Details', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '5154d7c3-2d31-d5c2-56bd-08ba0aab69a3', 'Login', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '517edf7d-19ba-2043-8aa9-ad88018bd43b', 'Enter search keywords', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '55abe190-864b-f669-a85e-18347ea89b02', 'Surname', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '575b12e0-3650-da95-1730-a8e794afbe52', '– Parent Original –', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '58f7ba30-2224-6a3a-25ba-576535dffa9b', 'My profile', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '5c689077-cf8c-d614-28ef-583974a29d6c', 'Update date', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '5f447fdf-34fb-0f38-74e8-450738e32cb3', 'Language Name', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '60e2c0e3-1d6d-84d9-a6f0-21d4462d32d9', 'Module List', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '611b0f29-4aae-d0d9-4b75-c84507fd9c1d', 'Language Keyword Create', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '6365ec3b-8514-6a0f-f65f-283b0dcf11b2', 'Module Target', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '644b4f4d-07d5-dc1c-14c9-290465e3841c', 'Account Create', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '64d54187-7ed3-550d-b1ad-eb063a06759d', 'Manager Account', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '66a2c1ae-bf9a-976e-3d33-47d3ecabc84e', '<b>%s</b> min length is <b>%s</b> characters', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '67835d71-8c46-e939-e8e9-84ecd1d0542b', 'Website Information', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '68701206-9597-7e48-2627-89d91061abf5', 'Account name', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '694d17a4-50ad-826b-a672-98f238b951bf', 'Last login', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '6dae232a-267f-79ef-a89a-9fa20c57bab9', 'Trash', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '6e9e2e9e-7778-4937-2d4f-1128d1e594b7', 'Roles', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '6f0956d6-ae7a-73a8-8297-06b1d8261a39', 'Confirm Password', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '724335db-daee-eb05-3b73-78471af655db', 'Roles list', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '73513d86-2a3f-9888-acf2-ddd1bc5df728', 'Key', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '7870e99b-06cf-e894-8571-a7bdc46d6f71', 'First name', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '78a98491-53aa-fa9c-fa16-106ac923803e', 'Update By', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '79d56b4e-7164-909c-1780-b6957a36bf0a', 'Language Keyword Update', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '7aef6582-33d7-4e27-7e82-8afe43f0d7d1', 'Users', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '7e4d3bbe-0720-572a-25cb-05de528d9a35', 'Accept', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '7f44489a-f753-3493-4688-0319c75f16f4', 'Module title', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '85f16843-49ed-cf21-181f-674ed4152a7e', 'Members', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '878b5bb4-3404-fc84-fce5-eb42c0401b33', 'Module Update', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '8b8e6b54-a031-9ad5-6634-96ac5c386b03', 'Cancel', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '8e7cbc78-e247-9679-a82a-4f68e2e9b6b7', 'Wrong mobile format', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '8ebcce32-fc1b-2109-c98d-c93757677cdf', 'Order number must is natural number', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '8ece8929-9e29-d243-5350-97738188f634', 'Locked date', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '8ed13565-9851-5896-28af-3c80f1358a8a', 'Enter', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '999cdfd1-e9d9-6549-0a12-f869d43314a6', 'Display <b>%s</b> (Records)', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '99af8a0b-ece1-be34-d1c3-3aa4ec7723d5', 'Display <b>%s</b> to <b>%s</b> of <b>%s</b> records', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '9ae2784d-ba6f-9ef0-46bc-291591e55c32', 'Modules', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '9ccaa20c-b237-34ef-939e-bfd22a3ef2b0', 'Accounts', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '9cf3e19c-f931-7d50-89cf-df6c7fee69b1', 'Manager Module', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '9d5e2343-89cb-af5b-c438-9ccb6e5aa97a', 'Update Succeeded', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', '9fac9511-a3f7-b55a-c42c-a6f6afd61817', 'Please choose', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', 'a2f6192a-e207-b2bd-a011-01395e47dbdc', 'Please enter', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', 'a36f4a9a-727e-fcdf-0946-e035d4d9e191', 'Roles Update', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', 'a66f75fc-f22c-7e56-3ae8-4aca8571254d', 'Wrong confirm password', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', 'a9e1a1ce-2896-203f-0298-5a2f32d38c0e', 'Manager Information website', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', 'aa7951a2-3223-1bd4-bd39-f21bf9560279', 'Lock', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', 'aa928afd-9057-40ac-afb1-617adf1064f1', '<b>%s</b> must have <b>%s</b>-<b>%s</b> characters', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', 'ab8ff255-1d22-ccf8-70eb-26785fd59d32', 'Wrong reset password, please try again', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', 'abbef85b-a09f-6b88-602f-2b05c2e8449d', 'Language Code', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', 'ace7ce5e-e22f-d7d6-ed73-a44ea266e532', 'Search', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', 'af762899-5842-6995-421a-3aed8df3b212', '<b>%s</b> has exist', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', 'b3ce95d0-e26b-5794-648e-74d8e2607528', 'Password', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', 'b9e04a87-7ecc-677f-84e3-3d30c3b55c8c', 'Forgot Password', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', 'bc449f80-b1ac-a9e7-17f3-fa542ab65fab', 'Update picture', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', 'bd4b58c1-aa83-0e02-498b-b7f45e75ad56', 'Cancel', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', 'bf9ebcb7-96a9-d1b9-a862-5562d5b0645e', 'Language Update', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', 'c11d2b17-bcba-10df-48d1-7b66d8cc3de5', 'Setting', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', 'c2689c89-58dd-5994-bd46-166425c6dc94', 'Parent list', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', 'c44db777-0429-a738-0100-451cf4200ac9', 'Languages', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', 'c5a6372f-485a-a8a5-d1c4-e536c1638355', 'Error 12', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', 'c617be58-704e-2e8b-872a-62af479ab828', 'Recover checked', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', 'c7e3fd6c-85f7-d837-3733-a7853ec221e2', 'Error during upload photos', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', 'cb457804-27e9-bc36-d3ea-a45983801ef5', 'Help', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', 'cb63809e-b272-06ca-f89b-b1fc4ef45cab', 'Confirm action', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', 'cd51a54a-1ceb-1d34-61c0-e2832e3f2ad9', 'Page not found', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', 'ce8a7a29-3636-469b-858a-01ddc2c66dd5', 'Show', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', 'cef5f22f-e4df-d1c8-a8b8-a8095c288a7e', 'Reset password', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', 'cf064fea-abb3-5ab4-5ae8-e1c921bdf08a', 'Description Key', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', 'cf1549d7-f906-e22a-a50d-73089ec4ba09', 'Last change password', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', 'd5211e57-5d1e-1642-9bbe-9fb1eaa6ca63', 'Country Code', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', 'd9e33766-47bf-e4c5-08a6-91df55cb0661', 'Manager Roles', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', 'da071e52-65e3-0ac3-85c3-100d5d97a445', 'Roles Create', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', 'dab1bf87-168c-132b-5b90-52c84dc46b04', 'Description Value', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', 'dc267999-e113-7a4c-f04a-27a1b4e88d53', 'Order', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', 'e01bd0eb-8889-9aee-06b0-8bf9c3a8c0a7', 'Roles key', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', 'e0ef9bd3-de34-c7e6-c5fc-56df3c171177', 'Email', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', 'e6a4f965-3e40-5d9d-d427-33db5845e125', 'Create by', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', 'e892ce81-87fc-0c38-a076-346f8116f951', 'Hide', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', 'eaf0f93e-7838-8089-2583-66941d53b429', 'Module icon', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', 'eb2b4700-24bf-8b8c-4306-fb58c748ea2d', 'Content Management System', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', 'ed32a767-4099-e9b6-dc4a-f8bea97ceeb8', 'Logout', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', 'eda83fbe-53f9-5a4f-79ad-283242c07fe2', 'Error Invalid Access', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', 'f1af24dd-b5e0-fb82-201c-09b18ff81f94', 'Module Create', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', 'f1dbde03-b356-9668-f1f5-541d66bc1c6d', 'Mobile', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', 'f3dd91c5-4202-7c54-e874-142b0882ad5d', 'Language Keyword List', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', 'f4ea6d27-dc69-bc50-77b8-3774bcf08494', 'Language Keyword Details', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', 'f6a21949-a810-9157-eb53-8e28666fd68d', 'Delete checked', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', 'f74b5b03-5dd1-0fa2-955e-9982cbb4103f', 'Login Content Management System', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', 'f7d8fac9-3a6b-0056-09cd-6df6722bcca0', 'Account List', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', 'f9994d40-a097-a510-aa32-888bda4333f6', 'Create', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', 'f9e7c4d6-cd14-e74c-476b-ea42c0f20254', 'Manager Account Of Members', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '748fc91c-2ef9-ce81-a2f3-e13dbe4a4dd4', 'fabcddd7-9d9a-cd93-c302-139a5e7e67ac', '<i class="fa fa-filter"></i> %s (<i class="fa fa-files-o"></i>)', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '004aac42-c21f-d31c-c4f9-d707c22a204f', 'Thêm mới ngôn ngữ', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '0066e566-78fd-7607-0a8b-065aacf745d2', 'Tên quyền', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '012aa6f4-7c20-6a34-c83d-49cb6cdbbad7', 'Danh sách ngôn ngữ', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '05455c0b-de49-d535-a196-6e300338a799', 'Không khóa', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '07a8cf5e-0e6f-e873-3398-461d3c114a36', 'Quản trị ngôn ngữ', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '07af3929-1822-928c-218e-a352c7d40802', 'Tùy chỉnh', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '0949a920-3754-d7cf-125c-2558054619fe', 'Mã ISO', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '0bf9458e-f83e-aa1b-ed31-d7ad4a42793e', 'Quản trị tài khoản quản trị', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '0ca9fed5-c94b-e577-ac87-4c97f1233bc9', 'Đổi mật khẩu', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '0f6fd505-87d4-aca9-5a7d-b3a0ed546bf4', 'Quay lại', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '1293a071-a3d0-2973-b980-fdb80dd9841e', 'Sau', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '1627b25e-b65f-5220-14a5-ea784554f2d2', 'Sai định dạng email (Ví dụ: <b>youremail@gmail.com</b>)', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '178e8284-0a02-7188-7595-e5e8b8fde992', 'Xóa', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '18ce1d69-9bbc-6d4f-37b8-14e151e0f979', 'Mật khẩu mới của tài khoản <b>%s</b> là: <b>%s</b>', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '1d7d7aa4-6c5a-526a-6835-78d6dbe72355', 'Giá trị', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '208d5c92-8424-d93e-f147-5db65ee280bb', 'Chi tiết ngôn ngữ', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '22823405-0358-da6a-1f85-6edb0838767c', 'Trước', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '25dcb470-12fa-12b7-1ca9-db0890728030', 'Cập nhật tài khoản', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '26b14210-4cc0-e24b-98e6-7be2254e5e52', 'Người khóa', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '26f9f936-121c-66df-9261-72dfd781d546', 'Xóa bản ghi thành công', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '28974a7a-b52f-4498-a105-1c6fcd259d76', 'Lỗi 404', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '2a9ba4c4-d4f5-8b3e-28a6-9ee513203f04', 'Ngày tạo', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '2b75f845-7de3-4928-47f3-e2959c36994c', 'Tên module', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '2fdb1a28-8ce7-2c47-bf32-6a1c36542115', 'Mật khẩu cũ không đúng. Vui lòng thử lại', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '313e7252-04a6-20c5-89c2-a1c2ffb2657c', 'Sai định dạng tệp', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '3182de83-1580-6123-dda1-9f918d84ca22', 'Sai thông tin nhập vào', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '327f43ce-285e-c395-7ff2-9adc84a97c9b', 'Đã khóa', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '33bf17b4-c473-2395-3aa9-0fd70382992c', 'Mật khẩu mới', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '33f5130b-1d40-509a-a9f2-c43d202f37c2', 'Khôi phục', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '35192366-55c9-67a8-54c0-d14419305d4d', 'Dữ liệu đang cập nhật', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '35391663-3c37-9d01-a9dd-b32e3417d7b5', 'Thêm mới thành công', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '38064047-cf51-4253-8353-823d9a83021f', 'Trạng thái khóa', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '38af0d4f-ff54-fb52-cd4a-15048312f0ff', 'Loại quyền', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '41297818-89b7-ded1-33df-38686e0cb2c1', '<b>%s</b> tối đa phải có <b>%s</b> ký tự', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '43540a2a-4572-004b-ed82-48c87a816a5a', 'Quản trị từ khóa', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '436ab4fe-5e5e-fd44-1989-d22b6c53cb4c', 'Chi tiết modules', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '43b58842-7115-e41c-703c-63551c0dacca', 'Ghi nhớ đăng nhập', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '46e68969-4269-1033-83f6-0c61df0daa1c', 'Ảnh đại diện', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '48a7c0cf-1af5-97f0-6508-cc57ee227b25', 'Miêu tả', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '4ac1c163-cfed-3b6e-3f21-ae283062c4dc', '<b>%s</b> phải là số và chữ không dấu, không khoảng cách', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '4d69f426-b9df-3d03-464d-ae3350d8b0a9', 'Cập nhật', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '4ebd8f55-40f1-05ae-4346-1331848825fe', 'Chi tiết tài khoản', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '5154d7c3-2d31-d5c2-56bd-08ba0aab69a3', 'Đăng nhập', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '517edf7d-19ba-2043-8aa9-ad88018bd43b', 'Nhập từ khóa tìm kiếm', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '55abe190-864b-f669-a85e-18347ea89b02', 'Tên', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '575b12e0-3650-da95-1730-a8e794afbe52', '--- Là mục cha ---', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '58f7ba30-2224-6a3a-25ba-576535dffa9b', 'Thông tin cá nhân', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '5c689077-cf8c-d614-28ef-583974a29d6c', 'Ngày cập nhật', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '5f447fdf-34fb-0f38-74e8-450738e32cb3', 'Tên ngôn ngữ', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '60e2c0e3-1d6d-84d9-a6f0-21d4462d32d9', 'Danh sách modules', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '611b0f29-4aae-d0d9-4b75-c84507fd9c1d', 'Thêm mới từ khóa', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '6365ec3b-8514-6a0f-f65f-283b0dcf11b2', 'Liên kết mặc định', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '644b4f4d-07d5-dc1c-14c9-290465e3841c', 'Thêm mới tài khoản', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '64d54187-7ed3-550d-b1ad-eb063a06759d', 'Quản trị tài khoản', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '66a2c1ae-bf9a-976e-3d33-47d3ecabc84e', '<b>%s</b> tối thiểu phải có <b>%s</b> ký tự', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '67835d71-8c46-e939-e8e9-84ecd1d0542b', 'Thông tin - Cài đặt', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '68701206-9597-7e48-2627-89d91061abf5', 'Tên tài khoản', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '694d17a4-50ad-826b-a672-98f238b951bf', 'Đăng nhập cuối', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '6dae232a-267f-79ef-a89a-9fa20c57bab9', 'Thùng rác', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '6e9e2e9e-7778-4937-2d4f-1128d1e594b7', 'Phân quyền', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '6f0956d6-ae7a-73a8-8297-06b1d8261a39', 'Xác nhận mật khẩu', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '724335db-daee-eb05-3b73-78471af655db', 'Danh sách quyền', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '73513d86-2a3f-9888-acf2-ddd1bc5df728', 'Từ khóa', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '7870e99b-06cf-e894-8571-a7bdc46d6f71', 'Họ', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '78a98491-53aa-fa9c-fa16-106ac923803e', 'Người cập nhật', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '79d56b4e-7164-909c-1780-b6957a36bf0a', 'Cập nhật từ khóa', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '7aef6582-33d7-4e27-7e82-8afe43f0d7d1', 'quản trị', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '7e4d3bbe-0720-572a-25cb-05de528d9a35', 'Chấp nhận', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '7f44489a-f753-3493-4688-0319c75f16f4', 'Tiêu đề module', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '85f16843-49ed-cf21-181f-674ed4152a7e', 'khách', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '878b5bb4-3404-fc84-fce5-eb42c0401b33', 'Cập nhật modules', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '8b8e6b54-a031-9ad5-6634-96ac5c386b03', 'Hủy bỏ', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '8e7cbc78-e247-9679-a82a-4f68e2e9b6b7', 'Sai định sạng số điện thoại', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '8ebcce32-fc1b-2109-c98d-c93757677cdf', 'Số thứ tự phải là số tự nhiên', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '8ece8929-9e29-d243-5350-97738188f634', 'Ngày khóa', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '8ed13565-9851-5896-28af-3c80f1358a8a', 'Nhập', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '999cdfd1-e9d9-6549-0a12-f869d43314a6', 'Hiển thị <b>%s</b> (Bản ghi)', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '99af8a0b-ece1-be34-d1c3-3aa4ec7723d5', 'Hiển thị <b>%s</b> đến <b>%s</b> của <b>%s</b> bản ghi', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '9ae2784d-ba6f-9ef0-46bc-291591e55c32', 'Modules', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '9ccaa20c-b237-34ef-939e-bfd22a3ef2b0', 'Tài khoản', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '9cf3e19c-f931-7d50-89cf-df6c7fee69b1', 'Quản trị modules', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '9d5e2343-89cb-af5b-c438-9ccb6e5aa97a', 'Cập nhật thành công', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '9fac9511-a3f7-b55a-c42c-a6f6afd61817', 'Vui lòng chọn', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'a2f6192a-e207-b2bd-a011-01395e47dbdc', 'Vui lòng nhập', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'a36f4a9a-727e-fcdf-0946-e035d4d9e191', 'Cập nhật quyền', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'a66f75fc-f22c-7e56-3ae8-4aca8571254d', 'Xác nhận mật khẩu không đúng', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'a9e1a1ce-2896-203f-0298-5a2f32d38c0e', 'Quản trị thông tin Website', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'aa7951a2-3223-1bd4-bd39-f21bf9560279', 'Khóa', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'aa928afd-9057-40ac-afb1-617adf1064f1', '<b>%s</b> phải có từ <b>%s</b>-<b>%s</b> ký tự', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'ab8ff255-1d22-ccf8-70eb-26785fd59d32', 'Thiết lập mật khẩu lỗi vui lòng thử lại', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'abbef85b-a09f-6b88-602f-2b05c2e8449d', 'Mã ngôn ngữ', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'ace7ce5e-e22f-d7d6-ed73-a44ea266e532', 'Tìm kiếm', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'af762899-5842-6995-421a-3aed8df3b212', '<b>%s</b> đã tồn tại', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'b3ce95d0-e26b-5794-648e-74d8e2607528', 'Mật khẩu', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'b9e04a87-7ecc-677f-84e3-3d30c3b55c8c', 'Quên mật khẩu', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'bc449f80-b1ac-a9e7-17f3-fa542ab65fab', 'Ảnh đại diện', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'bd4b58c1-aa83-0e02-498b-b7f45e75ad56', 'Quay lại', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'bf9ebcb7-96a9-d1b9-a862-5562d5b0645e', 'Cập nhật ngôn ngữ', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'c11d2b17-bcba-10df-48d1-7b66d8cc3de5', 'Cài đặt', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'c2689c89-58dd-5994-bd46-166425c6dc94', 'Danh sách cha', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'c44db777-0429-a738-0100-451cf4200ac9', 'Ngôn ngữ', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'c5a6372f-485a-a8a5-d1c4-e536c1638355', 'Lỗi 12', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'c617be58-704e-2e8b-872a-62af479ab828', 'Khôi phục đã chọn', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'c7e3fd6c-85f7-d837-3733-a7853ec221e2', 'Lỗi trong quá trình tải ảnh lên', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'c9b1c48c-b45f-a248-62d8-5fa2664e82ce', 'Mật khẩu cũ', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'cb457804-27e9-bc36-d3ea-a45983801ef5', 'Trợ giúp', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'cb63809e-b272-06ca-f89b-b1fc4ef45cab', 'Xác nhận thực hiện', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'cd51a54a-1ceb-1d34-61c0-e2832e3f2ad9', 'Không tìm thấy trang', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'ce8a7a29-3636-469b-858a-01ddc2c66dd5', 'Hiển thị', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'cef5f22f-e4df-d1c8-a8b8-a8095c288a7e', 'Reset mật khẩu', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'cf064fea-abb3-5ab4-5ae8-e1c921bdf08a', 'Miêu tả từ khóa', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'cf1549d7-f906-e22a-a50d-73089ec4ba09', 'Đổi mật khẩu cuối', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'd5211e57-5d1e-1642-9bbe-9fb1eaa6ca63', 'Mã quốc gia', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'd9e33766-47bf-e4c5-08a6-91df55cb0661', 'Quản trị phân quyền', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'da071e52-65e3-0ac3-85c3-100d5d97a445', 'Thêm mới quyền', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'dab1bf87-168c-132b-5b90-52c84dc46b04', 'Miêu tả giá trị', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'dc267999-e113-7a4c-f04a-27a1b4e88d53', 'Thứ tự', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'e01bd0eb-8889-9aee-06b0-8bf9c3a8c0a7', 'Mã quyền', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'e0ef9bd3-de34-c7e6-c5fc-56df3c171177', 'Hòm thư (Email)', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'e6a4f965-3e40-5d9d-d427-33db5845e125', 'Người tạo', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'e892ce81-87fc-0c38-a076-346f8116f951', 'Ẩn', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'eaf0f93e-7838-8089-2583-66941d53b429', 'Class icon', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'eb2b4700-24bf-8b8c-4306-fb58c748ea2d', 'Quản trị hệ thống', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'ed32a767-4099-e9b6-dc4a-f8bea97ceeb8', 'Đăng xuất', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'eda83fbe-53f9-5a4f-79ad-283242c07fe2', 'Truy cập không hợp lệ', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'f1af24dd-b5e0-fb82-201c-09b18ff81f94', 'Thêm mới modules', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'f1dbde03-b356-9668-f1f5-541d66bc1c6d', 'Số điện thoại', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'f3dd91c5-4202-7c54-e874-142b0882ad5d', 'Danh sách từ khóa', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'f4ea6d27-dc69-bc50-77b8-3774bcf08494', 'Chi tiết từ khóa', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'f6a21949-a810-9157-eb53-8e28666fd68d', 'Xóa đã chọn', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'f74b5b03-5dd1-0fa2-955e-9982cbb4103f', 'Đăng nhập quản trị', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'f7d8fac9-3a6b-0056-09cd-6df6722bcca0', 'Danh sách tài khoản', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'f9994d40-a097-a510-aa32-888bda4333f6', 'Thêm mới', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'f9e7c4d6-cd14-e74c-476b-ea42c0f20254', 'Quản trị khách hàng', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'fabcddd7-9d9a-cd93-c302-139a5e7e67ac', '<i class="fa fa-filter"></i> %s (<i class="fa fa-files-o"></i>)', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '33b302ec-4b94-601b-f8f7-9fba6256e455', 'Danh sách khách hàng', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '0d1f510b-f27f-a3ed-1a4b-82936b95fba5', 'Thêm mới khách hàng', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '69f70bbe-18e4-af85-6b27-ccd33751ceeb', 'Cập nhật khách hàng', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'cf56bfd4-3237-0ddf-6a10-8b24eb50e084', 'Tên khách hàng', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'bb5b1a87-d1a6-f1d0-1eb1-557a2c180abf', 'Số CMND', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '03bea305-0ac2-4933-910e-fa42c68b82e7', 'Địa chỉ', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '2423ef5e-12d6-4834-3b4a-b4d5e804f561', 'Loại tài khoản', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'a9344b35-504a-26f5-cf86-f85440607ebe', 'Miêu tả', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '24b448e6-baf1-820b-c5ce-e44fd02bfb66', 'Số CMND phải là số tự nhiên và gồm 9 chữ số', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'b6561151-e70f-ab52-0da8-a4556cc63732', 'Khách hàng', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'a05b9d1e-a8af-ef44-b24b-e3c7d4331e6f', 'Quản trị loại khách hàng', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'd4a8988c-c1d1-f6d4-6a4a-8e75bfe52577', 'Danh sách loại khách hàng', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '02ebe7ff-00b6-7814-1568-f8825d7fa06a', 'Thêm mới loại khách hàng', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '2d7fbba0-0ed4-5782-d135-3dc8d4844664', 'Cập nhật loại khách hàng', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '221b7eab-f970-984c-1cbb-4701ec9a6e50', 'Tên loại tài khoản', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '4e7deffa-7110-1391-d1f2-46caf531ed87', 'Bạn chưa nhập <b>%s</b>', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'a8cc2eb8-9ab3-d6c3-3bcb-038c9555d884', 'Sản phẩm', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '2c72d11d-7bff-0916-50cd-f457b3c62898', 'Quản trị nhóm sản phẩm', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'caed6877-1388-d981-ca75-9e7087605fdd', 'Quản trị sản phẩm', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '988601a7-b413-1a27-fe3b-29f4c7916176', 'Quản lý thống kê', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'aa0fc7b2-e719-a559-93f5-5251e585e10d', 'Quản lý hóa đơn', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '6992f178-dc5b-55bc-5360-327296746f17', 'Hóa đơn - Thống kê', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'e28962bb-03cc-d855-0346-0c5f68455575', 'Danh sách nhóm sản phẩm', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '3c88b7ff-bbf9-7497-df7b-ad6982dd9a1b', 'Thêm mới nhóm sản phẩm', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'c6de1532-9404-05d1-e548-d73ba50c6545', 'Cập nhật nhóm sản phẩm', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '9a9b620c-2fc1-1a15-a2c5-e6096b5546f7', 'Tên nhóm', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'f707d875-4250-2e8e-e2c8-ec9f4a96eb80', 'Tổng số con', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '21ec82b3-4800-fddc-de24-de1b1fc850cc', 'Nội dung', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'ca84c061-1c30-5b9d-fd87-eee98d17be8e', 'Tên sản phẩm', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '641c3a90-2356-cdf5-8486-09d182d84e7a', 'Danh sách sản phẩm', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '940edd22-d38c-0458-8019-4f7518ed6bfb', 'Thêm mới sản phẩm', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '7b38bceb-8527-b492-bdec-79f709673858', 'Cập nhật sản phẩm', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'f04f5bb2-87e0-d1e3-9150-794254a8164a', 'Mã sản phẩm', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'a85cca4d-4e33-e071-2aca-fc38acb40f69', 'Giá gốc', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '698ea14c-f52f-b775-7e4d-9186ed851139', 'Giá bán', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'e80c1747-8200-9787-dcf2-4275271b8bff', 'Số lượng', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'befd719a-ef87-be04-996a-9b8d7c4fd6ea', 'Mầu sắc', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'd8318807-8387-1892-974a-8c4e58189124', 'Số', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '180e013b-5c1e-5bb1-5bc8-32c5f0736f59', 'Xuất xứ', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'a1e2ef00-f662-660b-6299-a4cb7c15e5ad', 'Thông tin chính', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'f1bc0b9c-6ae5-f130-19c5-5533dd344c29', 'Thông tin phụ', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '461b0442-d6c5-85ef-68e8-9fbe92d03c0c', 'Thông tin thêm', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '6278fd11-87bf-32c2-d4d1-20c7a26883e1', 'Giá gốc phải là số (VD: 99.9)', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'cb1ecc30-cfbe-3ca1-982c-bbaaa9c6d29b', 'Giá bán phải là số (VD: 99.9)', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '7969314d-3991-cac7-75e3-dac646c63ea2', 'Số lượng phải là số tự nhiên', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'a95a85d5-bacf-c3f9-8471-659c47ac11f4', '<b>%s</b> phải là số (VD: 99.9)', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'e710e850-26b3-4add-53c1-bf251f0c344d', 'Nhóm sản phẩm', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '19c259e1-b3a4-18ec-59e7-d8810ba81285', 'Mã hóa đơn', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'fd8a9304-efe2-3091-d671-7707d459333d', 'Người bán hàng', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'e7d1b7c7-225a-b051-9401-f02a97918b9a', 'Tìm khách hàng', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'f6db6d9e-d696-1a09-3527-d22720937e08', 'Danh sách hóa đơn', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'fddfb5b5-b849-8772-bdf2-11460701d966', 'Thêm mới hóa đơn', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '2c640a11-0f03-a9b9-70fd-b85e6e87484d', 'Chi tiết hóa đơn', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '5a9a4523-897c-5d58-e072-710e96fa2e1b', 'Tìm sản phẩm', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'af0f2fc3-5d42-a837-140f-87427d1a503b', 'Chọn', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '98f4ae35-7d99-ba30-0198-217b199cb16f', 'Nhập khách hàng', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'd5078451-7d42-a57d-1366-1f8c301f613e', 'Giảm (%)', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '218dd613-70bf-7cbf-db30-7efb6fe37fd2', 'KMKT', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '5e30df3d-3dd7-e6dd-e841-b58c35e475b7', 'Không có', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'd73ccfe2-d9cd-1f59-8fe8-3f9be12a23b2', 'Đã thanh toán', '', NULL);
INSERT INTO `language_items` (`ApplicationId`, `LIID`, `LKIID`, `LIVTitle`, `LIVDesc`, `LIPluss`) VALUES
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'a9f5d33b-920a-15fb-3b90-105eb3663454', 'Chưa thanh toán', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '6012e90c-e55d-96ff-efe8-641f0bc685bd', 'VNĐ', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '3071020b-8463-aa17-7e7e-8cb50c014c91', 'Tổng tiền', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'db4a6356-649b-bf64-e387-4d7b6c13cd63', 'Tổng tiền thanh toán', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '43dd9d4d-395a-0a12-f898-2e0067dcd42e', 'Tổng tiền chưa thanh toán', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'e156f720-9381-7a94-1467-e5bce83312a3', 'Tổng cộng', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'c1274111-4ea0-e0ba-773c-e92b7e4f3696', 'Giảm giá phải là số tự nhiên', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'a5680778-c3d6-b601-0746-9bfd210fc09b', 'Trạng thái', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'ee5ebc45-8695-b44f-4318-bb4f5626d2de', 'Danh sách thống kê bán hàng', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'da7ec1b6-fc58-ad0f-f44d-0429a276ce57', 'Ngày', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '313f893f-472d-2b2d-1f94-151a479f2353', 'Tháng', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '2b6427ae-ab26-9c11-a547-7d975ac1a60f', 'Quý', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '7e90b772-6e72-e9ba-ac96-40a042696d9c', 'Năm', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '4298f721-e1ca-f9e3-55d8-e7509ea6b309', 'Tổng sản phẩm', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '715c4335-7779-59c4-d3c6-b9ab6e3f14cf', 'Tổng sản phẩm đã bán', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '780dfadb-9752-d7fb-0a23-f91f1bc0ac7c', 'Tổng số lượng đã bán', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '14448a65-af0c-0fc1-4f1b-b7e828dc2240', 'Tổng số lượng', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'cf0193ee-c2c6-4a0b-f57e-0329da3ce3eb', 'Tổng tiền đã thanh toán', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'e457b0fa-4546-15be-d577-3d712f93e38f', 'Tổng hóa đơn đã thanh toán', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '709f44a6-0aea-5984-52c1-41a3c78ea0a0', 'Tổng hóa đơn chưa thanh toán', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '3606ce8f-5029-8f3f-82a4-d8408c8edc79', 'Sản phẩm', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '562a6d62-ce6c-e934-6652-a46a7931b5cb', 'Cái/Chiếc', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'c5a2e429-5dc2-39a5-a88b-1e3473b81c65', 'Hóa đơn', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '5c77f91d-1de1-e7cb-9f30-9b2edfb7d19d', 'Thanh toán', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '9fb3c820-270b-7fa3-8403-9d5b91f27a9d', 'Thêm mới - In hóa đơn', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '98575849-9316-c5b4-ad02-2bb1c83c87bd', 'In hóa đơn', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '776322dd-887e-506d-ec14-913c15c5cbda', 'Người mua', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'c9e87846-14f6-b12d-7e49-f28d481bb9b0', 'Thông tin - cài đặt', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '66962614-bc06-1e33-6225-27656a296147', 'Danh sách thông tin - cài đặt', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '4051ebcf-9b0c-6e56-fdea-8ff8c745bb58', 'Tên cửa hàng', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '19bd2709-42e2-864b-db0a-70f1eb2d87e4', 'Thông tin hóa đơn', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '4a36f1b7-c225-9188-4f29-ecc63c3c0bd6', 'Thông tin trên trái', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '76cd868b-c9ab-fd48-5faa-bf21076e3586', 'Thông tin trên phải', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '3b585c23-1a90-b626-fd4c-1b62907f2617', 'Thông tin lưu ý', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '57715768-d5a0-98bb-907a-6001e0ca57a7', 'Nội dung liên hệ', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'be378813-1e2b-5a1e-cf6f-e45b200796c2', 'Đường dây nóng (Hotline)', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '72552e83-cbc9-04ef-fa0f-3507124f3461', 'Thông tin cửa hàng', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '93e4fb79-c770-0679-2aec-b4f1570341c2', 'Danh sách người bán hàng', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '4e032117-c7a4-9893-3d55-827d005d9dbf', 'Tìm người bán', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', '310f07f4-96b1-cf2c-c18a-55c86d973c0f', 'Nhập người bán', '', NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '89d4bb4e-6aee-8cb8-a65d-48744503273d', 'a4ad88fd-a984-21da-c8e2-eeb283e1249a', 'Số lượng sản phẩm trong kho là {0}', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `language_key`
--

CREATE TABLE IF NOT EXISTS `language_key` (
  `ApplicationId` char(36) DEFAULT NULL,
  `LKIID` char(36) NOT NULL,
  `LKVTitle` text,
  `LKVDesc` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `language_key`
--

INSERT INTO `language_key` (`ApplicationId`, `LKIID`, `LKVTitle`, `LKVDesc`) VALUES
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '004aac42-c21f-d31c-c4f9-d707c22a204f', 'languageCreate', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '0066e566-78fd-7607-0a8b-065aacf745d2', 'rolesName', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '012aa6f4-7c20-6a34-c83d-49cb6cdbbad7', 'LanguageList', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '05455c0b-de49-d535-a196-6e300338a799', 'UnLock', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '07a8cf5e-0e6f-e873-3398-461d3c114a36', 'languagePTitle', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '07af3929-1822-928c-218e-a352c7d40802', 'Options', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '0949a920-3754-d7cf-125c-2558054619fe', 'languageISOCode', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '0bf9458e-f83e-aa1b-ed31-d7ad4a42793e', 'usersPTitle', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '0ca9fed5-c94b-e577-ac87-4c97f1233bc9', 'accountChangePassword', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '0f6fd505-87d4-aca9-5a7d-b3a0ed546bf4', 'BtnBack', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '1293a071-a3d0-2973-b980-fdb80dd9841e', 'PageNext', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '1627b25e-b65f-5220-14a5-ea784554f2d2', 'msgEmailError', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '178e8284-0a02-7188-7595-e5e8b8fde992', 'BtnDelete', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '18ce1d69-9bbc-6d4f-37b8-14e151e0f979', 'msgResetPassword', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '1d7d7aa4-6c5a-526a-6835-78d6dbe72355', 'LangItemValue', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '208d5c92-8424-d93e-f147-5db65ee280bb', 'languageDetails', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '22823405-0358-da6a-1f85-6edb0838767c', 'PagePrev', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '25dcb470-12fa-12b7-1ca9-db0890728030', 'accountUpdate', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '26b14210-4cc0-e24b-98e6-7be2254e5e52', 'accountLockBy', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '26f9f936-121c-66df-9261-72dfd781d546', 'msgDeleteSuccess', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '28974a7a-b52f-4498-a105-1c6fcd259d76', 'error_404_title', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '2a9ba4c4-d4f5-8b3e-28a6-9ee513203f04', 'createDate', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '2b75f845-7de3-4928-47f3-e2959c36994c', 'moduleName', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '2fdb1a28-8ce7-2c47-bf32-6a1c36542115', 'msgPasswordChangeError', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '313e7252-04a6-20c5-89c2-a1c2ffb2657c', 'msgFileError', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '3182de83-1580-6123-dda1-9f918d84ca22', 'msgInputError', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '327f43ce-285e-c395-7ff2-9adc84a97c9b', 'Locked', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '33bf17b4-c473-2395-3aa9-0fd70382992c', 'accountPasswordNew', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '33f5130b-1d40-509a-a9f2-c43d202f37c2', 'BtnRecover', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '35192366-55c9-67a8-54c0-d14419305d4d', 'emptyField', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '35391663-3c37-9d01-a9dd-b32e3417d7b5', 'msgCreateSuccess', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '38064047-cf51-4253-8353-823d9a83021f', 'accountLockStatus', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '38af0d4f-ff54-fb52-cd4a-15048312f0ff', 'rolesType', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '41297818-89b7-ded1-33df-38686e0cb2c1', 'msgMaxLengthError', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '43540a2a-4572-004b-ed82-48c87a816a5a', 'langitemPTitle', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '436ab4fe-5e5e-fd44-1989-d22b6c53cb4c', 'moduleDetails', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '43b58842-7115-e41c-703c-63551c0dacca', 'loginRemember', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '46e68969-4269-1033-83f6-0c61df0daa1c', 'Images', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '48a7c0cf-1af5-97f0-6508-cc57ee227b25', 'Details', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '4ac1c163-cfed-3b6e-3f21-ae283062c4dc', 'msgAlphaNumericError', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '4d69f426-b9df-3d03-464d-ae3350d8b0a9', 'BtnUpdate', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '4ebd8f55-40f1-05ae-4346-1331848825fe', 'accountDetails', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '5154d7c3-2d31-d5c2-56bd-08ba0aab69a3', 'login', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '517edf7d-19ba-2043-8aa9-ad88018bd43b', 'SearchPlaceholder', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '55abe190-864b-f669-a85e-18347ea89b02', 'accountSurname', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '575b12e0-3650-da95-1730-a8e794afbe52', 'parentOriginal', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '58f7ba30-2224-6a3a-25ba-576535dffa9b', 'accountProfile', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '5c689077-cf8c-d614-28ef-583974a29d6c', 'updateDate', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '5f447fdf-34fb-0f38-74e8-450738e32cb3', 'languageName', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '60e2c0e3-1d6d-84d9-a6f0-21d4462d32d9', 'moduleList', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '611b0f29-4aae-d0d9-4b75-c84507fd9c1d', 'LangItemCreate', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '6365ec3b-8514-6a0f-f65f-283b0dcf11b2', 'moduleUrl', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '644b4f4d-07d5-dc1c-14c9-290465e3841c', 'accountCreate', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '64d54187-7ed3-550d-b1ad-eb063a06759d', 'accountPTitle', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '66a2c1ae-bf9a-976e-3d33-47d3ecabc84e', 'msgMinLengthError', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '67835d71-8c46-e939-e8e9-84ecd1d0542b', 'menuMInformation', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '68701206-9597-7e48-2627-89d91061abf5', 'accountName', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '694d17a4-50ad-826b-a672-98f238b951bf', 'accountLastLogin', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '6dae232a-267f-79ef-a89a-9fa20c57bab9', 'Trash', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '6e9e2e9e-7778-4937-2d4f-1128d1e594b7', 'MenuMRoles', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '6f0956d6-ae7a-73a8-8297-06b1d8261a39', 'accountPasswordAgain', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '724335db-daee-eb05-3b73-78471af655db', 'rolesList', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '73513d86-2a3f-9888-acf2-ddd1bc5df728', 'LangItemKey', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '7870e99b-06cf-e894-8571-a7bdc46d6f71', 'accountFirstName', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '78a98491-53aa-fa9c-fa16-106ac923803e', 'updateBy', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '79d56b4e-7164-909c-1780-b6957a36bf0a', 'LangItemUpdate', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '7aef6582-33d7-4e27-7e82-8afe43f0d7d1', 'accountUsers', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '7e4d3bbe-0720-572a-25cb-05de528d9a35', 'ConfirmOk', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '7f44489a-f753-3493-4688-0319c75f16f4', 'moduleTitle', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '85f16843-49ed-cf21-181f-674ed4152a7e', 'accountMembers', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '878b5bb4-3404-fc84-fce5-eb42c0401b33', 'moduleUpdate', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '8b8e6b54-a031-9ad5-6634-96ac5c386b03', 'ConfirmCancel', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '8e7cbc78-e247-9679-a82a-4f68e2e9b6b7', 'msgMobileError', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '8ebcce32-fc1b-2109-c98d-c93757677cdf', 'msgOrderError', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '8ece8929-9e29-d243-5350-97738188f634', 'accountLockDate', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '8ed13565-9851-5896-28af-3c80f1358a8a', 'Placeholder', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '999cdfd1-e9d9-6549-0a12-f869d43314a6', 'TableRecordTextTitle', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '99af8a0b-ece1-be34-d1c3-3aa4ec7723d5', 'TableInf', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '9ae2784d-ba6f-9ef0-46bc-291591e55c32', 'menuMModule', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '9ccaa20c-b237-34ef-939e-bfd22a3ef2b0', 'menuMAccount', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '9cf3e19c-f931-7d50-89cf-df6c7fee69b1', 'modulePTitle', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '9d5e2343-89cb-af5b-c438-9ccb6e5aa97a', 'msgUpdateSuccess', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '9fac9511-a3f7-b55a-c42c-a6f6afd61817', 'plsChoose', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'a2f6192a-e207-b2bd-a011-01395e47dbdc', 'plsEnter', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'a36f4a9a-727e-fcdf-0946-e035d4d9e191', 'rolesUpdate', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'a66f75fc-f22c-7e56-3ae8-4aca8571254d', 'msgPasswordError', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'a9e1a1ce-2896-203f-0298-5a2f32d38c0e', 'siteInfPTitle', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'aa7951a2-3223-1bd4-bd39-f21bf9560279', 'Lock', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'aa928afd-9057-40ac-afb1-617adf1064f1', 'msgMinMaxLengthError', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'ab8ff255-1d22-ccf8-70eb-26785fd59d32', 'msgResetPasswordError', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'abbef85b-a09f-6b88-602f-2b05c2e8449d', 'languageCode', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'ace7ce5e-e22f-d7d6-ed73-a44ea266e532', 'SearchText', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'af762899-5842-6995-421a-3aed8df3b212', 'msgExist', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'b3ce95d0-e26b-5794-648e-74d8e2607528', 'accountPassword', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'b9e04a87-7ecc-677f-84e3-3d30c3b55c8c', 'forgotPassword', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'bc449f80-b1ac-a9e7-17f3-fa542ab65fab', 'accountUpdatePicture', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'bd4b58c1-aa83-0e02-498b-b7f45e75ad56', 'BtnCancel', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'bf9ebcb7-96a9-d1b9-a862-5562d5b0645e', 'languageUpdate', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'c11d2b17-bcba-10df-48d1-7b66d8cc3de5', 'Settting', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'c2689c89-58dd-5994-bd46-166425c6dc94', 'parentList', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'c44db777-0429-a738-0100-451cf4200ac9', 'menuMLanguage', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'c5a6372f-485a-a8a5-d1c4-e536c1638355', 'error_12_title', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'c617be58-704e-2e8b-872a-62af479ab828', 'BtnRecoverAll', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'c7e3fd6c-85f7-d837-3733-a7853ec221e2', 'msgUploadError', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'c9b1c48c-b45f-a248-62d8-5fa2664e82ce', 'accountPasswordOld', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'cb457804-27e9-bc36-d3ea-a45983801ef5', 'accountHelp', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'cb63809e-b272-06ca-f89b-b1fc4ef45cab', 'ConfirmTitle', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'cd51a54a-1ceb-1d34-61c0-e2832e3f2ad9', 'error_404_deails', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'ce8a7a29-3636-469b-858a-01ddc2c66dd5', 'Show', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'cef5f22f-e4df-d1c8-a8b8-a8095c288a7e', 'accountResetPassword', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'cf064fea-abb3-5ab4-5ae8-e1c921bdf08a', 'LangItemDescKey', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'cf1549d7-f906-e22a-a50d-73089ec4ba09', 'accountLastChangePass', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'd5211e57-5d1e-1642-9bbe-9fb1eaa6ca63', 'languageCountryCode', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'd9e33766-47bf-e4c5-08a6-91df55cb0661', 'rolesPTitle', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'da071e52-65e3-0ac3-85c3-100d5d97a445', 'rolesCreate', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'dab1bf87-168c-132b-5b90-52c84dc46b04', 'LangItemDescValue', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'dc267999-e113-7a4c-f04a-27a1b4e88d53', 'Order', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'e01bd0eb-8889-9aee-06b0-8bf9c3a8c0a7', 'rolesKey', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'e0ef9bd3-de34-c7e6-c5fc-56df3c171177', 'Email', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'e6a4f965-3e40-5d9d-d427-33db5845e125', 'createBy', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'e892ce81-87fc-0c38-a076-346f8116f951', 'Hide', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'eaf0f93e-7838-8089-2583-66941d53b429', 'ClassIcon', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'eb2b4700-24bf-8b8c-4306-fb58c748ea2d', 'CMSPTitle', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'ed32a767-4099-e9b6-dc4a-f8bea97ceeb8', 'logout', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'eda83fbe-53f9-5a4f-79ad-283242c07fe2', 'error_12_details', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'f1af24dd-b5e0-fb82-201c-09b18ff81f94', 'moduleCreate', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'f1dbde03-b356-9668-f1f5-541d66bc1c6d', 'Mobile', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'f3dd91c5-4202-7c54-e874-142b0882ad5d', 'LangItemList', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'f4ea6d27-dc69-bc50-77b8-3774bcf08494', 'LangItemDeails', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'f6a21949-a810-9157-eb53-8e28666fd68d', 'BtnDeleteAll', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'f74b5b03-5dd1-0fa2-955e-9982cbb4103f', 'loginCmsPTitle', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'f7d8fac9-3a6b-0056-09cd-6df6722bcca0', 'accountList', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'f9994d40-a097-a510-aa32-888bda4333f6', 'BtnCreate', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'f9e7c4d6-cd14-e74c-476b-ea42c0f20254', 'membersPTitle', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'fabcddd7-9d9a-cd93-c302-139a5e7e67ac', 'TableRecordText', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '33b302ec-4b94-601b-f8f7-9fba6256e455', 'membersList', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '0d1f510b-f27f-a3ed-1a4b-82936b95fba5', 'membersCreate', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '69f70bbe-18e4-af85-6b27-ccd33751ceeb', 'membersUpdate', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'cf56bfd4-3237-0ddf-6a10-8b24eb50e084', 'membersName', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'bb5b1a87-d1a6-f1d0-1eb1-557a2c180abf', 'membersCMND', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '03bea305-0ac2-4933-910e-fa42c68b82e7', 'Address', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '2423ef5e-12d6-4834-3b4a-b4d5e804f561', 'membersType', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'a9344b35-504a-26f5-cf86-f85440607ebe', 'Description', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '24b448e6-baf1-820b-c5ce-e44fd02bfb66', 'msgPersonID', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'b6561151-e70f-ab52-0da8-a4556cc63732', 'menummembers', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'a05b9d1e-a8af-ef44-b24b-e3c7d4331e6f', 'membersTypePTitle', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'd4a8988c-c1d1-f6d4-6a4a-8e75bfe52577', 'membersTypeList', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '02ebe7ff-00b6-7814-1568-f8825d7fa06a', 'membersTypeCreate', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '2d7fbba0-0ed4-5782-d135-3dc8d4844664', 'membersTypeUpdate', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '221b7eab-f970-984c-1cbb-4701ec9a6e50', 'membersTypeTitle', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '4e7deffa-7110-1391-d1f2-46caf531ed87', 'msgRequiredError', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'a8cc2eb8-9ab3-d6c3-3bcb-038c9555d884', 'MenuMProduct', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '2c72d11d-7bff-0916-50cd-f457b3c62898', 'ProductGroupPtitle', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'caed6877-1388-d981-ca75-9e7087605fdd', 'ProductPtitle', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '988601a7-b413-1a27-fe3b-29f4c7916176', 'StatisticalPTitle', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'aa0fc7b2-e719-a559-93f5-5251e585e10d', 'BillsPTitle', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '6992f178-dc5b-55bc-5360-327296746f17', 'MenuMBillsStatistical', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'e28962bb-03cc-d855-0346-0c5f68455575', 'ProductGroupList', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '3c88b7ff-bbf9-7497-df7b-ad6982dd9a1b', 'ProductGroupCreate', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'c6de1532-9404-05d1-e548-d73ba50c6545', 'ProductGroupUpdate', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '9a9b620c-2fc1-1a15-a2c5-e6096b5546f7', 'GroupTitle', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'f707d875-4250-2e8e-e2c8-ec9f4a96eb80', 'Total_Item', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '21ec82b3-4800-fddc-de24-de1b1fc850cc', 'Content', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'ca84c061-1c30-5b9d-fd87-eee98d17be8e', 'ProductTitle', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '641c3a90-2356-cdf5-8486-09d182d84e7a', 'ProductList', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '940edd22-d38c-0458-8019-4f7518ed6bfb', 'ProductCreate', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '7b38bceb-8527-b492-bdec-79f709673858', 'ProductUpdate', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'f04f5bb2-87e0-d1e3-9150-794254a8164a', 'ProductCode', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'a85cca4d-4e33-e071-2aca-fc38acb40f69', 'ProductFPrice', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '698ea14c-f52f-b775-7e4d-9186ed851139', 'ProductLPrice', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'e80c1747-8200-9787-dcf2-4275271b8bff', 'Quantity', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'befd719a-ef87-be04-996a-9b8d7c4fd6ea', 'Color', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'd8318807-8387-1892-974a-8c4e58189124', 'Size', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '180e013b-5c1e-5bb1-5bc8-32c5f0736f59', 'Origin', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'a1e2ef00-f662-660b-6299-a4cb7c15e5ad', 'InforMain', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'f1bc0b9c-6ae5-f130-19c5-5533dd344c29', 'InforSub', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '461b0442-d6c5-85ef-68e8-9fbe92d03c0c', 'InforExtra', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '6278fd11-87bf-32c2-d4d1-20c7a26883e1', 'msgFPriceError', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'cb1ecc30-cfbe-3ca1-982c-bbaaa9c6d29b', 'msgLPriceError', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '7969314d-3991-cac7-75e3-dac646c63ea2', 'msgQuantityError', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'a95a85d5-bacf-c3f9-8471-659c47ac11f4', 'msgDecimalError', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'e710e850-26b3-4add-53c1-bf251f0c344d', 'ProductGroup', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '19c259e1-b3a4-18ec-59e7-d8810ba81285', 'BillsTitle', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'fd8a9304-efe2-3091-d671-7707d459333d', 'BillsBuyBy', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'e7d1b7c7-225a-b051-9401-f02a97918b9a', 'BillsFindMembers', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'f6db6d9e-d696-1a09-3527-d22720937e08', 'BillsList', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'fddfb5b5-b849-8772-bdf2-11460701d966', 'BillsCreate', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '2c640a11-0f03-a9b9-70fd-b85e6e87484d', 'BillsUpdate', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '5a9a4523-897c-5d58-e072-710e96fa2e1b', 'BillsFindProducts', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'af0f2fc3-5d42-a837-140f-87427d1a503b', 'Choose', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '98f4ae35-7d99-ba30-0198-217b199cb16f', 'BillsAddMembers', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'd5078451-7d42-a57d-1366-1f8c301f613e', 'Discount', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '218dd613-70bf-7cbf-db30-7efb6fe37fd2', 'ProductAttach', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '5e30df3d-3dd7-e6dd-e841-b58c35e475b7', 'empty', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'd73ccfe2-d9cd-1f59-8fe8-3f9be12a23b2', 'Paid', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'a9f5d33b-920a-15fb-3b90-105eb3663454', 'UnPaid', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '6012e90c-e55d-96ff-efe8-641f0bc685bd', 'rates', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '3071020b-8463-aa17-7e7e-8cb50c014c91', 'TotalPrice', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'db4a6356-649b-bf64-e387-4d7b6c13cd63', 'TotalAmount', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '43dd9d4d-395a-0a12-f898-2e0067dcd42e', 'TotalUnPaid', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'e156f720-9381-7a94-1467-e5bce83312a3', 'Total', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'c1274111-4ea0-e0ba-773c-e92b7e4f3696', 'msgDiscountError', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'a5680778-c3d6-b601-0746-9bfd210fc09b', 'Status', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'ee5ebc45-8695-b44f-4318-bb4f5626d2de', 'StatisticalList', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'da7ec1b6-fc58-ad0f-f44d-0429a276ce57', 'Day', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '313f893f-472d-2b2d-1f94-151a479f2353', 'Month', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '2b6427ae-ab26-9c11-a547-7d975ac1a60f', 'quy', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '7e90b772-6e72-e9ba-ac96-40a042696d9c', 'Year', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '4298f721-e1ca-f9e3-55d8-e7509ea6b309', 'TotalProducts', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '715c4335-7779-59c4-d3c6-b9ab6e3f14cf', 'TotalProductsSold', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '780dfadb-9752-d7fb-0a23-f91f1bc0ac7c', 'TotalQuantitySold', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '14448a65-af0c-0fc1-4f1b-b7e828dc2240', 'TotalQuantity', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'cf0193ee-c2c6-4a0b-f57e-0329da3ce3eb', 'TotalPaid', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'e457b0fa-4546-15be-d577-3d712f93e38f', 'TotalBillPaid', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '709f44a6-0aea-5984-52c1-41a3c78ea0a0', 'TotalBillUnPaid', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '3606ce8f-5029-8f3f-82a4-d8408c8edc79', 'Product', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '562a6d62-ce6c-e934-6652-a46a7931b5cb', 'Units', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'c5a2e429-5dc2-39a5-a88b-1e3473b81c65', 'Bills', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '5c77f91d-1de1-e7cb-9f30-9b2edfb7d19d', 'Pay', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '9fb3c820-270b-7fa3-8403-9d5b91f27a9d', 'btnAddPrintBills', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '98575849-9316-c5b4-ad02-2bb1c83c87bd', 'PrintBillsPTitle', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '776322dd-887e-506d-ec14-913c15c5cbda', 'BillsPeopleBy', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'c9e87846-14f6-b12d-7e49-f28d481bb9b0', 'InformationPTitle', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '66962614-bc06-1e33-6225-27656a296147', 'InformationList', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '4051ebcf-9b0c-6e56-fdea-8ff8c745bb58', 'InforCompanyName', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '19bd2709-42e2-864b-db0a-70f1eb2d87e4', 'InforSubBills', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '4a36f1b7-c225-9188-4f29-ecc63c3c0bd6', 'InforSubBillsTopLeft', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '76cd868b-c9ab-fd48-5faa-bf21076e3586', 'InforSubBillsTopRight', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '3b585c23-1a90-b626-fd4c-1b62907f2617', 'InforSubBillsNote', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '57715768-d5a0-98bb-907a-6001e0ca57a7', 'InforContentContacts', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'be378813-1e2b-5a1e-cf6f-e45b200796c2', 'Hotline', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '72552e83-cbc9-04ef-fa0f-3507124f3461', 'InforDesc', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '93e4fb79-c770-0679-2aec-b4f1570341c2', 'BillsBuyByList', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '4e032117-c7a4-9893-3d55-827d005d9dbf', 'BillsFindBuyBy', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '310f07f4-96b1-cf2c-c18a-55c86d973c0f', 'BillsAddBuyBy', ''),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'a4ad88fd-a984-21da-c8e2-eeb283e1249a', 'msgMaxQuantityBillsError', '');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `ApplicationId` char(36) DEFAULT NULL,
  `MBVID` char(36) NOT NULL,
  `MBVAccount` varchar(128) DEFAULT NULL,
  `MBVPassword` varchar(128) DEFAULT NULL,
  `MBVPropertyNames` varchar(128) DEFAULT NULL,
  `MBVEmail` varchar(128) DEFAULT NULL,
  `MBVMobile` char(15) DEFAULT NULL,
  `MBIPersonId` char(9) DEFAULT NULL,
  `MBVAddress` varchar(1024) DEFAULT NULL,
  `MBVDesc` text,
  `MBVPicture` char(250) DEFAULT NULL,
  `MBILocked` int(11) DEFAULT NULL,
  `MBVLockedBy` text,
  `MBDLockedDate` datetime DEFAULT NULL,
  `MBDLastLogin` datetime DEFAULT NULL,
  `MBDLastChangePass` datetime DEFAULT NULL,
  `MBDCreateDate` datetime DEFAULT NULL,
  `MBILoginTime` int(11) DEFAULT NULL,
  `MBIFlag` int(11) NOT NULL,
  `MBVPlus` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`ApplicationId`, `MBVID`, `MBVAccount`, `MBVPassword`, `MBVPropertyNames`, `MBVEmail`, `MBVMobile`, `MBIPersonId`, `MBVAddress`, `MBVDesc`, `MBVPicture`, `MBILocked`, `MBVLockedBy`, `MBDLockedDate`, `MBDLastLogin`, `MBDLastChangePass`, `MBDCreateDate`, `MBILoginTime`, `MBIFlag`, `MBVPlus`) VALUES
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '2ff00a98-ca68-2bae-cb43-cd94cb2912f6', '3df8ef47-ab22-e807-dd99-6de2e6e037db', '6b646179-b9b2-303e-4318-0d4eb1e73063', 'ffff', 'dhhh@gmail.com', '11111111111', '111111111', 'ghdhh', 'dfdfh', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, '375f5c30-3916-96b5-e649-abfc4700bc15'),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'b6f70c7e-034e-7bc4-1086-04b43633a0c5', '399ecb52-f196-0674-6d54-60b8247e38c4', '9790cfde-30ba-e691-1e4e-efd2beba2639', 'tuanmjnh', 'tuanmjnh@gmail.com', '11111111', '111111111', 'vvvvvv', 'vvvvvvvvvvvv', 'Uploads/Members/Images/8b5eabe3c8050b96373a8f27216cbf3f.jpg', 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2d402873-832d-00fe-80e0-38a2c26bd819');

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE IF NOT EXISTS `modules` (
  `ApplicationId` char(36) DEFAULT NULL,
  `MVID` char(36) NOT NULL,
  `MVParent` char(36) DEFAULT NULL,
  `MVSParent` text,
  `MILevel` int(11) DEFAULT '0',
  `MVTitle` text,
  `MVDesc` longtext,
  `MVUrl` text,
  `MVCIcon` text,
  `MVIcon` text,
  `MVRoles` longtext,
  `MVCBy` text,
  `MVCDate` datetime DEFAULT NULL,
  `MVUBy` text,
  `MVUDate` datetime DEFAULT NULL,
  `MIOrder` int(11) DEFAULT '0',
  `MIFlag` int(11) DEFAULT '1',
  `MVPluss` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`ApplicationId`, `MVID`, `MVParent`, `MVSParent`, `MILevel`, `MVTitle`, `MVDesc`, `MVUrl`, `MVCIcon`, `MVIcon`, `MVRoles`, `MVCBy`, `MVCDate`, `MVUBy`, `MVUDate`, `MIOrder`, `MIFlag`, `MVPluss`) VALUES
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '0107bbb1-d447-c4ef-095d-252e5ba2eb00', '008fc10a-8ec6-5b2e-31c4-588bea942471', ',008fc10a-8ec6-5b2e-31c4-588bea942471,', 1, 'members', '', 'members', 'fa fa-user', NULL, ',SupperAdmin,Admin,', 'admin', '2015-06-12 10:23:32', 'admin', '2015-11-07 14:44:24', 1, 1, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '0f2f54eb-3eb9-2957-e3fd-13b75ddc37b9', '9348c566-8c33-a8dd-9e58-b95b95478ef7', ',9348c566-8c33-a8dd-9e58-b95b95478ef7,', 1, 'langitem', 'langitem', 'langitem', 'fa fa-thumb-tack', NULL, ',SupperAdmin,', 'admin', '2015-06-08 09:06:42', 'admin', '2015-06-11 18:28:35', 1, 1, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '19034a2b-697f-9b3a-76c4-a2d225f9e03a', NULL, ',', 0, 'MModule', 'module', 'module', 'fa fa-folder-open-o', NULL, ',SupperAdmin,', 'admin', '2015-06-08 09:06:54', 'admin', '2015-11-14 13:23:34', 5, 1, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '1a94729c-e1e8-1303-4bd6-b00297321489', '9348c566-8c33-a8dd-9e58-b95b95478ef7', ',9348c566-8c33-a8dd-9e58-b95b95478ef7,', 1, 'language', 'Ngôn ngữ', 'language', 'fa fa-language', NULL, ',SupperAdmin,Admin,', 'admin', '2015-06-11 09:43:32', 'admin', '2015-06-11 18:28:30', 0, 1, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '1e3be795-d9c6-ec73-7952-b09c21601ee8', NULL, ',', 0, 'MAccount', 'Quản lý tài khoản', 'users', 'fa fa-users', NULL, ',SupperAdmin,Admin,', 'admin', '2015-06-09 09:29:49', 'admin', '2015-11-14 13:21:38', 3, 1, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '46729135-f3cc-6a1c-0b15-9df028744286', '1e3be795-d9c6-ec73-7952-b09c21601ee8', ',1e3be795-d9c6-ec73-7952-b09c21601ee8,', 1, 'Roles', 'roles', 'roles', 'fa fa-key', NULL, ',SupperAdmin,Admin,', 'admin', '2015-06-08 09:06:48', 'admin', '2015-11-14 13:25:19', 1, 1, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '90b93134-9d51-a149-0a7b-41d6802be947', NULL, ',', 0, 'MInformation', 'Thông tin web site', 'information', 'fa fa-globe', NULL, ',SupperAdmin,Admin,', 'admin', '2015-06-09 09:32:24', 'admin', '2015-12-20 10:48:13', 0, 1, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '9348c566-8c33-a8dd-9e58-b95b95478ef7', NULL, ',', 0, 'mLanguage', '', 'language', 'fa fa-book', NULL, ',SupperAdmin,Admin,', 'admin', '2015-06-10 14:14:27', 'admin', '2015-11-14 13:23:05', 4, 1, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'f0d9cd6e-a3a5-6369-b17e-5e50ff94d59c', '1e3be795-d9c6-ec73-7952-b09c21601ee8', ',1e3be795-d9c6-ec73-7952-b09c21601ee8,', 1, 'users', '', 'users', 'fa fa-user-secret', NULL, ',SupperAdmin,Admin,', 'admin', '2015-06-12 09:20:10', 'admin', '2015-06-12 10:19:31', 0, 1, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '008fc10a-8ec6-5b2e-31c4-588bea942471', NULL, ',', 0, 'MMembers', 'Quản trị khách hàng', 'members', 'fa fa-user', NULL, ',SupperAdmin,Admin,', 'admin', '2015-11-07 14:42:53', 'admin', '2015-12-22 11:33:53', 2, 1, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'dfaabcfd-a905-4430-745a-52fa038714d0', '008fc10a-8ec6-5b2e-31c4-588bea942471', ',008fc10a-8ec6-5b2e-31c4-588bea942471,', 1, 'membersType', 'Quản trị loại tài khoản', 'membersType', 'fa fa-street-view', NULL, ',SupperAdmin,Admin,', 'admin', '2015-11-07 14:51:50', 'admin', '2015-11-07 15:00:36', 1, 1, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '8ced8dc7-9c04-4330-f89f-1629c47dc4d0', NULL, ',', 0, 'MProduct', 'Quản lý sản phẩm và danh mục sản phẩm', 'product', 'fa fa-cubes', NULL, ',SupperAdmin,Admin,', 'admin', '2015-11-08 15:16:42', 'admin', '2015-11-14 13:20:56', 1, 1, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '6e3a3d3c-3f73-faaf-4a7d-1ea65cf62346', '8ced8dc7-9c04-4330-f89f-1629c47dc4d0', ',8ced8dc7-9c04-4330-f89f-1629c47dc4d0,', 1, 'productGroup', 'Quản lý danh mục sản phẩm', 'productGroup', 'fa fa-folder-open', NULL, ',SupperAdmin,Admin,', 'admin', '2015-11-08 15:17:21', 'admin', '2015-11-08 15:22:19', 0, 1, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '4fd2bf61-b71e-bfaa-8b2c-f9c4d2501897', '8ced8dc7-9c04-4330-f89f-1629c47dc4d0', ',8ced8dc7-9c04-4330-f89f-1629c47dc4d0,', 1, 'product', 'Quản lý sản phẩm', 'product', 'fa fa-rocket', NULL, ',SupperAdmin,Admin,', 'admin', '2015-11-08 15:20:51', NULL, NULL, 0, 1, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '77eaceb6-5d19-6bbe-d510-eecdc5e1672a', NULL, ',', 0, 'MBillsStatistical', 'Quản lý hóa đơn và thống kê bán hàng', 'bills', 'fa fa-database', NULL, ',SupperAdmin,Admin,', 'admin', '2015-11-08 15:31:55', NULL, NULL, 0, 1, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '7a2e339f-fd08-c18f-25c1-49ed3f8f9c92', '77eaceb6-5d19-6bbe-d510-eecdc5e1672a', ',77eaceb6-5d19-6bbe-d510-eecdc5e1672a,', 1, 'bills', 'Quản lý hóa đơn bán hàng', 'bills', 'fa fa-money', NULL, ',SupperAdmin,Admin,', 'admin', '2015-11-08 15:33:46', 'admin', '2015-11-08 15:35:38', 0, 1, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'f9f8e5e5-6cd5-7254-73ad-a506ae8a1dfe', '77eaceb6-5d19-6bbe-d510-eecdc5e1672a', ',77eaceb6-5d19-6bbe-d510-eecdc5e1672a,', 1, 'statistical', 'Quản lý thống kê bán hàng', 'statistical', 'fa fa-bar-chart', NULL, ',SupperAdmin,Admin,', 'admin', '2015-11-08 15:36:36', NULL, NULL, 0, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `ApplicationId` char(36) DEFAULT NULL,
  `RVID` char(36) NOT NULL,
  `RVKey` text,
  `RVName` text,
  `RVDesc` text,
  `RVCIcon` text,
  `RIOrder` int(11) DEFAULT '0',
  `RVPluss` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`ApplicationId`, `RVID`, `RVKey`, `RVName`, `RVDesc`, `RVCIcon`, `RIOrder`, `RVPluss`) VALUES
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '114efecb-ed1c-8d2e-ffca-5aba608a2fe3', 'SupperAdmin', 'Supper Admin', 'Supper Admin Đầy đủ chức năng', '', 0, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '21eae468-e2b5-252e-8f64-a57e53651d89', 'Admin', 'Admin', 'Quyền admin', '', 1, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '26563254-c51f-5974-618a-3318dfae0f4c', 'ModProduct', 'Mod Product', 'Quản lý sản phẩm', '', 3, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '81779d7a-864e-4406-775b-ffdbfb5ec8b7', 'ModNews', 'Mod News', 'Quản trị tin tức', '', 4, NULL),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', 'cd9b038b-74b9-3156-d5b2-65ae985e579c', 'Mod', 'Mod', 'mod', '', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ApplicationId` char(36) DEFAULT NULL,
  `UVID` char(36) NOT NULL,
  `UVRoles` text,
  `UVAccount` varchar(128) DEFAULT NULL,
  `UVPassword` text,
  `UVPasswordSalt` text,
  `UVProperty_names` varchar(512) DEFAULT NULL,
  `UVEmail` varchar(128) DEFAULT NULL,
  `UVMobile` varchar(50) DEFAULT NULL,
  `UVPicture` varchar(250) DEFAULT NULL,
  `UVAccess` text,
  `UVLastInf` text,
  `UDCDate` datetime DEFAULT NULL,
  `UDUDate` datetime DEFAULT NULL,
  `UDLastLogin` datetime DEFAULT NULL,
  `UDlastChangePass` datetime DEFAULT NULL,
  `UILoginDate` int(11) DEFAULT NULL,
  `UILoginTime` int(11) DEFAULT NULL,
  `UVLockedBy` text,
  `UDLockedDate` datetime DEFAULT NULL,
  `UDLocked` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ApplicationId`, `UVID`, `UVRoles`, `UVAccount`, `UVPassword`, `UVPasswordSalt`, `UVProperty_names`, `UVEmail`, `UVMobile`, `UVPicture`, `UVAccess`, `UVLastInf`, `UDCDate`, `UDUDate`, `UDLastLogin`, `UDlastChangePass`, `UILoginDate`, `UILoginTime`, `UVLockedBy`, `UDLockedDate`, `UDLocked`) VALUES
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '2685c234-8a40-a61c-0cc6-23bc6da5d72c', ',Admin,', 'admin', '3b28005e510e59c39508f58d365e80de', '5241dc16-ccda-b2ef-6dc7-04c6c8794024', ',zzz,zzz,', '', '', NULL, '8f96222f3e64089a7e07fd68b45a4651', 'ip,127.0.0.1|mac,No ARP Entries Found.\n', '2015-11-24 10:56:23', NULL, '2015-12-22 11:34:09', NULL, NULL, 0, NULL, NULL, 1),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '2dbab78d-6ec2-ed52-70a2-45d0af8557fb', ',SupperAdmin,Admin,Mod,', 'aaaaaa', '69bc8b63355c734f16dcb863fa6c4f4c', 'f55c40d6-4d37-2b62-954f-5b6ad1820d8f', ',nnnn,tuấn,', 'tuanmjnh@gmail.com', '55323523', 'Uploads/Users/Images/366a84becfeefd275d62335c07520a80.jpg', NULL, NULL, '2015-11-04 21:54:07', '2015-11-19 16:08:23', NULL, NULL, NULL, NULL, NULL, NULL, 1),
('1fe30b74-3932-4a21-829e-7250b7d5c2e4', '973796f0-8245-11e5-8b53-14dae96532e6', ',SupperAdmin,Admin,', 'tuanmjnh', 'b0147cf78cff4f01271f51a4973a82f2', 'f9078ef3-50f4-5040-5d73-9cac1a89bddc', ',Tuấn,Hin,', 'minhtuan200990@gmail.com', '01699277366', 'Uploads/Users/Images/7754b1a07864b525ca6e1fcafd47a9fd.jpg', 'c763a7da492e05968b8099bf0dc42b82', 'ip,127.0.0.1|mac,No ARP Entries Found.\n', '2015-06-25 14:03:57', '2015-11-19 16:07:56', '2016-03-12 14:59:47', NULL, NULL, 0, NULL, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `config`
--
ALTER TABLE `config`
 ADD PRIMARY KEY (`CVKey`,`CVSubKey`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
 ADD PRIMARY KEY (`GUID`);

--
-- Indexes for table `groups_groups`
--
ALTER TABLE `groups_groups`
 ADD PRIMARY KEY (`GUFID`,`GULID`);

--
-- Indexes for table `groups_items`
--
ALTER TABLE `groups_items`
 ADD PRIMARY KEY (`GUID`,`IUID`), ADD KEY `IUID` (`IUID`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
 ADD PRIMARY KEY (`INFVKey`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
 ADD PRIMARY KEY (`IUID`);

--
-- Indexes for table `items_sub`
--
ALTER TABLE `items_sub`
 ADD PRIMARY KEY (`SIUID`), ADD KEY `IUID` (`IUID`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
 ADD PRIMARY KEY (`MBVID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`UVID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `groups_items`
--
ALTER TABLE `groups_items`
ADD CONSTRAINT `groups_items_ibfk_1` FOREIGN KEY (`GUID`) REFERENCES `groups` (`GUID`),
ADD CONSTRAINT `groups_items_ibfk_2` FOREIGN KEY (`IUID`) REFERENCES `items` (`IUID`);

--
-- Constraints for table `items_sub`
--
ALTER TABLE `items_sub`
ADD CONSTRAINT `items_sub_ibfk_1` FOREIGN KEY (`IUID`) REFERENCES `items` (`IUID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
