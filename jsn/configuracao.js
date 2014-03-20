Config = {
    base_url: "http://localhost/tcc_ci/"

};


CarregarPagina={
    carregarConteudo:function(pg,parametro){
        
          $("#myModal").modal("show");
          
          $("#windowModal").html('<h2> Carregando... </h2>');

        $.ajax({
            type: "post",
            url: pg,
            data: parametro,
            success:function(retorno){
                $("#windowModal").html(retorno);
            }		
        }); 
        
    }
};



Tela = {
    abrirModal: function() {

        var id = '.window';

        var alturaTela = $(document).height();
        var larguraTela = $(window).width();


        $('#mascara').css({
            'width': larguraTela,
            'height': alturaTela
        });
        $('#mascara').fadeIn(1000);
        $('#mascara').fadeTo("slow", 0.8);

        var left = ($(window).width() / 2) - ($(id).width() / 2);
        var top = ($(window).height() / 2) - ($(id).height() / 2);

        $(id).css({
            'top': top,
            'left': left,
            'overflow-y': 'scroll'
        });
        $(id).show();
    },
    fecharModal: function() {
        $("#myModal").modal("hide");
        
    }

};

			