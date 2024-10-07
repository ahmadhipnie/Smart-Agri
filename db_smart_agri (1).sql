-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2024 at 09:46 AM
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
-- Database: `db_smart_agri`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_daerahrawan`
--

CREATE TABLE `tb_daerahrawan` (
  `id_daerah` int(11) NOT NULL,
  `nama_daerah` varchar(100) NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_daerahrawan`
--

INSERT INTO `tb_daerahrawan` (`id_daerah`, `nama_daerah`, `latitude`, `longitude`) VALUES
(1, 'Aceh', '5.5483', '95.3238'),
(2, 'Sumatera Utara', '3.5952', '98.6722'),
(3, 'Sumatera Barat', '-0.9471', '100.4172'),
(4, 'Riau', '0.5071', '101.4478'),
(5, 'Kepulauan Riau', '0.912', '104.4789'),
(6, 'Jambi', '-1.6107', '103.6131'),
(7, 'Bengkulu', '-3.7928', '102.2603'),
(8, 'Sumatera Selatan', '-2.9167', '104.7458'),
(9, 'Lampung', '-5.4500', '105.2667'),
(10, 'Bangka Belitung', '-2.7411', '106.4406'),
(11, 'Jakarta', '-6.2088', '106.8456'),
(12, 'Banten', '-6.1202', '106.1507'),
(13, 'Jawa Barat', '-6.9175', '107.6191'),
(14, 'Jawa Tengah', '-7.1500', '110.1403'),
(15, 'Yogyakarta', '-7.7956', '110.3695'),
(16, 'Jawa Timur', '-7.2504', '112.7688'),
(17, 'Bali', '-8.6500', '115.2167'),
(18, 'Nusa Tenggara Barat', '-8.5833', '116.1167'),
(19, 'Nusa Tenggara Timur', '-10.1772', '123.6070'),
(20, 'Kalimantan Barat', '-0.0263', '109.3425'),
(21, 'Kalimantan Tengah', '-2.2089', '113.9166'),
(22, 'Kalimantan Selatan', '-3.3200', '114.5900'),
(23, 'Kalimantan Timur', '-0.5022', '117.1536'),
(24, 'Kalimantan Utara', '3.4667', '117.1833'),
(25, 'Sulawesi Utara', '1.4748', '124.8421'),
(26, 'Gorontalo', '0.5412', '123.0564'),
(27, 'Sulawesi Tengah', '-0.8983', '119.8707'),
(28, 'Sulawesi Barat', '-2.6788', '118.9064'),
(29, 'Sulawesi Selatan', '-5.1477', '119.4327'),
(30, 'Sulawesi Tenggara', '-4.0000', '122.5000'),
(31, 'Maluku', '-3.6545', '128.1905'),
(32, 'Maluku Utara', '1.4865', '127.8357'),
(33, 'Papua', '-2.5337', '140.7181'),
(34, 'Papua Barat', '-0.8615', '134.0627');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenisiklim`
--

CREATE TABLE `tb_jenisiklim` (
  `id_iklim` char(10) NOT NULL,
  `nama_iklim` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_jenisiklim`
--

