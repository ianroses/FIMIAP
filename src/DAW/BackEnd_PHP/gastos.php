<?php 
    
    //$selected = gastos;
    session_start();
    include_once("util.php");
    if (checkSession()) {
        include("_head.html");
        include("_headerAdmin.html");
        include ("_gastos.html");
        
        if(isset($_POST["FI"])&&isset($_POST["FF"])){
            //var_dump($_POST["FI"]);
            //var_dump($_POST["FF"]);
            $fi=$_POST["FI"];
            $ff=$_POST["FF"];

            /*echo '<div class="content administrativo">
                <div class="row col s12 ">
                <br><button type="button" onClick="descargaPDFgastos('.$fi.', '.$ff.')" class="btn right waves-effect waves-light blueFim white-text enviar_y_guardar">
                Descargar PDF por Fecha
                </button>
                </div>
                </div>';*/
            echo '<div class="content administrativo">
                <div class="row col s12 ">
                <br><button type="button" onClick="descargaPDFTodo()" class="btn right waves-effect waves-light blueFim white-text enviar_y_guardar">
                Descargar PDF Total
                </button>
                
                </div>
                </div>'; 
        }else{
                echo '<div class="content administrativo">
                <div class="row col s12 ">
                <br><button type="button" onClick="descargaPDFTodo()" class="btn right waves-effect waves-light blueFim white-text enviar_y_guardar">
                Descargar PDF Total
                </button>
                
                
                </div>
                </div>'; 
        }
        
        echo '<div class="content administrativo">
            <table class=" bordered striped centered">
                <thead>
                  <tr>
                      <th data-field="Descripcion">Descripción</th>
                      <th data-field="monto">Monto</th>
                      <th data-field="fecha">Fecha</th>
                  </tr>
                </thead>
                <tbody>';
        
        if(isset($_POST["FI"])&&isset($_POST["FF"])){
            echo '<div class="content administrativo"><h2 style = "text-align: right"> Gastos</h2>';
        
            $gastos=consultarGastoPorFecha($_POST["FI"], $_POST["FF"]);
            if(mysqli_num_rows($gastos)>0){
                while($renglon=mysqli_fetch_assoc($gastos)){
                    echo "<tr>";
                        echo "<td>". $renglon["descripcion"] . "</td>";
                        echo "<td>". $renglon["monto"]. "</td>";
                        echo "<td>". $renglon["fecha"]. "</td>";
                    echo "</tr>";
                    
                }
                echo '</tbody>';
                echo '</table>';
                
                
            }
            
            $total=consultarTot($_POST["FI"], $_POST["FF"]);
            
            if(mysqli_num_rows($total)>0){
                while($renglon=mysqli_fetch_assoc($total)){
                    echo '<br><br><p style="text-align: right;"> TOTAL: '. $renglon["sum(monto)"] . "</p>" ;
                }
            }
        }
        
        else{
            echo '<div class="content administrativo"><h2 style = "text-align: right">Ultimos Gastos</h2>';
            $registros=ultimosGastos();
            if(mysqli_num_rows($registros)>0){
                while($renglon=mysqli_fetch_assoc($registros)){
                    echo "<tr>";
                    echo "<td>". $renglon["descripcion"] . "</td>";
                    echo "<td>". $renglon["monto"]. "</td>";
                    echo "<td>". $renglon["fecha"]. "</td>";
                    echo "</tr>";
                }
                echo '</tbody>';
                echo '</table>';
            }            
        }
        
        echo '</div>';
        echo'</div>';
        include("_footer.html");
        
    } else {
        header("Location:admin.php?sessionexpired=true");
    }

?>