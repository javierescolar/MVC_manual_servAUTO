<?php
require_once('models/unidad_basica_model.php');

Class UnidadBasicaController{
	

	static function index() {
		$unidades_basicas = UnidadBasica::all("tabla_configuracion_UB","UnidadBasica");
		$ubs = $unidades_basicas;
		include "views/unidades_basicas/index.php";
	}

	static function nuevo(){
		include "views/unidades_basicas/new.php";
	}

	static function edit(){
		$unidad_basica = UnidadBasica::getRegistroId("tabla_configuracion_UB", "UnidadBasica",$_GET['id_registro']);
		include "views/unidades_basicas/edit.php";
	}


	static function update(){

		$unidad_basica = UnidadBasica::getRegistroId("tabla_configuracion_UB", "UnidadBasica",$_POST['id_registro']);
		$ejecutar_ub = (isset($_POST['ejecutar_ub'])) ? 1 : 0 ;
		$ejecutar_tox = (isset($_POST['ejecutar_tox'])) ? 1 : 0 ;
		$ejecutar_ti = (isset($_POST['ejecutar_ti'])) ? 1 : 0 ;
		$ejecutar_tm = (isset($_POST['ejecutar_tm'])) ? 1 : 0 ;

		$unidad_basica->setIdUb($_POST['id_ub']);
		$unidad_basica->setNomUb($_POST['nom_ub']);
		$unidad_basica->setIdExpBolsaTox($_POST['id_exp_bolsa_tox']);
		$unidad_basica->setIdExpBolsaTi($_POST['id_exp_bolsa_ti']);
		$unidad_basica->setIdExpBolsaTm($_POST['id_exp_bolsa_tm']);
		$unidad_basica->setEjecutarUb($ejecutar_ub);
		$unidad_basica->setDiaEjecutarLargo($_POST['dia_ejecutar_largo']);
		$unidad_basica->setCodigoDist($_POST['codigo_dist']);
		$unidad_basica->setCodigoRev($_POST['codigo_rev']);
		$unidad_basica->setEjecutarTox($ejecutar_tox);
		$unidad_basica->setEjecutarTi($ejecutar_ti);
		$unidad_basica->setEjecutarTm($ejecutar_tm);

		$unidad_basica->persiste();
		header("Location: /unidades_basicas");
	}

	static function create(){
		$ejecutar_ub = (isset($_POST['ejecutar_ub'])) ? 1 : 0 ;
		$ejecutar_tox = (isset($_POST['ejecutar_tox'])) ? 1 : 0 ;
		$ejecutar_ti = (isset($_POST['ejecutar_ti'])) ? 1 : 0 ;
		$ejecutar_tm = (isset($_POST['ejecutar_tm'])) ? 1 : 0 ;

		$unidad_basica = New UnidadBasica(null,$_POST['id_ub'],$_POST['nom_ub'],$_POST['id_exp_bolsa_tox'],$_POST['id_exp_bolsa_ti'],$_POST['id_exp_bolsa_tm'],
					$ejecutar_ub,$_POST['dia_ejecutar_largo'],$_POST['codigo_dist'],$_POST['codigo_rev'],$ejecutar_tox,$ejecutar_ti,$ejecutar_tm);
		$unidad_basica->persiste();
		header("Location: /unidades_basicas");
	}

	static function delete(){
		Tecnico::removeRegistroId("tabla_configuracion_UB",$_POST['id_registro']);
		header("Location: /unidades_basicas");
	}

	static function import(){
		include "views/unidades_basicas/import.php";
	}

	static function importData() {

		if (isset($_FILES['file_xml']) && (explode(".", $_FILES['file_xml']['name'])[1] == "xml" ) ) {
			$rutaXml = "uploaded_xml/". (String)date("Ymd_His")."tabla_configuracion_UB.".explode(".", $_FILES['file_xml']['name'])[1];
			move_uploaded_file($_FILES['file_xml']['tmp_name'], $rutaXml);
			$import = simplexml_load_file($rutaXml);
			$query = "";
			$insert = "INSERT INTO tabla_configuracion_UB (id_ub, nom_ub,id_exp_bolsa_tox,id_exp_bolsa_ti,id_exp_bolsa_tm,ejecutar_ub,
			dia_ejecutar_largo,codigo_dist,codigo_rev,ejecutar_tox,ejecutar_ti,ejecutar_tm) VALUES (";
			$endInsert = ");\n";
			foreach ($import->Worksheet->Table->Row as $row) {
				$query .= $insert;
				foreach ($row as $cell) {
					$query .= "'".strtoupper($cell->Data)."',";
				}
				$query = substr($query,0,-1) . $endInsert;
			}
			UnidadBasica::importXml($query);

			header("Location: /unidades_basicas");
		} else {
			echo "<p style='color:red;'>El formato no es válido ... debe ser XML</p>";
			include "views/unidades_basicas/import.php";
		}
		
	}
}

