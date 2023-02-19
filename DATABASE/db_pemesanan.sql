-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2022 at 06:44 PM
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
-- Database: `db_pemesanan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_admin` varchar(30) NOT NULL,
  `no_telp_admin` int(11) NOT NULL,
  `alamat_admin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `id_user`, `nama_admin`, `no_telp_admin`, `alamat_admin`) VALUES
(5, 22, 'Andri', 8123123, 'Bekasi');

-- --------------------------------------------------------

--
-- Table structure for table `kitchen_set`
--

CREATE TABLE `kitchen_set` (
  `id_kitchen` int(11) NOT NULL,
  `nama_kitchen` varchar(1000) NOT NULL,
  `kategori_kitchen` varchar(30) NOT NULL,
  `foto_kitchen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kitchen_set`
--

INSERT INTO `kitchen_set` (`id_kitchen`, `nama_kitchen`, `kategori_kitchen`, `foto_kitchen`) VALUES
(21, 'Kitchen set minimalis', 'Minimalis', '3773f1dcbe2d8c847ba3359675e5aff4-5.PNG'),
(22, 'Kitchen set minimalis 2', 'Minimalis', '799d6593cd9b80da1bed5295104d0503-Capture2.PNG'),
(23, 'Kitchen set bentuk L', 'Bentuk L', '2c5402f71adcd4e6cd86d367a455de83-7.PNG'),
(24, 'Kitchen Set Bentuk L 2', 'Bentuk L', '14543d0e30c0d6d358ff76cdb3598476-5.PNG'),
(25, 'Kitchen set bentuk L 3', 'Bentuk L', '4c075ad8f019a2c224546f6d61eaa63d-2021-02-28.jpg'),
(40, 'Minimalis 3', 'Minimalis', 'b39b77e29ce439e44c5cb94dac44a54d-2c5402f71adcd4e6cd86d367a455de83-7.PNG'),
(41, 'Minimalis 4', 'Minimalis', '8f1de200684a6e5d8f12c0f3b62ceddb-2c5402f71adcd4e6cd86d367a455de83-7.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_pelanggan` varchar(30) NOT NULL,
  `no_telp_pelanggan` int(11) NOT NULL,
  `alamat_pelanggan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `id_user`, `nama_pelanggan`, `no_telp_pelanggan`, `alamat_pelanggan`) VALUES
(11, 23, 'Manah', 812, 'Jakarta'),
(12, 24, 'Harsana', 213, 'Jakarta selatan'),
(13, 25, 'Drajat', 83, 'Bekasi'),
(14, 26, 'Vivi', 8123, 'Tanggerang'),
(15, 27, 'Gangsa', 832, 'Jakarta'),
(16, 28, 'Tes', 123333, 'Bekasi'),
(17, 29, 'Tes2', 92923, 'Bkz'),
(18, 30, 'Tes ke 4', 81231234, 'Bekasi Timur');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `no_rek_tujuan` int(30) NOT NULL,
  `transfer_atas_nama` varchar(100) NOT NULL,
  `atas_nama` varchar(100) NOT NULL,
  `no_telp` int(30) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `nominal` int(30) NOT NULL,
  `bukti_tranfer` varchar(1000) NOT NULL,
  `konfirmasi_pembayaran` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  `tgl_pembayaran` varchar(30) NOT NULL,
  `tgl_selesai` varchar(30) NOT NULL,
  `tgl_sampai` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pemesanan`, `no_rek_tujuan`, `transfer_atas_nama`, `atas_nama`, `no_telp`, `alamat`, `nominal`, `bukti_tranfer`, `konfirmasi_pembayaran`, `status`, `tgl_pembayaran`, `tgl_selesai`, `tgl_sampai`) VALUES
