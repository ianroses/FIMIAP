<?php
include_once("util.php");
$tiempoin=date('Y-m-d H:i:s');
    session_start();

$pasado=$tiempoin - $_SESSION["inicio"] ;

if( $pasado< 108*60 && "4 8 15 16 23 42" == $_POST["numeros"]){
    
    registrarGastos($tiempoin, "SUCCESS", $_POST["numeros"], $pasodo/60) ;
    
    header('Location: access.php');
     

    
}
else{
        registrarGastos($tiempoin, "SYSTEM FAILURE", $_POST["numeros"], $pasado/60) ;
        
        header('Location: access.php');


}


//$pasado< 108*60 && 




?>