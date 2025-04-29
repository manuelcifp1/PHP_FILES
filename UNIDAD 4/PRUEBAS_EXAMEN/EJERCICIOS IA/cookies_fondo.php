<?php
if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['tema'])) {
	$tema = $_GET['tema'];

	setcookie('tema', $tema, time() + 60 * 60);
}

$temaSeleccionado = $_COOKIE['tema'] ?? 'blanco';

if($temaSeleccionado === 'rojo') {
	$estiloBody = 'background-color: red; color: white;';
} elseif ($temaSeleccionado === 'verde') {
	$estiloBody = 'background-color: green; color: orange;';
} elseif ($temaSeleccionado === 'azul') {
	$estiloBody = 'background-color: blue; color: yellow;';
} else {
	$estiloBody = 'background-color: white; color: black;';
}

?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tema sin clases</title>
</head>
<body style="<?= $estiloBody ?>">
	<form method="get" action="">
		<label>
			<input type="radio" name="tema" value="rojo" <?= $temaSeleccionado === 'rojo' ? 'checked' : '' ?>>
			Tema rojo
		</label>
		<label>
			<input type="radio" name="tema" value="verde" <?= $temaSeleccionado === 'verde' ? 'checked' : '' ?>>
			Tema verde
		</label>
		<label>
			<input type="radio" name="tema" value="azul" <?= $temaSeleccionado === 'azul' ? 'checked' : '' ?>>
			Tema azul
		</label>
			<input type="radio" name="tema" value="blanco" hidden>

		<button type="submit">GUARDAR TEMA</button>
	</form>

	
</body>
</html>