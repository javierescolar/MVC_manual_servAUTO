<h1>UnidadBasicaController#edit</h1>
<br>
<form method="POST" action="/unidades_basicas_update">
	<input type="hidden" name="id_registro" value="<?php echo $unidad_basica->getId(); ?>">
	<label>Id UB</label>
	<input class="form-control" type="text" name="id_ub" value="<?php echo $unidad_basica->getIdUb(); ?>">
	<label>nombre UB</label>
	<input class="form-control" type="text" name="nom_ub" value="<?php echo $unidad_basica->getNomUb(); ?>">
	<label>Exp Bolsa TOX</label>
	<input class="form-control" type="number" name="id_exp_bolsa_tox" value="<?php echo $unidad_basica->getIdExpBolsaTox(); ?>">
	<label>Exp Bolsa TI</label>
	<input class="form-control" type="number" name="id_exp_bolsa_ti" value="<?php echo $unidad_basica->getIdExpBolsaTi(); ?>">
	<label>Exp Bolsa TM</label>
	<input class="form-control" type="number" name="id_exp_bolsa_tm" value="<?php echo $unidad_basica->getIdExpBolsaTm(); ?>">
	<label>Ejecutar UB</label>
	<input class="form-control" type="checkbox" name="ejecutar_ub" value="<?php echo $unidad_basica->getEjecutarUb(); ?>">
	<label>Día Largo</label>
	<input class="form-control" type="text" name="dia_ejecutar_largo" value="<?php echo $unidad_basica->getDiaEjecutarLargo(); ?>">
	<label>Codigo Distribución</label>
	<input class="form-control" type="text" name="codigo_dist" value="<?php echo $unidad_basica->getCodigoDist(); ?>">
	<label>Codigo Revisión</label>
	<input class="form-control" type="text" name="codigo_rev" value="<?php echo $unidad_basica->getCodigoRev(); ?>">
	<label>Ejecutar TOX</label>
	<input class="form-control" type="checkbox" name="ejecutar_tox" value="<?php echo $unidad_basica->getEjecutarTox(); ?>">
	<label>Ejecutar TI</label>
	<input class="form-control" type="checkbox" name="ejecutar_ti" value="<?php echo $unidad_basica->getEjecutarTi(); ?>">
	<label>Ejecutar TM</label>
	<input class="form-control" type="checkbox" name="ejecutar_tm" value="<?php echo $unidad_basica->getEjecutarTm(); ?>">
	<br>
	<a href="/unidades_basicas" class="btn btn-default">Volver</a>
	<input type="submit" name="save_unidad_basica" value="Guardar" class="btn btn-danger">
</form>


