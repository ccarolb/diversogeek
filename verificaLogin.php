<?php
    

    function verificaLogin($usuario, $senha) {
        include('conexaoBd.php');
        $sql = $pdo->prepare("SELECT id_usuarios FROM usuarios where nome =".$usuario." and senha = ".$senha);
        $sql->execute();

    }

?>