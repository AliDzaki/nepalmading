-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2024 at 04:18 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mading-nepal`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(4) NOT NULL,
  `kategori` varchar(15) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`, `created_at`, `updated_at`) VALUES
(1, 'Berita', '2024-05-26 00:05:58', '2024-05-26 00:05:58'),
(2, 'Pembelajaran', '2024-05-26 00:06:09', '2024-05-30 02:30:46'),
(3, 'Acara', '2024-05-26 00:06:26', '2024-05-26 00:06:26'),
(4, 'PPLG', '2024-05-26 00:06:39', '2024-05-26 00:06:39'),
(5, 'ATPH', '2024-05-26 00:07:05', '2024-05-26 00:07:05');

-- --------------------------------------------------------

--
-- Table structure for table `mading`
--

CREATE TABLE `mading` (
  `id` int(4) UNSIGNED NOT NULL,
  `judul` varchar(40) NOT NULL,
  `slug` varchar(40) NOT NULL,
  `gambar` varchar(80) NOT NULL,
  `konten` text NOT NULL,
  `kategori_id` int(4) NOT NULL,
  `pembuat` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mading`
--

INSERT INTO `mading` (`id`, `judul`, `slug`, `gambar`, `konten`, `kategori_id`, `pembuat`, `created_at`, `updated_at`) VALUES
(1, 'Juara F2LSN', 'juara-f2lsn', '1716708162_Gambar WhatsApp 2024-05-26 pukul 14.09.24_a361f0b5.jpg', '<div>Hallo Wargi Nep4l!<br><br>Alhamdulillah pada kegiatan Festival &amp; Lomba ', 1, 'Fikri Dzaki Ali', '2024-05-26 00:22:42', '2024-05-26 00:22:42'),
(2, 'PPDB', 'ppdb', '1716795577_Gambar WhatsApp 2024-05-26 pukul 14.11.03_a81e518d.jpg', '<h1><strong>PPDB TELAH DIBUKA!!</strong></h1><div><br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius commodi possimus, dolores exercitationem porro ipsam placeat recusandae officiis pariatur, error earum cupiditate doloremque vitae nulla quod impedit repudiandae nostrum vero minima rem repellendus! Cum, expedita rerum soluta consequatur praesentium quaerat odit! Enim pariatur necessitatibus cumque hic voluptatem laborum eius, totam deleniti, eos assumenda doloremque nisi nemo voluptatum quas magni saepe.</div><div>Aut placeat quibusdam quam velit saepe consectetur sed non odio ipsam hic, nihil maiores veritatis tempora nostrum illo soluta assumenda, labore doloremque? Quis maxime soluta voluptates libero voluptatibus quos.</div>', 1, 'Fikri Dzaki Ali', '2024-05-27 00:39:38', '2024-05-27 00:39:38'),
(3, 'Juara', 'juara', '1716795716_Gambar WhatsApp 2024-05-26 pukul 14.11.03_a81e518d.jpg', '<div>juara&nbsp;</div>', 2, 'Fikri Dzaki Ali', '2024-05-27 00:41:56', '2024-05-27 00:41:56');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2024_05_09_113554_create_kategoris_table', 1),
(3, '2024_05_11_021833_mading', 1),
(4, '2024_05_18_081052_user', 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(4) UNSIGNED NOT NULL,
  `nama` varchar(45) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(8) NOT NULL DEFAULT 'user',
  `pengajuan_penulis` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `role`, `pengajuan_penulis`, `created_at`, `updated_at`) VALUES
(3, 'Fikri Dzaki Ali', 'pengelola', '$2y$12$Mbu.Mv4PTAvAnsqaMFeO9uY1ehkfBOKZJxG7j8YgvInKMO4dq.Ukq', 'admin', 0, '2024-05-27 00:34:06', '2024-05-27 00:34:06'),
(4, 'Rizal Three permadi', 'tilu', '$2y$12$sMi8lyV.OEBfnRCe8q0Cl.7UrUJE.wWYjWHW.t4YewQSEPLIlDCBO', 'pembuat', 0, '2024-05-27 00:54:10', '2024-05-27 00:54:46'),
(5, 'wildan akbar firdaus', 'firdaus', '$2y$12$F056IQbMHWbERcs3GqybNud1lxgynTmbQdm7/jOF7WYei8pK8l/Am', 'pembuat', 0, '2024-06-02 09:12:46', '2024-06-02 09:16:14'),
(6, 'hamdan jauzi ahmad', 'hamdan', '$2y$12$wyEaWineJNYPmQ8m7BZVqOzKPFz/izF3hScmbpaCSaEBm1k1EI4Wy', 'user', 0, '2024-06-02 09:13:22', '2024-06-02 09:18:19'),
(7, 'Vincent lutfi', 'vincent', '$2y$12$rQZqbLbxOhxZw0bTOQikfuG4nleSZEnzt8Ygg.88rOIdFkcwy0mJS', 'user', 0, '2024-06-02 09:13:56', '2024-06-02 09:13:56'),
(8, 'Desta andreansyah', 'desta', '$2y$12$.2hmgkXUyQym5sbl8t46W.RPdsJJE9Llf/l4Cyk9fxS34hpx8kmKe', 'user', 1, '2024-06-02 09:14:34', '2024-06-02 09:14:34');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vmading`
-- (See below for the actual view)
--
CREATE TABLE `vmading` (
`id` int(4) unsigned
,`judul` varchar(40)
,`slug` varchar(40)
,`gambar` varchar(80)
,`konten` text
,`id_kategori` int(4)
,`kategori` varchar(15)
,`pembuat` varchar(45)
,`created_at` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vpengajupenulis`
-- (See below for the actual view)
--
CREATE TABLE `vpengajupenulis` (
`id` int(4) unsigned
,`nama` varchar(45)
,`username` varchar(25)
,`password` varchar(255)
,`role` varchar(8)
,`pengajuan_penulis` tinyint(1)
,`created_at` timestamp
,`updated_at` timestamp
);

-- --------------------------------------------------------

--
-- Structure for view `vmading`
--
DROP TABLE IF EXISTS `vmading`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vmading`  AS SELECT `mading`.`id` AS `id`, `mading`.`judul` AS `judul`, `mading`.`slug` AS `slug`, `mading`.`gambar` AS `gambar`, `mading`.`konten` AS `konten`, `kategori`.`id_kategori` AS `id_kategori`, `kategori`.`kategori` AS `kategori`, `mading`.`pembuat` AS `pembuat`, `mading`.`created_at` AS `created_at` FROM (`mading` join `kategori` on(`mading`.`kategori_id` = `kategori`.`id_kategori`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vpengajupenulis`
--
DROP TABLE IF EXISTS `vpengajupenulis`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vpengajupenulis`  AS SELECT `user`.`id` AS `id`, `user`.`nama` AS `nama`, `user`.`username` AS `username`, `user`.`password` AS `password`, `user`.`role` AS `role`, `user`.`pengajuan_penulis` AS `pengajuan_penulis`, `user`.`created_at` AS `created_at`, `user`.`updated_at` AS `updated_at` FROM `user` WHERE `user`.`pengajuan_penulis` = 1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `mading`
--
ALTER TABLE `mading`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mading`
--
ALTER TABLE `mading`
  MODIFY `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
