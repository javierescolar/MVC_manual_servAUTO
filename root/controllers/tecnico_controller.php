<?php
require_once('models/tecnico_model.php');

class TecnicoController {


	static function index(){
		$ubs = UnidadBasica::all("tabla_configuracion_ub", "UnidadBasica");
		$tecnicos = Tecnico::all("tabla_configuracion_tecnicos", "Tecnico");
		include "views/tecnicos/index.php";
	}

	static function nuevo(){
		$ubs = UnidadBasica::all("tabla_configuracion_ub", "UnidadBasica");
		include "views/tecnicos/new.php";
	}

	static function edit(){
		$ubs = UnidadBasica::all("tabla_configuracion_ub", "UnidadBasica");
		$tecnico = Tecnico::getRegistroId("tabla_configuracion_tecnicos", "Tecnico",$_GET['id_registro']);
		include "views/tecnicos/edit.php";
	}

	static function update(){
		$tecnico = Tecnico::getRegistroId("tabla_configuracion_tecnicos", "Tecnico",$_POST['id_registro']);
		$tecnico->setIdUb($_POST['id_ub']);
		$tecnico->setIdTecnico($_POST['id_tecnico']);
		$tecnico->setIdPerfil($_POST['id_perfil']);
		$tecnico->setCodigo($_POST['codigo']);
		$tecnico->setCargaMaxLargo($_POST['carga_max_largo']);
		$tecnico->persiste();
		header("Location: /tecnicos");
	}

	static function create(){
		$tecnico = New Tecnico(null,$_POST['id_ub'],$_POST['id_tecnico'],$_POST['id_perfil'],$_POST['codigo'],$_POST['carga_max_largo']);
		$tecnico->persiste();
		header("Location: /tecnicos");
	}

	static function delete(){
		Tecnico::removeRegistroId("tabla_configuracion_tecnicos",$_POST['id_registro']);
		header("Location: /tecnicos");
	}

	static function import(){
		include "views/tecnicos/import.php";
	}

	static function importData() {

		if (isset($_FILES['file_xml']) && (explode(".", $_FILES['file_xml']['name'])[1] == "xml" ) ) {
			$rutaXml = "uploaded_xml/". (String)date("Ymd_His")."_tabla_configuracion_tecnicos.".explode(".", $_FILES['file_xml']['name'])[1];
			move_uploaded_file($_FILES['file_xml']['tmp_name'], $rutaXml);
			$import = simplexml_load_file($rutaXml);
			$query = "";
			$insert = "INSERT INTO tabla_configuracion_tecnicos (id_ub, id_tecnico,id_perfil,codigo,carga_max_largo) VALUES (";
			$endInsert = ");\n";
			foreach ($import->Worksheet->Table->Row as $row) {
				$query .= $insert;
				foreach ($row as $cell) {
					$query .= "'".strtoupper($cell->Data)."',";
				}
				$query = substr($query,0,-1) . $endInsert;
			}
			Tecnico::importXml($query);

			header("Location: /tecnicos");
		} else {
			echo "<p style='color:red;'>El formato no es válido ... debe ser XML</p>";
			include "views/tecnicos/import.php";
		}
		
	}

}

?>