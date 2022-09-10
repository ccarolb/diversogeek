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
    public function getIdUsuario($usuario) {
        include('..'.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'conexaoBd.php');
        try {
            
            $sql = $pdo->prepare("select id_usuario from tb_usuarios where nm_usuario = '".$usuario."'");
            $sql->execute();
            return $sql->fetchAll();


        } catch(Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

   public function verificaLoginUsuario($usuario, $senha) {
        include('..'.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'conexaoBd.php');

        try {

            $sql = $pdo->prepare("SELECT id_usuario FROM tb_usuarios where nm_usuario ='".$usuario."' and ds_senha = MD5('".$senha."')");
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

                $sql = $pdo->prepare("insert into tb_usuarios(nm_usuario, ds_email, ds_senha) values(:nome, :email, MD5(:senha))");
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