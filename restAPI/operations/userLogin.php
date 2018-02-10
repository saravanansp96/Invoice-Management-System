<?php
function userLogin($userId , $password){
	include_once '../config/databaseConnection.php';
	$database = new Database();
	$database->createConnection();

	$bindParams;
	$bindParams[':userId'] = $userId;
	$bindParams[':userPassword'] = md5($password);
	$query = "select * from login_table where user_id = :userId and user_password = :userPassword; ";
	$statement = $database->connection->prepare($query); 
	$statement->execute($bindParams);
	$count = $statement->rowCount();
	if($count==1){
		$row = $statement->fetch(PDO::FETCH_ASSOC);
		return $row;
	}
	return null;
}
?>