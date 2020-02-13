/*
 Navicat Premium Data Transfer

 Source Server         : localhost-56
 Source Server Type    : MySQL
 Source Server Version : 100138
 Source Host           : localhost:3306
 Source Schema         : db_hcis_new

 Target Server Type    : MySQL
 Target Server Version : 100138
 File Encoding         : 65001

 Date: 13/02/2020 08:47:38
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for lit_el_kelas_modul
-- ----------------------------
DROP TABLE IF EXISTS `lit_el_kelas_modul`;
CREATE TABLE `lit_el_kelas_modul`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nm_modul` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `materi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `pathfile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of lit_el_kelas_modul
-- ----------------------------
INSERT INTO `lit_el_kelas_modul` VALUES (1, 'HR Management ', '', 1, NULL, NULL, '2020-01-05 17:00:00', '2020-01-05 17:00:00');
INSERT INTO `lit_el_kelas_modul` VALUES (2, 'HR Planning and Recruitment', '', 1, NULL, NULL, '2020-01-05 17:00:00', '2020-01-05 17:00:00');
INSERT INTO `lit_el_kelas_modul` VALUES (3, 'Employee Selection', '', 1, NULL, NULL, '2020-01-05 17:00:00', '2020-01-05 17:00:00');
INSERT INTO `lit_el_kelas_modul` VALUES (4, 'Training and Development', '', 1, NULL, NULL, '2020-01-05 17:00:00', '2020-01-05 17:00:00');
INSERT INTO `lit_el_kelas_modul` VALUES (5, 'Performance Management', '', 1, NULL, NULL, '2020-01-05 17:00:00', '2020-01-05 17:00:00');
INSERT INTO `lit_el_kelas_modul` VALUES (6, 'Career Management', '', 1, NULL, NULL, '2020-01-05 17:00:00', '2020-01-05 17:00:00');

SET FOREIGN_KEY_CHECKS = 1;
