-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2019 at 09:04 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `practice_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `form_validation`
--

CREATE TABLE `form_validation` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `website` varchar(30) NOT NULL,
  `comments` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_validation`
--

INSERT INTO `form_validation` (`id`, `username`, `email`, `gender`, `website`, `comments`) VALUES
(2, 'sharath mohan', 'sharathmohan50@gmail.com', 'male', 'www.sharathmoahn.com', 'hello world how is today...'),
(18, 'veena', 'veena@mail.com', 'female', 'www.techworld.co.in', 'tech things'),
(40, 'rudresh', 'rudresh000@mail.com', 'male', 'www.rudresh.com', 'hello world this is my anonymous name...'),
(42, 'kiran', 'kiran@yahoomail.com', 'male', 'www.yahoopartner.com', 'hello');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `form_validation`
--
ALTER TABLE `form_validation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `form_validation`
--
ALTER TABLE `form_validation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
