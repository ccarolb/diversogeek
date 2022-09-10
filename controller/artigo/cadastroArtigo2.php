<?php
    function cadastrarArtigo() {
        include_once('.'.DIRECTORY_SEPARATOR.'.'.DIRECTORY_SEPARATOR.'view'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'formCadastroArtigo.php');
        include_once('.'.DIRECTORY_SEPARATOR.'.'.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'conexaoBd.php');

        try {
            if(isset($_POST['titulo'])) {
                // prepara 
                $sql = $pdo->prepare("insert into artigos values(null,?,?,?)");
                $sql->execute(array($_POST['nome'], $_POST['email'], $_POST['senha']));
                echo 'inserido com sucesso';
            }
        } catch(Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

?>