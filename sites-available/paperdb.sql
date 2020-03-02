-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2018 at 12:33 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paperdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `id` int(11) NOT NULL,
  `area_name` varchar(255) NOT NULL,
  `area_code` varchar(255) NOT NULL,
  `route_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('y','n') NOT NULL DEFAULT 'y',
  `parent_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`id`, `area_name`, `area_code`, `route_id`, `created`, `modified`, `status`, `parent_user_id`) VALUES
(4, 'Bus Stand', 'BS', 5, '2018-04-26 02:53:34', '2018-04-26 02:53:34', 'y', 29),
(5, 'Gandhi School', 'GS', 5, '2018-04-26 02:53:52', '2018-04-26 02:53:52', 'y', 29),
(6, 'Loha', 'Loha', 6, '2018-04-26 02:54:05', '2018-04-26 02:54:05', 'y', 29),
(7, 'Padhihara', 'Padhihara', 6, '2018-04-26 02:54:35', '2018-04-26 02:54:35', 'y', 29),
(8, 'Gali no 4', 'gali4', 8, '2018-05-08 15:43:40', '2018-05-08 15:43:40', 'y', 32),
(9, 'gali no 5', 'gali5', 8, '2018-05-08 15:43:57', '2018-05-08 15:43:57', 'y', 32),
(10, 'Sabhi Mandi', 'SM', 9, '2018-05-13 06:34:33', '2018-05-13 06:34:33', 'y', 36),
(11, 'Bus stand', 'BS', 9, '2018-05-13 06:34:45', '2018-05-13 06:34:45', 'y', 36);

-- --------------------------------------------------------

--
-- Table structure for table `bill_month`
--

