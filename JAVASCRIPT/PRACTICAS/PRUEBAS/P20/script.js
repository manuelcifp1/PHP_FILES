fetch("http://jsonplaceholder.typicode.com/posts")
.then(respuesta => {
  if(respuesta.ok) {
    return respuesta.json();
  } else {
    throw new Error("No se han recibido los datos correctamente");
  }
})
.then(miJSON => {
  let contador = 0;  
  let total = miJSON.length;
  let botonAnterior = document.getElementById("anterior");
  let botonSiguiente = document.getElementById("siguiente");
  let mensaje = document.getElementById("mensaje");

  function actualizarFormulario() {
    const usuario = miJSON[contador];

    document.getElementById("userid").value = usuario.userId;
    document.getElementById("id").value = usuario.id;
    document.getElementById("title").value = usuario.title;
    document.getElementById("body").value = usuario.body;

    if(contador === 0) {
      mensaje.innerText = "Estás en el primer registro";
    } else if (contador === total - 1 ) {
      mensaje.innerText = "Estás en el último registro";
    } else {
      mensaje.innerText = "";
    }    
    
  }

  actualizarFormulario();

  botonAnterior.addEventListener("click", () => {
    if(contador !== 0) {
      actualizarFormulario();
      contador--;
    }
  });

  botonSiguiente.addEventListener("click", () => {
    if(contador < total - 1) {
      actualizarFormulario();
      contador++;
    }
  });
  
})
.catch(error => {
  console.error("Error: ", error);  
})

//CONSTANTE USUARIO DENTRO DE LA FUNCIÓN!!! ES LA ÚNICA VARIABLE QUE SE PONE ALLÍ!!!