var Problema = {
    adicionarPontoMapa: function(location) {
        //        alert(location);
        var parametro = "local=" + location;
        var url = Config.base_url + "colaboracao/formularioNovaColaboracao";
        CarregarPagina.carregarConteudo(url, parametro)
    },
    salvarProblema: function() {

        var latitude = $('#latitude').val();
        var longitude = $('#longitude').val();
        var tipo = $("#tipo").val();
        var descricao = $("#descricao").val();

        var parametro = "latitude=" + latitude + "&longitude=" + longitude + "&tipo=" + tipo + "&descricao=" + descricao;
        var url = Config.base_url + "colaboracao/salvarNovaColaboracao";
        CarregarPagina.carregarConteudo(url, parametro);

        return false;
    },
    editarColaboracao: function(idProblema) {

        Tela.abrirModal();
        var parametro = "idProblema=" + idProblema;
        var url = Config.base_url + "colaboracao/formeEditarColaboracao";
        CarregarPagina.carregarConteudo(url, parametro);
    },
    alterarColaboracaoPendente: function() {


        var idProblema = $('#idProblema').val();
        var tipo = $("#tipo").val();
        var descricao = $("#descricao").val();

        var parametro = "idProblema=" + idProblema + "&tipo=" + tipo + "&descricao=" + descricao;
        var url = Config.base_url + "colaboracao/alterarColaboracaoPendente";
        CarregarPagina.carregarConteudo(url, parametro);

        return false;

    },
    verColaboracoes: function() {
        var colabocaoCidadao = 0;
        if ($("#minhasColaboracoes").is(':checked', true)) {
            colabocaoCidadao = 1;
        } else {
            colabocaoCidadao = 0;
        }
        var status = $("#status").val();
        var categoria = $("#categoria").val();
        var ordem = $("#ordem").val();

        Tela.abrirModal();
        Conteudo.generateRandomMarkers(status, categoria, ordem, colabocaoCidadao, 0);
        Tela.fecharModal();
    },
    verColaboracoesCidadao: function() {
        var colabocaoCidadao = 0;
        if ($("#minhasColaboracoes").is(':checked', true)) {
            colabocaoCidadao = 1;
        } else {
            colabocaoCidadao = 0;
        }

        var ordem = $("#ordem").val();
        var status = $("#status").val();
        var categoria = $("#categoria").val();

        Conteudo.generateRandomMarkers(status, categoria, ordem, colabocaoCidadao, 0);

    },
    focaProblemaAdicionado: function(idProblema) {

        //        Tela.fecharModal();
        Conteudo.generateRandomMarkers(-1, -1, idProblema);

    },
    pesquisaLocal: function() {


        //        $('#myModal').modal('show');

        // var opcaoPesquisa = $("#opcaoPesquisa").val();
        var textePesquisa = $("#textoPesquisa").val();
        textePesquisa = $.trim(textePesquisa);
        //        if(textePesquisa.length<1){           
        //            textePesquisa = 'Raimundo penalva';
        //        }

        var localizacao = textePesquisa + ', Montes Claros, Minas gerais';
        Conteudo.mostraEndereco(localizacao);

    },
    confirmaConclusaoProblema: function(idProblema) {

        var parametro = "idProblema=" + idProblema;
        var url = Config.base_url + "colaboracao/confirmaConclusaoProblema";

        CarregarPagina.carregarConteudo(url, parametro);

    },
    apoiaProblema: function(idProblema) {

        var nomeid = "#numApoio" + idProblema;
        var nomeidB = "#numApoioB" + idProblema;
        var botaoApoio = "#botaoApoio" + idProblema;
        var botaoApoioB = "#botaoApoioB" + idProblema;

        $(botaoApoio).attr('disabled', 'true');
        $(botaoApoioB).attr('disabled', 'true');

        var num = $(nomeid).html();
        num++

        $(nomeid).html(num);
        $(nomeidB).html(num);

        var parametro = "idProblema=" + idProblema;
        var url = Config.base_url + "colaboracao/apoiarProblema";

        CarregarPagina.carregarConteudo(url, parametro);
    },
    reprovadoProblema: function(idProblema) {

        var nomeid = "#numReprova" + idProblema;
        var botaoReprova = "#botaoReprova" + idProblema;

        $(botaoReprova).attr('disabled', 'true');

        var num = $(nomeid).html();
        num++
        $(nomeid).html(num);

        var parametro = "idProblema=" + idProblema;
        var url = Config.base_url + "colaboracao/reprovaProblema";

        CarregarPagina.carregarConteudo(url, parametro);
    },
    formeComentaProblema: function(idProblema) {

        var parametro = "acao=formularioComentarioProblema&&idProblema=" + idProblema;
        var url = "php/problema/problema.php";

        CarregarPagina.carregarConteudo(url, parametro);

    },
    salvarComentario: function() {
        var idProblema = $("#idProblema").val();
        var comentario = $("#comentario").val();

        var parametro = "idProblema=" + idProblema + '&&comentario=' + comentario;
        var url = Config.base_url + "comentario/salvarNovoComentarioProblema";

        CarregarPagina.carregarConteudo(url, parametro)



        return false;
    },
    verTodosComentario: function(idProblema) {
        Tela.abrirModal();
        var parametro = "acao=verComentarios&&idProblema=" + idProblema;
        var url = Config.base_url + "comentario/verComentarios";
        CarregarPagina.carregarConteudo(url, parametro);

    },
    verTodosComentarios: function(idProblema) {
        var parametro = "acao=verComentarios&&idProblema=" + idProblema;
        var url = Config.base_url + "comentario/verComentarios";
        CarregarPagina.carregarConteudo(url, parametro);

    },            
    apoiaComentario: function(idComentario) {

        var nomeid = "#numApoioComentario" + idComentario;
        var botaoApoioComentario = "#botaoApoiocomentario" + idComentario;

        $(botaoApoioComentario).attr('disabled', 'true');

        var num = $(nomeid).html();
        num++
        $(nomeid).html(num);

        var parametro = "idComentario=" + idComentario;
        var url = Config.base_url + "comentario/apoiaComentario";
        CarregarPagina.enviarDadosComentairo(url, parametro);


    },
    reprovadoComentario: function(idComentario) {
       
       
        var nomeid = "#numReprovaComentario" + idComentario;
        var botaoReprovaComentario = "#botaoReprovaComentario" + idComentario;

        $(botaoReprovaComentario).attr('disabled', 'true');

        var num = $(nomeid).html();
        num++
        $(nomeid).html(num);
       
        var parametro = "idComentario=" + idComentario;
        var url = Config.base_url + "comentario/reprovarComentario";
        CarregarPagina.enviarDadosComentairo(url, parametro);
    }
};


