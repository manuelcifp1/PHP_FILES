async function peticion() {
    try {
        const respuesta = await fetch("https://jsonplaceholder.typicode.com/posts");

        if (!respuesta.ok) {
            throw new Error("Hay problemas para recibir los datos");
        }

        const miJSON = await respuesta.json();

        let contador = 0;
        let total = miJSON.length;
        let mensaje = document.getElementById("mensaje");
        let botonSiguiente = document.getElementById("siguiente");
        let botonAnterior = document.getElementById("anterior");

        function actualizarFormulario() {
            let usuario = miJSON[contador];

            document.getElementById("userid").value = usuario.userId;
            document.getElementById("id").value = usuario.id;
            document.getElementById("title").value = usuario.title;
            document.getElementById("body").value = usuario.body;

            if (contador === 0) {
                mensaje.innerText = "Este es el primer registro";
            } else if (contador === total - 1) {
                mensaje.innerText = "Este es el último registro";
            } else {
                mensaje.innerText = "";
            }
        }

        actualizarFormulario();

        botonSiguiente.addEventListener("click", () => {
            if (contador < total - 1) {
                contador++;
                actualizarFormulario();
            }
        });

        botonAnterior.addEventListener("click", () => {
            if (contador > 0) {
                contador--;
                actualizarFormulario();
            }
        });

    } catch (err) {
        document.getElementById("mensaje").textContent = "Error: " + err;
    }
}

peticion();
