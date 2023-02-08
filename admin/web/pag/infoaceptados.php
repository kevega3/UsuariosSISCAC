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
    <link rel="stylesheet" href="../../web/css/textareacorreo.css">
    <!-- Script comentario -->
    <link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.7/quill.js"></script>
    <link rel="stylesheet" href="//cdn.quilljs.com/0.20.1/quill.snow.css" />
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
        <div class="col-6 tituloConsultas">
            <img src="../../img/simbolo_cac_color.png" alt="" style="width:60px;">
            <h1>Aceptado N°<?php echo $IdSolicitud?></h1>
        </div>
        <?php if($TipoUser == 'Juridica' || $TipoUser == 'Admin'){

        ?>

        <div class="col-5">
            <?php include 'plantillas/funcionesbton.php'; ?>
        </div>
        <?php
    } ?>
    </div>


    <?php 
    if($TipoUser == 'Juridica' || $TipoUser == 'Admin'){
        ?>


    <div class="container-fluid">
        <div class="rowSolicitud">

            <section class="col-7 centrarMelo">
                <?php	include 'plantillas/tablainfo.php'; ?>
            </section>

            <section class="col-5 centrarMelo">
                <?php	include 'plantillas/archivoscargados.php'; ?>
            </section>

        </div>

    </div>

    <?php 
    }else{
        ?>


    <div class="container-fluid">
        <div class="col-12 centrarMelo">
            <?php	include 'plantillas/tablainfo.php'; ?>
        </div>

    </div>

    <?php 
     }
    ?>

    <script>
    var id = "<?php echo $id;?>";
    </script>
    <?php if( $TipoUser == 'CAC' || $TipoUser == 'Admin'){
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











    <!-- Jquery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!--Alertas -->

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js/alert.js"></script>
    <!-- <script src="../Js/formularioCorreo.js"></script> -->
    <script>
    $("#formulario").submit(function(e) {
        $(".loader").addClass("active");
    });
    </script>


    <!---->
    <!-- Quill.js -->
    <script>
    function logHtmlContent() {
        console.clear();
        var Test = quill.root.innerHTML;
        document.getElementById("test").value = Test;
        $("#Correo").modal("hide");

    }
    </script>
    <script src="../js/quill.js"></script>




    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"> -->
    <script src="../js/bootstrap.bundle.min.js"></script>
    <!--Fonazome-->
    <script src="https://kit.fontawesome.com/c4cc899971.js" crossorigin="anonymous"></script>


</body>

</html>