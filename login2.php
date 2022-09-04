<?php

    include('formlogin.php');
    include ('verificaLogin.php');

    if( !(isset($_SESSION['login'])) ) {

        $login = $_POST['login'];
        $senha = $_POST['senha'];

        $usuario = verificaLogin($login, $senha);

        if(isset($_POST['envio'])) {

            if(count($usuario) > 0) {
                $_SESSION['login'] = $login;
                header('Location: home2.php');
            } else {
                echo 'Dados inválidos';
            }
            include('login.php');
        }

    } else {
        include('home2.php');
    }

?>