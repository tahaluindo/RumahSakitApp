-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Nov 2022 pada 15.59
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
(1, 'dr. andin', 'Umum', 'Perempuan', 'dokter-20221130191354.png', '2022-11-10 18:48:05');

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
(1, 'Tes', 'Ya', '2022-11-30 02:23:27');

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
(6, 'Pengelola Berita', '2022-11-25 14:25:10');

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
(613, '2022-11-30 21:21:05', 'Muh. Fadjrul Falakh melakukan login ke sistem', '::1', 1, '2022-11-30 21:21:05');

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
  `tgl_lahir_pasien` date NOT NULL,
  `alamat_pasien` varchar(250) NOT NULL,
  `no_telp_pasien` varchar(200) DEFAULT NULL,
  `no_bpjs_pasien` varchar(200) DEFAULT NULL,
  `dw` varchar(128) DEFAULT NULL,
  `lw` varchar(128) DEFAULT NULL,
  `status_pasien_id` int(11) NOT NULL,
  `kepesertaan_pasien_id` int(11) NOT NULL,
  `jns_key_id` int(11) NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pasien`
--

INSERT INTO `tbl_pasien` (`pasien_id`, `no_rekam_medis`, `nama_pasien`, `nik_pasien`, `nama_kepala_keluarga`, `no_kk`, `jenis_kelamin`, `tgl_lahir_pasien`, `alamat_pasien`, `no_telp_pasien`, `no_bpjs_pasien`, `dw`, `lw`, `status_pasien_id`, `kepesertaan_pasien_id`, `jns_key_id`, `createtime`) VALUES
(1, '00001', 'Nazrudin Jafar', '7893467876590003', 'Wahyono suryo', '7093467876590000', 'Laki-laki', '1990-10-24', 'Jl.Laremba, no.50, Kadia', '085212045633', '238746530', '10', '20', 1, 2, 1, '2022-10-21 14:53:28'),
(2, '00002', 'La Sambo', '7093764297341089', 'La Pamal', '7993764297341081', 'Laki-laki', '1979-10-19', 'Jl. Balaikota', '089562778354', '123785630', '9', '21', 1, 1, 1, '2022-10-21 14:53:28'),
(3, '00003', 'Angga Fernanda', '7203846716253890', 'Sumara', '7003246716253890', 'Laki-laki', '2000-10-19', 'Jl. Laremba, no. 12, Kadia', '082134753900', '127639873', '12', '23', 1, 1, 1, '2022-10-26 10:37:53'),
(4, '00004', 'Cantika Putri', '7328934098467589', 'Randi orton', '7328134098467589', 'Perempuan', '2004-12-09', 'Jl. Balaikota, no.56', '089523742288', '102738465', '9', '16', 2, 2, 1, '2022-10-26 10:45:09'),
(5, '00005', 'Sri Wahyuni', '7203846716253891', 'Saprudin ', '7223846716253891', 'Perempuan', '1990-10-18', 'Jl. Durian, Wua-wua', '082345378839', '127639874', '11', '21', 2, 1, 1, '2022-10-26 10:48:10'),
(6, '00006', 'Andi Rahmat', '7203846716253899', 'Andi Angi', '7703846716253899', 'Laki-laki', '1998-11-18', 'Jl. Laremba, no. 99 Kadia', '082567873390', '', '', '', 1, 1, 1, '2022-10-26 10:50:17'),
(7, '00007', 'Micheal', 'dd208682feb9e0c0230a89236a103214fd0d6b5fedb9968617e71bdfc95e5f0656dd4dc827448631ed9b8b5ccb17d448a51d9a208104af692286786358a8f2d5oA/oawMeMzasxdmO4iWz8gEI5j6QA14Jc2noWdQqppc=', 'Naruto', '79a92a0487ca09aad9d90bbfd131f4f1f57864d348d860cae3727460259e24a8fc9cefcbf81dadcaf403ea154721854178782754ca4851c08de2e264ae6f6671xZpybG5s2zaLIVPkQsAppEtNgpkBWkUtqBRPWqX8888=', 'Laki-laki', '2022-11-14', '11238b3063009bfe84c1981b915a6234b630e287f3ce58d4530c4dc6e3184d90438fe9a69b90730eab136099a6457e6049908da0e82632194a116112321e933dHhX62FbSd0yYSHwL9ryurY/VV6ahgjKZsA3sk069Mhk=', '75ea17dec0b6ccfe2d6f531a2f115db8c273398b0cbdf16a98c11ce088d2f7a67d2de4eca4ba5386c85134dd0aa7e5f020d827ee6103a46b9690dc0f1a0adb1et6nHVi6/cjXZ4ZLkEQIeBxwea86bhwYtjMt2RmmJoes=', '123', '11', '11', 1, 3, 1, '2022-11-24 14:14:52');

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
(1, 'Suarni', 'Perempuan', 'Perawat', 'PNS', 'Gizi dan anak', '2022-11-12 06:05:06');

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
(2, 'Poli Anak', 'Gedung Utama', '2022-11-30 21:21:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_rm_pemeriksaan_odontogram`
--

