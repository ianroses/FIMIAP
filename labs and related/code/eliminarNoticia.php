<?php
    session_start();
    include_once('util.php');
    if (checkSession()) {
        eliminarNoticia($_GET["id"]);
    } else {
        hedaer("Location:admin.php?sessionexpired=true");
    }
?>