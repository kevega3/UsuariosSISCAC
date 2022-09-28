<?php 
session_start();
session_destroy();
include ('pages/key.php');
?>

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/styles.css">
<link rel="stylesheet" type="text/css" href="css/reload.css">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/login.css">
<!-- boostrap  -->
<link rel="stylesheet" href="admin/web/css/bootstrap.min.css">
<!--  -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;1,700&display=swap" rel="stylesheet">
<script src="https://www.google.com/recaptcha/api.js?render=<?php echo SITE_KEY; ?>"></script>
<link rel="stylesheet" type="text/css" href="css/wtf-forms.css">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<style type="text/css">
a {
    font-size: 15px;
}

label {
    font-size: 15px;
}
</style>
</head>

<body style="
font-family: 'Montserrat', sans-serif;
background-color: rgb(227, 227, 230); ">

<div class="container-fluid">
    <div class="w3-row ">
        <div class="w3-container w3-half ">
            <!--  -->
            <div class=" container container2">
                <div class="Pasos">
                    <h2 class="TituloParaReg">Para registrarse en SISCAC debe seguir los siguientes pasos:</h3>
                        <h4>Paso 1 Solicite su codigo de acceso:</h4>
                        <p>En este paso debe enviar un correo electronico a
                            <strong>siscac@cuentadealtocosto.org</strong> solicitando un código de generación de
                            solicitud;Anexé Nombre de la entidad,nombre del notificador y correo institucional del notificador. 
                        </p>
                </div>
                <div class="Pasos">
                    <h4>Paso 2 Ingrese al portal:</h4>
                    <p>En este paso debe ingresar el código de acceso suministrado por nosotros solicitado en el paso
                        anterior.</p>
                </div>

                <div class="Pasos">
                    <h4>Paso 3 Sigue los demás pasos:</h4>
                    <p>En este paso debe de seguir y anexar los documentos necesarios dentro del portal.</p>
                </div>



        </div>

        <!--  -->
    </div>

    <div class="w3-container w3-half ">
        <!--  -->
        <div class="containerLogin">
            <div class="screen">
                <div class="screen__content">

                    <form class="login" action="pages/Validarlogin.php" method="POST" id="formulario">

                        <h2 class="TituloLogin">Unete e Interopera</h2>




                        <div class="formulario__grupo" id="grupo__TokenACC">

                            <div class="formulario__grupo-input">
                                <div class="login__field">
                                    <span class="formulario__validacion-estadospan fas fa-lock"></span>
                                    <input type="password" class="login__input" placeholder="Clave de acceso"
                                        name="TokenACC" id="TokenACC">
                                </div>

                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">
                                El Usuario debe tener 5 a 16 dígitos y solo puede contener numeros.
                            </p>
                        </div>


                        <button class="button login__submit" type="submit">
                            <span class="button__text" id="btnSubmitt">Genera una solicitud</span>
                            <i class="button__icon fas fa-chevron-right"></i>
                            <input type="hidden" id="entrar" name="entrar">
                        </button>

                    </form>
                    <div class="social-login">
                        <img src="admin/img/simbolo_cac_blanco.png" alt="" width="70%">
                    </div>
                </div>
                <div class="screen__background">
                    <span class="screen__background__shape screen__background__shape4"></span>
                    <span class="screen__background__shape screen__background__shape3"></span>
                    <span class="screen__background__shape screen__background__shape2"></span>
                    <span class="screen__background__shape screen__background__shape1"></span>
                </div>
            </div>
        </div>

        <!--  -->
    </div>

</div>



    <script type="text/Javascript">
        grecaptcha.ready(function(){

    grecaptcha.execute('<?php echo SITE_KEY; ?>', {action: 'homepage'}).then(function(token) {
        document.getElementById("entrar").value = token;
        });
    });
    </script>

    <script>
    function getReCaptcha() {
        grecaptcha.ready(function() {
            grecaptcha.execute('<?php echo SITE_KEY;?>', {
                action: 'homepage'
            }).then(function(token) {
                document.getElementById("entrar").value = token;
            });
        });
    }

    getReCaptcha();
    setInterval(function() {
        getReCaptcha();
    }, 110000);
    </script>

    <script src="js/login.js"></script>

    <!-- boostrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="https://kit.fontawesome.com/c4cc899971.js" crossorigin="anonymous"></script>
</body>

</html>