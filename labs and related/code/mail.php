<?php
if(isset($_POST['txtMail'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "fimqroiap@gmail.com";
    $email_subject = "Nueva petición de contacto recibida.";
 
    function died($error) {
        // your error code can go here
        echo "Lo sentimos, existen errores en la forma que envi&oacute;. ";
        echo "Los errores son los siguientes.<br /><br />";
        echo $error."<br /><br />";
        echo "Por favor regresar y corregir estos errores.<br /><br />";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['txtName']) ||
        !isset($_POST['txtMail']) ||
        !isset($_POST['txtTelefono']) ||
        !isset($_POST['comentarios'])) {
        died('Lo sentimos, existen errores en la forma que envi&oacute;.');       
    }
 
     
 
    $name = $_POST['txtName']; // required
    //$last_name = $_POST['last_name']; // required
    $email_from = $_POST['txtMail']; // required
    $telephone = $_POST['txtTelefono']; // not required
    $comments = $_POST['comentarios']; // required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'El eMail ingresado no es v&aacute;lido.<br />';
  }
 
  /*  $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$name)) {
    $error_message .= 'El nombre ingresado no es v&aacute;lido.<br />';
  }*/
 
  //if(!preg_match($string_exp,$last_name)) {
  //  $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
  //}
 
  if(strlen($comments) < 2) {
    $error_message .= 'El mensaje ingresado no es v&aacute;lido.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Detalles de la forma.\n\n";
 
     
  function clean_string($string) {
    $bad = array("content-type","bcc:","to:","cc:","href");
    return str_replace($bad,"",$string);
  }
 
     
 
    $email_message .= "Nombre: ".clean_string($name)."\n";
    //$email_message .= "Last Name: ".clean_string($last_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Tel&eacute;fono: ".clean_string($telephone)."\n";
    $email_message .= "Mensaje: ".clean_string($comments)."\n";
 
// create email headers
$headers = 'De: '.$email_from."\r\n".
'Responder a: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
<!-- include your own success html here -->
<?php
 
  include("_head.html");
  include ("_header.html");
  include ("_main.html");
 
            echo '<div id="modalError" class="modal">
                <div class="modal-content">
                    <h4>Éxito en contacto</h4>
                    <h5>Mensaje enviado exitosamente.</h5>
                </div>
                <div class="modal-footer">
                    <a href="#!" class="modal-action modal-close btn-flat">Ok</a>
                </div>
            </div>';
        
        include("_footer.html");
        echo '<script type="text/javascript">
        window.onload = function() {
            if (document.getElementById("modalError")) {
                $("#modalError").modal("open");
            }
        }
        </script>';
            }
   ?>             
 
