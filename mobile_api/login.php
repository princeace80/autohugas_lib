<?php 
	include_once('../mobile_lib/vehicle.php'); 

	
	header('Content-Type: application/json');
	
	$json = json_decode(file_get_contents('php://input'), true);

	$response['success']='';

	$username=$json['username'];
	$password=$json['password'];
	
	$response = getVehicleOwnerInfo($username, $password);
	
	if(!empty($response))
	{
		$response['success'] = true;
		echo json_encode($response);
	}
	else
	{
		$response['success'] = false;
		echo json_encode($response);
	}

	exit();
?>
