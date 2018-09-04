<?php
    include_once("../util.php");
    if (isset($_GET["filtro"])) {
        echo listaAlumnasAJAX($_GET["filtro"]);
    } else {
        echo listaAlumnasAJAX("");
    }
?>