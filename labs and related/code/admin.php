<?php
    session_start();
    include("util.php");
    $error= "";
    $footer = yes;
    //Validar si hay una sesión iniciada
    if (checkSession()) {
        header("Location:welcome.php");
    }
    //Validar campos
    if (isset($_POST["usuario"])) {
        if ($_POST["usuario"] === "") {
            $error = "<p> Debes introducir un usuario. <p>";
        }
        if ($_POST["contrasena"] === "") {
            $error .= "<p> Debes introducir una contraseña. <p>";
        }
        
        if ($error === "") {
            if (login($_POST["usuario"], $_POST["contrasena"])) {
                header("Location:welcome.php");
            } else {
                $error .= '<p> El usuario y/o la contraseña con incorrectos.';
            }            
        }
    }
    
    if (isset($_GET["sessionexpired"])) {
        $error = "La sesión ha expirado, debes ingresar de nuevo.";
    }
    
    $selected = admin;
    include("_head.html");
    include("_header.html");
    include("_admin.html");
    //Modal de error
    if ($error !=  "") {
        echo '<div id="modalError" class="modal">
                <div class="modal-content">
                    <h4>Autenticación fallida</h4>
                    '. $error .'
                </div>
                <div class="modal-footer">
                    <a href="#!" class="modal-action modal-close btn-flat">Ok</a>
                </div>
            </div>';
    }
    
    include("_footer.html");
    
    //Script para abrir el modal de error
    echo '<script type="text/javascript">
    window.onload = function() {
        if (document.getElementById("modalError")) {
            $("#modalError").modal("open");
        }
    }
    </script>';
?>