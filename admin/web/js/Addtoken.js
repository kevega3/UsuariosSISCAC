const formulario = document.getElementById("formulario");
const inputs = document.querySelectorAll("#formulario input");

const expresiones = {
    NombreEntidad: /^[a-z,A-Z, 0-9 o _ * % $ # / () & = !]{5,20}$/, // 7 a 14 numeros.
	// nombre: /^[a-zA-ZÀ-ÿ\s],[0-9]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	NombreNotificador: /^[a-z,A-Z, 0-9 o _ * % $ # / () & = !]{5,20}$/, // 7 a 14 numeros.
    CorreoNotificador: /^[a-zA-Z0-9_]+@[a-zA-Z0-9-.]{5,40}$/,
};

const campos = {
	NombreEntidad: false,
	// selector: false,
	NombreNotificador: false,
    CorreoNotificador: false,
};

const validarFormulario = (e) => {
	switch (e.target.name) {
		case "NombreEntidad":
			validarCampo(expresiones.NombreEntidad, e.target, "NombreEntidad");
			break;
		case "NombreNotificador":
			validarCampo(expresiones.NombreNotificador, e.target, "NombreNotificador");
			break;
        case "CorreoNotificador":
			validarCampo(expresiones.CorreoNotificador, e.target, "CorreoNotificador");
			break;
	}
};

const validarCampo = (expresion, input, campo) => {
	if (expresion.test(input.value)) {
		document
			.getElementById(`grupo__${campo}`)
			.classList.remove("formulario__grupo-incorrecto");
		document
			.getElementById(`grupo__${campo}`)
			.classList.add("formulario__grupo-correcto");
		document
			.querySelector(`#grupo__${campo} i`)
			.classList.add("fa-check-circle");
		document
			.querySelector(`#grupo__${campo} i`)
			.classList.remove("fa-times-circle");
		document
			.querySelector(`#grupo__${campo} .formulario__input-error`)
			.classList.remove("formulario__input-error-activo");
		campos[campo] = true;
	} else {
		document
			.getElementById(`grupo__${campo}`)
			.classList.add("formulario__grupo-incorrecto");
		document
			.getElementById(`grupo__${campo}`)
			.classList.remove("formulario__grupo-correcto");
		document
			.querySelector(`#grupo__${campo} i`)
			.classList.add("fa-times-circle");
		document
			.querySelector(`#grupo__${campo} i`)
			.classList.remove("fa-check-circle");
		document
			.querySelector(`#grupo__${campo} .formulario__input-error`)
			.classList.add("formulario__input-error-activo");
		campos[campo] = false;
	}
};

inputs.forEach((input) => {
	input.addEventListener("keyup", validarFormulario);
	input.addEventListener("blur", validarFormulario);
});

formulario.addEventListener("submit", (e) => {
	e.preventDefault();

	if (campos.NombreEntidad && campos.NombreNotificador || campos.CorreoNotificador ) {
		e.currentTarget.submit();
		document
			.querySelectorAll(".formulario__grupo-correcto")
			.forEach((icono) => {
				icono.classList.remove("formulario__grupo-correcto");
			});
	} else {
		document
			.getElementById("formulario__mensaje")
			.classList.add("formulario__mensaje-activo");
	}
});


function CrearToken() {
    var NombreEntidad = $("#NombreEntidad").val();
    var NombreNotificador = $("#NombreNotificador").val();
    var CorreoNotificador = $("#CorreoNotificador").val();
  
    alert(NombreEntidad);
    alert(NombreNotificador);
    alert(CorreoNotificador);
    // if (control) {
    //   var id = $("#idUser").val();
    //   var ContenidoCorreo = $("#ContenidoCorreo").val();
    //   var FechaEnvio = $("#FechaEnvio").val();
    //   var IdCorreos = $("#IdCorreos").val();
    //   var Number = $("#Number").val();
    //   var Asunto = $("#Asunto").val();
    //   let loader = document.querySelector(".loader");
    //   loader.classList.add("active");
    //   $.post("../../../Modelo/CrearSolicitud.php", {
    //     Test: Test,
    //     id: id,
    //     ContenidoCorreo: ContenidoCorreo,
    //     FechaEnvio: FechaEnvio,
    //     IdCorreos: IdCorreos,
    //     Number: Number,
    //     Asunto: Asunto
    //   },
    //     function (data, status) {
    //       loader.classList.remove("active");
    //       Swal.fire({
  
    //         position: 'center',
    //         icon: 'success',
    //         title: 'Solicitud Creada',
    //         showConfirmButton: false,
    //         timer: 1500
    //       });
    //       setTimeout("window.location='../Solicitudes.php'", 1500);
    //     })
    // }
  }
  