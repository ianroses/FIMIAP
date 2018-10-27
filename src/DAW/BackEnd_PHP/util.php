<?php

/*
    UTIL PHP ORGANIZACIÃ“N:
        
        BASE DE DATOS
        GASTOS
        DONCACIONES
        TALLER
        USUARIOS 
        NOTICIAS
        ALUMNOS
        INFORMACIÃ“N INST.
        VALIDACION
        
*/

 

/*
 _________________________________________ BASE DE DATOS _________________________________________ 
*/


    function connectDB(){
        $servidor="localhost";
        $username="ramonromerotec";
        $password="";
        $nombreBD="FIMQRO";
        
        $conexion=mysqli_connect($servidor,$username,$password, $nombreBD);
        if (!$conexion){
            die ("ConexiÃ³n fallida: " . mysqli_connect_error());
        }
        
        return $conexion;
    }
    
    
    function closeDB($conectar){
        mysqli_close($conectar);
    }


/*
 _________________________________________ GASTOS _________________________________________ 
*/

    function registrarGastos($descripcion, $monto , $fecha) {
        $mysql = connectDB();
        $query = 'INSERT INTO Gastos (descripcion,monto,fecha) VALUES (?,?,?)';
        if (!($statement = $mysql->prepare($query))) {
            //return false;
            die("Preparation failed: (" . $mysql->errno . ") " . $mysql->error);
        }
        $user = $_SESSION["usuario"];
		if (!$statement->bind_param("sds",$descripcion, $monto , $fecha)) {
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
    
    
       
     function consultarGastoPorFecha($FI,$FF){
         $conecta=connectDB();
         $sql = 'SELECT ID_Gastos, descripcion, monto, fecha
                FROM Gastos
                WHERE fecha
                BETWEEN "' . $FI . '" AND "' . $FF . '" ORDER BY fecha DESC'; 
         $consulta= mysqli_query($conecta,$sql);
         echo "";
         closeDB($conecta);
         return $consulta;
     }
     
     
       function consultarTot($FI,$FF){
         $conecta=connectDB();
         $sql = 'SELECT sum(monto) FROM Gastos
         WHERE fecha
         BETWEEN "' . $FI . '" AND "' . $FF . '" ORDER BY fecha DESC'; 
         $consulta= mysqli_query($conecta,$sql);
         closeDB($conecta);
         return $consulta;
     }
     
     function consultarTotal(){
         $conecta=connectDB();
         $sql = 'SELECT sum(monto) FROM Gastos
                ORDER BY fecha DESC'; 
         $consulta= mysqli_query($conecta,$sql);
         closeDB($conecta);
         return $consulta;
     }
     
     function ultimosGastos(){
         $conecta=connectDB();
         $sql = 'SELECT * FROM Gastos ORDER BY fecha DESC LIMIT 10  '; 
         $consulta= mysqli_query($conecta,$sql);
         closeDB($conecta);
         return $consulta;
     }
    
    function ultimosGastosTotales(){
        $conecta=connectDB();
         $sql = 'SELECT * FROM Gastos ORDER BY fecha DESC'; 
         $consulta= mysqli_query($conecta,$sql);
         closeDB($conecta);
         return $consulta;
    }
    
/*
 _________________________________________ DONACIONES _________________________________________ 
*/



/*
 _________________________________________ TALLER _________________________________________ 
*/

   
    function registrarTaller(
        $nombre_taller,
		$fecha_taller,
		$costo_taller,
		$descripcion_taller
        ) {
        $mysql = connectDB();
        $query = 'INSERT INTO Taller (
            nombre_taller, 
            horarios,
            costo,
            descripcion
            ) VALUES (?,?,?,?)';
        if (!($statement = $mysql->prepare($query))) {
            //return false;
            die("Preparation failed: (" . $mysql->errno . ") " . $mysql->error);
        }
        $user = $_SESSION["usuario"];
		if (!$statement->bind_param("ssds",
		$nombre_taller,
		$fecha_taller,
		$costo_taller,
		$descripcion_taller
	
        )) {
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
    
    function listaTalleres() {
        $mysql = connectDB();
        $query = "SELECT * FROM Taller ORDER By nombre_taller ASC";
        $result = $mysql -> query($query);
        $tabla = '';
            while($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                $tabla.='<tr>';
                $tabla.='<td onclick="mostrarInscritas('.$row["ID_Taller"].')">'.$row["nombre_taller"].'</td>';
                $tabla.='<td onclick="mostrarInscritas('.$row["ID_Taller"].')">'.$row["horarios"].'</td>';
                $tabla.='<td onclick="mostrarInscritas('.$row["ID_Taller"].')">'.$row["costo"].'</td>';
                $tabla.='<td onclick="mostrarInscritas('.$row["ID_Taller"].')">'.$row["descripcion"].'</td>';
                $tabla.='<td> <a href="modificarTaller.php?id='.$row["ID_Taller"].'"> <i class="material-icons">mode_edit</i> </a> </td>';
                $tabla.='<td onclick="confirmarEliminacionTaller('. $row["ID_Taller"]. ')"> <a href="#"> <i class="material-icons">delete</i> </a></td>';
                $tabla.='</tr>';
            }
        closeDB($mysql);
		return $tabla;
    }
    
    
    function eliminarTaller($id) {
        $mysql = connectDB();
        $query = 'DELETE From Taller WHERE ID_Taller ='.$id;
        mysqli_query($mysql, $query);
        closeDB($mysql);
    }
    
    
     function listaTalleresShow() {
        $mysql = connectDB();
        $query = "SELECT * FROM Taller";
        $result = $mysql -> query($query);
        $tabla = '<table class="striped highlight centered  ">';
         $tabla.='<thead><tr>';
                $tabla.='<th>Actividad</th>';
                $tabla.='<th>Horarios</th>';
                $tabla.='<th>Costo</th>';
                $tabla.='<th>DescripciÃ³n</th>';
            $tabla.='</tr></thead>';

                    
            while($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                $tabla.='<tr>';
                $tabla.='<td>' . $row["nombre_taller"].'</td>';
                $tabla.='<td>' . $row["horarios"].'</td>';
                $tabla.='<td>' . $row["costo"].'</td>';
                $tabla.='<td>' . $row["descripcion"].'</td>';
                    $tabla.='</tr>';
            }
        $tabla .= '</table>';
        closeDB($mysql);
		return $tabla;
    }
    
   
   function consultarTaller(){
         $conecta=connectDB();
         $sql = 'SELECT * FROM Taller '; 
         $consulta= mysqli_query($conecta,$sql);
         closeDB($conecta);
         return $consulta;
       
   }
   
   function recuperarInformacionTaller($id){
            $conectar = connectDB();
            $query = 'SELECT * FROM Taller WHERE ID_Taller='.$id;
            $result = $conectar -> query($query);
            if(!$result){
                return "";
            }
            $row = mysqli_fetch_array($result, MYSQLI_BOTH);
            closeDB($conectar);
            return $row;
    }

    function modificarInfoTaller($id, $nombre, $costo, $horario, $descripcion){
          $mysql = connectDB();
         
            $query = 'UPDATE Taller
                SET nombre_taller ='."'".$nombre."'".', 
                horarios ='."'".$costo."'".',
                costo ='."'".$horario."'".',
                descripcion ='."'".$descripcion."'".'
                WHERE ID_Taller ='.$id;
            //var_dump($query);
       
            if (!($statement = $mysql->prepare($query)) ) {
                //return false;
                die("Preparation in table Update Taller failed: (" . $mysql->errno . ") " . $mysql->error);
            }
            
    		if (!$statement->execute()) {
                die("Update execution failed: (" . $statement->errno . ") " . $statement->error);
                closeDB($mysql);
                return false;
            }else{
            closeDB($mysql);
            return true;
            }
    }
    
    //regresa Talleres en los que estÃ¡ inscrita la alumna con id $id
    function listaTalleresDeAlumna($id){
        $mysql = connectDB();
        $query = 'SELECT t.ID_Taller, t.nombre_taller FROM Taller t, Inscriben i WHERE i.ID_Alumno='.$id.' AND i.ID_Taller = t.ID_Taller ORDER BY nombre_taller ASC';
        $result = $mysql -> query($query);
        $lista = "";
        while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
            $lista.='<li class="collection-item" onclick="mostrarInfoTaller('.$row["ID_Taller"].')">'.$row["nombre_taller"].'</li>';
        }
        closeDB($mysql);
        return $lista;
    }
    
    //regresa Talleres que estÃ¡n disponibles para la alumna con id $id
    function listaTalleresDisponibles($id,$input) {
        $mysql = connectDB();
        $query = 'SELECT nombre_taller, ID_Taller FROM Taller WHERE ID_Taller NOT IN 
        (SELECT t.ID_Taller FROM Taller t, Inscriben i WHERE i.ID_Alumno='.$id.' 
        AND i.ID_Taller = t.ID_Taller) ORDER By nombre_taller ASC';
        $result = $mysql -> query($query);
        $lista = "";
        while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
            if ($input === ""){
                $lista.='<li class="collection-item" onclick="seleccionarTaller('.$row["ID_Taller"].')">'.$row["nombre_taller"].'</li>';
            } elseif (!(strpos(strtolower($row["nombre_taller"]), strtolower($input)) === FALSE)){
                $lista.='<li class="collection-item" onclick="seleccionarTaller('.$row["ID_Taller"].')">'.$row["nombre_taller"].'</li>';
            }
        }
        closeDB($mysql);
        return $lista;
    }
    
    //regresa la informaciÃ³n del Taller con id $id
    function infoTaller($id,$inscripcion) {
        $mysql = connectDB();
        $query = 'SELECT * FROM Taller WHERE ID_Taller='.$id;
        $result = $mysql -> query($query);
        $row = mysqli_fetch_array($result, MYSQLI_BOTH);
        $info = '<h5>'.$row["nombre_taller"].'</h5> <hr>';
        $info.= '<p>'. $row["descripcion"].'</p>';
        $info.='<p> Horarios: '.$row["horarios"]."</p>";
        $info.='<p> Costo: '.$row["costo"].'</p>';
        
        if ($inscripcion === TRUE) { // habilita botÃ³n para inscribir
            $info.= '<div class="row col s12">
                        <h5> Monto: </h5> 
                        <div id="msgError" hidden> Debes introducir una cantidad </div>
                    </div>
                    <div class="row col s12"> 
                        <input class="col s5" id="monto" type="number" placeholder=0.00>
                        <div class="col s3"> </div>
                        <button class="btn blueFim col s3" onclick="inscribirTaller('.$id.')"> Inscribir </button>
                    </div>';
        } else { //hablita botÃ³n para eliminar inscripciÃ³n
            $info.= '<button class="btn red col s3" onclick="eliminarInscripcionTaller('.$id.')"> Eliminar inscripciÃ³n </button>';
        }
        closeDB($mysql);
        return $info;
    }
    
    function inscripcionTaller($idTaller, $idAlumna, $monto) {
        $mysql = connectDB();
        if ($monto === FALSE) {
            $query = 'DELETE FROM Inscriben WHERE ID_Taller='.$idTaller.' AND ID_Alumno='.$idAlumna;
        } else {
            $fecha = date('Y-m-d');
            $query =  'INSERT INTO Inscriben(monto,fecha,ID_Alumno,ID_Taller)
            VALUES('.$monto.',"'.$fecha.'",'.$idAlumna.','.$idTaller.')';
        }
        $mysql -> query($query);
        closeDB();
    }
    
    //regresa Alumnas inscritas en Taller con id $id
    function alumnasInscritas($id){
        $mysql = connectDB();
        $query = 'SELECT a.Nombre, a.Apellidos, a.Estatus, i.fecha
                    FROM Inscriben i, Alumnos a
                    WHERE i.ID_Taller='.$id.' AND i.ID_Alumno = a.ID_Alumno
                    ORDER BY a.nombre ASC';
        $results = $mysql -> query($query);
        $tabla.='<thead>
                    <tr>
                    <th class="minWidth">Nombre(s)</th>
                    <th class="minWidth">Apellido(s)</th>
                    <th class="minWidth">Status</th>
                    <th class="minWidth">Fecha de inscripciÃ³n</th>
                    </tr>
                    </thead>
                    <tbody>';
     
        while($row = mysqli_fetch_array($results, MYSQLI_BOTH)) {
            $tabla.='<tr>';
            $tabla.='<td>' .$row["Nombre"].'</td>';
            $tabla.='<td>' .$row["Apellidos"].'</td>';
            $tabla.='<td>' .$row["Estatus"].'</td>';
            $tabla.='<td>' .$row["fecha"].'</td>';
            $tabla.='</tr>';
        }
            
        $tabla.= "</tbody>";
        closeDB($mysql);
        return $tabla;

    }
    
    /*Consulta alumnas inscritas por fecha*/
    function alumnasInscritasFecha($id, $fechaInicial, $fechaFinal){
        $mysql = connectDB();
        $query = 'SELECT a.Nombre, a.Apellidos, a.Estatus, i.fecha
                    FROM Inscriben i, Alumnos a
                    WHERE i.ID_Taller='.$id.' AND i.ID_Alumno = a.ID_Alumno
                    AND i.fecha BETWEEN "'.$fechaInicial.'" AND "'.$fechaFinal.'" 
                    ORDER BY fecha DESC, a.nombre ASC';
        $results = $mysql -> query($query);
        $tabla.='<thead>
                    <tr>
                    <th class="minWidth">Nombre(s)</th>
                    <th class="minWidth">Apellido(s)</th>
                    <th class="minWidth">Status</th>
                    <th class="minWidth">Fecha de inscripciÃ³n</th>
                    </tr>
                    </thead>
                    <tbody>';
     
        while($row = mysqli_fetch_array($results, MYSQLI_BOTH)) {
            $tabla.='<tr>';
            $tabla.='<td>' .$row["Nombre"].'</td>';
            $tabla.='<td>' .$row["Apellidos"].'</td>';
            $tabla.='<td>' .$row["Estatus"].'</td>';
            $tabla.='<td>' .$row["fecha"].'</td>';
            $tabla.='</tr>';
        }
            
        $tabla.= "</tbody>";
        closeDB($mysql);
        return $tabla;

    }
    
/*
 _________________________________________ USUARIOS _________________________________________ 
*/
    function obtenerUsuarios () {
         $conecta=connectDB();
         $sql = "SELECT nombre_usuario, contrasena FROM Usuarios "; //ESTO 
         $consulta= mysqli_query($conecta,$sql);
         closeDB($conecta);
         return $consulta;
    }

    
    function registrarUsuario(
                                $first_name, 
                                $last_name, 
                                $calle_numero,
                                $colonia,
                                $municipio_empleado,
                                $codigo_p,
                                $fecha_nac,
                                $icon_telephone,
                                $celular,
                                $tipo_empleado,
                                $email,
                                $password) {
        $mysql = connectDB();
        $query = 'INSERT INTO Usuarios(
            ID_ROL,
            nombre_usuario, 
            contrasena,
            nombre,
            apellidos,
            telefono_casa,
            fecha_nacimiento,
            telefono_celular,
            calle_numero,
            colonia,
            zip_code,
            municipio,
            email) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)';
        if (!($statement = $mysql->prepare($query))) {
            //return false;
            die("Preparation failed: (" . $mysql->errno . ") " . $mysql->error);
        }
        $user = $_SESSION["usuario"];
		if (!$statement->bind_param("isssssssssiss",
		$tipo_empleado,
		$email, 
		$password,
		$first_name, //$tipo_empleado
        $last_name, 
        $icon_telephone,
        $fecha_nac,
        $celular,
        $calle_numero,
        $colonia,
        $codigo_p,
        $municipio_empleado,
        $email
        )) {
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
    
    function listaUsuarios() {
        $mysql = connectDB();
        $query = "SELECT * FROM Usuarios ORDER BY apellidos DESC";
        $result = $mysql -> query($query);
        $tabla = '';
            while($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                $tabla.='<tr>';
                    $tabla.='<td onclick="mostrarUsuario('.$row["ID_Usuario"].')">' .$row["apellidos"].'</td>';
                    $tabla.='<td onclick="mostrarUsuario('.$row["ID_Usuario"].')">' .$row["nombre"].'</td>';
                    $tabla.= '<td onclick="mostrarUsuario('.$row["ID_Usuario"].')">' . $row["telefono_celular"] . '</td>';
                    $tabla.='<td> <a href="modificarUsuario.php?id='.$row["ID_Usuario"].'"><i class="material-icons">mode_edit</i></a> </td>';
                    $tabla.='<td onclick="confirmarEliminacionUsuario('. $row["ID_Usuario"]. ')"> <a href="#"><i class="material-icons">delete</i> </a></td>';
                $tabla.='</tr>';
            }
        closeDB($mysql);
		return $tabla;
    }
    
    function eliminarUsuario($id) {
        $mysql = connectDB();
        $query = 'DELETE From Usuarios WHERE ID_Usuario ='.$id;
        mysqli_query($mysql, $query);
        closeDB($mysql);
    }
    
    function recuperaUsuario($id) {
        $mysql = connectDB();
        $query = 'SELECT * FROM Usuarios WHERE ID_Usuario=' . $id;
        $result = $mysql -> query($query);
        $row = mysqli_fetch_array($result, MYSQLI_BOTH);
        closeDB($mysql);
        return $row;
    }
    
    function modificarUsuario($id, $first_name, $last_name, $calle_numero, $colonia,
                    $municipio, $codigo_p, $fecha_nac,
                    $icon_telephone, $celular, $tipo_empleado, $email,
                    $password){ //nombre_usuario == email
        $mysql = connectDB();
        $query = 'UPDATE Usuarios SET ID_ROL=?, nombre_usuario=?, contrasena=?, nombre=?, apellidos=?, telefono_casa=?, 
                fecha_nacimiento=?, telefono_celular=?, calle_numero=?, colonia=?, zip_code=?, municipio=?,
                email=? WHERE ID_Usuario=?;';
                 
                
        if(!($statement = $mysql->prepare($query))) {
            die("Preparation failed: (" . $mysql-> errno .")".$mysql->error);
            return false;
        }
        //Bind statement
        if(!$statement->bind_param("isssssssssissi", $tipo_empleado, $email, $password, $first_name, $last_name,
                                    $icon_telephone, $fecha_nac, $celular, $calle_numero, $colonia, $codigo_p, $municipio,
                                    $email, $id)){
            die("Parameter vinculation failed: (" .$statement->errno. ")" .$statement->error);
            return false;
        }
        if(!$statement->execute()) {
            die("Execution failed: (" .$statement->errno.") ". $statement->error);
            return false;
        }
        
       closeDB($mysql);
       return true;
    }

    function tablaInfoUsuarios($id){
        $conectar = connectDB();
                $query ="SELECT *
                        FROM Usuarios
                        WHERE ID_Usuario = '$id'";       
                
                $results = $conectar->query($query);
                $row = mysqli_fetch_array($results, MYSQLI_ASSOC);
                $tabla = '';
               
                    $tabla.='<tr>';
                    $tabla.='<td>' .$row["nombre_usuario"].'</td>';
                    $tabla.='<td>' .$row["contrasena"].'</td>';
                    $tabla.='<td>' .$row["nombre"].'</td>';
                    $tabla.='<td>' .$row["apellidos"].'</td>';
                    $tabla.='<td>' .$row["telefono_casa"].'</td>';
                    $tabla.='<td>' .$row["telefono_celular"].'</td>';
                    $tabla.='<td>' .$row["fecha_nacimiento"].'</td>';
                    $tabla.='<td>' .$row["calle_numero"].'</td>';
                    $tabla.='<td>' .$row["colonia"].'</td>';
                    $tabla.='<td>' .$row["zip_code"].'</td>';
                    $tabla.='<td>' .$row["municipio"].'</td>';
                    $tabla.='<td>' .$row["email"].'</td>';
                    $tabla.='</tr>';
            closeDB($conectar);
            return $tabla;                
    }

/*
  _________________________________________  NOTICIA _________________________________________
*/
    
    function obtenerArrayNoticias() {
        $mysql = connectDB();
        $query = 'CALL listaNoticias()';
        $result = $mysql -> query($query);
        $listaNoticias = array();
        $fecha = strtotime($row[fecha]);
        while($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
            $fecha = strtotime($row["fecha"]);
            $fecha = date('d/m/Y', $fecha);
            $elemento = '<a href="vernoticia.php?id='.$row["ID_Noticia"].'"><li>';
            $imagen = recuperaImagenNoticia($row['ID_Noticia']);
            if ($imagen) {
                $elemento.= '<img src="'.$imagen['ubicacion'].'"/>';
            }
            $elemento.= "<h5><strong>".$row["titulo"]."</strong></h5>";
            $elemento.="<p>". $fecha . "</p>";
            $elemento.="</li></a>";
            $listaNoticias[] = $elemento; 
        }
        return $listaNoticias;
    }
    
   function registrarNoticia($tit, $cont, $img, $descripcionimg,$fecha, $usuario) {
        $mysql = connectDB();
        $query = 'INSERT INTO Noticia (nombre_usuario,titulo,descripcion,fecha) VALUES (?,?,?,?)';
        if (!($statement = $mysql->prepare($query))) {
            //return false;
            die("Preparation failed: (" . $mysql->errno . ") " . $mysql->error);
        }
		if (!$statement->bind_param("ssss", $usuario, $tit, $cont, $fecha)) {
            die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error);
            return false;
        }
		if (!$statement->execute()) {
            die("Execution failed: (" . $statement->errno . ") " . $statement->error);
            return false;
        } 

        if($img != NULL) {
            $idnoticia = $mysql->insert_id;
            if(registrarImagen($idnoticia, $img,$descripcionimg, $mysql)) {
                closeDB($mysql);
                return true;
            } else {
                return false;
            }
        } else {
            return true;
        }
        
    }
    
    function registrarImagen($idnot, $img, $descripcionimg, $mysql) {
        $query = 'INSERT INTO Imagen (ubicacion,ID_Noticia,descripcion) VALUES (?,?,?)';
        if (!($statement = $mysql->prepare($query))) {
            return false;
            die("Preparation failed: (" . $mysql->errno . ") " . $mysql->error);
        }
		if (!$statement->bind_param("sis", $img, $idnot, $descripcionimg)) {
            die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error);
            return false;
        }
		if (!$statement->execute()) {
            die("Execution failed: (" . $statement->errno . ") " . $statement->error);
            return false;
        } 
        return true;
    }
    
    function listaNoticias() {
        $mysql = connectDB();
        $query = "CALL listaNoticias()";
        $result = $mysql -> query($query);
        $tabla = '';
            while($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                $tabla.='<tr>';
                $tabla.='<td>' .$row["titulo"].'</td>';
                $fecha = $row["fecha"];
                $fecha = date_create($fecha);
                $fecha = date_format($fecha, 'd/m/Y'); 
                $tabla.= '<td>' . $fecha . '</td>';
                $tabla.='<td> <a href="modificarNoticia.php?id='.$row["ID_Noticia"]. '&titulo=' . $row["titulo"]. '"> <i class="material-icons">mode_edit</i> </a> </td>';
                $tabla.='<td onclick="confirmarEliminacionNoticia('. $row["ID_Noticia"]. ')"> <a href="#"> <i class="material-icons">delete</i> </a></td>';
                $tabla.='</tr>';
            }
        closeDB($mysql);
		return $tabla;
    }
    
    function modificaNoticia($id, $titulo, $contenido, $img, $descripcionimagen) {
        $mysql = connectDB();
        $query = 'UPDATE Noticia SET titulo=?, descripcion=?, nombre_usuario=? WHERE ID_Noticia=?;';
         if (!($statement = $mysql->prepare($query))) {
            die("Preparation failed: (" . $mysql->errno . ") " . $mysql->error);
            return false;
        }
        $user = $_SESSION["usuario"];
        // Binding statement params 
        if (!$statement->bind_param("sssi", $titulo, $contenido, $user, $id)) {
            die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error);
            return false;
        }
        if (!$statement->execute()) {
            die("Execution failed: (" . $statement->errno . ") " . $statement->error);
            return false;
        } 
       
        $imagenactual = recuperaImagenNoticia($id); //recuperar imagen asociada con la noticia (si es que la hay)
        if ($img !== NULL) { //se introdujo alguna imagen en el formulario 
            if ($imagenactual) { //hay una imagen asociada con la noticia
                if ($img != 0) {  //la imagen que se introdujo en el formulario es diferente a la que se recuperÃ³
                    if (!(modificaImagen($id, $img, $descripcionimagen, $mysql))) { //modificar imagen
                        return false;
                    }
                } else if ($descripcionimagen != $imagenactual["descripcion"]){ //verificar si solo se cambio la descripciÃ³n de la imagen recuperada
                    if (!(modificaImagen($id, $imagenactual["ubicacion"], $descripcionimagen, $mysql))) { //modificar descripciÃ³n de la imagen
                        return false;
                    }
                } 
            } else {
                if (!(registrarImagen($id,$img,$descripcionimagen,$mysql))) { //no habÃ­a una imagen, y agregÃ³ una nueva
                    return false;
                }
            } 
        } else if ($imagenactual){ //se eliminÃ³ la imagen de la noticia
            removerRegistroImagen($id);
        }
        
        closeDB($mysql);
        return true;
    }
    
    function modificaImagen($id, $ubicacion, $descripcion, $mysql) {
        $query = 'UPDATE Imagen SET ubicacion=?, descripcion=? WHERE ID_Noticia='.$id;
          if (!($statement = $mysql->prepare($query))) {
            die("Preparation failed: (" . $mysql->errno . ") " . $mysql->error);
            return false;
        }
        $user = $_SESSION["usuario"];
        // Binding statement params 
        if (!$statement->bind_param("ss", $ubicacion, $descripcion)) {
            die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error);
            return false;
        }
        
        if (!$statement->execute()) {
            die("Execution failed: (" . $statement->errno . ") " . $statement->error);
            return false;

        } 
        return true;
    }
    
    function recuperaNoticia($id) {
        $mysql = connectDB();
        $query = 'SELECT * FROM Noticia WHERE ID_Noticia=' . $id;
        $result = $mysql -> query($query);
        $row = mysqli_fetch_array($result, MYSQLI_BOTH);
        closeDB($mysql);
        return $row;
    }

    function eliminarNoticia($id) {
        $mysql = connectDB();
        removerRegistroImagen($id);
        $query = 'DELETE From Noticia WHERE ID_Noticia='.$id;
        mysqli_query($mysql, $query);
        closeDB($mysql);
    }

    function recuperaImagenNoticia($id) {
        $mysql = connectDB();
        $query = 'SELECT * FROM Imagen WHERE ID_Noticia='. $id;
        $result = $mysql -> query($query);
        if (($result->num_rows)>0) {
            $row =  mysqli_fetch_array($result, MYSQLI_BOTH);
            closeDB($mysql);
            return $row;
        }
        else {
            closeDB($mysql);
            return false;
        }
    }
    
    function numeroPaginasNoticia() {
        $numeronoticias = count(obtenerArrayNoticias());
        $noticiasporpagina = 5;
        $numeropaginas = ceil($numeronoticias/$noticiasporpagina);
        $pagination = '<ul class="pagination">
            <li class="disabled" id="anterior" onclick="paginaAnterior()"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
            <li class="" id="1" onclick="despliegaNoticias(1)"><a href="#!">1</a></li>';
        $i = 2;
        while ($i<=$numeropaginas) {
            $pagination.= '<li class="" id="'.$i.'"onclick="despliegaNoticias('.$i.')"><a href="#!">'.$i.'</a></li>';
            $i++;
        }
        $pagination.='<li class="disabled" id="siguiente" onclick="siguientePagina()"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
            </ul>';
        echo $pagination;
    }
    
    function vistaNoticia($id) {
        $noticia = recuperaNoticia($id);
        $imagen = recuperaImagenNoticia($id);
        $vistaNoticia = '<h1 id="tituloNoticia">'.$noticia["titulo"].' </h1> <hr>'; //tÃ­tulo de la noticia
        $vistaNoticia.=  '<div id="infonoticia"> FormaciÃ³n Integral de La Mujer &nbsp | &nbsp QuerÃ©taro, MÃ©xico. 
        &nbsp | &nbsp' .$noticia["fecha"]. '</div><br>'; //informaciÃ³n de la noticia
        
        if ($imagen) {
            $vistaNoticia.=' <img class="materialboxed" width="100%" src="'.$imagen['ubicacion'].'"><br>'; //imagen
            $vistaNoticia.='<div id="caption">'.$imagen['descripcion']. '</div> '; //caption imagen
        }
        
        $vistaNoticia.= '<div id="contenido"> <h5>'.$noticia["descripcion"].'</h5></div><hr>'; //contenido de Noticia
        return $vistaNoticia;
    }
    
    function removerRegistroImagen($id) {
        $mysql = ConnectDB();
        //Eliminar archivo del servidor
        $query1 = 'SELECT * FROM Imagen WHERE ID_Noticia='.$id;
        $row = mysqli_fetch_array($mysql->query($query1), MYSQLI_BOTH);
        $archivo = __DIR__ .'/'. $row["ubicacion"];
        unlink($archivo);
        
        //Eliminar registro de imagen de la base de datos
        $query2 = 'DELETE FROM Imagen WHERE ID_Noticia='.$id;
        $mysql -> query($query2);
        closeDB($mysql);
    }
 
