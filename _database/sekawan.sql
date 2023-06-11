-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2023 at 10:34 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekawan`
--

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `id_driver` int(11) NOT NULL,
  `nama_driver` varchar(100) NOT NULL,
  `no_telp` varchar(100) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`id_driver`, `nama_driver`, `no_telp`, `alamat`) VALUES
(1, 'achmad rifaldi ', '0895367331237', 'jl. pelabuhan ketapang 1'),
(5, 'Fuandono', '8987', 'jl. Pelabuhan Ketapang 1');

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id_kendaraan` int(11) NOT NULL,
  `nama_kendaraan` varchar(100) NOT NULL,
  `jml_roda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`id_kendaraan`, `nama_kendaraan`, `jml_roda`) VALUES
(1, 'mobil', 4),
(8, 'Truk ', 4);

-- --------------------------------------------------------

--
-- Table structure for table `psn_kendaraan`
--

CREATE TABLE `psn_kendaraan` (
  `id_psn_kendaraan` int(11) NOT NULL,
  `id_kendaraan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_driver` int(50) NOT NULL,
  `nama_pesanan` varchar(100) NOT NULL,
  `waktu_pesan` datetime NOT NULL,
  `status` longtext NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `psn_kendaraan`
--

INSERT INTO `psn_kendaraan` (`id_psn_kendaraan`, `id_kendaraan`, `id_user`, `id_driver`, `nama_pesanan`, `waktu_pesan`, `status`, `keterangan`) VALUES
(1, 8, 2, 5, 'pesanan hari ini kk', '2023-06-10 14:21:18', '{\"status\":\"1\", \"tolak\":false, \"waktu\":\"2023-06-11 19:26:40\"}', 'masuk'),
(2, 1, 2, 1, 'kduea', '2023-06-10 14:24:00', '{\"status\":\"2\", \"tolak\":true, \"waktu\":\"2023-06-11 12:03:50\"}', 'aman'),
(3, 1, 2, 1, 'pppo', '2023-06-11 07:15:24', '{\"status\":\"3\", \"tolak\":false, \"waktu\":\"2023-06-11 07:15:24\"}', ''),
(4, 1, 2, 1, 'ppppsas', '2023-06-11 15:29:57', '{\"status\":\"2\", \"tolak\":true, \"waktu\":\"2023-06-11 15:32:40\"}', ''),
(5, 8, 2, 1, 'pppsss', '2023-06-11 15:30:22', '{\"status\":\"3\", \"tolak\":false, \"waktu\":\"2023-06-11 15:33:06\"}', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'aldiskw', 'sekawan', 1),
(2, 'asesor', 'sabilah', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`id_driver`);

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id_kendaraan`);

--
-- Indexes for table `psn_kendaraan`
--
ALTER TABLE `psn_kendaraan`
  ADD PRIMARY KEY (`id_psn_kendaraan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `id_driver` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id_kendaraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `psn_kendaraan`
--
ALTER TABLE `psn_kendaraan`
  MODIFY `id_psn_kendaraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
