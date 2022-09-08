<?php

function logaUsuario() {
    include_once('..'.DIRECTORY_SEPARATOR.'view'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'formlogin.php');

    try {
        if( !(isset($_SESSION['login'])) ) {

            if(isset($_POST['envio'])) {
                $login = $_POST['login'];
                $senha = $_POST['senha'];
        
                $usuario = UsuarioverificaLoginUsuario($login, $senha);
    
                if(count($usuario) > 0) {
                    $_SESSION['login'] = $login;
                    header('Location: ..'.DIRECTORY_SEPARATOR.'view'.DIRECTORY_SEPARATOR.'home.php');
                } else {
                    echo 'Dados inválidos';
                    session_destroy();
                }
                include_once('..'.DIRECTORY_SEPARATOR.'view'.DIRECTORY_SEPARATOR.'login.php');
            }
    
        } else {
            include_once('..'.DIRECTORY_SEPARATOR.'view'.DIRECTORY_SEPARATOR.'home.php');
        }

    } catch(Exception $e) {
        throw new Exception($e->getMessage());
    }
}

function cadastraUsuario() {
    include_once('..'.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'Usuario.php');
    include_once('..'.DIRECTORY_SEPARATOR.'view'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'formcadastro.php');

    try {
        if (isset($_POST['nome'])) {
            $nome = $_POST['nome'];
            $senha = $_POST['senha'];
            
            Usuario.cadastraUsuario($_POST['nome'], $_POST['email'], $_POST['senha']);
        }
    } catch(Exception $e) {
        throw new Exception($e->getMessage());
    }
    
}

function logoutUsuario() {

    try {
        if(isset($_GET['logout'])) {
            unset($_SESSION['login']);
            session_destroy();
            header('Location: ..'.DIRECTORY_SEPARATOR.'view'.DIRECTORY_SEPARATOR.'login.php');
        }
    } catch(Exception $e) {
        throw new Exception($e->getMessage());
    }

}

?>