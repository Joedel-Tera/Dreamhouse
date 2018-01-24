<?php

include '../common/class.ajax.php';

$ajaxFunc = new ajaxFunction();

$result = $ajaxFunc->getAllVehicleTrips();

$event_array = array();
foreach($result as $data){
	$originalDate = $data['dh_trip_date'];
	$newDate = date("Y-d-m", strtotime($originalDate));

	$event_array[] = array(
		'title' => $data['dh_location_pickup'].' - '.$data['dh_location_destination'] ,
		'start' => $newDate
	);
}

echo json_encode($event_array);

?>

