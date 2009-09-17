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

<body>
	<h2><?php echo $vname; ?>'s Profil</h2>
	<table border="0" height="350" width="500">
		<!-- 1.Tabellenreihe mit dem User-Avatar & Vorname-->
		<tr height="25">
			<?php echo "<td rowspan='6'><img src='\user_pictures\img_" . $user_id . ".jpg' width='100' height='130'></td>"; ?>
			<td align="right">Vorname:</td>
			<td>
                <?php echo $vname;?></td>
		</tr>
		<!-- 2.Tabellenreihe fuer die Nachname-->
		<tr height="25">
			<td align="right">Nachname:</td>
			<td>
                <?php echo $nname ?></td>
		</tr>
		<!-- 3.Tabellenreihe f�r die Alter-->
		<tr height="25">
			<td align="right">Alter:</td>
			<td>
                <?php echo $alter ?></td>
		</tr>
		<!-- 4.Tabellenreihe f�r die Nickname-->
		<tr height="25">
			<td align="right">Nickname:</td>
			<td>
                <?php echo $nick ?></td>
		</tr>
        <!-- 5.Tabellenreihe f�r die E-Mail-->
		<tr height="25">
			<td align="right">E-Mail:</td>
			<td>
                <?php echo $email ?></td>
		</tr>
        <tr height="25">
			<td align="right">Klasse:</td>
			<td>
                <?php echo $klasse ?></td>
		</tr>
		<!-- 6.Tabellenreihe Unteruebschreift fuer den about me-teil-->
		<tr height="25">
			<td colspan="3"><br><br><h3>Infos &uuml;ber mich:</h3></td>
		</tr>
		<!-- 7.Tabellenreihe die "about me"-Eingabe -->
		<tr>
			<td colspan="3"><textarea style="background-color:white;border:white;"
                                      name="profiltext" cols="60" rows="10"
                                      readonly><?php echo $beschreibung; ?></textarea></td>
		</tr>
	</table>
</body>