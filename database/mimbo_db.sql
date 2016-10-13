-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2016 at 03:23 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mimbo_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `acc_tbl`
--

CREATE TABLE IF NOT EXISTS `acc_tbl` (
  `acc_id` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `acc_type` varchar(20) NOT NULL,
  `acc_stat` varchar(15) NOT NULL,
  `login_flag` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acc_tbl`
--

INSERT INTO `acc_tbl` (`acc_id`, `username`, `password`, `acc_type`, `acc_stat`, `login_flag`) VALUES
('1', 'admin', 'admin', 'admin', 'Activated', 0),
('2', 'cashier', 'cashier', 'cashier', 'Activated', 0);

-- --------------------------------------------------------

--
-- Table structure for table `category_tbl`
--

CREATE TABLE IF NOT EXISTS `category_tbl` (
  `Category` varchar(20) NOT NULL,
`catid` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_tbl`
--

INSERT INTO `category_tbl` (`Category`, `catid`) VALUES
('Flash Drive', 1),
('Ink', 2),
('Motherboard', 3),
('Printer', 4);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
`customer_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_Lname` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` int(11) NOT NULL,
  `agency` varchar(50) NOT NULL,
  `membership_number` varchar(100) NOT NULL,
  `email` varchar(550) NOT NULL,
  `registered_date` varchar(500) NOT NULL,
  `customerflag` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_Lname`, `address`, `contact`, `agency`, `membership_number`, `email`, `registered_date`, `customerflag`) VALUES
(1, 'armando', 'cabrillas', 'dun', 123124, 'N/A', 'CUS2016-001', 'sapa@kasjd.com', '2016-09-30', 0),
(7, 'Armando', 'Cabrillas', 'baguio', 2147483647, 'N/A', 'CUS2016-002', 'tulogsaskul@gmail.com', '10/09/2016 11:38', 0),
(8, 'TEst', 'test', 'test', 0, 'test', 'CUS2016-003', 'etst@test.com', '10/09/2016 11:46', 0);

-- --------------------------------------------------------

--
-- Table structure for table `daily_transaction`
--

