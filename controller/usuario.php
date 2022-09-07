<?php

function verificaLoginUsuario($usuario, $senha) {
    include('..'.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'conexaoBd.php');

    $sql = $pdo->prepare("SELECT id_usuarios FROM usuarios where nome ='".$usuario."' and senha = '".$senha."'");
    $sql->execute();
    return $sql->fetchAll();
}

function logaUsuario() {
    include_once('..'.DIRECTORY_SEPARATOR.'view'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'formlogin.php');

    try {
        if( !(isset($_SESSION['login'])) ) {

            if(isset($_POST['envio'])) {
                $login = $_POST['login'];
                $senha = $_POST['senha'];
        
                $usuario = verificaLoginUsuario($login, $senha);
    
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
    include('..'.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'conexaoBd.php');
    include_once('..'.DIRECTORY_SEPARATOR.'view'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'formcadastro.php');

    try {
        if (isset($_POST['nome'])) {
            $nome = $_POST['nome'];
            $senha = $_POST['senha'];

            $usuario = verificaLoginUsuario($nome, $senha);

            if(count($usuario) <= 0) {
                $sql = $pdo->prepare("insert into usuarios values(null,?,?,?)");
                $sql->execute(array($_POST['nome'], $_POST['email'], $_POST['senha']));
                echo 'Cadastro realizado.';
            } else {
                echo 'Esse usuário já existe.';
            }
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