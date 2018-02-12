<?php 
require '../operations/queryExecute.php';

$json = json_decode(file_get_contents("php://input"),true);
$json = $json['products'];
$jsoncopy = $json;
if(isset($json)){
$count = count($json);
$noSuchProductExists = array();
$insufficientStock= array();
$canBeAddedToInvoice = array();
$invoice = array();
$invoice['product'] = array();
$total = 0;
for($i = 0 ; $i < $count ; $i++){
	$resultSet = json_decode(checkProductExists($json[$i]['product_id']),true);
	if(isset($resultSet['status'])){
		$resultSet = $resultSet['product'][0];
		if(intval($json[$i]['required_quantity']) <= intval($resultSet['product_quantity'])){
			$temp['product_id']=$resultSet['product_id'];
			$temp['product_name']=$resultSet['product_name']; 
			$temp['product_price']=$resultSet['product_price'];
			$temp['product_quantity']=$json[$i]['required_quantity'];
			$temp['quantity_type']=$resultSet['quantity_type'];
			array_push($invoice['product'], $temp);
			$total = $total + $temp['product_price']*$temp['product_quantity'];
			array_push($canBeAddedToInvoice,$json[$i]['product_id']);
		}else {
			array_push($insufficientStock,$json[$i]['product_id']);
		}
	}else {
		array_push($noSuchProductExists,$json[$i]['product_id']);
	}
}
if(count($noSuchProductExists) !=0 || count($insufficientStock) != 0){
	$response['status'] = "failure";
	$response['insufficientStockProducts'] = $insufficientStock;
	$response['noSuchProductExists'] = $noSuchProductExists;
	$response['canBeAddedToInvoice'] = $canBeAddedToInvoice;
	echo json_encode($response);
}else {
	//update stock query
	$breakFlag = 0;
	$count = count($jsoncopy);
	for($i = 0 ; $i < $count ; $i++){
		$resultSet = json_decode(checkProductExists($jsoncopy[$i]['product_id']),true);
		$resultSet = $resultSet['product'][0];
		$query = "update product_table set product_quantity = :productQunatity where product_id = :productId;";
		$bindParams[':productQunatity'] = intval($resultSet['product_quantity']) - intval($jsoncopy[$i]['required_quantity']);
		$bindParams[':productId'] = $jsoncopy[$i]['product_id'];
		$resultRow = executeQueryRowCount($query , $bindParams);
		if($resultRow<0){
			$breakFlag = 1;
			break;
		}
	}
	if($breakFlag == 0){
		$response['status'] = "success";
		$invoice['total_amount'] = $total;
		$response['invoice'] = $invoice;
		echo json_encode($response);
	}else {
		echo json_encode(
	        array("status" => "unable to generate the invoice.")
    	);
	}
}
}else {
	echo json_encode(
	        array("status" => "insufficient input credentials.")
    	);
}

function checkProductExists($productId){
	$bindParams[':productId'] = $productId;
	$query = "select * from product_table where product_id = :productId;";
	$resultSet = executeFetchQuery($query , $bindParams);
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
			return json_encode($jsonArray);
		}else {
		    return 1;
		}
	}else {
		return 2;
	}

}
?>