fetch("datos.json")
.then(respuesta => {
    if(respuesta.ok) {
        return respuesta.json();
    } else {
        throw new Error("Los datos llegaron fatal");
    }
})
.then(miJSON => {
    let formulario = document.createElement("form");

    for(let clave in miJSON) {
        let valor = miJSON[clave];

        let etiqueta = document.createElement("label");
        etiqueta.for = clave;
        etiqueta.textContent = clave;
        formulario.appendChild(etiqueta);

        let entrada = document.createElement("input");
        entrada.name = clave;
        entrada.value = valor;
        formulario.appendChild(entrada);

        let salto = document.createElement("br");
        formulario.appendChild(salto);
    }
    document.body.appendChild(formulario);
    
})
.catch(error => {
    console.error("Error: " + Error);
})


//LOS DOCUMENT DE CREATE ELEMENT!!!! LOS NOMBRE DE LAS VARIABLES!!!