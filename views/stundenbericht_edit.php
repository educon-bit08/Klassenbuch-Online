<?php

include ('pulldown_function.php');

$fach_name=array('Fach');
$fach_options=array(0 => ' ', 1 => 'Mathe',2 => 'SL', 3 => 'Englisch');         //Werte des Faecher-Arrays

$klasse_name=array('Klasse');
$klasse_options=array(0=> ' ', 1 => 'BIT06/1P', 2 => 'BIT07/1P', 3 => 'BIT08/1P'); //Werte des Klasse-Arrays

$fach_pulldown=pulli($fach_name,$fach_options);
$klasse_pulldown=pulli($klasse_name,$klasse_options);

?>

<html>
<head>
<title>Stundenbericht</title>
</head>
<body link="#000000" alink="#000000" vlink="#000000">

<h2>Stundenbericht</h2>

<table border="0">
    <tr>
        <td>Woche von <input type="text" maxlength="10" size="10" value=""> bis <input type="text" maxlength="10" size="10" value=""></td>
        <td>&nbsp; Klasse: <?php echo $klasse_pulldown  ?></td>
        <td>&nbsp; <input type="button" name="accept" value="best&auml;tigen"></td>
    </tr>
    <tr>
        <td align="right"><div style="font-size:11px;">Eingabeformat: JJJJ-MM-TT; 2009-06-23</div></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
</table>

<br>
<br>

