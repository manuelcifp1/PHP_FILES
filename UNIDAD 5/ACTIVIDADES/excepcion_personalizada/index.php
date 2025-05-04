<?php
require_once "customException.php";

// Ponemos un email no válido para forzar la excepción
$email = "ejemplo@ejemplo/.com";
// Iniciamos el bloque try
try {
// Comprobar si el email es válido
if(filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) {
// Lanza una excepción si el email no es válido
throw new customException($email);
}
}
// Iniciamos el bloque catch
catch (customException $e) {
// Muestra el mensaje que hemos customizado en customException:
echo $e->errorMessage();
}

?>