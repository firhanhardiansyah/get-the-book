-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2020 at 03:24 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ebook_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `banner_id` int(10) NOT NULL,
  `banner` varchar(100) NOT NULL,
  `gambar` varchar(150) NOT NULL,
  `link` varchar(500) NOT NULL,
  `status` enum('on','off') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`banner_id`, `banner`, `gambar`, `link`, `status`) VALUES
(1, 'Si Juki', 'Banner-Komat-Kamit_MEI_STOREFRONT.jpg', 'index.php?page=detail&ebook_id=4', 'on'),
(2, 'di rumah aja', 'myvalue_storefront.jpg', 'index.php?page=detail&ebook_id=6', 'on');

-- --------------------------------------------------------

--
-- Table structure for table `ebook`
--

CREATE TABLE `ebook` (
  `ebook_id` int(10) NOT NULL,
  `kategori_id` int(10) NOT NULL,
  `nama_ebook` varchar(250) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(300) NOT NULL,
  `harga` int(10) NOT NULL,
  `stok` tinyint(1) NOT NULL,
  `status` enum('on','off') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ebook`
--

INSERT INTO `ebook` (`ebook_id`, `kategori_id`, `nama_ebook`, `penulis`, `deskripsi`, `gambar`, `harga`, `stok`, `status`) VALUES
(1, 1, 'Light Novel Naruto: Tale Of The Utterly Gutsy Shinobi', 'MASASHI KISHIMOTO & AKIRA HIGASHIYAMA', '<p>Apakah arti `ninja`? Naruto Musasabi, seorang ninja Desa Shuku, percaya bahwa ninja adalah orang yang bisa bertahan. Saat tersiar kabar bahwa sebuah kinjutsu mematikan bernama Gukoizan telah disempurnakan dan menghancurkan sebuah desa, salah satu rekannya, Renge, dikabarkan telah kabur dari Shuku dan terlibat dalam kinjutsu itu. Bersama dengan seorang rekan lainnya, Tsuyu, Naruto pergi dalam misi mengejar Renge dan membawanya kembali ke desa. Akankah sang ninja penuh keberanian itu bisa mempertahankan kepercayaannya sampai akhir di tengah kemelut yang dihadapinya?</p>', 'Light_Novel_Naruto_Tale_of_the_Utterly_Gutsy_Shinobi__w414_hauto.jpg', 74000, 12, 'on'),
(2, 2, 'Antipanik! Buku Panduan Virus Corona', 'dr. Jaka Pradipta, Sp.P dan dr. Ahmad Muslim Nazaruddin, Sp.P', '<p>Tepat 11 Maret 2020, WHO secara resmi menyatakan COVID-19 sebagai pandemi. Pandemi adalah wabah atau penyakit yang berjangkit secara bersamaan dengan penyebaran secara global di seluruh dunia. Semua warga dunia dihimbau agar lebih meningkatkan kewaspadaan dalam mencegah maupun menangani COVID-19. Anda tidak perlu panik! Sejatinya penyakit ini dapat sembuh dengan imunitas tubuh yang baik. Langkah perlindungan yang menjadi tanggung jawab kita adalah lindungi diri sendiri, lindungi keluarga kita, dan lindungi rumah kita dengan berbagai cara yang dapat Anda baca selengkapnya dalam buku ini.</p>', '9786230017162_ANTIPANIK_Buku_Panduan_Virus_Corona__w414_hauto.jpg', 60000, 20, 'on'),
(3, 1, 'One Punch Man 20', 'One & Yusuke Murata', '<p>Bahkan menjelang saat-saat penyerbuan pun para Hero level S masih belum bisa sepakat. Kedatangan Sweet Mask yang juga ingin ikut menyerbu malah semakin memperkeruh keadaan. Yang mengingatkan kembali mereka pada kewajiban mereka sebagai Hero adalah King, si manusia terkuat.</p>', '9786230015342_cover_Onepunch_man_20-1__w414_hauto.jpg', 28000, 10, 'on'),
(4, 1, 'One Piece 92', 'Eiichiro Oda', '<p>Makhluk terkuat muncul! Kaido yang tiba-tiba muncul di hadapan semua orang dengan wujud naga raksasa, menembakkan Boro Breath ke arah Nami dan kawan-kawan! Luffy yang marah karena teman-temannya diserang, menghujani Kaido dengan tinju segenap tenaganya, tapi bagaimana hasilnya? Simak kisah petualangan di lautan, One Piece!!</p>', '9786230014857_Cov_One_Piece_92__w414_hauto.jpg', 22400, 30, 'on'),
(5, 3, 'Mengupas Rahasia Tersembunyi Photoshop', 'Jubilee Enterprise', '<p>Photoshop memiliki ratusan perintah, menu, dan fitur lain untuk mendukung pekerjaan seorang fotografer, desainer grafis, ilustrator, dan pekerja kreatif lainnya. Di antara ratusan perintah dan puluhan tool serta fitur itu, ada yang jarang dipakai, tidak begitu diketahui penggunaannya, atau sulit dipahami oleh pengguna awam. Padahal jika kita bisa memakainya, pekerjaan akan lebih cepat selesai dengan hasil yang lebih bagus pula. Buku ini secara khusus mengupas perintah, fitur, menu, dan tool Photoshop dengan lebih mendalam, khususnya yang jarang digunakan karena terlalu sulit dipahami. Misalnya apa? Sebut saja, Levels dan Curves. Selain itu, Anda juga akan mempelajari langkah-langkah secara detail bagaimana tool seleksi dan menu Select bekerja untuk mengisolasi objek di dalam kanvas. Jadi, jika Anda sudah merasa jago di bidang Photoshop, mari membaca buku ini untuk menguji kemampuan Anda. Dengan demikian, kemampuan Anda bisa meningkat pesat setelah mengetahui aneka perintah dan fitur yang keren tetapi hanya diketahui oleh pengguna level menengah dan mahir saja. (thinkjubilee.com).</p>', '9786230016172_Cov_Mengupas_Rahasia_Tersembunyi_Photoshop__w414_hauto.jpg', 65000, 20, 'on'),
(6, 3, 'Belajar Sendiri Adobe Photoshop Cc 2020', 'Jubilee Enterprise', '<p>Photoshop CC 2020 merupakan peranti lunak versi paling mutakhir yang dapat dimanfaatkan untuk pembuatan desain, ilustrasi, dan mengedit foto-foto digital. Buku ini ditulis bagi pengguna pemula yang ingin mempelajari Photoshop. Materi yang disajikan mencakup: &bull; Pengenalan Photoshop CC 2020. &bull; Menggunakan tool-tool standar yang sering digunakan. &bull; Menulis teks di dalam kanvas. &bull; Membuat seleksi dan mengenal Select and Mask. &bull; Pengenalan Layers dan pembuatan layer mask. &bull; Mengenal dan mengoptimalkan Channel untuk seleksi. &bull; Memanfaatkan adjustment layer. &bull; Pengenalan terhadap menu Filters. &bull; Dan sebagainya. Buku ini juga dilengkapi dengan video tutorial-video tutorial yang di-posting di Youtube dan Udemy untuk semua orang. Semakin sering Anda melihat video tutorial, maka semakin canggih pengetahuan Anda dalam dunia desain grafis.</p>', '9786230015830_Cov_Belajar_Sendiri_Adobe_Photoshop__w414_hauto.jpg', 70000, 10, 'on'),
(7, 4, 'Kartun Fisika (2020)', 'Larry Gonick', '<p>Kamu tidak perlu menjadi ilmuwan untuk mengerti berbagai soal berikut ini atau pun gagasan lain yang lebih rumit, karena Kartun Fisika telah menjabarkan semua bahasan ini: kecepatan, percepatan, ledakan, listrik dan magnet, rangkaian&mdash;bahkan yang sedikit berbau teori relativitas, dan banyak tagi, secara sederhana, jernih, dan tentu saja, dengan ilustrasi yang lucu. Itmu fisika jadi tampak beda! Jika kamu mengira muatan listrik negatif adalah sesuatu yang muncul pada tagihan kartu kredit, jika kamu membayangkan Hukum Ohm menentukan berapa tama kamu harus bermeditasi, dan jika kamu percaya mekanika Newton dapat memperbaiki mobil, kamu perlu Kartun Fisika untuk meluruskan pengertianmu.</p>', 'fisika__w414_hauto.jpg', 75000, 12, 'on');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(10) NOT NULL,
  `kategori` varchar(150) NOT NULL,
  `status` enum('on','off') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori`, `status`) VALUES
