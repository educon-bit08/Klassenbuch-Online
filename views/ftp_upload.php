<?php

$ftpID = ftp_connect("ftp.------.de");
$login = ftp_login($ftpID, "------", "-------");
$dateiname = "upload_dir/" . $ordner_id . "_" . $bilder_id . "_" . $_FILES['Datei']['name'];

if (!$ftpID) {die("Verbindung wurde nicht hergestellt.");}
if (!login) {die("Der Loginvorgang ist fehlgeschlagen.");}


        $UploadErgebnis = ftp_put($ftpID, $dateiname, $_FILES['Datei']['tmp_name'], FTP_ASCII);
        if($UploadErgebnis)
        {
            echo"Die Datei wurde hochgeladen!
";
        }
        else
        {
            echo"Die Datei konnte nicht hochgeladen werden.
";
        }
        ftp_quit($ftpID);

?>

<!-- Fehler selbst gefunden. Ich glaub es war "FTP_ASCII", hab es durch "FTP_BINARY" ersetzt. -->