CREATE TABLE IF NOT EXISTS `daily_transaction` (
  `Transaction_ID` int(11) NOT NULL,
  `Date` int(11) NOT NULL,
  `Time` int(11) NOT NULL,
  `Customer_name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE IF NOT EXISTS `expense` (
`expense_id` int(15) NOT NULL,
  `date` varchar(50) NOT NULL,
  `staff` varchar(50) NOT NULL,
  `deposit_charge` decimal(11,2) NOT NULL,
  `office_supply` decimal(11,2) NOT NULL,
  `travel_allowance` decimal(11,2) NOT NULL,
  `purchases` decimal(11,2) NOT NULL,
  `deposit` decimal(11,2) NOT NULL,
  `permit` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
`id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `operation` text NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `user`, `operation`, `date`) VALUES
(1, 'admin admin', 'updated quantity from  to 1 of item ()', '09/24/2016 09:43'),
(2, 'admin admin', 'updated quantity from  to 1 of item ()', '09/24/2016 09:43'),
(3, 'admin admin', 'updated quantity from  to 1 of item ()', '09/24/2016 09:43'),
(4, 'admin admin', 'updated quantity from  to 1 of item ()', '09/24/2016 09:43'),
(16, '', 'added 5 item (Asus H88x)', '09/27/2016 05:49'),
(17, '', 'added 213 item (afa)', '09/27/2016 05:52'),
(18, 'admin admin', 'added  suppliers(dadwad)', '09/27/2016 12:37'),
(19, 'admin admin', 'added  supplier ()', '09/27/2016 13:30'),
(20, '', 'logged out', '09/28/2016 10:11 PM'),
(21, '', 'logged out', '09/28/2016 10:44 PM'),
(22, '', 'logged out', '09/29/2016 03:22 PM'),
(23, '', 'logged out', '09/29/2016 03:25 PM'),
(24, '', 'logged out', '09/29/2016 03:25 PM'),
(36, '', 'added 50 item (HP 8gig USB)', '10/02/2016 15:34'),
(37, '', 'added 50 item (test)', '10/02/2016 15:40'),
(38, '', 'added new service(SE-3383332)', '10/02/2016 15:45'),
(46, '', 'added new service(SE-305322)', '10/03/2016 17:29'),
(47, '', 'Archived service ()', '10/03/2016 17:29'),
(48, '', 'added test ', '10/03/2016 21:44'),
(49, '', 'Archived service ()', '10/03/2016 22:34'),
(50, '', 'Archived service ()', '10/03/2016 22:34'),
(51, '', 'Archived service ()', '10/03/2016 22:34'),
(52, '', 'Archived service ()', '10/03/2016 22:34'),
(53, '', 'Archived service ()', '10/03/2016 22:35'),
(54, '', 'Archived service ()', '10/03/2016 22:59'),
(55, '', 'Archived service ()', '10/03/2016 23:02'),
(56, '', 'Archived service ()', '10/03/2016 23:03'),
(57, '', 'Archived service ()', '10/03/2016 23:04'),
(58, '', 'Archived service ()', '10/03/2016 23:04'),
(59, '', 'logged out', '10/04/2016 02:10 PM'),
(60, '', 'logged out', '10/04/2016 02:27 PM'),
(61, '', 'added 12 item (test)', '10/04/2016 11:04'),
(62, '', 'added 12 item (test)', '10/04/2016 11:05'),
(63, '', 'added 12 item (test)', '10/04/2016 11:06'),
(64, '', 'added 12 item (test)', '10/04/2016 11:13'),
(65, '', 'updated item (brother lc673)', '10/04/2016 18:35'),
(66, '', 'updated item (brother lc673)', '10/04/2016 18:36'),
(67, '', 'updated item (brother lc673)', '10/04/2016 18:36'),
(68, '', 'updated item (brother lc673)', '10/04/2016 18:37'),
(69, '', 'updated item (brother lc673)', '10/04/2016 18:37'),
(70, '', 'added wert item (345)', '10/04/2016 18:39'),
(71, '', 'deactive item', '10/04/2016 18:44'),
(72, '', 'updated item (brother lc673)', '10/04/2016 18:47'),
(73, '', 'deactive item', '10/04/2016 18:50'),
(74, '', 'added 33 item (3wrgdsdf)', '10/04/2016 18:50'),
(75, '', 'deactive item', '10/04/2016 18:51'),
(76, '', 'Archived service ()', '10/04/2016 18:51'),
(77, '', 'Archived service ()', '10/04/2016 18:52'),
(78, '', 'Archived service ()', '10/04/2016 18:52'),
(79, '', 'added new service(SE-0962323)', '10/04/2016 18:54'),
(80, '', 'added new service(SE-4223332)', '10/04/2016 18:57'),
(81, '', 'added ss ', '10/04/2016 19:02'),
(82, '', 'updated item (brother lc673)', '10/05/2016 03:17'),
(83, '', 'Archived service ()', '10/06/2016 04:58'),
(84, '', 'Archived service ()', '10/06/2016 04:58'),
(85, '', 'added 5 item (cannon xxx)', '10/05/2016 06:01'),
(86, '', 'logged out', '10/05/2016 12:17 PM'),
(87, '', 'added  ', '10/09/2016 07:12'),
(88, '', 'added armando ', '10/09/2016 07:20'),
(89, '', 'added armando ', '10/09/2016 07:24'),
(90, '', 'added amrnado ', '10/09/2016 07:29'),
(91, '', 'added test ', '10/09/2016 07:30'),
(92, '', 'added meehe ', '10/09/2016 07:39'),
(93, '', 'added meehe ', '10/09/2016 07:39'),
(94, '', 'added teststt ', '10/09/2016 07:41'),
(95, '', 'added teststt ', '10/09/2016 07:41'),
(96, '', 'added test ', '10/09/2016 07:43'),
(97, '', 'added awdj ', '10/09/2016 07:45'),
(98, '', 'added test2 ', '10/09/2016 07:45'),
(99, '', 'added armando ', '10/09/2016 08:27'),
(100, '', 'deactive item', '10/09/2016 08:35'),
(101, '', 'added test ', '10/09/2016 08:57'),
(102, '', 'added awr ', '10/09/2016 11:21'),
(103, '', 'added awr ', '10/09/2016 11:22'),
(104, '', 'updated armando cabrillas', '10/09/2016 11:33'),
(105, '', 'added Armando ', '10/09/2016 11:38'),
(106, '', 'added TEst ', '10/09/2016 11:46'),
(107, '', 'updated test test', '10/09/2016 11:46'),
(108, '', 'updated TEst test', '10/09/2016 11:56'),
(109, '', 'updated testing testing', '10/09/2016 11:57'),
(110, '', 'updated  ', '10/09/2016 12:10'),
(111, '', 'updated TEst test', '10/09/2016 12:11'),
(112, '', 'updated armando cabrillas', '10/09/2016 12:40'),
(113, '', 'logged out', '10/09/2016 07:51 PM'),
(114, '', 'logged out', '10/09/2016 09:15 PM');

-- --------------------------------------------------------

