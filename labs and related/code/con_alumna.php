<?php 
    session_start();
    include_once("util.php");
    
    
    
    if (checkSession()) {
        include("_head.html");
        include ("_headerAdmin.html");
        include ("_consulta_alumna.html");
        listaAlumnas();
        
        if(isset($_GET["status"])){
        
        echo '<div id="modalError" class="modal">
                <div class="modal-content">
                    <h4>Éxito</h4>
                    <h5>La información ha sido modificada.</h5>
                </div>
                <div class="modal-footer">
                    <a href="#!" class="modal-action modal-close btn-flat">Ok</a>
                </div>
                </div>';
        
                include("_footer.html");
                echo '<script type="text/javascript">
                window.onload = function() {
                    if (document.getElementById("modalError")) {
                        $("#modalError").modal("open");
                    }
                }
                </script>';
        }else{
        
        include("_footer.html");
        }
     
    } else {
        header("Location:admin.php?sessionexpired=true");
    }

    
?>