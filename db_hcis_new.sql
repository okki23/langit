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

 Date: 29/02/2020 13:47:15
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
INSERT INTO `core_identity_user` VALUES ('1000D', 'irul', '1', NULL, '1', '0', NULL, '0', NULL, NULL, NULL, NULL, '2020-02-29 13:02:29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Irul', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'uvKNMPwxLli1js8L+C/M8g==', 1, '01020501', '11111111111111111111111111111111111111212111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '10011279');
INSERT INTO `core_identity_user` VALUES ('1000D', 'admin', '1', NULL, '1', '0', NULL, '0', NULL, NULL, NULL, NULL, '2020-02-29 08:30:45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'uvKNMPwxLli1js8L+C/M8g==', 3, '01020501', '11111111111111111111111111111111111110101111', 'ac791bb67ab2bebdb24e4fff4d411fc4', '879f3a259c483ccbd5863a71f5909479', '20130709', '99991231', '', '', '', '', '', '0', '0', '10010240');

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
  `personnel_id_atasan` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `isapproveatasan` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `ket_atasan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_daftar` date NULL DEFAULT NULL,
  `file_assignment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `file_realisasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of lit_el_dat_kelas
-- ----------------------------
INSERT INTO `lit_el_dat_kelas` VALUES (3, 1, '10011279', '10010240', '0', '-', '2020-01-29', 'kue.pdf', 'kue.pdf', '2020-01-29 04:01:51', '2020-01-29 04:01:51');
INSERT INTO `lit_el_dat_kelas` VALUES (5, 2, '10011279', '10010240', '0', '-', '2020-01-09', NULL, NULL, '2020-01-30 17:44:49', '2020-01-30 17:44:49');

-- ----------------------------
-- Table structure for lit_el_dat_kelas_modul
-- ----------------------------
DROP TABLE IF EXISTS `lit_el_dat_kelas_modul`;
CREATE TABLE `lit_el_dat_kelas_modul`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_dat_kelas` int(11) NOT NULL,
  `id_kelas_modul` int(11) UNSIGNED NOT NULL,
  `nm_modul` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `materi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '0' COMMENT '1=selesai',
  `tanggal_daftar` date NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 69 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of lit_el_dat_kelas_modul
-- ----------------------------
INSERT INTO `lit_el_dat_kelas_modul` VALUES (1, 23, 1, 'HR Management ', '<p>ini Videonya</p><p>&lt;iframe src=\"http://localhost/diklatapps/upload/asdp_safety.mp4\" class=\"note-video-clip\" width=\"100%\" height=\"360\" frameborder=\"0\"&gt;&lt;/iframe&gt;<br></p>', '1', '0000-00-00', NULL, NULL);
INSERT INTO `lit_el_dat_kelas_modul` VALUES (2, 23, 2, 'HR Planning and Recruitment', '<h3><a href=\"https://www.detik.com/tag/Gerhana-Bulan\"><span style=\"font-family: &quot;Tahoma&quot;;\">Gerhana Bulan</span></a><span style=\"font-family: &quot;Tahoma&quot;;\"> </span><a href=\"https://www.detik.com/tag/Gerhana-Bulan-penumbra\"><span style=\"font-family: &quot;Tahoma&quot;;\">Penumbra</span></a><span style=\"font-family: &quot;Tahoma&quot;;\">  (GBP) akan terjadi di Indonesia pada tanggal 11 Januari 2020. Puncak  gerhana terjadi pada pukul 02.10 WIB. Fenomena ini akan menyebabkan air  laut pasang lebih tinggi dibandingkan rata-rata.</span><a href=\"http://www.detik.com\" target=\"_blank\"> detik.com</a></h3><h2><video controls=\"\" src=\"http://localhost/diklatapps/upload/asdp_safety.mp4\" class=\"note-video-clip\" width=\"100%\" height=\"360\"></video><span style=\"font-family: &quot;Comic Sans MS&quot;;\">﻿</span><br></h2>', '1', '0000-00-00', NULL, NULL);
INSERT INTO `lit_el_dat_kelas_modul` VALUES (3, 23, 3, 'Employee Selection', '<p><img style=\"width: 100%;\" src=\"http://localhost/blog-post/assets/images/ddb2.png\"></p>', '1', '0000-00-00', NULL, NULL);
INSERT INTO `lit_el_dat_kelas_modul` VALUES (4, 23, 4, 'Training and Development', '<p><img style=\"width: 100%x;\" src=\"http://localhost/blog-post/assets/images/ddb2.png\"></p><p><img style=\"width: 708.4px;\" src=\"http://localhost/blog-post/assets/images/adi_member2.png\"><br></p><p><br></p>', '1', '0000-00-00', NULL, NULL);
INSERT INTO `lit_el_dat_kelas_modul` VALUES (5, 23, 5, 'Performance Management', '', '0', '0000-00-00', NULL, NULL);
INSERT INTO `lit_el_dat_kelas_modul` VALUES (6, 23, 6, 'Career Management', '', '0', '0000-00-00', NULL, NULL);
INSERT INTO `lit_el_dat_kelas_modul` VALUES (14, 33, 1, '', '', '0', '0000-00-00', '2020-02-05 08:46:29', '2020-02-05 08:46:29');
INSERT INTO `lit_el_dat_kelas_modul` VALUES (15, 35, 1, '', '', '0', '0000-00-00', NULL, NULL);
INSERT INTO `lit_el_dat_kelas_modul` VALUES (16, 35, 2, '', '', '0', '0000-00-00', NULL, NULL);
INSERT INTO `lit_el_dat_kelas_modul` VALUES (17, 35, 3, '', '', '0', '0000-00-00', NULL, NULL);
INSERT INTO `lit_el_dat_kelas_modul` VALUES (18, 35, 4, '', '', '0', '0000-00-00', NULL, NULL);
INSERT INTO `lit_el_dat_kelas_modul` VALUES (19, 35, 5, '', '', '0', '0000-00-00', NULL, NULL);
INSERT INTO `lit_el_dat_kelas_modul` VALUES (20, 35, 6, '', '', '0', '0000-00-00', NULL, NULL);
INSERT INTO `lit_el_dat_kelas_modul` VALUES (22, 36, 7, '', '', '0', '0000-00-00', NULL, NULL);
INSERT INTO `lit_el_dat_kelas_modul` VALUES (23, 36, 8, '', '', '0', '0000-00-00', NULL, NULL);
INSERT INTO `lit_el_dat_kelas_modul` VALUES (25, 37, 1, '', '', '1', '0000-00-00', NULL, NULL);
INSERT INTO `lit_el_dat_kelas_modul` VALUES (26, 37, 2, '', '', '1', '0000-00-00', NULL, NULL);
INSERT INTO `lit_el_dat_kelas_modul` VALUES (27, 37, 3, '', '', '0', '0000-00-00', NULL, NULL);
INSERT INTO `lit_el_dat_kelas_modul` VALUES (28, 37, 4, '', '', '0', '0000-00-00', NULL, NULL);
INSERT INTO `lit_el_dat_kelas_modul` VALUES (29, 37, 5, '', '', '0', '0000-00-00', NULL, NULL);
INSERT INTO `lit_el_dat_kelas_modul` VALUES (30, 37, 6, '', '', '0', '0000-00-00', NULL, NULL);
INSERT INTO `lit_el_dat_kelas_modul` VALUES (32, 38, 7, '', '', '1', '0000-00-00', NULL, NULL);
INSERT INTO `lit_el_dat_kelas_modul` VALUES (33, 38, 8, '', '', '0', '0000-00-00', NULL, NULL);
INSERT INTO `lit_el_dat_kelas_modul` VALUES (34, 39, 1, '', '', '0', '0000-00-00', NULL, NULL);
INSERT INTO `lit_el_dat_kelas_modul` VALUES (35, 39, 2, '', '', '0', '0000-00-00', NULL, NULL);
INSERT INTO `lit_el_dat_kelas_modul` VALUES (36, 39, 3, '', '', '0', '0000-00-00', NULL, NULL);
INSERT INTO `lit_el_dat_kelas_modul` VALUES (37, 39, 4, '', '', '0', '0000-00-00', NULL, NULL);
INSERT INTO `lit_el_dat_kelas_modul` VALUES (38, 39, 5, '', '', '0', '0000-00-00', NULL, NULL);
INSERT INTO `lit_el_dat_kelas_modul` VALUES (39, 39, 6, '', '', '0', '0000-00-00', NULL, NULL);
INSERT INTO `lit_el_dat_kelas_modul` VALUES (40, 6, 1, '', '', '1', '0000-00-00', NULL, NULL);
INSERT INTO `lit_el_dat_kelas_modul` VALUES (41, 6, 2, '', '', '0', '0000-00-00', NULL, NULL);
INSERT INTO `lit_el_dat_kelas_modul` VALUES (42, 6, 3, '', '', '0', '0000-00-00', NULL, NULL);
INSERT INTO `lit_el_dat_kelas_modul` VALUES (43, 6, 4, '', '', '0', '0000-00-00', NULL, NULL);
INSERT INTO `lit_el_dat_kelas_modul` VALUES (44, 6, 5, '', '', '0', '0000-00-00', NULL, NULL);
INSERT INTO `lit_el_dat_kelas_modul` VALUES (45, 6, 6, '', '', '0', '0000-00-00', NULL, NULL);
INSERT INTO `lit_el_dat_kelas_modul` VALUES (46, 6, 19, '', '', '0', '0000-00-00', NULL, NULL);
INSERT INTO `lit_el_dat_kelas_modul` VALUES (50, 3, 1, '', '', '1', '0000-00-00', NULL, NULL);
INSERT INTO `lit_el_dat_kelas_modul` VALUES (51, 3, 2, '', '', '0', '0000-00-00', NULL, NULL);
INSERT INTO `lit_el_dat_kelas_modul` VALUES (52, 3, 3, '', '', '0', '0000-00-00', NULL, NULL);
INSERT INTO `lit_el_dat_kelas_modul` VALUES (53, 3, 4, '', '', '0', '0000-00-00', NULL, NULL);
INSERT INTO `lit_el_dat_kelas_modul` VALUES (54, 3, 5, '', '', '0', '0000-00-00', NULL, NULL);
INSERT INTO `lit_el_dat_kelas_modul` VALUES (55, 3, 6, '', '', '0', '0000-00-00', NULL, NULL);
INSERT INTO `lit_el_dat_kelas_modul` VALUES (56, 5, 13, '', '', '0', '0000-00-00', NULL, NULL);
INSERT INTO `lit_el_dat_kelas_modul` VALUES (57, 5, 14, '', '', '0', '0000-00-00', NULL, NULL);
INSERT INTO `lit_el_dat_kelas_modul` VALUES (58, 5, 15, '', '', '0', '0000-00-00', NULL, NULL);
INSERT INTO `lit_el_dat_kelas_modul` VALUES (59, 5, 16, '', '', '0', '0000-00-00', NULL, NULL);
INSERT INTO `lit_el_dat_kelas_modul` VALUES (60, 5, 17, '', '', '0', '0000-00-00', NULL, NULL);
INSERT INTO `lit_el_dat_kelas_modul` VALUES (61, 5, 19, '', '', '0', '0000-00-00', NULL, NULL);
INSERT INTO `lit_el_dat_kelas_modul` VALUES (62, 6, 13, '', '', '0', '0000-00-00', NULL, NULL);
INSERT INTO `lit_el_dat_kelas_modul` VALUES (63, 6, 14, '', '', '0', '0000-00-00', NULL, NULL);
INSERT INTO `lit_el_dat_kelas_modul` VALUES (64, 6, 15, '', '', '0', '0000-00-00', NULL, NULL);
INSERT INTO `lit_el_dat_kelas_modul` VALUES (65, 6, 16, '', '', '0', '0000-00-00', NULL, NULL);
INSERT INTO `lit_el_dat_kelas_modul` VALUES (66, 6, 17, '', '', '0', '0000-00-00', NULL, NULL);
INSERT INTO `lit_el_dat_kelas_modul` VALUES (67, 6, 19, '', '', '0', '0000-00-00', NULL, NULL);

-- ----------------------------
-- Table structure for lit_el_kelas
-- ----------------------------
DROP TABLE IF EXISTS `lit_el_kelas`;
CREATE TABLE `lit_el_kelas`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_gugus` int(11) NULL DEFAULT NULL,
  `id_sub_gugus` int(11) NULL DEFAULT NULL,
  `nm_kelas` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_dibuka` date NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `isactive` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of lit_el_kelas
-- ----------------------------
INSERT INTO `lit_el_kelas` VALUES (1, 4, 22, 'HRM Essential', '2020-01-03', '0000-00-00', '0000-00-00', 1, '2020-01-03 00:00:00', '2020-01-03 00:00:00');
INSERT INTO `lit_el_kelas` VALUES (2, 4, 22, 'HRM Strategy', '2020-01-02', '0000-00-00', '0000-00-00', 1, '2020-01-02 00:00:00', '2020-01-02 00:00:00');
INSERT INTO `lit_el_kelas` VALUES (5, 2, 2, 'kue mateng', '2020-02-19', '0000-00-00', '0000-00-00', 1, NULL, '2020-02-19 04:30:08');

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
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of lit_el_kelas_modul
-- ----------------------------
INSERT INTO `lit_el_kelas_modul` VALUES (1, 'HR Management ', '<!DOCTYPE html>\n<html>\n<head>\n</head>\n<body>\n<p style=\"text-align: left;\"><strong>Jakarta</strong> -</p>\n<p style=\"text-align: left;\"><a href=\"https://www.detik.com/tag/tikus\">Tikus</a> bisa jadi binatang yang menyebalkan sekaligus membahayakan buat pemilik kendaraan bermotor. Mahasiswi ini, misalnya, motornya mogok gara-gara Varionya dipenuhi cabai yang dibawa tikus.<br /><br />Cerita tikus \'mengoleksi\' cabai di sela-sela motor dan menyebabkan motor mogok dialami oleh seorang wanita bernama Rembulan. Dia membagikan kisah yang menyebalkan namun juga lucu itu melalui akun twitternya, @rreembulan.<br /><br /></p>\n<div id=\"vibeInjectorDiv\" style=\"text-align: left;\">\n<div id=\"_forkInArticleAdContainer\" style=\"width: 0px; height: 0px;\"><ins>\n<div id=\"beacon_d7fb1a893a\" style=\"position: absolute; left: 0px; top: 0px; visibility: hidden;\"><img style=\"width: 0px; height: 0px;\" src=\"https://wtf2.forkcdn.com/www/delivery/lg.php?bannerid=0&amp;campaignid=0&amp;zoneid=4564&amp;loc=https%3A%2F%2Foto.detik.com%2Fmotor%2Fd-4905002%2Fmotor-mogok-gara-gara-tikus-kumpulkan-cabai-di-celah-mesin-kok-bisa&amp;referer=https%3A%2F%2Fid.yahoo.com%2F%3Fp%3Dus&amp;cb=d7fb1a893a\" alt=\"\" width=\"0\" height=\"0\" /></div>\n</ins></div>\n<div id=\"null\" style=\"width: 0px; height: 0px; display: block;\">&nbsp;</div>\n</div>\n<p style=\"text-align: left;\">\"Jadi tadi pagi motorku macet nggak bisa distarter padahal kemarin masih bisa dipakai, klakson sama lampu juga masih bisa nyala,\" cuit Ulan.</p>\n<p style=\"text-align: left;\">&nbsp;</p>\n<p style=\"text-align: left;\"><video style=\"float: left;\" controls=\"controls\" width=\"300\" height=\"150\">\n<source src=\"http://10.236.214.61/langit/file_manager_dir/dadargulung.mp4\" type=\"video/mp4\" /></video></p>\n<p style=\"text-align: left;\">&nbsp;</p>\n<p style=\"text-align: left;\">&nbsp;</p>\n</body>\n</html>', 1, 'Gmail_- Windows 10 Pro.pdf', 1, NULL, '2020-02-19 05:28:15');
INSERT INTO `lit_el_kelas_modul` VALUES (2, 'HR Planning and Recruitment', 'gfg', 1, NULL, NULL, '2020-01-06 00:00:00', '2020-01-06 00:00:00');
INSERT INTO `lit_el_kelas_modul` VALUES (3, 'Employee Selection', 'dfg', 1, NULL, NULL, '2020-01-06 00:00:00', '2020-01-06 00:00:00');
INSERT INTO `lit_el_kelas_modul` VALUES (4, 'Training and Development', 'sd', 1, NULL, NULL, '2020-01-06 00:00:00', '2020-01-06 00:00:00');
INSERT INTO `lit_el_kelas_modul` VALUES (5, 'Performance Management', 'sdf', 1, NULL, NULL, '2020-01-06 00:00:00', '2020-01-06 00:00:00');
INSERT INTO `lit_el_kelas_modul` VALUES (6, 'Career Management', 'dfsdf', 1, NULL, NULL, '2020-01-06 00:00:00', '2020-01-06 00:00:00');
INSERT INTO `lit_el_kelas_modul` VALUES (13, 'Maintenance Bengkel', '', 2, NULL, NULL, NULL, NULL);
INSERT INTO `lit_el_kelas_modul` VALUES (14, 'Tune Up', '', 2, NULL, NULL, NULL, NULL);
INSERT INTO `lit_el_kelas_modul` VALUES (15, 'Reamer Karbu', '', 2, NULL, NULL, NULL, NULL);
INSERT INTO `lit_el_kelas_modul` VALUES (16, 'Infus Injeksi', '', 2, NULL, NULL, NULL, NULL);
INSERT INTO `lit_el_kelas_modul` VALUES (17, 'Cek Fuel Pump', '', 2, NULL, NULL, NULL, NULL);
INSERT INTO `lit_el_kelas_modul` VALUES (19, 'Cek Oil Pressure', '', 2, NULL, NULL, NULL, NULL);
INSERT INTO `lit_el_kelas_modul` VALUES (20, 'kue cucur', '<!DOCTYPE html>\n<html>\n<head>\n</head>\n<body>\n<p><strong>TURIN, iNews.id</strong>&nbsp;&ndash;&nbsp;<a href=\"https://www.inews.id/tag/juventus\" rel=\"nofollow\">Juventus</a>&nbsp;punya kans besar kembali ke singgasana&nbsp;<a href=\"https://www.inews.id/tag/serie-a\" rel=\"nofollow\">Serie A</a>. Syaratnya, mereka harus meraih hasil positif saat menjamu&nbsp;<a href=\"https://www.inews.id/tag/brescia\" rel=\"nofollow\">Brescia</a>&nbsp;pada&nbsp;<em>giornata</em>&nbsp;24 di Allianz Stadium, Minggu (15/2/2020) malam.</p>\n<p>Klub Turin itu dikudeta&nbsp;<a href=\"https://www.inews.id/tag/inter-milan\" rel=\"nofollow\">Inter Milan</a>&nbsp;dari puncak klasemen pekan lalu setelah secara mengejutkan dikalahkan Hellas Verona 1-2.&nbsp;<em>Si Nyonya Tua</em>&nbsp;kini berada di posisi kedua dengan nilai 54, setara&nbsp;<em>I Nerazzurri</em>&nbsp;namun kalah selisih gol.</p>\n<div id=\"adasia_pc_mid1\">\n<div id=\"div-gpt-ad-1567053115539-0_container\"><video controls=\"controls\" width=\"300\" height=\"150\">\n<source src=\"http://localhost/langit/file_manager_dir/dadargulung.mp4\" type=\"video/mp4\" /></video></div>\n</div>\n</body>\n</html>', 1, 'kue.pdf', 1, '2020-02-16 17:40:19', NULL);
INSERT INTO `lit_el_kelas_modul` VALUES (21, 'ddfsfdsf', '<!DOCTYPE html>\n<html>\n<head>\n</head>\n<body>\n<p>&nbsp;</p>\n<p>fdsddfsfddfsf</p>\n<p>fgsfdfsfddsf</p>\n<p><video controls=\"controls\" width=\"300\" height=\"150\">\n<source src=\"http://localhost/langit/file_manager_dir/dadargulung.mp4\" type=\"video/mp4\" /></video></p>\n<p>&nbsp;</p>\n</body>\n</html>', 1, 'kue.pdf', 1, '2020-02-19 05:20:01', NULL);
INSERT INTO `lit_el_kelas_modul` VALUES (22, 'asda', '<!DOCTYPE html>\n<html>\n<head>\n</head>\n<body>\n<p><video style=\"float: left;\" controls=\"controls\" width=\"300\" height=\"150\">\n<source src=\"http://10.236.214.61/langit/file_manager_dir/dadargulung.mp4\" type=\"video/mp4\" /></video>sggdfgfdhdhdhg</p>\n</body>\n</html>', 1, 'ukuran_disk.pdf', 1, NULL, '2020-02-19 05:27:22');

-- ----------------------------
-- Table structure for lit_el_tab_gugus
-- ----------------------------
DROP TABLE IF EXISTS `lit_el_tab_gugus`;
CREATE TABLE `lit_el_tab_gugus`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nm_gugus` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of lit_el_tab_gugus
-- ----------------------------
INSERT INTO `lit_el_tab_gugus` VALUES (1, 'Tata Nilai (Value)', '2020-02-11 00:00:00', '2020-02-11 00:00:00');
INSERT INTO `lit_el_tab_gugus` VALUES (2, 'Teknikal (Technical)', '2020-02-11 00:00:00', '2020-02-11 00:00:00');
INSERT INTO `lit_el_tab_gugus` VALUES (3, 'Efektifitas Diri (Personal Effectiveness)', '2020-02-11 00:00:00', '2020-02-11 00:00:00');
INSERT INTO `lit_el_tab_gugus` VALUES (4, 'Manajemen', '2020-02-11 00:00:00', '2020-02-11 00:00:00');
INSERT INTO `lit_el_tab_gugus` VALUES (5, 'Menjalin Hubungan (Relationship)', '2020-02-11 00:00:00', '2020-02-11 00:00:00');
INSERT INTO `lit_el_tab_gugus` VALUES (6, 'Kepemimpinan (Leadership)', '2020-02-11 00:00:00', '2020-02-11 00:00:00');

-- ----------------------------
-- Table structure for lit_el_tab_gugus_sub
-- ----------------------------
DROP TABLE IF EXISTS `lit_el_tab_gugus_sub`;
CREATE TABLE `lit_el_tab_gugus_sub`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_gugus` int(11) NOT NULL,
  `nm_sub_gugus` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 36 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of lit_el_tab_gugus_sub
-- ----------------------------
INSERT INTO `lit_el_tab_gugus_sub` VALUES (1, 1, 'Budaya Perusahaan (Corporate Culture)', '2020-02-11 00:00:00', '2020-02-11 00:00:00');
INSERT INTO `lit_el_tab_gugus_sub` VALUES (2, 1, 'Semangat Kerja dan Motivasi Kerja (Ethos & Motivation)', '2020-02-11 00:00:00', '2020-02-11 00:00:00');
INSERT INTO `lit_el_tab_gugus_sub` VALUES (4, 2, 'Teknikal tugas pokok', '2020-02-11 00:00:00', '2020-02-11 00:00:00');
INSERT INTO `lit_el_tab_gugus_sub` VALUES (5, 2, 'Teknikal lintas bidang', '2020-02-11 00:00:00', '2020-02-11 00:00:00');
INSERT INTO `lit_el_tab_gugus_sub` VALUES (6, 3, 'Kreativitas (Creativity)', '2020-02-11 00:00:00', '2020-02-11 00:00:00');
INSERT INTO `lit_el_tab_gugus_sub` VALUES (7, 3, 'Komunikasi Personal', '2020-02-11 00:00:00', '2020-02-11 00:00:00');
INSERT INTO `lit_el_tab_gugus_sub` VALUES (8, 3, 'Layanan Prima (Excellent Service)', '2020-02-11 00:00:00', '2020-02-11 00:00:00');
INSERT INTO `lit_el_tab_gugus_sub` VALUES (9, 3, 'Manajemen Waktu (Time Management)', '2020-02-11 00:00:00', '2020-02-11 00:00:00');
INSERT INTO `lit_el_tab_gugus_sub` VALUES (10, 3, 'Ketrampilan Presentasi (Presentation skill)', '2020-02-11 00:00:00', '2020-02-11 00:00:00');
INSERT INTO `lit_el_tab_gugus_sub` VALUES (11, 3, 'Bahasa Inggris', '2020-02-11 00:00:00', '2020-02-11 00:00:00');
INSERT INTO `lit_el_tab_gugus_sub` VALUES (12, 4, 'Manajemen Operasi (Operation Manajemen)', '2020-02-11 00:00:00', '2020-02-11 00:00:00');
INSERT INTO `lit_el_tab_gugus_sub` VALUES (13, 4, 'Manajemen Pelayanan (Services Management)', '2020-02-11 00:00:00', '2020-02-11 00:00:00');
INSERT INTO `lit_el_tab_gugus_sub` VALUES (14, 4, 'Manajemen Proses Bisnis (Business Process Management)', '2020-02-11 00:00:00', '2020-02-11 00:00:00');
INSERT INTO `lit_el_tab_gugus_sub` VALUES (15, 4, 'Manajemen Proyek (Project Management)', '2020-02-11 00:00:00', '2020-02-11 00:00:00');
INSERT INTO `lit_el_tab_gugus_sub` VALUES (16, 4, 'Manajemen Pemasaran (Marketing Management)', '2020-02-11 00:00:00', '2020-02-11 00:00:00');
INSERT INTO `lit_el_tab_gugus_sub` VALUES (17, 4, 'Perencanaan dan Pengorganisasian (Planning & Organizing)', '2020-02-11 00:00:00', '2020-02-11 00:00:00');
INSERT INTO `lit_el_tab_gugus_sub` VALUES (18, 4, 'Manajemen Supervisi (Supervisory Management)', '2020-02-11 00:00:00', '2020-02-11 00:00:00');
INSERT INTO `lit_el_tab_gugus_sub` VALUES (19, 4, 'Manajemen Kinerja (Performance Management)', '2020-02-11 00:00:00', '2020-02-11 00:00:00');
INSERT INTO `lit_el_tab_gugus_sub` VALUES (20, 4, 'Manajemen Resiko (Risk Management)', '2020-02-11 00:00:00', '2020-02-11 00:00:00');
INSERT INTO `lit_el_tab_gugus_sub` VALUES (21, 4, 'Manajemen Keuangan (Finance Management)', '2020-02-11 00:00:00', '2020-02-11 00:00:00');
INSERT INTO `lit_el_tab_gugus_sub` VALUES (22, 4, 'Manajemen SDM (Human Resource Management)', '2020-02-11 00:00:00', '2020-02-11 00:00:00');
INSERT INTO `lit_el_tab_gugus_sub` VALUES (23, 5, 'Komunikasi (Communication)', '2020-02-11 00:00:00', '2020-02-11 00:00:00');
INSERT INTO `lit_el_tab_gugus_sub` VALUES (24, 5, 'Tanggung Jawab Sosial Perusahaan (Corporate Social Responsibility/Program Kemitraan dan Bina Lingkun', '2020-02-11 00:00:00', '2020-02-11 00:00:00');
INSERT INTO `lit_el_tab_gugus_sub` VALUES (25, 5, 'Komunikasi Pemasaran (Marketing Communication)', '2020-02-11 00:00:00', '2020-02-11 00:00:00');
INSERT INTO `lit_el_tab_gugus_sub` VALUES (26, 5, 'Jejaring dan Pendekatan (Networking and Lobby)', '2020-02-11 00:00:00', '2020-02-11 00:00:00');
INSERT INTO `lit_el_tab_gugus_sub` VALUES (27, 5, 'Hubungan Kelembagaan (Goverment Relations)', '2020-02-11 00:00:00', '2020-02-11 00:00:00');
INSERT INTO `lit_el_tab_gugus_sub` VALUES (28, 5, 'Kehumasan (Public Relation)', '2020-02-11 00:00:00', '2020-02-11 00:00:00');
INSERT INTO `lit_el_tab_gugus_sub` VALUES (29, 6, 'Manajemen Perubahan (Change Management)', '2020-02-11 00:00:00', '2020-02-11 00:00:00');
INSERT INTO `lit_el_tab_gugus_sub` VALUES (30, 6, 'Pengambilan Keputusan (Decision Making)', '2020-02-11 00:00:00', '2020-02-11 00:00:00');
INSERT INTO `lit_el_tab_gugus_sub` VALUES (31, 6, 'Kewirausahawan (Entrepreneurship)', '2020-02-11 00:00:00', '2020-02-11 00:00:00');
INSERT INTO `lit_el_tab_gugus_sub` VALUES (32, 6, 'Ketrampilan Bisnis (Business Acumen)', '2020-02-11 00:00:00', '2020-02-11 00:00:00');
INSERT INTO `lit_el_tab_gugus_sub` VALUES (33, 6, 'TOT (Training of Trainer)', '2020-02-11 00:00:00', '2020-02-11 00:00:00');
INSERT INTO `lit_el_tab_gugus_sub` VALUES (34, 6, 'Manajemen Stratejik (Strategic Management)', '2020-02-11 00:00:00', '2020-02-11 00:00:00');
INSERT INTO `lit_el_tab_gugus_sub` VALUES (35, 6, 'Kepemimpinan Transformasional (Trasnformational Management)', '2020-02-11 00:00:00', '2020-02-11 00:00:00');

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
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of lit_el_tab_video
-- ----------------------------
INSERT INTO `lit_el_tab_video` VALUES (1, 'hhhh', 'admin', 'mov_bbb.avi', '2020-02-05 12:03:53', '2020-02-05 12:03:53');
INSERT INTO `lit_el_tab_video` VALUES (2, 'kue dodol', 'admin', 'mov_bbb.avi', '2020-02-05 12:05:01', '2020-02-05 12:05:01');

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
) ENGINE = InnoDB AUTO_INCREMENT = 157 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

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
INSERT INTO `lit_logging` VALUES (43, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-01-27 06:10:53', '0');
INSERT INTO `lit_logging` VALUES (44, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-01-28 12:15:26', '0');
INSERT INTO `lit_logging` VALUES (45, 'irul', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'irul\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-01-28 12:19:41', '0');
INSERT INTO `lit_logging` VALUES (46, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-01-28 12:22:19', '0');
INSERT INTO `lit_logging` VALUES (47, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-01-28 12:52:13', '0');
INSERT INTO `lit_logging` VALUES (48, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-01-29 07:45:00', '0');
INSERT INTO `lit_logging` VALUES (49, 'irul', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'irul\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-01-29 08:58:14', '0');
INSERT INTO `lit_logging` VALUES (50, 'irul', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'irul\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-01-29 08:59:08', '0');
INSERT INTO `lit_logging` VALUES (51, 'irul', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'irul\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-01-29 09:14:11', '0');
INSERT INTO `lit_logging` VALUES (52, 'irul', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'irul\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-01-29 09:16:33', '0');
INSERT INTO `lit_logging` VALUES (53, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-01-29 09:22:10', '0');
INSERT INTO `lit_logging` VALUES (54, 'irul', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'irul\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-01-29 09:22:21', '0');
INSERT INTO `lit_logging` VALUES (55, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-01-29 10:00:32', '0');
INSERT INTO `lit_logging` VALUES (56, 'irul', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'irul\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-01-29 10:01:19', '0');
INSERT INTO `lit_logging` VALUES (57, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-01-30 06:23:24', '0');
INSERT INTO `lit_logging` VALUES (58, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-01-30 08:58:20', '0');
INSERT INTO `lit_logging` VALUES (59, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-01-30 11:13:04', '0');
INSERT INTO `lit_logging` VALUES (60, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-01-30 15:21:34', '0');
INSERT INTO `lit_logging` VALUES (61, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-01-30 15:38:04', '0');
INSERT INTO `lit_logging` VALUES (62, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-01-30 15:38:25', '0');
INSERT INTO `lit_logging` VALUES (63, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-01-30 15:40:15', '0');
INSERT INTO `lit_logging` VALUES (64, 'irul', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'irul\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-01-30 15:40:37', '0');
INSERT INTO `lit_logging` VALUES (65, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-01-30 15:41:26', '0');
INSERT INTO `lit_logging` VALUES (66, 'irul', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'irul\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-01-30 15:42:00', '0');
INSERT INTO `lit_logging` VALUES (67, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-01-30 23:30:00', '0');
INSERT INTO `lit_logging` VALUES (68, 'irul', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'irul\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-01-30 23:32:32', '0');
INSERT INTO `lit_logging` VALUES (69, 'irul', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'irul\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-01-30 23:45:16', '0');
INSERT INTO `lit_logging` VALUES (70, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-01-31 05:59:29', '0');
INSERT INTO `lit_logging` VALUES (71, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-01-31 06:00:41', '0');
INSERT INTO `lit_logging` VALUES (72, 'irul', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'irul\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-01-31 06:00:55', '0');
INSERT INTO `lit_logging` VALUES (73, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-01-31 08:35:48', '0');
INSERT INTO `lit_logging` VALUES (74, 'irul', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'irul\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-01-31 08:41:01', '0');
INSERT INTO `lit_logging` VALUES (75, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-01-31 08:44:45', '0');
INSERT INTO `lit_logging` VALUES (76, 'irul', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'irul\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-01-31 08:49:32', '0');
INSERT INTO `lit_logging` VALUES (77, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-03 06:07:39', '0');
INSERT INTO `lit_logging` VALUES (78, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-03 06:33:16', '0');
INSERT INTO `lit_logging` VALUES (79, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-03 06:40:25', '0');
INSERT INTO `lit_logging` VALUES (80, 'irul', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'irul\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-03 06:42:37', '0');
INSERT INTO `lit_logging` VALUES (81, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-03 07:14:17', '0');
INSERT INTO `lit_logging` VALUES (82, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-03 07:15:11', '0');
INSERT INTO `lit_logging` VALUES (83, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-03 07:18:04', '0');
INSERT INTO `lit_logging` VALUES (84, 'irul', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'irul\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-03 07:31:07', '0');
INSERT INTO `lit_logging` VALUES (85, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-03 07:32:41', '0');
INSERT INTO `lit_logging` VALUES (86, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-03 07:38:36', '0');
INSERT INTO `lit_logging` VALUES (87, 'irul', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'irul\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-03 07:46:10', '0');
INSERT INTO `lit_logging` VALUES (88, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-03 07:49:25', '0');
INSERT INTO `lit_logging` VALUES (89, 'admin', '127.0.0.1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-04 08:30:28', '0');
INSERT INTO `lit_logging` VALUES (90, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-05 11:58:33', '0');
INSERT INTO `lit_logging` VALUES (91, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-05 21:49:11', '0');
INSERT INTO `lit_logging` VALUES (92, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-06 07:11:55', '0');
INSERT INTO `lit_logging` VALUES (93, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-06 16:29:55', '0');
INSERT INTO `lit_logging` VALUES (94, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-06 21:05:24', '0');
INSERT INTO `lit_logging` VALUES (95, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-11 15:07:10', '0');
INSERT INTO `lit_logging` VALUES (96, 'irul', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'irul\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-11 15:07:31', '0');
INSERT INTO `lit_logging` VALUES (97, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-11 20:31:30', '0');
INSERT INTO `lit_logging` VALUES (98, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-13 06:16:34', '0');
INSERT INTO `lit_logging` VALUES (99, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-13 08:09:44', '0');
INSERT INTO `lit_logging` VALUES (100, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-13 08:35:26', '0');
INSERT INTO `lit_logging` VALUES (101, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-13 08:40:13', '0');
INSERT INTO `lit_logging` VALUES (102, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-14 10:01:32', '0');
INSERT INTO `lit_logging` VALUES (103, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-14 19:33:14', '0');
INSERT INTO `lit_logging` VALUES (104, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-14 19:35:34', '0');
INSERT INTO `lit_logging` VALUES (105, 'admin', '127.0.0.1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-15 21:43:06', '0');
INSERT INTO `lit_logging` VALUES (106, 'admin', '127.0.0.1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-16 07:12:20', '0');
INSERT INTO `lit_logging` VALUES (107, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-16 09:45:03', '0');
INSERT INTO `lit_logging` VALUES (108, 'irul', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'irul\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-16 10:01:41', '0');
INSERT INTO `lit_logging` VALUES (109, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-16 10:45:34', '0');
INSERT INTO `lit_logging` VALUES (110, 'irul', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'irul\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-16 10:46:59', '0');
INSERT INTO `lit_logging` VALUES (111, 'irul', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'irul\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-16 12:27:54', '0');
INSERT INTO `lit_logging` VALUES (112, 'irul', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'irul\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-16 15:46:14', '0');
INSERT INTO `lit_logging` VALUES (113, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-16 20:34:03', '0');
INSERT INTO `lit_logging` VALUES (114, 'irul', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'irul\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-16 20:42:55', '0');
INSERT INTO `lit_logging` VALUES (115, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-16 22:12:00', '0');
INSERT INTO `lit_logging` VALUES (116, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-17 22:12:35', '0');
INSERT INTO `lit_logging` VALUES (117, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-17 22:15:16', '0');
INSERT INTO `lit_logging` VALUES (118, 'irul', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'irul\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-17 22:16:09', '0');
INSERT INTO `lit_logging` VALUES (119, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-17 22:26:08', '0');
INSERT INTO `lit_logging` VALUES (120, 'irul', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'irul\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-19 07:00:45', '0');
INSERT INTO `lit_logging` VALUES (121, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-19 08:25:03', '0');
INSERT INTO `lit_logging` VALUES (122, 'irul', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'irul\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-19 09:15:27', '0');
INSERT INTO `lit_logging` VALUES (123, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-19 09:39:28', '0');
INSERT INTO `lit_logging` VALUES (124, 'admin', '10.237.5.26', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-19 11:22:08', '0');
INSERT INTO `lit_logging` VALUES (125, 'admin', '10.236.80.66', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-19 11:22:18', '0');
INSERT INTO `lit_logging` VALUES (126, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-20 14:48:31', '0');
INSERT INTO `lit_logging` VALUES (127, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-21 07:50:51', '0');
INSERT INTO `lit_logging` VALUES (128, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-21 08:50:10', '0');
INSERT INTO `lit_logging` VALUES (129, 'irul', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'irul\' AND lit_auth_password = \'dxpo6cn3R8qwDhBjQDshCQ==\' and status_locked = 0 ', '2020-02-21 09:41:45', '0');
INSERT INTO `lit_logging` VALUES (130, 'irul', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'irul\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-21 09:41:53', '0');
INSERT INTO `lit_logging` VALUES (131, 'irul', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'irul\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-21 10:03:01', '0');
INSERT INTO `lit_logging` VALUES (132, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-22 10:41:09', '0');
INSERT INTO `lit_logging` VALUES (133, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-22 10:42:38', '0');
INSERT INTO `lit_logging` VALUES (134, 'irul', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'irul\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-22 10:42:57', '0');
INSERT INTO `lit_logging` VALUES (135, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-23 21:04:04', '0');
INSERT INTO `lit_logging` VALUES (136, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-23 21:06:47', '0');
INSERT INTO `lit_logging` VALUES (137, 'irul', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'irul\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-23 21:06:57', '0');
INSERT INTO `lit_logging` VALUES (138, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-24 06:53:35', '0');
INSERT INTO `lit_logging` VALUES (139, 'irul', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'irul\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-24 06:54:18', '0');
INSERT INTO `lit_logging` VALUES (140, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-24 10:59:40', '0');
INSERT INTO `lit_logging` VALUES (141, 'irul', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'irul\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-24 11:00:24', '0');
INSERT INTO `lit_logging` VALUES (142, 'irul', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'irul\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-24 16:57:51', '0');
INSERT INTO `lit_logging` VALUES (143, 'pegawai', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'pegawai\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-24 16:58:20', '0');
INSERT INTO `lit_logging` VALUES (144, 'irul', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'irul\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-24 17:05:22', '0');
INSERT INTO `lit_logging` VALUES (145, 'irul', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'irul\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-25 20:35:28', '0');
INSERT INTO `lit_logging` VALUES (146, 'irul', '127.0.0.1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'irul\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-27 06:24:22', '0');
INSERT INTO `lit_logging` VALUES (147, 'irul', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'irul\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-27 13:12:22', '0');
INSERT INTO `lit_logging` VALUES (148, 'admin', '127.0.0.1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-28 07:34:23', '0');
INSERT INTO `lit_logging` VALUES (149, 'irul', '127.0.0.1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'irul\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-28 07:53:28', '0');
INSERT INTO `lit_logging` VALUES (150, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-28 08:33:11', '0');
INSERT INTO `lit_logging` VALUES (151, 'irul', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'irul\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-28 08:33:38', '0');
INSERT INTO `lit_logging` VALUES (152, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-28 09:12:22', '0');
INSERT INTO `lit_logging` VALUES (153, 'irul', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'irul\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-29 08:30:23', '0');
INSERT INTO `lit_logging` VALUES (154, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-29 08:30:45', '0');
INSERT INTO `lit_logging` VALUES (155, 'irul', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'irul\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-29 10:32:47', '0');
INSERT INTO `lit_logging` VALUES (156, 'irul', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'irul\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-02-29 13:02:29', '0');

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

-- ----------------------------
-- Table structure for raport
-- ----------------------------
DROP TABLE IF EXISTS `raport`;
CREATE TABLE `raport`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `personnel_id` int(11) NULL DEFAULT NULL,
  `id_soal` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `result` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of raport
-- ----------------------------
INSERT INTO `raport` VALUES (1, 101, '1', 'true');
INSERT INTO `raport` VALUES (2, 101, '2', 'false');
INSERT INTO `raport` VALUES (3, 101, '3', 'false');
INSERT INTO `raport` VALUES (4, 102, '1', 'false');
INSERT INTO `raport` VALUES (5, 102, '2', 'false');
INSERT INTO `raport` VALUES (6, 102, '3', 'false');

-- ----------------------------
-- Table structure for raport_copy1
-- ----------------------------
DROP TABLE IF EXISTS `raport_copy1`;
CREATE TABLE `raport_copy1`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `personnel_id` int(11) NULL DEFAULT NULL,
  `id_soal` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `result` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of raport_copy1
-- ----------------------------
INSERT INTO `raport_copy1` VALUES (1, 101, '1', 'true');
INSERT INTO `raport_copy1` VALUES (2, 101, '2', 'false');
INSERT INTO `raport_copy1` VALUES (3, 101, '3', 'false');
INSERT INTO `raport_copy1` VALUES (4, 102, '1', 'false');
INSERT INTO `raport_copy1` VALUES (5, 102, '2', 'false');
INSERT INTO `raport_copy1` VALUES (6, 102, '3', 'false');

-- ----------------------------
-- View structure for vw_atasan
-- ----------------------------
DROP VIEW IF EXISTS `vw_atasan`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vw_atasan` AS select `lit_tab_posisi`.`lit_code_position` AS `bawahan`,(case when (substr(`lit_tab_posisi`.`lit_code_position`,18,2) > 0) then concat(left(`lit_tab_posisi`.`lit_code_position`,17),'00') when (substr(`lit_tab_posisi`.`lit_code_position`,16,2) > 0) then concat(left(`lit_tab_posisi`.`lit_code_position`,15),'0000') when (substr(`lit_tab_posisi`.`lit_code_position`,14,2) > 0) then concat(left(`lit_tab_posisi`.`lit_code_position`,13),'000000') when (substr(`lit_tab_posisi`.`lit_code_position`,12,2) > 0) then concat(left(`lit_tab_posisi`.`lit_code_position`,11),'00000000') when (substr(`lit_tab_posisi`.`lit_code_position`,10,2) > 0) then concat(left(`lit_tab_posisi`.`lit_code_position`,9),'0000000000') when (substr(`lit_tab_posisi`.`lit_code_position`,7,3) > 0) then concat(left(`lit_tab_posisi`.`lit_code_position`,6),'0000000000000') when (substr(`lit_tab_posisi`.`lit_code_position`,5,2) > 0) then concat(left(`lit_tab_posisi`.`lit_code_position`,4),'000000000000000') when (substr(`lit_tab_posisi`.`lit_code_position`,3,2) > 0) then concat(left(`lit_tab_posisi`.`lit_code_position`,2),'00000000000000000') when (substr(`lit_tab_posisi`.`lit_code_position`,1,2) > 0) then concat(left(`lit_tab_posisi`.`lit_code_position`,0),'0000000000000000000') end) AS `atasan` from `lit_tab_posisi` where ((`lit_tab_posisi`.`isaktif` <> '0') and (length(`lit_tab_posisi`.`lit_code_position`) = '19')) ;

SET FOREIGN_KEY_CHECKS = 1;
