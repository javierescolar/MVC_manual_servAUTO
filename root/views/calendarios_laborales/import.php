<h1>CalendarioLaboralController#import</h1>
<br>
<form enctype="multipart/form-data" action="/calendarios_laborales_import" method="POST">
	<input type="file" name="file_xml" class="form-control" required>
	<a href="/tecnicos" class="btn btn-default">Volver</a>
	<input type="submit" name="import_XML" value="Importar" class="btn btn-default">
</form>