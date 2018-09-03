<?php
    session_start();
    include_once("util.php");
    
    if (checkSession() && funcionAdministrador()) {
        if (isset($_FILES["imagenGaleria"]["name"])) {
            $err="";
            $target_dir = "galery/";
            $fecha=getdate();
            $uploadOk = 1;
            $target_file = $target_dir . $fecha["year"] . $fecha["mon"] . $fecha["mday"] . $fecha["hours"] . $fecha["minutes"] . $fecha["seconds"]. basename($_FILES["imagenGaleria"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                // Check if image file is a actual image or fake image
                if(isset($_POST["submit"])) {
                    $check = getimagesize($_FILES["imagenGaleria"]["tmp_name"]);
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
                if ($_FILES["imagenGaleria"]["size"] > 25165824) {
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
                } else if ($err==="") {
                    if (move_uploaded_file($_FILES["imagenGaleria"]["tmp_name"], $target_file)) {
                         $date=date("Y-m-d H:i:s");
                         $titulo="";
                         if (isset($_POST["titulo"])) {
                             $titulo = $_POST["titulo"];
                         }
                         anadirImagenGaleria($target_file, $date, $titulo);
                        //echo "The file ". basename( $_FILES["foto"]["name"]). " has been uploaded.";
                    } else {
                        var_dump($_FILES["imagenGaleria"]["error"]);
                        $err.= 'Hubo un error al tratar de subir tu imagen<br>';
                        $imagen = "";
                        $nombreimagen = "";
                        $descripcionimagen = "";
                    }
                }
        }
        include("_head.html");
        include("_headerAdmin.html");
        include("_imagenesGaleria.html");
        include("_footer.html");
    } else {
        header("Location:admin.php?sessionexpired=true");
    }
    
?>