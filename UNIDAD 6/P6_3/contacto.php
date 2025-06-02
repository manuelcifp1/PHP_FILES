<?php
session_start();
require_once 'models/Database.php';
require_once 'models/Contactos.php';

// Verificar si el usuario está logueado
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$action = $_GET['action'] ?? 'list';
$contactoModel = new Contactos();

$user_id = $_SESSION['user_id']; // identificador del usuario logueado

switch ($action) {
    case 'list':
        $paginaActual = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
        $limite = isset($_GET['limit']) ? max(1, (int)$_GET['limit']) : 5;
        $offset = ($paginaActual - 1) * $limite;

        // Solo contactos del usuario
        $contactos = $contactoModel->leerPaginadoPorUsuario($user_id, $limite, $offset);
        $totalRegistros = $contactoModel->contarRegistrosPorUsuario($user_id);
        $totalPaginas = ceil($totalRegistros / $limite);

        include 'views/list.php';
        break;

    case 'create':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $datos = [
                'user_id' => $user_id,
                'nombre' => htmlspecialchars(trim($_POST['nombre'])),
                'telefono' => htmlspecialchars(trim($_POST['telefono'])),
                'email' => filter_var($_POST['email'], FILTER_VALIDATE_EMAIL),
                'direccion' => htmlspecialchars(trim($_POST['direccion']))
            ];
            if ($datos['email']) {
                $contactoModel->crear($datos);
            }
            header('Location: contacto.php?action=list');
            exit;
        }
        include 'views/create.php';
        break;

    case 'edit':
        $id = (int)$_GET['id'];
        $contacto = $contactoModel->leerPorUsuario($id, $user_id);
        if (!$contacto) {
            die('No tienes permiso para editar este contacto.');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $datos = [
                'nombre' => htmlspecialchars(trim($_POST['nombre'])),
                'telefono' => htmlspecialchars(trim($_POST['telefono'])),
                'email' => filter_var($_POST['email'], FILTER_VALIDATE_EMAIL),
                'direccion' => htmlspecialchars(trim($_POST['direccion']))
            ];
            if ($datos['email']) {
                $contactoModel->actualizar($id, $datos);
            }
            header('Location: contacto.php?action=list');
            exit;
        }
        include 'views/edit.php';
        break;

    case 'delete':
        $id = (int)$_GET['id'];
        $contacto = $contactoModel->leerPorUsuario($id, $user_id);
        if ($contacto) {
            $contactoModel->eliminar($id);
        }
        header('Location: contacto.php?action=list');
        exit;

    default:
        echo "Acción no válida";
        break;
}
?>
