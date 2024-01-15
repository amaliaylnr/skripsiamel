-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Des 2023 pada 05.09
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_desa_2023`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) UNSIGNED NOT NULL,
  `judul` varchar(125) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `kategori` varchar(125) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `penulis` text DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `publish` enum('publish','edit','pratinjau') NOT NULL DEFAULT 'edit',
  `created_date` datetime DEFAULT current_timestamp(),
  `updated_date` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2023-06-26-160734', 'App\\Database\\Migrations\\Users', 'default', 'App', 1702128677, 1),
(2, '2023-06-26-181439', 'App\\Database\\Migrations\\ProdukDesa', 'default', 'App', 1702128677, 1),
(3, '2023-06-26-182329', 'App\\Database\\Migrations\\Berita', 'default', 'App', 1702128677, 1),
(4, '2023-07-02-190013', 'App\\Database\\Migrations\\Warga', 'default', 'App', 1702128677, 1),
(5, '2023-07-02-190642', 'App\\Database\\Migrations\\SPermohonanKk', 'default', 'App', 1702128677, 1),
(6, '2023-07-03-110427', 'App\\Database\\Migrations\\SKeterangan', 'default', 'App', 1702128677, 1),
(7, '2023-07-11-003016', 'App\\Database\\Migrations\\SKelahiran', 'default', 'App', 1702128677, 1),
(8, '2023-07-11-012241', 'App\\Database\\Migrations\\SKematian', 'default', 'App', 1702128677, 1),
(9, '2023-07-16-070649', 'App\\Database\\Migrations\\SWaris', 'default', 'App', 1702128677, 1),
(10, '2023-08-07-023221', 'App\\Database\\Migrations\\SPengantar', 'default', 'App', 1702128677, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) UNSIGNED NOT NULL,
  `nama` varchar(125) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `updated_date` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_s_kelahiran`
--

