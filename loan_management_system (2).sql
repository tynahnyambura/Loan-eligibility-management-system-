-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2026 at 10:09 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loan_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `loan_applications`
--

CREATE TABLE `loan_applications` (
  `id` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `loan_amount` decimal(10,2) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Pending',
  `attendance` int(11) DEFAULT NULL,
  `participation` int(11) DEFAULT NULL,
  `contribution_amount` decimal(10,2) DEFAULT NULL,
  `eligible_amount` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loan_applications`
--

INSERT INTO `loan_applications` (`id`, `member_id`, `loan_amount`, `status`, `attendance`, `participation`, `contribution_amount`, `eligible_amount`, `created_at`) VALUES
(1, 987654, 10000.00, 'Pending', NULL, NULL, NULL, NULL, '2026-06-17 08:05:42'),
(2, 9876543, 20000.00, 'Pending', NULL, NULL, NULL, NULL, '2026-06-23 08:26:32'),
(3, 0, 0.00, 'Pending', NULL, NULL, NULL, NULL, '2026-06-23 17:09:26'),
(4, 0, 0.00, 'Pending', NULL, NULL, NULL, NULL, '2026-06-23 17:11:13'),
(5, 0, 0.00, 'Pending', NULL, NULL, NULL, NULL, '2026-06-23 17:12:24'),
(6, 0, 0.00, 'Pending', NULL, NULL, NULL, NULL, '2026-06-23 17:12:32'),
(7, 0, 0.00, 'Pending', NULL, NULL, NULL, NULL, '2026-06-23 17:14:18'),
(8, 0, 0.00, 'Pending', NULL, NULL, NULL, NULL, '2026-06-23 17:26:33'),
(9, 0, 0.00, 'Pending', NULL, NULL, NULL, NULL, '2026-06-23 17:26:51'),
(10, 0, 0.00, 'Pending', NULL, NULL, NULL, NULL, '2026-06-23 17:28:23'),
(11, 0, 0.00, 'Pending', NULL, NULL, NULL, NULL, '2026-06-23 17:28:38'),
(12, 0, 0.00, 'Pending', NULL, NULL, NULL, NULL, '2026-06-23 17:28:51'),
(13, 0, 0.00, 'Pending', NULL, NULL, NULL, NULL, '2026-06-23 17:32:25'),
(14, 0, 0.00, 'Pending', NULL, NULL, NULL, NULL, '2026-06-23 17:48:20'),
(15, 819782100, 12000.00, 'Pending', NULL, NULL, NULL, NULL, '2026-06-23 17:57:27'),
(16, 12309876, 15000.00, 'Pending', NULL, NULL, NULL, NULL, '2026-06-23 18:03:33'),
(17, 12309876, 4000.00, 'Pending', NULL, NULL, NULL, NULL, '2026-06-25 07:13:33'),
(18, 12309876, 5000.00, 'Pending', NULL, NULL, NULL, NULL, '2026-06-25 07:35:22'),
(19, 12309876, 70000.00, 'Pending', NULL, NULL, NULL, NULL, '2026-06-26 03:57:00'),
(20, 12309876, 70000.00, 'Pending', NULL, NULL, NULL, NULL, '2026-06-26 03:58:04'),
(21, 12309876, 8989.00, 'Pending', NULL, NULL, NULL, NULL, '2026-06-26 04:24:00'),
(22, 12309876, 80000.00, 'Pending', NULL, NULL, NULL, NULL, '2026-06-26 04:46:33'),
(23, 12309876, 2000.00, 'Pending', NULL, NULL, NULL, NULL, '2026-06-26 09:26:34'),
(24, 12309876, 4000.00, 'Rejected', NULL, NULL, NULL, NULL, '2026-06-26 10:28:46'),
(25, 12309876, 5000.00, 'Approved', NULL, NULL, NULL, NULL, '2026-06-26 11:10:05'),
(26, 75777673, 5000.00, 'Pending', NULL, NULL, NULL, NULL, '2026-06-30 11:24:25'),
(27, 75777673, 5000.00, 'Pending', NULL, NULL, NULL, NULL, '2026-06-30 11:24:44'),
(28, 12568690, 9000.00, 'Pending', NULL, NULL, NULL, NULL, '2026-07-03 09:26:37'),
(29, 12568690, 9000.00, 'Pending', NULL, NULL, NULL, NULL, '2026-07-03 12:18:17'),
(30, 12568690, 8000.00, 'Pending', NULL, NULL, NULL, NULL, '2026-07-03 12:20:17'),
(31, 12568690, 9000.00, 'Pending', 0, 0, 0.00, 0.00, '2026-07-03 16:00:05'),
(32, 12309876, 900.00, 'Pending', 0, 0, 0.00, 0.00, '2026-07-03 16:00:33'),
(33, 12568690, 9000.00, 'Pending', NULL, NULL, NULL, NULL, '2026-07-03 16:04:22'),
(34, 12568690, 9000.00, 'Pending', NULL, NULL, NULL, NULL, '2026-07-03 16:12:11'),
(35, 8, 80000.00, 'Pending', NULL, NULL, NULL, NULL, '2026-07-03 18:39:41'),
(36, 8, 7000.00, 'Pending', NULL, NULL, NULL, NULL, '2026-07-03 18:43:22'),
(37, 9, 9000.00, 'Approved', NULL, NULL, NULL, NULL, '2026-07-04 07:12:49'),
(38, 7, 7000.00, 'Approved', NULL, NULL, NULL, NULL, '2026-07-04 08:18:12');

-- --------------------------------------------------------

--
-- Table structure for table `loan_payments`
--

CREATE TABLE `loan_payments` (
  `id` int(11) NOT NULL,
  `application_id` int(11) DEFAULT NULL,
  `amount_paid` decimal(10,2) DEFAULT NULL,
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `balance` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) DEFAULT NULL,
  `national_id` int(11) DEFAULT NULL,
  `eligibility_status` varchar(20) DEFAULT 'Not Eligible',
  `attendance` int(11) NOT NULL DEFAULT 0,
  `participation` int(11) NOT NULL DEFAULT 0,
  `contribution_amount` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `fullname`, `email`, `phone`, `created_at`, `user_id`, `national_id`, `eligibility_status`, `attendance`, `participation`, `contribution_amount`) VALUES
(1, 'Rohan Kagua', 'rohankagua@gmail.com', '0735454541', '2026-06-16 18:52:13', 12, 987654, 'Not Eligible', 0, 0, 0.00),
(2, 'Abel Kagua', 'abelkagua@gmail.com', '0713461290', '2026-06-17 16:08:26', 14, 12309876, 'Not Eligible', 0, 0, 0.00),
(5, 'Judy Wanjiru', 'Judy@gmail.com', '0796211087', '2026-06-23 04:56:41', 15, 4365789, 'Not Eligible', 0, 0, 0.00),
(6, 'Tabbie Mutheria', 'tabbie@gmail.com', '0703211913', '2026-06-23 08:22:23', 16, 9876543, 'Not Eligible', 0, 0, 0.00),
(7, 'David Gitau', 'david@gmail.com', '0743100933', '2026-06-23 13:49:27', 17, 819782100, 'Not Eligible', 0, 0, 0.00),
(8, 'Liam Doe', 'john@gmail.com', '0712345678', '2026-06-25 06:12:15', 18, 12568690, 'Not Eligible', 0, 0, 0.00),
(9, 'Lynne Kipkemboi', 'lynne@gmail.com', '0745577577', '2026-06-30 11:21:43', 19, 75777673, 'Not Eligible', 0, 0, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) DEFAULT 'Admin',
  `email` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `email`, `user_id`) VALUES
(1, 'admin', 'Admin@123', 'Admin', 'tynahwambui@zetech.ac.ke', NULL),
(2, 'John', 'John@124', 'Member', NULL, NULL),
(11, 'Jed', 'JED@4099', 'member', NULL, NULL),
(12, 'member ', 'rohan@9876', 'member', NULL, NULL),
(13, 'Abel', 'Abel@134', 'member', NULL, NULL),
(14, 'Abel Kagua', 'Abel@134', 'member', NULL, NULL),
(15, 'judy', 'judy@962', 'member', NULL, NULL),
(16, 'Tabbie', 'Tabbie@913', 'member', NULL, NULL),
(17, 'David', 'David@431', 'member', NULL, NULL),
(18, 'Liam', 'John@124', 'member', NULL, NULL),
(19, 'Lyne', 'Lyne@455', 'member', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `loan_applications`
--
ALTER TABLE `loan_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_payments`
--
ALTER TABLE `loan_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `national_id` (`national_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `loan_applications`
--
ALTER TABLE `loan_applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `loan_payments`
--
ALTER TABLE `loan_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
