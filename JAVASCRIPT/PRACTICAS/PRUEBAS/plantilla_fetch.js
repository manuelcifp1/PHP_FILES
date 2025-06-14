fetch("URL_AQUI")
  .then(respuesta => {
    if (respuesta.ok) {
      return respuesta.json(); // ✅ Convertimos la respuesta en JSON
    } else {
      throw new Error("Los datos no llegaron bien"); // ❌ HTTP error (404, 500, etc.)
    }
  })
  .then(miJSON => {
    // ✅ Aquí manipulas los datos JSON recibidos
  })
  .catch(error => {
    // ❗ Aquí capturas cualquier fallo (red o throw anterior)
    console.error("Error:", error);
  });
