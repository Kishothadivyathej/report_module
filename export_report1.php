<?php

if(isset($_POST["ExportType"]))
{
	 
    switch($_POST["ExportType"])
    {
        case "export-to-excel" :
            // Submission from
            $filename = $_POST["ExportType"] . ".xls";	
            $result = $_POST["ExportType2"]; 
            header("Content-Type: application/vnd.ms-excel");
			header("Content-Disposition: attachment; filename=\"$filename\"");
			ExportFile($result);
			//$_POST["ExportType"] = '';
            exit();
        default :
            die("Unknown action : ".$_POST["action"]);
            break;
    }
}
function ExportFile($records) {
	$heading = false;
		if(!empty($records)) {
		  ////foreach($records as $row) {
		//	if(!$heading) {
			  // display field/column names as a first row
			  echo   $records ;
			  $heading = true;
		//	}
	//		echo implode("\t", array_values($row)) . "\n";
		  }
		exit;
}

?>