-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2023 at 06:28 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spkwp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(2) NOT NULL,
  `nama_user` varchar(40) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('admin','wali','kelas1','kelas2','kelas3','kelas4','kelas5','kelas6','super admin') NOT NULL,
  `keterangan` enum('kelas-1','kelas-2','kelas-3','kelas-4','kelas-5','kelas-6') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `username`, `password`, `level`, `keterangan`) VALUES
(1, 'Teknisi Bersarung', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin', NULL),
(2, 'guru', 'guru', '$2a$12$dcvY8OIHgm4kzN.W4aad6.i8yUxEINGSpv1XEXVeEvsFJAwcsYUw.', 'admin', NULL),
(3, 'kelas1', 'kelas1', '$2y$10$4y/mwHnV5n4m8IUj/mVBS.6Nsdx0fDdaOAWn2CrWayH.UQqn3lV1S', 'wali', 'kelas-1'),
(4, 'kelas2', 'kelas2', '$2y$10$GDFQ.D604y.TADdeuHwzPu2AIplitSLNLGcKfXWHQbcW9wAwu3XjG', 'wali', 'kelas-2'),
(5, 'kelas3', 'kelas3', '$2y$10$24xF.l1XyuZnm0voA3wuT.anwmBLa81pKlcFx/TlTVsIdFdC6mf8a', 'wali', 'kelas-3'),
(6, 'kelas4', 'kelas4', '$2y$10$cTbucqhWdxIOJw/l1ZNmKuj94uVkHMbCL4DTWNnI26.Wt8jGL4rM.', 'wali', 'kelas-4'),
(7, 'kelas5', 'kelas5', '$2y$10$x6DE5PnjOu8iE6SDU3zosu2yoyOoN.sNuPdUK2fwt9PaUOpZxxzkC', 'wali', 'kelas-5'),
(8, 'kelas6', 'kelas6', '$2y$10$alH6JA5zK/1n/cZui.8CGuUcTGJU5wIgHh3s553O6QPvvhBGt/w.q', 'wali', 'kelas-6'),
(9, 'superadmin', 'superadmin', '$2y$10$ZnrJJ1H69kUcgffSPlYlHerFM//rG6ksow1U/rpo.bwbHXZmEXca2', 'super admin', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
