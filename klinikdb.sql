-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2022 at 08:21 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klinikdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftar`
--

CREATE TABLE `daftar` (
  `iddaftar` int(5) NOT NULL,
  `no_rm` varchar(21) DEFAULT NULL,
  `tgl_daftar` date DEFAULT NULL,
  `dokterid` int(5) DEFAULT NULL,
  `total` int(20) DEFAULT NULL,
  `bayar` int(20) DEFAULT NULL,
  `kembalian` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar`
--

INSERT INTO `daftar` (`iddaftar`, `no_rm`, `tgl_daftar`, `dokterid`, `total`, `bayar`, `kembalian`) VALUES
(2, 'P000004', '2022-05-10', 1, 250000, 300000, 50000),
(3, 'P000002', '2022-05-12', 1, 700000, 800000, 100000),
(4, 'P000001', '2022-06-15', 1, 10000000, 10000000, 0),
(5, 'P000003', '2022-06-15', 2, 400000, 400000, 0),
(6, 'P000002', '2022-06-15', 2, 200000, 200000, 0),
(7, 'P000001', '2022-09-26', 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `iddokter` int(5) NOT NULL,
  `nama_dokter` varchar(100) DEFAULT NULL,
  `jenis_dokter` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`iddokter`, `nama_dokter`, `jenis_dokter`) VALUES
(1, 'Dr. Asep', 'Dokter Spesialis Gigi'),
(2, 'Drg. Ahmad', 'Dokter Umum');

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `idlayanan` int(5) NOT NULL,
  `nama_layanan` varchar(100) DEFAULT NULL,
  `harga` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`idlayanan`, `nama_layanan`, `harga`) VALUES
(1, 'Cabut Gigi', 50000),
(2, 'Tambal Gigi', 200000),
(11, 'Umum', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(10) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `user`, `pass`, `email`) VALUES
(1, 'admin', 'admin', 'adminadmin@gmail.com'),
(7, 'owner', 'owner', 'ownerowner@gmil.com');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(4) NOT NULL,
  `no_rm` varchar(21) NOT NULL,
  `no_kk` varchar(20) DEFAULT NULL,
  `nik` varchar(20) DEFAULT NULL,
  `nama` varchar(55) DEFAULT NULL,
  `tgl_lhr` date DEFAULT NULL,
  `jk` varchar(20) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `layanan` varchar(10) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `ket` varchar(55) DEFAULT NULL,
  `tdt` varchar(20) DEFAULT NULL,
  `pj` varchar(20) DEFAULT NULL,
  `dm` varchar(20) DEFAULT NULL,
  `hm` varchar(20) DEFAULT NULL,
  `ht` varchar(20) DEFAULT NULL,
  `pl` varchar(20) DEFAULT NULL,
  `ato` varchar(20) DEFAULT NULL,
  `atm` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `no_rm`, `no_kk`, `nik`, `nama`, `tgl_lhr`, `jk`, `alamat`, `layanan`, `no_hp`, `ket`, `tdt`, `pj`, `dm`, `hm`, `ht`, `pl`, `ato`, `atm`) VALUES
(8, 'P000001', '12345678', '1212121212', 'Test aja', '2022-09-27', 'Laki-Laki', 'Bandung', 'UMUM', '12121212', '2121', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `idtrans` int(5) NOT NULL,
  `daftarid` int(5) DEFAULT NULL,
  `layananid` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`idtrans`, `daftarid`, `layananid`) VALUES
(12, 2, 1),
(13, 2, 2),
(14, 3, 2),
(15, 3, 3),
(16, 4, 5),
(17, 5, 8),
(18, 5, 4),
(19, 3, 1),
(20, 6, 2),
(21, 2022, 11),
(22, 7, 11);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftar`
--
ALTER TABLE `daftar`
  ADD PRIMARY KEY (`iddaftar`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`iddokter`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`idlayanan`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`no_rm`),
  ADD KEY `id_pasien` (`id_pasien`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`idtrans`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daftar`
--
ALTER TABLE `daftar`
  MODIFY `iddaftar` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `iddokter` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `idlayanan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `idtrans` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
