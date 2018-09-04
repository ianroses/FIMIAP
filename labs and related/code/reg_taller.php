<?php
    session_start();
    include_once("util.php");
    if (checkSession()) {
        include("_head.html");
        include ("_headerAdmin.html");
        include ("_reg_taller.html");
        include("_footer.html");
    } else {
        header("Loation:admin.php?sessionexpired=true");
    }
?>