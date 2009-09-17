<?php

include ('pulldown_select_function.php');

//Klassenselection anfang

$k = new Klasse();
$ks = $k->getAllAsArray();
$htmlk = new HtmlKlasse($ks);
$klasse_selection_output = $htmlk->getPullDown('klasse_id[]');




//Klassenselection ende

//Erstellung des Arrays fuer die Tage
$tage=array();
for($i=1; $i<=31; $i++) {
    $tage[]=$i;
}

//Erstellung des Arrays fuer die Monate
$monate=array();
for($i=1; $i<=12; $i++) {
    $monate[]=$i;
}

//Erstellung des Arrays fuer die Jahre
$jahre=array();
for( $i=1900; $i<=2010; $i++) {
    $jahre[]=$i;
}

$day_pull_name = 'tag_input_reg';
$day_name = array('tag_input_reg');
$day_options = $tage;

$month_pull_name = 'monat_input_reg';
$month_name = array('monat_input_reg');
$month_options = $monate;

$year_pull_name = 'jahr_input_reg';
$year_name = array('jahr_input_reg');
$year_options = $jahre;

$day_pulldown=pulli($day_name,$day_options,$day_pull_name);
$month_pulldown=pulli($month_name,$month_options,$month_pull_name);
$year_pulldown=pulli($year_name,$year_options,$year_pull_name);

?>

<html>
<head>
<title>Benutzer registrieren</title>
</head>
<body>

<h2>Registrierung eines Benutzers</h2>

<form method='post' action='views/register_user_in_db.php'>
<table border="1" style="border-collapse:collapse;">
    <tr>
        <td>Benutzergruppe:</td>
        <td><select name="typ_input_reg"><option value="1">Sch&uuml;ler</option>
                    <option value="2">Lehrer</option></select></td>
   </tr>
   <tr>
        <td>Klasse:</td>
        <td><?php echo $klasse_selection_output; ?></td>
   </tr>
    <tr>
        <td>Vorname:</td>
        <td><input type="text" name="vname_input_reg" size="20" maxlength="45"></td>
    </tr>
    <tr>
        <td>Nachname:</td>
        <td><input type="text" name="nname_input_reg" size="20" maxlength="45"></td>
    </tr>
    <tr>
        <td>Nickname:</td>
        <td><input type="text" name="nick_input_reg" size="20" maxlength="45"></td>
    </tr>
    <tr>
        <td>Geburtstag:</td>
        <td><?php echo $day_pulldown; echo $month_pulldown; echo $year_pulldown; ?></td>
    </tr>
    <tr>
        <td>E-Mail:</td>
        <td><input type="text" name="mail_input_reg" size="20" maxlength="45"></td>
    </tr>
    <tr>
        <td>Passwort:</td>
        <td><input type="password" name="pw1_input_reg" size="20" maxlength="45"></td>
    </tr>
    <tr>
        <td>Passwort wiederholen:</td>
        <td><input type="password" name="pw2_input_reg" size="20" maxlength="45"></td>
    </tr>
</table>
<br>
<input type="submit" name="save_reg" value="&uuml;bernehmen">
<form method='post' action='../index.php'><input type="submit" name="cancel_reg" value="abbrechen"></form></form>

</body>
</html>