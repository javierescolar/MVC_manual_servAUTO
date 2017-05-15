<?php
require_once('models/model.php');

Class CalendarioLaboral extends Model {

	private $id;
	private $id_ub;
	private $fecha_festivo;
	private $fecha_desplazar;
	private $desplazar_tox;
	private $desplazar_ti;
	private $desplazar_tm;


	function __construct($id=null,$id_ub=null,$fecha_festivo=null,$fecha_desplazar=null,$desplazar_tox=null,$desplazar_ti=null,$desplazar_tm=null) {
		$this->id = $id;
		$this->id_ub =$id_ub;
		$this->fecha_festivo = $fecha_festivo;
		$this->fecha_desplazar = $fecha_desplazar;
		$this->desplazar_tox = $desplazar_tox;
		$this->desplazar_ti = $desplazar_ti;
		$this->desplazar_tm = $desplazar_tm;
	}

	function getId() {
		return $this->id;
	}
	function getIdUb(){
		return $this->id_ub;
	}
	function getFechaFestivo(){
		return $this->fecha_festivo;
	}
	function getFechaDesplazar(){
		return $this->fecha_desplazar;
	}
	function getDesplazarTox(){
		return $this->desplazar_tox;
	}
	function getDesplazarTi(){
		return $this->desplazar_ti;
	}
	function getDesplazarTm(){
		return $this->desplazar_tm;
	}

	function setIdUb($value){
		$this->id_ub = $value;
	}
	function setFechaFestivo($value){
		$this->fecha_festivo = $value;
	}
	function setFechaDesplazar($value){
		$this->fecha_desplazar = $value;
	}
	function setDesplazarTox($value){
		$this->desplazar_tox = $value;
	}
	function setDesplazarTi($value){
		$this->desplazar_ti = $value;
	}
	function setDesplazarTm($value){
		$this->desplazar_tm = $value;
	}
	
	
	function persiste() {
		$bd = ConnectMySQL::getInstance();
		if ($this->id) {
			$select = "UPDATE tabla_calendario_laboral
					   SET id_ub = :id_ub, 
					   fecha_festivo = :fecha_festivo, 
					   fecha_desplazar = :fecha_desplazar,
					   desplazar_tox = :desplazar_tox,
					   desplazar_ti = :desplazar_ti,
					   desplazar_tm = :desplazar_tm
	          		   WHERE id = :id";
		    $sentencia = $bd->prepare($select);
		    $sentencia->execute([
		      ":id_ub" => $this->id_ub,
		      ":fecha_festivo" => $this->fecha_festivo,
		      ":fecha_desplazar" => $this->fecha_desplazar,
		      ":desplazar_tox" => $this->desplazar_tox,
		      ":desplazar_ti" => $this->desplazar_ti,
		      ":desplazar_tm" => $this->desplazar_tm,
		      ":id" => $this->id
		    ]);
		} else {
			$select = "INSERT INTO tabla_calendario_laboral (id_ub, fecha_festivo, fecha_desplazar,desplazar_tox,desplazar_ti,desplazar_tm)
	          		   VALUES (:id_ub,:fecha_festivo, :fecha_desplazar, :desplazar_tox, :desplazar_ti, :desplazar_tm)";
		    $sentencia = $bd->prepare($select);
		    $sentencia->execute([
		      ":id_ub" => $this->id_ub,
		      ":fecha_festivo" => $this->fecha_festivo,
		      ":fecha_desplazar" => $this->fecha_desplazar,
		      ":desplazar_tox" => $this->desplazar_tox,
		      ":desplazar_ti" => $this->desplazar_ti,
		      ":desplazar_tm" => $this->desplazar_tm
		    ]);
		}

	}
	
}

?>