CREATE TABLE `tbl_rm_pemeriksaan_odontogram` (
  `pemeriksaan_odontogram_id` int(11) NOT NULL,
  `pasien_id` int(11) NOT NULL,
  `dokter_id` int(11) NOT NULL,
  `odontogram_11[51]` text DEFAULT NULL,
  `odontogram_12[51]` text DEFAULT NULL,
  `odontogram_13[51]` text DEFAULT NULL,
  `odontogram_14[51]` text DEFAULT NULL,
  `odontogram_15[51]` text DEFAULT NULL,
  `odontogram_16` text DEFAULT NULL,
  `odontogram_17` text DEFAULT NULL,
  `odontogram_18` text DEFAULT NULL,
  `odontogram_[61]21` text DEFAULT NULL,
  `odontogram_[62]22` text DEFAULT NULL,
  `odontogram_[63]23` text DEFAULT NULL,
  `odontogram_[64]24` text DEFAULT NULL,
  `odontogram_[65]25` text DEFAULT NULL,
  `odontogram_26` text DEFAULT NULL,
  `odontogram_27` text DEFAULT NULL,
  `odontogram_28` text DEFAULT NULL,
  `odontogram_48` text DEFAULT NULL,
  `odontogram_47` text DEFAULT NULL,
  `odontogram_46` text DEFAULT NULL,
  `odontogram_45[85]` text DEFAULT NULL,
  `odontogram_44[84]` text DEFAULT NULL,
  `odontogram_43[83]` text DEFAULT NULL,
  `odontogram_42[82]` text DEFAULT NULL,
  `odontogram_41[81]` text DEFAULT NULL,
  `odontogram_38` text DEFAULT NULL,
  `odontogram_37` text DEFAULT NULL,
  `odontogram_36` text DEFAULT NULL,
  `odontogram_[75]35` text DEFAULT NULL,
  `odontogram_[74]34` text DEFAULT NULL,
  `odontogram_[73]33` text DEFAULT NULL,
  `odontogram_[72]32` text DEFAULT NULL,
  `odontogram_[71]31` text DEFAULT NULL,
  `keterangan_tambahan` text NOT NULL,
  `jumlah_photo_diambil` int(11) NOT NULL,
  `jumlah_rongten_photo_diambil` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `kekuatan_otot` enum('kuat','lemah') DEFAULT NULL,
  `turgor` enum('baik','buruk') DEFAULT NULL,
  `masalah_muskuloskeletal` text DEFAULT NULL,
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
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `user_id` int(11) NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `setting_key_speck` varchar(300) NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_setting`
--

INSERT INTO `tbl_setting` (`setting_id`, `setting_appname`, `setting_short_appname`, `setting_owner_name`, `setting_phone`, `setting_email`, `setting_address`, `setting_logo`, `setting_background`, `setting_instagram`, `setting_facebook`, `setting_youtube`, `setting_about`, `setting_key_aes`, `setting_key_speck`, `createtime`) VALUES
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
(6, 'Falakh', 'Fadjrul', '$2y$10$bzJKRluzAjr2Chl1zabLqe150OCpaO0PijgO8SzZfEFX/apyoUN6S', 'Al_falakh0101@gmail.com', '', '0000-00-00 00:00:00', '2022-10-27 04:59:45', 2);

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
(1, 'Sejarah', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '', 'sejarah', '2021-06-10 09:24:13'),
(2, 'Sambutan Kepala Dinas', '<p dir=\"ltr\" style=\"text-align:justify\">Assalamu&rsquo;Alaikum,Wr.Wb</p>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p dir=\"ltr\" style=\"text-align:right\">&nbsp;&nbsp;&nbsp; Kepala. Dinas X</p>\r\n\r\n<p dir=\"ltr\" style=\"text-align:right\">&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; <strong>KEPALA DINAS</strong></p>\r\n\r\n<p dir=\"ltr\" style=\"text-align:right\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Jabatan</p>\r\n\r\n<p style=\"text-align:right\">&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; NIP. 000000000000</p>\r\n', 'content-20210610164323.png', 'sambutan', '2021-06-11 01:13:05'),
(3, 'Tupoksi Dinas', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '', 'tupoksi', '2021-06-10 09:26:58'),
(4, 'Visi Misi', '<p style=\"text-align:center\"><span style=\"font-size:20px\"><strong>VISI</strong></span></p>\r\n\r\n<p style=\"text-align:justify\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:20px\"><strong>MISI</strong></span></p>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '', 'visi', '2021-06-10 09:24:37'),
(5, 'Maklumat Pelayanan', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '', 'maklumat', '2021-06-10 09:27:08'),
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
(1, 'Kegiatan X 2021', 'gallery-20210610175925.png', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nisl tincidunt eget nullam non. Quis hendrerit dolor magna eget est lorem ipsum dolor sit. Volutpat odio facilisis mauris sit amet massa. Commodo odio aenean sed adipiscing diam donec adipiscing tristique. Mi eget mauris pharetra et. Non tellus orci ac auctor augue. Elit at imperdiet dui accumsan sit. Ornare arcu dui vivamus arcu felis. Egestas integer eget aliquet nibh praesent. In hac habitasse platea dictumst quisque sagittis purus. Pulvinar elementum integer enim neque volutpat ac.', '2021-06-01', 'photo', '2021-06-10 17:59:25'),
(2, 'Kegiatan Y 2021', 'gallery-20210610175946.png', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nisl tincidunt eget nullam non. Quis hendrerit dolor magna eget est lorem ipsum dolor sit. Volutpat odio facilisis mauris sit amet massa. Commodo odio aenean sed adipiscing diam donec adipiscing tristique. Mi eget mauris pharetra et. Non tellus orci ac auctor augue. Elit at imperdiet dui accumsan sit. Ornare arcu dui vivamus arcu felis. Egestas integer eget aliquet nibh praesent. In hac habitasse platea dictumst quisque sagittis purus. Pulvinar elementum integer enim neque volutpat ac.', '2021-06-03', 'photo', '2021-06-10 17:59:46'),
(4, 'Pameran X', 'video-20210610183617.mp4', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nisl tincidunt eget nullam non. Quis hendrerit dolor magna eget est lorem ipsum dolor sit. Volutpat odio facilisis mauris sit amet massa. Commodo odio aenean sed adipiscing diam donec adipiscing tristique. Mi eget mauris pharetra et. Non tellus orci ac auctor augue. Elit at imperdiet dui accumsan sit. Ornare arcu dui vivamus arcu felis. Egestas integer eget aliquet nibh praesent. In hac habitasse platea dictumst quisque sagittis purus. Pulvinar elementum integer enim neque volutpat ac.', '2021-06-15', 'video', '2021-06-10 18:36:17'),
(8, 'Pameran Y', '', 'https://www.youtube.com/embed/iM-BVd2Wzrw', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ', '2021-06-10', 'video', '2021-06-10 21:42:16');

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
(23, 'photo-2-20210611190725-8204.png', 'token-20210611190719-0.6381562621644137', 2, '2021-06-11 19:07:25');

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
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'thumbnailnews-20210611083510.png', '<div id=\"li-text\">\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nisl tincidunt eget nullam non. Quis hendrerit dolor magna eget est lorem ipsum dolor sit. Volutpat odio facilisis mauris sit amet massa. Commodo odio aenean sed adipiscing diam donec adipiscing tristique. Mi eget mauris pharetra et. Non tellus orci ac auctor augue. Elit at imperdiet dui accumsan sit. Ornare arcu dui vivamus arcu felis. Egestas integer eget aliquet nibh praesent. In hac habitasse platea dictumst quisque sagittis purus. Pulvinar elementum integer enim neque volutpat ac.</p>\r\n\r\n<p>Senectus et netus et malesuada. Nunc pulvinar sapien et ligula ullamcorper malesuada proin. Neque convallis a cras semper auctor. Libero id faucibus nisl tincidunt eget. Leo a diam sollicitudin tempor id. A lacus vestibulum sed arcu non odio euismod lacinia. In tellus integer feugiat scelerisque. Feugiat in fermentum posuere urna nec tincidunt praesent. Porttitor rhoncus dolor purus non enim praesent elementum facilisis. Nisi scelerisque eu ultrices vitae auctor eu augue ut lectus. Ipsum faucibus vitae aliquet nec ullamcorper sit amet risus. Et malesuada fames ac turpis egestas sed. Sit amet nisl suscipit adipiscing bibendum est ultricies. Arcu ac tortor dignissim convallis aenean et tortor at. Pretium viverra suspendisse potenti nullam ac tortor vitae purus. Eros donec ac odio tempor orci dapibus ultrices. Elementum nibh tellus molestie nunc. Et magnis dis parturient montes nascetur. Est placerat in egestas erat imperdiet. Consequat interdum varius sit amet mattis vulputate enim.</p>\r\n\r\n<p>Sit amet nulla facilisi morbi tempus. Nulla facilisi cras fermentum odio eu. Etiam erat velit scelerisque in dictum non consectetur a erat. Enim nulla aliquet porttitor lacus luctus accumsan tortor posuere. Ut sem nulla pharetra diam. Fames ac turpis egestas maecenas. Bibendum neque egestas congue quisque egestas diam. Laoreet id donec ultrices tincidunt arcu non sodales neque. Eget felis eget nunc lobortis mattis aliquam faucibus purus. Faucibus interdum posuere lorem ipsum dolor sit.</p>\r\n</div>\r\n', '2021-06-10', 6, 'lorem-ipsum-dolor-sit-amet-consectetur-adipiscing-elit-sed-do-eiusmod-tempor-incididunt-ut-labore-et-dolore-magna-aliqua', 1, 2, 1, '2021-06-10 13:07:48'),
(2, 'Di Rutan Raha, Kadivmin Tekankan Pentingnya Akuntabilitas Dalam Pengelolaan Keuangan dan BMN', 'thumbnailnews-20210611083436.png', '<p>Senectus et netus et malesuada. Nunc pulvinar sapien et ligula ullamcorper malesuada proin. Neque convallis a cras semper auctor. Libero id faucibus nisl tincidunt eget. Leo a diam sollicitudin tempor id. A lacus vestibulum sed arcu non odio euismod lacinia. In tellus integer feugiat scelerisque. Feugiat in fermentum posuere urna nec tincidunt praesent. Porttitor rhoncus dolor purus non enim praesent elementum facilisis. Nisi scelerisque eu ultrices vitae auctor eu augue ut lectus. Ipsum faucibus vitae aliquet nec ullamcorper sit amet risus. Et malesuada fames ac turpis egestas sed. Sit amet nisl suscipit adipiscing bibendum est ultricies. Arcu ac tortor dignissim convallis aenean et tortor at. Pretium viverra suspendisse potenti nullam ac tortor vitae purus. Eros donec ac odio tempor orci dapibus ultrices. Elementum nibh tellus molestie nunc. Et magnis dis parturient montes nascetur. Est placerat in egestas erat imperdiet. Consequat interdum varius sit amet mattis vulputate enim.</p>\r\n\r\n<p>Sit amet nulla facilisi morbi tempus. Nulla facilisi cras fermentum odio eu. Etiam erat velit scelerisque in dictum non consectetur a erat. Enim nulla aliquet porttitor lacus luctus accumsan tortor posuere. Ut sem nulla pharetra diam. Fames ac turpis egestas maecenas. Bibendum neque egestas congue quisque egestas diam. Laoreet id donec ultrices tincidunt arcu non sodales neque. Eget felis eget nunc lobortis mattis aliquam faucibus purus. Faucibus interdum posuere lorem ipsum dolor sit.</p>\r\n', '2021-06-10', 7, 'di-rutan-raha-kadivmin-tekankan-pentingnya-akuntabilitas-dalam-pengelolaan-keuangan-dan-bmn', 1, 1, 1, '2021-06-10 13:12:34'),
(3, 'Nunc pulvinar sapien et ligula ullamcorper malesuada proin. Neque convallis a cras semper auctor.', 'thumbnailnews-20210611083549.png', '<div id=\"li-text\">\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nisl tincidunt eget nullam non. Quis hendrerit dolor magna eget est lorem ipsum dolor sit. Volutpat odio facilisis mauris sit amet massa. Commodo odio aenean sed adipiscing diam donec adipiscing tristique. Mi eget mauris pharetra et. Non tellus orci ac auctor augue. Elit at imperdiet dui accumsan sit. Ornare arcu dui vivamus arcu felis. Egestas integer eget aliquet nibh praesent. In hac habitasse platea dictumst quisque sagittis purus. Pulvinar elementum integer enim neque volutpat ac.</p>\r\n\r\n<p>Senectus et netus et malesuada. Nunc pulvinar sapien et ligula ullamcorper malesuada proin. Neque convallis a cras semper auctor. Libero id faucibus nisl tincidunt eget. Leo a diam sollicitudin tempor id. A lacus vestibulum sed arcu non odio euismod lacinia. In tellus integer feugiat scelerisque. Feugiat in fermentum posuere urna nec tincidunt praesent. Porttitor rhoncus dolor purus non enim praesent elementum facilisis. Nisi scelerisque eu ultrices vitae auctor eu augue ut lectus. Ipsum faucibus vitae aliquet nec ullamcorper sit amet risus. Et malesuada fames ac turpis egestas sed. Sit amet nisl suscipit adipiscing bibendum est ultricies. Arcu ac tortor dignissim convallis aenean et tortor at. Pretium viverra suspendisse potenti nullam ac tortor vitae purus. Eros donec ac odio tempor orci dapibus ultrices. Elementum nibh tellus molestie nunc. Et magnis dis parturient montes nascetur. Est placerat in egestas erat imperdiet. Consequat interdum varius sit amet mattis vulputate enim.</p>\r\n\r\n<p>Sit amet nulla facilisi morbi tempus. Nulla facilisi cras fermentum odio eu. Etiam erat velit scelerisque in dictum non consectetur a erat. Enim nulla aliquet porttitor lacus luctus accumsan tortor posuere. Ut sem nulla pharetra diam. Fames ac turpis egestas maecenas. Bibendum neque egestas congue quisque egestas diam. Laoreet id donec ultrices tincidunt arcu non sodales neque. Eget felis eget nunc lobortis mattis aliquam faucibus purus. Faucibus interdum posuere lorem ipsum dolor sit.</p>\r\n</div>\r\n', '2021-06-11', 7, 'nunc-pulvinar-sapien-et-ligula-ullamcorper-malesuada-proin-neque-convallis-a-cras-semper-auctor', 1, 1, 1, '2021-06-11 08:35:49'),
(4, 'Etiam erat velit scelerisque in dictum non consectetur a erat', 'thumbnailnews-20210611083657.png', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nisl tincidunt eget nullam non. Quis hendrerit dolor magna eget est lorem ipsum dolor sit. Volutpat odio facilisis mauris sit amet massa. Commodo odio aenean sed adipiscing diam donec adipiscing tristique. Mi eget mauris pharetra et. Non tellus orci ac auctor augue. Elit at imperdiet dui accumsan sit. Ornare arcu dui vivamus arcu felis. Egestas integer eget aliquet nibh praesent. In hac habitasse platea dictumst quisque sagittis purus. Pulvinar elementum integer enim neque volutpat ac.</p>\r\n\r\n<p>Senectus et netus et malesuada. Nunc pulvinar sapien et ligula ullamcorper malesuada proin. Neque convallis a cras semper auctor. Libero id faucibus nisl tincidunt eget. Leo a diam sollicitudin tempor id. A lacus vestibulum sed arcu non odio euismod lacinia. In tellus integer feugiat scelerisque. Feugiat in fermentum posuere urna nec tincidunt praesent. Porttitor rhoncus dolor purus non enim praesent elementum facilisis. Nisi scelerisque eu ultrices vitae auctor eu augue ut lectus. Ipsum faucibus vitae aliquet nec ullamcorper sit amet risus. Et malesuada fames ac turpis egestas sed. Sit amet nisl suscipit adipiscing bibendum est ultricies. Arcu ac tortor dignissim convallis aenean et tortor at. Pretium viverra suspendisse potenti nullam ac tortor vitae purus. Eros donec ac odio tempor orci dapibus ultrices. Elementum nibh tellus molestie nunc. Et magnis dis parturient montes nascetur. Est placerat in egestas erat imperdiet. Consequat interdum varius sit amet mattis vulputate enim.</p>\r\n\r\n<p>Sit amet nulla facilisi morbi tempus. Nulla facilisi cras fermentum odio eu. Etiam erat velit scelerisque in dictum non consectetur a erat. Enim nulla aliquet porttitor lacus luctus accumsan tortor posuere. Ut sem nulla pharetra diam. Fames ac turpis egestas maecenas. Bibendum neque egestas congue quisque egestas diam. Laoreet id donec ultrices tincidunt arcu non sodales neque. Eget felis eget nunc lobortis mattis aliquam faucibus purus. Faucibus interdum posuere lorem ipsum dolor sit.</p>\r\n', '2021-06-11', 23, 'etiam-erat-velit-scelerisque-in-dictum-non-consectetur-a-erat', 1, 1, 1, '2021-06-11 08:36:57');

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
(6, '', '', 'slider-20221125174921.jpg', '2022-11-25 17:49:21'),
(9, '', '', 'slider-20221125190115.jpg', '2022-11-25 19:01:15'),
(11, '', '', 'slider-20221127205642.jpg', '2022-11-27 20:56:42'),
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
  ADD KEY `constraint_fktbl_rm_po_pasien_id` (`pasien_id`);

--
-- Indeks untuk tabel `tbl_rm_pengkajian_awal`
--
ALTER TABLE `tbl_rm_pengkajian_awal`
  ADD PRIMARY KEY (`pengkajian_awal_id`),
  ADD KEY `constraint_fktbl_rm_pa_pegawai_id` (`pegawai_id`) USING BTREE,
  ADD KEY `constraint_fkpa_rm_pengkajian_awal` (`pasien_id`);

--
-- Indeks untuk tabel `tbl_rm_riwayat_kunjungan_pasien`
--
ALTER TABLE `tbl_rm_riwayat_kunjungan_pasien`
  ADD PRIMARY KEY (`riwayat_kunjungan_pasien_id`),
  ADD KEY `constraint_fktbl_rm_rkp_dokter_id` (`dokter_id`),
  ADD KEY `constraint_fktbl_rm_rkp_poliklinik_id` (`poliklinik_id`),
  ADD KEY `constraint_fktbl_rm_rkp_user_id` (`user_id`),
  ADD KEY `constraint_fktbl_rm_rkp_pasien_id` (`pasien_id`);

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
  MODIFY `dokter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_faq`
--
ALTER TABLE `tbl_faq`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=614;

--
-- AUTO_INCREMENT untuk tabel `tbl_pasien`
--
ALTER TABLE `tbl_pasien`
  MODIFY `pasien_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  MODIFY `pegawai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_poliklinik`
--
ALTER TABLE `tbl_poliklinik`
  MODIFY `poliklinik_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_rm_pemeriksaan_odontogram`
--
ALTER TABLE `tbl_rm_pemeriksaan_odontogram`
  MODIFY `pemeriksaan_odontogram_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_rm_pengkajian_awal`
--
ALTER TABLE `tbl_rm_pengkajian_awal`
  MODIFY `pengkajian_awal_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_rm_riwayat_kunjungan_pasien`
--
ALTER TABLE `tbl_rm_riwayat_kunjungan_pasien`
  MODIFY `riwayat_kunjungan_pasien_id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_web_gallery_photo`
--
ALTER TABLE `tbl_web_gallery_photo`
  MODIFY `gallery_photo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

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
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  ADD CONSTRAINT `constraint_fktbl_rm_po_pasien_id` FOREIGN KEY (`pasien_id`) REFERENCES `tbl_pasien` (`pasien_id`),
  ADD CONSTRAINT `constraint_fktbl_rm_po_user_id` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`);

