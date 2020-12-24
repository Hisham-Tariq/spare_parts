-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 05, 2020 at 06:36 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `electronics_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `Product_Name` text NOT NULL,
  `Category_Name` text NOT NULL,
  `Product_Brand` text NOT NULL,
  `Product_Model` text NOT NULL,
  `Product_Code` text NOT NULL,
  `Product_Quantity` int(255) NOT NULL,
  `Product_Size` text NOT NULL,
  `Product_Color` text NOT NULL,
  `Product_PurchasePrice` double NOT NULL,
  `Product_Retail_Price` double NOT NULL,
  `Product_Status` text NOT NULL,
  `Product_Discounted_Price` double NOT NULL,
  `Product_Purchase_Date` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `filelocation` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `Product_Name`, `Category_Name`, `Product_Brand`, `Product_Model`, `Product_Code`, `Product_Quantity`, `Product_Size`, `Product_Color`, `Product_PurchasePrice`, `Product_Retail_Price`, `Product_Status`, `Product_Discounted_Price`, `Product_Purchase_Date`, `filelocation`) VALUES
(1, 'Oven', 'Microwave Oven', 'Dowlance', 'CXT091', '809271', 15, 'small', 'green', 15650, 19200, 'available', 19200, '2020-10-03 09:06:02.697077', ''),
(2, 'Oven', 'Microwave Oven', 'Dowlance', 'CXT091', '809271', 15, 'small', 'green', 15650, 19200, 'available', 19200, '2020-10-05 06:35:35.733741', 'localhost/myaps/uploads/20882368_833021030200286_1536985728476220008_n.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
