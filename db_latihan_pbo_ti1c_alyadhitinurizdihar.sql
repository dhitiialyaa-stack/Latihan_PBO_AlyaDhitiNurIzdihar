-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 15, 2026 at 05:06 AM
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
-- Database: `db_latihan_pbo_ti1c_alyadhitinurizdihar`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_tiket`
--

CREATE TABLE `tabel_tiket` (
  `id_tiket` int NOT NULL,
  `nama_film` varchar(255) NOT NULL,
  `jadwal_tayang` datetime NOT NULL,
  `jumlah_kursi` int NOT NULL,
  `harga_dasar_tiket` decimal(10,2) NOT NULL,
  `jenis_studio` enum('Regular','IMAX','Velvet') NOT NULL,
  `tipe_audio` varchar(50) DEFAULT NULL,
  `lokasi_baris` varchar(10) DEFAULT NULL,
  `kacamata_3d_id` varchar(50) DEFAULT NULL,
  `efek_gerak_fitur` varchar(100) DEFAULT NULL,
  `bantal_selimut_pack` varchar(50) DEFAULT NULL,
  `layanan_butler` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_tiket`
--

INSERT INTO `tabel_tiket` (`id_tiket`, `nama_film`, `jadwal_tayang`, `jumlah_kursi`, `harga_dasar_tiket`, `jenis_studio`, `tipe_audio`, `lokasi_baris`, `kacamata_3d_id`, `efek_gerak_fitur`, `bantal_selimut_pack`, `layanan_butler`) VALUES
(1, 'The Avengers', '2026-07-01 13:00:00', 120, '45000.00', 'Regular', 'Dolby Digital', 'A-N', NULL, NULL, NULL, NULL),
(2, 'The Avengers', '2026-07-01 16:00:00', 120, '45000.00', 'Regular', 'Dolby Digital', 'A-N', NULL, NULL, NULL, NULL),
(3, 'Inception', '2026-07-01 19:30:00', 150, '50000.00', 'Regular', 'Dolby Atmos', 'A-P', NULL, NULL, NULL, NULL),
(4, 'Inception', '2026-07-02 14:00:00', 150, '45000.00', 'Regular', 'Dolby Atmos', 'A-P', NULL, NULL, NULL, NULL),
(5, 'Interstellar', '2026-07-02 17:00:00', 120, '45000.00', 'Regular', 'Dolby Digital', 'A-N', NULL, NULL, NULL, NULL),
(6, 'Interstellar', '2026-07-02 20:30:00', 120, '50000.00', 'Regular', 'Dolby Digital', 'A-N', NULL, NULL, NULL, NULL),
(7, 'KKN di Desa Penari', '2026-07-03 13:00:00', 150, '40000.00', 'Regular', 'Standard Stereo', 'A-P', NULL, NULL, NULL, NULL),
(8, 'Avatar: The Way of Water', '2026-07-01 14:00:00', 300, '75000.00', 'IMAX', 'IMAX 12-Channel', 'A-Z', 'G-3D-01', '4D-Vibration', NULL, NULL),
(9, 'Avatar: The Way of Water', '2026-07-01 18:00:00', 300, '75000.00', 'IMAX', 'IMAX 12-Channel', 'A-Z', 'G-3D-02', '4D-Vibration', NULL, NULL),
(10, 'Dune: Part Two', '2026-07-02 13:00:00', 280, '80000.00', 'IMAX', 'IMAX 6-Track', 'A-W', NULL, 'Standard Motion', NULL, NULL),
(11, 'Dune: Part Two', '2026-07-02 16:30:00', 280, '80000.00', 'IMAX', 'IMAX 6-Track', 'A-W', NULL, 'Standard Motion', NULL, NULL),
(12, 'Dune: Part Two', '2026-07-02 20:00:00', 280, '85000.00', 'IMAX', 'IMAX 6-Track', 'A-W', NULL, 'Standard Motion', NULL, NULL),
(13, 'Oppenheimer', '2026-07-03 14:15:00', 300, '75000.00', 'IMAX', 'IMAX 12-Channel', 'A-Z', NULL, 'Subwoofer-Shaker', NULL, NULL),
(14, 'Oppenheimer', '2026-07-03 19:00:00', 300, '85000.00', 'IMAX', 'IMAX 12-Channel', 'A-Z', NULL, 'Subwoofer-Shaker', NULL, NULL),
(15, 'Titanic', '2026-07-01 15:00:00', 40, '150000.00', 'Velvet', 'Dolby Atmos', 'A-E', NULL, NULL, 'Premium-Satin-Pack', 'Full-Service Butler'),
(16, 'Titanic', '2026-07-01 20:00:00', 40, '175000.00', 'Velvet', 'Dolby Atmos', 'A-E', NULL, NULL, 'Premium-Satin-Pack', 'Full-Service Butler'),
(17, 'La La Land', '2026-07-02 16:00:00', 30, '150000.00', 'Velvet', 'Dolby Digital', 'A-C', NULL, NULL, 'Standard-Velvet-Pack', 'On-Call Butler'),
(18, 'La La Land', '2026-07-02 19:00:00', 30, '150000.00', 'Velvet', 'Dolby Digital', 'A-C', NULL, NULL, 'Standard-Velvet-Pack', 'On-Call Butler'),
(19, 'The Godfather', '2026-07-03 15:30:00', 40, '150000.00', 'Velvet', 'Dolby Atmos', 'A-E', NULL, NULL, 'Premium-Satin-Pack', 'Full-Service Butler'),
(20, 'The Godfather', '2026-07-03 21:00:00', 40, '175000.00', 'Velvet', 'Dolby Atmos', 'A-E', NULL, NULL, 'Premium-Satin-Pack', 'Full-Service Butler');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_tiket`
--
ALTER TABLE `tabel_tiket`
  ADD PRIMARY KEY (`id_tiket`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_tiket`
--
ALTER TABLE `tabel_tiket`
  MODIFY `id_tiket` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