CREATE TABLE `tb_s_kelahiran` (
  `id` bigint(11) UNSIGNED NOT NULL,
  `nik` bigint(25) UNSIGNED NOT NULL,
  `jenis_surat` varchar(255) NOT NULL,
  `keperluan` varchar(255) NOT NULL,
  `pengambilan` varchar(25) DEFAULT NULL,
  `identitas` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `nama_ayah` varchar(125) NOT NULL,
  `nama_ibu` varchar(125) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `updated_date` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_s_kematian`
--

CREATE TABLE `tb_s_kematian` (
  `id` bigint(11) UNSIGNED NOT NULL,
  `nik` bigint(25) UNSIGNED NOT NULL,
  `jenis_surat` varchar(255) NOT NULL,
  `keperluan` varchar(255) NOT NULL,
  `pengambilan` varchar(25) DEFAULT NULL,
  `identitas` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `nama_meninggal` varchar(155) NOT NULL,
  `tgl_kelahiran` date DEFAULT NULL,
  `tgl_meninggal` date DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `umur` varchar(11) NOT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `updated_date` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_s_keterangan`
--

CREATE TABLE `tb_s_keterangan` (
  `id` bigint(11) UNSIGNED NOT NULL,
  `nik` bigint(25) UNSIGNED NOT NULL,
  `jenis_surat` varchar(255) NOT NULL,
  `keperluan` varchar(255) NOT NULL,
  `pengambilan` varchar(25) DEFAULT NULL,
  `identitas` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `mulai` date DEFAULT NULL,
  `selesai` date DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `updated_date` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_s_pengantar`
--

CREATE TABLE `tb_s_pengantar` (
  `id` bigint(11) UNSIGNED NOT NULL,
  `nik` bigint(25) UNSIGNED NOT NULL,
  `jenis_surat` varchar(255) NOT NULL,
  `keperluan` varchar(255) NOT NULL,
  `pengambilan` varchar(25) DEFAULT NULL,
  `identitas` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `mulai` date DEFAULT NULL,
  `selesai` date DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `updated_date` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_s_permohonan`
--

CREATE TABLE `tb_s_permohonan` (
  `id` bigint(11) UNSIGNED NOT NULL,
  `nik` bigint(25) UNSIGNED NOT NULL,
  `jenis_surat` varchar(255) NOT NULL,
  `keperluan` varchar(255) NOT NULL,
  `pengambilan` varchar(25) DEFAULT NULL,
  `identitas` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `mulai` date DEFAULT NULL,
  `selesai` date DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `updated_date` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_s_waris`
--

CREATE TABLE `tb_s_waris` (
  `id` bigint(11) UNSIGNED NOT NULL,
  `nik` bigint(25) UNSIGNED NOT NULL,
  `nik_ahli_waris` bigint(25) UNSIGNED NOT NULL,
  `ns_waris` varchar(223) NOT NULL,
  `slug` varchar(123) NOT NULL,
  `jenis_surat` varchar(255) NOT NULL,
  `keperluan` varchar(255) NOT NULL,
  `pengambilan` varchar(25) DEFAULT NULL,
  `identitas` varchar(25) NOT NULL,
  `status` varchar(255) NOT NULL,
  `nama_ahli_waris` varchar(155) NOT NULL,
  `tempat_lahir_ahli_waris` varchar(125) NOT NULL,
  `tgl_lahir_ahli_waris` date DEFAULT NULL,
  `umur` int(12) DEFAULT NULL,
  `hubungan_keluarga` varchar(25) NOT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `updated_date` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_warga`
--

CREATE TABLE `tb_warga` (
  `nik` bigint(25) UNSIGNED NOT NULL,
  `nama` varchar(125) NOT NULL,
  `no_kk` bigint(25) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `tempat_lahir` varchar(125) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(25) NOT NULL,
  `agama` varchar(25) NOT NULL,
  `kewarganegaraan` varchar(125) NOT NULL,
  `status_perkawinan` varchar(25) NOT NULL,
  `pekerjaan` varchar(25) DEFAULT NULL,
  `alamat` text NOT NULL,
  `email` varchar(125) NOT NULL,
  `telepon` varchar(25) DEFAULT NULL,
  `identitas` varchar(255) NOT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `updated_date` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) UNSIGNED NOT NULL,
  `nipd` bigint(16) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(25) NOT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `updated_date` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nipd`, `nama`, `email`, `password`, `role`, `created_date`, `updated_date`) VALUES
(1, 3522122211980002, '', 'emdehateam@gmail.com', '$2y$10$QYYLuptm7rywY2a8ep4xiudQtGnGJbeOG0kv1IWtquQYOB/s1JWDa', 'admin', '2023-12-09 20:33:12', '2023-12-09 20:33:12'),
(2, 3522122211980003, '', 'emdeha@gmail.com', '$2y$10$tuGf9gjN//bxYXwfXZM3/eOR/2pxe6zf6Kb3vZtbTmORDZbiINdIi', 'admin', '2023-12-23 01:31:16', '2023-12-23 01:31:16');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `tb_s_kelahiran`
--
ALTER TABLE `tb_s_kelahiran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_s_kelahiran_nik_foreign` (`nik`);

--
-- Indeks untuk tabel `tb_s_kematian`
--
ALTER TABLE `tb_s_kematian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_s_kematian_nik_foreign` (`nik`);

--
-- Indeks untuk tabel `tb_s_keterangan`
--
ALTER TABLE `tb_s_keterangan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_s_keterangan_nik_foreign` (`nik`);

--
-- Indeks untuk tabel `tb_s_pengantar`
--
ALTER TABLE `tb_s_pengantar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_s_pengantar_nik_foreign` (`nik`);

--
-- Indeks untuk tabel `tb_s_permohonan`
--
ALTER TABLE `tb_s_permohonan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_s_permohonan_nik_foreign` (`nik`);

--
-- Indeks untuk tabel `tb_s_waris`
--
ALTER TABLE `tb_s_waris`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_s_waris_nik_foreign` (`nik`);

--
-- Indeks untuk tabel `tb_warga`
--
ALTER TABLE `tb_warga`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_s_kelahiran`
--
ALTER TABLE `tb_s_kelahiran`
  MODIFY `id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_s_kematian`
--
ALTER TABLE `tb_s_kematian`
  MODIFY `id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_s_keterangan`
--
ALTER TABLE `tb_s_keterangan`
  MODIFY `id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_s_pengantar`
--
ALTER TABLE `tb_s_pengantar`
  MODIFY `id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_s_permohonan`
--
ALTER TABLE `tb_s_permohonan`
  MODIFY `id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_s_waris`
--
ALTER TABLE `tb_s_waris`
  MODIFY `id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_s_kelahiran`
--
ALTER TABLE `tb_s_kelahiran`
  ADD CONSTRAINT `tb_s_kelahiran_nik_foreign` FOREIGN KEY (`nik`) REFERENCES `tb_warga` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_s_kematian`
--
ALTER TABLE `tb_s_kematian`
  ADD CONSTRAINT `tb_s_kematian_nik_foreign` FOREIGN KEY (`nik`) REFERENCES `tb_warga` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_s_keterangan`
--
ALTER TABLE `tb_s_keterangan`
  ADD CONSTRAINT `tb_s_keterangan_nik_foreign` FOREIGN KEY (`nik`) REFERENCES `tb_warga` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_s_pengantar`
--
ALTER TABLE `tb_s_pengantar`
  ADD CONSTRAINT `tb_s_pengantar_nik_foreign` FOREIGN KEY (`nik`) REFERENCES `tb_warga` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_s_permohonan`
--
ALTER TABLE `tb_s_permohonan`
  ADD CONSTRAINT `tb_s_permohonan_nik_foreign` FOREIGN KEY (`nik`) REFERENCES `tb_warga` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_s_waris`
--
ALTER TABLE `tb_s_waris`
  ADD CONSTRAINT `tb_s_waris_nik_foreign` FOREIGN KEY (`nik`) REFERENCES `tb_warga` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
