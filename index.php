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
<link rel="stylesheet" type="text/css" href="css/styles.css">
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


    <div class="w3-row ">
        <div class="w3-container w3-half ">
            <!--  -->
            <div class=" container container2">
                <div class="Pasos">
                    <h2 class="TituloParaReg">Para registrarse en SISCAC debe seguir los siguientes pasos:</h3>
                        <h4>Paso 1 Solicite su codigo de acceso:</h4>
                        <p>En este paso debe enviar un correo electronico a
                            <strong>siscac@cuentadealtocosto.org</strong> solicitando un codigo de generacion de
                            solicitud.
                        </p>
                </div>
                <!-- <div class="Pasos">
                    <h4>Paso 2 Ingreso a nuestro portal:</h4>
                    <p>Con el codigo de acceso debe iniciar sesion en nuestro portal para comenzar a diligenciar los documentos necesarios para la creacion de los usuarios SISCAC.</li>
                    </p>
                </div> -->
                <div class="Pasos">
                    <h4>Paso 2 descargue Los documentos :</h4>
                    <p>En este paso debe descargar y diligenciar los documentos que encuentra en la parte
                        inferior.</p>
                </div>
                <h3 class="TituloParaReg">Archivos Necesarios para su solicitud</h3>
                <table>
                    <tbody>
                        <tr>
                            <td>Formato de asignación de usuarios</td>
                            <td><a
                                    href="https://cuentadealtocosto.org/site/wp-content/uploads/2019/12/formato_permisos_roles_gdt-ft-79.xlsx"><button
                                        class="btn-Descarga">Descargar</button></a>
                            </td>
                        </tr>
                        <tr>
                            <td>Modelo de Comunicado solicitud de usuarios</td>
                            <td><a
                                    href="https://cuentadealtocosto.org/site/wp-content/uploads/2020/02/modelo_comunicado_solicitud_usuariossiscac.docx"><button
                                        class="btn-Descarga">Descargar</button></a>
                            </td>
                        </tr>
                        <tr>
                            <td>Formato de Tratamiento de datos personales <strong>Representante legal</strong></td>
                            <td>
                                <div class="contenedorBtonDescarga">
                                    <a
                                        href="https://cuentadealtocosto.org/site/sgi_dg_26_autorizacion-para-tratamiento-de-datos-personales-representante-legal-siscac-v2-2/"><button
                                            class="btn-Descarga">Descargar</button></a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Formato de Tratamiento de datos personales <strong>Funcionarios</strong></td>
                            <td><a
                                    href="https://cuentadealtocosto.org/site/sgi_dg_28_autorizacion-para-tratamiento-de-datos-personales-funcionarios-siscac-v2-2/"><button
                                        class="btn-Descarga">Descargar</button></a>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="Pasos">
                    <h4>Paso 4 Ingreso a nuestro portal :</h4>
                    <p>Dentro del portal debe de diligenciar el formulario y adjunte allí los documentos del paso 2
                        debidamente diligenciados.</li>
                    </p>
                </div>

                <div class="Pasos">
                    <h4>Paso 4 Espera nuestra respuesta :</h4>
                    <p>Nosotros revisaremos su solicitud y le enviaremos un correo electronico notificando nuestra
                        respuesta.</p>
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

                            <h2 class="TituloLogin">Unete e Interaopera</h2>


                           

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
                                <span class="button__text" id="btnSubmitt" >Genera una solicitud</span>
                                <i class="button__icon fas fa-chevron-right"></i>
                                <input type="hidden" id="entrar" name="entrar" >
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





        <script type="text/Javascript">
    grecaptcha.ready(function(){

    grecaptcha.execute('<?php echo SITE_KEY; ?>', {action: 'homepage'}).then(function(token) {
        document.getElementById("entrar").value = token;
        });
    });
    </script>

    <script>
        function getReCaptcha() {
		grecaptcha.ready(function(){
				grecaptcha.execute('<?php echo SITE_KEY;?>', {action: 'homepage'}).then(function(token) {
					document.getElementById("entrar").value = token;
				});
			});
	}

	getReCaptcha();
	setInterval(function(){getReCaptcha();},110000);
    </script>

        <script src="js/login.js"></script>

        <!-- boostrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
        <!--  -->
        <script type="text/javascript" src="js/functions.js"></script>
        <script src="https://kit.fontawesome.com/c4cc899971.js" crossorigin="anonymous"></script>
</body>

</html>