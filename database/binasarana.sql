-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2020 at 07:45 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `binasarana`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `nama_lengkap` varchar(200) DEFAULT NULL,
  `no_hp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `user_id`, `nama_lengkap`, `no_hp`) VALUES
(1, 1, 'Nyoman Idelia Suwati', '081291519384');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `jadwal_id` int(11) NOT NULL,
  `program_id` int(11) DEFAULT NULL,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu') DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`jadwal_id`, `program_id`, `hari`, `tanggal`) VALUES
(21, 1, 'Rabu', '2020-02-05'),
(22, 1, 'Kamis', '2020-02-06'),
(23, 1, 'Rabu', '2020-02-12'),
(24, 1, 'Kamis', '2020-02-13'),
(25, 1, 'Rabu', '2020-02-19'),
(26, 1, 'Kamis', '2020-02-20'),
(27, 1, 'Rabu', '2020-02-26'),
(28, 1, 'Kamis', '2020-02-27'),
(29, 1, 'Rabu', '2020-03-04'),
(30, 1, 'Kamis', '2020-03-05'),
(31, 1, 'Rabu', '2020-03-11'),
(32, 1, 'Kamis', '2020-03-12'),
(33, 1, 'Rabu', '2020-03-18'),
(34, 1, 'Kamis', '2020-03-19'),
(35, 1, 'Rabu', '2020-03-25'),
(36, 1, 'Kamis', '2020-03-26'),
(37, 1, 'Rabu', '2020-04-01'),
(38, 1, 'Kamis', '2020-04-02'),
(39, 1, 'Rabu', '2020-04-08'),
(40, 1, 'Kamis', '2020-04-09'),
(41, 2, 'Sabtu', '2020-02-08'),
(42, 2, 'Minggu', '2020-02-09'),
(43, 2, 'Sabtu', '2020-02-15'),
(44, 2, 'Minggu', '2020-02-16'),
(45, 2, 'Sabtu', '2020-02-22'),
(46, 2, 'Minggu', '2020-02-23'),
(47, 2, 'Sabtu', '2020-02-29'),
(48, 2, 'Minggu', '2020-03-01'),
(49, 2, 'Sabtu', '2020-03-07'),
(50, 2, 'Minggu', '2020-03-08'),
(51, 2, 'Sabtu', '2020-03-14'),
(52, 2, 'Minggu', '2020-03-15'),
(53, 2, 'Sabtu', '2020-03-21'),
(54, 2, 'Minggu', '2020-03-22'),
(55, 2, 'Sabtu', '2020-03-28'),
(56, 2, 'Minggu', '2020-03-29'),
(57, 2, 'Sabtu', '2020-04-04'),
(58, 2, 'Minggu', '2020-04-05'),
(59, 2, 'Sabtu', '2020-04-11'),
(60, 2, 'Minggu', '2020-04-12'),
(61, 2, 'Sabtu', '2020-04-18'),
(62, 2, 'Minggu', '2020-04-19'),
(63, 2, 'Sabtu', '2020-04-25'),
(64, 2, 'Minggu', '2020-04-26'),
(65, 2, 'Sabtu', '2020-05-02'),
(66, 2, 'Minggu', '2020-05-03'),
(67, 2, 'Sabtu', '2020-05-09'),
(68, 2, 'Minggu', '2020-05-10'),
(69, 2, 'Sabtu', '2020-05-16'),
(70, 2, 'Minggu', '2020-05-17'),
(71, 2, 'Sabtu', '2020-05-23'),
(72, 2, 'Minggu', '2020-05-24'),
(73, 2, 'Sabtu', '2020-05-30'),
(74, 2, 'Minggu', '2020-05-31'),
(75, 2, 'Sabtu', '2020-06-06'),
(76, 2, 'Minggu', '2020-06-07'),
(77, 2, 'Sabtu', '2020-06-13'),
(78, 2, 'Minggu', '2020-06-14'),
(79, 2, 'Sabtu', '2020-06-20'),
(80, 2, 'Minggu', '2020-06-21'),
(81, 3, 'Jumat', '2020-04-10'),
(82, 3, 'Sabtu', '2020-04-11'),
(83, 3, 'Jumat', '2020-04-17'),
(84, 3, 'Sabtu', '2020-04-18'),
(85, 3, 'Jumat', '2020-04-24'),
(86, 3, 'Sabtu', '2020-04-25'),
(87, 3, 'Jumat', '2020-05-01'),
(88, 3, 'Sabtu', '2020-05-02'),
(89, 3, 'Jumat', '2020-05-08'),
(90, 3, 'Sabtu', '2020-05-09'),
(91, 3, 'Jumat', '2020-05-15'),
(92, 3, 'Sabtu', '2020-05-16'),
(93, 3, 'Jumat', '2020-05-22'),
(94, 3, 'Sabtu', '2020-05-23'),
(95, 3, 'Jumat', '2020-05-29'),
(96, 3, 'Sabtu', '2020-05-30'),
(97, 3, 'Jumat', '2020-06-05'),
(98, 3, 'Sabtu', '2020-06-06'),
(99, 3, 'Jumat', '2020-06-12'),
(100, 3, 'Sabtu', '2020-06-13'),
(241, 4, 'Senin', '2020-06-22'),
(242, 4, 'Selasa', '2020-06-23'),
(243, 4, 'Senin', '2020-06-29'),
(244, 4, 'Selasa', '2020-06-30'),
(245, 4, 'Senin', '2020-07-06'),
(246, 4, 'Selasa', '2020-07-07'),
(247, 4, 'Senin', '2020-07-13'),
(248, 4, 'Selasa', '2020-07-14'),
(249, 4, 'Senin', '2020-07-20'),
(250, 4, 'Selasa', '2020-07-21'),
(251, 4, 'Senin', '2020-07-27'),
(252, 4, 'Selasa', '2020-07-28'),
(253, 4, 'Senin', '2020-08-03'),
(254, 4, 'Selasa', '2020-08-04'),
(255, 4, 'Senin', '2020-08-10'),
(256, 4, 'Selasa', '2020-08-11'),
(257, 4, 'Senin', '2020-08-17'),
(258, 4, 'Selasa', '2020-08-18'),
(259, 4, 'Senin', '2020-08-24'),
(260, 4, 'Selasa', '2020-08-25'),
(261, 4, 'Senin', '2020-08-31'),
(262, 4, 'Selasa', '2020-09-01'),
(263, 4, 'Senin', '2020-09-07'),
(264, 4, 'Selasa', '2020-09-08'),
(265, 4, 'Senin', '2020-09-14'),
(266, 4, 'Selasa', '2020-09-15'),
(267, 4, 'Senin', '2020-09-21'),
(268, 4, 'Selasa', '2020-09-22'),
(269, 4, 'Senin', '2020-09-28'),
(270, 4, 'Selasa', '2020-09-29'),
(271, 4, 'Senin', '2020-10-05'),
(272, 4, 'Selasa', '2020-10-06'),
(273, 4, 'Senin', '2020-10-12'),
(274, 4, 'Selasa', '2020-10-13'),
(275, 4, 'Senin', '2020-10-19'),
(276, 4, 'Selasa', '2020-10-20'),
(277, 4, 'Senin', '2020-10-26'),
(278, 4, 'Selasa', '2020-10-27'),
(279, 4, 'Senin', '2020-11-02'),
(280, 4, 'Selasa', '2020-11-03');

-- --------------------------------------------------------

--
-- Table structure for table `pelatih`
--

CREATE TABLE `pelatih` (
  `pelatih_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `nama_pelatih` varchar(200) DEFAULT NULL,
  `jk` enum('L','P') DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelatih`
--

INSERT INTO `pelatih` (`pelatih_id`, `user_id`, `nama_pelatih`, `jk`, `email`, `no_hp`) VALUES
(2, 23, 'Alfian Prayoga', 'L', 'alfian_yoga75@gmail.com', '089635707772'),
(3, 36, 'Muhammad Toni', 'L', 'toni_m@gmail.com', '083877903216'),
(4, 37, 'Muhammad Firdaus', 'L', 'daus.muhammad413@gmail.com', '083867701266');

-- --------------------------------------------------------

--
-- Table structure for table `pelatihan`
--

CREATE TABLE `pelatihan` (
  `pelatihan_id` int(11) NOT NULL,
  `program_id` int(11) DEFAULT NULL,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu') DEFAULT NULL,
  `pelatih_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelatihan`
--

INSERT INTO `pelatihan` (`pelatihan_id`, `program_id`, `hari`, `pelatih_id`) VALUES
(4, 1, 'Rabu', 3),
(5, 1, 'Kamis', 2),
(6, 2, 'Sabtu', 2),
(7, 2, 'Minggu', 4),
(8, 3, 'Jumat', 4),
(9, 3, 'Sabtu', 3),
(16, 4, 'Senin', 2),
(17, 4, 'Selasa', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `pendaftaran_id` varchar(15) NOT NULL,
  `peserta_id` int(11) DEFAULT NULL,
  `program_id` int(11) DEFAULT NULL,
  `pesan` text,
  `pembayaran` enum('Tunai','Transfer') DEFAULT NULL,
  `status` enum('Aktif','Non-aktif') DEFAULT NULL,
  `tgl_daftar` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`pendaftaran_id`, `peserta_id`, `program_id`, `pesan`, `pembayaran`, `status`, `tgl_daftar`) VALUES
('BSM2019001', 11, 1, '-', 'Tunai', 'Aktif', '2019-12-27 13:36:13'),
('BSM2019002', 12, 1, '-', 'Tunai', 'Aktif', '2019-12-27 13:57:03'),
('BSM2019003', 13, 1, '-', 'Tunai', 'Aktif', '2019-12-27 13:58:20'),
('BSM2019004', 14, 1, '-', 'Tunai', 'Aktif', '2019-12-27 13:59:02'),
('BSM2019005', 15, 1, '-', 'Tunai', 'Aktif', '2019-12-27 13:59:51'),
('BSM2019006', 16, 2, '-', 'Transfer', 'Aktif', '2019-12-27 14:03:39'),
('BSM2019007', 17, 2, '-', 'Transfer', 'Aktif', '2019-12-27 14:04:32'),
('BSM2019008', 18, 2, '-', 'Tunai', 'Aktif', '2019-12-27 14:05:50'),
('BSM2019009', 19, 2, '-', 'Tunai', 'Aktif', '2019-12-27 14:06:36'),
('BSM2019010', 20, 2, '-', 'Transfer', 'Aktif', '2019-12-27 14:08:35'),
('BSM2019011', 22, 3, '-', 'Tunai', 'Aktif', '2019-12-28 05:46:10'),
('BSM2019012', 30, 4, '-', 'Transfer', 'Aktif', '2019-12-29 09:58:58');

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `peserta_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `nama_peserta` varchar(200) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `jk` enum('L','P') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`peserta_id`, `user_id`, `nama_peserta`, `email`, `no_hp`, `jk`) VALUES
(11, 26, 'Farabi Zidane', 'farabiz@gmail.com', '08936555081', 'L'),
(12, 27, 'Angga Sidqi', 'angga_sidqi@gmail.com', '085877908900', 'L'),
(13, 28, 'Peserta 3', 'peserta3@gmail.com', '089997765430', 'P'),
(14, 29, 'Peserta 4', 'peserta4@gmail.com', '082166908876', 'L'),
(15, 30, 'Peserta 5', 'peserta5@gmail.com', '085278443121', 'P'),
(16, 31, 'Peserta 6', 'peserta6@gmail.com', '087785455632', 'L'),
(17, 32, 'Peserta 7', 'peserta7@gmail.com', '089777058997', 'L'),
(18, 33, 'Peserta 8', 'peserta8@gmail.com', '085693747590', 'P'),
(19, 34, 'Peserta 9', 'peserta9@gmail.com', '083888786902', 'L'),
(20, 35, 'Peserta 10', 'peserta10@gmail.com', '083836335760', 'L'),
(22, 39, 'Hilda Farisa', 'hildafarisa@gmail.com', '083879989401', 'P'),
(30, 48, 'Peserta 11', 'peserta11@gmail.com', '083847563013', 'P'),
(31, 48, 'Peserta 11', 'peserta11@gmail.com', '087658778909', 'P');