CREATE TABLE `bill_month` (
  `id` int(11) NOT NULL,
  `bill_start_date` date NOT NULL,
  `bill_end_date` date NOT NULL,
  `bill_month` int(11) NOT NULL,
  `bill_year` int(11) NOT NULL,
  `bill_amount` float NOT NULL,
  `billing_user` int(11) NOT NULL,
  `speific_user_id` int(11) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('y','n') NOT NULL DEFAULT 'y',
  `parent_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bill_month`
--

INSERT INTO `bill_month` (`id`, `bill_start_date`, `bill_end_date`, `bill_month`, `bill_year`, `bill_amount`, `billing_user`, `speific_user_id`, `created`, `status`, `parent_user_id`) VALUES
(4, '2018-05-01', '2018-05-31', 5, 2018, 272, 1, 0, '2018-05-13 07:24:21', 'y', 36);

-- --------------------------------------------------------

--
-- Table structure for table `bill_product`
--

CREATE TABLE `bill_product` (
  `id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` float NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_copies` int(11) NOT NULL,
  `bill_month` datetime NOT NULL,
  `billmonth` int(11) NOT NULL,
  `billyear` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `parent_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bill_product`
--

INSERT INTO `bill_product` (`id`, `bill_id`, `user_id`, `product_id`, `product_name`, `product_price`, `product_code`, `product_copies`, `bill_month`, `billmonth`, `billyear`, `created`, `parent_user_id`) VALUES
(1, 1, 35, 18, 'Patrika', 154, 'patrika', 1, '2018-05-31 00:00:00', 5, 2018, '2018-05-13 06:29:23', 29),
(2, 2, 35, 18, 'Patrika', 154, 'patrika', 1, '2018-05-31 00:00:00', 5, 2018, '2018-05-13 06:31:18', 29),
(3, 3, 28, 23, 'patrika', 96, 'PB', 1, '2018-05-31 00:00:00', 5, 2018, '2018-05-13 06:31:19', 29),
(4, 4, 35, 18, 'Patrika', 154, 'patrika', 1, '2018-05-31 00:00:00', 5, 2018, '2018-05-13 06:32:23', 29),
(5, 5, 35, 18, 'Patrika', 154, 'patrika', 1, '2018-05-31 00:00:00', 5, 2018, '2018-05-13 06:32:33', 29),
(6, 6, 28, 23, 'patrika', 96, 'PB', 1, '2018-05-31 00:00:00', 5, 2018, '2018-05-13 06:32:33', 29),
(7, 7, 37, 24, 'Bhaskar', 137, 'BS', 1, '2018-05-31 00:00:00', 5, 2018, '2018-05-13 06:38:57', 36),
(8, 8, 37, 24, 'Bhaskar', 137, 'BS', 1, '2018-05-31 00:00:00', 5, 2018, '2018-05-13 06:53:42', 36),
(15, 11, 38, 24, 'Bhaskar', 137, 'BS', 1, '2018-05-31 00:00:00', 5, 2018, '2018-05-13 07:24:21', 36),
(16, 11, 38, 25, 'Nav Jyoti', 135, 'NV', 1, '2018-05-31 00:00:00', 5, 2018, '2018-05-13 07:24:21', 36);

-- --------------------------------------------------------

--
-- Table structure for table `cash_memo`
--

CREATE TABLE `cash_memo` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_code` varchar(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cash_amount` float NOT NULL,
  `entry_date` datetime NOT NULL,
  `entry_utc` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `parent_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cash_memo`
--

INSERT INTO `cash_memo` (`id`, `user_name`, `user_code`, `user_id`, `cash_amount`, `entry_date`, `entry_utc`, `created`, `parent_user_id`) VALUES
(1, 'Mayank upadhyay ', 'RIBS26', 26, 150, '2018-05-06 00:00:00', '1525564800', '2018-05-06 09:40:36', 29),
(2, 'Surya prakash ', 'ROL27', 27, 50, '2018-05-06 00:00:00', '1525564800', '2018-05-06 09:40:36', 29),
(3, 'mayank ', 'JGN533', 33, 50, '2018-05-09 00:00:00', '1525824000', '2018-05-08 16:40:43', 32),
(4, 'Pooja upadhyay ', 'SSM37', 37, 100, '2018-06-01 00:00:00', '1527811200', '2018-05-13 06:45:46', 36);

-- --------------------------------------------------------

--
-- Table structure for table `prices_daily`
--

CREATE TABLE `prices_daily` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `sun` float NOT NULL,
  `mon` float NOT NULL,
  `tue` float NOT NULL,
  `wed` float NOT NULL,
  `thu` float NOT NULL,
  `fri` float NOT NULL,
  `sat` float NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('y','n') NOT NULL DEFAULT 'y',
  `parent_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prices_daily`
--

INSERT INTO `prices_daily` (`id`, `product_id`, `sun`, `mon`, `tue`, `wed`, `thu`, `fri`, `sat`, `created`, `modified`, `status`, `parent_user_id`) VALUES
(2, 18, 6, 5, 5, 5, 5, 5, 5, '2018-05-04 16:50:15', '2018-05-04 16:50:15', 'y', 0),
(3, 19, 5, 4, 4, 4, 4, 4, 4, '2018-05-04 16:50:42', '2018-05-04 16:50:42', 'y', 0),
(4, 20, 8, 7, 4, 5, 8, 8, 8, '2018-05-06 12:01:53', '2018-05-06 12:01:53', 'y', 29),
(5, 22, 5, 4, 4, 4, 4, 4, 4, '2018-05-08 15:46:53', '2018-05-08 15:46:53', 'y', 32),
(6, 23, 4, 4, 3.5, 4, 3.5, 3.5, 3.5, '2018-05-08 16:06:39', '2018-05-08 16:06:39', 'y', 32),
(7, 24, 5, 4.5, 4.5, 4.5, 4.5, 4.5, 4.5, '2018-05-13 06:35:16', '2018-05-13 06:35:16', 'y', 36),
(8, 25, 5, 4, 4.5, 4.5, 4.5, 4.5, 4.5, '2018-05-13 06:51:50', '2018-05-13 06:51:50', 'y', 36);

-- --------------------------------------------------------

--
-- Table structure for table `prices_montly`
--

CREATE TABLE `prices_montly` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `jan` float NOT NULL,
  `feb` float NOT NULL,
  `march` float NOT NULL,
  `april` float NOT NULL,
  `may` float NOT NULL,
  `june` float NOT NULL,
  `july` float NOT NULL,
  `aug` float NOT NULL,
  `sept` float NOT NULL,
  `oct` float NOT NULL,
  `nov` float NOT NULL,
  `december` float NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `states` enum('y','n') NOT NULL DEFAULT 'y',
  `parent_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `print_plan`
--

CREATE TABLE `print_plan` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `route_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `seq_no` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('y','n') NOT NULL DEFAULT 'y',
  `parent_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `print_plan`
--

INSERT INTO `print_plan` (`id`, `user_id`, `route_id`, `area_id`, `seq_no`, `created`, `modified`, `status`, `parent_user_id`) VALUES
(1, 31, 6, 6, 1, '2018-05-06 13:03:17', '2018-05-06 13:03:17', 'y', 0),
(2, 28, 5, 4, 2, '2018-05-04 16:57:11', '2018-05-04 16:57:11', 'y', 0),
(3, 26, 5, 4, 3, '2018-05-04 16:52:35', '2018-05-04 16:52:35', 'y', 0),
(4, 27, 6, 6, 4, '2018-05-04 16:54:01', '2018-05-04 16:54:01', 'y', 0),
(5, 30, 5, 4, 5, '2018-05-05 17:28:48', '2018-05-05 17:28:48', 'y', 0),
(6, 33, 8, 9, 6, '2018-05-08 15:52:59', '2018-05-08 15:52:59', 'y', 32),
(7, 35, 5, 4, 7, '2018-05-13 06:16:31', '2018-05-13 06:16:31', 'y', 29),
(8, 37, 9, 11, 1, '2018-05-08 15:52:59', '2018-05-08 15:52:59', 'y', 36),
(9, 38, 9, 11, 2, '2018-05-13 06:52:40', '2018-05-13 06:52:40', 'y', 36);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `price_type` varchar(255) NOT NULL,
  `joining_date` datetime DEFAULT NULL,
  `fix_price` float NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('y','n') NOT NULL DEFAULT 'y',
  `parent_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_code`, `price_type`, `joining_date`, `fix_price`, `created`, `modified`, `status`, `parent_user_id`) VALUES
(18, 'Patrika', 'patrika', 'daily', '2018-05-12 00:00:00', 0, '2018-05-04 16:50:15', '2018-05-04 16:50:15', 'y', 29),
(19, 'Nav Jyoti', 'NJYoti', 'daily', NULL, 0, '2018-05-04 16:50:42', '2018-05-04 16:50:42', 'y', 29),
(20, 'young Bhaskar', 'YB', 'daily', '2018-05-26 00:00:00', 0, '2018-05-06 12:01:53', '2018-05-06 12:01:53', 'y', 29),
(22, 'Danik bhaskar', 'DB', 'daily', '2018-05-04 00:00:00', 0, '2018-05-08 15:46:52', '2018-05-08 15:46:52', 'y', 32),
(23, 'patrika', 'PB', 'daily', '2018-05-03 00:00:00', 0, '2018-05-08 16:06:39', '2018-05-08 16:06:39', 'y', 32),
(24, 'Bhaskar', 'BS', 'daily', NULL, 0, '2018-05-13 06:35:15', '2018-05-13 06:35:15', 'y', 36),
(25, 'Nav Jyoti', 'NV', 'daily', NULL, 0, '2018-05-13 06:51:50', '2018-05-13 06:51:50', 'y', 36);

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `id` int(11) NOT NULL,
  `route_name` varchar(255) NOT NULL,
  `route_code` varchar(255) NOT NULL,
  `delivery_charge` float NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('y','n') NOT NULL DEFAULT 'y',
  `parent_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`id`, `route_name`, `route_code`, `delivery_charge`, `created`, `modified`, `status`, `parent_user_id`) VALUES
(5, 'Ratangarh inner', 'RI', 0, '2018-04-26 02:52:57', '2018-04-26 02:52:57', 'y', 29),
(6, 'Ratangarh Outter', 'RO', 30, '2018-04-26 02:53:12', '2018-04-26 02:53:12', 'y', 29),
(7, 'Ratangrah City', 'RC', 0, '2018-05-06 11:56:17', '2018-05-06 11:56:17', 'y', 30),
(8, 'jaswantgarh', 'jsh', 0, '2018-05-08 15:43:11', '2018-05-08 15:43:11', 'y', 32),
(9, 'Sujangarh', 'SJ', 0, '2018-05-13 06:34:00', '2018-05-13 06:34:00', 'y', 36),
(10, 'Sujangahr outer', 'SO', 50, '2018-05-13 06:34:18', '2018-05-13 06:34:18', 'y', 36);

-- --------------------------------------------------------

--
-- Table structure for table `routeplan`
--

CREATE TABLE `routeplan` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `route_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `seq_no` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('y','n') NOT NULL DEFAULT 'y',
  `parent_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `routeplan`
--

INSERT INTO `routeplan` (`id`, `user_id`, `route_id`, `area_id`, `seq_no`, `created`, `modified`, `status`, `parent_user_id`) VALUES
(1, 35, 5, 4, 1, '2018-05-13 06:16:31', '2018-05-13 06:16:31', 'y', 0),
(2, 31, 6, 6, 2, '2018-05-06 13:03:17', '2018-05-06 13:03:17', 'y', 0),
(3, 28, 5, 4, 3, '2018-05-04 16:57:11', '2018-05-04 16:57:11', 'y', 0),
(7, 26, 5, 4, 4, '2018-05-04 16:52:34', '2018-05-04 16:52:34', 'y', 0),
(8, 27, 6, 6, 5, '2018-05-04 16:54:01', '2018-05-04 16:54:01', 'y', 0),
(9, 30, 5, 4, 6, '2018-05-05 17:28:48', '2018-05-05 17:28:48', 'y', 0),
(10, 33, 8, 9, 7, '2018-05-08 15:52:59', '2018-05-08 15:52:59', 'y', 32),
(11, 38, 9, 11, 8, '2018-05-13 06:52:39', '2018-05-13 06:52:39', 'y', 36);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_code` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `parent_user_id` int(11) NOT NULL,
  `route_id` int(11) NOT NULL,
  `area_id` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `dob` datetime DEFAULT NULL,
  `extra_phoneno` varchar(255) NOT NULL,
  `adhar_no` varchar(50) NOT NULL,
  `pan_no` varchar(50) NOT NULL,
  `join_date` datetime DEFAULT NULL,
  `balance` float NOT NULL,
  `balance_states` enum('adv','outstanding') NOT NULL DEFAULT 'outstanding',
  `working_type` varchar(255) NOT NULL,
  `fix_working_days` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_utc` varchar(255) NOT NULL,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('active','inactive','block') NOT NULL DEFAULT 'active',
  `activation_date` varchar(255) NOT NULL,
  `expire_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_code`, `name`, `mobile`, `email`, `password`, `role_id`, `parent_user_id`, `route_id`, `area_id`, `address`, `dob`, `extra_phoneno`, `adhar_no`, `pan_no`, `join_date`, `balance`, `balance_states`, `working_type`, `fix_working_days`, `created`, `created_utc`, `modified`, `status`, `activation_date`, `expire_date`) VALUES
(25, 'GEETPX', 'Raju', '9875747474', '', '', 3, 29, 5, '4,5', '', NULL, '', '', '', NULL, 0, 'outstanding', '', 0, '2018-05-04 16:51:10', '', '2018-05-04 16:51:10', 'active', '', ''),
(26, 'RIBS26', 'Mayank upadhyay', '9001025477', 'mayank@gmail.in', '', 1, 29, 5, '4', 'Near Bus Stand', NULL, '', 'ASS', 'ACKPU', '2018-01-11 00:00:00', 50, 'adv', 'select', 0, '2018-05-04 16:52:34', '1525392000', '2018-05-04 16:52:34', 'active', '', ''),
(27, 'ROL27', 'Surya prakash', '9024282477', 'suryalicjsh@gmail.com', '', 1, 29, 6, '6', '', NULL, '', '', '', NULL, 500, 'outstanding', 'select', 0, '2018-05-04 16:54:00', '1525392000', '2018-05-04 16:54:00', 'active', '', ''),
(28, 'RIBS28', 'Gauri shankar', '9887274568', '', '', 1, 29, 5, '4', 'Near Miku house ', NULL, '', '', 'Adkss', NULL, 100, 'outstanding', 'select', 0, '2018-05-04 16:57:11', '1525392000', '2018-05-04 16:57:11', 'active', '', ''),
(29, 'admin', 'admin', 'admin', 'admin', '31874e950462d436908109bcf8ec6609aa75a149', 2, 0, 5, '4,5', '', NULL, '', '', '', NULL, 0, 'outstanding', '', 0, '2018-05-04 16:51:10', '', '2018-05-04 16:51:10', 'active', '', '1590883200'),
(30, 'CRO23', 'Mohit', '9414203146', 'mohit', '', 1, 29, 5, '4', '', NULL, '', '', '', '2018-05-25 00:00:00', 50, 'outstanding', '', 0, '2018-05-05 17:28:47', '1525478400', '2018-05-05 17:28:47', 'active', '', ''),
(31, 'ROL31', 'Ronak', '98585858747', 'ronak@gmail.com', '', 1, 29, 6, '6', '', NULL, '', '', '', NULL, 500, 'outstanding', 'select', 0, '2018-05-06 13:03:16', '1525564800', '2018-05-06 13:03:16', 'active', '', ''),
(32, 'sushil bhaskar', 'bhaskar', 'bhaskar', 'bhaskar', '31874e950462d436908109bcf8ec6609aa75a149', 2, 0, 5, '4,5', '', NULL, '', '', '', NULL, 0, 'outstanding', '', 0, '2018-05-04 16:51:10', '', '2018-05-04 16:51:10', 'active', '', '1590883200'),
(33, 'JGN533', 'mayank', '9001025477', '', '', 1, 32, 8, '9', '', NULL, '', '', '', '2018-05-08 00:00:00', 50, 'outstanding', '', 0, '2018-05-08 15:52:59', '1525737600', '2018-05-08 15:52:59', 'active', '', ''),
(34, 'GA8QTM', 'Ghan shyam', '98585855', '', '', 3, 32, 8, '8,9', '', NULL, '', '', '', NULL, 0, 'outstanding', '', 0, '2018-05-08 16:20:55', '', '2018-05-08 16:20:55', 'active', '', ''),
(35, 'RIBS35', 'pooja', '90010588477', 'pooja@gmaillcom', '', 1, 29, 5, '4', '', NULL, '', '', '', NULL, 400, 'outstanding', '', 0, '2018-05-13 06:16:30', '1526169600', '2018-05-13 06:16:30', 'active', '', ''),
(36, 'admin2', 'admin2', 'admin2', 'admin2', '31874e950462d436908109bcf8ec6609aa75a149', 2, 0, 5, '4,5', '', NULL, '', '', '', NULL, 0, 'outstanding', '', 0, '2018-05-04 16:51:10', '', '2018-05-04 16:51:10', 'active', '', '1590883200'),
(37, 'SSM37', 'Pooja upadhyay', '9001025477', 'pooja@gmail.com', '', 1, 29, 9, '10', '', NULL, '', '', '', NULL, 400, 'outstanding', '', 0, '2018-05-13 06:35:56', '1526169600', '2018-05-13 06:35:56', 'active', '', ''),
(38, 'SBS38', 'surya', '', '', '', 1, 36, 9, '11', '', NULL, '', '', '', NULL, 500, 'adv', '', 0, '2018-05-13 06:52:39', '1526169600', '2018-05-13 06:52:39', 'active', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_bill`
--

CREATE TABLE `user_bill` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bill_created` datetime NOT NULL,
  `bill_amount` float NOT NULL,
  `before_balance` float NOT NULL,
  `after_balance` float NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `reciver_id` int(11) NOT NULL,
  `payment_date` datetime NOT NULL,
  `bill_status` varchar(255) NOT NULL DEFAULT 'unpaid',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('y','n') NOT NULL DEFAULT 'y',
  `parent_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_bill`
--

INSERT INTO `user_bill` (`id`, `user_id`, `bill_created`, `bill_amount`, `before_balance`, `after_balance`, `payment_mode`, `comment`, `reciver_id`, `payment_date`, `bill_status`, `created`, `modified`, `status`, `parent_user_id`) VALUES
(1, 35, '2018-05-31 00:00:00', 154, 0, 0, '', 'monthly bill', 0, '0000-00-00 00:00:00', 'unpaid', '2018-05-13 06:29:23', '2018-05-13 06:29:23', 'y', 29),
(2, 35, '2018-05-31 00:00:00', 154, 0, 0, '', 'monthly bill', 0, '0000-00-00 00:00:00', 'unpaid', '2018-05-13 06:31:18', '2018-05-13 06:31:18', 'y', 29),
(3, 28, '2018-05-31 00:00:00', 96, 0, 0, '', 'monthly bill', 0, '0000-00-00 00:00:00', 'unpaid', '2018-05-13 06:31:19', '2018-05-13 06:31:19', 'y', 29),
(4, 35, '2018-05-31 00:00:00', 154, 0, 0, '', 'monthly bill', 0, '0000-00-00 00:00:00', 'unpaid', '2018-05-13 06:32:24', '2018-05-13 06:32:24', 'y', 29),
(5, 35, '2018-05-31 00:00:00', 154, 0, 0, '', 'monthly bill', 0, '0000-00-00 00:00:00', 'unpaid', '2018-05-13 06:32:33', '2018-05-13 06:32:33', 'y', 29),
(6, 28, '2018-05-31 00:00:00', 96, 0, 0, '', 'monthly bill', 0, '0000-00-00 00:00:00', 'unpaid', '2018-05-13 06:32:34', '2018-05-13 06:32:34', 'y', 29),
(7, 37, '2018-05-31 00:00:00', 137, 0, 0, '', 'monthly bill', 0, '0000-00-00 00:00:00', 'unpaid', '2018-05-13 06:38:57', '2018-05-13 06:38:57', 'y', 36),
(8, 37, '2018-05-31 00:00:00', 137, 0, 0, '', 'monthly bill', 0, '0000-00-00 00:00:00', 'unpaid', '2018-05-13 06:53:42', '2018-05-13 06:53:42', 'y', 36),
(11, 38, '2018-05-31 00:00:00', 272, 0, 0, '', 'monthly bill', 0, '0000-00-00 00:00:00', 'unpaid', '2018-05-13 07:24:21', '2018-05-13 07:24:21', 'y', 36);

-- --------------------------------------------------------

--
-- Table structure for table `user_product`
--

CREATE TABLE `user_product` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `copies` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('y','n') NOT NULL DEFAULT 'y',
  `parent_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_product`
--

INSERT INTO `user_product` (`id`, `user_id`, `product_id`, `copies`, `created`, `modified`, `status`, `parent_user_id`) VALUES
(1, 26, 23, 1, '2018-05-04 16:52:34', '2018-05-04 16:52:34', 'y', 29),
(2, 26, 18, 1, '2018-05-04 16:52:34', '2018-05-04 16:52:34', 'y', 29),
(3, 27, 18, 1, '2018-05-04 16:54:00', '2018-05-04 16:54:00', 'y', 29),
(4, 27, 19, 1, '2018-05-04 16:54:01', '2018-05-04 16:54:01', 'y', 29),
(5, 28, 23, 1, '2018-05-04 16:57:11', '2018-05-04 16:57:11', 'y', 29),
(6, 30, 23, 1, '2018-05-05 17:28:48', '2018-05-05 17:28:48', 'y', 29),
(7, 31, 23, 1, '2018-05-06 13:03:16', '2018-05-06 13:03:16', 'y', 29),
(8, 31, 18, 1, '2018-05-06 13:03:16', '2018-05-06 13:03:16', 'y', 29),
(9, 33, 22, 1, '2018-05-08 15:52:59', '2018-05-08 15:52:59', 'y', 32),
(10, 35, 18, 1, '2018-05-13 06:16:31', '2018-05-13 06:16:31', 'y', 29),
(11, 37, 24, 1, '2018-05-13 06:35:57', '2018-05-13 06:35:57', 'y', 36),
(12, 38, 24, 1, '2018-05-13 06:52:39', '2018-05-13 06:52:39', 'y', 36),
(13, 38, 25, 1, '2018-05-13 06:52:39', '2018-05-13 06:52:39', 'y', 36);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('y','n') NOT NULL DEFAULT 'y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role_name`, `created`, `modified`, `status`) VALUES
(1, 'user\r\n\r\n', '2018-04-07 22:36:50', '2018-04-07 22:36:50', 'y'),
(2, 'admin', '2018-04-07 22:36:50', '2018-04-07 22:36:50', 'y'),
(3, 'hoker', '2018-04-07 22:37:05', '2018-04-07 22:37:05', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `user_transation`
--

CREATE TABLE `user_transation` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `before_balance` float NOT NULL,
  `after_balance` float NOT NULL,
  `cr` float NOT NULL,
  `dr` float NOT NULL,
  `comment` varchar(255) NOT NULL,
  `transation_utc` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('y','n') NOT NULL DEFAULT 'y',
  `parent_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_transation`
--

INSERT INTO `user_transation` (`id`, `user_id`, `before_balance`, `after_balance`, `cr`, `dr`, `comment`, `transation_utc`, `created`, `modified`, `status`, `parent_user_id`) VALUES
(1, 26, 0, 0, 50, 0, 'account opening balance', '1525392000', '2018-05-04 16:52:34', '2018-05-04 16:52:34', 'y', 0),
(2, 27, 0, 0, 0, 500, 'account opening balance', '1525392000', '2018-05-04 16:54:00', '2018-05-04 16:54:00', 'y', 0),
(3, 28, 0, 0, 0, 100, 'account opening balance', '1525392000', '2018-05-04 16:57:11', '2018-05-04 16:57:11', 'y', 0),
(7, 30, 0, 0, 0, 50, 'account opening balance', '1525478400', '2018-05-05 17:28:48', '2018-05-05 17:28:48', 'y', 0),
(14, 31, 0, 0, 0, 500, 'account opening balance', '1525564800', '2018-05-06 13:03:16', '2018-05-06 13:03:16', 'y', 29),
(15, 33, 0, 0, 0, 50, 'account opening balance', '1525737600', '2018-05-08 15:52:59', '2018-05-08 15:52:59', 'y', 32),
(18, 35, -400, -400, 0, 400, 'account opening balance', '1526169600', '2018-05-13 06:16:31', '2018-05-13 06:16:31', 'y', 29),
(19, 35, -400, -554, 0, 154, 'monthly bill', '1526169600', '2018-05-13 06:29:23', '2018-05-13 06:29:23', 'y', 29),
(20, 35, -554, -708, 0, 154, 'monthly bill', '1526169600', '2018-05-13 06:31:18', '2018-05-13 06:31:18', 'y', 29),
(21, 35, -708, -862, 0, 154, 'monthly bill', '1526169600', '2018-05-13 06:32:33', '2018-05-13 06:32:33', 'y', 29),
(22, 37, -400, -400, 0, 400, 'account opening balance', '1526169600', '2018-05-13 06:35:56', '2018-05-13 06:35:56', 'y', 36),
(23, 37, -400, -537, 0, 137, 'monthly bill', '1526169600', '2018-05-13 06:38:57', '2018-05-13 06:38:57', 'y', 36),
(24, 37, -537, -437, 100, 0, 'Cash Recive', '1526169600', '2018-05-13 06:45:46', '2018-05-13 06:45:46', 'y', 36),
(25, 38, 500, 500, 500, 0, 'account opening balance', '1526169600', '2018-05-13 06:52:39', '2018-05-13 06:52:39', 'y', 36),
(26, 37, -437, -574, 0, 137, 'monthly bill', '1526169600', '2018-05-13 06:53:42', '2018-05-13 06:53:42', 'y', 36),
(29, 38, 500, 228, 0, 272, 'monthly bill', '1526169600', '2018-05-13 07:24:21', '2018-05-13 07:24:21', 'y', 36);

-- --------------------------------------------------------

--
-- Table structure for table `user_work_day`
--

CREATE TABLE `user_work_day` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `workdays_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('y','n') NOT NULL DEFAULT 'y',
  `parent_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_work_day`
--

INSERT INTO `user_work_day` (`id`, `user_id`, `workdays_id`, `created`, `modified`, `status`, `parent_user_id`) VALUES
(1, 26, 1, '2018-05-04 16:52:35', '2018-05-04 16:52:35', 'y', 0),
(2, 26, 2, '2018-05-04 16:52:35', '2018-05-04 16:52:35', 'y', 0),
(3, 26, 3, '2018-05-04 16:52:35', '2018-05-04 16:52:35', 'y', 0),
(4, 26, 4, '2018-05-04 16:52:35', '2018-05-04 16:52:35', 'y', 0),
(5, 26, 5, '2018-05-04 16:52:35', '2018-05-04 16:52:35', 'y', 0),
(6, 26, 6, '2018-05-04 16:52:35', '2018-05-04 16:52:35', 'y', 0),
(7, 26, 7, '2018-05-04 16:52:35', '2018-05-04 16:52:35', 'y', 0),
(8, 27, 1, '2018-05-04 16:54:01', '2018-05-04 16:54:01', 'y', 0),
(9, 27, 2, '2018-05-04 16:54:01', '2018-05-04 16:54:01', 'y', 0),
(10, 27, 3, '2018-05-04 16:54:01', '2018-05-04 16:54:01', 'y', 0),
(11, 27, 4, '2018-05-04 16:54:01', '2018-05-04 16:54:01', 'y', 0),
(12, 27, 5, '2018-05-04 16:54:01', '2018-05-04 16:54:01', 'y', 0),
(13, 27, 6, '2018-05-04 16:54:01', '2018-05-04 16:54:01', 'y', 0),
(14, 27, 7, '2018-05-04 16:54:01', '2018-05-04 16:54:01', 'y', 0),
(15, 28, 1, '2018-05-04 16:57:12', '2018-05-04 16:57:12', 'y', 0),
(16, 28, 2, '2018-05-04 16:57:12', '2018-05-04 16:57:12', 'y', 0),
(17, 28, 3, '2018-05-04 16:57:12', '2018-05-04 16:57:12', 'y', 0),
(18, 28, 4, '2018-05-04 16:57:12', '2018-05-04 16:57:12', 'y', 0),
(19, 28, 5, '2018-05-04 16:57:12', '2018-05-04 16:57:12', 'y', 0),
(20, 28, 6, '2018-05-04 16:57:12', '2018-05-04 16:57:12', 'y', 0),
(21, 28, 7, '2018-05-04 16:57:12', '2018-05-04 16:57:12', 'y', 0),
(22, 31, 1, '2018-05-06 13:03:17', '2018-05-06 13:03:17', 'y', 29);

-- --------------------------------------------------------

--
-- Table structure for table `weekdays`
--

CREATE TABLE `weekdays` (
  `id` int(11) NOT NULL,
  `dayname` varchar(255) NOT NULL,
  `status` enum('y','n') NOT NULL DEFAULT 'y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `weekdays`
--

INSERT INTO `weekdays` (`id`, `dayname`, `status`) VALUES
(1, 'SUN', 'y'),
(2, 'MON', 'y'),
(3, 'TUE', 'y'),
(4, 'WED', 'y'),
(5, 'THU', 'y'),
(6, 'FRI', 'y'),
(7, 'SAT', 'y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`),
  ADD KEY `route_id` (`route_id`);

--
-- Indexes for table `bill_month`
--
ALTER TABLE `bill_month`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill_product`
--
ALTER TABLE `bill_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cash_memo`
--
ALTER TABLE `cash_memo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prices_daily`
--
ALTER TABLE `prices_daily`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `product_id_2` (`product_id`);

--
-- Indexes for table `prices_montly`
--
ALTER TABLE `prices_montly`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `print_plan`
--
ALTER TABLE `print_plan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`id`),
  ADD KEY `route_code_2` (`route_code`);

