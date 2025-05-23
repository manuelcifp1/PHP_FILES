<?php

require_once 'Model/Conexion.php';
require_once 'Model/Usuario.php';

$db = (new Conexion())->connect();
$user = new Usuario($db);

$action = $_GET['action'] ?? '';

if ($action === 'read') {
    $data = $user->read();
    echo json_encode(['data' => $data]);
} elseif ($action === 'create') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $result = $user->create($name, $email);
    echo json_encode(['success' => $result]);
} elseif ($action === 'update') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $result = $user->update($id, $name, $email);
    echo json_encode(['success' => $result]);
} elseif ($action === 'delete') {
    $id = $_POST['id'];
    $result = $user->delete($id);
    echo json_encode(['success' => $result]);
}
?>
