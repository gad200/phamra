-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2023 at 01:36 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharmacy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `name_admin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_admin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `name_admin`, `password_admin`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `nom_client` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_client` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id_client`, `nom_client`, `num_client`, `id_user`) VALUES
(86, 'Gad', '201024214263', 38),
(88, 'احمد', '01024214263', 38),
(89, 'Gad', '12', 38),
(90, 'Ahmed', '01923813', 38),
(91, 'Ahmed', '+201029333466', 38),
(92, 'shmr', '43343', 38),
(93, 'fdsg', '43', 38),
(94, 'ahmed', '434', 38),
(95, '433 htrr', '45678', 38),
(96, 'kl', '765', 38),
(97, '433 htrr', '1039348484', 38),
(98, '433 htrr', '201039348484', 38),
(99, '433 htrr', '201060534384', 38);

-- --------------------------------------------------------

--
-- Table structure for table `dwa`
--

CREATE TABLE `dwa` (
  `id_dwa` int(11) NOT NULL,
  `nom_dwa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_dwa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dwa`
--

INSERT INTO `dwa` (`id_dwa`, `nom_dwa`, `photo_dwa`) VALUES
(10, 'hama', NULL),
(12, 'Flowkazol', NULL),
(13, 'jusi', 'uploads/Screenshot 10_22_2023 1_06_42 AM.png'),
(15, 'janaa', NULL),
(16, 'jusi', NULL),
(19, 'hags', NULL),
(20, 'sd', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fin_form`
--

CREATE TABLE `fin_form` (
  `id_fin_form` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `fin_txt` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fin_form`
--

INSERT INTO `fin_form` (`id_fin_form`, `id_user`, `fin_txt`) VALUES
(9, 38, 'السلام عليكم هذا شكر خاص للعميل بالعميل لاكمال الجرعة الطبية ... نتمني لكم الشفاء الصحيح ... شكرا لكم\n');

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `id_form` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `text_form` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`id_form`, `id_user`, `text_form`) VALUES
(26, 38, 'السلام عليكم هذا تذكير خاص بالعميل اسم_العميل صاحب الرقم رقم_العميل .... يجب اخذ هذا الدواء الدواء لمدة عدد_الايام يوما كل عدد_الساعات ساعة ... من اجل سلامتكم والشفاء الصحيح ... شكرا لكم\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `id_manager` int(11) NOT NULL,
  `name_manager` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_manager` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`id_manager`, `name_manager`, `password_manager`, `created_date`) VALUES
(1, 'm222', 'm222', '2023-11-05 22:28:26');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_product` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_product`, `id_user`, `product_name`, `product_image`) VALUES
(116, 38, 'oill', 'm2.png'),
(117, 38, 'water', 'jana1.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id_sales` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_product` int(11) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `trt`
--

CREATE TABLE `trt` (
  `id_trt` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_dwa` int(11) NOT NULL,
  `days` int(11) NOT NULL,
  `hours` int(11) NOT NULL,
  `start_date` datetime NOT NULL DEFAULT current_timestamp(),
  `end_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trt`
--

INSERT INTO `trt` (`id_trt`, `id_client`, `id_dwa`, `days`, `hours`, `start_date`, `end_date`) VALUES
(61, 88, 12, 1, 1, '2023-11-27 08:22:51', '2023-11-27 06:22:51'),
(62, 89, 16, 1, 2, '2023-11-28 06:52:06', '2023-11-29 02:51:06'),
(63, 90, 15, 3, 2, '2023-12-02 11:43:26', '2023-12-05 09:43:26');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nom_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nom_user`, `phone`, `password_user`, `created_date`) VALUES
(38, 'ahmed', '+201024214263', '111', '2023-11-21 10:29:02'),
(39, 'Adel', '+2029837653', 'dada', '2023-11-21 14:03:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `dwa`
--
ALTER TABLE `dwa`
  ADD PRIMARY KEY (`id_dwa`);

--
-- Indexes for table `fin_form`
--
ALTER TABLE `fin_form`
  ADD PRIMARY KEY (`id_fin_form`),
  ADD KEY `form_fk_users` (`id_user`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id_form`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id_manager`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `sales_fk_user` (`id_user`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id_sales`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `sales_fk_clients` (`id_client`);

--
-- Indexes for table `trt`
--
ALTER TABLE `trt`
  ADD PRIMARY KEY (`id_trt`),
  ADD KEY `id_client` (`id_client`),
  ADD KEY `trt_fk_dwa` (`id_dwa`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `dwa`
--
ALTER TABLE `dwa`
  MODIFY `id_dwa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `fin_form`
--
ALTER TABLE `fin_form`
  MODIFY `id_fin_form` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `id_form` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `id_manager` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id_sales` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `trt`
--
ALTER TABLE `trt`
  MODIFY `id_trt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_fk_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fin_form`
--
ALTER TABLE `fin_form`
  ADD CONSTRAINT `form_fk_users` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `form`
--
ALTER TABLE `form`
  ADD CONSTRAINT `form_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_fk_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_fk_clients` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sales_fk_product` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sales_fk_users` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trt`
--
ALTER TABLE `trt`
  ADD CONSTRAINT `trt_fk_client` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trt_fk_dwa` FOREIGN KEY (`id_dwa`) REFERENCES `dwa` (`id_dwa`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
