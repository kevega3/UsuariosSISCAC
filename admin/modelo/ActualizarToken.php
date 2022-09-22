<?php 
include ('conn.php');
require("mail/class.phpmailer.php");
require("mail/class.smtp.php");
$CorreoNotificador = $_REQUEST['CorreoNotificador']; 
$x=0;
$y=10;
$Strings = '0123456789abcdefghijklmnopqrstuvwxyz';
$Token = substr(str_shuffle($Strings), $x, $y);


$idRe = $_REQUEST['idRe']; 
$UpbateUser ="UPDATE `token_au` SET `Token`= '$Token' WHERE IdToken = '$idRe'";

    if(!$res = mysqli_query($conn,$UpbateUser)){ 
        echo "<script>alert('Error ERROR, contactese con el admin UPDATE ')</script>";
    }else{
        include("correoToken.php");
        if(($EstadoEnvioUsuario == "Exitoso")){
            echo "1 registro exitoso UPDATE";
        }else{
            echo "<alert>Error, contactese con el administrador</alert>";
        }
    }
    













?>