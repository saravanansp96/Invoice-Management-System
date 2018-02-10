<?php 
require '../operations/queryExecute.php';

$json = json_decode(file_get_contents("php://input"),true);
if(isset($json['product_name']) && isset($json['product_price']) && isset($json['product_quantity']) && isset($json['quantity_type'])){
	$bindParams[':productName'] = $json['product_name'];
	$bindParams[':productPrice'] = $json['product_price'];
	$bindParams[':productQuantity'] = $json['product_quantity'];
	$bindParams[':quantityType'] = $json['quantity_type'];
	$query = "insert into product_table (product_name, product_price, product_quantity , quantity_type ) values (:productName,:productPrice,:productQuantity,:quantityType);";
	$result = executeQueryRowCount($query , $bindParams);
	if($result > 0){
		echo json_encode(array("status" => "successfully added the product.")
    		);
	}else {	
		echo json_encode(
       		array("status" => "unable to add product.")
    	);
	}
	if($result === "failure") {
		echo json_encode(
	        array("status" => "unable to add product.")
    	);
	}
}else {
	echo json_encode(
	        array("status" => "insufficient input credentials.")
    	);
}
?>