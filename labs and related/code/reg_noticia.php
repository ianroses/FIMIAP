<?php
    session_start();
    include_once("util.php");
    if (checkSession()) {
        $titulonoticia = $contenido ="";
        if (isset($_POST["titulo_noticia"])) {
            $titulonoticia = $_POST["titulo_noticia"];
            $contenido = $_POST['contenidonoticia'];
            $descripcionimagen = $_POST['descripcionimagen'];
            $err = "";
    
            if (strlen($contenido)<15) {
                $err.= 'El contenido de la noticia está vacío o es demasiado corto.<br>';
            }
            
            
            if (($_POST["titulo_noticia"]) == "") {
                $err .= 'La noticia debe tener un título.<br>';
            }
            
            if (isset($_FILES["imagennoticia"]["name"]) && $_POST["nombrearchivo"] != "") {
                $target_dir = "imagenesNoticias/";
                $fecha = getdate();
                $target_file = $target_dir . $fecha["year"] . $fecha["mon"] . $fecha["mday"] . $fecha["hours"] . $fecha["minutes"] . $fecha["seconds"]. basename($_FILES["imagennoticia"]["name"]);
                $uploadOk = 1;
                $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                // Check if image file is a actual image or fake image
                if(isset($_POST["submit"])) {
                    $check = getimagesize($_FILES["imagennoticia"]["tmp_name"]);
                    if($check !== false) {
                        //echo "File is an image - " . $check["mime"] . ".";
                        $uploadOk = 1;
                    } else {
                        $err.= 'El archivo no es una imagen\n';
                        $uploadOk = 0;
                    }
                }
                // Check if file already exists
                if (file_exists($target_file)) {
                    $err.='El archivo ya existe en el sistema. Cambia el nombre de este.<br>';
                    $uploadOk = 0;
                }
                // Check file size
                if ($_FILES["imagennoticia"]["size"] > 25165824) {
                    $err.= 'El tamaño de la imagen es muy grande.\n';
                    $uploadOk = 0;
                }
                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                    $err.= 'Solo archivos de extensión JPG, JPEG, PNG o GIF son aceptados.<br>';
                    $uploadOk = 0;
                }
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    $imagen = "";
                    $nombreimagen = "";
                    //echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
                } else if ($err=="") {
                    if (move_uploaded_file($_FILES["imagennoticia"]["tmp_name"], $target_file)) {
                        //echo "The file ". basename( $_FILES["foto"]["name"]). " has been uploaded.";
                    } else {
                        var_dump($_FILES["imagennoticia"]["error"]);
                        $err.= 'Hubo un error al tratar de subir tu imagen<br>';
                        $imagen = "";
                        $nombreimagen = "";
                        $descripcionimagen = "";
                    }
                }
            }
            
            if ($err == "") {
                $date=date("Y-m-d H:i:s");
                $usuario = $_SESSION["usuario"];
                if (registrarNoticia($titulonoticia, $contenido, $target_file, $descripcionimagen, $date,$usuario)) {
                    header('Location:modificareliminar_Noticia.php?status=registrar');
                } else {
                    echo '<script type="text/javascript"> alert("Ocurrió un error al publicar la noticia."); </script>';
                }
            }
            else {
                unset($_FILES);
            }
        }        
        include("_head.html");
        include ("_headerAdmin.html");
        include ("_reg_noticia.html");
        if ($err !=  "") {
            echo '<div id="modalError" class="modal">
                    <div class="modal-content">
                        <h4>Error al publicar noticia</h4>
                        <h5> La Noticia no se pudo modificar por las siguientes razones:</h5>
                        <h5>'. $err .'</h5>
                    </div>
                    <div class="modal-footer">
                        <a href="#!" class="modal-action modal-close btn-flat">Ok</a>
                    </div>
                </div>';
        }
        include("_footer.html");
        echo '<script type="text/javascript">
        window.onload = function() {
            if (document.getElementById("modalError")) {
                $("#modalError").modal("open");
            }
        }
        </script>';
    } else {
        header("Location:admin.php?sessionexpired=true");
    }
?>