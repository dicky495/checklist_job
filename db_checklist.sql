-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2021 at 02:50 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_checklist`
--

-- --------------------------------------------------------

--
-- Table structure for table `dicky`
--

CREATE TABLE `dicky` (
  `id_task` int(10) NOT NULL,
  `name_task` varchar(50) DEFAULT NULL,
  `status_task` varchar(50) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `bulan` varchar(2) DEFAULT NULL,
  `date_task` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dicky`
--

INSERT INTO `dicky` (`id_task`, `name_task`, `status_task`, `tahun`, `bulan`, `date_task`) VALUES
(13, 'Membuat Daftar Biaya Insentif Pembaca Meter', 'Pending', '2021', '11', '2021-11-01'),
(15, 'Mengumpulkan foto dan stand meter Hankam', 'Pending', '2021', '11', '2021-11-01'),
(16, 'Merubah foto Hankam sesuai file program', 'Pending', '2021', '11', '2021-11-01'),
(17, 'Verifikasi foto dan stand meter Hankam', 'Pending', '2021', '11', '2021-11-01'),
(18, 'Pencetakan Rekap DRD Air', 'Pending', '2021', '11', '2021-11-01'),
(19, 'Pencetakan DRD Air (Arsip rekening)', 'Pending', '2021', '11', '2021-11-01'),
(20, 'Melakukan Penjilidan DRD Air', 'Pending', '2021', '11', '2021-11-01'),
(21, 'Pencetakan Ikhtisar Rekening Air', 'Pending', '2021', '11', '2021-11-01'),
(22, 'Pencetakan Lap. Pola Konsumsi Air', 'Pending', '2021', '11', '2021-11-01'),
(23, 'Pencetakan Lap. Sambungan baru/Non Air', 'Pending', '2021', '11', '2021-11-01'),
(24, 'Pencatatan Laporan DRD Air Di Banner', 'Pending', '2021', '11', '2021-11-01'),
(25, 'Pengarsipan Lap. Bulanan, JU, Insentif PM dan Sura', 'Pending', '2021', '11', '2021-11-01'),
(26, 'Verifikasi foto dan stand Water Meter', 'Pending', '2021', '11', '2021-11-01'),
(27, 'Mengisi Laporan DRD Air Konsolidasi', 'Pending', '2021', '11', '2021-11-01'),
(28, 'Membuat Lap. Perkembangan Pendapatan Perbulan ', 'Pending', '2021', '11', '2021-11-01'),
(29, 'Pencetakan Analisa Pembacaan Meter', 'Pending', '2021', '11', '2021-11-01'),
(30, 'Membuat Daftar Rekening JU', 'Pending', '2021', '11', '2021-11-01'),
(31, 'Melakukan Cek Ulang hasil analisa pembaca meter', 'Pending', '2021', '11', '2021-11-01'),
(32, 'Mencetak Daftar Pemakaian Nol Kecuali UPK Bondowos', 'Pending', '2021', '11', '2021-11-01'),
(33, 'Membuat Raport Pembaca Meter', 'Pending', '2021', '11', '2021-11-01'),
(34, 'Memasukkan Daftar Rekening Karyawan', 'Pending', '2021', '11', '2021-11-01'),
(35, 'Memasukkan Daftar rek. khusus UPK Tlogosari ', 'Pending', '2021', '11', '2021-11-01'),
(36, 'Memasukkan Pemakaian Nol dan dicek ulang', 'Pending', '2021', '11', '2021-11-01'),
(37, 'Penghitungan ulang DSML setelah tanggal 26', 'Pending', '2021', '11', '2021-11-01'),
(38, 'Melakukan Penghitungan DRD', 'Pending', '2021', '11', '2021-11-01'),
(39, 'Melakukan Pemberian No rekening', 'Pending', '2021', '11', '2021-11-01'),
(40, 'Merubah Bulan Pembacaan di Bagian IT', 'Pending', '2021', '11', '2021-11-01'),
(41, 'Membagikan Pemakaian Nol ke UPK', 'Pending', '2021', '11', '2021-11-01'),
(42, 'Membagikan Rekap DRD Air ke UPK', 'Pending', '2021', '11', '2021-11-01'),
(43, 'Melakukan Posting Piutang', 'Pending', '2021', '11', '2021-11-01'),
(44, 'Membuat Daftar Insentif Pembaca Meter', 'Selesai', '2021', '10', '2021-10-29'),
(45, 'Mengumpulkan foto dan stand meter Hankam', 'Selesai', '2021', '10', '2021-10-29');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `bagian` varchar(50) NOT NULL,
  `sub_bagian` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `bagian`, `sub_bagian`, `jabatan`) VALUES
(10, 'DICKY ERFAN SEPTIONO', '$2y$10$1yaHupGvNCO3W0IbA51VF.f4mnjUS9GsirAT2NMAuhuN/fsSzJn2K', 'KEUANGAN', 'REKENING', 'KASUBAG'),
(12, 'YULIA', '$2y$10$hmph6Eue49y1.I.gotRlnOSK9WZ1IqcIgD89Tbtx3hx0v1P8S7YIS', 'KEUANGAN', 'KAS', 'KASUBAG');

-- --------------------------------------------------------

--
-- Table structure for table `yulia`
--

CREATE TABLE `yulia` (
  `id_task` int(10) NOT NULL,
  `name_task` varchar(50) DEFAULT NULL,
  `status_task` varchar(50) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `bulan` varchar(2) DEFAULT NULL,
  `date_task` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `yulia`
--

INSERT INTO `yulia` (`id_task`, `name_task`, `status_task`, `tahun`, `bulan`, `date_task`) VALUES
(1, 'Mencetak LHK', 'Selesai', '2021', '11', '2021-11-01'),
(2, 'Merekap Pengeluaran', 'Pending', '2021', '10', '2021-11-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dicky`
--
ALTER TABLE `dicky`
  ADD PRIMARY KEY (`id_task`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `yulia`
--
ALTER TABLE `yulia`
  ADD PRIMARY KEY (`id_task`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dicky`
--
ALTER TABLE `dicky`
  MODIFY `id_task` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `yulia`
--
ALTER TABLE `yulia`
  MODIFY `id_task` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
