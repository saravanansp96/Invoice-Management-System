<?php 
//require '../../api/operations/create.php';
require '../util.php';
$errorFlag = 0;
if(isset($_POST['add-user'])){
	$json = array();
	$json['user_name'] = $_POST['user-name'];
	$json['user_password'] = md5($_POST['user-password']);
	if(isset($_POST['user-type'])){
		$json['user_type'] = $_POST['user-type'];
		$json = json_encode($json);
		echo postData("http://localhost/restAPI/controller/addUserController.php",$json);
	}else {
		echo "unable to add user, user details is missing";
	}
}
?>