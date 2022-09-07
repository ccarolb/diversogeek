<?php

    include_once('..'.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'conexaoBd.php');

function verificaLoginUsuario($usuario, $senha) {
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
                    header('Location: ././view/home.php');
                } else {
                    echo 'Dados inválidos';
                    session_destroy();
                }
                include_once('login.php');
            }
    
        } else {
            include_once('././view/home.php');
        }

    } catch(Exception $e) {
        throw new Exception($e->getMessage());
    }
}

function cadastraUsuario() {
    include_once('..'.DIRECTORY_SEPARATOR.'view'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'formcadastro.php');

    try {
        if (isset($_POST['nome'])) {
            $sql = $pdo->prepare("insert into usuarios values(null,?,?,?)");
            $sql->execute(array($_POST['nome'], $_POST['email'], $_POST['senha']));
            echo 'inserido com sucesso';
        }
    } catch(Exception $e) {
        throw new Exception($e->getMessage());
    }
    
}

function logoutUsuario() {
    if(isset($_GET['logout'])) {
        unset($_SESSION['login']);
        session_destroy();
        header('Location: ././login.php');
    }
}

?>