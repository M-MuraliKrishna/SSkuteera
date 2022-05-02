-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2022 at 12:26 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sskuteera`
--

-- --------------------------------------------------------

--
-- Table structure for table `accomoimages`
--

CREATE TABLE `accomoimages` (
  `id` int(11) NOT NULL,
  `accomoName` varchar(200) NOT NULL,
  `accomoImage` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accomoimages`
--

INSERT INTO `accomoimages` (`id`, `accomoName`, `accomoImage`, `create_at`) VALUES
(1, 'Accommodation1', 'img1.jpg', '2021-11-06 18:56:49'),
(2, 'Accommodation2', 'act3.jpg', '2021-11-06 18:57:13'),
(3, 'Accommodation3', 'act2.jpg', '2021-11-06 18:57:30');

-- --------------------------------------------------------

--
-- Table structure for table `activitesimage`
--

CREATE TABLE `activitesimage` (
  `id` int(11) NOT NULL,
  `activitesimageName` varchar(255) NOT NULL,
  `activitesImage` varchar(255) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activitesimage`
--

INSERT INTO `activitesimage` (`id`, `activitesimageName`, `activitesImage`, `createdat`) VALUES
(1, 'Marriage ', 'WhatsApp Image 2022-05-01 at 12.53.01 PM.jpeg', '2022-05-01 08:56:10'),
(2, 'Naming ceremony', 'WhatsApp Image 2022-05-01 at 12.53.02 PM.jpeg', '2022-05-01 08:56:26'),
(3, 'Birthday & Bachelor\'s Party', 'WhatsApp Image 2022-05-01 at 12.53.02 PM (4).jpeg', '2022-05-01 09:21:01'),
(4, 'A Day Out ', 'WhatsApp Image 2022-05-01 at 12.53.02 PM (3).jpeg', '2022-05-01 09:14:06'),
(5, 'Photo Shoots ', 'WhatsApp Image 2022-05-01 at 12.53.02 PM (1).jpeg', '2022-05-01 09:14:24'),
(6, 'Miscellaneous Events', 'WhatsApp Image 2022-05-01 at 12.53.02 PM (2).jpeg', '2022-05-01 09:14:38');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `noPersons` varchar(200) NOT NULL,
  `dateOccasion` datetime NOT NULL,
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `createat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `poll` text NOT NULL,
  `comments` text NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `imageName` varchar(200) NOT NULL,
  `imagePic` varchar(255) NOT NULL,
  `createdat` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `imageName`, `imagePic`, `createdat`) VALUES
(1, 'Swimming', 'P96D0081.JPG', '2022-04-25 15:40:57'),
(2, 'Cycling', 'P96D0049.JPG', '2022-04-25 15:41:09'),
(3, 'Spa', 'P96D0034.JPG', '2022-04-25 15:41:20'),
(4, 'Bar', 'P96D0513.JPG', '2022-04-25 15:41:34'),
(5, 'Tennis', 'P96D0012.JPG', '2022-04-25 15:41:48'),
(6, 'Room', 'P96D0054.JPG', '2022-04-25 15:42:01'),
(7, 'Staff', 'P96D0050.JPG', '2022-04-25 15:42:12');

-- --------------------------------------------------------

--
-- Table structure for table `introimage`
--

CREATE TABLE `introimage` (
  `id` int(11) NOT NULL,
  `introimageName` varchar(100) NOT NULL,
  `introImage` varchar(255) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `introimage`
--

INSERT INTO `introimage` (`id`, `introimageName`, `introImage`, `createdat`) VALUES
(1, 'introimage', 'bb858d9e-9498-4575-8cce-3adcdf6f03e2.jpg', '2021-10-15 17:27:26'),
(2, 'introimage', 'act6.jpg', '2021-11-06 19:09:25'),
(3, 'Intro', 'intro.jpg', '2022-04-25 15:56:56');

-- --------------------------------------------------------

--
-- Table structure for table `introvideo`
--

CREATE TABLE `introvideo` (
  `id` int(11) NOT NULL,
  `introvideoName` varchar(200) NOT NULL,
  `introVideo` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `introvideo`
--

INSERT INTO `introvideo` (`id`, `introvideoName`, `introVideo`, `create_at`) VALUES
(1, 'SSKuteera', 'Beautiful.mp4', '2022-05-01 05:41:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phoneno` varchar(15) NOT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0,
  `createAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phoneno`, `role_as`, `createAt`) VALUES
(1, 'Murali', 'murali@gmail.com', '12345', '8904771909', 1, '2021-10-07 17:26:11'),
(2, 'muku', 'muku@gmail.com', '12345', '98765432', 0, '2021-10-04 16:37:26'),
(3, 'Santhosh', 'santhu@gmail.com', '12345', '987654322', 0, '2021-10-07 18:02:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accomoimages`
--
ALTER TABLE `accomoimages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activitesimage`
--
ALTER TABLE `activitesimage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `introimage`
--
ALTER TABLE `introimage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `introvideo`
--
ALTER TABLE `introvideo`
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
-- AUTO_INCREMENT for table `accomoimages`
--
ALTER TABLE `accomoimages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `activitesimage`
--
ALTER TABLE `activitesimage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `introimage`
--
ALTER TABLE `introimage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `introvideo`
--
ALTER TABLE `introvideo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
