<style type="text/css">
    /*#container {width: 800px;margin: 0 auto;}*/
    #porcentagem {width: 100%;margin-top: 10px; display: none}
    /*#mensagem {margin-top: 10px;}*/
    /*#barra{color: #000; background-color: #900; width: 0px;color: #000;}*/


    .inputFile {
        /*width: 185px;*/
        height:40px;
        position: relative;
        overflow: hidden;
        background: #5bc0de;
        line-height: 40px;
        /*cursor: pointer;*/
    }
    
  
    
    .inputFile span {
        display: block;
        position: absolute;
        color: #ffffff;
        font-size: 20px;
        /*cursor: pointer;*/
    }
    .inputFile input {
        position: absolute;
        right: 0;
        z-index: 2;
        font-size: 100px; /* Aumenta tamanho do campo */
        opacity: 0;
        filter: alpha(opacity=0);
        cursor: pointer;
    }
    

</style>
<script>

    var mensagem = $("#mensagem");
    var div_porcentagem = $("#porcentagem");
    var barra = $("#barra");
    var campoImgame = $("#arquivo");
    var textoCampoUp = $("#textoCampoUp");
    


    $("#btn_enviar").on('click', function(event) {

        barra.width('0%');
        barra.html('0%');

        event.preventDefault();

        if (campoImgame.val() == "") {
            mensagem.html("<div class='alert alert-danger'>Por favor, selecione uma imagem!<div>");
        } else {
            $("#form_upload").ajaxForm({
                url: 'colaboracao/salvarImagem',
                uploadProgress: function(event, position, total, percentComplete) {
                    div_porcentagem.css('display', 'block');
                    barra.width(percentComplete + '%');
                    barra.html(percentComplete + '%');
                },
                success: function(data) {

                    if (data == "sucesso") {
                        barra.width('100%');
                        console.log(data);
                        mensagem.html("<div class='alert alert-success'>Imagem enviada com sucesso!");
                        campoImgame.val("");
                        Problema.verColaboracoesAposSalvar();

                        alert("Imagem enviada com sucesso!");
                        Tela.fecharModal();

                    } else {

                        barra.width('100%');
                        console.log(data);
                        mensagem.html(data);
                        campoImgame.val("");
                        textoCampoUp.html('<i class="glyphicon glyphicon-camera"></i> Selecione uma imagem </span>');
                    }
                },
                error: function() {
                    mensagem.html('Erro ao tentar acessar o arquivo!');
                },
                //  datatype: 'post',
                //  data: 'id_mural=agora',
                resetFrom: true
            }).submit();
        }
    });


    $("#arquivo").change(function() {
        $(this).prev().html($(this).val());
    });

</script>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title"> Anexar imagem </h4>
</div>
<div class="modal-body">

    <div id="container">
        <form action="" method="post" id="form_upload" enctype="multipart/form-data">
            <input type="hidden" name="problema" value="<?php echo $problema ?>"/> 
            <div id="mensagem"></div>
            
            <div class="inputFile col-lg-12">
               
                <span class="" id="textoCampoUp"><i class="glyphicon glyphicon-camera"></i> Selecione uma imagem </span>
                <input type="file" id="arquivo" name="arquivo">

            </div>

            <br/>
            <br/>

            <div class="progress" id="porcentagem">
                <div class="progress-bar" id="barra" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:0%;">
                    0%
                </div>
            </div>

            <br/>
            <div class="text-center">
                <input type="submit" class="btn btn-primary pull-left" name="enviar" id="btn_enviar">  ou        
                <input type="button" class="btn btn-default pull-right" onclick="Tela.fecharModal()" value="Finalizar" /> 
            </div>


        </form>

    </div>

</div>

</div>
<br/>