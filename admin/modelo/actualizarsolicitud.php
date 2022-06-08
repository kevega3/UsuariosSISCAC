
<?php
include ('conn.php');
include ("mail/class.phpmailer.php");
include ("mail/class.smtp.php");
$id = $_POST['buscar']; 
$BuscarCorreo ="SELECT * FROM usuarios WHERE TipoUser ='Juridica'";

$res= mysqli_query($conn,$BuscarCorreo);
if(mysqli_num_rows($res)==0){


}else{
	while ($fila= mysqli_fetch_array($res)) {
		$Correo = $fila['Correo'];   
	}
	$mensaje = "prueba";
$destinatario = $Correo;
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
        <strong>Nuevo Usuario Creado</strong>
        </center>
      </div>

      <div class='mensaje'>
        <div class='titulo'>
          <h3>Actualización de Documentos</h3> 
        </div>
        <br>
        <div class='texto'>
          <p>La solicitud N°{$id} a actualizado sus documentos miralos para poder seguir con el proceso</p> 
        </div>
      </br>
        
        </br>
        <center>
        
          <a class='boton' href='https://cuentadealtocosto.org/siscac_users/admin/index.php' target='_blank'>Login</a>
        
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
} else {
    echo "<script>alert('Ocurrio un Error inesperado Vuelva a intentarlo ..')</script>"; 
    
}

$file = $_FILES['asignacionUsuarios']['name']; 
$filePDF = $_FILES['comunicado']['name']; 
$filePDF1 = $_FILES['representante']['name']; 
$filePDF2 = $_FILES['funcionarios']['name']; 
$dir_subida = '../files/'.Date('Y')."/".Date('m')."/";

$hora = Date('his');
$fecha = Date('Y-m-d h:i:s');
$query ="SELECT * FROM archivos WHERE IdSolicitud = $id";
	$res =  mysqli_query($conn,$query);
	while ($fila= mysqli_fetch_array($res)){ 
		$IdArchivo[]=$fila['IdArchivo'];
	}



$ActualizarEstado = "UPDATE `solicitudes` SET `IdEstado`= 1, `CodigoRem`= '' WHERE `IdSolicitud`= $id";
$ActualizarComentario ="DELETE FROM `comentarios` WHERE IdSolicitud =	$id";
$ActualizarESTActu= "UPDATE `archivos` SET `Estado` = 'Actualizado' WHERE `archivos`.`IdSolicitud` = $id";

$EjecutarDetele = $conn->prepare($ActualizarComentario);
$ejecutar = $conn->prepare($ActualizarEstado);

if ($ejecutar->execute()) {
	// CARGAR Y ACTUALIZACION PRIMER FICHERO
if(!empty($file)){
	$archivo_subido = $dir_subida.$hora.basename($_FILES['asignacionUsuarios']['name']);
	if (!file_exists($dir_subida)) {
		mkdir($dir_subida,0777,true);
	}
	if (move_uploaded_file($_FILES['asignacionUsuarios']['tmp_name'],'../'.$archivo_subido)) {

		$update = "UPDATE `archivos` SET `Nombre`='$file',`TipoDoc`='1',`Ruta`='$archivo_subido',`FechaSubida`='$fecha',`Estado`=' ' WHERE IdArchivo= '$IdArchivo[1]'";  
		$ejecutar = $conn->prepare($update);
		if ($ejecutar->execute()) {
			// echo "Archivo subido a bd1.";
			// echo"</br>";
		}

	}else{
		echo "<script>alert('Error al cargar el archivo ".$file." Vuelva a intentarlo.')</script>";
	}
	
}
else{
	// echo"archivos no cargados";
	// echo"</br>";
}
// FIN CARGAR Y ACTUALIZACION PRIMER FICHERO














// CARGAR Y ACTUALIZACION PRIMER FICHERO
if(!empty($filePDF)){
	$archivo_subido2 = $dir_subida.$hora.basename($_FILES['comunicado']['name']);
	if (!file_exists($dir_subida)) {
		mkdir($dir_subida,0777,true);
	}
	if (move_uploaded_file($_FILES['comunicado']['tmp_name'],'../'.$archivo_subido2)) {
		$update2 = "UPDATE `archivos` SET `Nombre`='$filePDF',`TipoDoc`='2',`Ruta`='$archivo_subido2',`FechaSubida`='$fecha',`Estado`=' ' WHERE IdArchivo= '$IdArchivo[3]'";  
		$ejecutar = $conn->prepare($update2);
		if ($ejecutar->execute()) {
			// echo "Archivo subido a bd2.";
			// echo"</br>";
		}
	}else{
		echo "<script>alert('Error al cargar el archivo ".$filePDF." Vuelva a intentarlo.')</script>";
	}
}
else{
	// echo"archivos no cargados";
	// echo"</br>";
}
// FIN CARGAR Y ACTUALIZACION PRIMER FICHERO











// CARGAR Y ACTUALIZACION PRIMER FICHERO
if(!empty($filePDF1)){
	$archivo_subido3 = $dir_subida.$hora.basename($_FILES['representante']['name']);
	if (!file_exists($dir_subida)) {
		mkdir($dir_subida,0777,true);
	}
	if (move_uploaded_file($_FILES['representante']['tmp_name'],'../'.$archivo_subido3)) {
		$update3 = "UPDATE `archivos` SET `Nombre`='$filePDF1',`TipoDoc`='3',`Ruta`='$archivo_subido3',`FechaSubida`='$fecha',`Estado`=' ' WHERE IdArchivo= '$IdArchivo[2]'";  
		$ejecutar = $conn->prepare($update3);
		if ($ejecutar->execute()) {
			// echo "Archivo subido a bd3.";
			// echo"</br>";
		}
	}else{
		echo "<script>alert('Error al cargar el archivo ".$filePDF." Vuelva a intentarlo.')</script>";
	}
}
else{
	// echo"archivos no cargados";
	// echo"</br>";
}
// FIN CARGAR Y ACTUALIZACION PRIMER FICHERO











// CARGAR Y ACTUALIZACION PRIMER FICHERO
if(!empty($filePDF2)){
	$archivo_subido4 = $dir_subida.$hora.basename($_FILES['funcionarios']['name']);
	if (!file_exists($dir_subida)) {
		mkdir($dir_subida,0777,true);
	}
	if (move_uploaded_file($_FILES['funcionarios']['tmp_name'],'../'.$archivo_subido4)) {
		$update4 = "UPDATE `archivos` SET `Nombre`='$filePDF2',`TipoDoc`='4',`Ruta`='$archivo_subido4',`FechaSubida`='$fecha',`Estado`=' ' WHERE IdArchivo= '$IdArchivo[0]'";  
		$ejecutar = $conn->prepare($update4);
		if ($ejecutar->execute()) {
			// echo "Archivo subido a bd.4";
			// echo"</br>";
		}
	}else{
		echo "<script>alert('Error al cargar el archivo ".$filePDF." Vuelva a intentarlo.')</script>";
	}
}
else{
	//  echo"archivos no cargados";
	//  echo"</br>";
}
// FIN CARGAR Y ACTUALIZACION PRIMER FICHERO




	echo "<script>alert('Se ha Actualizado la informacion correctamente')</script>";
	//session_destroy();
	echo "<script>window.location.replace('../form.php')</script>";

}
else{
	echo"Error inesperado, Vuelve a intentarlo mas tarde";
}


//Final
}

