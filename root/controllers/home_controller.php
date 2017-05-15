
<?php

require_once('models/home_model.php');
Class HomeController {

	private $route_views = "views/home/";

	static function index() {
		
		include "views/home/index.php";
	}


	static function generarScript() {
		$home = new Home;
		$home->generarScript();
		include "views/home/index.php";
		echo "<script> swal('Script actualizado correctamente'); </script>";

	} 

}


?>