<?php

class Anwesenheit extends db implements Dmlable{
	
	//Prim채rschl체ssel
	private $anwesenheit_id;
	private $schueler_id;
	private $unterrichtsstunde_id;
	private $status;
	private $verspaetung;

	
	public function __construct(){
		try{
			parent::__construct();
		}
		catch(MysqlException $e){
			Html::showAll($e);
		}
	}
	
	/*
	 *resturn int
	*/
	public function getId(){
		return $this -> anwesenheit_id;
	}
	
	/*
	 *parameter int $klasse_id
	*/
	public function setId($anwesenheit_id){
		$this->anwesenheit_id = $anwesenheit_id;
	}
	
	/**
	 * @return unknown
	 */
	public function getSchueler_id() {
		return $this->schueler_id;
	}
	
	/**
	 * @param unknown_type $schueler_id
	 */
	public function setSchueler_id($schueler_id) {
		$this->schueler_id = $schueler_id;
	}
	
	/**
	 * @return unknown
	 */
	public function getStatus() {
		return $this->status;
	}
	
	/**
	 * @param unknown_type $status
	 */
	public function setStatus($status) {
		$this->status = $status;
	}
	
	/**
	 * @return unknown
	 */
	public function getUnterrichtsstunde_id() {
		return $this->unterrichtsstunde_id;
	}
	
	/**
	 * @param unknown_type $unterrichtsstunde_id
	 */
	public function setUnterrichtsstunde_id($unterrichtsstunde_id) {
		$this->unterrichtsstunde_id = $unterrichtsstunde_id;
	}
	
	/**
	 * @return unknown
	 */
	public function getVerspaetung() {
		return $this->verspaetung;
	}
	
	/**
	 * @param unknown_type $verspaetung
	 */
	public function setVerspaetung($verspaetung) {
		$this->verspaetung = $verspaetung;
	}

	/*
	 *Speicherung des Aktuellen Objektes
	 *falls kein Prim채rschl체ssel existieren sollte
	 *wird ein neuer Datensatz erzeugt
	 *andernfalls ein Udate durchgef체hrt
	*/
	public function save(){
		if(isset($this->$anwesenheit_id)){
				$this->update();
		} else {
				$this->insert();
		}
	}
	
	public function insert(){
		$sql = "INSERT INTO anwesenheit
					   (anwesenheit_id, schueler_id, verspaetung, unterrichtsstunde_id, status)
				VALUES (''," .$this->schueler_id. ",'".$this->verspaetung."'," .$this->unterrichtsstunde_id. ",'" .$this->status. "');";
				
		try{
			$success_insert = mysql_query($sql);
			if(!success_insert){
				throw new MysqlException();
			}
			
			$insert_id = mysql_insert_id();
			$this->$anwesenheit_id = $insert_id;
		} catch (MysqlException $e){
				Html::showAll($e);
		  }
	}
	
	public function update(){
		$sql = "UPDATE anwesenheit
				   SET schueler_id=".$this->schueler_id.",
					   verspaetung=".$this->verspaetung.",
					   unterrichtsstunde_id=".$this->datum.",
					   status='".$this->status."'				   
				 WHERE anwesenheit_id=".$this->anwesenheit_id.";";
		
		try{
			$success_delete = mysql_query($sql);
			if (!success_delete) {
				throw new MysqlException();
			}
		}
		catch (MysqlException $e) {
			Html::showAll($e);
		}
	}
	
	public function delete($id){
		$sql = "DELETE FROM anwesenheit
				WHERE anwesenheit_id=".$id.";";
		try{
			$success_delete = mysql_query($sql);
			if (!success_delete) {
				throw new MysqlException();
			}
		}
		catch(MysqlException $e){
			Html::showAll($e);
		}
	}		
	
	public function getAllAsArray($restriction = ''){
		$sql="SELECT * 
				FROM anwesenheit
				WHERE 1=1";
		$sql .=$restriction. ";";
		
		try {
			$result = mysql_query($sql);
		
			if(!result) {
				throw new MysqlException();
			}
			
			$anwesenheiten = array();
			while ($row = mysql_fetch_assoc($result)){
				$anwesenheiten[$row['anwesenheit_id']]['anwesenheit_id'] = $row['anwesenheit_id'];
				$anwesenheiten[$row['anwesenheit_id']]['schueler_id'] = $row['schueler_id'];
				$anwesenheiten[$row['anwesenheit_id']]['unterrichtsstunde_id'] = $row['unterrichtsstunde_id'];
				$anwesenheiten[$row['anwesenheit_id']]['verspaetung'] = $row['verspaetung'];
				$anwesenheiten[$row['anwesenheit_id']]['status'] = $row['status'];
			}
		}
		catch(MysqlException $e){
			Html::showAll($e);
		}
		
		return $anwesenheiten;
	}

	public function getAllAsObject($restriction = ''){
		$sql="SELECT *
				FROM anwesenheit
				WHERE 1=1";
		$sql .=$restriction. ";";
		
		try {
			$result = mysql_query($sql);
		
			if(!$result) {
				throw new MysqlException();
			}
			
			$anwesenheiten = array();
			while ($row = mysql_fetch_assoc($result)){
				$a = new Anwesenheit();
				$a->setId($row['anwesenheit_id']);
				$a->setSchueler_id($row['schueler_id']);
				$a->setUnterrichtsstunde_id($row['unterrichtsstunde_id']);
				$a->setVerspaetung($row['verspaetung']);
				$a->setStatus($row['status']);
				$anwesenheiten[$a->getId()] = $a;
			}
		}
		catch(MysqlException $e){
			Html::showAll($e);
		}
		
		return $anwesenheiten;
	}
	
	public function load($id){
	
		$sql="SELECT *
				FROM anwesenheit
			  	WHERE anwesenheit_id=".$id.";";
		
		try{
			$result = mysql_query ($sql);
			$row = mysql_fetch_assoc($result);
			
			if (empty($row['anwesenheit_id'])){
				throw new MysqlException("Datensatz leer: ". $sql);
			}
			
			$this->anwesenheit_id=$row['anwesenheit_id'];
			$this->status=$row['status'];
			$this->verspaetung=$row['verspaetung'];
			$this->unterrichtsstunde_id=$row['unterrichtsstunde_id'];
			$this->schueler_id=$row['schueler_id'];
			
		}
		catch (MysqlException $e) {
			Html::showAll($e);
		} 
		catch (Exception $e) {
			Html::showAll($e);
		}
		
	}
	
/**
	 * gibt zu schueler_id ( und (fach_id)
	 * alle Notenobjekte zur웒k
	 *
	 * @param unknown_type $schueler_id
	 * @param unknown_type $fach_id
	 * @return unknown
	 */
	public function getAnwesenheit($schueler_id, $fach_id = 0) {
		
		if ($fach_id === 0) {
			$restriction = ' AND schueler_id = ' . $schueler_id . ' ';
		} else {
			$restriction = ' AND schueler_id = ' . $schueler_id . ' AND fach_id = ' . $fach_id . ' ';
		}
		
		return $this->getAllAsObject ( $restriction );
	
	}
}
			
?>