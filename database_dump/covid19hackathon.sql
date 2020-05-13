-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2020 at 06:45 PM
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
-- Database: `covid19hackathon`
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
-- Table structure for table `districtwisedata`
--

CREATE TABLE `districtwisedata` (
  `district_id` int(10) UNSIGNED NOT NULL,
  `district_name` varchar(30) COLLATE utf16_unicode_ci NOT NULL,
  `foodsupply` int(11) NOT NULL DEFAULT '0',
  `essentialpass` int(11) NOT NULL DEFAULT '0',
  `personalpass` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `districtwisedata`
--

INSERT INTO `districtwisedata` (`district_id`, `district_name`, `foodsupply`, `essentialpass`, `personalpass`) VALUES
(1, 'Baksa', 0, 0, 0),
(2, 'Barpeta', 0, 0, 0),
(3, 'Biswanath', 0, 0, 0),
(4, 'Bongaigaon', 0, 0, 0),
(5, 'Cachar', 0, 0, 0),
(6, 'Charaideo', 0, 0, 0),
(7, 'Chirang', 0, 0, 0),
(8, 'Darrang', 0, 0, 0),
(9, 'Dhemaji', 0, 0, 0),
(10, 'Dhubri', 0, 0, 0),
(11, 'Dibrugarh', 0, 0, 0),
(12, 'Dima Hasao', 0, 0, 0),
(13, 'Goalpara', 0, 0, 0),
(14, 'Golaghat', 0, 0, 0),
(15, 'Hailakandi', 0, 0, 0),
(16, 'Hojai', 0, 0, 0),
(17, 'Jorhat', 0, 0, 0),
(18, 'Kamrup Metropolitan', 0, 0, 0),
(19, 'Kamrup', 0, 0, 0),
(20, 'Karbi Anglong', 0, 0, 0),
(21, 'Karimganj', 0, 0, 0),
(22, 'Kokrajhar', 0, 0, 0),
(23, 'Lakhimpur', 0, 0, 0),
(24, 'Majuli', 0, 0, 0),
(25, 'Morigaon', 0, 0, 0),
(26, 'Nagaon', 0, 0, 0),
(27, 'Nalbari', 0, 0, 0),
(28, 'Sivasagar', 0, 0, 0),
(29, 'Sonitpur', 0, 0, 0),
(30, 'South Salmara Mankachar', 0, 0, 0),
(31, 'Tinsukia', 0, 0, 0),
(32, 'Udalguri', 0, 0, 0),
(33, 'West Karbi Anglong', 0, 0, 0);

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
  `status` varchar(15) COLLATE utf16_unicode_ci NOT NULL DEFAULT 'processing'
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `essentialpass`
--

INSERT INTO `essentialpass` (`id`, `userid`, `fullname`, `address`, `city`, `district`, `pincode`, `phoneno`, `reason`, `vregdno`, `fromdate`, `todate`, `destination`, `timesubmitted`, `status`) VALUES
(1, 1, 'example1', 'example asddress', 'example city', 'Chirang', '111111', '9999999999', 'c ke vkjebvjkrbijrvbrjvnjrknbkjrnbjrnjbnrkjbtrbntrb', 'vkjebvjbrj', '2020-05-09', '2020-05-12', ' kjvenvkjnrkjvrkbgkjrbktngtkjhntkjnhtk', '2020-05-09 13:16:27', 'Approved'),
(2, 1, 'gdhghgfjvhvj', 'gfjfjhgfjhgk', 'vhjhjgkgkhk', 'Nalbari', 'cghcgc', '1234567890', 'jgfvjhghjgjhgjhg', 'fhjfjhgvkj', '2020-05-14', '2020-05-15', 'bchchgcfghfjhgjhghghvfhgtt', '2020-05-13 15:16:36', 'processing'),
(3, 1, 'gcgvhvhmhgk', 'hgfjgfjhgjhgkj', 'vjhfjhhgjkgk', 'Cachar', 'cfgfjg', '1111111111', 'chcvgvjhvjh', 'nmnbmbmjbk', '2020-05-14', '2020-05-15', 'nbvjnvjhvmhnvmbvjhvhjvgjh', '2020-05-13 15:29:24', 'processing');

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
  `status` varchar(20) COLLATE utf16_unicode_ci DEFAULT 'processing',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `foodsupplyaddresses`
--

INSERT INTO `foodsupplyaddresses` (`address_id`, `user_id`, `fullname`, `address1`, `address2`, `city`, `district`, `pincode`, `phoneno`, `status`, `date`) VALUES
(5, 1, 'example', 'example address 1', 'example address 2', 'example city', 'Kamrup Metropolitan', '781001', '9999999999', 'processing', '2020-05-06 15:18:45'),
(6, 1, 'example', 'example address 1', 'example address 2', 'example city', 'Kamrup Metropolitan', '781001', '9999999999', 'processing', '2020-05-06 15:21:45'),
(7, 1, 'example', 'example address 1', 'example address 2', 'example city', 'Kamrup Metropolitan', '781001', '9999999999', 'processing', '2020-05-06 15:24:24'),
(8, 1, 'example', 'example address 1', 'example address 2', 'example city', 'Kamrup Metropolitan', '781001', '9999999999', 'processing', '2020-05-06 15:26:28'),
(9, 1, 'example', 'example address 1', 'example address 2', 'example city', 'Kamrup Metropolitan', '781001', '9999999999', 'processing', '2020-05-06 15:27:33'),
(10, 1, ' vjvhvh', 'vjhvhikvikhbki', 'jfyfuyfuy', 'jfvyfu', 'Jorhat', 'vgcufy', 'qqqqqqqqqq', 'processing', '2020-05-06 15:28:18'),
(11, 2, 'cgcvjgg', 'gfjfuyfguyfu', 'gfyufgygiuhgukgk', 'vjhhjgigigiiug', 'Baksa', 'gvcjvj', 'gcghfcyfuj', 'Delivered', '2020-05-06 15:49:30'),
(12, 1, 'ncvnbvnbvmnvm', 'nbv bvmvbmvmbv', 'nvcnbvnbvmbvmvmhvhjgjh', 'vhvmhvhbhhgkjgk', 'Cachar', 'ghcfgf', '1234567890', 'processing', '2020-05-13 15:30:09');

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
  `status` varchar(15) COLLATE utf16_unicode_ci NOT NULL DEFAULT 'processing',
  `additionalpeople` varchar(2) COLLATE utf16_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `personalpass`
--

INSERT INTO `personalpass` (`id`, `userid`, `fullname`, `address`, `city`, `district`, `pincode`, `phoneno`, `reason`, `timesubmitted`, `status`, `additionalpeople`) VALUES
(1, 1, 'p', 'p', 'p', 'Baksa', 'pppppp', 'pppppppppp', 'hcvgcvhgvjhvjhvjhvkhvvgj', '2020-05-09 14:02:03', 'Initiated', '5'),
(2, 1, 'vjhvhjbjhbjhgjhg', 'jgfjhgvjhgjhgkj', 'vjhvjhhvkgkgk', 'Nalbari', 'hggkuh', 'chgchgchgc', 'jvjvjhgjhgk', '2020-05-13 15:21:35', 'processing', '9'),
(3, 1, 'cghcgvjhvj', 'vmhvhvghj', 'vbcnvcngvcnc', 'Nalbari', 'vjvjhg', 'vnhvhhvhvk', 'vhjvhjvjhvgjhvgjh', '2020-05-13 15:22:59', 'processing', '3'),
(4, 1, 'bvnvhmvmhbmh', 'gcjvjhgjhghgj', 'jhfjhgjgjkhkhgjkhkjh', 'Cachar', 'vhjgkj', 'hghghgkjgh', 'fgfjhfgjhgkjgkjg', '2020-05-13 15:26:16', 'processing', '0');

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
(2, 'example2@example2.example2', 'example2', '1234567890', '$2y$10$.lALOJDnUALGhH6cG5Vp4u4Pc5Ifj70AyeOc/2Ba/7zila6B0ERIO', '2020-05-06 15:48:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminusers`
--
ALTER TABLE `adminusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districtwisedata`
--
ALTER TABLE `districtwisedata`
  ADD PRIMARY KEY (`district_id`);

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
-- Indexes for table `personalpass`
--
ALTER TABLE `personalpass`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminusers`
--
ALTER TABLE `adminusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `districtwisedata`
--
ALTER TABLE `districtwisedata`
  MODIFY `district_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `essentialpass`
--
ALTER TABLE `essentialpass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `foodsupplyaddresses`
--
ALTER TABLE `foodsupplyaddresses`
  MODIFY `address_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personalpass`
--
ALTER TABLE `personalpass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
