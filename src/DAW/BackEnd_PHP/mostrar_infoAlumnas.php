<?php
    session_start();
    include_once("util.php");
    if (checkSession()) {
        include("_head.html");
        include ("_headerAdmin.html");
        $idAlumna = $_GET["id"];
        echo "<div class='content administrativo'> <h1> Alumna </h1> </div>";
        
        if($_GET["id"] != ""){
        
        /*-------------Mostrar tabla de información personal---------*/
        $tabla='';
            $tabla = "<div class='content administrativo'> 
            <div style='display: block; overflow-x: auto; white-space: nowrap;'>
            <fieldset><h3> Información Personal </h3>  <table class='bordered striped centered  '>";
            $tabla.='<thead>
                    <tr>
                    <th data-field=""> Nombre </th>
                    <th data-field="">Apellido</th>
                    <th data-field="">Calle y número</th>
                    <th data-field="">Colonia</th>
                    <th data-field="">Código Postal</th>
                    <th data-field="">Municipio</th>
                    <th data-field="">Ocupación</th>
                    <th data-field="">Estado civil</th>
                    <th data-field="">Nacimiento</th>
                    <th data-field="">Género</th>
                    <th data-field="">Tel. Casa</th>
                    <th data-field="">Celular</th>
                    <th data-field="">Estatus</th>
                    <th data-field="">Contacto Emergencia</th>
                    <th data-field="">Tel. Emergencia</th>
                    <th data-field="">Como se enteró de FIM</th>
                    </tr>
                </thead>
                <tbody>';
                
            $tabla.= tablaInfoAlumnas($_GET["id"]);
            $tabla.= "</tbody></table></div></fieldset><br></div>";
            echo $tabla;
        

        /*--------------Información académica--------------*/
        
        $tabla='';
            $tabla = "<div class='content administrativo'> 
            <div style='display: block; overflow-x: auto; white-space: nowrap;'>
            <fieldset><h3> Información Académica </h3>  <table class='bordered striped centered  '>";
            $tabla.='<thead>
                    <tr>
                    <th data-field=""> Grado de estudios </th>
                    <th data-field=""> Estatus de estudios </th>
                    <th data-field="">Año de suspensión </th>
                    <th data-field="">Motivo de suspensión</th>
                    <th data-field="">Otros estudios</th>
                    </tr>
                </thead>
                <tbody>';
                
            $tabla.= tablaInfoAcademica($_GET["id"]);
            $tabla.= "</tbody></table></div></fieldset><br></div>";
            echo $tabla;
        
        /*--------------Información laboral--------------*/
        
        $tabla='';
            $tabla = "<div class='content administrativo'> 
            <div style='display: block; overflow-x: auto; white-space: nowrap;'>
            <fieldset><h3> Información Laboral </h3>  <table class='bordered striped centered  '>";
            $tabla.='<thead>
                    <tr>
                    <th data-field=""> Empresa </th>
                    <th data-field=""> Puesto </th>
                    <th data-field=""> Antiguedad </th>
                    </tr>
                </thead>
                <tbody>';
                
            $tabla.= tablaInfoLaboral($_GET["id"]);
            $tabla.= "</tbody></table></div></fieldset><br></div>";
            echo $tabla;
        
        /*--------------Herramientas tecnológicas--------------*/
        
        $tabla='';
            $tabla = "<div class='content administrativo'> 
            <div style='display: block; overflow-x: auto; white-space: nowrap;'>
            <fieldset><h3> Herramientas Tecnológicas Disponibles </h3>  <table class='bordered striped centered  '>";
            $tabla.='<thead>
                    <tr>
                    <th data-field=""> Acceso a Internet </th>
                    <th data-field=""> Herramientas Tecnológicas </th>
                    </tr>
                </thead>
                <tbody>';
                
            $tabla.= tablaInfoHerramientas($_GET["id"]);
            $tabla.= "</tbody></table></div></fieldset><br></div>";
            echo $tabla;
        
        /*--------------Situación Económica-Familiar--------------*/
        
        $tabla='';
            $tabla = "<div class='content administrativo'> 
            <div style='display: block; overflow-x: auto; white-space: nowrap;'>
            <fieldset><h3> Situación Económica-Familiar </h3>  <table class='bordered striped centered  '>";
            $tabla.='<thead>
                    <tr>
                    <th data-field=""> Vivienda compartida </th>
                    <th data-field=""> Responsable de pago </th>
                    <th data-field=""> Parentesco </th>
                    <th data-field=""> Situació de vivienda </th>
                    <th data-field=""> Fuente de ingresos </th>
                    <th data-field=""> Monto de ingresos </th>
                    <th data-field=""> Servicios </th>
                    </tr>
                </thead>
                <tbody>';
                
            $tabla.= tablaInfoSituacion($_GET["id"]);
            $tabla.= "</tbody></table></div></fieldset><br></div>";
            echo $tabla;

        }
        
        include("_footer.html");
        
    } else {
        header("Location:admin.php?sessionexpired=true");
    }

?>