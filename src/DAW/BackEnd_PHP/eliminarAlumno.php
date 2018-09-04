<?php
    session_start();
    include_once('util.php');
    if (checkSession()) {
        if(eliminarAlumno($_GET["id"])){
            header("Location:complete.php?palabra=Eliminación");
        }else{
           header("Location:complete.php?palabra=ERRORERRORERRORERRORERRORERRORERRORERRORERROR"); 
        } 
    } else {
        header("Location:admin.php?sessionexpried=true");
    }
?>