<?php

include 'conn.php';
require("mail/class.phpmailer.php");
require("mail/class.smtp.php");
//error_reporting(0);
$buscar = base64_decode($_GET['IdEdit']);
$correo= base64_decode($_GET['Correo']);
?>
<script>
var buscar = "<?php echo $buscar;?>";
const Editar = window.btoa(buscar);
const IdUser = window.btoa(id);
</script>
<?php
date_default_timezone_set('America/Bogota');
$fecha = Date('Y-m-d h:i:s');

if(filter_var($buscar, FILTER_VALIDATE_INT)=== 0 || !filter_var($buscar, FILTER_VALIDATE_INT) === false){
    $query="UPDATE solicitudes SET IdEstado=2,FechaSISCAC= '$fecha' WHERE IdSolicitud = $buscar";
    $res= mysqli_query($conn,$query);

    if(!$res ){
        echo "<script>alert('Error Interno Vuelve a intentarlo mas tarde....')</script>";
        echo "<script>window.location.replace('../web/pag/Solicitudes.php)</script>";
    }else{


$mensaje = "prueba";
$destinatario = $correo;

$smtpHost = "smtp.office365.com";  // Dominio alternativo brindado en el email de alta 
$smtpUsuario = "info@cuentadealtocosto.org";  // Mi cuenta de correo
$smtpClave = "jcvxrwvsldpmczhd";  // Mi contrase�a

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Port = 587; 
$mail->IsHTML(true); 
$mail->CharSet = "utf-8";


// VALORES A MODIFICAR //
$mail->Host = $smtpHost; 
$mail->Username = $smtpUsuario; 
$mail->Password = $smtpClave;

//$path = 'upload/'.$_FILES["archivo"]["name"];
//move_uploaded_file($_FILES["archivo"]["tmp_name"],$path);


$mail->From = "info@cuentadealtocosto.org"; // Email desde donde env�o el correo.
$mail->FromName = "Cuenta de Alto Costo";
$mail->AddAddress($destinatario); // Esta es la direcci�n a donde enviamos los datos del formulario
//$mail->AddAttachment($path); 
//$mail->AddAddress($destinatario2);

$mail->Subject = "Usuarios SISCAC"; // Este es el titulo del email.
$mensajeHtml = nl2br($mensaje);
$mail->Body = "
<!DOCTYPE html>
<html lang='es'>
<head>
  <meta charset='UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <title>Mensaje</title>

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    .container {
      max-width: 1000px;
      width: 90%;
      margin: 0 auto;
    }
    .bg-dark {
      background: #efefef;
      margin-top: 40px;
      padding: 20px 0;
    }
    .alert {
      font-size: 1.5em;
      position: relative;
      padding: .75rem 1.25rem;
      margin-bottom: 2rem;
      border: 1px solid transparent;
      border-radius: .25rem;
    }
    .alert-primary {
      color: #fff;
      background-color: #16185b;
      /*
      border-color: #b8daff;
      */
    }

    .img-fluid {
      max-width: 100%;
      height: auto;
    }

    .mensaje {
      width: 80%;
      font-size: 20px;
      margin: 0 auto 40px;
      color: #000;
    }

    .texto {
      margin-top: 20px;
    }

    .footer {
      width: 100%;
      background: #16185b;
      text-align: center;
      color: #fff;
      padding: 10px;
      font-size: 14px;
    }

    .footer span {
      text-decoration: underline;
    }
    .boton{
      padding: 10px 10px 10px 10px;
      border: 1px solid #16185b;
      border-radius: 20px;
      background: #16185b;
      text-decoration: none;
      color: white;
    }
    .boton:hover{
      background: #0e0f35;
      border: 1px solid #0e0f35;
    }
    .contenedorBoton{
      padding: 0% 25%;
    }
    span{
      color: #16185b;
    }

  </style>
</head>
<body>
  <div class='container'>
    <div class='bg-dark'>
      <div class='alert alert-primary'>
        <center>
        <strong>¡Informacion Importante!</strong>
        </center>
      </div>

      <div class='mensaje'>
        <div class='titulo'>
          <h3>Solicitud de Usuario SISCAC  <span>Aceptado</span></h3> 
        </div>
        <br>
        
        <div class='texto'>
          <p>Felicitaciones, su entidad hace parte de la plataforma SISCAC, en el transcurso de 24 horas, se enviara al correo electrónico de cada uno de los usuarios inscritos el usuario y clave de acceso a la plataforma</p> 
        </div>
      </br>
      </br>
      <div class='texto'>
        
      </div>
        
        </br>
      </div>
      <div class='footer'>
        Gracias por su atencion.Atentamente  Cuenta de Alto Costo
      </div>
    </div>
  </div>
</body>
</html>"; // Texto del email en formato HTML
$mail->AltBody = "{$mensaje} \n\n "; // Texto sin formato HTML
// FIN - VALORES A MODIFICAR //

$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
$estadoEnvio = $mail->Send(); 
if($estadoEnvio){
  include('correoparaJuridica.php');
  //echo "<script>window.location.replace('../Web/Pag/Solicitudes.php?buscar='+ Editar +'&id='+ IdUser)</script>";
} else {
    echo "<script>alert('Ocurrio un Error inesperado Vuelva a intentarlo ..')</script>"; 
    // echo "<script>window.location.replace('../web/pag/Solicitudes.php)</script>";
}
  
     }

}else{
echo "<script>alert('El usuario debe digitar Su C.C')</script>";
session_destroy();
echo "<script>window.location.replace('../index.php')</script>";
die();
}

?>