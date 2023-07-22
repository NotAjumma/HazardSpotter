-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2023 at 11:09 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hazardspotterdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(300) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `address` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `name`, `email`, `phone`, `address`) VALUES
('admin', 'admin', 'Naim Daniel  2', 'admin@gmail.com', '+60123123934', 'UiTM Perlis');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `comments` text NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `news_id` int(12) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `date`, `comments`, `latitude`, `longitude`, `news_id`, `user_id`) VALUES
(2, '2023-07-20 01:18:02', 'as', 0, 0, 10, 1),
(3, '2023-07-22 00:00:00', 'Beberapa kawasan di pantai barat Sabah dilanda banjir kilat, tanah runtuh dan tanah mendap akibat hujan lebat berterusan selama beberapa jam pada lewat petang ini. ', 0, 0, 7, 1),
(4, '2023-07-22 01:18:02', 'as', 0, 0, 11, 1),
(14, '2023-07-20 01:18:02', 'sdasd', 0, 0, 12, 1),
(15, '2023-07-13 02:16:01', 'qwerty', 0, 0, 7, 1),
(16, '2023-07-16 00:00:00', 'Beberapa kawasan di pantai barat Sabah dilanda banjir kilat, tanah runtuh dan tanah mendap akibat hujan lebat berterusan selama beberapa jam pada lewat petang ini. ', 0, 0, 7, 1),
(17, '2023-07-20 03:47:03', 'sudah jadi kah', 0, 0, 12, 1),
(18, '2023-07-20 05:24:51', 'TESTTEST', 0, 0, 7, 1),
(19, '2023-07-20 05:25:47', 'TEST2', 0, 0, 7, 1),
(20, '2023-07-20 05:32:24', 'TEST3', 0, 0, 13, 1),
(21, '2023-07-20 05:33:21', 'TEST4', 0, 0, 8, 1),
(22, '2023-07-20 05:36:10', 'TESADSAD', 0, 0, 8, 1),
(23, '2023-07-20 05:39:27', 'Beberapa kawasan di pantai barat Sabah dilanda banjir kilat, tanah runtuh dan tanah mendap akibat hujan lebat berterusan selama beberapa jam pada lewat petang ini. ', 0, 0, 7, 1),
(24, '2023-07-20 05:43:27', 'jugkjhg', 0, 0, 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(12) NOT NULL,
  `title` varchar(255) NOT NULL,
  `location` varchar(300) NOT NULL,
  `description` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `image_url` varchar(350) NOT NULL,
  `reporter_name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `title`, `location`, `description`, `date`, `image_url`, `reporter_name`) VALUES
(7, 'Pantai barat Sabah dilanda banjir kilat, tanah runtuh dan mendap', 'KOTA KINABALU', 'Beberapa kawasan di pantai barat Sabah dilanda banjir kilat, tanah runtuh dan tanah mendap akibat hujan lebat berterusan selama beberapa jam pada lewat petang ini. Tinjauan dijalankan mendapati bebera', '2023-07-12', 'https://img.astroawani.com/2022-12/41671971673_BanjirSabah.jpg', 'Jurucakap Angkatan Pertahanan Awam Malaysia (APM) Sabah'),
(8, 'Sekawan lembu lintas jalan mengejut punca kemalangan', 'PETALING JAYA', 'PETALING JAYA – Tular sebuah rakaman kamera papan pemuka (dashcam) memaparkan detik kejadian dimana sekumpulan lembu melintas jalan secara tiba-tiba sehingga mengakibatkan berlakunya kemalangan meliba', '2023-07-20', 'https://www.kosmo.com.my/wp-content/uploads/2023/07/WhatsApp-Image-2023-07-20-at-17.34.46.jpeg', 'KOSMO'),
(9, 'Mangsa banjir di Johor sudah lebih 50,000\r\n', 'JOHOR BAHRU', 'JOHOR BAHRU: Jumlah mangsa banjir di Johor mencecah lebih 50,000 orang apabila setakat jam 8 malam ini seramai 1,146 lagi mangsa dipindahkan ke pusat pemindahan sementara (PPS).\r\n\r\nSetiausaha Kerajaan', '2023-03-05', 'https://assets.bharian.com.my/images/articles/bh5cecah2_1678063663.jpg', 'Izz Laily Hussein'),
(10, 'Kebakaran di Mid Valley Megamall', 'KUALA LUMPUR', 'KUALA LUMPUR: Kebakaran berlaku di kompleks beli-belah Mid Valley Megamall, dekat Bangsar, pagi ini dengan kepulan asap hitam yang menjulang dapat dilihat beberapa kilometer dari tempat kejadian.\r\n\r\nV', '2023-05-17', 'https://assets.bharian.com.my/images/articles/hm252aeon_1684302754.jpg', 'Safeek Affendy Razali dan Fuad Nizam '),
(11, 'Kedai dua tingkat musnah dalam kebakaran\r\n', 'PETALING JAYA', 'PETALING JAYA: Sebuah premis kedai dua tingkat di Nalan SS 14/2A, Subang Jaya di sini terbakar awal pagi ini. \r\n\r\nPusat Gerakan Operasi Selangor menerima panggilan kecemasan pada pukul 4.06 pagi dan s', '2023-05-29', 'https://www.utusan.com.my/wp-content/uploads/bomba-32.jpg', 'NURAINA HANIS ABD . HALIM'),
(12, 'Cuaca panas: Kes kebakaran terbuka meningkat sejak April - Bomba\r\n', 'KUALA LUMPUR', 'KUALA LUMPUR: Jabatan Bomba dan Penyelamat Malaysia (JBPM) merekodkan sebanyak 6,326 kes kebakaran terbuka sejak Januari hingga April lalu.\r\nMenurut Timbalan Ketua Pengarah (Operasi) JBPM Datuk Edwin ', '2023-05-04', 'https://img.astroawani.com/2023-05/71683172631_DatukEdwinGalanTe.jpg', 'Azyyati Ahmad\r\n'),
(13, 'Kapal MV Tung Sung terbalik, 9 kru hilang\r\n', 'KUCHING ', 'KUCHING – Sembilan kru sebuah kapal hilang selepas Kapal MV Tung Sung itu terbalik di perairan Sebuyau pada jarak lebih kurang empat batu nautika barat laut Pulau Burung.\r\n\r\nPengarah Maritim Sarawak, ', '2023-07-20', 'https://www.kosmo.com.my/wp-content/uploads/2023/07/WhatsApp-Image-2023-07-20-at-19.43.47.jpeg', 'CHERINE JON'),
(14, 'Polis Mukah cari waris lelaki maut kes langgar lari\r\n', 'SIBU', 'SIBU: Polis berusaha mengesan waris seorang lelaki tidak dikenali yang maut dalam satu kes langgar lari semasa berjalan kaki di Kilometer 74, Jalan Sibu-Bintulu awal pagi tadi.\r\nKetua Polis Daerah Muk', '2023-07-02', 'https://img.astroawani.com/2023-07/71688293748_KemalanganMukah.jpg', 'BERNAMA'),
(15, 'Kereta bertembung lori tangki minyak, seorang maut\r\n', 'ROMPIN', 'ROMPIN: Seorang lelaki maut dalam satu kemalangan membabitkan sebuah kereta jenis Perodua Myvi dan sebuah lori tangki minyak di Jalan Rompin Endau-Kampung Batu 8 Pontian, dekat sini, pagi tadi.\r\nPegaw', '2023-06-28', 'https://img.astroawani.com/2023-06/61687913218_ROMPIN.jpg', 'Azee Shafy\r\n'),
(16, 'Malaysia perlu bersedia hadapi migrasi akibat iklim, bencana alam', 'KUALA LUMPUR', 'Institut Ekonomi dan Keamanan (IEP) menganggarkan 1.2 bilion penduduk dunia boleh hilang tempat tinggal menjelang 2050 akibat bencana alam, justeru penghijrahan akibat iklim menjadi isu yang membimban', '2023-07-22', 'https://www.sinarharian.com.my/uploads/images/2023/07/22/2275280.jpg', 'Bernama');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(12) NOT NULL,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `email`, `ip_address`, `user_agent`) VALUES
(1, 'Hariz Yob b', 'hariz@gmail.com', '162.42.241', 'Android');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
