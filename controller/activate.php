<?php

switch ($what) {
	
	case 'klasse' :
		
		if (key_exists ( 'update', $_POST )) {
			// alle aktiven updaten
			foreach ( $_POST as $key => $value ) {
				if (substr ( $key, 0, 6 ) == 'klasse') {
					$klasse_id = substr ( $key, 6 );
					$k = new Klasse ( );
					$k->load ( $klasse_id );
					$k->setName ( $_POST [$key] );
					$k->save ();
				}
			
			}
		} else {
			
			// aus †bergabevariablen zu deaktivierende klasse_id bestimmen
			foreach ( $_POST as $key => $value ) {
				if (substr ( $key, 0, 7 ) === 'deaktiv') {
					$klasse_id = substr ( $key, 7 );
				}
			}
			
			$k = new Klasse ( );
			$k->load ( $klasse_id );
			$k->setAktiv ( "TRUE" );
			$k->save ();
		}
		
		$action = 'show';
		$what = 'registerklasse';
		include 'controller/show.php';
		
		break;
	
	case 'fach' :
		
		if (key_exists ( 'update', $_POST )) {
			// alle aktiven updaten
			foreach ( $_POST as $key => $value ) {
				if (substr ( $key, 0, 4 ) == 'fach') {
					$fach_id = substr ( $key, 4 );
					$f = new Fach ( );
					$f->load ( $fach_id );
					$f->setName ( $_POST [$key] );
					$f->save ();
				}
			
			}
		} else {
			
			// aus †bergabevariablen zu deaktivierende klasse_id bestimmen
			foreach ( $_POST as $key => $value ) {
				if (substr ( $key, 0, 7 ) === 'deaktiv') {
					$fach_id = substr ( $key, 7 );
				}
			}
			
			$f = new Fach ( );
			$f->load ( $fach_id );
			$f->setAktiv ( "TRUE" );
			$f->save ();
		}
		
		$action = 'show';
		$what = 'fach';
		include 'controller/show.php';
		
		break;
	
	case 'raum' :
		
		if (key_exists ( 'update', $_POST )) {
			// alle aktiven updaten
			foreach ( $_POST as $key => $value ) {
				if (substr ( $key, 0, 4 ) == 'raum') {
					$raum_id = substr ( $key, 4 );
					$r = new Raum ( );
					$r->load ( $raum_id );
					$r->setName ( $_POST [$key] );
					$r->save ();
				}
			
			}
		} else {
			
			// aus †bergabevariablen zu deaktivierende klasse_id bestimmen
			foreach ( $_POST as $key => $value ) {
				if (substr ( $key, 0, 7 ) === 'deaktiv') {
					$raum_id = substr ( $key, 7 );
				}
			}
			
			$f = new Raum ( );
			$f->load ( $raum_id );
			$f->setAktiv ( "TRUE" );
			$f->save ();
		}
		
		$action = 'show';
		$what = 'raum';
		include 'controller/show.php';
		
		break;
	
	default :
		;
		break;
}

?>