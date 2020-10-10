-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2020 at 07:24 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inputfrs`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_dosen`
--

CREATE TABLE `detail_dosen` (
  `id_detail_dosen` bigint(20) NOT NULL,
  `id_dosen` bigint(20) NOT NULL,
  `id_jabatan` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_dosen`
--

INSERT INTO `detail_dosen` (`id_detail_dosen`, `id_dosen`, `id_jabatan`) VALUES
(1, 1, 6),
(2, 2, 7),
(3, 3, 8);

-- --------------------------------------------------------

--
-- Table structure for table `frs`
--

CREATE TABLE `frs` (
  `id_frs` bigint(20) NOT NULL,
  `id_mhs` bigint(20) NOT NULL,
  `id_matkul` bigint(20) NOT NULL,
  `kode_matkul` varchar(20) NOT NULL,
  `id_dosen` bigint(20) NOT NULL,
  `status_nilai` varchar(10) NOT NULL,
  `sks` bigint(20) NOT NULL,
  `nama_prodi` varchar(200) NOT NULL,
  `kode_studi` varchar(20) NOT NULL,
  `semester` bigint(20) NOT NULL,
  `tahun_akademik` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `frs`
--

INSERT INTO `frs` (`id_frs`, `id_mhs`, `id_matkul`, `kode_matkul`, `id_dosen`, `status_nilai`, `sks`, `nama_prodi`, `kode_studi`, `semester`, `tahun_akademik`) VALUES
(47, 1, 2, '1506022450', 1, 'B', 3, 'Teknik Informatika', 'S1', 1, '2017/2018'),
(48, 1, 3, '1506022451', 1, 'B', 3, 'Teknik Informatika', 'S1', 1, '2017/2018'),
(49, 1, 7, '1506022453', 0, 'B', 6, 'Teknik Informatika', 'S1', 8, '2018/2019');

-- --------------------------------------------------------

--
-- Table structure for table `judulskripsi`
--

CREATE TABLE `judulskripsi` (
  `id_judulskripsi` bigint(20) NOT NULL,
  `id_mhs` bigint(20) NOT NULL,
  `npm` char(16) NOT NULL,
  `nama_mhs` varchar(200) NOT NULL,
  `id_prodi` bigint(20) NOT NULL,
  `judulskripsi` text NOT NULL,
  `perusahaan` varchar(200) NOT NULL,
  `alamat_p` text NOT NULL,
  `email` varchar(150) NOT NULL,
  `pembimbing_a` bigint(20) NOT NULL,
  `pembimbing_b` bigint(20) NOT NULL,
  `tahun_akademik` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `judulskripsi`
--

INSERT INTO `judulskripsi` (`id_judulskripsi`, `id_mhs`, `npm`, `nama_mhs`, `id_prodi`, `judulskripsi`, `perusahaan`, `alamat_p`, `email`, `pembimbing_a`, `pembimbing_b`, `tahun_akademik`) VALUES
(1, 1, '43A87006150128', 'testing', 1, 'A', 'A', 'A', 'perusahaan@gmail.com', 2, 3, '2018/2019');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dosen`
--

CREATE TABLE `tbl_dosen` (
  `id_dosen` bigint(20) NOT NULL,
  `nid` varchar(50) NOT NULL,
  `nama_dosen` varchar(200) NOT NULL,
  `telp_dosen` varchar(14) NOT NULL,
  `alamat_dosen` varchar(200) NOT NULL,
  `jeniskelamin` varchar(50) NOT NULL,
  `pendidikan_akhir` varchar(100) NOT NULL,
  `agama` varchar(50) NOT NULL,
  `email_dosen` varchar(150) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dosen`
--

INSERT INTO `tbl_dosen` (`id_dosen`, `nid`, `nama_dosen`, `telp_dosen`, `alamat_dosen`, `jeniskelamin`, `pendidikan_akhir`, `agama`, `email_dosen`, `tempat_lahir`, `tanggal_lahir`) VALUES
(1, 'D009', 'test', '089635244513', 'jl. Almuawanah Gg.Tawakal Rt007/012 Kel.Aren Jaya, Bekasi Timur', 'Laki-laki', 'S2', 'islam', 'testting@gmail.com', 'Jakarta', '2020-09-22'),
(2, 'D010', 'Budi S.kom,. M.kom.', '087881456735', 'jl. Almuawanah Gg.Tawakal Rt007/012 Kel.Aren Jaya, Bekasi Timur', 'Laki-laki', 'S2', 'islam', 'budi@gmail.com', 'Bekasi', '1971-09-07'),
(3, 'D011', 'Muhammad Nur S.kom,. M.kom.', '087881456735', 'jl. Almuawanah Gg.Tawakal Rt007/012 Kel.Aren Jaya, Bekasi Timur', 'Laki-laki', 'S2', 'islam', 'mnur@gmail.com', 'Bekasi', '1983-10-11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hak_akses`
--

CREATE TABLE `tbl_hak_akses` (
  `id` int(11) NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_hak_akses`
--

INSERT INTO `tbl_hak_akses` (`id`, `id_user_level`, `id_menu`) VALUES
(46, 1, 1),
(47, 1, 2),
(48, 1, 3),
(49, 1, 9),
(50, 1, 10),
(51, 1, 13),
(54, 2, 13),
(55, 2, 18),
(56, 1, 19),
(57, 1, 20),
(58, 1, 21),
(59, 1, 22),
(60, 1, 23),
(61, 2, 19),
(62, 2, 20),
(63, 2, 21),
(64, 2, 22),
(65, 2, 23),
(66, 1, 18),
(67, 1, 14),
(68, 1, 15),
(69, 1, 16),
(70, 1, 17),
(71, 1, 24),
(72, 1, 25),
(73, 1, 26),
(75, 2, 24),
(76, 2, 25),
(77, 2, 26),
(78, 2, 17),
(79, 2, 16),
(80, 2, 15),
(81, 2, 14),
(82, 3, 27),
(83, 3, 28);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jabatan`
--

CREATE TABLE `tbl_jabatan` (
  `id_jabatan` bigint(20) NOT NULL,
  `jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jabatan`
--

INSERT INTO `tbl_jabatan` (`id_jabatan`, `jabatan`) VALUES
(1, 'Ketua Program Studi Teknik Informatika'),
(2, 'Ketua Program Studi Sistem Informasi'),
(3, 'Ketua Program Studi Teknik Komputer'),
(4, 'Ketua Program Studi Manajemen Informatika'),
(5, 'Ketua Program Studi Komputerisasi Akuntansi'),
(6, 'Pembimbing Akademik'),
(7, 'Pembimbing 1 TA/Skripsi'),
(8, 'Pembimbing 2 TA/Skripsi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenjangstudi`
--

CREATE TABLE `tbl_jenjangstudi` (
  `id_jenjangstudi` bigint(20) NOT NULL,
  `kode_studi` varchar(20) NOT NULL,
  `nama_studi` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jenjangstudi`
--

INSERT INTO `tbl_jenjangstudi` (`id_jenjangstudi`, `kode_studi`, `nama_studi`) VALUES
(1, 'S1', 'Strata 1'),
(2, 'D3', 'Diploma 3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `id_kelas` bigint(20) NOT NULL,
  `kode_kelas` varchar(50) NOT NULL,
  `nama_kelas` varchar(100) NOT NULL,
  `id_semester` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`id_kelas`, `kode_kelas`, `nama_kelas`, `id_semester`) VALUES
(1, '1/A/P', '1 A Pagi', 1),
(2, '1/B/P', '1 B Pagi', 1),
(3, '1/C/P', '1 C Pagi', 1),
(4, '1/A/M', '1 A Malam', 1),
(5, '1/B/M', '1 B Malam', 1),
(6, '1/A/K', '1 A Karyawan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_matkul`
--

CREATE TABLE `tbl_matkul` (
  `id_matkul` bigint(20) NOT NULL,
  `kode_matkul` varchar(20) NOT NULL,
  `nama_matkul` varchar(150) NOT NULL,
  `id_sks` bigint(20) NOT NULL,
  `status_nilai` varchar(10) NOT NULL,
  `id_dosen` bigint(20) NOT NULL,
  `id_jenjangstudi` bigint(20) NOT NULL,
  `id_prodi` bigint(20) NOT NULL,
  `id_semester` bigint(20) NOT NULL,
  `id_thperiode` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_matkul`
--

INSERT INTO `tbl_matkul` (`id_matkul`, `kode_matkul`, `nama_matkul`, `id_sks`, `status_nilai`, `id_dosen`, `id_jenjangstudi`, `id_prodi`, `id_semester`, `id_thperiode`) VALUES
(1, '1506022449', 'Kewirausahaan', 1, 'B', 1, 1, 1, 7, 1),
(2, '1506022450', 'Sistem Operasi', 2, 'B', 1, 1, 1, 1, 1),
(3, '1506022451', 'Sistem Diskrit', 2, 'B', 1, 1, 1, 1, 1),
(4, '1506022452', 'Kalkulus', 2, 'B', 1, 1, 2, 1, 1),
(7, '1506022453', 'Skripsi', 4, 'B', 0, 1, 1, 8, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id_menu` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `url` varchar(30) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `is_main_menu` int(11) NOT NULL,
  `is_aktif` enum('y','n') NOT NULL COMMENT 'y=yes,n=no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id_menu`, `title`, `url`, `icon`, `is_main_menu`, `is_aktif`) VALUES
(1, 'KELOLA MENU', 'kelolamenu', 'fa fa-server', 10, 'y'),
(2, 'KELOLA PENGGUNA', 'user', 'fa fa-user-o', 10, 'y'),
(3, 'level PENGGUNA', 'userlevel', 'fa fa-users', 10, 'y'),
(9, 'Contoh Form', 'welcome/form', 'fa fa-id-card', 10, 'y'),
(10, 'SETTING', '#', 'fa  fa-gear', 0, 'y'),
(13, 'MASTER', '#', 'fa  fa-plus-square', 0, 'y'),
(14, 'Mahasiswa', 'mhs', 'fa fa-users', 13, 'y'),
(15, 'Dosen', 'dosen', 'fa fa-users', 13, 'y'),
(16, 'Detail Dosen', 'detail_dosen', 'fa fa-plus', 13, 'y'),
(17, 'Jabatan', 'jabatan', 'fa fa-plus', 13, 'y'),
(18, 'Jenjang Studi', 'jenjangstudi', 'fa fa-plus', 13, 'y'),
(19, 'Kelas', 'kelas', 'fa fa-plus', 13, 'y'),
(20, 'Mata Kuliah', 'matkul', 'fa fa-book', 13, 'y'),
(21, 'Program Studi', 'prodi', 'fa fa-plus', 13, 'y'),
(22, 'Semester', 'semester', 'fa fa-plus', 13, 'y'),
(24, 'SKS', 'sks', 'fa fa-plus', 13, 'y'),
(25, 'Status  Kuliah', 'status', 'fa fa-plus', 13, 'y'),
(26, 'Tahun periode', 'tahunperiode', 'fa fa-plus', 13, 'y'),
(27, 'Input FRS', 'inputfrs', 'fa fa-send-o', 0, 'y'),
(28, 'Input Judul Skripsi/TA', 'judulskripsi', 'fa fa-file-text-o', 0, 'y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mhs`
--

CREATE TABLE `tbl_mhs` (
  `id_mhs` bigint(20) NOT NULL,
  `npm` char(16) NOT NULL,
  `nama_mhs` varchar(200) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jeniskelamin` varchar(50) NOT NULL,
  `agama` varchar(50) NOT NULL,
  `nohp_mhs` varchar(14) NOT NULL,
  `email_mhs` varchar(150) NOT NULL,
  `id_jenjangstudi` bigint(20) NOT NULL,
  `id_prodi` bigint(20) NOT NULL,
  `id_status` bigint(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `images` text NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `is_aktif` enum('y','n') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mhs`
--

INSERT INTO `tbl_mhs` (`id_mhs`, `npm`, `nama_mhs`, `tempat_lahir`, `tanggal_lahir`, `jeniskelamin`, `agama`, `nohp_mhs`, `email_mhs`, `id_jenjangstudi`, `id_prodi`, `id_status`, `password`, `images`, `id_user_level`, `is_aktif`) VALUES
(1, '43A87006150128', 'testing', 'Pamekasan', '1997-06-04', 'Laki-laki', 'islam', '08888888899', 'test@gmail.com', 1, 1, 2, '$2y$04$OuRPO.VxqtEpydZXUFkhBO4LUeyuZ3dbK3OJ9eO0aYXH5YjcWXJMS', 'IMG-20200608-WA0000.png', 3, 'y'),
(2, '43A87006150129', 'Anjay', 'Jakarta', '2002-07-09', 'Laki-laki', 'islam', '08888888892', 'anjay@gmail.com', 1, 3, 1, '$2y$04$kZ43bNKmDfofkdMnIJ3StuWqF0vYtCteP5PXM3GPld.CXtuuLi0oW', '64698334_2474271045949257_4296310267848949760_n1.jpg', 3, 'y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prodi`
--

CREATE TABLE `tbl_prodi` (
  `id_prodi` bigint(20) NOT NULL,
  `kode_prodi` varchar(100) NOT NULL,
  `id_jenjangstudi` bigint(20) NOT NULL,
  `nama_prodi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_prodi`
--

INSERT INTO `tbl_prodi` (`id_prodi`, `kode_prodi`, `id_jenjangstudi`, `nama_prodi`) VALUES
(1, 'TI', 1, 'Teknik Informatika'),
(2, 'SI', 1, 'Sistem Informasi'),
(3, 'TK', 2, 'Teknik Komputer'),
(4, 'MI', 2, 'Manajemen Informatika'),
(5, 'KA', 2, 'Komputerisasi Akuntansi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_semester`
--

CREATE TABLE `tbl_semester` (
  `id_semester` bigint(20) NOT NULL,
  `semester` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_semester`
--

INSERT INTO `tbl_semester` (`id_semester`, `semester`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id_setting` int(11) NOT NULL,
  `nama_setting` varchar(50) NOT NULL,
  `value` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_setting`
--

INSERT INTO `tbl_setting` (`id_setting`, `nama_setting`, `value`) VALUES
(1, 'Tampil Menu', 'ya');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sks`
--

CREATE TABLE `tbl_sks` (
  `id_sks` bigint(20) NOT NULL,
  `sks` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sks`
--

INSERT INTO `tbl_sks` (`id_sks`, `sks`) VALUES
(1, 2),
(2, 3),
(3, 4),
(4, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `id_status` bigint(20) NOT NULL,
  `kode_status` varchar(10) NOT NULL,
  `nama_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`id_status`, `kode_status`, `nama_status`) VALUES
(1, 'S', 'Shift'),
(2, 'R', 'Reguler'),
(3, 'K', 'Karyawan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tahunperiode`
--

CREATE TABLE `tbl_tahunperiode` (
  `id_thperiode` bigint(20) NOT NULL,
  `periode` bigint(20) NOT NULL,
  `tahun_akademik` varchar(150) NOT NULL,
  `ket_periode` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tahunperiode`
--

INSERT INTO `tbl_tahunperiode` (`id_thperiode`, `periode`, `tahun_akademik`, `ket_periode`) VALUES
(1, 1, '2017/2018', 'Ganjil'),
(2, 2, '2018/2019', 'Genap');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_users` int(11) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `images` text NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `is_aktif` enum('y','n') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_users`, `full_name`, `email`, `password`, `images`, `id_user_level`, `is_aktif`) VALUES
(1, 'Choirul iqbal nuril ilahi S.Kom', 'iqbalilahi7@gmail.com', '$2y$04$Wbyfv4xwihb..POfhxY5Y.jHOJqEFIG3dLfBYwAmnOACpH0EWCCdq', 'fotoku2.png', 1, 'y'),
(3, 'R. Gilang Sugih', 'gilangsugih19@gmail.com', '$2y$04$Wbyfv4xwihb..POfhxY5Y.jHOJqEFIG3dLfBYwAmnOACpH0EWCCdq', '61306511_366383717565660_8896517071349743616_n.jpg', 2, 'y'),
(4, 'Urmih Karsani', 'urmih@gmail.com', '$2y$04$u6KJZoWRYTjgyqwKKieOj.IYX3HAGqjXDdaEhClzb0heMU10E3Gde', '', 2, 'y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_level`
--

CREATE TABLE `tbl_user_level` (
  `id_user_level` int(11) NOT NULL,
  `nama_level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_user_level`
--

INSERT INTO `tbl_user_level` (`id_user_level`, `nama_level`) VALUES
(1, 'Super Admin'),
(2, 'Admin'),
(3, 'Mahasiswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_dosen`
--
ALTER TABLE `detail_dosen`
  ADD PRIMARY KEY (`id_detail_dosen`);

--
-- Indexes for table `frs`
--
ALTER TABLE `frs`
  ADD PRIMARY KEY (`id_frs`);

--
-- Indexes for table `judulskripsi`
--
ALTER TABLE `judulskripsi`
  ADD PRIMARY KEY (`id_judulskripsi`);

--
-- Indexes for table `tbl_dosen`
--
ALTER TABLE `tbl_dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `tbl_jenjangstudi`
--
ALTER TABLE `tbl_jenjangstudi`
  ADD PRIMARY KEY (`id_jenjangstudi`);

--
-- Indexes for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tbl_matkul`
--
ALTER TABLE `tbl_matkul`
  ADD PRIMARY KEY (`id_matkul`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id_menu`) USING BTREE;

--
-- Indexes for table `tbl_mhs`
--
ALTER TABLE `tbl_mhs`
  ADD PRIMARY KEY (`id_mhs`);

--
-- Indexes for table `tbl_prodi`
--
ALTER TABLE `tbl_prodi`
  ADD PRIMARY KEY (`id_prodi`),
  ADD KEY `id_jenjangstudi` (`id_jenjangstudi`);

--
-- Indexes for table `tbl_semester`
--
ALTER TABLE `tbl_semester`
  ADD PRIMARY KEY (`id_semester`);

--
-- Indexes for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id_setting`) USING BTREE;

--
-- Indexes for table `tbl_sks`
--
ALTER TABLE `tbl_sks`
  ADD PRIMARY KEY (`id_sks`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `tbl_tahunperiode`
--
ALTER TABLE `tbl_tahunperiode`
  ADD PRIMARY KEY (`id_thperiode`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_users`) USING BTREE;

--
-- Indexes for table `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  ADD PRIMARY KEY (`id_user_level`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_dosen`
--
ALTER TABLE `detail_dosen`
  MODIFY `id_detail_dosen` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `frs`
--
ALTER TABLE `frs`
  MODIFY `id_frs` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `judulskripsi`
--
ALTER TABLE `judulskripsi`
  MODIFY `id_judulskripsi` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_dosen`
--
ALTER TABLE `tbl_dosen`
  MODIFY `id_dosen` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  MODIFY `id_jabatan` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_jenjangstudi`
--
ALTER TABLE `tbl_jenjangstudi`
  MODIFY `id_jenjangstudi` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  MODIFY `id_kelas` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_matkul`
--
ALTER TABLE `tbl_matkul`
  MODIFY `id_matkul` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_mhs`
--
ALTER TABLE `tbl_mhs`
  MODIFY `id_mhs` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_prodi`
--
ALTER TABLE `tbl_prodi`
  MODIFY `id_prodi` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_semester`
--
ALTER TABLE `tbl_semester`
  MODIFY `id_semester` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_sks`
--
ALTER TABLE `tbl_sks`
  MODIFY `id_sks` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `id_status` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_tahunperiode`
--
ALTER TABLE `tbl_tahunperiode`
  MODIFY `id_thperiode` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  MODIFY `id_user_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
