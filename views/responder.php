<?php
    
    include_once '../../faleconosco/models/Chamado.class.php';
    include_once '../../faleconosco/controller/Controller.class.php';
    
    session_start();
    $c = new Controller();
    $chamado = $c->buscaChamado();
    $tipo = $chamado['status'];
    $c->responder();
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
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/lista.css" rel="stylesheet">
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
        <div class="container1" >
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
                            <li><a href="responder.php?logouf=">Sair</a></li>

                    </ul>
                    <p class="bemvindo" align="right">Bem vindo, <?php echo $_SESSION['login']; ?> !</p>
              </div>
           </ul>
            </div>
           
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Put your page content here! -->
<div class="container">
<div class="col-md-8">
    <div class="form-area" id="responder">  
        <form method="post" role="form">
             <br style="clear:both">
                    <h3 style="margin-bottom: 25px; margin-top: 0px; text-align: center; padding-top: 0px;">Responder</h3>
                    <div class="col-md-6">
                        <input type="text" readonly="true" value="<?php echo $chamado['usuario'];?>" class="form-control" id="name" name="nome" >
                    </div>
                    <div class="col-md-6">
                        <input type="email" readonly="true" value="<?php echo $chamado['email'];?>" class="form-control" id="email" name="email">
                    </div>
                    <div class="col-md-6">
                        <input type="text" readonly="true" value="<?php echo $chamado['telefone'];?>" class="form-control" id="telefone" name="telefone" >
                    </div>
                    <div class="col-md-6">
                        <input type="text" readonly="true" value="<?php echo $chamado['tipo'];?>" class="form-control" id="tipo" name="tipo" >
                    </div>
                    <div class="col-md-6">
                        <textarea class="form-control" readonly="true" type="text" placeholder="<?php echo $chamado['mensagem'];?>"  id="message" maxlength="140" rows="7"></textarea>                                   
                    </div>
                    <?php if ($_SESSION['perfil'] == 'admin'):?>
                    <div class="col-md-6">
                        <textarea class="form-control" type="text"  name="resposta" id="resposta" maxlength="140" rows="7" required="required"><?php echo $chamado['resposta'];?></textarea>                     
                    </div>
                     <?php endif; ?>
                    <?php if ($_SESSION['perfil'] == 'usuario'):?>
                    <div class="col-md-6">
                        <textarea class="form-control" type="text"  name="resposta" readonly="true" id="resposta" maxlength="140" rows="7"><?php echo $chamado['resposta'];?></textarea>                     
                    </div>
                     <?php endif; ?>
                     <?php if ($_SESSION['perfil'] == 'admin'):?>
                    <div class="col-md-6" style="margin-bottom: 10px; margin-top: 10px;">
                        <select type="text" name="option" class="form-control">
                            <?php if ($tipo == 'aberto'): ?>   
                            <option value="aberto">Aberto</option>
                             <option value="fechado">Fechado</option> 
                            <?php endif ;?>
                            <?php if ($tipo == 'fechado'): ?>   
                            <option value="fechado">Fechado</option>
                             <option value="aberto">Aberto</option> 
                            <?php endif ;?> 
                        </select>
                    </div>
                    <?php endif ;?>
                     <?php if ($_SESSION['perfil'] == 'usuario'):?>
                    <div class="col-md-6" style="margin-bottom: 10px; margin-top: 10px;">
                        <input type="text" readonly="true" value="<?php echo $chamado['status'];?>" class="form-control" id="tipo" name="tipo" >
                    </div>
                    <?php endif ;?>
             <?php if ($_SESSION['perfil'] == 'admin'):?>
            <?php if ($tipo == 'aberto'): ?>        
            <div>
            <button type="submit" id="salvar" name="salvarAberto" class="btn btn-primary btn-large">Salvar</button>
            <input type="hidden" name="cod" value="<?php echo $chamado['cod']; ?>"/>
            </div>
            <?php endif; ?>        
            <?php if ($tipo == 'fechado'): ?>
            <div>
            <button type="submit" id="salvar" name="salvarFechado" class="btn btn-primary btn-large">Salvar</button>
            <input type="hidden" name="cod" value="<?php echo $chamado['cod']; ?>"/>
            </div>        
            <?php endif; ?>        
            <div class="voltar">
            <input type='button' onclick='javascript:history.back();self.location.reload();' class="btn btn-primary btn-large" value='Voltar' name='Voltar' >  
            </div>  
            <?php endif; ?>
            <div class="voltar">
                <input type='button' onclick='javascript:history.back();self.location.reload();' class="btn btn-primary btn-large" value='Voltar' name='Voltar' >  
            </div>        
        </form>
    </div>
</div>
</div>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/form.js"></script>
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