INSERT INTO `tb_jenisiklim` (`id_iklim`, `nama_iklim`) VALUES
('IK001', 'Kemarau'),
('IK002', 'Hujan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_keterangan`
--

CREATE TABLE `tb_keterangan` (
  `id_keterangan` int(11) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `id_tanamanpangan` char(10) NOT NULL,
  `id_iklim` char(10) NOT NULL,
  `id_daerah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_keterangan`
--

INSERT INTO `tb_keterangan` (`id_keterangan`, `deskripsi`, `tanggal`, `gambar`, `id_tanamanpangan`, `id_iklim`, `id_daerah`) VALUES
(1, 'Pada Padi di provinsi Sumatera Selatan sangat cocok ditanam pada bulan Januari 2016 karena curah hujan tinggi mendukung pertumbuhan optimal.', '2016-01-10', '/backend/icons/iconPadi.png', 'TP001', 'IK002', 8),
(2, 'Pada Jagung di provinsi Lampung sangat cocok ditanam pada bulan Mei 2016 karena curah hujan rendah mendukung tanaman jagung.', '2016-05-18', '/backend/icons/iconJagung.png', 'TP002', 'IK001', 9),
(3, 'Pada Kedelai di provinsi Jawa Timur sangat cocok ditanam pada bulan Juni 2016 karena kondisi tanah kering cocok untuk kedelai.', '2016-06-15', '/backend/icons/iconKedelai.png', 'TP003', 'IK001', 16),
(4, 'Pada Padi di provinsi Aceh sangat cocok ditanam di bulan Februari 2016 karena hujan sedang mendukung pertumbuhan padi.', '2016-02-14', '/backend/icons/iconPadi.png', 'TP001', 'IK002', 1),
(5, 'Pada Jagung di provinsi Jawa Barat sangat cocok ditanam pada bulan April 2016 karena curah hujan sedang dan cuaca kering mendukung pertumbuhan.', '2016-04-20', '/backend/icons/iconJagung.png', 'TP002', 'IK001', 13),
(6, 'Pada Kedelai di provinsi Sumatera Utara sangat cocok ditanam di bulan Agustus 2016 karena kondisi kemarau yang sesuai.', '2016-08-05', '/backend/icons/iconKedelai.png', 'TP003', 'IK001', 2),
(7, 'Pada Padi di provinsi Sumatera Barat sangat cocok ditanam pada bulan Maret 2016 karena hujan yang cukup mendukung pertumbuhan.', '2016-03-10', '/backend/icons/iconPadi.png', 'TP001', 'IK002', 3),
(8, 'Pada Jagung di provinsi Jawa Tengah sangat cocok ditanam di bulan Juli 2016 karena tanah kering mendukung jagung.', '2016-07-18', '/backend/icons/iconJagung.png', 'TP002', 'IK001', 14),
(9, 'Pada Kedelai di provinsi Banten sangat cocok ditanam pada bulan September 2016 karena kondisi cuaca kering yang ideal.', '2016-09-12', '/backend/icons/iconKedelai.png', 'TP003', 'IK001', 12),
(10, 'Pada Padi di provinsi Riau sangat cocok ditanam di bulan Oktober 2016 karena musim hujan mendukung pertumbuhan optimal.', '2016-10-05', '/backend/icons/iconPadi.png', 'TP001', 'IK002', 4),
(11, 'Pada Padi di provinsi Jawa Barat sangat cocok ditanam pada bulan Januari 2017 karena curah hujan yang melimpah mendukung pertumbuhan optimal.', '2017-01-10', '/backend/icons/iconPadi.png', 'TP001', 'IK002', 13),
(12, 'Pada Jagung di provinsi Sumatera Utara sangat cocok ditanam pada bulan Maret 2017 karena curah hujan rendah dan cuaca kering mendukung pertumbuhan jagung.', '2017-03-15', '/backend/icons/iconJagung.png', 'TP002', 'IK001', 2),
(13, 'Pada Kedelai di provinsi Lampung sangat cocok ditanam pada bulan Juni 2017 karena kondisi kemarau mendukung pertumbuhan.', '2017-06-10', '/backend/icons/iconKedelai.png', 'TP003', 'IK001', 9),
(14, 'Pada Padi di provinsi Jawa Tengah sangat cocok ditanam pada bulan Februari 2017 karena curah hujan mendukung pertumbuhan padi.', '2017-02-18', '/backend/icons/iconPadi.png', 'TP001', 'IK002', 14),
(15, 'Pada Jagung di provinsi Bengkulu sangat cocok ditanam pada bulan Mei 2017 karena kondisi cuaca yang kering mendukung pertumbuhan.', '2017-05-12', '/backend/icons/iconJagung.png', 'TP002', 'IK001', 7),
(16, 'Pada Kedelai di provinsi Banten sangat cocok ditanam pada bulan September 2017 karena tanah kering yang mendukung tanaman kedelai.', '2017-09-10', '/backend/icons/iconKedelai.png', 'TP003', 'IK001', 12),
(17, 'Pada Padi di provinsi Sumatera Selatan sangat cocok ditanam pada bulan Maret 2017 karena hujan sedang mendukung pertumbuhan padi.', '2017-03-25', '/backend/icons/iconPadi.png', 'TP001', 'IK002', 8),
(18, 'Pada Padi di provinsi Sumatera Barat sangat cocok ditanam pada bulan Januari 2018 karena hujan yang cukup mendukung pertumbuhan optimal.', '2018-01-10', '/backend/icons/iconPadi.png', 'TP001', 'IK002', 3),
(19, 'Pada Jagung di provinsi Jawa Timur sangat cocok ditanam pada bulan Mei 2018 karena kondisi cuaca kering mendukung pertumbuhan jagung.', '2018-05-20', '/backend/icons/iconJagung.png', 'TP002', 'IK001', 16),
(20, 'Pada Kedelai di provinsi Sumatera Utara sangat cocok ditanam pada bulan Agustus 2018 karena kondisi kemarau mendukung pertumbuhan.', '2018-08-12', '/backend/icons/iconKedelai.png', 'TP003', 'IK001', 2),
(21, 'Pada Padi di provinsi Jawa Barat sangat cocok ditanam pada bulan Februari 2018 karena curah hujan mendukung pertumbuhan padi.', '2018-02-12', '/backend/icons/iconPadi.png', 'TP001', 'IK002', 13),
(22, 'Pada Jagung di provinsi Riau sangat cocok ditanam pada bulan Juli 2018 karena kondisi tanah kering mendukung pertumbuhan jagung.', '2018-07-22', '/backend/icons/iconJagung.png', 'TP002', 'IK001', 4),
(23, 'Pada Kedelai di provinsi Lampung sangat cocok ditanam pada bulan September 2018 karena cuaca kering mendukung pertumbuhan optimal.', '2018-09-18', '/backend/icons/iconKedelai.png', 'TP003', 'IK001', 9),
(24, 'Pada Padi di provinsi Banten sangat cocok ditanam pada bulan Maret 2018 karena curah hujan mendukung pertumbuhan optimal.', '2018-03-15', '/backend/icons/iconPadi.png', 'TP001', 'IK002', 12),
(25, 'Pada Padi di provinsi Jawa Tengah sangat cocok ditanam pada bulan Februari 2019 karena curah hujan mendukung pertumbuhan padi.', '2019-02-10', '/backend/icons/iconPadi.png', 'TP001', 'IK002', 14),
(26, 'Pada Jagung di provinsi Sumatera Selatan sangat cocok ditanam pada bulan April 2019 karena cuaca kering mendukung pertumbuhan jagung.', '2019-04-12', '/backend/icons/iconJagung.png', 'TP002', 'IK001', 8),
(27, 'Pada Kedelai di provinsi Jawa Barat sangat cocok ditanam pada bulan Juni 2019 karena musim kemarau mendukung pertumbuhan optimal.', '2019-06-18', '/backend/icons/iconKedelai.png', 'TP003', 'IK001', 13),
(28, 'Pada Padi di provinsi Sumatera Utara sangat cocok ditanam pada bulan Januari 2019 karena curah hujan yang cukup mendukung pertumbuhan padi.', '2019-01-25', '/backend/icons/iconPadi.png', 'TP001', 'IK002', 2),
(29, 'Pada Jagung di provinsi Lampung sangat cocok ditanam pada bulan Mei 2019 karena curah hujan rendah mendukung pertumbuhan optimal.', '2019-05-22', '/backend/icons/iconJagung.png', 'TP002', 'IK001', 9),
(30, 'Pada Kedelai di provinsi Sumatera Barat sangat cocok ditanam pada bulan Agustus 2019 karena kondisi tanah kering mendukung pertumbuhan optimal.', '2019-08-12', '/backend/icons/iconKedelai.png', 'TP003', 'IK001', 3),
(31, 'Pada Padi di provinsi Jawa Timur sangat cocok ditanam pada bulan Januari 2020 karena curah hujan mendukung pertumbuhan padi.', '2020-01-15', '/backend/icons/iconPadi.png', 'TP001', 'IK002', 16),
(32, 'Pada Jagung di provinsi Sumatera Selatan sangat cocok ditanam pada bulan Maret 2020 karena cuaca kering mendukung pertumbuhan optimal.', '2020-03-12', '/backend/icons/iconJagung.png', 'TP002', 'IK001', 8),
(33, 'Pada Kedelai di provinsi Sumatera Utara sangat cocok ditanam pada bulan Juli 2020 karena musim kemarau mendukung pertumbuhan optimal.', '2020-07-10', '/backend/icons/iconKedelai.png', 'TP003', 'IK001', 2),
(34, 'Pada Padi di provinsi Jawa Barat sangat cocok ditanam pada bulan Februari 2020 karena curah hujan mendukung pertumbuhan padi.', '2020-02-22', '/backend/icons/iconPadi.png', 'TP001', 'IK002', 13),
(35, 'Pada Jagung di provinsi Bengkulu sangat cocok ditanam pada bulan Mei 2020 karena kondisi cuaca yang kering mendukung pertumbuhan.', '2020-05-18', '/backend/icons/iconJagung.png', 'TP002', 'IK001', 7),
(36, 'Pada Kedelai di provinsi Lampung sangat cocok ditanam pada bulan September 2020 karena kondisi tanah yang kering mendukung pertumbuhan optimal.', '2020-09-12', '/backend/icons/iconKedelai.png', 'TP003', 'IK001', 9),
(37, 'Pada Padi di provinsi Sumatera Selatan sangat cocok ditanam pada bulan Januari 2021 karena curah hujan mendukung pertumbuhan optimal.', '2021-01-20', '/backend/icons/iconPadi.png', 'TP001', 'IK002', 8),
(38, 'Pada Jagung di provinsi Jawa Barat sangat cocok ditanam pada bulan Maret 2021 karena cuaca kering mendukung pertumbuhan optimal.', '2021-03-15', '/backend/icons/iconJagung.png', 'TP002', 'IK001', 13),
(39, 'Pada Kedelai di provinsi Sumatera Utara sangat cocok ditanam pada bulan Juli 2021 karena kondisi tanah yang kering mendukung pertumbuhan.', '2021-07-18', '/backend/icons/iconKedelai.png', 'TP003', 'IK001', 2),
(40, 'Pada Padi di provinsi Jawa Tengah sangat cocok ditanam pada bulan Februari 2021 karena curah hujan yang cukup mendukung pertumbuhan padi.', '2021-02-10', '/backend/icons/iconPadi.png', 'TP001', 'IK002', 14),
(41, 'Pada Jagung di provinsi Lampung sangat cocok ditanam pada bulan Mei 2021 karena cuaca kering mendukung pertumbuhan optimal.', '2021-05-12', '/backend/icons/iconJagung.png', 'TP002', 'IK001', 9),
(42, 'Pada Kedelai di provinsi Sumatera Barat sangat cocok ditanam pada bulan September 2021 karena kondisi cuaca kering mendukung pertumbuhan.', '2021-09-18', '/backend/icons/iconKedelai.png', 'TP003', 'IK001', 3),
(43, 'Pada Padi di provinsi Jawa Timur sangat cocok ditanam pada bulan Januari 2022 karena curah hujan mendukung pertumbuhan optimal.', '2022-01-10', '/backend/icons/iconPadi.png', 'TP001', 'IK002', 16),
(44, 'Pada Jagung di provinsi Sumatera Selatan sangat cocok ditanam pada bulan Maret 2022 karena cuaca kering mendukung pertumbuhan jagung.', '2022-03-22', '/backend/icons/iconJagung.png', 'TP002', 'IK001', 8),
(45, 'Pada Kedelai di provinsi Jawa Barat sangat cocok ditanam pada bulan Juni 2022 karena musim kemarau mendukung pertumbuhan optimal.', '2022-06-12', '/backend/icons/iconKedelai.png', 'TP003', 'IK001', 13),
(46, 'Pada Padi di provinsi Sumatera Barat sangat cocok ditanam pada bulan Februari 2022 karena curah hujan yang mendukung pertumbuhan padi.', '2022-02-25', '/backend/icons/iconPadi.png', 'TP001', 'IK002', 3),
(47, 'Pada Jagung di provinsi Bengkulu sangat cocok ditanam pada bulan Mei 2022 karena kondisi cuaca kering mendukung pertumbuhan jagung.', '2022-05-12', '/backend/icons/iconJagung.png', 'TP002', 'IK001', 7),
(48, 'Pada Kedelai di provinsi Lampung sangat cocok ditanam pada bulan September 2022 karena kondisi tanah kering mendukung pertumbuhan optimal.', '2022-09-10', '/backend/icons/iconKedelai.png', 'TP003', 'IK001', 9),
(49, 'Pada Padi di provinsi Sumatera Utara sangat cocok ditanam pada bulan Januari 2023 karena curah hujan yang mendukung pertumbuhan optimal.', '2023-01-15', '/backend/icons/iconPadi.png', 'TP001', 'IK002', 2),
(50, 'Pada Jagung di provinsi Jawa Tengah sangat cocok ditanam pada bulan Maret 2023 karena cuaca kering mendukung pertumbuhan jagung.', '2023-03-12', '/backend/icons/iconJagung.png', 'TP002', 'IK001', 14),
(51, 'Pada Kedelai di provinsi Sumatera Selatan sangat cocok ditanam pada bulan Juni 2023 karena musim kemarau mendukung pertumbuhan kedelai.', '2023-06-18', '/backend/icons/iconKedelai.png', 'TP003', 'IK001', 8),
(52, 'Pada Padi di provinsi Jawa Barat sangat cocok ditanam pada bulan Februari 2023 karena curah hujan yang cukup mendukung pertumbuhan padi.', '2023-02-22', '/backend/icons/iconPadi.png', 'TP001', 'IK002', 13),
(53, 'Pada Jagung di provinsi Lampung sangat cocok ditanam pada bulan Mei 2023 karena cuaca kering mendukung pertumbuhan optimal.', '2023-05-15', '/backend/icons/iconJagung.png', 'TP002', 'IK001', 9),
(54, 'Pada Kedelai di provinsi Sumatera Barat sangat cocok ditanam pada bulan September 2023 karena kondisi cuaca yang kering mendukung pertumbuhan.', '2023-09-10', '/backend/icons/iconKedelai.png', 'TP003', 'IK001', 3),
(55, 'Pada Padi di provinsi Jawa Timur sangat cocok ditanam pada bulan Januari 2023 karena curah hujan mendukung pertumbuhan padi.', '2023-01-28', '/backend/icons/iconPadi.png', 'TP001', 'IK002', 16),
(56, 'Pada Padi di provinsi Sumatera Selatan sangat cocok ditanam pada bulan Februari 2024 karena curah hujan mendukung pertumbuhan padi.', '2024-02-15', '/backend/icons/iconPadi.png', 'TP001', 'IK002', 8),
(57, 'Pada Jagung di provinsi Jawa Barat sangat cocok ditanam pada bulan April 2024 karena cuaca kering mendukung pertumbuhan jagung.', '2024-04-20', '/backend/icons/iconJagung.png', 'TP002', 'IK001', 13),
(58, 'Pada Kedelai di provinsi Lampung sangat cocok ditanam pada bulan Juni 2024 karena kondisi kemarau mendukung pertumbuhan kedelai.', '2024-06-18', '/backend/icons/iconKedelai.png', 'TP003', 'IK001', 9),
(59, 'Pada Padi di provinsi Jawa Tengah sangat cocok ditanam pada bulan Januari 2024 karena curah hujan mendukung pertumbuhan padi.', '2024-01-12', '/backend/icons/iconPadi.png', 'TP001', 'IK002', 14),
(60, 'Pada Jagung di provinsi Sumatera Utara sangat cocok ditanam pada bulan Mei 2024 karena cuaca kering mendukung pertumbuhan jagung.', '2024-05-22', '/backend/icons/iconJagung.png', 'TP002', 'IK001', 2),
(61, 'Pada Kedelai di provinsi Banten sangat cocok ditanam pada bulan September 2024 karena kondisi tanah yang kering mendukung pertumbuhan.', '2024-09-12', '/backend/icons/iconKedelai.png', 'TP003', 'IK001', 12),
(62, 'Pada Padi di provinsi Sumatera Barat sangat cocok ditanam pada bulan Januari 2025 karena curah hujan mendukung pertumbuhan padi.', '2025-01-10', '/backend/icons/iconPadi.png', 'TP001', 'IK002', 3),
(63, 'Pada Jagung di provinsi Jawa Timur sangat cocok ditanam pada bulan Maret 2025 karena cuaca kering mendukung pertumbuhan optimal.', '2025-03-15', '/backend/icons/iconJagung.png', 'TP002', 'IK001', 16),
(64, 'Pada Kedelai di provinsi Sumatera Selatan sangat cocok ditanam pada bulan Juni 2025 karena kondisi kemarau mendukung pertumbuhan optimal.', '2025-06-10', '/backend/icons/iconKedelai.png', 'TP003', 'IK001', 8),
(65, 'Pada Padi di provinsi Jawa Barat sangat cocok ditanam pada bulan Februari 2025 karena curah hujan yang mendukung pertumbuhan padi.', '2025-02-22', '/backend/icons/iconPadi.png', 'TP001', 'IK002', 13),
(66, 'Pada Jagung di provinsi Lampung sangat cocok ditanam pada bulan Mei 2025 karena cuaca kering yang mendukung pertumbuhan optimal.', '2025-05-18', '/backend/icons/iconJagung.png', 'TP002', 'IK001', 9),
(67, 'Pada Kedelai di provinsi Sumatera Utara sangat cocok ditanam pada bulan September 2025 karena kondisi tanah kering mendukung pertumbuhan optimal.', '2025-09-10', '/backend/icons/iconKedelai.png', 'TP003', 'IK001', 2),
(68, 'Pada Padi di provinsi Jawa Tengah sangat cocok ditanam pada bulan Januari 2026 karena curah hujan mendukung pertumbuhan optimal.', '2026-01-15', '/backend/icons/iconPadi.png', 'TP001', 'IK002', 14),
(69, 'Pada Jagung di provinsi Sumatera Selatan sangat cocok ditanam pada bulan Maret 2026 karena cuaca kering mendukung pertumbuhan jagung.', '2026-03-12', '/backend/icons/iconJagung.png', 'TP002', 'IK001', 8),
(70, 'Pada Kedelai di provinsi Jawa Barat sangat cocok ditanam pada bulan Juni 2026 karena kondisi kemarau yang mendukung pertumbuhan kedelai.', '2026-06-10', '/backend/icons/iconKedelai.png', 'TP003', 'IK001', 13),
(71, 'Pada Padi di provinsi Sumatera Utara sangat cocok ditanam pada bulan Februari 2026 karena curah hujan yang mendukung pertumbuhan padi.', '2026-02-22', '/backend/icons/iconPadi.png', 'TP001', 'IK002', 2),
(72, 'Pada Jagung di provinsi Lampung sangat cocok ditanam pada bulan Mei 2026 karena kondisi tanah kering mendukung pertumbuhan optimal.', '2026-05-18', '/backend/icons/iconJagung.png', 'TP002', 'IK001', 9),
(73, 'Pada Kedelai di provinsi Sumatera Barat sangat cocok ditanam pada bulan September 2026 karena cuaca kering mendukung pertumbuhan optimal.', '2026-09-12', '/backend/icons/iconKedelai.png', 'TP003', 'IK001', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_tanamanpangan`
--

CREATE TABLE `tb_tanamanpangan` (
  `id_tanamanpangan` char(10) NOT NULL,
  `nama_tanamanpangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_tanamanpangan`
--

INSERT INTO `tb_tanamanpangan` (`id_tanamanpangan`, `nama_tanamanpangan`) VALUES
('TP001', 'Padi'),
('TP002', 'Jagung'),
('TP003', 'Kedelai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_daerahrawan`
--
ALTER TABLE `tb_daerahrawan`
  ADD PRIMARY KEY (`id_daerah`);

--
-- Indexes for table `tb_jenisiklim`
--
ALTER TABLE `tb_jenisiklim`
  ADD PRIMARY KEY (`id_iklim`);

--
-- Indexes for table `tb_keterangan`
--
ALTER TABLE `tb_keterangan`
  ADD PRIMARY KEY (`id_keterangan`),
  ADD KEY `id_tanamanpangan` (`id_tanamanpangan`),
  ADD KEY `id_iklim` (`id_iklim`),
  ADD KEY `id_daerah` (`id_daerah`);

--
-- Indexes for table `tb_tanamanpangan`
--
ALTER TABLE `tb_tanamanpangan`
  ADD PRIMARY KEY (`id_tanamanpangan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_keterangan`
--
ALTER TABLE `tb_keterangan`
  MODIFY `id_keterangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_keterangan`
--
ALTER TABLE `tb_keterangan`
  ADD CONSTRAINT `tb_keterangan_ibfk_1` FOREIGN KEY (`id_tanamanpangan`) REFERENCES `tb_tanamanpangan` (`id_tanamanpangan`),
  ADD CONSTRAINT `tb_keterangan_ibfk_2` FOREIGN KEY (`id_iklim`) REFERENCES `tb_jenisiklim` (`id_iklim`),
  ADD CONSTRAINT `tb_keterangan_ibfk_3` FOREIGN KEY (`id_daerah`) REFERENCES `tb_daerahrawan` (`id_daerah`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
