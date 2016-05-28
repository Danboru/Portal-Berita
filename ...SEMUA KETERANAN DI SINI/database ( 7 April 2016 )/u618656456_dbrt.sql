
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 07, 2016 at 07:35 AM
-- Server version: 10.0.20-MariaDB
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `u618656456_dbrt`
--

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE IF NOT EXISTS `agenda` (
  `id_agenda` int(5) NOT NULL AUTO_INCREMENT,
  `tema` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tema_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `isi_agenda` text COLLATE latin1_general_ci NOT NULL,
  `tempat` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `pengirim` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `tgl_posting` date NOT NULL,
  `jam` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `dibaca` int(5) NOT NULL DEFAULT '1',
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_agenda`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=70 ;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`id_agenda`, `tema`, `tema_seo`, `isi_agenda`, `tempat`, `pengirim`, `gambar`, `tgl_mulai`, `tgl_selesai`, `tgl_posting`, `jam`, `dibaca`, `username`) VALUES
(68, 'LOMBA POSTER DAN VIDEO', 'lomba-poster-dan-video', '<div>\r\nLOMBA POSTER DAN VIDEO dengan tema &quot;Optimalisasi Budaya K3 Untuk Mendorong Produktivitas dalam Persaingan Global&quot;&nbsp;\r\n</div>\r\n<div>\r\n<br />\r\n</div>\r\n<div>\r\nTimeline :&nbsp;\r\n</div>\r\n<div>\r\n???? 16 MARET - 7 MEI 2016\r\n</div>\r\n<div>\r\n???? Deadline Pengumpulan 8 MEI 2016\r\n</div>\r\n<div>\r\n<br />\r\n</div>\r\n<div>\r\nForm Pendaftaran dan Ketentuan :&nbsp;\r\n</div>\r\n<div>\r\n???? www.oshforumfkmundip.com\r\n</div>\r\n<div>\r\n<br />\r\n</div>\r\n<div>\r\nWe are waiting for your participation!\r\n</div>\r\n', '', '', '35366711752455_10205714868860041_8714362833095339297_n.jpg', '2016-04-01', '2016-04-01', '2016-04-01', '', 2, 'admin'),
(69, 'DESAIN VOCALOID', 'desain-vocaloid', '<div>\r\nShare\r\n</div>\r\n<div>\r\nSiapa tau ada yang berminat\r\n</div>\r\n', '', '', '63622710402983_1080548325335412_6768161883900418646_n.jpg', '2016-04-01', '2016-04-01', '2016-04-01', '', 1, 'admin'),
(66, 'PKM FTI UKSW 2016', 'pkm-fti-uksw-2016', '<div>\r\nKalian punya ide cemerlang tapi bingung gimana mau merealisasikannya? Ayo ikuti PKM FTI 2016 wadah bagi kalian yg memiliki ide kreatif dan inovatif. Pendaftaran akan mulai dibuka tanggal 28 Maret 2016. Untuk keterangan lebih lanjut bisa hubungi contact person yang ada.\r\n</div>\r\n<div>\r\n&quot;Realisasikan Idemu, Gapai Mimpimu.&quot;\r\n</div>\r\n<div>\r\n&nbsp;\r\n</div>\r\n<div>\r\n#PKMFTIUKSW2016\r\n</div>\r\n', '', '', '9011876900_811134598991889_2170924528235123068_n.jpg', '2016-04-01', '2016-04-01', '2016-04-01', '', 1, 'admin'),
(67, 'LK FTI PEDULI', 'lk-fti-peduli', 'Yang mau gabung bisa ikut kami jalan santai dengan kumpul di depan LKU menggunakan baju gelap, celana, dan bersepatu jam 06.00 WIB. See you there!\r\n', '', '', '86432810390987_1065813110105866_5306270665516541747_n.jpg', '2016-04-01', '2016-04-01', '2016-04-01', '', 1, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `id_album` int(5) NOT NULL AUTO_INCREMENT,
  `jdl_album` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `album_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `keterangan` text COLLATE latin1_general_ci NOT NULL,
  `gbr_album` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `hits_album` int(5) NOT NULL DEFAULT '1',
  `tgl_posting` date NOT NULL,
  `jam` time NOT NULL,
  `hari` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_album`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=33 ;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id_album`, `jdl_album`, `album_seo`, `keterangan`, `gbr_album`, `aktif`, `hits_album`, `tgl_posting`, `jam`, `hari`, `username`) VALUES
