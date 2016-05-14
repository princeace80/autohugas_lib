<?php 

	if(file_exists('../db/connection.php'))
	{
		include_once('../db/connection.php');
	}
	else if(file_exists('db/connection.php'))
	{
		include_once('db/connection.php');
	}
	

	//Query for log-in authentication
	function checkUsernamec( $username )
	{
		try{
			$db = connect();
			$sql = "SELECT * FROM carwash where username=?";
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
			$db = null;
		}
		catch(PDOException $ex){echo "DB ERROR: ", $ex->getMessage();}
	}
	
	function carwashRegister($carwashname, $username, $password, $address, $contactno, $adminid, $lng, $lat, $email, $subs, $propriet)
	{
		try{
			$db = connect();
			$sql = "INSERT INTO carwash(carwashid, carwashname, username, password,
					address, contactno, adminid, longitude, latitude, emailadd,
					subscriptionid, proprietor)
					VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
			$stmt = $db->prepare($sql);
			$stmt->execute(array('', $carwashname, $username, $password, $address, $contactno, $adminid, $lng, $lat, $email, $subs, $propriet));
			$db = null;
		}
		catch(PDOException $ex){echo "DB ERROR: ", $ex->getMessage();}
	}
	
	function getCarOwnerInfo($username, $password)
	{
		try{
			$db = connect();
			$sql = "SELECT * FROM carwash where username=? AND password=?";
			$stmt = $db->prepare($sql);
			$stmt->execute(array($username, $password));
			$rows = $stmt->fetch();
			return $rows;
			$db = null;
		}
		catch(PDOException $ex){echo "DB ERROR: ", $ex->getMessage();}
	}
	
	function getCarOwnerInfobyID($id)
	{
		try{
			$db = connect();
			$sql = "SELECT * FROM carwash where carwashid=?";
			$stmt = $db->prepare($sql);
			$stmt->execute(array($id));
			$rows = $stmt->fetch();
			return $rows;
			$db = null;
		}
		catch(PDOException $ex){echo "DB ERROR: ", $ex->getMessage();}
	}
	function getCarwashInfoL($lat, $lng)
	{
		try{
			$db = connect();
			$sql = "SELECT * FROM carwash WHERE latitude = ? AND longitude = ?";
			$stmt = $db->prepare($sql);
			$stmt->execute(array($lat, $lng));
			$rows = $stmt->fetch();
			return $rows;
			$db = null;
		}
		catch(PDOException $ex){echo "DB ERROR: ", $ex->getMessage();}
	}
?>
