-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2022 at 01:30 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kkp`
--

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `id_file` int(11) NOT NULL,
  `username` varchar(15) DEFAULT NULL,
  `file_name_source` varchar(255) DEFAULT NULL,
  `file_name_finish` varchar(255) DEFAULT NULL,
  `file_url` varchar(255) DEFAULT NULL,
  `file_size` float DEFAULT NULL,
  `password` varchar(16) DEFAULT NULL,
  `tgl_upload` timestamp NULL DEFAULT NULL,
  `status` enum('1','2') DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`id_file`, `username`, `file_name_source`, `file_name_finish`, `file_url`, `file_size`, `password`, `tgl_upload`, `status`, `keterangan`) VALUES
(74, 'admin', '76182-test_doc.docx', '92858-test_doc.rda', 'hasil_ekripsi/92858-test_doc.rda', 11.1807, 'c37367516316e76b', '2021-06-03 12:40:01', '2', 'jfgn'),
(75, 'admin', '63476-test_ppt.pptx', '11896-test_ppt.rda', 'hasil_ekripsi/11896-test_ppt.rda', 30.1504, 'ac43724f16e9241d', '2021-06-03 12:40:30', '2', 'kbiub'),
(76, 'admin', '57990-test_txt.txt', '14151-test_txt.rda', 'hasil_ekripsi/14151-test_txt.rda', 0.0214844, 'ac43724f16e9241d', '2021-06-03 12:40:49', '2', 'kjvbn'),
(73, 'admin', '64209-test.txt', '25092-test.rda', 'hasil_ekripsi/25092-test.rda', 0.0332031, 'ac43724f16e9241d', '2021-05-31 09:45:42', '2', 'adaddec'),
(69, 'admin', '23388-new-text.txt', '44848-new-text.rda', 'hasil_ekripsi/44848-new-text.rda', 0.297852, 'acc43aa81fbb23ee', '2021-05-29 02:23:12', '2', 'rahasia kita'),
(66, 'admin', '5873-coba.txt', '61932-coba.rda', 'hasil_ekripsi/61932-coba.rda', 0.00292969, '3c6e0b8a9c15224a', '2021-05-23 07:57:05', '2', 'asakldblkdc'),
(67, 'admin', '30040-soal-kuis.txt', '31600-soal-kuis.rda', 'hasil_ekripsi/31600-soal-kuis.rda', 0.275391, '3c6e0b8a9c15224a', '2021-05-23 08:22:29', '2', 'key'),
(68, 'admin', '2598-kripto.txt', '41327-kripto.rda', 'hasil_ekripsi/41327-kripto.rda', 1.03809, 'f8725ca01dfad950', '2021-05-23 08:40:13', '1', 'agus705');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(15) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `job_title` varchar(50) DEFAULT NULL,
  `join_date` timestamp NULL DEFAULT NULL,
  `last_activity` timestamp NULL DEFAULT NULL,
  `status` enum('1','2') DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `fullname`, `job_title`, `join_date`, `last_activity`, `status`) VALUES
('admin', 'c4ca4238a0b923820dcc509a6f75849b', 'Admin', 'admin', '2021-04-17 04:50:07', '2022-11-19 12:22:57', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id_file`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
