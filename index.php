<?php

    include_once 'config.php';

$c = new Controller();
$c->index();
?>
<!DOCTYPE html>
<html class="full" lang="pt-br">
    <!-- Make sure the <html> tag is set to the .full CSS class. Change the background image in the full.css file. -->

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Fale Conosco</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/full.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container1">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <img src="img/fale_conosco.png" alt="Smiley face" width="150" height="50">
                </div>


                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>

        <!-- Put your page content here! -->
        <div class="container">
            <div class="col-md-4">
                <div class="form-area" id="index">  
                    <form method="get" role="form">
                        <br style="clear:both">
                        <h3 style="margin-bottom: 25px; margin-top: 1px; text-align: center;">Fale Conosco</h3>
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" name="nome" placeholder="Nome" required="required">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required="required">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone" required>
                        </div>
                        <div class="form-group">
                            <select type="text" name="option" class="form-control">
                                <option value="sugestao">Sugestão</option>
                                <option value="reclamacao">Reclamação</option>
                                <option value="duvida">Dúvida</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" type="text" name="mensagem" id="message" placeholder="Message" maxlength="140" rows="7"></textarea> 
                            <span class="help-block"><p id="characterLeft" class="help-block ">Excedeu o limite de caracteres</p></span>                    
                        </div>

                        <button type="submit" id="enviar" name="enviar" class="btn btn-primary btn-block btn-large">Enviar</button>    
                    </form>
                </div>
            </div>
        </div>
         
        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
        <script src="js/form.js"></script>      
    </body>
</html>
