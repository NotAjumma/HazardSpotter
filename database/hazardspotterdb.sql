-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2023 at 08:27 PM
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
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');

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
(2, '2023-07-20 01:18:02', 'as', 0, 0, 2, 2),
(3, '2023-07-31 01:18:02', 'Beberapa kawasan di pantai barat Sabah dilanda banjir kilat, tanah runtuh dan tanah mendap akibat hujan lebat berterusan selama beberapa jam pada lewat petang ini. ', 0, 0, 7, 2),
(4, '2023-07-31 01:18:02', 'as', 0, 0, 5, 2),
(14, '2023-07-20 01:18:02', 'sdasd', 0, 0, 1, 1),
(15, '2023-07-13 02:16:01', 'qwerty', 0, 0, 7, 1),
(16, '2023-07-16 00:00:00', 'Beberapa kawasan di pantai barat Sabah dilanda banjir kilat, tanah runtuh dan tanah mendap akibat hujan lebat berterusan selama beberapa jam pada lewat petang ini. ', 0, 0, 7, 1),
(17, '2023-07-20 03:47:03', 'sudah jadi kah', 0, 0, 2, 1),
(18, '2023-07-20 05:24:51', 'TESTTEST', 0, 0, 7, 1),
(19, '2023-07-20 05:25:47', 'TEST2', 0, 0, 7, 1),
(20, '2023-07-20 05:32:24', 'TEST3', 0, 0, 2, 1),
(21, '2023-07-20 05:33:21', 'TEST4', 0, 0, 1, 1),
(22, '2023-07-20 05:36:10', 'TESADSAD', 0, 0, 1, 1),
(23, '2023-07-20 05:39:27', 'Beberapa kawasan di pantai barat Sabah dilanda banjir kilat, tanah runtuh dan tanah mendap akibat hujan lebat berterusan selama beberapa jam pada lewat petang ini. ', 0, 0, 7, 1),
(24, '2023-07-20 05:43:27', 'jugkjhg', 0, 0, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(12) NOT NULL,
  `title` varchar(255) NOT NULL,
  `location` varchar(300) NOT NULL,
  `description` varchar(600) NOT NULL,
  `date` date NOT NULL,
  `image_url` varchar(350) NOT NULL,
  `reporter_name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `title`, `location`, `description`, `date`, `image_url`, `reporter_name`) VALUES
(2, 'Road Crack', 'Depan Masjid Batu Gajah', 'Crackedewewew', '2023-07-20', '', 'Imran'),
(3, 'Jalan Berlubang', 'Belakang Sekolah Tiwa', 'Near UiTM Perlis', '2023-07-20', '', 'Naim'),
(4, 'Banjir Lebat', 'Depan Rumah', 'Longkang Tersumbat hati2', '2023-07-13', '', 'Naim Daniel'),
(5, 'Hutan Terbakar', 'Hutan Simpanan', 'Hutan terbakar menyebabkan jerebu', '2023-07-12', '', 'Azizan'),
(7, 'Pantai barat Sabah dilanda banjir kilat, tanah runtuh dan mendap', 'KOTA KINABALU', 'Beberapa kawasan di pantai barat Sabah dilanda banjir kilat, tanah runtuh dan tanah mendap akibat hujan lebat berterusan selama beberapa jam pada lewat petang ini. Tinjauan dijalankan mendapati beberapa jalan turut dilanda banjir kilat dan masih mengakibatkan kesesakan teruk sehingga berita ini ditulis malam ini antaranya Jalan Tuaran Bypass, Jalan Universiti Malaysia Sabah, Jalan Kibabaig Penampang, Jalan Likas, Jalan Menggatal dan Jalan Kayu Madang.', '2023-07-12', 'https://img.astroawani.com/2022-12/41671971673_BanjirSabah.jpg', 'Jurucakap Angkatan Pertahanan Awam Malaysia (APM) Sabah');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(12) NOT NULL,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `email`, `contact`, `ip_address`, `user_agent`) VALUES
(1, 'Hariz Yob', 'hariz@gmail.com', '017293240239', '162.42.241', 'Android'),
(2, 'Naim Daniel', 'naim@gmail.com', '0123123099', '123.543.2342', 'Anroid');

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
  MODIFY `news_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
