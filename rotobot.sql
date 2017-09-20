-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2017 at 04:04 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rotobot`
--

-- --------------------------------------------------------

--
-- Table structure for table `absenkaryawan`
--

CREATE TABLE `absenkaryawan` (
  `id_absen` int(6) NOT NULL,
  `jammasuk` time NOT NULL,
  `jampulang` time NOT NULL,
  `tanggalmasuk` date NOT NULL,
  `id_karyawan` int(6) NOT NULL,
  `id_honor` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absenkaryawan`
--

INSERT INTO `absenkaryawan` (`id_absen`, `jammasuk`, `jampulang`, `tanggalmasuk`, `id_karyawan`, `id_honor`) VALUES
(2, '21:35:00', '21:37:00', '2017-08-10', 131, 2),
(13, '12:51:00', '12:52:00', '2017-09-07', 131, 2),
(18, '00:49:00', '00:51:00', '2017-09-14', 131, 2),
(22, '23:48:00', '15:03:00', '2017-09-15', 131, 2),
(23, '15:03:00', '00:00:00', '2017-09-16', 131, 2),
(24, '20:50:00', '00:00:00', '2017-09-20', 133, 6);

-- --------------------------------------------------------

--
-- Table structure for table `absensiswa`
--

CREATE TABLE `absensiswa` (
  `id_absen` int(6) NOT NULL,
  `jammasuk` time NOT NULL,
  `jampulang` time NOT NULL,
  `tanggalmasuk` date NOT NULL,
  `id_siswa` int(6) NOT NULL,
  `id_karyawan` int(6) NOT NULL,
  `id_honor` int(5) NOT NULL,
  `nilai` int(11) NOT NULL,
  `id_level` int(6) NOT NULL,
  `naik` varchar(255) NOT NULL,
  `pertemuanke` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `absensiswacek`
--

CREATE TABLE `absensiswacek` (
  `id_siswa` int(9) NOT NULL,
  `tanggalabsen` date NOT NULL,
  `pertemuanke` int(3) NOT NULL,
  `nilai` int(11) NOT NULL,
  `naik` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensiswacek`
--

INSERT INTO `absensiswacek` (`id_siswa`, `tanggalabsen`, `pertemuanke`, `nilai`, `naik`) VALUES
(101, '2017-09-16', 0, 0, 'Tidak Naik Level');

-- --------------------------------------------------------

--
-- Table structure for table `detailsiswa`
--

CREATE TABLE `detailsiswa` (
  `id_detail` int(6) NOT NULL,
  `hubungipretest` varchar(100) NOT NULL,
  `tanggalpretest` date NOT NULL,
  `balaspretest` varchar(100) NOT NULL,
  `materi` varchar(100) NOT NULL,
  `datangpretest` varchar(100) NOT NULL,
  `nilaipretest` int(11) NOT NULL,
  `alasan1` varchar(255) NOT NULL,
  `rekomendasikelas` varchar(100) NOT NULL,
  `lunas1` varchar(100) NOT NULL,
  `formulir` varchar(100) NOT NULL,
  `kartusiswa` varchar(100) NOT NULL,
  `buku` varchar(100) NOT NULL,
  `presensi` varchar(100) NOT NULL,
  `lunas2` varchar(100) NOT NULL,
  `alasan2` varchar(255) NOT NULL,
  `lunas3` varchar(100) NOT NULL,
  `alasan3` varchar(255) NOT NULL,
  `kaos` varchar(100) NOT NULL,
  `tas` varchar(100) NOT NULL,
  `kit` varchar(100) NOT NULL,
  `sertifikat` varchar(100) NOT NULL,
  `id_siswa` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detailsiswa`
--

INSERT INTO `detailsiswa` (`id_detail`, `hubungipretest`, `tanggalpretest`, `balaspretest`, `materi`, `datangpretest`, `nilaipretest`, `alasan1`, `rekomendasikelas`, `lunas1`, `formulir`, `kartusiswa`, `buku`, `presensi`, `lunas2`, `alasan2`, `lunas3`, `alasan3`, `kaos`, `tas`, `kit`, `sertifikat`, `id_siswa`) VALUES
(1, 'Membalas', '2017-09-20', 'Tidak', 'asdasd', 'Tidak', 90, '', 'Logic 1', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', '', 'Ya', '', 'Ya', 'Ya', 'Ya', 'Sudah', 101);

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `id_email` int(6) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `finance`
--

CREATE TABLE `finance` (
  `id_finance` int(6) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `foto` varchar(150) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `finance`
--

INSERT INTO `finance` (`id_finance`, `nama`, `username`, `password`, `foto`, `alamat`, `email`) VALUES
(1, 'Finance', 'finance', 'financerotobot', '', 'Jl. Kopral, Klaten', 'finance@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `honor`
--

CREATE TABLE `honor` (
  `id_honor` int(5) NOT NULL,
  `level` varchar(100) NOT NULL,
  `gaji` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `honor`
--

INSERT INTO `honor` (`id_honor`, `level`, `gaji`, `keterangan`) VALUES
(2, 'Admin', 150000, 'ashasjkkhfjkasfka'),
(3, 'Administrator', 250000, 'KASJHKAJSF'),
(4, 'Logic', 150000, 'khaskjfasf'),
(5, 'Manager', 200000, 'Honor Per Hari'),
(6, 'Finance', 150000, 'Gaji Per Hari');

-- --------------------------------------------------------

--
-- Table structure for table `instruktur`
--

CREATE TABLE `instruktur` (
  `id_instruktur` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `tanggallahir` date NOT NULL,
  `username` varchar(12) NOT NULL,
  `password` varchar(12) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `jeniskelamin` varchar(10) NOT NULL,
  `hp` varchar(12) NOT NULL,
  `tempatlahir` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instruktur`
--

INSERT INTO `instruktur` (`id_instruktur`, `email`, `nama`, `alamat`, `tanggallahir`, `username`, `password`, `foto`, `jeniskelamin`, `hp`, `tempatlahir`) VALUES
(1011, 'rudi@gmail.com', 'Rudi Widodo', 'Jl. Banyubiru, Solo', '1991-08-10', 'rudi', '12', '1502166681.jpg', 'Laki-laki', '082212292383', 'Solo'),
(1012, 'bee@gmail.com', 'Lerby Eliandry', 'Jl. Segiri, Samarinda', '1995-08-01', 'bee', '123', '1501813118.jpg', 'Laki-laki', '082212312321', 'Samarinda'),
(1013, 'evan@gmail.com', 'Evan Dimas', 'Jl. Dharmo, Surabaya', '1995-08-09', 'evan', '123', '1502176242.jpg', 'Laki-laki', '082221192834', 'Surabaya');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(3) NOT NULL,
  `hari` varchar(100) NOT NULL,
  `jam` time NOT NULL,
  `id_siswa` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(12) NOT NULL,
  `password` varchar(30) NOT NULL,
  `tempatlahir` varchar(100) NOT NULL,
  `tanggallahir` date NOT NULL,
  `jeniskelamin` varchar(12) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `hp` varchar(12) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jabatan` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama`, `username`, `password`, `tempatlahir`, `tanggallahir`, `jeniskelamin`, `alamat`, `hp`, `foto`, `email`, `jabatan`) VALUES
(131, 'Pevita Keenan', 'pev', '123', 'Banyuwangi', '1995-07-31', 'Perempuan', 'Jalan Sukabirus', '089987872233', '1505549088.JPG', 'pev@gmail.com', 'Admin'),
(132, 'ASDAsd', 'adas', '123', 'asadad', '2017-08-30', 'Laki-laki', 'asdasd', 'asdasd', '', 'sadasd', 'Instruktur Tetap'),
(133, 'Kurniawan Dwi Yulianto', 'kur', '123', 'Banyuwangi', '1995-09-21', 'Laki-laki', 'asdaskj', '082212312321', '', 'aksjhf', 'Finance'),
(134, 'Zulham Zamrun', 'zul', '123', 'Malang', '1997-08-29', 'Laki-laki', 'asdasd', '089987872233', '', 'sadasd', 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `kursus`
--

CREATE TABLE `kursus` (
  `id_kursus` int(11) NOT NULL,
  `nama_materi` varchar(30) NOT NULL,
  `id_instruktur` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `lama` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(6) NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `level` varchar(255) NOT NULL,
  `detail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `kelas`, `level`, `detail`) VALUES
(1, 'Mekanik 1', 'Kompetisi', 'Mekanik'),
(2, 'Mekanik 2', 'Kompetisi', 'Mekanik'),
(3, 'Mekanik 3', 'Kompetisi', 'Mekanik'),
(4, 'Mekanik 4', 'Kompetisi', 'Mekanik'),
(5, 'Mekanik 5', 'Kompetisi', 'Mekanik'),
(6, 'Mekanik 6', 'Kompetisi', 'Mekanik'),
(7, 'Mekanik 7', 'Kompetisi', 'Mekanik'),
(8, 'Mekanik 8', 'Kompetisi', 'Mekanik'),
(9, 'Basic Programming 1', 'Kompetisi', 'Basic'),
(10, 'Basic Programming 2', 'Kompetisi', 'Basic'),
(11, 'Basic Programming 3', 'Kompetisi', 'Basic'),
(12, 'Logic 1', 'Kompetisi', 'Logic'),
(13, 'Logic 2', 'Kompetisi', 'Logic'),
(14, 'Logic 3', 'Kompetisi', 'Logic'),
(15, 'Logic 4', 'Kompetisi', 'Logic'),
(16, 'Logic 5', 'Kompetisi', 'Logic'),
(17, 'Logic 6', 'Kompetisi', 'Logic'),
(18, 'Logic 7', 'Kompetisi', 'Logic'),
(19, 'Logic 8', 'Kompetisi', 'Logic'),
(20, 'Logic 9', 'Kompetisi', 'Logic'),
(21, 'Coding 1', 'Kompetisi', 'Coding'),
(22, 'Coding 2', 'Kompetisi', 'Coding'),
(23, 'Coding 3', 'Kompetisi', 'Coding'),
(24, 'Coding 4', 'Kompetisi', 'Coding'),
(25, 'Autonomous 1', 'Kompetisi', 'Autonomous'),
(26, 'Autonomous 2', 'Kompetisi', 'Autonomous'),
(27, 'Autonomous 3', 'Kompetisi', 'Autonomous'),
(28, 'Autonomous 4', 'Kompetisi', 'Autonomous'),
(29, 'Creation', 'Creation', 'Creation');

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id_materi` int(6) NOT NULL,
  `file` varchar(255) NOT NULL,
  `pertemuanke` int(11) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id_materi`, `file`, `pertemuanke`, `level`) VALUES
(1, '1504099360.pdf', 1, 'Logic 1'),
(2, '1505333384.pdf', 1, 'Logic 2');

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `id_owner` int(6) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`id_owner`, `nama`, `username`, `password`) VALUES
(1, 'Budi', 'bud', '123');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `ke` int(12) NOT NULL,
  `tglbayar` date NOT NULL,
  `bayar` int(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_siswa`, `ke`, `tglbayar`, `bayar`) VALUES
(1, 101, 1, '2017-09-20', 350000);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaranemail`
--

CREATE TABLE `pembayaranemail` (
  `id_bayar` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `namapengirim` varchar(255) NOT NULL,
  `norek` varchar(12) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `tglbayar` date NOT NULL,
  `totalbayar` int(11) NOT NULL,
  `buktipembayaran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaranemail`
--

INSERT INTO `pembayaranemail` (`id_bayar`, `id_siswa`, `namapengirim`, `norek`, `keterangan`, `tglbayar`, `totalbayar`, `buktipembayaran`) VALUES
(1, 101, 'Kop', '21312412', 'Pemabayran ke 1', '2017-09-20', 350000, '1505914774');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_pengeluaran` int(9) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_pengeluaran`, `nama`, `merk`, `type`, `harga`, `jumlah`, `total`, `tanggal`, `keterangan`) VALUES
(1, 'laptop', 'asus', 'A4SSL', 10000000, 1, 10000000, '2017-09-16', 'Beli');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(12) NOT NULL,
  `password` varchar(12) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tanggallahir` date NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `jeniskelamin` varchar(11) NOT NULL,
  `hp` varchar(12) NOT NULL,
  `tempatlahir` varchar(100) NOT NULL,
  `sekolah` varchar(255) NOT NULL,
  `kelas` int(2) NOT NULL,
  `tanggaldaftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `email`, `username`, `password`, `nama`, `tanggallahir`, `alamat`, `foto`, `jeniskelamin`, `hp`, `tempatlahir`, `sekolah`, `kelas`, `tanggaldaftar`) VALUES
(101, 'asdasd', 'budi', 'loremipsum', 'Budi Doremi', '2017-08-30', 'asdas', '', 'Laki-laki', '082212312321', 'Kepanjen', 'asdas', 2, '2017-09-20');

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `idupload` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`idupload`, `gambar`, `keterangan`) VALUES
(1, '1500762303.jpg', 'hkjhkj'),
(2, '1500766336.JPG', ''),
(3, '1500766367.JPG', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absenkaryawan`
--
ALTER TABLE `absenkaryawan`
  ADD PRIMARY KEY (`id_absen`),
  ADD KEY `id_karyawan` (`id_karyawan`),
  ADD KEY `id_karyawan_2` (`id_karyawan`);

--
-- Indexes for table `absensiswa`
--
ALTER TABLE `absensiswa`
  ADD PRIMARY KEY (`id_absen`),
  ADD KEY `id_karyawan` (`id_karyawan`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `detailsiswa`
--
ALTER TABLE `detailsiswa`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `finance`
--
ALTER TABLE `finance`
  ADD PRIMARY KEY (`id_finance`);

--
-- Indexes for table `honor`
--
ALTER TABLE `honor`
  ADD PRIMARY KEY (`id_honor`);

--
-- Indexes for table `instruktur`
--
ALTER TABLE `instruktur`
  ADD PRIMARY KEY (`id_instruktur`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_siswa_2` (`id_siswa`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `kursus`
--
ALTER TABLE `kursus`
  ADD PRIMARY KEY (`id_kursus`),
  ADD KEY `id_instruktur` (`id_instruktur`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`),
  ADD KEY `id_materi` (`id_materi`),
  ADD KEY `id_materi_2` (`id_materi`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `pembayaranemail`
--
ALTER TABLE `pembayaranemail`
  ADD PRIMARY KEY (`id_bayar`),
  ADD KEY `id_bayar` (`id_bayar`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`idupload`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `instruktur`
--
ALTER TABLE `instruktur`
  MODIFY `id_instruktur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1014;
--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;
--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `idupload` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `absenkaryawan`
--
ALTER TABLE `absenkaryawan`
  ADD CONSTRAINT `absenkaryawan_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `absensiswa`
--
ALTER TABLE `absensiswa`
  ADD CONSTRAINT `absensiswa_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detailsiswa`
--
ALTER TABLE `detailsiswa`
  ADD CONSTRAINT `detailsiswa_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kursus`
--
ALTER TABLE `kursus`
  ADD CONSTRAINT `kursus_ibfk_1` FOREIGN KEY (`id_instruktur`) REFERENCES `instruktur` (`id_instruktur`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembayaranemail`
--
ALTER TABLE `pembayaranemail`
  ADD CONSTRAINT `pembayaranemail_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
