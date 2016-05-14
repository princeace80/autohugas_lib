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
	
	
	function getServicesById($id)
	{
		try{
			$db = connect();
			$sql = "SELECT * FROM services where carwashid=?";
			$stmt = $db->prepare($sql);
			$stmt->execute(array($id));
			$rows = $stmt->fetchAll();
			return $rows;
			$db = null;
		}
		catch(PDOException $ex){echo "DB ERROR: ", $ex->getMessage();}
	}
?>
