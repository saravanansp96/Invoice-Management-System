<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="../CSS/stylesheet.css">
</head>
<body>
<?php 
//require '../../api/operations/create.php';
session_start();
if(!isset($_SESSION['id'])&&!isset($_SESSION['type'])){
	header("location: ../../index.php");
}
require '../util.php';
require 'navBar2.php';

$errorFlag = 0;
if(isset($_POST['add-user'])){
	$json = array();
	$json['user_name'] = $_POST['user-name'];
	$json['user_password'] = md5($_POST['user-password']);
	if(isset($_POST['user-type'])){
		$json['user_type'] = $_POST['user-type'];
		$json = json_encode($json);
		$response = json_decode(postData("http://localhost/restAPI/controller/addUserController.php",$json),true);
		echo '<div class = "container" >
		<h3>'.$response['status'].'</h3>
		<h3>The User Id is :'.$response['userId'].'</h3>
		<h3>'.$_POST['user-name'].' is an '.$_POST['user-type'].'</h3>
		</div>';
	}else {
		echo "<div class = \"container\"><h3>unable to add user, user details is missing</h3></div>";
	}
}
?>
</body>
</html>