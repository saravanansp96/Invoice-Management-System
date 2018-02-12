<?php
require '../util.php';

	if(isset($_POST['login'])){
		$data['userId']  = $_POST['user-id'];
		$data['userPassword'] = $_POST['user-password'];
		$data = json_encode($data);
		$userDetails = postData("http://localhost/restAPI/controller/loginController.php",$data);
		$userDetails = json_decode($userDetails,true);
		var_dump($userDetails);
		session_start();
		if($userDetails['status'] == "failed") {
			$_SESSION['fail'] = "inavlid username or password!!";
			header("Location: ../../index.php");
		}
		else{
			$_SESSION['id'] = $userDetails['user_id'];
			$_SESSION['name'] = $userDetails['user_name'];
			$_SESSION['type'] = $userDetails['user_type'];
			if($userDetails['user_type'] == "Admin"){
				header("Location: ../../view/admin/adminView.php");
			}else {
				header("Location: ../../view/employee/employeeView.php");
			}
		}
	}
?>