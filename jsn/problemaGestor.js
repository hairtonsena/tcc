var Problema ={
    formularioColaboracaoAceita : function (idProblema){
        var url = Config.base_url+"cpainel/colaboracao/formularioColaboracaoAceita";
        var parametro = 'idProblema='+idProblema;
        Tela.abrirModal();
        CarregarPagina.carregarConteudo(url, parametro);
     
    },       
    formularioColaboracaoRejeitada : function (idProblema){
        var url = Config.base_url+"cpainel/colaboracao/formularioColaboracaoRejeitada";
        var parametro = 'acao=formularioColaboracaoRejeitada&&idProblema='+idProblema;
        Tela.abrirModal();
        CarregarPagina.carregarConteudo(url, parametro);
     
    },
    formularioColaboracaoPendente : function (idProblema){
        var url = Config.base_url+"cpainel/colaboracao/formularioColaboracaoPendente";
        var parametro = 'acao=formularioColaboracaoPendente&&idProblema='+idProblema;
        Tela.abrirModal();
        CarregarPagina.carregarConteudo(url, parametro);
     
    },
    aceitaColaboracao: function(){

        var idProblema = $("#idProblema").val();
        var textoUsuario = $("#textoUsuario").val();       
        var parametro = "idProblema="+idProblema+"&&textoUsuario="+textoUsuario;
        var url = Config.base_url+"cpainel/colaboracao/aceitarColaboracao";
        CarregarPagina.carregarConteudo(url, parametro);
        
        return false;
    },
    rejeitarColaboracao: function(){

        var idProblema = $("#idProblema").val();
        var textoUsuario = $("#textoUsuario").val();       
        var parametro = "idProblema="+idProblema+"&&textoUsuario="+textoUsuario;
        var url = Config.base_url+"cpainel/colaboracao/rejeitarColaboracao";
        CarregarPagina.carregarConteudo(url, parametro);
        
        return false;
    },
    tornaPendenteColaboracao: function(){

        var idProblema = $("#idProblema").val();
        var textoUsuario = $("#textoUsuario").val();       
        var parametro = "idProblema="+idProblema+"&&textoUsuario="+textoUsuario;
        var url = Config.base_url+"cpainel/colaboracao/tornaPendenteColaboracao";
        CarregarPagina.carregarConteudo(url, parametro);
        
        return false;
    },    
    iniciarObrasColaboracao : function(idProblema){
        
        var parametro = "idProblema="+idProblema;
        var url = Config.base_url+"cpainel/colaboracao/iniciarObrasColaboracao";
        CarregarPagina.carregarConteudo(url, parametro);
    },
    alterarStatusProblemaParaConcluido : function(idProblema){
        
        var parametro = "idProblema="+idProblema;
        var url = Config.base_url+"cpainel/colaboracao/alterarStatusConcluido";
        CarregarPagina.carregarConteudo(url, parametro);
    }, 
    verColaboracoes : function (){
               
        var status = $("#status").val();
        var categoria = $("#categoria").val();
        var ordem = $("#ordem").val();
        Tela.abrirModal();
        Conteudo.generateRandomMarkers(status,categoria,ordem);
        Tela.fecharModal();
    },    
    verCometarioModerar : function (){
        
        var parametro = "";
        var url = Config.base_url+"cpainel/colaboracao/verCometarioModerar";
        Tela.abrirModal();
        CarregarPagina.carregarConteudo(url, parametro);
    }, 
    aceitarComentario: function(comentario){
        // Tela inicial
        var qtdeComentarioMederar = $('#qtdeComentarioMederar').html();
        $('#qtdeComentarioMederar').html(qtdeComentarioMederar-1);
        // Moderar comentário
        var bloco = '#blocoComentario'+comentario;
        $(bloco).hide();
       
        var parametro = "idComentario="+comentario;
        var pg = Config.base_url+'cpainel/colaboracao/aceitarComentario';
       
        CarregarPagina.enviarDadosComentairo(pg, parametro);
        
        // recarregar os problema da tela inicial.
        var status = $("#status").val();
        var categoria = $("#categoria").val();
        var ordem = $("#ordem").val();
        
        var milisegundos = 5000; 

        window.setTimeout(Conteudo.generateRandomMarkers(status,categoria,ordem), milisegundos)
       
    },    
    aceitarComentario2: function(comentario){
        // Tela inicial
        var qtdeComentarioMederar = $('#qtdeComentarioMederar').html();
        $('#qtdeComentarioMederar').html(qtdeComentarioMederar-1);
        // Moderar comentário
        var bloco = '#linkModeracaoComentario'+comentario;
        $(bloco).hide();
       
        var parametro = "idComentario="+comentario;
        var pg = Config.base_url+'cpainel/colaboracao/aceitarComentario';
       
        CarregarPagina.enviarDadosComentairo(pg, parametro);
        
        // recarregar os problema da tela inicial.
        var status = $("#status").val();
        var categoria = $("#categoria").val();
        var ordem = $("#ordem").val();
        
        var milisegundos = 5000; 

        window.setTimeout(Conteudo.generateRandomMarkers(status,categoria,ordem), milisegundos)
    },   
    rejeitarComentario: function(comentario){
        // tele inicial
        var qtdeComentarioMederar = $('#qtdeComentarioMederar').html();
        $('#qtdeComentarioMederar').html(qtdeComentarioMederar-1);
       
        // Moderar comentarios
        var bloco = '#blocoComentario'+comentario;
        $(bloco).hide();
       
        var parametro = "idComentario="+comentario;
        var pg = Config.base_url+'cpainel/colaboracao/rejeitarComentario';
       
        CarregarPagina.enviarDadosComentairo(pg, parametro);

        // recarregar os problema da tela inicial.
        var status = $("#status").val();
        var categoria = $("#categoria").val();
        var ordem = $("#ordem").val();
        
        var milisegundos = 5000; 

        window.setTimeout(Conteudo.generateRandomMarkers(status,categoria,ordem), milisegundos)
    ;
        



       
    }, 
    verTodosComentario: function(idProblema){
        var parametro = "idProblema=" + idProblema;
        var url = Config.base_url + "cpainel/colaboracao/verComentariosPorPorblema";
        // alert(idProblema);
        Tela.abrirModal();
        CarregarPagina.carregarConteudo(url, parametro);
    }
}

 