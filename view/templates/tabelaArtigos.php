
<?php
    include_once ('..'.DIRECTORY_SEPARATOR.'controller'.DIRECTORY_SEPARATOR.'artigo.php');
    excluiArtigo();
    retornaIdArtigo();

    $artigo = listarArtigos();
    echo '<br><br>';
    
    foreach($artigo as $value) {
        echo '<div>';
        echo '<a class="artigo" href="?excluir='.$value['id_artigo'].'">( X )</a> - <a class="artigo editar" href="?editar='.$value['id_artigo'].'">Editar</a> | id: '.$value['id_artigo'].' | Título: '.$value['nm_artigo'].'';
        echo '</div>';
        echo '<br>';
       
    }
?>
</div>