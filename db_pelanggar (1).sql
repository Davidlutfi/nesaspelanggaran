-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2023 at 04:02 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pelanggar`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL,
  `NIG` char(8) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `NIG`, `nama_lengkap`, `password`) VALUES
(1, '12100148', 'DAVIDLUTFI', '0192023a7bbd73250516f069df18b500');

-- --------------------------------------------------------

--
-- Table structure for table `tb_data`
--

CREATE TABLE `tb_data` (
  `id_data` int(11) NOT NULL,
  `NIS_siswa` char(8) NOT NULL,
  `kesalahan` varchar(100) NOT NULL,
  `foto_kesalahan` varchar(255) DEFAULT current_timestamp(),
  `alasan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_data`
--

INSERT INTO `tb_data` (`id_data`, `NIS_siswa`, `kesalahan`, `foto_kesalahan`, `alasan`) VALUES
(2, '12100148', 'Berperilaku Buruk', 'bukti1679905657.jpg', 'tes'),
(9, '12100147', 'Potongan Rambut Laki-laki', 'bukti1680367248.png', 'tes'),
(15, '12345678', 'Kesiangan', 'bukti1680485368.png', 'wertyuio'),
(16, '12100147', 'NARKOBA dan NAVZA', 'bukti1681194558.png', 'tes');

-- --------------------------------------------------------

--
-- Table structure for table `tb_data_siswa`
--

CREATE TABLE `tb_data_siswa` (
  `NIS_siswa` char(8) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `kelas` varchar(4) NOT NULL,
  `jurusan` varchar(10) NOT NULL,
  `point` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_data_siswa`
--

INSERT INTO `tb_data_siswa` (`NIS_siswa`, `nama_lengkap`, `kelas`, `jurusan`, `point`) VALUES
('12100135', 'nama', '11', 'OTKP 1', '100'),
('12100140', 'jul', '11', 'RPL 1', '100'),
('12100145', 'nama', '11', 'BDP 3', '100'),
('12100147', 'DAVID LUTFI', '11', 'RPL 1', '100'),
('12100148', 'sandi', '11', 'KULINER', '70'),
('12100149', 'yanto', '11', 'TATABOGA', '100');

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `id` int(11) NOT NULL,
  `NIS` char(8) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `kelas` char(4) NOT NULL,
  `jurusan` varchar(10) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`id`, `NIS`, `nama_lengkap`, `kelas`, `jurusan`, `jabatan`, `password`) VALUES
(1, '12100147', 'DAVIDLUTFI', '11', 'RPL 1', 'OSIS', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tipe_kesalahan`
--

CREATE TABLE `tb_tipe_kesalahan` (
  `id` int(11) NOT NULL,
  `kesalahan` varchar(100) NOT NULL,
  `min_point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_tipe_kesalahan`
--

INSERT INTO `tb_tipe_kesalahan` (`id`, `kesalahan`, `min_point`) VALUES
(1, 'Kesiangan', 5),
(2, 'Tidak Bawa Al-Qur\'an', 5),
(3, 'Berperilaku Buruk', 25),
(4, 'Menyimpan dan Menyebarluaskan Konten yang tidak Mendidik', 25),
(5, 'NARKOBA dan NAVZA', 50),
(6, 'Perbuatan tidak Bermoral', 50),
(7, 'Ketentuan Model Seragam Sekolah', 5),
(8, 'Ketentuan Penggunaan Seragam Sekolah', 5),
(9, 'Atribut Sekolah', 5),
(10, 'Potongan Rambut Laki-laki', 5),
(11, 'Penggunaan Kerudung,Ciput,dan Rambut Perempuan', 5),
(12, 'Ketentuan Membawa atau Menggunakan Aksessoris ataupun Make Up', 5),
(13, 'ketentuan membawa barang elektronik maupun non elektronik yang tidak menunjang proses KBM', 10),
(14, 'Aturan Kendaraan Bermotor', 5),
(15, 'Ketentuan Penggunaan Sepatu', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_data`
--
ALTER TABLE `tb_data`
  ADD PRIMARY KEY (`id_data`);

--
-- Indexes for table `tb_data_siswa`
--
ALTER TABLE `tb_data_siswa`
  ADD PRIMARY KEY (`NIS_siswa`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_tipe_kesalahan`
--
ALTER TABLE `tb_tipe_kesalahan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_data`
--
ALTER TABLE `tb_data`
  MODIFY `id_data` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_tipe_kesalahan`
--
ALTER TABLE `tb_tipe_kesalahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
