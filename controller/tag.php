<?php 
    
    function cadastraTag() {
        include_once('..'.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'Tag.php');
        include_once('..'.DIRECTORY_SEPARATOR.'view'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'formCadastroTag.php');
    
        try {

            if (isset($_POST['tag'])) {
                $tags = new Tag();

                $tag = $_POST['tag'];
    
                $tags->setNome($tag);
                
                $tags->cadastrarTag();
            }
        } catch(Exception $e) {
            throw new Exception($e->getMessage());
        }
        
    }

    function listarTags() {
        include_once('..'.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'Tag.php');
    
        try {

            $tag = new Tag();
            return $tag->listarTags();

        } catch(Exception $e) {
            throw new Exception($e->getMessage());
        }
    }


?>