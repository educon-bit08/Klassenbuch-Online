<html>
<head>
<title>Profil &auml;ndern</title>
</head>
<body>
	<h2>Profil &auml;ndern</h2>
	<table border="0" height="350" width="500">
		<!-- 1.Tabellenreihe mit dem User-Avatar & Vornamenseingabe-->
		<tr height="25">
			<td rowspan="5"><img src="\userpics\esl.jpg" width="100" height="100"></td>
			<td align="right">Vorname:</td>
			<td><input type="text" value="Test" name="vname" style="background-color:white;color:black;" disabled></td>
		</tr>
		<!-- 2.Tabellenreihe fuer die Nachnameneingabe-->
		<tr height="25">
			<td align="right">Nachname:</td>
			<td><input type="text" value="Test" name="nname" style="background-color:white;color:black;" disabled></td>
		</tr>
		<!-- 3.Tabellenreihe fuer die Alterseingabe-->
		<tr height="25">
			<td align="right">Alter:</td>
			<td><input type="text" value="18" name="age" style="background-color:white;color:black;" disabled></td>
		</tr>
		<!-- 4.Tabellenreihe fuer die Nickname-->
		<tr height="25">
			<td align="right">Nickname:</td>
			<td><input type="text" value="" name="nick"></td>
		</tr>
        <!-- 5.Tabellenreihe fuer die E-Mail-->
		<tr height="25">
			<td align="right">E-Mail:</td>
			<td><input type="text" value="" name="mail"></td>
		</tr>
		<!-- 6.Tabellenreihe Eingeabefeld "hochladen-button" ist-->
		<tr height="25">
			<td colspan="2"><form action="upload_pic.php" method="post" enctype="multipart/form-data">
                            <input type="file" name="datei"><br>
                            <input type="submit" value="Hochladen">
                <div style="font-size:12px;">max. Gr&ouml;&szlig;e: 100kb; Datei: jpg;</div>
                <div style="font-size:12px;">max. Aufl&ouml;sung: 150px x 100px</div></form>
                </td>
		</tr>
		<!-- 7.Tabellenreihe Unteruebschreift fuer den about me-teil-->
		<tr height="25">
			<td colspan="3" align="center"><h3>Infos &uuml;ber mich:</h3></td>
		</tr>
		<!-- 8.Tabellenreihe die "about me"-Eingabe -->
		<tr>
			<td colspan="3"><textarea name="profiltext" cols="60" rows="10">Ihr Profiltext</textarea></td>
		</tr>
		<!-- 9.Tabellenreihe fuer die Passwortaenderung-->
		<tr height="25">
			<td colspan="4" align="center"><h3>Passwort &auml;ndern</h3></td>
		</tr>
		<!-- 10.Tabellenreihe fuer die altes Passwort-->
		<tr height="25">
			<td colspan="2" align="right">altes Passwort:</td>
			<td><input type="password" value=""></td>
		</tr>
		<!-- 11.Tabellenreihe fuer die neues Passwort-->
		<tr height="25">
			<td colspan="2" align="right">neues Passwort:</td>
			<td><input type="password" value=""></td>
		</tr>
		<!-- 12.Tabellenreihe f�r die Best�tigung des neues Passworts-->
		<tr height="25">
			<td colspan="2" align="right">Passwort best&auml;tigen:</td>
			<td><input type="password" value=""></td>
		</tr>
		<!-- 13.Tabellenreihe "Uebernehmen" und "abbrechen" Button-->
	</table>

    <input type="submit" value="&uuml;bernehmen"><input type="submit" value="abbrechen">

</body>
</html>