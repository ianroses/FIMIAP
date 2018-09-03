<?php
    include_once("../util.php");
    if (isset($_GET["idTaller"])) {
        $idTaller = $_GET["idTaller"];
        $idAlumna = $_GET["idAlumna"];
        $monto =FALSE;
        if (isset($_GET["monto"])){
            $monto = $_GET["monto"];
        }
        inscripcionTaller($idTaller,$idAlumna,$monto);
    }
?>