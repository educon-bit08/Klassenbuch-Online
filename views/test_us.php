<?php

$u = new UnterrichtsStunde();

$u->setDatum('2009-122-24');
$u->setRaum_id(3);
$u->setLehrer_id(1);
$u->setVertretung_id(3);
$u->setKlasse_id(1);
$u->setFach_id(1);
$u->setBlock_id(5);
$u->setFbl_id(2);
$u->setAbgezeichnet_id(1);
$u->setHausaufgabe('macht mal');
$u->setInhalt('core programming');


//$u->load(3);
//$u->loadObjects();
//Html::showAll($u);
/*
$s = new Schueler();
$s->load(3);
$s->loadNotens(1);
Html::showAll($s);
*/
?>