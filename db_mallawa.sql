-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 23 Feb 2025 pada 07.08
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mallawa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `document`
--

CREATE TABLE `document` (
  `id_document` int(11) NOT NULL,
  `nmr_surat` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `kategory` varchar(50) NOT NULL,
  `pengirim` varchar(50) NOT NULL,
  `penerima` varchar(50) NOT NULL,
  `document` varchar(100) NOT NULL,
  `status` varchar(35) NOT NULL,
  `reason` varchar(200) NOT NULL DEFAULT 'Belum Verifikasi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `document`
--

INSERT INTO `document` (`id_document`, `nmr_surat`, `date`, `jenis`, `kategory`, `pengirim`, `penerima`, `document`, `status`, `reason`) VALUES
(20, 'fsaf', '2025-02-23', 'masuk', 'Undangan', 'asd', 'vasd', '67ba11a407ff63.76078944.pdf', 'Terverifikasi', 'DiVerifikasi'),
(21, 'fsa', '2025-02-24', 'masuk', 'Laporan', 'sad', 'asd', '67ba123ed0d3b7.73593063.pdf', 'Menunggu Verifikasi', 'Belum Verifikasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `name_user` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `role` varchar(10) NOT NULL,
  `position` varchar(50) NOT NULL,
  `picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `name_user`, `email`, `address`, `role`, `position`, `picture`) VALUES
(10, 'ahmadrendi', '$2y$10$9RKKiwVA7Qx25ISJjDlo1uiDYQQu0dwlQDpV2CXOVskgobCWi8pb6', 'Ahmad Rendi', '13020210048@gmail.com', 'Jl. Urip Sumoharjo No.km.5, Panaikang, Kec. Panakkukang, Kota Makassar, Sulawesi Selatan 90231', 'KASI', 'Admi', 'image.png'),
(11, 'rendi', '$2y$10$O7QxnoK5QZaUoZvz99nxsOWPcBDjY.3oqRbqE1LHKc9Hq10peAGP2', 'Rendi', '13020210047@gmail.com', 'Makassar', 'ADMIN', 'ADMIN', 'image.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id_document`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `document`
--
ALTER TABLE `document`
  MODIFY `id_document` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
