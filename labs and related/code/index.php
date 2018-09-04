<?php
    include("util.php");
    
    $selected = nosotros;
    $footer = yes;
    
    
    $misio = recuperarInformacion(1);
    $mision = $misio["descripcion"];
    
    $visio = recuperarInformacion(2);
    $vision = $visio["descripcion"];
    
    $objetiv = recuperarInformacion(3);
    $objetivos = $objetiv["descripcion"];
    
    $quienes = recuperarInformacion(0);
    $somos = $quienes["descripcion"];
    
    
    include("_head.html");
    
    include("_header.html");
    
    include("_main.html");
    
    include("_footer.html");

?>