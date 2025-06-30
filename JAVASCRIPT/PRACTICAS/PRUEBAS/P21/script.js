let formulario = document.forms[0];
let invalidacion = document.getElementById("invalido");

formulario.addEventListener("submit", (ev) => {
    ev.preventDefault();
    let contrasenia = document.getElementById("password");
    let correo = document.getElementById("email");
    let exPassword = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*\W).{8,}$/;

    if(!exPassword.test(contrasenia.value || !correo.checkValidity())) {
        ev.preventDefault();
        invalidacion.innerHTML = "Email o contraseña inválidos";
    } else {
        let formData = new FormData();
        formData.append("email", correo.value);
        formData.append("password", contrasenia.value);

        fetch("servidor.php", {
            method: 'POST',
            body: formData
        })
        .then(respuesta => {
            if(respuesta.ok) {
                return respuesta.json();
            } else {
                throw new Error("Los datos no se han recibido correctamente");
            }
        })
        .then(miJSON => {
            if(miJSON.email === "admin@correo.com") {
                formulario.toggleAttribute("hidden");

                function crearBotones(innerTexto, mensaje) {
                    let boton = document.createElement("button");
                    boton.innerText = innerTexto;
                    document.body.appendChild(boton);

                    boton.addEventListener("click", () => {
                        console.log(mensaje);
                    })
                }
                crearBotones("ALTAS", "Ha pulsado el botón de altas.");
                crearBotones("BAJAS", "Ha pulsado el botón de bajas.");
                crearBotones("CONSULTAS", "Ha pulsado el botón de consultas.");
                crearBotones("MODIFICACIONES", "Ha pulsado el botón de modificaciones");
            } else if(miJSON.email === "cliente@correo.com") {
                formulario.toggleAttribute("hidden");

                let pNombre, pApellidos, pDni, parrafoConsul;

                function crearParrafo() {
                    return document.createElement("p");
                }

                pNombre = crearParrafo();
                pApellidos = crearParrafo();
                pDni = crearParrafo();

                pNombre.innerHTML = "Nombre -> " + miJSON.nombre;
                pApellidos.innerHTML = "Apellidos -> " + miJSON.apellidos;
                pDni.innerHTML = "DNI -> " + miJSON.DNI;

                document.body.append(pNombre, pApellidos, pDni);
                

                let etiqueta = document.createElement("label");
                etiqueta.setAttribute("for", "peticion");
                etiqueta.innerText = "Introduzca petición";

                let peticion = document.createElement("input");
                peticion.setAttribute("name", "peticion");
                
                etiqueta.appendChild(peticion);
                document.body.appendChild(etiqueta);                

                parrafoConsul = crearParrafo();
                let botonConsul = document.createElement("button");

                botonConsul.innerText = "CONSULTAR";
                parrafoConsul.appendChild(botonConsul);
                document.body.appendChild(parrafoConsul);

                botonConsul.addEventListener("click", () => {
                    console.log(peticion.value);
                });

            } else {
                document.getElementById("noreconocido").innerHTML = "Usuario no reconocido";
            }
        })
        .catch(() => {
            throw new Error("No se puede procesar la solicitud, inténtelo luego");
        })
    }

    
})