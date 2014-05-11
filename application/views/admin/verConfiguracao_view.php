<?php
$configuraPagina = array();
foreach ($configuracao as $cf) {
    $configuraPagina = $cf;
    break;
}
?>

<!--<script src="http://maps.google.com/maps/api/js?sensor=false"></script>-->

<script>
    var map;
    var lat= <?php echo $configuraPagina->latitudeCentralMunicipio ?>;
    var log = <?php echo $configuraPagina->longitudeCentralMunicipio ?>;
    var nivelZoom = <?php echo $configuraPagina->zoomMapsInicial ?>;
    var sVMaps = <?php
if ($configuraPagina->streetViewMaps == 1) {
    echo 'true';
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
        
        google.maps.event.addListener(map, 'click', function(event) {
            //alert(event.latLng);
        });
    }

    //google.maps.event.addDomListener(window, 'load', initialize);

</script> 

<script>initialize()</script>
<h2>Configuração Geral</h2>
<div class="row">
    <div class="col-lg-12">
        <button class="btn btn-primary" onclick="Gestor.editarConfiguracao()" type="button">Editar Configuracão</button>
    </div>
    <div class="col-md-4">
        <h4>Municipio</h4>

        <span class="col-md-4"><strong> Nome :</strong></span>
        <div class="col-md-8"><?php echo $configuraPagina->nomeMunicipio ?></div>


        <span class="col-md-4"><strong>CNPJ :</strong></span>
        <div class="col-md-8"><?php echo $configuraPagina->cnpjMunicipio ?></div>


        <span class="col-md-4"><strong>CEP :</strong></span>
        <div class="col-md-8"><?php echo $configuraPagina->cepMunicipio ?></div> 


        <span class="col-md-4"><strong>Telefone :</strong></span>
        <div class="col-md-8"><?php echo $configuraPagina->telefoneMunicipio ?></div> 

        <span class="col-md-4"><strong>Email :</strong></span>
        <div class="col-md-8"><?php echo $configuraPagina->emailMunicipio ?></div> 

        <span class="col-md-4"><strong>Web Site :</strong></span>
        <div class="col-md-8"><?php echo $configuraPagina->siteMunicipio ?></div> 

    </div>
    <div class="col-md-4">
        <h4>Maps</h4>
        <span class="col-md-4"><strong> Latitude :</strong></span>
        <div class="col-md-8"><?php echo $configuraPagina->latitudeCentralMunicipio ?></div>


        <span class="col-md-4"><strong>Longitude :</strong></span>
        <div class="col-md-8"><?php echo $configuraPagina->longitudeCentralMunicipio ?></div>


        <span class="col-md-4"><strong>Zoom Maps :</strong></span>
        <div class="col-md-8"><?php echo $configuraPagina->zoomMapsInicial ?></div> 


        <span class="col-md-4"><strong>Stree View :</strong></span>
        <div class="col-md-8"><?php
if ($configuraPagina->streetViewMaps == 1) {
    echo 'true';
} else {
    echo 'false';
}
?></div> 
    </div>
    <div class="col-md-4" id="map-canvas" style="height: 200px; background-color: #269abc">

    </div>


</div>

