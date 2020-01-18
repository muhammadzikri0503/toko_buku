-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 18 Jan 2020 pada 08.31
-- Versi Server: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_buku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `judul` varchar(80) NOT NULL,
  `noisbn` varchar(20) NOT NULL,
  `penulis` varchar(60) NOT NULL,
  `penerbit` varchar(60) NOT NULL,
  `tahun` year(4) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga_pokok` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `ppn` int(11) NOT NULL,
  `diskon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `judul`, `noisbn`, `penulis`, `penerbit`, `tahun`, `stok`, `harga_pokok`, `harga_jual`, `ppn`, `diskon`) VALUES
(5, 'Kancil yang bijak', '323232', 'Muhammad Zikri', 'Erlangga', 2010, 10, 67000, 70000, 7000, 10000),
(6, 'Kisah 25 Nabi dan Rasul', '04523424', 'Muhammad Zikri', 'Erlangga', 2019, 0, 50000, 50000, 5000, 5000),
(7, 'Web Proggramming', '243563', 'Muhammad Zikri', 'Erlangga', 2000, 0, 82800, 78000, 7800, 3000),
(8, 'CodeIgniter', '2343546', 'Muhammad Zikri', 'Erlangga', 2010, 0, 50000, 50000, 5000, 5000),
(9, 'Matematika', '24354657', 'Muhammad Zikri', 'Erlangga', 2015, 0, 61000, 60000, 6000, 5000),
(10, 'Bahasa Jepang', '4456656453', 'Muhammad Zikri', 'Erlangga', 2017, 0, 89000, 90000, 9000, 10000),
(11, 'PBO', '24354654', 'Muhammad Zikri', 'Erlangga', 2000, 0, 54000, 50000, 5000, 1000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `distributor`
--

CREATE TABLE `distributor` (
  `id_distributor` int(11) NOT NULL,
  `nama_distributor` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `distributor`
--

INSERT INTO `distributor` (`id_distributor`, `nama_distributor`, `alamat`, `telepon`) VALUES
(2, 'Distributor', 'Bukittinggi', '081234567890'),
(3, 'Ibra', 'Payakumbuh', '085263307063'),
(4, 'Zikri', 'Sungai durian', '085263307063'),
(5, 'Distributor2', 'dds', '56787'),
(6, 'Distributor3', 'sasa', '324354676'),
(7, 'dsd', 'dsds', '4343');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jual`
--

CREATE TABLE `jual` (
  `id_jual` varchar(10) NOT NULL,
  `total` varchar(50) NOT NULL,
  `uang` varchar(50) NOT NULL,
  `kembali` varchar(50) NOT NULL,
  `id_kasir` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jual`
--

INSERT INTO `jual` (`id_jual`, `total`, `uang`, `kembali`, `id_kasir`, `tanggal`) VALUES
('PJN0001', '451000', '500000', '49000', 10, '2019-12-22'),
('PJN0002', '1024000', '2000000', '976000', 10, '2019-12-22'),
('PJN0003', '2000000', '2000000', '0', 10, '2019-12-27'),
('PJN0005', '50000', '60000', '10000', 10, '2019-12-29'),
('PJN0006', '200000', '500000', '300000', 10, '2019-12-29'),
('PJN0007', '1830000', '2000000', '170000', 10, '2019-12-29'),
('PJN0008', '540000', '1000000', '460000', 10, '2019-12-29'),
('PJN0009', '1335000', '1500000', '165000', 10, '2019-12-29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kasir`
--

CREATE TABLE `kasir` (
  `id_kasir` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `status` enum('aktif','nonaktif') NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `akses` enum('admin','kasir') NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kasir`
--

INSERT INTO `kasir` (`id_kasir`, `nama`, `alamat`, `telepon`, `status`, `username`, `password`, `akses`, `foto`) VALUES
(1, 'Muhammad Zikri', 'Payakumbuh, Sungai durian', '085263307063', 'aktif', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'css.png'),
(10, 'Muhammad Ibra', 'Payakumbuh', '085263307063', 'aktif', 'kasir', 'c7911af3adbd12a035b289556d96470a', 'kasir', 'varun.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id_kasir` int(11) NOT NULL,
  `jumlah` varchar(40) NOT NULL,
  `jumlah_harga` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasok`
--

CREATE TABLE `pasok` (
  `id_pasok` int(11) NOT NULL,
  `id_distributor` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pasok`
--

INSERT INTO `pasok` (`id_pasok`, `id_distributor`, `id_buku`, `jumlah`, `tanggal`) VALUES
(4, 2, 5, 5, '16-12-2019'),
(5, 3, 6, 10, '16-12-2019'),
(7, 2, 6, 70, '16-12-2019'),
(8, 3, 6, 10, '16-12-2019'),
(9, 4, 5, 15, '16-12-2019'),
(10, 3, 6, 10, '16-12-2019'),
(11, 4, 5, 10, '29-12-2019');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `jumlah_harga` varchar(40) NOT NULL,
  `id_jual` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_buku`, `jumlah`, `jumlah_harga`, `id_jual`) VALUES
(29, 5, 3, '201000', 'PJN0001'),
(30, 6, 5, '250000', 'PJN0001'),
(32, 9, 10, '610000', 'PJN0002'),
(33, 7, 5, '414000', 'PJN0002'),
(34, 6, 40, '2000000', 'PJN0003'),
(36, 8, 1, '50000', 'PJN0005'),
(37, 8, 4, '200000', 'PJN0006'),
(38, 9, 30, '1830000', 'PJN0007'),
(39, 11, 10, '540000', 'PJN0008'),
(40, 10, 15, '1335000', 'PJN0009');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `distributor`
--
ALTER TABLE `distributor`
  ADD PRIMARY KEY (`id_distributor`);

--
-- Indexes for table `jual`
--
ALTER TABLE `jual`
  ADD PRIMARY KEY (`id_jual`),
  ADD KEY `id_kasir` (`id_kasir`);

--
-- Indexes for table `kasir`
--
ALTER TABLE `kasir`
  ADD PRIMARY KEY (`id_kasir`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `id_kasir` (`id_kasir`);

--
-- Indexes for table `pasok`
--
ALTER TABLE `pasok`
  ADD PRIMARY KEY (`id_pasok`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `id_distributor` (`id_distributor`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `id_jual` (`id_jual`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `distributor`
--
ALTER TABLE `distributor`
  MODIFY `id_distributor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kasir`
--
ALTER TABLE `kasir`
  MODIFY `id_kasir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pasok`
--
ALTER TABLE `pasok`
  MODIFY `id_pasok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pasok`
--
ALTER TABLE `pasok`
  ADD CONSTRAINT `pasok_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`),
  ADD CONSTRAINT `pasok_ibfk_2` FOREIGN KEY (`id_distributor`) REFERENCES `distributor` (`id_distributor`);

--
-- Ketidakleluasaan untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
