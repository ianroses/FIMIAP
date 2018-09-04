<?php
    session_start();
    include_once('util.php');
    if (checkSession()) {
        eliminarTaller($_GET["id"]);
    } else {
        header("Location:admin.php?sessionexpired=true");
    }
?>