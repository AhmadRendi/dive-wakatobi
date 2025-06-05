-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 05, 2025 at 11:21 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_dive_trip`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_guide`
--

CREATE TABLE `tbl_guide` (
  `id` int(11) NOT NULL,
  `guideName` varchar(100) NOT NULL,
  `guideRating` varchar(10) DEFAULT NULL,
  `guideBio` text DEFAULT NULL,
  `picture` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_guide`
--

INSERT INTO `tbl_guide` (`id`, `guideName`, `guideRating`, `guideBio`, `picture`) VALUES
(1, 'Guide 1', '4.5', 'Penyelam berpengalaman dengan lebih dari 10 tahun pengalaman di industri penyelaman, ahli dalam snorkeling dan scuba diving.', '0'),
(2, 'Guide 2', '4.6', 'Instruktur menyelam bersertifikat dengan pengalaman internasional, spesialis dalam pelatihan scuba diving dan penyelaman mendalam.', 'alfian.jpeg'),
(3, 'Guide 3', '4.8', 'Pemandu wisata laut yang berpengalaman, ahli dalam ekosistem laut dan teknik snorkeling serta scuba diving.', 'Aci.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_keahlian`
--

CREATE TABLE `tbl_keahlian` (
  `id` int(11) NOT NULL,
  `namaKeahlian` varchar(100) NOT NULL,
  `keahlian` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_keahlian`
--

INSERT INTO `tbl_keahlian` (`id`, `namaKeahlian`, `keahlian`) VALUES
(1, 'Snorkeling', 'Kemampuan melakukan snorkeling dengan teknik yang benar dan aman. Menguasai area perairan dangkal dan memahami ekosistem laut.'),
(2, 'Scuba Diving', 'Kemampuan melakukan scuba diving dengan sertifikasi internasional. Spesialis dalam penyelaman mendalam dan pengenalan terhadap peralatan selam.'),
(3, 'Kursus Menyelam', 'Instruktur Diving bersertifikasi dengan pengalaman dalam pelatihan dan kursus menyelam. Mampu memberikan pelatihan teori dan praktik secara efektif.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_paket`
--

CREATE TABLE `tbl_paket` (
  `id` int(11) NOT NULL,
  `namaPaket` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(11) NOT NULL,
  `picture` varchar(200) DEFAULT NULL,
  `paket` varchar(50) DEFAULT NULL,
  `waktu` time DEFAULT NULL,
  `lokasi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_paket`
--

INSERT INTO `tbl_paket` (`id`, `namaPaket`, `deskripsi`, `harga`, `picture`, `paket`, `waktu`, `lokasi`) VALUES
(1, 'Paket A', ' Paket A adalah', 4000000, '67ffa877384789.15529437.jpeg', 'PENYELAM', '07:00:00', 'Wangi-Wangi'),
(4, 'Paket A', ' paket A', 5000000, '67ffce8c085a51.97727307.jpeg', 'KURSUS', '07:00:00', 'Binongko'),
(6, 'Paket B', ' Paket B adalah', 5000000, '680c7a02526d80.40381775.jpeg', 'PENYELAM', '07:00:00', 'Binongko');

--
-- Triggers `tbl_paket`
--
DELIMITER $$
CREATE TRIGGER `before_insert_paket` BEFORE INSERT ON `tbl_paket` FOR EACH ROW BEGIN
    DECLARE count_existing INT;

    -- Cek apakah kombinasi lokasi dan waktu sudah ada
    SELECT COUNT(*) INTO count_existing
    FROM tbl_paket
    WHERE lokasi = NEW.lokasi AND waktu = NEW.waktu AND paket = NEW.paket;

    -- Jika ada, maka batalkan penyisipan
    IF count_existing > 0 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Paket dengan lokasi dan waktu yang sama sudah ada';
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_update_paket` BEFORE UPDATE ON `tbl_paket` FOR EACH ROW BEGIN
    DECLARE count_existing INT;

    SELECT COUNT(*) INTO count_existing
    FROM tbl_paket
    WHERE lokasi = NEW.lokasi AND waktu = NEW.waktu AND paket = NEW.paket;

    IF count_existing > 0 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Paket dengan lokasi dan waktu yang sama sudah ada';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembayaran`
--

CREATE TABLE `tbl_pembayaran` (
  `id` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `metodePembayaran` varchar(50) NOT NULL,
  `picture` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pembayaran`
--

INSERT INTO `tbl_pembayaran` (`id`, `id_pemesanan`, `metodePembayaran`, `picture`) VALUES
(2, 1, 'CASH', '67ffbfd54fe264.16465184.jpeg'),
(3, 4, 'CASH', '680c795feb3e47.62298685.jpeg'),
(4, 5, 'CASH', '682af3d3147390.39990052.png');

--
-- Triggers `tbl_pembayaran`
--
DELIMITER $$
CREATE TRIGGER `update_status_pemesanan` AFTER INSERT ON `tbl_pembayaran` FOR EACH ROW BEGIN
    UPDATE tbl_pemesanan
    SET status = 'Menunggu Verifikasi'
    WHERE id = NEW.id_pemesanan;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pemesanan`
--

CREATE TABLE `tbl_pemesanan` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `id_guide` int(11) NOT NULL,
  `id_keahlian` int(11) NOT NULL,
  `tanggalPemesanan` date NOT NULL,
  `status` varchar(50) DEFAULT 'Menunggu Pembayaran',
  `jmlPeserta` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `namaLengkap` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pemesanan`
--

INSERT INTO `tbl_pemesanan` (`id`, `id_user`, `id_paket`, `id_guide`, `id_keahlian`, `tanggalPemesanan`, `status`, `jmlPeserta`, `harga`, `namaLengkap`) VALUES
(1, 1, 1, 2, 2, '2025-04-16', 'Terverifikasi', 3, 4000000, 'User 1'),
(2, 1, 4, 3, 1, '2025-04-17', 'DiBatalkan', 4, 5000000, 'User'),
(3, 3, 4, 3, 3, '2025-04-29', 'DiBatalkan', 4, 5000000, 'User Kedua'),
(4, 1, 4, 3, 2, '2025-04-28', 'Terverifikasi', 8, 5000000, 'User'),
(5, 1, 6, 3, 2, '2025-05-19', 'Terverifikasi', 6, 5000000, 'User'),
(6, 1, 4, 2, 2, '2025-06-05', 'Menunggu Pembayaran', 1, 5000000, 'User'),
(7, 1, 6, 2, 2, '2025-06-05', 'Menunggu Pembayaran', 2, 5000000, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pesan`
--

CREATE TABLE `tbl_pesan` (
  `id` int(11) NOT NULL,
  `nama` varchar(35) DEFAULT NULL,
  `email` varchar(35) DEFAULT NULL,
  `pesan` text DEFAULT NULL,
  `tanggal` date DEFAULT curdate(),
  `status` enum('Unread','Read') DEFAULT 'Unread',
  `noHp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pesan`
--

INSERT INTO `tbl_pesan` (`id`, `nama`, `email`, `pesan`, `tanggal`, `status`, `noHp`) VALUES
(1, 'Fulan Satu', 'master@gmail.com', 'hahaha', '2025-05-26', 'Read', ''),
(2, 'User 1', 'master@gmail.com', 'hahahah', '2025-06-05', 'Read', ''),
(3, 'Users', 'master@gmail.com', 'hahah', '2025-06-05', 'Read', '08xxxx'),
(4, 'User Kedua Kali', 'g@gmail.com', 'percobaan', '2025-06-05', 'Read', '08xxxxxx');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_testimoni`
--

CREATE TABLE `tbl_testimoni` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `komentar` text NOT NULL,
  `rating` int(5) DEFAULT NULL,
  `tanggal` date NOT NULL DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_testimoni`
--

INSERT INTO `tbl_testimoni` (`id`, `id_user`, `komentar`, `rating`, `tanggal`) VALUES
(3, 1, 'asvds', 3, '2025-05-25'),
(4, 1, 'asvds', 3, '2025-05-25');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `namaLengkap` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `picture` varchar(200) DEFAULT NULL,
  `noTelepon` varchar(20) DEFAULT NULL,
  `role` varchar(25) NOT NULL DEFAULT 'USER'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `namaLengkap`, `email`, `username`, `password`, `picture`, `noTelepon`, `role`) VALUES
(1, 'Users B', 'user@gmail.com', 'users', '$2y$10$3dXAk9kZOX3Yl2rn9AITDuBu/JmXqq/55VHW6lM1Lb9hLyIbSpOQq', '6801a4fd63c742.34401464.jpeg', '08XXXX', 'USER'),
(2, 'Admin', 'admin@gmail.com', 'admin', '$2y$10$9qvcnhs1/fEKJTsZwo4jPuXwG62Cpx5IA6DfaDURASlChFWRLuY.K', '680035b9a212d5.46753294.jpeg', 'fwe12', 'ADMIN'),
(3, 'User Kedua', 'userkedua@gmail.com', 'userkedua', '$2y$10$WSjlN8a65gXjwYY86tktfeYdnvy.wksiZVdQngHlAuUaqO7zAXHiO', 'image.png', NULL, 'USER');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_guide`
--
ALTER TABLE `tbl_guide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_keahlian`
--
ALTER TABLE `tbl_keahlian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_paket`
--
ALTER TABLE `tbl_paket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pemesanan` (`id_pemesanan`);

--
-- Indexes for table `tbl_pemesanan`
--
ALTER TABLE `tbl_pemesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user` (`id_user`),
  ADD KEY `fk_paket` (`id_paket`),
  ADD KEY `fk_guide` (`id_guide`),
  ADD KEY `fk_keahlian` (`id_keahlian`);

--
-- Indexes for table `tbl_pesan`
--
ALTER TABLE `tbl_pesan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_testimoni`
--
ALTER TABLE `tbl_testimoni`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_testimoni` (`id_user`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_guide`
--
ALTER TABLE `tbl_guide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_keahlian`
--
ALTER TABLE `tbl_keahlian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_paket`
--
ALTER TABLE `tbl_paket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_pemesanan`
--
ALTER TABLE `tbl_pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_pesan`
--
ALTER TABLE `tbl_pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_testimoni`
--
ALTER TABLE `tbl_testimoni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD CONSTRAINT `fk_pemesanan` FOREIGN KEY (`id_pemesanan`) REFERENCES `tbl_pemesanan` (`id`);

--
-- Constraints for table `tbl_pemesanan`
--
ALTER TABLE `tbl_pemesanan`
  ADD CONSTRAINT `fk_guide` FOREIGN KEY (`id_guide`) REFERENCES `tbl_guide` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_keahlian` FOREIGN KEY (`id_keahlian`) REFERENCES `tbl_keahlian` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_paket` FOREIGN KEY (`id_paket`) REFERENCES `tbl_paket` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_testimoni`
--
ALTER TABLE `tbl_testimoni`
  ADD CONSTRAINT `fk_user_testimoni` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
