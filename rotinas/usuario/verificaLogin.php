<?php
    function verificaLogin($usuario, $senha) {
        include_once('././config/conexaoBd.php');
        $sql = $pdo->prepare("SELECT id_usuarios FROM usuarios where nome ='".$usuario."' and senha = '".$senha."'");
        $sql->execute();
        return $sql->fetchAll();
    }
?>