 
<?php
        $query2 ="SELECT * FROM archivos WHERE IdSolicitud = '$buscar'" ;

        $res2 = mysqli_query($conn, $query2);
        while ($row2 = mysqli_fetch_array($res2)) { 
            // $Ruta[]=$row2['Ruta'];
            $IdArchivo[]=$row2['IdArchivo'];
            $TipoDoc[]=$row2['TipoDoc'];
        }

        
        

        for($i=1;$i<=4;$i++){
        $BuscarArchivo ="SELECT * FROM archivos WHERE IdSolicitud=$buscar AND TipoDoc = $i";
        $res3 = mysqli_query($conn, $BuscarArchivo);
        while ($row2 = mysqli_fetch_array($res3)) { 
            $Ruta[]=$row2['Ruta'];
        }
        
        }
    ?>
    <div class="contenedorArchivos">
            <div class="tituloDatosCargados ">
                <h4>Datos Cargados</h4>
            </div>
            
                <table>
                    <tbody>
                        <tr>
                            <td>Asignación de usuarios</td>
                            <td>
                                 
                                <a  target="_blank" href="../../<?php echo $Ruta[0]?>">
                                    <button class="btn-Descarga"><i class="fas fa-eye"></i></button> 
                                </a>

                                    
                                
                                
                                
                            </td>
                        </tr>
                        <tr>
                            <td>Solicitud de usuarios</td>
                            <td>
                                <a target="_blank" href="../../<?php echo $Ruta[1]?>">
                                    <button class="btn-Descarga"><i class="fas fa-eye"></i></button>
                                </a>

                                    
                          
                            </td>
                        </tr>
                        <tr>
                            <td>Datos personales <strong>Representante legal</strong></td>
                            <td>
                                <div class="contenedorBtonDescarga">
                                    <a target="_blank" href="../../<?php echo $Ruta[2]?>">
                                        <button class="btn-Descarga"><i class="fas fa-eye"></i></button>
                                    </a> 
                                    
                      
                                    
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Datos personales <strong>Funcionarios</strong></td>
                            <td>
                                <a  target="_blank" href="../../<?php echo $Ruta[3]?>">
                                    <button class="btn-Descarga"><i class="fas fa-eye"></i></button>
                                </a> 
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
           