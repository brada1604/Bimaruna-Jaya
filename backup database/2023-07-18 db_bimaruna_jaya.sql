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

 Date: 18/07/2023 09:03:24
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
) ENGINE = InnoDB AUTO_INCREMENT = 375 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_absen
-- ----------------------------
INSERT INTO `tbl_absen` VALUES (368, 1, 25, '2023-07-13 23:47:32', '2023-07-13 01:29:18');
INSERT INTO `tbl_absen` VALUES (369, 1, 25, '2023-07-13 23:48:37', '2023-07-13 01:14:09');
INSERT INTO `tbl_absen` VALUES (370, 1, 24, '2023-07-13 01:03:38', '2023-07-13 01:03:38');
INSERT INTO `tbl_absen` VALUES (371, 1, 24, '2023-07-13 01:03:42', '2023-07-13 01:03:42');
INSERT INTO `tbl_absen` VALUES (372, 1, 24, '2023-07-14 01:03:45', '2023-07-13 02:01:23');
INSERT INTO `tbl_absen` VALUES (373, 1, 25, '2023-07-11 01:56:22', '2023-07-13 02:00:03');
INSERT INTO `tbl_absen` VALUES (374, 1, 25, '2023-07-11 01:58:54', '2023-07-13 02:00:07');

-- ----------------------------
-- Table structure for tbl_divisi
-- ----------------------------
DROP TABLE IF EXISTS `tbl_divisi`;
CREATE TABLE `tbl_divisi`  (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `nama_divisi` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 43 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_divisi
-- ----------------------------
INSERT INTO `tbl_divisi` VALUES (1, 'BENGKEL AB', '2023-07-08 17:37:34', '2023-07-08 17:37:34');
INSERT INTO `tbl_divisi` VALUES (2, 'BRANCH SURABAYA', '2023-07-08 17:37:34', '2023-07-08 17:37:34');
INSERT INTO `tbl_divisi` VALUES (3, 'DEPO', '2023-07-08 17:37:34', '2023-07-08 17:37:34');
INSERT INTO `tbl_divisi` VALUES (4, 'DEPO (CY)', '2023-07-08 17:37:34', '2023-07-08 17:37:34');
INSERT INTO `tbl_divisi` VALUES (5, 'FINANCE', '2023-07-08 17:37:34', '2023-07-08 17:37:34');
INSERT INTO `tbl_divisi` VALUES (6, 'FORWARDING', '2023-07-08 17:37:34', '2023-07-08 17:37:34');
INSERT INTO `tbl_divisi` VALUES (7, 'FORWARDING AGENCY', '2023-07-08 17:37:34', '2023-07-08 17:37:34');
INSERT INTO `tbl_divisi` VALUES (8, 'FORWARDING EMKL IMPORT', '2023-07-08 17:37:34', '2023-07-08 17:37:34');
INSERT INTO `tbl_divisi` VALUES (9, 'FORWARDING EXPORT', '2023-07-08 17:37:34', '2023-07-08 17:37:34');
INSERT INTO `tbl_divisi` VALUES (10, 'FORWARDING IMPORT', '2023-07-08 17:37:34', '2023-07-08 17:37:34');
INSERT INTO `tbl_divisi` VALUES (11, 'GA', '2023-07-08 17:37:34', '2023-07-08 17:37:34');
INSERT INTO `tbl_divisi` VALUES (12, 'GA & HRD', '2023-07-08 17:37:34', '2023-07-08 17:37:34');
INSERT INTO `tbl_divisi` VALUES (13, 'HR', '2023-07-08 17:37:34', '2023-07-08 17:37:34');
INSERT INTO `tbl_divisi` VALUES (14, 'HRD & GA', '2023-07-08 17:37:34', '2023-07-08 17:37:34');
INSERT INTO `tbl_divisi` VALUES (15, 'HRD & GA (TRUCKING)', '2023-07-08 17:37:34', '2023-07-08 17:37:34');
INSERT INTO `tbl_divisi` VALUES (16, 'HRD & GA (UMUM)', '2023-07-08 17:37:34', '2023-07-08 17:37:34');
INSERT INTO `tbl_divisi` VALUES (17, 'HSE OFFICER', '2023-07-08 17:37:34', '2023-07-08 17:37:34');
INSERT INTO `tbl_divisi` VALUES (18, 'INVOICE', '2023-07-08 17:37:34', '2023-07-08 17:37:34');
INSERT INTO `tbl_divisi` VALUES (19, 'LOGISTICS', '2023-07-08 17:37:34', '2023-07-08 17:37:34');
INSERT INTO `tbl_divisi` VALUES (20, 'LOGISTIK', '2023-07-08 17:37:34', '2023-07-08 17:37:34');
INSERT INTO `tbl_divisi` VALUES (21, 'MAINTENANCE', '2023-07-08 17:37:34', '2023-07-08 17:37:34');
INSERT INTO `tbl_divisi` VALUES (22, 'MARKETING (TRUCKING)', '2023-07-08 17:37:34', '2023-07-08 17:37:34');
INSERT INTO `tbl_divisi` VALUES (23, 'MARKETING TRUCKING', '2023-07-08 17:37:34', '2023-07-08 17:37:34');
INSERT INTO `tbl_divisi` VALUES (24, 'OPERATION TRUCKING (SURABAYA)', '2023-07-08 17:37:34', '2023-07-08 17:37:34');
INSERT INTO `tbl_divisi` VALUES (25, 'REALISASI', '2023-07-08 17:37:34', '2023-07-08 17:37:34');
INSERT INTO `tbl_divisi` VALUES (26, 'REALISASI & INVOICE', '2023-07-08 17:37:34', '2023-07-08 17:37:34');
INSERT INTO `tbl_divisi` VALUES (27, 'SUPPORT - EXPORT HANKOOK', '2023-07-08 17:37:34', '2023-07-08 17:37:34');
INSERT INTO `tbl_divisi` VALUES (28, 'TRUCKING', '2023-07-08 17:37:34', '2023-07-08 17:37:34');
INSERT INTO `tbl_divisi` VALUES (29, 'TRUCKING ( SEMARANG)', '2023-07-08 17:37:34', '2023-07-08 17:37:34');
INSERT INTO `tbl_divisi` VALUES (30, 'TRUCKING (MARKETING)', '2023-07-08 17:37:34', '2023-07-08 17:37:34');
INSERT INTO `tbl_divisi` VALUES (31, 'TRUCKING (SEMARANG)', '2023-07-08 17:37:34', '2023-07-08 17:37:34');
INSERT INTO `tbl_divisi` VALUES (32, 'TRUCKING (SURABAYA)', '2023-07-08 17:37:34', '2023-07-08 17:37:34');
INSERT INTO `tbl_divisi` VALUES (33, 'WAREHOUSE', '2023-07-08 17:37:34', '2023-07-08 17:37:34');
INSERT INTO `tbl_divisi` VALUES (34, 'WAREHOUSE - FREE ZONE', '2023-07-08 17:37:34', '2023-07-08 17:37:34');
INSERT INTO `tbl_divisi` VALUES (35, 'WAREHOUSE - GD. BERIKAT', '2023-07-08 17:37:34', '2023-07-08 17:37:34');
INSERT INTO `tbl_divisi` VALUES (36, 'WAREHOUSE CFS', '2023-07-08 17:37:34', '2023-07-08 17:37:34');
INSERT INTO `tbl_divisi` VALUES (37, 'WAREHOUSE FREEZONE', '2023-07-08 17:37:34', '2023-07-08 17:37:34');
INSERT INTO `tbl_divisi` VALUES (38, 'WAREHOUSE GB', '2023-07-08 17:37:34', '2023-07-08 17:37:34');
INSERT INTO `tbl_divisi` VALUES (39, 'WH/ MARKETING', '2023-07-08 17:37:34', '2023-07-08 17:37:34');
INSERT INTO `tbl_divisi` VALUES (40, 'WORKSHOP - AB', '2023-07-08 17:37:34', '2023-07-08 17:37:34');
INSERT INTO `tbl_divisi` VALUES (41, 'WORKSHOP - BRJ', '2023-07-08 17:37:34', '2023-07-08 17:37:34');
INSERT INTO `tbl_divisi` VALUES (42, 'WORKSHOP AB', '2023-07-08 17:37:34', '2023-07-08 17:37:34');

-- ----------------------------
-- Table structure for tbl_jabatan
-- ----------------------------
DROP TABLE IF EXISTS `tbl_jabatan`;
CREATE TABLE `tbl_jabatan`  (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 129 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_jabatan
-- ----------------------------
INSERT INTO `tbl_jabatan` VALUES (1, 'CUSTOMER SERVICE', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (2, 'CUSTOMER SERVICE & DOCUMENT STAFF', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (3, 'CUSTOMER SERVICE EXPORT', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (4, 'DOC CUSTOM EXPORT', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (5, 'DOC.STAFF EXIM - SURABAYA', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (6, 'DOCUMENT IMPORT STAFF', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (7, 'DOCUMENT STAFF', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (8, 'DOCUMENT STAFF EXPORT', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (9, 'DRIVER', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (10, 'DRIVER (OPERASIONAL)', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (11, 'ESTIMATOR', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (12, 'FIELD OPR. STAFF', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (13, 'FIELD OPR. STAFF', '2023-07-08 17:38:07', '2023-07-08 17:38:26');
INSERT INTO `tbl_jabatan` VALUES (14, ' (LINER & DEPOT)', '2023-07-08 17:38:07', '2023-07-08 17:38:23');
INSERT INTO `tbl_jabatan` VALUES (15, 'FORWARDING DOC. EXPORT', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (16, 'GENERAL MANAGER', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (17, 'HR STAFF ( ER/IR)', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (18, 'HRD & GA STAFF', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (19, 'HSE', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (20, 'HSE STAFF', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (21, 'INVENTORY STAFF', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (22, 'IT STAFF', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (23, 'KASIR', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (24, 'KASIR REALISASI TRUCKING', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (25, 'KEBERSIHAN', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (26, 'KRANI', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (27, 'MANAGER', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (28, 'MANAGER BENGKEL', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (29, 'MANAGER MARKETING', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (30, 'MANAGER TRUCKING (UMUM)', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (31, 'MARKETING MANAGER (TRUCKING)', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (32, 'MARKETING STAFF', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (33, 'MARKETING SUPPORT & CS', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (34, 'MEKANIK', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (35, 'MEKANIK BODY REPAIR', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (36, 'MEKANIK CHASIS', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (37, 'MEKANIK ELEKTRIK', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (38, 'MEKANIK TRUCKING', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (39, 'MEKANIK WELDER', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (40, 'OPERATIONAL STAFF', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (41, 'OPERATOR EMPTY', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (42, 'OPERATOR FORWADING EXPORT', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (43, 'OPERATOR FULL', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (44, 'OPERATOR TELP', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (45, 'OPR. FORKLIFT', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (46, 'QC REPAIR', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (47, 'SALES MANAGER', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (48, 'SALES MANAGER FORWARDING', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (49, 'SECRETARY', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (50, 'SENIOR MARKETING STAFF', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (51, 'SENIOR MEKANIK', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (52, 'SPV GA', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (53, 'SPV MARKETING TRUCKING', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (54, 'SPV RELISASI', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (55, 'SPV TRUCKING OPERASIONAL', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (56, 'SPV. FREEZONE', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (57, 'STAF ADM LOGISTICS', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (58, 'STAF LOGISTIC', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (59, 'STAFF (HANKOOK)', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (60, 'STAFF (INVOICE)', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (61, 'STAFF (NON HANKOOK)', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (62, 'STAFF (PIB OUT REPORTING)', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (63, 'STAFF (REALISASI)', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (64, 'STAFF ACCOUNTING', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (65, 'STAFF ACCOUNTING & FINANCE', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (66, 'STAFF ADMIN', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (67, 'STAFF ADMIN DELIVERY ORDER', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (68, 'STAFF ADMIN GA', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (69, 'STAFF ADMIN GUDANG BERIKAT', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (70, 'STAFF ADMIN IMPORT', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (71, 'STAFF ADMIN LIFT OFF', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (72, 'STAFF ADMIN LOGISTIK', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (73, 'STAFF ADMIN MARKETING', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (74, 'STAFF ADMIN OPERASIONAL', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (75, 'STAFF ADMIN OPERASIONAL (MERAK)', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (76, 'STAFF ADMIN PRICING', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (77, 'STAFF ADMIN WINGBOX', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (78, 'STAFF ADMINISTRASI', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (79, 'STAFF AR & INCOME', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (80, 'STAFF CS & DOC EXPORT', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (81, 'STAFF CS & REPORTING', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (82, 'STAFF CS IMPORT', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (83, 'STAFF CUST. SERVICE', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (84, 'STAFF DIGITAL MARKETING & DESAIN GRAFIS', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (85, 'STAFF DO', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (86, 'STAFF DOCUMENTATION & REPORTING', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (87, 'STAFF EMKL OPERATION', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (88, 'STAFF GATE IN', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (89, 'STAFF HRD', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (90, 'STAFF HSE GUDANG & ISO', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (91, 'STAFF INCOME & AR', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (92, 'STAFF INVENTORY', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (93, 'STAFF INVOICE', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (94, 'STAFF IT', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (95, 'STAFF KASIR', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (96, 'STAFF KASIR TRUCKING', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (97, 'STAFF KRANI', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (98, 'STAFF LIFT OFF', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (99, 'STAFF M&R', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (100, 'STAFF MEKANIK', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (101, 'STAFF MONITORING TRUCKING', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (102, 'STAFF OPEASIONAL', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (103, 'STAFF OPERASIONAL', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (104, 'STAFF OPERASIONAL (KARAWANG)', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (105, 'STAFF OPERASIONAL (MERAK)', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (106, 'STAFF OPERASIONAL LINER', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (107, 'STAFF OPERASIONAL PORT', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (108, 'STAFF OPERASIONAL TRUCKING', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (109, 'STAFF OPERASIONAL TRUCKING (TMS)', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (110, 'STAFF OPERASIONAL WINGBOX', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (111, 'STAFF OPERATION', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (112, 'STAFF OPERATION TRUCKING', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (113, 'STAFF PRICING MARKETING', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (114, 'STAFF REALISASI', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (115, 'STAFF REALISASI ( SURABAYA)', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (116, 'STAFF SALES SUPPORT', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (117, 'STAFF SURAT JALAN', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (118, 'STAFF SURAT JALAN (KASIR)', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (119, 'STAFF TEAM PROJECT', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (120, 'STAFF TRUCKING', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (121, 'STAFF UMUM (GA)', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (122, 'SUPERVISOR', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (123, 'SUPERVISOR MARKETING TRUCKING', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (124, 'TALL MAN', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (125, 'TALLY MAN', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (126, 'TALLY MAN GB', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (127, 'TALLYMAN', '2023-07-08 17:38:07', '2023-07-08 17:38:07');
INSERT INTO `tbl_jabatan` VALUES (128, 'TEKNISI', '2023-07-08 17:38:07', '2023-07-08 17:38:07');

-- ----------------------------
-- Table structure for tbl_pegawai
-- ----------------------------
DROP TABLE IF EXISTS `tbl_pegawai`;
CREATE TABLE `tbl_pegawai`  (
  `id_pegawai` int(20) NOT NULL AUTO_INCREMENT,
  `id_user` int(20) NOT NULL,
  `id_jabatan` int(20) NOT NULL,
  `id_divisi` int(20) NOT NULL,
  `nomor_induk` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_pegawai` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pendidikan` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lead` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `gender` int(1) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `tgl_masuk` date DEFAULT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_pegawai`) USING BTREE,
  INDEX `id_user`(`id_user`) USING BTREE,
  INDEX `id_jabatan`(`id_jabatan`) USING BTREE,
  INDEX `id_divisi`(`id_divisi`) USING BTREE,
  CONSTRAINT `tbl_pegawai_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_pegawai_ibfk_2` FOREIGN KEY (`id_jabatan`) REFERENCES `tbl_jabatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_pegawai_ibfk_3` FOREIGN KEY (`id_divisi`) REFERENCES `tbl_divisi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 26 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_pegawai
-- ----------------------------
INSERT INTO `tbl_pegawai` VALUES (24, 3, 22, 2, '20230001', 'Pegawai System', 'S1 / D4 / Sederajat', NULL, 1, '2000-01-01', '2015-12-31', '2023-07-08 22:20:31', '2023-07-08 22:20:31');
INSERT INTO `tbl_pegawai` VALUES (25, 33, 1, 1, '20230002', 'Santy Dewi', 'Tidak Sekolah', '24', 0, '2023-07-03', '2023-05-07', '2023-07-09 01:13:49', '2023-07-09 01:13:49');

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
) ENGINE = InnoDB AUTO_INCREMENT = 34 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_user
-- ----------------------------
INSERT INTO `tbl_user` VALUES (1, 1, 'Administrator', 'administrator@bimaruna.com', '$2y$10$qJuz8CGwLwXtPAQ9r/zIW.DjFInUjlK8hDWJSV6EkYonDnxLdKFPa', 1, NULL, '2023-05-27 19:10:18', '2023-06-25 01:16:29');
INSERT INTO `tbl_user` VALUES (2, 2, 'operator', 'operator@bimaruna.com', '$2y$10$qJuz8CGwLwXtPAQ9r/zIW.DjFInUjlK8hDWJSV6EkYonDnxLdKFPa', 1, NULL, '2023-05-27 19:10:18', '2023-06-22 21:23:18');
INSERT INTO `tbl_user` VALUES (3, 3, 'Pegawai', 'pegawai@bimaruna.com', '$2y$10$qJuz8CGwLwXtPAQ9r/zIW.DjFInUjlK8hDWJSV6EkYonDnxLdKFPa', 1, NULL, '2023-05-27 19:10:18', '2023-06-21 00:30:56');
INSERT INTO `tbl_user` VALUES (33, 3, 'Santy Dewi', 'santy@gmail.com', '$2y$10$2c5FJJk4eNxAJowTqgCDyeKUGImk19xrxbEjWeFfs8duyVNsAf6PC', 1, NULL, '2023-07-09 01:13:49', '2023-07-09 03:15:27');

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

-- ----------------------------
-- View structure for v_pegawai
-- ----------------------------
DROP VIEW IF EXISTS `v_pegawai`;
CREATE ALGORITHM = UNDEFINED DEFINER = `root`@`localhost` SQL SECURITY DEFINER VIEW `v_pegawai` AS SELECT
a.id_pegawai,
a.id_user,
a.id_jabatan,
a.id_divisi,
a.nomor_induk,
a.nama_pegawai,
a.pendidikan,
a.lead,
(SELECT nama_pegawai from tbl_pegawai WHERE id_pegawai = a.lead) AS leader,
IF ( a.gender = 1, "Laki - Laki", "Perempuan" ) AS gender,
a.tgl_lahir,
DATE_FORMAT( FROM_DAYS( DATEDIFF( NOW( ), a.tgl_lahir ) ), '%Y' ) + 0 AS usia,
a.tgl_masuk,
b.nama_jabatan,
c.nama_divisi,
d.email,
d.status
FROM
tbl_pegawai AS a
INNER JOIN tbl_jabatan AS b ON a.id_jabatan = b.id
INNER JOIN tbl_divisi AS c ON a.id_divisi = c.id
INNER JOIN tbl_user as d ON a.id_user = d.id ;

-- ----------------------------
-- View structure for v_total_hadir_pegawai_by_nomor_induk_pertahun
-- ----------------------------
DROP VIEW IF EXISTS `v_total_hadir_pegawai_by_nomor_induk_pertahun`;
CREATE ALGORITHM = UNDEFINED DEFINER = `root`@`localhost` SQL SECURITY DEFINER VIEW `v_total_hadir_pegawai_by_nomor_induk_pertahun` AS SELECT
Count(v_absen.nomor_induk) AS total_hadir,
YEAR(v_absen.created_at),
nomor_induk
FROM
v_absen
WHERE
v_absen.status = 1 AND date(v_absen.created_at) = CURDATE()
GROUP BY
v_absen.nomor_induk,
YEAR(v_absen.created_at) ;

-- ----------------------------
-- View structure for v_total_hadir_semua_pegawai_perhari
-- ----------------------------
DROP VIEW IF EXISTS `v_total_hadir_semua_pegawai_perhari`;
CREATE ALGORITHM = UNDEFINED DEFINER = `root`@`localhost` SQL SECURITY DEFINER VIEW `v_total_hadir_semua_pegawai_perhari` AS SELECT
Count(v_absen.nomor_induk) AS total_hadir,
date(v_absen.created_at)
FROM
v_absen
WHERE
v_absen.status = 1 AND date(v_absen.created_at) = CURDATE()
GROUP BY
date(v_absen.created_at) ;

SET FOREIGN_KEY_CHECKS = 1;
