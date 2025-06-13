<?php
header("Content-Type: application/json");

if (isset($_POST['email']) && isset($_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])) {
    $email=$_POST['email'];
    $password=$_POST['password'];

    if ($email=="admin@correo.com" && $password=="Aa1?Bb2!") {
        $datosUsuario=[
            "email"=>$email,
            "password"=>$password            
        ];
        echo json_encode($datosUsuario);

    }elseif ($email=="cliente@correo.com" && $password=="Aa1?Bb2!") {
        $datosUsuario=[
            "nombre"=>"Manolo",
            "apellidos"=>"Alba Rios",
            "dni"=>"45123456p",
            "email"=>$email
        ];
        echo json_encode($datosUsuario);

    }else {
        $datosUsuario=[
            "nombre"=>"Invitado",
            "email"=>"invitado@correo.com",
            "contraseña"=>"daIgual"
        ];
        echo json_encode($datosUsuario);
    }
    
}else {
    echo json_encode(["error" => "Solicitud incorrecta. Envíe los datos correctamente."]);
}

?>
