/*
 Navicat Premium Data Transfer

 Source Server         : MariaDB_Local
 Source Server Type    : MariaDB
 Source Server Version : 100420
 Source Host           : localhost:3306
 Source Schema         : ci_lulus_new

 Target Server Type    : MariaDB
 Target Server Version : 100420
 File Encoding         : 65001

 Date: 19/11/2022 15:29:19
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for t_adm
-- ----------------------------
DROP TABLE IF EXISTS `t_adm`;
CREATE TABLE `t_adm`  (
  `no_pes` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `komite` enum('1','0') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pustaka` enum('1','0') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tahun_adm` year NOT NULL,
  PRIMARY KEY (`no_pes`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_adm
-- ----------------------------
INSERT INTO `t_adm` VALUES ('3-12-08-004-123-1', '1', '1', 2020);
INSERT INTO `t_adm` VALUES ('3-12-08-004-321-3', '1', '1', 2020);
INSERT INTO `t_adm` VALUES ('3-12-08-004-567-4', '0', '1', 2020);
INSERT INTO `t_adm` VALUES ('3-12-08-004-568-4', '0', '0', 2020);

-- ----------------------------
-- Table structure for t_bio_siswa
-- ----------------------------
DROP TABLE IF EXISTS `t_bio_siswa`;
CREATE TABLE `t_bio_siswa`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `t_lahir` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tgl_lhr` date NOT NULL,
  `n_ortu` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nis` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nisn` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_pes` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jurusan` enum('A','S') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `foto` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tahun` year NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 28 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_bio_siswa
-- ----------------------------
INSERT INTO `t_bio_siswa` VALUES (6, 'SISWA1', 'sicincin', '2019-01-01', 'Ortu Siswa1', '12345', '1234567890', '3-12-08-004-123-1', 'A', 'default.jpg', 2020);
INSERT INTO `t_bio_siswa` VALUES (7, 'SISWA2', 'Bari', '2019-03-13', 'Ortu Siswa2', '54321', '0987654321', '3-12-08-004-321-3', 'S', 'default.jpg', 2020);
INSERT INTO `t_bio_siswa` VALUES (23, 'SISWA3', 'Padang', '2019-12-31', 'Ortu3', '11223', '5937028543', '3-12-08-004-567-4', 'A', 'default.jpg', 2020);
INSERT INTO `t_bio_siswa` VALUES (24, 'SISWA4', 'Kotobaru', '2020-01-01', 'Ortu4', '33445', '3583208953', '3-12-08-004-568-4', 'S', 'default.jpg', 2020);
INSERT INTO `t_bio_siswa` VALUES (25, 'SISWA5', 'Payakumbuh', '2019-12-30', 'Ortu5', '23572', '2567297203', '3-12-08-004-569-5', 'A', 'default.jpg', 2020);
INSERT INTO `t_bio_siswa` VALUES (27, 'SISWA6', 'Sicincin', '2019-12-12', 'Ortu6', '76864', '4820602763', '3-12-08-004-570-7', 'S', 'default.jpg', 2020);

-- ----------------------------
-- Table structure for t_blangko
-- ----------------------------
DROP TABLE IF EXISTS `t_blangko`;
CREATE TABLE `t_blangko`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_surat` varchar(256) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nomor_surat` varchar(256) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tempat_surat` varchar(256) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal_surat` date NOT NULL,
  `p_us` varchar(256) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `p_un` varchar(256) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_blangko
-- ----------------------------
INSERT INTO `t_blangko` VALUES (1, 'SURAT KETERANGAN LULUS', '421/478/SMAN.1-2x11 EL/2020', 'Sicincin', '2020-05-02', 'SMAN 1 2x11 Enam Lingkung', 'SMAN 1 2x11 Enam Lingkung', '2020-05-01 11:39:27');

-- ----------------------------
-- Table structure for t_code
-- ----------------------------
DROP TABLE IF EXISTS `t_code`;
CREATE TABLE `t_code`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_pes` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `qrcode` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tahun_code` year NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_code
-- ----------------------------
INSERT INTO `t_code` VALUES (6, '3-12-08-004-123-1', '3-12-08-004-123-1.png', 2020);
INSERT INTO `t_code` VALUES (7, '3-12-08-004-321-3', '3-12-08-004-321-3.png', 2020);
INSERT INTO `t_code` VALUES (8, '3-12-08-004-570-7', '3-12-08-004-570-7.png', 2020);

-- ----------------------------
-- Table structure for t_cp
-- ----------------------------
DROP TABLE IF EXISTS `t_cp`;
CREATE TABLE `t_cp`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_hp` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_cp
-- ----------------------------
INSERT INTO `t_cp` VALUES (1, 'Admin', '08126600522');

-- ----------------------------
-- Table structure for t_history
-- ----------------------------
DROP TABLE IF EXISTS `t_history`;
CREATE TABLE `t_history`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kegiatan` varchar(256) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `oleh` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 65 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_history
-- ----------------------------
INSERT INTO `t_history` VALUES (1, 'Edit Nilai USBN (3-12-08-004-123-1)', 'jamilurkoto@gmail.com', '2019-12-31 20:08:32');
INSERT INTO `t_history` VALUES (2, 'Hapus Nilai USBN (3-12-08-004-321-3)', 'jamilurkoto@gmail.com', '2019-12-31 20:22:33');
INSERT INTO `t_history` VALUES (3, 'Tambah Nilai USBN (3-12-08-004-321-3)', 'jamilurkoto@gmail.com', '2019-12-31 20:27:52');
INSERT INTO `t_history` VALUES (4, 'Import Nilai USBN Siswa', 'jamilurkoto@gmail.com', '2020-01-01 15:07:10');
INSERT INTO `t_history` VALUES (5, 'Import Nilai Rapor Siswa', 'jamilurkoto@gmail.com', '2020-01-01 15:24:54');
INSERT INTO `t_history` VALUES (6, 'Ganti Password', 'bgj4m@rangkoto.com', '2020-01-02 12:44:42');
INSERT INTO `t_history` VALUES (7, 'Tambah Siswa Bebas Pustaka (3-12-08-004-321-3)', 'bgj4m@rangkoto.com', '2020-01-02 15:39:15');
INSERT INTO `t_history` VALUES (8, 'Tambah Siswa Bebas Pustaka (3-12-08-004-567-4)', 'bgj4m@rangkoto.com', '2020-01-02 15:39:23');
INSERT INTO `t_history` VALUES (9, 'Tambah Data (3-12-08-004-123-3)', 'bgj4m@rangkoto.com', '2020-01-21 20:22:23');
INSERT INTO `t_history` VALUES (10, 'Edit Data (3-12-08-004-123-3)', 'bgj4m@rangkoto.com', '2020-01-21 20:22:46');
INSERT INTO `t_history` VALUES (11, 'Hapus Data (3-12-08-004-123-3)', 'bgj4m@rangkoto.com', '2020-01-21 20:22:54');
INSERT INTO `t_history` VALUES (12, 'Import Data Siswa', 'bgj4m@rangkoto.com', '2020-01-21 20:23:46');
INSERT INTO `t_history` VALUES (13, 'Tambah Nilai UN (3-12-08-004-570-7)', 'bgj4m@rangkoto.com', '2020-01-21 20:24:37');
INSERT INTO `t_history` VALUES (14, 'Edit Nilai UN (3-12-08-004-570-7)', 'bgj4m@rangkoto.com', '2020-01-21 20:24:59');
INSERT INTO `t_history` VALUES (15, 'Tambah Informasi (Info)', 'bgj4m@rangkoto.com', '2020-01-21 20:26:18');
INSERT INTO `t_history` VALUES (16, 'Edit Informasi (Info)', 'bgj4m@rangkoto.com', '2020-01-21 20:27:12');
INSERT INTO `t_history` VALUES (17, 'Hapus Informasi (Info)', 'bgj4m@rangkoto.com', '2020-01-21 20:27:22');
INSERT INTO `t_history` VALUES (18, 'Tambah Data (12-32-321-42-1)', 'bgj4m@rangkoto.com', '2020-01-23 18:15:52');
INSERT INTO `t_history` VALUES (19, 'Edit Data (12-32-321-42-1)', 'bgj4m@rangkoto.com', '2020-01-23 18:16:51');
INSERT INTO `t_history` VALUES (20, 'Hapus Data (12-32-321-42-1)', 'bgj4m@rangkoto.com', '2020-01-23 18:17:05');
INSERT INTO `t_history` VALUES (21, 'Import Data Siswa', 'bgj4m@rangkoto.com', '2020-01-23 18:18:34');
INSERT INTO `t_history` VALUES (22, 'Hapus Nilai UN (3-12-08-004-570-7)', 'bgj4m@rangkoto.com', '2020-01-23 18:20:56');
INSERT INTO `t_history` VALUES (23, 'Tambah Nilai UN (3-12-08-004-570-7)', 'bgj4m@rangkoto.com', '2020-01-23 18:21:13');
INSERT INTO `t_history` VALUES (24, 'Edit Nilai UN (3-12-08-004-570-7)', 'bgj4m@rangkoto.com', '2020-01-23 18:21:26');
INSERT INTO `t_history` VALUES (25, 'Tambah Informasi (Halo)', 'bgj4m@rangkoto.com', '2020-01-23 18:24:13');
INSERT INTO `t_history` VALUES (26, 'Edit Informasi (Halo Halo)', 'bgj4m@rangkoto.com', '2020-01-23 18:24:51');
INSERT INTO `t_history` VALUES (27, 'Hapus Informasi (Halo Halo)', 'bgj4m@rangkoto.com', '2020-01-23 18:24:59');
INSERT INTO `t_history` VALUES (28, 'Tambah Siswa Bebas Pustaka (3-12-08-004-568-4)', 'bgj4m@rangkoto.com', '2020-01-23 19:08:08');
INSERT INTO `t_history` VALUES (29, 'Hapus Siswa Bebas Pustaka (3-12-08-004-568-4)', 'bgj4m@rangkoto.com', '2020-01-23 19:08:37');
INSERT INTO `t_history` VALUES (30, 'Edit Profil', 'jamilurkoto@gmail.com', '2020-01-31 19:59:05');
INSERT INTO `t_history` VALUES (31, 'Edit Profil', 'jamilurkoto@gmail.com', '2020-01-31 20:00:57');
INSERT INTO `t_history` VALUES (32, 'Tambah Siswa Bebas Pustaka (3-12-08-004-568-4)', 'softj4m98@gmail.com', '2020-02-20 20:07:34');
INSERT INTO `t_history` VALUES (33, 'Hapus Siswa Bebas Pustaka (3-12-08-004-568-4)', 'softj4m98@gmail.com', '2020-02-20 20:08:02');
INSERT INTO `t_history` VALUES (34, 'Edit Profil', 'softj4m98@gmail.com', '2020-02-20 20:19:36');
INSERT INTO `t_history` VALUES (35, 'Edit Profil', 'softj4m98@gmail.com', '2020-02-20 20:20:14');
INSERT INTO `t_history` VALUES (36, 'Import Data Siswa', 'jamilurkoto@gmail.com', '2020-02-20 21:12:16');
INSERT INTO `t_history` VALUES (37, 'Import Data Siswa', 'jamilurkoto@gmail.com', '2020-02-20 21:13:40');
INSERT INTO `t_history` VALUES (38, 'Import Data Siswa', 'jamilurkoto@gmail.com', '2020-02-20 21:28:29');
INSERT INTO `t_history` VALUES (39, 'Edit Profil Sekolah', 'jamilurkoto@gmail.com', '2020-02-21 21:11:28');
INSERT INTO `t_history` VALUES (40, 'Edit Profil Sekolah', 'jamilurkoto@gmail.com', '2020-02-21 21:12:27');
INSERT INTO `t_history` VALUES (41, 'Edit Profil Sekolah', 'jamilurkoto@gmail.com', '2020-02-21 21:14:00');
INSERT INTO `t_history` VALUES (42, 'Edit Profil Sekolah', 'jamilurkoto@gmail.com', '2020-02-21 21:18:19');
INSERT INTO `t_history` VALUES (43, 'Edit Profil Sekolah', 'jamilurkoto@gmail.com', '2020-02-21 21:19:04');
INSERT INTO `t_history` VALUES (44, 'Edit Profil Sekolah', 'jamilurkoto@gmail.com', '2020-02-21 21:19:39');
INSERT INTO `t_history` VALUES (45, 'Edit Profil Sekolah', 'jamilurkoto@gmail.com', '2020-02-21 21:20:45');
INSERT INTO `t_history` VALUES (46, 'Edit Profil Sekolah', 'jamilurkoto@gmail.com', '2020-02-21 21:21:18');
INSERT INTO `t_history` VALUES (47, 'Edit Profil Sekolah', 'jamilurkoto@gmail.com', '2020-02-21 21:22:00');
INSERT INTO `t_history` VALUES (48, 'Edit Profil Sekolah', 'jamilurkoto@gmail.com', '2020-02-21 21:22:18');
INSERT INTO `t_history` VALUES (49, 'Edit Profil Sekolah', 'jamilurkoto@gmail.com', '2020-02-21 21:23:36');
INSERT INTO `t_history` VALUES (50, 'Edit Profil Sekolah', 'jamilurkoto@gmail.com', '2020-02-21 21:24:13');
INSERT INTO `t_history` VALUES (51, 'Import Data Siswa', 'jamilurkoto@gmail.com', '2020-02-21 21:48:28');
INSERT INTO `t_history` VALUES (52, 'Import Data Siswa', 'jamilurkoto@gmail.com', '2020-02-23 15:58:55');
INSERT INTO `t_history` VALUES (53, 'Import Data Siswa', 'jamilurkoto@gmail.com', '2020-02-23 16:39:11');
INSERT INTO `t_history` VALUES (54, 'Import Data Siswa', 'jamilurkoto@gmail.com', '2020-02-23 16:40:33');
INSERT INTO `t_history` VALUES (55, 'Import Data Siswa', 'jamilurkoto@gmail.com', '2020-02-23 16:52:19');
INSERT INTO `t_history` VALUES (56, 'Import Data Siswa', 'jamilurkoto@gmail.com', '2020-02-23 17:04:29');
INSERT INTO `t_history` VALUES (57, 'Edit Profil Sekolah', 'jamilurkoto@gmail.com', '2020-02-23 19:16:35');
INSERT INTO `t_history` VALUES (58, 'Edit Profil Sekolah', 'jamilurkoto@gmail.com', '2020-02-23 19:22:30');
INSERT INTO `t_history` VALUES (59, 'Edit Profil Sekolah', 'jamilurkoto@gmail.com', '2020-02-23 19:22:45');
INSERT INTO `t_history` VALUES (60, 'Edit Blangko Surat', 'jamilurkoto@gmail.com', '2020-02-23 20:20:34');
INSERT INTO `t_history` VALUES (61, 'Edit Blangko Surat', 'jamilurkoto@gmail.com', '2020-02-26 22:03:35');
INSERT INTO `t_history` VALUES (62, 'Edit Blangko Surat', 'jamilurkoto@gmail.com', '2020-02-26 22:03:51');
INSERT INTO `t_history` VALUES (63, 'Edit Blangko Surat', 'jamilurkoto@gmail.com', '2020-05-01 11:39:27');
INSERT INTO `t_history` VALUES (64, 'Ganti Password', 'jamilurkoto@gmail.com', '2020-12-02 11:47:58');

-- ----------------------------
-- Table structure for t_info
-- ----------------------------
DROP TABLE IF EXISTS `t_info`;
CREATE TABLE `t_info`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subjek` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `isi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tujuan` enum('public','admin','pp','tu','all') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal_kirim` timestamp NOT NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  `tahun_info` year NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_info
-- ----------------------------
INSERT INTO `t_info` VALUES (1, 'Selamat Datang', '<p><strong>Hallo semua</strong>, selamat datang di web kelulusan <strong>SMAN 1 2x11 ENAM LINGKUNG</strong>. Segala informasi yang berkaitan dengan <strong><u>kelulusan kelas XII</u></strong> akan diumumkan melalui web ini.&nbsp;</p>\r\n\r\n<p>Pantengin terus web ini ya!</p>', 'all', '2020-01-01 14:40:36', 2020);
INSERT INTO `t_info` VALUES (2, 'Tugas Admin', '<p>admin bertanggungjawab untuk menginput data siswa, mengontrol web dan memberikan setiap informasi yang ada</p>', 'admin', '2020-01-01 14:40:45', 2020);
INSERT INTO `t_info` VALUES (3, 'Tugas Pegawai Pustaka', '<p>pegawai pustaka wajib menginput data siswa yang telah menyelesaikan urusan dengan perpustakaan. pegawai bisa menginput data siswa tersebut pada menu yang tersedia.</p>\r\n\r\n<p>terima kasih</p>', 'pp', '2020-01-01 14:40:52', 2020);
INSERT INTO `t_info` VALUES (4, 'Tugas Pegawai Tata Usaha', '<p>pegawai tata usaha wajib menginput data siswa yang telah menyelesaikan urusan dengan administrasi tata usaha. pegawai bisa menginput data siswa tersebut pada menu yang tersedia.</p>\r\n\r\n<p>terima kasih</p>', 'tu', '2020-01-01 14:41:00', 2020);
INSERT INTO `t_info` VALUES (5, 'Panduan Lihat Kelulusan', '<p>dalam melihat kelulusan, silahkan masukan no peserta UNBK dengan lengkap dan tanggal lahir anda. setelah data keluar, cek data diri anda dan kalau ada yang salah silahkan hubungi ict sekolah.</p>', 'public', '2020-01-01 14:41:08', 2020);

-- ----------------------------
-- Table structure for t_mapel_pil
-- ----------------------------
DROP TABLE IF EXISTS `t_mapel_pil`;
CREATE TABLE `t_mapel_pil`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mapel_pil` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jurusan` enum('A','S') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_mapel_pil
-- ----------------------------
INSERT INTO `t_mapel_pil` VALUES (1, 'Biologi', 'A');
INSERT INTO `t_mapel_pil` VALUES (2, 'Fisika', 'A');
INSERT INTO `t_mapel_pil` VALUES (3, 'Kimia', 'A');
INSERT INTO `t_mapel_pil` VALUES (4, 'Sosiologi', 'S');
INSERT INTO `t_mapel_pil` VALUES (5, 'Geografi', 'S');
INSERT INTO `t_mapel_pil` VALUES (6, 'Ekonomi', 'S');

-- ----------------------------
-- Table structure for t_n_rapor
-- ----------------------------
DROP TABLE IF EXISTS `t_n_rapor`;
CREATE TABLE `t_n_rapor`  (
  `no_pes` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pai` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ppkn` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ind` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `mtk` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `sejind` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ing` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `senbud` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pjok` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pkwu` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `mat_sej` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `fis_eko` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kim_sos` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `bio_geo` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `lm` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tahun` year NOT NULL,
  PRIMARY KEY (`no_pes`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_n_rapor
-- ----------------------------
INSERT INTO `t_n_rapor` VALUES ('3-12-08-004-123-1', '83', '88', '78', '81', '80', '82', '84', '86', '90', '92', '93', '85', '83', '81', 2020);
INSERT INTO `t_n_rapor` VALUES ('3-12-08-004-321-3', '80', '88', '86', '81', '80', '91', '84', '97', '83', '92', '93', '85', '83', '84', 2020);
INSERT INTO `t_n_rapor` VALUES ('3-12-08-004-567-4', '92', '96', '94', '83', '89', '80', '88', '83', '94', '82', '81', '90', '91', '92', 2020);
INSERT INTO `t_n_rapor` VALUES ('3-12-08-004-568-4', '80', '81', '88', '86', '84', '83', '90', '97', '95', '93', '83', '87', '88', '84', 2020);
INSERT INTO `t_n_rapor` VALUES ('3-12-08-004-569-5', '77', '87', '80', '87', '87', '67', '88', '65', '78', '78', '76', '88', '64', '70', 2020);

-- ----------------------------
-- Table structure for t_n_un
-- ----------------------------
DROP TABLE IF EXISTS `t_n_un`;
CREATE TABLE `t_n_un`  (
  `no_pes` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `mapel_pil` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `bin` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `bing` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `mat` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pil` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ket` enum('L','TL') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tahun` year NOT NULL,
  PRIMARY KEY (`no_pes`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_n_un
-- ----------------------------
INSERT INTO `t_n_un` VALUES ('3-12-08-004-123-1', 'Biologi', '90', '88', '78', '80', 'L', 2020);
INSERT INTO `t_n_un` VALUES ('3-12-08-004-321-3', 'Kimia', '90', '90', '89', '86', 'L', 2020);
INSERT INTO `t_n_un` VALUES ('3-12-08-004-567-4', 'Kimia', '80', '84', '81', '77', 'L', 2020);
INSERT INTO `t_n_un` VALUES ('3-12-08-004-568-4', 'Ekonomi', '88', '82', '83', '78', 'TL', 2020);
INSERT INTO `t_n_un` VALUES ('3-12-08-004-569-5', 'Biologi', '87', '89', '88', '95', 'L', 2020);
INSERT INTO `t_n_un` VALUES ('3-12-08-004-570-7', 'Sosiologi', '90', '67', '98', '66', 'TL', 2020);

-- ----------------------------
-- Table structure for t_n_us
-- ----------------------------
DROP TABLE IF EXISTS `t_n_us`;
CREATE TABLE `t_n_us`  (
  `no_pes` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pai` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ppkn` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ind` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `mtk` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `sejind` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ing` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `senbud` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pjok` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pkwu` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `mat_sej` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `fis_eko` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kim_sos` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `bio_geo` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `lm` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tahun` year NOT NULL,
  PRIMARY KEY (`no_pes`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_n_us
-- ----------------------------
INSERT INTO `t_n_us` VALUES ('3-12-08-004-123-1', '86', '88', '87', '89', '70', '88', '90', '97', '91', '90', '80', '85', '83', '84', 2020);
INSERT INTO `t_n_us` VALUES ('3-12-08-004-321-3', '86', '88', '86', '87', '90', '91', '92', '83', '81', '88', '80', '85', '90', '91', 2020);
INSERT INTO `t_n_us` VALUES ('3-12-08-004-567-4', '80', '81', '88', '86', '84', '83', '90', '97', '95', '93', '83', '87', '88', '84', 2020);
INSERT INTO `t_n_us` VALUES ('3-12-08-004-568-4', '77', '87', '80', '87', '87', '67', '88', '65', '78', '78', '76', '88', '64', '70', 2020);
INSERT INTO `t_n_us` VALUES ('3-12-08-004-569-5', '91', '90', '79', '85', '66', '77', '56', '76', '86', '69', '87', '57', '76', '76', 2020);

-- ----------------------------
-- Table structure for t_profilsekolah
-- ----------------------------
DROP TABLE IF EXISTS `t_profilsekolah`;
CREATE TABLE `t_profilsekolah`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `npsn` int(11) NOT NULL,
  `nama_sekolah` varchar(256) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat` varchar(256) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `daerah` enum('Kab','Kot') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kab_kota` varchar(256) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `prov` varchar(256) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kode_pos` int(11) NOT NULL,
  `telp` varchar(256) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(256) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `website` varchar(256) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `logo_prov` varchar(256) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `logo_sekolah` varchar(256) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kepsek` varchar(256) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nip_kepsek` varchar(256) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tahun_ajaran` varchar(256) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_profilsekolah
-- ----------------------------
INSERT INTO `t_profilsekolah` VALUES (1, 10305549, 'SMAN 1 2x11 ENAM LINGKUNG', 'Jl. Bari Sicincin', 'Kab', 'Padang Pariaman', 'Sumatera Barat', 25584, '0751675129', 'smansa2x11el@gmail.com', 'sman12x11el.sch.id', 'Logo_Prov.png', 'Logo_Sekolah10305549.png', 'SRI ASTUTI, S.Pd, MM', '19620414 198703 2 008', '2019/2020', '2020-02-23 19:22:45');

-- ----------------------------
-- Table structure for t_system
-- ----------------------------
DROP TABLE IF EXISTS `t_system`;
CREATE TABLE `t_system`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `akses` enum('buka','tutup') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `waktu_pengumuman` datetime NOT NULL,
  `tahun_data` year NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_system
-- ----------------------------
INSERT INTO `t_system` VALUES (1, 'tutup', '2020-12-02 12:00:00', 2020);

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `foto` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(256) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `level` enum('admin','pp','tu') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `is_active` int(1) NOT NULL,
  `last_login` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'Admin', 'emaildummy@gmail.com', 'default.jpg', '$2y$10$c2ih/rzL8VAgnssERQkjs.1o3C3PlHEzSPjoWtIdXtCAS0Z/iSGMK', 'admin', 1, 1668845637);

SET FOREIGN_KEY_CHECKS = 1;
