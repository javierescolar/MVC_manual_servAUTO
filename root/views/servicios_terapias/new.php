<h1>ServicioTerapiaController#new</h1>
<br>
<form method="POST" action="/servicios_terapias_create">
	<input type="hidden" name="id_registro">
	<label>Id UB</label>
	<select name="id_ub" class="form-control">
		<?php
		foreach ($ubs as $ub) {
			echo "<option value='".$ub->getIdUb()."'>".$ub->getNomUb()."</option>";
		}
		?>
	</select>
	<label>Id Perfil</label>
	<select name="id_perfil" class="form-control">
		<option value="DR">Técnico Oxígeno</option>
		<option value="IT">Técnico Instalador</option>
		<option value="MT">Técnico Mantenimiento</option>
	</select>
	<label>Id Tipo Servicio</label>
	<input class="form-control" type="text" name="id_tipo_servicio">
	<label>Id Terapia</label>
	<input class="form-control" type="text" name="id_terapia">
	<label>Posicion Ruta</label>
	<input class="form-control" type="number" name="posicion_ruta">
	<br>
	<a href="/servicios_terapias" class="btn btn-default">Volver</a>
	<input type="submit" name="save_servicio_terapia" value="Guardar" class="btn btn-danger">
</form>