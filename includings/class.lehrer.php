<?php

class Lehrer extends Db implements Dmlable {
	
	/*
	 * PrimŠrschlŸssel 
	 */
	private $lehrer_id;
	private $user_id;
	private $vorname;
	private $nachname;
	private $aktiv;
	
	/**
	 * enthŠlt alle PK der Schulklassen, in denen der Lehrer Fachleiter ist
	 *
	 * @var unknown_type
	 */
	private $klasse_ids;
	
	public function __construct($lehrer_id = NULL) {
		try {
			parent::__construct ();
		} catch ( MysqlException $e ) {
			Html::showAll ( $e );
		}
		
		if ($lehrer_id !== NULL) {
			
			$this->load ( $lehrer_id );
		}
	
	}
	/**
	 * @return int
	 */
	public function getId() {
		return $this->lehrer_id;
	}
	public function setId($lehrer_id) {
		$this->lehrer_id = $lehrer_id;
	}
	
	/**
	 * @return unknown
	 */
	public function getAktiv() {
		return $this->aktiv;
	}
	
	/**
	 * @param unknown_type $aktiv
	 */
	public function setAktiv($aktiv) {
		$this->aktiv = $aktiv;
	}
	
	/**
	 * @return unknown
	 */
	public function getNachname() {
		return $this->nachname;
	}
	
	/**
	 * @param unknown_type $nachname
	 */
	public function setNachname($nachname) {
		$this->nachname = $nachname;
	}
	
	/**
	 * @return unknown
	 */
	public function getUser_id() {
		return $this->user_id;
	}
	
	/**
	 * @param unknown_type $user_id
	 */
	public function setUser_id($user_id) {
		$this->user_id = $user_id;
	}
	
	/**
	 * @return unknown
	 */
	public function getVorname() {
		return $this->vorname;
	}
	
	/**
	 * @param unknown_type $vorname
	 */
	public function setVorname($vorname) {
		$this->vorname = $vorname;
	}
	
	/**
	 * @return unknown
	 */
	public function getKlasse_ids() {
		return $this->klasse_ids;
	}
	
	/**
	 * @param unknown_type $klasse_ids
	 */
	public function setKlasse_ids($klasse_ids) {
		$this->klasse_ids = $klasse_ids;
	}
	
	/*
	 * speichert das aktuelle Objekt
	 * falls kein PrimŠrschlŸssel existiert
	 * wird ein neuer Datensatz erzeugt
	 * anderfalls ein update durchgefŸhrt
	 */
	public function save() {
		
		if (isset ( $this->lehrer_id )) {
			$this->update ();
		} else {
			$this->insert ();
		}
		
		$l2k = new Lehrer_2_Klasse ( $this->lehrer_id );
		$l2k->setKlassen_ids_new ( $this->getKlasse_ids () );
		$l2k->save ();
	
	}
	
	public function insert() {
		
		$sql = "INSERT INTO lehrer 
					   (lehrer_id, user_id, vorname, nachname,aktiv) 
				VALUES ('' 
					   , " . $this->user_id . " 
					   , '" . $this->vorname . "' 
					   , '" . $this->nachname . "' 
					   ,'" . $this->aktiv . "');";
		
		try {
			$success_insert = mysql_query ( $sql );
			if (! $success_insert) {
				throw new MysqlException ( );
			}
			
			$insert_id = mysql_insert_id ();
			$this->lehrer_id = $insert_id;
		} catch ( MysqlException $e ) {
			Html::showAll ( $e );
		}
	}
	
	public function update() {
		
		$sql = "UPDATE lehrer 
				   SET user_id=" . $this->user_id . " 
				       , vorname='" . $this->vorname . "' 
				       , nachname='" . $this->nachname . "' 
				       , aktiv='" . $this->aktiv . "'  
				 WHERE lehrer_id=" . $this->lehrer_id . ";";
		
		try {
			$success_update = mysql_query ( $sql );
			if (! $success_update) {
				throw new MysqlException ( );
			}
		} catch ( MysqlException $e ) {
			Html::showAll ( $e );
		}
	
	}
	
	public function delete($id) {
		$sql = "DELETE FROM lehrer 
			     WHERE lehrer_id=" . $id . ";";
		
		try {
			$success_delete = mysql_query ( $sql );
			if (! $success_delete) {
				throw new MysqlException ( );
			}
		} catch ( MysqlException $e ) {
			Html::showAll ( $e );
		}
	}
	
