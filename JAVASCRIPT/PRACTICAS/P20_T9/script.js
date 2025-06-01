//Hacemos fetch al servidor para obtener los usuarios.
fetch("https://dummyjson.com/users")
  .then(respuesta => {
    //Comprobamos si la respuesta fue exitosa.
    if (respuesta.ok) {
      return respuesta.json(); //Convertimos a objeto JS.
    } else {
      throw new Error("Los datos no llegaron bien");
    }
  })
  .then(miJSON => {
    //Declaramos variables.
    let contador = 0; //Para seguir la posición actual.
    const total = miJSON.users.length; //Número total de usuarios.
    const parrafo = document.getElementById("parrafo"); //Mensaje informativo.
    const botonSiguiente = document.getElementById("siguiente");
    const botonAnterior = document.getElementById("anterior");

    //Función para actualizar el formulario con los datos del usuario actual.
    function actualizarFormulario() {
      const usuario = miJSON.users[contador]; //Usuario actual

      //Rellenamos los campos del formulario.
      document.getElementById("id").value = usuario.id;
      document.getElementById("nombre").value = usuario.firstName;
      document.getElementById("apellido").value = usuario.lastName;
      document.getElementById("edad").value = usuario.age;

      //Mostramos mensajes según la posición.
      if (contador === 0) {
        parrafo.innerHTML = "Este es el primer registro";
      } else if (contador === total - 1) {
        parrafo.innerHTML = "Este es el último registro";
      } else {
        parrafo.innerHTML = ""; //No mostrar mensaje si estamos en medio.
      }
    }

    //Mostramos el primer usuario al cargar la página.
    actualizarFormulario();

    // Botón Siguiente
    botonSiguiente.addEventListener("click", () => {
      if (contador < total - 1) { //No pasarse del final.
        contador++;
        actualizarFormulario();
      }
    });

    // Botón Anterior
    botonAnterior.addEventListener("click", () => {
      if (contador > 0) { //No pasarse del principio.
        contador--;
        actualizarFormulario();
      }
    });
  })
  .catch(error => {
    //Si algo falla, mostramos el error en el párrafo.
    document.getElementById("parrafo").textContent = "Error: " + error;
  });
