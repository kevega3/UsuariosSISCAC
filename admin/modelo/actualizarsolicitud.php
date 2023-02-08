<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
include ('conn.php');
include ("mail/class.phpmailer.php");
include ("mail/class.smtp.php");

  class Datos{
    private $dir_subida;
    private $hora;
    private $fecha;
    public $idB;
    
    private $file;
    private $filePDF;
    private $filePDF1;
    private $filePDF2;

    public function validar(){
      if (!file_exists($_FILES['comunicado']['tmp_name']) || !file_exists($_FILES['representante']['tmp_name']) || !file_exists($_FILES['asignacionUsuarios']['tmp_name']))  {
        echo "<script>alert('Error al cargar los archivos. debe de cargar todos los documentos.')</script>";
        // echo "<script>window.location.replace('../web/pag/fromentidades.php')</script>";
      }else{
        if ($_FILES['comunicado']['error'] > 0 || $_FILES['representante']['error'] > 0 || $_FILES['asignacionUsuarios']['error'] > 0) {
          echo "<script>alert('Archivos con errores. Vuelva a intentarlo.')</script>";
          // echo "<script>window.location.replace('../web/pag/fromentidades.php')</script>";
        }else{
          $permitidos = array("application/vnd.openxmlformats-officedocument.spreadsheetml.sheet","application/pdf");
          $limite_kb = 5000;
  
          if (in_array($_FILES['comunicado']['type'], $permitidos) && in_array($_FILES['representante']['type'], $permitidos) && in_array($_FILES['asignacionUsuarios']['type'], $permitidos)) {
            if ($_FILES['comunicado']['size']<=$limite_kb*1024 && $_FILES['representante']['size']<=$limite_kb*1024 && $_FILES['asignacionUsuarios']['size']<=$limite_kb*1024) {
              echo "<script>alert('Paso validaciones ome')</script>";
        
              Datos::ActualizarSoliSQL();		
            }
          }else{
            echo "<script>alert('Uno o más archivos presentan errores en la extensión permitida. Vuelva a intentarlo.')</script>";
          echo "<script>window.location.replace('../form.php')</script>";
          }
        }
      }
    }

    public function Enviarcorreo(){
      include ('conn.php');
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
      
          $smtpHost = "smtp.office365.com";  
          $smtpUsuario = "info@cuentadealtocosto.org"; 
          $smtpClave = "jcvxrwvsldpmczhd";  
      
          $mail = new PHPMailer();
          $mail->IsSMTP();
          $mail->SMTPAuth = true;
          $mail->Port = 587; 
          $mail->IsHTML(true); 
          $mail->CharSet = "utf-8";
      
      
      
          $mail->Host = $smtpHost; 
          $mail->Username = $smtpUsuario; 
          $mail->Password = $smtpClave;
      
      
          $mail->From = "info@cuentadealtocosto.org"; 
          $mail->FromName = "Cuenta de Alto Costo";
          $mail->AddAddress($destinatario); 
      
          $mail->Subject = "Usuarios SISCAC"; 
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
                    <p>La solicitud N°{$id} ha actualizado sus documentos miralos para poder seguir con el proceso</p> 
                  </div>
                </br>
                  
                  </br>
                  <center>
                  
                    <a class='boton' href='http://localhost/UsuariosSISCAC/admin/index.php' target='_blank'>Login</a>
                  
                  </center>
                </div>
                <div class='footer'>
                  Gracias por su atencion.Atentamente  Cuenta de Alto Costo
                </div>
              </div>
            </div>
          </body>
          </html>";
          $mail->AltBody = "{$mensaje} \n\n "; 
      
      
          $mail->SMTPOptions = array(
              'ssl' => array(
                  'verify_peer' => false,
                  'verify_peer_name' => false,
                  'allow_self_signed' => true
              )
          );
          $estadoEnvio = $mail->Send(); 
        if($estadoEnvio){
          echo "<script>
        Swal.fire({
          position: 'center',
          icon: 'success',
          title: 'Se Actualizaron Exitosamente',
          showConfirmButton: false,
          timer: 1500
        });
  
        </script>";
          echo "<script>alert('Paso validaciones  mail ome')</script>";
          echo "<script>window.location.replace('../form.php')</script>";
          }else{
            echo "<alert>alert('Error 001 porfavor contactarse con el admin')</alert>";
            echo "<script>window.location.replace('../form.php')</script>";
          }
      
      }















    }

    public function GetArchivos(){
      $this-> dir_subida = '../files/'.Date('Y')."/".Date('m')."/";
      $this-> hora = Date('his');
      $this-> fecha = Date('Y-m-d h:i:s');
    }
    public function set_archivo($archivo){
      $this->archivo = $archivo;
    }

    public function get_Archivo(){

      include ('conn.php');
      $file=$_FILES['asignacionUsuarios']['name'];
      $filePDF =$_FILES['comunicado']['name'];
      $filePDF1 =$_FILES['representante']['name'];
      // $filePDF2 =$_FILES['funcionarios']['name'];

      $dir_subida = '../../files/'.Date('Y')."/".Date('m')."/";
      $dir_subida2 = '../files/'.Date('Y')."/".Date('m')."/";
      $hora = Date('his');
      $fecha = Date('Y-m-d h:i:s');
      $idB = $_POST['buscar'];
      $query ="SELECT * FROM archivos WHERE IdSolicitud = $idB";

      $res =  mysqli_query($conn,$query);
      while ($fila= mysqli_fetch_array($res)){ 
        $IdArchivo[]=$fila['IdArchivo'];
      }
      if (!file_exists($dir_subida)) {
        mkdir($dir_subida,0777,true);
      }
      if(!empty($file)){
        $archivo_subido = $dir_subida.$hora.basename($_FILES['asignacionUsuarios']['name']);
        $archivo_subidoUl = $dir_subida2.$hora.basename($_FILES['asignacionUsuarios']['name']);

        if (!file_exists($archivo_subido)) {
        if (move_uploaded_file($_FILES['asignacionUsuarios']['tmp_name'],$archivo_subido)) {
            $update = "UPDATE `archivos` SET `Nombre`='$file',`TipoDoc`='1',`Ruta`='$archivo_subidoUl',`FechaSubida`='$fecha',`Estado`=' ' WHERE IdArchivo= '$IdArchivo[1]'";  
            $ejecutar = $conn->prepare($update);
            if ($ejecutar->execute()) {
              $aler1 = "asignacionUsuarios";
            }

          }else{
            $aler1 = "asignacionUsuarios ERROR";
            echo "<script>alert('Error al cargar el archivo ".$file." Vuelva a intentarlo.')</script>";
          }
        }
        }
        
      
      if(!empty($filePDF)){
        	$archivo_subido2 = $dir_subida.$hora.basename($_FILES['comunicado']['name']);
          $archivo_subido2Ul = $dir_subida2.$hora.basename($_FILES['comunicado']['name']);

          if (!file_exists($archivo_subido2)) {
        	if (move_uploaded_file($_FILES['comunicado']['tmp_name'],$archivo_subido2)) {
        		$update2 = "UPDATE `archivos` SET `Nombre`='$filePDF',`TipoDoc`='2',`Ruta`='$archivo_subido2Ul',`FechaSubida`='$fecha',`Estado`=' ' WHERE IdArchivo= '$IdArchivo[3]'";  
        		$ejecutar = $conn->prepare($update2);
        		if ($ejecutar->execute()) {
        		  $aler2 = "comunicado";
        		}
        	}else{
            $aler2 = "comunicado ERROR";
        		echo "<script>alert('Error al cargar el archivo ".$filePDF." Vuelva a intentarlo.')</script>";
        	}
        }
        }

        if(!empty($filePDF1)){
          $archivo_subido3 = $dir_subida.$hora.basename($filePDF1);
          $archivo_subido3Ul = $dir_subida2.$hora.basename($filePDF1);
          if (!file_exists($dir_subida)) {
            mkdir($dir_subida,0777,true);
          }
          if (!file_exists($archivo_subido3)) {
          if (move_uploaded_file($_FILES['representante']['tmp_name'],$archivo_subido3)) {
            
            $update3 = "UPDATE `archivos` SET `Nombre`='$filePDF1',`TipoDoc`='3',`Ruta`='$archivo_subido3Ul',`FechaSubida`='$fecha',`Estado`=' ' WHERE IdArchivo= '$IdArchivo[2]'";  
            $ejecutar = $conn->prepare($update3);
            if ($ejecutar->execute()) {
              $aler3 = "representante";
            }
          }else{
            $aler3 = "representante ERROR";
            echo "<script>alert('Error al cargar el archivo ".$filePDF1." Vuelva a intentarlo.')</script>";
          }
        }
        }
        



        // if(!empty($filePDF2)){
        //   $archivo_subido4 = $dir_subida.$hora.basename($filePDF2);
        //   $archivo_subido4Ul = $dir_subida2.$hora.basename($filePDF2);
        //   if (!file_exists($dir_subida)) {
        //     mkdir($dir_subida,0777,true);
        //   }
        //   if (!file_exists($archivo_subido4)) {
        //   if (move_uploaded_file($_FILES['funcionarios']['tmp_name'],$archivo_subido4)) {
        //     $update4 = "UPDATE `archivos` SET `Nombre`='$filePDF2',`TipoDoc`='4',`Ruta`='$archivo_subido4Ul',`FechaSubida`='$fecha',`Estado`=' ' WHERE IdArchivo= '$IdArchivo[0]'";  
        //     $ejecutar = $conn->prepare($update4);
        //     if ($ejecutar->execute()) {
        //       $aler4 = "funcionarios";
        //     }
        //   }else{
        //     $aler4 = "representante ERROR";
        //     echo "<script>alert('Error al cargar el archivo ".$filePDF2." Vuelva a intentarlo.')</script>";
        //   }
        // }
        // }
        
        
        Datos::Enviarcorreo();		
  
        
    }
    public function ActualizarSoliSQL(){
      include ('conn.php');
      $idB = $_POST['buscar'];
      $query ="SELECT * FROM archivos WHERE IdSolicitud = '$idB'";
      $res =  mysqli_query($conn,$query);
      while ($fila= mysqli_fetch_array($res)){ 
        $IdArchivo[]=$fila['IdArchivo'];
      }
      $ActualizarEstado = "UPDATE `solicitudes` SET `IdEstado`= 1, `CodigoRem`= '' WHERE `IdSolicitud`= '$idB'";
      $ActualizarComentario ="DELETE FROM `comentarios` WHERE IdSolicitud =	'$idB'";
      $ActualizarESTActu= "UPDATE `archivos` SET `Estado` = 'Actualizado' WHERE `archivos`.`IdSolicitud` = '$idB'";
      $EjecutarDetele = $conn->prepare($ActualizarComentario);
      $ejecutar = $conn->prepare($ActualizarEstado);

      if ($ejecutar->execute()) {
        Datos::get_Archivo();		
        echo "<script>alert('Get_archivo')</script>";     
      }
      else{
        echo"Error inesperado, Vuelve a intentarlo mas tarde";
      }

      }

    }

    $gestionar = new Datos();
    $gestionar->validar();
  



?>