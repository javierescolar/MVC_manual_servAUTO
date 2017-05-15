<h1>TecnicoController#index</h1>
<br>
<div class="row">
	<div class="form-group col-md-3 col-xs-12">
		<select class="form-control" id="select_ub_tecnico" data-name="id_ub">
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
<table class="table" id="tabla-tecnicos">
	<thead>
		<th>Id</th>
		<th>Id UB</th>
		<th>Técnico</th>
		<th>Perfil</th>
		<th>Código</th>
		<th>Carga Max. Largo</th>
		<th colspan="2">Options</th>
	</thead>
	<tbody>
		<?php
		foreach ($tecnicos as $tecnico) {
			echo "<tr>";
			echo "<td>". $tecnico->getId()."</td>";
			echo "<td data-name='id_ub'>". $tecnico->getIdUb()."</td>";
			echo "<td>". $tecnico->getIdTecnico()."</td>";
			echo "<td>". $tecnico->getIdPerfil()."</td>";
			echo "<td>". $tecnico->getCodigo()."</td>";
			echo "<td>". $tecnico->getCargaMaxLargo()."</td>";
			echo '<td>
					<form action="/tecnicos_edit" method="GET">
						<input type="hidden" name="id_registro" value="'.$tecnico->getId().'">
						<input type="submit" name="edit_tecnico" value="Edit" class="btn btn-default">
					</form>
					</td>';
				echo '<td>
						<form action="/tecnicos_delete" method="POST">
							<input type="hidden" name="id_registro" value="'.$tecnico->getId().'">
							<input type="submit" name="delete_tecnico" value="Delete" class="btn btn-danger">
					  </form>
				  </td>';
			echo "</tr>";
			
		}
			
		?>
	</tbody>
</table>
</div>
<a href="/tecnicos_new" class="btn btn-link">Nuevo</a>
<a href="/tecnicos_import" class="btn btn-link">Importar XML</a>

