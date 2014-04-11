Config = {
    base_url: "http://localhost/tcc_ci/"

};


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
    contextMenu: null

            ,
    abriMenuDireito: function() {
        var contextMenu = $("#jqxMenu").jqxMenu({
            width: '120px',
            height: '40px',
            autoOpenPopup: false,
            mode: 'popup'
        });

        //alert(event.clientX);
        // open the context menu when the user presses the mouse right button.

        var scrollTop = $(window).scrollTop();
        var scrollLeft = $(window).scrollLeft();
        contextMenu.jqxMenu('open', parseInt(event.clientX) + 5 + scrollLeft, parseInt(event.clientY) + 5 + scrollTop);
        return false;


        // disable the default browser's context menu.
        $(document).click('contextmenu', function(e) {
            return false;
        });

    }
    ,
    iniciarTela: function() {

        Tela.abrirModal();

        var local = $('#local').val();

        if (local == 0) {
            Tela.fecharModal();
        } else {
            Problema.adicionarPontoMapa(local);
        }


        Conteudo.generateRandomMarkers(0, 0, 0, 0, 0);

//        var tamanhoColuna = document.getElementById("calunaDireita").offsetHeight;
//
//        $('#map_canvas').css({
//            height: tamanhoColuna
//        });





        var contextMenu = $("#jqxMenu").jqxMenu({
            width: '120px',
            height: '40px',
            autoOpenPopup: false,
            mode: 'popup'
        });
        // open the context menu when the user presses the mouse right button.
        $("#jqxWidget").on('mousedown', function(event) {

            var resultado = "";
            for (propriedade in event) {
                resultado += propriedade + ": " + event[propriedade] + "\n";
            }
            ;
            alert(resultado);

            var rightClick = Tela.isRightClick(event) || $.jqx.mobile.isTouchDevice();
            if (rightClick) {
                var scrollTop = $(window).scrollTop();
                var scrollLeft = $(window).scrollLeft();
                contextMenu.jqxMenu('open', parseInt(event.clientX) + 5 + scrollLeft, parseInt(event.clientY) + 5 + scrollTop);
                return false;
            }
        });
        // disable the default browser's context menu.
        $(document).on('contextmenu', function(e) {
            return false;
        });

        //  Tela.fecharModal()
    },
    isRightClick: function(event) {
        var rightclick;
        if (!event)
            var event = window.event;
        if (event.which)
            rightclick = (event.which == 3);
        else if (event.button)
            rightclick = (event.button == 2);
        return rightclick;
    },
    abrirModal: function() {
        $("#myModal").modal("show");
        $("#windowModal").html('<h2> Carregando... </h2>');
    },
    fecharModal: function() {
        $("#myModal").modal("hide");

    }


};

			