--
-- Ketidakleluasaan untuk tabel `tbl_rm_pengkajian_awal`
--
ALTER TABLE `tbl_rm_pengkajian_awal`
  ADD CONSTRAINT `constraint_fkpa_rm_pengkajian_awal` FOREIGN KEY (`pasien_id`) REFERENCES `tbl_pasien` (`pasien_id`),
  ADD CONSTRAINT `constraint_fkpe_rm_pengkajian_awal` FOREIGN KEY (`pegawai_id`) REFERENCES `tbl_pegawai` (`pegawai_id`);

--
-- Ketidakleluasaan untuk tabel `tbl_rm_riwayat_kunjungan_pasien`
--
ALTER TABLE `tbl_rm_riwayat_kunjungan_pasien`
  ADD CONSTRAINT `constraint_fktbl_rm_rkp_dokter_id` FOREIGN KEY (`dokter_id`) REFERENCES `tbl_dokter` (`dokter_id`),
  ADD CONSTRAINT `constraint_fktbl_rm_rkp_pasien_id` FOREIGN KEY (`pasien_id`) REFERENCES `tbl_pasien` (`pasien_id`),
  ADD CONSTRAINT `constraint_fktbl_rm_rkp_poliklinik_id` FOREIGN KEY (`poliklinik_id`) REFERENCES `tbl_poliklinik` (`poliklinik_id`),
  ADD CONSTRAINT `constraint_fktbl_rm_rkp_user_id` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
