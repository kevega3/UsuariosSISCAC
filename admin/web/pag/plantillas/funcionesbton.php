<script>
        var id = "<?php echo $id;?>";
        var Correo = "<?php echo $Correo;?>";
        </script>
        <div class="btones-Acciones">
                <button aria-current="page" class="btnAcciones aceptar" name="<?php echo $buscar?>" id="Aceptar"
                    onclick="Aceptar();">
                    <span>Aceptar</span>
                </button>
            
            <?php include 'plantillas/btonnegar.php' ?>
              
        </div>