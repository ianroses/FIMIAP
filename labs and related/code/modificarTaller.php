<?php 
    session_start();
    include_once("util.php");
    if (checkSession()) {
        //id que obtengo desde la llamada a modificarTaller.php en el archivo util.php
        $id = $_GET["id"];
        
        //recupero el arreglo de la consulta de la tabla Taller
        $infoTaller=recuperarInformacionTaller($id);
        
        //Dar formato a la fecha char(10):
        //$infoPersonal["Fecha_de_nacimiento"]= gmDate("Y-m-d");
        //string date_format( DateTimeInterface $infoPersonal["Fecha_de_nacimiento"], string "d-m-y" );
        //echo date_format($date, 'Y-m-d H:i:s');
        //$date = date_create($infoPersonal["Fecha_de_nacimiento"]);
        //date_format($date, 'Y-m-d');
        //var_dump($date);
    
        include("_head.html");
        include ("_headerAdmin.html");
        include ("_modificarTaller.html");
        include("_footer.html");
    } else {
        header("Location:admin.php?sessionexpired=true");
    }
?>