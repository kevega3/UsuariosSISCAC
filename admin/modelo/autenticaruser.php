<?php 


session_start();
if(empty($_SESSION['id']) || empty($_SESSION['usuario'])){
    echo "<script>alert('No has iniciado sesion, porfavor logearse')</script>";
    session_destroy();
    echo "<script>window.location.replace('../../index.php')</script>";
    exit;
}else{
$id =  $_SESSION['id'];
$varsesion = $_SESSION['usuario'];

$varQuery ="SELECT * FROM usuarios WHERE idUsuario=$id";
$res =  mysqli_query($conn,$varQuery);

if($varsesion == null || $varsesion = '' ||  mysqli_num_rows($res)==0){
   
    echo "<script>alert('No has iniciado sesion, porfavor logearse')</script>";
    session_destroy();
    echo "<script>window.location.replace('../../index.php')</script>";
    exit;
}else{
    
    while ($fila= mysqli_fetch_array($res)) {
        $TipoUser = $fila['TipoUser']; 
        $NombreCompleto = $fila['NombreCompleto'];
    }
    //  $inactividad = 600;
    //  if(isset($_SESSION["timeout"])){
    //     // Calcular el tiempo de vida de la sesión (TTL = Time To Live)
    //     $sessionTTL = time() - $_SESSION["timeout"];
    //     if($sessionTTL > $inactividad){
            
    //         echo "<script>alert('Debes volverte a loguear')</script>";
    //         session_destroy();
    //         echo "<script>window.location.replace('../../index.php')</script>";
    //         die();
    //     }
    // }
    // $_SESSION["timeout"] = time(); 
    
}  


}
?>