-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Des 2023 pada 07.09
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppl`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `departments`
--

CREATE TABLE `departments` (
  `kode_department` varchar(255) NOT NULL,
  `nama_department` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `departments`
--

INSERT INTO `departments` (`kode_department`, `nama_department`, `email`, `user_id`, `created_at`, `updated_at`) VALUES
('1101', 'department', 'department@gmail.com', 16, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosenwalis`
--

CREATE TABLE `dosenwalis` (
  `nip` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `handphone` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dosenwalis`
--

INSERT INTO `dosenwalis` (`nip`, `nama`, `email`, `handphone`, `user_id`, `created_at`, `updated_at`) VALUES
('1501', 'Slamet Tejo', 'slamet@gmail.com', '08929', 2, NULL, NULL),
('1502', 'Surti ', 'surti@gmail.com', '0821229', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `irs`
--

CREATE TABLE `irs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mahasiswa_id` varchar(255) NOT NULL,
  `semester` varchar(255) DEFAULT NULL,
  `jmlsks` int(11) DEFAULT NULL,
  `scansks` varchar(255) DEFAULT NULL,
  `isverified` tinyint(1) NOT NULL DEFAULT 0,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `irs`
--

INSERT INTO `irs` (`id`, `mahasiswa_id`, `semester`, `jmlsks`, `scansks`, `isverified`, `updated_at`) VALUES
(1, '2401', '1', 21, 'Form_Ivan.pdf', 0, '2023-12-04'),
(2, '2402', '6', 24, 'Ivan S Harianja Pengajuan Surat Pengantar FSM untuk Praktek Kerja Lapangan (PKL) mahasiswa Prodi Informatika.pdf', 0, '2023-12-04'),
(3, '2405', '3', 68, 'studi kasus.pdf', 0, '2023-12-04'),
(4, '24002', '1', 21, 'Form_Ivan.pdf', 0, '2023-12-05'),
(5, '2406', '2', 24, 'Form_Ivan.pdf', 1, '2023-12-06'),
(6, '2408', '1', 24, 'Form_Ivan.pdf', 1, '2023-12-06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `k_h_s`
--

CREATE TABLE `k_h_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mahasiswa_id` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `skssemester` int(11) NOT NULL,
  `skskumulatif` int(11) NOT NULL,
  `ipsemester` double(8,2) NOT NULL,
  `ipkumulatif` double(8,2) NOT NULL,
  `scankhs` varchar(255) DEFAULT NULL,
  `isverified` tinyint(1) NOT NULL DEFAULT 0,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `k_h_s`
--

INSERT INTO `k_h_s` (`id`, `mahasiswa_id`, `semester`, `skssemester`, `skskumulatif`, `ipsemester`, `ipkumulatif`, `scankhs`, `isverified`, `updated_at`) VALUES
(1, '2401', '1', 21, 21, 3.90, 3.90, 'Form_Ivan.pdf', 0, '2023-12-04'),
(2, '2402', '4', 21, 100, 3.80, 3.50, 'Ivan S Harianja Pengajuan Surat Pengantar FSM untuk Praktek Kerja Lapangan (PKL) mahasiswa Prodi Informatika.pdf', 1, '2023-12-04'),
(3, '2405', '3', 24, 68, 4.00, 3.90, 'studi kasus.pdf', 0, '2023-12-04'),
(4, '2406', '1', 24, 45, 3.80, 3.85, 'Ivan S Harianja Pengajuan Surat Pengantar FSM untuk Praktek Kerja Lapangan (PKL) mahasiswa Prodi Informatika.pdf', 0, '2023-12-05'),
(5, '2406', '2', 24, 45, 3.90, 3.95, 'Ivan S Harianja Pengajuan Surat Pengantar FSM untuk Praktek Kerja Lapangan (PKL) mahasiswa Prodi Informatika.pdf', 0, '2023-12-05'),
(6, '2408', '1', 24, 24, 3.40, 3.40, 'Form_Ivan.pdf', 1, '2023-12-06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswas`
--

CREATE TABLE `mahasiswas` (
  `nim` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `kab_kota` varchar(255) DEFAULT NULL,
  `propinsi` varchar(255) DEFAULT NULL,
  `angkatan` varchar(255) NOT NULL,
  `jalur_masuk` enum('SNMPTN','SBMPTN','MANDIRI') NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `handphone` varchar(255) DEFAULT NULL,
  `foto_mahasiswa` varchar(255) DEFAULT NULL,
  `status` int(50) DEFAULT NULL,
  `dosen_wali` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mahasiswas`
--

INSERT INTO `mahasiswas` (`nim`, `nama`, `alamat`, `kab_kota`, `propinsi`, `angkatan`, `jalur_masuk`, `email`, `handphone`, `foto_mahasiswa`, `status`, `dosen_wali`, `user_id`, `created_at`, `updated_at`) VALUES
('24002', 'Dinata', 'ada', 'ada', 'dad', '2021', 'SNMPTN', 'dinata@gmail.com', '08313131', 'profile3.jpeg', 1, '1501', 17, '2023-11-28 23:24:35', '2023-11-28 23:25:24'),
('2401', 'Jamet', 'Jl.Pelajar', 'Medan Kota', 'Sumatera Utara', '2021', 'SBMPTN', 'jamet@gmail.com', '084411', 'profile2.jpeg', 2, '1501', 10, '2023-11-21 09:20:01', '2023-11-28 08:31:21'),
('2402', 'Zahid', 'ada', 'wdq', 'dada', '2022', 'MANDIRI', 'Zahid@gmail.com', '0871771', 'profile1.png', 1, '1501', 11, '2023-11-26 20:03:07', '2023-11-28 08:30:54'),
('2403', 'Zefa', 'Jl. Gondang', 'Semarang', 'Jawa Tengah', '2017', 'SNMPTN', 'Zefa@gmail.com', '08455554', 'profile3.jpeg', 3, '1501', 12, '2023-11-28 06:25:14', '2023-11-28 08:31:48'),
('2404', 'Dinata', 'Jl. Gombel', 'Semarang', 'Jawa Tengah', '2018', 'SNMPTN', 'dinata@gmail.com', '086767671', 'profile.png', 7, '1502', 13, '2023-11-28 06:25:38', '2023-11-28 08:32:55'),
('2405', 'Ivan', 'Jl. Setia Budi', 'Medan', 'Sumatera Utara', '2020', 'SBMPTN', 'Ivan@gmail.com', '082167401', 'profile4.jpeg', 4, '1501', 14, '2023-11-28 06:26:05', '2023-11-28 08:32:18'),
('2406', 'Cikini', 'ada', 'eqe', 'ga', '2021', 'SNMPTN', 'cikini@gmail.com', '089999323', 'profile.png', 1, '1501', 15, '2023-11-28 07:49:55', '2023-11-28 08:28:06'),
('2407', 'dada', 'ada', 'adsadas', 'adsdas', '2016', 'SBMPTN', 'dada@gmail.com', '089999223', 'profile4.jpeg', 6, '1501', 19, '2023-12-05 07:34:15', '2023-12-05 07:35:40'),
('2408', 'Tidak', 'dada', 'adwaad', 'adaw', '2019', 'SBMPTN', 'tidak@gmail.com', '08314151', 'Form_Ivan.pdf', 1, '1501', 20, '2023-12-05 19:56:05', '2023-12-05 19:57:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_11_19_114846_create_dosen_walis_table', 1),
(6, '2022_11_19_114947_create_mahasiswa_table', 1),
(7, '2023_11_19_114704_create_departments_table', 1),
(8, '2023_11_19_114917_create_irs_table', 1),
(9, '2023_11_19_114928_create_khs_table', 1),
(10, '2023_11_19_115000_create_operators_table', 1),
(11, '2023_11_19_115017_create_pkl_table', 1),
(12, '2023_11_19_115029_create_skripsi_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `operators`
--

CREATE TABLE `operators` (
  `nip` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `handphone` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `operators`
--

INSERT INTO `operators` (`nip`, `nama`, `email`, `handphone`, `user_id`, `created_at`, `updated_at`) VALUES
('1401', 'operator', 'operator@gmail.com', '0823232', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
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
-- Struktur dari tabel `p_k_l_s`
--

CREATE TABLE `p_k_l_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mahasiswa_id` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `nilaipkl` varchar(255) NOT NULL,
  `scanpkl` varchar(255) DEFAULT NULL,
  `isverified` tinyint(1) NOT NULL DEFAULT 0,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `p_k_l_s`
--

INSERT INTO `p_k_l_s` (`id`, `mahasiswa_id`, `semester`, `nilaipkl`, `scanpkl`, `isverified`, `updated_at`) VALUES
(1, '2401', '6', '100', 'Form_Ivan.pdf', 0, '2023-12-04'),
(2, '2402', '6', '90', 'Ivan S Harianja Pengajuan Surat Pengantar FSM untuk Praktek Kerja Lapangan (PKL) mahasiswa Prodi Informatika.pdf', 0, '2023-11-28'),
(3, '2405', '8', '85', 'studi kasus.pdf', 1, '2023-12-05'),
(4, '2406', '6', '90', 'Form_Ivan.pdf', 1, '2023-12-05'),
(5, '24002', '6', '99', 'Form_Ivan.pdf', 0, NULL),
(6, '2403', '6', '85', 'Ivan S Harianja Pengajuan Surat Pengantar FSM untuk Praktek Kerja Lapangan (PKL) mahasiswa Prodi Informatika.pdf', 0, NULL),
(7, '2404', '9', '100', 'Form_Ivan.pdf', 0, NULL),
(8, '2408', '6', '90', 'Form_Ivan.pdf', 1, '2023-12-06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `skripsis`
--

CREATE TABLE `skripsis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mahasiswa_id` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `tglsidang` date NOT NULL,
  `nilaiskripsi` int(10) NOT NULL,
  `scansidang` varchar(255) DEFAULT NULL,
  `isverified` tinyint(1) NOT NULL DEFAULT 0,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `skripsis`
--

INSERT INTO `skripsis` (`id`, `mahasiswa_id`, `semester`, `tglsidang`, `nilaiskripsi`, `scansidang`, `isverified`, `updated_at`) VALUES
(1, '2401', '7', '2023-11-08', 100, 'Form_Ivan.pdf', 0, '2023-12-04'),
(2, '2402', '9', '2023-11-10', 100, 'Ivan S Harianja Pengajuan Surat Pengantar FSM untuk Praktek Kerja Lapangan (PKL) mahasiswa Prodi Informatika.pdf', 0, '2023-11-29'),
(3, '2405', '8', '2023-11-08', 89, 'studi kasus.pdf', 0, '2023-12-04'),
(4, '2406', '9', '2023-11-30', 99, 'Form_Ivan.pdf', 1, '2023-12-05'),
(5, '24002', '7', '2023-12-01', 70, 'Ivan S Harianja Pengajuan Surat Pengantar FSM untuk Praktek Kerja Lapangan (PKL) mahasiswa Prodi Informatika.pdf', 0, NULL),
(6, '2403', '12', '2023-11-26', 70, 'Form_Ivan.pdf', 0, NULL),
(7, '2404', '9', '2023-12-02', 89, 'Ivan S Harianja Pengajuan Surat Pengantar FSM untuk Praktek Kerja Lapangan (PKL) mahasiswa Prodi Informatika.pdf', 0, NULL),
(8, '2408', '7', '2023-12-02', 89, 'Form_Ivan.pdf', 1, '2023-12-06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `id_status` int(50) NOT NULL,
  `nama_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`id_status`, `nama_status`) VALUES
(1, 'Aktif'),
(2, 'Cuti'),
(3, 'Mangkir'),
(4, 'DO'),
(5, 'Undur Diri'),
(6, 'Lulus'),
(7, 'Meninggal Dunia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `level` enum('mahasiswa','dosen','department','operator') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `remember_token`, `level`, `created_at`, `updated_at`) VALUES
(1, '1401', '$2y$10$.ZaIHvQCT0JeviXjx9lRDeShLZR9231m4YA8tzrAoCG1Gz2RWtXCq', NULL, 'operator', NULL, NULL),
(2, '1501', '$2y$10$VcT77AGAEcJSIP7disfHYOhltk4aRgZqTt5U9BlCqHZFehXsl6FZi', NULL, 'dosen', NULL, NULL),
(3, '1502', '$2y$10$nl4O/RW.7OMwj5UQAOiP4.t8MoLuAfYlErTSGjr0ozpFoTPvNuu1a', NULL, 'dosen', NULL, NULL),
(10, '2401', '$2y$12$A1Ido.lnMUordZTLyVFjE.6kfPSAojaH3V9uTkZ6ORyj.EO2vyDT2', NULL, 'mahasiswa', '2023-11-21 09:20:01', '2023-11-21 09:20:01'),
(11, '2402', '$2y$12$9.pSuj8SAlp/.ryntTis2uSyDt64c34UWvk1O9qWlQUwK5NwovdwO', NULL, 'mahasiswa', '2023-11-26 20:03:07', '2023-11-26 20:03:07'),
(12, '2403', '$2y$12$19.s0P3T6OcSGmbG7Sm6Tu8WepFchdE8tFBrrY5lWPJKiHLUpuQom', NULL, 'mahasiswa', '2023-11-28 06:25:14', '2023-11-28 06:25:14'),
(13, '2404', '$2y$12$TvqBlMtug8KIfvXPzHkjmuzqGrsCmh1OJRjwpWa0lTdlM2H38cfCa', NULL, 'mahasiswa', '2023-11-28 06:25:38', '2023-11-28 06:25:38'),
(14, '2405', '$2y$12$zuTWyQc0BeDaTqhGjzhMfuMSpBJoxfUEypnDAIQB1mBIZlOkoFggm', NULL, 'mahasiswa', '2023-11-28 06:26:05', '2023-11-28 06:26:05'),
(15, '2406', '$2y$12$mG8WQc3JR9S9ZOZaRXWzIekE4ujEzpVWTCEGpnZaStWwJz8DTJuie', NULL, 'mahasiswa', '2023-11-28 07:49:55', '2023-11-28 07:49:55'),
(16, '1101', '$2y$10$1jpB2f5U4qjEUGXZtV04M.iv53xVSC3XfX5ywy1BGLAF4pMCFOrvK', NULL, 'department', NULL, NULL),
(17, '24002', '$2y$12$exIG.Wc9wedI4j9IGAyR4eTA/FleeRDfTdjhBdq82DlPsU9AvJ/DO', NULL, 'mahasiswa', '2023-11-28 23:24:35', '2023-11-28 23:24:35'),
(19, '2407', '$2y$12$2oEC4Dk05tfsGt3b5cy4H./smdrVai3JM86O0KsNY7AysuY2/eQQO', NULL, 'mahasiswa', '2023-12-05 07:34:15', '2023-12-05 07:34:15'),
(20, '2408', '$2y$12$gSfjo71w1jhxuVbjNSVWje0iQqUr16tWmg0/7qTss4Q0MU.b7GS4y', NULL, 'mahasiswa', '2023-12-05 19:56:05', '2023-12-05 19:56:05');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`kode_department`),
  ADD UNIQUE KEY `departments_email_unique` (`email`),
  ADD KEY `departments_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `dosenwalis`
--
ALTER TABLE `dosenwalis`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `dosenwalis_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `irs`
--
ALTER TABLE `irs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `irs_mahasiswa_id_foreign` (`mahasiswa_id`);

--
-- Indeks untuk tabel `k_h_s`
--
ALTER TABLE `k_h_s`
  ADD PRIMARY KEY (`id`),
  ADD KEY `k_h_s_mahasiswa_id_foreign` (`mahasiswa_id`);

--
-- Indeks untuk tabel `mahasiswas`
--
ALTER TABLE `mahasiswas`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `mahasiswas_dosen_wali_foreign` (`dosen_wali`),
  ADD KEY `mahasiswas_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `operators`
--
ALTER TABLE `operators`
  ADD PRIMARY KEY (`nip`),
  ADD UNIQUE KEY `operators_email_unique` (`email`),
  ADD KEY `operators_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `p_k_l_s`
--
ALTER TABLE `p_k_l_s`
  ADD PRIMARY KEY (`id`),
  ADD KEY `p_k_l_s_mahasiswa_id_foreign` (`mahasiswa_id`);

--
-- Indeks untuk tabel `skripsis`
--
ALTER TABLE `skripsis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `skripsis_mahasiswa_id_foreign` (`mahasiswa_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `irs`
--
ALTER TABLE `irs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `k_h_s`
--
ALTER TABLE `k_h_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `p_k_l_s`
--
ALTER TABLE `p_k_l_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `skripsis`
--
ALTER TABLE `skripsis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `departments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `dosenwalis`
--
ALTER TABLE `dosenwalis`
  ADD CONSTRAINT `dosenwalis_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `irs`
--
ALTER TABLE `irs`
  ADD CONSTRAINT `irs_mahasiswa_id_foreign` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswas` (`nim`);

--
-- Ketidakleluasaan untuk tabel `k_h_s`
--
ALTER TABLE `k_h_s`
  ADD CONSTRAINT `k_h_s_mahasiswa_id_foreign` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswas` (`nim`);

--
-- Ketidakleluasaan untuk tabel `mahasiswas`
--
ALTER TABLE `mahasiswas`
  ADD CONSTRAINT `mahasiswas_dosen_wali_foreign` FOREIGN KEY (`dosen_wali`) REFERENCES `dosenwalis` (`nip`),
  ADD CONSTRAINT `mahasiswas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `operators`
--
ALTER TABLE `operators`
  ADD CONSTRAINT `operators_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `p_k_l_s`
--
ALTER TABLE `p_k_l_s`
  ADD CONSTRAINT `p_k_l_s_mahasiswa_id_foreign` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswas` (`nim`);

--
-- Ketidakleluasaan untuk tabel `skripsis`
--
ALTER TABLE `skripsis`
  ADD CONSTRAINT `skripsis_mahasiswa_id_foreign` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswas` (`nim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
