<?php 
    
    //$selected = index;
    session_start();
    include("util.php");
    if (checkSession()) {
        include("_head.html");
        include ("_headerAdmin.html");
    
        include ("_reg_info_fim.html");
        
        include("_footer.html");
    } else {
        header("Location:admin.php?sessionexpired=true");
    }
?>