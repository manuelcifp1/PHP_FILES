<?php
require_once 'Database.php';

class EmptyModel {
    protected $conexion;
    protected $tabla;
    protected $clavePrimaria;

    public function __construct($tabla, $clavePrimaria = 'id') {
        $this->conexion = Database::conectar(); //Llamada estática
        $this->tabla = $tabla;
        $this->clavePrimaria = $clavePrimaria;
    }

    public function crear(array $datos) {
        $campos = implode(',', array_keys($datos));
        $valores = ':' . implode(',:', array_keys($datos));
        $sql = "INSERT INTO {$this->tabla} ($campos) VALUES ($valores)";
        $stmt = $this->conexion->prepare($sql);
        foreach ($datos as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        $stmt->execute();
        return $this->conexion->lastInsertId();
    }

    public function leer($id) {
        $sql = "SELECT * FROM {$this->tabla} WHERE {$this->clavePrimaria} = :id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function leerTodos() {
        $sql = "SELECT * FROM {$this->tabla}";
        return $this->conexion->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function actualizar($id, array $datos) {
        $campos = implode(', ', array_map(fn($key) => "$key = :$key", array_keys($datos)));
        /*array_keys($datos)
        ¿Qué hace? La función array_keys($datos) obtiene todas las claves del array $datos. En otras palabras, devuelve un array con las "columnas"
         o los nombres de los campos que queremos actualizar en la base de datos.
       
        array_map(fn($key) => "$key = :$key", ...)
        ¿Qué hace? array_map es una función que aplica una función anónima (en este caso, fn($key) => "$key = :$key") a cada elemento del array que le pases.
         Aquí, la función toma una clave ($key) y la convierte en una cadena con el formato campo = :campo, donde campo es el nombre de la clave.
        ¿Por qué el prefijo :? El prefijo : se usa porque se trata de un parámetro con nombre (placeholder) en una consulta SQL preparada.
         Este placeholder luego se reemplazará con el valor real de $datos[$key].
        
        implode(', ', ...)
        ¿Qué hace? La función implode(', ', ...) une todos los elementos de un array en una única cadena, separada por ', '.
         Esto se usa para formar la parte de la consulta SQL que contiene los campos que se desean actualizar.*/

        $sql = "UPDATE {$this->tabla} SET $campos WHERE {$this->clavePrimaria} = :id";
        $stmt = $this->conexion->prepare($sql);
        foreach ($datos as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }

    public function eliminar($id) {
        $sql = "DELETE FROM {$this->tabla} WHERE {$this->clavePrimaria} = :id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }
    /*==== Paginación =====================================================*/

    public function leerPaginado($limite, $offset) {
        $sql = "SELECT * FROM {$this->tabla} LIMIT :limite OFFSET :offset";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindValue(':limite', (int)$limite, PDO::PARAM_INT);
        $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function contarRegistros() {
        $sql = "SELECT COUNT(*) as total FROM {$this->tabla}";
        $stmt = $this->conexion->query($sql);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }
    
    /*==== Paginación ========================================================*/
}
?>
