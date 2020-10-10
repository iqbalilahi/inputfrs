-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2020 at 06:34 PM
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
-- Database: `info_gamer`
--

-- --------------------------------------------------------

--
-- Table structure for table `el_messages`
--

CREATE TABLE `el_messages` (
  `id` int(11) NOT NULL,
  `type_id` tinyint(1) NOT NULL COMMENT '1=inbox,2=outbox',
  `content` text NOT NULL,
  `owner_id` int(11) NOT NULL,
  `sender_receiver_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `opened` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=belum,1=sudah'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `el_messages`
--

INSERT INTO `el_messages` (`id`, `type_id`, `content`, `owner_id`, `sender_receiver_id`, `date`, `opened`) VALUES
(1, 2, '<p>coba kirim</p>\r\n', 2, 1, '2020-06-18 16:23:31', 1),
(2, 1, '<p>coba kirim</p>\r\n', 1, 2, '2020-06-18 16:23:31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `id_game` bigint(20) NOT NULL,
  `images` text NOT NULL,
  `nama_game` varchar(100) NOT NULL,
  `deskripsi` varchar(150) NOT NULL,
  `id_kategori` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`id_game`, `images`, `nama_game`, `deskripsi`, `id_kategori`) VALUES
(1, 'png-transparent-dota-2-dota-2-league-of-legends.png', 'Dota 2', 'multiplayer online battle arena (MOBA) video game developed and published by Valve.', 1),
(2, 'AOV_Header_Logo_27fcd7cc.png', 'AOV (Arena Of Valor)', 'multiplayer online battle arena (MOBA) video game developed and published by tencent.', 2),
(3, 'logo-mobile-legend.png', 'Mobile Legengd', 'multiplayer online battle arena (MOBA) video game developed and published by MOONTON.', 2);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_game`
--

CREATE TABLE `kategori_game` (
  `id_kategori` bigint(20) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `deskripsi` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_game`
--

INSERT INTO `kategori_game` (`id_kategori`, `nama_kategori`, `deskripsi`) VALUES
(1, 'PC', 'Personal Computer'),
(2, 'Mobile phone', 'Mobile phone IOS or Android');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` bigint(20) NOT NULL,
  `nama_member` varchar(100) NOT NULL,
  `telp_m` varchar(15) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `proplayer`
--

CREATE TABLE `proplayer` (
  `id_proplayer` bigint(20) NOT NULL,
  `nama_player` varchar(150) NOT NULL,
  `telp_p` varchar(15) NOT NULL,
  `id_tim` bigint(20) NOT NULL,
  `id_game` bigint(20) NOT NULL,
  `foto` text NOT NULL,
  `video` text NOT NULL,
  `prestasi` text NOT NULL,
  `lat` text NOT NULL,
  `lng` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(52, 1, 18),
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
(65, 2, 23);

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
(18, 'Chat proplayer', '#', 'fa fa-wechat', 0, 'y'),
(19, 'Data Tim', 'tim', 'fa fa-users', 13, 'y'),
(20, 'Data Game', 'game', 'fa fa-gamepad', 13, 'y'),
(21, 'Data Proplayer', 'proplayer', 'fa fa-users', 13, 'y'),
(22, 'Data Member', 'member', 'fa fa-users', 13, 'y'),
(23, 'Kategori Game', 'kategori_game', 'fa fa-gamepad', 13, 'y');

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
(1, 'Tampil Menu', 'tidak');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_users` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
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
(3, 'R. Gilang Sugih', 'gilangsugih19@gmail.com', '$2y$04$Wbyfv4xwihb..POfhxY5Y.jHOJqEFIG3dLfBYwAmnOACpH0EWCCdq', '61306511_366383717565660_8896517071349743616_n.jpg', 2, 'y');

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
(3, 'Proplayer'),
(4, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `tim`
--

CREATE TABLE `tim` (
  `id_tim` bigint(20) NOT NULL,
  `images` text NOT NULL,
  `nama_tim` varchar(100) NOT NULL,
  `sebutan_tim` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `telp_t` varchar(15) NOT NULL,
  `ceo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tim`
--

INSERT INTO `tim` (`id_tim`, `images`, `nama_tim`, `sebutan_tim`, `alamat`, `telp_t`, `ceo`) VALUES
(1, 'EVOS_Esports_logo.png', 'EVOS Esports', 'EVOS', 'Southeast Asia', '088291164646', 'Ivan Yeo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `el_messages`
--
ALTER TABLE `el_messages`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `type_id` (`type_id`,`owner_id`,`sender_receiver_id`) USING BTREE,
  ADD KEY `type_id_2` (`type_id`,`owner_id`,`sender_receiver_id`) USING BTREE;

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id_game`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `kategori_game`
--
ALTER TABLE `kategori_game`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `proplayer`
--
ALTER TABLE `proplayer`
  ADD PRIMARY KEY (`id_proplayer`),
  ADD KEY `id_tim` (`id_tim`),
  ADD KEY `id_game` (`id_game`);

--
-- Indexes for table `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id_menu`) USING BTREE;

--
-- Indexes for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id_setting`) USING BTREE;

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
-- Indexes for table `tim`
--
ALTER TABLE `tim`
  ADD PRIMARY KEY (`id_tim`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `el_messages`
--
ALTER TABLE `el_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `id_game` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategori_game`
--
ALTER TABLE `kategori_game`
  MODIFY `id_kategori` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proplayer`
--
ALTER TABLE `proplayer`
  MODIFY `id_proplayer` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  MODIFY `id_user_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tim`
--
ALTER TABLE `tim`
  MODIFY `id_tim` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `game`
--
ALTER TABLE `game`
  ADD CONSTRAINT `game_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_game` (`id_kategori`);

--
-- Constraints for table `proplayer`
--
ALTER TABLE `proplayer`
  ADD CONSTRAINT `proplayer_ibfk_1` FOREIGN KEY (`id_tim`) REFERENCES `tim` (`id_tim`),
  ADD CONSTRAINT `proplayer_ibfk_2` FOREIGN KEY (`id_game`) REFERENCES `game` (`id_game`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
