<?php 

	include_once('../db/connection.php');

	//Query for log-in authentication
	function getLocations()
	{
		try{
			$db = connect();
			$sql = "SELECT * FROM carwash";
			$stmt = $db->prepare($sql);
			$stmt->execute();
			$rows = $stmt->fetchAll();
			return $rows;
			$db = null;
		}
		catch(PDOException $ex){echo "DB ERROR: ", $ex->getMessage();}
	}
?>
