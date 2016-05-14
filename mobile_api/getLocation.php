<?php 
	include_once('../mobile_lib/getLocation.php');
	include_once('../mobile_lib/services.php');
	
	header('Content-Type: application/json');
	
	$serviceData = array();
	$data = '';
	$locations = array();
	$services = array();
	$response['markers'] = array();
	$response['success'] = array();
	
	$data = getLocations();
	$id='';
	
	foreach($data as $dataInfo)
	{	
		
		$locations['title'] = $dataInfo['carwashname'];
		$locations['description'] = $dataInfo['address'];
		$locations['image'] = '';
		$locations['link'] = 'reservation.php?id='.$dataInfo['carwashid'];
		$locations['iconMarker'] = '../resources/images/autoIcon2.png';
		$locations['latitude'] = $dataInfo['latitude'];
		$locations['longitude'] = $dataInfo['longitude'];
		$locations['carwashid'] = $dataInfo['carwashid'];
		
		array_push($response['markers'], $locations);
		
		
	}
	
	$response['success'] = 'true';
	exit(json_encode($response));
?>
