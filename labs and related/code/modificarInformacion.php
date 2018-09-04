<?php
    session_start();
    include_once("util.php");
    if (checkSession()  && funcionAdministrador()) {
        $nombre = $informacion = "";
        
        if(isset($_POST['informacion'])) {
            $nombre = $_POST['nombre'];
            $informacion = $_POST['informacion'];
            $id = $_POST['id'];
            $err = "";
            
            if (strlen($informacion) < 15) {
                $err.= 'El contenido de información está vacío o es demasiado corto.\n';
            }
            
            if ($err == "") {
                
                if (modificarInformacion($id, $informacion)) {
                    header('Location:consultaInformacion.php?status=modificacion');
                } else {
                    echo '<script type="text/javascript"> alert("Ocurrió al editar la información."); </script>';
                }
            } else {
                unset($_FILES);
                echo '<script type="text/javascript"> alert("Ocurrió un error al editar la información '.$err. ' ."); </script>';
            }
            
        } else {
            $id = $_GET["id"];
            $info = recuperarInformacion($id);
            $nombre = $info["nombre"];
            $informacion = $info["descripcion"];
        }

        include("_head.html");
        include("_headerAdmin.html");
        include("_modificarInformacion.html");
        include("_footer.html");
    } else {
        header("Location:admin.php?sessionexpired=true");
    }
?>