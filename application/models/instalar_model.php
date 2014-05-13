<?php

class instalar_model extends CI_Model {

    function cria_tabela_admin() {

        $query_criar_db = "CREATE TABLE IF NOT EXISTS `admin` (
          `idAdmin` int(3) NOT NULL AUTO_INCREMENT,
          `nomeAdmin` varchar(50) NOT NULL,
          `emailAdmin` varchar(70) NOT NULL,
          `senhaAdmin` varchar(50) NOT NULL,
          PRIMARY KEY (`idAdmin`)
        )";

        $this->db->query($query_criar_db);
    }

    function cria_tabela_status() {

        $query_criar_db = "CREATE TABLE IF NOT EXISTS `status` (
  `idStatus` int(1) NOT NULL AUTO_INCREMENT,
  `nomeStatus` varchar(50) NOT NULL,
  PRIMARY KEY (`idStatus`)
)  ";

        $this->db->query($query_criar_db);
    }

    function cria_tabela_tipo() {
        $query_criar_db = "CREATE TABLE IF NOT EXISTS `tipo` (
  `idTipo` int(2) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(50) NOT NULL,
  PRIMARY KEY (`idTipo`)
)";
        $this->db->query($query_criar_db);
    }

    function cria_tabela_apoiocomentario() {
        $query_criar_db = "  CREATE TABLE IF NOT EXISTS `apoiocomentario` (
          `idComentario` int(11) NOT NULL,
          `idCidadao` int(11) NOT NULL,
          `statusApoio` int(1) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
        $this->db->query($query_criar_db);
    }

//   dados apoiocomentario     
//        $query_criar_db[] = "INSERT INTO `apoiocomentario` (`idComentario`, `idCidadao`, `statusApoio`) VALUES
//(24, 2, 1),
//(20, 2, 1),
//(18, 2, 1),
//(7, 2, 1),
//(23, 2, 1);";
//-- --------------------------------------------------------
//
//--
//-- Estrutura da tabela `apoioproblema`
//--

    function cria_tabela_apoioproblema() {

        $query_criar_db = "CREATE TABLE IF NOT EXISTS `apoioproblema` (
  `idProblema` int(11) NOT NULL,
  `idCidadao` int(11) NOT NULL,
  `statusApoio` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";


        $this->db->query($query_criar_db);
    }

