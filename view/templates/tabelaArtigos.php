<?php
    include_once ('..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'controller'.DIRECTORY_SEPARATOR.'artigo.php');

    $artigo = listarArtigos();
    excluiArtigo();

    foreach($artigo as $value) {
        echo '<a href="?excluir='.$value['id_artigo'].'">X</a>|<a href="?editar='.$value['id_artigo'].'">Editar</a>';
        echo '<br>';
        echo '<br>';
    }

?>