-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 12, 2016 at 08:43 AM
-- Server version: 5.5.49-0+deb8u1
-- PHP Version: 5.6.24-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `banco_flavio`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_itens_nota`
--

CREATE TABLE IF NOT EXISTS `tb_itens_nota` (
  `id_itens_nota` int(11) NOT NULL,
  `id_nota` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `preco` decimal(12,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_notas`
--

CREATE TABLE IF NOT EXISTS `tb_notas` (
`id_nota` int(11) NOT NULL,
  `cpfcnpj` varchar(19) DEFAULT NULL,
  `ierg` varchar(45) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `imunicipal` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_itens_nota`
--
ALTER TABLE `tb_itens_nota`
 ADD PRIMARY KEY (`id_itens_nota`), ADD KEY `fk_tb_itens_nota_tb_notas_idx` (`id_nota`);

--
-- Indexes for table `tb_notas`
--
ALTER TABLE `tb_notas`
 ADD PRIMARY KEY (`id_nota`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_notas`
--
ALTER TABLE `tb_notas`
MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_itens_nota`
--
ALTER TABLE `tb_itens_nota`
ADD CONSTRAINT `fk_tb_itens_nota_tb_notas` FOREIGN KEY (`id_nota`) REFERENCES `tb_notas` (`id_nota`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
