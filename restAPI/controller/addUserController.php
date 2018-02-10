<?php 
require '../operations/queryExecute.php';

$json = json_decode(file_get_contents("php://input"),true);
if(isset($json['user_name'])&&isset($json['user_password'])&&isset($json['user_type'])){
	$bindParams[':userName'] = $json['user_name'];
	$bindParams[':userPassword'] = $json['user_password'];
	$bindParams[':userType'] = $json['user_type'];  
	$query = "insert into login_table (user_name,user_password,user_type) values ( :userName ,:userPassword, :userType);";
	$result = executeQueryRowCount($query , $bindParams);
	if($result > 0){
		echo json_encode(array("status" => "successfully added the user.")
    		);
	}else {	
		echo json_encode(
       		array("status" => "unable to add user.")
    	);
	}
	if($result === "failure") {
		echo json_encode(
	        array("status" => "unable to add user.")
    	);
	}
}else {
	echo json_encode(
	        array("status" => "insufficient input credentials.")
    	);
}
?>