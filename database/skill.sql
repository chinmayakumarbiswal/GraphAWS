-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2021 at 02:10 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skill`
--

-- --------------------------------------------------------

--
-- Table structure for table `sen1`
--

CREATE TABLE `sen1` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `data` text NOT NULL,
  `desc` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sen1`
--

INSERT INTO `sen1` (`id`, `name`, `data`, `desc`, `type`) VALUES
(1, 'alpha', '[{\"time\":1632398903,\"temp\":8},{\"time\":1632398904,\"temp\":1},{\"time\":1632398906,\"temp\":8},{\"time\":1632398907,\"temp\":1},{\"time\":1632398909,\"temp\":5},{\"time\":1632398910,\"temp\":7}]', 'temp', 'c'),
(2, 'beta', '[{\"time\":1632398903,\"temp\":15},{\"time\":1632398904,\"temp\":20},{\"time\":1632398906,\"temp\":20},{\"time\":1632398907,\"temp\":11},{\"time\":1632398909,\"temp\":12},{\"time\":1632398910,\"temp\":11}]', 'Temp of unit x', 'c'),
(3, 'gamma', '[{\"time\":1632398903,\"temp\":28},{\"time\":1632398904,\"temp\":29},{\"time\":1632398906,\"temp\":30},{\"time\":1632398907,\"temp\":24},{\"time\":1632398909,\"temp\":27},{\"time\":1632398910,\"temp\":30}]', 'Distance in km', 'Km'),
(4, 'delta', '[{\"time\":1632398901,\"temp\":21},{\"time\":1632398903,\"temp\":20},{\"time\":1632398904,\"temp\":14},{\"time\":1632398906,\"temp\":5},{\"time\":1632398907,\"temp\":38},{\"time\":1632398909,\"temp\":6}]', 'Distance in km', 'Km'),
(5, 'kappa', '[{\"time\":1632398903,\"temp\":14},{\"time\":1632398904,\"temp\":17},{\"time\":1632398906,\"temp\":99},{\"time\":1632398907,\"temp\":46},{\"time\":1632398909,\"temp\":62},{\"time\":1632398910,\"temp\":10}]', 'Distance in km', 'Km'),
(6, 'omega', '[{\"time\":1632398903,\"temp\":12},{\"time\":1632398904,\"temp\":24},{\"time\":1632398906,\"temp\":20},{\"time\":1632398907,\"temp\":49},{\"time\":1632398909,\"temp\":77},{\"time\":1632398910,\"temp\":44}]', 'Distance in km', 'Km');

-- --------------------------------------------------------

--
-- Table structure for table `userdt`
--

CREATE TABLE `userdt` (
  `id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdt`
--

INSERT INTO `userdt` (`id`, `email`, `pass`) VALUES
(1, '@chinmayakumarbiswal.in', 'situ'),
(3, '@gmail.com', 'situ'),
(4, 'ch@gmail.com', 'situ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sen1`
--
ALTER TABLE `sen1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userdt`
--
ALTER TABLE `userdt`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sen1`
--
ALTER TABLE `sen1`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `userdt`
--
ALTER TABLE `userdt`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
