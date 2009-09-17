<?php
/*
 *  alle Fehler auf Display anzeigen
 */
error_reporting ( E_ALL );
ini_set ( "display_errors", 1 );

define ( 'DB_SERVER', "localhost" );
define ( 'DB_USER', "root" );
define ( 'DB_PASSWD', "root" );
define ( 'DB_NAME', "klabu" );

// Attempt connection
try {
	// Create connection to MYSQL database
	// Fourth true parameter will allow for multiple connections to be made
	$db_connection = mysql_connect ( '127.0.0.1:4850', 'root', 'root' );
	mysql_select_db ( DB_NAME );
	if (! $db_connection) {
		throw new Exception ( 'MySQL Connection Database Error: ' . mysql_error () );
	} else {
		$CONNECTED = true;
	}
} catch ( Exception $e ) {
	echo $e->getMessage ();
}
$success_select = mysql_select_db ( 'test' );
echo $db_connection;
echo '<br>';
echo '=>'.$success_select.'<=';
echo '<br>';
echo '<br>fertig';
?>