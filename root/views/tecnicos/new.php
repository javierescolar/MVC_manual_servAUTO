<h1>ServicioTerapia#new</h1>
<br>
<form method="POST" action="/tecnicos_create">
	<label>Id UB</label>
	<select name="id_ub" class="form-control">
		<?php
		foreach ($ubs as $ub) {
			echo "<option value='".$ub->getIdUb()."'>".$ub->getNomUb()."</option>";
		}
		?>
	</select>
	<label>Id Tecnico</label>
	<input class="form-control" type="number" name="id_tecnico">
	<label>Id Perfil</label>
	<select name="id_perfil" class="form-control">
		<option value="DR">Técnico Oxígeno</option>
		<option value="IT">Técnico Instalador</option>
		<option value="MT">Técnico Mantenimiento</option>
	</select>
	<label>Codigo</label>
	<input class="form-control" type="text" name="codigo">
	<label>Carga Max. Largo</label>
	<input class="form-control" type="number" name="carga_max_largo">
	<br>
	<a href="/tecnicos" class="btn btn-default">Volver</a>
	<input type="submit" name="save_tecnico" value="Guardar" class="btn btn-danger">
</form>

