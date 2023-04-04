-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Des 2022 pada 20.06
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-medicord_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dokter`
--

CREATE TABLE `tbl_dokter` (
  `dokter_id` int(11) NOT NULL,
  `nama_dokter` varchar(128) NOT NULL,
  `spesialis` varchar(128) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `ttd_dokter` varchar(150) NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_dokter`
--

INSERT INTO `tbl_dokter` (`dokter_id`, `nama_dokter`, `spesialis`, `jenis_kelamin`, `ttd_dokter`, `createtime`) VALUES
(1, 'dr. Ratnaningsih Kasy', 'Umum', 'Perempuan', 'dokter-20221212012844.png', '2022-11-10 18:48:05'),
(8, 'drg. Liandy Karnian WL', 'Gigi dan mulut', 'Laki-laki', 'dokter-20221212012212.png', '2022-12-12 01:18:02'),
(9, 'dr.  Sapriani Iskandar', 'Anak/MTBS', 'Perempuan', 'dokter-20221212012118.png', '2022-12-12 01:21:18'),
(10, 'dr. Fauziah Ibrahim', 'Umum', 'Laki-laki', 'dokter-20221212013124.png', '2022-12-12 01:31:24'),
(11, 'drg. Tri Rahayu', 'Gigi dan mulut', 'Perempuan', 'dokter-20221212013311.png', '2022-12-12 01:33:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_faq`
--

CREATE TABLE `tbl_faq` (
  `faq_id` int(11) NOT NULL,
  `faq_question` text NOT NULL,
  `faq_answer` text NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_faq`
--

INSERT INTO `tbl_faq` (`faq_id`, `faq_question`, `faq_answer`, `createtime`) VALUES
(1, 'jelaskan tentang Website puskesmas mekar', 'Website puskesmas mekar dan e-medicord  ini dibuat oleh Muh. Fadjrul Falakh sebagai implementasi dari keilmuan yang dimiliki untuk sebagai syarat kelulusan Sarjana Teknik Informatika di Universitas Halu Oleo, Fakultas Teknik, Jurusan Teknik Informatika.', '2022-11-30 02:23:27'),
(3, 'DImana Lokasi Puskesmas Mekar', 'Jl. Laremba, Kadia Komp. RCTI Kadia', '2022-12-11 03:49:09'),
(4, 'Apa itu e-medicord', 'e-medicord merupakan aplikasi rekam medis elektronik untuk  menyimpan data-data rekam medis pasien puskesmas mekar', '2022-12-11 03:50:48'),
(5, 'Apakah e-medicord aman', 'e-medicord dilengkapi dengan enkripsi database sehingga dapat menambah keamanan data-data rekam medis pasien', '2022-12-14 19:00:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_group`
--

CREATE TABLE `tbl_group` (
  `group_id` int(11) NOT NULL,
  `group_name` varchar(50) NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_group`
--

INSERT INTO `tbl_group` (`group_id`, `group_name`, `createtime`) VALUES
(1, 'Administrator', '2022-09-30 11:27:59'),
(2, 'Perekam Medis', '2022-09-30 11:27:59'),
(6, 'Pengelolah Berita', '2022-11-25 14:25:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jns_key`
--

CREATE TABLE `tbl_jns_key` (
  `jns_key_id` int(11) NOT NULL,
  `nama_jns_key` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_jns_key`
--

INSERT INTO `tbl_jns_key` (`jns_key_id`, `nama_jns_key`) VALUES
(1, 'AES-128'),
(2, 'SPECK-128');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kepesertaan_pasien`
--

CREATE TABLE `tbl_kepesertaan_pasien` (
  `kepesertaan_pasien_id` int(11) NOT NULL,
  `nama_kepesertaan_pasien` varchar(128) NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kepesertaan_pasien`
--

INSERT INTO `tbl_kepesertaan_pasien` (`kepesertaan_pasien_id`, `nama_kepesertaan_pasien`, `createtime`) VALUES
(1, 'PNS', '2022-10-21 03:01:24'),
(2, 'Mandiri', '2022-10-21 03:01:24'),
(3, 'Jamsostek', '2022-10-21 03:02:43'),
(4, 'APBN', '2022-10-21 03:02:43'),
(5, 'APBD', '2022-10-21 03:03:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_log`
--

CREATE TABLE `tbl_log` (
  `log_id` int(11) NOT NULL,
  `log_time` datetime NOT NULL,
  `log_message` varchar(200) NOT NULL,
  `log_ipaddress` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_log`
--

INSERT INTO `tbl_log` (`log_id`, `log_time`, `log_message`, `log_ipaddress`, `user_id`, `createtime`) VALUES
(1, '2022-10-05 11:28:08', 'Administrator CoreIgniter melakukan login ke sistem', '127.0.0.1', 1, '2022-10-05 11:28:08'),
(537, '2022-11-24 00:21:57', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-11-24 00:21:57'),
(538, '2022-11-24 00:40:39', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-11-24 00:40:39'),
(539, '2022-11-24 00:42:13', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-11-24 00:42:13'),
(540, '2022-11-24 13:39:18', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-11-24 13:39:18'),
(541, '2022-11-24 18:16:13', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-11-24 18:16:13'),
(542, '2022-11-25 10:31:35', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-11-25 10:31:35'),
(543, '2022-11-25 11:20:35', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-11-25 11:20:35'),
(544, '2022-11-25 14:25:10', 'administrator menambah data group Pengelola Berita', '::1', 1, '2022-11-25 14:25:10'),
(545, '2022-11-25 14:33:35', 'administrator mengubah data group dengan ID =  - Pengelolah Berita', '::1', 1, '2022-11-25 14:33:35'),
(546, '2022-11-25 15:55:50', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-11-25 15:55:50'),
(547, '2022-11-25 16:03:41', 'administrator menghapus data slider dengan ID = 4 - 4', '::1', 1, '2022-11-25 16:03:41'),
(548, '2022-11-25 16:04:00', 'administrator menambah data slider dengan name = slider-20221125160400.jpg', '::1', 1, '2022-11-25 16:04:00'),
(549, '2022-11-25 17:49:21', 'administrator menambah data slider dengan name = slider-20221125174921.jpg', '::1', 1, '2022-11-25 17:49:21'),
(550, '2022-11-25 18:51:09', 'administrator menghapus data slider dengan ID = 3 - 3', '::1', 1, '2022-11-25 18:51:09'),
(551, '2022-11-25 18:51:19', 'administrator menambah data slider dengan name = slider-20221125185119.jpg', '::1', 1, '2022-11-25 18:51:19'),
(552, '2022-11-25 18:53:44', 'administrator menghapus data slider dengan ID = 2 - 2', '::1', 1, '2022-11-25 18:53:44'),
(553, '2022-11-25 18:57:54', 'administrator menghapus data slider dengan ID = 5 - 5', '::1', 1, '2022-11-25 18:57:54'),
(554, '2022-11-25 18:58:04', 'administrator menambah data slider dengan name = slider-20221125185804.jpg', '::1', 1, '2022-11-25 18:58:04'),
(555, '2022-11-25 19:01:03', 'administrator menghapus data slider dengan ID = 8 - 8', '::1', 1, '2022-11-25 19:01:03'),
(556, '2022-11-25 19:01:16', 'administrator menambah data slider dengan name = slider-20221125190115.jpg', '::1', 1, '2022-11-25 19:01:16'),
(557, '2022-11-25 19:05:45', 'administrator menghapus data slider dengan ID = 7 - 7', '::1', 1, '2022-11-25 19:05:45'),
(558, '2022-11-25 19:05:53', 'administrator menambah data slider dengan name = slider-20221125190553.jpg', '::1', 1, '2022-11-25 19:05:53'),
(559, '2022-11-25 21:47:27', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-11-25 21:47:27'),
(560, '2022-11-26 00:59:42', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-11-26 00:59:42'),
(561, '2022-11-26 01:47:11', 'administrator menambah data slider dengan name = slider-20221126014711.png', '::1', 1, '2022-11-26 01:47:11'),
(562, '2022-11-26 16:31:00', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-11-26 16:31:00'),
(563, '2022-11-27 20:44:52', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-11-27 20:44:52'),
(564, '2022-11-27 20:53:53', 'administrator mengubah data slider dengan ID = 11', '::1', 1, '2022-11-27 20:53:53'),
(565, '2022-11-27 20:54:03', 'administrator menghapus data slider dengan ID = 10 - 10', '::1', 1, '2022-11-27 20:54:03'),
(566, '2022-11-27 20:56:42', 'administrator mengubah data slider dengan ID = 11', '::1', 1, '2022-11-27 20:56:42'),
(567, '2022-11-27 21:14:24', 'administrator menambah data slider dengan name = slider-20221127211424.jpg', '::1', 1, '2022-11-27 21:14:24'),
(568, '2022-11-27 21:16:04', 'administrator mengubah data slider dengan ID = 12', '::1', 1, '2022-11-27 21:16:04'),
(569, '2022-11-28 11:07:22', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-11-28 11:07:22'),
(570, '2022-11-28 20:51:11', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-11-28 20:51:11'),
(571, '2022-11-28 23:43:35', 'administrator menghapus data form dengan ID = 24', '::1', 1, '2022-11-28 23:43:35'),
(572, '2022-11-28 23:53:37', 'administrator menghapus data form dengan ID = 25', '::1', 1, '2022-11-28 23:53:37'),
(573, '2022-11-28 23:56:21', 'administrator menghapus data form dengan ID = 25', '::1', 1, '2022-11-28 23:56:21'),
(574, '2022-11-29 00:02:17', 'administrator menghapus data form dengan ID = 25', '::1', 1, '2022-11-29 00:02:17'),
(575, '2022-11-29 00:02:48', 'administrator menghapus data form dengan ID = 26', '::1', 1, '2022-11-29 00:02:48'),
(576, '2022-11-29 00:03:14', 'administrator menghapus data form dengan ID = 24', '::1', 1, '2022-11-29 00:03:14'),
(577, '2022-11-29 00:03:39', 'administrator menghapus data form dengan ID = 27', '::1', 1, '2022-11-29 00:03:39'),
(578, '2022-11-29 00:05:03', 'administrator menghapus data form dengan ID = 29', '::1', 1, '2022-11-29 00:05:03'),
(579, '2022-11-29 00:05:10', 'administrator menghapus data form dengan ID = 28', '::1', 1, '2022-11-29 00:05:10'),
(580, '2022-11-29 16:21:55', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-11-29 16:21:55'),
(581, '2022-11-29 16:30:24', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-11-29 16:30:24'),
(582, '2022-11-29 16:30:54', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-11-29 16:30:54'),
(583, '2022-11-29 23:30:25', 'administrator menambah data kategori bidang berita Apoteker', '::1', 1, '2022-11-29 23:30:25'),
(584, '2022-11-30 01:58:56', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-11-30 01:58:56'),
(585, '2022-11-30 02:23:27', 'administrator menambah data faq Tes', '::1', 1, '2022-11-30 02:23:27'),
(586, '2022-11-30 02:29:53', 'administrator mengubah data faq dengan ID = 1', '::1', 1, '2022-11-30 02:29:53'),
(587, '2022-11-30 02:34:24', 'administrator menambah data faq', '::1', 1, '2022-11-30 02:34:24'),
(588, '2022-11-30 02:52:04', 'administrator menghapus data faq dengan ID = 2', '::1', 1, '2022-11-30 02:52:04'),
(589, '2022-11-30 03:19:46', 'administrator menghapus data message dengan ID = 3 - ', '::1', 1, '2022-11-30 03:19:46'),
(590, '2022-11-30 05:46:35', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-11-30 05:46:35'),
(591, '2022-11-30 05:49:28', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-11-30 05:49:28'),
(592, '2022-11-30 10:48:58', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-11-30 10:48:58'),
(593, '2022-11-30 10:49:26', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-11-30 10:49:26'),
(594, '2022-11-30 13:16:04', 'administrator menghapus data link terkait dengan ID = 5 - 5', '::1', 1, '2022-11-30 13:16:04'),
(595, '2022-11-30 13:18:56', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-11-30 13:18:56'),
(596, '2022-11-30 13:21:49', 'administrator menambah data link terkait dengan ID = 1', '::1', 1, '2022-11-30 13:21:49'),
(597, '2022-11-30 13:26:03', 'administrator mengubah data link terkait dengan ID = 2', '::1', 1, '2022-11-30 13:26:03'),
(598, '2022-11-30 13:32:44', 'administrator mengubah data link terkait dengan ID = 3', '::1', 1, '2022-11-30 13:32:44'),
(599, '2022-11-30 13:32:54', 'administrator menghapus data link terkait dengan ID = 4 - 4', '::1', 1, '2022-11-30 13:32:54'),
(600, '2022-11-30 13:40:38', 'administrator mengubah data link terkait dengan ID = 3', '::1', 1, '2022-11-30 13:40:38'),
(601, '2022-11-30 13:44:08', 'administrator mengubah data link terkait dengan ID = 3', '::1', 1, '2022-11-30 13:44:08'),
(602, '2022-11-30 15:31:46', 'administrator menambah data dokter dengan nama = drg. Anggi', '::1', 1, '2022-11-30 15:31:46'),
(603, '2022-11-30 15:35:08', 'administrator menghapus data dokter dengan nama = ', '::1', 1, '2022-11-30 15:35:08'),
(604, '2022-11-30 15:38:12', 'administrator menambah data dokter dengan nama = drg. Anggi', '::1', 1, '2022-11-30 15:38:12'),
(605, '2022-11-30 16:07:15', 'administrator mengubah data dokter dengan nama = dr. andin', '::1', 1, '2022-11-30 16:07:15'),
(606, '2022-11-30 16:14:40', 'administrator mengubah data dokter dengan nama = dr. andin', '::1', 1, '2022-11-30 16:14:40'),
(607, '2022-11-30 18:47:35', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-11-30 18:47:35'),
(608, '2022-11-30 18:53:02', 'administrator mengubah data dokter dengan nama = dr. andin', '::1', 1, '2022-11-30 18:53:02'),
(609, '2022-11-30 18:56:31', 'administrator mengubah data dokter dengan nama = dr. andin', '::1', 1, '2022-11-30 18:56:31'),
(610, '2022-11-30 19:13:54', 'administrator mengubah data dokter dengan nama = dr. andin', '::1', 1, '2022-11-30 19:13:54'),
(611, '2022-11-30 19:54:08', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-11-30 19:54:08'),
(612, '2022-11-30 21:07:43', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-11-30 21:07:43'),
(613, '2022-11-30 21:21:05', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-11-30 21:21:05'),
(614, '2022-12-02 13:17:52', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-02 13:17:52'),
(615, '2022-12-03 13:17:19', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-03 13:17:19'),
(616, '2022-12-04 17:30:44', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-04 17:30:44'),
(617, '2022-12-04 22:27:40', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-04 22:27:40'),
(618, '2022-12-05 11:42:40', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-05 11:42:40'),
(619, '2022-12-06 16:12:09', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-06 16:12:09'),
(620, '2022-12-06 20:39:43', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-06 20:39:43'),
(621, '2022-12-08 14:28:16', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-08 14:28:16'),
(622, '2022-12-08 14:51:26', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-08 14:51:26'),
(623, '2022-12-08 21:47:19', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-08 21:47:19'),
(624, '2022-12-08 21:49:10', 'Muh. Fadjrul Falakh menambah data pasien : Ina amalia', '::1', 1, '2022-12-08 21:49:10'),
(625, '2022-12-08 22:08:29', 'Muh. Fadjrul Falakh menambah data pasien : Anton Pagor', '::1', 1, '2022-12-08 22:08:29'),
(626, '2022-12-08 22:13:13', 'Muh. Fadjrul Falakh mengubah data pasien : Anton Pagor', '::1', 1, '2022-12-08 22:13:13'),
(627, '2022-12-08 22:16:41', 'Muh. Fadjrul Falakh menambah data pasien : Anton Pagor', '::1', 1, '2022-12-08 22:16:41'),
(628, '2022-12-09 01:56:27', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-09 01:56:27'),
(629, '2022-12-09 16:20:45', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-09 16:20:45'),
(630, '2022-12-09 17:07:11', 'Muh. Fadjrul Falakh menambah data rekam medis riwayat kunjungan pasien ', '::1', 1, '2022-12-09 17:07:11'),
(631, '2022-12-09 17:39:07', 'Muh. Fadjrul Falakh menghapus data rekam medis riwayat kunjungan pasien dengan ID : 2 - ', '::1', 1, '2022-12-09 17:39:07'),
(632, '2022-12-10 17:07:02', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-10 17:07:02'),
(633, '2022-12-10 20:35:28', 'Muh. Fadjrul Falakh mengubah data pegawai dengan ID - nama :  - Suarni s', '::1', 1, '2022-12-10 20:35:28'),
(634, '2022-12-10 20:45:47', 'Muh. Fadjrul Falakh mengubah data pegawai dengan ID - nama :  - Suarni yA', '::1', 1, '2022-12-10 20:45:47'),
(635, '2022-12-10 20:51:57', 'Muh. Fadjrul Falakh mengubah data poliklinik dengan ID - nama :  - Poli UmumS', '::1', 1, '2022-12-10 20:51:57'),
(636, '2022-12-10 20:53:36', 'Muh. Fadjrul Falakh mengubah data poliklinik dengan ID - nama :  - Poli Umum', '::1', 1, '2022-12-10 20:53:36'),
(637, '2022-12-10 20:54:48', 'Muh. Fadjrul Falakh mengubah data poliklinik dengan ID - nama :  - Poli Umum', '::1', 1, '2022-12-10 20:54:48'),
(638, '2022-12-10 20:55:23', 'Muh. Fadjrul Falakh mengubah data poliklinik dengan ID - nama :  - Poli Umum', '::1', 1, '2022-12-10 20:55:23'),
(639, '2022-12-10 20:56:42', 'Muh. Fadjrul Falakh mengubah data poliklinik dengan ID - nama :  - Poli UmumXX', '::1', 1, '2022-12-10 20:56:42'),
(640, '2022-12-10 21:02:35', 'Muh. Fadjrul Falakh mengubah data poliklinik dengan ID - nama :  - Poli Anaks', '::1', 1, '2022-12-10 21:02:35'),
(641, '2022-12-10 21:03:01', 'administrator mengubah data faq dengan ID = 1', '::1', 1, '2022-12-10 21:03:01'),
(642, '2022-12-10 21:04:56', 'administrator mengubah data faq dengan ID = 1', '::1', 1, '2022-12-10 21:04:56'),
(643, '2022-12-10 21:16:19', 'administrator mengubah data group dengan ID =  - Pengelolah Konten & Berita', '::1', 1, '2022-12-10 21:16:19'),
(644, '2022-12-10 21:18:19', 'administrator mengubah data group dengan ID = 6 - Pengelolah Berita', '::1', 1, '2022-12-10 21:18:19'),
(645, '2022-12-10 21:22:25', 'Muh. Fadjrul Falakh mengubah data poliklinik dengan ID - nama : 1 - Poli Umums', '::1', 1, '2022-12-10 21:22:25'),
(646, '2022-12-10 21:22:37', 'Muh. Fadjrul Falakh mengubah data poliklinik dengan ID - nama : 1 - Poli Umum', '::1', 1, '2022-12-10 21:22:37'),
(647, '2022-12-10 21:23:12', 'administrator mengubah data link terkait dengan ID = 1', '::1', 1, '2022-12-10 21:23:12'),
(648, '2022-12-10 21:23:25', 'administrator mengubah data link terkait dengan ID = 1', '::1', 1, '2022-12-10 21:23:25'),
(649, '2022-12-10 21:24:55', 'Muh. Fadjrul Falakh mengubah data pegawai dengan ID - nama : 1 - Suarni', '::1', 1, '2022-12-10 21:24:55'),
(650, '2022-12-10 21:25:06', 'Muh. Fadjrul Falakh mengubah data pegawai dengan ID - nama : 1 - Suarni', '::1', 1, '2022-12-10 21:25:06'),
(651, '2022-12-10 21:26:37', 'Muh. Fadjrul Falakh mengubah data pegawai dengan ID - nama : 1 - Suarni', '::1', 1, '2022-12-10 21:26:37'),
(652, '2022-12-10 21:29:55', 'Muh. Fadjrul Falakh menambah data poliklinik dengan ID - nama :  - Poli Gigi', '::1', 1, '2022-12-10 21:29:55'),
(653, '2022-12-10 21:31:12', 'Muh. Fadjrul Falakh menambah data poliklinik dengan ID - nama :  - Poli KIA', '::1', 1, '2022-12-10 21:31:12'),
(654, '2022-12-10 21:31:51', 'Muh. Fadjrul Falakh menambah data poliklinik dengan ID - nama :  - ss', '::1', 1, '2022-12-10 21:31:51'),
(655, '2022-12-10 21:32:01', 'Muh. Fadjrul Falakh menambah data poliklinik dengan ID - nama :  - aa', '::1', 1, '2022-12-10 21:32:01'),
(656, '2022-12-10 21:32:34', 'Muh. Fadjrul Falakh menambah data poliklinik dengan ID - nama :  - cc', '::1', 1, '2022-12-10 21:32:34'),
(657, '2022-12-10 21:32:44', 'Muh. Fadjrul Falakh menambah data poliklinik dengan ID - nama :  - dd', '::1', 1, '2022-12-10 21:32:44'),
(658, '2022-12-10 21:32:52', 'Muh. Fadjrul Falakh menambah data poliklinik dengan ID - nama :  - ff', '::1', 1, '2022-12-10 21:32:52'),
(659, '2022-12-10 21:33:08', 'Muh. Fadjrul Falakh menambah data poliklinik dengan ID - nama :  - jj', '::1', 1, '2022-12-10 21:33:08'),
(660, '2022-12-10 21:33:16', 'Muh. Fadjrul Falakh menambah data poliklinik dengan ID - nama :  - uu', '::1', 1, '2022-12-10 21:33:16'),
(661, '2022-12-10 21:33:43', 'Muh. Fadjrul Falakh menambah data poliklinik dengan ID - nama :  - qq', '::1', 1, '2022-12-10 21:33:43'),
(662, '2022-12-10 21:57:26', 'Muh. Fadjrul Falakh menambah data poliklinik dengan ID - nama :  - rr', '::1', 1, '2022-12-10 21:57:26'),
(663, '2022-12-11 00:26:34', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-11 00:26:34'),
(664, '2022-12-11 01:06:32', 'Muh. Fadjrul Falakh menghapus data pegawai dengan ID : 1', '::1', 1, '2022-12-11 01:06:32'),
(665, '2022-12-11 01:06:57', 'Muh. Fadjrul Falakh menambah data pegawai dengan ID - nama :  - Naruto', '::1', 1, '2022-12-11 01:06:57'),
(666, '2022-12-11 03:17:34', 'Muh. Fadjrul Falakh menambah data dokter dengan ID - nama :  - dr. Kane', '::1', 1, '2022-12-11 03:17:34'),
(667, '2022-12-11 03:19:44', 'Muh. Fadjrul Falakh menambah data dokter dengan ID - nama :  - dr. John', '::1', 1, '2022-12-11 03:19:44'),
(668, '2022-12-11 03:24:08', 'Muh. Fadjrul Falakh menghapus data dokter dengan nama = 7', '::1', 1, '2022-12-11 03:24:08'),
(669, '2022-12-11 03:25:06', 'Muh. Fadjrul Falakh menghapus data dokter dengan ID : 6', '::1', 1, '2022-12-11 03:25:06'),
(670, '2022-12-11 03:34:55', 'Muh. Fadjrul Falakh menghapus data poliklinik dengan ID : 11', '::1', 1, '2022-12-11 03:34:55'),
(671, '2022-12-11 03:35:03', 'Muh. Fadjrul Falakh menghapus data poliklinik dengan ID : 12', '::1', 1, '2022-12-11 03:35:03'),
(672, '2022-12-11 03:35:15', 'Muh. Fadjrul Falakh menghapus data poliklinik dengan ID : 13', '::1', 1, '2022-12-11 03:35:15'),
(673, '2022-12-11 03:35:23', 'Muh. Fadjrul Falakh menghapus data poliklinik dengan ID : 10', '::1', 1, '2022-12-11 03:35:23'),
(674, '2022-12-11 03:35:27', 'Muh. Fadjrul Falakh menghapus data poliklinik dengan ID : 9', '::1', 1, '2022-12-11 03:35:27'),
(675, '2022-12-11 03:35:31', 'Muh. Fadjrul Falakh menghapus data poliklinik dengan ID : 8', '::1', 1, '2022-12-11 03:35:31'),
(676, '2022-12-11 03:35:34', 'Muh. Fadjrul Falakh menghapus data poliklinik dengan ID : 7', '::1', 1, '2022-12-11 03:35:34'),
(677, '2022-12-11 03:35:38', 'Muh. Fadjrul Falakh menghapus data poliklinik dengan ID : 6', '::1', 1, '2022-12-11 03:35:38'),
(678, '2022-12-11 03:49:09', 'Muh. Fadjrul Falakh menambah data faq dengan ID : ', '::1', 1, '2022-12-11 03:49:09'),
(679, '2022-12-11 03:50:48', 'Muh. Fadjrul Falakh menambah data faq dengan pertanyaan : qqq', '::1', 1, '2022-12-11 03:50:48'),
(680, '2022-12-11 15:04:20', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-11 15:04:20'),
(681, '2022-12-11 21:17:46', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-11 21:17:46'),
(682, '2022-12-12 00:05:38', 'Muh. Fadjrul Falakh mengubah data pegawai dengan nama : Hj. Hadijah, SKM., M.Kes.', '::1', 1, '2022-12-12 00:05:38'),
(683, '2022-12-12 00:07:09', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : Hayum Nartin', '::1', 1, '2022-12-12 00:07:09'),
(684, '2022-12-12 00:08:11', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : Irvan, SKM.', '::1', 1, '2022-12-12 00:08:11'),
(685, '2022-12-12 00:10:49', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : Evyanti Muas Saputri, SKM', '::1', 1, '2022-12-12 00:10:49'),
(686, '2022-12-12 00:12:28', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : Riny Andriani, SKM., M.Kes.', '::1', 1, '2022-12-12 00:12:28'),
(687, '2022-12-12 00:13:38', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : Rina Elisa, S.Kep., Ns.', '::1', 1, '2022-12-12 00:13:38'),
(688, '2022-12-12 00:14:47', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : Fitri Erningtyas', '::1', 1, '2022-12-12 00:14:47'),
(689, '2022-12-12 00:16:21', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : dr. Ratnaningsih Kasy', '::1', 1, '2022-12-12 00:16:21'),
(690, '2022-12-12 00:17:50', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : drg. Liandy Karnian WL', '::1', 1, '2022-12-12 00:17:50'),
(691, '2022-12-12 00:19:33', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : Dewi Sultriana, S.ST.', '::1', 1, '2022-12-12 00:19:33'),
(692, '2022-12-12 00:20:29', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : dr. Sapriani Iskandar', '::1', 1, '2022-12-12 00:20:29'),
(693, '2022-12-12 00:21:18', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : dr. Fauziah Ibrahim', '::1', 1, '2022-12-12 00:21:18'),
(694, '2022-12-12 00:22:15', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : Amra Nur, S.Si., A.pt.', '::1', 1, '2022-12-12 00:22:15'),
(695, '2022-12-12 00:23:16', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : Sartina, S.Kep.', '::1', 1, '2022-12-12 00:23:16'),
(696, '2022-12-12 00:24:08', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : Yuni Asna, S.Tr.Keb.', '::1', 1, '2022-12-12 00:24:08'),
(697, '2022-12-12 00:25:07', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : Alang, AMAK', '::1', 1, '2022-12-12 00:25:07'),
(698, '2022-12-12 00:25:44', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : Ashmaria, S.ST.', '::1', 1, '2022-12-12 00:25:44'),
(699, '2022-12-12 00:26:51', 'Muh. Fadjrul Falakh mengubah data pegawai dengan nama : Riny Andriani, SKM., M.Kes.', '::1', 1, '2022-12-12 00:26:51'),
(700, '2022-12-12 00:27:34', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : Asriani L, S.Kep.', '::1', 1, '2022-12-12 00:27:34'),
(701, '2022-12-12 00:28:17', 'Muh. Fadjrul Falakh mengubah data pegawai dengan nama : Rina Elisa, S.Kep., Ns.', '::1', 1, '2022-12-12 00:28:17'),
(702, '2022-12-12 00:29:27', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : Putri Kusuma D, S.Kep, Ns.', '::1', 1, '2022-12-12 00:29:27'),
(703, '2022-12-12 00:30:01', 'Muh. Fadjrul Falakh mengubah data pegawai dengan nama : Rina Elisa, S.Kep., Ns.', '::1', 1, '2022-12-12 00:30:01'),
(704, '2022-12-12 00:30:30', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : Nursamtria', '::1', 1, '2022-12-12 00:30:30'),
(705, '2022-12-12 00:31:23', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : Martha Dwi F, Am.Keb.', '::1', 1, '2022-12-12 00:31:23'),
(706, '2022-12-12 00:32:17', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : Yulianti Sahirun, SKM.', '::1', 1, '2022-12-12 00:32:17'),
(707, '2022-12-12 00:32:57', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : Hasriati, AMG', '::1', 1, '2022-12-12 00:32:57'),
(708, '2022-12-12 00:33:29', 'Muh. Fadjrul Falakh mengubah data pegawai dengan nama : Putri Kusuma D, S.Kep, Ns.', '::1', 1, '2022-12-12 00:33:29'),
(709, '2022-12-12 00:34:13', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : Rapda Sebplin, SKM.', '::1', 1, '2022-12-12 00:34:13'),
(710, '2022-12-12 00:35:18', 'Muh. Fadjrul Falakh mengubah data pegawai dengan nama : Irvan, SKM.', '::1', 1, '2022-12-12 00:35:18'),
(711, '2022-12-12 00:36:27', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : Elis Yuliani', '::1', 1, '2022-12-12 00:36:27'),
(712, '2022-12-12 00:37:10', 'Muh. Fadjrul Falakh mengubah data pegawai dengan nama : Putri Kusuma D, S.Kep, Ns.', '::1', 1, '2022-12-12 00:37:10'),
(713, '2022-12-12 00:37:50', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : Siti Indariani, AMK', '::1', 1, '2022-12-12 00:37:50'),
(714, '2022-12-12 00:38:16', 'Muh. Fadjrul Falakh mengubah data pegawai dengan nama : Irvan, SKM.', '::1', 1, '2022-12-12 00:38:16'),
(715, '2022-12-12 00:39:02', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : Ratih Astika, SKM.', '::1', 1, '2022-12-12 00:39:02'),
(716, '2022-12-12 00:39:41', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : Harmin, S.Kep.', '::1', 1, '2022-12-12 00:39:41'),
(717, '2022-12-12 00:40:31', 'Muh. Fadjrul Falakh mengubah data pegawai dengan nama : Siti Indariani, AMK', '::1', 1, '2022-12-12 00:40:31'),
(718, '2022-12-12 00:42:23', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : drg. Tri Rahayu', '::1', 1, '2022-12-12 00:42:23'),
(719, '2022-12-12 00:44:09', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : Diawati Dahian, S.Farm.', '::1', 1, '2022-12-12 00:44:09'),
(720, '2022-12-12 00:45:17', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : Risky Lestari, S.Keb.', '::1', 1, '2022-12-12 00:45:17'),
(721, '2022-12-12 00:46:46', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : Waode Risnawati, S.Kep., Ns.', '::1', 1, '2022-12-12 00:46:46'),
(722, '2022-12-12 00:48:21', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : Mirnawati, AMF', '::1', 1, '2022-12-12 00:48:21'),
(723, '2022-12-12 00:49:03', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : Lismaya Safitri, AMF', '::1', 1, '2022-12-12 00:49:03'),
(724, '2022-12-12 00:49:56', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : Rasdiana Rauf, AMK', '::1', 1, '2022-12-12 00:49:56'),
(725, '2022-12-12 00:50:48', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : Atiyah Usman, AMK', '::1', 1, '2022-12-12 00:50:48'),
(726, '2022-12-12 00:51:38', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : Sarina, AMK', '::1', 1, '2022-12-12 00:51:38'),
(727, '2022-12-12 00:52:52', 'Muh. Fadjrul Falakh menambah data pegawai dengan nama : Renny Kasy, AMK', '::1', 1, '2022-12-12 00:52:52'),
(728, '2022-12-12 01:16:16', 'Muh. Fadjrul Falakh mengubah data dokter dengan nama : dr. Ratnaningsih Kasy', '::1', 1, '2022-12-12 01:16:16'),
(729, '2022-12-12 01:18:03', 'Muh. Fadjrul Falakh menambah data dokter dengan nama : drg. Liandy Karnian WL', '::1', 1, '2022-12-12 01:18:03'),
(730, '2022-12-12 01:21:18', 'Muh. Fadjrul Falakh menambah data dokter dengan nama : dr.  Sapriani Iskandar', '::1', 1, '2022-12-12 01:21:18'),
(731, '2022-12-12 01:22:12', 'Muh. Fadjrul Falakh mengubah data dokter dengan nama : drg. Liandy Karnian WL', '::1', 1, '2022-12-12 01:22:12'),
(732, '2022-12-12 01:24:27', 'Muh. Fadjrul Falakh mengubah data dokter dengan nama : dr. Ratnaningsih Kasy', '::1', 1, '2022-12-12 01:24:27'),
(733, '2022-12-12 01:28:44', 'Muh. Fadjrul Falakh mengubah data dokter dengan nama : dr. Ratnaningsih Kasy', '::1', 1, '2022-12-12 01:28:44'),
(734, '2022-12-12 01:31:24', 'Muh. Fadjrul Falakh menambah data dokter dengan nama : dr. Fauziah Ibrahim', '::1', 1, '2022-12-12 01:31:24'),
(735, '2022-12-12 01:33:11', 'Muh. Fadjrul Falakh menambah data dokter dengan nama : drg. Tri Rahayu', '::1', 1, '2022-12-12 01:33:11'),
(736, '2022-12-12 01:54:15', 'Muh. Fadjrul Falakh menghapus data pasien dengan ID : 6', '::1', 1, '2022-12-12 01:54:15'),
(737, '2022-12-12 01:54:31', 'Muh. Fadjrul Falakh menghapus data pasien dengan ID : 5', '::1', 1, '2022-12-12 01:54:31'),
(738, '2022-12-12 01:54:44', 'Muh. Fadjrul Falakh menghapus data pasien dengan ID : 4', '::1', 1, '2022-12-12 01:54:44'),
(739, '2022-12-12 01:54:53', 'Muh. Fadjrul Falakh menghapus data pasien dengan ID : 3', '::1', 1, '2022-12-12 01:54:53'),
(740, '2022-12-12 01:55:28', 'Muh. Fadjrul Falakh menghapus data pasien dengan ID : 2', '::1', 1, '2022-12-12 01:55:28'),
(741, '2022-12-12 01:55:43', 'Muh. Fadjrul Falakh menghapus data pasien dengan ID : 1', '::1', 1, '2022-12-12 01:55:43'),
(742, '2022-12-12 01:56:49', 'Muh. Fadjrul Falakh menambah data pasien dengan ID - nama :  - andika', '::1', 1, '2022-12-12 01:56:49'),
(743, '2022-12-12 02:05:50', 'Muh. Fadjrul Falakh menambah data pasien dengan ID - nama :  - Hanif Ar-rayyan', '::1', 1, '2022-12-12 02:05:50'),
(744, '2022-12-12 02:12:29', 'Muh. Fadjrul Falakh menambah data pasien dengan ID - nama :  - Selpian Arung', '::1', 1, '2022-12-12 02:12:29'),
(745, '2022-12-12 14:59:48', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-12 14:59:48'),
(746, '2022-12-12 15:47:11', 'Muh. Fadjrul Falakh menambah data rekam medis riwayat kunjungan pasien ', '::1', 1, '2022-12-12 15:47:11'),
(747, '2022-12-12 22:36:12', 'Muh. Fadjrul Falakh menambah data rekam medis riwayat kunjungan pasien ', '::1', 1, '2022-12-12 22:36:12'),
(748, '2022-12-12 23:50:45', 'Muh. Fadjrul Falakh menambah data rekam medis riwayat kunjungan pasien ', '::1', 1, '2022-12-12 23:50:45'),
(749, '2022-12-13 06:31:59', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-13 06:31:59'),
(750, '2022-12-13 07:42:41', 'Muh. Fadjrul Falakh mengubah data rekam medis riwayat kunjungan pasien dengan ID = 7 - 11', '::1', 1, '2022-12-13 07:42:41'),
(751, '2022-12-13 10:27:50', 'Muh. Fadjrul Falakh menambah data rekam medis pemeriksaan odontogram 13', '::1', 1, '2022-12-13 10:27:50'),
(752, '2022-12-13 18:23:09', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-13 18:23:09'),
(753, '2022-12-13 18:41:37', 'administrator menghapus data rekam medis pemeriksaan odontogram dengan ID = 2 - ', '::1', 1, '2022-12-13 18:41:37'),
(754, '2022-12-13 18:48:06', 'Muh. Fadjrul Falakh menambah data rekam medis pemeriksaan odontogram dengan ID : ', '::1', 1, '2022-12-13 18:48:06'),
(755, '2022-12-13 21:43:12', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-13 21:43:12'),
(756, '2022-12-13 22:13:04', 'administrator mengubah data konten profil puskesmas menu : sambutan', '::1', 1, '2022-12-13 22:13:04'),
(757, '2022-12-13 22:16:36', 'administrator mengubah data konten profil puskesmas menu : sambutan', '::1', 1, '2022-12-13 22:16:36'),
(758, '2022-12-13 22:24:09', 'Muh. Fadjrul Falakh mengubah data konten profil puskesmas menu : sambutan', '::1', 1, '2022-12-13 22:24:09'),
(759, '2022-12-13 22:35:41', 'administrator mengubah data konten profil puskesmas dengan ID : sejarah', '::1', 1, '2022-12-13 22:35:41'),
(760, '2022-12-13 22:47:34', 'administrator mengubah data konten profil puskesmas dengan ID : visi', '::1', 1, '2022-12-13 22:47:34'),
(761, '2022-12-13 22:49:36', 'administrator mengubah data konten profil puskesmas dengan ID : tupoksi', '::1', 1, '2022-12-13 22:49:36'),
(762, '2022-12-13 22:56:08', 'administrator mengubah data konten profil puskesmas dengan ID : maklumat', '::1', 1, '2022-12-13 22:56:08'),
(763, '2022-12-13 22:56:19', 'administrator mengubah data konten profil puskesmas dengan ID : maklumat', '::1', 1, '2022-12-13 22:56:19'),
(764, '2022-12-14 00:15:26', 'Muh. Fadjrul Falakh mengubah data slider dengan ID : 6', '::1', 1, '2022-12-14 00:15:26'),
(765, '2022-12-14 00:21:49', 'Muh. Fadjrul Falakh mengubah data slider dengan ID : 6', '::1', 1, '2022-12-14 00:21:49'),
(766, '2022-12-14 00:24:28', 'Muh. Fadjrul Falakh mengubah data slider dengan ID : 6', '::1', 1, '2022-12-14 00:24:28'),
(767, '2022-12-14 00:32:10', 'Muh. Fadjrul Falakh mengubah data slider dengan ID : 6', '::1', 1, '2022-12-14 00:32:10'),
(768, '2022-12-14 00:45:29', 'Muh. Fadjrul Falakh mengubah data slider dengan ID : 9', '::1', 1, '2022-12-14 00:45:29'),
(769, '2022-12-14 00:46:53', 'administrator menghapus data slider dengan ID = 11', '::1', 1, '2022-12-14 00:46:53'),
(770, '2022-12-14 00:48:59', 'administrator mengubah data konten profil puskesmas menu : sambutan', '::1', 1, '2022-12-14 00:48:59'),
(771, '2022-12-14 00:50:49', 'administrator mengubah data konten profil puskesmas menu : sambutan', '::1', 1, '2022-12-14 00:50:49'),
(772, '2022-12-14 00:51:31', 'administrator mengubah data konten profil puskesmas menu : sambutan', '::1', 1, '2022-12-14 00:51:31'),
(773, '2022-12-14 00:53:21', 'administrator mengubah data konten profil puskesmas menu : sambutan', '::1', 1, '2022-12-14 00:53:21'),
(774, '2022-12-14 13:59:33', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-14 13:59:33'),
(775, '2022-12-14 14:01:59', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-14 14:01:59'),
(776, '2022-12-14 14:37:08', 'Muh. Fadjrul Falakh menghapus data galeri dengan ID : 8', '::1', 1, '2022-12-14 14:37:08'),
(777, '2022-12-14 14:43:43', 'Muh. Fadjrul Falakh menambah data galeri dengan nama : Kegiatan Pengukuran Kebugaran ASN Kecamatan Kadia', '::1', 1, '2022-12-14 14:43:43'),
(778, '2022-12-14 15:00:54', 'Muh. Fadjrul Falakh menambah data galeri dengan ID - nama :  - Launching Posyandu Remaja Solagratia Mahanaim', '::1', 1, '2022-12-14 15:00:54'),
(779, '2022-12-14 15:18:23', 'Muh. Fadjrul Falakh mengubah data galeri dengan ID - nama :  - Pameran XY', '::1', 1, '2022-12-14 15:18:23'),
(780, '2022-12-14 15:29:08', 'Muh. Fadjrul Falakh mengubah data galeri dengan ID - nama :  - Pameran XY', '::1', 1, '2022-12-14 15:29:08'),
(781, '2022-12-14 15:58:51', 'Muh. Fadjrul Falakh mengubah data galeri dengan ID - nama :  - Kegiatan Pengukuran Kebugaran ASN Kecamatan Kadia', '::1', 1, '2022-12-14 15:58:51'),
(782, '2022-12-14 16:15:12', 'Muh. Fadjrul Falakh mengubah data galeri dengan ID - nama :  - Kegiatan Pengukuran Kebugaran ASN Kecamatan Kadia', '::1', 1, '2022-12-14 16:15:12'),
(783, '2022-12-14 16:15:46', 'Muh. Fadjrul Falakh mengubah data galeri dengan ID - nama :  - Pameran Xy', '::1', 1, '2022-12-14 16:15:46'),
(784, '2022-12-14 16:21:25', 'Muh. Fadjrul Falakh mengubah data galeri dengan ID - nama :  - Kegiatan YT 2021', '::1', 1, '2022-12-14 16:21:25'),
(785, '2022-12-14 16:23:23', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-14 16:23:23'),
(786, '2022-12-14 16:23:48', 'Muh. Fadjrul Falakh mengubah data galeri dengan ID - nama :  - Kegiatan XXY 2021', '::1', 1, '2022-12-14 16:23:48'),
(787, '2022-12-14 16:28:02', 'Muh. Fadjrul Falakh mengubah data galeri dengan ID - nama :  - Kegiatans Y 2021', '::1', 1, '2022-12-14 16:28:02'),
(788, '2022-12-14 16:30:29', 'Muh. Fadjrul Falakh mengubah data galeri dengan ID - nama : 2 - Kegiatan UY 2021', '::1', 1, '2022-12-14 16:30:29'),
(789, '2022-12-14 16:34:09', 'Muh. Fadjrul Falakh mengubah data galeri dengan ID - nama : 9 - Kegiatan Pengukuran Kebugaran ASN Kecamatan Kadia', '::1', 1, '2022-12-14 16:34:09'),
(790, '2022-12-14 16:34:29', 'Muh. Fadjrul Falakh mengubah data galeri dengan ID - nama : 4 - Pameran XX', '::1', 1, '2022-12-14 16:34:29'),
(791, '2022-12-14 16:38:03', 'Muh. Fadjrul Falakh menambah data galeri dengan nama : Minlok Lintas Sektor Kecamatan Kadia', '::1', 1, '2022-12-14 16:38:03'),
(792, '2022-12-14 16:38:29', 'Muh. Fadjrul Falakh menghapus data galeri dengan ID : 4', '::1', 1, '2022-12-14 16:38:29'),
(793, '2022-12-14 16:43:15', 'Muh. Fadjrul Falakh menghapus data galeri dengan ID : 1', '::1', 1, '2022-12-14 16:43:15'),
(794, '2022-12-14 16:45:13', 'Muh. Fadjrul Falakh menambah data galeri dengan nama : Launching Posyandu Remaja Solagratia Mahanaim', '::1', 1, '2022-12-14 16:45:13'),
(795, '2022-12-14 17:02:16', 'Muh. Fadjrul Falakh menghapus data galeri dengan ID : 2', '::1', 1, '2022-12-14 17:02:16'),
(796, '2022-12-14 17:03:35', 'Muh. Fadjrul Falakh menambah data galeri dengan nama : Kegiatan Vaksin di Plasa PT. Telkom WITEL Sultra, Indonesia', '::1', 1, '2022-12-14 17:03:35'),
(797, '2022-12-14 17:07:33', 'Muh. Fadjrul Falakh menambah data galeri dengan nama : Kegiatan Kaji Banding dengan Puskesmas Lepo-Lepo', '::1', 1, '2022-12-14 17:07:33'),
(798, '2022-12-14 17:10:18', 'Muh. Fadjrul Falakh menambah data galeri dengan nama : kegiatan rutin kampung GERMAS RT.003/RW.003 Kelurahan Pondambea', '::1', 1, '2022-12-14 17:10:18'),
(799, '2022-12-14 17:14:00', 'Muh. Fadjrul Falakh menambah data galeri dengan nama : Kegiatan Sharing dengan Topik \"Nutrisi pada Ibu Hamil\"', '::1', 1, '2022-12-14 17:14:00'),
(800, '2022-12-14 17:15:44', 'Muh. Fadjrul Falakh menambah data galeri dengan nama : Kegiatan Verifikasi STBM Puskesmas Mekar', '::1', 1, '2022-12-14 17:15:44'),
(801, '2022-12-14 17:18:47', 'administrator mengubah data informasi dengan ID : 4', '::1', 1, '2022-12-14 17:18:47'),
(802, '2022-12-14 17:37:51', 'Muh. Fadjrul Falakh menambah data informasi : Kasus Gagal Ginjal Akut Pada Anak Meningkat, Orang Tua Diminta Waspada', '::1', 1, '2022-12-14 17:37:51'),
(803, '2022-12-14 17:37:59', 'administrator menghapus data informasi dengan ID : 4', '::1', 1, '2022-12-14 17:37:59'),
(804, '2022-12-14 17:38:06', 'administrator menghapus data informasi dengan ID : 3', '::1', 1, '2022-12-14 17:38:06'),
(805, '2022-12-14 17:38:14', 'administrator menghapus data informasi dengan ID : 2', '::1', 1, '2022-12-14 17:38:14'),
(806, '2022-12-14 17:38:17', 'administrator menghapus data informasi dengan ID : 1', '::1', 1, '2022-12-14 17:38:17'),
(807, '2022-12-14 17:43:53', 'Muh. Fadjrul Falakh menambah data informasi : Sepanjang 2022, 6 Anak di Sukabumi Meninggal Akibat HIV/AIDS', '::1', 1, '2022-12-14 17:43:53'),
(808, '2022-12-14 17:49:02', 'Muh. Fadjrul Falakh menambah data informasi : Viral Ibu Muda Meninggal Usai Melahirkan Anak ke-10, Ini Pemicunya  Baca artikel detikHealth, \"Viral Ibu Muda Meninggal Usai Melahirkan Anak ke-10, Ini Pe', '::1', 1, '2022-12-14 17:49:02'),
(809, '2022-12-14 17:51:53', 'Muh. Fadjrul Falakh menambah data informasi : Bos Bio Farma Buka-bukaan Stok Vaksin COVID-19 Jelang Akhir Tahun, Aman ?', '::1', 1, '2022-12-14 17:51:53'),
(810, '2022-12-14 17:57:26', 'Muh. Fadjrul Falakh menambah data informasi : Heboh Bjorka Bocorkan Data PeduliLindungi, Kemenkes Buka Suara', '::1', 1, '2022-12-14 17:57:26'),
(811, '2022-12-14 17:57:47', 'administrator mengubah data informasi dengan ID : 7', '::1', 1, '2022-12-14 17:57:47'),
(812, '2022-12-14 18:00:22', 'Muh. Fadjrul Falakh menambah data informasi : Kebocoran Data PeduliLindungi oleh Hacker Bjorka Dinilai Valid', '::1', 1, '2022-12-14 18:00:22'),
(813, '2022-12-14 18:46:36', 'Muh. Fadjrul Falakh menambah data informasi : Kebocoran Data MyPertamina oleh Bjorka, Pakar: Sudah Saatnya Dibentuk Lembaga PDP', '::1', 1, '2022-12-14 18:46:36'),
(814, '2022-12-14 18:49:48', 'Muh. Fadjrul Falakh menambah data informasi : 8 Obat Asam Lambung Alami yang Efektif dan Gampang Dicari', '::1', 1, '2022-12-14 18:49:48'),
(815, '2022-12-14 18:52:57', 'Muh. Fadjrul Falakh mengubah data informasi dengan ID - nama : 11 - Kebocoran Data MyPertamina oleh Bjorka, Pakar: Sudah Saatnya Dibentuk Lembaga PDP', '::1', 1, '2022-12-14 18:52:57'),
(816, '2022-12-14 18:57:58', 'Muh. Fadjrul Falakh mengubah data faq dengan pertanyaan : DImana Lokasi Puskesmas Mekar', '::1', 1, '2022-12-14 18:57:58'),
(817, '2022-12-14 18:59:38', 'Muh. Fadjrul Falakh mengubah data faq dengan pertanyaan : Apa itu e-medicord', '::1', 1, '2022-12-14 18:59:38'),
(818, '2022-12-14 19:00:56', 'Muh. Fadjrul Falakh menambah data faq dengan pertanyaan : Apakah e-medicord aman', '::1', 1, '2022-12-14 19:00:56'),
(819, '2022-12-14 19:05:26', 'Muh. Fadjrul Falakh mengubah data faq dengan pertanyaan : jelaskan tentang Website puskesmas mekar', '::1', 1, '2022-12-14 19:05:26'),
(820, '2022-12-14 19:18:44', 'Muh. Fadjrul Falakh menambah data rekam medis pengkajian awal : 9', '::1', 1, '2022-12-14 19:18:44'),
(821, '2022-12-14 22:52:35', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-14 22:52:35'),
(822, '2022-12-14 22:55:52', 'Muh. Fadjrul Falakh menambah data rekam medis pengkajian awal : 11', '::1', 1, '2022-12-14 22:55:52'),
(823, '2022-12-15 00:13:57', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-15 00:13:57'),
(824, '2022-12-15 06:15:26', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-15 06:15:26'),
(825, '2022-12-15 13:38:34', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-15 13:38:34'),
(826, '2022-12-15 14:19:59', 'Muh. Fadjrul Falakh menambah data rekam medis pengkajian awal : 9', '::1', 1, '2022-12-15 14:19:59'),
(827, '2022-12-15 14:27:48', 'Muh. Fadjrul Falakh menambah data rekam medis pengkajian awal : 9', '::1', 1, '2022-12-15 14:27:48'),
(828, '2022-12-15 22:54:56', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-15 22:54:56'),
(829, '2022-12-16 09:21:49', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-16 09:21:49'),
(830, '2022-12-16 20:45:00', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-16 20:45:00'),
(831, '2022-12-17 21:45:33', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-17 21:45:33'),
(832, '2022-12-18 16:54:16', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-18 16:54:16'),
(833, '2022-12-18 18:27:23', 'Muh. Fadjrul Falakh mengubah data rekam medis pemeriksaan odontogram dengan ID : ', '::1', 1, '2022-12-18 18:27:23'),
(834, '2022-12-18 18:29:42', 'Muh. Fadjrul Falakh mengubah data rekam medis pemeriksaan odontogram dengan ID : ', '::1', 1, '2022-12-18 18:29:42'),
(835, '2022-12-18 18:34:41', 'Muh. Fadjrul Falakh mengubah data rekam medis pemeriksaan odontogram dengan ID : ', '::1', 1, '2022-12-18 18:34:41'),
(836, '2022-12-18 18:44:44', 'Muh. Fadjrul Falakh mengubah data rekam medis pemeriksaan odontogram dengan ID : ', '::1', 1, '2022-12-18 18:44:44'),
(837, '2022-12-18 18:49:56', 'Muh. Fadjrul Falakh mengubah data rekam medis pemeriksaan odontogram dengan ID : ', '::1', 1, '2022-12-18 18:49:56'),
(838, '2022-12-18 18:59:31', 'Muh. Fadjrul Falakh mengubah data rekam medis pemeriksaan odontogram dengan ID : ', '::1', 1, '2022-12-18 18:59:31'),
(839, '2022-12-18 19:02:42', 'Muh. Fadjrul Falakh menambah data rekam medis pemeriksaan odontogram dengan ID pasien: 11', '::1', 1, '2022-12-18 19:02:42'),
(840, '2022-12-18 19:04:43', 'Muh. Fadjrul Falakh mengubah data rekam medis pemeriksaan odontogram dengan ID : ', '::1', 1, '2022-12-18 19:04:43'),
(841, '2022-12-18 20:37:12', 'Muh. Fadjrul Falakh mengubah data rekam medis pemeriksaan odontogram dengan ID RM : ', '::1', 1, '2022-12-18 20:37:12'),
(842, '2022-12-18 20:45:44', 'Muh. Fadjrul Falakh mengubah data rekam medis pemeriksaan odontogram dengan ID RM : 4', '::1', 1, '2022-12-18 20:45:44'),
(843, '2022-12-20 00:27:13', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-20 00:27:13'),
(844, '2022-12-20 13:16:04', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-20 13:16:04'),
(845, '2022-12-21 01:02:13', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-21 01:02:13'),
(846, '2022-12-21 01:15:00', 'Muh. Fadjrul Falakh menambah data pasien dengan ID - nama :  - Dira Fadhilah', '::1', 1, '2022-12-21 01:15:00'),
(847, '2022-12-21 01:17:24', 'Muh. Fadjrul Falakh menambah data pasien dengan ID - nama :  - Muh. Alhamsyah', '::1', 1, '2022-12-21 01:17:24'),
(848, '2022-12-21 01:19:56', 'Muh. Fadjrul Falakh menambah data pasien dengan ID - nama :  - Eka Pratiwi', '::1', 1, '2022-12-21 01:19:56'),
(849, '2022-12-21 01:22:45', 'Muh. Fadjrul Falakh menambah data pasien dengan ID - nama :  - Rosantika Kamelia', '::1', 1, '2022-12-21 01:22:45'),
(850, '2022-12-21 01:24:50', 'Muh. Fadjrul Falakh menambah data pasien dengan ID - nama :  - Muh. Kemal Hayat', '::1', 1, '2022-12-21 01:24:50'),
(851, '2022-12-21 01:32:53', 'Muh. Fadjrul Falakh mengubah data rekam medis pengkajian awal : ', '::1', 1, '2022-12-21 01:32:53'),
(852, '2022-12-21 01:36:09', 'Muh. Fadjrul Falakh mengubah data rekam medis pengkajian awal : ', '::1', 1, '2022-12-21 01:36:09'),
(853, '2022-12-21 01:36:18', 'Muh. Fadjrul Falakh menghapus data rekam medis pengkajian awal dengan ID RM : 3', '::1', 1, '2022-12-21 01:36:18'),
(854, '2022-12-21 01:36:28', 'Muh. Fadjrul Falakh menghapus data rekam medis pengkajian awal dengan ID RM : 5', '::1', 1, '2022-12-21 01:36:28'),
(855, '2022-12-21 01:44:06', 'Muh. Fadjrul Falakh menambah data rekam medis pengkajian awal ID Pasien : 12', '::1', 1, '2022-12-21 01:44:06'),
(856, '2022-12-21 01:44:45', 'Muh. Fadjrul Falakh mengubah data rekam medis pengkajian awal : ', '::1', 1, '2022-12-21 01:44:45'),
(857, '2022-12-21 01:46:28', 'Muh. Fadjrul Falakh mengubah data rekam medis pengkajian awal : ', '::1', 1, '2022-12-21 01:46:28'),
(858, '2022-12-21 01:48:37', 'Muh. Fadjrul Falakh mengubah data rekam medis pengkajian awal : 12', '::1', 1, '2022-12-21 01:48:37'),
(859, '2022-12-21 01:53:47', 'Muh. Fadjrul Falakh mengubah data rekam medis pengkajian awal ID Pasien : 12', '::1', 1, '2022-12-21 01:53:47'),
(860, '2022-12-21 01:55:13', 'Muh. Fadjrul Falakh mengubah data user dengan nama : Robin', '::1', 1, '2022-12-21 01:55:13'),
(861, '2022-12-21 01:55:55', 'Robin melakukan login ke sistem', '::1', 6, '2022-12-21 01:55:55'),
(862, '2022-12-21 01:59:44', 'Gian Ainur melakukan login ke sistem', '::1', 7, '2022-12-21 01:59:44'),
(863, '2022-12-21 02:00:14', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-21 02:00:14'),
(864, '2022-12-21 02:06:16', 'Robin melakukan login ke sistem', '::1', 6, '2022-12-21 02:06:16'),
(865, '2022-12-21 02:08:56', 'Gian Ainur melakukan login ke sistem', '::1', 7, '2022-12-21 02:08:56'),
(866, '2022-12-21 14:06:01', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-21 14:06:01'),
(867, '2022-12-21 14:08:38', 'Muh. Fadjrul Falakh menambah data pasien dengan ID - nama :  - Fadjrul', '::1', 1, '2022-12-21 14:08:38'),
(868, '2022-12-21 14:12:19', 'Muh. Fadjrul Falakh menambah data rekam medis pengkajian awal ID Pasien : 20', '::1', 1, '2022-12-21 14:12:19'),
(869, '2022-12-22 00:45:34', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-12-22 00:45:34'),
(870, '2022-12-22 01:30:44', 'Muh. Fadjrul Falakh menambah data pasien dengan ID - nama :  - jsnjsncsl', '::1', 1, '2022-12-22 01:30:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pasien`
--

CREATE TABLE `tbl_pasien` (
  `pasien_id` int(11) NOT NULL,
  `no_rekam_medis` varchar(20) NOT NULL,
  `nama_pasien` varchar(200) NOT NULL,
  `nik_pasien` varchar(200) NOT NULL,
  `nama_kepala_keluarga` varchar(200) NOT NULL,
  `no_kk` varchar(200) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tgl_lahir_pasien` date NOT NULL,
  `alamat_pasien` varchar(250) NOT NULL,
  `no_telp_pasien` varchar(200) DEFAULT NULL,
  `no_bpjs_pasien` varchar(200) DEFAULT NULL,
  `dw` varchar(128) DEFAULT NULL,
  `lw` varchar(128) DEFAULT NULL,
  `status_pasien_id` int(11) NOT NULL,
  `kepesertaan_pasien_id` int(11) NOT NULL,
  `jns_key_id` int(11) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pasien`
--

INSERT INTO `tbl_pasien` (`pasien_id`, `no_rekam_medis`, `nama_pasien`, `nik_pasien`, `nama_kepala_keluarga`, `no_kk`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir_pasien`, `alamat_pasien`, `no_telp_pasien`, `no_bpjs_pasien`, `dw`, `lw`, `status_pasien_id`, `kepesertaan_pasien_id`, `jns_key_id`, `tgl_daftar`, `createtime`) VALUES
(9, '00001', 'Indah amalia', 'db2fad56240a5b11d7226a63e65594745148c11fe0c08a4757f6c2b42f102e4001133c397689034d800043b90530a0bf2e2772538321380631a7c58275759c23PjtUYn71+Ftaf89qO3EqgEZ9weOsFJAk99KuVjKmjX0=', 'Handoko purnomo', '721d1ea87a94f6406aaa0f8b33e47cf8e72a01ca28023d041e67650e7666086ce8e593d5c7c53f76d10b0c4d570cd5fbf568286a4cba0fc2faea92b9f1ed02f2Nh4ZJQJ/1gTN0lmZwo08uEZ9weOsFJAk99KuVjKmjX0=', 'Perempuan', 'Kendari', '2000-12-21', '6026ca55b1e9ac182f9f3913a7d8dccba3ac8d867ae85b355c7f1cf6328e3fc77dc4602e2b47767249fba46c2ef5130570f9fc28c568ac0d408fb04ac43c33e9fuYqthPMOgPiOY6hud0kDNsOHX1aLjeowkCzRW03FbQ=', '1d42d12cff258eab822cc244e14359f7a7d926660f1e36e5d4a822610819a8e9e0622888ee9980e4a31a4c38ce7ed07a35c22796c4f67d205f717b78f5c0bb5ejE9ZmpP2qh/kf9U0wXjXAg==', '192654325', '1', '2', 1, 1, 1, '2022-12-08', '2022-12-08 21:49:10'),
(11, '00002', 'Anton Jorba', '87a48915a60e6ddb9a615ab4a0543dfc23f67c9ea364bd2f25171d141201b6c2c591ff9636399520555168de6b24faf214ca787f1d8a8f8e65e168f2af24df280ckexcgGQoLIZ+6Bu4tVxEZ9weOsFJAk99KuVjKmjX0=', 'Wulele sanggula', '51b9ca42ff85e0ad042969715780fef896246e64be35041d4b51f6fd31a3c8790695f8c25524440279f31ab0aa82992c7c0b2675ff10653d83bd0cfa1042ed99UJGAZQyRT3pSW1Z62GZbWQ==', 'Laki-laki', 'Kendari', '1995-06-28', 'bb949a2cf3975336ffcae3f64cdf7527b20fc6a41bf027c9aad03ce7df98340eeaef7f0f8ae00b6928d0db2609dc95556303fc30810b9390caa11c198fcf9c9fi7t9cFKzikzDFIQ6Hm/+PDrSKWYj5hNvkoZK8fO48+8=', '880e4b2d2d0022d652edf6be48ab525d23e2f97313964c428f51fb9baf2956afd285e8bd2c374c7d6cdb19ecf21c0f9c24e458adc2fc53a7c654492d04cbe392dhRWTEKbPaY7tZ4HgO67dg==', '-', '-', '-', 2, 2, 1, '2022-12-08', '2022-12-08 22:16:41'),
(12, '00003', 'Andika Okan', 'db2fad56240a5b11d7226a63e65594745148c11fe0c08a4757f6c2b42f102e4001133c397689034d800043b90530a0bf2e2772538321380631a7c58275759c23PjtUYn71+Ftaf89qO3EqgEZ9weOsFJAk99KuVjKmjX0=', 'Budi Nugroho', '51b9ca42ff85e0ad042969715780fef896246e64be35041d4b51f6fd31a3c8790695f8c25524440279f31ab0aa82992c7c0b2675ff10653d83bd0cfa1042ed99UJGAZQyRT3pSW1Z62GZbWQ==', 'Laki-laki', 'kendari', '2001-09-16', 'fbaa108c7c00b496bb73e36b625ea4a35d878d2356fb98d21e423b04e92ff474ac1f34b07685ce7e8759cb7b845ecfcfae6302f20d0c360434aa1d66085168b50b6RmxHkh7lKFt6lQnSHJQPnwR3qtceDJx1AHN7AVDk=', '88aec741658a272f48dd941a747f3d616176d1485459db66af53b7bd3fab622877a67288533df2307a3b46d29f7ec43292e51022e82178a92c169e68852c6149aLNLBlfVeIfmpOZxQFws7w==', '', '-', '-', 1, 2, 1, '2022-12-12', '2022-12-12 01:56:49'),
(13, '00004', 'Hanif Ar-rayyan', 'db2fad56240a5b11d7226a63e65594745148c11fe0c08a4757f6c2b42f102e4001133c397689034d800043b90530a0bf2e2772538321380631a7c58275759c23PjtUYn71+Ftaf89qO3EqgEZ9weOsFJAk99KuVjKmjX0=', 'Agung Sugiharto', '721d1ea87a94f6406aaa0f8b33e47cf8e72a01ca28023d041e67650e7666086ce8e593d5c7c53f76d10b0c4d570cd5fbf568286a4cba0fc2faea92b9f1ed02f2Nh4ZJQJ/1gTN0lmZwo08uEZ9weOsFJAk99KuVjKmjX0=', 'Laki-laki', 'Konawe', '1980-06-15', '65bebb0f314a4a6814d4859d1ed9968c8040ff8fd021b9b62b1bc29baabdf55ec172622abd2abdec27a5cbcf4239f4b76580d9dbbf9213736747ea357438ff90zvX9OLTB5UDCo6k+FtF3Wu+zybGnSzI/9KjeGc4Rbl0=', '57ebd83fb03c6a234f8b1fab4059b9aaf8cabbb6d0c88dd1ba34cc8ea937edecbd834dc15396c3a2343c175e2977a21ac0a403378483bca13d76f7d70290a6fdCPxph3KSEEP8d2L1uVsefw==', '123456789', '11', '9', 1, 1, 1, '2022-12-12', '2022-12-12 02:05:50'),
(14, '00005', 'Selpian Arina', 'c69365c7fe9b7516488997c1ff1afad5ef30f6477ebbea9584028fff121e4b96bac8fe9ed002c5808fb08e722dac13490d6050f1729fb747c70926180f3afcc0fqcfl34Q42U6OOIfiX7lPEZ9weOsFJAk99KuVjKmjX0=', 'Herman', '3b55534b10c40e491a1224feac7940963ed8fc7e104e45b71b4ba4e5f0d042df285254eff17632e6f3f494342581beb01e7475f99abf11856f3807b859bf40566eHFMukFvpK0xd+mykL0og==', 'Perempuan', 'kendari', '1993-05-16', '9c635bd23affe6b093979d9be2524015d1ba69df4f98371487bbf97e405969eb2903d440bfd0c84b9458a940c961f67c326d881198dc29f322ee2c6b85668639fuYqthPMOgPiOY6hud0kDB2DX//54xbXPApw8XGIM4H+m1hoQzCYp9TfYo699vXz', '952705b6d83f4b9be99c86dfee8580dd71c64cd1ed25c9520a3acbfca4fc8aa881177a025e431f81ccac65199cd1dafaa4e55bf38234eedf3717674555226ef8UEv/mQsk2Zt/KZ97AUqOLA==', '-', '-', '-', 2, 2, 1, '2022-12-12', '2022-12-12 02:12:29'),
(15, '00006', 'Dira Fadhilah', '9f26590e8046751b2e890de4a4b0b374190f9785da2dfd7a7c8b3043d50acc7bd302e91b5e20e061a36861ff290c2cec51b8d04db536982c1658f096b9114edebAkaY3S2uvp+fCVnK1VG90Z9weOsFJAk99KuVjKmjX0=', 'Hanung Bramantio', '3165d3de5cba1b7d544004745dd0956e36fd34b3fe28aaf62bd257db2fcde185625f5c7b607d30baf7512870be95b79acf0a559f800051fd757db12b70b3bee5FDypEyeIuGvg2MYNbws6AUZ9weOsFJAk99KuVjKmjX0=', 'Perempuan', 'Makassar', '2000-10-07', '41b8ec5c55231d34b0011cfa1cf47452ee208cefa22404669898a3df825042c53f20960dc4c425730751fce78e5eb589f4b4c73ede5cdf43dc3d9aba3dfc28d4fuYqthPMOgPiOY6hud0kDBDGLFDYlgdWr1pwXm9pKnM=', 'fa7fcaa180133cbcd8c19fec04e800c422bf31a3a73c2b8a70bf76605df1b1636a39ff443d907b10cc83ffc3f1368518ee82a8255e7cf7c3f6b5c156a0be79caP+DpIe3BOYEYX3iVCAWpuw==', '1234566563', '11', '12', 1, 2, 1, '2022-12-21', '2022-12-21 01:15:00'),
(16, '00007', 'Muh. Alhamsyah', 'f1c1601567dcf011220834c9697d1835d46f3969d2a4b26e9c3a895b4f3c0c60b116fd7c0d05f38afd76668ebea3d9aaeaa1d5bb1d18d613a002711a3d537e41s0hym1JP7xkrHa+LX4i2w0Z9weOsFJAk99KuVjKmjX0=', 'Alfian Nugrah', '210c9b6e36ad26cf7c0243073ebe48ed08205391978a9a924bc22d914ea8d5adc334a340bf3b2756c973a90ed9bbeba8ad68e6a202eb8cd258c714b07ed4878b5fhK1WzOG6MmziS7DC0BTkZ9weOsFJAk99KuVjKmjX0=', 'Laki-laki', 'Jakarta', '1999-08-04', '93a84227afc9f029cba1a20c719ea247c6021a20f0af4d5769a9c55a9fa9cb612ff77ddce0bfc902b532560cce733f128e5280e2e989be574ff62175ed402885fuYqthPMOgPiOY6hud0kDAvMdMwBGjg7jf/M00tUaTA=', '9b7ff9f67c67f7ba464e017001c64b08f10a918d04056e38b43467eb93b2183429212e818f7e6f3a7dc68c46f3d2bd3b3cf77aec1156058fd370cb2ada18cf56DR77nxQxkoPORWibKWwccw==', '-', '-', '-', 2, 2, 1, '2022-12-21', '2022-12-21 01:17:24'),
(17, '00008', 'Eka Pratiwi', '26f5282c797ec6703e9ced555d28bf748cd91c4735818a0d0c0eb35fdc7957b6fb01568c97571a369238b2fa210eb5020f412064ad96d7573ef82a4ea17a30721GfoSL+cOjVSG7nyTu3DP0Z9weOsFJAk99KuVjKmjX0=', 'Arman', 'd2154d596df9eefc8057268aed6d4366afb635bddbd6829f1fce6be428c6d2456effb8cb30ffac6c3b2b91d627123503a9eba794727470ce79b4973b7c6b9f86kq+OateV/oGJzToFSbkH2EZ9weOsFJAk99KuVjKmjX0=', 'Perempuan', 'Kendari', '1996-12-08', '1e069196e2887b213d23faafddb8c6bc53e4ead654278546060cc64e9036bd530c851c34d456c029790982c62237b28a42039d7deedab13134a9329ca30b7ddff7UF7sag+02qXig0nytktKtWzPtnyG8O7Zg12Ajf5cQ=', 'e61440371fa4a68bdcac46a6789d27eb3d707f9da19bdad330146814b2a04ab7d794e6bd9212419dfa87345dde716f91b194075c4ad32a88985f91d20ea6093f9ca+1HcMDQaK+vRZtfIjlA==', '1234566512', '10', '19', 3, 2, 1, '2022-12-21', '2022-12-21 01:19:56'),
(18, '00009', 'Rosantika Kamelia', 'd473e71776a54ca580526ce2d19de57207e362defc0c773adb8ab900a250657ec0853fe7447ddc635a29b20fefe2d2eee67257207f2bb2fdc167210333930e0eppardu8KCUB+OsGq9+xIj0Z9weOsFJAk99KuVjKmjX0=', 'Buyung Latuanda', '71c16e41f4cdcc7da2ffdfe43df40b0a1f1cc1bf775a2f5cac5ef413cc6a242b212ef7d7008d577fa8b2f5424be67e1c34eeab65e1e7faa39c494344be8d4c1azuQSeTQmHTLn59uCm6w9H0Z9weOsFJAk99KuVjKmjX0=', 'Perempuan', 'Kendari', '1988-12-13', '82d79496ef922aa1c5310c7715c1cccbd637b2b00c8afbda3186b9482b81e557dbffa86e61a949f0fe66e0c1d55b02de4cbf0835c1b1041a2bf3e5fc8967a36efuYqthPMOgPiOY6hud0kDGJiM9vugO6gtS1v82FH6a4=', '85003ba3c21e32ba30368ab9276cf6b4e0e208e24a188dcf8f72e32892e73092a675e324d3674ad09857bec2b0a7d6131887c9c29a3fd5a7ff27c7c3f349d63c1ZZJ8fnwiyKDIlpfgoFgPA==', '1234586510', '11', '12', 1, 2, 1, '2022-12-21', '2022-12-21 01:22:45'),
(19, '00010', 'Muh. Kemal Hayat', 'a925da8fade5d17b12731e37eb094cadda250b3d4755add850fd57afb7e48a5ea253929ebf94e28526e0363fb074d5a77e95224bc693e06692833b551c6b59c9O8R5FepLl7KnLKB2ZMvyZkZ9weOsFJAk99KuVjKmjX0=', 'Sulu', 'b0f239a8201eabb15d95c7188658668803f06c58776d4eb0721a74318f4d42ac76d1cb940f4df71508d5780412f3cb2627f340cfb88faff8c1180a28274ee6dfUsReUCu8ZIwb97ngH1RFRkZ9weOsFJAk99KuVjKmjX0=', 'Laki-laki', 'Konawe', '2001-04-14', 'f899142891ec3db299f57cff93abaa5f2ec346201d0529f95f684bfedc7ad221abff4b6ae8fee8324740eaf6f38686ebeaac4b2d2bb9f64b81f87fb339abb94eqjcL+P5bbmA0XyeBc5npig==', '0d07037178ddf4e324451d9e2e8b9dd5fdee177d973064da7e4229536b529dc768f0fb46195c21015b25f4077201bacf2a62941cc6ca26186f2371fad67e75fb8yC2VIiasB8jBGbvuH5iEQ==', '-', '-', '-', 1, 3, 1, '2022-12-21', '2022-12-21 01:24:50'),
(20, '00011', 'Fadjrul', '1ead9db0a6071267f50e4a15c7a9d0cfa0a5dbb9ce6162162ce58982389ee2bf687a95cdccb64f6c4a568f287510c30d8eb200f1842ef3ba8b96e6d66bfeef82iMtDYsU5BvD5JjVYFVLO+0Z9weOsFJAk99KuVjKmjX0=', 'Makmur', '19154be7a4d33bd99589b6a46dc9f5cf1ad190aa388c9ca5449f44fe16b8f64f9790c54a2c8f91e366dd5515c2cf585774994685dd919359f90012dd2184307e7oNcAbuW4ORVFO1jzOrWt0Z9weOsFJAk99KuVjKmjX0=', 'Laki-laki', 'Kolaka', '2000-12-07', '2784793542c5410f2baa185d500bba3554b83c2d64c1315a54c0a539657411371d09ef40460032a42ea5a56f368a677b800e163134d945fb5159340cf691b32fuUkaINn/g4CuSarrt4QGgw==', '88aec741658a272f48dd941a747f3d616176d1485459db66af53b7bd3fab622877a67288533df2307a3b46d29f7ec43292e51022e82178a92c169e68852c6149aLNLBlfVeIfmpOZxQFws7w==', '123', '11', '11', 1, 2, 1, '2022-12-21', '2022-12-21 14:08:38'),
(21, '00012', 'jsnjsncsl', '4b919fc4a5a4e4640ace4d87057e3cc4ba765b461a47dce71693428a116a303e425545d46091ee2ae0ea4d98111379858c293a600ffc587078cecfa8dc494c101a0afdAZW0l1RbOCeLNdew==', 'ksnclksnc', '7d7ab68e126e059328a10b10f4347d4dfb53e92bdd7920a370e551a10f49ee40cd6c0d43ae90d2b14ee46252afe125177f16c8b873041eaf10ce2e0d46ac924aYXiVyf3bWuANvwc9ijcglg==', 'Laki-laki', 'uacba', '2022-12-17', '167a4bca05eeb28f34ab9ae1d05ad89f04f2e912f7e6bb2001095d462235ba69df8f47482c91500f0a2a671f808ba9febf575f9d8365b18c9dc6660ce6cad995+0WPbHXe3gafkfHKtcB6eg==', '689fc5f57bfc1573af2fda5afdf87f833cf5f6de7cfcbd29045e881e1220095e32eee5b843e29f41f97748129b9a599d7cbddc47c12f3fa7adb64a90386ba5a2oRmuG2hxR44LAscfz+j7mQ==', 'sdsdsdsd', '23', '32', 2, 2, 2, '2022-12-22', '2022-12-22 01:30:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pegawai`
--

CREATE TABLE `tbl_pegawai` (
  `pegawai_id` int(11) NOT NULL,
  `nama_pegawai` varchar(200) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `keterangan` text DEFAULT NULL,
  `status_pegawai` varchar(50) DEFAULT NULL,
  `bidang_pegawai` varchar(50) DEFAULT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pegawai`
--

INSERT INTO `tbl_pegawai` (`pegawai_id`, `nama_pegawai`, `jenis_kelamin`, `keterangan`, `status_pegawai`, `bidang_pegawai`, `createtime`) VALUES
(2, 'Hj. Hadijah, SKM., M.Kes.', 'Perempuan', 'Kepala Puskesmas', 'PNS', 'Kepala Puskesmas', '2022-12-11 01:06:57'),
(3, 'Hayum Nartin', 'Perempuan', 'Kesehatan', 'PNS', 'Tata Usaha', '2022-12-12 00:07:09'),
(4, 'Irvan, SKM.', 'Laki-laki', 'Kesehatan', 'PNS', 'Manajemen Mutu , PTM, dan P2 Surveilans', '2022-12-12 00:08:11'),
(5, 'Evyanti Muas Saputri, SKM', 'Perempuan', 'Kepala Perekam Medis', 'PNS', 'SIK Data dan Rekam medis', '2022-12-12 00:10:49'),
(6, 'Riny Andriani, SKM., M.Kes.', 'Perempuan', 'Kesehatan', 'PNS', 'Kepegawaian dan Kesjaor', '2022-12-12 00:12:28'),
(7, 'Rina Elisa, S.Kep., Ns.', 'Perempuan', 'Perawat', 'PNS', 'Rumah Tangga. Kesehatan jiwa, dan Prolanis', '2022-12-12 00:13:38'),
(8, 'Fitri Erningtyas', 'Perempuan', 'Keuangan', 'PNS', 'Keuangan', '2022-12-12 00:14:47'),
(9, 'dr. Ratnaningsih Kasy', 'Perempuan', 'dokter', 'PNS', 'Pemeriksaan Umum', '2022-12-12 00:16:21'),
(10, 'drg. Liandy Karnian WL', 'Laki-laki', 'dokter', 'PNS', 'Gigi dan mulut', '2022-12-12 00:17:50'),
(11, 'Dewi Sultriana, S.ST.', 'Perempuan', 'KIA/KB', 'PNS', 'KIA/KB', '2022-12-12 00:19:33'),
(12, 'dr. Sapriani Iskandar', 'Perempuan', 'dokter', 'PNS', 'Anak / MTBS', '2022-12-12 00:20:29'),
(13, 'dr. Fauziah Ibrahim', 'Laki-laki', 'dokter', 'PNS', 'Pemeriksaan Lansia', '2022-12-12 00:21:18'),
(14, 'Amra Nur, S.Si., A.pt.', 'Perempuan', 'Apoteker', 'PNS', 'Kefarmasian', '2022-12-12 00:22:15'),
(15, 'Sartina, S.Kep.', 'Perempuan', 'Perawat', 'PNS', 'Tindakan', '2022-12-12 00:23:16'),
(16, 'Yuni Asna, S.Tr.Keb.', 'Perempuan', 'Bidan', 'PNS', 'Persalinan', '2022-12-12 00:24:08'),
(17, 'Alang, AMAK', 'Laki-laki', 'Laboratorium', 'PNS', 'Laboratorium', '2022-12-12 00:25:07'),
(18, 'Ashmaria, S.ST.', 'Perempuan', 'Gizi', 'PNS', 'Pojok Gizi', '2022-12-12 00:25:44'),
(19, 'Asriani L, S.Kep.', 'Perempuan', 'Perawat', 'PNS', 'Kesehatan Lansia', '2022-12-12 00:27:34'),
(20, 'Putri Kusuma D, S.Kep, Ns.', 'Perempuan', 'Perawat', 'PNS', 'Home Care , P2 Rabies, dan PERKESMAS', '2022-12-12 00:29:27'),
(21, 'Nursamtria', 'Perempuan', 'UKGS', 'PNS', 'UKGS', '2022-12-12 00:30:30'),
(22, 'Martha Dwi F, Am.Keb.', 'Perempuan', 'Bidan', 'PNS', 'UKS / PKPR', '2022-12-12 00:31:23'),
(23, 'Yulianti Sahirun, SKM.', 'Perempuan', 'Kesehatan', 'PNS', 'Kesling', '2022-12-12 00:32:17'),
(24, 'Hasriati, AMG', 'Perempuan', 'AMG', 'PNS', 'Gizi', '2022-12-12 00:32:57'),
(25, 'Rapda Sebplin, SKM.', 'Perempuan', 'Kesehatan', 'PNS', 'PROMKES', '2022-12-12 00:34:13'),
(26, 'Elis Yuliani', 'Perempuan', 'Pengendalian Penyakit (P2)', 'PNS', 'Pengendalian Penyakit (P2) DBD atau malaria', '2022-12-12 00:36:27'),
(27, 'Siti Indariani, AMK', 'Perempuan', 'Imunisasi', 'PNS', 'Imunisasi dan Puskel/P3K', '2022-12-12 00:37:50'),
(28, 'Ratih Astika, SKM.', 'Perempuan', 'Kesehatan', 'PNS', 'P2 ISPA/diare', '2022-12-12 00:39:02'),
(29, 'Harmin, S.Kep.', 'Laki-laki', 'Perawat', 'PNS', 'P2 TB/Kusta', '2022-12-12 00:39:41'),
(30, 'drg. Tri Rahayu', 'Perempuan', 'dokter', 'Honorer', '-', '2022-12-12 00:42:23'),
(31, 'Diawati Dahian, S.Farm.', 'Perempuan', 'Apoteker', 'Honorer', 'Kefarmasian', '2022-12-12 00:44:09'),
(32, 'Risky Lestari, S.Keb.', 'Perempuan', 'Bidan', 'Honorer', 'Persalinan', '2022-12-12 00:45:17'),
(33, 'Waode Risnawati, S.Kep., Ns.', 'Perempuan', 'Perawat', 'Honorer', '-', '2022-12-12 00:46:46'),
(34, 'Mirnawati, AMF', 'Perempuan', 'Perekam Medis', 'PNS', 'Rekam Medis', '2022-12-12 00:48:21'),
(35, 'Lismaya Safitri, AMF', 'Perempuan', 'Perekam Medis', 'PNS', 'Rekam Medis', '2022-12-12 00:49:02'),
(36, 'Rasdiana Rauf, AMK', 'Laki-laki', 'Perekam Medis', 'PNS', 'Rekam Medis', '2022-12-12 00:49:56'),
(37, 'Atiyah Usman, AMK', 'Perempuan', 'Perekam Medis', 'PNS', 'Rekam Medis', '2022-12-12 00:50:48'),
(38, 'Sarina, AMK', 'Perempuan', 'Perekam Medis', 'Honorer', 'Rekam Medis', '2022-12-12 00:51:37'),
(39, 'Renny Kasy, AMK', 'Perempuan', 'Perekam Medis', 'Honorer', 'Rekam Medis', '2022-12-12 00:52:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_poliklinik`
--

CREATE TABLE `tbl_poliklinik` (
  `poliklinik_id` int(11) NOT NULL,
  `nama_poliklinik` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `gedung` varchar(128) DEFAULT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_poliklinik`
--

INSERT INTO `tbl_poliklinik` (`poliklinik_id`, `nama_poliklinik`, `gedung`, `createtime`) VALUES
(1, 'Poli Umum', 'Gedung Utama', '2022-11-12 06:21:10'),
(2, 'Poli Anak', 'Gedung Utama', '2022-11-30 21:21:49'),
(3, 'Poli Gigi', 'Gedung Utama', '2022-12-10 21:29:55'),
(4, 'Poli KIA', 'Gedung Utama', '2022-12-10 21:31:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_rm_pemeriksaan_odontogram`
--

CREATE TABLE `tbl_rm_pemeriksaan_odontogram` (
  `pemeriksaan_odontogram_id` int(11) NOT NULL,
  `pasien_id` int(11) NOT NULL,
  `dokter_id` int(11) NOT NULL,
  `odontogram_11_51` text DEFAULT NULL,
  `odontogram_12_52` text DEFAULT NULL,
  `odontogram_13_53` text DEFAULT NULL,
  `odontogram_14_54` text DEFAULT NULL,
  `odontogram_15_55` text DEFAULT NULL,
  `odontogram_16` text DEFAULT NULL,
  `odontogram_17` text DEFAULT NULL,
  `odontogram_18` text DEFAULT NULL,
  `odontogram_61_21` text DEFAULT NULL,
  `odontogram_62_22` text DEFAULT NULL,
  `odontogram_63_23` text DEFAULT NULL,
  `odontogram_64_24` text DEFAULT NULL,
  `odontogram_65_25` text DEFAULT NULL,
  `odontogram_26` text DEFAULT NULL,
  `odontogram_27` text DEFAULT NULL,
  `odontogram_28` text DEFAULT NULL,
  `odontogram_48` text DEFAULT NULL,
  `odontogram_47` text DEFAULT NULL,
  `odontogram_46` text DEFAULT NULL,
  `odontogram_45_85` text DEFAULT NULL,
  `odontogram_44_84` text DEFAULT NULL,
  `odontogram_43_83` text DEFAULT NULL,
  `odontogram_42_82` text DEFAULT NULL,
  `odontogram_41_81` text DEFAULT NULL,
  `odontogram_38` text DEFAULT NULL,
  `odontogram_37` text DEFAULT NULL,
  `odontogram_36` text DEFAULT NULL,
  `odontogram_75_35` text DEFAULT NULL,
  `odontogram_74_34` text DEFAULT NULL,
  `odontogram_73_33` text DEFAULT NULL,
  `odontogram_72_32` text DEFAULT NULL,
  `odontogram_71_31` text DEFAULT NULL,
  `keterangan_tambahan` text NOT NULL,
  `jumlah_photo_diambil` int(11) NOT NULL,
  `jumlah_rongten_photo_diambil` int(11) NOT NULL,
  `jns_key_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_rm_pemeriksaan_odontogram`
--

INSERT INTO `tbl_rm_pemeriksaan_odontogram` (`pemeriksaan_odontogram_id`, `pasien_id`, `dokter_id`, `odontogram_11_51`, `odontogram_12_52`, `odontogram_13_53`, `odontogram_14_54`, `odontogram_15_55`, `odontogram_16`, `odontogram_17`, `odontogram_18`, `odontogram_61_21`, `odontogram_62_22`, `odontogram_63_23`, `odontogram_64_24`, `odontogram_65_25`, `odontogram_26`, `odontogram_27`, `odontogram_28`, `odontogram_48`, `odontogram_47`, `odontogram_46`, `odontogram_45_85`, `odontogram_44_84`, `odontogram_43_83`, `odontogram_42_82`, `odontogram_41_81`, `odontogram_38`, `odontogram_37`, `odontogram_36`, `odontogram_75_35`, `odontogram_74_34`, `odontogram_73_33`, `odontogram_72_32`, `odontogram_71_31`, `keterangan_tambahan`, `jumlah_photo_diambil`, `jumlah_rongten_photo_diambil`, `jns_key_id`, `user_id`, `createtime`) VALUES
(3, 9, 11, 'ya', 'ok', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'ok', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 5, 5, 1, 1, '2022-12-13 18:48:06'),
(4, 11, 11, 'tes', '', '', '', '', '', '', '', 'yess', 'no', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 10, 12, 1, 1, '2022-12-18 19:02:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_rm_pengkajian_awal`
--

CREATE TABLE `tbl_rm_pengkajian_awal` (
  `pengkajian_awal_id` int(11) NOT NULL,
  `pasien_id` int(11) NOT NULL,
  `pegawai_id` int(11) NOT NULL,
  `riwayat_penyakit` text DEFAULT NULL,
  `riwayat_pengobatan` text DEFAULT NULL,
  `riwayat_penyakit_keluarga` text DEFAULT NULL,
  `alergi` text DEFAULT NULL,
  `kesadaran_fisik` text DEFAULT NULL,
  `tekanan_darah` text DEFAULT NULL,
  `frekuensi_nafas` text DEFAULT NULL,
  `gcs` text DEFAULT NULL,
  `frekuensi_nadi` text DEFAULT NULL,
  `suhu_tubuh` enum('febris','afebris') DEFAULT NULL,
  `masalah_fisik` text DEFAULT NULL,
  `keluhan_pernafasan` text DEFAULT NULL,
  `irama_nafas` enum('regular','irregular') DEFAULT NULL,
  `suara_nafas` text DEFAULT NULL,
  `masalah_pernafasan` text DEFAULT NULL,
  `nyeri_dada` enum('ya','tidak') DEFAULT NULL,
  `suara_jantung` enum('normal','tidak normal') DEFAULT NULL,
  `crt` enum('< 3 detik','> 3 detik') DEFAULT NULL,
  `jvp` enum('normal','meningkat') DEFAULT NULL,
  `masalah_kardiovaskular` text DEFAULT NULL,
  `keluhan_pusing` enum('ya','tidak') DEFAULT NULL,
  `kesadaran_persyarafan` text DEFAULT NULL,
  `pupil` enum('isokor','anisokor') DEFAULT NULL,
  `sklera` text DEFAULT NULL,
  `kaku_kuduk` enum('ya','tidak') DEFAULT NULL,
  `kelumpuhan` enum('ya','tidak') DEFAULT NULL,
  `gangg_persepsi_sensorik` enum('ya','tidak') DEFAULT NULL,
  `masalah_persyarafan` text DEFAULT NULL,
  `keluhan_sistem_ekskresi` text DEFAULT NULL,
  `produksi_urin` text DEFAULT NULL,
  `bak` text DEFAULT NULL,
  `warna_urin` text DEFAULT NULL,
  `bau_urin` text DEFAULT NULL,
  `masalah_ekskresi` text DEFAULT NULL,
  `mulut` text DEFAULT NULL,
  `abdomen` text DEFAULT NULL,
  `abdomen_tambahan` text DEFAULT NULL,
  `bab` text DEFAULT NULL,
  `konsistensi_bab` text DEFAULT NULL,
  `diet` text DEFAULT NULL,
  `frekuensi_diet` text DEFAULT NULL,
  `jml_frekuensi_diet` text DEFAULT NULL,
  `masalah_pencernaan` text DEFAULT NULL,
  `pergerak_sendi` enum('bebas','terbatas') DEFAULT NULL,
  `akral` text DEFAULT NULL,
  `patah_tulang` text DEFAULT NULL,
  `eks_fiksasi` text DEFAULT NULL,
  `eks_fiksasi_tambahan` text DEFAULT NULL,
  `kekuatan_otot` enum('kuat','lemah') DEFAULT NULL,
  `turgor` enum('baik','buruk') DEFAULT NULL,
  `masalah_muskuloskeletal` text DEFAULT NULL,
  `masalah_muskuloskeletal_tambahan` text DEFAULT NULL,
  `penis` text DEFAULT NULL,
  `scrotum` text DEFAULT NULL,
  `testis` text DEFAULT NULL,
  `vagina` text DEFAULT NULL,
  `pendarahan` text DEFAULT NULL,
  `siklus_haid` enum('Teratur','Tidak teratur') DEFAULT NULL,
  `payudara` text DEFAULT NULL,
  `masalah_reproduksi` text DEFAULT NULL,
  `psikologis` text DEFAULT NULL,
  `sosiologis` text DEFAULT NULL,
  `spiritual` text DEFAULT NULL,
  `masalah_psikologis` text DEFAULT NULL,
  `hambatan_diri` text DEFAULT NULL,
  `data_penunjang` text DEFAULT NULL,
  `jns_key_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_rm_pengkajian_awal`
--

INSERT INTO `tbl_rm_pengkajian_awal` (`pengkajian_awal_id`, `pasien_id`, `pegawai_id`, `riwayat_penyakit`, `riwayat_pengobatan`, `riwayat_penyakit_keluarga`, `alergi`, `kesadaran_fisik`, `tekanan_darah`, `frekuensi_nafas`, `gcs`, `frekuensi_nadi`, `suhu_tubuh`, `masalah_fisik`, `keluhan_pernafasan`, `irama_nafas`, `suara_nafas`, `masalah_pernafasan`, `nyeri_dada`, `suara_jantung`, `crt`, `jvp`, `masalah_kardiovaskular`, `keluhan_pusing`, `kesadaran_persyarafan`, `pupil`, `sklera`, `kaku_kuduk`, `kelumpuhan`, `gangg_persepsi_sensorik`, `masalah_persyarafan`, `keluhan_sistem_ekskresi`, `produksi_urin`, `bak`, `warna_urin`, `bau_urin`, `masalah_ekskresi`, `mulut`, `abdomen`, `abdomen_tambahan`, `bab`, `konsistensi_bab`, `diet`, `frekuensi_diet`, `jml_frekuensi_diet`, `masalah_pencernaan`, `pergerak_sendi`, `akral`, `patah_tulang`, `eks_fiksasi`, `eks_fiksasi_tambahan`, `kekuatan_otot`, `turgor`, `masalah_muskuloskeletal`, `masalah_muskuloskeletal_tambahan`, `penis`, `scrotum`, `testis`, `vagina`, `pendarahan`, `siklus_haid`, `payudara`, `masalah_reproduksi`, `psikologis`, `sosiologis`, `spiritual`, `masalah_psikologis`, `hambatan_diri`, `data_penunjang`, `jns_key_id`, `user_id`, `createtime`) VALUES
(1, 9, 19, '', '', '', 'Coklat', '', '', '', '', '', 'febris', 'hipotermi', 'sesak, nyeri, batuk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, NULL, '', NULL, '', NULL, NULL, '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, '', NULL, '', '', '', '', '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', 1, 1, '2022-12-14 19:18:44'),
(2, 11, 29, '', 'Thalasemia', '', '', '', '', '', '', '', 'afebris', 'hipotermi, hipetermi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, NULL, '', NULL, '', NULL, NULL, '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, '', NULL, '', '', '', '', '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', 1, 1, '2022-12-14 22:55:52'),
(6, 12, 15, '-', '-', '-', '-', 'Kurang Baik', '180/120', '21', '14', '70', 'febris', 'hipotermi', '', NULL, '', '', 'ya', 'tidak normal', '> 3 detik', 'meningkat', 'Nyeri, Penurunan Curah Jantung', NULL, '', NULL, '', NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', ', , ', '', NULL, NULL, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', 1, 1, '2022-12-21 01:44:06'),
(7, 20, 19, '', '-', '-', 'Coklat', 'Baik', '100/120', '20', '', '40', NULL, 'hipotermi', '', NULL, '', '', NULL, NULL, NULL, NULL, '', NULL, '', NULL, '', NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', NULL, '', '', ', , ', NULL, NULL, NULL, '', NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', 1, 1, '2022-12-21 14:12:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_rm_riwayat_kunjungan_pasien`
--

CREATE TABLE `tbl_rm_riwayat_kunjungan_pasien` (
  `riwayat_kunjungan_pasien_id` int(11) NOT NULL,
  `pasien_id` int(11) NOT NULL,
  `dokter_id` int(11) NOT NULL,
  `poliklinik_id` int(11) NOT NULL,
  `subjektif` text NOT NULL,
  `objektif` text NOT NULL,
  `assesment` text NOT NULL,
  `planning` text NOT NULL,
  `jns_key_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_rm_riwayat_kunjungan_pasien`
--

INSERT INTO `tbl_rm_riwayat_kunjungan_pasien` (`riwayat_kunjungan_pasien_id`, `pasien_id`, `dokter_id`, `poliklinik_id`, `subjektif`, `objektif`, `assesment`, `planning`, `jns_key_id`, `user_id`, `createtime`) VALUES
(4, 9, 1, 1, '-', '-', '-', '-', 1, 1, '2022-12-12 15:47:11'),
(5, 13, 8, 3, '-', '--', '-', '-', 1, 1, '2022-12-12 22:36:12'),
(7, 11, 10, 4, '--', '--', '-', '-', 1, 1, '2022-12-12 23:50:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `setting_id` int(11) NOT NULL,
  `setting_appname` varchar(100) NOT NULL,
  `setting_short_appname` varchar(10) NOT NULL,
  `setting_owner_name` varchar(100) NOT NULL,
  `setting_phone` varchar(30) NOT NULL,
  `setting_email` varchar(100) NOT NULL,
  `setting_address` text NOT NULL,
  `setting_logo` varchar(100) NOT NULL,
  `setting_background` varchar(150) NOT NULL,
  `setting_instagram` varchar(150) NOT NULL,
  `setting_facebook` varchar(150) NOT NULL,
  `setting_youtube` varchar(150) NOT NULL,
  `setting_about` text DEFAULT NULL,
  `setting_key_aes` varchar(300) NOT NULL,
  `setting_key_camellia` varchar(300) NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_setting`
--

INSERT INTO `tbl_setting` (`setting_id`, `setting_appname`, `setting_short_appname`, `setting_owner_name`, `setting_phone`, `setting_email`, `setting_address`, `setting_logo`, `setting_background`, `setting_instagram`, `setting_facebook`, `setting_youtube`, `setting_about`, `setting_key_aes`, `setting_key_camellia`, `createtime`) VALUES
(1, 'Electronic Medical Record Puskesmas Mekar Kota Kendari', 'e-medicord', 'Muh. Fadjrul Falakh', '(0401) 3081469', 'puskesmasmekar@yahoo.com', 'Jl. Laremba Komp. RCTI Kadia', 'medicord120221125111342.svg', 'clouds.jpeg', 'https://instagram.com/uptd_pmekar/', 'https://facebook.com/promkesasryana', 'https://www.youtube.com/channel/UCMJWK7WQ3DsW_veIdwk-SCg', 'Ini adalah aplikasi rekam medis puskesmas mekar kota kendari', 'medicordcrypto11', 'medicordcrypto22', '2022-10-01 15:22:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_status_pasien`
--

CREATE TABLE `tbl_status_pasien` (
  `status_pasien_id` int(11) NOT NULL,
  `nama_status_pasien` varchar(128) NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_status_pasien`
--

INSERT INTO `tbl_status_pasien` (`status_pasien_id`, `nama_status_pasien`, `createtime`) VALUES
(1, 'BPJS', '2022-10-21 03:04:08'),
(2, 'UMUM', '2022-10-21 03:04:08'),
(3, 'GRATIS', '2022-10-21 03:04:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_fullname` varchar(128) NOT NULL,
  `user_name` varchar(128) NOT NULL,
  `user_password` varchar(128) NOT NULL,
  `user_email` varchar(128) NOT NULL,
  `user_photo` varchar(128) NOT NULL,
  `user_lastlogin` datetime NOT NULL,
  `createtime` datetime NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_fullname`, `user_name`, `user_password`, `user_email`, `user_photo`, `user_lastlogin`, `createtime`, `group_id`) VALUES
(1, 'Muh. Fadjrul Falakh', 'administrator', '$2y$10$ayq3nI6Hl43.wxYXd4bOW.kXE4cVwV44D9xhrkKQfl3m/dxptYjpq', 'muhammadfadjrulfalakh00@gmail.com', 'profile-1-20221129162955.jpg', '2022-10-05 21:47:20', '2022-10-05 21:47:20', 1),
(6, 'Robin', 'Robin', '$2y$10$iqeq6CVp0U.6XUmuz.FGsuoKttIA/7FUU/kK3Sm8cgwsBJBO.o1c2', 'Robin0101@gmail.com', '', '0000-00-00 00:00:00', '2022-10-27 04:59:45', 2),
(7, 'Gian Ainur', 'gian', '$2y$10$AHE92DwrPHTSAa/NMtEdl.ocC8VgOHpcmuHApjTnA7r/9xtd/v8ZK', 'gian30@gmail.com', '', '0000-00-00 00:00:00', '2022-12-10 20:58:49', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_web_content`
--

CREATE TABLE `tbl_web_content` (
  `content_id` int(11) NOT NULL,
  `content_title` varchar(30) NOT NULL,
  `content_text` text NOT NULL,
  `content_image` varchar(50) NOT NULL,
  `content_menu` varchar(30) NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_web_content`
--

INSERT INTO `tbl_web_content` (`content_id`, `content_title`, `content_text`, `content_image`, `content_menu`, `createtime`) VALUES
(1, 'Sejarah', '<p>Puskesmas mekar berada di Jl. Laremba Komp. RCTI Kadia, Kota Kendari, yang didirikan pada tahun 2017. Kepala Dinas (Kadis) Kesehatan Kota Kendari, Drg. Rahminingrum, mengungkapkan anggaran pembangunan dan rehabilitasi Puskesmas Mekar merupakan dari Anggaran Pendapatan dan Belanja Daerah (APBD) 2017 yang menelan biaya sebesar Rp 2 miliar lebih.</p>', '', 'sejarah', '2022-12-13 22:35:41'),
(2, 'Sambutan Kepala Dinas', '<h2 style=\"text-align: center;\"><strong>Assalamu\'alaikum Warahmatullahi Wabarakatuh</strong></h2>\r\n<p style=\"text-align: justify;\">&nbsp; &nbsp; &nbsp; &nbsp;Alhamdulillahi rabbil \'alamin, puji syukur kehadirat Allah SubhanahuWata\'ala senantiasa kita panjatkan atas segala limpahan nikmat, rahmat, hidayah dan ridhoNya. Sholawat dan salam semoga tetap tercurahkan limpahkan kepada Nabi akhir zaman Rasulullah Muhammad Shallallahu Alaihi Wasallam yang telah membawa risalah kebenaran.</p>\r\n<p style=\"text-align: justify;\">&nbsp; &nbsp; &nbsp; &nbsp; Selamat datang kami ucapkan kepada seluruh pengunjung website Puskesmas Mekar Kota Kendari. Disini kami sampaikan beberapa hal yang berkaitan dengan keberadaan puskesmas kami. Semoga hal ini dapat menambah wawasan tentang pelayanan yang ada di Puskesmas Mekar Kota Kendari.</p>\r\n<p style=\"text-align: justify;\">&nbsp; &nbsp; &nbsp; &nbsp; Di era kemajuan teknologi informasi dan komunikasi memungkinkan sekali untuk saling mengenal dan mengetahui lebih banyak antara yang satu dengan yang lain. Melalui website inilah kami berupaya memperkenalkan profil puskesmas dan berkomitmen untuk selalu meningkatkan mutu pelayanan kepada masyarakat.</p>\r\n<p style=\"text-align: justify;\">&nbsp; &nbsp; &nbsp;Akhir kata semoga dengan adanya website ini, kami berharap masyarakat dapat mengenal Puskesmas Mekar dengan lebih dalam dan bersedia memberikan masukan kepada kami untuk meningkatkan mutu pelayanan kesehatan di wilayah kerja Puskesmas Mekar, terima kasih.</p>\r\n<p>&nbsp;</p>\r\n<p>SALAM SEHAT</p>\r\n<p style=\"text-align: right;\">Hormat saya,</p>\r\n<p style=\"text-align: right;\"><strong>Kepala Puskesmas Mekar Kota Kendari</strong></p>\r\n<p style=\"text-align: right;\">Hj. Hadijah, SKM., M.Kes.</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', 'content-20221213222409.png', 'sambutan', '2022-12-14 00:53:21'),
(3, 'Tupoksi Dinas', '<h3 style=\"text-align: center;\"><strong>TUGAS DAN FUNGSI</strong></h3>\r\n<p>&nbsp;</p>\r\n<p>Permenkes Nomor 43 Tahun 2019 tentang Puskesmas menyebutkan bahwa Puskesmas adalah Fasilitas Pelayanan Kesehatan (Faskes). Fasilitas Pelayanan Kesehatan adalah suatu tempat yang digunakan untuk menyelenggarakan upaya pelayanan kesehatan baik promotif, Preventif, Kuratif maupun Rehabilitatif yang dilakukan oleh pemerintah, pemerintah daerah dan/atau&nbsp; masyarakat. Puskesmas mempunyai tugas melaksanakan kebijakan kesehatan di wilayah kerjanya.</p>\r\n<p>&nbsp;</p>\r\n<p>BAB II</p>\r\n<p>&nbsp;</p>\r\n<p>PRINSIP PENYELENGGARAAN, TUGAS, FUNGSI DAN WEWENANG</p>\r\n<p>&nbsp;</p>\r\n<p>Pasal 3</p>\r\n<p>&nbsp;</p>\r\n<p>Prinsip penyelenggaraan Puskesmas meliputi:</p>\r\n<p>Berdasarkan prinsip paradigma sehat sebagaimana dimaksud pada ayat (1) huruf a, Puskesmas mendorong seluruh pemangku kepentingan berpartisipasi dalam upaya mencegah dan mengurangi risiko kesehatan yang dihadapi individu, keluarga, kelompok, dan masyarakat melalui Gerakan Masyarakat Hidup Sehat</p>\r\n<p>Berdasarkan prinsip pertanggungjawaban wilayah sebagaimana dimaksud pada ayat (1) huruf b, Puskesmas menggerakkan dan bertanggung jawab terhadap pembangunan kesehatan di wilayah kerjanya.</p>\r\n<p>Berdasarkan prinsip kemandirian masyarakat sebagaimana dimaksud pada ayat (1) huruf c, Puskesmas mendorong kemandirian hidup sehat bagi individu, keluarga, kelompok dan masyarakat</p>\r\n<p>Berdasarkan prinsip ketersediaan akses pelayanan kesehatan sebagaimana dimaksud pada ayat (1) huruf d, Puskesmas menyelenggarakan Pelayanan Kesehatan yang dapat diakses dan terjangkau oleh seluruh masyarakat di wilayah kerjanya secara adil tanpa membedakan status sosial, ekonomi, agama, budaya dan kepercayaan</p>\r\n<p>Berdasarkan prinsip teknologi tepat guna sebagaimana dimaksud pada ayat (1) huruf e, Puskesmas menyelenggarakan Pelayanan Kesehatan dengan memanfaatkan teknologi yang sesuai dengan kebutuhan pelayanan, mudah dimanfaatkan dan tidak berdampak buruk bagi lingkungan</p>\r\n<p>Berdasarkan prinsip keterpaduan dan kesinambungan sebagaimana dimaksud pada ayat (1) huruf f, Puskesmas mengintegrasikan dan mengoordinasikan penyelenggaraan UKM dan UKP lintas program dan lintas sektor serta melaksanakan Sistem Rujukan yang di dukung dengan manajemen Puskesmas.</p>\r\n<p>Pasal 4</p>\r\n<p>&nbsp;</p>\r\n<p>Puskesmas mempunyai tugas melaksanakan kebijakan kesehatan untuk mencapai tujuan pembangunan kesehatan di wilayah kerjanya</p>\r\n<p>Untuk mencapai tujuan pembangunan kesehatan sebagaimana dimaksud pada ayat (1), Puskesmas mengintegrasikan program yang dilaksanakannya dengan pendekatan keluarga</p>\r\n<p>Pendekatan keluarga sebagaimana dimaksud pada ayat (2) merupakan salah satu cara Puskesmas mengintegrasikan program untuk meningkatkan jangkauan sasaran dan mendekatkan akses pelayanan kesehatan di wilayah kerjanya dengan mendatangi keluarga</p>\r\n<p>Pasal 5</p>\r\n<p>&nbsp;</p>\r\n<p>Dalam melaksanakan tugas sebagaimana dimaksud dalam Pasal 4 ayat (1), Puskesmas memiliki fungsi:</p>\r\n<p>&nbsp;</p>\r\n<p>Penyelenggaraan UKM tingkat pertama di wilayah kerjanya; dan</p>\r\n<p>Penyelenggaraan UKP tingkat pertama di wilayah kerjanya.</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Pasal 6</p>\r\n<p>&nbsp;</p>\r\n<p>Dalam melaksanakan fungsi penyelenggaraan UKM tingkat ertama di wilayah kerjanya sebagaimana dimaksud dalam Pasal 5 huruf a, Puskesmas berwenang untuk:</p>\r\n<p>&nbsp;</p>\r\n<p>Menyusun perencanaan kegiatan berdasarkan hasil analisis masalah kesehatan masyarakat dan kebutuhan pelayanan yang diperlukan;</p>\r\n<p>Melaksanakan advokasi dan sosialisasi kebijakan kesehatan;</p>\r\n<p>Melaksanakan komunikasi, informasi, edukasi, dan pemberdayaan masyakat dalam bidang kesehatan;</p>\r\n<p>Menggerakkan masyarakat untuk mengidentifikasi dan menyelesaikan masalah kesehatan pada setiap perkembangan masyarakat, yang bekerja sama dengan pimpinan wilayah dan sektor lain terkait;</p>\r\n<p>Melaksanakan pembinaan teknis terhadap institusi, jaringan pelayanan Puskesmas dan upaya kesehatan bersumber daya masyarakat;</p>\r\n<p>Melaksanakan perencanaan kebutuhan dan peningkatan kompetensi sumber daya manusia Puskesmas;</p>\r\n<p>Memantau pelaksanaan pembangunan agar berwawasan kesehatan;</p>\r\n<p>Memberikan pelayanan Kesehatan yang berorientasi pada keluarga, kelompok, dan masyarakat dengan mempertimbangkan faktor biologis, psikologis, sosial budaya dan spiritual;</p>\r\n<p>Melaksanakan pencatatan, pelaporan, dan evaluasi terhadap akses, mutu, dan cakupan Pelayanan Kesehatan;</p>\r\n<p>Memberikan rekomendasi terkait masalah kesehatan masyarakat kepada dinas kesehatan daerah kabupaten/kota, melaksanakan system kewaspadaan dini, dan respon penanggulangan penyakit;</p>\r\n<p>Melaksanakan kegiatan pendekatan keluarga; dan</p>\r\n<p>Melakukan kolaborasi dengan Fasilitas Pelayanan Kesehatan tingkat pertama dan rumah sakit di wilayah kerjanya.</p>\r\n<p>Pasal 7</p>\r\n<p>&nbsp;</p>\r\n<p>Dalam melaksanakan fungsi penyelenggaraan UKP tingkat pertama di wilayah kerjanya sebagaimana dimaksud dalam Pasal 5 huruf b, Puskesmas berwenang untuk:</p>\r\n<p>&nbsp;</p>\r\n<p>Menyelenggarakan pelayanan kesehatan dasar secara komprehensif, berkesinambungan, bermutu dan holistic yang mengintegrasikan faktor biologis, psikologis, sosial dan buadaya dengan membina hubungan dokter-pasien yang erat dan setara;</p>\r\n<p>Menyelenggarakan Pelayanan Kesehatan yang mengutamakan upaya promotif dan preventif;</p>\r\n<p>Menyelenggarakan Pelayanan Kesehatan yang berpusat pada individu, berfokus pada keluarga, dan berorientasi pada kelompok dan masyarakat</p>\r\n<p>Menyelenggarakan Pelayanan Kesehatan yang mengutamakan Kesehatan, Keamanan, Keselamatan pasien, petugas, pengunjung dan lingkungan kerja;</p>\r\n<p>Menyelenggarakan Pelayanan Kesehatan dengan prinsip koordinatif dan kerja sama inter dan antar profesi;</p>\r\n<p>Melaksanakan penyelenggaraan rekam medis;</p>\r\n<p>Melaksanakan pencatatan, pelaporan, dan evaluasi terhadap mutu dan akses Pelayanan Kesehatan;</p>\r\n<p>Melaksanakan perencanaan kebutuhan dan peningkatan kompetensi sumber daya manusia Puskesmas;</p>\r\n<p>Melaksanakan penapisan rujukan sesuai dengan indikasi medis dan system rujukan; dan</p>\r\n<p>Melakukan koordinasi dan kolaborasi dengan Fasilitas Pelayanan Kesehatan di wilayah kerjanya, sesuai dengan ketentuan peraturan perundang-undangan.</p>\r\n<p>`Pasal 8</p>\r\n<p>&nbsp;</p>\r\n<p>Selain memiliki kewenangan sebagaimana dimaksud dalam Pasal 6 dan pasal 7, Puskesmas melakukan pembinaan terhadap Fasilitas Pelayanan Kesehatan tingkat pertama di wilayah kerjanya.</p>\r\n<p>&nbsp;</p>\r\n<p>Pasal 9</p>\r\n<p>&nbsp;</p>\r\n<p>Menyelenggarakan fungsi sebagaimana dimaksud Pasal 5, Puskesmas dapat berfungsi sebagai wahana pendidikan bidang kesehatan, wahana program intership, dan /atau sebagai jejarning rumah sakit pendidikan.</p>\r\n<p>Ketentuan mengenai Puskesmas sebagai wahana pendidikan bidang kesehatan, wahana bidang internsip, dan/atau sebagai jejaring rumah sakit pendidikan sebagaimana dimaksud pada ayat (1) dilaksanakan sesuai dengan ketentuan peraturan perundang-undangan</p>', '', 'tupoksi', '2022-12-13 22:49:35'),
(4, 'Visi Misi', '<p style=\"text-align: center;\"><span style=\"font-size: 20px;\"><strong>VISI</strong></span></p>\r\n<p style=\"text-align: center;\">\"Menjadi Puskesmas yang maju dan handal dalam memberikan pelayanan kesehatan bermutu&nbsp; dan berkualitas menuju masyarakat sehat dan mandiri\"</p>\r\n<p style=\"text-align: center;\">&nbsp;</p>\r\n<p style=\"text-align: center;\"><span style=\"font-size: 20px;\"><strong>MISI</strong></span></p>\r\n<p>1. Memberikan pelayanan kesehatan yang berkualitas dan terjangkau oleh masyarakat.</p>\r\n<p>2. Menciptakan kemandirian individu, keluarga dan masyarakat, berperilaku hidup bersih dan sehat.</p>\r\n<p>3. Meningkatkan peran puskesmas melalui strategi pendekatan keluarga dan meningkatkan peran serta dan lintas sektor dalam upaya kesehatan.</p>\r\n<p>4. Meningkatkan kinerja program berdasarkan standar pelayanan puskesmas.</p>\r\n<p>5. Meningkatkan pengelolaan manajemen puskesmas secara efektif dan efisien serta mengembangkan sumber daya manusia dalam membangun kompetensi masing-masing.</p>', '', 'visi', '2022-12-13 22:47:34'),
(5, 'Maklumat Pelayanan', '<p><strong>MAKLUMAT PELAYANAN</strong></p>\r\n<p><strong>UPTD PUSKESMAS MEKAR KOTA KENDARI</strong></p>\r\n<p>&nbsp;</p>\r\n<p>Menimbang :</p>\r\n<p>a. Bahwa dalam rangka meningkatkan responsivitas petugas pelayanan, meningkatkan kepuasan masyarakat/pengguna jasa layanan dan kinerja serta kualitas layanan menyeluruh, maka perlu di tetapkan Maklumat Pelayanan.</p>\r\n<p>b. Agar maklumat tersebut dapat dipedomani dalam pelaksanaan pelayanan maka perlu ditetapkan dengan keputusan . Kepala UPTD Puskesmas Mekar.</p>\r\n<p>c. bahwa berdasarkan pertimbangan sebagaimana dimaksud dalam huruf a dan huruf b, perlu menetapkan keputudan . Kepala UPTD Puskesmas Mekar.</p>\r\n<p>&nbsp;</p>\r\n<p>Mengingat :</p>\r\n<p>1. Undang-Undang Nomor 25 Tahun 2009 tentang Pelayanan Publik (lembar Negara Republik Indonesia Tahun 2009 Nomor 112, Tambahan Lembaran Negara Republik Indonesia Tahun 2009 Nomor 5038)</p>\r\n<p>2. Peraturan Mentri Pendayagunaan Aparatur Negara dan Reformasi Birokrasi Nomor 15 Tahun 2014 tentang Pedoman Standar Pelayanan;</p>\r\n<p>3. Undang-Undang RI Nomor 14 Tahun 2008 tentang Keterbukaan Informasi Publik;</p>\r\n<p>4. Undang-Undang Nomor 25 Tahun 2009 tentang Pelayanan Publik</p>\r\n<p>5. Peraturan Komisi Informasi Nomor 1 Tahun 2010 tentang Standar Pelayanan Informasi Publik;</p>\r\n<p>&nbsp;</p>\r\n<p>MEMUTUSKAN</p>\r\n<p>&nbsp;</p>\r\n<p>Menetapkan : KEPUTUSAN KEPALA UPT PUSKESMAS SEKARGADUNG TENTANG MAKLUMAT PELAYANAN UPTD PUSKESMAS MEKAR KOTA KENDARI</p>\r\n<p>KESATU : Maklumat Pelayanan UPTD PUSKESMAS MEKAR KOTA KENDARI</p>\r\n<p>&ldquo;DENGAN INI, KAMI MENYATAKAN SANGGUP MENYELENGGARAKAN PELAYANAN SASUAI STANDAR PELAYANAN YANG TELAH DITETAPKAN DAN APABILA KAMI TIDAK MENEPATI JANJI LAYANAN, KAMI SIAP MENERIMA SANKSI SESUAI PERATURAN PERUNDANG-UNDANGAN YANG BERLAKU&rdquo;</p>\r\n<p>KEDUA : Keputusan ini berlaku sejak ditetapkan dan apabila kemudian hari ternyata terdapat kekeliruan dalam Keputusan ini akan diadakan perbaikan sebagaimana mestinya.</p>\r\n<p>&nbsp;</p>\r\n<p>Ditetapkan di : Kendari</p>\r\n<p>Pada tanggal : 03 Mei 2017</p>\r\n<p>&nbsp;</p>\r\n<p>Kepala UPTD Puskesmas Mekar Kota Kendari</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Hj. Hadijah, SKM., M.Kes.</p>\r\n<p>NIP. 19770319 200604 2 012</p>', '', 'maklumat', '2022-12-13 22:56:19'),
(6, 'Struktur Organisasi', '<p>-</p>\r\n', 'content-20210611091905.png', 'struktur', '2021-06-11 09:19:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_web_field`
--

CREATE TABLE `tbl_web_field` (
  `field_id` int(11) NOT NULL,
  `field_name` varchar(100) NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_web_field`
--

INSERT INTO `tbl_web_field` (`field_id`, `field_name`, `createtime`) VALUES
(1, 'Semua', '2022-10-02 16:01:40'),
(2, 'Kepala Puskesmas', '2022-10-02 16:02:04'),
(3, 'Sekretariat', '2022-10-02 16:02:23'),
(4, 'Perawat', '2022-10-02 16:02:42'),
(5, 'Dokter', '2022-10-02 16:02:47'),
(6, 'Perekam Medis', '2022-11-29 12:01:00'),
(7, 'Apoteker', '2022-11-29 23:30:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_web_gallery`
--

CREATE TABLE `tbl_web_gallery` (
  `gallery_id` int(11) NOT NULL,
  `gallery_name` varchar(200) NOT NULL,
  `gallery_cover` text NOT NULL,
  `gallery_url` text DEFAULT NULL,
  `gallery_description` text NOT NULL,
  `gallery_date` date NOT NULL,
  `gallery_type` varchar(10) NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_web_gallery`
--

INSERT INTO `tbl_web_gallery` (`gallery_id`, `gallery_name`, `gallery_cover`, `gallery_url`, `gallery_description`, `gallery_date`, `gallery_type`, `createtime`) VALUES
(9, 'Kegiatan Pengukuran Kebugaran ASN Kecamatan Kadia', 'video-20221214144343.mp4', 'https://www.youtube.com/watch?v=-iJsq6rF0Do&t=5s', 'Aparatur Sipil Negara (ASN) merupakan pekerja dengan usia produktif yang membutuhkan kebugaran jasmani yang baik dalam melaksanakan tugas dan fungsinya. Untuk mengetahui tingkat kebugaran jasmani, perlu dilakukan pengukuran untuk mewujudkan ASN yang produktif serta penerapan gaya hidup sehat.\r\n\r\nPeningkatan kebugaran jasmani bertujuan meningkatkan stamina dan status kesehatan seseorang, dapat dicapai dengan menambah aktivitas fisik dan latihan fisik/olahraga secara baik, benar, terukur, dan teratur.\r\n\r\nSalah satu metode yang dapat digunakan untuk pengukuran kebugaran jasmani ASN adalah Rockport. Berdasarkan hasil kajian para ahli, metode ini mudah dilaksanakan dan tidak memerlukan sarana dan prasarana khusus sehingga dapat dijadikan sebagai salah satu pilihan latihan fisik..\r\n\r\nNahh kemaren (Sabtu, 18 September 2021) telah dilaksanakan kegiatan dimaksud yang berlokasi di area kantor kecamatan kadia dihadiri oleh ASN Kecamatan Kadia, ASN Kelurahan Kadia dan Pondambea serta ASN Puskesmas Mekar dan melibatkan dokter pengawas.', '2021-09-18', 'video', '2022-12-14 14:43:43'),
(10, 'Minlok Lintas Sektor Kecamatan Kadia', 'video-20221214163803.mp4', 'https://www.youtube.com/watch?v=uunrtfvPqnM&t=6s', 'Hari ini (Kamis, 30 September 2021) dilaksanakan kegiatan Minilokakarya Lintas Sektor di Kantor Kecamatan Kadia yang dihadiri oleh Camat, Lurah, Bhabinsa, Bhabinkamtibmas, Kepala Sekolah, Toma/Toga wilker Puskesmas Mekar', '2021-09-18', 'video', '2022-12-14 16:38:03'),
(11, 'Launching Posyandu Remaja Solagratia Mahanaim', 'gallery-20221214164513.jpg', NULL, 'Foto Kegiatan Launching Posyandu Remaja Solagratia Mahanaim', '2021-11-13', 'photo', '2022-12-14 16:45:13'),
(12, 'Kegiatan Vaksin di Plasa PT. Telkom WITEL Sultra, Indonesia', 'gallery-20221214170335.jpg', NULL, 'Foto tim vaksin', '2022-02-18', 'photo', '2022-12-14 17:03:35'),
(13, 'Kegiatan Kaji Banding dengan Puskesmas Lepo-Lepo', 'gallery-20221214170732.jpg', NULL, 'Foto kegiatan', '2021-11-09', 'photo', '2022-12-14 17:07:32'),
(14, 'kegiatan rutin kampung GERMAS RT.003/RW.003 Kelurahan Pondambea', 'gallery-20221214171018.jpg', NULL, 'kegiatan rutin kampung GERMAS RT.003/RW.003 Kelurahan Pondambea; Senam Bersama dan Pemeriksaan Kesehatan Masyarakat..(Minggu, 10 Oktober 2021)', '2021-10-10', 'photo', '2022-12-14 17:10:18'),
(15, 'Kegiatan Sharing dengan Topik \"Nutrisi pada Ibu Hamil\"', 'gallery-20221214171400.jpg', NULL, 'Terima Kasih dr. Muzdatul Khaeriah, Sp.OG M.Kes atas ilmunya hari ini ( Kamis, 17 Maret 2022),,semoga bermanfaat untuk para bunda-bunda', '2022-03-17', 'photo', '2022-12-14 17:14:00'),
(16, 'Kegiatan Verifikasi STBM Puskesmas Mekar', 'gallery-20221214171543.jpg', NULL, 'Kegiatan Verifikasi STBM Puskesmas Mekar, Perumnas dan Jati Raya di Kecamatan Kadia', '2021-07-17', 'photo', '2022-12-14 17:15:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_web_gallery_photo`
--

CREATE TABLE `tbl_web_gallery_photo` (
  `gallery_photo_id` int(11) NOT NULL,
  `gallery_photo_name` varchar(200) NOT NULL,
  `gallery_photo_token` varchar(100) NOT NULL,
  `gallery_id` int(11) NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_web_gallery_photo`
--

INSERT INTO `tbl_web_gallery_photo` (`gallery_photo_id`, `gallery_photo_name`, `gallery_photo_token`, `gallery_id`, `createtime`) VALUES
(19, 'photo-2-20210611190214-8120.png', 'token-20210611190205-0.2128556498343348', 2, '2021-06-11 19:02:14'),
(20, 'photo-1-20210611190252-1850.png', 'token-20210611190247-0.7843863151726149', 1, '2021-06-11 19:02:52'),
(21, 'photo-2-20210611190716-6055.png', 'token-20210611190712-0.6079270910029597', 2, '2021-06-11 19:07:16'),
(22, 'photo-2-20210611190722-2313.png', 'token-20210611190719-0.4930588848195715', 2, '2021-06-11 19:07:22'),
(23, 'photo-2-20210611190725-8204.png', 'token-20210611190719-0.6381562621644137', 2, '2021-06-11 19:07:25'),
(30, 'photo-11-20221214164534-5191.jpg', 'token-20221214164524-0.148589419852724', 11, '2022-12-14 16:45:34'),
(31, 'photo-11-20221214164534-8914.jpg', 'token-20221214164524-0.6227664395895876', 11, '2022-12-14 16:45:34'),
(32, 'photo-11-20221214164534-8406.jpg', 'token-20221214164524-0.8813841756315524', 11, '2022-12-14 16:45:34'),
(33, 'photo-11-20221214164534-9395.jpg', 'token-20221214164524-0.2551622686980046', 11, '2022-12-14 16:45:34'),
(34, 'photo-12-20221214170358-9336.jpg', 'token-20221214170345-0.8373024805566123', 12, '2022-12-14 17:03:58'),
(35, 'photo-12-20221214170358-2350.jpg', 'token-20221214170345-0.5447303128431589', 12, '2022-12-14 17:03:58'),
(36, 'photo-13-20221214170747-9187.jpg', 'token-20221214170743-0.4812185945200729', 13, '2022-12-14 17:07:47'),
(37, 'photo-14-20221214171039-4896.jpg', 'token-20221214171028-0.009942058756648997', 14, '2022-12-14 17:10:39'),
(38, 'photo-14-20221214171039-2333.jpg', 'token-20221214171028-0.04519317278822976', 14, '2022-12-14 17:10:39'),
(39, 'photo-14-20221214171039-1400.jpg', 'token-20221214171028-0.8173875624090434', 14, '2022-12-14 17:10:39'),
(40, 'photo-14-20221214171039-9402.jpg', 'token-20221214171028-0.3003723128728548', 14, '2022-12-14 17:10:39'),
(41, 'photo-14-20221214171039-8220.jpg', 'token-20221214171028-0.3495412789611394', 14, '2022-12-14 17:10:39'),
(42, 'photo-14-20221214171039-6692.jpg', 'token-20221214171028-0.9253418415273951', 14, '2022-12-14 17:10:39'),
(43, 'photo-14-20221214171040-2032.jpg', 'token-20221214171028-0.37542138505430334', 14, '2022-12-14 17:10:40'),
(44, 'photo-14-20221214171040-8528.jpg', 'token-20221214171028-0.6796747599869553', 14, '2022-12-14 17:10:40'),
(45, 'photo-15-20221214171413-8745.jpg', 'token-20221214171409-0.21742870393824676', 15, '2022-12-14 17:14:13'),
(46, 'photo-15-20221214171419-4995.jpg', 'token-20221214171409-0.870376589524247', 15, '2022-12-14 17:14:19'),
(47, 'photo-15-20221214171420-5564.jpg', 'token-20221214171409-0.258269611483553', 15, '2022-12-14 17:14:20'),
(48, 'photo-16-20221214171557-4059.jpg', 'token-20221214171550-0.9318769897639498', 16, '2022-12-14 17:15:57'),
(49, 'photo-16-20221214171557-9714.jpg', 'token-20221214171550-0.3369665042243464', 16, '2022-12-14 17:15:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_web_link`
--

CREATE TABLE `tbl_web_link` (
  `link_id` int(11) NOT NULL,
  `link_name` varchar(50) NOT NULL,
  `link_url` text NOT NULL,
  `link_image` text NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_web_link`
--

INSERT INTO `tbl_web_link` (`link_id`, `link_name`, `link_url`, `link_image`, `createtime`) VALUES
(1, 'Kota Kendari', 'https://www.kendarikota.go.id/', 'link-20221130132149.png', '2022-11-10 16:38:00'),
(2, 'BPJS Kesehatan', 'https://bpjs-kesehatan.go.id/bpjs/', 'link-20221130132603.png', '2022-11-10 16:39:39'),
(3, 'e-medicord', 'http://www.e-medicord.co.id/', 'link-20221130134408.svg', '2022-11-10 16:39:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_web_message`
--

CREATE TABLE `tbl_web_message` (
  `message_id` int(11) NOT NULL,
  `message_name` varchar(100) NOT NULL,
  `message_phone` varchar(20) NOT NULL,
  `message_email` varchar(100) NOT NULL,
  `message_subject` varchar(100) NOT NULL,
  `message_text` text NOT NULL,
  `message_reply` text NOT NULL,
  `message_code` varchar(50) NOT NULL,
  `message_status` int(11) NOT NULL,
  `message_date` date NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_web_message`
--

INSERT INTO `tbl_web_message` (`message_id`, `message_name`, `message_phone`, `message_email`, `message_subject`, `message_text`, `message_reply`, `message_code`, `message_status`, `message_date`, `createtime`) VALUES
(1, 'Indrawijaya Latif', '081234567890', 'indra027@gmail.com', 'Permintaan Data', 'Bolehkah saya meminta data mengenai produk Hukum A ?', 'Silahkan datang ke kantor kami untuk mengambil data produk Hukum A, Terimakasih', 'M-20210612085700', 1, '2021-06-12', '2021-06-12 08:57:00'),
(2, 'Indrawijaya Latif', '081234567890', 'indra027@gmail.com', 'Permintaan Data', 'Bolehkah saya meminta data mengenai produk Hukum B ?', 'Silhakan datang ke kantor', 'M-20210612085804', 1, '2021-06-12', '2021-06-12 08:58:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_web_news`
--

CREATE TABLE `tbl_web_news` (
  `news_id` int(11) NOT NULL,
  `news_title` varchar(200) NOT NULL,
  `news_cover` varchar(50) NOT NULL,
  `news_text` text NOT NULL,
  `news_date` date NOT NULL,
  `news_count_view` int(11) NOT NULL,
  `news_slug` text NOT NULL,
  `news_category_id` int(11) NOT NULL,
  `field_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_web_news`
--

INSERT INTO `tbl_web_news` (`news_id`, `news_title`, `news_cover`, `news_text`, `news_date`, `news_count_view`, `news_slug`, `news_category_id`, `field_id`, `user_id`, `createtime`) VALUES
(5, 'Kasus Gagal Ginjal Akut Pada Anak Meningkat, Orang Tua Diminta Waspada', 'thumbnailnews-20221214173750.jpeg', '<p>Kasus gagal ginjal akut yang menyerang anak-anak usia 6 bulan-18 tahun terjadi peningkatan terutama dalam dua bulan terakhir. Per tanggal 18 Oktober 2022 sebanyak 189 kasus telah dilaporkan, paling banyak didominasi usia 1-5 tahun.</p>\r\n<p>&nbsp;</p>\r\n<p>Seiring dengan peningkatan tersebut, Kemenkes meminta orang tua untuk tidak panik, tenang namun selalu waspada. Terutama apabila anak mengalami gejala yang mengarah kepada gagal ginjal akut seperti ada diare, mual ,muntah, demam selama 3-5 hari, batuk, pilek, sering mengantuk serta jumlah air seni/air kecil semakin sedikit bahkan tidak bisa buang air kecil sama sekali.</p>\r\n<p>&nbsp;</p>\r\n<p>&ldquo;Orang tua harus selalu hati-hati, pantau terus kesehatan anak-anak kita, jika anak mengalami keluhan yang mengarah kepada penyakit gagal ginjal akut, sebaiknya segera konsultasikan ke tenaga kesehatan jangan ditunda atau mencari pengobatan sendiri,&rdquo; kata Plt. Direktur Pelayanan Kesenatan Rujukan dr. Yanti Herman, MH. Kes.</p>\r\n<p>&nbsp;</p>\r\n<p>Pastikan bila anak sakit cukupi kebutuhan cairan tubuhnya dengan minum air. Lebih lanjut, gejala lain yang juga perlu diwaspadai orang tua adalah perubahan warna pada urine (pekat atau kecoklatan). Bila warna urine berubah dan volume urine berkurang, bahkan tidak ada urine selama 6-8 jam (saat siang hari), orang tua diminta segera membawa anak ke fasilitas pelayanan kesehatan terdekat untuk mendapatkan penanganan lebih lanjut.</p>\r\n<p>&nbsp;</p>\r\n<p>Sampai saat ini kasus gagal ginjal akut pada anak belum diketahui secara pasti penyebabnya, untuk itu pemerintah bersama Ikatan Dokter Anak Indonesia (IDAI) dan tim dokter RS Cipto Mangunkusumo (RSCM) membentuk satu tim yang bertugas untuk mengamati dan menyelidiki kasus gangguan ginjal akut pada anak.</p>\r\n<p>&nbsp;</p>\r\n<p>Dari data yang ada gejala yang muncul di awal adalah terkait infeksi saluran cerna yang utama untuk itu Kemkes menghimbau sebagai upaya pencegahan agar orang tua tetap memastikan perilaku hidup bersih dan sehat tetap diterapkan, pastikan cuci tangan tetap diterapkan, makan makanan yang bergizi seimbang, tidak jajan sembarangan, minum air matang dan pastikan imunisasi anak rutin dan lanjuti dilengkapi.</p>\r\n<p>&nbsp;</p>\r\n<p>Selain itu, Kemenkes juga telah menerbitkan Surat Keputusan Direktur Jenderal Pelayanan Kesehatan Nomor HK.02.02./2/I/3305/2022 tentang Tata Laksana dan Managemen Klinis Gangguan Ginjal Akut Progresif Atipikal (Atypical Progressive Acute Kidney Injury) Pada Anak di Fasilitas Pelayanan Kesehatan sebagai bagian peningkatan kewaspadaan.</p>\r\n<p>&nbsp;</p>\r\n<p>Surat keputusan ini memuat serangkaian kegiatan yang dilakukan oleh tenaga medis dan tenaga kesehatan lain dalam melakukan penanganan terhadap pasien gagal ginjal akut sesuai dengan indikasi medis.</p>\r\n<p>&nbsp;</p>\r\n<p>&ldquo;Belajar dari pandemi COVID-19, pemerintah tentu tidak bisa bekerja sendiri. Sinergi dan kolaborasi dari seluruh pihak sangat diperlukan untuk mencegah agar penyakit ini bisa di cegah sedini mungkin. Karenanya kami mengimbau kepada Dinas Kesehatan, rumah sakit maupun pintu masuk negara agar segera melaporkan apabila ada indikasi kasus yang mengarah kepada gagal ginjal akut maupun penyakit lain yang berpotensi mengalami KLB,&rdquo; imbuh dr. Yanti</p>\r\n<p>&nbsp;</p>\r\n<p>Sumber : <em>https://sehatnegeriku.kemkes.go.id/baca/rilis-media/20221017/3141288/kasus-gagal-ginjal-akut-pada-anak-meningkat-orang-tua-diminta-waspada/</em></p>', '2022-12-14', 0, 'kasus-gagal-ginjal-akut-pada-anak-meningkat-orang-tua-diminta-waspada', 1, 1, 1, '2022-12-14 17:37:50'),
(6, 'Sepanjang 2022, 6 Anak di Sukabumi Meninggal Akibat HIV/AIDS', 'thumbnailnews-20221214174353.jpeg', '<p>Kasus HIV/AIDS pada anak di Kabupaten Sukabumi mengalami peningkatan. Pada 2021 lalu, Komisi Penanggulangan AIDS Kabupaten Sukabumi mencatat ada 34 anak terpapar, sedangkan pada 2022 tercatat ada 42 anak positif dan enam di antaranya meninggal dunia.</p>\r\n<p>Hal itu disampaikan oleh Kepala Sekretariat KPA Kabupaten Sukabumi Dadang Sucipta. Dia mengatakan, anak-anak yang terpapar itu mulai dari usia 18 bulan hingga usia 12 tahun.</p>\r\n<p>&nbsp;</p>\r\n<p>\"Dari 42 anak yang ODHA (orang dengan HIV/AIDS) enam anak di antaranya sudah meninggal dunia sepanjang tahun 2022. Dari usia 18 bulan sampai usia 12 tahun (SMP), kalau sudah SMA masuknya kategori dewasa,\" kata Dadang kepada detikJabar, Rabu (14/12/2022).</p>\r\n<p>&nbsp;</p>\r\n<p>Dia mengungkapkan, rata-rata anak di Kabupaten Sukabumi terpapar HIV/AIDS dari ibunya. Kemudian, tak sedikit orang tua dari anak-anak itu meninggal dunia karena HIV.</p>\r\n<p>&nbsp;</p>\r\n<p>\"Mayoritas kebanyakan tertular dari ibunya, ada banyak yang sudah yatim, dan ada juga yang piatu. Jadi ibu bapaknya sudah meninggal karena HIV,\" ujarnya.</p>\r\n<p>&nbsp;</p>\r\n<p>Dia menjelaskan, penanganan pada ODHA dewasa dan anak-anak tak jauh berbeda. Mereka tetap diwajibkan mengkonsumsi obat antiretroviral (ARV) setiap hari dan berperilaku hidup sehat. Hanya saja, kata dia, ada pendekatan khusus terutama dari psikologis anak-anak ODHA.</p>\r\n<p>&nbsp;</p>\r\n<p>\"Berbeda pendekatannya, contoh makan obat bagi anak ODHA harus ada pengawas, kalau tidak sama orang tua, neneknya, bibinya. Ya ada pendampingan psikolog buat anak, kalau balita selain obat harus minum susu formula jangan ASI,\" sambungnya.</p>\r\n<p>&nbsp;</p>\r\n<p>Pihaknya mencatat, anak dengan HIV/AIDS yang meninggal dunia terjadi di Kecamatan Bojonggenteng. Anak tersebut tidak mendapatkan pengawasan dalam mengkonsumsi obat.</p>\r\n<p>&nbsp;</p>\r\n<p>\"Terakhir yang meninggal di Bojonggenteng. Nah Bojonggenteng orang tuanya sudah tidak ada dan diurus sama orang lain. Namanya orang lain kan tidak dapat terus mengawasi anak. Jadi harus ada PMO (pengawas minum obat) dari keluarga, minumnya harus rutin, kalau jam 20:00 ya jam segitu setiap hari,\" ungkapnya.</p>\r\n<p>&nbsp;</p>\r\n<p>Para anak dengan HIV/AIDS didapat dari tracing keluarganya. Pihaknya menyebut, kegiatan tracing secara aktif dilakukan untuk penanganan lebih cepat</p>\r\n<p>&nbsp;</p>\r\n<p>Baca artikel detikjabar, \"Sepanjang 2022, 6 Anak di Sukabumi Meninggal Akibat HIV/AIDS\" selengkapnya https://www.detik.com/jabar/berita/d-6460501/sepanjang-2022-6-anak-di-sukabumi-meninggal-akibat-hivaids.</p>', '2022-12-14', 0, 'sepanjang-2022-6-anak-di-sukabumi-meninggal-akibat-hivaids', 1, 1, 1, '2022-12-14 17:43:53'),
(7, 'Viral Ibu Muda Meninggal Usai Melahirkan Anak ke-10, Ini Pemicunya', 'thumbnailnews-20221214174902.jpeg', '<p>Melahirkan terlalu sering tidak hanya berbahaya bagi ibu, tetapi juga bayi yang dikandungnya. Hal ini terjadi pada seorang ibu di Malaysia yang meninggal dunia setelah melahirkan anaknya yang ke-10.</p>\r\n<p>Ibu yang bernama Nur Zaihan Abdul Halim menghembuskan napas terakhirnya di Hospital Universiti Kebangsaan Malaysia (HUKM). Nur Zaihan disebutkan meninggal dunia di usia yang masih muda, baru 33 tahun.</p>\r\n<p>&nbsp;</p>\r\n<p>\"Dia meninggal setelah melahirkan anaknya yg ke 10. Baby dapat diselamatkan dan dilahirkan 32 minggu dan masih admit di NICU HUKM,\" demikian dilaporkan oleh Penang Netizen.</p>\r\n<p>&nbsp;</p>\r\n<p>Laman Mingguan Wanita melaporkan Nur Zaihan meninggal karena komplikasi plasenta tahap ke-4 setelah menjalani operasi caesar sebanyak 8 kali. Perlengketan plasenta membuatnya mengalami pendarahan hebat berujung kematian.</p>\r\n<p>&nbsp;</p>\r\n<p>Spesialis obgyn dari Pusat Perubatan Price Court Malaysia dr Maiza Tusimin mengatakan risiko kehamilan dan persalinan kian tinggi jika wanita terlalu sering melahirkan. Ia juga menyebut operasi caesar maksimal 3 kali sebab banyak risiko yang bisa terjadi jika dilakukan lebih dari itu.</p>\r\n<p>&nbsp;</p>\r\n<p>\"Meski perlengkapan lengkap apalagi jika di RS kerajaan, yang dikhawatirkan adalah jika ada perlekatan plasenta. Kalau ada perlekatan pada rahim, akan terjadi pendarahan,\" ujarnya.</p>\r\n<p>&nbsp;</p>\r\n<p>\"Dalam kasus ibu muda ini, mungkin dia sudah pendarahan ketika di rumah dan sampai di RS sudah telat,\" tambahnya.</p>\r\n<p>&nbsp;</p>\r\n<p>Terlalu sering melahirkan bisa memberi dampak buruk bagi seorang ibu sehingga risiko kematian menjadi lebih meningkat. Jika terlalu sering melahirkan kemungkinan terjadi pendarahan saat persalinan. Perdarahan terjadi akibat kegagalan berkontraksi rahim atau biasa disebut perdarahan pasca persalinan.</p>\r\n<p>&nbsp;</p>\r\n<p>Baca artikel detikHealth, \"Viral Ibu Muda Meninggal Usai Melahirkan Anak ke-10, Ini Pemicunya\" selengkapnya <em>https://health.detik.com/berita-detikhealth/d-6460464/viral-ibu-muda-meninggal-usai-melahirkan-anak-ke-10-ini-pemicunya.</em></p>', '2022-12-14', 0, 'viral-ibu-muda-meninggal-usai-melahirkan-anak-ke-10-ini-pemicunya', 1, 1, 1, '2022-12-14 17:49:02'),
(8, 'Bos Bio Farma Buka-bukaan Stok Vaksin COVID-19 Jelang Akhir Tahun, Aman ?', 'thumbnailnews-20221214175153.jpeg', '<p>Seiring lonjakan kasus COVID-19 dalam beberapa waktu terakhir imbas subvarian Omicron XBB dan BQ,1, Indonesia sempat diterpa kabar kelangkaan stok vaksin COVID-19. Lantas kini menjelang momen libur Natal dan Tahun Baru yang rentan memicu kenaikan kasus, seperti apa stok vaksin di RI?</p>\r\n<p>Direktur Utama Bio Farma, Honesti Basyir, menyebut hingga kini pihaknya telah menyiapkan stok vaksin COVID-19 menjelang akhir tahun. Total sudah terdapat 9 juta vaksin diproduksi, dibarengi 800 ribu dosis vaksin COVID-19 produksi dalam negeri yakni IndoVac.</p>\r\n<p>&nbsp;</p>\r\n<p>\"(Stok vaksin COVID-19 menjelang akhir tahun) nggak masalah. Stok kita sudah nyiapin, kita sudah produksi sampai kemarin 9 juta dosis,\" ungkapnya saat ditemui detikcom di kawasan Jakarta Selatan, Selasa (13/12/2022).</p>\r\n<p>&nbsp;</p>\r\n<p>\"Proses rilis juga, kita sudah distribusikan yang IndoVac itu 800 ribu bertahap sesuai permintaan Kementerian Kesehatan, kita akan lakukan baik produksi maupun distribusi nanti,\" sambung Honesti.</p>\r\n<p>&nbsp;</p>\r\n<p>Lebih lanjut ia menegaskan, dirinya sama sekali tidak mengkhawatirkan perihal ketersediaan stok vaksin COVID-19 menjelang momen akhir tahun.</p>\r\n<p>&nbsp;</p>\r\n<p>\"Saya no issue masalah stok karena kita tadi saya bilang kita tinggal berapa hari. Kita sudah punya sampai 9 juta tapi proses rilis juga bertahap sesuai permintaan Kemenkes dan didiskusikan,\" pungkasnya</p>\r\n<p>&nbsp;</p>\r\n<p>Baca artikel detikHealth, \"Bos Bio Farma Buka-bukaan Stok Vaksin COVID-19 Jelang Akhir Tahun, Aman?\" selengkapnya <em>https://health.detik.com/berita-detikhealth/d-6461048/bos-bio-farma-buka-bukaan-stok-vaksin-covid-19-jelang-akhir-tahun-aman.</em></p>', '2022-12-14', 0, 'bos-bio-farma-buka-bukaan-stok-vaksin-covid-19-jelang-akhir-tahun-aman', 1, 1, 1, '2022-12-14 17:51:53'),
(9, 'Heboh Bjorka Bocorkan Data PeduliLindungi, Kemenkes Buka Suara', 'thumbnailnews-20221214175726.jpeg', '<p>Kementerian Kesehatan RI buka suara terkait bocornya data PeduliLindungi yang diklaim Bjorka yakni sebanyak 2,3 miliar rupiah. Juru bicara Kemenkes RI Mohammad Syahril menekankan pemerintah sudah mengetahui isu kebocoran tersebut.</p>\r\n<p>Kemenkes RI tengah melakukan investigasi lanjut berkoordinasi dengan Badan Siber dan Sandi Negara (BSSN), PT Telkom, dan beragam pihak lain.</p>\r\n<p>&nbsp;</p>\r\n<p>\"Kementerian Kesehatan telah mengetahui adanya isu di media sosial terkait dugaan peretasan data pengguna Peduli Lindungi oleh pihak yang tidak bertanggung jawab, \" kata dia dalam keterangan tertulis, Kamis (17/11/2022).</p>\r\n<p>&nbsp;</p>\r\n<p>Sembari menunggu hasil investigasi lanjut, Syahril mengimbau agar masyarakat tidak panik. Syahril juga menekankan publik untuk menghindari penyalahgunaan data yang berasal dari pihak tidak bertanggung jawab.</p>\r\n<p>&nbsp;</p>\r\n<p>Isu yang beredar yakni Bjorka disebut kembali membocorkan data miliarsn pengguna aplikasi PeduliLindungi. Bjorka membocorkan 48 gigabyte data yang disebut terkompresi, 175 gigabyte data tidak terkompresi dengan total 3.250.144.777 data.</p>\r\n<p>&nbsp;</p>\r\n<p>Data tersebut disebut bocor dengan format CSV yang terdiri dari email, NIK, phone number, device ID, COVID-19 status, check in history, contact tracing sampai vaccination. Bjorka mengunggah sampek bocoran data milik Menkominfo Johnny G Plate dan Menkomarinves Luhut Binsar Pandjaitan, hingga Youtuber Deddy Corbuzier.</p>\r\n<p>&nbsp;</p>\r\n<p>Baca artikel detikHealth, \"Heboh Bjorka Bocorkan Data PeduliLindungi, Kemenkes Buka Suara\" selengkapnya https://health.detik.com/berita-detikhealth/d-6410977/heboh-bjorka-bocorkan-data-pedulilindungi-kemenkes-buka-suara.</p>', '2022-12-14', 0, 'heboh-bjorka-bocorkan-data-pedulilindungi-kemenkes-buka-suara', 1, 1, 1, '2022-12-14 17:57:26'),
(10, 'Kebocoran Data PeduliLindungi oleh Hacker Bjorka Dinilai Valid', 'thumbnailnews-20221214180022.jpeg', '<p>Hacker Bjorka kembali beraksi dan mengklaim menjual data PeduliLindungi. Kobocoran data dinilai valid.</p>\r\n<p>Hal itu adalah analisa Alfons Tanujaya dari Vaksincom. Dia menyayangkan pihak pengelola data yang dia nilai lengah.</p>\r\n<p>&nbsp;</p>\r\n<p>\"Datanya kemungkinan besar valid dan memang menjadi pertanyaan besar, kok database sebesar itu bisa bocor? Harusnya pihak pengelola data memiliki recordnya siapa yang bisa mengakses dan bagaimana ceritanya datanya bisa bocor,\" kata Alfons kepada detikINET, Rabu (16/11/2022).</p>\r\n<p>&nbsp;</p>\r\n<p>Menurut Alfons, kalau memang menerapkan ISO 27001 dengan baik, akan ketahuan datanya bocor dari mana dan agar dilakukan mitigasi. Alfons juga mempertanyakan kenapa data tidak dienskripsi.</p>\r\n<p>&nbsp;</p>\r\n<p>\"Harusnya kolom tertentu yang penting untuk mengidentifikasi pemilik data dienkripsi. Seperti kolom nama, NIK dan nomor telepon. Sehingga sekalipun datanya bocor itu akan lebih sulit dieksploitasi atau diperjualbelikan,\" ujar Alfons.</p>\r\n<p>&nbsp;</p>\r\n<p>Bjorka kali ini mengklaim kalau datanya didapatkan pada November 2022. Ini jadi pertanyaan besar, apakah badan publik yang mengelola big data yang sedemikian besar dan penting kok sebegitunya memperlakukan data asal-asalan.</p>\r\n<p>&nbsp;</p>\r\n<p>\"Jadi harusnya data yang dikelola itu adalah amanah, tetapi ini kemungkinan dianggap berkah atau beban yang tidak perlu dilindungi dengan baik,\" kritik Alfons.</p>\r\n<p>&nbsp;</p>\r\n<p>Data penting PeduliLindungi yang bocor dan berpotensi merugikan pemilik data adalah nama, NIK, nomor telepon, tanggal lahir, checkin history dan status COVID-19. Alfons menegaskan dalam hal ini masyarakat adalah korbannya.</p>\r\n<p>&nbsp;</p>\r\n<p>\"Yang memiliki data itu jadi korban dan mengalami kerugian terbesar dalam kebocoran data. Pengelola data paling maksimal dapat malu dan dicap tidak becus kelola data,\" kata dia.</p>\r\n<p>&nbsp;</p>\r\n<p>Baca artikel detikinet, \"Kebocoran Data PeduliLindungi oleh Hacker Bjorka Dinilai Valid\" selengkapnya <em>https://inet.detik.com/security/d-6409046/kebocoran-data-pedulilindungi-oleh-hacker-bjorka-dinilai-valid.</em></p>', '2022-12-14', 1, 'kebocoran-data-pedulilindungi-oleh-hacker-bjorka-dinilai-valid', 1, 1, 1, '2022-12-14 18:00:22'),
(11, 'Kebocoran Data MyPertamina oleh Bjorka, Pakar: Sudah Saatnya Dibentuk Lembaga PDP', 'thumbnailnews-20221214185257.png', '<p>Pakar keamanan siber Pratama Persadha menyebut dugaan kebocoran data 44 juta data MyPertamina oleh Bjorka menjadi sinyal genting untuk segera membentuk lembaga otoritas Pelindungan Data Pribadi (PDP).</p>\r\n<p>Setelah disahkannya Undang-Undang Pelindungan Data Pribadi (UU PDP) diamanatkan agar pemerintah membentuk lembaga otoritas PDP yang bertugas mengawasi pengelolaan data pribadi oleh penyelenggara sistem elektronik, baik pemerintah dan swasta agar memenuhi kriteria UU PDP.</p>\r\n<p>&nbsp;</p>\r\n<p>\"Saat ini yang terpenting adalah segera membentuk lembaga pengawas PDP atau apapun namanya, Komisi PDP misalnya. Ini sudah diamanatkan UU PDP agar presiden membentuk Komisi PDP segera setelah UU berlaku,\" ujar Chairman CISSReC ini seperti keterangan tertulis yang diterima detikINET, Sabtu (12/11/2022).</p>\r\n<p>&nbsp;</p>\r\n<p>\"Komisi PDP ini nanti yang tidak hanya mengawasi namun juga melakukan penegakan aturan serta menciptakan standar keamanan tertentu dalam proses pengolahan pemrosesan data. Dalam kasus kebocoran data seperti MyPertamina ini, bila ada masyarakat yang dirugikan bisa nantinya melakukan gugatan lewat Komisi PDP,\" sambungnya.</p>\r\n<p>&nbsp;</p>\r\n<p>Kebocoran data 44 juta data MyPertamina diumbar oleh Bjorka di forum situs breached.to yang isinya terdiri dari nama, email, NIK, NPWP, nomor telepon, alamat, DOB, jenis kelamin, penghasilan, data pembelian BBM, dan data lainnya.</p>\r\n<p>&nbsp;</p>\r\n<p>Pratama mengemukakan, data yang diklaim oleh Bjorka berjumlah 44.237.264 baris dengan total ukuran mencapai 30GB bila dalam keadaan tidak dikompres. Data sampelnya dibagi menjadi 2 file yaitu data transaksi dan data akun pengguna. Ketika sampel datanya dicek secara acak dengan aplikasi \"GetContact\", maka nomor tersebut benar menunjukan nama dari pemilik nomor tersebut.</p>\r\n<p>&nbsp;</p>\r\n<p>Selain itu dicek NIK lewat aplikasi Dataku juga cocok. Berarti sampel data yang diberikan oleh Bjorka merupakan data yang valid.</p>\r\n<p>&nbsp;</p>\r\n<p>Adapun, data yang berjumlah 44 juta ini dijual dengan harga USD 25.000 atau sekitar Rp 400 juta menggunakan menggunakan mata uang Bitcoin.</p>\r\n<p>&nbsp;</p>\r\n<p>\"Sampai saat ini sumber datanya masih belum jelas, Namun soal asli atau tidaknya data ini ya hanya Pertamina sendiri yang bisa menjawabnya, karena aplikasi ini dibuat oleh Pertamina yang juga memiliki dan menyimpan data ini. Jalan terbaik harus dilakukan audit dan investigasi digital forensic untuk memastikan kebocoran data ini dari mana\", jelas pria asal Cepu, Jawa Tengah ini.</p>\r\n<p>&nbsp;</p>\r\n<p>Disampaikannya, perlu dicek dahulu sistem informasi dari aplikasi MyPertamina yang datanya dibocorkan oleh Bjorka. Apabila ditemukan lubang keamanan, berarti kemungkinan besar memang terjadi peretasan dan pencurian data.</p>\r\n<p>&nbsp;</p>\r\n<p>Namun dengan pengecekan yang menyeluruh dan digital forensic, bila benar-benar tidak ditemukan celah keamanan dan jejak digital peretasan, ada kemungkinan kebocoran data ini terjadi karena insider atau data ini bocor oleh orang dalam.</p>\r\n<p>&nbsp;</p>\r\n<p>\"Bila benar ini data MyPertamina, maka berlaku pada Pasal 46 UU PDP ayat 1 dan 2, yang isinya bahwa dalam hal terjadi kegagalan perlindungan data pribadi maka pengendali data pribadi wajib menyampaikan pemberitahuan secara tertulis, paling lambat 3 x 24 jam. Pemberitahuan itu disampaikan kepada subyek data pribadi dan Lembaga Pelaksana Pelindungan Data Pribadi (LPPDP). Pemberitahuan minimal harus memuat data pribadi yang terungkap, kapan dan bagaimana data pribadi terungkap, dan upaya penanganan dan pemulihan atas terungkapnya oleh pengendali data pribadi\", tuturnya.</p>\r\n<p>&nbsp;</p>\r\n<p>Melihat kasus ini, menurut Pratama, Presiden Joko Widodo (Jokowi) harus segera membentuk lembaga otoritas PDP.</p>\r\n<p>&nbsp;</p>\r\n<p>Baca artikel detikinet, \"Kebocoran Data MyPertamina oleh Bjorka, Pakar: Sudah Saatnya Dibentuk Lembaga PDP\" selengkapnya <em>https://inet.detik.com/security/d-6401996/kebocoran-data-mypertamina-oleh-bjorka-pakar-sudah-saatnya-dibentuk-lembaga-pdp.</em></p>', '2022-12-14', 1, 'kebocoran-data-mypertamina-oleh-bjorka-pakar-sudah-saatnya-dibentuk-lembaga-pdp', 1, 1, 1, '2022-12-14 18:46:36'),
(12, '8 Obat Asam Lambung Alami yang Efektif dan Gampang Dicari', 'thumbnailnews-20221214184948.jpeg', '<p>Di samping cara medis, khasiat obat asam lambung alami nyatanya tidak kalah efektif jika diterapkan dengan rutin. Cara ini pun bisa mengubah gaya hidup seseorang jadi lebih sehat dan fit.</p>\r\n<p>Asam lambung naik terkadang bisa jadi mimpi buruk oleh sebagian orang. Sebab, kondisinya menyebabkan rasa tidak nyaman di perut sampai-sampai mengganggu aktivitas sehari-hari. Dikutip dari Mayo Clinic, gejalanya tersebut bisa berupa:</p>\r\n<p>&nbsp;</p>\r\n<p>Mulas setelah makan</p>\r\n<p>Nyeri perut bagian atas atau dada</p>\r\n<p>Kesulitan menelan (disfagia)</p>\r\n<p>Batuk yang berkelanjutan</p>\r\n<p>Radang pita suara (laringitis)</p>\r\n<p>Sesak napas</p>\r\n<p>Salah satu bahan aktif yang kerap digunakan untuk mengobati masalah asam lambung naik adalah kalsium. Umumnya, bahan tersebut banyak ditemukan pada antisida yang dijual bebas di pasaran. Namun, jika gejala tidak reda juga, mungkin beberapa alternatif berikut dapat membantu.</p>\r\n<p>&nbsp;</p>\r\n<p>Obat Asam Lambung Alami</p>\r\n<p>Dikutip dari WebMD, berikut obat asam lambung alami:</p>\r\n<p>&nbsp;</p>\r\n<p>1. Jahe</p>\r\n<p>Jahe adalah obat alami untuk gangguan pencernaan karena dapat mengurangi asam lambung. Selain menghangatkan tubuh, rempah ini dapat menenangkan organ pencernaan. Caranya adalah rebus satu sampai dua ruas jari jaher dengan empas gelas air. Jika tidak ingin pahit, rebusan tersebut bisa ditambahkan dengan sedikit madu.</p>\r\n<p>&nbsp;</p>\r\n<p>2. Kayu Manis</p>\r\n<p>Kayu manis merupakan rempah yang diambil dari pohon genus cinnamomum. Kulit kayu ini berguna sebagai antasid alami untuk meningkatkan proses penyerapan dari sistem pencernaan.</p>\r\n<p>&nbsp;</p>\r\n<p>3. Pisang</p>\r\n<p>Menurut t Academy of Nutrition &amp; Dietetics, pisang dapat mencegah iritasi kerongkongan akibat asam lambung. Sebab, buah kuning ini memiliki kalium yang tinggi menyebabkannya bersifat basa. Jangan pilih pisang yang kurang matang karena mengandung banyak pati pemicu refluks asam bagi sebagian orang.</p>\r\n<p>&nbsp;</p>\r\n<p>4. Permen Karet</p>\r\n<p>Mungkin banyak orang bertanya-tanya mengapa bisa permen karet bisa jadi obat alami pereda asam lambung. Meski terdengar aneh, mengunyah permen karet bisa merangsang produksi air liur dan mendorong cairan lambung keluar dari kerongkongan.</p>\r\n<p>&nbsp;</p>\r\n<p>5. Susu</p>\r\n<p>Menggunakan susu untuk meredakan mulas sepertinya ide bagus. Sama halnya pisang, susu bersifat basa dan terasa menyejukkan saat diminum.</p>\r\n<p>&nbsp;</p>\r\n<p>Meski begitu, lemak yang terkadang dalam susu bisa memperburuk percernaan. Sebaiknya pilih susu rendah lemak setelah makan untuk mengontrol kesehatan lambung.</p>\r\n<p>&nbsp;</p>\r\n<p>6. Makanan Berserat</p>\r\n<p>Studi dari World Journal of Gastroenterology pada 2018 menyebut pasien dengan penyakit refluks asam non-erosif menunjukan penurunan gejala akibat refluks asam setelah mengonsumsi suplemen serat.</p>\r\n<p>&nbsp;</p>\r\n<p>Selain itu, serat membantu perut kenyang lebih lama. Akibatnya, seseorang jarang menyantap makan secara berlebihan dan menurunkan refluks asam.</p>\r\n<p>&nbsp;</p>\r\n<p>Akan tetapi, konsumsi terlalu banyak serat atau sekaligus bukanlah ide yang baik karena dapat meningkatkan tekanan di usus dan mungkin memperburuk gejala asam lambung. Makanan yang tinggi serat meliputi:</p>\r\n<p>&nbsp;</p>\r\n<p>Pepaya</p>\r\n<p>Kacang-kacangan</p>\r\n<p>Alpukat</p>\r\n<p>Apel</p>\r\n<p>Jagung popcorn</p>\r\n<p>7. Lidah Buaya</p>\r\n<p>Satu studi percontohan kecil pada 2015 menemukan bahwa minum 10 ml sirup lidah buaya setiap hari membantu mengurangi gejala GERD dan efeknya sebanding dengan obat ranitidine dan omeprazole. Sifat lidah buaya yang seperti gel dan tinggi antiinflamasi dapat membantu meredakan iritasi pada usus dan melindungi lapisan mukosa organ.</p>\r\n<p>&nbsp;</p>\r\n<p>8. Gula Merah</p>\r\n<p>Terakhir adalah gula merah. Dikarenakan sifatnya yang basa, gula merah cocok untuk mengurangi keasaman lambung. Tak hanya itu, gula merah juga mengandung magnesium tinggi sehingga bermanfaat untuk kinerja usus. Kita hanya perlu menghisap sepotong kecil gula merah untuk mendapatkan segudang manfaatnya.</p>\r\n<p>&nbsp;</p>\r\n<p>Agar lebih menarik, obat asam lambung alami bisa divariasikan dengan bahan lain. Namun, hindari bahan yang mengandung lemak dan bersifat asam, ya.</p>\r\n<p>&nbsp;</p>\r\n<p>Baca artikel detikHealth, \"8 Obat Asam Lambung Alami yang Efektif dan Gampang Dicari\" selengkapnya <em>https://health.detik.com/berita-detikhealth/d-6461312/8-obat-asam-lambung-alami-yang-efektif-dan-gampang-dicari.</em></p>', '2022-12-14', 0, '8-obat-asam-lambung-alami-yang-efektif-dan-gampang-dicari', 3, 1, 1, '2022-12-14 18:49:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_web_news_category`
--

CREATE TABLE `tbl_web_news_category` (
  `news_category_id` int(11) NOT NULL,
  `news_category_name` varchar(50) NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_web_news_category`
--

INSERT INTO `tbl_web_news_category` (`news_category_id`, `news_category_name`, `createtime`) VALUES
(1, 'Berita', '2021-06-10 12:15:50'),
(2, 'Agenda', '2021-06-10 12:15:54'),
(3, 'Artikel', '2021-06-10 12:15:58'),
(4, 'Pengumuman', '2021-06-10 12:16:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_web_slider`
--

CREATE TABLE `tbl_web_slider` (
  `slider_id` int(11) NOT NULL,
  `slider_title` varchar(50) NOT NULL,
  `slider_text` varchar(200) NOT NULL,
  `slider_image` varchar(50) NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_web_slider`
--

INSERT INTO `tbl_web_slider` (`slider_id`, `slider_title`, `slider_text`, `slider_image`, `createtime`) VALUES
(6, '', '', 'slider-20221214003210.png', '2022-12-14 00:32:10'),
(9, '', '', 'slider-20221214004529.png', '2022-12-14 00:45:29'),
(12, '', '', 'slider-20221127211604.jpg', '2022-11-27 21:16:04');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_dokter`
--
ALTER TABLE `tbl_dokter`
  ADD PRIMARY KEY (`dokter_id`);

--
-- Indeks untuk tabel `tbl_faq`
--
ALTER TABLE `tbl_faq`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indeks untuk tabel `tbl_group`
--
ALTER TABLE `tbl_group`
  ADD PRIMARY KEY (`group_id`);

--
-- Indeks untuk tabel `tbl_jns_key`
--
ALTER TABLE `tbl_jns_key`
  ADD PRIMARY KEY (`jns_key_id`);

--
-- Indeks untuk tabel `tbl_kepesertaan_pasien`
--
ALTER TABLE `tbl_kepesertaan_pasien`
  ADD PRIMARY KEY (`kepesertaan_pasien_id`);

--
-- Indeks untuk tabel `tbl_log`
--
ALTER TABLE `tbl_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indeks untuk tabel `tbl_pasien`
--
ALTER TABLE `tbl_pasien`
  ADD PRIMARY KEY (`pasien_id`),
  ADD KEY `constraint_fktbl_pasien_kepesertaan_pasien_id` (`kepesertaan_pasien_id`),
  ADD KEY `constraint_fktbl_pasien_status_pasien_id` (`status_pasien_id`),
  ADD KEY `constraint_fktbl_pasien_jns_key_id` (`jns_key_id`);

--
-- Indeks untuk tabel `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD PRIMARY KEY (`pegawai_id`);

--
-- Indeks untuk tabel `tbl_poliklinik`
--
ALTER TABLE `tbl_poliklinik`
  ADD PRIMARY KEY (`poliklinik_id`);

--
-- Indeks untuk tabel `tbl_rm_pemeriksaan_odontogram`
--
ALTER TABLE `tbl_rm_pemeriksaan_odontogram`
  ADD PRIMARY KEY (`pemeriksaan_odontogram_id`),
  ADD KEY `constraint_fktbl_rm_po_dokter_id` (`dokter_id`),
  ADD KEY `constraint_fktbl_rm_po_user_id` (`user_id`),
  ADD KEY `constraint_fktbl_rm_po_pasien_id` (`pasien_id`),
  ADD KEY `constraint_fktbl_rm_po_jns_key_id` (`jns_key_id`);

--
-- Indeks untuk tabel `tbl_rm_pengkajian_awal`
--
ALTER TABLE `tbl_rm_pengkajian_awal`
  ADD PRIMARY KEY (`pengkajian_awal_id`),
  ADD KEY `constraint_fktbl_rm_pa_pegawai_id` (`pegawai_id`) USING BTREE,
  ADD KEY `constraint_fkpa_rm_pengkajian_awal` (`pasien_id`),
  ADD KEY `constraint_fkpa_jns_key_id` (`jns_key_id`),
  ADD KEY `constraint_fkpa_user_id` (`user_id`);

--
-- Indeks untuk tabel `tbl_rm_riwayat_kunjungan_pasien`
--
ALTER TABLE `tbl_rm_riwayat_kunjungan_pasien`
  ADD PRIMARY KEY (`riwayat_kunjungan_pasien_id`),
  ADD KEY `constraint_fktbl_rm_rkp_dokter_id` (`dokter_id`),
  ADD KEY `constraint_fktbl_rm_rkp_poliklinik_id` (`poliklinik_id`),
  ADD KEY `constraint_fktbl_rm_rkp_user_id` (`user_id`),
  ADD KEY `constraint_fktbl_rm_rkp_pasien_id` (`pasien_id`),
  ADD KEY `constraint_fktbl_rm_rkp_jns_key_id` (`jns_key_id`);

--
-- Indeks untuk tabel `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indeks untuk tabel `tbl_status_pasien`
--
ALTER TABLE `tbl_status_pasien`
  ADD PRIMARY KEY (`status_pasien_id`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indeks untuk tabel `tbl_web_content`
--
ALTER TABLE `tbl_web_content`
  ADD PRIMARY KEY (`content_id`);

--
-- Indeks untuk tabel `tbl_web_field`
--
ALTER TABLE `tbl_web_field`
  ADD PRIMARY KEY (`field_id`);

--
-- Indeks untuk tabel `tbl_web_gallery`
--
ALTER TABLE `tbl_web_gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indeks untuk tabel `tbl_web_gallery_photo`
--
ALTER TABLE `tbl_web_gallery_photo`
  ADD PRIMARY KEY (`gallery_photo_id`);

--
-- Indeks untuk tabel `tbl_web_link`
--
ALTER TABLE `tbl_web_link`
  ADD PRIMARY KEY (`link_id`);

--
-- Indeks untuk tabel `tbl_web_message`
--
ALTER TABLE `tbl_web_message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indeks untuk tabel `tbl_web_news`
--
ALTER TABLE `tbl_web_news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indeks untuk tabel `tbl_web_news_category`
--
ALTER TABLE `tbl_web_news_category`
  ADD PRIMARY KEY (`news_category_id`);

--
-- Indeks untuk tabel `tbl_web_slider`
--
ALTER TABLE `tbl_web_slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_dokter`
--
ALTER TABLE `tbl_dokter`
  MODIFY `dokter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tbl_faq`
--
ALTER TABLE `tbl_faq`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_group`
--
ALTER TABLE `tbl_group`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_jns_key`
--
ALTER TABLE `tbl_jns_key`
  MODIFY `jns_key_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_kepesertaan_pasien`
--
ALTER TABLE `tbl_kepesertaan_pasien`
  MODIFY `kepesertaan_pasien_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_log`
--
ALTER TABLE `tbl_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=871;

--
-- AUTO_INCREMENT untuk tabel `tbl_pasien`
--
ALTER TABLE `tbl_pasien`
  MODIFY `pasien_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  MODIFY `pegawai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `tbl_poliklinik`
--
ALTER TABLE `tbl_poliklinik`
  MODIFY `poliklinik_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tbl_rm_pemeriksaan_odontogram`
--
ALTER TABLE `tbl_rm_pemeriksaan_odontogram`
  MODIFY `pemeriksaan_odontogram_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_rm_pengkajian_awal`
--
ALTER TABLE `tbl_rm_pengkajian_awal`
  MODIFY `pengkajian_awal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_rm_riwayat_kunjungan_pasien`
--
ALTER TABLE `tbl_rm_riwayat_kunjungan_pasien`
  MODIFY `riwayat_kunjungan_pasien_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_status_pasien`
--
ALTER TABLE `tbl_status_pasien`
  MODIFY `status_pasien_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_web_content`
--
ALTER TABLE `tbl_web_content`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_web_field`
--
ALTER TABLE `tbl_web_field`
  MODIFY `field_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_web_gallery`
--
ALTER TABLE `tbl_web_gallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tbl_web_gallery_photo`
--
ALTER TABLE `tbl_web_gallery_photo`
  MODIFY `gallery_photo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT untuk tabel `tbl_web_link`
--
ALTER TABLE `tbl_web_link`
  MODIFY `link_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_web_message`
--
ALTER TABLE `tbl_web_message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_web_news`
--
ALTER TABLE `tbl_web_news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tbl_web_news_category`
--
ALTER TABLE `tbl_web_news_category`
  MODIFY `news_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_web_slider`
--
ALTER TABLE `tbl_web_slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_pasien`
--
ALTER TABLE `tbl_pasien`
  ADD CONSTRAINT `constraint_fktbl_pasien_jns_key_id` FOREIGN KEY (`jns_key_id`) REFERENCES `tbl_jns_key` (`jns_key_id`),
  ADD CONSTRAINT `constraint_fktbl_pasien_kepesertaan_pasien_id` FOREIGN KEY (`kepesertaan_pasien_id`) REFERENCES `tbl_kepesertaan_pasien` (`kepesertaan_pasien_id`),
  ADD CONSTRAINT `constraint_fktbl_pasien_status_pasien_id` FOREIGN KEY (`status_pasien_id`) REFERENCES `tbl_status_pasien` (`status_pasien_id`);

--
-- Ketidakleluasaan untuk tabel `tbl_rm_pemeriksaan_odontogram`
--
ALTER TABLE `tbl_rm_pemeriksaan_odontogram`
  ADD CONSTRAINT `constraint_fktbl_rm_po_dokter_id` FOREIGN KEY (`dokter_id`) REFERENCES `tbl_dokter` (`dokter_id`),
  ADD CONSTRAINT `constraint_fktbl_rm_po_jns_key_id` FOREIGN KEY (`jns_key_id`) REFERENCES `tbl_jns_key` (`jns_key_id`),
  ADD CONSTRAINT `constraint_fktbl_rm_po_pasien_id` FOREIGN KEY (`pasien_id`) REFERENCES `tbl_pasien` (`pasien_id`),
  ADD CONSTRAINT `constraint_fktbl_rm_po_user_id` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`);

--
-- Ketidakleluasaan untuk tabel `tbl_rm_pengkajian_awal`
--
ALTER TABLE `tbl_rm_pengkajian_awal`
  ADD CONSTRAINT `constraint_fkpa_jns_key_id` FOREIGN KEY (`jns_key_id`) REFERENCES `tbl_jns_key` (`jns_key_id`),
  ADD CONSTRAINT `constraint_fkpa_pasien_id` FOREIGN KEY (`pasien_id`) REFERENCES `tbl_pasien` (`pasien_id`),
  ADD CONSTRAINT `constraint_fkpa_pegawai_id` FOREIGN KEY (`pegawai_id`) REFERENCES `tbl_pegawai` (`pegawai_id`),
  ADD CONSTRAINT `constraint_fkpa_user_id` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`);

--
-- Ketidakleluasaan untuk tabel `tbl_rm_riwayat_kunjungan_pasien`
--
ALTER TABLE `tbl_rm_riwayat_kunjungan_pasien`
  ADD CONSTRAINT `constraint_fktbl_rm_rkp_dokter_id` FOREIGN KEY (`dokter_id`) REFERENCES `tbl_dokter` (`dokter_id`),
  ADD CONSTRAINT `constraint_fktbl_rm_rkp_jns_key_id` FOREIGN KEY (`jns_key_id`) REFERENCES `tbl_jns_key` (`jns_key_id`),
  ADD CONSTRAINT `constraint_fktbl_rm_rkp_pasien_id` FOREIGN KEY (`pasien_id`) REFERENCES `tbl_pasien` (`pasien_id`),
  ADD CONSTRAINT `constraint_fktbl_rm_rkp_poliklinik_id` FOREIGN KEY (`poliklinik_id`) REFERENCES `tbl_poliklinik` (`poliklinik_id`),
  ADD CONSTRAINT `constraint_fktbl_rm_rkp_user_id` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
