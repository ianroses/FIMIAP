

<?php
    include_once("util.php");
    $users=obtenerUsuarios();
    $status=0;
    while($renglon=mysqli_fetch_assoc($users)){
        if ($renglon["nombre_usuario"]==$_POST["usuario"] && $renglon["contrasena"]==$_POST[contrasena]){
           // include("_win.html");
            $status=1;
            break;
        }
    }
    
    if ($status==1){
        session_start();
        $_SESSION["ax"]=true;
        header("Location:welcome.php");
    }
    else { 
            include("_head.html");
            include("_header.html");
            echo "<h5 style: 'text-align: center'>Sesión No válida</h5>";
            include("_admin.html");
            include("_footer.html");
    }

?>

