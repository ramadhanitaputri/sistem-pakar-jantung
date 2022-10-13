-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Okt 2022 pada 12.34
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jantung_cbr`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `analisa_hasil`
--

CREATE TABLE `analisa_hasil` (
  `id` int(4) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelamin` char(10) NOT NULL,
  `umur` varchar(3) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kd_penyakit` char(4) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `analisa_hasil`
--

INSERT INTO `analisa_hasil` (`id`, `nama`, `kelamin`, `umur`, `alamat`, `kd_penyakit`, `tanggal`) VALUES
(625, 'salma', 'Wanita', '21', 'solo', 'P002', '2022-10-13 19:27:55'),
(624, 'salma', 'Wanita', '21', 'solo', 'P004', '2022-10-13 19:27:55'),
(623, 'salma', 'Wanita', '21', 'solo', 'P002', '2022-10-13 19:27:55'),
(622, 'salma', 'Wanita', '21', 'solo', 'P004', '2022-10-13 19:27:55'),
(621, 'salma', 'Wanita', '21', 'solo', 'P002', '2022-10-13 19:27:55'),
(620, 'salma', 'Wanita', '21', 'solo', 'P004', '2022-10-13 19:27:55'),
(619, 'Sindi', 'Wanita', '20', 'Lamongan', 'P002', '2022-09-13 07:57:14'),
(618, 'Sindi', 'Wanita', '20', 'Lamongan', 'P004', '2022-09-13 07:57:14'),
(617, 'salim', 'Laki-laki', '35', 'surabaya', 'P002', '2022-06-08 21:48:35'),
(616, 'salim', 'Laki-laki', '35', 'surabaya', 'P004', '2022-06-08 21:48:35'),
(615, 'agus', 'Laki-laki', '35', 'lamongan', 'P002', '2022-06-08 14:08:00'),
(614, 'agus', 'Laki-laki', '35', 'lamongan', 'P001', '2022-06-08 14:08:00'),
(613, 'roki', 'Laki-laki', '22', 'blitar', 'P003', '2022-06-07 20:08:10'),
(612, 'roki', 'Laki-laki', '22', 'blitar', 'P001', '2022-06-07 20:08:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gejala`
--

