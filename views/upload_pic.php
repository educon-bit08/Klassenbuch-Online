<?php

// Serverdaten
$ftp_server = "p106991.typo3server.info";
$benutzername = "p106991f1";
$passwort = "schueler";

// Die Verbindung herstellen
$connection_id = ftp_connect($ftp_server);

// Mit Benutzername und Kennwort anmelden
$login_result = ftp_login($connection_id, $benutzername, $passwort);

// Ueberpruefen ob alles gutgegangen ist
if ((!$connection_id) || (!$login_result)) {
    echo "<H1>Ftp-Verbindung nicht hergestellt!<H1>";
    echo "<P>Verbindung mit ftp_server als Benutzer $benutzername nicht möglich!</P>";
    die;
} else {
    //echo "<P>Verbunden mit ftp_server als Benutzer $benutzername</P>";
}

/*/*user_id holen
   
$u = new User();*/
$user_id = 'user1' /*$u -> getId()*/;

   //Script zum hochladen eines Bildes

    $dateityp = GetImageSize($_FILES['datei']['tmp_name']);
    if($dateityp[2] != 0)
    {

        if($_FILES['datei']['size'] <  102400)
        {
            move_uploaded_file($_FILES ['datei']['tmp_name'], "/home/www/p106991/html/klassenbuch/info/userpics/img_" . $user_id . ".jpg");
            echo "<h4>Das Bild wurde Erfolgreich hochgeladen.</h4>";
        }

        else
        {
            echo "<h4 style='color:red;'>Das Bild darf nicht gr&ouml;&szlig;er als 100 kb sein!</h4>";
        }

    }

    else
    {
        echo "<h4 style='color:red;'>Bitte nur Bilder im jpg Format hochladen!</h4>";
    }

    // Schlieszen der Verbindung
    ftp_quit($connection_id);

echo "<h4>Sie werden in wenigen Sekunden weitergeleitet. Wenn nicht klicken Sie bitte auf <a href='profil_edit.php'>weiter</a>!</h4>"
    ?>
    <meta http-equiv="refresh" content="6; profil_edit.php">