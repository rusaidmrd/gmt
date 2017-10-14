-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2017 at 07:21 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gmt_admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_no` varchar(255) DEFAULT NULL,
  `file` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `dateAdded` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `name`, `email`, `phone_no`, `file`, `message`, `dateAdded`) VALUES
(7, 'rusaidmrd', 'rusaidmrd@gmail.com', '0777388376', 'Malik CV (1).docx', 'Assalamu alaikum, please send me the price details as soon as possible', '2017-10-05'),
(6, 'Rusaid', 'rusaidmrd@gmail.com', '0777388376', 'CURRICULAM VITAE.docx', 'Assalamu alaikum, please send me the price details as soon as possible', '2017-10-05'),
(8, 'Malik', 'kamr1990@yahoo.com', '0777388376', 'Luckman - CV for - Sales Man -  25-4-17.pdf', 'Assalamu alaikum, please send me the price details as soon as possible', '2017-10-05'),
(9, 'Thasneem', 'thasneemnext@gmail.com', '0777388376', 'Malik CV s.pdf', 'Assalamu alaikum, please send me the price details as soon as possible', '2017-10-05'),
(10, 'test', 'rd.rusaid@yahoo.com', '97470457636', 'Malik CV p1.pdf', 'test', '2017-10-05'),
(18, 'Abdul Malik Roshan', 'rusaidmrd@gmail.com', '97470457636', 'Doc2.docx', '', '2017-10-12'),
(17, 'Abdul Malik Roshan', 'kamr1990@yahoo.com', '97470457636', 'French.docx', '', '2017-10-06'),
(16, 'Abdul Malik Roshan', 'thasneemnext@gmail.com', '97470457636', 'Arabic.docx', '', '2017-10-05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
