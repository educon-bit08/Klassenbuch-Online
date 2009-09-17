<?php

/*
 *  alle Fehler auf Display anzeigen
 */
error_reporting(E_ALL);
ini_set("display_errors", 1);

/*
 * Session immer starten um Userrechte beim Login zu setzen und ab dann immer abrufen zu kšnnen
 */
session_start();


// Konfigurationsdatei
include ('conf/config.kb.php');

// Interfaces
include ('includings/dmlable.php');

// Exceptions
include ('includings/class.mysqlexception.php');

// Klassen zur Entwicklung
include ('includings/class.html.php');

// Backend Klassen
include ('includings/class.db.php');
include ('includings/class.schueler.php');
include ('includings/class.klasse.php');
include ('includings/class.fach.php');
include ('includings/class.rights.php');
include ('includings/class.user.php');
include ('includings/class.lehrer.php');
include ('includings/class.raum.php');
include ('includings/class.block.php');
include ('includings/class.news.php');
include ('includings/class.anwesenheit.php'); 
include ('includings/class.note.php'); 
include ('includings/class.woche.php'); 
include ('includings/class.unterrichtsstunde.php');
include ('includings/class.lehrer_2_klasse.php');
include ('includings/class.excelimporter.php');


// Frontend Klassen
include ('includings/class.htmlklasse.php');
include ('includings/class.htmlfach.php');
include ('includings/class.htmlraum.php');
include ('includings/class.htmllehrer.php');

// Excel Reader fŸr Import
include ('includings/class.oleread.php');
include ('includings/class.spreadsheetexcelreader.php');

// fŸr Weiterleitung relevante Parameter
if (key_exists('what', $_REQUEST)) {
	$what = $_REQUEST['what'];
}
if (key_exists('action', $_REQUEST)) {
	$action = $_REQUEST['action'];
}



// Views
//include ('views/test_schueler.php');
//include ('views/test_l2k.php');



/*
//Informationen fï¿½r das array $_SESSTION beim einloggen
$_SESSION['user']['user_id']    //ID des eingeloggten Users
                 ['vorname']    //Vorname des Schï¿½lers aus der Datenbank
                 ['nachname']   //Nachname des Schï¿½lers aus der Datenbank
                 ['level'];     //Level (Was darf der Schueler sehen?)
*/


// Weiterleitung controller                
if(isset($what)){   
	include 'controller/' .$action. '.php';
} else {
	include 'views/test_us.php'; // Weiterleitung auf Startseite
	//include 'views/test_us.php'; // Weiterleitung auf Startseite
}




?>