-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2023 at 09:45 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplikasi_kendaraan`
--

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `no_reg` varchar(20) NOT NULL,
  `owner` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `brand` varchar(50) NOT NULL,
  `year` int(4) NOT NULL,
  `cylinders` varchar(20) NOT NULL,
  `color` varchar(20) NOT NULL,
  `fuel` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`no_reg`, `owner`, `address`, `brand`, `year`, `cylinders`, `color`, `fuel`, `created_at`) VALUES
('B-1245-DLC', 'Robert Smith', 'Jl. ABC no 12', 'Toyota Nisan', 2018, '200 cc', 'Hitam', 'Bensin', '2023-01-18 08:53:49'),
('B-1513-DBZ', 'Mang Udin', 'Jalan Udang', 'Suzuki', 2021, '200 cc', 'Biru', 'Oksigen', '2023-01-18 00:00:00'),
('B-4412-BBY', 'Joseph', 'Jl. Pilloowman', 'Mini Copper', 2000, '3000 cc', 'Merah', 'Gasoline', '2023-01-18 15:32:23'),
('B-5325-GBO', 'Mang Ujang', 'Jl. Jajan Mulu', 'Alya', 2013, '230 cc', 'Merah', 'Bensin', '2023-01-18 12:10:15'),
('B-6512-MMA', 'Ronaldo Wati', 'Jl Perkedel Jagung', 'Avanza', 1995, '250 cc', 'Biru', 'Sulfur', '2023-01-17 00:00:00'),
('B-7763-TXY', 'Lionel Messi', 'Jalan Purbalingga', 'Honda PCX', 2018, '150 cc', 'Biru', 'Bensin', '2023-01-17 00:00:00'),
('D-1271-DOK', 'Cindy ', 'Jl. Androanti', 'Telsa', 2020, '1500 cc', 'Hitam', 'Gasoline', '2023-01-18 15:40:20'),
('D-3132-CBZ', 'Aga ', 'Jl. Cemcem', 'Hyundai', 1900, '1000 cc', 'Merah', 'Gasoline', '2023-01-18 15:40:19'),
('D-4513-SEA', 'Gerry', 'Jl. Final Fantasy', 'Nissan', 2013, '3000 cc', 'Biru', 'Gasoline', '2023-01-18 15:40:19'),
('D-5723-FKU', 'Mang Eko', 'Jl. Elite no 244', 'Mercedes', 2010, '320 cc', 'Biru', 'Solar', '2023-01-18 12:11:44'),
('K-4721-CKD', 'Andrianto', 'Jl. Cindoi', 'Daihatsu Mini', 2005, '1800 cc', 'Merah', 'Bensin', '2023-01-18 15:40:19'),
('Z-5512-MCU', 'Ravi Ahmad', 'Jl. Serdadu no 33', 'Wuling', 2019, '2200 cc', 'Biru', 'Solar', '2023-01-18 15:44:35'),
('Z-7272-MEH', 'Bobi', 'Jl. Kotorin', 'Subaru', 1800, '900 cc', 'Abu-Abu', 'Bensin', '2023-01-18 15:40:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`no_reg`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
