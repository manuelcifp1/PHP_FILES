<?php
/*1. Crea un trait llamado Logger que contenga un método público log($message) que imprima un mensaje
 con una marca de tiempo. Usa este trait en una clase llamada FileProcessor para registrar mensajes
  sobre el procesamiento de un archivo. */

trait Logger {
    function log($message) {
        echo "[" . date("H:i:s") . "] " . $message . "<br>";
    }
}

class FileProcessor {
    use Logger;
}
?>