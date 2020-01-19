-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2020 at 06:44 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hcis_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `core_identity_user`
--

CREATE TABLE `core_identity_user` (
  `instance` varchar(5) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user_id` varchar(20) COLLATE utf8_bin NOT NULL DEFAULT '',
  `status_process` varchar(1) COLLATE utf8_bin NOT NULL,
  `user_alias` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `status_active` varchar(1) COLLATE utf8_bin DEFAULT '1',
  `status_change` varchar(1) COLLATE utf8_bin DEFAULT '0',
  `status_action` varchar(1) COLLATE utf8_bin DEFAULT NULL,
  `status_locked` varchar(1) COLLATE utf8_bin DEFAULT '0',
  `logon_failed_no` int(11) DEFAULT NULL,
  `logon_success_no` int(11) DEFAULT NULL,
  `logon_first_date` datetime DEFAULT NULL,
  `logon_last_date` datetime DEFAULT NULL,
  `logon_success_last_date` datetime DEFAULT NULL,
  `password_last_change_date` datetime DEFAULT NULL,
  `name_title` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `name_prefix` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `name_prefix_other` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `name_first` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `name_mid` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `name_last` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `name_nick` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `name_full` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `name_suffix` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `name_suffix_other` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `org_company` varchar(70) COLLATE utf8_bin DEFAULT NULL,
  `org_directorate` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `org_sub_directorate` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `org_group` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `org_division` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `org_department` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `org_section` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `address_office_street` text COLLATE utf8_bin,
  `address_office_city` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `address_office_province` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `address_office_country` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `address_office_zip` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `address_home_street` text COLLATE utf8_bin,
  `address_home_city` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `address_home_province` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `address_home_country` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `address_home_zip` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `comm_office_phone_country` varchar(2) COLLATE utf8_bin DEFAULT NULL,
  `comm_office_phone_area` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `comm_office_phone_no` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `comm_office_phone_ext` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `comm_office_fax_country` varchar(2) COLLATE utf8_bin DEFAULT NULL,
  `comm_office_fax_area` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `comm_office_fax_no` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `comm_office_fax_ext` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `comm_mobile_phone_country` varchar(2) COLLATE utf8_bin DEFAULT NULL,
  `comm_mobile_phone_area` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `comm_mobile_phone_no` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `comm_home_phone_country` varchar(2) COLLATE utf8_bin DEFAULT NULL,
  `comm_home_phone_area` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `comm_home_phone_no` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `comm_email_office` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `comm_email_personal` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `comm_messenger_yahoo` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `comm_messenger_gtalk` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `comm_messenger_blackberry` varchar(8) COLLATE utf8_bin DEFAULT NULL,
  `comm_messenger_imessage` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `comm_messenger_skype` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `auth_user_type` varchar(1) COLLATE utf8_bin DEFAULT NULL,
  `lit_auth_password` varchar(100) COLLATE utf8_bin NOT NULL,
  `lit_level_user` int(1) NOT NULL,
  `lit_code_core_orm` varchar(30) COLLATE utf8_bin NOT NULL,
  `lit_authority` varchar(50) COLLATE utf8_bin NOT NULL,
  `auth_password` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `auth_password_salt` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `auth_valid_from` varchar(8) COLLATE utf8_bin DEFAULT NULL,
  `auth_valid_to` varchar(8) COLLATE utf8_bin DEFAULT NULL,
  `default_language` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `default_decimal` varchar(1) COLLATE utf8_bin DEFAULT NULL,
  `default_date` varchar(1) COLLATE utf8_bin DEFAULT NULL,
  `default_timezone` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `authorization_user_group` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `authorization_location_all` varchar(1) COLLATE utf8_bin DEFAULT NULL,
  `authorization_time_all` varchar(1) COLLATE utf8_bin DEFAULT NULL,
  `personnel_id` varchar(30) COLLATE utf8_bin DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `core_identity_user`
--

INSERT INTO `core_identity_user` (`instance`, `user_id`, `status_process`, `user_alias`, `status_active`, `status_change`, `status_action`, `status_locked`, `logon_failed_no`, `logon_success_no`, `logon_first_date`, `logon_last_date`, `logon_success_last_date`, `password_last_change_date`, `name_title`, `name_prefix`, `name_prefix_other`, `name_first`, `name_mid`, `name_last`, `name_nick`, `name_full`, `name_suffix`, `name_suffix_other`, `org_company`, `org_directorate`, `org_sub_directorate`, `org_group`, `org_division`, `org_department`, `org_section`, `address_office_street`, `address_office_city`, `address_office_province`, `address_office_country`, `address_office_zip`, `address_home_street`, `address_home_city`, `address_home_province`, `address_home_country`, `address_home_zip`, `comm_office_phone_country`, `comm_office_phone_area`, `comm_office_phone_no`, `comm_office_phone_ext`, `comm_office_fax_country`, `comm_office_fax_area`, `comm_office_fax_no`, `comm_office_fax_ext`, `comm_mobile_phone_country`, `comm_mobile_phone_area`, `comm_mobile_phone_no`, `comm_home_phone_country`, `comm_home_phone_area`, `comm_home_phone_no`, `comm_email_office`, `comm_email_personal`, `comm_messenger_yahoo`, `comm_messenger_gtalk`, `comm_messenger_blackberry`, `comm_messenger_imessage`, `comm_messenger_skype`, `auth_user_type`, `lit_auth_password`, `lit_level_user`, `lit_code_core_orm`, `lit_authority`, `auth_password`, `auth_password_salt`, `auth_valid_from`, `auth_valid_to`, `default_language`, `default_decimal`, `default_date`, `default_timezone`, `authorization_user_group`, `authorization_location_all`, `authorization_time_all`, `personnel_id`) VALUES
('1000D', 'irul', '1', NULL, '1', '0', NULL, '0', NULL, NULL, NULL, NULL, '2020-01-15 10:42:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'uvKNMPwxLli1js8L+C/M8g==', 1, '01020501', '11111111111111111111111111111111111111212111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '10011279'),
('1000D', 'admin', '1', NULL, '1', '0', NULL, '0', NULL, NULL, NULL, NULL, '2020-01-15 11:02:57', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'uvKNMPwxLli1js8L+C/M8g==', 3, '01020501', '11111111111111111111111111111111111110101111', 'ac791bb67ab2bebdb24e4fff4d411fc4', '879f3a259c483ccbd5863a71f5909479', '20130709', '99991231', '', '', '', '', '', '0', '0', '10010240');

-- --------------------------------------------------------

--
-- Table structure for table `human_pa_md_emp_personal`
--

CREATE TABLE `human_pa_md_emp_personal` (
  `instance` varchar(5) COLLATE cp850_bin NOT NULL,
  `personnel_id` varchar(30) COLLATE cp850_bin NOT NULL,
  `start_date` varchar(8) COLLATE cp850_bin NOT NULL,
  `end_date` varchar(8) COLLATE cp850_bin NOT NULL,
  `status_process` varchar(1) COLLATE cp850_bin NOT NULL,
  `name_full` varchar(100) COLLATE cp850_bin NOT NULL,
  `name_first` varchar(100) COLLATE cp850_bin NOT NULL,
  `name_mid` varchar(30) COLLATE cp850_bin NOT NULL,
  `name_last` varchar(30) COLLATE cp850_bin NOT NULL,
  `name_nick` varchar(30) COLLATE cp850_bin DEFAULT NULL,
  `title` varchar(30) COLLATE cp850_bin DEFAULT NULL,
  `prefix` varchar(30) COLLATE cp850_bin DEFAULT NULL,
  `prefix_other` varchar(50) COLLATE cp850_bin DEFAULT NULL,
  `suffix` varchar(30) COLLATE cp850_bin DEFAULT NULL,
  `suffix_other` varchar(50) COLLATE cp850_bin DEFAULT NULL,
  `gender` varchar(1) COLLATE cp850_bin DEFAULT NULL,
  `birth_date` varchar(8) COLLATE cp850_bin DEFAULT NULL,
  `birth_place` varchar(100) COLLATE cp850_bin DEFAULT NULL,
  `nationality` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `ethnic` varchar(30) COLLATE cp850_bin DEFAULT NULL,
  `ethnic_other` varchar(30) COLLATE cp850_bin DEFAULT NULL,
  `religion` varchar(15) COLLATE cp850_bin DEFAULT NULL,
  `marital_status` varchar(15) COLLATE cp850_bin DEFAULT NULL,
  `status_since` varchar(8) COLLATE cp850_bin DEFAULT NULL,
  `no_of_children` int(11) DEFAULT NULL,
  `lit_foto` varchar(150) COLLATE cp850_bin DEFAULT NULL,
  `lit_nik` varchar(30) COLLATE cp850_bin DEFAULT NULL,
  `lit_employee_status` varchar(30) COLLATE cp850_bin DEFAULT NULL,
  `lit_coc` varchar(15) COLLATE cp850_bin DEFAULT NULL,
  `lit_tahun_coc_terbit` varchar(4) COLLATE cp850_bin DEFAULT NULL,
  `lit_sk_penempatan` varchar(50) COLLATE cp850_bin DEFAULT NULL,
  `lit_tmt_penempatan` date DEFAULT NULL,
  `gol_tht` varchar(10) COLLATE cp850_bin DEFAULT NULL,
  `sk_tht` varchar(75) COLLATE cp850_bin DEFAULT NULL,
  `gol_dapen` varchar(10) COLLATE cp850_bin DEFAULT NULL,
  `kd_dapen` varchar(75) COLLATE cp850_bin DEFAULT NULL,
  `created_by` varchar(20) COLLATE cp850_bin NOT NULL,
  `created_at` varchar(14) COLLATE cp850_bin NOT NULL,
  `created_document_id` bigint(20) NOT NULL,
  `changed_by` varchar(20) COLLATE cp850_bin NOT NULL,
  `changed_at` varchar(14) COLLATE cp850_bin NOT NULL,
  `changed_document_id` bigint(20) DEFAULT NULL,
  `locked_by` varchar(20) COLLATE cp850_bin DEFAULT NULL,
  `locked_at` varchar(14) COLLATE cp850_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp850 COLLATE=cp850_bin;

--
-- Dumping data for table `human_pa_md_emp_personal`
--

INSERT INTO `human_pa_md_emp_personal` (`instance`, `personnel_id`, `start_date`, `end_date`, `status_process`, `name_full`, `name_first`, `name_mid`, `name_last`, `name_nick`, `title`, `prefix`, `prefix_other`, `suffix`, `suffix_other`, `gender`, `birth_date`, `birth_place`, `nationality`, `ethnic`, `ethnic_other`, `religion`, `marital_status`, `status_since`, `no_of_children`, `lit_foto`, `lit_nik`, `lit_employee_status`, `lit_coc`, `lit_tahun_coc_terbit`, `lit_sk_penempatan`, `lit_tmt_penempatan`, `gol_tht`, `sk_tht`, `gol_dapen`, `kd_dapen`, `created_by`, `created_at`, `created_document_id`, `changed_by`, `changed_at`, `changed_document_id`, `locked_by`, `locked_at`) VALUES
('1000D', '10010240', '20130712', '99991231', '1', 'Pegawai 2', '', '', '', '', NULL, '00', '', '12', '', '1', '19910205', 'BANDUNG', '', 'SND', '', '1', 'S', '', 0, 'assets/images/foto/10010240.JPG', '216012', 'N', '', '', '', '0000-00-00', '', '', '', '', 'ARI KURNIAWAN', '20130712104031', 0, 'irul', '20170801092232', 0, '', ''),
('1000D', '10011279', '20161107', '99991231', '1', 'Pegawai 1', '', '', '', '', NULL, '', '', '02', '', '1', '19900729', 'PURWOKERTO', 'WNI', 'JWA', '', '1', 'S', '', 0, NULL, '216018', 'A', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', 0, 'irul', '20170801092504', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lit_el_dat_kelas_modul`
--

CREATE TABLE `lit_el_dat_kelas_modul` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_kelas_modul` bigint(20) UNSIGNED NOT NULL,
  `nm_modul` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `materi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personnel_id` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT '0' COMMENT '1=selesai',
  `kelas_id` int(11) NOT NULL,
  `tanggal_daftar` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lit_el_dat_kelas_modul`
--

INSERT INTO `lit_el_dat_kelas_modul` (`id`, `id_kelas_modul`, `nm_modul`, `materi`, `personnel_id`, `status`, `kelas_id`, `tanggal_daftar`, `created_at`, `updated_at`) VALUES
(1, 1, 'HR Management ', '<p>ini Videonya</p><p>&lt;iframe src=\"http://localhost/diklatapps/upload/asdp_safety.mp4\" class=\"note-video-clip\" width=\"100%\" height=\"360\" frameborder=\"0\"&gt;&lt;/iframe&gt;<br></p>', '10011279', '1', 1, '0000-00-00', NULL, NULL),
(2, 2, 'HR Planning and Recruitment', '<h3><a href=\"https://www.detik.com/tag/Gerhana-Bulan\"><span style=\"font-family: &quot;Tahoma&quot;;\">Gerhana Bulan</span></a><span style=\"font-family: &quot;Tahoma&quot;;\"> </span><a href=\"https://www.detik.com/tag/Gerhana-Bulan-penumbra\"><span style=\"font-family: &quot;Tahoma&quot;;\">Penumbra</span></a><span style=\"font-family: &quot;Tahoma&quot;;\">  (GBP) akan terjadi di Indonesia pada tanggal 11 Januari 2020. Puncak  gerhana terjadi pada pukul 02.10 WIB. Fenomena ini akan menyebabkan air  laut pasang lebih tinggi dibandingkan rata-rata.</span><a href=\"http://www.detik.com\" target=\"_blank\"> detik.com</a></h3><h2><video controls=\"\" src=\"http://localhost/diklatapps/upload/asdp_safety.mp4\" class=\"note-video-clip\" width=\"100%\" height=\"360\"></video><span style=\"font-family: &quot;Comic Sans MS&quot;;\">﻿</span><br></h2>', '10011279', '1', 1, '0000-00-00', NULL, NULL),
(3, 3, 'Employee Selection', '<p><img style=\"width: 100%;\" src=\"http://localhost/blog-post/assets/images/ddb2.png\"></p>', '10011279', '1', 1, '0000-00-00', NULL, NULL),
(4, 4, 'Training and Development', '<p><img style=\"width: 100%x;\" src=\"http://localhost/blog-post/assets/images/ddb2.png\"></p><p><img style=\"width: 708.4px;\" src=\"http://localhost/blog-post/assets/images/adi_member2.png\"><br></p><p><br></p>', '10011279', '1', 1, '0000-00-00', NULL, NULL),
(5, 5, 'Performance Management', '', '10011279', '0', 1, '0000-00-00', NULL, NULL),
(6, 6, 'Career Management', '', '10011279', '0', 1, '0000-00-00', NULL, NULL),
(8, 1, 'HR Management ', '', '10011279', '0', 2, '0000-00-00', NULL, NULL),
(9, 2, 'HR Planning and Recruitment', '', '10011279', '0', 2, '0000-00-00', NULL, NULL),
(10, 3, 'Employee Selection', '', '10011279', '0', 2, '0000-00-00', NULL, NULL),
(11, 4, 'Training and Development', '', '10011279', '0', 2, '0000-00-00', NULL, NULL),
(12, 5, 'Performance Management', '', '10011279', '0', 2, '0000-00-00', NULL, NULL),
(13, 6, 'Career Management', '', '10011279', '0', 2, '0000-00-00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lit_el_kelas`
--

CREATE TABLE `lit_el_kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nm_kelas` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_dibuka` date NOT NULL,
  `isactive` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lit_el_kelas`
--

INSERT INTO `lit_el_kelas` (`id`, `nm_kelas`, `tgl_dibuka`, `isactive`, `created_at`, `updated_at`) VALUES
(1, 'HRM Essential', '2020-01-03', 1, '2020-01-02 17:00:00', '2020-01-02 17:00:00'),
(2, 'HRM Strategy', '2020-01-02', 1, '2020-01-01 17:00:00', '2020-01-01 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `lit_el_kelas_modul`
--

CREATE TABLE `lit_el_kelas_modul` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nm_modul` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `materi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lit_el_kelas_modul`
--

INSERT INTO `lit_el_kelas_modul` (`id`, `nm_modul`, `materi`, `kelas_id`, `created_at`, `updated_at`) VALUES
(1, 'HR Management ', '', 1, '2020-01-05 17:00:00', '2020-01-05 17:00:00'),
(2, 'HR Planning and Recruitment', '', 1, '2020-01-05 17:00:00', '2020-01-05 17:00:00'),
(3, 'Employee Selection', '', 1, '2020-01-05 17:00:00', '2020-01-05 17:00:00'),
(4, 'Training and Development', '', 1, '2020-01-05 17:00:00', '2020-01-05 17:00:00'),
(5, 'Performance Management', '', 1, '2020-01-05 17:00:00', '2020-01-05 17:00:00'),
(6, 'Career Management', '', 1, '2020-01-05 17:00:00', '2020-01-05 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `lit_el_tab_video`
--

CREATE TABLE `lit_el_tab_video` (
  `id` int(5) NOT NULL,
  `nm_video` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `pathfile` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lit_logging`
--

CREATE TABLE `lit_logging` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `wtd` varchar(30) NOT NULL,
  `sqldata` text NOT NULL,
  `waktu` datetime NOT NULL,
  `isread` set('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lit_logging`
--

INSERT INTO `lit_logging` (`id`, `name`, `ip_address`, `wtd`, `sqldata`, `waktu`, `isread`) VALUES
(1, 'irul', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'irul\' AND lit_auth_password = \'JN2/qIqovDnHVSpx2ubg6A==\' and status_locked = 0 ', '2020-01-14 11:44:20', '0'),
(2, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'JN2/qIqovDnHVSpx2ubg6A==\' and status_locked = 0 ', '2020-01-14 14:25:18', '0'),
(3, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'JN2/qIqovDnHVSpx2ubg6A==\' and status_locked = 0 ', '2020-01-14 15:56:39', '0'),
(4, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'JN2/qIqovDnHVSpx2ubg6A==\' and status_locked = 0 ', '2020-01-14 15:58:16', '0'),
(5, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'JN2/qIqovDnHVSpx2ubg6A==\' and status_locked = 0 ', '2020-01-14 16:03:43', '0'),
(6, 'irul', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'irul\' AND lit_auth_password = \'JN2/qIqovDnHVSpx2ubg6A==\' and status_locked = 0 ', '2020-01-14 16:11:15', '0'),
(7, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'JN2/qIqovDnHVSpx2ubg6A==\' and status_locked = 0 ', '2020-01-14 16:11:37', '0'),
(8, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'JN2/qIqovDnHVSpx2ubg6A==\' and status_locked = 0 ', '2020-01-14 16:12:53', '0'),
(9, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'JN2/qIqovDnHVSpx2ubg6A==\' and status_locked = 0 ', '2020-01-14 16:14:51', '0'),
(10, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'JN2/qIqovDnHVSpx2ubg6A==\' and status_locked = 0 ', '2020-01-14 16:15:35', '0'),
(11, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'JN2/qIqovDnHVSpx2ubg6A==\' and status_locked = 0 ', '2020-01-14 16:16:16', '0'),
(12, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'JN2/qIqovDnHVSpx2ubg6A==\' and status_locked = 0 ', '2020-01-14 16:18:19', '0'),
(13, 'irul', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'irul\' AND lit_auth_password = \'JN2/qIqovDnHVSpx2ubg6A==\' and status_locked = 0 ', '2020-01-14 16:18:25', '0'),
(14, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'JN2/qIqovDnHVSpx2ubg6A==\' and status_locked = 0 ', '2020-01-14 16:19:06', '0'),
(15, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'JN2/qIqovDnHVSpx2ubg6A==\' and status_locked = 0 ', '2020-01-14 16:21:08', '0'),
(16, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'JN2/qIqovDnHVSpx2ubg6A==\' and status_locked = 0 ', '2020-01-14 16:22:50', '0'),
(17, 'irul', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'irul\' AND lit_auth_password = \'JN2/qIqovDnHVSpx2ubg6A==\' and status_locked = 0 ', '2020-01-14 16:24:28', '0'),
(18, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'JN2/qIqovDnHVSpx2ubg6A==\' and status_locked = 0 ', '2020-01-14 16:27:11', '0'),
(19, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'JN2/qIqovDnHVSpx2ubg6A==\' and status_locked = 0 ', '2020-01-14 16:28:12', '0'),
(20, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'JN2/qIqovDnHVSpx2ubg6A==\' and status_locked = 0 ', '2020-01-14 16:29:01', '0'),
(21, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'JN2/qIqovDnHVSpx2ubg6A==\' and status_locked = 0 ', '2020-01-14 16:32:30', '0'),
(22, 'irul', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'irul\' AND lit_auth_password = \'JN2/qIqovDnHVSpx2ubg6A==\' and status_locked = 0 ', '2020-01-14 16:33:10', '0'),
(23, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'JN2/qIqovDnHVSpx2ubg6A==\' and status_locked = 0 ', '2020-01-14 16:35:04', '0'),
(24, 'irul', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'irul\' AND lit_auth_password = \'JN2/qIqovDnHVSpx2ubg6A==\' and status_locked = 0 ', '2020-01-14 16:49:50', '0'),
(25, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'JN2/qIqovDnHVSpx2ubg6A==\' and status_locked = 0 ', '2020-01-14 16:50:20', '0'),
(26, 'irul', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'irul\' AND lit_auth_password = \'JN2/qIqovDnHVSpx2ubg6A==\' and status_locked = 0 ', '2020-01-14 16:55:59', '0'),
(27, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'JN2/qIqovDnHVSpx2ubg6A==\' and status_locked = 0 ', '2020-01-14 16:56:47', '0'),
(28, 'irul', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'irul\' AND lit_auth_password = \'JN2/qIqovDnHVSpx2ubg6A==\' and status_locked = 0 ', '2020-01-15 10:27:46', '0'),
(29, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'JN2/qIqovDnHVSpx2ubg6A==\' and status_locked = 0 ', '2020-01-15 10:27:55', '0'),
(30, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-01-15 10:39:21', '0'),
(31, 'irul', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'irul\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-01-15 10:39:31', '0'),
(32, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-01-15 10:39:38', '0'),
(33, 'irul', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'irul\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-01-15 10:42:32', '0'),
(34, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-01-15 10:42:41', '0'),
(35, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-01-15 10:47:45', '0'),
(36, 'admin', '::1', 'login::login', 'select user_id,lit_auth_password,lit_level_user from core_identity_user where user_id = \'admin\' AND lit_auth_password = \'uvKNMPwxLli1js8L+C/M8g==\' and status_locked = 0 ', '2020-01-15 11:02:57', '0');

-- --------------------------------------------------------

--
-- Table structure for table `lit_pms_dat_perilaku`
--

CREATE TABLE `lit_pms_dat_perilaku` (
  `id` int(5) NOT NULL,
  `personnel_id` varchar(30) NOT NULL,
  `lit_code_position` varchar(30) NOT NULL,
  `tgl_penilaian` date NOT NULL,
  `periode_penilaian` varchar(10) NOT NULL,
  `tingkat_jabatan` varchar(15) NOT NULL,
  `id_kompetensi` int(5) DEFAULT NULL,
  `nilai_atasan` int(5) NOT NULL,
  `nilai_ybs` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lit_pms_dat_perilaku`
--

INSERT INTO `lit_pms_dat_perilaku` (`id`, `personnel_id`, `lit_code_position`, `tgl_penilaian`, `periode_penilaian`, `tingkat_jabatan`, `id_kompetensi`, `nilai_atasan`, `nilai_ybs`) VALUES
(1, '10010240', '0502000000300000000', '2020-01-15', '2020', 'D1', 1, 4, 5),
(2, '10010240', '0502000000300000000', '2020-01-15', '2020', 'D1', 2, 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `lit_pms_tab_perilaku`
--

CREATE TABLE `lit_pms_tab_perilaku` (
  `id` int(5) NOT NULL,
  `nm_kompetensi` varchar(100) NOT NULL,
  `aspek_kompetensi` varchar(50) NOT NULL,
  `definisi_kompetensi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lit_pms_tab_perilaku`
--

INSERT INTO `lit_pms_tab_perilaku` (`id`, `nm_kompetensi`, `aspek_kompetensi`, `definisi_kompetensi`) VALUES
(1, 'Berorientasi pada Hasil (Driving for Result)', 'Intrapersonal Skils', 'Fokus pada Hasil adalah menetapkan standar yang tinggi untuk pencapaian diri sendiri dan kelompok menggunakan metode pengukuran untuk memantau kemajuan dari pencapaian tujuan; secara gigih bekerja untuk mencapai atau melampaui sasaran sambil tetap menikmati proses pencapaian tujuannya serta proses pendidikan berkesinambungan.'),
(2, 'Pengembangan Hubungan Strategis (Developing Strategic Relationship)', 'Intrapersonal Skils', 'Pengembangan Hubungan Strategis adalah menggunakan gaya interpersonal dan metode komunikasi yang sesuai untuk meyakinkan dan membangun hubungan yang efektif dengan mitra bisnis (misalnya rekan kerja, mitra fungsional, pemasok eksternal, dan mitra aliansi).');

-- --------------------------------------------------------

--
-- Table structure for table `lit_tab_posisi`
--

CREATE TABLE `lit_tab_posisi` (
  `id` int(11) NOT NULL,
  `lit_code_position` varchar(30) CHARACTER SET cp850 COLLATE cp850_bin NOT NULL,
  `kel_unitkerja` varchar(50) DEFAULT NULL,
  `nama_unitkerja` varchar(100) DEFAULT NULL,
  `name_position` varchar(100) DEFAULT NULL,
  `id_jabatan` int(11) DEFAULT NULL,
  `nm_jabatan` varchar(30) NOT NULL,
  `personnel_id` varchar(30) CHARACTER SET cp850 COLLATE cp850_bin NOT NULL,
  `code_segmentasi_usaha` varchar(5) DEFAULT NULL,
  `level_jabatan` varchar(15) NOT NULL,
  `status_jabatan` varchar(15) NOT NULL,
  `bidang` varchar(100) NOT NULL,
  `subidang` varchar(100) NOT NULL,
  `bagian` varchar(100) NOT NULL,
  `subagian` varchar(100) NOT NULL,
  `tipe` set('D','L') NOT NULL DEFAULT '',
  `kel_unit` varchar(10) NOT NULL,
  `isaktif` set('0','1') NOT NULL DEFAULT '',
  `nik` varchar(15) CHARACTER SET cp850 COLLATE cp850_bin NOT NULL,
  `lit_foto` text NOT NULL,
  `start_date` varchar(8) NOT NULL,
  `end_date` varchar(8) NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `changed_by` varchar(20) NOT NULL,
  `changed_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lit_tab_posisi`
--

INSERT INTO `lit_tab_posisi` (`id`, `lit_code_position`, `kel_unitkerja`, `nama_unitkerja`, `name_position`, `id_jabatan`, `nm_jabatan`, `personnel_id`, `code_segmentasi_usaha`, `level_jabatan`, `status_jabatan`, `bidang`, `subidang`, `bagian`, `subagian`, `tipe`, `kel_unit`, `isaktif`, `nik`, `lit_foto`, `start_date`, `end_date`, `created_by`, `created_at`, `changed_by`, `changed_at`) VALUES
(535, '0502000000300000000', 'Direktorat', 'Divisi SDM', 'Manager Pelayanan SDM', 12, '', '10010240', '', '', 'Struktural', '', '', '', '', '', '2', '1', '', '', '20170428', '99991231', '', '0000-00-00 00:00:00', 'admin', '2019-02-04 04:23:35'),
(7883, '0502000000300000005', 'Diretorat', 'Divisi Pengelolaan SDM', 'Staf Pelayanan SDM', 36, '', '10011279', '', 'Staf', 'Staf', '', '', '', '', '', '2', '', '', '', '20190522', '99991231', 'admin', '2019-06-20 03:21:48', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `lit_tab_setting_pejabat`
--

CREATE TABLE `lit_tab_setting_pejabat` (
  `id` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `lit_code_position` varchar(30) CHARACTER SET cp850 COLLATE cp850_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lit_tab_setting_pejabat`
--

INSERT INTO `lit_tab_setting_pejabat` (`id`, `keterangan`, `lit_code_position`) VALUES
(1, 'Setara Direktur SDM dan Layanan Korporasi', '0500000000000000000'),
(2, 'Setara Vice President Pengelolaan SDM', '0502000000000000000'),
(3, 'Setara Manager Pelayanan SDM', '0502000000300000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `core_identity_user`
--
ALTER TABLE `core_identity_user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `personnel_id` (`personnel_id`);

--
-- Indexes for table `human_pa_md_emp_personal`
--
ALTER TABLE `human_pa_md_emp_personal`
  ADD PRIMARY KEY (`instance`,`personnel_id`,`start_date`,`end_date`);

--
-- Indexes for table `lit_el_dat_kelas_modul`
--
ALTER TABLE `lit_el_dat_kelas_modul`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lit_el_kelas`
--
ALTER TABLE `lit_el_kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lit_el_kelas_modul`
--
ALTER TABLE `lit_el_kelas_modul`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lit_el_tab_video`
--
ALTER TABLE `lit_el_tab_video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lit_logging`
--
ALTER TABLE `lit_logging`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lit_pms_dat_perilaku`
--
ALTER TABLE `lit_pms_dat_perilaku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lit_pms_tab_perilaku`
--
ALTER TABLE `lit_pms_tab_perilaku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lit_tab_posisi`
--
ALTER TABLE `lit_tab_posisi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lit_el_dat_kelas_modul`
--
ALTER TABLE `lit_el_dat_kelas_modul`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `lit_el_kelas`
--
ALTER TABLE `lit_el_kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lit_el_kelas_modul`
--
ALTER TABLE `lit_el_kelas_modul`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lit_el_tab_video`
--
ALTER TABLE `lit_el_tab_video`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lit_logging`
--
ALTER TABLE `lit_logging`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `lit_pms_dat_perilaku`
--
ALTER TABLE `lit_pms_dat_perilaku`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lit_pms_tab_perilaku`
--
ALTER TABLE `lit_pms_tab_perilaku`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
