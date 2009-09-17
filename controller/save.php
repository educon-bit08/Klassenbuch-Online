<?php

switch ($what) {
	
	case 'registeruser' :
		
		$typ = $_POST ['typ_input_reg'];
		if (key_exists ( 'klasse_id', $_POST )) {
			$klasse = $_POST ['klasse_id'];
		}
		
		$vname = $_POST ['vname_input_reg'];
		$nname = $_POST ['nname_input_reg'];
		$nick = $_POST ['nick_input_reg'];
		$day = $_POST ['tag_input_reg'];
		$month = $_POST ['monat_input_reg'];
		$year = $_POST ['jahr_input_reg'];
		$mail = $_POST ['mail_input_reg'];
		$pw1 = $_POST ['pw1_input_reg'];
		$pw2 = $_POST ['pw2_input_reg'];
		$pwcomplete = '';
		$status = true;
		
		// Korrekte Zusammensetzung des Geburtsdatums fuer die DB.
		$bday = Html::buildMysqlDate ( $day, $month, $year );
		
		// Fehleingaben anzeigen
		$user_infos = array ();
		
		// Ãœberpruefung ob $typ und $klasse zusammenpassen.
		if ($typ == "1" && isset ( $klasse ) && key_exists ( 1, $klasse )) {
			$user_infos [] = "<h4 style='color:red;'>Der Sch&uuml;ler darf nur eine Klasse ausw&auml;hlen!</h4>";
		}
		
		/*	ZUM TESTEN
		$dummya = (strlen ( $vname ) == 0);
		$dummyb = (strlen ( $nname ) == 0).'<br>';
		$dummyc = (!isset($klasse));
		$dummyd = (strlen ( $nick ) == 0);
		$dummye = (strlen ( $mail ) == 0);
		$dummyf = (strlen ( $pw1 ) == 0);
		$dummyg = (strlen ( $pw2 ) == 0);
		
		echo $dummya.'<br>';
		echo $dummyb.'<br>';
		echo $dummyc.'<br>';
		echo $dummyd.'<br>';
		echo $dummye.'<br>';
		echo $dummyf.'<br>';
		echo $dummyg.'<br>';
		*/
		
		// bei Schuelern ist die Zuordnung zu einer Schulklasse, zwingend nštig
		// bei Lehrern bedeutet die Zuordnung zu einer Klasse, dass er dort Fachleiter ist
		if ($typ == '1' && ! isset ( $klasse )) {
			$klasse_zulaessige_eingabe = FALSE;
		} else {
			$klasse_zulaessige_eingabe = TRUE;
		}
		
		// ÃœberprÃ¼fung ob alles eingegeben wurde.
		if (strlen ( $vname ) == 0 or strlen ( $nname ) == 0 or $klasse_zulaessige_eingabe == FALSE or strlen ( $nick ) == 0 or strlen ( $mail ) == 0 or strlen ( $pw1 ) == 0 or strlen ( $pw2 ) == 0) {
			$user_infos [] = "<h4 style='color:red;'>Sie haben nicht alle Felder ausgef&uuml;llt!</h4>";
		}
		
		// Prüfung ob zwei mal das selbe PW eingegeben wurde.
		if ($pw1 !== $pw2) {
			"<h4 style='color:red;'>Sie haben nicht zweimal das selbe Passwort eingegeben!</h4>";
		}
		
		// speichern bei korrekter Eingabe
		if (count ( $user_infos ) == 0) {
			
			$u = new User ( );
			$u->setLogin ( $nick );
			$u->setPasswd ( $pw1 );
			$u->setAktiv ( TRUE );
			$u->setEmail ( $mail );
			$u->setGeburtstag ( $bday );
			$u->save ();
			
			if ($typ == 1) {
				//Schueler
				

				$s = new Schueler ( );
				$s->setVorname ( $vname );
				$s->setNachname ( $nname );
				$s->setKlasse_id ( $klasse [0] );
				$s->setUser_id ( $u->getId () );
				$s->setAktiv ( TRUE );
				$s->save ();
			
			} elseif ($typ == 2) {
				//Lehrer
				

				$l = new Lehrer ( );
				$l->setVorname ( $vname );
				$l->setNachname ( $nname );
				$l->setKlasse_ids ( $klasse );
				$l->setUser_id ( $u->getId () );
				$l->setAktiv ( TRUE );
				$l->save ();
			}
			$user_infos [] = $vname . ' ' . $nname . ' erfolgreich registriert';
		}
		
		$action = 'show';
		$what = 'registeruser';
		include 'controller/show.php';
		
		break;
	
	case 'klasse' :
		
		$klasse = $_POST ['klasse'];
		$k = new Klasse ( );
		$k->setName ( $klasse );
		$k->setAktiv ( TRUE );
		$k->save ();
		
		$action = 'show';
		$what = 'registerklasse';
		include 'controller/show.php';
		
		break;
	
	case 'news' :
		
		$title = $_POST ['new_news_title'];
		$text = $_POST ['new_news_create'];
		
		$n = new News ( );
		$n->setTitle ( $title );
		$n->setTextfield ( $text );
		$n->save ();
		
		$action = 'show';
		$what = 'news';
		include 'controller/show.php';
		
		break;
	
	case 'wochenplan' :
		
		// Varsempfang
		$klasse_id = $_POST ['klasse_id'];
		$von = $_POST ['von'];
		$bis = $_POST ['bis'];
		
		$u_stundens = array ();
		$montag = array ();
		$dienstag = array ();
		$mittwoch = array ();
		$donnerstag = array ();
		$freitag = array ();
		$samstag = array ();
		
		for($wotag = 1; $wotag < WEEKDAYS + 1; $wotag ++) {
			for($block = 1; $block < BLOCKANZAHL + 1; $block ++) {
				
				$var_fach = $klasse_id . '_' . $wotag . '_' . $block . '_fach_id';
				$var_lehrer = $klasse_id . '_' . $wotag . '_' . $block . '_lehrer_id';
				$var_raum = $klasse_id . '_' . $wotag . '_' . $block . '_raum_id';
				
				// Aufteilen der Vars nach Wochentagen und Block
				switch ($wotag) {
					case 1 :
						
						$montag [$block] ['fach_id'] = $_POST [$var_fach];
						$montag [$block] ['lehrer_id'] = $_POST [$var_lehrer];
						$montag [$block] ['raum_id'] = $_POST [$var_raum];
						
						break;
					
					case 2 :
						
						$dienstag [$block] ['fach_id'] = $_POST [$var_fach];
						$dienstag [$block] ['lehrer_id'] = $_POST [$var_lehrer];
						$dienstag [$block] ['raum_id'] = $_POST [$var_raum];
						
						break;
					
					case 3 :
						
						$mittwoch [$block] ['fach_id'] = $_POST [$var_fach];
						$mittwoch [$block] ['lehrer_id'] = $_POST [$var_lehrer];
						$mittwoch [$block] ['raum_id'] = $_POST [$var_raum];
						
						break;
					
					case 4 :
						
						$donnerstag [$block] ['fach_id'] = $_POST [$var_fach];
						$donnerstag [$block] ['lehrer_id'] = $_POST [$var_lehrer];
						$donnerstag [$block] ['raum_id'] = $_POST [$var_raum];
						
						break;
					
					case 5 :
						
						$freitag [$block] ['fach_id'] = $_POST [$var_fach];
						$freitag [$block] ['lehrer_id'] = $_POST [$var_lehrer];
						$freitag [$block] ['raum_id'] = $_POST [$var_raum];
						
						break;
					
					case 6 :
						
						$samstag [$block] ['fach_id'] = $_POST [$var_fach];
						$samstag [$block] ['lehrer_id'] = $_POST [$var_lehrer];
						$samstag [$block] ['raum_id'] = $_POST [$var_raum];
						
						break;
					default :
						;
						break;
				}
			
			}
		}
		
		// nur zukŸnftige Planung speichern
		

		// Array mit allen Tagen zw. von iund bis
		$tage = array ();
		$beginn = mktime ( 0, 0, 0, ( int ) substr ( $von, 3, 2 ), ( int ) substr ( $von, 0, 2 ), ( int ) substr ( $von, 6, 4 ) );
		
		$end = mktime ( 0, 0, 0, ( int ) substr ( $bis, 3, 2 ), ( int ) substr ( $bis, 0, 2 ), ( int ) substr ( $bis, 6, 4 ) );
		
		$tags = array ();
		$tag = $beginn;
		while ( $end >= $tag ) {
			// nur zukŸnftige Datum
			if ($tag >= time ()) {
				$tags [] = $tag;
			}
			$tag += 60 * 60 * 24;
			//echo date('Y-m-d', $tag);
		}
		
		foreach ( $tags as $datum ) {
			
			switch (date ( 'N', $datum )) {
				
				case 1 :
					//echo 'Montag';
					

					$us = new UnterrichtsStunde ( );
					$us->setDatum ( date ( 'Y-m-d', $datum ) );
					$us->setKlasse_id ( $klasse_id );
					foreach ( $montag as $block_id => $block ) {
						$us->setBlock_id ( $block_id );
						$us->setFach_id ( $block ['fach_id'] );
						$us->setLehrer_id ( $block ['lehrer_id'] );
						$us->setRaum_id ( $block ['raum_id'] );
						$us->save ();
					}
					
					break;
				
				case 2 :
					//echo 'Dienstag';
					

					$us = new UnterrichtsStunde ( );
					$us->setDatum ( date ( 'Y-m-d', $datum ) );
					$us->setKlasse_id ( $klasse_id );
					foreach ( $dienstag as $block_id => $block ) {
						$us->setBlock_id ( $block_id );
						$us->setFach_id ( $block ['fach_id'] );
						$us->setLehrer_id ( $block ['lehrer_id'] );
						$us->setRaum_id ( $block ['raum_id'] );
						$us->save ();
					}
					
					break;
				
				case 3 :
					//echo 'Mittwoch';
					

					$us = new UnterrichtsStunde ( );
					$us->setDatum ( date ( 'Y-m-d', $datum ) );
					$us->setKlasse_id ( $klasse_id );
					foreach ( $mittwoch as $block_id => $block ) {
						$us->setBlock_id ( $block_id );
						$us->setFach_id ( $block ['fach_id'] );
						$us->setLehrer_id ( $block ['lehrer_id'] );
						$us->setRaum_id ( $block ['raum_id'] );
						$us->save ();
					}
					
					break;
				
				case 4 :
					//echo 'Donnerstag';
					

					$us = new UnterrichtsStunde ( );
					$us->setDatum ( date ( 'Y-m-d', $datum ) );
					$us->setKlasse_id ( $klasse_id );
					foreach ( $donnerstag as $block_id => $block ) {
						$us->setBlock_id ( $block_id );
						$us->setFach_id ( $block ['fach_id'] );
						$us->setLehrer_id ( $block ['lehrer_id'] );
						$us->setRaum_id ( $block ['raum_id'] );
						$us->save ();
					}
					
					break;
				
				case 5 :
					//echo 'Freitag';
					

					$us = new UnterrichtsStunde ( );
					$us->setDatum ( date ( 'Y-m-d', $datum ) );
					$us->setKlasse_id ( $klasse_id );
					foreach ( $freitag as $block_id => $block ) {
						$us->setBlock_id ( $block_id );
						$us->setFach_id ( $block ['fach_id'] );
						$us->setLehrer_id ( $block ['lehrer_id'] );
						$us->setRaum_id ( $block ['raum_id'] );
						$us->save ();
					}
					
					break;
				
				case 6 :
					//echo 'Samstag';
					

					$us = new UnterrichtsStunde ( );
					$us->setDatum ( date ( 'Y-m-d', $datum ) );
					$us->setKlasse_id ( $klasse_id );
					foreach ( $samstag as $block_id => $block ) {
						$us->setBlock_id ( $block_id );
						$us->setFach_id ( $block ['fach_id'] );
						$us->setLehrer_id ( $block ['lehrer_id'] );
						$us->setRaum_id ( $block ['raum_id'] );
						$us->save ();
					}
					
					break;
				
				default :
					;
					break;
			}
		
		}
		
		$action = 'show';
		$what = 'createwochenplan';
		include 'controller/show.php';
		
		break;
	
	case 'excelfile' :
		
		// Declare variables
		// Get the basic file information
		$userfile = $_FILES ['userfile'] ['name'];
		$file_size = $_FILES ['userfile'] ['size'];
		$file_temp = $_FILES ['userfile'] ['tmp_name'];
		$file_err = $_FILES ['userfile'] ['error'];
		$path = 'excel/';
		
		// Get the file type
		// Using $_FILES to get the file type is sometimes inaccurate, so we are going
		// to get the extension ourselves from the name of the file
		// This also eliminates having to worry about the MIME type
		$file_type = $userfile;
		$file_type_length = strlen ( $file_type ) - 3;
		$file_type = substr ( $file_type, $file_type_length );
		
		if (! empty ( $userfile )) {
			echo '<div style="font-weight: bold; padding: 6px;">File Uploaded  Information</div>
        <ul>
        <li>Original File Name: ' . $userfile . '</li>
        <li>New File Name: ' . $userfile . '</li>
        <li>File Type: ' . $file_type . '</li>
        <li>File Size: ' . $file_size . '</li>
        <li>File Temporary Name: ' . $file_temp . '</li>
        <li>Fille Error: ' . $file_err . '</li>
        </ul>';
			
			// limit the size of the file to 2MB
			if ($file_size > 256000) {
				echo 'FILE SIZE TO LARGE<BR />';
				exit ();
			}
			
			// Set allowed file types
			// Set case of all letters to lower case
			$file_type = strtolower ( $file_type );
			$files = array ();
			$files [] = 'xls';
			// Search the array for the allowed file typ
			if (in_array ( $file_type, $files )) {
				echo '<b>File allowed!</b><br />';
			} else {
				echo '<b>ILLEGAL FILE TYPE</b><br />';
				exit ();
			}
			
			// Check for errors and upload the file
			$error_count = count ( $file_error );
			if ($error_count > 0) {
				for($i = 0; $i <= $error_count; ++ $i) {
					echo $_FILES ['userfile'] ['error'] [$i];
				}
			} else {
				if (move_uploaded_file ( $file_temp, 'excel/' . $file_name . '' )) {
					echo '<h3>Upload Successful!</h3>';
				} else {
					echo '<h3>ERROR</h3>';
				}
			}
		
		} else {
			echo '<h3>No file has been selected.</h3>';
		}
		
		$action = 'show';
		$what = 'raum';
		include 'controller/show.php';
		
		break;
	
	case 'raum' :
		
		$raum = $_POST ['raum'];
		$r = new Raum ( );
		$r->setName ( $raum );
		$r->setAktiv ( TRUE );
		$r->save ();
		
		$action = 'show';
		$what = 'raum';
		include 'controller/show.php';
		
		break;
	
	case 'fach' :
		
		$fach = $_POST ['fach'];
		$f = new Fach ( );
		$f->setName ( $fach );
		$f->setAktiv ( TRUE );
		$f->save ();
		
		$action = 'show';
		$what = 'fach';
		include 'controller/show.php';
		
		break;
	
	default :
		;
		break;
}

?>