<?php
abstract class Animal {
    protected $nombre;
    public static int $contador= 0;

    public function __construct($nombre) {
        $this->nombre = $nombre;
        self::$contador++;
    }
    abstract public function hacerSonido(): string;

    public function saludar(): string {
        return "Hola, soy $this->nombre"; 
    }

}

class Vaca extends Animal {
protected $clase;
public static int $contador= 0;
    function __construct($nombre) {
        parent::__construct($nombre);
        
        self::$contador++;
    } 
    function hacerSonido(): string {
        return "Muuuuu ";
    }
}

class Pato extends Animal {
    protected $clase;
    public static int $contador= 0;

    function __construct($nombre) {
        parent::__construct($nombre);
        
        self::$contador++;
    } 
    function hacerSonido(): string {
        return "cuac cuac ";
    }
}

$vacuno1 = new Vaca("Lola");
$patito1 = new Pato("Donald");

echo $vacuno1->saludar();
echo "<br><br>";
echo $vacuno1->hacerSonido();
echo "<br><br>";
echo $patito1->saludar();
echo "<br><br>";
echo $patito1->hacerSonido();
echo "<br><br>";
echo Animal::$contador;
echo "<br><br>";
echo "Se han creado " . Vaca::$contador . " vacas";
echo "<br><br>";
echo "Se han creado " . Pato::$contador . " patos";
echo "<br><br>";


?>