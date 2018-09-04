<?php
    session_start();
    include_once("util.php");
    
    if (checkSession() && funcionAdministrador()) {
        include("_head.html");
        
        include("_headerAdmin.html");
        
        include("_consultaUsuario.html");
        
        if (isset($_GET["status"])) {
            if ($_GET["status"] == "registrar") {
                $mensaje =  'Usuario agregado con éxito';
            } else if ($_GET["status"] == "modificacion") {
                $mensaje = 'Modificación de usuario realizada con éxito';
            }
            echo '<div id="modalNotificacion" class="modal">
                    <div class="modal-content">
                        <h4>
                        '. $mensaje .'</h4>
                    </div>
                    <div class="modal-footer">
                        <a href="#!" class="modal-action modal-close btn-flat">Ok</a>
                    </div>
                </div>';
            unset($_GET);
        }
            echo '<script type="text/javascript">
            window.onload = function() {
                if (document.getElementById("modalNotificacion")) {
                    $("#modalNotificacion").modal("open");
                }
            }
            </script>';
                
              
        include('_footer.html');
    } else {
        header("Location:admin.php?sessionexpried=true");
    }
?>