-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2019 at 06:48 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uai`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrador`
--

CREATE TABLE `administrador` (
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrador`
--

INSERT INTO `administrador` (`idUsuario`) VALUES
(5);

-- --------------------------------------------------------

--
-- Table structure for table `financiador`
--

CREATE TABLE `financiador` (
  `id` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `carteira` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `financiador`
--

INSERT INTO `financiador` (`id`, `idUsuario`, `carteira`) VALUES
(1, 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `historicodoacao`
--

CREATE TABLE `historicodoacao` (
  `id` int(11) NOT NULL,
  `idProjeto` int(11) NOT NULL,
  `idFinanciador` int(11) NOT NULL,
  `quantia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `historicodoacao`
--

INSERT INTO `historicodoacao` (`id`, `idProjeto`, `idFinanciador`, `quantia`) VALUES
(5, 5, 7, 5000),
(6, 4, 7, 20),
(7, 5, 7, 5),
(8, 5, 7, 111),
(9, 8, 7, 1),
(10, 8, 7, 1),
(11, 8, 7, 1),
(12, 9, 7, 21);

-- --------------------------------------------------------

--
-- Table structure for table `projeto`
--

CREATE TABLE `projeto` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `fonte` varchar(255) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `sinopse` text NOT NULL,
  `generos` varchar(255) NOT NULL,
  `fundo` double NOT NULL DEFAULT '0',
  `dataDeCriacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projeto`
--

INSERT INTO `projeto` (`id`, `nome`, `fonte`, `autor`, `sinopse`, `generos`, `fundo`, `dataDeCriacao`) VALUES
(4, '1', '1', '1', '1', '1', 20, '2019-06-26 11:29:42'),
(5, '2', '2', '2', '2', '2', 5116, '2019-06-26 11:29:50'),
(8, 'teste', 'teetet', 'teteet', 'etetet', 'teteet', 3, '2019-06-27 23:14:13'),
(9, 'hiuadsfhufadshiu', 'hiu', 'hiu', 'ihu', 'hiuhiu', 21, '2019-06-27 23:15:38');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(512) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `email` varchar(256) NOT NULL,
  `senha` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `cpf`, `email`, `senha`) VALUES
(5, 'Administrador Principal', '0', 'adm@uai.br', 'adm'),
(7, 'Luiz', '1', 'luizcoelhoc1@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `financiador`
--
ALTER TABLE `financiador`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indexes for table `historicodoacao`
--
ALTER TABLE `historicodoacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idProjeto` (`idProjeto`),
  ADD KEY `idFinanciador` (`idFinanciador`);

--
-- Indexes for table `projeto`
--
ALTER TABLE `projeto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `cpf` (`cpf`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `financiador`
--
ALTER TABLE `financiador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `historicodoacao`
--
ALTER TABLE `historicodoacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `projeto`
--
ALTER TABLE `projeto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `financiador`
--
ALTER TABLE `financiador`
  ADD CONSTRAINT `financiador_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `historicodoacao`
--
ALTER TABLE `historicodoacao`
  ADD CONSTRAINT `historicodoacao_ibfk_1` FOREIGN KEY (`idProjeto`) REFERENCES `projeto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `historicodoacao_ibfk_2` FOREIGN KEY (`idFinanciador`) REFERENCES `financiador` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
