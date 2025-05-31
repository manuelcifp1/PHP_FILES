// Hacemos una petición fetch al archivo datos.json
fetch("datos.json")
    .then(respuesta => {
        // Si la respuesta llega correctamente (código 200–299)
        if (respuesta.ok) {
            return respuesta.json(); // Convertimos el texto JSON en objeto JS
        } else {
            // Si no, lanzamos un error para que lo capture el catch
            throw new Error("Los datos no llegaron bien");
        }
    })
    .then(miJSON => {
        //Creamos un formulario vacío
        let formulario = document.createElement("form");

        //Recorremos todas las claves del objeto JSON usando for...in
        for (let clave in miJSON) {
            let valor = miJSON[clave]; //Guardamos el valor asociado a cada clave

            //Creamos la etiqueta (label)
            let label = document.createElement("label");
            label.textContent = clave + ": ";
            label.setAttribute("for", clave); //Asignamos el atributo for
            formulario.appendChild(label); //Añadimos la etiqueta al formulario

            //Creamos el input
            let input = document.createElement("input");
            input.type = "text"; //Para simplificar, todos los campos son tipo texto
            input.name = clave; //Asignamos el nombre del input según la clave
            input.value = valor; //Le ponemos el valor del JSON
            formulario.appendChild(input); //Añadimos el input al formulario

            //Añadimos un salto de línea para que quede ordenado
            formulario.appendChild(document.createElement("br"));
        }

        //Finalmente, añadimos el formulario completo al body del documento
        document.body.appendChild(formulario);
    })
    .catch(error => {
        // Si algo falla, mostramos el error en el párrafo con id "parrafo"
        let parrafo = document.getElementById("parrafo");
        parrafo.textContent = "Error: " + error;
    });
