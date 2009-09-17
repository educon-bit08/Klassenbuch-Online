<?php

$tester = new stundenplan;

$ausgabe = $tester -> get_Blocks();

//Syntax: get_LFR($klasse_id, $datum, $block_nr)
$ausgabe2 = $tester -> get_Tagesplan(3, '2009-07-01');

html::showAll($ausgabe2);

html::showAll($ausgabe);

$ausgabe3 = new rights;
$ausgabe3 -> getRights(ADMIN);
echo '<br>';
$ausgabe3 -> getRights(FBL);
echo '<br>';
$ausgabe3 -> getRights(LEHRER);
echo '<br>';
$ausgabe3 -> getRights(SCHUELER);
echo '<br>';
$ausgabe3 -> getRights(SEKRETAERIN);
echo '<br>';

?>