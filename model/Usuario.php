<?php

include('..'.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'conexaoBd.php');

class Usuario {
    private $idUsuario;
    private $nome;
    private $email;
    private $senha;

    function verificaLoginUsuario($usuario, $senha) {
        include('..'.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'conexaoBd.php');
    
        $sql = $pdo->prepare("SELECT id_usuarios FROM usuarios where nome ='".$usuario."' and senha = '".$senha."'");
        $sql->execute();
        return $sql->fetchAll();
    }

    function cadastrarUsuario($nome, $email, $senha) {

        $usuario = verificaLoginUsuario($nome, $senha);

        if(count($usuario) <= 0) {
            $sql = $pdo->prepare("insert into usuarios values(null,?,?,?)");
            $sql->bindValue(':NmUsuario' , $this->nome, PDO::PARAM_STR);
            $sql->execute(array($nome, $email, $senha));
        
        } else {
            echo 'Esse usuário já existe.';
        }
    }

}

?>