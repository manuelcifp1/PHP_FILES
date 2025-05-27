<?php

//Importamos los modelos necesarios
require_once 'model/conexion.php';
require_once 'model/usuario.php';
require_once 'model/producto.php';
require_once 'model/carrito.php';

//Creamos instancias de cada modelo usando el singleton de Conexion
$usuario = new Usuario();
$producto = new Producto();
$carrito = new Carrito();

//Obtenemos la acción solicitada del CRUD.
$action = $_GET['action'] ?? '';
//Obtenemos la entidad objetivo (usuario, producto, carrito)
$entity = $_GET['entity'] ?? '';

//Indicamos que siempre vamos a devolver JSON
header('Content-Type: application/json');

//Usamos switch para organizar según entidad
switch ($entity) {

    case 'usuario':
        if ($action === 'create') {
            //Recibimos datos del POST
            $nombre = $_POST['nombre'];
            $password = $_POST['password'];
            $rol = $_POST['rol'] ?? 'cliente'; //por defecto cliente
            $result = $usuario->create($nombre, $password, $rol);
            echo json_encode(['success' => $result]);
        }
        break;

    case 'producto':
        if ($action === 'read') {
            $data = $producto->read();
            echo json_encode(['data' => $data]); //formato compatible con DataTables
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

    case 'carrito':
        session_start(); //iniciamos sesión para obtener el usuario actual
        $idusuario = $_SESSION['idusuario'];

        if ($action === 'read') {
            $data = $carrito->read($idusuario);
            echo json_encode(['data' => $data]); //formato para DataTables
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
        //Si no se reconoce la entidad, devolvemos error
        echo json_encode(['error' => 'Entidad o acción no válida']);
        break;
}
