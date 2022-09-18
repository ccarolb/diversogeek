<?php

class ArtigoTag {
    private $idArtigo;
    private $idTag;
    
    public function getIdArtigo() {
        return $this->idArtigo;
    }

    public function setIdArtigo($idArtigo) {
        $this->idArtigo = $idArtigo;
    }
    
    public function getIdTag() {
        return $this->idTag;
    }

    public function setIdTag($idTag) {
        $this->idTag = $idTag;
    }

    public function cadastraIds($idTag, $idArtigo) {
        include('..'.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'conexaoBd.php');

        try {

            foreach((array) $idTag as $value) {
                $sql = $pdo->prepare("insert into tb_artigo_tag(id_artigo, id_tag) values(:idArtigo, :idTag)");
                $sql->bindValue(':idArtigo', $this->idArtigo, PDO::PARAM_INT);
                $sql->bindValue(':idTag', $value, PDO::PARAM_INT);
                $sql->execute();
            }
                
        } catch(Exception $e) {
            throw new Exception($e->getMessage());
        }

    }
}

?>