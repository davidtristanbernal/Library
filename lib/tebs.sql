-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2024 at 12:42 AM
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
-- Database: `tebs`
--

-- --------------------------------------------------------

--
-- Table structure for table `submitted_data`
--

CREATE TABLE `submitted_data` (
  `id` int(11) NOT NULL,
  `grade_section` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lrn` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `subject` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `submitted_data`
--

INSERT INTO `submitted_data` (`id`, `grade_section`, `name`, `lrn`, `date`, `time`, `subject`, `title`, `submission_date`) VALUES
(44, '01 Jupiter', 'david maggay bernal', '105638070014', '2024-04-11', '07:00:00', 'Fantasy, Adventure', 'Chronicles of Narnia', '2024-04-10 22:42:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `submitted_data`
--
ALTER TABLE `submitted_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `submitted_data`
--
ALTER TABLE `submitted_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
