-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Okt 2020 pada 16.33
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
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `administrator`
--

CREATE TABLE `administrator` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tgl_buat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `administrator`
--

INSERT INTO `administrator` (`id`, `email`, `username`, `password`, `nama`, `tgl_buat`, `foto`) VALUES
(1, 'wahyudev46@gmail.com', 'admin', 'admin', 'Wahyu Wibowo', '2019-10-22 02:33:59', 'default.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `kd_brg` varchar(128) NOT NULL,
  `nama_barang` varchar(128) NOT NULL,
  `bahan` varchar(128) NOT NULL,
  `warna` varchar(128) NOT NULL,
  `harga` int(30) NOT NULL,
  `keyword` varchar(128) NOT NULL,
  `kd_kategori` varchar(128) NOT NULL,
  `diskon` int(20) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`kd_brg`, `nama_barang`, `bahan`, `warna`, `harga`, `keyword`, `kd_kategori`, `diskon`, `foto`) VALUES
('BR000001', 'Mens Oxford Brogue', 'Kulit', 'Coklat', 300000, 'sepatu', 'CS', 20, 'Mens_Oxford_Brogue.jpg'),
('BR000002', 'Black Cap-Toe Oxfords', 'Kulit', 'Hitam', 250000, 'sepatu', 'CS', 20, 'Black_Cap-Toe_Oxfords.jpg'),
('BR000003', 'Brown Longwings', 'Kulit', 'Coklat', 350000, 'sepatu', 'CS', 0, 'Brown_Longwings.jpg'),
('BR000004', 'Wingtip Boot', 'Kulit', 'Coklat', 400000, 'sepatu', 'CS', 20, 'Wingtip_Boot.jpg'),
('BR000005', 'Chelsea Boots', 'Kulit', 'Hitam', 375000, 'sepatu', 'FM', 20, 'Chelsea_Boots.jpg'),
('BR000006', 'Chukka Boots', 'Kulit', 'Coklat', 390000, 'sepatu', 'FM', 20, 'Chukka_Boots.jpg'),
('BR000007', 'Monk Strap', 'Kulit', 'Coklat', 270000, 'sepatu', 'FM', 20, 'Monk_Strap.jpg'),
('BR000008', 'Derby Shoes', 'Kulit', 'Hitam', 310000, 'sepatu', 'FM', 20, 'Derby_Shoes.jpg'),
('BR000009', 'Adidas Football', 'Canvas', 'Hitam', 250000, 'Sepatu', 'SP', 20, 'Adidas_Football.jpg'),
('BR000010', 'Airwalk Sport', 'Canvas', 'Biru', 300000, 'sepatuu', 'SP', 20, 'Airwalk_Sport.jpg'),
('BR000011', 'Sepatu Bebas', 'Canvas', 'biru langit', 50000, 'sepatu', 'CS', 50, 'Nike_Zoom1.jpg'),
('BR000012', 'Sepatu Coklatt', 'Kulitt', 'Hitam', 250000, 'Sepatu', 'FM', 20, 'Mens_Oxford_Brogue1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `biaya_kirim`
--

CREATE TABLE `biaya_kirim` (
  `kd_bk` varchar(128) NOT NULL,
  `kd_kota` varchar(128) NOT NULL,
  `biaya_kirim` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `det_barang`
--

CREATE TABLE `det_barang` (
  `kd_brg` varchar(128) NOT NULL,
  `ukuran` int(30) NOT NULL,
  `berat` int(30) NOT NULL,
  `stok` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `det_barang`
--

INSERT INTO `det_barang` (`kd_brg`, `ukuran`, `berat`, `stok`) VALUES
('BR000001', 41, 300, 37),
('BR000002', 42, 300, 39),
('BR000003', 40, 300, 42),
('BR000004', 42, 300, 42),
('BR000005', 42, 300, 42),
('BR000006', 42, 300, 40),
('BR000007', 42, 300, 41),
('BR000008', 42, 300, 40),
('BR000009', 42, 300, 41),
('BR000010', 42, 300, 41),
('BR000011', 43, 5, 50),
('BR000012', 41, 12, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `det_retur`
--

CREATE TABLE `det_retur` (
  `kd_retur` varchar(128) NOT NULL,
  `kd_brg` varchar(128) NOT NULL,
  `ukuran` varchar(128) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `det_transaksi`
--

CREATE TABLE `det_transaksi` (
  `kd_trans` varchar(128) NOT NULL,
  `kd_brg` varchar(128) NOT NULL,
  `ukuran` varchar(128) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jasa_pengiriman`
--

CREATE TABLE `jasa_pengiriman` (
  `kd_jasa` varchar(128) NOT NULL,
  `nama_jasa` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `kd_kategori` varchar(128) NOT NULL,
  `nama_kategori` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kd_kategori`, `nama_kategori`) VALUES
('CS', 'Casual'),
('FM', 'Formal'),
('SP', 'Sport');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfirmasi_pembayaran`
--

CREATE TABLE `konfirmasi_pembayaran` (
  `kd_konfirmasi` varchar(128) NOT NULL,
  `tgl_konfirmasi` date NOT NULL,
  `kd_trans` varchar(128) NOT NULL,
  `kd_konsumen` varchar(128) NOT NULL,
  `no_rekening` int(11) NOT NULL,
  `nama_konsumen_bank` varchar(128) NOT NULL,
  `nominal` int(11) NOT NULL,
  `bank_tujuan` varchar(128) NOT NULL,
  `mata_uang` varchar(128) NOT NULL,
  `status` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsumen`
--

CREATE TABLE `konsumen` (
  `kd_konsumen` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_depan` varchar(128) NOT NULL,
  `nama_belakang` varchar(128) NOT NULL,
  `kd_prov` varchar(128) NOT NULL,
  `kd_kota` varchar(128) NOT NULL,
  `alamat` text NOT NULL,
  `kd_pos` varchar(128) NOT NULL,
  `telp` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konsumen`
--

INSERT INTO `konsumen` (`kd_konsumen`, `email`, `password`, `nama_depan`, `nama_belakang`, `kd_prov`, `kd_kota`, `alamat`, `kd_pos`, `telp`, `foto`) VALUES
('KS000005', 'wahyupratama181002@gmail.com', '$2y$10$GtT5Gkq2Lrs/UcKhwFTCT.OswT.znNnpCLfOfYYyE8S4DPTySvnLu', 'Wahyu', 'Wibowo', '11', '7', 'JL. Bouroq', '15121', 2147483647, 'Slide2.jpg'),
('KS000006', 'afauzann49@gmail.com', '$2y$10$f.71c.X4eNLRh/lNTR0PSeqLqvGg7P5CQcp19.Zsf1fDqAYY1Cwse', 'Ahmad', 'Fauzan', '11', '7', 'Jl. K.H. Hasyim asyari Neroktog Pinang', '15145', 2147483647, 'default.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

CREATE TABLE `kota` (
  `kd_kota` smallint(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `kd_prov` tinyint(4) NOT NULL,
  `biaya_kirim` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kota`
--

INSERT INTO `kota` (`kd_kota`, `nama_kota`, `kd_prov`, `biaya_kirim`) VALUES
(1, 'Kabupaten Aceh Barat', 1, 10000),
(2, 'Kabupaten Aceh Barat Daya', 1, 10000),
(3, 'Kabupaten Aceh Besar', 1, 10000),
(4, 'Kabupaten Aceh Jaya', 1, 10000),
(5, 'Kabupaten Aceh Selatan', 1, 10000),
(6, 'Kabupaten Aceh Singkil', 1, 10000),
(7, 'Kabupaten Aceh Tamiang', 1, 10000),
(8, 'Kabupaten Aceh Tengah', 1, 10000),
(9, 'Kabupaten Aceh Tenggara', 1, 10000),
(10, 'Kabupaten Aceh Timur', 1, 10000),
(11, 'Kabupaten Aceh Utara', 1, 10000),
(12, 'Kabupaten Bener Meriah', 1, 10000),
(13, 'Kabupaten Bireuen', 1, 10000),
(14, 'Kabupaten Gayo Lues', 1, 10000),
(15, 'Kabupaten Nagan Raya', 1, 10000),
(16, 'Kabupaten Pidie', 1, 10000),
(17, 'Kabupaten Pidie Jaya', 1, 10000),
(18, 'Kabupaten Simeulue', 1, 10000),
(19, 'Kota Banda Aceh', 1, 10000),
(20, 'Kota Langsa', 1, 10000),
(21, 'Kota Lhokseumawe', 1, 10000),
(22, 'Kota Sabang', 1, 10000),
(23, 'Kota Subulussalam', 1, 10000),
(1, 'Kabupaten Asahan', 2, 0),
(2, 'Kabupaten Batu Bara', 2, 0),
(3, 'Kabupaten Dairi', 2, 0),
(4, 'Kabupaten Deli Serdang', 2, 0),
(5, 'Kabupaten Humbang Hasundutan', 2, 0),
(6, 'Kabupaten Karo', 2, 0),
(7, 'Kabupaten Labuhanbatu', 2, 0),
(8, 'Kabupaten Labuhanbatu Selatan', 2, 0),
(9, 'Kabupaten Labuhanbatu Utara', 2, 0),
(10, 'Kabupaten Langkat', 2, 0),
(11, 'Kabupaten Mandailing Natal', 2, 0),
(12, 'Kabupaten Nias', 2, 0),
(13, 'Kabupaten Nias Barat', 2, 0),
(14, 'Kabupaten Nias Selatan', 2, 0),
(15, 'Kabupaten Nias Utara', 2, 0),
(16, 'Kabupaten Padang Lawas', 2, 0),
(17, 'Kabupaten Padang Lawas Utara', 2, 0),
(18, 'Kabupaten Pakpak Bharat', 2, 0),
(19, 'Kabupaten Samosir', 2, 0),
(20, 'Kabupaten Serdang Bedagai', 2, 0),
(21, 'Kabupaten Simalungun', 2, 0),
(22, 'Kabupaten Tapanuli Selatan', 2, 0),
(23, 'Kabupaten Tapanuli Tengah', 2, 0),
(24, 'Kabupaten Tapanuli Utara', 2, 0),
(25, 'Kabupaten Toba Samosir', 2, 0),
(26, 'Kota Binjai', 2, 0),
(27, 'Kota Gunung Sitoli', 2, 0),
(28, 'Kota Medan', 2, 0),
(29, 'Kota Padang Sidempuan', 2, 0),
(30, 'Kota Pematangsiantar', 2, 0),
(31, 'Kota Sibolga', 2, 0),
(32, 'Kota Tanjung Balai', 2, 0),
(33, 'Kota Tebing Tinggi', 2, 0),
(1, 'Kabupaten Bengkulu Selatan', 3, 0),
(2, 'Kabupaten Bengkulu Tengah', 3, 0),
(3, 'Kabupaten Bengkulu Utara', 3, 0),
(4, 'Kabupaten Benteng', 3, 0),
(5, 'Kabupaten Kaur', 3, 0),
(6, 'Kabupaten Kepahiang', 3, 0),
(7, 'Kabupaten Lebong', 3, 0),
(8, 'Kabupaten Mukomuko', 3, 0),
(9, 'Kabupaten Rejang Lebong', 3, 0),
(10, 'Kabupaten Seluma', 3, 0),
(11, 'Kota Bengkulu', 3, 0),
(1, 'Kabupaten Batang Hari', 4, 0),
(2, 'Kabupaten Bungo', 4, 0),
(3, 'Kabupaten Kerinci', 4, 0),
(4, 'Kabupaten Merangin', 4, 0),
(5, 'Kabupaten Muaro Jambi', 4, 0),
(6, 'Kabupaten Sarolangun', 4, 0),
(7, 'Kabupaten Tanjung Jabung Barat', 4, 0),
(8, 'Kabupaten Tanjung Jabung Timur', 4, 0),
(9, 'Kabupaten Tebo', 4, 0),
(10, 'Kota Jambi', 4, 0),
(11, 'Kota Sungai Penuh', 4, 0),
(1, 'Kabupaten Bengkalis', 5, 0),
(2, 'Kabupaten Indragiri Hilir', 5, 0),
(3, 'Kabupaten Indragiri Hulu', 5, 0),
(4, 'Kabupaten Kampar', 5, 0),
(5, 'Kabupaten Kuantan Singingi', 5, 0),
(6, 'Kabupaten Pelalawan', 5, 0),
(7, 'Kabupaten Rokan Hilir', 5, 0),
(8, 'Kabupaten Rokan Hulu', 5, 0),
(9, 'Kabupaten Siak', 5, 0),
(10, 'Kota Pekanbaru', 5, 0),
(11, 'Kota Dumai', 5, 0),
(12, 'Kabupaten Kepulauan Meranti', 5, 0),
(1, 'Kabupaten Agam', 6, 0),
(2, 'Kabupaten Dharmasraya', 6, 0),
(3, 'Kabupaten Kepulauan Mentawai', 6, 0),
(4, 'Kabupaten Lima Puluh Kota', 6, 0),
(5, 'Kabupaten Padang Pariaman', 6, 0),
(6, 'Kabupaten Pasaman', 6, 0),
(7, 'Kabupaten Pasaman Barat', 6, 0),
(8, 'Kabupaten Pesisir Selatan', 6, 0),
(9, 'Kabupaten Sijunjung', 6, 0),
(10, 'Kabupaten Solok', 6, 0),
(11, 'Kabupaten Solok Selatan', 6, 0),
(12, 'Kabupaten Tanah Datar', 6, 0),
(13, 'Kota Bukittinggi', 6, 0),
(14, 'Kota Padang', 6, 0),
(15, 'Kota Padangpanjang', 6, 0),
(16, 'Kota Pariaman', 6, 0),
(17, 'Kota Payakumbuh', 6, 0),
(18, 'Kota Sawahlunto', 6, 0),
(19, 'Kota Solok', 6, 0),
(1, 'Kabupaten Banyuasin', 7, 0),
(2, 'Kabupaten Empat Lawang', 7, 0),
(3, 'Kabupaten Lahat', 7, 0),
(4, 'Kabupaten Muara Enim', 7, 0),
(5, 'Kabupaten Musi Banyuasin', 7, 0),
(6, 'Kabupaten Musi Rawas', 7, 0),
(7, 'Kabupaten Ogan Ilir', 7, 0),
(8, 'Kabupaten Ogan Komering Ilir', 7, 0),
(9, 'Kabupaten Ogan Komering Ulu', 7, 0),
(10, 'Kabupaten Ogan Komering Ulu Selatan', 7, 0),
(11, 'Kabupaten Ogan Komering Ulu Timur', 7, 0),
(12, 'Kota Lubuklinggau', 7, 0),
(13, 'Kota Pagar Alam', 7, 0),
(14, 'Kota Palembang', 7, 0),
(15, 'Kota Prabumulih', 7, 0),
(1, 'Kabupaten Lampung Barat', 8, 0),
(2, 'Kabupaten Lampung Selatan', 8, 0),
(3, 'Kabupaten Lampung Tengah', 8, 0),
(4, 'Kabupaten Lampung Timur', 8, 0),
(5, 'Kabupaten Lampung Utara', 8, 0),
(6, 'Kabupaten Mesuji', 8, 0),
(7, 'Kabupaten Pesawaran', 8, 0),
(8, 'Kabupaten Pringsewu', 8, 0),
(9, 'Kabupaten Tanggamus', 8, 0),
(10, 'Kabupaten Tulang Bawang', 8, 0),
(11, 'Kabupaten Tulang Bawang Barat', 8, 0),
(12, 'Kabupaten Way Kanan', 8, 0),
(13, 'Kota Bandar Lampung', 8, 0),
(14, 'Kota Metro', 8, 0),
(1, 'Kabupaten Bangka', 9, 0),
(2, 'Kabupaten Bangka Barat', 9, 0),
(3, 'Kabupaten Bangka Selatan', 9, 0),
(4, 'Kabupaten Bangka Tengah', 9, 0),
(5, 'Kabupaten Belitung', 9, 0),
(6, 'Kabupaten Belitung Timur', 9, 0),
(7, 'Kota Pangkal Pinang', 9, 0),
(1, 'Kabupaten Bintan', 10, 0),
(2, 'Kabupaten Karimun', 10, 0),
(3, 'Kabupaten Kepulauan Anambas', 10, 0),
(4, 'Kabupaten Lingga', 10, 0),
(5, 'Kabupaten Natuna', 10, 0),
(6, 'Kota Batam', 10, 0),
(7, 'Kota Tanjung Pinang', 10, 0),
(1, 'Kabupaten Lebak', 11, 0),
(2, 'Kabupaten Pandeglang', 11, 0),
(3, 'Kabupaten Serang', 11, 0),
(4, 'Kabupaten Tangerang', 11, 0),
(5, 'Kota Cilegon', 11, 0),
(6, 'Kota Serang', 11, 0),
(7, 'Kota Tangerang', 11, 0),
(8, 'Kota Tangerang Selatan', 11, 0),
(1, 'Kabupaten Bandung', 12, 0),
(2, 'Kabupaten Bandung Barat', 12, 0),
(3, 'Kabupaten Bekasi', 12, 0),
(4, 'Kabupaten Bogor', 12, 0),
(5, 'Kabupaten Ciamis', 12, 0),
(6, 'Kabupaten Cianjur', 12, 0),
(7, 'Kabupaten Cirebon', 12, 0),
(8, 'Kabupaten Garut', 12, 0),
(9, 'Kabupaten Indramayu', 12, 0),
(10, 'Kabupaten Karawang', 12, 0),
(11, 'Kabupaten Kuningan', 12, 0),
(12, 'Kabupaten Majalengka', 12, 0),
(13, 'Kabupaten Purwakarta', 12, 0),
(14, 'Kabupaten Subang', 12, 0),
(15, 'Kabupaten Sukabumi', 12, 0),
(16, 'Kabupaten Sumedang', 12, 0),
(17, 'Kabupaten Tasikmalaya', 12, 0),
(18, 'Kota Bandung', 12, 0),
(19, 'Kota Banjar', 12, 0),
(20, 'Kota Bekasi', 12, 0),
(21, 'Kota Bogor', 12, 0),
(22, 'Kota Cimahi', 12, 0),
(23, 'Kota Cirebon', 12, 0),
(24, 'Kota Depok', 12, 0),
(25, 'Kota Sukabumi', 12, 0),
(26, 'Kota Tasikmalaya', 12, 0),
(1, 'Kabupaten Administrasi Kepulauan Seribu', 13, 0),
(2, 'Kota Administrasi Jakarta Barat', 13, 0),
(3, 'Kota Administrasi Jakarta Pusat', 13, 0),
(4, 'Kota Administrasi Jakarta Selatan', 13, 0),
(5, 'Kota Administrasi Jakarta Timur', 13, 0),
(6, 'Kota Administrasi Jakarta Utara', 13, 0),
(1, 'Kabupaten Banjarnegara', 14, 0),
(2, 'Kabupaten Banyumas', 14, 0),
(3, 'Kabupaten Batang', 14, 0),
(4, 'Kabupaten Blora', 14, 0),
(5, 'Kabupaten Boyolali', 14, 0),
(6, 'Kabupaten Brebes', 14, 0),
(7, 'Kabupaten Cilacap', 14, 0),
(8, 'Kabupaten Demak', 14, 0),
(9, 'Kabupaten Grobogan', 14, 0),
(10, 'Kabupaten Jepara', 14, 0),
(11, 'Kabupaten Karanganyar', 14, 0),
(12, 'Kabupaten Kebumen', 14, 0),
(13, 'Kabupaten Kendal', 14, 0),
(14, 'Kabupaten Klaten', 14, 0),
(15, 'Kabupaten Kudus', 14, 0),
(16, 'Kabupaten Magelang', 14, 0),
(17, 'Kabupaten Pati', 14, 0),
(18, 'Kabupaten Pekalongan', 14, 0),
(19, 'Kabupaten Pemalang', 14, 0),
(20, 'Kabupaten Purbalingga', 14, 0),
(21, 'Kabupaten Purworejo', 14, 0),
(22, 'Kabupaten Rembang', 14, 0),
(23, 'Kabupaten Semarang', 14, 0),
(24, 'Kabupaten Sragen', 14, 0),
(25, 'Kabupaten Sukoharjo', 14, 0),
(26, 'Kabupaten Tegal', 14, 0),
(27, 'Kabupaten Temanggung', 14, 0),
(28, 'Kabupaten Wonogiri', 14, 0),
(29, 'Kabupaten Wonosobo', 14, 0),
(30, 'Kota Magelang', 14, 0),
(31, 'Kota Pekalongan', 14, 0),
(32, 'Kota Salatiga', 14, 0),
(33, 'Kota Semarang', 14, 0),
(34, 'Kota Surakarta', 14, 0),
(35, 'Kota Tegal', 14, 0),
(1, 'Kabupaten Bangkalan', 15, 0),
(2, 'Kabupaten Banyuwangi', 15, 0),
(3, 'Kabupaten Blitar', 15, 0),
(4, 'Kabupaten Bojonegoro', 15, 0),
(5, 'Kabupaten Bondowoso', 15, 0),
(6, 'Kabupaten Gresik', 15, 0),
(7, 'Kabupaten Jember', 15, 0),
(8, 'Kabupaten Jombang', 15, 0),
(9, 'Kabupaten Kediri', 15, 0),
(10, 'Kabupaten Lamongan', 15, 0),
(11, 'Kabupaten Lumajang', 15, 0),
(12, 'Kabupaten Madiun', 15, 0),
(13, 'Kabupaten Magetan', 15, 0),
(14, 'Kabupaten Malang', 15, 0),
(15, 'Kabupaten Mojokerto', 15, 0),
(16, 'Kabupaten Nganjuk', 15, 0),
(17, 'Kabupaten Ngawi', 15, 0),
(18, 'Kabupaten Pacitan', 15, 0),
(19, 'Kabupaten Pamekasan', 15, 0),
(20, 'Kabupaten Pasuruan', 15, 0),
(21, 'Kabupaten Ponorogo', 15, 0),
(22, 'Kabupaten Probolinggo', 15, 0),
(23, 'Kabupaten Sampang', 15, 0),
(24, 'Kabupaten Sidoarjo', 15, 0),
(25, 'Kabupaten Situbondo', 15, 0),
(26, 'Kabupaten Sumenep', 15, 0),
(27, 'Kabupaten Trenggalek', 15, 0),
(28, 'Kabupaten Tuban', 15, 0),
(29, 'Kabupaten Tulungagung', 15, 0),
(30, 'Kota Batu', 15, 0),
(31, 'Kota Blitar', 15, 0),
(32, 'Kota Kediri', 15, 0),
(33, 'Kota Madiun', 15, 0),
(34, 'Kota Malang', 15, 0),
(35, 'Kota Mojokerto', 15, 0),
(36, 'Kota Pasuruan', 15, 0),
(37, 'Kota Probolinggo', 15, 0),
(38, 'Kota Surabaya', 15, 0),
(1, 'Kabupaten Bantul', 16, 0),
(2, 'Kabupaten Gunung Kidul', 16, 0),
(3, 'Kabupaten Kulon Progo', 16, 0),
(4, 'Kabupaten Sleman', 16, 0),
(5, 'Kota Yogyakarta', 16, 0),
(1, 'Kabupaten Badung', 17, 0),
(2, 'Kabupaten Bangli', 17, 0),
(3, 'Kabupaten Buleleng', 17, 0),
(4, 'Kabupaten Gianyar', 17, 0),
(5, 'Kabupaten Jembrana', 17, 0),
(6, 'Kabupaten Karangasem', 17, 0),
(7, 'Kabupaten Klungkung', 17, 0),
(8, 'Kabupaten Tabanan', 17, 0),
(9, 'Kota Denpasar', 17, 0),
(1, 'Kabupaten Bima', 18, 0),
(2, 'Kabupaten Dompu', 18, 0),
(3, 'Kabupaten Lombok Barat', 18, 0),
(4, 'Kabupaten Lombok Tengah', 18, 0),
(5, 'Kabupaten Lombok Timur', 18, 0),
(6, 'Kabupaten Lombok Utara', 18, 0),
(7, 'Kabupaten Sumbawa', 18, 0),
(8, 'Kabupaten Sumbawa Barat', 18, 0),
(9, 'Kota Bima', 18, 0),
(10, 'Kota Mataram', 18, 0),
(1, 'Kabupaten Kupang', 19, 0),
(2, 'Kabupaten Timor Tengah Selatan', 19, 0),
(3, 'Kabupaten Timor Tengah Utara', 19, 0),
(4, 'Kabupaten Belu', 19, 0),
(5, 'Kabupaten Alor', 19, 0),
(6, 'Kabupaten Flores Timur', 19, 0),
(7, 'Kabupaten Sikka', 19, 0),
(8, 'Kabupaten Ende', 19, 0),
(9, 'Kabupaten Ngada', 19, 0),
(10, 'Kabupaten Manggarai', 19, 0),
(11, 'Kabupaten Sumba Timur', 19, 0),
(12, 'Kabupaten Sumba Barat', 19, 0),
(13, 'Kabupaten Lembata', 19, 0),
(14, 'Kabupaten Rote Ndao', 19, 0),
(15, 'Kabupaten Manggarai Barat', 19, 0),
(16, 'Kabupaten Nagekeo', 19, 0),
(17, 'Kabupaten Sumba Tengah', 19, 0),
(18, 'Kabupaten Sumba Barat Daya', 19, 0),
(19, 'Kabupaten Manggarai Timur', 19, 0),
(20, 'Kabupaten Sabu Raijua', 19, 0),
(21, 'Kota Kupang', 19, 0),
(1, 'Kabupaten Bengkayang', 20, 0),
(2, 'Kabupaten Kapuas Hulu', 20, 0),
(3, 'Kabupaten Kayong Utara', 20, 0),
(4, 'Kabupaten Ketapang', 20, 0),
(5, 'Kabupaten Kubu Raya', 20, 0),
(6, 'Kabupaten Landak', 20, 0),
(7, 'Kabupaten Melawi', 20, 0),
(8, 'Kabupaten Pontianak', 20, 0),
(9, 'Kabupaten Sambas', 20, 0),
(10, 'Kabupaten Sanggau', 20, 0),
(11, 'Kabupaten Sekadau', 20, 0),
(12, 'Kabupaten Sintang', 20, 0),
(13, 'Kota Pontianak', 20, 0),
(14, 'Kota Singkawang', 20, 0),
(1, 'Kabupaten Balangan', 21, 0),
(2, 'Kabupaten Banjar', 21, 0),
(3, 'Kabupaten Barito Kuala', 21, 0),
(4, 'Kabupaten Hulu Sungai Selatan', 21, 0),
(5, 'Kabupaten Hulu Sungai Tengah', 21, 0),
(6, 'Kabupaten Hulu Sungai Utara', 21, 0),
(7, 'Kabupaten Kotabaru', 21, 0),
(8, 'Kabupaten Tabalong', 21, 0),
(9, 'Kabupaten Tanah Bumbu', 21, 0),
(10, 'Kabupaten Tanah Laut', 21, 0),
(11, 'Kabupaten Tapin', 21, 0),
(12, 'Kota Banjarbaru', 21, 0),
(13, 'Kota Banjarmasin', 21, 0),
(1, 'Kabupaten Barito Selatan', 22, 0),
(2, 'Kabupaten Barito Timur', 22, 0),
(3, 'Kabupaten Barito Utara', 22, 0),
(4, 'Kabupaten Gunung Mas', 22, 0),
(5, 'Kabupaten Kapuas', 22, 0),
(6, 'Kabupaten Katingan', 22, 0),
(7, 'Kabupaten Kotawaringin Barat', 22, 0),
(8, 'Kabupaten Kotawaringin Timur', 22, 0),
(9, 'Kabupaten Lamandau', 22, 0),
(10, 'Kabupaten Murung Raya', 22, 0),
(11, 'Kabupaten Pulang Pisau', 22, 0),
(12, 'Kabupaten Sukamara', 22, 0),
(13, 'Kabupaten Seruyan', 22, 0),
(14, 'Kota Palangka Raya', 22, 0),
(1, 'Kabupaten Berau', 23, 0),
(2, 'Kabupaten Bulungan', 23, 0),
(3, 'Kabupaten Kutai Barat', 23, 0),
(4, 'Kabupaten Kutai Kartanegara', 23, 0),
(5, 'Kabupaten Kutai Timur', 23, 0),
(6, 'Kabupaten Malinau', 23, 0),
(7, 'Kabupaten Nunukan', 23, 0),
(8, 'Kabupaten Paser', 23, 0),
(9, 'Kabupaten Penajam Paser Utara', 23, 0),
(10, 'Kabupaten Tana Tidung', 23, 0),
(11, 'Kota Balikpapan', 23, 0),
(12, 'Kota Bontang', 23, 0),
(13, 'Kota Samarinda', 23, 0),
(14, 'Kota Tarakan', 23, 0),
(1, 'Kabupaten Boalemo', 24, 0),
(2, 'Kabupaten Bone Bolango', 24, 0),
(3, 'Kabupaten Gorontalo', 24, 0),
(4, 'Kabupaten Gorontalo Utara', 24, 0),
(5, 'Kabupaten Pohuwato', 24, 0),
(6, 'Kota Gorontalo', 24, 0),
(1, 'Kabupaten Bantaeng', 25, 0),
(2, 'Kabupaten Barru', 25, 0),
(3, 'Kabupaten Bone', 25, 0),
(4, 'Kabupaten Bulukumba', 25, 0),
(5, 'Kabupaten Enrekang', 25, 0),
(6, 'Kabupaten Gowa', 25, 0),
(7, 'Kabupaten Jeneponto', 25, 0),
(8, 'Kabupaten Kepulauan Selayar', 25, 0),
(9, 'Kabupaten Luwu', 25, 0),
(10, 'Kabupaten Luwu Timur', 25, 0),
(11, 'Kabupaten Luwu Utara', 25, 0),
(12, 'Kabupaten Maros', 25, 0),
(13, 'Kabupaten Pangkajene dan Kepulauan', 25, 0),
(14, 'Kabupaten Pinrang', 25, 0),
(15, 'Kabupaten Sidenreng Rappang', 25, 0),
(16, 'Kabupaten Sinjai', 25, 0),
(17, 'Kabupaten Soppeng', 25, 0),
(18, 'Kabupaten Takalar', 25, 0),
(19, 'Kabupaten Tana Toraja', 25, 0),
(20, 'Kabupaten Toraja Utara', 25, 0),
(21, 'Kabupaten Wajo', 25, 0),
(22, 'Kota Makassar', 25, 0),
(23, 'Kota Palopo', 25, 0),
(24, 'Kota Parepare', 25, 0),
(1, 'Kabupaten Bombana', 26, 0),
(2, 'Kabupaten Buton', 26, 0),
(3, 'Kabupaten Buton Utara', 26, 0),
(4, 'Kabupaten Kolaka', 26, 0),
(5, 'Kabupaten Kolaka Utara', 26, 0),
(6, 'Kabupaten Konawe', 26, 0),
(7, 'Kabupaten Konawe Selatan', 26, 0),
(8, 'Kabupaten Konawe Utara', 26, 0),
(9, 'Kabupaten Muna', 26, 0),
(10, 'Kabupaten Wakatobi', 26, 0),
(11, 'Kota Bau-Bau', 26, 0),
(12, 'Kota Kendari', 26, 0),
(1, 'Kabupaten Banggai', 27, 0),
(2, 'Kabupaten Banggai Kepulauan', 27, 0),
(3, 'Kabupaten Buol', 27, 0),
(4, 'Kabupaten Donggala', 27, 0),
(5, 'Kabupaten Morowali', 27, 0),
(6, 'Kabupaten Parigi Moutong', 27, 0),
(7, 'Kabupaten Poso', 27, 0),
(8, 'Kabupaten Tojo Una-Una', 27, 0),
(9, 'Kabupaten Toli-Toli', 27, 0),
(10, 'Kabupaten Sigi', 27, 0),
(11, 'Kota Palu', 27, 0),
(1, 'Kabupaten Bolaang Mongondow', 28, 0),
(2, 'Kabupaten Bolaang Mongondow Selatan', 28, 0),
(3, 'Kabupaten Bolaang Mongondow Timur', 28, 0),
(4, 'Kabupaten Bolaang Mongondow Utara', 28, 0),
(5, 'Kabupaten Kepulauan Sangihe', 28, 0),
(6, 'Kabupaten Kepulauan Siau Tagulandang Biaro', 28, 0),
(7, 'Kabupaten Kepulauan Talaud', 28, 0),
(8, 'Kabupaten Minahasa', 28, 0),
(9, 'Kabupaten Minahasa Selatan', 28, 0),
(10, 'Kabupaten Minahasa Tenggara', 28, 0),
(11, 'Kabupaten Minahasa Utara', 28, 0),
(12, 'Kota Bitung', 28, 0),
(13, 'Kota Kotamobagu', 28, 0),
(14, 'Kota Manado', 28, 0),
(15, 'Kota Tomohon', 28, 0),
(1, 'Kabupaten Majene', 29, 0),
(2, 'Kabupaten Mamasa', 29, 0),
(3, 'Kabupaten Mamuju', 29, 0),
(4, 'Kabupaten Mamuju Utara', 29, 0),
(5, 'Kabupaten Polewali Mandar', 29, 0),
(1, 'Kabupaten Buru', 30, 0),
(2, 'Kabupaten Buru Selatan', 30, 0),
(3, 'Kabupaten Kepulauan Aru', 30, 0),
(4, 'Kabupaten Maluku Barat Daya', 30, 0),
(5, 'Kabupaten Maluku Tengah', 30, 0),
(6, 'Kabupaten Maluku Tenggara', 30, 0),
(7, 'Kabupaten Maluku Tenggara Barat', 30, 0),
(8, 'Kabupaten Seram Bagian Barat', 30, 0),
(9, 'Kabupaten Seram Bagian Timur', 30, 0),
(10, 'Kota Ambon', 30, 0),
(11, 'Kota Tual', 30, 0),
(1, 'Kabupaten Halmahera Barat', 31, 0),
(2, 'Kabupaten Halmahera Tengah', 31, 0),
(3, 'Kabupaten Halmahera Utara', 31, 0),
(4, 'Kabupaten Halmahera Selatan', 31, 0),
(5, 'Kabupaten Kepulauan Sula', 31, 0),
(6, 'Kabupaten Halmahera Timur', 31, 0),
(7, 'Kabupaten Pulau Morotai', 31, 0),
(8, 'Kota Ternate', 31, 0),
(9, 'Kota Tidore Kepulauan', 31, 0),
(1, 'Kabupaten Asmat', 32, 0),
(2, 'Kabupaten Biak Numfor', 32, 0),
(3, 'Kabupaten Boven Digoel', 32, 0),
(4, 'Kabupaten Deiyai', 32, 0),
(5, 'Kabupaten Dogiyai', 32, 0),
(6, 'Kabupaten Intan Jaya', 32, 0),
(7, 'Kabupaten Jayapura', 32, 0),
(8, 'Kabupaten Jayawijaya', 32, 0),
(9, 'Kabupaten Keerom', 32, 0),
(10, 'Kabupaten Kepulauan Yapen', 32, 0),
(11, 'Kabupaten Lanny Jaya', 32, 0),
(12, 'Kabupaten Mamberamo Raya', 32, 0),
(13, 'Kabupaten Mamberamo Tengah', 32, 0),
(14, 'Kabupaten Mappi', 32, 0),
(15, 'Kabupaten Merauke', 32, 0),
(16, 'Kabupaten Mimika', 32, 0),
(17, 'Kabupaten Nabire', 32, 0),
(18, 'Kabupaten Nduga', 32, 0),
(19, 'Kabupaten Paniai', 32, 0),
(20, 'Kabupaten Pegunungan Bintang', 32, 0),
(21, 'Kabupaten Puncak', 32, 0),
(22, 'Kabupaten Puncak Jaya', 32, 0),
(23, 'Kabupaten Sarmi', 32, 0),
(24, 'Kabupaten Supiori', 32, 0),
(25, 'Kabupaten Tolikara', 32, 0),
(26, 'Kabupaten Waropen', 32, 0),
(27, 'Kabupaten Yahukimo', 32, 0),
(28, 'Kabupaten Yalimo', 32, 0),
(29, 'Kota Jayapura', 32, 0),
(1, 'Kabupaten Fakfak', 33, 0),
(2, 'Kabupaten Kaimana', 33, 0),
(3, 'Kabupaten Manokwari', 33, 0),
(4, 'Kabupaten Maybrat', 33, 0),
(5, 'Kabupaten Raja Ampat', 33, 0),
(6, 'Kabupaten Sorong', 33, 0),
(7, 'Kabupaten Sorong Selatan', 33, 0),
(8, 'Kabupaten Tambrauw', 33, 0),
(9, 'Kabupaten Teluk Bintuni', 33, 0),
(10, 'Kabupaten Teluk Wondama', 33, 0),
(11, 'Kota Sorong', 33, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengiriman`
--

CREATE TABLE `pengiriman` (
  `kd_kirim` varchar(128) NOT NULL,
  `kd_trans` varchar(128) NOT NULL,
  `no_resi` varchar(128) NOT NULL,
  `tgl_terima` date NOT NULL,
  `status` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `provinsi`
--

CREATE TABLE `provinsi` (
  `kd_prov` varchar(128) NOT NULL,
  `nama_prov` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `provinsi`
--

INSERT INTO `provinsi` (`kd_prov`, `nama_prov`) VALUES
('13', 'DKI Jakarta'),
('12', 'Jawa Barat'),
('14', 'Jawa Tengah'),
('16', 'Yogyakarta'),
('15', 'Jawa Timur'),
('1', 'Nangroe Aceh Darussalam'),
('2', 'Sumatera Utara'),
('6', 'Sumatera Barat'),
('9', 'Riau'),
('4', 'Jambi'),
('7', 'Sumatera Selatan'),
('8', 'Lampung'),
('20', 'Kalimantan Barat'),
('22', 'Kalimantan Tengah'),
('21', 'Kalimantan Selatan'),
('23', 'Kalimantan Timur'),
('28', 'Sulawesi Utara'),
('27', 'Sulawesi Tengah'),
('25', 'Sulawesi Selatan'),
('26', 'Sulawesi Tenggara'),
('30', 'Maluku'),
('17', 'Bali'),
('18', 'Nusa Tenggara Barat'),
('19', 'Nusa Tenggara Timur'),
('32', 'Papua'),
('3', 'Bengkulu'),
('31', 'Maluku Utara'),
('11', 'Banten'),
('9', 'Babel'),
('24', 'Gorontalo'),
('5', 'Kepulauan Riau'),
('32', 'Irian Jaya Barat'),
('29', 'Sulawesi Barat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `retur`
--

CREATE TABLE `retur` (
  `kd_retur` varchar(128) NOT NULL,
  `tgl_retur` date NOT NULL,
  `kd_trans` varchar(128) NOT NULL,
  `status` varchar(128) NOT NULL,
  `no_resi_pengiriman` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_invoice`
--

CREATE TABLE `tb_invoice` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `batas_bayar` datetime NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_invoice`
--

INSERT INTO `tb_invoice` (`id`, `nama`, `alamat`, `tgl_pesan`, `batas_bayar`, `status`) VALUES
(27, 'Rahmat', 'Jl.bouroq gg kavling 5', '2019-10-12 13:14:15', '2019-10-13 13:14:15', '<p class=\"btn btn-success btn-sm\">Pesanan telah diterima</p>'),
(28, 'Rahmat', 'JL.veteran', '2019-10-12 13:37:26', '2019-10-13 13:37:26', '<p class=\"btn btn-success btn-sm\">Pesanan telah diterima</p>'),
(29, 'Rahmat', 'Kh Hasyim as ari', '2019-10-15 10:01:54', '2019-10-16 10:01:54', '<p class=\"btn btn-success btn-sm\">Pesanan telah diterima</p>'),
(30, 'Dev', 'Jalan bouroq kelurahan batusari kecamatan batuceper', '2019-10-18 14:06:39', '2019-10-19 14:06:39', '<p class=\"btn btn-success btn-sm\">Pesanan telah diterima</p>'),
(33, 'Ahmad', 'Jl. K.H Hasyim asyari', '2019-11-07 13:47:17', '2019-11-08 13:47:17', '<p class=\"btn btn-success btn-sm\">Pesanan telah diterima</p>'),
(34, 'Ahmad', 'Jl. K.H Hasyim Asyari', '2019-11-07 13:49:31', '2019-11-08 13:49:31', '<p class=\"btn btn-success btn-sm\">Pesanan telah diterima</p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `kd_brg` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `harga` int(10) NOT NULL,
  `sub_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id`, `id_invoice`, `kd_brg`, `nama_barang`, `jumlah`, `harga`, `sub_total`) VALUES
(36, 27, 'BR000001', 'Mens Oxford Brogue', 1, 300000, 300000),
(37, 27, 'BR000005', 'Chelsea Boots', 1, 375000, 375000),
(38, 28, 'BR000011', 'Nike Zoom', 2, 300000, 600000),
(39, 29, 'BR000010', 'Airwalk Sport', 1, 300000, 300000),
(40, 30, 'BR000001', 'Mens Oxford Brogue', 2, 300000, 600000),
(41, 31, 'BR000009', 'Adidas Football', 1, 250000, 250000),
(42, 32, 'BR000002', 'Black Cap-Toe Oxfords', 1, 250000, 250000),
(43, 32, 'BR000007', 'Monk Strap', 1, 270000, 270000),
(44, 32, 'BR000008', 'Derby Shoes', 1, 310000, 310000),
(45, 33, 'BR000006', 'Chukka Boots', 1, 78000, 78000),
(46, 33, 'BR000008', 'Derby Shoes', 1, 62000, 62000),
(47, 34, 'BR000006', 'Chukka Boots', 1, 78000, 78000),
(48, 34, 'BR000010', 'Airwalk Sport', 1, 60000, 60000),
(49, 35, 'BR000001', 'Mens Oxford Brogue', 2, 60000, 120000),
(50, 36, 'BR000002', 'Black Cap-Toe Oxfords', 2, 50000, 100000),
(51, 37, 'BR000001', 'Mens Oxford Brogue', 1, 60000, 60000);

--
-- Trigger `tb_pesanan`
--
DELIMITER $$
CREATE TRIGGER `pesanan_penjualan` AFTER INSERT ON `tb_pesanan` FOR EACH ROW BEGIN
	UPDATE det_barang SET stok = stok-NEW.jumlah
    WHERE kd_brg = NEW.kd_brg;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `kd_trans` varchar(128) NOT NULL,
  `tgl_trans` varchar(128) NOT NULL,
  `kd_konsumen` varchar(128) NOT NULL,
  `biaya_kirim` int(11) NOT NULL,
  `biaya_pemesanan` int(11) NOT NULL,
  `kd_prov` varchar(128) NOT NULL,
  `kd_kota` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`kd_trans`, `tgl_trans`, `kd_konsumen`, `biaya_kirim`, `biaya_pemesanan`, `kd_prov`, `kd_kota`) VALUES
('TR000001', '2019-10-08 08:40:06', 'KS000007', 0, 0, '01', '60'),
('TR000002', '2019-10-08 08:44:06', 'KS000007', 0, 0, '04', '05'),
('TR000003', '2019-10-12 13:14:15', 'KS000007', 0, 0, '01', '60'),
('TR000004', '2019-10-12 13:37:26', 'KS000007', 0, 0, '02', '05'),
('TR000005', '2019-10-15 10:01:54', 'KS000007', 0, 0, '01', '60'),
('TR000006', '2019-10-18 14:06:39', 'KS000008', 0, 0, '01', '60'),
('TR000007', '2019-10-25 13:35:27', 'KS000001', 0, 0, '13', '01'),
('TR000008', '2019-10-26 15:10:02', 'KS000009', 0, 0, '14', '12'),
('TR000009', '2019-11-07 13:47:17', 'KS000006', 0, 0, '11', '7'),
('TR000010', '2019-11-07 13:49:31', 'KS000006', 0, 0, '11', '7'),
('TR000011', '2019-11-07 13:53:10', 'KS000005', 0, 0, '11', '7'),
('TR000012', '2019-11-07 13:56:52', 'KS000005', 0, 0, '11', '7'),
('TR000013', '2019-11-07 14:11:36', 'KS000005', 0, 0, '11', '7');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(1, 'wahyu@gmail.com', 'hU6e162pJcnFUlO7hLjaptxRbqmruY+sUoPipeV8bQM=', 1571985328),
(2, 'wahyuganteng123@gmail.com', 'NiBqZoNiv3Sww1iiemsN858rsJAfA7aJIpuJCymtY98=', 1572077402),
(3, 'afauzann49@gmail.com', 'HYRMFRu3Mb6AAV7NIRm+sx0RfnyxuzrJ3EbivZo5Wn4=', 1573109237),
(4, 'afauzann49@gmail.com', 'STp+eBwYd2hxTc7gQdGSmBRCtmFDszQTi62BuKNd890=', 1573109371);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kd_brg`);

--
-- Indeks untuk tabel `det_barang`
--
ALTER TABLE `det_barang`
  ADD KEY `kd_brg` (`kd_brg`);

--
-- Indeks untuk tabel `det_transaksi`
--
ALTER TABLE `det_transaksi`
  ADD PRIMARY KEY (`kd_trans`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kd_kategori`);

--
-- Indeks untuk tabel `tb_invoice`
--
ALTER TABLE `tb_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_invoice`
--
ALTER TABLE `tb_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `det_barang`
--
ALTER TABLE `det_barang`
  ADD CONSTRAINT `det_barang_ibfk_1` FOREIGN KEY (`kd_brg`) REFERENCES `barang` (`kd_brg`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
