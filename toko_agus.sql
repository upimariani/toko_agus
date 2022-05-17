-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2022 at 02:17 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_agus`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(2, 'Sabun'),
(3, 'Minuman'),
(4, 'Sembako');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `kode_produk` varchar(10) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga_produk` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `id_supplier`, `kode_produk`, `nama_produk`, `harga_produk`) VALUES
(1, 4, 1, 'A01b', 'Beras', '10000'),
(2, 4, 2, '0MYK', 'Minyak', '17000');

-- --------------------------------------------------------

--
-- Table structure for table `produk_keluar`
--

CREATE TABLE `produk_keluar` (
  `id_produk_keluar` int(11) NOT NULL,
  `id_produk_masuk` int(11) NOT NULL,
  `qty_kel` varchar(20) NOT NULL,
  `tgl_keluar` varchar(20) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk_keluar`
--

INSERT INTO `produk_keluar` (`id_produk_keluar`, `id_produk_masuk`, `qty_kel`, `tgl_keluar`, `time`) VALUES
(1, 1, '30', '04/07/2022', '2022-04-07 01:06:53'),
(2, 1, '5', '04/06/2022', '2022-04-07 01:28:13'),
(3, 3, '5', '04/06/2022', '2022-04-07 01:28:32'),
(4, 1, '11', '04/07/2022', '2022-04-07 05:34:54'),
(5, 1, '1', '04/29/2022', '2022-04-14 09:25:00'),
(6, 1, '1', '2022-04-15', '2022-04-14 09:27:13');

-- --------------------------------------------------------

--
-- Table structure for table `produk_masuk`
--

CREATE TABLE `produk_masuk` (
  `id_produk_masuk` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `qty` varchar(20) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `tgl_masuk` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk_masuk`
--

INSERT INTO `produk_masuk` (`id_produk_masuk`, `id_produk`, `qty`, `create_time`, `tgl_masuk`) VALUES
(1, 2, '2', '2022-04-07 01:06:14', '04/07/2022 8:06'),
(3, 1, '32', '2022-04-07 01:27:40', '04/07/2022 8:27');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `nama_toko` varchar(50) NOT NULL,
  `alamat` varchar(125) NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `nama_toko`, `alamat`, `no_hp`) VALUES
(1, 'Rudi Ahmad', 'Berkah Jaya', 'Ciawigebang', '085475236598'),
(2, 'Rahmat Hidayat', 'Sumber Waras', 'Longkewang', '085456987523');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `alamat`, `no_hp`, `username`, `password`, `level_user`) VALUES
(12, 'Agus Permana', 'Kuningan Jawa Barat', '086765456762', 'pemilik', 'pemilik', 2),
(13, 'Dani Maulana', 'Gunungkeling, Kuningan Jawa Barat', '089123435433', 'admin', 'admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `produk_keluar`
--
ALTER TABLE `produk_keluar`
  ADD PRIMARY KEY (`id_produk_keluar`);

--
-- Indexes for table `produk_masuk`
--
ALTER TABLE `produk_masuk`
  ADD PRIMARY KEY (`id_produk_masuk`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produk_keluar`
--
ALTER TABLE `produk_keluar`
  MODIFY `id_produk_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `produk_masuk`
--
ALTER TABLE `produk_masuk`
  MODIFY `id_produk_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
