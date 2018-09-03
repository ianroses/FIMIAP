<?php 
    session_start();
    include_once("util.php");
    
    if (checkSession()) {
        
        include("_head.html");
        include ("_headerAdmin.html");
        include ("_consulta_alumna.html");
        
        
        if($_POST["first_name"] != "" && $_POST["last_name"] != ""){
            echo "<script type='text/javascript'>console.log( 'Ambas formas llenas');</script>";
            echo "<script type='text/javascript'>console.log( 'First name');</script>";
    
             $tabla.='<td>' .$row["Nombre"].'</td>';
           //output data of each row
            $tabla = "<div class='content administrativo'> <fieldset><p>Alumnas </p>  <table class='bordered highlight  '>";
            $tabla.='<thead>
                    <tr>
                    <th data-field="nombre"> Nombre</th>
                    <th data-field="apellido"> Apellido</th>
                    <th data-field="status">Status</th>
                    <th data-field="modificar">Modificar</th>
                    <th data-field="eliminar">Eliminar</th>             
                    </tr>
                </thead>';
           $tabla.= consultarAlumnoNombre($_POST["first_name"]);
           $tabla.= "</table></fieldset><br></div>";
            
            echo $tabla;
        }
            
        
        if($_POST["first_name"] != "" && $_POST["last_name"] == ""){
                    echo "<script type='text/javascript'>console.log( 'First name');</script>";
    
             $tabla.='<td>' .$row["Nombre"].'</td>';
           //output data of each row
            $tabla = "<div class='content administrativo'> <fieldset><p>Alumnas </p>  <table class='bordered highlight  '>";
            $tabla.='<thead>
                    <tr>
                    <th data-field="nombre"> Nombre</th>
                    <th data-field="apellido"> Apellido</th>
                    <th data-field="status">Status</th>
                    <th data-field="modificar">Modificar</th>
                    <th data-field="eliminar">Eliminar</th>             
                    </tr>
                </thead>';
           $tabla.= consultarAlumnoNombre($_POST["first_name"]);
           $tabla.= "</table></fieldset><br></div>";
            
            echo $tabla;
            }
            
            if($_POST["last_name"] != "" && $_POST["first_name"] == ""){
                    echo "<script type='text/javascript'>console.log( 'LAST name');</script>";
    
            $tabla.='<td>' .$row["Nombre"].'</td>';
           
            $tabla = "<div class='content administrativo'> <fieldset><p>Alumnas </p>  <table class='bordered highlight  '>";
            $tabla.='<thead>
                    <tr>
                    <th data-field="nombre"> Nombre</th>
                    <th data-field="apellido"> Apellido</th>
                    <th data-field="status">Status</th>
                    <th data-field="modificar">Modificar</th>
                    <th data-field="eliminar">Eliminar</th>
                    </tr>
                </thead>';
           $tabla.= consultarAlumnoApellido($_POST["last_name"]);
           $tabla.= "</table></fieldset><br></div>";
            
            echo $tabla;
        }
        include("_footer.html");
    } else {
        header("Location:admin.php?sessionexpired=true");
    }
?>