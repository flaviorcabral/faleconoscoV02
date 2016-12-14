<?php

class Controller {


    function index() {
        
            if (isset($_REQUEST['enviar'])) {

                $usuario = $_REQUEST['nome'];
                $email = $_REQUEST['email'];
                $telefone = $_REQUEST['telefone'];
                $opcao = $_REQUEST['option'];
                $mensagem = $_REQUEST['mensagem'];
                $chm = new Chamado();

                $result = $chm->addChamado($usuario, $email, $telefone, $opcao, $mensagem);
                $this->emailRecebe($usuario, $email, $opcao);
                if ($result) {
                    header('Location: index.php');
                    exit;
                }
            }
        
    }

    function login() {
      
            if (isset($_REQUEST['login'])) {

                $login = $_REQUEST['usuario'];
                $senha = $_REQUEST['senha'];
                $usuario = new Usuario();
                $valida = $usuario->validaAcesso($login, $senha);

                if ($valida) {
                    $perfil = $valida['perfil'];
                    
                    session_start();
                    $_SESSION['login'] = $login;
                    $_SESSION['perfil'] = $perfil;
                    
                    $data = date('d-m-y');
                    $hora = date('H:i:s');
                    $host = $_SERVER['REMOTE_ADDR'];
                    
                    $arquivo = fopen('../logs/acesso.txt', 'a');
                    
                    if ($arquivo) {
                        $dados =  $data . " - " . $hora . " - " . $host . " - "  . $login . "\r\n";
                        fwrite($arquivo, $dados);
                        fclose($arquivo);
                    }
                    header('Location: ../views/todos.php');
                    exit;
                } else {
                    header('Location: ../views/login.php');
                    exit;
                }
            }
        
    }
    
    function verificaLogin(){
        
        if (!array_key_exists('login', $_SESSION)) {
            return FALSE;
        }
        return TRUE;
    }
    
    function logouf(){
        if (isset($_REQUEST['logouf'])) {
            
        
        session_start();
        
        if (isset($_SESSION['login'])) {
            session_destroy();
            
            header('Location: ../views/login.php');
            exit;
        
            }
        }
    }

    function cadastro() {
        
        if (!$this->verificaLogin()) {
            header('Location: ../views/login.php');
            exit;
        }
     
        if (isset($_REQUEST['cadastrar'])) {

            $nome = $_REQUEST['nome'];
            $sobrenome = $_REQUEST['sobrenome'];
            $email = $_REQUEST['email'];
            $opcao = $_REQUEST['option'];
            $login = $_REQUEST['login'];
            $senha = $_REQUEST['senha'];

            $cad = new Usuario();
            $this->cadastro = $cad->addUsuario($nome, $sobrenome, $email, $opcao, $login, $senha);
        }
      }  
     
    function listaUsuarios(){
        if (isset($_REQUEST['usuarios'])) {
          $usu = new Usuario();
          $lista = $usu->listaUsuarios();
        
          return $lista;
        }  
        
        if (isset($_REQUEST['busca'])) {
          $busca = $_REQUEST['palavra'];
          $usu = new Usuario();
          
          $result = $usu->usuarioEspec($busca);
          
          return $result;
        }
          
        }
            
