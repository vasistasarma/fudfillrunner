-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2015 at 03:42 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `address_book`
--

CREATE TABLE IF NOT EXISTS `address_book` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `cust_id` bigint(20) NOT NULL,
  `runner_id` bigint(20) NOT NULL,
  `route_id` bigint(20) NOT NULL,
  `cust_address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `address_lat` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address_lng` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=51 ;

--
-- Dumping data for table `address_book`
--

INSERT INTO `address_book` (`id`, `cust_id`, `runner_id`, `route_id`, `cust_address`, `address_lat`, `address_lng`, `created_by`, `created_on`, `updated_by`, `updated_on`) VALUES
(1, 1, 0, 0, 'Ashok Nagar, Chennai, Tamil Nadu, India', '13.0373794', '80.21228210000004', 'balakrishnan', '2015-01-14 17:12:25', 'bala', '2015-01-14 16:12:25'),
(2, 1, 0, 0, 'Saidapet, Chennai, Tamil Nadu, India', '13.0223651', '80.2195256', 'balakrishnan', '2015-01-14 17:12:25', 'manoj', '2015-01-14 16:12:25'),
(3, 3, 0, 0, 'Ramapuram, Tamil Nadu, India', '13.0178351', '80.1541618', 'balakrishnan', '2015-01-14 17:16:32', 'vigraman', '2015-01-14 16:16:32'),
(4, 4, 0, 0, 'Guindy, Chennai, Tamil Nadu, India', '13.0102387', '80.21564779999994', 'balakrishnan', '2015-01-14 17:16:32', 'arumugam', '2015-01-14 16:16:32'),
(5, 5, 0, 0, 'Saidapet, Chennai, Tamil Nadu, India', '13.0223651', '80.2195256', 'balakrishnan', '2015-01-14 17:21:04', 'manoj', '2015-01-14 16:21:04'),
(6, 6, 0, 0, 'Ashok Nagar, Chennai, Tamil Nadu, India', '13.0373794', '80.21228210000004', 'balakrishnan', '2015-01-14 17:21:04', 'bala', '2015-01-14 16:21:04'),
(7, 1, 0, 0, 'Ashok Nagar, Chennai, Tamil Nadu, India', '13.0373794', '80.21228210000004', 'balakrishnan', '2015-01-14 17:25:05', 'bala', '2015-01-14 16:25:05'),
(8, 2, 0, 0, 'Guindy, Chennai, Tamil Nadu, India', '13.0102387', '80.21564779999994', 'balakrishnan', '2015-01-14 17:25:05', 'manoj', '2015-01-14 16:25:05'),
(9, 7, 0, 0, 'Vadapalani, Chennai, Tamil Nadu, India', '13.0545027', '80.21142199999997', 'balakrishnan', '2015-01-14 17:25:42', 'tamil', '2015-01-14 16:25:42'),
(10, 8, 0, 0, 'Ramapuram, Tamil Nadu, India', '13.0178351', '80.1541618', 'balakrishnan', '2015-01-14 17:25:42', 'vigraman', '2015-01-14 16:25:42'),
(11, 3, 0, 0, 'Ramapuram, Tamil Nadu, India', '13.0178351', '80.1541618', 'balakrishnan', '2015-01-14 17:27:24', 'vigraman', '2015-01-14 16:27:24'),
(12, 9, 0, 0, 'Ashok Nagar, Chennai, Tamil Nadu, India', '13.0373794', '80.21228210000004', 'balakrishnan', '2015-01-14 17:27:24', 'tamil', '2015-01-14 16:27:24'),
(13, 1, 0, 0, 'Ashok Nagar, Chennai, Tamil Nadu, India', '13.0373794', '80.21228210000004', 'balakrishnan', '2015-01-14 17:29:41', 'bala', '2015-01-14 16:29:41'),
(14, 10, 0, 0, 'KK Nagar, Chennai, Tamil Nadu, India', '13.0409971', '80.19942859999992', 'balakrishnan', '2015-01-14 17:29:41', 'sathish', '2015-01-14 16:29:41'),
(15, 11, 0, 0, 'Ashok Nagar, Chennai, Tamil Nadu, India', '13.0373794', '13.0373794', 'balakrishnan', '2015-01-17 18:40:20', '', '2015-01-17 17:40:20'),
(16, 11, 0, 0, 'Saidapet, Chennai, Tamil Nadu, India', '13.0223651', '13.0223651', 'balakrishnan', '2015-01-17 18:40:20', '', '2015-01-17 17:40:20'),
(17, 11, 0, 0, 'Guindy, Chennai, Tamil Nadu, India', '13.0102387', '13.0102387', 'balakrishnan', '2015-01-17 18:40:20', '', '2015-01-17 17:40:20'),
(18, 11, 0, 0, 'Ashok Nagar, Chennai, Tamil Nadu, India', '13.0373794', '13.0373794', 'balakrishnan', '2015-01-17 18:44:05', '', '2015-01-17 17:44:05'),
(19, 11, 0, 0, 'Saidapet, Chennai, Tamil Nadu, India', '13.0223651', '13.0223651', 'balakrishnan', '2015-01-17 18:44:06', '', '2015-01-17 17:44:06'),
(20, 11, 0, 0, 'Guindy, Chennai, Tamil Nadu, India', '13.0102387', '13.0102387', 'balakrishnan', '2015-01-17 18:44:06', '', '2015-01-17 17:44:06'),
(21, 11, 0, 0, 'Ramapuram, Tamil Nadu, India', '13.0178351', '13.0178351', 'balakrishnan', '2015-01-17 18:44:06', '', '2015-01-17 17:44:06'),
(22, 1, 0, 0, 'Ashok Nagar, Chennai, Tamil Nadu, India', '13.0373794', '13.0373794', 'balakrishnan', '2015-01-17 18:52:23', 'bala', '2015-01-17 17:52:23'),
(23, 2, 0, 0, 'Saidapet, Chennai, Tamil Nadu, India', '13.0223651', '13.0223651', 'balakrishnan', '2015-01-17 18:52:23', 'manoj', '2015-01-17 17:52:23'),
(24, 11, 0, 0, 'Guindy, Chennai, Tamil Nadu, India', '13.0102387', '13.0102387', 'balakrishnan', '2015-01-17 18:52:23', '', '2015-01-17 17:52:23'),
(25, 11, 0, 0, 'Ashok Nagar, Chennai, Tamil Nadu, India', '13.0373794', '13.0373794', 'balakrishnan', '2015-01-17 18:54:03', '', '2015-01-17 17:54:03'),
(26, 11, 0, 0, 'Saidapet, Chennai, Tamil Nadu, India', '13.0223651', '13.0223651', 'balakrishnan', '2015-01-17 18:54:03', '', '2015-01-17 17:54:03'),
(27, 11, 0, 0, 'Guindy, Chennai, Tamil Nadu, India', '13.0102387', '13.0102387', 'balakrishnan', '2015-01-17 18:54:03', '', '2015-01-17 17:54:03'),
(28, 11, 0, 0, 'Ramapuram, Tamil Nadu, India', '13.0178351', '13.0178351', 'balakrishnan', '2015-01-17 18:54:03', '', '2015-01-17 17:54:03'),
(29, 11, 0, 0, 'Ashok Nagar, Chennai, Tamil Nadu, India', '13.0373794', '13.0373794', 'balakrishnan', '2015-01-17 18:59:47', '', '2015-01-17 17:59:47'),
(30, 11, 0, 0, 'Saidapet, Chennai, Tamil Nadu, India', '13.0223651', '13.0223651', 'balakrishnan', '2015-01-17 18:59:47', '', '2015-01-17 17:59:47'),
(31, 11, 0, 0, 'Guindy, Chennai, Tamil Nadu, India', '13.0102387', '13.0102387', 'balakrishnan', '2015-01-17 18:59:47', '', '2015-01-17 17:59:47'),
(32, 11, 0, 0, 'Ashok Nagar, Chennai, Tamil Nadu, India', '13.0373794', '13.0373794', 'balakrishnan', '2015-01-17 19:01:06', '', '2015-01-17 18:01:06'),
(33, 11, 0, 0, 'Saidapet, Chennai, Tamil Nadu, India', '13.0223651', '13.0223651', 'balakrishnan', '2015-01-17 19:01:06', '', '2015-01-17 18:01:06'),
(34, 11, 0, 0, 'Guindy, Chennai, Tamil Nadu, India', '13.0102387', '13.0102387', 'balakrishnan', '2015-01-17 19:01:06', '', '2015-01-17 18:01:06'),
(35, 11, 0, 0, 'Ashok Nagar, Chennai, Tamil Nadu, India', '13.0373794', '13.0373794', 'balakrishnan', '2015-01-17 19:02:39', '', '2015-01-17 18:02:39'),
(36, 11, 0, 0, 'Saidapet, Chennai, Tamil Nadu, India', '13.0223651', '13.0223651', 'balakrishnan', '2015-01-17 19:02:39', '', '2015-01-17 18:02:39'),
(37, 11, 0, 0, 'Guindy, Chennai, Tamil Nadu, India', '13.0102387', '13.0102387', 'balakrishnan', '2015-01-17 19:02:39', '', '2015-01-17 18:02:39'),
(38, 11, 0, 0, 'Ashok Nagar, Chennai, Tamil Nadu, India', '13.0373794', '80.2122821', 'balakrishnan', '2015-01-17 19:03:12', '', '2015-01-17 18:03:12'),
(39, 11, 0, 0, 'Saidapet, Chennai, Tamil Nadu, India', '13.0223651', '80.2195256', 'balakrishnan', '2015-01-17 19:03:12', '', '2015-01-17 18:03:12'),
(40, 11, 0, 0, 'Guindy, Chennai, Tamil Nadu, India', '13.0102387', '80.2156478', 'balakrishnan', '2015-01-17 19:03:12', '', '2015-01-17 18:03:12'),
(41, 1, 0, 0, 'Ashok Nagar, Chennai, Tamil Nadu, India', '13.0373794', '80.2122821', 'balakrishnan', '2015-01-23 15:08:27', 'balakrishnan', '2015-01-23 14:08:27'),
(42, 11, 0, 0, 'Guindy, Chennai, Tamil Nadu, India', '13.0102387', '80.2156478', 'balakrishnan', '2015-01-23 15:08:27', 'balakrishnan', '2015-01-23 14:08:27'),
(43, 11, 0, 0, 'Saidapet, Chennai, Tamil Nadu, India', '13.0223651', '80.2195256', 'balakrishnan', '2015-01-23 15:08:27', 'balakrishnan', '2015-01-23 14:08:27'),
(44, 1, 0, 0, 'Ashok Nagar, Chennai, Tamil Nadu, India', '13.0373794', '80.2122821', 'balakrishnan', '2015-01-23 16:05:42', 'balakrishnan', '2015-01-23 15:05:42'),
(45, 2, 0, 0, 'Saidapet, Chennai, Tamil Nadu, India', '13.0223651', '80.2195256', 'balakrishnan', '2015-01-23 16:05:42', 'balakrishnan', '2015-01-23 15:05:42'),
(46, 1, 0, 0, 'Ashok Nagar, Chennai, Tamil Nadu, India', '13.0373794', '80.2122821', 'balakrishnan', '2015-01-24 14:05:19', 'balakrishnan', '2015-01-24 13:05:19'),
(47, 2, 0, 0, 'Saidapet, Chennai, Tamil Nadu, India', '13.0223651', '80.2195256', 'balakrishnan', '2015-01-24 14:05:19', 'balakrishnan', '2015-01-24 13:05:19'),
(48, 1, 0, 0, 'Ashok Nagar, Chennai, Tamil Nadu, India', '13.0373794', '80.2122821', 'balakrishnan', '2015-01-24 14:35:57', 'balakrishnan', '2015-01-24 13:35:57'),
(49, 2, 0, 0, 'Saidapet, Chennai, Tamil Nadu, India', '13.0223651', '80.2195256', 'balakrishnan', '2015-01-24 14:35:58', 'balakrishnan', '2015-01-24 13:35:58'),
(50, 1, 0, 0, 'MGR Nagar, Nesapakkam, Chennai, Tamil Nadu 600083, India', '13.0363083', '80.2013534', 'balakrishnan', '2015-01-24 16:04:21', 'balakrishnan', '2015-01-24 15:04:21');

