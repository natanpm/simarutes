-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2019 at 06:40 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simarusbs2.0`
--

-- --------------------------------------------------------

--
-- Table structure for table `beritasimaru`
--

CREATE TABLE `beritasimaru` (
  `id` int(10) UNSIGNED NOT NULL,
  `statusKondisi` varchar(255) NOT NULL,
  `pesan` text NOT NULL,
  `statusBerita` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beritasimaru`
--

INSERT INTO `beritasimaru` (`id`, `statusKondisi`, `pesan`, `statusBerita`, `created_at`, `updated_at`) VALUES
(1, 'danger', 'testing tes', 1, '2019-01-30 06:36:59', '2019-01-31 05:09:07'),
(2, 'warning', 'testeing 2 tes 2', 0, '2019-01-31 05:08:29', '2019-01-31 05:09:07');

-- --------------------------------------------------------

--
-- Table structure for table `daftarbarang`
--

CREATE TABLE `daftarbarang` (
  `id` int(10) UNSIGNED NOT NULL,
  `idSuratKeluar` int(10) UNSIGNED NOT NULL,
  `namaBarang` varchar(100) NOT NULL,
  `merek` varchar(50) NOT NULL,
  `serialNumber` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftarbarang`
--

INSERT INTO `daftarbarang` (`id`, `idSuratKeluar`, `namaBarang`, `merek`, `serialNumber`, `created_at`, `updated_at`) VALUES
(1, 1, 'modul', 'huawei', '123454', '2019-04-01 04:26:26', '2019-04-01 04:26:26');

-- --------------------------------------------------------

--
-- Table structure for table `forwarding`
--

CREATE TABLE `forwarding` (
  `id` int(10) UNSIGNED NOT NULL,
  `idSuratMasuk` int(10) UNSIGNED NOT NULL,
  `idPicTelkom` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forwarding`
--

INSERT INTO `forwarding` (`id`, `idSuratMasuk`, `idPicTelkom`, `created_at`, `updated_at`) VALUES
(1, 55, 1, '2019-03-15 01:40:47', '2019-03-15 01:40:47'),
(2, 56, 1, '2019-03-19 08:29:18', '2019-03-19 08:29:18');

-- --------------------------------------------------------

--
-- Table structure for table `lampiran`
--

CREATE TABLE `lampiran` (
  `id` int(10) UNSIGNED NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pathUri` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namaFile` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `idSuratMasuk` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lampiran`
--

INSERT INTO `lampiran` (`id`, `path`, `pathUri`, `namaFile`, `idSuratMasuk`, `created_at`, `updated_at`) VALUES
(2, 'lampiran/ozMNH632oEP78RoFfS8eaOMAduRST5aNBjw47KUJ.pdf', 'ozMNH632oEP78RoFfS8eaOMAduRST5aNBjw47KUJ.pdf', '20190107 NDE C.TEL. 49 SURAT IJIN MASUK LOKASI SITE STO JAGIR, STO RUNGKUT, STO INJOKO & STO DINOYO_SITE AUDIT OPTIMASI NPM H3I COLO TELKOM.PDF', 5, '2019-01-07 08:05:13', '2019-01-07 08:05:13'),
(3, 'lampiran/iUu7KagsSyISJc9h7fjPXQj5IVHaovCUOl7GzKlK.pdf', 'iUu7KagsSyISJc9h7fjPXQj5IVHaovCUOl7GzKlK.pdf', '20190107 CRA.18314 PERIHAL TROUBLESHOOTING 1X100G ET-1_0_5 ON R5.MLG.ASBR-TSEL.1', 6, '2019-01-07 08:23:41', '2019-01-07 08:23:41'),
(4, 'lampiran/IeEjN2oWv3nx2mher3ZbLRy4Eh1gElUsoNtHnjys.pdf', 'IeEjN2oWv3nx2mher3ZbLRy4Eh1gElUsoNtHnjys.pdf', '20190108 NDE C.TEL. 2 PERMOHONAN IJIN MASUK STO RUNGKUT UTK MITRA ELKOKAR.PDF', 7, '2019-01-08 07:37:16', '2019-01-08 07:37:16'),
(5, 'lampiran/uMQAVLO0JLIAgX5mseMmHNrNPHoRa8ggyyy6Cgn8.pdf', 'uMQAVLO0JLIAgX5mseMmHNrNPHoRa8ggyyy6Cgn8.pdf', '20190107 NDE C.TEL. 14 PERMOHONAN IJIN MASUK UNTUK SURVEY PROYEK PENGADAAN DAN PEMASANGAN PERANGKAT DWDM PLATFORM ZTE PROYEK NARU 2018.PDF', 8, '2019-01-08 07:47:01', '2019-01-08 07:47:01'),
(6, 'lampiran/ODMja56D3bmwwSpSf6KyrzVFQVjXYNkDSdzht8Nw.pdf', 'ODMja56D3bmwwSpSf6KyrzVFQVjXYNkDSdzht8Nw.pdf', '20190108 NDE C.TEL. 2 IJIN MASUK LAYANAN HOSTING COLOCATION SERVER PT. BINTRACO SHARMA TBK.PDF', 9, '2019-01-08 07:55:58', '2019-01-08 07:55:58'),
(7, 'lampiran/PdymunROFXu7xlif28HIIjhQ8Cg9UMNOTpv3k5T3.pdf', 'PdymunROFXu7xlif28HIIjhQ8Cg9UMNOTpv3k5T3.pdf', '20190108 NDE C.TEL. 65 SURAT IJIN MASUK LOKASI SITE STO RUNGKUT_ADD RRU + DISMANTLE FEEDERS + ADD ANTENNA XL COLO TELKOM.PDF', 10, '2019-01-09 00:57:58', '2019-01-09 00:57:58'),
(8, 'lampiran/x59dr5CVA09OQL1Tn7KZHtIoTUb0uaS1xbCeNTAt.pdf', 'x59dr5CVA09OQL1Tn7KZHtIoTUb0uaS1xbCeNTAt.pdf', '20190109 NDE C.TEL. 7 PERMOHONAN IJIN MASUK LOKASI STO DAN BEKERJA INSTALASI BUNDLE CORD FTM.', 11, '2019-01-09 08:32:19', '2019-01-09 08:32:19'),
(9, 'lampiran/OF2Fed8SDZDtvaa7gXv77wsys78hTaBIEO2oJ52g.pdf', 'OF2Fed8SDZDtvaa7gXv77wsys78hTaBIEO2oJ52g.pdf', '20190109 NDE C.TEL. 1 SIMARU LOKASI STO DALAM RANGKA MAINTENANCE & TROUBLE SHOOTING PERANGKAT TELKOMSEL.PDF', 12, '2019-01-09 08:49:59', '2019-01-09 08:49:59'),
(10, 'lampiran/v0PMF0UiLI40RDgsZeLWJwzMJT2buYpZyKj4Uq0d.pdf', 'v0PMF0UiLI40RDgsZeLWJwzMJT2buYpZyKj4Uq0d.pdf', '20190109 PT NEC UNTUK PENGAMBILAN MODUL ASBR DI STO RUNGKUT.PDF', 13, '2019-01-09 09:05:44', '2019-01-09 09:05:44'),
(11, 'lampiran/RlzQW7wwpDlW9PbU7qXnQ46TgJimRl8tGyMTYQPW.pdf', 'RlzQW7wwpDlW9PbU7qXnQ46TgJimRl8tGyMTYQPW.pdf', '20190108 NDE C.TEL. 2 PERMOHONAN SIMARU TAMBAHAN UNTUK TEAM DISHUB PROV JATIM.PDF', 14, '2019-01-10 01:16:26', '2019-01-10 01:16:26'),
(12, 'lampiran/ulkbQjqSypBnMf1miU96aoUaigSJDOBnCzdBrB20.pdf', 'ulkbQjqSypBnMf1miU96aoUaigSJDOBnCzdBrB20.pdf', '20190109 NDE C.TEL. 4 PERMOHONAN PERPANJANGAN WAKTU IZIN MASUK RUANGAN STO MANYAR UNTUK AKTIVASI FEEDER PROJECT FTTH GALAXY MALL 3.PDF', 15, '2019-01-10 03:25:08', '2019-01-10 03:25:08'),
(13, 'lampiran/E2wwjAaqwijQOUfJuJk9PkJSXAQbAxAEOZVEReA5.pdf', 'E2wwjAaqwijQOUfJuJk9PkJSXAQbAxAEOZVEReA5.pdf', '20190110 NDE C.TEL. 1 PERMOHONAN IJIN MASUK RUANGAN UNTUK TROUBLESHOOTING GANGGUAN DWDM M920 NODE STO RUNGKUT UNMONITOR.PDF', 16, '2019-01-10 04:07:57', '2019-01-10 04:07:57'),
(14, 'lampiran/KRKD8ZndWx7gkOoQP4PKvZ6itgO6ZM13h0i5EqEK.pdf', 'KRKD8ZndWx7gkOoQP4PKvZ6itgO6ZM13h0i5EqEK.pdf', '20190111 NDE C.TEL. 9 PERMOHONAN IZIN MASUK RUANGAN STO INJOKO UNTUK KEPERLUAN DISMANTLING SERVER AXIROS.PDF', 17, '2019-01-11 07:16:50', '2019-01-11 07:16:50'),
(15, 'lampiran/MqwkP06VuO5bTtZgAKbBwILp7ALVaPN14ikPNUS3.pdf', 'MqwkP06VuO5bTtZgAKbBwILp7ALVaPN14ikPNUS3.pdf', '20180111 NDE C.TEL. 8 PERMOHONAN IJIN MASUK LOKASI NEUCENTRIX PELAKSANAAN MAINTENANCE PERANGKAT PERIODE 11 JANUARI 2019 - 31 JANUARI 2019.PDF', 18, '2019-01-14 01:19:48', '2019-01-14 01:19:48'),
(16, 'lampiran/jP5FGjeDHCxnGhQ4XX0VlWPRycvKoIEpQ4j5nHVc.pdf', 'jP5FGjeDHCxnGhQ4XX0VlWPRycvKoIEpQ4j5nHVc.pdf', '20190112 NDE C.TEL. 5 SURAT IJIN MASUK STO MANYAR PT. INTI.PDF', 19, '2019-01-14 01:37:14', '2019-01-14 01:37:14'),
(18, 'lampiran/cL8OLcdXRIrksMdL4lUFTh4iLtCbBDaHepymOJJ1.pdf', 'cL8OLcdXRIrksMdL4lUFTh4iLtCbBDaHepymOJJ1.pdf', '20190114 NDE C.TEL. 91 SURAT IJIN MASUK LOKASI SITE STO RUNGKUT_SITE AUDIT, PHYSICAL TUNING XL COLO TELKOM.PDF', 21, '2019-01-14 04:43:28', '2019-01-14 04:43:28'),
(19, 'lampiran/Wc92AX9fazAsq4qZIrWYUDj04dkE26BVBLQb9Wbp.pdf', 'Wc92AX9fazAsq4qZIrWYUDj04dkE26BVBLQb9Wbp.pdf', '20190114 NDE C.TEL. 32 PERMOHONAN IJIN MASUK DAN KERJA UNTUK KEGIATAN COMM TEST UPGRADE DAN SEGMENT TEST PEKERJAAN SKKL IGG.PDF', 22, '2019-01-14 05:32:04', '2019-01-14 05:32:04'),
(20, 'lampiran/AKpWAo5c7Nk8dBhAMwzzNJdOhNGml3XCXsJ0q0cu.pdf', 'AKpWAo5c7Nk8dBhAMwzzNJdOhNGml3XCXsJ0q0cu.pdf', '20190114 NDE C.TEL. 1 PERMOHONAN IJIN MASUK RUANGAN DAN KERJA (SIMARU) STO RUNGKUT UNTUK PT. INTI JANUARI-FEBRUARI 2019.PDF', 23, '2019-01-14 08:05:40', '2019-01-14 08:05:40'),
(22, 'lampiran/i0JOgss7hiix9SvU40TK5IrfDdo4IPxx9V3cB0Xv.pdf', 'i0JOgss7hiix9SvU40TK5IrfDdo4IPxx9V3cB0Xv.pdf', '20190114 KOPKAR KARYA MAS PERMOHONAN IZIN MASUK LOKASI STO RUNGKUT NETWORK AREA SURABAYA SELATAN.PDF', 20, '2019-01-15 02:23:19', '2019-01-15 02:23:19'),
(23, 'lampiran/jKqqEG8mRNShesoCNZxJJeOImOBlBk9J9z3T1W70.pdf', 'jKqqEG8mRNShesoCNZxJJeOImOBlBk9J9z3T1W70.pdf', '20190115 NDE C.TEL. 6 SURAT IJIN MASUK STO TROPODO PT. ELKOKAR TIMUR.PDF', 25, '2019-01-15 04:38:58', '2019-01-15 04:38:58'),
(24, 'lampiran/uUfUxgK2EQtInY9jiUkxow5JuRKr6qtpJq9GT40s.pdf', 'uUfUxgK2EQtInY9jiUkxow5JuRKr6qtpJq9GT40s.pdf', '20190114 KOPKAR KARYA MAS UNTUK PEKERJAAN RELOKASI BATTERE DARI DARMO KE GUBENG KAP 2500 AH.PDF', 24, '2019-01-15 07:34:08', '2019-01-15 07:34:08'),
(25, 'lampiran/PdQlgWkaypVGXAtSMX2bawNPbypfk7FfC274WwXw.pdf', 'PdQlgWkaypVGXAtSMX2bawNPbypfk7FfC274WwXw.pdf', '20190115 NDE C.TEL. 102 SURAT IJIN MASUK LOKASI SITE STO INJOKO_INSTALASI PENARIKAN KABEL FO, OTB & ODP DI RACK XL COLO TELKOM.PDF', 26, '2019-01-15 08:18:50', '2019-01-15 08:18:50'),
(27, 'lampiran/hdVPgroOpqLHu27cqmdeFFk0xFKTQPTpjIKrvzjE.pdf', 'hdVPgroOpqLHu27cqmdeFFk0xFKTQPTpjIKrvzjE.pdf', '20190115 NDE C.TEL. 1 PERMOHONAN IJIN MASUK TROUBLE SHOOTING ROUTING-ENGINE – RE0 PADA NODE R5.MLG.ASBR-TSEL.1 DI STO RUNGKUT.PDF', 27, '2019-01-16 01:09:53', '2019-01-16 01:09:53'),
(28, 'lampiran/ZZMkuigUj59YWyKaAb8ka7ZYCV6ZHocnt0h8NDSs.pdf', 'ZZMkuigUj59YWyKaAb8ka7ZYCV6ZHocnt0h8NDSs.pdf', '20190115 NDE C.TEL. 5 IJIN MASUK STO KEBALEN DAN STO RUNGKUT DALAM RANGKA PENGGANTIAN POWER SUPPLY SERVER MIDDLEWARE APTILO.PDF', 28, '2019-01-16 01:43:02', '2019-01-16 01:43:02'),
(29, 'lampiran/CjlgNZU1zfPMHZHAIkptS49iDIc4m3QvBJfJJ8gw.pdf', 'CjlgNZU1zfPMHZHAIkptS49iDIc4m3QvBJfJJ8gw.pdf', '20190115 NDE C.TEL. 47 PERMOHONAN IZIN MASUK & BEKERJA SERTA PENUNJUKAN WASPANG UNTUK SP#1 PENGADAAN DAN PEMASANGAN EKSPAN PE PLATFORM JUNIPER PERIODE JANUARI-MARET 2019.PDF', 29, '2019-01-16 01:58:22', '2019-01-16 01:58:22'),
(30, 'lampiran/vz6YPCfPXiCezKte95gcZ9rA3NOB5M0z4v6U9Jqy.pdf', 'vz6YPCfPXiCezKte95gcZ9rA3NOB5M0z4v6U9Jqy.pdf', '20190116 NDE C.TEL. 103 SURAT IJIN MASUK LOKASI SITE STO RUNGKUT & STO INJOKO_MAINTENANCE_TROUBLESHOOT ISAT COLO TELKOM.PDF', 30, '2019-01-16 02:10:48', '2019-01-16 02:10:48'),
(31, 'lampiran/SK3RMgk6vLrJRoi2jcibZEqLLMFoljtepdg2uJuF.pdf', 'SK3RMgk6vLrJRoi2jcibZEqLLMFoljtepdg2uJuF.pdf', '20190116 NDE C.TEL. 8 PERMOHONAN TAMBAHAN PERSONIL UNTUK IZIN MASUK RUANGAN STO MANYAR UNTUK AKTIVASI FEEDER PROJECT FTTH GALAXY MALL 3.PDF', 31, '2019-01-16 03:06:00', '2019-01-16 03:06:00'),
(32, 'lampiran/MLoPjzIGJWMT4DX6LscN0ficbRSoWeQzAHBrw9ZE.pdf', 'MLoPjzIGJWMT4DX6LscN0ficbRSoWeQzAHBrw9ZE.pdf', '20190115 NDE C.TEL. 11 PERMOHONAN SIMARU PERIODE JANUARI 2019 UNTUK KASTEMER DATA CENTER GUBENG.PDF', 32, '2019-01-16 03:21:04', '2019-01-16 03:21:04'),
(35, 'lampiran/MoYEbu95rmQobasTyzUxvBufzwZeq1K8oSg1mYwq.pdf', 'MoYEbu95rmQobasTyzUxvBufzwZeq1K8oSg1mYwq.pdf', '20190116 NDE C.TEL. 50 PERMOHONAN IZIN MASUK & BEKERJA SERTA PENUNJUKAN WASPANG UNTUK SP#1 PENGADAAN DAN PEMASANGAN METRO ETHERNET, BRAS, PCEF DAN PE TRANSIT PLATFORM HUAWEI - TREG 5.PDF', 34, '2019-01-17 01:35:03', '2019-01-17 01:35:03'),
(36, 'lampiran/NRTOEhwtWmqQoNKYTn53Uww4fB1fi6UB04woAsRl.pdf', 'NRTOEhwtWmqQoNKYTn53Uww4fB1fi6UB04woAsRl.pdf', '20190108 NDE C.TEL. 15 PRAKTEK KERJA INDUSTRI.PDF', 35, '2019-01-17 03:36:10', '2019-01-17 03:36:10'),
(38, 'lampiran/6sTpspbIngdVMVdoqFTFOQ1HyrHeIylxuG23BOmB.pdf', '6sTpspbIngdVMVdoqFTFOQ1HyrHeIylxuG23BOmB.pdf', '20190116 KOPKAR KARYA MAS UNTUK PERBAIKAN COOLING TOWER DI STO DARMO.PDF', 33, '2019-01-18 07:12:48', '2019-01-18 07:12:48'),
(39, 'lampiran/eL61NGDy2f8GbxO64vq8uSuNMGKq48PouaCkCWeh.pdf', 'eL61NGDy2f8GbxO64vq8uSuNMGKq48PouaCkCWeh.pdf', '20190121 NDE C.TEL. 13 PERMOHONAN SIMARU TAMBAHAN UNTUK TEAM TELIN (CHINANET).PDF', 37, '2019-01-21 07:46:17', '2019-01-21 07:46:17'),
(40, 'lampiran/4iVwcaPbIQGnHnZT3TRa0K0j3sepLRqzgqRKRHWU.pdf', '4iVwcaPbIQGnHnZT3TRa0K0j3sepLRqzgqRKRHWU.pdf', '20190121 NDE C.TEL. 14 PERMOHONAN IJIN MASUK LOKASI NEUCENTRIX GUBENG UNTUK PT JASNITA TELEKOMINDO.PDF', 38, '2019-01-21 08:44:52', '2019-01-21 08:44:52'),
(41, 'lampiran/QkNBTyzyGAgTE4Q8Eq7WzFkuwlsAcxIkxaidcMOT.pdf', 'QkNBTyzyGAgTE4Q8Eq7WzFkuwlsAcxIkxaidcMOT.pdf', '20190122 NDE C.TEL. 15 PERMOHONAN SIMARU TAMBAHAN UNTUK TEAM TELIN (CHINANET).PDF', 39, '2019-01-22 03:01:47', '2019-01-22 03:01:47'),
(42, 'lampiran/eJVLMliZpaqLSTH8dTrJ3VZzrCC2N0rqrd581joD.pdf', 'eJVLMliZpaqLSTH8dTrJ3VZzrCC2N0rqrd581joD.pdf', '20190122 NDE C.TEL. 16 PERMOHONAN SIMARU TAMBAHAN UNTUK TEKNISI PT VEKTORDAYA MEKATRIKA (MITRA MO TELKOMSIGMA).PDF', 40, '2019-01-22 04:26:22', '2019-01-22 04:26:22'),
(43, 'lampiran/Mi9XPd3XtQkpwOPE2NrxEbkfDw5hcc0NOpwqCYiC.pdf', 'Mi9XPd3XtQkpwOPE2NrxEbkfDw5hcc0NOpwqCYiC.pdf', '20190122 NDE C.TEL. 7 SURAT IJIN MASUK STO RKT, MYR, TPO & IJK PT. HUAWEI.PDF', 41, '2019-01-22 08:44:16', '2019-01-22 08:44:16'),
(44, 'lampiran/OR1cMQNcqPDbDDn22t8PfhMef1M1JgQ15j5yvt0W.pdf', 'OR1cMQNcqPDbDDn22t8PfhMef1M1JgQ15j5yvt0W.pdf', '20190122 NDE C.TEL. 17 PERMOHONAN SIMARU TAMBAHAN UNTUK TEAM LPSE JATIM.PDF', 42, '2019-01-23 01:45:48', '2019-01-23 01:45:48'),
(45, 'lampiran/PuJgUGIC2GQ4shONkUNkuz6jEJLM8OIJcRLWc3Bz.pdf', 'PuJgUGIC2GQ4shONkUNkuz6jEJLM8OIJcRLWc3Bz.pdf', '20190116 NDE C.TEL. 50 PERMOHONAN IZIN MASUK & BEKERJA SERTA PENUNJUKAN WASPANG UNTUK SP#1 PENGADAAN DAN PEMASANGAN METRO ETHERNET, BRAS, PCEF DAN PE TRANSIT PLATFORM HUAWEI - TREG 5.PDF', 43, '2019-01-23 04:04:45', '2019-01-23 04:04:45'),
(46, 'lampiran/ehW6hIehdDRQn1pDnLj6xnHJM1dEFCnda6tTkCY9.pdf', 'ehW6hIehdDRQn1pDnLj6xnHJM1dEFCnda6tTkCY9.pdf', '20190123 NDE C.TEL. 18 PERMOHONAN SIMARU TAMBAHAN UNTUK TEAM DINAS PERHUBUNGAN JATIM.PDF', 44, '2019-01-23 08:46:15', '2019-01-23 08:46:15'),
(47, 'lampiran/CoGhKooFYgkIPEKpQZJumYko2aLH8KUzeRgWSUUr.pdf', 'CoGhKooFYgkIPEKpQZJumYko2aLH8KUzeRgWSUUr.pdf', '20190123 NDE C.TEL. 17 PERMOHONAN IJIN MASUK LOKASI NEUCENTRIX GUBENG UNTUK PT PRIMEDIA ARMOEKADATA INTERNET.PDF', 45, '2019-01-24 01:06:43', '2019-01-24 01:06:43'),
(48, 'lampiran/BzCQfbgnJEUK0um7vTShY2WtXJbWX7gBhAvzHGrd.pdf', 'BzCQfbgnJEUK0um7vTShY2WtXJbWX7gBhAvzHGrd.pdf', '20190125 NDE C.TEL. 154 SURAT IJIN MASUK LOKASI SITE STO INJOKO & STO RUNGKUT_MAINTENANCE FOR GFR ISAT COLO TELKOM.PDF', 46, '2019-01-25 03:59:15', '2019-01-25 03:59:15'),
(49, 'lampiran/oBHXKNdGGIgprbdA91jjXd00GUCvfBa3poKGrqbu.pdf', 'oBHXKNdGGIgprbdA91jjXd00GUCvfBa3poKGrqbu.pdf', '20190127 NDE C.TEL. 18 PERMOHONAN IJIN MASUK LOKASI.PDF', 47, '2019-01-28 01:15:47', '2019-01-28 01:15:47'),
(50, 'lampiran/hhv4ytmj7dh2pd3EQvH0JfVJs6dL7sRSajIiEmkA.pdf', 'hhv4ytmj7dh2pd3EQvH0JfVJs6dL7sRSajIiEmkA.pdf', '20190128 NDE C.TEL. 161 SURAT IJIN MASUK LOKASI SITE STO RUNGKUT, STO INJOKO,STO DINOYO_PREVENTIVE MAINTENANCE XL COLO TELKOM.PDF', 48, '2019-01-28 04:33:15', '2019-01-28 04:33:15'),
(52, 'lampiran/tJqfICEUHvFg7fvacg6VDoAvdfjLcZBXGyfvePMS.pdf', 'tJqfICEUHvFg7fvacg6VDoAvdfjLcZBXGyfvePMS.pdf', '20190124 NDE C.TEL. 2 PERMOHONAN IJIN MASUK DAN KERJA DI STO RUNGKUT DAN KEBALEN.PDF', 49, '2019-01-28 09:51:12', '2019-01-28 09:51:12'),
(53, 'lampiran/bKbGRqFI4ZuuGLmy9QCXuks4vD9N5BZlB2S78vwB.pdf', 'bKbGRqFI4ZuuGLmy9QCXuks4vD9N5BZlB2S78vwB.pdf', '20190128 NDE C.TEL. 5 PERMOHONAN IJIN KERJA _ MASUK LOKASI DAN PENUNJUKAN WASPANG KEGIATAN PERCEPATAN IMPLEMENTASI NAT PE INDIHOME RAFI 2019.PDF', 50, '2019-01-29 01:45:17', '2019-01-29 01:45:17'),
(54, 'lampiran/8ix55nboh5JD3e1os5BkzpiHtC7C5K63fS7q9aNo.pdf', '8ix55nboh5JD3e1os5BkzpiHtC7C5K63fS7q9aNo.pdf', '20190129 GSD 02144 PERMOHONAN IJIN MASUK & IJIN KERJA UNTUK PEMASANGAN APAR DI STO RUNGKUT.PDF', 51, '2019-01-29 04:17:56', '2019-01-29 04:17:56'),
(55, 'lampiran/oFOjfIoRiwmQZJkYzwjrDdyDov7DUjbvpsxJmUng.pdf', 'oFOjfIoRiwmQZJkYzwjrDdyDov7DUjbvpsxJmUng.pdf', '20190129 NDE C.TEL. 169 PERMOHONAN IJIN MASUK DAN KERJA DI LOKASI STO MANYAR.PDF', 52, '2019-01-29 07:34:46', '2019-01-29 07:34:46'),
(56, 'lampiran/TjakBJz0NbJQbhKPe2AXi52HwHg4eACvj29uT0ww.pdf', 'TjakBJz0NbJQbhKPe2AXi52HwHg4eACvj29uT0ww.pdf', '20190130 NDE C.TEL. 19 PERMOHONAN SIMARU UNTUK TEKNISI PT GSD.PDF', 53, '2019-01-30 06:52:38', '2019-01-30 06:52:38'),
(57, 'lampiran/3BU0FKRIKMveWMmKNE7Z86g9drAiwX8MEHpvc7tu.pdf', '3BU0FKRIKMveWMmKNE7Z86g9drAiwX8MEHpvc7tu.pdf', 'NDE SIMARU PKL POLTEK JEMBER', 54, '2019-03-04 02:39:51', '2019-03-04 02:39:51'),
(58, 'lampiran/xkAefjpgSrl7zBWfTfdDHM201fbGa62d6mfJ7k4Q.pdf', 'xkAefjpgSrl7zBWfTfdDHM201fbGa62d6mfJ7k4Q.pdf', 'SURAT IJIN MASUK', 55, '2019-03-15 01:40:48', '2019-03-15 01:40:48'),
(59, 'lampiran/GILEcsgI3TQRnYZo2RXRdw5q6YQIheaxZBzSjbgG.pdf', 'GILEcsgI3TQRnYZo2RXRdw5q6YQIheaxZBzSjbgG.pdf', 'SURAT IJIN MASUK', 56, '2019-03-19 08:29:18', '2019-03-19 08:29:18');

-- --------------------------------------------------------

--
-- Table structure for table `lampiransuratkeluar`
--

CREATE TABLE `lampiransuratkeluar` (
  `id` int(11) UNSIGNED NOT NULL,
  `path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pathUri` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `namaFile` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `idSuratKeluar` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lampiransuratkeluar`
--

INSERT INTO `lampiransuratkeluar` (`id`, `path`, `pathUri`, `namaFile`, `idSuratKeluar`, `created_at`, `updated_at`) VALUES
(1, 'lampiransuratkeluar/IFRYwnJmq369YCePUsWMnmBxyIX9OLN67QkOuV77.pdf', 'uratkeluar/IFRYwnJmq369YCePUsWMnmBxyIX9OLN67QkOuV77.pdf', 'SIM', 1, '2019-04-01 04:26:25', '2019-04-01 04:26:25');

-- --------------------------------------------------------

--
-- Table structure for table `logbarangkeluar`
--

CREATE TABLE `logbarangkeluar` (
  `id` int(10) UNSIGNED NOT NULL,
  `tanggalValidasi` date NOT NULL,
  `idSecurity` int(10) UNSIGNED NOT NULL,
  `idSuratKeluar` int(10) UNSIGNED NOT NULL,
  `idLokasi` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logbarangkeluar`
--

INSERT INTO `logbarangkeluar` (`id`, `tanggalValidasi`, `idSecurity`, `idSuratKeluar`, `idLokasi`, `created_at`, `updated_at`) VALUES
(1, '2019-04-01', 6, 1, 2, '2019-04-01 04:37:53', '2019-04-01 04:37:53');

-- --------------------------------------------------------

--
-- Table structure for table `logmasuk`
--

CREATE TABLE `logmasuk` (
  `id` int(10) UNSIGNED NOT NULL,
  `tanggalMasuk` date NOT NULL,
  `tanggalKeluar` date NOT NULL,
  `masuk` time NOT NULL,
  `keluar` time NOT NULL,
  `statusLog` tinyint(4) NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pesan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `idPetugas` int(10) UNSIGNED NOT NULL,
  `idSuratMasuk` int(10) UNSIGNED NOT NULL,
  `idSecurityMasuk` int(10) UNSIGNED NOT NULL,
  `idSecurityKeluar` int(10) UNSIGNED NOT NULL,
  `idLokasi` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logmasuk`
--

INSERT INTO `logmasuk` (`id`, `tanggalMasuk`, `tanggalKeluar`, `masuk`, `keluar`, `statusLog`, `keterangan`, `pesan`, `idPetugas`, `idSuratMasuk`, `idSecurityMasuk`, `idSecurityKeluar`, `idLokasi`, `created_at`, `updated_at`) VALUES
(1, '2019-01-07', '2019-01-08', '22:32:30', '03:08:38', 1, 'Terselesaikan', '-', 51, 6, 6, 14, 2, '2019-01-07 15:32:30', '2019-01-07 20:08:38'),
(2, '2019-01-07', '2019-01-08', '22:32:37', '03:08:46', 1, 'Terselesaikan', '-', 52, 6, 6, 14, 2, '2019-01-07 15:32:37', '2019-01-07 20:08:46'),
(3, '2019-01-09', '2019-01-09', '12:11:08', '17:18:00', 1, 'Terselesaikan', '-', 71, 10, 7, 11, 2, '2019-01-09 05:11:08', '2019-01-09 10:18:00'),
(4, '2019-01-09', '2019-01-09', '13:22:08', '16:25:16', 1, 'Terselesaikan', '-', 68, 9, 38, 38, 3, '2019-01-09 06:22:08', '2019-01-09 09:25:16'),
(5, '2019-01-09', '2019-01-09', '13:22:11', '16:25:18', 1, 'Terselesaikan', '-', 69, 9, 38, 38, 3, '2019-01-09 06:22:11', '2019-01-09 09:25:18'),
(6, '2019-01-09', '2019-01-10', '22:05:00', '07:40:45', 1, 'Terselesaikan', '-', 144, 13, 14, 7, 2, '2019-01-09 15:05:00', '2019-01-10 00:40:45'),
(7, '2019-01-09', '2019-01-10', '22:05:23', '07:40:48', 1, 'Terselesaikan', '-', 145, 13, 14, 7, 2, '2019-01-09 15:05:23', '2019-01-10 00:40:48'),
(8, '2019-01-10', '2019-01-10', '10:30:25', '16:48:16', 1, 'Terselesaikan', '-', 74, 10, 11, 11, 2, '2019-01-10 03:30:25', '2019-01-10 09:48:16'),
(9, '2019-01-10', '2019-01-10', '10:30:43', '16:48:19', 1, 'Terselesaikan', '-', 70, 10, 11, 11, 2, '2019-01-10 03:30:43', '2019-01-10 09:48:20'),
(10, '2019-01-10', '2019-01-10', '10:31:00', '16:48:23', 1, 'Terselesaikan', '-', 72, 10, 11, 11, 2, '2019-01-10 03:31:00', '2019-01-10 09:48:23'),
(11, '2019-01-10', '2019-01-10', '10:31:37', '16:48:28', 1, 'Terselesaikan', '-', 71, 10, 11, 11, 2, '2019-01-10 03:31:37', '2019-01-10 09:48:28'),
(12, '2019-01-10', '2019-01-10', '16:04:32', '19:24:43', 1, 'Terselesaikan', '-', 153, 16, 11, 13, 2, '2019-01-10 09:04:32', '2019-01-10 12:24:43'),
(13, '2019-01-10', '2019-01-10', '16:05:16', '19:24:45', 1, 'Terselesaikan', '-', 152, 16, 11, 13, 2, '2019-01-10 09:05:16', '2019-01-10 12:24:45'),
(14, '2019-01-11', '2019-01-14', '09:58:05', '11:34:27', 1, 'Terselesaikan', '-', 71, 10, 11, 15, 2, '2019-01-11 02:58:05', '2019-01-14 04:34:27'),
(15, '2019-01-11', '2019-01-14', '09:58:26', '11:34:31', 1, 'Terselesaikan', '-', 74, 10, 11, 15, 2, '2019-01-11 02:58:26', '2019-01-14 04:34:31'),
(16, '2019-01-11', '2019-01-14', '12:30:20', '11:34:25', 1, 'Terselesaikan', '-', 153, 16, 11, 15, 2, '2019-01-11 05:30:20', '2019-01-14 04:34:25'),
(17, '2019-01-11', '2019-01-11', '15:17:48', '19:14:09', 1, 'Terselesaikan', '-', 146, 14, 39, 39, 3, '2019-01-11 08:17:48', '2019-01-11 12:14:09'),
(18, '2019-01-11', '2019-01-11', '16:16:38', '17:02:26', 1, 'Terselesaikan', '-', 154, 17, 30, 30, 7, '2019-01-11 09:16:38', '2019-01-11 10:02:26'),
(19, '2019-01-14', '2019-01-14', '11:43:50', '15:43:12', 1, 'Terselesaikan', '-', 184, 20, 15, 15, 2, '2019-01-14 04:43:50', '2019-01-14 08:43:12'),
(20, '2019-01-15', '2019-01-15', '09:12:25', '09:38:38', 1, 'Terselesaikan', '-', 194, 22, 11, 11, 2, '2019-01-15 02:12:25', '2019-01-15 02:38:38'),
(21, '2019-01-15', '2019-01-15', '09:12:51', '09:38:41', 1, 'Terselesaikan', '-', 206, 22, 11, 11, 2, '2019-01-15 02:12:51', '2019-01-15 02:38:41'),
(22, '2019-01-15', '2019-01-15', '13:45:31', '16:55:42', 1, 'Terselesaikan', '-', 56, 7, 7, 13, 2, '2019-01-15 06:45:31', '2019-01-15 09:55:42'),
(23, '2019-01-15', '2019-01-15', '13:45:35', '16:55:45', 1, 'Terselesaikan', '-', 62, 7, 7, 13, 2, '2019-01-15 06:45:35', '2019-01-15 09:55:45'),
(24, '2019-01-15', '2019-01-16', '23:13:37', '02:16:33', 1, 'Terselesaikan', '-', 244, 27, 15, 15, 2, '2019-01-15 16:13:37', '2019-01-15 19:16:33'),
(25, '2019-01-16', '2019-01-16', '10:25:44', '17:06:06', 1, 'Terselesaikan', '-', 155, 18, 38, 38, 3, '2019-01-16 03:25:44', '2019-01-16 10:06:06'),
(26, '2019-01-16', '2019-01-16', '10:25:57', '17:06:09', 1, 'Terselesaikan', '-', 157, 18, 38, 38, 3, '2019-01-16 03:25:57', '2019-01-16 10:06:09'),
(27, '2019-01-16', '2019-01-16', '10:48:30', '13:56:48', 1, 'Terselesaikan', '-', 62, 7, 7, 11, 2, '2019-01-16 03:48:30', '2019-01-16 06:56:48'),
(28, '2019-01-16', '2019-01-16', '10:49:38', '13:56:52', 1, 'Terselesaikan', '-', 56, 7, 7, 11, 2, '2019-01-16 03:49:38', '2019-01-16 06:56:52'),
(29, '2019-01-16', '2019-01-16', '13:10:21', '17:06:11', 1, 'Terselesaikan', '-', 156, 18, 38, 38, 3, '2019-01-16 06:10:21', '2019-01-16 10:06:11'),
(30, '2019-01-17', '2019-01-17', '08:42:19', '12:45:42', 1, 'Terselesaikan', '-', 155, 18, 39, 39, 3, '2019-01-17 01:42:19', '2019-01-17 05:45:42'),
(31, '2019-01-17', '2019-01-17', '08:42:56', '12:45:47', 1, 'Terselesaikan', '-', 157, 18, 39, 39, 3, '2019-01-17 01:42:56', '2019-01-17 05:45:47'),
(32, '2019-01-17', '2019-01-17', '11:05:34', '16:03:03', 1, 'Terselesaikan', '-', 56, 7, 7, 8, 2, '2019-01-17 04:05:34', '2019-01-17 09:03:03'),
(33, '2019-01-17', '2019-01-17', '11:05:52', '16:03:07', 1, 'Terselesaikan', '-', 62, 7, 7, 8, 2, '2019-01-17 04:05:52', '2019-01-17 09:03:07'),
(34, '2019-01-17', '2019-01-17', '11:21:35', '16:17:06', 1, 'Terselesaikan', '-', 731, 34, 7, 7, 2, '2019-01-17 04:21:35', '2019-01-17 09:17:06'),
(35, '2019-01-17', '2019-01-17', '12:10:34', '19:15:01', 1, 'Terselesaikan', '-', 507, 33, 55, 55, 5, '2019-01-17 05:10:34', '2019-01-17 12:15:01'),
(36, '2019-01-17', '2019-01-17', '12:10:40', '19:15:04', 1, 'Terselesaikan', '-', 508, 33, 55, 55, 5, '2019-01-17 05:10:40', '2019-01-17 12:15:04'),
(37, '2019-01-18', '2019-01-18', '09:26:02', '15:32:45', 1, 'Terselesaikan', '-', 731, 34, 10, 10, 2, '2019-01-18 02:26:02', '2019-01-18 08:32:45'),
(38, '2019-01-18', '2019-01-18', '10:18:48', '11:50:19', 1, 'Terselesaikan', '-', 713, 32, 43, 43, 3, '2019-01-18 03:18:48', '2019-01-18 04:50:19'),
(39, '2019-01-18', '2019-01-18', '10:18:56', '11:50:23', 1, 'Terselesaikan', '-', 712, 32, 43, 43, 3, '2019-01-18 03:18:56', '2019-01-18 04:50:23'),
(40, '2019-01-18', '2019-01-18', '13:01:36', '16:07:44', 1, 'Terselesaikan', '-', 62, 7, 10, 10, 2, '2019-01-18 06:01:36', '2019-01-18 09:07:44'),
(41, '2019-01-18', '2019-01-18', '13:02:01', '16:07:47', 1, 'Terselesaikan', '-', 56, 7, 10, 10, 2, '2019-01-18 06:02:01', '2019-01-18 09:07:47'),
(42, '2019-01-18', '2019-01-18', '13:22:48', '15:43:39', 1, 'Terselesaikan', '-', 187, 21, 10, 10, 2, '2019-01-18 06:22:48', '2019-01-18 08:43:39'),
(43, '2019-01-18', '2019-01-18', '15:40:43', '16:46:01', 1, 'Terselesaikan', '-', 235, 26, 29, 29, 7, '2019-01-18 08:40:43', '2019-01-18 09:46:01'),
(44, '2019-01-19', '2019-01-19', '20:12:09', '22:49:01', 1, 'Terselesaikan', '-', 230, 25, 17, 17, 9, '2019-01-19 13:12:09', '2019-01-19 15:49:01'),
(45, '2019-01-19', '2019-01-19', '20:12:58', '22:49:07', 1, 'Terselesaikan', '-', 233, 25, 17, 17, 9, '2019-01-19 13:12:58', '2019-01-19 15:49:07'),
(46, '2019-01-19', '2019-01-19', '20:13:47', '22:49:20', 1, 'Terselesaikan', '-', 231, 25, 17, 17, 9, '2019-01-19 13:13:47', '2019-01-19 15:49:20'),
(47, '2019-01-19', '2019-01-19', '20:14:13', '22:49:26', 1, 'Terselesaikan', '-', 234, 25, 17, 17, 9, '2019-01-19 13:14:13', '2019-01-19 15:49:26'),
(48, '2019-01-19', '2019-01-19', '20:14:46', '22:49:30', 1, 'Terselesaikan', '-', 232, 25, 17, 17, 9, '2019-01-19 13:14:46', '2019-01-19 15:49:30'),
(49, '2019-01-20', '2019-01-20', '08:17:23', '10:05:00', 1, 'Terselesaikan', '-', 712, 32, 40, 40, 3, '2019-01-20 01:17:23', '2019-01-20 03:05:00'),
(50, '2019-01-20', '2019-01-20', '09:09:53', '16:48:17', 1, 'Terselesaikan', '-', 230, 25, 17, 17, 9, '2019-01-20 02:09:53', '2019-01-20 09:48:17'),
(51, '2019-01-20', '2019-01-20', '09:10:21', '16:48:23', 1, 'Terselesaikan', '-', 233, 25, 17, 17, 9, '2019-01-20 02:10:21', '2019-01-20 09:48:23'),
(52, '2019-01-20', '2019-01-20', '09:10:35', '16:48:29', 1, 'Terselesaikan', '-', 231, 25, 17, 17, 9, '2019-01-20 02:10:35', '2019-01-20 09:48:29'),
(53, '2019-01-20', '2019-01-20', '09:11:00', '16:48:34', 1, 'Terselesaikan', '-', 234, 25, 17, 17, 9, '2019-01-20 02:11:00', '2019-01-20 09:48:34'),
(54, '2019-01-20', '2019-01-20', '09:12:01', '16:48:39', 1, 'Terselesaikan', '-', 232, 25, 17, 17, 9, '2019-01-20 02:12:01', '2019-01-20 09:48:39'),
(55, '2019-01-21', '2019-01-21', '11:31:47', '16:55:02', 1, 'Terselesaikan', '-', 62, 7, 13, 13, 2, '2019-01-21 04:31:47', '2019-01-21 09:55:02'),
(56, '2019-01-21', '2019-01-21', '11:31:54', '16:55:04', 1, 'Terselesaikan', '-', 56, 7, 13, 13, 2, '2019-01-21 04:31:54', '2019-01-21 09:55:04'),
(57, '2019-01-21', '2019-01-21', '13:14:03', '16:11:06', 1, 'Terselesaikan', '-', 194, 22, 13, 13, 2, '2019-01-21 06:14:03', '2019-01-21 09:11:06'),
(58, '2019-01-21', '2019-01-21', '18:17:41', '22:39:38', 1, 'Terselesaikan', '-', 231, 25, 17, 17, 9, '2019-01-21 11:17:41', '2019-01-21 15:39:38'),
(60, '2019-01-21', '2019-01-21', '18:43:19', '22:39:45', 1, 'Terselesaikan', '-', 232, 25, 17, 17, 9, '2019-01-21 11:43:19', '2019-01-21 15:39:45'),
(61, '2019-01-22', '2019-01-22', '09:05:33', '09:21:00', 1, 'Terselesaikan', '-', 742, 38, 38, 38, 3, '2019-01-22 02:05:33', '2019-01-22 02:21:00'),
(62, '2019-01-22', '2019-01-22', '09:18:37', '18:04:04', 1, 'Terselesaikan', '-', 731, 34, 13, 13, 2, '2019-01-22 02:18:37', '2019-01-22 11:04:04'),
(63, '2019-01-22', '2019-01-22', '11:53:15', '13:12:49', 1, 'Terselesaikan', '-', 161, 19, 45, 45, 4, '2019-01-22 04:53:15', '2019-01-22 06:12:49'),
(64, '2019-01-22', '2019-01-22', '11:53:24', '13:12:56', 1, 'Terselesaikan', '-', 162, 19, 45, 45, 4, '2019-01-22 04:53:24', '2019-01-22 06:12:56'),
(65, '2019-01-23', '2019-01-23', '08:49:23', '10:18:47', 1, 'Terselesaikan', '-', 765, 42, 38, 38, 3, '2019-01-23 01:49:23', '2019-01-23 03:18:47'),
(66, '2019-01-23', '2019-01-23', '08:49:29', '10:18:51', 1, 'Terselesaikan', '-', 766, 42, 38, 38, 3, '2019-01-23 01:49:29', '2019-01-23 03:18:51'),
(67, '2019-01-23', '2019-01-23', '08:49:34', '10:18:55', 1, 'Terselesaikan', '-', 767, 42, 38, 38, 3, '2019-01-23 01:49:34', '2019-01-23 03:18:55'),
(68, '2019-01-23', '2019-01-23', '09:16:24', '17:34:12', 1, 'Terselesaikan', '-', 731, 34, 13, 10, 2, '2019-01-23 02:16:24', '2019-01-23 10:34:12'),
(69, '2019-01-23', '2019-01-23', '10:18:35', '15:10:36', 1, 'Terselesaikan', '-', 746, 40, 38, 38, 3, '2019-01-23 03:18:35', '2019-01-23 08:10:36'),
(70, '2019-01-23', '2019-01-23', '11:40:15', '15:40:50', 1, 'Terselesaikan', '-', 771, 43, 10, 10, 2, '2019-01-23 04:40:15', '2019-01-23 08:40:50'),
(71, '2019-01-23', '2019-01-23', '11:40:19', '15:40:54', 1, 'Terselesaikan', '-', 772, 43, 10, 10, 2, '2019-01-23 04:40:19', '2019-01-23 08:40:54'),
(72, '2019-01-23', '2019-01-23', '13:41:45', '15:34:25', 1, 'Terselesaikan', '-', 162, 19, 47, 47, 4, '2019-01-23 06:41:45', '2019-01-23 08:34:25'),
(73, '2019-01-23', '2019-01-23', '13:50:58', '15:34:41', 1, 'Terselesaikan', '-', 169, 19, 47, 47, 4, '2019-01-23 06:50:58', '2019-01-23 08:34:41'),
(74, '2019-01-23', '2019-01-23', '13:51:58', '15:34:44', 1, 'Terselesaikan', '-', 170, 19, 47, 47, 4, '2019-01-23 06:51:58', '2019-01-23 08:34:44'),
(75, '2019-01-23', '2019-01-23', '13:52:26', '15:34:48', 1, 'Terselesaikan', '-', 173, 19, 47, 47, 4, '2019-01-23 06:52:26', '2019-01-23 08:34:48'),
(76, '2019-01-23', '2019-01-23', '13:52:52', '15:34:52', 1, 'Terselesaikan', '-', 167, 19, 47, 47, 4, '2019-01-23 06:52:52', '2019-01-23 08:34:52'),
(77, '2019-01-23', '2019-01-23', '13:53:14', '15:34:56', 1, 'Terselesaikan', '-', 176, 19, 47, 47, 4, '2019-01-23 06:53:14', '2019-01-23 08:34:56'),
(78, '2019-01-23', '2019-01-23', '14:30:57', '16:05:20', 1, 'Terselesaikan', '-', 556, 32, 38, 38, 3, '2019-01-23 07:30:57', '2019-01-23 09:05:20'),
(79, '2019-01-23', '2019-01-23', '15:36:19', '16:20:29', 1, 'Terselesaikan', '-', 634, 32, 38, 38, 3, '2019-01-23 08:36:19', '2019-01-23 09:20:29'),
(80, '2019-01-23', '2019-01-23', '15:51:51', '16:01:46', 1, 'Terselesaikan', '-', 775, 44, 38, 38, 3, '2019-01-23 08:51:51', '2019-01-23 09:01:46'),
(81, '2019-01-24', '2019-01-24', '13:04:54', '16:22:49', 1, 'Terselesaikan', '-', 217, 23, 7, 7, 2, '2019-01-24 06:04:54', '2019-01-24 09:22:49'),
(82, '2019-01-24', '2019-01-24', '14:00:06', '17:05:36', 1, 'Terselesaikan', '-', 746, 40, 38, 38, 3, '2019-01-24 07:00:06', '2019-01-24 10:05:37'),
(83, '2019-01-24', '2019-01-24', '14:17:01', '17:21:31', 1, 'Terselesaikan', '-', 748, 40, 38, 38, 3, '2019-01-24 07:17:01', '2019-01-24 10:21:31'),
(84, '2019-01-24', '2019-01-24', '14:43:28', '16:19:12', 1, 'Terselesaikan', '-', 246, 28, 7, 7, 2, '2019-01-24 07:43:28', '2019-01-24 09:19:12'),
(85, '2019-01-25', '2019-01-25', '09:40:16', '13:44:02', 1, 'Terselesaikan', '-', 247, 28, 14, 14, 2, '2019-01-25 02:40:16', '2019-01-25 06:44:02'),
(86, '2019-01-25', '2019-01-25', '13:25:00', '14:20:19', 1, 'Terselesaikan', '-', 687, 32, 38, 38, 3, '2019-01-25 06:25:00', '2019-01-25 07:20:19'),
(87, '2019-01-28', '2019-01-28', '14:38:30', '15:40:58', 1, 'Terselesaikan', '-', 790, 47, 38, 38, 3, '2019-01-28 07:38:30', '2019-01-28 08:40:58'),
(88, '2019-01-28', '2019-01-28', '14:38:51', '15:41:04', 1, 'Terselesaikan', '-', 791, 47, 38, 38, 3, '2019-01-28 07:38:51', '2019-01-28 08:41:04'),
(89, '2019-01-28', '2019-01-28', '14:39:03', '15:41:10', 1, 'Terselesaikan', '-', 792, 47, 38, 38, 3, '2019-01-28 07:39:03', '2019-01-28 08:41:10'),
(90, '2019-01-28', '2019-01-28', '20:21:41', '22:34:10', 1, 'Terselesaikan', '-', 812, 49, 15, 14, 2, '2019-01-28 13:21:41', '2019-01-28 15:34:10'),
(91, '2019-01-28', '2019-01-29', '23:16:01', '03:32:18', 1, 'Terselesaikan', '-', 162, 19, 45, 45, 4, '2019-01-28 16:16:01', '2019-01-28 20:32:18'),
(92, '2019-01-28', '2019-01-29', '23:17:12', '03:32:22', 1, 'Terselesaikan', '-', 168, 19, 45, 45, 4, '2019-01-28 16:17:12', '2019-01-28 20:32:22'),
(93, '2019-01-28', '2019-01-29', '23:17:47', '03:32:27', 1, 'Terselesaikan', '-', 169, 19, 45, 45, 4, '2019-01-28 16:17:47', '2019-01-28 20:32:27'),
(94, '2019-01-29', '2019-01-29', '09:51:28', '11:47:57', 1, 'Terselesaikan', '-', 217, 23, 10, 10, 2, '2019-01-29 02:51:28', '2019-01-29 04:47:57'),
(95, '2019-01-29', '2019-01-29', '11:27:22', '16:34:58', 1, 'Terselesaikan', '-', 62, 7, 10, 10, 2, '2019-01-29 04:27:22', '2019-01-29 09:34:58'),
(96, '2019-01-29', '2019-01-29', '11:27:33', '16:35:02', 1, 'Terselesaikan', '-', 56, 7, 10, 10, 2, '2019-01-29 04:27:33', '2019-01-29 09:35:02'),
(97, '2019-01-29', '2019-01-29', '12:45:52', '14:27:00', 1, 'Terselesaikan', '-', 786, 46, 28, 28, 7, '2019-01-29 05:45:52', '2019-01-29 07:27:00'),
(98, '2019-01-29', '2019-01-29', '13:13:23', '16:46:26', 1, 'Terselesaikan', '-', 217, 23, 10, 10, 2, '2019-01-29 06:13:23', '2019-01-29 09:46:26'),
(99, '2019-01-29', '2019-01-29', '14:52:03', '16:37:47', 1, 'Terselesaikan', '-', 786, 46, 10, 10, 2, '2019-01-29 07:52:03', '2019-01-29 09:37:47'),
(100, '2019-01-29', '2019-01-30', '23:28:45', '01:18:40', 1, 'Terselesaikan', '-', 168, 19, 47, 47, 4, '2019-01-29 16:28:45', '2019-01-29 18:18:40'),
(101, '2019-01-29', '2019-01-30', '23:41:02', '01:18:43', 1, 'Terselesaikan', '-', 164, 19, 47, 47, 4, '2019-01-29 16:41:02', '2019-01-29 18:18:43'),
(102, '2019-01-30', '2019-01-30', '11:42:55', '16:23:33', 1, 'Terselesaikan', '-', 56, 7, 11, 11, 2, '2019-01-30 04:42:55', '2019-01-30 09:23:33'),
(103, '2019-01-30', '2019-01-30', '11:43:00', '16:23:38', 1, 'Terselesaikan', '-', 62, 7, 11, 11, 2, '2019-01-30 04:43:00', '2019-01-30 09:23:38'),
(104, '2019-01-30', '2019-01-30', '15:39:04', '17:01:53', 1, 'Terselesaikan', '-', 217, 23, 11, 11, 2, '2019-01-30 08:39:04', '2019-01-30 10:01:53'),
(105, '2019-03-15', '2019-03-20', '08:43:17', '09:44:17', 1, 'Terselesaikan', '-', 850, 55, 6, 6, 2, '2019-03-15 01:43:17', '2019-03-20 02:44:17');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id` int(10) UNSIGNED NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id`, `lokasi`) VALUES
(1, 'All STO Surabaya Selatan'),
(2, 'STO Rungkut'),
(3, 'STO Gubeng'),
(4, 'STO Manyar'),
(5, 'STO Darmo'),
(6, 'STO Jagir'),
(7, 'STO Injoko'),
(8, 'STO Waru'),
(9, 'STO Tropodo'),
(10, 'Telkom Ketintang'),
(11, 'Plasa Telkom Dinoyo'),
(12, 'Plasa Telkom Rungkut'),
(13, 'Plasa Telkom Manyar');

-- --------------------------------------------------------

--
-- Table structure for table `lokasikerja`
--

CREATE TABLE `lokasikerja` (
  `id` int(10) UNSIGNED NOT NULL,
  `idPekerjaan` int(10) UNSIGNED NOT NULL,
  `idLokasi` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lokasikerja`
--

INSERT INTO `lokasikerja` (`id`, `idPekerjaan`, `idLokasi`, `created_at`, `updated_at`) VALUES
(2, 4, 2, '2019-01-07 08:05:13', '2019-01-07 08:05:13'),
(3, 4, 6, '2019-01-07 08:05:13', '2019-01-07 08:05:13'),
(4, 4, 7, '2019-01-07 08:05:13', '2019-01-07 08:05:13'),
(5, 4, 11, '2019-01-07 08:05:13', '2019-01-07 08:05:13'),
(7, 5, 2, '2019-01-07 08:30:51', '2019-01-07 08:30:51'),
(9, 6, 2, '2019-01-08 07:37:46', '2019-01-08 07:37:46'),
(11, 7, 2, '2019-01-08 07:49:02', '2019-01-08 07:49:02'),
(13, 8, 3, '2019-01-08 07:58:31', '2019-01-08 07:58:31'),
(14, 9, 2, '2019-01-09 00:57:58', '2019-01-09 00:57:58'),
(16, 10, 8, '2019-01-09 08:32:36', '2019-01-09 08:32:36'),
(17, 11, 2, '2019-01-09 08:49:59', '2019-01-09 08:49:59'),
(18, 11, 4, '2019-01-09 08:49:59', '2019-01-09 08:49:59'),
(19, 11, 5, '2019-01-09 08:49:59', '2019-01-09 08:49:59'),
(20, 11, 6, '2019-01-09 08:49:59', '2019-01-09 08:49:59'),
(21, 11, 7, '2019-01-09 08:49:59', '2019-01-09 08:49:59'),
(22, 11, 10, '2019-01-09 08:49:59', '2019-01-09 08:49:59'),
(23, 11, 11, '2019-01-09 08:49:59', '2019-01-09 08:49:59'),
(25, 12, 2, '2019-01-09 09:07:24', '2019-01-09 09:07:24'),
(26, 13, 3, '2019-01-10 01:16:26', '2019-01-10 01:16:26'),
(28, 14, 4, '2019-01-10 03:30:07', '2019-01-10 03:30:07'),
(29, 15, 2, '2019-01-10 04:07:57', '2019-01-10 04:07:57'),
(31, 16, 7, '2019-01-11 07:18:13', '2019-01-11 07:18:13'),
(32, 17, 3, '2019-01-14 01:19:48', '2019-01-14 01:19:48'),
(33, 18, 4, '2019-01-14 01:37:14', '2019-01-14 01:37:14'),
(36, 20, 2, '2019-01-14 04:43:28', '2019-01-14 04:43:28'),
(37, 21, 2, '2019-01-14 05:32:04', '2019-01-14 05:32:04'),
(38, 22, 2, '2019-01-14 08:05:40', '2019-01-14 08:05:40'),
(41, 19, 2, '2019-01-15 02:23:19', '2019-01-15 02:23:19'),
(46, 23, 3, '2019-01-15 07:34:08', '2019-01-15 07:34:08'),
(47, 23, 5, '2019-01-15 07:34:08', '2019-01-15 07:34:08'),
(48, 25, 7, '2019-01-15 08:18:50', '2019-01-15 08:18:50'),
(50, 26, 2, '2019-01-16 01:09:53', '2019-01-16 01:09:53'),
(51, 27, 2, '2019-01-16 01:43:02', '2019-01-16 01:43:02'),
(52, 28, 2, '2019-01-16 01:58:22', '2019-01-16 01:58:22'),
(53, 29, 2, '2019-01-16 02:10:48', '2019-01-16 02:10:48'),
(54, 29, 7, '2019-01-16 02:10:48', '2019-01-16 02:10:48'),
(55, 30, 4, '2019-01-16 03:06:00', '2019-01-16 03:06:00'),
(58, 31, 3, '2019-01-16 03:34:27', '2019-01-16 03:34:27'),
(60, 33, 2, '2019-01-17 01:35:03', '2019-01-17 01:35:03'),
(61, 34, 1, '2019-01-17 03:36:10', '2019-01-17 03:36:10'),
(64, 32, 5, '2019-01-18 07:23:15', '2019-01-18 07:23:15'),
(65, 24, 9, '2019-01-19 12:50:03', '2019-01-19 12:50:03'),
(66, 36, 3, '2019-01-21 07:46:17', '2019-01-21 07:46:17'),
(67, 37, 3, '2019-01-21 08:44:52', '2019-01-21 08:44:52'),
(68, 38, 3, '2019-01-22 03:01:47', '2019-01-22 03:01:47'),
(69, 39, 3, '2019-01-22 04:26:22', '2019-01-22 04:26:22'),
(73, 40, 2, '2019-01-22 09:23:32', '2019-01-22 09:23:32'),
(74, 40, 4, '2019-01-22 09:23:32', '2019-01-22 09:23:32'),
(75, 40, 7, '2019-01-22 09:23:32', '2019-01-22 09:23:32'),
(76, 40, 9, '2019-01-22 09:23:32', '2019-01-22 09:23:32'),
(77, 41, 3, '2019-01-23 01:45:48', '2019-01-23 01:45:48'),
(78, 42, 2, '2019-01-23 04:04:45', '2019-01-23 04:04:45'),
(79, 43, 3, '2019-01-23 08:46:15', '2019-01-23 08:46:15'),
(81, 44, 3, '2019-01-24 01:08:42', '2019-01-24 01:08:42'),
(82, 45, 2, '2019-01-25 03:59:15', '2019-01-25 03:59:15'),
(83, 45, 7, '2019-01-25 03:59:15', '2019-01-25 03:59:15'),
(85, 47, 2, '2019-01-28 04:33:15', '2019-01-28 04:33:15'),
(86, 47, 7, '2019-01-28 04:33:15', '2019-01-28 04:33:15'),
(87, 47, 11, '2019-01-28 04:33:15', '2019-01-28 04:33:15'),
(88, 46, 3, '2019-01-28 09:00:09', '2019-01-28 09:00:09'),
(92, 48, 2, '2019-01-28 09:51:12', '2019-01-28 09:51:12'),
(93, 49, 2, '2019-01-29 01:45:17', '2019-01-29 01:45:17'),
(96, 50, 2, '2019-01-29 05:57:55', '2019-01-29 05:57:55'),
(98, 51, 4, '2019-01-29 07:35:16', '2019-01-29 07:35:16'),
(99, 52, 3, '2019-01-30 06:52:38', '2019-01-30 06:52:38'),
(100, 53, 1, '2019-03-04 02:39:51', '2019-03-04 02:39:51'),
(101, 54, 1, '2019-03-15 01:40:48', '2019-03-15 01:40:48'),
(102, 55, 1, '2019-03-19 08:29:18', '2019-03-19 08:29:18');

-- --------------------------------------------------------

--
-- Table structure for table `lokasisuratkeluar`
--

CREATE TABLE `lokasisuratkeluar` (
  `id` int(10) UNSIGNED NOT NULL,
  `idLokasi` int(10) UNSIGNED NOT NULL,
  `idSuratKeluar` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lokasisuratkeluar`
--

INSERT INTO `lokasisuratkeluar` (`id`, `idLokasi`, `idSuratKeluar`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2019-04-01 04:26:26', '2019-04-01 04:26:26');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2017_08_14_063305_databaseMigration', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nda`
--

CREATE TABLE `nda` (
  `id` int(10) UNSIGNED NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pathUri` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggalBerlaku` date NOT NULL,
  `tanggalBerakhir` date NOT NULL,
  `statusNda` tinyint(4) NOT NULL,
  `validasiNda` int(11) NOT NULL,
  `idPicMitra` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nda`
--

INSERT INTO `nda` (`id`, `path`, `pathUri`, `tanggalBerlaku`, `tanggalBerakhir`, `statusNda`, `validasiNda`, `idPicMitra`, `created_at`, `updated_at`) VALUES
(1, '-', '-', '2019-01-07', '2019-01-08', 1, 0, 50, '2019-01-07 15:32:14', '2019-01-07 15:32:14'),
(2, '-', '-', '2019-01-07', '2019-01-08', 1, 0, 51, '2019-01-07 15:32:21', '2019-01-07 15:32:21'),
(3, '-', '-', '2019-01-09', '2019-02-08', 1, 0, 70, '2019-01-09 05:10:03', '2019-01-09 05:10:03'),
(4, '-', '-', '2019-01-09', '2019-01-10', 1, 0, 67, '2019-01-09 06:21:58', '2019-01-09 06:21:58'),
(5, '-', '-', '2019-01-09', '2019-01-10', 1, 0, 68, '2019-01-09 06:22:00', '2019-01-09 06:22:00'),
(6, '-', '-', '2019-01-09', '2019-01-10', 1, 0, 143, '2019-01-09 15:04:57', '2019-01-09 15:04:57'),
(7, '-', '-', '2019-01-09', '2019-01-10', 1, 0, 144, '2019-01-09 15:05:20', '2019-01-09 15:05:20'),
(8, '-', '-', '2019-01-10', '2019-02-08', 1, 0, 73, '2019-01-10 03:30:20', '2019-01-10 03:30:20'),
(9, '-', '-', '2019-01-10', '2019-02-08', 1, 0, 69, '2019-01-10 03:30:38', '2019-01-10 03:30:38'),
(10, '-', '-', '2019-01-10', '2019-02-08', 1, 0, 71, '2019-01-10 03:30:57', '2019-01-10 03:30:57'),
(11, '-', '-', '2019-01-10', '2019-01-17', 1, 0, 152, '2019-01-10 09:04:29', '2019-01-10 09:04:29'),
(12, '-', '-', '2019-01-10', '2019-01-17', 1, 0, 151, '2019-01-10 09:05:12', '2019-01-10 09:05:12'),
(13, '-', '-', '2019-01-11', '2019-01-12', 1, 0, 145, '2019-01-11 08:17:42', '2019-01-11 08:17:42'),
(14, '-', '-', '2019-01-11', '2019-01-18', 1, 0, 153, '2019-01-11 09:16:01', '2019-01-11 09:16:01'),
(15, '-', '-', '2019-01-14', '2019-01-18', 1, 0, 183, '2019-01-14 04:39:24', '2019-01-14 04:39:25'),
(16, '-', '-', '2019-01-15', '2019-01-22', 1, 0, 193, '2019-01-15 02:12:20', '2019-01-15 02:12:20'),
(17, '-', '-', '2019-01-15', '2019-01-22', 1, 0, 205, '2019-01-15 02:12:44', '2019-01-15 02:12:44'),
(18, '-', '-', '2019-01-15', '2019-01-31', 1, 0, 55, '2019-01-15 06:45:15', '2019-01-15 06:45:15'),
(19, '-', '-', '2019-01-15', '2019-01-31', 1, 0, 61, '2019-01-15 06:45:27', '2019-01-15 06:45:27'),
(20, '-', '-', '2019-01-15', '2019-01-16', 1, 0, 243, '2019-01-15 16:13:32', '2019-01-15 16:13:32'),
(21, '-', '-', '2019-01-16', '2019-01-31', 1, 0, 154, '2019-01-16 03:25:42', '2019-01-16 03:25:42'),
(22, '-', '-', '2019-01-16', '2019-01-31', 1, 0, 156, '2019-01-16 03:25:54', '2019-01-16 03:25:54'),
(23, '-', '-', '2019-01-16', '2019-01-31', 1, 0, 155, '2019-01-16 06:10:18', '2019-01-16 06:10:18'),
(24, '-', '-', '2019-01-17', '2019-01-31', 1, 0, 839, '2019-01-17 04:21:33', '2019-01-17 04:21:33'),
(25, '-', '-', '2019-01-17', '2019-01-19', 1, 0, 832, '2019-01-17 05:10:04', '2019-01-17 05:10:04'),
(26, '-', '-', '2019-01-17', '2019-01-19', 1, 0, 833, '2019-01-17 05:10:29', '2019-01-17 05:10:29'),
(27, '-', '-', '2019-01-18', '2020-01-18', 1, 0, 757, '2019-01-18 03:18:42', '2019-01-18 03:18:43'),
(28, '-', '-', '2019-01-18', '2020-01-18', 1, 0, 754, '2019-01-18 03:18:53', '2019-01-18 03:18:53'),
(29, '-', '-', '2019-01-18', '2019-02-14', 1, 0, 186, '2019-01-18 06:22:45', '2019-01-18 06:22:45'),
(30, '-', '-', '2019-01-18', '2019-02-15', 1, 0, 234, '2019-01-18 08:39:57', '2019-01-18 08:39:57'),
(31, '-', '-', '2019-01-19', '2019-01-21', 1, 0, 229, '2019-01-19 13:12:02', '2019-01-19 13:12:02'),
(32, '-', '-', '2019-01-19', '2019-01-21', 1, 0, 232, '2019-01-19 13:12:53', '2019-01-19 13:12:53'),
(33, '-', '-', '2019-01-19', '2019-01-21', 1, 0, 230, '2019-01-19 13:13:42', '2019-01-19 13:13:42'),
(34, '-', '-', '2019-01-19', '2019-01-21', 1, 0, 233, '2019-01-19 13:14:09', '2019-01-19 13:14:09'),
(35, '-', '-', '2019-01-19', '2019-01-21', 1, 0, 231, '2019-01-19 13:14:38', '2019-01-19 13:14:38'),
(36, '-', '-', '2019-01-22', '2019-01-23', 1, 0, 850, '2019-01-22 02:05:24', '2019-01-22 02:05:24'),
(37, '-', '-', '2019-01-22', '2019-02-13', 1, 0, 160, '2019-01-22 04:48:44', '2019-01-22 04:48:44'),
(38, '-', '-', '2019-01-22', '2019-02-13', 1, 0, 161, '2019-01-22 04:48:53', '2019-01-22 04:48:53'),
(39, '-', '-', '2019-01-23', '2019-01-23', 1, 0, 873, '2019-01-23 01:48:41', '2019-01-23 01:48:41'),
(40, '-', '-', '2019-01-23', '2019-01-23', 1, 0, 874, '2019-01-23 01:48:43', '2019-01-23 01:48:43'),
(41, '-', '-', '2019-01-23', '2019-01-23', 1, 0, 875, '2019-01-23 01:48:47', '2019-01-23 01:48:47'),
(42, '-', '-', '2019-01-23', '2019-01-24', 1, 0, 854, '2019-01-23 03:18:30', '2019-01-23 03:18:30'),
(43, '-', '-', '2019-01-23', '2019-02-23', 1, 0, 879, '2019-01-23 04:39:57', '2019-01-23 04:39:57'),
(44, '-', '-', '2019-01-23', '2019-02-23', 1, 0, 880, '2019-01-23 04:40:11', '2019-01-23 04:40:11'),
(45, '-', '-', '2019-01-23', '2019-02-13', 1, 0, 168, '2019-01-23 06:50:52', '2019-01-23 06:50:52'),
(46, '-', '-', '2019-01-23', '2019-01-25', 1, 0, 830, '2019-01-23 06:51:16', '2019-01-23 06:51:16'),
(47, '-', '-', '2019-01-23', '2019-02-13', 1, 0, 169, '2019-01-23 06:51:48', '2019-01-23 06:51:48'),
(48, '-', '-', '2019-01-23', '2019-02-13', 1, 0, 172, '2019-01-23 06:52:18', '2019-01-23 06:52:18'),
(49, '-', '-', '2019-01-23', '2019-02-13', 1, 0, 166, '2019-01-23 06:52:46', '2019-01-23 06:52:46'),
(50, '-', '-', '2019-01-23', '2019-02-13', 1, 0, 175, '2019-01-23 06:53:10', '2019-01-23 06:53:10'),
(51, '-', '-', '2019-01-23', '2020-01-23', 1, 0, 585, '2019-01-23 07:30:53', '2019-01-23 07:30:53'),
(52, '-', '-', '2019-01-23', '2020-01-23', 1, 0, 708, '2019-01-23 08:36:15', '2019-01-23 08:36:15'),
(53, '-', '-', '2019-01-23', '2019-01-23', 1, 0, 883, '2019-01-23 08:51:35', '2019-01-23 08:51:36'),
(54, '-', '-', '2019-01-24', '2019-02-14', 1, 0, 216, '2019-01-24 06:04:50', '2019-01-24 06:04:50'),
(55, '-', '-', '2019-01-24', '2019-01-24', 1, 0, 856, '2019-01-24 07:16:55', '2019-01-24 07:16:55'),
(56, '-', '-', '2019-01-24', '2019-01-25', 1, 0, 328, '2019-01-24 07:42:59', '2019-01-24 07:42:59'),
(57, '-', '-', '2019-01-25', '2019-01-25', 1, 0, 329, '2019-01-25 02:40:08', '2019-01-25 02:40:08'),
(58, '-', '-', '2019-01-25', '2020-01-25', 1, 0, 681, '2019-01-25 06:24:55', '2019-01-25 06:24:55'),
(59, '-', '-', '2019-01-28', '2019-01-29', 1, 0, 898, '2019-01-28 07:38:19', '2019-01-28 07:38:19'),
(60, '-', '-', '2019-01-28', '2019-01-29', 1, 0, 899, '2019-01-28 07:38:39', '2019-01-28 07:38:39'),
(61, '-', '-', '2019-01-28', '2019-01-29', 1, 0, 900, '2019-01-28 07:38:57', '2019-01-28 07:38:57'),
(62, '-', '-', '2019-01-28', '2019-01-29', 1, 0, 920, '2019-01-28 13:21:29', '2019-01-28 13:21:29'),
(63, '-', '-', '2019-01-28', '2019-02-13', 1, 0, 167, '2019-01-28 16:17:07', '2019-01-28 16:17:07'),
(64, '-', '-', '2019-01-29', '2019-02-25', 1, 0, 894, '2019-01-29 05:45:40', '2019-01-29 05:45:40'),
(65, '-', '-', '2019-01-29', '2019-02-13', 1, 0, 163, '2019-01-29 16:40:59', '2019-01-29 16:40:59'),
(66, '-', '-', '2019-02-20', '2019-02-28', 1, 0, 926, '2019-02-20 03:31:02', '2019-02-20 03:31:03'),
(67, '-', '-', '2019-03-04', '2019-03-04', 1, 0, 958, '2019-03-04 02:45:11', '2019-03-04 02:45:11'),
(68, '-', '-', '2019-03-15', '2019-03-15', 1, 0, 959, '2019-03-15 01:43:09', '2019-03-15 01:43:10');

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `id` int(10) UNSIGNED NOT NULL,
  `kegiatan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggalMulai` date NOT NULL,
  `tanggalBerakhir` date NOT NULL,
  `jamMasuk` time NOT NULL,
  `jamKeluar` time NOT NULL,
  `idSuratMasuk` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pekerjaan`
--

INSERT INTO `pekerjaan` (`id`, `kegiatan`, `tanggalMulai`, `tanggalBerakhir`, `jamMasuk`, `jamKeluar`, `idSuratMasuk`, `created_at`, `updated_at`) VALUES
(4, 'Site Audit Optimasi NPM H3I Colo TELKOM', '2019-01-07', '2019-02-07', '08:00:00', '17:00:00', 5, '2019-01-07 08:05:13', '2019-01-07 08:05:13'),
(5, 'Troubleshooting 1x100G Et-1/0/5 On R5.MLG.ASBR-TSEL.1', '2019-01-07', '2019-01-08', '20:00:00', '06:00:00', 6, '2019-01-07 08:23:41', '2019-01-07 08:23:41'),
(6, 'Validasi, Migrasi DSLAM Indoor Dan Primer Tembaga Ke New MDU Indoor', '2019-01-09', '2019-01-31', '08:00:00', '17:00:00', 7, '2019-01-08 07:37:16', '2019-01-08 07:37:16'),
(7, 'Survey Proyek Pengadaan Dan Pemasangan Perangkat DWDM Platform ZTE SS#1 NARU 2018', '2019-01-09', '2019-01-11', '08:00:00', '17:00:00', 8, '2019-01-08 07:47:01', '2019-01-08 07:47:01'),
(8, 'Sinkronisasi Dan Upgrading', '2019-01-09', '2019-01-10', '08:00:00', '17:00:00', 9, '2019-01-08 07:55:58', '2019-01-08 07:55:58'),
(9, 'Ekerjaan Add RRU, Dismantle Feeders Dan Add Antenna XL Colo TELKOM', '2019-01-09', '2019-02-08', '08:00:00', '17:00:00', 10, '2019-01-09 00:57:58', '2019-01-09 00:57:58'),
(10, 'Instalasi Bundle Cord FTM', '2019-01-09', '2019-02-07', '08:00:00', '17:00:00', 11, '2019-01-09 08:32:19', '2019-01-09 08:32:19'),
(11, 'Maintenance & Troubleshooting Perangkat Telkomsel', '2019-01-09', '2019-01-31', '08:00:00', '17:00:00', 12, '2019-01-09 08:49:59', '2019-01-09 08:49:59'),
(12, 'Pengambilan Modul ASBR', '2019-01-09', '2019-01-10', '20:00:00', '06:00:00', 13, '2019-01-09 09:05:44', '2019-01-09 09:05:44'),
(13, 'Maintenance Dan Instalasi Server', '2019-01-11', '2019-01-12', '08:00:00', '17:00:00', 14, '2019-01-10 01:16:26', '2019-01-10 01:16:26'),
(14, 'Aktivasi Feeder Project FTTH Galaxy Mall 3', '2019-01-10', '2019-01-25', '08:00:00', '17:00:00', 15, '2019-01-10 03:25:08', '2019-01-10 03:25:08'),
(15, 'Troubleshooting Gangguan DWDM M920 Node', '2019-01-10', '2019-01-17', '08:00:00', '17:00:00', 16, '2019-01-10 04:07:57', '2019-01-10 04:07:57'),
(16, 'Dismantling Server Axiros', '2019-01-11', '2019-01-18', '08:00:00', '17:00:00', 17, '2019-01-11 07:16:50', '2019-01-11 07:16:50'),
(17, 'Maintenance Dan Troubleshooting Perangkat', '2019-01-11', '2019-01-31', '08:00:00', '17:00:00', 18, '2019-01-14 01:19:48', '2019-01-14 01:19:48'),
(18, 'Validasi Pekerjaan Pengadaan Dan Pemasangan Modernisasi Paket -3 Granular Area Gubeng', '2019-01-14', '2019-02-13', '00:00:00', '23:59:00', 19, '2019-01-14 01:37:14', '2019-01-14 01:37:14'),
(19, 'Perbaikan Genset Mobile', '2019-01-14', '2019-01-18', '08:00:00', '17:00:00', 20, '2019-01-14 03:41:18', '2019-01-14 03:41:18'),
(20, 'Site Audit Dan Physical Tuning XL Colo TELKOM', '2019-01-14', '2019-02-14', '08:00:00', '17:00:00', 21, '2019-01-14 04:43:28', '2019-01-14 04:43:28'),
(21, 'Comm Test Upgrade Dan Segment Test Pekerjaan SKKL IGG', '2019-01-14', '2019-01-22', '08:00:00', '17:00:00', 22, '2019-01-14 05:32:04', '2019-01-14 05:32:04'),
(22, 'Pengadaan Dan Pemasangan Modernisasi Granular Periode Januari-Februari 2019', '2019-01-14', '2019-02-14', '00:00:00', '23:59:00', 23, '2019-01-14 08:05:40', '2019-01-14 08:05:40'),
(23, 'Relokasi Battere', '2019-01-15', '2019-01-19', '08:00:00', '17:00:00', 24, '2019-01-15 01:22:38', '2019-01-15 01:22:38'),
(24, 'Penyekatan Ruang FTM', '2019-01-15', '2019-01-21', '00:00:00', '23:59:00', 25, '2019-01-15 04:38:58', '2019-01-19 12:50:03'),
(25, 'Instalasi Penarikan FO, OTB & ODP Di Rack XL Colo TELKOM', '2019-01-15', '2019-02-15', '08:00:00', '17:00:00', 26, '2019-01-15 08:18:50', '2019-01-15 08:18:50'),
(26, 'Troubleshooting Routing-Engine – RE0 Pada Node R5.MLG.ASBR-TSEL.1', '2019-01-15', '2019-01-16', '20:00:00', '06:00:00', 27, '2019-01-15 09:04:54', '2019-01-16 01:09:53'),
(27, 'Penggantian Power Supply Server Middleware Aptilo', '2019-01-16', '2019-01-25', '08:00:00', '17:00:00', 28, '2019-01-16 01:43:02', '2019-01-16 01:43:02'),
(28, 'Survey New Node, Instalasi & Commtest SP#1 Pengadaan Dan Pemasangan Ekspan PE Platform Juniper', '2019-01-16', '2019-02-16', '08:00:00', '17:00:00', 29, '2019-01-16 01:58:22', '2019-01-16 01:58:22'),
(29, 'Maintenance Dan Troubleshoot ISAT Colo TELKOM', '2019-01-16', '2019-02-15', '08:00:00', '17:00:00', 30, '2019-01-16 02:10:48', '2019-01-16 02:10:48'),
(30, 'Aktivasi Feeder Project FTTH Galaxy Mall 3', '2019-01-16', '2019-01-25', '08:00:00', '17:00:00', 31, '2019-01-16 03:06:00', '2019-01-16 03:06:00'),
(31, 'Maintenance Rutin (ophar) Perangkat Pelanggan Colocation Telkom', '2019-01-16', '2019-01-31', '00:00:00', '23:59:00', 32, '2019-01-16 03:21:04', '2019-01-16 03:21:04'),
(32, 'Perbaikan Cooling Tower', '2019-01-16', '2019-01-19', '08:00:00', '17:00:00', 33, '2019-01-16 03:28:14', '2019-01-16 03:28:14'),
(33, 'Survey Pengadaan Dan Pemasangan Metro Ethernet, BRAS, PCEF Dan PE Transit Platform Huawei Di STO Rungkut', '2019-01-17', '2019-01-31', '08:00:00', '17:00:00', 34, '2019-01-17 01:35:03', '2019-01-17 01:35:03'),
(34, 'Praktek Kerja Lapangan', '2019-01-14', '2019-04-12', '08:00:00', '17:00:00', 35, '2019-01-17 03:36:10', '2019-01-17 03:36:10'),
(36, 'Maintenance Server Perangkat CDN CinaNet', '2019-01-21', '2019-01-21', '07:30:00', '17:00:00', 37, '2019-01-21 07:46:17', '2019-01-21 07:46:17'),
(37, 'Survey Rack Penempatan Perangkat', '2019-01-21', '2019-01-23', '08:00:00', '17:00:00', 38, '2019-01-21 08:44:52', '2019-01-21 08:44:52'),
(38, 'Maintenance Server Perangkat CDN CinaNet', '2019-01-22', '2019-01-22', '09:30:00', '17:00:00', 39, '2019-01-22 03:01:47', '2019-01-22 03:01:47'),
(39, 'Maintenance UPS', '2019-01-23', '2019-01-24', '08:00:00', '17:00:00', 40, '2019-01-22 04:26:22', '2019-01-22 04:26:22'),
(40, 'Instalasi Bundle Core', '2019-01-22', '2019-02-21', '08:00:00', '17:00:00', 41, '2019-01-22 08:44:16', '2019-01-22 08:44:16'),
(41, 'Dismantle Perangkat', '2019-01-23', '2019-01-23', '08:30:00', '17:00:00', 42, '2019-01-23 01:45:48', '2019-01-23 01:45:48'),
(42, 'Survey Pengadaan Dan Pemasangan Metro Ethernet, BRAS, PCEF Dan PE Transit Platform Huawei Di STO Rungkut', '2019-01-23', '2019-02-23', '08:00:00', '17:00:00', 43, '2019-01-23 04:04:45', '2019-01-23 04:04:45'),
(43, 'Setup Dan Update Sistem', '2019-01-23', '2019-01-23', '08:30:00', '17:00:00', 44, '2019-01-23 08:46:15', '2019-01-23 08:46:15'),
(44, 'Dismantle Perangkat', '2019-01-24', '2019-01-31', '08:00:00', '17:00:00', 45, '2019-01-24 01:06:43', '2019-01-24 01:06:43'),
(45, 'MAINTENANCE FOR GFR ISAT Colo TELKOM', '2019-01-25', '2019-02-25', '08:00:00', '17:00:00', 46, '2019-01-25 03:59:15', '2019-01-25 03:59:15'),
(46, 'Survey Neucentrix', '2019-01-28', '2019-01-29', '08:00:00', '17:00:00', 47, '2019-01-28 01:15:47', '2019-01-28 01:15:47'),
(47, 'Preventive Maintenance Perangkat XL Colo Telkom', '2019-01-28', '2019-02-28', '08:00:00', '17:00:00', 48, '2019-01-28 04:33:15', '2019-01-28 04:33:15'),
(48, 'Preventif Maintenance Perangkat IMS Huawei Dan Replacing SPU Board', '2019-01-28', '2019-01-29', '20:00:00', '06:00:00', 49, '2019-01-28 09:23:52', '2019-01-28 09:23:52'),
(49, 'Survey, Installasi & Commtest Percepatan Implementasi NAT PE Indihome Rafi 2019', '2019-01-29', '2019-02-28', '08:00:00', '17:00:00', 50, '2019-01-29 01:45:17', '2019-01-29 01:45:17'),
(50, 'Pemasangan APAR', '2019-01-29', '2019-02-01', '08:00:00', '17:00:00', 51, '2019-01-29 04:17:56', '2019-01-29 04:17:56'),
(51, 'Pemasangan Jumper Grounding Busbar Perangkat Telkomsel Colo Telkom', '2019-01-30', '2019-02-15', '08:00:00', '17:00:00', 52, '2019-01-29 07:34:46', '2019-01-29 07:34:46'),
(52, 'Perapihan Saluran Kabel', '2019-01-30', '2019-02-06', '07:30:00', '17:00:00', 53, '2019-01-30 06:52:38', '2019-01-30 06:52:38'),
(53, 'PKL', '2019-03-04', '2019-03-04', '07:00:00', '09:50:00', 54, '2019-03-04 02:39:51', '2019-03-04 02:39:51'),
(54, 'Pkl', '2019-03-15', '2019-03-15', '08:00:00', '08:50:00', 55, '2019-03-15 01:40:48', '2019-03-15 01:40:48'),
(55, 'Pkl', '2019-03-19', '2019-03-19', '00:00:00', '16:00:00', 56, '2019-03-19 08:29:18', '2019-03-19 08:29:18');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(10) UNSIGNED NOT NULL,
  `idUser` int(10) UNSIGNED NOT NULL,
  `idPicTelkom` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `idUser`, `idPicTelkom`, `created_at`, `updated_at`) VALUES
(1, 72, 2, '2018-12-28 03:16:13', '2018-12-28 03:16:13'),
(2, 73, 10, '2018-12-28 03:41:55', '2018-12-28 03:41:55'),
(3, 74, 12, '2018-12-28 03:58:05', '2018-12-28 03:58:05'),
(4, 75, 14, '2019-01-14 03:46:55', '2019-01-14 03:46:55'),
(5, 76, 24, '2019-01-15 04:43:34', '2019-01-15 04:43:34'),
(6, 78, 1, '2019-02-18 03:24:12', '2019-02-18 03:24:12');

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id` int(10) UNSIGNED NOT NULL,
  `namaPerusahaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id`, `namaPerusahaan`, `created_at`, `updated_at`) VALUES
(1, 'Umum', NULL, NULL),
(2, 'Telkom Akses', NULL, NULL),
(3, 'SIGMA', NULL, NULL),
(4, 'TKM NETRA', NULL, NULL),
(5, 'MITRATEL', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id` int(10) UNSIGNED NOT NULL,
  `idPicMitra` int(10) UNSIGNED NOT NULL,
  `idSuratMasuk` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id`, `idPicMitra`, `idSuratMasuk`, `created_at`, `updated_at`) VALUES
(39, 38, 5, '2019-01-07 08:05:13', '2019-01-07 08:05:13'),
(40, 39, 5, '2019-01-07 08:05:13', '2019-01-07 08:05:13'),
(41, 40, 5, '2019-01-07 08:05:13', '2019-01-07 08:05:13'),
(42, 41, 5, '2019-01-07 08:05:13', '2019-01-07 08:05:13'),
(43, 42, 5, '2019-01-07 08:05:13', '2019-01-07 08:05:13'),
(44, 43, 5, '2019-01-07 08:05:13', '2019-01-07 08:05:13'),
(45, 44, 5, '2019-01-07 08:05:13', '2019-01-07 08:05:13'),
(46, 45, 5, '2019-01-07 08:05:13', '2019-01-07 08:05:13'),
(47, 46, 5, '2019-01-07 08:05:13', '2019-01-07 08:05:13'),
(48, 47, 5, '2019-01-07 08:05:13', '2019-01-07 08:05:13'),
(49, 48, 5, '2019-01-07 08:05:13', '2019-01-07 08:05:13'),
(50, 49, 5, '2019-01-07 08:05:13', '2019-01-07 08:05:13'),
(51, 50, 6, '2019-01-07 08:23:41', '2019-01-07 08:23:41'),
(52, 51, 6, '2019-01-07 08:23:41', '2019-01-07 08:23:41'),
(53, 52, 7, '2019-01-08 07:37:16', '2019-01-08 07:37:16'),
(54, 53, 7, '2019-01-08 07:37:16', '2019-01-08 07:37:16'),
(55, 54, 7, '2019-01-08 07:37:16', '2019-01-08 07:37:16'),
(56, 55, 7, '2019-01-08 07:37:16', '2019-01-08 07:37:16'),
(57, 56, 7, '2019-01-08 07:37:16', '2019-01-08 07:37:16'),
(58, 57, 7, '2019-01-08 07:37:16', '2019-01-08 07:37:16'),
(59, 58, 7, '2019-01-08 07:37:16', '2019-01-08 07:37:16'),
(60, 59, 7, '2019-01-08 07:37:16', '2019-01-08 07:37:16'),
(61, 60, 7, '2019-01-08 07:37:16', '2019-01-08 07:37:16'),
(62, 61, 7, '2019-01-08 07:37:16', '2019-01-08 07:37:16'),
(63, 62, 8, '2019-01-08 07:47:01', '2019-01-08 07:47:01'),
(64, 63, 8, '2019-01-08 07:47:01', '2019-01-08 07:47:01'),
(65, 64, 8, '2019-01-08 07:47:01', '2019-01-08 07:47:01'),
(66, 65, 8, '2019-01-08 07:47:01', '2019-01-08 07:47:01'),
(67, 66, 8, '2019-01-08 07:47:01', '2019-01-08 07:47:01'),
(68, 67, 9, '2019-01-08 07:55:58', '2019-01-08 07:55:58'),
(69, 68, 9, '2019-01-08 07:55:58', '2019-01-08 07:55:58'),
(70, 69, 10, '2019-01-09 00:57:58', '2019-01-09 00:57:58'),
(71, 70, 10, '2019-01-09 00:57:58', '2019-01-09 00:57:58'),
(72, 71, 10, '2019-01-09 00:57:58', '2019-01-09 00:57:58'),
(73, 72, 10, '2019-01-09 00:57:58', '2019-01-09 00:57:58'),
(74, 73, 10, '2019-01-09 00:57:58', '2019-01-09 00:57:58'),
(75, 74, 10, '2019-01-09 00:57:58', '2019-01-09 00:57:58'),
(76, 75, 10, '2019-01-09 00:57:58', '2019-01-09 00:57:58'),
(77, 76, 10, '2019-01-09 00:57:58', '2019-01-09 00:57:58'),
(78, 77, 11, '2019-01-09 08:32:19', '2019-01-09 08:32:19'),
(79, 78, 11, '2019-01-09 08:32:19', '2019-01-09 08:32:19'),
(80, 79, 11, '2019-01-09 08:32:19', '2019-01-09 08:32:19'),
(81, 80, 11, '2019-01-09 08:32:19', '2019-01-09 08:32:19'),
(82, 81, 11, '2019-01-09 08:32:19', '2019-01-09 08:32:19'),
(83, 82, 11, '2019-01-09 08:32:19', '2019-01-09 08:32:19'),
(84, 83, 11, '2019-01-09 08:32:19', '2019-01-09 08:32:19'),
(85, 84, 11, '2019-01-09 08:32:19', '2019-01-09 08:32:19'),
(86, 85, 11, '2019-01-09 08:32:19', '2019-01-09 08:32:19'),
(87, 86, 11, '2019-01-09 08:32:19', '2019-01-09 08:32:19'),
(88, 87, 12, '2019-01-09 08:49:59', '2019-01-09 08:49:59'),
(89, 88, 12, '2019-01-09 08:49:59', '2019-01-09 08:49:59'),
(90, 89, 12, '2019-01-09 08:49:59', '2019-01-09 08:49:59'),
(91, 90, 12, '2019-01-09 08:49:59', '2019-01-09 08:49:59'),
(92, 91, 12, '2019-01-09 08:49:59', '2019-01-09 08:49:59'),
(93, 92, 12, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(94, 93, 12, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(95, 94, 12, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(96, 95, 12, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(97, 96, 12, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(98, 97, 12, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(99, 98, 12, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(100, 99, 12, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(101, 100, 12, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(102, 101, 12, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(103, 102, 12, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(104, 103, 12, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(105, 104, 12, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(106, 105, 12, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(107, 106, 12, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(108, 107, 12, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(109, 108, 12, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(110, 109, 12, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(111, 110, 12, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(112, 111, 12, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(113, 112, 12, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(114, 113, 12, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(115, 114, 12, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(116, 115, 12, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(117, 116, 12, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(118, 117, 12, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(119, 118, 12, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(120, 119, 12, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(121, 120, 12, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(122, 121, 12, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(123, 122, 12, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(124, 123, 12, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(125, 124, 12, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(126, 125, 12, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(127, 126, 12, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(128, 127, 12, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(129, 128, 12, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(130, 129, 12, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(131, 130, 12, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(132, 131, 12, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(133, 132, 12, '2019-01-09 08:50:01', '2019-01-09 08:50:01'),
(134, 133, 12, '2019-01-09 08:50:01', '2019-01-09 08:50:01'),
(135, 134, 12, '2019-01-09 08:50:01', '2019-01-09 08:50:01'),
(136, 135, 12, '2019-01-09 08:50:01', '2019-01-09 08:50:01'),
(137, 136, 12, '2019-01-09 08:50:01', '2019-01-09 08:50:01'),
(138, 137, 12, '2019-01-09 08:50:01', '2019-01-09 08:50:01'),
(139, 138, 12, '2019-01-09 08:50:01', '2019-01-09 08:50:01'),
(140, 139, 12, '2019-01-09 08:50:01', '2019-01-09 08:50:01'),
(141, 140, 12, '2019-01-09 08:50:01', '2019-01-09 08:50:01'),
(142, 141, 12, '2019-01-09 08:50:01', '2019-01-09 08:50:01'),
(143, 142, 12, '2019-01-09 08:50:01', '2019-01-09 08:50:01'),
(144, 143, 13, '2019-01-09 09:05:44', '2019-01-09 09:05:44'),
(145, 144, 13, '2019-01-09 09:05:44', '2019-01-09 09:05:44'),
(146, 145, 14, '2019-01-10 01:16:26', '2019-01-10 01:16:26'),
(147, 146, 15, '2019-01-10 03:25:08', '2019-01-10 03:25:08'),
(148, 147, 15, '2019-01-10 03:25:08', '2019-01-10 03:25:08'),
(149, 148, 15, '2019-01-10 03:25:08', '2019-01-10 03:25:08'),
(150, 149, 15, '2019-01-10 03:25:08', '2019-01-10 03:25:08'),
(151, 150, 15, '2019-01-10 03:25:08', '2019-01-10 03:25:08'),
(152, 151, 16, '2019-01-10 04:07:57', '2019-01-10 04:07:57'),
(153, 152, 16, '2019-01-10 04:07:57', '2019-01-10 04:07:57'),
(154, 153, 17, '2019-01-11 07:16:50', '2019-01-11 07:16:50'),
(155, 154, 18, '2019-01-14 01:19:48', '2019-01-14 01:19:48'),
(156, 155, 18, '2019-01-14 01:19:48', '2019-01-14 01:19:48'),
(157, 156, 18, '2019-01-14 01:19:48', '2019-01-14 01:19:48'),
(158, 157, 18, '2019-01-14 01:19:48', '2019-01-14 01:19:48'),
(159, 158, 18, '2019-01-14 01:19:48', '2019-01-14 01:19:48'),
(160, 159, 18, '2019-01-14 01:19:48', '2019-01-14 01:19:48'),
(161, 160, 19, '2019-01-14 01:37:14', '2019-01-14 01:37:14'),
(162, 161, 19, '2019-01-14 01:37:14', '2019-01-14 01:37:14'),
(163, 162, 19, '2019-01-14 01:37:14', '2019-01-14 01:37:14'),
(164, 163, 19, '2019-01-14 01:37:14', '2019-01-14 01:37:14'),
(165, 164, 19, '2019-01-14 01:37:14', '2019-01-14 01:37:14'),
(166, 165, 19, '2019-01-14 01:37:14', '2019-01-14 01:37:14'),
(167, 166, 19, '2019-01-14 01:37:14', '2019-01-14 01:37:14'),
(168, 167, 19, '2019-01-14 01:37:14', '2019-01-14 01:37:14'),
(169, 168, 19, '2019-01-14 01:37:14', '2019-01-14 01:37:14'),
(170, 169, 19, '2019-01-14 01:37:14', '2019-01-14 01:37:14'),
(171, 170, 19, '2019-01-14 01:37:14', '2019-01-14 01:37:14'),
(172, 171, 19, '2019-01-14 01:37:14', '2019-01-14 01:37:14'),
(173, 172, 19, '2019-01-14 01:37:14', '2019-01-14 01:37:14'),
(174, 173, 19, '2019-01-14 01:37:14', '2019-01-14 01:37:14'),
(175, 174, 19, '2019-01-14 01:37:14', '2019-01-14 01:37:14'),
(176, 175, 19, '2019-01-14 01:37:14', '2019-01-14 01:37:14'),
(177, 176, 19, '2019-01-14 01:37:14', '2019-01-14 01:37:14'),
(178, 177, 19, '2019-01-14 01:37:14', '2019-01-14 01:37:14'),
(179, 178, 19, '2019-01-14 01:37:14', '2019-01-14 01:37:14'),
(180, 179, 19, '2019-01-14 01:37:14', '2019-01-14 01:37:14'),
(181, 180, 19, '2019-01-14 01:37:14', '2019-01-14 01:37:14'),
(182, 181, 20, '2019-01-14 03:41:18', '2019-01-14 03:41:18'),
(183, 182, 20, '2019-01-14 03:41:18', '2019-01-14 03:41:18'),
(184, 183, 20, '2019-01-14 03:41:18', '2019-01-14 03:41:18'),
(185, 184, 21, '2019-01-14 04:43:28', '2019-01-14 04:43:28'),
(186, 185, 21, '2019-01-14 04:43:28', '2019-01-14 04:43:28'),
(187, 186, 21, '2019-01-14 04:43:28', '2019-01-14 04:43:28'),
(188, 187, 21, '2019-01-14 04:43:28', '2019-01-14 04:43:28'),
(189, 188, 21, '2019-01-14 04:43:28', '2019-01-14 04:43:28'),
(190, 189, 21, '2019-01-14 04:43:29', '2019-01-14 04:43:29'),
(191, 190, 22, '2019-01-14 05:32:04', '2019-01-14 05:32:04'),
(192, 191, 22, '2019-01-14 05:32:04', '2019-01-14 05:32:04'),
(193, 192, 22, '2019-01-14 05:32:04', '2019-01-14 05:32:04'),
(194, 193, 22, '2019-01-14 05:32:04', '2019-01-14 05:32:04'),
(195, 194, 22, '2019-01-14 05:32:04', '2019-01-14 05:32:04'),
(196, 195, 22, '2019-01-14 05:32:04', '2019-01-14 05:32:04'),
(197, 196, 22, '2019-01-14 05:32:04', '2019-01-14 05:32:04'),
(198, 197, 22, '2019-01-14 05:32:04', '2019-01-14 05:32:04'),
(199, 198, 22, '2019-01-14 05:32:04', '2019-01-14 05:32:04'),
(200, 199, 22, '2019-01-14 05:32:04', '2019-01-14 05:32:04'),
(201, 200, 22, '2019-01-14 05:32:04', '2019-01-14 05:32:04'),
(202, 201, 22, '2019-01-14 05:32:04', '2019-01-14 05:32:04'),
(203, 202, 22, '2019-01-14 05:32:05', '2019-01-14 05:32:05'),
(204, 203, 22, '2019-01-14 05:32:05', '2019-01-14 05:32:05'),
(205, 204, 22, '2019-01-14 05:32:05', '2019-01-14 05:32:05'),
(206, 205, 22, '2019-01-14 05:32:05', '2019-01-14 05:32:05'),
(207, 206, 22, '2019-01-14 05:32:05', '2019-01-14 05:32:05'),
(208, 207, 22, '2019-01-14 05:32:05', '2019-01-14 05:32:05'),
(209, 208, 22, '2019-01-14 05:32:05', '2019-01-14 05:32:05'),
(210, 209, 22, '2019-01-14 05:32:05', '2019-01-14 05:32:05'),
(211, 210, 22, '2019-01-14 05:32:05', '2019-01-14 05:32:05'),
(212, 211, 22, '2019-01-14 05:32:05', '2019-01-14 05:32:05'),
(213, 212, 22, '2019-01-14 05:32:05', '2019-01-14 05:32:05'),
(214, 213, 22, '2019-01-14 05:32:05', '2019-01-14 05:32:05'),
(215, 214, 22, '2019-01-14 05:32:05', '2019-01-14 05:32:05'),
(216, 215, 23, '2019-01-14 08:05:40', '2019-01-14 08:05:40'),
(217, 216, 23, '2019-01-14 08:05:40', '2019-01-14 08:05:40'),
(218, 217, 23, '2019-01-14 08:05:40', '2019-01-14 08:05:40'),
(219, 218, 23, '2019-01-14 08:05:40', '2019-01-14 08:05:40'),
(220, 219, 23, '2019-01-14 08:05:40', '2019-01-14 08:05:40'),
(221, 220, 23, '2019-01-14 08:05:40', '2019-01-14 08:05:40'),
(222, 221, 23, '2019-01-14 08:05:40', '2019-01-14 08:05:40'),
(223, 222, 24, '2019-01-15 01:22:38', '2019-01-15 01:22:38'),
(224, 223, 24, '2019-01-15 01:22:38', '2019-01-15 01:22:38'),
(225, 224, 24, '2019-01-15 01:22:39', '2019-01-15 01:22:39'),
(226, 225, 24, '2019-01-15 01:22:39', '2019-01-15 01:22:39'),
(227, 226, 24, '2019-01-15 01:22:39', '2019-01-15 01:22:39'),
(228, 227, 24, '2019-01-15 01:22:39', '2019-01-15 01:22:39'),
(229, 228, 24, '2019-01-15 01:22:39', '2019-01-15 01:22:39'),
(230, 229, 25, '2019-01-15 04:38:58', '2019-01-15 04:38:58'),
(231, 230, 25, '2019-01-15 04:38:58', '2019-01-15 04:38:58'),
(232, 231, 25, '2019-01-15 04:38:58', '2019-01-15 04:38:58'),
(233, 232, 25, '2019-01-15 04:38:58', '2019-01-15 04:38:58'),
(234, 233, 25, '2019-01-15 04:38:58', '2019-01-15 04:38:58'),
(235, 234, 26, '2019-01-15 08:18:50', '2019-01-15 08:18:50'),
(236, 235, 26, '2019-01-15 08:18:50', '2019-01-15 08:18:50'),
(237, 236, 26, '2019-01-15 08:18:50', '2019-01-15 08:18:50'),
(238, 237, 26, '2019-01-15 08:18:50', '2019-01-15 08:18:50'),
(239, 238, 26, '2019-01-15 08:18:50', '2019-01-15 08:18:50'),
(240, 239, 26, '2019-01-15 08:18:50', '2019-01-15 08:18:50'),
(241, 240, 26, '2019-01-15 08:18:50', '2019-01-15 08:18:50'),
(242, 241, 26, '2019-01-15 08:18:50', '2019-01-15 08:18:50'),
(243, 242, 26, '2019-01-15 08:18:50', '2019-01-15 08:18:50'),
(244, 243, 27, '2019-01-15 09:04:54', '2019-01-15 09:04:54'),
(246, 328, 28, '2019-01-16 01:43:02', '2019-01-16 01:43:02'),
(247, 329, 28, '2019-01-16 01:43:02', '2019-01-16 01:43:02'),
(248, 434, 29, '2019-01-16 01:58:22', '2019-01-16 01:58:22'),
(249, 435, 29, '2019-01-16 01:58:22', '2019-01-16 01:58:22'),
(250, 436, 29, '2019-01-16 01:58:22', '2019-01-16 01:58:22'),
(251, 437, 29, '2019-01-16 01:58:23', '2019-01-16 01:58:23'),
(252, 438, 29, '2019-01-16 01:58:23', '2019-01-16 01:58:23'),
(253, 439, 29, '2019-01-16 01:58:23', '2019-01-16 01:58:23'),
(254, 440, 29, '2019-01-16 01:58:23', '2019-01-16 01:58:23'),
(255, 441, 29, '2019-01-16 01:58:23', '2019-01-16 01:58:23'),
(256, 442, 29, '2019-01-16 01:58:23', '2019-01-16 01:58:23'),
(257, 443, 29, '2019-01-16 01:58:23', '2019-01-16 01:58:23'),
(258, 444, 29, '2019-01-16 01:58:23', '2019-01-16 01:58:23'),
(259, 445, 29, '2019-01-16 01:58:23', '2019-01-16 01:58:23'),
(260, 446, 29, '2019-01-16 01:58:23', '2019-01-16 01:58:23'),
(261, 447, 29, '2019-01-16 01:58:23', '2019-01-16 01:58:23'),
(262, 448, 29, '2019-01-16 01:58:23', '2019-01-16 01:58:23'),
(263, 449, 29, '2019-01-16 01:58:23', '2019-01-16 01:58:23'),
(264, 450, 29, '2019-01-16 01:58:23', '2019-01-16 01:58:23'),
(265, 451, 29, '2019-01-16 01:58:23', '2019-01-16 01:58:23'),
(266, 452, 29, '2019-01-16 01:58:23', '2019-01-16 01:58:23'),
(267, 453, 29, '2019-01-16 01:58:23', '2019-01-16 01:58:23'),
(268, 454, 29, '2019-01-16 01:58:23', '2019-01-16 01:58:23'),
(269, 455, 29, '2019-01-16 01:58:23', '2019-01-16 01:58:23'),
(270, 456, 29, '2019-01-16 01:58:23', '2019-01-16 01:58:23'),
(271, 457, 29, '2019-01-16 01:58:23', '2019-01-16 01:58:23'),
(272, 520, 30, '2019-01-16 02:10:48', '2019-01-16 02:10:48'),
(273, 521, 30, '2019-01-16 02:10:48', '2019-01-16 02:10:48'),
(274, 522, 30, '2019-01-16 02:10:48', '2019-01-16 02:10:48'),
(275, 523, 30, '2019-01-16 02:10:48', '2019-01-16 02:10:48'),
(276, 524, 30, '2019-01-16 02:10:48', '2019-01-16 02:10:48'),
(277, 525, 30, '2019-01-16 02:10:48', '2019-01-16 02:10:48'),
(278, 526, 30, '2019-01-16 02:10:48', '2019-01-16 02:10:48'),
(279, 527, 30, '2019-01-16 02:10:48', '2019-01-16 02:10:48'),
(280, 528, 30, '2019-01-16 02:10:48', '2019-01-16 02:10:48'),
(281, 529, 30, '2019-01-16 02:10:48', '2019-01-16 02:10:48'),
(282, 530, 30, '2019-01-16 02:10:48', '2019-01-16 02:10:48'),
(283, 531, 30, '2019-01-16 02:10:48', '2019-01-16 02:10:48'),
(284, 532, 30, '2019-01-16 02:10:48', '2019-01-16 02:10:48'),
(285, 533, 30, '2019-01-16 02:10:48', '2019-01-16 02:10:48'),
(286, 534, 30, '2019-01-16 02:10:48', '2019-01-16 02:10:48'),
(287, 535, 30, '2019-01-16 02:10:48', '2019-01-16 02:10:48'),
(288, 536, 30, '2019-01-16 02:10:48', '2019-01-16 02:10:48'),
(289, 537, 30, '2019-01-16 02:10:48', '2019-01-16 02:10:48'),
(290, 538, 30, '2019-01-16 02:10:49', '2019-01-16 02:10:49'),
(291, 539, 30, '2019-01-16 02:10:49', '2019-01-16 02:10:49'),
(292, 825, 31, '2019-01-16 03:06:00', '2019-01-16 03:06:00'),
(293, 826, 31, '2019-01-16 03:06:00', '2019-01-16 03:06:00'),
(294, 827, 31, '2019-01-16 03:06:00', '2019-01-16 03:06:00'),
(295, 828, 31, '2019-01-16 03:06:00', '2019-01-16 03:06:00'),
(296, 829, 31, '2019-01-16 03:06:00', '2019-01-16 03:06:00'),
(297, 830, 31, '2019-01-16 03:06:00', '2019-01-16 03:06:00'),
(298, 831, 31, '2019-01-16 03:06:00', '2019-01-16 03:06:00'),
(507, 832, 33, '2019-01-16 03:28:14', '2019-01-16 03:28:14'),
(508, 833, 33, '2019-01-16 03:28:14', '2019-01-16 03:28:14'),
(509, 834, 33, '2019-01-16 03:28:14', '2019-01-16 03:28:14'),
(510, 835, 33, '2019-01-16 03:28:14', '2019-01-16 03:28:14'),
(511, 836, 33, '2019-01-16 03:28:14', '2019-01-16 03:28:14'),
(512, 837, 33, '2019-01-16 03:28:14', '2019-01-16 03:28:14'),
(513, 838, 33, '2019-01-16 03:28:14', '2019-01-16 03:28:14'),
(514, 245, 32, '2019-01-16 03:34:27', '2019-01-16 03:34:27'),
(515, 246, 32, '2019-01-16 03:34:27', '2019-01-16 03:34:27'),
(516, 247, 32, '2019-01-16 03:34:27', '2019-01-16 03:34:27'),
(517, 248, 32, '2019-01-16 03:34:27', '2019-01-16 03:34:27'),
(518, 249, 32, '2019-01-16 03:34:27', '2019-01-16 03:34:27'),
(519, 250, 32, '2019-01-16 03:34:27', '2019-01-16 03:34:27'),
(520, 251, 32, '2019-01-16 03:34:27', '2019-01-16 03:34:27'),
(521, 252, 32, '2019-01-16 03:34:27', '2019-01-16 03:34:27'),
(522, 253, 32, '2019-01-16 03:34:27', '2019-01-16 03:34:27'),
(523, 254, 32, '2019-01-16 03:34:27', '2019-01-16 03:34:27'),
(524, 255, 32, '2019-01-16 03:34:27', '2019-01-16 03:34:27'),
(525, 256, 32, '2019-01-16 03:34:27', '2019-01-16 03:34:27'),
(526, 257, 32, '2019-01-16 03:34:27', '2019-01-16 03:34:27'),
(527, 258, 32, '2019-01-16 03:34:27', '2019-01-16 03:34:27'),
(528, 259, 32, '2019-01-16 03:34:27', '2019-01-16 03:34:27'),
(529, 260, 32, '2019-01-16 03:34:27', '2019-01-16 03:34:27'),
(530, 261, 32, '2019-01-16 03:34:27', '2019-01-16 03:34:27'),
(531, 262, 32, '2019-01-16 03:34:27', '2019-01-16 03:34:27'),
(532, 263, 32, '2019-01-16 03:34:27', '2019-01-16 03:34:27'),
(533, 264, 32, '2019-01-16 03:34:27', '2019-01-16 03:34:27'),
(534, 265, 32, '2019-01-16 03:34:27', '2019-01-16 03:34:27'),
(535, 266, 32, '2019-01-16 03:34:27', '2019-01-16 03:34:27'),
(536, 267, 32, '2019-01-16 03:34:27', '2019-01-16 03:34:27'),
(537, 268, 32, '2019-01-16 03:34:27', '2019-01-16 03:34:27'),
(538, 269, 32, '2019-01-16 03:34:27', '2019-01-16 03:34:27'),
(539, 270, 32, '2019-01-16 03:34:27', '2019-01-16 03:34:27'),
(540, 271, 32, '2019-01-16 03:34:27', '2019-01-16 03:34:27'),
(541, 272, 32, '2019-01-16 03:34:27', '2019-01-16 03:34:27'),
(542, 273, 32, '2019-01-16 03:34:27', '2019-01-16 03:34:27'),
(543, 274, 32, '2019-01-16 03:34:27', '2019-01-16 03:34:27'),
(544, 275, 32, '2019-01-16 03:34:27', '2019-01-16 03:34:27'),
(545, 556, 32, '2019-01-16 03:34:27', '2019-01-16 03:34:27'),
(546, 558, 32, '2019-01-16 03:34:27', '2019-01-16 03:34:27'),
(547, 561, 32, '2019-01-16 03:34:27', '2019-01-16 03:34:27'),
(548, 563, 32, '2019-01-16 03:34:27', '2019-01-16 03:34:27'),
(549, 566, 32, '2019-01-16 03:34:27', '2019-01-16 03:34:27'),
(550, 568, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(551, 571, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(552, 573, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(553, 577, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(554, 580, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(555, 583, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(556, 585, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(557, 588, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(558, 590, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(559, 591, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(560, 593, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(561, 595, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(562, 598, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(563, 601, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(564, 604, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(565, 607, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(566, 610, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(567, 613, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(568, 614, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(569, 617, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(570, 620, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(571, 622, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(572, 626, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(573, 628, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(574, 631, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(575, 637, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(576, 640, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(577, 642, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(578, 644, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(579, 646, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(580, 648, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(581, 650, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(582, 652, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(583, 657, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(584, 659, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(585, 660, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(586, 661, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(587, 662, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(588, 663, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(589, 664, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(590, 665, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(591, 666, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(592, 667, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(593, 736, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(594, 740, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(595, 743, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(596, 748, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(597, 750, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(598, 753, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(599, 756, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(600, 760, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(601, 767, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(602, 770, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(603, 772, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(604, 778, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(605, 779, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(606, 782, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(607, 785, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(608, 791, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(609, 793, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(610, 796, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(611, 799, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(612, 802, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(613, 806, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(614, 808, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(615, 810, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(616, 813, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(617, 815, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(618, 817, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(619, 818, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(620, 819, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(621, 820, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(622, 822, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(623, 821, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(624, 823, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(625, 824, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(626, 697, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(627, 698, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(628, 699, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(629, 700, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(630, 702, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(631, 705, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(632, 706, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(633, 707, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(634, 708, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(635, 709, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(636, 710, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(637, 711, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(638, 712, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(639, 715, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(640, 717, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(641, 719, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(642, 721, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(643, 723, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(644, 725, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(645, 727, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(646, 730, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(647, 732, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(648, 734, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(649, 737, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(650, 738, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(651, 741, 32, '2019-01-16 03:34:28', '2019-01-16 03:34:28'),
(652, 744, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(653, 747, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(654, 749, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(655, 751, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(656, 752, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(657, 755, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(658, 758, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(659, 761, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(660, 763, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(661, 765, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(662, 769, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(663, 771, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(664, 773, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(665, 774, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(666, 776, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(667, 777, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(668, 781, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(669, 784, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(670, 787, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(671, 789, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(672, 794, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(673, 797, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(674, 800, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(675, 803, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(676, 805, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(677, 807, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(678, 809, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(679, 811, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(680, 814, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(681, 816, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(682, 671, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(683, 673, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(684, 675, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(685, 676, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(686, 679, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(687, 681, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(688, 701, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(689, 703, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(690, 704, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(691, 683, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(692, 685, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(693, 687, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(694, 713, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(695, 714, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(696, 716, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(697, 718, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(698, 720, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(699, 722, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(700, 724, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(701, 726, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(702, 728, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(703, 729, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(704, 731, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(705, 733, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(706, 735, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(707, 739, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(708, 742, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(709, 745, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(710, 746, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(711, 812, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(712, 754, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(713, 757, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(714, 759, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(715, 762, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(716, 764, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(717, 766, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(718, 768, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(719, 775, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(720, 780, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(721, 783, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(722, 786, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(723, 788, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(724, 790, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(725, 792, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(726, 795, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(727, 798, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(728, 801, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(729, 804, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(730, 690, 32, '2019-01-16 03:34:29', '2019-01-16 03:34:29'),
(731, 839, 34, '2019-01-17 01:35:03', '2019-01-17 01:35:03'),
(732, 840, 34, '2019-01-17 01:35:03', '2019-01-17 01:35:03'),
(733, 841, 34, '2019-01-17 01:35:03', '2019-01-17 01:35:03'),
(734, 842, 35, '2019-01-17 03:36:10', '2019-01-17 03:36:10'),
(735, 843, 35, '2019-01-17 03:36:10', '2019-01-17 03:36:10'),
(736, 844, 35, '2019-01-17 03:36:10', '2019-01-17 03:36:10'),
(741, 849, 37, '2019-01-21 07:46:17', '2019-01-21 07:46:17'),
(742, 850, 38, '2019-01-21 08:44:52', '2019-01-21 08:44:52'),
(743, 851, 38, '2019-01-21 08:44:52', '2019-01-21 08:44:52'),
(744, 852, 38, '2019-01-21 08:44:52', '2019-01-21 08:44:52'),
(745, 853, 39, '2019-01-22 03:01:47', '2019-01-22 03:01:47'),
(746, 854, 40, '2019-01-22 04:26:22', '2019-01-22 04:26:22'),
(747, 855, 40, '2019-01-22 04:26:22', '2019-01-22 04:26:22'),
(748, 856, 40, '2019-01-22 04:26:22', '2019-01-22 04:26:22'),
(749, 857, 41, '2019-01-22 08:44:16', '2019-01-22 08:44:16'),
(750, 858, 41, '2019-01-22 08:44:16', '2019-01-22 08:44:16'),
(751, 859, 41, '2019-01-22 08:44:16', '2019-01-22 08:44:16'),
(752, 860, 41, '2019-01-22 08:44:16', '2019-01-22 08:44:16'),
(753, 861, 41, '2019-01-22 08:44:16', '2019-01-22 08:44:16'),
(754, 862, 41, '2019-01-22 08:44:16', '2019-01-22 08:44:16'),
(755, 863, 41, '2019-01-22 08:44:16', '2019-01-22 08:44:16'),
(756, 864, 41, '2019-01-22 08:44:16', '2019-01-22 08:44:16'),
(757, 865, 41, '2019-01-22 08:44:16', '2019-01-22 08:44:16'),
(758, 866, 41, '2019-01-22 08:44:16', '2019-01-22 08:44:16'),
(759, 867, 41, '2019-01-22 08:44:16', '2019-01-22 08:44:16'),
(760, 868, 41, '2019-01-22 08:44:16', '2019-01-22 08:44:16'),
(761, 869, 41, '2019-01-22 08:44:17', '2019-01-22 08:44:17'),
(762, 870, 41, '2019-01-22 08:44:17', '2019-01-22 08:44:17'),
(763, 871, 41, '2019-01-22 08:44:17', '2019-01-22 08:44:17'),
(764, 872, 41, '2019-01-22 08:44:17', '2019-01-22 08:44:17'),
(765, 873, 42, '2019-01-23 01:45:48', '2019-01-23 01:45:48'),
(766, 874, 42, '2019-01-23 01:45:48', '2019-01-23 01:45:48'),
(767, 875, 42, '2019-01-23 01:45:48', '2019-01-23 01:45:48'),
(768, 876, 43, '2019-01-23 04:04:45', '2019-01-23 04:04:45'),
(769, 877, 43, '2019-01-23 04:04:45', '2019-01-23 04:04:45'),
(770, 878, 43, '2019-01-23 04:04:45', '2019-01-23 04:04:45'),
(771, 879, 43, '2019-01-23 04:04:45', '2019-01-23 04:04:45'),
(772, 880, 43, '2019-01-23 04:04:45', '2019-01-23 04:04:45'),
(773, 881, 43, '2019-01-23 04:04:45', '2019-01-23 04:04:45'),
(774, 882, 43, '2019-01-23 04:04:45', '2019-01-23 04:04:45'),
(775, 883, 44, '2019-01-23 08:46:15', '2019-01-23 08:46:15'),
(776, 884, 45, '2019-01-24 01:06:43', '2019-01-24 01:06:43'),
(777, 885, 46, '2019-01-25 03:59:15', '2019-01-25 03:59:15'),
(778, 886, 46, '2019-01-25 03:59:15', '2019-01-25 03:59:15'),
(779, 887, 46, '2019-01-25 03:59:15', '2019-01-25 03:59:15'),
(780, 888, 46, '2019-01-25 03:59:16', '2019-01-25 03:59:16'),
(781, 889, 46, '2019-01-25 03:59:16', '2019-01-25 03:59:16'),
(782, 890, 46, '2019-01-25 03:59:16', '2019-01-25 03:59:16'),
(783, 891, 46, '2019-01-25 03:59:16', '2019-01-25 03:59:16'),
(784, 892, 46, '2019-01-25 03:59:16', '2019-01-25 03:59:16'),
(785, 893, 46, '2019-01-25 03:59:16', '2019-01-25 03:59:16'),
(786, 894, 46, '2019-01-25 03:59:16', '2019-01-25 03:59:16'),
(787, 895, 46, '2019-01-25 03:59:16', '2019-01-25 03:59:16'),
(788, 896, 46, '2019-01-25 03:59:16', '2019-01-25 03:59:16'),
(789, 897, 46, '2019-01-25 03:59:16', '2019-01-25 03:59:16'),
(790, 898, 47, '2019-01-28 01:15:47', '2019-01-28 01:15:47'),
(791, 899, 47, '2019-01-28 01:15:47', '2019-01-28 01:15:47'),
(792, 900, 47, '2019-01-28 01:15:47', '2019-01-28 01:15:47'),
(793, 901, 48, '2019-01-28 04:33:15', '2019-01-28 04:33:15'),
(794, 902, 48, '2019-01-28 04:33:15', '2019-01-28 04:33:15'),
(795, 903, 48, '2019-01-28 04:33:15', '2019-01-28 04:33:15'),
(796, 904, 48, '2019-01-28 04:33:15', '2019-01-28 04:33:15'),
(797, 905, 48, '2019-01-28 04:33:15', '2019-01-28 04:33:15'),
(798, 906, 48, '2019-01-28 04:33:15', '2019-01-28 04:33:15'),
(799, 907, 48, '2019-01-28 04:33:15', '2019-01-28 04:33:15'),
(800, 908, 48, '2019-01-28 04:33:15', '2019-01-28 04:33:15'),
(801, 909, 48, '2019-01-28 04:33:16', '2019-01-28 04:33:16'),
(802, 910, 48, '2019-01-28 04:33:16', '2019-01-28 04:33:16'),
(803, 911, 48, '2019-01-28 04:33:16', '2019-01-28 04:33:16'),
(804, 912, 48, '2019-01-28 04:33:16', '2019-01-28 04:33:16'),
(805, 913, 48, '2019-01-28 04:33:16', '2019-01-28 04:33:16'),
(806, 914, 48, '2019-01-28 04:33:16', '2019-01-28 04:33:16'),
(807, 915, 48, '2019-01-28 04:33:16', '2019-01-28 04:33:16'),
(808, 916, 48, '2019-01-28 04:33:16', '2019-01-28 04:33:16'),
(809, 917, 48, '2019-01-28 04:33:16', '2019-01-28 04:33:16'),
(810, 918, 48, '2019-01-28 04:33:16', '2019-01-28 04:33:16'),
(811, 919, 48, '2019-01-28 04:33:16', '2019-01-28 04:33:16'),
(812, 920, 49, '2019-01-28 09:23:52', '2019-01-28 09:23:52'),
(813, 921, 49, '2019-01-28 09:23:52', '2019-01-28 09:23:52'),
(814, 922, 50, '2019-01-29 01:45:17', '2019-01-29 01:45:17'),
(815, 923, 50, '2019-01-29 01:45:17', '2019-01-29 01:45:17'),
(816, 924, 50, '2019-01-29 01:45:17', '2019-01-29 01:45:17'),
(817, 925, 50, '2019-01-29 01:45:17', '2019-01-29 01:45:17'),
(818, 926, 50, '2019-01-29 01:45:17', '2019-01-29 01:45:17'),
(819, 927, 50, '2019-01-29 01:45:17', '2019-01-29 01:45:17'),
(820, 928, 50, '2019-01-29 01:45:17', '2019-01-29 01:45:17'),
(821, 929, 50, '2019-01-29 01:45:17', '2019-01-29 01:45:17'),
(822, 930, 50, '2019-01-29 01:45:17', '2019-01-29 01:45:17'),
(823, 931, 50, '2019-01-29 01:45:17', '2019-01-29 01:45:17'),
(824, 932, 50, '2019-01-29 01:45:17', '2019-01-29 01:45:17'),
(825, 933, 50, '2019-01-29 01:45:17', '2019-01-29 01:45:17'),
(826, 934, 50, '2019-01-29 01:45:17', '2019-01-29 01:45:17'),
(827, 935, 50, '2019-01-29 01:45:17', '2019-01-29 01:45:17'),
(828, 936, 50, '2019-01-29 01:45:17', '2019-01-29 01:45:17'),
(829, 937, 50, '2019-01-29 01:45:17', '2019-01-29 01:45:17'),
(830, 938, 50, '2019-01-29 01:45:17', '2019-01-29 01:45:17'),
(831, 939, 50, '2019-01-29 01:45:17', '2019-01-29 01:45:17'),
(832, 940, 50, '2019-01-29 01:45:17', '2019-01-29 01:45:17'),
(833, 941, 50, '2019-01-29 01:45:17', '2019-01-29 01:45:17'),
(834, 942, 50, '2019-01-29 01:45:17', '2019-01-29 01:45:17'),
(835, 943, 50, '2019-01-29 01:45:17', '2019-01-29 01:45:17'),
(836, 944, 50, '2019-01-29 01:45:17', '2019-01-29 01:45:17'),
(837, 945, 50, '2019-01-29 01:45:17', '2019-01-29 01:45:17'),
(838, 946, 51, '2019-01-29 04:17:56', '2019-01-29 04:17:56'),
(839, 947, 51, '2019-01-29 04:17:56', '2019-01-29 04:17:56'),
(840, 948, 51, '2019-01-29 04:17:56', '2019-01-29 04:17:56'),
(841, 949, 52, '2019-01-29 07:34:46', '2019-01-29 07:34:46'),
(842, 950, 52, '2019-01-29 07:34:46', '2019-01-29 07:34:46'),
(843, 951, 52, '2019-01-29 07:34:46', '2019-01-29 07:34:46'),
(844, 952, 52, '2019-01-29 07:34:46', '2019-01-29 07:34:46'),
(845, 953, 52, '2019-01-29 07:34:46', '2019-01-29 07:34:46'),
(846, 954, 53, '2019-01-30 06:52:38', '2019-01-30 06:52:38'),
(847, 955, 53, '2019-01-30 06:52:38', '2019-01-30 06:52:38'),
(848, 956, 53, '2019-01-30 06:52:38', '2019-01-30 06:52:38'),
(849, 958, 54, '2019-03-04 02:39:51', '2019-03-04 02:39:51'),
(850, 959, 55, '2019-03-15 01:40:48', '2019-03-15 01:40:48'),
(851, 960, 56, '2019-03-19 08:29:18', '2019-03-19 08:29:18');

-- --------------------------------------------------------

--
-- Table structure for table `picmitra`
--

CREATE TABLE `picmitra` (
  `id` int(10) UNSIGNED NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statusNda` tinyint(4) NOT NULL,
  `idPerusahaan` int(10) UNSIGNED NOT NULL,
  `idUnitPerusahaan` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `picmitra`
--

INSERT INTO `picmitra` (`id`, `nik`, `nama`, `kontak`, `keterangan`, `statusNda`, `idPerusahaan`, `idUnitPerusahaan`, `created_at`, `updated_at`) VALUES
(3, '53940', 'SIGIT WIDAGDO [SBS]', '085-10761-1333', '-', 0, 4, 4, '2018-12-21 02:29:59', '2018-12-21 02:29:59'),
(4, '38397', 'LILIS SURYATI [SBS]', '0812-3208-2262', '-', 0, 4, 4, '2018-12-21 02:30:20', '2018-12-21 02:30:20'),
(5, '38403', 'DANNI SATRIA PUTRA [SBS]', '0812-3490-9426', '-', 0, 4, 4, '2018-12-21 02:30:50', '2018-12-21 02:30:50'),
(6, '96156937', 'BIMANTYO FIRMANDA P [SBS]', '0812-3190-7459', '-', 0, 4, 4, '2018-12-21 02:31:09', '2018-12-21 02:31:09'),
(7, '57063', 'HERRY DWI ANTOKO [SBS]', '0813-3446-1011', '-', 0, 4, 4, '2018-12-21 02:31:35', '2018-12-21 02:31:35'),
(8, '95155048', 'RICKY ISMANTO [SBS]', '0812-3593-1366', '-', 0, 4, 4, '2018-12-21 02:31:59', '2018-12-21 02:31:59'),
(9, '38415', 'RIFAI [SBS]', '0812-3156-9002', '-', 0, 4, 4, '2018-12-21 02:32:26', '2018-12-21 02:32:26'),
(10, '38424', 'EKO PUJI PURNOMO [SBS]', '0813-3028-2491', '-', 0, 4, 4, '2018-12-21 02:32:49', '2018-12-21 02:32:49'),
(11, '38423', 'DIMAS AGUNG W [SBS]', '0816-554-302', '-', 0, 4, 4, '2018-12-21 02:33:12', '2018-12-21 02:33:12'),
(12, '38414', 'MUHAMMAD HASYIM [SBS]', '0813-3218-6688', '-', 0, 4, 4, '2018-12-21 02:33:54', '2018-12-21 02:33:54'),
(13, '38416', 'SETIF OSTEN [SBS]', '0851-0400-0908', '-', 0, 4, 4, '2018-12-21 02:34:15', '2018-12-21 02:34:15'),
(14, '38417', 'SISWANDI [SBS]', '0812-5283-5249', '-', 0, 4, 4, '2018-12-21 02:34:41', '2018-12-21 02:34:41'),
(15, '38413', 'EDI RIWANTO [SBS]', '0813-3047-1631', '-', 0, 4, 4, '2018-12-21 02:35:05', '2018-12-21 02:35:05'),
(16, '38412', 'DENNY SISWANTO [SBS]', '0821-4117-7411', '-', 0, 4, 4, '2018-12-21 02:35:27', '2018-12-21 02:35:27'),
(17, '38419', 'MUSTAKIM [SBS]', '0812-3054-6633', '-', 0, 4, 4, '2018-12-21 02:35:50', '2018-12-21 02:35:50'),
(18, '69952', 'ARDI SETYONO [SBS]', '0822-4555-7182', '-', 0, 4, 4, '2018-12-21 02:36:16', '2018-12-21 02:36:16'),
(19, '95507', 'MUHAMMAD FAIZAL RIZAL [SBS]', '-', '-', 0, 4, 4, '2018-12-21 02:36:42', '2018-12-21 02:36:42'),
(20, '110043', 'MOCHAMAD NOVIANTO', '0822-3239-6970', '-', 0, 4, 4, '2018-12-21 02:37:15', '2018-12-21 02:37:15'),
(21, '90132043', 'INDRA LESMONO', '081252714007', '-', 0, 2, 6, '2018-12-28 07:32:37', '2018-12-28 07:32:37'),
(22, '95140474', 'ADI NURDIANSYAH YUSUF', '082301915649', '-', 0, 2, 6, '2018-12-28 07:33:02', '2018-12-28 07:33:02'),
(23, '89154356', 'CHANDRA YANUAR IDRIS', '085101210731', '-', 0, 2, 6, '2018-12-28 07:33:26', '2018-12-28 07:33:26'),
(24, '92131250', 'EVAN DWI APRILYANTO', '-', '-', 0, 2, 6, '2018-12-28 07:33:49', '2018-12-28 07:33:49'),
(25, '96158538', 'ARIF DWI HAMZAH', '-', '-', 0, 2, 6, '2018-12-28 07:34:08', '2018-12-28 07:34:08'),
(26, '92140472', 'HENDIKA EVEN', '-', '-', 0, 2, 6, '2018-12-28 07:34:28', '2018-12-28 07:34:28'),
(27, '97158523', 'MUHAMAD YUSUF BADRUSZAMAN', '-', '-', 0, 2, 6, '2018-12-28 07:34:44', '2018-12-28 07:34:44'),
(28, '91158533', 'OKKY PANDU S', '-', '-', 0, 2, 6, '2018-12-28 07:34:59', '2018-12-28 07:34:59'),
(29, '92158529', 'ROBBI RUSANDI PUTRA', '-', '-', 0, 2, 6, '2018-12-28 07:35:14', '2018-12-28 07:35:14'),
(30, '92158544', 'DAVI ALSAKRISNA', '-', '-', 0, 2, 6, '2018-12-28 07:35:29', '2018-12-28 07:35:29'),
(31, '91158530', 'ADHITYA BRIANTAMA', '-', '-', 0, 2, 6, '2018-12-28 07:35:46', '2018-12-28 07:35:46'),
(32, '91131261', 'WARA YOGA AJIDHARMA', '-', '-', 0, 2, 6, '2018-12-28 07:36:03', '2018-12-28 07:36:03'),
(33, '87158597', 'ARY DESTYAN', '-', '-', 0, 2, 6, '2018-12-28 07:36:18', '2018-12-28 07:36:18'),
(34, '97158522', 'YUSRIL IZAM MAHENDRA', '-', '-', 0, 2, 6, '2018-12-28 07:36:34', '2018-12-28 07:36:34'),
(35, '92141357', 'MISBAHUL MUNIR', '-', '-', 0, 2, 6, '2018-12-28 07:36:49', '2018-12-28 07:36:49'),
(36, '94141358', 'RAHMAD HIDAYATULLAH', '-', '-', 0, 2, 6, '2018-12-28 07:37:07', '2018-12-28 07:37:07'),
(38, '-', 'HANDOKO', '0852-3488-7005', 'MITRATEL-PT NEXWAVE', 0, 1, 1, '2019-01-07 08:05:13', '2019-01-07 08:05:13'),
(39, '-', 'DADANG SUGIATMOJO', '-', 'MITRATEL-PT NEXWAVE', 0, 1, 1, '2019-01-07 08:05:13', '2019-01-07 08:05:13'),
(40, '-', 'FIRMAN SYAH PUTRA', '-', 'MITRATEL-PT NEXWAVE', 0, 1, 1, '2019-01-07 08:05:13', '2019-01-07 08:05:13'),
(41, '-', 'ANDI SETIAWAN', '-', 'MITRATEL-PT NEXWAVE', 0, 1, 1, '2019-01-07 08:05:13', '2019-01-07 08:05:13'),
(42, '-', 'PUPUT RANDATA', '-', 'MITRATEL-PT NEXWAVE', 0, 1, 1, '2019-01-07 08:05:13', '2019-01-07 08:05:13'),
(43, '-', 'GAGA MERDEKE PUTRA', '-', 'MITRATEL-PT NEXWAVE', 0, 1, 1, '2019-01-07 08:05:13', '2019-01-07 08:05:13'),
(44, '-', 'FAJAR SIDIK', '-', 'MITRATEL-PT NEXWAVE', 0, 1, 1, '2019-01-07 08:05:13', '2019-01-07 08:05:13'),
(45, '-', 'HARTOYO', '-', 'MITRATEL-PT NEXWAVE', 0, 1, 1, '2019-01-07 08:05:13', '2019-01-07 08:05:13'),
(46, '-', 'FEBRI ADI SIAWANTO', '-', 'MITRATEL-PT NEXWAVE', 0, 1, 1, '2019-01-07 08:05:13', '2019-01-07 08:05:13'),
(47, '-', 'MARYANTO', '-', 'MITRATEL-PT NEXWAVE', 0, 1, 1, '2019-01-07 08:05:13', '2019-01-07 08:05:13'),
(48, '-', 'AWANG', '-', 'MITRATEL-PT NEXWAVE', 0, 1, 1, '2019-01-07 08:05:13', '2019-01-07 08:05:13'),
(49, '-', 'FERRI', '-', 'MITRATEL-PT NEXWAVE', 0, 1, 1, '2019-01-07 08:05:13', '2019-01-07 08:05:13'),
(50, '-', 'FEBRY PRADANA', '0812-6660-728', 'PT NEC', 1, 1, 1, '2019-01-07 08:23:41', '2019-01-07 15:32:14'),
(51, '-', 'TRI PUTRA IRAWAN', '-', 'PT NEC', 1, 1, 1, '2019-01-07 08:23:41', '2019-01-07 15:32:21'),
(52, '-', 'JUMADI', '0851-0116-6233', 'PT ELKOKAR', 0, 1, 1, '2019-01-08 07:37:16', '2019-01-08 07:37:16'),
(53, '-', 'ARIS', '-', 'PT ELKOKAR', 0, 1, 1, '2019-01-08 07:37:16', '2019-01-08 07:37:16'),
(54, '-', 'ERWAN', '-', 'PT ELKOKAR', 0, 1, 1, '2019-01-08 07:37:16', '2019-01-08 07:37:16'),
(55, '-', 'ROFI', '-', 'PT ELKOKAR', 1, 1, 1, '2019-01-08 07:37:16', '2019-01-15 06:45:15'),
(56, '-', 'HADI', '-', 'PT ELKOKAR', 0, 1, 1, '2019-01-08 07:37:16', '2019-01-08 07:37:16'),
(57, '-', 'SUMAHI', '-', 'PT ELKOKAR', 0, 1, 1, '2019-01-08 07:37:16', '2019-01-08 07:37:16'),
(58, '-', 'AGUS', '-', 'PT ELKOKAR', 0, 1, 1, '2019-01-08 07:37:16', '2019-01-08 07:37:16'),
(59, '-', 'AGUS', '-', 'PT ELKOKAR', 0, 1, 1, '2019-01-08 07:37:16', '2019-01-08 07:37:16'),
(60, '-', 'TRIWIBOWO', '-', 'PT ELKOKAR', 0, 1, 1, '2019-01-08 07:37:16', '2019-01-08 07:37:16'),
(61, '-', 'MUJI', '-', 'PT ELKOKAR', 1, 1, 1, '2019-01-08 07:37:16', '2019-01-15 06:45:27'),
(62, '-', 'YOHANES P YUSTISIAWAN', '0813-2078-1005', 'PT ZTE', 0, 1, 1, '2019-01-08 07:47:01', '2019-01-08 07:47:01'),
(63, '-', 'AHMAD H', '-', 'PT ZTE', 0, 1, 1, '2019-01-08 07:47:01', '2019-01-08 07:47:01'),
(64, '-', 'YUDI DAYA KURNIAWAN', '-', 'PT ZTE', 0, 1, 1, '2019-01-08 07:47:01', '2019-01-08 07:47:01'),
(65, '-', 'FUCHRAT R', '-', 'PT ZTE', 0, 1, 1, '2019-01-08 07:47:01', '2019-01-08 07:47:01'),
(66, '-', 'SUDARSONO', '-', 'PT ZTE', 0, 1, 1, '2019-01-08 07:47:01', '2019-01-08 07:47:01'),
(67, '-', 'AULIA RAHMAN', '-', 'PT BINTRACO SHARMA', 1, 1, 1, '2019-01-08 07:55:58', '2019-01-09 06:21:58'),
(68, '-', 'DJOKO DARMAWAN', '-', 'PT BINTRACO SHARMA', 1, 1, 1, '2019-01-08 07:55:58', '2019-01-09 06:22:00'),
(69, '-', 'LULUS', '0856-9679-7597', 'MITRATEL-PT XERINDO', 1, 1, 1, '2019-01-09 00:57:58', '2019-01-10 03:30:38'),
(70, '-', 'FAISOL AMIR', '-', 'MITRATEL-PT XERINDO', 1, 1, 1, '2019-01-09 00:57:58', '2019-01-09 05:10:03'),
(71, '-', 'SUNARJI', '-', 'MITRATEL-PT XERINDO', 1, 1, 1, '2019-01-09 00:57:58', '2019-01-10 03:30:57'),
(72, '-', 'SAPTO', '-', 'MITRATEL-PT XERINDO', 0, 1, 1, '2019-01-09 00:57:58', '2019-01-09 00:57:58'),
(73, '-', 'HARI J', '-', 'MITRATEL-PT XERINDO', 1, 1, 1, '2019-01-09 00:57:58', '2019-01-10 03:30:20'),
(74, '-', 'BAYU W', '-', 'MITRATEL-PT XERINDO', 0, 1, 1, '2019-01-09 00:57:58', '2019-01-09 00:57:58'),
(75, '-', 'DWI SANTOSO', '-', 'MITRATEL-PT XERINDO', 0, 1, 1, '2019-01-09 00:57:58', '2019-01-09 00:57:58'),
(76, '-', 'HARIF', '-', 'MITRATEL-PT XERINDO', 0, 1, 1, '2019-01-09 00:57:58', '2019-01-09 00:57:58'),
(77, '-', 'WAWAN GUNAWAN', '0813-1971-4589', 'PT BANGTELINDO', 0, 1, 1, '2019-01-09 08:32:19', '2019-01-09 08:32:19'),
(78, '-', 'MUHAMMAD SINWANI', '-', 'PT BANGTELINDO', 0, 1, 1, '2019-01-09 08:32:19', '2019-01-09 08:32:19'),
(79, '-', 'ALDI RENALDI', '-', 'PT BANGTELINDO', 0, 1, 1, '2019-01-09 08:32:19', '2019-01-09 08:32:19'),
(80, '-', 'YADI MARYADI', '-', 'PT BANGTELINDO', 0, 1, 1, '2019-01-09 08:32:19', '2019-01-09 08:32:19'),
(81, '-', 'ASEP SUHERMAN', '-', 'PT BANGTELINDO', 0, 1, 1, '2019-01-09 08:32:19', '2019-01-09 08:32:19'),
(82, '-', 'ANAS AULIA', '-', 'PT BANGTELINDO', 0, 1, 1, '2019-01-09 08:32:19', '2019-01-09 08:32:19'),
(83, '-', 'WAHYU ARDIAN', '-', 'PT BANGTELINDO', 0, 1, 1, '2019-01-09 08:32:19', '2019-01-09 08:32:19'),
(84, '-', 'HILMAN FAUZI', '-', 'PT BANGTELINDO', 0, 1, 1, '2019-01-09 08:32:19', '2019-01-09 08:32:19'),
(85, '-', 'ASEP RAHMAT', '-', 'PT BANGTELINDO', 0, 1, 1, '2019-01-09 08:32:19', '2019-01-09 08:32:19'),
(86, '-', 'DEVI SUPRIADI', '-', 'PT BANGTELINDO', 0, 1, 1, '2019-01-09 08:32:19', '2019-01-09 08:32:19'),
(87, '-', 'ROSALINA ISWOROWATI', '-', 'PT TELKOMSEL', 0, 1, 1, '2019-01-09 08:49:59', '2019-01-09 08:49:59'),
(88, '-', 'IWAN KURNIAWAN S', '-', 'PT TELKOMSEL', 0, 1, 1, '2019-01-09 08:49:59', '2019-01-09 08:49:59'),
(89, '-', 'HANIF ZAKARYA', '-', 'PT TELKOMSEL', 0, 1, 1, '2019-01-09 08:49:59', '2019-01-09 08:49:59'),
(90, '-', 'NUR ILHAM S', '-', 'PT TELKOMSEL', 0, 1, 1, '2019-01-09 08:49:59', '2019-01-09 08:49:59'),
(91, '-', 'ARY HARDIAWAN', '-', 'PT TELKOMSEL', 0, 1, 1, '2019-01-09 08:49:59', '2019-01-09 08:49:59'),
(92, '-', 'MUHAMMAD DAERI', '-', 'PT TELKOMSEL', 0, 1, 1, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(93, '-', 'DWI WAHYU BUDI SANTOSA', '-', 'PT TELKOMSEL', 0, 1, 1, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(94, '-', 'GLAGAH SS KATON', '-', 'PT TELKOMSEL', 0, 1, 1, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(95, '-', 'AGUS S ANGGORO', '-', 'PT TELKOMSEL', 0, 1, 1, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(96, '-', 'ERWIN HERMANSYAH', '-', 'PT TELKOMSEL', 0, 1, 1, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(97, '-', 'IMAM TAUHID', '-', 'PT TELKOMSEL', 0, 1, 1, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(98, '-', 'M ARIFIN', '-', 'PT TELKOMSEL', 0, 1, 1, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(99, '-', 'M EFFENDI', '-', 'PT TELKOMSEL', 0, 1, 1, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(100, '-', 'ACMALUL ISLAMI', '-', 'PT TELKOMSEL', 0, 1, 1, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(101, '-', 'NANOK', '-', 'PT TELKOMSEL', 0, 1, 1, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(102, '-', 'SLAMET', '-', 'PT TELKOMSEL', 0, 1, 1, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(103, '-', 'SLAMET HARIY', '-', 'PT TELKOMSEL', 0, 1, 1, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(104, '-', 'SUGENG P', '-', 'PT TELKOMSEL', 0, 1, 1, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(105, '-', 'DAVID SETYA BUDI', '-', 'PT TELKOMSEL', 0, 1, 1, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(106, '-', 'DAVIR HAMIDI', '-', 'PT TELKOMSEL', 0, 1, 1, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(107, '-', 'SAIFUL ANWAR', '-', 'PT TELKOMSEL', 0, 1, 1, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(108, '-', 'IMAM SURYANTO', '-', 'PT TELKOMSEL', 0, 1, 1, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(109, '-', 'LASIYANTO', '-', 'PT TELKOMSEL', 0, 1, 1, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(110, '-', 'SUNARTO', '-', 'PT TELKOMSEL', 0, 1, 1, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(111, '-', 'M ROFI', '-', 'PT TELKOMSEL', 0, 1, 1, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(112, '-', 'M MAKSUM', '-', 'PT TELKOMSEL', 0, 1, 1, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(113, '-', 'EKO PRASETYO', '-', 'PT TELKOMSEL', 0, 1, 1, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(114, '-', 'NARTO', '-', 'PT TELKOMSEL', 0, 1, 1, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(115, '-', 'M RIZKI RAHMANSYAH', '-', 'PT TELKOMSEL', 0, 1, 1, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(116, '-', 'ZAINUDIN', '-', 'PT TELKOMSEL', 0, 1, 1, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(117, '-', 'DEPI ARIANTO CANDRA', '-', 'PT TELKOMSEL', 0, 1, 1, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(118, '-', 'UMAR SURADI P', '-', 'PT TELKOMSEL', 0, 1, 1, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(119, '-', 'AGUS SANTUSO', '-', 'PT TELKOMSEL', 0, 1, 1, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(120, '-', 'DAWAN NUZULLAH', '-', 'PT TELKOMSEL', 0, 1, 1, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(121, '-', 'RIZKI JUNIZAR PUTRA', '-', 'PT TELKOMSEL', 0, 1, 1, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(122, '-', 'ARIS SUSANTO', '-', 'PT TELKOMSEL', 0, 1, 1, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(123, '-', 'M ZAINUR RIZAL', '-', 'PT TELKOMSEL', 0, 1, 1, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(124, '-', 'MUSTAIN', '-', 'PT TELKOMSEL', 0, 1, 1, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(125, '-', 'AHMAD RAIS ZAKY', '-', 'PT TELKOMSEL', 0, 1, 1, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(126, '-', 'ABDUL MUTOLIB', '-', 'PT TELKOMSEL', 0, 1, 1, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(127, '-', 'SUYONO', '-', 'PT TELKOMSEL', 0, 1, 1, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(128, '-', 'ANTONIUS PRIBADI', '-', 'PT TELKOMSEL', 0, 1, 1, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(129, '-', 'AGUS SUSANTO', '-', 'PT TELKOMSEL', 0, 1, 1, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(130, '-', 'PONALI', '-', 'PT TELKOMSEL', 0, 1, 1, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(131, '-', 'NICKO PRANANDA ARITAMA', '-', 'PT TELKOMSEL', 0, 1, 1, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(132, '-', 'ADIT', '-', 'PT TELKOMSEL', 0, 1, 1, '2019-01-09 08:50:00', '2019-01-09 08:50:00'),
(133, '-', 'SUTRISNO', '-', 'PT TELKOMSEL', 0, 1, 1, '2019-01-09 08:50:01', '2019-01-09 08:50:01'),
(134, '-', 'LASMIN', '-', 'PT TELKOMSEL', 0, 1, 1, '2019-01-09 08:50:01', '2019-01-09 08:50:01'),
(135, '-', 'RIYADI', '-', 'PT TELKOMSEL', 0, 1, 1, '2019-01-09 08:50:01', '2019-01-09 08:50:01'),
(136, '-', 'KISWANDI', '-', 'PT TELKOMSEL', 0, 1, 1, '2019-01-09 08:50:01', '2019-01-09 08:50:01'),
(137, '-', 'NURHADI SUSILO', '-', 'PT TELKOMSEL', 0, 1, 1, '2019-01-09 08:50:01', '2019-01-09 08:50:01'),
(138, '-', 'YOSI EFFENDI', '-', 'PT TELKOMSEL', 0, 1, 1, '2019-01-09 08:50:01', '2019-01-09 08:50:01'),
(139, '-', 'HARIS FADILLAH', '-', 'PT TELKOMSEL', 0, 1, 1, '2019-01-09 08:50:01', '2019-01-09 08:50:01'),
(140, '-', 'ANDIK KUSHARTO', '-', 'PT TELKOMSEL', 0, 1, 1, '2019-01-09 08:50:01', '2019-01-09 08:50:01'),
(141, '-', 'MARIO', '-', 'PT TELKOMSEL', 0, 1, 1, '2019-01-09 08:50:01', '2019-01-09 08:50:01'),
(142, '-', 'ERRY HARTOKO', '-', 'PT TELKOMSEL', 0, 1, 1, '2019-01-09 08:50:01', '2019-01-09 08:50:01'),
(143, '-', 'FEBRY PRADANA', '-', 'PT NEC', 1, 1, 1, '2019-01-09 09:05:44', '2019-01-09 15:04:57'),
(144, '-', 'TRI PUTRA IRAWAN', '-', 'PT NEC', 1, 1, 1, '2019-01-09 09:05:44', '2019-01-09 15:05:20'),
(145, '-', 'DEDY SURYANTO', '-', 'DISHUB PROV JATIM', 1, 1, 1, '2019-01-10 01:16:26', '2019-01-11 08:17:42'),
(146, '-', 'HARIYADI FIRMANSYAH', '0822-3132-0320', 'PT PINS', 0, 1, 1, '2019-01-10 03:25:08', '2019-01-10 03:25:08'),
(147, '-', 'DANI ANAS', '-', 'PT PINS', 0, 1, 1, '2019-01-10 03:25:08', '2019-01-10 03:25:08'),
(148, '-', 'AKHMAD NUBEL', '-', 'PT PINS', 0, 1, 1, '2019-01-10 03:25:08', '2019-01-10 03:25:08'),
(149, '-', 'SUKMA PRATAMA', '-', 'PT PINS', 0, 1, 1, '2019-01-10 03:25:08', '2019-01-10 03:25:08'),
(150, '-', 'FAJAR MAULANA IBRAHIM', '-', 'PT PINS', 0, 1, 1, '2019-01-10 03:25:08', '2019-01-10 03:25:08'),
(151, '-', 'IRWAN', '-', 'PT ZTE', 1, 1, 1, '2019-01-10 04:07:57', '2019-01-10 09:05:12'),
(152, '-', 'CHEN JINYIN', '-', 'PT ZTE', 1, 1, 1, '2019-01-10 04:07:57', '2019-01-10 09:04:29'),
(153, '-', 'CONSTANTINE HANYE', '-', 'PT CIA', 1, 1, 1, '2019-01-11 07:16:50', '2019-01-11 09:16:01'),
(154, '-', 'AMIRIL MUKMININ', '-', 'PT TEHINDO SARANA UTAMA', 1, 1, 1, '2019-01-14 01:19:48', '2019-01-16 03:25:42'),
(155, '-', 'SUGIYANTO', '-', 'PT TEHINDO SARANA UTAMA', 1, 1, 1, '2019-01-14 01:19:48', '2019-01-16 06:10:18'),
(156, '-', 'HERI NURCAHYONO', '-', 'PT TEHINDO SARANA UTAMA', 1, 1, 1, '2019-01-14 01:19:48', '2019-01-16 03:25:54'),
(157, '-', 'AGUNG', '-', 'PT TEHINDO SARANA UTAMA', 0, 1, 1, '2019-01-14 01:19:48', '2019-01-14 01:19:48'),
(158, '-', 'OKNY GIOVANY SINGAL', '-', 'PT TEHINDO SARANA UTAMA', 0, 1, 1, '2019-01-14 01:19:48', '2019-01-14 01:19:48'),
(159, '-', 'YONI NANANG PURNOMO', '-', 'PT TEHINDO SARANA UTAMA', 0, 1, 1, '2019-01-14 01:19:48', '2019-01-14 01:19:48'),
(160, '-', 'EFIN ACHSANUL ARIFIN', '-', 'PT INTI', 1, 1, 1, '2019-01-14 01:37:14', '2019-01-22 04:48:44'),
(161, '-', 'RULLY WHARDIANA', '-', 'PT INTI', 1, 1, 1, '2019-01-14 01:37:14', '2019-01-22 04:48:53'),
(162, '-', 'RUDI', '-', 'PT INTI', 0, 1, 1, '2019-01-14 01:37:14', '2019-01-14 01:37:14'),
(163, '-', 'HAMIM', '-', 'PT INTI', 1, 1, 1, '2019-01-14 01:37:14', '2019-01-29 16:40:59'),
(164, '-', 'PONCO', '-', 'PT INTI', 0, 1, 1, '2019-01-14 01:37:14', '2019-01-14 01:37:14'),
(165, '-', 'SAMIRAN', '-', 'PT INTI', 0, 1, 1, '2019-01-14 01:37:14', '2019-01-14 01:37:14'),
(166, '-', 'FAJAR MAULANA IBRAHIM', '-', 'PT INTI', 1, 1, 1, '2019-01-14 01:37:14', '2019-01-23 06:52:46'),
(167, '-', 'ACHMAD IQBAL', '-', 'PT INTI', 1, 1, 1, '2019-01-14 01:37:14', '2019-01-28 16:17:07'),
(168, '-', 'ALFI YUNUS', '-', 'PT INTI', 1, 1, 1, '2019-01-14 01:37:14', '2019-01-23 06:50:52'),
(169, '-', 'SUHARI', '-', 'PT INTI', 1, 1, 1, '2019-01-14 01:37:14', '2019-01-23 06:51:48'),
(170, '-', 'SLAMET', '-', 'PT INTI', 0, 1, 1, '2019-01-14 01:37:14', '2019-01-14 01:37:14'),
(171, '-', 'SAIFUL', '-', 'PT INTI', 0, 1, 1, '2019-01-14 01:37:14', '2019-01-14 01:37:14'),
(172, '-', 'BAYU', '-', 'PT INTI', 1, 1, 1, '2019-01-14 01:37:14', '2019-01-23 06:52:18'),
(173, '-', 'NOBEL', '-', 'PT INTI', 0, 1, 1, '2019-01-14 01:37:14', '2019-01-14 01:37:14'),
(174, '-', 'HEPI', '-', 'PT INTI', 0, 1, 1, '2019-01-14 01:37:14', '2019-01-14 01:37:14'),
(175, '-', 'DZIKRI', '-', 'PT INTI', 1, 1, 1, '2019-01-14 01:37:14', '2019-01-23 06:53:10'),
(176, '-', 'TEGUH', '-', 'PT INTI', 0, 1, 1, '2019-01-14 01:37:14', '2019-01-14 01:37:14'),
(177, '-', 'SULIS', '-', 'PT INTI', 0, 1, 1, '2019-01-14 01:37:14', '2019-01-14 01:37:14'),
(178, '-', 'MUNIR', '-', 'PT INTI', 0, 1, 1, '2019-01-14 01:37:14', '2019-01-14 01:37:14'),
(179, '-', 'ERWIN', '-', 'PT INTI', 0, 1, 1, '2019-01-14 01:37:14', '2019-01-14 01:37:14'),
(180, '-', 'JOKO', '-', 'PT INTI', 0, 1, 1, '2019-01-14 01:37:14', '2019-01-14 01:37:14'),
(181, '-', 'M ARIFIN', '-', 'KOPKAR KARYA MAS', 0, 1, 1, '2019-01-14 03:41:18', '2019-01-15 02:23:19'),
(182, '-', 'BUDIONO', '-', 'KOPKAR KARYA MAS', 0, 1, 1, '2019-01-14 03:41:18', '2019-01-15 02:23:19'),
(183, '-', 'AHMAD NURSODIK', '-', 'KOPKAR KARYA MAS', 1, 1, 1, '2019-01-14 03:41:18', '2019-01-15 02:23:19'),
(184, '-', 'TEJA', '0853-1431-9693', 'MITRATEL-PT ZMG', 0, 1, 1, '2019-01-14 04:43:28', '2019-01-14 04:43:28'),
(185, '-', 'DWI PURWANTO', '-', 'MITRATEL-PT ZMG', 0, 1, 1, '2019-01-14 04:43:28', '2019-01-14 04:43:28'),
(186, '-', 'TRI WAHYU ADJI', '-', 'MITRATEL-PT ZMG', 1, 1, 1, '2019-01-14 04:43:28', '2019-01-18 06:22:45'),
(187, '-', 'ADI PRAYOGO', '-', 'MITRATEL-PT ZMG', 0, 1, 1, '2019-01-14 04:43:28', '2019-01-14 04:43:28'),
(188, '-', 'DWI SANTOSO', '-', 'MITRATEL-PT ZMG', 0, 1, 1, '2019-01-14 04:43:28', '2019-01-14 04:43:28'),
(189, '-', 'HARIF', '-', 'MITRATEL-PT ZMG', 0, 1, 1, '2019-01-14 04:43:29', '2019-01-14 04:43:29'),
(190, '-', 'ANDRI', '0813-8095-5129', 'PT NEC', 0, 1, 1, '2019-01-14 05:32:04', '2019-01-14 05:32:04'),
(191, '-', 'SUBAGYO', '-', 'PT NEC', 0, 1, 1, '2019-01-14 05:32:04', '2019-01-14 05:32:04'),
(192, '-', 'M ROBY FAJRIN NOR', '-', 'PT NEC', 0, 1, 1, '2019-01-14 05:32:04', '2019-01-14 05:32:04'),
(193, '-', 'FAJAR FIRMANSYAH', '-', 'PT NEC', 1, 1, 1, '2019-01-14 05:32:04', '2019-01-15 02:12:20'),
(194, '-', 'FARRAS FAUZAN', '-', 'PT NEC', 0, 1, 1, '2019-01-14 05:32:04', '2019-01-14 05:32:04'),
(195, '-', 'EKO SAPUTRO', '-', 'PT NEC', 0, 1, 1, '2019-01-14 05:32:04', '2019-01-14 05:32:04'),
(196, '-', 'AGUNG RIYANTO', '-', 'PT NEC', 0, 1, 1, '2019-01-14 05:32:04', '2019-01-14 05:32:04'),
(197, '-', 'HADI GUNAWAN', '-', 'PT NEC', 0, 1, 1, '2019-01-14 05:32:04', '2019-01-14 05:32:04'),
(198, '-', 'ARIEF BUDI RAHARJO', '-', 'PT NEC', 0, 1, 1, '2019-01-14 05:32:04', '2019-01-14 05:32:04'),
(199, '-', 'AGUS HAYANTO', '-', 'PT NEC', 0, 1, 1, '2019-01-14 05:32:04', '2019-01-14 05:32:04'),
(200, '-', 'ARIEF BUDI SETIAWAN', '-', 'PT NEC', 0, 1, 1, '2019-01-14 05:32:04', '2019-01-14 05:32:04'),
(201, '-', 'ROBIUL NUR ROKHIM', '-', 'PT NEC', 0, 1, 1, '2019-01-14 05:32:04', '2019-01-14 05:32:04'),
(202, '-', 'NAFIK SETIAWAN', '-', 'PT NEC', 0, 1, 1, '2019-01-14 05:32:04', '2019-01-14 05:32:04'),
(203, '-', 'MUZANI SYUKUR', '-', 'PT NEC', 0, 1, 1, '2019-01-14 05:32:05', '2019-01-14 05:32:05'),
(204, '-', 'YUKI SATO', '-', 'PT NEC', 0, 1, 1, '2019-01-14 05:32:05', '2019-01-14 05:32:05'),
(205, '-', 'KENTA SAKURAI', '-', 'PT NEC', 1, 1, 1, '2019-01-14 05:32:05', '2019-01-15 02:12:44'),
(206, '-', 'MUNEAKI YATSUDA', '-', 'PT NEC', 0, 1, 1, '2019-01-14 05:32:05', '2019-01-14 05:32:05'),
(207, '-', 'FUMIO ASO', '-', 'PT NEC', 0, 1, 1, '2019-01-14 05:32:05', '2019-01-14 05:32:05'),
(208, '-', 'MASAKI GOTO', '-', 'PT NEC', 0, 1, 1, '2019-01-14 05:32:05', '2019-01-14 05:32:05'),
(209, '-', 'HIDENORI KANNO', '-', 'PT NEC', 0, 1, 1, '2019-01-14 05:32:05', '2019-01-14 05:32:05'),
(210, '-', 'YOSHIAKI SHINGAKI', '-', 'PT NEC', 0, 1, 1, '2019-01-14 05:32:05', '2019-01-14 05:32:05'),
(211, '-', 'SHINJI MEKADA', '-', 'PT NEC', 0, 1, 1, '2019-01-14 05:32:05', '2019-01-14 05:32:05'),
(212, '-', 'TADASHI CHINEN', '-', 'PT NEC', 0, 1, 1, '2019-01-14 05:32:05', '2019-01-14 05:32:05'),
(213, '-', 'EIJI SHINNO', '-', 'PT NEC', 0, 1, 1, '2019-01-14 05:32:05', '2019-01-14 05:32:05'),
(214, '-', 'DAISUKE KAMADA', '-', 'PT NEC', 0, 1, 1, '2019-01-14 05:32:05', '2019-01-14 05:32:05'),
(215, '-', 'SUSANDOKO', '0812-4093-9192', 'PT INTI', 0, 1, 1, '2019-01-14 08:05:40', '2019-01-14 08:05:40'),
(216, '-', 'YUSUF SUPIAN', '0813-2123-0240', 'PT INTI', 1, 1, 1, '2019-01-14 08:05:40', '2019-01-24 06:04:50'),
(217, '-', 'ARIEF PRASETYO', '-', 'PT INTI', 0, 1, 1, '2019-01-14 08:05:40', '2019-01-14 08:05:40'),
(218, '-', 'KOSASIH', '-', 'PT INTI', 0, 1, 1, '2019-01-14 08:05:40', '2019-01-14 08:05:40'),
(219, '-', 'MUH HAMIM Z', '-', 'PT INTI', 0, 1, 1, '2019-01-14 08:05:40', '2019-01-14 08:05:40'),
(220, '-', 'KETUT', '-', 'PT INTI', 0, 1, 1, '2019-01-14 08:05:40', '2019-01-14 08:05:40'),
(221, '-', 'MAMAT', '-', 'PT INTI', 0, 1, 1, '2019-01-14 08:05:40', '2019-01-14 08:05:40'),
(222, '-', 'SOELIJONO', '-', 'KOPKAR KARYA MAS', 0, 1, 1, '2019-01-15 01:22:38', '2019-01-15 01:22:38'),
(223, '-', 'NINJAR', '-', 'KOPKAR KARYA MAS', 0, 1, 1, '2019-01-15 01:22:38', '2019-01-15 01:22:38'),
(224, '-', 'HENDRO', '-', 'KOPKAR KARYA MAS', 0, 1, 1, '2019-01-15 01:22:38', '2019-01-15 01:22:38'),
(225, '-', 'TAYO', '-', 'KOPKAR KARYA MAS', 0, 1, 1, '2019-01-15 01:22:39', '2019-01-15 01:22:39'),
(226, '-', 'IPAN', '-', 'KOPKAR KARYA MAS', 0, 1, 1, '2019-01-15 01:22:39', '2019-01-15 01:22:39'),
(227, '-', 'SAMADI', '-', 'KOPKAR KARYA MAS', 0, 1, 1, '2019-01-15 01:22:39', '2019-01-15 01:22:39'),
(228, '-', 'AGUS', '-', 'KOPKAR KARYA MAS', 0, 1, 1, '2019-01-15 01:22:39', '2019-01-15 01:22:39'),
(229, '-', 'DJUMADI', '0851-0116-6233', 'PT ELKOKAR', 1, 1, 1, '2019-01-15 04:38:58', '2019-01-19 13:12:02'),
(230, '-', 'SUMANTO', '-', 'PT ELKOKAR', 1, 1, 1, '2019-01-15 04:38:58', '2019-01-19 13:13:42'),
(231, '-', 'KASTO', '-', 'PT ELKOKAR', 1, 1, 1, '2019-01-15 04:38:58', '2019-01-19 13:14:38'),
(232, '-', 'MUJI ROHMAT', '-', 'PT ELKOKAR', 1, 1, 1, '2019-01-15 04:38:58', '2019-01-19 13:12:53'),
(233, '-', 'NUR DIYANTO', '-', 'PT ELKOKAR', 1, 1, 1, '2019-01-15 04:38:58', '2019-01-19 13:14:09'),
(234, '-', 'AGUS DARIYATNO', '0821-3191-1071', 'MITRATEL-PT FIBER STAR', 1, 1, 1, '2019-01-15 08:18:50', '2019-01-18 08:39:57'),
(235, '-', 'ENDANG SUPRIYATNA', '-', 'MITRATEL-PT FIBER STAR', 0, 1, 1, '2019-01-15 08:18:50', '2019-01-15 08:18:50'),
(236, '-', 'AGUS S', '-', 'MITRATEL-PT FIBER STAR', 0, 1, 1, '2019-01-15 08:18:50', '2019-01-15 08:18:50'),
(237, '-', 'NELSON MAHARDI', '-', 'MITRATEL-PT FIBER STAR', 0, 1, 1, '2019-01-15 08:18:50', '2019-01-15 08:18:50'),
(238, '-', 'CECEP SUNANDAR', '-', 'MITRATEL-PT FIBER STAR', 0, 1, 1, '2019-01-15 08:18:50', '2019-01-15 08:18:50'),
(239, '-', 'RYAN H', '-', 'MITRATEL-PT FIBER STAR', 0, 1, 1, '2019-01-15 08:18:50', '2019-01-15 08:18:50'),
(240, '-', 'FAHRUL M Z', '-', 'MITRATEL-PT FIBER STAR', 0, 1, 1, '2019-01-15 08:18:50', '2019-01-15 08:18:50'),
(241, '-', 'DWI FERRI', '-', 'MITRATEL-PT FIBER STAR', 0, 1, 1, '2019-01-15 08:18:50', '2019-01-15 08:18:50'),
(242, '-', 'AWANG', '-', 'MITRATEL-PT FIBER STAR', 0, 1, 1, '2019-01-15 08:18:50', '2019-01-15 08:18:50'),
(243, '-', 'FEBRY PRADANA', '-', 'PT NEC', 1, 1, 1, '2019-01-15 09:04:54', '2019-01-15 16:13:32'),
(245, '-', 'HASNAM', '-', '-', 0, 3, 7, '2019-01-15 09:46:57', '2019-01-15 09:46:57'),
(246, '-', 'WAHYONO', '-', '-', 0, 3, 8, '2019-01-15 09:47:17', '2019-01-15 09:47:17'),
(247, '-', 'NARA IDWAN GUNAWAN', '-', '-', 0, 3, 9, '2019-01-15 09:53:32', '2019-01-15 09:53:32'),
(248, '-', 'ALDRIK DWI WICAKSONO', '-', '-', 0, 3, 9, '2019-01-15 09:53:43', '2019-01-15 09:53:43'),
(249, '-', 'VIRADY SINDU', '-', '-', 0, 3, 9, '2019-01-15 09:53:56', '2019-01-15 09:53:56'),
(250, '-', 'SATRIYO WICAKSONO', '-', '-', 0, 3, 10, '2019-01-15 09:54:10', '2019-01-15 09:54:10'),
(251, '-', 'JANANTA PERMATA PUTRA', '-', '-', 0, 3, 10, '2019-01-15 09:54:27', '2019-01-15 09:54:27'),
(252, '-', 'FHAISAL HALIM SAPUTRA', '-', '-', 0, 3, 10, '2019-01-15 09:54:40', '2019-01-15 09:54:40'),
(253, '-', 'CAHYA PURNAMA DANI', '-', '-', 0, 3, 10, '2019-01-15 09:54:56', '2019-01-15 09:54:56'),
(254, '-', 'ANWAR TRI ADMAJA', '-', '-', 0, 3, 10, '2019-01-15 09:55:06', '2019-01-15 09:55:06'),
(255, '-', 'RISKY DWI PAYANA', '-', '-', 0, 3, 10, '2019-01-15 09:55:15', '2019-01-15 09:55:15'),
(256, '-', 'AHMAD BUSTARI', '-', '-', 0, 3, 10, '2019-01-15 09:55:27', '2019-01-15 09:55:27'),
(257, '-', 'MUHAMMAD AL FATIH', '-', '-', 0, 3, 10, '2019-01-15 09:55:41', '2019-01-15 09:55:41'),
(258, '-', 'JUMALI', '-', '-', 0, 3, 10, '2019-01-15 09:55:51', '2019-01-15 09:55:51'),
(259, '-', 'THIAR HASBIYA DITANAYA', '-', '-', 0, 3, 10, '2019-01-15 09:56:05', '2019-01-15 09:56:05'),
(260, '-', 'HUDAN STUDIAWAN', '-', '-', 0, 3, 10, '2019-01-15 09:56:37', '2019-01-15 09:56:37'),
(261, '-', 'JOS BRAMASTO S PSI', '-', '-', 0, 3, 11, '2019-01-15 09:56:57', '2019-01-15 09:56:57'),
(262, '-', 'AHMAD FAIZUL MUHARROM', '-', '-', 0, 3, 11, '2019-01-15 09:57:08', '2019-01-15 09:57:08'),
(263, '-', 'DIMAS NUSWANTORO', '-', '-', 0, 3, 12, '2019-01-15 09:57:25', '2019-01-15 09:57:25'),
(264, '-', 'ARYS', '-', '-', 0, 3, 12, '2019-01-15 09:57:39', '2019-01-15 09:57:39'),
(265, '-', 'MASYKUR', '-', '-', 0, 3, 14, '2019-01-15 09:59:14', '2019-01-15 09:59:14'),
(266, '-', 'ABDUL YASAK ST', '-', '-', 0, 3, 14, '2019-01-15 09:59:25', '2019-01-15 09:59:25'),
(267, '-', 'ERWIN SULISTYA PAMBUDI ST', '-', '-', 0, 3, 14, '2019-01-15 09:59:41', '2019-01-15 09:59:41'),
(268, '-', 'KOYUN', '-', '-', 0, 3, 14, '2019-01-15 09:59:55', '2019-01-15 09:59:55'),
(269, '-', 'ALENDI', '-', '-', 0, 3, 15, '2019-01-15 10:00:10', '2019-01-15 10:00:10'),
(270, '-', 'AGUSTINUS SUKO BASUKI', '-', '-', 0, 3, 16, '2019-01-15 10:00:35', '2019-01-15 10:00:35'),
(271, '-', 'ANDI NURDIYANTO', '-', '-', 0, 3, 16, '2019-01-15 10:00:50', '2019-01-15 10:00:50'),
(272, '-', 'ARIF FAUZY, SKOM', '-', '-', 0, 3, 16, '2019-01-15 10:01:05', '2019-01-15 10:01:05'),
(273, '-', 'WIWIT AFRILA SANDI', '-', '-', 0, 3, 16, '2019-01-15 10:01:17', '2019-01-15 10:01:17'),
(274, '-', 'MOCH HOLIQ', '-', '-', 0, 3, 16, '2019-01-15 10:01:33', '2019-01-15 10:01:33'),
(275, '-', 'NUGROHO AGUSTIONO', '-', '-', 0, 3, 17, '2019-01-15 10:01:53', '2019-01-15 10:01:53'),
(276, '95140475', 'SURYO ADI WIBOWO', '-', '-', 0, 2, 6, '2019-01-16 01:29:45', '2019-01-16 01:29:45'),
(277, '84152128', 'SULAIMAN', '-', '-', 0, 2, 6, '2019-01-16 01:30:10', '2019-01-16 01:30:10'),
(278, '94156856', 'AHMAD SYARIFUDDIN', '-', '-', 0, 2, 6, '2019-01-16 01:30:45', '2019-01-16 01:30:45'),
(279, '91150870', 'ARIS EFENDI', '-', '-', 0, 2, 6, '2019-01-16 01:31:05', '2019-01-16 01:31:05'),
(280, '92152081', 'RIZKY ABDUL GOFUR', '-', '-', 0, 2, 6, '2019-01-16 01:31:27', '2019-01-16 01:31:27'),
(281, '95150421', 'ACHMAD JAZULI', '-', '-', 0, 2, 6, '2019-01-16 01:31:49', '2019-01-16 01:31:49'),
(282, '95152095', 'AUFAR DANU PRATAMA', '-', '-', 0, 2, 6, '2019-01-16 01:32:38', '2019-01-16 01:32:38'),
(283, '83152078', 'KURNIAWAN FITRIYANTO', '-', '-', 0, 2, 6, '2019-01-16 01:33:05', '2019-01-16 01:33:05'),
(284, '89141351', 'IMAM FAUZI', '-', '-', 0, 2, 6, '2019-01-16 01:33:24', '2019-01-16 01:33:24'),
(285, '97160333', 'ERICK YOSAFAT', '-', '-', 0, 2, 6, '2019-01-16 01:33:41', '2019-01-16 01:33:41'),
(286, '97155723', 'DIMAS SURYO DWI PRASETYO', '-', '-', 0, 2, 6, '2019-01-16 01:34:45', '2019-01-16 01:34:45'),
(287, '88158226', 'ANGGA KUSUMA', '-', '-', 0, 2, 6, '2019-01-16 01:35:02', '2019-01-16 01:35:02'),
(288, '90150394', 'JILLY HAIKAL ISLAM', '-', '-', 0, 2, 6, '2019-01-16 01:35:21', '2019-01-16 01:35:21'),
(289, '951312151', 'M YUSRON AMINULLAH', '-', '-', 0, 2, 6, '2019-01-16 01:35:39', '2019-01-16 01:35:39'),
(290, '865828', 'HADI PURWOKO', '-', '-', 0, 2, 71, '2019-01-16 01:36:05', '2019-01-16 02:45:25'),
(291, '95152121', 'TRI JATMIKO', '-', '-', 0, 2, 6, '2019-01-16 01:36:10', '2019-01-16 01:36:10'),
(292, '18900119', 'ALI KHOLIQ HASAN', '-', '-', 0, 2, 71, '2019-01-16 01:36:27', '2019-01-16 01:36:27'),
(293, '945175', 'NUGROHO PRATAMA MAHARANI', '-', '-', 0, 2, 71, '2019-01-16 01:36:48', '2019-01-16 01:36:48'),
(294, '93132048', 'HAYAT MULYONO', '-', '-', 0, 2, 6, '2019-01-16 01:37:03', '2019-01-16 01:37:03'),
(295, '955144', 'DIAN SURYO AJI', '-', '-', 0, 2, 71, '2019-01-16 01:37:07', '2019-01-16 01:37:07'),
(296, '91142008', 'ADNAN', '-', '-', 0, 2, 6, '2019-01-16 01:37:19', '2019-01-16 01:37:19'),
(297, '90140874', 'RADEN MUCHAMAD KURNIAWAN', '-', '-', 0, 2, 6, '2019-01-16 01:37:51', '2019-01-16 01:37:51'),
(298, '95152111', 'RACHMAD ZAMZULI', '-', '-', 0, 2, 72, '2019-01-16 01:38:07', '2019-01-16 01:38:07'),
(299, '91160044', 'MACHUDI DAMAIANTO', '-', '-', 0, 2, 6, '2019-01-16 01:38:09', '2019-01-16 01:38:09'),
(300, '89158402', 'RYCCO PARMANA SAPUTRA', '-', '-', 0, 2, 6, '2019-01-16 01:38:25', '2019-01-16 01:38:25'),
(301, '95131821', 'ANGGA GUSTI ALAMSYAH', '-', '-', 0, 2, 72, '2019-01-16 01:38:26', '2019-01-16 01:38:26'),
(302, '92156711', 'FIKRIYANNUR', '-', '-', 0, 2, 72, '2019-01-16 01:38:40', '2019-01-16 01:38:40'),
(303, '90156797', 'FATKHUROKHMAN', '-', '-', 0, 2, 6, '2019-01-16 01:38:43', '2019-01-16 01:38:43'),
(304, '91131416', 'AGUNG DESTYA MUDHA', '-', '-', 0, 2, 72, '2019-01-16 01:38:55', '2019-01-16 01:38:55'),
(305, '92153214', 'DENNIS BAGUS SATRIA', '-', '-', 0, 2, 6, '2019-01-16 01:39:03', '2019-01-16 01:39:03'),
(306, '94150863', 'MOCH ARIF SYAIFUDDIN', '-', '-', 0, 2, 72, '2019-01-16 01:39:10', '2019-01-16 01:39:10'),
(307, '98170326', 'SADDAM HUSIN', '-', '-', 0, 2, 6, '2019-01-16 01:39:17', '2019-01-16 01:39:17'),
(308, '85140485', 'INDRA FERDIANSAH', '-', '-', 0, 2, 72, '2019-01-16 01:39:26', '2019-01-16 01:39:26'),
(309, '93170105', 'GUSTI SRIKAND JAWI', '-', '-', 0, 2, 6, '2019-01-16 01:39:32', '2019-01-16 01:39:32'),
(310, '95140486', 'ANUGERAH EKA YANNUDIN', '-', '-', 0, 2, 72, '2019-01-16 01:39:47', '2019-01-16 01:39:47'),
(311, '91158222', 'MUHAMMAD LUKMAN FEBRIANTO', '-', '-', 0, 2, 72, '2019-01-16 01:40:05', '2019-01-16 01:40:05'),
(312, '17900219', 'RENDY SATRIA', '-', '-', 0, 2, 6, '2019-01-16 01:40:12', '2019-01-16 01:40:12'),
(313, '93152089', 'ACHMAD PRINDY MUHAYMI', '-', '-', 0, 2, 72, '2019-01-16 01:40:20', '2019-01-16 01:40:20'),
(314, '94150854', 'ALIF RACHMATULLAH', '-', '-', 0, 2, 72, '2019-01-16 01:40:33', '2019-01-16 01:40:33'),
(315, '91156800', 'EBIT BAGUS LORENA', '-', '-', 0, 2, 72, '2019-01-16 01:40:46', '2019-01-16 01:40:46'),
(316, '97170304', 'M MUZAMIL', '-', '-', 0, 2, 72, '2019-01-16 01:41:06', '2019-01-16 01:41:06'),
(317, '96158203', 'YUANSYAH PERDANA', '-', '-', 0, 2, 72, '2019-01-16 01:41:25', '2019-01-16 01:41:25'),
(318, '97158567', 'MOCH FAJAR AL-AMIN', '-', '-', 0, 2, 6, '2019-01-16 01:41:42', '2019-01-16 01:41:42'),
(319, '85131407', 'ABDUR RACHMAN F', '-', '-', 0, 2, 72, '2019-01-16 01:41:53', '2019-01-16 01:41:53'),
(320, '91131943', 'GHIELANG WAHYU NANDA', '-', '-', 0, 2, 6, '2019-01-16 01:41:58', '2019-01-16 01:41:58'),
(321, '93153230', 'NUR AFIAH', '-', '-', 0, 2, 72, '2019-01-16 01:42:08', '2019-01-16 01:42:08'),
(322, '95131831', 'MOCHAMMAD JUWINI', '-', '-', 0, 2, 6, '2019-01-16 01:42:18', '2019-01-16 01:42:18'),
(323, '86131583', 'HENRY ARIAWAN SUHARDI', '-', '-', 0, 2, 72, '2019-01-16 01:42:23', '2019-01-16 01:42:23'),
(324, '81131414', 'PRAMDIKA HERDIAWAN', '-', '-', 0, 2, 6, '2019-01-16 01:42:34', '2019-01-16 01:42:34'),
(325, '93131827', 'GAZZA ABJATI', '-', '-', 0, 2, 72, '2019-01-16 01:42:37', '2019-01-16 01:42:37'),
(326, '88150406', 'THERZIAN RICHARD PERKASA', '-', '-', 0, 2, 6, '2019-01-16 01:42:49', '2019-01-16 01:42:49'),
(327, '91158406', 'BIMO SATRIYA DIKDAYA', '-', '-', 0, 2, 72, '2019-01-16 01:42:52', '2019-01-16 01:42:52'),
(328, '-', 'ANDRE DWI PRABOWO', '-', 'PT LOKATARA ABHINAYA', 1, 1, 1, '2019-01-16 01:43:02', '2019-01-24 07:42:59'),
(329, '-', 'KHARDIANTO R', '-', 'PT LOKATARA ABHINAYA', 1, 1, 1, '2019-01-16 01:43:02', '2019-01-25 02:40:08'),
(330, '91158583', 'M. AMROZI', '-', '-', 0, 2, 6, '2019-01-16 01:43:04', '2019-01-16 01:43:04'),
(331, '96158401', 'ACHMAD RAGIL ARDIANSYAH', '-', '-', 0, 2, 72, '2019-01-16 01:43:09', '2019-01-16 01:43:09'),
(332, '82156738', 'EKO PURNOMO A', '-', '-', 0, 2, 6, '2019-01-16 01:43:20', '2019-01-16 01:43:20'),
(333, '94131245', 'BAGUS LUKI SAPUTRA', '-', '-', 0, 2, 72, '2019-01-16 01:43:22', '2019-01-16 01:43:22'),
(334, '94153200', 'ANGGUN YULIANTO', '-', '-', 0, 2, 6, '2019-01-16 01:43:35', '2019-01-16 01:43:35'),
(335, '80140465', 'LULUK MUCHLIFATIN ALFARIDA', '-', '-', 0, 2, 72, '2019-01-16 01:43:43', '2019-01-16 01:43:43'),
(336, '93153187', 'MALIK IBRAHIM', '-', '-', 0, 2, 6, '2019-01-16 01:43:53', '2019-01-16 01:43:53'),
(337, '906129', 'DEDI WIRAWAN', '-', '-', 0, 2, 72, '2019-01-16 01:43:56', '2019-01-16 01:43:56'),
(338, '91154358', 'DENY ZAZULMI MULYONO', '-', '-', 0, 2, 72, '2019-01-16 01:44:08', '2019-01-16 01:44:08'),
(339, '97155722', 'DIMAS DWI PRASETYO', '-', '-', 0, 2, 6, '2019-01-16 01:44:09', '2019-01-16 01:44:09'),
(340, '84153197', 'M RIZAL MULTI ISKANDAR', '-', '-', 0, 2, 72, '2019-01-16 01:44:21', '2019-01-16 01:44:21'),
(341, '96156875', 'HAFID SAHRUS BUKHORI', '-', '-', 0, 2, 6, '2019-01-16 01:44:25', '2019-01-16 01:44:25'),
(342, '89158205', 'MICHAEL FEBRIANDO', '-', '-', 0, 2, 72, '2019-01-16 01:44:47', '2019-01-16 01:44:47'),
(343, '92156717', 'ISA MAGHDUM ZULFIKAR', '-', '-', 0, 2, 6, '2019-01-16 01:44:48', '2019-01-16 01:44:48'),
(344, '88156757', 'MUH ALFIAN WIDAYANTO', '-', '-', 0, 2, 72, '2019-01-16 01:45:00', '2019-01-16 01:45:00'),
(345, '90156740', 'ABDUL RAHMAT ASHARI', '-', '-', 0, 2, 6, '2019-01-16 01:45:03', '2019-01-16 01:45:03'),
(346, '95130614', 'IMANSYAH YUDHA LAKSANA', '-', '-', 0, 2, 72, '2019-01-16 01:45:16', '2019-01-16 01:45:16'),
(347, '94158661', 'GANI SETYAWAN', '-', '-', 0, 2, 6, '2019-01-16 01:45:17', '2019-01-16 01:45:17'),
(348, '18940118', 'TEDDY FH', '-', '-', 0, 2, 6, '2019-01-16 01:45:33', '2019-01-16 01:45:33'),
(349, '88130381', 'NION CAHYONO', '-', '-', 0, 2, 73, '2019-01-16 01:45:48', '2019-01-16 01:45:48'),
(350, '97156860', 'ANGGA PRASMADHI', '-', '-', 0, 2, 6, '2019-01-16 01:45:49', '2019-01-16 01:45:49'),
(351, '87150068', 'CHRISTOFEL IMANUEL RATU UDJU', '-', '-', 0, 2, 73, '2019-01-16 01:46:02', '2019-01-16 01:46:02'),
(352, '96159255', 'ACHMAD BAIDOWI', '-', '-', 0, 2, 73, '2019-01-16 01:46:16', '2019-01-16 01:46:16'),
(353, '88159243', 'TEGUH NANDA PRASETYO', '-', '-', 0, 2, 73, '2019-01-16 01:46:35', '2019-01-16 01:46:35'),
(354, '90159239', 'BUDI DARMAWAN', '-', '-', 0, 2, 73, '2019-01-16 01:46:46', '2019-01-16 01:46:46'),
(355, '90159245', 'FRANSISCUS FILOZKY BETEKENENG', '-', '-', 0, 2, 73, '2019-01-16 01:46:59', '2019-01-16 01:46:59'),
(356, '96150383', 'ALIEF VANLY D.', '-', '-', 0, 2, 73, '2019-01-16 01:47:11', '2019-01-16 01:47:11'),
(357, '86156723', 'NUR HASAN', '-', '-', 0, 2, 6, '2019-01-16 01:47:15', '2019-01-16 01:47:15'),
(358, '92159254', 'YOGA EKA PUTRA ARDIANSYAH', '-', '-', 0, 2, 73, '2019-01-16 01:47:22', '2019-01-16 01:47:22'),
(359, '89150137', 'MUCHAMMAD SAIFUDIN HANAFI', '-', '-', 0, 2, 73, '2019-01-16 01:47:38', '2019-01-16 01:47:38'),
(360, '88156714', 'HERMANSAH', '-', '-', 0, 2, 6, '2019-01-16 01:47:42', '2019-01-16 01:47:42'),
(361, '95130615', 'YOGA ADY PRATAMA', '-', '-', 0, 2, 73, '2019-01-16 01:47:52', '2019-01-16 01:47:52'),
(362, '92156769', 'HENDRO EKO WICAKSONO', '-', '-', 0, 2, 6, '2019-01-16 01:47:53', '2019-01-16 01:47:53'),
(363, '96158581', 'MOHAMAD ISKANDAR', '-', '-', 0, 2, 73, '2019-01-16 01:48:04', '2019-01-16 01:48:04'),
(364, '97170302', 'ALHAFIZ', '-', '-', 0, 2, 6, '2019-01-16 01:48:05', '2019-01-16 01:48:05'),
(365, '92150286', 'HENDRI NURCAHYO', '-', '-', 0, 2, 73, '2019-01-16 01:48:18', '2019-01-16 01:48:18'),
(366, '93152105', 'MOCH FAJAR', '-', '-', 0, 2, 6, '2019-01-16 01:48:20', '2019-01-16 01:48:20'),
(367, '86159249', 'OKKY SEFTIAN', '-', '-', 0, 2, 73, '2019-01-16 01:48:31', '2019-01-16 01:48:31'),
(368, '86156779', 'DECKY ARIFIANTO', '-', '-', 0, 2, 6, '2019-01-16 01:48:33', '2019-01-16 01:48:33'),
(369, '90159236', 'NIZAR HADI P', '-', '-', 0, 2, 73, '2019-01-16 01:48:43', '2019-01-16 01:48:43'),
(370, '92156741', 'SATRIA AJI MAULANA', '-', '-', 0, 2, 6, '2019-01-16 01:48:46', '2019-01-16 01:48:46'),
(371, '90153191', 'JIMMI FETO', '-', '-', 0, 2, 6, '2019-01-16 01:48:59', '2019-01-16 01:48:59'),
(372, '96158595', 'ANANTA KRISTIAWAN', '-', '-', 0, 2, 73, '2019-01-16 01:48:59', '2019-01-16 01:48:59'),
(373, '95158586', 'MOHAMMAD SOLIKIN', '-', '-', 0, 2, 73, '2019-01-16 01:49:12', '2019-01-16 01:49:12'),
(374, '94153208', 'GILANG CANDRA', '-', '-', 0, 2, 6, '2019-01-16 01:49:12', '2019-01-16 01:49:12'),
(375, '93156788', 'LUKMAN PRASETIYO', '-', '-', 0, 2, 6, '2019-01-16 01:49:26', '2019-01-16 01:49:26'),
(376, '91150141', 'WANWI RAMANDHA', '-', '-', 0, 2, 73, '2019-01-16 01:49:26', '2019-01-16 01:49:26'),
(377, '90150121', 'JOHAN NUR HABIBI', '-', '-', 0, 2, 73, '2019-01-16 01:49:37', '2019-01-16 01:49:37'),
(378, '81152080', 'RAHMAD TRIYADI', '-', '-', 0, 2, 6, '2019-01-16 01:49:38', '2019-01-16 01:49:38'),
(379, '91170022', 'FITRAH YASIN MUTTAQIN', '-', '-', 0, 2, 73, '2019-01-16 01:49:51', '2019-01-16 01:49:51'),
(380, '87156721', 'RONI HENDRAWAN HOENOWOE', '-', '-', 0, 2, 6, '2019-01-16 01:49:52', '2019-01-16 01:49:52'),
(381, '88158227', 'ZAINUL P.P.', '-', '-', 0, 2, 6, '2019-01-16 01:50:03', '2019-01-16 01:50:03'),
(382, '96150380', 'FITROH ABDUL KHANIF', '-', '-', 0, 2, 73, '2019-01-16 01:50:08', '2019-01-16 01:50:08'),
(383, '92156152', 'TEMMY ERLAZ KURNIA', '-', '-', 0, 2, 73, '2019-01-16 01:50:22', '2019-01-16 01:50:22'),
(384, '91150871', 'M. ZAINUDDIN N', '-', '-', 0, 2, 6, '2019-01-16 01:50:23', '2019-01-16 01:50:23'),
(385, '86150032', 'BUDY DHARMINTO', '-', '-', 0, 2, 73, '2019-01-16 01:50:35', '2019-01-16 01:50:35'),
(386, '90150408', 'YUSRON EFENDI', '-', '-', 0, 2, 6, '2019-01-16 01:50:57', '2019-01-16 01:50:57'),
(387, '91132052', 'RATRI FEBRIYANTO', '-', '-', 0, 2, 6, '2019-01-16 01:51:09', '2019-01-16 01:51:09'),
(388, '17900495', 'IMAM FARDI', '-', '-', 0, 2, 74, '2019-01-16 01:51:10', '2019-01-16 01:51:10'),
(389, '17910533', 'FIKRI ALIANSYAH', '-', '-', 0, 2, 74, '2019-01-16 01:51:56', '2019-01-16 01:51:56'),
(390, '86158531', 'JAINUL KRISTANTO', '-', '-', 0, 2, 74, '2019-01-16 01:52:10', '2019-01-16 01:52:10'),
(391, '92131676', 'WACHYU SETIAWAN', '-', '-', 0, 2, 6, '2019-01-16 01:52:10', '2019-01-16 01:52:10'),
(392, '97150432', 'HILMI ARIF HIDAYATULLAH', '-', '-', 0, 2, 74, '2019-01-16 01:52:21', '2019-01-16 01:52:21'),
(393, '18870037', 'WAHYUDI TRI HUTOMO', '-', '-', 0, 2, 6, '2019-01-16 01:52:27', '2019-01-16 01:52:27'),
(394, '93152077', 'IGARAH MAHARDIANTO', '-', '-', 0, 2, 74, '2019-01-16 01:52:31', '2019-01-16 01:52:31'),
(395, '89142296', 'M. AGUS H', '-', '-', 0, 2, 6, '2019-01-16 01:52:40', '2019-01-16 01:52:40'),
(396, '87158400', 'ARIF ZAINUR ROHMAN', '-', '-', 0, 2, 74, '2019-01-16 01:52:48', '2019-01-16 01:52:48'),
(397, '89170026', 'MOCH HANAFI', '-', '-', 0, 2, 6, '2019-01-16 01:52:51', '2019-01-16 01:52:51'),
(398, '93158409', 'ABDUL JAFAR', '-', '-', 0, 2, 74, '2019-01-16 01:53:02', '2019-01-16 01:53:02'),
(399, '91152092', 'ALIEF CHOIRON', '-', '-', 0, 2, 6, '2019-01-16 01:53:03', '2019-01-16 01:53:03'),
(400, '90160127', 'ANTONIUS NABABAN', '-', '-', 0, 2, 74, '2019-01-16 01:53:13', '2019-01-16 01:53:13'),
(401, '90158663', 'HENDRA SEPTYAWAN', '-', '-', 0, 2, 6, '2019-01-16 01:53:17', '2019-01-16 01:53:17'),
(402, '18940656', 'MIFTACHUL CHUSNUL MANAF', '-', '-', 0, 2, 74, '2019-01-16 01:53:31', '2019-01-16 01:53:31'),
(403, '94140483', 'DHEA APRILIANTO PUTRO RAHARJO', '-', '-', 0, 2, 6, '2019-01-16 01:53:31', '2019-01-16 01:53:31'),
(404, '94158555', 'RINNO EKA SETIAWAN', '-', '-', 0, 2, 6, '2019-01-16 01:53:44', '2019-01-16 01:53:44'),
(405, '89160064', 'DEDDY AFRIANTO', '-', '-', 0, 2, 6, '2019-01-16 01:53:55', '2019-01-16 01:53:55'),
(406, '86130496', 'PRASETYAWAN SULUH PAMBUDI', '-', '-', 0, 2, 75, '2019-01-16 01:54:00', '2019-01-16 01:54:00'),
(407, '90150407', 'SULTHON ARIF', '-', '-', 0, 2, 6, '2019-01-16 01:54:09', '2019-01-16 01:54:09'),
(408, '84130358', 'LASTIAN TRI ANNANDA', '-', '-', 0, 2, 75, '2019-01-16 01:54:13', '2019-01-16 01:54:13'),
(409, '94140477', 'RYAN ADAM', '-', '-', 0, 2, 6, '2019-01-16 01:54:21', '2019-01-16 01:54:21'),
(410, '83140461', 'PUTU SUASTAWA', '-', '-', 0, 2, 75, '2019-01-16 01:54:33', '2019-01-16 01:54:33'),
(411, '18900031', 'ONIE', '-', '-', 0, 2, 6, '2019-01-16 01:54:35', '2019-01-16 01:54:35'),
(412, '95131826', 'DODIK EKO WAHYUDI', '-', '-', 0, 2, 75, '2019-01-16 01:54:46', '2019-01-16 01:54:46'),
(413, '91153188', 'ELFRAN RIZKY', '-', '-', 0, 2, 6, '2019-01-16 01:54:49', '2019-01-16 01:54:49'),
(414, '95131945', 'ARIF RAHMAN HAKIM', '-', '-', 0, 2, 75, '2019-01-16 01:54:58', '2019-01-16 01:54:58'),
(415, '95154173', 'ERWIN WICAKSONO', '-', '-', 0, 2, 6, '2019-01-16 01:55:04', '2019-01-16 01:55:04'),
(416, '90131828', 'HENDRA SULISTIYO', '-', '-', 0, 2, 75, '2019-01-16 01:55:10', '2019-01-16 01:55:10'),
(417, '95160344', 'ILHAM KUKUH ISMAIL', '-', '-', 0, 2, 6, '2019-01-16 01:55:17', '2019-01-16 01:55:17'),
(418, '91131823', 'ARDY RAMADHAN', '-', '-', 0, 2, 75, '2019-01-16 01:55:23', '2019-01-16 01:55:23'),
(419, '99180263', 'VEJRYN SHAVIERO', '-', '-', 0, 2, 6, '2019-01-16 01:55:28', '2019-01-16 01:55:28'),
(420, '94142019', 'JUNAIDI KHAMID', '-', '-', 0, 2, 75, '2019-01-16 01:55:34', '2019-01-16 01:55:34'),
(421, '95150305', 'ANDI KURNIAWAN PRAKOSO', '-', '-', 0, 2, 75, '2019-01-16 01:55:45', '2019-01-16 01:55:45'),
(422, '93152120', 'SYAHRUL BACHTIAR', '-', '-', 0, 2, 75, '2019-01-16 01:55:56', '2019-01-16 01:55:56'),
(423, '95152106', 'MUHAMAD FARDIYANTO', '-', '-', 0, 2, 75, '2019-01-16 01:56:11', '2019-01-16 01:56:11'),
(424, '91152102', 'IRCHAMSYAH PURNAMA HALIM', '-', '-', 0, 2, 75, '2019-01-16 01:56:37', '2019-01-16 01:56:37'),
(425, '94152091', 'ALHAZMI WIBISONO', '-', '-', 0, 2, 75, '2019-01-16 01:56:54', '2019-01-16 01:56:54'),
(426, '96156748', 'KERY ANAS RISKIANTO', '-', '-', 0, 2, 77, '2019-01-16 01:56:57', '2019-01-16 01:56:57'),
(427, '95154359', 'EDWIN DAMARA EKO PRATAMA', '-', '-', 0, 2, 75, '2019-01-16 01:57:06', '2019-01-16 01:57:06'),
(428, '93152107', 'NOOR FADHLI DZIL IKRAM', '-', '-', 0, 2, 77, '2019-01-16 01:57:11', '2019-01-16 01:57:11'),
(429, '81154363', 'FERRY HADI SUSANTO', '-', '-', 0, 2, 75, '2019-01-16 01:57:24', '2019-01-16 01:57:24'),
(430, '94131410', 'AHMAD SYAIFUDIN', '-', '-', 0, 2, 77, '2019-01-16 01:57:26', '2019-01-16 01:57:26'),
(431, '96158520', 'HENDRIK WINARNO', '-', '-', 0, 2, 75, '2019-01-16 01:57:35', '2019-01-16 01:57:35'),
(432, '95131819', 'AHMAD SABRI', '-', '-', 0, 2, 77, '2019-01-16 01:57:39', '2019-01-16 01:57:39'),
(433, '94158551', 'EKO PUTRO AJI PURNOMO', '-', '-', 0, 2, 75, '2019-01-16 01:57:48', '2019-01-16 01:57:48'),
(434, '-', 'ADITIA MUSLIH', '0813-2188-3872', 'PT NEC', 0, 1, 1, '2019-01-16 01:58:22', '2019-01-16 01:58:22'),
(435, '-', 'HANDISAPTO', '-', 'PT NEC', 0, 1, 1, '2019-01-16 01:58:22', '2019-01-16 01:58:22'),
(436, '-', 'AUGUST PARDOMUAN', '-', 'PT NEC', 0, 1, 1, '2019-01-16 01:58:22', '2019-01-16 01:58:22'),
(437, '-', 'RAYNHARD SIMAMORA', '-', 'PT NEC', 0, 1, 1, '2019-01-16 01:58:23', '2019-01-16 01:58:23'),
(438, '-', 'M AMIN', '-', 'PT NEC', 0, 1, 1, '2019-01-16 01:58:23', '2019-01-16 01:58:23'),
(439, '-', 'FIRMAN SUNGKOWO', '-', 'PT NEC', 0, 1, 1, '2019-01-16 01:58:23', '2019-01-16 01:58:23'),
(440, '-', 'NIKKO SIANPAR', '-', 'PT NEC', 0, 1, 1, '2019-01-16 01:58:23', '2019-01-16 01:58:23'),
(441, '-', 'RADHO MARTDIKA', '-', 'PT NEC', 0, 1, 1, '2019-01-16 01:58:23', '2019-01-16 01:58:23'),
(442, '-', 'TISNA AKBAR S', '-', 'PT NEC', 0, 1, 1, '2019-01-16 01:58:23', '2019-01-16 01:58:23'),
(443, '-', 'ERIK PAWUH', '-', 'PT NEC', 0, 1, 1, '2019-01-16 01:58:23', '2019-01-16 01:58:23'),
(444, '-', 'MAULANA FAUZAN', '-', 'PT NEC', 0, 1, 1, '2019-01-16 01:58:23', '2019-01-16 01:58:23'),
(445, '-', 'FIRDAUS RACHMAWAN', '-', 'PT NEC', 0, 1, 1, '2019-01-16 01:58:23', '2019-01-16 01:58:23'),
(446, '-', 'ISMU YUNIARTO', '-', 'PT NEC', 0, 1, 1, '2019-01-16 01:58:23', '2019-01-16 01:58:23'),
(447, '-', 'SISWANTO', '-', 'PT NEC', 0, 1, 1, '2019-01-16 01:58:23', '2019-01-16 01:58:23'),
(448, '-', 'AGUS SETIYONO', '-', 'PT NEC', 0, 1, 1, '2019-01-16 01:58:23', '2019-01-16 01:58:23'),
(449, '-', 'AHMAD NURFADILLAH S', '-', 'PT NEC', 0, 1, 1, '2019-01-16 01:58:23', '2019-01-16 01:58:23'),
(450, '-', 'FAJAR FAUZAN', '-', 'PT NEC', 0, 1, 1, '2019-01-16 01:58:23', '2019-01-16 01:58:23'),
(451, '-', 'IYANG SURYANA', '-', 'PT NEC', 0, 1, 1, '2019-01-16 01:58:23', '2019-01-16 01:58:23'),
(452, '-', 'RIDWAN HERMAWAN', '-', 'PT NEC', 0, 1, 1, '2019-01-16 01:58:23', '2019-01-16 01:58:23'),
(453, '-', 'FAJAR ALIF NUGRAHA', '-', 'PT NEC', 0, 1, 1, '2019-01-16 01:58:23', '2019-01-16 01:58:23'),
(454, '-', 'DADAN RAMDANI', '-', 'PT NEC', 0, 1, 1, '2019-01-16 01:58:23', '2019-01-16 01:58:23'),
(455, '-', 'SURYA WIJAYA', '-', 'PT NEC', 0, 1, 1, '2019-01-16 01:58:23', '2019-01-16 01:58:23'),
(456, '-', 'YUDI DWI S', '-', 'PT NEC', 0, 1, 1, '2019-01-16 01:58:23', '2019-01-16 01:58:23'),
(457, '-', 'RIDHO RAMANSYAH', '-', 'PT NEC', 0, 1, 1, '2019-01-16 01:58:23', '2019-01-16 01:58:23'),
(458, '94132054', 'IKWAN TRI ANANDA', '-', '-', 0, 2, 77, '2019-01-16 01:59:21', '2019-01-16 01:59:21'),
(459, '97158563', 'NOWO ASMORO', '-', '-', 0, 2, 75, '2019-01-16 01:59:24', '2019-01-16 01:59:24'),
(460, '94131829', 'JOLIAN CHRISNANTO', '-', '-', 0, 2, 77, '2019-01-16 01:59:38', '2019-01-16 01:59:38'),
(461, '94158534', 'WAHYU KURNIAWAN', '-', '-', 0, 2, 75, '2019-01-16 01:59:40', '2019-01-16 01:59:40'),
(462, '95132055', 'LUTFI ZARKASI', '-', '-', 0, 2, 77, '2019-01-16 01:59:50', '2019-01-16 01:59:50'),
(463, '95158553', 'EKO SUPRIANTO', '-', '-', 0, 2, 75, '2019-01-16 01:59:54', '2019-01-16 01:59:54'),
(464, '95132046', 'MOCH ROSICHOL AMIN', '-', '-', 0, 2, 77, '2019-01-16 02:00:05', '2019-01-16 02:00:05'),
(465, '95158525', 'RADEA RISTIAN BACHRI', '-', '-', 0, 2, 75, '2019-01-16 02:00:17', '2019-01-16 02:00:17'),
(466, '93131244', 'AZHAR BAIZAN', '-', '-', 0, 2, 77, '2019-01-16 02:00:24', '2019-01-16 02:00:24'),
(467, '83158537', 'RUBIYANTONO', '-', '-', 0, 2, 75, '2019-01-16 02:00:30', '2019-01-16 02:00:30'),
(468, '80152113', 'RENDRA PRAHASTA', '-', '-', 0, 2, 77, '2019-01-16 02:00:37', '2019-01-16 02:00:37'),
(469, '96158556', 'DANU ERWANDA', '-', '-', 0, 2, 75, '2019-01-16 02:00:42', '2019-01-16 02:00:42'),
(470, '92132051', 'EKA YUSAK SURYANTO', '-', '-', 0, 2, 77, '2019-01-16 02:00:50', '2019-01-16 02:00:50'),
(471, '95131816', 'ABDUL MUHAIMI AZIS', '-', '-', 0, 2, 75, '2019-01-16 02:00:53', '2019-01-16 02:00:53'),
(472, '86141325', 'FEMMY EL FALAH ABIDIN', '-', '-', 0, 2, 77, '2019-01-16 02:01:02', '2019-01-16 02:01:02'),
(473, '82158590', 'YULIANTO', '-', '-', 0, 2, 75, '2019-01-16 02:01:05', '2019-01-16 02:01:05'),
(474, '88152103', 'IWAN HADI SUSANTO', '-', '-', 0, 2, 77, '2019-01-16 02:01:15', '2019-01-16 02:01:15'),
(475, '96158562', 'AGUSTIN DWI RANDA', '-', '-', 0, 2, 75, '2019-01-16 02:01:18', '2019-01-16 02:01:18'),
(476, '80152064', 'ARIF SETIAWAN', '-', '-', 0, 2, 77, '2019-01-16 02:01:28', '2019-01-16 02:01:28'),
(477, '17800068', 'BURHAN ALAMSYAH SIREGAR', '-', '-', 0, 2, 75, '2019-01-16 02:01:36', '2019-01-16 02:01:36'),
(478, '93142011', 'MUH. HANDY SYAIFULLOH', '-', '-', 0, 2, 77, '2019-01-16 02:01:42', '2019-01-16 02:01:42'),
(479, '94153201', 'ANDIKA PRASETYA', '-', '-', 0, 2, 77, '2019-01-16 02:01:56', '2019-01-16 02:01:56'),
(480, '88154367', 'RIZAL OKTIYANSA', '-', '-', 0, 2, 78, '2019-01-16 02:02:08', '2019-01-16 02:02:08'),
(481, '95142012', 'BAGUS ANDYANTO', '-', '-', 0, 2, 77, '2019-01-16 02:02:09', '2019-01-16 02:02:09'),
(482, '94131938', 'SRI ANDOYO', '-', '-', 0, 2, 78, '2019-01-16 02:02:22', '2019-01-16 02:02:22'),
(483, '96158574', 'ERWANTO', '-', '-', 0, 2, 77, '2019-01-16 02:02:24', '2019-01-16 02:02:24'),
(484, '89131241', 'ARIK SISWANTO', '-', '-', 0, 2, 77, '2019-01-16 02:02:39', '2019-01-16 02:02:39'),
(485, '885768', 'RIZKY EKA SYAHPUTRA', '-', '-', 0, 2, 79, '2019-01-16 02:02:47', '2019-01-16 02:02:47'),
(486, '81154183', 'SUNGARIONO', '-', '-', 0, 2, 77, '2019-01-16 02:02:55', '2019-01-16 02:02:55'),
(487, '90131824', 'BIANTORO SUNARYO', '-', '-', 0, 2, 79, '2019-01-16 02:02:59', '2019-01-16 02:02:59'),
(488, '88140476', 'BAGAS ANOM LEOSTYA GONGGO', '-', '-', 0, 2, 79, '2019-01-16 02:03:14', '2019-01-16 02:03:14'),
(489, '90150860', 'TRIYUL IDAMSAR', '-', '-', 0, 2, 79, '2019-01-16 02:03:24', '2019-01-16 02:03:24'),
(490, '93156758', 'M NUR CHOLIS SETIAWAN', '-', '-', 0, 2, 77, '2019-01-16 02:03:27', '2019-01-16 02:03:27'),
(491, '78152124', 'WARSITO', '-', '-', 0, 2, 77, '2019-01-16 02:03:43', '2019-01-16 02:03:43'),
(492, '91150310', 'ALDI FIRMANDA SETIAWAN', '-', '-', 0, 2, 79, '2019-01-16 02:03:45', '2019-01-16 02:03:45'),
(493, '95131259', 'SAQINA DAMAYANTI', '-', '-', 0, 2, 79, '2019-01-16 02:03:56', '2019-01-16 02:03:56');
INSERT INTO `picmitra` (`id`, `nik`, `nama`, `kontak`, `keterangan`, `statusNda`, `idPerusahaan`, `idUnitPerusahaan`, `created_at`, `updated_at`) VALUES
(494, '97158714', 'M ALDIANSYAH RAMADHANI', '-', '-', 0, 2, 77, '2019-01-16 02:03:56', '2019-01-16 02:03:56'),
(495, '91150872', 'MOHAMAD YUSUF YUDHA', '-', '-', 0, 2, 79, '2019-01-16 02:04:08', '2019-01-16 02:04:08'),
(496, '91158410', 'SUTRIS', '-', '-', 0, 2, 80, '2019-01-16 02:04:20', '2019-01-16 02:04:20'),
(497, '85140466', 'DIDIK SUPRIYADI', '-', '-', 0, 2, 80, '2019-01-16 02:04:34', '2019-01-16 02:04:34'),
(498, '89154362', 'FATHONI BAGUS FILQOLBI', '-', '-', 0, 2, 80, '2019-01-16 02:04:46', '2019-01-16 02:04:46'),
(499, '76152119', 'SUGIARTO', '-', '-', 0, 2, 80, '2019-01-16 02:04:57', '2019-01-16 02:04:57'),
(500, '94156746', 'AFIF RISYAF', '-', '-', 0, 2, 80, '2019-01-16 02:05:10', '2019-01-16 02:05:10'),
(501, '93156709', 'RANNAN OCTA R', '-', '-', 0, 2, 80, '2019-01-16 02:05:21', '2019-01-16 02:05:21'),
(502, '91156773', 'ROESADI', '-', '-', 0, 2, 80, '2019-01-16 02:05:32', '2019-01-16 02:05:32'),
(503, '93156756', 'M. REZA RIZAL', '-', '-', 0, 2, 80, '2019-01-16 02:05:44', '2019-01-16 02:05:44'),
(504, '93156719', 'RIZKI ARDI PRABOWO', '-', '-', 0, 2, 80, '2019-01-16 02:05:57', '2019-01-16 02:05:57'),
(505, '90130737', 'ADY PRIYO PAMUNGKAS', '-', '-', 0, 2, 76, '2019-01-16 02:06:15', '2019-01-16 02:06:15'),
(506, '93132040', 'BAYU AGUS SAPUTRO', '-', '-', 0, 2, 76, '2019-01-16 02:06:33', '2019-01-16 02:06:33'),
(507, '93140491', 'HARY AGUNG PRATAMA', '-', '-', 0, 2, 76, '2019-01-16 02:07:12', '2019-01-16 02:07:12'),
(508, '96141844', 'ULUFUL VUNUN', '-', '-', 0, 2, 76, '2019-01-16 02:07:38', '2019-01-16 02:07:38'),
(509, '92131754', 'I WAYAN SURYA PERDANA', '-', '-', 0, 2, 76, '2019-01-16 02:07:57', '2019-01-16 02:07:57'),
(510, '86154354', 'ALFAN', '-', '-', 0, 2, 76, '2019-01-16 02:08:14', '2019-01-16 02:08:14'),
(511, '79158569', 'HANAFI', '-', '-', 0, 2, 76, '2019-01-16 02:08:30', '2019-01-16 02:08:30'),
(512, '86152094', 'ARIFIN', '-', '-', 0, 2, 76, '2019-01-16 02:08:44', '2019-01-16 02:08:44'),
(513, '97158524', 'HENDRY SYAHPUTRA', '-', '-', 0, 2, 76, '2019-01-16 02:08:59', '2019-01-16 02:08:59'),
(514, '92158571', 'ARIF MA\'RUF', '-', '-', 0, 2, 76, '2019-01-16 02:09:29', '2019-01-16 02:09:29'),
(515, '95160316', 'IMAM MALIKI', '-', '-', 0, 2, 76, '2019-01-16 02:09:45', '2019-01-16 02:09:45'),
(516, '97160337', 'ROZY BILLY HERMAWAN', '-', '-', 0, 2, 76, '2019-01-16 02:10:04', '2019-01-16 02:10:04'),
(517, '95160315', 'SYAMSUL HILMI AZIS', '-', '-', 0, 2, 76, '2019-01-16 02:10:19', '2019-01-16 02:10:19'),
(518, '95160313', 'M RIZAL YOGASWARA', '-', '-', 0, 2, 76, '2019-01-16 02:10:32', '2019-01-16 02:10:32'),
(519, '95160314', 'YANUAR YAZID AMRI', '-', '-', 0, 2, 76, '2019-01-16 02:10:46', '2019-01-16 02:10:46'),
(520, '-', 'PUPUT SETYAWAN', '0815-8480-8878', 'MITRATEL-PT PERSADA', 0, 1, 1, '2019-01-16 02:10:48', '2019-01-16 02:10:48'),
(521, '-', 'BAYU RAJASA IRAWAN', '-', 'MITRATEL-PT PERSADA', 0, 1, 1, '2019-01-16 02:10:48', '2019-01-16 02:10:48'),
(522, '-', 'HENDRY', '-', 'MITRATEL-PT PERSADA', 0, 1, 1, '2019-01-16 02:10:48', '2019-01-16 02:10:48'),
(523, '-', 'HERI WAHYUDI', '-', 'MITRATEL-PT PERSADA', 0, 1, 1, '2019-01-16 02:10:48', '2019-01-16 02:10:48'),
(524, '-', 'CHOIRUL HAJIS', '-', 'MITRATEL-PT PERSADA', 0, 1, 1, '2019-01-16 02:10:48', '2019-01-16 02:10:48'),
(525, '-', 'DEDI JOKO P', '-', 'MITRATEL-PT PERSADA', 0, 1, 1, '2019-01-16 02:10:48', '2019-01-16 02:10:48'),
(526, '-', 'CHRISTOFFEL BENYAMIN', '-', 'MITRATEL-PT PERSADA', 0, 1, 1, '2019-01-16 02:10:48', '2019-01-16 02:10:48'),
(527, '-', 'ROBI SETYAWAN', '-', 'MITRATEL-PT PERSADA', 0, 1, 1, '2019-01-16 02:10:48', '2019-01-16 02:10:48'),
(528, '-', 'SULISTIYARNO', '-', 'MITRATEL-PT PERSADA', 0, 1, 1, '2019-01-16 02:10:48', '2019-01-16 02:10:48'),
(529, '-', 'HASEP ADITYA A', '-', 'MITRATEL-PT PERSADA', 0, 1, 1, '2019-01-16 02:10:48', '2019-01-16 02:10:48'),
(530, '-', 'RIFKI ZULFAHMI Z', '-', 'MITRATEL-PT PERSADA', 0, 1, 1, '2019-01-16 02:10:48', '2019-01-16 02:10:48'),
(531, '-', 'ANDA WIRMAN', '-', 'MITRATEL-PT PERSADA', 0, 1, 1, '2019-01-16 02:10:48', '2019-01-16 02:10:48'),
(532, '-', 'SANAN', '-', 'MITRATEL-PT PERSADA', 0, 1, 1, '2019-01-16 02:10:48', '2019-01-16 02:10:48'),
(533, '-', 'SUHERMAN', '-', 'MITRATEL-PT PERSADA', 0, 1, 1, '2019-01-16 02:10:48', '2019-01-16 02:10:48'),
(534, '-', 'DANI BAGUS F', '-', 'MITRATEL-PT PERSADA', 0, 1, 1, '2019-01-16 02:10:48', '2019-01-16 02:10:48'),
(535, '-', 'SALIM MAHDI', '-', 'MITRATEL-PT PERSADA', 0, 1, 1, '2019-01-16 02:10:48', '2019-01-16 02:10:48'),
(536, '-', 'ARIF KRISTIAN W', '-', 'MITRATEL-PT PERSADA', 0, 1, 1, '2019-01-16 02:10:48', '2019-01-16 02:10:48'),
(537, '-', 'ARIFIN NUR CHOLIS', '-', 'MITRATEL-PT PERSADA', 0, 1, 1, '2019-01-16 02:10:48', '2019-01-16 02:10:48'),
(538, '-', 'DWI FERRI', '-', 'MITRATEL-PT PERSADA', 0, 1, 1, '2019-01-16 02:10:49', '2019-01-16 02:10:49'),
(539, '-', 'AWANG', '-', 'MITRATEL-PT PERSADA', 0, 1, 1, '2019-01-16 02:10:49', '2019-01-16 02:10:49'),
(540, '97160335', 'M. GWINTARA SANDHA YUDHA', '-', '-', 0, 2, 76, '2019-01-16 02:10:58', '2019-01-16 02:10:58'),
(541, '94131242', 'ARIS BAGUS HARDIANTO', '-', '-', 0, 2, 76, '2019-01-16 02:11:21', '2019-01-16 02:11:21'),
(542, '96159253', 'MOCK. FADIL RIEFKY', '-', '-', 0, 2, 76, '2019-01-16 02:11:32', '2019-01-16 02:11:32'),
(543, '94140480', 'DIDIN JULI ANTO', '-', '-', 0, 2, 76, '2019-01-16 02:11:49', '2019-01-16 02:11:49'),
(544, '91140034', 'MUHAMMAD FAHMY AKBAR', '-', '-', 0, 2, 81, '2019-01-16 02:12:04', '2019-01-16 02:12:04'),
(545, '94132053', 'MUHAMMAD ARIES FIRDAUS', '-', '-', 0, 2, 76, '2019-01-16 02:12:12', '2019-01-16 02:12:12'),
(546, '17860413', 'MOCH ABDUL GAFUR', '-', '-', 0, 2, 81, '2019-01-16 02:12:17', '2019-01-16 02:12:17'),
(547, '93141350', 'ADI REZKY HASAN M', '-', '-', 0, 2, 76, '2019-01-16 02:12:30', '2019-01-16 02:12:30'),
(548, '89142157', 'AJI DEBINTAR BASRI', '-', '-', 0, 2, 81, '2019-01-16 02:12:36', '2019-01-16 02:12:36'),
(549, '92170284', 'ADI SETIAWAN', '-', '-', 0, 2, 76, '2019-01-16 02:12:44', '2019-01-16 02:12:44'),
(550, '90142158', 'BUKORI HASYIM ASHARI', '-', '-', 0, 2, 81, '2019-01-16 02:12:45', '2019-01-16 02:12:45'),
(551, '96156784', 'DIMAS OKASA', '-', '-', 0, 2, 81, '2019-01-16 02:12:56', '2019-01-16 02:12:56'),
(552, '85131834', 'TURANGGA BAYU', '-', '-', 0, 2, 76, '2019-01-16 02:13:01', '2019-01-16 02:13:01'),
(553, '99170426', 'MUH DIMAS ZULFIANTO', '-', '-', 0, 2, 81, '2019-01-16 02:13:05', '2019-01-16 02:13:05'),
(554, '94158223', 'NURUL FALAH ALMUJAHID', '-', '-', 0, 2, 76, '2019-01-16 02:13:16', '2019-01-16 02:13:16'),
(555, '97170641', 'AHMAD HENDRI KHOIRUDIN', '-', '-', 0, 2, 81, '2019-01-16 02:13:16', '2019-01-16 02:13:16'),
(556, '-', 'I WAYAN RUDY ARTHA', '-', '-', 0, 3, 18, '2019-01-16 02:13:21', '2019-01-16 02:13:21'),
(557, '94170544', 'ANGGA WAHYU PRADANA SIREGAR', '-', '-', 0, 2, 81, '2019-01-16 02:13:28', '2019-01-16 02:13:28'),
(558, '-', 'ACHMAD FADLIL CHUSNI', '-', '-', 0, 3, 18, '2019-01-16 02:13:30', '2019-01-16 02:13:30'),
(559, '95158192', 'TRI SUTRISNO', '-', '-', 0, 2, 76, '2019-01-16 02:13:33', '2019-01-16 02:13:33'),
(560, '93170486', 'FERDIANSYAH', '-', '-', 0, 2, 81, '2019-01-16 02:13:40', '2019-01-16 02:13:40'),
(561, '-', 'HARSANTO', '-', '-', 0, 3, 18, '2019-01-16 02:13:42', '2019-01-16 02:13:42'),
(562, '90156745', 'ERZA FAUZY', '-', '-', 0, 2, 76, '2019-01-16 02:13:47', '2019-01-16 02:13:47'),
(563, '-', 'EKO MARDIANTO', '-', '-', 0, 3, 18, '2019-01-16 02:13:53', '2019-01-16 02:13:53'),
(564, '98170782', 'MUFID MAULANA', '-', '-', 0, 2, 81, '2019-01-16 02:13:55', '2019-01-16 02:13:55'),
(565, '97158195', 'AGUS RIANTO', '-', '-', 0, 2, 76, '2019-01-16 02:14:00', '2019-01-16 02:14:00'),
(566, '-', 'HUSEN', '-', '-', 0, 3, 18, '2019-01-16 02:14:04', '2019-01-16 02:14:04'),
(567, '93170487', 'AGUNG SETIAWAN', '-', '-', 0, 2, 81, '2019-01-16 02:14:09', '2019-01-16 02:14:09'),
(568, '-', 'IRVAN ALPJIAN ZULKARNAIN', '-', '-', 0, 3, 18, '2019-01-16 02:14:14', '2019-01-16 02:14:14'),
(569, '97158580', 'ACHMAD CHILMI', '-', '-', 0, 2, 76, '2019-01-16 02:14:15', '2019-01-16 02:14:15'),
(570, '93153933', 'MUHAMMAD ARGA PRIHANTO', '-', '-', 0, 2, 81, '2019-01-16 02:14:25', '2019-01-16 02:14:25'),
(571, '-', 'AULIA BAHAR PERNAMA', '-', '-', 0, 3, 18, '2019-01-16 02:14:26', '2019-01-16 02:14:26'),
(572, '94153934', 'ABDUL AZIZ SEPTIAWAN', '-', '-', 0, 2, 81, '2019-01-16 02:14:35', '2019-01-16 02:14:35'),
(573, '-', 'AGUS ROBY SUWELA', '-', '-', 0, 3, 19, '2019-01-16 02:14:37', '2019-01-16 02:14:37'),
(574, '87158570', 'ADI PUTRO', '-', '-', 0, 2, 76, '2019-01-16 02:14:38', '2019-01-16 02:14:38'),
(575, '93153935', 'MUCHLIZARDI PAYONG BOGE', '-', '-', 0, 2, 81, '2019-01-16 02:14:46', '2019-01-16 02:14:46'),
(576, '89160063', 'DENNY SETIAWAN', '-', '-', 0, 2, 76, '2019-01-16 02:14:52', '2019-01-16 02:14:52'),
(577, '-', 'TAUFIQ YUNARSO', '-', '-', 0, 3, 20, '2019-01-16 02:14:57', '2019-01-16 02:14:57'),
(578, '74158411', 'IDONG YUNUS PURNOMO', '-', '-', 0, 2, 76, '2019-01-16 02:15:05', '2019-01-16 02:15:05'),
(579, '91153937', 'YUNUS OKTA DWI PRASETYO', '-', '-', 0, 2, 81, '2019-01-16 02:15:05', '2019-01-16 02:15:05'),
(580, '-', 'FREDDY', '-', '-', 0, 3, 20, '2019-01-16 02:15:09', '2019-01-16 02:15:09'),
(581, '90159260', 'WAWAN KURNIAWAN PUTRA', '-', '-', 0, 2, 76, '2019-01-16 02:15:19', '2019-01-16 02:15:19'),
(582, '84158528', 'JULI DENI SETIAWAN', '-', '-', 0, 2, 81, '2019-01-16 02:15:20', '2019-01-16 02:15:20'),
(583, '-', 'TERASOKA', '-', '-', 0, 3, 20, '2019-01-16 02:15:24', '2019-01-16 02:15:24'),
(584, '20980557', 'YUDISTIRA VEGANATA', '-', '-', 0, 2, 76, '2019-01-16 02:15:33', '2019-01-16 02:15:33'),
(585, '-', 'DODIK IRAWAN', '-', '-', 1, 3, 20, '2019-01-16 02:15:35', '2019-01-23 07:30:53'),
(586, '87158536', 'ARIEF AGUSTAN', '-', '-', 0, 2, 81, '2019-01-16 02:15:37', '2019-01-16 02:15:37'),
(587, '20980558', 'ACHMAD APRIADI PRATAMA', '-', '-', 0, 2, 76, '2019-01-16 02:15:47', '2019-01-16 02:15:47'),
(588, '-', 'SATRIYO WICAKSONO', '-', '-', 0, 3, 21, '2019-01-16 02:15:48', '2019-01-16 02:15:48'),
(589, '90158564', 'MOCH AMIN', '-', '-', 0, 2, 81, '2019-01-16 02:15:51', '2019-01-16 02:15:51'),
(590, '-', 'CAHYA PURNAMA DANI', '-', '-', 0, 3, 21, '2019-01-16 02:15:56', '2019-01-16 02:15:56'),
(591, '-', 'ANWAR TRI ADMAJA', '-', '-', 0, 3, 21, '2019-01-16 02:16:06', '2019-01-16 02:16:06'),
(592, '91158527', 'INDRA LESMANA', '-', '-', 0, 2, 81, '2019-01-16 02:16:08', '2019-01-16 02:16:08'),
(593, '-', 'RISKY DWI PAYANA', '-', '-', 0, 3, 21, '2019-01-16 02:16:15', '2019-01-16 02:16:15'),
(594, '92158535', 'FEBRIANTO WICAKSONO', '-', '-', 0, 2, 81, '2019-01-16 02:16:19', '2019-01-16 02:16:19'),
(595, '-', 'ARIEF PRAMONO', '-', '-', 0, 3, 21, '2019-01-16 02:16:27', '2019-01-16 02:16:27'),
(596, '92158572', 'HAFID MUZZANNI', '-', '-', 0, 2, 81, '2019-01-16 02:16:31', '2019-01-16 02:16:31'),
(597, '92158594', 'ANDRI ANTO FIRMANSYAH', '-', '-', 0, 2, 81, '2019-01-16 02:16:42', '2019-01-16 02:16:42'),
(598, '-', 'M NUR SUBHI', '-', '-', 0, 3, 22, '2019-01-16 02:16:53', '2019-01-16 02:16:53'),
(599, '94158546', 'SURYA WAHYU ANGGODO', '-', '-', 0, 2, 81, '2019-01-16 02:16:54', '2019-01-16 02:16:54'),
(600, '95158683', 'RAHMADANI YANUAR WINATA', '-', '-', 0, 2, 81, '2019-01-16 02:17:04', '2019-01-16 02:17:04'),
(601, '-', 'ISTAS PRATOMO', '-', '-', 0, 3, 22, '2019-01-16 02:17:05', '2019-01-16 02:17:05'),
(602, '94150438', 'M. FAQIH NUR ASGAF', '-', '-', 0, 2, 81, '2019-01-16 02:17:19', '2019-01-16 02:17:19'),
(603, '89160072', 'NUZUL IKRAM DJOHAR', '-', '-', 0, 2, 81, '2019-01-16 02:17:31', '2019-01-16 02:17:31'),
(604, '-', 'ARIEF KURNIAWAN', '-', '-', 0, 3, 23, '2019-01-16 02:17:32', '2019-01-16 02:17:32'),
(605, '20970634', 'MUHAMMAD ASWIN PURAWIJAYA', '-', '-', 0, 2, 76, '2019-01-16 02:17:36', '2019-01-16 02:17:36'),
(606, '97160411', 'BAGAS JAYA PRADANA', '-', '-', 0, 2, 81, '2019-01-16 02:17:41', '2019-01-16 02:17:41'),
(607, '-', 'HARUN NOVIAR', '-', '-', 0, 3, 23, '2019-01-16 02:17:44', '2019-01-16 02:17:44'),
(608, '20960584', 'MUKHAMMAD DAWUD YUSUF', '-', '-', 0, 2, 76, '2019-01-16 02:17:50', '2019-01-16 02:17:50'),
(609, '93160416', 'NATHANAEL TH LAZARUS', '-', '-', 0, 2, 81, '2019-01-16 02:17:52', '2019-01-16 02:17:52'),
(610, '-', 'RIZKI ADRIANSYAH', '-', '-', 0, 3, 23, '2019-01-16 02:17:56', '2019-01-16 02:17:56'),
(611, '20930603', 'RUBEN ARI WIDODO', '-', '-', 0, 2, 76, '2019-01-16 02:18:04', '2019-01-16 02:18:04'),
(612, '90160161', 'ASWIN DARMAWAN', '-', '-', 0, 2, 81, '2019-01-16 02:18:05', '2019-01-16 02:18:05'),
(613, '-', 'HANDOKO SUSANTO', '-', '-', 0, 3, 24, '2019-01-16 02:18:09', '2019-01-16 02:18:09'),
(614, '-', 'IVAN CRISTIAN', '-', '-', 0, 3, 24, '2019-01-16 02:18:18', '2019-01-16 02:18:18'),
(615, '94160328', 'WISNU HERNINDYA NOVIANTORO', '-', '-', 0, 2, 81, '2019-01-16 02:18:19', '2019-01-16 02:18:19'),
(616, '20940478', 'FRILANATA PUTERA YUWONO', '-', '-', 0, 2, 76, '2019-01-16 02:18:25', '2019-01-16 02:18:25'),
(617, '-', 'SANTI ARYANI', '-', '-', 0, 3, 24, '2019-01-16 02:18:29', '2019-01-16 02:18:29'),
(618, '95160366', 'AGI HARIAWAN SUYITNO', '-', '-', 0, 2, 81, '2019-01-16 02:18:30', '2019-01-16 02:18:30'),
(619, '20940479', 'AGUS SANTOSO', '-', '-', 0, 2, 76, '2019-01-16 02:18:39', '2019-01-16 02:18:39'),
(620, '-', 'FEBBY', '-', '-', 0, 3, 24, '2019-01-16 02:18:39', '2019-01-16 02:18:39'),
(621, '92160298', 'HENDRA ADI LESMANA', '-', '-', 0, 2, 81, '2019-01-16 02:18:41', '2019-01-16 02:18:41'),
(622, '-', 'DANDY', '-', '-', 0, 3, 24, '2019-01-16 02:18:49', '2019-01-16 02:18:49'),
(623, '93160355', 'AINUL YAQIN PUJI WALAYANSA', '-', '-', 0, 2, 81, '2019-01-16 02:18:51', '2019-01-16 02:18:51'),
(624, '94156705', 'ANSORI', '-', '-', 0, 2, 76, '2019-01-16 02:18:56', '2019-01-16 02:18:56'),
(625, '91170089', 'LALITH MUHAMMAD RAFANDANI', '-', '-', 0, 2, 81, '2019-01-16 02:19:01', '2019-01-16 02:19:01'),
(626, '-', 'AGUNG', '-', '-', 0, 3, 24, '2019-01-16 02:19:01', '2019-01-16 02:19:01'),
(627, '95170016', 'AHMAD SHODIQIN', '-', '-', 0, 2, 76, '2019-01-16 02:19:08', '2019-01-16 02:19:08'),
(628, '-', 'EKO', '-', '-', 0, 3, 24, '2019-01-16 02:19:12', '2019-01-16 02:19:12'),
(629, '87153233', 'ADHIT SATRIA HARENDRO', '-', '-', 0, 2, 81, '2019-01-16 02:19:18', '2019-01-16 02:19:18'),
(630, '95156901', 'IRSAN SAHABI', '-', '-', 0, 2, 76, '2019-01-16 02:19:19', '2019-01-16 02:19:19'),
(631, '-', 'WAHYU', '-', '-', 0, 3, 24, '2019-01-16 02:19:24', '2019-01-16 02:19:24'),
(632, '93158575', 'ACHMAT BUDIONO', '-', '-', 0, 2, 81, '2019-01-16 02:19:27', '2019-01-16 02:19:27'),
(633, '96158611', 'IMAM ADI FIRMANSYAH', '-', '-', 0, 2, 76, '2019-01-16 02:19:33', '2019-01-16 02:19:33'),
(634, '93158607', 'AFRIZAL JUNAEDI', '-', '-', 0, 2, 81, '2019-01-16 02:19:38', '2019-01-16 02:19:38'),
(635, '95156711', 'WAHYUDI RIYANTO', '-', '-', 0, 2, 76, '2019-01-16 02:19:45', '2019-01-16 02:19:45'),
(636, '96158547', 'ALVIN ARDIAN RAHMANA', '-', '-', 0, 2, 81, '2019-01-16 02:19:49', '2019-01-16 02:19:49'),
(637, '-', 'WILSON HUTAGAOL', '-', '-', 0, 3, 25, '2019-01-16 02:19:56', '2019-01-16 02:19:56'),
(638, '97156734', 'ARGA ANDI SAPUTRA', '-', '-', 0, 2, 76, '2019-01-16 02:19:57', '2019-01-16 02:19:57'),
(639, '20950467', 'ARIF NUR SULINDRA', '-', '-', 0, 2, 81, '2019-01-16 02:20:04', '2019-01-16 02:20:04'),
(640, '-', 'NOPIHAR', '-', '-', 0, 3, 26, '2019-01-16 02:20:07', '2019-01-16 02:20:07'),
(641, '97155273', 'ARVIADI ANGGARA', '-', '-', 0, 2, 81, '2019-01-16 02:20:15', '2019-01-16 02:20:15'),
(642, '-', 'MAHMUD', '-', '-', 0, 3, 27, '2019-01-16 02:20:18', '2019-01-16 02:20:18'),
(643, '93158596', 'ARY HADI SULISTYAWAN', '-', '-', 0, 2, 81, '2019-01-16 02:20:25', '2019-01-16 02:20:25'),
(644, '-', 'SAIFUL RAFIQ', '-', '-', 0, 3, 28, '2019-01-16 02:20:32', '2019-01-16 02:20:32'),
(645, '92158541', 'GERHARDT JESTAYA UNPAPAR', '-', '-', 0, 2, 81, '2019-01-16 02:20:37', '2019-01-16 02:20:37'),
(646, '-', 'SUTJAHJO', '-', '-', 0, 3, 29, '2019-01-16 02:20:44', '2019-01-16 02:20:44'),
(647, '91151934', 'KOKO ADI SUKOCO', '-', '-', 0, 2, 81, '2019-01-16 02:20:50', '2019-01-16 02:20:50'),
(648, '-', 'RAI WIDASMARA', '-', '-', 0, 3, 29, '2019-01-16 02:21:00', '2019-01-16 02:21:00'),
(649, '97155277', 'M JAZULI ALIMUL HAQ', '-', '-', 0, 2, 81, '2019-01-16 02:21:01', '2019-01-16 02:21:01'),
(650, '-', 'ARGO DWI R', '-', '-', 0, 3, 29, '2019-01-16 02:21:12', '2019-01-16 02:21:12'),
(651, '97154793', 'MOCH. FAHMI NUR FAUZI', '-', '-', 0, 2, 81, '2019-01-16 02:21:19', '2019-01-16 02:21:19'),
(652, '-', 'NUR WAHID', '-', '-', 0, 3, 30, '2019-01-16 02:21:25', '2019-01-16 02:21:25'),
(653, '96160379', 'MUHAMMAD SAIFUL HARIS WIYONO', '-', '-', 0, 2, 81, '2019-01-16 02:21:30', '2019-01-16 02:21:30'),
(654, '91158593', 'WISMA ADHI NUGRAHA', '-', '-', 0, 2, 81, '2019-01-16 02:21:42', '2019-01-16 02:21:42'),
(655, '91170007', 'PRITHO AKAS PRAKOSO', '-', '-', 0, 2, 81, '2019-01-16 02:21:55', '2019-01-16 02:21:55'),
(656, '99170066', 'KHABIB KHASAN ASRORI', '-', '-', 0, 2, 81, '2019-01-16 02:22:06', '2019-01-16 02:22:06'),
(657, '-', 'NURKHOLIS', '-', '-', 0, 3, 31, '2019-01-16 02:22:06', '2019-01-16 02:22:06'),
(658, '92154170', 'DWI ANGGRIAWAN', '-', '-', 0, 2, 81, '2019-01-16 02:22:16', '2019-01-16 02:22:16'),
(659, '-', 'ANDY SUPRIYADI', '-', '-', 0, 3, 31, '2019-01-16 02:22:18', '2019-01-16 02:22:18'),
(660, '-', 'AGUS SUPRIYANTO', '-', '-', 0, 3, 31, '2019-01-16 02:22:28', '2019-01-16 02:22:28'),
(661, '-', 'IBNU ASROR', '-', '-', 0, 3, 32, '2019-01-16 02:22:41', '2019-01-16 02:22:41'),
(662, '-', 'HANANG PRIAMBODO', '-', '-', 0, 3, 32, '2019-01-16 02:22:53', '2019-01-16 02:22:53'),
(663, '-', 'ADITARA PRAPANCA', '-', '-', 0, 3, 32, '2019-01-16 02:23:04', '2019-01-16 02:23:04'),
(664, '-', 'ANNIS WAZIROH', '-', '-', 0, 3, 32, '2019-01-16 02:23:13', '2019-01-16 02:23:13'),
(665, '-', 'DIGDA SUYUDI', '-', '-', 0, 3, 33, '2019-01-16 02:23:28', '2019-01-16 02:23:28'),
(666, '-', 'M MUSTAIN', '-', '-', 0, 3, 33, '2019-01-16 02:23:46', '2019-01-16 02:23:46'),
(667, '-', 'ROMI ADI', '-', '-', 0, 3, 33, '2019-01-16 02:24:00', '2019-01-16 02:24:00'),
(668, '94132045', 'DEWANTARA YUDHA PRATAMA', '-', '-', 0, 2, 76, '2019-01-16 02:24:43', '2019-01-16 02:24:43'),
(669, '94158206', 'SYAHID ABU BAKAR', '-', '-', 0, 2, 76, '2019-01-16 02:24:54', '2019-01-16 02:24:54'),
(670, '17900670', 'AGUST BAKHRUL ALFAN', '-', '-', 0, 2, 76, '2019-01-16 02:25:07', '2019-01-16 02:25:07'),
(671, '-', 'HERFANOT', '-', '-', 0, 3, 55, '2019-01-16 02:25:11', '2019-01-16 02:25:11'),
(672, '92150308', 'JOY PEPRIDO TARIGAN', '-', '-', 0, 2, 76, '2019-01-16 02:25:20', '2019-01-16 02:25:20'),
(673, '-', 'ROCHIM', '-', '-', 0, 3, 55, '2019-01-16 02:25:24', '2019-01-16 02:25:24'),
(674, '92150398', 'MOCH. FATHUR ROZIE', '-', '-', 0, 2, 76, '2019-01-16 02:25:37', '2019-01-16 02:25:37'),
(675, '-', 'EKO SUWANDONO', '-', '-', 0, 3, 56, '2019-01-16 02:25:39', '2019-01-16 02:25:39'),
(676, '-', 'YONGKI SUGIHARNO', '-', '-', 0, 3, 56, '2019-01-16 02:25:53', '2019-01-16 02:25:53'),
(677, '93131941', 'PUJI MULYONO', '-', '-', 0, 2, 76, '2019-01-16 02:25:54', '2019-01-16 02:25:54'),
(678, '18970370', 'FIKY ROBBY Y', '-', '-', 0, 2, 76, '2019-01-16 02:26:13', '2019-01-16 02:26:13'),
(679, '-', 'FERLY', '-', '-', 0, 3, 57, '2019-01-16 02:26:17', '2019-01-16 02:26:17'),
(680, '18980415', 'MOCH. ZAINAL ABIDIN', '-', '-', 0, 2, 76, '2019-01-16 02:26:27', '2019-01-16 02:26:27'),
(681, '-', 'DONI PRASETIO', '-', '-', 1, 3, 57, '2019-01-16 02:26:28', '2019-01-25 06:24:55'),
(682, '18980375', 'MARTHA SETYADINATA', '-', '-', 0, 2, 76, '2019-01-16 02:26:45', '2019-01-16 02:26:45'),
(683, '-', 'MUHAMMAD KAMIM MUNIR', '-', '-', 0, 3, 59, '2019-01-16 02:27:05', '2019-01-16 02:27:05'),
(684, '89152097', 'DANNY C. KANSIL', '-', '-', 0, 2, 76, '2019-01-16 02:27:11', '2019-01-16 02:27:11'),
(685, '-', 'ANGGA ADED SASMITA', '-', '-', 0, 3, 59, '2019-01-16 02:27:17', '2019-01-16 02:27:17'),
(686, '18890050', 'HALIMUL FATTAH', '-', '-', 0, 2, 76, '2019-01-16 02:27:25', '2019-01-16 02:27:25'),
(687, '-', 'PRIYA SETIAWAN', '-', '-', 0, 3, 60, '2019-01-16 02:27:38', '2019-01-16 02:27:38'),
(688, '18920221', 'REDDY AWAN D', '-', '-', 0, 2, 76, '2019-01-16 02:27:38', '2019-01-16 02:27:38'),
(689, '92156718', 'ALFREDO PERDANA', '-', '-', 0, 2, 76, '2019-01-16 02:27:51', '2019-01-16 02:27:51'),
(690, '-', 'PARLAN', '-', '-', 0, 3, 70, '2019-01-16 02:27:58', '2019-01-16 02:27:58'),
(691, '79156148', 'ANANG KURNIAWAN', '-', '-', 0, 2, 76, '2019-01-16 02:28:03', '2019-01-16 02:28:03'),
(692, '97154977', 'ARRIGHO RAETO PRAWEKA', '-', '-', 0, 2, 76, '2019-01-16 02:28:19', '2019-01-16 02:28:19'),
(693, '94170089', 'HENDRA DWI KURNIAWAN', '-', '-', 0, 2, 76, '2019-01-16 02:28:31', '2019-01-16 02:28:31'),
(694, '91159248', 'RIZAL PRATAMA', '-', '-', 0, 2, 76, '2019-01-16 02:28:48', '2019-01-16 02:28:48'),
(695, '95159792', 'RIEKO AGUSTINO', '-', '-', 0, 2, 76, '2019-01-16 02:29:02', '2019-01-16 02:29:02'),
(696, '916134', 'STANLEY AGUSTINUS S', '-', '-', 0, 2, 76, '2019-01-16 02:32:30', '2019-01-16 02:32:30'),
(697, '-', 'JIMMY', '-', '-', 0, 3, 47, '2019-01-16 02:48:50', '2019-01-16 02:48:50'),
(698, '-', 'NICO', '-', '-', 0, 3, 47, '2019-01-16 02:49:01', '2019-01-16 02:49:01'),
(699, '-', 'MOHAMMAD DAKI', '-', '-', 0, 3, 47, '2019-01-16 02:49:23', '2019-01-16 02:49:23'),
(700, '-', 'ERVINDA PRATAMA', '-', '-', 0, 3, 47, '2019-01-16 02:49:32', '2019-01-16 02:49:32'),
(701, '-', 'RAHASDITA', '-', '-', 0, 3, 58, '2019-01-16 02:49:34', '2019-01-16 02:49:34'),
(702, '-', 'STEVEN DAUD KRISTIONO', '-', '-', 0, 3, 47, '2019-01-16 02:49:42', '2019-01-16 02:49:42'),
(703, '-', 'AGUS HIDAYAT', '-', '-', 0, 3, 58, '2019-01-16 02:49:47', '2019-01-16 02:49:47'),
(704, '-', 'BAGUS KURNIAWAN', '-', '-', 0, 3, 58, '2019-01-16 02:49:55', '2019-01-16 02:49:55'),
(705, '-', 'ZHACWA FIRNANDA DWI PUTRA', '-', '-', 0, 3, 47, '2019-01-16 02:49:57', '2019-01-16 02:49:57'),
(706, '-', 'SLAMET FUAD DWIANTO', '-', '-', 0, 3, 47, '2019-01-16 02:50:10', '2019-01-16 02:50:10'),
(707, '-', 'MUHAMMAD ISHAQ', '-', '-', 0, 3, 47, '2019-01-16 02:50:22', '2019-01-16 02:50:22'),
(708, '-', 'YHON', '-', '-', 1, 3, 47, '2019-01-16 02:50:31', '2019-01-23 08:36:15'),
(709, '-', 'M. NAUFAL KAMALUDDIN', '-', '-', 0, 3, 47, '2019-01-16 02:50:39', '2019-01-16 02:50:39'),
(710, '-', 'ANWAR HADIL GOFAR', '-', '-', 0, 3, 47, '2019-01-16 02:50:48', '2019-01-16 02:50:48'),
(711, '-', 'ANGGI', '-', '-', 0, 3, 47, '2019-01-16 02:50:56', '2019-01-16 02:50:56'),
(712, '-', 'HENRY SURIPTO', '-', '-', 0, 3, 47, '2019-01-16 02:51:05', '2019-01-16 02:51:05'),
(713, '-', 'ANDRI TAMRIJANTO', '-', '-', 0, 3, 61, '2019-01-16 02:51:10', '2019-01-16 02:51:10'),
(714, '-', 'FERI MARLIASNYAH', '-', '-', 0, 3, 61, '2019-01-16 02:51:17', '2019-01-16 02:51:17'),
(715, '-', 'FAJAR RAMADANA', '-', '-', 0, 3, 47, '2019-01-16 02:51:21', '2019-01-16 02:51:21'),
(716, '-', 'PRISAD SASALUD', '-', '-', 0, 3, 61, '2019-01-16 02:51:25', '2019-01-16 02:51:25'),
(717, '-', 'HANDIKA', '-', '-', 0, 3, 47, '2019-01-16 02:51:30', '2019-01-16 02:51:30'),
(718, '-', 'HAMID SUBAGIO', '-', '-', 0, 3, 61, '2019-01-16 02:51:32', '2019-01-16 02:51:32'),
(719, '-', 'CHAIDY LIMAN HASANUDDIN', '-', '-', 0, 3, 47, '2019-01-16 02:51:39', '2019-01-16 02:51:39'),
(720, '-', 'GONDO SUGIARTO', '-', '-', 0, 3, 61, '2019-01-16 02:51:42', '2019-01-16 02:51:42'),
(721, '-', 'GUNAWAN', '-', '-', 0, 3, 47, '2019-01-16 02:51:47', '2019-01-16 02:51:47'),
(722, '-', 'R.ERDIANTO', '-', '-', 0, 3, 62, '2019-01-16 02:51:50', '2019-01-16 02:51:50'),
(723, '-', 'IDRUS', '-', '-', 0, 3, 47, '2019-01-16 02:51:57', '2019-01-16 02:51:57'),
(724, '-', 'AS ARI PARYULIN', '-', '-', 0, 3, 62, '2019-01-16 02:51:58', '2019-01-16 02:51:58'),
(725, '-', 'RONAL ANDADINATA', '-', '-', 0, 3, 47, '2019-01-16 02:52:04', '2019-01-16 02:52:04'),
(726, '-', 'RIZKY DWIPAYANA', '-', '-', 0, 3, 63, '2019-01-16 02:52:13', '2019-01-16 02:52:13'),
(727, '-', 'FREDY HERMANTO', '-', '-', 0, 3, 47, '2019-01-16 02:52:16', '2019-01-16 02:52:16'),
(728, '-', 'SATRIO WICAKSONO', '-', '-', 0, 3, 63, '2019-01-16 02:52:21', '2019-01-16 02:52:21'),
(729, '-', 'CAHYA PURNAMA DANI', '-', '-', 0, 3, 63, '2019-01-16 02:52:31', '2019-01-16 02:52:31'),
(730, '-', 'BAHRUL HALIMI', '-', '-', 0, 3, 48, '2019-01-16 02:52:35', '2019-01-16 02:52:35'),
(731, '-', 'JANANTA PERMATA PUTRA', '-', '-', 0, 3, 63, '2019-01-16 02:52:38', '2019-01-16 02:52:38'),
(732, '-', 'GALUH WIBISONO', '-', '-', 0, 3, 48, '2019-01-16 02:52:44', '2019-01-16 02:52:44'),
(733, '-', 'STEFANUS RONNY TJAKRA', '-', '-', 0, 3, 64, '2019-01-16 02:52:49', '2019-01-16 02:52:49'),
(734, '-', 'ALDRIK DWI WICAKSONO', '-', '-', 0, 3, 49, '2019-01-16 02:52:55', '2019-01-16 02:52:55'),
(735, '-', 'NOER TRIANTO', '-', '-', 0, 3, 64, '2019-01-16 02:52:57', '2019-01-16 02:52:57'),
(736, '-', 'IMAM RIADI', '-', '-', 0, 3, 34, '2019-01-16 02:52:57', '2019-01-16 02:52:57'),
(737, '-', 'BAGUS DWI CAHYONO', '-', '-', 0, 3, 49, '2019-01-16 02:53:03', '2019-01-16 02:53:03'),
(738, '-', 'RACHMAD HIDAYAT', '-', '-', 0, 3, 49, '2019-01-16 02:53:12', '2019-01-16 02:53:12'),
(739, '-', 'ANDRY SETYAWAN', '-', '-', 0, 3, 64, '2019-01-16 02:53:12', '2019-01-16 02:53:12'),
(740, '-', 'HAMAM SULISTYO', '-', '-', 0, 3, 34, '2019-01-16 02:53:13', '2019-01-16 02:53:13'),
(741, '-', 'DEDI RACHMATULLAH', '-', '-', 0, 3, 49, '2019-01-16 02:53:20', '2019-01-16 02:53:20'),
(742, '-', 'SATRIO BAGUS SUGIHARTO', '-', '-', 0, 3, 65, '2019-01-16 02:53:22', '2019-01-16 02:53:22'),
(743, '-', 'WAHYU PRIO', '-', '-', 0, 3, 34, '2019-01-16 02:53:27', '2019-01-16 02:53:27'),
(744, '-', 'ANTO ARIFANTO', '-', '-', 0, 3, 49, '2019-01-16 02:53:28', '2019-01-16 02:53:28'),
(745, '-', 'FATHKUR ROHMAN', '-', '-', 0, 3, 65, '2019-01-16 02:53:29', '2019-01-16 02:53:29'),
(746, '-', 'MOHAMMAD ROZIQ', '-', '-', 0, 3, 65, '2019-01-16 02:53:35', '2019-01-16 02:53:35'),
(747, '-', 'IRWAN MAHENDRA', '-', '-', 0, 3, 49, '2019-01-16 02:53:40', '2019-01-16 02:53:40'),
(748, '-', 'FARID RAHMAN', '-', '-', 0, 3, 35, '2019-01-16 02:53:43', '2019-01-16 02:53:43'),
(749, '-', 'DAVID INDRIANTO', '-', '-', 0, 3, 50, '2019-01-16 02:53:50', '2019-01-16 02:53:50'),
(750, '-', 'ANDY NOVYANTO', '-', '-', 0, 3, 35, '2019-01-16 02:53:54', '2019-01-16 02:53:54'),
(751, '-', 'YOSI NIRTA ACHMAD', '-', '-', 0, 3, 50, '2019-01-16 02:53:57', '2019-01-16 02:53:57'),
(752, '-', 'IDA FATMAWATI', '-', '-', 0, 3, 50, '2019-01-16 02:54:06', '2019-01-16 02:54:06'),
(753, '-', 'ANDI SUSANTO', '-', '-', 0, 3, 35, '2019-01-16 02:54:11', '2019-01-16 02:54:11'),
(754, '-', 'M. NAUFAL KAMALUDDIN', '-', '-', 1, 3, 67, '2019-01-16 02:54:20', '2019-01-18 03:18:53'),
(755, '-', 'BUDI', '-', '-', 0, 3, 50, '2019-01-16 02:54:24', '2019-01-16 02:54:24'),
(756, '-', 'RANGGI RAMADHAN', '-', '-', 0, 3, 35, '2019-01-16 02:54:26', '2019-01-16 02:54:26'),
(757, '-', 'CHAIDY LIMAN HASANUDDIN', '-', '-', 1, 3, 67, '2019-01-16 02:54:29', '2019-01-18 03:18:43'),
(758, '-', 'ASWIN ROSYADI', '-', '-', 0, 3, 50, '2019-01-16 02:54:34', '2019-01-16 02:54:34'),
(759, '-', 'RAHMAD SIS PAMBUNAN', '-', '-', 0, 3, 68, '2019-01-16 02:54:46', '2019-01-16 02:54:46'),
(760, '-', 'WISNU ARI SETIADI', '-', '-', 0, 3, 36, '2019-01-16 02:54:49', '2019-01-16 02:54:49'),
(761, '-', 'AKPB PRIYONO YUSTIARSO', '-', '-', 0, 3, 51, '2019-01-16 02:54:52', '2019-01-16 02:54:52'),
(762, '-', 'FISKANTO ADI PRABOWO', '-', '-', 0, 3, 68, '2019-01-16 02:54:56', '2019-01-16 02:54:56'),
(763, '-', 'ALDRIK DWI WICAKSONO', '-', '-', 0, 3, 51, '2019-01-16 02:55:02', '2019-01-16 02:55:02'),
(764, '-', 'MA’SHUM ABDUL JABBAR', '-', '-', 0, 3, 68, '2019-01-16 02:55:04', '2019-01-16 02:55:04'),
(765, '-', 'AIPDA SIGIT ARIAWAN', '-', '-', 0, 3, 51, '2019-01-16 02:55:10', '2019-01-16 02:55:10'),
(766, '-', 'NANDA PERMANA PUTRA', '-', '-', 0, 3, 68, '2019-01-16 02:55:13', '2019-01-16 02:55:13'),
(767, '-', 'NOVIAN NUR CAHYA', '-', '-', 0, 3, 37, '2019-01-16 02:55:18', '2019-01-16 02:55:18'),
(768, '-', 'VANI IRAWAN', '-', '-', 0, 3, 68, '2019-01-16 02:55:20', '2019-01-16 02:55:20'),
(769, '-', 'AKP SISWAHYUDI', '-', '-', 0, 3, 51, '2019-01-16 02:55:20', '2019-01-16 02:55:20'),
(770, '-', 'RICKY RISNANTOYO', '-', '-', 0, 3, 37, '2019-01-16 02:55:28', '2019-01-16 02:55:28'),
(771, '-', 'AKP FERLISKA FAEBRIHANOTO', '-', '-', 0, 3, 51, '2019-01-16 02:55:30', '2019-01-16 02:55:30'),
(772, '-', 'AGUNG NURSILO', '-', '-', 0, 3, 37, '2019-01-16 02:55:36', '2019-01-16 02:55:36'),
(773, '-', 'ACHMAD SYAIFUL UMAM', '-', '-', 0, 3, 51, '2019-01-16 02:55:38', '2019-01-16 02:55:38'),
(774, '-', 'V. HERMAN', '-', '-', 0, 3, 52, '2019-01-16 02:55:48', '2019-01-16 02:55:48'),
(775, '-', 'BINTANG PRATAMA', '-', '-', 0, 3, 68, '2019-01-16 02:55:48', '2019-01-16 02:55:48'),
(776, '-', 'EKA DICKY', '-', '-', 0, 3, 52, '2019-01-16 02:55:56', '2019-01-16 02:55:56'),
(777, '-', 'P. MULYADI', '-', '-', 0, 3, 52, '2019-01-16 02:56:13', '2019-01-16 02:56:13'),
(778, '-', 'MOCH RIFANSYAH', '-', '-', 0, 3, 38, '2019-01-16 02:56:16', '2019-01-16 02:56:16'),
(779, '-', 'HJ. IRMA SUWINDA', '-', '-', 0, 3, 39, '2019-01-16 02:56:26', '2019-01-16 02:56:26'),
(780, '-', 'ANDY SOEYATA SIREGAR', '-', '-', 0, 3, 69, '2019-01-16 02:56:26', '2019-01-16 02:56:26'),
(781, '-', 'AGUS SUMARYANTO', '-', '-', 0, 3, 53, '2019-01-16 02:56:33', '2019-01-16 02:56:33'),
(782, '-', 'ABD GAFUR', '-', '-', 0, 3, 39, '2019-01-16 02:56:37', '2019-01-16 02:56:37'),
(783, '-', 'FERICHO BRAMASTA DWI NANDHI', '-', '-', 0, 3, 69, '2019-01-16 02:56:39', '2019-01-16 02:56:39'),
(784, '-', 'AFIF', '-', '-', 0, 3, 53, '2019-01-16 02:56:42', '2019-01-16 02:56:42'),
(785, '-', 'AGUS MULYADI', '-', '-', 0, 3, 39, '2019-01-16 02:56:46', '2019-01-16 02:56:46'),
(786, '-', 'MAHYUDDIN SUSANTO', '-', '-', 0, 3, 69, '2019-01-16 02:56:49', '2019-01-16 02:56:49'),
(787, '-', 'WIRIADI PRADIPTA', '-', '-', 0, 3, 53, '2019-01-16 02:56:50', '2019-01-16 02:56:50'),
(788, '-', 'RONNY WIBOWO, ST', '-', '-', 0, 3, 69, '2019-01-16 02:56:55', '2019-01-16 02:56:55'),
(789, '-', 'HASBIAN SAPUTRA', '-', '-', 0, 3, 53, '2019-01-16 02:56:58', '2019-01-16 02:56:58'),
(790, '-', 'ARDIAN ANGGARA PUTRA', '-', '-', 0, 3, 69, '2019-01-16 02:57:02', '2019-01-16 02:57:02'),
(791, '-', 'ARGO DWI RESPATI', '-', '-', 0, 3, 40, '2019-01-16 02:57:03', '2019-01-16 02:57:03'),
(792, '-', 'ASRAR ABU KHAIR', '-', '-', 0, 3, 69, '2019-01-16 02:57:12', '2019-01-16 02:57:12'),
(793, '-', 'WICAKSONO', '-', '-', 0, 3, 41, '2019-01-16 02:57:15', '2019-01-16 02:57:15'),
(794, '-', 'YOGA ARIEF SATRIYA', '-', '-', 0, 3, 53, '2019-01-16 02:57:17', '2019-01-16 02:57:17'),
(795, '-', 'FERI SETYAWAN', '-', '-', 0, 3, 69, '2019-01-16 02:57:21', '2019-01-16 02:57:21'),
(796, '-', 'BOB RAPINGGA MUINZA', '-', '-', 0, 3, 41, '2019-01-16 02:57:23', '2019-01-16 02:57:23'),
(797, '-', 'MOHAMMAD SYAFI\'I ARI HANGGARA', '-', '-', 0, 3, 53, '2019-01-16 02:57:26', '2019-01-16 02:57:26'),
(798, '-', 'NUR IMAN HIDAYATULLAH', '-', '-', 0, 3, 69, '2019-01-16 02:57:28', '2019-01-16 02:57:28'),
(799, '-', 'AJI NEKA PERMANA', '-', '-', 0, 3, 41, '2019-01-16 02:57:32', '2019-01-16 02:57:32'),
(800, '-', 'TUBAGUS SYAEFUL BAHRI', '-', '-', 0, 3, 54, '2019-01-16 02:57:35', '2019-01-16 02:57:35'),
(801, '-', 'RENDRA ARIWIBOWO', '-', '-', 0, 3, 69, '2019-01-16 02:57:37', '2019-01-16 02:57:37'),
(802, '-', 'ABIWODO', '-', '-', 0, 3, 41, '2019-01-16 02:57:40', '2019-01-16 02:57:40'),
(803, '-', 'HUANG YUIT HUWAI', '-', '-', 0, 3, 54, '2019-01-16 02:57:43', '2019-01-16 02:57:43'),
(804, '-', 'WILDAN AMIRUL HASAN', '-', '-', 0, 3, 69, '2019-01-16 02:57:46', '2019-01-16 02:57:46'),
(805, '-', 'CHOY KIM SHIN', '-', '-', 0, 3, 54, '2019-01-16 02:57:51', '2019-01-16 02:57:51'),
(806, '-', 'AKBP SAMSUL ARIF', '-', '-', 0, 3, 42, '2019-01-16 02:57:54', '2019-01-16 02:57:54'),
(807, '-', 'PAN ZI GIN', '-', '-', 0, 3, 54, '2019-01-16 02:58:00', '2019-01-16 02:58:00'),
(808, '-', 'PRASETYO HASTONO (AM)', '-', '-', 0, 3, 42, '2019-01-16 02:58:01', '2019-01-16 02:58:01'),
(809, '-', 'SAM TAU SIONG', '-', '-', 0, 3, 54, '2019-01-16 02:58:10', '2019-01-16 02:58:10'),
(810, '-', 'ANTO', '-', '-', 0, 3, 43, '2019-01-16 02:58:13', '2019-01-16 02:58:13'),
(811, '-', 'CHOW KAI FOONG', '-', '-', 0, 3, 54, '2019-01-16 02:58:19', '2019-01-16 02:58:19'),
(812, '-', 'SETIF OSTEN', '-', '-', 0, 3, 66, '2019-01-16 02:58:21', '2019-01-16 02:58:21'),
(813, '-', 'FIRDYAN ADHI LESMANA', '-', '-', 0, 3, 44, '2019-01-16 02:58:23', '2019-01-16 02:58:23'),
(814, '-', 'GALIH', '-', '-', 0, 3, 54, '2019-01-16 02:58:28', '2019-01-16 02:58:28'),
(815, '-', 'HERI', '-', '-', 0, 3, 44, '2019-01-16 02:58:35', '2019-01-16 02:58:35'),
(816, '-', 'HAFIZ', '-', '-', 0, 3, 54, '2019-01-16 02:58:37', '2019-01-16 02:58:37'),
(817, '-', 'DENI', '-', '-', 0, 3, 44, '2019-01-16 02:58:46', '2019-01-16 02:58:46'),
(818, '-', 'OKTAVIANO KRIST KRISNA', '-', '-', 0, 3, 44, '2019-01-16 02:58:54', '2019-01-16 02:58:54'),
(819, '-', 'ADITYA BUDI PERMANA', '-', '-', 0, 3, 45, '2019-01-16 02:59:10', '2019-01-16 02:59:10'),
(820, '-', 'RANGGA BUDI', '-', '-', 0, 3, 45, '2019-01-16 02:59:32', '2019-01-16 02:59:32'),
(821, '-', 'TONY', '-', '-', 0, 3, 46, '2019-01-16 02:59:41', '2019-01-16 02:59:41'),
(822, '-', 'JOKO', '-', '-', 0, 3, 45, '2019-01-16 02:59:47', '2019-01-16 02:59:47'),
(823, '-', 'SRITUSTA SUKARIDOTO', '-', '-', 0, 3, 46, '2019-01-16 02:59:48', '2019-01-16 02:59:48'),
(824, '-', 'ONY MARTIN', '-', '-', 0, 3, 46, '2019-01-16 03:00:01', '2019-01-16 03:00:01'),
(825, '-', 'HARIYADI FIRMANSYAH', '0822-3132-0320', 'PT PINS', 0, 1, 1, '2019-01-16 03:06:00', '2019-01-16 03:06:00'),
(826, '-', 'DANI ANAS', '-', 'PT PINS', 0, 1, 1, '2019-01-16 03:06:00', '2019-01-16 03:06:00'),
(827, '-', 'AKHMAD NUBEL', '-', 'PT PINS', 0, 1, 1, '2019-01-16 03:06:00', '2019-01-16 03:06:00'),
(828, '-', 'SUKMA PRATAMA', '-', 'PT PINS', 0, 1, 1, '2019-01-16 03:06:00', '2019-01-16 03:06:00'),
(829, '-', 'FAJAR MAULANA IBRAHIM', '-', 'PT PINS', 0, 1, 1, '2019-01-16 03:06:00', '2019-01-16 03:06:00'),
(830, '-', 'SUHARI', '-', 'PT PINS', 1, 1, 1, '2019-01-16 03:06:00', '2019-01-23 06:51:16'),
(831, '-', 'M SAIFULLOH', '-', 'PT PINS', 0, 1, 1, '2019-01-16 03:06:00', '2019-01-16 03:06:00'),
(832, '-', 'SOELIJONO', '-', 'KOPKAR KARYA MAS', 1, 1, 1, '2019-01-16 03:28:14', '2019-01-17 05:10:04'),
(833, '-', 'NINJAR', '-', 'KOPKAR KARYA MAS', 1, 1, 1, '2019-01-16 03:28:14', '2019-01-17 05:10:29'),
(834, '-', 'HENDRO', '-', 'KOPKAR KARYA MAS', 0, 1, 1, '2019-01-16 03:28:14', '2019-01-16 03:28:14'),
(835, '-', 'TAYO', '-', 'KOPKAR KARYA MAS', 0, 1, 1, '2019-01-16 03:28:14', '2019-01-16 03:28:14'),
(836, '-', 'IPAN', '-', 'KOPKAR KARYA MAS', 0, 1, 1, '2019-01-16 03:28:14', '2019-01-16 03:28:14'),
(837, '-', 'SAMADI', '-', 'KOPKAR KARYA MAS', 0, 1, 1, '2019-01-16 03:28:14', '2019-01-16 03:28:14'),
(838, '-', 'AGUS', '-', 'KOPKAR KARYA MAS', 0, 1, 1, '2019-01-16 03:28:14', '2019-01-16 03:28:14'),
(839, '-', 'STEWARD AUGUSTO', '0813-1150-0100', 'PT HUAWEI TECH INVESTEMENT', 1, 1, 1, '2019-01-17 01:35:03', '2019-01-17 04:21:33'),
(840, '-', 'RIBKA CAROLINA', '-', 'PT HUAWEI TECH INVESTEMENT', 0, 1, 1, '2019-01-17 01:35:03', '2019-01-17 01:35:03'),
(841, '-', 'DEFARI JANANURAGA', '-', 'PT HUAWEI TECH INVESTEMENT', 0, 1, 1, '2019-01-17 01:35:03', '2019-01-17 01:35:03'),
(842, '-', 'DZAKWAN AKBAR PAMUNGKAS', '-', 'TEKNIK ELEKTRO PENS', 0, 1, 1, '2019-01-17 03:36:10', '2019-01-17 03:36:10'),
(843, '-', 'R P  MUHAMMAD BAHTIAR S', '-', 'TEKNIK ELEKTRO PENS', 0, 1, 1, '2019-01-17 03:36:10', '2019-01-17 03:36:10'),
(844, '-', 'SULTHAN  SIRADJUNDDIN', '-', 'TEKNIK ELEKTRO PENS', 0, 1, 1, '2019-01-17 03:36:10', '2019-01-17 03:36:10'),
(849, '-', 'YANUAR', '-', 'TELIN', 0, 1, 1, '2019-01-21 07:46:17', '2019-01-21 07:46:17'),
(850, '-', 'WAHYU PRASETYO', '-', 'PT JASNITA', 1, 1, 1, '2019-01-21 08:44:52', '2019-01-22 02:05:24'),
(851, '-', 'AGUS SUKONTO', '-', 'PT JASNITA', 0, 1, 1, '2019-01-21 08:44:52', '2019-01-21 08:44:52'),
(852, '-', 'YULMAN', '-', 'PT JASNITA', 0, 1, 1, '2019-01-21 08:44:52', '2019-01-21 08:44:52'),
(853, '-', 'YANUAR', '-', 'TELIN', 0, 1, 1, '2019-01-22 03:01:47', '2019-01-22 03:01:47'),
(854, '-', 'ANDIK WISUDYANTORO', '-', 'PT VEKTOR MEKATRIKA SURABAYA', 1, 1, 1, '2019-01-22 04:26:22', '2019-01-23 03:18:30'),
(855, '-', 'M ARSAL ALMIJWAD', '-', 'PT VEKTOR MEKATRIKA SURABAYA', 0, 1, 1, '2019-01-22 04:26:22', '2019-01-22 04:26:22'),
(856, '-', 'ANGGI PRAYOGO', '-', 'PT VEKTOR MEKATRIKA SURABAYA', 1, 1, 1, '2019-01-22 04:26:22', '2019-01-24 07:16:55'),
(857, '-', 'YUDHA VIDYANTARA', '-', 'PT HUAWEI', 0, 1, 1, '2019-01-22 08:44:16', '2019-01-22 08:44:16'),
(858, '-', 'HARRY SULISTYO', '-', 'PT HUAWEI', 0, 1, 1, '2019-01-22 08:44:16', '2019-01-22 08:44:16'),
(859, '-', 'DAVID SISWOYO', '-', 'PT HUAWEI', 0, 1, 1, '2019-01-22 08:44:16', '2019-01-22 08:44:16'),
(860, '-', 'RENI CAHYONO', '-', 'PT HUAWEI', 0, 1, 1, '2019-01-22 08:44:16', '2019-01-22 08:44:16'),
(861, '-', 'AGUSTINUS', '-', 'PT HUAWEI', 0, 1, 1, '2019-01-22 08:44:16', '2019-01-22 08:44:16'),
(862, '-', 'RIZAL PERMANA', '-', 'PT HUAWEI', 0, 1, 1, '2019-01-22 08:44:16', '2019-01-22 08:44:16'),
(863, '-', 'TEGUH NANDA', '-', 'PT HUAWEI', 0, 1, 1, '2019-01-22 08:44:16', '2019-01-22 08:44:16'),
(864, '-', 'SUGIANTO', '-', 'PT HUAWEI', 0, 1, 1, '2019-01-22 08:44:16', '2019-01-22 08:44:16'),
(865, '-', 'FRANS', '-', 'PT HUAWEI', 0, 1, 1, '2019-01-22 08:44:16', '2019-01-22 08:44:16'),
(866, '-', 'AHMAD BAIDONI', '-', 'PT HUAWEI', 0, 1, 1, '2019-01-22 08:44:16', '2019-01-22 08:44:16'),
(867, '-', 'RUBYEK YUDA K', '-', 'PT HUAWEI', 0, 1, 1, '2019-01-22 08:44:16', '2019-01-22 08:44:16'),
(868, '-', 'SUPRAYITNO', '-', 'PT HUAWEI', 0, 1, 1, '2019-01-22 08:44:16', '2019-01-22 08:44:16'),
(869, '-', 'ALI', '-', 'PT HUAWEI', 0, 1, 1, '2019-01-22 08:44:17', '2019-01-22 08:44:17'),
(870, '-', 'YOKO', '-', 'PT HUAWEI', 0, 1, 1, '2019-01-22 08:44:17', '2019-01-22 08:44:17'),
(871, '-', 'ABIDIN', '-', 'PT HUAWEI', 0, 1, 1, '2019-01-22 08:44:17', '2019-01-22 08:44:17'),
(872, '-', 'AGAS', '-', 'PT HUAWEI', 0, 1, 1, '2019-01-22 08:44:17', '2019-01-22 08:44:17'),
(873, '-', 'HUSEN SURURI', '-', 'LPSE JATIM', 1, 1, 1, '2019-01-23 01:45:48', '2019-01-23 01:48:41'),
(874, '-', 'M IKSAN', '-', 'LPSE JATIM', 1, 1, 1, '2019-01-23 01:45:48', '2019-01-23 01:48:43'),
(875, '-', 'MUHAMMAD SLAMET', '-', 'LPSE JATIM', 1, 1, 1, '2019-01-23 01:45:48', '2019-01-23 01:48:47'),
(876, '-', 'STEWARD AUGUSTO', '0813-1150-0100', 'PT HUAWEI TECH INVESTEMENT', 0, 1, 1, '2019-01-23 04:04:45', '2019-01-23 04:04:45'),
(877, '-', 'RIBKA CAROLINA', '-', 'PT HUAWEI TECH INVESTEMENT', 0, 1, 1, '2019-01-23 04:04:45', '2019-01-23 04:04:45'),
(878, '-', 'DEFARI JANANURAGA', '-', 'PT HUAWEI TECH INVESTEMENT', 0, 1, 1, '2019-01-23 04:04:45', '2019-01-23 04:04:45'),
(879, '-', 'M ROKIM', '-', 'PT HUAWEI TECH INVESTEMENT', 1, 1, 1, '2019-01-23 04:04:45', '2019-01-23 04:39:57'),
(880, '-', 'MAGHE PUTRA', '-', 'PT HUAWEI TECH INVESTEMENT', 1, 1, 1, '2019-01-23 04:04:45', '2019-01-23 04:40:11'),
(881, '-', 'RIMBA-', '-', 'PT HUAWEI TECH INVESTEMENT', 0, 1, 1, '2019-01-23 04:04:45', '2019-01-23 04:04:45'),
(882, '-', 'DAVID', '-', 'PT HUAWEI TECH INVESTEMENT', 0, 1, 1, '2019-01-23 04:04:45', '2019-01-23 04:04:45'),
(883, '-', 'DEDY SURYANTO', '-', 'DINAS PERHUBUNGAN JATIM', 1, 1, 1, '2019-01-23 08:46:15', '2019-01-23 08:51:35'),
(884, '-', 'DONY P', '0812-8973-3116', 'PT PRIMEDIA ARMOEKADATA INTERNET ( PT. EKADATA )', 0, 1, 1, '2019-01-24 01:06:43', '2019-01-24 01:06:43'),
(885, '-', 'EKO NURYONO', '0858-5126-6669', 'MITRATEL-PT POCA', 0, 1, 1, '2019-01-25 03:59:15', '2019-01-25 03:59:15'),
(886, '-', 'NAWARDI', '-', 'MITRATEL-PT POCA', 0, 1, 1, '2019-01-25 03:59:15', '2019-01-25 03:59:15'),
(887, '-', 'SRI MARYANTO SUBALI', '-', 'MITRATEL-PT POCA', 0, 1, 1, '2019-01-25 03:59:15', '2019-01-25 03:59:15'),
(888, '-', 'ANDI NUR', '-', 'MITRATEL-PT POCA', 0, 1, 1, '2019-01-25 03:59:16', '2019-01-25 03:59:16'),
(889, '-', 'WAWAN', '-', 'MITRATEL-PT POCA', 0, 1, 1, '2019-01-25 03:59:16', '2019-01-25 03:59:16'),
(890, '-', 'SUPRIYADI', '-', 'MITRATEL-PT POCA', 0, 1, 1, '2019-01-25 03:59:16', '2019-01-25 03:59:16'),
(891, '-', 'NURWIJAYANTO', '-', 'MITRATEL-PT POCA', 0, 1, 1, '2019-01-25 03:59:16', '2019-01-25 03:59:16'),
(892, '-', 'FERDI', '-', 'MITRATEL-PT POCA', 0, 1, 1, '2019-01-25 03:59:16', '2019-01-25 03:59:16'),
(893, '-', 'ISWANTO', '-', 'MITRATEL-PT POCA', 0, 1, 1, '2019-01-25 03:59:16', '2019-01-25 03:59:16'),
(894, '-', 'EKO NDARU', '-', 'MITRATEL-PT POCA', 1, 1, 1, '2019-01-25 03:59:16', '2019-01-29 05:45:40'),
(895, '-', 'BAGUS', '-', 'MITRATEL-PT POCA', 0, 1, 1, '2019-01-25 03:59:16', '2019-01-25 03:59:16'),
(896, '-', 'AWANG', '-', 'MITRATEL-PT POCA', 0, 1, 1, '2019-01-25 03:59:16', '2019-01-25 03:59:16'),
(897, '-', 'FERRI', '-', 'MITRATEL-PT POCA', 0, 1, 1, '2019-01-25 03:59:16', '2019-01-25 03:59:16'),
(898, '-', 'INDRA KURNIADI', '-', 'PT HYPERNET INDODATA', 1, 1, 1, '2019-01-28 01:15:47', '2019-01-28 07:38:19'),
(899, '-', 'DODI FITRIYADI', '-', 'PT HYPERNET INDODATA', 1, 1, 1, '2019-01-28 01:15:47', '2019-01-28 07:38:39'),
(900, '-', 'SUDINO', '-', 'PT HYPERNET INDODATA', 1, 1, 1, '2019-01-28 01:15:47', '2019-01-28 07:38:57'),
(901, '-', 'AGENG ARDILLA', '-', 'MITRATEL-PT PERSADA', 0, 1, 1, '2019-01-28 04:33:15', '2019-01-28 04:33:15'),
(902, '-', 'M EDI SANTOSO', '-', 'MITRATEL-PT PERSADA', 0, 1, 1, '2019-01-28 04:33:15', '2019-01-28 04:33:15'),
(903, '-', 'ARIF SUSANTO', '-', 'MITRATEL-PT PERSADA', 0, 1, 1, '2019-01-28 04:33:15', '2019-01-28 04:33:15'),
(904, '-', 'FAJAR PERMADI', '-', 'MITRATEL-PT PERSADA', 0, 1, 1, '2019-01-28 04:33:15', '2019-01-28 04:33:15'),
(905, '-', 'ARION P P', '-', 'MITRATEL-PT PERSADA', 0, 1, 1, '2019-01-28 04:33:15', '2019-01-28 04:33:15'),
(906, '-', 'IMAM SUNARDI', '-', 'MITRATEL-PT PERSADA', 0, 1, 1, '2019-01-28 04:33:15', '2019-01-28 04:33:15'),
(907, '-', 'KHOIRIN', '-', 'MITRATEL-PT PERSADA', 0, 1, 1, '2019-01-28 04:33:15', '2019-01-28 04:33:15'),
(908, '-', 'FATUR RAHMAN', '-', 'MITRATEL-PT PERSADA', 0, 1, 1, '2019-01-28 04:33:15', '2019-01-28 04:33:15'),
(909, '-', 'HERIAWAN', '-', 'MITRATEL-PT PERSADA', 0, 1, 1, '2019-01-28 04:33:15', '2019-01-28 04:33:15'),
(910, '-', 'SAIFUL RAHMAN', '-', 'MITRATEL-PT PERSADA', 0, 1, 1, '2019-01-28 04:33:16', '2019-01-28 04:33:16'),
(911, '-', 'SUWARNO', '-', 'MITRATEL-PT PERSADA', 0, 1, 1, '2019-01-28 04:33:16', '2019-01-28 04:33:16'),
(912, '-', 'AVIK BENI', '-', 'MITRATEL-PT PERSADA', 0, 1, 1, '2019-01-28 04:33:16', '2019-01-28 04:33:16'),
(913, '-', 'BENI PARWITO', '-', 'MITRATEL-PT PERSADA', 0, 1, 1, '2019-01-28 04:33:16', '2019-01-28 04:33:16'),
(914, '-', 'RAKA CANDRA K', '-', 'MITRATEL-PT PERSADA', 0, 1, 1, '2019-01-28 04:33:16', '2019-01-28 04:33:16'),
(915, '-', 'SAIFUL MU\'MIN', '-', 'MITRATEL-PT PERSADA', 0, 1, 1, '2019-01-28 04:33:16', '2019-01-28 04:33:16'),
(916, '-', 'AGUNG SISWANTO', '-', 'MITRATEL-PT PERSADA', 0, 1, 1, '2019-01-28 04:33:16', '2019-01-28 04:33:16'),
(917, '-', 'SWASANDIK KURNIAWAN', '-', 'MITRATEL-PT PERSADA', 0, 1, 1, '2019-01-28 04:33:16', '2019-01-28 04:33:16'),
(918, '-', 'AWANG', '-', 'MITRATEL-PT PERSADA', 0, 1, 1, '2019-01-28 04:33:16', '2019-01-28 04:33:16'),
(919, '-', 'FERRI', '-', 'MITRATEL-PT PERSADA', 0, 1, 1, '2019-01-28 04:33:16', '2019-01-28 04:33:16'),
(920, '-', 'JOEL ANDRI PRASETYA', '-', 'PT HUAWEI', 1, 1, 1, '2019-01-28 09:23:52', '2019-01-28 13:21:29'),
(921, '-', 'RIZA NANDA', '-', 'PT HUAWEI', 0, 1, 1, '2019-01-28 09:23:52', '2019-01-28 09:23:52'),
(922, '-', 'ADITIA MUSLIH', '0813-2188-3862', 'PT NEC', 0, 1, 1, '2019-01-29 01:45:17', '2019-01-29 01:45:17'),
(923, '-', 'HANDISAPTO', '-', 'PT NEC', 0, 1, 1, '2019-01-29 01:45:17', '2019-01-29 01:45:17'),
(924, '-', 'AUGUST PARDOMUAN', '-', 'PT NEC', 0, 1, 1, '2019-01-29 01:45:17', '2019-01-29 01:45:17'),
(925, '-', 'RAYNHARD SIMAMORA', '-', 'PT NEC', 0, 1, 1, '2019-01-29 01:45:17', '2019-01-29 01:45:17'),
(926, '-', 'M AMIN', '-', 'PT NEC', 1, 1, 1, '2019-01-29 01:45:17', '2019-02-20 03:31:02'),
(927, '-', 'FIRMAN SUNGKOWO', '-', 'PT NEC', 0, 1, 1, '2019-01-29 01:45:17', '2019-01-29 01:45:17'),
(928, '-', 'NIKKO SIANPAR', '-', 'PT NEC', 0, 1, 1, '2019-01-29 01:45:17', '2019-01-29 01:45:17'),
(929, '-', 'RADHO MARTDIKA', '-', 'PT NEC', 0, 1, 1, '2019-01-29 01:45:17', '2019-01-29 01:45:17'),
(930, '-', 'TISNA AKBAR SONJAYA', '-', 'PT NEC', 0, 1, 1, '2019-01-29 01:45:17', '2019-01-29 01:45:17'),
(931, '-', 'ERIK PAWUH', '-', 'PT NEC', 0, 1, 1, '2019-01-29 01:45:17', '2019-01-29 01:45:17'),
(932, '-', 'MAULANA FAUZAN', '-', 'PT NEC', 0, 1, 1, '2019-01-29 01:45:17', '2019-01-29 01:45:17'),
(933, '-', 'FIRDAUS RACHMAWAN', '-', 'PT NEC', 0, 1, 1, '2019-01-29 01:45:17', '2019-01-29 01:45:17'),
(934, '-', 'ISMU YUNIARTO', '-', 'PT NEC', 0, 1, 1, '2019-01-29 01:45:17', '2019-01-29 01:45:17'),
(935, '-', 'SISWANTO', '-', 'PT NEC', 0, 1, 1, '2019-01-29 01:45:17', '2019-01-29 01:45:17'),
(936, '-', 'AGUS SETIYONO', '-', 'PT NEC', 0, 1, 1, '2019-01-29 01:45:17', '2019-01-29 01:45:17'),
(937, '-', 'AHMAD N SAPUTRA', '-', 'PT NEC', 0, 1, 1, '2019-01-29 01:45:17', '2019-01-29 01:45:17'),
(938, '-', 'FAJAR FAUZAN', '-', 'PT NEC', 0, 1, 1, '2019-01-29 01:45:17', '2019-01-29 01:45:17'),
(939, '-', 'IYANG SURYANA', '-', 'PT NEC', 0, 1, 1, '2019-01-29 01:45:17', '2019-01-29 01:45:17'),
(940, '-', 'RIDWAN HERMAWAN', '-', 'PT NEC', 0, 1, 1, '2019-01-29 01:45:17', '2019-01-29 01:45:17'),
(941, '-', 'FAJAR ALIF NUGRAHA', '-', 'PT NEC', 0, 1, 1, '2019-01-29 01:45:17', '2019-01-29 01:45:17'),
(942, '-', 'DADAN RAMDANI', '-', 'PT NEC', 0, 1, 1, '2019-01-29 01:45:17', '2019-01-29 01:45:17'),
(943, '-', 'SURYA WIJAYA', '-', 'PT NEC', 0, 1, 1, '2019-01-29 01:45:17', '2019-01-29 01:45:17'),
(944, '-', 'YUDI DWI S', '-', 'PT NEC', 0, 1, 1, '2019-01-29 01:45:17', '2019-01-29 01:45:17'),
(945, '-', 'RIDHO RAHMANSYAH', '-', 'PT NEC', 0, 1, 1, '2019-01-29 01:45:17', '2019-01-29 01:45:17'),
(946, '-', 'INDRA AKNAL H', '-', 'GRAHA SARANA DUTA (GSD)', 0, 1, 1, '2019-01-29 04:17:56', '2019-01-29 05:57:55'),
(947, '-', 'DENI SUSANTO', '-', 'GRAHA SARANA DUTA (GSD)', 0, 1, 1, '2019-01-29 04:17:56', '2019-01-29 04:17:56'),
(948, '-', 'RIDWAN', '-', 'GRAHA SARANA DUTA (GSD)', 0, 1, 1, '2019-01-29 04:17:56', '2019-01-29 04:17:56'),
(949, '-', 'IWAN KURNIAWAN', '0812-3130-6828', 'MITRATEL-PT IDE', 0, 1, 1, '2019-01-29 07:34:46', '2019-01-29 07:35:16'),
(950, '-', 'DWI PRASETIYONO', '-', 'MITRATEL-PT IDE', 0, 1, 1, '2019-01-29 07:34:46', '2019-01-29 07:35:16'),
(951, '-', 'MOECHAMAD ISWAHYUDI IRFAN', '-', 'MITRATEL-PT IDE', 0, 1, 1, '2019-01-29 07:34:46', '2019-01-29 07:35:16'),
(952, '-', 'HARIF BUDI', '-', 'MITRATEL-PT IDE', 0, 1, 1, '2019-01-29 07:34:46', '2019-01-29 07:35:16'),
(953, '-', 'WAHYU', '-', 'MITRATEL-PT IDE', 0, 1, 1, '2019-01-29 07:34:46', '2019-01-29 07:35:16'),
(954, '-', 'DENI SUSANTO', '-', 'GRAHA SARANA DUTA (GSD)', 0, 1, 1, '2019-01-30 06:52:38', '2019-01-30 06:52:38'),
(955, '-', 'MUHAMMAD RIDWAN', '-', 'GRAHA SARANA DUTA (GSD)', 0, 1, 1, '2019-01-30 06:52:38', '2019-01-30 06:52:38'),
(956, '-', 'DEVI AFIANTO', '-', 'GRAHA SARANA DUTA (GSD)', 0, 1, 1, '2019-01-30 06:52:38', '2019-01-30 06:52:38'),
(957, '92150209', 'ANGGA PRAYUDI IRIANTO', '-', '-', 0, 2, 81, '2019-01-30 09:40:07', '2019-01-30 09:40:07'),
(958, '1234234', 'FAIQ', '08124142', 'POLTEK JEMBER', 1, 1, 1, '2019-03-04 02:39:51', '2019-03-04 02:45:11'),
(959, '1212121', 'saiful', '089121212', 'TELKOM AKSES', 1, 1, 1, '2019-03-15 01:40:48', '2019-03-15 01:43:09'),
(960, '12345', 'saiful rizal', '089', 'TELKOM SURABAYA', 0, 1, 1, '2019-03-19 08:29:18', '2019-03-19 08:29:18');

-- --------------------------------------------------------

--
-- Table structure for table `pictelkom`
--

CREATE TABLE `pictelkom` (
  `id` int(10) UNSIGNED NOT NULL,
  `nik` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pictelkom`
--

INSERT INTO `pictelkom` (`id`, `nik`, `nama`, `kontak`, `unit`, `created_at`, `updated_at`) VALUES
(1, '920268', 'Natanael Pandapotan', '081310108341', 'NETRA', '2018-10-31 18:58:49', '2018-10-31 18:58:49'),
(2, '631966', 'SURIYANTO', '0851-0001-2257', 'WAN SBS', '2018-12-28 03:15:22', '2018-12-28 03:15:22'),
(3, '650041', 'SURANTO', '0851-0097-1417', 'WAN SBS', '2018-12-28 03:20:54', '2018-12-28 03:20:54'),
(4, '621355', 'MUH FANANI', '0821-4341-3737', 'TREG-5', '2018-12-28 03:22:55', '2018-12-28 03:22:55'),
(5, '621432', 'IWAN YUDO IRIANTO', '0812-3275-375', 'RNO', '2018-12-28 03:23:30', '2018-12-28 03:23:30'),
(6, '621824', 'DJOKO ISWANTO', '0851-0098-7588', 'OPTIMA SBS', '2018-12-28 03:24:07', '2018-12-28 03:24:07'),
(7, '621920', 'M YASIN', '0851-0190-1323', 'MAINTENANCE ACCESS', '2018-12-28 03:24:46', '2018-12-28 03:24:46'),
(8, '621923', 'ACHMAD MIHERY', '0812-3501-2712', 'OPTIMA SBS', '2018-12-28 03:25:24', '2018-12-28 03:25:24'),
(9, '621979', 'NAKIS BANDI', '0851-0094-4544', 'OPTIMA SBS', '2018-12-28 03:35:28', '2018-12-28 03:35:28'),
(10, '660413', 'I GDE WIRAYASA', '081234939101', 'SIGMA', '2018-12-28 03:39:16', '2018-12-28 03:39:16'),
(11, '795373', 'WAHYU SETYAWAN', '0813-8012-3305', 'MANAGER CONSTRUCTION JAWA BALI MITRATEL', '2018-12-28 03:39:47', '2018-12-28 03:39:47'),
(12, '720218', 'TEGUH RIYANTO', '0813-3900-1008', 'OPTIMA SBS', '2018-12-28 03:56:51', '2018-12-28 03:56:51'),
(13, '650688', 'TEGUH WINARKO', '8125-2577-088', 'EXPERT TDM SWITCH RNO', '2018-12-28 04:02:26', '2018-12-28 04:02:26'),
(14, '631064', 'TOFAN HIDAYAT', '0851-0099-6635', 'OPTIMA SBS', '2018-12-28 04:02:59', '2018-12-28 04:02:59'),
(15, '870022', 'HAVEA PRATIWI', '0811-2909-933', 'NETRA SBS', '2018-12-28 06:22:31', '2018-12-28 06:22:31'),
(16, '641401', 'SUPADI', '0812-1756-858', 'MSO SBY', '2019-01-07 08:30:29', '2019-01-07 08:30:29'),
(17, '850006', 'EKO AGUS MAKHRUS', '0851-0320-5353', 'TELKOM', '2019-01-08 07:32:25', '2019-01-08 07:32:25'),
(18, '640136', 'BAMBANG SETYO S', '0812-3128-9674', 'NETRA SBS', '2019-01-08 07:48:03', '2019-01-08 07:48:03'),
(19, '660211', 'ABDUS SAMAD', '0851-0198-7423', 'OPTIMA SBS', '2019-01-09 08:27:55', '2019-01-09 08:27:55'),
(20, '710506', 'IKHWAN HARAPAN', '0812-3456-1234', 'NETRA SBS', '2019-01-09 09:07:04', '2019-01-09 09:07:04'),
(21, '870036', 'I PUTU AGUS PICASTANA', '0813-2169-7442', 'AM GES SBS', '2019-01-10 03:23:48', '2019-01-10 03:28:56'),
(22, '840022', 'ARZAD IWANTORO', '0813-3344-4328', 'RAO SBY', '2019-01-11 07:17:39', '2019-01-11 07:17:39'),
(23, '631160', 'ISMU SUROSO', '0851-0400-0910', 'NETRA SBS', '2019-01-14 03:42:05', '2019-01-14 03:42:05'),
(24, '630126', 'SUDIRO', '0851-0591-3476', 'ACCESS MAINTENANCE', '2019-01-15 04:35:52', '2019-01-15 04:35:52'),
(25, '632340', 'YULMAN', '0811-349-222', 'RWS TREG-5', '2019-01-24 01:08:18', '2019-01-24 01:08:18'),
(26, '660438', 'WASITO', '-', 'TELKOM', '2019-01-28 08:59:45', '2019-01-28 08:59:45'),
(27, '641160', 'HADY SISWANTO', '0812-1789-5138', 'NETRA SBS', '2019-01-28 09:25:03', '2019-01-28 09:25:03'),
(28, '715218', 'ABRAHAM', '0852-8028-6962', 'GSD SBY', '2019-01-29 04:18:47', '2019-01-29 04:18:47'),
(29, '31160702', 'M SAIFUL RIZAL', '089520604005', 'NETRA', '2019-03-13 02:28:19', '2019-03-13 02:28:19');

-- --------------------------------------------------------

--
-- Table structure for table `suratkeluarbarang`
--

CREATE TABLE `suratkeluarbarang` (
  `id` int(10) UNSIGNED NOT NULL,
  `nomorSurat` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kepada` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `perusahaan` varchar(50) NOT NULL,
  `jabatan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `perihal` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `statusSurat` tinyint(4) NOT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suratkeluarbarang`
--

INSERT INTO `suratkeluarbarang` (`id`, `nomorSurat`, `kepada`, `nik`, `perusahaan`, `jabatan`, `perihal`, `statusSurat`, `keterangan`, `tanggal`, `created_at`, `updated_at`) VALUES
(1, '12019', 'M SAIFUL RIZAL', '12345', 'huawei', 'Manager', 'Surat Ijin', 1, '-', '2019-04-30', '2019-04-01 04:26:25', '2019-04-01 04:40:00');

-- --------------------------------------------------------

--
-- Table structure for table `suratmasuk`
--

CREATE TABLE `suratmasuk` (
  `id` int(10) UNSIGNED NOT NULL,
  `nomorSurat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kepada` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlahLampiran` tinyint(4) NOT NULL,
  `perihal` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `suratDinas` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `validate1` tinyint(4) NOT NULL,
  `validate2` tinyint(4) NOT NULL,
  `statusSurat` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suratmasuk`
--

INSERT INTO `suratmasuk` (`id`, `nomorSurat`, `kepada`, `jumlahLampiran`, `perihal`, `suratDinas`, `keterangan`, `validate1`, `validate2`, `statusSurat`, `created_at`, `updated_at`) VALUES
(5, '12019', 'MITRATEL-PT NEXWAVE', 1, 'Surat Ijin Masuk Dan Ijin Kerja PT Nexwave Untuk Site Audit Optimasi NPM H3I Colo TELKOM Di STO Jagir, Rungkut, Injoko Dan Yan Dinoyo', 'Nota Dinas MANAGER CONSTRUCTION JAWA BALI MITRATEL Nomor C.Tel. 49/TK 000/GMA-C1400000/2019 Tanggal 7 Januari 2019 Perihal Surat Ijin Masuk Lokasi Site STO Jagir, STO Rungkut, STO Injoko & STO Dinoyo_Site Audit Optimasi NPM H3I Colo TELKOM', '-', 1, 1, 2, '2019-01-07 08:05:13', '2019-01-07 08:10:48'),
(6, '22019', 'PT NEC', 1, 'Surat Ijin Masuk Dan Ijin Kerja PT NEC Untuk Troubleshooting 1x100G Et-1/0/5 On R5.MLG.ASBR-TSEL.1 Di STO Rungkut [PERPU]', 'Ijin Downtime OSM CORE NETWORK OPERATION Nomor CRA.18314/020701/CORE NETWORK OPERATION/IJIN/2019 Tanggal 07-Januari-2019 Perihal Troubleshooting 1x100G Et-1/0/5 on R5.MLG.ASBR-TSEL.1', 'SIMARU MALAM downtime @ 30 menit sesuai CRA.18314', 1, 1, 2, '2019-01-07 08:23:41', '2019-01-07 13:26:05'),
(7, '32019', 'PT ELKOKAR', 1, 'Surat Ijin Masuk Dan Ijin Kerja PT Elkokar Untuk Validasi, Migrasi DSLAM Indoor Dan Primer Tembaga Ke New MDU Indoor Di STO Rungkut', 'Nota Dinas MGR ACCESS MAINTENANCE AND QE SURABAYA SELATAN Nomor C.Tel. 2/TK 000/R5W-5M370000/2019 Tanggal 8 Januari 2019 Perihal Permohonan Ijin Masuk STO Rungkut Utk Mitra Elkokar', '-', 1, 1, 2, '2019-01-08 07:37:16', '2019-01-08 08:00:19'),
(8, '42019', 'PT ZTE', 1, 'Surat Ijin Masuk Dan Ijin Kerta PT ZTE Untuk Survey Proyek Pengadaan Dan Pemasangan Perangkat DWDM Platform ZTE SS#1 NARU 2018 Di STO Rungkut', 'Nota Dinas SM BROADBAND NODE DEPLOYMENT DPD Nomor C.Tel. 14/PW 120/PND-B1050000/2019 Tanggal 7 Januari 2019 Perihal Permohonan Ijin Masuk untuk survey Proyek Pengadaan dan Pemasangan perangkat DWDM Platform ZTE proyek NARU 2018', '-', 1, 1, 2, '2019-01-08 07:47:01', '2019-01-08 08:00:17'),
(9, '52019', 'PT BINTRACO SHARMA', 1, 'Surat Ijin Masuk Dan Ijin Kerta PT Bintraco Sharma Untuk Sinkronisasi Dan Upgrading Di Colocation Data Center Gubeng', 'Nota Dinas MGR MARKETING AND ACCOUNT TEAM REGIONAL IV Nomor C.Tel. 2/LG 000/DR4-11430000/2019 Tanggal 8 Januari 2019 Perihal Ijin Masuk Layanan Hosting Colocation Server PT. Bintraco Sharma Tbk', '-', 1, 1, 2, '2019-01-08 07:55:58', '2019-01-08 07:59:42'),
(10, '62019', 'MITRATEL-PT XERINDO', 1, 'Surat Ijin Masuk Dan Ijin Kerja PT Xerindo Untuk Pekerjaan Add RRU, Dismantle Feeders Dan Add Antenna XL Colo TELKOM Di STO Rungkut', 'Nota Dinas MANAGER CONSTRUCTION JAWA BALI MITRATEL Nomor C.Tel. 65/TK 000/GMA-C1400000/2019 Tanggal 8 Januari 2019 Perihal Surat Ijin Masuk Lokasi Site STO Rungkut_Add RRU + Dismantle Feeders + Add Antenna XL Colo TELKOM', '-', 1, 1, 2, '2019-01-09 00:57:58', '2019-01-09 01:00:00'),
(11, '72019', 'PT BANGTELINDO', 1, 'Surat Ijin Masuk Dan Ijin Kerja PT Bangtelindo Untuk Instalasi Bundle Cord FTM Di STO Waru1', 'Nota Dinas OSM PLANNING ENGINEERING AND DEPLOYMENT REGIONAL V Nomor C.Tel. 7/TK 000/DR5-12700000/2019 Tanggal 9 Januari 2019 Perihal Permohonan Ijin Masuk Lokasi STO dan Bekerja Instalasi Bundle Cord FTM', '-', 1, 1, 2, '2019-01-09 08:32:19', '2019-01-09 08:51:56'),
(12, '82019', 'PT TELKOMSEL', 1, 'Surat Ijin Masuk Dan Ijin Kerja PT Telkomsel Untuk Maintenance & Troubleshooting Perangkat Telkomsel Di STO Darmo, Injoko, Jagir, Rungkut, Manyar, Gubeng, Yan Dinoyo Dan Kantor Telkom Ketintang', 'Nota Dinas MGR WHOLESALE ACCESS NETWORK SURABAYA SELATAN Nomor C.Tel. 1/TK 210/R5W-5M360000/2019 Tanggal 9 Januari 2019 Perihal Simaru Lokasi STO Dalam Rangka Maintenance & Trouble shooting Perangkat Telkomsel', '-', 1, 1, 2, '2019-01-09 08:49:59', '2019-01-09 08:51:54'),
(13, '92019', 'PT NEC', 1, 'Surat Ijin Masuk Dan Ijin Kerja PT NEC Untuk Pengambilan Modul ASBR Di STO Rungkut', 'Permohonan Waspang (Sdr IKHWAN HARAPAN) Tanggal 09 Januari 2019 Perihal Pengambilan Modul ASBR di STO Rungkut', 'SIMARU 24 Jam', 1, 1, 2, '2019-01-09 09:05:44', '2019-01-09 09:09:16'),
(14, '102019', 'DISHUB PROV JATIM', 1, 'Surat Ijin Masuk Dan Ijin Kerja Oleh Dishub Prov Jatim Untuk Maintenance Dan Instalasi Server Di Data Center Gubeng', 'Nota Dinas HEAD OF SURABAYA AND BALI STAR DC MANAGEMENT TELKOMSIGMA Nomor C.Tel. 2/UM 000/JSCC-1217000/2019 Tanggal 8 Januari 2019 Perihal Permohonan SIMARU tambahan untuk Team Dishub Prov Jatim', '-', 1, 1, 2, '2019-01-10 01:16:26', '2019-01-10 01:18:16'),
(15, '112019', 'PT PINS', 1, 'Surat Ijin Masuk Dan Ijin Kerja PT PINS Untuk Aktivasi Feeder Project FTTH Galaxy Mall 3 Di STO Manyar', 'Nota Dinas MGR GOVERNMENT AND ENTERPRISE SERVICE SURABAYA SELATAN Nomor C.Tel. 4/TK 000/R5W-5M470000/2019 Tanggal 9 Januari 2019 Perihal Permohonan Perpanjangan Waktu Izin Masuk Ruangan STO Manyar untuk Aktivasi Feeder Project FTTH Galaxy Mall 3', '-', 1, 1, 2, '2019-01-10 03:25:08', '2019-01-10 03:30:40'),
(16, '122019', 'PT ZTE', 1, 'Surat Ijin Masuk Dan Ijin Kerta PT ZTE Untuk Troubleshooting Gangguan DWDM M920 Node Di STO Rungkut', 'Nota Dinas MGR BACKBONE AND CME OPERATION REGIONAL V Nomor C.Tel. 1/TK 000/DR5-12610000/2019 Tanggal 10 Januari 2019 Perihal Permohonan Ijin Masuk Ruangan Untuk Troubleshooting Gangguan DWDM M920 Node STO Rungkut Unmonitor', '-', 1, 1, 2, '2019-01-10 04:07:57', '2019-01-10 04:08:43'),
(17, '132019', 'PT CIA', 1, 'Surat Ijin Masuk Dan Ijin Kerta PT CIA Untuk Dismantling Server Axiros Di STO Injoko', 'Nota Dinas MGR ACCESS NETWORK ELEMENT OM REGIONAL V Nomor C.Tel. 9/UM 000/DR5-12930000/2019 Tanggal 11 Januari 2019 Perihal Permohonan Izin masuk Ruangan STO INJOKO untuk Keperluan Dismantling Server Axiros', '-', 1, 1, 2, '2019-01-11 07:16:50', '2019-01-11 07:18:49'),
(18, '142019', 'PT TEHINDO SARANA UTAMA', 1, 'Surat Ijin Masuk Dan Ijin Kerja PT Tehnindo Sarana Utama Untuk Maintenance Dan Troubleshooting Perangkat Di CNDC Gubeng', 'Nota Dinas HEAD OF BALIMA AND TTC DC MANAGEMENT TELKOMSIGMA Nomor C.Tel. 8/PW 140/IMS901/2019 Tanggal 11 Januari 2019 Perihal Permohonan Ijin Masuk Lokasi NeuCentrix Pelaksanaan Maintenance Perangkat Periode 11 Januari 2019 - 31 Januari 2019', '-', 1, 1, 2, '2019-01-14 01:19:47', '2019-01-14 01:38:23'),
(19, '152019', 'PT INTI', 1, 'Surat Ijin Masuk Dan Ijin Kerja PT INTI Untuk Validasi Pekerjaan Pengadaan Dan Pemasangan Modernisasi Paket -3 Granular Area Gubeng Di STO Manyar', 'Nota Dinas MGR ACCESS OPTIMA AND CONSTRUCTION SPV SURABAYA SELATAN Nomor C.Tel. 5/TK 100/R5W-5M330000/2019 Tanggal 12 Januari 2019 Perihal Surat Ijin Masuk STO Manyar PT. INTI', 'SIMARU 24 Jam', 1, 1, 2, '2019-01-14 01:37:14', '2019-01-14 01:38:20'),
(20, '162019', 'KOPKAR KARYA MAS', 1, 'Surat Ijin Masuk Dan Ijin Kerja Oleh Kopkar Karya Mas Untuk Perbaikan Genset Mobile Di STO Rungkut', 'Surat Ketua Kopkar Karya Mas nomor 05/SEKR/KOPKAR-01/2019 tanggal 14 Januari 2019 perihal Permohonan Izin Masuk Lokasi STO Rungkut Network Area Surabaya Selatan', '-', 1, 1, 2, '2019-01-14 03:41:18', '2019-01-15 02:24:04'),
(21, '172019', 'MITRATEL-PT ZMG', 1, 'Surat Ijin Masuk Dan Ijin Kerja PT ZMG Untuk Site Audit Dan Physical Tuning XL Colo TELKOM Di STO Rungkut', 'Nota Dinas MANAGER CONSTRUCTION JAWA BALI MITRATEL Nomor C.Tel. 91/TK 000/GMA-C1400000/2019 Tanggal 14 Januari 2019 Perihal Surat Ijin Masuk Lokasi Site STO Rungkut_Site Audit, Physical Tuning XL Colo TELKOM', '-', 1, 1, 2, '2019-01-14 04:43:28', '2019-01-14 04:44:34'),
(22, '182019', 'PT NEC', 1, 'Surat Ijin Masuk Dan Ijin Kerja PT NEC Untuk Comm Test Upgrade Dan Segment Test Pekerjaan SKKL IGG Di STO Rungkut', 'Nota Dinas SM TRANSPORT DEPLOYMENT DPD Nomor C.Tel. 32/PW 000/PND-B1060000/2019 Tanggal 14 Januari 2019 Perihal Permohonan Ijin Masuk dan Kerja untuk Kegiatan Comm Test Upgrade dan Segment Test Pekerjaan SKKL IGG', '-', 1, 1, 2, '2019-01-14 05:32:04', '2019-01-14 05:33:33'),
(23, '192019', 'PT INTI', 1, 'Surat Ijin Masuk Dan Ijin Kerja PT INTI Untuk Pengadaan Dan Pemasangan Modernisasi Granular Periode Januari-Februari 2019 Di STO Rungkut', 'Nota Dinas MGR ACCESS NEW FTTH AND MODERNIZATION DEPLOYMENT REGIONAL V Nomor C.Tel. 1/TK 000/DR5-127C0000/2019 Tanggal 14 Januari 2019 Perihal Permohonan Ijin Masuk Ruangan dan Kerja (SIMARU) STO Rungkut untuk PT. INTI Januari-Februari 2019', 'SIMARU 24 Jam dan Permohonan Simaru sampai dengan 28 Februari 2019', 1, 1, 2, '2019-01-14 08:05:40', '2019-01-14 08:06:30'),
(24, '202019', 'KOPKAR KARYA MAS', 1, 'Surat Ijin Masuk Dan Ijin Kerja Oleh Kopkar Karya Mas Untuk Pekerjaan Relokasi Battere Dari STO Darmo Ke STO Gubeng Kap 2500 AH', 'Surat Ketua Kopkar Karya Mas nomor 04/SEKR/KOPKAR-01/2019 tanggal 14 Januari 2019 perihal Permohonan Izin Masuk Lokasi STO Darmo dan STO Gubeng Network Area Surabaya Selatan', '-', 1, 1, 2, '2019-01-15 01:22:38', '2019-01-15 07:35:22'),
(25, '212019', 'PT ELKOKAR', 1, 'Surat Ijin Masuk Dan Ijin Kerja PT Elkokar Untuk Penyekatan Ruang FTM Di STO Tropodo', 'Nota Dinas MGR ACCESS OPTIMA AND CONSTRUCTION SPV SURABAYA SELATAN Nomor C.Tel. 6/TK 100/R5W-5M330000/2019 Tanggal 15 Januari 2019 Perihal Surat Ijin Masuk STO Tropodo PT. Elkokar Timur', '-', 1, 1, 2, '2019-01-15 04:38:58', '2019-01-19 12:50:46'),
(26, '222019', 'MITRATEL-PT FIBER STAR', 1, 'Surat Ijin Masuk Dan Ijin Kerja PT Fiber Star Untuk Instalasi Penarikan FO, OTB & ODP Di Rack XL Colo TELKOM Di STO Injoko', 'Nota Dinas MANAGER CONSTRUCTION JAWA BALI MITRATEL Nomor C.Tel. 102/TK 000/GMA-C1400000/2019 Tanggal 15 Januari 2019 Perihal Surat Ijin Masuk Lokasi Site STO Injoko_Instalasi Penarikan Kabel FO, OTB & ODP di Rack XL Colo TELKOM', '-', 1, 1, 2, '2019-01-15 08:18:50', '2019-01-15 08:20:44'),
(27, '232019', 'PT NEC', 1, 'Surat Ijin Masuk Dan Ijin Kerja PT NEC Untuk Troubleshooting Routing-Engine – RE0 Pada Node R5.MLG.ASBR-TSEL.1 Di STO Rungkut', 'Nota Dinas MGR IP TRANSIT AND OLO OPERATION DSO Nomor C.Tel. 1/TK 000/DSO-20304000/2019 Tanggal 15 Januari 2019 Perihal Permohonan Ijin Masuk Trouble Shooting Routing-Engine – RE0 Pada Node R5.MLG.ASBR-TSEL.1 di STO Rungkut', 'SIMARU MALAM', 1, 1, 2, '2019-01-15 09:04:54', '2019-01-16 01:10:54'),
(28, '242019', 'PT LOKATARA ABHINAYA', 1, 'Surat Ijin Masuk Dan Ijin Kerja PT Lokatara Abhinaya Untuk Penggantian Power Supply Server Middleware Aptilo Di Ruang NGN STO Rungkut', 'Nota Dinas MGR WIRELESS OPERATION DSO Nomor C.Tel. 5/TK 000/DSO-20502000/2019 Tanggal 15 Januari 2019 Perihal Ijin Masuk STO Kebalen dan STO Rungkut dalam rangka penggantian power supply server Middleware Aptilo', '-', 1, 1, 2, '2019-01-16 01:43:02', '2019-01-16 01:43:40'),
(29, '252019', 'PT NEC', 1, 'Surat Ijin Masuk Dan Ijin Kerja PT NEC Untuk Survey New Node, Instalasi & Commtest SP#1 Pengadaan Dan Pemasangan Ekspan PE Platform Juniper Di STO Rungkut', 'Nota Dinas SM BROADBAND NODE DEPLOYMENT DPD Nomor C.Tel. 47/PW 000/PND-B1050000/2019 Tanggal 15 Januari 2019 Perihal Permohonan Izin Masuk & Bekerja serta Penunjukan Waspang untuk SP#1 Pengadaan dan Pemasangan Ekspan PE Platform Juniper Periode Januari-Maret 2019', 'Permohonan Simaru s/d 31 Maret 2019', 1, 1, 2, '2019-01-16 01:58:22', '2019-01-16 02:11:28'),
(30, '262019', 'MITRATEL-PT PERSADA', 1, 'Surat Ijin Masuk Dan Ijin Kerja PT Persada Untuk Maintenance Dan Troubleshoot ISAT Colo TELKOM Di STO Rungkut Dan Injoko', 'Nota Dinas MANAGER CONSTRUCTION JAWA BALI MITRATEL Nomor C.Tel. 103/TK 000/GMA-C1400000/2019 Tanggal 16 Januari 2019 Perihal Surat Ijin Masuk Lokasi Site STO Rungkut & STO Injoko_Maintenance/Troubleshoot ISAT Colo TELKOM', '-', 1, 1, 2, '2019-01-16 02:10:48', '2019-01-16 02:11:25'),
(31, '272019', 'PT PINS', 1, 'Surat Ijin Masuk Dan Ijin Kerja PT PINS Untuk Aktivasi Feeder Project FTTH Galaxy Mall 3 Di STO Manyar - Tambahan Personil', 'Nota Dinas MGR GOVERNMENT AND ENTERPRISE SERVICE SURABAYA SELATAN Nomor C.Tel. 8/TK 000/R5W-5M470000/2019 Tanggal 16 Januari 2019 Perihal Permohonan Tambahan Personil untuk Izin Masuk Ruangan STO Manyar untuk Aktivasi Feeder Project FTTH Galaxy Mall 3', 'SIMARU Tel. 11/SIMARU/SBS/2019 - TIDAK BERLAKU', 1, 1, 2, '2019-01-16 03:06:00', '2019-01-16 03:06:40'),
(32, '282019', 'MITRA COLLOCATION SIGMA', 1, 'Surat Ijin Masuk Dan Ijin Kerja Oleh Mitra Colocation Sigma Untuk Maintenance Rutin Perangkat Customer Collocation Telkom Di Data Center Gubeng Periode Januari 2019', 'Nota Dinas HEAD OF SURABAYA AND BALI STAR DC MANAGEMENT TELKOMSIGMA Nomor C.Tel. 11/UM 000/JSCC-1217000/2019 Tanggal 15 Januari 2019 Prihal Permohonan SIMARU Periode Januari 2019 untuk kastemer Data Center Gubeng', 'SIMARU 24 Jam (215 personil mitra Sigma)', 1, 1, 2, '2019-01-16 03:21:04', '2019-01-16 03:36:11'),
(33, '292019', 'KOPKAR KARYA MAS', 1, 'Surat Ijin Masuk Dan Ijin Kerja Oleh Kopkar Karya Mas Untuk Perbaikan Cooling Tower Di STO Darmo', 'Permohonan Asman CME (Sdr ISMU SUROSO / 631160) tanggal 16 Januari 2019 perihal untuk Perbaikan cooling tower di STO Darmo', '-', 1, 1, 2, '2019-01-16 03:28:14', '2019-01-18 07:23:31'),
(34, '302019', 'PT HUAWEI TECH INVESTEMENT', 1, 'Surat Ijin Masuk Dan Ijin Kerja PT Huawei Tech Investment Untuk Survey Pengadaan Dan Pemasangan Metro Ethernet, BRAS, PCEF Dan PE Transit Platform Huawei Di STO Rungkut', 'Nota Dinas SM BROADBAND NODE DEPLOYMENT DPD Nomor C.Tel. 50/PW 000/PND-B1050000/2019 Tanggal 16 Januari 2019 Perihal Permohonan Izin Masuk & Bekerja serta Penunjukan Waspang untuk SP#1 Pengadaan dan Pemasangan Metro Ethernet, BRAS, PCEF dan PE Transit Platform Huawei - TREG 5', 'Permohonan Simaru s/d 31 Maret 2019', 1, 1, 2, '2019-01-17 01:35:03', '2019-01-17 01:35:44'),
(35, '312019', 'TEKNIK ELEKTRO PENS', 1, 'Surat Ijin Masuk Dan Ijin Kerja Oleh Teknik Elektro PENS Surabaya Untuk Praktek Kerja Lapangan Di STO Witel SBS', 'Nota Dinas MGR HR AND CDC SURABAYA SELATAN Nomor C.Tel. 15/PD 520/R5W-5M520000/2019 Tanggal 8 Januari 2019 Perihal Praktek kerja Industri', '-', 1, 1, 2, '2019-01-17 03:36:10', '2019-01-17 03:36:57'),
(37, '322019', 'TELIN', 1, 'Surat Ijin Masuk Dan Ijin Kerja Oleh TELIN Untuk Maintenance Server Perangkat CDN CinaNet Di Data Center Gubeng', 'Nota Dinas HEAD OF SURABAYA AND BALI STAR DC MANAGEMENT TELKOMSIGMA Nomor C.Tel. 13/UM 000/JSCC-1217000/2019 Tanggal 21 Januari 2019 Perihal Permohonan SIMARU tambahan untuk Team Telin (Chinanet)', '-', 1, 1, 2, '2019-01-21 07:46:17', '2019-01-21 07:47:14'),
(38, '332019', 'PT JASNITA', 1, 'Surat Ijin Masuk Dan Ijin Kerja PT Jasnita Untuk Survey Rack Penempatan Perangkat Di Neucentrix CNDC Gubeng', 'Nota Dinas OSM REGIONAL WHOLESALE SERVICE REGIONAL V Nomor C.Tel. 14/YN 000/DR5-11200000/2019 Tanggal 21 Januari 2019 Perihal Permohonan Ijin Masuk Lokasi Neucentrix Gubeng Untuk PT JASNITA TELEKOMINDO', '-', 1, 1, 2, '2019-01-21 08:44:52', '2019-01-21 08:45:42'),
(39, '342019', 'TELIN', 1, 'Surat Ijin Masuk Dan Ijin Kerja Oleh TELIN Untuk Maintenance Server Perangkat CDN CinaNet Di Data Center Gubeng', 'Nota Dinas HEAD OF SURABAYA AND BALI STAR DC MANAGEMENT TELKOMSIGMA Nomor C.Tel. 15/UM 000/JSCC-1217000/2019 Tanggal Permohonan SIMARU tambahan untuk Team Telin (Chinanet)', '-', 1, 1, 2, '2019-01-22 03:01:47', '2019-01-22 03:03:04'),
(40, '352019', 'PT VEKTOR MEKATRIKA SURABAYA', 1, 'Surat Ijin Masuk Dan Ijin Kerja PT Vektordaya Mekatrika Surabaya Untuk Maintenance UPS Di CNDC Gubeng', 'Nota Dinas HEAD OF SURABAYA AND BALI STAR DC MANAGEMENT TELKOMSIGMA Nomor C.Tel. 16/UM 000/JSCC-1217000/2019 Tanggal 22 Januari 2019 Perihal Permohonan SIMARU tambahan untuk Teknisi PT Vektordaya Mekatrika (Mitra MO Telkomsigma)', '-', 1, 1, 2, '2019-01-22 04:26:22', '2019-01-22 04:27:31'),
(41, '362019', 'PT HUAWEI', 1, 'Surat Ijin Masuk Dan Ijin Kerja PT Huawei Untuk Instalasi Bundle Core Di STO Rungkut, Tropodo, Manyar Dan Injoko', 'Nota Dinas MGR ACCESS OPTIMA AND CONSTRUCTION SPV SURABAYA SELATAN Nomor C.Tel. 7/TK 100/R5W-5M330000/2019 Tanggal 22 Januari 2019 Perihal Surat Ijin Masuk STO RKT, MYR, TPO & IJK PT. Huawei', '-', 1, 1, 2, '2019-01-22 08:44:16', '2019-01-22 09:23:51'),
(42, '372019', 'LPSE JATIM', 1, 'Surat Ijin Masuk Dan Ijin Kerja Oleh LPSE JATIM Untuk Dismantle Perangkat Di Data Center Gubeng', 'Nota Dinas HEAD OF SURABAYA AND BALI STAR DC MANAGEMENT TELKOMSIGMA Nomor C.Tel. 17/UM 000/JSCC-1217000/2019 Tanggal 22 Januari 2019 Perihal Permohonan SIMARU tambahan untuk team LPSE Jatim', '-', 1, 1, 2, '2019-01-23 01:45:48', '2019-01-23 01:47:25'),
(43, '382019', 'PT HUAWEI TECH INVESTEMENT', 1, 'Surat Ijin Masuk Dan Ijin Kerja PT Huawei Tech Investment Untuk Survey Pengadaan Dan Pemasangan Metro Ethernet, BRAS, PCEF Dan PE Transit Platform Huawei Di STO Rungkut - Penambahan Personil', 'Nota Dinas SM BROADBAND NODE DEPLOYMENT DPD Nomor C.Tel. 50/PW 000/PND-B1050000/2019 Tanggal 16 Januari 2019 Perihal Permohonan Izin Masuk & Bekerja serta Penunjukan Waspang untuk SP#1 Pengadaan dan Pemasangan Metro Ethernet, BRAS, PCEF dan PE Transit Platform Huawei - TREG 5', 'SIMARU Tel. 30/SIMARU/SBS/2019 - TIDAK BERLAKU dan Permohonan Simaru s/d 31 Maret 2019', 1, 1, 2, '2019-01-23 04:04:45', '2019-01-23 04:05:27'),
(44, '392019', 'DINAS PERHUBUNGAN JATIM', 1, 'Surat Ijin Masuk Dan Ijin Kerja Oleh Dinas Perhubungan Jatim Untuk Setup Dan Update Sistem Di Data Center Gubeng', 'Nota Dinas HEAD OF SURABAYA AND BALI STAR DC MANAGEMENT TELKOMSIGMA Nomor C.Tel. 18/UM 000/JSCC-1217000/2019 Tanggal 23 Januari 2019 Perihal Permohonan SIMARU tambahan untuk Team Dinas Perhubungan Jatim', '-', 1, 1, 2, '2019-01-23 08:46:15', '2019-01-23 08:47:32'),
(45, '402019', 'PT PRIMEDIA ARMOEKADATA INTERNET ( PT. EKADATA )', 1, 'Surat Ijin Masuk Dan Ijin Kerja PT EKADATA Untuk Dismantle Perangkat Di Neucentrix CNDC Gubeng', 'Nota Dinas POH OSM REGIONAL WHOLESALE SERVICE REGIONAL V Nomor C.Tel. 17/YN 000/DR5-11200000/2019 Tanggal 23 Januari 2019 Perihal Permohonan Ijin Masuk Lokasi Neucentrix Gubeng Untuk PT PRIMEDIA ARMOEKADATA INTERNET', '-', 1, 1, 2, '2019-01-24 01:06:43', '2019-01-24 01:09:11'),
(46, '412019', 'MITRATEL-PT POCA', 1, 'Surat Ijin Masuk Dan Ijin Kerja PT Poca Untuk Pekerjaan MAINTENANCE FOR GFR ISAT Colo TELKOM Di STO Injoko Dan Rungkut', 'Nota Dinas MANAGER CONSTRUCTION JAWA BALI MITRATEL Nomor C.Tel. 154/TK 000/GMA-C1400000/2019 Tanggal 25 Januari 2019 Perihal Surat Ijin Masuk Lokasi Site STO Injoko & STO Rungkut_MAINTENANCE FOR GFR ISAT Colo TELKOM', '-', 1, 1, 2, '2019-01-25 03:59:15', '2019-01-25 04:01:11'),
(47, '422019', 'PT HYPERNET INDODATA', 1, 'Surat Ijin Masuk Dan Ijin Kerja PT Hypernet Indodata Untuk Survey Neucentrix Di CNDC Gubeng', 'Nota Dinas OSM REGIONAL WHOLESALE SERVICE REGIONAL V Nomor C.Tel. 18/YN 000 /DR5-11200000/2019 Tanggal 27 Januari 2019 Perihal Permohonan ijin masuk lokasi', '-', 1, 1, 2, '2019-01-28 01:15:46', '2019-01-28 09:00:31'),
(48, '432019', 'MITRATEL-PT PERSADA', 1, 'Surat Ijin Masuk Dan Ijin Kerja PT Persada Untuk Pekerjaan Preventive Maintenance Perangkat XL Colo Telkom Di STO Rungkut, Injoko Dan Yan Dinoyo', 'Nota Dinas MANAGER CONSTRUCTION JAWA BALI MITRATEL Nomor C.Tel. 161/TK 000/GMA-C1400000/2019 Tanggal 28 Januari 2019 Perihal Surat Ijin Masuk Lokasi Site STO Rungkut, STO Injoko,STO Dinoyo_Preventive Maintenance XL Colo TELKOM', '-', 1, 1, 2, '2019-01-28 04:33:15', '2019-01-28 04:34:00'),
(49, '442019', 'PT HUAWEI', 1, 'Surat Ijin Masuk Dan Ijin Kerja PT Huawei Untuk Preventif Maintenance Perangkat IMS Huawei Dan Replacing SPU Board Di STO Rungkut [PERPU]', 'Nota Dinas MGR IP SERVICE NODE OPERATION DSO Nomor C.Tel. 2/TK 000/DSO-20401000/2019 Tanggal 24 Januari 2019 Perihal Permohonan ijin masuk dan kerja di STO Rungkut dan Kebalen dan Ijin Downtime OSM IP SERVICE OPERATION Nomor CRA.18704/012701/IP SERVICE OPERATION/IJIN/2019 Tanggal 27-Januari-2019 Perihal Implementation Solution ForReplace SPU Board Fault SB4M-SBC01', 'SIMARU MALAM downtime @ 15 menit sesuai CRA.18704', 1, 1, 2, '2019-01-28 09:23:52', '2019-01-28 11:58:59'),
(50, '452019', 'PT NEC', 1, 'Surat Ijin Masuk Dan Ijin Kerja PT NEC Untuk Survey, Installasi & Commtest Percepatan Implementasi NAT PE Indihome Rafi 2019 Di STO Rungkut', 'Nota Dinas SM CORE AND IP SERVICE PLANNING DPD Nomor C.Tel. 5/PW 000/PND-B1040000/2019 Tanggal 28 Januari 2019 Perihal Permohonan Ijin Kerja / Masuk Lokasi dan Penunjukan Waspang Kegiatan Percepatan Implementasi NAT PE Indihome Rafi 2019', 'Permohonan Simaru s/d 31 Maret 2019', 1, 1, 2, '2019-01-29 01:45:17', '2019-01-29 01:45:58'),
(51, '462019', 'GRAHA SARANA DUTA (GSD)', 1, 'Surat Ijin Masuk Dan Ijin Kerja Oleh GSD Untuk Pemasangan APAR Di STO Rungkut', 'Nota Dinas FACILITY MANAGER, GSD Nomor 02144/UM-000/GSD-550-01/2019 Tanggal 29 Januari 2019 Perihal Permohonan Ijin Masuk & Ijin Kerja untuk Pemasangan APAR di STO Rungkut', '-', 1, 1, 2, '2019-01-29 04:17:56', '2019-01-29 05:58:30'),
(52, '472019', 'MITRATEL-PT IDE', 1, 'Surat Ijin Masuk Dan Ijin Kerja PT IDE Untuk Pemasangan Jumper Grounding Busbar Perangkat Telkomsel Colo Telkom Di STO Manyar', 'Nota Dinas MANAGER CONSTRUCTION JAWA BALI MITRATEL Nomor C.Tel. 169/TK 000/GMA-C1400000/2019 Tanggal 29 Januari 2019 Perihal Permohonan Ijin Masuk dan Kerja Di Lokasi STO Manyar', '-', 1, 1, 2, '2019-01-29 07:34:46', '2019-01-30 06:53:25'),
(53, '482019', 'GRAHA SARANA DUTA (GSD)', 1, 'Surat Ijin Masuk Dan Ijin Kerja Oleh GSD Untuk Perapihan Saluran Kabel Di Data Center Gubeng', 'Nota Dinas HEAD OF SURABAYA AND BALI STAR DC MANAGEMENT TELKOMSIGMA Nomor C.Tel. 19/UM 000/JSCC-1217000/2019 Tanggal 30 Januari 2019 Perihal Permohonan SIMARU untuk Teknisi PT GSD', '-', 1, 1, 2, '2019-01-30 06:52:38', '2019-01-30 06:53:23'),
(54, '492019', 'POLTEK JEMBER', 2, 'Surat Ijin Masuk STO Untuk Siswa PKL', 'NDE', 'PKL', 1, 1, 2, '2019-03-04 02:39:51', '2019-03-04 02:43:49'),
(55, '502019', 'TELKOM AKSES', 1, 'Surat Ijin Pkl', 'ngf surabaya', 'pkl', 1, 1, 2, '2019-03-15 01:40:46', '2019-03-15 01:42:37'),
(56, '512019', 'TELKOM SURABAYA', 1, 'Surat Ijin Masuk Ruangan', 'nde surabaya', 'pkl', 0, 0, 0, '2019-03-19 08:29:18', '2019-03-19 08:29:18');

-- --------------------------------------------------------

--
-- Table structure for table `unitperusahaan`
--

CREATE TABLE `unitperusahaan` (
  `id` int(10) UNSIGNED NOT NULL,
  `namaUnit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idPerusahaan` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unitperusahaan`
--

INSERT INTO `unitperusahaan` (`id`, `namaUnit`, `idPerusahaan`, `created_at`, `updated_at`) VALUES
(1, 'Umum', 1, NULL, NULL),
(2, 'Telkom Akses', 2, NULL, NULL),
(3, 'SIGMA', 3, NULL, NULL),
(4, 'TKM NETRA', 4, NULL, NULL),
(5, 'MITRATEL', 5, NULL, NULL),
(6, 'CCAN', 2, '2018-12-28 07:31:38', '2018-12-28 07:31:38'),
(7, 'MARKETING & SALES DIVRE V', 3, '2019-01-15 09:14:23', '2019-01-15 09:14:23'),
(8, 'AKSES KOMUNITAS TELKOM MUMED', 3, '2019-01-15 09:15:26', '2019-01-15 09:15:26'),
(9, 'YUGA PERKASA', 3, '2019-01-15 09:15:36', '2019-01-15 09:15:36'),
(10, 'ITS', 3, '2019-01-15 09:15:49', '2019-01-15 09:15:49'),
(11, 'SSC / SONY SUGEMA COLEGE', 3, '2019-01-15 09:16:01', '2019-01-15 09:16:01'),
(12, 'BINA PROGRAM PEMKOT SURABAYA', 3, '2019-01-15 09:16:16', '2019-01-15 09:16:16'),
(13, 'SPEED TEST TELKOM SPEEDY', 3, '2019-01-15 09:16:27', '2019-01-15 09:16:27'),
(14, 'PEMDA LAMONGAN', 3, '2019-01-15 09:16:36', '2019-01-15 09:16:36'),
(15, 'YAYASAN PENDIDIKAN TELKOM BDG', 3, '2019-01-15 09:18:34', '2019-01-15 09:18:34'),
(16, 'DISHUBKOMINFO BANYUWANGI', 3, '2019-01-15 09:18:48', '2019-01-15 09:18:48'),
(17, 'TDI, PT (SURVEYLANCE)', 3, '2019-01-15 09:19:06', '2019-01-15 09:19:06'),
(18, 'DISKOMINFO JATIM', 3, '2019-01-15 09:19:14', '2019-01-15 09:19:14'),
(19, 'WAN-OPTI', 3, '2019-01-15 09:20:02', '2019-01-15 09:20:02'),
(20, 'DISHUB SURABAYA', 3, '2019-01-15 09:20:15', '2019-01-15 09:20:15'),
(21, 'SNMPTN', 3, '2019-01-15 09:20:33', '2019-01-15 09:20:33'),
(22, 'NEGAKOM', 3, '2019-01-15 09:20:41', '2019-01-15 09:20:41'),
(23, 'UNIVERSITAS NEGERI YOGYA', 3, '2019-01-15 09:20:49', '2019-01-15 09:20:49'),
(24, 'GBS INDONESIA', 3, '2019-01-15 09:21:01', '2019-01-15 09:21:01'),
(25, 'ASURANSI JASA RAHARJA', 3, '2019-01-15 09:21:12', '2019-01-15 09:21:12'),
(26, 'WINGS SURYA', 3, '2019-01-15 09:21:21', '2019-01-15 09:21:21'),
(27, 'KAHA TOUR \'N TRAVEL', 3, '2019-01-15 09:21:31', '2019-01-15 09:21:31'),
(28, 'DINAS PENDIDIKAN KUTAI TIMUR', 3, '2019-01-15 09:21:40', '2019-01-15 09:21:40'),
(29, 'BANK JATIM', 3, '2019-01-15 09:21:50', '2019-01-15 09:21:50'),
(30, 'DRC DELIMA', 3, '2019-01-15 09:21:59', '2019-01-15 09:21:59'),
(31, 'KOPERTIS WILAYAH VI JATENG', 3, '2019-01-15 09:22:09', '2019-01-15 09:22:09'),
(32, 'IT TELKOM', 3, '2019-01-15 09:22:17', '2019-01-15 09:22:17'),
(33, 'PT SIGRA ADHI SEJAHTERA', 3, '2019-01-15 09:22:29', '2019-01-15 09:22:29'),
(34, 'UNIV AHMAD DAHLAN JOGJA', 3, '2019-01-15 09:22:54', '2019-01-15 09:22:54'),
(35, 'PT BEON INTERMEDIA', 3, '2019-01-15 09:23:05', '2019-01-15 09:23:05'),
(36, 'UNIV MULAWARMAN SAMARINDA', 3, '2019-01-15 09:23:22', '2019-01-15 09:23:22'),
(37, 'LEMBAGA SANDI NEGARA', 3, '2019-01-15 09:23:33', '2019-01-15 09:23:33'),
(38, 'PT PANCANAKA SU-PROPERTI MLG', 3, '2019-01-15 09:24:19', '2019-01-15 09:24:19'),
(39, 'LPSE KABUPATEN KUTAI TIMUR', 3, '2019-01-15 09:24:29', '2019-01-15 09:24:29'),
(40, 'PT DOK DAN PERKAPALAN SURABAYA', 3, '2019-01-15 09:24:43', '2019-01-15 09:24:43'),
(41, 'SBMPTN 2015 [BNI]', 3, '2019-01-15 09:24:52', '2019-01-15 09:24:52'),
(42, 'POLDA JATIM - CV COMLEC MUMED', 3, '2019-01-15 09:25:20', '2019-01-15 09:25:20'),
(43, 'STIE PERBANAS SURABAYA', 3, '2019-01-15 09:25:31', '2019-01-15 09:25:31'),
(44, 'PT PASCAL SOLUSI NUSANTARA', 3, '2019-01-15 09:25:51', '2019-01-15 09:25:51'),
(45, 'CV GRAHA S U/ POLDA JATIM', 3, '2019-01-15 09:26:21', '2019-01-15 09:26:21'),
(46, 'PT ARSENET', 3, '2019-01-15 09:26:36', '2019-01-15 09:26:36'),
(47, 'PT UNIVERSAL', 3, '2019-01-15 09:26:47', '2019-01-15 09:26:47'),
(48, 'DIKNAS SURABAYA', 3, '2019-01-15 09:28:09', '2019-01-15 09:28:09'),
(49, 'PT TAMBORA', 3, '2019-01-15 09:28:23', '2019-01-15 09:28:23'),
(50, 'DINAS PU CIPTA & TATA R SBY', 3, '2019-01-15 09:30:37', '2019-01-15 09:30:37'),
(51, 'POLDA DI YOGYAKARTA', 3, '2019-01-15 09:30:51', '2019-01-15 09:30:51'),
(52, 'PT APIK KOMUNIKASI INDONESIA', 3, '2019-01-15 09:34:02', '2019-01-15 09:34:02'),
(53, 'UGT', 3, '2019-01-15 09:34:13', '2019-01-15 09:34:13'),
(54, 'CHINA NET CENTER', 3, '2019-01-15 09:34:20', '2019-01-15 09:34:20'),
(55, 'TELIN', 3, '2019-01-15 09:34:30', '2019-01-15 09:34:30'),
(56, 'CDCI', 3, '2019-01-15 09:34:38', '2019-01-15 09:34:38'),
(57, 'PRIMEDIA EKA DATA', 3, '2019-01-15 09:34:56', '2019-01-15 09:34:56'),
(58, 'GREATSHOFT', 3, '2019-01-15 09:35:04', '2019-01-15 09:35:04'),
(59, 'PPNS', 3, '2019-01-15 09:35:16', '2019-01-15 09:35:16'),
(60, 'JASA TIRTA MALANG', 3, '2019-01-15 09:35:30', '2019-01-15 09:35:30'),
(61, 'UNAIR', 3, '2019-01-15 09:35:38', '2019-01-15 09:35:38'),
(62, 'KOPERTIS 7', 3, '2019-01-15 09:35:54', '2019-01-15 09:35:54'),
(63, 'SBMPTN MANDIRI', 3, '2019-01-15 09:36:27', '2019-01-15 09:36:27'),
(64, 'PT GAHARU', 3, '2019-01-15 09:36:35', '2019-01-15 09:36:35'),
(65, 'ARTHA LINTAS DATA MANDIRI', 3, '2019-01-15 09:37:03', '2019-01-15 09:37:03'),
(66, 'ISH', 3, '2019-01-15 09:37:18', '2019-01-15 09:37:18'),
(67, 'DATASOFT SYSTEM', 3, '2019-01-15 09:37:33', '2019-01-15 09:37:33'),
(68, 'PT BATAM BINTAN T', 3, '2019-01-15 09:38:23', '2019-01-15 09:38:23'),
(69, 'WOWRACK', 3, '2019-01-15 09:38:35', '2019-01-15 09:38:35'),
(70, 'OUTSOURCE GSD', 3, '2019-01-15 09:39:13', '2019-01-15 09:39:13'),
(71, 'FIBER ACADEMY', 2, '2019-01-16 01:35:26', '2019-01-16 01:35:26'),
(72, 'FTTH BASIC', 2, '2019-01-16 01:37:18', '2019-01-16 01:37:18'),
(73, 'MAINTENANCE FTM', 2, '2019-01-16 01:45:31', '2019-01-16 01:45:31'),
(74, 'MIGRASI', 2, '2019-01-16 01:50:49', '2019-01-16 01:50:49'),
(75, 'OPTIMA', 2, '2019-01-16 01:53:40', '2019-01-16 01:53:40'),
(76, 'MAINTENANCE', 2, '2019-01-16 01:56:01', '2019-01-16 01:56:01'),
(77, 'SQUAT', 2, '2019-01-16 01:56:34', '2019-01-16 01:56:34'),
(78, 'PIHAK KE-3', 2, '2019-01-16 02:01:53', '2019-01-16 02:01:53'),
(79, 'PROVISIONING', 2, '2019-01-16 02:02:32', '2019-01-16 02:02:32'),
(80, 'WIFI', 2, '2019-01-16 02:04:05', '2019-01-16 02:04:05'),
(81, 'SDI', 2, '2019-01-16 02:11:49', '2019-01-16 02:11:49'),
(82, 'UNIV. AHMAD DAHLAN JOGJAKARTA', 3, '2019-01-16 02:51:38', '2019-01-16 02:51:38'),
(83, 'PT. BEON INTERMEDIA', 3, '2019-01-16 02:51:49', '2019-01-16 02:51:49'),
(84, 'UNIV. MULAWARMAN SAMARINDA', 3, '2019-01-16 02:52:03', '2019-01-16 02:52:03');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `nik` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statusUser` tinyint(4) NOT NULL,
  `idLokasi` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nik`, `nama`, `username`, `password`, `kontak`, `role`, `statusUser`, `idLokasi`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '401519', 'Sigit Widagdo', 'adminsbs', '$2y$12$HOqxIrsPWYUnNQ/QN0.u/O7L45u/FGOmA5etVl9kzdsj3zD.BhB/W', '-', 'admin', 1, 1, 'nKvxeifPe2zYj9KyWfYSRGVDHwh27TWphXE6gsyVWWKWZ4MBSunBWMtf0wFV', NULL, NULL),
(2, '-', 'GM WITEL', 'gmwitel', '$2y$10$mZK0j/lhiSs9HRbZ2BMXru3wCKQQe/fVbqlEON3.7wgJxEDYLccha', '-', 'gm', 1, 1, 'Xn7gvncCs8DCJPmnY6KL1d7PCn2a6n0XE5JKWT8bhGvB5zWSntpye3PbI0Ei', NULL, '2017-09-13 05:14:07'),
(3, '-', 'MGR SAS', 'mgrsas', '$2y$10$kGgkq/5i5EBBoRGP3Vuow.fuozKkSgYx7IRiqA71mWlZnT9MxUTOS', '-', 'sas', 1, 1, 'cgix6tLwNlvjvSWNKv24KY4zYkXa2ScuI1lmOonPuNL7bViMr3ohtQrqTVcZ', NULL, '2017-09-13 05:12:58'),
(4, '870022', 'Havea Pertiwi', '870022', '$2y$12$HOqxIrsPWYUnNQ/QN0.u/O7L45u/FGOmA5etVl9kzdsj3zD.BhB/W', '-', 'validator', 1, 1, 'X2caZAtFwJSgnsph7aLqmcSaUJwCb3T9BqCatmoRQC0XrVf7F3BkmizyYnIT', NULL, NULL),
(5, '640986', 'Achmad Muslich', '640986', '$2y$12$HOqxIrsPWYUnNQ/QN0.u/O7L45u/FGOmA5etVl9kzdsj3zD.BhB/W', '-', 'supervalidator', 1, 1, 'f6EM2NeSOHT1dqVkMJ1ieIgpXmw99llwJR9zZ4BfeHX8YTlBbeWyuStUoOos', NULL, NULL),
(6, '20000', 'RKTTES', 'RKTTES', '$2y$10$V3UBVvHxf7kxYO3kS0fEMujW8oBrupW4FNjrnTgYrmSjjM.GoQmR2', '-', 'security', 1, 2, 'yq9LHhhNqeAZipfTW8tXuULPRtxEjXkjC6muRwjNvIHpE8BTtqObGsuRKH3j', '2018-11-23 01:36:14', '2018-11-23 01:55:23'),
(7, '20001', 'FERDIYANTO', 'Frediyanto', '$2y$10$6TNdy3dUGI51C1nxoKFs2ONkNNkl0tGMEtiW/0tqrN8GCqBQbaQX.', '082132398752', 'security', 1, 2, 'Gj2xjt3F7nm0GUAcSXna1NpdW9xPq98rh9qUlsQ3dqStOLHR26yKHLfk3cWT', '2018-11-23 01:37:16', '2018-11-23 01:55:26'),
(8, '20002', 'GUNARTO', 'gunarto', '$2y$10$v1cMaV8oBu8S9ZUYNXNLee.FZGPFuiL1iR4vczvRJrc6kVfIg4.bK', '0813-5847-8429', 'security', 1, 2, '0R4CPuRZxe9I6HanZFsN7EQbE8QuXie4a39u9RMFYRbuct9XSFEOj51nYfTi', '2018-11-23 01:40:11', '2018-11-23 01:55:28'),
(9, '20003', 'SUYANI', 'suyani', '$2y$10$NiafdEkbam9BEOooWFDJU.todFYRKVTrYZyaHjsZpsMg/b5C2ZuVq', '0822-3121-6914', 'security', 1, 2, 'w0AMZeVzo649722LCN3z3adVAuwC9LK73hopTdhKpHjm8STANGTXYzqlGpFI', '2018-11-23 01:44:01', '2018-11-23 01:55:31'),
(10, '20004', 'KRISTIYONO', 'kristiyono', '$2y$10$g9FTjOtmF.7vtEbFDoOV6ubYUrfixxsueeZJgyghaZ2d8t/a6uJGW', '0821-4020-1849', 'security', 1, 2, 'AQr7V2K7bRvm1Gkvz8DAY5nMkjboqRmpiD8rXGTfJ7do6jYn6ZMpvBhyR1yM', '2018-11-23 01:44:57', '2018-11-23 01:55:33'),
(11, '20005', 'MARDI', 'mardi01', '$2y$10$T0IXNPstaBmPzH9wf2MoquDl5HE1viBgdaUO3xOvX6rYandfsu4kK', '0852-0457-0222', 'security', 1, 2, 'qtBrkRXoTEFjurD9RvC73KlQbRbJhiUeutrIh8FcXsTqZS0hxTJ4g1zPyqXi', '2018-11-23 01:46:26', '2018-11-23 01:55:36'),
(12, '20006', 'YANUAR PRIBADI', 'yanuar', '$2y$10$4VZCcl2pqylSUMf1AmkbmO4wmlmCQRnqpgjqyJ/4RnK/RGZyjzqzi', '0851-0166-0171', 'security', 1, 2, NULL, '2018-11-23 01:47:18', '2018-11-23 01:55:40'),
(13, '20007', 'RISDIAN', 'risdian', '$2y$10$eYZKYzOjbMXL1kcdk69j6uwIKEjELTrMruNkjoUqGjlLsbxJ06LIK', '0817-0391-1168', 'security', 1, 2, 'QcSd9DhxDkq6vdWMBkFTScQqqE3eFJwyDiGjXcxAA8JQFj0C75qOZc2p5Fzt', '2018-11-23 01:48:40', '2018-11-23 01:55:44'),
(14, '20008', 'BUDI SALMAN', 'budisalman', '$2y$10$BUhSYlw7x1zToeM3wpXVwes.N3/u9pb3d8OqElrInRjartE4CvaJy', '0851-0735-0333', 'security', 1, 2, 'ZCqupE9rYFdCHtmKbO3fL3M8W0UBcNrkw73gtAiuMK7OaE346dmXloS1kKeo', '2018-11-23 01:49:57', '2018-11-23 01:55:48'),
(15, '20009', 'SUHARTO', 'suharto', '$2y$10$8cAMafy9eGEv8NdG2aU7deJZqERYCN35Sd2wkByQIajlP70fSq2NC', '0851-0988-2001', 'security', 1, 2, 'qYXxvKsOfVSFqCNXAZe51d2SKTxfMA6sEBuglTeeJMCTologtrDc05Cbu1yR', '2018-11-23 01:51:06', '2018-11-23 01:55:52'),
(16, '20010', 'DIMAS', 'dimas01', '$2y$10$XomCBoqhvXab5ivaHh80cuyc8HkJkgEqDHPNeYlBBFQwz5CKGQd4e', '-', 'security', 1, 2, NULL, '2018-11-23 01:52:26', '2018-11-23 01:55:20'),
(17, '21000', 'TPOTES', 'TPOTES', '$2y$10$GZITGp.jgEAYHdi1RnvCg.m6Rp4K.7U/ADPokIiPxNkMFtxrgWgB.', '-', 'security', 1, 9, 'QNvOMkGBg7JXEphLs8Tos444sTvzr1R9Z38cQggBO1u4thlxmlcgp7aV9zMp', '2018-11-23 01:59:01', '2018-11-23 02:07:41'),
(18, '21001', 'SUPRIYADI', 'supriyadi', '$2y$10$7qfCjVegClgmQf75EJoCZuWJ3ZK41RDiv8L4oaRGiA1pAEhc.DKNK', '0851-0085-6890', 'security', 1, 9, NULL, '2018-11-23 02:02:24', '2018-11-23 02:07:46'),
(19, '21002', 'FIRMAN', 'firman', '$2y$10$L0PfUOD5p/3BkuTFCsLoY.yhAYVFn5lrY/OoLKmzbFqgvPlciZSju', '0851-0062-3819', 'security', 1, 9, NULL, '2018-11-23 02:03:12', '2018-11-23 02:07:51'),
(20, '21003', 'ANJAS', 'anjas01', '$2y$10$ZNGfFfHMUDDb0ZS60V/z4uELJD.ErW3W2SjgfcDcSHSoaUEKnFaJm', '081332913901', 'security', 1, 9, NULL, '2018-11-23 02:04:08', '2018-11-23 02:07:56'),
(21, '21004', 'OBAIT', 'obait01', '$2y$10$pQfbcKEZ9DGyhVcdZkuS2.NLSQO73myJotHyjqoJOxBh6GJ17XmOi', '-', 'security', 1, 9, NULL, '2018-11-23 02:04:55', '2018-11-23 02:08:01'),
(22, '22000', 'JGRTES', 'JGRTES', '$2y$10$m28clzFe1F7TxLXe/hYdAeV2kqwxzy5e6UBT39VONfXhhhIkAJDfS', '-', 'security', 1, 6, 'zW6u3g1X18BjYDIGlx28T6NAxgKpLOG0zENXjqbczdrh5kzrl7G4VdFjWLEP', '2018-11-23 02:09:57', '2018-11-23 02:16:12'),
(23, '22001', 'MARIADI', 'mariadi', '$2y$10$UWtfWK.pxA.hufwLjrDllOXPUxTp3hLVyAqWZ9Fx2Bcl61EzJOOBS', '-', 'security', 1, 6, NULL, '2018-11-23 02:11:50', '2018-11-23 02:16:19'),
(24, '22002', 'TARINO', 'tarino', '$2y$10$xCE9k3HLu2KCW8JJnMyvMOfYRzdY8q.w4p4rQCEE3bdDzhiSDJXSK', '-', 'security', 1, 6, NULL, '2018-11-23 02:12:55', '2018-11-23 02:16:23'),
(25, '22003', 'SUANTONO', 'suantono', '$2y$10$2QRIjfNLO66vEfk7O6JLYeG7Z8DBXM5TGSb9lznWev5VzsVJy7Djm', '081332948578', 'security', 1, 6, NULL, '2018-11-23 02:14:33', '2018-11-23 02:16:28'),
(26, '40000', 'IJKTES', 'IJKTES', '$2y$10$Rsk8q5t403zYr7M1wz.dN.6DLFhQSsGh/lZbp4Za2tZnNLPWsOHbi', '-', 'security', 1, 7, NULL, '2018-11-23 03:45:09', '2018-11-23 04:26:34'),
(27, '40001', 'FERDINAN', 'ferdinan', '$2y$10$QiCYzkKCqw9kIts2UaIXFefSwJms6BWyej5B.Wp1LDkjV5tUjFjTi', '085104418890', 'security', 1, 7, '4U94qb8sBfJTWejVbfs7NaMhfb0EEGyOtKDo1KkLGzi3fZqdnhcjnehmWzvr', '2018-11-23 04:18:12', '2018-11-23 04:26:39'),
(28, '40002', 'DLOFIR', 'dlofir', '$2y$10$hGZIEqTmcYTJaU38LOUFnOF6hkZ9uhhJGnEfSC0Bqv4me/APO6c.6', '082141700078', 'security', 1, 7, '6LHcQr3lJRVLmmE2VQ4hqrZ6KpoRfNdnjPukpC1BKZClH1IEodYFEQ8GrXCe', '2018-11-23 04:19:02', '2018-11-23 04:26:43'),
(29, '40003', 'KHOIRIN', 'khoirin', '$2y$10$s9NruV7CJAZmBt50toyXde8z3IlrXvBot6cXh04CN29mfftOnwgVS', '082214394910', 'security', 1, 7, 'Lu06vxxNMpOSUFLct4eYqWBZkZ90FxjBzeGdZgfBGuoBI9MSbgV3P5LMgNjf', '2018-11-23 04:19:52', '2018-11-23 04:26:47'),
(30, '40004', 'MARTEN', 'marten', '$2y$10$QqpBj.aXOfawUT6adsZoyuqFzq6pV/7yW5JybSSymuzQVoEgGxie.', '082132186708', 'security', 1, 7, 'VTCsN1AMAmod0tUC5sj1if90BHbMHiKLksgwegFmtusHSqpRsqPkC1ksPS5e', '2018-11-23 04:20:36', '2018-11-23 04:26:52'),
(31, '41000', 'WR1TES', 'WR1TES', '$2y$10$IWKeEnE.le6pN01sWTkj.OkBb8Bwthm6.n1688.j50bcjCw49DImC', '-', 'security', 1, 8, NULL, '2018-11-23 04:21:35', '2018-11-23 04:26:59'),
(32, '41001', 'AGUS RAHMAT', 'agusrahmat', '$2y$10$bFOiliulTehWNKYqDjz2.OcLhjuwUMCOu4OnxNUD3QL/uAAOCbv1W', '-', 'security', 1, 8, NULL, '2018-11-23 04:22:37', '2018-11-23 04:27:04'),
(33, '41002', 'HASIM', 'hasim01', '$2y$10$WQll8X8P8bgRWBPqa1xcguE4HXV/bhrG1.MqejJTjyuQpBy2JpaT.', '-', 'security', 1, 8, 'jMpv7BbPltnG9m5UlXs8KvDZmIJCvjsRlQW0VrTeMlCcsaCwBgtomBPVaoHz', '2018-11-23 04:23:32', '2018-11-23 04:27:08'),
(34, '41003', 'SETIYAWAN', 'setiyawan', '$2y$10$GRqnhBpPnoiXZJ//WJQUlu6VEJQKKASH3O/WIIwZ0KBGY9ziJJHye', '085100557441', 'security', 1, 8, 's85QcRr5mAo7JRCuLZ8WZvbxB1HTW5wccsaY0ytwc9jj6LYye7WtT6VcXDaN', '2018-11-23 04:24:23', '2018-11-23 04:27:12'),
(35, '41004', 'TRI PRASETYO', 'triprasetyo', '$2y$10$tBvJCrrWrfsC7SKxJghMLuSMcU4rGZZLClFm1DRTbGMJUkOuT9gHC', '085102564412', 'security', 1, 8, 'k0oh7IWdZ5CNO4q1Qr9OQ6WE5N1vhsfVvTui2EtlqSHB1OxHkyIJ4PMtzFGA', '2018-11-23 04:25:23', '2018-11-23 04:27:16'),
(36, '30000', 'GUBTES', 'GUBTES', '$2y$10$TXKGnuQhMFgKW97.UU/vTeSFL6XaJSrruOj99y/4A14U7fvX/6eb2', '-', 'security', 1, 3, 'pt5abgAH41mcxEWoF11olIOP2IS3TWQ4pY9tYKel5MhMqePGOP9mqY8v9vjh', '2018-11-23 06:31:04', '2018-11-23 07:02:16'),
(37, '30001', 'ARIS JIMAN', 'arisjiman', '$2y$10$SFat6JOkQpjr8bxNqItStu2HwEdSeShRsHCopD/25SMZFR24Czzx.', '0851-0600-1919', 'security', 1, 3, NULL, '2018-11-23 06:33:10', '2018-11-23 07:02:20'),
(38, '30002', 'ROSID', 'rosid01', '$2y$10$hcJjMgRb0aeWK4AhBO66GO2nCUHCuYnA3bl5M8WpNWDccOm7X/OA.', '-', 'security', 1, 3, 'BUX9wZsuVSbTTQMmMGW6iMU1xREv5G1dXzCQUMy3fxIvc9uh3Y7UEVkxDsTc', '2018-11-23 06:34:08', '2018-11-23 07:02:24'),
(39, '30003', 'IRWAN', 'irwan01', '$2y$10$ExtgdYqo5/1ZYlymBwetNezcUmPbUsLf0/cbyZ.hZZrwQ0ooEAsiS', '0822-5747-0595', 'security', 1, 3, '1bqQgv9t5IIHmP5EuAMvpSYbvXBAagf7qXh3tnli44Qp74QHAHWCWsOhLg5D', '2018-11-23 06:35:22', '2018-11-23 07:02:29'),
(40, '30004', 'IKSAN', 'iksan01', '$2y$10$CtJ2dZr9lStWmHNWcGT/jed4Xo5PK.flZgvxgfiu6/aCDd1eApmu2', '0851-0009-0656', 'security', 1, 3, 'sJ95gSQnIJpzNfJBmlHWZxZKkECIgcLs8Ogk9Ff3vHwSpbe0T45Z0ZuPrmLy', '2018-11-23 06:36:54', '2018-11-23 07:02:34'),
(41, '30005', 'ROSI', 'rosi01', '$2y$10$UrJDXBKyWprv..SfNuSeGeaZJxrIOlaf7r9tmiXzPcsEJu0ZMe8P2', '-', 'security', 1, 3, NULL, '2018-11-23 06:37:46', '2018-11-23 07:02:39'),
(42, '30006', 'BUDI', 'budi01', '$2y$10$XPFsVJucxJbsep9kMA1qH.TeAljWmfp60bq8BDrm8Ert5RSOJV0wq', '0851-0099-0102', 'security', 1, 3, 'dY3xFjmdPsb3NFRe731JjQZvSdacAYbsPeoZ2t5lj5DvRv4X3EzoKr5id36c', '2018-11-23 06:39:45', '2018-11-23 07:02:45'),
(43, '30007', 'ARGA', 'arga01', '$2y$10$PW.uqkknZJB7rhOH6w7c.eHjzHsHHAoVmZTprKH4TCuxbTj6PcUmi', '-', 'security', 1, 3, '1sufa7dMjWNY8dP7cK320LLmG5yGTLei7nxAC1QoHu2qVD3fDIl619nD98Op', '2018-11-23 06:40:50', '2018-11-23 07:02:50'),
(44, '31000', 'MNRTES', 'MNRTES', '$2y$10$JO1FN3NObVHdMNWRf/.U6Olk8Eo.L2T5GAHghnydqCYU3V4piC9HO', '-', 'security', 1, 4, 'zRRN9hHNtMuvcAz5vJVis4tskFSgtQwNkSh7IE86S7uigbPWuzKPt2yeSJAR', '2018-11-23 06:50:53', '2018-11-23 07:03:03'),
(45, '31001', 'HAFILUDIN', 'hafiludin', '$2y$10$LUwMDCM5j2GBFhdsfFN8TOn6./D4UlNjJr/cK1qxlbIZWy83YBpB.', '0851-0560-8090', 'security', 1, 4, 'N0KoL87o9lrXq8quvTbt6FEoJ7kVZSCAd6PSkxOgXk9gwwWO6feSexaFkuj1', '2018-11-23 06:51:45', '2018-11-23 07:03:08'),
(46, '31002', 'WIHARMADI', 'wiharmadi', '$2y$10$rPOghBuMR4V39aMI4SrDIeB.MuR7TTMybMv1WJX1YxdK35xcUf9h.', '087853599119', 'security', 1, 13, 'qY0eRWVfmoGCxRJc4UsTscYXQ22kRLqXwi5pDmkJHNqG1RM5HglxKUEM5R90', '2018-11-23 06:52:46', '2018-11-23 07:03:12'),
(47, '31003', 'FUAD', 'fuad01', '$2y$10$Osw6W2eVIMAgrgW/WSsGYurDo.Qd86UqdgU74Yit5HWtLTGkB3Inu', '0812-3111-4194', 'security', 1, 4, 'w3kNxdNyBiljKf5AYr4u7yoozy20dzJrAExzlWaKylsDvTYBV2u2DnWA5gFk', '2018-11-23 06:54:50', '2018-11-23 07:03:16'),
(48, '31004', 'IDRIS', 'idris01', '$2y$10$lgjw6pHClQGLRZVy2xEnX.GBsjaAm1y.Slb5buYE9sWhq.MStVShK', '0851-0399-0699', 'security', 1, 4, NULL, '2018-11-23 06:55:47', '2018-11-23 07:03:20'),
(49, '31005', 'WASUL', 'wasul01', '$2y$10$qtcJ/N0TdTFbxnhoW0/LWe9R0IFvBq8cJDxeR8fFu.LNuW2KS.i1C', '0851-2228-021', 'security', 1, 4, NULL, '2018-11-23 06:57:06', '2018-11-23 07:03:27'),
(50, '31006', 'SUSIAMIN', 'susiamin', '$2y$10$GFtDTm17mEsmZf9Dc4U3muPST5jhv95ZVHovvZlFUN7qzB4PN5r5K', '0851-0173-5959', 'security', 1, 4, NULL, '2018-11-23 06:58:08', '2018-11-23 07:03:32'),
(51, '32000', 'DMOTES', 'DMOTES', '$2y$10$vR5TdokGMAeQ9I3Bciy5puBqNovUhgnhCc0mVvbT8GMOZuYXNcAI6', '-', 'security', 1, 5, 'lhduZH5NhxoNJHex47bYRd956mob8D5PstM9H1CrYzo4AOpcDerWlB8hZXO8', '2018-11-23 07:05:00', '2018-11-23 07:27:12'),
(52, '32001', 'ROMELAN', 'romelan', '$2y$10$aEZ6EeMnwK9PNRBMYp7q/eYsV1ien8rRtNU8ZvNJi7P3dJBgsuGoe', '085102789189', 'security', 1, 5, NULL, '2018-11-23 07:13:03', '2018-11-23 07:27:20'),
(53, '32002', 'AMIN', 'amin01', '$2y$10$y0/qfV6vBnjk7LZ6e63r2eFSp/4yYWqLu6wSUU/0nZEDJS9x76jHu', '085100970397', 'security', 1, 5, NULL, '2018-11-23 07:13:50', '2018-11-23 07:58:06'),
(54, '32003', 'ANDI', 'andi01', '$2y$10$d4MqbNSRudAhywA7vW99jOXpnjzYMI3Oeh9bSfkw9RAH8KW./HJnm', '085103565943', 'security', 1, 5, '5WDZwaHvyihcX3JazDlF4Y45SVrcUriFTz4onqC2C8T0RyW0wESCSMHZcBRM', '2018-11-23 07:14:29', '2018-11-23 07:58:11'),
(55, '32004', 'TRIHANDOYO', 'trihandoyo', '$2y$10$gg6yJDgI7Sc/wyyocv5pjOQXnrZu4VHp7FOkygAZ.AEr6XYjQX8Va', '085100683683', 'security', 1, 5, NULL, '2018-11-23 07:15:14', '2018-11-23 07:58:18'),
(56, '32005', 'WIDIONO', 'widiono', '$2y$10$jRBshd0.RQSWpkoYVEeBLupvw1W3pTHyStwyNemfWK7GMafD7Wu1S', '082232863286', 'security', 1, 5, 'Hs5ZCj9969DXJoYmxeKAps8PRwh54aQUACjUjnPNXM6lbtTKLoNRxFua0FO7', '2018-11-23 07:15:55', '2018-11-23 07:58:24'),
(57, '32006', 'FATCHUR ROCHMAN', 'fatchurahman', '$2y$10$YguEeiOVCA4UzphJiRdW0OiEp2dy3qNta9weVvnEzBA67J8LJ3SwK', '085101434622', 'security', 0, 5, NULL, '2018-11-23 07:16:49', '2018-11-23 07:16:49'),
(58, '32007', 'ELKA', 'elka01', '$2y$10$q/BB3myLJlBw0QJBQZzsRuqoB5NFc3lOzk1p/e3TWnzpMMqs2C6Fe', '081230777461', 'security', 1, 5, 'UMMuioh0fTuL1BuYw0GAlgEB3DwxTj5MK0YQztQmaCgjNhzdSDdmMgzBfbN8', '2018-11-23 07:17:30', '2018-11-23 07:58:28'),
(59, '32008', 'ENDRO BASUKI', 'endrobasuki', '$2y$10$GPXPixCzlcYuyi/Nd4NHf.0HmEKD41YGt6lo4OLpITRa3NErvt6pW', '085101725149', 'security', 1, 5, NULL, '2018-11-23 07:25:34', '2018-11-23 07:58:34'),
(60, '32009', 'PURHADI', 'purhadi', '$2y$10$B7i8n0KdshFkGWpa5s6gMOAFlavplsaXBzB2xg2liQjFtDofpo4Li', '087851430288', 'security', 1, 5, NULL, '2018-11-23 07:26:19', '2018-11-23 07:58:39'),
(61, '34000', 'UBIS 51', 'UBISTES', '$2y$10$g/5.UbdCuGoT6fE7CujvSu/HxwN1bRSlDXWEEmYI9Shs5PeottQzi', '-', 'security', 1, 10, NULL, '2018-12-18 08:00:03', '2018-12-18 08:17:56'),
(62, '34001', 'ADANG', 'adang01', '$2y$10$YrUtAX.3dOO7Z2Xt8y95POXO8skPAa.3ZX3U/JoXi8tvFBSxj.hRu', '-', 'security', 1, 10, 'l64FvwoAGDX0G5WDattUze6YLIIIPW0vy9KJQQMrJYvm9257eHg03kohvzc9', '2018-12-18 08:02:18', '2018-12-18 08:18:00'),
(63, '34002', 'SUGIONO', 'sugiono', '$2y$10$FRSgggENfHx9EADxVjvJ/eVj/qC3veqY448/bZud6Bc4vVCfENGbC', '-', 'security', 1, 10, NULL, '2018-12-18 08:02:53', '2018-12-18 08:18:04'),
(64, '34003', 'HARI SUJIANTO', 'harisujianto', '$2y$10$NF75TfFsRtB/qB8Sd8lE7eIFC3PLsztKeCpaL4QV88CfQgNn7Ny7O', '-', 'security', 0, 2, NULL, '2018-12-18 08:03:50', '2018-12-18 08:03:50'),
(65, '33000', 'PLASA DINOYO', 'DNYTES', '$2y$10$KAkogQzG8MS5.k/lZdLSkeuhl.JTobVZ6tg4vYZ1L9wC8XV7h3vuq', '-', 'security', 1, 11, NULL, '2018-12-18 08:05:54', '2018-12-18 08:17:09'),
(66, '33001', 'PUDJIANTO', 'pudjiyanto', '$2y$10$Cf1FdwVUPslLv.sxLLIDg.EK9eMoE.Pmz30yYXtQg0sTO6Wc4tcjK', '-', 'security', 1, 11, NULL, '2018-12-18 08:09:54', '2018-12-18 08:17:13'),
(67, '33002', 'KODERI', 'koderi', '$2y$10$uQg5bA1bn6hOpZlxtQ0NteIApsmiBGhxmNhbQOEhjY5Bg7LYH5ABW', '-', 'security', 1, 11, NULL, '2018-12-18 08:10:29', '2018-12-18 08:17:18'),
(68, '33003', 'CHAERUDIN', 'chaerudin', '$2y$10$wZPfpUMAIny3tDQ1djAL7Ob18hvl4l7GridEzr.62y8/TCw2z1oKm', '-', 'security', 1, 11, NULL, '2018-12-18 08:11:18', '2018-12-18 08:17:23'),
(69, '33004', 'SADELI', 'sadeli', '$2y$10$Q9JSwVZquWWJxN7FCVPfTu//Vbx5HSEWT4n3/8V3knZ1GVE7G8K7i', '-', 'security', 1, 11, NULL, '2018-12-18 08:11:54', '2018-12-18 08:17:28'),
(70, '33005', 'AGUNG KUSUMA', 'agungkusuma', '$2y$10$dPQomh1pMJWk/8rizznDeee0VISkmGx99ZbChH5rLuUo6QL3ALMc2', '-', 'security', 1, 11, NULL, '2018-12-18 08:13:21', '2018-12-18 08:17:34'),
(71, '33006', 'BUDI SUKRISNO', 'budisukrisno', '$2y$10$K6Mpw4ZHP8BRdMdVQBtqQ.eWsjpokveVbCZE./ZMlXuBZF.HK5ZGy', '-', 'security', 1, 11, NULL, '2018-12-18 08:14:11', '2018-12-18 08:17:39'),
(72, '631966', 'SURIYANTO', '631966', '$2y$10$nE58ZVUfT8Gkw67K/f8NdONaFTnaNiR.mRYIFvhq5J/IgzOEyYnFK', '0851-0001-2257', 'picTelkom', 1, 1, 'Gk1RI8VfbRqvJE7BJviqHkgXHhzrdvOI0ECAlYJFKDWC0uVUvS3TYBKcgs44', '2018-12-28 03:16:13', '2018-12-28 03:44:58'),
(73, '660413', 'I GDE WIRAYASA', '660413', '$2y$10$L6gS.Mml/SvHaxk2EZt.gOVVPSCLPf1aFCWs70I./XO9Gw4n/HZ7S', '081234939101', 'picTelkom', 1, 1, 'O35b4VP0SU6HWpShIt5bf1KFPungn6BqEKN4a0QIhvne7U3ORbPG80c5v7VD', '2018-12-28 03:41:55', '2018-12-28 03:45:08'),
(74, '720218', 'TEGUH RIYANTO', '720218', '$2y$10$prJFmc0a0O95m.mtkTjkMu6Yw7fLlX7lxHCLqKoAljUIlXodRb3Pa', '0813-3900-1008', 'picTelkom', 1, 1, NULL, '2018-12-28 03:58:05', '2018-12-28 04:00:32'),
(75, '631064', 'TOFAN HIDAYAT', '631064', '$2y$10$IzzHRlf7SvWujuPEian9yuKsbWTJyNXqjxuYGJHp1LHgjuQbhlB9K', '0851-0099-6635', 'picTelkom', 1, 1, 'yrFMg6ptBH4BKmaF7CeKB6LODEbRbcGsQDfZNXLs1USCcHoEfTXdRPV2L3gs', '2019-01-14 03:46:55', '2019-01-14 03:47:14'),
(76, '630126', 'SUDIRO', '630126', '$2y$10$S1KxYq6ODzDTrPtZV17Cmet1MhHNnFqog.FlmonLe8jJWiqPx6JRW', '0851-0591-3476', 'picTelkom', 1, 1, NULL, '2019-01-15 04:43:34', '2019-01-15 04:44:04'),
(77, '31007', 'ARIS JIMAN SAPUTRO', 'aris19', '$2y$10$AnbnshO7QANlxqlaohu4mOODa5twzSoGXgEaFAonCs/f5xc6GfahW', '0851-0600-1919', 'security', 1, 4, 'FlBWa21xX834ErdTAM1EQCgG7IUlEJRRQX87lD0pSyxfLeg5HP0bjX1we7U6', '2019-01-24 02:11:33', '2019-01-24 02:11:58'),
(78, '920268', 'Natanael Pandapotan', '920268', '$2y$10$qK2IocMATNkyBEjhmJSS2uhijs1mHj5sTkmXfl5tGiO8/s/MKrDUG', '081310108341', 'picTelkom', 1, 1, 'r578LgDfrZrwKYQ5nIykoR6XUma5sqmz5Cb2en7iuXgmjcSkyGTzy5qGUZN7', '2019-02-18 03:24:12', '2019-03-13 02:31:17');

-- --------------------------------------------------------

--
-- Table structure for table `waspang`
--

CREATE TABLE `waspang` (
  `id` int(10) UNSIGNED NOT NULL,
  `idSuratMasuk` int(10) UNSIGNED NOT NULL,
  `idPicTelkom` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `waspang`
--

INSERT INTO `waspang` (`id`, `idSuratMasuk`, `idPicTelkom`, `created_at`, `updated_at`) VALUES
(6, 5, 11, '2019-01-07 08:05:13', '2019-01-07 08:05:13'),
(8, 6, 16, '2019-01-07 08:30:51', '2019-01-07 08:30:51'),
(10, 7, 17, '2019-01-08 07:37:46', '2019-01-08 07:37:46'),
(12, 8, 18, '2019-01-08 07:49:02', '2019-01-08 07:49:02'),
(14, 9, 10, '2019-01-08 07:58:31', '2019-01-08 07:58:31'),
(15, 10, 11, '2019-01-09 00:57:58', '2019-01-09 00:57:58'),
(17, 11, 19, '2019-01-09 08:32:36', '2019-01-09 08:32:36'),
(18, 12, 2, '2019-01-09 08:49:59', '2019-01-09 08:49:59'),
(19, 12, 3, '2019-01-09 08:49:59', '2019-01-09 08:49:59'),
(21, 13, 20, '2019-01-09 09:07:24', '2019-01-09 09:07:24'),
(22, 14, 10, '2019-01-10 01:16:26', '2019-01-10 01:16:26'),
(24, 15, 21, '2019-01-10 03:30:07', '2019-01-10 03:30:07'),
(25, 16, 18, '2019-01-10 04:07:57', '2019-01-10 04:07:57'),
(27, 17, 22, '2019-01-11 07:18:13', '2019-01-11 07:18:13'),
(28, 18, 10, '2019-01-14 01:19:48', '2019-01-14 01:19:48'),
(29, 19, 14, '2019-01-14 01:37:14', '2019-01-14 01:37:14'),
(32, 21, 11, '2019-01-14 04:43:28', '2019-01-14 04:43:28'),
(33, 22, 18, '2019-01-14 05:32:04', '2019-01-14 05:32:04'),
(34, 23, 14, '2019-01-14 08:05:40', '2019-01-14 08:05:40'),
(36, 20, 23, '2019-01-15 02:23:19', '2019-01-15 02:23:19'),
(40, 24, 23, '2019-01-15 07:34:08', '2019-01-15 07:34:08'),
(41, 26, 11, '2019-01-15 08:18:50', '2019-01-15 08:18:50'),
(43, 27, 20, '2019-01-16 01:09:53', '2019-01-16 01:09:53'),
(44, 28, 1, '2019-01-16 01:43:02', '2019-01-16 01:43:02'),
(45, 29, 20, '2019-01-16 01:58:22', '2019-01-16 01:58:22'),
(46, 30, 11, '2019-01-16 02:10:48', '2019-01-16 02:10:48'),
(47, 31, 21, '2019-01-16 03:06:00', '2019-01-16 03:06:00'),
(50, 32, 10, '2019-01-16 03:34:27', '2019-01-16 03:34:27'),
(52, 34, 20, '2019-01-17 01:35:03', '2019-01-17 01:35:03'),
(53, 35, 1, '2019-01-17 03:36:10', '2019-01-17 03:36:10'),
(54, 35, 15, '2019-01-17 03:36:10', '2019-01-17 03:36:10'),
(57, 33, 23, '2019-01-18 07:23:15', '2019-01-18 07:23:15'),
(58, 25, 24, '2019-01-19 12:50:03', '2019-01-19 12:50:03'),
(59, 37, 10, '2019-01-21 07:46:17', '2019-01-21 07:46:17'),
(60, 38, 10, '2019-01-21 08:44:52', '2019-01-21 08:44:52'),
(61, 39, 10, '2019-01-22 03:01:47', '2019-01-22 03:01:47'),
(62, 40, 10, '2019-01-22 04:26:22', '2019-01-22 04:26:22'),
(64, 41, 14, '2019-01-22 09:23:32', '2019-01-22 09:23:32'),
(65, 42, 10, '2019-01-23 01:45:48', '2019-01-23 01:45:48'),
(66, 43, 20, '2019-01-23 04:04:45', '2019-01-23 04:04:45'),
(67, 44, 10, '2019-01-23 08:46:15', '2019-01-23 08:46:15'),
(69, 45, 10, '2019-01-24 01:08:42', '2019-01-24 01:08:42'),
(70, 45, 25, '2019-01-24 01:08:42', '2019-01-24 01:08:42'),
(71, 46, 11, '2019-01-25 03:59:15', '2019-01-25 03:59:15'),
(74, 48, 11, '2019-01-28 04:33:15', '2019-01-28 04:33:15'),
(75, 47, 10, '2019-01-28 09:00:09', '2019-01-28 09:00:09'),
(76, 47, 25, '2019-01-28 09:00:09', '2019-01-28 09:00:09'),
(77, 47, 26, '2019-01-28 09:00:09', '2019-01-28 09:00:09'),
(81, 49, 27, '2019-01-28 09:51:12', '2019-01-28 09:51:12'),
(82, 50, 20, '2019-01-29 01:45:17', '2019-01-29 01:45:17'),
(85, 51, 28, '2019-01-29 05:57:55', '2019-01-29 05:57:55'),
(87, 52, 11, '2019-01-29 07:35:16', '2019-01-29 07:35:16'),
(88, 53, 10, '2019-01-30 06:52:38', '2019-01-30 06:52:38'),
(89, 54, 1, '2019-03-04 02:39:51', '2019-03-04 02:39:51'),
(90, 55, 1, '2019-03-15 01:40:47', '2019-03-15 01:40:47'),
(91, 56, 1, '2019-03-19 08:29:18', '2019-03-19 08:29:18');

-- --------------------------------------------------------

--
-- Table structure for table `waspangsuratkeluar`
--

CREATE TABLE `waspangsuratkeluar` (
  `id` int(10) UNSIGNED NOT NULL,
  `idPicTelkom` int(10) UNSIGNED NOT NULL,
  `idSuratKeluar` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `waspangsuratkeluar`
--

INSERT INTO `waspangsuratkeluar` (`id`, `idPicTelkom`, `idSuratKeluar`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2019-04-01 04:26:25', '2019-04-01 04:26:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beritasimaru`
--
ALTER TABLE `beritasimaru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daftarbarang`
--
ALTER TABLE `daftarbarang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barang_idsuratkeluar_foreign` (`idSuratKeluar`);

--
-- Indexes for table `forwarding`
--
ALTER TABLE `forwarding`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forwarding_idsuratmasuk_foreign` (`idSuratMasuk`),
  ADD KEY `forwarding_idpictelkom_foreign` (`idPicTelkom`);

--
-- Indexes for table `lampiran`
--
ALTER TABLE `lampiran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lampiran_idsuratmasuk_foreign` (`idSuratMasuk`);

--
-- Indexes for table `lampiransuratkeluar`
--
ALTER TABLE `lampiransuratkeluar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lampiran_idsuratkeluar_foreign` (`idSuratKeluar`);

--
-- Indexes for table `logbarangkeluar`
--
ALTER TABLE `logbarangkeluar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idSecurity_foreign` (`idSecurity`),
  ADD KEY `log_idSuratKeluar_foreign` (`idSuratKeluar`),
  ADD KEY `log_idLokasi_foreign` (`idLokasi`);

--
-- Indexes for table `logmasuk`
--
ALTER TABLE `logmasuk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `logmasuk_idpetugas_foreign` (`idPetugas`),
  ADD KEY `logmasuk_idsuratmasuk_foreign` (`idSuratMasuk`),
  ADD KEY `logmasuk_idsecuritymasuk_foreign` (`idSecurityMasuk`),
  ADD KEY `logmasuk_idsecuritykeluar_foreign` (`idSecurityKeluar`),
  ADD KEY `logmasuk_idlokasi_foreign` (`idLokasi`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lokasikerja`
--
ALTER TABLE `lokasikerja`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lokasikerja_idpekerjaan_foreign` (`idPekerjaan`),
  ADD KEY `lokasikerja_idlokasi_foreign` (`idLokasi`);

--
-- Indexes for table `lokasisuratkeluar`
--
ALTER TABLE `lokasisuratkeluar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idLokasi_foreign` (`idLokasi`),
  ADD KEY `idSuratKeluar_foreign` (`idSuratKeluar`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nda`
--
ALTER TABLE `nda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nda_idpicmitra_foreign` (`idPicMitra`);

--
-- Indexes for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pekerjaan_idsuratmasuk_foreign` (`idSuratMasuk`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengguna_iduser_foreign` (`idUser`),
  ADD KEY `pengguna_idpictelkom_foreign` (`idPicTelkom`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `petugas_idpicmitra_foreign` (`idPicMitra`),
  ADD KEY `petugas_idsuratmasuk_foreign` (`idSuratMasuk`);

--
-- Indexes for table `picmitra`
--
ALTER TABLE `picmitra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `picmitra_idperusahaan_foreign` (`idPerusahaan`),
  ADD KEY `picmitra_idunitperusahaan_foreign` (`idUnitPerusahaan`);

--
-- Indexes for table `pictelkom`
--
ALTER TABLE `pictelkom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suratkeluarbarang`
--
ALTER TABLE `suratkeluarbarang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nomorsurat` (`nomorSurat`);

--
-- Indexes for table `suratmasuk`
--
ALTER TABLE `suratmasuk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `suratmasuk_nomorsurat_unique` (`nomorSurat`);

--
-- Indexes for table `unitperusahaan`
--
ALTER TABLE `unitperusahaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unitperusahaan_idperusahaan_foreign` (`idPerusahaan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_username_unique` (`username`),
  ADD KEY `user_idlokasi_foreign` (`idLokasi`);

--
-- Indexes for table `waspang`
--
ALTER TABLE `waspang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `waspang_idsuratmasuk_foreign` (`idSuratMasuk`),
  ADD KEY `waspang_idpictelkom_foreign` (`idPicTelkom`);

--
-- Indexes for table `waspangsuratkeluar`
--
ALTER TABLE `waspangsuratkeluar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `petugas_idSuratKeluar_foreign` (`idSuratKeluar`),
  ADD KEY `petugas_idPicTelkom_foreign` (`idPicTelkom`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beritasimaru`
--
ALTER TABLE `beritasimaru`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `daftarbarang`
--
ALTER TABLE `daftarbarang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `forwarding`
--
ALTER TABLE `forwarding`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `lampiran`
--
ALTER TABLE `lampiran`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `lampiransuratkeluar`
--
ALTER TABLE `lampiransuratkeluar`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `logbarangkeluar`
--
ALTER TABLE `logbarangkeluar`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `logmasuk`
--
ALTER TABLE `logmasuk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;
--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `lokasikerja`
--
ALTER TABLE `lokasikerja`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT for table `lokasisuratkeluar`
--
ALTER TABLE `lokasisuratkeluar`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `nda`
--
ALTER TABLE `nda`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=852;
--
-- AUTO_INCREMENT for table `picmitra`
--
ALTER TABLE `picmitra`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=961;
--
-- AUTO_INCREMENT for table `pictelkom`
--
ALTER TABLE `pictelkom`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `suratkeluarbarang`
--
ALTER TABLE `suratkeluarbarang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `suratmasuk`
--
ALTER TABLE `suratmasuk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `unitperusahaan`
--
ALTER TABLE `unitperusahaan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `waspang`
--
ALTER TABLE `waspang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT for table `waspangsuratkeluar`
--
ALTER TABLE `waspangsuratkeluar`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `daftarbarang`
--
ALTER TABLE `daftarbarang`
  ADD CONSTRAINT `barang_idsuratkeluar_foreign` FOREIGN KEY (`idSuratKeluar`) REFERENCES `suratkeluarbarang` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `forwarding`
--
ALTER TABLE `forwarding`
  ADD CONSTRAINT `forwarding_idpictelkom_foreign` FOREIGN KEY (`idPicTelkom`) REFERENCES `pictelkom` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `forwarding_idsuratmasuk_foreign` FOREIGN KEY (`idSuratMasuk`) REFERENCES `suratmasuk` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lampiran`
--
ALTER TABLE `lampiran`
  ADD CONSTRAINT `lampiran_idsuratmasuk_foreign` FOREIGN KEY (`idSuratMasuk`) REFERENCES `suratmasuk` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lampiransuratkeluar`
--
ALTER TABLE `lampiransuratkeluar`
  ADD CONSTRAINT `lampiran_idsuratkeluar_foreign` FOREIGN KEY (`idSuratKeluar`) REFERENCES `suratkeluarbarang` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `logbarangkeluar`
--
ALTER TABLE `logbarangkeluar`
  ADD CONSTRAINT `idSecurity_foreign` FOREIGN KEY (`idSecurity`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `log_idLokasi_foreign` FOREIGN KEY (`idLokasi`) REFERENCES `lokasi` (`id`),
  ADD CONSTRAINT `log_idSuratKeluar_foreign` FOREIGN KEY (`idSuratKeluar`) REFERENCES `suratkeluarbarang` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `logmasuk`
--
ALTER TABLE `logmasuk`
  ADD CONSTRAINT `logmasuk_idlokasi_foreign` FOREIGN KEY (`idLokasi`) REFERENCES `lokasi` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `logmasuk_idpetugas_foreign` FOREIGN KEY (`idPetugas`) REFERENCES `petugas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `logmasuk_idsecuritykeluar_foreign` FOREIGN KEY (`idSecurityKeluar`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `logmasuk_idsecuritymasuk_foreign` FOREIGN KEY (`idSecurityMasuk`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `logmasuk_idsuratmasuk_foreign` FOREIGN KEY (`idSuratMasuk`) REFERENCES `suratmasuk` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lokasikerja`
--
ALTER TABLE `lokasikerja`
  ADD CONSTRAINT `lokasikerja_idlokasi_foreign` FOREIGN KEY (`idLokasi`) REFERENCES `lokasi` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lokasikerja_idpekerjaan_foreign` FOREIGN KEY (`idPekerjaan`) REFERENCES `pekerjaan` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lokasisuratkeluar`
--
ALTER TABLE `lokasisuratkeluar`
  ADD CONSTRAINT `idLokasi_foreign` FOREIGN KEY (`idLokasi`) REFERENCES `lokasi` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `idSuratKeluar_foreign` FOREIGN KEY (`idSuratKeluar`) REFERENCES `suratkeluarbarang` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nda`
--
ALTER TABLE `nda`
  ADD CONSTRAINT `nda_idpicmitra_foreign` FOREIGN KEY (`idPicMitra`) REFERENCES `picmitra` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD CONSTRAINT `pekerjaan_idsuratmasuk_foreign` FOREIGN KEY (`idSuratMasuk`) REFERENCES `suratmasuk` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `pengguna_idpictelkom_foreign` FOREIGN KEY (`idPicTelkom`) REFERENCES `pictelkom` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengguna_iduser_foreign` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `petugas`
--
ALTER TABLE `petugas`
  ADD CONSTRAINT `petugas_idpicmitra_foreign` FOREIGN KEY (`idPicMitra`) REFERENCES `picmitra` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `petugas_idsuratmasuk_foreign` FOREIGN KEY (`idSuratMasuk`) REFERENCES `suratmasuk` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `picmitra`
--
ALTER TABLE `picmitra`
  ADD CONSTRAINT `picmitra_idperusahaan_foreign` FOREIGN KEY (`idPerusahaan`) REFERENCES `perusahaan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `picmitra_idunitperusahaan_foreign` FOREIGN KEY (`idUnitPerusahaan`) REFERENCES `unitperusahaan` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `unitperusahaan`
--
ALTER TABLE `unitperusahaan`
  ADD CONSTRAINT `unitperusahaan_idperusahaan_foreign` FOREIGN KEY (`idPerusahaan`) REFERENCES `perusahaan` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_idlokasi_foreign` FOREIGN KEY (`idLokasi`) REFERENCES `lokasi` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `waspang`
--
ALTER TABLE `waspang`
  ADD CONSTRAINT `waspang_idpictelkom_foreign` FOREIGN KEY (`idPicTelkom`) REFERENCES `pictelkom` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `waspang_idsuratmasuk_foreign` FOREIGN KEY (`idSuratMasuk`) REFERENCES `suratmasuk` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `waspangsuratkeluar`
--
ALTER TABLE `waspangsuratkeluar`
  ADD CONSTRAINT `petugas_idPicTelkom_foreign` FOREIGN KEY (`idPicTelkom`) REFERENCES `pictelkom` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `petugas_idSuratKeluar_foreign` FOREIGN KEY (`idSuratKeluar`) REFERENCES `suratkeluarbarang` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
