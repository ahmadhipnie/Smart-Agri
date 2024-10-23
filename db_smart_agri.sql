-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2024 at 05:51 AM
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
-- Table structure for table `prediksi_tanaman_pangan`
--

CREATE TABLE `prediksi_tanaman_pangan` (
  `id_provinsi` varchar(10) NOT NULL,
  `id_tanamanpangan` varchar(10) NOT NULL,
  `thn_2021` decimal(10,0) NOT NULL,
  `thn_2022` decimal(10,0) NOT NULL,
  `thn_2023` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prediksi_tanaman_pangan`
--

INSERT INTO `prediksi_tanaman_pangan` (`id_provinsi`, `id_tanamanpangan`, `thn_2021`, `thn_2022`, `thn_2023`) VALUES
('PRP01', 'TP001', 6, 6, 6),
('PRP02', 'TP001', 5, 5, 5),
('PRP03', 'TP001', 5, 5, 5),
('PRP04', 'TP001', 4, 4, 4),
('PRP05', 'TP001', 5, 5, 5),
('PRP06', 'TP001', 6, 5, 5),
('PRP07', 'TP001', 5, 5, 5),
('PRP08', 'TP001', 5, 5, 5),
('PRP09', 'TP001', 4, 4, 4),
('PRP10', 'TP001', 3, 3, 3),
('PRP11', 'TP001', 5, 5, 6),
('PRP12', 'TP001', 6, 6, 6),
('PRP13', 'TP001', 6, 6, 6),
('PRP14', 'TP001', 5, 5, 5),
('PRP15', 'TP001', 6, 6, 6),
('PRP16', 'TP001', 5, 5, 5),
('PRP17', 'TP001', 6, 6, 6),
('PRP18', 'TP001', 5, 5, 5),
('PRP19', 'TP001', 4, 4, 4),
('PRP20', 'TP001', 3, 3, 3),
('PRP21', 'TP001', 3, 3, 3),
('PRP22', 'TP001', 4, 4, 4),
('PRP23', 'TP001', 4, 4, 4),
('PRP24', 'TP001', 4, 4, 3),
('PRP25', 'TP001', 4, 4, 4),
('PRP26', 'TP001', 5, 4, 5),
('PRP27', 'TP001', 5, 5, 5),
('PRP28', 'TP001', 4, 4, 4),
('PRP29', 'TP001', 5, 5, 5),
('PRP30', 'TP001', 5, 5, 5),
('PRP31', 'TP001', 4, 4, 4),
('PRP32', 'TP001', 3, 4, 4),
('PRP33', 'TP001', 5, 4, 4),
('PRP34', 'TP001', 4, 0, 0),
('PRP35', 'TP001', 4, 4, 4),
('PRP36', 'TP001', 4, 0, 0),
('PRP37', 'TP001', 4, 0, 0),
('PRP38', 'TP001', 4, 0, 0),
('PRP01', 'TP002', 6, 6, 6),
('PRP02', 'TP002', 6, 6, 6),
('PRP03', 'TP002', 6, 7, 7),
('PRP04', 'TP002', 3, 3, 3),
('PRP05', 'TP002', 6, 6, 17),
('PRP06', 'TP002', 6, 8, 6),
('PRP07', 'TP002', 6, 7, 6),
('PRP08', 'TP002', 7, 6, 7),
('PRP09', 'TP002', 0, 4, 4),
('PRP10', 'TP002', 5, 5, 5),
('PRP11', 'TP002', 0, 0, 0),
('PRP12', 'TP002', 7, 8, 7),
('PRP13', 'TP002', 6, 6, 6),
('PRP14', 'TP002', 5, 5, 5),
('PRP15', 'TP002', 6, 6, 6),
('PRP16', 'TP002', 7, 8, 7),
('PRP17', 'TP002', 4, 5, 5),
('PRP18', 'TP002', 7, 7, 6),
('PRP19', 'TP002', 3, 3, 3),
('PRP20', 'TP002', 4, 4, 0),
('PRP21', 'TP002', 0, 5, 5),
('PRP22', 'TP002', 6, 6, 6),
('PRP23', 'TP002', 6, 5, 6),
('PRP24', 'TP002', 5, 5, 5),
('PRP25', 'TP002', 3, 3, 4),
('PRP26', 'TP002', 4, 4, 4),
('PRP27', 'TP002', 6, 6, 6),
('PRP28', 'TP002', 4, 4, 4),
('PRP29', 'TP002', 5, 5, 5),
('PRP30', 'TP002', 5, 5, 5),
('PRP31', 'TP002', 0, 0, 0),
('PRP32', 'TP002', 5, 5, 5),
('PRP33', 'TP002', 4, 5, 4),
('PRP34', 'TP002', 5, 5, 5);

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
(1, 'Jakarta', '-6.2088', '106.8456'),
(2, 'Bandung', '-6.9175', '107.6191'),
(3, 'Surabaya', '-7.2504', '112.7688'),
(4, 'Yogyakarta', '-7.7956', '110.3695'),
(5, 'Medan', '3.5952', '98.6722'),
(6, 'Denpasar', '-8.6500', '115.2167'),
(7, 'Makassar', '-5.1477', '119.4327'),
(8, 'Semarang', '-6.9667', '110.4167'),
(9, 'Palembang', '-2.9167', '104.7458'),
(10, 'Banda Aceh', '5.5483', '95.3238'),
(11, 'Manado', '1.4748', '124.8428'),
(12, 'Pontianak', '-0.0266', '109.3425'),
(13, 'Balikpapan', '-1.2654', '116.8312'),
(14, 'Padang', '-0.9471', '100.4172'),
(15, 'Pekanbaru', '0.5071', '101.4478'),
(16, 'Malang', '-7.9839', '112.6214'),
(17, 'Banjarmasin', '-3.3167', '114.5900'),
(18, 'Kupang', '-10.1788', '123.5972'),
(19, 'Jayapura', '-2.5337', '140.7181'),
(20, 'Ambon', '-3.6547', '128.1900'),
(21, 'Mataram', '-8.5833', '116.1167'),
(22, 'Palangkaraya', '-2.2096', '113.9166'),
(23, 'Ternate', '0.7893', '127.3764'),
(24, 'Palu', '-0.8987', '119.8707'),
(25, 'Kendari', '-3.9728', '122.5126'),
(26, 'Tarakan', '3.3131', '117.5913'),
(27, 'Gorontalo', '0.5475', '123.0650'),
(28, 'Sorong', '-0.8762', '131.2558'),
(29, 'Tanjung Pinang', '0.9203', '104.4587'),
(30, 'Batam', '1.0456', '104.0305'),
(31, 'Samarinda', '-0.5022', '117.1536'),
(32, 'Pangkal Pinang', '-2.1293', '106.1132'),
(33, 'Lhokseumawe', '5.1877', '97.1413'),
(34, 'Sibolga', '1.7426', '98.7806'),
(35, 'Bengkulu', '-3.8004', '102.2655'),
(36, 'Jambi', '-1.6100', '103.6131'),
(37, 'Probolinggo', '-7.7543', '113.2130'),
(38, 'Cirebon', '-6.7172', '108.5561'),
(39, 'Tegal', '-6.8697', '109.1256'),
(40, 'Purwokerto', '-7.4243', '109.2396'),
(41, 'Kudus', '-6.8045', '110.8406'),
(42, 'Magelang', '-7.4705', '110.2173'),
(43, 'Pekalongan', '-6.8880', '109.6753'),
(44, 'Salatiga', '-7.3305', '110.5084'),
(45, 'Cilacap', '-7.7167', '109.0000'),
(46, 'Sukabumi', '-6.9271', '106.9262'),
(47, 'Ciamis', '-7.3331', '108.3498'),
(48, 'Garut', '-7.2115', '107.9006'),
(49, 'Tasikmalaya', '-7.3500', '108.2170'),
(50, 'Baturaja', '-4.1334', '104.1675'),
(51, 'Blitar', '-8.0952', '112.1590'),
(52, 'Kediri', '-7.8480', '112.0179'),
(53, 'Mojokerto', '-7.4726', '112.4338'),
(54, 'Pasuruan', '-7.6453', '112.9075'),
(55, 'Lumajang', '-8.1335', '113.2247'),
(56, 'Jember', '-8.1845', '113.6681'),
(57, 'Situbondo', '-7.7066', '114.0098'),
(58, 'Bondowoso', '-7.9138', '113.8214'),
(59, 'Banyuwangi', '-8.2191', '114.3691'),
(60, 'Sampang', '-7.1900', '113.2424'),
(61, 'Pamekasan', '-7.1588', '113.4746'),
(62, 'Sumenep', '-7.0244', '113.8588'),
(63, 'Bangil', '-7.5990', '112.8159'),
(64, 'Ponorogo', '-7.8683', '111.4693'),
(65, 'Pacitan', '-8.2093', '111.4054'),
(66, 'Trenggalek', '-8.0591', '111.7064'),
(67, 'Ngawi', '-7.4037', '111.4465'),
(68, 'Magetan', '-7.6455', '111.3580'),
(69, 'Madiun', '-7.6297', '111.5235'),
(70, 'Bojonegoro', '-7.1500', '111.8816'),
(71, 'Tuban', '-6.8976', '112.0644'),
(72, 'Lamongan', '-7.1169', '112.4147'),
(73, 'Gresik', '-7.1538', '112.6555'),
(74, 'Sidoarjo', '-7.4478', '112.7183'),
(75, 'Serang', '-6.1203', '106.1505'),
(76, 'Tangerang', '-6.1783', '106.6319'),
(77, 'Depok', '-6.4025', '106.7942'),
(78, 'Bekasi', '-6.2383', '106.9756'),
(79, 'Bogor', '-6.5950', '106.8166'),
(80, 'Cilegon', '-6.0025', '106.0110'),
(81, 'Cianjur', '-6.8142', '107.1427'),
(82, 'Subang', '-6.5763', '107.7612'),
(83, 'Indramayu', '-6.3275', '108.3249'),
(84, 'Sumedang', '-6.8509', '107.9210'),
(85, 'Majalengka', '-6.8392', '108.2270'),
(86, 'Kuningan', '-6.9821', '108.4851'),
(87, 'Purwakarta', '-6.5413', '107.4483'),
(88, 'Karawang', '-6.3059', '107.3047'),
(89, 'Tuban', '-6.8976', '112.0644'),
(90, 'Banjar', '-7.3709', '108.5347'),
(91, 'Batang', '-6.4843', '109.7386'),
(92, 'Brebes', '-6.8700', '108.8830'),
(93, 'Jepara', '-6.5700', '110.6790'),
(94, 'Kendal', '-6.9402', '110.2051'),
(95, 'Klaten', '-7.7069', '110.6092'),
(96, 'Wonogiri', '-7.8941', '110.9245'),
(97, 'Boyolali', '-7.5293', '110.6016'),
(98, 'Sragen', '-7.4258', '111.0238'),
(99, 'Pemalang', '-6.8889', '109.3772'),
(100, 'Temanggung', '-7.3169', '110.1647');

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
-- Table structure for table `tb_jenis_varietas`
--

CREATE TABLE `tb_jenis_varietas` (
  `id_jenis_varietas` varchar(10) NOT NULL,
  `nama_jenis_varietas` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_jenis_varietas`
--

INSERT INTO `tb_jenis_varietas` (`id_jenis_varietas`, `nama_jenis_varietas`) VALUES
('VJ001', 'Jagung Quality Protein Maize'),
('VJ002', 'Jagung Provit A Tinggi'),
('VJ003', 'Jagung Pulut'),
('VJ004', 'Jagung Antosianin Tinggi'),
('VP001', 'Padi Hibrida'),
('VP002', 'Padi Unggul'),
('VP003', 'Padi Lokal');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelebihan_kekurangan`
--

CREATE TABLE `tb_kelebihan_kekurangan` (
  `id_tanamanpangan` varchar(10) NOT NULL,
  `id_varietas` varchar(10) NOT NULL,
  `kelebihan` varchar(500) NOT NULL,
  `kekurangan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kelebihan_kekurangan`
--

INSERT INTO `tb_kelebihan_kekurangan` (`id_tanamanpangan`, `id_varietas`, `kelebihan`, `kekurangan`) VALUES
('TP001', 'VP001', 'potensi hasil panen yang maksimal', 'kualitas hasilnya akan berkurang jauh apabila berasal dari tanaman turunannya.'),
('TP001', 'VP001', 'Hasil panen dapat mencapai dua kali lipat dari padi lokal.', 'Harga benih varietas hibrida ini termasuk yang termahal.'),
('TP001', 'VP001', 'Butiran padi yang dihasilkan lebih bagus', 'padi yang hanya sekali tanam'),
('TP001', 'VP001', 'kualitas nasi yang lebih pulen dan wangi.', ''),
('TP001', 'VP002', 'Varietas ini dapat ditanam berkali-kali dengan kualitas yang sama', 'Harga benih lebih mahal: Benih varietas padi unggul umumnya lebih mahal dibandingkan benih varietas lokal.'),
('TP001', 'VP002', 'Harga benih padi unggul pun tidak semahal benih padi hibrida', 'Membutuhkan perawatan lebih intensif: Beberapa varietas padi unggul membutuhkan perawatan yang lebih intensif, seperti pemupukan dan pengendalian hama penyakit yang lebih teratur.'),
('TP001', 'VP002', 'ketahanannya terhadap hama wereng cokelat.', 'Berpotensi mengurangi keanekaragaman genetik: Penggunaan varietas padi unggul secara luas dapat mengurangi keanekaragaman genetik padi, yang dapat berdampak negatif pada ketahanan pangan jangka panjang.'),
('TP001', 'VP002', '', 'Tergantung pada input eksternal: Varietas padi unggul seringkali membutuhkan input eksternal seperti pupuk dan pestisida, yang dapat meningkatkan biaya produksi dan berdampak negatif pada lingkungan.'),
('TP001', 'VP002', '', 'Tidak selalu cocok untuk semua kondisi lingkungan: Meskipun beberapa varietas padi unggul memiliki toleransi terhadap kondisi lingkungan tertentu, tidak semua varietas cocok untuk semua kondisi lingkungan.'),
('TP001', 'VP003', 'Rasa dan aroma khas', 'Produktivitas relatif rendah'),
('TP001', 'VP003', 'Adaptasi tinggi terhadap lingkungan lokal', 'Umur panen relatif panjang'),
('TP001', 'VP003', 'Keanekaragaman genetik', 'Kerentanan terhadap hama dan penyakit tertentu'),
('TP001', 'VP003', 'Nilai budaya dan sosial', 'Ketersediaan benih terbatas'),
('TP001', 'VP003', 'Harga jual relatif tinggi', 'Perawatan lebih intensif'),
('TP002', 'VJ001', 'Lebih bergizi (tinggi protein)', 'Rentan hama dan penyakit'),
('TP002', 'VJ001', 'Baik untuk mengatasi kekurangan gizi', 'Tekstur lunak, mudah diserang hama pascapanen'),
('TP002', 'VJ001', 'Serbaguna, bisa diolah jadi macam-macam', 'Benih susah didapat'),
('TP002', 'VJ001', 'Potensi hasil panen tinggi', 'Harga benih mahal'),
('TP002', 'VJ002', 'Kandungan beta karoten tinggi: Penting untuk penglihatan, sistem kekebalan tubuh, dan pertumbuhan.', 'Rasa dan tekstur: Mungkin sedikit berbeda dari jagung biasa.'),
('TP002', 'VJ002', 'Potensi hasil baik: Mencapai 7,4 - 8,8 ton/ha.', 'Ketersediaan: Belum tentu tersedia di semua daerah.'),
('TP002', 'VJ002', 'Perlindungan tongkol baik: Kelobot menutup tongkol dengan baik, melindungi dari hama.', 'Harga: Bibit mungkin sedikit lebih mahal.'),
('TP002', 'VJ002', 'Rendemen tinggi: Proporsi biji yang dapat dipanen besar.', ''),
('TP002', 'VJ003', 'Rasa gurih dan tekstur pulen.', 'Produktivitas rendah.'),
('TP002', 'VJ003', 'Bisa diolah jadi beragam makanan.', 'Rentan hama dan penyakit.'),
('TP002', 'VJ003', 'Indeks glikemik lebih rendah.', 'Harga lebih mahal.'),
('TP002', 'VJ003', 'Umur panen relatif pendek.', ''),
('TP002', 'VJ004', 'Kaya antioksidan, baik untuk kesehatan.', 'Produktivitas mungkin lebih rendah.'),
('TP002', 'VJ004', 'Berpotensi sebagai pangan fungsional bernilai jual tinggi.', 'Perawatan bisa lebih rumit.'),
('TP002', 'VJ004', 'Alternatif pangan sehat.', 'Harga benih lebih mahal.'),
('TP002', 'VJ004', '', 'Pengolahan perlu diperhatikan agar antosianin tidak rusak.');

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
(1, 'Pada Padi di daerah Jakarta sangat cocok ditanami pada bulan Februari karena padi membutuhkan air yang cukup meski di musim kemarau. Prediksi panen padi sekitar 120-140 hari.', '2024-02-01', '/backend/icons/iconPadi.png', 'TP001', 'IK001', 1),
(2, 'Pada Jagung di daerah Bandung sangat cocok ditanami pada bulan Maret karena jagung membutuhkan sinar matahari yang cukup. Prediksi panen jagung sekitar 70-90 hari.', '2024-03-01', '/backend/icons/iconJagung.png', 'TP002', 'IK001', 2),
(3, 'Pada Kedelai di daerah Surabaya sangat cocok ditanami pada bulan April karena kedelai tahan terhadap kondisi kering. Prediksi panen kedelai sekitar 80-100 hari.', '2024-04-01', '/backend/icons/iconKedelai.png', 'TP003', 'IK002', 3),
(4, 'Pada Kentang di daerah Yogyakarta sangat cocok ditanami pada bulan Mei karena kentang membutuhkan suhu dingin untuk tumbuh dengan baik. Prediksi panen kentang sekitar 70-90 hari.', '2024-05-01', '/backend/icons/iconKentang.png', 'TP006', 'IK002', 4),
(5, 'Pada Singkong di daerah Medan sangat cocok ditanami pada bulan Juni karena singkong dapat tumbuh baik meski di musim kemarau. Prediksi panen singkong sekitar 8-12 bulan.', '2024-06-01', '/backend/icons/iconSingkong.png', 'TP005', 'IK001', 5),
(6, 'Pada Padi di daerah Denpasar sangat cocok ditanami pada bulan Juli karena padi membutuhkan air yang cukup meski di musim kemarau. Prediksi panen padi sekitar 120-140 hari.', '2024-07-01', '/backend/icons/iconPadi.png', 'TP001', 'IK001', 6),
(7, 'Pada Jagung di daerah Makassar sangat cocok ditanami pada bulan Agustus karena jagung membutuhkan sinar matahari yang cukup. Prediksi panen jagung sekitar 70-90 hari.', '2024-08-01', '/backend/icons/iconJagung.png', 'TP002', 'IK001', 7),
(8, 'Pada Kedelai di daerah Semarang sangat cocok ditanami pada bulan September karena kedelai tahan terhadap kondisi kering. Prediksi panen kedelai sekitar 80-100 hari.', '2024-09-01', '/backend/icons/iconKedelai.png', 'TP003', 'IK002', 8),
(9, 'Pada Kentang di daerah Palembang sangat cocok ditanami pada bulan Oktober karena kentang membutuhkan suhu dingin untuk tumbuh dengan baik. Prediksi panen kentang sekitar 70-90 hari.', '2024-10-01', '/backend/icons/iconKentang.png', 'TP006', 'IK002', 9),
(10, 'Pada Singkong di daerah Banda Aceh sangat cocok ditanami pada bulan November karena singkong dapat tumbuh baik meski di musim kemarau. Prediksi panen singkong sekitar 8-12 bulan.', '2024-11-01', '/backend/icons/iconSingkong.png', 'TP005', 'IK001', 10),
(11, 'Pada Padi di daerah Manado sangat cocok ditanami pada bulan Desember karena padi membutuhkan air yang cukup meski di musim kemarau. Prediksi panen padi sekitar 120-140 hari.', '2024-12-01', '/backend/icons/iconPadi.png', 'TP001', 'IK001', 11),
(12, 'Pada Jagung di daerah Pontianak sangat cocok ditanami pada bulan Januari karena jagung membutuhkan sinar matahari yang cukup. Prediksi panen jagung sekitar 70-90 hari.', '2024-01-01', '/backend/icons/iconJagung.png', 'TP002', 'IK001', 12),
(13, 'Pada Kedelai di daerah Balikpapan sangat cocok ditanami pada bulan Februari karena kedelai tahan terhadap kondisi kering. Prediksi panen kedelai sekitar 80-100 hari.', '2024-02-01', '/backend/icons/iconKedelai.png', 'TP003', 'IK002', 13),
(14, 'Pada Kentang di daerah Padang sangat cocok ditanami pada bulan Maret karena kentang membutuhkan suhu dingin untuk tumbuh dengan baik. Prediksi panen kentang sekitar 70-90 hari.', '2024-03-01', '/backend/icons/iconKentang.png', 'TP006', 'IK002', 14),
(15, 'Pada Singkong di daerah Pekanbaru sangat cocok ditanami pada bulan April karena singkong dapat tumbuh baik meski di musim kemarau. Prediksi panen singkong sekitar 8-12 bulan.', '2024-04-01', '/backend/icons/iconSingkong.png', 'TP005', 'IK001', 15),
(16, 'Pada Padi di daerah Malang sangat cocok ditanami pada bulan Mei karena padi membutuhkan air yang cukup meski di musim kemarau. Prediksi panen padi sekitar 120-140 hari.', '2024-05-01', '/backend/icons/iconPadi.png', 'TP001', 'IK001', 16),
(17, 'Pada Jagung di daerah Banjarmasin sangat cocok ditanami pada bulan Juni karena jagung membutuhkan sinar matahari yang cukup. Prediksi panen jagung sekitar 70-90 hari.', '2024-06-01', '/backend/icons/iconJagung.png', 'TP002', 'IK001', 17),
(18, 'Pada Kedelai di daerah Kupang sangat cocok ditanami pada bulan Juli karena kedelai tahan terhadap kondisi kering. Prediksi panen kedelai sekitar 80-100 hari.', '2024-07-01', '/backend/icons/iconKedelai.png', 'TP003', 'IK002', 18),
(19, 'Pada Kentang di daerah Jayapura sangat cocok ditanami pada bulan Agustus karena kentang membutuhkan suhu dingin untuk tumbuh dengan baik. Prediksi panen kentang sekitar 70-90 hari.', '2024-08-01', '/backend/icons/iconKentang.png', 'TP006', 'IK002', 19),
(20, 'Pada Singkong di daerah Ambon sangat cocok ditanami pada bulan September karena singkong dapat tumbuh baik meski di musim kemarau. Prediksi panen singkong sekitar 8-12 bulan.', '2024-09-01', '/backend/icons/iconSingkong.png', 'TP005', 'IK001', 20),
(21, 'Pada Padi di daerah Mataram sangat cocok ditanami pada bulan Oktober karena padi membutuhkan air yang cukup meski di musim kemarau. Prediksi panen padi sekitar 120-140 hari.', '2024-10-01', '/backend/icons/iconPadi.png', 'TP001', 'IK001', 21),
(22, 'Pada Jagung di daerah Palangkaraya sangat cocok ditanami pada bulan November karena jagung membutuhkan sinar matahari yang cukup. Prediksi panen jagung sekitar 70-90 hari.', '2024-11-01', '/backend/icons/iconJagung.png', 'TP002', 'IK001', 22),
(23, 'Pada Kedelai di daerah Ternate sangat cocok ditanami pada bulan Desember karena kedelai tahan terhadap kondisi kering. Prediksi panen kedelai sekitar 80-100 hari.', '2024-12-01', '/backend/icons/iconKedelai.png', 'TP003', 'IK002', 23),
(24, 'Pada Kentang di daerah Palu sangat cocok ditanami pada bulan Januari karena kentang membutuhkan suhu dingin untuk tumbuh dengan baik. Prediksi panen kentang sekitar 70-90 hari.', '2024-01-01', '/backend/icons/iconKentang.png', 'TP006', 'IK002', 24),
(25, 'Pada Singkong di daerah Kendari sangat cocok ditanami pada bulan Februari karena singkong dapat tumbuh baik meski di musim kemarau. Prediksi panen singkong sekitar 8-12 bulan.', '2024-02-01', '/backend/icons/iconSingkong.png', 'TP005', 'IK001', 25),
(26, 'Pada Padi di daerah Tarakan sangat cocok ditanami pada bulan Maret karena padi membutuhkan air yang cukup meski di musim kemarau. Prediksi panen padi sekitar 120-140 hari.', '2024-03-01', '/backend/icons/iconPadi.png', 'TP001', 'IK001', 26),
(27, 'Pada Jagung di daerah Gorontalo sangat cocok ditanami pada bulan April karena jagung membutuhkan sinar matahari yang cukup. Prediksi panen jagung sekitar 70-90 hari.', '2024-04-01', '/backend/icons/iconJagung.png', 'TP002', 'IK001', 27),
(28, 'Pada Kedelai di daerah Sorong sangat cocok ditanami pada bulan Mei karena kedelai tahan terhadap kondisi kering. Prediksi panen kedelai sekitar 80-100 hari.', '2024-05-01', '/backend/icons/iconKedelai.png', 'TP003', 'IK002', 28),
(29, 'Pada Kentang di daerah Tanjung Pinang sangat cocok ditanami pada bulan Juni karena kentang membutuhkan suhu dingin untuk tumbuh dengan baik. Prediksi panen kentang sekitar 70-90 hari.', '2024-06-01', '/backend/icons/iconKentang.png', 'TP006', 'IK002', 29),
(30, 'Pada Singkong di daerah Batam sangat cocok ditanami pada bulan Juli karena singkong dapat tumbuh baik meski di musim kemarau. Prediksi panen singkong sekitar 8-12 bulan.', '2024-07-01', '/backend/icons/iconSingkong.png', 'TP005', 'IK001', 30),
(31, 'Pada Padi di daerah Samarinda sangat cocok ditanami pada bulan Agustus karena padi membutuhkan air yang cukup meski di musim kemarau. Prediksi panen padi sekitar 120-140 hari.', '2024-08-01', '/backend/icons/iconPadi.png', 'TP001', 'IK001', 31),
(32, 'Pada Jagung di daerah Pangkal Pinang sangat cocok ditanami pada bulan September karena jagung membutuhkan sinar matahari yang cukup. Prediksi panen jagung sekitar 70-90 hari.', '2024-09-01', '/backend/icons/iconJagung.png', 'TP002', 'IK001', 32),
(33, 'Pada Kedelai di daerah Lhokseumawe sangat cocok ditanami pada bulan Oktober karena kedelai tahan terhadap kondisi kering. Prediksi panen kedelai sekitar 80-100 hari.', '2024-10-01', '/backend/icons/iconKedelai.png', 'TP003', 'IK002', 33),
(34, 'Pada Kentang di daerah Sibolga sangat cocok ditanami pada bulan November karena kentang membutuhkan suhu dingin untuk tumbuh dengan baik. Prediksi panen kentang sekitar 70-90 hari.', '2024-11-01', '/backend/icons/iconKentang.png', 'TP006', 'IK002', 34),
(35, 'Pada Singkong di daerah Bengkulu sangat cocok ditanami pada bulan Desember karena singkong dapat tumbuh baik meski di musim kemarau. Prediksi panen singkong sekitar 8-12 bulan.', '2024-12-01', '/backend/icons/iconSingkong.png', 'TP005', 'IK001', 35),
(36, 'Pada Padi di daerah Jambi sangat cocok ditanami pada bulan Januari karena padi membutuhkan air yang cukup meski di musim kemarau. Prediksi panen padi sekitar 120-140 hari.', '2024-01-01', '/backend/icons/iconPadi.png', 'TP001', 'IK001', 36),
(37, 'Pada Jagung di daerah Probolinggo sangat cocok ditanami pada bulan Februari karena jagung membutuhkan sinar matahari yang cukup. Prediksi panen jagung sekitar 70-90 hari.', '2024-02-01', '/backend/icons/iconJagung.png', 'TP002', 'IK001', 37),
(38, 'Pada Kedelai di daerah Cirebon sangat cocok ditanami pada bulan Maret karena kedelai tahan terhadap kondisi kering. Prediksi panen kedelai sekitar 80-100 hari.', '2024-03-01', '/backend/icons/iconKedelai.png', 'TP003', 'IK002', 38),
(39, 'Pada Kentang di daerah Tegal sangat cocok ditanami pada bulan April karena kentang membutuhkan suhu dingin untuk tumbuh dengan baik. Prediksi panen kentang sekitar 70-90 hari.', '2024-04-01', '/backend/icons/iconKentang.png', 'TP006', 'IK002', 39),
(40, 'Pada Singkong di daerah Purwokerto sangat cocok ditanami pada bulan Mei karena singkong dapat tumbuh baik meski di musim kemarau. Prediksi panen singkong sekitar 8-12 bulan.', '2024-05-01', '/backend/icons/iconSingkong.png', 'TP005', 'IK001', 40),
(41, 'Pada Padi di daerah Kudus sangat cocok ditanami pada bulan Juni karena padi membutuhkan air yang cukup meski di musim kemarau. Prediksi panen padi sekitar 120-140 hari.', '2024-06-01', '/backend/icons/iconPadi.png', 'TP001', 'IK001', 41),
(42, 'Pada Jagung di daerah Magelang sangat cocok ditanami pada bulan Juli karena jagung membutuhkan sinar matahari yang cukup. Prediksi panen jagung sekitar 70-90 hari.', '2024-07-01', '/backend/icons/iconJagung.png', 'TP002', 'IK001', 42),
(43, 'Pada Kedelai di daerah Pekalongan sangat cocok ditanami pada bulan Agustus karena kedelai tahan terhadap kondisi kering. Prediksi panen kedelai sekitar 80-100 hari.', '2024-08-01', '/backend/icons/iconKedelai.png', 'TP003', 'IK002', 43),
(44, 'Pada Kentang di daerah Salatiga sangat cocok ditanami pada bulan September karena kentang membutuhkan suhu dingin untuk tumbuh dengan baik. Prediksi panen kentang sekitar 70-90 hari.', '2024-09-01', '/backend/icons/iconKentang.png', 'TP006', 'IK002', 44),
(45, 'Pada Singkong di daerah Cilacap sangat cocok ditanami pada bulan Oktober karena singkong dapat tumbuh baik meski di musim kemarau. Prediksi panen singkong sekitar 8-12 bulan.', '2024-10-01', '/backend/icons/iconSingkong.png', 'TP005', 'IK001', 45),
(46, 'Pada Padi di daerah Sukabumi sangat cocok ditanami pada bulan November karena padi membutuhkan air yang cukup meski di musim kemarau. Prediksi panen padi sekitar 120-140 hari.', '2024-11-01', '/backend/icons/iconPadi.png', 'TP001', 'IK001', 46),
(47, 'Pada Jagung di daerah Ciamis sangat cocok ditanami pada bulan Desember karena jagung membutuhkan sinar matahari yang cukup. Prediksi panen jagung sekitar 70-90 hari.', '2024-12-01', '/backend/icons/iconJagung.png', 'TP002', 'IK001', 47),
(48, 'Pada Kedelai di daerah Garut sangat cocok ditanami pada bulan Januari karena kedelai tahan terhadap kondisi kering. Prediksi panen kedelai sekitar 80-100 hari.', '2024-01-01', '/backend/icons/iconKedelai.png', 'TP003', 'IK002', 48),
(49, 'Pada Kentang di daerah Tasikmalaya sangat cocok ditanami pada bulan Februari karena kentang membutuhkan suhu dingin untuk tumbuh dengan baik. Prediksi panen kentang sekitar 70-90 hari.', '2024-02-01', '/backend/icons/iconKentang.png', 'TP006', 'IK002', 49),
(50, 'Pada Singkong di daerah Baturaja sangat cocok ditanami pada bulan Maret karena singkong dapat tumbuh baik meski di musim kemarau. Prediksi panen singkong sekitar 8-12 bulan.', '2024-03-01', '/backend/icons/iconSingkong.png', 'TP005', 'IK001', 50),
(51, 'Pada Padi di daerah Blitar sangat cocok ditanami pada bulan April karena padi membutuhkan air yang cukup meski di musim kemarau. Prediksi panen padi sekitar 120-140 hari.', '2024-04-01', '/backend/icons/iconPadi.png', 'TP001', 'IK001', 51),
(52, 'Pada Jagung di daerah Kediri sangat cocok ditanami pada bulan Mei karena jagung membutuhkan sinar matahari yang cukup. Prediksi panen jagung sekitar 70-90 hari.', '2024-05-01', '/backend/icons/iconJagung.png', 'TP002', 'IK001', 52),
(53, 'Pada Kedelai di daerah Mojokerto sangat cocok ditanami pada bulan Juni karena kedelai tahan terhadap kondisi kering. Prediksi panen kedelai sekitar 80-100 hari.', '2024-06-01', '/backend/icons/iconKedelai.png', 'TP003', 'IK002', 53),
(54, 'Pada Kentang di daerah Pasuruan sangat cocok ditanami pada bulan Juli karena kentang membutuhkan suhu dingin untuk tumbuh dengan baik. Prediksi panen kentang sekitar 70-90 hari.', '2024-07-01', '/backend/icons/iconKentang.png', 'TP006', 'IK002', 54),
(55, 'Pada Singkong di daerah Lumajang sangat cocok ditanami pada bulan Agustus karena singkong dapat tumbuh baik meski di musim kemarau. Prediksi panen singkong sekitar 8-12 bulan.', '2024-08-01', '/backend/icons/iconSingkong.png', 'TP005', 'IK001', 55),
(56, 'Pada Padi di daerah Jember sangat cocok ditanami pada bulan September karena padi membutuhkan air yang cukup meski di musim kemarau. Prediksi panen padi sekitar 120-140 hari.', '2024-09-01', '/backend/icons/iconPadi.png', 'TP001', 'IK001', 56),
(57, 'Pada Jagung di daerah Situbondo sangat cocok ditanami pada bulan Oktober karena jagung membutuhkan sinar matahari yang cukup. Prediksi panen jagung sekitar 70-90 hari.', '2024-10-01', '/backend/icons/iconJagung.png', 'TP002', 'IK001', 57),
(58, 'Pada Kedelai di daerah Bondowoso sangat cocok ditanami pada bulan November karena kedelai tahan terhadap kondisi kering. Prediksi panen kedelai sekitar 80-100 hari.', '2024-11-01', '/backend/icons/iconKedelai.png', 'TP003', 'IK002', 58),
(59, 'Pada Kentang di daerah Banyuwangi sangat cocok ditanami pada bulan Desember karena kentang membutuhkan suhu dingin untuk tumbuh dengan baik. Prediksi panen kentang sekitar 70-90 hari.', '2024-12-01', '/backend/icons/iconKentang.png', 'TP006', 'IK002', 59),
(60, 'Pada Singkong di daerah Sampang sangat cocok ditanami pada bulan Januari karena singkong dapat tumbuh baik meski di musim kemarau. Prediksi panen singkong sekitar 8-12 bulan.', '2024-01-01', '/backend/icons/iconSingkong.png', 'TP005', 'IK001', 60),
(61, 'Pada Padi di daerah Pamekasan sangat cocok ditanami pada bulan Februari karena padi membutuhkan air yang cukup meski di musim kemarau. Prediksi panen padi sekitar 120-140 hari.', '2024-02-01', '/backend/icons/iconPadi.png', 'TP001', 'IK001', 61),
(62, 'Pada Jagung di daerah Sumenep sangat cocok ditanami pada bulan Maret karena jagung membutuhkan sinar matahari yang cukup. Prediksi panen jagung sekitar 70-90 hari.', '2024-03-01', '/backend/icons/iconJagung.png', 'TP002', 'IK001', 62),
(63, 'Pada Kedelai di daerah Bangil sangat cocok ditanami pada bulan April karena kedelai tahan terhadap kondisi kering. Prediksi panen kedelai sekitar 80-100 hari.', '2024-04-01', '/backend/icons/iconKedelai.png', 'TP003', 'IK002', 63),
(64, 'Pada Kentang di daerah Ponorogo sangat cocok ditanami pada bulan Mei karena kentang membutuhkan suhu dingin untuk tumbuh dengan baik. Prediksi panen kentang sekitar 70-90 hari.', '2024-05-01', '/backend/icons/iconKentang.png', 'TP006', 'IK002', 64),
(65, 'Pada Singkong di daerah Pacitan sangat cocok ditanami pada bulan Juni karena singkong dapat tumbuh baik meski di musim kemarau. Prediksi panen singkong sekitar 8-12 bulan.', '2024-06-01', '/backend/icons/iconSingkong.png', 'TP005', 'IK001', 65),
(66, 'Pada Padi di daerah Trenggalek sangat cocok ditanami pada bulan Juli karena padi membutuhkan air yang cukup meski di musim kemarau. Prediksi panen padi sekitar 120-140 hari.', '2024-07-01', '/backend/icons/iconPadi.png', 'TP001', 'IK001', 66),
(67, 'Pada Jagung di daerah Ngawi sangat cocok ditanami pada bulan Agustus karena jagung membutuhkan sinar matahari yang cukup. Prediksi panen jagung sekitar 70-90 hari.', '2024-08-01', '/backend/icons/iconJagung.png', 'TP002', 'IK001', 67),
(68, 'Pada Kedelai di daerah Magetan sangat cocok ditanami pada bulan September karena kedelai tahan terhadap kondisi kering. Prediksi panen kedelai sekitar 80-100 hari.', '2024-09-01', '/backend/icons/iconKedelai.png', 'TP003', 'IK002', 68),
(69, 'Pada Kentang di daerah Madiun sangat cocok ditanami pada bulan Oktober karena kentang membutuhkan suhu dingin untuk tumbuh dengan baik. Prediksi panen kentang sekitar 70-90 hari.', '2024-10-01', '/backend/icons/iconKentang.png', 'TP006', 'IK002', 69),
(70, 'Pada Singkong di daerah Bojonegoro sangat cocok ditanami pada bulan November karena singkong dapat tumbuh baik meski di musim kemarau. Prediksi panen singkong sekitar 8-12 bulan.', '2024-11-01', '/backend/icons/iconSingkong.png', 'TP005', 'IK001', 70),
(71, 'Pada Padi di daerah Tuban sangat cocok ditanami pada bulan Desember karena padi membutuhkan air yang cukup meski di musim kemarau. Prediksi panen padi sekitar 120-140 hari.', '2024-12-01', '/backend/icons/iconPadi.png', 'TP001', 'IK001', 71),
(72, 'Pada Jagung di daerah Lamongan sangat cocok ditanami pada bulan Januari karena jagung membutuhkan sinar matahari yang cukup. Prediksi panen jagung sekitar 70-90 hari.', '2024-01-01', '/backend/icons/iconJagung.png', 'TP002', 'IK001', 72),
(73, 'Pada Kedelai di daerah Gresik sangat cocok ditanami pada bulan Februari karena kedelai tahan terhadap kondisi kering. Prediksi panen kedelai sekitar 80-100 hari.', '2024-02-01', '/backend/icons/iconKedelai.png', 'TP003', 'IK002', 73),
(74, 'Pada Kentang di daerah Sidoarjo sangat cocok ditanami pada bulan Maret karena kentang membutuhkan suhu dingin untuk tumbuh dengan baik. Prediksi panen kentang sekitar 70-90 hari.', '2024-03-01', '/backend/icons/iconKentang.png', 'TP006', 'IK002', 74),
(75, 'Pada Singkong di daerah Serang sangat cocok ditanami pada bulan April karena singkong dapat tumbuh baik meski di musim kemarau. Prediksi panen singkong sekitar 8-12 bulan.', '2024-04-01', '/backend/icons/iconSingkong.png', 'TP005', 'IK001', 75),
(76, 'Pada Padi di daerah Tangerang sangat cocok ditanami pada bulan Mei karena padi membutuhkan air yang cukup meski di musim kemarau. Prediksi panen padi sekitar 120-140 hari.', '2024-05-01', '/backend/icons/iconPadi.png', 'TP001', 'IK001', 76),
(77, 'Pada Jagung di daerah Depok sangat cocok ditanami pada bulan Juni karena jagung membutuhkan sinar matahari yang cukup. Prediksi panen jagung sekitar 70-90 hari.', '2024-06-01', '/backend/icons/iconJagung.png', 'TP002', 'IK001', 77),
(78, 'Pada Kedelai di daerah Bekasi sangat cocok ditanami pada bulan Juli karena kedelai tahan terhadap kondisi kering. Prediksi panen kedelai sekitar 80-100 hari.', '2024-07-01', '/backend/icons/iconKedelai.png', 'TP003', 'IK002', 78),
(79, 'Pada Kentang di daerah Bogor sangat cocok ditanami pada bulan Agustus karena kentang membutuhkan suhu dingin untuk tumbuh dengan baik. Prediksi panen kentang sekitar 70-90 hari.', '2024-08-01', '/backend/icons/iconKentang.png', 'TP006', 'IK002', 79),
(80, 'Pada Singkong di daerah Cilegon sangat cocok ditanami pada bulan September karena singkong dapat tumbuh baik meski di musim kemarau. Prediksi panen singkong sekitar 8-12 bulan.', '2024-09-01', '/backend/icons/iconSingkong.png', 'TP005', 'IK001', 80),
(81, 'Pada Padi di daerah Cianjur sangat cocok ditanami pada bulan Oktober karena padi membutuhkan air yang cukup meski di musim kemarau. Prediksi panen padi sekitar 120-140 hari.', '2024-10-01', '/backend/icons/iconPadi.png', 'TP001', 'IK001', 81),
(82, 'Pada Jagung di daerah Subang sangat cocok ditanami pada bulan November karena jagung membutuhkan sinar matahari yang cukup. Prediksi panen jagung sekitar 70-90 hari.', '2024-11-01', '/backend/icons/iconJagung.png', 'TP002', 'IK001', 82),
(83, 'Pada Kedelai di daerah Indramayu sangat cocok ditanami pada bulan Desember karena kedelai tahan terhadap kondisi kering. Prediksi panen kedelai sekitar 80-100 hari.', '2024-12-01', '/backend/icons/iconKedelai.png', 'TP003', 'IK002', 83),
(84, 'Pada Kentang di daerah Sumedang sangat cocok ditanami pada bulan Januari karena kentang membutuhkan suhu dingin untuk tumbuh dengan baik. Prediksi panen kentang sekitar 70-90 hari.', '2024-01-01', '/backend/icons/iconKentang.png', 'TP006', 'IK002', 84),
(85, 'Pada Singkong di daerah Majalengka sangat cocok ditanami pada bulan Februari karena singkong dapat tumbuh baik meski di musim kemarau. Prediksi panen singkong sekitar 8-12 bulan.', '2024-02-01', '/backend/icons/iconSingkong.png', 'TP005', 'IK001', 85),
(86, 'Pada Padi di daerah Kuningan sangat cocok ditanami pada bulan Maret karena padi membutuhkan air yang cukup meski di musim kemarau. Prediksi panen padi sekitar 120-140 hari.', '2024-03-01', '/backend/icons/iconPadi.png', 'TP001', 'IK001', 86),
(87, 'Pada Jagung di daerah Purwakarta sangat cocok ditanami pada bulan April karena jagung membutuhkan sinar matahari yang cukup. Prediksi panen jagung sekitar 70-90 hari.', '2024-04-01', '/backend/icons/iconJagung.png', 'TP002', 'IK001', 87),
(88, 'Pada Kedelai di daerah Karawang sangat cocok ditanami pada bulan Mei karena kedelai tahan terhadap kondisi kering. Prediksi panen kedelai sekitar 80-100 hari.', '2024-05-01', '/backend/icons/iconKedelai.png', 'TP003', 'IK002', 88),
(89, 'Pada Kentang di daerah Tuban sangat cocok ditanami pada bulan Juni karena kentang membutuhkan suhu dingin untuk tumbuh dengan baik. Prediksi panen kentang sekitar 70-90 hari.', '2024-06-01', '/backend/icons/iconKentang.png', 'TP006', 'IK002', 89),
(90, 'Pada Singkong di daerah Banjar sangat cocok ditanami pada bulan Juli karena singkong dapat tumbuh baik meski di musim kemarau. Prediksi panen singkong sekitar 8-12 bulan.', '2024-07-01', '/backend/icons/iconSingkong.png', 'TP005', 'IK001', 90),
(91, 'Pada Padi di daerah Batang sangat cocok ditanami pada bulan Agustus karena padi membutuhkan air yang cukup meski di musim kemarau. Prediksi panen padi sekitar 120-140 hari.', '2024-08-01', '/backend/icons/iconPadi.png', 'TP001', 'IK001', 91),
(92, 'Pada Jagung di daerah Brebes sangat cocok ditanami pada bulan September karena jagung membutuhkan sinar matahari yang cukup. Prediksi panen jagung sekitar 70-90 hari.', '2024-09-01', '/backend/icons/iconJagung.png', 'TP002', 'IK001', 92),
(93, 'Pada Kedelai di daerah Jepara sangat cocok ditanami pada bulan Oktober karena kedelai tahan terhadap kondisi kering. Prediksi panen kedelai sekitar 80-100 hari.', '2024-10-01', '/backend/icons/iconKedelai.png', 'TP003', 'IK002', 93),
(94, 'Pada Kentang di daerah Kendal sangat cocok ditanami pada bulan November karena kentang membutuhkan suhu dingin untuk tumbuh dengan baik. Prediksi panen kentang sekitar 70-90 hari.', '2024-11-01', '/backend/icons/iconKentang.png', 'TP006', 'IK002', 94),
(95, 'Pada Singkong di daerah Klaten sangat cocok ditanami pada bulan Desember karena singkong dapat tumbuh baik meski di musim kemarau. Prediksi panen singkong sekitar 8-12 bulan.', '2024-12-01', '/backend/icons/iconSingkong.png', 'TP005', 'IK001', 95),
(96, 'Pada Padi di daerah Wonogiri sangat cocok ditanami pada bulan Januari karena padi membutuhkan air yang cukup meski di musim kemarau. Prediksi panen padi sekitar 120-140 hari.', '2024-01-01', '/backend/icons/iconPadi.png', 'TP001', 'IK001', 96),
(97, 'Pada Jagung di daerah Boyolali sangat cocok ditanami pada bulan Februari karena jagung membutuhkan sinar matahari yang cukup. Prediksi panen jagung sekitar 70-90 hari.', '2024-02-01', '/backend/icons/iconJagung.png', 'TP002', 'IK001', 97),
(98, 'Pada Kedelai di daerah Sragen sangat cocok ditanami pada bulan Maret karena kedelai tahan terhadap kondisi kering. Prediksi panen kedelai sekitar 80-100 hari.', '2024-03-01', '/backend/icons/iconKedelai.png', 'TP003', 'IK002', 98),
(99, 'Pada Kentang di daerah Pemalang sangat cocok ditanami pada bulan April karena kentang membutuhkan suhu dingin untuk tumbuh dengan baik. Prediksi panen kentang sekitar 70-90 hari.', '2024-04-01', '/backend/icons/iconKentang.png', 'TP006', 'IK002', 99),
(100, 'Pada Singkong di daerah Temanggung sangat cocok ditanami pada bulan Mei karena singkong dapat tumbuh baik meski di musim kemarau. Prediksi panen singkong sekitar 8-12 bulan.', '2024-05-01', '/backend/icons/iconSingkong.png', 'TP005', 'IK001', 100);

-- --------------------------------------------------------

--
-- Table structure for table `tb_provinsi`
--

CREATE TABLE `tb_provinsi` (
  `id_provinsi` varchar(10) NOT NULL,
  `nama_provinsi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_provinsi`
--

INSERT INTO `tb_provinsi` (`id_provinsi`, `nama_provinsi`) VALUES
('PRP01', 'ACEH'),
('PRP02', 'SUMATERA UTARA'),
('PRP03', 'SUMATERA BARAT'),
('PRP04', 'RIAU'),
('PRP05', 'JAMBI'),
('PRP06', 'SUMATERA SELATAN'),
('PRP07', 'BENGKULU'),
('PRP08', 'LAMPUNG'),
('PRP09', 'KEP. BANGKA BELITUNG'),
('PRP10', 'KEP. RIAU'),
('PRP11', 'DKI JAKARTA'),
('PRP12', 'JAWA BARAT'),
('PRP13', 'JAWA TENGAH'),
('PRP14', 'DI YOGYAKARTA'),
('PRP15', 'JAWA TIMUR'),
('PRP16', 'BANTEN'),
('PRP17', 'BALI'),
('PRP18', 'NUSA TENGGARA BARAT'),
('PRP19', 'NUSA TENGGARA TIMUR'),
('PRP20', 'KALIMANTAN BARAT'),
('PRP21', 'KALIMANTAN TENGAH'),
('PRP22', 'KALIMANTAN SELATAN'),
('PRP23', 'KALIMANTAN TIMUR'),
('PRP24', 'KALIMANTAN UTARA'),
('PRP25', 'SULAWESI UTARA'),
('PRP26', 'SULAWESI TENGAH'),
('PRP27', 'SULAWESI SELATAN'),
('PRP28', 'SULAWESI TENGGARA'),
('PRP29', 'GORONTALO'),
('PRP30', 'SULAWESI BARAT'),
('PRP31', 'MALUKU'),
('PRP32', 'MALUKU UTARA'),
('PRP33', 'PAPUA BARAT'),
('PRP34', 'PAPUA BARAT DAYA'),
('PRP35', 'PAPUA'),
('PRP36', 'PAPUA SELATAN'),
('PRP37', 'PAPUA TENGAH'),
('PRP38', 'PAPUA PEGUNUNGAN');

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
('TP003', 'Kedelai'),
('TP004', 'Gandum'),
('TP005', 'Singkong'),
('TP006', 'Kentang');

-- --------------------------------------------------------

--
-- Table structure for table `tb_varietas`
--

CREATE TABLE `tb_varietas` (
  `id_jenis_varietas` varchar(10) NOT NULL,
  `id_tanamanpangan` varchar(10) NOT NULL,
  `nama_varietas` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_varietas`
--

INSERT INTO `tb_varietas` (`id_jenis_varietas`, `id_tanamanpangan`, `nama_varietas`) VALUES
('VP001', 'TP001', 'intani 1'),
('VP001', 'TP001', 'intani 2'),
('VP001', 'TP001', 'rokan'),
('VP001', 'TP001', 'SL8'),
('VP001', 'TP001', '11SHS'),
('VP001', 'TP001', 'Segera Anak'),
('VP001', 'TP001', 'PP1'),
('VP001', 'TP001', 'H1'),
('VP001', 'TP001', 'Bernas Prima'),
('VP001', 'TP001', 'Sembada B3'),
('VP001', 'TP001', 'Sembada B5'),
('VP001', 'TP001', 'Sembada B8'),
('VP001', 'TP001', 'Sembada B9'),
('VP001', 'TP001', 'Long Ping'),
('VP001', 'TP001', 'Adirasa-1'),
('VP001', 'TP001', 'Adirasa-64'),
('VP001', 'TP001', 'Hibrindo R-1'),
('VP001', 'TP001', 'Hibrindo R-2'),
('VP001', 'TP001', 'Manis-4'),
('VP001', 'TP001', 'Manis-5'),
('VP001', 'TP001', 'Hipa4'),
('VP001', 'TP001', 'Hipa 5 Ceva'),
('VP001', 'TP001', 'Hipa 7-10'),
('VP001', 'TP001', 'MIKI 1-3'),
('VP001', 'TP001', 'SL 8 SHS'),
('VP001', 'TP001', 'SL 11 SHS'),
('VP001', 'TP001', 'Maro'),
('VP002', 'TP001', 'Inpara 1'),
('VP002', 'TP001', 'Inpara 2'),
('VP002', 'TP001', 'Inpara 3'),
('VP002', 'TP001', 'Inpara 4'),
('VP002', 'TP001', 'Inpara 5'),
('VP002', 'TP001', 'Inpara 6'),
('VP002', 'TP001', 'Inpara 7'),
('VP002', 'TP001', 'Inpara 8'),
('VP002', 'TP001', 'Inpago 1'),
('VP002', 'TP001', 'Inpago 2'),
('VP002', 'TP001', 'Inpago 3'),
('VP002', 'TP001', 'Inpago 4'),
('VP002', 'TP001', 'Inpago 5'),
('VP002', 'TP001', 'Inpari 1'),
('VP002', 'TP001', 'Inpari 2'),
('VP002', 'TP001', 'Inpari 3'),
('VP002', 'TP001', 'Inpari 4'),
('VP002', 'TP001', 'Inpari 5'),
('VP002', 'TP001', 'Inpari 6'),
('VP002', 'TP001', 'Inpari 7'),
('VP002', 'TP001', 'Inpari 8'),
('VP002', 'TP001', 'Inpari 9'),
('VP002', 'TP001', 'Inpari 10'),
('VP002', 'TP001', 'Inpari 11'),
('VP002', 'TP001', 'Inpari 12'),
('VP002', 'TP001', 'Inpari 13'),
('VP002', 'TP001', 'Inpari 14'),
('VP002', 'TP001', 'Inpari 15'),
('VP002', 'TP001', 'Inpari 16'),
('VP002', 'TP001', 'Inpari 17'),
('VP002', 'TP001', 'Inpari 18'),
('VP002', 'TP001', 'Inpari 19'),
('VP002', 'TP001', 'Inpari 20'),
('VP002', 'TP001', 'Inpari 21'),
('VP002', 'TP001', 'Inpari 31'),
('VP002', 'TP001', 'Inpari 33'),
('VP002', 'TP001', 'Inpari 34 Salin Agri'),
('VP002', 'TP001', 'Inpari 35 Salin Agri'),
('VP003', 'TP001', 'Gropak (Kulon Progo)'),
('VP003', 'TP001', 'Indramayu'),
('VP003', 'TP001', 'Dharma Ayu'),
('VP003', 'TP001', 'Srimulih'),
('VP003', 'TP001', 'Andel Jaran'),
('VP003', 'TP001', 'Merong'),
('VP003', 'TP001', 'Gundelan'),
('VP003', 'TP001', 'Marong'),
('VP003', 'TP001', 'Simenep'),
('VP003', 'TP001', 'Ketan Lusi'),
('VJ001', 'TP002', 'Srikandi Kuning 1'),
('VJ001', 'TP002', 'Srikandi Putih 1'),
('VJ001', 'TP002', 'Bima 12Q'),
('VJ001', 'TP002', 'Bima 13Q'),
('VJ001', 'TP002', 'Bima Putih 1'),
('VJ001', 'TP002', 'Bima Putih 2'),
('VJ002', 'TP002', 'Provit A1'),
('VJ002', 'TP002', 'Provit A2'),
('VJ002', 'TP002', 'Bima Provit A1'),
('VJ003', 'TP002', 'Pulut URI 1'),
('VJ003', 'TP002', 'Pulut URI 2'),
('VJ003', 'TP002', 'Pulut URI 3H'),
('VJ004', 'TP002', 'Srikandi Ungu 1'),
('VJ004', 'TP002', 'Fancy 111');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `prediksi_tanaman_pangan`
--
ALTER TABLE `prediksi_tanaman_pangan`
  ADD KEY `id_provinsi` (`id_provinsi`,`id_tanamanpangan`),
  ADD KEY `id_tanamanpangan` (`id_tanamanpangan`);

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
-- Indexes for table `tb_jenis_varietas`
--
ALTER TABLE `tb_jenis_varietas`
  ADD PRIMARY KEY (`id_jenis_varietas`);

--
-- Indexes for table `tb_kelebihan_kekurangan`
--
ALTER TABLE `tb_kelebihan_kekurangan`
  ADD KEY `id_tanamanpangan` (`id_tanamanpangan`,`id_varietas`),
  ADD KEY `id_varietas` (`id_varietas`);

--
-- Indexes for table `tb_keterangan`
--
ALTER TABLE `tb_keterangan`
  ADD PRIMARY KEY (`id_keterangan`),
  ADD KEY `id_tanamanpangan` (`id_tanamanpangan`),
  ADD KEY `id_iklim` (`id_iklim`),
  ADD KEY `id_daerah` (`id_daerah`);

--
-- Indexes for table `tb_provinsi`
--
ALTER TABLE `tb_provinsi`
  ADD PRIMARY KEY (`id_provinsi`),
  ADD UNIQUE KEY `id_provinsi` (`id_provinsi`),
  ADD UNIQUE KEY `id_provinsi_2` (`id_provinsi`);

--
-- Indexes for table `tb_tanamanpangan`
--
ALTER TABLE `tb_tanamanpangan`
  ADD PRIMARY KEY (`id_tanamanpangan`);

--
-- Indexes for table `tb_varietas`
--
ALTER TABLE `tb_varietas`
  ADD KEY `id_jenis_varietas` (`id_jenis_varietas`,`id_tanamanpangan`),
  ADD KEY `id_tanamanpangan` (`id_tanamanpangan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_keterangan`
--
ALTER TABLE `tb_keterangan`
  MODIFY `id_keterangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=385;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `prediksi_tanaman_pangan`
--
ALTER TABLE `prediksi_tanaman_pangan`
  ADD CONSTRAINT `prediksi_tanaman_pangan_ibfk_1` FOREIGN KEY (`id_provinsi`) REFERENCES `tb_provinsi` (`id_provinsi`),
  ADD CONSTRAINT `prediksi_tanaman_pangan_ibfk_2` FOREIGN KEY (`id_tanamanpangan`) REFERENCES `tb_tanamanpangan` (`id_tanamanpangan`);

--
-- Constraints for table `tb_kelebihan_kekurangan`
--
ALTER TABLE `tb_kelebihan_kekurangan`
  ADD CONSTRAINT `tb_kelebihan_kekurangan_ibfk_1` FOREIGN KEY (`id_tanamanpangan`) REFERENCES `tb_tanamanpangan` (`id_tanamanpangan`);

--
-- Constraints for table `tb_keterangan`
--
ALTER TABLE `tb_keterangan`
  ADD CONSTRAINT `tb_keterangan_ibfk_1` FOREIGN KEY (`id_tanamanpangan`) REFERENCES `tb_tanamanpangan` (`id_tanamanpangan`),
  ADD CONSTRAINT `tb_keterangan_ibfk_2` FOREIGN KEY (`id_iklim`) REFERENCES `tb_jenisiklim` (`id_iklim`),
  ADD CONSTRAINT `tb_keterangan_ibfk_3` FOREIGN KEY (`id_daerah`) REFERENCES `tb_daerahrawan` (`id_daerah`);

--
-- Constraints for table `tb_varietas`
--
ALTER TABLE `tb_varietas`
  ADD CONSTRAINT `tb_varietas_ibfk_1` FOREIGN KEY (`id_jenis_varietas`) REFERENCES `tb_jenis_varietas` (`id_jenis_varietas`),
  ADD CONSTRAINT `tb_varietas_ibfk_2` FOREIGN KEY (`id_tanamanpangan`) REFERENCES `tb_tanamanpangan` (`id_tanamanpangan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
