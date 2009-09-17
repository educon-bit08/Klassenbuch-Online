<?php

switch ($what) {
	
	case 'registeruser' :
		
		$k = new Klasse ( );
		$ks = $k->getAllAsArray ();
		$htmlk = new HtmlKlasse ( $ks );
		$klasse_selection_output = $htmlk->getPullDown ( 'klasse_id[]' );
		
		// Eingabevariablen mit Leerstrings belegen
		if (! isset ( $typ )) {
			$typ = '';
		}
		if (! isset ( $klasse )) {
			$klasse = '';
		}
		if (! isset ( $vname )) {
			$vname = '';
		}
		if (! isset ( $nname )) {
			$nname = '';
		}
		if (! isset ( $nick )) {
			$nick = '';
		}
		if (! isset ( $day )) {
			$day = '';
		}
		if (! isset ( $month )) {
			$month = '';
		}
		if (! isset ( $year )) {
			$year = '';
		}
		if (! isset ( $mail )) {
			$mail = '';
		}
		if (! isset ( $pw1 )) {
			$pw1 = '';
		}
		if (! isset ( $pw2 )) {
			$pw2 = '';
		}
		
		include 'views/' . $action . $what . '.php';
		break;
	
	case 'registerklasse' :
		
		$k = new Klasse ( );
		$klassens = $k->getAllAsArray ( ' AND aktiv=TRUE ' );
		$htmlk = new HtmlKlasse ( $klassens );
		
		$klassen_inaktivs = $k->getAllAsArray ( ' AND aktiv="FALSE" ' );
		$htmlk_inaktiv = new HtmlKlasse ( $klassen_inaktivs );
		
		include 'views/' . $action . $what . '.php';
		break;
	
	case 'fach' :
		
		$f = new Fach ( );
        $fachs = $f->getAllAsArray ( ' AND aktiv=TRUE ' );
		$htmlf = new HtmlFach ( $fachs );
		
		$fach_inaktivs = $f->getAllAsArray ( ' AND aktiv="FALSE" ' );
		$htmlf_inaktiv = new HtmlFach ( $fach_inaktivs );
		
		include 'views/' . $action . $what . '.php';
		break;

	case 'raum' :

		$r = new Raum ( );
        $raums = $r->getAllAsArray ( ' AND aktiv=TRUE ' );
		$htmlr = new HtmlRaum ( $raums );

		$raum_inaktivs = $r->getAllAsArray ( ' AND aktiv="FALSE" ' );
		$htmlr_inaktiv = new HtmlRaum ( $raum_inaktivs );

		include 'views/' . $action . $what . '.php';
		break;
		
		
	case 'news' :
		
		$n = new News();
		$n->loadLastNews();
		
		include 'views/' . $action . $what . '.php';
		break;
	
	case 'createnews' :
		include 'views/' . $action . $what . '.php';
		break;
	
	case 'createwochenplan' :
		include 'views/' . $action . $what . '.php';
		break;
	
	case 'fach' :
		include 'views/' . $action . $what . '.php';
		break;

	case 'raum' :
		include 'views/' . $action . $what . '.php';
		break;

	case 'edituser' :
		include 'views/' . $action . $what . '.php';
		break;

	case 'user' :
		include 'views/' . $action . $what . '.php';
		break;
			
	case 'stundenplan' :
		include 'views/' . $action . $what . '.php';
		break;
		
	case 'uploadexcel' :
		include 'views/' . $action . $what . '.php';
		break;
	
	case 'show' :
		include 'views/' . $action . $what . '.php';
		break;
	
	default :
		;
		break;
}

?>