<?php
	if (isset($data['msjError'])) {
		echo "<p style='color:red'>".$data['msjError']."";
	}
	if (isset($data['msjInfo'])) {
		echo "<p style='color:blue'>".$data['msjInfo']."";
	}
?>

<h1> Nueva Incidencia </h1>

<form action="index.php">
  <label for="equipo">Equipo:</label>
    <input type="text" name ="equipo"/>
  <label for="fecha">Fecha:</label>
    <input type="date" name="fecha"/><br>
  <label for="lugar">Lugar:</label>
    <input type="text" name="lugar"/>
  <label for="descripcion">Descripción:</label><br>
    <input type="text" name="descripcion"/><br>
  <label for="observaciones">Observaciones:</label><br>
    <input type="text" name="observaciones"/><br>
    <label for="estado">Estado:</label>
    <select name="estado" class="select">
  <option value="abierta">Abierta</option>
  <option value="en_espera">En espera</option>
  <option value="cerrada">Cerrada</option>
</select>
    <input type='hidden' name='action' value='procesarIncidencia'>
    <input type='submit'>
</form>