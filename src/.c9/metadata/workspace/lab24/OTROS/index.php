{"filter":false,"title":"index.php","tooltip":"/lab24/OTROS/index.php","undoManager":{"mark":-1,"position":-1,"stack":[[{"start":{"row":2,"column":4},"end":{"row":27,"column":0},"action":"remove","lines":["include_once(\"util.php\");","    $users=getUSERS();","    $status=0;","  ","    while( $renglon=mysqli_fetch_assoc($users)){","        if ($renglon[\"ID_USER\"]==$_POST[\"ID_USER\"] && $renglon[\"PASSWORD\"]==$_POST[\"PASSWORD\"]){","           // include(\"_win.html\");","                echo $renglon[\"ID_USER\"].$_POST[\"ID_USER\"]. $renglon[\"PASSWORD\"].$_POST[\"PASSWORD\"];","","            $status=1;","            break;","        }","    }","    ","    if ($status==1){","        session_start();","        $_SESSION[\"ax\"]=true;","        header(\"Location:list.php\");","    }","    else { ","            include(\"_header.html\");","            echo \"<h5 style: 'text-align: center'>Sesión No válida</h5>\";","            include_once(\"_view.html\");","            include(\"_footer.html\");","    }",""],"id":2}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":2,"column":4},"end":{"row":27,"column":0},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1506450451467,"hash":"e689ab51f992711526ca35b384f8acf2d73c21c8"}