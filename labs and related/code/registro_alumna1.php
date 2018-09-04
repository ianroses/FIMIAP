<?php
    session_start();
    include_once("util.php");
    if (checkSession()){
        
        if(isset($_POST["first_name"], 
                $_POST["last_name"], 
                $_POST["calle_numero"],
                $_POST["colonia"],
                $_POST["municipio"],
                $_POST["cp"],
                $_POST["ocupacion"],
                $_POST["estado_civil"],
                $_POST["fecha_nac_alumna"],
                $_POST["telefono_casa_alumna"],
                $_POST["celular"],
                $_POST["genero_alumna"],
                $_POST["estatus_fim"],
                $_POST["enteraste"],
                $_POST["nombre_emergencia"],
                $_POST["emergencia_tel"])){
        
            if(noDuplicado($_POST["first_name"], $_POST["last_name"], $_POST["fecha_nac_alumna"])){
                
                if(registrarAlumno(
                $_POST["first_name"], 
                $_POST["last_name"], 
                $_POST["calle_numero"],
                $_POST["colonia"],
                $_POST["municipio"],
                $_POST["cp"],
                $_POST["ocupacion"],
                $_POST["estado_civil"],
                $_POST["fecha_nac_alumna"],
                $_POST["telefono_casa_alumna"],
                $_POST["celular"],
                $_POST["genero_alumna"],
                $_POST["estatus_fim"],
                $_POST["enteraste"],
                $_POST["nombre_emergencia"],
                $_POST["emergencia_tel"]
                
                )){
                    
                        $id = getID($_POST["first_name"], $_POST["last_name"], $_POST["fecha_nac_alumna"]);
                        
                        
                        //var_dump($id);
                        registrarHistorialAcademico(
                        $id,
                        $_POST["grado_estudios"],
                        $_POST["estatus_escolaridad"],
                        $_POST["anio_suspension"],
                        $_POST["motivo_susp"],
                        $_POST["otros_estudios"]
                        );
                        
                        registrarInfoLaboral(
                        $id,
                        $_POST["empresa"],
                        $_POST["puesto"],
                        $_POST["antiguedad"]
                        );
                        
                        registrarHerramientas(
                        $id,
                        $_POST["acceso_it"],
                        $_POST["herramientas"]
                        );
                        
                        registrarSituacion(
                        $id,
                        $_POST["vivienda_compartida"],
                        $_POST["responsable_pago"],
                        $_POST["parentesco"],
                        $_POST["situacion_v"],
                        $_POST["fuente_ingresos"],
                        $_POST["ingresos"],
                        $_POST["servicios"]
                        );
                        
                        
        include("_head.html");
        include ("_headerAdmin.html");
        include ("_reg_alumna1.html");
        
        echo '<div id="modalError" class="modal">
                <div class="modal-content">
                    <h4>¡Información registrada con éxito!</h4>
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
                    include("_head.html"); 
                    include("_headerAdmin.html");
                    echo '<div class="content administrativo"><h5> Error, intenta nuevamente.<h5></div>';
                    include("_footer.html");
                    }
                
                    
            }else{ //es un UPDATE
                    include("_head.html"); 
                    include("_headerAdmin.html");
                    echo '<div class="content administrativo"><h5> Error, la beneficiaria ya existe.<h5></div>';
                    include("_footer.html");
            }
        
    }else{
        
        include("_head.html");
        include ("_headerAdmin.html");
        include ("_reg_alumna1.html");
        
        echo '<div id="modalError" class="modal">
                <div class="modal-content">
                    <h4>Error en registro</h4>
                    <h5>Es necesario llenar todos los campos de información personal.</h5>
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
        
    } else {
        header("Location:admin.php?sessionexpired=true");
    }
?>