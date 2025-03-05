<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<h2>Elige una opción por su número:</h2> 
<ol>
  <li>1- Consultar saldo.</li>
  <li>2- Realizar depósito.</li>
  <li>3- Retirar dinero.</li>
  <li>4- Salir.</li>
</ol> 


<?php
/*1. Uso de switch

Escribe un programa en PHP que simule un menú de selección de opciones para un cajero automático.
Las opciones deben ser las siguientes:
    1- Consultar saldo.
    2- Realizar depósito.
    3- Retirar dinero.
    4- Salir.
El programa debe recibir la opción seleccionada por el usuario y utilizar una sentencia switch
para realizar las operaciones correspondientes.

Notas:

- Para "Realizar depósito", pide al usuario la cantidad a depositar y súmala al saldo.
- Para "Retirar dinero", pide al usuario la cantidad a retirar y réstala del saldo (valida que no sea mayor
  que el saldo disponible).
- La opción "Salir" debe terminar el programa.
- Puedes ingresar las opciones mediante un formulario.
- Como aún nos faltan herramientas nos vamos a remitir a una única instrucción por ejecución
  del programa. Terminando el programa independientemente de la opción seleccionada.*/
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $opcion = $_POST["numero"];
    $cantidad = $_POST["cantidad"];

    $saldo = 0;  
switch($opcion) {
    case 1:
      echo $saldo;
      break;
    case 2:
      echo "Introduzca la cantidad a ingresar<br>";
      $saldo+=$cantidad;
      break;
    case 3:
      echo "Introduzca la cantidad a retirar<br>";
      $saldo-=$cantidad;
      break;
    case 4:
      echo "Ha salido del programa<br>";
      break;
}

} 

?>

  <form method="POST">
    <label for="numero">Introduzca opción</label>
    <input type="number" name="numero" id="numero" min="1" max="4" required>
    <button type="submit">Enviar</button>

    <label for="cantidad">Introduzca la cantidad a ingresar o retirar</label>
    <input type="number" name="cantidad" id="cantidad">
    <button type="submit">Enviar</button>
  </form>

</body>
</html>

 