-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 13, 2025 at 02:23 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `antrian`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bpjs`
--

CREATE TABLE `tbl_bpjs` (
  `id` int NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `panggil` int NOT NULL DEFAULT '0',
  `loket` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bpjs`
--

INSERT INTO `tbl_bpjs` (`id`, `keterangan`, `status`, `panggil`, `loket`) VALUES
(1, 'BPJS Rawat Jalan', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bpjs_rajal`
--

CREATE TABLE `tbl_bpjs_rajal` (
  `id` int NOT NULL,
  `poli` varchar(25) NOT NULL,
  `id_poli` int NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `panggil` int NOT NULL DEFAULT '0',
  `loket` int NOT NULL DEFAULT '0',
  `dokter` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cs`
--

CREATE TABLE `tbl_cs` (
  `id` int NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  `status` int NOT NULL,
  `panggil` int NOT NULL,
  `loket` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cs`
--

INSERT INTO `tbl_cs` (`id`, `keterangan`, `status`, `panggil`, `loket`) VALUES
(1, 'CUSTOMER CARE', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_umum`
--

CREATE TABLE `tbl_umum` (
  `id` int NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `panggil` int NOT NULL DEFAULT '0',
  `loket` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_umum`
--

INSERT INTO `tbl_umum` (`id`, `keterangan`, `status`, `panggil`, `loket`) VALUES
(1, 'umum Rawat Jalan', 2, 2, 1),
(2, 'umum Rawat Jalan', 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_bpjs`
--
ALTER TABLE `tbl_bpjs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_bpjs_rajal`
--
ALTER TABLE `tbl_bpjs_rajal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cs`
--
ALTER TABLE `tbl_cs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_umum`
--
ALTER TABLE `tbl_umum`
  ADD PRIMARY KEY (`id`);

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `e_daily` ON SCHEDULE EVERY 1 DAY STARTS '2018-05-14 00:00:01' ON COMPLETION NOT PRESERVE ENABLE COMMENT 'Clears tbl_umum' DO Delete from tbl_umum$$

CREATE DEFINER=`root`@`localhost` EVENT `e_daily2` ON SCHEDULE EVERY 1 DAY STARTS '2018-02-11 00:00:01' ON COMPLETION NOT PRESERVE ENABLE COMMENT 'Clear tbl_bpjs_rajal' DO delete from tbl_bpjs_rajal$$

CREATE DEFINER=`root`@`localhost` EVENT `e_daily3` ON SCHEDULE EVERY 1 DAY STARTS '2018-05-14 00:00:01' ON COMPLETION NOT PRESERVE ENABLE COMMENT 'clear tbl_bpjs_rajal' DO DELETE from tbl_bpjs$$

CREATE DEFINER=`root`@`localhost` EVENT `e-daily4` ON SCHEDULE EVERY 1 DAY STARTS '2025-03-01 00:00:00' ON COMPLETION NOT PRESERVE ENABLE COMMENT 'clear tbl_cs' DO DELETE from tbl_cs$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
