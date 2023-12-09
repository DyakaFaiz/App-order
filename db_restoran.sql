-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2023 at 01:09 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_restoran`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_order`
--

CREATE TABLE `tb_detail_order` (
  `id_dorder` int(11) NOT NULL,
  `check_available` int(11) NOT NULL,
  `id_order` varchar(50) NOT NULL,
  `id_masakan` int(11) NOT NULL,
  `keterangan_dorder` text DEFAULT NULL,
  `jumlah_dorder` int(11) NOT NULL,
  `hartot_dorder` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status_dorder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_detail_order`
--

INSERT INTO `tb_detail_order` (`id_dorder`, `check_available`, `id_order`, `id_masakan`, `keterangan_dorder`, `jumlah_dorder`, `hartot_dorder`, `id_user`, `status_dorder`) VALUES
(64, 1, 'ORD0001', 12, 'pedes', 6, 150000, 8, 0),
(65, 1, 'ORD0001', 16, '', 1, 9000, 8, 0),
(69, 2, 'ORD0002', 31, '', 1, 26000, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_level`
--

CREATE TABLE `tb_level` (
  `id_level` int(11) NOT NULL,
  `level` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_level`
--

INSERT INTO `tb_level` (`id_level`, `level`) VALUES
(1, 'Administrator'),
(2, 'Waiter'),
(3, 'Kasir'),
(4, 'Owner'),
(5, 'Pelanggan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_masakan`
--

CREATE TABLE `tb_masakan` (
  `id_masakan` int(11) NOT NULL,
  `kategori_masakan` varchar(128) NOT NULL,
  `nama_masakan` varchar(128) NOT NULL,
  `harga_masakan` int(128) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status_masakan` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_masakan`
--

INSERT INTO `tb_masakan` (`id_masakan`, `kategori_masakan`, `nama_masakan`, `harga_masakan`, `foto`, `status_masakan`) VALUES
(28, 'Dessert', 'Brown Cupcakes', 12000, '30112023014329brown cupcakes.jpg', 1),
(31, 'Dessert', 'Caramel Puding', 26000, '30112023161621caramel puding.jpg', 1),
(38, 'NoCoffee', 'sweet Dream ', 21000, '02122023175453sweet dream .jpg', 1),
(39, 'NoCoffee', 'Strawberry Milkshake', 20000, '02122023211143strawberry milkshake.jpg', 1),
(40, 'NoCoffee', 'Blue Mojito', 20000, '02122023211207blue mojito.jpg', 1),
(41, 'NoCoffee', 'Peach Tea', 20000, '02122023211239peach tea.jpg', 1),
(42, 'NoCoffee', 'Blueberry Mojito', 20000, '02122023211413blueberry mojito.jpg', 1),
(43, 'NoCoffee', 'caramel ice cream', 20000, '02122023212050caramel ice cream.jpg', 1),
(44, 'NoCoffee', 'Ice Matcha Latte', 20000, '02122023212116Ice Matcha Latte.jpg', 1),
(45, 'NoCoffee', 'Sweet Bingsoo', 20000, '02122023212231Sweet Bingsoo.jpg', 1),
(46, 'Coffee', 'Ice Americano', 20000, '03122023201109ice americano.jpg', 1),
(47, 'Coffee', 'caramel machiato', 20000, '03122023201600caramel machiato.jpg', 0),
(48, 'Coffee', 'choco coffee', 20000, '03122023201613choco coffee.jpg', 1),
(49, 'Coffee', 'Dalgona Coffee', 20000, '03122023201625Dalgona Coffee.jpg', 1),
(50, 'Coffee', 'espresso', 20000, '03122023201816espresso.jpg', 1),
(51, 'Coffee', 'Milk Coffee ', 20000, '03122023201831Milk Coffee .jpg', 1),
(52, 'Dessert', 'Croffle', 20000, '03122023202112Croffle.jpg', 1),
(53, 'Dessert', 'glaze donuts', 20000, '03122023202128glaze donuts.jpg', 1),
(54, 'Dessert', 'macarons', 20000, '03122023202143macarons.jpg', 1),
(55, 'Dessert', 'rasberry choux', 20000, '03122023202202rasberry choux.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_meja`
--

CREATE TABLE `tb_meja` (
  `meja_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_meja`
--

INSERT INTO `tb_meja` (`meja_id`, `status`) VALUES
(1, 0),
(2, 0),
(3, 0),
(4, 0),
(5, 0),
(6, 0),
(7, 0),
(8, 0),
(9, 0),
(10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `id_order` varchar(50) NOT NULL,
  `meja_order` int(11) NOT NULL,
  `tanggal_order` int(11) NOT NULL,
  `aTanggal_order` varchar(128) NOT NULL,
  `id_user` int(11) NOT NULL,
  `keterangan_order` text DEFAULT NULL,
  `status_order` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`id_order`, `meja_order`, `tanggal_order`, `aTanggal_order`, `id_user`, `keterangan_order`, `status_order`) VALUES
('ORD0001', 1, 1591074127, '02-06-2020', 8, 'jangan lama', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_order` varchar(50) NOT NULL,
  `tanggal_transaksi` int(11) NOT NULL,
  `aTanggal_transaksi` varchar(50) NOT NULL,
  `hartot_transaksi` int(11) NOT NULL,
  `diskon_transaksi` int(11) NOT NULL,
  `totbar_transaksi` int(11) NOT NULL,
  `uang_transaksi` int(11) NOT NULL,
  `kembalian_transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_user`, `id_order`, `tanggal_transaksi`, `aTanggal_transaksi`, `hartot_transaksi`, `diskon_transaksi`, `totbar_transaksi`, `uang_transaksi`, `kembalian_transaksi`) VALUES
(26, 8, 'ORD0001', 1591074220, '02-06-2020', 159000, 50, 79500, 100000, 20500);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `nama_user` varchar(128) NOT NULL,
  `id_level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `nama_user`, `id_level`) VALUES
(1, 'doni', '123', 'Reva Doni Aprilio', 1),
(7, 'pinu', '123', 'M. Finuary Renggalih', 4),
(25, 'anna', '123', 'Nabila', 3),
(26, 'Faiz', '123', 'Dyaka Faiz', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_detail_order`
--
ALTER TABLE `tb_detail_order`
  ADD PRIMARY KEY (`id_dorder`);

--
-- Indexes for table `tb_level`
--
ALTER TABLE `tb_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `tb_masakan`
--
ALTER TABLE `tb_masakan`
  ADD PRIMARY KEY (`id_masakan`);

--
-- Indexes for table `tb_meja`
--
ALTER TABLE `tb_meja`
  ADD PRIMARY KEY (`meja_id`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_level` (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_detail_order`
--
ALTER TABLE `tb_detail_order`
  MODIFY `id_dorder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `tb_level`
--
ALTER TABLE `tb_level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_masakan`
--
ALTER TABLE `tb_masakan`
  MODIFY `id_masakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `tb_meja`
--
ALTER TABLE `tb_meja`
  MODIFY `meja_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
