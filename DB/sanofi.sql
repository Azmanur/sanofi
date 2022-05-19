-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2022 at 11:01 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sanofi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `registration_date`, `token`) VALUES
(1, 'Saadman Shahin', 'shafiqulshahin363@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2022-05-15 05:54:17', '79c9209feb33e74f6eb54719420d60');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `date_time` datetime DEFAULT current_timestamp(),
  `serial` varchar(10) DEFAULT NULL,
  `status` text NOT NULL DEFAULT 'unpaid'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `contact_no` varchar(20) DEFAULT NULL,
  `imgpath` varchar(1000) DEFAULT NULL,
  `token` varchar(100) DEFAULT NULL,
  `featured` varchar(10) NOT NULL DEFAULT 'no',
  `featured_date` date DEFAULT NULL,
  `speciality` varchar(20) DEFAULT NULL,
  `visit_fee` varchar(10) DEFAULT NULL,
  `chamber_time_start` varchar(10) DEFAULT NULL,
  `chamber_time_end` varchar(10) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `reg_date` datetime NOT NULL DEFAULT current_timestamp(),
  `meet_link` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` int(11) NOT NULL,
  `ref_id` int(11) DEFAULT NULL,
  `ref_type` varchar(30) DEFAULT NULL,
  `remark` varchar(30) DEFAULT NULL,
  `fee_amount` varchar(30) DEFAULT NULL,
  `date_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `shipping_charge` decimal(10,0) NOT NULL,
  `stock` int(11) NOT NULL,
  `product_availability` varchar(255) NOT NULL,
  `feature` varchar(255) NOT NULL,
  `posting_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`id`, `name`, `company`, `price`, `image1`, `image2`, `image3`, `description`, `shipping_charge`, `stock`, `product_availability`, `feature`, `posting_date`) VALUES
(30, 'Ace', 'Sqare', '3', 'ace.jpg', '', '', 'Tablet', '0', 10, 'In Stock', 'yes', '2022-05-15 05:55:36'),
(31, 'Fexo', 'Sqare', '3', 'fexo.jpg', '', '', 'Tablet', '0', 10, 'In Stock', 'yes', '2022-05-15 05:55:57'),
(32, 'Napa', 'Sqare', '3', 'napa.jpg', '', '', 'Tablet', '0', 100, 'In Stock', 'yes', '2022-05-15 07:17:08'),
(33, 'Neo', 'Sqare', '50', 'neo.jpg', '', '', 'Sirup', '0', 10, 'Out of Stock', 'yes', '2022-05-15 07:17:42'),
(34, 'Vicks', 'Sqare', '50', 'vicks.jpg', '', '', 'Tablet', '0', 10, 'In Stock', 'yes', '2022-05-15 07:18:16'),
(35, 'Vitamin A', 'Sqare', '5', 'vitamin a.jpg', '', '', 'Tablet', '0', 10, 'Out of Stock', 'yes', '2022-05-15 07:18:53');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_orders`
--

CREATE TABLE `medicine_orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `orderdate` timestamp NULL DEFAULT current_timestamp(),
  `amount` bigint(20) DEFAULT NULL,
  `order_status` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `payment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicine_orders`
--

INSERT INTO `medicine_orders` (`id`, `user_id`, `product_id`, `quantity`, `orderdate`, `amount`, `order_status`, `address`, `payment`) VALUES
(143, 11, 30, 1, '2022-05-15 07:14:09', 3, 'Delivered', 'Gulshan', 'bkash'),
(144, 11, 34, 1, '2022-05-15 08:56:59', 50, 'in Process', 'Gulshan', 'bkash'),
(145, 11, 34, 1, '2022-05-15 08:59:04', 50, 'in Process', 'Gulshan', 'Nagad');

-- --------------------------------------------------------

--
-- Table structure for table `med_orders_medicine`
--

CREATE TABLE `med_orders_medicine` (
  `order_id` int(11) NOT NULL,
  `medicine_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `productreviews`
--

CREATE TABLE `productreviews` (
  `id` int(11) NOT NULL,
  `productId` int(11) DEFAULT NULL,
  `quality` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `review` longtext DEFAULT NULL,
  `reviewDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `ratting` int(11) NOT NULL,
  `isapproved` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ratting`
--

CREATE TABLE `ratting` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `ratting` int(11) NOT NULL,
  `review` varchar(255) NOT NULL,
  `pid` int(11) NOT NULL,
  `isapproved` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `shipping_address` longtext DEFAULT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL,
  `point` int(11) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `contact_no`, `shipping_address`, `registration_date`, `status`, `point`, `token`) VALUES
(11, 'Saadman Shahin', 'shafiqulshahin363@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '12345', 'Gulshan', '2022-05-15 05:50:46', 0, 0, '47536e9d5ab842840143ba872cb45c');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `list_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `medicine_id` int(11) NOT NULL,
  `posting date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine_orders`
--
ALTER TABLE `medicine_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKorders438149` (`user_id`);

--
-- Indexes for table `med_orders_medicine`
--
ALTER TABLE `med_orders_medicine`
  ADD PRIMARY KEY (`order_id`,`medicine_id`),
  ADD KEY `FKproducts_o292795` (`order_id`),
  ADD KEY `FKproducts_o914777` (`medicine_id`);

--
-- Indexes for table `productreviews`
--
ALTER TABLE `productreviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratting`
--
ALTER TABLE `ratting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`list_id`),
  ADD KEY `FKwishlist308861` (`user_id`),
  ADD KEY `FKwishlist616636` (`medicine_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `medicine_orders`
--
ALTER TABLE `medicine_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `productreviews`
--
ALTER TABLE `productreviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ratting`
--
ALTER TABLE `ratting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `list_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `medicine_orders`
--
ALTER TABLE `medicine_orders`
  ADD CONSTRAINT `FKorders438149` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `med_orders_medicine`
--
ALTER TABLE `med_orders_medicine`
  ADD CONSTRAINT `FKproducts_o292795` FOREIGN KEY (`order_id`) REFERENCES `medicine_orders` (`id`),
  ADD CONSTRAINT `FKproducts_o914777` FOREIGN KEY (`medicine_id`) REFERENCES `medicine` (`id`);

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `FKwishlist308861` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FKwishlist616636` FOREIGN KEY (`medicine_id`) REFERENCES `medicine` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
