<?php
	require '../deleteProductView.php';
	session_start();
	if(!isset($_SESSION['id'])){
		header("location: ../../index.php");
	}else if($_SESSION['type'] != "Employee"){
			header("location: ../../index.php");
		}
	deleteProductView();
?>
