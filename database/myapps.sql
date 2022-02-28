-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2022 at 11:18 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myapps`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `akar_objek`
-- (See below for the actual view)
--
CREATE TABLE `akar_objek` (
`user_id` int(11)
,`akar` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `akar_target`
-- (See below for the actual view)
--
CREATE TABLE `akar_target` (
`user_id` int(11)
,`akar` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `all_null`
-- (See below for the actual view)
--
CREATE TABLE `all_null` (
`user_id` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `culinary`
--

CREATE TABLE `culinary` (
  `culinary_id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `wifi_id` int(11) NOT NULL,
  `link` varchar(200) NOT NULL,
  `is_actived` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `culinary`
--

INSERT INTO `culinary` (`culinary_id`, `image`, `name`, `address`, `wifi_id`, `link`, `is_actived`) VALUES
(10, 'image_2021-12-11_191206.png', 'Tuin Van Java', 'Kemirirejo, Magelang Tengah', 1, 'https://g.page/pank-s-kebab?share', 1),
(11, 'kuliner_sigaluh.jpg', 'Kuliner Sigaluh', 'Panjang, Kec. Magelang Tengah', 1, 'https://goo.gl/maps/K5MqqFuX3wKgWJ199', 1),
(12, 'special_kari.jpg', 'Special Kari BRC Kuliner Magelang', 'Magelang, Kec. Magelang Tengah', 1, 'https://goo.gl/maps/T4SmQdihxp9ugkTt8', 1),
(13, 'lembah_tidar.jpg', 'Kuliner Lembah Tidar', 'Magersari, Kec. Magelang Sel.', 0, 'https://goo.gl/maps/3WvJQs5sH8GaoXw49', 1),
(14, 'image_2021-12-11_190357.png', 'Kuliner Sejuta Bunga', 'Rejowinangun Selatan, Kec. Magelang Selatan', 0, 'https://goo.gl/maps/PSZenKApYWiwX28w5', 1),
(15, 'kartika_sari.jpg', 'Kuliner Kartika Sari', 'Magersari, Kec. Magelang Selatan', 1, 'https://goo.gl/maps/2QaWdLSKFTE1rWS86', 1),
(16, 'jenggolo.jpg', 'Kuliner Jenggolo', 'Kemirirejo, Kec. Magelang Tengah', 0, 'https://goo.gl/maps/qU9SHe6pitP8Fxcu9', 1),
(17, 'jendralan.jpg', 'Kuliner Jendralan', 'Magelang, Kec. Magelang Tengah', 0, 'https://goo.gl/maps/k1BmzfT6gnR4f6w8A', 1),
(18, 'armada_estate.jpg', 'Kuliner Armada Estate', 'Kramat Utara, Kec. Magelang Utara', 0, 'https://goo.gl/maps/WW3bBkzQ5G2nFZdAA', 1),
(19, 'rm_pancoran.jpg', 'Rumah Makan Pancoran', 'Kemirirejo, Kec. Magelang Tengah', 0, 'https://goo.gl/maps/gqR8AVXgX9VjFFB58', 1),
(20, 'gembong_gedhe.jpg', 'Roti Gembong Gedhe Potrobangsan', 'Potrobangsann, Kec. Magelang Utara', 0, 'https://goo.gl/maps/FvHC4KL2ftom1XzZ9', 1),
(21, 'kalingga.jpg', 'Kuliner Kalingga', 'Rejowinangun Utara, Kec. Magelang Tengah', 0, 'https://goo.gl/maps/afmScRRSBy2Nn15Q8', 1),
(22, 'image_2021-12-11_191340.png', 'Wedang Kacang Kebon', 'Kemirirejo, Kec. Magelang Tengah', 0, 'https://goo.gl/maps/uyLXYy31PZZ9EK7f8', 1),
(23, 'asmoro_05.jpg', 'Kuliner Asmoro 05', 'Magersari, Kec. Magelang Selatan', 1, 'https://goo.gl/maps/Y6TLx85JYwGrW4rF9', 1),
(24, 'ayam_gading.jpg', 'Mie Ayam Gading', 'Kemirirejo, Kec. Magelang Tengah', 0, 'https://goo.gl/maps/1WarhuHKD8z9E2qX8', 1),
(25, 'mega_kuliner.jpg', 'New Mega Kuliner & Caffe', 'Bayeman, Magelang Tengah', 1, 'https://goo.gl/maps/diP4HDtenKtdSzCV7', 1),
(26, 'sriwijaya.jpg', 'Sentra Kuliner Sriwijaya', 'Kiduldalem, Kec. Klojen', 1, 'https://goo.gl/maps/Szf1622QyuKjMzv67', 1),
(27, 's_parman.jpg', 'Kuliner KAPT S.Parman', 'Potrobangsan, Kec. Magelang Utara', 1, 'https://goo.gl/maps/2ZXqJ76sme4LNPYn9', 1),
(28, 'lemongrass.jpg', 'Lemongrass Rooftop\'n Eatety', 'Gelangan, Kec. Magelang Tengah', 1, 'https://goo.gl/maps/RF89FEYyWHLHC9Ky5', 1),
(29, 'image_2021-12-11_191258.png', 'Warung Sambal Joglo Krajan', 'Magelang Selatan, Tidar Selatan', 0, 'https://goo.gl/maps/igt5XwzYYarJsauM9', 1),
(30, 'warung_ndeso.jpg', 'Warung Ndeso', 'Magelang, Kec. Magelang Tengah', 0, 'https://goo.gl/maps/zYBxsSDkKaCbbTjE7', 1),
(31, 'image_2021-12-11_191425.png', 'Es Murni Magelang', 'Magelang Kota', 0, 'https://goo.gl/maps/tTmEZLWEAooLP6Ap8', 1),
(32, 'markaz.jpg', 'Markaz Kuliner', 'Kramat Selatan, Kec. Magelang Utara', 0, 'https://goo.gl/maps/kxpGJ1fNwiGXR5c27', 1),
(33, 'sop_senerek.jpg', 'Sop Senerek Pak Parto', 'Magersari, Kec. Magelang Selatan', 0, 'https://goo.gl/maps/zFUF9Z1avX3DSeiF7', 1),
(34, 'kuliner_magelang.jpg', 'Kuliner Magelang', 'Jurangombo Selatan, Kec. Magelang Selatan', 0, 'https://goo.gl/maps/k3wGXE5Rv9MJbank9', 1),
(35, 'mie_pak_yanto.jpg', 'Mie Ayam Pak Yanto', 'Potrobangsan, Kec. Magelang Utara', 0, 'https://goo.gl/maps/LFB6LL5ekPkfGvCMA', 1),
(36, 'tahu_pojok.jpg', 'Kuliner Tahu Pojok Magelang', 'Cacaban, Kec. Magelang Tengah', 0, 'https://goo.gl/maps/wRXCfev3iavPciUT8', 1),
(37, 'ayam_sidoel.jpg', 'Kuliner Jenggolo Ayam Sidoel Peyet', 'Kemirirejo, Kec. Magelang Tengah', 1, 'https://goo.gl/maps/cwXKuaHxqiddAmbR8', 1),
(38, 'tip_top.jpg', 'Rumah Makan Tip Top', 'Kemirirejo, Kec. Magelang Tengah', 1, 'https://goo.gl/maps/cnj5VDZAFqJKPZh86', 1),
(39, 'kebab_tukiyem.PNG', 'Kebab Tukiyem', 'Kemirirejo, Kec. Magelang Tengah', 0, 'https://goo.gl/maps/GNjmUZNZXr8QAkCE8', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `data_x`
-- (See below for the actual view)
--
CREATE TABLE `data_x` (
`user_id` int(11)
,`culinary_id` int(11)
,`total_nilai` float
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `data_y`
-- (See below for the actual view)
--
CREATE TABLE `data_y` (
`user_id` int(11)
,`culinary_id` int(11)
,`total_nilai` float
);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `level_id` int(11) NOT NULL,
  `level` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`level_id`, `level`) VALUES
(1, 'administrator'),
(2, 'member');

-- --------------------------------------------------------

--
-- Stand-in structure for view `objek`
-- (See below for the actual view)
--
CREATE TABLE `objek` (
`user_id` int(11)
,`culinary_id` int(11)
,`nilai_objek` float
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `pembilang`
-- (See below for the actual view)
--
CREATE TABLE `pembilang` (
`user_objek` int(11)
,`user_target` int(11)
,`pembilang` double
);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `culinary_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nilai_tempat` int(11) DEFAULT NULL,
  `nilai_pelayanan` int(11) DEFAULT NULL,
  `nilai_pemandangan` int(11) DEFAULT NULL,
  `nilai_kecepatan_saji` int(11) DEFAULT NULL,
  `total_nilai` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `culinary_id`, `user_id`, `nilai_tempat`, `nilai_pelayanan`, `nilai_pemandangan`, `nilai_kecepatan_saji`, `total_nilai`) VALUES
(768, 10, 30, 3, 3, 4, 3, 3.25),
(769, 11, 30, 3, 3, 4, 4, 3.5),
(770, 12, 30, 4, 4, 4, 3, 3.75),
(771, 13, 30, 3, 3, 3, 3, 3),
(772, 14, 30, NULL, NULL, NULL, NULL, NULL),
(773, 15, 30, 4, 4, 4, 3, 3.75),
(774, 16, 30, 4, 5, 4, 3, 4),
(775, 17, 30, 3, 3, 3, 3, 3),
(776, 18, 30, 4, 4, 4, 4, 4),
(777, 19, 30, NULL, NULL, NULL, NULL, NULL),
(778, 20, 30, 4, 4, 5, 5, 4.5),
(779, 21, 30, 5, 3, 4, 2, 3.5),
(780, 22, 30, 2, 3, 2, 2, 2.25),
(781, 23, 30, 3, 3, 3, 3, 3),
(782, 24, 30, NULL, NULL, NULL, NULL, NULL),
(783, 25, 30, NULL, NULL, NULL, NULL, NULL),
(784, 26, 30, NULL, NULL, NULL, NULL, NULL),
(785, 27, 30, NULL, NULL, NULL, NULL, NULL),
(786, 28, 30, NULL, NULL, NULL, NULL, NULL),
(787, 29, 30, 3, 3, 3, 4, 3.25),
(788, 30, 30, 4, 4, 4, 4, 4),
(789, 31, 30, 4, 5, 5, 4, 4.5),
(790, 32, 30, NULL, NULL, NULL, NULL, NULL),
(791, 33, 30, 4, 4, 4, 3, 3.75),
(792, 34, 30, 3, 3, 3, 3, 3),
(793, 35, 30, 3, 3, 3, 3, 3),
(794, 36, 30, 3, 3, 2, 4, 3),
(795, 37, 30, 4, 4, 2, 5, 3.75),
(796, 38, 30, NULL, NULL, NULL, NULL, NULL),
(797, 39, 30, 2, 4, 4, 5, 3.75),
(798, 10, 31, 4, 4, 4, 4, 4),
(799, 11, 31, 3, 3, 4, 4, 3.5),
(800, 12, 31, 4, 4, 3, 3, 3.5),
(801, 13, 31, 2, 2, 3, 3, 2.5),
(802, 14, 31, 2, 4, 4, 3, 3.25),
(803, 15, 31, 4, 4, 4, 4, 4),
(804, 16, 31, 4, 5, 4, 3, 4),
(805, 17, 31, 4, 3, 4, 3, 3.5),
(806, 18, 31, 4, 4, 4, 4, 4),
(807, 19, 31, 3, 4, 3, 3, 3.25),
(808, 20, 31, 4, 4, 5, 5, 4.5),
(809, 21, 31, 5, 3, 4, 2, 3.5),
(810, 22, 31, 3, 3, 3, 4, 3.25),
(811, 23, 31, 3, 3, 3, 3, 3),
(812, 24, 31, 3, 4, 4, 5, 4),
(813, 25, 31, 3, 4, 3, 4, 3.5),
(814, 26, 31, 4, 4, 2, 3, 3.25),
(815, 27, 31, 4, 4, 3, 3, 3.5),
(816, 28, 31, 3, 3, 3, 2, 2.75),
(817, 29, 31, 3, 3, 3, 4, 3.25),
(818, 30, 31, 4, 4, 4, 4, 4),
(819, 31, 31, 3, 4, 4, 3, 3.5),
(820, 32, 31, 3, 4, 3, 3, 3.25),
(821, 33, 31, 4, 4, 4, 3, 3.75),
(822, 34, 31, 3, 3, 3, 3, 3),
(823, 35, 31, 3, 3, 3, 3, 3),
(824, 36, 31, 3, 3, 2, 4, 3),
(825, 37, 31, 4, 4, 2, 5, 3.75),
(826, 38, 31, 4, 4, 4, 3, 3.75),
(827, 39, 31, 2, 4, 4, 5, 3.75),
(828, 10, 32, 3, 3, 3, 4, 3.25),
(829, 11, 32, 3, 3, 3, 3, 3),
(830, 12, 32, 4, 4, 3, 3, 3.5),
(831, 13, 32, 3, 3, 3, 3, 3),
(832, 14, 32, 3, 3, 3, 4, 3.25),
(833, 15, 32, 4, 4, 4, 4, 4),
(834, 16, 32, 3, 4, 3, 3, 3.25),
(835, 17, 32, 4, 3, 4, 3, 3.5),
(836, 18, 32, 4, 4, 4, 4, 4),
(837, 19, 32, 3, 3, 3, 3, 3),
(838, 20, 32, 4, 3, 3, 4, 3.5),
(839, 21, 32, 3, 3, 4, 4, 3.5),
(840, 22, 32, 3, 3, 3, 4, 3.25),
(841, 23, 32, 3, 3, 3, 3, 3),
(842, 24, 32, 3, 4, 3, 4, 3.5),
(843, 25, 32, 3, 4, 3, 4, 3.5),
(844, 26, 32, 4, 4, 3, 3, 3.5),
(845, 27, 32, 4, 4, 3, 3, 3.5),
(846, 28, 32, 3, 3, 3, 2, 2.75),
(847, 29, 32, 3, 3, 3, 4, 3.25),
(848, 30, 32, 4, 3, 4, 4, 3.75),
(849, 31, 32, 3, 3, 3, 4, 3.25),
(850, 32, 32, 4, 3, 4, 3, 3.5),
(851, 33, 32, 4, 4, 3, 3, 3.5),
(852, 34, 32, 4, 3, 4, 3, 3.5),
(853, 35, 32, 3, 3, 4, 3, 3.25),
(854, 36, 32, 3, 3, 3, 4, 3.25),
(855, 37, 32, 3, 3, 3, 4, 3.25),
(856, 38, 32, 4, 3, 4, 3, 3.5),
(857, 39, 32, 3, 4, 4, 4, 3.75),
(858, 10, 33, 2, 3, 3, 3, 2.75),
(859, 11, 33, 2, 2, 4, 4, 3),
(860, 12, 33, 4, 3, 3, 3, 3.25),
(861, 13, 33, 4, 3, 3, 4, 3.5),
(862, 14, 33, 3, 4, 3, 4, 3.5),
(863, 15, 33, 4, 4, 3, 4, 3.75),
(864, 16, 33, 3, 3, 3, 3, 3),
(865, 17, 33, 4, 3, 4, 3, 3.5),
(866, 18, 33, 4, 3, 3, 4, 3.5),
(867, 19, 33, 3, 3, 5, 4, 3.75),
(868, 20, 33, 4, 3, 5, 4, 4),
(869, 21, 33, 4, 3, 3, 4, 3.5),
(870, 22, 33, 4, 3, 3, 4, 3.5),
(871, 23, 33, 3, 3, 3, 3, 3),
(872, 24, 33, 4, 3, 3, 4, 3.5),
(873, 25, 33, 3, 4, 3, 4, 3.5),
(874, 26, 33, 4, 3, 3, 3, 3.25),
(875, 27, 33, 4, 4, 3, 5, 4),
(876, 28, 33, 3, 2, 3, 4, 3),
(877, 29, 33, 3, 3, 3, 4, 3.25),
(878, 30, 33, 4, 3, 4, 4, 3.75),
(879, 31, 33, 3, 4, 4, 4, 3.75),
(880, 32, 33, 4, 2, 4, 3, 3.25),
(881, 33, 33, 4, 4, 2, 3, 3.25),
(882, 34, 33, 4, 3, 4, 4, 3.75),
(883, 35, 33, 3, 3, 4, 5, 3.75),
(884, 36, 33, 3, 3, 3, 4, 3.25),
(885, 37, 33, 3, 3, 3, 5, 3.5),
(886, 38, 33, 4, 3, 3, 3, 3.25),
(887, 39, 33, 3, 3, 4, 4, 3.5),
(888, 10, 34, 3, 3, 3, 3, 3),
(889, 11, 34, 3, 3, 4, 4, 3.5),
(890, 12, 34, 4, 3, 4, 3, 3.5),
(891, 13, 34, 4, 3, 4, 4, 3.75),
(892, 14, 34, 3, 4, 3, 4, 3.5),
(893, 15, 34, 4, 3, 3, 4, 3.5),
(894, 16, 34, 3, 3, 4, 3, 3.25),
(895, 17, 34, 4, 3, 4, 3, 3.5),
(896, 18, 34, 4, 3, 4, 4, 3.75),
(897, 19, 34, 3, 3, 4, 4, 3.5),
(898, 20, 34, 4, 3, 3, 4, 3.5),
(899, 21, 34, 3, 3, 3, 4, 3.25),
(900, 22, 34, 3, 3, 3, 4, 3.25),
(901, 23, 34, 3, 3, 3, 4, 3.25),
(902, 24, 34, 4, 3, 3, 4, 3.5),
(903, 25, 34, 3, 4, 3, 4, 3.5),
(904, 26, 34, 4, 3, 4, 4, 3.75),
(905, 27, 34, 4, 3, 3, 3, 3.25),
(906, 28, 34, 3, 3, 3, 4, 3.25),
(907, 29, 34, 4, 3, 3, 4, 3.5),
(908, 30, 34, 4, 3, 4, 4, 3.75),
(909, 31, 34, 3, 4, 4, 4, 3.75),
(910, 32, 34, 4, 4, 4, 4, 4),
(911, 33, 34, 4, 4, 2, 3, 3.25),
(912, 34, 34, 4, 2, 4, 5, 3.75),
(913, 35, 34, 4, 4, 4, 5, 4.25),
(914, 36, 34, 3, 3, 3, 4, 3.25),
(915, 37, 34, 3, 3, 4, 5, 3.75),
(916, 38, 34, 4, 3, 3, 3, 3.25),
(917, 39, 34, 3, 3, 4, 4, 3.5),
(918, 10, 35, 3, 3, 3, 3, 3),
(919, 11, 35, 3, 3, 3, 3, 3),
(920, 12, 35, 4, 3, 4, 3, 3.5),
(921, 13, 35, 4, 3, 5, 3, 3.75),
(922, 14, 35, 3, 4, 2, 4, 3.25),
(923, 15, 35, 4, 3, 3, 4, 3.5),
(924, 16, 35, 3, 3, 2, 3, 2.75),
(925, 17, 35, 4, 3, 5, 3, 3.75),
(926, 18, 35, 4, 3, 3, 4, 3.5),
(927, 19, 35, 3, 3, 4, 4, 3.5),
(928, 20, 35, 3, 3, 3, 3, 3),
(929, 21, 35, 3, 3, 3, 4, 3.25),
(930, 22, 35, 3, 3, 3, 4, 3.25),
(931, 23, 35, 3, 3, 3, 4, 3.25),
(932, 24, 35, 3, 3, 3, 3, 3),
(933, 25, 35, 3, 3, 3, 4, 3.25),
(934, 26, 35, 4, 3, 4, 4, 3.75),
(935, 27, 35, 4, 3, 3, 3, 3.25),
(936, 28, 35, 3, 5, 3, 5, 4),
(937, 29, 35, 4, 3, 3, 4, 3.5),
(938, 30, 35, 4, 3, 4, 4, 3.75),
(939, 31, 35, 5, 5, 4, 4, 4.5),
(940, 32, 35, 4, 4, 4, 4, 4),
(941, 33, 35, 4, 4, 3, 3, 3.5),
(942, 34, 35, 4, 2, 4, 5, 3.75),
(943, 35, 35, 4, 3, 4, 5, 4),
(944, 36, 35, 5, 3, 3, 4, 3.75),
(945, 37, 35, 3, 5, 4, 5, 4.25),
(946, 38, 35, 4, 3, 5, 3, 3.75),
(947, 39, 35, 3, 3, 4, 3, 3.25);

-- --------------------------------------------------------

--
-- Stand-in structure for view `target`
-- (See below for the actual view)
--
CREATE TABLE `target` (
`user_id` int(11)
,`culinary_id` int(11)
,`nilai_target` float
);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(200) DEFAULT NULL,
  `phone` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `on_off` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `name`, `address`, `phone`, `image`, `on_off`, `level_id`, `created`) VALUES
