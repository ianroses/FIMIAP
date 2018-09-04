<?php
    include("_head.html");
    if($_GET["palabra"]=="Contacto"){
        include("_header.html");
    } else {
        include("_headerAdmin.html");
    }
    
    echo '<br> <br> <br><div class="content administrtivo" id="container"><h3 class="center">¡'. $_GET["palabra"] .' realizada con éxito!<h3>
        <div class="center"> <img src="Images/fimLogo.jpg"></div></div>';
        
    include("_footer.html");
?>