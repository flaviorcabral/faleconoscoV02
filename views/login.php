<?php
    
include_once '../../faleconosco/models/Conexao.class.php';
include_once '../../faleconosco/models/Usuario.class.php';
include_once '../../faleconosco/controller/Controller.class.php';
//require_once '../faleconosco/config.php';

$c = new Controller();
$c->login();

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <title>Fale Conosco</title>
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/prefixfree.min.js"></script>
    <script src="../js/index.js"></script>  
  </head>

  <body>
        <div class="login">
            <img src="../img/fale_conosco.png" alt="Smiley face" width="150" height="60" style="position: absolute; top: -80px; left: 80px;">
    		<form method="post">
    			<input type="text" name="usuario" placeholder="Usuário" required="required" />
        		<input type="password" name="senha" placeholder="Senha" required="required" />
        		<button type="submit" name="login" class="btn btn-primary btn-block btn-large">Acessar</button>
    		</form>
	</div>       
</body>
</html>
