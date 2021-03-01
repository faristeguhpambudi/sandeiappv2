-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2021 at 03:42 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_aset`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_aset`
--

CREATE TABLE `tbl_aset` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_aset`
--

INSERT INTO `tbl_aset` (`id`, `nama_barang`) VALUES
(4, 'Komputer'),
(5, 'Acces Point ( Wifi )'),
(6, 'Switch Hub ( Pararel Kabel Internet )'),
(17, 'Mouse Kabel'),
(18, 'Mouse Wireless'),
(19, 'Sepeda'),
(22, 'Mobil'),
(24, 'AC'),
(25, 'Printer'),
(26, 'Monitor'),
(27, 'Mesin Foto Copy'),
(29, 'Gerinda'),
(30, 'Monitor Komputer');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `nama_customer` varchar(128) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `nama_customer`, `alamat`) VALUES
(3, 'Gandaria City', 'Jl. Sultan Iskandar Muda No. Kel. Gandaria Utama, Kec. Kebayoran Lama Utara, Kab. Jaksel 12240'),
(4, 'Artha Gading', 'Jl. Artha Gading Selatan No 1 Lt. Dasar - Lt. 1 Kel. Kelapa Gading, Kec. Kelapa Gading, Jakut 14240'),
(5, 'Bintaro Living Plaza', 'Jl. Bintaro Utama Raya Sektor CBD Kav. 11 / B7 No. A 1. Tangerang Selatan 15220'),
(6, 'Pondok Indah Mall', 'Jl. Metro Pondok Indah Blok III B Pondok Indah, Kec. Kebayoran Lama, Kab. Jaksel 12310'),
(7, 'Puri Indah Mall', 'Jl. Puri Agung GF, Kec. Kembangan, Kel. Kembangan, Kab. Jakbar 11610'),
(8, 'Kota Kasablanka', 'Jl. Kasablanka Raya Kav. 88 1st Floor/102, Kel. Menteng Dalam, Kec. Tebet, Kab. Jaksel 12870'),
(9, 'Rawamangun', 'Jl. Pemuda No. 66-67 Rawamangun, Kec. Pulogadung, Kel. Jati, Kab. Jaktim 13220'),
(10, 'Ahmad Yani Living Plaza', 'Jl. Ahmad Yani No. 9, Kel. Pekayon Jaya, Kec. Bekasi Selatan, Bekasi 17148'),
(11, 'Grand Indonesia', 'Jl. MH Thamrin No. 1, Kel. Kebon Melati, Kec. Tanah Abang, Kab. Jakpus 10350'),
(12, 'Terasutra Bogor', 'Jl. Padjajaran No. 121 RT. 03/04 Cibuliar, Kel. Baranangsiang, Kec. Bogor Timur, Kota Bogor 16143'),
(13, 'Sumarecon Mall Bekasi', 'Jl. Flyover Ahmad Yani Lt. 1F & 2F-102 Unit C&D, Kel. Bekasi Utara, Kec. Margamulya, Bekasi 17142'),
(14, 'Qbig Mall BSD', 'Jl. BSD Raya Utama Blok H/G-03-05 BSD City-Lengkong Kulon Pagedangan, Tangerang, Banten 15331'),
(15, 'Cibubur Times Square', 'Jl. Transyogi Komplek Cibubur Square Blok A1, Kel. Jatikarya, Kec. Jatisampurna, Kab. Bekasi 17435'),
(16, 'Depok Margonda', 'Jl. Margonda Raya No. 166 RT 03/08, Kel. Kemiri Muka, Kec. Beji, Kab. Depok 16423'),
(17, 'Kemang Village', 'Jl. Pangeran Antasari No. 36 LG, Kec. Mampang Prapatan, Kel. Bangka Kab. Jaksel 12450'),
(18, 'Paramount Serpong', 'Jl. Boulevard Raya Blok BA4 No. 40-45 & Blok BA-5 No. 22-25, Kel. Gading Serpong, Tangerang 15810'),
(19, 'Supermall Karawaci', 'Jl. Pintu Timur Lt. Dasar G II Karawaci, Kel. Bencongan, Kec. Kelapa Dua, Kab. Tangerang 15811'),
(20, 'Cibinong City Mall', 'Jl. Tegar Beriman No. 1, 1st Floor, Kel. Pekansari, Kec. Cibinong, Kab. Bogor 16914'),
(21, 'Green Terrace Tamini', 'Jl. Pintu Utama 1 TMII Blok D Lt. 1 RT. 01/02, Kel. Ceger, Kec. Cipayung, Kab. Jaktim 13820'),
(22, 'Neo Soho', 'Jl. Letnan Jendral S.Parman Kav.28, Kec. Grogol Petamburan, Kel. Tanjungduren, kab. Jakbar 11470'),
(23, 'Pluit', 'Jl. Pluit Indah Raya No. 168 M-S, Kec. Penjaringan, Kel. Pluit, Kab, Jakut 14450'),
(24, 'Harapan Indah', 'Jl. Harapan Indah Commercial Park 1 Kav 9D & 9D SEB, Medan Satria, Bekasi Utara 17131'),
(25, 'Depok Pesona Square', 'Jl. Ir. H. Juanda  No. 99, Kel. Bakti Jaya, Kec. Sukmajaya, Depok 16418'),
(26, 'LP Pondok Cabe', 'Jl. RE. Martadinata RT/RW 003/005, Kel. Pondok Cabe Udik, Kec. Pamulang, Ciputat 15417'),
(27, 'BTC Mall Bekasi', 'Jl. HM Joyomartono No. 42 DE, Bulak Kapal, Kel. Margahayu, Kec. Bekasi Timur 17113'),
(28, 'Bona Indah', 'Jl. Karang Tengah Blok B/1 No. 9C-9L, Kel. Lebak Bulus, Kec. Cilandak, Kab. Jaksel 12440'),
(29, 'Pasar Raya Grande', 'Jl. Iskandarsyah II No.2 Blok M Lt. B2, Kec. Kebayoran Baru, Kel. Melawai, Jaksel 12160'),
(30, 'Grand Paragon', 'Jl. Gajah Mada No. 126 GF, Kel. Keagungan, Kec. Taman Sari, Kab. Jakbar 11130'),
(31, 'Cempaka Putih', 'Jl. Letjen Suprapto RT 008/003, Kel. Cempaka Putih Barat, Kec. Cempaka Putih, Kab. Jakpus 10520'),
(32, 'Green Pramuka Square', 'Jl. Ahmad Yani Kav. 49 LG 2A, Kel. Rawasari, Kec. Cempaka Putih, Jakpus 10570'),
(33, 'Bale Kota Tangerang', 'Jl. Jend. Sudirman KM. 10, Lt1 Unit 1A-01, Kel. Buara Indah, Kec. Tangerang, Kab. Tangerang 15119'),
(34, 'Citra Raya Tangerang', 'Jl. Citra Raya Boulevard Lt. 1 Kec. Cikupa, Ke. Cikupa, Kab. Tangerang 15710'),
(35, 'Lotte Avenue', 'Jl. Prof. Dr Satrio Kav. 3-5 Lt. 3F No. 22-27, Kel. Karet Kuningan, Kec. Setiabudi, Kab. Jakpus 12940'),
(36, 'Karawang Tekno Mart', 'Jl. Arteri Galuh Mas Blok A1 Perumnas 1, Kel. Teluk Jambe, Kec. Karawang Barat 41316'),
(37, 'Metro Sunter', 'Jl. Danau Sunter Utara Raya Blok A2, Tanjung Priok, Jakarta Utara 14350'),
(38, 'Baywalk Mall', 'Jl. Pluit Karang Ayu Lt. 1No 1-16, Muara Karang, Kel. Pluit, Kec. Penjaringan, Kab. Jakut 14450'),
(39, 'Kalibata City', 'Jl. Kalibata Raya No. 1 LG Floor AN.Q2, Jaksel 12750'),
(40, 'Pacific Place', 'Jl. Jend Sudirman No. Kav 52-53 RT 5 RW 3, Senayan, Keb. Baru, Jakarta Selatan 12190'),
(41, 'LP Jababeka', 'Jl. Niaga Raya BB/2-4, Kel. Pasi, Bekasi 17532'),
(42, 'Mal Taman Anggrek', 'Jl. Letjen S. Parman Kav. No. 28 RT 3 RW 5, Tanjung Duren Selatan, Grogol, Jakbar 11470'),
(43, 'Mall Of Indonesia', 'Jl. Raya Boulevard Barat Lt. LG/1-DO4 A&B Kel. Kelapa Gading, Jakut 14240'),
(44, 'LP Cinere', 'Jl. Cinere Raya No. 100 RT/RW 003/06, Kel. Cinere, Kec. Limo, Kab. Bogor, Depok 16514'),
(45, 'Citra 6', 'Citra 6 Blok J 6 Citra Garden City, Kel. Tegal Alur, Kec. Kalideres, Jakbar 11830'),
(46, 'LP Ciputat', 'Jl. Ir. H. Juanda No. 88, Ciputat, Tangerang Selatan'),
(47, 'Tamini Square', 'Jl. Taman Mini 1 No. 1, Pinang Ranti, Kec. Makasar, Jaktim 13560'),
(48, 'Bogor Boxies', 'Jl. Raya Tajur 123 RT 01/RW 06, Kec. Bogor Timur, Bogor 16141'),
(49, 'The Park Sawangan', 'Jl. Cinangka Raya, Serua, Bojon, Depok 16517'),
(50, 'Mal Ciputra Citraraya', 'Citra Raya Boulevard Bundaran 5, Tangerang 11820'),
(51, 'Lippo Cikarang', 'Mall Lippo Cikarang GF 62, Bekasi 17550'),
(52, 'LP Pamulang', 'Komplek Pamulang Permai SH/13, Tangerang Selatan 15417'),
(53, 'AEON Sentul City', 'Jl. MH Thamrin Kav 9, Citaringgul, Kec. Babakan Madang, Bogor, Jawa Barat 16810'),
(54, 'Batu Bulan', 'Jl. Raya Batu Bulan No. 45X, Banjar Tegehe, Desa Batu Bulan, Bali 80582'),
(55, 'Gatsu Tengah', 'Jl. Gatot Subroto Tengah No. 343, Dauh Puri Kaja, Denpasar Utara, Bali 80231'),
(56, 'Central Park Kuta', 'Central Park Kuta, Kuta Galeria Jl. Patih Jelantik No. 15, Kec. Kuta Kab. Badung, Bali 80361'),
(57, 'Galerial Mall', 'Jl. By Pass Ngurah Rai, Simpang Dewa Ruci, Kuta, Kab. Badung, Bali 80361'),
(58, 'Gatsu Barat', 'Jalan Gatot Subroto Barat No.86 Padangsambian Kaja, Kerobokan Kaja, Kec. Kuta Utara, Kabupaten Badung, Bali 80117'),
(59, 'Balubur', 'Balubur Town Square Lt. D2-2, Jl. Tamansari, Bandung, Wetan, Kota Bandung 40132'),
(60, 'IBCC', 'Bandung Main & 1st Floor, Bandung 40262'),
(61, 'Paskal Living Plaza', 'Pasir Kaliki, Cicendo, Kota Bandung, Jawa Barat 40173'),
(62, 'Cirebon LP', 'Jl. Brigjend Dharsono, By Pass, RT.05/RW.06, Sunyaragi, Kec. Kesambi, Kota Cirebon, Jawa Barat 45132'),
(63, 'Tasik Asia Plaza', 'l. HZ Mustopa No. 326, Kel. Tugujaya, Kec. Cihideung,  Tasikmalaya, West Java 46126'),
(64, 'Pakuwon Supermall', 'Supermal Pakuwon Lt. LG & G Jl. Puncak Indah Lontar No. 2 Surabaya 60123'),
(65, 'East Coast', 'East Coast Center, Jl. Raya Laguna KJW Putih Tambak, Kejawaan Putih Tamba, Surabaya 60112'),
(66, 'Galaxy Mall', 'Galaxy Mall 1 Lt.Dasar No.79-85, Jalan Dharmahusada Indah Timur No.37, Mulyorejo, Surabaya 60115'),
(67, 'Royal Plaza', 'Royal Plaza Lt 1 Blok H1 17-18, Jl. A Yani no 16-18, Surabaya 60231'),
(68, 'Grand City', 'Jl. Gubeng Pojok No. 1, Lt. 2 Unit 29, Kec. Genteng, Kel. Ketabang, Kab. Surabaya, Jatim 60272'),
(69, 'Marvel City', 'Jl. Ngagel No.123, Kel, Ngagel, Kec. Wonokromo, Kota SBY, Jawa Timur 60246'),
(70, 'Waru', 'Jl. Raya Waru No. 2 RT/RW. 01/11, Kedungrejo, Waru, Kec. Waru, Kabupaten Sidoarjo, Jawa Timur 61256'),
(71, 'Ciputra World', 'Jl. Mayjen Sungkono No.89, Gunung Sari, Dukuhpakis, Surabaya City, East Java 60224'),
(72, 'Lenmarc', 'Jl. Mayjen Yono Suwoyo No.9, Pradahkalikendal, Dukuhpakis, Surabaya City, East Java 60226'),
(73, 'Gresik Icon', 'Kembangan, Kec. Kebomas, Kabupaten Gresik, Jawa Timur 61124'),
(74, 'Jember Lippo', 'Jl. Gajah Mada No.106, Kb. Kidul, Jember Kidul, Kec. Kaliwates, Kabupaten Jember, Jawa Timur 68131'),
(75, 'Purwokerto', 'Jl. Jend. Soedirman No.447, Kauman Lama, Sokanegara, Kec. Purwokerto Tim., Kabupaten Banyumas, Jawa Tengah 53116'),
(76, 'Siliwangi ', 'Jl. Jenderal Sudirman No.247-249, Karangayu, Kec. Semarang Bar., Kota Semarang, Jawa Tengah 50149'),
(77, 'Queen City', 'Jl. Pemuda 29-31 Semarang 50139'),
(78, 'Mojokerto', 'Jl. Mojopahit No.420, Mergelo, Kranggan, Kec. Prajurit Kulon, Kota Mojokerto, Jawa Timur 61321'),
(79, 'Solo Hartono', 'Jl. Raya Solo Baru, Kel. Madegondo, Kec. Grogol, Dusun II, Central Java 57552'),
(80, 'Kediri Mal', 'Jl. Hayam Wuruk, Dandangan, Kec. Kota Kediri, Kota Kediri, Jawa Timur 64126'),
(81, 'Tegal Pacific Mall', 'Jl. Mayjend Sutoyo No.35, Pekauman, Kec. Tegal Bar., Kota Tegal, Jawa Tengah 52125'),
(82, 'Hartono Mall', 'Jl. Raya Ring Road Utara, Sanggrahan, Kaliwiru, Condong Catur, Sleman, Yogyakarta Jawa Tengah 55283'),
(83, 'Ambarukmo Plaza', 'Jl. Laksda Adisucipto Lt. 3A, Kel. Caturtunggal, Kec. Depok, Yogyakarta City 55281'),
(84, 'Urip Sumoharjo', 'Jl. Urip Sumoharjo No. 127, Kel. Klitren, Kec. Gondokusuman, Yogyakarta 55222'),
(85, 'Sleman City Hall', 'Jalan Magelang KM. 9, Kec. Sleman, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55511'),
(86, 'LW Pekanbaru', 'Tengkerang Barat, Marpoyan Damai, Pekanbaru City, Riau 28292'),
(87, 'Mal Pekanbaru', 'Jl. Jend. Sudirman No.123, Kota Tinggi, Kec. Pekanbaru Kota, Kota Pekanbaru, Riau 28112'),
(88, 'Batam Nagoya', 'Jl. Teuku Umar Kec. Lubuk Baja,  Lubuk Baja Kota, Lubuk Baja, Batam City, Riau 29432'),
(89, 'Grand Batam', 'Grand Batam Mall, Jl. Pembangunan, Batu Selicin, Kec. Lubuk Baja, Kota Batam, Kepulauan Riau 29444'),
(90, 'Batam Botania 2', 'Belian, Kec. Batam Kota, Kota Batam, Kepulauan Riau'),
(91, 'Palembang Trade Center', 'Jl. R. Sukamto No.8A, 8 Ilir, Kec. Ilir Tim. II, Kota Palembang, Sumatera Selatan 30164'),
(92, 'Bengkulu Bencoolen', 'Jl. Pariwisata No.1, Penurunan, Kec. Ratu Samban, Kota Bengkulu, Bengkulu 38223'),
(93, 'Jambi Town Square', 'Jl. Kapten A. Bakaruddin No. 88 2ndFloor, Kel. Beliung Patah, Kec. Kota Baru, Ko, Simpang III Sipin, Jambi 36124'),
(94, 'LP Padang', 'Jl. Damar No.57, Olo, Kec. Padang Bar., Kota Padang, Sumatera Barat 25117'),
(95, 'Plaza Medan Fair', 'Jl. Gatot Subroto No. 30, Sekip, Kec. Medan Petisah, Medan, Sumatera Utara 20113'),
(96, 'Samarinda Central', 'Jl. P. Irian No. 1 Kel. Pelabuhan, Kec Samarinda Ilir, Kab., Pelabuhan, Samarinda, Kaltim 75123'),
(97, 'Samarinda Big Mal', 'Jl. Pangeran Untung Suropati No. 8 RT 018 Kel, Karang Asam Ulu, Kec. Sungai Kunjang, Kota Samarinda, Kalimantan Timur 75126'),
(98, 'Banjarmasin A. Yani', 'Jl. A.Yani km 6,4 No.18/19 Kel. Pemurus Luar Kec. Banjarmasin Selatan, Kota Banjarmasin 70248'),
(99, 'LP Balikpapan', 'Jl. MT Haryono, Kel. Gunung Bahagia, Kec. Balikpapan Selatan, Kaltim 76114'),
(100, 'LP Pettarani', 'Jl. A. P. Pettarani No.18, Tidung, Kec. Rappocini, Kota Makassar, Sulawesi Selatan 90222'),
(101, 'LP Latanete', 'Jl. Sungai Saddang No. 50, Kel. Pisang Selatan, Kec. Ujung Pandang, Makassar 90114'),
(102, 'LP Perintis ', 'Jl. Perintis Kemerdekaan Km 9, Kel. Tamalanrea Jaya, Kec. Tamalanrea, Sulsel 90245'),
(103, 'Panakkunang', 'Jalan Adyaksa Raya No.1, Pandang, Panakkukang, Makassar City, South Sulawesi 90231'),
(104, 'Manado Town Square', 'Jl. Piere Tendean, Kec. Sario, Kota Manado, Sulawesi Utara 76114'),
(107, 'Radiyan', 'jalan cikunir raya no 97');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_departemen`
--

