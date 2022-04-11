-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.22-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for db_olshop
CREATE DATABASE IF NOT EXISTS `db_olshop` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `db_olshop`;

-- Dumping structure for table db_olshop.tbl_barang
CREATE TABLE IF NOT EXISTS `tbl_barang` (
  `id_barang` int(11) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(255) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `deskripsi` mediumtext DEFAULT NULL,
  `gambar` text DEFAULT NULL,
  `berat` int(11) NOT NULL,
  PRIMARY KEY (`id_barang`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table db_olshop.tbl_barang: 1 rows
/*!40000 ALTER TABLE `tbl_barang` DISABLE KEYS */;
INSERT INTO `tbl_barang` (`id_barang`, `nama_barang`, `id_kategori`, `harga`, `deskripsi`, `gambar`, `berat`) VALUES
	(1, 'Ladang Lima Blackmond Cookies', 13, 30000, 'Makanan organic yang sangat enak', 'WhatsApp_Image_2022-02-27_at_21_12_34.jpeg', 250);
/*!40000 ALTER TABLE `tbl_barang` ENABLE KEYS */;

-- Dumping structure for table db_olshop.tbl_gambar
CREATE TABLE IF NOT EXISTS `tbl_gambar` (
  `id_gambar` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` int(11) NOT NULL,
  `ket` varchar(255) DEFAULT NULL,
  `gambar` text DEFAULT NULL,
  PRIMARY KEY (`id_gambar`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table db_olshop.tbl_gambar: 0 rows
/*!40000 ALTER TABLE `tbl_gambar` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_gambar` ENABLE KEYS */;

-- Dumping structure for table db_olshop.tbl_kategori
CREATE TABLE IF NOT EXISTS `tbl_kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_kategori`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table db_olshop.tbl_kategori: 5 rows
/*!40000 ALTER TABLE `tbl_kategori` DISABLE KEYS */;
INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES
	(13, 'Makanan Organik'),
	(15, 'Rempah - rempah '),
	(16, 'Biji - Bijian '),
	(17, 'Kacang'),
	(18, 'Garam');
/*!40000 ALTER TABLE `tbl_kategori` ENABLE KEYS */;

-- Dumping structure for table db_olshop.tbl_pelanggan
CREATE TABLE IF NOT EXISTS `tbl_pelanggan` (
  `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pelanggan` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `foto` text DEFAULT NULL,
  PRIMARY KEY (`id_pelanggan`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table db_olshop.tbl_pelanggan: 2 rows
/*!40000 ALTER TABLE `tbl_pelanggan` DISABLE KEYS */;
INSERT INTO `tbl_pelanggan` (`id_pelanggan`, `nama_pelanggan`, `email`, `password`, `foto`) VALUES
	(1, 'Reza', 'reza@gmail.com', '1234', 'foto.jpg'),
	(2, 'aji', 'aji@gmail.com', '1234', 'foto.jpg');
/*!40000 ALTER TABLE `tbl_pelanggan` ENABLE KEYS */;

-- Dumping structure for table db_olshop.tbl_rekening
CREATE TABLE IF NOT EXISTS `tbl_rekening` (
  `id_rekening` int(11) NOT NULL AUTO_INCREMENT,
  `nama_bank` varchar(25) DEFAULT NULL,
  `no_rek` varchar(25) DEFAULT NULL,
  `atas_nama` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_rekening`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table db_olshop.tbl_rekening: 2 rows
/*!40000 ALTER TABLE `tbl_rekening` DISABLE KEYS */;
INSERT INTO `tbl_rekening` (`id_rekening`, `nama_bank`, `no_rek`, `atas_nama`) VALUES
	(1, 'BRI', '5434-4382-3434-4345', 'Sari Telang'),
	(2, 'BNI', '3342-3456-2346', 'Sari Telang');
/*!40000 ALTER TABLE `tbl_rekening` ENABLE KEYS */;

-- Dumping structure for table db_olshop.tbl_rinci_transaksi
CREATE TABLE IF NOT EXISTS `tbl_rinci_transaksi` (
  `id_rinci` int(11) NOT NULL AUTO_INCREMENT,
  `no_order` varchar(25) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_rinci`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table db_olshop.tbl_rinci_transaksi: 0 rows
/*!40000 ALTER TABLE `tbl_rinci_transaksi` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_rinci_transaksi` ENABLE KEYS */;

-- Dumping structure for table db_olshop.tbl_setting
CREATE TABLE IF NOT EXISTS `tbl_setting` (
  `id` int(1) NOT NULL,
  `nama_toko` varchar(255) DEFAULT NULL,
  `lokasi` int(11) DEFAULT NULL,
  `alamat_toko` text DEFAULT NULL,
  `no_telpon` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table db_olshop.tbl_setting: 1 rows
/*!40000 ALTER TABLE `tbl_setting` DISABLE KEYS */;
INSERT INTO `tbl_setting` (`id`, `nama_toko`, `lokasi`, `alamat_toko`, `no_telpon`) VALUES
	(1, 'Sari Telang', 318, 'Jalan Barokah Rt 14 Rw 04 Ds. Pesarean Kec.Adiwerna Kab. Tegal - 52154', '082284033333');
/*!40000 ALTER TABLE `tbl_setting` ENABLE KEYS */;

-- Dumping structure for table db_olshop.tbl_transaksi
CREATE TABLE IF NOT EXISTS `tbl_transaksi` (
  `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
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
  `store` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_transaksi`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table db_olshop.tbl_transaksi: 0 rows
/*!40000 ALTER TABLE `tbl_transaksi` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_transaksi` ENABLE KEYS */;

-- Dumping structure for table db_olshop.tbl_user
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(25) DEFAULT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `level_user` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table db_olshop.tbl_user: 3 rows
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` (`id_user`, `nama_user`, `username`, `password`, `level_user`) VALUES
	(1, 'saritelang', 'admin', 'admin', 1),
	(2, 'user1', 'user1', 'user1', 2),
	(4, 'user2', 'user2', 'user2', 2);
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
