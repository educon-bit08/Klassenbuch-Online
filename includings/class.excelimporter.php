<?php

/*
 * Klasse zum Importieren von Exceldateien, die wohlgeformt sind:
 * nur bekannte Klassen, RŠume, Lehrer, FŠcher werden importiert
 * die Dten mŸssen in der Zukunft liegen
 * das Format ist vom bisherigen System vorgegeben
 */

class ExcelImporter {
	
	private $klassen = array ();
	
	private $blocks = array ();
	
	private $unterrichtsStunden = array ();
	
	private $lehrers = array ();
	
	private $raums = array ();
	
	private $data;
	
	private $klasse;
	
	private $user_info = array ();
	
	public function __construct($path) {
		
		// Excelfile lesen
		$this->data = new SpreadsheetExcelReader ( );
		$this->data->read ( $path );
		
		// Basisklassen zum †berprŸfen/Zuordnen der Daten im Excelsheet
		$k = new Klasse ( );
		$this->klassen = $k->getAllAsObject ();
		$b = new Block ( );
		$this->blocks = $b->getAllAsObject ();
		$l = new Lehrer ( );
		$this->lehrers = $l->getAllAsObject ();
		$r = new Raum ( );
		$this->raums = $r->getAllAsObject ();
	
	}
	
	public function saveFileToDb() {
		$this->parseFile ();
	
	}
	
	private function parseFile() {
		
		/**
		 * $cells [zeile] [spalte]
		 * mit zeile von 1, 2 ...wie in Excel
		 * mit spalte von 1, 2 ... als A, B, ... in Excel
		 * Beisp.: $cells [4][1] meint Excelfeld A4
		 */
		$cells = array ();
		$numRows = $this->data->sheets [0] ['numRows'];
		$numCols = $this->data->sheets [0] ['numCols'];
		for($i = 1; $i < $numRows + 1; $i ++) {
			for($j = 1; $j < $numCols + 1; $j ++) {
				
				$cells [$i] [$j] = $this->data->sheets [0] ['cells'] [$i] [$j];
			
			}
		}

		// Klassennamen ermitteln und checken
		$klassenname = $cells [4] [1];
		
		$k = new Klasse ( );
		try {
			if ($klasse = $k->getKlasseToName ( $klassenname )) {
				HTML::showAll ( $klasse );
			} else {
				throw new UserInformException ( 'Klassenname ' . $klassenname . ' unbekannt' );
			}
		
		} catch ( UserInformException $e ) {
			
			include ('views/showuserinfo.php');
		}
		
		// Blockzeiten ermitteln und checken
		$blockExcel = array ();
		$blockRow = 4;
		while ( TRUE ) {
			
			// Zeile ausserhalb von Daten des Spreadsheets
			if ($blockRow > $numRows) {
				break;
			}
			
			$excelInfo = $cells [$blockRow] [2];
			
			// keine Info wenn Uhrzeit fŸr Block nicht angegeben
			if ($excelInfo == 0) {
				break;
			}
			
			$blockExcel [] = $excelInfo;
			$blockRow = $blockRow + 4;
		}
		// Zeit in MySQL-Format 
		foreach ( $blockExcel as $key => $times ) {
			$time_arr = explode ( '-', $times );
			$begin = $time_arr [0];
			$end = $time_arr [1];
			$begin_formatted = $this->formatToMysql ( $begin );
			$end_formatted = $this->formatToMysql ( $end );
			$blockExcel [$key] = $begin_formatted . '-' . $end_formatted;
		}

		// Zuordnung Block_id Zeile
		$blockIdZeile = array ();
		foreach ( $blockExcel as $excelId => $excelTimeSlot ) {
			$success_blockfind = FALSE;
			$blockExcelBegin = substr ( $excelTimeSlot, 0, 8 );
			$blockExcelEnd = substr ( $excelTimeSlot, 9 );
			try {
				foreach($this->blocks as $block_id => $block) 
				{
					if ((strcmp ( $block->getVon(), $blockExcelBegin ) === 0) && (strcmp ( $block->getBis(), $blockExcelEnd ) === 0)) {
						$blockIdZeile [$block->getId ()] = 4 + (4 * $excelId);
						$success_blockfind = TRUE;
					}
				}
				if ($success_blockfind == FALSE) {
					throw new UserInformException ( ' Unterrichtsblock in der Zeit ' . $blockExcel . ' ist nicht im Programm bekannt.' );
				}
			} catch ( UserInformException $e ) {
				include ('views/showuserinfo.php');
			}
		}

		// jede Spalte einlesen
		for ($i = 3; $i < $numCols + 1; $i++ ){
			// Datum ermitteln
			$datum = $cells[2][$i];
			// Monatskürzel aus dem String auslesen
			$monatname = explode(' ', $datum);
			// Begrenzung des Monatskürzels auf 3 Stellen
			$monatstr = substr($monatname[1], 0, 3);
			// Monatskürzel in Monatzahl umwandeln
			$monat = array ();
			$monat['Jan']= '01';
			$monat['Feb']= '02';
			$monat['Mrz']= '03';
			$monat['Apr']= '04';
			$monat['Mai']= '05';
			$monat['Jun']= '06';
			$monat['Jul']= '07';
			$monat['Aug']= '08';
			$monat['Sep']= '09';
			$monat['Okt']= '10';
			$monat['Nov']= '11';
			$monat['Dez']= '12';
			foreach ($monat as $shrt => $nr){
				if ($shrt == $monatstr){
					$month = $nr;
				echo '2009-' . $month . '-' . $monatname[0] . '<br>';
				}
			}
	
		}

	}
	
	/**
	 * ŸberfŸhrt Zeit vom 
	 * Format x:00 in das Format 0x:00:00
	 */
	private function formatToMysql($time) {
		$time_arr = explode ( ':', $time );
		$time_arr [0] = sprintf ( "%02d", $time_arr [0] );
		array_push ( $time_arr, "00" );
		$timeFormatted = implode ( ':', $time_arr );
		return $timeFormatted;
	}
}

?>