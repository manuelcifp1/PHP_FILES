
<?php
//Los métodos estáticos se usan mucho en las clases de utilidad o helpers.
//Realiza validaciones de un formulario con métodos estáticos de una clase llamada validador.


class Validador {

    public static function validarNombre($nombre) {
        $regExpNombre = "/^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ´' ]+$/";
        if(!preg_match($regExpNombre, $nombre)) {
            echo "<p>Nombre inválido</p>";
        }

       return $nombre = htmlspecialchars($nombre);
    }

    public static function validarApellido($apellido) {
        $regExpApellido = "/^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ´' ]+$/";
        if(!preg_match($regExpApellido, $apellido)) {
            echo "<p>Apellido inválido</p>";
        }

        return $apellido = htmlspecialchars($apellido);
    }

    public static function validarEmail($email) {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<p>Email no válido</p>";
        }
        return $email = htmlspecialchars($email);
    }

    public static function validarPassword($password) {
        $regExpPassword = "/[0-9]{4}/";
        if(!preg_match($regExpPassword, $password)) {
            echo "<p>Apellido inválido</p>";
        }

        return $password;
    }

}
?>