CREATE TABLE `gejala` (
  `kd_gejala` char(4) NOT NULL,
  `gejala` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gejala`
--

INSERT INTO `gejala` (`kd_gejala`, `gejala`) VALUES
('G001', 'Dada terasa penuh'),
('G002', 'Detak jantung cepat (tachycardia)'),
('G003', 'Detak jantung lambat (bradycardia)'),
('G004', 'Nyeri pada dada'),
('G005', 'Panas'),
('G006', 'Sesak napas'),
('G008', 'katup jantung tidak bekerja dengan baik'),
('G009', 'bunyi jantung abnormal'),
('G010', 'kebocoran, penyempitan'),
('G011', 'Badan lesu atau lemah'),
('G013', 'Pusing'),
('G014', 'Pingsan (syncope)'),
('G015', 'katup jantung tanpa lubang'),
('G017', 'Sulit tidur karena gangguan rasa sakit pada daerah perut sebelah atas (ulu hati) '),
('G018', 'denyut nadi yang lemah dan cepat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `username` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyakit_solusi`
--

CREATE TABLE `penyakit_solusi` (
  `kd_penyakit` char(4) NOT NULL,
  `nama_penyakit` varchar(30) DEFAULT NULL,
  `definisi` text DEFAULT NULL,
  `solusi` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penyakit_solusi`
--

INSERT INTO `penyakit_solusi` (`kd_penyakit`, `nama_penyakit`, `definisi`, `solusi`) VALUES
('P001', 'Gagal Jantung', 'Gagal jantung atau Heart Failure adalah keadaan dimana jantung tidak bisa memasok aliran darah untuk memenuhi kebutuhan tubuh dan berpotensi mematikan.', 'Penyakit jantung jenis ini memiliki gejala antara lain pembengkakan pada kaki dan tangan, penambahan atau pengurangan berat badan sebelum terjadinya pembengkakan.'),
('P002', 'Heart Valve Disease', 'Heart Valve Disease atau masalah pada katup jantung adalah kedaan dimana salah satu atau lebih katub jantung tidak bekerja dengan baik. Dalam beberapa kasus, orang-orang terlahir dengan masalah pada katub jantung sedangkan beberapa orang mendapatkan  kelainan pada katub dimasa hidupnya.\r\nAda tiga jenis penyakit katup jantung yaitu kebocoran, penyempitan, dan katup tanpa lubang. Tidak ada obat untuk kelainan pada katub jantung kecuali operasi. Tetapi bagi anda yang tidak memiliki penyakit ini dari lahir,  menjaga pola makan dan pola hidup adalah kunci untuk terbebas dari penyakit ini.', '1.Tidur dengan mulut terbuka menyebabkan mulut kering di pagi hari. Sebisa mungkin bernapaslah dengan hidung ketika tidur.\r\n\r\n2. Menggunakan produk pencegah mulut kering. Untuk lebih aman, konsultasikan dengan dokter mengenai produk yang paling tepat.\r\n\r\n3. Menjaga kebersihan mulut. Sikat gigi dan berkumur secara teratur. Gunakan pula benang gigi (dental floss).\r\n\r\n4. Minum air sedikitnya 8 gelas per hari.\r\n\r\n5. Hindari konsumsi kafein dan alkohol'),
('P003', 'Aritmia', 'Jenis penyakit jantung ini adalah menggangu yakni gangguan irama atau detak jantung. Detak jantung bisa lebih cepat, lebih lambat, atau tidak teratur. Faktor utama penyakit aritmia adalah kurangnya kalsium dalam tubuh dan terjadinya penyumbatan pembuluh darah jantung.\r\nPenyumbatan pembuluh darah jantung yang juga berefek pada detak jantung yang tidak normal akan berakibat pada serangan jantung. Selain dua hal tersebut penyebab aritmia lainnya adalah diabetes, tekanan darah tinggi, merokok, kafein, stress, kematian otot jantung, penyalahgunaan obat, dan terlalu aktifnya kelenjar thyroid.\r\n', 'Makan secara teratur sangat dianjurkan untuk mengurangi resiko  timbulnya tukak lambung.'),
('P004', 'Perikarditis', 'Jenis penyakit jantung ini adalah peradangan pada kantung jantung atau pericardium sehingga menimbulkan penimbunan cairan dan penebalan. Perdangan ini disebabkan oleh beberapa hal, penyebab yang umum adalah infeksi virus dan terapi penyinaran untuk kanker payudara.', 'segera lakukan pembedahan untuk mencegah terjadinya ruptur (peca)dan Pembedahan yang segera dilakukan bisa mengurangi angka kematian pada apendisitis.'),
('P005', 'Penyakit Jantung Koroner', 'Penyakit jantung coroner disebabkan oleh lapisan lemak atau kolesterol di dinding nadi yang menyumbat pembuluh darah. Akibatnya dari penyumbatan oleh lapisan lemak dan kolesterol ini adalah terganggunya proses suplai darah dari dan ke  jantung. Ketika darah tersumbat akibat lapisan lemak maka inilah yang disebut serangan jantung. Lapisan lemak dan kolesterol di dinding nadi diakibatkan oleh kecanduan rokok, hipertensi, dan kolesterol tinggi.', '1. Menerapkan perilaku hidup sehat dengan mencuci tangan memakai sabun terutama setelah kontak dengan benda-benda kotor. \r\n2. Meningkatkan kebersihan lingkungan dan pemberian gizi yang seimbang. \r\n3. Menjaga kebersihan dari makanan atau minuman yang Anda makan.\r\n4. untuk pengobatannya pun anda dapat menkonsumsi obat-obat tradisional seperti jus kulit mangis, dan daun sirsak. Atau anda langsung berobat ke dokter.'),
('P006', 'Konstipasi', 'Konstipasi atau sembelit terjadi akibat penyerapan air yang berlebihan pada sisa makanan di dalam usus besar. Akibatnya feses menjadi sangat padat dan mengeras sehingga sulit dikeluarkan.', 'Untuk  mencegah sembelit dianjurkan untuk perbanyak mengkonsumsi makanan yang berserat, kurangi makan daging, buang air besar secara teratur setiap hari dan perbanyak makan sayur dan buah-buahan serta minum air putih.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `relasi`
--

CREATE TABLE `relasi` (
  `id_relasi` int(4) NOT NULL,
  `kd_gejala` char(4) NOT NULL,
  `kd_penyakit` char(4) NOT NULL,
  `bobot` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `relasi`
--

INSERT INTO `relasi` (`id_relasi`, `kd_gejala`, `kd_penyakit`, `bobot`) VALUES
(1, 'G008', 'P002', 5),
(2, 'G018', 'P001', 5),
(3, 'G013', 'P001', 1),
(4, 'G009', 'P001', 3),
(5, 'G010', 'P002', 3),
(6, 'G015', 'P002', 5),
(8, 'G001', 'P003', 1),
(9, 'G002', 'P003', 1),
(10, 'G003', 'P003', 5),
(11, 'G004', 'P003', 5),
(12, 'G006', 'P003', 1),
(13, 'G013', 'P003', 3),
(14, 'G014', 'P003', 5),
(18, 'G005', 'P004', 1),
(19, 'G006', 'P004', 5),
(20, 'G009', 'P004', 1),
(21, 'G007', 'P005', 5),
(22, 'G020', 'P005', 5),
(23, 'G011', 'P005', 1),
(24, 'G012', 'P005', 1),
(25, 'G013', 'P005', 1),
(26, 'G021', 'P006', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmp_analisa`
--

CREATE TABLE `tmp_analisa` (
  `noip` varchar(30) NOT NULL,
  `kd_penyakit` char(4) NOT NULL,
  `kd_gejala` char(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmp_gejala`
--

CREATE TABLE `tmp_gejala` (
  `noip` int(3) NOT NULL,
  `kd_gejala` char(4) NOT NULL,
  `bobot` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmp_pasien`
--

CREATE TABLE `tmp_pasien` (
  `id` int(4) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelamin` char(10) NOT NULL,
  `umur` varchar(3) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `noip` varchar(30) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tmp_pasien`
--

INSERT INTO `tmp_pasien` (`id`, `nama`, `kelamin`, `umur`, `alamat`, `noip`, `tanggal`) VALUES
(110, 'salma', 'Wanita', '21', 'solo', '::1', '2022-10-13 19:27:55'),
(107, 'agus', 'Laki-laki', '35', 'lamongan', '127.0.0.1', '2022-06-08 14:08:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmp_penyakit`
--

CREATE TABLE `tmp_penyakit` (
  `noip` varchar(30) NOT NULL,
  `kd_penyakit` char(4) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tmp_penyakit`
--

INSERT INTO `tmp_penyakit` (`noip`, `kd_penyakit`, `nilai`) VALUES
('', 'P001', 0),
('', 'P002', 0),
('', 'P003', 0),
('', 'P004', 0),
('', 'P005', 0),
('', 'P006', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `analisa_hasil`
--
ALTER TABLE `analisa_hasil`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`kd_gejala`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `penyakit_solusi`
--
ALTER TABLE `penyakit_solusi`
  ADD PRIMARY KEY (`kd_penyakit`);

--
-- Indeks untuk tabel `relasi`
--
ALTER TABLE `relasi`
  ADD PRIMARY KEY (`id_relasi`);

--
-- Indeks untuk tabel `tmp_analisa`
--
ALTER TABLE `tmp_analisa`
  ADD PRIMARY KEY (`noip`);

--
-- Indeks untuk tabel `tmp_gejala`
--
ALTER TABLE `tmp_gejala`
  ADD PRIMARY KEY (`noip`);

--
-- Indeks untuk tabel `tmp_pasien`
--
ALTER TABLE `tmp_pasien`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `analisa_hasil`
--
ALTER TABLE `analisa_hasil`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=626;

--
-- AUTO_INCREMENT untuk tabel `relasi`
--
ALTER TABLE `relasi`
  MODIFY `id_relasi` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `tmp_gejala`
--
ALTER TABLE `tmp_gejala`
  MODIFY `noip` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130938;

--
-- AUTO_INCREMENT untuk tabel `tmp_pasien`
--
ALTER TABLE `tmp_pasien`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
