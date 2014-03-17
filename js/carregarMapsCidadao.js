
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
    generateRandomMarkers: function(status, categoria, idProblema) {

        var alternaCores = 0;
        var div = Conteudo.sideContainer;


        div.innerHTML = '';

        if (Conteudo.visibleInfoWindow) {
            Conteudo.visibleInfoWindow.close();
        }

        Tela.abrirModal();

        $(".window").html('<h2> Carregando... </h2>');

        Conteudo.clearMarkers();

        // fazendo um requisição com json e retornando os dados do mapa
        $.getJSON(Config.base_url + "listarColaboracaoJson?ttt=s", {
            'status': status,
            'categoria': categoria,
            'idProblema': idProblema
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

                    var imagem = Config.base_url + 'icone/icone' + objeto.idTipo + '.png';

                    var marker = new google.maps.Marker({
                        map: Conteudo.map,
                        title: objeto.tipo,
                        position: randLatLng,
                        draggable: false,
                        animation: google.maps.Animation.DROP,
                        icon: imagem

                    });
                    Conteudo.markers.push(marker);

                    var conteudoDireito;
                    var conteudoBalaoMapa;
                    var verificarComentario;
                    var botaoComentar = '';

                    verificarComentario = '<a href="javascript:void(0)" onclick="Problema.verTodosComentario(\'' + objeto.idProblema + '\')">' + objeto.quantidadeComentario + ' Comentários </a>';

                    switch (objeto.idStatus) {

                        case '3':
                            var botaoEditar = 'tttt';
                            if (objeto.user == 'sim') {
                                botaoEditar = '<button class="btn" onclick="Problema.editarColaboracao(' + objeto.idProblema + ')" type="button"> Editar </button>';
                            } else {
                                botaoEditar = '';
                            }


                            conteudoBalaoMapa =
                                    '<div style="font-size: 12; width:300px;"><strong class="tituloProblema"> Tipo: </strong>' +
                                    objeto.tipo +
                                    '<br/><strong class="tituloProblema"> Descrição:</strong>' +
                                    objeto.descricao +
                                    '<br/><strong class="tituloProblema">Data de abertura : </strong>' +
                                    objeto.dataProblema +
                                    '<br/><strong class="tituloProblema">Situação:</strong>' +
                                    objeto.nomeStatus + '<br/>' +
                                    verificarComentario +
                                    botaoEditar + '</div>';


                            conteudoDireito =
                                    '<div style="font-size: 12;"><strong class="tituloProblema"> Tipo: </strong><img src="' + imagem + '"/>' + objeto.tipo +
                                    '<br/><strong class="tituloProblema"> Descrição: </strong>' + objeto.descricao +
                                    '<br/><strong class="tituloProblema">Data de abertura: </strong>' + objeto.dataProblema +
                                    '<br/><strong class="tituloProblema">Situação:</strong>' +
                                    objeto.nomeStatus +
                                    '<br/>' + botaoComentar + ' ' + verificarComentario +
                                    '<br/>' + botaoEditar + '</div>';
                            break;


                        case '6':
                            var botaoConfirma = '';
                            if (objeto.user == 'sim') {
                                botaoConfirma = '<button class="btn" onclick="Problema.confirmaConclusaoProblema(' + objeto.idProblema + ')" type="button"> Confirma </button>';
                            } else {
                                botaoConfirma = '';
                            }


                            conteudoBalaoMapa =
                                    '<div style="font-size: 12; width:300px;"><strong class="tituloProblema"> Tipo: </strong>' +
                                    objeto.tipo +
                                    '<br/><strong class="tituloProblema"> Descrição:</strong>' +
                                    objeto.descricao +
                                    '<br/><strong class="tituloProblema">Data de abertura : </strong>' +
                                    objeto.dataProblema +
                                    '<br/><strong class="tituloProblema">Situação:</strong>' +
                                    objeto.nomeStatus + '<br/>' +
                                    verificarComentario +
                                    botaoConfirma + '</div>';


                            conteudoDireito =
                                    '<div style="font-size: 12;"><strong class="tituloProblema"> Tipo: </strong><img src="' + imagem + '"/>' + objeto.tipo +
                                    '<br/><strong class="tituloProblema"> Descrição: </strong>' + objeto.descricao +
                                    '<br/><strong class="tituloProblema">Data de abertura: </strong>' + objeto.dataProblema +
                                    '<br/><strong class="tituloProblema">Situação:</strong>' +
                                    objeto.nomeStatus +
                                    '<br/>' + botaoComentar + ' ' + verificarComentario +
                                    '<br/>' + botaoConfirma + '</div>';
                            break;

                        case '1' :

                            conteudoBalaoMapa =
                                    '<div style="font-size: 12; width:300px;"><strong class="tituloProblema"> Tipo: </strong>' +
                                    objeto.tipo +
                                    '<br/><strong class="tituloProblema"> Descrição:</strong>' +
                                    objeto.descricao +
                                    '<br/><strong class="tituloProblema">Data de abertura : </strong>' +
                                    objeto.dataProblema +
                                    '<br/><strong class="tituloProblema">Situação:</strong>' +
                                    objeto.nomeStatus +
                                    '<br/>' + botaoComentar + ' </div>';

                            conteudoDireito =
                                    '<div style="font-size: 12;"><strong class="tituloProblema"> Tipo: </strong><img src="' + imagem + '"/>' + objeto.tipo +
                                    '<br/><strong class="tituloProblema"> Descrição: </strong>' + objeto.descricao +
                                    '<br/><strong class="tituloProblema">Data de abertura: </strong>' + objeto.dataProblema +
                                    '<br/><strong class="tituloProblema">Situação:</strong>' +
                                    objeto.nomeStatus +
                                    '<br/>' + botaoComentar +
                                    '</div></div>';
                            break;



                        default :

                            conteudoBalaoMapa =
                                    '<div style="font-size: 12; width:300px;"><strong class="tituloProblema"> Tipo: </strong>' +
                                    objeto.tipo +
                                    '<br/><strong class="tituloProblema"> Descrição:</strong>' +
                                    objeto.descricao +
                                    '<br/><strong class="tituloProblema">Data de abertura : </strong>' +
                                    objeto.dataProblema +
                                    '<br/><strong class="tituloProblema">Situação:</strong>' +
                                    objeto.nomeStatus +
                                    '<br/>' + botaoComentar + ' ' + verificarComentario + '</div>';

                            conteudoDireito =
                                    '<div style="font-size: 12;"><strong class="tituloProblema"> Tipo: </strong><img src="' + imagem + '"/>' + objeto.tipo +
                                    '<br/><strong class="tituloProblema"> Descrição: </strong>' + objeto.descricao +
                                    '<br/><strong class="tituloProblema">Data de abertura: </strong>' + objeto.dataProblema +
                                    '<br/><strong class="tituloProblema">Situação:</strong>' +
                                    objeto.nomeStatus +
                                    '<br/>' + botaoComentar + ' ' + verificarComentario +
                                    '</div></div>';
                            break;
                    }

                    var infoWindow = new google.maps.InfoWindow({
                        content: [
                            conteudoBalaoMapa
                        ].join(''),
                        size: new google.maps.Size(200, 80)
                    });

                    google.maps.event.addListener(marker, 'click', Conteudo.openInfoWindow(infoWindow, marker));


                   // google.maps.event.addListener(marker, 'click', Conteudo.toggleBounce);

                    var divd = document.createElement('div');

                    if (alternaCores == 0) {
                        alternaCores = 1;
                    } else {
                        alternaCores = 0;
                    }

                    divd.className = 'faixa' + alternaCores;
                    divd.onclick = Conteudo.generateTriggerCallback(marker, 'click');
                    var contDiv = conteudoDireito;
                    divd.innerHTML = contDiv;
                    div.appendChild(divd);
                }
            }






            Conteudo.map.setCenter(new google.maps.LatLng(-16.740605618138325, -43.87089729309082));

        });
    },// toggleBounce: function() {
