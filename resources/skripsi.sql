-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Apr 2019 pada 11.49
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `company`
--

INSERT INTO `company` (`id`, `nama`, `alamat`, `no_telp`, `email`, `created_at`, `updated_at`) VALUES
(1, 'PT Indonesia Kendaraan Terminal, Tbk', 'Jl. Sindang Laut No. 100,Cilincing - Jakarta Utara 14110', '+62-811-933-9930', 'info@indonesiacarterminal.co.id', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `direksi`
--

CREATE TABLE `direksi` (
  `id` int(11) NOT NULL,
  `nipp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nipp_pj` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `program_kerja` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `divisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mulai` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `berakhir` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` int(11) DEFAULT NULL,
  `progres` int(3) DEFAULT '0',
  `target_bulanan` int(11) DEFAULT NULL,
  `bulan` int(11) DEFAULT NULL,
  `status_proker` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT 'Sedang Diproses',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `direksi`
--

INSERT INTO `direksi` (`id`, `nipp`, `nipp_pj`, `program_kerja`, `divisi`, `mulai`, `berakhir`, `tahun`, `progres`, `target_bulanan`, `bulan`, `status_proker`, `created_at`, `updated_at`) VALUES
(1, '277056896', NULL, 'Pengembangan dan Pengoperasian IPC Car Terminal Incorporated', 'Utama', '2019-01-01', '2019-12-31', 2019, 0, 0, NULL, 'Belum Direspon', NULL, '2019-04-03 20:21:19'),
(2, '277056896', NULL, 'Peningkatan value added atas pengoperasian dan pengembangan MKO MTKI (bisnis model, integrasi model transportation, dermaga)', 'Utama', '2019-01-01', '2019-12-31', 2019, 0, 0, NULL, 'Belum Direspon', NULL, '2019-04-03 20:21:27'),
(3, '277056896', NULL, 'Corporate Branding di tingkat nasional, regional dan internasional', 'Utama', '2019-01-01', '2019-12-31', 2019, 0, 0, NULL, 'Belum Direspon', NULL, '2019-04-03 20:16:55'),
(4, '277056896', NULL, 'Pelaksanaan CSR \"Rangkul Warga\" secara tepat sasaran, komprehensif, berkelanjutan dan berkesinambungan', 'Utama', '2019-01-01', '2019-12-31', 2019, 0, 0, NULL, 'Belum Direspon', NULL, '2019-04-03 20:17:08'),
(5, '277056896', NULL, 'Mewujudkan profesional Stakeholders intimacy melalui pengembangan program Stakeholders relationship', 'Utama', '2019-01-01', '2019-12-31', 2019, 0, 0, NULL, 'Belum Direspon', NULL, '2019-04-03 20:17:20'),
(6, '277056896', NULL, 'Pengembangan e-Audit (Aplikasi Audit Manajemen System) untuk program kerja pemeriksaan, monitoring hasil audit', 'Utama', '2019-01-01', '2019-12-31', 2019, 0, 0, NULL, 'Belum Direspon', NULL, '2019-04-03 20:17:30'),
(7, '277056896', NULL, 'Mewujudkan profesional Media Intimacy dan pengelolaan informasi korporasi yang terintegrasi dan real time', 'Utama', '2019-01-01', '2019-12-31', 2019, 0, 0, NULL, 'Belum Direspon', NULL, '2019-04-03 20:17:39'),
(8, '277056896', NULL, 'Mewujudkan professional  Investor Intimacy melalui pengembangan program investor relationship', 'Utama', '2019-01-01', '2019-12-31', 2019, 0, 0, NULL, 'Belum Direspon', NULL, '2019-04-03 20:17:48'),
(9, '277056896', NULL, 'Pendokumentasian dokumen korporasi secara digital', 'Utama', '2019-01-01', '2019-12-31', 2019, 0, 0, NULL, 'Belum Direspon', NULL, '2019-04-03 20:17:56'),
(10, '277056896', NULL, 'Peningkatan corporate value added perusahaan', 'Utama', '2019-01-01', '2019-12-31', 2019, 0, 0, NULL, 'Belum Direspon', NULL, '2019-04-03 20:18:05'),
(11, '264095551', NULL, 'Fokus Pemasaran Value Adedd Services Untuk kargo kendaraan', 'Komersial & Pengembangan Bisnis', '2019-01-01', '2019-12-31', 2019, 0, 0, NULL, 'Belum Direspon', NULL, '2019-04-03 20:26:17'),
(12, '264095551', NULL, 'Pemasaran untuk meningkatkan throughput car dengan penguatan pasar', 'Komersial & Pengembangan Bisnis\r\n', '2019-01-01', '2019-12-31', 2019, 0, 0, NULL, 'Belum Direspon', NULL, NULL),
(13, '264095551', NULL, 'Persiapan  penyusaian tarif jasa layanan terminal', 'Komersial & Pengembangan Bisnis', '2019-01-01', '2019-12-31', 2019, 0, 0, NULL, 'Belum Direspon', NULL, '2019-04-03 20:26:25'),
(14, '264095551', NULL, 'Melaksanakan Program Engagement terhadap pelanggan utama', 'Komersial & Pengembangan Bisnis', '2019-01-01', '2019-12-31', 2019, 0, 0, NULL, 'Belum Direspon', NULL, '2019-04-03 20:26:34'),
(15, '264095551', NULL, 'Kerjasama Operasi Pengoperasian Terminal Kendaraan (Bisnis Inti) & Bisnis Pendukung di Luar Jakarta dan di Luar negri (Mandatory IPC)', 'Komersial & Pengembangan Bisnis', '2019-01-01', '2019-12-31', 2019, 0, 0, NULL, 'Belum Direspon', NULL, '2019-04-03 20:26:45'),
(16, '264095551', NULL, 'Kerjasama strategis dalam memperkuat bisnis', 'Komersial & Pengembangan Bisnis', '2019-01-01', '2019-12-31', 2019, 0, 0, NULL, 'Belum Direspon', NULL, '2019-04-03 20:26:57'),
(17, '264095551', NULL, 'Integrasi saluran (channel) pelanggan untuk saran, masukan dan keluhan pelanggan melalui website, media sosial, wag, email dan kotak saran menjadi sistem informasi  terpadu.', 'Komersial & Pengembangan Bisnis', '2019-01-01', '2019-12-31', 2019, 0, 0, NULL, 'Belum Direspon', NULL, '2019-04-03 20:27:12'),
(18, '264095551', NULL, 'Optimalisasi Kapal RoRo Domestik Tanjung Priok ke PT IKT', 'Komersial & Pengembangan Bisnis', '2019-01-01', '2019-12-31', 2019, 0, 0, NULL, 'Belum Direspon', NULL, '2019-04-03 20:27:26'),
(19, '264095551', NULL, 'Pengembangan platform bisnis baru dengan mitra bisnis diluar bisnis eksisting.', 'Komersial & Pengembangan Bisnis', '2019-01-01', '2019-12-31', 2019, 0, 0, NULL, 'Belum Direspon', NULL, '2019-04-03 20:27:39'),
(20, '264095551', NULL, 'Pengembangan kerjasama kegiatan stevedoring.', 'Komersial & Pengembangan Bisnis', '2019-01-01', '2019-12-31', 2019, 0, 0, NULL, 'Belum Direspon', NULL, '2019-04-03 20:27:52'),
(21, '271126313', NULL, 'Pola baru Terminal Internasional mendukung kelancaran ekspor mobil Indonesia', 'Operasi', '2019-01-01', '2019-12-31', 2019, 0, 0, NULL, 'Belum Direspon', NULL, '2019-04-03 20:22:41'),
(22, '271126313', NULL, 'Ekosistem Terminal Kendaraan IPCC melalui digitalisasi', 'Operasi', '2019-01-01', '2019-12-31', 2019, 0, 0, NULL, 'Belum Direspon', NULL, '2019-04-03 20:22:50'),
(23, '271126313', NULL, 'Smart System untuk lampu penerangan', 'Operasi', '2019-01-01', '2019-12-31', 2019, 0, 0, NULL, 'Belum Direspon', NULL, '2019-04-03 20:23:00'),
(24, '271126313', NULL, 'Solar Cell untuk Gedung Parkir dan kantor IPCC', 'Operasi', '2019-01-01', '2019-12-31', 2019, 0, 0, NULL, 'Belum Direspon', NULL, '2019-04-03 20:23:08'),
(25, '271126313', NULL, 'Implementasi electronic payment di lini 2 dermaga Eks-Presiden, Cabang Panjang, Kantin', 'Operasi', '2019-01-01', '2019-12-31', 2019, 0, 0, NULL, 'Belum Direspon', NULL, '2019-04-03 20:23:16'),
(26, '271126313', NULL, 'Pengembangan Lahan Eks PP seluas 2 Ha', 'Operasi', '2019-01-01', '2019-12-31', 2019, 0, 0, NULL, 'Belum Direspon', NULL, '2019-04-03 20:23:25'),
(27, '271126313', NULL, 'Peningkatan kedisiplinan manpower di lapangan', 'Operasi', '2019-01-01', '2019-12-31', 2019, 0, 0, NULL, 'Belum Direspon', NULL, '2019-04-03 20:23:32'),
(28, '271126313', NULL, 'Penurunan Defect Rate', 'Operasi', '2019-01-01', '2019-12-31', 2019, 0, 0, NULL, 'Belum Direspon', NULL, '2019-04-03 20:23:40'),
(29, '271126313', NULL, 'Implementasi standarisasi office', 'Operasi', '2019-01-01', '2019-12-31', 2019, 0, 0, NULL, 'Belum Direspon', NULL, '2019-04-03 20:23:47'),
(31, '272048828', '271076309', 'Meningkatkan kinerja keuangan perusahaan melalui optimalisasi dana proceed IPO dan efektivitas biaya', 'Keuangan & SDM', '2019-01-01', '2019-12-31', 2019, 0, 50, NULL, 'Belum Direspon', NULL, '2019-04-06 12:55:07'),
(32, '272048828', '271076309', 'Program Investor Relation dan network capital market', 'Keuangan & SDM', '2019-01-01', '2019-12-31', 2019, 0, 30, NULL, 'Belum Direspon', NULL, '2019-04-06 12:55:11'),
(33, '272048828', '271076309', 'Transformasi Keuangan: Implementasi Automatic Financial System (Supply Chain Financing (SCF), Budgeting, Payment & Fixed Asset Management), superior financial performance', 'Keuangan & SDM', '2019-01-01', '2019-12-31', 2019, 0, 10, NULL, 'Belum Direspon', NULL, '2019-04-07 09:42:52'),
(34, '272048828', '271076309', 'Pembangunan Sistem Akuntansi Biaya dan Dashboard Management Report', 'Keuangan & SDM', '2019-01-01', '2019-12-31', 2019, 0, 0, NULL, 'Belum Direspon', NULL, '2019-04-03 20:08:39'),
(35, '272048828', '271076309', 'Tax Planing & Implementasinya', 'Keuangan & SDM', '2019-01-01', '2019-12-31', 2019, 0, 0, NULL, 'Belum Direspon', NULL, '2019-04-03 20:08:57'),
(36, '272048828', '266075841', 'Transformasi Organisasi dan Empowering Human Capital System', 'Keuangan & SDM', '2019-01-01', '2019-12-31', 2019, 0, 0, NULL, 'Belum Direspon', NULL, '2019-04-03 20:11:05'),
(37, '272048828', '266075841', 'Penguatan implementasi Culture Perusahaan cerminan Skor GCG', 'Keuangan & SDM', '2019-01-01', '2019-12-31', 2019, 0, 0, NULL, 'Belum Direspon', NULL, '2019-04-03 20:11:30'),
(38, '272048828', '266075841', 'Pengembangan Human Capital Information System', 'Keuangan & SDM', '2019-01-01', '2019-12-31', 2019, 0, 0, NULL, 'Belum Direspon', NULL, '2019-04-03 20:11:46'),
(39, '272048828', '266075841', 'Implementasi Fully E-Office & Mobile Phone', 'Keuangan & SDM', '2019-01-01', '2019-12-31', 2019, 0, 0, NULL, 'Belum Direspon', NULL, '2019-04-03 20:12:01'),
(40, '272048828', '289047644', 'Pengembangan Program K3, Mutu, HSE & PFSO & Updating Sertifikasi ISO, K3 dan sertifikasi SMK3', 'Keuangan & SDM', '2019-01-01', '2019-12-31', 2019, 0, 0, NULL, 'Belum Direspon', NULL, '2019-04-03 20:13:13'),
(41, '271126313', NULL, 'Digitalisasi pengarsipan project', 'Operasi', '2019-01-01', '2019-12-31', 2019, 0, 0, NULL, 'Belum Direspon', '2019-04-02 01:03:51', '2019-04-03 20:23:54'),
(42, '264095551', NULL, 'Review RJPP tahun 2019', 'Komersial & Pengembangan Bisnis', '2019-01-01', '2019-12-31', 2019, 0, 0, NULL, 'Belum Direspon', '2019-04-03 00:44:43', '2019-04-03 20:28:06'),
(43, '277056896', NULL, 'Transformasi Bisnis (Fokus pada lini bisnis, ekspansi regional maupun global, menjadi Market Leader di Industri)', 'Utama', '2019-01-01', '2019-12-31', 2019, 0, 0, NULL, 'Belum Direspon', '2019-04-03 20:22:09', '2019-04-03 20:22:09'),
(44, '271126313', NULL, 'Transformasi Bisnis (Fokus pada lini bisnis, ekspansi regional maupun global, menjadi Market Leader di Industri)', 'Operasi', '2019-01-01', '2019-12-31', 2019, 0, 0, NULL, 'Belum Direspon', '2019-04-03 20:24:42', '2019-04-03 20:24:42'),
(45, '264095551', NULL, 'Transformasi Bisnis (Fokus pada lini bisnis, ekspansi regional maupun global, menjadi Market Leader di Industri)', 'Komersial & Pengembangan Bisnis', '2019-01-01', '2019-12-31', 2019, 0, 0, NULL, 'Belum Direspon', '2019-04-03 20:28:34', '2019-04-03 20:28:34'),
(46, '272048828', '271076309', 'Transformasi Keuangan, meliputi (Profitable:yield financial gain, Mandiri: Self sustaining, Able to sufficiently finance its corporate action, Corporate value improvement).', 'Keuangan & SDM', '2019-01-01', '2019-12-31', 2019, 0, 0, NULL, 'Belum Direspon', '2019-04-03 20:30:00', '2019-04-03 20:30:00'),
(47, '272048828', '266075841', 'Transformasi Organisasi (right sizing, collaboration, stand alone company, monostatus employee, culture, fully implemented HCMC digitalitation, pola komunikasi, I’m Cinta: publikasi, artefak, ritual)', 'Keuangan & SDM', '2019-01-01', '2019-12-31', 2019, 0, 0, NULL, 'Belum Direspon', '2019-04-03 20:30:17', '2019-04-03 20:30:17'),
(48, '2631904D2', NULL, 'Implementasi Penegakan Hukum di lingkungan PT IKT Tbk. (Zero Pungli, Zero Corruption)', 'Kepatuhan', '2019-01-01', '2019-12-31', 2019, 0, 0, NULL, 'Belum Direspon', '2019-04-03 20:36:12', '2019-04-03 20:36:12'),
(49, '2631904D2', NULL, 'Review dan Monitoring Rencana Kerja Manajemen Tahun 2019', 'Kepatuhan', '2019-01-01', '2019-12-31', 2019, 0, 0, NULL, 'Belum Direspon', '2019-04-03 20:36:23', '2019-04-03 20:36:23'),
(50, '2631904D2', NULL, 'Melakukan Legal Review terhadap setiap bentuk perikatan yang dilakukan perusahaan', 'Kepatuhan', '2019-01-01', '2019-12-31', 2019, 0, 0, NULL, 'Belum Direspon', '2019-04-03 20:36:33', '2019-04-03 20:36:33'),
(51, '2631904D2', NULL, 'Pemutakhiran dokumen  perizinan perusahaan', 'Kepatuhan', '2019-01-01', '2019-12-31', 2019, 0, 0, NULL, 'Belum Direspon', '2019-04-03 20:36:43', '2019-04-03 20:36:43'),
(52, '2631904D2', NULL, 'Implementasi SIMRISK dan Pengkinian Sistem Manajemen Risiko berbasis ISO 31000:2018 (Mandatory IPC)', 'Kepatuhan', '2019-01-01', '2019-12-31', 2019, 0, 0, NULL, 'Belum Direspon', '2019-04-03 20:37:02', '2019-04-03 20:37:02'),
(53, '2631904D2', NULL, 'Penyesuaian SK Pedoman Pengadaan Barang & Jasa beserta implementasi e-Procurement', 'Kepatuhan', '2019-01-01', '2019-12-31', 2019, 0, 0, NULL, 'Belum Direspon', '2019-04-03 20:37:15', '2019-04-03 20:37:15'),
(54, '2631904D2', NULL, 'Monitoring Kinerja KPI Perseroan tahun 2019', 'Kepatuhan', '2019-01-01', '2019-12-31', 2019, 0, 0, NULL, 'Belum Direspon', '2019-04-03 20:37:25', '2019-04-03 20:37:25'),
(55, '2631904D2', NULL, 'Refreshment Good Corporate Governance & Self Assessment 2019 serta skor GCG mencerminkan budaya perusahaan', 'Kepatuhan', '2019-01-01', '2019-12-31', 2019, 0, 0, NULL, 'Belum Direspon', '2019-04-03 20:37:35', '2019-04-03 20:37:35'),
(56, '2631904D2', NULL, 'Review dan Evaluasi SOP sejalan dengan status perseroan yang sudah berubah', 'Kepatuhan', '2019-01-01', '2019-12-31', 2019, 0, 0, NULL, 'Belum Direspon', '2019-04-03 20:37:46', '2019-04-03 20:37:46'),
(57, '2631904D2', NULL, 'Menyesuaikan implementasi tata kelola perusahaan sesuai dengan ketentuan ketentuan yang berlaku di perseroan & Mempelajari dan menerapkan Asean Corporate Governance Scorecard untuk Perusahaan Tbk', 'Kepatuhan', '2019-01-01', '2019-12-31', 2019, 0, 0, NULL, 'Belum Direspon', '2019-04-03 20:37:59', '2019-04-03 20:37:59'),
(58, '2631904D2', '', 'Transformasi Keuangan, meliputi (Profitable:yield financial gain, Mandiri: Self sustaining, Able to sufficiently finance its corporate action, Corporate value improvement);', 'Kepatuhan', '2019-01-01', '2019-12-31', 2019, 0, 0, NULL, 'Belum Direspon', '2019-04-03 20:38:13', '2019-04-03 20:38:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `divisi`
--

CREATE TABLE `divisi` (
  `id` int(11) NOT NULL,
  `divisi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_divisi` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `divisi`
--

INSERT INTO `divisi` (`id`, `divisi`, `sub_divisi`) VALUES
(1, 'Kepatuhan', NULL),
(2, 'Keuangan & SDM', NULL),
(3, 'Komersial & Pengembangan Bisnis', NULL),
(4, 'Operasi', NULL),
(5, 'Utama', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `goalmatching`
--

CREATE TABLE `goalmatching` (
  `id` int(11) NOT NULL,
  `nipp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supervisor_nipp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jawaban1` int(11) NOT NULL,
  `jawaban2` int(11) NOT NULL,
  `jawaban3` int(11) NOT NULL,
  `jawaban4` int(11) NOT NULL,
  `jawaban5` int(11) NOT NULL,
  `jawaban6` int(11) NOT NULL,
  `jawaban7` int(11) NOT NULL,
  `jawaban8` int(11) NOT NULL,
  `jawaban9` int(11) NOT NULL,
  `jawaban10` int(11) NOT NULL,
  `jawaban11` int(11) NOT NULL,
  `jawaban12` int(11) NOT NULL,
  `jawaban13` int(11) NOT NULL,
  `jawaban14` int(11) NOT NULL,
  `jawaban15` int(11) NOT NULL,
  `jawaban16` int(11) NOT NULL,
  `jawaban17` int(11) NOT NULL,
  `jawaban18` int(11) NOT NULL,
  `jawaban19` int(11) NOT NULL,
  `jawaban20` int(11) NOT NULL,
  `jawaban21` int(11) NOT NULL,
  `jawaban22` int(11) NOT NULL,
  `jawaban23` int(11) NOT NULL,
  `jawaban24` int(11) NOT NULL,
  `jawaban25` int(11) NOT NULL,
  `jawaban26` int(11) NOT NULL,
  `jawaban27` int(11) NOT NULL,
  `jawaban28` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `hari` int(11) DEFAULT NULL,
  `minggu` int(2) NOT NULL,
  `bulan` int(2) NOT NULL,
  `tahun` int(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `logbook`
--

CREATE TABLE `logbook` (
  `id` int(11) NOT NULL,
  `nipp` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supervisor_nipp` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `program_kerja_terkait` text COLLATE utf8mb4_unicode_ci,
  `id_program_kerja_terkait` int(11) DEFAULT NULL,
  `target` text COLLATE utf8mb4_unicode_ci,
  `logbook` text COLLATE utf8mb4_unicode_ci,
  `status` text COLLATE utf8mb4_unicode_ci,
  `tanggal` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jam` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hari` int(11) DEFAULT NULL,
  `minggu` int(11) DEFAULT NULL,
  `bulan` int(11) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `logbook`
--

INSERT INTO `logbook` (`id`, `nipp`, `supervisor_nipp`, `program_kerja_terkait`, `id_program_kerja_terkait`, `target`, `logbook`, `status`, `tanggal`, `jam`, `hari`, `minggu`, `bulan`, `tahun`, `created_at`, `updated_at`) VALUES
(1, '288107927', '266075841', 'Empowering Human Capital Management', 11, 'test', 'test', 'Selesai', '2019-04-07', '03:49:49', 1, 14, 4, 2019, '2019-04-03 21:38:32', '2019-04-03 21:38:32'),
(2, '276016667', '266075841', 'Administrasi  pekerjaan umum dan rumah tangga', 21, 'selesai 100%', 'sudah menyelesaikan 100%', 'Selesai', '2019-04-04', NULL, 0, 14, 4, 2019, '2019-04-03 22:00:56', '2019-04-03 22:00:56'),
(3, '288107927', '266075841', 'Tindak lanjut tentang transformasi organisasi', 13, 'menyelesaikan logbook', 'ini hanyalah sebuah test untuk mencetak logbook mingguan dan harian', 'Selesai', '2019-04-07', '04:12:49', 2, 14, 4, 2019, '2019-04-06 14:12:49', '2019-04-06 14:12:49'),
(4, '288107927', '266075841', 'Komunikasi hambatan antran perusahaan dengan pegawai', 19, 'selesai', 'menyelesaikan hambatan', 'Selesai', '2019-04-07', '13:58:45', 0, 14, 4, 2019, '2019-04-06 23:58:45', '2019-04-06 23:58:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `manajer`
--

CREATE TABLE `manajer` (
  `id` int(11) NOT NULL,
  `nipp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nipp_pj` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `divisi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_divisi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_subdivisi` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `program_direksi` text COLLATE utf8mb4_unicode_ci,
  `id_prodir` int(11) DEFAULT NULL,
  `program_kerja_terkait` text COLLATE utf8mb4_unicode_ci,
  `id_prokerkait` int(11) DEFAULT NULL,
  `program_kerja` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bobot` int(3) DEFAULT NULL,
  `target` text COLLATE utf8mb4_unicode_ci,
  `mulai` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `berakhir` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hari` int(11) DEFAULT NULL,
  `minggu` text COLLATE utf8mb4_unicode_ci,
  `bulan` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategori` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `progres` int(3) DEFAULT '0',
  `status_proker` text COLLATE utf8mb4_unicode_ci,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `due_date` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selesai_pada` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `manajer`
--

INSERT INTO `manajer` (`id`, `nipp`, `nipp_pj`, `divisi`, `sub_divisi`, `sub_subdivisi`, `program_direksi`, `id_prodir`, `program_kerja_terkait`, `id_prokerkait`, `program_kerja`, `bobot`, `target`, `mulai`, `berakhir`, `hari`, `minggu`, `bulan`, `tahun`, `kategori`, `progres`, `status_proker`, `keterangan`, `due_date`, `selesai_pada`, `created_at`, `updated_at`) VALUES
(2, '266075841', '276016667', 'Keuangan & SDM', 'Sumber Daya Manusia', NULL, 'Implementasi e-office IPC virtual office (IVO)', 38, NULL, NULL, 'Pembangunan Aplikasi Human Capital Information System', NULL, 'Membuat Administrasi sesuai GCG dan tertib administrasi sesuai aturan yang berlaku', '2019-01-01', '2019-12-31', NULL, '52', '12', '2019', 'Tahunan', 0, 'Sedang Diproses', 'Tugas mulai diproses pada 2019-04-04 04:58:54', '2019-12-31', NULL, '2019-04-03 03:19:55', '2019-04-03 21:58:54'),
(5, '266075841', '281127225', 'Keuangan & SDM', 'Sumber Daya Manusia', NULL, 'Optimalisasi dana & penggunaan dana proceed sesuai dengan prospektus', 31, NULL, NULL, 'Pembangunan Aplikasi HR Data dan Payroll System', NULL, 'Sistem Aplikasi berjalan 100 %', '2019-01-01', '2019-12-31', NULL, '52', '12', '2019', 'Tahunan', 0, 'Belum Direspon', 'Proker Belum Direspon oleh DVP Terkait', '2019-12-31', NULL, '2019-04-03 03:21:04', '2019-04-03 08:12:51'),
(6, '266075841', NULL, 'Keuangan & SDM', 'Sumber Daya Manusia', NULL, 'Meningkatkan kinerja keuangan perusahaan melalui optimalisasi dana proceed IPO dan efektivitas biaya', 31, NULL, NULL, 'Implementasi Fully E-Office & Pengembangan E-Office Berbasis Android & IOS.', NULL, NULL, '2019-01-01', '2019-12-31', 2, '52', '1', '2019', 'Tahunan', 0, 'Belum Disampaikan', 'Task belum diberikan kepada DVP terkait', '2019-12-31', NULL, '2019-04-03 03:21:25', '2019-04-06 09:33:08'),
(7, '266075841', NULL, 'Keuangan & SDM', 'Sumber Daya Manusia', NULL, 'Pengembangan Human Capital Information System', 38, NULL, NULL, 'Pembangunan Aplikasi E-Arsip.', NULL, NULL, '2019-01-01', '2019-12-31', 2, '52', '1', '2019', 'Tahunan', 0, 'Belum Disampaikan', 'Task belum diberikan kepada DVP terkait', '2019-12-31', NULL, '2019-04-03 03:21:49', '2019-04-06 09:33:27'),
(8, '266075841', NULL, 'Keuangan & SDM', 'Sumber Daya Manusia', NULL, 'Program Internalisasi Budaya & Penyusunan cascading KPI Perusahaan ke target individu tahun 2018', 37, NULL, NULL, 'Penguatan Implementasi Budaya Perusahaan yang Mencerminkan Skor GCG', NULL, NULL, '2019-01-01', '2019-12-31', NULL, '52', '12', '2019', 'Tahunan', 0, 'Belum Disampaikan', 'Task belum diberikan kepada DVP terkait', NULL, NULL, '2019-04-03 03:22:05', '2019-04-03 03:22:05'),
(9, '266075841', NULL, 'Keuangan & SDM', 'Sumber Daya Manusia', NULL, 'Implementasi e-office IPC virtual office (IVO)', 38, NULL, NULL, 'Pembangunan Aplikasi Log Book Individu Berbasis Coaching & Mentoring', NULL, NULL, '2019-01-01', '2019-12-31', NULL, '52', '12', '2019', 'Tahunan', 0, 'Belum Disampaikan', 'Task belum diberikan kepada DVP terkait', NULL, NULL, '2019-04-03 03:22:32', '2019-04-03 03:22:32'),
(10, '266075841', NULL, 'Keuangan & SDM', 'Sumber Daya Manusia', NULL, 'Pengembangan Human Capital Information System', 38, NULL, NULL, 'Implementasi Fully E-Office & Pengembangan E-Office Berbasis Android & IOS.', NULL, NULL, '2019-01-01', '2019-12-31', 2, '52', '1', '2019', 'Tahunan', 0, 'Belum Disampaikan', 'Task belum diberikan kepada DVP terkait', '2019-12-31', NULL, '2019-04-03 03:22:50', '2019-04-06 09:32:56'),
(12, '266075841', NULL, 'Keuangan & SDM', 'Sumber Daya Manusia', NULL, 'Transformasi Organisasi (right sizing, collaboration, stand alone company, monostatus employee, culture, fully implemented HCMC digitalitation, pola komunikasi, I’m Cinta: publikasi, artefak, ritual)', 47, NULL, NULL, 'Transformasi Organisasi dan Empowering Human Capital System', NULL, NULL, '2019-01-01', '2019-12-31', NULL, '52', '12', '2019', 'Tahunan', 0, 'Belum Disampaikan', 'Task belum diberikan kepada DVP terkait', NULL, NULL, '2019-04-03 20:45:49', '2019-04-03 20:45:49'),
(13, '266075841', '288107927', 'Keuangan & SDM', 'Sumber Daya Manusia', NULL, 'Transformasi Organisasi (right sizing, collaboration, stand alone company, monostatus employee, culture, fully implemented HCMC digitalitation, pola komunikasi, I’m Cinta: publikasi, artefak, ritual)', 47, 'Transformasi Organisasi dan Empowering Human Capital System', 12, 'Tindak lanjut tentang transformasi organisasi', NULL, 'Tindak lanjut transformasi organisasi dengan kelengkapan berkas dan administrasinya', '2019-04-04', '2019-05-05', NULL, '18', '5', '2019', 'Bulanan', 0, 'Sedang Diproses', 'Tugas mulai diproses pada 2019-04-06 21:59:43', NULL, NULL, '2019-04-03 20:47:28', '2019-04-06 07:59:43'),
(14, '266075841', '276016667', 'Keuangan & SDM', 'Sumber Daya Manusia', NULL, 'Implementasi Fully E-Office & Mobile Phone', 39, 'Implementasi Fully E-Office & Pengembangan E-Office Berbasis Android & IOS', 6, 'Penjajakan intergrasi E-Office dengan menggunakan microsoft team', NULL, 'sudah ada e-arsip dalam menu e-office', '2019-04-04', '2019-05-05', NULL, '18', '5', '2019', 'Bulanan', 0, 'Sedang Diproses', 'Tugas mulai diproses pada 2019-04-04 04:57:34', NULL, NULL, '2019-04-03 20:48:54', '2019-04-03 21:57:34'),
(15, '266075841', '288107927', 'Keuangan & SDM', 'Sumber Daya Manusia', NULL, 'Pengembangan Human Capital Information System', 38, 'Pengembangan dan Pelatihan Berbasis Kompetensi', 3, 'Penyusunan pengembangan dan pelatihan berbasis kompetensi tahun 2019', NULL, 'Pembuatan untuk materi  presentasi rapat kerja', '2019-04-04', '2019-05-05', NULL, '18', '5', '2019', 'Bulanan', 0, 'Sedang Diproses', 'Tugas mulai diproses pada 2019-04-06 21:59:46', NULL, NULL, '2019-04-03 20:50:14', '2019-04-06 07:59:46'),
(16, '266075841', NULL, 'Keuangan & SDM', 'Sumber Daya Manusia', NULL, 'Implementasi Fully E-Office & Mobile Phone', 39, 'Pembangunan Aplikasi Log Book Individu Berbasis Coaching & Mentoring', 9, 'Try out lookbook pekerja IKT', NULL, NULL, '2019-04-04', '2019-05-05', NULL, '18', '5', '2019', 'Bulanan', 0, 'Belum Disampaikan', 'Task belum diberikan kepada DVP terkait', NULL, NULL, '2019-04-03 20:51:04', '2019-04-03 20:51:04'),
(18, '266075841', NULL, 'Keuangan & SDM', 'Sumber Daya Manusia', NULL, 'Penguatan implementasi Culture Perusahaan cerminan Skor GCG', 37, 'Penguatan Implementasi Budaya Perusahaan yang Mencerminkan Skor GCG', 8, 'Rancangan pondasi budaya digital', NULL, NULL, '2019-04-04', '2019-05-05', NULL, '18', '5', '2019', 'Bulanan', 0, 'Belum Disampaikan', 'Task belum diberikan kepada DVP terkait', NULL, NULL, '2019-04-03 20:53:55', '2019-04-03 20:53:55'),
(19, '266075841', '288107927', 'Keuangan & SDM', 'Sumber Daya Manusia', NULL, 'Penguatan implementasi Culture Perusahaan cerminan Skor GCG', 37, 'Penguatan Implementasi Budaya Perusahaan yang Mencerminkan Skor GCG', 8, 'Komunikasi hambatan antran perusahaan dengan pegawai', NULL, 'pengiriman restitusi kesehatan kepada IPC Health Care dilaksanakan langsung', '2019-04-04', '2019-05-05', NULL, '18', '5', '2019', 'Bulanan', 0, 'Sedang Diproses', 'Tugas mulai diproses pada 2019-04-06 21:59:48', NULL, NULL, '2019-04-03 20:55:02', '2019-04-06 07:59:48'),
(20, '266075841', '288107927', 'Keuangan & SDM', 'Sumber Daya Manusia', NULL, 'Penguatan implementasi Culture Perusahaan cerminan Skor GCG', 37, 'Penguatan Implementasi Budaya Perusahaan yang Mencerminkan Skor GCG', 8, 'administrasi payrool t1 dan t15', NULL, 'Proses payroll run T1 dan T15 tepat waktu', '2019-04-04', '2019-05-05', NULL, '18', '5', '2019', 'Bulanan', 0, 'Sedang Diproses', 'Tugas mulai diproses pada 2019-04-06 21:59:50', NULL, NULL, '2019-04-03 20:56:02', '2019-04-06 07:59:50'),
(21, '266075841', '276016667', 'Keuangan & SDM', 'Sumber Daya Manusia', NULL, 'Penguatan implementasi Culture Perusahaan cerminan Skor GCG', 37, 'Penguatan Implementasi Budaya Perusahaan yang Mencerminkan Skor GCG', 8, 'Administrasi  pekerjaan umum dan rumah tangga', NULL, 'karyawan merasa puas dan terakomodasi', '2019-04-04', '2019-05-05', NULL, '18', '5', '2019', 'Bulanan', 0, 'Belum Direspon', 'Proker Belum Direspon oleh DVP Terkait', NULL, NULL, '2019-04-03 20:57:03', '2019-04-03 21:13:42'),
(22, '266075841', NULL, 'Keuangan & SDM', 'Sumber Daya Manusia', NULL, 'Pengembangan Human Capital Information System', 38, 'Pembangunan Aplikasi Human Capital Information System', 2, 'Rancangan  human capital information sistem', NULL, NULL, '2019-04-04', '2019-05-05', NULL, '18', '5', '2019', 'Bulanan', 0, 'Belum Disampaikan', 'Task belum diberikan kepada DVP terkait', NULL, NULL, '2019-04-03 20:57:57', '2019-04-03 20:57:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `nipp` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `performa`
--

CREATE TABLE `performa` (
  `id` int(11) NOT NULL,
  `nipp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supervisor_nipp` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah_task_minggu_ini` int(11) DEFAULT NULL,
  `jumlah_task_gagal_minggu_ini` int(11) DEFAULT NULL,
  `jumlah_task_pending_minggu_ini` int(11) DEFAULT NULL,
  `performa_minggu_ini` int(11) DEFAULT NULL,
  `minggu` int(11) DEFAULT NULL,
  `jumlah_task_bulan_ini` int(11) DEFAULT NULL,
  `jumlah_task_gagal_bulan_ini` int(11) DEFAULT NULL,
  `jumlah_task_pending_bulan_ini` int(11) DEFAULT NULL,
  `performa_bulan_ini` int(11) DEFAULT NULL,
  `bulan` int(11) DEFAULT NULL,
  `jumlah_task_tahun_ini` int(11) DEFAULT NULL,
  `jumlah_task_gagal_tahun_ini` int(11) DEFAULT NULL,
  `jumlah_task_pending_tahun_ini` int(11) DEFAULT NULL,
  `performa_tahun_ini` int(11) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `performa`
--

INSERT INTO `performa` (`id`, `nipp`, `supervisor_nipp`, `jumlah_task_minggu_ini`, `jumlah_task_gagal_minggu_ini`, `jumlah_task_pending_minggu_ini`, `performa_minggu_ini`, `minggu`, `jumlah_task_bulan_ini`, `jumlah_task_gagal_bulan_ini`, `jumlah_task_pending_bulan_ini`, `performa_bulan_ini`, `bulan`, `jumlah_task_tahun_ini`, `jumlah_task_gagal_tahun_ini`, `jumlah_task_pending_tahun_ini`, `performa_tahun_ini`, `tahun`, `created_at`, `updated_at`) VALUES
(1, '288107927', '266075841', 8, 0, 0, 100, 14, 8, 0, 0, 100, 4, NULL, NULL, NULL, NULL, 2019, NULL, NULL),
(2, '281127225', '266075841', 11, 2, 0, 82, 14, 1, 2, 0, 82, 4, NULL, NULL, NULL, NULL, 2019, NULL, NULL),
(3, '276016667', '266075841', 6, 0, 0, 100, 14, 6, 0, 0, 100, 4, NULL, NULL, NULL, NULL, 2019, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `id` int(11) NOT NULL,
  `pertanyaan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_relasi` int(11) DEFAULT NULL,
  `kategori` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pertanyaan`
--

INSERT INTO `pertanyaan` (`id`, `pertanyaan`, `id_relasi`, `kategori`, `created_at`, `updated_at`) VALUES
(1, 'Meminta pendapat semua Bawahan dalam penentuan tujuan bersama', 29, 'Coach', NULL, NULL),
(2, 'Meminta masukan dari Bawahan terkait penetapan target kerja', 30, 'Coach', NULL, NULL),
(3, 'Memberikan tanggung jawab target kerja sesuai tugas dan wewenang masing-masing Bawahan', 31, 'Coach', NULL, NULL),
(4, 'Menanyakan pemikiran Bawahan terhadap persoalan yang dihadapi', 32, 'Coach', NULL, NULL),
(5, 'Memberikan berbagai informasi yang diperlukan oleh Bawahan secara mendetail', 33, 'Coach', NULL, NULL),
(6, 'Menjelaskan standar pekerjaan yang diharapkan ', 34, 'Coach', NULL, NULL),
(7, 'Mengontrol perkembangan pencapaian target dengan tetap mempertimbangkan keleluasaan tim', 35, 'Coach', NULL, NULL),
(8, 'Memberikan beberapa alternatif pilihan untuk pengambilan keputusan', 36, 'Coach', NULL, NULL),
(9, 'Memberikan informasi lengkap terkait pilihan-pilihan yang ada', 37, 'Coach', NULL, NULL),
(10, 'Menyediakan panduan untuk mengarahkan pada beberapa alternatif pilihan', 38, 'Coach', NULL, NULL),
(11, 'Memberikan kebebasan untuk mengambil keputusan', 39, 'Coach', NULL, NULL),
(12, 'Memberikan kebebasan untuk menentukan pilihan dalam menjalankan tugas dan fungsi masing-masing', 40, 'Coach', NULL, NULL),
(13, 'Memaparkan kemampuan yang dimiliki karyawan ', 41, 'Coach', NULL, NULL),
(14, 'Memaparkan kaitan kemampuan yang dimiliki dengan target kerja yang telah disusun', 42, 'Coach', NULL, NULL),
(15, 'Memberikan apresiasi atau umpan balik pada hasil kerja yang diinginkan', 43, 'Coach', NULL, NULL),
(16, 'Tidak menunjukkan keragu-raguan atau kekhawatiran di hadapan karyawan ', 44, 'Coach', NULL, NULL),
(17, 'Memberikan pengembangan kemampuan yang dibutuhkan bagi karyawan', 45, 'Coach', NULL, NULL),
(18, 'Menanyakan bentuk tantangan yang disukai karyawan', 46, 'Coach', NULL, NULL),
(19, 'Memberikan tantangan yang sesuai dengan minat dan ketertarikan karyawan', 47, 'Coach', NULL, NULL),
(20, 'Memberikan tantangan sesuai dengan kemampuan yang dimiliki karyawan', 48, 'Coach', NULL, NULL),
(21, 'Meminta umpan balik terhadap tantangan yang diberikan', 49, 'Coach', NULL, NULL),
(22, 'Memaparkan bahwa organisasi membutuhkan orang dengan kemampuan yang dimiliki karyawan', 50, 'Coach', NULL, NULL),
(23, 'Memaparkan hasil kerja karyawan memiliki dampak yang penting bagi perusahaan', 51, 'Coach', NULL, NULL),
(24, 'Menyampaikan pentingnya perubahan', 52, 'Coach', NULL, NULL),
(25, 'Menyampaikan kelebihan dari perubahan yang akan dilakukan', 53, 'Coach', NULL, NULL),
(26, 'Mengajak individu untuk memahami pentingnya target kerja', 54, 'Coach', NULL, NULL),
(27, 'Menyampaikan keuntungan dan konsekuensi yang didapatkan ', 55, 'Coach', NULL, NULL),
(28, 'Mengajak untuk mendapatkan keuntungan bersama-sama', 56, 'Coach', NULL, NULL),
(29, 'Dimintai pendapat  dalam penentuan tujuan bersama', NULL, 'Coachee', NULL, NULL),
(30, 'Dimintai masukan terkait penetapan target kerja', NULL, 'Coachee', NULL, NULL),
(31, 'Diberikan tanggung jawab target kerja sesuai tugas dan kewewenangan ', NULL, 'Coachee', NULL, NULL),
(32, 'Ditanyai pemikiran terhadap persoalan yang dihadapi', NULL, 'Coachee', NULL, NULL),
(33, 'Diberikan berbagai informasi yang diperlukan secara mendetail', NULL, 'Coachee', NULL, NULL),
(34, 'Dijelaskan standar pekerjaan yang diharapkan ', NULL, 'Coachee', NULL, NULL),
(35, 'Perkembangan pencapaian target dikontrol dengan tetap mempertimbangkan keleluasaan tim', NULL, 'Coachee', NULL, NULL),
(36, 'Diberikan beberapa alternatif pilihan untuk pengambilan keputusan', NULL, 'Coachee', NULL, NULL),
(37, 'Diberikan informasi lengkap terkait pilihan-pilihan yang ada', NULL, 'Coachee', NULL, NULL),
(38, 'Disediakan panduan untuk mengarahkan pada beberapa alternatif pilihan', NULL, 'Coachee', NULL, NULL),
(39, 'Diberikan kebebasan untuk mengambil keputusan', NULL, 'Coachee', NULL, NULL),
(40, 'Diberikan kebebasan untuk menentukan pilihan dalam menjalankan tugas dan fungsi jabatan', NULL, 'Coachee', NULL, NULL),
(41, 'Dipaparkan kemampuan yang dimiliki ', NULL, 'Coachee', NULL, NULL),
(42, 'Dijelaskan kaitan kemampuan yang dimiliki dengan target kerja yang telah disusun', NULL, 'Coachee', NULL, NULL),
(43, 'Diberikan apresiasi atau umpan balik pada hasil kerja yang diinginkan', NULL, 'Coachee', NULL, NULL),
(44, 'Tidak ada keragu-raguan atau kekhawatiran yang terlihat ', NULL, 'Coachee', NULL, NULL),
(45, 'Diberikan pengembangan kemampuan yang dibutuhkan ', NULL, 'Coachee', NULL, NULL),
(46, 'Ditanyakan bentuk tantangan yang disukai', NULL, 'Coachee', NULL, NULL),
(47, 'Diberikan tantangan yang sesuai dengan minat dan ketertarikan', NULL, 'Coachee', NULL, NULL),
(48, 'Diberikan tantangan sesuai dengan kemampuan yang dimiliki karyawan', NULL, 'Coachee', NULL, NULL),
(49, 'Dimintai umpan balik terhadap tantangan yang diberikan', NULL, 'Coachee', NULL, NULL),
(50, 'Dijelaskan bahwa organisasi membutuhkan orang dengan kemampuan yang saya dimiliki ', NULL, 'Coachee', NULL, NULL),
(51, 'Dijelaskan hasil kerja saya memiliki dampak yang penting bagi perusahaan', NULL, 'Coachee', NULL, NULL),
(52, 'Disampaikan pentingnya perubahan', NULL, 'Coachee', NULL, NULL),
(53, 'Disampaikan kelebihan dari perubahan yang akan dilakukan', NULL, 'Coachee', NULL, NULL),
(54, 'Diajak untuk memahami pentingnya target kerja', NULL, 'Coachee', NULL, NULL),
(55, 'Disampaikan keuntungan dan konsekuensi yang didapatkan ', NULL, 'Coachee', NULL, NULL),
(56, 'Diajak untuk mendapatkan keuntungan bersama-sama', NULL, 'Coachee', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id` int(11) NOT NULL,
  `visi` text COLLATE utf8mb4_unicode_ci,
  `misi` text COLLATE utf8mb4_unicode_ci,
  `tahun` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `perusahaan`
--

INSERT INTO `perusahaan` (`id`, `visi`, `misi`, `tahun`, `created_at`, `updated_at`) VALUES
(1, 'World Class Car Terminal Operator', NULL, 2019, '2019-04-02 00:07:20', '2019-04-02 00:41:24'),
(2, 'Car Terminal With Excellent Services', NULL, 2019, '2019-04-02 00:07:34', '2019-04-02 00:07:34'),
(3, NULL, 'Provide, build and operate car terminal and logistics services in an integrated, qualified and reliable way meet customer and partner satisfaction.', 2019, '2019-04-02 00:08:01', '2019-04-02 00:08:01'),
(4, NULL, 'Create a comfortable working environment for employees, promote employees that focus on customers, integrity and are proud of the Company and culture, all thewhile giving prosperity and satisfaction to employees.', 2019, '2019-04-02 00:08:06', '2019-04-02 00:08:06'),
(5, NULL, 'Maximize the Company’s values to shareholder and improve the Company’s condition professionally through the fulfillment of good corporate governance.', 2019, '2019-04-02 00:08:11', '2019-04-02 00:08:11'),
(6, NULL, 'Ensure the smooth and safe flow of ships and freight to realize logistics cost e_ciency in order to accelerate national economic growth that a_ects the people’s prosperity improvement.', 2019, '2019-04-02 00:08:15', '2019-04-02 00:08:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `nipp` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nipp_pj` varchar(1015) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_divisi` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_subdivisi` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `3rd_divisi` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `program_vp` text COLLATE utf8mb4_unicode_ci,
  `id_provp` int(11) DEFAULT NULL,
  `program_kerja_terkait` text COLLATE utf8mb4_unicode_ci,
  `id_prokerkait` int(11) DEFAULT NULL,
  `program_kerja` text COLLATE utf8mb4_unicode_ci,
  `bobot` int(3) DEFAULT NULL,
  `target` text COLLATE utf8mb4_unicode_ci,
  `mulai` text COLLATE utf8mb4_unicode_ci,
  `berakhir` text COLLATE utf8mb4_unicode_ci,
  `hari` int(11) DEFAULT NULL,
  `minggu` text COLLATE utf8mb4_unicode_ci,
  `bulan` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategori` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `progres` int(11) DEFAULT NULL,
  `status_task` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `due_date` text COLLATE utf8mb4_unicode_ci,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `selesai_pada` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nipp` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supervisor_nipp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` text COLLATE utf8mb4_unicode_ci,
  `kelas_jabatan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '14',
  `jabatan` text COLLATE utf8mb4_unicode_ci,
  `divisi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_divisi` text COLLATE utf8mb4_unicode_ci,
  `sub_subdivisi` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `3rd_divisi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `golongan` text COLLATE utf8mb4_unicode_ci,
  `pendidikan` text COLLATE utf8mb4_unicode_ci,
  `sta_kel` text COLLATE utf8mb4_unicode_ci,
  `jenis_kelamin` text COLLATE utf8mb4_unicode_ci,
  `agama` text COLLATE utf8mb4_unicode_ci,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` tinyint(4) NOT NULL DEFAULT '0',
  `email_verified_at` date DEFAULT NULL,
  `auth_level` int(11) NOT NULL DEFAULT '0',
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'http://via.placeholder.com/500x500',
  `komentar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Belum Diubah oleh User',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nipp`, `supervisor_nipp`, `nama`, `kelas_jabatan`, `jabatan`, `divisi`, `sub_divisi`, `sub_subdivisi`, `3rd_divisi`, `golongan`, `pendidikan`, `sta_kel`, `jenis_kelamin`, `agama`, `email`, `password`, `remember_token`, `email_verified_at`, `auth_level`, `avatar`, `komentar`, `updated_at`, `created_at`) VALUES
(1, '271126313', '277056896', 'INDRA HIDAYAT SANI. ST. MSc', '4', 'Direktur Operasi', 'Operasi', 'Operasi', NULL, NULL, 'IV/a', 'S2', 'K', 'P', 'ISLAM', 'indra@indonesiacarterminal.co.id', '$2y$10$Ldy.sALEAxuo5Jx8cptxq.YUmQ/DoXZJmn4bDYfvr9JaF/w4pfv02', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 09:57:49', NULL),
(2, '272047069', '271126313', 'S. JOKO', '7', 'Vice President Terminal Internasional', 'Operasi', 'Operasi Internasional', NULL, NULL, 'III/c', 'S2', 'K', 'P', 'ISLAM', 's.joko@indonesiacarterminal.co.id', '$2y$10$5JczAkC3Q708MWj0sQ9K9.XH09wzfEPpvZPQ0jDNtVcraM2TU/tdC', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 09:58:42', NULL),
(3, '274106159', '272047069', 'RIMUHAMMAD', '10', 'Pj. DVP. Perencanaan & Pengendalian  Term. Internasional', 'Operasi', 'Perencanaan & Pengendalian Terminal Internasional', NULL, NULL, 'III/a', 'SLTA', 'K', 'P', 'ISLAM', 'rimuhammad@indonesiacarterminal.co.id', '$2y$10$Z9F2PE/7x58u0TX5trxC6O64w33zvMdycb.1cCqR2tSajmgwdxouC', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 09:59:10', NULL),
(4, '283068405', '274106159', 'SUGIHARTO', '15', 'Administrator - Perencanaan dan Pengendalian Ter. Int', 'Operasi', 'Perencanaan dan Pengendalian Terminal Internasional', NULL, NULL, 'II/a', 'SLTA', 'K', 'P', 'ISLAM', 'sugiharto@indonesiacarterminal.co.id', '$2y$10$TjFhUuK7xcrRbmNAMAq1ou38YWZJmkT5v.VfVRh.7Dt0A8HJ/SnvS', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 09:59:38', NULL),
(5, '275098325', '274106159', 'ENDANG SUPRIADI', '15', 'Administrator - Perencanaan dan Pengendalian Ter. Int', 'Operasi', 'Perencanaan dan Pengendalian Terminal Internasional', NULL, NULL, 'II/a', 'SLTA', 'K', 'P', 'ISLAM', 'endangs@indonesiacarterminal.co.id', '$2y$10$0rg97FsNv3yPpwdALUWdDuN0CSCGeiFm2l3/Qhu3XVMk1b8XjqO42', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:02:12', NULL),
(6, '284048415', '274106159', 'ANDRE AFRIANTO', '15', 'Administrator - Perencanaan dan Pengendalian Ter. Int', 'Operasi', 'Perencanaan dan Pengendalian Terminal Internasional', NULL, NULL, 'II/a', 'S1', 'K', 'P', 'ISLAM', 'andre@indonesiacarterminal.co.id', '$2y$10$FE.qwlTIVSzD8WdDx3JFYuZ/iIAi6Ui30CylHHKFqJ2wmArp.WnSi', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:02:43', NULL),
(7, '278056713', '272047069', 'BENY MARTONO', '10', 'Pj. DVP. Fasilitas & Peralatan Term. Internasional', 'Operasi', 'Fasilitas & Peralatan Terminal Internasional', NULL, NULL, 'III/b', 'S1', 'K', 'P', 'ISLAM', 'benym@indonesiacarterminal.co.id', '$2y$10$ddFAEHHteuUzn14WfmrAT./DY9YcJC.51HW6IvPg11coiuhA/CUHK', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:04:20', NULL),
(8, '289047798', '272047069', 'ERFIN WIJAYANTO', '10', 'Pj. DVP. Operasi & Lay. Nilai Tambah Term. Internasional', 'Operasi', 'Operasi & Layanan Nilai Tambah Terminal Internasional', NULL, NULL, 'III/a', 'S1', 'K', 'P', 'ISLAM', 'erfinw@indonesiacarterminal.co.id', '$2y$10$mF49Y9GuaI38GldZK4.A8etuvxcHmiy/T1UpluZN1M6MgFjQ/SOtC', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:06:05', NULL),
(9, '287048459', '289047798', 'ABDUL HAMID', '15', 'Administrator - Ops. & Lay. Nilai Tambah Term. Internasional', 'Operasi', 'Operasi & Layanan Nilai Tambah Terminal Internasional', NULL, NULL, 'II/a', 'SLTA', 'K', 'P', 'ISLAM', 'abdulhamid@indonesiacarterminal.co.id', '$2y$10$AKs24eqhxZR.oz6LVZGTqOgxA0S8FjVRcGmCIZhXP1M8A2eAV2Q0.', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:06:34', NULL),
(10, '287128474', '289047798', 'DIMAS TRINANTO', '15', 'Administrator - Ops. & Lay. Nilai Tambah Term. Internasional', 'Operasi', 'Operasi & Layanan Nilai Tambah Terminal Internasional', NULL, NULL, 'II/a', 'SLTA', 'K', 'P', 'ISLAM', 'dimas.trinanto@indonesiacarterminal.co.id', '$2y$10$xRZVnygT5UIZOP6L9X5IButTvfkebeZWUUaKZD4Fk5aZBI9fbLMfq', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:07:10', NULL),
(11, '290068494', '289047798', 'REZA MAULANA', '14', 'Sr. Administrator -  Ops. & Lay. Nilai Tambah Term. Internasional', 'Operasi', 'Operasi & Layanan Nilai Tambah Terminal Internasional', NULL, NULL, 'II/a', 'SLTA', 'K', 'P', 'ISLAM', 'rezamaulana@indonesiacarterminal.co.id', '$2y$10$B3RlW0Sk6h8QaaDtX4ZChuFFc5ft//dNv/oSwJUr.ztujf73/PWXG', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:07:34', NULL),
(12, '287038455', '289047798', 'SABAR EFENDI', '15', 'Administrator - Ops. & Lay. Nilai Tambah Term. Internasional', 'Operasi', 'Operasi & Layanan Nilai Tambah Terminal Internasional', NULL, NULL, 'II/a', 'S1', 'K', 'P', 'ISLAM', 'sabarefendi@indonesiacarterminal.co.id', '$2y$10$gABfBNeQ5cggeaHqF8KK3uZhD/j8OoV0uMbhYN1VkltX8Gs4tPkfe', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:07:48', NULL),
(13, '283108409', '289047798', 'ADI SUDRAJAT', '15', 'Administrator - Ops. & Lay. Nilai Tambah Term. Internasional', 'Operasi', 'Operasi & Layanan Nilai Tambah Terminal Internasional', NULL, NULL, 'II/a', 'SLTA', 'K', 'P', 'ISLAM', 'adisudrajat@indonesicarterminal.co.id', '$2y$10$wey6woIo3LdCKMLGUeywB.kWsEnwmrdN23a21zZAOS/YmwfJdOTTW', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:09:12', NULL),
(14, '281068382', '289047798', 'EKA HENDRA SAPUTRA', '14', 'Sr. Administrator - Ops. & Lay. Nilai Tambah Term. Internasional', 'Operasi', 'Operasi & Layanan Nilai Tambah Terminal Internasional', NULL, NULL, 'II/a', 'S1', 'K', 'P', 'ISLAM', 'ekahendra@indonesiacarterminal.co.id', '$2y$10$BKOYw.zQOhsCeHZdNEh.d.CWHm3wMD7rGYd5JYE9Qxi0nhTbsjbbK', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:09:30', NULL),
(15, '267078286', '289047798', 'SARWANI', '15', 'Administrator - Ops. & Lay. Nilai Tambah Term. Internasional', 'Operasi', 'Operasi & Layanan Nilai Tambah Terminal Internasional', NULL, NULL, 'II/a', 'S1', 'K', 'P', 'ISLAM', 'sarwani@indonesiacarterminal.co.id', '$2y$10$2C0Dl8ELh14Cizh3CTAw/eneV7w3Ut8pYV6kT2hTPhQqkaq/NoToa', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:09:44', NULL),
(16, '284037752', '272047069', 'SUMARDINAH', '10', 'Pj. DVP. Administrasi Term. Internasional ', 'Operasi', 'Administrasi Terminal Internasional ', NULL, NULL, 'II/c', 'D3', 'K', 'W', 'ISLAM', 'sumardinah@indonesiacarterminal.co.id', '$2y$10$uWAoWelA8fwAuwgYBEKhiuW0CYQRP90qarCsVPK9eAJ5.72BAncga', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:10:30', NULL),
(17, '281118386', '284037752', 'RACHMATULLAH', '14', 'Sr. Admin - Operasi Terminal Internasional', 'Operasi', 'Administrasi Terminal Internasional ', NULL, NULL, 'II/a', 'S1', 'K', 'P', 'ISLAM', 'rachmatullah@indonesiacarterminal.co.id', '$2y$10$lLiOJl6tLDLqAzxDoqGFoOkQlm7kVjP6m34VXa3OVlPoudHDlVF5S', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:11:00', NULL),
(18, '270048826', '271126313', 'KUSNO UTOMO', '7', 'Vice President Terminal Domestik', 'Operasi', 'Operasi Terminal Domestik', NULL, NULL, 'III/a', 'S-1', 'K', 'P', 'ISLAM', 'kusno@indonesiacarterminal.co.id', '$2y$10$b1qHvS4kDfaiUG6j9F1qWucfunSJTcuX7Dktu0b/JYfD/S2YU5sLa', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:11:20', NULL),
(19, '289037933', '270048826', 'M. DODO SYAPUTRA SAKTI.S', '11', 'DVP Area Terminal Domestik', 'Operasi', 'Area Terminal Domestik', NULL, NULL, 'II/c', 'D3', 'K', 'P', 'ISLAM', 'dodo.syaputra@indonesiacarterminal.co.id', '$2y$10$jLE3mbqwMkB7czkK/OYV0eGkfpKhq07ObWgXBIu8P56lsdNWlGeoa', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:12:40', NULL),
(20, '286117574', '270048826', 'JUMBADI', '12', 'Plt. DVP.  Perencanaan dan Pengendalian Ter. Dom', 'Operasi', 'Perencanaan dan Pengendalian Terminal Domestik', NULL, NULL, 'II/b', 'SLTA', 'K', 'P', 'ISLAM', 'jumbadi@indonesiacarterminal.co.id', '$2y$10$pd0rdbIitnTwtr.M8G0.GOeJkQfpG76HPdYZ3ozbqvuvIAW/fzxnm', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:13:35', NULL),
(21, '287048457', '286117574', 'HENDRA SAPUTRA', '15', 'Administrator - Perencanaan dan Pengendalian Ter. Dom', 'Operasi', 'Perencanaan dan Pengendalian Terminal Domestik', NULL, NULL, 'II/a', 'SLTA', 'K', 'P', 'ISLAM', 'hendra@indonesiacarterminal.co.id', '$2y$10$ZQkX9KP6h2Z8aPtdIRGkVuYEZf7T0EA8qkXpdnNb0Gt68APknkVuW', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:14:03', NULL),
(22, '291038497', '286117574', 'DIMAS SANJAYA', '15', 'Administrator - Perencanaan dan Pengendalian Ter. Dom', 'Operasi', 'Perencanaan dan Pengendalian Terminal Domestik', NULL, NULL, 'II/a', 'SLTA', 'K', 'P', 'ISLAM', 'dimas.sanjaya@indonesiacarterminal.co.id', '$2y$10$CBJNxIGidB58kIps0G310eYOk44PK4Arl6QLHF2AftlTi/5/VOANm', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:14:25', NULL),
(23, '285075431', '286117574', 'AHMAD SLAMET', '15', 'Administrator - Perencanaan dan Pengendalian Ter. Dom', 'Operasi', 'Perencanaan dan Pengendalian Terminal Domestik', NULL, NULL, 'II/a', 'SLTA', 'K', 'P', 'ISLAM', 'ahmadslamet@indonesiacarterminal.co.id', '$2y$10$sGHGTNrU6kak9VIXB1k7X.CAjL.1g2TruZS075OzHr.NzO1wY79je', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:14:55', NULL),
(24, '271095968', '270048826', 'STEVY FRANGKY KHIALDAS', '10', 'Pj. DVP. Fasilitas & Peralatan Term. Domestik', 'Operasi', 'Perencanaan dan Pengendalian Terminal Domestik', NULL, NULL, 'III/b', 'SLTA', 'K', 'P', 'KRISTEN', 'stevyf@indonesiacarterminal.co.id', '$2y$10$EE45gvqXsdqGh0vwsw6w.u.rmHW8LWtxMPNYcAM7/x.NRn3f4yLJq', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:15:12', NULL),
(25, '271035640', '270048826', 'WIDODO', '10', 'Pj. DVP. Operasi  & Lay. Nilai Tambah Term. Domestik', 'Operasi', 'Operasi & Layanan Nilai Tambah Terminal Domestik', NULL, NULL, 'III/b', 'SLTA', 'K', 'P', 'ISLAM', 'widodo@indonesiacarterminal.co.id', '$2y$10$wyOrB5micSn7X8X028dLoeNBJvlUZjizRGADCBB64dDYpqnKeKtRe', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:16:01', NULL),
(26, '284128424', '271035640', 'ANRI ALDINO', '15', 'Administrator - Operasi  & Lay. Nilai Tambah Term. Domestik', 'Operasi', 'Operasi & Layanan Nilai Tambah Terminal Domestik', NULL, NULL, 'II/a', 'SLTA', 'K', 'P', 'ISLAM', 'anrialdino@indonesiacarterminal.co.id', '$2y$10$WTXykYcYxQ.91nGH9Johr.z0FTjsCwY1X2QpkmtKRqtCwogj7ZOZK', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:16:18', NULL),
(27, '282018503', '271035640', 'JARIYANTO', '15', 'Administrator - Operasi  & Lay. Nilai Tambah Term. Domestik', 'Operasi', 'Operasi & Layanan Nilai Tambah Terminal Domestik', NULL, NULL, 'II/a', 'S1', 'K', 'P', 'ISLAM', 'jariyanto@indonesiacarterminal.co.id', '$2y$10$kA4coX2G2cjX8x9eKOVyM.LTeGulFoK4ZuHWLHx3FO2DZOjrgPrfS', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:16:37', NULL),
(28, '282068392', '271035640', 'BUDI SUPRIYADI', '15', 'Administrator - Operasi  & Lay. Nilai Tambah Term. Domestik', 'Operasi', 'Operasi & Layanan Nilai Tambah Terminal Domestik', NULL, NULL, 'II/a', 'SLTA', 'K', 'P', 'ISLAM', 'budisupriadi@indonesiacarterminal.co.id', '$2y$10$9Wrc1Amd5Pj63ib/On4Q1OWfQMRU/RNmGM0aH5/MWEV0OS.CA3Zpu', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:16:57', NULL),
(29, '294017862', '270048826', 'FERRY ANJALNA BELI', '12', 'Pjs. Spv. Administrasi Term. Domestik', 'Operasi', 'Administrasi Terminal Domestik', NULL, NULL, 'II/a', 'SLTA', 'TK', 'P', 'ISLAM', 'ferryabe@indonesiacarterminal.co.id', '$2y$10$MjK1xkTp.CjSEaVBZKVfuu2Sc52QHSyXAqzYaxI9D21NkB.FShMiq', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:17:13', NULL),
(30, '276106884', '271126313', 'VIRANKY OCTAVIANUS', '7', 'Vice Presiden Teknik & Sistem Informasi', 'Operasi', 'Teknik & Sistem Informasi', NULL, NULL, 'III/c', 'S1', 'K', 'P', 'ISLAM', 'viranky@indonesiacarterminal.co.id', '$2y$10$Cy4YRwbWQwdZVJMoJvx1AOgyuEGpVEe//nZIjzffa7y9iTnNFGig2', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:17:28', NULL),
(31, '291108242', '276106884', 'AGUNG RIZKY FAJRI', '10', 'Pj. DVP. Teknik Sipil', 'Operasi', 'Teknik Sipil', NULL, NULL, 'III/a', 'S1', 'K', 'P', 'ISLAM', 'agung.fajri@indonesiacarterminal.co.id', '$2y$10$lA4HeSihYyelSSujctvXsu8GNoy9HqqeRL8NhUlhZLBYL12Q.HybO', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:17:46', NULL),
(32, '275098324', '291108242', 'AHMAD GUNAWAN', '15', 'Administrator - Teknik Sipil', 'Operasi', 'Administrator Teknik Sipil', NULL, NULL, 'II/a', 'S1', 'K', 'P', 'ISLAM', 'ahmadgunawan@indonesiacarterminal.co.id', '$2y$10$sBpOXxkSgDC6pjle.xIwlOV/pdLFu.VXlAXQOAYS7eFR7SZUlLmoe', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:19:45', NULL),
(33, '270126305', '276106884', 'SYARIF KARNADI', '10', 'Pj. DVP. Teknik Mesin & Listrik', 'Operasi', 'Teknik Mesin & Listrik', NULL, NULL, 'III/c', 'D3', 'K', 'P', 'ISLAM', 'syarifk@indonesiacarterminal.co.id', '$2y$10$JGiVX8sua5Apushhlobi0.ho5j3Nyn9As9V59mzy7t3eBMjPD.sBa', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:20:05', NULL),
(34, '272048303', '270126305', 'NGUDIYONO', '15', 'Administrator - Teknik Mesin dan Listrik', 'Operasi', 'Teknik Mesin dan Listrik', NULL, NULL, 'II/a', 'SLTA', 'K', 'P', 'ISLAM', 'ngudiyono@indonesiacarterminal.co.id', '$2y$10$VrGalQFKZxg6c.WDK8gJrOAvZKgLh7Wm9hNsT6N6vzaM2SsM0k1kW', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:20:33', NULL),
(35, '289058583', '276106884', 'TRISYA SAVITRI', '10', 'Pj. DVP. Sistem Informasi', 'Operasi', 'Sistem Informasi', NULL, NULL, 'III/a', 'S1', 'K', 'W', 'ISLAM', 'trisya.savitri@indonesiacarterminal.co.id', '$2y$10$6kbouiEX60fUWLypKU5.AOiHz3eu4Ezyvul.7iai66bLxQpo4vOb.', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:20:54', NULL),
(36, '272048828', '277056896', 'SUGENG MULYADI', '5', 'Direktur  Keuangan & SDM', 'Keuangan & SDM', 'Keuangan & SDM', NULL, NULL, 'III/b', 'S-2', 'K', 'P', 'ISLAM', 'sugeng@indonesiacarterminal.co.id', '$2y$10$jH0SkUBpPgYfXb67SkLRJe2dadbRyG73M.xuHlpSfGGJwQXBnIXxG', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:21:10', NULL),
(37, '271076309', '272048828', 'NITA DEWI TERSESNANINGSIH', '8', 'Pj. Vice President Keuangan', 'Keuangan & SDM', 'Keuangan', NULL, NULL, 'III/c', 'S1', 'K', 'W', 'ISLAM', 'nitadewi@indonesiacarterminal.co.id', '$2y$10$AKNAU3b0aQ1GpKTaOoAkMOeXBGjI.89v8EmcbAKOeadisMrFMG7Y2', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:21:34', NULL),
(38, '292087831', '271076309', 'ICHSAN WARDANI SAPUTRA', '12', 'Plt. DVP. Pendapatan', 'Keuangan & SDM', 'Keuangan', 'Pendapatan', NULL, 'II/a', 'SLTA', 'K', 'P', 'ISLAM', 'ichsanwardani@indonesiacarterminal.co.id', '$2y$10$.yrKdwa1REaoQhhdxIXncOkKwjoIUGl4poUuhVxLWEn3oAW2/H1Me', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:22:44', NULL),
(39, '284067473', '271076309', 'EKKI ARNITA HAPSARI', '10', 'Pj. DVP. Anggaran', 'Keuangan & SDM', 'Keuangan', 'Anggaran', NULL, 'III/b', 'S1', 'TK', 'W', 'ISLAM', 'ekkiarnita@indonesiacarterminal.co.id', '$2y$10$UFdKg56RiGg5rr6yZgz1yunxA9JF2X9PTXHk/LQscPgf6N.4lUWw.', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:22:57', NULL),
(40, '288028577', '271076309', 'KUSUMANINGTYAS', '10', 'Pj. DVP. Akuntansi & Pajak', 'Keuangan & SDM', 'Keuangan', 'Akuntansi & Pajak', NULL, 'III/a', 'S1', 'K', 'W', 'ISLAM', 'kusumaningtyas@indonesiacarterminal.co.id', '$2y$10$ojluUonPJ59/Ap4u6lSKKuXBW/vHiUbtVBVebX1SroLLXA2MzK4jW', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:23:19', NULL),
(41, '291027959', '288028577', 'LITA RAZAQNA', '11', 'Sr. Assistant Officer Akuntansi & Pajak', 'Keuangan & SDM', 'Keuangan', 'Akuntansi & Pajak', NULL, 'II/c', 'D3', 'K', 'W', 'ISLAM', 'lita@indonesiacarterminal.co.id', '$2y$10$dR70ykRCi5IGbA5seTcD6.rU3YDw.FuOg/6wuvUZhjMBOqf8..pT.', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:23:36', NULL),
(42, '292047507', '288028577', 'HENNY SRI WAHYUNI', '13', 'Jr. Assistant Officer Akuntansi & Pajak', 'Keuangan & SDM', 'Keuangan', 'Akuntansi & Pajak', NULL, 'II/b', 'SLTA', 'K', 'W', 'ISLAM', 'henny@indonesiacarterminal.co.id', '$2y$10$ZfGA2Ycneqk97RQQ6djiQe7KPFRjwIhC/PstxoOBGlnH88nb/C5QG', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:23:56', NULL),
(43, '292028213', '271076309', 'REZA PRADIKA PRIYO HUTOMO', '10', 'DVP. Treasury & Manajemen Aset', 'Keuangan & SDM', 'Keuangan', 'Treasury & Manajemen Aset', NULL, 'II/c', 'D3', 'K', 'P', 'ISLAM', 'rezapradika@indonesiacarterminal.co.id', '$2y$10$mcPV9hha93Tco4mprih3GOQ4s0GSGxv42pRyVbc9ZlbQMQ0Va2XqG', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:24:42', NULL),
(44, '266075841', '272048828', 'ADLINSYAH', '6', 'Vice President Sumber Daya Manusia', 'Keuangan & SDM', 'Sumber Daya Manusia', NULL, NULL, 'IV/c', 'S2', 'K', 'P', 'ISLAM', 'adlinsyah@indonesiacarterminal.co.id', '$2y$10$xngKgV3fUe4VniIR4f1lKO4tGMpj1Pu1XsYFGgtG2mJPOWcjFda8e', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:24:59', NULL),
(45, '288107927', '266075841', 'DODY SIDIK PERMANA', '10', 'Pj. DVP. Sumber Daya Manusia', 'Keuangan & SDM', 'Sumber Daya Manusia', 'Sumber Daya Manusia', NULL, 'II/c', 'D3', 'K', 'P', 'ISLAM', 'dodypermana@indonesiacarterminal.co.id', '$2y$10$g4J.7/VHIz5kiapXi6hd4e37BN8mcL80bt5vXAqvRtsaC.zjFKU82', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:25:26', NULL),
(46, '283028400', '288107927', 'ARIEF MAULANA', '15', 'Administrator - Sumber Daya Manusia', 'Keuangan & SDM', 'Sumber Daya Manusia', 'Sumber Daya Manusia', NULL, 'II/a', 'SLTA', 'K', 'P', 'ISLAM', 'arifm@indonesiacarterminal.co.id', '$2y$10$DPUQXS.qssYK.1ph8B2YkezhEX0clOu/zuLBan6AWTB1cPXh1sDly', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:25:52', NULL),
(47, '281127225', '266075841', 'KAIF MARUKHI', '10', 'Pj. DVP. Budaya Perusahaan', 'Keuangan & SDM', 'Sumber Daya Manusia', 'Budaya Perusahaan', NULL, 'III/a', 'S1', 'K', 'P', 'ISLAM', 'kaifm@indonesiacarterminal.co.id', '$2y$10$5VqDUbetvnQtggd9.cws5ud9RMBZjWq2KGYhNMUC9Jpgka9sBkU1y', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:26:15', NULL),
(48, '276016667', '266075841', 'IMAM BUDI DARMANTO', '10', 'Pj. DVP. Layanan Umum', 'Keuangan & SDM', 'Sumber Daya Manusia', 'Layanan Umum', NULL, 'III/a', 'SLTA', 'K', 'P', 'ISLAM', 'imam@indonesiacarterminal.co.id', '$2y$10$ZQh/2t/B1tSx4Evidfk0geg01.RYu1GWfhLX40cxH30LdHqgrJe3a', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:26:28', NULL),
(49, '289047644', '272048828', 'GETSHA NAGISTA', '10', 'Pj. Manajemen Mutu & HSE', 'Keuangan & SDM', 'Manajemen Mutu & HSE', NULL, NULL, 'II/c', 'S1', 'K', 'W', 'ISLAM', 'getsha.nagista@indonesiacarterminal.co.id', '$2y$10$0QhuwjmM.hMZ9VH8FRMWXeMnF1L9j3SlE5LEBdpuH/3PEgInrqO26', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:26:57', NULL),
(50, '271015700', '289047644', 'YANTO HENDRAWAN', '10', 'Pj DVP PFSO', 'Keuangan & SDM', 'PFSO', NULL, NULL, 'III/b', 'D3', 'K', 'P', 'ISLAM', 'yanto@indonesiacarterminal.co.id', '$2y$10$VrUerZHuEOaFd3DUC.U26eVoj7/RtCs1jfSvakiyzfYoiClmDTEEm', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:27:20', NULL),
(51, '279088361', '271015700', 'ARIFUDIN', '15', 'Administrator -  PFSO', 'Keuangan & SDM', 'PFSO', NULL, NULL, 'II/a', 'SLTA', 'K', 'P', 'ISLAM', 'arifudin@indonesiacarterminal.co.id', '$2y$10$vaIyeXxu8ArqGXQtcZGBfeHO73VkctmM1NsTwyMnReYBKchCEt6wm', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:27:38', NULL),
(52, '280097410', '264095551', 'ERWAN DWI WINANTO', '7', 'Vice President Strategi dan Pengembangan Bisnis', 'Keuangan & SDM', 'Strategi dan Pengembangan Bisnis', NULL, NULL, 'III/b', 'S2', 'K', 'P', 'ISLAM', 'erwan.dw@indonesiacarterminal.co.id', '$2y$10$TFYYkm8UNOwb/LK/kHLiauJ8HSppk.1xCwSF/pr7SgZSxzGlBA2iG', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:28:18', NULL),
(53, '277056896', NULL, 'CHIEFY ADI KUSMARGONO', '4', 'Direktur Utama', 'Utama', NULL, NULL, NULL, 'IV/a', 'S2', 'K', 'P', 'ISLAM', 'chiefy@indonesiacarterminal.co.id', '$2y$10$b7Vuy210ucPrFu1hO4jSJu.WVvrQxZGqoZckcPGmEyrtYqKoR.HfC', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:28:33', NULL),
(55, '281027412', '26104SPI', 'YUSUF FERDIYAN UMAR', '8', 'Senior- Pemeriksa Internal', 'Utama', 'Satuan Pengawasan Internal', NULL, NULL, 'III/b', 'S2', 'TK', 'P', 'ISLAM', 'yusuf.fu@indonesiacarterminal.co.id', '$2y$10$RYFsBQdqlfqlYUfst8ZsHeJzM6s70pz0jqvIpOZUyI3BtYXSPyaE.', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:29:05', NULL),
(56, '276107007', '281027412', 'ARYO SETYAWAN, SH', '10', 'Sr. Asistant Pemeriksa', 'Utama', 'Satuan Pengawasan Internal', NULL, NULL, 'III/d', 'S1', 'K', 'P', 'ISLAM', 'aryo.setyawan@indonesiacarterminal.co.id', '$2y$10$CnK6LUa4DkvilBhH2ZPe..EewAx/Oy51kFcy3NuhbUyVY34pMQUKm', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:29:22', NULL),
(57, '289067938', '281027412', 'FRANSISCA DINA K.', '11', 'Sr. Assistant Officer Pemeriksa Internal', 'Utama', 'Satuan Pengawasan Internal', NULL, NULL, 'II/c', 'D3', 'TK', 'W', 'KATOLIK', 'fransisca@indonesiacarterminal.co.id', '$2y$10$wtUrrUP4QNbG1d8WVvRF0eQJDI25JNXiayMcqxzDml1w5GmtUQuKK', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:29:39', NULL),
(58, '270045410', '277056896', 'SOFYAN GUMELAR S.Y.', '6', 'Sekretaris Perusahaan', 'Utama', 'Sekretaris Perusahaan', NULL, NULL, 'III/c', 'S1', 'K', 'P', 'ISLAM', 'sofyan.gumelar@indonesiacarterminal.co.id', '$2y$10$ox6t8ntTWGXFpsM4R67VyO4yOLLfqST9MnqSriaJ2A8nmo9LB5FwO', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:29:59', NULL),
(59, '271015947', '277056896', 'WASISTIANTO', '6', 'Pj. Kepala Unit MKO - MKTI', 'Utama', 'MKO - MKTI', NULL, NULL, 'III/c', 'S1', 'K', 'P', 'ISLAM', 'wasistianto@indonesiacarterminal.co.id', '$2y$10$Fe37vYCtm8IgaG/4ZwuzRu6js93hqjRS9F1WloU0Z35mEIOLbA3FG', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:30:13', NULL),
(60, '286128158', '271015947', 'TEGAR HAMZAH ASADULLAH', '10', 'Spv. SDM dan Umum', 'Utama', 'SDM dan Umum', NULL, NULL, 'III/a', 'S1', 'K', 'P', 'ISLAM', 'tegar.hamzah@indonesiacarterminal.co.id', '$2y$10$eBSKQjjx5qmpSE3f6jVznOf.VVxb6N0.1Tqi8QiwPKx.u5E50hjl2', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:31:11', NULL),
(62, '281037219', '2631904D2', 'ERVIN BAYU SANJAYA', '8', 'Pj. VP. Kepatuhan & Pengendalian Kinerja', 'Kepatuhan', 'Kepatuhan & Pengendalian Kinerja', NULL, NULL, 'III/B', 'S2', 'K', 'P', 'ISLAM', 'ervinbayus@indonesiacarterminal.co.id', '$2y$10$0PRxPfewLug.VdkdZ9fRvOtP95T0XW0Rs2.s5PLdMikGDT/jmhhFm', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:31:24', NULL),
(63, '290068106', '281037219', 'CYNTHIA YASMINE', '10', 'Pj. DVP. Kepatuhan & Tata Kelola Perusahaan', 'Kepatuhan', 'Kepatuhan & Tata Kelola Perusahaan', NULL, NULL, 'III/a', 'S1', 'K', 'W', 'ISLAM', 'cynthia.yasmin@indonesiacarterminal.co.id', '$2y$10$wg37jfHVzSamcznxMIzjVOGL0RgIky0yMP7pD0bGXr5Sh26rTWIUu', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:31:34', NULL),
(64, '290057664', '281037219', 'RENDRA SISWANTO', '10', 'DVP. Manajemen Resiko', 'Kepatuhan', 'Manajemen Resiko', NULL, NULL, 'II/b', 'SLTA', 'K', 'P', 'ISLAM', 'rendra@indonesiacarterminal.co.id', '$2y$10$FEKOnb/4xxyeL4NebCRSWuaatznj1KMqP6nQ.rT1.KUhJzm1mGKz2', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:31:44', NULL),
(65, '268076047', '290068106', 'AHMAD FASRI HOLE', '10', 'Senior Officer Pengendalian Kinerja', 'Kepatuhan', 'Pengendalian Kinerja', NULL, NULL, 'III/c', 'D3', 'K', 'P', 'ISLAM', 'ahmad.fasri@indonesiacarterminal.co.id', '$2y$10$T6jIPykG5pyZ3IVlC6TNnO5aTdws5w9/KVQkLB8ZOgAv3ZQ3GJ77.', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:32:20', NULL),
(66, '282117745', '280097410', 'NORMANSYAH WIDODO', '10', 'Pj. DVP. Pengendalian Kinerja', 'Kepatuhan', 'Pengendalian Kinerja', NULL, NULL, 'III/a', 'S1', 'K', 'P', 'ISLAM', 'normansyahw@indonesiacarterminal.co.id', '$2y$10$SeR1Jma6cjZ6chysdIp0tOeVnIknt5NynwpY0IfeVsakjAsNZ3PeW', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:32:45', NULL),
(67, '285107442', '2631904D2', 'YOHANES WIBOWO SITUMEANG', '7', 'Vice President Hukum', 'Kepatuhan', 'Hukum', NULL, NULL, 'III/b', 'S2', 'K', 'P', 'KRISTEN', 'yohanes.wibowo@indonesiacarterminal.co.id', '$2y$10$qC4RqylgjNU0qlKHFEqiMevWRDRIOC7f/VB1sQGcscIzizuCxzGAm', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:32:55', NULL),
(68, '263066017', '285107442', 'IRIAN DJAYA', '10', 'Senior Officer Klaim & Asuransi', 'Kepatuhan', 'Klaim & Asuransi', NULL, NULL, 'III/b', 'SLTA', 'K', 'P', 'ISLAM', 'irian.djaya@indonesiacarterminal.co.id', '$2y$10$m96jmhIUTr4Vh5u/lGB0gOzT8E7IiwjSi/mmg4A0XCUYuDSrf4MUu', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:33:06', NULL),
(69, '289047645', '285107442', 'IBNU HAKIM RAMLI', '11', 'Pj. DVP. Pengadaan', 'Kepatuhan', 'Pengadaan', NULL, NULL, 'II/b', 'S1', 'K', 'P', 'ISLAM', 'ibnu.hakim@indonesiacarterminal.co.id', '$2y$10$5yot0zi0q0mfoxP3LOep0uMXKbJjSHa2D.I130MFP0GnXRVUBQsLC', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:33:17', NULL),
(70, '264095551', '277056896', 'ARIF ISNAWAN', '4', 'Direktur Komersial dan Pengembangan Bisnis', 'Komersial & Pengembangan Bisnis', 'Komersial & Pengembangan Bisnis', NULL, NULL, 'IV/c', 'S2', 'K', 'P', 'ISLAM', 'arif.isnawan@indonesiacarterminal.co.id', '$2y$10$bZ2XY2Cx.SoCwk5rC1r.UObvki1qsuSYp3ZJ04JL.KxHhnN2NVwUy', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:33:30', NULL),
(71, '279067044', '264095551', 'DONNY YUNIARTO', '7', 'Vice President Komersial', 'Komersial & Pengembangan Bisnis', 'Komersial', NULL, NULL, 'III/b', 'S2', 'K', 'P', 'ISLAM', 'donny@indonesiacarterminal.co.id', '$2y$10$5r2oex7jHyqbi9WtefVxyeon7EP5WR2CQR4paw1pGBN47FeEcvJ3S', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:34:18', NULL),
(72, '275026695', '264095551', 'ADI WIJIYAKSANA', '8', 'Analyst Direktorat Komersial & Pengembangan Bisnis', 'Komersial & Pengembangan Bisnis', 'Komersial & Pengembangan Bisnis', NULL, NULL, 'III/a', 'SLTA', 'K', 'P', 'ISLAM', 'adi.w@indonesiacarterminal.co.id', '$2y$10$2qv0598Ds7XBW2M1eULRtOCqGHSDRuuqEHOuJExQqORJFWmZE18wG', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:34:30', NULL),
(73, '287117999', '279067044', 'MEDIKA SAKINAH SIREGAR', '10', 'Pj. DVP. Komersial', 'Komersial & Pengembangan Bisnis', 'Komersial', NULL, NULL, 'III/a', 'S1', 'K', 'W', 'ISLAM', 'dika.sakinah@indonesiacarterminal.co.id', '$2y$10$R4CNvZWCkZ40jQNiNzj27.TRePtP50NV0OTs.EqcCNjZQV6DlK0fa', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:34:43', NULL),
(74, '288098805', '287117999', 'ANGGI FAJAR AKBAR', '13', 'Jr. Assistant Officer - Komersial', 'Komersial & Pengembangan Bisnis', 'Komersial', NULL, NULL, 'III/a', 'S1', 'K', 'P', 'ISLAM', 'anggi@indonesiacarterminal.co.id', '$2y$10$xU7YWflTqJPuzWPtHcdB8.Oz/cd16x03ZAB3oV/DbzGj3C/iqIuRi', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:35:44', NULL),
(75, '280098093', '279067044', 'MERLIN SITUMORANG', '10', 'Pj. DVP. Key Account Management', 'Komersial & Pengembangan Bisnis', 'Key Account Management', NULL, NULL, 'III/a', 'S1', 'K', 'W', 'KRISTEN', 'merlin.situmorang@indonesiacarterminal.co.id', '$2y$10$5xVdWoktgioVwsumtLiAW.UzY7HUnb1K2o22nZG5MajNZEpGqINZ.', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:37:04', NULL),
(76, '288018164', '280097410', 'M. SHOLIHUL FATHONI', '10', 'Pj. DVP. Strategi Bisnis', 'Komersial & Pengembangan Bisnis', 'Strategi Bisnis', NULL, NULL, 'III/a', 'S1', 'K', 'P', 'ISLAM', 'fathoni@indonesiacarterminal.co.id', '$2y$10$/3g4ZGDe4hfc4Tjt65cQ7.WJ4UV4lPb9Mw/JYtgxa/i8IxoBazGPi', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:37:16', NULL),
(79, '10000002', '10000001', 'Officer', '14', 'Officer', 'Operasi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'raymon.prijati@gmail.com', '$2y$10$VVK.H.o4sftpCcGLHa3iheQNWsI8ER5.n/xu6TSPcW84Xa5oM7/t.', 0, NULL, 1, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-03-24 00:07:41', '2019-03-24 00:07:41'),
(80, '10000001', NULL, 'Superadmin', '1', 'Superadmin', 'Superadmin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'superadmin@system.com', '$2y$10$RGmUohTuspyZU.01NpkfFuk6iqaiXNwhRU0aeRKLuquY.K5RUWkVa', 0, NULL, 4, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-01 10:01:33', '2019-03-24 04:02:48'),
(81, '2631904D2', '277056896', 'SALUSRA WJAYA', '4', 'Direktur Kepatuhan', 'Kepatuhan', 'Kepatuhan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'salusra.wijaya@indonesiacarterminal.co.id', '$2y$10$C04gu7AXV7hzjDunsGXsaej3carXUWu8CAaWxrZ7bhkR7TSjYyOVe', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', '2019-04-03 20:34:47', '2019-04-03 20:34:47'),
(82, '679051745', '', 'ABDUL GAFAR', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'doelbang62@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(83, '680061756', '', 'ABDUL ROCHMAN', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'abdulrohman180680@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(84, '686031749', '', 'ABDUL ROZAK', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'abdulrozak0786@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(85, '684071712', '', 'ABIYOSO', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'abiyoso8430@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(86, '668121696', '', 'AGUNG TRIMULYONO', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'agungtri80@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(87, '682091695', '', 'AHMAD ARIFIN', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Arifinh896@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(88, '691041702', '', 'AHMAD MAULANA', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ahmadmoelana97@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(89, '683111770', '', 'ALI ARIF', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'alipvin@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(90, '675071729', '', 'ALI UDIN ', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'aliudin2507@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(91, '685051772', '', 'ALMAYANDI KARAUWAN', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Alma.yandi16@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(92, '670011731', '', 'AMIRUDIN', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Amiragv@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(93, '683101704', '', 'ANDHIKA', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'noahalmahdi30@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(94, '685081742', '', 'ANDIKA NUR ISMA', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'andikanurisma17@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(95, '686101773', '', 'ANDRI', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'andririo889@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(96, '670111713', '', 'ANTON YUSRI', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'antonyusri2@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(97, '696081777', '270126305', 'ARI AGUS BAMBANG WAHYUDI', 'TNO', 'TNO', 'TEKNIK & SISTEM INFORMASI', 'TEKNIK MESIN & LISTRIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ariagusbw123@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(98, '673021709', '', 'B YUSWANTO', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sauryuswanto18880@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(99, '682021697', '', 'BAMBANG IRAWAN', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'joni_irawan82@yahoo.co.id', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(100, '680081730', '', 'BANGKIT MANGATUR ARWAN', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bangkitaruan@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(101, '679081715', '', 'BURHANUDIN', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bburhanudin688@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(102, '681041728', '', 'CASMIN', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'casmin.iktport@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(103, '685091750', '', 'CHAERUL ANWAR', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Unavoet@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(104, '699061711', '', 'DANI WAHYUDI', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'margarethnatsukifans@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(105, '691051741', '', 'DANIEL MAROLOP', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Danielbolank91@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(106, '686121737', '', 'DEDEH FATHUDI', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bramfals76@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(107, '679031716', '', 'DENNY EKWANTO', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ekwandenny@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(108, '688121714', '', 'DIKI DARMAWAN RUSKIWA', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dikiahonk20port@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(109, '667031705', '', 'DIRMANTO', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Dirmantopsikt@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(110, '686101753', '', 'EKO TEGUH WASKITO', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ekoteguhwaskito@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(111, '686081734', '', 'ENDRI GUSTAMI', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Einkwolez1705@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(112, '679021755', '', 'ERWIN PEBRIANTONI', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'karlinaina1986@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(113, '694011735', '', 'FADLI ALBAR', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fadlialbar80tampan@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(114, '686041706', '', 'FAJAR SAPUTRA', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(115, '682091779', '276016667', 'FAZARUDIN ACO', 'TNO', 'TNO', 'SUMBER DAYA MANUSIA', 'LAYANAN UMUM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'acokodokkodok841@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(116, '693011763', '', 'GIGIH PRATAMA PUTRA', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'gigih.iktport@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(117, '678051698', '', 'HARI SUSANTO', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'susantohari298@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(118, '686021767', '', 'HENDRA SAPUTRA', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'saputra.botenk@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(119, '677021758', '', 'HENDRAWAN', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Kahenhendra1977@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(120, '689121761', '', 'HENDRIK TUHUMENA', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Hendrik.Kay.hk@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(121, '672071722', '', 'HERMAWAN', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'hermawanwan011@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(122, '688051760', '', 'HERU SYAHRUL JIHAD', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'auliazaara00@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(123, '680031747', '', 'HERYANTO', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'heryanto_ajah@yahoo.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(124, '677021768', '', 'HODDI GOKLAS SIHOMBING', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'hoddi.goklas19@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(125, '690081710', '', 'IBRAHIM', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ibrahimibra900@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(126, '673041782', '276016667', 'IMAM SIBRO MULIS', 'TNO', 'TNO', 'SUMBER DAYA MANUSIA', 'LAYANAN UMUM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'imamibra07@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(127, '692071778', '', 'IMAM SYAFI\'I', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Syafiiimam2521@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(128, '677091733', '', 'JOKO IRWAN', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'irawanfawaz@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(129, '685101739', '', 'JUMANTORO', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'asyilah59@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(130, '667121717', '', 'KOMARUDIN', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Komarudinambo7@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(131, '686031780', '276016667', 'KUSNADI', 'TNO', 'TNO', 'SUMBER DAYA MANUSIA', 'LAYANAN UMUM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'abungkusnadi123@yahoo.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(132, '691121764', '', 'LUKMAN HAKIM', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'hakimya91@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(133, '687111776', '', 'M YUDHA CIPTA PRATAMA', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yudhacipta081187@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(134, '676031699', '', 'M. MUDOFAR', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'muhdofar7@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(135, '692091707', '', 'M. SADAM HIDAYAT', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'muhsadam1992@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(136, '681031703', '', 'M. SYUKUR SOPYAN ', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'msyukursopyan@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(137, '682021769', '', 'MARDIONO', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'mardionoyono9@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(138, '660111738', '276016667', 'MARGONO', 'TNO', 'TNO', 'SUMBER DAYA MANUSIA', 'LAYANAN UMUM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(139, '686021723', '', 'MAXPATI RASKA AWAN', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bilqisputra05@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(140, '687031744', '', 'MOCH SYAIFUL RIVAI', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'syaifulajah304@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(141, '690011751', '', 'MOCH. FAJAR FADLI', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'elfatahfajar45@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(142, '696061746', '', 'MOCHAMAD JAJANG', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'mjajang0496@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(143, '681051719', '', 'MOHAMAD RIDWAN', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MR3283092@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(144, '679021775', '', 'MUCHLIS', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'qbeyklangenan@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL);
INSERT INTO `users` (`id`, `nipp`, `supervisor_nipp`, `nama`, `kelas_jabatan`, `jabatan`, `divisi`, `sub_divisi`, `sub_subdivisi`, `3rd_divisi`, `golongan`, `pendidikan`, `sta_kel`, `jenis_kelamin`, `agama`, `email`, `password`, `remember_token`, `email_verified_at`, `auth_level`, `avatar`, `komentar`, `updated_at`, `created_at`) VALUES
(145, '694111757', '', 'MUHAMAD ARDI', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ardimuhamad620@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(146, '694101718', '', 'NASARUDDIN', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'nasaruddin.nasar94@yahoo.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(147, '670071721', '', 'OMAN ', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'omanabdurachman38@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(148, '688121771', '', 'PRIAM TRIAMANSYAH', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'priamtriamansyah@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(149, '687061732', '', 'PUTRA ACHMAD DWIPA', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'phadzha014@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(150, '686031724', '', 'RAHMAT WAHYUDI', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'k3.iktport@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(151, '693101766', '', 'RINO OCTAVIANO RUSKIWA', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rinooctaviano@yahoo.co.id', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(152, '684031740', '', 'RISTOMOYO', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'moyoganteng@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(153, '691071748', '', 'RIZAL FAOZI', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rizalfaozi1407@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(154, '689011774', '', 'ROSIAN ANWAR', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rosiananwar19@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(155, '679021700', '', 'SUHATMAN', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Kefia.ferdy@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(156, '688061720', '', 'SUNITO', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sonysonito652@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(157, '680121708', '', 'SURYA DARMA', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'darmasurya511@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(158, '670021725', '', 'SURYANA', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'suryaipc5@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(159, '683071781', '', 'SUWANDI', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'FASILITAS & PERALATAN TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'doingceper@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(160, '676071759', '', 'TEDY IBRAHIM TIMUR', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tedyibrahimtimur07@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(161, '684061752', '', 'TOMI HENDANA', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'caisagoz00@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(162, '681121701', '', 'WAWAN ARIEF KURNIAWAN', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'wawanak248@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(163, '683021726', '', 'WAWAN KURNIAWAN', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Wk1718221@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(164, '681041727', '', 'YUFRAN TALAHATU', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yufrantalahatu@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(165, '690031754', '', 'ZAINAL ARIFIN', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'arifin.zai32@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(166, '688071692', '', 'ZULGUSRIANSYAH', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'zulgusriansyah@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(167, '682051512', '', 'ABDUL RAHMAN', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Razurh@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(168, '687071514', '290068494', 'ADE PRATIKNO', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'PERENCANAAN & PENGENDALIAN TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ade_pmlng87@yahoo.co.id', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(169, '680061515', '291038497', 'ADE WIJAYA', 'TNO', 'TNO', 'TERMINAL DOMESTIK', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL DOMESTIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'adewijaya7879@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(170, '678011516', '291038497', 'ADEL', 'TNO', 'TNO', 'TERMINAL DOMESTIK', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL DOMESTIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'adel78del@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(171, '689031517', '291108242', 'ADI POETRA DEKATEN', 'TNO', 'TNO', 'TEKNIK & SISTEM INFORMASI', 'TEKNIK SIPIL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'adi.poetra.dekaten@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(172, '674081519', '290068494', 'ADI SOEJONO', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'PERENCANAAN & PENGENDALIAN TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(173, '681111520', '290068494', 'AFIFULLAH', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'PERENCANAAN & PENGENDALIAN TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'zie_abu@yahoo.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(174, '687081521', '287048457', 'AGUNG PRASETYA', 'TNO', 'TNO', 'TERMINAL DOMESTIK', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL DOMESTIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(175, '677081522', '286117574', 'AGUS HIDAYAT', 'TNO', 'TNO', 'TERMINAL DOMESTIK', 'PERENCANAAN & PENGENDALIAN TERMINAL DOMESTIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'agusblack576@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(176, '686121523', '276016667', 'AGUS SUBAGYO', 'TNO', 'TNO', 'SUMBER DAYA MANUSIA', 'LAYANAN UMUM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'subagyoagus428@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(177, '680031524', '291038497', 'AHMAD JHONI', 'TNO', 'TNO', 'TERMINAL DOMESTIK', 'PERENCANAAN & PENGENDALIAN TERMINAL DOMESTIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'jhonyahmad23398@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(178, '684071525', '', 'AHMAD TAUFIQURRAHMAN', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'PERENCANAAN & PENGENDALIAN TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ahmadtaufiqurrahman93@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(179, '691091526', '287048457', 'ALDI HASBIYAL', 'TNO', 'TNO', 'TERMINAL DOMESTIK', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL DOMESTIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'hasbiyaldi19@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(180, '671051527', '276016667', 'ALIZAR', 'TNO', 'TNO', 'SUMBER DAYA MANUSIA', 'LAYANAN UMUM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'alizar.ben@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(181, '675121528', '282068392', 'AMIN UTORO', 'TNO', 'TNO', 'TERMINAL DOMESTIK', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL DOMESTIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Amin.utoro75@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(182, '690091529', '292028213', 'ANDREAS STEFAN', 'TNO', 'TNO', 'KEUANGAN', 'PERBENDAHARAAN & MANAJEMEN ASET', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'andreasstefaann@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(183, '687101530', '282068392', 'ANDRI RIVANI', 'TNO', 'TNO', 'TERMINAL DOMESTIK', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL DOMESTIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Qyarraandhein@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(184, '685111531', '290068494', 'ANGGA PURWANTO', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'PERENCANAAN & PENGENDALIAN TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Anggapaytren@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(185, '686041532', '294017862', 'ANGGARA YOGA BRAMANTO', 'TNO', 'TNO', 'TERMINAL DOMESTIK', 'ADMINISTRASI TERMINAL DOMESTIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'anggara.bramanto23@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(186, '692071533', '', 'ANTON ARIFIN', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'anton.iktport@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(187, '686051534', '', 'ANTON SETIADI', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'PERENCANAAN & PENGENDALIAN TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'antonsetiadi48@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(188, '677121535', '287048457', 'ANTONI', 'TNO', 'TNO', 'TERMINAL DOMESTIK', 'PERENCANAAN & PENGENDALIAN TERMINAL DOMESTIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'muhamad.arkhan77@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(189, '684091536', '290057664', 'ARGA WIDIYANTIKO', 'TNO', 'TNO', 'KEPATUHAN & PENGENDALIAN KINERJA', 'MANAJEMEN RESIKO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(190, '692021537', '287117999', 'ARI TIARA PUTRA', 'TNO', 'TNO', 'KOMERSIAL', 'KOMERSIAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'aritiaraputra12@gmail.com ', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(191, '693081538', '270126305', 'ARI WIBISONO', 'TNO', 'TNO', 'TEKNIK & SISTEM INFORMASI', 'TEKNIK MESIN & LISTRIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Wibisonoari123@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(192, '681071539', '291038497', 'ARIEF PRABOWO', 'TNO', 'TNO', 'TERMINAL DOMESTIK', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL DOMESTIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'prabowo.arief007@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(193, '677091540', '282068392', 'ARIF RIYANTO', 'TNO', 'TNO', 'TERMINAL DOMESTIK', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL DOMESTIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'arifriyanto241@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(194, '694071541', '', 'ARMANDO MORA SINAGA', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'PERENCANAAN & PENGENDALIAN TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'armandosinaga1907@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(195, '675081542', '291038497', 'ARPIN', 'TNO', 'TNO', 'TERMINAL DOMESTIK', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL DOMESTIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'arpincoolz75@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(196, '689011543', '287048457', 'ARYADI', 'TNO', 'TNO', 'TERMINAL DOMESTIK', 'PERENCANAAN & PENGENDALIAN TERMINAL DOMESTIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'aryadi.chikal@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(197, '674061544', '287048457', 'ASEP PURNAMA', 'TNO', 'TNO', 'TERMINAL DOMESTIK', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL DOMESTIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'purnamaasep172@gmail.om', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(198, '688091545', '287048457', 'ASEP SEPTIANDI', 'TNO', 'TNO', 'TERMINAL DOMESTIK', 'PERENCANAAN & PENGENDALIAN TERMINAL DOMESTIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'aseptiandi04@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(199, '671111546', '271035640', 'ASIKIN SAPUTRA', 'TNO', 'TNO', 'TERMINAL DOMESTIK', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL DOMESTIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(200, '690111547', '270045410', 'ASRI DWI VERDIYANI', 'TNO', 'TNO', 'SEKRETARIS PERUSAHAAN', 'SEKRETARIS PERUSAHAAN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'asridverdiyani@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(201, '687081549', '', 'AYIEP GHUSMAN', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'PERENCANAAN & PENGENDALIAN TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ghusmanayiep@yahoo.co.id', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(202, '688061550', '292087831', 'BAHRUL ULUM', 'TNO', 'TNO', 'KEUANGAN', 'PENDAPATAN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'chokeybriliant@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(203, '683011551', '271035640', 'BAMBANG SUPARMANTO', 'TNO', 'TNO', 'TERMINAL DOMESTIK', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL DOMESTIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'benkq_tpt@yahoo.co.id', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(204, '686041552', '290068494', 'BAYU PRABOWO', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'PERENCANAAN & PENGENDALIAN TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bayu_html.2642@yahoo.co.id', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(205, '688011553', '290068494', 'BUDI RAHARJO', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'PERENCANAAN & PENGENDALIAN TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(206, '693071554', '', 'BUDIMANSYAH RACHMAN', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'PERENCANAAN & PENGENDALIAN TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'budimansyahr@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(207, '685121555', '287048457', 'BUDIYANSYAH', 'TNO', 'TNO', 'TERMINAL DOMESTIK', 'PERENCANAAN & PENGENDALIAN TERMINAL DOMESTIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'satria85gokil2@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(208, '695091556', '287048457', 'CHAERUL FIKRIE', 'TNO', 'TNO', 'TERMINAL DOMESTIK', 'PERENCANAAN & PENGENDALIAN TERMINAL DOMESTIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cfikrie@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(209, '685091557', '276016667', 'CORRY TRIANA SEPTI', 'TNO', 'TNO', 'SUMBER DAYA MANUSIA', 'LAYANAN UMUM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'oieianasepti@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(210, '681011558', '287048457', 'DANI STEPANUS SIJABAT', 'TNO', 'TNO', 'TERMINAL DOMESTIK', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL DOMESTIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'danistefanussijabat@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(211, '682021559', '', 'DANI SUPRIADI', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'PERENCANAAN & PENGENDALIAN TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'didanz999@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(212, '689111560', '291038497', 'DANI YANSYAH', 'TNO', 'TNO', 'TERMINAL DOMESTIK', 'PERENCANAAN & PENGENDALIAN TERMINAL DOMESTIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'daniyansyah0411@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(213, '681091561', '', 'DEDI DARMAWAN', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'PERENCANAAN & PENGENDALIAN TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dedicole1@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(214, '680111562', '', 'DEDY SUBADI', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'PERENCANAAN & PENGENDALIAN TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bigdedy.ikt@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(215, '687111563', '290068494', 'DIAN ISKANDAR', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'PERENCANAAN & PENGENDALIAN TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dianchup72@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(216, '689011564', '282068392', 'DIMAS SOMAWIJAYA', 'TNO', 'TNO', 'TERMINAL DOMESTIK', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL DOMESTIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Raffaraffaell26@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(217, '679121565', '291038497', 'DINAR PARYANTO', 'TNO', 'TNO', 'TERMINAL DOMESTIK', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL DOMESTIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dinarparyantoparyanto@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(218, '690101566', '288107927', 'DWI NANDA FATHU RIZKI', 'TNO', 'TNO', 'SUMBER DAYA MANUSIA', 'SUMBER DAYA MANUSIA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'nandazakir1928@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(219, '683011567', '274106159', 'DWI WIDY HANDOKO', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'PERENCANAAN & PENGENDALIAN TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'widy.iktport@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(220, '682031568', '', 'EBTA PRAGA HIDAYAT', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'PERENCANAAN & PENGENDALIAN TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'al_p45tel@yahoo.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(221, '693091569', '291108242', 'ELSEHARA BUSNITA ', 'TNO', 'TNO', 'TEKNIK & SISTEM INFORMASI', 'TEKNIK SIPIL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'elseharabusnita@yahoo.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(222, '690081571', '', 'ERFAN BUDIYANTO', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'PERENCANAAN & PENGENDALIAN TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'erfan.budiyanto7@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(223, '684061572', '', 'FACHRI RAMADHAN', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'PERENCANAAN & PENGENDALIAN TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fachri.ramadhan1906@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(224, '686091574', '276016667', 'FAHRY SEPTIADI', 'TNO', 'TNO', 'SUMBER DAYA MANUSIA', 'LAYANAN UMUM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fahri.ikt@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(225, '690081575', '284037752', 'FAHRIZA ADELINA YASMINE', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'ADMINISTRASI TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(226, '683081576', '290068494', 'FAJAR AGUS DINATA', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'PERENCANAAN & PENGENDALIAN TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fajardinata83@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(227, '687021577', '', 'FEBRIAN DITYA GUMAY', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'PERENCANAAN & PENGENDALIAN TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fdityagumay@yahoo.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(228, '687021578', '', 'FENDY ADINATA', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'PERENCANAAN & PENGENDALIAN TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fendy369@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(229, '687041579', '291038497', 'FERRYANSYAH RIZAL', 'TNO', 'TNO', 'TERMINAL DOMESTIK', 'PERENCANAAN & PENGENDALIAN TERMINAL DOMESTIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ferryansyah1987@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(230, '685091580', '282068392', 'FIQRI ABDUROFIE JUNDORA', 'TNO', 'TNO', 'TERMINAL DOMESTIK', 'PERENCANAAN & PENGENDALIAN TERMINAL DOMESTIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Fiqrijundora@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(231, '677091582', '291038497', 'H. EDWIN WIANTO', 'TNO', 'TNO', 'TERMINAL DOMESTIK', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL DOMESTIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'edwin.fino77@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(232, '693031583', '278056713', 'HADI RAHMAT HIDAYAT', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'FASILITAS & PERALATAN TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'hadirahmathdyt@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(233, '690101584', '276016667', 'HARDY WIBOWO', 'TNO', 'TNO', 'SUMBER DAYA MANUSIA', 'LAYANAN UMUM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'hardywibowo90@gmail.com ', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(234, '687011585', '', 'HARIES', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'haries.ikt@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(235, '690031586', '282068392', 'HARIS RIZKI AWAN', 'TNO', 'TNO', 'TERMINAL DOMESTIK', 'PERENCANAAN & PENGENDALIAN TERMINAL DOMESTIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'haris.rizkiawan@yahoo.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(236, '686081587', '282068392', 'HARRIS SUSENO', 'TNO', 'TNO', 'TERMINAL DOMESTIK', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL DOMESTIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'harrissuseno1@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(237, '685121588', '287048457', 'HARYUDO DEDY SOETRISNO', 'TNO', 'TNO', 'TERMINAL DOMESTIK', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL DOMESTIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rerekhancil85@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(238, '685041589', '270126305', 'HASAN BASRI', 'TNO', 'TNO', 'TEKNIK & SISTEM INFORMASI', 'TEKNIK MESIN & LISTRIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'hb77328@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(239, '676101590', '', 'HENDRA', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(240, '692021591', '282068392', 'HENDRA SAPUTRA', 'TNO', 'TNO', 'TERMINAL DOMESTIK', 'PERENCANAAN & PENGENDALIAN TERMINAL DOMESTIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'hs230292@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(241, '689101592', '', 'HENDRI SETIAWAN', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'PERENCANAAN & PENGENDALIAN TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'khokok@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(242, '670111593', '282068392', 'HENDRI SIMAMORA', 'TNO', 'TNO', 'TERMINAL DOMESTIK', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL DOMESTIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'hendrisimamora71@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(243, '691121594', '291108242', 'HERI PRIATNO SAPUTRO', 'TNO', 'TNO', 'TEKNIK & SISTEM INFORMASI', 'TEKNIK SIPIL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'heri.priatnosaputro@yahoo.co.id', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(244, '675101595', '289047645', 'HERRY ROSANDI            ', 'TNO', 'TNO', 'HUKUM', 'PENGADAAN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'herryikt@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(245, '693111596', '280097410', 'INDAH NOVIDTRI', 'TNO', 'TNO', 'STRATEGI & PENGEMBANGAN BISNIS', 'STRATEGI & PENGEMBANGAN BISNIS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'indahnovid@gmail.com ', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(246, '687051597', '', 'INDRA AUSTA', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'PERENCANAAN & PENGENDALIAN TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Indra.austa31@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(247, '687021598', '', 'INDRA WIBOWO', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'PERENCANAAN & PENGENDALIAN TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Wibowoindra12@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(248, '684041599', '270045410', 'INSAN MULIAWAN', 'TNO', 'TNO', 'SEKRETARIS PERUSAHAAN', 'SEKRETARIS PERUSAHAAN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'insan.muliawan@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(249, '684051600', '291038497', 'IPIN SUSANTO', 'TNO', 'TNO', 'TERMINAL DOMESTIK', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL DOMESTIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ipinsusanto121@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(250, '685021601', '270126305', 'IRFAN WAHYUDI', 'TNO', 'TNO', 'TEKNIK & SISTEM INFORMASI', 'TEKNIK MESIN & LISTRIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'wahyudi.irfan082506@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(251, '673041602', '291038497', 'IRLAN ADRIANA', 'TNO', 'TNO', 'TERMINAL DOMESTIK', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL DOMESTIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'irlanadriana@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(252, '684081603', '271015700', 'IRVAN AGUS SETIYADI', 'TNO', 'TNO', 'PFSO', 'PFSO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mahardika9822@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(253, '689101604', '288107927', 'IRVAN FUADILLAH', 'TNO', 'TNO', 'SUMBER DAYA MANUSIA', 'SUMBER DAYA MANUSIA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'vanirvan1@yahoo.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(254, '671111605', '278056713', 'IRWAN', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'FASILITAS & PERALATAN TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Irwanfiyaa10@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(255, '676081606', '287048457', 'IWAN AGUSTIAN', 'TNO', 'TNO', 'TERMINAL DOMESTIK', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL DOMESTIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'iwan18agustian@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(256, '675051607', '291038497', 'JAMIAT', 'TNO', 'TNO', 'TERMINAL DOMESTIK', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL DOMESTIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'jamiat_malawat@yahoo.co.id', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(257, '680071608', '282068392', 'JATMIKO', 'TNO', 'TNO', 'TERMINAL DOMESTIK', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL DOMESTIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jatmiko30071980@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(258, '693091609', '282068392', 'JHOHAN FIRMANSYAH', 'TNO', 'TNO', 'TERMINAL DOMESTIK', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL DOMESTIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'jhohanfirmansyah25@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(259, '681051611', '289047644', 'JOKO LARAS ANJASMORO', 'TNO', 'TNO', 'MANAJEMEN MUTU & HSE', 'MANAJEMEN MUTU & HSE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'larasanjasmoro21@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(260, '690011612', '291038497', 'JUANDA AMAR', 'TNO', 'TNO', 'TERMINAL DOMESTIK', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL DOMESTIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'juanda.amar70@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(261, '678031613', '287048457', 'KARNADI', 'TNO', 'TNO', 'TERMINAL DOMESTIK', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL DOMESTIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'karnadsamil@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(262, '679091614', '', 'KURNIAWAN DWI AGUS', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'PERENCANAAN & PENGENDALIAN TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(263, '675121615', '294017862', 'LENI SULASTRI              ', 'TNO', 'TNO', 'TERMINAL DOMESTIK', 'ADMINISTRASI TERMINAL DOMESTIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rafiganteng2007@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(264, '684061616', '290068494', 'LUTFI SAIFULLOH', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'PERENCANAAN & PENGENDALIAN TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(265, '684061617', '276016667', 'M. FITRAH RAHMANNUDIN', 'TNO', 'TNO', 'SUMBER DAYA MANUSIA', 'LAYANAN UMUM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(266, '671101618', '', 'MOHAMAD KAMARUDIN', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'PERENCANAAN & PENGENDALIAN TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'komar.komenx1971@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(267, '684111619', '', 'M. LUTHFI TAUFANI', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'PERENCANAAN & PENGENDALIAN TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Raffataufani@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(268, '691031620', '290068494', 'M. RAMADAN', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'PERENCANAAN & PENGENDALIAN TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(269, '685121621', '284128424', 'MARIO DESANTO SAPUTRA', 'TNO', 'TNO', 'TERMINAL DOMESTIK', 'PERENCANAAN & PENGENDALIAN TERMINAL DOMESTIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mariodesanto88@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(270, '675021622', '291038497', 'MARTIN BAHTIAR', 'TNO', 'TNO', 'TERMINAL DOMESTIK', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL DOMESTIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'alrafabahtiar1975@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(271, '675121623', '290068494', 'MARYADI', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'PERENCANAAN & PENGENDALIAN TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(272, '684051624', '287048457', 'MEYOSA QODRI WIBOWO', 'TNO', 'TNO', 'TERMINAL DOMESTIK', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL DOMESTIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yosaqodri@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(273, '669051625', '282068392', 'MINTRA SUHERMAN', 'TNO', 'TNO', 'TERMINAL DOMESTIK', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL DOMESTIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'mintrasuherman@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(274, '685111626', '290068494', 'MOCHAMAD FAUZI', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'PERENCANAAN & PENGENDALIAN TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fauzisiska@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(275, '690051627', '', 'MOCH. INDRA RUSMANA', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'PERENCANAAN & PENGENDALIAN TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'indrusmana7@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(276, '682091628', '287048457', 'MOCH. ISWAN CHUBAIDI', 'TNO', 'TNO', 'TERMINAL DOMESTIK', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL DOMESTIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'iwankmochammad@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(277, '677091629', '', 'MOH. NAHROWI', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'PERENCANAAN & PENGENDALIAN TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(278, '691101630', '', 'MUHAMMAD SURYA EFENDI', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'PERENCANAAN & PENGENDALIAN TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'indahme36370@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(279, '684071631', '287048457', 'MUHAMAD', 'TNO', 'TNO', 'TERMINAL DOMESTIK', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL DOMESTIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ahmadvijay2@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(280, '674111632', '282068392', 'MUHAMAD CHOLIL', 'TNO', 'TNO', 'TERMINAL DOMESTIK', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL DOMESTIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cholilmuhamad25@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(281, '685121634', '', 'MUHAMMAD CHAIDIR', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'PERENCANAAN & PENGENDALIAN TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ernitriyani10@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(282, '685031636', '291038497', 'MUHAMMAD ZAENUDIN', 'TNO', 'TNO', 'TERMINAL DOMESTIK', 'PERENCANAAN & PENGENDALIAN TERMINAL DOMESTIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'chalista0157@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(283, '688061637', '', 'NACHROWI', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'PERENCANAAN & PENGENDALIAN TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rhowim@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(284, '688111638', '290068494', 'NODITYA WIDYA PUTRA', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'PERENCANAAN & PENGENDALIAN TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'odit.widyaputra@yahoo.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(285, '675051639', '287048457', 'NUR HUDA', 'TNO', 'TNO', 'TERMINAL DOMESTIK', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL DOMESTIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Udhokopraludho304@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(286, '687071640', '270045410', 'NUR ZAENAF', 'TNO', 'TNO', 'SEKRETARIS PERUSAHAAN', 'SEKRETARIS PERUSAHAAN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'zaenaf.nur87@gmail.com ', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(287, '681061641', '276016667', 'NURLI HADI WIJAYA', 'TNO', 'TNO', 'SUMBER DAYA MANUSIA', 'LAYANAN UMUM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(288, '681061642', '276016667', 'NURYANTO', 'TNO', 'TNO', 'SUMBER DAYA MANUSIA', 'LAYANAN UMUM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(289, '690041643', '', 'PADJRI', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'PERENCANAAN & PENGENDALIAN TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Fajriazryal@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(290, '689081644', '280098093', 'PANJI ANOM SISWOYO', 'TNO', 'TNO', 'KOMERSIAL', 'KEY ACCOUNT MANAGEMENT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(291, '662071645', '270126305', 'PONCO SUKOCO', 'TNO', 'TNO', 'TEKNIK & SISTEM INFORMASI', 'TEKNIK MESIN & LISTRIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ponco.sukuco101@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(292, '685071647', '291038497', 'RADEN SANDI SUHERMAN', 'TNO', 'TNO', 'TERMINAL DOMESTIK', 'PERENCANAAN & PENGENDALIAN TERMINAL DOMESTIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'shandy.mhagalie86@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(293, '678121648', '289047798', 'RD. HUSIN ISKANDAR', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'husiniskandar78@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(294, '694081649', '', 'REGY AGUSTIAWAN', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'PERENCANAAN & PENGENDALIAN TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'regyagustiawan12361@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(295, '691111650', '', 'RENDY HIDAYAT', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rendihidayat5734@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(296, '693021651', '290068494', 'RENDY SETIAWAN', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'PERENCANAAN & PENGENDALIAN TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rendy220293@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(297, '693071652', '', 'REZA TRIAJI PAMUNGKAS', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'PERENCANAAN & PENGENDALIAN TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'reza.triaji93@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(298, '677101653', '287048457', 'RICKI SETIAWAN', 'TNO', 'TNO', 'TERMINAL DOMESTIK', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL DOMESTIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rickisetiawan498@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(299, '669121654', '287048457', 'RICO M. SALEH', 'TNO', 'TNO', 'TERMINAL DOMESTIK', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL DOMESTIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rikogtlo@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(300, '686051655', '291038497', 'RICO RAHARDIAN', 'TNO', 'TNO', 'TERMINAL DOMESTIK', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL DOMESTIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ricojupe@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(301, '685091656', '282068392', 'RIZA ZAINUL ICHSAN', 'TNO', 'TNO', 'TERMINAL DOMESTIK', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL DOMESTIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'maditriza@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(302, '690061657', '', 'ROBY PATAR PANDAPOTAN', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'PERENCANAAN & PENGENDALIAN TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Wolezlu@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(303, '685091658', '290068494', 'ROBY SURONO', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'PERENCANAAN & PENGENDALIAN TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Suronoroby160985@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(304, '681111659', '291038497', 'ROHMAN', 'TNO', 'TNO', 'TERMINAL DOMESTIK', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL DOMESTIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rochman0109@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(305, '669011660', '287048457', 'ROMIKO', 'TNO', 'TNO', 'TERMINAL DOMESTIK', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL DOMESTIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'mikoromiko.ikt@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(306, '674121661', '', 'ROYADI', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'royadi983@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(307, '688071662', '282068392', 'ROYENDRA', 'TNO', 'TNO', 'TERMINAL DOMESTIK', 'PERENCANAAN & PENGENDALIAN TERMINAL DOMESTIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Royandra74@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(308, '690061663', '288028577', 'RR. INES MOERDIYANTI', 'TNO', 'TNO', 'KEUANGAN', 'AKUNTANSI & PAJAK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'moerdiyanti12@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(309, '679071664', '282068392', 'RUSLI', 'TNO', 'TNO', 'TERMINAL DOMESTIK', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL DOMESTIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rusliikt@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(310, '679121665', '291038497', 'RUSMIN NURYADIN', 'TNO', 'TNO', 'TERMINAL DOMESTIK', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL DOMESTIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rusminnuryadin2009@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(311, '685051666', '', 'SABRINAL AGUNG SANTOSO', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'PERENCANAAN & PENGENDALIAN TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Sabrinalnoerly85@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL);
INSERT INTO `users` (`id`, `nipp`, `supervisor_nipp`, `nama`, `kelas_jabatan`, `jabatan`, `divisi`, `sub_divisi`, `sub_subdivisi`, `3rd_divisi`, `golongan`, `pendidikan`, `sta_kel`, `jenis_kelamin`, `agama`, `email`, `password`, `remember_token`, `email_verified_at`, `auth_level`, `avatar`, `komentar`, `updated_at`, `created_at`) VALUES
(312, '693121667', '', 'SALAHUDIN YUSUF SYAHPUTRA', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'PERENCANAAN & PENGENDALIAN TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'syahputrautha69@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(313, '685051668', '290068494', 'SARIPIN', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'PERENCANAAN & PENGENDALIAN TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'saripok01@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(314, '681031669', '', 'SAYAN', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sayanbae220@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(315, '688071670', '291038497', 'SEHA ABUDIN', 'TNO', 'TNO', 'TERMINAL DOMESTIK', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL DOMESTIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'budiseha88@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(316, '685061671', '', 'SOFYAN', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'PERENCANAAN & PENGENDALIAN TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'andiphiand@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(317, '686081672', '', 'SOFYAN KHAERUDIN', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'PERENCANAAN & PENGENDALIAN TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'm4t4h4r1_ut4r4@yahoo.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(318, '686081673', '', 'SOLIMIN', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'soliminipc@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(319, '686051674', '290068494', 'SONHAJI', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'PERENCANAAN & PENGENDALIAN TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Banishoji@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(320, '685101675', '', 'SUNDORO', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'PERENCANAAN & PENGENDALIAN TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sundoro33@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(321, '678071676', '', 'SURYADI', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'PERENCANAAN & PENGENDALIAN TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rentalsyfa@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(322, '686101677', '287048457', 'SYAH ALAM BENST MONTO', 'TNO', 'TNO', 'TERMINAL DOMESTIK', 'OPERASI & LAYANAN NILAI TAMBAH TERMINAL DOMESTIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(323, '681041678', '', 'SYAIFUL ANAS', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'PERENCANAAN & PENGENDALIAN TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'anascartos@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(324, '685021679', '291038497', 'SYUKRON', 'TNO', 'TNO', 'TERMINAL DOMESTIK', 'PERENCANAAN & PENGENDALIAN TERMINAL DOMESTIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'syukron.2013.2013@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(325, '688081680', '291038497', 'TEUKU MUHAMMAD FACHRI', 'TNO', 'TNO', 'TERMINAL DOMESTIK', 'PERENCANAAN & PENGENDALIAN TERMINAL DOMESTIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fachriahmad01@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(326, '683031681', '', 'TAQIYYUDDIN', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'PERENCANAAN & PENGENDALIAN TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'taqiyyuddien08@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(327, '693041682', '282068392', 'TEGUH PRIONO', 'TNO', 'TNO', 'TERMINAL DOMESTIK', 'PERENCANAAN & PENGENDALIAN TERMINAL DOMESTIK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'prionoteguh89@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL),
(328, '689041683', '290068494', 'TONI IRAWAN PUTRA', 'TNO', 'TNO', 'TERMINAL INTERNASIONAL', 'PERENCANAAN & PENGENDALIAN TERMINAL INTERNASIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'makan691@gmail.com', 'admin123', 0, NULL, 0, 'http://via.placeholder.com/500x500', 'Belum Diubah oleh User', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `direksi`
--
ALTER TABLE `direksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `NIPP_Direksi` (`nipp`);

--
-- Indeks untuk tabel `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `goalmatching`
--
ALTER TABLE `goalmatching`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `logbook`
--
ALTER TABLE `logbook`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `manajer`
--
ALTER TABLE `manajer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `performa`
--
ALTER TABLE `performa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nipp` (`nipp`);

--
-- Indeks untuk tabel `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nipp` (`nipp`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `direksi`
--
ALTER TABLE `direksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT untuk tabel `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `goalmatching`
--
ALTER TABLE `goalmatching`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `logbook`
--
ALTER TABLE `logbook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `manajer`
--
ALTER TABLE `manajer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `performa`
--
ALTER TABLE `performa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=329;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `direksi`
--
ALTER TABLE `direksi`
  ADD CONSTRAINT `NIPP_Direksi` FOREIGN KEY (`nipp`) REFERENCES `users` (`nipp`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
