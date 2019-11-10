-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2019 at 02:40 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `uid` int(11) NOT NULL,
  `pid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`uid`, `pid`) VALUES
(10, 6),
(10, 10),
(10, 9),
(10, 7);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `itemname` varchar(100) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `imagepath` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `sid`, `category`, `email`, `itemname`, `quantity`, `price`, `description`, `imagepath`) VALUES
(6, 10, 'mobiles', 'sarathchandhra365@gmail.com', 'Honor 5X', '0', '15000', '3GB RAM,32GB ROM', 'uploads/phone.jpg'),
(7, 10, 'laptops', 'sarathchandhra365@gmail.com', 'Dell Inspiron', '1', '60000', '12GB RAM,1TB ROM', 'uploads/laptop1.jpg'),
(9, 10, 'laptops', 'sarathchandhra365@gmail.com', 'MAC ', '3', '200000', '2TB ROM,12GB RAM', 'uploads/laptop2.jpg'),
(10, 10, 'mobile', 'sarathchandhra365@gmail.com', 'Honor 7X', '8', '20000', '4GB RAM,64GB ROM', 'uploads/phone.jpg'),
(13, 10, '', 'sarathchandhra365@gmail.com', 'rhkvf', 'jdnew', '123', 'kdfcguewk', 'uploads/laptop3.jpg'),
(15, 10, 'laptops', 'sarathchandhra365@gmail.com', 'Dell Inspiron', '10', '100000', 'sdhvbksd', 'uploads/download (8).jpg'),
(16, 11, 'slippers', 'scssreddy.gudimetla@vitap.ac.in', 'Paragon', '3', '250', 'size:10', 'uploads/images (2).jpg'),
(17, 16, 'slippers', 'saideep.s@gmail.com', 'Slipper', '2', '300', 'pure leather size 10', 'uploads/download (9).jpg'),
(18, 16, 'mobiles', 'saideep.s@gmail.com', 'oneplus', '0', '20000', 'neversettle', 'uploads/oneplu7t.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sellersandusers`
--

CREATE TABLE `sellersandusers` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `uaid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sellersandusers`
--

INSERT INTO `sellersandusers` (`id`, `uid`, `sid`, `pid`, `uaid`) VALUES
(1, 10, 10, 6, 1),
(2, 11, 10, 6, 3),
(3, 11, 10, 9, 3),
(4, 11, 10, 6, 3),
(5, 10, 11, 16, 1),
(6, 11, 10, 7, 3),
(7, 16, 10, 7, 5),
(8, 11, 16, 17, 4),
(9, 17, 11, 16, 6),
(10, 16, 11, 16, 5),
(11, 17, 16, 18, 6);

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `id` int(11) NOT NULL,
  `ind` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `houseno` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`id`, `ind`, `name`, `houseno`, `city`, `state`, `phone`) VALUES
(10, 1, 'sarath', '3/4', 'Kommara,WestGodavari District', 'Andhra Pradesh', '08790360069'),
(10, 2, 'iofvjgvdhoigvndfk', '1234', 'jkdfvnfdlj', 'kfjnvdol', '795566984534'),
(11, 3, 'SatyaNarayana Reddy Gudimetla', '1234', 'Kommara,WestGodavari District', 'Andhra Pradesh', '08790360069'),
(11, 4, 'sai', '12/3', 'vijayawada', 'AndhraPradesh', '9554225019'),
(16, 5, 'saideep', '123/4', 'vijayawada', 'AndhraPradesh', '1234567890'),
(17, 6, 'susanth', '1/2/334', 'vijayawada', 'Andhra Pradesh', '08790360069');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(10, 'sarathchandhra365@gmail.com', 'sa'),
(11, 'scssreddy.gudimetla@vitap.ac.in', 'sar'),
(12, 'edarasanthan.1999@gmail.com', 'sss'),
(13, 'dhcdh', 'dcb'),
(14, 'pavansai@gmail.com', 'pavan'),
(15, 'abc@gmail.com', 'abc'),
(16, 'saideep.s@gmail.com', 'sai12345'),
(17, 'susanth.nsks@gmail.com', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sid` (`id`);

--
-- Indexes for table `sellersandusers`
--
ALTER TABLE `sellersandusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`ind`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `sellersandusers`
--
ALTER TABLE `sellersandusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `userdetails`
--
ALTER TABLE `userdetails`
  MODIFY `ind` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
