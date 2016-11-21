<?php
    include_once '../../faleconosco/models/Conexao.class.php';
    include_once '../../faleconosco/models/Usuario.class.php';
    include_once '../../faleconosco/controller/Controller.class.php';
    
    session_start();
    $c = new Controller();
    $busca = $c->buscaUsuario();
    $c->editar();
    $c->logouf();
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
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/full.css" rel="stylesheet">
    <link href="../css/cadastro.css" rel="stylesheet">
     <link href="../css/estilo.css" rel="stylesheet">
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
                <img src="../img/fale_conosco.png" alt="Smiley face" width="150" height="50">
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                   <div class="dropdown">
                  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Menu Opções</button>
                    <ul class="dropdown-menu">
                        <li><a href="todos.php">Todos</a></li>
                        <li><a href="abertos.php">Abertos</a></li>
                        <li><a href="fechados.php">Fechados</a></li>
                        <?php if ($_SESSION['perfil'] == 'admin'):?>
                            <li><a href="lista_usuarios.php">Usuarios</a></li>
                        <?php endif; ?>
                            <li><a href="editar.php?logouf=">Sair</a></li>

                    </ul>
                    <p class="bemvindo" align="right">Bem vindo, <?php echo $_SESSION['login']; ?> !</p>
              </div>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <div class="container">
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
            <div class="panel panel-default">
                <h2 class="panel-title" align="center" style="margin-bottom: 10px; font-size: 20px; font-weight: bold;">Painel de edição</h2>
                        <div class="panel-body">
                            <form role="form" method="post">
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="nome" id="nome" value="<?php echo $busca['nome']; ?>" class="form-control input-sm">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="sobrenome" id="sobrenome" value="<?php echo $busca['sobrenome']; ?>" class="form-control input-sm">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="email" name="email" id="email" value="<?php echo $busca['email']; ?>" class="form-control input-sm" >
                            </div>
                            <div class="form-group">
                             <select type="text" name="option" class="form-control">
                                 <option value="usuario">Usuario</option>
                                 <option value="admin">Admin</option>
                            </select>
                             </div>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                            <input type="text" name="login" id="login" value="<?php echo $busca['login']; ?>" class="form-control input-sm">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="senha" id="senha" value="<?php echo $busca['senha']; ?>" class="form-control input-sm">
                                    </div>
                                </div>
                            </div>
                                <button type="submit" id="save" name="editar" class="btn btn-info btn-block">Editar</button>
                                 <input type="hidden" name="id" value="<?php echo $busca['id']; ?>"/>
                                 <br>
                                 <a href="../views/lista_usuarios.php" id="save" class="btn btn-info btn-block" role="button">Voltar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="../jquery/dropdown.js"></script>
<script src="../js/dropdown.js"></script>
<div  class="rodape">
    <footer>
        <p>Projeto Pós Desenvolvimento WEB</p>
        <p>Grupo: Flávio Rodrigo, Eric Neder e Luiz Euzébio.</p>
    </footer>    
</div>
</body>

</html>