(1, 'admin', '$2y$10$U.tz2Rwd52r/tGEbOCSQDuK4b7ok.H9LsYY0Rk6kXTvzJvuM507y6', 'ahmad husain', 'magelang', '0895363260970', '99159f45b868e14c081d9b184438b025.jpg', 0, 1, '2021-12-09 20:54:21'),
(8, 'lindeloft', '$2y$10$wZ/ccCDdmMfj8iFvrYWcjej.Nf05jGvD1szHpTx7Ug1eI06B3OH1G', 'Lindeloft Alexander', 'Jerman', '31207130129', 'images_(1).jpg', 0, 1, '2021-12-10 21:23:30'),
(30, 'iyan', '$2y$10$6WzVaRuGijfShJhPCHyPoetSE1s2VjEm180xKw7Ui0vg8Bs.7fu2q', 'sofyan', 'santan', '12345678901', 'default.png', 0, 2, '2021-12-22 19:59:23'),
(31, 'zaki', '$2y$10$0Q5.jLnSV89SNQvkw.3hAueXU0vnFcRSrte1JrfMNxHK90X5353oq', 'zaki eko kurniawan', 'kajoran', '12345678902', 'default.png', 0, 2, '2021-12-22 20:32:39'),
(32, 'nisa', '$2y$10$GpIeRUzEDph95ss1bR9pKOkpsetMhVi3DF3/geA.6.K8hpWTQWMwO', 'siti annisa', 'mertoyudan', '12345678903', 'default.png', 0, 2, '2021-12-22 20:33:10'),
(33, 'shali', '$2y$10$Z8HKm1ZaRLaBhL8e.rS5nO0awygcLL3NQ9EQrB7WYD8ZruUGAKdk2', 'shalichah', 'temanggung', '12345678904', 'default.png', 0, 2, '2021-12-22 20:33:31'),
(34, 'heni', '$2y$10$XjybXXE28TOXP5940K3s3uQ5O4qcS3kW01HEgscB5WkXPdCTjmAUG', 'heni apriliyani', 'candi mulyo', '12345678905', 'default.png', 0, 2, '2021-12-22 20:33:57'),
(35, 'ina', '$2y$10$yw7dJW/B34uAmKkeetWKAe6E.VnNmqwWCbrU/LHI2z.7qjXKjoOb6', 'inayatun', 'borobudur', '12345678906', 'default.png', 0, 2, '2021-12-22 20:34:16');

