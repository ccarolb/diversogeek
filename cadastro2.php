<?php
    include_once('formcadastro.php');

    include_once('conexaoBd.php');

    if(isset($_POST['nome'])) {
        // prepara 
        $sql = $pdo->prepare("insert into usuarios values(null,?,?,?)");
        $sql->execute(array($_POST['nome'], $_POST['email'], $_POST['senha']));
        echo 'inserido com sucesso';
    }
?>