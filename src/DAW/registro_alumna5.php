<?php

    include_once("util.php");
  
        if(registrarSituacion(
        $_POST["vivienda_compartida"],
        $_POST["responsable_pago"],
        $_POST["parentesco"],
        $_POST["situacion_v"],
        $_POST["fuente_ingresos"],
        $_POST["ingresos"],
        $_POST["servicios"]
        )){
            include("_head.html"); 
            include("_headerAdmin.html");
            echo '<div class="content administrativo"><h5> ¡Situación registrada con éxito!<h5></div>';
            include("_footer.html");
        }else{
            include("_head.html"); 
            include("_headerAdmin.html");
            echo '<div class="content administrativo"><h5> Error, inténtalo de nuevo.<h5></div>';
            include("_footer.html");
            }  


?>