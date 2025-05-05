<?php
/*Realiza métodos estáticos en una clase llamada helper que permita convertir
una cadena en mayúsculas o en minúsculas.*/

class Helper {
    public static function convertirMayusculas($cadena) {
        return strtoupper($cadena);
    }

    public static function convertirMinusculas($cadena) {
        return strtolower($cadena);
    }
}

/*En el código:
 $texto = "Hola Mundo";
echo Helper::convertirMayusculas($texto); // HOLA MUNDO
echo Helper::convertirMinusculas($texto); // hola mundo
*/
?>