-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 28, 2014 at 06:01 PM
-- Server version: 5.5.37-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `suryoday_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `baithak`
--

CREATE TABLE IF NOT EXISTS `baithak` (
  `baithak_id` int(11) NOT NULL AUTO_INCREMENT,
  `bithak_date` date NOT NULL,
  `baithak_timing` varchar(10) NOT NULL,
  `baithak_location` varchar(20) NOT NULL,
  `baithak_state` varchar(20) NOT NULL,
  `baithak_status` varchar(15) NOT NULL,
  `baithak_head` int(11) NOT NULL,
  `baithak_remark` varchar(50) NOT NULL,
  PRIMARY KEY (`baithak_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `combo`
--

CREATE TABLE IF NOT EXISTS `combo` (
  `combo_id` int(11) NOT NULL AUTO_INCREMENT,
  `combo_item_1` int(11) NOT NULL,
  `combo_item_2` int(11) NOT NULL,
  `combo_item_3` int(11) NOT NULL,
  `combo_item_4` int(11) NOT NULL,
  PRIMARY KEY (`combo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `dept_id` int(11) NOT NULL AUTO_INCREMENT,
  `dept_name` varchar(30) NOT NULL,
  `dept_objective` varchar(50) NOT NULL,
  PRIMARY KEY (`dept_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE IF NOT EXISTS `designation` (
  `desig_id` int(11) NOT NULL AUTO_INCREMENT,
  `desig_name` varchar(30) NOT NULL,
  `roles` varchar(50) NOT NULL,
  PRIMARY KEY (`desig_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE IF NOT EXISTS `donation` (
  `donation_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `donation_type` varchar(10) NOT NULL,
  `donation_mode` varchar(10) NOT NULL,
  `donation_for_project` tinyint(1) NOT NULL,
  `amount` int(11) NOT NULL,
  `received_by` int(11) NOT NULL,
  `entry_by` int(11) NOT NULL,
  `receipt_no` int(11) NOT NULL,
  `usage_details` varchar(30) NOT NULL,
  `remark` varchar(30) NOT NULL,
  `donation_details` varchar(30) NOT NULL,
  PRIMARY KEY (`donation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employee_details`
--

CREATE TABLE IF NOT EXISTS `employee_details` (
  `user_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `dept_id` int(11) NOT NULL,
  `desig_id` int(11) NOT NULL,
  `working_location` varchar(20) NOT NULL,
  `date_of_joining` date NOT NULL,
  `date_of_leaving` date NOT NULL,
  `paid` tinyint(1) NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `occupation`
--

CREATE TABLE IF NOT EXISTS `occupation` (
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `occ_id` varchar(30) NOT NULL,
  `organization` varchar(30) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `occupation_level_one`
--

CREATE TABLE IF NOT EXISTS `occupation_level_one` (
  `olo_id` int(11) NOT NULL AUTO_INCREMENT,
  `olt_id` int(11) NOT NULL,
  `olo_name` varchar(30) NOT NULL,
  PRIMARY KEY (`olo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `occupation_level_three`
--

CREATE TABLE IF NOT EXISTS `occupation_level_three` (
  `olth_id` int(11) NOT NULL AUTO_INCREMENT,
  `olth_name` varchar(30) NOT NULL,
  PRIMARY KEY (`olth_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `occupation_level_two`
--

CREATE TABLE IF NOT EXISTS `occupation_level_two` (
  `olt_id` int(11) NOT NULL AUTO_INCREMENT,
  `olth_id` int(11) NOT NULL,
  `olt_name` varchar(30) NOT NULL,
  PRIMARY KEY (`olt_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `offering`
--

CREATE TABLE IF NOT EXISTS `offering` (
  `offering_id` int(11) NOT NULL AUTO_INCREMENT,
  `o_item_detail_1` varchar(30) NOT NULL,
  `o_item_detail_2` varchar(30) NOT NULL,
  `o_item_detail_3` varchar(30) NOT NULL,
  PRIMARY KEY (`offering_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `printing_publication`
--

CREATE TABLE IF NOT EXISTS `printing_publication` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(20) NOT NULL,
  `product_price` int(11) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `project_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(30) NOT NULL,
  `project_type_id` int(11) NOT NULL,
  `project_location` varchar(30) NOT NULL,
  `project_status` varchar(30) NOT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `project_type`
--

CREATE TABLE IF NOT EXISTS `project_type` (
  `project_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_type_name` varchar(30) NOT NULL,
  PRIMARY KEY (`project_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `purpose`
--

CREATE TABLE IF NOT EXISTS `purpose` (
  `purpose_id` int(11) NOT NULL AUTO_INCREMENT,
  `purpose_name` varchar(30) NOT NULL,
  PRIMARY KEY (`purpose_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `relation`
--

CREATE TABLE IF NOT EXISTS `relation` (
  `relation_id` int(11) NOT NULL AUTO_INCREMENT,
  `relation_name` varchar(30) NOT NULL,
  PRIMARY KEY (`relation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `upaay`
--

CREATE TABLE IF NOT EXISTS `upaay` (
  `upaay_id` int(11) NOT NULL AUTO_INCREMENT,
  `baithak_id` int(11) NOT NULL,
  `token_id` int(11) NOT NULL,
  `samasya` varchar(50) NOT NULL,
  `upaay` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `assigned_to` int(11) NOT NULL,
  `remark` varchar(50) NOT NULL,
  PRIMARY KEY (`upaay_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `upaay`
--

INSERT INTO `upaay` (`upaay_id`, `baithak_id`, `token_id`, `samasya`, `upaay`, `status`, `assigned_to`, `remark`) VALUES
(1, 1, 1, 'test', 'test', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE IF NOT EXISTS `user_info` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `middle_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `country_state` varchar(20) NOT NULL,
  `district_city` varchar(20) NOT NULL,
  `area_locality_tehsil_taluka` varchar(30) NOT NULL,
  `start_address` varchar(30) NOT NULL,
  `pincode` int(11) NOT NULL,
  `landline_no` int(11) NOT NULL,
  `mobile_no` int(11) NOT NULL,
  `fax_no` int(11) NOT NULL,
  `alternate_mobile_no` int(11) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(7) NOT NULL,
  `father_name` varchar(30) NOT NULL,
  `mother_name` varchar(30) NOT NULL,
  `marital_status` varchar(8) NOT NULL,
  `spouse_name` varchar(30) NOT NULL,
  `date_of_anniversary` date NOT NULL,
  `email` varchar(20) NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `is_visitor` tinyint(1) NOT NULL,
  `pan_no` int(11) NOT NULL,
  `is_vip` tinyint(1) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE IF NOT EXISTS `user_login` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_relation`
--

CREATE TABLE IF NOT EXISTS `user_relation` (
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `user1_id` int(11) NOT NULL,
  `relation_id` int(11) NOT NULL,
  `user2_id` int(11) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `visit_details`
--

CREATE TABLE IF NOT EXISTS `visit_details` (
  `token_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `date_of_visit` date NOT NULL,
  `purpose_id` int(11) NOT NULL,
  `status` varchar(15) NOT NULL,
  `upaay_id` int(11) NOT NULL,
  `donation_id` int(11) NOT NULL,
  `combo_id` int(11) NOT NULL,
  `baithak_id` int(11) NOT NULL,
  `plant_given` tinyint(1) NOT NULL,
  `offering_id` int(11) NOT NULL,
  PRIMARY KEY (`token_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `visit_details`
--

INSERT INTO `visit_details` (`token_id`, `user_id`, `date_of_visit`, `purpose_id`, `status`, `upaay_id`, `donation_id`, `combo_id`, `baithak_id`, `plant_given`, `offering_id`) VALUES
(1, 1, '2014-07-04', 1, 'test', 1, 1, 1, 1, 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
