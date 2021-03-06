<?php
$configuraPagina = array();
foreach ($configuracao as $cf) {
    $configuraPagina = $cf;
    break;
}
?>

<style type="text/css">
    /* =============== Estilos do autocomplete =============== */

    .ui-helper-hidden-accessible {
        display: none;
    }

    .ui-autocomplete { 
        background: #fff; 
        border-top: 1px solid #ccc;
        cursor: pointer; 
        font: 15px 'Open Sans',Arial;
        margin-left: 1px;
        width: 300px !important;
        position: fixed;
    }

    .ui-autocomplete .ui-menu-item { 
        list-style: none outside none;
        padding: 7px 0 9px 10px;
    }

    .ui-autocomplete .ui-menu-item:hover { background: #eee }

    .ui-autocomplete .ui-corner-all { 
        color: #666 !important;
        display: block;
    }
</style>

<!--<script src="http://maps.google.com/maps/api/js?sensor=false"></script>-->

<script>
    var map;
    var geocoder;
    var lat = <?php echo $configuraPagina->latitudeCentralMunicipio ?>;
    var log = <?php echo $configuraPagina->longitudeCentralMunicipio ?>;
    var nivelZoom = <?php echo $configuraPagina->zoomMapsInicial ?>;
    var sVMaps = <?php
if ($configuraPagina->streetViewMaps == 1) {
    echo 'false';
} else {
    echo 'false';
}
?>;

    function initialize() {
        var mapOptions = {
            zoom: nivelZoom,
            center: new google.maps.LatLng(lat, log),
            streetViewControl: sVMaps
        };
        map = new google.maps.Map(document.getElementById('map-canvas'),
                mapOptions);

        geocoder = new google.maps.Geocoder();

        google.maps.event.addListener(map, 'click', function(event) {

            var latlong = "" + event.latLng
            latlong = latlong.replace("(", "");
            latlong = latlong.replace(")", "");

            var arrLatLong = latlong.split(",");

            $("#latitudeMunicipio").val();
            $("#longitudeMunicipio").val();

            preencherLatLng(arrLatLong[0], arrLatLong[1])

        });
    }

    function preencherLatLng(lat, lng) {
        $("#latitudeMunicipio").val(lat);
        $("#longitudeMunicipio").val(lng);

    }

    $("#presquisa").autocomplete({
        source: function(request, response) {
            geocoder.geocode({'address': request.term + ', Brasil', 'region': 'BR'}, function(results, status) {
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


            preencherLatLng(ui.item.latitude, ui.item.longitude);

            map.setCenter(location);
            map.setZoom(nivelZoom);
        }
    });


    $("#btnPesquisar").click(function() {

        var local = $("#presquisa").val();


        var address = local;
        geocoder.geocode({
            'address': address
        }, function(results, status) {
            //            
            if (status == google.maps.GeocoderStatus.OK) {
                map.setCenter(results[0].geometry.location);
                map.setZoom(nivelZoom);


            } else {
                alert("Não foi possível localizar o local, erro: " + status);
            }
        });


    });



    //    function mostraEndereco(local) {
    //
    //  
    //    }

    //google.maps.event.addDomListener(window, 'load', initialize);

</script> 

<script>initialize()</script>
<h2>Configuração geral</h2>

<div class="row">
    <div class="col-md-8">
        <form onsubmit="Gestor.salvarConfiguracao();
                return false;">
            <div class="col-md-6">
                <h4>Dados da prefeitura</h4>
                <input id="idMunicipio" type="hidden" value="<?php echo $configuraPagina->idConfiguracao ?>"/>


                <span class="col-md-4"><strong> Nome :</strong></span>
                <div class="col-md-8"><input class="form-control" name="nome" id="nomeMunicipio" value="<?php echo $configuraPagina->nomeMunicipio ?>"/></div>


                <span class="col-md-4"><strong>CNPJ :</strong></span>
                <div class="col-md-8"><input class="form-control" name="cnpj" id="cnpjMunicipio" value="<?php echo $configuraPagina->cnpjMunicipio ?>"/></div>


                <span class="col-md-4"><strong>Endereço :</strong></span>
                <div class="col-md-8"><input class="form-control" name="cep" id="cepMunicipio" value="<?php echo $configuraPagina->cepMunicipio ?>"/></div> 


                <span class="col-md-4"><strong>Telefone :</strong></span>
                <div class="col-md-8"><input class="form-control" name="telefone" id="telefoneMunicipio" value="<?php echo $configuraPagina->telefoneMunicipio ?>"/></div> 

                <span class="col-md-4"><strong>Email :</strong></span>
                <div class="col-md-8"><input class="form-control" name="email" id="emailMunicipio" value="<?php echo $configuraPagina->emailMunicipio ?>"/></div> 

                <span class="col-md-4"><strong>Web Site :</strong></span>
                <div class="col-md-8"><input class="form-control" name="site" id="siteMunicipio" value="<?php echo $configuraPagina->siteMunicipio ?>"/></div> 
                <div class="col-md-10 col-md-offset-2"><span class="text-danger"><h5><?php echo validation_errors(); ?> </h5></span></div>
            </div>
            <div class="col-md-6">
                <h4>Dados do mapa</h4>
                
                <div class="col-md-8 col-md-offset-4"><apan class="read"> Para alterar latitude e longitude clique no mapa </apan></div>
                <span class="col-md-4"><strong> Latitude :</strong></span>
                <div class="col-md-8"><input class="form-control" title="Click no mapa ao lado para alterar este valor" readonly="true" name="latitude" id="latitudeMunicipio" value="<?php echo $configuraPagina->latitudeCentralMunicipio ?>"/></div>


                <span class="col-md-4"><strong>Longitude :</strong></span>
                <div class="col-md-8"><input class="form-control" title="Click no mapa ao lado para alterar este valor" readonly="true" name="longitude" id="longitudeMunicipio" value="<?php echo $configuraPagina->longitudeCentralMunicipio ?>"/></div>


                <span class="col-md-4"><strong>Zoom inicial :</strong></span>
                <div class="col-md-8">
                    <select class="form-control" name="zoom" id="zoomMaps" >
                        <?php for ($i = 0; $i < 22; $i++) { ?>
                            <?php if ($configuraPagina->zoomMapsInicial == $i) { ?>

                                <option selected="true" value="<?php echo $i ?>"><?php echo $i ?></option>
                            <?php } else { ?>
                                <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div> 

            </div>

            <div class="col-lg-12">
                <div class="col-md-4 col-md-offset-8">
                    <br/>
                    <button type="submit" class="btn btn-primary" >Salvar</button>
                    <button type="button" class="btn btn-default" onclick="Gestor.configuracaoGeral()">Cancelar</button>

                </div>
            </div>
        </form>

    </div>

    <div class="col-md-4"  >
        <div class="col-md-8">
            <input class="form-control"  name="presquisa" id="presquisa" placeholder="Pesquisar local..." value=""/>
        </div>
        <span class="col-md-4"><button type="button" id="btnPesquisar" class="btn btn-primary">Pesquisar</button></span>

        <div class="col-lg-12" id="map-canvas" style="height: 300px; background-color: #269abc">

        </div>
    </div>



</div>

