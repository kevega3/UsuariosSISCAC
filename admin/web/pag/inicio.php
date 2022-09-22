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
    <title>Inicio</title>
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
    <link rel="stylesheet" href="../../web/css/styles.css">
    <link rel="stylesheet" href="../../web/css/reload.css">
    <link rel="stylesheet" href="../../web/css/nav.css">
    <link rel="stylesheet" href="../../web/css/footer.css">
    <link rel="stylesheet" href="../../web/css/inicio.css">

</head>

<body style="
font-family: 'Montserrat', sans-serif;">
    </style>

    <div class="" id="contenedor_carga">
        <div id="carga"></div>
    </div>
    <section>
        <?php  include 'nav.php'?>
    </section>

    <section>
        <div class="container-fluid contenedorImagenes">
            <div class="row">
                <div class="col-sm-12 col-md-6 ">
                    <center>
                        <ul class="menuli">
                            <li>
                                <?php if($TipoUser == 'Juridica'){
                        ?>

                                <a href="juridica.php" class="btn btn1"></a>
                                <?php }else{ ?>

                                <a href="creados.php" class="btn btn3"></a>
                                <?php } ?>


                            </li>
                        </ul>
                    </center>
                </div>


                <div class="col-sm-12 col-md-6 ">
                    <center>
                        <ul class="menuli">
                            <li>
                                <a href="aceptados.php" class="btn btn2"></a>
                            </li>
                        </ul>
                    </center>
                </div>


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



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>