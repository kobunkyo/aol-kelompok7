-- MySQL dump 10.13  Distrib 8.0.18, for Win64 (x86_64)
--
-- Host: localhost    Database: citizenvoice_db
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `acara`
--

DROP TABLE IF EXISTS `acara`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `acara` (
  `acara_id` char(5) NOT NULL,
  `form_pengajuan_acara_id` char(5) NOT NULL,
  `biaya_operasional` int NOT NULL,
  PRIMARY KEY (`acara_id`),
  KEY `form_pengajuan_acara_id` (`form_pengajuan_acara_id`),
  CONSTRAINT `acara_ibfk_1` FOREIGN KEY (`form_pengajuan_acara_id`) REFERENCES `formpengajuanacara` (`form_pengajuan_acara_id`),
  CONSTRAINT `acara_id_const` CHECK (regexp_like(`acara_id`,_utf8mb4'AC[0-9][0-9][0-9]'))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acara`
--

LOCK TABLES `acara` WRITE;
/*!40000 ALTER TABLE `acara` DISABLE KEYS */;
INSERT INTO `acara` VALUES ('AC001','FA003',187500),('AC002','FA004',200000),('AC003','FA005',300000),('AC004','FA007',150000);
/*!40000 ALTER TABLE `acara` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admins` (
  `admin_id` char(5) NOT NULL,
  `nama_admin` varchar(255) NOT NULL,
  `email_admin` varchar(255) NOT NULL,
  `password_admin` varchar(20) NOT NULL,
  PRIMARY KEY (`admin_id`),
  CONSTRAINT `admin_id_const` CHECK (regexp_like(`admin_id`,_utf8mb4'AD[0-9][0-9][0-9]'))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES ('AD001','Alex Handoko','alex.handoko@citizenvoice.com','AlexHandoko123');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `formlaporan`
--

DROP TABLE IF EXISTS `formlaporan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `formlaporan` (
  `form_laporan_id` char(5) NOT NULL,
  `user_id` char(5) NOT NULL,
  `judul_laporan` varchar(255) NOT NULL,
  `isi_laporan` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `lampiran` varchar(255) NOT NULL,
  `status_laporan` varchar(10) DEFAULT NULL,
  `tanggal_laporan` date DEFAULT NULL,
  PRIMARY KEY (`form_laporan_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `formlaporan_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  CONSTRAINT `form_laporan_id_const` CHECK (regexp_like(`form_laporan_id`,_utf8mb4'FL[0-9][0-9][0-9]'))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `formlaporan`
--

LOCK TABLES `formlaporan` WRITE;
/*!40000 ALTER TABLE `formlaporan` DISABLE KEYS */;
INSERT INTO `formlaporan` VALUES ('FL001','U0001','Pencemaran Udara di Jakarta','Kualitas udara Jakarta memburuk akibat polusi dari kendaraan bermotor dan industri. Indeks kualitas udara sering kali menunjukkan level tidak sehat.','Jakarta Pusat','penyebab-polusi-udara-dan-cara-cara-pencegahannya_169.jpeg','kuning','2023-10-09'),('FL002','U0003','Banjir di Jakarta Barat','Banjir terjadi di beberapa wilayah Jakarta Barat akibat curah hujan tinggi dan buruknya drainase. Banyak rumah dan fasilitas umum terendam.','Jakarta Barat','warga-naik-perahu-karet-gara-gara-banjir-di-jakbar-taufiqdetikcom-2_169.jpeg','kuning','2023-12-21'),('FL003','U0002','Sampah Plastik di Teluk Jakarta','Pencemaran sampah plastik di Teluk Jakarta meningkat. Sampah plastik mengancam kehidupan laut dan kesehatan manusia.','Jakarta Utara','antarafoto-limbah-plastik-pesisir-laut-cilincing-101219-fm-1.jpg','hijau','2024-01-09'),('FL004','U0003','Penebangan Liar di Kawasan Hijau','Penebangan pohon secara ilegal di kawasan hijau Jakarta mengurangi ruang terbuka hijau yang penting untuk resapan air dan keseimbangan ekosistem.','Jakarta Selatan','penebangan-liar-diikawasan-hijau-0932.JPG','hijau','2024-01-20'),('FL005','U0004','Polusi Suara di Jakarta','Polusi suara dari lalu lintas dan konstruksi di Jakarta menyebabkan gangguan kesehatan seperti stres dan gangguan tidur pada warga.','Jakarta Timur','polusi-suara-jakarta-231.jpg','merah','2024-02-01'),('FL006','U0005','Kualitas Air Tanah yang Menurun','Kualitas air tanah di Jakarta menurun akibat pencemaran limbah domestik dan industri. Banyak sumur warga tercemar bakteri dan zat kimia berbahaya.','Jakarta Barat','kualitas-air-buruk-di-kawasan-sungai.jpg','hijau','2024-03-20'),('FL007','U0001','Pemanasan Global dan Dampaknya di Jakarta','Suhu rata-rata di Jakarta meningkat akibat pemanasan global, menyebabkan perubahan iklim yang berdampak pada kesehatan dan kesejahteraan warga.','Jakarta Pusat','pemanasan-terlalu-tinggi-jakarta.jpeg','kuning','2024-03-30'),('FL008','U0002','Kebakaran Hutan di Jakarta','Kebakaran hutan di area konservasi Jakarta mengakibatkan kerusakan ekosistem dan kabut asap yang mengganggu aktivitas serta kesehatan warga.','Jakarta Selatan','kebakaran-hutan-buatan-jakarta-selatan.jpeg','kuning','2024-04-10'),('FL009','U0003','Pencemaran Sungai di Jakarta','Sungai-sungai di Jakarta tercemar oleh limbah domestik dan industri. Pencemaran ini menyebabkan kerusakan ekosistem air dan mengancam kesehatan warga.','Jakarta Timur','pencemaran-sampah-di-sungai.jpg','merah','2024-05-02'),('FL010','U0005','Kemacetan dan Emisi Karbon','Kemacetan lalu lintas di Jakarta meningkatkan emisi karbon dari kendaraan bermotor, berkontribusi pada pencemaran udara dan perubahan iklim.','Jakarta Utara','akibat-macet-jakarta-selama-tahun-2023-buang-waktu-117-jam-dan-270-kg-emisi-karbon_uDp2hb5ggV.jpg','kuning','2024-06-09');
/*!40000 ALTER TABLE `formlaporan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `formpengajuanacara`
--

DROP TABLE IF EXISTS `formpengajuanacara`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `formpengajuanacara` (
  `form_pengajuan_acara_id` char(5) NOT NULL,
  `user_id` char(5) NOT NULL,
  `admin_id` char(5) NOT NULL,
  `judul_acara` varchar(255) NOT NULL,
  `deskripsi_acara` varchar(255) NOT NULL,
  `tanggal_acara` date NOT NULL,
  `lokasi_acara` varchar(255) NOT NULL,
  `total_dana` int NOT NULL,
  `lampiran` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`form_pengajuan_acara_id`),
  KEY `user_id` (`user_id`),
  KEY `admin_id` (`admin_id`),
  CONSTRAINT `formpengajuanacara_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  CONSTRAINT `formpengajuanacara_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`admin_id`),
  CONSTRAINT `form_pengajuan_acara_id_const` CHECK (regexp_like(`form_pengajuan_acara_id`,_utf8mb4'FA[0-9][0-9][0-9]'))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `formpengajuanacara`
--

LOCK TABLES `formpengajuanacara` WRITE;
/*!40000 ALTER TABLE `formpengajuanacara` DISABLE KEYS */;
INSERT INTO `formpengajuanacara` VALUES ('FA001','U0002','AD001','Kampanye Anti Plastik','Kampanye untuk mengurangi penggunaan plastik sekali pakai melalui edukasi dan distribusi tas belanja ramah lingkungan.','2023-10-15','Jakarta Pusat',300000000,'kampanye_anti_plastik.pdf','Ditolak','kampanye-antiplastik.jpeg'),('FA002','U0003','AD001','Penanaman Pohon Massal','Acara penanaman pohon di beberapa area hijau Jakarta untuk meningkatkan kualitas udara dan menyediakan habitat bagi satwa.','2023-12-10','Jakarta Barat',500000000,'penanaman_pohon_massal.pdf','Ditolak','penanaman-pohon-masal.jpg'),('FA003','U0001','AD001','Pembersihan Sungai','Aksi bersih-bersih sungai di Jakarta Utara untuk mengurangi sampah dan meningkatkan kualitas air sungai.','2024-01-10','Jakarta Utara',150000000,'pembersihan_sungai.pdf','Diterima','pemberihan-sungai.jpeg'),('FA004','U0004','AD001','Seminar Pemanasan Global','Seminar edukasi tentang dampak pemanasan global dan langkah-langkah yang bisa diambil untuk mengurangi emisi karbon.','2024-10-20','Jakarta Selatan',200000000,'seminar_pemanasan_global.pdf','Diterima','seminar-nasional.jpg'),('FA005','U0002','AD001','Pembuatan Kebun Komunitas','Proyek pembuatan kebun komunitas di daerah perkotaan Jakarta Timur untuk mempromosikan pertanian perkotaan dan keberlanjutan.','2024-11-15','Jakarta Timur',250000000,'kebun_komunitas.pdf','Diterima','pembuatan-kebun-komunitas.jpg'),('FA006','U0005','AD001','Festival Lingkungan','Festival tahunan yang menampilkan berbagai inisiatif lingkungan, pameran, dan kegiatan edukasi bagi masyarakat.','2024-12-05','Jakarta Pusat',700000000,'festival_lingkungan.pdf','Ditolak','green-future-festival.jpg'),('FA007','U0001','AD001','Workshop Daur Ulang','Workshop yang mengajarkan teknik-teknik daur ulang dan pemanfaatan limbah rumah tangga untuk mengurangi sampah.','2024-12-25','Jakarta Barat',100000000,'workshop_daur_ulang.pdf','Diterima','Workshop-Pembuatan-Kertas-Daur-Ulang-oleh-Bentara-Budaya-Bali.jpg');
/*!40000 ALTER TABLE `formpengajuanacara` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `partisipasiacara`
--

DROP TABLE IF EXISTS `partisipasiacara`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `partisipasiacara` (
  `partisipasi_kegiatan_id` char(5) NOT NULL,
  `acara_id` char(5) NOT NULL,
  `user_id` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `kota_asal` varchar(255) NOT NULL,
  `biaya_operasional` int DEFAULT NULL,
  `bukti_pembayaran` varchar(255) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  PRIMARY KEY (`partisipasi_kegiatan_id`),
  KEY `acara_id` (`acara_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `partisipasiacara_ibfk_1` FOREIGN KEY (`acara_id`) REFERENCES `acara` (`acara_id`),
  CONSTRAINT `partisipasiacara_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  CONSTRAINT `partisipasi_kegiatan_id_const` CHECK (regexp_like(`partisipasi_kegiatan_id`,_utf8mb4'KI[0-9][0-9][0-9]'))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partisipasiacara`
--

LOCK TABLES `partisipasiacara` WRITE;
/*!40000 ALTER TABLE `partisipasiacara` DISABLE KEYS */;
INSERT INTO `partisipasiacara` VALUES ('KI001','AC001','U0001','Solo',200000,'buktipembayaranss.jpg','Ahmad');
/*!40000 ALTER TABLE `partisipasiacara` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `user_id` char(5) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_picture` varchar(255) NOT NULL,
  `biografi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `twitter` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `facebook` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `user_id_const` CHECK (regexp_like(`user_id`,_utf8mb4'U[0-9][0-9][0-9][0-9]'))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('U0001','Ahmad Sutrisno','Jakarta Pusat','ahmad.sutrisno@gmail.com','Ahm4dSutr1sn0!','74990601-4c0c-4cc7-bda0-32df5c9abcb5_169.jpg','Seorang guru SMA di Jakarta Pusat yang berdedikasi mengajar matematika. Ia terkenal dengan metode pengajarannya yang inovatif dan mampu menginspirasi siswanya untuk mencintai matematika','@AhmadSutrisno','Ahmad Sutrisno'),('U0002','Budi Santoso','Jakarta Barat','budi.santoso@yahoo.com','BudiS4nt0s0!','6056bfa61251c.jpg','Seorang ahli botani yang fokus pada konservasi tumbuhan di Jakarta Barat. Ia sering terlibat dalam proyek penghijauan dan edukasi masyarakat tentang pentingnya menjaga keanekaragaman hayati','@BudiBotani','Budi Santoso'),('U0003','Chandra Wijaya','Jakarta Utara','chandra.wijaya@hotmail.com','Ch4ndr4W1j4y4!','01hdbnyczmy37stmet6sbw3f1k.jpg','Seorang dokter di Jakarta Utara yang berdedikasi dalam pelayanan kesehatan masyarakat. Dengan keahliannya, ia membantu banyak pasien dan aktif dalam program kesehatan preventif','@DrChandraW','dr Chandra Wijaya'),('U0004','Dewi Lestari','Jakarta Selatan','dewi.lestari@gmail.com','DewiL3st4r1!','181861505-4e63227ed0a14dc9bfe86848ef54caf3.jpg','Seorang jurnalis di Jakarta Selatan yang berfokus pada isu-isu sosial dan lingkungan. Karya tulisnya sering memaparkan masalah-masalah penting dengan tujuan mendorong perubahan positif di masyarakat','@DewiJurnalis','Dewi Lestari'),('U0005','Eka Pratama','Jakarta Timur','eka.pratama@gmail.com','Ek4Pr4t4m4!','dfsjl309ksdjfl03.jpeg','Seorang pedagang sukses di Jakarta Timur yang dikenal karena keuletannya. Dengan usaha keras, ia mampu membangun jaringan bisnis yang luas dan memberikan lapangan kerja bagi banyak orang','@EkaPedagang','Eka Pratama'),('U0006','chris (test123)','bumi','bumi@gmail.com','$2y$10$WlbpTXsIhM9hiE4TMeDfoO/4F7h99AatwNed6331jmaGH1ObrvMBu','default.png','','','');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'citizenvoice_db'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-06-30 21:53:18
