-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 02-Set-2017 às 00:51
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `reservaatp`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipamentos`
--

CREATE TABLE IF NOT EXISTS `equipamentos` (
  `equipamento` varchar(30) NOT NULL,
  `status` varchar(200) NOT NULL,
  PRIMARY KEY (`equipamento`),
  KEY `equipamento` (`equipamento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `equipamentos`
--

INSERT INTO `equipamentos` (`equipamento`, `status`) VALUES
('Data Show (01)', 'Funcionando'),
('Data Show (06)', 'Funcionando'),
('Data Show (23)', 'Funcionando'),
('Data Show (45)', 'Funcionando'),
('TelevisÃ£o (2)', 'Funcionando');

-- --------------------------------------------------------

--
-- Estrutura da tabela `professores`
--

CREATE TABLE IF NOT EXISTS `professores` (
  `professor` varchar(30) NOT NULL,
  `senha` varchar(30) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  PRIMARY KEY (`professor`),
  KEY `senha` (`senha`),
  KEY `professor` (`professor`),
  KEY `senha_2` (`senha`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `professores`
--

INSERT INTO `professores` (`professor`, `senha`, `tipo`) VALUES
('Emanuel Douglas', '1234', 'Administrador'),
('Honorio Oliveira', 'quimica', 'Professor'),
('Ronny AcÃ¡cio', 'ronny1324', 'Administrador'),
('Thiago Marinho', '123', 'Professor');

-- --------------------------------------------------------

--
-- Estrutura da tabela `reserva`
--

CREATE TABLE IF NOT EXISTS `reserva` (
  `hora_reserva` int(100) NOT NULL,
  `hora_entrega` int(100) NOT NULL,
  `data_reserva` varchar(10) NOT NULL,
  `professor` varchar(30) NOT NULL,
  `equipamento` varchar(30) NOT NULL,
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(200) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `equipamento` (`equipamento`),
  KEY `professor` (`professor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`professor`) REFERENCES `professores` (`professor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`equipamento`) REFERENCES `equipamentos` (`equipamento`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
