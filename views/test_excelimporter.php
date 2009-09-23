<?php
$ei = new ExcelImporter('excel/kurs_b08_h_p_20090914bis20090920.xls');
//$ei = new ExcelImporter('excel/kurs_bit08.xls');
$ei->saveFileToDb();
?>