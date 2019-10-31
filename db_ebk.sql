-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Okt 2019 pada 03.22
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ebk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggaran`
--

CREATE TABLE `pelanggaran` (
  `id_pelanggaran` int(11) NOT NULL,
  `nama_pelanggaran` text NOT NULL,
  `skor_pelanggaran` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggaran`
--

INSERT INTO `pelanggaran` (`id_pelanggaran`, `nama_pelanggaran`, `skor_pelanggaran`) VALUES
(23, 'Tidak memakai atribut seragam sekolah SMK Negeri 5 Kendal ( dihitung per atribut )', '5'),
(24, 'Membuang sampah tidak pada tempatnya', '10'),
(25, 'Memakai Badge / lokasi tidak dijahit', '10'),
(26, 'Memakai baju tidak dimasukkan / memakai jaket dilingkungan sekolah', '10'),
(27, 'Memakai kaos kaki tidak putih selain hari jumat  dan sabtu', '10'),
(28, 'Tidak memakai sepatu sesuai ketentuan sekolah', '10'),
(29, 'Tidak memakai topi OSIS pada hari Senin dan Upacara', '10'),
(30, 'Tidak memakai kaos kaki / memakai kaos kaki tidak ada 10 cm di atas mata kaki', '10'),
(31, 'Terlambat masuk ke halaman sekolah   setelah bel berbunyi', '10'),
(32, 'Terlambat masuk kelas saat pergantian pelajaran', '10'),
(33, 'Tidak memakai seragam sekolah sesuai ketentuan  sekolah', '10'),
(34, 'Memakai kalung, cincin, gelang ( bagi peserta didik laki- laki ).', '10'),
(35, 'Makan di dalam kelas / jajan di kantin sekolah pada saat jam pelajaran sekolah tanpa ijin', '10'),
(36, 'Mengendarai motor tidak standar dilingkungan sekolah  dan knalpot suara keras', '10'),
(37, 'Menimbulkan kegaduhan pada saat upacara atau di lingkungan sekolah', '10'),
(38, 'Jajan di luar sekolah saat jam pelajaran maupun istirahat', '10'),
(39, 'Bagi peserta didik perempuan memakai aksesoris tambahan', '10'),
(40, 'Tidak memakai kerudung sesuai ketentuan sekolah ( bagi yang berkerudung)', '10'),
(41, 'Tidak memakai pakaian olah raga pada saat pelajaran olah raga dan senam sesuai dengan angkatan kelas', '15'),
(42, 'Tidak memakai pakaian praktek saat praktek', '15'),
(43, 'Berbicara jorok dan kotor ( tidak sopan )', '15'),
(44, 'Mencorat coret tembok , meja dan kursi di lingkungan sekolah', '15'),
(45, 'Tidak mengikuti upacara tanpa ijin', '20'),
(46, 'Tidak mengikuti senam tanpa ijin', '20'),
(47, 'Tidak  berangkat pramuka tanpa ijin (khusus kelas X)', '20'),
(48, 'Masuk sekolah lewat belakang ( tidak dari pintu gerbang depan)', '20'),
(49, 'Tidak masuk sekolah tanpa keterangan / ijin', '20'),
(50, 'Tidak mengikuti kegiatan yang diwajibkan sekolah tanpa alasan/ ijin', '20'),
(51, 'Siswa pria berambut gondrong ( menutup alis, telinga dan krah baju ) dan tidak sesuai dengan profil.', '20'),
(52, 'Ijin ke belakang saat pelajaran tetapi tidak ke belakang melainkan ke lain tempat ( menipu )', '20'),
(53, 'Meninggalkan / keluar sekolah tanpa ijin selama pelajaran ', '20'),
(54, 'Merusak alat belajar / lingkungan dengan sengaja/ melompat pagar sekolah', '25'),
(55, 'Memalsukan tanda tangan di surat dari atau untuk orang tua / wali murid ', '30'),
(56, 'Mode berlebihan (  rambut dikliwir, dicat, make up menor )', '50'),
(57, 'Menggunakan HP/gadget/smart phone tanpa seijin guru mata pelajaran', '50'),
(58, 'Pacaran disekolah secara berlebihan', '50'),
(59, 'Membawa dan atau merokok di lingkungan sekolah dan luar sekolah', '75'),
(60, 'Tidak mentaati tata tertib di industri selama prakerin ( selain kriminal )', '75'),
(61, 'Membawa senjata tajam', '100'),
(62, 'Tidak sopan / menghina / mengancam guru dan karyawan', '150'),
(63, 'Menyembunyikan, menutupi, membantu kejahatan / penipuan teman lain', '150'),
(64, 'Judi / tekpol di lingkungan sekolah', '150'),
(65, 'Membuat, mengupload dan menyebarkan berita hoax tentang sekolah', '150'),
(66, 'Bertato dan bertindik ', '150'),
(67, 'Membawa, menyimpan tulisan, buku, gambar/film  porno', '150'),
(68, 'Melakukan pemalakan / perampasan / pencurian kecil - kecilan ', '150'),
(69, 'Berkelahi dengan teman sekolah', '150'),
(70, 'Berkelahi dengan teman luar sekolah sekolah', '150'),
(71, 'Mencemarkan nama baik sekolah', '200'),
(72, 'Menulis kata-kata kotor, mengupload foto/vedeo tidak senonoh di media sosial', '200'),
(73, 'Memalsukan tanda tangan dan dokumen sekolah', '250'),
(74, 'Menganiaya guru dan karyawan', '300'),
(75, 'Mencuri / menjambret / merampok (kasus hukum)', '300'),
(76, 'Membawa, meminum minuman keras, mengedarkan obat - obatan terlarang / narkoba', '300'),
(77, 'Membuat,memperbanyak,menyebarluaskan pornografi', '350'),
(78, 'Melakukan tindakan asusila (persetubuhan, Menghamili orang / dihamili orang)', '400');