    function buscaUsuario(){
        if (isset($_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $usu = new Usuario();
            $usuario = $usu->buscaUsuario($id);
            
            return $usuario;
        }
    }
    
    function editar(){
        
        if (!$this->verificaLogin()) {
            header('Location: ../views/login.php');
            exit;
        }
        
        if (isset($_REQUEST['editar'])) {
            $id = $_REQUEST['id'];
            $nome = $_REQUEST['nome'];
            $sobrenome = $_REQUEST['sobrenome'];
            $email = $_REQUEST['email'];
            $perfil = $_REQUEST['option'];
            $login = $_REQUEST['login'];
            $senha = $_REQUEST['senha'];
            
            $usu = new Usuario();
            if ($usu->updateUsuario($id, $nome, $sobrenome, $email, $perfil, $login, $senha)) {
                header('Location: ../views/lista_usuarios.php');
                exit;
            }
        }
        
        if (isset($_REQUEST['excluir'])) {
            $id = $_REQUEST['id'];
            $usu = new Usuario();
                if($usu->deleteUsuario($id)){
                    header('Location: ../views/lista_usuarios.php');
                    exit;
                }
            }
    }

    function chamadosAbertos(){ 
        
        if (isset($_REQUEST['abertos'])) {
            $chm = new Chamado();
            $abertos = $chm->listaAbertos();
        
            return $abertos;
        }
        
        if (isset($_REQUEST['busca'])) {
          $busca = $_REQUEST['palavra'];
          $chm = new Chamado();
          
          $result = $chm->especifosChamados($busca);
          
          return $result;
        }
    } 

    function chamadosFechados(){
        
        if (isset($_REQUEST['fechados'])) {
         $chm = new Chamado();
         $fechados = $chm->listaFechados();
        
        return $fechados;
       }
       
       if (isset($_REQUEST['busca'])) {
          $busca = $_REQUEST['palavra'];
          $chm = new Chamado();
          
          $result = $chm->especifosChamados($busca);
          
          return $result;
        }
       
    }
    
    function buscaChamado() {
        if (isset($_REQUEST['cod'])) {
            $cod = $_REQUEST['cod'];
            $chm = new Chamado();
            $chamado = $chm->buscaChamado($cod);

            return $chamado;
        }
    }
    
    function chamados(){
        
        if (isset($_REQUEST['todos'])) {
            $chm = new Chamado();
            $result = $chm->listaChamados();
            
            return $result;
        }
   
        if (isset($_REQUEST['busca'])) {
          $busca = $_REQUEST['palavra'];
          $chm = new Chamado();
          
          $result = $chm->especifosChamados($busca);
          
          return $result;
        }
     }

    function responder() {
        
        if (!$this->verificaLogin()) {
            header('Location: ../views/login.php');
            exit;
        }
        
        if (isset($_REQUEST['salvarAberto'])) {
            
            session_start();
            
            $cod = $_REQUEST['cod'];
            $email = $_REQUEST['email'];
            $status = $_REQUEST['option'];
            $resposta = $_REQUEST['resposta'];
            $func = $_SESSION['login'];
            
            $chm = new Chamado();
            $resutl = $chm->editeChamado($cod, $status, $resposta, $func);

            if ($resutl) {
                $this->emailResponde($email, $resposta);
                header('Location: ../views/abertos.php');
                exit;
            }
        }
        
        if (isset($_REQUEST['salvarFechado'])) {
            
            session_start();
            
            $cod = $_REQUEST['cod'];
            $email = $_REQUEST['email'];
            $status = $_REQUEST['option'];
            $resposta = $_REQUEST['resposta'];
            $func = $_SESSION['login'];
            
            $chm = new Chamado();
            $resutl = $chm->editeChamado($cod, $status, $resposta, $func);

            if ($resutl) {
                $this->emailResponde($email, $resposta);
                header('Location: ../views/fechados.php');
                exit;
            }
        }
    }
    
    function emailRecebe($nome, $email, $opcao){
        $to = $email;
        $subject = $opcao;
        $message = "Senhor(a) " . $nome . ", ". "\r\n".
            "sua mensagem foi enviada com sucesso, em no máximo 48 horas estaremos retornando o contato. \r\n".
            "Agradecemos o seu contato.";
        $headers = 'From: flaviorcabral@gmail.com'.'\r\n'.'MIME-Version: 1.0'.'\r\n' . 'Content-type: text/html; charset=utf-8';
        mail($to, $subject, $message, $headers);
    }
    
    function emailResponde($email, $resposta){
        $to = $email;
        $subject = "Resposta chamado aberto";
        $message = "Segue resposta referente chamado aberto: \r\n".
            $resposta . "\r\n" .    
            "Agradecemos o seu contato.";
        $headers = 'From: flaviorcabral@gmail.com'.'\r\n'.'MIME-Version: 1.0'.'\r\n' . 'Content-type: text/html; charset=utf-8';
        mail($to, $subject, $message, $headers);
    }

}
