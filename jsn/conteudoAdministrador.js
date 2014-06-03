
Gestor = {
    verGestor: function(){
        var url = Config.base_url+'cpainel/configuracao/verGestor';
        var parametro = 'acao=verGestor';
        CarregarPagina.carregarConteudo(url, parametro);
    },
    formeInserirGestor: function(){
        
        var url = Config.base_url+'administrador/cpainel/formeInserir';
        var parametro = 'acao=formeInserir';
        CarregarPagina.carregarConteudo(url, parametro);
  
    },
    formeAlterarGestor: function(id){
        var url = Config.base_url+'cpainel/configuracao/formeAlterarGestor';
        var parametro = 'idGestor='+id;
        Tela.abrirModal();
        CarregarPagina.carregarConteudo(url, parametro); 
    },
    inserirGestor: function(){
        var nomeGestor = $("#nomeGestor").val();
        var cpfGestor = $("#cpfGestor").val();
        var emailGestor = $("#emailGestor").val();
        var senhaGestor = $("#senhaGestor").val();
        
        // if(this.valida_cpf(cpfGestor)==true){
        var url = Config.base_url+'administrador/cpainel/inserirGestor';
        var parametro = 'acao=inserirGestor&&nomeGestor='+nomeGestor+
        '&&cpfGestor='+cpfGestor+'&&emailGestor='+emailGestor+
        '&&senhaGestor='+senhaGestor;
        CarregarPagina.carregarConteudo(url, parametro);
        
    },
    editarGestor: function(){
        
        var url = Config.base_url+'cpainel/configuracao/editarGestor';
        var parametro = 'acao=editarGestor';
        CarregarPagina.carregarConteudo(url, parametro); 
    },
    alterarGestor: function(){

        var idGestor = $("#idGestor").val();
        var nomeGestor = $("#nomeGestor").val();
        var emailGestor = $("#emailGestor").val();
        var senhaAtual = $("#senhaAtual").val();
        
        var url = Config.base_url+'cpainel/configuracao/alterarGestor';
        var parametro = 'acao=alterarGestor&&idGestor='+idGestor+'&&nomeGestor='+nomeGestor+
        '&&emailGestor='+emailGestor+'&&senhaAtual='+senhaAtual;
        CarregarPagina.carregarConteudo(url, parametro)        
        return false;
    },
    formeAlterarSenha: function(id){
        var url = Config.base_url+'cpainel/configuracao/formeAlterarSenha';
        Tela.abrirModal()
        var parametro = 'acao=formeAlterarSenha&&idGestor='+id;
        CarregarPagina.carregarConteudo(url, parametro); 
    },
    alterarSenhaGestor : function(){
        var idGestor = $("#idGestor").val();
        var senhaGestor = $("#senhaGestor").val();
        var senhaAtual = $("#senhaAtual").val();
        var url = Config.base_url+'cpainel/configuracao/alterarSenha';
        var parametro = 'acao=alterarSenha&&idGestor='+idGestor+'&&senhaGestor='+senhaGestor+'&&senhaAtual='+senhaAtual;
         CarregarPagina.carregarConteudo(url, parametro);
        return false;
    },
    excluirGestor:function(idGestor){
        
        if(confirm('Atenção! \n você esta excluido um gestor.')==true){
            var url = Config.base_url+'administrador/cpainel/excluirGestor';
            var parametro = 'acao=excluirGestor&&idGestor='+idGestor;
            CarregarPagina.carregarConteudo(url, parametro);
        }
    },
    bloqueioGestor:function(){
        
        var url = Config.base_url+'administrador/cpainel/bloqueioGestor';
        var parametro = 'acao=bloqueioGestor';
        CarregarPagina.carregarConteudo(url, parametro);
    },
    ativarDesativarGestor: function(idGestor){
        var url = Config.base_url+'administrador/cpainel/ativarDesativarGestor';
        var parametro = 'acao=ativarDesativarGestor&&idGestor='+idGestor;
        CarregarPagina.carregarConteudo(url, parametro);
    },    
    configuracaoGeral: function(){

        var url = Config.base_url+'cpainel/configuracao/configuracaoGeral';
        var parametro = '';
        CarregarPagina.carregarConteudo(url, parametro); 
    },    
    editarConfiguracao: function(){
        var url = Config.base_url+'cpainel/configuracao/editarConfiguracao';
        var parametro = '';
        CarregarPagina.carregarConteudo(url, parametro); 
    },
    salvarConfiguracao: function(){
        
        var idMunicipio = $("#idMunicipio").val();
        var nomeMunicipio = $("#nomeMunicipio").val();
        var cnpjMunicipio = $("#cnpjMunicipio").val();
        var cepMunicipio = $("#cepMunicipio").val();
        var telefoneMunicipio = $("#telefoneMunicipio").val();
        var emailMunicipio = $("#emailMunicipio").val();
        var siteMunicipio = $("#siteMunicipio").val();
        var latitudeMunicipio = $("#latitudeMunicipio").val();
        var longitudeMunicipio = $("#longitudeMunicipio").val();
        var zoomMapsInicial = $("#zoomMaps").val();
        var streetViewMaps =  '0'; // $("#streetView").val();
        
        
        
        

        var url = Config.base_url+'cpainel/configuracao/salvarConfiguracao';
        var parametro = "idMunicipio="+idMunicipio+"&&nomeMunicipio="+nomeMunicipio+"&&cnpjMunicipio="+cnpjMunicipio+"&&cepMunicipio="+cepMunicipio+"&&telefoneMunicipio="+
        telefoneMunicipio+"&&emailMunicipio="+emailMunicipio+"&&siteMunicipio="+siteMunicipio+"&&latitudeMunicipio="+latitudeMunicipio+"&&longitudeMunicipio="+longitudeMunicipio+
        "&&zoomMapsInicial="+zoomMapsInicial+"&&streetViewMaps="+streetViewMaps;
        

        CarregarPagina.carregarConteudo(url, parametro); 
    },
    prequisarLocal : function(){
        var local = $("#presquisa").val();
        alert(local);
        mostraEndereco(local);
    },
    

    valida_cpf: function (cpf){
        function validarCPF(cpf) {
 
            cpf = cpf.replace(/[^\d]+/g,'');
 
            if(cpf == '') return false;
 
            // Elimina CPFs invalidos conhecidos
            if (cpf.length != 11 || 
                cpf == "00000000000" || 
                cpf == "11111111111" || 
                cpf == "22222222222" || 
                cpf == "33333333333" || 
                cpf == "44444444444" || 
                cpf == "55555555555" || 
                cpf == "66666666666" || 
                cpf == "77777777777" || 
                cpf == "88888888888" || 
                cpf == "99999999999")
                return false;
     
            // Valida 1o digito
            add = 0;
            for (i=0; i < 9; i ++)
                add += parseInt(cpf.charAt(i)) * (10 - i);
            rev = 11 - (add % 11);
            if (rev == 10 || rev == 11)
                rev = 0;
            if (rev != parseInt(cpf.charAt(9)))
                return false;
     
            // Valida 2o digito
            add = 0;
            for (i = 0; i < 10; i ++)
                add += parseInt(cpf.charAt(i)) * (11 - i);
            rev = 11 - (add % 11);
            if (rev == 10 || rev == 11)
                rev = 0;
            if (rev != parseInt(cpf.charAt(10)))
                return false;
         
            return true;
    
        }
     
    }
};

