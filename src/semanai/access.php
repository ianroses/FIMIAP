<?php


include_once("util.php");
    $users=obtenerUsuarios();
    $status=0;
  
    while( $renglon=mysqli_fetch_assoc($users)){
        if ($renglon["ID_USER"]==$_POST["ID_USER"] && $renglon["PASSWORD"]==$_POST["PASSWORD"]){
           // include("_win.html");
                //echo $renglon["ID_USER"].$_POST["ID_USER"]. $renglon["PASSWORD"].$_POST["PASSWORD"];

            $status=1;
            break;
        }
        
                     //   echo "r: ".$renglon["ID_USER"]." p: ".$_POST["ID_USER"]. " r:".$renglon["PASSWORD"]." p:".$_POST["PASSWORD"];

    }
    
    if ($status==1){
        session_start();
        $_SESSION["ax"]=true;
        header("Location:list.php");
    }
    else { 
            include("_header.html");
            echo "<h5 style: 'text-align: center'>Sesión No válida</h5>";
            include_once("_main_view.html");
            include("_footer.html");
    }


/*
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
*/
?>