--
-- Indexes for table `routeplan`
--
ALTER TABLE `routeplan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `route_id` (`route_id`),
  ADD KEY `area_id` (`area_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_code` (`user_code`);

--
-- Indexes for table `user_bill`
--
ALTER TABLE `user_bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_product`
--
ALTER TABLE `user_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_transation`
--
ALTER TABLE `user_transation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_work_day`
--
ALTER TABLE `user_work_day`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weekdays`
--
ALTER TABLE `weekdays`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `bill_month`
--
ALTER TABLE `bill_month`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `bill_product`
--
ALTER TABLE `bill_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `cash_memo`
--
ALTER TABLE `cash_memo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `prices_daily`
--
ALTER TABLE `prices_daily`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `prices_montly`
--
ALTER TABLE `prices_montly`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `print_plan`
--
ALTER TABLE `print_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `routeplan`
--
ALTER TABLE `routeplan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `user_bill`
--
ALTER TABLE `user_bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `user_product`
--
ALTER TABLE `user_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_transation`
--
ALTER TABLE `user_transation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `user_work_day`
--
ALTER TABLE `user_work_day`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `weekdays`
--
ALTER TABLE `weekdays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `area`
--
ALTER TABLE `area`
  ADD CONSTRAINT `area_ibfk_1` FOREIGN KEY (`route_id`) REFERENCES `route` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `prices_daily`
--
ALTER TABLE `prices_daily`
  ADD CONSTRAINT `prices_daily_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `prices_montly`
--
ALTER TABLE `prices_montly`
  ADD CONSTRAINT `prices_montly_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `print_plan`
--
ALTER TABLE `print_plan`
  ADD CONSTRAINT `print_plan_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `routeplan`
--
ALTER TABLE `routeplan`
  ADD CONSTRAINT `routeplan_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `routeplan_ibfk_2` FOREIGN KEY (`route_id`) REFERENCES `route` (`id`),
  ADD CONSTRAINT `routeplan_ibfk_3` FOREIGN KEY (`area_id`) REFERENCES `area` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
