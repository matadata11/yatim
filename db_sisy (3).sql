-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2022 at 11:36 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sisy`
--

-- --------------------------------------------------------

--
-- Table structure for table `dt_siswa`
--

CREATE TABLE `dt_siswa` (
  `id_siswa` int(11) NOT NULL,
  `admin_input` varchar(90) NOT NULL,
  `provinsi_id` int(11) NOT NULL,
  `kabupaten_id` int(11) NOT NULL,
  `nm_sekolah` varchar(100) CHARACTER SET latin1 NOT NULL,
  `nm_siswa` varchar(100) CHARACTER SET latin1 NOT NULL,
  `nisn` varchar(40) CHARACTER SET latin1 NOT NULL,
  `kelas` varchar(20) CHARACTER SET latin1 NOT NULL,
  `nm_bank` varchar(50) NOT NULL,
  `atas_nama` varchar(100) CHARACTER SET latin1 NOT NULL,
  `no_rek` varchar(50) CHARACTER SET latin1 NOT NULL,
  `nominal` varchar(20) NOT NULL,
  `photo_buku` varchar(100) CHARACTER SET latin1 NOT NULL,
  `no_hp` varchar(30) NOT NULL,
  `status` enum('null','verifikasi') NOT NULL,
  `locks` enum('Ylock','Nlock') CHARACTER SET latin1 NOT NULL,
  `lock_admin` enum('Ylock','Nlock') CHARACTER SET latin1 NOT NULL,
  `lock_super` enum('Ylock','Nlock') CHARACTER SET latin1 NOT NULL,
  `created_at` varchar(20) CHARACTER SET latin1 NOT NULL,
  `updated_at` varchar(20) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dt_siswa`
--

INSERT INTO `dt_siswa` (`id_siswa`, `admin_input`, `provinsi_id`, `kabupaten_id`, `nm_sekolah`, `nm_siswa`, `nisn`, `kelas`, `nm_bank`, `atas_nama`, `no_rek`, `nominal`, `photo_buku`, `no_hp`, `status`, `locks`, `lock_admin`, `lock_super`, `created_at`, `updated_at`) VALUES
(26, 'Matadata dev', 3, 3, 'SMK Negeri 1 Banda Aceh', 'Anonim', '2015010155', 'XI', 'bank aceh syariah', 'ANONIM', '13024545', '600000', '7df1121fae8fa45a92a57a0a96342483.jpg', '082165700141', 'verifikasi', 'Ylock', 'Ylock', 'Nlock', '2022-11-29', '');

-- --------------------------------------------------------

--
-- Table structure for table `mt_admin`
--

