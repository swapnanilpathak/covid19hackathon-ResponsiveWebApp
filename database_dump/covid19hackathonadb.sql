-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2020 at 09:00 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covid19hackathonadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminusers`
--

CREATE TABLE `adminusers` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf16_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `adminusers`
--

INSERT INTO `adminusers` (`id`, `username`, `password`) VALUES
(1, 'admin1', '$2y$10$.5RldGSjGX3.e5AUyLHQv.XXZPUNRrPWb3xIkILcDDOBUVnJ1brMK');

-- --------------------------------------------------------

--
-- Table structure for table `counsellings`
--

CREATE TABLE `counsellings` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `fullname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cdate` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `district` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Processing',
  `timesubmitted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `counsellings`
--

INSERT INTO `counsellings` (`id`, `userid`, `fullname`, `cdate`, `district`, `status`, `timesubmitted`) VALUES
(23, 4, 'eg12', '2020-06-10', 'Baksa', 'Seen', '2020-06-07 06:40:29'),
(24, 5, 'nfnenfe', '2020-06-18', 'West Karbi Anglong', 'processing', '2020-06-11 18:16:46');

-- --------------------------------------------------------

--
-- Table structure for table `districtwisedata`
--

CREATE TABLE `districtwisedata` (
  `district_id` int(10) UNSIGNED NOT NULL,
  `district_name` varchar(30) COLLATE utf16_unicode_ci NOT NULL,
  `foodsupply` int(11) NOT NULL DEFAULT '0',
  `essentialpass` int(11) NOT NULL DEFAULT '0',
  `personalpass` int(11) NOT NULL DEFAULT '0',
  `volunteers` int(10) NOT NULL DEFAULT '0',
  `doctorappointments` int(11) NOT NULL DEFAULT '0',
  `hospitaladmissions` int(11) NOT NULL DEFAULT '0',
  `counsellings` int(11) NOT NULL DEFAULT '0',
  `patientsymptomdata` int(11) NOT NULL DEFAULT '0',
  `donatereliefmaterials` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `districtwisedata`
--

INSERT INTO `districtwisedata` (`district_id`, `district_name`, `foodsupply`, `essentialpass`, `personalpass`, `volunteers`, `doctorappointments`, `hospitaladmissions`, `counsellings`, `patientsymptomdata`, `donatereliefmaterials`) VALUES
(23, 'Baksa', 1, 2, 1, 0, 1, 1, 1, 1, 0),
(24, 'Barpeta', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(25, 'Biswanath', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(26, 'Bongaigaon', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(27, 'Cachar', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(28, 'Charaideo', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(29, 'Chirang', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(30, 'Darrang', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(31, 'Dhemaji', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(32, 'Dhubri', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(33, 'Dibrugarh', 0, 0, 1, 0, 0, 0, 0, 0, 0),
(34, 'Dima Hasao', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(35, 'Goalpara', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(36, 'Golaghat', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(37, 'Hailakandi', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(38, 'Hojai', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(39, 'Jorhat', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(40, 'Kamrup Metropolitan', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(41, 'Kamrup', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(42, 'Karbi Anglong', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(43, 'Karimganj', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(44, 'Kokrajhar', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(45, 'Lakhimpur', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(46, 'Majuli', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(47, 'Morigaon', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(48, 'Nagaon', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(49, 'Nalbari', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(50, 'Sivasagar', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(51, 'Sonitpur', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(52, 'South Salmara Mankachar', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(53, 'Tinsukia', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(54, 'Udalguri', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(55, 'West Karbi Anglong', 0, 0, 0, 0, 0, 0, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctorappointments`
--

CREATE TABLE `doctorappointments` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `fullname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `district` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `dept` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `appointmentdate` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `timesubmitted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Processing'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctorappointments`
--

INSERT INTO `doctorappointments` (`id`, `userid`, `fullname`, `gender`, `district`, `phone`, `dept`, `appointmentdate`, `timesubmitted`, `status`) VALUES
(3, 4, 'eg12', 'Male', 'Baksa', '9999999999', 'OPD', '2020-06-09', '2020-06-07 06:39:07', 'processing');

-- --------------------------------------------------------

--
-- Table structure for table `donatereliefmaterials`
--

CREATE TABLE `donatereliefmaterials` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `fullname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `district` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pincode` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `phoneno` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `donationtype` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `timesubmitted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Processing'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `donatereliefmaterials`
--

INSERT INTO `donatereliefmaterials` (`id`, `userid`, `fullname`, `address`, `district`, `pincode`, `phoneno`, `donationtype`, `quantity`, `timesubmitted`, `status`) VALUES
(1, 5, 'njnefj', 'ndkjndkje', 'West Karbi Anglong', '000000', '9999999999', 'food', '2kg', '2020-06-11 18:15:12', 'processing');

-- --------------------------------------------------------

--
-- Table structure for table `donationdetails`
--

CREATE TABLE `donationdetails` (
  `id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `bankaccountname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bankaccountno` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bankifsccode` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `upiid` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `donationdetails`
--

INSERT INTO `donationdetails` (`id`, `title`, `bankaccountname`, `bankaccountno`, `bankifsccode`, `upiid`, `description`) VALUES
(3, 'Assam Chief Minister Relief Fund', 'State Bank Of India', '35969660230', 'SBIN0010755', 'cmrfassam@sbi', 'Assam Chief Minister Relief Fund');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf16_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf16_unicode_ci NOT NULL,
  `dept` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `district` varchar(50) COLLATE utf16_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `username`, `password`, `dept`, `district`) VALUES
(1, 'employee1', '$2y$10$.5RldGSjGX3.e5AUyLHQv.XXZPUNRrPWb3xIkILcDDOBUVnJ1brMK', 'foodsupplyservices', 'Baksa'),
(2, 'employee2', '$2y$10$.5RldGSjGX3.e5AUyLHQv.XXZPUNRrPWb3xIkILcDDOBUVnJ1brMK', 'transportservices', 'Baksa'),
(3, 'employee3', '$2y$10$.5RldGSjGX3.e5AUyLHQv.XXZPUNRrPWb3xIkILcDDOBUVnJ1brMK', 'medicalservices', 'Baksa'),
(4, 'employee7', '$2y$10$8AMzaBkFdNyea5mYgH1qIumzTiE09DUI367uzIOuvbWOU0cIL93GW', 'medicalservices', 'Baksa');

-- --------------------------------------------------------

--
-- Table structure for table `essentialpass`
--

CREATE TABLE `essentialpass` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `fullname` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf16_unicode_ci NOT NULL,
  `city` varchar(30) COLLATE utf16_unicode_ci NOT NULL,
  `district` varchar(30) COLLATE utf16_unicode_ci NOT NULL,
  `pincode` varchar(6) COLLATE utf16_unicode_ci NOT NULL,
  `phoneno` varchar(10) COLLATE utf16_unicode_ci NOT NULL,
  `reason` text COLLATE utf16_unicode_ci NOT NULL,
  `vregdno` varchar(10) COLLATE utf16_unicode_ci NOT NULL,
  `fromdate` date NOT NULL,
  `todate` date NOT NULL,
  `destination` varchar(255) COLLATE utf16_unicode_ci NOT NULL,
  `timesubmitted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(15) COLLATE utf16_unicode_ci NOT NULL DEFAULT 'Processing'
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `essentialpass`
--

INSERT INTO `essentialpass` (`id`, `userid`, `fullname`, `address`, `city`, `district`, `pincode`, `phoneno`, `reason`, `vregdno`, `fromdate`, `todate`, `destination`, `timesubmitted`, `status`) VALUES
(6, 4, 'eg12', 'h cjdc  jh ', 'hbhbjhb', 'Baksa', '000000', '9999999999', 'hbchjdbcvdg', 'vvvvvvvvvv', '2020-06-11', '2020-06-12', 'ihbhbhb', '2020-06-07 06:45:14', 'Approved'),
(7, 4, 'eg12', 'hcbvcjvd', 'bhcbhdcbjdh', 'Baksa', '000000', '9999999999', 'hdbhjcjhv', 'qqqqqqqq', '2020-06-12', '2020-06-15', 'gvvhg', '2020-06-07 06:46:53', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `foodsupplyaddresses`
--

CREATE TABLE `foodsupplyaddresses` (
  `address_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `address1` varchar(255) COLLATE utf16_unicode_ci NOT NULL,
  `address2` varchar(255) COLLATE utf16_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `district` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `pincode` varchar(6) COLLATE utf16_unicode_ci NOT NULL,
  `phoneno` varchar(10) COLLATE utf16_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf16_unicode_ci DEFAULT 'Processing',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `foodsupplyaddresses`
--

INSERT INTO `foodsupplyaddresses` (`address_id`, `user_id`, `fullname`, `address1`, `address2`, `city`, `district`, `pincode`, `phoneno`, `status`, `date`) VALUES
(15, 4, 'eg12', 'hbhjcbcjhbd', 'h dhje dh ehj', 'whbdhjbe', 'Baksa', '000000', '9999999999', 'Dispatched', '2020-06-07 06:52:33');

-- --------------------------------------------------------

--
-- Table structure for table `hospitaladmissions`
--

CREATE TABLE `hospitaladmissions` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `fullname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `age` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `district` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pincode` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `phoneno` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `kinname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `admdate` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Processing',
  `timesubmitted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hospitaladmissions`
--

INSERT INTO `hospitaladmissions` (`id`, `userid`, `fullname`, `age`, `gender`, `address`, `city`, `district`, `pincode`, `phoneno`, `kinname`, `admdate`, `status`, `timesubmitted`) VALUES
(3, 4, 'eg12', '24', 'Male', 'kjbcjhbhcdb', 'bhbdchebc', 'Baksa', '000000', '9999999999', 'eg2 kin', '2020-06-17', 'processing', '2020-06-07 06:39:47');

-- --------------------------------------------------------

--
-- Table structure for table `msmeorders`
--

CREATE TABLE `msmeorders` (
  `id` int(11) NOT NULL,
  `msmeid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` int(2) NOT NULL,
  `fullname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `district` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pincode` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `phoneno` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `timesubmitted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Processing'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `msmeorders`
--

INSERT INTO `msmeorders` (`id`, `msmeid`, `userid`, `productid`, `quantity`, `fullname`, `address`, `district`, `pincode`, `phoneno`, `timesubmitted`, `status`) VALUES
(5, 1, 4, 9, 1, 'eg12', 'jnwdjbd', 'Baksa', '000000', '9999999999', '2020-06-07 06:53:13', 'processing'),
(6, 1, 5, 9, 1, 'djbfeb', 'bhbdheb', 'West Karbi Anglong', '000000', '9999999999', '2020-06-11 18:15:57', 'processing'),
(7, 2, 5, 10, 10, 'wsdwfdw', 'wdwfwf', 'West Karbi Anglong', '000000', '9999999999', '2020-06-11 18:27:45', 'Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `msmeproducts`
--

CREATE TABLE `msmeproducts` (
  `productid` int(11) NOT NULL,
  `msmeid` int(11) NOT NULL,
  `productname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `producttype` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `productdesc` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `productprice` int(11) NOT NULL,
  `productimage` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `msmeproducts`
--

INSERT INTO `msmeproducts` (`productid`, `msmeid`, `productname`, `producttype`, `productdesc`, `productprice`, `productimage`) VALUES
(9, 1, 'Mask', 'Health', 'Mask made of cloth', 50, '15161591512591face-mask-0410.jpg'),
(10, 2, 'mask', 'mask', 'mask', 25, '75471591899788livocare_mask_50_main.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `msmes`
--

CREATE TABLE `msmes` (
  `id` int(11) NOT NULL,
  `username` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `district` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `msmes`
--

INSERT INTO `msmes` (`id`, `username`, `password`, `district`) VALUES
(1, 'msme1', '$2y$10$CubhGRKsVeH7y1GYIAwEXu8ojDDCtt1xhJ9fLN/5kuqFqBOrFRsEa', 'Amritsar'),
(2, 'msme2', '$2y$10$1h1fVcNTlUwWUuS8JBkrtezlbhbmrzblccJBqq3eVX/qS0XFwMPWm', 'West Karbi Anglong');

-- --------------------------------------------------------

--
-- Table structure for table `patientsymptomdata`
--

CREATE TABLE `patientsymptomdata` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `fullname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `district` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pincode` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `phoneno` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `fever` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `cough` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `respiratorydistress` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `travelhistory` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Submitted',
  `timesubmitted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `patientsymptomdata`
--

INSERT INTO `patientsymptomdata` (`id`, `userid`, `fullname`, `address`, `district`, `pincode`, `phoneno`, `fever`, `cough`, `respiratorydistress`, `travelhistory`, `status`, `timesubmitted`) VALUES
(3, 4, 'eg12', 'jnbwidbhbdh', 'Baksa', '000000', '9999999999', 'Yes', 'Yes', 'Yes', 'None', 'submitted', '2020-06-07 06:40:16'),
(4, 5, 'wdwfw', 'wdwfe', 'West Karbi Anglong', '000000', '9999999999', 'Yes', 'Yes', 'Yes', 'eefef', 'submitted', '2020-06-11 18:17:44');

-- --------------------------------------------------------

--
-- Table structure for table `personalpass`
--

CREATE TABLE `personalpass` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `fullname` varchar(200) COLLATE utf16_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf16_unicode_ci NOT NULL,
  `city` varchar(30) COLLATE utf16_unicode_ci NOT NULL,
  `district` varchar(30) COLLATE utf16_unicode_ci NOT NULL,
  `pincode` varchar(6) COLLATE utf16_unicode_ci NOT NULL,
  `phoneno` varchar(10) COLLATE utf16_unicode_ci NOT NULL,
  `reason` text COLLATE utf16_unicode_ci NOT NULL,
  `timesubmitted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(15) COLLATE utf16_unicode_ci NOT NULL DEFAULT 'Processing',
  `additionalpeople` varchar(2) COLLATE utf16_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `personalpass`
--

INSERT INTO `personalpass` (`id`, `userid`, `fullname`, `address`, `city`, `district`, `pincode`, `phoneno`, `reason`, `timesubmitted`, `status`, `additionalpeople`) VALUES
(10, 4, 'eg12', 'bhdbchedbched', 'bhbehcb', 'Baksa', '000000', '9999999999', 'hjbehfvbehf', '2020-06-07 06:43:34', 'Approved', '2'),
(11, 1, 'hsjhdvsjhdv', 'vdvdjhvj', 'hvfejvfjev', 'Dibrugarh', '000000', '9999999999', 'bsbkdhbb', '2020-06-11 15:52:31', 'Approved', '3');

-- --------------------------------------------------------

--
-- Table structure for table `tollfreenumbers`
--

CREATE TABLE `tollfreenumbers` (
  `id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `number` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tollfreenumbers`
--

INSERT INTO `tollfreenumbers` (`id`, `title`, `number`, `description`) VALUES
(6, 'Assam State Toll Free Number', '6913347770', 'Assam State Toll Free Number');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_email` varchar(255) COLLATE utf16_unicode_ci NOT NULL,
  `user_fullname` varchar(50) COLLATE utf16_unicode_ci DEFAULT NULL,
  `user_phoneno` varchar(10) COLLATE utf16_unicode_ci DEFAULT NULL,
  `user_password` varchar(255) COLLATE utf16_unicode_ci NOT NULL,
  `user_regdtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `user_fullname`, `user_phoneno`, `user_password`, `user_regdtime`) VALUES
(1, 'example1@example1.example1', 'example', '0', '$2y$10$vj0OOc5iTosYpMAVsUOVvOJviOkWMQ.YUy8EPFM5S8OTAoF.O4txe', '2020-05-06 09:39:32'),
(2, 'example2@example2.example2', 'example2', '1234567890', '$2y$10$.lALOJDnUALGhH6cG5Vp4u4Pc5Ifj70AyeOc/2Ba/7zila6B0ERIO', '2020-05-06 15:48:57'),
(3, 'eg10@eg10.eg10', 'snfjnjkfberjkbgkb ', '1111111111', '$2y$10$9duBYbeIufD8BR2pJXy26Oo7rUZUzuERgDNwgmfMRq8wGXAWco.ue', '2020-05-24 14:16:10'),
(4, 'eg12@eg12.eg12', 'eg12', '9999999999', '$2y$10$Zfgj8smzGJEBniff.kG.oeh3sWId6CMvCHVPgoQJ5eZofnbq0QYPq', '2020-05-31 17:54:11'),
(5, 'eg13@eg13.eg13', 'eg13', '9999999999', '$2y$10$akoQCYzxw2LifRYNU4YX3.2QT27jyPns11YlZqt90BkSFsDbULdPC', '2020-06-11 18:12:52');

-- --------------------------------------------------------

--
-- Table structure for table `volunteers`
--

CREATE TABLE `volunteers` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `fullname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `district` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pincode` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `interests` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `skills` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fromdate` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `todate` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `timesubmitted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Processing'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminusers`
--
ALTER TABLE `adminusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counsellings`
--
ALTER TABLE `counsellings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districtwisedata`
--
ALTER TABLE `districtwisedata`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `doctorappointments`
--
ALTER TABLE `doctorappointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donatereliefmaterials`
--
ALTER TABLE `donatereliefmaterials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donationdetails`
--
ALTER TABLE `donationdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `essentialpass`
--
ALTER TABLE `essentialpass`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foodsupplyaddresses`
--
ALTER TABLE `foodsupplyaddresses`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `hospitaladmissions`
--
ALTER TABLE `hospitaladmissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `msmeorders`
--
ALTER TABLE `msmeorders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `msmeproducts`
--
ALTER TABLE `msmeproducts`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `msmes`
--
ALTER TABLE `msmes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patientsymptomdata`
--
ALTER TABLE `patientsymptomdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personalpass`
--
ALTER TABLE `personalpass`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tollfreenumbers`
--
ALTER TABLE `tollfreenumbers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `volunteers`
--
ALTER TABLE `volunteers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminusers`
--
ALTER TABLE `adminusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `counsellings`
--
ALTER TABLE `counsellings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `districtwisedata`
--
ALTER TABLE `districtwisedata`
  MODIFY `district_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `doctorappointments`
--
ALTER TABLE `doctorappointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `donatereliefmaterials`
--
ALTER TABLE `donatereliefmaterials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `donationdetails`
--
ALTER TABLE `donationdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `essentialpass`
--
ALTER TABLE `essentialpass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `foodsupplyaddresses`
--
ALTER TABLE `foodsupplyaddresses`
  MODIFY `address_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `hospitaladmissions`
--
ALTER TABLE `hospitaladmissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `msmeorders`
--
ALTER TABLE `msmeorders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `msmeproducts`
--
ALTER TABLE `msmeproducts`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `msmes`
--
ALTER TABLE `msmes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `patientsymptomdata`
--
ALTER TABLE `patientsymptomdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personalpass`
--
ALTER TABLE `personalpass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tollfreenumbers`
--
ALTER TABLE `tollfreenumbers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `volunteers`
--
ALTER TABLE `volunteers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
