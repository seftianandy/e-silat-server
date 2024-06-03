/*
 Navicat Premium Data Transfer

 Source Server         : mariakonek
 Source Server Type    : MariaDB
 Source Server Version : 110002 (11.0.2-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : db_esilat

 Target Server Type    : MariaDB
 Target Server Version : 110002 (11.0.2-MariaDB)
 File Encoding         : 65001

 Date: 19/09/2023 10:07:19
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for arena
-- ----------------------------
DROP TABLE IF EXISTS `arena`;
CREATE TABLE `arena` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `arena` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of arena
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for atlit
-- ----------------------------
DROP TABLE IF EXISTS `atlit`;
CREATE TABLE `atlit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `kontingen` varchar(255) DEFAULT NULL,
  `kelas` varchar(255) DEFAULT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `jk` varchar(255) DEFAULT NULL,
  `tim_id` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `no` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of atlit
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for log
-- ----------------------------
DROP TABLE IF EXISTS `log`;
CREATE TABLE `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ronde_id` int(11) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `atlit_id` int(11) DEFAULT NULL,
  `nilai_id` int(11) DEFAULT NULL,
  `insert_time` datetime DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of log
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for nilai
-- ----------------------------
DROP TABLE IF EXISTS `nilai`;
CREATE TABLE `nilai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis` varchar(255) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `nilai_hitung` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of nilai
-- ----------------------------
BEGIN;
INSERT INTO `nilai` (`id`, `jenis`, `nilai`, `nilai_hitung`) VALUES (1, 'pukulan', 1, '1');
INSERT INTO `nilai` (`id`, `jenis`, `nilai`, `nilai_hitung`) VALUES (2, 'tendangan', 2, '2');
INSERT INTO `nilai` (`id`, `jenis`, `nilai`, `nilai_hitung`) VALUES (3, 'jatuhan', 3, '3');
INSERT INTO `nilai` (`id`, `jenis`, `nilai`, `nilai_hitung`) VALUES (4, 'peringatan', 5, '-5');
INSERT INTO `nilai` (`id`, `jenis`, `nilai`, `nilai_hitung`) VALUES (5, 'teguran', 1, '-1');
INSERT INTO `nilai` (`id`, `jenis`, `nilai`, `nilai_hitung`) VALUES (6, 'binaan', 1, '0');
INSERT INTO `nilai` (`id`, `jenis`, `nilai`, `nilai_hitung`) VALUES (7, 'teguran2', 2, '-2');
COMMIT;

-- ----------------------------
-- Table structure for partai
-- ----------------------------
DROP TABLE IF EXISTS `partai`;
CREATE TABLE `partai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `partai` varchar(255) DEFAULT NULL,
  `tim_merah_id` int(11) DEFAULT NULL,
  `tim_biru_id` int(11) DEFAULT NULL,
  `pertandingan` varchar(255) DEFAULT NULL,
  `tgl_pelaksanaan` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of partai
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for penilaian
-- ----------------------------
DROP TABLE IF EXISTS `penilaian`;
CREATE TABLE `penilaian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ronde_id` int(11) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `atlit_id` int(11) DEFAULT NULL,
  `nilai_id` int(11) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of penilaian
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for penilaian_temp
-- ----------------------------
DROP TABLE IF EXISTS `penilaian_temp`;
CREATE TABLE `penilaian_temp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ronde_id` int(11) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `atlit_id` int(11) DEFAULT NULL,
  `nilai_id` int(11) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of penilaian_temp
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for ronde
-- ----------------------------
DROP TABLE IF EXISTS `ronde`;
CREATE TABLE `ronde` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `partai_id` int(11) DEFAULT NULL,
  `arena_id` int(11) DEFAULT NULL,
  `ronde` varchar(255) DEFAULT NULL,
  `status_ronde` varchar(255) DEFAULT NULL,
  `waktu_pertandingan` int(11) DEFAULT NULL,
  `sisa_waktu` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of ronde
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for tim
-- ----------------------------
DROP TABLE IF EXISTS `tim`;
CREATE TABLE `tim` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tim` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of tim
-- ----------------------------
BEGIN;
INSERT INTO `tim` (`id`, `tim`) VALUES (1, 'merah');
INSERT INTO `tim` (`id`, `tim`) VALUES (2, 'biru');
COMMIT;

-- ----------------------------
-- Table structure for tombol
-- ----------------------------
DROP TABLE IF EXISTS `tombol`;
CREATE TABLE `tombol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tombol` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of tombol
-- ----------------------------
BEGIN;
INSERT INTO `tombol` (`id`, `tombol`, `status`) VALUES (1, 'bin_m1', 'off');
INSERT INTO `tombol` (`id`, `tombol`, `status`) VALUES (2, 'bin_m2', 'off');
INSERT INTO `tombol` (`id`, `tombol`, `status`) VALUES (3, 'bin_b1', 'off');
INSERT INTO `tombol` (`id`, `tombol`, `status`) VALUES (4, 'bin_b2', 'off');
INSERT INTO `tombol` (`id`, `tombol`, `status`) VALUES (5, 'teg_m1', 'off');
INSERT INTO `tombol` (`id`, `tombol`, `status`) VALUES (6, 'teg_m2', 'off');
INSERT INTO `tombol` (`id`, `tombol`, `status`) VALUES (7, 'teg_b1', 'off');
INSERT INTO `tombol` (`id`, `tombol`, `status`) VALUES (8, 'teg_b2', 'off');
INSERT INTO `tombol` (`id`, `tombol`, `status`) VALUES (9, 'per_m1', 'off');
INSERT INTO `tombol` (`id`, `tombol`, `status`) VALUES (10, 'per_m2', 'off');
INSERT INTO `tombol` (`id`, `tombol`, `status`) VALUES (11, 'per_m3', 'off');
INSERT INTO `tombol` (`id`, `tombol`, `status`) VALUES (12, 'per_b1', 'off');
INSERT INTO `tombol` (`id`, `tombol`, `status`) VALUES (13, 'per_b2', 'off');
INSERT INTO `tombol` (`id`, `tombol`, `status`) VALUES (14, 'per_b3', 'off');
INSERT INTO `tombol` (`id`, `tombol`, `status`) VALUES (15, 'puk_jm1', 'off');
INSERT INTO `tombol` (`id`, `tombol`, `status`) VALUES (16, 'puk_jm2', 'off');
INSERT INTO `tombol` (`id`, `tombol`, `status`) VALUES (17, 'puk_jm3', 'off');
INSERT INTO `tombol` (`id`, `tombol`, `status`) VALUES (18, 'puk_jb1', 'off');
INSERT INTO `tombol` (`id`, `tombol`, `status`) VALUES (19, 'puk_jb2', 'off');
INSERT INTO `tombol` (`id`, `tombol`, `status`) VALUES (20, 'puk_jb3', 'off');
INSERT INTO `tombol` (`id`, `tombol`, `status`) VALUES (21, 'ten_jm1', 'off');
INSERT INTO `tombol` (`id`, `tombol`, `status`) VALUES (22, 'ten_jm2', 'off');
INSERT INTO `tombol` (`id`, `tombol`, `status`) VALUES (23, 'ten_jm3', 'off');
INSERT INTO `tombol` (`id`, `tombol`, `status`) VALUES (24, 'ten_jb1', 'off');
INSERT INTO `tombol` (`id`, `tombol`, `status`) VALUES (25, 'ten_jb2', 'off');
INSERT INTO `tombol` (`id`, `tombol`, `status`) VALUES (26, 'ten_jb3', 'off');
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` (`id`, `username`, `nama`, `password`, `role`) VALUES (1, 'operator@esilat.com', 'OPERATOR', '19a89cc3085844b8e9b80b4f4dae1b73', 'operator');
INSERT INTO `users` (`id`, `username`, `nama`, `password`, `role`) VALUES (2, 'dewanjuri@esilat.com', 'KETUA PERTANDINGAN', '19a89cc3085844b8e9b80b4f4dae1b73', 'dewan_juri');
INSERT INTO `users` (`id`, `username`, `nama`, `password`, `role`) VALUES (3, 'juri1@esilat.com', 'JURI 1', '19a89cc3085844b8e9b80b4f4dae1b73', 'juri_1');
INSERT INTO `users` (`id`, `username`, `nama`, `password`, `role`) VALUES (4, 'juri2@esilat.com', 'JURI 2', '19a89cc3085844b8e9b80b4f4dae1b73', 'juri_2');
INSERT INTO `users` (`id`, `username`, `nama`, `password`, `role`) VALUES (5, 'juri3@esilat.com', 'JURI 3', '19a89cc3085844b8e9b80b4f4dae1b73', 'juri_3');
INSERT INTO `users` (`id`, `username`, `nama`, `password`, `role`) VALUES (6, 'timer@esilat.com', 'TIMER', '19a89cc3085844b8e9b80b4f4dae1b73', 'timer');
COMMIT;

-- ----------------------------
-- Table structure for vote
-- ----------------------------
DROP TABLE IF EXISTS `vote`;
CREATE TABLE `vote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nilai_id` int(11) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `juri_1` varchar(255) DEFAULT NULL,
  `juri_2` varchar(255) DEFAULT NULL,
  `juri_3` varchar(255) DEFAULT NULL,
  `sudut` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of vote
-- ----------------------------
BEGIN;
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
