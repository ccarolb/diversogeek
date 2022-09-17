<?php 
    
    function cadastraArtigo() {
        include_once('..'.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'Artigo.php');
        include_once('..'.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'ArtigoTag.php');
        include_once('..'.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'Tag.php');
        include_once('..'.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'Usuario.php');
        include_once('..'.DIRECTORY_SEPARATOR.'view'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'formCadastroArtigo.php');
    
        try {

            if (isset($_POST['titulo'])) {
                $artigo = new Artigo();
                $artigoTag = new ArtigoTag();
                $tags = new Tag();
                $usuario = new Usuario();
    
                $usuario->setIdUsuario($_SESSION['login']);
                $titulo = $_POST['titulo'];
                $resumo = $_POST['resumo'];
    
                $artigo->setTitulo($titulo);
                $artigo->setUsuario($usuario->getIdUsuario());
                $artigo->setResumo($resumo);
                
                $artigo->cadastrarArtigo();

                $artigo->setIdArtigo($titulo);
                $artigoTag->setIdArtigo($artigo->getIdArtigo());
                foreach($_POST['tags'] as $tag) {
                    $artigoTag->cadastraIds($tag, $artigoTag->getIdArtigo());
                }
            }
        } catch(Exception $e) {
            throw new Exception($e->getMessage());
        }
        
    }
    
    function listarArtigos() {
        include_once('..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'Artigo.php');
        include_once('..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'view'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'tabelaArtigos.php');
    
        try {

            $artigo = new Artigo();
            return $artigo->listarArtigos();

        } catch(Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    function excluiArtigo() {
        include_once('..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'Artigo.php');
    
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

    function editaArtigo() {
        include_once('..'.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'Artigo.php');
        include_once('..'.DIRECTORY_SEPARATOR.'view'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'formEdicaoArtigo.php');
    
        try {

            if (isset($_POST['titulo'])) {
                $artigo = new Artigo();
    
                $titulo = $_POST['titulo'];
                $resumo = $_POST['resumo'];
                $tags = $_POST['tags'];
    
                $artigo->setTitulo($titulo);
                $artigo->setUsuario($usuario->getIdUsuario());
                $artigo->setResumo($resumo);
                
                $artigo->editarArtigo();
            }
        } catch(Exception $e) {
            throw new Exception($e->getMessage());
        }
        
    }


?>