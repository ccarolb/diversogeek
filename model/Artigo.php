<?php

class Artigo {
    private $idArtigo;
    private $imagem;
    private $usuario;
    private $titulo;
    private $resumo;

    public function verificaArtigo($titulo) {
        include('..'.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'conexaoBd.php');

        try {

            $sql = $pdo->prepare("SELECT id_artigo FROM tb_artigos where nm_artigo ='".$titulo."'");
            $sql->execute();
            return $sql->fetchAll();

        } catch(Exception $e) {
            throw new Exception($e->getMessage());
        }
        
    }
    public function cadastrarArtigo() {
        include('..'.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'conexaoBd.php');
        include_once ('..'.DIRECTORY_SEPARATOR.'controller'.DIRECTORY_SEPARATOR.'usuario.php');

        try {
            $artigo = $this->verificaArtigo($this->titulo);
            $this->usuario = getUsuarioById();

            if(count($artigo) <= 0) {

                $sql = $pdo->prepare("insert into tb_artigos(id_usuario, cd_imagem, nm_artigo, ds_artigo) values(:usuario, :imagem, :titulo, :resumo)");
                $sql->bindValue(':usuario', $this->usuario, PDO::PARAM_INT);
                $sql->bindValue(':imagem', $this->imagem, PDO::PARAM_INT);
                $sql->bindValue(':titulo', $this->titulo, PDO::PARAM_STR);
                $sql->bindValue(':resumo', $this->resumo, PDO::PARAM_STR);
                $sql->execute();
                echo 'Artigo postado com sucesso.';
            } else {
                echo 'Não foi possível postar o artigo.';
            }
        } catch(Exception $e) {
            throw new Exception($e->getMessage());
        }
       
    }


}

?>