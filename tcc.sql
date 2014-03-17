-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Mai 10, 2013 as 01:00 AM
-- Versão do Servidor: 5.5.8
-- Versão do PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `tcc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `idAdmin` int(3) NOT NULL AUTO_INCREMENT,
  `nomeAdmin` varchar(50) NOT NULL,
  `emailAdmin` varchar(70) NOT NULL,
  `senhaAdmin` varchar(50) NOT NULL,
  PRIMARY KEY (`idAdmin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `admin`
--

INSERT INTO `admin` (`idAdmin`, `nomeAdmin`, `emailAdmin`, `senhaAdmin`) VALUES
(1, 'Hairton Sobral Silva', 'hairtonsena@yahoo.com.br', '7704cab9d1f1fd8d1e54277278a94f69');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidadao`
--

CREATE TABLE IF NOT EXISTS `cidadao` (
  `idCidadao` int(11) NOT NULL AUTO_INCREMENT,
  `nomeCidadao` varchar(50) NOT NULL,
  `cpfCidadao` varchar(14) NOT NULL,
  `emailCidadao` varchar(70) NOT NULL,
  `senhaCidadao` varchar(50) NOT NULL,
  `estadoCidadao` int(2) NOT NULL,
  PRIMARY KEY (`idCidadao`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `cidadao`
--

INSERT INTO `cidadao` (`idCidadao`, `nomeCidadao`, `cpfCidadao`, `emailCidadao`, `senhaCidadao`, `estadoCidadao`) VALUES
(2, 'Hairton yahoo', '87987656787', 'hairtonsena@yahoo.com.br', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(3, 'Hairton hotmail', '11111111111', 'hairtonsena@hotmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(4, 'outro', '88888', 'outro@outro.com', '9584ec80754574635f35e63e9262f95a', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentarioproblema`
--

