<?php
    class Person {

        //atributos

        public $name;
        public $surname;
        public $age;

        //atributo estatico

        public static $counter=0;

        //constructor

        public function __construct($name, $surname, $age) {

            $this->name = $name;
            $this->surname = $surname;
            $this->age = $age;

            self::$counter++;
        }

        //metodo

        public function presentate(){

            echo "Hola soy $this->name $this->surname y tengo $this->age años! \n";

        }
    }

    $persona1 = new Person('Giuseppe','Verdi','56');
    $persona2 = new Person('Paolo','Rossi','48');
    $persona3 = new Person('Guglielmo','Bianchi','56');

 
    echo Person::$counter;

    //Output
    //3
?>