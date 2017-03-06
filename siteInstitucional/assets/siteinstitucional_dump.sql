-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 22-Dez-2016 às 23:48
-- Versão do servidor: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siteinstitucional`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL,
  `imagem` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `portfolio`
--

INSERT INTO `portfolio` (`id`, `imagem`) VALUES
(1, 'imagem.jpg'),
(2, 'imagem.jpg'),
(3, 'imagem.jpg'),
(4, 'imagem.jpg'),
(5, 'imagem.jpg'),
(6, 'imagem.jpg'),
(7, 'imagem.jpg'),
(8, 'imagem.jpg'),
(9, 'imagem.jpg'),
(10, 'imagem.jpg'),
(11, 'imagem.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
