fetch("https://dummyjson.com/users").then(respuesta => {
             if (respuesta.ok) {
                 //Nos aseguramos que no haya errores
                  return respuesta.json(); //Devuelve un objeto en formato JSON
                   } else {
                     throw new Error("Los datos no llegaron bien");}
                     }) .then(miJSON => { //Recoge nuestra respuesta JSON
                        let contador = 0;

                        let identificacion = document.getElementById("id");
                        identificacion.value = miJSON.contador.id;

                        let nombrePila = document.getElementById("nombre");
                        nombrePila.value = miJSON.contador.firstName;

                        let primerApe = document.getElementById("apellido");
                        primerApe.value = miJSON.contador.lastName;

                        let anios = document.getElementById("edad");
                        anios.value = miJSON.contador.age;
                        
                        let parrafo = document.getElementById("parrafo");
                        if(contador == 0) {
                            parrafo.innerHTML = "Este es el primer registro";
                        } else if(contador == miJSON.users.length) {
                           parrafo.innerHTML = "Este es el último registro"; 
                        } else {
                            parrafo.innerHTML = "";
                        }
                        

                        let botonSiguiente = document.getElementById("siguiente");
                     
                        botonSiguiente.addEventListener("click", () => {

                            contador++;
                            let identificacion = document.getElementById("id");
                            identificacion.value = miJSON.contador.id;

                            let nombrePila = document.getElementById("nombre");
                            nombrePila.value = miJSON.contador.firstName;

                            let primerApe = document.getElementById("apellido");
                            primerApe.value = miJSON.contador.lastName;

                            let anios = document.getElementById("edad");
                            anios.value = miJSON.contador.age;

                            let botonSiguiente = document.getElementById("siguiente");
                        
                            botonSiguiente.addEventListener("click", () => {
                                contador++;
                                let identificacion = document.getElementById("id");
                                identificacion.value = miJSON.contador.id;

                                let nombrePila = document.getElementById("nombre");
                                nombrePila.value = miJSON.contador.firstName;

                                let primerApe = document.getElementById("apellido");
                                primerApe.value = miJSON.contador.lastName;

                                let anios = document.getElementById("edad");
                                anios.value = miJSON.contador.age;
                            });
                            let parrafo = document.getElementById("parrafo");
                            if(contador == 0) {
                                parrafo.innerHTML = "Este es el primer registro";
                            } else if(contador == miJSON.users.length) {
                            parrafo.innerHTML = "Este es el último registro"; 
                            } else {
                                parrafo.innerHTML = "";
                            }
                        });

                        let botonAnterior = document.getElementById("anterior");

                        botonAnterior.addEventListener("click", () => {
                            contador--;
                            let identificacion = document.getElementById("id");
                            identificacion.value = miJSON.contador.id;

                            let nombrePila = document.getElementById("nombre");
                            nombrePila.value = miJSON.contador.firstName;

                            let primerApe = document.getElementById("apellido");
                            primerApe.value = miJSON.contador.lastName;

                            let anios = document.getElementById("edad");
                            anios.value = miJSON.contador.age;

                            let parrafo = document.getElementById("parrafo");
                            if(contador == 0) {
                                parrafo.innerHTML = "Este es el primer registro";
                            } else if(contador == miJSON.users.length) {
                            parrafo.innerHTML = "Este es el último registro"; 
                            } else {
                                parrafo.innerHTML = "";
                            }
                        });
                          
                     
                         })//Lo podemos hacer así por miJSON es un objeto con sus propiedades
    .catch(error => { parrafo.textContent = "Error: " + error; });