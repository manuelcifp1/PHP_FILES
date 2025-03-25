<?php
/*El operador coalescente nulo está representado por dos signos de interrogación (??).
Funciona evaluando la expresión en el lado izquierdo del operador. Si esta expresión
no es nula, el operador devuelve su valor. Sin embargo, si la expresión es nula, el
operador evalúa la expresión del lado derecho y devuelve su valor en su lugar. */

$name = $_GET['name'] ?? 'Guest';

//O también con una opción añadida por si no es nulo (si $var no es nulo, se le asigna 'Default')
$value = $var ?? ($otherVar ?: 'Default');
