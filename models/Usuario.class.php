<?php

   require_once 'Conexao.class.php';

class Usuario {

    private $con;

    function __construct() {
        $conexao = new Conexao();
        $this->con = $conexao->getConexao();
    }

    function addUsuario($nome, $sobrenome, $email, $perfil, $login, $senha) {
        if($this->con->exec("INSERT INTO usuarios (nome, sobrenome, email, perfil, login, senha ) VALUES ('{$nome}', '{$sobrenome}', '{$email}', '{$perfil}', '{$login}', '{$senha}')")){
         return TRUE;
         }
        return FALSE;
    }

    function buscaUsuario($id) {
        $busca = $this->con->query("SELECT * FROM usuarios WHERE id = '{$id}'");

        if ($busca->rowCount() > 0) {

            return $busca->fetch(PDO::FETCH_ASSOC);
        }

    }
    
    function usuarioEspec($palavra){
        $busca = $this->con->query("SELECT * FROM usuarios WHERE nome LIKE '%$palavra%'");
        
        if ($busca->rowCount() > 0) {
            
            return $busca->fetchALL(PDO::FETCH_ASSOC);
        }
        
    }
    function deleteUsuario($id) {
        if ($this->con->exec("DELETE FROM usuarios WHERE id = '{$id}'")) {

            return TRUE;
        }

        return FALSE;
    }

    function listaUsuarios() {
        $lista = $this->con->query("SELECT * FROM usuarios");

        if ($lista->rowCount() > 0) {

            return $lista->fetchALL(PDO::FETCH_ASSOC);
        }
        return FALSE;
    }

    function updateUsuario($id, $nome, $sobrenome, $email, $perfil, $login,  $senha) {

        if ($this->con->exec("UPDATE usuarios SET nome = '{$nome}' , sobrenome = '{$sobrenome}', email = '{$email}', perfil = '{$perfil}', login = '{$login}', senha = '{$senha}' WHERE id = '{$id}'")) {

            return TRUE;
        }

        return FALSE;
    }

    function validaAcesso($login, $senha) {

        $result = $this->con->query("SELECT * FROM usuarios WHERE login = '{$login}' AND senha = '{$senha}'");

        if ($result->rowCount() > 0) {

            return $result->fetch(PDO::FETCH_ASSOC);
        }
        return FALSE;
    }

}

?>