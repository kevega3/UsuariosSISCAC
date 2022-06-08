<?php 
session_start();
session_destroy();
include ('modelo/keys.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="web/css/login.css">
    <link rel="stylesheet" href="web/css/reload.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--Fuentes-->
    <!--Titulo-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="icon" href="img/simbolo_cac_color.png">
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



    <div class="ContenedorGe">
        <div class="contenedorLogin">

            <div class="row">
                <div class="col-1"></div>
                <div class="col-3 colorAzul"></div>
                <div class="col-4 colorMorado"></div>
                <div class="col-3 colorVerde"></div>
                <div class="col-1"></div>
            </div>


            <div class="row contenedorFormulario">
                <!-- <div class="col-sm-12 col-md-10 col-lg-10  contenedorResumen"></div> -->
                <!-- d-none d-md-block  -->
                <div class="col-sm-1 d-md-block col-md-1 vacio"></div>


                <div class="d-none d-md-block  col-md-6 col-lg-6  p-0">
                    <img src="img/Vector_2646.jpg" alt="">
                </div>

                <div class="col-sm-10 col-md-4 col-lg-4 formularioCAC">
                    <div>
                        <img src="img/H_cac_color_fondo.png" style="width: 80%;" alt="">
                    </div>
                    <div class="verificacionCodigo">
                        <h4>Verificación en un paso</h4>
                        <p>Este paso debe digitar el codigo que se le anexo en su electronico </p>
                    </div>
                    <form action="modelo/validarentidad.php" method="POST" class="formulario" id="formulario">

                        <!-- Grupo: Usuario -->
                        <div class="formulario__grupo" id="grupo__codigo">
                            <label for="usuario" class="formulario__label">Codigo de verificación</label>
                            <div class="formulario__grupo-input">
                                <input type="password" class="formulario__input" name="codigo" id="contrasena"
                                    placeholder="Digite el codigo que se le asigno " />
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">
                                El usuario debe digitar el codigo que se le asignó
                            </p>
                        </div>

                        <div style="margin-top:15px;">
                            <input style="" type="checkbox" id="mostrar_contrasena"
                                title="click para mostrar contraseña" />
                            &nbsp;&nbsp;Mostrar Contraseña
                        </div>

                        <br>



                        <div class="formulario__mensaje" id="formulario__mensaje">
                            <p>
                                <i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor
                                rellena el formulario correctamente.
                            </p>
                        </div>

                        <br>

                        <div class="formulario__grupo formulario__grupo-btn-enviar">
                            <input type="hidden" name="entrar" id="entrar" />
                            <button type="submit" class="formulario__btn">Iniciar Sesion</button>
                        </div>

                    </form>
                    <div class="Derechos">
                        <p>© 2022 Todos los derechos reservados a Cuenta de Alto Costo
                            Términos y condiciones . Políticas de privacidad y condiciones de uso.</p>
                    </div>
                </div>

                <div class="col-sm-1 d-md-block col-md-1 vacio"></div>


            </div>

            <!-- CONTENEDOR LOG-->
        </div>
    </div>
    <!-- CONTENEDOR -->

</body>




<!--Fonazome-->
<script src="https://kit.fontawesome.com/c4cc899971.js" crossorigin="anonymous"></script>

<!--Formulario-->

<script src="web/js/formularioentidades.js">
</script>
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

</html>