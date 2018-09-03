<?php
    include_once('../util.php');
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        if (isset($_GET["input"])){
            $input = $_GET["input"];
            echo listaTalleresDisponibles($id,$input);
        } else {
            echo listaTalleresDisponibles($id,"");
        }
    }
?>