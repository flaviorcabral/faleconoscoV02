<?php
	
	include_once 'model/Conexao.class.php';

	$con = new Conexao();

    $result = $con->getConexao();

    var_dump($result);


?>