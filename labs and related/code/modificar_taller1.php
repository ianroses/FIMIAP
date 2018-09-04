<?php
    session_start();
    include_once("util.php");
    
    if (checkSession()) {
       //UPDATE, si los campos aún no han sido llenados, llamar instead a funcion registro
        $id = $_POST["id"];
        
        if(isset($_POST["nombre_taller"], $_POST["fecha_taller"], $_POST["costo_taller"], $_POST["descripcion_taller"])){
            
            if(modificarInfoTaller($id,
            $_POST["nombre_taller"], 
            $_POST["costo_taller"],
            $_POST["fecha_taller"], 
            $_POST["descripcion_taller"])){
                
                include("_head.html");
                include("_headerAdmin.html");
                include("_taller.html");
                echo '<div id="modalError" class="modal">
                <div class="modal-content">
                    <h4>Éxito</h4>
                    <h5>La información del taller ha sido modificada.</h5>
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
                
            }
                
            
            
        }else{
            
            //arreglar este
            include("_head.html");
            include ("_headerAdmin.html");
            echo '<div id="modalExito" class="modal">
                    <div class="modal-content">
                        <h4>Error en modificación</h4>
                        <h5>Es necesario llenar todos los campos de información.</h5>
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
            
            //header("Location:taller.php");

        }
            
    } else {
        header("Location:admin.php?sessionexpired=true");
    }
?>