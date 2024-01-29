-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2024 at 03:44 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_reg`
--

CREATE TABLE IF NOT EXISTS `admin_reg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) NOT NULL DEFAULT '',
  `last_name` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin_reg`
--

INSERT INTO `admin_reg` (`id`, `first_name`, `last_name`, `email`, `phone`, `password`) VALUES
(1, 'viraj', 'chikhale', 'virajchikhale88@gmail.com', '0976646629', '5e8667a439c68f5145dd2fcbecf02209');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `type` varchar(100) NOT NULL,
  `img` varchar(50) NOT NULL,
  `oprise` int(50) NOT NULL,
  `dprise` int(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `aid` varchar(50) NOT NULL,
  `sid` varchar(50) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `type`, `img`, `oprise`, `dprise`, `description`, `aid`, `sid`, `quantity`) VALUES
(7, 'Urea', 'Fertilizer', 'Urea.jpg', 500, 400, 'used for improvement of soil', '1', '', '30'),
(8, 'Ammonium Nitrate', 'Fertilizer', 'ammonium.jpg', 1700, 1500, 'provide nitrogen to the soil', '2', '', '25'),
(9, 'Calcium nitrate', 'Fertilizers', 'calnitrate.jpg', 1300, 1200, 'used in fruit crops', '3', '', '44'),
(10, 'Potassium nitratue', 'Fetilizer', 'potassium.jpg', 2200, 2000, 'used foi soil improvement', '4', '', '40'),
(11, 'insecticides', 'Fertilizers', 'insecticides.png', 1200, 1000, 'for distroy unusefull insect', '5', '', '50'),
(12, 'NPK', 'Fertilizers', 'npk.png', 2200, 2100, 'used at rainy season', '6', '', '36'),
(13, 'Aqua ammonia', 'Fetilizers', 'aqua.jpg', 1600, 1500, 'improve quality of soil', '7', '', '30'),
(14, 'Mango', 'food', 'mango.jpg', 300, 250, 'fruit crop', '8', '', '12'),
(15, 'Banana', 'food', 'banana.png', 70, 50, 'banana grow in any season', '9', '', '12'),
(16, 'Apple', 'food', 'apple.jpg', 400, 350, 'grow in cool area', '10', '', '12'),
(17, 'pinapple', 'food', 'pinapple.jpg', 150, 120, 'yellow in color', '11', '', '10'),
(18, 'Orange', 'food', 'orange.png', 300, 270, 'grow in nagpur city', '12', '', '12'),
(19, 'Watermelon', 'food', 'aaa.jpg', 600, 550, 'grow in underground', '', '1', '15'),
(20, 'Bone meal', 'Manure', 'bonemeal.jpg', 2500, 2400, 'made from animals bones', '', '2', '40'),
(21, 'poultry litter', 'Manure', 'poultrylitter.jpg', 2500, 2300, 'waste of poultry farming', '', '4', '50'),
(23, 'Cow dung11', 'Manure', '809906IMG20230120203550.jpg', 10001, 9001, 'waste of cattle1', '', '2', '301'),
(24, 'Goat manure compost', 'Manure', 'goatmanure.jpg', 1200, 1100, 'waste of goat', '', '3', '40'),
(25, 'Superphosphate', 'Fertilizers', 'superphosphate.png', 1700, 1600, 'use for improvement of crops', '', '4', '40'),
(26, 'viraj', '', '485687content.jpg', 150, 140, 'test', '1', '', '10'),
(30, 'Chikhale Viraj Suhas', '', '4086613957837a1b1e0d0.jpg', 234, 140, 'frwdfe rewqf 2rd q2er 2w 3re q', '16', '', '50'),
(31, 'viraj chikhale', '1234', '712677vhh.jpg', 1000, 9001, 'gbrtbsrbr', '', '', '331'),
(32, 'viraj chikhale', 'aaaa', '792907wallhaven-6ozkzl.jpg', 22, 9001, 'gbrtbsrbr', '', '', '33');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
