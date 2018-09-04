<?php
    include_once("util.php");
    session_start();
    if (checkSession()) {
        include("_head.html");
        include("_headerAdmin.html");
        include("_consultarDonaciones.html");
        include("_footer.html");
    } else {
        header("Loation:admin.php?sessionexpired=true");
    }
?>