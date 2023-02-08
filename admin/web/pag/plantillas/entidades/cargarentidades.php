<form action="../../modelo/actualizarsolicitud.php" method="POST" enctype="multipart/form-data" id="formulario">
    <div class="row">
        <div class="text0 ">
            <h5>
                Volver a Cargar Archivo
            </h5>
        </div>
        <div class="col-50 0 ">
            <label for="files">Formato de asignación de usuarios</label><br>

            <label class="file">
                <input type="file" id="files" onclick="validarTamano()" onchange="validar()" name="asignacionUsuarios"
                accept=".xlsx,.xls">
                <span class="file-custom"><a id="file1"><?php echo $Nombre[0] ?></a></span>
            </label>

        </div>
        <div class="text1">
            <h5>
                Volver a Cargar Archivo
            </h5>
        </div>
        <div class="col-50 1">
            <label for="filePDF">Modelo de Comunicado solicitud de usuarios</label><br>
            <label class="file">
                <input type="file" id="filePDF" onclick="validarTamanoPDF()" onchange="validarPDF()" accept=".pdf"
                    name="comunicado">
                <span class="file-custom"><a id="file2"><?php echo $Nombre[1] ?></a></span>
            </label>
        </div>
    </div>
    <div class="row">

        <div class="text2 ">
            <h5>
                Volver a Cargar Archivo
            </h5>
        </div>
        <div class="col-50 2">
            <label for="filePDF1">Formato de Tratamiento de datos personales Representante legal</label>
            <label class="file">
                <input type="file" id="filePDF1" onclick="validarTamanoPDF1()" onchange="validarPDF1()" accept=".pdf"
                    name="representante">
                <span class="file-custom"><a id="file3"><?php echo $Nombre[2] ?></a></span>
            </label>
        </div>
        
    </div>
    <br>
    <br>
    <div class="row">
        <input type="hidden" name="buscar" value="<?php echo $buscar?>">
        <input type="submit" value="Enviar solicitud">
    </div>
</form>





