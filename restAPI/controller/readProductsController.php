<?php 
require '../operations/queryExecute.php';

$json = json_decode(file_get_contents("php://input"),true);
if(!isset($json['product_id'])){
	$query = "select * from product_table;";
	$resultSet = executeFetchQuery($query ,[]);
}else {
	$bindParams = array();
	$bindParams[':productId'] = $json['product_id'];
	$query = "select * from product_table where product_id = :productId;";
	$resultSet = executeFetchQuery($query , $bindParams);
}

if($resultSet != "failure"){
		$count = count($resultSet);
		if($count>0){
			$jsonArray = array();
			$jsonArray['status'] = "success";
			$jsonArray['product'] = array();
			for ($i=0; $i<$count;$i++) {
				extract($resultSet[$i]);
				$jsonArrayItem = array(
					"product_id"=>$product_id,
					"product_name"=>$product_name,
					"product_price"=>$product_price,
					"product_quantity"=>$product_quantity,
					"quantity_type"=>$quantity_type);
				array_push($jsonArray['product'], $jsonArrayItem);
			}
			echo json_encode($jsonArray);
		}else {
		    echo json_encode(
        	array("status" => "No product exists")
    		);
		}
	}else {
		echo json_encode(
        	array("status" => "failure unable to fetch the products")
    		);
	}
?>