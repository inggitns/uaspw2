-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               10.1.29-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for dbpegawai
CREATE DATABASE IF NOT EXISTS `dbpegawai` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `dbpegawai`;

-- Dumping structure for table dbpegawai.jabatan
CREATE TABLE IF NOT EXISTS `jabatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(50) DEFAULT NULL,
  `gaji_pokok` double DEFAULT NULL,
  `tunjangan` double DEFAULT NULL,
  `uang_transport` double DEFAULT NULL,
  `uang_makan` double DEFAULT NULL,
  `lembur` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table dbpegawai.jabatan: ~3 rows (approximately)
DELETE FROM `jabatan`;
/*!40000 ALTER TABLE `jabatan` DISABLE KEYS */;
INSERT INTO `jabatan` (`id`, `nama_jabatan`, `gaji_pokok`, `tunjangan`, `uang_transport`, `uang_makan`, `lembur`) VALUES
	(1, 'OB', 2000000, 300000, 200000, 150000, 100000),
	(2, 'Messenger', 3200000, 400000, 200000, 100000, 100000),
	(3, 'Filing Admin', 4000000, 300000, 300000, 200000, 100000);
/*!40000 ALTER TABLE `jabatan` ENABLE KEYS */;

-- Dumping structure for table dbpegawai.pegawai
CREATE TABLE IF NOT EXISTS `pegawai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jabatan_id` int(11) NOT NULL,
  `nama_pegawai` varchar(50) DEFAULT NULL,
  `alamat` text,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_pegawai_jabatan` (`jabatan_id`),
  CONSTRAINT `FK_pegawai_jabatan` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table dbpegawai.pegawai: ~3 rows (approximately)
DELETE FROM `pegawai`;
/*!40000 ALTER TABLE `pegawai` DISABLE KEYS */;
INSERT INTO `pegawai` (`id`, `jabatan_id`, `nama_pegawai`, `alamat`, `tempat_lahir`, `tgl_lahir`, `email`, `telepon`) VALUES
	(1, 3, 'Inggit', 'Jl majapahit 8', 'Bogor', '2018-05-04', 'inggit@gmail.com', '087783898837'),
	(2, 2, 'Budi', 'Jl. Manggis', 'Jonggol', '2018-05-01', 'budi_imoed@gmail.com', '082291237483'),
	(3, 2, 'Imam', 'Jl rusun susun nomor 4', 'Batak', '2018-05-12', 'Imam@gmail.com', '081251812351');
/*!40000 ALTER TABLE `pegawai` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