-- --------------------------------------------------------

--
-- Stand-in structure for view `user_data_null`
-- (See below for the actual view)
--
CREATE TABLE `user_data_null` (
`user_id` int(11)
);

-- --------------------------------------------------------

--
-- Structure for view `akar_objek`
--
DROP TABLE IF EXISTS `akar_objek`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `akar_objek`  AS SELECT `b`.`user_id` AS `user_id`, sqrt(sum(pow(`b`.`total_nilai`,2))) AS `akar` FROM `data_y` AS `b` WHERE !(`b`.`user_id` in (select `user_data_null`.`user_id` from `user_data_null`)) GROUP BY `b`.`user_id` ;

-- --------------------------------------------------------

--
-- Structure for view `akar_target`
--
DROP TABLE IF EXISTS `akar_target`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `akar_target`  AS SELECT `b`.`user_id` AS `user_id`, sqrt(sum(pow(`b`.`total_nilai`,2))) AS `akar` FROM `data_y` AS `b` WHERE `b`.`user_id` in (select `user_data_null`.`user_id` from `user_data_null`) GROUP BY `b`.`user_id` ;

-- --------------------------------------------------------

--
-- Structure for view `all_null`
--
DROP TABLE IF EXISTS `all_null`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `all_null`  AS SELECT `rating`.`user_id` AS `user_id` FROM `rating` WHERE !(`rating`.`user_id` in (select `rating`.`user_id` from `rating` where `rating`.`total_nilai` is not null)) GROUP BY `rating`.`user_id` ;

