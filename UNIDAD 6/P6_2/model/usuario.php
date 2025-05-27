<?php
//Para la tabla usuario, sólo necesitamos el método create, que usaremos cuando un nuevo usuario se registre.

class Usuario
{
    private $conn;
    private $table = 'usuarios';

    public function __construct($db)
    {
        $this->conn = $db;
    }    

    public function create($nombre, $password)
{
    $rol = 'cliente'; //fijo
    $query = "INSERT INTO {$this->table} (nombre, password, rol) VALUES (:nombre, :password, :rol)";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':rol', $rol);
    return $stmt->execute();
}
   

}
