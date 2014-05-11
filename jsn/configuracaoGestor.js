CarregarPagina = {
    carregarConteudo: function(pg, parametro) {

        $.ajax({
            type: "post",
            url: pg,
            data: parametro,
            success: function(retorno) {
                $("#windowModal").html(retorno);
            }
        });

    },
    enviarDadosComentairo: function(pg, parametro) {
        $.ajax({
            type: "post",
            url: pg,
            data: parametro,
            success: function(retorno) {
            // $("#windowModal").html(retorno);
            }
        });
    }
};



Tela = {
    iniciarTela: function() {

        this.abrirModal();

        Conteudo.generateRandomMarkers(0, 0, 0);
        this.fecharModal()

    },
    abrirModal: function() {
        $("#myModal").modal("show");
        $("#windowModal").html('<h2> Carregando... </h2>');
    },
    fecharModal: function() {
        $("#myModal").modal("hide");

    }


};

			