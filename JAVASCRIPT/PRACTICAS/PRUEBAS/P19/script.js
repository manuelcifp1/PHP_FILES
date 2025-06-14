fetch("datos.json")
.then(respuesta => {
    if(respuesta.ok) {
        return respuesta.json();
    } else {
        throw new Error("Los datos no han llegado bien");
    }
})
.then(miJSON => {
    let formulario = document.createElement("form");

    for(let clave in miJSON) {
        let valor = miJSON[clave];

        //Etiqueta
        let etiqueta = document.createElement("label");
        etiqueta.textContent = clave + ":";
        etiqueta.for = clave;
        //Input
        let entrada = document.createElement("input");
        entrada.name = clave;        
        entrada.value = valor;
        entrada.type = "text";
        //Añadir input y label al form.
        formulario.appendChild(etiqueta);
        formulario.appendChild(entrada);
        //br para espacios
        let saltoLinea = document.createElement("br");
        formulario.appendChild(saltoLinea);

        document.body.appendChild(formulario);

    }
})
.catch(error => {
    let mensaje = document.getElementById("parrafo");
    mensaje.textContent = "Error: " + error;
});

//LOS DOCUMENT DE CREATE ELEMENT!!!! LOS NOMBRE DE LAS VARIABLES!!!