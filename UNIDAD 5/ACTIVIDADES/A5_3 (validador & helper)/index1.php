
<?php
//Los métodos estáticos se usan mucho en las clases de utilidad o helpers.
//Realiza validaciones de un formulario con métodos estáticos de una clase llamada validador.


class Validador {

    public static function validarNombre($nombre) {
        $regExpNombre = "/^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ´' ]+$/";
        return preg_match($regExpNombre, $nombre);       
    }

    /* En el código:
    if(!Validador::validarNombre($nombre)) {
        echo "Nombre no válido";    
    } else {
        $nombre = htmlspecialchars(trim($nombre)); 
    } */
    
    
   

}
?>