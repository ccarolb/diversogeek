<?php
class Usuario {
    private $idUsuario;
    private $nome;
    private $email;
    private $senha;

    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

   public function verificaLoginUsuario($usuario, $senha) {
        include('..'.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'conexaoBd.php');

        try {

            $sql = $pdo->prepare("SELECT id_usuarios FROM usuarios where nome ='".$usuario."' and senha = MD5('".$senha."')");
            $sql->execute();
            return $sql->fetchAll();

        } catch(Exception $e) {
            throw new Exception($e->getMessage());
        }
        
    }

    public function cadastrarUsuario() {
        include('..'.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'conexaoBd.php');

        try {
            $usuario = $this->verificaLoginUsuario($this->nome, $this->senha);

            if(count($usuario) <= 0) {

                $sql = $pdo->prepare("insert into usuarios(nome, email, senha) values(:nome, :email, MD5(:senha))");
                $sql->bindValue(':nome', $this->nome, PDO::PARAM_STR);
                $sql->bindValue(':email', $this->email, PDO::PARAM_STR);
                $sql->bindValue(':senha', $this->senha, PDO::PARAM_STR);
                $sql->execute();
                echo 'Usuário cadastrado com sucesso.';
            } else {
                echo 'Esse usuário já existe.';
            }
        } catch(Exception $e) {
            throw new Exception($e->getMessage());
        }
       
    }
}

?>