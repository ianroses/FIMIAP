<?php
    session_start();
    include_once("util.php");
    if (checkSession()) {
        
        if(registrarTaller(
        $_POST["nombre_taller"],
		$_POST["fecha_taller"],
		$_POST["costo_taller"],
		$_POST["descripcion_taller"]
       
        )){
            include("_head.html");
            include ("_headerAdmin.html");
            include("_taller.html");
            
            echo '<div id="modalExito" class="modal">
                    <div class="modal-content">
                        <h5>Taller registrado con éxito.</h5>
                    </div>
                    <div class="modal-footer">
                        <a href="#!" class="modal-action modal-close btn-flat">Ok</a>
                    </div>
                </div>';
            
            include("_footer.html");
            echo '<script type="text/javascript">
            window.onload = function() {
                if (document.getElementById("modalExito")) {
                    $("#modalExito").modal("open");
                }
            }
            </script>';
        }else{
            include("_head.html"); 
            include("_headerAdmin.html");
            echo '<div class="content administrativo"><h5> Error, inténtalo de nuevo.<h5></div>';
            include("_footer.html");
            }  
    } else {
        header("Location:admin.php?sessionexpired=true");
    }

?>