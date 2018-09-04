<?php 
    session_start();
    include_once("util.php");
    if (checkSession()) {
        if(!isset($_POST["idTaller"])){
            $id = $_GET["id"];
        }else{
            $id = $_POST["idTaller"];
        }
        if($id != ""){
            include("_head.html");
            include ("_headerAdmin.html");
            if(isset($_POST["fechaInicial"], $_POST["fechaFinal"])){
                $inscritas = alumnasInscritasFecha($id, $_POST["fechaInicial"], $_POST["fechaFinal"]);
                include ("_consulta_inscritas.html");
                include("_footer.html");
            }else{
                $inscritas = alumnasInscritas($id);
                include ("_consulta_inscritas.html");
                include("_footer.html");
            }
        }else{
            header("Location:taller.php");
        }
    }else{
       header("Location:admin.php?sessionexpired=true");
    }
?>