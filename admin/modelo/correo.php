  <?php    
error_reporting(0);
require("mail/class.phpmailer.php");
require("mail/class.smtp.php");
require("conn.php");
// = trim($_REQUEST['Test']);
$Adjunto = utf8_decode(html_entity_decode($_POST['Test']));
$buscar= trim($_POST['buscar']);

$correo= trim($_POST['correo']);
$AsgU= trim($_POST['AsgU']);
  $SoliU= trim($_POST['SoliU']);
   $Rel= trim($_POST['Rel']);
   $DaFun= trim($_POST['DaFun']);
   $Fecha = date('Y-m-d', time());
   
$x=0;
$y=5;
$Strings = '0123456789abcdefghijklmnopqrstuvwxyz';
$clave = substr(str_shuffle($Strings), $x, $y);

if(empty($AsgU)){
  $Estado= "Cumple";
  }
  elseif(isset($AsgU)){
  $Estado ="No Cumple";
  }
  $query1 ="UPDATE archivos SET Estado='$Estado' WHERE IdArchivo = '$AsgU'";
  $res= mysqli_query($conn,$query1);


  if(empty($SoliU)){
     $Estado= "Cumple";
     }
     elseif(isset($SoliU)){
     $Estado ="No Cumple";
     }
     
     $query2 ="UPDATE archivos SET Estado='$Estado' WHERE IdArchivo = '$SoliU'";

     $res= mysqli_query($conn,$query2);

  
     if(empty($Rel)){
        $Estado= "Cumple";
        }
        elseif(isset($Rel)){
        $Estado ="No Cumple";
        }
        $query3 ="UPDATE archivos SET Estado='$Estado' WHERE IdArchivo = '$Rel'";
        $res= mysqli_query($conn,$query3);

        if(empty($DaFun)){
           $Estado= "Cumple";
           }
           elseif(isset($DaFun)){
           $Estado ="No Cumple";
           }
           $query4 ="UPDATE archivos SET Estado='$Estado' WHERE IdArchivo = '$DaFun'";
           $res= mysqli_query($conn,$query4);
        

?>
  <script>
var buscar = "<?php echo $buscar;?>";
const Editar = window.btoa(buscar);
  </script>

  <?php

$query="UPDATE solicitudes SET IdEstado=3,CodigoRem='$clave' WHERE IdSolicitud = '$buscar'";

$res= mysqli_query($conn,$query);

$query4="INSERT INTO comentarios(IdSolicitud, FechaCreacion,Comentario) VALUES ('$buscar','$Fecha','$Adjunto')";
$res= mysqli_query($conn,$query4);
if(!$res ){
  echo "<script>alert('Error interno, vuelve a intentarlo mas tarde ...')</script>";
  echo "<script>window.location.replace('../web/pag/tablajuridica.php?buscar='+ Editar)</script>";
}else{
  
// $Adjunto = filter_var($Adjunto, FILTER_SANITIZE_STRING);

$mensaje = "prueba";
$destinatario = $correo;
// $destinatario = 'kvega@cuentadealtocosto.org';

//$destinatario2 = "medioscac@cuentadealtocosto.org";
// Datos de la cuenta de correo utilizada para enviar v�a SMTP
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
$mail->Body = "<!DOCTYPE html>
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
          <h3>Solicitud de Usuario SISCAC  <span>Pendiente</span></h3> 
        </div>
        <br>
        <div class='texto'>
          <p>Su solicitud se encuentra en pendiente de aprobación debido a:</p> 
        </div>
      </br>
      <div class='texto'>
         {$Adjunto}  
      </div>
      </br>
      <div class='texto'>
        <p>Ingrese a la siguiente pagina con el siguiente codigo  <strong>{$clave}</strong> para actualizar sus documentos
           <span><b>Este codigo no lo debe compartir con ninguna persona o entidad.</b></span> 
        </p> 
      </div>
        
        </br>
        <center>
          <a class='boton' href='https://cuentadealtocosto.org/siscac_users/admin/form.php' target='_blank'>Actualizar Datos</a>
        </center>
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
  echo "<script>alert('Se ha Negado la solicitud exitosamente')</script>";
  echo "<script>window.location.replace('../web/pag/juridica.php')</script>";

} else {
    echo "<script>alert('Ocurrio un Error inesperado Vuelva a intentarlo ..')</script>"; 
    echo "<script>window.location.replace('../web/pag/juridica.php')</script>";
}
}

?>