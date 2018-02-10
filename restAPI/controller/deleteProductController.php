<?php 
require '../operations/queryExecute.php';

$json = json_decode(file_get_contents("php://input"),true);
if(isset($json['product_id'])){
	$bindParams = array();
	$bindParams[':productId'] = $json['product_id'];
	$query = "delete from product_table where product_id = :productId;";
	$result = executeQueryRowCount($query , $bindParams);
	if($result > 0){
		echo json_encode(array("status" => "successfully deleted the product.")
    		);
	}else {	
		echo json_encode(
       		array("status" => "failed no such product exists.")
    	);
	}
	if($result === "failure") {
		echo json_encode(
	        array("status" => "unable to delete product.")
    	);
	}
}else {
	echo json_encode(
	        array("status" => "invalid input credentials.")
    	);
}

?>