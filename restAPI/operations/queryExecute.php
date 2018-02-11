<?php
require_once '../config/databaseConnection.php';

function searchProduct($json){
	$bindParams = array();
	$json = json_decode($json,true);
	$bindParams[':productId'] = $json['product_id'];
	$query = "select * from product_table where product_id = :productId;";
	$statement = executeQuery($query , $bindParams);
	if($statement != "failure"){
		$count = $statement->rowCount();
		if($count==1){
			$row = $statement->fetch(PDO::FETCH_ASSOC);
			extract($row);
			$jsonArray['status'] = "success";
			$jsonArray['product'] = array(
				"product_id"=>$product_id,
				"product_name"=>$product_name,
				"product_price"=>$product_price,
				"product_quantity"=>$product_quantity,
				"quantity_type"=>$quantity_type);
			return json_encode($jsonArray);
		}else {
			return json_encode(
        	array("status" => "failure no such product exists")
    		);
		}
	}else {
		 return json_encode(
	        array("status" => "failure unable to search the product")
	    );	
	}
}


function executeQueryRowCount($query,$bindParams){
try{
		$database = new Database();
		$database->createConnection();
		$statement = $database->connection->prepare($query);
		$statement->execute($bindParams);
		$database->closeConnection();
		return $statement->rowCount();
	}catch(PDOException $e){
		return "failure";
	}	
}

function executeFetchQuery($query , $bindParams){
	try{
		$database = new Database();
		$database->createConnection();
		$statement = $database->connection->prepare($query);
		$statement->execute($bindParams);
		$resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
		$database->closeConnection();
		return $resultSet;
	}catch(PDOException $e){
		return "failure";
	}
}


?>