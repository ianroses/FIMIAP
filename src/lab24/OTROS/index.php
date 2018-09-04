
<?php
    include_once("util.php");
    $users=getUSERS();
    $status=0;
  
    while( $renglon=mysqli_fetch_assoc($users)){
        if ($renglon["ID_USER"]==$_POST["ID_USER"] && $renglon["PASSWORD"]==$_POST["PASSWORD"]){
           // include("_win.html");
                echo $renglon["ID_USER"].$_POST["ID_USER"]. $renglon["PASSWORD"].$_POST["PASSWORD"];

            $status=1;
            break;
        }
    }
    
    if ($status==1){
        session_start();
        $_SESSION["ax"]=true;
        header("Location:list.php");
    }
    else { 
            include("_header.html");
            echo "<h5 style: 'text-align: center'>Sesión No válida</h5>";
            include_once("_view.html");
            include("_footer.html");
    }

?>


