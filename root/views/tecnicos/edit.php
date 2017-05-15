<h1>TecnicoController#edit</h1>
<br>
<form method="POST" action="/tecnicos_update">
	<input type="hidden" name="id_registro" value="<?php echo $tecnico->getId(); ?>">
	<label>Id UB</label>
	<select name="id_ub" class="form-control">
		<?php
		foreach ($ubs as $ub) {
			if ($tecnico->getIdUb() == $ub->getIdUb()) {
				echo "<option selected value='".$ub->getIdUb()."'>".$ub->getNomUb()."</option>";
			} else {
				echo "<option value='".$ub->getIdUb()."'>".$ub->getNomUb()."</option>";
			}
		}
		?>
	</select>
	<label>Id Tecnico</label>
	<input class="form-control" type="number" name="id_tecnico" value="<?php echo $tecnico->getIdTecnico(); ?>">
	<label>Id Perfil</label>
	<input class="form-control" type="text" name="id_perfil" value="<?php echo $tecnico->getIdPerfil(); ?>">
	<label>Codigo</label>
	<input class="form-control" type="text" name="codigo" value="<?php echo $tecnico->getCodigo(); ?>">
	<label>Carga Max. Largo</label>
	<input class="form-control" type="number" name="carga_max_largo" value="<?php echo $tecnico->getCargaMaxLargo(); ?>">
	<br>
	<a href="/tecnicos" class="btn btn-default">Volver</a>
	<input type="submit" name="save_tecnico" value="Guardar" class="btn btn-danger">
</form>