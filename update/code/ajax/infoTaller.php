<?php
    include_once("../util.php");
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        
        if (isset($_GET["inscribir"])) {
            echo infoTaller($id, true);
        } else {
            echo infoTaller($id,false);
        }
    }
?>