<?php

class Raum extends Db implements Dmlable {
	
	/*
	 * PrimŠrschlŸssel 
	 */
	private $raum_id;
	private $aktiv;
	
	/*
	 * Name des Schulraums
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
		return $this->raum_id;
	}
	
	/**
	 * @param int $raum_id
	 */
	public function setId($raum_id) {
		$this->raum_id = $raum_id;
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
		
		if (isset($this->raum_id)) {
			$this->update();
		} else {
			$this->insert();
		}
		
	}
	
	public function insert() {
		
		$sql = "INSERT INTO raum 
					   (raum_id, name,aktiv) 
				VALUES ('' 
					   , '" .$this->name."','".$this->aktiv."');";

		try {
			$success_insert = mysql_query($sql);
			if (!$success_insert) {
				throw new MysqlException();
			}
				
			$insert_id = mysql_insert_id();
			$this->raum_id = $insert_id;	
		} catch (MysqlException $e) {
			Html::showAll($e);
		}
	}
	
	public function update() {
		
		$sql = "UPDATE raum 
				   SET name='" .$this->name. "'
                       ,aktiv='".$this->aktiv."'
				 WHERE raum_id=" .$this->raum_id. ";";
		
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
		$sql = "DELETE FROM raum 
			     WHERE raum_id=" .$id. ";";
		
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
			      FROM raum 
			     WHERE 1=1 ";
		$sql .= $restriction. ";";
		
		try {
			$result = mysql_query($sql);
			
			if (!$result) {
				throw new MysqlException();
			}
			
			$raums = array();
			while ($row = mysql_fetch_assoc($result)) {
				$raums[$row['raum_id']]['raum_id'] = $row['raum_id'];
				$raums[$row['raum_id']]["name"] = $row['name'];
				$raums[$row['raum_id']]["aktiv"] = $row['aktiv'];
			}		
		} catch (MysqlException $e) {
			Html::showAll($e);
		}
		
		return $raums;
	}
	
	static public function getAllAsObject($restriction = '') {
		$sql = "SELECT *
			      FROM raum 
			     WHERE 1=1 ";
		$sql .= $restriction. ";";
		
		try {
			$result = mysql_query($sql);
			
			if (!$result) {
				throw new MysqlException();
			}
			
			$raums = array();
			while ($row = mysql_fetch_assoc($result)) {
				$f = new raum();
				$f->setId($row['raum_id']);
				$f->setName($row['name']);
				$f->setAktiv($row['aktiv']);
				$raums[$f->getId()] = $f;
			}		
		} catch (MysqlException $e) {
			Html::showAll($e);
		}
		
		return $raums;
	}
	
	
	public function load($id) {
		
		$sql = "SELECT * 
				  FROM raum 
				 WHERE raum_id="  .$id. ";";
		
		try {
			$result = mysql_query($sql);
			$row = mysql_fetch_assoc($result);
			
			if (empty($row['raum_id'])) {
				throw new Exception("Datensatz leer: ". $sql);
			}
			
			$this->raum_id = $row['raum_id'];
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