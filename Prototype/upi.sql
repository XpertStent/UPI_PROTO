-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2023 at 07:04 PM
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
-- Database: `upi`
--

-- --------------------------------------------------------

--
-- Table structure for table `linked_bank_accounts`
--

CREATE TABLE `linked_bank_accounts` (
  `link_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `bank_name` varchar(255) NOT NULL,
  `account_number` varchar(20) NOT NULL,
  `BSB_code` varchar(15) NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT 0,
  `account_holder_name` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `linked_bank_accounts`
--

INSERT INTO `linked_bank_accounts` (`link_id`, `user_id`, `bank_name`, `account_number`, `BSB_code`, `is_default`, `account_holder_name`) VALUES
(1, 1, 'Bank of UPI', '123456789012', '4456', 1, 'John Doe'),
(3, 1, 'UPI Savings Bank', '987654321098', '3345', 0, 'John Doe');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL,
  `sender_UPI_ID` varchar(255) NOT NULL,
  `receiver_UPI_ID` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `transaction_timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('Pending','Completed','Failed') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `sender_UPI_ID`, `receiver_UPI_ID`, `amount`, `transaction_timestamp`, `status`) VALUES
(1, 'johndoe@upi', 'janesmith@upi', 500.00, '2023-10-20 03:50:32', 'Pending'),
(2, 'janesmith@upi', 'johndoe@upi', 750.00, '2023-10-20 03:50:32', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `mobile_number` int(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `UPI_ID` varchar(255) NOT NULL,
  `amount_due` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password_hash`, `mobile_number`, `email`, `UPI_ID`, `amount_due`) VALUES
(1, 'John Doe', '$2y$10$W8bXLQ2mmwtSGqLbnU3wduIe6KXZPi15Sfl94nUpkZqe5AxKF85xW', 1234567890, 'johndoe@email.com', 'johndoe@upi', 17958);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `linked_bank_accounts`
--
ALTER TABLE `linked_bank_accounts`
  ADD PRIMARY KEY (`link_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `UPI_ID` (`UPI_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `linked_bank_accounts`
--
ALTER TABLE `linked_bank_accounts`
  MODIFY `link_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `linked_bank_accounts`
--
ALTER TABLE `linked_bank_accounts`
  ADD CONSTRAINT `linked_bank_accounts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
