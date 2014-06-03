

var Conteudo = {
    map: null,
    mapContainer: document.getElementById('map_canvas'),
    sideContainer: document.getElementById('menuDireito'),
    generateLink: document.getElementById('generateLink'),
    markers: [],
    visibleInfoWindow: null,
    geocoder: null,
    generateTriggerCallback: function(object, eventType) {
        return function() {
            google.maps.event.trigger(object, eventType);
        };
    },
    openInfoWindow: function(infoWindow, marker) {
        return function() {

            if (Conteudo.visibleInfoWindow) {
                Conteudo.visibleInfoWindow.close();
            }

            infoWindow.open(Conteudo.map, marker);
            Conteudo.visibleInfoWindow = infoWindow;
        };
    },
    clearMarkers: function() {
        for (var n = 0, marker; marker = Conteudo.markers[n]; n++) {
            marker.setVisible(false);
        }
    },
    generateRandomMarkers: function(status, categoria, ordem) {


        var alternaCores = 0;
        var div = Conteudo.sideContainer;



        if (Conteudo.visibleInfoWindow) {
            Conteudo.visibleInfoWindow.close();
        }

        div.innerHTML = '<h4 class="text-center"> <img src="' + Config.base_url + 'icone/carregando.gif" /> Carregando...</h4>';

        Conteudo.clearMarkers();


        $.getJSON(Config.base_url + "cpainel/listaColaboracaoJson?ttt=ds", {
            'status': status,
            'categoria': categoria,
            'ordem': ordem
        }, function(json) {

            div.innerHTML = '';
            if (json.length == 0) {

                div.innerHTML = '<h4 class="text-center">Nenhuma colaboração encontrada!</h4>';

            } else {
                for (var n = 0; n <= json.length; n++) {

                    var objeto = json[n];


                    var randLatLng = new google.maps.LatLng(
                            objeto.latitude
                            ,
                            objeto.longitude
                            );

                    var imagem = Config.base_url + 'icone/icone' + objeto.idTipo + '.png';

                    var imagemProblema = "";
                    if (objeto.imagemProblema != null) {
                        imagemProblema = '<img src="' + Config.base_url + 'imagem/' + objeto.imagemProblema + '" class="img-responsive" alt="Responsive image"/>';
                    }


                    var marker = new google.maps.Marker({
                        map: Conteudo.map,
                        title: objeto.tipo,
                        position: randLatLng,
                        draggable: false,
                        icon: imagem

                    });
                    Conteudo.markers.push(marker);



                    var funcao = '';
                    var linkStatus = '';
                    var conteudoColunaDireita = '';
                    var conteudoBalaoMapa = '';

                    var verificarComentario = '<a href="javascript:void(0)" onclick="Problema.verTodosComentario(\'' + objeto.idProblema + '\')"> Comentários ' + objeto.qtde_comentario + ' </a>';

                    var botoesApoioDenucia = '<a class="btn btn-primary btn-xs" href="javascript:void(0)" >' +
                            '<i class="glyphicon glyphicon-thumbs-up"></i> ' +
                            '<span class="text-info badge">' + objeto.qtde_apoio + '</span>' +
                            '</a> ' +
                            '<a class="btn btn-default btn-xs" href="javascript:void(0)" >' +
                            '<i class="glyphicon glyphicon-thumbs-down"></i> ' +
                            '<span class="text-error badge">' + objeto.qtde_denuncia + '</span>' +
                            '</a>';


                    switch (objeto.idStatus) {
                        case '1':


                            linkStatus =
                                    '<br/><a href="javascript:void(0)" class="btn btn-primary" onclick="Problema.formularioColaboracaoAceita(\'' + objeto.idProblema + '\')"> Aceitar  </a>' +
                                    ' <a href="javascript:void(0)" class="btn btn-default" onclick="Problema.formularioColaboracaoPendente(\'' + objeto.idProblema + '\')"> Tornar pendente </a>' +
                                    ' <a href="javascript:void(0)" class="btn btn-danger" onclick="Problema.formularioColaboracaoRejeitada(\'' + objeto.idProblema + '\')"> Rejeitar </a>';



                            conteudoBalaoMapa =
                                    '<div style="font-size: 14; width:300px;"><strong class="tituloProblema"> ' + objeto.tipo + ' </strong><span class="pull-right">' + objeto.dataProblema + '</span>' +
                                    '<br/>' + objeto.descricao +
                                    imagemProblema +
                                    '<br/><strong class="tituloProblema">Situação:</strong>' +
                                    objeto.nomeStatus +
                                    linkStatus +
                                    '</div>';


                            conteudoColunaDireita =
                                    '<div style="font-size: 14;"><strong class="tituloProblema"> <img src="' + imagem + '"/> ' + objeto.tipo + ' </strong><span class="pull-right">' + objeto.dataProblema + '</span>' +
                                    '<br/>' + objeto.descricao +
                                    '<br/><strong class="tituloProblema">Situação:</strong>' +
                                    objeto.nomeStatus +
                                    '<div class="" style="text-align: right">' + verificarComentario + botoesApoioDenucia +
                                    '</div></div>';


                            break;
                        case '4':

                            funcao = 'Problema.iniciarObrasColaboracao(\'' + objeto.idProblema + '\')';
                            linkStatus = '<br/><a href="javascript:void(0)" class="btn btn-primary" onclick="' + funcao + '"> Iniciar obras </a>';


                            conteudoBalaoMapa =
                                    '<div style="font-size: 14; width:300px;"><strong class="tituloProblema"> ' + objeto.tipo + ' </strong><span class="pull-right">' + objeto.dataProblema + '</span>' +
                                    '<br/>' + objeto.descricao +
                                    imagemProblema +
                                    '<br/><strong class="tituloProblema">Situação:</strong>' +
                                    objeto.nomeStatus +
                                    linkStatus +
                                    '</div>';


                            conteudoColunaDireita =
                                    '<div style="font-size: 14;"><strong class="tituloProblema"> <img src="' + imagem + '"/> ' + objeto.tipo + ' </strong><span class="pull-right">' + objeto.dataProblema + '</span>' +
                                    '<br/>' + objeto.descricao +
                                    '<br/><strong class="tituloProblema">Situação:</strong>' +
                                    objeto.nomeStatus +
                                    '<div class="" style="text-align: right">' + verificarComentario + botoesApoioDenucia +
                                    '</div></div>';


                            break;
                        case '5':

                            funcao = 'Problema.alterarStatusProblemaParaConcluido(\'' + objeto.idProblema + '\')';
                            linkStatus = '<br/><a href="javascript:void(0)" class="btn btn-primary" onclick="' + funcao + '"> Problema resolvido</a>';


                            conteudoBalaoMapa =
                                    '<div style="font-size: 14; width:300px;"><strong class="tituloProblema"> ' + objeto.tipo + ' </strong><span class="pull-right">' + objeto.dataProblema + '</span>' +
                                    '<br/>' + objeto.descricao +
                                    imagemProblema +
                                    '<br/><strong class="tituloProblema">Situação:</strong>' +
                                    objeto.nomeStatus +
                                    linkStatus +
                                    '</div>';


                            conteudoColunaDireita =
                                    '<div style="font-size: 14;"> <img src="' + imagem + '"/><strong class="tituloProblema">' + objeto.tipo + '</strong><span class="pull-right">' + objeto.dataProblema + '</span>' +
                                    '<br/>' + objeto.descricao +
                                    '<br/><strong class="tituloProblema">Situação:</strong>' +
                                    objeto.nomeStatus +
                                    '<div class="" style="text-align: right">' + verificarComentario + botoesApoioDenucia +
                                    '</div></div>';


                            break;


                        default:


                            conteudoBalaoMapa =
                                    '<div style="font-size: 14; width:300px;"><strong class="tituloProblema">' + objeto.tipo + '</strong><span class="pull-right">' + objeto.dataProblema + '</span>' +
                                    '<br/>' + objeto.descricao +
                                    imagemProblema +
                                    '<br/><strong class="tituloProblema">Situação:</strong>' +
                                    objeto.nomeStatus +
                                    linkStatus +
                                    '</div>';




                            conteudoColunaDireita =
                                    '<div style="font-size: 14;"> <img src="' + imagem + '"/> <strong class="tituloProblema">' + objeto.tipo + '</strong><span class="pull-right">' + objeto.dataProblema + '</span>' +
                                    '<br/>' + objeto.descricao +
                                    '<br/><strong class="tituloProblema">Situação:</strong>' +
                                    objeto.nomeStatus +
                                    '<div class="" style="text-align: right">' + verificarComentario + botoesApoioDenucia +
                                    '</div></div>';
                            break;
                    }


                    var infoWindow = new google.maps.InfoWindow({
                        content: [
                            conteudoBalaoMapa
                        ].join(''),
                        size: new google.maps.Size(200, 80)
                    });


                    google.maps.event.addListener(
                            marker, 'click', Conteudo.openInfoWindow(infoWindow, marker));

                    var divd = document.createElement('div');

                    if (alternaCores == 0) {
                        alternaCores = 1;
                    } else {
                        alternaCores = 0;
                    }

                    divd.className = 'faixa' + alternaCores;
                    divd.onclick = Conteudo.generateTriggerCallback(marker, 'click');
                    var contDiv = conteudoColunaDireita;
                    divd.innerHTML = contDiv;
                    div.appendChild(divd);

                }
            }

            Conteudo.map.setCenter(new google.maps.LatLng(Config.latitudeCentralMaps, Config.longitudeCentralMaps));
        });
    },
    init: function() {
        // carregando e configurando maps
        var firstLatLng = new google.maps.LatLng(Config.latitudeCentralMaps, Config.longitudeCentralMaps);
        Conteudo.map = new google.maps.Map(Conteudo.mapContainer, {
            zoom: Config.zoomMapsInicial,
            center: firstLatLng,
            streetViewControl: false, // Config.streetViewMaps,
            mapTypeId: google.maps.MapTypeId.HYBRID
        });

        // Chamando a inicialização de tela.
        Tela.iniciarTela();

        google.maps.event.addListener(Conteudo.map, 'tilesloaded', function() {
            Conteudo.generateLink.style.display = 'block';
        });


        google.maps.event.addDomListener(Conteudo.generateLink, 'click', function() {



        });

        google.maps.event.addListener(Conteudo.map, 'click', function(event) {

        });

        google.maps.event.trigger(Conteudo.generateLink, 'click');

        Conteudo.geocoder = new google.maps.Geocoder();

    },
    mostraEndereco: function(local) {
        var address = local;
        Conteudo.geocoder.geocode({
            'address': address
        }, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                Conteudo.map.setCenter(results[0].geometry.location);
                Conteudo.map.setZoom(18);

            } else {
                alert("Não foi possivel localizar o local!");
            }
        });
    }
};

google.maps.event.addDomListener(window, 'load', Conteudo.init, Conteudo);
