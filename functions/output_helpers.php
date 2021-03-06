<?php

function outputArray($array){
	if(is_array($array)){
		foreach($array as $key => $value){
			echo "$value<br>";
		}
	}
}

// function to be used for creating HTML tables
// accepts object, array, or array of objects/arrays
function outputTable($data, $column_headings_array=null, $print_keys=false){
	if(empty($data)){
		return "No Data Found...";
	}

	if($print_keys !== true){
		$print_keys = false;
	}

	$table_string = '<table class="table table-striped">';
	if(is_array($column_headings_array)){
		// Output headings for table
		$table_string .= outputRow($column_headings_array, true, false, null);
	}

	if(is_array($data) || is_object($data)){
		// Output rows in $data
		foreach($data as $key => $row){
			$table_string .= outputRow($row, false, $print_keys, $key);
		}
	}
	$table_string .= "</table>";

	return $table_string;
}

function outputRow($row, $header, $print_keys, $key){
	$row_string = "<tr>";
	$row_string .= outputCells($row, $header, $print_keys, $key);
	$row_string .= "</tr>";

	return $row_string;
}

function outputCells($row_data, $header, $print_keys, $row_key){
	// If row is a header use <th>
	$td = "<td>";
	if($header==true){
		$td = "<th>";
	}

	$cell_data_string = "";
	if(is_array($row_data) || is_object($row_data)){
		foreach($row_data as $cell_data){
			$cell_data_string .= $td.htmlentities($cell_data).$td;
		}
	}
	else {
		if($print_keys && $row_key !== null){
			$cell_data_string .= $td.htmlentities($row_key).$td;
		}
		$cell_data_string .= $td.htmlentities($row_data).$td;
	}

	return $cell_data_string;
}
?>