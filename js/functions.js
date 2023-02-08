function validar() {
  // Obtener nombre de archivo
  let archivo = document.getElementById('files').value,
  // Obtener extensión del archivo
  extension = archivo.substring(archivo.lastIndexOf('.'),archivo.length);
  // Si la extensión obtenida no está incluida en la lista de valores
  // del atributo "accept", mostrar un error.
  const $miInput = document.querySelector("#files");

  if(document.getElementById('files').getAttribute('accept').split(',').indexOf(extension) < 0) {
    alert('Archivo inválido. No se permite la extensión ' + extension +' solo se permite archivos con extencion PDF');
    $miInput.value = "";
  }
}

function validarPDF() {
  // Obtener nombre de archivo
  let archivo = document.getElementById('filePDF').value,
  // Obtener extensión del archivo
  extension = archivo.substring(archivo.lastIndexOf('.'),archivo.length);
  // Si la extensión obtenida no está incluida en la lista de valores
  // del atributo "accept", mostrar un error.
  const $miInput = document.querySelector("#filePDF");

  if(document.getElementById('filePDF').getAttribute('accept').split(',').indexOf(extension) < 0) {
    alert('Archivo inválido. No se permite la extensión ' + extension +' solo se permite archivos con extencion PDF');
    $miInput.value = "";
  }
}
function validarPDF1() {
  // Obtener nombre de archivo
  let archivo = document.getElementById('filePDF1').value,
  // Obtener extensión del archivo
  extension = archivo.substring(archivo.lastIndexOf('.'),archivo.length);
  // Si la extensión obtenida no está incluida en la lista de valores
  // del atributo "accept", mostrar un error.
  const $miInput = document.querySelector("#filePDF1");

  if(document.getElementById('filePDF1').getAttribute('accept').split(',').indexOf(extension) < 0) {
    alert('Archivo inválido. No se permite la extensión ' + extension +' solo se permite archivos con extencion PDF');
    $miInput.value = "";
  }
}
function validarPDF2() {
  // Obtener nombre de archivo
  let archivo = document.getElementById('filePDF2').value,
  // Obtener extensión del archivo
  extension = archivo.substring(archivo.lastIndexOf('.'),archivo.length);
  // Si la extensión obtenida no está incluida en la lista de valores
  // del atributo "accept", mostrar un error.
  const $miInput = document.querySelector("#filePDF2");

  if(document.getElementById('filePDF2').getAttribute('accept').split(',').indexOf(extension) < 0) {
    alert('Archivo inválido. No se permite la extensión ' + extension +' solo se permite archivos con extencion PDF');
    $miInput.value = "";
  }
}