-- --------------------------------------------------------

--
-- Table structure for table `program_kursus`
--

CREATE TABLE `program_kursus` (
  `program_id` int(11) NOT NULL,
  `nama_program` varchar(200) DEFAULT NULL,
  `hari` set('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu') DEFAULT NULL,
  `jam_mulai` time NOT NULL,
  `jam_akhir` time NOT NULL,
  `ruangan` varchar(25) NOT NULL,
  `kapasitas` int(11) DEFAULT NULL,
  `jml_pertemuan` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `tgl_mulai` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program_kursus`
--

INSERT INTO `program_kursus` (`program_id`, `nama_program`, `hari`, `jam_mulai`, `jam_akhir`, `ruangan`, `kapasitas`, `jml_pertemuan`, `harga`, `tgl_mulai`) VALUES
(1, 'Komputer Administrasi (Ms. Word, Ms. Excel, Ms. PowerPoint) - Gelombang 1', 'Rabu,Kamis', '01:00:00', '02:30:00', 'A01', 5, 10, 1000000, '2020-02-05'),
(2, 'Web Development (HTML, CSS, PHP) - Gelombang 1', 'Sabtu,Minggu', '00:00:00', '00:00:00', 'A03', 5, 20, 3000000, '2020-02-07'),
(3, 'Komputer Administrasi (Ms. Word, Ms. Excel, Ms. PowerPoint) - Gelombang 2', 'Jumat,Sabtu', '00:00:00', '00:00:00', 'A02', 5, 10, 1000000, '2020-04-10'),
(4, 'Web Development (HTML, CSS, PHP) - Gelombang 2', 'Senin,Selasa', '00:00:00', '00:00:00', 'A04', 4, 20, 3000000, '2020-06-22');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `level` enum('Admin','Peserta','Pelatih') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `level`) VALUES
(1, 'nyoman', 'f9fe4c5f7876e0e5899b13aa6f7ae937', 'Admin'),
(23, 'alfian31', '611662fc4f6952b0052979c4ca5054dc', 'Pelatih'),
(26, 'BSM2019001', '33be937d6b7fc0a84ab1107e7bb78fae', 'Peserta'),
(27, 'BSM2019002', '9d79017e20fa63cedbbb3f8b65d4df56', 'Peserta'),
(28, 'BSM2019003', 'b1901a5cf490be4c4f9c9a79a7f86abb', 'Peserta'),
(29, 'BSM2019004', '7e25acfc29018d475bca876287c8c6da', 'Peserta'),
(30, 'BSM2019005', '0c4ba200e4d8f948a5ff51bfe5e204c8', 'Peserta'),
(31, 'BSM2019006', 'b177ad5e03c38e8dade919b57a6b211d', 'Peserta'),
(32, 'BSM2019007', '9e7351b7f651aa57b2e5faefa3cc7a4a', 'Peserta'),
(33, 'BSM2019008', '6e68db2a59ee6b3955502433e0631e67', 'Peserta'),
(34, 'BSM2019009', 'e8a858efce68c02d2db3b6e0b25c0dce', 'Peserta'),
(35, 'BSM2019010', '796154dd22893203da466e1709b2b496', 'Peserta'),
(36, 'm_toni', '4236d7dc514965465058f062adcb707a', 'Pelatih'),
(37, 'daus01', '30cc939798247b4b4255d86f85d156ce', 'Pelatih'),
(39, 'BSM2019011', 'd14d70d4595f1ff3237d45d6662fa3c3', 'Peserta'),
(44, 'BSM2019014', '249e45c1d1c6fc0eb282a22de04409a8', 'Peserta'),
(45, 'BSM2019014', '249e45c1d1c6fc0eb282a22de04409a8', 'Peserta'),
(48, 'BSM2019012', 'b31a4c903cf5ce03f2efdc2f681ef7f8', 'Peserta'),
(49, 'BSM2019012', 'b31a4c903cf5ce03f2efdc2f681ef7f8', 'Peserta'),
(50, 'BSM2019013', '34cdf34cdbab2eff5a9abf2edca10cb0', 'Peserta');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`jadwal_id`),
  ADD KEY `program_id` (`program_id`);

--
-- Indexes for table `pelatih`
--
ALTER TABLE `pelatih`
  ADD PRIMARY KEY (`pelatih_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `pelatihan`
--
ALTER TABLE `pelatihan`
  ADD PRIMARY KEY (`pelatihan_id`),
  ADD KEY `pelatih_id` (`pelatih_id`),
  ADD KEY `program_id` (`program_id`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`pendaftaran_id`),
  ADD KEY `user_id` (`peserta_id`),
  ADD KEY `program_id` (`program_id`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`peserta_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `program_kursus`
--
ALTER TABLE `program_kursus`
  ADD PRIMARY KEY (`program_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `jadwal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=281;
--
-- AUTO_INCREMENT for table `pelatihan`
--
ALTER TABLE `pelatihan`
  MODIFY `pelatihan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `peserta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`program_id`) REFERENCES `program_kursus` (`program_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pelatih`
--
ALTER TABLE `pelatih`
  ADD CONSTRAINT `pelatih_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pelatihan`
--
ALTER TABLE `pelatihan`
  ADD CONSTRAINT `pelatihan_ibfk_2` FOREIGN KEY (`pelatih_id`) REFERENCES `pelatih` (`pelatih_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pelatihan_ibfk_3` FOREIGN KEY (`program_id`) REFERENCES `program_kursus` (`program_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `pendaftaran_ibfk_6` FOREIGN KEY (`program_id`) REFERENCES `program_kursus` (`program_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pendaftaran_ibfk_8` FOREIGN KEY (`peserta_id`) REFERENCES `peserta` (`peserta_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peserta`
--
ALTER TABLE `peserta`
  ADD CONSTRAINT `peserta_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
