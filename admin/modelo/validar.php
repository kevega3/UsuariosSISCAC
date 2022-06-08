<?php 

//require_once("modeloValidar.php");
require("conn.php");

$usuario = trim($_REQUEST['usuario']);
$contraseña= trim($_REQUEST['contraseña']);

$contraseña = filter_var($contraseña, FILTER_SANITIZE_STRING);

if(filter_var($usuario, FILTER_VALIDATE_INT)=== 0 || !filter_var($usuario, FILTER_VALIDATE_INT) === false){

$query="SELECT * FROM usuarios WHERE CC = '$usuario' AND (SELECT MD5('$contraseña'))";
$res= mysqli_query($conn,$query);


if(!$res || mysqli_num_rows($res)==0){
    
    echo "<script>alert('Este usuario no existe ')</script>";
    echo "<script>window.location.replace('../index.php')</script>";
    exit;
}
else{
    while ($fila= mysqli_fetch_array($res)) {
        $id= $fila['IdUsuario']; 
    }
        session_start();
        $_SESSION['id'] = $id;
        $_SESSION['usuario']='usuario';       
        // header("location: ../Web/Pag/inicio.php?id=". base64_encode($id));
        header("location: ../web/pag/inicio.php");
    
}

        }else{       
        echo "<script>alert('El usuario debe digitar Su C.C')</script>";
        echo "<script>window.location.replace('../index.php')</script>";
    }
?>