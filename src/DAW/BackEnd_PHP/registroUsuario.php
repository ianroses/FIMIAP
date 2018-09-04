<?php 
    session_start();
    include_once("util.php");
    if (checkSession()  && funcionAdministrador()) {
        
        $first_name = $last_name = "";
        if (isset($_POST["first_name"])) {
            
            $first_name = $_POST["first_name"];
            $last_name = $_POST["last_name"];
            $calle_numero = $_POST["calle_numero"];
            $colonia = $_POST["colonia"];
            $municipio = $_POST["municipio"];
            $codigo_p = $_POST["codigo_p"];
            $fecha_nac = $_POST["fecha_nac"];
            $tel_casa = $_POST["icon_telephone"];
            $celular = $_POST["celular"];
            $tipo_empleado = $_POST["tipo_empleado"]; 
            $email = $_POST["email"];
            $password = $_POST["password"];
            $err = "";
            
            if (($_POST["first_name"]) == "") {
                $err .= 'El usuario debe tener al menos un nombre.\n';
            }
            
            if (($_POST["last_name"]) == "") {
                $err .= 'El usuario debe tener al menos un apellido.\n';
            }
            
            if (($_POST["tipo_empleado"])>3 || ($_POST["tipo_empleado"])<1 ) {
                $err .= 'Se le debe asignar un rol al usuario.\n';
            }
            
            if($err == "") {
                if (registrarUsuario($first_name, $last_name, $calle_numero, $colonia,
                    $municipio, $codigo_p, $fecha_nac,$tel_casa, $celular, $tipo_empleado, $email,
                    $password)) {
                     header('Location:consultaUsuario.php?status=registrar');
                } else {
                    echo '<script type="text/javascript"> alert("Ocurrió un error al editar la noticia."); </script>';
                }
            }
            else {
                unset($_FILES);
                echo "<script type='text/javascript'> alert('El usuario no se pudo registrar por las siguientes razones: $err'); </script>";
            }
        }
    
        include("_head.html");
        
        include ("_headerAdmin.html");
    
        include ("_registroUsuario.html");
        
        include("_footer.html");
    } else {
        header("Location:admin.php?sessionexpired=true");
    }
?>