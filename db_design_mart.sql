-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2022 at 01:15 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_design_mart`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pro_id` int(11) NOT NULL,
  `pro_name` varchar(100) NOT NULL DEFAULT '',
  `pro_price` float NOT NULL DEFAULT 0,
  `pro_material` varchar(150) DEFAULT NULL,
  `pro_category` varchar(100) NOT NULL,
  `pro_img` varchar(60) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Product master table';

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pro_id`, `pro_name`, `pro_price`, `pro_material`, `pro_category`, `pro_img`) VALUES
(48, 'Shalwar 152', 4300, 'Georgette + Santoon', 'Shalwar', '48_12585571251647756237969040315.jpg'),
(49, 'Mohini Glamour', 6900, 'Santoon', 'Shalwar', '49_1182658140985215420308284844.jpg'),
(51, 'Alzohaib Dress', 6500, 'Cotton', 'Shalwar', '51_100814477821107778361924439915.jpg'),
(128, 'RIM ZIM BY RINAZ', 8000, 'Santoon', 'Shalwar', '128_151603722921087030592051471138.jpg'),
(131, 'ANOKHI By ASHIRWAD', 11500, 'Georgette + Santoon', 'Shalwar', '131_190820511621091186441206652983.jpg'),
(167, 'WOVEN ART SILK', 10890, 'Kanjivaram Silk', 'Saree', '167_18338017828452520212007347461.jpg'),
(168, 'WHITE WOVEN SILK', 4090, 'silk', 'Saree', '168_173982956084816179084185256.jpg'),
(169, 'MAGENTA WOVEN SILK', 4990, 'Art Silk', 'Saree', '169_123355199965437748984143474.jpg'),
(170, 'PRINTED GEORGETTE ', 11620, 'Georgette', 'Saree', '170_1161541328692403089664716425.jpg'),
(171, 'LAVENDER WOVENSILK', 4840, 'Art Silk', 'Saree', '171_64111729317525402011684656222.jpg'),
(173, 'Casual Chudidar', 2500, 'Cotton', 'Chudidar', '173_826951556641412130928216.jpg'),
(174, 'Embroidered Party', 5500, 'Crepe', 'Chudidar', '174_80012597421138317761126705873.jpg'),
(175, 'Embroidry Straight', 6500, 'silk', 'Chudidar', '175_17290900417219616161660198220.jpg'),
(176, 'Georgette Party', 7200, 'Georgette', 'Chudidar', '176_18858912753883520951544059983.jpg'),
(177, 'Georgette Blue', 4500, 'Georgette', 'Chudidar', '177_1344458432031074219317953787.jpg'),
(178, 'Embroidred Lehenga', 29065, 'Banglori Silk + Net', 'Ghagra Choli', '178_8740732182091799339528976152.jpg'),
(179, 'Cotton Lehenga', 7532, 'Cotton', 'Ghagra Choli', '179_1881462767216520543863246564.jpg'),
(180, 'Reception Lehenga', 27460, 'Banglori Silk + Net', 'Ghagra Choli', '180_6101280691438106321341398122.jpg'),
(181, 'Reception Designer', 32252, 'Banglori Silk + Net', 'Ghagra Choli', '181_20241299291963975266407519751.jpg'),
(182, 'Trendy Lehenga', 29309, 'Banglori Silk + Net', 'Ghagra Choli', '182_360335160150293011335175115.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(100) NOT NULL,
  `access_code` varchar(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `contact_no` int(10) UNSIGNED ZEROFILL DEFAULT NULL,
  `user_group` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='User master table';

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `access_code`, `name`, `address`, `contact_no`, `user_group`) VALUES
('aathifm19699@gmail.com', 'x0Yxdp.ObAIMY', 'Mohamed Aathif', '12,Udathalawinne Madige, Kandy.', 0760661888, 'user'),
('aathifm99@gmail.com', 'x0Yxdp.ObAIMY', 'Aathif', '12, Udathalawinne Madige, Kandy', 0760661888, 'admin'),
('admin@admin.com', 'x04JsnCBpiEfU', 'John Doe', NULL, NULL, 'admin'),
('user@user.com', 'x0tGuVdqXJ84E', 'John Doe', '1/4 Kandy Rd Katugastota', 0771234567, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
