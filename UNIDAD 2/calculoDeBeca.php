<?php

$promedio = 8.7;

if ($promedio >= 9) {
    echo "Tienes beca de 50%<br>";    
} elseif ($promedio >= 8) {
    echo "Tienes beca de 30%<br>";
} elseif ($promedio >= 7) {
    echo "Tienes beca de 10%<br>";
} else {
    echo "No tienes beca<br>";
}