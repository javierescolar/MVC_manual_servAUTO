<h1>CalendarioLaboralController#index</h1>
<br>
<div class="row">
	<div class="form-group col-md-3 col-xs-12">
		<select class="form-control" id="select_ub_calendario" data-name="id_ub">
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
	<table class="table" id="tabla_calendarios">
	<thead>
		<th>Id</th>
		<th>Id UB</th>
		<th>Fecha festivo</th>
		<th>Fecha Desplazar</th>
		<th>Desplazar TOX</th>
		<th>Desplazar TI</th>
		<th>Desplazar TM</th>
		<th colspan="2">Options</th>
	</thead>
	<tbody>
		<?php
		foreach ($calendarios as $calendario) {
			echo "<tr>";
			echo "<td>". $calendario->getId()."</td>";
			echo "<td data-name='id_ub'>". $calendario->getIdUb()."</td>";
			echo "<td>". $calendario->getFechaFestivo()."</td>";
			echo "<td>". $calendario->getFechaDesplazar()."</td>";
			echo "<td>". $calendario->getDesplazarTox()."</td>";
			echo "<td>". $calendario->getDesplazarTi()."</td>";
			echo "<td>". $calendario->getDesplazarTm()."</td>";
			echo '<td>
					<form action="/calendarios_laborales_edit" method="GET">
						<input type="hidden" name="id_registro" value="'.$calendario->getId().'">
						<input type="submit" name="edit_calendario_laboral" value="Edit" class="btn btn-default">
					</form>
					</td>';
				echo '<td>
						<form action="/calendarios_laborales_delete" method="POST">
							<input type="hidden" name="id_registro" value="'.$calendario->getId().'">
							<input type="submit" name="delete_calendario_laboral" value="Delete" class="btn btn-danger">
					  </form>
				  </td>';
			echo "</tr>";
			
		}
			
		?>
	</tbody>
	</table>
</div>
<a href="/calendarios_laborales_new" class="btn btn-link">Nuevo</a>
<a href="/calendarios_laborales_import" class="btn btn-link">Importar XML</a>