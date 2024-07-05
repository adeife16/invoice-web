-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2023 at 05:40 AM
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
-- Database: `switch`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(100) NOT NULL,
  `product_id` varchar(200) NOT NULL,
  `build` varchar(200) NOT NULL,
  `imei` varchar(100) DEFAULT NULL,
  `color` int(20) NOT NULL,
  `category` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'sold',
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `name` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_id`, `name`, `username`, `password`) VALUES
(1, '3453t35t4u4tgghuu54y', 0, 'admin', '$2y$10$hSGaJ9y9DCQsBEdUUgtfX.hz61VPbwvTXri6MeuOEfuRJ6knEIfla');

-- --------------------------------------------------------

--
-- Table structure for table `web_order`
--

CREATE TABLE `web_order` (
  `id` int(11) NOT NULL,
  `order_id` varchar(200) NOT NULL,
  `invoice_id` varchar(100) NOT NULL,
  `product` varchar(200) NOT NULL,
  `imei` varchar(200) NOT NULL,
  `color` varchar(100) NOT NULL,
  `memory` varchar(100) NOT NULL,
  `amount` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `web_order`
--

INSERT INTO `web_order` (`id`, `order_id`, `invoice_id`, `product`, `imei`, `color`, `memory`, `amount`) VALUES
(1, '32abede1fff69ab411e8', 'SW-00001', 'Samsung Galazy S22 Ultra', '3436588056453455', 'Black', '256', 750000),
(2, '32abede1fff69ab411e8', 'SW-00001', 'Iphone 4 Pro', '63457874357658679', 'Blue', '128', 1100000),
(3, '32abede1fff69ab411e8', 'SW-00001', 'Huawei Note 9', '8784639486349832347', 'Gold', '512', 500000),
(4, '10d30803e9450b5a1c1f', 'SW-00002', 'Samsung', '8743873834885745858', 'Black', '256', 340000),
(5, '10d30803e9450b5a1c1f', 'SW-00002', 'Iphone 12 Pro Max', '63633662823764', 'Black', '256', 500000),
(6, '10d30803e9450b5a1c1f', 'SW-00002', 'JBL FLIP 5', 'GT0042-IL01120', 'Black', '', 40000);

-- --------------------------------------------------------

--
-- Table structure for table `web_sales`
--

CREATE TABLE `web_sales` (
  `id` int(200) NOT NULL,
  `order_id` varchar(200) NOT NULL,
  `invoice_id` varchar(100) NOT NULL,
  `customer` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(50) NOT NULL,
  `total` int(100) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `web_sales`
--

INSERT INTO `web_sales` (`id`, `order_id`, `invoice_id`, `customer`, `address`, `phone`, `total`, `date_created`) VALUES
(1, '32abede1fff69ab411e8', 'SW-00001', 'Adepoju Jamiu', 'Ikeja', '0906754137', 2350000, '2023-01-20'),
(2, '10d30803e9450b5a1c1f', 'SW-00002', 'Opeyemi Dada', '39 iyabode akinola street eledi estate ota', '08151298486', 880000, '2023-01-20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_id` (`product_id`),
  ADD UNIQUE KEY `imei` (`imei`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `web_order`
--
ALTER TABLE `web_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_sales`
--
ALTER TABLE `web_sales`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_id` (`order_id`),
  ADD UNIQUE KEY `invoice_id` (`invoice_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `web_order`
--
ALTER TABLE `web_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `web_sales`
--
ALTER TABLE `web_sales`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
