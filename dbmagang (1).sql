-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2020 at 05:44 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbmagang`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bagian`
--

CREATE TABLE `tbl_bagian` (
  `id_bagian` int(11) NOT NULL,
  `bagian_name` varchar(25) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_karyawan`
--

CREATE TABLE `tbl_karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `karyawan_name` varchar(25) NOT NULL,
  `birth_pl` varchar(20) NOT NULL,
  `birth_dt` date NOT NULL,
  `religion` varchar(20) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `address` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_karyawan`
--

INSERT INTO `tbl_karyawan` (`id_karyawan`, `id_user`, `karyawan_name`, `birth_pl`, `birth_dt`, `religion`, `gender`, `address`, `created_at`, `updated_at`) VALUES
(1, 1, 'karyawan  admin', 'bandar lampung', '2020-09-01', 'Islam', 'L', 'Bandar lampung', '2020-09-01 10:41:44', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_magang`
--

CREATE TABLE `tbl_magang` (
  `id_magang` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `id_mhs` int(11) NOT NULL,
  `id_bagian` int(11) NOT NULL,
  `nilai` varchar(3) NOT NULL,
  `status_magang` varchar(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mhs_magang`
--

CREATE TABLE `tbl_mhs_magang` (
  `id_mhs` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `mhs_name` varchar(50) NOT NULL,
  `birth_pl` varchar(20) NOT NULL,
  `birth_dt` date NOT NULL,
  `gender` varchar(1) NOT NULL,
  `religion` varchar(20) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `mhs_from` varchar(50) DEFAULT NULL,
  `cv` varchar(90) DEFAULT NULL,
  `status` enum('t','f','p') NOT NULL DEFAULT 'p',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id_user` int(11) NOT NULL,
  `display_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `role` varchar(1) NOT NULL,
  `active` varchar(1) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id_user`, `display_name`, `email`, `password`, `phone`, `photo`, `role`, `active`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin@magang.com', '$2y$10$kzFwNFnCaIFzm884k/E7guAsSuKQ2V1AnKv5raBYGRJiDxULJe3CW', '1111111111111', 'default.png', '1', 't', NULL, '2020-09-01 10:38:16', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `token` varchar(4) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_bagian`
--
ALTER TABLE `tbl_bagian`
  ADD PRIMARY KEY (`id_bagian`);

--
-- Indexes for table `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD KEY `userpegawai` (`id_user`);

--
-- Indexes for table `tbl_magang`
--
ALTER TABLE `tbl_magang`
  ADD PRIMARY KEY (`id_magang`),
  ADD KEY `mhs` (`id_mhs`),
  ADD KEY `bagian` (`id_bagian`),
  ADD KEY `karywan` (`id_karyawan`);

--
-- Indexes for table `tbl_mhs_magang`
--
ALTER TABLE `tbl_mhs_magang`
  ADD PRIMARY KEY (`id_mhs`),
  ADD KEY `mhsuser` (`id_user`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_bagian`
--
ALTER TABLE `tbl_bagian`
  MODIFY `id_bagian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_magang`
--
ALTER TABLE `tbl_magang`
  MODIFY `id_magang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_mhs_magang`
--
ALTER TABLE `tbl_mhs_magang`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_magang`
--
ALTER TABLE `tbl_magang`
  ADD CONSTRAINT `bagian` FOREIGN KEY (`id_bagian`) REFERENCES `tbl_bagian` (`id_bagian`),
  ADD CONSTRAINT `karywan` FOREIGN KEY (`id_karyawan`) REFERENCES `tbl_karyawan` (`id_karyawan`),
  ADD CONSTRAINT `mhs` FOREIGN KEY (`id_mhs`) REFERENCES `tbl_mhs_magang` (`id_mhs`);

--
-- Constraints for table `tbl_mhs_magang`
--
ALTER TABLE `tbl_mhs_magang`
  ADD CONSTRAINT `mhsuser` FOREIGN KEY (`id_user`) REFERENCES `tbl_users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
