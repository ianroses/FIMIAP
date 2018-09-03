<?php
    include_once("../util.php");
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        echo listaTalleresDeAlumna($id);
    } 
?>