	public function getAllAsArray($restriction = '') {
		$sql = "SELECT * 
			      FROM lehrer 
			     WHERE 1=1 ";
		$sql .= $restriction . ";";
		
		try {
			$result = mysql_query ( $sql );
			
			if (! $result) {
				throw new MysqlException ( );
			}
			
			$lehrers = array ();
			while ( $row = mysql_fetch_assoc ( $result ) ) {
				$lehrers [$row ['lehrer_id']] ['lehrer_id'] = $row ['lehrer_id'];
				$lehrers [$row ['lehrer_id']] ['user_id'] = $row ['user_id'];
				$lehrers [$row ['lehrer_id']] ['vorname'] = $row ['vorname'];
				$lehrers [$row ['lehrer_id']] ['nachname'] = $row ['nachname'];
				$lehrers [$row ['lehrer_id']] ['aktiv'] = $row ['aktiv'];
				// name wird fŸr PulldownMenues gebraucht:
				// v. nachname, jedoch max 10 Zeichen
				$lehrer_name = substr ( $row ['vorname'], 0, 1 ) . '. ' . $row ['nachname'];
				$lehrers [$row ['lehrer_id']] ['name'] = substr ( $lehrer_name, 0, 10 );
			
			}
		} catch ( MysqlException $e ) {
			Html::showAll ( $e );
		}
		
		return $lehrers;
	}
	
	public function getAllAsObject($restriction = '') {
		$sql = "SELECT * 
			      FROM lehrer 
			     WHERE 1=1 ";
		$sql .= $restriction . ";";
		
		try {
			$result = mysql_query ( $sql );
			
			if (! $result) {
				throw new MysqlException ( );
			}
			
			$lehrers = array ();
			while ( $row = mysql_fetch_assoc ( $result ) ) {
				$l = new Lehrer ( );
				$l->setId ( $row ['lehrer_id'] );
				$l->setUser_id ( $row ['user_id'] );
				$l->setVorname ( $row ['vorname'] );
				$l->setNachname ( $row ['nachname'] );
				$l->setAktiv ( $row ['aktiv'] );
				$lehrers [$l->getId ()] = $l;
			}
		} catch ( MysqlException $e ) {
			Html::showAll ( $e );
		}
		
		return $lehrers;
	}
	
	public function load($id) {
		
		$sql = "SELECT * 
				  FROM lehrer 
				 WHERE lehrer_id=" . $id . ";";
		
		try {
			$result = mysql_query ( $sql );
			$row = mysql_fetch_assoc ( $result );
			
			if (empty ( $row ['lehrer_id'] )) {
				throw new Exception ( "Datensatz leer: " . $sql );
			}
			
			$this->lehrer_id = $row ['lehrer_id'];
			$this->user_id = $row ['user_id'];
			$this->vorname = $row ['vorname'];
			$this->nachname = $row ['nachname'];
			$this->aktiv = $row ['aktiv'];
		
		} catch ( MysqlException $e ) {
			Html::showAll ( $e );
		} catch ( Exception $e ) {
			Html::showAll ( $e );
		}
		
		$l2k = new Lehrer_2_Klasse ( $this->lehrer_id );
		$this->klasse_ids = $l2k->getKlassen_ids_db ();
	
	}
	
	public function getName() {
		return substr ( $this->vorname, 0, 1 ) . '. ' . $this->nachname;
	}
	
	/**
	 * ŸberprŸft, ob die user_id zu einem Lehrer gehšrt
	 *
	 * @param unknown_type $user_id
	 * @return unknown
	 */
	public function isLehrer($user_id) {
		
		$sql = "SELECT * 
				  FROM lehrer 
				 WHERE user_id=" . $user_id . ";";
		
		try {
			$result = mysql_query ( $sql );
			$row = mysql_fetch_assoc ( $result );
		
		} catch ( MysqlException $e ) {
			Html::showAll ( $e );
		} catch ( Exception $e ) {
			Html::showAll ( $e );
		}
		
		if (! empty ( $row ['lehrer_id'] )) {
			return $row ['lehrer_id'];
		} else {
			return FALSE;
		}
	
	}

}

?>