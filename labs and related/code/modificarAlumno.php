<?php 
    session_start();
    include_once("util.php");
    if (checkSession()) {
        //id que obtengo desde la llamada a modificarAlumno.php en el archivo util.php
        $id = $_GET["id"];
        
        //recupero los arreglos de las consultas de las 5 tablas
        $infoPersonal=recuperarInformacionPersonal($id);
        $infoAcademica=recuperarHistorialAcademico($id);
        $infoLaboral=recuperarInfoLaboral($id);
        $infoHerramientas=recuperarHerramientas($id);
        $infoSituacion=recuperarSituacion($id);
        
        //Dar formato a la fecha char(10):
        //$infoPersonal["Fecha_de_nacimiento"]= gmDate("Y-m-d");
        //string date_format( DateTimeInterface $infoPersonal["Fecha_de_nacimiento"], string "d-m-y" );
        //echo date_format($date, 'Y-m-d H:i:s');
        //$date = date_create($infoPersonal["Fecha_de_nacimiento"]);
        //date_format($date, 'Y-m-d');
        //var_dump($date);
    
        include("_head.html");
        include ("_headerAdmin.html");
        include ("_mod_alumna1.html");
        include("_footer.html");
    } else {
        header("Location:admin.php?sessionexpired=true");
    }
?>