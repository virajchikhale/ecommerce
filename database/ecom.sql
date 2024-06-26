-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2024 at 05:35 PM
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
-- Table structure for table `address`
--

CREATE TABLE IF NOT EXISTS `address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `ad1` varchar(50) NOT NULL,
  `ad2` varchar(50) NOT NULL,
  `county` varchar(30) NOT NULL,
  `state` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `code` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `cid`, `ad1`, `ad2`, `county`, `state`, `city`, `code`) VALUES
(5, 2, '', '', 'Bharat', '', '', ''),
(6, 3, '', '', 'Bharat', '', '', '');

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
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` varchar(10) NOT NULL,
  `quantity` varchar(10) NOT NULL,
  `pid` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=82 ;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `cid`, `quantity`, `pid`) VALUES
(80, '2', '2', '34'),
(81, '2', '1', '36');

-- --------------------------------------------------------

--
-- Table structure for table `customer_reg`
--

CREATE TABLE IF NOT EXISTS `customer_reg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `customer_reg`
--

INSERT INTO `customer_reg` (`id`, `fname`, `lname`, `email`, `phone`, `password`) VALUES
(2, 'viraj', 'chikhale', 'virajchikhale88@gmail.com', '9766466299', '25d55ad283aa400af464c76d713c07ad'),
(3, 'Principal', 'Viraj', 'chikhaleviraj@gmail.com', '6324556786', '25d55ad283aa400af464c76d713c07ad');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `date` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `pid`, `cid`, `date`, `quantity`, `status`) VALUES
(8, 36, 2, '13-04-24', 2, 0),
(9, 35, 2, '13-04-24', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `category` varchar(20) NOT NULL,
  `type` varchar(100) NOT NULL,
  `img` varchar(50) NOT NULL,
  `oprise` int(50) NOT NULL,
  `dprise` int(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `aid` varchar(50) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `sale` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `type`, `img`, `oprise`, `dprise`, `description`, `aid`, `quantity`, `sale`) VALUES
(34, 'product 1', 'men', 'shirt', '672973IMG20220329214536.jpg', 123, 122, 'dfaaaa', '1', '2', 0),
(35, 'product 2', 'men', 'shirt', '362946Screenshot 2023-03-31 223458.png', 567, 456, 'dfbvfdbsdgbb  fgbndgr', '1', '1', 1),
(36, 'product 3', 'men', 'shirt', '99884Blue & Orange Modern Grow Your Business Poste', 123, 122, 'dfaaaa', '1', '8', 2);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE IF NOT EXISTS `review` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(20) NOT NULL,
  `review` varchar(200) NOT NULL,
  `rating` float NOT NULL,
  `date` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `pid`, `name`, `email`, `review`, `rating`, `date`) VALUES
(1, 35, 'mich toh', '', 'rjhfieaurv ;kjasfvk;jaef kjasvkjsn lkjvkj sdv', 4, ''),
(2, 35, 'trbhwsbhwrrw', '', 'gtegrs', 0, ''),
(3, 35, 'HOD Computer', '', 'fsZDgfva qerfaewf 4fawergf', 3, ''),
(4, 35, 'wbsrdgnbrsgb', 'rbrsdgbs', 'wqrvbaefbsr', 4, 'date("d-m-Y")');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
