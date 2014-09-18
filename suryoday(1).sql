-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 20, 2014 at 07:46 PM
-- Server version: 5.5.38-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `suryoday`
--

-- --------------------------------------------------------

--
-- Table structure for table `baithak`
--

CREATE TABLE IF NOT EXISTS `baithak` (
  `baithak_id` int(11) NOT NULL AUTO_INCREMENT,
  `baithak_date` date NOT NULL,
  `baithak_timing` time NOT NULL,
  `baithak_location` varchar(20) NOT NULL,
  `baithak_state` varchar(20) NOT NULL,
  `baithak_status` varchar(15) NOT NULL,
  `baithak_head` varchar(30) NOT NULL,
  `baithak_remark` varchar(50) NOT NULL,
  PRIMARY KEY (`baithak_id`),
  KEY `baithak_head` (`baithak_head`)
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
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(30) NOT NULL,
  `department_objective` varchar(50) NOT NULL,
  PRIMARY KEY (`sno`),
  UNIQUE KEY `department_name` (`department_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE IF NOT EXISTS `designation` (
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `designation_name` varchar(30) NOT NULL,
  `roles` varchar(50) NOT NULL,
  PRIMARY KEY (`sno`),
  UNIQUE KEY `designation_name` (`designation_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE IF NOT EXISTS `donation` (
  `donation_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(30) NOT NULL,
  `donation_type` varchar(10) NOT NULL,
  `donation_mode` varchar(10) NOT NULL,
  `donation_for_project` varchar(30) NOT NULL,
  `received_by` varchar(30) NOT NULL,
  `entry_by` varchar(30) NOT NULL,
  `receipt_no` int(11) NOT NULL,
  `usage_details` varchar(30) NOT NULL,
  `remark` varchar(30) NOT NULL,
  `donation_details` varchar(30) NOT NULL,
  `donation_date` date NOT NULL,
  PRIMARY KEY (`donation_id`),
  KEY `user_id` (`user_id`),
  KEY `received_by` (`received_by`),
  KEY `entry_by` (`entry_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `donation_cash_detail`
--

CREATE TABLE IF NOT EXISTS `donation_cash_detail` (
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `donation_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `mode_type` varchar(10) NOT NULL,
  `mode_no` varchar(30) NOT NULL,
  PRIMARY KEY (`sno`),
  KEY `donation_id` (`donation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `donation_kind_detail`
--

CREATE TABLE IF NOT EXISTS `donation_kind_detail` (
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `donation_id` int(11) NOT NULL,
  `kind_value` varchar(30) NOT NULL,
  `quantity` varchar(30) NOT NULL,
  PRIMARY KEY (`sno`),
  KEY `donation_id` (`donation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employee_details`
--

CREATE TABLE IF NOT EXISTS `employee_details` (
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(30) NOT NULL,
  `department_name` varchar(30) NOT NULL,
  `designation_name` varchar(30) NOT NULL,
  `working_location` varchar(20) NOT NULL,
  `date_of_joining` date NOT NULL,
  `date_of_leaving` date NOT NULL,
  `paid` tinyint(1) NOT NULL,
  PRIMARY KEY (`sno`),
  KEY `user_id` (`user_id`),
  KEY `department_name` (`department_name`),
  KEY `designation_name` (`designation_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `occupation`
--

CREATE TABLE IF NOT EXISTS `occupation` (
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(30) NOT NULL,
  `occupation_organization_id` int(11) NOT NULL,
  `occupation_level_one_name` varchar(30) NOT NULL,
  `occupation_level_two_name` varchar(30) NOT NULL,
  `occupation_level_three_name` varchar(30) NOT NULL,
  `is_primary` tinyint(1) NOT NULL,
  PRIMARY KEY (`sno`),
  KEY `occupation_organization_id` (`occupation_organization_id`),
  KEY `user_id` (`user_id`),
  KEY `occupation_level_one_name` (`occupation_level_one_name`),
  KEY `occupation_level_two_name` (`occupation_level_two_name`),
  KEY `occupation_level_three_name` (`occupation_level_three_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `occupation_level_one`
--

CREATE TABLE IF NOT EXISTS `occupation_level_one` (
  `occupation_level_one_id` int(11) NOT NULL AUTO_INCREMENT,
  `occupation_level_one_name` varchar(30) NOT NULL,
  PRIMARY KEY (`occupation_level_one_id`),
  UNIQUE KEY `occupation_level_one_name` (`occupation_level_one_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `occupation_level_three`
--

CREATE TABLE IF NOT EXISTS `occupation_level_three` (
  `occupation_level_three_id` int(11) NOT NULL AUTO_INCREMENT,
  `occupation_level_three_name` varchar(30) NOT NULL,
  PRIMARY KEY (`occupation_level_three_id`),
  UNIQUE KEY `occupation_level_three_name` (`occupation_level_three_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `occupation_level_two`
--

CREATE TABLE IF NOT EXISTS `occupation_level_two` (
  `occupation_level_two_id` int(11) NOT NULL AUTO_INCREMENT,
  `occupation_level_two_name` varchar(30) NOT NULL,
  PRIMARY KEY (`occupation_level_two_id`),
  UNIQUE KEY `occupation_level_two_name` (`occupation_level_two_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `occupation_organization`
--

CREATE TABLE IF NOT EXISTS `occupation_organization` (
  `org_id` int(11) NOT NULL AUTO_INCREMENT,
  `org_name` varchar(30) NOT NULL,
  `org_start_address` varchar(30) NOT NULL,
  `org_area_locality` varchar(30) NOT NULL,
  `org_city` varchar(30) NOT NULL,
  `org_state` varchar(30) NOT NULL,
  `org_country` varchar(30) NOT NULL,
  `org_contact_number` varchar(15) NOT NULL,
  PRIMARY KEY (`org_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

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
  `project_type_name` varchar(30) NOT NULL,
  `project_location` varchar(30) NOT NULL,
  `project_status` varchar(30) NOT NULL,
  PRIMARY KEY (`project_id`),
  KEY `project_type_name` (`project_type_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `project_type`
--

CREATE TABLE IF NOT EXISTS `project_type` (
  `project_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_type_name` varchar(30) NOT NULL,
  PRIMARY KEY (`project_type_id`),
  UNIQUE KEY `project_type_name` (`project_type_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `purpose`
--

CREATE TABLE IF NOT EXISTS `purpose` (
  `purpose_id` int(11) NOT NULL AUTO_INCREMENT,
  `purpose_name` varchar(30) NOT NULL,
  PRIMARY KEY (`purpose_id`),
  UNIQUE KEY `purpose_name` (`purpose_name`)
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
  `token` varchar(30) NOT NULL,
  `samasya` varchar(100) NOT NULL,
  `upaay` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `assigned_to` varchar(30) NOT NULL,
  `remark` varchar(50) NOT NULL,
  PRIMARY KEY (`upaay_id`),
  KEY `baithak_id` (`baithak_id`),
  KEY `token` (`token`),
  KEY `assigned_to` (`assigned_to`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE IF NOT EXISTS `user_info` (
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(30) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `middle_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `country_state` varchar(20) NOT NULL,
  `district_city` varchar(20) NOT NULL,
  `area_locality_tehsil_taluka` varchar(30) NOT NULL,
  `start_address` varchar(30) NOT NULL,
  `pincode` int(11) NOT NULL,
  `landline_no` int(20) NOT NULL,
  `mobile_no` int(20) NOT NULL,
  `fax_no` int(30) NOT NULL,
  `alternate_mobile_no` int(20) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(7) NOT NULL,
  `father_name` varchar(30) NOT NULL,
  `mother_name` varchar(30) NOT NULL,
  `marital_status` varchar(8) NOT NULL,
  `spouse_name` varchar(30) NOT NULL,
  `date_of_anniversary` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `is_visitor` tinyint(1) NOT NULL,
  `pan_no` varchar(32) NOT NULL,
  `is_vip` tinyint(1) NOT NULL,
  PRIMARY KEY (`sno`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE IF NOT EXISTS `user_login` (
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type` varchar(15) NOT NULL,
  PRIMARY KEY (`sno`),
  UNIQUE KEY `user_id` (`user_id`)
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
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(30) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `date_of_visit` date NOT NULL,
  `purpose` varchar(30) NOT NULL,
  `upaay_id` int(11) DEFAULT NULL,
  `donation_id` int(11) DEFAULT NULL,
  `combo_id` int(11) NOT NULL,
  `baithak_id` int(11) NOT NULL,
  `plant_given` tinyint(1) NOT NULL,
  `offering_id` int(11) NOT NULL,
  PRIMARY KEY (`sno`),
  UNIQUE KEY `token` (`token`),
  KEY `user_id` (`user_id`),
  KEY `purpose` (`purpose`),
  KEY `upaay_id` (`upaay_id`),
  KEY `donation_id` (`donation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `baithak`
--
ALTER TABLE `baithak`
  ADD CONSTRAINT `baithak_ibfk_1` FOREIGN KEY (`baithak_head`) REFERENCES `user_info` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `donation`
--
ALTER TABLE `donation`
  ADD CONSTRAINT `donation_ibfk_3` FOREIGN KEY (`entry_by`) REFERENCES `user_info` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `donation_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `donation_ibfk_2` FOREIGN KEY (`received_by`) REFERENCES `user_info` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `donation_cash_detail`
--
ALTER TABLE `donation_cash_detail`
  ADD CONSTRAINT `donation_cash_detail_ibfk_1` FOREIGN KEY (`donation_id`) REFERENCES `donation` (`donation_id`) ON DELETE CASCADE;

--
-- Constraints for table `donation_kind_detail`
--
ALTER TABLE `donation_kind_detail`
  ADD CONSTRAINT `donation_kind_detail_ibfk_1` FOREIGN KEY (`donation_id`) REFERENCES `donation` (`donation_id`) ON DELETE CASCADE;

--
-- Constraints for table `employee_details`
--
ALTER TABLE `employee_details`
  ADD CONSTRAINT `employee_details_ibfk_3` FOREIGN KEY (`designation_name`) REFERENCES `designation` (`designation_name`) ON DELETE CASCADE,
  ADD CONSTRAINT `employee_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employee_details_ibfk_2` FOREIGN KEY (`department_name`) REFERENCES `department` (`department_name`) ON DELETE CASCADE;

--
-- Constraints for table `occupation`
--
ALTER TABLE `occupation`
  ADD CONSTRAINT `occupation_ibfk_5` FOREIGN KEY (`occupation_level_three_name`) REFERENCES `occupation_level_three` (`occupation_level_three_name`) ON DELETE CASCADE,
  ADD CONSTRAINT `occupation_ibfk_1` FOREIGN KEY (`occupation_organization_id`) REFERENCES `occupation_organization` (`org_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `occupation_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `occupation_ibfk_3` FOREIGN KEY (`occupation_level_one_name`) REFERENCES `occupation_level_one` (`occupation_level_one_name`) ON DELETE CASCADE,
  ADD CONSTRAINT `occupation_ibfk_4` FOREIGN KEY (`occupation_level_two_name`) REFERENCES `occupation_level_two` (`occupation_level_two_name`) ON DELETE CASCADE;

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`project_type_name`) REFERENCES `project_type` (`project_type_name`) ON DELETE CASCADE;

--
-- Constraints for table `upaay`
--
ALTER TABLE `upaay`
  ADD CONSTRAINT `upaay_ibfk_3` FOREIGN KEY (`assigned_to`) REFERENCES `user_info` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `upaay_ibfk_1` FOREIGN KEY (`baithak_id`) REFERENCES `baithak` (`baithak_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `upaay_ibfk_2` FOREIGN KEY (`token`) REFERENCES `visit_details` (`token`) ON DELETE CASCADE;

--
-- Constraints for table `user_login`
--
ALTER TABLE `user_login`
  ADD CONSTRAINT `user_login_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `visit_details`
--
ALTER TABLE `visit_details`
  ADD CONSTRAINT `visit_details_ibfk_4` FOREIGN KEY (`donation_id`) REFERENCES `donation` (`donation_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `visit_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `visit_details_ibfk_2` FOREIGN KEY (`purpose`) REFERENCES `purpose` (`purpose_name`) ON DELETE CASCADE,
  ADD CONSTRAINT `visit_details_ibfk_3` FOREIGN KEY (`upaay_id`) REFERENCES `upaay` (`upaay_id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
