<?php
require_once '../../api/config/databaseConnection.php';
require_once 'read.php';

function deleteProduct($json){
	$bindParams = array();
	$json = json_decode($json,true);
	$bindParams[':productId'] = $json['product_id'];
	$query = "delete from product_table where product_id = :productId;";
	$statement = executeQuery($query , $bindParams);
	if($statement != "failure"){
		$count = $statement->rowCount();
		if($count>0){
			return json_encode(
        		array("status" => "successfully deleted the product.")
    		);
		}else {
			return json_encode(
        		array("status" => "failed no such product exists.")
    		);
		}
	}else {
		return json_encode(
	        array("status" => "invalid input credentials.")
    	);
	}
}
?>