-- --------------------------------------------------------

--
-- Struktur dari tabel `review_pelanggaran`
--

CREATE TABLE `review_pelanggaran` (
  `id_review` int(11) NOT NULL,
  `siswa_id` varchar(10) NOT NULL,
  `pelanggaran_id` int(11) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `review_pelanggaran`
--

INSERT INTO `review_pelanggaran` (`id_review`, `siswa_id`, `pelanggaran_id`, `status`) VALUES
(5, 'siswa', 24, 'disetujui'),
(7, 'siswa', 24, 'disetujui'),
(8, 'siswa', 26, 'disetujui'),
(9, 'siswa', 31, 'disetujui');

-- --------------------------------------------------------

--
-- Struktur dari tabel `skor`
--

CREATE TABLE `skor` (
  `id_skor` int(11) NOT NULL,
  `siswa_id` varchar(10) NOT NULL,
  `jumlah_skor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `skor`
--

INSERT INTO `skor` (`id_skor`, `siswa_id`, `jumlah_skor`) VALUES
(2, 'siswa', 40);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'siswa', '$2y$10$kBE6My8.a0dhSwGjamLXD.a0.ClgexDNuuKEWI7M2r9ak5jXOicqa', 'siswa'),
(2, 'bk', '$2y$10$.XcxIuWXg7eNhbXnfJegyeCtgiy/IY3cDfmIK33xcLFCyogcW68le', 'bk'),
(3, 'ortu', '$2y$10$S/EK8Q/jiX43lvgIQ7sooeBUzsOktpRYNTDbbj0lDrCTylAU0NQUy', 'ortu');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pelanggaran`
--
ALTER TABLE `pelanggaran`
  ADD PRIMARY KEY (`id_pelanggaran`);

--
-- Indeks untuk tabel `review_pelanggaran`
--
ALTER TABLE `review_pelanggaran`
  ADD PRIMARY KEY (`id_review`);

--
-- Indeks untuk tabel `skor`
--
ALTER TABLE `skor`
  ADD PRIMARY KEY (`id_skor`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pelanggaran`
--
ALTER TABLE `pelanggaran`
  MODIFY `id_pelanggaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT untuk tabel `review_pelanggaran`
--
ALTER TABLE `review_pelanggaran`
  MODIFY `id_review` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `skor`
--
ALTER TABLE `skor`
  MODIFY `id_skor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
