-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 11-Abr-2014 às 14:39
-- Versão do servidor: 5.5.35-0ubuntu0.13.10.2
-- versão do PHP: 5.5.3-1ubuntu2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `municipios`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `anexo_mural`
--

CREATE TABLE IF NOT EXISTS `anexo_mural` (
  `id_am` int(11) NOT NULL AUTO_INCREMENT,
  `nome_arquivo_am` varchar(70) NOT NULL,
  `arquivo_am` varchar(70) NOT NULL,
  `data_am` date NOT NULL,
  `status_am` int(1) DEFAULT NULL,
  `id_mural` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_am`),
  KEY `id_mural` (`id_mural`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `anexo_pp`
--

CREATE TABLE IF NOT EXISTS `anexo_pp` (
  `id_ap` int(11) NOT NULL AUTO_INCREMENT,
  `nome_anexo_ap` varchar(100) NOT NULL,
  `data_ap` date NOT NULL,
  `status_ap` int(1) NOT NULL,
  `id_pp` varchar(50) NOT NULL,
  PRIMARY KEY (`id_ap`,`id_pp`),
  KEY `fk_anexo_pp_pregra_presencial1` (`id_pp`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `anexo_pp`
--

INSERT INTO `anexo_pp` (`id_ap`, `nome_anexo_ap`, `data_ap`, `status_ap`, `id_pp`) VALUES
(1, 'servicosDetran13_12_02_17_53_59.pdf', '2013-12-02', 1, 'Edital'),
(2, 'servicosDetran13_12_02_17_54_09.pdf', '2013-12-02', 1, 'Edital'),
(3, 'servicosDetran13_12_02_17_54_53.pdf', '2013-12-02', 1, 'Edital'),
(4, 'servicosDetran_13_12_02_20_31_30.pdf', '2013-12-02', 1, 'Edital-0042013');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mural`
--

CREATE TABLE IF NOT EXISTS `mural` (
  `id_mural` varchar(100) NOT NULL,
  `titulo_mural` varchar(70) NOT NULL,
  `texto_mural` text NOT NULL,
  `data_mural` date NOT NULL,
  `status_mural` int(1) NOT NULL,
  `ordem_mural` datetime NOT NULL,
  PRIMARY KEY (`id_mural`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `mural`
--

INSERT INTO `mural` (`id_mural`, `titulo_mural`, `texto_mural`, `data_mural`, `status_mural`, `ordem_mural`) VALUES
('agora-mais-um-teste-de-mural', 'agora é mais um teste de mural', '<p>Licita&ccedil;&atilde;o de bonecas para as creches</p>\n', '2014-04-11', 0, '2014-04-11 01:43:21'),
('convocao-dos-servidores', 'convocação dos servidores', '<p>voc&ecirc; esta aqui para em minha casa</p>\n', '2014-04-10', 0, '2014-04-10 22:58:50');

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticia_inicio`
--

CREATE TABLE IF NOT EXISTS `noticia_inicio` (
  `id_noticia` varchar(70) NOT NULL,
  `titulo_noticia` varchar(100) NOT NULL,
  `imagem_noticia` varchar(100) DEFAULT NULL,
  `texto_noticia` text,
  `data_noticia` date NOT NULL,
  `status_noticia` int(1) NOT NULL,
  `ordem_noticia` datetime NOT NULL,
  PRIMARY KEY (`id_noticia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `noticia_inicio`
--

INSERT INTO `noticia_inicio` (`id_noticia`, `titulo_noticia`, `imagem_noticia`, `texto_noticia`, `data_noticia`, `status_noticia`, `ordem_noticia`) VALUES
('titulo-teste-validao-01', 'Titulo teste validação 01', '330ac310aa1b5bbb7f1ab41cc200725a.jpg', '<p><span style="font-size:14px">Este &eacute; um teste de texto para ver se a noticioa vai ser mostrada com na parte inicial do site da prefeitura. asldfasldf asldfaslkdfjasldfj askldfja skldfjslad kfslasdflksa djflaskfj sadlkfjasl dfjsaldkfasldk fjsadklfjsakldf jaslkdjfklsadjfla sdjflaskjla sdfjlasdflaskd jflasdkjlasdfjas ljfasdfkjasdflas kdjflksajfsadlfk jas ldkf jsald kjskfjskdf l&ccedil;sjflaskd flaksdfl aksdflkasjdfjlasd jfas lkdfjlasd fasl jasd&ccedil;lkasd&ccedil;flj lasdf lasdf</span></p>\n\n<p><span style="font-size:14px">Este &eacute; um teste de texto para ver se a noticioa vai ser mostrada com na parte inicial do site da prefeitura. asldfasldf asldfaslkdfjasldfj askldfja skldfjslad kfslasdflksa djflaskfj sadlkfjasl dfjsaldkfasldk fjsadklfjsakldf jaslkdjfklsadjfla sdjflaskjla sdfjlasdflaskd jflasdkjlasdfjas ljfasdfkjasdflas kdjflksajfsadlfk jas ldkf jsald kjskfjskdf l&ccedil;sjflaskd flaksdfl aksdflkasjdfjlasd jfas lkdfjlasd fasl jasd&ccedil;lkasd&ccedil;f</span></p>\n', '2014-01-15', 0, '2014-01-15 13:03:15');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pregao_presencial`
--

CREATE TABLE IF NOT EXISTS `pregao_presencial` (
  `id_pp` varchar(50) NOT NULL,
  `titulo_pp` varchar(50) NOT NULL,
  `objeto_pp` text NOT NULL,
  `data_publicacao_pp` date NOT NULL,
  `data_realizacao_pp` date NOT NULL,
  `data_ordem_pp` varchar(45) NOT NULL,
  `status_pp` int(1) NOT NULL,
  `status_drp` int(1) NOT NULL,
  `status_retificado` int(1) NOT NULL,
  PRIMARY KEY (`id_pp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pregao_presencial`
--

INSERT INTO `pregao_presencial` (`id_pp`, `titulo_pp`, `objeto_pp`, `data_publicacao_pp`, `data_realizacao_pp`, `data_ordem_pp`, `status_pp`, `status_drp`, `status_retificado`) VALUES
('Edital', 'Edital 002/2013', '<p>bla bla bla hab bal&nbsp;bla bla bla hab bal&nbsp;bla bla bla hab bal&nbsp;bla bla bla hab bal&nbsp;bla bla bla hab bal&nbsp;bla bla bla hab bal&nbsp;bla bla bla hab bal v</p>\n', '2013-12-02', '2013-12-27', '2013-12-02 15:17:36', 1, 0, 0),
('Edital-0042013', 'Edital 004/2013', '<p>AQUISI&Ccedil;&Atilde;O DE FRUTAS DIVERSAS PARA SEREM DISTRIBU&Iacute;DAS AOS USU&Aacute;RIOS DOS CENTROS DE ATEN&Ccedil;&Atilde;O PSICOSSOCIAL, RESID&Ecirc;NCIA TERAP&Ecirc;UTICA E OUTROS PONTOS E A&Ccedil;&Otilde;ES DE ATEN&Ccedil;&Atilde;O EM SA&Uacute;DE MENTAL DESTE MUNICIPIO.</p>\n', '2013-12-02', '2014-01-01', '2013-12-02 20:28:42', 0, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `secretaria`
--

CREATE TABLE IF NOT EXISTS `secretaria` (
  `id_secretaria` varchar(50) NOT NULL,
  `titulo_secretaria` varchar(60) NOT NULL,
  `imagem_secretaria` varchar(70) DEFAULT NULL,
  `texto_secretaria` text,
  `status_secretaria` int(1) NOT NULL,
  PRIMARY KEY (`id_secretaria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `secretaria`
--

INSERT INTO `secretaria` (`id_secretaria`, `titulo_secretaria`, `imagem_secretaria`, `texto_secretaria`, `status_secretaria`) VALUES
('Sade', 'Saúde', NULL, '<p>N&oacute;s estamos trabalhando bla labl blalablabalbalbalbalba</p>\n', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(9) NOT NULL AUTO_INCREMENT,
  `nome_usuario` varchar(50) NOT NULL,
  `email_usuario` varchar(70) NOT NULL,
  `senha_usuario` varchar(50) NOT NULL,
  `status_usuario` int(1) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome_usuario`, `email_usuario`, `senha_usuario`, `status_usuario`) VALUES
(1, 'Hairton Sobral Silva', 'hairtonsena@yahoo.com.br', '25d55ad283aa400af464c76d713c07ad', 0);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `anexo_mural`
--
ALTER TABLE `anexo_mural`
  ADD CONSTRAINT `anexo_mural_ibfk_1` FOREIGN KEY (`id_mural`) REFERENCES `mural` (`id_mural`);

--
-- Limitadores para a tabela `anexo_pp`
--
ALTER TABLE `anexo_pp`
  ADD CONSTRAINT `fk_anexo_pp_pregra_presencial1` FOREIGN KEY (`id_pp`) REFERENCES `pregao_presencial` (`id_pp`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
