<?php
class customException extends Exception {
    public function errorMessage() {
    // Mensaje de error
    $errorMsg = 'Error en la línea '
    .$this->getLine().' en el archivo '
    .$this->getFile() .': <b>'
    .$this->getMessage().
    '</b> no es una dirección de email válida';
    return $errorMsg;
    }
    }

?>