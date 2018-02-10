<?php
require_once '../../api/config/databaseConnection.php';
require_once 'read.php';

function createProduct($json) {
	$bindParams = array();
	$json = json_decode($json,true);
	$bindParams[':productName'] = $json['product_name'];
	$bindParams[':productPrice'] = $json['product_price'];
	$bindParams[':productQuantity'] = $json['product_quantity'];
	$bindParams[':quantityType'] = $json['quantity_type'];
	$query = "insert into product_table (product_name, product_price, product_quantity , quantity_type ) values (:productName,:productPrice,:productQuantity,:quantityType);";
	$statement = executeQuery($query , $bindParams);
	if($statement != "failure"){
		$count = $statement->rowCount();
		if($count>0){
			return json_encode(
        		array("status" => "successfully added the product.")
    		);
		}else {
			return json_encode(
        		array("status" => "unable to add the product.")
    		);
		}
	}else {
		return json_encode(
	        array("status" => "invalid input credentials.")
    	);
	}
}

function createUser($json) {
	$bindParams = array();
	$json = json_decode($json,true);
	$bindParams[':userName'] = $json['user_name'];
	$bindParams[':userPassword'] = $json['user_password'];
	$bindParams[':userType'] = $json['user_type'];  
	$query = "insert into login_table (user_name,user_password,user_type) values ( :userName ,:userPassword, :userType);";
	$statement = executeQuery($query,$bindParams);
	if($statement != "failure"){
		$count = $statement->rowCount();
		if($count>0){
			return json_encode(
        		array("status" => "successfully added the user.")
    		);
		}else {
			return json_encode(
        		array("status" => "unable to add the user.")
    		);
		}
	}else {
		return json_encode(
	        array("status" => "invalid input credentials.")
    	);
	}
}
?>