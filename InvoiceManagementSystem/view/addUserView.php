<?php 
function addUserView(){
	echo '
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="../CSS/stylesheet.css">
</head>
<body>';
require 'navBar.php';
	echo '<div class = "container"><h3>Add New User</h3><br>	
		<form method = "post" action = "../controller/addUserController.php">
			<label for = "user-name">UserName</label><br>
			<input type = "text" id = "user-name" name = "user-name" required><br>
			<label for = "user-password">Password</label><br>
			<input type = "password" id = "user-password" name = "user-password" required><br>
			<label>Type of user</label><br>
			<input type = "radio" name = "user-type" value = "Admin">Admin<br>
			<input type = "radio" name = "user-type" value = "Employee">Employee<br><br>
			<input id = "submit-button" type = "submit" value = "Add user" name = "add-user">
		</form></div>';
}
?>