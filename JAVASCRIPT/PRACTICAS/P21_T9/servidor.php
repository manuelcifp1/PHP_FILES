<?php
header("Content-Type: application/json");

if(isset($_POST['email']) && isset($_POST['password']) && (!empty($_POST['email'])) && (!empty($_POST['password']))) {
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
            "apellidos" => "Alba Ríos",
            "dni" => "45123456g",
            "email" => $email,            
        ];
        echo json_encode($datosUsuario);
    } else {
        $datosUsuario = [
            "nombre" => "quiénsea",
            "email" => "invitado@correo.com",
            "password" => "loquesea"            
        ];
        echo json_encode($datosUsuario);
    }
} else {
    echo json_encode(["error" => "Solicitud incorrecta. Envíe los datos correctamente."]);
}

?>