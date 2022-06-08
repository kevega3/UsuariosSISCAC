<?php 

require("conn.php");
require("keys.php");
if ($_POST['entrar']) {

    $googleToken = $_POST['entrar'];

    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".SECRET_KEY."&response={$googleToken}");
    $response = json_decode($response);

    $response = (array) $response;

    if($response['success'] && ($response['score'] && $response['score'] > 0.5)){ 
		
   



$codigo = trim($_REQUEST['codigo']);
$codigo = filter_var($codigo, FILTER_SANITIZE_STRING);



$query="SELECT * FROM solicitudes WHERE CodigoRem = '$codigo'";
$res= mysqli_query($conn,$query);


if(!$res || mysqli_num_rows($res)==0){
    
    echo "<script>alert('El codigo es incorrecto, Vuelve a intentarlo')</script>";
    echo "<script>window.location.replace('../form.php')</script>";
    exit;
}
else{
    while ($fila= mysqli_fetch_array($res)) {
        $id = $fila['IdSolicitud'];   
    }   
        session_start();
        $_SESSION['id'] = $id;
        $_SESSION['entidad']='entidad';
        header("location: ../web/pag/fromentidades.php");
           
}

}else{
    echo "<script>alert('Vuelve a intentarlo')</script>";
    echo "<script>window.location.replace('../form.php')</script>";
}

}else{
echo "<script>alert('Vuelve a intentarlo...')</script>";
echo "<script>window.location.replace('../form.php')</script>";
}



?>