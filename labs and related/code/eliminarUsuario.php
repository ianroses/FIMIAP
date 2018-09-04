<?php
    session_start();
    include_once('util.php');
    if (checkSession()  && funcionAdministrador()) {
        eliminarUsuario($_GET["id"]);
    } else {
        header("Location:admin.php?sessionexpired=true");
    }
?>