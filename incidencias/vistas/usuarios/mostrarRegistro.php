<?php
	if (isset($data['msjError'])) {
		echo "<p style='color:red'>".$data['msjError']."</p>";
	}
	if (isset($data['msjInfo'])) {
		echo "<p style='color:blue'>".$data['msjInfo']."</p>";
	}
?>

<h1> Registros </h1>

<form action="index.php">

    <p>Nombre:<input type="text" name ="nombre"></p>
    <p>Apellidos: <input type="text" name="apellidos"></p>
    <p>Email: <input type="text" name="email"></p>
    <p>Usuario: <input type="text" name="usuario"></p>
    <p>Contraseña: <input type="password" name="contrasenia"></p>
    <input type='hidden' name='action' value='procesarRegistro'>
    <input type='submit'>
</form>