<?php
    session_start();
    include_once("util.php");
    if (checkSession()  && funcionAdministrador()) {
        $first_name = $last_name  = "";
        
        if (isset($_POST["first_name"])){
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
            $id = $_POST['id'];
            $err = "";
            
            
            if($err == ""){
                if (modificarUsuario($id, $first_name, $last_name, $calle_numero, $colonia,
                        $municipio, $codigo_p, $fecha_nac,
                        $tel_casa, $celular, $tipo_empleado, $email,
                        $password)) {
                    header('Location:consultaUsuario.php?status=modificacion');
                } else {
                    echo '<script type="text/javascript"> alert("Ocurrió un error al editar el usuario."); </script>';
                }    
            }else {
                unset($_FILES);
                echo "<script type='text/javascript'> alert('El usuario no se pudo editar por las siguientes razones: $err'); </script>";
            }
        } else {
            $id = $_GET["id"];
            $usuario = recuperaUsuario($id);
            $first_name = $usuario["nombre"];
            $last_name = $usuario["apellidos"];
            $calle_numero = $usuario["calle_numero"];
            $colonia = $usuario["colonia"];
            $municipio = $usuario["municipio"];
            $codigo_p = $usuario["zip_code"];
            $fecha_nac = $usuario["fecha_nacimiento"];
            $tel_casa = $usuario["telefono_casa"];
            $celular = $usuario["telefono_celular"];
            $tipo_empleado = $usuario["ID_ROL"]; 
            $email = $usuario["email"];
            $password = $usuario["contrasena"];
            $err = "";
        }
        
        include("_head.html");
        include("_headerAdmin.html");
        include("_modificarUsuario.html");
        include("_footer.html");
    } else {
        header("Location:admin.php?sessionexpired=true");
    }
?>