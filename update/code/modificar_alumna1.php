<?php
    session_start();
    include_once("util.php");
    
    if (checkSession()) {
            //UPDATE, si los campos aún no han sido llenados, llamar instead a funcion registro
            $id = $_POST["id"];
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
                    
                modificarInfoPersonal($id,
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
                    $_POST["emergencia_tel"]);
                    
                    
                $tabla = 'HistorialAcademico';    
                if(noID($id, $tabla)){
                     registrarHistorialAcademico(
                        $id,
                        $_POST["grado_estudios"],
                        $_POST["estatus_escolaridad"],
                        $_POST["anio_suspension"],
                        $_POST["motivo_susp"],
                        $_POST["otros_estudios"]
                        );
            
                }else{
                    modificarHistorialAcademico(
                    $id,
                    $_POST["grado_estudios"],
                    $_POST["estatus_escolaridad"],
                    $_POST["anio_suspension"],
                    $_POST["motivo_susp"],
                    $_POST["otros_estudios"]
                    );
                }
                
                
                $tabla = 'InfoLaboral';    
                if(noID($id, $tabla)){
                     registrarInfoLaboral(
                        $id,
                        $_POST["empresa"],
                        $_POST["puesto"],
                        $_POST["antiguedad"]
                        );
            
                }else{
                   modificarInfoLaboral(
                    $id,
                    $_POST["empresa"],
                    $_POST["puesto"],
                    $_POST["antiguedad"]
                    );
                }
                
                $tabla = 'AccesoIT';    
                if(noID($id, $tabla)){
                     registrarHerramientas(
                        $id,
                        $_POST["acceso_it"],
                        $_POST["herramientas"]
                        );
            
                }else{
                    modificarHerramientas(
                    $id,
                    $_POST["acceso_it"],
                    $_POST["herramientas"]
                    );
                }
                
                
                $tabla = 'Situacion';    
                if(noID($id, $tabla)){
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
            
                }else{
                   modificarSituacion(
                    $id,
                    $_POST["vivienda_compartida"],
                    $_POST["responsable_pago"],
                    $_POST["parentesco"],
                    $_POST["situacion_v"],
                    $_POST["fuente_ingresos"],
                    $_POST["ingresos"],
                    $_POST["servicios"]
                    );
                }
                
                
                header("Location:con_alumna.php?status=exito");
                
               
                
            }else{
                include("_head.html");
        include ("_headerAdmin.html");
        include ("_reg_alumna1.html");
        
        echo '<div id="modalError" class="modal">
                <div class="modal-content">
                    <h4>Error en modificación</h4>
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