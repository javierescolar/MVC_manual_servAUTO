<h1>ServicioTerapiaController#edit</h1>
<br>
<form method="POST" action="/servicios_terapias_update">
	<input type="hidden" name="id_registro" value="<?php echo $servicio_terapia->getId(); ?>">
	<label>Id UB</label>
	<select name="id_ub" class="form-control">
		<?php
		foreach ($ubs as $ub) {
			if ($servicio_terapia->getIdUb() == $ub->getIdUb()) {
				echo "<option selected value='".$ub->getIdUb()."'>".$ub->getNomUb()."</option>";
			} else {
				echo "<option value='".$ub->getIdUb()."'>".$ub->getNomUb()."</option>";
			}
		}
		?>
	</select>
	<label>Id Perfil</label>
	<input class="form-control" type="text" name="id_perfil" value="<?php echo $servicio_terapia->getIdPerfil(); ?>">
	<label>Id Tipo Servicio</label>
	<input class="form-control" type="text" name="id_tipo_servicio" value="<?php echo $servicio_terapia->getIdTipoServicio(); ?>">
	<label>Id Terapia</label>
	<input class="form-control" type="text" name="id_terapia" value="<?php echo $servicio_terapia->getIdTerapia(); ?>">
	<label>Posicion Ruta</label>
	<input class="form-control" type="number" name="posicion_ruta" value="<?php echo $servicio_terapia->getPosicionRuta(); ?>">
	<br>
	<a href="/servicios_terapias" class="btn btn-default">Volver</a>
	<input type="submit" name="save_servicio_terapia" value="Guardar" class="btn btn-danger">
</form>