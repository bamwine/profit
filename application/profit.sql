-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2018 at 07:26 AM
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
-- Table structure for table `back`
--

CREATE TABLE `back` (
  `id` int(100) NOT NULL,
  `names` varchar(100) NOT NULL,
  `passd` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `statu` varchar(100) NOT NULL DEFAULT 'FALSE'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `back`
--

INSERT INTO `back` (`id`, `names`, `passd`, `type`, `statu`) VALUES
(1, 'vv', 'c4055e3a20b6b3af3d10590ea446ef6c', 'admin', 'TRUE');

-- --------------------------------------------------------

--
-- Table structure for table `super`
--

CREATE TABLE `super` (
  `id` int(100) NOT NULL,
  `names` varchar(100) NOT NULL,
  `passd` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `statu` varchar(100) NOT NULL DEFAULT 'FALSE'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `super`
--

INSERT INTO `super` (`id`, `names`, `passd`, `type`, `statu`) VALUES
(1, 'dd', '1aabac6d068eef6a7bad3fdf50a05cc8', 'admin', 'TRUE');

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
(15, 21, '1220282689', 'CA', 999784.4, 12345678, 'ACTIVE', '2017-09-12 16:24:56', 'dsfdfgfgdgdgfdfgdfgfdgdfggdfgdgdg'),
(16, 22, '1297977139', 'SA', 0, 12345678, 'ACTIVE', '2017-09-21 13:19:29', 'DFCU ');

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
(17, 21, 'cvxvcvxcvxvxvxvxvxvxvxvxvxcv', 'xvxcvxcvxvxvxc', 'xcvxcvxvxvxcvxcvxcvxcvv', 256, ''),
(18, 22, 'kisaasi  kampala wakiso', 'kampala', 'uganda', 225, '');

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
  `commentsl` varchar(200) NOT NULL,
  `date_apprv` varchar(100) NOT NULL
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
  `commentsl` varchar(200) NOT NULL,
  `date_apprv` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_loansc`
--

INSERT INTO `tbl_loansc` (`id`, `userIdl`, `tx_nol`, `tx_typel`, `amountl`, `datel`, `descriptionl`, `to_accnol`, `statusl`, `tdatel`, `commentsl`, `date_apprv`) VALUES
(1, 21, 'TX1339990967', 'loan', 890000, '2017-09-13 16:04:09', 'Loan Request of $890000 to Account 1220282689 Reference# TX1291199185', '1220282689', 'Transfered', '2017-09-13 16:04:09', 'WANTS A LOAN', '2017-09-13 16:14:55'),
(2, 21, 'TX1253917471', 'loan', 890000, '2017-09-13 16:24:22', 'Loan Request of $890000 to Account 1220282689 Reference# TX1291199185', '1220282689', 'Transfered', '2017-09-13 16:24:22', 'WANTS A LOAN', '2017-10-02 20:04:54'),
(3, 22, 'TX1289532863', 'loan', 10000, '2017-09-21 13:26:32', 'Loan Request of $10000 to Account 1297977139 Reference# TX1285737683', '1297977139', 'Transfered', '2017-09-21 13:26:32', 'WANTS A LOAN', '2017-09-21 13:28:20'),
(4, 22, 'TX1373246232', 'loan', 10000, '2018-01-04 09:33:00', 'Loan Request of $10000 to Account 1297977139 Reference# TX1285737683', '1297977139', 'APPROVED', '2018-01-04 09:33:00', 'WANTS A LOAN', '2018-01-05 13:29:18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_loan_pay`
--

CREATE TABLE `tbl_loan_pay` (
  `id` int(100) NOT NULL,
  `user_id` int(200) NOT NULL,
  `user_acct` varchar(100) NOT NULL,
  `loan_requet` varchar(100) NOT NULL,
  `amout_paid` double NOT NULL,
  `date_pay` tinytext NOT NULL,
  `means_pay` tinytext NOT NULL,
  `loan_id` int(250) NOT NULL,
  `loan_bal` double NOT NULL,
  `pay_account` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_loan_pay`
--

INSERT INTO `tbl_loan_pay` (`id`, `user_id`, `user_acct`, `loan_requet`, `amout_paid`, `date_pay`, `means_pay`, `loan_id`, `loan_bal`, `pay_account`) VALUES
(3, 22, '1297977139', '9600', 600, '10', 'account', 6, 0, '1297977400'),
(4, 22, '1297977139', '9000', 600, '10', 'account', 6, 0, '1297977400'),
(5, 22, '1297977139', '8400', 600, '10', 'account', 6, 8400, 'none'),
(6, 22, '1297977139', '7800', 600, '10', 'cash', 6, 7200, '6666'),
(7, 22, '1297977139', '7200', 600, '10/30/2017', 'account', 6, 6600, '78788878'),
(8, 22, '1297977139', '6600', 600, '10/30/2017', 'account', 6, 6000, '600'),
(9, 22, '1297977139', '6000', 600, '10/31/2017', 'account', 6, 5400, 'fsdfsfsfsf'),
(10, 22, '1297977139', '5400', 5000, '10/30/2017', 'account', 6, 400, '1297977567'),
(11, 21, '1220282689', '6000', 7000, '01/04/2018', 'account', 3, -1000, '1220282689');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_loan_us`
--

CREATE TABLE `tbl_loan_us` (
  `id` int(10) NOT NULL,
  `userIdl` int(100) NOT NULL,
  `tx_nol` varchar(20) NOT NULL,
  `ramount` double NOT NULL,
  `rdate` varchar(100) NOT NULL,
  `rate` int(100) NOT NULL,
  `to_accnol` varchar(20) NOT NULL,
  `statusl` varchar(10) NOT NULL,
  `availb_amt` double NOT NULL,
  `bal_pay` double NOT NULL,
  `bal_to_pay` double NOT NULL,
  `date_apprv` varchar(100) NOT NULL,
  `signature` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_loan_us`
--

INSERT INTO `tbl_loan_us` (`id`, `userIdl`, `tx_nol`, `ramount`, `rdate`, `rate`, `to_accnol`, `statusl`, `availb_amt`, `bal_pay`, `bal_to_pay`, `date_apprv`, `signature`) VALUES
(3, 21, '', 890000, '2017-09-13 16:14:55', 20, '1220282689', 'Transfered', 5000, 6000, -1000, '2017-09-23 23:22:54', '88888'),
(6, 22, '', 700000, '2017-09-21 13:28:20', 60, '1297977139', 'Transfered', 6000, 9600, 400, '2017-09-29 17:40:05', 'dfffdff'),
(7, 21, '', 890000, '2017-10-02 20:04:54', 10, '1220282689', 'Transfered', 200000, 220000, 220000, '2018-01-05 13:23:27', './uploads/users/sign/0d5661c2e9c27ed5a5c5b41b336e4d2d.jpg');

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
(1, 'TX1289135555', 'credit', 5000, '2017-09-13 17:09:46', 'Fund transfer of $5000 to Account 1220282689 Reference# TX1289135555', '1220282689', 'SUCCESS', '2017-09-13 17:09:46', 'vbbcbcbcbbbcbcbcbcbvcbcvbcvbcvbvbcb'),
(2, 'TX1244886129', 'credit', 5000, '2017-09-13 17:11:52', 'Fund transfer of $5000 to Account 1220282689 Reference# TX1244886129', '1220282689', 'SUCCESS', '2017-09-13 17:11:52', 'vbbcbcbcbbbcbcbcbcbvcbcvbcvbcvbvbcb'),
(3, 'TX1356102692', 'credit', 1000, '2017-09-13 17:15:23', 'Fund transfer of $1000 to Account 1220282689 Reference# TX1356102692', '1220282689', 'SUCCESS', '2017-09-13 17:15:23', 'bnnvbnvbnbnvbnvbnvnvbn'),
(4, 'TX1371366432', 'debit', 10780, '2017-09-18 12:00:23', 'Fund transfer of $10780 to Account 1220282689 Reference# TX1371366432', '1220282689', 'SUCCESS', '2017-09-18 12:00:23', 'gdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfg'),
(5, 'TX1289319384', 'debit', 1000, '2017-09-18 14:07:40', 'Fund transfer of $1000 to Account 1220282689 Reference# TX1289319384', '1220282689', 'SUCCESS', '09/25/2017', 'hfhfhfhfhfghfhfghfghfghfghfghfgh'),
(6, 'TX1376881303', 'debit', 1000, '2017-09-18 14:19:05', 'Fund transfer of $1000 to Account 1220282689 Reference# TX1376881303', '1220282689', 'SUCCESS', '09/26/2017', 'sfxdgxgxxgxgxgxgx'),
(7, 'TX1217145735', 'debit', 1000, '2017-09-18 14:21:05', 'Fund transfer of $1000 to Account 1220282689 Reference# TX1217145735', '1220282689', 'SUCCESS', '10/03/2017', 'fhfhfhghghfhfhgfhfghfh');

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
  `pics` tinytext NOT NULL,
  `nation_id` tinytext NOT NULL,
  `lc1_doc` tinytext NOT NULL,
  `bdate` varchar(100) NOT NULL,
  `signature` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_usec`
--

INSERT INTO `tbl_usec` (`id`, `fname`, `lname`, `pwd`, `email`, `phone`, `gender`, `is_active`, `utype`, `pics`, `nation_id`, `lc1_doc`, `bdate`, `signature`) VALUES
(21, 'vcvxcvxcvcxvxvxcvxcv', 'xcvxcvxcvxcvxcvxcvxcv', 'e807f1fcf82d132f9bb018ca6738a19f', 'bamwinealbert@gmail.com', '0789105998', 'F', 'TRUE', 'USER', './uploads/users/passt/dbc5445d4980a5faaca4ec742450bc6a.jpg', './uploads/users/nat_id/8cb1680c45a9645b90342b0bd06cbdee.jpg', './uploads/users/lc_doc/761a086a01b3b4aea104361ba6bcdabd.pdf', '09/09/09', './uploads/users/sign/0d5661c2e9c27ed5a5c5b41b336e4d2d.jpg'),
(22, 'Kato', 'Benjamin', 'ac5f9f0449cf6195bce679b69b46e9b0', 'benjakeiser@gmail.com', '0786636259', 'M', 'TRUE', 'USER', './uploads/users/passt/e5cd00d8f7ea476c6d1fe0778ecdce2a.jpg', './uploads/users/nat_id/5631adbbf533d5e58467c7c06a8f4a45.jpg', './uploads/users/lc_doc/35c9a3f624897e62e89481968004e959.docx', '09/26/2017', './uploads/users/sign/af520dc20936a19a454245a781404ed7.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_userc_accts`
--

CREATE TABLE `tbl_userc_accts` (
  `id` int(250) NOT NULL,
  `user_id` int(250) NOT NULL,
  `user_acct` varchar(250) NOT NULL,
  `user_bak_acc` varchar(250) NOT NULL,
  `user_bak_na` varchar(250) NOT NULL,
  `user_bak_stut` varchar(250) NOT NULL DEFAULT 'Not Verfied'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_userc_accts`
--

INSERT INTO `tbl_userc_accts` (`id`, `user_id`, `user_acct`, `user_bak_acc`, `user_bak_na`, `user_bak_stut`) VALUES
(1, 22, '1297977139', '1297977139', 'DFCU', 'Verfied'),
(2, 22, '1297977139', '1297977400', 'centnary', 'Verfied');

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
-- Indexes for table `back`
--
ALTER TABLE `back`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `super`
--
ALTER TABLE `super`
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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tx_nol` (`tx_nol`);

--
-- Indexes for table `tbl_loansc`
--
ALTER TABLE `tbl_loansc`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tx_nol` (`tx_nol`);

--
-- Indexes for table `tbl_loan_pay`
--
ALTER TABLE `tbl_loan_pay`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_loan_us`
--
ALTER TABLE `tbl_loan_us`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userIdl` (`userIdl`);

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
-- Indexes for table `tbl_userc_accts`
--
ALTER TABLE `tbl_userc_accts`
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
-- AUTO_INCREMENT for table `back`
--
ALTER TABLE `back`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `super`
--
ALTER TABLE `super`
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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tbl_address`
--
ALTER TABLE `tbl_address`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_addressc`
--
ALTER TABLE `tbl_addressc`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tbl_loans`
--
ALTER TABLE `tbl_loans`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_loansc`
--
ALTER TABLE `tbl_loansc`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_loan_pay`
--
ALTER TABLE `tbl_loan_pay`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_loan_us`
--
ALTER TABLE `tbl_loan_us`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_transactionc`
--
ALTER TABLE `tbl_transactionc`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_usec`
--
ALTER TABLE `tbl_usec`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `tbl_userc_accts`
--
ALTER TABLE `tbl_userc_accts`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