(1, 'Komik', 'on'),
(2, 'Kesehatan', 'on'),
(3, 'Komputer & Teknologi', 'on'),
(4, 'Pendidikan', 'on');

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi_pembayaran`
--

CREATE TABLE `konfirmasi_pembayaran` (
  `konfirmasi_id` int(10) NOT NULL,
  `pesanan_id` int(10) NOT NULL,
  `nomor_rekening` varchar(20) NOT NULL,
  `nama_account` varchar(150) NOT NULL,
  `total_pembayaran` int(10) NOT NULL,
  `tanggal_transfer` date NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `kota_id` int(10) NOT NULL,
  `kota` varchar(150) NOT NULL,
  `tarif` int(10) NOT NULL,
  `status` enum('on','off') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `pesanan_id` int(10) NOT NULL,
  `kota_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `nama_penerima` varchar(150) NOT NULL,
  `nomor_telepon` varchar(15) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `tanggal_pemesanan` datetime NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pesanan_detail`
--

CREATE TABLE `pesanan_detail` (
  `pesanan_id` int(10) NOT NULL,
  `buku_id` int(10) NOT NULL,
  `quantity` tinyint(2) NOT NULL,
  `harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `level` varchar(30) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `email` varchar(160) NOT NULL,
  `alamat` varchar(400) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(300) NOT NULL,
  `status` enum('on','off') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `level`, `nama`, `email`, `alamat`, `phone`, `password`, `status`) VALUES
