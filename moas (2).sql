-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 29, 2023 at 01:52 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moas`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id_admin` int NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_admin` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id_admin`, `username`, `password`, `nama_admin`) VALUES
(1, 'test', 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `id_detail_pesanan` int NOT NULL,
  `id_pesanan` int NOT NULL,
  `id_menu` int NOT NULL,
  `jumlah` int NOT NULL,
  `total_per_item` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`id_detail_pesanan`, `id_pesanan`, `id_menu`, `jumlah`, `total_per_item`) VALUES
(15, 2, 2, 55, '1100000.00'),
(16, 2, 5, 15, '225000.00'),
(17, 2, 5, 30, '450000.00');

--
-- Triggers `detail_pesanan`
--
DELIMITER $$
CREATE TRIGGER `update_total_pesanan_after_delete` AFTER DELETE ON `detail_pesanan` FOR EACH ROW BEGIN
    DECLARE total_pesanan DECIMAL(10,2);
    
    SELECT SUM(total_per_item) INTO total_pesanan
    FROM detail_pesanan
    WHERE id_pesanan = OLD.id_pesanan;
    
    UPDATE pesanan
    SET total = total_pesanan
    WHERE id_pesanan = OLD.id_pesanan;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_total_pesanan_after_insert` AFTER INSERT ON `detail_pesanan` FOR EACH ROW BEGIN
    DECLARE total_pesanan DECIMAL(10,2);
    
    SELECT SUM(total_per_item) INTO total_pesanan
    FROM detail_pesanan
    WHERE id_pesanan = NEW.id_pesanan;
    
    UPDATE pesanan
    SET total = total_pesanan
    WHERE id_pesanan = NEW.id_pesanan;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_total_pesanan_after_update` AFTER UPDATE ON `detail_pesanan` FOR EACH ROW BEGIN
    DECLARE total_pesanan DECIMAL(10,2);
    
    SELECT SUM(total_per_item) INTO total_pesanan
    FROM detail_pesanan
    WHERE id_pesanan = NEW.id_pesanan;
    
    UPDATE pesanan
    SET total = total_pesanan
    WHERE id_pesanan = NEW.id_pesanan;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `katering`
--