-- --------------------------------------------------------

--
-- Table structure for table `customer_book`
--

CREATE TABLE IF NOT EXISTS `customer_book` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `cust_fname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `cust_lname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `cust_address_1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cust_address_2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cust_city` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `cust_pincode` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `cust_state` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `cust_primary_contact` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `cust_secondry_contact` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `google_api_address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `customer_book`
--

INSERT INTO `customer_book` (`id`, `cust_fname`, `cust_lname`, `cust_address_1`, `cust_address_2`, `cust_city`, `cust_pincode`, `cust_state`, `cust_primary_contact`, `cust_secondry_contact`, `google_api_address`, `created_by`, `created_on`, `updated_by`, `updated_on`) VALUES
(1, 'bala', '', '', '', '', '', '', '', '', 'Ashok Nagar, Chennai, Tamil Nadu, India', 'balakrishnan', '2015-01-14 17:12:25', 'balakrishnan', '2015-01-14 16:12:25'),
(2, 'manoj', '', '', '', '', '', '', '', '', 'Saidapet, Chennai, Tamil Nadu, India', 'balakrishnan', '2015-01-14 17:12:25', 'balakrishnan', '2015-01-14 16:12:25'),
(3, 'vigraman', '', '', '', '', '', '', '', '', 'Ramapuram, Tamil Nadu, India', 'balakrishnan', '2015-01-14 17:16:32', 'balakrishnan', '2015-01-14 16:16:32'),
(4, 'arumugam', '', '', '', '', '', '', '', '', 'Guindy, Chennai, Tamil Nadu, India', 'balakrishnan', '2015-01-14 17:16:32', 'balakrishnan', '2015-01-14 16:16:32'),
(5, 'manoj', '', '', '', '', '', '', '', '', 'Saidapet, Chennai, Tamil Nadu, India', 'balakrishnan', '2015-01-14 17:21:04', 'balakrishnan', '2015-01-14 16:21:04'),
(6, 'bala', '', '', '', '', '', '', '', '', 'Ashok Nagar, Chennai, Tamil Nadu, India', 'balakrishnan', '2015-01-14 17:21:04', 'balakrishnan', '2015-01-14 16:21:04'),
(7, 'tamil', '', '', '', '', '', '', '', '', 'Vadapalani, Chennai, Tamil Nadu, India', 'balakrishnan', '2015-01-14 17:25:42', 'balakrishnan', '2015-01-14 16:25:42'),
(8, 'vigraman', '', '', '', '', '', '', '', '', 'Ramapuram, Tamil Nadu, India', 'balakrishnan', '2015-01-14 17:25:42', 'balakrishnan', '2015-01-14 16:25:42'),
(9, 'tamil', '', '', '', '', '', '', '', '', 'Ashok Nagar, Chennai, Tamil Nadu, India', 'balakrishnan', '2015-01-14 17:27:24', 'balakrishnan', '2015-01-14 16:27:24'),
(10, 'sathish', '', '', '', '', '', '', '', '', 'KK Nagar, Chennai, Tamil Nadu, India', 'balakrishnan', '2015-01-14 17:29:41', 'balakrishnan', '2015-01-14 16:29:41'),
(11, '', '', '', '', '', '', '', '', '', 'Guindy, Chennai, Tamil Nadu, India', 'balakrishnan', '2015-01-23 15:08:27', 'balakrishnan', '2015-01-23 14:08:27');

-- --------------------------------------------------------

--
-- Table structure for table `planned_routes`
--

CREATE TABLE IF NOT EXISTS `planned_routes` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `runner_id` bigint(20) NOT NULL,
  `route_long_url` longtext COLLATE utf8_unicode_ci NOT NULL,
  `route_short_url` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `created_by` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `planned_routes`
--

INSERT INTO `planned_routes` (`id`, `runner_id`, `route_long_url`, `route_short_url`, `created_by`, `created_on`, `updated_by`, `updated_on`) VALUES
(2, 0, 'http://maps.google.com/maps?saddr=13.0373794,80.21228210000004&daddr=13.0223651,80.2195256+to:13.0178351,80.1541618saddr=13.0373794,13.0373794saddr=13.0223651,13.0223651saddr=13.0102387,13.0102387&t=k&z=6', 'http://maps.google.com/maps?saddr=13.0373794,80.21228210000004&daddr=13.0223651,80.2195256+to:13.0178351,80.1541618saddr=13.0373794,13.0373794saddr=13.0223651,13.0223651saddr=13.0102387,13.0102387&t=k&z=6', 'balakrishnan', '2015-01-17 18:52:23', 'balakrishnan', '2015-01-17 17:52:23'),
(3, 0, 'http://maps.google.com/maps?saddr=13.0373794,80.21228210000004&daddr=13.0223651,80.2195256+to:13.0178351,80.1541618saddr=13.0373794,13.0373794&daddr=13.0223651,13.0223651+to:13.0102387,13.0102387+to:13.0178351,13.0178351&t=k&z=6', 'http://maps.google.com/maps?saddr=13.0373794,80.21228210000004&daddr=13.0223651,80.2195256+to:13.0178351,80.1541618saddr=13.0373794,13.0373794&daddr=13.0223651,13.0223651+to:13.0102387,13.0102387+to:13.0178351,13.0178351&t=k&z=6', 'balakrishnan', '2015-01-17 18:54:03', 'balakrishnan', '2015-01-17 17:54:03'),
(4, 0, 'http://maps.google.com/maps?saddr=13.0373794,80.21228210000004&daddr=13.0223651,80.2195256+to:13.0178351,80.1541618saddr=13.0373794,13.0373794&daddr=13.0223651,13.0223651+to:13.0102387,13.0102387&t=k&z=6', 'http://maps.google.com/maps?saddr=13.0373794,80.21228210000004&daddr=13.0223651,80.2195256+to:13.0178351,80.1541618saddr=13.0373794,13.0373794&daddr=13.0223651,13.0223651+to:13.0102387,13.0102387&t=k&z=6', 'balakrishnan', '2015-01-17 18:59:47', 'balakrishnan', '2015-01-17 17:59:47'),
(5, 0, 'http://maps.google.com/maps?saddr=13.0373794,13.0373794&daddr=13.0223651,13.0223651+to:13.0102387,13.0102387&t=k&z=6', 'http://maps.google.com/maps?saddr=13.0373794,13.0373794&daddr=13.0223651,13.0223651+to:13.0102387,13.0102387&t=k&z=6', 'balakrishnan', '2015-01-17 19:01:06', 'balakrishnan', '2015-01-17 18:01:06'),
(6, 0, 'http://maps.google.com/maps?saddr=13.0373794,13.0373794&daddr=13.0223651,13.0223651+to:13.0102387,13.0102387&t=k&z=6', 'http://maps.google.com/maps?saddr=13.0373794,13.0373794&daddr=13.0223651,13.0223651+to:13.0102387,13.0102387&t=k&z=6', 'balakrishnan', '2015-01-17 19:02:39', 'balakrishnan', '2015-01-17 18:02:39'),
(7, 1, 'http://maps.google.com/maps?saddr=13.0373794,80.2122821&daddr=13.0223651,80.2195256+to:13.0102387,80.2156478&t=m&z=12', 'http://maps.google.com/maps?saddr=13.0373794,80.2122821&daddr=13.0223651,80.2195256+to:13.0102387,80.2156478&t=k&z=6', 'balakrishnan', '2015-01-17 19:03:12', 'balakrishnan', '2015-01-24 13:12:43'),
(8, 0, 'http://maps.google.com/maps?saddr=13.0373794,80.2122821&daddr=13.0102387,80.2156478+to:13.0223651,80.2195256&t=k&z=10', 'http://maps.google.com/maps?saddr=13.0373794,80.2122821&daddr=13.0102387,80.2156478+to:13.0223651,80.2195256&t=k&z=10', 'balakrishnan', '2015-01-23 15:08:27', 'balakrishnan', '2015-01-23 14:08:27'),
(9, 0, 'http://maps.google.com/maps?saddr=13.0373794,80.2122821&daddr=13.0223651,80.2195256&t=k&z=10', 'http://maps.google.com/maps?saddr=13.0373794,80.2122821&daddr=13.0223651,80.2195256&t=k&z=10', 'balakrishnan', '2015-01-23 16:05:42', 'balakrishnan', '2015-01-23 15:05:42'),
(10, 0, 'http://maps.google.com/maps?saddr=13.0373794,80.2122821+to:13.0223651,80.2195256&t=k&z=10', 'http://maps.google.com/maps?saddr=13.0373794,80.2122821+to:13.0223651,80.2195256&t=k&z=10', 'balakrishnan', '2015-01-24 14:05:19', 'balakrishnan', '2015-01-24 13:05:19'),
(11, 0, 'http://maps.google.com/maps?saddr=13.0373794,80.2122821+to:13.0223651,80.2195256&t=m&z=15', 'http://maps.google.com/maps?saddr=13.0373794,80.2122821+to:13.0223651,80.2195256&t=m&z=15', 'balakrishnan', '2015-01-24 14:35:58', 'balakrishnan', '2015-01-24 13:35:58'),
(12, 0, 'http://maps.google.com/maps?saddr=13.0363083,80.2013534&t=m&z=15', 'http://maps.google.com/maps?saddr=13.0363083,80.2013534&t=m&z=15', 'balakrishnan', '2015-01-24 16:04:21', 'balakrishnan', '2015-01-24 15:04:21');

-- --------------------------------------------------------

--
-- Table structure for table `route_details`
--

CREATE TABLE IF NOT EXISTS `route_details` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `customer_id` bigint(20) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `runner_id` bigint(20) NOT NULL,
  `route_address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `route_lat` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `route_lng` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `delivery_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=37 ;

--
-- Dumping data for table `route_details`
--

INSERT INTO `route_details` (`id`, `customer_id`, `order_id`, `runner_id`, `route_address`, `route_lat`, `route_lng`, `delivery_status`, `created_on`, `created_by`, `updated_on`, `updated_by`) VALUES
(1, 11, 0, 0, 'Ashok Nagar, Chennai, Tamil Nadu, India', '13.0373794', '13.0373794', '', '0000-00-00 00:00:00', '2015-01-17 18:40:20', '0000-00-00 00:00:00', '2015-01-17 23:10:20'),
(2, 11, 0, 0, 'Saidapet, Chennai, Tamil Nadu, India', '13.0223651', '13.0223651', '', '0000-00-00 00:00:00', '2015-01-17 18:40:20', '0000-00-00 00:00:00', '2015-01-17 23:10:20'),
(3, 11, 0, 0, 'Guindy, Chennai, Tamil Nadu, India', '13.0102387', '13.0102387', '', '0000-00-00 00:00:00', '2015-01-17 18:40:20', '0000-00-00 00:00:00', '2015-01-17 23:10:20'),
(4, 11, 0, 0, 'Ashok Nagar, Chennai, Tamil Nadu, India', '13.0373794', '13.0373794', '', '0000-00-00 00:00:00', '2015-01-17 18:44:05', '0000-00-00 00:00:00', '2015-01-17 23:14:05'),
(5, 11, 0, 0, 'Saidapet, Chennai, Tamil Nadu, India', '13.0223651', '13.0223651', '', '0000-00-00 00:00:00', '2015-01-17 18:44:06', '0000-00-00 00:00:00', '2015-01-17 23:14:06'),
(6, 11, 0, 0, 'Guindy, Chennai, Tamil Nadu, India', '13.0102387', '13.0102387', '', '0000-00-00 00:00:00', '2015-01-17 18:44:06', '0000-00-00 00:00:00', '2015-01-17 23:14:06'),
(7, 11, 0, 0, 'Ramapuram, Tamil Nadu, India', '13.0178351', '13.0178351', '', '0000-00-00 00:00:00', '2015-01-17 18:44:06', '0000-00-00 00:00:00', '2015-01-17 23:14:06'),
(8, 1, 0, 0, 'Ashok Nagar, Chennai, Tamil Nadu, India', '13.0373794', '13.0373794', '', '0000-00-00 00:00:00', '2015-01-17 18:52:23', '0000-00-00 00:00:00', '2015-01-17 23:22:23'),
(9, 2, 0, 0, 'Saidapet, Chennai, Tamil Nadu, India', '13.0223651', '13.0223651', '', '0000-00-00 00:00:00', '2015-01-17 18:52:23', '0000-00-00 00:00:00', '2015-01-17 23:22:23'),
(10, 11, 0, 0, 'Guindy, Chennai, Tamil Nadu, India', '13.0102387', '13.0102387', '', '0000-00-00 00:00:00', '2015-01-17 18:52:23', '0000-00-00 00:00:00', '2015-01-17 23:22:23'),
(11, 11, 0, 0, 'Ashok Nagar, Chennai, Tamil Nadu, India', '13.0373794', '13.0373794', '', '0000-00-00 00:00:00', '2015-01-17 18:54:03', '0000-00-00 00:00:00', '2015-01-17 23:24:03'),
(12, 11, 0, 0, 'Saidapet, Chennai, Tamil Nadu, India', '13.0223651', '13.0223651', '', '0000-00-00 00:00:00', '2015-01-17 18:54:03', '0000-00-00 00:00:00', '2015-01-17 23:24:03'),
(13, 11, 0, 0, 'Guindy, Chennai, Tamil Nadu, India', '13.0102387', '13.0102387', '', '0000-00-00 00:00:00', '2015-01-17 18:54:03', '0000-00-00 00:00:00', '2015-01-17 23:24:03'),
(14, 11, 0, 0, 'Ramapuram, Tamil Nadu, India', '13.0178351', '13.0178351', '', '0000-00-00 00:00:00', '2015-01-17 18:54:03', '0000-00-00 00:00:00', '2015-01-17 23:24:03'),
(15, 11, 0, 0, 'Ashok Nagar, Chennai, Tamil Nadu, India', '13.0373794', '13.0373794', '', '0000-00-00 00:00:00', '2015-01-17 18:59:47', '0000-00-00 00:00:00', '2015-01-17 23:29:47'),
(16, 11, 0, 0, 'Saidapet, Chennai, Tamil Nadu, India', '13.0223651', '13.0223651', '', '0000-00-00 00:00:00', '2015-01-17 18:59:47', '0000-00-00 00:00:00', '2015-01-17 23:29:47'),
(17, 11, 0, 0, 'Guindy, Chennai, Tamil Nadu, India', '13.0102387', '13.0102387', '', '0000-00-00 00:00:00', '2015-01-17 18:59:47', '0000-00-00 00:00:00', '2015-01-17 23:29:47'),
(18, 11, 0, 0, 'Ashok Nagar, Chennai, Tamil Nadu, India', '13.0373794', '13.0373794', '', '0000-00-00 00:00:00', '2015-01-17 19:01:06', '0000-00-00 00:00:00', '2015-01-17 23:31:06'),
(19, 11, 0, 0, 'Saidapet, Chennai, Tamil Nadu, India', '13.0223651', '13.0223651', '', '0000-00-00 00:00:00', '2015-01-17 19:01:06', '0000-00-00 00:00:00', '2015-01-17 23:31:06'),
(20, 11, 0, 0, 'Guindy, Chennai, Tamil Nadu, India', '13.0102387', '13.0102387', '', '0000-00-00 00:00:00', '2015-01-17 19:01:06', '0000-00-00 00:00:00', '2015-01-17 23:31:06'),
(21, 11, 0, 0, 'Ashok Nagar, Chennai, Tamil Nadu, India', '13.0373794', '13.0373794', '', '0000-00-00 00:00:00', '2015-01-17 19:02:39', '0000-00-00 00:00:00', '2015-01-17 23:32:39'),
(22, 11, 0, 0, 'Saidapet, Chennai, Tamil Nadu, India', '13.0223651', '13.0223651', '', '0000-00-00 00:00:00', '2015-01-17 19:02:39', '0000-00-00 00:00:00', '2015-01-17 23:32:39'),
(23, 11, 0, 0, 'Guindy, Chennai, Tamil Nadu, India', '13.0102387', '13.0102387', '', '0000-00-00 00:00:00', '2015-01-17 19:02:39', '0000-00-00 00:00:00', '2015-01-17 23:32:39'),
(24, 11, 0, 0, 'Ashok Nagar, Chennai, Tamil Nadu, India', '13.0373794', '80.2122821', '', '0000-00-00 00:00:00', '2015-01-17 19:03:12', '0000-00-00 00:00:00', '2015-01-17 23:33:12'),
(25, 11, 0, 0, 'Saidapet, Chennai, Tamil Nadu, India', '13.0223651', '80.2195256', '', '0000-00-00 00:00:00', '2015-01-17 19:03:12', '0000-00-00 00:00:00', '2015-01-17 23:33:12'),
(26, 11, 0, 0, 'Guindy, Chennai, Tamil Nadu, India', '13.0102387', '80.2156478', '', '0000-00-00 00:00:00', '2015-01-17 19:03:12', '0000-00-00 00:00:00', '2015-01-17 23:33:12'),
(27, 1, 0, 0, 'Ashok Nagar, Chennai, Tamil Nadu, India', '13.0373794', '80.2122821', '', '0000-00-00 00:00:00', '2015-01-23 15:08:27', '0000-00-00 00:00:00', '2015-01-23 19:38:27'),
(28, 11, 0, 0, 'Guindy, Chennai, Tamil Nadu, India', '13.0102387', '80.2156478', '', '0000-00-00 00:00:00', '2015-01-23 15:08:27', '0000-00-00 00:00:00', '2015-01-23 19:38:27'),
(29, 11, 0, 0, 'Saidapet, Chennai, Tamil Nadu, India', '13.0223651', '80.2195256', '', '0000-00-00 00:00:00', '2015-01-23 15:08:27', '0000-00-00 00:00:00', '2015-01-23 19:38:27'),
(30, 1, 0, 0, 'Ashok Nagar, Chennai, Tamil Nadu, India', '13.0373794', '80.2122821', '', '0000-00-00 00:00:00', '2015-01-23 16:05:42', '0000-00-00 00:00:00', '2015-01-23 20:35:42'),
(31, 2, 0, 0, 'Saidapet, Chennai, Tamil Nadu, India', '13.0223651', '80.2195256', '', '0000-00-00 00:00:00', '2015-01-23 16:05:42', '0000-00-00 00:00:00', '2015-01-23 20:35:42'),
(32, 1, 0, 0, 'Ashok Nagar, Chennai, Tamil Nadu, India', '13.0373794', '80.2122821', '', '0000-00-00 00:00:00', '2015-01-24 14:05:19', '0000-00-00 00:00:00', '2015-01-24 18:35:19'),
(33, 2, 0, 0, 'Saidapet, Chennai, Tamil Nadu, India', '13.0223651', '80.2195256', '', '0000-00-00 00:00:00', '2015-01-24 14:05:19', '0000-00-00 00:00:00', '2015-01-24 18:35:19'),
(34, 1, 0, 0, 'Ashok Nagar, Chennai, Tamil Nadu, India', '13.0373794', '80.2122821', '', '0000-00-00 00:00:00', '2015-01-24 14:35:57', '0000-00-00 00:00:00', '2015-01-24 19:05:57'),
(35, 2, 0, 0, 'Saidapet, Chennai, Tamil Nadu, India', '13.0223651', '80.2195256', '', '0000-00-00 00:00:00', '2015-01-24 14:35:58', '0000-00-00 00:00:00', '2015-01-24 19:05:58'),
(36, 1, 0, 0, 'MGR Nagar, Nesapakkam, Chennai, Tamil Nadu 600083, India', '13.0363083', '80.2013534', '', '0000-00-00 00:00:00', '2015-01-24 16:04:21', '0000-00-00 00:00:00', '2015-01-24 20:34:21');

-- --------------------------------------------------------

--
-- Table structure for table `runners_tracking`
--

CREATE TABLE IF NOT EXISTS `runners_tracking` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `runner_id` bigint(20) NOT NULL,
  `runner_prof_id` bigint(20) NOT NULL,
  `runner_latest_latt` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `runner_latest_lng` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `runner_assigned_route` bigint(20) NOT NULL,
  `location_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `runners_tracking`
