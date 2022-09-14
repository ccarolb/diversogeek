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


?>