<?php

/**********************Include-Files***********************/
/**/   include ('../includings/dmlable.php');              /**/
/**/   include ('../includings/class.mysqlexception.php'); /**/
/**/   include ('../conf/config.kb.php');                  /**/
/**/   include ('../includings/class.rights.php');         /**/
/**/   include ('../includings/class.db.php');             /**/
/**/   include ('../includings/class.html.php');           /**/
/**/   include ('../includings/class.klasse.php');         /**/
/**/   include ('../includings/class.fach.php');           /**/
/**/   include ('../includings/class.raume.php');          /**/
/**/   include ('../includings/class.schueler.php');       /**/
/**/   include ('../includings/class.stundenplan.php');    /**/
/**/   include ('../includings/class.htmlklasse.php');     /**/
/**/   include ('../includings/class.user.php');           /**/
/**********************************************************/

$typ = $_POST['typ_input_reg'];
$klasse = $_POST['klasse_id'];
$vname = $_POST['vname_input_reg'];
$nname =  $_POST['nname_input_reg'];
$nick = $_POST['nick_input_reg'];
$day = $_POST['tag_input_reg'];
$month = $_POST['monat_input_reg'];
$year = $_POST['jahr_input_reg'];
$mail = $_POST['mail_input_reg'];
$pw1 = $_POST['pw1_input_reg'];
$pw2 = $_POST['pw2_input_reg'];
$pwcomplete = '';
$status = true;

//Korrekte Zusammensetzung des Geburtsdatums fuer die DB.

if ($day < 10) {                                                                //Wenn die Zahl kleiner als 10 ist soll
                                                                                //eine 0 vor die eigentliche Zahl gesetzt
    $day = "0".$day;                                                            //werden.

}

if ($month < 10) {

    $month = "0".$month;

}

$bday = $year . '-' . $month . '-' . $day;


//Überpruefung ob $typ und $klasse zusammenpassen.

if($typ == "1" and strlen($klasse[1]) >= 1) {

    echo "<h4 style='color:red;'>Der Sch&uuml;ler darf nur eine Klasse ausw&auml;hlen!</h4>";
    echo "<meta http-equiv='refresh' content='5; ../index.php'>";
    echo "<h4>Sie werden in wenigen Sekunden weitergeleitet. Wenn nicht klicken Sie bitte auf <a href='../index.php'>weiter</a>!</h4>";

}

else {

    //Überprüfung ob alles eingegeben wurde.

    if(strlen($vname) == 0 or strlen($nname) == 0 or strlen($klasse) == 0 or strlen($nick) == 0 or strlen($mail) == 0 or strlen($pw1) == 0 or strlen($pw2) == 0) {

        //Fehlermeldung wenn nicht alle Felder ausgefüllt wurden.
        echo "<h4 style='color:red;'>Sie haben nicht alle Felder ausgef&uuml;llt!</h4>";
        echo "<meta http-equiv='refresh' content='5; ../index.php'>";
        echo "<h4>Sie werden in wenigen Sekunden weitergeleitet. Wenn nicht klicken Sie bitte auf <a href='../index.php'>weiter</a>!</h4>";

    }

    else {

        //Pr�fung ob zwei mal das selbe PW eingegeben wurde.
        if ($pw1 == $pw2) {

            $pwcomplete = $pw1;

            /*echo "Typ: "; echo $typ; echo "<br>";
            echo "Klassen: "; echo "<pre>"; echo print_r ($klasse); echo "</pre>";
            echo "Vorname: "; echo $vname; echo "<br>";
            echo "Nachname: "; echo $nname; echo "<br>";
            echo "Nickname: "; echo $nick; echo "<br>";
            echo "Geburtstag: "; echo $bday; echo "<br>";
            echo "E-Mail: "; echo $mail; echo "<br>";
            echo "Passwort: "; echo $pwcomplete; echo "<br>";
            echo "Status: "; echo $status; echo "<br>";*/

            $u = new User();
            $u -> setLogin($nick);
            $u -> setPasswd($pwcomplete);
            $u -> setAktiv(TRUE);
            $u -> setEmail($mail);
            $u -> setGeburtstag($bday);
            $u -> save();

            if ($typ == 1) {
                //Schueler

                $s = new Schueler();
                $s -> setVorname($vname);
                $s -> setNachname($nname);
                $s -> setKlasse_id($klasse[0]);
                $s -> setUser_id($u -> getId());
                $s -> setAktiv(TRUE);
                $s -> save();

            } elseif ($typ == 2) {
                //Lehrer

                $l = new Lehrer();
                $l -> setVorname($vname);
                $l -> setNachname($nname);
                $l -> setKlasse_id($klasse);
                $l -> setUser_id($u -> getId());
                $l -> setAktiv(TRUE);
                $l -> save();
            }


     

        }
        //Fehlermeldung wenn nicht zwei gleiche PW's eingegeben wurden.
        else {

            echo "<h4 style='color:red;'>Sie haben nicht zweimal das selbe Passwort eingegeben!</h4>";
            echo "<meta http-equiv='refresh' content='5; ../index.php'>";
            echo "<h4>Sie werden in wenigen Sekunden weitergeleitet. Wenn nicht klicken Sie bitte auf <a href='../index.php'>weiter</a>!</h4>";

        }

    }
}


/*Folgende �bertragungen muessen zur Tabelle User stattfinden.
 * 
 *      $nick -> login
 *      $pwcomplete -> passwd
 *      $typ -> typ
 *      
 */

?>