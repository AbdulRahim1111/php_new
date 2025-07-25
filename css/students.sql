-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2025 at 05:55 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `students`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_batch`
--

CREATE TABLE `tbl_batch` (
  `batch_id` int(11) NOT NULL,
  `batch_name` varchar(100) NOT NULL,
  `batch_capacity` int(11) NOT NULL,
  `batch_start_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_batch`
--

INSERT INTO `tbl_batch` (`batch_id`, `batch_name`, `batch_capacity`, `batch_start_date`) VALUES
(5, ' Ai_Prime', 20, '2021-12-01'),
(6, ' prime 3', 10, '2020-02-03'),
(7, 'Ai', 22, '2025-04-01'),
(9, 'Ai-prime1', 22, '2022-03-02'),
(12, ' Prime', 15, '2025-07-19'),
(14, ' Short_Course', 19, '2025-07-05'),
(15, 'JavaScript', 22, '2025-07-01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_std`
--

CREATE TABLE `tbl_std` (
  `std_id` int(11) NOT NULL,
  `std_name` varchar(100) NOT NULL,
  `std_email` varchar(100) NOT NULL,
  `std_password` varchar(100) NOT NULL,
  `batch_info` int(11) NOT NULL,
  `teacher_info` int(11) NOT NULL,
  `std_img` varchar(100) NOT NULL,
  `std_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teacher`
--

CREATE TABLE `tbl_teacher` (
  `teacher_id` int(11) NOT NULL,
  `teacher_name` varchar(50) NOT NULL,
  `teacher_email` varchar(50) NOT NULL,
  `teacher_password` varchar(20) NOT NULL,
  `batch_info` int(11) NOT NULL,
  `teacher_img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_teacher`
--

INSERT INTO `tbl_teacher` (`teacher_id`, `teacher_name`, `teacher_email`, `teacher_password`, `batch_info`, `teacher_img`) VALUES
(9, 'Rahim   ', 'rahim@gmil.com   ', '11111', 6, 'img/Screenshot 2025-06-23 111040.png'),
(11, 'Waseef ', 'waseef@gmail.com ', '11345', 15, 'img/Screenshot (1).png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `usre_id` int(11) NOT NULL,
  `username` varchar(33) NOT NULL,
  `user_password` varchar(11) NOT NULL,
  `user_type` varchar(33) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`usre_id`, `username`, `user_password`, `user_type`) VALUES
(1, 'admin', 'admin123', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_batch`
--
ALTER TABLE `tbl_batch`
  ADD PRIMARY KEY (`batch_id`);

--
-- Indexes for table `tbl_std`
--
ALTER TABLE `tbl_std`
  ADD PRIMARY KEY (`std_id`);

--
-- Indexes for table `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  ADD PRIMARY KEY (`teacher_id`),
  ADD KEY `new_fk` (`batch_info`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`usre_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_batch`
--
ALTER TABLE `tbl_batch`
  MODIFY `batch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_std`
--
ALTER TABLE `tbl_std`
  MODIFY `std_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `usre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  ADD CONSTRAINT `new_fk` FOREIGN KEY (`batch_info`) REFERENCES `tbl_batch` (`batch_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