//--
//-- Extraindo dados da tabela `apoioproblema`
//--
//        $query_criar_db[] = "INSERT INTO `apoioproblema` (`idProblema`, `idCidadao`, `statusApoio`) VALUES
//(29, 2, 1),
//(26, 2, 1),
//(13, 2, 1),
//(1, 2, 1),
//(6, 2, 1),
//(9, 2, 1),
//(2, 2, 1),
//(7, 2, 1),
//(16, 2, 1),
//(29, 4, 1);";
//
//-- --------------------------------------------------------
//
//--
//-- Estrutura da tabela `cidadao`
//--
    function cria_tabela_cidadao() {
        $query_criar_db = "CREATE TABLE IF NOT EXISTS `cidadao` (
  `idCidadao` int(11) NOT NULL AUTO_INCREMENT,
  `nomeCidadao` varchar(50) NOT NULL,
  `cpfCidadao` varchar(14) NOT NULL,
  `emailCidadao` varchar(70) NOT NULL,
  `senhaCidadao` varchar(50) NOT NULL,
  `estadoCidadao` int(2) NOT NULL,
  PRIMARY KEY (`idCidadao`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;";
        $this->db->query($query_criar_db);
    }

//--
//-- Extraindo dados da tabela `cidadao`
//--
//        $query_criar_db[] = "INSERT INTO `cidadao` (`idCidadao`, `nomeCidadao`, `cpfCidadao`, `emailCidadao`, `senhaCidadao`, `estadoCidadao`) VALUES
//(2, 'Hairton Sobral Silva', '87987656787', 'hairtonsena@yahoo.com.br', '25d55ad283aa400af464c76d713c07ad', 1),
//(3, 'Hairton no hotm', '11111111111', 'hairtonsena@hotmail.com', 'c35b838405fcc23b253e22baec5488c7', 1),
//(4, 'outro', '88888', 'outro@outro.com', '582e5ec05d351d80103a7d463f38b32a', 1),
//(7, 'MaesBalada', '12324345676', 'maesbalada.com@gmail.com', '45aabeadbdd9f14710fa00d6f275caeb', 1),
//(8, 'teste 01', '09876543542', 'hairtontcc@yahoo.com.br', 'dcbacadf485c141a2b9b0028f2c0b2e1', 1),
//(9, 'VILSON CORDEIRO SILVA', '08932933692', 'vilson0800@yahoo.com.br', '25d55ad283aa400af464c76d713c07ad', 1),
//(10, 'hairton', '11111111111', '', 'd41d8cd98f00b204e9800998ecf8427e', 1),
//(15, 'danilo', '12345678909', 'danilo@danilo.com', '62bf43e2db266caa78d4f0bd18fb5f7e', 1),
//(16, 'teste', '10366182692', 'teste@teste.com', 'e10adc3949ba59abbe56e057f20f883e', 1),
//(17, 'Helder', '08303475690', 'helderseixas@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1),
//(18, 'Vilson Cordeiro', '08932933693', 'vilson0800@yahoo.com', '25d55ad283aa400af464c76d713c07ad', 1);";
//-- --------------------------------------------------------
//
//--
//-- Estrutura da tabela `comentarioproblema`
//--

    function cria_tabela_comentarioproblema() {
        $query_criar_db = "CREATE TABLE IF NOT EXISTS `comentarioproblema` (
  `idComentario` int(11) NOT NULL AUTO_INCREMENT,
  `textoComentario` text NOT NULL,
  `dataComentario` date NOT NULL,
  `apoiadoComentario` int(11) NOT NULL,
  `reprovadoComentario` int(11) NOT NULL,
  `statusComentario` int(1) NOT NULL,
  `idProblema` int(11) NOT NULL,
  `idCidadao` int(11) NOT NULL,
  PRIMARY KEY (`idComentario`),
  KEY `idProblema` (`idProblema`),
  KEY `idCidadao` (`idCidadao`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;";
        $this->db->query($query_criar_db);
    }

//--
//-- Extraindo dados da tabela `comentarioproblema`
//--
//        $query_criar_db[] = "INSERT INTO `comentarioproblema` (`idComentario`, `textoComentario`, `dataComentario`, `apoiadoComentario`, `reprovadoComentario`, `idProblema`, `idCidadao`) VALUES
//(2, 'Realmente esta muito Perigoso!', '2013-04-17', 0, 0, 8, 3),
//(7, 'isso ai vei', '2013-04-18', 0, 0, 6, 2),
//(8, 'bla bla bla bla bla bla bla bla bla bla bla bla bla bla blabla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla v bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla  bla bla bla', '2013-04-18', 0, 0, 8, 2),
//(9, 'bla bla bla bla bla bla bla bla bla bla bla bla bla bla blabla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla v bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla', '2013-04-18', 0, 0, 8, 2),
//(11, 'esta munto rum a passagem neste local', '2013-05-10', 0, 0, 10, 2),
//(12, 'Ta mesmo', '2013-05-14', 0, 0, 11, 2),
//(15, 'Testando uma comentário para ver como vai ficar depois que estiver tudo correto. então vamos ver como vai se sair, ok!', '2013-06-06', 2, 1, 9, 2),
//(16, 'ultimo', '2013-06-15', 2, 1, 6, 2),
//(17, 'abcd', '2014-03-19', 0, 0, 6, 2),
//(18, 'Este é mais um comentário de teste.', '2014-03-22', 0, 0, 9, 2),
//(19, 'Outro comentário de teste para nos ajudar a conferir com esta nossos texto e o fluxo de dados neste parte.', '2014-03-22', 0, 0, 9, 2),
//(20, 'Agora vamos teste  se a janela ultrapassa a borda da pagina pois se passar teremos que dar um jeito para não ultrapassar, mas se criar um barra de rolagem no canto direito esta tudo bem.', '2014-03-22', 0, 0, 9, 2),
//(21, 'Mais ou menos ', '2014-03-22', 0, 0, 13, 2),
//(23, 'bbbbbbbbbbbbbbb', '2014-03-22', 0, 0, 26, 2),
//(24, 'Agora parece que que esta certo.', '2014-03-22', 0, 0, 9, 2),
//(25, 'gggggggggggggggggg', '2014-04-07', 0, 0, 26, 4),
//(26, 'hhhhhhhhhhhhhhhh', '2014-04-07', 0, 0, 26, 4),
//(27, 'iiiiiiiiiiiiiiiiiii', '2014-04-07', 0, 0, 26, 4),
//(28, 'jjjjjjjjjjjjjjjjjjjjjjj', '2014-04-07', 0, 0, 26, 4),
//(29, 'bla bla bla bla', '2014-04-07', 0, 0, 16, 4),
//(30, 'ccccccccccccc', '2014-04-07', 0, 0, 16, 4);";
//-- --------------------------------------------------------
//
//--
//-- Estrutura da tabela `denunciaproblema`
//--
    function cria_tabela_denunciaproblema() {
        $query_criar_db = "CREATE TABLE IF NOT EXISTS `denunciaproblema` (
  `idProblema` int(11) NOT NULL,
  `idCidadao` int(11) NOT NULL,
  `statusDenuncia` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

        $this->db->query($query_criar_db);
    }

//--
//-- Extraindo dados da tabela `denunciaproblema`
//--
//        $query_criar_db[] = "INSERT INTO `denunciaproblema` (`idProblema`, `idCidadao`, `statusDenuncia`) VALUES
//(29, 2, 1),
//(7, 2, 1),
//(16, 2, 1);";
//-- --------------------------------------------------------
//
//--
//-- Estrutura da tabela `gestor`
//--
    function cria_tabela_gestor() {
        $query_criar_db = "CREATE TABLE IF NOT EXISTS `gestor` (
  `idGestor` int(11) NOT NULL AUTO_INCREMENT,
  `nomeGestor` varchar(50) NOT NULL,
  `emailGestor` varchar(70) NOT NULL,
  `senhaGestor` varchar(50) NOT NULL,
  `cpfGestor` varchar(14) NOT NULL,
  `estadoGestor` int(1) NOT NULL,
  PRIMARY KEY (`idGestor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;";
        $this->db->query($query_criar_db);
    }

//--
//-- Extraindo dados da tabela `gestor`
//--
//        $query_criar_db[] = "INSERT INTO `gestor` (`idGestor`, `nomeGestor`, `emailGestor`, `senhaGestor`, `cpfGestor`, `estadoGestor`) VALUES
//(2, 'Hairton Sobral', 'hairtonsena@yahoo.com.br', '25d55ad283aa400af464c76d713c07ad', '12234433111', 1);";
//-- --------------------------------------------------------
//
//--
//-- Estrutura da tabela `problema`
//--
    function cria_tabela_problema() {
        $query_criar_db = "CREATE TABLE IF NOT EXISTS `problema` (
  `idProblema` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` text NOT NULL,
  `data` date NOT NULL,
  `dataInicioManutencao` date NOT NULL,
  `dataConclusaoManutencao` date NOT NULL,
  `dataPrevistaConclusao` date NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL,
  `idTipo` int(2) NOT NULL,
  `idStatus` int(1) NOT NULL,
  `idCidadao` int(11) NOT NULL,
  PRIMARY KEY (`idProblema`),
  KEY `idTipo` (`idTipo`),
  KEY `idStatus` (`idStatus`),
  KEY `idCidadao` (`idCidadao`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;";
        $this->db->query($query_criar_db);
    }

//-- ALTER TABLE `comentarioproblema`
//--  ADD CONSTRAINT `comentarioproblema_ibfk_1` FOREIGN KEY (`idProblema`) REFERENCES `problema` (`idProblema`),
//--  ADD CONSTRAINT `comentarioproblema_ibfk_2` FOREIGN KEY (`idCidadao`) REFERENCES `cidadao` (`idCidadao`);
//-- ALTER TABLE `problema`
// -- ADD CONSTRAINT `problema_ibfk_1` FOREIGN KEY (`idTipo`) REFERENCES `tipo` (`idTipo`),
// -- ADD CONSTRAINT `problema_ibfk_2` FOREIGN KEY (`idCidadao`) REFERENCES `cidadao` (`idCidadao`);
//--
//-- Extraindo dados da tabela `problema`
//--
//        $query_criar_db[] = "INSERT INTO `problema` (`idProblema`, `descricao`, `data`, `dataInicioManutencao`, `dataConclusaoManutencao`, `dataPrevistaConclusao`, `latitude`, `longitude`, `idTipo`, `idStatus`, `idCidadao`) VALUES
//(1, 'test''e as teste', '2013-04-10', '0000-00-00', '2013-05-30', '2013-04-27', '-16.73386566768085', ' -43.84815216064453', 1, 5, 2),
//(2, 'Placa pare quebrada, ainda não foi resolvido este problema', '2013-04-12', '2013-04-16', '2013-05-27', '2013-04-30', '-16.73374237368369', ' -43.86021137237549', 7, 1, 4),
//(4, 'teste yhjhgjg', '2013-04-14', '0000-00-00', '0000-00-00', '2013-04-26', '-16.74668780774875', ' -43.85913848876953', 7, 1, 2),
//(5, 'muito engarrafamento nesta rua.', '2013-04-14', '2013-04-16', '2013-04-16', '2013-04-30', '-16.75819412146239', ' -43.86909484863281', 7, 1, 2),
//(6, 'Esgoto a céu aberto neste local', '2012-03-20', '0000-00-00', '0000-00-00', '0000-00-00', '-16.753170468255437', ' -43.867796659469604', 9, 4, 2),
//(7, 'Tem um areia em cima de calsada impedindo de passar', '2013-04-17', '2013-04-17', '0000-00-00', '2013-04-30', '-16.763453918880025', ' -43.84986877441406', 10, 5, 3),
//(8, 'Arvore caída na fiação', '2013-04-17', '2013-05-25', '0000-00-00', '0000-00-00', '-16.72926263769018', ' -43.857421875', 3, 1, 3),
//(9, 'um cano esta furado neste local', '2013-04-21', '2013-04-21', '2013-05-29', '2013-04-30', '-16.72148963496427', ' -43.859792947769165', 11, 4, 3),
//(10, 'toda vez que chove esta causando alagamento neste local por conta de um boeiro entupido.', '2013-05-10', '0000-00-00', '0000-00-00', '0000-00-00', '-16.721736238727814', ' -43.859782218933105', 5, 1, 2),
//(11, 'O fio esta quase caindo neste local', '2013-05-14', '0000-00-00', '0000-00-00', '0000-00-00', '-16.722928152422945', ' -43.86165976524353', 3, 1, 2),
//(12, 'muitos roubos ', '2013-05-22', '0000-00-00', '0000-00-00', '0000-00-00', '-16.73352660899671', ' -43.851553201675415', 4, 1, 2),
//(13, 'Testando outros modelos', '2013-05-24', '0000-00-00', '0000-00-00', '0000-00-00', '-16.739316210085136', ' -43.86295795440674', 13, 4, 2),
//(14, 'Calçada com muitos degraus', '2013-05-24', '0000-00-00', '0000-00-00', '0000-00-00', '-16.744607350896896', ' -43.85535657405853', 10, 1, 3),
//(15, 'bla bla bla bla bla', '2013-05-24', '0000-00-00', '0000-00-00', '0000-00-00', '-16.744504611698', ' -43.85412812232971', 2, 3, 3),
//(16, 'Manifestação para testa email', '2013-05-25', '0000-00-00', '0000-00-00', '0000-00-00', '-16.747232318628463', ' -43.86023283004761', 13, 4, 7),
//(17, 'Este é um  Post  para  teste  aos  aspas simples e  dupla. kkk.', '2013-05-29', '0000-00-00', '0000-00-00', '0000-00-00', '-16.70346614696644', ' -43.876487016677856', 1, 3, 3),
//(18, '', '2013-05-29', '0000-00-00', '0000-00-00', '0000-00-00', '-16.704457791321477', ' -43.87347221374512', 13, 1, 3),
//(20, 'Testando se vai dar certo', '2013-05-30', '0000-00-00', '0000-00-00', '0000-00-00', '-16.723912551280762', ' -43.84138226509094', 6, 1, 2),
//(21, 'jjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj editada', '2013-05-30', '0000-00-00', '0000-00-00', '0000-00-00', '-16.723794388365693', ' -43.84144127368927', 1, 1, 2),
//(22, 'bla bla bla', '2013-05-30', '0000-00-00', '0000-00-00', '0000-00-00', '-16.743186655496256', ' -43.879265785217285', 7, 1, 2),
//(23, 'bal bla bal balb', '2013-05-30', '0000-00-00', '0000-00-00', '0000-00-00', '-16.73692342961122', ' -43.86645555496216', 10, 1, 2),
//(26, 'faltando segurança nos terminais de transporte publico', '2013-06-02', '0000-00-00', '0000-00-00', '0000-00-00', '-16.759622602304955', ' -43.87482404708862', 4, 4, 9),
//(27, 'Aqui encontra um cano furado que esta vazando muita agua', '2013-06-12', '0000-00-00', '0000-00-00', '0000-00-00', '-16.724961605172997', ' -43.868405520915985', 11, 1, 2),
//(28, 'gggggggggg', '2013-09-05', '0000-00-00', '0000-00-00', '0000-00-00', '-16.740835757574764', ' -43.88660430908203', 7, 1, 2),
//(29, 'O poste esta com a lampada queimada e esta muito escuro.', '2014-03-17', '0000-00-00', '0000-00-00', '0000-00-00', '-16.71529931045523', ' -43.863274455070496', 3, 4, 2),
//(30, 'Teste de Tempo de manifestação', '2014-03-20', '0000-00-00', '0000-00-00', '0000-00-00', '-16.713808795640052', ' -43.83390426635742', 3, 1, 2),
//(31, 'Um deste de manifestação com o botão direito.', '2014-03-22', '0000-00-00', '0000-00-00', '0000-00-00', '-16.73353688351116', ' -43.84986877441406', 12, 1, 2),
//(32, 'mais um teste', '2014-03-22', '0000-00-00', '0000-00-00', '0000-00-00', '-16.739126137243588', ' -43.85021209716797', 12, 1, 2),
//(33, 'vamos ver o que dá', '2014-03-22', '0000-00-00', '0000-00-00', '0000-00-00', '-16.707396727757207', ' -43.84489059448242', 11, 1, 2),
//(34, 'Teste de login ', '2014-03-24', '0000-00-00', '0000-00-00', '0000-00-00', '-16.740770004195095', ' -43.875789642333984', 1, 1, 2),
//(35, 'Parece que agora vai dar certo', '2014-03-24', '0000-00-00', '0000-00-00', '0000-00-00', '-16.739290524577097', ' -43.87836456298828', 2, 1, 2),
//(36, 'Agora parece que esta dando certo.', '2014-03-25', '0000-00-00', '0000-00-00', '0000-00-00', '-16.72170027569882', ' -43.875789642333984', 12, 4, 2),
//(37, 'desperdício de água neste local', '2014-03-25', '0000-00-00', '0000-00-00', '0000-00-00', '-16.715617288653238', ' -43.87235641479492', 11, 1, 2),
//(38, 'mais um teste ', '2014-04-03', '0000-00-00', '0000-00-00', '0000-00-00', '-16.730002417864426', ' -43.8863468170166', 2, 1, 2),
//(39, 'bla bla bla', '2014-04-03', '0000-00-00', '0000-00-00', '0000-00-00', '-16.72276888852419', ' -43.88583183288574', 1, 1, 2),
//(40, 'jjjjjjjjjjjjjjjj', '2014-04-03', '0000-00-00', '0000-00-00', '0000-00-00', '-16.713973204804134', ' -43.88385772705078', 1, 1, 2),
//(41, 'tttttttttt', '2014-04-03', '0000-00-00', '0000-00-00', '0000-00-00', '-16.71668593555792', ' -43.89115333557129', 1, 1, 2),
//(42, 'vamos fazer mais um teste', '2014-04-07', '0000-00-00', '0000-00-00', '0000-00-00', '-16.69703831697391', ' -43.84025573730469', 1, 4, 2),
//(43, 'bla bal blasdlasljsad ', '2014-04-07', '0000-00-00', '0000-00-00', '0000-00-00', '-16.715781696258965', ' -43.880767822265625', 2, 4, 2),
//(44, 'agora eu acho que deu certo', '2014-04-07', '0000-00-00', '0000-00-00', '0000-00-00', '-16.698846968868477', ' -43.87493133544922', 2, 4, 2);";
//-- --------------------------------------------------------
//
//--
//-- Estrutura da tabela `reprovacomentario`
//--
    function cria_tabela_reprovacomentario() {
        $query_criar_db = "CREATE TABLE IF NOT EXISTS `reprovacomentario` (
  `idComentario` int(11) NOT NULL,
  `idCidadao` int(11) NOT NULL,
  `statusReprova` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
        $this->db->query($query_criar_db);
    }

//--
//-- Extraindo dados da tabela `reprovacomentario`
//--
//        $query_criar_db[] = "INSERT INTO `reprovacomentario` (`idComentario`, `idCidadao`, `statusReprova`) VALUES
//(24, 2, 1),
//(21, 2, 1),
//(17, 2, 1),
//(16, 2, 1),
//(18, 2, 1),
//(23, 2, 1);";



    function cria_tabela_configuracao() {
        $query_criar_db = "CREATE TABLE IF NOT EXISTS `configuracao` (
  `idConfiguracao` int(1) NOT NULL AUTO_INCREMENT,
  `nomeMunicipio` varchar(40) NOT NULL,
  `cnpjMunicipio` varchar(20) NOT NULL,
  `cepMunicipio` varchar(10) NOT NULL,
  `telefoneMunicipio` varchar(10) NOT NULL,
  `emailMunicipio` varchar(70) DEFAULT NULL,
  `siteMunicipio` varchar(70) DEFAULT NULL,
  `latitudeCentralMunicipio` double NOT NULL,
  `longitudeCentralMunicipio` double NOT NULL,
  `zoomMapsInicial` int(3) NOT NULL,
  `streetViewMaps` int(1) DEFAULT NULL,
  PRIMARY KEY (`idConfiguracao`)
) ";

        $this->db->query($query_criar_db);
    }

    function cria_view_vw_qtde_apoio() {

        $query_criar_db = "CREATE VIEW `vw_qtde_apoio` AS select `P`.`idProblema` AS `idProblema`,count(`AP`.`statusApoio`) AS `qtde_apoio` from (`problema` `P` left join `apoioproblema` `AP` on((`AP`.`idProblema` = `P`.`idProblema`))) group by `P`.`idProblema`;";
        $this->db->query($query_criar_db);
    }

    function cria_view_vw_qtde_apoio_comentario() {
        $query_criar_db = "CREATE VIEW `vw_qtde_apoio_comentario` AS select `CP`.`idComentario` AS `idComentario`,count(`AC`.`statusApoio`) AS `qtde_apoio_comentario` from (`comentarioproblema` `CP` left join `apoiocomentario` `AC` on((`AC`.`idComentario` = `CP`.`idComentario`))) group by `CP`.`idComentario`;";

        $this->db->query($query_criar_db);
    }

    function cria_view_vw_qtde_comentario() {
        $query_criar_db = "CREATE VIEW `vw_qtde_comentario` AS select `P`.`idProblema` AS `idProblema`,count(`CP`.`idComentario`) AS `qtde_comentario` from (`problema` `P` left join `comentarioproblema` `CP` on((`CP`.`idProblema` = `P`.`idProblema`))) group by `P`.`idProblema`;";

        $this->db->query($query_criar_db);
    }

    function cria_view_vw_qtde_denuncia() {
        $query_criar_db = "CREATE VIEW `vw_qtde_denuncia` AS select `P`.`idProblema` AS `idProblema`,count(`DP`.`statusDenuncia`) AS `qtde_denuncia` from (`problema` `P` left join `denunciaproblema` `DP` on((`DP`.`idProblema` = `P`.`idProblema`))) group by `P`.`idProblema`;";
        $this->db->query($query_criar_db);
    }

    function cria_view_vw_qtde_reprovado_comentario() {
        $query_criar_db = "CREATE VIEW `vw_qtde_reprovado_comentario` AS select `CP`.`idComentario` AS `idComentario`,count(`RC`.`statusReprova`) AS `qtde_reprovado_comentario` from (`comentarioproblema` `CP` left join `reprovacomentario` `RC` on((`RC`.`idComentario` = `CP`.`idComentario`))) group by `CP`.`idComentario`;";
        $this->db->query($query_criar_db);
    }

    function cria_view_vw_problema_com_apo_den() {
        $query_criar_db = "CREATE VIEW `vw_problema_com_apo_den` AS select `P`.`idProblema` AS `idProblema`,`P`.`descricao` AS `descricao`,`P`.`data` AS `data`,`P`.`dataInicioManutencao` AS `dataInicioManutencao`,`P`.`dataConclusaoManutencao` AS `dataConclusaoManutencao`,`P`.`dataPrevistaConclusao` AS `dataPrevistaConclusao`,`P`.`latitude` AS `latitude`,`P`.`longitude` AS `longitude`,`P`.`idTipo` AS `idTipo`,`P`.`idStatus` AS `idStatus`,`P`.`idCidadao` AS `idCidadao`,`VC`.`qtde_comentario` AS `qtde_comentario`,`VA`.`qtde_apoio` AS `qtde_apoio`,`VD`.`qtde_denuncia` AS `qtde_denuncia` from (((`problema` `P` join `vw_qtde_comentario` `VC` on((`VC`.`idProblema` = `P`.`idProblema`))) join `vw_qtde_apoio` `VA` on((`VA`.`idProblema` = `P`.`idProblema`))) join `vw_qtde_denuncia` `VD` on((`VD`.`idProblema` = `P`.`idProblema`)));";
        $this->db->query($query_criar_db);
    }

    function cria_view_vw_consulta_comentario() {

        $query_criar_db = "CREATE VIEW `vw_consulta_comentarios` AS 
select `CP`.`idComentario` AS `idComentario`,`CP`.`textoComentario` AS `textoComentario`,`CP`.`dataComentario` AS `datacomentario`,`CP`.`statusComentario` AS `statusComentario`,`CP`.`idProblema` AS `idProblema`,`CP`.`idCidadao` AS `idCidadao`,`VQAC`.`qtde_apoio_comentario` AS `qtde_apoio_comentario`,`VQRC`.`qtde_reprovado_comentario` AS `qtde_reprovado_comentario` from ((`comentarioproblema` `CP` join `vw_qtde_apoio_comentario` `VQAC` on((`VQAC`.`idComentario` = `CP`.`idComentario`))) join `vw_qtde_reprovado_comentario` `VQRC` on((`VQRC`.`idComentario` = `CP`.`idComentario`)));";

        $this->db->query($query_criar_db);
    }

    function cria_view_vw_consulta_principal() {

        $query_criar_db = "CREATE VIEW `vw_consulta_principal` AS select `VPCAD`.`idProblema` AS `idProblema`,`VPCAD`.`descricao` AS `descricao`,`VPCAD`.`data` AS `data`,`VPCAD`.`dataInicioManutencao` AS `dataInicioManutencao`,`VPCAD`.`dataConclusaoManutencao` AS `dataConclusaoManutencao`,`VPCAD`.`dataPrevistaConclusao` AS `dataPrevistaConclusao`,`VPCAD`.`latitude` AS `latitude`,`VPCAD`.`longitude` AS `longitude`,`VPCAD`.`idTipo` AS `idTipo`,`T`.`tipo` AS `tipo`,`VPCAD`.`idStatus` AS `idStatus`,`S`.`nomeStatus` AS `nomeStatus`,`VPCAD`.`idCidadao` AS `idCidadao`,`VPCAD`.`qtde_comentario` AS `qtde_comentario`,`VPCAD`.`qtde_apoio` AS `qtde_apoio`,`VPCAD`.`qtde_denuncia` AS `qtde_denuncia` from ((`vw_problema_com_apo_den` `VPCAD` join `tipo` `T` on((`T`.`idTipo` = `VPCAD`.`idTipo`))) join `status` `S` on((`S`.`idStatus` = `VPCAD`.`idStatus`)));";

        $this->db->query($query_criar_db);
    }

    function inserir_dados_status() {

        // dados status
        $query_criar_db = "INSERT INTO `status` (`idStatus`, `nomeStatus`) VALUES
            (1, 'Aguardando validação'),
            (2, 'Colaboração rejeitada'),
            (3, 'Colaboração pendente'),
            (4, 'Colaboração aceita '),
            (5, 'Em andamento'),
            (6, 'Resolvido'); ";

        $this->db->query($query_criar_db);
    }

    function inserir_dados_tipo() {
        //  dados tipo      
        $query_criar_db = "INSERT INTO `tipo` (`idTipo`, `tipo`) VALUES
        (1, 'Buraco na rua'),
        (2, 'Coleta de lixo'),
        (3, 'Iluminação'),
        (4, 'Segurança'),
        (5, 'Alagamento'),
        (6, 'Arborização'),
        (7, 'Trânsito'),
        (8, 'Serviços públicos'),
        (9, 'Saneamento básico'),
        (10, 'Acessibilidade'),
        (11, 'Vazamento de água'),
        (12, 'Entulhos'),
        (13, 'Outros');";
        $this->db->query($query_criar_db);
    }

    function inserir_dados_configuracao() {
        // dados de configuração 
        $query_criar_db = "INSERT INTO `configuracao` (`idConfiguracao`, `nomeMunicipio`, `cnpjMunicipio`, `cepMunicipio`, `telefoneMunicipio`, `emailMunicipio`, `siteMunicipio`, `latitudeCentralMunicipio`, `longitudeCentralMunicipio`, `zoomMapsInicial`, `streetViewMaps`) VALUES
                (1, 'São João da Ponte -MG', '99.999.999/9999-99', '39430-000', '3234-1512', 'email@prefeitura.com.br', 'pmsaojoaodaponte', -16.728605052902846, -43.86268436908722, 10, 1);";

        $this->db->query($query_criar_db);
    }

    
    
    function virificarTabelaExiste($talela){
        return $this->db->get($talela);
    }
    
}

?>