--
-- Table structure for table `payment_tbl`
--

CREATE TABLE IF NOT EXISTS `payment_tbl` (
  `transaction_id` varchar(100) NOT NULL,
  `date` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `invoice` varchar(150) NOT NULL,
  `amount` varchar(150) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `balance` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_tbl`
--

CREATE TABLE IF NOT EXISTS `product_tbl` (
`Product_ID` int(20) NOT NULL,
  `Serial_number` varchar(50) NOT NULL,
  `Product_Name` varchar(50) NOT NULL,
  `Category` varchar(50) NOT NULL,
  `Supplier` varchar(30) NOT NULL,
  `Critical` int(11) NOT NULL,
  `Quantity` int(10) NOT NULL,
  `UM` varchar(10) NOT NULL,
  `Arival_Date` varchar(20) NOT NULL,
  `selling_price` decimal(11,2) NOT NULL,
  `itemflag` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_tbl`
--

INSERT INTO `product_tbl` (`Product_ID`, `Serial_number`, `Product_Name`, `Category`, `Supplier`, `Critical`, `Quantity`, `UM`, `Arival_Date`, `selling_price`, `itemflag`) VALUES
(1, 'OS192179426', 'doc envelop long 10''', 'office supplies', 'National Book Store', 15, 40, 'pcs', '', '9.00', 0),
(2, 'OS650730502', 'doc envelop short 10''', 'office supplies', 'National Book Store', 15, 50, 'pcs', '', '7.00', 0),
(3, 'OS509981391', 'hard copy long', 'office supplies', 'National Book Store', 4, 14, 'pack', '', '299.95', 0),
(4, 'OS763302456', 'hard copy short', 'office supplies', 'National Book Store', 4, 204, 'pack', '', '299.95', 0),
(5, 'OS985860815', 'LPC copy paper A4 S20', 'office supplies', 'National Book Store', 6, 15, 'pack', '', '567.00', 0),
(6, 'OS838160166', 'Mongol Pencil #1', 'office supplies', 'National Book Store', 5, 10, 'pack', '', '8.00', 0),
(7, 'OS362307184', 'mongol Pencil #2', 'office supplies', 'National Book Store', 5, 10, 'pack', '', '8.00', 0),
(8, 'OS967963297', 'Panda Ballpen black crystal tech pen 25''s', 'office supplies', 'National Book Store', 3, 5, 'pack', '', '20.00', 0),
(9, 'OS950661550', 'panda Ballpen blue crystal tech pen 25''s', 'office supplies', 'National Book Store', 3, 5, 'pack', '', '20.00', 0),
(10, 'OS252029245', 'panda classic bl 12''s', 'office supplies', 'National Book Store', 3, 5, 'pack', '', '10.00', 0),
(11, 'OS444566300', 'panda classic rd 12''s', 'office supplies', 'National Book Store', 3, 0, 'pack', '', '10.00', 0),
(12, 'OS361113541', 'pilot pen black', 'office supplies', 'National Book Store', 3, 203, 'pcs', '', '23.00', 0),
(13, 'OS248222161', 'p-tape thick tan 2"', 'office supplies', 'National Book Store', 5, 20, 'pcs', '', '30.00', 0),
(14, 'OS785546119', 's-tape 1"', 'office supplies', 'National Book Store', 5, 11, 'pcs', '', '20.00', 0),
(15, 'OS476157241', 's-tape 1/2" SML 12''s', 'office supplies', 'National Book Store', 5, 20, 'pcs', '', '15.00', 0),
(16, 'IK47224680', 'Cannon 680', 'Ink', 'Enigma', 5, 90, 'pcs', '2014-01-31', '200.00', 0),
(17, 'IK47224690', 'Epson 900 - Black', 'Ink', 'PC ni Juan', 5, 24, 'pcs', '2014-12-01', '200.00', 0),
(18, 'IK47224600', 'Cannon 900', 'Ink', 'Lazada', 5, 100, 'pcs', '2015-01-31', '120.00', 0),
(20, 'IK972246013', 'Epson 910 - Colored', 'Ink', 'Lazada', 5, 18, 'pcs', '2016-12-01', '200.00', 0),
(21, 'IK472246013', 'canon 725 black', 'ink', 'Enigma', 5, 49, 'pcs', '8/12/2016', '650.00', 0),
(22, 'IK455739120', 'ciss kit', 'ink', 'Enigma', 5, 14, 'pcs', '', '950.00', 0),
(23, 'IK932336662', 'canon 35 black', 'ink', 'Enigma', 5, 10, 'pcs', '', '450.00', 0),
(24, 'IK792845387', 'canon 810 black', 'ink', 'Enigma', 5, 20, 'pcs', '', '1750.00', 0),
(25, 'IK230794360', 'canon 811 colored', 'ink', 'Enigma', 5, 0, 'pcs', '', '979.00', 0),
(26, 'IK144598571', 'canon ip2270', 'ink', 'Enigma', 5, 13, 'pcs', '', '400.00', 0),
(27, 'IK575077341', 'brother lc673', 'ink', 'Enigma', 6, 94, 'pcs', '', '300.00', 0),
(28, 'IK222202169', 'epson 85n cyan', 'ink', 'Enigma', 5, 15, 'pcs', '', '800.00', 0),
(29, 'IK495691699', 'epson 73n cyan', 'ink', 'Enigma', 5, 14, 'pcs', '', '679.00', 0),
(30, 'IK123758933', 'epson t6641 black', 'ink', 'Enigma', 5, 19, 'pcs', '', '730.00', 0),
(31, 'IK989964594', 'espon t6642 cyan', 'ink', 'Enigma', 5, 15, 'pcs', '', '349.00', 0),
(32, 'IK771836115', 'epson t6643 magenta', 'ink', 'Enigma', 5, 15, 'pcs', '', '349.00', 0),
(33, 'IK756902146', 'epson t6644 yellow', 'ink', 'Enigma', 5, 15, 'pcs', '', '349.00', 0),
(34, 'IK646737617', 'hp 46 colored', 'ink', 'Enigma', 5, 15, 'pcs', '', '1347.00', 0),
(35, 'IK516540848', 'hp 11 magneta', 'ink', 'Enigma', 5, 12, 'pcs', '', '1880.00', 0),
(36, 'IK316375276', 'hp 11 yellow', 'ink', 'Enigma', 5, 12, 'pcs', '', '1180.00', 0),
(37, 'IK360287120', 'hp 678 colored', 'ink', 'Enigma', 5, 20, 'pcs', '', '860.00', 0),
(38, 'IK968891372', 'hp 702 black', 'ink', 'Enigma', 5, 19, 'pcs', '', '1435.00', 0),
(39, 'IK619007281', 'hp 703 black', 'ink', 'Enigma', 5, 20, 'pcs', '', '940.00', 0),
(40, 'IK642106066', 'hp 704 black', 'ink', 'Enigma', 5, 20, 'pcs', '', '489.99', 0),
(41, 'IK371978217', 'hp 704 colored', 'ink', 'Enigma', 5, 20, 'pcs', '', '480.00', 0),
(42, 'IK548791809', 'hp 56 black', 'ink', 'Enigma', 5, 14, 'pcs', '', '320.00', 0),
(43, 'IK643888735', 'hp 87 black', 'ink', 'Enigma', 5, 15, 'pcs', '', '950.00', 0),
(44, 'IK821358287', 'hp 725 black', 'ink', 'Enigma', 5, 15, 'pcs', '', '890.00', 0),
(45, 'IK295382680', 'hp 87 yellow', 'ink', 'Enigma', 5, 10, 'pcs', '', '950.00', 0),
(46, 'IK923970571', 'hp 900 colored', 'ink', 'Enigma', 5, 10, 'pcs', '', '950.00', 0),
(47, 'IK697389513', 'hp 920 magenta', 'ink', 'Enigma', 5, 10, 'pcs', '', '869.00', 0),
(48, 'IK769814657', 'hp 95 colored', 'ink', 'Enigma', 5, 10, 'pcs', '', '1200.00', 0),
(49, 'IK320327407', 'hp 97 colored', 'ink', 'Enigma', 5, 10, 'pcs', '', '1189.00', 0),
(50, 'IK412932634', 'hp 22 colored', 'ink', 'Enigma', 5, 10, 'pcs', '', '1389.00', 0),
(51, 'IK971934462', 'ink refill black', 'ink', 'Enigma', 5, 14, 'pcs', '', '400.00', 0),
(52, 'IK108141972', 'ink refill cyan', 'ink', 'Enigma', 5, 15, 'pcs', '', '400.00', 0),
(53, 'IK211204942', 'ink refill magenta', 'ink', 'Enigma', 5, 13, 'pcs', '', '400.00', 0),
(54, 'IK453005587', 'ink refill yellow', 'ink', 'Enigma', 5, 68, 'pcs', '', '400.00', 0),
(55, 'AI12345', 'test', 'Flash Drive', 'armando', 12, 13, 'pcs', '', '12.00', 1),
(56, 'sss', '345', 'Flash Drive', 'Enigma', 0, 2, 'asdf', '10/04/2016 18:39', '0.00', 1),
(57, 'ssssdasdasdasd', '3wrgdsdf', 'Flash Drive', 'Enigma', 333, 13, '3', '10/04/2016 18:50', '333.00', 1),
(58, 'pr3845892', 'cannon xxx', 'Printer', 'Kebs Ent.', 4, 4, 'pcs', '10/05/2016 06:01', '2500.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `profile_tbl`
--

CREATE TABLE IF NOT EXISTS `profile_tbl` (
  `Acc_ID` varchar(30) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `MiddleName` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `Contact` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE IF NOT EXISTS `purchases` (
`transaction_id` int(11) NOT NULL,
  `invoice_number` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `suplier` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sale_tbl`
--

CREATE TABLE IF NOT EXISTS `sale_tbl` (
  `Product_ID` varchar(20) NOT NULL,
  `Product_Name` varchar(50) NOT NULL,
  `Category` varchar(50) NOT NULL,
  `Selling_Price` int(100) NOT NULL,
  `Quantity` int(100) NOT NULL,
  `Amount` int(100) NOT NULL,
  `Profit` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales_order`
--

CREATE TABLE IF NOT EXISTS `sales_order` (
`transaction_id` int(11) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `product` varchar(100) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `profit` varchar(100) NOT NULL,
  `Product_ID` varchar(150) NOT NULL,
  `gen_name` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` varchar(100) NOT NULL,
  `discount` varchar(100) NOT NULL,
  `date` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `service_id` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `customer` varchar(50) NOT NULL,
  `contact` int(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `serviceflag` int(1) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_id`, `description`, `customer`, `contact`, `status`, `serviceflag`, `date`) VALUES
('SE-20101', 'Not turning on. Black screen', 'armando', 2147483647, 'pending', 0, '10/2/2016'),
('SE-3383332', 'Broken LCD screen', 'Mark', 9129481, 'Pending', 0, '10/02/2016 15:45'),
('SE-305322', 'ss', 'ss', 0, 'ss', 0, '10/03/2016 17:29'),
('SE-0962323', 'ss', 'ss', 0, '', 0, '10/04/2016 18:54'),
('SE-4223332', 'sads', 'ssssdasd', 9268, 'Complete', 0, '10/04/2016 18:57');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
`acc_id` int(15) NOT NULL,
  `Staff_ID` varchar(15) NOT NULL,
  `FName` varchar(15) NOT NULL,
  `LName` varchar(15) NOT NULL,
  `Contact` int(11) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `staffflag` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`acc_id`, `Staff_ID`, `FName`, `LName`, `Contact`, `Address`, `date`, `staffflag`) VALUES
(15, 'MB2016-01', '2kiyi8dyaw', 'awlkdj', 19823, 'akwjd', '10/09/2016 07:45', 1),
(16, 'MB2016-02', 'test223', 'test2', 813, 'test2', '10/09/2016 07:45', 1),
(17, 'MB2016-03', 'armando', 'cabrillas', 2147483647, 'baguio2', '10/09/2016 08:27', 0),
(18, 'MB2016-04', 'test', 'test', 0, 'test', '10/09/2016 08:57', 0);

-- --------------------------------------------------------

--
-- Table structure for table `supliers`
--

CREATE TABLE IF NOT EXISTS `supliers` (
`supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(100) NOT NULL,
  `supplier_address` varchar(100) NOT NULL,
  `supplier_contact` int(11) NOT NULL,
  `contact_person` varchar(100) NOT NULL,
  `Email` varchar(500) NOT NULL,
  `date` varchar(50) NOT NULL,
  `createdBy` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supliers`
--

INSERT INTO `supliers` (`supplier_id`, `supplier_name`, `supplier_address`, `supplier_contact`, `contact_person`, `Email`, `date`, `createdBy`) VALUES
(8, 'Lazada', 'Pasig', 91225282, 'Lazada', 'Lazada@gmail.com', '', ''),
(11, 'aceHARDWARE', 'Burgos St.', 2147483647, 'Edrei', 'acehardwarebaguio@yahoo.com', '10/06/2016 05:00', ''),
(12, 'Kebs Ent.', 'baguio city', 92374234, 'kebs', 'kebs@gmail.com', '10/06/2016 05:56', ''),
(13, 'ENIGMA', 'Baguio', 923281102, 'ENIGMA', 'Enigma@gmail.com', '10/09/2016 05:48', '');

-- --------------------------------------------------------

--
-- Table structure for table `unitmeasure`
--

CREATE TABLE IF NOT EXISTS `unitmeasure` (
  `UM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ztblcustomer`
--

CREATE TABLE IF NOT EXISTS `ztblcustomer` (
  `cid` int(1) NOT NULL,
  `inicode` int(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ztblcustomer`
--

INSERT INTO `ztblcustomer` (`cid`, `inicode`) VALUES
(1, 4),
(1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `ztblpresales`
--

CREATE TABLE IF NOT EXISTS `ztblpresales` (
`salesID` int(11) NOT NULL,
  `transID` varchar(50) NOT NULL,
  `prodCode` varchar(14) NOT NULL,
  `prodDesc` varchar(150) NOT NULL,
  `prodQty` decimal(11,0) NOT NULL,
  `sellAmount` decimal(15,2) NOT NULL,
  `subTot` decimal(11,2) NOT NULL,
  `Vat` double(11,2) NOT NULL,
  `sellDate` date NOT NULL,
  `outMode` varchar(25) NOT NULL,
  `Client` int(11) NOT NULL,
  `transBy` int(11) NOT NULL,
  `saleFlag` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ztblpresales`
--

INSERT INTO `ztblpresales` (`salesID`, `transID`, `prodCode`, `prodDesc`, `prodQty`, `sellAmount`, `subTot`, `Vat`, `sellDate`, `outMode`, `Client`, `transBy`, `saleFlag`) VALUES
(24, '2016-10-00039-RO', 'OS509981391', 'hard copy long', '3', '299.95', '301.95', 0.00, '2016-10-04', '', 0, 0, 1),
(25, '2016-10-00040-RO', 'OS509981391', 'hard copy long', '3', '299.95', '899.85', 0.00, '2016-10-04', '', 0, 0, 1),
(26, '2016-10-00040-RO', 'OS192179426', 'doc envelop long 10''', '10', '9.00', '198.00', 0.00, '2016-10-04', '', 0, 0, 1),
(27, '2016-10-00048-RO', 'OS785546119', 's-tape 1"', '1', '20.00', '20.00', 0.00, '0000-00-00', '', 0, 0, 1),
(28, '2016-10-00050-RO', 'OS785546119', 's-tape 1"', '1', '20.00', '20.00', 0.00, '2016-10-04', '', 0, 0, 1),
(29, '2016-10-00051-RO', 'OS785546119', 's-tape 1"', '1', '20.00', '20.00', 0.00, '2016-10-04', '', 0, 0, 1),
(33, '2016-10-00055-RO', 'IK316375276', 'hp 11 yellow', '14', '1180.00', '16520.00', 0.00, '2016-10-04', '', 0, 0, 1),
(35, '2016-10-00057-RO', 'OS785546119', 's-tape 1"', '2', '20.00', '40.00', 0.00, '2016-10-04', '', 0, 0, 1),
(36, '2016-10-00063-RO', 'IK472246013', 'canon 725 black', '6', '650.00', '3900.00', 0.00, '2016-10-04', '', 0, 0, 1),
(37, '2016-10-00064-RO', 'IK472246013', 'canon 725 black', '20', '650.00', '13000.00', 0.00, '2016-10-04', '', 0, 0, 1),
(38, '2016-10-00075-RO', 'IK316375276', 'hp 11 yellow', '1', '1180.00', '1180.00', 0.00, '2016-10-04', '', 0, 0, 1),
(41, '2016-10-00079-RO', 'IK516540848', 'hp 11 magneta', '1', '1880.00', '1880.00', 0.00, '2016-10-04', '', 0, 0, 1),
(42, '2016-10-00088-RO', 'IK316375276', 'hp 11 yellow', '1', '1180.00', '1180.00', 0.00, '2016-10-04', '', 0, 0, 1),
(44, '2016-10-00096-RO', 'IK932336662', 'canon 35 black', '2', '450.00', '900.00', 0.00, '2016-10-04', '', 0, 0, 1),
(45, '2016-10-00096-RO', 'IK495691699', 'epson 73n cyan', '1', '679.00', '679.00', 0.00, '2016-10-04', '', 0, 0, 1),
(46, '2016-10-000107-RO', 'IK575077341', 'brother lc673', '2', '300.00', '600.00', 0.00, '2016-10-05', '', 0, 0, 1),
(47, '2016-10-000108-RO', 'IK575077341', 'brother lc673', '14', '300.00', '4200.00', 0.00, '2016-10-05', '', 0, 0, 1),
(48, '2016-10-000111-RO', 'IK575077341', 'brother lc673', '26', '300.00', '7800.00', 0.00, '2016-10-05', '', 0, 0, 1),
(49, '2016-10-000114-RO', 'IK47224680', 'Cannon 680', '19', '200.00', '3800.00', 0.00, '2016-10-05', '', 0, 0, 1),
(50, '2016-10-000116-RO', 'IK47224600', 'Cannon 900', '17', '120.00', '2040.00', 0.00, '2016-10-05', '', 0, 0, 1),
(51, '2016-10-000117-RO', 'IK932336662', 'canon 35 black', '19', '450.00', '8550.00', 0.00, '2016-10-05', '', 0, 0, 1),
(52, '2016-10-000118-RO', 'IK144598571', 'canon ip2270', '14', '400.00', '5600.00', 0.00, '2016-10-05', '', 0, 0, 1),
(53, '2016-10-000120-RO', 'IK792845387', 'canon 810 black', '20', '1750.00', '35000.00', 0.00, '2016-10-05', '', 0, 0, 1),
(54, '2016-10-000121-RO', 'IK455739120', 'ciss kit', '14', '950.00', '13300.00', 0.00, '2016-10-05', '', 0, 0, 1),
(55, '2016-10-000122-RO', 'IK230794360', 'canon 811 colored', '20', '979.00', '19580.00', 0.00, '2016-10-05', '', 0, 0, 1),
(56, '2016-10-000129-RO', 'IK575077341', 'brother lc673', '6', '300.00', '1800.00', 0.00, '2016-10-06', '', 0, 0, 1),
(57, '2016-10-000131-RO', 'IK47224680', 'Cannon 680', '10', '200.00', '2000.00', 0.00, '2016-10-06', '', 0, 0, 1),
(58, '2016-10-000134-RO', 'pr3845892', 'cannon xxx', '1', '2500.00', '2500.00', 0.00, '2016-10-05', '', 0, 0, 1),
(59, '2016-10-000136-RO', 'pr3845892', 'cannon xxx', '1', '2500.00', '2500.00', 0.00, '2016-10-05', '', 0, 0, 0),
(62, '2016-10-000153-RO', 'IK316375276', 'hp 11 yellow', '2', '1180.00', '2360.00', 0.00, '2016-10-09', '', 0, 0, 1),
(67, '2016-10-000154-RO', 'IK472246013', 'canon 725 black', '1', '650.00', '650.00', 0.00, '2016-10-09', '', 0, 0, 1),
(68, '2016-10-000155-RO', 'IK316375276', 'hp 11 yellow', '1', '1180.00', '1180.00', 0.00, '2016-10-09', '', 0, 0, 1),
(69, '2016-10-000157-RO', 'IK516540848', 'hp 11 magneta', '1', '1880.00', '1880.00', 0.00, '2016-10-09', '', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ztblstaff`
--

CREATE TABLE IF NOT EXISTS `ztblstaff` (
  `sid` int(1) NOT NULL,
  `inicode` int(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ztblstaff`
--

INSERT INTO `ztblstaff` (`sid`, `inicode`) VALUES
(1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `ztbltrans`
--

CREATE TABLE IF NOT EXISTS `ztbltrans` (
`tid` int(11) NOT NULL,
  `inicode` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ztbltrans`
--

INSERT INTO `ztbltrans` (`tid`, `inicode`) VALUES
(1, 158);

-- --------------------------------------------------------

--
-- Table structure for table `ztbltransactions`
--

CREATE TABLE IF NOT EXISTS `ztbltransactions` (
  `transID` varchar(100) NOT NULL,
  `client` varchar(110) NOT NULL,
  `saleAmount` double(11,2) NOT NULL,
  `Tendered` double(11,2) NOT NULL,
  `Discount` double(11,2) NOT NULL,
  `chAmt` double(11,2) NOT NULL,
  `VAT` double(11,2) NOT NULL,
  `totalItems` int(11) NOT NULL,
  `transType` varchar(30) NOT NULL,
  `transDate` datetime NOT NULL,
  `transBy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ztbltransactions`
--

INSERT INTO `ztbltransactions` (`transID`, `client`, `saleAmount`, `Tendered`, `Discount`, `chAmt`, `VAT`, `totalItems`, `transType`, `transDate`, `transBy`) VALUES
('2016-10-000108-RO', '', 4200.00, 4200.00, 0.00, 0.00, 0.00, 14, '', '2016-10-05 07:40:00', 0),
('2016-10-000111-RO', '', 7800.00, 10000.00, 0.00, 2200.00, 0.00, 26, '', '2016-10-05 08:50:50', 0),
('2016-10-000114-RO', '', 3800.00, 4000.00, 0.00, 200.00, 0.00, 19, '', '2016-10-05 08:53:59', 0),
('2016-10-000116-RO', '', 2040.00, 2040.00, 0.00, 0.00, 0.00, 17, '', '2016-10-05 08:55:10', 0),
('2016-10-000117-RO', '', 8550.00, 8550.00, 0.00, 0.00, 0.00, 19, '', '2016-10-05 08:58:12', 0),
('2016-10-000118-RO', '', 5600.00, 6000.00, 0.00, 400.00, 0.00, 14, '', '2016-10-05 09:04:00', 0),
('2016-10-000120-RO', '', 35000.00, 35000.00, 0.00, 0.00, 0.00, 20, '', '2016-10-05 09:07:03', 0),
('2016-10-000121-RO', '', 13300.00, 13300.00, 0.00, 0.00, 0.00, 14, '', '2016-10-05 09:09:17', 0),
('2016-10-000122-RO', '', 19580.00, 20000.00, 0.00, 420.00, 0.00, 20, '', '2016-10-05 09:10:26', 0),
('2016-10-000129-RO', '', 1800.00, 1800.00, 0.00, 0.00, 0.00, 6, '', '2016-10-06 10:53:12', 0),
('2016-10-000131-RO', '', 2000.00, 3000.00, 0.00, 1000.00, 0.00, 10, '', '2016-10-06 10:55:21', 0),
('2016-10-000134-RO', '', 2500.00, 3000.00, 0.00, 500.00, 0.00, 1, '', '2016-10-05 12:03:20', 0),
('2016-10-000153-RO', '', 2360.00, 3000.00, 0.00, 640.00, 0.00, 2, '', '2016-10-09 20:32:03', 0),
('2016-10-000154-RO', '', 650.00, 1000.00, 0.00, 350.00, 0.00, 1, '', '2016-10-09 21:07:24', 0),
('2016-10-000155-RO', '', 1180.00, 1500.00, 0.00, 320.00, 0.00, 1, '', '2016-10-09 21:14:58', 0),
('2016-10-000157-RO', '', 1880.00, 2000.00, 0.00, 120.00, 0.00, 1, '', '2016-10-09 21:15:36', 0),
('2016-10-00040-RO', '', 989.85, 1000.00, 0.00, 10.15, 0.00, 13, '', '2016-10-04 00:45:34', 0),
('2016-10-00057-RO', '', 40.00, 30.00, 0.00, -10.00, 0.00, 2, '', '2016-10-04 09:02:13', 0),
('2016-10-00064-RO', '', 13000.00, 10000.00, 0.00, -3000.00, 0.00, 20, '', '2016-10-04 13:24:32', 0),
('2016-10-00079-RO', '', 1880.00, 232.00, 0.00, -1648.00, 0.00, 1, '', '2016-10-04 14:24:02', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acc_tbl`
--
ALTER TABLE `acc_tbl`
 ADD PRIMARY KEY (`acc_id`);

--
-- Indexes for table `category_tbl`
--
ALTER TABLE `category_tbl`
 ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
 ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
 ADD PRIMARY KEY (`expense_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_tbl`
--
ALTER TABLE `payment_tbl`
 ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `product_tbl`
--
ALTER TABLE `product_tbl`
 ADD PRIMARY KEY (`Product_ID`);

--
-- Indexes for table `profile_tbl`
--
ALTER TABLE `profile_tbl`
 ADD PRIMARY KEY (`Acc_ID`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
 ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `sale_tbl`
--
ALTER TABLE `sale_tbl`
 ADD PRIMARY KEY (`Product_ID`);

--
-- Indexes for table `sales_order`
--
ALTER TABLE `sales_order`
 ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
 ADD PRIMARY KEY (`acc_id`);

--
-- Indexes for table `supliers`
--
ALTER TABLE `supliers`
 ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `ztblpresales`
--
ALTER TABLE `ztblpresales`
 ADD PRIMARY KEY (`salesID`);

--
-- Indexes for table `ztbltrans`
--
ALTER TABLE `ztbltrans`
 ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `ztbltransactions`
--
ALTER TABLE `ztbltransactions`
 ADD PRIMARY KEY (`transID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_tbl`
--
ALTER TABLE `category_tbl`
MODIFY `catid` int(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
MODIFY `expense_id` int(15) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=115;
--
-- AUTO_INCREMENT for table `product_tbl`
--
ALTER TABLE `product_tbl`
MODIFY `Product_ID` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sales_order`
--
ALTER TABLE `sales_order`
MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
MODIFY `acc_id` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `supliers`
--
ALTER TABLE `supliers`
MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `ztblpresales`
--
ALTER TABLE `ztblpresales`
MODIFY `salesID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `ztbltrans`
--
ALTER TABLE `ztbltrans`
MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
