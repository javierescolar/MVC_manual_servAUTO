<h1>CalendarioLaboral#new</h1>
<br>
<form method="POST" action="/calendarios_laborales_create">
	<label>Id UB</label>
	<select name="id_ub" class="form-control">
		<?php
		foreach ($ubs as $ub) {
			echo "<option value='".$ub->getIdUb()."'>".$ub->getNomUb()."</option>";
		}
		?>
	</select>
	<label>Fecha Festivo</label>
	<input class="form-control" type="date" name="fecha_festivo">
	<label>fecha Desplazar</label>
	<input class="form-control" type="date" name="fecha_desplazar">
	<label>Desplazor TOX</label>
	<input class="form-control" type="checkbox" name="desplazar_tox">
	<label>Desplazor TI</label>
	<input class="form-control" type="checkbox" name="desplazar_ti">
	<label>Desplazor TM</label>
	<input class="form-control" type="checkbox" name="desplazar_tm">
	<br>
	<a href="/calendarios_laborales" class="btn btn-default">Volver</a>
	<input type="submit" name="save_calendario_laboral" value="Guardar" class="btn btn-danger">
</form>

