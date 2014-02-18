-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 04, 2014 at 04:45 PM
-- Server version: 5.5.35-MariaDB-log
-- PHP Version: 5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `simplewo`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `UID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `last_name` varchar(128) NOT NULL,
  `first_name` varchar(128) NOT NULL,
  `street_address` varchar(128) NOT NULL,
  `unit_number` varchar(128) DEFAULT NULL,
  `city` varchar(128) NOT NULL,
  `state` varchar(20) NOT NULL,
  `zip_code` varchar(128) NOT NULL,
  `geocode` varchar(128) NOT NULL,
  `primary_phone` varchar(20) NOT NULL,
  `secondary_phone` varchar(20) DEFAULT NULL,
  `additional_info` varchar(8000) DEFAULT NULL COMMENT 'care giver info, knock, ring, driving instructions etc',
  PRIMARY KEY (`UID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE IF NOT EXISTS `notes` (
  `UID` int(10) NOT NULL AUTO_INCREMENT,
  `creator_id` int(10) unsigned NOT NULL,
  `user_id_assoc` int(10) unsigned DEFAULT NULL,
  `client_id_assoc` int(10) unsigned DEFAULT NULL,
  `wo_id_assoc` int(10) unsigned DEFAULT NULL,
  `note_content` varchar(8000) NOT NULL,
  `created_on` datetime NOT NULL,
  `modified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`UID`),
  KEY `creator_id` (`creator_id`),
  KEY `user_id_assoc` (`user_id_assoc`),
  KEY `client_id_assoc` (`client_id_assoc`),
  KEY `wo_id_assoc` (`wo_id_assoc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `UID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `user_type` varchar(20) NOT NULL COMMENT 'admin or worker/volunteer',
  `email` varchar(254) NOT NULL,
  `street_address` varchar(128) DEFAULT NULL,
  `city` varchar(128) DEFAULT NULL,
  `state` varchar(20) DEFAULT NULL,
  `zip_code` varchar(20) DEFAULT NULL,
  `primary_phone` varchar(20) DEFAULT NULL,
  `secondary_phone` varchar(20) DEFAULT NULL,
  `specialty` varchar(128) DEFAULT NULL COMMENT 'electrician, plumber, etc. May turn into a table',
  `active` varchar(20) NOT NULL,
  PRIMARY KEY (`UID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `work_order`
--

CREATE TABLE IF NOT EXISTS `work_order` (
  `UID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_by` int(11) unsigned NOT NULL,
  `modified_by` int(11) unsigned NOT NULL,
  `assigned_to` int(11) unsigned DEFAULT NULL,
  `completed_by` int(11) unsigned DEFAULT NULL,
  `client_requesting` int(11) unsigned NOT NULL,
  `additional_info` varchar(8000) DEFAULT NULL,
  `job_type` varchar(128) NOT NULL,
  `created_on` datetime NOT NULL,
  `modified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`UID`),
  KEY `created_by` (`created_by`),
  KEY `modified_by` (`modified_by`),
  KEY `assigned_to` (`assigned_to`),
  KEY `completed_by` (`completed_by`),
  KEY `client_requesting` (`client_requesting`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_ibfk_4` FOREIGN KEY (`wo_id_assoc`) REFERENCES `work_order` (`UID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`creator_id`) REFERENCES `users` (`UID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `notes_ibfk_2` FOREIGN KEY (`user_id_assoc`) REFERENCES `users` (`UID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `notes_ibfk_3` FOREIGN KEY (`client_id_assoc`) REFERENCES `client` (`UID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `work_order`
--
ALTER TABLE `work_order`
  ADD CONSTRAINT `work_order_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`UID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `work_order_ibfk_2` FOREIGN KEY (`modified_by`) REFERENCES `users` (`UID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `work_order_ibfk_3` FOREIGN KEY (`assigned_to`) REFERENCES `users` (`UID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `work_order_ibfk_4` FOREIGN KEY (`completed_by`) REFERENCES `users` (`UID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `work_order_ibfk_5` FOREIGN KEY (`client_requesting`) REFERENCES `client` (`UID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;