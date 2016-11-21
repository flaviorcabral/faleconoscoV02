<?php
    include_once '../../faleconosco/models/Conexao.class.php';
    include_once '../../faleconosco/models/Chamado.class.php';
    include_once '../../faleconosco/controller/Controller.class.php';
   
    session_start();
    $c = new Controller();
    $lista = $c->chamados();
    $c->logouf();
    
    if (!$c->verificaLogin()) {
        header('Location: ../views/login.php');
        exit;
    }
?>
<!DOCTYPE html>
<html class="full" lang="en">
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
                        <li><a href="todos.php?logouf=">Sair</a></li>

                    </ul>
                    <p class="bemvindo" align="right">Bem vindo, <?php echo $_SESSION['login']; ?> !</p>
              </div>
           </ul>
        </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

<div id="demo"> 
    <div class="pesquisa">
    <form method="get">
        <input type="text" name="palavra" placeholder="Insira o codigo" />
        <input type="submit" Value="buscar" />      
        <input type="hidden" name="busca" />
    </form>
    <form method="get" class="todos">
        <input type="submit" value="Todos" />        
        <input type="hidden" name="todos" />
    </form>    
    </div>    
    <div class="titulo">
      <h2 align="center" >Todos os chamados</h>
    </div>
  
  <!-- Responsive table starts here -->
  <!-- For correct display on small screens you must add 'data-title' to each 'td' in your table -->
  <div id="row" class="table-responsive-vertical shadow-z-1">
  <!-- Table starts here -->
  <table id="table" class="table table-hover table-mc-light-blue">
      <thead>
        <tr>
          <th>Prot</th>		
          <th>Data</th>
          <th>Usuário</th>
          <th>Email</th>
          <th>Telefone</th>
          <th>Tipo</th>
          <th>Status</th>
          <th>Opções</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($lista): ?> 
        <?php foreach ($lista as $chamados): ?>
        <tr>
            <td data-title="ID"><?php echo $chamados['cod']; ?></td> 	
          <td data-title="ID"><?php echo $chamados['data']; ?></td>
          <td data-title="Name"><?php echo $chamados['usuario']; ?></td>
          <td data-title="Link"><?php echo $chamados['email']; ?></td>
          <td data-title="Status"><?php echo $chamados['telefone']; ?></td>
          <td data-title="Status"><?php echo $chamados['tipo']; ?></td>
          <td data-title="Status"><?php echo $chamados['status']; ?></td>
          <td data-title="Status">
            <li>
                <a href="../views/responder.php?cod=<?php echo $chamados['cod']; ?>">  
                <i class="fa fa-pencil-square-o" style="font-size:20px" aria-hidden="true"></i>
              </a>
            </li>
            <li> 
                <a href="../geraPDF.php?cod=<?php echo $chamados['cod']; ?>">
                <i class="fa fa-file-pdf-o" style="font-size:20px" aria-hidden="true"></i>
              </a>
            </li>
          </td>
        </tr>
        <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>
   <script src="../jquery/busca.js"></script>
   <script src="../jquery/dropdown.js"></script>
    <script src="../js/lista.js"></script>
    <script src="../js/dropdown.js"></script>
    <script src="../js/busca.js"></script>
<div  class="rodape">
    <footer>
        <p>Projeto Pós Desenvolvimento WEB</p>
        <p>Grupo: Flávio Rodrigo, Eric Neder e Luiz Euzébio.</p>
    </footer>    
</div>    
</body>
</html>
