-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2021 at 04:34 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `expense_manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `exp_id` int(11) NOT NULL,
  `category` varchar(40) NOT NULL,
  `amount` int(10) NOT NULL,
  `account` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `description` text NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`exp_id`, `category`, `amount`, `account`, `date`, `description`, `email`) VALUES
(29, 'Culture', 789, 'Card', '2020-11-10', 'rty', 'parikhbhoomi32349@gmail.com'),
(31, 'Health', 678, 'Card', '2020-11-02', 'tyui', 'parikhbhoomi32349@gmail.com'),
(32, 'Culture', 700000, 'Card', '2020-11-13', 'rewq', 'parikhbhoomi32349@gmail.com'),
(33, 'Beauty', 789, 'Card', '2020-11-18', 'tyui', 'parikhbhoomi32349@gmail.com'),
(34, 'Food', 789, 'Cash', '2020-12-23', 'tyu', 'vrundapatel816@gmail.com'),
(35, 'Gift', 789000, 'Card', '2020-12-24', 'yui', 'vrundapatel816@gmail.com'),
(37, 'Food', 400, 'Cash', '2020-12-03', '', 'hs@gmail.com'),
(38, 'Food', 300, 'Cash', '2020-12-02', '', 'hs@gmail.com'),
(39, 'Food', 7000, 'Cash', '2020-12-04', '', 'hs@gmail.com'),
(40, 'Food', 7000, 'Cash', '2020-12-11', 'rewq', 'parikhbhoomi32349@gmail.com'),
(41, 'Food', 43, 'Cash', '0000-00-00', '', 'qw@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `inc_id` int(11) NOT NULL,
  `category` varchar(15) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `amount` int(11) NOT NULL,
  `account` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `description` text NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`inc_id`, `category`, `amount`, `account`, `date`, `description`, `email`) VALUES
(28, 'Allowances', 63782, 'Card', '2020-11-03', 'rtyu', 'we@gmail.com'),
(29, 'Allowances', 5678, 'Card', '2020-11-19', 'rtyui', 'we@gmail.com'),
(34, 'Salary', 789, 'Card', '2020-11-25', 'tyu', 'parikhbhoomi32349@gm'),
(38, 'Allowances', 789, 'Card', '2020-11-11', 'tyu', 'parikhbhoomi32349@gmail.com'),
(40, 'Salary', 7000000, 'Card', '2020-12-10', '', 'vrundapatel816@gmail.com'),
(41, 'Allowances', 80000, 'Cash', '2020-12-07', '', 'vrundapatel816@gmail.com'),
(42, 'Pretty Cash', 450000, 'Cash', '2020-12-15', '', 'vrundapatel816@gmail.com'),
(43, 'Pretty Cash', 6000, 'Cash', '2020-12-22', '', 'vrundapatel816@gmail.com'),
(44, 'Allowances', 100000, 'Card', '2020-12-15', '', 'parikhbhoomi32349@gmail.com'),
(45, 'Bonus', 600000, 'Card', '2020-12-23', 'Diwali bonus', 'parikhbhoomi32349@gmail.com'),
(46, 'Allowances', 7000, 'Cash', '2020-12-22', 'For new car', 'parikhbhoomi32349@gmail.com'),
(49, 'Salary', 890, 'Cash', '2020-12-29', '', 'parikhbhoomi32349@gmail.com'),
(53, 'Salary', 781, 'Cash', '2020-12-16', '', 'hs@gmail.com'),
(54, 'Salary', 7000, 'Cash', '2020-10-03', '', 'hs@gmail.com'),
(55, 'Salary', 7000, 'Cash', '2020-12-10', '', 'parikhbhoomi32349@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(15) NOT NULL,
  `mobile_no` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`firstname`, `lastname`, `email`, `password`, `mobile_no`) VALUES
('er', 'er', 'er@gmail.com', 'er', '456'),
('Helly ', 'Shah', 'hs@gmail.com', 'yu', '457898978'),
('op', 'op', 'op@gmail.com', 'op', '6789'),
('Bhoomi', 'Parikh', 'parikhbhoomi32349@gmail.com', 'bh', '6788'),
('qr', 'we', 'qw@gmail.com', 'qw', '7685232321'),
('ui', 'ui', 'ui@gmail.com', 'ui', '5678'),
('we', 'we', 'we@gmail.com', 'we', '54321'),
('yu', 'yu', 'yu@gmail.com', 'yu', '87654');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`exp_id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`inc_id`),
  ADD KEY `date` (`date`) USING BTREE,
  ADD KEY `c1` (`email`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `exp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `inc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
