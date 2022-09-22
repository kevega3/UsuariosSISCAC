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
    <title>Aceptado <?php echo $buscar ?></title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
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
    
    <link rel="stylesheet" href="../../web/css/infoaceptado.css">
</head>

<body style="
font-family: 'Montserrat', sans-serif;">
    </style>
    <!-- <div class="" id="contenedor_carga">
        <div id="carga"></div>
    </div> -->
    <?php
        $query ="SELECT s.IdSolicitud,s.IdTipoEntidad, t.DescripcionEntidad,s.NIT,s.NumVNIT,s.Nombre,s.RepresentanteLegal,s.Cargo,s.Correo,s.Telefono,s.FechaCreacion,a.IdSolicitud,s.IdEstado,e.Descripcion FROM solicitudes s INNER JOIN tipoentidad t  ON s.IdTipoEntidad = t.IdTipoEntidad INNER JOIN estados e ON e.IdEstado = s.IdEstado INNER JOIN archivos a ON  a.IdSolicitud =  s.IdSolicitud  WHERE s.IdSolicitud ='$buscar'";
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
        }
    ?>

    <section>
        <?php include('navProvi.php')?>
    </section>


<div class="rowSolicitud">

    <div class="col-6 tituloConsultas ">
        <img src="../../img/simbolo_cac_color.png" alt="" style="width:60px;">
        <h1>Aceptado N°<?php echo $IdSolicitud?></h1>
    </div>

    <!-- <div class="col-5 MoverDerechacentrar">
        
            <button aria-current="page" class="btnCrear" name="<?php echo $buscar?>" id="Creado" onclick="Creado()">
                Creado
            </button>
        
    </div> -->
</div>













    <div class=" contenedorInfo">
        <center>
            <section class="col-12">
                <?php include('plantillas/tablainfo.php')?>
            </section>
        </center>
    </div>



    <script>
    var id = "<?php echo $id;?>";
    </script>
    <?php if( $TipoUser == 'CAC'){
                    ?>
    <div class="rowSolicitud">
        <div class="col-6 ">
            <?php	include 'plantillas/archivoscargados.php'; ?>
        </div>
        <div class="col-6 MoverDerechacentrar">
            <button aria-current="page" class="btnCrear" name="<?php echo $buscar?>" id="Creado" onclick="Creado()">
                ¿ Ya se creo ?
            </button>
        </div>
    </div>
    <?php }?>







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

    <script src="../js/bootstrap.bundle.min.js"></script>
    <!--Fonazome-->
    <script src="https://kit.fontawesome.com/c4cc899971.js" crossorigin="anonymous"></script>


</body>

</html>