CREATE TABLE `katering` (
  `id_katering` int NOT NULL,
  `nama_katering` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `nohp_katering` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `katering`
--

INSERT INTO `katering` (`id_katering`, `nama_katering`, `email`, `nohp_katering`, `username`, `password`) VALUES
(1, 'john1', 'john1@test.com', '1313332', 'john1', 'john1'),
(3, 'john2', 'john2@test.com', '32131', 'john2', 'john2'),
(4, 'test5', 'test5@test.com', '533954', 'test5', 'test5'),
(5, 'test', 'test@test.com', '2432432', 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi_pembayaran`
--

CREATE TABLE `konfirmasi_pembayaran` (
  `id_konfirmasi` int NOT NULL,
  `bukti` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `status_bayar` enum('Sudah','Belum') COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `id_langganan` int NOT NULL,
  `id_katering` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `langganan`
--

CREATE TABLE `langganan` (
  `id_langganan` int NOT NULL,
  `id_katering` int NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `status` enum('Akif','Tidak') COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu_makanan`
--

CREATE TABLE `menu_makanan` (
  `id_menu` int NOT NULL,
  `id_katering` int DEFAULT NULL,
  `nama_menu` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `deskripsi` text COLLATE utf8mb4_general_ci,
  `tanggal_ditambahkan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu_makanan`
--

INSERT INTO `menu_makanan` (`id_menu`, `id_katering`, `nama_menu`, `harga`, `deskripsi`, `tanggal_ditambahkan`) VALUES
(2, 1, 'Ikan Pindang Mak Limak Sempurna', '20000.00', 'Makanan khas mak lima biadap', '2023-11-15 12:01:29'),
(3, 4, 'Ikan Pindang', '25000.00', 'Ikan Pindang', '2023-11-16 04:18:09'),
(4, 5, 'Ikan Salmon', '15000.00', 'Ikan segar khas jepang', '2023-11-22 02:51:53'),
(5, 1, 'Ikan Salmon', '15000.00', 'Ikan segar khas jepang', '2023-11-26 15:47:28');

-- --------------------------------------------------------

--
-- Table structure for table `pendapatan`
--

CREATE TABLE `pendapatan` (
  `id_pendapatan` int NOT NULL,
  `pendapatan` int NOT NULL,
  `bulan` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `id_katering` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int NOT NULL,
  `nama_pemesan` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `nohp_pemesan` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_pesanan` date NOT NULL,
  `total` int DEFAULT NULL,
  `status` enum('Selesai','Proses') COLLATE utf8mb4_general_ci NOT NULL,
  `id_katering` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `nama_pemesan`, `nohp_pemesan`, `alamat`, `tanggal_pesanan`, `total`, `status`, `id_katering`) VALUES
(1, 'John Doe', '123456789', 'Alamatnya John Doe', '2023-11-22', 50000, 'Proses', 1),
(2, 'Pak Jember', '2437326423', 'Jalan Merpati', '2023-11-14', 1775000, 'Proses', 1),
(3, 'Pak Mahmud', '2437326423', 'Jalan Merpati', '2023-11-01', 0, 'Proses', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id_admin`);

--
-- Indexes for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD PRIMARY KEY (`id_detail_pesanan`),
  ADD KEY `fk_id_pesanan` (`id_pesanan`),
  ADD KEY `fk_id_menu` (`id_menu`);

--
-- Indexes for table `katering`
--
ALTER TABLE `katering`
  ADD PRIMARY KEY (`id_katering`);

--
-- Indexes for table `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  ADD PRIMARY KEY (`id_konfirmasi`),
  ADD KEY `id_langganan` (`id_langganan`),
  ADD KEY `id_katering` (`id_katering`);

--
-- Indexes for table `langganan`
--
ALTER TABLE `langganan`
  ADD PRIMARY KEY (`id_langganan`),
  ADD KEY `id_katering` (`id_katering`);

--
-- Indexes for table `menu_makanan`
--
ALTER TABLE `menu_makanan`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `id_katering` (`id_katering`);

--
-- Indexes for table `pendapatan`
--
ALTER TABLE `pendapatan`
  ADD PRIMARY KEY (`id_pendapatan`),
  ADD KEY `id_katering` (`id_katering`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `fk_id_katering` (`id_katering`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  MODIFY `id_detail_pesanan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `katering`
--
ALTER TABLE `katering`
  MODIFY `id_katering` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  MODIFY `id_konfirmasi` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `langganan`
--
ALTER TABLE `langganan`
  MODIFY `id_langganan` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu_makanan`
--
ALTER TABLE `menu_makanan`
  MODIFY `id_menu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pendapatan`
--
ALTER TABLE `pendapatan`
  MODIFY `id_pendapatan` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD CONSTRAINT `fk_id_menu` FOREIGN KEY (`id_menu`) REFERENCES `menu_makanan` (`id_menu`),
  ADD CONSTRAINT `fk_id_pesanan` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`);

--
-- Constraints for table `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  ADD CONSTRAINT `konfirmasi_pembayaran_ibfk_1` FOREIGN KEY (`id_katering`) REFERENCES `katering` (`id_katering`),
  ADD CONSTRAINT `konfirmasi_pembayaran_ibfk_2` FOREIGN KEY (`id_langganan`) REFERENCES `langganan` (`id_langganan`);

--
-- Constraints for table `langganan`
--
ALTER TABLE `langganan`
  ADD CONSTRAINT `langganan_ibfk_1` FOREIGN KEY (`id_katering`) REFERENCES `katering` (`id_katering`);

--
-- Constraints for table `menu_makanan`
--
ALTER TABLE `menu_makanan`
  ADD CONSTRAINT `menu_makanan_ibfk_1` FOREIGN KEY (`id_katering`) REFERENCES `katering` (`id_katering`);

--
-- Constraints for table `pendapatan`
--
ALTER TABLE `pendapatan`
  ADD CONSTRAINT `pendapatan_ibfk_1` FOREIGN KEY (`id_katering`) REFERENCES `katering` (`id_katering`);

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `fk_id_katering` FOREIGN KEY (`id_katering`) REFERENCES `katering` (`id_katering`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
