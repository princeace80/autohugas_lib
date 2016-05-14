<?php 

	if(file_exists('../db/connection.php'))
	{
		include_once('../db/connection.php');
	}
	if(file_exists('../../db/connection.php'))
	{
		include_once('../../db/connection.php');
	}
	else if(file_exists('db/connection.php'))
	{
		include_once('db/connection.php');
	}
	

	//Query for vehicle CRUD
	
	function vehicleRegister($custfname, $custmname, $custlname, $address, $custcontactno, $username, $password, $email)
	{
		$status = '';
		try{
			$db = connect();
			$sql = "INSERT INTO vehicleowner(customerid, custfname, custmname, custlname, address, custcontactno, username,
										password, emailadd)
					VALUES(?,?,?,?,?,?,?,?,?)";
			$stmt = $db->prepare($sql);
			$status = $stmt->execute(array('', $custfname, $custmname, $custlname, $address, $custcontactno, $username, $password, $email));
			if($status)
			{
				return true;
			}
			else
			{
				return false;
			}
			$db = null;
		}
		catch(PDOException $ex){echo "DB ERROR: ", $ex->getMessage();}
	}
	
	function  checkUsernamev($username)
	{
		try{
			$db = connect();
			$sql = "SELECT * FROM vehicleowner WHERE username=?";
			$stmt = $db->prepare($sql);
			$stmt->execute(array($username));
			$rows = $stmt->fetchAll();
			if(!empty($rows))
			{
				return false;
			}
			else
			{
				return true;
			}
			$db=null;
		}catch(PDOException $ex){echo "DB ERROR:", $ex->getMessage();}
	}
	
	function getVehicleOwnerInfo($username, $password)
	{
		try{
			$db = connect();
			$sql = "SELECT * FROM vehicleowner where username=? AND password=?";
			$stmt = $db->prepare($sql);
			$stmt->execute(array($username, $password));
			$rows = $stmt->fetch();
			return $rows;
			$db = null;
		}
		catch(PDOException $ex){echo "DB ERROR: ", $ex->getMessage();}
	}
	
	function getAllVehicle($id)
	{
		try{
			$db = connect();
			$sql = "SELECT * FROM vehicle where customerid=?";
			$stmt = $db->prepare($sql);
			$stmt->execute(array($id));
			$rows = $stmt->fetchAll();
			return $rows;
			$db = null;
		}
		catch(PDOException $ex){echo "DB ERROR: ", $ex->getMessage();}
	}
	
	function getVehicleInfo($vehicleID)
	{
		try{
			$db = connect();
			$sql = "SELECT * FROM vehicle where vehicleid=?";
			$stmt = $db->prepare($sql);
			$stmt->execute(array($vehicleID));
			$rows = $stmt->fetch();
			return $rows;
			$db = null;
		}
		catch(PDOException $ex){echo "DB ERROR: ", $ex->getMessage();}
	}
	
	function addVehicle($userId, $vehicleColor, $model, $brand, $vehicletype, $plateNumber, $registrationNumber)
	{
		try{
			$db = connect();
			$sql = "INSERT INTO vehicle(vehicleid, customerid, vehiclecolor, model, brand, vehicletype, plateNumber, registrationNumber)
					VALUES(?,?,?,?,?,?,?,?)";
			$stmt = $db->prepare($sql);
			$stmt->execute(array('', $userId, $vehicleColor, $model, $brand, $vehicletype, $plateNumber, $registrationNumber));
			$db = null;
		}
		catch(PDOException $ex){echo "DB ERROR: ", $ex->getMessage();}
	}
	
	function updateVehicle($vehicleID, $vehicleColor, $model, $brand, $vehicletype, $plateNumber, $registrationNumber)
	{
		try{
			$db = connect();
			$sql = "UPDATE vehicle set vehiclecolor = ?, model = ?, brand = ?, vehicletype = ?, plateNumber = ?, registrationNumber = ? WHERE vehicleid = ?";
			$stmt = $db->prepare($sql);
			$stmt->execute(array($vehicleColor, $model, $brand, $vehicletype, $plateNumber, $registrationNumber, $vehicleID));
			$db = null;
		}
		catch(PDOException $ex){echo "DB ERROR: ", $ex->getMessage();}
	}
	
	function deleteVehicle($vehicleID)
	{
		try{
			$db = connect();
			$sql = "DELETE FROM vehicle WHERE vehicleid = ?";
			$stmt = $db->prepare($sql);
			$stmt->execute(array($vehicleID));
			$db = null;
		}
		catch(PDOException $ex){echo "DB ERROR: ", $ex->getMessage();}
	}
?>
