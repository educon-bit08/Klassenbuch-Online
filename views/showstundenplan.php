<?php
$data = new SpreadsheetExcelReader();

$data->read('excel/kurs_bit08.xls');

/*
echo '<pre>';
print_r($data->sheets[0]);
echo '</pre>';
*/

$spalte = array();
$numRows = $data->sheets[0]['numRows'];
$numCols = $data->sheets[0]['numCols'];
for ($i = 1; $i < $numRows; $i++){
	for ($j = 1; $j < $numCols; $j++) {

		$spalte[$i][$j] = $data->sheets[0]['cells'][$i][$j];
		
	}
}

echo Html::buildTable($spalte);
/*
echo '<pre>';
print_r($spalte);
echo '</pre>';
*/
?>