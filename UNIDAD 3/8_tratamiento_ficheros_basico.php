<?php
/*Supongamos que queremos trabajar con un archivo llamado datos.txt. El
objetivo será:
● Verificar si el archivo existe.
● Si el archivo existe, leer su contenido.
● Si no existe, crear el archivo y escribir algo en él. */
$archivo = "datos.txt";
$otraCadena = "Lee el contenido completo de un archivo en una sola operación y lo devuelve como una
cadena. Si el archivo es muy grande, puede ser más adecuado utilizar otras funciones como
fopen y fread que leen el archivo en bloques.
○ Se usa para leer el contenido de archivos de texto u otros tipos de archivo que se pueden
representar como texto, como archivos JSON, XML, etc.";

if(file_exists("datos.txt")) {
    $cadena = file_get_contents($archivo);
    echo $cadena;
} else {
    file_put_contents($archivo, $otraCadena, FILE_APPEND);
}

?>