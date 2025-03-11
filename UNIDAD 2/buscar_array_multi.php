<?php
/*Buscar un valor en un array multidimensional:
Crear una función que busque un producto por nombre en un array multidimensional y devuelva su precio y cantidad en stock. */
$articulos = [
["nombre"=>"televisor", "precio"=>150, "unidades"=>10 ],
["nombre"=>"batidora", "precio"=>50, "unidades"=>8 ],
["nombre"=>"secadora", "precio"=>300, "unidades"=>4 ],
["nombre"=>"plancha", "precio"=>45, "unidades"=>2 ]
];

function buscarNombre ($nombreBuscar, $arrayMulti) {
    foreach ($arrayMulti as ["nombre"=>$nombre, "precio"=>$precio, "unidades"=>$unidades] ) {
        if ($nombreBuscar == $nombre) {
            return "Producto: $nombre, Precio: $precio, Stock: $unidades";
        }
    }
}

echo buscarNombre("televisor", $articulos);