(30, 'Universitas Kristen Satyawacana', 'universitas-kristen-satyawacana', '<div style="overflow: hidden; color: #000000; text-align: left; text-decoration: none; border: medium none; background-color: #ffffff">\r\n<br />\r\n</div>\r\n', '34Universitas-Kristen-Satya-Wacana.jpg', 'Y', 43, '2012-08-20', '09:12:06', 'Senin', 'admin'),
(31, 'Orientasi Mahasiswa Baru', 'orientasi-mahasiswa-baru', '', '140a07a1af7501a9e601427f4071431a1.JPG', 'Y', 45, '2012-08-20', '09:40:01', 'Senin', 'admin'),
(28, 'Meet with ADMIN', 'meet-with-admin', '', '65maxresdefault.jpg', 'Y', 198, '2012-08-18', '23:14:05', 'Sabtu', 'admin'),
(29, 'Kota Salatiga', 'kota-salatiga', '', '55cover.jpg', 'Y', 31, '2012-08-19', '03:02:27', 'Minggu', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `background`
--

CREATE TABLE IF NOT EXISTS `background` (
  `id_background` int(5) NOT NULL AUTO_INCREMENT,
  `gambar` varchar(255) NOT NULL,
  PRIMARY KEY (`id_background`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `background`
--

INSERT INTO `background` (`id_background`, `gambar`) VALUES
(1, 'main-body-bg.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `id_banner` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `url` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL,
  PRIMARY KEY (`id_banner`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id_banner`, `judul`, `url`, `gambar`, `tgl_posting`) VALUES
(17, 'Banner1', '', '80an.jpg', '2015-01-01'),
(14, 'Banner2', '', 'betaufo.jpg', '2016-01-01'),
(18, 'Banner3', '', 'lokomedia2.jpg', '2016-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE IF NOT EXISTS `berita` (
  `id_berita` int(5) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(5) NOT NULL,
  `username` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `sub_judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `youtube` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `judul_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `headline` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `utama` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `isi_berita` text COLLATE latin1_general_ci NOT NULL,
  `keterangan_gambar` text COLLATE latin1_general_ci NOT NULL,
  `hari` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `dibaca` int(5) NOT NULL DEFAULT '1',
  `tag` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_berita`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=682 ;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `id_kategori`, `username`, `judul`, `sub_judul`, `youtube`, `judul_seo`, `headline`, `aktif`, `utama`, `isi_berita`, `keterangan_gambar`, `hari`, `tanggal`, `jam`, `gambar`, `dibaca`, `tag`) VALUES
(657, 22, 'admin', 'Gerindra: Posisi Ahok Sangat Rawan', '', '', 'gerindra-posisi-ahok-sangat-rawan', 'Y', 'Y', 'Y', '<div>\r\n<strong>JAKARTA </strong>- Ketua DPP Partai Gerindra, Riza Patria mengatakan, Basuki Tjahaja Purnama (Ahok) bisa dikalahkan oleh Yusril Ihza Mahendra di pemilihan kepala daerah (Pilkada) DKI Jakarta 2017.\r\n</div>\r\n<div>\r\n<br />\r\n</div>\r\n<div>\r\n"Posisi Ahok sekarang sangat rawan, karena hanya berada di angka 44 persen. Justru Yusril yang baru muncul, bisa merangsek ke posisi dua," kata Riza di Jalan Veteran, Jakarta Pusat, Rabu (30/3/2016).\r\n</div>\r\n<div>\r\n<br />\r\n</div>\r\n<div>\r\nHal tersebut dikatakan, karena incumbent Ahok yang elektabilitasnya dibawah 70 persen, masih sangat rentan posisinya untuk mempertahankan akan menang di Pilgub DKI.\r\n</div>\r\n<div>\r\n<br />\r\n</div>\r\n<div>\r\nSementara itu, ketika disinggung siapakah yang akan maju di pilkada DKI dari partai Gerindra, Riza mengatakan masih dalam tahapan penjaringan.\r\n</div>\r\n<div>\r\n<br />\r\n</div>\r\n<div>\r\n"Kami belum memutuskan calon. Kita akan putuskan nanti yang terbaik. Gerindra masih melihat banyak kemungkinan, apalagi pendaftaran masih lama, yakni bulan September mendatang," tandasnya.\r\n</div>\r\n<div>\r\n<br />\r\n</div>\r\n<div>\r\n(wal)\r\n</div>\r\n', '', 'Rabu', '2016-03-30', '17:52:16', '88gerindra-posisi-ahok-sangat-rawan-wqVB6InMW8.jpg', 20, 'hukum,politik'),
(658, 2, 'susilo', '"PEDROSA" bertekad merangsek ke posisi depan', '', '', 'pedrosa-bertekad-merangsek-ke-posisi-depan', 'Y', 'N', 'Y', '<strong>SALATIGA-</strong>Dani Pedrosa menuntaskan MotoGP Qatar di posisi lima, namun dengan jarak amat lebar dengan barisan terdepan. Jarak itu bertekad dia tipiskan di Argentina.<br />\r\n<br />\r\nPedrosa finis di posisi lima pada balapan pembuka di Qatar lalu, sementara rekan setimnya di Repsol Honda, Marc Marquez, naik podium tiga. Hasil ini plus progres sepanjang akhir pekan di Qatar diakui Pedrosa cukup menggembirakan, mengingat di tes pramusim timnya kesulitan tampil kompetitif.<br />\r\n<br />\r\nTapi selisih 14,083 detik dari pebalap Movistar Yamaha Jorge Lorenzo yang tampil sebagai juara jelas jadi pekerjaan rumah untuk Pedrosa. Hal ini yang menjadi fokusnya di MotoGP Argentina akhir pekan nanti.<br />\r\n<br />\r\nMeski absen di musim lalu karena operasi lengan, di musim 2014 yang jadi balapan perdana di Autodromo Termas de Rio Hondo, Pedrosa mendapatkan hasil oke. Dia finis runner-up di belakang Marquez. Ini disebutnya jadi basis yang cukup baik, terlebih lagi dia menyukai karakter sirkuitnya.<br />\r\n<br />\r\n&quot;Di GP Qatar, kami membuat sebuah langkah maju yang konsisten dengan setelan motor dibandingkan di tes musim dingin. Kami meningkatkan laju motor dan saya mampu menjaganya selama balapan, dengan konsistensi yang bagus,&quot; kata Pedrosa dikutip Crash.<br />\r\n<br />\r\n&quot;Positifnya adalah lengan saya bekerja dengan baik di sebuah trek yang telah terbukti menantang di masa lalu. Dan bahwa kami mampu belajar lebih banyak soal motornya.&quot;<br />\r\n<br />\r\n&quot;Tapi ini masih tidak cukup, kami perlu meningkatkan posisi berkendara, bagaimana motornya berlaku di trek, dan setelan secara umum untuk mendapatkan kecepatan lebih baik. Karena pada saat ini gap dengan barisan terdepan masih terlalu besar.&quot;<br />\r\n<br />\r\n&quot;Itu akan jadi target kami di Argentina. Saya tidak balapan di sini musim lalu, tapi saya punya memori bagus di trek ini dari 2014. Saya menyukai desain sirkuitnya dan saya harap kami mampu membuat langkah maju lainnya,&quot; tandas pebalap 30 tahun ini.<br />\r\n<br />\r\nDi balapan Qatar lalu, Pedrosa tertinggal jauh dari empat pebalap terdepan. Valentino Rossi yang finis keempat cuma berjarak 2,387 detik dari Lorenzo, alias 11,696 detik di depan Pedrosa.\r\n', '', 'Rabu', '2016-03-30', '18:05:23', '36asd.jpg', 17, 'olahraga'),
(659, 2, 'admin', 'Petinju Inggris Alami Koma Usai Perebutan Gelar', '', '', 'petinju-inggris-alami-koma-usai-perebutan-gelar', 'Y', 'Y', 'N', '<div>\r\n<font face="Lucida, helvetica, sans-serif" color="#4b4b4b"><span style="font-size: 16px; line-height: 24px">LONDON, Kompas.com - Petinju Inggris, Nick Blackwell tidak sadarkan diri setelah pertarungan perebutan gelar juara kelas menengah Inggris menghadapi Chris Eubank Jr.</span></font>\r\n</div>\r\n<div>\r\n<font face="Lucida, helvetica, sans-serif" color="#4b4b4b"><span style="font-size: 16px; line-height: 24px"><br />\r\n</span></font>\r\n</div>\r\n<div>\r\n<font face="Lucida, helvetica, sans-serif" color="#4b4b4b"><span style="font-size: 16px; line-height: 24px">Blackwell tidak sadarkan diri setelah wasit menghentikan pertarungan di Wembley, London tersebut pada ronde 10. Wasit terpaksa menghentikan pertarungan setelah dokter menyatakan satu mata Blackwell tertutup dan tak dapat melihat karena tertutup bengkak.</span></font>\r\n</div>\r\n<div>\r\n<font face="Lucida, helvetica, sans-serif" color="#4b4b4b"><span style="font-size: 16px; line-height: 24px"><br />\r\n</span></font>\r\n</div>\r\n<div>\r\n<font face="Lucida, helvetica, sans-serif" color="#4b4b4b"><span style="font-size: 16px; line-height: 24px">Namun setelah keputusan tersebut, Blackwell justru terjatuh dan tak sadarkan diri hingga harus dilarikan ke rumah sakit.</span></font>\r\n</div>\r\n<div>\r\n<font face="Lucida, helvetica, sans-serif" color="#4b4b4b"><span style="font-size: 16px; line-height: 24px"><br />\r\n</span></font>\r\n</div>\r\n<div>\r\n<font face="Lucida, helvetica, sans-serif" color="#4b4b4b"><span style="font-size: 16px; line-height: 24px">Chris Eubank Jr merupakan petinju harapan Inggris untuk merebut gelar juara dunia. Ia dilatih oleh ayahnya sendiri, Chris Eubank yang merupakan petinju legendaris Inhggris yang pernah menjadi juara dunia di dua kelas.</span></font>\r\n</div>\r\n<div>\r\n<font face="Lucida, helvetica, sans-serif" color="#4b4b4b"><span style="font-size: 16px; line-height: 24px"><br />\r\n</span></font>\r\n</div>\r\n<div>\r\n<font face="Lucida, helvetica, sans-serif" color="#4b4b4b"><span style="font-size: 16px; line-height: 24px">Eubank Sr mengatakan ia sudah mengingatkan puteranya untuk tidak memukul kepala lawannya pada akhir ronde 8.</span></font>\r\n</div>\r\n<div>\r\n<font face="Lucida, helvetica, sans-serif" color="#4b4b4b"><span style="font-size: 16px; line-height: 24px"><br />\r\n</span></font>\r\n</div>\r\n<div>\r\n<font face="Lucida, helvetica, sans-serif" color="#4b4b4b"><span style="font-size: 16px; line-height: 24px">Pada akhir ronde 8 tersebut, Eubank sempat berkata kepada puteranya,&quot;Jika kamu terus memukulinya seperti itu dan wasit tak menghentikannya, aku tak tahu harus bilang apa. Dia akan cedera. Mengapa wasit tidak menghentikan pertarungan? Aku tidak mengerti. Pukul saja dia di bagian badannya&quot;</span></font>\r\n</div>\r\n<div>\r\n<font face="Lucida, helvetica, sans-serif" color="#4b4b4b"><span style="font-size: 16px; line-height: 24px"><br />\r\n</span></font>\r\n</div>\r\n<div>\r\n<font face="Lucida, helvetica, sans-serif" color="#4b4b4b"><span style="font-size: 16px; line-height: 24px">Saat karirnya pada 1980-an, Chris Eubank pernah mengalami hal serupa. Pada 1991, ia pernah menghentikan &nbsp;Michael Watson di London yang membuat lawannya harus menjalani operasi untuk menyelamatkan nyawa.</span></font>\r\n</div>\r\n<div>\r\n<font face="Lucida, helvetica, sans-serif" color="#4b4b4b"><span style="font-size: 16px; line-height: 24px"><br />\r\n</span></font>\r\n</div>\r\n<div>\r\n<font face="Lucida, helvetica, sans-serif" color="#4b4b4b"><span style="font-size: 16px; line-height: 24px">Watson yang kemudian pulih, menuliskan pengalamannya di media Inggris, Telegraph. &quot;Chris (Jr) dan Nick (Blackwell) menjalani pertarungan yang ketat. Sayang Nick harus mengalami hal seperti itu di akhir pertarungan.&quot;</span></font>\r\n</div>\r\n', '', 'Rabu', '2016-03-30', '18:14:02', '540032439eubank780x390.jpg', 16, 'internasional,olahraga'),
(661, 23, 'admin', 'Debut Akting, Chelsea Shania Ogah Dikenal Sebagai Adik Alexa Key', '', '', 'debut-akting-chelsea-shania-ogah-dikenal-sebagai-adik-alexa-key', 'Y', 'Y', 'Y', '<div>\r\nKapanlagi.com - BEAUTY AND THE BEAST merupakan drama remaja yang diadaptasi dari novel berjudul sama karya Luna Torashyngu. Dalam film arahan Andri Sofyansah itu, diperkenalkan aktris pendatang baru yang aktingnya begitu memukau, yakni Chelsea Shania.\r\n</div>\r\n<div>\r\nMungkin tak banyak yang tahu, Chelsea yang kesulitan berbicara Bahasa Indonesia ini merupakan adik kandung dari Alexa Key. Ia pun kaget ketika awak KapanLagi.com&reg; mengetahui hubungan persaudaraan di antara mereka.\r\n</div>\r\n<div>\r\n<br />\r\n</div>\r\n<div>\r\n&quot;Kok tahu? Hahaha,&quot; tanyanya seraya tertawa saat ditemui di Gala Premiere BEAUTY AND THE BEAST di CGV Blitz Grand Indonesia, kawasan Thamrin, Jakarta Pusat, Selasa (29/3).\r\n</div>\r\n<div>\r\n&nbsp;\r\n</div>\r\n<div>\r\n&nbsp;Pemilik nama lengkap Chelsea Shania D&#39;Heureuse ini memang enggan dikaitkan dengan sang kakak. Ia ingin publik mengenal dirinya sebagai pribadi independen tanpa membawa-bawa ketenaran Alexa.\r\n</div>\r\n<div>\r\n<br />\r\n</div>\r\n<div>\r\n&quot;Sejak awal aku nggak mengekspos kalau aku adiknya Alexa. Karena aku nggak pengen mendompleng. I wanna be known as myself, bukan bertitle adiknya Alexa Key. Karena aku ingin dikenal sebagai diriku sendiri, ya know. I dont like depending my sister and her fame too,&quot; tegasnya.\r\n</div>\r\n<div>\r\n<br />\r\n</div>\r\n<div>\r\nDara yang tinggal di Bali itu menjelaskan bila Key bukan nama keluarga sehingga tak perlu dijadikan nama panggung. &quot;Key itu diambil dari potongan nama tengah kakak aku, Kyooma. Kami berdua memakai nama tengah sebagai nama akhir,&quot; pungkasnya.\r\n</div>\r\n<div>\r\n<br />\r\n</div>\r\n<div>\r\nDalam film yang rilis Kamis 31 Maret besok, Chelsea diplot sebagai Kelly. Dia memerankan gadis pintar yang mengajak taruhan model cantik bernama Ira (Andania Suri) untuk dapatkan nilai terbaik di ujian tengah semester sekolah mereka.\r\n</div>\r\n', '', 'Rabu', '2016-03-30', '18:22:27', '23beautyandthebeast.jpg', 6, 'film,hiburan,nasional,selebritis,televisi'),
(662, 23, 'admin', '"Batman Vs Superman" Merajai Box Office Di Amerika Serikat', '', '', 'batman-vs-superman-merajai-box-office-di-amerika-serikat', 'Y', 'Y', 'Y', '<div>\r\nKapanlagi.com - Tepat seperti dugaan, BATMAN Vs SUPERMAN: DAWN OF JUSTICE akhirnya merajai box office Amerika Serikat di long weekend Paskah ini. Film superhero DC yang dibintangi oleh Henry Cavill dan Ben Affleck ini mampu meraup US$ 170 juta atau setara dengan Rp 2,2 T hanya dalam waktu 3-4 hari saja.\r\n</div>\r\n<div>\r\nPendapatan ini langsung mengungguli pendapatan THE HUNGER GAMES (US$ 152 juta) dan juga HARRY POTTER THE DEATHLY HALLOWS PART 2 (US$ 169 juta). BVS juga mencatatkan rekor baru sebagai the largest domestic opening for Warner Bros. ever.\r\n</div>\r\n<div>\r\n<br />\r\n</div>\r\n<div>\r\nSelain itu film arahan sutradara Zack Snyder ini juga membuat rekor baru sebagai the largest Easter opening, yang tahun lalu dipecahkan oleh FURIOUS 7. Rekor BVS nggak berhenti sampai di situ. Film ini juga sukses mengalahkan rekor THE DARK KNIGHT RISES dan menjadi pemegang the largest opening for a film based on a DC Comics property.Total jumlah pendapatannya di seluruh dunia sudah mencapai angka US$ 424 juta atau setara dengan Rp 5,6 T. Sayangnya, BVS hanya menerima rating B- dari Cinemascore dan mendapat 29% rating dari Rotten Tomatoes, demikian yang dilansir dari Box Office Mojo.\r\n</div>\r\n<div>\r\n<br />\r\n</div>\r\n<div>\r\nBVS yang jadi film pendatang baru di Easter weekend ini juga sukses menggeser jawara dua minggu berturut-turut, ZOOTOPIA. Selain BVS, ada juga film baru lainnya yaitu MY BIG FAT GREEK WEDDING 2 yang langsung duduk di posisi ketiga dengan pendapatan US$ 18 juta (Rp 239 M).&nbsp;\r\n</div>\r\n<div>\r\n<br />\r\n</div>\r\n<div>\r\nFilm young adult yang digilai para audiens muda, ALLEGIANT, terjun bebas di posisi 5 dan mengalami penurunan drastis hingga 67%. Akankah BVS mampu mencatatkan lebih banyak rekor hingga minggu depan?\r\n</div>\r\n', '', 'Rabu', '2016-03-30', '18:34:29', '54batman-v-superman-rajai-box-office-suks-3b7c5c.jpg', 3, 'film,hiburan,internasional'),
(663, 23, 'susilo', 'ENDANK SOEKAMTI jalani media tour selama sebulan', '', '', 'endank-soekamti-jalani-media-tour-selama-sebulan', 'Y', 'N', 'Y', '<p>\r\n<strong>JOGJA - </strong>Band dari jogja &#39;endank soekamti&#39; setelah resmi merilis albumnya yang ketuju berjudul &#39;<em>Soekamti Days&#39;</em> melakukan promosi dengan sistem mendatangi media. salah satunya dengan mendatangi radio-radio yang berada di pulau jawa,bali dan lombok. dimana dalam melakukan promosi ini di jadwalkan selama satu bulan. Bukan waktu yang sedikit menurut kru <em>soekamti </em>ini.\r\n</p>\r\n<p>\r\n&nbsp;Dalam promosi kali ini tidak hanya mendatangi radio saj melainkan ke sebuah acara di stasiun televisi swasta yang berada di kota Metropolitan. Diacara TV sendiri <em>Endank Soekamti </em>tak hanya promosi , mereka juga manggung secara live ddi stasiun TV tersebut.\r\n</p>\r\n', '', 'Rabu', '2016-03-30', '18:36:22', '48soekamtiday-cover.jpg', 9, 'musik,nasional'),
(664, 23, 'zeno', 'April 2016, Harga Premium dan Solar Turun Rp500/Liter', '', 'https://youtu.be/hPsBlVeNchQ', 'april-2016-harga-premium-dan-solar-turun-rp500liter', 'Y', 'Y', 'Y', '<div>\r\nJAKARTA - Menteri Energi dan Sumber Daya Mineral (ESDM) Sudirman Said mengungkapkan, pemerintah telah memutuskan untuk menurunkan harga jual Bahan Bakar Minyak (BBM) jenis premium dan solar.\r\n</div>\r\n<div>\r\n<br />\r\n</div>\r\n<div>\r\nSudirman menyebutkan, harga per 1 April 2016 untuk BBM jenis premium menjadi Rp6.450 per liter atau turun Rp500 per liter dari yang sebelumnya Rp6.950 per liter. Begitu pun dengan BBM jenis solar yang menjadi Rp5.150 per liter.\r\n</div>\r\n<div>\r\n&nbsp;\r\n</div>\r\n<div>\r\n&quot;Seperti disampaikan Pak Seskab tadi bahwa telah diputuskan harga baru yang akan berlaku mulai 1 April 2016, keduanya turun masing-masing Rp500 per liter,&quot; kata Sudirman di Kantor Presiden, Jakarta, Rabu (30/3/2016).\r\n</div>\r\n<div>\r\n<br />\r\n</div>\r\n<div>\r\nSudirman menuturkan, dengan harga yang baru ini peran pemerintah dalam mengawasi pergerakan BBM tetap sama. Di mana, tidak melepaskan harga BBM sepenuhnya kepada mekanisme pasar.\r\n</div>\r\n<div>\r\n<br />\r\n</div>\r\n<div>\r\n&quot;Tugas pemerintah menjaga supaya harus ada stabilitas, smooth, naik turunnya harga tidak terlalu tinggi,&quot; tambahnya.\r\n</div>\r\n<div>\r\n<br />\r\n</div>\r\n<div>\r\nSelain itu, sambung Sudirman, pemerintah juga akan tetap mengkaji ulang harga BBM setiap tiga bulan sekali sesuai dengan formulasi yang selama ini digunakan.\r\n</div>\r\n<div>\r\n<br />\r\n</div>\r\n<div>\r\n&quot;Hari ini Pertamina akan menyiapkan segala sesuatunya, sehingga pada 1 April pukul 00.00 sudah berlaku harga baru,&quot; tandasnya.(rai)&nbsp;\r\n</div>\r\n', '', 'Rabu', '2016-03-30', '18:52:15', '67april-2016-harga-premium-dan-solar-turun-rp500-liter-RCqeyyr3I9.gif', 12, 'nasional'),
(665, 22, 'zeno', 'KPK Terus Gali Kasus Korupsi Hambalang', '', '', 'kpk-terus-gali-kasus-korupsi-hambalang', 'Y', 'Y', 'Y', '<div>\r\nJAKARTA - Kasus korupsi proyek pembangunan Pusat Pendidikan Pelatihan dan Sarana Olahraga Nasional (P3SON) Hambalang di Kabupaten Bogor, Jawa Barat kembali mencuat ke publik.&nbsp;\r\n</div>\r\n<div>\r\n<br />\r\n</div>\r\n<div>\r\nKasus ini kembali mencuat ke publik pasca Presiden Joko Widodo melihat kondisi proyek tersebut pada 18 Maret 2016.&nbsp;\r\n</div>\r\n<div>\r\n<br />\r\n</div>\r\n<div>\r\nTerkait proses hukum, Komisi Pemberantasan Korupsi (KPK) menyatakan masih terus mendalami kasus tersebut. &quot;Pertimbangannya ya hukum itu sendiri yang harus menjamin kepastian agar tercapai keadilan, kebenaran dan kejujuran. Jadi semua yang memiliki bukti (keterlibatan) harus diadili,&quot; kata Wakil Ketua KPK Saut Situmorang melalui pesan singkat kepada wartawan, Senin (28/3/2016).\r\n</div>\r\n<div>\r\n<br />\r\n</div>\r\n<div>\r\nDia menambahkan, sejauh ini belum ada cukup bukti untuk menjerat pihak lain. &quot;Sebegitu jauh belum ada lagi,&quot; katanya. (Baca juga: Soal Proyek Hambalang, Ini Sarank KPK kepada Pemerintah)\r\n</div>\r\n<div>\r\n<br />\r\n</div>\r\n<div>\r\nMenurut Saut, institusinya tidak akan diam jika mendapatkan bukti keterlibatan pihak lain dalam kasus Hambalang. &quot;Tidak terbatas pada nama-nama tertentu yang telah disebut-sebut selama ada bukti keterkaitan,&quot; katanya. (Baca juga:&nbsp;\r\n</div>\r\n<div>\r\n<br />\r\n</div>\r\n<div>\r\nPembangunan P3SON di Hambalang &nbsp;di ata lahan seluas 32 hektare masuk pada tahun anggaran 2010-2012. Proyek tersebut dihentikan karena KPK menemukan kasus korupsi.\r\n</div>\r\n<div>\r\n<br />\r\n</div>\r\n<div>\r\nKasus ini menjerat Andi Mallarangeng yang ketika itu menjabat Menteri Pemuda dan Olahraga (Menpora) dan &nbsp;dan adiknya Choel Mallarangeng. Tidak hanya mereka, mantan Ketua Umum Partai Demokrat Anas Urbaningrum juga tersandung kasus yang sama.&nbsp;\r\n</div>\r\n<div>\r\n&nbsp;\r\n</div>\r\n<div>\r\nhttp://nasional.sindonews.com/&nbsp;\r\n</div>\r\n<div>\r\n<br />\r\n</div>\r\n', '', 'Rabu', '2016-03-30', '18:55:56', '21kpk-terus-gali-kasus-korupsi-hambalang-VsM.jpg', 5, 'hukum,metropolitan,nasional,politik,sekitar-kita'),
(666, 23, 'zeno', 'Adele Berencana Vakum Selama 5 Tahun?', '', '', 'adele-berencana-vakum-selama-5-tahun', 'Y', 'Y', 'N', '<p>\r\nLiputan6.com, London - Mungkin baru beberapa bulan setelah Adele menyapa Hello kepada para penggemarnya, namun ia telah dirumorkan mengambil masa hiatus panjang.\r\n</p>\r\n<p>\r\nMenurut salah seorang sumber, penyanyi berusia 27 tahun ini pernah berkata kepada temannya kalau ia akan vakum selama 5 tahun setelah merampungkan tur konsernya.\r\n</p>\r\n<p>\r\n&quot;Dia pernah bilang bahwa ia akan menjauh dari hingar bingar dunia hiburan selama lima tahun sebelum meluncurkan album berikutnya,&quot; ujar sumber tersebut.\r\n</p>\r\n<p>\r\nSumber tersebut menambahkan, &quot;Adele masih terbilang baru dalam menjalankan perannya sebagai seorang ibu, dan ia tidak mau kehilangan masa-masa pertumbuhan putranya, Angelo. Mungkin para penggemarnya merasa berat mendengar hal ini.&quot;\r\n</p>\r\n<p>\r\nLebih lanjut, Adele meluncurkan albumnya yang bertajuk 25 pada akhir November lalu. Album tersebut terbilang sukses karena sanggup merajai tangga lagu Billboard hingga lebih dari delapan minggu berturut-turut.\r\n</p>\r\n<p>\r\nSaat ini, Adele masih disibukkan dengan aktifitas bermusiknya di Eropa dan akan melangsungkan konser di Amerika Utara yang akan berakhir di Mexico City pada 15 November 2016. (Ufa)\r\n</p>\r\n<p>\r\n&nbsp;\r\n</p>\r\n<p>\r\nhttp://showbiz.liputan6.com/&nbsp;\r\n</p>\r\n', '', 'Rabu', '2016-03-30', '19:03:53', '31062440600_1459169364-adele.jpg', 2, 'hiburan,internasional,musik'),
(667, 40, 'zeno', 'Tutorial Masak: Bakso Mie Ayam Gaya Baru', '', '', 'tutorial-masak-bakso-mie-ayam-gaya-baru', 'N', 'Y', 'N', '<div>\r\nLiputan6.com, Jakarta Mie ayam memang menjadi makanan favorit banyak orang, oleh karena itulah mie ayam menjadi inspirasi Kokiku Tv untuk berinovasi dan menciptakan sebuah resep bakso terbaru.\r\n</div>\r\n<div>\r\n<br />\r\n</div>\r\n<div>\r\nKali ini Kokiku Tv ingin berbagi resep dan video tutorial menarik menu bakso yang terbuat dari mie dan ayam yang biasanya menjadi menu utama mie ayam. Bakso unik ini bisa menjadi variasi menu unik yang dapat dinikmati bersama keluarga. Selamat mencoba!\r\n</div>\r\n<div>\r\n&nbsp;\r\n</div>\r\n<div>\r\nBahan-bahan\r\n</div>\r\n<div>\r\n<br />\r\n</div>\r\n<div>\r\n1 cm jahe, cincang halus\r\n</div>\r\n<div>\r\n150 gram ayam cincang\r\n</div>\r\n<div>\r\n1 sdm kecap Kikkoman\r\n</div>\r\n<div>\r\n2 sdt kecap ikan\r\n</div>\r\n<div>\r\n3 siung bawang putih, cincang halus\r\n</div>\r\n<div>\r\n150 gram mie telur, rebus dan sisihkan&nbsp;\r\n</div>\r\n<div>\r\nDaun bawang, cincang halus\r\n</div>\r\n<div>\r\n2 sdm tepung maizena\r\n</div>\r\n<div>\r\nMinyak goreng&nbsp;\r\n</div>\r\n<div>\r\n100 gram sambal botol\r\n</div>\r\n<div>\r\nJahe cincang sesuai selera\r\n</div>\r\n<div>\r\nMinyak ikan\r\n</div>\r\n<div>\r\nDaun mint atau daun ketumbar, cincang\r\n</div>\r\n<div>\r\nAir perasan jeruk nipis\r\n</div>\r\n<div>\r\nDaun bawang, cincang\r\n</div>\r\n<div>\r\n&nbsp;\r\n</div>\r\n<div>\r\n<br />\r\n</div>\r\n<div>\r\nTahapan\r\n</div>\r\n<div>\r\n<br />\r\n</div>\r\n<div>\r\nCincang halus bawang putih dan jahe lalu masukkan ke dalam wadah.\r\n</div>\r\n<div>\r\nMasukkan daging ayam cincang.\r\n</div>\r\n<div>\r\nMasukkan mie, daun bawang, kecap kikkoman, kecap ikan. Aduk hingga merata.\r\n</div>\r\n<div>\r\nTambahkan tepung maizena.\r\n</div>\r\n<div>\r\nUleni adonan dengan tangan, sambil menyiapkan wajan panas untuk menggoreng adonan.\r\n</div>\r\n<div>\r\nBulatkan adonan dengan sendok lalu goreng.\r\n</div>\r\n<div>\r\nUntuk membuat saus, campur sambal, jahe, minyak ikan, daun mint, air perasan jeruk nipis dan daun bawang lalu aduk hingga merata.\r\n</div>\r\n<div>\r\nSajikan selagi hangat.&nbsp;\r\n</div>\r\n', '', 'Rabu', '2016-03-30', '19:07:43', '8080559700_1458034310-Landscape-660x420-Bakso-mie-Ayam.jpg', 6, 'hiburan,kuliner,sekitar-kita'),
(668, 39, 'susilo', 'Lupakan Melbourne, Raikkonen Cari Pembalasan di Sakhir ', '', '', 'lupakan-melbourne-raikkonen-cari-pembalasan-di-sakhir-', 'Y', 'N', 'Y', '<p>\r\n<strong>SALATIGA- </strong>Sakhir - Menjalani seri perdana Formula 1 kurang mulus, Kimi Raikkonen mencari pembalasan di GP Bahrain. Modal bagus dimiliki pebalap Ferrari tersebut dengan finis kedua di Sakhir musim lalu.<br />\r\n<br />\r\nRaikkonen tak bisa menyelesaikan balapan di Sirkuit Albert Park, Melbourne, Australia 20 Maret ini. Dia dipaksa masuk pitlane pada lap ke-21 dan memastikan tak melanjutkan balapan. Sebab, mobil Ferrari-nya terbakar dan berasap.<br />\r\n<br />\r\nMemang dari hasil pengecekan oleh tim, mobil Ferrari milik Raikkonen tak memerlukan penggantian. Sebab, tak ditemukan kerusakan yang parah.<br />\r\n<br />\r\nKini menjelang GP Bahrain yang akan bergulir akhir pekan ini, kepercayaan diri Raikkonen meningkat tinggi. Dia punya modal finis sebagai runner-up di Sirkuit Sakhir tahun lalu dengan hanya berjarak 0,5 detik di akhir perlombaan.<br />\r\n<br />\r\n&quot;Saya menikmati balapan di Bahrain, yang cukup menyenangkan, bukan sirkuit dengan sudut yang paling sulit tapi tetap berat untuk menyelesaikan lap dengan bagus di sana,&quot; kata Raikkonen seperti dikutip Planet F1.<br />\r\n<br />\r\n&quot;Kondisi bisa berubah banyak karena angin, sangat panas kalau tengah hari dan cukup dingin setelah sore datang. Tapi apapun itu kota yang sip.<br />\r\n<br />\r\n&quot;Mungkin saya naik podium tahun lalu tapi tak ada poin yang bisa dijadikan acuan hasil kali ini. Kami ada di urutan kedua tahun lalu dan ya begitu saja. Tak terlalu buruk tapi sudah cukup baik bukan?&quot; tutur dia.<br />\r\n<br />\r\nMenurut pebalap Finlandia tersebut sirkuit di Bahrain itu mempunyai tantangan pada lintasan lurusnya dan sudut yang tajam. Maka, Sirkuit Sakhir menuntut para pebalap untuk menggeber mobil super cepat.<br />\r\n<br />\r\n&quot;Sirkuit ini cukup berat untuk berlatih, so beberapa mobil bakal punya masalah dengan rem,&quot; ucap dia. \r\n</p>\r\n<p>\r\nsource:detik.com \r\n</p>\r\n', '', 'Kamis', '2016-03-31', '11:46:34', '24kimi2i.jpg', 6, 'hiburan,internasional,olahraga'),
(669, 48, 'susilo', 'Bisa Intip Transaksi Kartu Kredit, Ini yang Dilakukan Ditjen Pajak', '', '', 'bisa-intip-transaksi-kartu-kredit-ini-yang-dilakukan-ditjen-pajak', 'Y', 'N', 'Y', '<p>\r\n<strong>SALATIGA-</strong>-Direktorat Jenderal Pajak (Ditjen Pajak)Kementerian Keuangan (Kemenkeu) sekarang sudah bisa mengakses data transaksi kartu kredit. Ini berlaku setelah diterbitkannya Peraturan Menteri Keuangan (PMK) Nomor 39/PMK.03/2016.<br />\r\n<br />\r\nApa yang akan dilakukan Ditjen Pajak dengan data tersebut?<br />\r\n<br />\r\nDirektur Penyuluhan Pelayanan dan Humas Ditjen Pajak, Mekar Satria Utama, menyatakan bahwa data itu akan menjadi pendukung untuk pemeriksaan terhadap wajib pajak melalui Surat Pemberitahuan (SPT) tahunan.<br />\r\n <br />\r\n"Itu data pendukung untuk pemeriksaan," kata Mekar kepada detikFinance, Kamis (31/3/2016).<br />\r\n<br />\r\nMekar menjelaskan dari transaksi kartu kredit maka bisa mengetahui kemampuan ekonomi wajib pajak. Misalnya rata-rata konsumsi sebesar Rp 10 juta per bulan atau Rp 120 juta per tahun.<br />\r\n<br />\r\nHarusnya pendapatan yang dimiliki wajib pajak tidak jauh dari konsumsinya. Sehingga dalam SPT tahunan yang  dilaporkan, pendapatan yang tertulis seharusnya sekitar Rp 120 juta per tahun.<br />\r\n<br />\r\n"Paling tidak, minimal Rp 120 juta pendapatannya. Kalau itu ada utang, nggak mungkin jauh di bawah Rp 120 juta juga," jelasnya.<br />\r\n<br />\r\n"Data itu yang kemudian akan dipadukan dengan SPT tahunan. Kalau misalnya Rp 120 juta tapi yang dilaporkan cuma Rp 60 juta maka akan jadi bahan pemeriksaan oleh DJP," tegas Mekar.\r\n</p>\r\n<p>\r\ndetik.com \r\n</p>\r\n', '', 'Kamis', '2016-03-31', '11:49:54', '28a37293d1-b958-45cc-a894-a1c4e63e859e_169.jpg', 11, 'ekonomi,hukum,nasional,politik,teknologi'),
(670, 19, 'sujud', 'Google Rayakan April Mop dengan Video Sindiran VR', '', '', 'google-rayakan-april-mop-dengan-video-sindiran-vr', 'Y', 'Y', 'Y', '<div>\r\nMOUNTAIN VIEW - Beberapa hari ini, dunia teknologi dihebohkan dengan kehadiran kacamata virtual reality (VR) yakni Oculus Rift, Samsung Gear, dan HTC Vive. Namun Google menyikapi hal ini dengan cara yang sangat berbeda.\r\n</div>\r\n<div>\r\n<br />\r\n</div>\r\n<div>\r\nGoogle memang mempunyai tradisi merayakan "Fools Day" atau April Mop dengan mengunggah video hiburan mengenai produk terbaru mereka, yang mana produk ini palsu dan tidak benar-benar diproduksi.\r\n</div>\r\n<div>\r\n<br />\r\n</div>\r\n<div>\r\nDalam edisi kali ini, Google membuat video tentang "Google Cardboard Plastic". Dalam deskripsi produk tertulis "Headset VR aktual pertama di dunia." Produk ini memang hanya sebuah kacamata biasa, namun Google membuatnya benar-benar futuristik.\r\n</div>\r\n<div>\r\n<br />\r\n</div>\r\n<div>\r\nVideo ini benar-benar meyakinkan konsumen. Narator di video ini menyebutkan bahwa produk ini dapat menampilkan gambar 4D dengan sudut 360 derajat serta sensasi sentuhan realistis.\r\n</div>\r\n<div>\r\n<br />\r\n</div>\r\n<div>\r\nGoogle tampaknya ingin menyindir konsumen yang tersihir dengan kecanggihan VR. Walaupun menjanjikan pengalaman nyata, namun hal itu tidak benar-benar nyata.\r\n</div>\r\n<div>\r\n<br />\r\n</div>\r\n<div>\r\n"Virtual Reality telah membawa kita ke tempat-tempat menakjubkan seperti, dasar laut dan permukaan Mars. Tapi kacamata VR tidak benar-benar dapat melihat kehidupan nyata kita. Google Cardboard Plastic membawa Anda melihat kehidupan nyata," jelas Google. Demikian seperti dikutip The verge, Jumat (1/4/2016).\r\n</div>\r\n<div>\r\n<br />\r\n</div>\r\n<div>\r\n#Okezone\r\n</div>\r\n', '', 'Jumat', '2016-04-01', '14:11:27', '28google-rayakan-april-mop-dengan-video-sindiran-ChmxxEL5Ei.jpg', 3, 'teknologi'),
(671, 19, 'sujud', 'Harga Ponsel 4G Semakin Murah', '', '', 'harga-ponsel-4g-semakin-murah', 'Y', 'N', 'Y', '<div>\r\nSINGAPURA - Shannedy Ong selaku Senior Director and Business Development Qualcomm Southeast Asia Pasific menyatakan pasar smartphone 4G di Indonesia sedang bergairah dan akan memiliki harga yang terjangkau.\r\n</div>\r\n<div>\r\n<br />\r\n</div>\r\n<div>\r\nSebagaimana diberitakan Antara, Jumat (1/4/2016), Shannedy mengatakan berdasarkan data yang ia miliki, pada Januari 2015 penetrasi smartphone 4G baru 15 persen, namun pada Desember 2015 melonjak menjadi 47 persen.\r\n</div>\r\n<div>\r\n<br />\r\n</div>\r\n<div>\r\n&ldquo;Kalau kita lihat dari market di Indonesia, adopsi teknologi 4G sudah cukup tinggi. Sangat signifikan, dari Januari ke Desember 2015 dan akan terus meningkat. Banyak tersedianya smartphone 4G juga membuat harganya semakin terjangkau,&rdquo; katanya.\r\n</div>\r\n<div>\r\n<br />\r\n</div>\r\n<div>\r\nMelihat peluang pasar 4G yang besar, Qualcomm siap bekerja sama dengan produsen ponsel agar menggunakan prosesor Snapdragon 625 atau Snapdragon 652 dengan harga yang lebih terjangkau dibandingkan prosesor anyar Snapdragon 820.\r\n</div>\r\n<div>\r\n<br />\r\n</div>\r\n<div>\r\n&ldquo;Kalau ingin menggunakan smartphone 4G dengan prosesor 820 tentunya akan lebih mahal, maka prosesor seri 600 yang lebih dahulu dikembangkan bisa digunakan,&rdquo; kata dia.\r\n</div>\r\n<div>\r\n<br />\r\n</div>\r\n<div>\r\n&ldquo;Kami sedang membicarakan untuk menggunakan prosesor 625 dan 652 agar smartphone 4G bisa tersedia dengan harga lebih murah,&rdquo; tutur Shannedy.\r\n</div>\r\n<div>\r\n<br />\r\n</div>\r\n<div>\r\nNamun, ia berharap provider penyedia layanan telekomunikasi di Indonesia juga terus meningkatkan jangkauan 4G agar bisa dinikmati banyak masyarakat. Selain itu, pihak Qualcomm juga tidak akan memberikan chipsetnya kepada merek ponsel sembarangan karena kualitas prosesor bisa dirasakan maksimal dengan ponsel yang berkualitas.\r\n</div>\r\n<div>\r\n<br />\r\n</div>\r\n<div>\r\n&ldquo;Teknologi 4G membutuhkan ponsel yang bagus karena bila menggunakan ponsel yang kurang bagus maka pengalaman yang diterima user akan tidak maksimal,&rdquo; kata dia.\r\n</div>\r\n<div>\r\n<br />\r\n</div>\r\n<div>\r\n(okezone)\r\n</div>\r\n', '', 'Jumat', '2016-04-01', '14:13:12', '86harga-ponsel-4g-semakin-murah-WOJnQuXZLP.jpg', 14, 'teknologi');

-- --------------------------------------------------------

--
-- Table structure for table `download`
--

CREATE TABLE IF NOT EXISTS `download` (
  `id_download` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `nama_file` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL,
  `hits` int(3) NOT NULL,
  PRIMARY KEY (`id_download`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `download`
--

INSERT INTO `download` (`id_download`, `judul`, `nama_file`, `tgl_posting`, `hits`) VALUES
(3, 'Membuat Shopping Cart dengan PHP', 'shopping cart.pdf', '2009-02-17', 16),
(5, 'Skrip Captcha', 'captcha.rar', '2009-02-06', 15),
(8, 'Wallpaper PHP', 'PHP_weapon.jpg', '2009-10-28', 37),
(9, 'Slide  Pemrograman VBA Excell', 'Excell_VBA.ppt', '2009-11-03', 24);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id_gallery` int(5) NOT NULL AUTO_INCREMENT,
  `id_album` int(5) NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `jdl_gallery` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `gallery_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `keterangan` text COLLATE latin1_general_ci NOT NULL,
  `gbr_gallery` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_gallery`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=294 ;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id_gallery`, `id_album`, `username`, `jdl_gallery`, `gallery_seo`, `keterangan`, `gbr_gallery`) VALUES
(291, 30, 'admin', 'UKSW 010', 'uksw-010', '', '47UKSW (10).jpg'),
(292, 30, 'admin', 'UKSW 011', 'uksw-011', '', '40UKSW (11).jpg'),
(289, 30, 'admin', 'UKSW 008', 'uksw-008', '', '5UKSW (8).jpg'),
(290, 30, 'admin', 'UKSW 009', 'uksw-009', '', '80UKSW (9).jpg'),
(286, 30, 'admin', 'UKSW 005', 'uksw-005', '', '40UKSW (5).jpg'),
(287, 30, 'admin', 'UKSW 006', 'uksw-006', '', '25UKSW (6).jpg'),
(288, 30, 'admin', 'UKSW 007', 'uksw-007', '', '82UKSW (7).jpg'),
(284, 30, 'admin', 'UKSW 003', 'uksw-003', '', '92UKSW (3).jpg'),
(285, 30, 'admin', 'UKSW 004', 'uksw-004', '', '2UKSW (4).jpg'),
(281, 29, 'admin', 'Salatiga 020', 'salatiga-020', '', '7020.jpg'),
(282, 30, 'admin', 'UKSW 001', 'uksw-001', '', '28UKSW (1).jpg'),
(283, 29, 'admin', 'UKSW 002', 'uksw-002', '', '40UKSW (2).jpg'),
(279, 29, 'admin', 'Salatiga 018', 'salatiga-018', '', '2118.jpg'),
(280, 29, 'admin', 'Salatiga 019', 'salatiga-019', '', '3119.jpg'),
(277, 29, 'admin', 'Salatiga 016', 'salatiga-016', '', '3216.jpg'),
(278, 29, 'admin', 'Salatiga 017', 'salatiga-017', '', '9317.jpg'),
(273, 0, 'admin', 'Salatiga 013', 'salatiga-013', '', '713.jpg'),
(274, 29, 'admin', 'Salatiga 013', 'salatiga-013', '', '8013.jpg'),
(275, 29, 'admin', 'Salatiga 014', 'salatiga-014', '', '1514.jpg'),
(276, 29, 'admin', 'Salatiga 015', 'salatiga-015', '', '8215.jpg'),
(272, 29, 'admin', 'Salatiga 012', 'salatiga-012', '', '9512.jpg'),
(271, 29, 'admin', 'Salatiga 011', 'salatiga-011', '', '7511.jpg'),
(269, 29, 'admin', 'Salatiga 009', 'salatiga-009', '', '219.jpg'),
(270, 29, 'admin', 'Salatiga 010', 'salatiga-010', '', '8210.jpg'),
(268, 29, 'admin', 'Salatiga 008', 'salatiga-008', '', '818.jpg'),
(266, 0, 'admin', 'Salatiga 007', 'salatiga-007', '', '57.jpg'),
(267, 29, 'admin', 'Salatiga 007', 'salatiga-007', '', '77.jpg'),
(264, 29, 'admin', 'Salatiga 005', 'salatiga-005', '', '865.jpg'),
(265, 29, 'admin', 'Salatiga 006', 'salatiga-006', '', '46.jpg'),
(261, 0, 'admin', 'Salatiga 006', 'salatiga-006', '', '96.jpg'),
(262, 0, 'admin', 'Salatiga 007', 'salatiga-007', '', '377.jpg'),
(263, 29, 'admin', 'Salatiga 004', 'salatiga-004', '', '684.jpg'),
(257, 29, 'admin', 'Salatiga 001', 'salatiga-001', '', '221.jpg'),
(258, 29, 'admin', 'Salatiga 002', 'salatiga-002', '', '912.jpg'),
(259, 29, 'admin', 'Salatiga 003', 'salatiga-003', '', '843.jpg'),
(260, 0, 'admin', 'Salatiga 005', 'salatiga-005', '', '445.jpg'),
(256, 28, 'admin', 'Sujud', 'sujud', '', '5711377370_969033219797187_7735100769830069036_n (1).jpg'),
(254, 28, 'admin', 'Susilo', 'susilo', '', '6811885320_884049994998216_665303607785953401_n.jpg'),
(255, 28, 'admin', 'Danbo', 'danbo', '', '6411377370_969033219797187_7735100769830069036_n.jpg'),
(252, 31, 'admin', 'OMB Foto 010', 'omb-foto-010', '', '6410.jpg'),
(253, 28, 'admin', 'Zeno', 'zeno', '', '93533504_419387021411413_938264877_n.jpg'),
(250, 31, 'admin', 'OMB Foto 008', 'omb-foto-008', '', '338.jpg'),
(251, 31, 'admin', 'OMB Foto 009', 'omb-foto-009', '', '379.jpg'),
(248, 31, 'admin', 'OMB Foto 006', 'omb-foto-006', '', '246.JPG'),
(249, 31, 'admin', 'OMB Foto 007', 'omb-foto-007', '', '797.JPG'),
(243, 31, 'admin', 'OMB Foto 001', 'omb-foto-001', '', '471.jpg'),
(244, 31, 'admin', 'OMB Foto 002', 'omb-foto-002', '', '692.jpg'),
(245, 31, 'admin', 'OMB Foto 003', 'omb-foto-003', '', '663.JPG'),
(246, 31, 'admin', 'OMB Foto 004', 'omb-foto-004', '', '114.JPG'),
(247, 0, 'admin', 'OMB Foto 005', 'omb-foto-005', '', '225.JPG'),
(241, 0, 'admin', 'Test', 'test', 'Test\r\n', '10images.jpg'),
(293, 30, 'admin', 'UKSW 012', 'uksw-012', '', '62UKSW (12).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `halamanstatis`
--

CREATE TABLE IF NOT EXISTS `halamanstatis` (
  `id_halaman` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) NOT NULL,
  `judul_seo` varchar(100) NOT NULL,
  `isi_halaman` text NOT NULL,
  `tgl_posting` date NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `dibaca` int(5) NOT NULL DEFAULT '1',
  `jam` time NOT NULL,
  `hari` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_halaman`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `halamanstatis`
--

INSERT INTO `halamanstatis` (`id_halaman`, `judul`, `judul_seo`, `isi_halaman`, `tgl_posting`, `gambar`, `username`, `dibaca`, `jam`, `hari`) VALUES
(18, 'Tentang Kami', 'tentang-kami', '<p>\r\nIni Hanyalah sebuah website amatir yang di desain sederhana untuk memenuhi kebutuhan informasi yang saat ini semakin berkembang. Tujuan utama dari pengembangan web ini hanya untuk memenuhi kewajiban pengerjaan tugas akhir, yang selalu di lakukan ketika akhir smester di UKSW.&nbsp;\r\n</p>\r\n<p>\r\n<strong>Kelompok Kami</strong>\r\n</p>\r\n<ul>\r\n	<li><a href="http://griya-parfum.co.cc">D</a>anang Priabada - 672014113</li>\r\n	<li><a href="http://luxindotours.com">S</a>ujud Fitri Ala&#39;i - 672014125</li>\r\n	<li>Tri Susilo - 702014005</li>\r\n	<li>Afrienta Zeno -&nbsp;702014001</li>\r\n</ul>\r\n<p>\r\n<strong>Ucapan terimakasih</strong>\r\n</p>\r\n<p>\r\nTerimakasih untuk Tuhan yang sudah memberikan pengetahuan, dan terimakasih ke Dosen dan Asdos yang menjadi perantara Ilmu dari Tuhan. Tak Lupa penyedia tamplate website Kalibata.com.\r\n</p>\r\n', '2012-03-08', '13Screenshot_32.png', 'admin', 757, '20:08:00', 'Kamis');

-- --------------------------------------------------------

--
-- Table structure for table `header`
--

CREATE TABLE IF NOT EXISTS `header` (
  `id_header` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `url` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL,
  PRIMARY KEY (`id_header`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=34 ;

--
-- Dumping data for table `header`
--

INSERT INTO `header` (`id_header`, `judul`, `url`, `gambar`, `tgl_posting`) VALUES
(31, 'Header3', '', 'header3.jpg', '2011-04-06'),
(32, 'Header2', '', 'header1.jpg', '2011-04-06'),
(33, 'Header1', '', 'header2.jpg', '2011-04-06');

-- --------------------------------------------------------

--
-- Table structure for table `hubungi`
--

CREATE TABLE IF NOT EXISTS `hubungi` (
  `id_hubungi` int(5) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `subjek` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `pesan` text COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `dibaca` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id_hubungi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=34 ;

-- --------------------------------------------------------

--
-- Table structure for table `identitas`
--

CREATE TABLE IF NOT EXISTS `identitas` (
  `id_identitas` int(5) NOT NULL AUTO_INCREMENT,
  `nama_website` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `url` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `facebook` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `rekening` varchar(100) NOT NULL,
  `no_telp` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `meta_deskripsi` varchar(250) NOT NULL,
  `meta_keyword` varchar(250) NOT NULL,
  `favicon` varchar(50) NOT NULL,
  PRIMARY KEY (`id_identitas`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `identitas`
--

INSERT INTO `identitas` (`id_identitas`, `nama_website`, `email`, `url`, `facebook`, `rekening`, `no_telp`, `meta_deskripsi`, `meta_keyword`, `favicon`) VALUES
(1, 'Biarin.com', '8danang8@gmail.com', 'http://biarin.ml', 'https://www.facebook.com/BiaRin-1576069672704396/', 'Bank Mandiin No Rek 126-00-0524455-9 atas nama Sujud Nakashima', '021. 32972759', 'Biarin.com adalah Situs Portal Berita Campuran', 'biarin, berita, info, politik, nasional, budaya, sepakbola, hiburan, kuliner, dunia islam', 'android-icon-48x48.png');

-- --------------------------------------------------------

--
-- Table structure for table `iklanatas`
--

CREATE TABLE IF NOT EXISTS `iklanatas` (
  `id_iklanatas` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `url` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL,
  PRIMARY KEY (`id_iklanatas`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=36 ;

--
-- Dumping data for table `iklanatas`
--

INSERT INTO `iklanatas` (`id_iklanatas`, `judul`, `username`, `url`, `gambar`, `tgl_posting`) VALUES
(35, '', 'admin', '#', 'promoiklan.gif', '2012-08-12');

-- --------------------------------------------------------

--
-- Table structure for table `iklantengah`
--

CREATE TABLE IF NOT EXISTS `iklantengah` (
  `id_iklantengah` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `url` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL,
  PRIMARY KEY (`id_iklantengah`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=32 ;

--
-- Dumping data for table `iklantengah`
--

INSERT INTO `iklantengah` (`id_iklantengah`, `judul`, `username`, `url`, `gambar`, `tgl_posting`) VALUES
(26, 'Banner Hijau', '', '#', 'Tengah2.jpg', '0000-00-00'),
(30, 'Banner Merah', '', '', 'Tengah1.jpg', '0000-00-00'),
(31, 'Ikasatya', '', 'http://www.ikasatya.org/', 'Atas1.jpg', '2016-03-28');

-- --------------------------------------------------------

--
-- Table structure for table `katajelek`
--

CREATE TABLE IF NOT EXISTS `katajelek` (
  `id_jelek` int(11) NOT NULL AUTO_INCREMENT,
  `kata` varchar(60) COLLATE latin1_general_ci DEFAULT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `ganti` varchar(60) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_jelek`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `katajelek`
--

INSERT INTO `katajelek` (`id_jelek`, `kata`, `username`, `ganti`) VALUES
(4, 'sex', '', 's**'),
(2, 'bajingan', '', 'b*******'),
(3, 'bangsat', '', 'b******');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(5) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `kategori_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id_kategori`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=54 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `username`, `kategori_seo`, `aktif`) VALUES
(19, 'Teknologi', '', 'teknologi', 'Y'),
(2, 'Olahraga', '', 'olahraga', 'Y'),
(21, 'Ekonomi', '', 'ekonomi', 'N'),
(22, 'Politik', '', 'politik', 'N'),
(23, 'Hiburan', '', 'hiburan', 'Y'),
(31, 'Kesehatan ', '', 'kesehatan-', 'Y'),
(36, 'Komunitas', '', 'komunitas', 'N'),
(34, 'Seni & Budaya', '', 'seni--budaya', 'N'),
(37, 'Sekitar Kita', '', 'sekitar-kita', 'N'),
(39, 'Internasional', '', 'internasional', 'Y'),
(40, 'Kuliner', '', 'kuliner', 'Y'),
(41, 'Metropolitan', '', 'metropolitan', 'N'),
(42, 'Dunia Islam', '', 'dunia-islam', 'N'),
(44, 'Wisata', '', 'wisata', 'N'),
(46, 'Daerah', '', 'daerah', 'N'),
(47, 'Gaya Hidup', '', 'gaya-hidup', 'N'),
(48, 'Hukum', '', 'hukum', 'N'),
(52, 'Sejarah Indonesia', 'admin', 'sejarah-indonesia', 'N'),
(53, 'Tokoh', 'admin', 'tokoh', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `id_komentar` int(5) NOT NULL AUTO_INCREMENT,
  `id_berita` int(5) NOT NULL,
  `nama_komentar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `url` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `isi_komentar` text COLLATE latin1_general_ci NOT NULL,
  `tgl` date NOT NULL,
  `jam_komentar` time NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_komentar`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=140 ;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_berita`, `nama_komentar`, `url`, `isi_komentar`, `tgl`, `jam_komentar`, `aktif`, `email`) VALUES
(139, 659, 'Sujud', 'sujud@gmail.kom', '  Ketampil ndak komentarku ?', '2016-04-01', '14:19:26', 'Y', ''),
(138, 672, 'Danbo', 'danang@gmail.kom', 'Uji komentar gan\r\n', '2016-04-01', '14:16:52', 'Y', '');

-- --------------------------------------------------------

--
-- Table structure for table `komentarvid`
--

CREATE TABLE IF NOT EXISTS `komentarvid` (
  `id_komentar` int(5) NOT NULL AUTO_INCREMENT,
  `id_video` int(5) NOT NULL,
  `nama_komentar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `url` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `isi_komentar` text COLLATE latin1_general_ci NOT NULL,
  `tgl` date NOT NULL,
  `jam_komentar` time NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id_komentar`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=107 ;

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE IF NOT EXISTS `logo` (
  `id_logo` int(5) NOT NULL AUTO_INCREMENT,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_logo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`id_logo`, `gambar`) VALUES
(15, 'Logo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `id_member` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id_member`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id_menu` int(5) NOT NULL AUTO_INCREMENT,
  `id_parent` int(5) NOT NULL DEFAULT '0',
  `nama_menu` varchar(30) NOT NULL,
  `link` varchar(100) NOT NULL,
  `aktif` enum('Ya','Tidak') NOT NULL DEFAULT 'Ya',
  PRIMARY KEY (`id_menu`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `id_parent`, `nama_menu`, `link`, `aktif`) VALUES
(9, 8, 'Hukum', 'kategori-48-hukum.html', 'Ya'),
(8, 0, 'Nasional', '#', 'Ya'),
(7, 0, 'Home', 'index.php', 'Ya'),
(11, 8, 'Politik', 'kategori-22-politik.html', 'Ya'),
(12, 8, 'Ekonomi', 'kategori-21-ekonomi.html', 'Ya'),
(13, 0, 'Internasional', 'kategori-39-internasional.html', 'Ya'),
(14, 0, 'Teknologi', 'kategori-19-teknologi.html', 'Ya'),
(18, 0, 'Olahraga', 'kategori-2-olahraga.html', 'Ya'),
(19, 0, 'Hiburan', 'kategori-23-hiburan.html', 'Ya'),
(20, 0, 'Metropolitan', 'kategori-41-metropolitan.html', 'Ya'),
(22, 39, 'Kuliner', 'kategori-40-kuliner.html', 'Ya'),
(23, 0, 'Video', 'semua-playlist.html', 'Tidak'),
(40, 39, 'Kesehatan', 'kategori-31-kesehatan.html', 'Ya'),
(39, 0, '+ Lainnya', '', 'Ya'),
(41, 0, 'Login', 'redaktur/index.php', 'Ya');

-- --------------------------------------------------------

--
-- Table structure for table `modul`
--

CREATE TABLE IF NOT EXISTS `modul` (
  `id_modul` int(5) NOT NULL AUTO_INCREMENT,
  `nama_modul` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `link` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `static_content` text COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `publish` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `status` enum('user','admin') COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `urutan` int(5) NOT NULL,
  `link_seo` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_modul`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=71 ;

--
-- Dumping data for table `modul`
--

INSERT INTO `modul` (`id_modul`, `nama_modul`, `username`, `link`, `static_content`, `gambar`, `publish`, `status`, `aktif`, `urutan`, `link_seo`) VALUES
(2, 'Manajemen User', '', '?module=user', '', '', 'Y', 'user', 'Y', 22, ''),
(18, ' Berita', '', '?module=berita', '', '', 'Y', 'user', 'Y', 5, 'semua-berita.html'),
(19, 'Iklan Utama', '', '?module=banner', '', '', 'N', 'user', 'N', 9, ''),
(10, 'Manajemen Modul', '', '?module=modul', '', '', 'Y', 'user', 'Y', 23, ''),
(31, 'Kategori Berita ', '', '?module=kategori', '', '', 'Y', 'user', 'Y', 6, ''),
(33, 'Jajak Pendapat', '', '?module=poling', '', '', 'Y', 'user', 'Y', 18, ''),
(34, 'Tag Berita', '', '?module=tag', '', '', 'Y', 'user', 'Y', 7, ''),
(35, 'Komentar Berita', '', '?module=komentar', '', '', 'Y', 'user', 'Y', 8, ''),
(41, 'Agenda Jakarta', '', '?module=agenda', '', '', 'Y', 'user', 'Y', 17, 'semua-agenda.html'),
(43, 'Berita Foto', '', '?module=album', '', '', 'Y', 'user', 'Y', 11, ''),
(44, 'Galeri Berita Foto', '', '?module=galerifoto', '', '', 'Y', 'user', 'Y', 12, ''),
(45, 'Template Web', '', '?module=templates', '', '', 'Y', 'user', 'Y', 16, ''),
(46, 'Sensor Kata', '', '?module=katajelek', '', '', 'Y', 'user', 'Y', 10, ''),
(61, 'Identitas Website', '', '?module=identitas', '', '', 'Y', 'user', 'Y', 1, ''),
(57, 'Menu Utama', '', '?module=menuutama', '', '', 'Y', 'user', 'Y', 2, ''),
(58, 'Sub Menu', '', '?module=submenu', '', '', 'Y', 'user', 'Y', 3, ''),
(59, 'Halaman Baru', '', '?module=halamanstatis', '', '', 'Y', 'user', 'Y', 4, ''),
(62, 'Video', '', '?module=video', '', '', 'Y', 'user', 'Y', 13, ''),
(63, 'Playlist Video', '', '?module=playlist', '', '', 'Y', 'user', 'Y', 14, ''),
(64, 'Tag Video', '', '?module=tagvid', '', '', 'Y', 'user', 'Y', 15, ''),
(65, 'Komentar Video', '', '?module=komentarvid', '', '', 'Y', 'user', 'Y', 15, ''),
(66, 'Logo Website', '', '?module=logo', '', '', 'Y', 'user', 'Y', 15, ''),
(67, 'Iklan Layanan', '', '?module=iklanatas', '', '', 'Y', 'user', 'Y', 19, ''),
(68, 'Iklan Depan', '', '?module=iklantengah', '', '', 'Y', 'user', 'Y', 20, ''),
(69, 'Iklan Kiri', '', '?module=pasangiklan', '', '', 'Y', 'user', 'Y', 21, ''),
(70, 'Hubungi Kami', '', '?module=hubungi', '', '', 'Y', 'user', 'Y', 24, '');

-- --------------------------------------------------------

--
-- Table structure for table `mod_alamat`
--

CREATE TABLE IF NOT EXISTS `mod_alamat` (
  `id_alamat` int(5) NOT NULL AUTO_INCREMENT,
  `alamat` varchar(250) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_alamat`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `mod_alamat`
--

INSERT INTO `mod_alamat` (`id_alamat`, `alamat`) VALUES
(1, '<p>\r\nJl. Kalibata Selatan II/2B\r\n</p>\r\n<p>\r\nJakarta 12740 \r\n</p>\r\n<p>\r\nIndonesia \r\n</p>\r\n<p>\r\nTelp. 021.32972759\r\n</p>\r\n<p>\r\nEmail: <a href="mailto:rizal_fzl@yahoo.com">rizal_fzl@yahoo.com</a> \r\n</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `mod_ym`
--

CREATE TABLE IF NOT EXISTS `mod_ym` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `mod_ym`
--

INSERT INTO `mod_ym` (`id`, `nama`, `username`) VALUES
(1, 'Danang Priabada', 'danboru');

-- --------------------------------------------------------

--
-- Table structure for table `pasangiklan`
--

CREATE TABLE IF NOT EXISTS `pasangiklan` (
  `id_pasangiklan` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `url` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL,
  PRIMARY KEY (`id_pasangiklan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=31 ;

--
-- Dumping data for table `pasangiklan`
--

INSERT INTO `pasangiklan` (`id_pasangiklan`, `judul`, `username`, `url`, `gambar`, `tgl_posting`) VALUES
(23, 'FTI UKSW', 'admin', '', '303222logofti.jpg', '2011-06-22'),
(26, 'UKSW Salatiga', 'admin', '', '198547logoswcu.jpg', '2011-09-29'),
(28, 'Ikasatya Live Streaming', 'admin', '', '350952jadi.jpg', '2012-11-22'),
(29, 'SWS', 'admin', 'http://', '181808bvFf7wc-.jpg', '2016-04-02'),
(30, 'LK', 'admin', '', '340247qcc9bnp6zv291xb9oylx.jpeg', '2016-04-02');

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

CREATE TABLE IF NOT EXISTS `playlist` (
  `id_playlist` int(5) NOT NULL AUTO_INCREMENT,
  `jdl_playlist` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `playlist_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `gbr_playlist` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id_playlist`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=59 ;

--
-- Dumping data for table `playlist`
--

INSERT INTO `playlist` (`id_playlist`, `jdl_playlist`, `username`, `playlist_seo`, `gbr_playlist`, `aktif`) VALUES
(58, 'FTI', 'admin', 'fti', '243932Screenshot_32.png', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `poling`
--

CREATE TABLE IF NOT EXISTS `poling` (
  `id_poling` int(5) NOT NULL AUTO_INCREMENT,
  `pilihan` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `status` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `rating` int(5) NOT NULL DEFAULT '0',
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_poling`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=31 ;

--
-- Dumping data for table `poling`
--

INSERT INTO `poling` (`id_poling`, `pilihan`, `status`, `username`, `rating`, `aktif`) VALUES
(18, 'Siapa yang belum punya Pacar di sini ?', 'Pertanyaan', 'admin', 0, 'Y'),
(26, 'Anda', 'Jawaban', 'admin', 13, 'Y'),
(25, 'Mereka', 'Jawaban', 'admin', 4, 'Y'),
(30, 'Saya', 'Jawaban', 'admin', 0, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `sekilasinfo`
--

CREATE TABLE IF NOT EXISTS `sekilasinfo` (
  `id_sekilas` int(5) NOT NULL AUTO_INCREMENT,
  `info` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id_sekilas`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `sekilasinfo`
--

INSERT INTO `sekilasinfo` (`id_sekilas`, `info`, `tgl_posting`, `gambar`, `aktif`) VALUES
(1, 'Anak yang mengalami gangguan tidur, cenderung memakai obat2an dan alkohol berlebih saat dewasa.', '2010-04-11', '', 'Y'),
(2, 'WHO merilis, 30 persen anak-anak di dunia kecanduan menonton televisi dan bermain komputer.', '0000-00-00', '', 'Y'),
(3, 'Menurut peneliti di Detroit, orang yang selalu tersenyum lebar cenderung hidup lebih lama.', '2010-04-11', '', 'Y'),
(4, 'Menurut United Stated Trade Representatives, 25% obat yang beredar di Indonesia adalah palsu.', '2010-04-11', '', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `statistik`
--

CREATE TABLE IF NOT EXISTS `statistik` (
  `ip` varchar(20) NOT NULL DEFAULT '',
  `tanggal` date NOT NULL,
  `hits` int(10) NOT NULL DEFAULT '1',
  `online` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statistik`
--

INSERT INTO `statistik` (`ip`, `tanggal`, `hits`, `online`) VALUES
('127.0.0.2', '2009-09-11', 1, '1252681630'),
('127.0.0.1', '2013-01-22', 1, '1358865974'),
('127.0.0.1', '2013-01-23', 14, '1358913313'),
('127.0.0.1', '2013-01-24', 34, '1359046647'),
('127.0.0.1', '2013-01-25', 21, '1359051663'),
('127.0.0.1', '2016-03-28', 207, '1459183347'),
('127.0.0.1', '2016-03-29', 17, '1459185140'),
('36.84.0.148', '2016-03-30', 42, '1459341511'),
('36.84.0.26', '2016-03-30', 71, '1459339306'),
('36.84.0.30', '2016-03-30', 86, '1459339685'),
('36.84.0.151', '2016-03-30', 2, '1459331742'),
('36.84.0.78', '2016-03-30', 2, '1459331962'),
('36.84.0.31', '2016-03-30', 3, '1459332266'),
('107.178.194.56', '2016-03-30', 1, '1459332837'),
('107.178.194.54', '2016-03-30', 1, '1459332838'),
('107.178.194.52', '2016-03-30', 1, '1459332838'),
('36.84.0.199', '2016-03-30', 31, '1459335603'),
('173.252.74.112', '2016-03-30', 1, '1459335252'),
('173.252.74.117', '2016-03-30', 2, '1459336271'),
('173.252.74.109', '2016-03-30', 1, '1459335372'),
('36.84.0.200', '2016-03-30', 23, '1459337294'),
('173.252.74.104', '2016-03-30', 1, '1459336490'),
('36.84.0.201', '2016-03-30', 23, '1459339018'),
('69.63.188.221', '2016-03-30', 1, '1459338260'),
('69.63.188.201', '2016-03-30', 1, '1459338285'),
('69.63.188.205', '2016-03-30', 1, '1459338431'),
('69.63.188.196', '2016-03-30', 1, '1459338755'),
('69.171.228.116', '2016-03-30', 1, '1459338980'),
('173.252.105.118', '2016-03-30', 1, '1459338980'),
('66.220.145.243', '2016-03-30', 1, '1459338997'),
('69.171.228.117', '2016-03-30', 1, '1459339091'),
('69.171.228.120', '2016-03-30', 1, '1459339091'),
('69.63.188.199', '2016-03-30', 1, '1459339136'),
('173.252.74.121', '2016-03-30', 1, '1459339458'),
('173.252.74.102', '2016-03-30', 1, '1459339689'),
('202.67.41.51', '2016-03-30', 2, '1459341508'),
('36.80.150.12', '2016-03-30', 20, '1459344106'),
('66.249.84.92', '2016-03-30', 1, '1459342019'),
('66.249.85.141', '2016-03-30', 1, '1459342652'),
('168.235.207.58', '2016-03-30', 8, '1459343891'),
('8.37.70.171', '2016-03-30', 1, '1459344082'),
('36.84.0.82', '2016-03-30', 6, '1459346059'),
('107.23.6.162', '2016-03-30', 1, '1459349194'),
('36.80.150.12', '2016-03-31', 86, '1459433591'),
('168.235.207.58', '2016-03-31', 2, '1459393043'),
('36.84.0.165', '2016-03-31', 21, '1459398628'),
('36.84.0.100', '2016-03-31', 7, '1459403171'),
('36.84.0.220', '2016-03-31', 21, '1459407181'),
('69.63.188.213', '2016-03-31', 1, '1459400177'),
('173.252.74.101', '2016-03-31', 1, '1459403188'),
('107.170.73.79', '2016-03-31', 1, '1459407039'),
('69.63.188.215', '2016-03-31', 1, '1459419053'),
('173.252.115.91', '2016-03-31', 1, '1459419057'),
('168.235.194.200', '2016-03-31', 1, '1459419117'),
('69.63.188.223', '2016-03-31', 1, '1459419299'),
('69.63.188.211', '2016-03-31', 1, '1459419325'),
('222.124.21.116', '2016-03-31', 4, '1459421198'),
('66.220.145.246', '2016-03-31', 2, '1459424058'),
('168.235.205.126', '2016-03-31', 1, '1459420721'),
('188.166.244.219', '2016-03-31', 1, '1459423252'),
('8.37.70.104', '2016-03-31', 1, '1459424809'),
('182.253.163.114', '2016-03-31', 15, '1459441362'),
('107.23.6.162', '2016-04-01', 1, '1459446923'),
('36.84.0.119', '2016-04-01', 3, '1459456857'),
('202.67.40.215', '2016-04-01', 5, '1459469827'),
('168.235.207.58', '2016-04-01', 8, '1459472606'),
('180.246.92.192', '2016-04-01', 84, '1459497158'),
('69.63.188.219', '2016-04-01', 1, '1459494939'),
('173.252.115.87', '2016-04-01', 1, '1459494969'),
('173.252.105.115', '2016-04-01', 1, '1459494969'),
('69.63.188.211', '2016-04-01', 1, '1459495405'),
('69.63.188.208', '2016-04-01', 1, '1459495454'),
('222.124.21.116', '2016-04-02', 1, '1459563601'),
('202.67.40.31', '2016-04-02', 1, '1459564277'),
('36.84.0.185', '2016-04-02', 4, '1459572996'),
('66.249.84.94', '2016-04-02', 1, '1459581384'),
('36.84.0.182', '2016-04-02', 1, '1459582391'),
('36.84.0.113', '2016-04-02', 2, '1459585475'),
('199.30.228.145', '2016-04-02', 1, '1459590822'),
('180.246.92.40', '2016-04-02', 25, '1459615621'),
('36.73.26.243', '2016-04-03', 52, '1459682324'),
('69.63.188.222', '2016-04-03', 1, '1459666178'),
('66.249.85.141', '2016-04-03', 1, '1459671058'),
('180.246.60.51', '2016-04-03', 6, '1459687512'),
('36.84.0.78', '2016-04-03', 1, '1459690150'),
('66.249.84.93', '2016-04-04', 1, '1459733821'),
('36.84.0.51', '2016-04-04', 3, '1459734182'),
('36.84.0.172', '2016-04-04', 2, '1459734152'),
('36.84.0.53', '2016-04-04', 4, '1459741748'),
('36.73.26.243', '2016-04-04', 6, '1459785678'),
('36.84.0.125', '2016-04-04', 3, '1459784284'),
('66.249.85.145', '2016-04-05', 1, '1459824318'),
('36.84.0.198', '2016-04-05', 2, '1459852242'),
('180.246.100.138', '2016-04-05', 5, '1459832306'),
('180.246.60.51', '2016-04-05', 2, '1459842167'),
('36.84.0.207', '2016-04-05', 5, '1459845258'),
('159.253.145.150', '2016-04-05', 4, '1459845945'),
('36.84.0.157', '2016-04-05', 24, '1459847126'),
('69.63.188.215', '2016-04-05', 1, '1459846120'),
('69.63.188.208', '2016-04-05', 1, '1459846233'),
('69.63.188.217', '2016-04-05', 1, '1459846312'),
('69.63.188.222', '2016-04-05', 1, '1459846882'),
('208.123.223.254', '2016-04-05', 3, '1459849317'),
('36.73.26.243', '2016-04-05', 2, '1459851855'),
('8.37.70.248', '2016-04-05', 1, '1459858965'),
('36.80.119.183', '2016-04-05', 1, '1459875503'),
('36.80.119.183', '2016-04-06', 53, '1459936234'),
('114.120.236.161', '2016-04-06', 3, '1459898728'),
('150.70.188.180', '2016-04-06', 1, '1459898761'),
('202.67.41.51', '2016-04-06', 1, '1459903733'),
('168.235.207.58', '2016-04-06', 2, '1459903887'),
('168.235.205.49', '2016-04-06', 1, '1459904019'),
('120.169.255.6', '2016-04-06', 9, '1459905913'),
('120.164.44.20', '2016-04-06', 1, '1459907144'),
('222.124.21.116', '2016-04-06', 5, '1459908525'),
('66.249.85.137', '2016-04-06', 1, '1459914731'),
('36.84.0.113', '2016-04-06', 1, '1459931766'),
('66.249.85.141', '2016-04-07', 1, '1460003607');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
  `id_tag` int(5) NOT NULL AUTO_INCREMENT,
  `nama_tag` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `tag_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `count` int(5) NOT NULL,
  PRIMARY KEY (`id_tag`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=49 ;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id_tag`, `nama_tag`, `username`, `tag_seo`, `count`) VALUES
(30, 'Pendidikan', '', 'pendidikan', 7),
(29, 'Ekonomi', '', 'ekonomi', 7),
(22, 'Hiburan', '', 'hiburan', 31),
(28, 'Teknologi', '', 'teknologi', 18),
(27, 'Metropolitan', '', 'metropolitan', 33),
(26, 'Nasional', '', 'nasional', 50),
(25, 'Kesehatan', '', 'kesehatan', 20),
(24, 'Olahraga', '', 'olahraga', 25),
(23, 'Dunia Islam', '', 'dunia-islam', 40),
(21, 'Kuliner', '', 'kuliner', 18),
(20, 'Komunitas', '', 'komunitas', 2),
(31, 'Politik', '', 'politik', 19),
(32, 'Seni & Budaya', '', 'seni--budaya', 4),
(33, 'Sekitar Kita', '', 'sekitar-kita', 14),
(34, 'Wisata', '', 'wisata', 4),
(35, 'Gaya Hidup', '', 'gaya-hidup', 5),
(36, 'Hukum', '', 'hukum', 15),
(37, 'Film', '', 'film', 30),
(38, 'Musik', '', 'musik', 14),
(39, 'Daerah', '', 'daerah', 23),
(40, 'Internasional', '', 'internasional', 34),
(41, 'Bola', '', 'bola', 20),
(42, 'Televisi', '', 'televisi', 8),
(43, 'Selebritis', '', 'selebritis', 10),
(44, 'Tragedi Tugu Tani', '', 'tragedi-tugu-tani', 3),
(45, 'Pilkada DKI', '', 'pilkada-dki', 0),
(46, 'Tokoh', '', 'tokoh', 0),
(47, 'Piala Eropa', '', 'piala-eropa', 23),
(48, 'Sejarah Indonesia', 'admin', 'sejarah-indonesia', 18);

-- --------------------------------------------------------

--
-- Table structure for table `tagvid`
--

CREATE TABLE IF NOT EXISTS `tagvid` (
  `id_tag` int(5) NOT NULL AUTO_INCREMENT,
  `nama_tag` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `tag_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `count` int(5) NOT NULL,
  PRIMARY KEY (`id_tag`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=35 ;

--
-- Dumping data for table `tagvid`
--

INSERT INTO `tagvid` (`id_tag`, `nama_tag`, `username`, `tag_seo`, `count`) VALUES
(34, 'FTI UKSW', 'admin', 'fti-uksw', 1);

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE IF NOT EXISTS `templates` (
  `id_templates` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `pembuat` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `folder` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id_templates`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id_templates`, `judul`, `username`, `pembuat`, `folder`, `aktif`) VALUES
(12, 'Biru', 'admin', 'Anonymous', 'layout/biru', 'N'),
(13, 'Merah', 'admin', 'Anonymous', 'layout/merah', 'Y'),
(16, 'Hijau', 'admin', 'Anonymous', 'layout/hijau', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `no_telp` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `foto` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT 'user',
  `blokir` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `id_session` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `nama_lengkap`, `email`, `no_telp`, `foto`, `level`, `blokir`, `id_session`) VALUES
('admin', '9c41af60be4960b077fbb657de781757', 'Danang Priabada', '8danang8@gmail.com', '', '1211914588_865578856845257_2685770706950882091_n.jpg', 'admin', 'N', 'q173s8hs1jl04st35169ccl8o7'),
('sujud', '08f9362e2a740e71e1bb1f1630dba8ce', 'Sujud Fitri Ala.i', 'sujudnakashima@ymail.com', '', '64Screenshot_30.png', 'user', 'N', '08f9362e2a740e71e1bb1f1630dba8ce'),
('zeno', 'eb55c7896be0d6ceafc3fe83c62c2a48', 'Afrienta Zeno', 'afrientazeno@ymail.com', '', '9210273597_739934152696326_7721022441628814074_n.jpg', 'user', 'N', 'eb55c7896be0d6ceafc3fe83c62c2a48'),
('susilo', 'ca910a634a219e007e257767474cc46e', 'Tri Susilo', 'susilo@gmail.com', '', '7111008525_804039549665928_2403332887660414684_n.jpg', 'user', 'N', 'ca910a634a219e007e257767474cc46e');

-- --------------------------------------------------------

--
-- Table structure for table `users_modul`
--

CREATE TABLE IF NOT EXISTS `users_modul` (
  `id_umod` int(11) NOT NULL AUTO_INCREMENT,
  `id_session` varchar(100) NOT NULL,
  `id_modul` int(11) NOT NULL,
  PRIMARY KEY (`id_umod`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=356 ;

--
-- Dumping data for table `users_modul`
--

INSERT INTO `users_modul` (`id_umod`, `id_session`, `id_modul`) VALUES
(355, '08f9362e2a740e71e1bb1f1630dba8ce', 62),
(354, '08f9362e2a740e71e1bb1f1630dba8ce', 46),
(353, '08f9362e2a740e71e1bb1f1630dba8ce', 44),
(352, '08f9362e2a740e71e1bb1f1630dba8ce', 43),
(351, '08f9362e2a740e71e1bb1f1630dba8ce', 41),
(350, '08f9362e2a740e71e1bb1f1630dba8ce', 35),
(349, '08f9362e2a740e71e1bb1f1630dba8ce', 34),
(348, '08f9362e2a740e71e1bb1f1630dba8ce', 33),
(347, '08f9362e2a740e71e1bb1f1630dba8ce', 31),
(345, '08f9362e2a740e71e1bb1f1630dba8ce', 18),
(346, '08f9362e2a740e71e1bb1f1630dba8ce', 10);

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `id_video` int(5) NOT NULL AUTO_INCREMENT,
  `id_playlist` int(5) NOT NULL,
  `username` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `jdl_video` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `video_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `keterangan` text COLLATE latin1_general_ci NOT NULL,
  `gbr_video` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `video` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `youtube` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `dilihat` int(7) NOT NULL DEFAULT '1',
  `hari` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `tagvid` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_video`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=159 ;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id_video`, `id_playlist`, `username`, `jdl_video`, `video_seo`, `keterangan`, `gbr_video`, `video`, `youtube`, `dilihat`, `hari`, `tanggal`, `jam`, `tagvid`) VALUES
(158, 58, 'admin', 'FTI Days', 'fti-days', 'Kenangan FTI DAYS 2014\r\n', '839764Screenshot_2.png', '', 'https://www.youtube.com//embed/TszbtwDDqxs', 7, 'Jumat', '2016-04-01', '10:07:13', 'fti-uksw');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