CREATE TABLE IF NOT EXISTS `comentarioproblema` (
  `idComentario` int(11) NOT NULL AUTO_INCREMENT,
  `textoComentario` text NOT NULL,
  `dataComentario` date NOT NULL,
  `idProblema` int(11) NOT NULL,
  `idCidadao` int(11) NOT NULL,
  PRIMARY KEY (`idComentario`),
  KEY `idProblema` (`idProblema`),
  KEY `idCidadao` (`idCidadao`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `comentarioproblema`
--

INSERT INTO `comentarioproblema` (`idComentario`, `textoComentario`, `dataComentario`, `idProblema`, `idCidadao`) VALUES
(2, 'Realmente esta muito Perigoso!', '2013-04-17', 8, 3),
(6, 'Certo mano', '2013-04-18', 6, 2),
(7, 'isso ai vei', '2013-04-18', 6, 2),
(8, 'bla bla bla bla bla bla bla bla bla bla bla bla bla bla blabla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla v bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla  bla bla bla', '2013-04-18', 8, 2),
(9, 'bla bla bla bla bla bla bla bla bla bla bla bla bla bla blabla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla v bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla', '2013-04-18', 8, 2),
(10, 'Ola grazy ', '2013-04-21', 6, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `gestor`
--

CREATE TABLE IF NOT EXISTS `gestor` (
  `idGestor` int(11) NOT NULL AUTO_INCREMENT,
  `nomeGestor` varchar(50) NOT NULL,
  `emailGestor` varchar(70) NOT NULL,
  `senhaGestor` varchar(50) NOT NULL,
  `cpfGestor` varchar(14) NOT NULL,
  `estadoGestor` int(1) NOT NULL,
  PRIMARY KEY (`idGestor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `gestor`
--

INSERT INTO `gestor` (`idGestor`, `nomeGestor`, `emailGestor`, `senhaGestor`, `cpfGestor`, `estadoGestor`) VALUES
(1, 'Hairton Gestor', 'hairtonsena@yahoo.com.br', '827ccb0eea8a706c4c34a16891f84e7b', '99999999999', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `problema`
--

CREATE TABLE IF NOT EXISTS `problema` (
  `idProblema` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` text NOT NULL,
  `data` date NOT NULL,
  `dataInicioManutencao` date DEFAULT NULL,
  `dataConclusaoManutencao` date DEFAULT NULL,
  `dataPrevistaConclusao` date DEFAULT NULL,
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL,
  `idTipo` int(2) NOT NULL,
  `idStatus` int(1) NOT NULL,
  `idCidadao` int(11) NOT NULL,
  PRIMARY KEY (`idProblema`),
  KEY `idTipo` (`idTipo`),
  KEY `idStatus` (`idStatus`),
  KEY `idCidadao` (`idCidadao`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `problema`
--

INSERT INTO `problema` (`idProblema`, `descricao`, `data`, `dataInicioManutencao`, `dataConclusaoManutencao`, `dataPrevistaConclusao`, `latitude`, `longitude`, `idTipo`, `idStatus`, `idCidadao`) VALUES
(1, 'teste', '2013-04-10', NULL, '0000-00-00', '2013-04-27', '-16.73386566768085', ' -43.84815216064453', 1, 4, 2),
(2, 'Placa pare quebrada', '2013-04-12', '2013-04-16', '2013-04-17', '2013-04-30', '-16.73374237368369', ' -43.86021137237549', 7, 4, 4),
(4, 'teste', '2013-04-14', NULL, '0000-00-00', '2013-04-26', '-16.74668780774875', ' -43.85913848876953', 7, 3, 2),
(5, 'muito engarrafamento ', '2013-04-14', '2013-04-16', '2013-04-16', '2013-04-30', '-16.75819412146239', ' -43.86909484863281', 7, 3, 2),
(6, 'Esgoto a céu aberto neste local', '2013-04-16', NULL, NULL, NULL, '-16.753170468255437', ' -43.867796659469604', 9, 1, 2),
(7, 'Tem um areia em cima de calsada impedindo de passar', '2013-04-17', '2013-04-17', NULL, '2013-04-30', '-16.763453918880025', ' -43.84986877441406', 10, 2, 3),
(8, 'Arvore caída na fiação', '2013-04-17', NULL, NULL, NULL, '-16.72926263769018', ' -43.857421875', 3, 1, 3),
(9, 'um cano esta furado neste local', '2013-04-21', '2013-04-21', '2013-04-21', '2013-04-30', '-16.72148963496427', ' -43.859792947769165', 11, 4, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `idStatus` int(1) NOT NULL AUTO_INCREMENT,
  `nomeStatus` varchar(50) NOT NULL,
  PRIMARY KEY (`idStatus`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `status`
--

INSERT INTO `status` (`idStatus`, `nomeStatus`) VALUES
(1, 'Em aberto'),
(2, 'Em andamento'),
(3, 'Resolvido'),
(4, 'Confirmado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo`
--

CREATE TABLE IF NOT EXISTS `tipo` (
  `idTipo` int(2) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(50) NOT NULL,
  PRIMARY KEY (`idTipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `tipo`
--

INSERT INTO `tipo` (`idTipo`, `tipo`) VALUES
(1, 'Buraco na rua'),
(2, 'Coleta de lixo'),
(3, 'Iluminação'),
(4, 'Segurança'),
(5, 'Alagamento'),
(6, 'Arborização'),
(7, 'Trânsito'),
(8, 'Serviços públicos'),
(9, 'Saneamento básico'),
(10, 'acessibilidade'),
(11, 'Vasamento de água'),
(12, 'Entulhos');

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `comentarioproblema`
--
ALTER TABLE `comentarioproblema`
  ADD CONSTRAINT `comentarioproblema_ibfk_1` FOREIGN KEY (`idProblema`) REFERENCES `problema` (`idProblema`),
  ADD CONSTRAINT `comentarioproblema_ibfk_2` FOREIGN KEY (`idCidadao`) REFERENCES `cidadao` (`idCidadao`);

--
-- Restrições para a tabela `problema`
--
ALTER TABLE `problema`
  ADD CONSTRAINT `problema_ibfk_1` FOREIGN KEY (`idTipo`) REFERENCES `tipo` (`idTipo`),
  ADD CONSTRAINT `problema_ibfk_2` FOREIGN KEY (`idCidadao`) REFERENCES `cidadao` (`idCidadao`);
