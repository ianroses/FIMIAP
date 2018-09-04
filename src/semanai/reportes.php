<?php

    include_once("util.php");
    
    
    
    
    
          
        echo '<h4>Total Exitos</h4>';
        
        
        
        
        
        $tE=totSucc();
  $j=mysqli_fetch_assoc($tE);
                echo "<h5>". $j['count(Info)'] . "</h5>";

    
        
        
        
        
        

        echo '<br>';
          echo '<h4>Total NO Exitos</h4>';
        
        
        
        
        
        $tE=totNotSucc();
  $j=mysqli_fetch_assoc($tE);
                echo "<h5>". $j['count(Info)'] . "</h5>";

    
    
              echo '<h4>Todos los Registros</h4>';

    
    
    
    $registros=obtenerRegistros();
    if(mysqli_num_rows($registros)>0){
        
         echo '<table class="striped centered highlight responsive-table">
        <thead>
          <tr>
              <th data-field="HoraAcceso">Hora de Intento</th>
              <th data-field="Info">Mensaje</th>
                            <th data-field="Numeros">Input</th>


          </tr>
        </thead>
                <tbody>';
        
        while($renglon=mysqli_fetch_assoc($registros)){
            
            
           

          
            echo "<tr>";
            
                echo "<td>". $renglon["HoraAcceso"] . "</td>";
                echo "<td>". $renglon["Info"]. "</td>";
                                echo "<td>". $renglon["Numeros"]. "</td>";


    
            echo "</tr>";
            
            
            
            
            
            
            
            
            
            
            
            
         
    
        }
        echo '</tbody>';
            echo '</table>';
            
            
        
    }
        
        
        
        
        ///
       
                    echo '<h4>Todos los Registros Fallidos</h4>';
                    
                    
                    
                    
    
    $registros=obtenerRegistrosFallidos();
    if(mysqli_num_rows($registros)>0){
        
         echo '<table class="striped centered highlight responsive-table">
        <thead>
          <tr>
              <th data-field="HoraAcceso">Hora de Intento</th>
              <th data-field="Info">Mensaje</th>
                            <th data-field="Numeros">Input</th>


          </tr>
        </thead>
                <tbody>';
        
        while($renglon=mysqli_fetch_assoc($registros)){
            
            
           

          
            echo "<tr>";
            
                echo "<td>". $renglon["HoraAcceso"] . "</td>";
                echo "<td>". $renglon["Info"]. "</td>";
                                echo "<td>". $renglon["Numeros"]. "</td>";


    
            echo "</tr>";
            
            
            
            
            
            
            
            
            
            
            
            
         
    
        }
        echo '</tbody>';
            echo '</table>';
            
            
        
    }
        

?>