<?php
$k = new Lehrer(1);

$k->setKlasse_ids(array(1,4));

$k->save();
html::showAll($k);
?>