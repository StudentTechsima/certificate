-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2025 at 12:29 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `game_certificate`
--

-- --------------------------------------------------------

--
-- Table structure for table `certificate`
--

CREATE TABLE `certificate` (
  `id` int(50) NOT NULL,
  `certificate_number` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `father_name` varchar(100) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL,
  `games` text NOT NULL,
  `position` varchar(100) NOT NULL,
  `age` varchar(100) NOT NULL,
  `aadhaar` varchar(100) NOT NULL,
  `participate` varchar(200) NOT NULL,
  `profile_image` text NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `certificate`
--

INSERT INTO `certificate` (`id`, `certificate_number`, `name`, `father_name`, `dob`, `level`, `games`, `position`, `age`, `aadhaar`, `participate`, `profile_image`, `status`, `created_at`) VALUES
(14, '237', 'Dai Lane', 'Althea Larson', '1973-07-01', 'State Level', 'In omnis iusto deser', 'Silver', 'Porro sit autem omni', 'Mollitia porro sit ', 'Est ullamco quia ut ', 'img-2810-MSM1-P0-1.jpg', 'approved', '2025-02-07 11:23:40'),
(15, '237', 'Dai Lane', 'Althea Larson', '1973-07-01', 'State Level', 'In omnis iusto deser', 'Silver', 'Porro sit autem omni', 'Mollitia porro sit ', 'Est ullamco quia ut ', 'img-2810-MSM1-P0-1.jpg', 'pending', '2025-02-07 10:36:29'),
(16, '460', 'Rashad Colon', 'Evangeline Pickett', '1992-05-12', 'National Lavel', 'Omnis ea rerum excep', 'Silver', 'Nemo magna mollitia ', 'Dolorem et Nam aute ', 'Nihil officia porro ', 'img-2810-MSM1-P0-1.jpg', 'pending', '2025-02-07 10:36:55'),
(17, '460', 'Rashad Colon', 'Evangeline Pickett', '1992-05-12', 'National Lavel', 'Omnis ea rerum excep', 'Silver', 'Nemo magna mollitia ', 'Dolorem et Nam aute ', 'Nihil officia porro ', 'img-2810-MSM1-P0-1.jpg', 'pending', '2025-02-07 10:52:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `role`, `created_at`) VALUES
(1, 'admin', 'admin@gmail.com', '8902312', '12345', 'admin', '2025-02-02 12:07:01'),
(3, 'Idona Ingram', 'hygojosa@mailinator.com', '+1 (363) 406-8812', 'Pa$$w0rd!', 'user', '2025-02-07 11:25:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `certificate`
--
ALTER TABLE `certificate`
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
-- AUTO_INCREMENT for table `certificate`
--
ALTER TABLE `certificate`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
