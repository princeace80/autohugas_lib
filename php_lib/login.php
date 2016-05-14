<?php 
	if(file_exists('db/db.php'))
	{
		include_once('db/db.php');
	}
	else if(file_exists('../db/db.php'))
	{
		include_once('../db/db.php');
	}
	else if(file_exists('../../db/db.php'))
	{
		include_once('../../db/db.php');
	}
	//Query for log-in authentication
	function checkUser($userName,$userPassword)
	{
		try{
			$db = connect();
			$sql = "SELECT * FROM users WHERE user_name=? and user_password=?";
			$stmt = $db->prepare($sql);
			$stmt->execute(array($userName,$userPassword));
			$rows = $stmt->fetch();
			if(empty($rows))
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
?>
