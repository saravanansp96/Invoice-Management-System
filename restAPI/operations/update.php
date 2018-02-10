<?php
require_once '../../api/config/databaseConnection.php';
require_once 'read.php';

function updateProduct($json){
	$bindParams = array();
	$data = json_decode($json,true);
	$alreadySet = 0;
	$errorFlag = 0;
	$query = "update product_table set ";
	if(isset($data['product_quantity']) && trim($data['product_quantity']) != "") {
		$query = $query."product_quantity = :productQunatity";
		$bindParams[':productQunatity'] =  $data['product_quantity'];
		$alreadySet = 1;
	}
	if(isset($data['product_price']) && trim($data['product_price']) != "") {
		if($alreadySet == 1){
			$query = $query.",product_price =:productPrice";
		}else {
			$query = $query."product_price =:productPrice";
		}
		$bindParams[':productPrice'] =$data['product_price'];
	}
	if(isset($data['product_id'])){
		$query = $query . " where product_id = :productId;";
		$bindParams[':productId'] = $data['product_id'];
	}else {
		$errorFlag = 1;
	}
	if($errorFlag == 0){
		$statement = executeQuery($query , $bindParams);
		if($statement != "failure"){
			$count = $statement->rowCount();
			if($count>0){
				return json_encode(
        			array("status" => "successfully updated the product.")
    			);
			}else {
				return json_encode(
        			array("status" => "failed no such product exists.")
    			);
			}
		}else {
		echo json_encode(array("status"=> "invalid input."));
	}
	}
}
?>