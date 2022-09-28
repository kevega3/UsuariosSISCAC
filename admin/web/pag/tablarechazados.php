<div class="tituloConsultas">
    <img src="../../img/simbolo_cac_color.png" alt="" style="width:60px;">
    <h1>Solicitudes Rechazadas</h1>
</div>
<div class="Container-Tables">
    <div class="BordeTabla">
        <table id="Tablas" class="table table-striped" style="width:100%">
            <thead class="sticky-md-top ">
                <tr class="tablaCol">
                    <th>N°</th>
                    <th>Nombre</th>
                    <th>RepresentanteLegal</th>
                    <th>NIT</th>
                    <th>Entidad</th>
                    <th>Observar</th>

                </tr>
            </thead>
            <tbody>

                <?php
                    
                    $query ="SELECT DISTINCT s.IdSolicitud, t.DescripcionEntidad,s.NIT,s.NumVNIT,s.Nombre,s.RepresentanteLegal,s.Cargo,s.Correo,s.Telefono,s.FechaCreacion,s.IdEstado FROM solicitudes s INNER JOIN tipoentidad t  ON s.IdTipoEntidad = t.IdTipoEntidad WHERE IdEstado = 3";
                    $res = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($res)) { ?>
                <tr class="columnas">

                    <td><?php echo $row['IdSolicitud']; ?></td>
                    <td><?php echo $row['Nombre']; ?></td>
                    <td><?php echo $row['RepresentanteLegal']; ?></td>
                    <td><?php echo $row['NIT']."-".$row['NumVNIT'] ?></td>
                    <td><?php echo $row['DescripcionEntidad']; ?></td>
                    <td>
                        <form action="inforechazados.php" method="POST">
                            <input name="buscar" type="hidden" value="<?php echo base64_encode($row['IdSolicitud']) ?>">
                            <input name="id" type="hidden" value="<?php echo base64_encode($id); ?>">
                            <input name="usuario" type="hidden" value="<?php echo base64_encode($usuario); ?>">
                            <center>
                                <button type="submit" class="btn_buscar">
                                    <i class="fas fa-search icono"></i>
                                </button>
                            </center>
                        </form>
                    </td>
                    <?php }
                    ?>
                </tr>
            </tbody>
        </table>
    </div>

</div>