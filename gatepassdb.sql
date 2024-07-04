-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2024 at 04:30 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gatepassdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `id_no` varchar(255) NOT NULL,
  `rfid_number` varchar(10) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `date_of_birth` date NOT NULL,
  `role` varchar(255) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `civil_status` varchar(10) NOT NULL,
  `contact_number` varchar(11) DEFAULT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `department` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `complete_address` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `place_of_birth` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_no`, `rfid_number`, `last_name`, `first_name`, `middle_name`, `date_of_birth`, `role`, `sex`, `civil_status`, `contact_number`, `email_address`, `department`, `section`, `status`, `complete_address`, `photo`, `place_of_birth`) VALUES
(4, '45', '4234234234', 'ert', 'ert', '', '2024-06-03', 'Student', 'Female', '', '34532345453', 'ert@GMAIL.COM', '', '', 'Active', 'erdr', '', ''),
(6, 'ertert', '2342524232', 'we', 'ewrt', 'ert', '2024-06-03', 'ert', 'Male', 'Single', '23425264366', '', '', 'Einstein', 'Active', '', '', ''),
(8, '2131243453', '3242434234', 'Ungon', 'Kyebe Jean', 'Maciar', '2024-05-30', 'Visitor', 'Female', 'Single', '23423556666', 'wer@gmail.com', 'mis', 'South', 'Active', 'aerdsr', '', 'talangnan'),
(9, '', '2333333333', 'ujnz', 'kathy', '', '2024-06-19', 'Employee', 'Female', 'Widowed', '', '', 'Accounting', '', 'Active', '', 'i the one apk download.jpg', ''),
(10, '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'Active', '', 'IPOO.png', ''),
(11, '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'Active', '', '', ''),
(13, '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', ''),
(14, '322222', '2342342334', 'wer', 'erw', 'wer', '2024-06-17', 'Instructor', 'Female', 'Widowed', '65452342333', '', 'Humss', '', 'Active', 'dsfdfs', '', 'wertw'),
(15, '34665', '3344555333', 'wet', 'ert', 'df', '2024-05-27', 'Student', 'Female', 'Single', '', '', 'Accounting', '', 'Active', 'drwert', 'apex racer apk download.jpg', 'fffg'),
(16, '23425', '', 'sdsdtgsrad', 'stgsrfa', 'sdfsdf', '2024-06-04', 'Instructor', 'Female', 'Married', '67856745674', 'ersr@gmail.com', 'Humss', '', 'Active', 'stsdtsdr', 'edens ritter x apk download.png', 'serawrasd'),
(17, '123', '', 'sdfasdfs', 'ewrasd', 'sdf', '2024-06-26', 'Student', 'Male', 'Married', '24524543242', 'asd@gmail.com', 'Humss', '', 'Active', 'aswE', 'rogue with the dead apk download.jpg', 'asdas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
