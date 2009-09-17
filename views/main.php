<html>
<head>
<title>Klassenbuch - Online (Adminansicht)</title>
</head>
<body bgcolor="#FFFFFF" text="#000000" link="#000000" vlink="#000000" alink="#000000">

<center>
<h1>Klassenbuch Online (Admin)</h1>

<table border="1" style="border-collapse:collapse;"> <!-- cf8989 -->
<tr>
	<!-- der Login -->
	<td colspan="2" align="right" style="border-width:4px; border-color:#cf8989; border-style:solid; padding:0px;">

	Name:<input type="text" size="10"> 
	Passwort:<input type="password" size="10"><input type="button" value="Login"><br>
	<div style="font-size:11px;">Passwort vergessen?</div></td>
</tr>
<tr>
	<td valign="top" style="border-width:4px; border-color:#cf8989; border-style:solid; padding:0px;">
		<!-- Home -->
		<a href="index.php" target="frame" style="text-decoration:none">Home</a><br>

		<!-- die Übersicht -->
		<b>&Uuml;bersicht</b><br>
			<a href=schueler_fehlzeiten.html target=frame style="text-decoration:none">&#x2514;Fehlzeiten</a><br>
			<a href=stundenplan.html target=frame style="text-decoration:none">&#x2514;Stundenplan</a><br>
			<a href=berichtsuebersicht.html target=frame style="text-decoration:none">&#x2514;Berichtsheft</a><br>
			<a href=klassendruck.html target=frame style="text-decoration:none">&#x2514;Klassenlisten</a><br>

			<!-- der Profilteil -->
		
		
		<!-- die Eintragungen -->
		<b>Eintragungen</b><br>
			<a href=anwesenheit.html target=frame style="text-decoration:none">&#x2514;Anwesenheit</a><br>
			<a href=berichtseintragungen.html target=frame style="text-decoration:none">&#x2514;Berichtseintragung</a><br>
			<a href=notenliste.html target=frame style="text-decoration:none">&#x2514;Notenliste</a><br>
			<a href=nachtragungen.html target=frame style="text-decoration:none">&#x2514;Nachtragungen</a><br>
			<a href=klassendruck.html target=frame style="text-decoration:none">&#x2514;Klassenliste zum drucken</a><br>
		<!-- die Verwaltung -->
		<b>Verwaltung</b><br>
			<a href=benutzeranlegen.html target=frame style="text-decoration:none">&#x2514;Benutzer</a><br>
			<a href=klassen.html target=frame style="text-decoration:none">&#x2514;Klassen</a><br>
			<a href=faecher.html target=frame style="text-decoration:none">&#x2514;F&auml;cher</a><br>
			<a href=raeume.html target=frame style="text-decoration:none">&#x2514;R&auml;ume</a><br>
			<a href=wochenplan.html target=frame style="text-decoration:none">&#x2514;Wochenplaner</a><br>
			<a href=new_news.php target=frame style="text-decoration:none">&#x2514;News</a><br>
		    
		
		

	</td>
	<td style="border-width:4px; border-color:#cf8989; border-style:solid; padding:0px;">
		<iframe src="index.php?what=news?action=show" name=frame width=1000 height=700 frameborder=0></iframe></td>
</tr>
<tr>
	<td colspan="2" style="border-width:4px; border-color:#cf8989; border-style:solid; padding:0px;" align="center"> Hilfe | Support | Impressum | AGB's</td>
</tr>
</table>
</center>

</body>
</html>