-- --------------------------------------------------------

--
-- Structure for view `data_x`
--
DROP TABLE IF EXISTS `data_x`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `data_x`  AS SELECT `rating`.`user_id` AS `user_id`, `rating`.`culinary_id` AS `culinary_id`, `rating`.`total_nilai` AS `total_nilai` FROM `rating` WHERE `rating`.`user_id` in (select `rating`.`user_id` from `rating` where `rating`.`total_nilai` is not null) ;

-- --------------------------------------------------------

--
-- Structure for view `data_y`
--
DROP TABLE IF EXISTS `data_y`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `data_y`  AS SELECT `data_x`.`user_id` AS `user_id`, `data_x`.`culinary_id` AS `culinary_id`, `data_x`.`total_nilai` AS `total_nilai` FROM `data_x` WHERE !(`data_x`.`culinary_id` in (select `data_x`.`culinary_id` from `data_x` where `data_x`.`total_nilai` is null)) ;

-- --------------------------------------------------------

--
-- Structure for view `objek`
--
DROP TABLE IF EXISTS `objek`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `objek`  AS SELECT `a`.`user_id` AS `user_id`, `a`.`culinary_id` AS `culinary_id`, `a`.`total_nilai` AS `nilai_objek` FROM `data_y` AS `a` WHERE !(`a`.`user_id` in (select `user_data_null`.`user_id` from `user_data_null`)) ;

