<?php
session_start();
session_destroy();

    include("_header.html");

    
echo "<h4>Sesion cerrada con exito</h4>";
    include("_main_view.html");
    
    include("_footer.html");
?>