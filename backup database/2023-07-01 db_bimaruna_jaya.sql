/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100427
 Source Host           : localhost:3306
 Source Schema         : db_bimaruna_jaya

 Target Server Type    : MySQL
 Target Server Version : 100427
 File Encoding         : 65001

 Date: 01/07/2023 18:57:54
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_absen
-- ----------------------------
DROP TABLE IF EXISTS `tbl_absen`;
CREATE TABLE `tbl_absen`  (
  `id_absen` int(20) NOT NULL AUTO_INCREMENT,
  `id_petugas` int(20) NOT NULL,
  `id_pegawai` int(20) NOT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_absen`) USING BTREE,
  INDEX `id_petugas`(`id_petugas`) USING BTREE,
  INDEX `id_pegawai`(`id_pegawai`) USING BTREE,
  CONSTRAINT `tbl_absen_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `tbl_pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_absen_ibfk_2` FOREIGN KEY (`id_petugas`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 367 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_absen
-- ----------------------------
INSERT INTO `tbl_absen` VALUES (363, 1, 1, '2023-07-01 18:56:28', '2023-07-01 18:56:28');
INSERT INTO `tbl_absen` VALUES (364, 1, 1, '2023-07-01 18:56:28', '2023-07-01 18:56:28');
INSERT INTO `tbl_absen` VALUES (365, 1, 1, '2023-07-01 18:56:29', '2023-07-01 18:56:29');
INSERT INTO `tbl_absen` VALUES (366, 1, 1, '2023-07-01 18:56:56', '2023-07-01 18:56:56');

-- ----------------------------
-- Table structure for tbl_pegawai
-- ----------------------------
DROP TABLE IF EXISTS `tbl_pegawai`;
CREATE TABLE `tbl_pegawai`  (
  `id_pegawai` int(20) NOT NULL AUTO_INCREMENT,
  `id_user` int(20) NOT NULL,
  `nomor_induk` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_pegawai` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_pegawai`) USING BTREE,
  INDEX `id_user`(`id_user`) USING BTREE,
  CONSTRAINT `tbl_pegawai_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 24 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_pegawai
-- ----------------------------
INSERT INTO `tbl_pegawai` VALUES (1, 3, '202300001', 'Pegawai', '2023-06-22 01:18:47', '2023-06-22 01:18:47');
INSERT INTO `tbl_pegawai` VALUES (2, 5, '202300002', 'Protective', '2023-06-22 01:18:47', '2023-06-22 01:18:47');
INSERT INTO `tbl_pegawai` VALUES (3, 6, '202300003', 'Flufy', '2023-06-22 01:18:47', '2023-06-22 01:18:47');
INSERT INTO `tbl_pegawai` VALUES (4, 7, '202300004', 'Aquatic', '2023-06-22 01:18:47', '2023-06-22 01:18:47');
INSERT INTO `tbl_pegawai` VALUES (5, 8, '202300005', 'Fututr', '2023-06-22 01:18:47', '2023-06-22 01:18:47');
INSERT INTO `tbl_pegawai` VALUES (6, 9, '202300006', 'OverWrought', '2023-06-22 01:18:47', '2023-06-22 01:18:47');
INSERT INTO `tbl_pegawai` VALUES (7, 10, '202300007', 'Whimsical', '2023-06-22 01:18:47', '2023-06-22 01:18:47');
INSERT INTO `tbl_pegawai` VALUES (8, 11, '202300008', 'Periodic', '2023-06-22 01:18:47', '2023-06-22 01:18:47');
INSERT INTO `tbl_pegawai` VALUES (9, 12, '202300009', 'Dashing', '2023-06-22 01:18:47', '2023-06-22 01:18:47');
INSERT INTO `tbl_pegawai` VALUES (10, 13, '202300010', 'Maniacal', '2023-06-22 01:18:47', '2023-06-22 01:18:47');
INSERT INTO `tbl_pegawai` VALUES (11, 14, '202300011', 'Gruesome', '2023-06-22 01:18:47', '2023-06-22 01:18:47');
INSERT INTO `tbl_pegawai` VALUES (12, 15, '202300012', 'Capable', '2023-06-22 01:18:47', '2023-06-22 01:18:47');
INSERT INTO `tbl_pegawai` VALUES (13, 16, '202300013', 'Sweltering', '2023-06-22 01:18:47', '2023-06-22 01:18:47');
INSERT INTO `tbl_pegawai` VALUES (14, 17, '202300014', 'Square', '2023-06-22 01:18:47', '2023-06-22 01:18:47');
INSERT INTO `tbl_pegawai` VALUES (15, 18, '202300015', 'Alluring', '2023-06-22 01:18:47', '2023-06-22 01:18:47');
INSERT INTO `tbl_pegawai` VALUES (16, 19, '202300016', 'Material', '2023-06-22 01:18:47', '2023-06-22 01:18:47');
INSERT INTO `tbl_pegawai` VALUES (17, 20, '202300017', 'Scattered', '2023-06-22 01:18:47', '2023-06-22 01:18:47');
INSERT INTO `tbl_pegawai` VALUES (18, 21, '202300018', 'Late', '2023-06-22 01:18:47', '2023-06-22 01:18:47');
INSERT INTO `tbl_pegawai` VALUES (19, 22, '202300019', 'Wooden', '2023-06-22 01:18:47', '2023-06-22 01:18:47');
INSERT INTO `tbl_pegawai` VALUES (20, 23, '202300020', 'TB ', '2023-06-22 01:18:47', '2023-06-22 01:18:47');

-- ----------------------------
-- Table structure for tbl_user
-- ----------------------------
DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE `tbl_user`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `role` int(1) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0 COMMENT '0 : Email belum aktif\r\n1 : Email Sudah Aktif\r\n2 : Banned',
  `email_verified_at` datetime(0) DEFAULT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 32 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_user
-- ----------------------------
INSERT INTO `tbl_user` VALUES (1, 1, 'Administrator', 'administrator@bimaruna.com', '$2y$10$qJuz8CGwLwXtPAQ9r/zIW.DjFInUjlK8hDWJSV6EkYonDnxLdKFPa', 1, NULL, '2023-05-27 19:10:18', '2023-06-25 01:16:29');
INSERT INTO `tbl_user` VALUES (2, 2, 'operator', 'operator@bimaruna.com', '$2y$10$qJuz8CGwLwXtPAQ9r/zIW.DjFInUjlK8hDWJSV6EkYonDnxLdKFPa', 1, NULL, '2023-05-27 19:10:18', '2023-06-22 21:23:18');
INSERT INTO `tbl_user` VALUES (3, 3, 'Pegawai', 'pegawai@bimaruna.com', '$2y$10$qJuz8CGwLwXtPAQ9r/zIW.DjFInUjlK8hDWJSV6EkYonDnxLdKFPa', 1, NULL, '2023-05-27 19:10:18', '2023-06-21 00:30:56');
INSERT INTO `tbl_user` VALUES (5, 3, 'Protective', 'Protective@bimaruna.com', '$2y$10$qJuz8CGwLwXtPAQ9r/zIW.DjFInUjlK8hDWJSV6EkYonDnxLdKFPa', 1, NULL, '2023-06-22 01:16:06', '2023-06-22 21:23:25');
INSERT INTO `tbl_user` VALUES (6, 3, 'Flufy', 'Fluffy@bimaruna.com', '$2y$10$qJuz8CGwLwXtPAQ9r/zIW.DjFInUjlK8hDWJSV6EkYonDnxLdKFPa', 1, NULL, '2023-06-22 01:16:06', '2023-06-22 01:16:06');
INSERT INTO `tbl_user` VALUES (7, 3, 'Aquatic', 'Aquatic@bimaruna.com', '$2y$10$qJuz8CGwLwXtPAQ9r/zIW.DjFInUjlK8hDWJSV6EkYonDnxLdKFPa', 1, NULL, '2023-06-22 01:16:06', '2023-06-22 01:16:06');
INSERT INTO `tbl_user` VALUES (8, 3, 'Fututr', 'Future@bimaruna.com', '$2y$10$qJuz8CGwLwXtPAQ9r/zIW.DjFInUjlK8hDWJSV6EkYonDnxLdKFPa', 1, NULL, '2023-06-22 01:16:06', '2023-06-22 01:16:06');
INSERT INTO `tbl_user` VALUES (9, 3, 'OverWrought', 'Overwrought@bimaruna.com', '$2y$10$qJuz8CGwLwXtPAQ9r/zIW.DjFInUjlK8hDWJSV6EkYonDnxLdKFPa', 1, NULL, '2023-06-22 01:16:06', '2023-06-22 01:16:06');
INSERT INTO `tbl_user` VALUES (10, 3, 'Whimsical', 'Whimsical@bimaruna.com', '$2y$10$qJuz8CGwLwXtPAQ9r/zIW.DjFInUjlK8hDWJSV6EkYonDnxLdKFPa', 1, NULL, '2023-06-22 01:16:06', '2023-06-22 01:16:06');
INSERT INTO `tbl_user` VALUES (11, 3, 'Periodic', 'Periodic@bimaruna.com', '$2y$10$qJuz8CGwLwXtPAQ9r/zIW.DjFInUjlK8hDWJSV6EkYonDnxLdKFPa', 1, NULL, '2023-06-22 01:16:06', '2023-06-22 01:16:06');
INSERT INTO `tbl_user` VALUES (12, 3, 'Dashing', 'Dashing@bimaruna.com', '$2y$10$qJuz8CGwLwXtPAQ9r/zIW.DjFInUjlK8hDWJSV6EkYonDnxLdKFPa', 1, NULL, '2023-06-22 01:16:06', '2023-06-22 01:16:06');
INSERT INTO `tbl_user` VALUES (13, 3, 'Maniacal', 'Maniacal@bimaruna.com', '$2y$10$qJuz8CGwLwXtPAQ9r/zIW.DjFInUjlK8hDWJSV6EkYonDnxLdKFPa', 1, NULL, '2023-06-22 01:16:06', '2023-06-22 01:16:06');
INSERT INTO `tbl_user` VALUES (14, 3, 'Gruesome', 'Gruesome@bimaruna.com', '$2y$10$qJuz8CGwLwXtPAQ9r/zIW.DjFInUjlK8hDWJSV6EkYonDnxLdKFPa', 1, NULL, '2023-06-22 01:16:06', '2023-06-22 01:16:06');
INSERT INTO `tbl_user` VALUES (15, 3, 'Capable', 'Capable@bimaruna.com', '$2y$10$qJuz8CGwLwXtPAQ9r/zIW.DjFInUjlK8hDWJSV6EkYonDnxLdKFPa', 1, NULL, '2023-06-22 01:16:06', '2023-06-22 01:16:06');
INSERT INTO `tbl_user` VALUES (16, 3, 'Sweltering', 'Sweltering@bimaruna.com', '$2y$10$qJuz8CGwLwXtPAQ9r/zIW.DjFInUjlK8hDWJSV6EkYonDnxLdKFPa', 1, NULL, '2023-06-22 01:16:06', '2023-06-22 01:16:06');
INSERT INTO `tbl_user` VALUES (17, 3, 'Square', 'Square@bimaruna.com', '$2y$10$qJuz8CGwLwXtPAQ9r/zIW.DjFInUjlK8hDWJSV6EkYonDnxLdKFPa', 1, NULL, '2023-06-22 01:16:06', '2023-06-22 01:16:06');
INSERT INTO `tbl_user` VALUES (18, 3, 'Alluring', 'Alluring@bimaruna.com', '$2y$10$qJuz8CGwLwXtPAQ9r/zIW.DjFInUjlK8hDWJSV6EkYonDnxLdKFPa', 1, NULL, '2023-06-22 01:16:06', '2023-06-22 01:16:06');
INSERT INTO `tbl_user` VALUES (19, 3, 'Material', 'Materialistic@bimaruna.com', '$2y$10$qJuz8CGwLwXtPAQ9r/zIW.DjFInUjlK8hDWJSV6EkYonDnxLdKFPa', 1, NULL, '2023-06-22 01:16:06', '2023-06-22 01:16:06');
INSERT INTO `tbl_user` VALUES (20, 3, 'Scattered', 'Scattered@bimaruna.com', '$2y$10$qJuz8CGwLwXtPAQ9r/zIW.DjFInUjlK8hDWJSV6EkYonDnxLdKFPa', 1, NULL, '2023-06-22 01:16:06', '2023-06-22 01:16:06');
INSERT INTO `tbl_user` VALUES (21, 3, 'Late', 'Late@bimaruna.com', '$2y$10$qJuz8CGwLwXtPAQ9r/zIW.DjFInUjlK8hDWJSV6EkYonDnxLdKFPa', 1, NULL, '2023-06-22 01:16:06', '2023-06-22 01:16:06');
INSERT INTO `tbl_user` VALUES (22, 3, 'Wooden', 'Wooden@bimaruna.com', '$2y$10$qJuz8CGwLwXtPAQ9r/zIW.DjFInUjlK8hDWJSV6EkYonDnxLdKFPa', 1, NULL, '2023-06-22 01:16:06', '2023-06-22 01:16:06');
INSERT INTO `tbl_user` VALUES (23, 3, 'TB ', 'Important@bimaruna.com', '$2y$10$qJuz8CGwLwXtPAQ9r/zIW.DjFInUjlK8hDWJSV6EkYonDnxLdKFPa', 1, NULL, '2023-06-22 01:16:06', '2023-06-26 06:55:31');
INSERT INTO `tbl_user` VALUES (25, 2, 'bagus', 'bagusnugroho1604@gmail.com', '$2y$10$qJuz8CGwLwXtPAQ9r/zIW.DjFInUjlK8hDWJSV6EkYonDnxLdKFPa', 1, NULL, '2023-06-25 00:39:53', '2023-07-01 16:42:49');
INSERT INTO `tbl_user` VALUES (26, 2, 'bausss', 'sfdsf@gmai.com', '$2y$10$AikMn5xTPMNUoVwqIEpgiuV9WDJK0SQ4j5DE1jZUpR/qZ.Vt/Nlb.', 0, NULL, '2023-06-25 00:42:58', '2023-06-25 00:55:31');
INSERT INTO `tbl_user` VALUES (27, 2, 'asdas', 'sdds@gmail.com', '$2y$10$jftIIF5I2AmQK5CKxKWTTuaXqTmNauOIFvK2FPw7nQr2zCWzQniwq', 0, NULL, '2023-06-25 00:44:19', '2023-06-25 00:44:19');

-- ----------------------------
-- View structure for v_absen
-- ----------------------------
DROP VIEW IF EXISTS `v_absen`;
CREATE ALGORITHM = UNDEFINED DEFINER = `root`@`localhost` SQL SECURITY DEFINER VIEW `v_absen` AS SELECT
	a.id_absen,
	a.created_at,
	b.nomor_induk,
	b.nama_pegawai,
	c.role,
	c.email,
	a.id_petugas,
	IF(a.id_absen = (select id_absen from tbl_absen WHERE id_pegawai = a.id_pegawai  ORDER BY created_at ASC LIMIT 1), "1", "0") as status
FROM
	tbl_absen as a
	INNER JOIN tbl_pegawai as b ON a.id_pegawai = b.id_pegawai
	INNER JOIN tbl_user as c ON a.id_petugas = c.id 
ORDER BY
	a.created_at DESC ;

SET FOREIGN_KEY_CHECKS = 1;
