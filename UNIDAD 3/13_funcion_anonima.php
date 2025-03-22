<?php

$factor = 3;
$multiplicar = function($numero) use ($factor) {
return $numero * $factor;
};
echo $multiplicar(5); // Muestra 15

/*A veces, es necesario que una función anónima acceda a variables fuera
de su alcance. En estos casos, se usa "use" para "capturar" esas variables. */