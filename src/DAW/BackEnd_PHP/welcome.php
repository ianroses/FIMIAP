<?php
    session_start();
    if (checkSession) {
        $_SESSION["ax"]=true;
    
        include("con_alumna.php"); 
        
    } else {
        header("Location:admin.php?sessionexpired=true");
    }
    

?>