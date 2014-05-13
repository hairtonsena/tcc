<?php
$configuraPagina = array();
foreach ($configuracao as $cf) {
    $configuraPagina = $cf;
}
?>
<html>
    <head>
        <title> cPainel - Gestor  </title>
        <meta charset="utf-8"/>
        <link href="<?php echo base_url("css/bt3/css/bootstrap.min.css"); ?>" rel="stylesheet">
        <link rel="shortcut icon" href="<?php echo base_url("icone/PU.ico"); ?>" type="image/x-icon" />
        <style type="text/css">
            html {
                height: 100%;
            }
            body {
                margin: 10% 0% 0% 0%;
                background-color: #f5f5f9;
            }

        </style>
    </head>
    <body>

        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>


                    <a class="navbar-brand" style="margin: 0px 0px 0px 0px; padding:0px 0px 0px 0px;"  href="<?php echo base_url() ?>">
                        <img src="<?php echo base_url("icone/PU321.png") ?>" height="50px" />
                        Problema urbano
                    </a>
                </div> 
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav col-md-5 navbar-right">
                        <li> <a class="" href="javascript:void(0)"><span style="font-size: 20"> <?php echo $cf->nomeMunicipio ?></span></a></li>

                    </ul>
                </div>
                
            </div>
        </nav>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form name="frmLogin" action="<?php echo base_url("cpainel/seguranca/logarUsuario"); ?>" method="post">
                        <div class="col-lg-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title"> Painel de Controle - Gestor </h3>
                                </div>
                                <div class="panel-body">


                                    <span class="text-danger"> 
                                        <?php echo validation_errors(); ?>
                                    </span>
                                    <div class="form-group">
                                        <label for="email"> Email: </label>
                                        <input type="email" class="form-control" id="email" name="email" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="senha"> Senha: </label>
                                        <input type="password" id="senha" class="form-control" name="senha" required />                        
                                    </div>
                                    <div class="form-group">
                                        <label for="textoImagem" class="col-sm-12">Codigo de Validação:</label>
                                        <div class="col-sm-6 thumbnail">
                                            <?php echo $imagemCaptcha ?>      
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" id="textoImagem" name="textoImagem" class="form-control" required />
                                        </div>

                                    </div>

                                    <input type="submit" name="acao" class="form-control btn pull-right btn-primary" value="Entrar"/>


                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </body>
</html>