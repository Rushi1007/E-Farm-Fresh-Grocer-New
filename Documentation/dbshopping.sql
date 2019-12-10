-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2015 at 04:14 AM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbshopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE IF NOT EXISTS `tbladmin` (
`admin_id` int(11) primary key,
  `admin_email` varchar(30),
  `admin_password` varchar(8)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`admin_id`, `admin_email`, `admin_password`) VALUES

-- --------------------------------------------------------

--
-- Table structure for table `tblcart`
--

CREATE TABLE IF NOT EXISTS `tblcart` (
`prod_id` int(11) NOT NULL,
  `prod_name` varchar(80) NOT NULL,
  `prod_type` varchar(50) NOT NULL,
  `prod_qty` int(11) NOT NULL,
  `prod_rate` float NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `tblcart`
--

INSERT INTO `tblcart` (`prod_id`, `prod_name`, `prod_type`, `prod_qty`, `prod_rate`, `product_id`, `user_id`, `user_name`) VALUES
(43, 'Carrot', 'Fruit Vegetable', 6, 50, 0, 23, 'Shamrav'),
(45, 'Carrot', 'Fruit Vegetable', 2, 50, 0, 23, 'Shamrav'),
(46, 'Potato', 'Fruit Vegetable', 1, 40, 0, 23, 'Shamrav');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE IF NOT EXISTS `tblcategory` (
`category_id` int(11) NOT NULL,
  `category_name` varchar(80) NOT NULL,
  `category_type` varchar(80) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`category_id`, `category_name`, `category_type`) VALUES
(8, 'leafy vagetables', 'Vegetable'),
(9, 'Fruit Vegetable', 'Vegetable');

-- --------------------------------------------------------

--
-- Table structure for table `tblfeedback`
--

CREATE TABLE IF NOT EXISTS `tblfeedback` (
`feedback_id` int(11) NOT NULL,
  `feedback_name` text NOT NULL,
  `feedback_email` varchar(100) NOT NULL,
  `feedback_comments` varchar(1000) NOT NULL,
  `feedback_mobile` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

CREATE TABLE IF NOT EXISTS `tblproduct` (
`product_id` int(11) NOT NULL,
  `product_name` text NOT NULL,
  `product_type` text NOT NULL,
  `product_rate` double NOT NULL,
  `product_qty` int(11) NOT NULL,
  `product_unit` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`product_id`, `product_name`, `product_type`, `product_rate`, `product_qty`, `product_unit`, `category_id`, `user_id`) VALUES
(18, 'Potato', 'Fruit Vegetable', 40, 150, 'Kg', 0, 0),
(20, 'Coriander Leaves', 'Leafy Vegetable', 20, 50, 'Unit', 0, 0),
(23, 'Spinach', 'Leafy Vegetable', 20, 100, 'Unit', 0, 0),
(24, 'Cauli Flower', 'Fruit Vegetable', 45, 60, 'Kg', 0, 0),
(25, 'Cabbage', 'Fruit Vegetable', 25, 65, 'Unit', 0, 0),
(26, 'Ginger', 'Fruit Vegetable', 200, 50, 'Kg', 0, 0),
(27, 'Garlic', 'Fruit Vegetable', 100, 70, 'Kg', 0, 0),
(28, 'Tomato', 'Fruit Vegetable', 40, 200, 'Kg', 0, 0),
(29, 'Lemon', 'Fruit Vegetable', 60, 150, 'Dozzen', 0, 0),
(30, 'Onion Leaves', 'Leafy Vegetable', 25, 200, 'Unit', 0, 0),
(31, 'Bottle Gourd', 'Fruit Vegetable', 20, 200, 'Unit', 0, 0),
(32, 'Green Peas', 'Fruit Vegetable', 80, 150, 'Kg', 0, 0),
(33, 'Karri Patta', 'Leafy Vegetable', 10, 100, 'Unit', 0, 0),
(34, 'Pumpkin', 'Fruit Vegetable', 40, 250, 'Kg', 0, 0),
(35, 'Brinjal', 'Fruit Vegetable', 30, 300, 'Kg', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE IF NOT EXISTS `tbluser` (
`user_id` int(11) NOT NULL,
  `user_email` text NOT NULL,
  `user_password` text NOT NULL,
  `user_name` text NOT NULL,
  `user_lname` varchar(50) NOT NULL,
  `user_city` varchar(50) NOT NULL,
  `user_gender` text NOT NULL,
  `user_pincode` varchar(20) NOT NULL,
  `user_address` varchar(60) NOT NULL,
  `user_mobile` double NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`user_id`, `user_email`, `user_password`, `user_name`, `user_lname`, `user_city`, `user_gender`, `user_pincode`, `user_address`, `user_mobile`, `product_id`) VALUES
(23, 'sham@gmail.com', 'sham123', 'Shamrav', 'Sonavne', 'Pune', '1', '422563', 'Budhvar peth,pune', 9865326598, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
 ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tblcart`
--
ALTER TABLE `tblcart`
 ADD PRIMARY KEY (`prod_id`), ADD KEY `product_id` (`product_id`,`user_id`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
 ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tblfeedback`
--
ALTER TABLE `tblfeedback`
 ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `tblproduct`
--
ALTER TABLE `tblproduct`
 ADD PRIMARY KEY (`product_id`), ADD KEY `category_id` (`category_id`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tblcart`
--
ALTER TABLE `tblcart`
MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tblfeedback`
--
ALTER TABLE `tblfeedback`
MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