function validarTamano(){
  // CODIGO PARA LA SUBIDA DE ARCHIVOS
      const MAXIMO_TAMANIO_BYTES = 5000000; // 1MB = 1 millón de bytes

      // Obtener referencia al elemento
      const $miInput = document.querySelector("#files");

      const $filenameB = document.querySelector("#file1");

      $miInput.addEventListener("change", function () {
        // si no hay archivos, regresamos
        if (this.files.length <= 0) return;

        // Validamos el primer archivo únipcamente
        const archivo = this.files[0];
        if (archivo.size > MAXIMO_TAMANIO_BYTES) {
          const tamanioEnMb = MAXIMO_TAMANIO_BYTES / 1000000;
          alert(`El tamaño máximo es ${tamanioEnMb} MB`);
          // Limpiar
          $miInput.value = "";
          $filenameB.text = "";
        } else {
          // Validación pasada. Envía el formulario o haz lo que tengas que hacer
        }
      });
    }
    function validarTamanoPDF(){
  // CODIGO PARA LA SUBIDA DE ARCHIVOS
      const MAXIMO_TAMANIO_BYTES = 5000000; // 1MB = 1 millón de bytes

      // Obtener referencia al elemento
      const $miInput = document.querySelector("#filePDF");

      const $filenameB = document.querySelector("#file2");

      $miInput.addEventListener("change", function () {
        // si no hay archivos, regresamos
        if (this.files.length <= 0) return;

        // Validamos el primer archivo únipcamente
        const archivo = this.files[0];
        if (archivo.size > MAXIMO_TAMANIO_BYTES) {
          const tamanioEnMb = MAXIMO_TAMANIO_BYTES / 1000000;
          alert(`El tamaño máximo es ${tamanioEnMb} MB`);
          // Limpiar
          $miInput.value = "";
          $filenameB.text = "";
        } else {
          // Validación pasada. Envía el formulario o haz lo que tengas que hacer
        }
      });
    }
    function validarTamanoPDF1(){
  // CODIGO PARA LA SUBIDA DE ARCHIVOS
      const MAXIMO_TAMANIO_BYTES = 5000000; // 1MB = 1 millón de bytes

      // Obtener referencia al elemento
      const $miInput = document.querySelector("#filePDF1");
      const $filenameB = document.querySelector("#file3");

      $miInput.addEventListener("change", function () {
        // si no hay archivos, regresamos
        if (this.files.length <= 0) return;

        // Validamos el primer archivo únipcamente
        const archivo = this.files[0];
        if (archivo.size > MAXIMO_TAMANIO_BYTES) {
          const tamanioEnMb = MAXIMO_TAMANIO_BYTES / 1000000;
          alert(`El tamaño máximo es ${tamanioEnMb} MB`);
          // Limpiar
          $miInput.value = "";
          $filenameB.text = "";
        } else {
          // Validación pasada. Envía el formulario o haz lo que tengas que hacer
        }
      });
    }

    
    function validarTamanoPDF2(){
  // CODIGO PARA LA SUBIDA DE ARCHIVOS
      const MAXIMO_TAMANIO_BYTES = 5000000; 

 
      const $miInput = document.querySelector("#filePDF2");
      const $filenameB = document.querySelector("#file4");

      $miInput.addEventListener("change", function () {

        if (this.files.length <= 0) return;

   
        const archivo = this.files[0];
        if (archivo.size > MAXIMO_TAMANIO_BYTES) {
          const tamanioEnMb = MAXIMO_TAMANIO_BYTES / 1000000;
          alert(`El tamaño máximo es ${tamanioEnMb} MB`);
  
          $miInput.value = "";
          $filenameB.text = "";
        } else {
        
        }
      });
    }

    $(document).ready(function(){
      $('input[id="files"]').change(function(e){
        var fileName = e.target.files[0].name;
      //alert('The file "' + fileName +  '" has been selected.');
      $("#file1").text(fileName);
    });
    });
    $(document).ready(function(){
      $('input[id="filePDF"]').change(function(e){
        var fileName = e.target.files[0].name;
      //alert('The file "' + fileName +  '" has been selected.');
      $("#file2").text(fileName);
    });
    });
    $(document).ready(function(){
      $('input[id="filePDF1"]').change(function(e){
        var fileName = e.target.files[0].name;
      //alert('The file "' + fileName +  '" has been selected.');
      $("#file3").text(fileName);
    });
    });
    $(document).ready(function(){
      $('input[id="filePDF2"]').change(function(e){
        var fileName = e.target.files[0].name;
      //alert('The file "' + fileName +  '" has been selected.');
      $("#file4").text(fileName);
    });
    });


   function FormatoAsig(){
    Swal.fire({
      title: 'Elige su tipo de entidad',
      input: 'select',
      confirmButtonColor: '#17309C',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Descargar',
      inputOptions: {
        '1': 'IPS',
        '2': 'EAPB',
      },
      inputPlaceholder: 'Requerido',
      showCancelButton: true,
      inputValidator: function (value) {
        return new Promise(function (resolve, reject) {
          if (value !== '') {
            resolve();
          } else {
            resolve('Necesitamos que nos de una opcion ');
          }
        });
      }
    }).then(function (result) {
      if (result.isConfirmed) {
        if(result.value == '1'){
          window.location = "https://cuentadealtocosto.org/site/wp-content/uploads/2022/09/formato_permisos_roles_gdt-ft-79-ips.xlsx";
          target = "_blank";
        }else if(result.value == '2'){
          window.location = "https://cuentadealtocosto.org/site/wp-content/uploads/2022/09/formato_permisos_roles_gdt-ft-79-eapb.xlsx";
          target = "_blank";
        }else{
          Swal.fire({
            icon: 'error',
            html: 'Vuelva a descargarlo'
          });  
        }
        Swal.fire({
          position: 'center',
          icon: 'success',
          title: 'Documento descargado',
          showConfirmButton: false,
          timer: 1500
        })
      }

    });
    }