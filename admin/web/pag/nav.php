<nav class="navbar navbar-expand-lg navbar-dark menu contenedorLink">
    <div class="container-fluid ">
        <div class="VolverJuridica">
            <a class="text-white" href="Solicitudes.php"><i class="fas fa-arrow-left"></i></a>
        </div>


        <div class="VolverAceptados">
            <a class="text-white" href="aceptados.php"><i class="fas fa-arrow-left"></i></a>
        </div>

        <div class="VolverRechazados">
            <a class="text-white" href="rechazados.php"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h3 class="tituloNav">

            <?php echo "$TipoUser" ?>
        </h3>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>




        <div class="collapse navbar-collapse justify-content-end " id="navbarSupportedContent">
            <ul class="navbar-nav ul">
                <?php if( $TipoUser == 'CAC' || $TipoUser == 'Admin'){
                    ?>
                <li class="nav-item navegar">
                    <a class="" href="Solicitudes.php">Solicitudes</a>
                </li>

                <li class="nav-item navegar">
                <a class="" href="rechazados.php">Rechazados</a>
                </li>
                <?php }?>

                <li class="nav-item  navegar">
                    <a class="" href="aceptados.php">Aprobados</a>
                </li>
                <?php if( $TipoUser == 'CAC' || $TipoUser == 'Admin'){
                    ?>
                    <li class="nav-item  navegar">
                    <a class="" href="creados.php">Creados</a>
                </li>
                <li class="nav-item  navegar">
                    <a class="" href="Token.php">Token</a>
                </li>
                <?php }
                if($TipoUser == 'Admin'){
                    ?>
                    <li class="nav-item  navegar">
                    <a class="" href="Tiempos.php">Tiempos</a>
                </li>
                    <?php
                }?>
                    
                
                
                <div class="btn-group dropstart">
                    <button type="button" class="inputRe  dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">
                                <center>
                                    <?php echo $NombreCompleto; ?>
                                </center>
                            </a>
                        </li>

                        <li><a class="dropdown-item">
                                <center>
                                    <button aria-current="page" class="btnCerrar" onclick="Cerrar('segunda alerta');">
                                        <span>Cerrar Sesion</span>
                                    </button>
                                </center>
                            </a>
                        </li>


                    </ul>

                </div>
            </ul>
        </div>
    </div>
</nav>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script><script>

    const currentLocation = location.href;
    const menuItem = document.querySelectorAll('a');
    const menuLength = menuItem.length
    for(let i = 0; i <menuLength; i++){
            if(menuItem[i].href === currentLocation){
                menuItem[i].className = 'active'
            }
    }
</script>