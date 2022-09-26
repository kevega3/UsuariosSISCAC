
<?php   include 'modelo/keys.php';
    session_start();
    session_destroy();
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="alternate" href="web/css/styles.css" type="application/atom+xml" title="Atom"> 
    <link rel="stylesheet" href="web/css/reload.css">
    <link rel="stylesheet" href="web/css/login.css">
    
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--Fuentes-->
    <!--Titulo-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;1,700&display=swap"
        rel="stylesheet"> 
    <link rel="icon" href="img/simbolo_cac_color.png">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!--Css propios -->
    <!-- Recatch -->
    
    <script src="https://www.google.com/recaptcha/api.js?render=<?php echo SITE_KEY; ?>"></script>

    <title>Login</title>
</head>
<body style="
font-family: 'Montserrat', sans-serif;
font-weight: bold;">
    </style>
    
<div class="" id="contenedor_carga">
        <div id="carga"></div>
</div>





<?php include 'web/pag/login.html'?>























    <!-- JS -->
    <script>
    window.onload = function() {
        var contenedor = document.getElementById('contenedor_carga');
        contenedor.style.visibility = 'hidden';
        contenedor.style.opacity = '0';
    }
    </script>

    <script type="text/Javascript">
        grecaptcha.ready(function(){

    grecaptcha.execute('<?php echo SITE_KEY; ?>', {action: 'homepage'}).then(function(token) {
        document.getElementById("entrar").value = token;
        });
    });
</script> 

    <!---->

    <!--Fonazome-->
    <script src="https://kit.fontawesome.com/c4cc899971.js" crossorigin="anonymous"></script> 

    <!--Formulario-->

    <script src="web/js/formularioiniciar.js">
    </script> 
    <!---->

<script>
$(document).ready(function() {
    $('#mostrar_contrasena').click(function() {
        if ($('#mostrar_contrasena').is(':checked')) {
            $('#contrasena').attr('type', 'text');
        } else {
            $('#contrasena').attr('type', 'password');
        }
    });
});
</script>

</body>
</html>