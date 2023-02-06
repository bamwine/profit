-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2017 at 10:38 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `profit`
--

-- --------------------------------------------------------

--
-- Table structure for table `reg`
--

CREATE TABLE `reg` (
  `id` int(100) NOT NULL,
  `names` varchar(100) NOT NULL,
  `age` varchar(100) NOT NULL,
  `food` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reg`
--

INSERT INTO `reg` (`id`, `names`, `age`, `food`) VALUES
(1, 'vvvv', 'vv', 'vv');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accounts`
--

CREATE TABLE `tbl_accounts` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `acc_no` varchar(20) NOT NULL,
  `type` varchar(10) NOT NULL,
  `balance` double NOT NULL,
  `pin` int(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `bdate` varchar(100) NOT NULL,
  `current_bak` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accountsc`
--

CREATE TABLE `tbl_accountsc` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `acc_no` varchar(20) NOT NULL,
  `type` varchar(10) NOT NULL,
  `balance` double NOT NULL,
  `pin` int(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `bdate` varchar(100) NOT NULL,
  `current_bak` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_accountsc`
--

INSERT INTO `tbl_accountsc` (`id`, `user_id`, `acc_no`, `type`, `balance`, `pin`, `status`, `bdate`, `current_bak`) VALUES
(1, 4, '1343756497', 'CA', 0, 12345, 'ACTIVE', '', 'centnarty bank'),
(2, 6, '1285743613', 'FDA', 1599523, 3333333, 'ACTIVE', '141th', 'gfggdgdfgdgd'),
(3, 7, '1240924910', 'SA', 0, 222222, 'INACTIVE', '020440', 'vxcvcvxv'),
(4, 9, '1343987766', 'CA', 0, 111111, 'INACTIVE', '041849', 'hfhfghfghfghfhfgh');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_address`
--

CREATE TABLE `tbl_address` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(40) NOT NULL,
  `state` varchar(40) NOT NULL,
  `zipcode` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_addressc`
--

CREATE TABLE `tbl_addressc` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(40) NOT NULL,
  `state` varchar(40) NOT NULL,
  `zipcode` int(10) NOT NULL,
  `country` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_addressc`
--

INSERT INTO `tbl_addressc` (`id`, `user_id`, `address`, `city`, `state`, `zipcode`, `country`) VALUES
(1, 3, 'kamasdddadasddadasd adasdasdada', 'kampala', 'uganda', 256, ''),
(2, 4, 'sddsfdfsdfsfdffsf sdfsfsdfsfsf', 'kampala', 'uganda', 256, ''),
(3, 5, 'hhgjghjjgjh fhhjjghjjgjgj thth', 'kampala', 'uganda', 256, ''),
(4, 6, 'xvdvsdfd dfsfsfsfsf', 'kampala', 'uganda', 256, ''),
(5, 7, 'bbbbvbbcbv', 'cbvbcbcbvbc', 'xcvvbv', 256, ''),
(6, 9, 'nghjhgjhjgjghjggh   rthfhrhrtyrtyut ttyrtyrtyry', 'kampala', 'uganda', 256, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_loans`
--

CREATE TABLE `tbl_loans` (
  `id` int(10) NOT NULL,
  `userIdl` int(100) NOT NULL,
  `tx_nol` varchar(20) NOT NULL,
  `tx_typel` varchar(10) NOT NULL,
  `amountl` double NOT NULL,
  `datel` varchar(100) NOT NULL,
  `descriptionl` varchar(100) NOT NULL,
  `to_accnol` varchar(20) NOT NULL,
  `statusl` varchar(10) NOT NULL,
  `tdatel` varchar(40) NOT NULL,
  `commentsl` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_loansc`
--

CREATE TABLE `tbl_loansc` (
  `id` int(10) NOT NULL,
  `userIdl` int(100) NOT NULL,
  `tx_nol` varchar(20) NOT NULL,
  `tx_typel` varchar(10) NOT NULL,
  `amountl` double NOT NULL,
  `datel` varchar(100) NOT NULL,
  `descriptionl` varchar(100) NOT NULL,
  `to_accnol` varchar(20) NOT NULL,
  `statusl` varchar(10) NOT NULL,
  `tdatel` varchar(40) NOT NULL,
  `commentsl` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_loansc`
--

INSERT INTO `tbl_loansc` (`id`, `userIdl`, `tx_nol`, `tx_typel`, `amountl`, `datel`, `descriptionl`, `to_accnol`, `statusl`, `tdatel`, `commentsl`) VALUES
(1, 4, 'TX1274405513', 'loan', 70000, '2017-08-29 17:06:07', 'Loan Request of $70000 to Account 1343756497 Reference# TX1274405513', '1343756497', 'PENDING', '2017-08-29 17:06:07', 'WANTS A LOAN'),
(2, 4, 'TX1337749439', 'loan', 5555, '2017-08-29 17:11:19', 'Loan Request of $5555 to Account 1343756497 Reference# TX1337749439', '1343756497', 'PENDING', '2017-08-29 17:11:19', 'WANTS A LOAN');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaction`
--

CREATE TABLE `tbl_transaction` (
  `id` int(10) NOT NULL,
  `tx_no` varchar(20) NOT NULL,
  `tx_type` varchar(10) NOT NULL,
  `amount` double NOT NULL,
  `date` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `to_accno` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `tdate` varchar(40) NOT NULL,
  `comments` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transactionc`
--

CREATE TABLE `tbl_transactionc` (
  `id` int(10) NOT NULL,
  `tx_no` varchar(20) NOT NULL,
  `tx_type` varchar(10) NOT NULL,
  `amount` double NOT NULL,
  `date` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `to_accno` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `tdate` varchar(40) NOT NULL,
  `comments` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transactionc`
--

INSERT INTO `tbl_transactionc` (`id`, `tx_no`, `tx_type`, `amount`, `date`, `description`, `to_accno`, `status`, `tdate`, `comments`) VALUES
(1, 'TX1259687331', 'credit', 77777, '2017-08-26 14:13:34', 'Fund transfer of $77777 to Account 1343756497 Reference# TX1259687331', '1343756497', 'SUCCESS', '2017-08-26 14:13:34', 'y567567576767677'),
(2, 'TX1408019568', 'credit', 8888, '2017-08-26 14:28:11', 'Fund transfer of $8888 to Account 1343756497 Reference# TX1408019568', '1343756497', 'SUCCESS', '2017-08-26 14:28:11', 'nghhjghjhgj jhjghjghj'),
(3, 'TX1340240026', 'credit', 1000, '2017-08-26 14:29:19', 'Fund transfer of $1000 to Account 1343756497 Reference# TX1340240026', '1343756497', 'SUCCESS', '2017-08-26 14:29:19', 'hhfhfhfhhfh'),
(4, 'TX1238274214', 'debit', 8888, '2017-08-26 14:30:25', 'Fund transfer of $8888 to Account 1343756497 Reference# TX1238274214', '1343756497', 'SUCCESS', '2017-08-26 14:30:25', 'bgfhgfhgfh hfghgfhghg'),
(5, 'TX1256070050', 'credit', 900, '2017-08-26 14:51:37', 'Fund transfer of $900 to Account 1343756497 Reference# TX1256070050', '1343756497', 'SUCCESS', '2017-08-26 14:51:37', 'fgfgfgfgfg fgfgfgf'),
(6, 'TX1289627743', 'debit', 1000, '2017-08-26 14:53:18', 'Fund transfer of $1000 to Account 1343756497 Reference# TX1289627743', '1343756497', 'SUCCESS', '2017-08-26 14:53:18', 'vxcvxvvxvvxcv'),
(7, 'TX1269240510', '', 666, '2017-08-26 14:57:21', 'Fund transfer of $666 to Account 1343756497 Reference# TX1269240510', '1343756497', 'SUCCESS', '2017-08-26 14:57:21', '66666'),
(8, 'TX1393544515', '', 4545, '2017-08-26 14:58:58', 'Fund transfer of $4545 to Account 1343756497 Reference# TX1393544515', '1343756497', 'SUCCESS', '2017-08-26 14:58:58', 'fdgdgfg 54545'),
(9, 'TX1408262697', '', 4444, '2017-08-26 15:07:00', 'Fund transfer of $4444 to Account 1343756497 Reference# TX1408262697', '1343756497', 'SUCCESS', '2017-08-26 15:07:00', '4444 vvvvvv'),
(10, 'TX1406169418', 'credit', 4555555, '2017-08-26 15:10:44', 'Fund transfer of $4555555 to Account 1343756497 Reference# TX1406169418', '1343756497', 'SUCCESS', '2017-08-26 15:10:44', 'zxczxczczczc'),
(11, 'TX1409519850', 'debit', 45550, '2017-08-26 15:11:48', 'Fund transfer of $45550 to Account 1343756497 Reference# TX1409519850', '1343756497', 'SUCCESS', '2017-08-26 15:11:48', 'bcbbcb xvxvxvxvxv'),
(12, 'TX1379360029', 'debit', 501250, '2017-08-26 15:12:39', 'Fund transfer of $501250 to Account 1343756497 Reference# TX1379360029', '1343756497', 'SUCCESS', '2017-08-26 15:12:39', 'vcvcvvcvcv'),
(13, 'TX1226503226', 'debit', 100000, '2017-08-26 15:13:23', 'Fund transfer of $100000 to Account 1343756497 Reference# TX1226503226', '1343756497', 'SUCCESS', '2017-08-26 15:13:23', 'ccvvcvczv dvsdvsv'),
(14, 'TX1390514301', 'debit', 3900000, '2017-08-26 15:14:12', 'Fund transfer of $3900000 to Account 1343756497 Reference# TX1390514301', '1343756497', 'SUCCESS', '2017-08-26 15:14:12', 'vxcvvvxv vvvvv'),
(15, 'TX1217341424', '', 0, '2017-08-26 15:19:38', 'Fund transfer of $0 to Account 1343756497 Reference# TX1217341424', '1343756497', 'SUCCESS', '2017-08-26 15:19:38', 'ggggggg'),
(16, 'TX1239175569', '', 0, '2017-08-26 15:23:24', 'Fund transfer of $0 to Account 1343756497 Reference# TX1239175569', '1343756497', 'SUCCESS', '2017-08-26 15:23:24', ''),
(17, 'TX1229266591', 'credit', 800000, '2017-08-26 15:25:12', 'Fund transfer of $800000 to Account 1343756497 Reference# TX1229266591', '1343756497', 'SUCCESS', '2017-08-26 15:25:12', 'vvxcvcvxvxvxvxvvxv'),
(18, 'TX1324223180', 'debit', 500, '2017-08-26 15:27:03', 'Fund transfer of $500 to Account 1343756497 Reference# TX1324223180', '1343756497', 'SUCCESS', '2017-08-26 15:27:03', 'cxvvxvcv ssdadadd'),
(19, 'TX1407806089', 'debit', 7000, '2017-08-28 09:15:43', 'Fund transfer of $7000 to Account 0 Reference# TX1407806089', '1343756497', 'SUCCESS', '08/30/2017', 'fghfhgggggggggggfdhffhfh'),
(20, 'TX1257101864', 'debit', 8000, '2017-08-28 09:23:14', 'Fund transfer of $8000 to Account 1343756497 Reference# TX1257101864', '1343756497', 'SUCCESS', '08/15/2017', 'jytuytuyuyuyutyutyu'),
(21, 'TX1370986914', 'debit', 700, '2017-08-28 09:31:58', 'Fund transfer of $700 to Account 1343756497 Reference# TX1370986914', '1343756497', 'SUCCESS', '08/30/2017', 'hfhgfhfghgfhgfh'),
(22, 'TX1219256804', 'debit', 80, '2017-08-28 09:39:27', 'Fund transfer of $80 to Account 1343756497 Reference# TX1219256804', '1343756497', 'SUCCESS', '08/30/2017', 'bfhfhhhdfhdhh'),
(23, 'TX1285381885', 'debit', 75, '2017-08-28 09:42:03', 'Fund transfer of $75 to Account 1343756497 Reference# TX1285381885', '1343756497', 'SUCCESS', '08/30/2017', 'hgjhgjhgjgh'),
(24, 'TX1307138940', 'credit', 200, '2017-08-28 10:03:00', 'Fund transfer of $200 from Account 1343756497 Reference# TX1307138940', '1343756497', 'SUCCESS', '09/06/2017', 'dgdgdfgggsdgfdsgsdgsdgfdgd'),
(25, 'TX1307138940', 'debit', 200, '2017-08-28 10:03:00', 'Fund transfer of $200 to Account 1343756497 Reference# TX1307138940', '1343756497', 'SUCCESS', '09/06/2017', 'dgdgdfgggsdgfdsgsdgsdgfdgd'),
(26, 'TX1254000491', 'credit', 9, '2017-08-28 10:04:19', 'Fund transfer of $9 from Account 1343756497 Reference# TX1254000491', '1343756497', 'SUCCESS', '08/23/2017', 'dfgfdghdrghrhrhrthrteher'),
(27, 'TX1254000491', 'debit', 9, '2017-08-28 10:04:19', 'Fund transfer of $9 to Account 1343756497 Reference# TX1254000491', '1343756497', 'SUCCESS', '08/23/2017', 'dfgfdghdrghrhrhrthrteher'),
(28, 'TX1362216490', 'credit', 6, '2017-08-28 10:07:05', 'Fund transfer of $6 from Account 1343756497 Reference# TX1362216490', '1343756497', 'SUCCESS', '08/16/2017', 'gjhjghjghjghj'),
(29, 'TX1362216490', 'debit', 6, '2017-08-28 10:07:05', 'Fund transfer of $6 to Account 1343756497 Reference# TX1362216490', '1343756497', 'SUCCESS', '08/16/2017', 'gjhjghjghjghj'),
(30, 'TX1407562961', 'debit', 78, '2017-08-28 11:23:23', 'Fund transfer of $78 to Account 1285743613 Reference# TX1407562961', '1343756497', 'SUCCESS', '08/28/2017', 'jhgjhgjhgjhgjhgjhj'),
(31, 'TX1409502060', 'debit', 78, '2017-08-28 11:23:23', 'Fund transfer of $78 to Account 1285743613 Reference# TX1409502060', '1343756497', 'SUCCESS', '08/28/2017', 'jhgjhgjhgjhgjhgjhj'),
(32, 'TX1309961606', 'credit', 78, '2017-08-28 11:38:06', 'Fund transfer of $78 from Account 1343756497 Reference# TX1309961606', '1343756497', 'SUCCESS', '08/29/2017', 'ghfhgfhfhhfghf'),
(33, 'TX1309961606', 'debit', 78, '2017-08-28 11:38:06', 'Fund transfer of $78 to Account 1285743613 Reference# TX1309961606', '1343756497', 'SUCCESS', '08/29/2017', 'ghfhgfhfhhfghf'),
(34, 'TX1307951346', 'credit', 15, '2017-08-28 11:39:21', 'Fund transfer of $15 from Account 1343756497 Reference# TX1307951346', '1343756497', 'SUCCESS', '08/23/2017', 'cvbxcxbbbxvcbvcbxcbcbbcx'),
(35, 'TX1307951346', 'debit', 15, '2017-08-28 11:39:21', 'Fund transfer of $15 to Account 1285743613 Reference# TX1307951346', '1343756497', 'SUCCESS', '08/23/2017', 'cvbxcxbbbxvcbvcbxcbcbbcx'),
(36, 'TX1315701815', 'credit', 799715, '2017-08-28 11:52:22', 'Fund transfer of $799715 from Account 1343756497 Reference# TX1315701815', '1343756497', 'SUCCESS', '08/29/2017', 'gergergregergrggergerg'),
(37, 'TX1315701815', 'debit', 799715, '2017-08-28 11:52:22', 'Fund transfer of $799715 to Account 1285743613 Reference# TX1315701815', '1343756497', 'SUCCESS', '08/29/2017', 'gergergregergrggergerg'),
(38, 'TX1395827553', 'credit', 799715, '2017-08-28 12:02:37', 'Fund transfer of $799715 from Account 1343756497 Reference# TX1395827553', '1343756497', 'SUCCESS', '08/23/2017', 'xvxvxcvxcvxcvvxcvxvxvxvxv'),
(39, 'TX1395827553', 'debit', 799715, '2017-08-28 12:02:37', 'Fund transfer of $799715 to Account 1285743613 Reference# TX1395827553', '1343756497', 'SUCCESS', '08/23/2017', 'xvxvxcvxcvxcvvxcvxvxvxvxv');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usec`
--

CREATE TABLE `tbl_usec` (
  `id` int(10) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `is_active` varchar(10) NOT NULL,
  `utype` varchar(10) NOT NULL,
  `pics` varchar(200) NOT NULL,
  `nation_id` varchar(200) NOT NULL,
  `lc1_doc` varchar(200) NOT NULL,
  `bdate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_usec`
--

INSERT INTO `tbl_usec` (`id`, `fname`, `lname`, `pwd`, `email`, `phone`, `gender`, `is_active`, `utype`, `pics`, `nation_id`, `lc1_doc`, `bdate`) VALUES
(1, '', 'eee', 'eee', '', '', '', '', '', '', '', '', ''),
(2, 'VVV', 'vvv', 'VVV', 'FFF@gmail.com', '0789105998', 'M', 'TRUE', 'USER', 'food', '', '', '08/22/2017'),
(3, 'ffff', 'ffff', 'e53a68903e2c336a890907125b489abd', '4444@gmail.com', '0789105998', 'M', 'FALSE', 'USER', 'food', '', '', '08/28/2017'),
(4, 'dfdfd', 'dfdfd', 'vvv', '444@gmail.com', '0789105998', 'F', 'TRUE', 'USER', 'food', '', '', '08/22/2017'),
(5, 'cvcvv', 'cvcvc', 'e0ec043b3f9e198ec09041687e4d4e8d', 'kk@gmail.com', '9999999999', 'M', 'FALSE', 'USER', 'food', '', '', '08/29/2017'),
(6, 'bvbvbvbvbv', 'bvcvbvbbvbv', 'a9e49c7aefe022f0a8540361cce7575c', 'dddd@gmail.com', '3333333333', 'F', 'FALSE', 'USER', 'food', '', '', '09/06/2017'),
(7, 'dfgdgdgfg', 'dfdgfgdg', 'e11170b8cbd2d74102651cb967fa28e5', 'doctor@doctor.com', '1111111111', 'M', 'FALSE', 'USER', 'food', '', '', '08/29/2017'),
(8, 'v', 'v', 'v', 'v', 'v', 'v', 'v', 'v', 'v', '', '', ''),
(9, 'vcvvcv', 'vcvcvv', 'e11170b8cbd2d74102651cb967fa28e5', 'cxx@mail.com', '0789105998', 'F', 'FALSE', 'USER', 'food', '', '', '08/30/2017');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(10) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `is_active` varchar(10) NOT NULL,
  `utype` varchar(10) NOT NULL,
  `pics` varchar(200) NOT NULL,
  `bdate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reg`
--
ALTER TABLE `reg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_accountsc`
--
ALTER TABLE `tbl_accountsc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_address`
--
ALTER TABLE `tbl_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_addressc`
--
ALTER TABLE `tbl_addressc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_loans`
--
ALTER TABLE `tbl_loans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_loansc`
--
ALTER TABLE `tbl_loansc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_transactionc`
--
ALTER TABLE `tbl_transactionc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_usec`
--
ALTER TABLE `tbl_usec`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reg`
--
ALTER TABLE `reg`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_accountsc`
--
ALTER TABLE `tbl_accountsc`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_address`
--
ALTER TABLE `tbl_address`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_addressc`
--
ALTER TABLE `tbl_addressc`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_loans`
--
ALTER TABLE `tbl_loans`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_loansc`
--
ALTER TABLE `tbl_loansc`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_transactionc`
--
ALTER TABLE `tbl_transactionc`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `tbl_usec`
--
ALTER TABLE `tbl_usec`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
