-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2024 at 03:10 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database_account`
--

-- --------------------------------------------------------

--
-- Table structure for table `gaji_karyawan`
--

CREATE TABLE `gaji_karyawan` (
  `no` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `npwp` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `status_pegawai` enum('Active','Non Active') NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `bagian` varchar(100) NOT NULL,
  `jenis_pegawai` enum('Tetap','Kontrak') NOT NULL,
  `bank` varchar(50) NOT NULL,
  `no_rek` varchar(30) NOT NULL,
  `status` enum('TK/0','K/0') NOT NULL,
  `in_date` date NOT NULL,
  `out_date` date DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `gaji` decimal(15,2) NOT NULL,
  `lembur` decimal(15,2) NOT NULL,
  `lembur_per_jam` decimal(15,2) DEFAULT NULL,
  `tunjangan_1` decimal(15,2) NOT NULL,
  `tunjangan_2` decimal(15,2) NOT NULL,
  `natura` decimal(15,2) DEFAULT NULL,
  `bonus_japro_thr` decimal(15,2) DEFAULT NULL,
  `tunjangan_pph` decimal(15,2) DEFAULT NULL,
  `jkk_perusahaan` decimal(15,2) DEFAULT NULL,
  `jkm_perusahaan` decimal(15,2) DEFAULT NULL,
  `jht_perusahaan` decimal(15,2) DEFAULT NULL,
  `iuran_pensiun_perusahaan` decimal(15,2) DEFAULT NULL,
  `jpk_perusahaan` decimal(15,2) DEFAULT NULL,
  `tunjangan_zakat` decimal(15,2) DEFAULT NULL,
  `jht_karyawan` decimal(15,2) DEFAULT NULL,
  `iuran_pensiun_karyawan` decimal(15,2) DEFAULT NULL,
  `jpk_karyawan` decimal(15,2) DEFAULT NULL,
  `zakat_karyawan` decimal(15,2) DEFAULT NULL,
  `bruto` decimal(15,2) DEFAULT NULL,
  `gol` varchar(10) DEFAULT NULL,
  `ter` decimal(15,2) DEFAULT NULL,
  `pph_terhutang` decimal(15,2) DEFAULT NULL,
  `pph_pasal_21` decimal(15,2) DEFAULT NULL,
  `bpjs_ketenagakerjaan` decimal(15,2) DEFAULT NULL,
  `bpjs_kesehatan` decimal(15,2) DEFAULT NULL,
  `iuran_koperasi` decimal(15,2) DEFAULT NULL,
  `kasbon` decimal(15,2) DEFAULT NULL,
  `iuran_serikat` decimal(15,2) DEFAULT NULL,
  `hutang_bank` decimal(15,2) DEFAULT NULL,
  `hutang_pihak_ke3` decimal(15,2) DEFAULT NULL,
  `zakat` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gaji_karyawan`
--

INSERT INTO `gaji_karyawan` (`no`, `nik`, `npwp`, `nama`, `status_pegawai`, `jabatan`, `bagian`, `jenis_pegawai`, `bank`, `no_rek`, `status`, `in_date`, `out_date`, `keterangan`, `gaji`, `lembur`, `lembur_per_jam`, `tunjangan_1`, `tunjangan_2`, `natura`, `bonus_japro_thr`, `tunjangan_pph`, `jkk_perusahaan`, `jkm_perusahaan`, `jht_perusahaan`, `iuran_pensiun_perusahaan`, `jpk_perusahaan`, `tunjangan_zakat`, `jht_karyawan`, `iuran_pensiun_karyawan`, `jpk_karyawan`, `zakat_karyawan`, `bruto`, `gol`, `ter`, `pph_terhutang`, `pph_pasal_21`, `bpjs_ketenagakerjaan`, `bpjs_kesehatan`, `iuran_koperasi`, `kasbon`, `iuran_serikat`, `hutang_bank`, `hutang_pihak_ke3`, `zakat`) VALUES
(1, '364590009549', '786584049080248', 'Rasidi Maulana Thoriq', 'Active', 'Staff', 'IT Consultant', 'Tetap', 'BCA', '2000293201030', 'TK/0', '2023-03-01', '2024-12-29', NULL, '5.90', '0.00', NULL, '500.00', '350.00', '150.00', '430.00', '210.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `npwp` varchar(20) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `active` enum('Active','Non Active') DEFAULT 'Active',
  `jabatan` varchar(50) DEFAULT NULL,
  `bagian` varchar(50) DEFAULT NULL,
  `jenis_pegawai` enum('Tetap','Kontrak') DEFAULT 'Tetap',
  `bank` varchar(50) DEFAULT NULL,
  `no_rek` varchar(30) DEFAULT NULL,
  `status` enum('TK/0','K/0') DEFAULT 'TK/0',
  `in_date` date DEFAULT NULL,
  `out_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `npwp` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `active` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `bagian` varchar(255) NOT NULL,
  `jenispegawai` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `norek` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `masuk` varchar(255) NOT NULL,
  `keluar` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nik`, `npwp`, `nama`, `active`, `jabatan`, `bagian`, `jenispegawai`, `bank`, `norek`, `status`, `masuk`, `keluar`, `keterangan`) VALUES
(1, '1234567890', '12.345.678.9-012.345', 'Fahri Hariri', 'Active', ' Manager', 'Keuangan', ' Tetap', 'Bank BCA', '9876543210', 'TK/0', '03-04-2023', '26-12-2024', ''),
(13, '345353453453', '12.09.224.8920.293', 'Bagas Adhiwikrama', 'Active', 'Manager ', 'IT', 'Tetap', 'BCA', '120009203902', 'TK/0', '2024-12-23', '2024-12-25', ''),
(14, '1234567890', '3243535345', 'eko', 'Active', ' Manager', 'rtrtgdgdfgd', ' Tetap', 'dfgdfgfd', '35443535435', 'TK/2', '2020-11-12', '2026-12-11', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `role`) VALUES
(1, 'Noval', '$2y$10$h8o6dGPSFGto6sIMiLtdcekA6XcxrQ2M6IQaRVZO2sYvA4fAfniEK', '', 'Admin'),
(2, 'fahri', '$2y$10$Z99ppXo41ihyvQegAF9lnuBpsjjB.OnwjC0kma9nABYnBOAa/6rfq', '', 'User'),
(3, 'novalasidiqi57@gmail.com', '$2y$10$pqOMLx9HjI9nzmnsHIWMBeXPitlAoNfQMoCveNrXFH6W2QqTbdrH2', '', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gaji_karyawan`
--
ALTER TABLE `gaji_karyawan`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
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
-- AUTO_INCREMENT for table `gaji_karyawan`
--
ALTER TABLE `gaji_karyawan`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
