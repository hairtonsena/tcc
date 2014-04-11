
<html>
    <head>
        <title> cPainel - Gestor  </title>
        <meta charset="utf-8"/>
        <link href="<?php echo base_url("css/bt3/css/bootstrap.min.css"); ?>" rel="stylesheet">

        <style type="text/css">
            html {
                height: 100%;
            }
            body {
                margin: 10% 0% 0% 0%;
                background-color: #fcfcfc;
            }

        </style>
    </head>
    <body>

        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <a href="<?php echo base_url() ?>" class="btn btn-large navbar-btn btn-primary"> Voltar para ao site </a> 
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