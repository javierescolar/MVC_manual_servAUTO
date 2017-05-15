<?php
require_once('models/model.php');

Class Home extends Model {

	private $rutaTXT = "C:/Users/ES3756/Desktop/Javi/PROYECTOS_SERVIDORES/Servicios_AUTO/auto_scripts/";
	private $rutaSQL = "C:/Users/ES3756/Desktop/Javi/PROYECTOS_SERVIDORES/Servicios_AUTO/auto_scripts/exportDataTables.sql";
	private $query_ESP = "C:/Users/ES3756/Desktop/Javi/PROYECTOS_SERVIDORES/Servicios_AUTO/auto_scripts/query_ESP.sql";
	private $marca_inicio = "--**MARCA_INICIO**--";
	private $marca_fin = "--**MARCA_FIN**--";
	
	private $tablas = [
		"tabla_configuracion_UB ",
		"tabla_calendario_laboral",
		"tabla_configuracion_perfil",
		"tabla_configuracion_tecnicos"
	];


	function generarScript() {
		if (file_exists($this->rutaSQL)){
			unlink($this->rutaSQL);
		}
		
		foreach($this->tablas as $tabla) {
			if (file_exists($this->rutaTXT."".$tabla.".txt")) {
				unlink($this->rutaTXT."".$tabla.".txt");
			}
			//generamos un txt
			$this->exportarResultadosTxt($tabla);
			//agregamos los datos al fichero sql
			$this->crearFicheroSQL($tabla);
		}

		$this->remplazarDesdeHasta();
	}
	
	function exportarResultadosTxt($tabla) {
		$bd = ConnectMySQL::getInstance();
		$bd->query("SELECT * INTO OUTFILE '".$this->rutaTXT."".$tabla.".txt' FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n' FROM ".$tabla." ORDER BY id_ub");  
	}

	function crearFicheroSQL($tabla) {
		 $script = "";
		 $fp = fopen($this->rutaTXT.$tabla.".txt", "r");
		 $fp2 = fopen($this->rutaSQL, "a");
		 while (!feof($fp) ) {
		 	$linea = fgets($fp);
		 	$resultados = explode(",", trim($linea));
		 	if (count($resultados)>1 && isset($resultados)) {
		 		$script = "INSERT INTO #".$tabla." VALUES(";

			 	foreach ($resultados as $resultado) {
			 		$script = $script . "'".$resultado."',";
			 	}

			 	$script = substr($script,0,-1) . ")\n";

			 	fputs($fp2,$script);
		 	}
		 	
		 }

		fclose($fp);
		fclose($fp2);
	}

	function remplazarDesdeHasta() {
		$file = file_get_contents($this->query_ESP);
		$script_file = file_get_contents($this->rutaSQL);
		$file= substr_replace($file, "\n \n", (strpos($file, $this->marca_inicio)+strlen($this->marca_inicio)),(strpos($file, $this->marca_fin)- strpos($file, $this->marca_inicio)));
		$new_script = substr_replace($file, "\n \n".$script_file."\n ".$this->marca_fin, (strpos($file, $this->marca_inicio)+strlen($this->marca_inicio)),0);
		$fp2 = fopen($this->query_ESP, "w");
		fputs($fp2,$new_script);
		fclose($fp2);

	}

	

}

?>