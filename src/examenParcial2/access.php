<?php
include("_header.html");
    session_start();


if(isset($_SESSION["inicio"])){
    echo 'Bienvenido de Nuevo';

}
else{
    $_SESSION["inicio"]=time();
    echo 'Bienvenido';

}
    include("_galery.html");
    
    include("_footer.html");
?>