CREATE TABLE `mt_admin` (
  `id_admin` int(11) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `nip` varchar(40) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(128) NOT NULL,
  `photo_pengguna` varchar(70) NOT NULL,
  `is_active` int(11) NOT NULL,
  `level` enum('Super','Admin','Penjab','Adc','HD') NOT NULL,
  `provinsi_id` int(11) NOT NULL,
  `kabupaten_id` int(11) NOT NULL,
  `instansi_id` int(11) NOT NULL,
  `created_at` varchar(12) NOT NULL,
  `updated_at` varchar(20) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mt_admin`
--

INSERT INTO `mt_admin` (`id_admin`, `fullname`, `nip`, `jabatan`, `email`, `password`, `photo_pengguna`, `is_active`, `level`, `provinsi_id`, `kabupaten_id`, `instansi_id`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Administrator', '-', 'Developer', 'matadata.dev2021@gmail.com', '$2y$10$I6jvmy4yEFiEmbei3dBWjenRcC5CwJA78xcdGqbwblr6J42vXBhCy', '', 1, 'Super', 0, 0, 0, '2021-11-14', '2022-04-06 01:04:29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mt_berkas`
--

CREATE TABLE `mt_berkas` (
  `id_berkas` int(11) NOT NULL,
  `admin` varchar(30) NOT NULL,
  `berkas` varchar(80) NOT NULL,
  `tentang` varchar(90) NOT NULL,
  `type` enum('Internal','External') NOT NULL,
  `created_at` varchar(20) NOT NULL,
  `updated_at` varchar(20) NOT NULL,
  `url_berkas` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mt_instansi`
--

CREATE TABLE `mt_instansi` (
  `id_instansi` int(11) NOT NULL,
  `admin` varchar(80) NOT NULL,
  `provinsi_id` int(11) NOT NULL,
  `kabupaten_id` int(11) NOT NULL,
  `instansi` varchar(80) NOT NULL,
  `lat_kantor` varchar(60) NOT NULL,
  `long_kantor` varchar(60) NOT NULL,
  `url_instansi` varchar(100) NOT NULL,
  `created_at` varchar(20) NOT NULL,
  `updated_at` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mt_instansi`
--

INSERT INTO `mt_instansi` (`id_instansi`, `admin`, `provinsi_id`, `kabupaten_id`, `instansi`, `lat_kantor`, `long_kantor`, `url_instansi`, `created_at`, `updated_at`) VALUES
(3, '', 1, 27, 'Cabang Dinas Pendidikan Kota Subulussalam dan Kab. Aceh Singkil', '1', '1', '', '2022-11-30', '');

-- --------------------------------------------------------

--
-- Table structure for table `mt_kabupaten`
--

CREATE TABLE `mt_kabupaten` (
  `id_kabupaten` int(11) NOT NULL,
  `provinsi_id` int(11) NOT NULL,
  `nm_kabupaten` varchar(100) NOT NULL,
  `created_at` varchar(20) NOT NULL,
  `updated_at` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mt_kabupaten`
--

INSERT INTO `mt_kabupaten` (`id_kabupaten`, `provinsi_id`, `nm_kabupaten`, `created_at`, `updated_at`) VALUES
(3, 3, 'Aceh Singkil', '2022-10-02', ''),
(4, 4, 'Deli serdang', '2022-10-02', ''),
(5, 7, 'Batam', '2022-10-02', ''),
(6, 3, 'Kota Banda Aceh', '2022-10-02', ''),
(7, 3, 'Kota Subulussalam', '2022-10-03', '');

-- --------------------------------------------------------

--
-- Table structure for table `mt_pengaturan`
--

CREATE TABLE `mt_pengaturan` (
  `id_pengaturan` int(11) NOT NULL,
  `nama_apps` varchar(50) NOT NULL,
  `header` varchar(60) NOT NULL,
  `nama_instansi` varchar(60) NOT NULL,
  `nm_desa` varchar(70) NOT NULL,
  `nm_kec` varchar(70) NOT NULL,
  `nm_kab` varchar(70) NOT NULL,
  `nm_prov` varchar(70) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `nm_jalan` text NOT NULL,
  `telp` varchar(30) NOT NULL,
  `fax` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `url_pengaturan` varchar(60) NOT NULL,
  `created_at` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mt_pengaturan`
--

INSERT INTO `mt_pengaturan` (`id_pengaturan`, `nama_apps`, `header`, `nama_instansi`, `nm_desa`, `nm_kec`, `nm_kab`, `nm_prov`, `logo`, `nm_jalan`, `telp`, `fax`, `email`, `url_pengaturan`, `created_at`) VALUES
(1, 'SISY', 'Matadata Cloud', 'Notfound Indonesia', 'Paleuh Pulo', 'Ingin Jaya', 'Aceh Besar', 'Aceh', '', 'Jl. Tr. Raja', '082165700141', '-', 'matadata.dev2021@gmail.com', '9be712101316cba47a43129f57a7b0b9', '30 November 2022');

-- --------------------------------------------------------

--
-- Table structure for table `mt_pengumuman`
--

CREATE TABLE `mt_pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `judul` varchar(70) NOT NULL,
  `pengumuman` text NOT NULL,
  `type` varchar(70) NOT NULL,
  `text` varchar(255) NOT NULL,
  `date` varchar(30) NOT NULL,
  `url_pengumuman` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mt_posko`
--

CREATE TABLE `mt_posko` (
  `id_posko` int(11) NOT NULL,
  `nama_wilayah` varchar(70) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `telpon` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  `email` varchar(40) NOT NULL,
  `status` varchar(40) NOT NULL,
  `url_posko` varchar(70) NOT NULL,
  `created_at` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mt_posko`
--

INSERT INTO `mt_posko` (`id_posko`, `nama_wilayah`, `nama`, `telpon`, `keterangan`, `email`, `status`, `url_posko`, `created_at`) VALUES
(0, 'Notfoud Indonesia', 'Dwi Satria Pangestu, A.Md.Kom', '082165700141', 'Pengembang', 'dwi@notfound.id', 'Pusat', '5157479c900b26d65ea386c5480a8e5b', '30 November 2022');

-- --------------------------------------------------------

--
-- Table structure for table `wilayah_kabupaten`
--

CREATE TABLE `wilayah_kabupaten` (
  `id_kabupaten` int(11) NOT NULL,
  `provinsi_id` int(11) NOT NULL,
  `nama_kabupaten` varchar(70) NOT NULL,
  `created_at` varchar(20) NOT NULL,
  `updated_at` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wilayah_kabupaten`
--

INSERT INTO `wilayah_kabupaten` (`id_kabupaten`, `provinsi_id`, `nama_kabupaten`, `created_at`, `updated_at`) VALUES
(4, 1, 'Subulussalam', '2022-01-19', '2022-01-20'),
(5, 1, 'Aceh Barat', '2022-01-19', ''),
(6, 1, 'Aceh Barat Daya', '2022-01-19', '2022-01-19'),
(7, 1, 'Aceh Besar', '2022-01-19', ''),
(8, 1, 'Aceh Jaya', '2022-01-19', ''),
(9, 1, 'Aceh Selatan', '2022-01-19', ''),
(10, 1, 'Aceh Tamiang', '2022-01-19', ''),
(11, 1, 'Aceh Tengah', '2022-01-19', ''),
(12, 1, 'Aceh Tenggara', '2022-01-19', ''),
(13, 1, 'Aceh Timur', '2022-01-19', ''),
(14, 1, 'Aceh Utara', '2022-01-19', ''),
(15, 1, 'Bener Meriah', '2022-01-19', ''),
(16, 1, 'Bireuen', '2022-01-19', ''),
(17, 1, 'Gayo Lues', '2022-01-19', ''),
(18, 1, 'Nagan raya', '2022-01-19', ''),
(19, 1, 'Pidie', '2022-01-19', ''),
(20, 1, 'Pidie Jaya', '2022-01-19', ''),
(21, 1, 'Simeulue', '2022-01-19', ''),
(22, 1, 'Banda Aceh', '2022-01-19', ''),
(23, 1, 'Langsa', '2022-01-19', ''),
(24, 1, 'Sabang', '2022-01-19', ''),
(25, 1, 'Lhokseumawe', '2022-01-19', ''),
(27, 1, 'Aceh Singkil', '2022-01-20', '');

-- --------------------------------------------------------

--
-- Table structure for table `wilayah_provinsi`
--

CREATE TABLE `wilayah_provinsi` (
  `id_provinsi` int(11) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `created_at` varchar(50) NOT NULL,
  `updated_at` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wilayah_provinsi`
--

INSERT INTO `wilayah_provinsi` (`id_provinsi`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Aceh', '', '2022-11-30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dt_siswa`
--
ALTER TABLE `dt_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `mt_admin`
--
ALTER TABLE `mt_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `mt_berkas`
--
ALTER TABLE `mt_berkas`
  ADD PRIMARY KEY (`id_berkas`);

--
-- Indexes for table `mt_instansi`
--
ALTER TABLE `mt_instansi`
  ADD PRIMARY KEY (`id_instansi`);

--
-- Indexes for table `mt_kabupaten`
--
ALTER TABLE `mt_kabupaten`
  ADD PRIMARY KEY (`id_kabupaten`);

--
-- Indexes for table `mt_pengaturan`
--
ALTER TABLE `mt_pengaturan`
  ADD PRIMARY KEY (`id_pengaturan`);

--
-- Indexes for table `mt_pengumuman`
--
ALTER TABLE `mt_pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indexes for table `mt_posko`
--
ALTER TABLE `mt_posko`
  ADD PRIMARY KEY (`id_posko`);

--
-- Indexes for table `wilayah_kabupaten`
--
ALTER TABLE `wilayah_kabupaten`
  ADD PRIMARY KEY (`id_kabupaten`);

--
-- Indexes for table `wilayah_provinsi`
--
ALTER TABLE `wilayah_provinsi`
  ADD PRIMARY KEY (`id_provinsi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dt_siswa`
--
ALTER TABLE `dt_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `mt_admin`
--
ALTER TABLE `mt_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mt_instansi`
--
ALTER TABLE `mt_instansi`
  MODIFY `id_instansi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mt_kabupaten`
--
ALTER TABLE `mt_kabupaten`
  MODIFY `id_kabupaten` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mt_pengumuman`
--
ALTER TABLE `mt_pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wilayah_provinsi`
--
ALTER TABLE `wilayah_provinsi`
  MODIFY `id_provinsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
