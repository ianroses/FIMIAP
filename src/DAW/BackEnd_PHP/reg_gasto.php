<?php 
    
    //$selected = gastos;
    session_start();
    include_once("util.php");
    if (checkSession()) {
        
      
        
        if(isset($_POST["monto"], $_POST["descripcion"], $_POST["fecha"])){
            
              
         if($_POST["mov"]=="in"){
             if($_POST["monto"]<0){
                 $_POST["monto"]=$_POST["monto"]*-1;
             }
             
        }else if($_POST["mov"]=="out"){
            if($_POST["monto"]>0){
                 $_POST["monto"]=$_POST["monto"]*-1;
             }
        }
        
            
            
            if(registrarGastos($_POST["descripcion"], $_POST["monto"] , $_POST["fecha"])){
                include("_head.html"); 
                include("_headerAdmin.html");
                include("_gastos.html");
                echo '<div id="modalError" class="modal">
                <div class="modal-content">
                    <h4>Éxito en registro</h4>
                    <h5>El gasto ha sido exitosamente registrado.</h5>
                </div>
                <div class="modal-footer">
                    <a href="gastos.php" class="modal-action modal-close btn-flat">Ok</a>
                </div>
            </div>';
        
        include("_footer.html");
        echo '<script type="text/javascript">
        window.onload = function() {
            if (document.getElementById("modalError")) {
                $("#modalError").modal("open");
            }
        }
        </script>';
                
            }else{
                include("_head.html"); 
                include("_headerAdmin.html");
                echo '<div id="modalError" class="modal">
                                <div class="modal-content">
                                    <h4>Error en registro</h4>
                                    <h5>Error al registrar gasto.</h5>
                                </div>
                                <div class="modal-footer">
                                    <a href="#!" class="modal-action modal-close btn-flat">Ok</a>
                                </div>
                            </div>';
                include("_footer.html");
                echo '<script type="text/javascript">
                window.onload = function() {
                    if (document.getElementById("modalError")) {
                        $("#modalError").modal("open");
                    }
                }
                </script>';
            }
            
        }else{
            include("_head.html");
            include ("_headerAdmin.html");
            include ("_gastos.html");
            
            echo '<div id="modalError" class="modal">
                    <div class="modal-content">
                        <h4>Error en registro</h4>
                        <h5>Es necesario llenar todos los campos de información.</h5>
                    </div>
                    <div class="modal-footer">
                        <a href="#!" class="modal-action modal-close btn-flat">Ok</a>
                    </div>
                </div>';
            
            include("_footer.html");
            echo '<script type="text/javascript">
            window.onload = function() {
                if (document.getElementById("modalError")) {
                    $("#modalError").modal("open");
                }
            }
            </script>';
            }

    } else {
        header("Location:admin.php?sessionexpired=true");
    }
?>