<?php 
include '../../modelo/conn.php';
include '../../modelo/autenticarentidad.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/entidades/styles.css">
    <link rel="stylesheet" href="../css/entidades/wtf-forms.css">
    <link rel="stylesheet" href="../css/entidades/w3.css">
    <link rel="stylesheet" href="../css/entidades/reload.css">
    
    
    <link rel="icon" href="../../img/simbolo_cac_color.png">

    <!--Titulo-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;1,700&display=swap"
        rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- boostrap -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Document</title>
</head>

<body style="
font-family: 'Montserrat', sans-serif;">
    </style>


    <div class="loader">

        <div class="ContenedorEsperar">
            <center>
                <p class="Esperar">Espera un momento porfavor ...</p>
            </center>
        </div>
        <div id="carga">

        </div>
    </div>
    <section>
        <?php include 'plantillas/entidades/headerentidades.php'?>
    </section>

    <section class="container-fluid">
        <div>
            <?php include 'plantillas/entidades/info.php'?>
        </div>
        </div>
        <div class="w3-container w3-half">
            <?php include 'plantillas/entidades/cargarentidades.php'?>
        </div>

        <div class="w3-container w3-half ">

            <div class=" container container2">
                <?php include 'plantillas/archivoscargados.php'?>

            </div>
        </div>

    </section>

    <!-- <footer class="row">
        sadsadsads
    </footer> -->

    <footer class="w3-col footer">
        
        <div class="TextoDerechos">
            <br>
            <p class="derechos">© 2022 Cuenta de Alto Costo. Todos los derechos reservados</p>
        </div>

    </footer>





    <?php   
    for($j=0;$j<=2;$j++){
        
        if($Estado[$j] == 'No Cumple'){
            
        ?>
    <script>
    $('.<?php echo "$j"?>').addClass("Incorrecto");
    
    $('.text<?php echo "$j"?>').addClass("IncorrectoText");
    </script>
    <?php  
    }else{
        ?>
    <script>
    $('.text<?php echo "$j"?>').addClass("IncorrectoF");
    </script>
    <?php 
    }
}
    ?>
    <script>
    $("#formulario").submit(function(e) {
        $(".loader").addClass("active");
    });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="../js/functions.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <!--Fonazome-->
    <script src="https://kit.fontawesome.com/c4cc899971.js" crossorigin="anonymous"></script> 

</body>

</html>