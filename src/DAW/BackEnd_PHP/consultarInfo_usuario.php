<?php
    session_start();
    include_once("util.php");
    if (checkSession()) {
        include("_head.html");
        include ("_headerAdmin.html");
        $idUsuario = $_GET["id"];
        echo "<div class='content administrativo'> <h1> Información de usuario </h1> </div>";
        
        if($_GET["id"] != ""){
        
        /*-------------Mostrar tabla de información---------*/
        $tabla='';
            $tabla = "<div class='content administrativo'> 
            <div style='display: block; overflow-x: auto; white-space: nowrap;'>
            <fieldset> <table class='bordered striped centered  '>";
            $tabla.='<thead>
                    <tr>
                    <th data-field=""> Usuario </th>
                    <th data-field="">Cnstraseña</th>
                    <th data-field=""> Nombre </th>
                    <th data-field="">Apellido</th>
                    <th data-field="">Tel. Casa</th>
                    <th data-field="">Celular</th>
                    <th data-field="">Nacimiento</th>
                    <th data-field="">Calle y número</th>
                    <th data-field="">Colonia</th>
                    <th data-field="">Código Postal</th>
                    <th data-field="">Municipio</th>
                    <th data-field="">Email</th>
                    </tr>
                </thead>
                <tbody>';
    
            $tabla.= tablaInfoUsuarios($_GET["id"]);
            $tabla.= "</tbody></table></div></fieldset><br></div>";
            echo $tabla;
        }
        include("_footer.html");
    } else {
        header("Location:admin.php?sessionexpired=true");
    }

?>