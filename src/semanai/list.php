<?php
session_start();


if(isset($_SESSION["ax"])){
    include_once("util.php");

echo '<h3><a href="logout.php">Log Out</a></h3>';


                 
                    
    
    $registros=reporteAcceso();
    if(mysqli_num_rows($registros)>0){
        
         echo '<table class="striped centered highlight responsive-table">
        <thead>
          <tr>
          
           <td>ID</td>
    <td>NOMBRE</td>
    <td>FECHA</td>
    <td>ACCESO</td>
             


          </tr>
        </thead>
                <tbody>';
        
        while($renglon=mysqli_fetch_assoc($registros)){
            
            
           

          
            echo "<tr>";
            
  echo "<td>".    $renglon["ID_PERSONA"]  ."</td>";
  echo "<td>".    $renglon["NOMBRE_PERSONA"]  ."</td>";
  echo "<td>".   $renglon["FECHA_INTERACCION"] ."</td>";
  echo "<td>";
  
  
  
  if ($renglon["ACCESS"]==1){
            echo "acceso permitido";
        }
        else{
                        echo "acceso denegado";

        }
    
echo "</td>";
    
  
      
        
    
            echo "</tr>";
            
            
            
            
            
            
            
            
            
            
            
            
         
    
        }
        echo '</tbody>';
            echo '</table>';
            
            
        
    }




    
}else{
    echo "<h3>Sesion Expirada</h3>";

    header("Location:index.php");

}

    
?>