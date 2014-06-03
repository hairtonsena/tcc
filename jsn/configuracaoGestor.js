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
    },
    moderarComentairo: function(pg, parametro) {
        $.ajax({
            type: "post",
            url: pg,
            data: parametro,
            success: function(retorno) {
                // $("#windowModal").html(retorno);
                $('#qtdeComentarioMederar').html(retorno);
                // recarregar os problema da tela inicial.
                var status = $("#status").val();
                var categoria = $("#categoria").val();
                var ordem = $("#ordem").val();

                Conteudo.generateRandomMarkers(status, categoria, ordem)
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
        $("#windowModal").html('<h4 class="text-center"> Carregando... </h4>');
    },
    fecharModal: function() {
        $("#myModal").modal("hide");

    }


};

			