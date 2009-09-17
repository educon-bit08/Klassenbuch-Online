<?php

class Block extends Db implements Dmlable{
	
	//Primärschlüssel
	private $block_id;
	private $von;
	private $bis;
	
	public function __construct(){
		try{
			parent::__construct();
		}
		catch(MysqlException $e){
			Html::showAll($e);
		}
	}
	
	public function getId(){
		return	$this -> block_id;
	}
	
	public function setId($block_id){
		$this -> block_id = $block_id;
	}
	
	/**
	 * @return unknown
	 */
	public function getBis() {
		return $this->bis;
	}
	
	/**
	 * @param unknown_type $bis
	 */
	public function setBis($bis) {
		$this->bis = $bis;
	}
	
	/**
	 * @return unknown
	 */
	public function getVon() {
		return $this->von;
	}
	
	/**
	 * @param unknown_type $von
	 */
	public function setVon($von) {
		$this->von = $von;
	}


	/*
	 *Speicherung des Aktuellen Objektes
	 *falls kein Primärschlüssel existieren sollte
	 *wird ein neuer Datensatz erzeugt
	 *andernfalls ein Udate durchgeführt
	*/
	public function save(){
		if(isset($this->$block_id)){
				$this->update();
		} else {
				$this->insert();
		}
	}
	
	public function insert(){
		$sql = "INSERT INTO block
					   (block_id, von, bis)
				VALUES ('','".$this->von."','".$this->bis."');";
				
		try{
			$success_insert = mysql_query($sql);
			if(!success_insert){
				throw new MysqlException();
			}
			
			$insert_id = mysql_insert_id();
			$this->$user_id = $insert_id;
		} catch (MysqlException $e){
				Html::showAll($e);
		  }
	}
	
	public function update(){
		$sql = "UPDATE block
				   SET von='".$this->von."',
					   bis='".$this->bis."'  
				 WHERE block_id=".$this->block_id.";";
		
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
		$sql = "DELETE FROM block
				WHERE block_id=".$id.";";
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
				FROM block
				WHERE 1=1";
		$sql .=$restriction. ";";
		
		try {
			$result = mysql_query($sql);
		
			if(!$result) {
				throw new MysqlException();
			}
			
			$blocks = array();
			while ($row = mysql_fetch_assoc($result)){
				$blocks[$row['block_id']]['block_id'] = $row['block_id'];
				$blocks[$row['block_id']]['von'] = $row['von'];
				$blocks[$row['block_id']]['bis'] = $row['bis'];

			}
		}
		catch(MysqlException $e){
			Html::showAll($e);
		}
		
		return $blocks;
	}
	
	public function getAllAsObject($restriction = ''){
		$sql="SELECT *
				FROM block
				WHERE 1=1";
		$sql .=$restriction. ";";
		
		try {
			$result = mysql_query($sql);
		
			if(!$result) {
				throw new MysqlException();
			}
			
			$blocks = array();
			while ($row = mysql_fetch_assoc($result)){
				
				$b = new Block();			
				$b->setId($row['block_id']);
				$b->setVon($row['von']);
				$b->setBis($row['bis']);
				$blocks[$b->getId()] = $b;
				
			}
		}
		catch(MysqlException $e){
			Html::showAll($e);
		}
		
		return $blocks;
	}
	public function load($id){
	
		$sql="SELECT *
				FROM block
			  	WHERE block_id=".$id.";";
		
		try{
			$result = mysql_query ($sql);
			$row = mysql_fetch_assoc($result);
			
			if (empty($row['block_id'])){
				throw new MysqlException("Datensatz leer: ". $sql);
			}
			
			$this->block_id=$row['block_id'];
			$this->von=$row['von'];
			$this->bis=$row['bis'];

		}
		catch (MysqlException $e) {
			Html::showAll($e);
		} 
		catch (Exception $e) {
			Html::showAll($e);
		}
		
	}
	
	
}
			
?>