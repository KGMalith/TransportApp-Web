-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2020 at 10:09 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `transport-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `user_identity_token` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(150) NOT NULL,
  `token` varchar(100) NOT NULL,
  `verified` tinyint(1) NOT NULL,
  `role` int(11) NOT NULL,
  `qr_generated` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `user_identity_token`, `email`, `password`, `token`, `verified`, `role`, `qr_generated`) VALUES
(1, '', 'test@gmail.com', '$2y$10$8pBcGswxJtOmtkiXtEHd8ukdnh/ZPCKysvxhfHXnAij0ju33F4Uzy', '', 0, 0, 0),
(2, '', 'test2@gmail.com', '$2y$10$vzH1DwAioTw2dFolDU9p6uw2r1HPGYMz7vP.J0hZrXafzmZEF5IeO', '', 0, 0, 0),
(4, '', 'malithdananjaya97@gmail.com', '$2y$10$6ZDHveOXPzhPsYiMpnOZSeSHL5FD/.hCkaF06Dk/krQoQBR2h4V0G', '09001c666ed2fec21ab20dd12c14ff74138368712818c952cd6349e58e7eb546492451066efb9373dfabd29e58ea3efd1e54', 1, 0, 0),
(5, 'f4f281ea91404886bda5', 'malithdananjayaofficial@gmail.com', '$2y$10$FfEUBuoBRtibNCuvMWaoxuyu.wOGm25ZEuJdTM5vNdGL4RkvxQ0AO', 'f43e8cddfcd00ace79717cae2f7e9a18f806feed933320f7bf93db13ba93a7b69e6584ce11f12f1853dd22bd694dab96ec1d', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `user_details_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobileNumber` varchar(15) NOT NULL,
  `bus_type` varchar(150) NOT NULL,
  `bus_reg_number` varchar(150) NOT NULL,
  `bus_start_location` varchar(200) NOT NULL,
  `bus_end_location` varchar(200) NOT NULL,
  `working_city` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_details_id`, `uid`, `name`, `email`, `mobileNumber`, `bus_type`, `bus_reg_number`, `bus_start_location`, `bus_end_location`, `working_city`) VALUES
(1, 1, 'test', 'test@gmail.com', '776316717', '', '', '', '', ''),
(2, 2, 'test2', 'test2@gmail.com', '776316811', '', '', '', '', ''),
(4, 4, 'Malith', 'malithdananjaya97@gmail.com', '776316811', '', '', '', '', ''),
(5, 5, 'test', 'malithdananjayaofficial@gmail.com', '', 'Rosa', 'Wp GG 4025', 'Homagama', 'Petta', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_details_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `user_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
