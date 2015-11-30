-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 03, 2013 at 08:21 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_info_store`
--
CREATE DATABASE IF NOT EXISTS `db_info_store` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db_info_store`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`aid`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `name`, `username`, `email`, `password`) VALUES
(1, 'a', 'a', 'a@a.com', '0cc175b9c0f1b6a831c399e269772661'),
(2, 'b', 'b', 'b@b.com', '92eb5ffee6ae2fec3ad71c777531578f'),
(3, 'c', 'c', 'c@c.com', '4a8a08f09d37b73795649038408b5f33'),
(4, 'x', 'x', 'x@x.com', '9dd4e461268c8034f5c8564e155c67a6'),
(5, 'qq', 'q', 'q@q.com', '7694f4a66316e53c8cdd9d9954bd611d'),
(6, 'Administrator', 'admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3'),
(7, 'g', 'g', 'g@g.com', 'b2f5ff47436671b6e533d8dc3614845d');

-- --------------------------------------------------------

--
-- Table structure for table `istore`
--

CREATE TABLE IF NOT EXISTS `istore` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `present_address` text NOT NULL,
  `permanent_address` text NOT NULL,
  `city` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  PRIMARY KEY (`sid`),
  UNIQUE KEY `email_address` (`email_address`),
  UNIQUE KEY `mobile` (`mobile`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `istore`
--

INSERT INTO `istore` (`sid`, `first_name`, `last_name`, `email_address`, `present_address`, `permanent_address`, `city`, `country`, `zip_code`, `mobile`) VALUES
(1, 'a', 'a', 'a@a.com', 'a', 'a', 'a', 'Bangladesh', 'a', 'a'),
(4, 'w', 'w', 'w@w.com', 'w', 'w', 'w', 'Pakistan', 'w', 'w'),
(5, 'x', 'x', 'x@x.com', 'x', 'x', 'x', 'Soudi Arab', 'x', 'x'),
(6, 'e', 'e', 'e@e.com', 'e', 'e', 'e', 'Ireland', 'e', 'e');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
