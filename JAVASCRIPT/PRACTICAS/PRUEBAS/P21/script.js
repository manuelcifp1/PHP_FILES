let formulario = document.forms[0];
let invalidacion = document.getElementById("invalidacion");


formulario.addEventListener("submit", function(ev) {
    ev.preventDefault();

    let correo = document.getElementById("email");
    let contrasenia = document.getElementById("password");

    let expPassword = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*\W).{8,}$/;

    if(!expPassword.test(contrasenia.value) || !correo.checkValidity()) {
        ev.preventDefault;
        invalidacion.innerHTML = "Email y/o contraseña inválido";
        return;

    } else {
        let formData = new FormData();
        formData.append("email", correo.value);
        formData.append("password", contrasenia.value);

        fetch("servidor.php" , {
            method: "POST",
            body: formData
        })
        .then(respuesta => {
            if(respuesta.ok) {
                return respuesta.json();
            } else {
                throw new Error("Los datos no se pudieron leer");
            }
        })
        .then(miJSON => {
            if(miJSON.email === "admin@correo.com") {
                formulario.toggleAttribute("hidden");

                let botonAltas = document.createElement("button");
                let botonBajas = document.createElement("button");
                let botonConsultas = document.createElement("button");
                let botonModificaciones = document.createElement("button");

                botonAltas.innerText = "ALTAS";
                botonBajas.innerText = "BAJAS";
                botonConsultas.innerText = "CONSULTAS";
                botonModificaciones.innerText = "MODIFICAR";

                document.body.appendChild(botonAltas);
                document.body.appendChild(botonBajas);
                document.body.appendChild(botonConsultas);
                document.body.appendChild(botonModificaciones);

                botonAltas.addEventListener("click", () => console.log("Ha pulsado el boton de altas"));
                botonBajas.addEventListener("click", () => console.log("Ha pulsado el boton de bajas"));
                botonConsultas.addEventListener("click", () => console.log("Ha pulsado el boton de consultas"));
                botonModificaciones.addEventListener("click", () => console.log("Ha pulsado el boton de modificaciones"));

            } else if(miJSON.email === "cliente@correo.com") {
                formulario.toggleAttribute("hidden");

                let pNombre = document.createElement("p");
                let pApellidos = document.createElement("p");
                let pDni = document.createElement("p");

                pNombre.innerHTML = "Nombre -> " + miJSON.nombre;
                pApellidos.innerHTML = "Apellidos -> " + miJSON.apellidos;
                pDni.innerHTML = "DNI -> " + miJSON.dni;

                document.body.appendChild(pNombre);
                document.body.appendChild(pApellidos);
                document.body.appendChild(pDni);

                let etiqueta = document.createElement("label");
                etiqueta.innerText = "Introduzca petición";
                etiqueta.for = "peticion";

                let peticion = document.createElement("input");
                peticion.name = "peticion";

                etiqueta.appendChild(peticion);
                document.body.appendChild(etiqueta);

                let parrafoConsul = document.createElement("p");
                let botonConsul = document.createElement("button");

                botonConsul.innerText ="CONSULTAR";
                parrafoConsul.appendChild(botonConsul);
                document.body.appendChild(parrafoConsul);

                botonConsul.addEventListener("click", () => console.log(peticion.value)
            );

            } else {
                document.getElementById("noreconocido").innerHTML = "Usuario no reconocido";
            }
        })
        .catch(() => {
            throw new Error("No pudimos procesar la solicitud, vuelva luego.");
        });
    }
});