Cadastro = {
    formeLoginCidadao: function(local) {

        Tela.abrirModal();
        var url = Config.base_url + "seguranca";
        var parametro = 'local=' + local;
        CarregarPagina.carregarConteudo(url, parametro);
    },
    VerificarUserCidadao: function() {

        var email = $('#email').val();
        var senha = $('#senha').val();
        var textoImagem = $('#textoImagem').val();
        var url = Config.base_url + "seguranca/logarUsuario";
        var parametro = 'email=' + email + '&&senha=' + senha + '&&textoImagem=' + textoImagem;
        CarregarPagina.carregarConteudo(url, parametro);
    }
    ,
    formeCadastroCidadao: function(local) {
        Tela.abrirModal();
        var url = Config.base_url + "seguranca/cadastro_cidadao";
        var parametro = 'acao=formularioColaboracaoPendente&&local=' + local;
        CarregarPagina.carregarConteudo(url, parametro);

    },
    gerarNovaSenha: function() {
        var url = Config.base_url + "seguranca/nova_senha";
        var parametro = 'acao=formularioColaboracaoPendente';
        CarregarPagina.carregarConteudo(url, parametro);
    },
    gerarNovaSenhaEXE: function() {
        var email = $('#email').val();
        var url = Config.base_url + "seguranca/gerar_nova_senha";
        var parametro = 'email=' + email;
        CarregarPagina.carregarConteudo(url, parametro);
    },
    formeAlterarNome: function() {
        var url = Config.base_url + "seguranca/alterar_nome";
        var parametro = 'acao=formularioColaboracaoPendente';
        Tela.abrirModal();
        CarregarPagina.carregarConteudo(url, parametro);
    },
    alterarNome: function() {
        var nome = $('#alterarNome').val();
        var senha = $('#senhaAtual').val();
        var url = Config.base_url + "seguranca/alterar_nome_cidadao";
        var parametro = 'alterarNome=' + nome + '&&senhaAtual=' + senha;
        CarregarPagina.carregarConteudo(url, parametro);
    }
    ,
    formeAlterarSenha: function() {
        var url = Config.base_url + "seguranca/alterar_senha";
        var parametro = 'acao=formularioColaboracaoPendente';
        Tela.abrirModal();
        CarregarPagina.carregarConteudo(url, parametro);
    },
    alterarSenha: function() {
        var novaSenha = $('#novaSenha').val();
        var senhaAtual = $('#senhaAtual').val();
        var confirmarNovaSenha = $('#confirmarNovaSenha').val();
        var url = Config.base_url + "seguranca/alterar_senha_cidadao";
        var parametro = 'novaSenha=' + novaSenha + '&&senhaAtual=' + senhaAtual + '&&confirmarNovaSenha=' + confirmarNovaSenha;
        CarregarPagina.carregarConteudo(url, parametro);
    }
    ,
    validarFormularioCadastro: function() {

        var divMensagem = '#MensagemErro';
        var textoErro = '';

        var nome = $('#nomeCidadaoCadastro').val();
        var cpf = $('#cpfCidadaoCadastro').val();
        var email = $('#emailCidadaoCadastro').val();
        var senha = $('#senhaCidadaoCadastro').val();
        var confimaSenha = $('#confirmaSenhaCidadaoCadastro').val();

        var url = Config.base_url + "seguranca/cadastraCidadaoEXE";

        var parametro = 'nomeCidadaoCadastro=' + nome + '&&cpfCidadaoCadastro=' + cpf + '&&emailCidadaoCadastro=' + email + '&&senhaCidadaoCadastro=' + senha + '&&confirmaSenhaCidadaoCadastro=' + confimaSenha;
        CarregarPagina.carregarConteudo(url, parametro);


    }

};
    