/*
 _________________________________________ ALUMNOS _________________________________________ 
*/

 
 
    /*registrar beneficiaria -> */
    
    //evitar registros duplicados
        function noDuplicado($first_name, $last_name, $fecha_nac_alumna){
            
                $conectar = connectDB();
                $query ="SELECT COUNT(*) AS filas
                        FROM Alumnos
                        WHERE Nombre = '$first_name'
                        AND Apellidos = '$last_name'
                        AND Fecha_de_nacimiento = '$fecha_nac_alumna'";       
                
                $results = $conectar->query($query);
                //var_dump($query);
                $row = mysqli_fetch_array($results, MYSQLI_ASSOC);
                $numero = $row["filas"];
        
                if ($numero == 0) {
                    echo "<script type='text/javascript'>console.log( 'REGISTRAR');</script>";
                    mysqli_free_result($results);
                    closeDB($conectar);
                    return true;
                }else{
                    echo "<script type='text/javascript'>console.log('NO PUEDES REGISTRAR');</script>";
                    mysqli_free_result($results);
                    closeDB($conectar);
                    return false;
                }
                
        }

    //registrar alumna
    function registrarAlumno(
        $first_name, 
        $last_name, 
        $calle_numero,
        $colonia,
        $municipio,
        $cp,
        $ocupacion,
        $estado_civil,
        $fecha_nac_alumna,
        $telefono_casa_alumna,
        $celular,
        $genero_alumna,
        $estatus_fim,
        $enteraste,
        $nombre_emergencia,
        $emergencia_tel
        ){
            
        $mysql = connectDB();

        $query = 'INSERT INTO Alumnos (
            Nombre, 
            Apellidos, 
            Calle_numero, 
            Colonia, 
            ZIP, 
            Municipio, 
            Ocupacion, 
            Estado_Civil, 
            Fecha_de_nacimiento, 
            Genero, 
            Tcasa, 
            Tcel, 
            Estatus, 
            Contacto_Nombre, 
            Contacto_telefono, 
            medio_se_entero_FIM
        ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';

            
        if (!($statement = $mysql->prepare($query)) ) {
            //return false;
            die("Preparation in table Registra Alumno failed: (" . $mysql->errno . ") " . $mysql->error);
        }
        
        $user = $_SESSION["usuario"];
		if (!$statement->bind_param("ssssssssssssssss", 
		$first_name, 
        $last_name, 
        $calle_numero,
        $colonia,
        $cp,
        $municipio,
        $ocupacion,
        $estado_civil,
        $fecha_nac_alumna,
        $genero_alumna,
        $telefono_casa_alumna,
        $celular,
        $estatus_fim,
        $nombre_emergencia,
        $emergencia_tel,
        $enteraste
        )) {
            die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error);
            closeDB($mysql);
            return false;
        }
		if (!$statement->execute()) {
            die("Execution failed: (" . $statement->errno . ") " . $statement->error);
            closeDB($mysql);
            return false;
        }else{
        closeDB($mysql);
        return true;
        }

    }

    //Registrar Historial
  
    function registrarHistorialAcademico($id,
        $grado_estudios,
        $estatus_escolaridad,
        $anio_suspension,
        $motivo_susp,
        $otros_estudios
        ){
        
        $mysql = connectDB();
        
        $query = 'INSERT INTO HistorialAcademico (
            ID_Alumno,
            Grado_estudios,
            Status,
            anios_suspension,
            motivo_suspension_estudios,
            otros_estudios
            ) VALUES (?,?,?,?,?,?)';
        
        if (!($statement = $mysql->prepare($query)) ) {
            //return false;
            die("Preparation in table historial academico failed: (" . $mysql->errno . ") " . $mysql->error);
        }
        
        $user = $_SESSION["usuario"];
		if (!$statement->bind_param("ississ", 
		       $id,
    		   $grado_estudios,
               $estatus_escolaridad,
               $anio_suspension,
               $motivo_susp,
               $otros_estudios
		   
		   )) {
            die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error);
            closeDB($mysql);
            return false;
        }
		if (!$statement->execute()) {
            die("Execution failed: (" . $statement->errno . ") " . $statement->error);
            closeDB($mysql);
            return false;
        }else{
            closeDB($mysql);
            return true;
        }
        }    
        
    
        //REGISTRAR InfoLaboral
        
        function registrarInfoLaboral($id,
        $empresa,
        $puesto,
        $antiguedad
        ){
        
        $mysql = connectDB();        
    
        $query = 'INSERT INTO InfoLaboral (
            ID_Alumno,
            Empresa,
            Puesto,
            Antiguedad
            ) VALUES (?,?,?,?)';
         
        if (!($statement = $mysql->prepare($query)) ) {
            //return false;
            die("Preparation in table InfoLaboral failed: (" . $mysql->errno . ") " . $mysql->error);
        }
        
        $user = $_SESSION["usuario"];
		if (!$statement->bind_param("issi", $id, $empresa, $puesto , $antiguedad)) {
            die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error);
            return false;
        }
		if (!$statement->execute()) {
            die("Execution failed: (" . $statement->errno . ") " . $statement->error);
            return false;
        }else{
            closeDB($mysql);
            return true;
        }
        }
 
        //REGISTRAR herramientas tecnologicas
        
        function registrarHerramientas($id,
        $acceso_it,
        $herramientas
        ){
        
        $mysql = connectDB();        
    
        $query = 'INSERT INTO AccesoIT (
            ID_Alumno,
            Acceso,
            Herramientas
            ) VALUES (?,?,?)';
         
        if (!($statement = $mysql->prepare($query)) ) {
            //return false;
            die("Preparation in table Herramientas failed: (" . $mysql->errno . ") " . $mysql->error);
        }
        
        $user = $_SESSION["usuario"];
		if (!$statement->bind_param("iss", $id, $acceso_it, $herramientas)) {
            die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error);
            return false;
        }
		if (!$statement->execute()) {
            die("Execution failed: (" . $statement->errno . ") " . $statement->error);
            return false;
        }else{
            closeDB($mysql);
            return true;
        }
        }
        
        
        //REGISTRAR Situacion
        
        function registrarSituacion(
        $id,
        $vivienda_compartida,
        $responsable_pago,
        $parentesco,
        $situacion_v,
        $fuente_ingresos,
        $ingresos,
        $servicios
        ){
        
        $mysql = connectDB(); 
        
            $query = 'INSERT INTO Situacion (
            ID_Alumno,
            vivienda_compartida,
            responsable_pago,
            parentesco,
            situacion_vivienda,
            fuente_ingresos,
            monto_ingresos,
            servicios
            ) VALUES (?,?,?,?,?,?,?,?)';
         
        if (!($statement = $mysql->prepare($query)) ) {
            //return false;
            die("Preparation in table Situacion failed: (" . $mysql->errno . ") " . $mysql->error);
        }
        
        $user = $_SESSION["usuario"];
		if (!$statement->bind_param("isssssss",
		    $id,
		    $vivienda_compartida,
            $responsable_pago,
            $parentesco,
            $situacion_v,
            $fuente_ingresos,
            $ingresos,
            $servicios)) {
            die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error);
            return false;
        }
		if (!$statement->execute()) {
            die("Execution failed: (" . $statement->errno . ") " . $statement->error);
            return false;
        }else{
            closeDB($mysql);
            return true;
        }
        }
        

        /*BUSCAR Alumna*/
        
        function consultarAlumnoNombre($first_name){
             $conectar=connectDB();
             $sql = "SELECT Nombre, Apellidos, Estatus, ID_Alumno 
                        FROM Alumnos 
                        WHERE Nombre LIKE '%{$first_name}%'";
                         
            $result = $conectar -> query($sql);
            $tabla = '';
                while($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                    $tabla.='<tr>';
                    $tabla.='<td onclick="mostrarInformacion('.$row["ID_Alumno"].')">' .$row["Nombre"].'</td>';
                    $tabla.='<td onclick="mostrarInformacion('.$row["ID_Alumno"].')">' .$row["Apellidos"].'</td>';
                    $tabla.='<td onclick="mostrarInformacion('.$row["ID_Alumno"].')">' .$row["Estatus"].'</td>';
                    $tabla.='<td> <a href="modificarAlumno.php?id='.$row["ID_Alumno"].'">' .'<i class="material-icons">mode_edit</i>'.'</a>'.'</td>';
                    $tabla.='<td onclick="confirmarEliminacionAlumna('. $row["ID_Alumno"]. ')"> <a href="#"> <i class="material-icons">delete</i> </a> </td>';
                    $tabla.='</tr>';
                }

            closeDB($conectar);
    		return $tabla;
        }
        
        function listaAlumnasAJAX($filtro) {
            $mysql= connectDB();
            $query = "SELECT Nombre, Apellidos, ID_Alumno FROM Alumnos ORDER BY Apellidos ASC";
            $result = $mysql -> query($query);
            $lista = "";
            while ($row = mysqli_fetch_array($result,MYSQLI_BOTH)) {
                $nombre = $row["Apellidos"]. " " . $row["Nombre"];
                if ($filtro === "") {
                    $lista .= '<li class="collection-item" onclick="seleccionarAlumna('.$row["ID_Alumno"].',this)">'.$nombre.'</li>';
                } else {
                    if (!((strpos(strtolower($nombre), strtolower($filtro))) === FALSE)) {
                        $lista .= '<li class="collection-item" onclick="seleccionarAlumna('.$row["ID_Alumno"].',this)">'.$nombre.'</li>';
                    }
                }
            }
            closeDB($mysql);
            return $lista;
        }
        
        function listaAlumnas(){
             $conectar=connectDB();
             $sql = "SELECT Nombre, Apellidos, Estatus, ID_Alumno
                        FROM Alumnos";
                         
            $result = $conectar -> query($sql);
            $tabla.='<td>' .$row["Nombre"].'</td>';
           //output data of each row
            $tabla = "<div class='content administrativo'> <fieldset><p>Alumnas </p>  <table class='bordered highlight  '>";
            $tabla.='<thead>
                <tr>
                <th data-field="nombre"> Nombre</th>
                <th data-field="apellido"> Apellido</th>
                <th data-field="status">Status</th>
                <th data-field="modificar">Modificar</th>
                <th data-field="eliminar">Eliminar</th>             
                </tr>
            </thead>';
            
                while($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                    $tabla.='<tr>';
                    $tabla.='<td onclick="mostrarInformacion('. $row["ID_Alumno"]. ')">' .$row["Nombre"].'</td>';
                    $tabla.='<td onclick="mostrarInformacion('. $row["ID_Alumno"]. ')">' .$row["Apellidos"].'</td>';
                    $tabla.='<td onclick="mostrarInformacion('. $row["ID_Alumno"]. ')">' .$row["Estatus"].'</td>';
                    $tabla.='<td> <a href="modificarAlumno.php?id='.$row["ID_Alumno"].'">' .'<i class="material-icons">mode_edit</i>'.'</a>'.'</td>';
                    $tabla.='<td onclick="confirmarEliminacionAlumna('. $row["ID_Alumno"]. ')"> <a href="#"> <i class="material-icons">delete</i> </a> </td>';
                    $tabla.='</tr>';
                }
                
                 $tabla.= "</table></fieldset><br></div>";
            closeDB($conectar);
            echo $tabla;
        }

        
        function consultarAlumnoApellido($last_name){
            $conectar=connectDB();
             $sql = "SELECT Nombre, Apellidos, Estatus, ID_Alumno
                        FROM Alumnos 
                        WHERE Apellidos LIKE '%{$last_name}%'";
                         
            $result = $conectar -> query($sql);
            $tabla = '';
                while($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                    $tabla.='<tr>';
                    $tabla.='<td onclick="mostrarInformacion('.$row["ID_Alumno"].')">' .$row["Nombre"].'</td>';
                    $tabla.='<td onclick="mostrarInformacion('.$row["ID_Alumno"].')">' .$row["Apellidos"].'</td>';
                    $tabla.='<td onclick="mostrarInformacion('.$row["ID_Alumno"].')">' .$row["Estatus"].'</td>';
                    $tabla.='<td> <a href="modificarAlumno.php?id='.$row["ID_Alumno"].'">' .'<i class="material-icons">mode_edit</i>'.'</a>'.'</td>';
                    $tabla.='<td onclick="confirmarEliminacionAlumna('.$row["ID_Alumno"].')"> <a href="#"> <i class="material-icons">delete</i> </a> </td>';
                    $tabla.='</tr>';
                }
            closeDB($conectar);
    		return $tabla;
        }
        
        function consultarAlumnoFecha($fechaInscripcion){

        }
        
        function consultarAlumnoStatus($status){
            
        }
        
        function consultarPerfilCompleto(){
            
        }
        
        /*VISUALIZAR la informaciÃ³n de alumnas*/
                
        function tablaInfoAlumnas($id){
             $conectar = connectDB();
                $query ="SELECT *
                        FROM Alumnos
                        WHERE ID_Alumno = '$id'";       
                
                $results = $conectar->query($query);
                $row = mysqli_fetch_array($results, MYSQLI_ASSOC);
                //var_dump($row["Nombre"]);
                $tabla = '';
               
                    $tabla.='<tr>';
                    $tabla.='<td>' .$row["Nombre"].'</td>';
                    $tabla.='<td>' .$row["Apellidos"].'</td>';
                    $tabla.='<td>' .$row["Calle_numero"].'</td>';
                    $tabla.='<td>' .$row["Colonia"].'</td>';
                    $tabla.='<td>' .$row["ZIP"].'</td>';
                    $tabla.='<td>' .$row["Municipio"].'</td>';
                    $tabla.='<td>' .$row["Ocupacion"].'</td>';
                    $tabla.='<td>' .$row["Estado_Civil"].'</td>';
                    $tabla.='<td>' .$row["Fecha_de_nacimiento"].'</td>';
                    $tabla.='<td>' .$row["Genero"].'</td>';
                    $tabla.='<td>' .$row["Tcasa"].'</td>';
                    $tabla.='<td>' .$row["Tcel"].'</td>';
                    $tabla.='<td>' .$row["Estatus"].'</td>';
                    $tabla.='<td>' .$row["Contacto_Nombre"].'</td>';
                    $tabla.='<td>' .$row["Contacto_telefono"].'</td>';
                    $tabla.='<td>' .$row["medio_se_entero_FIM"].'</td>';
                    $tabla.='</tr>';
            closeDB($conectar);
            return $tabla;
        }
        
        function tablaInfoAcademica($id){
            $conectar = connectDB();
                $query ="SELECT *
                        FROM HistorialAcademico
                        WHERE ID_Alumno = '$id'";       
                $results = $conectar->query($query);
                $row = mysqli_fetch_array($results, MYSQLI_ASSOC);
                $tabla = '';
                    $tabla.='<tr>';
                    $tabla.='<td>' .$row["Grado_estudios"].'</td>';
                    $tabla.='<td>' .$row["Status"].'</td>';
                    $tabla.='<td>' .$row["anios_suspension"].'</td>';
                    $tabla.='<td>' .$row["motivo_suspension_estudios"].'</td>';
                    $tabla.='<td>' .$row["otros_estudios"].'</td>';
                    $tabla.='</tr>';
            closeDB($conectar);
            return $tabla;
        }
        
        function tablaInfoLaboral($id){
            $conectar = connectDB();
                $query ="SELECT *
                        FROM InfoLaboral
                        WHERE ID_Alumno = '$id'";       
                $results = $conectar->query($query);
                $row = mysqli_fetch_array($results, MYSQLI_ASSOC);
                $tabla = '';
                    $tabla.='<tr>';
                    $tabla.='<td>' .$row["Empresa"].'</td>';
                    $tabla.='<td>' .$row["Puesto"].'</td>';
                    $tabla.='<td>' .$row["Antiguedad"].'</td>';
                    $tabla.='</tr>';
            closeDB($conectar);
            return $tabla;
        }
        
        function tablaInfoHerramientas($id){
            $conectar = connectDB();
                $query ="SELECT *
                        FROM AccesoIT
                        WHERE ID_Alumno = '$id'";       
                $results = $conectar->query($query);
                $row = mysqli_fetch_array($results, MYSQLI_ASSOC);
                $tabla = '';
                    $tabla.='<tr>';
                    $tabla.='<td>' .$row["Acceso"].'</td>';
                    $tabla.='<td>' .$row["Herramientas"].'</td>';
                    $tabla.='</tr>';
            closeDB($conectar);
            return $tabla;
        }
        
        function tablaInfoSituacion($id){
            $conectar = connectDB();
                $query ="SELECT *
                        FROM Situacion
                        WHERE ID_Alumno = '$id'";       
                $results = $conectar->query($query);
                $row = mysqli_fetch_array($results, MYSQLI_ASSOC);
                $tabla = '';
                    $tabla.='<tr>';
                    $tabla.='<td>' .$row["vivienda_compartida"].'</td>';
                    $tabla.='<td>' .$row["responsable_pago"].'</td>';
                    $tabla.='<td>' .$row["parentesco"].'</td>';
                    $tabla.='<td>' .$row["situacion_vivienda"].'</td>';
                    $tabla.='<td>' .$row["fuente_ingresos"].'</td>';
                    $tabla.='<td>' .$row["monto_ingresos"].'</td>';
                    $tabla.='<td>' .$row["servicios"].'</td>';
                    $tabla.='</tr>';
            closeDB($conectar);
            return $tabla;
        }
        
        
        function tablaInfoTotal(){
            $conectar = connectDB();
            $query ="SELECT *
                    FROM Alumnos
                    ORDER BY Nombre ASC";       
            $results = $conectar->query($query);
            //$row = mysqli_fetch_array($results, MYSQLI_ASSOC);
 
            /*headers de tabla*/    
            $tabla="";
            $tabla.="<table class='bordered striped centered' cellspacing='0' cellpadding='0'>";
            $tabla.='<thead>
                    <tr>
                    <th class="minWidth"> Nombre </th>
                    <th class="minWidth">Apellido</th>
                    <th class="minWidth">Calle y nÃºmero </th>
                    <th class="minWidth">Colonia</th>
                    <th class="minWidth">CÃ³digo Postal</th>
                    <th class="minWidth">Municipio</th>
                    <th class="minWidth">OcupaciÃ³n</th>
                    <th class="minWidth">Estado Civil</th>
                    <th class="minWidth">Nacimiento</th>
                    <th class="minWidth">GÃ©nero</th>
                    <th class="minWidth">Tel.Casa</th>
                    <th class="minWidth">Celular</th>
                    <th class="minWidth">Estatus</th>
                    <th class="minWidth">Contacto Emergencia</th>
                    <th class="minWidth">Tel. Emergencia</th>
                    <th class="minWidth">Como se enterÃ³ de FIM</th>
                    </tr>
                    </thead>
                    <tbody>';
            /*finaliza headers de tabla*/
                
            /*contenido de tabla*/
            while($row = mysqli_fetch_array($results, MYSQLI_BOTH)) {
                $tabla.='<tr>';
                $tabla.='<td>' .$row["Nombre"].'</td>';
                $tabla.='<td>' .$row["Apellidos"].'</td>';
                $tabla.='<td>' .$row["Calle_numero"].'</td>';
                $tabla.='<td>' .$row["Colonia"].'</td>';
                $tabla.='<td>' .$row["ZIP"].'</td>';
                $tabla.='<td>' .$row["Municipio"].'</td>';
                $tabla.='<td>' .$row["Ocupacion"].'</td>';
                $tabla.='<td>' .$row["Estado_Civil"].'</td>';
                $tabla.='<td>' .$row["Fecha_de_nacimiento"].'</td>';
                $tabla.='<td>' .$row["Genero"].'</td>';
                $tabla.='<td>' .$row["Tcasa"].'</td>';
                $tabla.='<td>' .$row["Tcel"].'</td>';
                $tabla.='<td>' .$row["Estatus"].'</td>';
                $tabla.='<td>' .$row["Contacto_Nombre"].'</td>';
                $tabla.='<td>' .$row["Contacto_telefono"].'</td>';
                $tabla.='<td>' .$row["medio_se_entero_FIM"].'</td>';
                $tabla.='</tr>';
            }
            /*finaliza contenido de tabla*/
                
            $tabla.= "</tbody></table>";
            //echo $tabla;
            closeDB($conectar);
            return $tabla;
        }
        
        function tablaInfoPDF(){
            $conectar = connectDB();
            $query ="SELECT *
                    FROM Alumnos
                    ORDER BY Nombre ASC";       
            $results = $conectar->query($query);
            //$row = mysqli_fetch_array($results, MYSQLI_ASSOC);
 
            /*headers de tabla*/    
            $tabla="";
            $tabla.="<table cellspacing='0' cellpadding='0'>";
            $tabla.='<thead>
                    <tr>
                    <th class="minWidth"><strong> Nombre </strong></th>
                    <th class="minWidth"><strong>Apellido </strong></th>
                    <th class="minWidth"><strong>Calle y nÃºmero </strong></th>
                    <th class="minWidth"><strong>Colonia </strong></th>
                    <th class="minWidth"><strong>CÃ³digo Postal </strong></th>
                    <th class="minWidth"><strong>Municipio </strong></th>
                    <th class="minWidth"><strong>Nacimiento </strong></th>
                    <th class="minWidth"><strong>Celular </strong></th>
                    <th class="minWidth"><strong>Estatus </strong></th>
                    </tr>
                    </thead>
                    <tbody>';
            /*finaliza headers de tabla*/
                
            /*contenido de tabla*/
            while($row = mysqli_fetch_array($results, MYSQLI_BOTH)) {
                $tabla.='<tr>';
                $tabla.='<td>' .$row["Nombre"].'</td>';
                $tabla.='<td>' .$row["Apellidos"].'</td>';
                $tabla.='<td>' .$row["Calle_numero"].'</td>';
                $tabla.='<td>' .$row["Colonia"].'</td>';
                $tabla.='<td>' .$row["ZIP"].'</td>';
                $tabla.='<td>' .$row["Municipio"].'</td>';
                $tabla.='<td>' .$row["Fecha_de_nacimiento"].'</td>';
                $tabla.='<td>' .$row["Tcel"].'</td>';
                $tabla.='<td>' .$row["Estatus"].'</td>';
                $tabla.='</tr>';
            }
            /*finaliza contenido de tabla*/
                
            $tabla.= "</tbody></table>";
            closeDB($conectar);
            return $tabla;
        }

        
        /* FIN DE VISUALIZAR INFORMACION DE ALUMNAS */
        
        /*MODIFICAR Alumno*/
        
        //Get ID de alumno
        function getID($first_name, $last_name, $fecha_nac_alumna){
            
                $conectar = connectDB();
                $query ="SELECT ID_Alumno
                        FROM Alumnos
                        WHERE Nombre = '$first_name'
                        AND Apellidos = '$last_name'
                        AND Fecha_de_nacimiento = '$fecha_nac_alumna'";       
                
                $results = $conectar->query($query);
                //var_dump($query);
                $row = mysqli_fetch_array($results, MYSQLI_ASSOC);
                $miID = $row["ID_Alumno"];
        
                return $miID;
        }
        
        /*duplicado x id*/
        
        function noID($id, $tabla){
            
                $conectar = connectDB();
                $query ="SELECT COUNT(*) AS filas
                        FROM $tabla
                        WHERE ID_Alumno = $id";       
                
                $results = $conectar->query($query);
                //var_dump($query);
                $row = mysqli_fetch_array($results, MYSQLI_ASSOC);
                $numero = $row["filas"];
        
                if ($numero == 0) {
                    echo "<script type='text/javascript'>console.log( 'REGISTRAR');</script>";
                    mysqli_free_result($results);
                    closeDB($conectar);
                    return true;
                }else{
                    echo "<script type='text/javascript'>console.log('ACTUALIZAR');</script>";
                    mysqli_free_result($results);
                    closeDB($conectar);
                    return false;
                }
                
        }
        
        
        function modificarInfoPersonal($id, 
        $first_name, 
        $last_name, 
        $calle_numero,
        $colonia,
        $municipio,
        $cp,
        $ocupacion,
        $estado_civil,
        $fecha_nac_alumna,
        $telefono_casa_alumna,
        $celular,
        $genero_alumna,
        $estatus_fim,
        $enteraste,
        $nombre_emergencia,
        $emergencia_tel
        ){
            
        $mysql = connectDB();

        $query = 'UPDATE Alumnos
            SET Nombre ='."'".$first_name."'".', 
            Apellidos ='."'".$last_name."'".', 
            Calle_numero ='."'".$calle_numero."'".', 
            Colonia ='."'".$colonia."'".', 
            ZIP ='."'".$cp."'".', 
            Municipio ='."'".$municipio."'".', 
            Ocupacion ='."'".$ocupacion."'".', 
            Estado_Civil ='."'".$estado_civil."'".', 
            Fecha_de_nacimiento ='."'".$fecha_nac_alumna."'".', 
            Genero ='."'".$genero_alumna."'".', 
            Tcasa ='."'".$telefono_casa_alumna."'".', 
            Tcel ='."'".$celular."'".', 
            Estatus ='."'".$estatus_fim."'".', 
            Contacto_Nombre ='."'".$nombre_emergencia."'".', 
            Contacto_telefono ='."'".$emergencia_tel."'".', 
            medio_se_entero_FIM ='."'".$enteraste."'".'
            WHERE ID_Alumno ='.$id;
        //var_dump($query);
            
        if (!($statement = $mysql->prepare($query)) ) {
            //return false;
            die("Preparation in table Update Alumno failed: (" . $mysql->errno . ") " . $mysql->error);
        }
        
		if (!$statement->execute()) {
            die("Update execution failed: (" . $statement->errno . ") " . $statement->error);
            closeDB($mysql);
            return false;
        }else{
        closeDB($mysql);
        return true;
        }
            
        }
        
        
        function modificarHistorialAcademico($id,
                $grado_estudios,
                $estatus_escolaridad,
                $anio_suspension,
                $motivo_susp,
                $otros_estudios
        ){
            
            $mysql = connectDB();
         
            $query = 'UPDATE HistorialAcademico
                SET Grado_estudios ='."'".$grado_estudios."'".', 
                Status ='."'".$estatus_escolaridad."'".', 
                anios_suspension ='."'".$anio_suspension."'".',
                motivo_suspension_estudios ='."'".$motivo_susp."'".',
                otros_estudios ='."'".$otros_estudios."'".'
                WHERE ID_Alumno ='.$id;
            //var_dump($query);
                
            if (!($statement = $mysql->prepare($query)) ) {
                //return false;
                die("Preparation in table Update Alumno failed: (" . $mysql->errno . ") " . $mysql->error);
            }
            
    		if (!$statement->execute()) {
                die("Update execution failed: (" . $statement->errno . ") " . $statement->error);
                closeDB($mysql);
                return false;
            }else{
            closeDB($mysql);
            return true;
            }
            
        }
        
        function modificarInfoLaboral($id,
                $empresa,
                $puesto,
                $antiguedad
        ){
            
            $mysql = connectDB();
         
            $query = 'UPDATE InfoLaboral
                SET Empresa ='."'".$empresa."'".', 
                Puesto ='."'".$puesto."'".', 
                Antiguedad ='."'".$antiguedad."'".'
                WHERE ID_Alumno ='.$id;
            //var_dump($query);
                
            if (!($statement = $mysql->prepare($query)) ) {
                //return false;
                die("Preparation in table Update Alumno failed: (" . $mysql->errno . ") " . $mysql->error);
            }
            
    		if (!$statement->execute()) {
                die("Update execution failed: (" . $statement->errno . ") " . $statement->error);
                closeDB($mysql);
                return false;
            }else{
            closeDB($mysql);
            return true;
            }
            
        }
        
        
        function modificarHerramientas($id,
                $acceso_it,
                $herramientas
        ){
            
            $mysql = connectDB();
         
            $query = 'UPDATE AccesoIT
                SET Acceso ='."'".$acceso_it."'".', 
                Herramientas ='."'".$herramientas."'".'
                WHERE ID_Alumno ='.$id;
            //var_dump($query);
                
            if (!($statement = $mysql->prepare($query)) ) {
                //return false;
                die("Preparation in table Update Alumno failed: (" . $mysql->errno . ") " . $mysql->error);
            }
            
    		if (!$statement->execute()) {
                die("Update execution failed: (" . $statement->errno . ") " . $statement->error);
                closeDB($mysql);
                return false;
            }else{
            closeDB($mysql);
            return true;
            }
            
        }
        
        function modificarSituacion($id,
            $vivienda_compartida,
            $responsable_pago,
            $parentesco,
            $situacion_v,
            $fuente_ingresos,
            $ingresos,
            $servicios
        ){
            
            $mysql = connectDB();
         
            $query = 'UPDATE Situacion
                SET vivienda_compartida ='."'".$vivienda_compartida."'".', 
                responsable_pago ='."'".$responsable_pago."'".',
                parentesco ='."'".$parentesco."'".',
                situacion_vivienda ='."'".$situacion_v."'".',
                fuente_ingresos ='."'".$fuente_ingresos."'".',
                monto_ingresos ='."'".$ingresos."'".',
                servicios ='."'".$servicios."'".'
                WHERE ID_Alumno ='.$id;
            //var_dump($query);
       
            if (!($statement = $mysql->prepare($query)) ) {
                //return false;
                die("Preparation in table Update Alumno failed: (" . $mysql->errno . ") " . $mysql->error);
            }
            
    		if (!$statement->execute()) {
                die("Update execution failed: (" . $statement->errno . ") " . $statement->error);
                closeDB($mysql);
                return false;
            }else{
            closeDB($mysql);
            return true;
            }
            
        }
        
        
        function recuperarInformacionPersonal($id){
            $conectar = connectDB();
            $query = "SELECT * FROM Alumnos WHERE ID_Alumno=$id";
            $result = $conectar -> query($query);
            //var_dump($result);
            if(!$result){
                return "";
            }
            $row = mysqli_fetch_array($result, MYSQLI_BOTH);
            closeDB($conectar);
            return $row;
        }
        
        
        
        function recuperarHistorialAcademico($id){
            $conectar = connectDB();
            $query = 'SELECT * FROM HistorialAcademico WHERE ID_Alumno='.$id;
            $result = $conectar -> query($query);
            //var_dump($result);
            if(!$result){
                return "";
            }
            $row = mysqli_fetch_array($result, MYSQLI_BOTH);
            closeDB($conectar);
            return $row;
        }
        
        function recuperarInfoLaboral($id){
            $conectar = connectDB();
            $query = 'SELECT * FROM InfoLaboral WHERE ID_Alumno='.$id;
            $result = $conectar -> query($query);
            //var_dump($result);
            if(!$result){
                return "";
            }
            $row = mysqli_fetch_array($result, MYSQLI_BOTH);
            closeDB($conectar);
            return $row;
        }
        
        function recuperarHerramientas($id){
            $conectar = connectDB();
            $query = 'SELECT * FROM AccesoIT WHERE ID_Alumno='.$id;
            $result = $conectar -> query($query);
            //var_dump($result);
            if(!$result){
                return "";
            }
            $row = mysqli_fetch_array($result, MYSQLI_BOTH);
            closeDB($conectar);
            return $row;
        }
        
        function recuperarSituacion($id){
            $conectar = connectDB();
            $query = 'SELECT * FROM Situacion WHERE ID_Alumno='.$id;
            $result = $conectar -> query($query);
            //var_dump($result);
            if(!$result){
                return "";
            }
            $row = mysqli_fetch_array($result, MYSQLI_BOTH);
            closeDB($conectar);
            return $row;
        }
        /*
        */
        /*ELIMINAR Alumno*/
        
        function eliminarAlumno($id) {
        $conectar = connectDB();
        echo "ID:";
        var_dump($id);
        $query = 'DELETE From Alumnos WHERE ID_Alumno='.$id;
        //incluir delete de las otras tablas
        echo "<script type='text/javascript'>console.log( 'vamos por la query');</script>";
         echo "query:";
        //var_dump($query);
        $consulta=mysqli_query($conectar, $query);
        closeDB($conectar);
        return $consulta;
    }
    

