<?php 
	include_once('../mobile_lib/getLocation.php');
	include_once('../mobile_lib/services.php');
	include_once('../mobile_lib/vehicle.php');
	
	header('Content-Type: application/json');
	$json = json_decode(file_get_contents('php://input'), true);
	
	$data='';
	$cars='';
	$carDetials='';
	$id = $json['carwashid'];
	
	$data = getServicesById(1);
	$cars = getAllVehicle(1);

	$response['success'] = '';
	$response['services'] = array();
	$response['vehicles'] = array();
	if(!empty($data))
	{
		foreach($data as $sv)
		{
			
			$services['serviceid'] = $sv['serviceid'];
			$services['carwashid'] = $sv['carwashid'];
			$services['servicerate'] = $sv['servicerate'];
			$services['servicename'] = $sv['servicename'];
			$services['serviceduration'] = $sv['serviceduration'];
			
			array_push($response['services'], $services);

		}
	
		$response['success'] = 'true';
		
		foreach($cars as $car)
		{
			
			$carDetials['vehicleid'] = $car['vehicleid'];
			$carDetials['vehiclecolor'] = $car['vehiclecolor'];
			$carDetials['model'] = $car['model'];
			$carDetials['brand'] = $car['brand'];
			$carDetials['vehicletype'] = $car['vehicletype'];
			$carDetials['plateNumber'] = $car['plateNumber'];
			$carDetials['registrationNumber'] = $car['registrationNumber'];
			
			array_push($response['vehicles'], $carDetials);

		}
		exit(json_encode($response));
	}
	else
	{
		$response['success'] = 'false';
		exit(json_encode($response));
	}
	
?>
