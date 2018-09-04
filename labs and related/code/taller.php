<?php
    session_start();
    include_once('util.php');
    
    if (checkSession()) {
        include("_head.html");
    
        include("_headerAdmin.html");
        
        include("_taller.html");
        
        if(isset($_GET["status"])){
        
        
        }
        
        
        
        include("_footer.html");
    } else {
        header("Location.admin.php?sessionexpired=true");
    }
    
   
?>