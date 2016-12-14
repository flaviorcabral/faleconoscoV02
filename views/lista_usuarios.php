<?php

include_once '../config.php';
  
  session_start();
  $c =  new Controller();
  $usuarios = $c->listaUsuarios();
  $c->logouf();
  
  if (!$c->verificaLogin()) {
        header('Location: ../views/login.php');
        exit;
    }
  
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
    <link href="../css/lista.css" rel="stylesheet">
    <link href="../css/estilo.css" rel="stylesheet">
    <!-- Fontes font-awesome-->
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">


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
                        <li><a href="todos.php?todos=">Todos</a></li>
                        <li><a href="abertos.php?abertos=">Abertos</a></li>
                        <li><a href="fechados.php?fechados=">Fechados</a></li>
                         <?php if ($_SESSION['perfil'] == 'admin'):?>
                            <li><a href="lista_usuarios.php?usuarios=">Usuarios</a></li>
                        <?php endif; ?>
                            <li><a href="lista_usuarios.php?logouf=">Sair</a></li>

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

 <div id="demo">
    <div class="pesquisa">
       <form method="get">
        <input type="text" name="palavra" placeholder="Insira o nome" />
        <input type="submit" Value="buscar" />      
        <input type="hidden" name="busca" />
    </form>
    <form method="get" class="todos">
        <input type="submit" value="Todos" />        
        <input type="hidden" name="usuarios" />
    </form>
    </div>   
  <div class="titulo">
  <h2 align="center" >Lista de usuarios</h2>
  </div>
  <!-- Responsive table starts here -->
  <!-- For correct display on small screens you must add 'data-title' to each 'td' in your table -->
  <div class="table-responsive-vertical shadow-z-1">
  <!-- Table starts here -->
  <table id="table" class="table table-hover table-mc-light-blue">
      <thead>
        <tr>
          <th>Nome</th>
          <th>Sobrenome</th>
          <th>Email</th>
          <th>Perfil</th>
          <th>Login</th>
          <th>Senha</th>
          <th>Opções</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($usuarios): ?>   
        <?php foreach ($usuarios as $lista): ?>   
        <tr>
          <td data-title="ID"><?php echo $lista['nome']; ?></td>
          <td data-title="Name"><?php echo $lista['sobrenome']; ?></td>
          <td data-title="Link"><?php echo $lista['email']; ?></td>
          <td data-title="Status"><?php echo $lista['perfil']; ?></td>
          <td data-title="Status"><?php echo $lista['login']; ?></td>
          <td data-title="Status"><?php echo $lista['senha']; ?></td>
          <td data-title="icone" class="icone">
            <li>
              <a href="../views/editar.php?id=<?php echo $lista['id'];?>">
                <i class="fa fa-pencil-square-o" style="font-size:20px" aria-hidden="true"></i>
              </a>
            </li>
            <li> 
                <a href="../views/excluir.php?id=<?php echo $lista['id'];?>">
                <i class="fa fa-trash" style="font-size:20px" aria-hidden="true"></i>
              </a>
            </li>
          </td>
        </tr>
        <?php endforeach; ?>
       <?php endif; ?> 
      </tbody>
    </table>
         <a href="../views/cadastro.php" id="save" class="btn btn-info" role="button">Add usuário</a>
  </div>

</div>
     <script src="../js/lista.js"></script>
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
