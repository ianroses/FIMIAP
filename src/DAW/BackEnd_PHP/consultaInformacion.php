<?php
    include_once("util.php");
    session_start();
    if (checkSession()) {
        
        
        include("_head.html");
    
        include("_headerAdmin.html");
        
        include("_consultaInformacion.html");
        
        include("_footer.html");
        
        if (isset($_GET["status"])) {
            if ($_GET["status"] == "modificacion") {
                echo '<script> alert("Información modificada con éxito."); </script>';
            }
            unset($_GET);
        }
    } else {
        header("Location:admin.php?sessionexpired=true");
    }
?>