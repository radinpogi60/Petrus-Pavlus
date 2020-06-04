-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2020 at 08:26 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`) VALUES
(1, 'PETRUS PAVLUS', 'maharlika', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `PTNICOE` varchar(255) NOT NULL,
  `control_no` varchar(255) NOT NULL,
  `date_reg` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `full_name`, `contact`, `address`, `PTNICOE`, `control_no`, `date_reg`, `status`) VALUES
(1, 'Radinpogi60', 'Radin Ben Zainal', '09201573361', 'Blk 74 Lot 36 A', '09215990985', '4114', '06/03/2020', 0),
(2, 'Radinpogi60', 'Radin Ben Zainal', '09201573361', 'Blk 74 Lot 36 A', '09215990985', '4114', '06/03/2020', 0),
(3, 'Radinpogi60', 'Radin Ben Zainal', '09201573361', 'Blk 74 Lot 36 A', '09215990985', '2332', '06/03/2020', 0),
(4, 'Rads', 'radsdasssd', '32141234123', 'qwerqewr34124124', '42143241234', '3241', '06/03/2020', 1),
(5, 'Rads', 'radsdasssd', '32141234123', 'qwerqewr34124124', '42143241234', '4123', '06/03/2020', 1),
(6, 'Rads', 'radsdasssd', '32141234123', 'qwerqewr34124124', '42143241234', '3421', '06/03/2020', 0),
(7, 'pogiiiiiiiii', 'pogiiiiiiiiiiiiii', '32141234123', 'qwerqewr34124124', '42143241234', '4321', '06/03/2020', 0),
(8, 'Rads', 'radsdasssd', '32141234123', 'qwerqewr34124124', '42143241234', '4333', '06/03/2020', 0),
(9, 'Rads', 'radsdasssd', '32141234123', 'qwerqewr34124124', '42143241234', '6456', '06/03/2020', 1),
(10, 'Rads', 'radsdasssd', '32141234123', 'qwerqewr34124124', '42143241234', '0921', '06/03/2020', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