/*
 _________________________________________ INFORMACION INSTITUCIONAL _________________________________________ 
*/

    function listaInformacion() {
        $mysql = connectDB();
        $query = "SELECT * FROM infoFIM ORDER BY ID_info DESC";
        $result = $mysql -> query($query);
        $tabla = '';
            while($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                $tabla.='<tr>';
                    $tabla.= '<td><strong>' .$row["nombre"].'</strong></td>';
                    $tabla.= '<td><p>   </p></td>';
                    $tabla.= '<td>' . $row["descripcion"] . '</td>';
                    $tabla.= '<td> <a href="modificarInformacion.php?id='.$row["ID_info"].'"><i class="material-icons">mode_edit</i></a> </td>';
                $tabla.='</tr>';
            }
        closeDB($mysql);
		return $tabla;
    }
    
    function recuperarInformacion($id) {
        $mysql = connectDB();
        $query = 'SELECT * FROM infoFIM WHERE ID_info='.$id;
        $result = $mysql -> query($query);
        $row = mysqli_fetch_array($result, MYSQLI_BOTH);
        closeDB($mysql);
        return $row;
    }
    
    function modificarInformacion($id, $descripcion){ 
        $mysql = connectDB();
         
            $query = 'UPDATE infoFIM
                SET descripcion ='."'".$descripcion."'".'
                WHERE ID_Info ='.$id;
            //var_dump($query);
       
            if (!($statement = $mysql->prepare($query)) ) {
                //return false;
                die("Preparation in table Update infoFIM failed: (" . $mysql->errno . ") " . $mysql->error);
            }
            
    		if (!$statement->execute()) {
                die("Update execution failed: (" . $statement->errno . ") " . $statement->error);
                closeDB($mysql);
                return false;
            }else{
            closeDB($mysql);
            return true;
            }
    }



