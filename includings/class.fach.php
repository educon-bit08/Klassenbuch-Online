<?php

class Fach extends Db implements Dmlable {
	
	/*
	 * PrimŠrschlŸssel 
	 */
	private $fach_id;
	private $aktiv;
	
	/*
	 * Name des Schulfachs
	 * string
	 * 45 Zeichen erlaubt
	 */
	private $name;
	
	public function __construct() {
		try {
			parent::__construct();
		}
		catch (MysqlException $e) {
			Html::showAll($e);
		}
	}
	
	
	/**
	 * @return int
	 */
	public function getId() {
		return $this->fach_id;
	}
	
	/**
	 * @param int $fach_id
	 */
	public function setId($fach_id) {
		$this->fach_id = $fach_id;
	}
	
	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}
	
	/**
	 * @param tring $name
	 */
	public function setName($name) {
		$this->name = $name;
	}
	/**
	 * Aktiv
	 */
    public function getAktiv() {
		return $this->aktiv;
	}
	public function setAktiv($aktiv) {
		$this->aktiv = $aktiv;
	}	
	/*
	 * speichert das aktuelle Objekt
	 * falls kein PrimŠrschlŸssel existiert
	 * wird ein neuer Datensatz erzeugt
	 * anderfalls ein update durchgefŸhrt
	 */
	public function save() {
		
		if (isset($this->fach_id)) {
			$this->update();
		} else {
			$this->insert();
		}
		
	}
	
	public function insert() {
		
		$sql = "INSERT INTO fach 
					   (fach_id, name,aktiv) 
				VALUES ('' 
					   , '" .$this->name."','".$this->aktiv."');";

		try {
			$success_insert = mysql_query($sql);
			if (!$success_insert) {
				throw new MysqlException();
			}
				
			$insert_id = mysql_insert_id();
			$this->fach_id = $insert_id;	
		} catch (MysqlException $e) {
			Html::showAll($e);
		}
	}
	
	public function update() {
		
		$sql = "UPDATE fach 
				   SET name='" .$this->name. "'
                       ,aktiv='".$this->aktiv."'
				 WHERE fach_id=" .$this->fach_id. ";";		
		try {
			$success_update = mysql_query($sql);
			if (!$success_update) {
				throw new MysqlException();
			}
		} catch (MysqlException $e) {
			Html::showAll($e);
		}
		
	}
	
	public function delete($id) {
		$sql = "DELETE FROM fach 
			     WHERE fach_id=" .$id. ";";
		
		try {
			$success_delete = mysql_query($sql);
			if (!$success_delete) {
				throw new MysqlException();
			}
		} catch (MysqlException $e) {
			Html::showAll($e);
		}
	}
	
	public function getAllAsArray($restriction = '') {
		$sql = "SELECT *
			      FROM fach 
			     WHERE 1=1 ";
		$sql .= $restriction. ";";
		
		try {
			$result = mysql_query($sql);
			
			if (!$result) {
				throw new MysqlException();
			}
			
			$fachs = array();
			while ($row = mysql_fetch_assoc($result)) {
				$fachs[$row['fach_id']]['fach_id'] = $row['fach_id'];
				$fachs[$row['fach_id']]["name"] = $row['name'];
				$fachs[$row['fach_id']]["aktiv"] = $row['aktiv'];
			}			
		} catch (MysqlException $e) {
			Html::showAll($e);
		}
		
		return $fachs;
	}
	
	public function getAllAsObject($restriction = '') {
		$sql = "SELECT *
			      FROM fach 
			     WHERE 1=1 ";
		$sql .= $restriction. ";";
		
		try {
			$result = mysql_query($sql);
			
			if (!$result) {
				throw new MysqlException();
			}
			
			$fachs = array();
			while ($row = mysql_fetch_assoc($result)) {
				$f = new Fach();
				$f->setId($row['fach_id']);
				$f->setName($row['name']);
				$f->setAktiv($row['aktiv']);
				$fachs[$f->getId()] = $f;
			}		
		} catch (MysqlException $e) {
			Html::showAll($e);
		}
		
		return $fachs;
	}
	
	
	public function load($id) {
		
		$sql = "SELECT * 
				  FROM fach 
				 WHERE fach_id="  .$id. ";";
		
		try {
			$result = mysql_query($sql);
			$row = mysql_fetch_assoc($result);
			
			if (empty($row['fach_id'])) {
				throw new Exception("Datensatz leer: ". $sql);
			}
			
			$this->fach_id = $row['fach_id'];
			$this->name = $row['name'];
			$this->aktiv = $row['aktiv'];
			
		} catch (MysqlException $e) {
			Html::showAll($e);
		} catch (Exception $e) {
			Html::showAll($e);
		}

	}
	

}

?>