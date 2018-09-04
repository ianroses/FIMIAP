<?php

    include_once("util.php");
  
        if(registrarHerramientas(
        
        $_POST["acceso_it"],
        $_POST["herramientas"]
                
        
        )){
            include("_head.html"); 
            include("_headerAdmin.html");
            echo '<div class="content administrativo"><h5> ¡Herramientas registradas con éxito!<h5></div>';
            include("_footer.html");
        }else{
            include("_head.html"); 
            include("_headerAdmin.html");
            echo '<div class="content administrativo"><h5> Error, inténtalo de nuevo.<h5></div>';
            include("_footer.html");
            }  


?>