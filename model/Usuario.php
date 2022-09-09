<?php
class Usuario {
    private $idUsuario;
    private $nome;
    private $email;
    private $senha;

   public function verificaLoginUsuario($usuario, $senha) {
        include('..'.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'conexaoBd.php');
    
        $sql = $pdo->prepare("SELECT id_usuarios FROM usuarios where nome ='".$usuario."' and senha = '".$senha."'");
        $sql->execute();
        return $sql->fetchAll();
    }

    public function cadastrarUsuario($nome, $email, $senha) {
        include('..'.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'conexaoBd.php');

        $usuario = $this->verificaLoginUsuario($nome, $senha);

        if(count($usuario) <= 0) {
            $sql = $pdo->prepare('insert into usuarios(nome, email, senha) values(?, ?, MD5(?))');
            $sql->execute(array($nome, $email, $senha));
            echo 'Usuário cadastrado com sucesso.';
        } else {
            echo 'Esse usuário já existe.';
        }
    }

    public function fazLoginUsuario($usuario, $senha) {

    }
}

?>