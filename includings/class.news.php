<?php

class News extends db implements Dmlable {
	
	private $news_id;
	private $datum;
	private $title;
	private $textfield;
	
	function __construct() {
		try {
			parent::__construct ();
		} catch ( MysqlException $e ) {
			Html::showAll ( $e );
		}
	
	}
	
	/**
	 * @return unknown
	 */
	public function getDatum() {
		return $this->datum;
	}
	
	/**
	 * @param unknown_type $datum
	 */
	public function setDatum($datum) {
		$this->datum = $datum;
	}
	
	/**
	 * @return unknown
	 */
	public function getTextfield() {
		return $this->textfield;
	}
	
	/**
	 * @param unknown_type $textfield
	 */
	public function setTextfield($textfield) {
		$this->textfield = $textfield;
	}
	
	/**
	 * @return unknown
	 */
	public function getTitle() {
		return $this->title;
	}
	
	/**
	 * @param unknown_type $title
	 */
	public function setTitle($title) {
		$this->title = $title;
	}
	
	/**
	 * @return unknown
	 */
	public function getId() {
		return $this->news_id;
	}
	
	/**
	 * @param unknown_type $news_id
	 */
	public function setId($news_id) {
		$this->news_id = $news_id;
	}
	
	/*
	 * speichert das aktuelle Objekt
	 * falls kein PrimŠrschlŸssel existiert
	 * wird ein neuer Datensatz erzeugt
	 * anderfalls ein update durchgefŸhrt
	 */
	public function save() {
		
		if (isset ( $this->news_id )) {
			$this->update ();
		} else {
			$this->insert ();
		}
	
	}
	
	public function insert() {
		
		$sql = "INSERT INTO news 
					   (news_id, datum, title, textfield) 
				VALUES ('' 
					   , '" . $this->datum . "', '" . $this->title . "', '" . $this->textfield . "');";
		
		try {
			$success_insert = mysql_query ( $sql );
			if (! $success_insert) {
				throw new MysqlException ( );
			}
			
			$insert_id = mysql_insert_id ();
			$this->fach_id = $insert_id;
		} catch ( MysqlException $e ) {
			Html::showAll ( $e );
		}
	}
	
	public function update() {
		
		$sql = "UPDATE news 
				   SET datum='" . $this->datum . "'  
				   	   , title='" . $this->title . "'
				   	   , textfield='" . $this->textfield . "'  
				 WHERE news_id=" . $this->news_id . ";";
		
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
		$sql = "DELETE FROM news 
			     WHERE news_id=" . $id . ";";
		
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
			      FROM news 
			     WHERE 1=1 ";
		$sql .= $restriction . ";";
		
		try {
			$result = mysql_query ( $sql );
			
			if (! $result) {
				throw new MysqlException ( );
			}
			
			$newsn = array ();
			while ( $row = mysql_fetch_assoc ( $result ) ) {
				$newsn [$row ['news_id']] ['news_id'] = $row ['news_id'];
				$newsn [$row ['news_id']] ['datum'] = $row ['datum'];
				$newsn [$row ['news_id']] ['title'] = $row ['title'];
				$newsn [$row ['news_id']] ['textfield'] = $row ['textfield'];
			}
		} catch ( MysqlException $e ) {
			Html::showAll ( $e );
		}
		
		return $newsn;
	}
	
	public function getAllAsObject($restriction = '') {
		$sql = "SELECT *
			      FROM news 
			     WHERE 1=1 ";
		$sql .= $restriction . ";";
		
		try {
			$result = mysql_query ( $sql );
			
			if (! $result) {
				throw new MysqlException ( );
			}
			
			$newsn = array ();
			while ( $row = mysql_fetch_assoc ( $result ) ) {
				$n = new news ( );
				$n->setId ( $row ['news_id'] );
				$n->setDatum ( $row ['datum'] );
				$n->setTitle ( $row ['title'] );
				$n->setTextfield ( $row ['textfield'] );
				$newsn [$n->getId ()] = $n;
			}
		} catch ( MysqlException $e ) {
			Html::showAll ( $e );
		}
		
		return $newsn;
	}
	
	public function load($id) {
		
		$sql = "SELECT * 
				  FROM news 
				 WHERE news_id=" . $id . ";";
		
		try {
			$result = mysql_query ( $sql );
			$row = mysql_fetch_assoc ( $result );
			
			if (empty ( $row ['news_id'] )) {
				throw new Exception ( "Datensatz leer: " . $sql );
			}
			
			$this->news_id = $row ['news_id'];
			$this->datum = $row ['datum'];
			$this->title = $row ['title'];
			$this->textfield = $row ['textfield'];
		
		} catch ( MysqlException $e ) {
			Html::showAll ( $e );
		} catch ( Exception $e ) {
			Html::showAll ( $e );
		}
	
	}
	
	public function loadLastNews() {
		$sql = "SELECT * 
				  FROM news 
				 WHERE news_id= 
				 	   (SELECT MAX(news_id) 
				 	   FROM news)";
		try {
			$result = mysql_query ( $sql );
			$row = mysql_fetch_assoc ( $result );
			
			if (empty ( $row ['news_id'] )) {
				throw new Exception ( "Datensatz leer: " . $sql );
			}
			
			$this->news_id = $row ['news_id'];
			$this->datum = $row ['datum'];
			$this->title = $row ['title'];
			$this->textfield = $row ['textfield'];
		
		} catch ( MysqlException $e ) {
			Html::showAll ( $e );
		} catch ( Exception $e ) {
			Html::showAll ( $e );
		}
			
	}

}

?>