<?php 
include '../../modelo/conn.php';
include '../../modelo/autenticaruser.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiempos</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--Fuentes-->
    <!--Titulo-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;1,700&display=swap"
        rel="stylesheet">
    <link rel="icon" href="../../Img/simbolo_cac_color.png">
    <!--Css propios -->
    <link rel="stylesheet" href="../../web/css/reload.css">
    <link rel="stylesheet" href="../../web/css/nav.css">
    <link rel="stylesheet" href="../../web/css/footer.css">
    <link rel="stylesheet" href="../../web/css/tablas.css">
    <link rel="stylesheet" href="../../web/css/styles.css">

</head>

<body style="
font-family: 'Montserrat', sans-serif;">
    </style>
    <div class="" id="contenedor_carga">
        <div id="carga"></div>
    </div>


    <section>
        <?php include('nav.php')?>
    </section>


    <section>
        <div class="tituloConsultas">
            <img src="../../img/simbolo_cac_color.png" alt="" style="width:60px;">
            <h1>Tiempos en Respuesta</h1>
        </div>
        <div class="Container-Tables">
            <div class="BordeTabla">
                <table id="Tablas" class="table table-striped" style="width:100%">
                    <thead class="sticky-md-top ">
                        <tr class="tablaCol">
                            <th>N°</th>
                            <th>Tipo Entidad</th>
                            <th>Entidad</th>
                            <th>Fecha Creacion</th>
                            <th>Fecha Aceptacion Juridica</th>
                            <th>Fecha Creacion SISCAC</th>


                        </tr>
                    </thead>
                    <tbody>

                        <?php
                    
                    $query ="SELECT DISTINCT s.IdSolicitud, t.DescripcionEntidad,s.RepresentanteLegal,s.Nombre,s.FechaCreacion,s.FechaJuridica,s.FechaSISCAC FROM solicitudes s INNER JOIN tipoentidad t  ON s.IdTipoEntidad = t.IdTipoEntidad WHERE IdEstado = 4";
                    $res = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($res)) { ?>
                        <tr class="columnas">

                            <td><?php echo $row['IdSolicitud']; ?></td>
                            <td><?php echo $row['DescripcionEntidad']; ?></td>
                            <td><?php echo $row['Nombre']; ?></td>
                            <td><?php echo $row['FechaCreacion']; ?></td>
                            <td><?php echo $row['FechaJuridica'] ?></td>
                            <td><?php echo $row['FechaSISCAC']; ?></td>

                            <?php }
                    ?>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </section>




    <footer>
        <?php  include 'footer.html'?>
    </footer>











    <!-- JS -->
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



    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.4/datatables.min.css" />

    <!-- Librerias Data Tables -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="../js/tablas.js"></script>
    <!-- Final-->

    <!--Fonazome-->
    <script src="https://kit.fontawesome.com/c4cc899971.js" crossorigin="anonymous"></script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

</body>

</html>