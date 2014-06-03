<?php

class instalar_model extends CI_Model {

    function cria_tabela_admin() {

        $query_criar_db = "CREATE TABLE IF NOT EXISTS `admin` (
          `idAdmin` int(3) NOT NULL AUTO_INCREMENT,
          `nomeAdmin` varchar(50) NOT NULL,
          `emailAdmin` varchar(70) NOT NULL,
          `senhaAdmin` varchar(50) NOT NULL,
          PRIMARY KEY (`idAdmin`)
        );";

        $this->db->query($query_criar_db);
    }

    function cria_tabela_status() {

        $query_criar_db = "CREATE TABLE IF NOT EXISTS `status` (
  `idStatus` int(1) NOT NULL AUTO_INCREMENT,
  `nomeStatus` varchar(50) NOT NULL,
  PRIMARY KEY (`idStatus`)
) ; ";

        $this->db->query($query_criar_db);
    }

    function cria_tabela_tipo() {
        $query_criar_db = "CREATE TABLE IF NOT EXISTS `tipo` (
  `idTipo` int(2) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(50) NOT NULL,
  PRIMARY KEY (`idTipo`)
);";
        $this->db->query($query_criar_db);
    }

    function cria_tabela_apoiocomentario() {
        $query_criar_db = "  CREATE TABLE IF NOT EXISTS `apoiocomentario` (
          `idComentario` int(11) NOT NULL,
          `idCidadao` int(11) NOT NULL,
          `statusApoio` int(1) NOT NULL
        );";
        $this->db->query($query_criar_db);
    }

    function cria_tabela_apoioproblema() {

        $query_criar_db = "CREATE TABLE IF NOT EXISTS `apoioproblema` (
  `idProblema` int(11) NOT NULL,
  `idCidadao` int(11) NOT NULL,
  `statusApoio` int(1) NOT NULL
);";

        $this->db->query($query_criar_db);
    }

    function cria_tabela_cidadao() {
        $query_criar_db = "CREATE TABLE IF NOT EXISTS `cidadao` (
  `idCidadao` int(11) NOT NULL AUTO_INCREMENT,
  `nomeCidadao` varchar(50) NOT NULL,
  `cpfCidadao` varchar(14) NOT NULL,
  `emailCidadao` varchar(70) NOT NULL,
  `senhaCidadao` varchar(50) NOT NULL,
  `estadoCidadao` int(2) NOT NULL,
  PRIMARY KEY (`idCidadao`)
);";
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
);";
        $this->db->query($query_criar_db);
    }

    function cria_tabela_denunciaproblema() {
        $query_criar_db = "CREATE TABLE IF NOT EXISTS `denunciaproblema` (
  `idProblema` int(11) NOT NULL,
  `idCidadao` int(11) NOT NULL,
  `statusDenuncia` int(1) NOT NULL
);";

        $this->db->query($query_criar_db);
    }

    function cria_tabela_gestor() {
        $query_criar_db = "CREATE TABLE IF NOT EXISTS `gestor` (
  `idGestor` int(11) NOT NULL AUTO_INCREMENT,
  `nomeGestor` varchar(50) NOT NULL,
  `emailGestor` varchar(70) NOT NULL,
  `senhaGestor` varchar(50) NOT NULL,
  `cpfGestor` varchar(14) NOT NULL,
  `estadoGestor` int(1) NOT NULL,
  PRIMARY KEY (`idGestor`)
);";
        $this->db->query($query_criar_db);
    }

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
  `imagemProblema` varchar(40),
  `idTipo` int(2) NOT NULL,
  `idStatus` int(1) NOT NULL,
  `idCidadao` int(11) NOT NULL,
  PRIMARY KEY (`idProblema`),
  KEY `idTipo` (`idTipo`),
  KEY `idStatus` (`idStatus`),
  KEY `idCidadao` (`idCidadao`)
);";
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

    function cria_tabela_reprovacomentario() {
        $query_criar_db = "CREATE TABLE IF NOT EXISTS `reprovacomentario` (
  `idComentario` int(11) NOT NULL,
  `idCidadao` int(11) NOT NULL,
  `statusReprova` int(1) NOT NULL
);";
        $this->db->query($query_criar_db);
    }

    function cria_tabela_configuracao() {
        $query_criar_db = "CREATE TABLE IF NOT EXISTS `configuracao` (
  `idConfiguracao` int(1) NOT NULL AUTO_INCREMENT,
  `nomeMunicipio` varchar(40) NOT NULL,
  `cnpjMunicipio` varchar(20) NOT NULL,
  `cepMunicipio` varchar(100) NOT NULL,
  `telefoneMunicipio` varchar(14) NOT NULL,
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
        $query_criar_db = "CREATE VIEW `vw_problema_com_apo_den` AS select `P`.`idProblema` AS `idProblema`,`P`.`descricao` AS `descricao`,`P`.`data` AS `data`,`P`.`dataInicioManutencao` AS `dataInicioManutencao`,`P`.`dataConclusaoManutencao` AS `dataConclusaoManutencao`,`P`.`dataPrevistaConclusao` AS `dataPrevistaConclusao`,`P`.`latitude` AS `latitude`,`P`.`longitude` AS `longitude`,`P`.`imagemProblema` AS `imagemProblema`,`P`.`idTipo` AS `idTipo`,`P`.`idStatus` AS `idStatus`,`P`.`idCidadao` AS `idCidadao`,`VC`.`qtde_comentario` AS `qtde_comentario`,`VA`.`qtde_apoio` AS `qtde_apoio`,`VD`.`qtde_denuncia` AS `qtde_denuncia` from (((`problema` `P` join `vw_qtde_comentario` `VC` on((`VC`.`idProblema` = `P`.`idProblema`))) join `vw_qtde_apoio` `VA` on((`VA`.`idProblema` = `P`.`idProblema`))) join `vw_qtde_denuncia` `VD` on((`VD`.`idProblema` = `P`.`idProblema`)));";
        $this->db->query($query_criar_db);
    }

    function cria_view_vw_consulta_comentario() {

        $query_criar_db = "CREATE VIEW `vw_consulta_comentarios` AS 
select `CP`.`idComentario` AS `idComentario`,`CP`.`textoComentario` AS `textoComentario`,`CP`.`dataComentario` AS `datacomentario`,`CP`.`statusComentario` AS `statusComentario`,`CP`.`idProblema` AS `idProblema`,`CP`.`idCidadao` AS `idCidadao`,`VQAC`.`qtde_apoio_comentario` AS `qtde_apoio_comentario`,`VQRC`.`qtde_reprovado_comentario` AS `qtde_reprovado_comentario` from ((`comentarioproblema` `CP` join `vw_qtde_apoio_comentario` `VQAC` on((`VQAC`.`idComentario` = `CP`.`idComentario`))) join `vw_qtde_reprovado_comentario` `VQRC` on((`VQRC`.`idComentario` = `CP`.`idComentario`)));";

        $this->db->query($query_criar_db);
    }

    function cria_view_vw_consulta_principal() {

        $query_criar_db = "CREATE VIEW `vw_consulta_principal` AS select `VPCAD`.`idProblema` AS `idProblema`,`VPCAD`.`descricao` AS `descricao`,`VPCAD`.`data` AS `data`,`VPCAD`.`dataInicioManutencao` AS `dataInicioManutencao`,`VPCAD`.`dataConclusaoManutencao` AS `dataConclusaoManutencao`,`VPCAD`.`dataPrevistaConclusao` AS `dataPrevistaConclusao`,`VPCAD`.`latitude` AS `latitude`,`VPCAD`.`longitude` AS `longitude`,`VPCAD`.`imagemProblema` AS `imagemProblema`,`VPCAD`.`idTipo` AS `idTipo`,`T`.`tipo` AS `tipo`,`VPCAD`.`idStatus` AS `idStatus`,`S`.`nomeStatus` AS `nomeStatus`,`VPCAD`.`idCidadao` AS `idCidadao`,`VPCAD`.`qtde_comentario` AS `qtde_comentario`,`VPCAD`.`qtde_apoio` AS `qtde_apoio`,`VPCAD`.`qtde_denuncia` AS `qtde_denuncia` from ((`vw_problema_com_apo_den` `VPCAD` join `tipo` `T` on((`T`.`idTipo` = `VPCAD`.`idTipo`))) join `status` `S` on((`S`.`idStatus` = `VPCAD`.`idStatus`)));";

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
                (1, 'Montes Claros - MG', '99.999.999/9999-99', 'Av. Cula Mangabeira, 211 - Centro', '(99)9999-9999', 'email@prefeitura.com.br', 'http://montesclaros.mg.gov.br/', -16.728605052902846, -43.86268436908722, 12, 1);";

        $this->db->query($query_criar_db);
    }

    function virificarTabelaExiste($talela) {
        return $this->db->get($talela);
    }

}

?>