--

INSERT INTO `runners_tracking` (`id`, `runner_id`, `runner_prof_id`, `runner_latest_latt`, `runner_latest_lng`, `runner_assigned_route`, `location_updated_at`) VALUES
(1, 1, 1, '13.0373794', '80.2122821', 0, '2015-01-27 11:58:56'),
(2, 2, 2, '13.0223651', '80.2195256', 0, '2015-01-27 11:58:56'),
(3, 3, 3, '13.0102387', '80.2156478', 0, '2015-01-27 11:58:56'),
(4, 1, 1, '13.0373794', '80.2122821', 0, '2015-01-27 11:59:26'),
(5, 2, 2, '13.0223651', '80.2195256', 0, '2015-01-27 11:59:26'),
(6, 3, 3, '13.0102387', '80.2156478', 0, '2015-01-27 11:59:26'),
(7, 1, 1, '13.0373794', '80.2122821', 0, '2015-01-27 11:59:53'),
(8, 2, 2, '13.0223651', '80.2195256', 0, '2015-01-27 11:59:53'),
(9, 3, 3, '13.0102387', '80.2156478', 0, '2015-01-27 11:59:53'),
(10, 1, 1, '13.0373794', '80.2122821', 0, '2015-01-29 17:16:27'),
(11, 2, 2, '13.0223651', '80.2195256', 0, '2015-01-28 17:16:30'),
(12, 3, 3, '13.0102387', '80.2156478', 0, '2015-01-28 17:16:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_type` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `user_password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type`, `user_name`, `user_password`, `created_by`, `created_on`, `updated_by`, `updated_on`) VALUES
(1, 'runner', 'balakrishnan', '', 'balakrishnan', '2015-01-20 00:00:00', 'balakrishnan', '2015-01-20 15:50:28'),
(2, 'runner', 'Vasista', '', 'balakrishnan', '2015-01-24 00:00:00', 'balakrishnan', '2015-01-24 15:02:38'),
(3, 'runner', 'Sowmya', '', 'balakrishnan', '2015-01-24 00:00:00', 'balakrishnan', '2015-01-24 15:02:38');

-- --------------------------------------------------------

--
-- Table structure for table `users_personal_details`
--

CREATE TABLE IF NOT EXISTS `users_personal_details` (
  `profile_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `user_fname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_lname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_contact_no` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `user_identification` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `add_latitude` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `add_longitude` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`profile_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users_personal_details`
--

INSERT INTO `users_personal_details` (`profile_id`, `user_id`, `user_fname`, `user_lname`, `user_address`, `user_email`, `user_contact_no`, `user_identification`, `add_latitude`, `add_longitude`, `updated_on`, `updated_by`) VALUES
(1, 1, 'balakrishnan', 'raghu', 'MGR Nagar, Nesapakkam, Chennai, Tamil Nadu 600083, India', 'bala2920@gmail.com', '9789076350', '', '13.0363083', '80.2013534', '2015-01-24 15:06:19', 'balakrishnan'),
(2, 2, 'vasista', '', '', 'vasista@gmail.com', '', '', '', '', '2015-01-24 15:07:08', ''),
(3, 3, 'Sowmya', 'Vedula', '', 'sowmya@gmail.com', '', '', '', '', '2015-01-24 15:07:17', '');

-- --------------------------------------------------------

--
-- Table structure for table `users_sample`
--

CREATE TABLE IF NOT EXISTS `users_sample` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_type` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `user_password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_fname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_lname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_contact_number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address_1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `adddress_2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pincode` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `licence_details` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_type_master`
--

CREATE TABLE IF NOT EXISTS `user_type_master` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_by` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_type_master`
--

INSERT INTO `user_type_master` (`id`, `user_type`, `status`, `created_by`, `created_on`, `updated_by`, `updated_on`) VALUES
(1, 'customer', 1, 'balakrishnan', '2015-01-13 00:00:00', 'balakrishnan', '2015-01-13 18:53:54'),
(2, 'runner', 1, 'balakrishnan', '2015-01-13 00:00:00', 'balakrishnan', '2015-01-13 18:53:54');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
