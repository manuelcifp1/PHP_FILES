<?php
/*- Dado un array que contiene varios números enteros, implementa un código en PHP que utilice un bucle for para encontrar
 y mostrar el número más alto en el array.*/
$numeros = [15, 26, 2, 8, 97];
$mayor= 0;
for ($i = 0; $i < count($numeros); $i++) {
    if ($numeros[$i] > $mayor) {
        $mayor = $numeros[$i];
    }
}

echo "El mayor número del array es $mayor <br>";

/*- Dado un array asociativo que contiene el nombre de varios empleados junto con sus edades.
   Escribe un código en PHP que utilice un bucle foreach para mostrar el nombre de cada empleado junto con su edad.*/
$empleados = ["Paco"=>38, "Antonio"=>25, "Josefa"=>42, "Lola"=>22];

foreach($empleados as $nombre=>$edad) {
    echo "Nombre: $nombre, Edad: $edad <br>";
}

/*- Dado un array asociativo que contiene productos y sus precios. Implementa un código en PHP que utilice un bucle foreach
   para recorrer los productos y otro bucle foreach que sume todos los precios y muestre el total.*/
$productos = ["tijeras"=>12, "dedal"=>2, "máquina de coser"=>200, "botón"=> 1];

foreach($productos as $name=>$price) {
    echo "Producto: $name, Precio: $price<br>";
}

$total = 0;
foreach($productos as $name=>$price) {
    $total += $price;
}

echo "El total de la suma de todos los precios es $total<br>";


/*- Dado un array de frutas y una variable que contiene el nombre de una fruta, utiliza un bucle foreach para verificar
   si la fruta está en el array. Si está, muestra un mensaje indicando que la fruta se encuentra en el array;
   de lo contrario, muestra que no está.*/

$frutas = ["manzana", "pera", "platano", "tomate"];
$buscaFruta = "platano";

$existe = false;

foreach ($frutas as $fruta) {
    if ($fruta == $buscaFruta) {
        $existe = true;
    }
}

if ($existe) {
    echo "La fruta está en el array.<br>";
} else {
    echo "La fruta no está en el array.<br>";
}