(1, 'superadmin', 'admin', 'admin@gmail.com', 'jalan menteng', '08123456789', '0192023a7bbd73250516f069df18b500', 'on'),
(2, 'customer', 'firhan hardiansyah', 'firhan.hardiansyah11@gmail.com', 'jalan jalan', '0821321321', '202cb962ac59075b964b07152d234b70', 'on'),
(3, 'customer', 'alizar alam', 'alizar@gmail.com', 'bbc', '087321321', '202cb962ac59075b964b07152d234b70', 'on');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `ebook`
--
ALTER TABLE `ebook`
  ADD PRIMARY KEY (`ebook_id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  ADD PRIMARY KEY (`konfirmasi_id`),
  ADD KEY `pesanan_id` (`pesanan_id`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`kota_id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`pesanan_id`),
  ADD KEY `kota_id` (`kota_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `pesanan_detail`
--
ALTER TABLE `pesanan_detail`
  ADD KEY `pesanan_id` (`pesanan_id`),
  ADD KEY `barang_id` (`buku_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `banner_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ebook`
--
ALTER TABLE `ebook`
  MODIFY `ebook_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  MODIFY `konfirmasi_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `kota_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `pesanan_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ebook`
--
ALTER TABLE `ebook`
  ADD CONSTRAINT `ebook_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`kategori_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  ADD CONSTRAINT `konfirmasi_pembayaran_ibfk_1` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanan` (`pesanan_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`kota_id`) REFERENCES `kota` (`kota_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pesanan_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pesanan_detail`
--
ALTER TABLE `pesanan_detail`
  ADD CONSTRAINT `pesanan_detail_ibfk_1` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanan` (`pesanan_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pesanan_detail_ibfk_2` FOREIGN KEY (`buku_id`) REFERENCES `ebook` (`ebook_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
