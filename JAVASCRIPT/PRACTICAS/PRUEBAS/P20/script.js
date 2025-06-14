fetch("https://jsonplaceholder.typicode.com/posts")
  .then(respuesta => {
       if (respuesta.ok) {
            return respuesta.json(); // Convertimos el texto JSON en objeto JS
        } else {
            // Si no, lanzamos un error para que lo capture el catch
            throw new Error("Los datos no llegaron bien");
        }
  })
  .then(miJSON => {
    let contador = 0;
    const total = miJSON.length;
    const mensaje = document.getElementById("mensaje");
    const botonSiguiente = document.getElementById("siguiente");
    const botonAnterior = document.getElementById("anterior");

    function actualizarFormulario() {
      const usuario = miJSON[contador];

      document.getElementById("userid").value = usuario.userId;
      document.getElementById("id").value = usuario.id;
      document.getElementById("titulo").value = usuario.title;
      document.getElementById("cuerpo").value = usuario.body;

      if (contador === 0) {
        mensaje.innerHTML = "Este es el primer registro";
      } else if (contador === total - 1) {
        mensaje.innerHTML = "Este es el último registro";
      } else {
        mensaje.innerHTML = "";
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
    document.getElementById("mensaje").textContent = "Error: " + error;
  });
