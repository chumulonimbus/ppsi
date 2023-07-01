-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2023 at 09:47 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kantor`
--

-- --------------------------------------------------------

--
-- Table structure for table `cuti`
--

CREATE TABLE `cuti` (
  `id_cuti` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `start_cuti` date NOT NULL,
  `end_cuti` date NOT NULL,
  `keperluan` varchar(255) DEFAULT NULL,
  `status_pekerjaan` varchar(255) DEFAULT NULL,
  `handover` varchar(255) DEFAULT NULL,
  `sisa_cuti` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gaji`
--

CREATE TABLE `gaji` (
  `id_gaji` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `gaji_pokok` int(11) NOT NULL,
  `punishment` int(11) DEFAULT NULL,
  `reward` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `result` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `nip` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `status_kerja` varchar(30) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `tanggungan` varchar(255) DEFAULT NULL,
  `no_telp` varchar(30) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`nip`, `nama`, `username`, `email`, `password`, `alamat`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `status_kerja`, `status`, `tanggungan`, `no_telp`, `role`) VALUES
(1, 'herdha nur', 'herdha', 'herdha@gmail.com', 'herdha123', 'jogja', 'laki-laki', 'sleman', '2023-06-04', 'aktif', 'kontrak', '0', '081150021000', 'karyawan'),
(2, 'administrator', 'admin', 'admin@gmail.com', 'admin123', 'jogja', 'laki-laki', 'jogja', '2023-06-30', 'kontrak', 'menikah', '0', '08123456789', 'admin'),
(3, 'herdha 2', 'herdha2', 'herdha2@gmail.com', 'herdha123', 'jogja', 'laki-laki', 'jogja', '2023-06-30', '', 'kontrak', '0', '08123456789', 'karyawan');

-- --------------------------------------------------------

--
-- Table structure for table `laporanpresensi`
--

CREATE TABLE `laporanpresensi` (
  `idreport` int(11) NOT NULL,
  `nama_laporan` varchar(255) NOT NULL,
  `tanggalMulai` date NOT NULL,
  `tanggalAkhir` date NOT NULL,
  `total_masuk` int(11) NOT NULL,
  `total_ijin` int(11) NOT NULL,
  `total_sakit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporanpresensi`
--

INSERT INTO `laporanpresensi` (`idreport`, `nama_laporan`, `tanggalMulai`, `tanggalAkhir`, `total_masuk`, `total_ijin`, `total_sakit`) VALUES
(11, 'test', '2023-06-30', '2023-06-30', 1, 1, 0),
(12, 'test', '2023-06-30', '2023-07-01', 3, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `performance` int(11) DEFAULT NULL,
  `potential` int(11) DEFAULT NULL,
  `attitude` int(11) DEFAULT NULL,
  `rerata` int(11) DEFAULT NULL,
  `result` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `presensi`
--

CREATE TABLE `presensi` (
  `id_presensi` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `path_foto` varchar(255) DEFAULT NULL,
  `status_presensi` varchar(11) NOT NULL,
  `keteranganIjin` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `presensi`
--

INSERT INTO `presensi` (`id_presensi`, `nip`, `tanggal`, `path_foto`, `status_presensi`, `keteranganIjin`) VALUES
(30, 1, '2023-06-30', '', 'Hadir', ''),
(31, 3, '2023-06-30', '', 'Ijin', 'keperluan mendadak'),
(32, 1, '2023-07-01', '', 'Hadir', ''),
(33, 3, '2023-07-01', '', 'Hadir', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`id_cuti`),
  ADD KEY `FK_presensi` (`nip`);

--
-- Indexes for table `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id_gaji`),
  ADD KEY `FK_gaji` (`nip`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `laporanpresensi`
--
ALTER TABLE `laporanpresensi`
  ADD PRIMARY KEY (`idreport`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`),
  ADD KEY `FK_nilai` (`nip`);

--
-- Indexes for table `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id_presensi`),
  ADD KEY `FK_presensi` (`nip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cuti`
--
ALTER TABLE `cuti`
  MODIFY `id_cuti` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gaji`
--
ALTER TABLE `gaji`
  MODIFY `id_gaji` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `nip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `laporanpresensi`
--
ALTER TABLE `laporanpresensi`
  MODIFY `idreport` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id_presensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cuti`
--
ALTER TABLE `cuti`
  ADD CONSTRAINT `FK_cuti` FOREIGN KEY (`nip`) REFERENCES `karyawan` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gaji`
--
ALTER TABLE `gaji`
  ADD CONSTRAINT `FK_gaji` FOREIGN KEY (`nip`) REFERENCES `karyawan` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `FK_nilai` FOREIGN KEY (`nip`) REFERENCES `karyawan` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `presensi`
--
ALTER TABLE `presensi`
  ADD CONSTRAINT `FK_presensi` FOREIGN KEY (`nip`) REFERENCES `karyawan` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
