<?php 
require '../operations/queryExecute.php';

$data = json_decode(file_get_contents("php://input"),true);
$alreadySet = 0;
$errorFlag = 0;
$query = "update product_table set ";
if(isset($data['product_quantity']) && trim($data['product_quantity']) != ""){
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
		$result = executeQueryRowCount($query , $bindParams);
	if($result > 0){
		echo json_encode(array("status" => "successfully update the product.")
    		);
	}else if($result == 0) {	
		echo json_encode(
       		array("status" => "unable to update product.")
    	);
	}
	if(strcmp($result,"failure")==1) {
		echo json_encode(
	        array("status" => "unable to update product.")
    	);
	}
	}else {
	echo json_encode(
	        array("status" => "insufficient input credentials.")
    	);
}

?>