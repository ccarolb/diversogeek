<?php
class Tag {
    private $idTag;
    private $nome;

    public function setIdTag($idTag)
    {
        $this->idTag = $idTag;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function verificaTag($nome) {
        include('..'.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'conexaoBd.php');

        try {

            $sql = $pdo->prepare("select id_tag from tb_tags where nm_tag ='".$nome."'");
            $sql->execute();
            return $sql->fetchAll();

        } catch(Exception $e) {
            throw new Exception($e->getMessage());
        }
        
    }

    public function cadastrarTag() {
        include('..'.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'conexaoBd.php');

        try {
            $tag = $this->verificaTag($this->nome);

            if(count($tag) <= 0) {

                $sql = $pdo->prepare("insert into tb_tags(nm_tag) values(:nome)");
                $sql->bindValue(':nome', $this->nome, PDO::PARAM_STR);
                $sql->execute();
                echo 'Tag criada com sucesso.';
            } else {
                echo 'Essa tag já existe.';
            }
        } catch(Exception $e) {
            throw new Exception($e->getMessage());
        }
       
    }

    public function listarTags() {
        include('..'.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'conexaoBd.php');

        try {

            $sql = $pdo->prepare("select nm_tag from tb_tags");
            $sql->execute();
            return $sql->fetchAll();

        } catch(Exception $e) {
            throw new Exception($e->getMessage());
        }
        
    }

}

?>