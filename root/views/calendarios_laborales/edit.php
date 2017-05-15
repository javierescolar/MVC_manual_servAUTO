<h1>CalendarioLaboralController#edit</h1>
<br>
<form method="POST" action="/calendarios_laborales_update">
	<input type="hidden" name="id_registro" value="<?php echo $calendario->getId(); ?>">
	<label>Id UB</label>
	<select name="id_ub" class="form-control">
		<?php
		foreach ($ubs as $ub) {
			if ($calendario->getIdUb() == $ub->getIdUb()) {
				echo "<option selected value='".$ub->getIdUb()."'>".$ub->getNomUb()."</option>";
			} else {
				echo "<option value='".$ub->getIdUb()."'>".$ub->getNomUb()."</option>";
			}
		}
		?>
	</select>
	<label>Fecha Festivo</label>
	<input class="form-control" type="date" name="fecha_festivo" value="<?php echo $calendario->getFechaFestivo(); ?>">
	<label>fecha Desplazar</label>
	<input class="form-control" type="date" name="fecha_desplazar" value="<?php echo $calendario->getFechaDesplazar(); ?>">
	<label>Desplazor TOX</label>
	<input class="form-control" type="checkbox" name="desplazar_tox" value="<?php echo $calendario->getDesplazarTox(); ?>">
	<label>Desplazor TI</label>
	<input class="form-control" type="checkbox" name="desplazar_ti" value="<?php echo $calendario->getDesplazarTi(); ?>">
	<label>Desplazor TM</label>
	<input class="form-control" type="checkbox" name="desplazar_tm" value="<?php echo $calendario->getDesplazarTm(); ?>">
	<br>
	<a href="/calendarios_laborales" class="btn btn-default">Volver</a>
	<input type="submit" name="save_calendario_laboral" value="Guardar" class="btn btn-danger">
</form>