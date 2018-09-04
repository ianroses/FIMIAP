<?php
    include_once("../util.php");
    if (!(isset($noticias))) {
        $noticias = obtenerArrayNoticias();
    }
    echo json_encode($noticias);
?>