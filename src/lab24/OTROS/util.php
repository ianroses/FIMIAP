<?php

    function connectDB(){
        $servidor="localhost";
        $username="ramonromerotec";
        $password="";
        $nombreBD="semanai";
        
        $conexion=mysqli_connect($servidor,$username,$password, $nombreBD);
        if (!$conexion){
            die ("ConexiÃ³n fallida: " . mysqli_connect_error());
        }
        
        return $conexion;
    }
    
    
    function closeDB($conectar){
        mysqli_close($conectar);
    }

     function getUSERS () {
         $conecta=connectDB();
         $sql = "SELECT * FROM USERS"; //ESTO 
         $consulta= mysqli_query($conecta,$sql);
         closeDB($conecta);
         return $consulta;
    }
?>