-- --------------------------------------------------------

--
-- Structure for view `pembilang`
--
DROP TABLE IF EXISTS `pembilang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pembilang`  AS SELECT `c`.`user_id` AS `user_objek`, `d`.`user_id` AS `user_target`, sum(`c`.`nilai_objek` * `d`.`nilai_target`) AS `pembilang` FROM (`objek` `c` join `target` `d` on(`c`.`culinary_id` = `d`.`culinary_id`)) GROUP BY `d`.`user_id`, `c`.`user_id` ;

-- --------------------------------------------------------

--
-- Structure for view `target`
--
DROP TABLE IF EXISTS `target`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `target`  AS SELECT `a`.`user_id` AS `user_id`, `a`.`culinary_id` AS `culinary_id`, `a`.`total_nilai` AS `nilai_target` FROM `data_y` AS `a` WHERE `a`.`user_id` in (select `user_data_null`.`user_id` from `user_data_null`) ;

-- --------------------------------------------------------

--
-- Structure for view `user_data_null`
--
DROP TABLE IF EXISTS `user_data_null`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_data_null`  AS SELECT `rating`.`user_id` AS `user_id` FROM `rating` WHERE `rating`.`total_nilai` is null GROUP BY `rating`.`user_id` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `culinary`
--
ALTER TABLE `culinary`
  ADD PRIMARY KEY (`culinary_id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `culinary`
--
ALTER TABLE `culinary`
  MODIFY `culinary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1075;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
