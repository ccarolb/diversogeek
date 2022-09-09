<?php
    include_once('.'.DIRECTORY_SEPARATOR.'.'.DIRECTORY_SEPARATOR.'view'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'formCadastroArtigo.php');

    include_once('.'.DIRECTORY_SEPARATOR.'.'.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'conexaoBd.php');

    if(isset($_POST['nome'])) {
        // prepara 
        $sql = $pdo->prepare("insert into usuarios values(null,?,?,?)");
        $sql->execute(array($_POST['nome'], $_POST['email'], $_POST['senha']));
        echo 'inserido com sucesso';
    }
?>