<h1>UnidadBasicaController#new</h1>
<br>
<form method="POST" action="/unidades_basicas_create">
	<label>Id UB</label>
	<input class="form-control" type="text" name="id_ub">
	<label>nombre UB</label>
	<input class="form-control" type="text" name="nom_ub">
	<label>Exp Bolsa TOX</label>
	<input class="form-control" type="number" name="id_exp_bolsa_tox">
	<label>Exp Bolsa TI</label>
	<input class="form-control" type="number" name="id_exp_bolsa_ti">
	<label>Exp Bolsa TM</label>
	<input class="form-control" type="number" name="id_exp_bolsa_tm">
	<label>Ejecutar UB</label>
	<input class="form-control" type="checkbox" name="ejecutar_ub">
	<label>Día Largo</label>
	<input class="form-control" type="text" name="dia_ejecutar_largo">
	<label>Codigo Distribución</label>
	<input class="form-control" type="text" name="codigo_dist">
	<label>Codigo Revisión</label>
	<input class="form-control" type="text" name="codigo_rev">
	<label>Ejecutar TOX</label>
	<input class="form-control" type="checkbox" name="ejecutar_tox">
	<label>Ejecutar TI</label>
	<input class="form-control" type="checkbox" name="ejecutar_ti">
	<label>Ejecutar TM</label>
	<input class="form-control" type="checkbox" name="ejecutar_tm">
	<br>
	<a href="/unidades_basicas" class="btn btn-default">Volver</a>
	<input type="submit" name="save_unidad_basica" value="Guardar" class="btn btn-danger">
</form>