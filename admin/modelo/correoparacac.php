<?php 

$BucarCorreoCAC = "SELECT * FROM `usuarios` WHERE IdUsuario = '21' ";

$res= mysqli_query($conn,$BucarCorreoCAC);

while ($fila= mysqli_fetch_array($res)) {
    $correoCAC = $fila['Correo'];   
}
$mensaje2 = "prueba";
$destinatario2 = $correoCAC;
// $destinatario = 'kvega@cuentadealtocosto.org';

//$destinatario2 = "medioscac@cuentadealtocosto.org";
// Datos de la cuenta de correo utilizada para enviar v�a SMTP
$smtpHost = "smtp.office365.com";  // Dominio alternativo brindado en el email de alta 
$smtpUsuario = "info@cuentadealtocosto.org";  // Mi cuenta de correo
$smtpClave = "jcvxrwvsldpmczhd";  // Mi contrase�a

$mail2 = new PHPMailer();
$mail2->IsSMTP();
$mail2->SMTPAuth = true;
$mail2->Port = 587; 
$mail2->IsHTML(true); 
$mail2->CharSet = "utf-8";


// VALORES A MODIFICAR //
$mail2->Host = $smtpHost; 
$mail2->Username = $smtpUsuario; 
$mail2->Password = $smtpClave;

//$path = 'upload/'.$_FILES["archivo"]["name"];
//move_uploaded_file($_FILES["archivo"]["tmp_name"],$path);


$mail2->From = "info@cuentadealtocosto.org"; 
$mail2->FromName = "Cuenta de Alto Costo";
$mail2->AddAddress($destinatario2); // Esta es la direcci�n a donde enviamos los datos del formulario
//$mail->AddAttachment($path); 
//$mail->AddAddress($destinatario2);

$mail2->Subject = "Usuarios SISCAC"; // Este es el titulo del email.
$mensajeHtml = nl2br($mensaje2);
$mail2->Body = "
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
    .btnLogin{
        border: solid 1px #17309C;
        padding: 10px;
        border-radius:10px;
        background:#17309C;
        color:white ;
        text-decoration:none;
    }

  </style>
</head>
<body>
  <div class='container'>
    <div class='bg-dark'>
      <div class='alert alert-primary'>
        <center>
        <strong>¡Nueva Solicitud de usuario SISCAC!</strong>
        </center>
      </div>

      <div class='mensaje'>
        <div class='titulo'>
          <h3>Solicitud de Usuario SISCAC  <span>Pendiente</span></h3> 
        </div>
        <br>
        
        <div class='texto'>
          <p>Tienes una nueva solicitud de usuario SISCAC pendiente mira la solicitud aquí.</p> 
        </div>
      </br>
      </br>
      <div>
          <center>
        <a href='https://cuentadealtocosto.org/siscac_users/admin/index.php' class='btnLogin'>Login</a>
        </center>
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
$mail2->AltBody = "{$mensaje2} \n\n "; // Texto sin formato HTML
// FIN - VALORES A MODIFICAR //

$mail2->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
$estadoEnvio2 = $mail2->Send(); 
if($estadoEnvio2){
    echo "<>alert('Se acepto la solicitud exitosamente')</script>";
    echo "<script>window.location.replace('../web/pag/juridica.php?buscar='+ Editar)</script>";
} else {
    echo "<script>alert('Ocurrio un Error inesperado Vuelva a intentarlo ..')</script>"; 
    echo "<script>window.location.replace('../web/pag/juridica.php?buscar='+ Editar)</script>";
}

echo "<script>alert('entro aqui')</script>";
?>