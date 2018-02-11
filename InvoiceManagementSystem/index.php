<?php
	session_start();
	if(isset($_SESSION['id'])){
		if($_SESSION['type'] == "Admin"){
			header("location: view/admin/adminView.php");
		}else {
			header("location: view/employee/employeeView.php");
		}
	}
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="indexCSS.css">
</head>
<body>
	<form method = "post" action = "./view/controller/loginController.php">
		<h2>ABC SUPERMARKET</h2>
		<h3>INVOICE MANAGEMENT SYSTEM</h3>
		<h3>LOG IN</h3>
		<input type = "text" id = "user-id" name = "user-id" placeholder="User Id" required><br>
		<input type = "password" id = "user-password" name = "user-password" placeholder="Password" required><br>
		<input type = "submit" value = "LOG IN" name = "login" class = "login-button">
	</form>
</body>
</html>