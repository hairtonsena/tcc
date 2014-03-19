var Problema ={
    formularioColaboracaoAceita : function (idProblema){
        var url = Config.base_url+"cpainel/colaboracao/formularioColaboracaoAceita";
        var parametro = 'idProblema='+idProblema;
        CarregarPagina.carregarConteudo(url, parametro);
     
    },       
    formularioColaboracaoRejeitada : function (idProblema){
        var url = Config.base_url+"cpainel/colaboracao/formularioColaboracaoRejeitada";
        var parametro = 'acao=formularioColaboracaoRejeitada&&idProblema='+idProblema;
        CarregarPagina.carregarConteudo(url, parametro);
     
    },
    formularioColaboracaoPendente : function (idProblema){
        var url = Config.base_url+"cpainel/colaboracao/formularioColaboracaoPendente";
        var parametro = 'acao=formularioColaboracaoPendente&&idProblema='+idProblema;
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
    verColaboracoes_old : function (opcao){
       
        var ver = opcao;  
        Conteudo.generateRandomMarkers(ver);
    },    
    verColaboracoes : function (){
       
       var status = $("#status").val();
       var categoria = $("#categoria").val();
       
        Conteudo.generateRandomMarkers(status,categoria);
    }
   
    
}

 