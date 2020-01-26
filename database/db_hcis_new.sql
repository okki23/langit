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

 Date: 26/01/2020 22:37:42
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for core_identity_user
-- ----------------------------
DROP TABLE IF EXISTS `core_identity_user`;
CREATE TABLE `core_identity_user`  (
  `instance` varchar(5) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `user_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `status_process` varchar(1) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user_alias` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `status_active` varchar(1) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT '1',
  `status_change` varchar(1) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT '0',
  `status_action` varchar(1) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `status_locked` varchar(1) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT '0',
  `logon_failed_no` int(11) NULL DEFAULT NULL,
  `logon_success_no` int(11) NULL DEFAULT NULL,
  `logon_first_date` datetime(0) NULL DEFAULT NULL,
  `logon_last_date` datetime(0) NULL DEFAULT NULL,
  `logon_success_last_date` datetime(0) NULL DEFAULT NULL,
  `password_last_change_date` datetime(0) NULL DEFAULT NULL,
  `name_title` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `name_prefix` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `name_prefix_other` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `name_first` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `name_mid` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `name_last` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `name_nick` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `name_full` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `name_suffix` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `name_suffix_other` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `org_company` varchar(70) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `org_directorate` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `org_sub_directorate` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `org_group` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `org_division` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `org_department` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `org_section` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `address_office_street` text CHARACTER SET utf8 COLLATE utf8_bin NULL,
  `address_office_city` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `address_office_province` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `address_office_country` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `address_office_zip` varchar(5) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `address_home_street` text CHARACTER SET utf8 COLLATE utf8_bin NULL,
  `address_home_city` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `address_home_province` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `address_home_country` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `address_home_zip` varchar(5) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `comm_office_phone_country` varchar(2) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `comm_office_phone_area` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `comm_office_phone_no` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `comm_office_phone_ext` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `comm_office_fax_country` varchar(2) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `comm_office_fax_area` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `comm_office_fax_no` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `comm_office_fax_ext` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `comm_mobile_phone_country` varchar(2) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `comm_mobile_phone_area` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `comm_mobile_phone_no` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `comm_home_phone_country` varchar(2) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `comm_home_phone_area` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `comm_home_phone_no` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `comm_email_office` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `comm_email_personal` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `comm_messenger_yahoo` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `comm_messenger_gtalk` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `comm_messenger_blackberry` varchar(8) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `comm_messenger_imessage` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `comm_messenger_skype` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `auth_user_type` varchar(1) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `lit_auth_password` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `lit_level_user` int(1) NOT NULL,
  `lit_code_core_orm` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `lit_authority` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `auth_password` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `auth_password_salt` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `auth_valid_from` varchar(8) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `auth_valid_to` varchar(8) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `default_language` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `default_decimal` varchar(1) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `default_date` varchar(1) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `default_timezone` varchar(5) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `authorization_user_group` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `authorization_location_all` varchar(1) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `authorization_time_all` varchar(1) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `personnel_id` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`) USING BTREE,
  INDEX `personnel_id`(`personnel_id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of core_identity_user
-- ----------------------------
INSERT INTO `core_identity_user` VALUES ('1000D', 'irul', '1', NULL, '1', '0', NULL, '0', NULL, NULL, NULL, NULL, '2020-01-15 10:42:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'uvKNMPwxLli1js8L+C/M8g==', 1, '01020501', '11111111111111111111111111111111111111212111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '10011279');
INSERT INTO `core_identity_user` VALUES ('1000D', 'admin', '1', NULL, '1', '0', NULL, '0', NULL, NULL, NULL, NULL, '2020-01-26 18:10:57', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'uvKNMPwxLli1js8L+C/M8g==', 3, '01020501', '11111111111111111111111111111111111110101111', 'ac791bb67ab2bebdb24e4fff4d411fc4', '879f3a259c483ccbd5863a71f5909479', '20130709', '99991231', '', '', '', '', '', '0', '0', '10010240');

-- ----------------------------
-- Table structure for human_pa_md_emp_personal
-- ----------------------------
DROP TABLE IF EXISTS `human_pa_md_emp_personal`;
CREATE TABLE `human_pa_md_emp_personal`  (
  `instance` varchar(5) CHARACTER SET cp850 COLLATE cp850_bin NOT NULL,
  `personnel_id` varchar(30) CHARACTER SET cp850 COLLATE cp850_bin NOT NULL,
  `start_date` varchar(8) CHARACTER SET cp850 COLLATE cp850_bin NOT NULL,
  `end_date` varchar(8) CHARACTER SET cp850 COLLATE cp850_bin NOT NULL,
  `status_process` varchar(1) CHARACTER SET cp850 COLLATE cp850_bin NOT NULL,
  `name_full` varchar(100) CHARACTER SET cp850 COLLATE cp850_bin NOT NULL,
  `name_first` varchar(100) CHARACTER SET cp850 COLLATE cp850_bin NOT NULL,
  `name_mid` varchar(30) CHARACTER SET cp850 COLLATE cp850_bin NOT NULL,
  `name_last` varchar(30) CHARACTER SET cp850 COLLATE cp850_bin NOT NULL,
  `name_nick` varchar(30) CHARACTER SET cp850 COLLATE cp850_bin NULL DEFAULT NULL,
  `title` varchar(30) CHARACTER SET cp850 COLLATE cp850_bin NULL DEFAULT NULL,
  `prefix` varchar(30) CHARACTER SET cp850 COLLATE cp850_bin NULL DEFAULT NULL,
  `prefix_other` varchar(50) CHARACTER SET cp850 COLLATE cp850_bin NULL DEFAULT NULL,
  `suffix` varchar(30) CHARACTER SET cp850 COLLATE cp850_bin NULL DEFAULT NULL,
  `suffix_other` varchar(50) CHARACTER SET cp850 COLLATE cp850_bin NULL DEFAULT NULL,
  `gender` varchar(1) CHARACTER SET cp850 COLLATE cp850_bin NULL DEFAULT NULL,
  `birth_date` varchar(8) CHARACTER SET cp850 COLLATE cp850_bin NULL DEFAULT NULL,
  `birth_place` varchar(100) CHARACTER SET cp850 COLLATE cp850_bin NULL DEFAULT NULL,
  `nationality` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ethnic` varchar(30) CHARACTER SET cp850 COLLATE cp850_bin NULL DEFAULT NULL,
  `ethnic_other` varchar(30) CHARACTER SET cp850 COLLATE cp850_bin NULL DEFAULT NULL,
  `religion` varchar(15) CHARACTER SET cp850 COLLATE cp850_bin NULL DEFAULT NULL,
  `marital_status` varchar(15) CHARACTER SET cp850 COLLATE cp850_bin NULL DEFAULT NULL,
  `status_since` varchar(8) CHARACTER SET cp850 COLLATE cp850_bin NULL DEFAULT NULL,
  `no_of_children` int(11) NULL DEFAULT NULL,
  `lit_foto` varchar(150) CHARACTER SET cp850 COLLATE cp850_bin NULL DEFAULT NULL,
  `lit_nik` varchar(30) CHARACTER SET cp850 COLLATE cp850_bin NULL DEFAULT NULL,
  `lit_employee_status` varchar(30) CHARACTER SET cp850 COLLATE cp850_bin NULL DEFAULT NULL,
  `lit_coc` varchar(15) CHARACTER SET cp850 COLLATE cp850_bin NULL DEFAULT NULL,
  `lit_tahun_coc_terbit` varchar(4) CHARACTER SET cp850 COLLATE cp850_bin NULL DEFAULT NULL,
  `lit_sk_penempatan` varchar(50) CHARACTER SET cp850 COLLATE cp850_bin NULL DEFAULT NULL,
  `lit_tmt_penempatan` date NULL DEFAULT NULL,
  `gol_tht` varchar(10) CHARACTER SET cp850 COLLATE cp850_bin NULL DEFAULT NULL,
  `sk_tht` varchar(75) CHARACTER SET cp850 COLLATE cp850_bin NULL DEFAULT NULL,
  `gol_dapen` varchar(10) CHARACTER SET cp850 COLLATE cp850_bin NULL DEFAULT NULL,
  `kd_dapen` varchar(75) CHARACTER SET cp850 COLLATE cp850_bin NULL DEFAULT NULL,
  `created_by` varchar(20) CHARACTER SET cp850 COLLATE cp850_bin NOT NULL,
  `created_at` varchar(14) CHARACTER SET cp850 COLLATE cp850_bin NOT NULL,
  `created_document_id` bigint(20) NOT NULL,
  `changed_by` varchar(20) CHARACTER SET cp850 COLLATE cp850_bin NOT NULL,
  `changed_at` varchar(14) CHARACTER SET cp850 COLLATE cp850_bin NOT NULL,
  `changed_document_id` bigint(20) NULL DEFAULT NULL,
  `locked_by` varchar(20) CHARACTER SET cp850 COLLATE cp850_bin NULL DEFAULT NULL,
  `locked_at` varchar(14) CHARACTER SET cp850 COLLATE cp850_bin NULL DEFAULT NULL,
  PRIMARY KEY (`instance`, `personnel_id`, `start_date`, `end_date`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = cp850 COLLATE = cp850_bin ROW_FORMAT = Compact;

-- ----------------------------
-- Records of human_pa_md_emp_personal
-- ----------------------------
INSERT INTO `human_pa_md_emp_personal` VALUES ('', '10110348', '', '', '', 'Okki', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', 0, '', '', NULL, NULL, NULL);
INSERT INTO `human_pa_md_emp_personal` VALUES ('1000D', '10010240', '20130712', '99991231', '1', 'Pegawai 2', '', '', '', '', NULL, '00', '', '12', '', '1', '19910205', 'BANDUNG', '', 'SND', '', '1', 'S', '', 0, 'assets/images/foto/10010240.JPG', '216012', 'N', '', '', '', '0000-00-00', '', '', '', '', 'ARI KURNIAWAN', '20130712104031', 0, 'irul', '20170801092232', 0, '', '');
INSERT INTO `human_pa_md_emp_personal` VALUES ('1000D', '10011279', '20161107', '99991231', '1', 'Pegawai 1', '', '', '', '', NULL, '', '', '02', '', '1', '19900729', 'PURWOKERTO', 'WNI', 'JWA', '', '1', 'S', '', 0, NULL, '216018', 'A', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', 0, 'irul', '20170801092504', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for lit_el_dat_kelas
-- ----------------------------
DROP TABLE IF EXISTS `lit_el_dat_kelas`;
CREATE TABLE `lit_el_dat_kelas`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_kelas` int(11) NOT NULL,
  `personnel_id` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `isapproveatasan` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `ket_atasan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_daftar` date NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for lit_el_dat_kelas_modul
-- ----------------------------
DROP TABLE IF EXISTS `lit_el_dat_kelas_modul`;
CREATE TABLE `lit_el_dat_kelas_modul`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kelas_id` int(11) NOT NULL,
  `id_kelas_modul` int(11) UNSIGNED NOT NULL,
  `nm_modul` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `materi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '0' COMMENT '1=selesai',
  `tanggal_daftar` date NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of lit_el_dat_kelas_modul
-- ----------------------------
INSERT INTO `lit_el_dat_kelas_modul` VALUES (1, 1, 1, 'HR Management ', '<p>ini Videonya</p><p>&lt;iframe src=\"http://localhost/diklatapps/upload/asdp_safety.mp4\" class=\"note-video-clip\" width=\"100%\" height=\"360\" frameborder=\"0\"&gt;&lt;/iframe&gt;<br></p>', '1', '0000-00-00', NULL, NULL);
INSERT INTO `lit_el_dat_kelas_modul` VALUES (2, 1, 2, 'HR Planning and Recruitment', '<h3><a href=\"https://www.detik.com/tag/Gerhana-Bulan\"><span style=\"font-family: &quot;Tahoma&quot;;\">Gerhana Bulan</span></a><span style=\"font-family: &quot;Tahoma&quot;;\"> </span><a href=\"https://www.detik.com/tag/Gerhana-Bulan-penumbra\"><span style=\"font-family: &quot;Tahoma&quot;;\">Penumbra</span></a><span style=\"font-family: &quot;Tahoma&quot;;\">  (GBP) akan terjadi di Indonesia pada tanggal 11 Januari 2020. Puncak  gerhana terjadi pada pukul 02.10 WIB. Fenomena ini akan menyebabkan air  laut pasang lebih tinggi dibandingkan rata-rata.</span><a href=\"http://www.detik.com\" target=\"_blank\"> detik.com</a></h3><h2><video controls=\"\" src=\"http://localhost/diklatapps/upload/asdp_safety.mp4\" class=\"note-video-clip\" width=\"100%\" height=\"360\"></video><span style=\"font-family: &quot;Comic Sans MS&quot;;\">﻿</span><br></h2>', '1', '0000-00-00', NULL, NULL);
INSERT INTO `lit_el_dat_kelas_modul` VALUES (3, 1, 3, 'Employee Selection', '<p><img style=\"width: 100%;\" src=\"http://localhost/blog-post/assets/images/ddb2.png\"></p>', '1', '0000-00-00', NULL, NULL);
INSERT INTO `lit_el_dat_kelas_modul` VALUES (4, 1, 4, 'Training and Development', '<p><img style=\"width: 100%x;\" src=\"http://localhost/blog-post/assets/images/ddb2.png\"></p><p><img style=\"width: 708.4px;\" src=\"http://localhost/blog-post/assets/images/adi_member2.png\"><br></p><p><br></p>', '1', '0000-00-00', NULL, NULL);
INSERT INTO `lit_el_dat_kelas_modul` VALUES (5, 1, 5, 'Performance Management', '', '0', '0000-00-00', NULL, NULL);
INSERT INTO `lit_el_dat_kelas_modul` VALUES (6, 1, 6, 'Career Management', '', '0', '0000-00-00', NULL, NULL);

-- ----------------------------
-- Table structure for lit_el_kelas
-- ----------------------------
DROP TABLE IF EXISTS `lit_el_kelas`;
CREATE TABLE `lit_el_kelas`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nm_kelas` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_dibuka` date NOT NULL,
  `isactive` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of lit_el_kelas
-- ----------------------------
INSERT INTO `lit_el_kelas` VALUES (1, 'HRM Essential', '2020-01-03', 1, '2020-01-03 00:00:00', '2020-01-03 00:00:00');
INSERT INTO `lit_el_kelas` VALUES (2, 'HRM Strategy', '2020-01-02', 1, '2020-01-02 00:00:00', '2020-01-02 00:00:00');

-- ----------------------------
-- Table structure for lit_el_kelas_modul
-- ----------------------------
DROP TABLE IF EXISTS `lit_el_kelas_modul`;
CREATE TABLE `lit_el_kelas_modul`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nm_modul` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `materi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of lit_el_kelas_modul
-- ----------------------------
INSERT INTO `lit_el_kelas_modul` VALUES (1, 'HR Management ', '', 1, '2020-01-06 00:00:00', '2020-01-06 00:00:00');
INSERT INTO `lit_el_kelas_modul` VALUES (2, 'HR Planning and Recruitment', '', 1, '2020-01-06 00:00:00', '2020-01-06 00:00:00');
INSERT INTO `lit_el_kelas_modul` VALUES (3, 'Employee Selection', '', 1, '2020-01-06 00:00:00', '2020-01-06 00:00:00');
INSERT INTO `lit_el_kelas_modul` VALUES (4, 'Training and Development', '', 1, '2020-01-06 00:00:00', '2020-01-06 00:00:00');
INSERT INTO `lit_el_kelas_modul` VALUES (5, 'Performance Management', '', 1, '2020-01-06 00:00:00', '2020-01-06 00:00:00');
INSERT INTO `lit_el_kelas_modul` VALUES (6, 'Career Management', '', 1, '2020-01-06 00:00:00', '2020-01-06 00:00:00');

-- ----------------------------
-- Table structure for lit_el_tab_video
-- ----------------------------
DROP TABLE IF EXISTS `lit_el_tab_video`;
CREATE TABLE `lit_el_tab_video`  (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nm_video` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `author` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pathfile` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for lit_logging
-- ----------------------------
DROP TABLE IF EXISTS `lit_logging`;
CREATE TABLE `lit_logging`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ip_address` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `wtd` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `sqldata` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `waktu` datetime(0) NOT NULL,
  `isread` set('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 43 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of lit_logging
-- ----------------------------
INSERT INTO `lit_logging` VALUES (1, 'irul', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'irul\' AND lit_auth_password = \'JN2/qIqovDnHVSpx2ubg6A==\' and status_locked = 0 ', '2020-01-14 11:44:20', '0');
INSERT INTO `lit_logging` VALUES (2, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'JN2/qIqovDnHVSpx2ubg6A==\' and status_locked = 0 ', '2020-01-14 14:25:18', '0');
INSERT INTO `lit_logging` VALUES (3, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'JN2/qIqovDnHVSpx2ubg6A==\' and status_locked = 0 ', '2020-01-14 15:56:39', '0');
INSERT INTO `lit_logging` VALUES (4, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'JN2/qIqovDnHVSpx2ubg6A==\' and status_locked = 0 ', '2020-01-14 15:58:16', '0');
INSERT INTO `lit_logging` VALUES (5, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'JN2/qIqovDnHVSpx2ubg6A==\' and status_locked = 0 ', '2020-01-14 16:03:43', '0');
INSERT INTO `lit_logging` VALUES (6, 'irul', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'irul\' AND lit_auth_password = \'JN2/qIqovDnHVSpx2ubg6A==\' and status_locked = 0 ', '2020-01-14 16:11:15', '0');
INSERT INTO `lit_logging` VALUES (7, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'JN2/qIqovDnHVSpx2ubg6A==\' and status_locked = 0 ', '2020-01-14 16:11:37', '0');
INSERT INTO `lit_logging` VALUES (8, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'JN2/qIqovDnHVSpx2ubg6A==\' and status_locked = 0 ', '2020-01-14 16:12:53', '0');
INSERT INTO `lit_logging` VALUES (9, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'JN2/qIqovDnHVSpx2ubg6A==\' and status_locked = 0 ', '2020-01-14 16:14:51', '0');
INSERT INTO `lit_logging` VALUES (10, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'JN2/qIqovDnHVSpx2ubg6A==\' and status_locked = 0 ', '2020-01-14 16:15:35', '0');
INSERT INTO `lit_logging` VALUES (11, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'JN2/qIqovDnHVSpx2ubg6A==\' and status_locked = 0 ', '2020-01-14 16:16:16', '0');
INSERT INTO `lit_logging` VALUES (12, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'JN2/qIqovDnHVSpx2ubg6A==\' and status_locked = 0 ', '2020-01-14 16:18:19', '0');
INSERT INTO `lit_logging` VALUES (13, 'irul', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'irul\' AND lit_auth_password = \'JN2/qIqovDnHVSpx2ubg6A==\' and status_locked = 0 ', '2020-01-14 16:18:25', '0');
INSERT INTO `lit_logging` VALUES (14, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'JN2/qIqovDnHVSpx2ubg6A==\' and status_locked = 0 ', '2020-01-14 16:19:06', '0');
INSERT INTO `lit_logging` VALUES (15, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'JN2/qIqovDnHVSpx2ubg6A==\' and status_locked = 0 ', '2020-01-14 16:21:08', '0');
INSERT INTO `lit_logging` VALUES (16, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'JN2/qIqovDnHVSpx2ubg6A==\' and status_locked = 0 ', '2020-01-14 16:22:50', '0');
INSERT INTO `lit_logging` VALUES (17, 'irul', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'irul\' AND lit_auth_password = \'JN2/qIqovDnHVSpx2ubg6A==\' and status_locked = 0 ', '2020-01-14 16:24:28', '0');
INSERT INTO `lit_logging` VALUES (18, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'JN2/qIqovDnHVSpx2ubg6A==\' and status_locked = 0 ', '2020-01-14 16:27:11', '0');
INSERT INTO `lit_logging` VALUES (19, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'JN2/qIqovDnHVSpx2ubg6A==\' and status_locked = 0 ', '2020-01-14 16:28:12', '0');
INSERT INTO `lit_logging` VALUES (20, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'JN2/qIqovDnHVSpx2ubg6A==\' and status_locked = 0 ', '2020-01-14 16:29:01', '0');
INSERT INTO `lit_logging` VALUES (21, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'JN2/qIqovDnHVSpx2ubg6A==\' and status_locked = 0 ', '2020-01-14 16:32:30', '0');
INSERT INTO `lit_logging` VALUES (22, 'irul', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'irul\' AND lit_auth_password = \'JN2/qIqovDnHVSpx2ubg6A==\' and status_locked = 0 ', '2020-01-14 16:33:10', '0');
INSERT INTO `lit_logging` VALUES (23, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'JN2/qIqovDnHVSpx2ubg6A==\' and status_locked = 0 ', '2020-01-14 16:35:04', '0');
INSERT INTO `lit_logging` VALUES (24, 'irul', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'irul\' AND lit_auth_password = \'JN2/qIqovDnHVSpx2ubg6A==\' and status_locked = 0 ', '2020-01-14 16:49:50', '0');
INSERT INTO `lit_logging` VALUES (25, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'JN2/qIqovDnHVSpx2ubg6A==\' and status_locked = 0 ', '2020-01-14 16:50:20', '0');
INSERT INTO `lit_logging` VALUES (26, 'irul', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'irul\' AND lit_auth_password = \'JN2/qIqovDnHVSpx2ubg6A==\' and status_locked = 0 ', '2020-01-14 16:55:59', '0');
INSERT INTO `lit_logging` VALUES (27, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'JN2/qIqovDnHVSpx2ubg6A==\' and status_locked = 0 ', '2020-01-14 16:56:47', '0');
INSERT INTO `lit_logging` VALUES (28, 'irul', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'irul\' AND lit_auth_password = \'JN2/qIqovDnHVSpx2ubg6A==\' and status_locked = 0 ', '2020-01-15 10:27:46', '0');
INSERT INTO `lit_logging` VALUES (29, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'JN2/qIqovDnHVSpx2ubg6A==\' and status_locked = 0 ', '2020-01-15 10:27:55', '0');
INSERT INTO `lit_logging` VALUES (30, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-01-15 10:39:21', '0');
INSERT INTO `lit_logging` VALUES (31, 'irul', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'irul\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-01-15 10:39:31', '0');
INSERT INTO `lit_logging` VALUES (32, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-01-15 10:39:38', '0');
INSERT INTO `lit_logging` VALUES (33, 'irul', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'irul\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-01-15 10:42:32', '0');
INSERT INTO `lit_logging` VALUES (34, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-01-15 10:42:41', '0');
INSERT INTO `lit_logging` VALUES (35, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-01-15 10:47:45', '0');
INSERT INTO `lit_logging` VALUES (36, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-01-15 11:02:57', '0');
INSERT INTO `lit_logging` VALUES (37, 'admin', '127.0.0.1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-01-20 11:05:22', '0');
INSERT INTO `lit_logging` VALUES (38, 'admin', '127.0.0.1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-01-20 11:55:06', '0');
INSERT INTO `lit_logging` VALUES (39, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-01-25 20:34:32', '0');
INSERT INTO `lit_logging` VALUES (40, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-01-25 21:04:01', '0');
INSERT INTO `lit_logging` VALUES (41, 'admin', '127.0.0.1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-01-26 06:50:00', '0');
INSERT INTO `lit_logging` VALUES (42, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-01-26 18:10:57', '0');

-- ----------------------------
-- Table structure for lit_pms_dat_perilaku
-- ----------------------------
DROP TABLE IF EXISTS `lit_pms_dat_perilaku`;
CREATE TABLE `lit_pms_dat_perilaku`  (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `personnel_id` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `lit_code_position` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tgl_penilaian` date NOT NULL,
  `periode_penilaian` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tingkat_jabatan` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_kompetensi` int(5) NULL DEFAULT NULL,
  `nilai_atasan` int(5) NOT NULL,
  `nilai_ybs` int(5) NOT NULL,
  `period` int(5) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of lit_pms_dat_perilaku
-- ----------------------------
INSERT INTO `lit_pms_dat_perilaku` VALUES (1, '10010240', '0502000000300000000', '2020-01-15', '2020', 'D1', 1, 4, 5, 1);
INSERT INTO `lit_pms_dat_perilaku` VALUES (2, '10010240', '0502000000300000000', '2020-01-15', '2020', 'D1', 2, 4, 5, 1);

-- ----------------------------
-- Table structure for lit_pms_tab_perilaku
-- ----------------------------
DROP TABLE IF EXISTS `lit_pms_tab_perilaku`;
CREATE TABLE `lit_pms_tab_perilaku`  (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nm_kompetensi` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `aspek_kompetensi` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `definisi_kompetensi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of lit_pms_tab_perilaku
-- ----------------------------
INSERT INTO `lit_pms_tab_perilaku` VALUES (1, 'Berorientasi pada Hasil (Driving for Result)', 'Intrapersonal Skils', 'Fokus pada Hasil adalah menetapkan standar yang tinggi untuk pencapaian diri sendiri dan kelompok menggunakan metode pengukuran untuk memantau kemajuan dari pencapaian tujuan; secara gigih bekerja untuk mencapai atau melampaui sasaran sambil tetap menikmati proses pencapaian tujuannya serta proses pendidikan berkesinambungan.');
INSERT INTO `lit_pms_tab_perilaku` VALUES (2, 'Pengembangan Hubungan Strategis (Developing Strategic Relationship)', 'Intrapersonal Skils', 'Pengembangan Hubungan Strategis adalah menggunakan gaya interpersonal dan metode komunikasi yang sesuai untuk meyakinkan dan membangun hubungan yang efektif dengan mitra bisnis (misalnya rekan kerja, mitra fungsional, pemasok eksternal, dan mitra aliansi).');

-- ----------------------------
-- Table structure for lit_tab_posisi
-- ----------------------------
DROP TABLE IF EXISTS `lit_tab_posisi`;
CREATE TABLE `lit_tab_posisi`  (
  `id` int(11) NOT NULL,
  `lit_code_position` varchar(30) CHARACTER SET cp850 COLLATE cp850_bin NOT NULL,
  `kel_unitkerja` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_unitkerja` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `name_position` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_jabatan` int(11) NULL DEFAULT NULL,
  `nm_jabatan` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `personnel_id` varchar(30) CHARACTER SET cp850 COLLATE cp850_bin NOT NULL,
  `code_segmentasi_usaha` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `level_jabatan` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status_jabatan` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `bidang` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `subidang` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `bagian` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `subagian` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tipe` set('D','L') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  `kel_unit` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `isaktif` set('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  `nik` varchar(15) CHARACTER SET cp850 COLLATE cp850_bin NOT NULL,
  `lit_foto` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `start_date` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `end_date` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_by` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_at` datetime(0) NOT NULL,
  `changed_by` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `changed_at` datetime(0) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of lit_tab_posisi
-- ----------------------------
INSERT INTO `lit_tab_posisi` VALUES (535, '0502000000300000000', 'Direktorat', 'Divisi SDM', 'Manager Pelayanan SDM', 12, '', '10010240', '', '', 'Struktural', '', '', '', '', '', '2', '1', '', '', '20170428', '99991231', '', '0000-00-00 00:00:00', 'admin', '2019-02-04 04:23:35');
INSERT INTO `lit_tab_posisi` VALUES (7883, '0502000000300000005', 'Diretorat', 'Divisi Pengelolaan SDM', 'Staf Pelayanan SDM', 36, '', '10011279', '', 'Staf', 'Staf', '', '', '', '', '', '2', '', '', '', '20190522', '99991231', 'admin', '2019-06-20 03:21:48', '', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for lit_tab_setting_pejabat
-- ----------------------------
DROP TABLE IF EXISTS `lit_tab_setting_pejabat`;
CREATE TABLE `lit_tab_setting_pejabat`  (
  `id` int(11) NOT NULL,
  `keterangan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `lit_code_position` varchar(30) CHARACTER SET cp850 COLLATE cp850_bin NOT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of lit_tab_setting_pejabat
-- ----------------------------
INSERT INTO `lit_tab_setting_pejabat` VALUES (1, 'Setara Direktur SDM dan Layanan Korporasi', '0500000000000000000');
INSERT INTO `lit_tab_setting_pejabat` VALUES (2, 'Setara Vice President Pengelolaan SDM', '0502000000000000000');
INSERT INTO `lit_tab_setting_pejabat` VALUES (3, 'Setara Manager Pelayanan SDM', '0502000000300000000');

SET FOREIGN_KEY_CHECKS = 1;
