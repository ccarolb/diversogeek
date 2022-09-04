<?php

echo '<h2>Olá '.$_SESSION['login'].'</h2>';
echo '<a href="?logout">Logout</a>';

if(isset($_GET['logout'])) {
    unset($_SESSION['login']);
    session_destroy();
    header('Location: login.php');
}
?>