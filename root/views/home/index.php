<h1>HomeController#index</h1>
<br>
<a href="generar_script" class="btn btn-danger">Generar Script</a>
<a href="http://localhost:8080/phpmyadmin/" class="btn btn-danger" target="_blanck">Acceso a phpmyadmin para exportar tablas</a>
<br>
<br>
<p>Procedimiento mediante <b>phpmyadmin</b></p>
<ol>
	<li>Accede a la interfaz de PHPMYADMIN.</li>
	<li>Selecciona la BD <b>servicios_auto</b>.</li>
	<li>Una vez selecciona, hacer click en <b>exportar</b>.</li>
	<li>Aquí hay que realizar las siguientes acciones:</li>
	<ol>
		<li>Método de exportación: <b>personalizado</b>.</li>
		<li>Desmarcar todo en el apatado <b>Opciones de creación de objetos</b></li>
		<li>Opciones específicas al formato: solo dejaremos <b>datos</b>.</li>
		<li>Opciones de creación de datos: marcaremos <b>ninguno de los anteriores</b>.</li>
		<li>Click sobre botón <b>Continuar</b>.</li>
	</ol>
	<li>Dentro del script que se acaba de crear copiaremos cada insert en su respecito sitio del script original para dejar asi configurado el script automático.</li>
</ol>