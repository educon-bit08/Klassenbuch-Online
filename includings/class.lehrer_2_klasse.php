<?php

class Lehrer_2_Klasse extends Db {
	
	/*
	 * PK des Lehrers fŸr den Klassen festgelegt werden sollen 
	 */
	private $lehrer_id;
	
	/**
	 * alle klassen_ids zu einer lehrer_id, die derzeit in der db stehen
	 *
	 * @var array int
	 */
	private $klassen_ids_db;
	
	/**
	 * alle klassen_ids zu einer lehrer_id, die in der db stehen sollen
	 *
	 * @var array int
	 */
	private $klassen_ids_new;
	
	public function __construct($lehrer_id = NULL) {
		try {
			parent::__construct();
		}
		catch (MysqlException $e) {
			Html::showAll($e);
		}
		
		$this->lehrer_id = $lehrer_id;
		if ($lehrer_id !== NULL) {
			$this->load($lehrer_id);
		}
		
	}
	
	/**
	 * @return array
	 */
	public function getKlassen_ids_db() {
		return $this->klassen_ids_db;
	}
	
	/**
	 * @param array $klassen_ids_db
	 */
	public function setKlassen_ids_db($klassen_ids_db) {
		$this->klassen_ids_db = $klassen_ids_db;
	}
	
	/**
	 * @return array
	 */
	public function getKlassen_ids_new() {
		return $this->klassen_ids_new;
	}
	
	/**
	 * @param array $klassen_ids_new
	 */
	public function setKlassen_ids_new($klassen_ids_new) {
		$this->klassen_ids_new = $klassen_ids_new;
	}
	
	/**
	 * @return int
	 */
	public function getLehrer_id() {
		return $this->lehrer_id;
	}
	
	/**
	 * @param int $lehrer_id
	 */
	public function setLehrer_id($lehrer_id) {
		$this->lehrer_id = $lehrer_id;
	}

	/*
	 * benštigt Lehrer_id gesetzt
	 */
	public function save() {
		
		// Daten aus db laden
		$this->load($this->lehrer_id);
		
		// lšscht alle klassen_id, die in klassen_ids_db sind, aber nicht in klassen_ids_new
		foreach ($this->klassen_ids_db as $klasse_in_db) {
			if (!in_array($klasse_in_db, $this->klassen_ids_new)) {
				$this->delete($klasse_in_db);
			}
		}
		
		// speichert alle klasse_id, die in klassen_ids_new sind, aber noch nicht in klassen_ids_db
		foreach ($this->klassen_ids_new as $klasse_new) {
			if (!in_array($klasse_new, $this->klassen_ids_db)) {
				$this->insert($klasse_new);
			}		
		}
		
		// klasse selbst updaten
		$this->setKlassen_ids_db($this->getKlassen_ids_new());
	}
	
	public function insert($klassen_id) {
		
		$sql = "INSERT INTO lehrer_2_klasse
					   (lehrer_id, klasse_id) 
				VALUES (" .$this->lehrer_id. ", " .$klassen_id. ");";

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
	
	private  function update() {
		
		$this->save();
		
	}
	
	private function delete($klasse_id) {
		$sql = "DELETE FROM lehrer_2_klasse 
			     WHERE lehrer_id=" .$this->lehrer_id. " 
			       AND klasse_id=" .$klasse_id. ";";
		
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
			      FROM lehrer_2_klasse 
			     WHERE 1=1 ";
		$sql .= $restriction. ";";
		
		try {
			$result = mysql_query($sql);
			
			if (!$result) {
				throw new MysqlException();
			}
			
			$l2ks = array();

			while ($row = mysql_fetch_assoc($result)) {
				$l2ks[$row['lehrer_id']][] = $row['klasse_id'];
			}		
		} catch (MysqlException $e) {
			Html::showAll($e);
		}
		
		return $l2ks;
	}
	

	public function load($lehrer_id) {
		
		$sql = "SELECT * 
				  FROM lehrer_2_klasse
				 WHERE lehrer_id="  .$lehrer_id. ";";
	
		try {
			$result = mysql_query($sql);
			
			$this->lehrer_id = $lehrer_id;
			$this->klassen_ids_db = array();
			while ($row = mysql_fetch_assoc($result)) {
				
				$this->klassen_ids_db[] = $row['klasse_id'];
			}
			
		} catch (MysqlException $e) {
			Html::showAll($e);
		} catch (Exception $e) {
			Html::showAll($e);
		}

	}
	

}

?>