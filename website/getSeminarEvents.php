<?php

include '../common/class.ajax.php';

$ajaxFunc = new ajaxFunction();

$result = $ajaxFunc->getAllSeminar();

$event_array = array();
foreach($result as $data){
	$originalDate = $data['dh_seminar_date'];
	$newDate = date("Y-d-m", strtotime($originalDate));

	$event_array[] = array(
		'title' => $data['dh_seminar_name'],
		'start' => $newDate
	);
}

echo json_encode($event_array);

?>

