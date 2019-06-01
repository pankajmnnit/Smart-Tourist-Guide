-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2019 at 01:34 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sctdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `habits`
--

CREATE TABLE `habits` (
  `userId` int(11) NOT NULL,
  `habits` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `habits`
--

INSERT INTO `habits` (`userId`, `habits`) VALUES
(6, 'lunch,');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `userId` int(11) NOT NULL,
  `country` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(60) NOT NULL,
  `mob` decimal(10,0) NOT NULL,
  `pass` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `name`, `dob`, `gender`, `email`, `mob`, `pass`) VALUES
(6, 'aman', '0000-00-00', '', 'a@g', '0', 'aman'),
(7, '', '0000-00-00', '', '', '0', ''),
(8, '', '0000-00-00', '', '', '0', ''),
(9, 'pankaj', '2019-04-16', 'male', 'p@g', '0', '123'),
(10, 'johny sins', '1996-09-07', 'male', 'h@g.com', '0', '1234'),
(11, 'Aman', '1995-01-25', 'male', 'aman2018is14@gmail.com', '0', 'aman1122'),
(12, '', '0000-00-00', 'male', '', '0', 'fdsff'),
(13, '', '0000-00-00', '', 'GHZHS', '0', ''),
(14, 'jxdsgsf', '2019-04-08', 'male', 'usgsy', '0', '123'),
(15, 'jxdsgsf', '2019-04-08', 'male', 'usas', '0', '123'),
(16, 'Saurav', '1995-11-10', 'male', 'sauravchandra.mnnit@gmail.com', '0', 'qwerty123'),
(17, 'sachin', '1995-10-16', 'male', 'sachinsharma.mnnit@gmail.com', '0', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `schedule1`
--

CREATE TABLE `schedule1` (
  `userId` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `stime` varchar(10) NOT NULL,
  `etime` varchar(10) NOT NULL,
  `date1` varchar(11) NOT NULL,
  `likes` varchar(100) NOT NULL,
  `city` varchar(20) NOT NULL,
  `lstime` varchar(20) DEFAULT NULL,
  `letime` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule1`
--

INSERT INTO `schedule1` (`userId`, `day`, `stime`, `etime`, `date1`, `likes`, `city`, `lstime`, `letime`) VALUES
(10, 5, '10:00', '12:00', '2019-04-19', 'Coffee,Food,Historic Sites,', 'Aligarh', '9:00', '23:00'),
(6, 4, '11:00', '18:00', '2019-04-18', 'resturant,coffee,temple,', 'allahabad', '9:00', '23:00'),
(11, 4, '11:00', '22:00', '2019-04-18', 'resturant,coffee,temple,', 'allahabad', '9:00', '23:00'),
(11, 1, '8:00', '13:00', '2019-04-22', 'resturant,coffee,shopping,historic sites,dinner,', 'allahabad', '9:00', '23:00'),
(11, 2, '12', '6', '2019-04-23', 'resturant,historic sites,lunch,', 'haldwani', '9:00', '23:00'),
(11, 5, '6:00', '15:00', '2019-04-26', 'restaurant,coffee,food,shopping,historic sites,temple,', 'kanpur', '9:00', '23:00'),
(11, 1, '12', '15', '2019-04-15', 'restaurant,coffee,food,shopping,historic sites,temple,lunch,dinner,', 'delhi', '9:00', '23:00'),
(17, 5, '17', '21', '2019-04-26', 'restaurant,food,temple,lunch,', 'allahabad', '9:00', '23:00'),
(11, 0, '13:30', '18:00', '2019-04-28', 'restaurant,breakfast,', 'noida', '9:00', '23:00'),
(11, 1, '8:00', '13:00', '2019-04-29', 'restaurant,coffee,food,shopping,historic sites,temple,', 'allahabad', '9:00', '23:00'),
(16, 1, '06', '04', '2019-04-29', 'restaurant,coffee,food,temple,', 'allahabad', '9:00', '23:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `habits`
--
ALTER TABLE `habits`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD KEY `fk1` (`userId`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule1`
--
ALTER TABLE `schedule1`
  ADD KEY `userId` (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `habits`
--
ALTER TABLE `habits`
  ADD CONSTRAINT `fk2` FOREIGN KEY (`userId`) REFERENCES `registration` (`id`);

--
-- Constraints for table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`userId`) REFERENCES `registration` (`id`);

--
-- Constraints for table `schedule1`
--
ALTER TABLE `schedule1`
  ADD CONSTRAINT `schedule1_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `registration` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