<table border="1">
    <tr align="center">
        <td>Tag</td>
        <td>Std.</td>
        <td>Fach</td>
        <td>Unterrichtsgegenstand</td>
        <td>Hausaufgaben</td>
        <td>An- und Abwesenheit</td>
        <td>Unterschrift</td>
    </tr>
    <tr align="center">
        <td rowspan="6">Mo.</td>
        <td>1</td>
        <td><?php echo $fach_pulldown ?></td>
        <td><input type="text" size="40" maxlength="40" name="mo_one_inhalt"></td>
        <td><input type="text" size="40" maxlength="40" name="mo_one_ha"></td>
        <td rowspan="6"><a href="anwesenheit_show.php" style="text-decoration:none;">Anwesenheit</a></td>
        <td>bla</td>
    </tr>
    <tr align="center">
        <td>2</td>
        <td><?php echo $fach_pulldown ?></td>
        <td><input type="text" size="40" maxlength="40" name="mo_two_inhalt"></td>
        <td><input type="text" size="40" maxlength="40" name="mo_two_ha"></td>
        <td>bla</td>
    <tr align="center">
        <td>3</td>
        <td><?php echo $fach_pulldown ?></td>
        <td><input type="text" size="40" maxlength="40" name="mo_three_inhalt"></td>
        <td><input type="text" size="40" maxlength="40" name="mo_three_ha"></td>
        <td>bla</td>
    </tr>
    <tr align="center">
        <td>4</td>
        <td><?php echo $fach_pulldown ?></td>
        <td><input type="text" size="40" maxlength="40" name="mo_four_inhalt"></td>
        <td><input type="text" size="40" maxlength="40" name="mo_four_ha"></td>
        <td>bla</td>
    <tr align="center">
        <td>5</td>
        <td><?php echo $fach_pulldown ?></td>
        <td><input type="text" size="40" maxlength="40" name="mo_five_inhalt"></td>
        <td><input type="text" size="40" maxlength="40" name="mo_five_ha"></td>
        <td>bla</td>
    </tr>
    <tr align="center">
        <td>6</td>
        <td><?php echo $fach_pulldown ?></td>
        <td><input type="text" size="40" maxlength="40" name="mo_six_inhalt"></td>
        <td><input type="text" size="40" maxlength="40" name="mo_six_ha"></td>
        <td>bla</td>
    </tr>
                                                                                <!--Dienstag-->
    <tr align="center">
        <td rowspan="6">Di.</td>
        <td>1</td>
        <td><?php echo $fach_pulldown ?></td>
        <td><input type="text" size="40" maxlength="40" name="di_one_inhalt"></td>
        <td><input type="text" size="40" maxlength="40" name="di_one_ha"></td>
        <td rowspan="6"><a href="anwesenheit_show.php" style="text-decoration:none;">Anwesenheit</a></td>
        <td>bla</td>
    </tr>
    <tr align="center">
        <td>2</td>
        <td><?php echo $fach_pulldown ?></td>
        <td><input type="text" size="40" maxlength="40" name="di_two_inhalt"></td>
        <td><input type="text" size="40" maxlength="40" name="di_two_ha"></td>
        <td>bla</td>
    <tr align="center">
        <td>3</td>
        <td><?php echo $fach_pulldown ?></td>
        <td><input type="text" size="40" maxlength="40" name="di_three_inhalt"></td>
        <td><input type="text" size="40" maxlength="40" name="di_three_ha"></td>
        <td>bla</td>
    </tr>
    <tr align="center">
        <td>4</td>
        <td><?php echo $fach_pulldown ?></td>
        <td><input type="text" size="40" maxlength="40" name="di_four_inhalt"></td>
        <td><input type="text" size="40" maxlength="40" name="di_four_ha"></td>
        <td>bla</td>
    <tr align="center">
        <td>5</td>
        <td><?php echo $fach_pulldown ?></td>
        <td><input type="text" size="40" maxlength="40" name="di_five_inhalt"></td>
        <td><input type="text" size="40" maxlength="40" name="di_five_ha"></td>
        <td>bla</td>
    </tr>
    <tr align="center">
        <td>6</td>
        <td><?php echo $fach_pulldown ?></td>
        <td><input type="text" size="40" maxlength="40" name="di_six_inhalt"></td>
        <td><input type="text" size="40" maxlength="40" name="di_six_ha"></td>
        <td>bla</td>
    </tr>
                                                                                <!--Mittwoch-->
    <tr align="center">
        <td rowspan="6">Mi.</td>
        <td>1</td>
        <td><?php echo $fach_pulldown ?></td>
        <td><input type="text" size="40" maxlength="40" name="mi_one_inhalt"></td>
        <td><input type="text" size="40" maxlength="40" name="mi_one_ha"></td>
        <td rowspan="6"><a href="anwesenheit_show.php" style="text-decoration:none;">Anwesenheit</a></td>
        <td>bla</td>
    </tr>
    <tr align="center">
        <td>2</td>
        <td><?php echo $fach_pulldown ?></td>
        <td><input type="text" size="40" maxlength="40" name="mi_two_inhalt"></td>
        <td><input type="text" size="40" maxlength="40" name="mi_two_ha"></td>
        <td>bla</td>
    <tr align="center">
        <td>3</td>
        <td><?php echo $fach_pulldown ?></td>
        <td><input type="text" size="40" maxlength="40" name="mi_three_inhalt"></td>
        <td><input type="text" size="40" maxlength="40" name="mi_three_ha"></td>
        <td>bla</td>
    </tr>
    <tr align="center">
        <td>4</td>
        <td><?php echo $fach_pulldown ?></td>
        <td><input type="text" size="40" maxlength="40" name="mi_four_inhalt"></td>
        <td><input type="text" size="40" maxlength="40" name="mi_four_ha"></td>
        <td>bla</td>
    <tr align="center">
        <td>5</td>
        <td><?php echo $fach_pulldown ?></td>
        <td><input type="text" size="40" maxlength="40" name="mi_five_inhalt"></td>
        <td><input type="text" size="40" maxlength="40" name="mi_five_ha"></td>
        <td>bla</td>
    </tr>
    <tr align="center">
        <td>6</td>
        <td><?php echo $fach_pulldown ?></td>
        <td><input type="text" size="40" maxlength="40" name="mi_six_inhalt"></td>
        <td><input type="text" size="40" maxlength="40" name="mi_six_ha"></td>
        <td>bla</td>
    </tr>
                                                                                <!--Donnerstag-->
    <tr align="center">
        <td rowspan="6">Do.</td>
        <td>1</td>
        <td><?php echo $fach_pulldown ?></td>
        <td><input type="text" size="40" maxlength="40" name="do_one_inhalt"></td>
        <td><input type="text" size="40" maxlength="40" name="do_one_ha"></td>
         <td rowspan="6"><a href="anwesenheit_show.php" style="text-decoration:none;">Anwesenheit</a></td>
        <td>bla</td>
    </tr>
    <tr align="center">
        <td>2</td>
        <td><?php echo $fach_pulldown ?></td>
        <td><input type="text" size="40" maxlength="40" name="do_two_inhalt"></td>
        <td><input type="text" size="40" maxlength="40" name="do_two_ha"></td>
        <td>bla</td>
    <tr align="center">
        <td>3</td>
        <td><?php echo $fach_pulldown ?></td>
        <td><input type="text" size="40" maxlength="40" name="do_three_inhalt"></td>
        <td><input type="text" size="40" maxlength="40" name="do_three_ha"></td>
        <td>bla</td>
    </tr>
    <tr align="center">
        <td>4</td>
        <td><?php echo $fach_pulldown ?></td>
        <td><input type="text" size="40" maxlength="40" name="do_four_inhalt"></td>
        <td><input type="text" size="40" maxlength="40" name="do_four_ha"></td>
        <td>bla</td>
    <tr align="center">
        <td>5</td>
        <td><?php echo $fach_pulldown ?></td>
        <td><input type="text" size="40" maxlength="40" name="do_five_inhalt"></td>
        <td><input type="text" size="40" maxlength="40" name="do_five_ha"></td>
        <td>bla</td>
    </tr>
    <tr align="center">
        <td>6</td>
        <td><?php echo $fach_pulldown ?></td>
        <td><input type="text" size="40" maxlength="40" name="do_six_inhalt"></td>
        <td><input type="text" size="40" maxlength="40" name="do_six_ha"></td>
        <td>bla</td>
    </tr>
                                                                                <!--Freitag-->
    <tr align="center">
        <td rowspan="6">Fr.</td>
        <td>1</td>
        <td><?php echo $fach_pulldown ?></td>
        <td><input type="text" size="40" maxlength="40" name="fr_one_inhalt"></td>
        <td><input type="text" size="40" maxlength="40" name="fr_one_ha"></td>
        <td rowspan="6"><a href="anwesenheit_show.php" style="text-decoration:none;">Anwesenheit</a></td>
        <td>bla</td>
    </tr>
    <tr align="center">
        <td>2</td>
        <td><?php echo $fach_pulldown ?></td>
        <td><input type="text" size="40" maxlength="40" name="fr_two_inhalt"></td>
        <td><input type="text" size="40" maxlength="40" name="fr_two_ha"></td>
        <td>bla</td>
    <tr align="center">
        <td>3</td>
        <td><?php echo $fach_pulldown ?></td>
        <td><input type="text" size="40" maxlength="40" name="fr_three_inhalt"></td>
        <td><input type="text" size="40" maxlength="40" name="fr_three_ha"></td>
        <td>bla</td>
    </tr>
    <tr align="center">
        <td>4</td>
        <td><?php echo $fach_pulldown ?></td>
        <td><input type="text" size="40" maxlength="40" name="fr_four_inhalt"></td>
        <td><input type="text" size="40" maxlength="40" name="fr_four_ha"></td>
        <td>bla</td>
    <tr align="center">
        <td>5</td>
        <td><?php echo $fach_pulldown ?></td>
        <td><input type="text" size="40" maxlength="40" name="fr_five_inhalt"></td>
        <td><input type="text" size="40" maxlength="40" name="fr_five_ha"></td>
        <td>bla</td>
    </tr>
    <tr align="center">
        <td>6</td>
        <td><?php echo $fach_pulldown ?></td>
        <td><input type="text" size="40" maxlength="40" name="fr_six_inhalt"></td>
        <td><input type="text" size="40" maxlength="40" name="fr_six_ha"></td>
        <td>bla</td>
    </tr>
                                                                                <!--Samstag-->
    <tr align="center">
        <td rowspan="6">Sa.</td>
        <td>1</td>
        <td><?php echo $fach_pulldown ?></td>
        <td><input type="text" size="40" maxlength="40" name="sa_one_inhalt"></td>
        <td><input type="text" size="40" maxlength="40" name="sa_one_ha"></td>
        <td rowspan="6"><a href="anwesenheit_show.php" style="text-decoration:none;">Anwesenheit</a></td>
        <td>bla</td>
    </tr>
    <tr align="center">
        <td>2</td>
        <td><?php echo $fach_pulldown ?></td>
        <td><input type="text" size="40" maxlength="40" name="sa_two_inhalt"></td>
        <td><input type="text" size="40" maxlength="40" name="sa_two_ha"></td>
        <td>bla</td>
    <tr align="center">
        <td>3</td>
        <td><?php echo $fach_pulldown ?></td>
        <td><input type="text" size="40" maxlength="40" name="sa_three_inhalt"></td>
        <td><input type="text" size="40" maxlength="40" name="sa_three_ha"></td>
        <td>bla</td>
    </tr>
    <tr align="center">
        <td>4</td>
        <td><?php echo $fach_pulldown ?></td>
        <td><input type="text" size="40" maxlength="40" name="sa_four_inhalt"></td>
        <td><input type="text" size="40" maxlength="40" name="sa_four_ha"></td>
        <td>bla</td>
    <tr align="center">
        <td>5</td>
        <td><?php echo $fach_pulldown ?></td>
        <td><input type="text" size="40" maxlength="40" name="sa_five_inhalt"></td>
        <td><input type="text" size="40" maxlength="40" name="sa_five_ha"></td>
        <td>bla</td>
    </tr>
    <tr align="center">
        <td>6</td>
        <td><?php echo $fach_pulldown ?></td>
        <td><input type="text" size="40" maxlength="40" name="sa_six_inhalt"></td>
        <td><input type="text" size="40" maxlength="40" name="sa_six_ha"></td>
        <td>bla</td>
    </tr>
</table>

<table border="1" align="left">
    <tr>
        <td><a href="write_fbl_unterschrift.php" style="text-decoration:none">FBL-Unterschrift setzen</a></td>
    </tr>
</table><br>

<br>
<input type="submit" value="&uuml;bernehmen"><input type="submit" value="abbrechen">

</body>
</html>