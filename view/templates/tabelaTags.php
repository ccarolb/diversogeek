
<?php
    include_once ('..'.DIRECTORY_SEPARATOR.'controller'.DIRECTORY_SEPARATOR.'tag.php');
    excluiTag();
    retornaIdTag();
    $tag = listarTags();
    foreach($tag as $value) {
        echo '<div>';
        echo '<a class="tag" href="?excluir='.$value['id_tag'].'">( X )</a> - <a class="tag editar" href="?editar='.$value['id_tag'].'">Editar</a> | id: '.$value['id_tag'].' | Tag: '.$value['nm_tag'].'';
        echo '</div>';
        echo '<br>';
       
    }

    echo '<a href="menuTags.php">Voltar</button>'
?>