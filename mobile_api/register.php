<?php 
	include_once('../mobile_lib/vehicle.php');
	
	header('Content-Type: application/json');
	
	$json = json_decode(file_get_contents('php://input'), true);
	$response = '';
	$response['success'] = '';
	
	$custfname = $json['custfname'];
	$custmname = $json['custmname'];
	$custlname = $json['custlname']; 
	$address = $json['address'];
	$custcontactno = $json['custcontactno'];
	$username = $json['username'];
	$password = $json['password'];
	$email = $json['email'];

	
	
	$response['success'] = vehicleRegister($custfname, $custmname, $custlname, $address, $custcontactno, $username, $password, $email);
	
	if($response['success'])
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
