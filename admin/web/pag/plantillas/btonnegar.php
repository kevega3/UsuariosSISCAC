<button type="button" class="btn btn-danger pt-2" data-bs-toggle="modal" data-bs-target="#Correo">
    Negar
</button>

<!-- Modal -->
<div class="modal fade" id="Correo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="ModalCorreo" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header colorHeaderModal">
                <h5 class="modal-title text-white" id="ModalCorreo">Negar Peticion</h5> 

                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Adjuntar Correo -->
                <h3 class="titulomodal">Adjuntar  Razones</h3>
                <div id="editor" style="height: 200px"></div>


                <form action="../../modelo/correo.php" method="POST" id="formulario">
                    <div class="formulario__grupo-input">
                        <textarea name="Test" id="test" cols="30" rows="10" style="display:none;"></textarea>
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>


                    <div class="checkbox">
                        <h3 class="titulomodal">Archivos Incorrectos</h3>
                        <input type="checkbox" value="<?php echo $IdArchivo[1] ?>" name="AsgU"> Asignacion Usuarios
                        <br>
                        <input type="checkbox" value="<?php echo $IdArchivo[3] ?>" name="SoliU"> Solicitud Usuarios
                        <br>
                        <input type="checkbox" value="<?php echo $IdArchivo[2] ?>" name="Rel"> Representantes Legales
                        <br>
                        <input type="checkbox" value="<?php echo $IdArchivo[0] ?>" name="DaFun"> Datos Funcionarios
                    </div>
                    <div class="modal-footer ">
                        
                        <input type="hidden" name="buscar" value="<?php echo($buscar)?>">
                        <input type="hidden" name="id" value="<?php echo($id)?>">
                        <input type="hidden" name="correo" value="<?php echo($Correo)?>">

                         <input type="submit" class="formulario__btn btonEnviar1" onclick="logHtmlContent()"> 
            
                        <button type="button" class="formulario__btn bg-danger " data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </form>
                <!-- Final -->
            </div>

        </div>
    </div>
</div>