var Problema = {
    formularioColaboracaoAceita: function(idProblema) {
        var url = Config.base_url + "cpainel/colaboracao/formularioColaboracaoAceita";
        var parametro = 'idProblema=' + idProblema;
        Tela.abrirModal();
        CarregarPagina.carregarConteudo(url, parametro);

    },
    formularioColaboracaoRejeitada: function(idProblema) {
        var url = Config.base_url + "cpainel/colaboracao/formularioColaboracaoRejeitada";
        var parametro = 'acao=formularioColaboracaoRejeitada&&idProblema=' + idProblema;
        Tela.abrirModal();
        CarregarPagina.carregarConteudo(url, parametro);

    },
    formularioColaboracaoPendente: function(idProblema) {
        var url = Config.base_url + "cpainel/colaboracao/formularioColaboracaoPendente";
        var parametro = 'acao=formularioColaboracaoPendente&&idProblema=' + idProblema;
        Tela.abrirModal();
        CarregarPagina.carregarConteudo(url, parametro);

    },
    aceitaColaboracao: function() {

        var idProblema = $("#idProblema").val();
        var textoUsuario = $("#textoUsuario").val();
        var parametro = "idProblema=" + idProblema + "&&textoUsuario=" + textoUsuario;
        var url = Config.base_url + "cpainel/colaboracao/aceitarColaboracao";
        CarregarPagina.carregarConteudo(url, parametro);

        return false;
    },
    rejeitarColaboracao: function() {

        var idProblema = $("#idProblema").val();
        var textoUsuario = $("#textoUsuario").val();
        var parametro = "idProblema=" + idProblema + "&&textoUsuario=" + textoUsuario;
        var url = Config.base_url + "cpainel/colaboracao/rejeitarColaboracao";
        CarregarPagina.carregarConteudo(url, parametro);

        return false;
    },
    tornaPendenteColaboracao: function() {

        var idProblema = $("#idProblema").val();
        var textoUsuario = $("#textoUsuario").val();
        var parametro = "idProblema=" + idProblema + "&&textoUsuario=" + textoUsuario;
        var url = Config.base_url + "cpainel/colaboracao/tornaPendenteColaboracao";
        CarregarPagina.carregarConteudo(url, parametro);

        return false;
    },
    iniciarObrasColaboracao: function(idProblema) {

        var parametro = "idProblema=" + idProblema;
        var url = Config.base_url + "cpainel/colaboracao/iniciarObrasColaboracao";
        CarregarPagina.carregarConteudo(url, parametro);
    },
    alterarStatusProblemaParaConcluido: function(idProblema) {

        var parametro = "idProblema=" + idProblema;
        var url = Config.base_url + "cpainel/colaboracao/alterarStatusConcluido";
        CarregarPagina.carregarConteudo(url, parametro);
    },
    verColaboracoes: function() {

        var status = $("#status").val();
        var categoria = $("#categoria").val();
        var ordem = $("#ordem").val();
        Tela.abrirModal();
        Conteudo.generateRandomMarkers(status, categoria, ordem);
        Tela.fecharModal();
    },
    verCometarioModerar: function() {

        var parametro = "";
        var url = Config.base_url + "cpainel/colaboracao/verCometarioModerar";
        Tela.abrirModal();
        CarregarPagina.carregarConteudo(url, parametro);
    },
    aceitarComentario: function(comentario) {

        // Moderar comentário
        var bloco = '#blocoComentario' + comentario;
        $(bloco).hide();

        var parametro = "idComentario=" + comentario;
        var pg = Config.base_url + 'cpainel/colaboracao/aceitarComentario';

        CarregarPagina.moderarComentairo(pg, parametro);

    },
    aceitarComentario2: function(comentario) {

        // Moderar comentário
        var bloco = '#linkModeracaoComentario' + comentario;
        $(bloco).hide();

        var parametro = "idComentario=" + comentario;
        var pg = Config.base_url + 'cpainel/colaboracao/aceitarComentario';

        CarregarPagina.moderarComentairo(pg, parametro);

    },
    rejeitarComentario: function(comentario) {
   

        // Moderar comentarios
        var bloco = '#blocoComentario' + comentario;
        $(bloco).hide();

        var parametro = "idComentario=" + comentario;
        var pg = Config.base_url + 'cpainel/colaboracao/rejeitarComentario';

        CarregarPagina.moderarComentairo(pg, parametro);

    },
    verTodosComentario: function(idProblema) {
        var parametro = "idProblema=" + idProblema;
        var url = Config.base_url + "cpainel/colaboracao/verComentariosPorPorblema";
        // alert(idProblema);
        Tela.abrirModal();
        CarregarPagina.carregarConteudo(url, parametro);
    },
    informacaoGeral: function() {
        Tela.abrirModal();
        var url = Config.base_url + "cpainel/home/informacao";
        var parametro = "";
        CarregarPagina.carregarConteudo(url, parametro);
    }
}

 