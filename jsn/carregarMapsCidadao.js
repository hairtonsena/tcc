
var Conteudo = {
    map: null,
    mapContainer: document.getElementById('map_canvas'),
    sideContainer: document.getElementById('menuDireito'),
    generateLink: document.getElementById('generateLink'),
    markers: [],
    visibleInfoWindow: null,
    geocoder: null,
    latlog: null,
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
    generateRandomMarkers: function(status, categoria, ordem, minhaColaboracoes, idProblema) {

        var alternaCores = 0;
        var div = Conteudo.sideContainer;


        div.innerHTML = '';

        if (Conteudo.visibleInfoWindow) {
            Conteudo.visibleInfoWindow.close();
        }



        Conteudo.clearMarkers();

        // fazendo um requisição com json e retornando os dados do mapa
        $.getJSON(Config.base_url + "listarColaboracaoJson?ttt=s", {
            'status': status,
            'categoria': categoria,
            'idProblema': idProblema,
            'minhaColaboracoes': minhaColaboracoes,
            'ordem': ordem
        }, function(json) {


            if (json.length == 0) {

                div.innerHTML = '<h4> Nenhuma colaboração encontrada!</h4>';
                //alert('Nenhum marcador Encontrado!');
            } else {

                //var idColaboracao = 0;
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
                        animation: google.maps.Animation.DROP,
                        icon: imagem

                    });
                    Conteudo.markers.push(marker);

                    var conteudoDireito;
                    var conteudoBalaoMapa;
                    var verificarComentario;
                    var botoesApoioDenucia;
                    var botoesApoioDenuciaB;
                    var botaoComentar = '';



                    verificarComentario = '<a href="javascript:void(0)" onclick="Problema.verTodosComentario(\'' + objeto.idProblema + '\')"> Comentários ' + objeto.qtde_comentario + ' </a>';

                    if (objeto.userLogado == 'sim') {
                        if (objeto.jaApoiei == 'nao') {
                            botoesApoioDenucia = '<button type="button" id="botaoApoio' + objeto.idProblema + '" class="btn btn-primary btn-xs" onclick="Problema.apoiaProblema(\'' + objeto.idProblema + '\')" >' +
                                    '<i class="glyphicon glyphicon-thumbs-up"></i> ' +
                                    '<span class="text-info badge" id="numApoio' + objeto.idProblema + '">' + objeto.qtde_apoio + '</span>' +
                                    '</button>';
                            botoesApoioDenuciaB = '<button type="button" id="botaoApoioB' + objeto.idProblema + '" class="btn btn-primary btn-xs" onclick="Problema.apoiaProblema(\'' + objeto.idProblema + '\')" >' +
                                    '<i class="glyphicon glyphicon-thumbs-up"></i> ' +
                                    '<span class="text-info badge" id="numApoioB' + objeto.idProblema + '">' + objeto.qtde_apoio + '</span>' +
                                    '</button>';
                        } else {
                            botoesApoioDenucia = '<button type="button" disabled="true" class="btn btn-primary btn-xs" onclick="alert(\'Você já Apoiou\')" >' +
                                    '<i class="glyphicon glyphicon-thumbs-up"></i> ' +
                                    '<span class="text-info badge">' + objeto.qtde_apoio + '</span>' +
                                    '</button>';
                            botoesApoioDenuciaB = '<button type="button" disabled="true" class="btn btn-primary btn-xs" onclick="alert(\'Você já Apoiou\')" >' +
                                    '<i class="glyphicon glyphicon-thumbs-up"></i> ' +
                                    '<span class="text-info badge">' + objeto.qtde_apoio + '</span>' +
                                    '</button>';
                        }
                        ;

                        if (objeto.jaReprovei == 'nao') {
                            botoesApoioDenucia = botoesApoioDenucia +
                                    ' <button type="button" id="botaoReprova' + objeto.idProblema + '" class="btn btn-default btn-xs" onclick="Problema.reprovadoProblema(\'' + objeto.idProblema + '\')">' +
                                    '<i class="glyphicon glyphicon-thumbs-down"></i> ' +
                                    '<span class="text-error badge" id="numReprova' + objeto.idProblema + '">' + objeto.qtde_denuncia + '</span>' +
                                    '</button>';
                            botoesApoioDenuciaB = botoesApoioDenuciaB +
                                    ' <button type="button" id="botaoReprovaB' + objeto.idProblema + '" class="btn btn-default btn-xs" onclick="Problema.reprovadoProblema(\'' + objeto.idProblema + '\')">' +
                                    '<i class="glyphicon glyphicon-thumbs-down"></i> ' +
                                    '<span class="text-error badge" id="numReprovaB' + objeto.idProblema + '">' + objeto.qtde_denuncia + '</span>' +
                                    '</button>';
                        } else {
                            botoesApoioDenucia = botoesApoioDenucia +
                                    ' <button type="button"  disabled="true" class="btn btn-default btn-xs" onclick="Problema.reprovadoProblema(\'' + objeto.idProblema + '\')">' +
                                    '<i class="glyphicon glyphicon-thumbs-down"></i> ' +
                                    '<span class="text-error badge" >' + objeto.qtde_denuncia + '</span>' +
                                    '</button>';
                            botoesApoioDenuciaB = botoesApoioDenuciaB +
                                    ' <button type="button"  disabled="true" class="btn btn-default btn-xs" onclick="Problema.reprovadoProblema(\'' + objeto.idProblema + '\')">' +
                                    '<i class="glyphicon glyphicon-thumbs-down"></i> ' +
                                    '<span class="text-error badge" >' + objeto.qtde_denuncia + '</span>' +
                                    '</button>';
                        }

                    } else {
                        botoesApoioDenucia = '<a class="btn btn-primary btn-xs" href="javascript:void(0)" onclick="alert(\'Desculpe, faça login para realizar esta operação\')" >' +
                                '<i class="glyphicon glyphicon-thumbs-up"></i> ' +
                                '<span class="text-info badge">' + objeto.qtde_apoio + '</span>' +
                                '</a> ' +
                                '<a class="btn btn-default btn-xs" href="javascript:void(0)" onclick="alert(\'Desculpe, faça login para realizar esta operação\')">' +
                                '<i class="glyphicon glyphicon-thumbs-down"></i> ' +
                                '<span class="text-error badge">' + objeto.qtde_denuncia + '</span>' +
                                '</a>';
                        botoesApoioDenuciaB = ' <a class="btn btn-primary btn-xs" href="javascript:void(0)" onclick="alert(\'Desculpe, faça login para realizar esta operação\')" >' +
                                '<i class="glyphicon glyphicon-thumbs-up"></i> ' +
                                '<span class="text-info badge">' + objeto.qtde_apoio + '</span>' +
                                '</a> ' +
                                '<a class="btn btn-default btn-xs" href="javascript:void(0)" onclick="alert(\'Desculpe, faça login para realizar esta operação\')">' +
                                '<i class="glyphicon glyphicon-thumbs-down"></i> ' +
                                '<span class="text-error badge">' + objeto.qtde_denuncia + '</span>' +
                                '</a>';
                    }

                    switch (objeto.idStatus) {

                        case '3':
                            var botaoEditar = 'tttt';
                            if (objeto.user == 'sim') {
                                botaoEditar = '<button class="btn btn-default" onclick="Problema.editarColaboracao(' + objeto.idProblema + ')" type="button"> Editar </button>';
                            } else {
                                botaoEditar = '';
                            }


                            conteudoBalaoMapa =
                                    '<div style="font-size: 12; width:300px;"><img src="' + imagem + '"/> ' + objeto.tipo + '</strong><span class="pull-right">' + objeto.dataProblema + '</span>' +
                                    '<br/>' + objeto.descricao +
                                    imagemProblema +
                                    '<br/><strong class="tituloProblema">Situação:</strong>' +
                                    objeto.nomeStatus +
                                    '<div class="" style="text-align: right">' + botaoEditar + verificarComentario + botoesApoioDenuciaB +
                                    '</div></div>';


                            conteudoDireito =
                                    '<div style="font-size: 12;"><strong class="tituloProblema"> <img src="' + imagem + '"/> ' + objeto.tipo + '</strong><span class="pull-right">' + objeto.dataProblema + '</span>' +
                                    '<br/>' + objeto.descricao +
                                    '<br/><strong class="tituloProblema">Situação:</strong>' +
                                    objeto.nomeStatus +
                                    '<div class="" style="text-align: right">' + botaoEditar + verificarComentario + botoesApoioDenucia +
                                    '</div></div>';
                            break;


                        case '6':
                            var botaoConfirma = '';
                            if (objeto.user == 'sim') {
                                botaoConfirma = '<button class="btn btn-default" onclick="Problema.editarColaboracao(' + objeto.idProblema + ')" type="button"> Reabrir </button>';
                            } else {
                                botaoConfirma = '';
                            }


                            conteudoBalaoMapa =
                                    '<div style="font-size: 12; width:300px;"><img src="' + imagem + '"/> ' + objeto.tipo + '</strong><span class="pull-right">' + objeto.dataProblema + '</span>' +
                                    '<br/>' + objeto.descricao +
                                    '<br/><strong class="tituloProblema">Situação:</strong>' +
                                    objeto.nomeStatus +
                                    '<div class="" style="text-align: right">' + botaoConfirma + verificarComentario + botoesApoioDenuciaB +
                                    '</div></div>';


                            conteudoDireito =
                                    '<div style="font-size: 12;"><strong class="tituloProblema"> <img src="' + imagem + '"/> ' + objeto.tipo + '</strong><span class="pull-right">' + objeto.dataProblema + '</span>' +
                                    '<br/>' + objeto.descricao +
                                    '<br/><strong class="tituloProblema">Situação:</strong>' +
                                    objeto.nomeStatus +
                                    '<div class="" style="text-align: right">' + botaoConfirma + verificarComentario + botoesApoioDenucia +
                                    '</div></div>';
                            break;

                        case '1' :

                            conteudoBalaoMapa =
                                    '<div style="font-size: 12; width:300px;"><img src="' + imagem + '"/> ' + objeto.tipo + '</strong><span class="pull-right">' + objeto.dataProblema + '</span>' +
                                    '<br/>' + objeto.descricao +
                                    imagemProblema +
                                    '<br/><strong class="tituloProblema">Situação:</strong>' +
                                    objeto.nomeStatus +
                                    '<div class="" style="text-align: right">' + verificarComentario + botoesApoioDenuciaB +
                                    '</div></div>';

                            conteudoDireito =
                                    '<div style="font-size: 12;"><strong class="tituloProblema"> <img src="' + imagem + '"/> ' + objeto.tipo + '</strong><span class="pull-right">' + objeto.dataProblema + '</span>' +
                                    '<br/>' + objeto.descricao +
                                    '<br/><strong class="tituloProblema">Situação:</strong>' +
                                    objeto.nomeStatus +
                                    '<div class="" style="text-align: right">' + verificarComentario + botoesApoioDenucia +
                                    '</div></div>';
                            ;
                            break;



                        default :

                            conteudoBalaoMapa =
                                    '<div style="font-size: 12; width:300px;"><img src="' + imagem + '"/> ' + objeto.tipo + '</strong><span class="pull-right">' + objeto.dataProblema + '</span>' +
                                    '<br/>' + objeto.descricao +
                                    imagemProblema +
                                    '<br/><strong class="tituloProblema">Situação:</strong>' +
                                    objeto.nomeStatus +
                                    '<div class="" style="text-align: right">' + verificarComentario + botoesApoioDenuciaB +
                                    '</div></div>';

                            conteudoDireito =
                                    '<div style="font-size: 12;"><strong class="tituloProblema"> <img src="' + imagem + '"/> ' + objeto.tipo + '</strong><span class="pull-right">' + objeto.dataProblema + '</span>' +
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

                    google.maps.event.addListener(marker, 'click', Conteudo.openInfoWindow(infoWindow, marker));


                    // google.maps.event.addListener(marker, 'click', Conteudo.toggleBounce);

                    var divd = document.createElement('div');

                    if (alternaCores == 0) {
                        alternaCores = 1;
                    } else {
                        alternaCores = 0;
                    }

                    divd.className = 'faixa' + alternaCores + ' list-group-item active';
                    divd.onclick = Conteudo.generateTriggerCallback(marker, 'click');
                    var contDiv = conteudoDireito;
                    divd.innerHTML = contDiv;
                    div.appendChild(divd);
                }
            }


//            Conteudo.map.setCenter(new google.maps.LatLng(Config.latitudeCentralMaps, Config.longitudeCentralMaps));

        });
    }, // toggleBounce: function() {
    //        if (marker.getAnimation() != null) {
    //            marker.setAnimation(null);
    //        } else {
    //            marker.setAnimation(google.maps.Animation.BOUNCE);
    //        }
    //    }
    //    ,
    init: function() {


        var firstLatLng = new google.maps.LatLng(Config.latitudeCentralMaps, Config.longitudeCentralMaps);

        Conteudo.map = new google.maps.Map(Conteudo.mapContainer, {
            zoom: Config.zoomMapsInicial,
            center: firstLatLng,
            streetViewControl: Config.streetViewMaps,
            mapTypeId: google.maps.MapTypeId.HYBRID
        });

        Tela.iniciarTela();



        google.maps.event.addListener(Conteudo.map, 'tilesloaded', function() {
            Conteudo.generateLink.style.display = 'block';
        });






        google.maps.event.addDomListener(Conteudo.generateLink, 'click', function() {

        });


        // Clicando em um ponto no mapa para realizar uma nova manifestação 
        google.maps.event.addListener(Conteudo.map, 'click', function(event) {
            if ($('#addColaboracao').is(':checked', true)) {
                $('#addColaboracao').attr('checked', false);
                Conteudo.map.panTo(event.latLng);
                Tela.abrirModal();
                Conteudo.adicionarPontoMapa(event.latLng);

            }

        });

        // adicionando problema do mapa com o botao direito
        google.maps.event.addListener(Conteudo.map, 'rightclick', function(event) {

            Conteudo.latlog = event.latLng;
            Tela.abriMenuDireito();

            Conteudo.map.panTo(event.latLng);



        });
        google.maps.event.trigger(Conteudo.generateLink, 'click');

        // Trabalhando com GeoLocalizaçao  
        Conteudo.geocoder = new google.maps.Geocoder();


        $("#textoPesquisa").autocomplete({
            source: function(request, response) {
                Conteudo.geocoder.geocode({
                    'address': request.term + ',' + Config.nomeMunicipio + ', Brasil',
                    'region': 'BR'
                }, function(results, status) {
                    response($.map(results, function(item) {
                        return {
                            label: item.formatted_address,
                            value: item.formatted_address,
                            latitude: item.geometry.location.lat(),
                            longitude: item.geometry.location.lng()
                        }
                    }));
                })
            },
            select: function(event, ui) {

                var location = new google.maps.LatLng(ui.item.latitude, ui.item.longitude);

                Conteudo.map.setCenter(location);
                Conteudo.map.setZoom(21);
            }
        });


    },
    // Adicionando um novo problema no mapa atravez do botão Direito
    adicionarPontoBotaoDireito: function() {

        Tela.abrirModal();

        $("#jqxMenu").css({
            display: 'none'
        });


        Problema.adicionarPontoMapa(Conteudo.latlog);
    }
    ,
    adicionarPontoMapa: function(verTeste) {
        Problema.adicionarPontoMapa(verTeste);

    },
    mostraEndereco: function(local) {



        var address = local;
        Conteudo.geocoder.geocode({
            'address': address
        }, function(results, status) {
            //            
            if (status == google.maps.GeocoderStatus.OK) {
                Conteudo.map.setCenter(results[0].geometry.location);
                Conteudo.map.setZoom(21);


            } else {
                alert("Não foi possível localizar o local, erro: " + status);
            }
        });
    }


};

google.maps.event.addDomListener(window, 'load', Conteudo.init, Conteudo);


