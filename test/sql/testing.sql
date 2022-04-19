-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2022 at 04:47 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testing`
--

-- --------------------------------------------------------

--
-- Table structure for table `donate`
--

CREATE TABLE `donate` (
  `id` int(15) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `donate` int(100) DEFAULT 0,
  `expenses` int(100) DEFAULT 0,
  `income` int(100) DEFAULT 0,
  `totalExpenses` int(100) DEFAULT 0,
  `status` varchar(100) NOT NULL DEFAULT 'dependApproval'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `donate`
--

INSERT INTO `donate` (`id`, `fname`, `lname`, `donate`, `expenses`, `income`, `totalExpenses`, `status`) VALUES
(26, 'fardee', 'useng', 123, 0, 1658, 843, 'dependApproval'),
(28, 'fardee', 'useng', 10000, 0, 10123, 0, 'dependApproval'),
(29, 'maran', 'katae', 0, 500, 10123, 500, 'Approve'),
(31, 'maran', 'katae', 0, 200, 1200, 700, 'approve'),
(37, 'maran', 'katae', 0, 123, 2334, 623, 'approve'),
(49, 'ameen', 'kuchami', 455, 0, 2448, 823, 'Approve'),
(50, 'fardee', 'useng', 123, 0, 2288, 823, 'Approve'),
(51, 'fardee', 'useng', 123, 0, 2288, 823, 'Approve'),
(52, 'fardee', 'kuchami', 220, 0, 2631, 823, 'Approve'),
(53, 'Ameen', 'katae', 0, 123, 921, 946, 'dependApproval');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donate`
--
ALTER TABLE `donate`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donate`
--
ALTER TABLE `donate`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
