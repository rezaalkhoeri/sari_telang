-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 17, 2022 at 03:22 AM
-- Server version: 10.5.12-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u699170356_db_saritelang`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `deskripsi` mediumtext DEFAULT NULL,
  `gambar` text DEFAULT NULL,
  `berat` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`id_barang`, `nama_barang`, `id_kategori`, `harga`, `deskripsi`, `gambar`, `berat`, `stok`, `status`) VALUES
(1, 'Garam Himalaya', 18, 6000, 'Garam Himalaya adalah garam gunung berbentuk kristal yang ditambang dari pertambangan garam di Khewra, distrik Jhelum di Punjab, Pakistan. Tambang ini merupakan kawasan pertambangan garam tertua dan salah satu yang terbesar di dunia.', '11.jpg', 100, 3, 1),
(2, 'Garam Masala', 18, 9000, 'Garam masala adalah bubuk rempah-rempah hasil racikan untuk masakan India. Dalam bahasa Hindi, garam berarti panas, dan masala berarti racikan rempah-rempah. Bubuk ini ditambahkan ke dalam masakan sebagai penambah aroma.', '9.jpg', 100, 0, 1),
(3, 'Garam Laut Bali', 18, 16500, 'Pantai Kusamba, sebelah timur pulau Bali, terkenal dengan garam lautnya yang berkualitas tinggi dan kaya akan kandungan mineral alami nya. Proses pembuatan Garam Kusamba masih sangat alami dan tradisional ; telah dilakukan berabad-abad secara turun temurun di Kusamba. Semua pengerjaannya dilakukan dengan tangan (handmade) oleh petani garam, dengan bantuan sinar matahari.', '131.jpg', 250, 0, 1),
(4, 'Garam Hitam Kalamanak', 18, 65000, 'Garam hitam, atau Kala namak, berwarna coklat gelap (hampir hitam) \r\nIa memiliki bau belerang - seperti telur rebus - dari kandungan belerang alami.\r\nKala namak kaya akan zat besi, itulah mengapa warnanya sangat gelap.\r\nGaram ini dipanen dari tambang garam alami di India Utara dan Pakistan.\r\nGaram hitam digunakan secara luas dalam pengobatan Ayurvedic, dan sebagai bumbu dalam masakan India. ', '5.jpg', 500, 0, 1),
(5, 'Garam Epsom', 18, 45000, 'Garam epsom termasuk mineral alami, dengan senyawa magnesium dan sulfat di dalamnya. Rasanya juga berbeda dengan garam masakan, yang cenderung asin dan pahit. Lantas, apa saja manfaat garam epsom? Manfaat garam epsom yang pertama adalah meringankan rasa sakit dan nyeri akibat aktivitas yang berat.', '6.jpg', 250, 0, 1),
(6, 'Chia Seed Putih Organik', 16, 25000, 'Organik white chiasees meksiko\r\nNetto 100gram ', '12.jpg', 100, 0, 1),
(7, 'Wijen Panggang', 16, 9000, 'Wijen merupakan sumber asam amino esensial yakni salah satu jenis asam amino yang harus didatangkan dari luar tubuh manusia, Vitamin  yang terdapat dalam biji wijen penting dalam mempertahankan stabilitas dan kesehatan limfa.\r\nWijen juga berkhasiat untuk pencegahan, pengobatan dan perawatan. Untuk langkah preventif wijen berguna mencegah kerontokan rambut, penuaan, kanker, penyakit degenaratif, rambut beruban, stroke, hipertensi dan lain-lain.', '2.jpg', 100, 0, 1),
(8, 'Biji Labu Mentah', 16, 10000, 'Merupakan biji yang mengandung mineral seperti Magnesium, Zink, Mangan, Fosfor, Zat Besi & Tembaga. Biji labu juga merupakan sumber Protein, Omega-3. Omega-6 & Vitamin E dalam biji labu dalam bentuk alpha-tocopherol.\r\n', '32.jpg', 100, 0, 1),
(9, 'Mix Lentils ', 16, 8500, 'Lentil sumber nutrisi yang kaya akan protein & karbohidrat, zat besi, asam folat dan fiber yg diperlukan untuk tubuh kita, serta dapat dijadikan sebagai sumber zat besi non-hewani. ', '41.jpg', 100, 0, 1),
(10, 'Biji Bunga Matahari Panggang', 16, 7500, 'Biji bunga matahari adalah sumber vitamin E yang hebat, yang tidak hanya berperan dalam pencegahan penyakit kardiovaskular tetapi juga dianggap sebagai anti-oksidan yang membantu menjaga radikal bebas dari pengoksidasi kolesterol. Vitamin E memiliki khasiat antiinflamasi yang signifikan untuk itu, jadi ini adalah makanan ringan yang lezat bagi siapa saja yang memiliki penyakit peradangan. ', '251.jpg', 100, 0, 1),
(11, 'Kacang Pistachio ', 17, 57000, 'Pistachio Kernel makanan sehat alami kacang pistachio tanpa kulit , salah satu pilihan cemilan sehat. Rasanya gurih. ', '14.jpg', 100, 0, 1),
(12, 'Kacang Polong Belah', 17, 8000, 'kacang polong hijau yang Lezat, bergizi, makanan serbaguna yang memasak untuk konsistensi krim, dijadikan salad, sup, sayuran, dijadikan bahan tepung dan lain-lain.', '16.jpg', 100, 0, 1),
(13, 'Kacang Hitam', 17, 6000, 'Manfaat Black turtle untuk kesehatan meliputi pencegahan penyakit kardiovaskular hingga mengurangi risiko beberapa jenis kanker. ', '121.jpg', 100, 0, 1),
(14, 'Kacang Walnut', 17, 23500, 'Kacang Walnut merupakan makanan yang kaya antioksidan yaitu bermanfaat mampu menetralisir radikal bebas dan mencegah kerusakan yang ditimbulkan radikal bebas.', '321.jpg', 100, 0, 1),
(15, 'Kacang Mede Panggang', 17, 103000, 'Non Kolesterol, Karena di Panggang Tanpa Minyak apapun.\r\nHomemade Roasted Cashew, mete panggang di olah dengan higienis, tanpa penambahan rasa, tanpa penambahan MSG, tanpa pengawet, tanpa Garam ', '20.jpg', 500, 0, 1),
(16, 'Bunga Telang Kering', 15, 27000, 'Bunga telang biasanya dikenal sebagai bahan pewarna alami, tetapi tidak hanya itu, bunga telang memiliki banyak manfaat seperti untuk detoksifikasi dan sifatnya yang anti depresan, sehingga mengurangi tingkat stres seseorang dg memberikan efek tenang, senang dan damai.', '27.jpg', 100, 0, 1),
(17, 'Kayu Manis Batang ', 15, 9000, 'Kayu manis atau dengan nama ilmiah Cinnamomum ialah jenis pohon penghasil rempah-rempah. di dalam kamus Biologi, Cinnamomum zeylanicum Termasuk ke dalam jenis rempah-rempah yang dihasilkan dari kulit bagian dalam yang kering, yang amat beraroma, manis, dan pedas.', '381.jpg', 100, 0, 1),
(18, 'Kayu  Secang', 15, 5000, 'Kayu secang sering diolah menjadi minuman wedang secang oleh orang-orang Jawa. Selain untuk menghangatkan tubuh, wedang secang ternyata menyimpan segudang khasiat sehat lainnya yang sayang jika dilewatkan', '34.jpg', 100, 0, 1),
(19, 'Blackthins Choco Almond', 13, 22000, 'Cara baru menikmati cookies dengan bahan baku yang berkualitas tepung singkong Ladang Lima dengan dark cokelat yang legit, berpadu gurihnya remahan kelapa serta taburan almond dibuat tanpa tambahan susu dan pengembang bikin waktu snack time kamu lebih seru tanpa ragu.', '15.jpg', 100, 0, 1),
(20, 'Blackmond Cookies', 13, 35000, 'Kue kering bebas gluten, perpaduan dark coklat dan kacang almond, buat kamu yang pengen cemilan sehat, bisa jadi asi booster juga sekaligus cemilan diet sehat. ', '61.jpg', 100, 0, 1),
(21, 'Ladang Lima Pasta', 13, 16000, 'Cassava Pasta adalah pasta bebas gluten dari tepung singkong yang kaya akan nutrisi dan aman dikonsumsi orang yang memiliki alergi terhadap gluten.', '74.jpg', 115, 1, 1),
(23, 'Himalaya Salt Premium', 18, 20000, 'Himalya Salt Premium', '153.jpg', 500, 1, 1),
(24, 'Kapulaga Kering Premium', 13, 35000, 'kandungan kapulaga diantaranya karbohidrat, serat, natrium, kalium, zat besi, kalsium, magnesium, vitamin A, vitamin B, dan vitamin C membuatnya banyak manfaat yang baik bagi kesehatan.', '141.jpg', 50, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gambar`
--

