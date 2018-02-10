<?php
require '../operations/queryExecute.php';

	$json = json_decode(file_get_contents("php://input"),true);
	$bindParams;
	$bindParams[':userId'] = $json['userId'];
	$bindParams[':userPassword'] = md5($json['userPassword']);
	$query = "select * from login_table where user_id = :userId and user_password = :userPassword; ";
	$count = executeQueryRowCount($query,$bindParams);
	if($count==1){
		$row = executeFetchQuery($query,$bindParams);
		echo json_encode($row[0]);
	}else {
	echo json_encode(["status"=>"failed"]);
}
?>