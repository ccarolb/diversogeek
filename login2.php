<?php

    include('formlogin.php');

    if( !(isset($_SESSION['login'])) ) {

        if(isset($_POST['envio'])) {
            $login = 'aaa';
            $senha = '123';

            $loginForm = $_POST['login'];
            $senhaForm = $_POST['senha'];

            if($login == $loginForm && $senha == $senhaForm) {
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