//        if (marker.getAnimation() != null) {
//            marker.setAnimation(null);
//        } else {
//            marker.setAnimation(google.maps.Animation.BOUNCE);
//        }
//    }
//    ,
    init: function() {
        var firstLatLng = new google.maps.LatLng(-16.740605618138325, -43.87089729309082);
        Conteudo.map = new google.maps.Map(Conteudo.mapContainer, {
            zoom: 13,
            center: firstLatLng,
            streetViewControl: false,
            mapTypeId: google.maps.MapTypeId.HYBRID
        });

        Problema.verColaboracoes(0);


        google.maps.event.addListener(Conteudo.map, 'tilesloaded', function() {
            Conteudo.generateLink.style.display = 'block';
        });






        google.maps.event.addDomListener(Conteudo.generateLink, 'click', function() {

        });


        // Clicando em um ponto no mapa para realizar uma nova manifestação 
        google.maps.event.addListener(Conteudo.map, 'click', function(event) {
            if ($('#addColaboracao').is(':checked', true)) {

                Conteudo.map.panTo(event.latLng);
                Conteudo.adicionarPontoMapa(event.latLng);

            }

        });

        google.maps.event.trigger(Conteudo.generateLink, 'click');

        // Trabalhando com GeoLocalizaçao  
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
                alert("Não foi possível localizar o local, erro: " + status);
            }
        });
    }
};

google.maps.event.addDomListener(window, 'load', Conteudo.init, Conteudo);


