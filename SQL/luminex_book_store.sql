-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 11, 2021 at 05:36 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `luminex_book_store`
--
CREATE DATABASE IF NOT EXISTS `luminex_book_store` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `luminex_book_store`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `lastlogin` datetime NOT NULL,
  PRIMARY KEY (`aid`),
  UNIQUE KEY `aid` (`aid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `name`, `email`, `pwd`, `lastlogin`) VALUES
(1, 'Admin de luminex', 'admin@luminex.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', '2020-10-18 08:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

DROP TABLE IF EXISTS `branch`;
CREATE TABLE IF NOT EXISTS `branch` (
  `branch_id` int(100) NOT NULL AUTO_INCREMENT,
  `branch_name` varchar(100) NOT NULL,
  `branck_addrs` varchar(100) NOT NULL,
  PRIMARY KEY (`branch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_id`, `branch_name`, `branck_addrs`) VALUES
(1, 'Colombo', 'Somehwre,Somehwre,Somewhere'),
(2, 'Galle', 'Somehwre,Somehwre,Somewhere'),
(3, 'Jaffna', 'Somehwre,Somehwre,Somewhere');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(30) NOT NULL,
  `bid` int(11) NOT NULL,
  `qyt` int(11) NOT NULL,
  PRIMARY KEY (`cid`),
  UNIQUE KEY `cid` (`cid`),
  KEY `bid` (`bid`),
  KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cid`, `email`, `bid`, `qyt`) VALUES
(7, 'malshi@elpitiya.com', 5, 1),
(8, 'malshi@elpitiya.com', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `catID` int(11) NOT NULL AUTO_INCREMENT,
  `categories` varchar(10) NOT NULL,
  PRIMARY KEY (`catID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`catID`, `categories`) VALUES
(1, 'Fantasy'),
(2, 'Adventure'),
(3, 'Horror'),
(4, 'Mystery'),
(5, 'Sci-Fi'),
(6, 'Humor'),
(7, 'Children’s');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contactno` varchar(12) NOT NULL,
  `msg` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
CREATE TABLE IF NOT EXISTS `inventory` (
  `bid` int(11) NOT NULL AUTO_INCREMENT,
  `bookname` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `isbn` varchar(100) NOT NULL,
  `stock` int(11) NOT NULL,
  `price` float(10,2) NOT NULL,
  `category` varchar(50) NOT NULL,
  `bookPath` varchar(100) NOT NULL,
  `newArr` tinyint(1) NOT NULL,
  `bestSell` tinyint(1) NOT NULL,
  PRIMARY KEY (`bid`),
  UNIQUE KEY `bid` (`bid`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`bid`, `bookname`, `author`, `description`, `isbn`, `stock`, `price`, `category`, `bookPath`, `newArr`, `bestSell`) VALUES
(5, 'Harry Potter', 'J.k Rowling', 'Harry Potter is a series of seven fantasy novels written by British author, J. K. Rowling. The novels chronicle the lives of a young wizard, Harry Potter, and his friends Hermione Granger and Ron Weasley, all of whom are students at Hogwarts School of Witchcraft and Wizardry.', '56020010', 54, 1002.50, 'Mystery', 'books/Harry Potter/Harry Potter.jpg', 1, 1),
(6, 'Sherlock Holmes', 'Sir Arthur Conan Doyle', 'Traditionally, the canon of Sherlock Holmes consists of the 56 short stories and four novels written by Sir Arthur Conan Doyle. In this context, the term \"canon\" is an attempt to distinguish between Doyle\'s original works and subsequent works by other authors using the same characters. ', '10050030', 46, 850.00, 'Adventure', 'books/Sherlock Holmes\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 1, 1),
(10, 'Princess Diaries', 'Meg Cabot', 'The Princess Diaries is a series of epistolary young adult novels written by Meg Cabot, and is also the title of the first volume, published in 2000. The series revolves around Amelia \'Mia\' Thermopolis, a teenager in New York City who discovers that she is the princess of a small European principality called Genovia. ', '800500600', 99, 500.00, 'Fantasy', 'books/Princess Diaries', 1, 1),
(11, 'Percy Jackson', 'Rick Riodardn', 'The Lightning Thief is a 2005 American-fantasy-adventure novel based on Greek mythology, the first young adult novel written by Rick Riordan in the Percy Jackson & the Olympians series. It won the Adult Library Services Association Best Books for Young Adults, among other awards. ', '14563258', 50, 650.00, 'Adventure', 'books/Percy Jackson', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `dtm` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `bid` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `state` char(2) NOT NULL,
  PRIMARY KEY (`sid`),
  UNIQUE KEY `sid` (`sid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`sid`, `dtm`, `email`, `bid`, `qty`, `state`) VALUES
(1, '2020-10-20', 'admin@luminex.com', 5, 2, 'PE'),
(2, '2020-10-20', 'chamuditharavindu@gmail.com', 6, 1, 'SP'),
(3, '2020-10-23', 'chamuditharavindu.macr@gmail.com', 6, 2, 'DL');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `country` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `postalcode` varchar(10) NOT NULL,
  `contact` varchar(12) NOT NULL,
  PRIMARY KEY (`email`),
  UNIQUE KEY `uid` (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `name`, `email`, `pwd`, `country`, `address`, `city`, `postalcode`, `contact`) VALUES
(1, 'Chamuditha', 'chamuditha@gmail.com', '0071877d20a65c02d9a1654f109b97dc61416d1a', 'LK', 'somewhere, somewhere, somewhere', 'somewhere', '800500', '123456789'),
(9, 'Malshi', 'malshi@elpitiya.com', 'c0b2d772c9faba9c37228bdf18edb297983aec60', 'LK', 'Galle', 'Galle', '8000', '0123456789'),
(2, 'Chamuditha', 'someone@gmail.com', '0071877d20a65c02d9a1654f109b97dc61416d1a', 'LK', 'somewhere, somewhere, somewhere', 'somewhere', '800500', '123456789'),
(8, 'Chamuditha Ravindu', 'test@luminex.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'LK', 'somewhere, somewhere, somewhere', 'somewhere', '70200', '0768055155');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`bid`) REFERENCES `inventory` (`bid`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`email`) REFERENCES `users` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
