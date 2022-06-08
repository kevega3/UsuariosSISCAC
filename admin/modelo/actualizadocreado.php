<?php

include 'conn.php';
$buscar = base64_decode($_GET['IdEdit']);
?>
<script>
var buscar = "<?php echo $buscar;?>";
const Editar = window.btoa(buscar);
</script>
<?php
if(filter_var($buscar, FILTER_VALIDATE_INT)=== 0 || !filter_var($buscar, FILTER_VALIDATE_INT) === false){
    $query="UPDATE solicitudes SET IdEstado=4 WHERE IdSolicitud = '$buscar'";
    $res= mysqli_query($conn,$query);

    if(!$res ){
        echo "<script>alert('Error interno, lo sentimos')</script>";
        echo "<script>window.location.replace('../web/pag/aceptados.php?buscar='+ Editar)</script>";
    
    }else{
        echo "<script>alert('Se ha Aceptado la solicitud correctamente')</script>";
        echo "<script>window.location.replace('../web/pag/aceptados.php?buscar='+ Editar)</script>";
    }

}else{
echo "<script>alert('El usuario debe digitar Su C.C')</script>";
session_destroy();
echo "<script>window.location.replace('../index.php')</script>";
die();
}

?>