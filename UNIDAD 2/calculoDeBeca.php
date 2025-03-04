<?php

$promedio = 8.7;

if ($promedio <= 10 && $promedio >= 9) {
    echo "Tienes beca de 50%<br>";    
} elseif ($promedio < 9 && $promedio >= 8) {
    echo "Tienes beca de 30%<br>";
} elseif ($promedio < 8 && $promedio >= 7) {
    echo "Tienes beca de 10%<br>";
} else {
    echo "No tienes beca<br>";
}