/*
 _________________________________________ VALIDACION _________________________________________ 
*/
    
    function isValidPhone($cadena){
		return (preg_match("/^\d{7,10}$/",trim($cadena)));
    }
    
    function isValidMail($cadena){
        return (preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/",trim($cadena)));
    }
    
    function isValidRFC($cadena){
        return (preg_match("/^[A-Z]{3,4}\d{6}[A-Z\d]{2}[\dA]$/",strtoupper(trim($cadena))));
    }
    

   /*-----------SESIONES----------*/
   
   function checkSession() {
       if (!session_id()) {
            return false;
       } else {
           $time = time();
           //4 horas
           if ($time - $_SESSION["ultimaactividad"] <= 14400) {
               $_SESSION["ultimaactividad"] = $time;
               return true;
           } else {
               session_unset();
               session_destroy();
               return false;
           }
       }
   }
   
   function login($user, $password) {
       $mysql = connectDB();
       $query = "SELECT * FROM Usuarios WHERE nombre_usuario='".$user."'";
       $result = $mysql -> query($query);
       if (($result->num_rows) > 0) {
           $row = mysqli_fetch_array($result, MYSQLI_BOTH);
           if ($row["contrasena"] === $password) {
               session_start();
               $_SESSION["usuario"] = $user;
               $_SESSION["nombre"] = $row["nombre"];
               $_SESSION["ultimaactividad"] = time();
               $_SESSION["tipoUsuario"] = $row["ID_ROL"];
               closeDB($mysql);
               return true;
           }
       }
       closeDB($mysql);
       return false;
   }
   
   /*REPORTE*/
   
   function reportePDF(){
       $mysql = connectDB();
   }
   
   
   /*----------GALERÃA--------*/
   function imagenesGaleria() {
       $mysql = connectDB();
       $query = 'SELECT * FROM FotosGaleria ORDER BY fecha DESC';
       $result = $mysql -> query($query);
       $imagenes = '<div class="square"><div class="addIcon"><div class="table"> <div class="table-cell" onclick="agregarImagenAGaleria()"><img class="rs" src="Images/addImage.png"></div></div></div></div>';
       while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
           $imagenes.= '<div class="square"> <div class="imgContent"> <div class="table"> <div class="table-cell">  <a href="#" onclick="confirmarEliminacionImagen('.$row["ID_FotoGaleria"].')"> <i class="material-icons right deleteicon" hidden>delete</i></a>
 <img class="rs" src="'.$row["ubicacion"].'"/> </div> </div> </div> </div>';   
       }
       closeDB($mysql);
       return $imagenes;
   }
   
   function anadirImagenGaleria($ubicacion, $fecha, $titulo) {
       $mysql = connectDB();
       $query = 'INSERT INTO FotosGaleria (ubicacion,fecha,titulo) VALUES (?,?,?)';
       if (!($statement = $mysql->prepare($query))) {
            //return false;
            die("Preparation failed: (" . $mysql->errno . ") " . $mysql->error);
        }
		if (!$statement->bind_param("sss",$ubicacion, $fecha , $titulo)) {
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
   
   function eliminarImagenGaleria($id){
       $mysql = connectDB();                            
       //Eliminar archivo del Servidor
       $query1 = 'SELECT * FROM FotosGaleria WHERE ID_FotoGaleria='.$id;
       $result = $mysql->query($query1);
       $row = mysqli_fetch_array($result, MYSQLI_BOTH);
       $archivo = __DIR__.'/'.$row["ubicacion"];
       unlink($archivo);
       //Eliminar Registro de la Base de Datos
       $query2 = 'DELETE FROM FotosGaleria WHERE ID_FotoGaleria='.$id;
       $mysql -> query($query2);
       closeDB($mysql);
   }
   
   function listaDeImagenesGaleria() {
       $mysql = connectDB();
       $query = 'SELECT * FROM FotosGaleria';
       $result = $mysql -> query($query);
       $lista = "";
       while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
           $lista.='<li>';
           $lista.='<img height="600px" src="'.$row["ubicacion"].'"/>';
           $lista.='<div class="caption center-align">
                      <div class="container">
                        <div class="row center">
                          <h3 class="col s1Â¡2 light pinkFim-opa">!Ãšnete a FIM!</h3>
                        </div>
                        <div class="row center">
                          <h5 class="header col  s1Â¡2 light flow-text pinkFim-opa">'.$row["titulo"].'</h5>
                        </div>
                      </div>
                    </div>';
            $lista.='</li>';
       }
       return $lista;
   }
   
   /*-- ROLES --*/
   
   //Obtiene las funciones con con base al rol del usuario y regresa una lista con cada una de ellas
   function obtenerFunciones(){
       //Arreglo asociativo con el nombre del archivo para cada funciÃ³n.
       $nombresArchivos = [
           "Alumnos" => "con_alumna.php",
           "Inscribir Taller" => "inscribirTaller.php",
           "Talleres" => "taller.php",
           "Noticia" => "modificareliminar_Noticia.php",
           "Galer&iacute;a de Im&aacute;genes" => "imagenesGaleria.php",
           //"Gastos" => "gastos.php",
           "Usuarios" => "consultaUsuario.php",
           "Donaciones" => "https://www.paypal.com/mx/webapps/mpp/home",
           "Informaci&oacute;n Institucional" => "consultaInformacion.php",
        ];
        //Hacer consulta a base de datos para obtener las funciones del usuario
       $rol = $_SESSION["tipoUsuario"];
       $mysql = connectDB();
       $query = 'SELECT * FROM Privilegios p, Gozan g WHERE g.ID_Rol='.$rol.' AND g.ID_Privilegios=p.ID_Privilegios';
       $result = $mysql -> query($query);
       
       //Armar lista con base al resultado de la consulta
       $lista = "";
       while ($row = mysqli_fetch_array($result,MYSQLI_BOTH)) {
            $lista.='<li><a class="waves-effect" href="'.$nombresArchivos[$row["descripcion"]].'">'.$row["descripcion"].'</a></li>';
       }
       
       return $lista;
   }
   
   //Verificar que la sesiÃ³n actual sea de un usuario tipo administrador
   function funcionAdministrador() {
       if ($_SESSION["tipoUsuario"] == 3) {
           return true;
       } else {
           return false;
       }
   }
   
?>
