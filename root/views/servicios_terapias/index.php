<h1>ServicioTerapiaController#index</h1>
<br>
<div class="row">
	<div class="form-group col-md-3 col-xs-12">
		<select class="form-control" id="select_ub_ser_ter" data-name="id_ub">
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
	<table class="table" id="tabla_ser_ter">
		<thead>
			<th>Id</th>
			<th>Id UB</th>
			<th>Perfil</th>
			<th>Servicio</th>
			<th>Terapia</th>
			<th>Posicion Ruta</th>
			<th colspan="2">Options</th>
		</thead>
		<tbody>
			<?php
			foreach ($servicios_terapias as $servicio_terapia) {
				echo "<tr>";
				echo "<td>". $servicio_terapia->getId()."</td>";
				echo "<td data-name='id_ub'>". $servicio_terapia->getIdUb()."</td>";
				echo "<td>". $servicio_terapia->getIdPerfil()."</td>";
				echo "<td>". $servicio_terapia->getIdTipoServicio()."</td>";
				echo "<td>". $servicio_terapia->getIdTerapia()."</td>";
				echo "<td>". $servicio_terapia->getPosicionRuta()."</td>";
				echo '<td>
						<form action="/servicios_terapias_edit" method="GET">
							<input type="hidden" name="id_registro" value="'.$servicio_terapia->getId().'">
							<input type="submit" name="edit_servicio_terapia" value="Edit" class="btn btn-default">
						</form>
						</td>';
					echo '<td>
							<form action="/servicios_terapias_delete" method="POST">
								<input type="hidden" name="id_registro" value="'.$servicio_terapia->getId().'">
								<input type="submit" name="delete_servicio_terapia" value="Delete" class="btn btn-danger">
						  </form>
					  </td>';
				echo "</tr>";
				
			}
				
			?>
		</tbody>
	</table>
</div>
<a href="/servicios_terapias_new" class="btn btn-link">Nuevo</a>
<a href="/servicios_terapias_import" class="btn btn-link">Importar XML</a>