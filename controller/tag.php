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

    function retornaIdTag() {
        try {

            if (isset($_GET['editar'])) {
                $id = (int) $_GET['editar'];
                echo '<h2>Editar tag nº: '.$id.'</h2>';
                editaTag($id);
                echo '<br><br>';
            }
        } catch(Exception $e) {
            throw new Exception($e->getMessage());
        }
        
    }

    function editaTag($id) {
        include_once('..'.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'Tag.php');
        include_once('templates'.DIRECTORY_SEPARATOR.'formEdicaoTag.php');
        
        try {

            if(isset($_POST['edicaoTag'])) {
                $Tag = new Tag();
    
                $nome = $_POST['edicaoTag'];
                $Tag->setNome($nome);

                $Tag->editarTag($id);
            }
           
        } catch(Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    function excluiTag() {
        include_once('..'.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'Tag.php');
    
        try {

            $tag = new Tag();

            if (isset($_GET['excluir'])) {
                
                $id = (int) $_GET['excluir'];
                
                $tag->excluirTag($id);
            }
        } catch(Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

?>