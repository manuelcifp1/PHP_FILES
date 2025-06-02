fetch("https://jsonplaceholder.typicode.com/posts")
    .then(respuesta => {
        if (respuesta.ok) {
            return respuesta.json();
        } else {
            throw new Error("Los datos no llegaron bien");
        }
    })
    .then(miJSON => {
        let contador = 0;
        const total = miJSON.length;
        const parrafo = document.getElementById("parrafo");
        const botonSiguiente = document.getElementById("siguiente");
        const botonAnterior = document.getElementById("anterior");

        function actualizarFormulario() {
            const post = miJSON[contador];

            document.getElementById("id").value = post.id;
            document.getElementById("userId").value = post.userId;
            document.getElementById("title").value = post.title;
            document.getElementById("body").value = post.body;

            if (contador === 0) {
                parrafo.innerHTML = "Este es el primer registro";
            } else if (contador === total - 1) {
                parrafo.innerHTML = "Este es el último registro";
            } else {
                parrafo.innerHTML = "";
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
    })
    .catch(error => {
        document.getElementById("parrafo").textContent = "Error: " + error;
    });
