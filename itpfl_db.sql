-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2023 at 12:03 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itpfl_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accntpayable`
--

CREATE TABLE `tbl_accntpayable` (
  `supplier_ID` int(11) NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `supplier_name` varchar(60) NOT NULL,
  `invoice_date` date NOT NULL,
  `due_date` date NOT NULL,
  `amount_owed` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_accntpayable`
--

INSERT INTO `tbl_accntpayable` (`supplier_ID`, `invoice_no`, `supplier_name`, `invoice_date`, `due_date`, `amount_owed`) VALUES
(10, 244, 'microsoft', '2023-10-23', '2023-10-30', 500);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accntsreceivable`
--

CREATE TABLE `tbl_accntsreceivable` (
  `customer_ID` int(11) NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `customer_name` varchar(60) NOT NULL,
  `invoice_date` date NOT NULL,
  `due_date` date NOT NULL,
  `amount_receivable` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_ID` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `con_password` varchar(60) NOT NULL,
  `date_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_ID`, `username`, `email`, `password`, `con_password`, `date_added`) VALUES
(1, 'wency', 'wency@gmail.com', '12345', '12345', '2023-10-21'),
(2, 'shing', 'shing@gmail.com', '12345', '12345', '2023-10-21'),
(4, 'admin', 'wncbtrn@gmail.com', '11111', '11111', '2023-10-21'),
(5, 'tin', 'admin@wency.com', '11111', '11111', '2023-10-21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_incstatement`
--

CREATE TABLE `tbl_incstatement` (
  `incstate_ID` int(11) NOT NULL,
  `report_date` date NOT NULL,
  `revenue` int(15) NOT NULL,
  `cost_of_golds_sold` int(15) NOT NULL,
  `operating_expenses` int(15) NOT NULL,
  `net_income` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ledger`
--

CREATE TABLE `tbl_ledger` (
  `transaction_ID` int(11) NOT NULL,
  `transaction_date` date NOT NULL,
  `description` varchar(250) NOT NULL,
  `debit_amount` int(15) NOT NULL,
  `credit_amount` int(15) NOT NULL,
  `account_type` varchar(50) NOT NULL,
  `supplier_ID` int(11) NOT NULL,
  `customer_ID` int(11) NOT NULL,
  `incstate_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_accntpayable`
--
ALTER TABLE `tbl_accntpayable`
  ADD PRIMARY KEY (`supplier_ID`);

--
-- Indexes for table `tbl_accntsreceivable`
--
ALTER TABLE `tbl_accntsreceivable`
  ADD PRIMARY KEY (`customer_ID`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_ID`);

--
-- Indexes for table `tbl_incstatement`
--
ALTER TABLE `tbl_incstatement`
  ADD PRIMARY KEY (`incstate_ID`);

--
-- Indexes for table `tbl_ledger`
--
ALTER TABLE `tbl_ledger`
  ADD PRIMARY KEY (`transaction_ID`),
  ADD KEY `supplier_ID` (`supplier_ID`),
  ADD KEY `customer_ID` (`customer_ID`),
  ADD KEY `incstate_ID` (`incstate_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_accntpayable`
--
ALTER TABLE `tbl_accntpayable`
  MODIFY `supplier_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_accntsreceivable`
--
ALTER TABLE `tbl_accntsreceivable`
  MODIFY `customer_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_incstatement`
--
ALTER TABLE `tbl_incstatement`
  MODIFY `incstate_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_ledger`
--
ALTER TABLE `tbl_ledger`
  MODIFY `transaction_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_ledger`
--
ALTER TABLE `tbl_ledger`
  ADD CONSTRAINT `tbl_ledger_ibfk_1` FOREIGN KEY (`supplier_ID`) REFERENCES `tbl_accntpayable` (`supplier_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_ledger_ibfk_2` FOREIGN KEY (`customer_ID`) REFERENCES `tbl_accntsreceivable` (`customer_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_ledger_ibfk_3` FOREIGN KEY (`incstate_ID`) REFERENCES `tbl_incstatement` (`incstate_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
