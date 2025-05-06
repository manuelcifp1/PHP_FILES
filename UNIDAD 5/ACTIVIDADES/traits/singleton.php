<?php
/*Un singleton es una clase que solo se puede usar una vez:
La primera vez que se llama, se crea. Las siguientes veces, devuelve la misma.*/
trait Singleton {
    private static $instance;
    public static function getInstance(){
        if(!(self::$instance instanceof self)){
            self::$instance = new self;
        }
        return self::$instance;
    }
}

// // Lector DB
class DbReader extends Mysqli {
    use Singleton;
    /*Código */
}

// Lector de archivos
class FileReader extends SplFileObject{
    use Singleton;
    /*Código */

}