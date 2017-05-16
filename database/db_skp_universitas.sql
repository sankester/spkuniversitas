-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 16 Mei 2017 pada 16.17
-- Versi Server: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_skp_universitas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `kdKriteria` int(11) NOT NULL,
  `kriteria` varchar(100) NOT NULL,
  `sifat` char(1) NOT NULL,
  `bobot` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`kdKriteria`, `kriteria`, `sifat`, `bobot`) VALUES
(3, 'Fasilitas', 'B', 4),
(5, 'Biaya', 'C', 5),
(6, 'Dosen', 'B', 5),
(7, 'Prestasi', 'B', 4),
(8, 'Akreditasi', 'B', 3),
(9, 'Relasi', 'B', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `kdUniversitas` int(11) NOT NULL,
  `kdKriteria` int(11) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`kdUniversitas`, `kdKriteria`, `nilai`) VALUES
(4, 3, 5),
(4, 5, 4),
(4, 6, 4),
(4, 7, 3),
(4, 8, 4),
(4, 9, 5),
(5, 3, 3),
(5, 5, 3),
(5, 6, 5),
(5, 7, 4),
(5, 8, 5),
(5, 9, 3),
(6, 3, 4),
(6, 5, 2),
(6, 6, 3),
(6, 7, 3),
(6, 8, 4),
(6, 9, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `subkriteria`
--

CREATE TABLE `subkriteria` (
  `kdSubKriteria` int(11) NOT NULL,
  `subKriteria` varchar(50) NOT NULL,
  `value` int(11) NOT NULL,
  `kdKriteria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `subkriteria`
--

INSERT INTO `subkriteria` (`kdSubKriteria`, `subKriteria`, `value`, `kdKriteria`) VALUES
(1, 'tidak memadai', 1, 3),
(2, 'kurang memadai', 2, 3),
(3, 'cukup memadai', 3, 3),
(4, 'memadai', 4, 3),
(5, 'sangat memadai', 5, 3),
(11, 'sangat mahal', 1, 5),
(12, 'mahal', 2, 5),
(13, 'sedang', 3, 5),
(14, 'murah', 4, 5),
(15, 'sangat murah', 5, 5),
(16, 'tidak kompeten', 1, 6),
(17, 'kurang kompeten', 2, 6),
(18, 'cukup kompeten', 3, 6),
(19, 'kompeten', 4, 6),
(20, 'sangat kompeten', 5, 6),
(21, 'tidak unggul', 1, 7),
(22, 'kurang unggul', 2, 7),
(23, 'cukup unggul', 3, 7),
(24, 'unggul', 4, 7),
(25, 'sangat unggul', 5, 7),
(26, 'sangat rendah', 1, 8),
(27, 'rendah', 2, 8),
(28, 'cukup', 3, 8),
(29, 'tinggi', 4, 8),
(30, 'sangat tinggi', 5, 8),
(31, 'tidak ada', 1, 9),
(32, 'kurang menunjang', 2, 9),
(33, 'cukup menunjang', 3, 9),
(34, 'menunjang', 4, 9),
(35, 'sangat menunjang', 5, 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `universitas`
--

CREATE TABLE `universitas` (
  `kdUniversitas` int(11) NOT NULL,
  `universitas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `universitas`
--

INSERT INTO `universitas` (`kdUniversitas`, `universitas`) VALUES
(4, 'univ A'),
(5, 'univ B'),
(6, 'univ C');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`kdKriteria`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD UNIQUE KEY `indexNilai` (`kdUniversitas`,`kdKriteria`) USING BTREE,
  ADD KEY `kdKriteria` (`kdKriteria`);

--
-- Indexes for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD PRIMARY KEY (`kdSubKriteria`),
  ADD KEY `kdKriteria` (`kdKriteria`);

--
-- Indexes for table `universitas`
--
ALTER TABLE `universitas`
  ADD PRIMARY KEY (`kdUniversitas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `kdKriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `subkriteria`
--
ALTER TABLE `subkriteria`
  MODIFY `kdSubKriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `universitas`
--
ALTER TABLE `universitas`
  MODIFY `kdUniversitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`kdUniversitas`) REFERENCES `universitas` (`kdUniversitas`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`kdKriteria`) REFERENCES `kriteria` (`kdKriteria`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD CONSTRAINT `subkriteria_ibfk_1` FOREIGN KEY (`kdKriteria`) REFERENCES `kriteria` (`kdKriteria`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
