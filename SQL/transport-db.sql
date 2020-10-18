-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2020 at 08:44 AM
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
-- Table structure for table `account_balance`
--

CREATE TABLE `account_balance` (
  `account_balance_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `amount` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account_balance`
--

INSERT INTO `account_balance` (`account_balance_id`, `uid`, `amount`) VALUES
(1, 15, 100),
(3, 17, 300);

-- --------------------------------------------------------

--
-- Stand-in structure for view `customer_trips`
-- (See below for the actual view)
--
CREATE TABLE `customer_trips` (
`uid` int(11)
,`driver_id` int(11)
,`trip_date` date
,`trip_start_time` time
,`trip_auto_generate_id` varchar(10)
,`trip_amount` float
,`name` varchar(200)
,`bus_type` varchar(150)
,`bus_reg_number` varchar(150)
,`bus_start_location` varchar(200)
,`bus_end_location` varchar(200)
);

-- --------------------------------------------------------

--
-- Table structure for table `driver_trips`
--

CREATE TABLE `driver_trips` (
  `driver_trip_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `trip_amount` float NOT NULL,
  `trip_start_time` time NOT NULL,
  `trip_end_time` time NOT NULL,
  `trip_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `driver_trips`
--

INSERT INTO `driver_trips` (`driver_trip_id`, `uid`, `trip_amount`, `trip_start_time`, `trip_end_time`, `trip_date`) VALUES
(13, 16, 100, '01:41:32', '01:42:54', '2020-10-18'),
(14, 16, 100, '02:10:57', '00:00:00', '2020-10-18'),
(15, 16, 100, '02:14:23', '02:22:18', '2020-10-18'),
(16, 16, 100, '02:22:23', '02:24:59', '2020-10-18'),
(17, 18, 100, '03:46:48', '03:47:04', '2020-10-18');

-- --------------------------------------------------------

--
-- Table structure for table `driver_trip_count`
--

CREATE TABLE `driver_trip_count` (
  `trip_cound_id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `trip_count` int(11) NOT NULL DEFAULT 0,
  `trip_started` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `driver_trip_count`
--

INSERT INTO `driver_trip_count` (`trip_cound_id`, `driver_id`, `trip_count`, `trip_started`) VALUES
(1, 16, 11, 0),
(2, 18, 1, 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `driver_trip_report`
-- (See below for the actual view)
--
CREATE TABLE `driver_trip_report` (
`uid` int(11)
,`driver_trip_id` int(11)
,`trip_date` date
,`duration` time
,`passenger_count` bigint(21)
,`earnings` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `driver_view_details`
-- (See below for the actual view)
--
CREATE TABLE `driver_view_details` (
`uid` int(11)
,`user_identity_token` varchar(50)
,`name` varchar(200)
,`account_status` int(11)
,`amount` float
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `inspectorviewdetails`
-- (See below for the actual view)
--
CREATE TABLE `inspectorviewdetails` (
`uid` int(11)
,`user_identity_token` varchar(50)
,`account_status` int(11)
,`name` varchar(200)
,`count` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `payment_details_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `cardNumber` int(20) NOT NULL,
  `amount` float NOT NULL,
  `topup_date` date NOT NULL,
  `topup_time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_details`
--

INSERT INTO `payment_details` (`payment_details_id`, `uid`, `cardNumber`, `amount`, `topup_date`, `topup_time`) VALUES
(2, 15, 2147483647, 500, '2020-10-17', '2:58 pm'),
(3, 17, 2147483647, 600, '2020-10-18', '2:14 am');

-- --------------------------------------------------------

--
-- Stand-in structure for view `reportviewinspector`
-- (See below for the actual view)
--
CREATE TABLE `reportviewinspector` (
`inspectorUid` int(11)
,`report_id` int(11)
,`reportDate` date
,`user_identity_token` varchar(50)
,`name` varchar(200)
,`reportReason` varchar(1000)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `tokendetail`
-- (See below for the actual view)
--
CREATE TABLE `tokendetail` (
`uid` int(11)
,`user_identity_token` varchar(50)
,`account_status` int(11)
,`name` varchar(200)
);

-- --------------------------------------------------------

--
-- Table structure for table `trip_count`
--

CREATE TABLE `trip_count` (
  `trip_cound_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `count` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trip_count`
--

INSERT INTO `trip_count` (`trip_cound_id`, `uid`, `count`) VALUES
(1, 15, 6),
(2, 17, 3);

-- --------------------------------------------------------

--
-- Table structure for table `trip_details`
--

CREATE TABLE `trip_details` (
  `trip_details_id` int(11) NOT NULL,
  `trip_auto_generate_id` varchar(10) NOT NULL,
  `driver_trip_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `trip_start_time` time NOT NULL,
  `trip_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trip_details`
--

INSERT INTO `trip_details` (`trip_details_id`, `trip_auto_generate_id`, `driver_trip_id`, `uid`, `trip_start_time`, `trip_date`) VALUES
(21, '3acecb9d01', 13, 15, '01:41:52', '2020-10-18'),
(22, '9b0cc1cdba', 14, 15, '02:13:08', '2020-10-18'),
(23, 'c0497f69e7', 15, 15, '02:14:34', '2020-10-18'),
(24, 'c1a4b57a9f', 15, 17, '02:18:50', '2020-10-18'),
(25, 'fa63a50aba', 16, 15, '02:22:35', '2020-10-18'),
(26, 'efa8dc1ee8', 16, 17, '02:24:56', '2020-10-18'),
(27, '0aec8f5827', 17, 17, '03:46:57', '2020-10-18');

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
  `verified` int(1) NOT NULL,
  `role` int(11) NOT NULL,
  `qr_generated` int(1) NOT NULL DEFAULT 0,
  `account_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `user_identity_token`, `email`, `password`, `token`, `verified`, `role`, `qr_generated`, `account_status`) VALUES
(7, '27bb8f57beaf77a62830', 'admin@gmail.com', '$2y$10$bT5WDoR6mGA0w1FtjGS9ZeIa67n7XQNCbYourlSpFuVDDZEmMD.jm', '', 1, 3, 0, 0),
(9, '816ce5c5dffba29bfb82', 'test@gmail.com', '$2y$10$MkOwf2Fw4E82FccRmXQ2i.1Cu0ylHFLrgtxOMUZU.zYarEnhCfD5W', '', 1, 2, 0, 0),
(13, '0cb1db3e7a9feef1c60e', 'samanr@gmail.com', '$2y$10$hlCgF0GMclP7jTFP6ODMoe5sv/esaJET10011VhbCIpsTmwhY17hi', '', 1, 2, 0, 0),
(15, 'e1c60a09b407bbb6d270', 'malithdananjaya97@gmail.com', '$2y$10$3.FG.RdhbkD9Wp.2t4c7uuECvug.httbXTRbe2BWYg8bMiaEbNrte', '7cedf82db2d3ac956d107ea8c5b1f3b80f0d78e084b5436e26edb9fa6f94424c0f6cbc35af1d594c5a5b769436ae8a845fc6', 1, 0, 1, 0),
(16, 'c551a184567bc197d3ca', 'malithdananjayaofficial@gmail.com', '$2y$10$gOphZr9iqoaaZimpFKcNEuTEhk6lGNnIMuAYzIWF3.UgK/x7D7eAu', '5a89bf0a7527a2d168e05d1e034b4ab348db6abb680cb871b5e8884083b3072395a8467b0a377eb42321b9461085c4ff9fc6', 1, 1, 0, 0),
(17, 'f5cdf54530894a8c274a', 'isurubuddika12345@gmail.com', '$2y$10$H3VU0l2zMans/1bu5kwC1ubfLJm7ZdkPcsokimefUDoWI2IxOH3je', 'b881f762b60d614d3b164d04d57e96f7ec247a431d5d070556349cd563da2016b09419b48e4e16b478d2ee709c7bbd5eec59', 1, 0, 1, 0),
(18, 'cd2201be3a19e7a532f3', 'chathurachampika12345@gmail.com', '$2y$10$AIDoPCW6VWJGyzBdwDTyq.JUicmcoifbg.yUP829LivZwIwy/W78q', '3d16a9c95ebe6492a76a368b2c39caa4cb215cf27d0e744f6792feaad9becf760862a493416af774aa9e242947d3c89265c1', 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `user_details_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `inspector_employee_id` varchar(50) NOT NULL,
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

INSERT INTO `user_details` (`user_details_id`, `uid`, `inspector_employee_id`, `name`, `email`, `mobileNumber`, `bus_type`, `bus_reg_number`, `bus_start_location`, `bus_end_location`, `working_city`) VALUES
(7, 7, '', 'Admin', 'admin@gmail.com', '', '', '', '', '', ''),
(9, 9, 'EMP01', 'Test', 'test@gmail.com', '', '', '', '', '', 'Colombo'),
(13, 13, 'EMP02', 'Saman Rathnayake', 'samanr@gmail.com', '', '', '', '', '', 'Homagama'),
(15, 15, '', 'Malith', 'malithdananjaya97@gmail.com', '779023528', '', '', '', '', ''),
(16, 16, '', 'Malith Dhananjaya', 'malithdananjayaofficial@gmail.com', '', 'Rosa', 'Wp GG 4025', 'Homagama', 'Petta', ''),
(17, 17, '', 'isuru', 'isurubuddika12345@gmail.com', '776316811', '', '', '', '', ''),
(18, 18, '', 'Chathura', 'chathurachampika12345@gmail.com', '', 'Rosa Test', 'Wp GG 4025', 'Maharagama', 'Galle', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_reports`
--

CREATE TABLE `user_reports` (
  `report_id` int(11) NOT NULL,
  `passengerUid` int(11) NOT NULL,
  `inspectorUid` int(11) NOT NULL,
  `reportReason` varchar(1000) NOT NULL,
  `reportDate` date NOT NULL,
  `actionFromAdmin` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_reports`
--

INSERT INTO `user_reports` (`report_id`, `passengerUid`, `inspectorUid`, `reportReason`, `reportDate`, `actionFromAdmin`) VALUES
(4, 14, 13, 'test', '2020-10-16', 0),
(5, 17, 13, 'test', '2020-10-18', 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `user_reports_details`
-- (See below for the actual view)
--
CREATE TABLE `user_reports_details` (
`report_id` int(11)
,`reportReason` varchar(1000)
,`reportDate` date
,`name` varchar(200)
,`user_identity_token` varchar(50)
,`account_status` int(11)
,`inspector_employee_id` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure for view `customer_trips`
--
DROP TABLE IF EXISTS `customer_trips`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `customer_trips`  AS  select `t1`.`uid` AS `uid`,`t1`.`driver_id` AS `driver_id`,`t1`.`trip_date` AS `trip_date`,`t1`.`trip_start_time` AS `trip_start_time`,`t1`.`trip_auto_generate_id` AS `trip_auto_generate_id`,`t1`.`trip_amount` AS `trip_amount`,`user_details`.`name` AS `name`,`user_details`.`bus_type` AS `bus_type`,`user_details`.`bus_reg_number` AS `bus_reg_number`,`user_details`.`bus_start_location` AS `bus_start_location`,`user_details`.`bus_end_location` AS `bus_end_location` from ((select `trip_details`.`uid` AS `uid`,`driver_trips`.`uid` AS `driver_id`,`trip_details`.`trip_date` AS `trip_date`,`trip_details`.`trip_start_time` AS `trip_start_time`,`trip_details`.`trip_auto_generate_id` AS `trip_auto_generate_id`,`driver_trips`.`trip_amount` AS `trip_amount` from (`trip_details` join `driver_trips`) where `driver_trips`.`driver_trip_id` = `trip_details`.`driver_trip_id` order by `trip_details`.`uid` desc) `t1` left join `user_details` on(`user_details`.`uid` = `t1`.`driver_id`)) order by `t1`.`uid` ;

-- --------------------------------------------------------

--
-- Structure for view `driver_trip_report`
--
DROP TABLE IF EXISTS `driver_trip_report`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `driver_trip_report`  AS  select `driver_trips`.`uid` AS `uid`,`driver_trips`.`driver_trip_id` AS `driver_trip_id`,`driver_trips`.`trip_date` AS `trip_date`,timediff(`driver_trips`.`trip_end_time`,`driver_trips`.`trip_start_time`) AS `duration`,count(`trip_details`.`trip_details_id`) AS `passenger_count`,count(`trip_details`.`trip_details_id`) * `driver_trips`.`trip_amount` AS `earnings` from (`driver_trips` join `trip_details`) where `driver_trips`.`driver_trip_id` = `trip_details`.`driver_trip_id` group by `trip_details`.`driver_trip_id` ;

-- --------------------------------------------------------

--
-- Structure for view `driver_view_details`
--
DROP TABLE IF EXISTS `driver_view_details`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `driver_view_details`  AS  select `t1`.`uid` AS `uid`,`t1`.`user_identity_token` AS `user_identity_token`,`t1`.`name` AS `name`,`t1`.`account_status` AS `account_status`,`account_balance`.`amount` AS `amount` from ((select `users`.`uid` AS `uid`,`users`.`user_identity_token` AS `user_identity_token`,`user_details`.`name` AS `name`,`users`.`account_status` AS `account_status` from (`users` join `user_details`) where `users`.`uid` = `user_details`.`uid` and `users`.`role` = 0) `t1` left join `account_balance` on(`t1`.`uid` = `account_balance`.`uid`)) ;

-- --------------------------------------------------------

--
-- Structure for view `inspectorviewdetails`
--
DROP TABLE IF EXISTS `inspectorviewdetails`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `inspectorviewdetails`  AS  select `tokendetail`.`uid` AS `uid`,`tokendetail`.`user_identity_token` AS `user_identity_token`,`tokendetail`.`account_status` AS `account_status`,`tokendetail`.`name` AS `name`,`trip_count`.`count` AS `count` from (`tokendetail` left join `trip_count` on(`tokendetail`.`uid` = `trip_count`.`uid`)) ;

-- --------------------------------------------------------

--
-- Structure for view `reportviewinspector`
--
DROP TABLE IF EXISTS `reportviewinspector`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `reportviewinspector`  AS  select `user_reports`.`inspectorUid` AS `inspectorUid`,`user_reports`.`report_id` AS `report_id`,`user_reports`.`reportDate` AS `reportDate`,`users`.`user_identity_token` AS `user_identity_token`,`user_details`.`name` AS `name`,`user_reports`.`reportReason` AS `reportReason` from ((`user_reports` join `users`) join `user_details`) where `user_reports`.`passengerUid` = `users`.`uid` and `user_reports`.`passengerUid` = `user_details`.`uid` ;

-- --------------------------------------------------------

--
-- Structure for view `tokendetail`
--
DROP TABLE IF EXISTS `tokendetail`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tokendetail`  AS  select `users`.`uid` AS `uid`,`users`.`user_identity_token` AS `user_identity_token`,`users`.`account_status` AS `account_status`,`user_details`.`name` AS `name` from (`users` join `user_details`) where `users`.`uid` = `user_details`.`uid` ;

-- --------------------------------------------------------

--
-- Structure for view `user_reports_details`
--
DROP TABLE IF EXISTS `user_reports_details`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_reports_details`  AS  select `t1`.`report_id` AS `report_id`,`t1`.`reportReason` AS `reportReason`,`t1`.`reportDate` AS `reportDate`,`t1`.`name` AS `name`,`t1`.`user_identity_token` AS `user_identity_token`,`t1`.`account_status` AS `account_status`,`t2`.`inspector_employee_id` AS `inspector_employee_id` from ((select `user_reports`.`inspectorUid` AS `inspectorUid`,`user_reports`.`report_id` AS `report_id`,`user_reports`.`reportReason` AS `reportReason`,`user_reports`.`reportDate` AS `reportDate`,`user_details`.`name` AS `name`,`users`.`user_identity_token` AS `user_identity_token`,`users`.`account_status` AS `account_status` from ((`user_reports` join `users`) join `user_details`) where `user_reports`.`passengerUid` = `users`.`uid` and `users`.`uid` = `user_details`.`uid` and `user_reports`.`passengerUid` = `user_details`.`uid`) `t1` left join (select `user_details`.`inspector_employee_id` AS `inspector_employee_id`,`user_reports`.`inspectorUid` AS `inspectorUid` from (`user_reports` join `user_details`) where `user_reports`.`inspectorUid` = `user_details`.`uid`) `t2` on(`t1`.`inspectorUid` = `t2`.`inspectorUid`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_balance`
--
ALTER TABLE `account_balance`
  ADD PRIMARY KEY (`account_balance_id`);

--
-- Indexes for table `driver_trips`
--
ALTER TABLE `driver_trips`
  ADD PRIMARY KEY (`driver_trip_id`);

--
-- Indexes for table `driver_trip_count`
--
ALTER TABLE `driver_trip_count`
  ADD PRIMARY KEY (`trip_cound_id`);

--
-- Indexes for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`payment_details_id`);

--
-- Indexes for table `trip_count`
--
ALTER TABLE `trip_count`
  ADD PRIMARY KEY (`trip_cound_id`);

--
-- Indexes for table `trip_details`
--
ALTER TABLE `trip_details`
  ADD PRIMARY KEY (`trip_details_id`);

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
-- Indexes for table `user_reports`
--
ALTER TABLE `user_reports`
  ADD PRIMARY KEY (`report_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_balance`
--
ALTER TABLE `account_balance`
  MODIFY `account_balance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `driver_trips`
--
ALTER TABLE `driver_trips`
  MODIFY `driver_trip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `driver_trip_count`
--
ALTER TABLE `driver_trip_count`
  MODIFY `trip_cound_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment_details`
--
ALTER TABLE `payment_details`
  MODIFY `payment_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `trip_count`
--
ALTER TABLE `trip_count`
  MODIFY `trip_cound_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trip_details`
--
ALTER TABLE `trip_details`
  MODIFY `trip_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `user_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_reports`
--
ALTER TABLE `user_reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
