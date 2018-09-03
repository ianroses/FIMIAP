<?php
    session_start();
    include_once("util.php");
    if (checkSession()) {
        include("_head.html");
        include ("_headerAdmin.html");
        include ("_ayuda.html");
        include("_footer.html");
    } else {
        header("Loation:admin.php?sessionexpired=true");
    }
?>