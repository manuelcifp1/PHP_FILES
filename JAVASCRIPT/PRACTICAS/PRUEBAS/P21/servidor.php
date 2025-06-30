<?php
header(("Content-Type: application/json"));

if(!empty($_POST['email']) && !empty($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if($email == "admin@correo.com" && $password == "Aa1?Bb2!") {
        $datosUsuario = [
            "email" => $email,
            "password" => $password
        ];
        echo json_encode($datosUsuario);
    } elseif($email == "cliente@correo.com" && $password == "Aa1?Bb2!") {
        $datosUsuario = [
            "nombre" => "Manolo",
            "apellidos" => "Cabeza Bolo",
            "DNI" => "46753159t",
            "email" => $email
        ];
        echo json_encode($datosUsuario);
    } else {
        $datosUsuario = [
            "nombre" => "daigual",
            "email" => "irrelevante",
            "password" => "indiferente"
        ];
        echo json_encode($datosUsuario);
    }

} else {
    echo json_encode(["error" => "Datos enviados incorrectamente"]);
}

?>