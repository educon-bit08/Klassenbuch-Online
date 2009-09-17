<?php

class Eintragung extends Db implements Dmlable{
	
	//Primärschlüssel
	private $klasse_id;
	
	/*Name der Eintragung
	 *string
	 *45 Zeichen erlaubt
	*/
	private $fach_id;
	private $block_nr;
	private $lehrer_id;
	
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
		return $this -> klasse_id;
	}
	
	/*
	 *parameter int $klasse_id
	*/
	public function setId($klasse_id){
		$this->klasse_id = $klasse_id;
	}
	
	/*
	 *return string
	*/
	public function getFach(){
		return $this -> fach_id;
	}
	
	/*
	 *parameter string $fach_id
	*/
	public function setFach($fach_id){
		$this->fach = $fach_id;
	}
	
	/*
	 *Speicherung des Aktuellen Objektes
	 *falls kein Primärschlüssel existieren sollte
	 *wird ein neuer Datensatz erzeugt
	 *andernfalls ein Udate durchgeführt
	*/
	public function save(){
		if(isset($this->$klasse_id)){
				$this->update();
		} else {
				$this->insert();
		}
	}
	
	public function insert(){
		$sql = "INSERT INTO klasse
					   (klasse_id,fach_id)
				VALUES ('','".$this->fach_id."');";
				
		try{
			$success_insert = mysql_query($sql);
			if(!success_insert){
				throw new MysqlException();
			}
			
			$insert_id = mysql_insert_id();
			$this->$klasse_id = $insert_id;
		} catch (MysqlException $e){
				Html::showAll($e);
		  }
	}
	
	public function update(){
		$sql = "UPDATE klasse
				   SET name'".$this->fach_id."'
				 WHERE fach_id".$this->fach.";";
		
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
		$sql = "DELETE FROM klasse
				WHERE klasse_id=".$id.";";
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
		$sql="SELECT klasse_id
				     ,name
				FROM klasse
				WHERE 1=1";
		$sql .=$restriction. ";";
		
		try {
			$result = mysql_query($sql);
		
			if(!result) {
				throw new MysqlException();
			}
			
			$klassen = array();
			while ($row = mysql_fetch_assoc($result)){
				$klassen[$row['klasse_id']]['klasse_id'] = $row['klasse_id'];
				$klassen[$row['klasse_id']]["name"] = $row['name'];
			}
		}
		catch(MysqlException $e){
			Html::showAll($e);
		}
		
		return $klassen;
	}
	public function load($id){
	
		$sql="SELECT *
				FROM klasse
			  	WHERE klasse_id=".$id.";";
		
		try{
			$result = mysql_query ($sql);
			$row = mysql_fetch_assoc($result);
			
			if (empty($row['fach_id'])){
				throw new MysqlException("Datensatz leer: ". $sql);
			}
			
			$this->klasse_id=$row['klasse_id'];
			$this->name=$row['name'];
			
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