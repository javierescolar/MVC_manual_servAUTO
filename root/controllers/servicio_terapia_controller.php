<?php
require_once('models/servicio_terapia_model.php');

Class ServicioTerapiaController {

	static function index () {
		$ubs = UnidadBasica::all("tabla_configuracion_ub", "UnidadBasica");
		$servicios_terapias = ServicioTerapia::all("tabla_configuracion_perfil","ServicioTerapia");
		include "views/servicios_terapias/index.php";

	}

	static function nuevo(){
		$ubs = UnidadBasica::all("tabla_configuracion_ub", "UnidadBasica");
		include "views/servicios_terapias/new.php";
	}

	static function edit(){
		$ubs = UnidadBasica::all("tabla_configuracion_ub", "UnidadBasica");
		$servicio_terapia = ServicioTerapia::getRegistroId("tabla_configuracion_perfil", "ServicioTerapia",$_GET['id_registro']);
		include "views/servicios_terapias/edit.php";
	}

	static function update(){
		$tecnico = ServicioTerapia::getRegistroId("tabla_configuracion_perfil", "ServicioTerapia",$_POST['id_registro']);
		$tecnico->setIdUb($_POST['id_ub']);
		$tecnico->setIdPerfil($_POST['id_perfil']);
		$tecnico->setIdTipoServicio($_POST['id_tipo_servicio']);
		$tecnico->setidterapia($_POST['id_terapia']);
		$tecnico->setPosicionRuta($_POST['posicion_ruta']);
		$tecnico->persiste();
		header("Location: /servicios_terapias");
	}

	static function create(){
		$servicio_terapia = New Servicioterapia(null,$_POST['id_ub'],$_POST['id_perfil'],$_POST['id_tipo_servicio'],$_POST['id_terapia'],$_POST['posicion_ruta']);
		$servicio_terapia->persiste();
		header("Location: /servicios_terapias");
	}

	static function delete(){
		ServicioTerapia::removeRegistroId("tabla_configuracion_perfil",$_POST['id_registro']);
		header("Location: /servicios_terapias");
	}

	static function import(){
		include "views/servicios_terapias/import.php";
	}
	static function importData() {

		if (isset($_FILES['file_xml']) && (explode(".", $_FILES['file_xml']['name'])[1] == "xml" ) ) {
			$rutaXml = "uploaded_xml/". (String)date("Ymd_His")."_tabla_configuracion_perfil.".explode(".", $_FILES['file_xml']['name'])[1];
			move_uploaded_file($_FILES['file_xml']['tmp_name'], $rutaXml);
			$import = simplexml_load_file($rutaXml);
			$query = "";
			$insert = "INSERT INTO tabla_configuracion_perfil (id_ub, id_perfil,id_tipo_servicio,id_terapia,posicion_ruta) VALUES (";
			$endInsert = ");\n";
			foreach ($import->Worksheet->Table->Row as $row) {
				$query .= $insert;
				foreach ($row as $cell) {
					$query .= "'".strtoupper($cell->Data)."',";
				}
				$query = substr($query,0,-1) . $endInsert;
			}
			ServicioTerapia::importXml($query);

			header("Location: /servicios_terapias");
		} else {
			echo "<p style='color:red;'>El formato no es válido ... debe ser XML</p>";
			include "views/servicios_terapias/import.php";
		}
		
	}

}

?>