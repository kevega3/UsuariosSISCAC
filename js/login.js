
const formulario = document.getElementById("formulario");
const inputs = document.querySelectorAll("#formulario input");

const expresiones = {
	TokenACC: /^[a-z,A-Z, 0-9 o Ñ ñ]{3,40}$/, // 7 a 14 numeros.
};

const campos = {
	TokenACC: false,
};

const validarFormulario = (e) => {
	switch (e.target.name) {
		case "TokenACC":
			validarCampo(expresiones.TokenACC, e.target, "TokenACC");
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
            $(".login__input").attr('style',  'border-bottom: 2px solid #D1D1D4');
            $(".formulario__validacion-estadospan").attr('style',  'color:#1739CC');

            document.getElementById("btnSubmitt").innerHTML = "GENERAR UNA SOLICITUD ";
            
            $(".login__input").attr('style',  'border-bottom: 2px solid #1739cc');
            $(".formulario__validacion-estadospan").attr('style',  'color: #1739cc');
            $(".login__submit").attr('style',  'border: 1px solid #1739cc;background: #1739cc;box-shadow: 0px 2px 2px #1739cc;');
            
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
            $(".login__input").attr('style',  'border-bottom: 2px solid Red');
            $(".formulario__validacion-estadospan").attr('style',  'color: red');
            
		campos[campo] = false;
	}
};






inputs.forEach((input) => {
	input.addEventListener("keyup", validarFormulario);
	input.addEventListener("blur", validarFormulario);
});

formulario.addEventListener("submit", (e) => {
	e.preventDefault();

	if (campos.TokenACC ) {
		e.currentTarget.submit();
	} else {
		document
			.getElementById(`grupo__TokenACC`)
			.classList.add("formulario__grupo-incorrecto");
		document
			.getElementById(`grupo__TokenACC`)
			.classList.remove("formulario__grupo-correcto");
		document
			.querySelector(`#grupo__TokenACC i`)
			.classList.add("fa-times-circle");
		document
			.querySelector(`#grupo__TokenACC i`)
			.classList.remove("fa-check-circle");
		document
			.querySelector(`#grupo__TokenACC .formulario__input-error`)
			.classList.add("formulario__input-error-activo");
            $(".login__input").attr('style',  'border-bottom: 2px solid Red');
            $(".formulario__validacion-estadospan").attr('style',  'color: red');
            $(".login__submit").attr('style',  'border: 1px solid red;background: red;box-shadow: 0px 2px 2px red;');
            // $(".button login__submit").innerText = "Llene el formulario";
            document.getElementById("btnSubmitt").innerHTML = "LLENE EL FORMULARIO CORRECTAMENTE"; 

	}
});