(65, 74, 123456789, '3456789', 'Manah', 812, 'Jakarta', 500000, '4ff12add120e976f3d826a4c797260f7-02e0f0366ba52e98f4ab501845b55687-3e6662665435c4a9bf93111de06b7a3d-Contoh.jpg', 'Selesai', 'Sampai', '2022-07-30', '2022-08-02', '2022-08-04'),
(66, 75, 123456789, '34567', 'Harsana', 213, 'Jakarta selatan', 300000, '33ee74f5374313b191a67e08dfe0220a-02e0f0366ba52e98f4ab501845b55687-3e6662665435c4a9bf93111de06b7a3d-Contoh.jpg', 'Selesai', 'Sampai', '2022-07-30', '2022-08-04', '2022-08-06'),
(67, 76, 123456789, '3456789', 'Drajat', 83, 'Bekasi', 700000, '77a11fcf40b0670d2f7aa7e53419dd2a-02e0f0366ba52e98f4ab501845b55687-3e6662665435c4a9bf93111de06b7a3d-Contoh.jpg', 'Selesai', 'Sampai', '2022-07-30', '2022-08-06', '2022-08-08'),
(68, 77, 123456789, '3456789', 'Drajat', 83, 'Bekasi', 30000, 'a52c4e06f70e3ba4ca66aad4685780d6-02e0f0366ba52e98f4ab501845b55687-3e6662665435c4a9bf93111de06b7a3d-Contoh.jpg', 'Selesai', 'Sampai', '2022-07-30', '2022-08-02', '2022-08-04'),
(69, 78, 123456789, '3456789', 'Vivi', 8123, 'Tanggerang', 30000, '06a002042d8c9e6ef4c3cf2aa2ac5433-02e0f0366ba52e98f4ab501845b55687-3e6662665435c4a9bf93111de06b7a3d-Contoh.jpg', 'Selesai', 'Sampai', '2022-07-30', '2022-08-04', '2022-08-06'),
(70, 79, 123456789, '3456789', 'Gangsa', 832, 'Jakarta', 50000, 'aaef27cbcc13aaa9bd5b6a306622de54-02e0f0366ba52e98f4ab501845b55687-3e6662665435c4a9bf93111de06b7a3d-Contoh.jpg', 'Selesai', 'Sampai', '2022-07-30', '2022-08-02', '2022-08-04'),
(71, 80, 123456789, '12345', 'Manah', 812, 'Jakarta', 900000, 'f495b2b7db53309c2e50ba342847d22b-02e0f0366ba52e98f4ab501845b55687-3e6662665435c4a9bf93111de06b7a3d-Contoh.jpg', 'Selesai', 'Sampai', '2022-08-02', '2022-08-05', '2022-08-07'),
(72, 81, 123456789, '12345', 'Manah', 812, 'Jakarta', 200000, '0a84c0b4ab61156682bbc504af10786d-02e0f0366ba52e98f4ab501845b55687-3e6662665435c4a9bf93111de06b7a3d-Contoh.jpg', 'Selesai', 'Sampai', '2022-08-02', '2022-08-07', '2022-08-09'),
(73, 82, 123456789, '12345', 'Manah', 812, 'Jakarta', 300000, '43b39f990e5f1dc6186336adae5672d4-0a84c0b4ab61156682bbc504af10786d-02e0f0366ba52e98f4ab501845b55687-3e6662665435c4a9bf93111de06b7a3d-Contoh.jpg', 'Selesai', 'Sampai', '2022-08-04', '2022-08-07', '2022-08-09'),
(74, 83, 123456789, '12345', 'Manah', 812, 'Jakarta', 70000, 'faeda08529fc3a1d958b01e64d176251-0a84c0b4ab61156682bbc504af10786d-02e0f0366ba52e98f4ab501845b55687-3e6662665435c4a9bf93111de06b7a3d-Contoh.jpg', 'Selesai', 'Sampai', '2022-08-04', '2022-08-07', '2022-08-09'),
(75, 84, 123456789, '12345', 'Manah', 812, 'Jakarta', 90000, 'd77035c730810a1685dba4b6d043390a-0a84c0b4ab61156682bbc504af10786d-02e0f0366ba52e98f4ab501845b55687-3e6662665435c4a9bf93111de06b7a3d-Contoh.jpg', 'Selesai', 'Sampai', '2022-08-04', '2022-08-07', '2022-08-09'),
(76, 85, 123456789, '232323', 'Harsana', 213, 'Jakarta selatan', 500000, '71e266653ccde93bbbcab36507da7901-0a84c0b4ab61156682bbc504af10786d-02e0f0366ba52e98f4ab501845b55687-3e6662665435c4a9bf93111de06b7a3d-Contoh.jpg', 'Selesai', 'Sampai', '2022-08-05', '2022-08-08', '2022-08-10'),
(77, 86, 123456789, '12345', 'Harsana', 213, 'Jakarta selatan', 300000, '242b54db1c12aeac00d55ab36851cb23-0a84c0b4ab61156682bbc504af10786d-02e0f0366ba52e98f4ab501845b55687-3e6662665435c4a9bf93111de06b7a3d-Contoh.jpg', 'Selesai', 'Sampai', '2022-08-05', '2022-08-10', '2022-08-12'),
(78, 87, 123456789, 'Rekening atas nama Andri', 'Drajat', 83, 'Bekasi', 300000, '5ffb6259b4a7a22b5d1476258698c11e-0a84c0b4ab61156682bbc504af10786d-02e0f0366ba52e98f4ab501845b55687-3e6662665435c4a9bf93111de06b7a3d-Contoh.jpg', 'Selesai', 'Sampai', '2022-08-13', '2022-08-16', '2022-08-18'),
(79, 88, 123456789, 'Andriansyah', 'Drajat', 83, 'Bekasi', 500000, '795b8b46c7cd97ea88c8b2cba04df1fb-0a84c0b4ab61156682bbc504af10786d-02e0f0366ba52e98f4ab501845b55687-3e6662665435c4a9bf93111de06b7a3d-Contoh.jpg', 'Selesai', 'Sampai', '2022-08-13', '2022-08-16', '2022-08-18'),
(80, 89, 123456789, 'Drajat', 'Drajat', 83, 'Bekasi', 300000, '01572c11af8faa867e9865dfb864ac43-0a84c0b4ab61156682bbc504af10786d-02e0f0366ba52e98f4ab501845b55687-3e6662665435c4a9bf93111de06b7a3d-Contoh.jpg', 'Selesai', 'Sampai', '2022-08-15', '2022-08-18', '2022-08-20'),
(81, 90, 123456789, 'Andriansyah', 'Drajat', 83, 'Bekasi', 300000, '06052e19b370737ae6b838a048f72092-Contoh.jpg', 'Selesai', 'Sampai', '2022-08-23', '2022-08-26', '2022-08-28'),
(82, 91, 123456789, '', 'Drajat', 83, 'Bekasi', 300000, '', '', 'Pendding', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `id_kitchen` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `qty` int(30) NOT NULL,
  `bahan` varchar(30) NOT NULL,
  `warna` varchar(30) NOT NULL,
  `ukuran_kitchen_set` varchar(100) NOT NULL,
  `survey` varchar(30) NOT NULL,
  `rincian_pemesanan` varchar(100) NOT NULL,
  `konfirmasi_pemesanan` varchar(30) NOT NULL,
  `harga_pemesanan` int(30) NOT NULL,
  `proses` int(11) NOT NULL,
  `pengiriman` int(11) NOT NULL,
  `tgl_pemesanan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `id_kitchen`, `id_pelanggan`, `qty`, `bahan`, `warna`, `ukuran_kitchen_set`, `survey`, `rincian_pemesanan`, `konfirmasi_pemesanan`, `harga_pemesanan`, `proses`, `pengiriman`, `tgl_pemesanan`) VALUES
(74, 24, 11, 0, 'Kayu', 'Ungu', '2x2', 'Ya', 'Tambahan lampu LED', 'Selesai', 500000, 3, 2, '2022-07-30'),
(75, 25, 12, 0, 'Kayu', 'Putih', '2x2', 'Ya', 'Tambah piring 30', 'Selesai', 300000, 5, 2, '2022-07-30'),
(76, 23, 13, 0, 'Kayu', 'Biru', '4x4', 'Ya', 'Tambah LED', 'Selesai', 700000, 7, 2, '2022-07-30'),
(77, 24, 13, 0, 'Kayu', 'Putih', '3x3', 'Ya', 'Tambah LED', 'Selesai', 30000, 3, 2, '2022-07-30'),
(78, 25, 14, 0, 'Kaca', 'Biru', '4x4', 'Ya', 'Tambah sendok 30', 'Selesai', 30000, 5, 2, '2022-07-30'),
(79, 23, 15, 0, 'Keramik', 'Green', '2x2', 'Ya', 'Tambah garpu 30', 'Selesai', 50000, 3, 2, '2022-07-30'),
(80, 22, 11, 0, 'Kayu', 'Putih', '3x3', 'Ya', 'Tambahkan LED', 'Selesai', 900000, 3, 2, '2022-08-02'),
(81, 21, 11, 0, 'Besi', 'Navy', '5x5', 'Ya', 'Tambah Piring 30', 'Selesai', 200000, 5, 2, '2022-08-02'),
(82, 21, 11, 0, 'Kayu', 'Putih', '3x3', 'Ya', 'Rincian', 'Selesai', 300000, 3, 2, '2022-08-04'),
(83, 40, 11, 0, 'Kayu', 'Putih', '3x3', 'Ya', 'Rincian', 'Selesai', 70000, 3, 2, '2022-08-04'),
(84, 41, 11, 0, 'Kayu', 'Putih', '5x5', 'Ya', 'Rinci', 'Selesai', 90000, 3, 2, '2022-08-04'),
(85, 24, 12, 0, 'Kayu', 'Biru', '2x2', 'Ya', 'Tambah LED', 'Selesai', 500000, 3, 2, '2022-08-05'),
(86, 21, 12, 0, 'Alumunium', 'Putih', '2x1', 'Ya', 'Tambah LED', 'Selesai', 300000, 5, 2, '2022-08-05'),
(87, 21, 13, 0, 'Kayu', 'Biru', '2x2', 'Ya', 'Ditambah LED', 'Selesai', 300000, 3, 2, '2022-08-13'),
(88, 22, 13, 0, 'Keramik', 'Putih', '4x4', 'Ya', 'Tambah Piring 30', 'Selesai', 500000, 3, 2, '2022-08-13'),
(89, 22, 13, 0, 'Kayu', 'Green', '2x2', 'Ya', 'Tambah Sendok 30', 'Selesai', 300000, 3, 2, '2022-08-13'),
(90, 25, 13, 0, 'Kayu', 'Biru', '2x2', 'Ya', 'Tambah LED', 'Selesai', 300000, 3, 2, '2022-08-23'),
(91, 24, 13, 0, 'Kayu', 'Biru', '2x2', 'Ya', 'LED', 'Ya', 300000, 3, 2, '2022-08-23');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rating`
--

CREATE TABLE `tb_rating` (
  `id_rating` int(11) NOT NULL,
  `id_kitchen` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_rating`
--

INSERT INTO `tb_rating` (`id_rating`, `id_kitchen`, `id_pelanggan`, `rating`) VALUES
(1134, 24, 11, 5),
(1135, 23, 11, 0),
(1136, 25, 11, 0),
(1137, 25, 12, 3),
(1138, 23, 12, 0),
(1139, 24, 12, 3),
(1140, 23, 13, 1),
(1141, 24, 13, 3),
(1142, 25, 13, 3),
(1143, 25, 14, 1),
(1144, 23, 14, 0),
(1145, 24, 14, 0),
(1146, 23, 15, 1),
(1147, 24, 15, 0),
(1148, 25, 15, 0),
(1149, 22, 11, 2),
(1150, 21, 11, 2),
(1151, 40, 11, 3),
(1152, 41, 11, 3),
(1153, 21, 18, 0),
(1154, 22, 18, 0),
(1155, 40, 18, 0),
(1156, 41, 18, 0),
(1157, 21, 12, 3),
(1158, 22, 12, 0),
(1159, 40, 12, 0),
(1160, 41, 12, 0),
(1161, 21, 13, 3),
(1162, 22, 13, 3),
(1163, 40, 13, 0),
(1164, 41, 13, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `hak_akses` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `hak_akses`) VALUES
(22, 'andri2', 'pass', 'admin'),
(23, 'manah', '123', 'pelanggan'),
(24, 'harsana', '123', 'pelanggan'),
(25, 'drajat', '123', 'pelanggan'),
(26, 'vivi', '123', 'pelanggan'),
(27, 'gangsa', '123', 'pelanggan'),
(28, 'tes', '123', 'pelanggan'),
(29, 'tes2', '123', 'pelanggan'),
(30, 'tes4', '123', 'pelanggan'),
(31, 'pemilik', '123', 'pemilik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `kitchen_set`
--
ALTER TABLE `kitchen_set`
  ADD PRIMARY KEY (`id_kitchen`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_pemesanan` (`id_pemesanan`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `id_kitchen` (`id_kitchen`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `tb_rating`
--
ALTER TABLE `tb_rating`
  ADD PRIMARY KEY (`id_rating`),
  ADD KEY `id_kitchen` (`id_kitchen`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kitchen_set`
--
ALTER TABLE `kitchen_set`
  MODIFY `id_kitchen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `tb_rating`
--
ALTER TABLE `tb_rating`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1165;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `pelanggan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id_pemesanan`);

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`id_kitchen`) REFERENCES `kitchen_set` (`id_kitchen`),
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`);

--
-- Constraints for table `tb_rating`
--
ALTER TABLE `tb_rating`
  ADD CONSTRAINT `tb_rating_ibfk_1` FOREIGN KEY (`id_kitchen`) REFERENCES `kitchen_set` (`id_kitchen`),
  ADD CONSTRAINT `tb_rating_ibfk_2` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
