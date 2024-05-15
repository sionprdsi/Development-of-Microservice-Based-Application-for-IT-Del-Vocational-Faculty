-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Waktu pembuatan: 15 Bulan Mei 2024 pada 16.43
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `micro_tentang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tentangs`
--

CREATE TABLE `tentangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sejarah` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `sejarah_foto` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visi` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `misi` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuan_foto` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `landasan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sasaran` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `makna` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tentangs`
--

INSERT INTO `tentangs` (`id`, `sejarah`, `sejarah_foto`, `visi`, `misi`, `tujuan_foto`, `landasan`, `sasaran`, `makna`, `created_at`, `updated_at`) VALUES
(1, 'Pendidikan VOKASI merupakan jenjang pendidikan pertama di Institut Teknologi Del sejak berdiri pada tahun 2001 (dahulu bernama Politeknik Informatika Del). Vokasi merupakan pendidikan tinggi dengan fokus pada praktik kerja yang dapat menunjang keahlian di bidang studi tertentu. Program vokasi bertujuan mempersiapkan lulusannya menjadi tenaga yang siap kerja dan mampu bersaing secara global di Dunia Usaha dan Dunia Industri (DUDI).\r\n\r\nFakultas Vokasi Institut Teknologi Del Di Institut Teknologi Del memiliki 3 program studi pada jenjang Diploma 3 (D3) dan Diploma 4 (D4):\r\n\r\nD4 (Sarjana Terapan) Teknologi Rekayasa Perangkat Lunak\r\nD3 Teknologi Informasi\r\nD3 Teknologi Komputer\r\nKetiga program studi vokasi di IT Del telah terakreditasi B dari BAN-PT.', 'public/tentang/kC2UbDYWDzZTqFe3M5tx8GraN5aI9bv8ZVUTVtvJ.webp', 'Menjadi lembaga pendidikan vokasi yang unggul dan berperan dalam pengembangan dan pemanfaatan teknologi yang mengintegrasikan dunia pendidikan dengan kebutuhan dunia usaha dan dunia industri akan tenaga profesional informatika dan komputer yang mampu bersaing secara global.', 'Menyelenggarakan proses pendidikan vokasi yang unggul, berkesinambungan, dan bermanfaat bagi masyarakat dalam lingkungan pendidikan yang kondusif, didukung dengan tenaga pendidik yang memiliki kompetensi pada bidang informatika dan komputer, serta melibatkan dunia usaha dan dunia industri dalam pengembangan kemampuan peserta didik. Melaksanakan kegiatan penelitian untuk mengembangkan, menciptakan, dan menyebarkan ilmu pengetahuan dan teknologi terapan pada bidang informatika dan komputer. Melaksanakan kegiatan pengabdian kepada masyarakat melalui diseminasi teknologi informatika dan komputer kepada masyarakat di berbagai bidang.', 'public/tentang/tIZ5hBI3pcHwZRf1vhar9v0c0Q6o3tTiR462rCgh.jpg', 'Terwujudnya lulusan yang mampu bersaing secara global dan berperilaku MarTuhan, Marroha, Marbisuk dalam disiplin ilmu informatika dan komputer.', 'Menghasilkan profesional unggul di bidang informatika dan komputer yang berperilaku MarTuhan, Marroha, Marbisuk yang mempunyai ciri-ciri utama beriman dan bertakwa kepada Tuhan Yang Maha Esa, bijak, ahli, terampil dalam bidangnya, berwawasan luas, memiliki sifat kepeloporan serta memiliki kesadaran dan tanggungjawab sosial.\r\nMenghasilkan karya ilmu pengetahuan dan teknologi terapan yang berorientasi pada perkembangan keilmuan, pembelajaran dan pemanfaatan di masyarakat.\r\nMenghasilkan karya pengabdian dan inovasi yang membawa kesejahteraan bagi masyarakat.', 'DEL bermakna sebagai “Selangkah Lebih Maju” dalam karsa dan karya.', '2024-05-09 13:06:51', '2024-05-09 14:04:49');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
