<?php 
include '../../modelo/conn.php';
include '../../modelo/autenticaruser.php';
$buscar = base64_decode($_POST['buscar']); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitud <?php echo $buscar ?></title>
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
    <link rel="stylesheet" href="../../web/css/infosolicitud.css">
    <link rel="stylesheet" href="../../web/css/textareacorreo.css">
    <!-- Script comentario -->
    <link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.7/quill.js"></script>
    <link rel="stylesheet" href="//cdn.quilljs.com/0.20.1/quill.snow.css" />
    <!--  -->
</head>

<body style="
font-family: 'Montserrat', sans-serif;">
    </style>
    <div class="loader">
        <div id="carga"></div>
    </div>



    <?php
        $query ="SELECT s.IdSolicitud,s.IdTipoEntidad, t.DescripcionEntidad,s.NIT,s.NumVNIT,s.Nombre,s.RepresentanteLegal,s.Cargo,s.Correo,s.Telefono,s.FechaCreacion,a.IdSolicitud,s.IdEstado,e.Descripcion FROM solicitudes s INNER JOIN tipoentidad t  ON s.IdTipoEntidad = t.IdTipoEntidad INNER JOIN estados e ON e.IdEstado = s.IdEstado INNER JOIN archivos a ON  a.IdSolicitud =  s.IdSolicitud  WHERE s.IdSolicitud ='$buscar' " ;
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
        <?php include('nav.php')?>
    </section>



    <div class=" tituloConsultas">
        <img src="../../img/simbolo_cac_color.png" alt="" style="width:60px;">
        <h1> Solicitud N°<?php echo $IdSolicitud?></h1>
    </div>




    <div class="row contenedorInfo">
        <center>
            <!-- <div class="col-2"></div> -->
            <section class="col-12">
                <?php	include 'plantillas/tablainfo.php'; ?>
            </section>
            <!-- <div class="col-2"></div> -->
        </center>
    </div>
    <div class="row">

        <!-- <div class="col-2"></div> -->
        <section class="col-6 ">
            <?php	include 'plantillas/archivoscargados.php'; ?>
        </section>

        <section class="col-6 ">

            <?php	include 'plantillas/funcionesbton.php'; ?>
        </section>
        <!-- <div class="col-2"></div> -->

    </div>

    </div>






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
        $("#Correo").modal("show");
    }
    </script>
    <script src="../js/quill.js"></script>
    <!--  -->




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <!--Fonazome-->
    <script src="https://kit.fontawesome.com/c4cc899971.js" crossorigin="anonymous"></script>


</body>

</html>