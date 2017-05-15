
<h1>UnidadBasicaController#index</h1>
<br>
<div class="row">
	<div class="form-group col-md-3 col-xs-12">
		<select class="form-control" id="select_ub_ub" data-name="id_ub">
			<option>Todos</option>
		<?php
			foreach ($ubs as $ub) {
				echo "<option value='".$ub->getIdUb()."'>".$ub->getNomUb()."</option>";
			}
		?>
		</select>
	</div>
</div>
<div class="scroll-table">
<table class="table" id="tabla_ubs">
<thead>
	<tr>
		<th>Id</th>
		<th>Id Ub</th>
		<th>Nombre Ub</th>
		<th>Exp Bolsa TOX</th>
		<th>Exp Bolsa TI</th>
		<th>Exp Bolsa TM</th>
		<th>Ejecutar UB Si/No</th>
		<th>Dia largo</th>
		<th>Cod. Dist</th>
		<th>Cod. Rev</th>
		<th>Ejecutar TOX Si/No</th>
		<th>Ejecutar TI Si/No</th>
		<th>Ejecutar TM Si/No</th>
		<th colspan="2">Options</th>
	</tr>
</thead>	

<tbody>
	<?php

	foreach ($unidades_basicas as  $unidad_basica) {
		echo "<tr>";
		echo "<td>".$unidad_basica->getId()."</td>";
		echo "<td data-name='id_ub'>".$unidad_basica->getIdUb()."</td>";
		echo "<td>".$unidad_basica->getNomUb()."</td>";
		echo "<td>".$unidad_basica-> getIdExpBolsaTox()."</td>";
		echo "<td>".$unidad_basica-> getIdExpBolsaTi()."</td>";
		echo "<td>".$unidad_basica-> getIdExpBolsaTm()."</td>";
		echo "<td>".$unidad_basica-> getEjecutarUb()."</td>";
		echo "<td>".$unidad_basica-> getDiaEjecutarLargo()."</td>";
		echo "<td>".$unidad_basica-> getCodigoDist()."</td>";
		echo "<td>".$unidad_basica-> getCodigoRev()."</td>";
		echo "<td>".$unidad_basica-> getEjecutarTox()."</td>";
		echo "<td>".$unidad_basica-> getEjecutarTi()."</td>";
		echo "<td>".$unidad_basica-> getEjecutarTm()."</td>";
		echo '<td>
					<form action="/unidades_basicas_edit" method="GET">
						<input type="hidden" name="id_registro" value="'.$unidad_basica->getId().'">
						<input type="submit" name="edit_unidad_basica" value="Edit" class="btn btn-default">
					</form>
					</td>';
				echo '<td>
						<form action="/unidades_basicas_delete" method="POST">
							<input type="hidden" name="id_registro" value="'.$unidad_basica->getId().'">
							<input type="submit" name="delete_unidad_basica" value="Delete" class="btn btn-danger">
					  </form>
				  </td>';
			echo "</tr>";
	}

	?>
</tbody>

</table>
</div>
<a href="/unidades_basicas_new" class="btn btn-link">Nuevo</a>
<a href="/unidades_basicas_import" class="btn btn-link">Importar XML</a>
