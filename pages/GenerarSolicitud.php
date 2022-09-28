<?php 
include ('conexion.php');
include ('key.php');
include ('AutenticarEnti.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>Usuarios SISCAC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <link rel="stylesheet" type="text/css" href="../css/reload.css">
    <link rel="stylesheet" href="../admin/web/css/reload.css">

    <link rel="stylesheet" href="../css/w3.css">
    <script src="https://www.google.com/recaptcha/api.js?render=<?php echo SITE_KEY; ?>"></script>
    <!-- boostrap  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;1,700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="../css/wtf-forms.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <style type="text/css">
    a {
        font-size: 15px;


    }

    label {
        font-size: px;
    }

    body {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: 'Montserrat', sans-serif;

    }

    footer {
        /* position: absolute; */
        text-align: center;
        bottom: 0;
        width: 100%;
        height: 100Wpx;
        color: white;
    }

    footer {

        /* Permalink - use to edit and share this gradient: https://colorzilla.com/gradient-editor/#001e36+0,001d44+100 */
        background: rgb(0, 30, 54);
        /* Old browsers */
        background: -moz-linear-gradient(left, rgba(0, 30, 54, 1) 0%, rgba(0, 29, 68, 1) 100%);
        /* FF3.6-15 */
        background: -webkit-linear-gradient(left, rgba(0, 30, 54, 1) 0%, rgba(0, 29, 68, 1) 100%);
        /* Chrome10-25,Safari5.1-6 */
        background: linear-gradient(to right, rgba(0, 30, 54, 1) 0%, rgba(0, 29, 68, 1) 100%);
        /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#001e36', endColorstr='#001d44', GradientType=1);
        /* IE6-9 */
        height: 60px;

    }
    </style>
</head>


<div class="" id="contenedor_carga">
    <div id="carga"></div>
</div>



<body style="
font-family: 'Montserrat', sans-serif;
background-color: rgb(227, 227, 230); ">
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


    <div class="header">
        <div class="sides">
            <a href="#Registrate" class="logo">Comenzar</a>
        </div>
        <!-- <div class="sides"> <a href="#" class="menu"> </a></div> -->
        <div class="info">
            <h4><a href="#category">BIENVENIDO</a></h4>
            <h1>PORTAL PARA GENERAR SU SOLICITUD DE USUARIOS SISCAC</h1>
            <div class="meta">
                <a href="https://cuentadealtocosto.org/site/" target="_b" class="author"></a><br>
                por <a href="https://cuentadealtocosto.org/site/" target="_b">Cuenta de alto costo</a> en Oct , 2022
            </div>
        </div>
    </div>


    <section id="Registrate">


        <div class="w3-row ">
            <div class="w3-container w3-half">
                <!--  -->
                <div class=" container container2">
                    <div class="Pasos">
                        <h2 class="TituloParaReg">Para registrarse en SISCAC debe seguir los siguientes pasos:</h3>
                            <h4>Paso 1 descargue Los documentos :</h4>
                            <p>En este paso debe descargar y diligenciar los documentos que encuentra en la parte
                                inferior.</p>
                    </div>
                    <div class="Pasos">

                        <h4>Paso 2 llenar el formulario :</h4>
                        <p>Diligencie el formulario que se encuentra a continuación y adjunte allí los documentos del
                            paso 1
                            debidamente diligenciados.</li>
                        </p>

                    </div>
                    <div class="Pasos">
                        <h4>Paso 3 Espera nuestra respuesta :</h4>
                        <p>Nosotros revisaremos su solicitud y le enviaremos un correo electronico notificando nuestra
                            respuesta </p>
                    </div>



                    <h3 class="TituloParaReg">Archivos Necesarios para su solicitud</h3>
                    <table>
                        <tbody>
                            <tr>
                                <td>Formato de asignación de usuarios</td>
                                <td><a
                                        href="https://cuentadealtocosto.org/site/wp-content/uploads/2019/12/formato_permisos_roles_gdt-ft-79.xlsx"><button
                                            class="btn-Descarga"> <i class="fas fa-download"></i></button></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Modelo de Comunicado solicitud de usuarios</td>
                                <td><a
                                        href="https://cuentadealtocosto.org/site/wp-content/uploads/2020/02/modelo_comunicado_solicitud_usuariossiscac.docx"><button
                                            class="btn-Descarga">   <i class="fas fa-download"></i></button></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Formato de Tratamiento de datos personales <strong>Representante legal</strong></td>
                                <td>
                                    <div class="contenedorBtonDescarga">
                                        <a
                                            href="https://cuentadealtocosto.org/site/wp-content/uploads/2022/09/gdt_dg_28_autorizacion-para-el-tratamiento-de-datos-personales-en-la-plataforma-siscac-v4.docx"><button
                                                class="btn-Descarga"><i class="fas fa-download"></i></button></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Formato de Tratamiento de datos personales <strong>Funcionarios</strong></td>
                                <td><a
                                        href="https://cuentadealtocosto.org/site/sgi_dg_28_autorizacion-para-tratamiento-de-datos-personales-funcionarios-siscac-v2-2/"><button
                                            class="btn-Descarga">  <i class="fas fa-download"></i></button></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>


                </div>

                <!--  -->
            </div>

            <div class="w3-container w3-half ">
                <!--  -->
                <div class="container">
                    <form action="guardarsolicitud.php" method="POST" enctype="multipart/form-data" id="formulario">
                        <div class="row">
                            <div class="col-50">
                                <label for="tipoEntidad">Tipo de entidad</label><a data-toggle="popover"
                                    title="Seleccione si su entidad es EAPB o IPS"
                                    data-content="Some content inside the popover" class="Comentario">?</a>

                                <select name="tipoEntidad" id="tipoEntidad" required>
                                    <option disabled selected value="">Seleccionar</option>


                                    <?php
                                    $sqlEntidad = "SELECT * FROM tipoentidad"; 
                                    $result = $mysqli->query($sqlEntidad);
                                    if ($result->num_rows > 0) {
                                      while($row = $result->fetch_assoc()){
                                        ?>
                                    <option value="<?php echo $row['IdTipoEntidad'] ?>">
                                        <?php echo $row['DescripcionEntidad']; ?></option>
                                    <?php

                                      }
                                    }
                                    
                                ?>
                                </select>
                            </div>
                            <div class="col-50">
                                <label for="nit">NIT</label><a data-toggle="popover"
                                    title="Diligencie el NIT de su entidad sin el digito de verificación "
                                    data-content="Some content inside the popover" class="Comentario">?</a>
                                <input type="number" name="nit" id="nit" required max="999999999"
                                    onKeyPress="if(this.value.length==9) return false;">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-50">
                                <label for="numv">Número de verificación NIT</label><a data-toggle="popover"
                                    title="Digite el numero de verificación de su NIT"
                                    data-content="Some content inside the popover" class="Comentario">?</a>
                                <input type="number" name="numV" id="numv" max="99" required
                                    onKeyPress="if(this.value.length==2) return false;">

                            </div>
                            <div class="col-50">
                                <label for="nombre">Nombre o Razón social</label><a data-toggle="popover"
                                    title="Escriba el nombre o razón social de su entidad"
                                    data-content="Some content inside the popover" class="Comentario">?</a>
                                <input type="text" name="nombre" id="nombre" maxlength="100" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-50">
                                <label for="representante">Nombre del representante legal</label><a
                                    data-toggle="popover" title="Nombre del representante legal de su entidad"
                                    data-content="Some content inside the popover" class="Comentario">?</a>
                                <input type="text" name="representante" id="representante" maxlength="100" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-50">
                                <label for="correo">Correo electrónico institucional</label><a data-toggle="popover"
                                    title="Diligencie el correo electronico institucional de contacto con su entidad"
                                    data-content="Some content inside the popover" class="Comentario">?</a>
                                <input type="email" name="correo" id="correo" maxlength="100" required>
                            </div>
                            <div class="col-50">
                                <label for="telefono">Teléfono de contacto</label><a data-toggle="popover"
                                    title="Diligencie el numero fijo o celular de contacto"
                                    data-content="Some content inside the popover" class="Comentario">?</a>
                                <input type="number" name="telefono" id="telefono" max="999999999999999"
                                    onKeyPress="if(this.value.length==15) return false;" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-50">
                                <label for="files">Formato de asignación de usuarios</label><a data-toggle="popover"
                                    title="Adjunte el formato de asignación de usuarios debidamente diligenciado (Recuerde relacionar en el formato todos los usuarios del sistema que requiere su entidad para la operacion de SISCAC)"
                                    data-content="Some content inside the popover" class="Comentario">?</a>

                                <label class="file">
                                    <input type="file" id="files" onclick="validarTamano()" onchange="validar()"
                                        name="asignacionUsuarios" accept=".xlsx,.xls" required>
                                    <span class="file-custom"><a id="file1"></a></span>
                                </label>

                            </div>
                            <div class="col-50">
                                <label for="filePDF">Modelo de Comunicado solicitud de usuarios y certificado de
                                    existencia
                                    y representacion legal de la entidad</label><a data-toggle="popover"
                                    title="Adjunte el comunicado de solicitud firmado por el representante legal y certificado de existencia y representacion legal con vigencia no superior a 30 dias,los dos documentos en un archivo PDF"
                                    data-content="Some content inside the popover" class="Comentario">?</a>
                                <label class="file">
                                    <input type="file" id="filePDF" onclick="validarTamanoPDF()" onchange="validarPDF()"
                                        accept=".pdf" name="comunicado" required>
                                    <span class="file-custom"><a id="file2"></a></span>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-50">
                                <label for="filePDF1">Formato de Tratamiento de datos personales Representante
                                    legal</label><a data-toggle="popover"
                                    title="Adjunte un PDF que incluya el formato de tratamiento de datos personales del representante legal"
                                    data-content="Some content inside the popover" class="Comentario">?</a>
                                <label class="file">
                                    <input type="file" id="filePDF1" onclick="validarTamanoPDF1()"
                                        onchange="validarPDF1()" accept=".pdf" name="representante" required>
                                    <span class="file-custom"><a id="file3"></a></span>
                                </label>
                            </div>
                            <div class="col-50">
                                <label for="filePDF2">Formato de Tratamiento de datos personales Funcionarios</label><a
                                    data-toggle="popover"
                                    title="Adjunte un PDF que incluya el formato de tratamiento de datos personale de todos los usuarios operativos del sistema"
                                    data-content="Some content inside the popover" class="Comentario">?</a>
                                <label class="file">
                                    <input type="file" id="filePDF2" onclick="validarTamanoPDF2()"
                                        onchange="validarPDF2()" accept=".pdf" name="funcionarios" required>
                                    <span class="file-custom"><a id="file4"></a></span>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <p><input type="checkbox" id="politica" name="politica" value="1" required>
                                <label for="politica" style="font-size: 11px;"> He leído y acepto la <a
                                        href="https://cuentadealtocosto.org/site/wp-content/uploads/2021/09/sgi_dg_22_politica-de-tratamiento-de-datos-personales-cac-v4.pdf"
                                        target="_blank">Política
                                        de Tratamiento de Datos</a>.</label>
                            </p>
                        </div>
                        <div class="row pb-4">
                            <input type="hidden" id="entrar" name="entrar">
                            <button type="submit" class="BtnSubmmit">
                                Siguiente Paso <i class="button__icon fas fa-arrow-right"></i>
                            </button>



                            <!-- <input type="submit" value="Siguiente Paso"> -->
                        </div>
                    </form>
                </div>
                <!--  -->
            </div>

    </section>



    <footer class="footer">
        <div class="TextoDerechos">
            <br>
            <p class="derechos">© 2022 Cuenta de Alto Costo. Todos los derechos reservados</p>
        </div>
    </footer>

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


    <!-- boostrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script>
    $("#formulario").submit(function(e) {
        $(".loader").addClass("active");
    });
    </script>
    <script>
    $(document).ready(function() {
        $('[data-toggle="popover"]').popover();
    });
    </script>
    <!--  -->
    <script type="text/javascript" src="../js/functions.js"></script>
    <script src="https://kit.fontawesome.com/c4cc899971.js" crossorigin="anonymous"></script>
</body>

</html>