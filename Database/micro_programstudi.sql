-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Waktu pembuatan: 11 Bulan Mei 2024 pada 11.52
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
-- Database: `micro_programstudi`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `prodis`
--
USE micro_programstudi
DROP TABLE prodis
CREATE TABLE `prodis` (
  `id` BIGINT(20) UNSIGNED NOT NULL,
  `nama` VARCHAR(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` VARCHAR(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `judul` VARCHAR(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subjudul` VARCHAR(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` TEXT COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sejarah` LONGTEXT COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visi` LONGTEXT COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `misi` LONGTEXT COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lulusan` LONGTEXT COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kurikulum` LONGTEXT COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `teks_dosen` LONGTEXT COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `prodis`
--

INSERT INTO `prodis` (`id`, `nama`, `slug`, `judul`, `subjudul`, `foto`, `sejarah`, `visi`, `misi`, `lulusan`, `kurikulum`, `teks_dosen`, `created_at`, `updated_at`) VALUES
(1, 'Sarjana Terapan (D4) Teknologi Rekayasa Perangkat Lunak', 'd4trpl', 'Sarjana Terapan (D-4) Teknologi Rekayasa Perangkat Lunak', 'd4trpl', 'ufMFASapt4ry65YwzyLyuKLvtRfBEj84whQDba9y.jpg', 'Sarjana Terapan (Diploma 4) Teknologi Rekayasa Perangkat Lunak (Sarjana Terapan TRPL) merupakan program studi pada pendidikan vokasi. Diploma 4 (D4) adalah nama lain dari Sarjana Terapan. Program studi Sarjana Terapan TRPL berdiri pada tahun 2012 sesuai dengan SK Menteri Pendidikan dan Kebudayaan Republik Indonesia No. 238/E/O/2012 pada tanggal 6 Juli 2012 dengan nama Sarjana Terapan (DIV) Teknik Informatika. Perubahan nama dari program studi DIV Teknik Informatika menjadi DIV Teknologi Rekayasa Perangkat Lunak adalah mengikuti nomenklatur Program Studi sesuai Keputusan Menteri Riset, Teknologi, dan Pendidikan Tinggi Republik Indonesia Nomor 57/M/KPT/2019.\r\n\r\nSarjana Terapan merupakan jenjang pendidikan diploma yang setara dengan jenjang sarjana. Sarjana terapan adalah pendidikan vokasi sedangkan sarjana (S1) adalah pendidikan akademik. Bobot keilmuan D4 sama dengan S1 sehingga disebut setara. Perbedaan keduanya adalah pada komposisi mata kuliah.\r\n\r\nKuliah di jenjang D4 mengedepankan kemampuan praktik yang dibutuhkan di dunia kerja, sekaligus pengetahuan ilmu yang lebih lengkap dibanding jenjang diploma dibawah D4. Mata kuliah D4 mengutamakan 60% praktik dan 40% teori, berbeda dengan S1 bertitik berat pada teori dibandingkan praktik. Jika lebih senang terjun ke lapangan untuk memecahkan masalah, jenjang D4 menjadi pilihan yang sangat tepat.\r\n\r\nKarena bobot perkuliahan yang sama dengan S1, maka mahasiswa jenjang D4 bisa langsung melanjutkan studi ke jenjang S2. Bobot perkuliahan D4 dan S1 adalah minimum 144 SKS. Jadi, lulusan D4 tidak perlu melanjutkan pendidikan ekstensi terlebih dahulu. D4 (Sarjana Terapan) dan S1 (Sarjana) memiliki peluang kerja yang sama dengan keunggulan masing-masing. Bahkan untuk seleksi CPNS dan pegawai BUMN juga sudah menerima mahasiswa lulusan D4. Program D4 bersinergi erat dengan industri, maka kurikulum pendidikannya dirancang bersama industri, sehingga lulusan D4 menjadi ahli yang siap terjun dan bekerja di industri.', 'Menjadikan Program Studi Teknologi Rekayasa Perangkat Lunak Program Sarjana Terapan sebagai batu loncatan menuju masa depan Teknologi Informasi yang mengintegrasikan dunia pendidikan dengan kebutuhan usaha akan tenaga profesional informatika yang mampu bersaing secara global.', 'Menyelenggarakan pendidikan vokasional yang mendidik dan menghasilkan sumber daya manusia yang mempunyai sikap memimpin, penuh kreativitas, berdisiplin tinggi, dan mampu memberikan solusi di bidang Teknologi Informasi secara global\r\nMembuat terobosan dalam dunia pendidikan dengan menciptakan lingkungan pendidikan yang sehat, kondusif dengan dukungan tenaga pengajar yang ahli dan profesional.\r\nMenyelenggarakan program penelitian yang menghasilkan produk teknologi informasi yang memberikan solusi tepat guna dan inovatif untuk diterapkan di berbagai bidang kehidupan masyarakat.\r\nMenyelenggarakan proses pengabdian kepada masyarakat di dunia teknologi informasi melalui berbagai program diseminasi teknologi informasi terhadap masyarakat di berbagai bidang.', 'Software Developer\r\nSoftware developer adalah seseorang yang terlibat dalam fase-fase pengembangan perangkat lunak yang meliputi penggalian kebutuhan, analisis, perancangan, pemrograman, dan pengujian perangkat lunak.\r\n\r\nSoftware Quality Assurance\r\nSoftware quality assurance adalah seorang praktisi yang bekerja untuk memastikan kualitas dari perangkat lunak.\r\n\r\nIT Researcher\r\nIT Researcher adalah lulusan informatika dapat bekerja sebagai peneliti di bidangnya.\r\n\r\nIT preneur\r\nITpreneur adalah seseorang yang memiliki usaha di bidang teknologi.', 'Program studi Sarjana Terapan TRPL menggunakan irisan Body Of Knowledge (BOK) dari bidang studi Computer Science (CS) dan Software Engineering (SE) dengan area pengetahuan yang didetilkan pada dokumen Software Engineering Body Of Knowledge (SWEBOK). Cakupan ilmu yang diajarkan pada program studi Sarjana Terapan TRPL untuk mempersiapkan mahasiswa untuk menghasilkan perangkat lunak secara khusus yang berbasis web dan mobile dengan kompleksitas baik yang untuk skala kecil maupun yang kompleks. Struktur Matakuliah ditampilkan pada tabel di bawah ini.\r\n\r\nSemester I', 'Dosen pengajar di program studi Sarjana Terapan TRPL adalah lulusan universitas terbaik di dalam dan luar negeri, dengan keahlian di bidang software development, software quality assurance, UI/UX, database, machine learning.', '2024-05-10 03:19:16', '2024-05-09 21:20:47'),
(2, 'Diploma Tiga (D-3) Teknologi Komputer', 'd3tk', 'Diploma Tiga (D-3) Teknologi Komputer', 'd3tk', 'dENUELfacTvSwkte5DgxyBT2Bi8eynPAWbw0LTgB.jpg', 'Program Studi Teknik Komputer adalah salah satu program studi yang diselenggarakan Institut Teknologi Del yang terletak di daerah pedesaan Tobasa, yang membuka peluang bagi siswa berprestasi untuk mengenyam pendidikan dengan mutu yang tidak kalah dengan pendidikan bermutu bagus yang diselenggarakan di kota besar.', 'Menjadi program studi unggulan pada program pendidikan dan penelitian terapan di bidang pengembangan teknologi informasi yang bertaraf nasional dan internasional pada tahun 2024.', 'Menyelenggarakan pendidikan vokasi yang unggul untuk menghasilkan sumber daya manusia yang profesional di bidang teknologi informasi dan komunikasi;\r\nMeningkatkan program penelitian terapan yang inovatif dan bertaraf nasional maupun internasional di bidang teknologi informasi dan komunikasi;.\r\nMeningkatkan program pengabdian masyarakat melalui kerjasama dengan berbagai institusi pemerintahan dan industri di tingkat regional maupun nasional.', 'Pengelola Sistem Komputer\r\nPengelola sistem yang mengembangkan, mengontrol, memelihara, dan mendukung kinerja dan keamanan optimal dari sistem teknologi informasi.\r\n\r\nTenaga Profesional Jaringan Komputer\r\nTenaga profesional jaringan komputer yang mengembangkan, mengelola, memelihara, dan mengkonfigurasi perangkat keras dan perangkat lunak jaringan, serta memonitor, memecahkan masalah dan mengoptimalkan kinerja.\r\n\r\nComputer Technical Support Specialist\r\nPengelola komputer yang menyediakan bantuan dan petunjuk teknis untuk menyelesaikan persoalan pada perangkat keras, perangkat lunak, dan sistem kepada pengguna komputer.\r\n\r\nPengelola Sistem Komputasi Awan\r\nPengelola sistem komputasi awan yang membangun dan mengelola virtualisasi pada level infrastruktur untuk menyediakan layanan pada komputasi awan.', 'Program studi Sarjana Terapan TRPL menggunakan irisan Body Of Knowledge (BOK) dari bidang studi Computer Science (CS) dan Software Engineering (SE) dengan area pengetahuan yang didetilkan pada dokumen Software Engineering Body Of Knowledge (SWEBOK). Cakupan ilmu yang diajarkan pada program studi Sarjana Terapan TRPL untuk mempersiapkan mahasiswa untuk menghasilkan perangkat lunak secara khusus yang berbasis web dan mobile dengan kompleksitas baik yang untuk skala kecil maupun yang kompleks. Struktur Matakuliah ditampilkan pada tabel di bawah ini.', 'Diploma Tiga (D-3) Teknologi Komputer', '2024-05-10 03:19:16', '2024-05-10 09:21:56'),
(3, 'Diploma Tiga (D-3) Teknologi Informasi', 'd3ti', 'Diploma Tiga (D-3) Teknologi Informasi', 'd3ti', '7dTe4sJbPiDmiSZnifXBbus0xNmis5kuWGqomBD3.jpg', 'Program Studi Teknologi Informasi Diploma Tiga adalah salah satu dari 3 (tiga) program studi yang dikelola oleh Institut Teknologi Del (IT Del) yang berdiri pada tahun 2001 sesuai SK No. 222/D/O/2001 tertanggal 28 September 2001 dengan nama Program Studi Teknologi Informasi. Program studi ini berlokasi di Jl. Sisingamangaraja, Desa Sitoluama, Kecamatan Laguboti, Toba Samosir, Propinsi Sumatera Utara berjarak kurang lebih 200 km (lima jam perjalanan mobil) dari Medan sebagai Ibukota Propinsi Sumatera Utara. Desa Sitoluama adalah suatu desa kecil yang berada di tepi Danau Toba dan dilalui oleh jalan raya lintas propinsi dan berjarak sekitar 10 KM dari Balige sebagai ibukota Kabupaten Tobasa.\r\n\r\nProgram Studi Teknologi Informasi Diploma Tiga mempunyai sasaran untuk menyelenggarakan proses pembelajaran yang dapat menumbuhkan-kembangkan daya nalar, daya cipta, daya kreasi dan keterampilan yang tinggi, yang dapat dikomunikasikan dan diaplikasikan pada bidang kehidupan. Prodi ini memperoleh perpanjangan ijin penyelenggaraan Program Studi Teknologi Informasi Diploma Tiga (10802) sesuai dengan SK Direktur Jenderal Pendidikan Tinggi Nomor 3649/D/T/2004 tertanggal 9 September 2004. Kemudian pada tanggal 11 Oktober 2007 memperoleh SK perpanjangan ulang No. 3169/D/T/2007 dengan sebutan nama program studi adalah Program Studi Teknologi Informasi Diploma Tiga. Kemudian pada tanggal 3 Mei 2010 memperoleh SK perpanjangan ulang No. 1854/D/T/K-I/2010 dengan sebutan nama program studi kembali menjadi Program Studi Teknologi Informasi Diploma Tiga .', 'Menjadi program studi unggulan pada program pendidikan dan penelitian terapan di bidang pengembangan teknologi informasi yang bertaraf nasional dan internasional pada tahun 2024.', 'Menyelenggarakan pendidikan vokasi yang unggul untuk menghasilkan sumber daya manusia yang profesional di bidang teknologi informasi dan komunikasi;\r\n Membuat terobosan dalam dunia pendidikan dengan menciptakan lingkungan pendidikan yang sehat, kondusif dengan dukungan tenaga pengajar yang ahli dan profesional.\r\n Meningkatkan program penelitian terapan yang inovatif dan bertaraf nasional maupun internasional di bidang teknologi informasi dan komunikasi;\r\n Meningkatkan program pengabdian masyarakat melalui kerjasama dengan berbagai institusi pemerintahan dan industri di tingkat regional maupun nasional.', 'Software Engineer\r\nAnalyst Programmer\r\nWeb Application Developer\r\nIT Support Personnel\r\nMobile Application Developer', 'Program studi Sarjana Terapan TRPL menggunakan irisan Body Of Knowledge (BOK) dari bidang studi Computer Science (CS) dan Software Engineering (SE) dengan area pengetahuan yang didetilkan pada dokumen Software Engineering Body Of Knowledge (SWEBOK). Cakupan ilmu yang diajarkan pada program studi Sarjana Terapan TRPL untuk mempersiapkan mahasiswa untuk menghasilkan perangkat lunak secara khusus yang berbasis web dan mobile dengan kompleksitas baik yang untuk skala kecil maupun yang kompleks. Struktur Matakuliah ditampilkan pada tabel di bawah ini.', 'Diploma Tiga (D-3) Teknologi Informasi', '2024-05-10 09:17:36', '2024-05-10 09:22:09');

-- --------------------------------------------------------

--
-- Indeks untuk tabel `prodis`
--
ALTER TABLE `prodis`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel `prodis`
--
ALTER TABLE `prodis`
  MODIFY `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
