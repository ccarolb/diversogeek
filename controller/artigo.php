<?php 
    
    function cadastraArtigo() {
        include_once('..'.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'Artigo.php');
        include_once('..'.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'Usuario.php');
        include_once('..'.DIRECTORY_SEPARATOR.'view'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'formCadastroArtigo.php');
    
        try {

            if (isset($_POST['titulo'])) {
                $artigo = new Artigo();
                $usuario = new Usuario();
    
                $usuario->setIdUsuario($_SESSION['login']);
                $titulo = $_POST['titulo'];
                $resumo = $_POST['resumo'];
    
                $artigo->setTitulo($titulo);
                $artigo->setUsuario($usuario->getIdUsuario());
                $artigo->setResumo($resumo);
                
                $artigo->cadastrarArtigo();

                $artigo->setIdArtigo($titulo);

                relacionaTagAoArtigo($artigo->getIdArtigo());
            }
        } catch(Exception $e) {
            echo 'Esse artigo já existe.';
        }
        
    }

    function relacionaTagAoArtigo($idArtigo) {
        include_once('..'.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'ArtigoTag.php');
        include_once('..'.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'Tag.php');

        try {
            $artigoTag = new ArtigoTag();
            $tags = new Tag();

                $artigoTag->setIdArtigo($idArtigo);

                foreach($_POST['tags'] as $tag) {
                    $idTag = $tags->acessaIdTag($tag);
                    $artigoTag->cadastraIds($idTag, $artigoTag->getIdArtigo());
                }
        } catch(Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    
    function listarArtigos() {
        include_once('..'.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'Artigo.php');
        include_once('..'.DIRECTORY_SEPARATOR.'view'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'tabelaArtigos.php');
    
        try {

            $artigo = new Artigo();
            return $artigo->listarArtigos();

        } catch(Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    function excluiArtigo() {
        include_once('..'.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'Artigo.php');
    
        try {

            $artigo = new Artigo();

            if (isset($_GET['excluir'])) {
                
                $id = (int) $_GET['excluir'];
                
                $artigo->excluirArtigo($id);
            }
        } catch(Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    function retornaIdArtigo() {
    
        try {

            if (isset($_GET['editar'])) {
                $id = (int) $_GET['editar'];
                echo '<h2>Editar artigo nº: '.$id.'</h2>';
                editaArtigo($id);        
            }
        } catch(Exception $e) {
            throw new Exception($e->getMessage());
        }
        
    }

    function editaArtigo($id) {
        include_once('..'.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'Artigo.php');
        include_once('templates'.DIRECTORY_SEPARATOR.'formEdicaoArtigo.php');
        try {

            if(isset($_POST['titulo'])) {
                $artigo = new Artigo();
    
                $titulo = $_POST['titulo'];
                $resumo = $_POST['resumo'];
                $artigo->setTitulo($titulo);
                $artigo->setResumo($resumo);

                $artigo->editarArtigo($id);
            }
           
        } catch(Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

?>