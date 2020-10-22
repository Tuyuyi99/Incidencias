
<h1>Iniciar sesión</h1>

<?php
	if (isset($data['msjError'])) {
		echo "<p style='color:red'>".$data['msjError']."</p>";
	}
	if (isset($data['msjInfo'])) {
		echo "<p style='color:blue'>".$data['msjInfo']."</p>";
	}
?>

<form action='index.php'>
	Usuario:<input type='text' name='usuario'><br>
	Contraseña:<input type='password' name='contrasenia'><br>
	<input type='hidden' name='action' value='procesarLogin'>
	<input type='submit'>
</form>