CREATE TABLE `tbl_gambar` (
  `id_gambar` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `ket` varchar(255) DEFAULT NULL,
  `gambar` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES
(13, 'Makanan Organik'),
(15, 'Rempah - rempah '),
(16, 'Biji - Bijian '),
(17, 'Kacang'),
(18, 'Garam');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelanggan`
--

CREATE TABLE `tbl_pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `foto` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_pelanggan`
--

INSERT INTO `tbl_pelanggan` (`id_pelanggan`, `nama_pelanggan`, `email`, `password`, `foto`) VALUES
(1, 'Reza', 'reza@gmail.com', '1234', 'foto.jpg'),
(2, 'aji', 'aji@gmail.com', '1234', 'foto.jpg'),
(3, 'fatimah', 'fatimah@gmail.com', '1234', NULL),
(4, 'azahima', 'Azahilmanuryana2@gmail.com', 'azahilma', 'IMG-20200106-WA0030.jpg'),
(5, 'fatimah556', 'fatimah@gmail.coma', '1234', NULL),
(6, 'user', 'user@gmail.com', 'password', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rekening`
--

CREATE TABLE `tbl_rekening` (
  `id_rekening` int(11) NOT NULL,
  `nama_bank` varchar(25) DEFAULT NULL,
  `no_rek` varchar(25) DEFAULT NULL,
  `atas_nama` varchar(25) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_rekening`
--

INSERT INTO `tbl_rekening` (`id_rekening`, `nama_bank`, `no_rek`, `atas_nama`) VALUES
(1, 'BRI', '5434-4382-3434-4345', 'Sari Telang'),
(2, 'BNI', '3342-3456-2346', 'Sari Telang');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rinci_transaksi`
--

CREATE TABLE `tbl_rinci_transaksi` (
  `id_rinci` int(11) NOT NULL,
  `no_order` varchar(25) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_rinci_transaksi`
--

INSERT INTO `tbl_rinci_transaksi` (`id_rinci`, `no_order`, `id_barang`, `qty`) VALUES
(1, '202205272Q5ZPESX', 21, 1),
(2, '20220527QQTDEP4U', 1, 1),
(3, '20220527RAZ4DEXD', 19, 1),
(4, '202205276OPKL78T', 18, 1),
(5, '20220527CDYPL3EF', 18, 1),
(6, '20220527FJUZVBD2', 18, 1),
(7, '20220529UTNJY6Q2', 18, 1),
(8, '20220529TA3TKJDL', 18, 1),
(9, '20220530NEK5IX1Q', 1, 1),
(10, '202206013KQCYB7C', 19, 1),
(11, '202206013KQCYB7C', 20, 1),
(12, '202206069BTEDQJY', 24, 1),
(13, '20220606XKZARHT8', 18, 11),
(14, '20220606OIKXJLV4', 21, 1),
(15, '20220608CFUBXNKN', 24, 1),
(16, '20220613U1A3XW76', 1, 2),
(17, '20220613KSM1QGN2', 1, 1),
(18, '20220615NGR0IXGZ', 1, 2),
(19, '20220615HOFKNP9E', 1, 1),
(20, '20220615HOFKNP9E', 24, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id` int(1) NOT NULL,
  `nama_toko` varchar(255) DEFAULT NULL,
  `lokasi` int(11) DEFAULT NULL,
  `alamat_toko` text DEFAULT NULL,
  `no_telpon` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_setting`
--

INSERT INTO `tbl_setting` (`id`, `nama_toko`, `lokasi`, `alamat_toko`, `no_telpon`) VALUES
(1, 'Sari Telang', 472, 'Jalan Barokah Rt 14 Rw 04 Ds. Pesarean Kec.Adiwerna Kab. Tegal - 52154', '082284033333');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `no_order` varchar(25) NOT NULL,
  `tgl_order` date DEFAULT NULL,
  `nama_penerima` varchar(25) DEFAULT NULL,
  `hp_penerima` varchar(15) DEFAULT NULL,
  `provinsi` varchar(25) DEFAULT NULL,
  `kota` varchar(25) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kode_pos` varchar(8) DEFAULT NULL,
  `expedisi` varchar(255) DEFAULT NULL,
  `paket` varchar(255) DEFAULT NULL,
  `estimasi` varchar(255) DEFAULT NULL,
  `ongkir` int(11) DEFAULT NULL,
  `berat` int(11) DEFAULT NULL,
  `grand_total` int(11) DEFAULT NULL,
  `total_bayar` int(11) DEFAULT NULL,
  `status_bayar` int(1) DEFAULT NULL,
  `bukti_bayar` text DEFAULT NULL,
  `atas_nama` varchar(25) DEFAULT NULL,
  `nama_bank` varchar(25) DEFAULT NULL,
  `no_rek` varchar(25) DEFAULT NULL,
  `status_order` int(1) DEFAULT NULL,
  `no_resi` varchar(25) DEFAULT NULL,
  `order_id` varchar(25) DEFAULT NULL,
  `payment_type` varchar(25) DEFAULT NULL,
  `transaction_time` datetime DEFAULT NULL,
  `transaction_status` varchar(50) DEFAULT NULL,
  `bank` varchar(50) DEFAULT NULL,
  `va_number` varchar(50) DEFAULT NULL,
  `store` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id_transaksi`, `id_pelanggan`, `no_order`, `tgl_order`, `nama_penerima`, `hp_penerima`, `provinsi`, `kota`, `alamat`, `kode_pos`, `expedisi`, `paket`, `estimasi`, `ongkir`, `berat`, `grand_total`, `total_bayar`, `status_bayar`, `bukti_bayar`, `atas_nama`, `nama_bank`, `no_rek`, `status_order`, `no_resi`, `order_id`, `payment_type`, `transaction_time`, `transaction_status`, `bank`, `va_number`, `store`) VALUES
(1, 4, '202205272Q5ZPESX', '2022-05-27', 'Azah Ilma', '082322850855', 'Jawa Tengah', '472', ' Jl. Barokah Rt 14 Rw 04 desa pesarean adiwerna - tegal', '52194', 'jne', 'CTC', '3-6 Hari', 6000, 115, 16000, 22000, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 3, '20220527QQTDEP4U', '2022-05-27', 'Khotimil Labib', '082324305769', 'Jawa Tengah', '473', 'Ds. Ketanggungan RT.06 RW.02 Kecamatan Dukuhturi, Kabupaten Tegal\r\nNo.18 Toko Kakim', '52192', 'jne', 'CTC', '3-6 Hari', 6000, 100, 6000, 12000, 1, NULL, NULL, NULL, NULL, 3, '20220527QQTDEP4U', '360630254', 'gopay', '2022-05-27 08:23:56', 'settlement', NULL, NULL, NULL),
(3, 3, '20220527RAZ4DEXD', '2022-05-27', 'Khotimil Labib', '888888', 'Jawa Barat', '23', 'Ds. Ketanggungan RT.06 RW.02 Kecamatan Dukuhturi, Kabupaten Tegal\r\nNo.18 Toko Kakim', '52192', 'jne', 'OKE', '2-3 Hari', 12000, 100, 22000, 34000, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 3, '202205276OPKL78T', '2022-05-27', 'Khotimil Labib', '4111112', 'Jawa Tengah', '473', 'Ds. Ketanggungan RT.06 RW.02 Kecamatan Dukuhturi, Kabupaten Tegal\r\nNo.18 Toko Kakim', '52192', 'jne', 'CTC', '3-6 Hari', 6000, 100, 5000, 11000, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 3, '20220527CDYPL3EF', '2022-05-27', 'Khotimil Labib', '00000', 'Jawa Tengah', '473', ' Ds ketanggungan', '52192', 'tiki', 'ECO', '4 Hari', 6000, 100, 5000, 11000, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 3, '20220527FJUZVBD2', '2022-05-27', 'Khotimil Labib', '00090', 'Jawa Tengah', '472', ' Ds hd', '52192', 'jne', 'CTC', '3-6 Hari', 6000, 100, 5000, 11000, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 3, '20220529UTNJY6Q2', '2022-05-29', 'Khotimil Labib', '4111112', 'Jawa Tengah', '473', 'Ds. Ketanggungan RT.06 RW.02 Kecamatan Dukuhturi, Kabupaten Tegal\r\nNo.18 Toko Kakim', '52192', 'jne', 'CTC', '3-6 Hari', 6000, 100, 5000, 11000, 1, NULL, NULL, NULL, NULL, 2, 'JP4929593393', '538364953', 'gopay', '2022-05-29 10:47:37', 'settlement', NULL, NULL, NULL),
(8, 3, '20220529TA3TKJDL', '2022-05-29', 'Khotimil Labib', '4111112', 'Jawa Tengah', '209', 'Ds. Ketanggungan RT.06 RW.02 Kecamatan Dukuhturi, Kabupaten Tegal\r\nNo.18 Toko Kakim', '52192', 'tiki', 'ECO', '4 Hari', 11000, 100, 5000, 16000, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 4, '20220530NEK5IX1Q', '2022-05-30', 'AZAH ILMA NURYANA', '082324460131', 'Jawa Tengah', '472', 'Jl. Barokah Rt 14 Rw 04 Desa Pesarean Kecamatan Adiwerna Kabutapen Tegal', '52194', 'jne', 'CTC', '3-6 Hari', 6000, 100, 6000, 12000, 1, NULL, NULL, NULL, NULL, 2, 'JP4929593393', '2073531715', 'bank_transfer', '2022-05-30 11:56:47', 'settlement', 'bri', 'bri', NULL),
(10, 4, '202206013KQCYB7C', '2022-06-01', 'AZAH ILMA NURYANA', '082324460131', 'Jawa Tengah', '472', 'Jl. Barokah Rt 14 Rw 04 Desa Pesarean Kecamatan Adiwerna Kabutapen Tegal', '52194', 'jne', 'CTC', '3-6 Hari', 6000, 200, 57000, 63000, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 3, '202206069BTEDQJY', '2022-06-06', 'Khotimil Labib', '00090', 'Jawa Tengah', '472', 'Ds. Ketanggungan RT.06 RW.02 Kecamatan Dukuhturi, Kabupaten Tegal\r\nNo.18 Toko Kakim', '52192', 'jne', 'CTC', '3-6 Hari', 6000, 50, 35000, 41000, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 3, '20220606XKZARHT8', '2022-06-06', 'Khotimil Labib', '77899', 'Jawa Tengah', '344', 'Ds. Ketanggungan RT.06 RW.02 Kecamatan Dukuhturi, Kabupaten Tegal\r\nNo.18 Toko Kakim', '52192', 'tiki', 'ECO', '5 Hari', 14000, 1100, 55000, 69000, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 4, '20220606OIKXJLV4', '2022-06-06', 'Azah Ilma', 'd443r', 'Bangka Belitung', '27', 'Jl. Barokah Rt 14 Rw 04 desa pesarean adiwerna - tegal', '52194', 'jne', 'OKE', '3-6 Hari', 44000, 115, 16000, 60000, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 4, '20220608CFUBXNKN', '2022-06-08', 'AZAH ILMA NURYANA', '082324460131', 'Kalimantan Selatan', '454', 'Jl. Barokah Rt 14 Rw 04 Desa Pesarean Kecamatan Adiwerna Kabutapen Tegal', '52194', 'tiki', 'REG', '3 Hari', 67000, 50, 35000, 102000, 1, NULL, NULL, NULL, NULL, 0, '34567', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 1, '20220613U1A3XW76', '2022-06-13', 'test', '9879', 'Kalimantan Tengah', '44', ' test', '8878', 'jne', 'OKE', '5-7 Hari', 57000, 200, 12000, 70200, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 4, '20220613KSM1QGN2', '2022-06-13', 'AZAH ILMA NURYANA', '082324460131', 'Jawa Tengah', '472', 'Jl. Barokah Rt 14 Rw 04 Desa Pesarean Kecamatan Adiwerna Kabutapen Tegal', '52194', 'jne', 'CTC', '3-6 Hari', 6000, 100, 6000, 12600, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 6, '20220615NGR0IXGZ', '2022-06-15', 'muslihat', '0888888881', 'Jawa Barat', '78', ' JL.RAYA UJI COBA NO 12345 RT 69 RW 69', '9999999', 'jne', 'YES', '1-1 Hari', 18000, 200, 12000, 31200, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 6, '20220615HOFKNP9E', '2022-06-15', 'muslihat', '0888888881', 'Banten', '232', ' wda', '9999999', 'tiki', 'REG', '3 Hari', 20000, 150, 41000, 65100, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(25) DEFAULT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `level_user` int(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `username`, `password`, `level_user`) VALUES
(1, 'saritelang', 'admin', 'admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id_barang`) USING BTREE;

--
-- Indexes for table `tbl_gambar`
--
ALTER TABLE `tbl_gambar`
  ADD PRIMARY KEY (`id_gambar`) USING BTREE;

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`) USING BTREE;

--
-- Indexes for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`) USING BTREE;

--
-- Indexes for table `tbl_rekening`
--
ALTER TABLE `tbl_rekening`
  ADD PRIMARY KEY (`id_rekening`) USING BTREE;

--
-- Indexes for table `tbl_rinci_transaksi`
--
ALTER TABLE `tbl_rinci_transaksi`
  ADD PRIMARY KEY (`id_rinci`) USING BTREE;

--
-- Indexes for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_transaksi`) USING BTREE;

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_gambar`
--
ALTER TABLE `tbl_gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_rekening`
--
ALTER TABLE `tbl_rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_rinci_transaksi`
--
ALTER TABLE `tbl_rinci_transaksi`
  MODIFY `id_rinci` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
