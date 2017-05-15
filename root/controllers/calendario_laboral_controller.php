<?php
require_once('models/calendario_laboral_model.php');

Class CalendarioLaboralController {

	static function index(){
		$ubs = UnidadBasica::all("tabla_configuracion_ub", "UnidadBasica");
		$calendarios = CalendarioLaboral::all("tabla_calendario_laboral","CalendarioLaboral");
		include "views/calendarios_laborales/index.php";
	}

	static function nuevo(){
		$ubs = UnidadBasica::all("tabla_configuracion_ub", "UnidadBasica");
		include "views/calendarios_laborales/new.php";
	}

	static function edit(){
		$ubs = UnidadBasica::all("tabla_configuracion_ub", "UnidadBasica");
		$calendario = CalendarioLaboral::getRegistroId("tabla_calendario_laboral", "CalendarioLaboral",$_GET['id_registro']);
		include "views/calendarios_laborales/edit.php";
	}

	static function update(){
		$calendario = CalendarioLaboral::getRegistroId("tabla_calendario_laboral", "CalendarioLaboral",$_POST['id_registro']);
		$desplazar_tox = (isset($_POST['desplazar_tox'])) ? 1 : 0 ;
		$desplazar_ti = (isset($_POST['desplazar_ti'])) ? 1 : 0 ;
		$desplazar_tm = (isset($_POST['desplazar_tm'])) ? 1 : 0 ;

		$calendario->setIdUb($_POST['id_ub']);
		$calendario->setFechaFestivo($_POST['fecha_festivo']);
		$calendario->setfechaDesplazar($_POST['fecha_desplazar']);
		$calendario->setDesplazarTox($desplazar_tox);
		$calendario->setDesplazarTi($desplazar_ti);
		$calendario->setDesplazarTm($desplazar_tm);
		$calendario->persiste();
		header("Location: /calendarios_laborales");
	}

	static function create(){
		$desplazar_tox = (isset($_POST['desplazar_tox'])) ? 1 : 0 ;
		$desplazar_ti = (isset($_POST['desplazar_ti'])) ? 1 : 0 ;
		$desplazar_tm = (isset($_POST['desplazar_tm'])) ? 1 : 0 ;
		$calendario = New CalendarioLaboral(null,$_POST['id_ub'],$_POST['fecha_festivo'],$_POST['fecha_desplazar'],$desplazar_tox,$desplazar_ti,$desplazar_tm);
		$calendario->persiste();
		header("Location: /calendarios_laborales");
	}

	static function delete(){
		CalendarioLaboral::removeRegistroId("tabla_calendario_laboral",$_POST['id_registro']);
		header("Location: /calendarios_laborales");
	}

	static function import(){
		include "views/calendarios_laborales/import.php";
	}

	static function importData() {

		if (isset($_FILES['file_xml']) && (explode(".", $_FILES['file_xml']['name'])[1] == "xml" ) ) {
			$rutaXml = "uploaded_xml/". (String)date("Ymd_His")."tabla_calendario_laboral.".explode(".", $_FILES['file_xml']['name'])[1];
			move_uploaded_file($_FILES['file_xml']['tmp_name'], $rutaXml);
			$import = simplexml_load_file($rutaXml);
			$query = "";
			$insert = "INSERT INTO tabla_calendario_laboral (id_ub, fecha_festivo,fecha_desplazar,desplazar_tox,desplazar_ti,desplazar_tm) VALUES (";
			$endInsert = ");\n";
			foreach ($import->Worksheet->Table->Row as $row) {
				$query .= $insert;
				foreach ($row as $cell) {
					$query .= "'".strtoupper($cell->Data)."',";
				}
				$query = substr($query,0,-1) . $endInsert;
			}
			CalendarioLaboral::importXml($query);

			header("Location: /calendarios_laborales");
		} else {
			echo "<p style='color:red;'>El formato no es válido ... debe ser XML</p>";
			include "views/calendarios_laborales/import.php";
		}
		
	}
	
}
?>