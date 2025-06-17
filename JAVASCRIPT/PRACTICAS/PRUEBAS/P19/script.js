fetch("datos.json")
.then(respuesta => {
    if(respuesta.ok) {
        return respuesta.json();
    } else {
        throw new Error("Fallo en la recepción de los datos");
    }
})
.then(miJSON => {
    let formulario = document.createElement("form");
    let valor;
    let etiqueta;
    let entrada;
    let salto;

    for(let clave in miJSON) {
        valor = miJSON[clave];

        etiqueta = document.createElement("label");
        entrada = document.createElement("input");
        
        etiqueta.for = clave;
        etiqueta.textContent = clave + ":";

        entrada.name = clave;
        entrada.value = valor;

        formulario.append(etiqueta, entrada);

        salto = document.createElement("br");
        formulario.appendChild(salto);

        document.body.appendChild(formulario);
    }
})
.catch(error => {
    console.error("Error: ", error);
})

//LOS DOCUMENT DE CREATE ELEMENT!!!! LOS NOMBRE DE LAS VARIABLES!!!
//APPENCHILD EL FORMULARIO!!!!!