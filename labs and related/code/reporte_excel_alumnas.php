<?php

    session_start();
    include_once("util.php");
    if (checkSession()) {
    include("_head.html");
    header('Content-type: application/vnd.ms-excel');
    header("Content-Disposition: attachment; filename=ArchivoGenerado.xls");
    header("Pragma: no-cache");
    header("Expires: 0");

    echo tablaInfoTotal();

    }else{
        header("Location:admin.php?sessionexpired=true");
    }

?>
