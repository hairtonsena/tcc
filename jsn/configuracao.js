
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
    enviarDadosApoioReprova: function(pg, parametro, nomeid, nomeidB) {
        $.ajax({
            type: "post",
            url: pg,
            data: parametro,
            success: function(retorno) {

                //  alert(retorno)

                $(nomeid).html(retorno);
                $(nomeidB).html(retorno);

            }
        });
    }
};



Tela = {
    contextMenu: null,
    iniciarTela: function() {

        Tela.abrirModal();

        var local = $('#local').val();

        if (local == 0) {
            Tela.fecharModal();
        } else {
            var opcao = $('#opcao').val();
            if (opcao == 1) {
                Problema.adicionarPontoMapa(local);

                var latlong = "" + local
                latlong = latlong.replace("(", "");
                latlong = latlong.replace(")", "");

                var arrLatLong = latlong.split(",");

                Conteudo.map.setCenter(new google.maps.LatLng(arrLatLong[0], arrLatLong[1]));

            } else if (opcao == 2) {
                Problema.verColaboracaoEmail(local);

                var latlong = "" + local
                latlong = latlong.replace("(", "");
                latlong = latlong.replace(")", "");
                var arrLatLong = latlong.split(",");
                Conteudo.map.setCenter(new google.maps.LatLng(arrLatLong[0], arrLatLong[1]));

            } else {
                Tela.fecharModal();
            }
        }

        Conteudo.generateRandomMarkers(0, 0, 0, 0, 0);

    },
    abrirModal: function() {
        $("#myModal").modal("show");
        $("#windowModal").html('<h4 class="text-center"> Carregando... </h4>');
    },
    fecharModal: function() {
        $("#myModal").modal("hide");

    }


};

	