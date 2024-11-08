<?php 
include '../../modelo/conn.php';
include '../../modelo/autenticaruser.php';
$buscar= base64_decode($_POST['buscar']); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rechazado <?php echo $buscar ?></title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--Fuentes-->
    <!--Titulo-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;1,700&display=swap"
        rel="stylesheet">
    <link rel="icon" href="../../img/simbolo_cac_color.png">
    <!--Css propios -->
    <link rel="stylesheet" href="../../web/css/reload.css">
    <link rel="stylesheet" href="../../web/css/styles.css">
    <link rel="stylesheet" href="../../web/css/nav.css">
    <link rel="stylesheet" href="../../web/css/footer.css">
    <link rel="stylesheet" href="../../web/css/footer.css">
    <link rel="stylesheet" href="../../web/css/inforechazado.css">
</head>

<body style="
font-family: 'Montserrat', sans-serif;">
    </style>
    <div class="" id="contenedor_carga">
        <div id="carga"></div>
    </div>
    <?php
        $query ="SELECT DISTINCT s.IdSolicitud,s.IdTipoEntidad, t.DescripcionEntidad,s.NIT,s.NumVNIT,s.Nombre,s.RepresentanteLegal,s.Cargo,s.Correo,s.Telefono,s.FechaCreacion,a.IdSolicitud,s.IdEstado,e.Descripcion, c.Comentario FROM solicitudes s INNER JOIN tipoentidad t  ON s.IdTipoEntidad = t.IdTipoEntidad INNER JOIN estados e ON e.IdEstado = s.IdEstado  INNER JOIN comentarios c ON  c.IdSolicitud =  s.IdSolicitud INNER JOIN archivos a ON  a.IdSolicitud =  s.IdSolicitud  WHERE s.IdSolicitud = '$buscar' " ;
        
        $res = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($res)) {
            $DescripEntidad = $row['DescripcionEntidad']; 
            $representante = $row['RepresentanteLegal']; 
            $NIT = $row['NIT'];
            $NumVNIT = $row['NumVNIT'];
            $Nombre = $row['Nombre'];
            $Telefono = $row['Telefono'];  
            $FechaCreacion = $row['FechaCreacion'];
            $IdSolicitud = $row ['IdSolicitud'];
            $Cargo = $row ['Cargo'];
            $Correo = $row ['Correo'];
            $Estado = $row ['Descripcion'];
            $Comentario = $row ['Comentario'];
        }
    ?>

    <section>
        <?php include('navProvi.php')?>
    </section>



    <div class="tituloConsultas">
        <img src="../../img/simbolo_cac_color.png" alt="" style="width:60px;">
        <h1>Solicitud N°<?php echo $IdSolicitud?> <span class="negada">NEGADA</span></h1>
    </div>




    <section  class="contenedorInfo">
        <center>
        <?php  include 'plantillas/tablainfo.php'?>
        </center>
    </section>

    <section>
        
        <?php include 'plantillas/rechacomentario.php'?>
        
    </section>






    <footer>
        <?php  include 'footer.html'?>
    </footer>











    <script>
    window.onload = function() {
        var contenedor = document.getElementById('contenedor_carga');
        contenedor.style.visibility = 'hidden';
        contenedor.style.opacity = '0';
    }
    </script>

    <!--Alertas -->

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js/alert.js"></script>
    <!---->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <!--Fonazome-->
    <script src="https://kit.fontawesome.com/c4cc899971.js" crossorigin="anonymous"></script>


</body>

</html>