<?php 
include ('conn.php');
require("mail/class.phpmailer.php");
require("mail/class.smtp.php");
$CorreoNotificador = $_REQUEST['CorreoNotificador']; 
$x=0;
$y=10;
$Strings = '0123456789abcdefghijklmnopqrstuvwxyz';
$Token = substr(str_shuffle($Strings), $x, $y);

    $NombreEntidad = $_REQUEST['NombreEntidad']; 
    $NombreNotifiador = $_REQUEST['NombreNotificador'];
    include("correoToken.php");
    if($EstadoEnvioUsuario == "Exitoso"){
        $insert ="INSERT INTO token_au(`Token`, `NombreEntidad`, `CorreoNotificador`, `NombreNotifiador`) VALUES ('$Token','$NombreEntidad','$CorreoNotificador','$NombreNotifiador')";
    if((!$res= mysqli_query($conn,$insert))){
        
        echo "1 registro exitoso INSERT";
    }else{
        echo "<alert>Error, contactese con el administrador</alert>";
    }
    }else{
        echo "<script>alert('Error ERROR, contactese con el admin insert')</script>";
    }
// }













?>