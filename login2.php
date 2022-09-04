<?php

    include_once('formlogin.php');
    include_once('verificaLogin.php');

    if( !(isset($_SESSION['login'])) ) {

        if(isset($_POST['envio'])) {
            $login = $_POST['login'];
            $senha = $_POST['senha'];
    
            $usuario = verificaLogin($login, $senha);

            if(count($usuario) > 0) {
                $_SESSION['login'] = $login;
                header('Location: home2.php');
            } else {
                echo 'Dados inválidos';
                session_destroy();
            }
            include_once('login.php');
        }

    } else {
        include_once('home2.php');
    }

?>