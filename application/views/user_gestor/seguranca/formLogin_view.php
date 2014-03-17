
<html>
    <head>
        <title> cPainel - Gestor  </title>
        <meta charset="utf-8"/>
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>bootstrap/css/bootstrap-responsive.css" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>bootstrap/css/bootstrap-responsive.min.css" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>bootstrap/css/bootstrap.css" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>bootstrap/css/bootstrap.min.css" />

        <style type="text/css">
            html {
                height: 100%;
            }
            body {
                height: 100%;
                background-color: #fcfcfc;
            }

            #conteiner {
                height: 80%;

            }

            #pnlLogin {
                margin: 6% 40%;
                background-color: #eee;
            }
            
            .amentarCampo {height: 30px;}
        </style>
    </head>
    <body>
        <div style=" background-color: #eee; height: 20%">
            <div style="text-align: center; width: 20%;height: 100%; float: left; background-image: url('<?php echo base_url() ?>icone/moc.png');background-repeat: no-repeat;background-size: 100%" >
                Montes Claros - MG
            </div>
            <a href="<?php echo base_url() ?>" class="btn btn-large btn-primary"> Voltar para o inicio </a> 
        </div>
        <div id="conteiner">
            <div class="thumbnail span4" id="pnlLogin">
                <form name="frmLogin" action="<?php echo base_url()."cpainel/seguranca/logarUsuario" ?>" method="post">
                    <fieldset>

                        <legend> Painel de Controle </legend>
                        <span class="text-error"> 
                            <?php echo validation_errors(); ?>
                        </span>
                        <label> Email: </label>
                        <input type="email" name="email" class="span4" required /><br/>
                        <label> Senha: </label>
                        <input type="password" name="senha" class="span4" required />                        
                        <br/>
                        <label>Codigo de Validação:</label>
                        <?php echo $imagemCaptcha ?>
                        <input type="text" name="textoImagem" class="input-small" required />
                        <br/>
                        <input type="submit" name="acao" class="btn pull-right btn-primary" value="Entrar"/>

                    </fieldset>
                </form>
            </div>
        </div>
    </body>
</html>