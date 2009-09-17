<?php

$testme = new stundenplan();

$ausgabe = $testme -> get_LFR(3, '2009-07-01', 2);

html::showAll($ausgabe);

?>