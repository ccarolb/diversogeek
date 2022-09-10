<?php

function logaUsuario() {
    include_once('..'.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'Usuario.php');
    include_once('..'.DIRECTORY_SEPARATOR.'view'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'formlogin.php');

    try {
        $usuario = new Usuario();

        if( !(isset($_SESSION['login'])) ) {

            if(isset($_POST['envio'])) {
                $login = $_POST['login'];
                $senha = $_POST['senha'];
        
                $usuario = $usuario->verificaLoginUsuario($login, $senha);
    
                if(count($usuario) > 0) {
                    // $_SESSION['login'] = $login;
                    $usuario->setIdUsuario($_SESSION['login']['id_usuario']);
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
            $usuario = new Usuario();

            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            $usuario->setNome($nome);
            $usuario->setEmail($email);
            $usuario->setSenha($senha);
            $usuario->setIdUsuario($usuario->getIdUsuario($nome));
            
            $usuario->cadastrarUsuario();

        }
    } catch(Exception $e) {
        echo 'Já existe um usuário cadastrado com este email.';
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