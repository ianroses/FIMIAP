<?php


    function connectDB(){
        $servidor="localhost";
        $username="ramonromerotec";
        $password="";
        $nombreBD="semanai";
        
        $conexion=mysqli_connect($servidor,$username,$password, $nombreBD);
        if (!$conexion){
            die ("Conexión fallida: " . mysqli_connect_error());
        }
        
        return $conexion;
    }
    
    
    function closeDB($conectar){
        mysqli_close($conectar);
    }

    function obtenerUsuarios () {
         $conecta=connectDB();
         $sql = "SELECT ID_USER, PASSWORD FROM USERS"; 
         $consulta= mysqli_query($conecta,$sql);
         closeDB($conecta);
         return $consulta;
    }
    
    function reporteAcceso () {
         $conecta=connectDB();
         $sql = "SELECT *  FROM REGISTROS"; 
         $consulta= mysqli_query($conecta,$sql);
         closeDB($conecta);
         return $consulta;
    }
    
    
     function obtenerRegistrosFallidos () {
         $conecta=connectDB();
         $sql = 'SELECT HoraAcceso, Info, Numeros, gapMin FROM Registros  WHERE Info="SYSTEM FAILURE" Order by HoraAcceso desc'; 
         $consulta= mysqli_query($conecta,$sql);
         closeDB($conecta);
         return $consulta;
    }
    
    function totSucc () {
         $conecta=connectDB();
         $sql = 'SELECT count(Info) FROM Registros WHERE Info="SUCCESS"'; 
         $consulta= mysqli_query($conecta,$sql);
         closeDB($conecta);
         return $consulta;
    }

function totNotSucc () {
         $conecta=connectDB();
         $sql = 'SELECT count(Info) FROM Registros WHERE Info="SYSTEM FAILURE"'; 
         $consulta= mysqli_query($conecta,$sql);
         closeDB($conecta);
         return $consulta;
    }
    
    
 function registrarGastos($datetime, $info, $num, $p) {
        $mysql = connectDB();
        $query = 'INSERT INTO Registros (HoraAcceso,Info, Numeros, gapMin) VALUES (?,?,?,?)';
        if (!($statement = $mysql->prepare($query))) {
            //return false;
            die("Preparation failed: (" . $mysql->errno . ") " . $mysql->error);
        }
        $user = 'admin1';
		if (!$statement->bind_param("sssi",$datetime, $info, $num, $p)) {
            die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error);
            return false;
        }
		if (!$statement->execute()) {
            die("Execution failed: (" . $statement->errno . ") " . $statement->error);
            return false;
        } 
         else {
                     closeDB($mysql);
            return true;
        }

    }






function obtenerIn() {
     $conecta=connectDB();
     $sql = "SELECT Numeros FROM Registros";
     $consulta= mysqli_query($conecta,$sql);
     closeDB($conecta);
     return $consulta;
}



?>