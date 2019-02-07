-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 05, 2019 at 09:43 PM
-- Server version: 5.7.24-0ubuntu0.18.04.1
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `natview`
--

-- --------------------------------------------------------

--
-- Table structure for table `plates`
--

CREATE TABLE `plates` (
  `id` int(11) NOT NULL,
  `lga` varchar(3) NOT NULL,
  `plate_no` varchar(8) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plates`
--

INSERT INTO `plates` (`id`, `lga`, `plate_no`, `date`) VALUES
(1, 'KUJ', 'KUJ001AA', '2019-02-05 12:11:41'),
(2, 'KUJ', 'KUJ002AA', '2019-02-05 12:11:41'),
(3, 'GWA', 'GWA001AA', '2019-02-05 17:54:52'),
(4, 'GWA', 'GWA002AA', '2019-02-05 17:54:52'),
(5, 'GWA', 'GWA003AA', '2019-02-05 17:54:52'),
(6, 'GWA', 'GWA004AA', '2019-02-05 17:54:53'),
(7, 'GWA', 'GWA005AA', '2019-02-05 17:54:53'),
(8, 'GWA', 'GWA006AA', '2019-02-05 17:55:10'),
(9, 'GWA', 'GWA007AA', '2019-02-05 17:55:10'),
(10, 'GWA', 'GWA008AA', '2019-02-05 17:55:10'),
(11, 'GWA', 'GWA009AA', '2019-02-05 17:55:10'),
(12, 'GWA', 'GWA010AA', '2019-02-05 17:55:10'),
(13, 'KUJ', 'KUJ003AA', '2019-02-05 17:55:22'),
(14, 'KUJ', 'KUJ004AA', '2019-02-05 17:55:22'),
(15, 'KUJ', 'KUJ005AA', '2019-02-05 17:55:22'),
(16, 'KUJ', 'KUJ006AA', '2019-02-05 17:55:22'),
(17, 'KUJ', 'KUJ007AA', '2019-02-05 17:55:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `plates`
--
ALTER TABLE `plates`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `plates`
--
ALTER TABLE `plates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
