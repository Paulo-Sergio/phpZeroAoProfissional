-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 21-Dez-2016 às 14:05
-- Versão do servidor: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `galeria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `fotos`
--

CREATE TABLE `fotos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `fotos`
--

INSERT INTO `fotos` (`id`, `titulo`, `url`) VALUES
(1, 'Foto 01', 'http://qnimate.com/wp-content/uploads/2014/03/images2.jpg'),
(2, 'Foto teste', 'http://qnimate.com/wp-content/uploads/2014/03/images2.jpg'),
(3, 'lokoooo', 'http://qnimate.com/wp-content/uploads/2014/03/images2.jpg'),
(4, 'fotos do verão', 'http://qnimate.com/wp-content/uploads/2014/03/images2.jpg'),
(5, 'Fotos repetidas', 'http://qnimate.com/wp-content/uploads/2014/03/images2.jpg'),
(6, 'testes', 'http://qnimate.com/wp-content/uploads/2014/03/images2.jpg'),
(7, 'Paulo fotos', 'http://qnimate.com/wp-content/uploads/2014/03/images2.jpg'),
(8, 'França Imagens', 'http://qnimate.com/wp-content/uploads/2014/03/images2.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fotos`
--
ALTER TABLE `fotos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
