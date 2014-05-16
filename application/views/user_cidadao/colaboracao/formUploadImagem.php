<style type="text/css">
    /*#container {width: 800px;margin: 0 auto;}*/
    #porcentagem {width: 100%;border: solid 1px #000;margin-top: 10px;}
    /*#mensagem {margin-top: 10px;}*/
    /*#barra{color: #000; background-color: #900; width: 0px;color: #000;}*/
</style>
<script>

    var mensagem = $("#mensagem");
    var barra = $("#barra");
    var campoImgame = $("#arquivo");


    $("#btn_enviar").on('click', function(event) {

        barra.width('0%');
        barra.html('0%');

        event.preventDefault();

        if (campoImgame.val() == "") {
            mensagem.html("Por favor, selecione um arquivo!");
        } else {
            $("#form_upload").ajaxForm({
                url: 'colaboracao/salvarImagem',
                uploadProgress: function(event, position, total, percentComplete) {
                    // barra.css('color', '#fff');
                    barra.width(percentComplete);
                    barra.html(percentComplete + '%');
                },
                success: function(data) {
                    barra.width('100%');
                    console.log(data);
                    mensagem.html(data);
                    campoImgame.val("");

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


</script>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title"> Anexar imagem </h4>
</div>
<div class="modal-body">

    <div id="container">
        <form action="" method="post" id="form_upload" enctype="multipart/form-data">
            <p class="text-info">
                Caso não queira anexar imagem click em "Concluir".
            </p>
            <input type="hidden" name="problema" value="<?php echo $problema ?>"/>
            <input type="file" required="true" class="form-control" id="arquivo" name="arquivo">
            <div id="mensagem" class="text-danger"></div>

            <div class="progress" id="porcentagem">
                <div class="progress-bar" id="barra" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:0%;">
                    0%
                </div>
            </div>


            <input type="submit" class="btn btn-primary form-control" name="enviar" id="btn_enviar">

            <br/>
            <br/>

            <input type="button" class="btn btn-default pull-right" onclick="Tela.fecharModal()" value="Concluir" /> 



        </form>



        <!--        <div class="progress" id="porcentagem">
                    <div class="progress-bar" id="barra" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:0%;">
                        0%
                    </div>-->
    </div>

</div>

</div>
<br/>