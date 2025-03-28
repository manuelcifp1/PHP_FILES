<html>
<body>
    <form action="#" method="get">

        <input type="text" placeholder="nombre" name="nombre" <?php if(!empty ($_REQUEST['nombre'])):?> value="<?php echo $_REQUEST['nombre'];?>" <?php endif;?>>       

    </form>
<!--SUBIDA ARCHIVOS============================================================================================================================================-->
    <form action="#" method="post" enctype="multipart/form-data">
        <label for="archivo">Subir archivo:</label>
        <input type="file" name="archivo" id="archivo">
        <button type="submit">Subir</button>
    </form>
    <?php
        //Inicializamos estas variables para evitar errores.
        $archivo = null;
        $destino = null;

        //Enviamos el archivo.
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['archivo'])) {

                //Asignamos todos los datos del archivo a la variable $archivo:                
                $archivo = $_FILES['archivo'];

                //Validamos error en la subida
                if($archivo['error'] !== UPLOAD_ERR_OK) {
                    die("Error al subir el archivo.<br>");
                }
                
                //Definimos las variables de las extensiones permitidas, el tamaño máximo y ponemos en minúsculas la extensión del archivo.
                $extensiones_permitidas = ['jpg', 'jpeg', 'png', 'gif'];
                $tamaño_maximo = 2 * 1024 * 1024;//2MB
                $ext = strtolower(pathinfo($archivo['name'], PATHINFO_EXTENSION));

                //Validar extensiones permitidas.
                if(!in_array($ext, $extensiones_permitidas)) {
                    die("Extensión no permitida<br>");
                }

                //Validar tamaño máximo permitido
                if($archivo['size'] > $tamaño_maximo) {
                    die("Tamaño demasiado grande, límite: " . ($tamaño_maximo / 1024 / 1024) . "MB<br>");
                }

                /*Definir carpeta de destino (usamos basename aunque $archivo['name'] sea sólo el nombre del archivo sin ruta
                por seguridad, para evitar la inyección de una ruta maliciosa.)*/
                $destino = __DIR__ . '/DNI/' . basename($archivo['name']);

                //Comprobar si el archivo existe en la carpeta de destino.
                if (file_exists($destino)) {
                    die("Error: el archivo ya existe en la carpeta de destino.<br>");
                }
                }

                //Mover el archivo a carpeta de destino, verificando antes que existe ese archivo.
                if ($archivo && isset($archivo['tmp_name']) && is_uploaded_file($archivo['tmp_name'])) {
                    if (move_uploaded_file($archivo['tmp_name'], $destino)) {
                        echo "Archivo subido correctamente a: " . $destino;
                    } else {
                        echo "Error al mover el archivo.";
                    }
                } else {
                    echo "No se ha subido ningún archivo.";            
            } 
    ?>
    
<!--EDICIÓN DE ARCHIVOS=========================================================================================================================-->
<?php
    

    if(!empty($_GET['nombre']) && !empty($_GET['email'])) {
        
        $nombre = htmlspecialchars($_GET['nombre']);
        $email = filter_var($_GET['email'], FILTER_VALIDATE_EMAIL);

        if(!file_exists('usuarios.txt')) {
            file_put_contents('usuarios.txt', $nombre . " " . $email . "\n", FILE_APPEND);
            
        } else if (file_exists('usuarios.txt')) {
            file_put_contents('usuarios.txt', $nombre . " " . $email . "\n", FILE_APPEND);
            $usuarios = fopen("usuarios.txt", 'r');
            while(!feof($usuarios)) {
                $linea = fgets($usuarios);
                echo "<p> $linea </p>";
            }

            fclose($usuarios);
        }
        
    }

?>

<!--OPERADOR FUSIÓN NULL================================================================================================================-->
<?php
    $name = $_GET['name'] ?? 'Guest';
    //O también con una opción añadida por si no es nulo (si $var no es nulo, se le asigna 'Default')
    $value = $var ?? ($otherVar ?: 'Default');
?>

<!--ARRAY MAP================================================================================================================================-->
<?php

    $numeros = [1, 2, 3, 4, 5];

    $duplicados = array_map(function($n) {
        return $n * 2;
    }, $numeros);

    print_r($duplicados);

    /*array_map() aplica una función a cada elemento de un array
    y devuelve un nuevo array con los resultados. */
 ?>

<!--NAVE ESPACIAL=================================================================================================================================--> 
<?php
/*Tienes un array de productos, cada uno con un precio y un nombre. Usa usort y una función flecha
 para ordenar los productos de menor a mayor por precio. Si dos productos tienen el mismo precio,
  ordénalos alfabéticamente por nombre.*/

  $productitos = [

    ["nombre" => "Producto A", "precio" => 200],

    ["nombre" => "Producto B", "precio" => 150],

    ["nombre" => "Producto C", "precio" => 200],

    ["nombre" => "Producto D", "precio" => 100],

];

usort($productitos, fn($a, $b) =>
    ($a['precio'] <=> $b['precio']) !== 0 ? $a['precio'] <=> $b['precio'] : $a['nombre'] <=> $b['nombre']
);
?>
<!--JSON--=========================================================================================================================>
<?php
    //Convertir array a JSON
    $usuario = [ 
        "nombre" => "Juan", 
        "edad" => 30, 
        "email" => "juan@example.com" 
    ]; 
    
    $json = json_encode($usuario, JSON_PRETTY_PRINT); 
    echo $json;

    //Convertir JSON a array
    $json = '{"nombre":"Juan","edad":30,"email":"juan@example.com"}'; 
    
    $array = json_decode($json, true); // `true` convierte a array asociativo 
    print_r($array);

    //Detectar errores en JSON

    $json_mal = '{"nombre": "Juan", "edad": 30, "email": "juan@example.com"'; // Falta el cierre } 
    
    $data = json_decode($json_mal); 
    
    if (json_last_error() !== JSON_ERROR_NONE) { 
        echo "Error en el JSON: " . json_last_error_msg(); 
    }

    //Leer JSON
    $json = file_get_contents('datos.json'); // Lee el contenido del archivo 
    $data = json_decode($json, true); // Convierte JSON a array 
    print_r($data);

?>

</body>
</html>