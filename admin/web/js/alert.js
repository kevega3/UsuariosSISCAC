function Cerrar() {
    Swal.fire({
        title: '¿Desea Cerrar Sesion?',
        text: "Si cierra Sesion debera volver a Logearse",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Cerrar Sesion',

    }).then((result) => {
        if (result.isConfirmed) {
            window.location = "../../modelo/cerrarsesion.php"
        }
    });
}
function Aceptar() {
    var IdEdit = document.getElementById('Aceptar').name;
    const Editar = window.btoa(IdEdit);
    const IdUser = window.btoa(id);

    const Correos = window.btoa(Correo);
    
    
    	
    Swal.fire({
        title: '¿Desea Aceptar esta solicitud?',
        text: "Si la Acepta se Registrara este usuario ",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2c7f0e',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Aceptar',

    }).then((result) => {
        
        if (result.isConfirmed) {
            $(".loader").addClass("active");
            window.location = "../../modelo/actualizarestado.php?IdEdit="+ Editar + "&id="+ IdUser + "&Correo="+ Correos; 
        }
    });
}
function Negar() {
    Swal.fire({
        title: '¿Desea Negar esta solicitud?',
        text: "Si la Niega debe Redactar un correo explicando el porque",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Negar',
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = "../../modelo/correo.php"
        }
    });
}
function Creado() {
    var IdEdit = document.getElementById('Creado').name;
    const Editar = window.btoa(IdEdit);
    const IdUser = window.btoa(id);
        Swal.fire({
        title: 'Usted ya creo este usuario ?',
        text: "Si Ya lo creo, esta Solicitud cambiara de estado",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, ya lo cree',
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = "../../modelo/actualizadocreado.php?IdEdit="+ Editar + "&id="+ IdUser;
        }
    });
}


