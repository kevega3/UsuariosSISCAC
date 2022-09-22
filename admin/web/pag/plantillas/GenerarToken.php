<div class="container-fluid ">
    <!-- Tabla -->


    <div class="tituloConsultasToken">
        <img src="../../img/simbolo_cac_color.png" alt="" style="width:60px;">
        <h1>Generar Token</h1>
    </div>
    <br>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success ms-3" data-bs-toggle="modal" data-bs-target="#AgregarToken">
        Agregar <i class="fas fa-user-plus"></i>
    </button>

    <!-- Modal -->
    <div class="modal fade" id="AgregarToken" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Generar Token</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form   class="formulario" id="formulario"> 
				
				<!-- Grupo: NombreEntidad -->
				<div class="formulario__grupo" id="grupo__NombreEntidad">
					<label for="NombreEntidad" class="formulario__label">Nombre Entidad</label>
					<div class="formulario__grupo-input">
						<input type="text" class="formulario__input" name="NombreEntidad" id="NombreEntidad"
							placeholder="Digite el  Nombre de la entidad" />
						<i class="formulario__validacion-estado fas fa-times-circle"></i>
					</div>
					<p class="formulario__input-error">
						El Nombre de la Entidad debe tener 5 a 16 dígitos y solo puede contener numeros y letras.
					</p>
				</div>
				
                <!-- Grupo: NombreNotificador -->
				<div class="formulario__grupo " id="grupo__NombreNotificador">
					<label for="NombreNotificador" class="formulario__label">Nombre Notificador</label>
					<div class="formulario__grupo-input">
						<input type="text" class="formulario__input" name="NombreNotificador" id="NombreNotificador"
							placeholder="Digite su NombreNotificador" />
						<i class="formulario__validacion-estado fas fa-times-circle"></i>
					</div>
					<p class="formulario__input-error">
						el Nombre del Notificador debe tener 10 a 40 dígitos
					</p>
				</div>


                <!-- Grupo: CorreoNotificador -->
				<div class="formulario__grupo campo" id="grupo__CorreoNotificador">
					<label for="CorreoNotificador" class="formulario__label">Correo Notificador</label>
					<div class="formulario__grupo-input">
						<input type="text" class="formulario__input" name="CorreoNotificador" id="CorreoNotificador"
							placeholder="Digite su CorreoNotificador" />
						<i class="formulario__validacion-estado fas fa-times-circle"></i>
					</div>
					<p class="formulario__input-error">
						el Correo Notificador debe tener 10 a 40 dígitos
					</p>
				</div>
				
				
				
				<div class="formulario__mensaje" id="formulario__mensaje">
					<p>
						<i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor
						rellena el formulario correctamente.
					</p>
				</div>

				
				<br>

				
				
				<button type="submit" class="formulario__btn"  >Crear</button>

			</form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <!-- <button type="button" class="btn btn-primary">Guardad Cambios</button> -->

                    <div class="formulario__grupo formulario__grupo-btn-enviar">
				</div>
                </div>
            </div>
        </div>
    </div>


<br>





































<div class="Container-Tables">

    <div class="BordeTabla">
        <table id="Tablas" class="table table-striped" style="width:100%">
            <thead class="">
                <tr class="tablaCol bg-primary text-white">
                    <th>Nombre</th>
                    <th>Token</th>
                    <th>Entidad</th>
                    <th>Correo</th>
                    <th>
                        <center>
                         Reenviar
                         </center>
                    </th>

                </tr>
            </thead>
            <tbody>

                <?php
                    
                    $query ="SELECT * FROM token_au"  ;
                    $res = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($res)) { ?>
                <tr class="columnas">


                    <td><?php echo $row['NombreNotifiador']; ?></td>
                    <td><?php echo $row['Token']; ?></td>
                    <td><?php echo $row['NombreEntidad']; ?></td>
                    <td><?php echo $row['CorreoNotificador']; ?></td>
                    <td>
                    <center> 
                                <button  class="btn_buscar" onclick="ReenviarCodigo('<?php echo $row['CorreoNotificador']?>','<?php echo $row['IdToken']; ?>')">
                                <i class="fas fa-reply"></i>
                                </button>
                    </center>
                    </td>
                    <?php }
                    ?>
                </tr>
            </tbody>
        </table>
    </div>

</div>
<!-- Tabla -->
</div>

