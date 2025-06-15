fetch("http://jsonplaceholder.typicode.com/posts")
.then(respuesta => {
  if(respuesta.ok) {
    return respuesta.json();
  } else {
    throw new Error("La cagamos");
  }
})
.then(miJSON => {
  let contador = 0;
  const total = miJSON.length;
  let mensaje = document.getElementById("mensaje");
  const botonAnterior = document.getElementById("anterior");
  const botonSiguiente = document.getElementById("siguiente");

  function actualizarFormulario() {
    const usuario = miJSON[contador];

    document.getElementById("userid").value = usuario.userId;
    document.getElementById("id").value = usuario.id;
    document.getElementById("title").value = usuario.title;
    document.getElementById("body").value = usuario.body;

    if(contador === 0) {
      mensaje.textContent = "Este es el primer registro";
    } else if(contador === total - 1) {
      mensaje.textContent = "Este es el último registro";
    } else {
      mensaje.textContent = "";
    }
  }

  actualizarFormulario();

  botonSiguiente.addEventListener("click", () => {
    if(contador < total - 1) {
      contador++;
      actualizarFormulario();
    }
  });

  botonAnterior.addEventListener("click", () => {
    if(contador > 0) {
      contador--;
      actualizarFormulario();
    }
  });
})
.catch(error => {
    console.error("Error: ", error);
})