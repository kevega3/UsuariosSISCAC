<?php

include('../admin/modelo/conn.php');
session_start();
if(empty($_SESSION['id']) || empty($_SESSION['entidad'])){
    echo "<script>alert('No has iniciado sesion, porfavor logearse')</script>";
    session_destroy();
    echo "<script>window.location.replace('../index.php')</script>";
    exit;
}else{
    $varsesion = $_SESSION['entidad'];
    $buscar = $_SESSION['id'];

    $varQuery ="SELECT * FROM `token_au` WHERE IdToken = '$buscar'";
    $res =  mysqli_query($conn,$varQuery);
    if($varsesion == null || $varsesion = '' ||  mysqli_num_rows($res)==0)
        {
        echo "<script>alert('Debe Digitar el codigo asignado para poder acceder')</script>";
        session_destroy();
        echo "<script>window.location.replace('../index.php')</script>";
        exit;
    }else{
        $varQuery2 = "SELECT s.IdSolicitud,s.IdAsignadoA,s.CodigoRem, a.IdArchivo, a.Nombre, a.Ruta,a.Estado,c.Comentario,c.IdSolicitud FROM solicitudes s INNER JOIN comentarios c ON s.IdSolicitud=c.IdSolicitud INNER JOIN archivos a ON s.IdSolicitud= a.IdSolicitud WHERE s.IdSolicitud = '$buscar'";
        $res2 =  mysqli_query($conn,$varQuery2);
        while ($fila2= mysqli_fetch_array($res2)) {
            $Estado[]=$fila2['Estado'];
            $Comentario=$fila2['Comentario'];
            $IdArchivo[]=$fila2['IdArchivo'];
        }
    
    $inactividad = 600;
    if(isset($_SESSION["timeout"])){
        // Calcular el tiempo de vida de la sesión (TTL = Time To Live)
        $sessionTTL = time() - $_SESSION["timeout"];
        if($sessionTTL > $inactividad){
            
            echo "<script>alert('Debes volverte a loguear')</script>";
            session_destroy();
            echo "<script>window.location.replace('../index.php')</script>";
            die();
        }
    }
    $_SESSION["timeout"] = time(); 
    }
    

}



?>