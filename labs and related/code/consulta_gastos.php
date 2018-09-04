<?php

//$selected = gastos;
    session_start();
    include("util.php");
    if (checkSession()) {
        include("_head.html");
        include ("_headerAdmin.html");
        include ("_select_gastos.html");
        include("_footer.html"); 
    } else {
        header("Location:admin.php?sessionexpired=true");
    }
?>