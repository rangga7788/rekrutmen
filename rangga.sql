-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 06, 2013 at 02:54 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rangga`
--

-- --------------------------------------------------------

--
-- Table structure for table `bidang`
--

CREATE TABLE IF NOT EXISTS `bidang` (
  `id_bidang` int(2) NOT NULL,
  `nama_bidang` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_bidang`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Dumping data for table `bidang`
--

INSERT INTO `bidang` (`id_bidang`, `nama_bidang`) VALUES
(1, 'Programmer'),
(2, 'Networking');

-- --------------------------------------------------------

--
-- Table structure for table `data_bidang`
--

CREATE TABLE IF NOT EXISTS `data_bidang` (
  `id_bidang` int(11) NOT NULL AUTO_INCREMENT,
  `nama_bidang` varchar(200) NOT NULL,
  `rincian` varchar(2000) NOT NULL,
  PRIMARY KEY (`id_bidang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `data_bidang`
--

INSERT INTO `data_bidang` (`id_bidang`, `nama_bidang`, `rincian`) VALUES
(1, 'Web Programmer', '- Harus menguasai HTML, PHP, Database, JS, serta bahasa pendukung Web Programming.\n- Diutamakan memiliki keahllian dalam menggunakan framework dan mengerti konsep OOP.\n- Memiliki kemampuan Web Design.'),
(2, 'Tenaga Ahli Jaringan', 'Rincian dan persyaratan Tenaga Ahli Jaringan'),
(3, 'tes program', 'sdfsdfgsdfsd'),
(4, 'tes 2', 'sgsdgfsd');

-- --------------------------------------------------------

--
-- Table structure for table `data_pendidikan`
--

CREATE TABLE IF NOT EXISTS `data_pendidikan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_pend` varchar(100) NOT NULL,
  `thn_tamat` varchar(100) NOT NULL,
  `tingkat` varchar(100) DEFAULT NULL,
  `sekolah` varchar(400) NOT NULL,
  `kat` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `data_pendidikan`
--

INSERT INTO `data_pendidikan` (`id`, `no_pend`, `thn_tamat`, `tingkat`, `sekolah`, `kat`) VALUES
(1, '005/REK/2013', '2010', 'SMK', 'SMK Negeri 1 Tanjung Pura', 'Formal'),
(4, '005/REK/2013', '2007', 'SLTP', 'SMP abal abal', 'Formal'),
(5, '005/REK/2013', '2020', 'NonFormal', 'kiamat', 'NonFormal'),
(6, '006/REK/2013', '2003', 'SD', 'SDN 050680 Padang Tualang', 'Formal'),
(7, '006/REK/2013', '2007', 'SLTP', 'SMP Negeri 1 Tanjung Pura', 'Formal'),
(8, '006/REK/2013', '2010', 'SLTA', 'SMK Negeri 1 Tanjung Pura', 'Formal'),
(9, '006/REK/2013', 'Belum Tamat', 'PT', 'Universitas Setia Budi Mandiri Medan', 'Formal'),
(10, '006/REK/2013', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `data_pengalaman`
--

CREATE TABLE IF NOT EXISTS `data_pengalaman` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_pend` varchar(100) NOT NULL,
  `tahun` varchar(100) NOT NULL,
  `tempat` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `data_pengalaman`
--

INSERT INTO `data_pengalaman` (`id`, `no_pend`, `tahun`, `tempat`) VALUES
(1, '005/REK/2013', '2010-2012', 'Pemulung'),
(2, '005/REK/2013', '2003-2004', 'entah'),
(6, '005/REK/2013', '2013-3101', 'tes'),
(9, '006/REK/2013', '2010-2012', 'SMK Negeri 1 Tanjung Pura');

-- --------------------------------------------------------

--
-- Table structure for table `data_skill`
--

CREATE TABLE IF NOT EXISTS `data_skill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_pend` varchar(100) NOT NULL,
  `skill` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `data_skill`
--

INSERT INTO `data_skill` (`id`, `no_pend`, `skill`) VALUES
(1, '006/REK/2013', 'Bisa Memasak'),
(3, '006/REK/2013', 'tambah lagi'),
(4, '005/REK/2013', 'Mampu');

-- --------------------------------------------------------

--
-- Table structure for table `data_user`
--

CREATE TABLE IF NOT EXISTS `data_user` (
  `no_reg` varchar(100) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `LP` varchar(10) NOT NULL,
  `ktp` varchar(200) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `tmp_lahir` varchar(200) NOT NULL,
  `tgl_lahir` varchar(200) NOT NULL,
  `status` varchar(20) NOT NULL,
  `id_bidang` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `agama` varchar(20) NOT NULL,
  `tlp` varchar(12) NOT NULL,
  `email` varchar(40) NOT NULL,
  `state` varchar(2) NOT NULL DEFAULT 'pl',
  `hasil` varchar(100) NOT NULL,
  `finish` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`no_reg`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_user`
--

INSERT INTO `data_user` (`no_reg`, `nama`, `LP`, `ktp`, `alamat`, `password`, `tmp_lahir`, `tgl_lahir`, `status`, `id_bidang`, `time`, `agama`, `tlp`, `email`, `state`, `hasil`, `finish`) VALUES
('002/REK/2013', 'IFTIKHAR', 'L', '00000000111111111111111111', 'Tg Putus', '863c2a4b6bff5e22294081e376fc1f51863c2a4b6bff5e22294081e376fc1f51', 'Kwala Pesilam', '2 Juni 1992', 'Belum Kawin', 1, '2013-01-08 11:59:42', '', '', '', 'pl', 'Lulus', 0),
('003/REK/2013', 'IMA JUNIEZTA', 'P', '123243243535', 'rygtruhytjgyujty', '863c2a4b6bff5e22294081e376fc1f5192bfd5bc53a4bdbd7b8c9f8bc660cc14', 'jrtyhdrgdr', '26 Januari 1995', '', 2, '2013-01-09 14:30:24', '', '', '', 'pl', 'Tidak Lulus', 0),
('004/REK/2013', 'HAFIZ GANI AL FAIZ', 'L', '01002898487588239', 'Padang Tualang', '863c2a4b6bff5e22294081e376fc1f51839a54bf20626e4942bc8f11873f0654', 'Tanjung Pura', '21 Juli 1994', 'Belum Kawin', 1, '2013-01-10 01:51:55', '', '', '', 'pl', 'Lulus', 0),
('005/REK/2013', 'ABDU RANGGA SENJARI', 'L', '0001232847385472386', 'Dsn. Bukit Barat, Desa Tg. Putus, Kecamatan Padang Tualang', '863c2a4b6bff5e22294081e376fc1f51863c2a4b6bff5e22294081e376fc1f51', 'Padang Tualang', '2 Juni 1992', 'Kawin', 2, '2013-01-10 15:20:52', 'ISLAM', '085763143191', 'rangga@darulilmi.com', 'pl', 'Lulus', 1),
('006/REK/2013', 'ABDU RANGGA S.', 'L', '00107214235865', 'Dsn. Desa. Kec. Kab. Prov.', '863c2a4b6bff5e22294081e376fc1f51863c2a4b6bff5e22294081e376fc1f51', 'Rumah', '13 Juni 2013', 'Belum Kawin', 1, '2013-06-04 02:58:07', 'ISLAM', '085763143191', 'rangga@darulilmi.com', 'pl', '', 1),
('007/REK/2013', 'Akladfnkajl', 'L', '12313', 'dfgdfgfdhfg', '863c2a4b6bff5e22294081e376fc1f51863c2a4b6bff5e22294081e376fc1f51', 'sdfhdfhdfh', '5 Juni 2013', 'Belum Kawin', 3, '2013-06-06 02:52:21', 'safasd', '3252345', 'sdfgsd', 'pl', '', 0),
('admin', '', '', '', '', '863c2a4b6bff5e22294081e376fc1f51863c2a4b6bff5e22294081e376fc1f51', '', '', '', 0, '2013-01-09 05:54:16', '', '', '', 'ad', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE IF NOT EXISTS `kontak` (
  `id` int(1) NOT NULL,
  `isikontak` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id`, `isikontak`) VALUES
(1, '<p>ISI KONTAK</p>');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE IF NOT EXISTS `pengumuman` (
  `id` varchar(20) NOT NULL,
  `pesan` varchar(10000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `pesan`) VALUES
('Lulus', 'pBatas waktu pengisian kelengkapan biodata dan berkas telah berakhir..p\r\np  justifyKami  ucapkan banyak terima kasih kepada anda. Silahkan menunggu pengumuman   kelulusan tahap seleksi administrasi yang akan di umumkan melalui web  ini pada tanggal strong02  Maret 2013strong pukul strong17.00 WIBstrong. Silahkan nanti Anda  LOGIN dengan menggunakan strongNomor  Registrasistrong anda untuk melihat pengumuman  tersebutp\r\np  rightttd. Panitia Rekrutmenp'),
('Tidak Lulus', 'pspan idfbPhotoSnowliftCaption classfbPhotosPhotoCaptionspan classhasCaptionSeorang   anak telah menelan uang logam Rp.100,00 kemudian ia memberitahukannya   kepada sang ibu, tapi sang ibu mengatakan kalau uang tsb, akan keluar   pada saat buang air besar. Pada saat anak ini buang air besar, yang   keluar bukan 100 tetapi 500. Sang ibu pun penasaran, ia berpikir bila   uang ditelan maka akan keluar lebih banyak. Tanpa pikir panjang lagi, ia   menelan Rp.10.000 dengan harapan bisa keluar yang lebih besar. Pada   saat buang air besar, yang keluar bukan uang, tapi sebuah gulungan   kertas kecil. Setelah dibuka, di sana tertulis, ldquoANDA BELUM BERUNTUNGrdquospanspanspan idfbPhotoSnowliftTagList classfbPhotoTagListspan classfcg spanspanp'),
('tutup', '0'),
('Umum', 'pPendaftaran Calon Tenaga IT telah ditutup...!p\r\np  justifyPengumuman kelulusan tahap seleksi administrasi akan di umumkan melalui web ini pada tanggal strong02 Maret 2013strong pukul strong17.00 WIBstrong. Silahkan LOGIN dengan menggunakan strongNomor Registrasistrong anda untuk melihat pengumuman..p\r\np  rightttd. Panitia Rekrutmenp');

-- --------------------------------------------------------

--
-- Table structure for table `skill`
--

CREATE TABLE IF NOT EXISTS `skill` (
  `No` int(3) NOT NULL AUTO_INCREMENT,
  `no_reg` varchar(30) NOT NULL,
  `skill` varchar(400) NOT NULL,
  PRIMARY KEY (`No`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_download`
--

CREATE TABLE IF NOT EXISTS `tbl_download` (
  `id_download` int(5) NOT NULL AUTO_INCREMENT,
  `judul_file` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `nama_file` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL,
  `author` varchar(20) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_download`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=69 ;

--
-- Dumping data for table `tbl_download`
--

INSERT INTO `tbl_download` (`id_download`, `judul_file`, `nama_file`, `tgl_posting`, `author`) VALUES
(62, 'Foto Diri', '425780400IMG0645A.jpg', '2013-01-10', '003/REK/2013'),
(63, 'Foto Diri', '294922307249922_428429333892341_2054551178_n.jpg', '2013-01-10', '001/REK/2013'),
(55, 'Scan KTP', '549663352482983_395407033864939_222739231_n.jpg', '2013-01-09', '002/REK/2013'),
(56, 'Scan KTP', '1009614521420427_371781019512579_663064861_n.jpg', '2013-01-09', '002/REK/2013'),
(57, 'Scan KTP', '252477834394440_380600772008531_877228556_n.jpg', '2013-01-09', '002/REK/2013'),
(58, 'Foto Diri', '984607900kepala.jpg', '2013-01-09', '002/REK/2013'),
(59, 'Scan KTP', '178571023Kaban.jpg', '2013-01-10', '004/REK/2013'),
(60, 'Foto Diri', '375247731Kadis.jpg', '2013-01-10', '004/REK/2013'),
(64, 'Foto Diri', '286537297249922_428429333892341_2054551178_n.jpg', '2013-01-10', '005/REK/2013'),
(65, 'Scan KTP', '327980022421033_428429543892320_2050456682_n.jpg', '2013-01-10', '005/REK/2013'),
(66, 'Referensi Keahlian', '799061735564864_426697840732157_143497709_n.jpg', '2013-01-10', '005/REK/2013'),
(68, 'Scan KTP', '127593133386400_517074248316588_1402018818_n.jpg', '2013-06-04', '006/REK/2013');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
