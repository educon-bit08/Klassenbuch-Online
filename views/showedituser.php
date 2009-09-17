<?php

$user_id = '3';

$u = new User();
$u -> load($user_id);

$rolle = $u -> getRole();
//html::showAll($rolle);

$vname = $rolle -> getVorname();
$nname = $rolle -> getNachname();
$geburtstag_db = $u -> getGeburtstag();
$nick = $u -> getLogin();
$email = $u -> getEmail();
$beschreibung = $rolle -> getBeschreibung();
$klasse_id = $rolle -> getKlasse_Id();

$k = new Klasse();
$k -> load($klasse_id);
$klasse = $k -> getName();

//Umwandlung der DB-Schreibweise in die EU-Schreibweise
$geburtstag = html::buildDateFromMysql($geburtstag_db);

//Errechung des Alters
$alter = html::buildDateToAge($geburtstag);

?>

<html>
<head>
<title>Profil &auml;ndern</title>
</head>
<body>
	<form method="post" action="index.phpaction=save&what=edituser">
    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
    <h2>Profil &auml;ndern</h2>
	<table border="0" height="350" width="500">
		<!-- 1.Tabellenreihe mit dem User-Avatar & Vornamenseingabe-->
		<tr height="25">
			<td rowspan="6"><img src='\user_pictures\img_<?php echo $user_id ?>.jpg' width="100" height="130"></td>
			<td align="right">Vorname:</td>
			<td><input type="text" value="<?php echo $vname ?>" name="vname" maxlength="45" size="30" style="background-color:white;color:black;" disabled></td>
		</tr>
		<!-- 2.Tabellenreihe fuer die Nachnameneingabe-->
		<tr height="25">
			<td align="right">Nachname:</td>
			<td><input type="text" value="<?php echo $nname ?>" name="nname" maxlength="45" size="30" style="background-color:white;color:black;" disabled></td>
		</tr>
		<!-- 3.Tabellenreihe fuer die Alterseingabe-->
		<tr height="25">
			<td align="right">Alter:</td>
			<td><input type="text" value="<?php echo $alter ?>" name="age" maxlength="45" size="30" style="background-color:white;color:black;" disabled></td>
		</tr>
		<!-- 4.Tabellenreihe fuer die Nickname-->
		<tr height="25">
			<td align="right">Nickname:</td>
			<td><input type="text" value="<?php echo $nick ?>" name="nick" maxlength="45" size="30"></td>
		</tr>
        <!-- 5.Tabellenreihe fuer die E-Mail-->
		<tr height="25">
			<td align="right">E-Mail:</td>
			<td><input type="text" value="<?php echo $email ?>" name="mail" maxlength="45" size="30"></td>
		</tr>
        <!-- 6.Tabellenreihe fuer die Klasse-->
		<tr height="25">
			<td align="right">Klasse:</td>
			<td><input type="text" value="<?php echo $klasse ?>" name="klasse" maxlength="45" size="30" style="background-color:white;color:black;" disabled></td>
		</tr>
		<!-- 6.Tabellenreihe Eingeabefeld "hochladen-button" ist-->
		<tr height="25">
			<td colspan="3"><form action="upload_pic.php" method="post" enctype="multipart/form-data">
                            <input type="file" name="datei"><br>
                            <input type="submit" value="Hochladen">
                <div style="font-size:12px;">max. Gr&ouml;&szlig;e: 100kb; Datei: jpg;</div>
                <div style="font-size:12px;">max. Aufl&ouml;sung: 100px x 130px</div></form>
                </td>
		</tr>
		<!-- 7.Tabellenreihe Unteruebschreift fuer den about me-teil-->
		<tr height="25">
			<td colspan="3" align="center"><h3>Infos &uuml;ber mich:</h3></td>
		</tr>
		<!-- 8.Tabellenreihe die "about me"-Eingabe -->
		<tr>
			<td colspan="3"><textarea name="profiltext" cols="60" rows="10"><?php echo $beschreibung ?></textarea></td>
		</tr>
		<!-- 9.Tabellenreihe fuer die Passwortaenderung-->
		<tr height="25">
			<td colspan="4" align="center"><h3>Passwort &auml;ndern</h3></td>
		</tr>
		<!-- 10.Tabellenreihe fuer die altes Passwort-->
		<tr height="25">
			<td colspan="2" align="right">altes Passwort:</td>
			<td><input type="password" name="oldpassword" value=""></td>
		</tr>
		<!-- 11.Tabellenreihe fuer die neues Passwort-->
		<tr height="25">
			<td colspan="2" align="right">neues Passwort:</td>
			<td><input type="password" name="newpassword1" value=""></td>
		</tr>
		<!-- 12.Tabellenreihe f�r die Best�tigung des neues Passworts-->
		<tr height="25">
			<td colspan="2" align="right">Passwort best&auml;tigen:</td>
			<td><input type="password" name="newpassword2" value=""></td>
		</tr>
		<!-- 13.Tabellenreihe "Uebernehmen" und "abbrechen" Button-->
	</table>

    <input type="submit" value="&uuml;bernehmen"></form><input type="submit" value="abbrechen">

</body>
</html>

<?php

//Auf die folgeseite einbinden

if (strlen($nick) == 0 or strlen($mail) == 0 or strlen($newpw1) == 0 or strlen($newpw2) == 0 or strlen($oldpw)) {

echo "<h2 style='color:red;'>Sie haben nicht alle Felder ausgef&uuml;llt!</h2>";

}

else {

    if ($pw1 == $pw2) {

            // In die DB schreiben...
    }

    else {

        echo "<h2 style='color;red;'>Sie haben nicht zweimal das gleiche Passwort eingegeben</h2>";

    }

}