CREATE TABLE `tbl_departemen` (
  `departemen_id` int(11) NOT NULL,
  `nama_departemen` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_departemen`
--

INSERT INTO `tbl_departemen` (`departemen_id`, `nama_departemen`) VALUES
(1, 'Finance'),
(2, 'Commersial'),
(3, 'PPIC Produksi partisi Sandei'),
(4, 'PPIC Produksi partisi'),
(5, 'Gudang Blind'),
(6, 'Gudang Partisi'),
(7, 'Enginering'),
(8, 'IT'),
(9, 'HRD'),
(10, 'GA'),
(11, 'Sales Partisi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_histrori_aset`
--

CREATE TABLE `tbl_histrori_aset` (
  `id` int(11) NOT NULL,
  `id_tracking` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kain`
--

CREATE TABLE `tbl_kain` (
  `id` int(11) NOT NULL,
  `tipeKain` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kain`
--

INSERT INTO `tbl_kain` (`id`, `tipeKain`) VALUES
(1, 'Solar Screen'),
(2, 'Dim-Out'),
(3, 'Beack-Out'),
(4, 'Solar Screen');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembelian`
--

CREATE TABLE `tbl_pembelian` (
  `id` int(11) NOT NULL,
  `tgl_beli` int(128) NOT NULL,
  `nama_barang` varchar(128) NOT NULL,
  `supplier` varchar(128) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pembelian`
--

INSERT INTO `tbl_pembelian` (`id`, `tgl_beli`, `nama_barang`, `supplier`, `qty`, `harga`) VALUES
(12, 1, 'Komputer', 'Mitra buana', 10, 150000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penjualanarai`
--

CREATE TABLE `tbl_penjualanarai` (
  `id` int(11) NOT NULL,
  `idCustomer` int(11) NOT NULL,
  `kdBarang` varchar(128) NOT NULL,
  `namaProduct` varchar(128) NOT NULL,
  `idKain` int(11) NOT NULL,
  `lebar` int(11) NOT NULL,
  `tinggi` int(11) NOT NULL,
  `jumlahSet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `kdBarang` varchar(128) NOT NULL,
  `namaProduct` varchar(128) NOT NULL,
  `idKain` int(11) NOT NULL,
  `warnaKain` varchar(128) NOT NULL,
  `lebar` int(11) NOT NULL,
  `tinggi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `kdBarang`, `namaProduct`, `idKain`, `warnaKain`, `lebar`, `tinggi`) VALUES
(1, '111', 'rtes', 1, '1', 100, 200);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_snpembelian`
--

CREATE TABLE `tbl_snpembelian` (
  `id` int(11) NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `sn` varchar(128) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_snpembelian`
--

INSERT INTO `tbl_snpembelian` (`id`, `id_pembeli`, `sn`, `qty`) VALUES
(6, 17, '22', 22),
(7, 17, '1234567489', 1),
(31, 12, '1234567489', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tracking`
--

CREATE TABLE `tbl_tracking` (
  `id_tracking` int(11) NOT NULL,
  `id_aset` int(11) NOT NULL,
  `departemen_id` int(11) NOT NULL,
  `nama_karyawan` varchar(128) NOT NULL,
  `tgl_serah_terima` date NOT NULL,
  `tgl_buat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_tracking`
--

INSERT INTO `tbl_tracking` (`id_tracking`, `id_aset`, `departemen_id`, `nama_karyawan`, `tgl_serah_terima`, `tgl_buat`) VALUES
(5, 5, 2, 'Radiyan Imam', '2021-02-03', 1);

--
-- Triggers `tbl_tracking`
--
DELIMITER $$
CREATE TRIGGER `add_tracking_insert` AFTER INSERT ON `tbl_tracking` FOR EACH ROW BEGIN

 INSERT INTO tbl_histori_dokumen

   ( id,
    
   id_tracking

   )

   VALUES

   ( '',
    NEW.id_tracking

     
      
     );

     END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `add_tracking_update` AFTER UPDATE ON `tbl_tracking` FOR EACH ROW BEGIN

 INSERT INTO tbl_histori_dokumen

   ( id,
    
   id_tracking

   )

   VALUES

   ( '',
    NEW.id_tracking

     
      
     );

     END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_warnakain`
--

CREATE TABLE `tbl_warnakain` (
  `id` int(11) NOT NULL,
  `idKain` int(11) NOT NULL,
  `warnaKain` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_warnakain`
--

INSERT INTO `tbl_warnakain` (`id`, `idKain`, `warnaKain`) VALUES
(1, 1, 'White'),
(2, 1, 'Beige'),
(3, 1, 'Grey'),
(4, 1, 'Black'),
(5, 2, 'White'),
(6, 2, 'Mocca'),
(7, 3, 'White'),
(8, 3, 'Mocca'),
(9, 3, 'Dark Grey');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(50, 'Radiyan Imam S.kom', 'radiyanimam@gmail.com', 'radiyan.jpg', '$2y$10$AdoHeai1oWEDGyap/7M4VOiKyWQ0y6t3DfGMyUKtM8gXOJPE/Zgry', 1, 1, 1612326695),
(51, 'Radiyan Imam S.kom', 'radiyandumay@gmail.com', 'default.png', '$2y$10$CZPSzUoLk970Xbfwlxa0GuyIts4NY2kpafX76Zv7o4LrOLxQ6TJGq', 2, 1, 1612326965);

-- --------------------------------------------------------

--
-- Table structure for table `user_acces_menu`
--

CREATE TABLE `user_acces_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_acces_menu`
--

INSERT INTO `user_acces_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(29, 1, 17),
(41, 1, 2),
(49, 1, 3),
(53, 2, 19),
(54, 2, 18),
(55, 2, 15),
(56, 2, 6),
(62, 1, 6),
(63, 1, 15),
(65, 1, 19),
(66, 1, 18),
(67, 1, 20);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'admin'),
(2, 'user'),
(6, 'Managemen Aset'),
(15, 'Office Management'),
(18, 'Arai'),
(19, 'Menu Management'),
(20, 'Report Arai');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'administrator'),
(2, 'member');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/editprofile', 'fas fa-fw fa-user-edit', 1),
(7, 1, 'Role Acces', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(8, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(9, 6, 'Asset Category', 'aset', 'fas fa-fw fa-anchor', 1),
(10, 6, 'Pembelian', 'pembelian/', 'fas fa-fw fa-shopping-cart', 1),
(11, 6, 'Tracking Asset ', 'aset/TrackingAset ', 'fa fa-fw fa-compress-alt', 1),
(15, 11, 'Tracking Asset ww', 'aset/tracking', 'fa fa-fw compress-alt', 1),
(16, 15, 'Departement', 'departemen/', 'fas fa-fw fa-building', 1),
(17, 1, 'Role Management', 'admin/roleManagement', 'fas fa-fw fa-users', 1),
(18, 18, 'Customer Arai', 'Arai', 'fa fa-fw fa-users', 1),
(19, 19, 'Menu Management ', 'menu', 'fas fa-fw fa-folder', 1),
(20, 19, 'Sub Menu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(21, 18, 'System Arai / Product Arai', 'arai/product', 'fa fa-fw fa-list-alt', 1),
(22, 20, 'Report Arai', 'arai/reportArai', 'fas fa-fw fa-chart-bar', 1),
(23, 20, 'Report Fabric', 'arai/reportFabric', 'fas fa-fw fa-chart-bar', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_aset`
--
ALTER TABLE `tbl_aset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_departemen`
--
ALTER TABLE `tbl_departemen`
  ADD PRIMARY KEY (`departemen_id`);

--
-- Indexes for table `tbl_histrori_aset`
--
ALTER TABLE `tbl_histrori_aset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kain`
--
ALTER TABLE `tbl_kain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_penjualanarai`
--
ALTER TABLE `tbl_penjualanarai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_snpembelian`
--
ALTER TABLE `tbl_snpembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tracking`
--
ALTER TABLE `tbl_tracking`
  ADD PRIMARY KEY (`id_tracking`);

--
-- Indexes for table `tbl_warnakain`
--
ALTER TABLE `tbl_warnakain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_acces_menu`
--
ALTER TABLE `user_acces_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_aset`
--
ALTER TABLE `tbl_aset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `tbl_departemen`
--
ALTER TABLE `tbl_departemen`
  MODIFY `departemen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_histrori_aset`
--
ALTER TABLE `tbl_histrori_aset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_kain`
--
ALTER TABLE `tbl_kain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_penjualanarai`
--
ALTER TABLE `tbl_penjualanarai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_snpembelian`
--
ALTER TABLE `tbl_snpembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_tracking`
--
ALTER TABLE `tbl_tracking`
  MODIFY `id_tracking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_warnakain`
--
ALTER TABLE `tbl_warnakain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `user_acces_menu`
--
ALTER TABLE `user_acces_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
