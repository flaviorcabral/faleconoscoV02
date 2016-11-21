<?php

    require_once 'Conexao.class.php';
    
class Chamado {
   
    private $con;

    function __construct() {
        $conexao = new Conexao();
        $this->con = $conexao->getConexao();
    }
    
    function addChamado($usuario, $email, $telefone, $tipo, $mensagem) {
        $data = date('d-m-y');
        if($this->con->exec("INSERT INTO chamado (data, usuario, email, telefone, tipo, status, mensagem, resposta ) VALUES ('{$data}' ,'{$usuario}', '{$email}', '{$telefone}', '{$tipo}','aberto', '{$mensagem}', '')")){
         
        return TRUE;
        }
        return FALSE;
    }
    
    function editeChamado($cod, $status, $resposta, $func){
        $data = date('d-m-y');
        if($this->con->exec("UPDATE chamado SET status = '{$status}', resposta = '{$resposta}', atendeu = '{$func}', dtfecha = '{$data}' WHERE cod = '{$cod}'")){            
            return TRUE;
        }
        return FALSE;
    }

    function listaChamados(){
        $chamados = $this->con->query("SELECT * FROM chamado");

        if ($chamados->rowCount() > 0) {
            
            return $chamados->fetchALL(PDO::FETCH_ASSOC);
        }
   
    }

    function listaAbertos(){
        $abertos = $this->con->query("SELECT * FROM chamado WHERE status = 'aberto'");
        
        if ($abertos->rowCount() > 0) {
            
            return $abertos->fetchALL(PDO::FETCH_ASSOC);
        }
     
    }

    function listaFechados(){
        $fechados = $this->con->query("SELECT * FROM chamado WHERE status = 'fechado'");
        
        if ($fechados->rowCount() > 0) {
            
            return $fechados->fetchALL(PDO::FETCH_ASSOC);
        }
       
    }
    
    function buscaChamado($cod){
        $busca = $this->con->query("SELECT * FROM chamado WHERE cod = '{$cod}'");

        if ($busca->rowCount() > 0) {

            return $busca->fetch(PDO::FETCH_ASSOC);
        }
    }
    
    function especifosChamados($palavra){
        $busca = $this->con->query("SELECT * FROM chamado WHERE cod LIKE '%$palavra%'");
        
        if($busca->rowCount() > 0){
            return $busca->fetchALL(PDO::FETCH_ASSOC);
        }
    }
}

?>

