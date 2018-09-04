<?php
    session_start();
    include_once("util.php");
    if (checkSession()) {
        $titulonoticia = $contenido = "";
        
        if (isset($_POST["titulo_noticia"])) {
            $titulonoticia = $_POST["titulo_noticia"];
            $contenido = $_POST['contenidonoticia'];
            $descripcionimagen = $_POST['descripcionimagen'];
            $imagenActual = $_POST['imagenactual'];
            $id = $_POST['id'];
            $err = "";
    
            if (strlen($contenido)<15) {
                $err.= 'El contenido de la noticia está vacío o es demasiado corto.\n';
            }
            
            if (($_POST["titulo_noticia"]) == "") {
                $err .= 'La noticia debe tener un título.\n';
            }
            
            if ($_POST["nombrearchivo"] != "") {
                if (isset($_FILES["imagennoticia"]["name"]) && $_POST["nombrearchivo"] != $imagenActual) {
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
                    $err.='El archivo ya existe en el sistema. Cambia el nombre de este.\n';
                    $uploadOk = 0;
                }
                // Check file size
                if ($_FILES["imagennoticia"]["size"] > 8388608) {
                    $err.= 'El tamaño de la imagen es muy grande.\n';
                    $uploadOk = 0;
                }
                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                    $err.= 'Solo archivos de extensión JPG, JPEG, PNG o GIF son aceptados.\n';
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
                        $err.= 'Hubo un error al tratar de subir tu imagen\n';
                        $imagen = "";
                        $nombreimagen = "";
                        $descripcionimagen = "";
                    }
                }
            } else {
                $target_file=0;
            }
        }
            
        
            
            if ($err == "") {
                
                if (modificaNoticia($id, $titulonoticia, $contenido, $target_file, $descripcionimagen)) {
                    header('Location:modificareliminar_Noticia.php?status=modificacion');
                } else {
                    echo '<script type="text/javascript"> alert("Ocurrió un error al editar la noticia."); </script>';
                }
            }
            else {
                unset($_FILES);
                echo "<script type='text/javascript'> alert('La noticia no se pudo editar por las siguientes razones: $err'); </script>";
            }
        } else {
            $id = $_GET["id"];
            $noticia = recuperaNoticia($id);
            $imagen = recuperaImagenNoticia($id);
            $titulonoticia = $noticia["titulo"];
            $contenido = $noticia["descripcion"];
            if ($imagen) {
                $descripcionimagen = $imagen["descripcion"];
                $nombreimagen = $imagen["ubicacion"];
                $imagenActual = $imagen["ubicacion"];
                $img = 0;
            }
        }
        include("_head.html");
        include("_headerAdmin.html");
        include("_modificarNoticia.html");
        include("_footer.html");
    } else {
        header("Location:admin.php?sessionexpired=true");
    }
?>