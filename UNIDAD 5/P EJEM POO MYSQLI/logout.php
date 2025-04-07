<?php
session_start();

// Destruye todos los datos de sesión
session_destroy();

// Redirige al login
header('Location: login.php');
exit;
