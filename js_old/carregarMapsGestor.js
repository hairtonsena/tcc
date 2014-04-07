

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
    generateRandomMarkers: function(status, categoria) {


        var alternaCores = 0;
        var div = Conteudo.sideContainer;

        div.innerHTML = '';

        if (Conteudo.visibleInfoWindow) {
            Conteudo.visibleInfoWindow.close();
        }


        Tela.abrirModal();

        $(".window").html('<h2> Carregando... </h2>');

        Conteudo.clearMarkers();


        $.getJSON(Config.base_url + "cpainel/listaColaboracaoJson?ttt=ds", {
            'status': status,
            'categoria': categoria
        }, function(json) {

            Tela.fecharModal();
            if (json.length == 0) {

                div.innerHTML = '<h3>Nenhum marcador Encontrado!</h3>';
                alert('Nenhum marcador Encontrado!');
            } else {
                for (var n = 0; n <= json.length; n++) {

                    var objeto = json[n];


                    var randLatLng = new google.maps.LatLng(
                            objeto.latitude
                            ,
                            objeto.longitude
                            );

                    var imagem = Config.base_url+'icone/icone' + objeto.idTipo + '.png';

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

                    switch (objeto.idStatus) {
                        case '1':


                            linkStatus =
                                    '<br/><a href="javascript:void(0)" class="btn" onclick="Problema.formularioColaboracaoAceita(\'' + objeto.idProblema + '\')"> Aceitar  </a>' +
                                    '<a href="javascript:void(0)" class="btn" onclick="Problema.formularioColaboracaoPendente(\'' + objeto.idProblema + '\')"> Tornar Pendente </a>' +
                                    '<a href="javascript:void(0)" class="btn" onclick="Problema.formularioColaboracaoRejeitada(\'' + objeto.idProblema + '\')"> Rejeitar </a>';



                            conteudoBalaoMapa =
                                    '<div style="font-size: 12; width:300px;"><strong class="tituloProblema"> Tipo: </strong>' +
                                    objeto.tipo +
                                    '<br/><strong class="tituloProblema"> Descrição:</strong>' +
                                    objeto.descricao +
                                    '<br/><strong class="tituloProblema">Data de abertura : </strong>' +
                                    objeto.dataProblema +
                                    '<br/><strong class="tituloProblema">Situação:</strong>' +
                                    objeto.nomeStatus +
                                    linkStatus +
                                    '</div>';


                            conteudoColunaDireita =
                                    '<div style="font-size: 12;"><strong class="tituloProblema"> Tipo: </strong><img src="' + imagem + '"/>' + objeto.tipo +
                                    '<br/><strong class="tituloProblema"> Descrição: </strong>' + objeto.descricao +
                                    '<br/><strong class="tituloProblema">Data de abertura: </strong>' + objeto.dataProblema +
                                    '<br/><strong class="tituloProblema">Situação:</strong>' +
                                    objeto.nomeStatus +
                                    '</div>';


                            break;
                        case '4':

                            funcao = 'Problema.iniciarObrasColaboracao(\'' + objeto.idProblema + '\')';
                            linkStatus = '<br/><a href="javascript:void(0)" class="btn" onclick="' + funcao + '"> Iniciar Obras </a>';


                            conteudoBalaoMapa =
                                    '<div style="font-size: 12; width:300px;"><strong class="tituloProblema"> Tipo: </strong>' +
                                    objeto.tipo +
                                    '<br/><strong class="tituloProblema"> Descrição:</strong>' +
                                    objeto.descricao +
                                    '<br/><strong class="tituloProblema">Data de abertura : </strong>' +
                                    objeto.dataProblema +
                                    '<br/><strong class="tituloProblema">Situação:</strong>' +
                                    objeto.nomeStatus +
                                    linkStatus +
                                    '</div>';


                            conteudoColunaDireita =
                                    '<div style="font-size: 12;"><strong class="tituloProblema"> Tipo: </strong><img src="' + imagem + '"/>' + objeto.tipo +
                                    '<br/><strong class="tituloProblema"> Descrição: </strong>' + objeto.descricao +
                                    '<br/><strong class="tituloProblema">Data de abertura: </strong>' + objeto.dataProblema +
                                    '<br/><strong class="tituloProblema">Situação:</strong>' +
                                    objeto.nomeStatus +
                                    '</div>';


                            break;
                        case '5':

                            funcao = 'Problema.alterarStatusProblemaParaConcluido(\'' + objeto.idProblema + '\')';
                            linkStatus = '<br/><a href="javascript:void(0)" class="btn" onclick="' + funcao + '"> Concluir Problema</a>';


                            conteudoBalaoMapa =
                                    '<div style="font-size: 12; width:300px;"><strong class="tituloProblema"> Tipo: </strong>' +
                                    objeto.tipo +
                                    '<br/><strong class="tituloProblema"> Descrição:</strong>' +
                                    objeto.descricao +
                                    '<br/><strong class="tituloProblema">Data de abertura : </strong>' +
                                    objeto.dataProblema +
                                    '<br/><strong class="tituloProblema">Situação:</strong>' +
                                    objeto.nomeStatus +
                                    linkStatus +
                                    '</div>';


                            conteudoColunaDireita =
                                    '<div style="font-size: 12;"><strong class="tituloProblema"> Tipo: </strong><img src="' + imagem + '"/>' + objeto.tipo +
                                    '<br/><strong class="tituloProblema"> Descrição: </strong>' + objeto.descricao +
                                    '<br/><strong class="tituloProblema">Data de abertura: </strong>' + objeto.dataProblema +
                                    '<br/><strong class="tituloProblema">Situação:</strong>' +
                                    objeto.nomeStatus +
                                    '</div>';


                            break;


                        default:


                            conteudoBalaoMapa =
                                    '<div style="font-size: 12; width:300px;"><strong class="tituloProblema"> Tipo: </strong>' +
                                    objeto.tipo +
                                    '<br/><strong class="tituloProblema"> Descrição:</strong>' +
                                    objeto.descricao +
                                    '<br/><strong class="tituloProblema">Data de abertura : </strong>' +
                                    objeto.dataProblema +
                                    '<br/><strong class="tituloProblema">Situação:</strong>' +
                                    objeto.nomeStatus +
                                    linkStatus +
                                    '</div>';




                            conteudoColunaDireita =
                                    '<div style="font-size: 12;"><strong class="tituloProblema"> Tipo: </strong><img src="' + imagem + '"/>' + objeto.tipo +
                                    '<br/><strong class="tituloProblema"> Descrição: </strong>' + objeto.descricao +
                                    '<br/><strong class="tituloProblema">Data de abertura: </strong>' + objeto.dataProblema +
                                    '<br/><strong class="tituloProblema">Situação:</strong>' +
                                    objeto.nomeStatus +
                                    '</div>';
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

            Conteudo.map.setCenter(new google.maps.LatLng(-16.740605618138325, -43.87089729309082));
        });
    },
    init: function() {
        var firstLatLng = new google.maps.LatLng(-16.740605618138325, -43.87089729309082);
        Conteudo.map = new google.maps.Map(Conteudo.mapContainer, {
            zoom: 13,
            center: firstLatLng,
            streetViewControl: false,
            mapTypeId: google.maps.MapTypeId.HYBRID
        });


        google.maps.event.addListener(Conteudo.map, 'tilesloaded', function() {
            Conteudo.generateLink.style.display = 'block';
        });


        google.maps.event.addDomListener(Conteudo.generateLink, 'click', function() {

            Problema.verColaboracoes();

        });

        google.maps.event.addListener(Conteudo.map, 'click', function(event) {

        });

        google.maps.event.trigger(Conteudo.generateLink, 'click');

        Conteudo.geocoder = new google.maps.Geocoder();

    },
    adicionarPontoMapa: function(verTeste) {
        Problema.adicionarPontoMapa(verTeste);
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
                alert("Não foi possivel localizar o local, erro: " + status);
            }
        });
    }
};

google.maps.event.addDomListener(window, 'load', Conteudo.init, Conteudo);
