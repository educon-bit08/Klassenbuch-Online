<html>
<head>
<title>Benutzer registrieren</title>
</head>
<body>

<h2>Registrierung eines Benutzers</h2>

<div class="user_info">
<?php
if (isset($user_infos) && is_array($user_infos)) {
	echo implode("\n", $user_infos);
}
?>
</div>
<form method='post' action='index.php?action=save&what=registeruser'>
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
        <td><input type="text" name="vname_input_reg" size="20" maxlength="45" value="<?php echo $vname; ?>"></td>
    </tr>
    <tr>
        <td>Nachname:</td>
        <td><input type="text" name="nname_input_reg" size="20" maxlength="45" value="<?php echo $nname; ?>"></td>
    </tr>
    <tr>
        <td>Nickname:</td>
        <td><input type="text" name="nick_input_reg" size="20" maxlength="45" value="<?php echo $nick; ?>"></td>
    </tr>
    <tr>
        <td>Geburtstag:</td>
        <td><?php echo Html::getDayAsPulldown(); echo Html::getMonthAsPulldown(); echo Html::getYearAsPulldown(); ?></td>
    </tr>
    <tr>
        <td>E-Mail:</td>
        <td><input type="text" name="mail_input_reg" size="20" maxlength="45" value="<?php echo $mail; ?>"></td>
    </tr>
    <tr>
        <td>Passwort:</td>
        <td><input type="password" name="pw1_input_reg" size="20" maxlength="45" value="<?php echo $pw1; ?>"></td>
    </tr>
    <tr>
        <td>Passwort wiederholen:</td>
        <td><input type="password" name="pw2_input_reg" size="20" maxlength="45" value="<?php echo $pw2; ?>"></td>
    </tr>
     <tr height="50">
        <td><input type="reset" name="save_reg" value="abbrechen"></td>
        <td><input type="submit" name="save_reg" value="&uuml;bernehmen"></td>
    </tr>
</table>
<br>

</form>

</body>
</html>