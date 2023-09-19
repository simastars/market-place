-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2022 at 12:50 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `market`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `sn` int(11) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`sn`, `password`) VALUES
(1, '12345');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `sn` int(11) NOT NULL,
  `product` varchar(255) NOT NULL,
  `price` varchar(15) NOT NULL,
  `category` varchar(255) NOT NULL,
  `image` varchar(20) NOT NULL,
  `phonenumber` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`sn`, `product`, `price`, `category`, `image`, `phonenumber`) VALUES
(6, 'WATER HEATER', '3500', 'Services', 'post-2.jpg', '090284303266'),
(7, 'ELECTRIC FAN', '5000', 'Services', 'post-5.jpg', '090284303266'),
(8, 'GALILAH', '10000', 'Products', 'property-3.jpg', '090284303266'),
(9, 'ATAMFA', '5000', 'Products', 'property-4.jpg', '090284303266'),
(10, 'ZARE', '200', 'Products', 'post-2.jpg', '090284303266');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `sn` int(10) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `phonenumber` varchar(15) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `state` varchar(20) NOT NULL,
  `lga` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `dates` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`sn`, `fullname`, `phonenumber`, `gender`, `state`, `lga`, `password`, `status`, `dates`, `image`) VALUES
(15, 'AHMED SULEIMAN MUHAMMED', '09028430326', 'Male', 'Ekiti', 'Ilejemeje', '28849PCQ', 'Approved', 'Sun 06/03/2022', 'biz.jpg'),
(16, 'SHAHABUDDEEN IBRAHIM AHMAD', '08128430326', 'Male', 'Gombe', 'Gombe', '81581KKP', 'Approved', 'Sun 06/03/2022', 'biz.jpg'),
(20, 'FAUZIYYA TASIU UMAR', '87685654', 'Female', 'Ebonyi', 'Ishielu', '77207JHU', 'Approved', 'Sun 06/03/2022', 'biz.jpg'),
(21, 'YAHAYA HARUNA', '8769888', 'Female', 'Delta', 'Ika South', '8262KFS', 'Approved', 'Sun 06/03/2022', 'biz.jpg'),
(22, 'SHAHABUDDEEN IBRAHIM AHMAD', '0908989', 'Female', 'Abia', 'Aba North', '97775BPR', 'Approved', 'Sun 06/03/2022', 'biz.jpg'),
(24, 'SHAHABUDDEEN IBRAHIM AHMAD', '887986', 'Female', 'Abia', 'Aba North', '76496YFR', 'Approved', 'Sun 06/03/2022', 'biz.jpg'),
(26, 'JOHN ADAH', '8769808990', 'Male', 'Delta', 'Ndokwa West', '67857LDC', 'Approved', 'Sun 06/03/2022', 'biz.jpg'),
(27, 'SHAHABUDDEEN IBRAHIM AHMAD', '09130303030', 'Male', 'Gombe', 'Gombe', '83215XVJ', 'yet', 'Mon 07/03/2022', 'biz.jpg'),
(28, 'SHAHABUDDEEN IBRAHIM AHMAD', '0812843032677', 'Male', 'Gombe', 'Gombe', '50233EMV', 'yet', 'Sun 13/03/2022', ''),
(29, 'SHAHABUDDEEN IBRAHIM AHMAD', '090284303266', 'Male', 'Gombe', 'Gombe', '53', 'yet', 'Sun 13/03/2022', '106402251_302379884132409_3547712852382889971_n.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`sn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `sn` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
