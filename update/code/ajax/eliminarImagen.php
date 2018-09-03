<?php
    include_once('../util.php');
    if (isset($_GET["id"])) {
        eliminarImagenGaleria($_GET["id"]);
    }
?>