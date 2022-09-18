<?php

class Artigo {
    private $idArtigo;
    private $imagem;
    private $usuario;
    private $titulo;
    private $resumo;
    
    public function setImagem($imagem)
    {
        $this->imagem = $imagem;
    }
    
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }
    
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }
    
    public function setResumo($resumo)
    {
        $this->resumo = $resumo;
    }

    public function getIdArtigo() {
        return $this->idArtigo;
    }

    public function setIdArtigo($artigo)
    {
        $this->idArtigo = $this->acessaIdArtigo($artigo);
    }

    public function acessaIdArtigo($artigo) {
        include('..'.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'conexaoBd.php');
        try {

            $sql = $pdo->prepare("select id_artigo from tb_artigos where nm_artigo = '".$artigo."'");
            $sql->execute();
            $dados = $sql->fetchAll();

            foreach($dados as $value) {
                return $value['id_artigo'];
            }
    
        } catch(Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function verificaArtigo($titulo) {
        include('..'.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'conexaoBd.php');

        try {

            $sql = $pdo->prepare("select id_artigo from tb_artigos where nm_artigo ='".$titulo."'");
            $sql->execute();
            return $sql->fetchAll();

        } catch(Exception $e) {
            throw new Exception($e->getMessage());
        }
        
    }

    public function cadastrarArtigo() {
        include('..'.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'conexaoBd.php');
        include_once ('..'.DIRECTORY_SEPARATOR.'controller'.DIRECTORY_SEPARATOR.'usuario.php');
        include_once('ArtigoTag.php');

        try {
            $artigo = $this->verificaArtigo($this->titulo);
            $artigoTag = new ArtigoTag();

            if(count($artigo) <= 0) {

                $sql = $pdo->prepare("insert into tb_artigos(id_usuario, nm_artigo, ds_artigo) values(:usuario, :titulo, :resumo)");
                $sql->bindValue(':usuario', $this->usuario, PDO::PARAM_STR);
                $sql->bindValue(':titulo', $this->titulo, PDO::PARAM_STR);
                $sql->bindValue(':resumo', $this->resumo, PDO::PARAM_STR);
                $sql->execute();
                echo 'Artigo postado com sucesso.';
            }
        } catch(Exception $e) {
            throw new Exception($e->getMessage());
        }
       
    }

    public function excluirArtigo($idArtigo) {
        include('..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'conexaoBd.php');
        
        try {
                $sql = $pdo->prepare("delete from tb_artigos where id_artigo =".$idArtigo);
                $sql->execute();
                echo 'Artigo excluído com sucesso.';
        } catch(Exception $e) {
            throw new Exception($e->getMessage());
        }

    }

    public function listarArtigos() {
        include('..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'conexaoBd.php');

        try {

            $sql = $pdo->prepare("select * from tb_artigos");
            $sql->execute();
            return $sql->fetchAll();

        } catch(Exception $e) {
            throw new Exception($e->getMessage());
        }
        
    }

    public function editarArtigo($id) {
        include('..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'conexaoBd.php');
        
        try {
            $artigo = $this->verificaArtigo($this->titulo);

            if(count($artigo) > 0) {
                $sql = $pdo->prepare("update tb_artigos set nm_artigo = '".$titulo."', ds_artigo = '".$resumo."' where id_artigo =".$idArtigo);
                $sql->execute();
                echo 'Artigo alterado com sucesso.';
            } else {
                echo 'Esse artigo já existe.';
            }

        } catch(Exception $e) {
            throw new Exception($e->getMessage());
        }

    }
}

?>