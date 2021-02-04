-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 19, 2019 at 06:04 AM
-- Server version: 5.6.41-84.1
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myapollo_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `apollo_admin`
--

CREATE TABLE `apollo_admin` (
  `id` int(11) NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `apollo_admin`
--

INSERT INTO `apollo_admin` (`id`, `email`, `password`, `date`) VALUES
(1, 'demo@gmail.com', 'Demo@12', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `apollo_ccode`
--

CREATE TABLE `apollo_ccode` (
  `id` int(11) NOT NULL,
  `ccode` varchar(222) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(222) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `apollo_ccode`
--

INSERT INTO `apollo_ccode` (`id`, `ccode`, `country`, `date`) VALUES
(7, '+11', 'China', '2019-10-19'),
(6, '+1', 'US', '2019-10-19'),
(5, '+91', 'India', '2019-10-19'),
(8, '+167', 'Russia', '2019-10-19');

-- --------------------------------------------------------

--
-- Table structure for table `apollo_clients`
--

CREATE TABLE `apollo_clients` (
  `id` int(11) NOT NULL,
  `dealerid` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `age` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `mobileno` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `apollo_clients`
--

INSERT INTO `apollo_clients` (`id`, `dealerid`, `name`, `age`, `email`, `mobileno`, `date`) VALUES
(127, '8', 'Shubham', '29', 'shubham@yopmail.com', '+911234567890', '2019-10-19'),
(126, '8', 'Anky', '25', 'anky@yopmail.com', '+911234567890', '2019-10-19'),
(125, '8', 'Rohit', '29', 'rohitraorss81@gmail.com', '+911234567890', '2019-10-19'),
(124, '8', 'Shubham', '29', 'shubham@yopmail.com', '+919717487719', '2019-10-19'),
(123, '8', 'Rohit', '25', 'sunpreetsingh8800@gmail.com', '+918800875833', '2019-10-19'),
(122, '8', 'Sunny', '23', 'sunnysingh9585@gmail.com', '+918787654567', '2019-10-19'),
(121, '8', 'Shivam', '12', 's@gmail.com', '+914545467898', '2019-10-19'),
(120, '8', 'Shubham', '29', 'rohitraorss81@gmail.com', '+918287734738', '2019-10-19'),
(119, '8', 'Shubham', '29', 'shubham@gmail.com', '+919999999999', '2019-10-19'),
(118, '8', 'Shubham', '29', 'shubham@gmail.com', '+918732149823', '2019-10-19'),
(117, '8', 'Shubham', '29', 'shubham@gmail.com', '+919765874517', '2019-10-19'),
(116, '8', 'Shubham', '29', 'shubham@gmail.com', '+919876457634', '2019-10-19'),
(115, '8', 'Sunny', '24', 'sunpreetsingh8800@gmail.com', '+918956783455', '2019-10-19'),
(114, '8', 'Sunny', '24', 'sunpreetsingh8800@gmail.com', '+918906784563', '2019-10-19'),
(113, '8', 'Shubham', '29', 'shubham@gmail.com', '+919713467617', '2019-10-19'),
(112, '8', 'Gurjeet', '29', 'g@gmail.com', '+918765498778', '2019-10-19');

-- --------------------------------------------------------

--
-- Table structure for table `apollo_dealer`
--

CREATE TABLE `apollo_dealer` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `resettoken` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `status` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `apollo_dealer`
--

INSERT INTO `apollo_dealer` (`id`, `name`, `username`, `password`, `resettoken`, `date`, `status`) VALUES
(14, 'Dealer7', 'Dealer@7', 'Dealer@7', 'L1gIFEDZOxkb3xyxk8zJ83szrscK8OZUQfCvUgvJ', '2019-10-19', 0),
(13, 'Dealer6', 'Dealer@6', 'Dealer@6', 'uh3ZZ9pPNX3r0j1rA2w3E2KcMSuzB0R5hV4h5t6S', '2019-10-19', 0),
(12, 'Dealer5', 'Dealer@5', 'Dealer@5', 'H0lXDPEXXTm0TzV7fyMBRfdmwGhrQ5yy5UwJJaGG', '2019-10-19', 1),
(11, 'Dealer4', 'Dealer@4', 'Dealer@4', 'fWzOVVUNVpkP6KoNlQSYqmMi25gob8eq5Ne0J9OF', '2019-10-19', 1),
(10, 'Dealer3', 'Dealer@3', 'Dealer@3', 'xwoiltaj9rgETf1hf6LPpPf8QWWIjiDRP29bwkvF', '2019-10-19', 0),
(9, 'Dealer2', 'Dealer@2', 'Dealer@2', 'xJx4vbitGZpzeAsybIcEjNriKadEJSGgCdl8pDC6', '2019-10-19', 0),
(8, 'Dealer1', 'Dealer@1', 'Dealer@1', 'uLwJz2apcu8XuDwfJO7fy6qQne9LYwrtiXcRZnhc', '2019-10-19', 0),
(15, 'Dealer8', 'Dealer@8', 'Dealer@8', 'CqR7mjhmujm9ih68zwmuFfRdkbYAeCcR34YpnfMS', '2019-10-19', 0);

-- --------------------------------------------------------

--
-- Table structure for table `apollo_events`
--

CREATE TABLE `apollo_events` (
  `id` int(11) NOT NULL,
  `eventname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `fromd` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `tod` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `venu` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `countryid` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `apollo_events`
--

INSERT INTO `apollo_events` (`id`, `eventname`, `date`, `fromd`, `tod`, `venu`, `countryid`) VALUES
(10, 'Event4(Mysore)', '2019-10-19', '2019-10-06', '2019-10-07', 'Mysore', '5'),
(9, 'Event3(Amritsar)', '2019-10-19', '2019-10-04', '2019-10-06', 'Amritsar', '5'),
(8, 'Event2(Gurgaon)', '2019-10-19', '2019-10-02', '2019-10-03', 'Gurgaon', '5'),
(7, 'Event1(Delhi)', '2019-10-19', '2019-10-01', '2019-10-02', 'Delhi', '5'),
(11, 'Event5(Kochin)', '2019-10-19', '2019-10-06', '2019-10-07', 'Kochin', '5'),
(12, 'Event6(Bangalore)', '2019-10-19', '2019-10-08', '2019-10-09', 'Bangalore', '5'),
(13, 'Event7(Noida)', '2019-10-19', '2019-10-08', '2019-10-09', 'Noida', '5'),
(14, 'Event(Haryana)', '2019-10-19', '2019-10-20', '2019-10-21', 'Haryana', '5'),
(15, 'Event8(Punjab)', '2019-10-19', '2019-10-22', '2019-10-23', 'Punjab', '5'),
(16, 'Event9(Kanpur)', '2019-10-19', '2019-10-22', '2019-10-23', 'Kanpur', '5'),
(17, 'Event10(Noida)', '2019-10-19', '2019-10-19', '2019-10-20', 'Noida', '5');

-- --------------------------------------------------------

--
-- Table structure for table `apollo_upload`
--

CREATE TABLE `apollo_upload` (
  `id` int(11) NOT NULL,
  `dealerid` varchar(22) COLLATE utf8_unicode_ci NOT NULL,
  `clientid` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `eventid` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `apollo_upload`
--

INSERT INTO `apollo_upload` (`id`, `dealerid`, `clientid`, `eventid`, `image`, `date`) VALUES
(42, '14', '123', '10', '14123YnuAwVRJl6.png', '2019-10-19'),
(41, '8', '125', '9', '8125i69MGR50GQ.png', '2019-10-19'),
(40, '8', '124', '8', '8124Dq0YOmoge1.png', '2019-10-19'),
(39, '14', '123', '10', '14123vSIKHVY7wQ.png', '2019-10-19'),
(38, '8', '124', '8', '8124lPQC6DTXAa.png', '2019-10-19'),
(37, '14', '123', '10', '14123qEuRVyDhKe.png', '2019-10-19'),
(36, '8', '123', '10', '8123OLojNKArV4.png', '2019-10-19'),
(35, '8', '122', '9', '8122IkSswcdu86.png', '2019-10-19'),
(34, '8', '121', '10', '8121CC1jbXTEPx.png', '2019-10-19'),
(43, '8', '126', '8', '8126ctp3R9n0Ur.png', '2019-10-19'),
(44, '8', '127', '9', '81271194Bf6Ehw.png', '2019-10-19'),
(45, '8', '127', '9', '8127IDKJG57Q7q.png', '2019-10-19'),
(46, '8', '127', '10', '812781rfGaqYOw.png', '2019-10-19'),
(47, '8', '127', '10', '8127v2wdBha0fl.png', '2019-10-19'),
(48, '8', '125', '9', '8125atUhiNy3tR.png', '2019-10-19');

-- --------------------------------------------------------

--
-- Table structure for table `apollo_user`
--

CREATE TABLE `apollo_user` (
  `id` int(11) NOT NULL,
  `name` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `resettoken` varchar(3000) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `apollo_user`
--

INSERT INTO `apollo_user` (`id`, `name`, `username`, `password`, `resettoken`, `date`) VALUES
(1, 'sfs', 'dsfdsf', 'dsfsdfs', 'sdfdfasfasfjkbjkbj', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apollo_admin`
--
ALTER TABLE `apollo_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apollo_ccode`
--
ALTER TABLE `apollo_ccode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apollo_clients`
--
ALTER TABLE `apollo_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apollo_dealer`
--
ALTER TABLE `apollo_dealer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apollo_events`
--
ALTER TABLE `apollo_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apollo_upload`
--
ALTER TABLE `apollo_upload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apollo_user`
--
ALTER TABLE `apollo_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apollo_admin`
--
ALTER TABLE `apollo_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `apollo_ccode`
--
ALTER TABLE `apollo_ccode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `apollo_clients`
--
ALTER TABLE `apollo_clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `apollo_dealer`
--
ALTER TABLE `apollo_dealer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `apollo_events`
--
ALTER TABLE `apollo_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `apollo_upload`
--
ALTER TABLE `apollo_upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `apollo_user`
--
ALTER TABLE `apollo_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
