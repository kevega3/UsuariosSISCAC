const formulario = document.getElementById("formulario");
const inputs = document.querySelectorAll("#formulario input");

const expresiones = {
	NombreEntidad: /^[a-z,A-Z, 0-9 o _ * % ñ $ # / () & = !]{5,20}$/, // 7 a 14 numeros.
	// nombre: /^[a-zA-ZÀ-ÿ\s],[0-9]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	NombreNotificador: /^[a-z,A-Z, 0-9 o _ * ñ % $ # / () & = !]{5,20}$/, // 7 a 14 numeros.
	CorreoNotificador: /^[a-zA-Z0-9 ñ _]+@[a-zA-Z0-9-.]{5,40}$/,
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

	if (campos.NombreEntidad && campos.NombreNotificador || campos.CorreoNotificador) {
		// e.currentTarget.submit();
		CrearToken();
	} else {
		document
			.getElementById("formulario__mensaje")
			.classList.add("formulario__mensaje-activo");
	}
});


function CrearToken() {
	Swal.fire({
		title: 'Estas Seguro de generar este token?',
		text: "Si lo aceptas genera un token via correo",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Si, Seguro'
	}).then((result) => {
		if (result.isConfirmed) {
			$("#AgregarToken").modal("hide");
			var NombreEntidad = $("#NombreEntidad").val();
			var NombreNotificador = $("#NombreNotificador").val();
			var CorreoNotificador = $("#CorreoNotificador").val();

			let loader = document.querySelector(".loader");
			loader.classList.add("active");
			$.post("../../modelo/AgregarToken.php", {
				NombreEntidad: NombreEntidad,
				NombreNotificador: NombreNotificador,
				CorreoNotificador: CorreoNotificador
			},
				function (data, status) {
					loader.classList.remove("active");
					Swal.fire({
						position: 'center',
						icon: 'success',
						title: 'Solicitud Creada',
						showConfirmButton: false,
						timer: 1500
					});
					setTimeout("window.location='../pag/Token.php'", 1500);
				})

		}
	})








}


function ReenviarCodigo(CorreoEntidad,id){
	
	Swal.fire({
		title: 'Estas Seguro de reenviar este token?',
		text: "Si lo aceptas se reenviara un token via correo",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Si, Seguro'
	}).then((result) => {
		if (result.isConfirmed) {
			var CorreoNotificador = CorreoEntidad;
			var idRe = id;
		
			let loader = document.querySelector(".loader");
			loader.classList.add("active");
			$.post("../../modelo/ActualizarToken.php", {
				CorreoNotificador: CorreoNotificador,
				idRe: idRe
			},
				function (data, status) {
					loader.classList.remove("active");
					Swal.fire({
						position: 'center',
						icon: 'success',
						title: 'Se reenvio correctamente',
						showConfirmButton: false,
						timer: 1500
					});
				})

		}
	})

}