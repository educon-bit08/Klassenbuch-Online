<?php
/**
 * DML für Basisklassen die auf db.tabellen zugreifen um Persistenz zu bilden 
 *
 */
interface Dmlable {
	
	function insert();
	
	function update();
	
	function load($id);
	
	function delete($id);
	
	/**
	 * gibt alle Datensätze als Array zurück, dessen Elemente Objekte sind
	 *
	 * @param string $restriction Ergänzung der WHERE-claue mittels AND
	 * @example $restriction = " AND id > 22 "  
	 */
	function getAllAsArray($restriction = '');
	
}

?>