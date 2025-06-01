fetch("https://dummyjson.com/users").then(respuesta => {
             if (respuesta.ok) {
                 //Nos aseguramos que no haya errores
                  return respuesta.json(); //Devuelve un objeto en formato JSON
                   } else {
                     throw new Error("Los datos no llegaron bien");}
                     }) .then(miJSON => { //Recoge nuestra respuesta JSON
                        let contador = 0;

                        let parrafo = document.getElementById("parrafo");

                        let identificacion = document.getElementById("id");
                        identificacion.value = miJSON.users[contador].id;

                        let nombrePila = document.getElementById("nombre");
                        nombrePila.value = miJSON.users[contador].firstName;

                        let primerApe = document.getElementById("apellido");
                        primerApe.value = miJSON.users[contador].lastName;

                        let anios = document.getElementById("edad");
                        anios.value = miJSON.users[contador].age;
                        
                        
                        if(contador == 0) {
                            parrafo.innerHTML = "Este es el primer registro";
                        } else if(contador == miJSON.users.length - 1) {
                           parrafo.innerHTML = "Este es el último registro"; 
                        } else {
                            parrafo.innerHTML = "";
                        }
                        

                        let botonSiguiente = document.getElementById("siguiente");
                     
                        botonSiguiente.addEventListener("click", () => {

                            contador++;

                            let identificacion = document.getElementById("id");
                            identificacion.value = miJSON.users[contador].id;

                            let nombrePila = document.getElementById("nombre");
                            nombrePila.value = miJSON.users[contador].firstName;

                            let primerApe = document.getElementById("apellido");
                            primerApe.value = miJSON.users[contador].lastName;

                            let anios = document.getElementById("edad");
                            anios.value = miJSON.users[contador].age;

                            
                            if(contador == 0) {
                                parrafo.innerHTML = "Este es el primer registro";
                            } else if(contador == miJSON.users.length - 1) {
                            parrafo.innerHTML = "Este es el último registro"; 
                            } else {
                                parrafo.innerHTML = "";
                            }
                        });

                        let botonAnterior = document.getElementById("anterior");

                        botonAnterior.addEventListener("click", () => {
                            contador--;
                            let identificacion = document.getElementById("id");
                            identificacion.value = miJSON.users[contador].id;

                            let nombrePila = document.getElementById("nombre");
                            nombrePila.value = miJSON.users[contador].firstName;

                            let primerApe = document.getElementById("apellido");
                            primerApe.value = miJSON.users[contador].lastName;

                            let anios = document.getElementById("edad");
                            anios.value = miJSON.users[contador].age;
                            
                            if(contador == 0) {
                                parrafo.innerHTML = "Este es el primer registro";
                            } else if(contador == miJSON.users.length - 1) {
                            parrafo.innerHTML = "Este es el último registro"; 
                            } else {
                                parrafo.innerHTML = "";
                            }
                        });
                          
                     
                         })//Lo podemos hacer así por miJSON es un objeto con sus propiedades
    .catch(error => { parrafo.textContent = "Error: " + error; });