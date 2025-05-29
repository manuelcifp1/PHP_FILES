<?php
//Este archivo actuaría como un router entre el frontend y el backend, recibiendo las peticiones de ambos index.
//Requerir seguridad de sesión.
require_once 'auth/seguridad.php';
Seguridad::verificarSesion();

//Requerimos a los modelos necesarios
require_once 'model/conexion.php';
require_once 'model/usuario.php';
require_once 'model/producto.php';
require_once 'model/carrito.php';

//Crear instancias de los modelos usando singleton para la conexión a la BD.
$usuario = new Usuario();
$producto = new Producto();
$carrito = new Carrito();

//Obtener la acción y entidad desde los parámetros GET
$action = $_GET['action'] ?? '';
$entity = $_GET['entity'] ?? '';

//Devolver siempre JSON
header('Content-Type: application/json');

//Control según entidad con un switch
switch ($entity) { 

    //Acciones para la entidad producto que responden a las peticiones de su DataTable.
    case 'producto':
        if ($action === 'read') {
            $data = $producto->read();
            echo json_encode(['data' => $data]); //Formato compatible con DataTables
        } elseif ($action === 'create') {
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $stock = $_POST['stock'];
            $result = $producto->create($nombre, $descripcion, $stock);
            echo json_encode(['success' => $result]);
        } elseif ($action === 'update') {
            $id = $_POST['idinventario'];
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $stock = $_POST['stock'];
            $result = $producto->update($id, $nombre, $descripcion, $stock);
            echo json_encode(['success' => $result]);
        } elseif ($action === 'delete') {
            $id = $_POST['idinventario'];
            $result = $producto->delete($id);
            echo json_encode(['success' => $result]);
        }
        break;
    
    //Acciones para la entidad carrito que responden a las peticiones de su DataTable.   
    case 'carrito':

        //Iniciamos sesión para poder obtener el idusuario e incluirlo en el carrito.
        Seguridad::iniciarSesion();
        $idusuario = $_SESSION['idusuario'];

        if ($action === 'read') {
            $data = $carrito->read($idusuario);
            echo json_encode(['data' => $data]); //Formato para DataTables
        } elseif ($action === 'add') {
            $idinventario = $_POST['idinventario'];
            $unidades = $_POST['unidades'];
            $result = $carrito->addOrUpdate($idusuario, $idinventario, $unidades);
            echo json_encode(['success' => $result]);
        } elseif ($action === 'update') {
            $idcarrito = $_POST['idcarrito'];
            $unidades = $_POST['unidades'];
            $result = $carrito->update($idcarrito, $unidades);
            echo json_encode(['success' => $result]);
        } elseif ($action === 'delete') {
            $idcarrito = $_POST['idcarrito'];
            $result = $carrito->delete($idcarrito);
            echo json_encode(['success' => $result]);
        }
        break;

    default:
        echo json_encode(['error' => 'Entidad o acción no válida']);
        break;
}
