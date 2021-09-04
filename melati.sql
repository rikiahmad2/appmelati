-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.14-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for melati
CREATE DATABASE IF NOT EXISTS `melati` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `melati`;

-- Dumping structure for table melati.bank
CREATE TABLE IF NOT EXISTS `bank` (
  `id_bank` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_rek` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('aktif','tidak') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_bank`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table melati.bank: ~0 rows (approximately)
/*!40000 ALTER TABLE `bank` DISABLE KEYS */;
INSERT INTO `bank` (`id_bank`, `name`, `no_rek`, `deskripsi`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'An. Riki Ahmad Maulana', '8888888888', 'Lembaga Bantuan Nasional', 'aktif', '2021-09-02 04:21:27', '2021-09-02 04:21:27');
/*!40000 ALTER TABLE `bank` ENABLE KEYS */;

-- Dumping structure for table melati.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table melati.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table melati.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table melati.migrations: ~9 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2021_09_01_063624_create_muzakki_table', 2),
	(7, '2021_09_01_074708_create_table_mustahik', 3),
	(12, '2021_09_01_102802_create_bank_table', 4),
	(13, '2021_09_02_040146_create_penerimaan_table', 5),
	(14, '2021_09_02_072940_create_penyaluran_table', 6);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table melati.mustahik
CREATE TABLE IF NOT EXISTS `mustahik` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kriteria` enum('fakir','miskin','mualaf','riqab','gharimin','sabilillah','musafir') COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_kk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notelp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kerja_suami` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kerja_istri` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_jiwa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mustahik_nik_unique` (`nik`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table melati.mustahik: ~2 rows (approximately)
/*!40000 ALTER TABLE `mustahik` DISABLE KEYS */;
INSERT INTO `mustahik` (`id`, `name`, `kriteria`, `no_kk`, `nik`, `alamat`, `notelp`, `kerja_suami`, `kerja_istri`, `jumlah_jiwa`, `created_at`, `updated_at`) VALUES
	(1, 'Sunaryo', 'mualaf', '9881231', '123123', 'Bandung', '0881231', 'Buruh', 'PRT', '3', NULL, '2021-09-01 09:10:47');
/*!40000 ALTER TABLE `mustahik` ENABLE KEYS */;

-- Dumping structure for table melati.muzakki
CREATE TABLE IF NOT EXISTS `muzakki` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `npwp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notelp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `muzakki_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table melati.muzakki: ~1 rows (approximately)
/*!40000 ALTER TABLE `muzakki` DISABLE KEYS */;
INSERT INTO `muzakki` (`id`, `npwp`, `name`, `email`, `alamat`, `notelp`, `created_at`, `updated_at`) VALUES
	(1, '8888888', 'Bryan Zumadil', 'bryan2@gmail.com', 'Bekasi barat', '08999999999', '2021-09-01 13:47:47', '2021-09-01 07:08:47');
/*!40000 ALTER TABLE `muzakki` ENABLE KEYS */;

-- Dumping structure for table melati.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table melati.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table melati.penerimaan
CREATE TABLE IF NOT EXISTS `penerimaan` (
  `id_penerimaan` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_mustahik` bigint(20) unsigned DEFAULT NULL,
  `id_muzakki` bigint(20) unsigned NOT NULL,
  `id_bank` bigint(20) unsigned NOT NULL,
  `id_user` bigint(20) unsigned NOT NULL,
  `jenis` enum('zakat fitrah','zakat mal','infak','sedekah','fidyah','wakaf') COLLATE utf8mb4_unicode_ci NOT NULL,
  `cara_pembayaran` enum('cash','transfer') COLLATE utf8mb4_unicode_ci NOT NULL,
  `bentuk_pembayaran` enum('uang','beras','barang donasi') COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_pembayaran` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_penerimaan`),
  KEY `penerimaan_id_mustahik_foreign` (`id_mustahik`),
  KEY `penerimaan_id_muzakki_foreign` (`id_muzakki`),
  KEY `penerimaan_id_bank_foreign` (`id_bank`),
  KEY `penerimaan_id_user_foreign` (`id_user`),
  CONSTRAINT `penerimaan_id_bank_foreign` FOREIGN KEY (`id_bank`) REFERENCES `bank` (`id_bank`) ON DELETE CASCADE,
  CONSTRAINT `penerimaan_id_mustahik_foreign` FOREIGN KEY (`id_mustahik`) REFERENCES `mustahik` (`id`) ON DELETE CASCADE,
  CONSTRAINT `penerimaan_id_muzakki_foreign` FOREIGN KEY (`id_muzakki`) REFERENCES `muzakki` (`id`) ON DELETE CASCADE,
  CONSTRAINT `penerimaan_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table melati.penerimaan: ~2 rows (approximately)
/*!40000 ALTER TABLE `penerimaan` DISABLE KEYS */;
INSERT INTO `penerimaan` (`id_penerimaan`, `id_mustahik`, `id_muzakki`, `id_bank`, `id_user`, `jenis`, `cara_pembayaran`, `bentuk_pembayaran`, `jumlah_pembayaran`, `created_at`, `updated_at`) VALUES
	(7, 1, 1, 1, 1, 'zakat fitrah', 'cash', 'uang', 80000000, '2021-09-02 11:51:47', '2021-09-02 12:37:51'),
	(8, 1, 1, 1, 1, 'zakat fitrah', 'cash', 'uang', 600000000, '2021-09-02 11:55:27', '2021-09-02 12:03:33');
/*!40000 ALTER TABLE `penerimaan` ENABLE KEYS */;

-- Dumping structure for table melati.penyaluran
CREATE TABLE IF NOT EXISTS `penyaluran` (
  `id_penyaluran` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_penerimaan` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_penyaluran`),
  KEY `penyaluran_id_penerimaan_foreign` (`id_penerimaan`),
  CONSTRAINT `penyaluran_id_penerimaan_foreign` FOREIGN KEY (`id_penerimaan`) REFERENCES `penerimaan` (`id_penerimaan`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table melati.penyaluran: ~1 rows (approximately)
/*!40000 ALTER TABLE `penyaluran` DISABLE KEYS */;
INSERT INTO `penyaluran` (`id_penyaluran`, `id_penerimaan`, `created_at`, `updated_at`) VALUES
	(1, 8, '2021-09-10 00:00:00', '2021-09-02 12:03:33'),
	(6, 7, '2021-09-02 12:37:51', '2021-09-02 12:37:51');
/*!40000 ALTER TABLE `penyaluran` ENABLE KEYS */;

-- Dumping structure for table melati.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table melati.personal_access_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Dumping structure for table melati.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('admin','petugas') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table melati.users: ~1 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `nip`, `alamat`, `jenis_kelamin`, `email`, `email_verified_at`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Riki Ahmad', '1177050100', 'Bandung Timur', 'L', 'ahmadriki9512@gmail.com', '2021-08-31 23:21:29', '$2y$10$gTcDXwiHSUan5MejVGwKbeRrEnweATqD7yesEMtjd7FvtZoCSRz3W', 'admin', NULL, '2021-08-31 23:21:34', '2021-09-01 04:44:24'),
	(3, 'Royan Zanhar', '1177050200', 'Bandung Barat', 'L', 'royan@gmail.com', NULL, '$2y$10$Zk9LEb4YgXKluhbDXBSYiuYn57abINhbUFpG1PDmCsXYsfTQs6tQy', 'petugas', NULL, '2021-09-01 05:12:23', '2021-09-01 05:35:24');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
