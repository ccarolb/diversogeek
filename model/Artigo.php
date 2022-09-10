<?php

class Artigo {
    private $idArtigo;
    private $imagem;
    private $usuario;
    private $titulo;
    private $resumo;

    public function cadastrarArtigo() {
        include('..'.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'conexaoBd.php');
        include_once ('..'.DIRECTORY_SEPARATOR.'controller'.DIRECTORY_SEPARATOR.'usuario.php');

        try {
            $artigo = $this->verificaArtigo($this->titulo);
            $idUsuario = getUsuarioById();

            if(count($artigo) <= 0) {

                $sql = $pdo->prepare("insert into tb_artigos(nm_usuario, ds_email, ds_senha) values(:nome, :email, MD5(:senha))");
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